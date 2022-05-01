
<?php 
session_start();
error_reporting(0);
include('../includes/connection.php');


$email=$_SESSION['login'];
?>
<?php 
if(strlen($_SESSION['login'])==0)
	{	
header('location:../index.php');
}
else{ 
if(isset($_POST['submit']))
  {
$sid=$_POST['id'];
$product=$_POST['product'];
$price=$_POST['price'];
$vimage1=$_FILES["img1"]["name"];

move_uploaded_file($_FILES["img1"]["tmp_name"],"img/productsimages/".$_FILES["img1"]["name"]);

$sql="update tblbusiness_products set ProductName=:product,Price=:price,Image=:vimage1 where id=:sid";
$query = $dbh->prepare($sql);
$query->bindParam(':product',$product,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Ad Updated successfully";
}
else 
{
$msg="Ad Updated successfully";
}
}


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
                                    <h2 class="title">Product Editing</h2>
                                
                                </div>
                                 
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Product Editing</li>
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
                                                 
                                                </div>
                                            </div>
<?php 
if(isset($_POST['edit']))
  {
$Sid=$_POST['id'];
      $sql3="SELECT * FROM tblbusiness_products WHERE id='$Sid' ";
$result3=mysqli_query($conn,$sql3);
$row3= mysqli_fetch_array($result3);

$product=$row3['ProductName'];
$price=$row3['Price'];
}
 ?>
 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" style="color: green;"><?php echo htmlentities($msg); ?> </div>
                <script>
setTimeout(function(){
window.location.href='manage-business.php';
},3000);
</script>
                <?php }?>
                                                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="">


                                 <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Ad Name</label>
                                                        <div class="col-sm-10">
                <input type="hidden" class="form-control input-md" name="id" value="<?php echo $Sid; ?>" type="text" required>
 <input class="form-control " name="product" value="<?php echo $product; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                   
                                                     
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Price (in KSH)</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="price"  value="<?php echo $price; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                    
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Image 1</label>
                                                        <div class="col-sm-10">
                                                        <input type="file" name="img1" required >
                                                        </div>
                                                    </div>

                                        <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                                                        </div>
                                                    </div>
                                                    
                                                </form>
     
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
<?php }?>
