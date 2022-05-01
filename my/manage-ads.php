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
                                    <h2 class="title">My Products</h2>
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Products</li>
            							<li class="active">My Products</li>
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
                                                    <h5><a href="post-add.php" class="btn btn-primary">Add Product <i class="fas fa-plus"></i></a></h5>
                                                   
                                                </div>
                                            </div>

                                
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                           <th>Photo</th>
<th>Title</th>
<th>Category</th>
<th>Posted</th>
<th>Price(Ksh)</th>
<th>Featured</th>
<th>Actions</th>
                                                        </tr>
														
                                                    </thead>
                                                    
                                                    <tbody>
<?php 

$sql = "SELECT * FROM tblproducts WHERE tblproducts.PostBy=:email AND state='1'";
 $query = $dbh -> prepare($sql);
$query->bindParam(':email',$email, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	
      $time=$result->uploaded;
      $promoted=$result->promoted;
      ?>	
<tr>
 <td><?php echo $cnt;?></td>
                                                            <td><img class="img-fluid" src="img/productsimages/<?php echo htmlentities($result->Vimage1);?>" alt="Ad Image"  width="70px"></td>
                                                            <td><?php echo htmlentities($result->ProductName);?></td>
                                                            <td><?php echo htmlentities($result->ProductCategory);?></td>
                                                            <td><?php echo htmlentities($time = time_stamp($time))?></td>
                                                            <td><?php echo htmlentities(number_format($result->Price));?></td>
                
  <?php  if(($promoted=='No')){?>
       <td>
                             <form method="post" action="advert.php">
        <input name="id" type="hidden" value="<?php echo htmlentities($result->id);?>">
        <button type="submit" style="border:none; background-color:transparent;"  name="promote"><span style="color:dodgerblue">Promote</span</button>
      </form></td>
                                <?php }
                                else{ ?>
                                  <td><span style="color:green">Promoted</span></td>
                                <?php
                                
                                }?>
     
     	    
                                                                                               
                                                                                                 <td>
       <form method="post" action="edit-ad.php">
        <input name="id" type="hidden" value="<?php echo htmlentities($result->id);?>">
        <button  type="submit" style="border:none; background-color:transparent;"  name="edit"><i class="fa fa-edit"></i></button>
      </form>
      <form method="post">
        <input name="id" type="hidden" value="<?php echo htmlentities($result->id);?>">
        <button type="submit" style="border:none; background-color:transparent;"  name="delete"><i class="fa fa-trash"></i></button>
      </form>
      </td>
</tr>
 <?php
		$cnt=$cnt+1;;
    }   

}	
?> 
                                                       
 
    <?php
if(isset($_POST['delete']))
	{
$delid=$_POST['id'];
$select="select * from tblproducts where id='$delid'";
$result=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($result);
$imageName=$row['Vimage1'];
$delete="img/productsimages/".$imageName;
if(unlink($delete)){
    $deletesql="delete from tblproducts where id='$delid'";
    $deleted=mysqli_query($conn,$deletesql);
    if($deleted){
      $msg="Product deleted successfully";  
    }else{
       $error="Error";   
    }
}

}
?>                                                             </tbody>
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