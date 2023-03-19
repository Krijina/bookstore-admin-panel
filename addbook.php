<?php
session_start();
//include database connection 
require_once 'connection.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Insert</title>
	<!--<link rel="stylesheet" type="text/css" href="assets/css/menu.css">-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<style type="text/css">
		/* *{
			
			background-position: center;
		}
		.form-item{
			font-size: 20px;
			max-width: 400px;
		}
    *{
    margin: 0;
    padding: 0px;
    text-decoration: none;
    } */
.sidebar{
    /* position: center; */
    padding: 50px;
    height: 10%;
    background: #1e1e1e;
	font-size: 20px;
	color: white;
	text-align: center;
	font-family: sans-serif;
    /*transition: 1pall .5s ease-in ;*/
}
/* .sidebar header{
    color: white;
    font-size: 28px;
    line-height: 70px;
    text-align: center;
}
.sidebar a{
    display: block;
    color: white;
    height: 65px;;
    width: 100%;
    line-height: 65px;
    padding-left: 30px;
    border-bottom: 1px solid rgba(255,255,255,.1);
    border-top: 1px solid black;
    border-left: 5px solid transparent;
    box-sizing: border-box;
    font-family: 'Open Sans',sans-serif;
    /*transition: 1pall .5s ease-in ;*/
}
.sidebar a span{
  letter-spacing: 1px;
  text-transform: uppercase;
}
a:hover,a.active{
	border-left: 5px solid #b93632;
  color: red;
}
.sidebar a i{
  font-size: 23px;
  margin-right: 16px;
  letter-spacing: 2px;
} 


	</style>
</head>

<body>
<div class="sidebar">
<center>
    <header>Add Book</header>
	
    <a href="listbook.php"><i class="fas fa-list"></i><span>List Book</span></a>
    <a href="addbook.php"><i class="fas fa-book"></i><span>Add Book</span></a>
    <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>Cart</span></a>
  </div>

  <center>
<h1>Insert Book</h1>

<form action="upload.php" method="post" enctype="multipart/form-data" class="col-lg-6">
	<table class="table table-bodered">
	<div class='form-item'>
		<label for="name">Book Name</label>
		<input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
	
	</div>

	<br>
	<div class='form-item'>
		<label for="author">Book Author</label>
		<input type="text" name="author" class="form-control" id="author" placeholder="Enter author" required>
	
	</div>
	
	<div class='form-item'>
		<label for="description">Book description</label>
		<textarea name="description" class="form-control" id="description" placeholder="Enter description" required></textarea>
	</div>
	
	<div class='form-item'>
		<label for="price">Book price</label>
		<input type="text" name="price" class="form-control" id="price" placeholder="Enter price" required>

	</div>
	
	<div class='form-item'>
		<label for="image">Upload image</label>
		<input type="file" name="image" class="form-control" id="image" required >
	</div>
	<br>
	<div class='form-item'>
		<input type="submit" name="btnSave" value="Save book" style="background-color: blue; color:white">		
	</div>
	</table>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>