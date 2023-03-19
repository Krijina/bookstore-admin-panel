<?php
include 'connection.php';
$name=$_POST['name'];
$author=$_POST['author'];
$description=$_POST['description'];
$price=$_POST['price'];
$file=$_FILES['image'];

$filename=$file['name'];
$filepath=$file['tmp_name'];
$fileerror=$file['error'];
if($fileerror==0){
    $destfile='assets/image/'.$filename;
    move_uploaded_file($filepath,$destfile);
    $insertquery="insert into book(name,author,description,price,image)values('$name','$author','$description','$price','$destfile')";
    $query=mysqli_query($connection,$insertquery);
    
    if($query){
        echo"inserted";
    }
    else{
        echo"not inserted";
    }
}
?>