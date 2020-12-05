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
	<script type="text/javascript" src="js/logSignCheck.js"></script>
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
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="login.php">Login</a></li>
					<li><a href="signup.php">Signup</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container container-small">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2>Login</h2>
			<div class="form-group">
				Do not have account now? <a href="signup.php">Signup</a>
			</div>
			<form action="checkLogin.php" method="post">
				<div class="form-group">
					<label for="">email</label>
					<input type="text" class="form-control" id="email" name="email" onblur="checkMail('email'); checkNull('email','email');">
					<p id="mess_email" class="mess-check"></p>
				</div>
				<div class="form-group">
					<label for="">password</label>
					<input type="password" class="form-control" id="password" name="password" onblur="checkNull('password','password');">
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block" type="submit" name="submit">LOGIN</button>
				</div>
				<div class="form-group">
					<a href="forgetPW.php">Forget password?</a>
				</div>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
    <div id="mess_total" class="mess-check-total"></div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>
</html>