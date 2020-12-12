<?php

// location add, edit, delete

include ('conn.php');
require_once ('common.php');
require_once('db_car_info.php');


if (!isset($_POST['submit'])) { // whether click the button
    exit('Error Access');
}
else {
    $operation = $_POST['submit']; // "add" or "edit"
}

$car_info['vin'] = $_POST['vin'];
$car_info['make'] = $_POST['make'];
$car_info['model'] = $_POST['model'];
$car_info['year'] = $_POST['year'];
$car_info['lpn'] = $_POST['lpn'];
$car_info['class_name'] = $_POST['class_name'];
$car_info['location_id'] = $_POST['location_id'];


if ($operation == "add") { // add
    $result = add_car($conn, $car_info);
} 
else if ($operation == "edit") { // edit
    $result = update_car($conn, $car_info);
}
else { // delete
}

if ($result == 'T') { // success
    $emp_car_res = 'T';    
}
else {
    $emp_car_res = 'F';
}

set_flag_execute($emp_car_res);


// redict Status Result
header('location: ../totalCheck.php');

?>