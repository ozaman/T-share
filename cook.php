<?php   
@ob_start();
@session_start();
header ('Content-type: text/html; charset=utf-8'); 
setcookie ("app_remember_user", $_SESSION['data_user_name'], time() + (86400 * 30), "/"); // 86400 = 1 day
 
 
 echo $_SESSION['data_user_name'];
 echo $_COOKIE['app_remember_user'];
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="ui-mobile landscape min-width-320px min-width-480px min-width-768px min-width-1024px">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ระบบจัดการงานคนขับรถ</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">