<?php
    include ('./php_operation/conn.php');
	require_once ('./php_operation/common.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>index</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/swiper-bundle.min.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>  
    <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
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
					<li class="active"><a href="car.php">Car</a></li>
					<?php if (empty($user_name)): ?>
						<li></li>
					<?php endif ?>
					<?php if ($user_type == 'CUSTOMER'): ?>
						<li><a href="custProfile.php">Customer</a></li>
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
	<div class="row">
		<h2>Our Cars</h2>
	</div>
	<div class="container">
		<div class="row">
			<form action="" method="post">
			<div class="col-sm-3">
				<div class="input-group">
					<span class="input-group-addon">Make</span>
						<select class="form-control" name="make">
							<option value=" IS NOT NULL">All</option>
							<option value="='Benz'">Benz</option>
							<option value="='BMW'">BMW</option>
							<option value="='Audi'">Audi</option>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<span class="input-group-addon">Class</span>
						<select class="form-control" name="class">
							<option value=" IS NOT NULL">All</option>
							<option value="='small car'">small car</option>
							<option value="='mid-size car'">mid-size car</option>
							<option value="='SUV'">SUV</option>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<span class="input-group-addon">Location</span>
						<select class="form-control" name="location">
							<option value=" IS NOT NULL">All</option>
							<option value="='New York'">New York</option>
							<option value="='Pennsylvania'">Pennsylvania</option>
							<option value="='Massachusetts'">Massachusetts</option>
					</select>
				</div>
			</div>
			<div class="col-sm-offset-10">
				<a href="#" style="text-decoration:none;">
					<button class="btn btn-primary btn-block" type="submit" name="submit">Search Cars</button>
				</a>
			</div>
			</form>
		</div>
		<div class="row">
			<?php
				include('./php_operation/car_display.php');
			?>
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
					<th>Location</th>
				</tr>
				<?php 
					while ($row = mysqli_fetch_array($filter_result)) {
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
								</tr>
						EOF;
	                }
				?>	
			</table>

		</div>
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>
</html>



