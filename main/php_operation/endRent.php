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
    
    $cust_id = $res['cust_id'];
    $cust_type = $res['cust_type'];
    $rentInfo['cust_id'] = $cust_id;
    $rentInfo['cust_type'] = $cust_type;
    $rentInfo['coupon_id'] = $_POST['coupon_id'];
    
    if ($cust_type == "I") {
    	if ($rentInfo['coupon_id']=="No") {
    		$rentInfo['coupon_id'] = 9999;
	    	$rentInfo['discount'] = 1;
	    } else {
	    	$rentInfo['discount'] = select_coupon_discount($conn, $rentInfo['coupon_id']);
	    }
    } else {
    	$rentInfo['discount'] = select_corp_discount($conn, $cust_id);
    }

	insert_invoice($conn, $rentInfo);


?>












