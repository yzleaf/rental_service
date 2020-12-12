<?php
    require_once ('conn.php');
	require_once ('common.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
	include ('empRentSql.php');

	if (!isset($_POST['submit'])) { // whether click the button
	    exit('Error Access');
	}

    $rentInfo = [];
    $rentInfo['user_name'] = $_POST['user_name'];

	$rentInfo['service_id'] = $_POST['service_id'];
	$rentInfo['pick_date'] = $_POST['pick_date'];
	$rentInfo['drop_date'] = $_POST['drop_date'];
	$rentInfo['start_odometer']= $_POST['start_odometer'];
	$rentInfo['end_odometer'] = $_POST['end_odometer'];
	$rentInfo['d_limit'] = $_POST['d_limit'];
	$rentInfo['vin'] = $_POST['vin'];
	$rentInfo['pick_location_id'] = $_POST['pick_location_id'];
	$rentInfo['drop_location_id'] = $_POST['drop_location_id'];
	
	$rentInfo['invoice_id'] = $_POST['service_id'];
	$rentInfo['invoice_date'] = "2999-01-01";
	$rentInfo['invoice_amount'] = "999999";
	$rentInfo['status'] = "unpaid";

	insert_service($conn, $rentInfo);

?>