<?php
include ('conn.php');
require_once ('common.php');


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


$check_query = mysqli_query($conn, "SELECT a.u_id, a.u_type, b.cust_type FROM user_password a
                                    JOIN customer b ON a.u_id=b.cust_id
                                    WHERE a.username='$username' AND a.password='$password' limit 0, 1");
$result = mysqli_fetch_array($check_query);

if ($result) {
    // echo "Success Log In <br>";
    // exit();
    $login_res = 'T';

    // set cookie to remember status of user
    login($username, $result['u_type'], $result['cust_type']);
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