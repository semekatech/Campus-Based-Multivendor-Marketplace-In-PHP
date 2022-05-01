<?php 
session_start();
include('includes/connection.php');
include"includes/time_function.php";
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<?php 

include('includes/head.php');

?>

</head>
<body>



<!--Header--> 
<?php include('includes/header.php');
$uni_id=$_SESSION['university'];?>

<!-- /Header --> 

<p><br/></p><p><br/></p>
<p><br/></p><p><br/></p>
<!--Listing-->

	<div class="container-fluid">
		<div class="row">
		<div class="col-md-1"></div>
        
		<div class="widget" id="aside">
        <h4 style="font-size:18px; text-align:center; color:red">Premium Ads</h4>

 <?php

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page =3;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(id) FROM tblproducts";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        $sql = "SELECT * FROM promoted";
        $result2=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result2)){
        $id=$row['productId'];
   $sql = "SELECT * FROM tblproducts WHERE id='$id' LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($res_data)){
            $category=$row["ProductCategory"];
            $time=$row["uploaded"];
            $email=$row["PostBy"];
					 ?>
                            
                     <?php 
      $sql3="SELECT * FROM tblusers WHERE EmailId='$email' ";
$result3=mysqli_query($conn,$sql3);
$row3= mysqli_fetch_array($result3);

$user=$row3['FullName']; ?>

                        
							<div class="panel panel-info">

							<a href="shop_products_details.php?spid=<?php echo htmlentities($row["id"])?>">	<div class="panel-body">

									<img src="my/img/productsimages/<?php echo htmlentities($row["Vimage1"])?>" class="img-responsive" style="max-height: 150px;" alt="Image" />
<div class=""><i class="fas fa-star" ></i><i class="fas fa-star" ></i><i class="fas fa-star" ></i></div>
								</a>
                                 
                                </div>
											<div class="panel-heading" style="background: whitesmoke; border:whitesmoke;">
                                <span style="color: black;"><?php echo htmlentities($row["ProductName"])?></span>
                                 <button style="float:right;" class="price"> Ksh. <?php echo htmlentities(number_format($row["Price"]));?></button>
                              <p style="font-size:14px; color:black;"><i class="fas fa-user" ></i> <?php echo htmlentities($user)?></p>	   
						    	
                            <div class="meta-tag">

<span>
<a href="#"><i class="lni-calendar"></i> <?php echo htmlentities($time = time_stamp($time))?></a>&nbsp;
</span>
<span>
<a href="#"><i class="lni-tag"></i> <?php echo htmlentities($row["product_status"])?></a>&nbsp;
</span>
<span>
<a href="#"><i class="fas fa-eye"></i> <?php echo htmlentities($row["views"])?></a>
</span>


</div>
								</div>
							</div>
                        
<?php } }?>
</div>
                                    <?php

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page =10;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(id) FROM tblproducts";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['product'];
     
   $query = "SELECT * FROM `tblproducts` WHERE CONCAT(`ProductName`,`Price`,`ProductCategory`) LIKE '%".$valueToSearch."%' LIMIT $offset, $no_of_records_per_page";
   $search_result = filterTable($query);
    
    $re= "SELECT count(id) as num FROM tblproducts WHERE CONCAT(`ProductName`,`Price`,`ProductCategory`) LIKE '%".$valueToSearch."%' and institution='$uni_id' and state='1'" ;
$ads_res = mysqli_query($conn,$re);
$row = mysqli_fetch_assoc($ads_res);
$ads_count = $row['num'];
}


// function to connect and execute the query
function filterTable($query)
{
    include('includes/connection.php');
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}
					 ?>
            
            
			<div class="col-md-8 col-xs-12">
            <div class="panel-heading" style="font-size:20PX; color:black; background:whitesmoke; border:whitesmoke;" ><?php echo "$ads_count"; ?> Search Results Founds</div>

				<div class="panel panel-info" style="border:whitesmoke;">


					

				
                    				<div class="panel-body" style="border:whitesmoke;">

                        

<?php if(($countpro=mysqli_num_rows($search_result))>0){while($row = mysqli_fetch_array($search_result)){?>
                        <div class="col-md-4" style="border:whitesmoke;">
                        
							<div class="panel panel-info" style="border: 1px solid whitesmoke;">
								
							<a href="product-details.php?pid=<?php echo htmlentities($row["id"])?>">	<div class="panel-body">
                                                            <div class="meta-tag" >
<span >
<i class="lni-tag" ></i> <?php echo htmlentities($row["product_status"])?>&nbsp;
</span>
</div>
									<img src="my/img/productsimages/<?php echo htmlentities($row["Vimage1"])?>" class="img-responsive" style="max-height: 150px;" alt="Image" />
                                   <!--- <div class="icon">
<span class="bg-green"><form action="#" method="post"> 
<input type="hidden" name="pid" value="<?php echo htmlentities($result->id);?>">
<input type="hidden" name="user" value="<?php echo $email;?>">
<button type="submit" name="add_wishlist" style=" background: transparent; border:none;"><i class="lni-heart" style="color:#dc3545; "></i></button></form></span>

</div> --->
								</a>

                                </div>
									<div class="panel-heading" style="background: whitesmoke; border:whitesmoke;">
                                <span style="color: black;"><?php echo htmlentities($row["ProductName"])?></span>
                                 <button style="float:right;" class="price"> Ksh. <?php echo htmlentities(number_format($row["Price"]));?></button>
                        	<span style="color: green;"><?php echo htmlentities($row["ProductCategory"])?></span>

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
