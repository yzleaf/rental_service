<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>index</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/swiper-bundle.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/car.css">
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
					<span class="input-group-addon">
						<div class="dropdown" style="padding: 0;">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Make
						    <span class="caret"></span>
					    	</button>
						    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							    <li class="choice">make 1</li>
							    <li class="choice">make 2</li>
							    <li class="choice">make 3</li>
						    </ul>
						</div>
					</span>
					<input type="text" class="form-control" placeholder="car brand">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<span class="input-group-addon">
						<div class="dropdown" style="padding: 0;">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Class
						    <span class="caret"></span>
					    	</button>
						    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
							    <li class="choice">class 1</li>
							    <li class="choice">class 2</li>
							    <li class="choice">class 3</li>
						    </ul>
						</div>
					</span>
					<input type="text" class="form-control" placeholder="class name">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="input-group">
					<span class="input-group-addon">
						<div class="dropdown" style="padding: 0;">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Year
						    <span class="caret"></span>
					    	</button>
						    <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
							    <li class="choice">year 1</li>
							    <li class="choice">year 2</li>
							    <li class="choice">year 3</li>
						    </ul>
						</div>
					</span>
					<input type="text" class="form-control" placeholder="year after">
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



