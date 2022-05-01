<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">


<head>

<?php 

include('includes/head.php');

?>
</head>
<body>

<header id="header-wrap">

<?php include('includes/header.php');?>
<br />
<br />
</header>


<section id="content" class="section-padding">
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-8 col-xs-12">

<form id="contactForm" class="contact-form" data-toggle="validator">
<h2 class="contact-title">
Send Us A Message
</h2>
<p style="color: black;">Would You Like to share,comment,complain or tell us anything whether positive or negative,we are listening to you,Just share your message with us in the form 
below and we shall get back to you as soon as possible.</p>
<br />
<h2 class="contact-title">
To Contact Us,Kindly Fill In The Form Below.
</h2>

<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<div class="form-group">
<input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<div class="form-group">
<input type="email" class="form-control" id="email" placeholder="Email" required data-error="Please enter your email">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<div class="form-group">
<input type="text" class="form-control" id="msg_subject" name="subject" placeholder="Subject" required data-error="Please enter your subject">
<div class="help-block with-errors"></div>
</div>
</div>
</div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="row">
<div class="col-md-12">
<div class="form-group">
<textarea class="form-control" placeholder="Massage" rows="7" data-error="Write your message" required></textarea>
<div class="help-block with-errors"></div>
</div>
</div>
</div>
 </div>
<div class="col-md-12">
<button type="submit" id="submit" class="btn btn-common">Submit Now</button>
<div id="msgSubmit" class="h3 text-center hidden"></div>
<div class="clearfix"></div>
</div>
</div>
</form>
</div>
<div class="col-lg-4 col-md-4 col-xs-12">
<div class="information mb-4">
<h3>Write To Us</h3>
<div class="contact-datails">
<p style="color: black;">We value our customers insights and we are social enough to listen to you,In case you would like to write to us,Address us through:</p>
<br /><ul class="list-unstyled info">
<li><p style="color: black;"> P.O BOX 75-10200, </p></li>
<li><p style="color: black;"> Murang'a, </p></li>
<li><p style="color: black;"> Kenya. </p></li>

</ul></div>
</div>
<div class="information">
<h3>Contact Info</h3>
<p style="margin:10px; color:black">You Can also reach us easily via our contacts indicated below</p>
<div class="contact-datails">
<ul class="list-unstyled info">
<li style="color: black;"><span>Email : </span><p ><a href="#" style="color: black;">ShopCampus@gmail.com</a></p></li>
<li><span>Phone : </span><p style="color: black;">+254 705 030 613 & +254 742 565 026</p></li>
</ul>
</div>
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