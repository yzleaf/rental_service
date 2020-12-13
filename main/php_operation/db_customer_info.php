<?php

function select_cust_type($conn, $cust_name) {
    $check = mysqli_query($conn, "SELECT cust_type FROM customer 
                                  WHERE email = '$cust_name' limit 0,1");
    $result = mysqli_fetch_array($check);
    if ($result) {
        return $result;
    }
    else {
        return 'F';
        exit;
    }

}

function select_individual($conn, $cust_name) {
    
    $check = mysqli_query($conn, "SELECT * FROM customer a JOIN individual b ON a.cust_id=b.cust_id
                                    WHERE a.email = '$cust_name' limit 0,1");
    $result = mysqli_fetch_array($check);
    if ($result) {
        return $result;
    }
    else {
        return 'F';
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
        return 'F';
        exit;
    }
}



function update_individual($conn, $cust_info) {
    
    mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically
    
    // 0: get u_id to set the table of customer/individual/corporate id
    $check = mysqli_query($conn, "SELECT u_id FROM user_password WHERE username = '$cust_info[username]' limit 0,1");
    $result = mysqli_fetch_array($check);
    if ($result) {
        $cust_id = $result['u_id'];
    }
    else {
        return 'F';
        exit(mysqli_error($conn));
    }

    // ----- Begin -----
    mysqli_begin_transaction($conn);

    // 1: update user_password table
    $sql_update_user_pw = "UPDATE user_password 
                            SET password='$cust_info[password]' 
                            WHERE u_id='$cust_id'";
    $result = mysqli_query($conn, $sql_update_user_pw);
    if ($result) { // success   
    }
    else {
        mysqli_query($conn, "ROLLBACK");
        return 'F';
        exit(mysqli_error($conn));
    }

    // 2: update customer table
    $sql_update_customer = "UPDATE customer
                            SET fname='$cust_info[first_name]', lname='$cust_info[last_name]',
                            cust_street='$cust_info[street]', cust_city='$cust_info[city]',
                            cust_state='$cust_info[state]', cust_zipcode='$cust_info[zipcode]',
                            cust_phone_no='$cust_info[phone]'
                            WHERE cust_id='$cust_id'";
    $result = mysqli_query($conn, $sql_update_customer);
    if ($result) { // success 
    }
    else {
        mysqli_query($conn, "ROLLBACK");
        return 'F';
        exit(mysqli_error($conn));
    }

    // 3: update individual table
    $sql_update_individual = "UPDATE individual 
                            SET driver_lno='$cust_info[driver_lno]', insur_cop_name='$cust_info[insur_cop_name]', 
                                insur_pol_no='$cust_info[insur_pol_no]' 
                            WHERE cust_id='$cust_id'";
    $result = mysqli_query($conn, $sql_update_individual);
    if ($result) { // success 

    }
    else {
        mysqli_query($conn, "ROLLBACK");
        return 'F';
        exit(mysqli_error($conn));
    }


    mysqli_commit($conn); 
    // ----- End -----

    mysqli_query($conn, "SET AUTOCOMMIT=1"); //set submit automatically as the begining

    return 'T';

}

function update_corp($conn, $cust_info) {

    mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically
    
    // 0: get u_id to set the table of customer/individual/corporate id
    $check = mysqli_query($conn, "SELECT u_id FROM user_password WHERE username = '$cust_info[username]' limit 0,1");
    $result = mysqli_fetch_array($check);
    if ($result) {
        $cust_id = $result['u_id'];
    }
    else {
        return 'F';
        exit(mysqli_error($conn));
    }

    // ----- Begin -----
    mysqli_begin_transaction($conn);

    // 1: update user_password table
    $sql_update_user_pw = "UPDATE user_password 
                            SET password='$cust_info[password]' 
                            WHERE u_id='$cust_id'";
    $result = mysqli_query($conn, $sql_update_user_pw);
    if ($result) { // success   
    }
    else {
        print_r(mysqli_error($conn));
        mysqli_query($conn, "ROLLBACK");
        return 'F';
        exit(mysqli_error($conn));
    }

    // 2: update customer table
    $sql_update_customer = "UPDATE customer
                            SET fname='$cust_info[first_name]', lname='$cust_info[last_name]',
                            cust_street='$cust_info[street]', cust_city='$cust_info[city]',
                            cust_state='$cust_info[state]', cust_zipcode='$cust_info[zipcode]',
                            cust_phone_no='$cust_info[phone]'
                            WHERE cust_id='$cust_id'";
    $result = mysqli_query($conn, $sql_update_customer);
    if ($result) { // success 
    }
    else {
        print_r(mysqli_error($conn));
        mysqli_query($conn, "ROLLBACK");
        return 'F';
        exit(mysqli_error($conn));
    }

    // 3: update corporate table
    $sql_update_corporate = "UPDATE corporate 
                            SET emp_id='$cust_info[emp_id]', corp_reg_no='$cust_info[corp_reg_no]' 
                            WHERE cust_id='$cust_id'";
    $result = mysqli_query($conn, $sql_update_corporate);
    if ($result) { // success 

    }
    else {
        print_r(mysqli_error($conn));
        mysqli_query($conn, "ROLLBACK");
        return 'F';
        exit(mysqli_error($conn));
    }

    // 4: update coporate discount table
    $sql_update_corp_dis = "UPDATE corp_discount 
                            SET corp_name='$cust_info[corp_name]' 
                            WHERE corp_reg_no='$cust_info[corp_reg_no]'";
    $result = mysqli_query($conn, $sql_update_corp_dis);
    if ($result) { // success 

    }
    else {
        print_r(mysqli_error($conn));
        mysqli_query($conn, "ROLLBACK");
        return 'F';
        exit(mysqli_error($conn));
    }

    mysqli_commit($conn); 
    // ----- End -----

    mysqli_query($conn, "SET AUTOCOMMIT=1"); //set submit automatically as the begining

    return 'T';
}

function delete_indi($conn, $cust_name) {
    mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically
    
    // 0: get u_id to set the table of customer/individual/corporate id
    $check = mysqli_query($conn, "SELECT u_id FROM user_password WHERE username = '$cust_name' limit 0,1");
    $result = mysqli_fetch_array($check);
    if ($result) {
        $cust_id = $result['u_id'];
    }
    else {
        return 'F0';
        exit(mysqli_error($conn));
    }

    // 1: check whether there is unfinished or unpaid invoice
    // if yes, can't delete, customer should pay all invoices
    $check = mysqli_query($conn, "SELECT invoice_id FROM invoice
                                  WHERE cust_id='$cust_id' and status<>'paid'");
    if (mysqli_fetch_array($check)) {
        return 'F1';
    }


    // ----- Begin -----
    mysqli_begin_transaction($conn);
    
    // 2: delete payment table
    $sql_delete_payment = "DELETE FROM payment 
                           WHERE invoice_id IN (SELECT invoice_id FROM invoice
                                                WHERE cust_id='$cust_id')
                          ";   
    $result = mysqli_query($conn, $sql_delete_payment);
    if ($result) { // success   
    }
    else {
        mysqli_query($conn, "ROLLBACK");
        return 'F2';
        exit(mysqli_error($conn));
    }

    // 3: delete invoice table
    $sql_delete_invoice = "DELETE FROM invoice 
                           WHERE cust_id='$cust_id'
                          ";   
    $result = mysqli_query($conn, $sql_delete_invoice);
    if ($result) { // success   
    }
    else {
        mysqli_query($conn, "ROLLBACK");
        return 'F3';
        exit(mysqli_error($conn));
    }

    // 4: delete in user_password table
    $sql_delete_user_pw = "DELETE 
                           FROM user_password 
                           WHERE u_id='$cust_id'";
    $result = mysqli_query($conn, $sql_delete_user_pw);
    if ($result) { // success   
    }
    else {
        mysqli_query($conn, "ROLLBACK");
        return 'F4';
        exit(mysqli_error($conn));
    }

    // 5: delete in individual table
    $sql_delete_individual = "DELETE 
                              FROM individual 
                              WHERE cust_id='$cust_id'";
    $result = mysqli_query($conn, $sql_delete_individual);
    if ($result) { // success 
    }
    else {
        mysqli_query($conn, "ROLLBACK");
        return 'F5';
        exit(mysqli_error($conn));
    }

    // 6: delete in customer table
    $sql_delete_customer = "DELETE 
                            FROM customer
                            WHERE cust_id='$cust_id'";
    $result = mysqli_query($conn, $sql_delete_customer);
    if ($result) { // success 
    }
    else {
        mysqli_query($conn, "ROLLBACK");
        return 'F6';
        exit(mysqli_error($conn));
    }

    mysqli_commit($conn); 
    // ----- End -----

    mysqli_query($conn, "SET AUTOCOMMIT=1"); //set submit automatically as the begining

    return 'T';
}

function delete_corp($conn, $cust_name) {
    mysqli_query($conn, "SET AUTOCOMMIT=0"); // not submit automatically
    
    // 0: get u_id to set the table of customer/individual/corporate id
    $check = mysqli_query($conn, "SELECT u_id FROM user_password WHERE username = '$cust_name' limit 0,1");
    $result = mysqli_fetch_array($check);
    if ($result) {
        $cust_id = $result['u_id'];
    }
    else {
        return 'F1';
        exit(mysqli_error($conn));
    }

    // ----- Begin -----
    mysqli_begin_transaction($conn);

    // 1: delete in user_password table
    $sql_delete_user_pw = "DELETE 
                           FROM user_password 
                           WHERE u_id='$cust_id'";
    $result = mysqli_query($conn, $sql_delete_user_pw);
    if ($result) { // success   
    }
    else {
        print_r(mysqli_error($conn));
        mysqli_query($conn, "ROLLBACK");
        return 'F2';
        exit(mysqli_error($conn));
    }

    // 2: delete in corporate table
    $sql_delete_corporate = "DELETE 
                             FROM corporate 
                             WHERE cust_id='$cust_id'";
    $result = mysqli_query($conn, $sql_delete_corporate);
    if ($result) { // success 

    }
    else {
        print_r(mysqli_error($conn));
        mysqli_query($conn, "ROLLBACK");
        return 'F3';
        exit(mysqli_error($conn));
    }

    // 3: delete in customer table
    $sql_delete_customer = "DELETE 
                            FROM customer
                            WHERE cust_id='$cust_id'";
    $result = mysqli_query($conn, $sql_delete_customer);
    if ($result) { // success 
    }
    else {
        print_r(mysqli_error($conn));
        mysqli_query($conn, "ROLLBACK");
        return 'F4';
        exit(mysqli_error($conn));
    }

    mysqli_commit($conn); 
    // ----- End -----

    mysqli_query($conn, "SET AUTOCOMMIT=1"); //set submit automatically as the begining

    return 'T';
    
}




?>