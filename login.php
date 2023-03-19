<?php
//include('security.php');
  if(isset($_COOKIE['admin_id'])){
    session_start();
    $_SESSION['admin_id']=$_COOKIE['admin_id'];
    $_SESSION['admin_username']=$_COOKIE['admin_username'];
    $_SESSION['admin_email']=$_COOKIE['admin_email'];
    $_SESSION['admin_password']=$_COOKIE['admin_password'];
    header('location:dashboard.php');
  }
  //check button
if (isset($_POST['login'])) {
  //array to store err
  $err = [];
    //check email
    if (isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])) {
      $email = $_POST['email'];
      if (strlen($email) < 8) {
        $err['email'] = 'Email must be 8 character';
      } else if (strlen($email) > 20) {
        $err['email'] = 'Email can not exceed 20 character';
      } 
    } else {
      $err['email'] = '<span style="color:red;">Enter your email</span>';
    }
  
  //check password
  if (isset($_POST['password']) && !empty($_POST['password']) && trim($_POST['password'])) {
    $password = $_POST['password'];
    // $enctypted_password =md5($password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if (strlen($password) < 8) {
      $err['password'] = 'password must be 8 character';
    } else if (strlen($password) > 20) {
      $err['password'] = 'password can not exceed 20 character';
    } 
  } else {
    $err['password'] = '<span style="color:red;">Enter password</span>';
  }
//print_r($err);
if (count($err)==0){
  
  // $password = md5($password);

  // process to login with database
  require_once'connection.php';
   $sql="SELECT * FROM admin  WHERE email='$email' AND password='$password'";

    // execute query
    $result = $connection->query($sql);

    if ($result -> num_rows == 1){
        session_start();
      $row = $result->fetch_assoc();
      $_SESSION['admin_id']=$row['id'];
      $_SESSION['admin_username']=$row['username'];
      $_SESSION['admin_email']=$row['email'];
      $_SESSION['admin_password']=$row['password'];
      echo var_dump($_SESSION);
        // check rember me button
     if (isset($_POST{'remember'})) {
        // store data into cookies also
        setcookie('admin_id',$row['id'],time()+7*24*60*60);
        setcookie('admin_username',$row['username'],time()+7*24*60*60);
        setcookie('admin_email',$row['email'],time()+7*24*60*60);
        setcookie('admin_password',$row['password'],time()+7*24*60*60);        

      }
     // redirect to next page
      header('location:dashboard.php');
       
    }else
      $error = 'credential not match ';
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Book store</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<style type="text/css">
		*{
	margin: 0;
	padding: 0;
  margin-top: 10px;
	font-family: sans-serif;
}
body{
	background-image: url(assets/image/img.jpg);
	background-size: cover;
	background-position: center;
}
label{
  text-decoration: none;
  font-size: 25px;
}
input{
  margin-top: 10px;
  font-size: 15px;
}
	</style>
</head>
<body style="color: white;" align="center">
	<div class="log">
		<h1>Bookstore </h1>
		<hr>
	</div>
	<br>
  <form action="" method="post">
  <!-- display error massage -->
  <?php if (isset($error)) { ?>
    <p class="error_message"><?php echo $error ?></p>
  <?php } ?>
 <?php if (isset($_GET['error']) && $_GET['error'] == 1){ ?>
    <p class="error_message">Please login to continue</p>
  <?php } ?>

  <div class="form-element">
    <label for="email"><b>email</b></label>
    <input type="text" name="email" placeholder="Enter email" >
    <?php
      if (isset($err['email'])) {
        echo $err['email'];
      }
    ?>
  </div>
  <br>
  <div class="form-element">
    <label for="password"><b>Password</b></label>
    <input type="password" name="password" placeholder="Enter password">
    <?php
      if (isset($err['password'])) {
        echo $err['password'];
      }
    ?>
  </div>
  <br>
  <div class="form-element" >
    <input type="checkbox" value="remember" name="remember">
    Rembember Me

  <br>
    <input type="submit"  class="login"  value="login" name="login">
  </div>
</form>
</body>
</html>