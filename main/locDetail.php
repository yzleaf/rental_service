<?php
    include ('./php_operation/conn.php');
	require_once ('./php_operation/common.php');
	require_once ('./php_operation/db_location_info.php');
	$user_name = getCookieVal('cookie_uname');
	$user_type = getCookieVal('cookie_utype');
?>
<?php 
	if (!isset($_POST['submit'])) { // not click the button
		$loc = loc_state_get_session();
	}
	else {
		$loc = $_POST['loc'];
		loc_state_set_session($loc);
	}
    $loc_res = loc_normal_info($conn, $loc);
    $loc_car = loc_car_info($conn, $loc);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>index</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/swiper-bundle.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/location.css">
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>  
    <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="js/swiper-bundle.min.js"></script>
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
					<li class="active"><a href="location.php">Location</a></li>
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
	<div class="row">
		<h2><?php echo $loc?> information in detail</h2>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10 loc_info_total clearfix">
			<h3><?php echo $loc?> office information</h3>
			<div class="col-sm-4" style="padding: 0;">
				<div class="swiper-container" style="width: 300px; height: 200px; margin-left:0;">
					<div class="swiper-wrapper">
				        <div class="swiper-slide">
				        	<img src="./img/ca_office2.jpg" alt="" class="loc_img">
				        </div>
				        <div class="swiper-slide">
				        	<img src="./img/office1.jpg" alt="" class="loc_img">
				        </div>
				        <div class="swiper-slide">
				        	<img src="./img/office3.jpg" alt="" class="loc_img">
				        </div>
				    </div>
				    <!-- 如果需要分页器 -->
				    <div class="swiper-pagination"></div>
				</div>
				<script>        
				    var mySwiper = new Swiper ('.swiper-container', {
				    direction: 'horizontal', // 垂直切换选项
				    loop: true, // 循环模式选项
				    
				    // 如果需要分页器
				    pagination: {
				      el: '.swiper-pagination',
				    },
				  })        
				</script>
			</div>
			<div class="col-sm-8">
				<div class="info">
					<table class="table table-striped">
						<tr>
							<th>Location ID</th>
							<th>Street</th>
							<th>City</th>
							<th>State</th>
							<th>Zip Code</th>
							<th>Phone Number</th>
						</tr>		
						<?php 
							while ($row = mysqli_fetch_array($loc_res)) {
								//print_r($row);
								//print($row['location_id']);
								print <<< EOF
										<tr>
											<td>$row[location_id]</td>
											<td>$row[loc_street]</td>
											<td>$row[loc_city]</td>
											<td>$row[loc_state]</td>
											<td>$row[loc_zipcode]</td>
											<td>$row[loc_phone_no]</td>
										</tr>
								EOF;
			                }
						?>	
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>	
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h3><?php echo $_SESSION['loc_state']?> car information</h3>
			<table class="table table-striped">
				<tr>
					<th>VIN</th>
					<th>Make</th>
					<th>Model</th>
					<th>Produce Date</th>
					<th>Lincense Plate Number</th>
					<th>Class</th>
					<th>Location</th>
				</tr>		
				<?php 
					while ($row = mysqli_fetch_array($loc_car)) {
						print <<< EOF
								<tr>
									<td>$row[vin]</td>
									<td>$row[make]</td>
									<td>$row[model]</td>
									<td>$row[year]</td>
									<td>$row[lpn]</td>
									<td>$row[class_name]</td>
									<td>$row[location_id]</td>
								</tr>
						EOF;
	                }
				?>	
			</table>
		</div>
		<div class="col-md-1"></div>	
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
</body>
</html>



