<?php 
session_start();
error_reporting(0);
include('includes/connection.php');
include"includes/time_function.php";
$category=$_GET['cat'];

$uni_id=$_SESSION['uni'];
$_SESSION['uni']=$uni_id;
$email=$_SESSION['login'];

$sql2 ="SELECT id from tblproducts WHERE ProductCategory='$category' AND institution='$uni_id'";
$query = $dbh -> prepare($sql2);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$products=$query->rowCount();
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
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/bootstrap2.min.css"><!-- bootstrap-CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">
<link rel="stylesheet" type="text/css" href="assets/css/slicknav.css">
<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
<link rel="stylesheet" href="assets/fontawesome-icons/css/all.css">
<meta name="google-site-verification" content="AjSlJO2YJiU-Gpq5XrfGXFl5c4Yw4Vl4GSFLtebOmqY" />
<script data-ad-client="ca-pub-1648262613471118" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<style>
    .l{
        font-size:18px; 
    }


.ima{
    height:300px;
width:100%; 


}
@media screen and (max-width: 992px) 
{
.ima{
height:100px;
 width:100%; 


}}
    	@media screen and (max-width: 992px) 
{
	.l{
				font-size:16px; 
		
			}
}
@media screen and (max-width: 992px) 
{
	#unis{
				padding:5px; 
				
		
			}
}

@media screen and (max-width: 992px) 
{
	#content{
				height:200px; 
			margin-bottom:-20px;
		
			}
}
@media screen and (max-width: 992px) 
{
	#content:hover{
				height:200px; 
				background:white;	
		
			}
}
</style>
</head>

<body >

<header id="header-wrap">

<?php 

include('includes/header.php');

?>



<div id="hero-area">
<div class="overlay"></div>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12 col-lg-9 col-xs-12 text-center">
<div class="contents-ctg">

<h4>Search Results</h4>
</div>
</div>
</div>
</div>
</div>









</header>





<!-----start Featured Shops----->
<section class="featured-lis section-padding">
<div class="container">
<div class="row">
<div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">

<h3 class="section-title">Premium Ads</h3>

<div id="new-products" class="owl-carousel owl-theme">

<?php 
$uni_id=$_SESSION['uni'];
$sql="SELECT * FROM tblproducts WHERE institution='$uni_id' AND promoted='Yes'";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $counter=1;
    ?>	
   

<div class="item">
<div class="product-item">
<div class="carousel-thumb">
<img class="img-fluid" src="my/img/productsimages/<?php echo htmlentities($row["Vimage1"]);?> " style="height:250px; width:100%;"alt="">
<div class="overlay">
<div>
<a class="btn btn-common" href="product-details.php?r=<?php echo htmlentities($row["pid"]);?>">Product Details</a>
</div>
</div>

</div>
<div class="product-content">
<h3 class="product-title"><a href="product-details.php?r=<?php echo htmlentities($row["pid"]);?>" >
<strong><?php echo htmlentities($row["ProductName"]); ?></strong></a></h3>

<span>KSh. <?php echo htmlentities(number_format($row["Price"]));?></span>
<div class="icon">
<span><i class="lni-bookmark"></i></span>
<span><a href="#" style="font-size: 12px;"><i class="lni-heart"></i></a></span>
</div>
<div class="card-text">

</div>
</div>
</div>
</div>

<?php }}?>
</div>
</div>
</div>
</div>
</div>

</section>

<!-----End Featured Shops----->
<!--Listing-->
<section class="categories-icon bg-light section-padding">
<div class="container">
<h5 class="section-title">Ads by Category (<?php echo $products; ?> ) Results</h5>

<div class="row">
<?php

$category=$_GET['cat'];
$sql="SELECT * FROM tblproducts WHERE ProductCategory='$category' AND institution='$uni_id'";
$result=$conn->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $counter=1;

					 ?>

<a href="product-details.php?r=<?php echo htmlentities($row["pid"]);?>">
<div class="col-lg-3 col-md-2 col-sm-4 col-xs-12" id="unis" >

<div class="icon-box" id="content" >
<div class="icon" style="float:right; position:fixed;z-index:-10">

<span><i class="lni-bookmark"></i></span>
</div>
<img src="my/img/productsimages/<?php echo htmlentities($row["Vimage1"]);?>" class="ima"  alt="Image" />
<br>
<div >

<a href="product-details.php?r=<?php echo htmlentities($row["pid"])?>" style="color:black; background:none;"><b><?php echo htmlentities($row["ProductName"]); ?></b></a>
<h4 class="l"style="color:#e91e63" >KSh. <?php echo htmlentities(number_format($row["Price"]));?></h4>

</div></div>
</div></a>
<?php }}else
{ ?>
    <h5 style="text-align:center;">0 matching results Found</h5>
<?php } ?>

</div>
<div class="pagination-bar">
<nav>
<ul class="pagination justify-content-center">

         <li><a class="page-link active" href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
</ul>
</nav>

</div>
</div>
<h2 align="center"><a href="all-products.php"><button style="border:none;background:#dc3545; color:white;padding:10px;border-radius:4px; font-size:18px;">
View All Ads</button></a></h2>
</section>
<!---end of listing-->










<!-------end listing---->
<section id="blog" class="section-padding">



<!--<section class="counter-section section-padding" style="background:#dc3545;">
<div class="container">
<div class="row">

<div class="col-md-3 col-sm-6 work-counter-widget">
<div class="counter">
<div class="icon"><i class="fas fa-th-list" style="color: white;"></i></div>
<?php 
//Query for Listing count
$sql = "SELECT id from tblproducts";
$query = $dbh -> prepare($sql);
$query->bindParam(':id',$id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
<?php 
//Query for Listing count
$sql = "SELECT id from tblshop_products";
$query = $dbh -> prepare($sql);
$query->bindParam(':id',$id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt2=$query->rowCount();
?><?php 
$ads=$cnt2+$cnt; ?>
<h2 class="counterUp"><?php echo $ads; ?></h2>
<p>Total Ads</p>
</div>
</div>

<div class="col-md-3 col-sm-6 work-counter-widget">
<div class="counter">
<div class="icon"><i class="fas fa-store" style="color: white;"></i></div>
<?php 
//Query for Listing count
$sql = "SELECT id from tblshops";
$query = $dbh -> prepare($sql);
$query->bindParam(':id',$id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$shops=$query->rowCount();
?>
<h2 class="counterUp"><?php echo $shops; ?></h2>
<p>Total Stores</p>
</div>
</div>

<div class="col-md-3 col-sm-6 work-counter-widget">
<div class="counter">
<div class="icon"><i class="lni-users" style="color: white;"></i></div>
<?php 
//Query for Listing count
$sql = "SELECT id from tblusers";
$query = $dbh -> prepare($sql);
$query->bindParam(':id',$id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$users=$query->rowCount();
?>
<h2 class="counterUp"><?php echo $users; ?></h2>
<p>Total Members</p>
</div>
</div>

<div class="col-md-3 col-sm-6 work-counter-widget">
<div class="counter">
<div class="icon"><i class="lni-briefcase" style="color: white;"></i></div>
<?php 
//Query for Listing count
$sql = "SELECT id from promoted";
$query = $dbh -> prepare($sql);
$query->bindParam(':id',$id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$pre=$query->rowCount();
?>
<h2 class="counterUp"><?php echo $pre; ?></h2>
<p>Premium Ads</p>
</div>
</div>


</div>
</div>
</section>-->



<?php include('includes/footer.php');?>

<?php include('includes/mobile-bar.php');?>




<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-min.js"></script>

<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/main.js"></script>


</body>


</html>
