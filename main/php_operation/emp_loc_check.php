<?php

// location add, edit, delete

include ('conn.php');
require_once ('common.php');
require_once('db_location_info.php');


if (!isset($_POST['submit'])) { // whether click the button
    exit('Error Access');
}
else {
    $operation = $_POST['submit']; // "add" or "edit"
}

$loc_info['location_id'] = $_POST['location_id'];
$loc_info['loc_street'] = $_POST['loc_street'];
$loc_info['loc_city'] = $_POST['loc_city'];
$loc_info['loc_state'] = $_POST['loc_state'];
$loc_info['loc_zipcode'] = $_POST['loc_zipcode'];
$loc_info['loc_phone_num'] = $_POST['loc_phone_num'];

if ($operation == "add") { // add
    $result = add_location($conn, $loc_info);
} 
else if ($operation == "edit") { // edit
    $result = update_location($conn, $loc_info);
}
else { // delete

}

if ($result == 'T') { // success
    $emp_loc_res = 'T';    
}
else {
    $emp_loc_res = 'F';
}

set_flag_execute($emp_loc_res);


// redict Status Result
header('location: ../totalCheck.php');

?>