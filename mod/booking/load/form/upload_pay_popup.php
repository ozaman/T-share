 <?  include ("mod/booking/load/form/price/photo/upload_pay_pic.php");?>
    <?
$arr[project][id]=$_GET[id];
	if($_GET[type]=='park'){
		$type = 'ค่าจอดรถ';
		$icon = 'icon-new-uniF10A-9';
	}
	else if($_GET[type]=='person'){
		$type = 'ค่าหัว';
		$icon = 'icon-new-uniF11E-5';
	}
	else if($_GET[type]=='com'){
		$type = 'ค่าคอมมิชชั่น';
		$icon = 'icon-new-uniF12D-13';
	}
	if($_GET[check_confirm]>0){
		$text_titel = 'แก้ไขเอกสารหรือภาพ';
		$none_btn_confirm = 'display:none;';
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
    $('#dialog_custom').hide();
		 	$('#main_load_mod_popup_clean').hide();
  $( "#main_load_mod_popup_3" ).toggle();
 $( "#load_mod_popup_3" ).html('');
 
  	});
	  </script>
<input type="hidden" id="check_open_popup3" value="1" />	  
<table width="300" border="0" align="center" cellpadding="5" cellspacing="5" style="margin-top: 10px;">
  <tbody>
  	<tr>
      <td align="center"><i class="<?=$icon;?>" style=" font-size:60px; color:<?=$main_color?>"  ></i></td>
    </tr>
  	<tr>
  		<td align="center" class="font-26"><strong><?=$text_titel;?></strong></td>
  	</tr>
  	<tr>
  		<td align="center" class="font-26"><?=$type;?></td>
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
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_<?=$_GET[type]?>" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
    </div>
 <img src="" id="image_<?=$_GET[type]?>" name="image_<?=$_GET[type]?>"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />
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
          <button onclick="ApporvePayAdmin('<?=$_GET[id]?>','<?=$_GET[invoice];?>','<?=$_GET[price];?>','<?=$_GET[type]?>');"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#59aa47;  border-radius: 20px; border:none; "><span class="font-28"><center>ยืนยัน</center></span></button>
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
   <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true" onkeypress="PasswordEnter(this,event)"   value="<?=$_GET[type]?>" />
   <input type="hidden" value="0" id="check_img_<?=$_GET[type]?>"/>
 <script>
 $('.button-close-popup-mod-3').click(function(){
 	$('#dialog_custom').show();
	$('#main_load_mod_popup_clean').show();
 });
 $.ajax({
    url: '../data/fileupload/doc_pay_driver/<?=$_GET[type]?>_<?=$_GET[id];?>.jpg',
    type:'HEAD',
    error: function()
    {
        console.log('Error file');
        $('#image_<?=$_GET[type]?>').hide();
        $('#check_img_<?=$_GET[type]?>_<?=$_GET[id];?>').val(0);
    },
    success: function()
    {
        //file exists
        console.log('have file');
       $('#image_<?=$_GET[type]?>').attr('src','../data/fileupload/doc_pay_driver/<?=$_GET[type]?>_<?=$_GET[id];?>.jpg');
       $('#url_photo').val('มีภาพถ่ายแล้ว');
       $('#icon_camera_upload_pay').removeClass('btn-primary');
       $('#icon_camera_upload_pay').addClass('btn-success');
       $('#del_photo').removeClass('btn-default');
       $('#del_photo').addClass('btn-danger');
       $('#check_img_<?=$_GET[type]?>').val(1);
       $('#show_<?=$_GET[type]?>_his_<?=$_GET[id];?>').show();
    }
	});
  /////////  id driving
 $("#icon_camera_upload_pay").click(function(){  
  document.getElementById('upload_pic_type').value='<?=$_GET[type]?>';
  $("#load_chat_camera").click(); 
  });
  $('#del_photo').click(function(){
  	$.post( "go.php?name=booking/load/form/price/photo&file=upload_pic&action=del&code=<?=$_GET[id]?>&type=<?=$_GET[type]?>", function( data ) {
  			 $.ajax({
			    url: '../data/fileupload/doc_pay_driver/<?=$_GET[type]?>_<?=$_GET[id];?>.jpg',
			    type:'HEAD',
			    error: function()
			    {
			        console.log('Error file');
			        $('#image_<?=$_GET[type]?>').attr('src','');
			  		$('#image_<?=$_GET[type]?>').hide();
			  		$('#area_image_album_load_park').css('width','0%');
			  		$('#icon_camera_upload_pay').removeClass('btn-success');
			  		$('#icon_camera_upload_pay').addClass('btn-primary');
			  		$('#del_photo').removeClass('btn-danger');
			  		$('#del_photo').addClass('btn-default');
			  		$('#url_photo').val('<? echo t_no_photo_available?>');
			  		$('#photo_<?=$_GET[type]?>_<?=$_GET[id]?>').css('color','#3b59987a');
					$('#photo_<?=$_GET[type]?>_<?=$_GET[id]?>').css('border','1px solid #3b59987a');
					$('#btn_<?=$_GET[type]?>_doc_<?=$_GET[id]?>').css('border','none');
					$('#iconchk_<?=$_GET[type]?>_<?=$_GET[id]?>').hide();
			    },
			    success: function()
			    {
			        console.log('Success file');
			    }
			});
	});
  });
  </script>