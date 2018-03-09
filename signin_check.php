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


 $username_full=$_POST[loginusername];
$username_short='driver_'.$_POST[loginusername];
//Check Admin

 
///// driver ปกติ
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

 
 $username_cut=substr($_POST[loginusername], 0, 3);  // abcd

if($username_cut=='lab' or $username_cut=='LAB' or $username_cut=='Lab' or $username_cut=='aff' or $username_cut=='AFF' or $username_cut=='Aff'){
	
$tb_admin_chk = "web_user";	
	
}

 



 else {
$tb_admin_chk = "web_driver";
 
}
/*



if($_POST[login_type]=='driver'){
	
 $tb_admin_chk = "web_driver";	
 
}

 else {
$tb_admin_chk = "web_user";

}
*/

//// echo $_POST[login_type];


 

 
$res[admin] = $db->select_query("SELECT * FROM ".$tb_admin_chk." WHERE password='".$_POST[loginpassword]."'  AND (username='".$username_full."' or username='".$username_short."' or phone='".$username_full."') "); 
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
$_SESSION['data_user_name'] = $arr[admin] [username] ;
$_SESSION['data_user_password'] = $arr[admin] [password] ;
$_SESSION['data_user_id'] = $arr[admin][id] ;	
$_SESSION['data_user_class'] = $arr[admin][user_class] ;
 
 
	
	?>
 
 
	
<script>
 window.location.href = "index.php"; 
 </script>
 <?
}
 

else{ ?>
 <div style="padding:5px; background-color:#FF0000 ; margin-top:10px;border-radius: 5px; "><font color="#FFFFFF"> 
    ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง</font> </div>
 

	
	<?
}
?>
 