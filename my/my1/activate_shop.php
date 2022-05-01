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
if(isset($_POST['activate']))
	{
$pid=$_POST['id'];
$select="select * from tblshops where id='$pid'";
$result=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($result);
$name=$row['ShopName'];
}
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
        <style>
            



/*//////////////////////////////////////////////////////////////////
[ FONT ]*/

@font-face {
  font-family: Poppins-Regular;
  src: url('../fonts/poppins/Poppins-Regular.ttf'); 
}

@font-face {
  font-family: Poppins-Medium;
  src: url('../fonts/poppins/Poppins-Medium.ttf'); 
}

@font-face {
  font-family: Poppins-Bold;
  src: url('../fonts/poppins/Poppins-Bold.ttf'); 
}




/*//////////////////////////////////////////////////////////////////
[ RESTYLE TAG ]*/

* {
	margin: 0px; 
	padding: 0px; 
	box-sizing: border-box;
}

body, html {
	height: 100%;
	font-family: Poppins-Regular, sans-serif;
}

/*---------------------------------------------*/
a {
	font-family: Poppins-Regular;
	font-size: 14px;
	line-height: 1.7;
	color: #666666;
	margin: 0px;
	transition: all 0.4s;
	-webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
}

a:focus {
	outline: none !important;
}

a:hover {
	text-decoration: none;
	color: #57b846;
}

/*---------------------------------------------*/
h1,h2,h3,h4,h5,h6 {
	margin: 0px;
}

p {
	font-family: Poppins-Regular;
	font-size: 14px;
	line-height: 1.7;
	color: #666666;
	margin: 0px;
}

ul, li {
	margin: 0px;
	list-style-type: none;
}


/*---------------------------------------------*/
input {
	outline: none;
	border: none;
}

textarea {
  outline: none;
  border: none;
}

textarea:focus, input:focus {
  border-color: transparent !important;
}

input:focus::-webkit-input-placeholder { color:transparent; }
input:focus:-moz-placeholder { color:transparent; }
input:focus::-moz-placeholder { color:transparent; }
input:focus:-ms-input-placeholder { color:transparent; }

textarea:focus::-webkit-input-placeholder { color:transparent; }
textarea:focus:-moz-placeholder { color:transparent; }
textarea:focus::-moz-placeholder { color:transparent; }
textarea:focus:-ms-input-placeholder { color:transparent; }

input::-webkit-input-placeholder { color: #999999; }
input:-moz-placeholder { color: #999999; }
input::-moz-placeholder { color: #999999; }
input:-ms-input-placeholder { color: #999999; }

textarea::-webkit-input-placeholder { color: #999999; }
textarea:-moz-placeholder { color: #999999; }
textarea::-moz-placeholder { color: #999999; }
textarea:-ms-input-placeholder { color: #999999; }

/*---------------------------------------------*/
button {
	outline: none !important;
	border: none;
	background: transparent;
}

button:hover {
	cursor: pointer;
}

iframe {
	border: none !important;
}





/*//////////////////////////////////////////////////////////////////
[ Contact 2 ]*/
.bg-contact2 {
  width: 100%;  
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
}

.container-contact2 {
  width: 100%;  
  min-height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 15px;
  background: rgba(219,21,99,0.8);
  background: -webkit-linear-gradient(45deg, rgba(213,0,125,0.8), rgba(229,57,53,0.8));
  background: -o-linear-gradient(45deg, rgba(213,0,125,0.8), rgba(229,57,53,0.8));
  background: -moz-linear-gradient(45deg, rgba(213,0,125,0.8), rgba(229,57,53,0.8));
  background: linear-gradient(45deg, rgba(213,0,125,0.8), rgba(229,57,53,0.8));
}

.wrap-contact2 {
  width: 790px;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  padding: 72px 55px 90px 55px;
}


/*------------------------------------------------------------------
[  ]*/

.contact2-form {
  width: 100%;
}

.contact2-form-title {
  display: block;
  font-family: Poppins-Bold;
  font-size: 39px;
  color: #333333;
  line-height: 1.2;
  text-align: center;
  padding-bottom: 90px;
}



/*------------------------------------------------------------------
[  ]*/

.wrap-input2 {
  width: 100%;
  position: relative;
  border-bottom: 2px solid #adadad;
  margin-bottom: 37px;
}

.input2 {
  display: block;
  width: 100%;

  font-family: Poppins-Regular;
  font-size: 15px;
  color: #555555;
  line-height: 1.2;
}

.focus-input2 {
  position: absolute;
  display: block;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  pointer-events: none;
}

.focus-input2::before {
  content: "";
  display: block;
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 2px;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;

  background: rgba(219,21,99,1);
  background: -webkit-linear-gradient(45deg, #d5007d, #e53935);
  background: -o-linear-gradient(45deg, #d5007d, #e53935);
  background: -moz-linear-gradient(45deg, #d5007d, #e53935);
  background: linear-gradient(45deg, #d5007d, #e53935);
}

.focus-input2::after {
  content: attr(data-placeholder);
  display: block;
  width: 100%;
  position: absolute;
  top: 0px;
  left: 0;

  font-family: Poppins-Regular;
  font-size: 13px;
  color: #999999;
  line-height: 1.2;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

/*---------------------------------------------*/
input.input2 {
  height: 45px;
}

input.input2 + .focus-input2::after {
  top: 16px;
  left: 0;
}

textarea.input2 {
  min-height: 115px;
  padding-top: 13px;
  padding-bottom: 13px;
}

textarea.input2 + .focus-input2::after {
  top: 16px;
  left: 0;
}

.input2:focus + .focus-input2::after {
  top: -13px;
}

.input2:focus + .focus-input2::before {
  width: 100%;
}

.has-val.input2 + .focus-input2::after {
  top: -13px;
}

.has-val.input2 + .focus-input2::before {
  width: 100%;
}

/*------------------------------------------------------------------
[ Button ]*/
.container-contact2-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding-top: 13px;
}

.wrap-contact2-form-btn {
  display: block;
  position: relative;
  z-index: 1;
  border-radius: 2px;
  width: auto;
  overflow: hidden;
  margin: 0 auto;
}

.contact2-form-bgbtn {
  position: absolute;
  z-index: -1;
  width: 300%;
  height: 100%;
  background: rgba(219,21,99,1);
  background: -webkit-linear-gradient(-135deg, #d5007d, #e53935, #d5007d, #e53935);
  background: -o-linear-gradient(-135deg, #d5007d, #e53935, #d5007d, #e53935);
  background: -moz-linear-gradient(-135deg, #d5007d, #e53935, #d5007d, #e53935);
  background: linear-gradient(-135deg, #d5007d, #e53935, #d5007d, #e53935);
  top: 0;
  left: -100%;

  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
  transition: all 0.4s;
}

.contact2-form-btn {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  min-width: 244px;
  height: 50px;

 

  font-family: Poppins-Medium;
  font-size: 16px;
  color: #fff;
  line-height: 1.2;
  

}

.wrap-contact2-form-btn:hover .contact2-form-bgbtn {
  left: 0;
}

/*------------------------------------------------------------------
[ Responsive ]*/

@media (max-width: 576px) {
  .wrap-contact2 {
    padding: 72px 15px 90px 15px;
  }
}



/*------------------------------------------------------------------
[ Alert validate ]*/

.validate-input {
  position: relative;
}

.alert-validate::before {
  content: attr(data-validate);
  position: absolute;
  max-width: 70%;
  background-color: white;
  border: 1px solid #c80000;
  border-radius: 2px;
  padding: 4px 25px 4px 10px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 0px;
  pointer-events: none;

  font-family: Poppins-Regular;
  color: #c80000;
  font-size: 13px;
  line-height: 1.4;
  text-align: left;

  visibility: hidden;
  opacity: 0;

  -webkit-transition: opacity 0.4s;
  -o-transition: opacity 0.4s;
  -moz-transition: opacity 0.4s;
  transition: opacity 0.4s;
}

.alert-validate::after {
  content: "\f12a";
  font-family: FontAwesome;
  display: block;
  position: absolute;
  color: #c80000;
  font-size: 16px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  transform: translateY(-50%);
  right: 8px;
}

.alert-validate:hover:before {
  visibility: visible;
  opacity: 1;
}

@media (max-width: 992px) {
  .alert-validate::before {
    visibility: visible;
    opacity: 1;
  }
}
        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
              <?php include('includes/topbar.php');?>
            <div class="content-wrapper">
                <div class="content-container">

                    <?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                    
               
   	<div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact2">
			<div class="wrap-contact2">
				<form class="contact2-form validate-form" action="" method="post">
					<span class="contact2-form-title">
					Store Activation
					</span>
					<h5>Store Name: <?php echo $name; ?></h5>
				
<p>Please,Follow the below steps to activate your store.We will be pleased to see you back.</p>
<ul>
    <li>- Go to Mpesa Menu</li>
     <li>- Choose Lipa Na Mpesa</li>
     <li>- Enter <b>5843867</b> As Business Number</li>
    <li>- Enter 100 Ksh as Amount</li>
    <li>- After Payment Enter The transaction code e.g <b>PXLO3SS</b> below and also forward the payment message to <b>07113667917</b></li>
    <li>- After the payment is verified,Your store will run as normal.</li>
   
</ul>
					<div class="wrap-input2 validate-input" data-validate="Amount is required">
						<input class="input2" name="code">
						<span class="focus-input2" data-placeholder="TRANSACTION CODE"></span>
					</div>
					
						<input  name="id" type="hidden" value="<?php echo $pid; ?>">
					<div class="wrap-input2 validate-input" data-validate = "Valid phone number is required: 07XXXXXXXX">
						<input class="input2" type="tel" name="phone">
						<span class="focus-input2" data-placeholder="PHONE NUMBER USED IN PAYMENT"></span>
					</div>

					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn" type="submit" name="add">
								Activate
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
 <?php
if(isset($_POST['add']))
	{
$pid=$_POST['id'];
$by=$email;
$phone=$_POST['phone'];
$code=$_POST['code'];
$status='Pending';
$sql ="SELECT code FROM activate_shop WHERE code=:code";
$query= $dbh -> prepare($sql);
$query-> bindParam(':code', $code, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() >0)
{
echo "<script>alert('Transaction Code Already Used'); window.location='manage-stores.php'</script>";
} else{
$sql="INSERT INTO activate_shop(code,phone,shop_id,user,status) 
VALUES(:code,:phone,:pid,:by,:status)";
$query = $dbh->prepare($sql);

$query->bindParam(':code',$code,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':by',$by,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Submitted For Verification.'); window.location='manage-stores.php'</script>";
}
else 
{
    echo "<script>alert('Something went wrong. Please try again.'); window.location='manage-ads.php'</script>";
}

}}


	?>
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
    
    </body>
</html>
<?php } ?>