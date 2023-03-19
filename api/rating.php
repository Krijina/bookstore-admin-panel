<?php 
 $con=mysqli_connect('localhost','root','','bookstore');

if(isset($_GET['name']))
{
    $a = $_GET['username'];
    $bookname = $_GET['name'];

    $b = str_replace( '{' , '' , $a );
    $c = str_replace( '}' , '' , $b );
    $d = str_replace( '(' , '' , $c );

    $e = str_replace( ')' , '' , $d );

    $f = str_replace( 'username=' , '', $e );



    $username = $f;


    $ratesql = "SELECT  * FROM rating WHERE user = '$username' AND book_name = '$bookname' ";
        $rateresult = $con->query($ratesql);
        $data = [];
        if ($rateresult->num_rows > 0) {
            while ($raterow = $rateresult->fetch_assoc()) {
                $initialrate = $raterow['star'];
               
            }
        }
        else {
            $initialrate = '0';
        }
            $data['data'] = $initialrate;

    
            $jsonndata =  json_encode($data);
            
            echo $jsonndata;
        
        
    }



?>