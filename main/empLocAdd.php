<?php
	include ('./php_operation/conn.php');
	require_once ('./php_operation/common.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
	$customer_type = getCookieVal('cookie_ctype');
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
		<div class="container container-small">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2>Add Location</h2>
			<form action="./php_operation/emp_loc_check.php" method="post">
				<div class="form-group">
					<label for="">location id</label>
					<input type="text" class="form-control" id="location_id" name="location_id" required="required">
				</div>
				<div class="form-group">
					<label for="">street</label>
					<input type="text" class="form-control" id="loc_street" name="loc_street" required=required>
				</div>
				<div class="form-group">
					<label for="">city</label>
					<input type="text" class="form-control" id="loc_city" name="loc_city" required=required>
				</div>
				<div class="form-group">
					<label for="">state</label>
					<input type="text" class="form-control" id="loc_state" name="loc_state" required=required>
				</div>
				<div class="form-group">
					<label for="">zip code</label>
					<input type="text" class="form-control" id="loc_zipcode" name="loc_zipcode" required=required>
				</div>
				<div class="form-group">
					<label for="">phone number</label>
					<input type="text" class="form-control" id="loc_phone_num" name="loc_phone_num" required=required>
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block" type="submit" name="submit" value="add">Add Location</button>
				</div>
			</form>
		</div>
		<div class="col-md-3"></div>	
	</div>
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>