<?php
include('security.php');
// $connection=mysqli_connect("localhost","root","","bookstore");
if(isset($_POST['btnSave']))
{
    $name=$_POST['name'];
    $author=$_POST['author'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $image=$$_FILES["image"]["name"];

    if(file_exists("assets/image".$_FILES["image"]["name"]))
    {
        $store=$_FILES["image"]["name"];
        $_SESSION['status']="Image alreaddy exists.'.$store.'";
        header('Location:addbook.php');
    }
    else{
            $query="INSERT INTO book('name','author','description','price','image')VALUES ('$name','$author','$description','$price','$image')";
            $query_run=mysqli_query($connection,$query);
    
        if($query_run)
        {
            move_uploaded_file($_FILES["image"]["tmp_name"],"assets/image/".$_FILES["image"]["name"]);
            $_SESSION['success']="Book Added";
            header('Location:addbook.php');
        }
        else{
            $_SESSION['success']="Book Not Added";
            header('Location:addbook.php');
        }
    }
}
?>