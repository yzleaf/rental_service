<?php
include ('conn.php');



if (!isset($_POST['submit'])) { // whether click the button
    exit('Error Access');
}

$username = $_POST['email'];

$password = $_POST['password'];
$password = md5($password); // encript

// ---------test
// print_r($_POST['submit']); die();
// echo 'Username: '. $username. "<br>";
// echo 'Password: '. $password. "<br>";

// ---------test end


$check_query = mysqli_query($conn, "SELECT u_id FROM user_password WHERE username='$username' and password='$password' limit 0, 1");
$result = mysqli_fetch_array($check_query);

if ($result) {
    // echo "Success Log In <br>";
    // exit();
    $login_res = 'T';
}
else {
    // echo 'Fail Log In! Error user name or password',mysqli_error($conn),'<br />';
    // echo 'Click here to retry <a href="javascript:history.back(-1);"> Back to Retry</a>';
    $login_res = 'F';
}

// echo "$login_res"; // return the login result
//                    // when use "" it is variable
//                    // when use '' it is string of $login_res

?>