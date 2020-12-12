<?php
	include ('./php_operation/conn.php');
	require_once ('./php_operation/common.php');
	require_once ('./php_operation/empCouponSql.php');
	require_once ('./php_operation/customer.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
	$customer_type = getCookieVal('cookie_ctype');
	if (!isset($_POST['editCoupon'])) { // whether click the button
    	$coupon_id = get_coupon_id('coupon_id');
	} else {
		$coupon_id = $_POST['editCoupon'];
		set_coupon_id($coupon_id);
	}
	$coupon_res = select_coupon($conn, $coupon_id);
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
			<h2>Add Corporate Discount</h2>
			<form action="./php_operation/addDiscount.php" method="post">
				<div class="form-group">
					<label for="">corp_reg_no</label>
					<input type="text" class="form-control" id="corp_reg_no" name="corp_reg_no" required=required>
				</div>
				<div class="form-group">
					<label for="">corp_name</label>
					<input type="text" class="form-control" id="corp_name" name="corp_name" required=required>
				</div>
				<div class="form-group">
					<label for="">corp_dis</label>
					<input type="text" class="form-control" id="corp_dis" name="corp_dis" required=required>
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block" type="submit" name="submit">Add Corporate Discount</button>
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