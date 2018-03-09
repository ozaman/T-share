<style>
 

.outer-container-wait{
    position: absolute; margin-left: 0px; margin-top: 0px; display: block;  
	
 
    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
   z-index:99999;  
	background: url('images/bg-popup.png');   overflow-y: scroll;
}

.inner-container-wait {
    display: table-cell;
    vertical-align: middle;
    text-align: center;overflow-y: scroll;
}

.centered-content-wait {
    display: inline-block;
    text-align: left; width:300px;overflow-y: scroll;
   
 
    border : 1px solid #99999;  
	z-index:99999; background-color:#FFFFFF;   -moz-border-radius:10px;
  -webkit-border-radius:3px;

 border-radius:3px; overflow-y: scroll;
}

</style>



<div id="alert_show_wait" style="display:nones;z-index:99999;  ">
<div class="outer-container-wait" >
   <div class="inner-container-wait">
     <div class="centered-content-wait">
	 <div style="overflow-y: scroll;">	
	  <div style="padding-top:10px">
	  
	  
	  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <td align="center"><img id="image_photo_view" name="image_photo_view"  style="width:90%; border-radius:10px;  " /></td>
  </tr>
</table>

 
  	
  </div>
 
<div class="input-group" style="padding:10px;">


  <label class="input-group-btn">
  

  
   <span class="btn btn-primary" style="height:35px;"> <i class="fa  fa-camera" style="margin-top:5px;" id="chat_icon_photo_view" ></i> 
  
  </span> </label>
 
  &nbsp;
  <button type="button" class="btn btn-default" data-toggle="modal"   style="padding-left:5px; padding-right:5px; width:30px; " id="del_photo_checkguest_<?=$arr[project][id];?>_1"><i class="fa  fa-trash" style="font-size:20px; "></i></button>&nbsp;<a  id="button_alert_show_wait_now"><span  style="color:#000000; font-size:14px; ">&nbsp; <?=chat_photo_view?></span></font></b></span></a>
  <script>
 
$('#del_photo_checkguest_<?=$arr[project][id];?>_1').click(function(){  
document.getElementById('photo_checkguest_<?=$arr[project][id];?>_1').value='';
document.getElementById('url_photo_checkguest_<?=$arr[project][id];?>_1').value='ยังไม่มีภาพถ่าย';
$('#url_photo_checkguest_<?=$arr[project][id];?>_1').css({"background": "#fa1431","color": "#333333", });

     	});
					
					</script>
</div>
 
 
 
 	  <div style="padding-top:10px">
	  
	  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <td align="center"><img id="image_photo_you" name="image_photo_you"  style="width:90%; border-radius:10px;  " /></td>
  </tr>
</table>

 
  	
  </div>
  
<div class="input-group" style="padding:10px;">
  <label class="input-group-btn"> <span class="btn btn-primary" style="height:35px;" id="chat_icon_photo_you"> <i class="fa  fa-camera" style="margin-top:5px;" ></i> 
   
  </span> </label>
 
  &nbsp;
  <button type="button" class="btn btn-default" data-toggle="modal"   style="padding-left:5px; padding-right:5px; width:30px; " id="del_photo_checkguest_<?=$arr[project][id];?>_1"><i class="fa  fa-trash" style="font-size:20px; "></i></button>&nbsp;<a  id="button_alert_show_wait_now"><span  style="color:#000000; font-size:14px; ">&nbsp; <?=chat_photo_you?></span></font></b></span></a>
  <script>
 
$('#del_photo_checkguest_<?=$arr[project][id];?>_1').click(function(){  
document.getElementById('photo_checkguest_<?=$arr[project][id];?>_1').value='';
document.getElementById('url_photo_checkguest_<?=$arr[project][id];?>_1').value='ยังไม่มีภาพถ่าย';
$('#url_photo_checkguest_<?=$arr[project][id];?>_1').css({"background": "#fa1431","color": "#333333", });

     	});
					
					</script>
</div>
 
 
 
 
 
 

</div>
     
<br>
 
    </div>
   </div>
</div>
 
 
  </div>
 
 </div>
 
<script>
    	$(".outer-container-wait").click(function(){   
  $(".outer-container-wait" ).fadeOut( "slow" );
  $( "#alert_show_wait" ).fadeOut( "slow" );
 
  });

</script>