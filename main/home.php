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
	<title>index</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/swiper-bundle.min.css">
	<link rel="stylesheet" href="css/main.css">
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
					<li class="active"><a href="home.php">Home</a></li>
					<li><a href="location.php">Location</a></li>
					<li><a href="car.php">Car</a></li>
					<?php if (empty($user_name)): ?>
						<li></li>
					<?php endif ?>
					<?php if ($user_type == 'CUSTOMER'): ?>
						<li><a href="custProfile.php">Customer</a></li>
					<?php endif ?>
					<?php if ($user_type == 'EMPLOYEE'): ?>
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
	<div class="swiper-container">
		<div class="swiper-wrapper">
	        <div class="swiper-slide">
	        	<img src="https://dummyimage.com/800x400/e34be3/fff" alt="">
	        </div>
	        <div class="swiper-slide">
	        	<img src="https://dummyimage.com/800x400/2255d6/fff" alt="">
	        </div>
	        <div class="swiper-slide">
	        	<img src="https://dummyimage.com/800x400/22d437/fff" alt="">
	        </div>
	    </div>
	    <!-- 如果需要分页器 -->
	    <div class="swiper-pagination"></div>
	    <!-- 如果需要导航按钮 -->
	    <div class="swiper-button-prev"></div>
	    <div class="swiper-button-next"></div>
	</div>
	<script>        
	    var mySwiper = new Swiper ('.swiper-container', {
	    direction: 'horizontal', // 垂直切换选项
	    loop: true, // 循环模式选项
	    
	    // 如果需要分页器
	    pagination: {
	      el: '.swiper-pagination',
	    },
	    
	    // 如果需要前进后退按钮
	    navigation: {
	      nextEl: '.swiper-button-next',
	      prevEl: '.swiper-button-prev',
	    },
	  })        
	</script>
	<div class="container">
		<div class="col-md-1"></div>
		<div class="col-md-10">
		This is Home page: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero sed harum optio vel atque inventore ipsa! Maiores blanditiis, voluptatibus itaque adipisci labore, illum perferendis harum cum aut soluta, omnis dolor.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero sed harum optio vel atque inventore ipsa! Maiores blanditiis, voluptatibus itaque adipisci labore, illum perferendis harum cum aut soluta, omnis dolor.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero sed harum optio vel atque inventore ipsa! Maiores blanditiis, voluptatibus itaque adipisci labore, illum perferendis harum cum aut soluta, omnis dolor.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero sed harum optio vel atque inventore ipsa! Maiores blanditiis, voluptatibus itaque adipisci labore, illum perferendis harum cum aut soluta, omnis dolor.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero sed harum optio vel atque inventore ipsa! Maiores blanditiis, voluptatibus itaque adipisci labore, illum perferendis harum cum aut soluta, omnis dolor.</div>
		<div class="col-md-1"></div>
	</div>
	<div class="footer">
		WOW | qwert@wow.com | 358-224-6785
	</div>
	
	
	
</body>
</html>



