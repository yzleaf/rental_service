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
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="login.php">Login</a></li>
					<li><a href="signup.php">Signup</a></li>
				</ul>
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
							<option value="All">All</option>
							<option value="M1">Make 1</option>
							<option value="M2">Make 2</option>
							<option value="M3">Make 3</option>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<span class="input-group-addon">Class</span>
						<select class="form-control" name="class">
							<option value="All">All</option>
							<option value="C1">Class 1</option>
							<option value="C2">Class 2</option>
							<option value="C3">Class 3</option>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<span class="input-group-addon">Year</span>
						<select class="form-control" name="year">
							<option value="All">All</option>
							<option value="Y1">Year 1</option>
							<option value="Y2">Year 2</option>
							<option value="Y3">Year 3</option>
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
			<!-- CAR: 
		    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt ipsa neque voluptas beatae quidem iusto, assumenda facilis excepturi ullam obcaecati laborum error iste sed culpa quos hic accusamus quod, deleniti.
		    Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Eligendi saepe odit vel eveniet qui fugiat dicta nostrum atque dolorem ab minima tempore, libero cupiditate totam voluptatem, ad tempora recusandae quam. -->
			<?php
				include('./php_operation/car_display.php');
			?>
		</div>
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>
</html>



