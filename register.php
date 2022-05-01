<?php 
session_start();
error_reporting(0);
include('includes/connection.php');
$email=$_SESSION['login'];
?>
<?php
$uni_id=$_SESSION['uni'];
if(isset($_POST['signup']))
{  
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$username=$_POST['username'];
$university=$_POST['university'];
$password=md5($_POST['password']); 
$confpassword=md5($_POST['password2']); 
$uid=bin2hex(random_bytes(5));
$sql="SELECT * FROM tblusers WHERE EmailId='$email' and Username='$username'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result); 
$count=mysqli_num_rows($result);
if($count>0)
	{  
   echo "<script>alert('E-mail already taken!'); window.location='register.php'</script>";
	}
	elseif($password != $confpassword){
echo "<script>alert('Password do not match!'); window.location='register.php'</script>";
	}else
		{ 
$sql="INSERT INTO tblusers(uid,FullName,UserName,EmailId,Password,Password2,ContactNo,University) VALUES
('$uid','$fname','$username','$email','$password','$confpassword','$mobile','$university')";

if($conn->query($sql)===TRUE);
{
$msg="You Have Successfully Registered";
}
}}

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

<?php include('includes/header.php');
$uni_id=$_SESSION['university'];?>
<br /><br />
</header>


<section class="register section-padding">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-12 col-xs-12">
<div class="register-form login-area">
<h3>
Register
</h3>
<?php if($error){?><div class="errorWrap" style="text-align: center; color:red"><strong>Error</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" style="color: green;"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div>
                <script>
setTimeout(function(){
window.location.href='login.php';
},3000);
</script><?php 
                }?>
<form action=""  class="login-form" method="post">
<div class="form-group">
<div class="input-icon">
<i class="lni-user"></i>
<input type="text" id="Name" class="form-control" name="fullname" placeholder="Enter Fullnames" pattern="^(\w\w\w+)\s(\w\w\w+)$">
</div>
</div>
<div class="form-group">
<div class="input-icon">
<i class="lni-users"></i>
<input type="text" class="form-control" name="username" placeholder="Enter Username" pattern="^(\w\w\w+)$">
</div>
</div>
<div class="form-group">
<div class="input-icon">
<i class="lni-phone"></i>
<input type="text"  class="form-control" name="mobileno" placeholder="Enter Mobile Number" pattern="^\d{10}$">
</div>
</div>
<div class="form-group">
<div class="input-icon">
<i class="lni-envelope"></i>
<input type="email"  name="emailid" class="form-control" placeholder="Enter Email Id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
</div>
</div>
<div class="form-group">
<div class="input-icon">

<div class="select">
<select name="university" class="form-control" style="width: 100%; height:40px; ">

<option value="none">Select University</option>
<?php $sql = "SELECT * from  tbluniversities ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?> 

<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->uni_name);?></option>

<?php }} ?>


</select>
</div></div>
</div>
<div class="form-group">
<div class="input-icon">
<i class="lni-lock"></i>
<input type="password" name="password" class="form-control" placeholder="Enter Password">
</div>
</div>
<div class="form-group">
<div class="input-icon">
<i class="lni-lock"></i>
<input type="password" name="password2" class="form-control" placeholder="Confirm Password">
</div>
</div>

<div class="form-group mb-3">

</div>
<div class="text-center">
<button class="btn btn-common log-btn" type="submit" name="signup" >Register</button>
</div>
</form>
</div>
</div>
</div>
</div>
</section>


<footer>


<?php include('includes/footer.php');?>

<?php include('includes/mobile-bar.php');?>

</footer>


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