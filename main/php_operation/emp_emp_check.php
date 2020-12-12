<?php

// location add, edit, delete

include ('conn.php');
require_once ('common.php');
require_once('db_emp_info.php');


if (!isset($_POST['submit'])) { // whether click the button
    exit('Error Access');
}
else {
    $operation = $_POST['submit']; // "add" or "edit"
}

$emp_info['username'] = $_POST['username'];
$password =  $_POST['password'];
$emp_info['password'] = md5($password);



if ($operation == "add") { // add
    $result = add_emp($conn, $emp_info);
} 
else if ($operation == "edit") { // edit
    $result = update_emp($conn, $emp_info);
}
else { // delete
    $result = delete_emp($conn, $emp_info['username']);
}

if ($result == 'T') { // success
    $emp_emp_res = 'T';    
}
else {
    $emp_emp_res = 'F';
}

set_flag_execute($emp_emp_res);


// redict Status Result
header('location: ../totalCheck.php');

?>