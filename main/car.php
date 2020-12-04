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
				<a href="index.html" class="navbar-brand"></a>
			</div>
			<label id="toggle-label" class="visible-xs-inline-block" for="toggle-checkbox">Menu</label>
			<input id="toggle-checkbox" type="checkbox" class="hidden">
			<div class="hidden-xs">
				<ul class="nav navbar-nav">
					<li><a href="index.html">Home</a></li>
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
			<div class="col-sm-3">
				<div class="input-group">
					<span class="input-group-addon">Make</span>
					<select class="form-control">
						<option>All</option>
						<option>Make 1</option>
					  	<option>Make 2</option>
					  	<option>Make 3</option>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<span class="input-group-addon">Class</span>
					<select class="form-control">
						<option>All</option>
						<option>Class 1</option>
					  	<option>Class 2</option>
					  	<option>Class 3</option>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<span class="input-group-addon">Year</span>
					<select class="form-control">
						<option>All</option>
						<option>Year 1</option>
					  	<option>Year 2</option>
					  	<option>Year 3</option>
					</select>
				</div>
			</div>
			<div class="col-sm-offset-10">
				<a href="#"><button class="btn btn-primary btn-block" type="submit">Search Cars</button></a>
			</div>
		</div>
		<div class="row">
			CAR: 
		    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sunt ipsa neque voluptas beatae quidem iusto, assumenda facilis excepturi ullam obcaecati laborum error iste sed culpa quos hic accusamus quod, deleniti.
		    Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Eligendi saepe odit vel eveniet qui fugiat dicta nostrum atque dolorem ab minima tempore, libero cupiditate totam voluptatem, ad tempora recusandae quam.
		</div>
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>
</html>



