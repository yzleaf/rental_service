<?php
    require_once ('conn.php');
	require_once ('common.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
	include ('empRentSql.php');

	if (!isset($_POST['submit'])) { // whether click the button
	    exit('Error Access');
	}

	$res = select_detail($conn, $_POST['service_id']);

    $rentInfo = [];
	$rentInfo['service_id'] = $_POST['service_id'];
	$rentInfo['pick_date'] = $_POST['pick_date'];
	$rentInfo['drop_date'] = $_POST['drop_date'];
	$rentInfo['start_odometer']= $_POST['start_odometer'];
	$rentInfo['end_odometer'] = $_POST['end_odometer'];
	$rentInfo['d_limit'] = $_POST['d_limit'];
	$rentInfo['vin'] = $_POST['vin'];
	$rentInfo['pick_location_id'] = $_POST['pick_location_id'];
	$rentInfo['drop_location_id'] = $_POST['drop_location_id'];
	
	$rentInfo['invoice_id'] = $_POST['invoice_id'];
	$rentInfo['invoice_date'] = $_POST['invoice_date'];
	$rentInfo['invoice_amount'] = $_POST['invoice_amount'];
	$rentInfo['invoice_status'] = $_POST['invoice_status'];

	$rentInfo['discount'] = $_POST['discount'];

    // print_r($rentInfo);
    // die();

	change_service($conn, $rentInfo);

?>