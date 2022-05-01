<?php 
session_start();

include('includes/connection.php');
include"includes/time_function.php";
error_reporting(0);

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
#ima{
max-height:150px;
}
@media screen and (max-width: 992px) 
{
#ima{
max-height:950px;
width:100%;
}
</style>
</head>
<body>



<!--Header--> 
<?php
 include('includes/header.php');

?>

<!-- /Header --> 

<p><br/></p><p><br/></p>
<p><br/></p><p><br/></p>
<!--Listing-->

	<div class="container-fluid">
		<div class="row">
		<div class="col-md-1"></div>
        

		
            
            
			<div class="col-md-6 col-xs-12">
           
            <div class="panel-heading" style="font-size:20PX; color:black; background:whitesmoke; border:whitesmoke;" >Available Stores ( <?php echo $cnt; ?> )</div>
				<div class="product-filter" style="background: white;">
<div class="short-name">


<form role="search" action="" method="post"id="search-form">
<table>
<tr>
<td style="width: 1000px;">
<input type="text" class="form-control" autocomplete="off" name="valueToSearch" placeholder="Enter Store Name/Category To Search" id="search-input" value=""></td>

<td style="padding-left:10px;"><button type="submit" name="search" class="btn btn-common"><i class="fas fa-search"></i></button></td>
</tr></table>
</form>

</div>


</div>
				<div class="panel panel-info" style="border:whitesmoke;">


					

				
                    				<div class="panel-body" style="border:whitesmoke;">
                                    <?php
$uni_id=$_SESSION['uni'];
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page =10;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(id) FROM tblshops WHERE institution='$uni_id'";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
   $query = "SELECT * FROM `tblshops` WHERE CONCAT(`ShopName`,`Category`) LIKE '%".$valueToSearch."%' AND institution='$uni_id' LIMIT $offset, $no_of_records_per_page";
   $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `tblshops` WHERE institution='$uni_id'";
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


$ads= "SELECT count(id) as num FROM tblshop_products WHERE ShopId='$sid'";
$ads_res = mysqli_query($conn,$ads);
$row12 = mysqli_fetch_assoc($ads_res);
$ads_count = $row12['num'];

?>
                        <div class="col-md-4" style="border:whitesmoke;">
                        
							<div class="panel panel-info" style="border: 1px solid whitesmoke;">
								
							<a href="shop-details.php?q=<?php echo htmlentities($row["Sid"])?>">	<div class="panel-body">
                                                            <div class="meta-tag" >

</div>
									<img src="my/img/shopimages/<?php echo htmlentities($row["Image"])?>" id="ima" alt="Image" />
                                   <!--- <div class="icon">
<span class="bg-green"><form action="#" method="post"> 
<input type="hidden" name="pid" value="<?php echo htmlentities($result->Sid);?>">
<input type="hidden" name="user" value="<?php echo $email;?>">
<button type="submit" name="add_wishlist" style=" background: transparent; border:none;"><i class="lni-heart" style="color:#dc3545; "></i></button></form></span>

</div> --->
								</a>

                                </div>
									<div class="panel-heading" style="background: whitesmoke; border:whitesmoke;">
                                        <span style="color: dodgerblue;"><?php echo htmlentities($row["ShopName"])?></span><br />
                                    <span style="color: black;"><?php echo htmlentities($row["Category"]);?></span>
                            <div class="meta-tag">
<span >
<a href="shop-details.php?q=<?php echo htmlentities($row["Sid"]);?>" style="color: grey;">Ads: <?php echo htmlentities($ads_count);?></a>
</span><br />
<span>
<a href="shop-details.php?q=<?php echo htmlentities($row["Sid"]);?>" style="color: grey;">Location :<?php echo htmlentities($row["location"]);?></a>
</span>
<span><br />
<a href="shop-details.php?q=<?php echo htmlentities($row["Sid"]);?>" style="color: grey;">Views: <?php echo htmlentities($row["all_visitors"]);?></a>
</span>
</div>
                                
                        	

								</div>
							</div>
                            
						</div>
                       
                        
                        
                      
                         <!---more--->

                         
                        <?php }}else{
                            echo "No Records Found";
                        } ?>
			</div>
					
				</div>
			</div>
            
            
            
			<div class="col-md-1"></div>
		</div>
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
