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
                                    <h2 class="title">Users With Stores</h2>
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Users</li>
            							<li class="active">Manage Users</li>
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
                                                    <h5>View Users Info</h5>
                                                    
                                                </div>
                                            </div>

                                
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                             <th>User Email</th>
                                                             <th>Contacts</th>
                                                            <th>Shop Name</th>
                                                            <th>Location</th>
                                                            <th>Total Ads</th>

                                                        </tr>
														
                                                    </thead>
                                                    
                                                    <tbody>
<?php
include('../includes/connection.php');
include('../includes/config.php');
$sql="SELECT * FROM tblshops";
$result=$conn->query($sql);
if($result->num_rows>0){
	$counter = 1;
    while($row=$result->fetch_assoc()){
        $email=$row["Email"];
       $in=$row["institution"];
       $sid=$row["id"];
 $sql = "SELECT * FROM tbluniversities WHERE id='$in'";
 $res_data = mysqli_query($conn,$sql);
$row3= mysqli_fetch_array($res_data);
$university=$row3["uni_name"];
$pro = "SELECT count(id) as num FROM tblshop_products WHERE ShopId='$sid'";
$pro_res = mysqli_query($conn,$pro);
$row1 = mysqli_fetch_assoc($pro_res);
$pro_count = $row1['num'];
		?>
        
<tr>
 <td><?php echo $counter;?></td>                              <td><?php echo htmlentities($row["Email"])?></td>
 <td><?php echo htmlentities($row["Contacts"])?></td>
                                                            <td style="color:blue"><a href="view-store.php?sid=<?php echo htmlentities($row["id"])?>"><u><?php echo htmlentities($row["ShopName"])?></u></a></td>
                                              <td><?php echo htmlentities($university)?></td>
                                                            <td><?php echo htmlentities($pro_count)?></td>
                                                           

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
  $sql = "DELETE FROM students WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) 
  {
    ?>
      <script>
        alert('Success!'); window.location='manage-students.php'
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


