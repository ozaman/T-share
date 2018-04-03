<?
//$arr[project][check_guest_register]=2;

?>
  <script>
 var url_guest_register_<? echo $arr[order][invoice];?>= "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $arr[order][invoice];?>&type=check_guest_register&time=<?=$arr[order][guest_topoint_date]?>&status=<?=$arr[order][guest_topoint]?>";
 
 $('#status_guest_register_<?=$arr[order][invoice]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?echo t_load_data?>');
 $('#status_guest_register_<?=$arr[order][invoice]?>').load(url_guest_register_<? echo $arr[order][invoice];?>);
</script>
      <? 
    if($arr[order][guest_topoint]==1 ){ ?>
      <script> 
 

$("#step_driver_pay_report_<?=$arr[order][invoice]?>").show();

 
 
   $('#iconchk_guest_register_<?=$arr[order][invoice]?>').attr("src", "images/yes.png");  
 
  $("#number_guest_register_<?=$arr[order][invoice]?>").removeClass('step-booking');
  
   $("#number_guest_register_<?=$arr[order][invoice]?>").addClass('step-booking-active');
   
 ///  $("#btn_guest_register_<?=$arr[order][invoice]?>").addClass('disabledbutton-checkin');
   $("#box_guest_register_<?=$arr[order][invoice]?>").removeClass('border-alert');
	  
	   $("#btn_guest_register_<?=$arr[order][invoice]?>").css('background-color','#666666');
   </script>
      <? } ?>

 
  
 
 
  
  <table width="100%" border="0" cellspacing="2" cellpadding="0" class="div-all-checkin border-alert" id="box_guest_register_<?=$arr[order][invoice]?>" style="padding: 8px;
    background-color: #FAFAFA;
    border-radius: 14px;
    margin-bottom: 8px;">
        <tbody>
          <tr>
            <td width="60" rowspan="2"><div class="step-booking"  id="number_guest_register_<?=$arr[order][invoice]?>">3</div> <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_guest_register_<?=$arr[order][invoice]?>"    /></div></td>
            <td colspan="2"><button  id="btn_guest_register_<?=$arr[order][invoice]?>"  type="button" class="btns  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color;?>;  border-radius: 20px; border:none "><span class="font-26"><i class="icon-new-uniF116-6" style="width:10px;"  ></i> งานสำเร็จ  | เช็ครถ</button></td>
          </tr>
          <tr>
            <td style="height:30px;"><div  id="status_guest_register_<?=$arr[order][invoice]?>" ></div>
            <input type="hidden" value="<?=$arr[order][guest_topoint];?>" id="guest_register_check_click"/>
            </td>
              <td  width="30">
            	<i  id="photo_guest_register_<?=$arr[order][invoice]?>" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  "  onclick="ViewPhoto('<?=$arr[order][invoice]?>','guest_register','<?=$arr[order][guest_topoint_date]?>');" ></i>
            </td>
          </tr>
        </tbody>
    </table>
  <?php 
  	if(file_exists("../data/fileupload/store/guest_register_".$arr[order][invoice].".jpg")==0){ ?>
		<script>
			$('#photo_guest_register_<?=$arr[order][invoice]?>').css('color','#3b59987a');
			$('#photo_guest_register_<?=$arr[order][invoice]?>').css('border','1px solid #3b59987a');
			$('#photo_guest_register_<?=$arr[order][invoice]?>').attr('onclick',' ');
		</script>
	<? }
  	?>
       
            <script>
 
    $("#btn_guest_register_<?=$arr[order][invoice]?>").click(function(){ 
    
      if($('#guest_register_check_click').val()==0){
    	$( "#main_load_mod_popup_3" ).toggle();
	 
	    var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup_job&id=<?=$arr[order][invoice]?>&type=guest_register";
	  
	    $('#load_mod_popup_3').html(load_main_mod);
	 
	    $('#load_mod_popup_3').load(url_load); 
	    
	    
		}else{
			
		}
    });
	 
		 
		 </script>      
            
    
    
    
    
    
    