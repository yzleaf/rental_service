<?php 

	function loc_normal_info($conn, $loc_name) {
		$check = mysqli_query($conn, "SELECT * FROM location WHERE loc_state = '$loc_name'");
		return $check;
	}

	function loc_car_info($conn, $loc_name) {
		$check = mysqli_query($conn, "SELECT a.vin, a.make, a.model, a.year, a.lpn, b.class_name, a.location_id
			                          FROM vehicle a JOIN class b ON a.class_id=b.class_id 
			                                         JOIN location c ON a.location_id=c.location_id
			                          WHERE c.loc_state='$loc_name'");
		return $check;
	}


	function allLoc($conn) { // get all location information
		$check = mysqli_query($conn, "SELECT * FROM location WHERE location_id<>9999");
		return $check;
	}

	function specific_loc($conn, $loc_id) { // get specific location information through id
		$check = mysqli_query($conn, "SELECT * FROM location WHERE location_id='$loc_id'");
		$result = mysqli_fetch_array($check);
		if ($result) {
			// success
			return $result;
		}
		else {
			return 'F1';
			exit(mysqli_error($conn));		
		}
	}

	function add_location($conn, $loc_info) {
		
		// 0 check whether the name exist
		$check = mysqli_query($conn, "SELECT location_id FROM location WHERE location_id = '$loc_info[location_id]' limit 0,1"); // 0-1 record
		if (mysqli_fetch_array($check)) {
			return 'F1';
			exit(mysqli_error($conn));
		}

		// 1 insert the new location infomation to the location table
		$sql_insert_location = "INSERT INTO location VALUES('$loc_info[location_id]','$loc_info[loc_street]', '$loc_info[loc_city]',
															'$loc_info[loc_state]', '$loc_info[loc_zipcode]', '$loc_info[loc_phone_num]')";
		$result = mysqli_query($conn, $sql_insert_location);
		if ($result) {
			// success 
		}
		else {
			return 'F2';
			exit(mysqli_error($conn));		
		}

		return 'T';
	}
	
	function update_location($conn, $loc_info) {
		
		mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically
		
		// ----- Begin -----
		mysqli_begin_transaction($conn);
	
		// 0: update location table
		$sql_update_location = "UPDATE location
								SET loc_street='$loc_info[loc_street]', loc_city='$loc_info[loc_city]',
								loc_state='$loc_info[loc_state]', loc_zipcode='$loc_info[loc_zipcode]',
								loc_phone_no='$loc_info[loc_phone_num]'
								WHERE location_id='$loc_info[location_id]'";
		$result = mysqli_query($conn, $sql_update_location);
		if ($result) { // success 
		}
		else {
			mysqli_query($conn, "ROLLBACK");
			return 'F';
			exit(mysqli_error($conn));
		}
		
		mysqli_commit($conn); 
		// ----- End -----
	
		mysqli_query($conn, "SET AUTOCOMMIT=1"); //set submit automatically as the begining
	
		return 'T';
	
	}
	
	function delete_location($conn, $loc_id) {
		// business rule
		// don't delete
	}

?>

