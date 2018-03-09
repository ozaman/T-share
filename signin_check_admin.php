<?php 
 
		@setcookie ("app_remember_user", $_POST[loginusername], time() + (86400 * 30), "/"); // 86400 = 1 day
		@setcookie ("app_remember_pass", $_POST[loginpassword], time() + (86400 * 30), "/"); // 86400 = 1 day
 		 @setcookie('app_remember_time', false);
		 
 

?>
<?
 @session_start();
require_once("includes/config.in.php");
require_once("includes/class.mysql.php");
require_once("includes/function.in.php");
$db = New DB();


 
///// driver ปกติ
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
 
 


 

 
$res[admin] = $db->select_query("SELECT * FROM web_admin  WHERE password='".$_POST[loginpassword_admin]."'  AND  username='".$_POST[loginusername_admin]."'  "); 
$rows[admin] = $db->rows($res[admin]); 
if($rows[admin]){
	$arr[admin] = $db->fetch($res[admin]);
 	//$user_id = $arr[admin][id] ;	
	//include("xml/update/id.php");
	
}
//Can Login
if($arr[admin][id]){
	//Login ผ่าน
 ob_start();
 session_start();
$_SESSION['admin_user'] = $arr[admin] [username] ;
$_SESSION['admin_pwd'] = $arr[admin] [password] ;
$_SESSION['data_user_id'] = $arr[admin][id] ;	
 
 
 
	
	?>
 
 
	
<script>
 window.location.href = "control.php?name=content"; 
 </script>
 <?
}
 

else{ ?>
 <div style="padding:5px; background-color:#FF0000 ; margin-top:10px;border-radius: 5px; "><font color="#FFFFFF"> 
    ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง</font> </div>
 

	
	<?
}
?>
 