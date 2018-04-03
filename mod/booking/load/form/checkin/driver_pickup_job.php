  <script>
 var url_guest_receive_<?=$arr[order][invoice]?>= "popup.php?name=booking/load/form&file=checkin_status_job&id=<? echo $arr[order][invoice];?>&type=check_guest_receive&time=<?=$arr[order][driver_pickup_date]?>&status=<?=$arr[order][driver_pickup]?>";
 
 $('#status_guest_receive_<?=$arr[order][invoice]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?echo t_load_data?>');
 $('#status_guest_receive_<?=$arr[order][invoice]?>').load(url_guest_receive_<? echo $arr[order][invoice];?>);
</script>
      <? 
    if($arr[order][driver_pickup]==1 || $arr[order][driver_pickup]==2){ ?>
      <script> 
 
$("#step_guest_register_<?=$arr[order][invoice]?>").show();
$("#step_guest_receive_<?=$arr[order][invoice]?>").show();

   $('#iconchk_guest_receive_<?=$arr[order][invoice]?>').attr("src", "images/yes.png");  
 
  $("#number_guest_receive_<?=$arr[order][invoice]?>").removeClass('step-booking');
  
   $("#number_guest_receive_<?=$arr[order][invoice]?>").addClass('step-booking-active');
   
 
  $("#box_guest_receive_<?=$arr[order][invoice]?>").removeClass('border-alert');
   
   $("#btn_guest_receive_<?=$arr[order][invoice]?>").css('background-color','#666666');
 ///  $("#btn_guest_receive_<?=$arr[order][invoice]?>").addClass('disabledbutton-checkin');
 
	  
   </script>
      <? } ?>
 
  <div class="div-all-checkin">
  <table width="100%" border="0" cellspacing="2" cellpadding="0" class="div-all-checkin border-alert" id="box_guest_receive_<?=$arr[order][invoice]?>" style="padding: 8px;
    background-color: #FAFAFA;
    border-radius: 14px;
    margin-bottom: 8px;">
        <tbody>
          <tr>
            <td width="60" rowspan="2" ><div class="step-booking"  id="number_guest_receive_<?=$arr[order][invoice]?>">2</div> <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_guest_receive_<?=$arr[order][invoice]?>"    /></div></td>
            <td colspan="2">
              <table width="100%" cellpadding="0" cellspacing="0">
                  
                  <tr id="tr_btn_pickup1201493" style="display: nonea 1  ">
                    <td><button  id="btn_guest_receive_<?=$arr[order][invoice]?>"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color;?>;  border-radius: 20px; border:none "><span class="font-26"><i class="icon-new-uniF159-5" style="width:10px;"  ></i> เช็คชื่อแขก</button>
                    </td>
                  </tr>
                  
                  <tr id="btn_pickup<?=$arr[order][invoice]?>" style="display: nonea">
                    <td style="padding-top:5px"><button style="color: #fffbfb;" class="btnstatus-checkin-red"  id="btn_pickup_not_check_<?=$arr[order][invoice]?>" >ไม่เจอแขก</button></td>
                  </tr>
               

              </table>
            
            <input type="hidden" value="<?=$arr[order][driver_pickup]?>" id="guest_receive_check_click"/>

            </td>
          </tr>
          <tr>
            <td style="height:30px;"><div  id="status_guest_receive_<?=$arr[order][invoice]?>" ></div></td>
            <td  width="30">
            	<i  id="photo_guest_receive_<?=$arr[order][invoice]?>" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  "  onclick="ViewPhoto('<?=$arr[order][invoice]?>','guest_receive','<?=$arr[order][driver_pickup_date]?>');"></i>
            </td>
          </tr>
        </tbody>
    </table>
    </div>
    <?php 
  	if(file_exists("../data/fileupload/store/guest_receive_".$arr[order][invoice].".jpg")==0){ ?>
		<script>
			$('#photo_guest_receive_<?=$arr[order][invoice]?>').css('color','#3b59987a');
			$('#photo_guest_receive_<?=$arr[order][invoice]?>').css('border','1px solid #3b59987a');
			$('#photo_guest_receive_<?=$arr[order][invoice]?>').attr('onclick',' ');
		</script>
	<? }
  	?>
    
       
    <script>
		 
  $("#btn_guest_receive_<?=$arr[order][invoice]?>").click(function(){ 
	  if($('#guest_receive_check_click').val()==0){
	  	$( "#main_load_mod_popup_3" ).toggle();
	 
	 	 var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup_job&id=<?=$arr[order][invoice]?>&type=guest_receive";
	  
	  	$('#load_mod_popup_3').html(load_main_mod);
	 
	 	 $('#load_mod_popup_3').load(url_load); 
	  }else{
	  	
	  }
	  
  });
  $("#btn_pickup_not_check_<?=$arr[order][invoice]?>").click(function(){ 
    
      $( "#main_load_mod_popup_3" ).toggle();
   
     var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup_job&id=<?=$arr[order][invoice]?>&type=check_pickup_no_guest";
    
      $('#load_mod_popup_3').html(load_main_mod);
   
     $('#load_mod_popup_3').load(url_load); 
   
    
  });
 
 		 
		 </script>      
            
    
    
    
    
    
    