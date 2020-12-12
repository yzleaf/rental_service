<?php

// class add, edit, delete

include ('conn.php');
require_once ('common.php');
require_once('db_class_info.php');


if (!isset($_POST['submit'])) { // whether click the button
    exit('Error Access');
}
else {
    $operation = $_POST['submit']; // "add" or "edit"
}

$class_info['class_id'] = $_POST['class_id'];
$class_info['class_name'] = $_POST['class_name'];
$class_info['rental_rate'] = $_POST['rental_rate'];
$class_info['over_fee'] = $_POST['over_fee'];


if ($operation == "add") { // add
    $result = add_class($conn, $class_info);
} 
else if ($operation == "edit") { // edit
    $result = update_class($conn, $class_info);
}
else { // delete

}


if ($result == 'T') { // success
    $emp_class_res = 'T';    
}
else {
    $emp_class_res = 'F';
}

set_flag_execute($emp_class_res);


// redict Status Result
header('location: ../totalCheck.php');

?>