<?php
ob_start();
session_start();
require('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Home | BuyMyGroc</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script>
window.onload = function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
 

function showPosition(position) {
    var latlon = position.coords.latitude + "," + position.coords.longitude;

    var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
    +latlon+"&zoom=5&size=200x100&sensor=false";
    document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
 
       </script>
<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@buymegroc.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header_top-->


															</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

	</head><!--/head-->

<body>

		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>

					</div>
					
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Create</a></li>
								<li><a href="#"><i class="fa fa-star"></i> Discover</a></li>
								<li><a href="checkout.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<?php
if(!isset($_SESSION['username']))
{
	echo '<li><a href="login.php"><i class="fa fa-lock"></i> Login/Signup</a></li>';
}
else
{
	echo '<li><a href="myorders.php"><i class="fa fa-crosshairs"></i> My Orders</a></li>';
	echo '<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>';
}
?>

							</ul>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul align="left" class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user">Location of Tasks Shown</i></a></li>
							</ul>		
					<div align="center "id="mapholder"></div>
					
				</div>
			</div>
		</div><!--/header-middle-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Pending tasks</h2>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<?php
						$userid=$_SESSION['userid'];
			$squery="SELECT * FROM orderdetails, orders WHERE orderdetails.order_creator_id='$userid' AND orders.status <> 'completed' AND orderdetails.orderNumber = orders.orderNumber";
			//echo $squery;
			$sresult=mysqli_query($con, $squery);

		while ($row = mysqli_fetch_array($sresult))
			{
			
			
			

											echo '<p>'.$row['productCode'].'</p>';
											echo '<h2>'.$row['productName'].'</h2>';
											echo '<p>'.$row['priceEach'].'</p>';
											}?>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Click for details</a>
										</div>
								</div>

							</div>
						</div>
									
						
					</div><!--features_items-->
					
					
				</div>
			</div>
		</div>
	</section>


	

</body>
</html>