 
<style>
 .css-full-popup-gps {
	position: fixed;
	left: 0px;
	top: 0px; 
	bottom:0;
	width: 100%;
	height: 100%;
	z-index: 9999; 
	overflow-y:hidden ; padding:0px; background-color:#333333;
 
}
.back-full-popup-gps
{ 
font-size:22px;   padding:10px;  color:#FFFFF;  width:100%; background-color:#000000;      
 border-top: 0px solid #000000; margin-bottom: 0px;  
  top:  0; position:fixed;
    z-index: 1; 
 
}
 .modal-gpg {
 
  text-align: center; height:100%;
  vertical-align: middle; margin-top:50px; overflow:hidden;
  }
 
</style>
 
 
<div class="css-full-popup-gps" id="load_alert_gps_show" style="display:none; position:fixed;overflow:hidden;"> 
 <div class="back-full-popup-gps">
 
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" style="padding:5px; padding-top:18px;font-size:18px; color:#FFFFFF; padding:5px  "  class="close_alert_gps_show_popup">กลับไปเปิดการแชร์ตำแหน่ง</td>
  </tr>
</table></div>
  <div  class="modal-gpg"><br> 


    <table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
      <td align="center"  style="font-size:20px; color:#FFFFFF; padding:2px  "><img src="images/map_alert.png" align="absmiddle"/ id="close_alert_gps_show" class="close_alert_gps_show_popup"><br><br>
 
</td>
  </tr>
    <tr>
      <td align="center" style="font-size:25px; color: #FF9900; font-family:Arial, Helvetica, sans-serif; padding:2px;  "><b>การแชร์ตำแหน่งถูกปิด</b></td>
  </tr>
    <tr>
   <td align="center" style="font-size:20px; color:#FFFFFF; padding:2px  ">กรุณาเปิดการแชร์ตำแหน่ง</td>
  </tr>
    <tr>
      <td align="center" style="font-size:18px; color:#FFFFFF; padding:2px  ">ก่อนจัดการงาน </td>
    </tr>
  </table>
 
 

</div><?  /// include "load/loading/page_main.php" ; ?>
 
</div>

<script>
$('.close_alert_gps_show_popup').click(function(){   


/// load_alert_gps_show
  $( "#load_alert_gps_show" ).toggle();
  
 });

</script>