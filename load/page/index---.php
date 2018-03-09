 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <!-- Tell the browser to be responsive to screen width -->
 
  <!--
 
  
   Bootstrap 3.3.6 -->
  
  
  
  
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css?v=<?=time()?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css?v=<?=time()?>">
  
   

 
    <link href="docs/css/highlight.css" rel="stylesheet">
    <link href="dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet">
 
  
  
  
  <script src="plugins/jQuery/js/jquery-latest.js"></script>
 
  <?  include ("bootstrap/fonts/all.php");?> 
  
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body class="hold-transition skin-blue sidebar-mini"  style="background-color:#F5F5F5" >


<div class="wrapper" style="background-color:#F5F5F5" >
 <!-- head -->

 
 
  <? 
///// head
 include "load/page/head.php" ;
 ?> 
   <? 
///// head
 include "load/tool_bottom.php" ;
 ?> 

<input type="hidden" name="check_data_chat_now" id="check_data_chat_now" value="0"  style="width:100px " />
 
  <!----end head-->
   
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"   style="position:fixeds;  "  id="load-main-sidebar"    >  
 
      <!-- search form -->
  
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
	  <div style="margin-top:-40px;box-shadow: 0px  0px  0px #B4B4B4; ">
<? 
///// เมนู left
 ////  include "load/menu/all.php" ;
include "load/menu/".$data_user_class.".php" ;
 
 ?> 
 
 
 </div> 
    <!-- /.sidebar -->
</aside>

  <!-- เพจ --> 
  
<!-- jQuery 2.2.3   jquery-3.0.0 -->

<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
 
<!-- AdminLTE App -->

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  <div class="content-wrapper" style="margin-top:55px; "  >
  <div >



<div id="check_chat_update" style="display:none"> </div>

<script src="js/google.jquery.min.js"></script>



<?  include ("load/update/new_msg.php");?> 
<? 



 
 
 if($data_user_class<>'taxi'){
	 /*
 
 include ("load/update/new_register.php");
  include ("load/update/new_booking.php");
  
    include ("load/update/new_checkin.php");
	*/

 }
 
 
  if($data_user_class=='taxi'){
 
/// include ("load/update/new_topoint.php");
//  include ("load/update/new_booking.php");
 //include ("load/update/new_payment.php");


 }
 
 
 
 
 ?> 


 



<section class="content-header" style="padding:0px; margin-top: 0px;  " >
       <? //  include ("load/page/content.php");?> 
    <!-- Content Header (Page header) -->
	<div style="padding:5px ; margin-top:-20px; margin-left:0px; margin-right:0px; margin-bottom:10px   ">
	<div id="load_mod_data"  style="padding:0px;padding-bottom:40px; padding-top:15px;">
 <?  include ("".$MODPATHFILE."");?>  </div>
 </div>
  </div>
<!-- ./wrapper -->
<!-- ./wrapper -->


 



	
	

</body>
</html>
 
 
 
 
 
 
        
  <div  style="display:none"><?   include "sound/index.php";?></div>
  <script src="docs/js/main.js"></script>

  
    <script src="docs/js/highlight.js"></script>
    <script src="dist/js/bootstrap-switch.js"></script>
    