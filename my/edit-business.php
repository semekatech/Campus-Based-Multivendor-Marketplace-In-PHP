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
$bid=$_POST['id'];
$category=$_POST['category'];
$business=$_POST['business'];
$overview=$_POST['overview'];
$services=$_POST['services'];
$link=$_POST['link'];
$location=$_POST['location'];
$contacts=$_POST['contacts'];
$banner=$_FILES["banner"]["name"];
move_uploaded_file($_FILES["banner"]["tmp_name"],"img/shopimages/".$_FILES["banner"]["name"]);
$sql="update tblbusiness set Business=:business,Category=:category,Contacts=:contacts,Overview=:overview,services=:services,link=:link,location=:location,banner=:banner
where id=:bid";
$query = $dbh->prepare($sql);
$query->bindParam(':bid',$bid,PDO::PARAM_STR);
$query->bindParam(':business',$business,PDO::PARAM_STR);
$query->bindParam(':link',$link,PDO::PARAM_STR);
$query->bindParam(':services',$services,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':location',$location,PDO::PARAM_STR);
$query->bindParam(':contacts',$contacts,PDO::PARAM_STR);
$query->bindParam(':overview',$overview,PDO::PARAM_STR);
$query->bindParam(':banner',$banner,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Business Updated successfully";
}
else 
{
$msg="Business Updated successfully";
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
                                    <h2 class="title">Business Edit</h2>
                                
                                </div>
                                 
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Business Edit</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                        <?php 
    if(isset($_POST['edit']))
{                             
$bid=$_POST['id'];
      $sql3="SELECT * FROM tblbusiness WHERE id='$bid' ";
$result3=mysqli_query($conn,$sql3);
$row3= mysqli_fetch_array($result3);

$business=$row3['Business'];
$overview=$row3['Overview'];
$services=$row3['services'];
$link=$row3['link'];
$location=$row3['location'];
$contacts=$row3['Contacts'];
}
 ?>
                                            
                                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" style="color: green;"><?php echo htmlentities($msg); ?> <script>
setTimeout(function(){
window.location.href='manage-business.php';
},3000);
</script><?php 
                }?></div>
                                                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="">


                                 <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Business Name</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control " name="id" value="<?php echo $bid; ?>" type="hidden" required>
 <input class="form-control " name="business" value="<?php echo $business; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Business Category</label>
                                                        <div class="col-sm-10">
                                                        <select name="category" class="form-control" id="default" required="required">
<option value="none">Category</option>
<?php $ret="select id,CategoryName from bscategories";
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
                                                        <label for="default" class="col-sm-2 control-label">Business Contacts</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="contacts" value="<?php echo $contacts; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                   
                                                 
                                                    
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Business Location</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="location" value="<?php echo $location; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Business Overview</label>
                                                        <div class="col-sm-10">
                                                        <textarea class="form-control" name="overview" rows="3" required><?php echo $overview; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Services</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="services" value="<?php echo $services; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Any Link</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="link" value="<?php echo $link; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                      <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Business Cover Image</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="banner"  type="file" required>
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
