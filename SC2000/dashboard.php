<?php 
include 'functions/authodicate.php';
?>
<?php
include('../includes/connection.php');
$users = "SELECT count(id) as num FROM tblusers";
$users_res = mysqli_query($conn,$users);
$row = mysqli_fetch_assoc($users_res);
$users_count = $row['num'];

$business = "SELECT count(id) as num FROM tblbusiness";
$business_res = mysqli_query($conn,$business);
$row = mysqli_fetch_assoc($business_res);
$business_count = $row['num'];

$f_business = "SELECT count(id) as num FROM tblshops WHERE promoted='Yes'";
$f_business_res = mysqli_query($conn,$f_business);
$row = mysqli_fetch_assoc($f_business_res);
$f_business_count = $row['num'];


$ads= "SELECT count(id) as num FROM tblproducts";
$ads_res = mysqli_query($conn,$ads);
$row = mysqli_fetch_assoc($ads_res);
$ads_count = $row['num'];

$fads= "SELECT count(id) as num FROM tblproducts WHERE promoted='Yes'";
$fads_res = mysqli_query($conn,$fads);
$row = mysqli_fetch_assoc($fads_res);
$fads_count = $row['num'];

$packages = "SELECT count(id) as num FROM tblpackages WHERE package_name !='Free Package'";
$packages_res = mysqli_query($conn,$packages);
$row = mysqli_fetch_assoc($packages_res);
$packages_count = $row['num'];

$sp = "SELECT count(id) as num FROM tblbusiness_products";
$sp_res = mysqli_query($conn,$sp);
$row = mysqli_fetch_assoc($sp_res);
$sp_count = $row['num'];

$categories = "SELECT count(id) as num FROM tblcategories";
$categories_res = mysqli_query($conn,$categories);
$row = mysqli_fetch_assoc($categories_res);
$categories_count = $row['num'];


$favourites = "SELECT count(id) as num FROM tblwishlists";
$favourites_res = mysqli_query($conn,$favourites);
$row = mysqli_fetch_assoc($favourites_res);
$favourites_count = $row['num'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=yes">
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
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-sm-6">
                                    <h2 class="title">Dashboard</h2>
                                 
                                </div>
                                <!-- /.col-sm-6 -->
                            </div>
                            <!-- /.row -->
                      
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="manage-users.php">


                                            <span class="number counter"><?php echo $users_count; ?></span>
                                            <span class="name">USERS</span>
                                            <span class="bg-icon"><i class="fas fa-user"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="manage-stores.php">

                                            <span class="number counter"><?php echo $business_count; ?></span>
                                            <span class="name">BUSINESSES</span>
                                            <span class="bg-icon"><i class="fas fa-list"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning" href="manage-ads.php">
                                        
                                            <span class="number counter"><?php echo $ads_count; ?></span>
                                            <span class="name">TOTAL ADS</span>
                                            <span class="bg-icon"><i class="fas fa-list"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="manage-featured-stores.php">
                                       

                                            <span class="number counter"><?php echo $f_business_count; ?></span>
                                            <span class="name">FEATURED BUSINESSES</span>
                                            <span class="bg-icon"><i class="fas fa-money"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

  <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" href="manage-featured-ads.php">


                                            <span class="number counter"><?php echo $fads_count; ?></span>
                                            <span class="name">FEATURED ADS</span>
                                            <span class="bg-icon"><i class="fas fa-money"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                            <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning" href="manage-categories.php">
                                        
                                            <span class="number counter"><?php echo $categories_count; ?></span>
                                            <span class="name">CATEGORIES</span>
                                            <span class="bg-icon"><i class="fas fa-money"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

 <!-- /.section -->

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
