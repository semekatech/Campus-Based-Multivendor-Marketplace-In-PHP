<?php
session_start();

$email=$_SESSION['login'];
include('../includes/connection.php');
include"../includes/time_function.php";
if(strlen($_SESSION['login'])==0)
	{	
header('location:../index.php');
}
else{
	?>

<?php 
$sql ="SELECT id from tblshops WHERE Email='$email' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$shops=$query->rowCount();
?>
	<?php 
$sql1 ="SELECT id from tblproducts WHERE PostBy='$email'";
$query1 = $dbh -> prepare($sql1);;
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$products=$query1->rowCount();


$f_stores = "SELECT count(id) as num FROM tblshops WHERE Email='$email' AND promoted='Yes'";
$f_stores_res = mysqli_query($conn,$f_stores);
$row = mysqli_fetch_assoc($f_stores_res);
$f_stores_count = $row['num'];
?>

<?php 
$f_ads ="SELECT id from tblproducts WHERE PostBy='$email'";
$f_ads_s = $dbh -> prepare($f_ads);;
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$f_ads_count=$query->rowCount();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ShopCampus | Dashboard</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="../assets/fontawesome-icons/css/all.css">
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
    
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
              <?php include('includes/topbar.php');?>
            <div class="content-wrapper">
                <div class="content-container">

                    <?php include('includes/leftbar.php');?>  

                    <div class="main-page">
              
                        <!-- /.container-fluid -->


                        <section class="section">
                        
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="manage-ads.php">


                                            <span class="number counter"><?php echo htmlentities($products);?></span>
                                            <span class="name">MY ADS</span>
                                            <span class="bg-icon"><i class="fas fa-user"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="manage-stores.php">

                                            <span class="number counter"><?php echo htmlentities($shops);?></span>
                                            <span class="name">MY STORES</span>
                                            <span class="bg-icon"><i class="fas fa-pray"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                            
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="#">
                                       

                                            <span class="number counter"><?php echo htmlentities($f_stores_count);?></span>
                                            <span class="name">FEATURED STORES</span>
                                            <span class="bg-icon"><i class="fas fa-crown"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="#">
                                       

                                            <span class="number counter"><?php echo htmlentities($f_ads_count);?></span>
                                            <span class="name">FEATURED ADS</span>
                                            <span class="bg-icon"><i class="fas fa-crown"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
  <!-- <section class="section" style="margin-top: -40px;">
                        
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                        <h3 >Current Balance</h3>
                                        <p style="color: dodgerblue;"><strong>KSH 300.00</strong></p>
                                    </div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                        <h3 ><i class="fas fa-wallet"></i> Wallet Topup</h3>
                                        <p style="color: dodgerblue;"><strong><a href="wallet-top-up.php"><i class="fas fa-plus"></i> Add Funds</strong></a></p>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                        <h3 ><i class="fas fa-bullhorn"></i> Campaigns</h3>
                                        <p style="color: dodgerblue;"><strong>Active Campaigns</strong></p>
                                    </div>

                                </div>
                           
                            </div>
                          
                        </section>-->
                
  <section class="section">
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
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/waypoint/waypoints.min.js"></script>
        <script src="js/counterUp/jquery.counterup.min.js"></script>
        <script src="js/amcharts/amcharts.js"></script>
        <script src="js/amcharts/serial.js"></script>
        <script src="js/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="js/amcharts/themes/light.js"></script>
        <script src="js/toastr/toastr.min.js"></script>
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script src="js/production-chart.js"></script>
        <script src="js/traffic-chart.js"></script>
        <script src="js/task-list.js"></script>
        <script>
            $(function(){

                // Counter for dashboard stats
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });

                // Welcome notification
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                toastr["success"]( "Welcome Admin!");

            });
        </script>
    </body>
</html>
<?php } ?>