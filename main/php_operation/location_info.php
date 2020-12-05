<?php 
	function loc_normal_info($conn, $loc_name) {
		$check = mysqli_query($conn, "SELECT * FROM location WHERE loc_state = '$loc_name'");
		return $check;
		// $result = mysqli_fetch_array($check);
	 //    if ($result) {
	 //        return $result;
	 //    }
	 //    else {
	 //        return 'Fail';
	 //        exit;
	 //    }
	}

	function loc_state_session($loc) {
		session_start();
		// 存储 session 数据
		if(isset($_SESSION['loc_state']) && $loc=="") {         //if refresh
			;
		} else if ($loc!="" && $_SESSION['loc_state']!=$loc) {  //if change
			unset($_SESSION['loc_state']);
			$_SESSION['loc_state']=$loc;
		} else {                                                //if unset
			$_SESSION['loc_state']=$loc;
		}
	}

?>

