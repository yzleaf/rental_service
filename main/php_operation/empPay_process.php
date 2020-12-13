<?php

// location add, edit, delete

include ('conn.php');
require_once ('common.php');
require_once ('db_pay.php');

if (!isset($_POST['submit'])) { // whether click the button
    exit('Error Access');
}
else {
}

$pay_info['invoice_id'] = invoice_id_get_session();
$pay_info['pay_method'] = $_POST['pay_method'];
$pay_info['pay_card_no'] = $_POST['pay_card_no'];
$pay_info['remain_pay'] = $_POST['remain_pay'];
$pay_info['pay_amount'] = $_POST['pay_amount'];

$pay_info['new_remain_amount'] =  $pay_info['remain_pay'] - $pay_info['pay_amount'];



$result = update_pay($conn, $pay_info);

// echo $result;
// die();

if ($result == 'T') { // success
    $pay_res = 'T';    
}
else {
    $pay_res = 'F';
}


set_flag_execute($pay_res);

// redict Status Result
if ($pay_info['new_remain_amount'] == 0) {
    header('location: ../totalCheck.php');
}
else {
    header('location: ../empPay_remain.php');
}

?>