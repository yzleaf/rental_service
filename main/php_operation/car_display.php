<?php

// include ('conn.php');

if (!isset($_POST['submit'])) { // whether click the button
    echo 'all';
}

else {
    $make = $_POST['make'];
    $class = $_POST['class'];
    $year = $_POST['year'];
    echo 'make:'.$make."<br>" .'class'.$class."<br>".'year'.$year."<br>";

}


?>