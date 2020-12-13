<?php


	function specific_remain_amount($conn, $invoice_id) {
		$check = mysqli_query($conn, "SELECT remain_amount FROM invoice
									  WHERE invoice_id = '$invoice_id'
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

	function select_all_payment($conn, $invoice_id) {
		$check = mysqli_query($conn, "SELECT * FROM payment
									  WHERE invoice_id = '$invoice_id'
							");
		return $check;
		
	}
	
	function update_pay($conn, $pay_info) {
		
		mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically
		
		// ----- Begin -----
		mysqli_begin_transaction($conn);
	
		// 0: update invoice table		
		if ($pay_info['new_remain_amount'] == 0) { // if remain_amount=0, status -> 'paid'
			$sql_update_invoice = "UPDATE invoice
									SET remain_amount='$pay_info[new_remain_amount]', status='paid'
									WHERE invoice_id='$pay_info[invoice_id]'";
		}
		else {
			$sql_update_invoice = "UPDATE invoice
									SET remain_amount='$pay_info[new_remain_amount]'
									WHERE invoice_id='$pay_info[invoice_id]'";
		}
		$result = mysqli_query($conn, $sql_update_invoice);
		if ($result) { // success 
		}
		else {
			mysqli_query($conn, "ROLLBACK");
			return 'F1';
			exit(mysqli_error($conn));
		}

		// 1: insert payment table
		// INSERT INTO payment VALUES(unix_timestamp(now()),2020-1-5,'G',111,1,100)
		$sql_insert_payment =  "INSERT INTO payment
							    VALUES (unix_timestamp(now()), now(),
							   			'$pay_info[pay_method]', '$pay_info[pay_card_no]',
										'$pay_info[invoice_id]', '$pay_info[pay_amount]')
								";

		$result = mysqli_query($conn, $sql_insert_payment);
		if ($result) { // success 
		}
		else {
			mysqli_query($conn, "ROLLBACK");
			return 'F2';
			exit(mysqli_error($conn));
		}


		// 2: update
		

		mysqli_commit($conn); 
		// ----- End -----
	
		mysqli_query($conn, "SET AUTOCOMMIT=1"); //set submit automatically as the begining
	
		return 'T';
	}
    
?>