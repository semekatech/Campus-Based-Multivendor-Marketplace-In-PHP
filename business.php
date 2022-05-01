<?php 
session_start();
error_reporting(0);
include('includes/connection.php');
include"includes/time_function.php";
?>
<?php

if(!isset($_SESSION["uni"])){
header("Location: index.php");
exit(); }
?>
<?php
$uni_id=$_SESSION['uni'];
$stores = "SELECT count(id) as num FROM tblbusiness WHERE institution='$uni_id'";
$stores_res = mysqli_query($conn,$stores);
$row = mysqli_fetch_assoc($stores_res);
$stores_count = $row['num'];


$sql = "SELECT uni_name FROM tbluniversities WHERE tbluniversities.id=:uni_id";
$query = $dbh -> prepare($sql);
$query->bindParam(':uni_id',$uni_id, PDO::PARAM_STR);

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
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>shopcampus | Free campus based classified ads site</title>

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
#ima{
    height:300px;
width:100%;
}
@media screen and (max-width: 992px) 
{
#ima{
height:300px;
width:100%;
}
</style>
</head>
<body>



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
<p >Browse all businesses around <?php echo $uniname; ?> </p>

</div>
</div>
</div>
</div>
</div>


<div class="main-container section-padding">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
<aside>

<div class="widget_search">
<form  action=""  id="search-form"  method="post">
<input type="search" class="form-control" autocomplete="off"name="valueToSearch" placeholder="Enter Business Name" id="search-input" value="">
<button type="submit" id="search-submit" class="search-btn" name="search"><i class="lni-search"></i></button>
</form>
</div>

<div class="widget categories">
<h4 class="widget-title">All Categories</h4>
<ul class="categories-list">
<?php include 'includes/categories.php';?>
</ul>
</div>

</aside>
</div>
<div class="col-lg-9 col-md-12 col-xs-12 page-content">

<div class="product-filter">
<div class="short-name">
<span>Showing (1 - 10 Businesses of <?php echo $stores_count; ?> listed Businesses)</span>
</div>
<div class="Show-item">
<span>Show Items</span>
<form class="woocommerce-ordering" method="post">
<label>
<select name="order" class="orderby">
<option selected="selected" value="menu-order">All Businesses</option>


</select>
</label>
</form>
</div>
<ul class="nav nav-tabs">


</ul>
</div>


<div class="adds-wrapper">
<div class="tab-content">
<div id="grid-view">
<div class="row">
<?php
$uni_id=$_SESSION['uni'];
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page =10;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(id) FROM tblbusiness WHERE institution='$uni_id'";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
   $query = "SELECT * FROM `tblbusiness` WHERE CONCAT(`Business`,`Category`) LIKE '%".$valueToSearch."%' AND institution='$uni_id' LIMIT $offset, $no_of_records_per_page";
   $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `tblbusiness` WHERE institution='$uni_id'";
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

<?php if(($countpro=mysqli_num_rows($search_result))>0){while($row = mysqli_fetch_array($search_result)){
$sid=$row['Sid'];
$em=$row['Email'];
$in=$row['institution'];

$ads= "SELECT count(id) as num FROM tblbusiness_products WHERE businessId='$sid'";
$ads_res = mysqli_query($conn,$ads);
$row12 = mysqli_fetch_assoc($ads_res);
$ads_count = $row12['num'];

?>
<?php
$sql1="SELECT * FROM tblusers WHERE EmailId='$em' ";
$result2=mysqli_query($conn,$sql1);
$row2 = mysqli_fetch_array($result2);
$name=$row2['FullName'];

?>
<?php
$sql2="SELECT * FROM tbluniversities WHERE id='$in' ";
$result3=mysqli_query($conn,$sql2);
$row1 = mysqli_fetch_array($result3);

$uni=$row1['uni_name'];
?>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
<div class="featured-box">
<figure>
<div class="icon">
<span class="bg-green"><i class="lni-heart"></i></span>
<span><i class="lni-bookmark"></i></span>
</div>
<a href="business-details.php?q=<?php echo htmlentities($row["Sid"])?>"><img class="img-fluid" src="my/img/shopimages/<?php echo htmlentities($row["banner"])?>" id="ima"  alt=""></a>
</figure>
<div class="feature-content" style="width:100%">

<h4><a href="ads-details.html"><?php echo htmlentities($row["Business"])?></a></h4>
<div class="product">
<h5><a href="business-details.php?q=<?php echo htmlentities($row["Sid"])?>" style="color:black">Specializes In </a>
<a href="business-details.php?q=<?php echo htmlentities($row["Sid"])?>" style="color:black"><?php echo htmlentities($row["Category"])?></a>
</h5>

</div>
<div class="meta-tag">

<span>
<a href="business-details.php?q=<?php echo htmlentities($row["Sid"])?>"><i class="lni-map-marker"></i> <?php echo htmlentities($row["location"])?></a>
</span>

</div>
<div class="listing-bottom">

<a href="business-details.php?q=<?php echo htmlentities($row["Sid"])?>" class="btn btn-common float-right">View Business</a>
</div>
</div>
</div>
</div>

      
<?php }}else{
                            echo "No Records Found";
                        } ?>

</div>
</div>

</div>
</div>

<div class="pagination-bar">
<nav>
<ul class="pagination justify-content-center">

         <li><a class="page-link active" href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>" style="padding:5px">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" >Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>" style="padding:5px">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li style="padding:5px"><a href="?pageno=<?php echo $total_pages; ?>" >Last</a></li>
</ul>
</nav>
</div>
</div>
</div>
</div>
</div>




<!--Footer -->
<?php include('includes/footer.php');?>
<?php include('includes/mobile-bar.php');?>
<!-- /Footer--> 

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