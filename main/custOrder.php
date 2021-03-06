<?php
	require_once ('./php_operation/common.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
	include ('./php_operation/conn.php');
    require_once ('./php_operation/empRentSql.php');
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
						<li class="active"><a href="custProfile.php">Customer</a></li>
					<?php endif ?>
					<?php if ($user_type == 'EMPLOYEE' || $user_type == 'ADMIN'): ?>
						<li><a href="empRent.php">Employee</a></li>
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
				<a href="custProfile.php" class="list-group-item">Profile</a>
				<a href="custOrder.php" class="list-group-item active">My Order</a>
			</div>
		</div>
		<div class="col-md-10">
			<div class="row" style="margin-bottom: 20px;">
				<table class="table table-striped" style="margin-top: 30px;">
					<tr>
						<th>Service_id</th>
						<th>Invoice_id</th>
						<th>User Name</th>
						<th>status</th>
						<th>pay</th>
						<th>detail</th>
					</tr>
					<?php 
						$allRent_cust = allRent_cust($conn, $user_name);
						while ($row = mysqli_fetch_array($allRent_cust)) {
							print <<< EOF
									<tr>
										<td>$row[service_id]</td>
										<td>$row[invoice_id]</td>
										<td>$user_name</td>
										<td>$row[status]</td>
										<td><form action="empPay.php" method="post" onsubmit="return checkPay('$row[status]');">
										    <button name="pay" 
										       value="$row[invoice_id]" type="submit">pay</button></form></td>
										<td><form action="rentDetail.php" method="post"><button name="detail" 
										       value="$row[service_id]" type="submit">detail</button></form></td>
									
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