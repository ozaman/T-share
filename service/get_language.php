<?php 
require_once("includes/config.in.php");
require_once("includes/class.mysql.php");
require_once("includes/function.in.php");
$db = New DB();
if($_GET[type]=='logout'){
	 @session_start();
	$data[user] = $_SESSION['data_user_name'];
	$data[pass] = $_SESSION['data_user_password'];
	$data[id] = $_SESSION['data_user_id'];	
	$data[user_class] = $_SESSION['data_user_class'];
	
	session_unset(); 
	session_destroy(); 
	
	echo print_r($_SESSION);
}
?>