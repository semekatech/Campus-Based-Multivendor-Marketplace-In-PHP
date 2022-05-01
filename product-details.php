<?php 
session_start();
include('includes/connection.php');
include"includes/time_function.php";
error_reporting(0);
$uni_id=$_SESSION['uni'];
?>
<?php  
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "https://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      
     
  ?>
	<?php 
$id=$_GET['r'];
$sql = "SELECT * FROM tblproducts where tblproducts.pid=:id";
$query = $dbh -> prepare($sql);
$query->bindParam(':id',$id, PDO::PARAM_STR);

$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;
$prid=$result->id;
$email=$result->PostBy; 
$category=$result->ProductCategory;
$name=$result->ProductName;
$price=$result->Price;
$image=$result->Vimage1; 
$inst=$result->institution; 
$_SESSION['uni']=$inst;
}}
?> 
<!DOCTYPE html>
<html lang="en">


<head>
<?php 

include('includes/head.php');

?>
<meta property="og:url"           content="<?php echo $url; ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $name; ?> On Sale At <?php echo $price; ?> Ksh"/>
<meta property="og:description"   content="Shopcampus is an online campus based classified ads listing and multivendor platform.A Marketplace where you can buy or sell secondhand products at a fair price."/>

<meta property="og:image"         content="https://www.shopcampus.co.ke/my/img/productsimages/<?php echo $image;?>"/>

<script data-ad-client="ca-pub-1648262613471118" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body> 
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0" nonce="Oa11mTDd"></script>
<?php include('includes/header2.php');?>
<br />
<br />
	<?php 


$sql = "SELECT * FROM tblproducts where tblproducts.id=:prid";
$query = $dbh -> prepare($sql);
$query->bindParam(':prid',$prid, PDO::PARAM_STR);

$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;

$email=$result->PostBy; 
$category=$result->ProductCategory;
$time=$result->uploaded; 
?>  

<div class="section-padding">
<div class="container">

<div class="product-info row">
<div class="col-lg-8 col-md-12 col-xs-12">
<div >
<div >
<span style="color: black; font-size:25px;"><?php echo htmlentities($result->ProductName);?></span>
                                 <button style="float:right; background:transparent; border:none; font-size:20px;" class="price"><strong>Price  Ksh. <?php echo htmlentities(number_format($result->Price));?></strong></button>
<br /><br /><div class="widget-thumb">

<img class="img-fluid" src="my/img/productsimages/<?php echo htmlentities($result->Vimage1);?>"  alt="" style="margin-bottom: 10px; max-width:200px; height:250px;">

<img class="img-fluid" src="my/img/productsimages/<?php echo htmlentities($result->Vimage2);?>"   style="max-width:200px; height:250px; margin-right: 10px;" alt="">

<img class="img-fluid" src="my/img/productsimages/<?php echo htmlentities($result->Vimage3);?>"   style="max-width:200px; height:250px;" alt="">
</div>
<div class="widget-thumb">

</div>





<div class="item">
<div class="product-img">
</div>

</div>

</div>
</div>
<div class="details-box" style="background: white; margin-top:20px;">
<div class="ads-details-info" >
<span style="color: black; font-size:16px;"><a href="product-details.php?wid=<?php echo htmlentities($result->id);?>" style="color: green;"><i class="fas fa-heart" id="cat" style="color: green;"></i> Favourite</a></span>
                                 <button style="float:right; background:transparent; font-size:16px; border:none; color:red" class="price"><strong><i class="fas fa-sign" id="cat" style="color: red;"></i> Report</strong></button>

<div class="details-meta" >
<span><a href="" style="color: black;">Listed  <span style="color: grey;"><?php echo htmlentities($time = time_stamp($time))?></span></a></span>

</div>
<h4  class="title-small mb-3" style="font-size:18px;">Description</h4>
<p style="color:black;"><?php echo htmlentities($result->ProductOverview);?></p>
<h4 class="title-small mb-3">Specifications</h4>
<ul class="list-specification">
<li style="font-size:16px; color:black;"><i class="lni-check-mark-circle"></i> <?php echo htmlentities($result->feature1);?></li>
<li style="font-size:16px; color:black;"><i class="lni-check-mark-circle"></i> <?php echo htmlentities($result->feature2);?></li>
<li style="font-size:16px; color:black;"><i class="lni-check-mark-circle"></i> <?php echo htmlentities($result->feature3);?></li>
</ul>

</div>
<div class="tag-bottom">
<span style="color:black;"><strong>Share:</strong></span>
<div class="float-right">
<div class="share">
<div class="social-link">
    <div style="margin:20px;" class="fb-share-button" data-href="<?php echo $url; ?>" data-layout="button_count" data-size="small"><a style="margin:20px; width:80px; background:blue" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fshopcampus.co.ke%2Fproduct-details.php%3Fpid%3D<?php echo $id; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"> <i class="fab fa-facebook" style="color: white;"></i>Facebook</a>
<a style="margin:20px; width:80px; background:green" alt="Whatsapp" href="whatsapp://send" data-text="" data-href="<?php echo $url; ?>" class="whatsapp wa_btn"><span class="ion-social-whatsapp"></span>  <i class="fab fa-whatsapp" style="color: white; background:green;"></i> whatsapp</a></div>

</div>
</div>
</div>
</div>
<h5 style="color: black;" ><strong>Disclaimer</strong></h5>
<p style="font-size:16px; color:black;">This Ad and its associated information are provided and managed by the Ad owner.ShopCampus and its partners shall not be liable for any loss,fraud or
inaccuracy of the information provided here,Please Not that classified ads products should not be paid for before delivery and for security purpose
always meet in an open and safe place.</p>
</div>
</div>
<div class="col-lg-4 col-md-6 col-xs-12">

<aside class="details-sidebar" >
<div class="widget" style="background: white;">
<h4 class="widget-title">About Seller</h4>
<div class="agent-inner">
<div class="agent-title">
<div class="agent-photo">
<a href="#"><img src="user.png" alt="User Image"></a>
</div>
<?php 

$e=$email;
$sql22="SELECT * FROM tblusers WHERE EmailId='$e' ";
$result2=mysqli_query($conn,$sql22);
$row = mysqli_fetch_array($result2);

$temp_doj=$row['RegDate'];
$temp_user=$row['FullName'];
$temp_contacts=$row['ContactNo'];
?>
<?php 


$ads= "SELECT count(id) as num FROM tblproducts WHERE PostBy='$e'";
$ads_res = mysqli_query($conn,$ads);
$row = mysqli_fetch_assoc($ads_res);
$ads_count = $row['num'];

?>
<div class="agent-details">
<h3><a href="#"><?php echo $temp_user;?></a></h3>
<span style="font-size:18px; color:black">Member Since: <?php echo date_format(date_create($temp_doj), " d M Y")  ;?></span><br/>
<span style="font-size:18px; color:black">Total Ads: <?php echo $ads_count ;?></span><br />
<span></span>
</div>
</div>
<h6 style="color:black">Connect With Seller</h6>
<hr />
<a href="https://wa.me/+254<?php echo htmlentities($result->Contacts);?>/?text=Hello am interested in This Product,Is it still available? <?php  echo $url; ?> " style="color: white; text-decoration:none"><button class="btn btn-common fullwidth mt-4"><i class="fab fa-whatsapp" style="color: white;"></i> Whatsapp</button></a>

<a href="sms://<?php echo htmlentities($result->Contacts);?>?body=Hello I Am Interested In Your <?php echo htmlentities($result->ProductName);?> Listed In ShopCampus Marketplace." style="color: white; text-decoration:none;"><button class="btn btn-common fullwidth mt-4"><i class="fas fa-envelope" style="color: white;"></i> Sms Chat</button></a>
<a href="tel://<?php echo htmlentities($result->Contacts);?>"><button class="btn btn-common fullwidth mt-4"><i class="fas fa-phone-alt" style="color: white;"></i> Phone Call</button></a>
</div>
</div>

<div class="widget" style="background: white;">
<h4 class="widget-title">You May Also Like..</h4>
<ul class="posts-list">
<?php
$cat=$category;
$sql="SELECT * FROM tblproducts WHERE ProductCategory='$cat' ";
$result=$conn->query($sql);
if($result->num_rows>0){
	$counter = 1;
    while($row=$result->fetch_assoc()){
		?>
<li>
<div class="widget-thumb">
<a href="product-details.php?q=<?php echo htmlentities($row["id"])?>"><img src="my/img/productsimages/<?php echo htmlentities($row["Vimage1"])?>" alt="" /></a>
</div>
<div class="widget-content">
<h4><a href="product-details.php?q=<?php echo htmlentities($row["id"])?>"><?php echo htmlentities($row["ProductName"])?></a></h4>
 <div class="meta-tag">


</div>
<h4 class="price">Ksh <?php echo htmlentities($row["Price"])?></h4>
</div>
<div class="clearfix"></div>
</li>
<?php }} ?>



</div>
</aside>

</div>
</div>

</div>
</div>
<?php }} ?>




<?php include('includes/footer.php');?>
<?php include('includes/mobile-bar.php');?>
<a href="#" class="back-to-top">
<i class="lni-chevron-up"></i>
</a>
<script>
    waShBtn = function() {
  if( this.isIos === true ) {
    var b = [].slice.call( document.querySelectorAll(".wa_btn") );
    for (var i = 0; i < b.length; i++) {
      var t = b[i].getAttribute("data-text");
      var u = b[i].getAttribute("data-href");
      var o = b[i].getAttribute("href");
      var at = "?text=" + encodeURIComponent( t );
      if (t) {
          at += "%20%0A";
      }
      if (u) {
          at += encodeURIComponent( u );
      } else {
          at += encodeURIComponent( document.URL );
      }
      b[i].setAttribute("href", o + at);
      b[i].setAttribute("target", "_top");
      b[i].setAttribute("target", "_top");
      b[i].className += ' activeWhatsapp';
    }
  }
}

waShBtn.prototype.isIos = ((navigator.userAgent.match(/Android|iPhone/i) && !navigator.userAgent.match(/iPod|iPad/i)) ? true : false);

var theWaShBtn = new waShBtn();
</script>

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