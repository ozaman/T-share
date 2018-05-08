<script>
   var url_driver_checkcar = "mod/tbooking/load/component.php?id=<? echo $_POST[id];?>&request=check_status_checkin&type=driver_checkcar&time=<?=$_POST[driver_complete_date]?>&status=<?=$_POST[driver_checkcar]?>";
   $('#status_driver_checkcar').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?echo t_load_data?>');
   $('#status_driver_checkcar').load(url_driver_checkcar);
</script>
<? 
   if($_POST[driver_checkcar]==1 ){ 
   ?>
<script> 
   $("#step_driver_checkcar").show();
      $('#iconchk_driver_checkcar').attr("src", "images/yes.png");  
     $("#number_driver_checkcar").removeClass('step-booking');
      $("#number_driver_checkcar").addClass('step-booking-active');
    ///  $("#btn_driver_checkcar_<?=$_POST[id]?>").addClass('disabledbutton-checkin');
     $("#btn_driver_checkcar").css('background-color','#666666');
</script>
<? } ?>
<div class="div-all-checkin">
   <table width="100%" border="0" cellspacing="2" cellpadding="0" >
      <tbody>
         <tr>
            <td width="60" rowspan="2">
               <div class="step-booking"  id="number_driver_checkcar">4</div>
               <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_driver_checkcar"    /></div>
            </td>
            <td colspan="2"><button  id="btn_driver_checkcar" type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color;?>;  border-radius:  20px; border:none "><span class="font-26 text-cap"><i class="icon-new-uniF121-10" style="width:10px;"  ></i> <?=t_check_luggage;?></button></td>
         </tr>
         <tr>
            <input type="hidden" value="<?=$_POST[driver_checkcar];?>" id="driver_checkcar_check_click"/>
            <td style="height:30px;">
               <div  id="status_driver_checkcar"></div>
            </td>
            <td  width="30">
               <i  id="photo_driver_checkcar" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  " onclick="ViewPhoto('<?=$_POST[id];?>','driver_checkcar','<?=$_POST[driver_checkcar_date]?>');" ></i>
            </td>
         </tr>
      </tbody>
   </table>
   <?php 
      if(file_exists("../data/fileupload/store/driver_checkcar_".$_POST[id].".jpg")==0){ ?>
   <script>
      $('#photo_driver_checkcar').css('color','#3b59987a');
      $('#photo_driver_checkcar').css('border','1px solid #3b59987a');
      $('#photo_driver_checkcar').attr('onclick',' ');
   </script>
   <? } ?>
   <script>
      $("#btn_driver_checkcar").click(function(){
      	if($('#driver_checkcar_check_click').val()==0){
       		/*$( "#main_load_mod_popup_3" ).toggle();
         var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup&id=<?=$_POST[id]?>&type=driver_checkcar";
         $('#load_mod_popup_3').html(load_main_mod);
         $('#load_mod_popup_3').load(url_load);*/ 
          $( "#dialog_custom" ).show();
   	var url_load= "empty_style.php?name=tbooking/load&file=checkin_popup&id=<?=$_POST[idorder]?>&type=driver_checkcar";
    	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  		$('#body_dialog_custom_load').load(url_load); 
      }else{
      }
      });
   </script>      
   <?  ///  include ("mod/booking/load/form/price.php");?>
</div>