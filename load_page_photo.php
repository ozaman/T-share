<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<?php @header ('Content-type: text/html; charset=utf-8'); 
@session_start();
require_once("mainfile.php");
$PHP_SELF = "index.php";
GETMODULE($_GET[name],$_GET[file]);
 //require_once("js/control.php");

  if($_GET[type]=="driver_topoint"){
  		$txt = t_arrive_drop_place;
  }
  else if($_GET[type]=="guest_receive"){
  		$txt = t_reception;
  }
  else if($_GET[type]=="guest_register"){
  		$txt = 'แขกลงทะเบียน';
  }
  else if($_GET[type]=="driver_pay_report"){
  		$txt = 'แจ้งยอดรายได้';
  }
  
  ?>
  
  
  <script>
    	
  $('.button-close-popup-photo').click(function(){   

   $( "#load_mod_popup_photo" ).toggle();
 
    $( "#load_mod_popup_photo" ).html('');
	
 
	
	 // var url_load = "load_page_mod.php?name=booking/load&file=work_all&driver=<?=$user_id?>&day=<? echo date('Y-m-d');?>";
	    //  $("#load_booking_data").load(url_load);

     	});
  </script>
 
  <div class="back-full-popup"> 
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div class="button-close-popup-photo" ><?=$popup_icon_left_arow;?></div></td>
  <td   ><div style="font-size:22px; color:#333333; " id="text_mod_topic_action_photo-txt" class="text-topic-action-photo"><?=$txt;?></div></td>
    <td width="40" align="right"   >
    <div style="font-size:22px; color:#333333;" id=""  onclick="GohomePage();">
    <i class="fa fa-home  text-resize" style="font-size:30px;"></i>
    </div>
    </td>
  </tr>
</table>
</div>
  
  <div style="top:0px; padding:0px; overflow: auto; width:100% ; " id="load_page_photo_touse">   
 
  <? include ("".$MODPATHFILE.""); ?>
  </div>
