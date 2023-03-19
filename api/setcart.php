<?php
$id=$_POST['id'];
$book_id=$_POST['book_id'];
$book_name=$_POST['book_name'];
$price=$_POST['price'];
$total=$_POST['total'];
$conn=new mysqli("localhost","root","","bookstore");
if ($conn->connect_error) {
	die("Connection failed:".$conn->connect_error);
}
$sql="INSERT INTO tbl_order VALUES ('$id','$price','$book_id','$book_name','$total')";
$result=$conn->query($sql);
if ($result>0) 
	echo "Data insert successfully";
else
	echo "Error in insertion data";

$conn->close();
?>
