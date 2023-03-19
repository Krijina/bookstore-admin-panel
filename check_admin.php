<?php 
session_start();
if (!isset( $_SESSION['admin_id'])) {
	header('location:admin_dashboard.php');
}
?>