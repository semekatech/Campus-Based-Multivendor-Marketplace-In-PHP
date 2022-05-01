<?php 
session_start();
error_reporting(0);
include('includes/connection.php');
include"includes/time_function.php";
$uni_id=$_SESSION['uni'];
?>
<?php
if(!isset($_SESSION["uni"])){
header("Location: index.php");
exit(); }
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<?php 

include('includes/head.php');

?>
<script data-ad-client="ca-pub-1648262613471118" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<style>
    .l{
        font-size:18px; 
    }


.ima{
height:300px;
width:100%; 


}
h5{
	font-size:16px;
	color:#e91e63;
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
			margin-bottom:0px;
		
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
<?php
 include('includes/header.php');

?>
<div class="page-header" style="background: url(assets/img/banner1.jpg);">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="breadcrumb-wrapper">

<form role="search" action="" method="post"id="search-form">
<table>
<tr>
<td style="width:800px;">
<input type="text" class="form-control" autocomplete="off" name="valueToSearch" placeholder="Enter Product Name To Search.."  id="search-input" value=""></td>
<td>

<td style="padding-left:10px;"><button type="submit" name="search" class="btn btn-common"><i class="fas fa-search"></i></button></td>
</tr></table>
</form>

</div>
</div>
</div>
</div>
</div>

<body>



<!--Header--> 

<!-- /Header --> 

<p><br/></p><p><br/></p>
<p><br/></p><p><br/></p>
<!--Listing-->
<section class="categories-icon bg-light section-padding" style="margin-top:-150px;">
<div class="container">
<h1 class="section-title">Browse By Category</h1>
<div class="row">

<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
<a href="ads_per_category.php?cat=Electronics">
<div class="icon-box">
<div class="icon">
<i class="lni-display"></i>
</div>
<h5>Electronics</h5>
</div>
</a>
</div>
<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
<a href="ads_per_category.php?cat=Mobile Phones">
<div class="icon-box">
<div class="icon">
<i class="lni-mobile"></i>
</div>
<h5>Mobiles</h5>
</div>
</a>
</div>
<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
<a href="ads_per_category.php?cat=Home,Furniture & Appliances">
<div class="icon-box">
<div class="icon">
<i class="lni-eraser"></i>
</div>
<h5>Furnitures</h5>
</div>
</a>
</div>
<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
<a href="ads_per_category.php?cat=Fashion & Wears">
<div class="icon-box">
<div class="icon">
<i class="lni-tshirt"></i>
</div>
<h5>Fashion & Wears</h5>
</div>
</a>
</div>
<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
<a href="ads_per_category.php?cat=Cars & Automotives">
<div class="icon-box">
<div class="icon">
<i class="lni-car"></i>
</div>
<h5>Vehicle</h5>
</div>
</a>
</div>
<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
<a href="ads_per_category.php?cat=Jobs">
<div class="icon-box">
<div class="icon">
<i class="lni-briefcase"></i>
</div>
<h5>Jobs</h5>
</div>
</a>
</div>
<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
<a href="ads_per_category.php?cat=Property Sales & Rentals">
<div class="icon-box">
<div class="icon">
<i class="lni-home"></i>
</div>
<h5>Real Estate</h5>
</div>
</a>
</div>


<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
<a href="ads_per_category.php?cat=Services">
<div class="icon-box">
<div class="icon">
<i class="lni-paint-roller"></i>
</div>
<h5>Services</h5>
</div>
</a>
</div>
<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
<a href="ads_per_category.php?cat=Sports & Arts">
<div class="icon-box">
<div class="icon">
<i class="lni-basketball"></i>
</div>
<h5>Sports & Arts</h5>
</div>
</a>
</div>
<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
<a href="ads_per_category.php?cat=Health & Beauty">
<div class="icon-box">
<div class="icon">
<i class="lni-apartment"></i>
</div>
<h5>Health & Beauty</h5>
</div>
</a>
</div>
<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
<a href="ads_per_category.php?cat=Food products">
<div class="icon-box">
<div class="icon">
<i class="lni-coffee-cup"></i>
</div>
<h5>Food products</h5>
</div>
</a>
</div>
<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
<a href="ads_per_category.php?cat=Building Supplies">
<div class="icon-box">
<div class="icon">
<i class="lni-apartment"></i>
</div>
<h5>Building Supplies</h5>
</div>
</a>
</div>

</div>
</div>
</section>

<section class="categories-icon bg-light section-padding" style="margin-top:-100px;">
<div class="container">
<h1 class="section-title">Browse All Products</h1>
<div class="row">
<?php
$uni_id=$_SESSION['uni'];
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
$total_pages_sql = "SELECT COUNT(*) As total_records FROM `tblproducts` WHERE institution='$uni_id'";
$result = mysqli_query($conn,$total_pages_sql);
$total_records = mysqli_fetch_array($result);
$total_records=$total_records['total_records'];
$total_pages = ceil($total_records / $no_of_records_per_page);
$second_last=$total_pages-1;
if(isset($_POST['search']))
{
$valueToSearch = $_POST['valueToSearch'];
$category= $_POST['category'];
$query = "SELECT * FROM `tblproducts` WHERE CONCAT(`ProductName`,`Price`,`ProductCategory`) LIKE '%".$valueToSearch."%' AND institution='$uni_id' LIMIT $offset, $no_of_records_per_page";
$search_result = filterTable($query);

}
else {
$query = "SELECT * FROM `tblproducts` WHERE institution='$uni_id' LIMIT $offset, $no_of_records_per_page ";
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

<div class="icon-box" id="content"  >
<div class="icon" style="float:right; position:fixed;z-index:-10">

<span><i class="lni-bookmark"></i></span>
</div>
<img src="my/img/productsimages/<?php echo htmlentities($row["Vimage1"])?>" class="ima"  alt="Image" />
<br>
<div>

<a href="#" style="color:black;background:transparent;"><b><?php echo htmlentities($row["ProductName"])?></b></a>
<h4 class="l"style="color:#e91e63" >KSh. <?php echo htmlentities(number_format($row["Price"]));?></h4>

</div></div>
</div></a>
<?php }}else{echo"no records";}
                       ?>

</div>
<div class="pagination-bar">
<nav>
<ul class="pagination justify-content-center">

	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($pageno <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($pageno > 1){ echo "href='?pageno=$prev'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_pages; $counter++){
			if ($counter == $pageno) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?pageno=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_pages > 10){
		
	if($pageno <= 13) {			
	 for ($counter = 1; $counter < 26; $counter++){		 
			if ($counter == $pageno) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?pageno=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?pageno=$second_last'>$second_last</a></li>";
		echo "<li><a href='?pageno=$total_pages'>$total_pages</a></li>";
		}

	 elseif($pageno > 12 && $pageno < $total_pages - 12) {		 
		echo "<li><a href='?pageno=1'>1</a></li>";
		echo "<li><a href='?pageno=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $pageno - $adjacents; $counter <= $pageno + $adjacents; $counter++) {			
           if ($counter == $pageno) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?pageno=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?pageno=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?pageno=$total_pages'>$total_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?pageno=1'>1</a></li>";
		echo "<li><a href='?pageno=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_pages - 14; $counter <= $total_pages; $counter++) {
          if ($counter == $pageno) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?pageno=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($pageno >= $total_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($pageno < $total_pages) { echo "href='?pageno=$next'"; } ?>>Next</a>
	</li>
    <?php if($pageno < $total_pages){
		echo "<li><a href='?pageno=$totalpages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>
</nav>

</div>
</div>
</section>
<!-- /Listing--> 

<!--Footer -->
<?php include('includes/footer.php');?>
<?php include('includes/mobile-bar.php');?>
<!-- /Footer--> 
<!-- Scripts --> 
<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

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
