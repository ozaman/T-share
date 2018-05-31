<?php @header ('Content-type: text/html; charset=utf-8'); 
   @session_start();
   require_once("mainfile.php");
   $PHP_SELF = "index.php";
   GETMODULE($_GET[name],$_GET[file]);
    //require_once("js/control.php");
   ?>    
<script>
   var transfer_work = '<?=$_GET[transfer_work];?>';
   $('.button-close-popup-mod').click(function(){   
   if(transfer_work=='true'){
   console.log('close_coutdown');
   $.each( countdownTimer, function( key, value ) { 
   clearInterval(countdownTimer[key]);
   });
   }
   $( "#main_load_mod_popup" ).hide();
   $( "#load_mod_popup" ).html('');
   var url_load = "load_page_mod.php?name=booking/load&file=work_all&driver=<?=$user_id?>&day=<? echo date('Y-m-d');?>";
     $("#load_booking_data").load(url_load);
   $('#show_main_tool_bottom span').removeClass('bottom-popup-icon-new-active');
   $('#btn_home_bottom_menu').addClass('bottom-popup-icon-new-active');
   $('#check_open_worktbooking').val(0);
   $('#check_open_workshop').val(0);
   	});
</script>
<div style="top:0px; padding:10px; width:100%; padding-bottom:0px;   ">   
   <? include ("".$MODPATHFILE.""); ?>
</div>
<?
   //  include ("css/maincss.php");
   ?>