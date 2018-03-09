<div style="display:none "> 

<input name="check_status_new_work" type="hiddens" id="check_status_new_work"  value="0" />   

<input name="check_status_cancel_work" type="hiddens" id="check_status_cancel_work"  value="0" />   

<input name="check_status_auto_checkin" type="hiddens" id="check_status_auto_checkin"  value="0" />

<input name="check_status_auto_checkguest" type="hiddens" id="check_status_auto_checkguest"   value="0" />
   
   </div>
   
<div id="send_data_new_work"></div>
<div id="send_data_cancel_work"></div>
<div id="send_data_lab_checkin"></div>
<div id="send_data_lab_checkguest"></div>


<div id="load_sound_new_work"></div>
<div id="load_sound_cancel_work"></div>
<div id="load_sound_lab_checkin"></div>
<div id="load_sound_lab_checkguest"></div>
       <!-- ถึงสถานที่-->
 
   <div    class="modal fade" style="z-index:99999; background-color:#FFFFFF" id="popup_alert_lab_checkin" role="dialog"   aria-labelledby="myModalLabel" >

 <div class="modal-dialog" style="width:90%; z-index:99999"  >

            <!-- Modal  class="modal fade" style="z-index:99999; background-color:#FFFFFF" content-->
            <div class="modal-content" style="padding:5px;border-radius: 5px; border:none; height:80%;box-shadow:none;  " > 
			
			<div style="font-size:180px; color: #999999;  padding-top:20px;"><center>
			<i class="fa   fa-plane " style=" -webkit-transform:rotateX(180deg);
  -moz-transform:rotateX(180deg);
  -o-transform:rotateX(180deg);
  -ms-transform:rotateX(180deg);  "></i>
			 
 
			 
			</center></div>
			
			<br>
<br>
 
 
                    <h4 class="modal-title" style="font-size:26px; height:15px;   font-family:Arial, Helvetica, sans-serif">
					
					
					<center>
					  <b> Lab เช็คอินให้คุณแล้ว </b>
					</center></h4>
 
                <div class="modal-body" >  
 
		<center>
		<div style="padding:2px; font-size:28px; color:#999999; margin-top: 20px; ">เตรียมพร้อมรับแขกที่</div>
		
		<div id="terminal_lab"></div>
		
		  
		  
		  
		  
		  
</div> 

 
                <div class="modal-footer" style="margin-top:-10px;">
				       <center>
 
					 <button type="button" class="btn btn-modal-ok"   data-dismiss="modal" data-backdrop="static" id="btn_confirm_lab_checkin"  style="font-size:40px; width:250px;"><i class="fa fa-check-circle"></i>&nbsp;รับทราบ</button>
 </center>          
                </div>
            </div>
        </div>
 </div>
 
<script>

 $("#btn_confirm_lab_checkin").click(function(){
 
 
 
var url_confirm_lab_checkin= "popup.php?name=load/update/sound&file=save&type=comfirm_checkin";
$('#send_data_lab_checkin').load(url_confirm_lab_checkin);
document.getElementById('check_status_auto_checkin').value ='0';
$("#load_sound_lab_checkin").html('');

	 });

</script>
 
      <!-- เช็คแขก-->
   
   <div  class="modal fade" style="z-index:99999; background-color:#FFFFFF" id="popup_alert_lab_checkguest" role="dialog"   aria-labelledby="myModalLabel" >

 <div class="modal-dialog" style="width:90%; z-index:99999"  >

            <!-- Modal  class="modal fade" style="z-index:99999; background-color:#FFFFFF" content-->
            <div class="modal-content" style="padding:5px;border-radius: 5px; border:none; height:80%;box-shadow:none;  " > 
			
			<div style="font-size:180px; color: #999999;  padding-top:20px;"><center>
			<i class="fa   fa-users"></i>
			 
			</center></div>
			
			<br>
<br>
 
 
                    <h4 class="modal-title" style="font-size:26px; height:15px;   font-family:Arial, Helvetica, sans-serif">
					
					
					<center>
					  <b> Lab เช็คชื่อแขกแล้ว </b>
					</center></h4>
 
                <div class="modal-body" >  
 
		<center>
		<div style="padding:2px; font-size:28px; color:#999999; margin-top: 20px; ">กรุณารับแขกที่</div>
		<div id="terminal_guest"></div>
		  
		  
		  
		  
		  
</div> 

 
                <div class="modal-footer" style="margin-top:-10px;">
				       <center>
 
<button type="button" class="btn btn-modal-ok"   data-dismiss="modal" data-backdrop="static" id="btn_confirm_lab_checkguest"  style="font-size:40px; width:250px;"><i class="fa fa-check-circle"></i>&nbsp;รับทราบ</button>
 </center>          
                </div>
            </div>
        </div>
 </div>

 
 
<script>

 $("#btn_confirm_lab_checkguest").click(function(){
 
 
var url_confirm_lab_checkguest= "popup.php?name=load/update/sound&file=save&type=comfirm_checkguest";
$('#send_data_lab_checkguest').load(url_confirm_lab_checkguest);
document.getElementById('check_status_auto_checkguest').value ='0';
$("#load_sound_lab_checkguest").html('');

	 });

</script>






  <!-- งานใหม่-->
   
   <div class="modal fade" style="z-index:99999; background-color:#FFFFFF" id="popup_alert_new_work" role="dialog"   aria-labelledby="myModalLabel" >

 <div class="modal-dialog" style="width:90%; z-index:99999"  >

            <!-- Modal  class="modal fade" style="z-index:99999; background-color:#FFFFFF" content-->
            <div class="modal-content" style="padding:5px;border-radius: 5px; border:none; height:80%;box-shadow:none;  " > 
			
			<div style="font-size:180px; color: #999999;  padding-top:20px;"><center>
			<i class="fa fa-automobile"></i>
			 
			</center></div>
			
			<br>
<br>
 
 
                    <h4 class="modal-title" style="font-size:26px; height:15px;   font-family:Arial, Helvetica, sans-serif">
					
					
					<center>
					  <b> คุณมีงานใหม่เข้ามา </b>
					</center></h4>
 
                <div class="modal-body" >  
 
		<center>
		<div style="padding:2px; font-size:28px; color:#999999; margin-top: 20px; ">กรุณาตรวจสอบ</div>
		<div style="padding:2px; font-size:28px; color: #FF0000 ; margin-top: 10px; display:none ">อาคารผู้โดยสารใหม่</div>
 
</div> 

 
                <div class="modal-footer" style="margin-top:-10px;">
				       <center>
 
<button type="button" class="btn btn-modal-ok"   data-dismiss="modal" data-backdrop="static" id="btn_confirm_new_work"  style="font-size:40px; width:250px;"><i class="fa fa-check-circle"></i>&nbsp;รับทราบ</button>
 </center>          
                </div>
            </div>
        </div>
 </div>

 
 
<script>

 $("#btn_confirm_new_work").click(function(){ 
 
var url_confirm_new_work= "popup.php?name=load/update/sound&file=save&type=new_work";
$('#send_data_new_work').load(url_confirm_new_work);
document.getElementById('check_status_new_work').value ='0';
$("#load_sound_new_work").html('');

	 });

</script>









 <!-- ยกเลิกงาน-->
   
   <div class="modal fade" style="z-index:99999; background-color:#FFFFFF" id="popup_alert_cancel_work" role="dialog"   aria-labelledby="myModalLabel" >

 <div class="modal-dialog" style="width:90%; z-index:99999"  >

            <!-- Modal  class="modal fade" style="z-index:99999; background-color:#FFFFFF" content-->
            <div class="modal-content" style="padding:5px;border-radius: 5px; border:none; height:80%;box-shadow:none;  " > 
			
			<div style="font-size:180px; color: #999999;  padding-top:20px;"><center>
			<i class="fa fa-automobile"></i>
			 
			</center></div>
			
			<br>
<br>
 
 
                    <h4 class="modal-title" style="font-size:26px; height:15px;   font-family:Arial, Helvetica, sans-serif">
					
					
					<center>
					  <b> มีการยกเลิกงานของคุณ </b>
					</center></h4>
 
                <div class="modal-body" >  
 
		<center>
		<div style="padding:2px; font-size:28px; color:#999999; margin-top: 20px; ">กรุณาตรวจสอบ</div>
		<div style="padding:2px; font-size:28px; color: #FF0000 ; margin-top: 10px; display:none ">อาคารผู้โดยสารใหม่</div>
 
</div> 

 
                <div class="modal-footer" style="margin-top:-10px;">
				       <center>
 
<button type="button" class="btn btn-modal-ok"   data-dismiss="modal" data-backdrop="static" id="btn_confirm_cancel_work"  style="font-size:40px; width:250px;"><i class="fa fa-check-circle"></i>&nbsp;รับทราบ</button>
 </center>          
                </div>
            </div>
        </div>
 </div>

 
 
<script>

 $("#btn_confirm_cancel_work").click(function(){
 
 
var url_confirm_cancel_work= "popup.php?name=load/update/sound&file=save&type=cancel_work";
$('#send_data_cancel_work').load(url_confirm_cancel_work);
document.getElementById('check_status_cancel_work').value ='0';
$("#load_sound_cancel_work").html('');

	 });

</script>












<?
$ok_button_color="#0ACB68";
$no_button_color="#F50202";

?>

<style>
.btnstatus{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; height:40px; font-size:16px; width:100px; margin-right:15px; background-color:#367FA9;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF;

}
.btnstatus:hover{

background-color:#999999;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF; border:0px solid #FFFFFF; 
}


.btn-modal-ok{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; font-size:22px; width:120px; background-color:<?=$ok_button_color?>;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF

}
 

.btn-modal-no{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; font-size:22px;  width:120px; background-color:<?=$no_button_color?>;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
}

 
</style> 



 
