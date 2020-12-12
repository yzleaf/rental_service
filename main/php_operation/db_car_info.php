<?php

    function allCar($conn) {
        $check = mysqli_query($conn, "SELECT a.vin, a.make, a.model, DATE_FORMAT(a.year,'%Y-%m-%d') AS 'year',
                                             a.lpn, b.class_name, b.rental_rate, b.over_fee, a.location_id
                                      FROM vehicle a JOIN class b ON a.class_id=b.class_id");
        return $check;
    }

    function specific_car($conn, $vin) { // get specific car information through vin
		$check = mysqli_query($conn, "SELECT a.vin, a.make, a.model, DATE_FORMAT(a.year,'%Y-%m-%d') AS 'year',
                                             a.lpn, b.class_name, b.rental_rate, b.over_fee, a.location_id 
                                      FROM vehicle a JOIN class b
                                      ON a.class_id= b.class_id
                                      WHERE vin='$vin'");
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

    function add_car($conn, $car_info) {
        
        // 0.1: Find class id via class name
        // if class id is not in (class name is not in) -> add class first !
        $check_query_id = mysqli_query($conn, "SELECT class_id FROM class 
                                               WHERE class_name='$car_info[class_name]'");
        $result = mysqli_fetch_array($check_query_id);
        if ($result) { // have class, just insert to vehicle
            $class_id = $result['class_id'];
        }
        else { // no class, fail, emp should create class first
            return 'F0';
        }

        // 0.2: Find location id via class name, check whether the loc id is in the table
        // if location id is not in, -> wrong
        $check_query_id = mysqli_query($conn, "SELECT location_id FROM location 
                                            WHERE location_id='$car_info[location_id]'");
        $result = mysqli_fetch_array($check_query_id);
        if ($result) { // success
        }
        else {
            return 'F1';

        }
       
		// 1: insert vehicle table
		$sql_insert_vehicle = "INSERT INTO vehicle
                               VALUES('$car_info[vin]','$car_info[make]','$car_info[model]',
                                      '$car_info[year]','$car_info[lpn]','$class_id',
                                      '$car_info[location_id]')";
        $result = mysqli_query($conn, $sql_insert_vehicle);
        if ($result) {
            // success 
        }
        else {
            return 'F3';
            exit(mysqli_error($conn));		
        }
        
        return 'T';
        
    }

    function update_car($conn, $car_info) {

        mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically
        
        // 0.1: Find class id via class name
        // if class id is not in (class name is not in) -> wrong
        $check_query_id = mysqli_query($conn, "SELECT class_id FROM class 
                                               WHERE class_name='$car_info[class_name]'");
        $result = mysqli_fetch_array($check_query_id);
        if ($result) { // success
            $class_id = $result['class_id'];
        }
        else {
            return 'F0';
        }

        // 0.2: Find location id via class name, check whether the loc id is in the table
        // if location id is not in, -> wrong
        $check_query_id = mysqli_query($conn, "SELECT location_id FROM location 
                                            WHERE location_id='$car_info[location_id]'");
        $result = mysqli_fetch_array($check_query_id);
        if ($result) { // success
        }
        else {
            return 'F1';

        }

		// ----- Begin -----
		mysqli_begin_transaction($conn);
        
		// 1: update vehicle table
		$sql_update_vehicle = "UPDATE vehicle
								SET make='$car_info[make]',	model='$car_info[model]',
                                    year='$car_info[year]', lpn='$car_info[lpn]',
                                    class_id='$class_id', location_id='$car_info[location_id]'
								WHERE vin='$car_info[vin]'";
		$result = mysqli_query($conn, $sql_update_vehicle);
		if ($result) { // success 
		}
		else {
			mysqli_query($conn, "ROLLBACK");
			return 'F2';
			exit(mysqli_error($conn));
		}
        
		mysqli_commit($conn); 
		// ----- End -----
	
		mysqli_query($conn, "SET AUTOCOMMIT=1"); //set submit automatically as the begining
	
		return 'T';
    }

    function delete_car($conn, $vin) {
        // business rule
		// don't delete
    }

?>