<?php
	require_once ('./php_operation/common.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
	include ('./php_operation/conn.php');
	include ('./php_operation/empRentSql.php');
	if (!isset($_POST['edit'])) { // whether click the button
    	$service_id = get_service_id('service_id');
	} else {
		$service_id = $_POST['edit'];
		set_service_id($service_id);
	}
	$service_res = select_detail($conn, $service_id);

	$cust_id = $service_res['cust_id'];
    $cust_type = $service_res['cust_type'];
    $coupon_id = select_coupon_id($conn, $cust_id);
    if ($cust_type == "I") {
	    $service_res['discount'] = select_coupon_discount($conn, $coupon_id);
    } else {
    	$service_res['discount'] = select_corp_discount($conn, $cust_id);
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
				<div class="row">
					<h2>Edit Services/Invoice</h2>	
					<div>
						<form action="./php_operation/changeRent.php" method="post">
							<div class="row">
								<div class="col-md-6">
									<h4 style="color:#AAAA55;">Change Services</h4>
									<div class="form-group">
										<label for="">service_id</label>
										<input type="text" class="form-control" id="service_id" name="service_id" value="<?php echo $service_res['service_id'] ?>" readonly="readonly">
									</div>
									<div class="form-group">
										<label for="">pickup date</label>
										<input type="text" class="form-control" id="pick_date" name="pick_date" value="<?php echo $service_res['pick_date'] ?>" required=required>
									</div>
									<div class="form-group">
										<label for="">dropoff date</label>
										<input type="text" class="form-control" id="drop_date" name="drop_date" value="<?php echo $service_res['drop_date'] ?>" required=required>
									</div>
									<div class="form-group">
										<label for="">start odometer</label>
										<input type="text" class="form-control" id="start_odometer" name="start_odometer" value="<?php echo $service_res['start_odometer'] ?>" required=required>
									</div>
									<div class="form-group">
										<label for="">end odometer</label>
										<input type="text" class="form-control" id="end_odometer" name="end_odometer" value="<?php echo $service_res['end_odometer'] ?>" required=required>
									</div>
									<div class="form-group">
										<label for="">daily limit</label>
										<input type="text" class="form-control" id="d_limit" name="d_limit" value="<?php echo $service_res['d_limit'] ?>" readonly="readonly">
									</div>
									<div class="form-group">
										<label for="">vin</label>
										<input type="text" class="form-control" id="vin" name="vin" value="<?php echo $service_res['vin'] ?>" required=required>
									</div>
									<div class="form-group">
										<label for="">pickup location id</label>
										<input type="text" class="form-control" id="pick_location_id" name="pick_location_id" value="<?php echo $service_res['pick_location_id'] ?>" required=required>
									</div>
									<div class="form-group">
										<label for="">dropoff location id</label>
										<input type="text" class="form-control" id="drop_location_id" name="drop_location_id" value="<?php echo $service_res['drop_location_id'] ?>" required=required>
									</div>
									<div class="form-group">
										<label for="">discount</label>
										<input type="text" class="form-control" id="discount" name="discount" value="<?php echo $service_res['discount'] ?>" readonly=readonly>
									</div>
								</div>
								<div class="col-md-6">
									<h4 style="color:#AAAA55;">Change Invoice</h4>	
									<div class="form-group">
										<label for="">invoice_id</label>
										<input type="text" class="form-control" id="invoice_id" name="invoice_id" value="<?php echo $service_res['invoice_id'] ?>" readonly="readonly">
									</div>
									<div class="form-group">
										<label for="">invoice date</label>
										<input type="text" class="form-control" id="invoice_date" name="invoice_date" value="<?php echo $service_res['invoice_date'] ?>" required=required>
									</div>
									<div class="form-group">
										<label for="">invoice amount</label>
										<input type="text" class="form-control" id="invoice_amount" name="invoice_amount" value="<?php echo $service_res['invoice_amount'] ?>" readonly="readonly">
									</div>
									<div class="form-group">
										<label for="">invoice status</label>
										<input type="text" class="form-control" id="invoice_status" name="invoice_status" value="<?php echo $service_res['status'] ?>" readonly="readonly">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3"></div>
								<div class="col-md-6">
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit" name="submit">Finish</button>
									</div>
								</div>
								<div class="col-md-3"></div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>