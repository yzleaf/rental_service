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


function login($name, $type) {
    setcookie ( 'cookie_uname', $name);
    setcookie ( 'cookie_utype', $type);
}

function logout() {
    setcookie ( 'cookie_uname', "");
    setcookie ( 'cookie_utype', "");
}

?>