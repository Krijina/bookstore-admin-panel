<?php
//include'sidebar.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
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
	<div class="sidebar" >
    <header>List Book</header>
    <a href="listbook.php"><i class="fas fa-list"></i><span>List Book</span></a>
    <a href="addbook.php"><i class="fas fa-book"></i><span>Add Book</span></a>
    <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>Cart</span></a>
  </div>
	<a href="addbook.php">Add book</a>
	
	<div class="col-lg-11 col-12">
	<table class="text-center" >
		<thead class="bg-dark text-white">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Author</th>
				<th>Price</th>
				<th>Image</th>
				<th>Description</th>
				<th>action</th>
			</tr>
		</thead>
		<tbody>
		<?php
						//include database connection 
						include 'connection.php';
						$sql="SELECT * FROM book";
						$query=mysqli_query($connection,$sql);
						$result=mysqli_fetch_array($query);
						while($result=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $result['id'];?></td>
							<td><?php echo $result['name'];?></td>
							<td><?php echo $result['author'];?></td>
							<td><?php echo $result['price'];?></td>
							<td><img src="<?php echo $result['image'];?>" width="100" height="100"></td>
							<td><?php echo $result['description'];?></td>
							<td class="bg-blue text-white">
								<a href="removebook.php?id=<?php echo $product['id'] ?>" onclick="return confirm('are you sure to delete')">Delete</a>
								<a href="editbook.php?id=<?php echo $product['id'] ?>" >Edit</a>
							</td>
						</tr>
						<?php
						}
						?>
   </div>
     <!--Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>