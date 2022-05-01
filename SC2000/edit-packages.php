<?php 
include 'functions/authodicate.php';
include('../includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopcampus</title>
       <link rel="stylesheet" href="fontawesome-icons/css/all.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Package Edit</h2>
                                
                                </div>
                                 
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Package Edit</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Packages info</h5>
                                                </div>
                                            </div>
                                            <?php
                                            if(isset($_POST['edit'])){
                                            $pid=$_POST['id'];
                                            $pack="SELECT * FROM tblpackages WHERE id='$pid'";
                                            $result=mysqli_query($conn,$pack);
                                            $row=mysqli_fetch_array($result);
                                            $package=$row['package_name'];
                                            $pay=$row['payable'];
                                            $validity=$row['validity'];
                                            $ads_limit=$row['ads_limit'];
                                            $featured_ads=$row['featured_ads'];
                                            $stores_limit=$row['stores_limit'];
                                            $featured_stores=$row['featured_stores'];
                                            $stores_ad_limit=$row['stores_ad_limit'];
                                            }
                                            
                                            ?>
                                            
                                                <form class="form-horizontal" method="post" action="">

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Package Name</label>
<div class="col-sm-10">
<input type="hidden" name="nid" class="form-control"  required="required" value="<?php echo $pid ;?>" autocomplete="off">
<input type="text" name="package" class="form-control" id="name" required="required" value="<?php echo $package ;?>" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Packages Price</label>
<div class="col-sm-10">
<input type="text" name="price" class="form-control" id="no"  required="required" value="<?php echo $pay ;?>"  autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Package Validity</label>
<div class="col-sm-10">
<input type="text" name="validity" class="form-control" id=""   required="required" value="<?php echo $validity;?>"  autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Ads Limit</label>
<div class="col-sm-10">
<input type="text" name="ads" class="form-control" id="" required="required"  value="<?php echo $ads_limit; ;?>"  autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Featured Ads</label>
<div class="col-sm-10">
<input type="text" name="fads" class="form-control" id="" required="required" value="<?php echo $featured_ads ;?>"  autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Stores Limit</label>
<div class="col-sm-10">
<input type="text" name="stores" class="form-control" id="" required="required" value="<?php echo $stores_limit ;?>"  autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Featured Stores</label>
<div class="col-sm-10">
<input type="text" name="fstores" class="form-control" id="" required="required" value="<?php echo $featured_stores;?>"  autocomplete="off">
</div>
</div>
<div class="form-group">
<label for="default" class="col-sm-2 control-label">Store Ads Limit</label>
<div class="col-sm-10">
<input type="text" name="sadslimit" class="form-control" id="" required="required" value="<?php echo $stores_ad_limit ;?>"  autocomplete="off">
</div>
</div>

                                        <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                                        </div>
                                                    </div>
                                                </form>
     <?php
error_reporting(0);
if(isset($_POST['submit'])){   
    $p_id=$_POST['nid'];
$package=$_POST['package'];
$price=$_POST['price']; 
$validity=$_POST['validity'];  
$ads=$_POST['ads']; 
$fads=$_POST['fads']; 
$stores=$_POST['stores']; 
$fstores=$_POST['fstores']; 
$sadslimit=$_POST['sadslimit'];
$sql="UPDATE tblpackages SET `package_name`='$package',`payable`='$price',`validity`='$validity',`ads_limit`='$ads',`featured_ads`='$fads'
,`stores_limit`='$stores',`featured_stores`='$fstores',`stores_ad_limit`='$sadslimit' WHERE id='$p_id'";
if($conn->query($sql)===TRUE);
{
echo "<script>alert('Asset Added Successfully!'); window.location='manage-packages.php'</script>";
}}

?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>

