<?php
include ('conn.php');
require_once ('common.php');


if (!isset($_POST['submit'])) { // whether click the button
    exit('Error Access');
}

$username = $_POST['email'];

$veri_code = $_POST['code'];

$new_password = $_POST['password'];
$new_password = md5($new_password); // encript

// get the information of the username
$check = mysqli_query($conn, "SELECT username FROM user_password WHERE username = '$username' limit 0,1"); // 0-1 record
if (mysqli_fetch_array($check)) {
    // generate the random number
    // $verify_random = 1;
    // send verify code to the email
}
else {
    $pw_reset_res = 'F';
    exit(mysqli_error($conn));
}

// compare the random number with the data input
// if ($veri_code == $verify_random) { // Success
// }
// else {
//     $pw_reset_res = 'F';
// }

// update user_password table
$sql_update_user_pw = "UPDATE user_password SET password='$new_password' WHERE username='$username'";
$result = mysqli_query($conn, $sql_update_user_pw);
if ($result) { // success
    $pw_reset_res = 'T';    
}
else {
    $pw_reset_res = 'F';
//    exit(mysqli_error($conn));
}

set_flag_execute($pw_reset_res);


// redict Status Result
header('location: ../totalCheck.php');

?>