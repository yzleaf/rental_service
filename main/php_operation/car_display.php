<?php

// include ('conn.php');

if (!isset($_POST['submit'])) { // whether click the button
    $filter_result = mysqli_query($conn, "SELECT a.vin, a.make, a.model, DATE_FORMAT(a.year,'%Y-%m-%d') AS 'year', a.lpn, 
		                                 b.class_name, b.rental_rate, b.over_fee, a.location_id
			                          FROM vehicle a JOIN class b ON a.class_id=b.class_id 
			                                         JOIN location c ON a.location_id=c.location_id");
}
else {
    $make = $_POST['make'];
    $class = $_POST['class'];
    $location = $_POST['location'];
    $filter_result = car_filter($conn, $make, $class, $location);

}

function car_filter($conn, $make, $class, $location) {
	$check = mysqli_query($conn, "SELECT a.vin, a.make, a.model, DATE_FORMAT(a.year,'%Y-%m-%d') AS 'year', a.lpn, 
		                                 b.class_name, b.rental_rate, b.over_fee, a.location_id
			                          FROM vehicle a JOIN class b ON a.class_id=b.class_id 
			                                         JOIN location c ON a.location_id=c.location_id
			                          WHERE a.make$make AND b.class_name$class AND c.loc_state$location");
	return $check;
}


?>