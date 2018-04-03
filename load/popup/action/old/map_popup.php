  <?  include ("mod/livechat/config.php");?> 
  
  
  <?  include ("includes/template.php");?> 
  
 
<style>
	.css-full-popup {
	position: fixed;
	left: 0px;
	top: 0px; 
	bottom:0;
	width: 100%;
	height: 100%;
	z-index: 9999; 
	overflow-y:hidden ; padding:0px; background-color:#FFFFFF;  
 
}
.back-full-popup
{ 
font-size:22px;   padding:10px;  color:#FFFFF;  width:100%; background-color:<?=$maincolor?>;      
 border-top: 0px solid #000000; margin-bottom: 0px;  
  top:  0; position:fixed;
    z-index: 1; 
 
}
 
</style>
 
 
  <div id="main_load_mod_popup_map" style="display: none;">
  <div class="back-full-popup" style="z-index: 99999;"> 
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div class="button-close-popup-map" ><?=$popup_icon_left_arow;?></div></td>
  <td   ><div style="font-size:22px; color:#FFFFFF " id="text_mod_topic_action_map-txt" class="text-topic-action-photo"><?=$txt;?></div></td>
    <td width="40" align="right"   >
    <div style="font-size:22px; color:#FFFFFF ;" id=""  onclick="GohomePage();">
    <i class="fa fa-home" style="font-size:30px; color:#ffff; "></i>
    </div>
    </td>
  </tr>
</table>
</div>
<div class="css-full-popup" id="load_mod_popup_map"  style="position:fixed;overflow-y: hidden; -webkit-overflow-scrolling: touch; " > 

</div>
</div>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>