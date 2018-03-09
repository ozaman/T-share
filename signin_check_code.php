<?php header ('Content-type: text/html; charset=utf-8'); 
/*
if($_POST[remember] == 1){

 
	}else{
		@setcookie ("app_remember_user", $_POST[loginusername], time() -3600);
		@setcookie ("app_remember_pass", $_POST[loginpassword], time() -3600);
 		 @setcookie('app_remember_time', false);

		 
}
*/
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
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

$tb_admin_chk = "web_driver";

$res[admin] = $db->select_query("SELECT * FROM  web_driver  WHERE code_login='".$_GET[code]."' "); 
$rows[admin] = $db->rows($res[admin]); 
if($rows[admin]){
	$arr[admin] = $db->fetch($res[admin]);
 
	
}
//Can Login
if($arr[admin][id]){
	//Login ผ่าน
	ob_start();
			@setcookie('app_remember_user', $_POST[loginusername], 0, ""); 
		@setcookie('app_remember_pass', $_POST[loginpassword], 0 ,"");
		@setcookie('app_remember_time', $_POST[remember], 0, "");
	
	$_SESSION['data_user_name'] = $arr[admin] [username] ;
	$_SESSION['data_user_password'] =  $arr[admin] [password] ;
	$_SESSION['data_user_id'] = $arr[admin][id] ;
	?>
	<script type="text/javascript" src="js/dialog/main.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	 <center>
 <img src="images/loader.gif" width="66" height="66"><br>
 เข้าสู่ระบบสำเร็จ
 </center>
	
<script>
  $("#load_form").hide();

   setTimeout(function () {
    $("#login_logo").attr("src", "images/applogo_action.png");

}, 500); //w
 
       setTimeout(function () {
    $("#login_logo").attr("src", "images/applogo.png");
}, 1000); //w
 
 
        setTimeout(function () {
    $("#login_logo").attr("src", "images/applogo_action.png");
}, 1500); //w
        setTimeout(function () {
    $("#login_logo").attr("src", "images/applogo.png");
}, 2000); //w

        setTimeout(function () {
    $("#login_logo").attr("src", "images/applogo_action.png");
}, 2500); //w
 
 
 window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
 
 
 </script>
 <?
}
 

else{ ?>
 <div style="padding:5px; background-color:#FF6600 "><font color="#FFFFFF"> 
    ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง</font> </div>
 

	
	<?
}
?>
 