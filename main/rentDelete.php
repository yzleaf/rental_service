<?php 
	include ('./php_operation/conn.php');
	require_once ('./php_operation/common.php');
	include ('./php_operation/empRentSql.php');

	if (!isset($_POST['delete'])) { // whether click the button
    	$service_id = get_service_id('service_id');
	} else {
		$service_id = $_POST['delete'];
		set_service_id($service_id);
	}

	$result = delete_service($conn, $service_id);

	set_flag_execute($result);
	// redict Status Result
	header('location: ./totalCheck.php');
	
?>