<?php
session_start();
if(isset($_REQUEST['uid'])){
$uni_id=intval($_REQUEST['uid']);
$university="SELECT * FROM tbluniversities WHERE id='$uni_id'";
$result=mysqli_query($conn,$university);
$row=mysqli_fetch_assoc($result);
$university_id=$row['id'];
$_SESSION['university']=$university_id;
?>
<script>
setTimeout(function(){
window.location.href='';
},1);
</script>
<?php }
?>

<script type="text/javascript" src="assets/js/jquery2.js"></script>
<style type="text/css">


.modal{
display: block; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.content{
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */

}
.content ul{
clear: both;
overflow:scroll;
height:350px;
    color: #555555;
    /* text-align: justify; */
    font-size:18px;
    font-family: sans-serif;
}
.content ul a{
color:black;
font-weight: bold;


}

.content .x:hover{
cursor: pointer;
}
.content li{
    padding-bottom: 20px;
  
    padding:10px;
    background:whitesmoke;
    font-size:18px;
    
    margin-bottom:10px;
}
.content li a{

    padding-bottom:20px;
}


.content li a:hover{
    color:teal;
    
}
@media screen and (max-width: 992px) {
.content{
   background-color: #fefefe;
   margin-top:30%;
    margin:5% auto; /* 15% from the top and centered */
     margin-top:30%;
    padding: 20px;
    border: 1px solid #888;
    width:100%; /* Could be more or less, depending on screen size */
}}
@media screen and (max-width: 992px) {
.content li a{
  font-size:16px;

}}
</style>
<script type='text/javascript'>
$(function(){
var overlay = $('<div id="overlay"></div>');
overlay.show();
overlay.appendTo(document.body);
$('.pop').show();
$('.close').click(function(){
$('.pop').hide();
overlay.appendTo(document.body).remove();
return false;
});


 

$('.x').click(function(){
$('.pop').hide();
overlay.appendTo(document.body).remove();
return false;
});
});
</script>
<div class='modal'>
<div class='content'>
<!--<div class="x" style="float:right;">x</div>-->
<h1 style="text-align:center; color:dodgerblue">Select Campus</h1>
<hr style="background:dodgerblue"/>
<ul>
<?php 

$sql = "SELECT * from tbluniversities";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?> 
<li style="color: black; padding:20px; padding-bottom:30px;"><a href="?uid=<?php echo htmlentities($result->id);?>"
  style="float:left; ">
<?php echo htmlentities($result->uni_name);?></a></li>

<?php }} ?>

</ul>
<!--<a href="" class='close' style="color:red; text-align:center">Close</a>-->
</div>
</div>