<?php
session_start();
error_reporting(0);
$email=$_SESSION['login'];
include('../includes/connection.php');
include"../includes/time_function.php";
if(strlen($_SESSION['login'])==0)
	{	
header('location:../index.php');
}
else{
    $id=$_GET['sid'];
	?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopcampus</title>
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
                                    <h2 class="title">Business Products</h2>
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Users</li>
            							<li class="active">Business Products</li>
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
                                                    <h5>View Products Info</h5>
                                                </div>
                                            </div>
<br />
                                            <a href="business-adpost.php?stid=<?php echo htmlentities($id)?>" class="btn btn-primary" style="margin-left: 10px;">Add Product</a>
                                
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                           <th>Photo</th>
<th>Name</th>
<th>Price(Ksh)</th>
<th>Action</th>
                                                        </tr>
														
                                                    </thead>
                                                    
                                                    <tbody>
<?php 

$id=$_GET['sid'];
$sql = "SELECT * FROM tblbusiness_products where tblbusiness_products.businessId=:id";

 $query = $dbh -> prepare($sql);
$query->bindParam(':id',$id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
    $id=$result->id;
    ?>	
<tr>
 <td><?php echo $cnt;?></td>
                                                            <td><img class="img-fluid" src="img/productsimages/<?php echo htmlentities($result->Image);?>" width="100px" alt="Ad Image"></td>
                                                             <td><?php echo htmlentities($result->ProductName);?></td>
                                                             
                                                            <td><?php echo htmlentities(number_format($result->Price));?></td>
                                                             <td>
       <form method="post" action="edit-businessad.php">
        <input name="id" type="hidden" value="<?php echo htmlentities($result->id);?>">
        <button  type="submit" style="border:none; background-color:transparent;"  name="edit"><i class="fa fa-edit"></i></button>
      </form>
      <form method="post">
        <input name="id" type="hidden" value="<?php echo htmlentities($result->id);?>">
        <button type="submit" style="border:none; background-color:transparent;"  name="delete"><i class="fa fa-trash"></i></button>
      </form></td>
                                                           


</tr>
 <?php
		$counter++;
    }   

}else
{
    echo "0 results";
}
	
?> 
                                                       
                                                    
                         <?php
if(isset($_REQUEST['delete']))
	{
$delid=$_POST['id'];
$select="select * from tblbusiness_products where id='$id'";
$result=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($result);
$imageName=$row['Image'];
$delete="img/productsimages/".$imageName;
if(unlink($delete)){
    $deletesql="delete from tblbusiness_products where id='$id'";
    $deleted=mysqli_query($conn,$deletesql);
    if($deleted){
    echo "<script>alert('Ad Deleted Successfully'); window.location='manage-business.php'</script>"; 
      
    }else{
       $error="error";   
    }
}

}
?>       </tbody>
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

<?php } ?>
