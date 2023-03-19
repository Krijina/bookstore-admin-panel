<?php
//include("connection.php");
require_once("recommend.php");
$con=mysqli_connect("localhost","root","","bookstore");
$re = new Recommend();

//dataset
$user = "SELECT username FROM user";
$user_result = $con->query($user);
if($user_result->num_rows > 0){
    while ($user_row = $user_result->fetch_assoc()) {
        $username = $user_row['username'];
        $rating = "SELECT * FROM rating WHERE user = '$username'";
        $rating_result = $con->query($rating);
        if($rating_result->num_rows > 0){
            while ($rating_row = $rating_result->fetch_assoc()) {
                $r = $rating_row["book_name"];
                $datasets[$username][$r] = $rating_row['star'];
            }
        }
    }
       
}

$a = $_GET['user'];
$b = str_replace( '{' , '' , $a );
$c = str_replace( '}' , '' , $b );
$d = str_replace( '(' , '' , $c );

$e = str_replace( ')' , '' , $d );

$f = str_replace( 'username=' , '', $e );

$users = $f;

$dataset = $datasets;

//recomendation algorithms
$recommended_items = $re->getRecommendations($dataset, $users);
$returned = array_keys($recommended_items);
// echo '<pre>';
// print_r($dataset);

// print_r($returned);
// echo '</pre>';



?>

    <?php 
    //recommended books
    $len = count($returned);
    $bookdata = [];
    if($len > 0 ){
        for($p = 0 ; $p < $len ; $p++){ 
            $book = $returned[$p]; 
            $cresultsql = "SELECT  * FROM book WHERE name = '$book'";
            $cresultresult = $con->query($cresultsql);
            if ($cresultresult->num_rows > 0) {
                while($bookrow=$cresultresult->fetch_assoc()){
                    array_push($bookdata,$bookrow);
                }
            }
        }
        $bookt = "Reccomendation";

        $data['title'] = $bookt;

        $data['data'] = $bookdata;
        $jsonndata =  json_encode($data);
    
        echo $jsonndata;
    }else {
        // if user didn't get recomendation
        $booksql = "SELECT * FROM `book` ORDER BY id desc LIMIT 5 ";
            
        $bookresult=$con->query($booksql);
        $bookdata=[];
        $data=[];

        if($bookresult->num_rows > 0){
            while($bookrow=$bookresult->fetch_assoc()){
                array_push($bookdata,$bookrow);
            }
            $bookt = "Books";

            $data['title'] = $bookt;
    
            $data['data'] = $bookdata;
            $jsonndata =  json_encode($data);
    
            echo $jsonndata;
        }
        else{
            echo 'notfound';
        }
    }

   
    ?>