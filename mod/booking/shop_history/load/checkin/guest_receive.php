<script>
   var url_guest_receive = "mod/booking/shop_history/load/component_shop.php?id=<? echo $arr[book][id];?>&request=check_status_checkin&type=check_guest_receive&time=<?=$arr[book][guest_receive_date]?>&status=<?=$arr[book][check_guest_receive]?>";
   $('#status_guest_receive').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?echo t_load_data?>');
   $('#status_guest_receive').load(url_guest_receive);
</script>
<? 
   if($arr[book][check_guest_receive]==1 ){ ?>
<script> 
   $("#step_guest_register").show();
   $("#step_guest_receive").show();
      $('#iconchk_guest_receive').attr("src", "images/yes.png");  
     $("#number_guest_receive").removeClass('step-booking');
      $("#number_guest_receive").addClass('step-booking-active');
     $("#box_guest_receive").removeClass('border-alert');
      $("#btn_guest_receive").css('background-color','#666666');
</script>
<? } ?>
<div class="div-all-checkin">
   <table width="100%" border="0" cellspacing="2" cellpadding="0" class="div-all-checkin border-alert" id="box_guest_receive">
      <tbody>
         <tr>
            <td width="60" rowspan="2" >
               <div class="step-booking"  id="number_guest_receive">2</div>
               <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_guest_receive" /></div>
            </td>
            <td colspan="2">
               <button  id="btn_guest_receive"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color;?>;  border-radius: 20px; border:none "><span class="font-26 text-cap"><i class="icon-new-uniF159-5" style="width:10px;"  ></i> <?=t_reception;?></span></button>
               <input type="hidden" value="<?=$arr[book][check_guest_receive];?>" id="guest_receive_check_click"/>
            </td>
         </tr>
         <tr>
            <td style="height:30px;">
               <div  id="status_guest_receive" ></div>
            </td>
            <td  width="30">
               <i  id="photo_guest_receive" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  "  onclick="ViewPhoto('<?=$arr[book][id];?>','guest_receive','<?=$arr[book][guest_receive_date]?>');"></i>
            </td>
         </tr>
      </tbody>
   </table>
</div>
<?php 
   if(file_exists("../data/fileupload/store/guest_receive_".$arr[book][id].".jpg")==0){ ?>
<script>
   $('#photo_guest_receive').css('color','#3b59987a');
   $('#photo_guest_receive').css('border','1px solid #3b59987a');
   $('#photo_guest_receive').attr('onclick',' ');
</script>
<? }
   ?>
<script>
   $("#btn_guest_receive").click(function(){ 
    if($('#guest_receive_check_click').val()==0){
    	$( "#dialog_custom" ).show();
//   	 var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup&id=<?=$arr[book][id]?>&type=guest_receive";
   	var url_load= "empty_style.php?name=booking/shop_history/load&file=checkin_popup&id=<?=$arr[book][id]?>&type=guest_receive";
    	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  		$('#body_dialog_custom_load').load(url_load); 
    }else{
    }
   });
</script>