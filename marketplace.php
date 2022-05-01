<?php 
session_start();
error_reporting(0);
include('includes/connection.php');
include"includes/time_function.php";
$uni=$_GET['u'];
$_SESSION['uni']=$uni;
$email=$_SESSION['login'];
$sql = "SELECT uni_name FROM tbluniversities WHERE tbluniversities.id=:uni ";
$query = $dbh -> prepare($sql);
$query->bindParam(':uni',$uni, PDO::PARAM_STR);

$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
    $uniname=$result->uni_name;

}}

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
<h1 class="head-title"><?php echo $uniname; ?></h1>
<p >Buy and sell anything at <?php echo $uniname; ?> marketplace.</p>
<div class="search-bar">
<div class="search-inner">
<form action="product-search.php" class="search-form"  method="post">
<div class="form-group">
<input type="text" name="product" class="form-control" placeholder="Whar Are Looking For?" required="" >
</div>
<div class="form-group" style="width: 300px;">


<input type="text" name="university" class="form-control" value="<?php echo htmlentities($uniname);?>" readonly="">
</div>


<button class="btn btn-common"  name="search" type="submit"><i class="lni-search"></i> Search Now</button>
</form>
</div>
</div>
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

<h3 class="section-title">Top Businesses</h3>

<div id="new-products" class="owl-carousel owl-theme">

<?php 
$uni=$_GET['u'];
$sql = "SELECT * FROM tblbusiness WHERE institution='$uni' AND state='Active' AND promoted='Yes' order by id desc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)

{  
$spid=$result->Sid; 

$uid=$result->id;  
    ?>	
   

<div class="item">
<div class="product-item">
<div class="carousel-thumb">
<img class="img-fluid" src="my/img/shopimages/<?php echo htmlentities($result->banner);?> " style="height:250px; width:100%;"alt="">
<div class="overlay">
<div>
<a class="btn btn-common" href="business-details.php?q=<?php echo $result->Sid; ?>">Business Details</a>
</div>
</div>

</div> 
<div class="product-content">
<h3 class="product-title"><a href="business-details.php?q=<?php echo $result->Sid ;?>" >
<strong><?php echo htmlentities($result->business);?></strong></a></h3>

<span><?php echo htmlentities($result->Category);?></span>
<div class="icon">
<span><i class="lni-bookmark"></i></span>
<span><a href="#" style="font-size: 12px;"><i class="lni-heart"></i></a></span>
</div>
<div class="card-text">
<div class="float-left">
</div><br />
<div class="float-left">
<a class="address" href="#"><i class="lni-map-marker"></i> <?php echo htmlentities($result->location);?></a>
</div>
</div>
</div>
</div>
</div>

<?php }}else{echo"no records";}
                       ?>
</div>
</div>
</div>
</div>
</div>

<h2 align="center"><a href="all-shops.php"><button style="border:none;background:#dc3545; color:white;padding:10px;border-radius:4px; font-size:18px;">
View All Stores</button></a></h2>
</section>

<!-----End Featured Shops----->
<!--Listing-->
<section class="categories-icon bg-light section-padding">
<div class="container">
<h1 class="section-title">Premium Ads</h1>

<div class="row">
<?php

        if (isset($_GET['pageno']) && $_GET['pageno']!="") {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page =12;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $prev= $pageno - 1;
        $next= $pageno + 1;
        $adjacents="2";
        $total_pages_sql = "SELECT COUNT(*) As total_records FROM `tblproducts` WHERE institution='$uni' AND promoted='Yes'";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_records = mysqli_fetch_array($result);
        $total_records=$total_records['total_records'];
        $total_pages = ceil($total_records / $no_of_records_per_page);
        $second_last=$total_pages-1;
        if(isset($_POST['search']))
        {
        $valueToSearch = $_POST['valueToSearch'];
        $category= $_POST['category'];
        $query = "SELECT * FROM `tblproducts` WHERE CONCAT(`ProductName`,`Price`,`ProductCategory`) LIKE '%".$valueToSearch."%' AND institution='$uni' LIMIT $offset, $no_of_records_per_page";
        $search_result = filterTable($query);
        
        }
        else {
        $query = "SELECT * FROM `tblproducts` WHERE institution='$uni' AND promoted='Yes' ";
        $search_result = filterTable($query);
        }
        
        // function to connect and execute the query
        function filterTable($query)
        {
        include('includes/connection.php');
        $filter_Result = mysqli_query($conn, $query);
        return $filter_Result;
        }
                             ?>
	<?php if(($countpro=mysqli_num_rows($search_result))>0){while($row = mysqli_fetch_array($search_result)){?>

<a href="product-details.php?r=<?php echo htmlentities($row["pid"]);?>">
<div class="col-lg-3 col-md-2 col-sm-4 col-xs-12" id="unis" >

<div class="icon-box" id="content" >
<div class="icon" style="float:right; position:fixed;z-index:-10">

<span><i class="lni-bookmark"></i></span>
</div>
<img src="my/img/productsimages/<?php echo htmlentities($row["Vimage1"]);?>" class="ima"  alt="Image" />
<br>
<div >

<a href="product-details.php?r=<?php echo htmlentities($row["pid"]);?>" style="color:black; background:none;"><b><?php echo htmlentities($row["ProductName"]); ?></b></a>
<h4 class="l"style="color:#e91e63" >KSh. <?php echo htmlentities(number_format($row["Price"]));?></h4>

</div></div>
</div></a>
<?php }}else{echo"no records";}
                       ?>

</div>
<div class="pagination-bar">
<nav>

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
