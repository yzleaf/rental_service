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
					<li class="active"><a href="home.php">Home</a></li>
					<li><a href="location.php">Location</a></li>
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
	<div class="container">
		<div class="col-md-2">
			<div class="list-group side-bar">
				<a href="custProfile.php" class="list-group-item active">Profile</a>
				<a href="custOrder.php" class="list-group-item">My Order</a>
			</div>
		</div>
		<div class="col-md-10">
			Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem dolor nostrum, atque amet animi numquam minima vel accusantium doloremque sit doloribus enim perferendis quasi sint necessitatibus quaerat dolores! Excepturi, beatae!
			Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem dolor nostrum, atque amet animi numquam minima vel accusantium doloremque sit doloribus enim perferendis quasi sint necessitatibus quaerat dolores! Excepturi, beatae!
			Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem dolor nostrum, atque amet animi numquam minima vel accusantium doloremque sit doloribus enim perferendis quasi sint necessitatibus quaerat dolores! Excepturi, beatae!
			Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem dolor nostrum, atque amet animi numquam minima vel accusantium doloremque sit doloribus enim perferendis quasi sint necessitatibus quaerat dolores! Excepturi, beatae!
			Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem dolor nostrum, atque amet animi numquam minima vel accusantium doloremque sit doloribus enim perferendis quasi sint necessitatibus quaerat dolores! Excepturi, beatae!
			<div class="col-md-offset-10" style="margin-top: 20px;">
				<button class="btn btn-primary btn-block" type="submit">Change Information</button>
			</div>
		</div>
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>