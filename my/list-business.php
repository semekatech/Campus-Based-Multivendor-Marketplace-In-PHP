<?php 
session_start();
error_reporting(0);
include('../includes/connection.php');
include"../includes/time_function.php";


$email=$_SESSION['login'];
$user="SELECT University FROM tblusers WHERE EmailId='$email'";
$result3=mysqli_query($conn,$user);
$row=mysqli_fetch_assoc($result3);
$uni=$row['University']

?>
<?php 
if(strlen($_SESSION['login'])==0)
	{	
header('location:../index.php');
}
else{ 
if(isset($_POST['submit']))
  {
$category=$_POST['category'];
$bussines=$_POST['bussines'];
$email=$email;
$overview=$_POST['overview'];
$services=$_POST['services'];
$link=$_POST['link'];
$location=$_POST['location'];
$contacts=$_POST['contacts'];
$banner=$_FILES["banner"]["name"];
$state='Pending';
$promoted='No';
$sid=bin2hex(random_bytes(5));
$date_opened='09/24/2021';
$payment_due= date('Y-m-d',strtotime($date_opened. '+ 30 days'));
$university=$uni;
move_uploaded_file($_FILES["banner"]["tmp_name"],"img/shopimages/".$_FILES["banner"]["name"]);

$sql="INSERT INTO tblbusiness(Sid,Business,Category,Contacts,Email,Overview,services,link,location,institution,banner,payment_due,state,promoted) 
VALUES(:sid,:bussines,:category,:contacts,:email,:overview,:services,:link,:location,:university,:banner,:payment_due,:state,:promoted)";
$query = $dbh->prepare($sql);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->bindParam(':bussines',$bussines,PDO::PARAM_STR);
$query->bindParam(':university',$university,PDO::PARAM_STR);
$query->bindParam(':link',$link,PDO::PARAM_STR);
$query->bindParam(':services',$services,PDO::PARAM_STR);
$query->bindParam(':state',$state,PDO::PARAM_STR);
$query->bindParam(':promoted',$promoted,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':location',$location,PDO::PARAM_STR);
$query->bindParam(':contacts',$contacts,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':payment_due',$payment_due,PDO::PARAM_STR);
$query->bindParam(':overview',$overview,PDO::PARAM_STR);
$query->bindParam(':banner',$banner,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Business submitted successfully";
$_SESSION['id']=$sid;
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
        <style>
        #post_container{
    padding: 19px;
  margin-bottom: 20px;
  background-color: #f5f5f5;
  border: 1px solid #e3e3e3;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
    }</style>
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
                                    <h2 class="title">List Business</h2>
                                
                                </div>
                                 
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                               
                                <div id="post_container">
  <span style="color:black; font-size:16px;"><span style="color:red;">Notice!! Notice!!</span></span><br />
  <p style="color:black">We would like to make your business reach as many people as possible, and help you convert the audience to your customers,
  For business listing we charge a one time fee of <b>100Ksh</b>.This fee will facilitate platform maintenance and promotion.Once 
  paid, your business listing will be activated <b>within 24 hours</b>.Incase of much delay reach us via: <b>0705030613</b></p>
 <span style="color:dodgerblue;"></span>
 </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            
                                            
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
 <input class="form-control " name="bussines" placeholder="e.g Semeka Technologies" type="text" required>
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
                                                        <input class="form-control input-md" name="contacts" placeholder="e.g 0705030613" type="text" required>
                                                        </div>
                                                    </div>
                                                   
                                                 
                                                    
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Business Location</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="location" placeholder="e.g Waginge Town" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Business Overview</label>
                                                        <div class="col-sm-10">
                                                        <textarea class="form-control" name="overview" rows="3" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Services</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="services" placeholder="e.g Web Development,Graphic Design,Marketing" type="text" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Any Link</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="link" placeholder="e.g https:www.semekatech.co.ke" type="text" required>
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
