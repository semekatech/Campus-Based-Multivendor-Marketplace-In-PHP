<?php 
session_start();
error_reporting(0);

include('../includes/connection.php');
include"../includes/time_function.php";


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
$id=$_POST['id'];
$uploaded=time();
$category=$_POST['category'];
$status=$_POST['status'];
$product=$_POST['product'];
$price=$_POST['price'];
$overview=$_POST['overview'];
$f1=$_POST['f1'];
$f2=$_POST['f2'];
$f3=$_POST['f3'];
$contacts=$_POST['contacts'];
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];

move_uploaded_file($_FILES["img1"]["tmp_name"],"img/productsimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/productsimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/productsimages/".$_FILES["img3"]["name"]);

$sql="update tblproducts set ProductName=:product,ProductCategory=:category,Contacts=:contacts,Price=:price,ProductOverview=:overview,feature1=:f1,feature2=:f2,feature3=:f3,Vimage1=:vimage1,Vimage2=:vimage2,Vimage3=:vimage3,uploaded=:uploaded,product_status=:status where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->bindParam(':product',$product,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':overview',$overview,PDO::PARAM_STR);
$query->bindParam(':f1',$f1,PDO::PARAM_STR);
$query->bindParam(':f2',$f2,PDO::PARAM_STR);
$query->bindParam(':f3',$f3,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':contacts',$contacts,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
$query->bindParam(':uploaded',$uploaded,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

$msg="Ad Updated successfully";



}}
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
                                    <h2 class="title">Ad Editing</h2>
                                
                                </div>
                                 
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Ad Editing</li>
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
$aid=$_POST['id'];
      $sql3="SELECT * FROM tblproducts WHERE id='$aid' ";
$result3=mysqli_query($conn,$sql3);
$row3= mysqli_fetch_array($result3);

$product=$row3['ProductName'];
$conts=$row3['Contacts'];
$price=$row3['Price'];
$overview=$row3['ProductOverview'];
$f1=$row3['feature1'];
$f2=$row3['feature2'];
$f3=$row3['feature3'];
}
 ?>
 <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" style="color: green;"><?php echo htmlentities($msg); ?> </div><?php }?>
                                                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="">


                                 <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Ad Name</label>
                                                        <div class="col-sm-10">
                <input type="hidden" class="form-control input-md" name="id" value="<?php echo $aid; ?>" type="text" required>
 <input class="form-control " name="product" value="<?php echo $product; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Select Category</label>
                                                        <div class="col-sm-10">
                                                        <select name="category" class="form-control" id="default" required="required">
<option value="none">Category</option>
<?php $ret="select id,CategoryName from tblcategories";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->CategoryName);?></option>
<?php }} ?>
</select>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Ad Status</label>
                                                        <div class="col-sm-10">
                                                        <select name="status" class="form-control" id="default" required="required">
<option value="none">Select Status</option>
<option value="new">New</option>
<option value="old">Old</option>
</select>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Contacts</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="contacts"  value="<?php echo $conts; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Price (in KSH)</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="price" value="<?php echo $price; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Ad Name</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="f1" value="<?php echo $f1; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Ad Name</label>
                                                     
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="f2" value="<?php echo $f2; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Ad Name</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="f3" value="<?php echo $f3; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Ad Overview</label>
                                                        <div class="col-sm-10">
                                                        <textarea class="form-control" name="overview" rows="3" required><?php echo $overview; ?></textarea>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Image 1</label>
                                                        <div class="col-sm-10">
                                                        <input type="file" name="img1" required >
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Image 2</label>
                                                        <div class="col-sm-10">
                                                        <input type="file" name="img2" required >
                                                        </div>
                                                    </div>
                                                       <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Image 3</label>
                                                        <div class="col-sm-10">
                                                        <input type="file" name="img3" required >
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

