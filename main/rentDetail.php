<?php
	require_once ('./php_operation/common.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
	include ('./php_operation/conn.php');
	include ('./php_operation/empRentSql.php');
	if (!isset($_POST['detail'])) { // whether click the button
    	$service_id = get_service_id('service_id');
	} else {
		$service_id = $_POST['detail'];
		set_service_id($service_id);
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
				<a href="empRent.php" class="list-group-item active">Rent</a>
				<a href="empCustInfo.php" class="list-group-item">Customer Message</a>
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
				<a href="empRent.php"><button class="col-md-4 btn btn-primary active">All</button></a>
				<a href="empRentStart.php"><button class="col-md-4 btn btn-primary">Start New</button></a>
				<a href="empRentEnd.php"><button class="col-md-4 btn btn-primary">End Order</button></a>
			</div>
			<div class="row" style="margin-bottom: 20px;">
				<h4 style="color:#AAAA55;">Basic Informaion</h4>
				<table class="table table-striped" style="margin-top: 30px;">
					<?php $service_res = select_detail($conn, $service_id); ?>
					<tr>
						<th>Status</th><td><?php echo $service_res['status']?></td>
					</tr>
					<tr>
						<th>Service_id</th><td><?php echo $service_res['service_id']?></td>
					</tr>
					<tr>	
						<th>Invoice_id</th><td><?php echo $service_res['invoice_id']?></td>
					</tr>
					<tr>
						<th>User Name</th><td><?php echo $service_res['email']?></td>
					</tr>
					<tr>
						<th>Pickup Date</th><td><?php echo $service_res['pick_date']?></td>
					</tr>
					<tr>
						<th>Dropoff Date</th><td><?php echo $service_res['drop_date']?></td>
					</tr>
					<tr>
						<th>Start Odometer</th><td><?php echo $service_res['start_odometer']?></td>
					</tr>
					<tr>
						<th>End Odometer</th><td><?php echo $service_res['end_odometer']?></td>
					</tr>
					<tr>
						<th>Limit</th><td><?php echo $service_res['d_limit']?></td>
					</tr>
					<tr>
						<th>Vin</th><td><?php echo $service_res['vin']?></td>
					</tr>
					<tr>
						<th>Pickup Location id</th><td><?php echo $service_res['pick_location_id']?></td>
					</tr>
					<tr>
						<th>Dropoff Location id</th><td><?php echo $service_res['drop_location_id']?></td>
					</tr>
					<tr>
						<th>Invoice Date</th><td><?php echo $service_res['invoice_date']?></td>
					</tr>
					<tr>
						<th>Invoice Amount</th><td><?php echo $service_res['invoice_amount']?></td>
					</tr>

				</table>
				<h4 style="color:#AAAA55;">Payment Informaion</h4>
				<table class="table table-striped" style="margin-top: 30px;">
					<tr>
						<th>Payment_id</th>
						<th>Payment Date</th>
						<th>Payment Method</th>
						<th>Payment Card Number</th>
	
					</tr>
					
				</table>
			</div>
		</div>
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>