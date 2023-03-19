<?php 
require_once "connection.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Book</title>
</head>
<body>
<?php 
//check button click/ form submission
if (isset($_POST['btnUpdate'])) {
	//create blank array to store form error
	$err = [];
	$id = $_POST['id'];

	//check empty and trim data(remove space) for book_id
	if (isset($_POST['book_id']) && !empty($_POST['book_id']) && trim($_POST['book_id']) != '') {
		//fetch category_id form $_POST array and save into variable
		$id = $_POST['book_id'];
	} else {
		//store error message into $err array
		$err['book_id'] = 'Enter id';
	}
	//check empty and trim data(remove space) for name
	if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name']) != '') {
		//fetch name form $_POST array and save into variable
		$name = $_POST['name'];
	} else {
		//store error message into $err array
		$err['name'] = 'Enter Book name';
	}
	//check empty and trim data(remove space) for price
	if (isset($_POST['price']) && !empty($_POST['price']) && trim($_POST['price']) != '') {
		//fetch price form $_POST array and save into variable
		$price = $_POST['price'];
	} else {
		//store error message into $err array
		$err['price'] = 'Enter price';
	}
		
	if (isset($_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
		//check size
		if ($_FILES['image']['size'] <= 1024000) {
			//check type
			$types = ['image/png','image/jpeg','image/gif','image/jpg'];
			if (in_array($_FILES['image']['type'], $types)) {
				if (file_exists('images/' . $_FILES['image']['name'])) {
					//generate random file name
					$file_name = uniqid() . '_' .  $_FILES['image']['name'];
				} else {
					$file_name =  $_FILES['image']['name'];
				}
				
				//upload file to server: move to our project folder
				if(move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/' . $file_name)){
					echo 'File upload success';
				} else {
					$err['image'] = 'File can not move to our folder';
				}
			} else {
				$err['image'] = 'Invalid file type';
			}
		} else {
			$err['image'] = 'Large image size';
		}
	}

	//description validationis not required because it's already set null into database
	$description = $_POST['description'];



	//count no of error into form
	if (count($err) == 0) {
		//include database connection 

		require_once 'connection.php';
		//sql query to insert data into database taken from form
		if (isset($file_name)) {
			$sql = "UPDATE book SET id='$id',name='$name',price='$price',description='$description',image='$file_name' where id='$id'";
		} else {
			$sql = "UPDATE book SET id='$id',name='$name',price='$price',description='$description', where id='$id'";
		}
		
		//execute query
		if ($connection->query($sql)){	
			header('location:lisbook.php');

			// echo "Product Updated successfully";
		} else {
			die("Book update failed $connection->error");
		}		
	}
}
$id = $_GET['id'];
//query to select data into table
$sql = "SELECT * FROM book WHERE id='id'";

$result = $connection->query($sql);

$row = $result->fetch_assoc();
//connection close
//$sql = "SELECT * FROM book";
//$result = $connection->query($sql);

?>
<h1>Form to Edit Data</h1>
<form action="" method="post" enctype="multipart/form-data">

	<div id='form-item'>
		<label for="name">Book Name</label>
		<input type="text" name="name" id="name" placeholder="Enter name" value="<?php echo $row['name'] ?>">
		<?php 
	if (isset($err['name'])) {
		echo $err['name'];
	}
	 ?>
	</div>
	<div id='form-item'>
		<label for="price">Book price</label>
		<input type="text" name="price" id="price" placeholder="Enter price" value="<?php echo $row['price'] ?>">
		<?php 
	if (isset($err['price'])) {
		echo $err['price'];
	}
	 ?>
	</div>
	<div id='form-item'>
		<label for="image">Book image</label>
		<input type="file" name="image" id="image" placeholder="Enter image">
		<?php 
	if (isset($err['image'])) {
		echo $err['image'];
	}
	 ?>
	</div>
	<img src="images/<?php echo $row['image'] ?>" height="100" width="100">
	<div id='form-item'>
		<label for="description">description</label>
		<textarea name="description" id="description" placeholder="Enter description"><?php echo $row['description'] ?></textarea>
		<?php 
		if (isset($err['description'])) {
			echo $err['description'];
		}
		 ?>
	</div>
	<button type="submit" name="btnUpdate">Update</button>
</form>
</body>
</html>