<?php 

session_start();
session_destroy();

setcookie('admin_id',false,time()-7*24*60*60);
setcookie('admin_username',false,time()-7*24*60*60);
setcookie('admin_email',false,time()-7*24*60*60);
setcookie('admin_password',false,time()-7*24*60*60);       
header('location:dashboard.php')

 ?>
