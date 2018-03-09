  
   
<style>
	.css-full-popup {
	position: fixed;
	left: 0px;
	top: 0px; 
	
	
	
	
	bottom:0;
	width: 100%;
	height: 100%;
	z-index: 9999; 
	overflow: auto ; padding:0px; background-color:#FFFFFF; padding:10px; 
  
}
.back-full-popup
{ 
font-size:22px;   padding:10px;    width:100%; background-color:#1BB4B4;      
 border-top: 0px solid #000000; margin-bottom: 0px;  
  top:  0; position:fixed;
    z-index: 99999; 

}
 
  
 
 
</style>
 
 
<div class="css-full-popup"  id="alert_show_register" style="display:none; position:fixed;    padding:0px; margin-top:0px; "> 
 
 
  
  
  <table width="100%" border="0" cellspacing="2" cellpadding="2" style="background-color:#3b5998;">
  <tbody>
    <tr>
      <td width="60"><img src="images/close-popup.png" width="50" height="50" alt="" style="  margin-left:5px; margin-top: 0px; cursor:pointer" id="btn_close_alert_popup_register"/></td>
      <td><span style="color: #ffffff;font-weight: 800;font-size: 32px;">TShare</span> <span style="font-size: 30px;color: #ffffff;"> ทีแชร์</span></td>
    </tr>
  </tbody>
</table>

  
  
  
  
  
  
<script>

 $("#btn_close_alert_popup_register").click(function(){   
 
 
 $( "#alert_show_register" ).hide();
 
  });

</script>
  
  
   <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
  
 
 
<?  include "new_driver.php" ;?>
 

</div>    
 
 