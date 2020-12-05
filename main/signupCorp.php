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
	<title>signup</title>
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
					<li><a href="login.php">Login</a></li>
					<li class="active"><a href="signup.php">Signup</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container container-small">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2>Signup</h2>
			<form action="checkSignup.php" method="post">
				<div class="form-group">
					<label for="" style="font-size:150%; color:#AAAA55;">Corporate Customer</label>
					<input class="hidden" name="cust_type" value="C">
			    </div>
				<div class="form-group">
					<div class="col-md-6">
						<label for="">first name</label>
						<input type="text" class="form-control" id="first-name" name="first-name" onblur="checkNull('first-name','first-name');">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label for="">last name</label>
						<input type="text" class="form-control" id="last-name" name="last-name" onblur="checkNull('last-name','last-name');">
					</div>
				</div>
				<div class="form-group">
					<label for="">email address</label>
					<input type="text" class="form-control" id="email" name="email" onblur="checkMail('email'); checkNull('email','email');">
					<p id="mess_email" class="mess-check"></p>
				</div>
				<div class="form-group">
					<label for="">phone number</label>
					<input type="text" class="form-control" id="phone" name="phone" onblur="checkPhone('phone'); checkNull('phone','phone');">
					<p id="mess_phone" class="mess-check"></p>
				</div>
				<div class="form-group">
					<label for="">password</label>
					<input type="password" class="form-control" id="password" name="password" onblur="checkNull('password','password');">
				</div>
			    <div class="form-group">
					<label for="">street</label>
					<input type="text" class="form-control" id="street" name="street" onblur="checkNull('street','street');">
				</div>
				<div class="form-group">
					<label for="">city</label>
					<input type="text" class="form-control" id="city" name="city" onblur="checkNull('city','city');">
				</div>
				<div class="form-group">
					<label for="">state</label>
					<input type="text" class="form-control" id="state" name="state" onblur="checkNull('state','state');">
				</div>
				<div class="form-group">
					<label for="">zip code</label>
					<input type="text" class="form-control" id="zip-code" name="zip-code" onblur="checkZipCode('zip-code'); checkNull('zip-code','zip-code');">
					<p id="mess_zip" class="mess-check"></p>
				</div>
				<div class="form-group">
					<label for="">employee id</label>
					<input type="text" class="form-control" id="dln" name="emp_id" onblur="checkNull('dln','dln');">
				</div>
				<div class="form-group">
					<label for="">corporate registration number</label>
					<input type="text" class="form-control" id="iname" name="corp_num" onblur="checkNull('iname','iname');">
				</div>
				<div class="form-group">
					<label for="">corporation name</label>
					<input type="text" class="form-control" id="inum" name="corp_name" onblur="checkNull('inum','inum');">
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block" type="submit" name="submit">SIGNUP</button>
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