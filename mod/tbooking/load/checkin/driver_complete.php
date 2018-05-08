<script>
   var url_driver_complete = "mod/tbooking/load/component.php?id=<? echo $_POST[id];?>&request=check_status_checkin&type=driver_complete&time=<?=$_POST[driver_complete_date]?>&status=<?=$_POST[driver_complete]?>";
   console.log(url_driver_complete);
   $('#status_driver_complete').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?echo t_load_data?>');
   $('#status_driver_complete').load(url_driver_complete);
</script>
<? 
   if($_POST[driver_complete]==1 ){ ?>
<script> 
   $("#step_driver_checkcar").show();
   $("#step_driver_complete").show();
      $('#iconchk_driver_complete').attr("src", "images/yes.png");  
     $("#number_driver_complete").removeClass('step-booking');
      $("#number_driver_complete").addClass('step-booking-active');
     $("#box_driver_complete").removeClass('border-alert');
      $("#btn_driver_complete").css('background-color','#666666');
</script>
<? } ?>
<div class="div-all-checkin">
   <table width="100%" border="0" cellspacing="2" cellpadding="0" class="div-all-checkin border-alert" id="box_driver_complete">
      <tbody>
         <tr>
            <td width="60" rowspan="2" >
               <div class="step-booking"  id="number_driver_complete">2</div>
               <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_driver_complete" /></div>
            </td>
            <td colspan="2">
               <button  id="btn_driver_complete"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color;?>;  border-radius: 20px; border:none "><span class="font-26 text-cap"><i class="icon-new-uniF159-5" style="width:10px;"  ></i> <?=t_check_vehicle;?></span></button>
               <input type="hidden" value="<?=$_POST[driver_complete];?>" id="driver_complete_check_click"/>
            </td>
         </tr>
         <tr>
            <td style="height:30px;">
               <div  id="status_driver_complete" ></div>
            </td>
            <td  width="30">
               <i  id="photo_driver_complete" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  "  onclick="ViewPhoto('<?=$_POST[id];?>','driver_complete','<?=$_POST[driver_complete_date]?>');"></i>
            </td>
         </tr>
      </tbody>
   </table>
</div>
<?php 
   if(file_exists("../data/fileupload/store/tbooking/driver_complete_".$_POST[id].".jpg")==0){ ?>
<script>
   $('#photo_driver_complete').css('color','#3b59987a');
   $('#photo_driver_complete').css('border','1px solid #3b59987a');
   $('#photo_driver_complete').attr('onclick',' ');
</script>
<? }
   ?>
<script>
   $("#btn_driver_complete").click(function(){ 
    if($('#driver_complete_check_click').val()==0){
    	$( "#dialog_custom" ).show();
//   	 var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup&id=<?=$_POST[id]?>&type=driver_complete";
   	var url_load= "empty_style.php?name=tbooking/load&file=checkin_popup&id=<?=$_POST[idorder]?>&type=driver_complete";
    	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  		$('#body_dialog_custom_load').load(url_load); 
    }else{
    }
   });
</script>