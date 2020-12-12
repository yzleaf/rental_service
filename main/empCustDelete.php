<?php 
	include ('./php_operation/conn.php');
	require_once ('./php_operation/common.php');
	require_once ('./php_operation/db_customer_info.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');

	if (!isset($_POST['editEmail'])) { // whether click the button
    	$cust_name = get_cust_name('cust_name');
	} else {
		$cust_name = $_POST['editEmail'];
		set_cust_name($cust_name);
	}
	if ($user_type == "ADMIN" || $user_type == "EMPLOYEE") {
		$customer_type = select_cust_type($conn, $cust_name)['cust_type'];
	} else {
		$customer_type = getCookieVal('cookie_ctype');
	}

	if ($customer_type == "I") {
		$result = delete_indi($conn, $cust_name);
	} else {
		$result = delete_corp($conn, $cust_name);
	}

	if ($result == 'T') { // success
		$cust_delete_res = 'T';    
	}
	else {
		$cust_delete_res = 'F';
	//	exit(mysqli_error($conn));
	}
	
	set_flag_execute($cust_delete_res);
	
	
	// redict Status Result
	header('location: ./totalCheck.php');


?>