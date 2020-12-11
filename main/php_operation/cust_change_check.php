<?php
include ('conn.php');
require_once ('common.php');
require_once ('customer.php');


if (!isset($_POST['submit'])) { // whether click the button
    exit('Error Access');
}

//$user_name = getCookieVal('cookie_uname');
$customer_type = getCookieVal('cookie_ctype');

// $password = $_POST['password'];
// $password = md5($password); // encript

// $first_name = $_POST['first-name'];
// $last_name = $_POST['last-name'];
// $phone = $_POST['phone'];
// $street = $_POST['street'];
// $city = $_POST['city'];
// $state = $_POST['state'];
// $zipcode = $_POST['zip-code'];



/////
$cust_info = [];
$cust_info['username'] = getCookieVal('cookie_uname');

$password = $_POST['password'];
$cust_info['password'] = md5($password); // encript
$cust_info['first_name'] = $_POST['first-name'];
$cust_info['last_name'] = $_POST['last-name'];
$cust_info['phone'] = $_POST['phone'];
$cust_info['street'] = $_POST['street'];
$cust_info['city'] = $_POST['city'];
$cust_info['state'] = $_POST['state'];
$cust_info['zipcode'] = $_POST['zip-code'];



if ($customer_type == 'I') { // individual
    $cust_info['driver_lno'] = $_POST['dln'];
    $cust_info['insur_cop_name'] = $_POST['iname'];
    $cust_info['insur_pol_no'] = $_POST['inum'];
 
    $update_res = update_individual($conn, $cust_info);
    if ($update_res == 'T') { // Success
        $cust_change_res = 'T';
    }
    else { // Fail
        $cust_change_res = 'F';
    }

}
else { // corporate
    $cust_info['emp_id'] = $_POST['dln'];
    $cust_info['corp_reg_no'] = $_POST['iname'];
    $cust_info['corp_name'] = $_POST['inum'];

    $update_res = update_corp($conn, $cust_info);
    if ($update_res == 'T') { // Success
        $cust_change_res = 'T';
    }
    else { // Fail
        $cust_change_res = 'F';
    }
}

set_flag_execute($cust_change_res);

// redict Status Result
header('location: ../totalCheck.php');


?>