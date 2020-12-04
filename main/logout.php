<?php

require_once ('./php_operation/common.php');

// clear the cookies
logout();

// redict homepage
header('location: home.php');

?>