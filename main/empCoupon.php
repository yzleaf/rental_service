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
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><div style="margin-top: 15px; color: #AAAA55;">Welcome! XXX</div></li>
					<li><a href="#">Signout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col-md-2">
			<div class="list-group side-bar">
				<a href="empRent.php" class="list-group-item">Rent</a>
				<a href="empCustInfo.php" class="list-group-item">Customer Message</a>
				<a href="empLocInfo.php" class="list-group-item">Location Message</a>
				<a href="empCarInfo.php" class="list-group-item">Car Message</a>
				<a href="empCoupon.php" class="list-group-item active">Coupon Message</a>
			</div>
		</div>
		<div class="col-md-10">
			<div class="row" style="margin-bottom: 20px;">
				<a href="empCoupon.php"><button class="col-md-4 btn btn-primary active">All</button></a>
				<a href="empCouponIndi.php"><button class="col-md-4 btn btn-primary">Individual Coupon</button></a>
				<a href="empCouponCorp.php"><button class="col-md-4 btn btn-primary">Corporate Discount</button></a>
			</div>
			<div>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, perferendis, nisi. Distinctio voluptatibus maxime adipisci iusto reprehenderit quasi aperiam fugiat qui. Recusandae illum et doloribus quae natus numquam, incidunt animi.
				Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Eaque, vel eligendi, ullam laborum aliquam perspiciatis? Et laboriosam quibusdam asperiores minima corporis vitae placeat! Dolore quidem nostrum explicabo iure, id ipsa.
			</div>
		</div>
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>