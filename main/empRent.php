<?php
	require_once ('./php_operation/common.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
	include ('./php_operation/conn.php');
    include ('./php_operation/empRentSql.php');
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
				<a href="empRent.php"><button class="col-md-4 btn btn-primary active">All</button></a>
				<a href="empRentStart.php"><button class="col-md-4 btn btn-primary">Start New</button></a>
				<a href="empRentEnd.php"><button class="col-md-4 btn btn-primary">End Order</button></a>
			</div>
			<div class="row" style="margin-bottom: 20px;">
				<table class="table table-striped" style="margin-top: 30px;">
					<tr>
						<th>Service_id</th>
						<th>Invoice_id</th>
						<th>status</th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
					<?php 
						$allRent = allRent($conn);
						while ($row = mysqli_fetch_array($allRent)) {
							print <<< EOF
									<tr>
										<td>$row[service_id]</td>
										<td>$row[invoice_id]</td>
										<td>$row[status]</td>
										<td><form action="empPay.php" method="post" onsubmit="return checkPay('$row[status]');">
										    <button name="pay" 
										       value="$row[invoice_id]" type="submit">pay</button></form></td>
										<td><form action="rentDetail.php" method="post"><button name="detail" 
										       value="$row[service_id]" type="submit">detail</button></form></td>
										<td><form action="rentEdit.php" method="post" onsubmit="return checkEdit('$row[status]');">
										    <button name="edit" 
										       value="$row[service_id]" type="submit">edit</button></form></td>		
										<td><form action="rentDelete.php" method="post" onsubmit="return checkDelete('$row[status]');">
										    <button name="delete" 
										       value="$row[service_id]" type="submit"">delete</button></form></td>
									</tr>
									
							EOF;
						}
						
					?>
					<script>
						function checkPay(obj) {
							var status = obj.toString();
							if (status == "paid") {
								alert('ALREADY PAID! Cannot pay again');
								return false;
							} 
							if (status == "unfinished") {
								alert('UNFINISHED! Cannot pay now');
								return false;
							}
							return true;
						}

						function checkDelete(obj) {
		                    var status = obj.toString();
							if (status == "unpaid") {
								alert('UNPAID! Cannot Delete');
								return false;
							} 
							if (status == "unfinished") {
								alert('UNFINISHED! Cannot delete now');
								return false;
							}
							return true;
						}

						function checkEdit(obj) {
							var status = obj.toString();
							if (status == "unpaid") {
								alert('UNPAID! Cannot Edit');
								return false;
							} 
							if (status == "paid") {
								alert('ALREADY PAID! Cannot Edit');
								return false;
							}
							return true;
						}
					</script>
					
				</table>
			</div>
		</div>
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>