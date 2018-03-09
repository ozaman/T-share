<?php   
@ob_start();
@session_start();
header ('Content-type: text/html; charset=utf-8'); 
 
require_once("mainfile.php");

$PHP_SELF = "popup.php";
GETMODULE($_GET[name],$_GET[file]);
 require_once("css/maincss.php");
 
 
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		 //$db->del(TB_transfer_report_all,"transfer_date<'2016-09-01' and transfer_date>'2016-10-31'  "); 
	///	$db->del('acc_2017_06',"transfer_date NOT LIKE '%2017-06%'  "); 
		
 ///$db->del('transfer_report_all',"transfer_date NOT LIKE '%2017-06%' and ondate NOT LIKE '%2017-06%'   "); 
 
 
 ?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <!-- Tell the browser to be responsive to screen width -->
 
  <!--
 
  
   Bootstrap 3.3.6 -->
  
  
  	<? include "js/control.php" ;	 ?> 
  
 
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
 
  
 <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  
  
<script src="bootstrap/js/bootstrapadmin.js"></script>
 
      <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
      
      
      
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body class="hold-transition skin-blue sidebar-mini"  style="background-color:#F5F5F5" >


<div class="wrapper" style="background-color:#F5F5F5; padding:20px;" >
 <!-- head -->

 
 
 
 
<input type="hidden" name="check_data_chat_now" id="check_data_chat_now" value="0"  style="width:100px " />
 
  <!----end head-->
   
  <!-- Left side column. contains the logo and sidebar -->
 
  <!-- เพจ --> 
  
<!-- jQuery 2.2.3   jquery-3.0.0 -->

<!-- Bootstrap 3.3.6 -->

<!-- Slimscroll -->
 
<!-- AdminLTE App -->

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
 

 

<?  include ("".$MODPATHFILE."");?>  </div>




<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px; margin-top: 15px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.modal-dialog {
  padding-top: 0;
}

</style>

  <?  include ("bootstrap/css/css.php");?>    
  
  
    <script src="js/camera/binaryajax.js"></script> 
                 <script src="js/camera/exif.js"></script>
                 
 
              