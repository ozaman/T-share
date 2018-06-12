<script>
  /* var url = "mod/booking/shop_history/load/component_shop.php?request=check_status_checkin&status=<?=$arr[book][check_driver_topoint]?>&time=<?=$arr[book][driver_topoint_date];?>";
   $('#status_driver_topoint').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> <?echo t_load_data?>');
   $('#status_driver_topoint').load(url);*/
</script>

<table width="100%" border="0" cellspacing="2" cellpadding="0" class="div-all-checkin border-alert" id="box_driver_topoint">
   <tbody>
      <tr>
         <td width="60" rowspan="2">
            <div class="step-booking"  id="number_driver_topoint">1</div>
            <div  style="position:absolute; margin-top:-40px; margin-left: -5px;">
               <img src="images/no.png"  align="absmiddle" id="iconchk_driver_topoint"    />
            </div>
         </td>
         <td colspan="2"><button  id="" onclick="btn_driver_topoint()" type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color?>;  border-radius: 20px; border:none "><span class="font-26 text-cap" ><i class="icon-new-uniF12D-1" style="width:10px;"  ></i> <?=t_place_of_delivery;?></span></button></td>
      </tr>
      <tr>
         <td style="height:30px;">
            <div  id="status_driver_topoint" ><div class="font-20">
            <i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=t_pending;?></font></strong></div></div>
         </td>
         <td width="30">
            <input type="hidden" value="<?=$arr[book][check_driver_topoint];?>" id="driver_topoint_check_click"/>
            <i id="photo_driver_topoint_no" class="fa fa-camera" style="color:#3b59987a; font-size:16px; border-radius: 50%; padding:5px; border: 1px solid #3b59987a;display: none;" ></i>
             <i id="photo_driver_topoint_yes" class="fa fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px;display: none; border: solid 2px <?=$main_color?>  " onclick="ViewPhoto('<?=$arr[book][id];?>','driver_topoint','<?=$arr[book][driver_topoint_date]?>');"></i>
            <input type="hidden" id="check_code" value="<?=$arr[book][id];?>" />
         </td>
      </tr>
   </tbody>
</table>

<script>
//	var type = "driver_topoint";
	$.ajax({
			url: '../data/fileupload/store/driver_topoint_<?=$arr[book][id];?>.jpg',
			type:'HEAD',
			error: function()
			{
			console.log('Error file');
			   /*$('#photo_driver_topoint').css('color','#3b59987a');
			   $('#photo_driver_topoint').css('border','1px solid #3b59987a');
			   $('#photo_driver_topoint').attr('onclick',' ');*/
			   $('#photo_driver_topoint_yes').hide();
			   $('#photo_driver_topoint_no').show();
			},
			success: function()
			{
				//file exists
				console.log('success file');
				 $('#photo_driver_topoint_yes').show();
			   $('#photo_driver_topoint_no').hide();
				/*$('#photo_driver_topoint').css('color','#3b5998');
				$('#photo_driver_topoint').css('border','2px solid #3b5998');*/
//				$('#photo_driver_topoint').attr('onclick','ViewPhoto("'+id+'","driver_topoint","<?=TIMESTAMP;?>");');
			}
		});

 function btn_driver_topoint(){ 
   if($('#driver_topoint_check_click').val()!=1){
    $( "#dialog_custom" ).show();
//   	var url_load= "load_page_mod_3.php?name=booking/shop_history/load&file=checkin_popup&id=<?=$arr[book][id]?>&type=driver_topoint";
   	var url_load= "empty_style.php?name=booking/shop_history/load&file=checkin_popup&id=<?=$arr[book][id]?>&type=driver_topoint";
   	console.log(url_load);
//   	$('#body_dialog_custom_load').html(load_main_mod);
   	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  	$('#body_dialog_custom_load').load(url_load); 
   }
   else{
   }
   	 }
</script>