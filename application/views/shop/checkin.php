<div style="padding: 5px 0px;">
   <span class="text-cap font-20"> ข้อมูลการเช็คอิน คนขับ</span>
   <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="1" id="table_show_hide_checkin_S00085">
      <tbody>
         <tr id="step_driver_topoint">
            <td class="font-16">
               <div class="div-all-checkin">
                  <table width="100%" border="0" cellspacing="2" cellpadding="0" class=" border-alert" id="box_driver_topoint">
                     <tbody>
                        <tr>
                           <td width="60" rowspan="2">
                              <div class="step-booking" id="number_driver_topoint">1</div>
                              <div style="position:absolute; margin-top:-40px; margin-left: -5px;">
                                 <img src="assets/images/no.png" align="absmiddle" id="iconchk_driver_topoint">
                              </div>
                           </td>
                           <td colspan="2">
                              <button id="btn_driver_topoint" onclick="btn_driver_topoint()" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none;color: #fff; "><span class="font-20 text-cap"><i class="icon-new-uniF12D-1" style="width:10px;"></i>  ถึงสถานที่ส่งแขก</span></button>
                           </td>
                        </tr>
                        <tr>
                           <td style="height:30px;">
                              <div id="status_driver_topoint">
                                 <div class="font-16">
                                    <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong>
                                 </div>
                              </div>
                           </td>
                           <td width="30">
                              <table width="100%">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <i id="driver_topoint_locat_off" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">location_on</i>
                                          <i id="driver_topoint_locat_on" onclick="openPointMaps('driver_topoint','85');" class="material-icons" style="color: rgb(59, 89, 152); font-size: 22px; border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152); display: none;">location_on</i>
                                       </td>
                                       <td>
                                          <!--<i id="photo_driver_topoint_no" class="fa fa-camera" style="color:#3b59987a; font-size:16px; border-radius: 50%; padding:5px; border: 1px solid #3b59987a;display: none;" ></i>-->
                                          <!-- <i id="photo_driver_topoint_yes" class="fa fa-camera" style="color:#3b5998; font-size:16px; border-radius: 50%; padding:5px;display: none; border: solid 2px #3b5998 ; " onclick="ViewPhoto('85','driver_topoint','');"></i>-->
                                          <i id="photo_driver_topoint_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
                                          <i id="photo_driver_topoint_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="ViewPhoto('85','driver_topoint','');">photo_camera</i>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <input type="hidden" value="0" id="driver_topoint_check_click">
                  <input type="hidden" id="check_code" value="85">
               </div>
                
            </td>
         </tr>
      </tbody>
   </table>
</div>
<div style="width: 100%;height: 5px;background-color: #ddd ;margin: 10px 0px;" ></div>
<div style="padding: 5px 0px;">
		<span class="text-cap font-20"> ข้อมูลการเช็คอิน พนักงาน</span>
		<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="1" id="table_show_hide_checkin_S00085">
		  <tbody><tr id="step_guest_receive" style="display:nones">
		      <td class="font-16">
		         
<div class="div-all-checkin">
   <table width="100%" border="0" cellspacing="2" cellpadding="0" class="" id="box_guest_receive">
      <tbody>
         <tr>
            <td width="60" rowspan="2">
               <div class="step-booking" id="number_guest_receive">2</div>
               <div style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="assets/images/no.png" align="absmiddle" id="iconchk_guest_receive"></div>
            </td>
            <td colspan="2">
               <button id="btn_guest_receive" onclick="btn_guest_receive()" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none;color: #fff; "><span class="font-20 text-cap"><i class="icon-new-uniF159-5" style="width:10px;"></i>  พนักงานรับแขก</span></button>
               <input type="hidden" value="0" id="guest_receive_check_click">
            </td>
         </tr>
         <tr>
            <td style="height:30px;">
               <div id="status_guest_receive"><div class="font-16"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong></div></div>
            </td>
            <td width="30">
           <!-- <i id="photo_guest_receive_no" class="fa fa-camera" style="color:#3b59987a; font-size:16px; border-radius: 50%; padding:5px; border: 1px solid #3b59987a;display: none;" ></i>
             <i id="photo_guest_receive_yes" class="fa fa-camera" style="color:#3b5998; font-size:16px; border-radius: 50%; padding:5px;display: none; border: solid 2px #3b5998  " onclick="ViewPhoto('85','guest_receive','');"></i>-->
             <table width="100%">
         		<tbody><tr>
         			<td>
         				<i id="guest_receive_locat_off" class="material-icons" style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: nones;">location_on</i>
         				<i id="guest_receive_locat_on" onclick="openPointMaps('guest_receive','85');" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;">location_on</i>
         			</td>
         			<td>
         				<i id="photo_guest_receive_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
            <i id="photo_guest_receive_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="ViewPhoto('85','guest_receive','');">photo_camera</i>
         			</td>
         		</tr>
         	</tbody></table>
            </td>
         </tr>
      </tbody>
   </table>
</div>

<script>
		if($('#guest_receive_check_click').val()==1){
		 	$('#guest_receive_locat_off').hide();
		 	$('#guest_receive_locat_on').show();
		 
		}else{
			 $('#guest_receive_locat_off').show();
			 $('#guest_receive_locat_on').hide();
		}
$.ajax({
			url: '../data/fileupload/store/guest_receive_85.jpg',
			type:'HEAD',
			error: function()
			{
			console.log('Error file');
			   /*$('#photo_guest_receive').css('color','#3b59987a');
			   $('#photo_guest_receive').css('border','1px solid #3b59987a');
			   $('#photo_guest_receive').attr('onclick',' ');*/
			   $('#photo_guest_receive_no').show();
			   $('#photo_guest_receive_yes').hide();
			   
//			   $('#guest_receive_locat_on').hide();
//			   $('#guest_receive_locat_off').show();
//			   alert(type)
			},
			success: function()
			{
				//file exists
				/*console.log('success file');
				$('#photo_guest_receive').css('color','#3b5998');
				$('#photo_guest_receive').css('border','2px solid #3b5998');
				$('#photo_guest_receive').attr('onclick','ViewPhoto("'+id+'","photo_guest_receive","1536748732");');*/
				$('#photo_guest_receive_no').hide();
			   $('#photo_guest_receive_yes').show();
			   
//			   $('#guest_receive_locat_on').show();
//			   $('#guest_receive_locat_off').hide();
			}
		});
   function btn_guest_receive(){ 
   	var check = $('#guest_receive_check_click').val();
   	if(check==0){
		swal('พนักงานยังไม่รับแขก');
	}else{
		swal('ยืนยันแล้ว','พนักงานรับแขกแล้ว','success');
	}
   
   /* if($('#guest_receive_check_click').val()==0){
    	$( "#dialog_custom" ).show();
//   	 var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup&id=85&type=guest_receive";
   	var url_load= "empty_style.php?name=booking/shop_history/load&file=checkin_popup&id=85&type=guest_receive";
    	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  		$('#body_dialog_custom_load').load(url_load); 
    }
	else{
    }*/
   }
</script>		      </td>
		   </tr>
		   <tr id="step_guest_register" style="display:nones">
		      <td class="font-16">
		         <div class="div-all-checkin">
<table width="100%" border="0" cellspacing="2" cellpadding="0" id="box_guest_register">
   <tbody>
      <tr>
         <td width="60" rowspan="2">
            <div class="step-booking" id="number_guest_register">3</div>
            <div style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="assets/images/no.png" align="absmiddle" id="iconchk_guest_register"></div>
         </td>
         <td colspan="2"><button id="btn_guest_register" onclick="btn_guest_register()" type="button" class="btns  btn-info " style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none;color: #fff; "><span class="font-20 text-cap"><i class="icon-new-uniF116-6" style="width:10px;"></i>แขกลงทะเบียน</span></button></td>
      </tr>
      <tr>
         <td style="height:30px;">
            <div id="status_guest_register"><div class="font-16"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong></div></div>
            <input type="hidden" value="0" id="guest_register_check_click">
         </td>
         <td width="30">
         	<table width="100%">
         		<tbody><tr>
         			<td>
         				<i id="guest_register_locat_off" class="material-icons" style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: nones;">location_on</i>
         				<i id="guest_register_locat_on" onclick="openPointMaps('guest_register','85');" class="material-icons location" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;">location_on</i>
         			</td>
         			<td>
         				<i id="photo_guest_register_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
            <i id="photo_guest_register_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="ViewPhoto('85','guest_register','');">photo_camera</i>
         			</td>
         		</tr>
         	</tbody></table>
            <!-- <i id="photo_guest_register_no" class="fa fa-camera" style="color:#3b59987a; font-size:16px; border-radius: 50%; padding:5px; border: 1px solid #3b59987a;display: none;" ></i>
             <i id="photo_guest_register_yes" class="fa fa-camera" style="color:#3b5998; font-size:16px; border-radius: 50%; padding:5px;display: nones; border: solid 2px #3b5998  " onclick="ViewPhoto('85','guest_register','');"></i>-->
             
         </td>
      </tr>
   </tbody>
</table>
</div>

<script>
if($('#guest_register_check_click').val()==1){
		 	$('#guest_register_locat_off').hide();
		 	$('#guest_register_locat_on').show();
		 
		}else{
			 $('#guest_register_locat_off').show();
			 $('#guest_register_locat_on').hide();
		}
$.ajax({
			url: '../data/fileupload/store/guest_register_85.jpg',
			type:'HEAD',
			error: function()
			{
			console.log('Error file');
		
			   $('#photo_guest_register_no').show();
			   $('#photo_guest_register_yes').hide();

//				 $('#guest_register_locat_off').show();
//			     $('#guest_register_locat_on').hide();
			},
			success: function()
			{
				//file exists

			   $('#photo_guest_register_no').hide();
			   $('#photo_guest_register_yes').show();

//			   $('#guest_register_locat_off').hide();
//			 	$('#guest_register_locat_on').show();
			}
		});
   function btn_guest_register(){ 
   	var check = $('#guest_register_check_click').val();
   	if(check==0){
		swal('แขกยังไม่ลงทะเบียน');
	}else{
		swal('ยืนยันแล้ว','แขกลงทะเบียนแล้ว','success');
	}
    /* if($('#guest_register_check_click').val()==0){
 
    $( "#dialog_custom" ).show();
   	var url_load= "empty_style.php?name=booking/shop_history/load&file=checkin_popup&id=85&type=guest_register";
    	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  		$('#body_dialog_custom_load').load(url_load); 
    
   }*/
   }
</script>		      </td>
		   </tr>
		   <tr id="step_driver_pay_report" style="display:nones">
		      <td class="font-16">
		         
<div class="div-all-checkin">
   <table width="100%" border="0" cellspacing="2" cellpadding="0">
      <tbody>
         <tr>
            <td width="60" rowspan="2">
               <div class="step-booking" id="number_driver_pay_report">4</div>
               <div style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="assets/images/no.png" align="absmiddle" id="iconchk_driver_pay_report"></div>
            </td>
            <td colspan="2">
            
            <button id="btn_driver_pay_report" onclick="btn_driver_pay_report()" type="button" class="btn  btn-info " style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius:  20px; border:none;color: #fff;"><span class="font-20 text-cap"><i class="icon-new-uniF121-10" style="width:10px;"></i> แจ้งยอดรายได้</span></button>
            
            </td>
         </tr>
         <tr>
            <input type="hidden" value="0" id="driver_pay_report_check_click">
            <td style="height:30px;">
               <div id="status_driver_pay_report"><div class="font-16"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong></div></div>
            </td>
            <td width="30">
             <!-- <i id="photo_driver_pay_report_no" class="fa fa-camera" style="color:#3b59987a; font-size:16px; border-radius: 50%; padding:5px; border: 1px solid #3b59987a;display: none;" ></i>
             <i id="photo_driver_pay_report_yes" class="fa fa-camera" style="color:#3b5998; font-size:16px; border-radius: 50%; padding:5px;display: none; border: solid 2px #3b5998  " onclick="ViewPhoto('85','driver_pay_report','');"></i>-->
             <table width="100%">
         		<tbody><tr>
         			<td>
         				<!--<i id="driver_pay_report_locat" onclick="openPointMaps();" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" >location_on</i>-->
         				<!--<i id="driver_pay_report_locat_off"  class="material-icons" style="color: #3b59987a;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 1px #3b59987a;display: nones;" >location_on</i>
         				<i id="driver_pay_report_locat_on" onclick="openPointMaps();" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" >location_on</i>-->
         			</td>
         			<td>
         				<i id="photo_driver_pay_report_no" class="material-icons" style="color: rgba(59, 89, 152, 0.48); font-size: 22px; border-radius: 50%; padding: 2px; border: 1px solid rgba(59, 89, 152, 0.48);">photo_camera</i>
            <i id="photo_driver_pay_report_yes" class="material-icons" style="color: #3b5998;font-size: 22px; border-radius: 50%; padding: 2px; border: solid 2px #3b5998;display: none;" onclick="ViewPhoto('85','driver_pay_report','');">photo_camera</i>
         			</td>
         		</tr>
         	</tbody></table>
            </td>
         </tr>
      </tbody>
   </table>

   <script>
   var type = "driver_pay_report";
	$.ajax({
			url: '../data/fileupload/store/driver_pay_report_85.jpg',
			type:'HEAD',
			error: function()
			{
			console.log('Error file');
			  /* $('#photo_driver_pay_report').css('color','#3b59987a');
			   $('#photo_driver_pay_report').css('border','1px solid #3b59987a');
			   $('#photo_driver_pay_report').attr('onclick',' ');*/
			    $('#photo_driver_pay_report_no').show();
			   $('#photo_driver_pay_report_yes').hide();
			   
			   /*$('#driver_pay_report_locat_on').hide();
			   $('#driver_pay_report_locat_off').show();*/
			},
			success: function()
			{
				//file exists
				console.log('success file');
				/*$('#photo_driver_pay_report').css('color','#3b5998');
				$('#photo_driver_pay_report').css('border','2px solid #3b5998');
				$('#photo_driver_pay_report').attr('onclick','ViewPhoto("'+id+'","driver_pay_report","1536748732");');*/
				
				$('#photo_driver_pay_report_no').hide();
			   $('#photo_driver_pay_report_yes').show();
			   
			    /*$('#driver_pay_report_locat_on').show();
			   $('#driver_pay_report_locat_off').hide();*/
			}
		});
     function btn_driver_pay_report(){
      	
    var check = $('#driver_pay_report_check_click').val();
   	if(check==0){
		swal('แลป ยังไม่แจ้งยอดรายได้');
	}else{
		swal('ยืนยันแล้ว','แลป แจ้งยอดรายได้แล้ว','success');
	}
      	/*if($('#driver_pay_report_check_click').val()==0){
          $( "#dialog_custom" ).show();
   	var url_load= "empty_style.php?name=booking/shop_history/load&file=checkin_popup&id=85&type=driver_pay_report";
    	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  		$('#body_dialog_custom_load').load(url_load); 
      }else{
      }*/
      
      }
        </script>      
</div>		      </td>
		   </tr>
		 </tbody></table>
	</div>