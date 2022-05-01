<?php 
session_start();
include('includes/connection.php');
error_reporting(0);

?>
                <?php 

$id=$_GET['q'];

$sql="SELECT * FROM tblbusiness WHERE Sid='$id' ";
$result2=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result2);
$institution=$row['institution'];
$business=$row['Business'];
$sd=$row['id'];
$location=$row['location'];
$about=$row['Overview'];
$image=$row['banner'];
$dop=$row['date_opened'];
$cat=$row['Category'];
$link=$row['link'];
$services=$row['services'];
$temp_contacts=$row['Contacts'];
$email=$row['Email'];
?>
<?php 
$e=$email;
$sql22="SELECT * FROM tblusers WHERE EmailId='$e' ";
$result2=mysqli_query($conn,$sql22);
$row = mysqli_fetch_array($result2);
$temp_user=$row['FullName'];
?>
<?php 
      $sql3="SELECT * FROM tbluniversities WHERE id='$institution' ";
$result3=mysqli_query($conn,$sql3);
$row3= mysqli_fetch_array($result3);

$uni=$row3['uni_name']; ?>
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

<!DOCTYPE html>
<html lang="en">


<head>
<?php 

include('includes/head.php');

?>

<meta property="og:url"           content="<?php echo $url; ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $business; ?>"/>
<meta property="og:description"   content="<?php echo $about; ?>"/>
<meta property="og:image"         content="https://www.shopcampus.co.ke/my/img/shopimages/<?php echo $image;?>"/>

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

<!--Header--> 
<?php include('includes/header.php');?>




<div class="section-padding">
<div class="container">

<div class="product-info row">
<div class="col-lg-8 col-md-12 col-xs-12">
<div class="ads-details-wrapper">
<div id="owl-demo" class="owl-carousel owl-theme">

</div>
</div>
<div class="details-box">
<div class="ads-details-info">
<h3><?php echo $business;?></h3>
<div class="details-meta">
<span>Location: <a href="#"> <?php echo $location;?>, Kenya</a>
</span>
</div>
<h2>About</h2>
<p class="mb-4"><?php echo $about;?></p>
<h4 class="title-small mb-3">Services /Products</h4>
<p class="mb-4">We offer the following services/products</p>
<ul class="list-specification">

<?php 
              $string=$services;
              $str_arr=explode("," ,$string);
              foreach($str_arr as $service)
              { ?>
              <li><i class="lni-check-mark-circle"></i> <?php echo  $service;?></li>
              
             <?php
              }
              ?>
</ul>

</div>
<div class="tag-bottom">
<p>Share: </p>
<div class="float-left">
</div>
<div class="float-left">
<div class="share">
<div class="social-link">
<div  class="fb-share-button" data-href="<?php echo $url; ?>" data-layout="button_count" data-size="small"><a style=" width:40px; background:blue" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fshopcampus.co.ke%2Fbusiness-details.php%3Fsid%3D<?php echo $id; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"> <i class="fab fa-facebook" style="color: white;"></i></a>

                            </div><br>
                            <div  class="fb-share-button"><a style=" width:40px;border-radius:4%;background:green; color:white" alt="Whatsapp" href="whatsapp://send" data-text="" data-href="<?php echo $url; ?>" class="whatsapp wa_btn"><span class="ion-social-whatsapp"></span>  <i class="fab fa-whatsapp" style="color: white; background:green;"></i></a></div>
                           
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 col-xs-12">

<aside class="details-sidebar">
<br>
<div class="widget">

<h4 class="widget-title">Contacts Details</h4>
<div class="agent-inner">
<div class="agent-title">
<div class="agent-photo">
<a href="#"><img src="user.png" alt="User Image"></a>

</div>
<div class="agent-details">
<h3>Listed by </h3>
<span> <i class="lni-user"></i><?php echo $temp_user; ?></span>
</div>
</div>
<a href="https://wa.me/+254<?php echo $temp_contacts;?>/?text=Hello,Am in need of your services as listed in Shopcampus Marketplace" style="color: white; text-decoration:none"><button class="btn btn-common fullwidth mt-4"><i class="fab fa-whatsapp" style="color: white;"></i> Whatsapp</button></a>
<a href="tel://<?php echo $temp_contacts;?>" style="color: brown; text-decoration:none"><button class="btn btn-common fullwidth mt-4"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp; <?php echo $temp_contacts;?></button></a>
<a href="sms://<?php echo $temp_contacts;?>?body=Hello,Am in need of your services as listed in Shopcampus Marketplace" style="color: white; text-decoration:none;"><button class="btn btn-common fullwidth mt-4"><i class="fas fa-envelope" style="color: white;"></i> Sms Chat</button></a>
<a href="<?php  echo $link; ?>" style="color: white;"><button class="btn btn-common fullwidth mt-4"><i class="fas fa-globe" style="color: white;"></i>  Online Link</button></a>

</div>
</div>

<div class="widget">
<h4 class="widget-title">Products</h4>
<ul class="posts-list">
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
   $query = "SELECT * FROM `tblbusiness_products` WHERE CONCAT(`ProductName`,`Price`) LIKE '%".$valueToSearch."%' AND businessId='$id'";
   $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `tblbusiness_products` WHERE businessId='$id'";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    include('includes/connection.php');
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}

?>
<?php while($row = mysqli_fetch_array($search_result)){?>
<li>
<div class="widget-thumb">
<a href="#"><img src="my/img/productsimages/<?php echo htmlentities($row['Image']);?>" alt="" /></a>
</div>
<div class="widget-content">
<h4><a href="#"><?php echo htmlentities($row['ProductName']);?></a></h4>
 <div class="meta-tag">
</div>
<h4 class="price">Ksh <?php echo htmlentities($row['Price']);?></h4>
</div>
<div class="clearfix"></div>
</li>
<?php } ?>
</ul>
</div>
</aside>

</div>
</div>

</div>
</div>



<!--Footer -->
<?php include('includes/footer.php');?>
<?php include('includes/mobile-bar.php');?>
<!-- /Footer--> 
<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-min.js"></script>
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
<script src="assets/js/color-switcher.js"></script>
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

<!-- Mirrored from preview.uideck.com/items/nexusplus/ads-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Oct 2018 07:22:54 GMT -->
</html>