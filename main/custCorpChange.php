<?php
	include ('./php_operation/conn.php');
	require_once ('./php_operation/common.php');
	require_once ('./php_operation/customer.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
	if ($user_type == 'ADMIN' || $user_type == 'EMPLOYEE') {
	    $cust_name = get_cust_name('cust_name');
	} else {
	    $cust_name = getCookieVal('cookie_uname');
	}
	$customer_type = getCookieVal('cookie_ctype');
	$cust_res = select_corp($conn, $cust_name);
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
	<div class="container container-small">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h2>Change Information</h2>
			<form action="./php_operation/cust_change_check.php" method="post">
				<div class="form-group">
					<label for="" style="font-size:150%; color:#AAAA55;">Corporate Customer</label>
					<input class="hidden" name="cust_type" value="C">
			    </div>
				<div class="form-group">
					<div class="col-md-6">
						<label for="">first name</label>
						<input type="text" class="form-control" id="first-name" name="first-name" onblur="checkNull('first-name','first-name');" value="<?php echo $cust_res['fname'] ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-6">
						<label for="">last name</label>
						<input type="text" class="form-control" id="last-name" name="last-name" onblur="checkNull('last-name','last-name');" value="<?php echo $cust_res['lname'] ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="">email address</label>
					<input readonly="readonly" type="text" class="form-control" id="email" name="email" onblur="checkMail('email'); checkNull('email','email');" value="<?php echo $cust_res['email'] ?>">
					<p id="mess_email" class="mess-check"></p>
				</div>
				<div class="form-group">
					<label for="">phone number</label>
					<input type="text" class="form-control" id="phone" name="phone" onblur="checkPhone('phone'); checkNull('phone','phone');" value="<?php echo $cust_res['cust_phone_no'] ?>">
					<p id="mess_phone" class="mess-check"></p>
				</div>
				<div class="form-group">
					<label for="">password</label>
					<input type="password" class="form-control" id="password" name="password" onblur="checkNull('password','password');">
				</div>
			    <div class="form-group">
					<label for="">street</label>
					<input type="text" class="form-control" id="street" name="street" onblur="checkNull('street','street');" value="<?php echo $cust_res['cust_street'] ?>">
				</div>
				<div class="form-group">
					<label for="">city</label>
					<input type="text" class="form-control" id="city" name="city" onblur="checkNull('city','city');" value="<?php echo $cust_res['cust_city']?>">
				</div>
				<div class="form-group">
					<label for="">state</label>
					<input type="text" class="form-control" id="state" name="state" onblur="checkNull('state','state');" value=<?php echo $cust_res['cust_state']?>>
				</div>
				<div class="form-group">
					<label for="">zip code</label>
					<input type="text" class="form-control" id="zip-code" name="zip-code" onblur="checkZipCode('zip-code'); checkNull('zip-code','zip-code');" value="<?php echo $cust_res['cust_zipcode']?>">
					<p id="mess_zip" class="mess-check"></p>
				</div>
				<div class="form-group">
					<label for="">employee id</label>
					<input type="text" class="form-control" id="dln" name="dln" onblur="checkNull('dln','dln');" value="<?php echo $cust_res['emp_id']?>">
				</div>
				<div class="form-group">
					<label for="">corporate registration number</label>
					<input type="text" class="form-control" id="iname" name="iname" onblur="checkNull('iname','iname');" value="<?php echo $cust_res['corp_reg_no']?>">
				</div>
				<div class="form-group">
					<label for="">corporation name</label>
					<input type="text" class="form-control" id="inum" name="inum" onblur="checkNull('inum','inum');" value="<?php echo $cust_res['corp_name']?>">
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block" type="submit" name="submit">Finish</button>
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