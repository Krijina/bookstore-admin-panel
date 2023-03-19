// $qry="select * from book";
// $raw=mysqli_query($conn,$qry);
// $bookdata=[];
// {
// 	while($res=mysqli_fetch_array($raw))

// 		$json["data"][]=$res;
// }
// print(json_encode($json));


<!-- 
	$conn=mysqli_connect("localhost","root","","bookstore");
mysqli_select_db($conn,"bookstore");
//if(isset($_GET["book"])){
// $booksql="select * from book";
// $result=$conn->query($booksql);
// $bookdata=[];
// if($result->num_rows>0){
// 	while($row=$result->fetch_assoc()){
// 		array_push($bookdata,$row);
// 	}
// 	$test = array('books'=>$bookdata);
// 	$jsondata=json_encode($test);
// 	echo $jsondata;
//  }
//else{
// 	echo'not found';
// }

//}

//  if(isset($_GET["book"])){
// 	$qry=$_GET['book'];
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
// 		echo $jsondata;
// 	}
// 	else{
// 		echo 'notfound';
// 	}
// }
// else if(isset($_GET['ratebook'])){
//    $rating=$_GET['rating'];
//    $name=$_GET['name'];
// 	$a=$_GET['user'];
// 	$b=str_replace('{',"",$a);
// 	$c=str_replace('}',"",$b);
// 	$d=str_replace('(',"",$c);
// 	$e=str_replace(')',"",$d);
// 	$f=str_replace('email',"",$e);
// 	$user=$f;
// 	$ratesql="SELECT * FROM rating WHERE user='$user' and book_name='$book_name'";
// 	$rateresult=$conn->query($ratesql);
// 	$ratedata=[];
// 	if($rateresult->num_rows>0){
// 		while($row=$rateresult->fetch_assoc()){
// 			$initialrate=$raterow['star'];
// 		}
// 	$update="UPDATE 'rating' SET 'star'='$rating' WHERE user='$user' AND book_name='$book_name'";
// 	if($conn->query($update)){
// 		$sql="UPDATE 'book' SET rating=rating-$initialrate+$rating WHERE 'name'='$book_name'";
// 		if($con->query($sql)){
// 			echo'rated';
// 		}
// 		else{
// 			echo'failed';
// 		}
// 	}
// }else{
// 	$insert="INSERT INTO 'rating'('user','book_name','star')VALUES('$user','$book_name','$rating')";
// 	if($conn->query($insert)){
// 		$sql="UPDATE 'book' SET ratingcount=ratingcount+1,rating=rating+$rating WHERE 'name'='$book_name'";
// 		if($conn->query($sql)){
// 			echo"rated";
// 		}
// 	}
// }
// }


// ?> -->

juman pathaing
<?php
//database 
$conn=mysqli_connect("localhost","root","","bookstore");
mysqli_select_db($conn,"bookstore");

	//request type
 if(isset($_GET["book"])){

	$qry=$_GET['book'];

	//table name
	$booksql="SELECT * FROM book WHERE name LIKE '%$qry%'";
	$bookresult=$conn->query($booksql);
	$bookdata=[];
	$data=[];
	if($bookresult->num_rows>0){
		while($bookrow=$bookresult->fetch_assoc()){
			array_push($bookdata,$bookrow);
		}
		$data['data']=$bookdata;
		
		$jsondata=json_encode($data);
		//result
		echo $jsondata;
	}
	else{
		echo 'notfound';
	}
}

?>