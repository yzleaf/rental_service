<?php
	require_once ('./php_operation/common.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
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
				<a href="empClass.php" class="list-group-item">Class Message</a>
				<a href="empCoupon.php" class="list-group-item">Coupon Message</a>
				<?php if ($user_type == 'ADMIN'): ?>
					<a href="adminEmp.php" class="list-group-item">Employee Message</a>
				<?php endif ?>
			</div>
		</div>
		<div class="col-md-10">
			<div class="row" style="margin-bottom: 20px;">
				<a href="empRent.php"><button class="col-md-4 btn btn-primary">All</button></a>
				<a href="empRentStart.php"><button class="col-md-4 btn btn-primary active">Start New</button></a>
				<a href="empRentEnd.php"><button class="col-md-4 btn btn-primary">End Order</button></a>
			</div>
			<div>
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form action="./php_operation/startRent.php" method="post">
						<div class="form-group">
							<label for="">service_id</label>
							<input type="text" class="form-control" id="service_id" name="service_id" value="" required="required">
						</div>
						<div class="form-group">
							<label for="">user_name</label>
							<input type="text" class="form-control" id="user_name" name="user_name" value="" required="required">
						</div>
						<div class="form-group">
							<label for="">pick_date</label>
							<input type="text" class="form-control" id="pick_date" name="pick_date" value="" required=required>
						</div>
						<div class="form-group" hidden=hidden>
							<label for="">drop_date</label>
							<input type="text" class="form-control" id="drop_date" name="drop_date" value="2999-01-01" required=required readonly="readonly">
						</div>
						<div class="form-group">
							<label for="">start_odometer</label>
							<input type="text" class="form-control" id="start_odometer" name="start_odometer" value="" required=required>
						</div>
						<div class="form-group" hidden=hidden>
							<label for="">end_odometer</label>
							<input type="text" class="form-control" id="end_odometer" name="end_odometer" value="9999" required=required readonly="readonly">
						</div>
						<div class="form-group">
							<label for="">d_limit</label>
							<input type="text" class="form-control" id="d_limit" name="d_limit" value="No">
						</div>
						<div class="form-group">
							<label for="">vin</label>
							<input type="text" class="form-control" id="vin" name="vin" value="" required=required>
						</div>
						<div class="form-group">
							<label for="">pick_location_id</label>
							<input type="text" class="form-control" id="pick_location_id" name="pick_location_id" value="" required=required>
						</div>
						<div class="form-group" hidden=hidden>
							<label for="">drop_location_id</label>
							<input type="text" class="form-control" id="drop_location_id" name="drop_location_id" value="9999" required=required readonly="readonly">
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-block" type="submit" name="submit">Start New Rental</button>
						</div>
					</form>

				</div>
				<div class="col-md-2"></div>
				
			</div>
		</div>
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>