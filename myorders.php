<?php
ob_start();
session_start();
require('connect.php');

if(!isset($_SESSION['username']))
{
	header('location:index.php');
}
else
{
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>

					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="createorder.php"><i class="fa fa-user"></i> Create</a></li>
								<li><a href="discover.php"><i class="fa fa-star"></i> Discover</a></li>
								<li><a href="checkout.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>';
								
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
				</div>
			</div>
		</div><!--/header-middle-->
	<section>
		<div class="container">
			<div class="row" style="margin:auto">

							<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-12">

													<!--/product-information-->
							<div class="product-search">
							<?php


$itemlist = $array['items'];
for ($i=0; $i < sizeof($array['items']) ; ++$i) {
	//echo $itemlist[$i]['itemId'];
	$itemname=$itemlist[$i]['name'];
	$itemid=$itemlist[$i]['itemId'];
	$itemimage=$itemlist[$i]['thumbnailImage'];
	$itemprice = $itemlist[$i]['salePrice'];
	$category=$itemlist[$i]['categoryPath'];

	//orderno, productcode, name, price, qunatity
	echo '<div class="product-information">
								<h2>'.$itemname.'</h2>
								<p>Item ID: '.$itemid.'</p>
								<img src="'.$itemimage.'" alt="" />
								<span>
									<span>US $'.$itemprice.'</span>
									<label>Quantity:</label>
									<input type="text" value="1"  readonly="readonly"/>
									<button type="button" class="btn btn-fefault cart">
										<a href="additem.php?pid='.$itemid.'&name='.$itemname.'&price='.$itemprice.'&quantity=1" >
										<i class="fa fa-shopping-cart"></i>
										Select Item</a>
									</button>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Category:</b>'.$category.'</p>
							</div>';
}
?>
<?php
	$userid=$_SESSION['userid'];
	$squery="SELECT * FROM orderdetails, orders WHERE orderdetails.order_creator_id='$userid' AND orders.status = 'completed' AND orderdetails.orderNumber = orders.orderNumber";
	//echo $squery;
	$sresult=mysqli_query($con, $squery);
	
	while ($row = mysqli_fetch_array($sresult))
	{
		echo $row['productCode'].'<br/>'.$row['productName'].'<br/>'.$row['priceEach'];
	}
?>
							<!--/product-information-->
						</div>
					</div><!--/product-details-->


			</div>
		</div>
	</section>


		<div class="container">
			<div class="row">

				<div class="col-sm-9 padding-right">


				</div>
			</div>
		</div>
	</section>

<?php include('footer.php'); ?>

	</body>
</html>