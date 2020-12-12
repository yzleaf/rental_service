<?php
	include ('./php_operation/conn.php');
	require_once ('./php_operation/common.php');
	require_once ('./php_operation/db_car_info.php');
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
				<a href="empRent.php" class="list-group-item">Rent</a>
				<a href="empCustInfo.php" class="list-group-item">Customer Message</a>
				<a href="empLocInfo.php" class="list-group-item">Location Message</a>
				<a href="empCarInfo.php" class="list-group-item active">Car Message</a>
				<a href="empClass.php" class="list-group-item">Class Message</a>
				<a href="empCoupon.php" class="list-group-item">Coupon Message</a>
				<?php if ($user_type == 'ADMIN'): ?>
					<a href="adminEmp.php" class="list-group-item">Employee Message</a>
				<?php endif ?>
			</div>
		</div>
		<div class="col-md-10">
			<div>
				<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-4"></div>
					<a href="empCarAdd.php">
						<button class="col-md-4 btn btn-primary">Add Car</button>
					</a>	
				</a>
			</div>
			<div class="row" style="margin-bottom: 20px;">
				<table class="table table-striped" style="margin-top: 30px;">
					<tr>
						<th>VIN</th>
						<th>Make</th>
						<th>Model</th>
						<th>Produce Date</th>
						<th>Lincense Plate Number</th>
						<th>Class</th>
						<th>Rental Rate</th>
						<th>Over fee</th>
						<th>Location ID</th>
						<th></th>
					</tr>
					<?php 
						$allCar = allCar($conn);
						while ($row = mysqli_fetch_array($allCar)) {
							print <<< EOF
									<tr>
										<td>$row[vin]</td>
										<td>$row[make]</td>
										<td>$row[model]</td>
										<td>$row[year]</td>
										<td>$row[lpn]</td>
										<td>$row[class_name]</td>
										<td>$row[rental_rate]</td>
										<td>$row[over_fee]</td>
										<td>$row[location_id]</td>
										<td><form action="empCarEdit.php" method="post"><button name="edit_car" 
												value="$row[vin]" type="submit">edit</button></form></td>
									</tr>
							EOF;

						}
					?>
				</table>
					
			</div>
		</div>
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>