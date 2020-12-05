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
			<h3 style="text-align:center; color:#777;">please select your customer type : </h3>
			<form action="">
				<div class="form-group">
					<div class="cust-options">
						<div class="col-md-6"><input type="radio" name="options" checked> individual</div>
						<div class="col-md-6"><input type="radio" name="options"> corporate</div>   
				    </div>
			    </div>
			</form>
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<a id="link" onclick="checkOptions();" style="text-decoration: none;">
					<button class="btn btn-primary btn-block" type="submit" style="margin-top:50px;">Start Signup</button>
				</a>
				<script>
					function checkOptions() {
					  var radio = document.getElementsByName("options");
					  var a = document.getElementById("link");
					  console.log(radio);
					  if (radio[0].checked==true && radio[1].checked==false) {
					    a.href = "signupIndi.php";
					  } 
					  else if (radio[0].checked==false && radio[1].checked==true) {
					    a.href = "signupCorp.php";
					  }
					}
				</script>	
			</div>
			<div class="col-md-3"></div>
		</div>
		<div class="col-md-3"></div>	
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>
</html>