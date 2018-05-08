<script>
   var url = "mod/tbooking/load/component.php?request=check_status_checkin&status=<?=$_POST[driver_topoint]?>&time=<?=$_POST[driver_topoint_date];?>";
   $('#status_driver_topoint').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?echo t_load_data?>');
   $('#status_driver_topoint').load(url);
</script>
<? 
   if($_POST[driver_topoint]== 1 ){ ?>
<script> 
   $("#step_driver_pickup").show();
      $('#iconchk_driver_topoint').attr("src", "images/yes.png");  
     $("#number_driver_topoint").removeClass('step-booking');
      $("#number_driver_topoint").addClass('step-booking-active');
       $("#box_driver_topoint").removeClass('border-alert');
      $("#btn_driver_topoint").css('background-color','#666666');
</script>
<? } ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0" class="div-all-checkin border-alert" id="box_driver_topoint">
   <tbody>
      <tr>
         <td width="60" rowspan="2">
            <div class="step-booking"  id="number_driver_topoint">1</div>
            <div  style="position:absolute; margin-top:-40px; margin-left: -5px;">
               <img src="images/no.png"  align="absmiddle" id="iconchk_driver_topoint"    />
            </div>
         </td>
         <td colspan="2"><button  id="btn_driver_topoint"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color?>;  border-radius: 20px; border:none "><span class="font-26 text-cap" ><i class="icon-new-uniF12D-1" style="width:10px;"  ></i> <?=t_place_of_delivery;?></span></button></td>
      </tr>
      <tr>
         <td style="height:30px;">
            <div  id="status_driver_topoint" ></div>
         </td>
         <td width="30">
            <input type="hidden" value="<?=$_POST[driver_topoint];?>" id="driver_topoint_check_click"/>
            <i id="photo_driver_topoint" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  " onclick="ViewPhoto('<?=$_POST[idorder];?>','driver_topoint','<?=$_POST[driver_topoint_date]?>');"></i>
            <input type="hidden" id="check_code" value="<?=$_POST[idorder];?>" />
         </td>
      </tr>
   </tbody>
</table>
<?php 
   if(file_exists("../data/fileupload/store/tbooking/driver_topoint_".$_POST[idorder].".jpg")==0){ ?>
<script>
   $('#photo_driver_topoint').css('color','#3b59987a');
   $('#photo_driver_topoint').css('border','1px solid #3b59987a');
   $('#photo_driver_topoint').attr('onclick',' ');
</script>
<? }?>
<script>
   $("#btn_driver_topoint").click(function(){ 
   if($('#driver_topoint_check_click').val()!=1){
    $( "#dialog_custom" ).show();
//   	var url_load= "load_page_mod_3.php?name=booking/shop_history/load&file=checkin_popup&id=<?=$_POST[id]?>&type=driver_topoint";
   	var url_load= "empty_style.php?name=tbooking/load&file=checkin_popup&id=<?=$_POST[idorder]?>&type=driver_topoint";
   	console.log(url_load);
//   	$('#body_dialog_custom_load').html(load_main_mod);
   	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  	$('#body_dialog_custom_load').load(url_load); 
   }
   else{
   }
   	 });
</script>