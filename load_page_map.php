<?php @header ('Content-type: text/html; charset=utf-8'); 
@session_start();
require_once("mainfile.php");
$PHP_SELF = "index.php";
GETMODULE($_GET[name],$_GET[file]);
 //require_once("js/control.php");

?>    
 <!-- Bootstrap 3.3.6 -->
  <?  include ("bootstrap/css/css.php");?>
 
  <!-- Font Awesome -->
 
  <!-- Theme style -->

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css?v=<?=time()?>">
  
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
 
 
  <!-- Font Awesome -->
 
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css?v=<?=time()?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css?v=<?=time()?>">
  
   
 
 
  
  
  
  <?php 
 $txt = t_maps;
  ?>
  
  
  
  <script>
    	
  $('.button-close-popup-map').click(function(){   
	console.log(1);
   $( "#main_load_mod_popup_map" ).hide();
 
    $( "#load_mod_popup_map" ).html('');
    
    $( "#load_mod_popup_map" ).html('');
    
    $( ".bottom_popup" ).show();
	
 
	
	 // var url_load = "load_page_mod.php?name=booking/load&file=work_all&driver=<?=$user_id?>&day=<? echo date('Y-m-d');?>";
	    //  $("#load_booking_data").load(url_load);

     	});
  </script>
 
  
  
  <div style="top:0px; padding:0px; overflow: auto; width:100% ; " id="load_page_map_touse">   
 
  <? include ("".$MODPATHFILE.""); ?>
  </div>
  <?
  
  ///  include ("css/maincss.php");
  
  ?>