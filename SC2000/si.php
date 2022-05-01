<?php 
session_start();
include('../includes/config.php');
include('../includes/connection.php');
error_reporting(0);
?>
<?php
if(isset($_POST['signup']))
{  
$username=md5($_POST['username']);
$password=md5($_POST['password']); 
$email=md5($_POST['email']);
$sql="INSERT INTO admin(UserName,EmailId,Password) VALUES
('$username','$email','$password')";
if($conn->query($sql)===TRUE);
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
}}

?>

<!DOCTYPE html>
<html lang="en">


<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>ShopCampus</title>

<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../assets/fonts/line-icons.css">

<link rel="stylesheet" type="text/css" href="../assets/css/slicknav.css">

<link rel="stylesheet" type="text/css" href="../assets/css/color-switcher.css">

<link rel="stylesheet" type="text/css" href="../assets/css/animate.css">

<link rel="stylesheet" type="text/css" href="../assets/css/owl.carousel.css">

<link rel="stylesheet" type="text/css" href="../assets/css/main.css">

<link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
</head>
<body>
<br />
<section class="login section-padding">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-12 col-xs-12">
<div class="login-form login-area">
<h3>
Login Now
</h3>
<form  action="#" method="post" role="form" class="login-form">
<div class="form-group">
<?php if($error){?><div class="errorWrap" style="text-align: center; color:red"><strong>Error</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" style="color: green;"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                <script>
setTimeout(function(){
window.location.href='index.php';
},3000);
</script><?php 
                }?>
                </div>
<div class="form-group">
<div class="input-icon">
<i class="lni-user"></i>
<input type="text" id="sender-email" class="form-control" name="username" placeholder="Username">
</div>
</div>
<div class="form-group">
<div class="input-icon">
<i class="lni-envelope"></i>
<input type="email" name="email" class="form-control" placeholder="Email">
</div>
</div>
<div class="form-group">
<div class="input-icon">
<i class="lni-lock"></i>
<input type="password" name="password" class="form-control" placeholder="Password">
</div>
</div>
<div class="form-group mb-3">
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="checkedall">
<label class="custom-control-label" for="checkedall">Keep me logged in</label>
</div>
<a class="forgetpassword" href="forgot-password.html">Forgot Password?</a>
</div>
<div class="text-center">
<button type="submit" name="signup"class="btn btn-common log-btn">Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>
</section>





<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>


<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../assets/js/jquery-min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="../assets/js/jquery.counterup.min.js"></script>
<script src="../assets/js/waypoints.min.js"></script>
<script src="../assets/js/wow.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/jquery.slicknav.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/form-validator.min.js"></script>
<script src="../assets/js/contact-form-script.min.js"></script>

</body>


</html>