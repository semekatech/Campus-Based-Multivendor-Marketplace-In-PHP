
<?php
session_start();
error_reporting(0);
include('includes/config.php');
$username=$_POST['username'];
$password=$_POST['password'];
$sql="SELECT * FROM admin_login WHERE  admin_username='$username' and admin_password='$password'";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$count=mysqli_num_rows($result);
	if($count>0)
	{
	   session_start();
	   $_SESSION['username']=$_POST['username'];
echo "<script>alert('Welcome To Our Site!'); window.location='dashboard.php'</script>";
	}elseif ($count==0){
	   
echo "<script>alert('Incorrect Password or username,Try Again!'); window.location='index.php'</script>";
	}
$conn->close();
?>