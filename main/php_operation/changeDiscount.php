<?php
    require_once ('conn.php');
	require_once ('common.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
	include ('empCouponSql.php');

	if (!isset($_POST['submit'])) { // whether click the button
	    exit('Error Access');
	}

	$corp_reg_no = $_POST['corp_reg_no'];
	$corp_name = $_POST['corp_name'];
	$corp_dis = $_POST['corp_dis'];

	change_discount($conn, $corp_reg_no, $corp_name, $corp_dis);

?>