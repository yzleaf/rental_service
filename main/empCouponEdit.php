<?php
	include ('./php_operation/conn.php');
	require_once ('./php_operation/common.php');
	require_once ('./php_operation/empCouponSql.php');
	require_once ('./php_operation/customer.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
	$customer_type = getCookieVal('cookie_ctype');
	if (!isset($_POST['editCoupon'])) { // whether click the button
    	$corp_reg_no = get_corp_reg_no('corp_reg_no');
	} else {
		$corp_reg_no = $_POST['editCoupon'];
		set_corp_reg_no($corp_reg_no);
	}
	$coupon_res = select_discount($conn, $corp_reg_no);
	
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
				<a href="empCustInfo.php" class="list-group-item">Customer Message</a>
				<a href="empLocInfo.php" class="list-group-item">Location Message</a>
				<a href="empCarInfo.php" class="list-group-item">Car Message</a>
				<a href="empClass.php" class="list-group-item">Class Message</a>
				<a href="empCoupon.php" class="list-group-item active">Coupon Message</a>
				<?php if ($user_type == 'ADMIN'): ?>
					<a href="adminEmp.php" class="list-group-item">Employee Message</a>
				<?php endif ?>
			</div>
		</div>
		<div class="col-md-10">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<h2>Change Discount</h2>
				<form action="./php_operation/changeDiscount.php" method="post">
					<div class="form-group">
						<label for="">corporation register number</label>
						<input type="text" class="form-control" id="corp_reg_no" name="corp_reg_no" value="<?php echo $coupon_res['corp_reg_no'] ?>" readonly="readonly">
					</div>
					<div class="form-group">
						<label for="">corporation name</label>
						<input type="text" class="form-control" id="corp_name" name="corp_name" value="<?php echo $coupon_res['corp_name'] ?>" required=required>
					</div>
					<div class="form-group">
						<label for="">corporation discount</label>
						<input type="text" class="form-control" id="corp_dis" name="corp_dis" value="<?php echo $coupon_res['corp_dis'] ?>" required=required>
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-block" type="submit" name="submit">Finish</button>
					</div>
				</form>

			</div>
			<div class="col-md-2"></div>
			
		</div>	
	
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>