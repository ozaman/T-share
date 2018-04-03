 
 
  <script>
 var url_driver_topoint_<? echo $arr[order][invoice];?>= "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $arr[order][invoice];?>&type=check_driver_topoint&status=<?=$arr[order][driver_topoint]?>&time=<?=$arr[order][driver_topoint_date];?>";
 $('#status_driver_topoint_<?=$arr[order][invoice]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?echo t_load_data?>');
 $('#status_driver_topoint_<?=$arr[order][invoice]?>').load(url_driver_topoint_<? echo $arr[order][invoice];?>);
</script>
      <? 
    if($arr[order][driver_topoint]== 1 ){ ?>
  
 <script> 
 
//	  alert(5555);
$("#step_guest_receive_<? echo $arr[order][invoice];?>").show();

 
 
   $('#iconchk_driver_topoint_<?=$arr[order][invoice];?>').attr("src", "images/yes.png");  
 
  $("#number_driver_topoint_<?=$arr[order][invoice];?>").removeClass('step-booking');
  
   $("#number_driver_topoint_<?=$arr[order][invoice];?>").addClass('step-booking-active');
   
   
    $("#box_driver_topoint_<?=$arr[order][invoice];?>").removeClass('border-alert');
   
   $("#btn_driver_topoint_<?=$arr[order][invoice]?>").css('background-color','#666666');
 ///  $("#btn_driver_topoint_<?=$arr[order][invoice]?>").addClass('disabledbutton-checkin');
 
	  
   </script>
      <? } ?>
  	
  
  <table width="100%" border="0" cellspacing="2" cellpadding="0" class="div-all-checkin border-alert" id="box_driver_topoint_<?=$arr[order][invoice];?>" style="padding: 8px;
    background-color: #FAFAFA;
    border-radius: 14px;
    margin-bottom: 8px;">
        <tbody>
          <tr>
            <td width="60" rowspan="2"><div class="step-booking"  id="number_driver_topoint_<?=$arr[order][invoice];?>">1</div> <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_driver_topoint_<?=$arr[order][invoice];?>"    /></div></td>
            <td colspan="2"><button  id="btn_driver_topoint_<?=$arr[order][invoice]?>"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color?>;  border-radius: 20px; border:none "><span class="font-26"><i class="icon-new-uniF12D-1" style="width:10px;"  ></i> ถึงสถานที่ส่งแขก</button></td>
          </tr>
          <tr>
            <td style="height:30px;"><div  id="status_driver_topoint_<?=$arr[order][invoice]?>" ></div></td>
            <td width="30">
  			<input type="hidden" value="<?=$arr[order][check_driver_topoint];?>" id="topoint_check_click"/>
            <i id="photo_driver_topoint_<?=$arr[order][invoice];?>" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  " onclick="ViewPhoto('<?=$arr[order][invoice];?>','driver_topoint','<?=$arr[order][driver_topoint_date]?>');"></i>
            
            
              <input type="hidden" id="check_code" value="<?=$arr[order][invoice];?>" />
            </td>
          </tr>
        </tbody>
    </table>
    	<?php 
  	if(file_exists("../data/fileupload/store/driver_topoint_".$arr[order][invoice].".jpg")==0){ ?>
		<script>
			$('#photo_driver_topoint_<?=$arr[order][invoice]?>').css('color','#3b59987a');
			$('#photo_driver_topoint_<?=$arr[order][invoice]?>').css('border','1px solid #3b59987a');
			$('#photo_driver_topoint_<?=$arr[order][invoice]?>').attr('onclick',' ');
		</script>
	<? }?>
    
    
       
 <script>
			
  $("#btn_driver_topoint_<?=$arr[order][invoice]?>").click(function(){ 
  
  
    //if($('#topoint_check_click').val()!=1){
   $( "#main_load_mod_popup_3" ).toggle();
 
  var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup_job&id=<?=$arr[order][invoice]?>&type=driver_topoint";
  console.log(url_load);
  $('#load_mod_popup_3').html(load_main_mod);
  /// $('#load_mod_data').html(load_main_mod);
 
  $('#load_mod_popup_3').load(url_load); 
		// }else{
			
		// }
  
  
  	 });
  
	/////		
 
  $("#0btn_driver_topoint_<?=$arr[order][invoice]?>").click(function(){ 
  
 
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่ามาถึงสถานที่ส่งแขกแล้ว",
	type: "info",
		showCancelButton: true,
		confirmButtonColor: '<?=$main_color?>',
		confirmButtonText: 'ใช่',
		cancelButtonText: "ไม่ใช่",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
 
 var url_<?=$arr[order][invoice]?> = "popup.php?name=booking/load/form&file=savedata&action=check_driver_topoint&type=driver_topoint&id=<?=$arr[order][invoice]?>";
 

  
 $('#status_driver_topoint_<?=$arr[order][invoice]?>').load(url_<?=$arr[order][invoice]?>);
 
 
  
$("#step_guest_receive_<? echo $arr[order][invoice];?>").show();


$("#box_driver_topoint_<?=$arr[order][invoice];?>").removeClass('border-alert');

    
   
	//  alert('dd');
    } else {
  //    swal("Cancelled", "", "error");
  
 
  
    }
	
	
	
 
	
	
	});
	   
  
 
  
  
  
 

		 });
		 

		 </script>      
            
    
    
    
    
    
       
      <script>
		 
 
 
  $("#btn_driver_no_show_<?=$arr[order][invoice]?>").click(function(){ 
  
 
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการยกเลิกการส่งแขก",
	type: "error",
	
		showCancelButton: true,
		confirmButtonColor: '#FF0000',
		confirmButtonText: 'ใช่',
		cancelButtonText: "ไม่ใช่",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
 
 var url_<?=$arr[order][invoice]?> = "popup.php?name=booking/load/form&file=savedata&op=cancel&type=no_show&id=<?=$arr[order][invoice]?>";
  
  $('#action_status_<?=$arr[order][invoice]?>').load(url_<?=$arr[order][invoice]?>);
  
  
  
  
  
    
   
	//  alert('dd');
    } else {
  //    swal("Cancelled", "", "error");
  
 
  
    }
	
	
	
 
	
	
	});
	   
  
 
  
  
  
 

		 });
		 
 

		 
		 
		 </script>      
            
    
 