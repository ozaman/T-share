<?php

///echo $_POST[username];
if($_POST[remember] == 1){
 
		@setcookie('remember_user', '', time() + (86400 * 90 * 30), "/"); 
		@setcookie('remember_pass', '', time() + (86400 * 90 * 30), "/");
	    
		@setcookie('remember_user', $_POST[username], time() + (86400 * 90 * 30), "/"); 
		@setcookie('remember_pass', $_POST[password], time() + (86400 * 90 * 30), "/");
	}else{
		@setcookie ("remember_user", "", time() - 3600);
		@setcookie ("remember_pass", "", time() - 3600);
	}
	@setcookie('remember', '', time() - 3600, '/');
	@setcookie('remember', $_POST[remember], time() + (86400 * 90 * 30), "/");
?>
<?
  
//Check Admin
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

$tb_admin_chk = "web_driver";

$res[admin] = $db->select_query("SELECT * FROM ".$tb_admin_chk." WHERE username='".$_POST[username]."' AND password='".$_POST[password]."'  "); 
$rows[admin] = $db->rows($res[admin]); 
if($rows[admin]){
	$arr[admin] = $db->fetch($res[admin]);
	
}
//Can Login
if($arr[admin][id]){
	//Login ผ่าน
	ob_start();
	$_SESSION['data_user_name'] = $_POST[username] ;
	$_SESSION['data_user_password'] = $_POST[password] ;
	$_SESSION['data_user_id'] = $arr[admin][id] ;
	?>
 <center>
 <img src="images/loader.gif" width="66" height="66"><br>
 เข้าสู่ระบบสำเร็จ
 </center>
 <script>
 setTimeout(function () {
///   window.location.href = "index.php"; //will redirect to your blog page (an ex: blog.html)
}, 3000); //w
 
 </script>
 <?
}
 

else{ ?>
 <div style="padding:5px; background-color:#FF6600 "><font color="#FFFFFF"> 
    ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง</font> </div>
 

	
	<?
}
?>