<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
?>
<?php
$uni_id=$_SESSION['uni'];

if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=md5($_POST['password']);
$sql="SELECT * FROM tblusers WHERE Username='$username' and Password='$password'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$count=mysqli_num_rows($result);
	if($count>0)
	{
$_SESSION['uni']=$_POST['University'];
$_SESSION['login']=$row['EmailId'];
$_SESSION['fname']=$row['FullName'];

$msg="Login Successful!";

} elseif ($count==0){
  
  $error="Incorrect Details Try Again!";

}

}

?>

<!DOCTYPE html>
<html lang="en">


<head>

<?php 

include('includes/head.php');

?>
</head>
<body style="background:white;">

<header id="header-wrap">

<?php include('includes/header.php');?>

</header>



<br /><br />

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
				else if($msg){?><div class="succWrap" style="color: green; font-size: 18px; text-align:center;"><i class="far fa-check-circle"></i> <?php echo htmlentities($msg); ?> </div>
                <script>
setTimeout(function(){
window.location.href='marketplace.php';
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
<i class="lni-lock"></i>
<input type="password" name="password" class="form-control" 
placeholder="Password">
</div>
</div>
<div class="form-group mb-3">
<div style="float:left;"  >
<span ><a class="forgetpassword" href="register.php" style="color:red;"><strong>Create Account</strong></a></span>
</div>
<a class="forgetpassword" href="includes/forgot-password.php">Forgot Password?</a>
</div>
<br/>
<div class="text-center">
<button type="submit" name="login"class="btn btn-common log-btn">Submit</button>
</div>
</form>
</div>
</div>
</div>
</div>
</section>


<?php include('includes/footer.php');?>
<?php include('includes/mobile-bar.php');?>

<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>

<div id="preloader">
<div class="loader" id="loader-1"></div>
</div>


<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/form-validator.min.js"></script>
<script src="assets/js/contact-form-script.min.js"></script>
<script src="assets/js/summernote.js"></script>
</body>


</html>