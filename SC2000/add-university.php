<?php 
include 'functions/authodicate.php';
include('../includes/connection.php');
?>

 <?php
error_reporting(0);
if(isset($_POST['submit'])){     
$university=$_POST['university'];
$county=$_POST['county'];
$r=bin2hex(random_bytes(5));
$sql="INSERT INTO tbluniversities(rid,uni_name,county)
Values('$r','$university','$county')";
if($conn->query($sql)===TRUE);
{
$msg="Campus Added Successfully";
}}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopcampus</title>
       <link rel="stylesheet" href="fontawesome-icons/css/all.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >

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
                                    <h2 class="title">Packages Registration</h2>
                                
                                </div>
                                 
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Packages Registration</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                 
                                                </div>
                                            </div>
                                            <h4 style="color: green; text-align:center"><?php echo "$msg";?></h4>
                                            
                                                <form class="form-horizontal" method="post" action="">

<div class="form-group">
<label for="default" class="col-sm-2 control-label">University Name</label>
<div class="col-sm-10">
<input type="text" name="university" class="form-control" id="name" required="required" autocomplete="off">
</div>
</div>

                                 <div class="form-group">
                                                        <label for="default" class="col-sm-2 control-label">County</label>
                                                        <div class="col-sm-10">
 <select name="county" class="form-control" id="default" required="required">
<option value="">Select County</option>
<option value="Mombasa">Mombasa</option>
<option value="Kwale">Kwale</option>
<option value="Kilifi">Kilifi</option>
<option value="Tana River">Tana River</option>
<option value="Lamu">Lamu</option>
<option value="Taita Taveta">Taita Taveta</option>
<option value="Garissa">Garissa</option>
<option value="Wajir">Wajir</option>
<option value="Mandera">Mandera</option>
<option value="Marsabit">Marsabit</option>
<option value="Isiolo">Isiolo</option>
<option value="Meru">Meru</option>
<option value="Tharaka Nithi">Tharaka Nithi</option>
<option value="Embu">Embu</option>
<option value="Kitui">Kitui</option>
<option value="Makueni">Makueni</option>
<option value="Machakos">Machakos</option>
<option value="Nyandarua">Nyandarua</option>
<option value="Nyeri">Nyeri</option>
<option value="Kirinyaga">Kirinyaga</option>
<option value="Muranga">Murang'a</option>
<option value="Kiambu">Kiambu</option>
<option value="Turkana">Turkana</option>
<option value="West Pokot">West Pokot</option>
<option value="Samburu">Samburu</option>
<option value="Trans Nzoia">Trans Nzoia</option>
<option value="Uasin Gishu">Uasin Gishu</option>
<option value="Elgeyo Marakwet">Elgeyo Marakwet</option>
<option value="Nandi">Nandi</option>
<option value="Baringo">Baringo</option>
<option value="Laikipia">Laikipia</option>
<option value="Nakuru">Nakuru</option>
<option value="Narok">Narok</option>
<option value="Kajiado">Kajiado</option>
<option value="Kericho">Kericho</option>
<option value="Bomet">Bomet</option>
<option value="Kakamega">Kakamega</option>
<option value="Vihiga">Vihiga</option>
<option value="Bungoma">Bungoma</option>
<option value="Busia">Busia</option>
<option value="Siaya">Siaya</option>
<option value="Kisumu">Kisumu</option>
<option value="Migori">Homabay</option>
<option value="">Migori</option>
<option value="Kisii">Kisii</option>
<option value="Nyamira">Nyamira</option>
<option value="Nairobi">Nairobi</option>
 </select>
                                                        </div>
                                                    </div>
                                        <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
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
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
       
        <script src="js/iscroll/iscroll.js"></script>
    
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>

