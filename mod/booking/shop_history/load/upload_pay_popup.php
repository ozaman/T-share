 <?  include ("mod/booking/shop_history/load/price/photo/upload_pay_pic.php");?>
    <?
$arr[project][id]=$_GET[id];
	function checkTypePay($id){
      if($id==1){
      		$name_type = t_parking_fee." + ".t_person_fee;
      }
      else if($id==2){
      		$name_type = t_parking_fee." + ".t_com_fee;
      }
      else if($id==3){
      		$name_type = t_person_fee." + ".t_com_fee;
      } 
      else if($id==4){
      		$name_type = t_parking_fee." + ".t_person_fee." + ".t_com_fee;
      }
      else if($id==5){
      		$name_type = t_parking_fee;
      }
      else if($id==6){
      		$name_type = t_person_fee;
      }
      else if($id==7){
      		$name_type = t_com_fee;
      }
      return $name_type;
 }

	if($_GET[check_confirm]>0){
		$text_titel = 'คุณได้ทำการยืนยันการจ่ายเงินแล้ว';
		$none_btn_confirm = 'display:none;';
//		$title = ""
	}else{
		$text_titel = 'ยืนยันการจ่ายเงิน';
		$none_btn_confirm = '';
	}
	?>	
	<script>
  $(".text-topic-action-mod-3").html('เอกสารจ่ายเงิน');
  </script>
    <script>
  $('#btn_close_upload_pay_popup').click(function(){ 
  $('.button-close-popup-mod-3').click();
//    $('#dialog_custom').hide();
//	$('#main_load_mod_popup_clean').hide();
//  	$( "#main_load_mod_popup_3" ).toggle();
// 	$( "#load_mod_popup_3" ).html('');
 
  	});
	  </script>
<input type="hidden" id="check_open_popup3" value="1" />	  
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="5" style="margin-top: 10px;">
  <tbody>
  	<tr>
      <td align="center"><i class="<?=$icon;?>" style=" font-size:60px; color:<?=$main_color?>"  ></i></td>
    </tr>
  	<tr>
  		<td align="center" class="font-26"><strong><?=$text_titel;?></strong></td>
  	</tr>
  	<tr>
  		<td align="center" class="font-26"><?=checkTypePay($_GET[plan]);?></td>
  	</tr>
    <tr>
      <td align="center" class="font-26"><div class="<?= $coldata?>">
 <div class="take_photo" ><center>
<?=$txt_photo;?>
<table width="100%" border="0" cellspacing="2" cellpadding="2" >
  <tbody>
    <tr>
      <td width="10" class="font_20"></td>
      <td width="100">
        <label class="input-group-btn" > <span class="btn btn-primary" style="width:100px; z-index:0" id="icon_camera_upload_pay"> <i class="fa  fa-camera"></i>&nbsp;<?echo t_take_photos?>
        </span></label></td>
      <td><span class="input-group" style="margin-top:5px;">
        <input type="text"  value="<?echo t_no_photo_available?>" class="photo-no-active" readonly  style="padding-left:5px; margin-top:-5px; padding-right:0px; width:100%; height:35px;" id="url_photo">
      </span></td>
      <td width="30">        
      <button type="button" class="btn btn-default " data-toggle="modal"   style="padding-left:5px; padding-right:5px; width:30px" id="del_photo"><i class="fa  fa-trash" style="font-size:20px; "></i></button>
      </td>
    </tr>
  </tbody>
</table>
<div style="padding:5px;">
<div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_<?=$_GET[plan]?>" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
    </div>
 <img src="" id="image_<?=$_GET[plan]?>" name="image_<?=$_GET[plan]?>"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />
</div>
    </div></td>
    </tr>
    <tr>
      <td align="center"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
          <tr>
           <td align="center">
           <button  id="btn_close_upload_pay_popup"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#FF0000;  border-radius: 20px; border:none "><span class="font-28"><center>ปิด</center></span></button>
           </td>
           <td align="center" style="<?=$none_btn_confirm;?>">
          <button onclick="ApporvePayAdmin('<?=$_GET[id]?>','<?=$_GET[invoice];?>','<?=$_GET[price];?>','<?=$_GET[plan]?>','<?=$_GET[driver];?>');"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#59aa47;  border-radius: 20px; border:none; "><span class="font-28"><center>ยืนยัน</center></span></button>
          </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>
   <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true" value="<?=$_GET[plan]?>" />
   <input type="hidden" value="0" id="check_img_<?=$_GET[plan]?>"/>
 <script>

 $.ajax({
    url: '../data/fileupload/doc_pay_driver/<?=$_GET[plan]?>_<?=$_GET[id];?>.jpg',
    type:'HEAD',
    error: function()
    {
        console.log('Error file');
        $('#image_<?=$_GET[plan]?>').hide();
        $('#check_img_<?=$_GET[plan]?>_<?=$_GET[id];?>').val(0);
    },
    success: function()
    {
        //file exists
        console.log('have file');
       $('#image_<?=$_GET[plan]?>').attr('src','../data/fileupload/doc_pay_driver/<?=$_GET[plan]?>_<?=$_GET[id];?>.jpg');
       $('#url_photo').val('มีภาพถ่ายแล้ว');
       $('#icon_camera_upload_pay').removeClass('btn-primary');
       $('#icon_camera_upload_pay').addClass('btn-success');
       $('#del_photo').removeClass('btn-default');
       $('#del_photo').addClass('btn-danger');
       $('#check_img_<?=$_GET[plan]?>').val(1);
       $('#show_<?=$_GET[plan]?>_his_<?=$_GET[id];?>').show();
    }
	});
  /////////  id driving
 $("#icon_camera_upload_pay").click(function(){  
  document.getElementById('upload_pic_type').value='<?=$_GET[plan]?>';
  $("#load_chat_camera").click(); 
  });
  $('#del_photo').click(function(){
  	$.post( "go.php?name=booking/load/form/price/photo&file=upload_pic&action=del&code=<?=$_GET[id]?>&type=<?=$_GET[plan]?>", function( data ) {
  			 $.ajax({
			    url: '../data/fileupload/doc_pay_driver/<?=$_GET[plan]?>_<?=$_GET[id];?>.jpg',
			    type:'HEAD',
			    error: function()
			    {
			        console.log('Error file');
			        $('#image_<?=$_GET[plan]?>').attr('src','');
			  		$('#image_<?=$_GET[plan]?>').hide();
			  		$('#area_image_album_load_park').css('width','0%');
			  		$('#icon_camera_upload_pay').removeClass('btn-success');
			  		$('#icon_camera_upload_pay').addClass('btn-primary');
			  		$('#del_photo').removeClass('btn-danger');
			  		$('#del_photo').addClass('btn-default');
			  		$('#url_photo').val('<? echo t_no_photo_available?>');
			  		$('#photo_<?=$_GET[plan]?>_<?=$_GET[id]?>').css('color','#3b59987a');
					$('#photo_<?=$_GET[plan]?>_<?=$_GET[id]?>').css('border','1px solid #3b59987a');
					$('#btn_<?=$_GET[plan]?>_doc_<?=$_GET[id]?>').css('border','none');
					$('#iconchk_<?=$_GET[plan]?>_<?=$_GET[id]?>').hide();
			    },
			    success: function()
			    {
			        console.log('Success file');
			    }
			});
	});
  });
  </script>