<script>
   var url_driver_pickup = "mod/tbooking/load/component.php?id=<? echo $_POST[id];?>&request=check_status_checkin&type=driver_pickup&time=<?=$_POST[driver_pickup_date]?>&status=<?=$_POST[driver_pickup]?>";
   console.log(url_driver_pickup);
   $('#status_driver_pickup').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?=t_load_data;?>');
   $('#status_driver_pickup').load(url_driver_pickup);
</script>
<? 
   if($_POST[driver_pickup]==1 ){ ?>
<script> 
   $("#step_driver_complete").show();
   $("#btn_pickup_not_tr").hide();
      $('#iconchk_driver_pickup').attr("src", "images/yes.png");  
     $("#number_driver_pickup").removeClass('step-booking');
      $("#number_driver_pickup").addClass('step-booking-active');
      $("#box_driver_pickup").removeClass('border-alert');
   	   $("#btn_driver_pickup").css('background-color','#666666');
</script>
<? } ?>
<table width="100%" border="0" cellspacing="2" cellpadding="0" class="div-all-checkin border-alert" id="box_driver_pickup">
   <tbody>
      <tr>
         <td width="60" rowspan="2">
            <div class="step-booking"  id="number_driver_pickup">2</div>
            <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_driver_pickup"    /></div>
         </td>
         <td colspan="2"><table width="100%" cellpadding="0" cellspacing="0">
                  
                  <tr id="tr_btn_pickup" >
                    <td><button  id="btn_driver_pickup"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color;?>;  border-radius: 20px; border:none;text-transform: capitalize; "><span class="font-26"><i class="icon-new-uniF159-5" style="width:10px;"  ></i> <?=t_check_customer_name;?></button>
                    </td>
                  </tr>
                  
                  <tr id="btn_pickup_not_tr" >
                    <td style="padding-top:5px"><button style="text-transform: capitalize;width:100%;text-align:center;padding:5px; background-color:#ff0000;  border-radius: 20px; border:none;" class="btn  btn-info"  id="btn_pickup_not_check" ><?=t_no_guests;?></button></td>
                  </tr>
               

              </table></td>
      </tr>
      <tr>
         <td style="height:30px;">
            <div  id="status_driver_pickup" ></div>
            <input type="hidden" value="<?=$_POST[driver_pickup];?>" id="driver_pickup_check_click"/>
         </td>
         <td  width="30">
            <i  id="photo_driver_pickup" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  "  onclick="ViewPhoto('<?=$_POST[idorder];?>','driver_pickup','<?=$_POST[driver_pickup_date]?>');" ></i>
         </td>
      </tr>
   </tbody>
</table>
<?php 
   if(file_exists("../data/fileupload/store/tbooking/driver_pickup_".$_POST[idorder].".jpg")==0){ ?>
<script>
   $('#photo_driver_pickup').css('color','#3b59987a');
   $('#photo_driver_pickup').css('border','1px solid #3b59987a');
   $('#photo_driver_pickup').attr('onclick',' ');
</script>
<? }
   ?>
<script>
   $("#btn_driver_pickup").click(function(){ 
     if($('#driver_pickup_check_click').val()==0){
   /*	$( "#main_load_mod_popup_3" ).toggle();
    var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup&id=<?=$_POST[id]?>&type=driver_pickup";
    $('#load_mod_popup_3').html(load_main_mod);
    $('#load_mod_popup_3').load(url_load); */
    $( "#dialog_custom" ).show();
   	var url_load= "empty_style.php?name=tbooking/load&file=checkin_popup&id=<?=$_POST[idorder]?>&type=driver_pickup";
    	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  		$('#body_dialog_custom_load').load(url_load); 
    
   }else{
   }
   });
</script>