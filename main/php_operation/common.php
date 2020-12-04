<?php // define common functions for calling



function getCookieVal($key){ // eg.
    if(empty($_COOKIE[$key])){
        return "";
    }else{
        return $_COOKIE[$key];
        echo $_COOKIE[$key];
        exit();
    }
}


?>