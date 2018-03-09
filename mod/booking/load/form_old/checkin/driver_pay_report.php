
 
  <script>
 var url_driver_pay_report_<? echo $arr[project][id];?>= "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $arr[project][id];?>&type=check_driver_pay_report&time=<?=$arr[project][date_driver_pay_report]?>&status=<?=$arr[project][check_driver_pay_report]?>";
 $('#status_driver_pay_report_<?=$arr[project][id]?>').load(url_driver_pay_report_<? echo $arr[project][id];?>);
</script>
      <? 
    if($arr[project][check_driver_pay_report]==1 ){ ?>
      <script> 


$("#step_driver_pay_report_<? echo $arr[project][id];?>").show();

 
   $('#iconchk_driver_pay_report_<?=$arr[project][id];?>').attr("src", "images/yes.png");  
 
  $("#number_driver_pay_report_<?=$arr[project][id];?>").removeClass('step-booking');
  
   $("#number_driver_pay_report_<?=$arr[project][id];?>").addClass('step-booking-active');
   
 ///  $("#btn_driver_pay_report_<?=$arr[project][id]?>").addClass('disabledbutton-checkin');
 
	  
   </script>
      <? } ?>
 
  
  
  <div class="div-all-checkin">
  
  <table width="100%" border="0" cellspacing="2" cellpadding="0" >
        <tbody>
          <tr>
            <td width="60" rowspan="2"><div class="step-booking"  id="number_driver_pay_report_<?=$arr[project][id];?>">4</div> <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_driver_pay_report_<?=$arr[project][id];?>"    /></div></td>
            <td><button  id="btn_driver_pay_report_<?=$arr[project][id]?>"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#666666;  border-radius:  20px; border:none "><span class="font-26"><i class="icon-new-uniF121-10" style="width:10px;"  ></i> แจ้งยอดรายได้</button></td>
          </tr>
          <tr>
            <td style="height:30px;"><div  id="status_driver_pay_report_<?=$arr[project][id]?>"></div></td>
          </tr>
        </tbody>
    </table>
    
    
    
       
            <script>
		 
 
 
  $("#btn_driver_pay_report_<?=$arr[project][id]?>").click(function(){ 
  
 
  
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
	 
 
 var url_<?=$arr[project][id]?> = "popup.php?name=booking/load/form&file=savedata&action=check_driver_pay_report&type=driver_pay_report&id=<?=$arr[project][id]?>";
  
 $('#status_driver_pay_report_<?=$arr[project][id]?>').load(url_<?=$arr[project][id]?>);
 
///  $('#step_register').show();
    $("#step_guest_register_<? echo $arr[project][id];?>").show();
   
 //  alert('dd');
    } else {
  //    swal("Cancelled", "", "error");
  
 
    }
	
 
	
	
	});
	   
 
  
  
 

		 });
		 
 

		 
		 
		 </script>      
            
     <?  ///  include ("mod/booking/load/form/price.php");?>
    
    
    
    </div>
    