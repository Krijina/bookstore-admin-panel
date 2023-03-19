<?php
$username = $_POST['username'];
$contact = $_POST['contact'];
$password = $_POST['password'];
//creat connection
$connection=new mysqli('localhost','root','','bookstore');
//connection error check
	if($connection -> connect_errno != 0){
		die('Database Connection Failed:' . $connection-> connect_error);
	} 
echo $qry="INSERT INTO user VALUES (null,'$username','$contact','$password')";

$result = $connection->query($qry);
	if($result>0){
		echo"Data insert successfully";
	}else{
		echo"Erroe in insertion data";
	}
	$connection->close();
?>