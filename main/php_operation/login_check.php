<?php
include ('conn.php');
require_once ('common.php');


if (!isset($_POST['submit'])) { // whether click the button
    exit('Error Access');
}

$username = $_POST['email'];

$password = $_POST['password'];
$password = md5($password); // encript

// $check_query_u_p = mysqli_query($conn, "SELECT u_id, u_type FROM user_password 
//                                     WHERE username='$username' AND password='$password' limit 0, 1");
// $result_u_p = mysqli_fetch_array($check_query_u_p);


$check_query_u_p = $conn->prepare("SELECT u_id, u_type FROM user_password
                                    WHERE username=? AND password=? limit 0,1");
$check_query_u_p->bind_param("ss", $username, $password);
$check_query_u_p->execute();
$check_query_u_p->bind_result($u_id, $u_type);
    
// while ($check_query_u_p->fetch()) { 
//     printf ("%s %s\n", $u_id, $u_type);
// }


if ($check_query_u_p->fetch()) { /* fetch values */
    
    $login_res = 'T';
    $check_query_u_p->close();

    // find customer type: I or C
    $check_query_c = mysqli_query($conn, "SELECT cust_type FROM customer WHERE email='$username' limit 0, 1");
    $result_c = mysqli_fetch_array($check_query_c);
    if ($result_c) { // customer     
        login($username, $u_type, $result_c['cust_type']);
    }
    else { // employee
        login($username, $u_type, "");
    }
}
else {
    // echo 'Fail Log In! Error user name or password',mysqli_error($conn),'<br />';
    // echo 'Click here to retry <a href="javascript:history.back(-1);"> Back to Retry</a>';
    $login_res = 'F';
    $check_query_u_p->close();
}

// echo "$login_res"; // return the login result
//                    // when use "" it is variable
//                    // when use '' it is string of $login_res

?>