<?php 

	function allCust($conn) {
		$check = mysqli_query($conn, "SELECT email, fname, lname, cust_type FROM customer");
		return $check;
	}

	function allIndi($conn) {
		$check = mysqli_query($conn, "SELECT email, fname, lname, cust_type FROM customer 
			                          WHERE cust_type='I'");
		return $check;
	}

	function allCorp($conn) {
		$check = mysqli_query($conn, "SELECT email, fname, lname, cust_type FROM customer 
			                          WHERE cust_type='C'");
		return $check;
	}
?>