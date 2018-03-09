
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>T Share : Web Control Panel</title>
  
  
  
  
  <? include "css/color/taxi.php" ;	?>
  
  <? include "css/maincss.php" ;	?>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="plugins/iCheck/square/green.css">
  
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script type="text/javascript" src="js/dialog/main.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 
<style type="text/css">
<!-- class="hold-transition login-page" style="max-width:400px; "
body {
	 
}
-->
</style></head>
<body > 
 

<table width="100%"  border="0" align="center" cellpadding="2" cellspacing="2" style="max-width:350px; ">
  <tr>
    <td align="center"><div class="login-box"> 
 

  <div class="login-logo"  style="padding:0px; color:#FFFFCC; font-size:22px; text-transform:uppercase " >

  <br>

  
 <b> <img src="images/logo.png?v=4"    style="padding-bottom:0px;margin-top:10px;"      />   
 
 

 
 <style>
 
    .div-all-btn{
	 padding:5px;   border-radius: 25px; border: 3px solid #FFFFFF;background-color:#F6F6F6;     margin-bottom: 5px; box-shadow: 0px  0px 10px #dadada  ; font-size:26px; margin-top:10px; width:250px; text-align: left; padding-left:20px;
	 
 }
 </style>
 
 
  <?    include ("admin/mod/status/alert_login.php");?>
 

  
 
  <script>
  
    $("#btn_login_register" ).click(function() {
///   window.location.href = "new_driver.php"; 
  
  $("#alert_show_register").toggle();
  
      setTimeout(function () {
 
}, 500); //w
  
   });
   
   ////////// login
   
       $("#btn_login_login" ).click(function() {
		   
   $("#alert_show_popup_login").fadeIn(); 
		   
  ///window.location.href = "new_driver.php"; 
      setTimeout(function () {
 
}, 500); //w
  
   });
  
  

  
  
  
  
  
  
  
  
  //// lost pass
  
     
  $("#btn_login_password" ).click(function() {
		   
 	  //// alert(0);
		   
   $("#alert_show_popup_password").fadeIn(); 
   
   
   $("#btn_load_select_password").click();
   
   
   
     $("#load_form_main_password").show(); 
  
   $("#load_form_data_send_password").hide(); 
   
   
		   
  ///window.location.href = "new_driver.php"; 
      setTimeout(function () {
 
}, 500); //w
  
   });
  
  
  
 
  $("#login_logo" ).click(function() {
   $("#load_form_main").hide();
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
 
  
   setTimeout(function () {
    $("#login_logo").attr("src", "images/applogo.png");
 window.location.href = "index.php?newlogin=1"; //will redirect to your blog page (an ex: blog.html)
}, 3000); //w
 });
  </script>
  </div>
  <!-- /.login-logo -->
  
  <!-- /.login-box-body -->

</div>
<!-- /.login-box -->

 
<!-- iCheck -->
 

<script>
 
 
 /// check login
 /*
 
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
*/
</script></td>
  </tr>
</table>


<? include "js/control.php" ;	?>


</body>
</html>
 <style type="text/css">
<!--
body  {
	/*
	font-family: Arial; font-size:16px; background-color:#0DA1A0;
	
	*/
	font-family: Arial; font-size:16px; background-color:#ffffff;
	
}
-->
</style>

<script>
/*
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });
  });
  
  */
</script>

<div id="signin_load_popup"></div>



 
 
</head>
<body>

<div class="containers">

 
 




 
 <style>
 .modal {
  text-align: center; 
  padding: 0!important; 
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;  
}




 </style> 
 


  
 
 
 
 
 <?  include ("google/gps/check.php");?>
 
       <?
if($_GET['autologin']) {
 
?> 

   <script>

 
$("#submit_login").click();
</script>


<? } ?>



        <?
if($_GET['refer']<>'') {
 
?> 

   <script>
 
   $("#btn_login_register" ).click();
   </script>
<? } ?>






<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

 