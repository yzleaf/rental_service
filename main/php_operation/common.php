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

?>