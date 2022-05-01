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
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$username=$_POST['username'];
$university=$_POST['university'];
$password=md5($_POST['password']); 
$sql="update tblusers set FullName=:fname,UserName=:username,EmailId=:email,Password=:password,ContactNo=:mobile,University=:university where EmailId=:email ";
$query = $dbh->prepare($sql);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':university',$university,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

$msg="Updated successfully";



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
                                    <h2 class="title">User Profile</h2>
                                
                                </div>
                                 
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Profile</li>
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
                            
$email=$_SESSION['login'];
      $sql3="SELECT * FROM tblusers WHERE EmailId='$email' ";
$result3=mysqli_query($conn,$sql3);
$row3= mysqli_fetch_array($result3);

$fname=$row3['FullName'];
$email=$row3['EmailId']; 
$mobile=$row3['ContactNo'];
$user=$row3['Username'];
$password=md5($row3['Password']); 
$conts=$row3['Contacts'];


 ?>
                                            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" style="color: green;"><?php echo htmlentities($msg); ?>
				<script>
setTimeout(function(){
window.location.href='profile.php';
},3000);
</script><?php 
                }?></div>
                                            
                                                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="">


                                 <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">FullNames</label>
                                                        <div class="col-sm-10">
 <input class="form-control " name="fullname" value="<?php echo $fname; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                   
                                                     
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Username</label>
                                                        <div class="col-sm-10">
                                                        
                                                        <input class="form-control input-md" name="username" value="<?php echo $user; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Contacts</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="mobileno" value="<?php echo $mobile; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Email</label>
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="emailid" value="<?php echo $email; ?>" type="text" required>
                                                        </div>
                                                    </div>
                                                      <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Select University</label>
                                                        <div class="col-sm-10">
                                                        <select name="university" class="form-control" id="default" required="required">
<option value="none">Select University</option>
<?php $sql = "SELECT * from  tbluniversities ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?> 

<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->uni_name);?></option>

<?php }} ?>
</select>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">Password</label>
                                                     
                                                        <div class="col-sm-10">
                                                        <input class="form-control input-md" name="password"  type="text" required>
                                                        </div>
                                                    </div>
                                                    
                                                     
                                                   
                                        <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
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
