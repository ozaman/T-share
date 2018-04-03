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

 
  <div id="main_load_mod_popup_4" style="display: none;">
  <div class="back-full-popup" style="z-index: 99999;"> 
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div class="button-close-popup-mod-4" ><?=$popup_icon_left_arow;?></div></td>
  <td   ><span class="font-28"><div  id="text_mod_topic_action_4" class="text-topic-action-mod-4 text-resize" style="color: #fff;" ></div></span></td>
 <td width="40" align="right"   >
    <div onclick="GohomePage();">
    <i class="fa fa-home" style="font-size:30px; color:#ffff; "></i>
    </div>
    </td>
  </tr>
</table>
</div>
<div id="step_tab_booking2">
	
</div>
<div class="css-full-popup" id="load_mod_popup_4" style="position:fixed;overflow-y: scroll;-webkit-overflow-scrolling: touch; " > 
<?  /// include "load/loading/page_main.php" ; ?>

</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>