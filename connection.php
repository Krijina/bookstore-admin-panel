<?php
//create connection 
$connection = new mysqli('localhost','root','','bookstore');
//connection error check
if($connection -> connect_errno != 0){
	die('Database Connection Failed:' . $connection -> connect_error);
}
/*$server_name="localhost";
$db_username="root";
$db_password="";
$db_name="bookstore";

$connection=mysqli_connect($server_name,$db_username,$db_password);
$dbconfig=mysqli_select_db($connection,$db_name);
if($dbconfig){
	echo "Database Connected";
}
else{
	echo "Database Connection Failed";
}*/

?>