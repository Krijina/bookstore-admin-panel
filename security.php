<?php
session_start();
include('connection.php');
if($dbconfig)
{
    //echo"Data Connected"
}
else{
    header("Location:connection.php");
}
if(!$_SESSION['username'])
{
    header('Location:login.php');

}
?>