<style>
.mob-nav {
    position:fixed;
    bottom:0;
    height:70px;
    width:100%;
  
   z-index:10;
    background-color:whitesmoke;
    display:flex;
    display:none;
    overflow-x: auto;
}
.icon-links{
    display:flex;
    flex-grow:1;
    min-width: 54px;
    overflow:hidden;
    white-space:nowrap;
    align-items:center;
    flex-direction:column;
    justify-content:center;
    font-family:sans-seriff;
    font-size:13px;
    color:#444444;
    text-decoration:none;
    -webkit-top-highlight-color:transparent;
    transition:background-color 0.1s ease-in-out;
    background-color:whitesmoke;
}
.icon-links:hover{
    color:dodgerblue;
}
#icons{
    font-size: 20px;
}
@media screen and (max-width: 992px) {
  .mob-nav {
    position:fixed;
    bottom:0;
    height:70px;
    width:100%;
     display:block;
    box-shadow:  0 0 ;
    background-color:#ffffff;
    display:flex;
  
    overflow-x: auto;
}
    }
</style>
<nav class="mob-nav">
<a href="index.php" class="icon-links"><i class="fas fa-home" style="color: #dc3545;" id="icons"></i>
<span class="nav-text" style="color: #dc3545;"><strong>Home</strong></span></a>
<a href="index.php" class="icon-links"><i class="fas fa-store" id="icons"></i>
<span class="nav-text"><strong>Businesses</strong></span></a>
<a href="index.php" class="icon-links"><i class="fas fa-list" id="icons"></i>
<span class="nav-text"><strong>Ads</strong></span></a>
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

	 }}?>

     <?php if($_SESSION['login']){?> 
     <a href="my/post-add.php" class="icon-links"><i class="fas fa-plus-circle" id="icons"></i>
<span class="nav-text"><strong>Post Ad</strong></span></a>
          <a href="my/index.php" class="icon-links"><i class="lni-layers" id="icons"  ></i>
<span class="nav-text"><strong>Dashboard</strong></span></a>
     <?php }else{?>
     
<?php ?>
<a href="login.php" class="icon-links"><i class="fas fa-plus-circle" id="icons"></i>
<span class="nav-text"><strong>Post Ad</strong></span></a>
<a href="login.php" class="icon-links"><i class="fas fa-user" id="icons"></i>
<span class="nav-text"><strong>My Account</strong></span></a>
<?php } ?>

</nav>

