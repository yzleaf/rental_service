<?php // define common functions for calling

function getCookieVal($cookie_name) { // $key is the information(id/type) of user
    if (empty($_COOKIE[$cookie_name])) { // null, not log in
        return "";
    }
    else {
        return $_COOKIE[$cookie_name];
        // echo $_COOKIE[$cookie_name];
        exit();
    }
}


function login($name, $utype, $ctype) {
    setcookie ( 'cookie_uname', $name);
    setcookie ( 'cookie_utype', $utype);
    setcookie ( 'cookie_ctype', $ctype);
}

function logout() {
    setcookie ( 'cookie_uname', "");
    setcookie ( 'cookie_utype', "");
    setcookie ( 'cookie_ctype', "");
}

// function set_flag_execute($flag) {
//     setcookie ( 'cookie_flag_exe', $flag);
// }

// function clear_flag_execute() {
//     setcookie ( 'cookie_flag_exe', "");
// }

function set_flag_execute($flag) {
    session_start();
    $_SESSION['session_flag'] = $flag;
}

function get_session_value($addr) {
    session_start();
    return $_SESSION[$addr];
}

function clear_flag_execute() {
    session_start();
    unset($_SESSION['session_flag']);
}

function set_cust_name($name) {
    session_start();
    $_SESSION['cust_name'] = $name;
}

function get_cust_name($addr) {
    session_start();
    return $_SESSION[$addr];
}









?>