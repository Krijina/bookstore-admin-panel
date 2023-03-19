<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cart </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style type="text/css">
		/* *{
			font-family: sans-serif;
			background-position: center;
		}
		.form-item{
			font-size: 20px;
			max-width: 200px;
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
    <header></header>
    <a href="listbook.php"><i class="fas fa-list"></i><span>List Book</span></a>
    <a href="addbook.php"><i class="fas fa-book"></i><span>Add Book</span></a>
    <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>Cart</span></a>
  </div>
<div class="col-lg-11 col-12">
	<table class="text-center" >
		<thead class="bg-dark text-white">
			<tr>
				<th>ID</th>
				<th>Book Name</th>
				<th>Book Id</th>
                <th>User Id</th>
				<th>User</th>
				<th>Price</th>
                <th>Total</th>
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
						//while($result=mysqli_fetch_array($query)){
						?>
						<tr>
                            <td>1</td>
                            <td>Harry Potter</td>
                            <td>16</td>
                            <td>4</td>
                            <td>aayush</td>
                            <td>320</td>
                            <td>320</td>
							<!-- <td><?php echo $result['id'];?></td>
							<td><?php echo $result['book_name'];?></td>
							<td><?php echo $result['book_id'];?></td>
                            <td><?php echo $result['user_id'];?></td>
							<td><?php echo $result['User'];?></td>
							<td><?php echo $result['pricw'];?></td>
							<td><?php echo $result['total'];?></td> -->
							<td class="bg-blue text-white">
								<a href="#?id=<?php echo $product['id'] ?>" onclick="return confirm('are you sure to confirm')">Confirm</a>
							</td>
						</tr>
						<?php
						//}
						?>
   </div>
</body>
</html>