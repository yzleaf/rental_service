<?php 

	// function loc_normal_info($conn, $loc_name) {
	// 	$check = mysqli_query($conn, "SELECT * FROM location WHERE loc_state = '$loc_name'");
	// 	return $check;
	// }

	// function loc_car_info($conn, $loc_name) {
	// 	$check = mysqli_query($conn, "SELECT a.vin, a.make, a.model, a.year, a.lpn, b.class_name, a.location_id
	// 		                          FROM vehicle a JOIN class b ON a.class_id=b.class_id 
	// 		                                         JOIN location c ON a.location_id=c.location_id
	// 		                          WHERE c.loc_state='$loc_name'");
	// 	return $check;
	// }


	function allClass($conn) { // get all class information
		$check = mysqli_query($conn, "SELECT * FROM class");
		return $check;
	}

	function specific_class($conn, $class_id) { // get specific class information through id
		$check = mysqli_query($conn, "SELECT * FROM class WHERE class_id='$class_id'");
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

	function add_class($conn, $class_info) {
		
        // 0 check whether the id exist
		$check = mysqli_query($conn, "SELECT * FROM class
        WHERE class_id = '$class_info[class_id]' limit 0,1"); // 0-1 record
        if (mysqli_fetch_array($check)) {
            return 'F1';
            exit(mysqli_error($conn));
        }

        // 0 check whether the name exist
		$check = mysqli_query($conn, "SELECT * FROM class
                                      WHERE class_name = '$class_info[class_name]' limit 0,1"); // 0-1 record
		if (mysqli_fetch_array($check)) {
			return 'F2';
			exit(mysqli_error($conn));
        }

		// 1 insert the new class infomation to the class table
		$sql_insert_class = "INSERT INTO class
                             VALUES('$class_info[class_id]','$class_info[class_name]',
                                    '$class_info[rental_rate]', '$class_info[over_fee]')";
		$result = mysqli_query($conn, $sql_insert_class);
		if ($result) {
			// success 
		}
		else {
            print_r(mysqli_error($conn));
            die();
			return 'F3';
			exit(mysqli_error($conn));		
		}

		return 'T';
	}
	
	function update_class($conn, $class_info) {
		
		mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically
		
		// ----- Begin -----
		mysqli_begin_transaction($conn);
	
		// 0: update class table
		$sql_update_class = "UPDATE class
								SET rental_rate='$class_info[rental_rate]', over_fee='$class_info[over_fee]'
								WHERE class_id='$class_info[class_id]'";
		$result = mysqli_query($conn, $sql_update_class);
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

