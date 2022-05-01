<?php 
include 'functions/authodicate.php';
error_reporting(0);
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
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
          <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Activation Requests</h2>
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Stores</li>
            							<li class="active">Activation Requests</li>
            						</ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>View Stores Info</h5>
                                                    
                                                </div>
                                            </div>

                                
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0"style="width=200%" >
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Shop Name</th>
                                                            <th>Request Date</th>
                                                             <th>Payment Code</th>
                                                            <th>Contacts</th>
                                                            <th>Email</th>
                                                            <th>Action</th>
                                                        </tr>
														
                                                    </thead>
                                                    
                                                    <tbody>
<?php
include('../includes/connection.php');
       $sql="SELECT * FROM promoted_shops WHERE status='Pending'";
$result=$conn->query($sql);
if($result->num_rows>0){
	$counter = 1;
    while($row=$result->fetch_assoc()){
       $sid=$row["shop_id"];
       $sql1= "SELECT ShopName FROM tblshops WHERE id='$sid'";
       $result1=mysqli_query($conn,$sql1);
       $row1=mysqli_fetch_assoc($result1);
       $name=$row1['ShopName'];
       
		?>
        
<tr>
 <td><?php echo $counter;?></td>
                                                            <td style="color: blue;"><?php echo htmlentities($name)?></td>
                                                            <td><?php echo date_format(date_create($row["timestamp"]), " d M Y")  ;?></td>
                            <td><?php echo htmlentities($row["code"])?></td>
                                                       <td><?php echo htmlentities($row["phone"])?></td>
                                                            <td><?php echo htmlentities($row["user"])?></td>
                                                          
                                                            
                                                           
                               
                                                   <td>
      <form action="#" method="post" >
        <input name="id" type="hidden" value="<?php echo htmlentities($sid)?>">
        <button  type="submit" style="border:none; background-color:transparent;"  name="accept" onclick="return confirm('Are You Sure You Want To Accept This Payment?');"><span style="color:green">Accept</span></button>
      </form></td>
       <td>
      <form action="#" method="post" >
        <input name="id" type="hidden" value="<?php echo htmlentities($sid)?>">
        <button  type="submit" style="border:none; background-color:transparent;"  name="decline" onclick="return confirm('Are You Sure You Want To Decline This Payment?');"><span style="color:green">Decline</span></button>
      </form></td>
</tr>
 <?php
		$counter++;
    }   

}
	
?> 
                                                       
                                                    
                         <?php 
if(isset($_POST['accept']))
{
$s=$_POST['id'];
$sus="UPDATE `tblshops` SET `promoted`='Yes' WHERE `id`='$s'";
$query=mysqli_query($conn,$sus);
if($conn->query($sus)===TRUE);
{
$s=$_POST['id'];
$p="UPDATE `promoted_shops` SET `status`='Accepted' WHERE `shop_id`='$s'";
$query=mysqli_query($conn,$p);
echo "<script>alert('Accepted & Store Promoted Successfully!'); window.location='manage-featured-stores.php'</script>";
}}?>
 <?php 
if(isset($_POST['decline']))
{
$s=$_POST['id'];
$dec="UPDATE `promoted_shops` SET `status`='Declined' WHERE `shop_id`='$s'";
$query=mysqli_query($conn,$dec);
if($conn->query($dec)===TRUE);
{
echo "<script>alert('Request Declined!'); window.location='activation_requests.php'</script>";
}}?>                                   </tbody>
                                                </table>
<h2>Accepted Requests</h2>
                                         
                                         
                                          <table id="example" class="display table table-striped table-bordered" cellspacing="0"style="width=200%" >
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Shop Name</th>
                                                            <th>Request Date</th>
                                                             <th>Payment Code</th>
                                                            <th>Contacts</th>
                                                            <th>Email</th>
                                                            <th>Action</th>
                                                        </tr>
														
                                                    </thead>
                                                    
                                                    <tbody>
<?php
include('../includes/connection.php');
       $sql="SELECT * FROM promoted_shops WHERE status='Accepted'";
$result=$conn->query($sql);
if($result->num_rows>0){
	$counter = 1;
    while($row=$result->fetch_assoc()){
       $sid=$row["shop_id"];
       $sql1= "SELECT ShopName FROM tblshops WHERE id='$sid'";
       $result1=mysqli_query($conn,$sql1);
       $row1=mysqli_fetch_assoc($result1);
       $name=$row1['ShopName'];
       
		?>
        
<tr>
 <td><?php echo $counter;?></td>
                                                            <td style="color: blue;"><?php echo htmlentities($name)?></td>
                                                            <td><?php echo date_format(date_create($row["timestamp"]), " d M Y")  ;?></td>
                            <td><?php echo htmlentities($row["code"])?></td>
                                                       <td><?php echo htmlentities($row["phone"])?></td>
                                                            <td><?php echo htmlentities($row["user"])?></td>
                                                          
                                                            
                                                           
                               
       <td>
      <form action="#" method="post" >
        <input name="id" type="hidden" value="<?php echo htmlentities($sid)?>">
        <button  type="submit" style="border:none; background-color:transparent;"  name="redecline" onclick="return confirm('Are You Sure You Want To Decline This Payment?');"><span style="color:green">Re-Decline</span></button>
      </form></td>
</tr>
 <?php
		$counter++;
    }   

}
	
?> 
                                                       
                                                    
                         
 <?php 
if(isset($_POST['redecline']))
{
$s=$_POST['id'];

$sus="UPDATE `tblshops` SET `promoted`='No' WHERE `id`='$s'";
$query=mysqli_query($conn,$sus);
if($conn->query($sus)===TRUE);
{
echo "<script>alert('Request Declined!'); window.location='spromotion_requests.php'</script>";
$s=$_POST['id'];
$p="UPDATE `promoted_shops` SET `status`='Declined' WHERE `shop_id`='$s'";
$query=mysqli_query($conn,$p);
}}?>                                   </tbody>
                                                </table>
                                                
                                                
                                                <h2>Declined Requests</h2>
                                         
                                         
                                          <table id="example" class="display table table-striped table-bordered" cellspacing="0"style="width=200%" >
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Shop Name</th>
                                                            <th>Request Date</th>
                                                             <th>Payment Code</th>
                                                            <th>Contacts</th>
                                                            <th>Email</th>
                                                            <th>Action</th>
                                                        </tr>
														
                                                    </thead>
                                                    
                                                    <tbody>
<?php
include('../includes/connection.php');
       $sql="SELECT * FROM promoted_shops WHERE status='Declined'";
$result=$conn->query($sql);
if($result->num_rows>0){
	$counter = 1;
    while($row=$result->fetch_assoc()){
       $sid=$row["shop_id"];
       $sql1= "SELECT ShopName FROM tblshops WHERE id='$sid'";
       $result1=mysqli_query($conn,$sql1);
       $row1=mysqli_fetch_assoc($result1);
       $name=$row1['ShopName'];
       
		?>
        
<tr>
 <td><?php echo $counter;?></td>
                                                            <td style="color: blue;"><?php echo htmlentities($name)?></td>
                                                            <td><?php echo date_format(date_create($row["timestamp"]), " d M Y")  ;?></td>
                            <td><?php echo htmlentities($row["code"])?></td>
                                                       <td><?php echo htmlentities($row["phone"])?></td>
                                                            <td><?php echo htmlentities($row["user"])?></td>
                                                          
                                                            
                                                           
                               
       <td>
      <form action="#" method="post" >
        <input name="id" type="hidden" value="<?php echo htmlentities($sid)?>">
        <button  type="submit" style="border:none; background-color:transparent;"  name="reaccept" onclick="return confirm('Are You Sure You Want To Re-Accept This Payment?');"><span style="color:green">Re-Accept</span></button>
      </form></td>
</tr>
 <?php
		$counter++;
    }   

}
	
?> 
                                                       
                                                    
                         
 <?php 
if(isset($_POST['reaccept']))
{
$s=$_POST['id'];
$sus="UPDATE `tblshops` SET `promoted`='Yes' WHERE `id`='$s'";
$query=mysqli_query($conn,$sus);
if($conn->query($sus)===TRUE);
{
echo "<script>alert('Request Accepted!'); window.location='spromotion_requests.php'</script>";
$s=$_POST['id'];
$p="UPDATE `promoted_shops` SET `status`='Accepted' WHERE `shop_id`='$s'";
$query=mysqli_query($conn,$p);
}}?>                                   </tbody>
                                                </table>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

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


