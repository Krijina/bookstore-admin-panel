<?php
$username = $_POST['username'];
$password = $_POST['password'];
$json = array();
$conn = new mysqli('localhost','root','','bookstore');
if($conn){
	$sql = "SELECT * FROM user where username = '$username' and password = '$password'";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		while($row = $result->fetch_array()){
			$json["data"][]=array(
				"username"=>$row['username'],
				"password"=>$row['password']
			);
		}
	} else {
		$json["error"]= "User not found";
	}
}else{
	$json["error"] ="Error in connection";
}
echo json_encode($json);
$conn->close();
?>