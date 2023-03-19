<?php 
require_once "connection.php";

$book_id	 = $_GET['id'];

//query to delete data into table
$sql = "DELETE FROM book WHERE id='$book_id'";

if ($connection->query($sql)){	
	echo "Deleted successfully";
} else {
	die("Delete failed $connection->error");
}

//connection close
$connection->close();

header('location:listbook.php');

 ?>