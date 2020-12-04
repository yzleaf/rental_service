<?php

include ('conn.php');

if (!isset($_POST['submit'])) { // whether click the button
    exit('Error Access');
}

$cust_type = $_POST['cust_type'];

$username = $_POST['email'];
$password = $_POST['password'];
$password = md5($password); // encript

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$phone = $_POST['phone'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zip-code'];

// check whether the name exist
$check = mysqli_query($conn, "SELECT username FROM user_password WHERE username = '$username' limit 0,1"); // 0-1 record
if (mysqli_fetch_array($check)) {
    // echo 'Error: Name ', $username, ' exist! <a href="javascript:history.back(-1);"> Back to Retry </a>';
    $signup_res = 'F';
    exit;
}

// insert the new user to the user_password table
$sql_insert_user_pw = "INSERT INTO user_password(username, password) VALUES('$username','$password')";
$result = mysqli_query($conn, $sql_insert_user_pw);
if ($result) {
    // success 
}
else {
    // echo 'Fail user_password!',mysqli_error($conn),'<br />';
    // echo 'Click here to retry <a href="javascript:history.back(-1);"> Back to Retry</a>';
    $signup_res = 'F';
    exit;
}


// get u_id to set the table of customer/individual/corporate id
$check = mysqli_query($conn, "SELECT u_id FROM user_password WHERE username = '$username' limit 0,1");
$result = mysqli_fetch_array($check);
if ($result) {
    $cust_id = $result['u_id'];
}
else {
    // echo 'u_id Fail';
    $signup_res = 'F';
    exit;
}


// insert all values to the customer and their subtype
$sql_insert_customer = "INSERT INTO customer VALUES('$cust_id','$first_name','$last_name',
                            '$street','$city','$state','$zipcode','$username','$phone','$cust_type')"; 
$result_cust = mysqli_query($conn, $sql_insert_customer);

if ($cust_type == 'I') { // individual
    $d_licence_num = $_POST['dln'];
    $ins_cmp_name = $_POST['iname'];
    $ins_num = $_POST['inum'];
    
    $sql_insert_sub_customer = "INSERT INTO individual VALUES('$cust_id','$d_licence_num', '$ins_cmp_name', '$ins_num', Null)";
}
else { // corporate
    $emp_id = $_POST['emp_id'];
    $corp_num = $_POST['corp_num'];
    $corp_name = $_POST['corp_name'];

    $sql_insert_sub_customer = "INSERT INTO corporate VALUES('$cust_id','$emp_id', '$corp_num')";

    // whether the corporation information has been recorded
    $check = mysqli_query($conn, "SELECT corp_reg_no FROM corp_discount WHERE corp_reg_no = '$corp_num' limit 0,1");
    if (mysqli_fetch_array($check)) { // exist, not insert corporation information
    }
    else {
        // insert corporation number and name to corp_discount table
        $sql_insert_dis = "INSERT INTO corp_discount VALUES('$corp_num','$corp_name', 1)";
        $result_corp_dis = mysqli_query($conn, $sql_insert_dis);
        if ($result_corp_dis) {
            // success
        }
        else {
            // echo 'Fail Corporation_Discount',mysqli_error($conn),'<br />';
            // echo 'Click here to retry <a href="javascript:history.back(-1);"> Back to Retry</a>';
            $signup_res = 'F';
            exit;
        }
    }    
}

$result_custsub = mysqli_query($conn, $sql_insert_sub_customer);
if ($result_custsub) {
    // exit('Success Register! Click here<a href="login.php"> Click to Log In</a>');
    $signup_res = 'T';
}
else { // either fail
    // echo 'Customer/sub Fail',mysqli_error($conn),'<br />';
    // echo 'Click here to retry <a href="javascript:history.back(-1);"> Back to Retry</a>';
    $signup_res = 'F';
}




?>