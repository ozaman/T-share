<?php @header ('Content-type: text/html; charset=utf-8'); 
   @session_start();
   require_once("mainfile.php");
   $PHP_SELF = "index.php";
   GETMODULE($_GET[name],$_GET[file]);
    //require_once("js/control.php");
   ?>
<script>
    $('.button-close-popup-mod-3').click(function() {

        /*if(clock != undefined){
        clearTimeout(clock);
        }*/
        //		alert($('#check_open_popup3').val());
        /*if($('#check_open_popup3').val()=='1'){
        	alert('123');
        	
        }*/
        $("#main_load_mod_popup_3").hide();
        $("#load_mod_popup_3").html('');
    });
</script>
<div style="top:0px; padding:10px; overflow: auto; width:100% ; padding-bottom:0px;" id="load_page_mod_3_touse">
    <? include ("".$MODPATHFILE.""); ?>
</div>
<?
   ///  include ("css/maincss.php");
   ?>