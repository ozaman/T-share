<?php @header ('Content-type: text/html; charset=utf-8'); 
@session_start();
require_once("mainfile.php");
$PHP_SELF = "index.php";
GETMODULE($_GET[name],$_GET[file]);
 //require_once("js/control.php");
?>    
  
    
  <script>
    	
  $('.back-full-popup-button-check-in').click(function(){   

   $( "#load_data_check_in_check_in" ).toggle();
 
    $( "#load_data_check_in_check_in" ).html('');

     	});
		
		
		
	$('.btn-modal-no').click(function(){   	
		
$( "#load_data_check_in_check_in" ).toggle();
 
    $( "#load_data_check_in_check_in" ).html('');

     	});
		
		
		
		
		
  </script>
 
 
 
 
 
 
 
 
    <div class="back-full-popup"> 
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div class="back-full-popup-button-check-in" ><?=$popup_icon_left_arow;?> </div></td>
  <td   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup_check_in_topic"> </div></td>
    <td width="50" align="right"   ><div style="font-size:22px; color:#FFFFFF " id="head_full_popup_icon"></div></td>
  </tr>
</table>
</div>
 
 
 
 


  <div style="top:0px; padding:10px; overflow: auto; width:100%   ">   
 
  <? include ("".$MODPATHFILE.""); ?>
  </div>
 