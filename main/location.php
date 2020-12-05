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
	<title>index</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/swiper-bundle.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/location.css">
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
					<li class="active"><a href="location.php">Location</a></li>
					<li><a href="car.php">Car</a></li>
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
	<div>
		<div class="row">
			<h2>Our Rental Offices Location</h2>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" style="color: #666">
				<div>
					Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore sint illum omnis blanditiis minima dolor delectus sit at, id mollitia iure nulla dignissimos nam amet excepturi sapiente ratione expedita tempora?
			    </div>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div id="myMap">
			<form action="locDetail.php" target="_blank">
				<input class="hidden" name="loc1" value="#">
				<button type="submit" class="map-btn" style="top:185px; left:1100px;">1</button>
			</form>
			<form action="locDetail.php" target="_blank">
				<input class="hidden" name="loc2" value="#">
				<button type="submit" class="map-btn" style="top:260px; left:1050px;">2</button>
			</form>
			<form action="locDetail.php" target="_blank">
				<input class="hidden" name="loc3" value="#">
				<button type="submit" class="map-btn" style="top:160px; left:1221px;">3</button>
			</form>
			<form action="locDetail.php" target="_blank">
				<input class="hidden" name="loc4" value="#">
				<button type="submit" class="map-btn" style="top:400px; left:100px;">4</button>
			</form>
			<form action="locDetail.php" target="_blank">
				<input class="hidden" name="loc5" value="#">
				<button type="submit" class="map-btn" style="top:580px; left:580px;">5</button>
			</form>
		</div>
	</div>
	<div class="footer" style="margin-top: 930px; padding: 0;">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>
</html>



