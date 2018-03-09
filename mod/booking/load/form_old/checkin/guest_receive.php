
 
  <script>
 var url_guest_receive_<? echo $arr[project][id];?>= "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $arr[project][id];?>&type=check_guest_receive&time=<?=$arr[project][date_guest_receive]?>&status=<?=$arr[project][check_guest_receive]?>";
 $('#status_guest_receive_<?=$arr[project][id]?>').load(url_guest_receive_<? echo $arr[project][id];?>);
</script>
      <? 
    if($arr[project][check_guest_receive]==1 ){ ?>
      <script> 
 

$("#step_guest_receive_<? echo $arr[project][id];?>").show();

$("#step_guest_register_<? echo $arr[project][id];?>").show();


 
   $('#iconchk_guest_receive_<?=$arr[project][id];?>').attr("src", "images/yes.png");  
 
  $("#number_guest_receive_<?=$arr[project][id];?>").removeClass('step-booking');
  
   $("#number_guest_receive_<?=$arr[project][id];?>").addClass('step-booking-active');
   
 
       $("#box_guest_receive_<?=$arr[project][id];?>").removeClass('border-alert');
   
 ///  $("#btn_guest_receive_<?=$arr[project][id]?>").addClass('disabledbutton-checkin');
 
	  
   </script>
      <? } ?>
 
  
  <table width="100%" border="0" cellspacing="2" cellpadding="0" class="div-all-checkin border-alert" id="box_guest_receive_<?=$arr[project][id];?>">
        <tbody>
          <tr>
            <td width="60" rowspan="2"><div class="step-booking"  id="number_guest_receive_<?=$arr[project][id];?>">2</div> <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_guest_receive_<?=$arr[project][id];?>"    /></div></td>
            <td><button  id="btn_guest_receive_<?=$arr[project][id]?>"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#666666;  border-radius: 20px; border:none "><span class="font-26"><i class="icon-new-uniF159-5" style="width:10px;"  ></i> พนักงานรับแขก</button></td>
          </tr>
          <tr>
            <td style="height:30px;"><div  id="status_guest_receive_<?=$arr[project][id]?>" ></div></td>
          </tr>
        </tbody>
    </table>
    
    
    
       
            <script>
		 
 
 
  $("#btn_guest_receive_<?=$arr[project][id]?>").click(function(){ 
  
 
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าพนักงานรับแขกแล้ว",
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
	 
 
 var url_<?=$arr[project][id]?> = "popup.php?name=booking/load/form&file=savedata&action=check_guest_receive&type=guest_receive&id=<?=$arr[project][id]?>";
 
 
 
  
 $('#status_guest_receive_<?=$arr[project][id]?>').load(url_<?=$arr[project][id]?>);
 

///  $('#step_register').show();
    $("#step_guest_register_<? echo $arr[project][id];?>").show();
	
 
	
	$("#box_guest_receive_<?=$arr[project][id];?>").removeClass('border-alert');
   
	//  alert('dd');
    } else {
  //    swal("Cancelled", "", "error");
  
 
  
    }
	
	
	
 
	
	
	});
	   
  
 
  
  
  
 

		 });
		 
 

		 
		 
		 </script>      
            
    
    
    
    
    
    