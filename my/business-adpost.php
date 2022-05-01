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
$id=$_GET['stid'];

$product=$_POST['product'];
$price=$_POST['price'];
$vimage1=$_FILES["img1"]["name"];
$psa=bin2hex(random_bytes(5));
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/productsimages/".$_FILES["img1"]["name"]);
$by=$email;

$sql="INSERT INTO tblbusiness_products(psa,ProductName,Price,Image,businessId) 
VALUES(:psa,:product,:price,:vimage1,:id)";
$query = $dbh->prepare($sql);
$query->bindParam(':psa',$psa,PDO::PARAM_STR);
$query->bindParam(':product',$product,PDO::PARAM_STR);

$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Product posted successfully";
}
else 
{
$error="Something went wrong. Please try again";
}
}
	?>

<!DOCTYPE html>
<html lang="en">
    <head>
       <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ShopCampus</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
     <link rel="stylesheet" href="../assets/fontawesome-icons/css/all.css">

        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
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
                                    <h2 class="title">Products Listing</h2>
                                
                                </div>
                                 
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Products Listing</li>
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
                                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" style="color: green;"><?php echo htmlentities($msg); ?> <script>
setTimeout(function(){
window.location.href='manage-business.php';
},3000);
</script><?php 
                }?></div>
                                            
                                                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="">


                                 <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Product Name</label>
                                                        <div class="col-sm-10">
 <input class="form-control " name="product" placeholder="Ad Name" type="text" required>
                                                        </div>
                                                    </div>
                                                   
             
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Price (in KSH)</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="price" placeholder="Enter Ad Price" type="text" required>
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
<!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
    </body>
</html>


<?php } ?>
