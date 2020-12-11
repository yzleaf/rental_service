<?php 
	include ('./php_operation/conn.php');
	require_once ('./php_operation/common.php');
	require_once ('./php_operation/customer.php');
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
		delete_indi($conn, $cust_name);
	} else {
		delete_corp($conn, $cust_name);
	}

	header('location: totalCheck.php');

	


?>