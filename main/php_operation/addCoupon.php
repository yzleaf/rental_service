<?php
    require_once ('conn.php');
	require_once ('common.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
	include ('empCouponSql.php');

	if (!isset($_POST['submit'])) { // whether click the button
	    exit('Error Access');
	}

	$coupon_id = $_POST['coupon_id'];
	$indi_dis = $_POST['indi_dis'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];

	insert_coupon($conn, $coupon_id, $indi_dis, $start_date, $end_date);

?>



