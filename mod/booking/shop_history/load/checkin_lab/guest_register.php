

<table width="100%" border="0" cellspacing="2" cellpadding="0" class="div-all-checkin " id="box_guest_register">
   <tbody>
      <tr>
         <td width="60" rowspan="2">
            <div class="step-booking"  id="number_guest_register">3</div>
            <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_guest_register"    /></div>
         </td>
         <td colspan="2"><button  id="btn_guest_register"  type="button" class="btns  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color;?>;  border-radius: 20px; border:none "><span class="font-26 text-cap"><i class="icon-new-uniF116-6" style="width:10px;"  ></i><?=t_guest_registration;?></span></button></td>
      </tr>
      <tr>
         <td style="height:30px;">
            <div  id="status_guest_register" ><div class="font-20"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=t_pending;?></font></strong></div></div>
            <input type="hidden" value="<?=$arr[book][check_guest_register];?>" id="guest_register_check_click"/>
         </td>
         <td  width="30">
           <!-- <i  id="photo_guest_register" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  "  onclick="ViewPhoto('<?=$arr[book][id];?>','guest_register','<?=$arr[book][guest_register_date]?>');" ></i>-->
            
             <i id="photo_guest_register_no" class="fa fa-camera" style="color:#3b59987a; font-size:16px; border-radius: 50%; padding:5px; border: 1px solid #3b59987a;display: none;" ></i>
             <i id="photo_guest_register_yes" class="fa fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px;display: nones; border: solid 2px <?=$main_color?>  " onclick="ViewPhoto('<?=$arr[book][id];?>','guest_register','<?=$arr[book][guest_register_date]?>');"></i>
   
         </td>
      </tr>
   </tbody>
</table>

<!--<?php 
   if(file_exists("../data/fileupload/store/guest_register_".$arr[book][id].".jpg")==0){ ?>
<script>
   $('#photo_guest_register').css('color','#3b59987a');
   $('#photo_guest_register').css('border','1px solid #3b59987a');
   $('#photo_guest_register').attr('onclick',' ');
</script>
<? }
   ?>-->
<script>

/*$.ajax({
			url: '../data/fileupload/store/guest_register_<?=$arr[book][id];?>.jpg',
			type:'HEAD',
			error: function()
			{
			console.log('Error file');
		
			   $('#photo_guest_register_no').show();
			   $('#photo_guest_register_yes').hide();
//			   alert(type)
			},
			success: function()
			{
				//file exists

			   $('#photo_guest_register_no').hide();
			   $('#photo_guest_register_yes').show();
			}
		});*/
   $("#btn_guest_register").click(function(){ 
     if($('#guest_register_check_click').val()==0){
   /*	$( "#main_load_mod_popup_3" ).toggle();
    var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup&id=<?=$arr[book][id]?>&type=guest_register";
    $('#load_mod_popup_3').html(load_main_mod);
    $('#load_mod_popup_3').load(url_load); */
    $( "#dialog_custom" ).show();
   	var url_load= "empty_style.php?name=booking/shop_history/load&file=checkin_popup&id=<?=$arr[book][id]?>&type=guest_register";
    	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  		$('#body_dialog_custom_load').load(url_load); 
    
   }else{
   }
   });
</script>