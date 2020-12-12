<?php 
    function select_detail($conn, $service_id) {
    	$check = mysqli_query($conn, "SELECT *
    		                          FROM services a JOIN invoice b ON a.service_id=b.service_id 
    		                                          JOIN customer c ON c.cust_id=b.cust_id
    		                          WHERE a.service_id = '$service_id'
    		                          ");
    	$result = mysqli_fetch_array($check);
	    if ($result) {
	        return $result;
	    }
	    else {
	        return 'F';
	        exit;
	    }
    }

	function allRent($conn) {
		$check = mysqli_query($conn, "SELECT a.service_id, b.invoice_id, b.status 
			                          FROM services a JOIN invoice b ON a.service_id=b.service_id");
		return $check;
	}

	function select_coupon_id($conn, $cust_id) {
		$check = mysqli_query($conn, "SELECT coupon_id
    		                          FROM individual
    		                          WHERE cust_id = '$cust_id'
    		                          ");
    	$result = mysqli_fetch_array($check)['coupon_id'];
	    if ($result) {
	        return $result;
	    }
	    else {
	        return 'F';
	        exit;
	    }
	}

	function select_coupon_discount($conn, $coupon_id) {
		$check = mysqli_query($conn, "SELECT indi_dis
    		                          FROM indi_coupon
    		                          WHERE coupon_id = '$coupon_id'
    		                          ");
    	$result = mysqli_fetch_array($check)['indi_dis'];
	    if ($result) {
	        return $result;
	    }
	    else {
	        return 'F';
	        exit;
	    }
	}

	function select_corp_discount($conn, $cust_id) {
		$check = mysqli_query($conn, "SELECT b.corp_dis
    		                          FROM corporate a JOIN corp_discount b ON a.corp_reg_no=b.corp_reg_no
    		                          WHERE a.cust_id = '$cust_id'
    		                          ");
    	$result = mysqli_fetch_array($check)['corp_dis'];
	    if ($result) {
	        return $result;
	    }
	    else {
	        return 'F';
	        exit;
	    }

	}

	function change_service($conn, $rentInfo) {
		
		mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically

		// ----- Begin -----
        mysqli_begin_transaction($conn);

		$service_update_res = mysqli_query($conn, "UPDATE services
									  SET pick_date='$rentInfo[pick_date]', drop_date='$rentInfo[drop_date]', 
									      start_odometer='$rentInfo[start_odometer]', 
									      end_odometer='$rentInfo[end_odometer]', 
									      vin='$rentInfo[vin]', pick_location_id='$rentInfo[pick_location_id]', 
									      drop_location_id='$rentInfo[drop_location_id]'
									  WHERE service_id='$rentInfo[service_id]'
                              ");
		if ($service_update_res) { // success 
			$result = 'T';  
		}
		else {
		    mysqli_query($conn, "ROLLBACK");
	        $result = 'F';
	        //exit(mysqli_error($conn));
	        print_r(mysqli_error($conn));
	        
		}

		//update invoice
		$invoice_update_res = mysqli_query($conn, "UPDATE invoice
									  SET invoice_date='$rentInfo[invoice_date]'
									  WHERE invoice_id='$rentInfo[invoice_id]'
                              ");
		if ($invoice_update_res) { // success  
			$result = 'T'; 
		}
		else {
		    mysqli_query($conn, "ROLLBACK");
	        $result = 'F';
	        //exit(mysqli_error($conn));
	        print_r(mysqli_error($conn));
		}

		mysqli_commit($conn); 
	    // ----- End -----

	    mysqli_query($conn, "SET AUTOCOMMIT=1"); //set submit automatically as the begining

	    // update invoice with discount
	    $invoice_update_res = with_discount($conn, $rentInfo);

		if ($invoice_update_res) { // success 
			$result = 'T';  
		}
		else {
	        $result = 'F';
	        //exit(mysqli_error($conn));
	        print_r(mysqli_error($conn));
	    }

		set_flag_execute($result);
		// redict Status Result
		header('location: ../totalCheck.php');

	}

	function delete_service($conn, $service_id) {

        mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically

		// ----- Begin -----
        mysqli_begin_transaction($conn);

		$invoice_delete_res = mysqli_query($conn, "DELETE 
			                               FROM invoice
									       WHERE service_id='$service_id'");
		if ($invoice_delete_res) { // success 
			$result = 'T';  
		}
		else {
		    mysqli_query($conn, "ROLLBACK");
	        $result = 'F';
	        //exit(mysqli_error($conn));
	        print_r(mysqli_error($conn));
	    }

	    $service_delete_res = mysqli_query($conn, "DELETE 
			                               FROM services
									       WHERE service_id='$service_id'");
		if ($service_delete_res) { // success 
			$result = 'T';  
		}
		else {
		    mysqli_query($conn, "ROLLBACK");
	        $result = 'F';
	        //exit(mysqli_error($conn));
	        print_r(mysqli_error($conn));
	    }

	    mysqli_commit($conn); 
	    // ----- End -----

	    mysqli_query($conn, "SET AUTOCOMMIT=1"); //set submit automatically as the begining

		set_flag_execute($result);
		// redict Status Result
		header('location: ../totalCheck.php');

	}

	function insert_service($conn, $rentInfo) {
        $check = mysqli_query($conn, "SELECT cust_id
			                          FROM customer
									  WHERE email='$rentInfo[user_name]'");
        $select_cust_id = mysqli_fetch_array($check)['cust_id'];

		mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically

		// ----- Begin -----
        mysqli_begin_transaction($conn);

        // insert into services
        $service_insert_res = mysqli_query($conn, "INSERT INTO services 
									       VALUES ('$rentInfo[service_id]', date'$rentInfo[pick_date]', 
									               date'$rentInfo[drop_date]', '$rentInfo[start_odometer]',
									               '$rentInfo[end_odometer]', '$rentInfo[d_limit]',
									               '$rentInfo[vin]', '$rentInfo[pick_location_id]',
									               '$rentInfo[drop_location_id]')
									       ");
		if ($service_insert_res) { // success 
			$result = 'T';  
		}
		else {
		    mysqli_query($conn, "ROLLBACK");
	        $result = 'F';
	        //exit(mysqli_error($conn));
	        print_r(mysqli_error($conn));
	    }


        // insert into invoice
        $invoice_insert_res = mysqli_query($conn, "INSERT INTO invoice 
									       VALUES ('$rentInfo[invoice_id]', date'$rentInfo[invoice_date]',
									       '$rentInfo[invoice_amount]', '$select_cust_id', $rentInfo[service_id],
									       '$rentInfo[status]',0,0)
									       ");
		if ($invoice_insert_res) { // success 
			$result = 'T';  
		}
		else {
		    mysqli_query($conn, "ROLLBACK");
	        $result = 'F';
	        //exit(mysqli_error($conn));
	        print_r(mysqli_error($conn));
	    }

        mysqli_commit($conn); 
	    // ----- End -----

	    mysqli_query($conn, "SET AUTOCOMMIT=1"); //set submit automatically as the begining

		set_flag_execute($result);
		// redict Status Result

		header('location: ../totalCheck.php');

	}

	function insert_invoice($conn, $rentInfo) {

		mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically

		// ----- Begin -----
        mysqli_begin_transaction($conn);

        // update services
        $service_update_res = mysqli_query($conn, "UPDATE services 
        	                                       SET drop_date=date'$rentInfo[drop_date]', 
        	                                       end_odometer='$rentInfo[end_odometer]',
        	                                       drop_location_id='$rentInfo[drop_location_id]'
									               WHERE service_id='$rentInfo[service_id]'
									       ");
		if ($service_update_res) { // success 
			$result = 'T';  
		}
		else {
		    mysqli_query($conn, "ROLLBACK");
	        $result = 'F';
	        //exit(mysqli_error($conn));
	        print_r(mysqli_error($conn));
	    }


        // update invoice
        $invoice_update_res = mysqli_query($conn, "UPDATE invoice 
									               SET invoice_date=date'$rentInfo[invoice_date]',
									               status='unpaid'
									               WHERE invoice_id='$rentInfo[invoice_id]'
									       ");
		if ($invoice_update_res) { // success 
			$result = 'T';  
		}
		else {
		    mysqli_query($conn, "ROLLBACK");
	        $result = 'F';
	        //exit(mysqli_error($conn));
	        print_r(mysqli_error($conn));
	    }

	    //update vehicle
	    $vehicle_update_res = mysqli_query($conn, "UPDATE vehicle
									               SET location_id='$rentInfo[drop_location_id]'
									               WHERE vin='$rentInfo[vin]'
									       ");
	    if ($vehicle_update_res) { // success 
			$result = 'T';  
		}
		else {
		    mysqli_query($conn, "ROLLBACK");
	        $result = 'F';
	        //exit(mysqli_error($conn));
	        print_r(mysqli_error($conn));
	    }

	    //update customer indi_coupon if needed
	    if ($rentInfo['cust_type'] == "I") {
	    	$indi_update_res = mysqli_query($conn, "UPDATE individual
									               SET coupon_id='$rentInfo[coupon_id]'
									               WHERE cust_id='$rentInfo[cust_id]'
									       ");
		    if ($indi_update_res) { // success 
				$result = 'T';  
			}
			else {
			    mysqli_query($conn, "ROLLBACK");
		        $result = 'F';
		        //exit(mysqli_error($conn));
		        print_r(mysqli_error($conn));
		    }
	    }

        mysqli_commit($conn); 
	    // ----- End -----
	    mysqli_query($conn, "SET AUTOCOMMIT=1"); //set submit automatically as the begining

	    // update invoice with discount
	    $invoice_update_res = with_discount($conn, $rentInfo);

		if ($invoice_update_res) { // success 
			$result = 'T';  
		}
		else {
	        $result = 'F';
	        //exit(mysqli_error($conn));
	        print_r(mysqli_error($conn));
	    }

		set_flag_execute($result);
		// redict Status Result

		header('location: ../totalCheck.php');

	}


	function with_discount($conn, $rentInfo) {
		$invoice_amount_res = mysqli_query($conn, "SELECT invoice_amount
									               FROM invoice
									               WHERE invoice_id='$rentInfo[invoice_id]'");
	    $invoice_amount = mysqli_fetch_array($invoice_amount_res)['invoice_amount'];

        $real_amount_update = mysqli_query($conn, "UPDATE invoice 
									               SET real_amount='$invoice_amount'*'$rentInfo[discount]'
									               WHERE invoice_id='$rentInfo[invoice_id]';");

        $real_amount_res = mysqli_query($conn, "SELECT real_amount
									            FROM invoice
									            WHERE invoice_id='$rentInfo[invoice_id]'");
        $real_amount = mysqli_fetch_array($real_amount_res)['real_amount'];
        
        $invoice_update_res = mysqli_query($conn, "UPDATE invoice 
									               SET remain_amount='$real_amount' 
									               WHERE invoice_id='$rentInfo[invoice_id]';");

        // print_r("UPDATE invoice 
								// 	               SET remain_amount='$real_amount' 
								// 	               WHERE invoice_id='$rentInfo[invoice_id]';");
        // die();
        return $invoice_update_res;

	}




 ?>