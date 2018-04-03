  <script>
 var url_guest_receive_<? echo $arr[project][id];?>= "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $arr[project][id];?>&type=check_guest_receive&time=<?=$arr[project][guest_receive_date]?>&status=<?=$arr[project][check_guest_receive]?>";
 
 $('#status_guest_receive_<?=$arr[project][id]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?echo t_load_data?>');
 $('#status_guest_receive_<?=$arr[project][id]?>').load(url_guest_receive_<? echo $arr[project][id];?>);
</script>
      <? 
    if($arr[project][check_guest_receive]==1 ){ ?>
      <script> 
 
$("#step_guest_register_<? echo $arr[project][id];?>").show();
$("#step_guest_receive_<? echo $arr[project][id];?>").show();

   $('#iconchk_guest_receive_<?=$arr[project][id];?>').attr("src", "images/yes.png");  
 
  $("#number_guest_receive_<?=$arr[project][id];?>").removeClass('step-booking');
  
   $("#number_guest_receive_<?=$arr[project][id];?>").addClass('step-booking-active');
   
 
  $("#box_guest_receive_<?=$arr[project][id];?>").removeClass('border-alert');
   
   $("#btn_guest_receive_<?=$arr[project][id]?>").css('background-color','#666666');
 ///  $("#btn_guest_receive_<?=$arr[project][id]?>").addClass('disabledbutton-checkin');
 
	  
   </script>
      <? } ?>
 
  <div class="div-all-checkin">
  <table width="100%" border="0" cellspacing="2" cellpadding="0" class="div-all-checkin border-alert" id="box_guest_receive_<?=$arr[project][id];?>">
        <tbody>
          <tr>
            <td width="60" rowspan="2" ><div class="step-booking"  id="number_guest_receive_<?=$arr[project][id];?>">2</div> <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_guest_receive_<?=$arr[project][id];?>"    /></div></td>
            <td colspan="2">
            <button  id="btn_guest_receive_<?=$arr[project][id]?>"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color;?>;  border-radius: 20px; border:none "><span class="font-26"><i class="icon-new-uniF159-5" style="width:10px;"  ></i> พนักงานรับแขก</button>
            <input type="hidden" value="<?=$arr[project][check_guest_receive];?>" id="guest_receive_check_click"/>
            </td>
          </tr>
          <tr>
            <td style="height:30px;"><div  id="status_guest_receive_<?=$arr[project][id]?>" ></div></td>
            <td  width="30">
            	<i  id="photo_guest_receive_<?=$arr[project][id];?>" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  "  onclick="ViewPhoto('<?=$arr[project][id];?>','guest_receive','<?=$arr[project][guest_receive_date]?>');"></i>
            </td>
          </tr>
        </tbody>
    </table>
    </div>
    <?php 
  	if(file_exists("../data/fileupload/store/guest_receive_".$arr[project][id].".jpg")==0){ ?>
		<script>
			$('#photo_guest_receive_<?=$arr[project][id]?>').css('color','#3b59987a');
			$('#photo_guest_receive_<?=$arr[project][id]?>').css('border','1px solid #3b59987a');
			$('#photo_guest_receive_<?=$arr[project][id]?>').attr('onclick',' ');
		</script>
	<? }
  	?>
    
       
    <script>
		 
  $("#btn_guest_receive_<?=$arr[project][id]?>").click(function(){ 
	  if($('#guest_receive_check_click').val()==0){
	  	$( "#main_load_mod_popup_3" ).toggle();
	 
	 	 var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup&id=<?=$arr[project][id]?>&type=guest_receive";
	  
	  	$('#load_mod_popup_3').html(load_main_mod);
	 
	 	 $('#load_mod_popup_3').load(url_load); 
	  }else{
	  	
	  }
	  
  });
 
 		 
		 </script>      
            
    
    
    
    
    
    