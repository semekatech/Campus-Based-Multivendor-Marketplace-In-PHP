<?php 
include 'functions/authodicate.php';
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
                                    <h2 class="title">Campuses</h2>
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Campuses</li>
            							<li class="active">Manage Campuses</li>
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
                                                    <h5>View Campus Info</h5>
                                            
                                                </div>
                                            </div>

                                
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Campus Name</th>
                                                            <th>County</th>
                                                            <th>Users</th>
                                                            <th>Ads</th>
                                                            <th>Stores</th>
                                                            <th>Action</th>
                                                        </tr>
														
                                                    </thead>
                                                    
                                                    <tbody>
<?php
include('../includes/connection.php');

$sql="SELECT * FROM tbluniversities";
$result=$conn->query($sql);
if($result->num_rows>0){
	$counter = 1;
    
    while($row=$result->fetch_assoc()){
        $uni=$row['uni_name'];
        $uni_id=$row['id'];
       $sql1= "SELECT  count(id) as num FROM tblproducts WHERE institution='$uni_id' AND state='1'";
       $result1=mysqli_query($conn,$sql1);
       $row1=mysqli_fetch_assoc($result1);
       $ads=$row1['num'];
       $sql2= "SELECT  count(id) as num FROM tblusers WHERE University='$uni_id'";
       $result2=mysqli_query($conn,$sql2);
       $row2=mysqli_fetch_assoc($result2);
       $users=$row2['num'];
       
        $sql3= "SELECT  count(id) as num FROM tblshops WHERE institution='$uni_id'";
       $result3=mysqli_query($conn,$sql3);
       $row3=mysqli_fetch_assoc($result3);
       $shops=$row3['num'];
       
		?>
<tr>
 <td><?php echo $counter;?></td>
                                                            <td><?php echo htmlentities($row["uni_name"])?></td>
                                                             <td><?php echo htmlentities($row["county"])?></td>
                                                              <td><?php echo htmlentities($users)?></td>
                                                            <td><?php echo htmlentities($ads)?></td>
                                                            <td><?php echo htmlentities($shops)?></td>
                                                            
                                                                                                               <td>
      <form method="post" action="edit-campus.php">
        <input name="id" type="hidden" value="<?php echo $row['id'];?>">
        <button  type="submit" style="border:none; background-color:transparent;"  name="edit"><i class="fa fa-edit"></i></button>
      </form>
      <form method="post">
        <input name="id" type="hidden" value="<?php echo $row['id'];?>">
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

if(isset($_POST['delete'])){
  $id =$_POST['id'];
  $sql = "DELETE FROM tbluniversities WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) 
  {
    ?>
      <script>
        alert('Success!'); window.location='manage-campuses.php'
      </script>
    <?php
  } 
  else
  {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}?>                                        </tbody>
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


