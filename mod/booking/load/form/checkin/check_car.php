
 
  <script>
 var url_driver_pay_report_<?=$arr[order][invoice]?>= "popup.php?name=booking/load/form&file=checkin_status&id=<?=$arr[order][invoice]?>&type=check_driver_pay_report&time=<?=$arr[order][driver_check_car_date]?>&status=<?=$arr[order][driver_check_car]?>";
 
 $('#status_driver_pay_report_<?=$arr[order][invoice]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?echo t_load_data?>');
 $('#status_driver_pay_report_<?=$arr[order][invoice]?>').load(url_driver_pay_report_<?=$arr[order][invoice]?>);
</script>
      <? 
    if($arr[order][driver_check_car]==1 ){ 

    ?>
      <script> 


$("#step_driver_pay_report_<?=$arr[order][invoice]?>").show();

 
   $('#iconchk_driver_pay_report_<?=$arr[order][invoice]?>').attr("src", "images/yes.png");  
 
  $("#number_driver_pay_report_<?=$arr[order][invoice]?>").removeClass('step-booking');
  
   $("#number_driver_pay_report_<?=$arr[order][invoice]?>").addClass('step-booking-active');
   
 ///  $("#btn_driver_pay_report_<?=$arr[order][id]?>").addClass('disabledbutton-checkin');
  $("#btn_driver_pay_report_<?=$arr[order][invoice]?>").css('background-color','#666666');
	  
   </script>
      <? } ?>
 
  
  
  <div class="div-all-checkin">
  
  <table width="100%" border="0" cellspacing="2" cellpadding="0" style="padding: 8px;
    background-color: #FAFAFA;
    border-radius: 14px;">
        <tbody>
          <tr>
            <td width="60" rowspan="2"><div class="step-booking"  id="number_driver_pay_report_<?=$arr[order][invoice]?>">4</div> <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_driver_pay_report_<?=$arr[order][invoice]?>"    /></div></td>
            <td colspan="2"><button  id="btn_driver_pay_report_<?=$arr[order][invoice]?>"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color;?>;  border-radius:  20px; border:none "><span class="font-26"><i class="icon-new-uniF121-10" style="width:10px;"  ></i> ตรวจเช็คสัมภาระในรถ</button></td>
          </tr>
          <tr>
           <input type="hidden" value="<?=$arr[order][driver_check_car];?>" id="driver_pay_report_check_click"/>
            <td style="height:30px;"><div  id="status_driver_pay_report_<?=$arr[order][invoice]?>"></div></td>
            <td  width="30">
            	<i  id="photo_driver_pay_report_<?=$arr[order][invoice]?>" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  " onclick="ViewPhoto('<?=$arr[order][invoice]?>','driver_pay_report','<?=$arr[order][driver_check_car_date]?>');" ></i>
            </td>
          </tr>
        </tbody>
    </table>
    
     <?php 
  	if(file_exists("../data/fileupload/store/driver_pay_report_".$arr[order][invoice].".jpg")==0){ ?>
		<script>
			$('#photo_driver_pay_report_<?=$arr[order][invoice]?>').css('color','#3b59987a');
			$('#photo_driver_pay_report_<?=$arr[order][invoice]?>').css('border','1px solid #3b59987a');
			$('#photo_driver_pay_report_<?=$arr[order][invoice]?>').attr('onclick',' ');
		</script>
	<? } ?>
    
       
            <script>
		 
   $("#btn_driver_pay_report_<?=$arr[order][invoice]?>").click(function(){
   	
   	if($('#driver_pay_report_check_click').val()==0){
	   		$( "#main_load_mod_popup_3" ).toggle();
		 
		    var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup_job&id=<?=$arr[order][invoice]?>&type=driver_pay_report";
		  
		    $('#load_mod_popup_3').html(load_main_mod);
		 
		    $('#load_mod_popup_3').load(url_load); 
		}else{
			
		}
   });
 	 
		 </script>      
            
     <?  ///  include ("mod/booking/load/form/price.php");?>
    
    
    
    </div>
    