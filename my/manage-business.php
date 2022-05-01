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
                                    <h2 class="title">My Business</h2>
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Stores</li>
            							<li class="active">My Business</li>
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
                                                    <h5><a href="list-business.php" class="btn btn-primary">List Business <i class="fas fa-plus"></i></a></h5>
                                                   
                                                </div>
                                            </div>

                                
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                       
<th>Banner</th>
<th>Business Name</th>
<th>Category</th>
<th>Listed</th>
<th>Status</th>
<th>Promotion</th>
<th>Actions</th>
                                                        </tr>
														
                                                    </thead>
                                                    
                                                    <tbody>

    <?php 
$sql = "SELECT * FROM tblbusiness WHERE tblbusiness.Email=:email";
 $query = $dbh -> prepare($sql);
$query->bindParam(':email',$email, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	
    $shopId=$result->id;
      $promoted=$result->promoted;
   $state=$result->state;
      ?>	
<tr>
 <td><?php echo $cnt;?></td>
                                                            <td><img class="img-fluid" src="img/shopimages/<?php echo htmlentities($result->banner);?>" width="70px" alt="Ad Image"></td>
                                                            <td><a  href="business-ads.php?sid=<?php echo htmlentities($result->Sid)?>" style="color: blue;"><?php echo htmlentities($result->Business);?></a></td>
                                                           
                                                            <td><?php echo htmlentities($result->Category);?></td>
                                                            <td><?php echo htmlentities(date_format(date_create($result->date_opened),"d M Y"));?></td>
                                                            
      
      <?php  if(($state=='Pending')){?>
       <td>
                             <form method="post" action="activate_business.php">
        <input name="id" type="hidden" value="<?php echo htmlentities($result->id);?>">
        <button type="submit" style="border:none; background-color:transparent;"  name="activate"><span style="color:red">Click To Activate </span</button>
      </form></td>
                                <?php }
                                else{ ?>
                                  <td><span style="color:green"><a href="">Active</a></span></td>
                                <?php
                                
                                }?>
     
     	    
                                                                                                
      <?php  if(($promoted=='No')){?>
       <td>
                             <form method="post" action="shop_advert.php">
        <input name="id" type="hidden" value="<?php echo htmlentities($result->id);?>">
        <button type="submit" style="border:none; background-color:transparent;"  name="promote"><span style="color:dodgerblue">Promote</span</button>
      </form></td>
                                <?php }
                                else{ ?>
                                  <td><span style="color:green"><a href="">Promoted</a></span></td>
                                <?php
                                
                                }?>
     
     	    
                                                                                                 <td>
       <form method="post" action="edit-business.php">
        <input name="id" type="hidden" value="<?php echo htmlentities($result->id);?>">
        <button  type="submit" style="border:none; background-color:transparent;"  name="edit"><i class="fa fa-edit"></i></button>
      </form>
      <form method="post">
        <input name="id" type="hidden" value="<?php echo htmlentities($result->id);?>">
        <button type="submit" style="border:none; background-color:transparent;"  name="delete"><i class="fa fa-trash"></i></button>
      </form></td>
</tr>
 <?php
		$cnt=$cnt+1;;
    }   

}	
?> 
           
<?php
if(isset($_REQUEST['delete']))
	{
$delid=$_POST['id'];
$select="select * from tblbusiness where id='$delid'";
$result=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($result);
$imageName=$row['banner'];
$delete="img/shopimages/".$imageName;
if(unlink($delete)){
    $deletesql="delete from tblbusiness where id='$delid'";
    $deleted=mysqli_query($conn,$deletesql);
    if($deleted){
    echo "<script>alert('Business Archived Successfully'); window.location='manage-business.php'</script>"; 
      
    }else{
       $error="error";   
    }
}

}
?>                      </tbody>
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