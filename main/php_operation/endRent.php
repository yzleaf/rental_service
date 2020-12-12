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
	$rentInfo['drop_date'] = $_POST['drop_date'];
	$rentInfo['end_odometer'] = $_POST['end_odometer'];
	$rentInfo['drop_location_id'] = $_POST['drop_location_id'];
	$rentInfo['vin'] = $res['vin'];
	
	$rentInfo['invoice_id'] = $_POST['service_id'];
	$rentInfo['invoice_date'] = $_POST['invoice_date'];

	insert_invoice($conn, $rentInfo);

?>