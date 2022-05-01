<?php 
session_start();

include('../includes/connection.php');
include"../includes/time_function.php";
error_reporting(0);

$email=$_SESSION['login'];
$unive=$_SESSION['uni'];
?>
<?php 
if(strlen($_SESSION['login'])==0)
	{	
header('location:../index.php');
}
else{ 
if(isset($_POST['submit']))
  {
    $sql5="SELECT * FROM tblusers WHERE EmailId='$email' ";
$result5=mysqli_query($conn,$sql5);
$row5= mysqli_fetch_array($result5);
$uni=$row5['University'];

$by=$email;
$university="$uni";
$uploaded=time();
$category=$_POST['category'];
$status=$_POST['status'];
$product=$_POST['product'];
$price=$_POST['price'];
$overview=$_POST['overview'];
$f1=$_POST['f1'];
$f2=$_POST['f2'];
$f3=$_POST['f3'];
$state='1';
$promoted='No';
$id2=bin2hex(random_bytes(5));
$contacts=$_POST['contacts'];
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/productsimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/productsimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/productsimages/".$_FILES["img3"]["name"]);

$sql ="SELECT PostBy FROM tblproducts WHERE PostBy=:by";
$query= $dbh -> prepare($sql);
$query-> bindParam(':by', $by, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() >=5)
{

echo "<script>alert('We Are Sorry,You Have Reached Your Ads Limit,Kindly Open A Store To Upload More'); window.location='index.php'</script>";
} else{
    
$sql="INSERT INTO tblproducts(pid,ProductName,ProductCategory,Contacts,Price,ProductOverview,feature1,feature2,feature3,Vimage1,Vimage2,Vimage3,PostBy,uploaded,product_status,institution,state,promoted) 
VALUES(:id2,:product,:category,:contacts,:price,:overview,:f1,:f2,:f3,:vimage1,:vimage2,:vimage3,:by,:uploaded,:status,:university,:state,:promoted)";
$query = $dbh->prepare($sql);
$query->bindParam(':product',$product,PDO::PARAM_STR);
$query->bindParam(':id2',$id2,PDO::PARAM_STR);
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
$query->bindParam(':university',$university,PDO::PARAM_STR);
$query->bindParam(':by',$by,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':promoted',$promoted,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Ad Submitted successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}}


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
                                    <h2 class="title">Product Listing</h2>
                                
                                </div>
                                 
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Product Listing</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                           
                                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" style="color: green;"><?php echo htmlentities($msg); ?>
				<script>
setTimeout(function(){
window.location.href='manage-ads.php';
},3000);
</script><?php 
                }?></div>
                                            
                                                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="">


                                 <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Product Name</label>
                                                        <div class="col-sm-10">
 <input class="form-control " name="product" placeholder="Product Name" type="text" required>
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
<option value="<?php echo htmlentities($result->CategoryName);?>"><?php echo htmlentities($result->CategoryName);?></option>
<?php }} ?>
</select>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Product Status</label>
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
                                                        <input class="form-control input-md" name="contacts" placeholder="Contacts" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Price (in KSH)</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="price" placeholder="Enter Ad Price" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Feature 1</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="f1" placeholder="Enter Feature 1" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Feature 2</label>
                                                     
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="f2" placeholder="Enter Feature 2" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Feature 3</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="f3" placeholder="Enter Feature 3" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Product Overview</label>
                                                        <div class="col-sm-10">
                                                        <textarea class="form-control" name="overview" rows="3" required></textarea>
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
