<?php
//include ('conn.php');
//require_once ('common.php');


// function select_customer($conn, $cust_name) {

//     $check = mysqli_query($conn, "SELECT * FROM customer WHERE email = '$cust_name' limit 0,1");
//     $result = mysqli_fetch_array($check);
//     if ($result) {
//         return $result;
//     }
//     else {
//         return 'Fail';
//         exit;
//     }
// }

function select_individual($conn, $cust_name) {
    
    $check = mysqli_query($conn, "SELECT * FROM customer a JOIN individual b ON a.cust_id=b.cust_id
                                    WHERE a.email = '$cust_name' limit 0,1");
    $result = mysqli_fetch_array($check);
    if ($result) {
        return $result;
    }
    else {
        return 'Fail';
        exit;
    }
}

function select_corp($conn, $cust_name) {
    
    $check = mysqli_query($conn, "SELECT * FROM customer a JOIN corporate b JOIN corp_discount c 
                                    ON a.cust_id=b.cust_id AND b.corp_reg_no=c.corp_reg_no 
                                    WHERE a.email = '$cust_name' limit 0,1");
    $result = mysqli_fetch_array($check);
    if ($result) {
        return $result;
    }
    else {
        return 'Fail';
        exit;
    }
}



?>