<?php 
    function select_coupon($conn, $coupon_id) {
    	$check = mysqli_query($conn, "SELECT coupon_id, indi_dis, start_date, end_date 
			                          FROM indi_coupon
			                          WHERE coupon_id = '$coupon_id'
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

    function select_discount($conn, $corp_reg_no) {
    	$check = mysqli_query($conn, "SELECT corp_reg_no, corp_name, corp_dis
			                          FROM corp_discount
			                          WHERE corp_reg_no = '$corp_reg_no'
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

	function allIndi($conn) {
		$check = mysqli_query($conn, "SELECT coupon_id, indi_dis, start_date, end_date 
			                          FROM indi_coupon
									  WHERE coupon_id<>'9999'
                              ");
		return $check;
	}

	function allCorp($conn) {
		$check = mysqli_query($conn, "SELECT corp_reg_no, corp_name, corp_dis
			                          FROM corp_discount
                              ");
		return $check;
	}

	function insert_coupon($conn, $coupon_id, $indi_dis, $start_date, $end_date) {
		$check = mysqli_query($conn, "INSERT INTO indi_coupon
									  VALUES ($coupon_id, $indi_dis, date'$start_date', date'$end_date') 
                              ");
		if ($check) { // success
		    $add_coupon_res = 'T';    
		}
		else {
		    $add_coupon_res = 'F';
		    exit(mysqli_error($conn));
		}
		set_flag_execute($add_coupon_res);
		// redict Status Result
		header('location: ../totalCheck.php');
	}

	function insert_discount($conn, $corp_reg_no, $corp_name, $corp_dis) {
		$check = mysqli_query($conn, "INSERT INTO corp_discount
									  VALUES ($corp_reg_no, $corp_name, $corp_dis)
                              ");
		if ($check) { // success
		    $add_coupon_res = 'T';    
		}
		else {
		    $add_coupon_res = 'F';
		    exit(mysqli_error($conn));
		}
		set_flag_execute($add_coupon_res);
		// redict Status Result
		header('location: ../totalCheck.php');
	}

	function change_discount($conn, $corp_reg_no, $corp_name, $corp_dis) {
		$check = mysqli_query($conn, "UPDATE corp_discount
									  SET corp_name='$corp_name', corp_dis='$corp_dis'
									  WHERE corp_reg_no='$corp_reg_no'
                              ");
		if ($check) { // success
		    $add_coupon_res = 'T';    
		}
		else {
		    $add_coupon_res = 'F';
		    exit(mysqli_error($conn));
		}
		set_flag_execute($add_coupon_res);
		// redict Status Result
		header('location: ../totalCheck.php');

	}











?>