<?php /* --- connect to the database --- */

$conn = mysqli_connect("localhost", "root", "", "rental");
if(!$conn) {
    die("Fail Connection With Database: " .mysqli_error());
}

// set character
mysqli_query($conn, "set names utf8");

// select the database
mysqli_select_db($conn, "rental");

?>