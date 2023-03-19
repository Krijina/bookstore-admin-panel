
<?php
//database 
// echo '<pre>'; 	
$conn=mysqli_connect("localhost","root","","bookstore");
mysqli_select_db($conn,"bookstore");
if(isset($_GET["lname"])){
	$title = $_GET['lname'];
	$booksql="select * from book";
	$result=$conn->query($booksql);
	$bookdata=[];
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			array_push($bookdata,$row);
		}
		$test = array('books'=>$bookdata);
		$jsondata=json_encode($test);
		echo $jsondata;
	 }	
	else{
		echo'not found';
	}
}
else if(isset($_GET["bookname"])){

	$a = $_GET['user'];
            
	$b = str_replace( '{' , '' , $a );
	$c = str_replace( '}' , '' , $b );
	$d = str_replace( '(' , '' , $c );
	$e = str_replace( ')' , '' , $d );
	$f = str_replace( 'username=' , '', $e );
	$users = $f;


	$ratingsql = "SELECT * FROM `rating` WHERE user = '$users'";
	$ratingresult=$conn->query($ratingsql);
	if($ratingresult->num_rows > 0){

		require 'recomment.php';
	}else {
		$booksql = "SELECT * FROM `book` ORDER BY id desc LIMIT 10 ";
	
		$bookresult=$conn->query($booksql);
		$bookdata=[];
		$data=[];
		$bookt = "Latest";
		if($bookresult->num_rows > 0){
			while($bookrow=$bookresult->fetch_assoc()){
				array_push($bookdata,$bookrow);
			}

			$data['title'] = $bookt;

			$data['data'] = $bookdata;
			// $data['title'] = $bookt;
			$jsonndata =  json_encode($data);
	
			echo $jsonndata;
		}
		else{
			echo 'not found';
		}
	}
}
else if(isset($_GET["bookdesc"])){
	$title = $_GET['bookdesc'];
	$booksql="select * from book WHERE name='$title'";
	$result=$conn->query($booksql);
	$bookdata=[];
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			array_push($bookdata,$row);
		}
		$test = array('books'=>$bookdata);
		$jsondata=json_encode($test);
		echo $jsondata;
	 }	
	else{
		echo'not found';
	}
}
else if(isset($_GET["search"])){
	$title = $_GET['search'];
	$booksql="select * from book WHERE name LIKE '%$title%'";
	$result=$conn->query($booksql);
	$bookdata=[];
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
			array_push($bookdata,$row);
		}
		$test = array('books'=>$bookdata);
		$jsondata=json_encode($test);
		echo $jsondata;
	 }
	else{
		echo'not found';
	}
}
 
else if(isset($_GET['ratebook'])){
	$rating = $_GET['ratebook'];
	$book_name = $_GET['book_name'];

	$a = $_GET['user'];
	$b = str_replace( '{' , '' , $a );
	$c = str_replace( '}' , '' , $b );
	$d = str_replace( '(' , '' , $c );

	$e = str_replace( ')' , '' , $d );

	$f = str_replace( 'username=' , '', $e );



	$user = $f;


$ratesql = "SELECT  * FROM rating WHERE user = '$user' AND book_name = '$book_name' ";
$rateresult = $conn->query($ratesql);
$ratedata = [];
if ($rateresult->num_rows > 0) {
	while ($raterow = $rateresult->fetch_assoc()) {
		$initialrate = $raterow['star'];

	}
	$update = "UPDATE `rating` SET `star`='$rating' WHERE  user = '$user' AND book_name = '$book_name'";
	if($conn->query($update)){
		echo 'rated';	
		
	}
}else{

	
	$bookidsql = "SELECT * FROM `book` WHERE name = '$book_name' ";
	$bookidresult=$conn->query($bookidsql);
	if($bookidresult->num_rows > 0){
		while($bookidrow=$bookidresult->fetch_assoc()){
			 $bookid = $bookidrow['id'];
		}
	}
	$useridsql = "SELECT * FROM `user` WHERE username = '$user' ";
	$useridresult=$conn->query($useridsql);
	if($useridresult->num_rows > 0){
		while($useridrow=$useridresult->fetch_assoc()){
				$userid = $useridrow['id'];
		}
	}


	$insert = "INSERT INTO `rating`(`user`,`user_id`,`book_id`, `book_name`, `star`) VALUES ('$user' ,'$userid','$bookid', '$book_name' ,'$rating')";
	if($conn->query($insert)){
		echo 'rated';

	}else{
		echo 'faile';
	}
} 
}

	//request type
//  if(isset($_GET["book"])){

// 	$qry=$_GET['book'];

// 	//table name
// 	$booksql="SELECT * FROM book WHERE name LIKE '%$qry%'";
// 	$bookresult=$conn->query($booksql);
// 	$bookdata=[];
// 	$data=[];
// 	if($bookresult->num_rows>0){
// 		while($bookrow=$bookresult->fetch_assoc()){
// 			array_push($bookdata,$bookrow);
// 		}
// 		$data['data']=$bookdata;
		
// 		$jsondata=json_encode($data);
// 		//result
// 		echo $jsondata;
// 	}
// 	else{
// 		echo 'notfound';
// 	}
// }

?>


