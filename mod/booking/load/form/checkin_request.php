
 <?  include ("mod/booking/load/form/checkin/photo/upload_checkin_request_pic.php");?>
   
 
    <?
$arr[project][id]=$_GET[id];
	
	
 if($_GET[type]=='driver_topoint'){		
 $type='ถึงสถานที่ส่งแขก';		
 $icon = 'icon-new-uniF12D-1';
 $action = 'check_driver_topoint';
 $txt_photo = 'ถ่ายภาพสถานที่ส่งแขก';
 }
 else if($_GET[type]=='guest_receive'){		
 $type='พนักงานรับแขก';
 $icon = 'icon-new-uniF159-5';	
  $action = 'check_guest_receive';
   $txt_photo = 'ถ่ายภาพพนักงานรับแขก';
 } 
 else if($_GET[type]=='guest_register'){		
 $type='แขกลงทะเบียน';	
 $icon = 'icon-new-uniF116-6';	
  $action = 'check_guest_register';
    $txt_photo = 'ถ่ายภาพแขกลงทะเบียน';
 } 
 else if($_GET[type]=='driver_pay_report'){		
 $type='แจ้งยอดรายได้';		
 $icon = 'icon-new-uniF121-10';
  $action = 'check_driver_pay_report';
  $txt_photo = 'ถ่ายภาพแจ้งยอดรายได้';
 }

	?>
	
	
	
	
	<script>
  $(".text-topic-action-mod-3").html('<?=$type?>');
  
  </script>
  
    <script>
    	
  $('#btn_close_checkin_popup').click(function(){   
  // $( "#main_load_mod_popup_3" ).toggle();
 $('#load_money').html('');
    
    var load_money = "go.php?name=load/pay&file=index_transfer";
    
      $('#load_money').load(load_money);
	
  	});
	  </script>
      
      
      
      
  <script>
	///
	
 $('#btn_checkin_popup_<?=$_GET[id]?>').click(function(){   
  // $( "#main_load_mod_popup_3" ).toggle();
  var lat = $('#lat').val();
  var lng = $('#lng').val();
  var time = $('#time').val();
  var amount = $('#amount').val();
  var bank = $('#bank').val();
  var b_acount = $('#b_acount').val();
  var b_number = $('#b_number').val();
  var b_bank = $('#b_bank').val();
  console.log(time)
  console.log(amount)
  console.log(bank)
  console.log(date)
   $.ajax({
            type: 'POST',
            url: 'mod/booking/load/form/savedata_request.php',
            data: {'bank_name':b_acount,'bank_number':b_number,'time':time,'amount':amount,'bank':b_bank,'driver':'<?=$_COOKIE["app_remember_user"];?>','action':'money_request','date':date },
            //contentType: "application/json",
            //dataType: 'json',
            success: function(data) {
                console.log(data)
                  alert('รอยืนยันการตรวจสอบการโอนเงิน')
                  $('#main_load_mod_popup').toggle();
                   $('#main_load_mod_popup').show(500);
   var url_load= "load_page_mod.php?name=pay&file=money_transfer"
//    var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
    
    
    $('#load_mod_popup').html(load_main_mod);
   
    $('#load_mod_popup').load(url_load); 
               }
             });
  
//   var url_<?=$arr[project][id]?> = "popup.php?name=booking/load/form&file=savedata_request&action=money_request&type=<?=$_GET[type]?>&id=<?=$arr[project][id]?>&date="+date+"&time="+time;
  
//   console.log(url_<?=$arr[project][id]?>);
// //  return;

//  $(this).load(url_<?=$arr[project][id]?>);
 
 

  	});

  </script>

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="5">
  <tbody>
    
    <tr>
      <td align="center" class="font-26">
        <div class="<?= $coldata?>">
 
 <div class="" style="border-radius: 15px;
    background: #f1f1f1;
    padding: 8px 0;
}">
  <center>
 
<!--<i class="icon-new-uniF197-2 take-photo-icon"  id="icon_camera_checkin"></i><br>-->



<table width="100%" border="0" cellspacing="2" cellpadding="2" >
 
    <tr>
      <!-- <td width="10" class="font_20"></td> -->
      <td width="100">
        <label class="input-group-btn" > <span class="btn btn-primary" style="width:100px; z-index:0" id="icon_camera_checkin"> <i class="fa  fa-camera"></i>&nbsp;<?echo t_take_photos?>
          <!--<input type="text" class="form-control" name="icon_camera_<?=$i?>" id="icon_camera_<?=$i?>"   style="display: none;"/>-->
        </span></label></td>
      <td><span class="input-group" style="margin-top:5px;">
        <input type="text"  value="<?echo t_no_photo_available?>" class="photo-no-active" readonly  style="padding-left:5px; margin-top:-5px; padding-right:0px; width:100%; height:35px;" id="url_photo">
      </span></td>
      <td width="30">        
      
      <button type="button" class="btn btn-default " data-toggle="modal"   style="padding-left:5px; padding-right:5px; width:30px" id="del_photo"><i class="fa  fa-trash" style="font-size:20px; "></i></button>
 
      
      </td>
    </tr>
  
</table>

<div style="padding:5px;">

<div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_<?=$_GET[type]?>" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
 
    </div>
 
 
 
 

 <img id="image_<?=$_GET[type]?>" name="image_<?=$_GET[type]?>"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>
 
 
  
    </div></td>
    </tr>
    <tr>
      <td align="center"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
          <tr>
            <td width="50%"><button  id="btn_close_checkin_popup"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:8px; background-color:#FF0000;  border-radius: 20px; border:none "><span class="font-30"><center><? echo t_cancel?></button></td>
            <td width="50%"><button  id="btn_checkin_popup_<?=$_GET[id]?>"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:8px; background-color:<?=$main_color?>;  border-radius: 20px; border:none "><span class="font-30"><center><? echo t_send?></button></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>



   <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true" onkeypress="PasswordEnter(this,event)"   value="" />

 
 <script>
 
  
  /////////  id driving
 $("#icon_camera_checkin").click(function(){  
 
  document.getElementById('upload_pic_type').value='<?=$_GET[type]?>';
 
  $("#load_chat_camera").click(); 
  
  });
  
  $('#del_photo').click(function(){
  	
  	$.post( "go.php?name=booking/load/form/checkin/photo&file=upload_request_pic&action=del&code=<?=$_GET[id]?>&type=<?=$_GET[type]?>", function( data ) {
	  		$('#image_<?=$_GET[type]?>').attr('src','');
	  		$('#image_<?=$_GET[type]?>').hide();
	  		$('#area_image_album_load_driver_topoint').css('width','0%');
	  		$('#icon_camera_checkin').removeClass('btn-success');
	  		$('#icon_camera_checkin').addClass('btn-primary');
	  		$('#del_photo').removeClass('btn-danger');
	  		$('#del_photo').addClass('btn-default');
	  		
	  		$('#url_photo').val('ไม่มีภาพถ่าย');
	  		
	  		$('#photo_<?=$_GET[type]?>_<?=$_GET[id]?>').css('color','#3b59987a');
			$('#photo_<?=$_GET[type]?>_<?=$_GET[id]?>').css('border','1px solid #3b59987a');
	});
  	
  });
   
  </script>


