<style>
@media screen and (max-width: 992px) 
{
#logo{
    height:47px;
    
}}</style>
<div class="top-bar">
<div class="container">
<div class="row">
<div class="col-lg-7 col-md-5 col-xs-12">

<ul class="list-inline">
<li><i class="fas fa-phone-alt" ></i> +254 705 030 613</li>
<li><i class="fas fa-email-alt" ></i>georgemuemah@gmail.com</li>
</ul>

</div>
<div class="col-lg-5 col-md-7 col-xs-12">
<div class="roof-social float-right">
<a class="facebook" href="https://www.facebook.com/search/top/?q=Shopcampus"><i class="lni-facebook-filled"></i></a>
<a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
<a class="instagram" href="#"><i class="lni-instagram-filled"></i></a>
</div>

</div>
</div>
</div>
</div>


<nav class="navbar navbar-expand-lg bg-white fixed-top scrolling-navbar" style="border-radius:0px!important;">
<div class="container" >

<div class="navbar-header" >
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
<span class="lni-menu"></span>
</button>
<a href="" class="navbar-brand"><img src="assets/img/logo.png" id="logo" alt="logo"></a>
</div>
<div class="collapse navbar-collapse" id="main-navbar" >
<ul class="navbar-nav mr-auto w-100 justify-content-center" >
<li class="nav-item dropdown active">
<a class="nav-link dropdown-toggle" href="index.php">
Home
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="all-products.php">
Products
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="business.php">
Businesses
</a>
</li>
 
 

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Categories
</a>
<div class="dropdown-menu">
	<?php $sql = "SELECT * from  tblcategories";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?>  
<a class="dropdown-item" href="ads_per_category.php?cat=<?php echo htmlentities($result->CategoryName);?>"><?php echo htmlentities($result->CategoryName);?></a>
<?php }} ?>

</div>
</li>

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: green;">
<i class="fas fa-user-circle" aria-hidden="true"></i>
<?php 
$email=$_SESSION['login'];
$sql ="SELECT Username FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->Username); }}?>
</a>
<div class="dropdown-menu">
<?php if($_SESSION['login']){?> 
<a class="dropdown-item" href="my/index.php">Dashboard</a>
<a class="dropdown-item" href="logout.php">Log Out</a>
<?php }else{?>
<?php ?>
<a class="dropdown-item" href="login.php">Log In</a>
<a class="dropdown-item" href="register.php">Register</a>
<?php } ?>


</div>
</li>
</ul>

<div class="post-btn">
<?php 

$sql ="SELECT Username FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 }}?>

     <?php if($_SESSION['login']){?> 
<a class="btn btn-common" href="my/post-add.php"> Post Free Ad</a>
<?php }else{?>
  
<?php ?>
  <a class="btn btn-common" href="login.php"> Post Free Ad</a> 
<?php } ?>
</div>
</div>
</div>

<ul class="mobile-menu">


<li>
<a class="active" href="index.php">
Home
</a>
</li>
<li>
<a class="nav-link" href="all-products.php">
Products
</a>
</li>
<li>
<a href="business.php">
businesses
</a>

</li>
<li>
<a href="#">
Categories
</a>
<ul class="dropdown">
<?php $sql = "SELECT * from  tblcategories ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?> 
<li><a href="ads_per_category.php?cat=<?php echo htmlentities($result->CategoryName);?>"><?php echo htmlentities($result->CategoryName);?></a></li>

<?php }} ?>

</ul>
</li>

<li>
<a href="contacts.php">Contact Us</a>
</li>
<li>
<?php 
$email=$_SESSION['login'];
$sql ="SELECT Username FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->Username); }}?>

<?php if($_SESSION['login']){?> 

<a href="includes/logout.php">Logout</a>

<?php }else{
    }
    ?>
    </li>
</nav>

   