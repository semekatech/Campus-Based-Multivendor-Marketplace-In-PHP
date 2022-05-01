

<?php
$servername='localhost';
$username='root';
$password='';
$dbname='shopcamp_db';
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
    die("error occured".$conn->connect_error);
}

?>

<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','shopcamp_db');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>