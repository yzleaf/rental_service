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
				<a href="index.html" class="navbar-brand"></a>
			</div>
			<label id="toggle-label" class="visible-xs-inline-block" for="toggle-checkbox">Menu</label>
			<input id="toggle-checkbox" type="checkbox" class="hidden">
			<div class="hidden-xs">
				<ul class="nav navbar-nav">
					<li><a href="index.html">Home</a></li>
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
			<form action="">
				<div class="form-group">
					<label for="" style="font-size:150%; color:#AAAA55;">Indevidual Customer</label>
			    </div>
				<div class="form-group">
					<div class="col-md-6">
						<label for="">first name</label>
						<input type="text" class="form-control" id="first-name" onblur="checkNull('first-name','first-name');">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label for="">last name</label>
						<input type="text" class="form-control" id="last-name" onblur="checkNull('last-name','last-name');">
					</div>
				</div>
				<div class="form-group">
					<label for="">email address</label>
					<input type="text" class="form-control" id="email" onblur="checkMail('email'); checkNull('email','email');">
					<p id="mess_email" class="mess-check"></p>
				</div>
				<div class="form-group">
					<label for="">phone number</label>
					<input type="text" class="form-control" id="phone" onblur="checkPhone('phone'); checkNull('phone','phone');">
					<p id="mess_phone" class="mess-check"></p>
				</div>
				<div class="form-group">
					<label for="">password</label>
					<input type="password" class="form-control" id="password" onblur="checkNull('password','password');">
				</div>
			    <div class="form-group">
					<label for="">street</label>
					<input type="text" class="form-control" id="street" onblur="checkNull('street','street');">
				</div>
				<div class="form-group">
					<label for="">city</label>
					<input type="text" class="form-control" id="city" onblur="checkNull('city','city');">
				</div>
				<div class="form-group">
					<label for="">state</label>
					<input type="text" class="form-control" id="state" onblur="checkNull('state','state');">
				</div>
				<div class="form-group">
					<label for="">zip code</label>
					<input type="text" class="form-control" id="zip-code" onblur="checkZipCode('zip-code'); checkNull('zip-code','zip-code');">
					<p id="mess_zip" class="mess-check"></p>
				</div>
				<div class="form-group">
					<label for="">driver license number</label>
					<input type="text" class="form-control" id="dln" onblur="checkNull('dln','dln');">
				</div>
				<div class="form-group">
					<label for="">insurance company name</label>
					<input type="text" class="form-control" id="iname" onblur="checkNull('iname','iname');">
				</div>
				<div class="form-group">
					<label for="">insurance policy number</label>
					<input type="text" class="form-control" id="inum" onblur="checkNull('inum','inum');">
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block" type="submit">SIGNUP</button>
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