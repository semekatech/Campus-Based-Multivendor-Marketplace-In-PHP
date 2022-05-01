<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
$views=$_SESSION['views'];
?>
                <?php 

$id=$_GET['q'];

$sql="SELECT * FROM tblshops WHERE Sid='$id' ";
$result2=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result2);
$institution=$row['institution'];
$shop=$row['ShopName'];
$sd=$row['id'];
$about=$row['Description'];
$image=$row['Image'];
$dop=$row['date_opened'];
$cat=$row['Category'];
$temp_contacts=$row['Contacts'];
 $_SESSION['shop']=$shop;

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


 


$query4="UPDATE tblshops SET all_visitors = all_visitors+1 WHERE id =$sd"; 
    $conn->query($query4);
?>

    
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
   $query = "SELECT * FROM `tblshop_products` WHERE CONCAT(`ProductName`,`Price`) LIKE '%".$valueToSearch."%' AND ShopId='$id'";
   $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `tblshop_products` WHERE ShopId='$id'";
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
<!DOCTYPE HTML>
<html lang="en">
<head>
<?php 

include('includes/head.php');

?>
<style>
#view{
    padding: 5px;
    border:none;
    background:#337ab7;
}
#view:hover{
    background:teal;
    color:white;
}
.pr{
    color:dodgerblue;
}
.pr:hover{
    color:black;
}
.price{
     background:transparent;
     border:none;
     color:red;
     
}
#post_container{
    padding: 19px;
  margin-bottom: 20px;
  background-color: white;
  border: 1px solid #e3e3e3;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
    }
    .head{
        color:red;
     
        text-align:center;
        font-family: 'Tillana', cursive;
        animation:blinkingText 1.2s infinite;
    
}
@keyframes blinkingText{
    0% {
        color:#000;
    }
     49% {
        color:red;
    }
     60% {
        color:green;
    }
    99%{
        color:yellow;
    }
     100%{
        color:#000;
    }
    }
        .about{
       color:white;
        text-align:center;
        font-family: 'Tillana', cursive;
        font-size:18px;
    }
   
    #te{
        font-size:18px;
    }
    @media screen and (max-width: 992px) {
    #shop_profile{
        width:100%;
        text-align:center;
    }}
</style>
<meta property="og:url"           content="<?php echo $url; ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $shop; ?>"/>
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

<!-- /Header --> 

<p><br/></p><p><br/></p>
<p><br/></p><p><br/></p>
<!--Listing-->

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
		
				
 <?php 
      $sql3="SELECT * FROM tbluniversities WHERE id='$institution' ";
$result3=mysqli_query($conn,$sql3);
$row3= mysqli_fetch_array($result3);

$uni=$row3['uni_name']; ?>

				<div class="widget" id="shop_profile">

<div id="post_container" >

<h2 class="widget-title" style="text-align:center; font-size:20px;"><?php echo $shop;?></h2>
<p><?php echo $uni;?></p>

<h5 style="font-size:17px; color:black; font-size:16px; ">Operation Since: <?php echo date_format(date_create($dop), " d M Y")  ;?></h5>
 <?php 


$ads= "SELECT count(id) as num FROM tblshop_products WHERE ShopId='$id'";
$ads_res = mysqli_query($conn,$ads);
$row = mysqli_fetch_assoc($ads_res);
$ads_count = $row['num'];

?>
     <h5 style="font-size:17px; font-size:16px; color:black">Active Ads <?php echo $ads_count;?> </h5>
     <hr />
     
     <h4  style="font-size:17px; color:green">Store Contacts</h4> 
  


                            <h2 style="color: black; font-size:18px; background: whitesmoke;  padding:5px"><a href="https://wa.me/+254<?php echo $temp_contacts;?>/?text=Hello I would like to know more about your  <?php  echo $shop; ?>  Store In Shopcampus Marketplace" style="color: white; text-decoration:none"><button class="btn btn-common fullwidth mt-4"><i class="fab fa-whatsapp" style="color: white;"></i> Whatsapp</button></a></h2>
                            </span>
                            <h2 style="color: white; font-size:18px; background: whitesmoke; padding:5px "><a href="tel://<?php echo $temp_contacts;?>" style="color: brown; text-decoration:none"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp; Phone call</a></h2>
                             <span style="color: black; font-size:18px; color:red"></span>
                            </span>
                           
                            <h2 style="color: black; font-size:18px; color:white; background:whitesmoke; padding:5px  "><a href="sms://<?php echo $temp_contacts;?>?body=Hello I would like to know more about your <?php  echo $shop; ?>  Store In Shopcampus Marketplace" style="color: white; text-decoration:none;"><button class="btn btn-common fullwidth mt-4"><i class="fas fa-envelope" style="color: white;"></i> Sms Chat</button></a></h2>
                            
                            <br /><p style="color:black;">Share: &nbsp;&nbsp;&nbsp;
                            
                            <div style="margin:20px;" class="fb-share-button" data-href="<?php echo $url; ?>" data-layout="button_count" data-size="small"><a style="margin:20px; width:40px; background:blue" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fshopcampus.co.ke%2Fshop-details.php%3Fsid%3D<?php echo $id; ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"> <i class="fab fa-facebook" style="color: white;"></i>Facebook</a>
                            </div>
                            <div  class="fb-share-button"><a style="margin:20px; width:40px;padding:2px;border-radius:4%;background:green; color:white" alt="Whatsapp" href="whatsapp://send" data-text="" data-href="<?php echo $url; ?>" class="whatsapp wa_btn"><span class="ion-social-whatsapp"></span>  <i class="fab fa-whatsapp" style="color: white; background:green;"></i> whatsapp</a></div>
                             </p>
   	</div>

</div>
		
            
            
			<div class="col-md-8 col-xs-12">
				<div class="product-filter" style="background: white;">
<div class="short-name">


<form role="search" action="" method="post"id="search-form">
<table>
<tr>
<td style="width: 700px;">
<input type="text" class="form-control" autocomplete="off" name="valueToSearch" placeholder="Iam Looking For.." id="search-input" value=""></td>
<td>
<label>
<select name="category" class="orderby" style="height:30px; border: none;">
<?php
$ret="select Category from tblshops WHERE tblshops.id='$sd'";
$query= $dbh -> prepare($ret);
$query->bindParam(':sd',$sd, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->Category);?>"><?php echo htmlentities($result->Category);?></option>

<?php }} ?>

</select>

</label></td>
<td style="padding-left:10px;"><button type="submit" name="search" class="btn btn-common"><i class="fas fa-search"></i></button></td>
</tr></table>
</form>

</div>


</div>
				<div class="panel panel-info">


					<div class="panel-heading" style="font-size:20PX; color:black; background:whitesmoke; border:whitesmoke;" >Listed Products</div>
                      
				
                                				<div class="panel-body" >
					
       
                        
                       
                        
                        
                      
                         <!---more--->

                         
                       
					</div>
                    				<div class="panel-body" >
					<?php while($row = mysqli_fetch_array($search_result)){?>
                    
                        <div class="col-md-4"> 
                        
							<div class="panel panel-info" style="  border:whitesmoke;" >
								<div class="panel-heading"style=" background:whitesmoke; border:whitesmoke;" ><?php echo $row['ProductName'];?></div>
							<a href="#"><div class="panel-body">
                            
									<img src="my/img/productsimages/<?php echo htmlentities($row['Image']);?>" class="img-responsive" alt="Image" />
                                    
								</a>
                                
                                </div>
								<div class="panel-heading" style=" background:whitesmoke; border:whitesmoke;">Ksh. <?php echo htmlentities(number_format($row['Price']));?>
									<button style="float:right;" class="price"><a href="https://wa.me/+254<?php echo $temp_contacts;?>/?text=Hello am interested in This <?php echo $row['ProductName'];?> In Your Shop, is it still available? <?php  echo $url; ?> " style=" text-decoration:none"><i class="fab fa-whatsapp" style="color: dodgerblue;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="sms:+<?php echo $temp_contacts;?>&amp;body=Hello.." style=" text-decoration:none;"><i class="fas fa-envelope" style="color: dodgerblue;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="tel://<?php echo $temp_contacts;?>"><i class="fas fa-phone-alt" style="color: dodgerblue;"></i></a></button>
								</div>
							</div>
                            
						</div>
                       
                        
                        
                      
                         <!---more--->

                         
                        <?php } ?>
					</div>
					
				</div>
			</div>
            
            
            
			<div class="col-md-1"></div>
		</div>
	</div>
<!-- /Listing--> 

<!--Footer -->
<?php include('includes/footer.php');?>
<?php include('includes/mobile-bar.php');?>
<!-- /Footer--> 
<!-- Scripts --> 
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
