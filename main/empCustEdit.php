<?php
	include ('./php_operation/conn.php');
	require_once ('./php_operation/common.php');
	require_once ('./php_operation/customer.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
	$customer_type = getCookieVal('cookie_ctype');
	if (!isset($_POST['editEmail'])) { // whether click the button
    	$cust_name = get_cust_name('cust_name');
	} else {
		$cust_name = $_POST['editEmail'];
		set_cust_name($cust_name);
	}
	$cust_type = select_cust_type($conn, $cust_name)['cust_type'];
	if ($cust_type == 'I') { // individual
		$cust_res = select_individual($conn, $cust_name);
	}
	else { // corporation
		$cust_res = select_corp($conn, $cust_name);
	}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/sideBar.css">
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="home.php" class="navbar-brand"></a>
			</div>
			<label id="toggle-label" class="visible-xs-inline-block" for="toggle-checkbox">Menu</label>
			<input id="toggle-checkbox" type="checkbox" class="hidden">
			<div class="hidden-xs">
				<ul class="nav navbar-nav">
					<li><a href="home.php">Home</a></li>
					<li><a href="location.php">Location</a></li>
					<li><a href="car.php">Car</a></li>
					<?php if (empty($user_name)): ?>
						<li></li>
					<?php endif ?>
					<?php if ($user_type == 'CUSTOMER'): ?>
						<li><a href="custProfile.php">Customer</a></li>
					<?php endif ?>
					<?php if ($user_type == 'EMPLOYEE' || $user_type == 'ADMIN'): ?>
						<li class="active"><a href="empRent.php">Employee</a></li>
					<?php endif ?>
				</ul>
				<?php if (!empty($user_name)): ?>
					<ul class="nav navbar-nav navbar-right">
						<li><div style="margin-top: 15px; color: #AAAA55;">Welcome! <?php echo $user_name; ?></div></li>
					    <li><a href="logout.php">Logout</a></li>
					</ul>	
				<?php endif ?>
				<?php if (empty($user_name)): ?>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="login.php">Login</a></li>
						<li><a href="signup.php">Signup</a></li>
					</ul>
				<?php endif ?>
				
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col-md-2">
			<div class="list-group side-bar">
				<a href="empRent.php" class="list-group-item">Rent</a>
				<a href="empCustInfo.php" class="list-group-item active">Customer Message</a>
				<a href="empLocInfo.php" class="list-group-item">Location Message</a>
				<a href="empCarInfo.php" class="list-group-item">Car Message</a>
				<a href="empCoupon.php" class="list-group-item">Coupon Message</a>
				<?php if ($user_type == 'ADMIN'): ?>
					<a href="adminEmp.php" class="list-group-item">Employee Message</a>
				<?php endif ?>
			</div>
		</div>
		<div class="col-md-10">
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-4"></div>
				<a <?php if ($cust_type == 'I'): ?>href="custIndiChange.php"<?php endif ?> 
				   <?php if ($cust_type == 'C'): ?>href="custCorpChange.php"<?php endif ?> 
				>
					<button class="col-md-4 btn btn-primary">
					Change Profile</button>
				</a>
			</div>
			<table class="table table-striped">
			<tr>
				<th>Type</th><td><?php echo $cust_res['cust_type'] ?></td>
			</tr>
			<tr>	
				<th>Email</th><td><?php echo $cust_res['email'] ?></td>
			</tr>
			<tr>
				<th>First Name</th><td><?php echo $cust_res['fname'] ?></td>
			</tr>
			<tr>
				<th>Last Name</th><td><?php echo $cust_res['lname'] ?></td>
			</tr>
			<tr>	
				<th>Phone Number</th><td><?php echo $cust_res['cust_phone_no'] ?></td>
			</tr>
			<tr>
				<th>Street</th><td><?php echo $cust_res['cust_street'] ?></td>
			</tr>
			<tr>
				<th>City</th><td><?php echo $cust_res['cust_city'] ?></td>
			</tr>
			<tr>
				<th>State</th><td><?php echo $cust_res['cust_state'] ?></td>
			</tr>
			<tr>
				<th>Zipcode</th><td><?php echo $cust_res['cust_zipcode'] ?></td>
			</tr>
			
			<?php if ($customer_type == 'I'): ?>	
			<tr>
				<th>Driver Licence Number</th><td><?php echo $cust_res['driver_lno'] ?></td>
			</tr>
			<tr>
				<th>Insurance Company</th><td><?php echo $cust_res['insur_cop_name'] ?></td>
			</tr>
			<tr>
				<th>Insurance Policy Number</th><td><?php echo $cust_res['insur_pol_no'] ?></td>		
			<?php endif ?>
			<?php if ($customer_type == 'C'): ?>	
			<tr>
				<th>Employee Id</th><td><?php echo $cust_res['emp_id'] ?></td>
			</tr>
			<tr>
				<th>Corporation Register Number</th><td><?php echo $cust_res['corp_reg_no'] ?></td>
			</tr>
			<tr>
				<th>Corporation Name</th><td><?php echo $cust_res['corp_name'] ?></td>		
			<?php endif ?>
				


			</tr>
			</table>

		</div>
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>