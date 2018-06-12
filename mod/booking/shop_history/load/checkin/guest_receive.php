
<div class="">
   <table width="100%" border="0" cellspacing="2" cellpadding="0" class="div-all-checkin" id="box_guest_receive">
      <tbody>
         <tr>
            <td width="60" rowspan="2" >
               <div class="step-booking"  id="number_guest_receive">2</div>
               <div  style="position:absolute; margin-top:-40px; margin-left: -5px;"><img src="images/no.png"  align="absmiddle" id="iconchk_guest_receive" /></div>
            </td>
            <td colspan="2">
               <button  id="" onclick="btn_guest_receive()" type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:<?=$main_color;?>;  border-radius: 20px; border:none "><span class="font-26 text-cap"><i class="icon-new-uniF159-5" style="width:10px;"  ></i> <?=t_reception;?></span></button>
               <input type="hidden" value="<?=$arr[book][check_guest_receive];?>" id="guest_receive_check_click"/>
            </td>
         </tr>
         <tr>
            <td style="height:30px;">
               <div  id="" onclick="status_guest_receive()"><div class="font-20"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=t_pending;?></font></strong></div></div>
            </td>
            <td  width="30">
            <i id="photo_guest_receive_no" class="fa fa-camera" style="color:#3b59987a; font-size:16px; border-radius: 50%; padding:5px; border: 1px solid #3b59987a;display: none;" ></i>
             <i id="photo_guest_receive_yes" class="fa fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px;display: none; border: solid 2px <?=$main_color?>  " onclick="ViewPhoto('<?=$arr[book][id];?>','guest_receive','<?=$arr[book][guest_receive_date]?>');"></i>
            </td>
         </tr>
      </tbody>
   </table>
</div>

<script>
//var type = "guest_receive";
$.ajax({
			url: '../data/fileupload/store/guest_receive_<?=$arr[book][id];?>.jpg',
			type:'HEAD',
			error: function()
			{
			console.log('Error file');
			   /*$('#photo_guest_receive').css('color','#3b59987a');
			   $('#photo_guest_receive').css('border','1px solid #3b59987a');
			   $('#photo_guest_receive').attr('onclick',' ');*/
			   $('#photo_guest_receive_no').show();
			   $('#photo_guest_receive_yes').hide();
//			   alert(type)
			},
			success: function()
			{
				//file exists
				/*console.log('success file');
				$('#photo_guest_receive').css('color','#3b5998');
				$('#photo_guest_receive').css('border','2px solid #3b5998');
				$('#photo_guest_receive').attr('onclick','ViewPhoto("'+id+'","photo_guest_receive","<?=TIMESTAMP;?>");');*/
				$('#photo_guest_receive_no').hide();
			   $('#photo_guest_receive_yes').show();
			}
		});
   function btn_guest_receive(){ 
   	var check = $('#guest_receive_check_click').val();
   	if(check==0){
		swal('พนักงานยังไม่รับแขก');
	}else{
		swal('ยืนยันแล้ว','พนักงานรับแขกแล้ว','success');
	}
   
   /* if($('#guest_receive_check_click').val()==0){
    	$( "#dialog_custom" ).show();
//   	 var url_load= "load_page_mod_3.php?name=booking/load/form&file=checkin_popup&id=<?=$arr[book][id]?>&type=guest_receive";
   	var url_load= "empty_style.php?name=booking/shop_history/load&file=checkin_popup&id=<?=$arr[book][id]?>&type=guest_receive";
    	$('#body_dialog_custom_load').html("<br/><br/><br/><br/>");
  		$('#body_dialog_custom_load').load(url_load); 
    }
	else{
    }*/
   }
</script>