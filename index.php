<?php 
session_start();
error_reporting(0);
include('includes/connection.php');
include"includes/time_function.php";
$email=$_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="en">


<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index, follow">
<meta name="description" content="shopcampus is your leading campus based classified ads and multivendor marketplace."/>
<meta name="keywords" content="
online shopping,online shop kenya,ecommerce kenya,buy online kenya,shopcampus,marketplace kenya,online 
shopping kenya,classified ads,classified,classified ads kenya,secondhand,buy and sell,Online classified,shopcampus kenya,University,
Campus,College,Semeka Technologies,household items, Electronics, Phones, Fashion and Clothes, Beauty, Supplements,Cosmetics">
<meta name="author" content="Shopcampus Kenya - Semeka Technologies">

<title>shopcampus | Free campus based classified ads site</title>
<link rel="icon" type="image/png" href="lo.PNG"/>

<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">

<link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">

<link rel="stylesheet" type="text/css" href="assets/css/color-switcher.css">

<link rel="stylesheet" type="text/css" href="assets/css/animate.css">

<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="assets/css/main.css">

<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
<link rel="stylesheet" href="assets/fontawesome-icons/css/all.css">
<style>
    .l{
        font-size:18px; 
    }
	
    	@media screen and (max-width: 992px) 
{
	.l{
				font-size:16px; 
		
			}
}
@media screen and (max-width: 992px) 
{
	#unis{
				padding:2px; 
				
		
			}
}
@media screen and (max-width: 992px) 
{
	#content{
				height:120px; 
				
		
			}
}
</style>
</head>
<body>

<header id="header-wrap">
<?php 

include('includes/header.php');

?>
</header>


<div id="main-slide" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
<div class="carousel-item active">
<img class="d-block w-100" src="assets/img/slider-bg1.jpg" alt="First slide">
<div class="carousel-caption d-md-block">
<h1 class="animated wow fadeInDown hero-heading" data-wow-delay=".4s" style="font-size:18px">Welcome to ShopCampus Marketplace</h1>
<p class="animated fadeInUp wow hero-sub-heading" data-wow-delay=".6s" style="font-size:18px">Buy and sell secondhand products at Your finest Comrade Marketplace</p>
</div>
</div>
<div class="carousel-item">
<img class="d-block w-100" src="assets/img/slider-bg2.jpg" alt="Second slide">
<div class="carousel-caption d-md-block">
<h1 class="animated wow fadeInLeft hero-heading" data-wow-delay=".7s" style="font-size:18px">Take your business Online!</h1>
<p class="animated wow fadeInRight hero-sub-heading" data-wow-delay=".9s" style="font-size:18px">Got some products to sell? create a free online store and 
grow your business. </p>
</div>
</div>

</div>
<a class="carousel-control-prev" href="#main-slide" role="button" data-slide="prev">
<span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left" data-ripple-color="#F0F0F0"></i></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#main-slide" role="button" data-slide="next">
<span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right" data-ripple-color="#F0F0F0"></i></span>
<span class="sr-only">Next</span>
</a>
</div>


<section id="about" class="section-padding" style="background:white;">
<div class="container">
<div class="row">
<div class="col-md-6 col-lg-6 col-xs-12">
<div class="about-wrapper">
<h2 class="intro-title" >Why ShopCampus</h2>
<p class="intro-desc" style="color:black"><b>Our focus is to offer you the best experience in buying and selling secondhand and comrade's affordable products.
We have set up a marketplace for every campus in Kenya to ensurer that you buy from the nearest seller or sell to the nearest buyer.
We are comrades oriented and we are delighted to support comrades hustles and businesses,To make you grow in a unique way and convert
your audience to customers.</b>
</p>
<a href="login.php" class="btn btn-common btn-lg">GET STARTED</a>
</div>
</div>
<div class="col-md-6 col-lg-6 col-xs-12">
<img class="img-fluid" src="assets/img/about/about.png" alt="">
</div>
</div>
</div>
</section>


<section class="categories-icon bg-light section-padding">
<div class="container">
<h1 class="section-title">Choose Market Place</h1>
<p style="text-align:center; color:black; margin-top:-20px;">Ready to get started? Choose marketplace of your choice below to start trading with fellow comrades.</p>
<div class="row">
<?php $sql = "SELECT * from  tbluniversities ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{     
$uni=$result->uni_name;

	?> 

<div class="col-lg-4 col-md-2 col-sm-4 col-xs-12" id="unis">

<div class="icon-box" id="content">

<h4 class="l"><?php echo htmlentities($uni);?></h4>
<a href="marketplace.php?u=<?php echo htmlentities($result->id); ?>" style="color:#e91e63; background:whitesmoke; padding:5px ">Visit Marketplace</i></a>
</div>
</div>
<?php }} ?>
</div>
</div>
</section>
<section id="about" class="section-padding" style="margin-top:-120px;" >
<div class="container">
<div class="row">
<div class="col-md-6 col-lg-12 col-xs-12">
<div class="about-wrapper">
<h2 class="intro-title" >Comrade In Business?</h2>
<p class="intro-desc" style="color:black"><b>We would like to help you move your business online.We have set a comrades
Business Directory where you can list your business for promotion.We ensure that your business voice is heard,make it
grow by increasing its online presence.</b>
</p>
<a href="login.php" class="btn btn-common btn-lg">LIST YOUR BUSINESS</a>
</div>
</div>
					</section>
<section class="works section-padding">
<div class="container">
<div class="row">
<div class="col-12">
<h3 class="section-title">How It Works</h3>
</div>
<div class="col-lg-4 col-md-4 col-xs-12">
<div class="works-item">
<div class="icon-box">
<i class="fas fa-users" id="cat"></i>
</div>
<p>Create a Free Account</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-xs-12">
<div class="works-item">
<div class="icon-box">
<i class="fas fa-list" id="cat"></i>
</div>
<p>List Your Product</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-xs-12">
<div class="works-item">
<div class="icon-box">
<i class="fas fa-handshake" id="cat"></i>
</div>
<p>Connect With Buyers</p>
</div>
</div>
<hr class="works-line">
</div>
</div>
</section>





<footer id="foot">

<section class="footer-Content" style="background:white; color:black">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
<div class="widget">
<h3 class="block-title">About Us</h3>
<div class="textwidget" style="margin-top: -30px;">
<p style="color:black">ShopCampus is a campus based online marketplace, Providing a common Platform for buyers and sellers.Post your products and services for free.</div>

</div>
</div>
<div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
<div class="widget">
<h3 class="block-title">Quick Links</h3>
<ul class="menu" style="color:black; margin-top: -30px;" >
<li><a href="about.php" style="color:black"><strong>- About Us</strong></a></li>
<li><a href="contacts.php" style="color:black"><strong>- Contact Us</strong></a></li>
<li><a href="" style="color:black"><strong>- Products</strong></a></li>
<li><a href="helppage.php" style="color:black"><strong>- Help</strong></a></li>
<li><a href="" style="color:black"><strong>- businesses</strong></a></li>
<li><a href="about.php" style="color:black"><strong>- FAQ'S</strong></a></li>
<li><a href="privacy.php" style="color:black"><strong>- Privacy Policy</strong></a></li>
<li><a href="terms.php" style="color:black"><strong>- Terms Of Use</strong></a></li>


</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-xs-6 col-mb-12" >
<div class="widget">
<h3 class="block-title">Contact Info</h3>
<ul class="contact-footer" style="margin-top: -30px;">
<li>
<strong><i class="lni-phone"></i></strong><span>+254 113 667 917 <br/> +254 705 030 613</span>
</li>
<li>
<strong><i class="lni-envelope"></i></strong><span><a href="mailto:georgemuemah@gmail.com" style="color: black;">georgemuemah@gmail.com</i></a></span>
</li>
<li>
<strong><i class="lni-map-marker"></i></strong><span><a href="#" style="color:black">70500 - Muranga, Kenya <br/></a></span>
</li>
</ul>
</div>
</div>
</div>
</div>
</section>


<div id="copyright" style="background-color:white; margin-top: -50px;">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="site-info text-center">
<p><strong><a target="_blank" href="shopcampus.co.ke" style="color: black;">Copyright &copy; <script> var date=new Date().getFullYear(); document.write(date)</script> - ShopCampus</strong></a></p>
</div>
</div>
</div>
</div>
</div>

</footer>


<?php include('includes/mobile-bar.php');?>
<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>




<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/color-switcher.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/form-validator.min.js"></script>
<script src="assets/js/contact-form-script.min.js"></script>
<script src="assets/js/summernote.js"></script>
</body>


</html>
