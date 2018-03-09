
 <?  include ("mod/booking/load/form/checkin/photo/upload_checkin_pic_job.php");?>
   
 
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
  $( "#main_load_mod_popup_3" ).toggle();
 $( "#load_mod_popup_3" ).html('');
	
  	});
	  </script>
      
      
      
      
  <script>
	///
	
 $('#btn_checkin_popup_<?=$_GET[id]?>').click(function(){   
  $( "#main_load_mod_popup_3" ).toggle();
  var lat = $('#lat').val();
  var lng = $('#lng').val();
  
  var url_<?=$_GET[id]?> = "popup.php?name=booking/load/form&file=savedata_job&action=<?=$action;?>&type=<?=$_GET[type]?>&id=<?=$_GET[id]?>&lat="+lat+"&lng="+lng;
  
  console.log(url_<?=$_GET[id]?>);
//  return;

 $(this).load(url_<?=$_GET[id]?>);
 
 
  
//$("#step_guest_receive_<? echo $arr[project][id];?>").show();


//$("#box_driver_topoint_<?=$arr[project][id];?>").removeClass('border-alert');

  	});

  </script>
  

<br>
<table width="300" border="0" align="center" cellpadding="5" cellspacing="5">
  <tbody>
    <tr>
      <td align="center" class="font-30"><i class="<?=$icon;?>" style=" font-size:80px; color:<?=$main_color?>"  ></i></td>
    </tr>
    <tr>
      <td align="center" class="font-30"><b>คุณแน่ใจหรือไม่ว่า</td>
    </tr>
    <tr>
      <td align="center" class="font-26"><?=$type?>แล้ว</td>
    </tr>
    <tr>
      <td align="center" class="font-26"><div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
 
<!--<i class="icon-new-uniF197-2 take-photo-icon"  id="icon_camera_checkin"></i><br>-->
<?=$txt_photo;?>


<table width="100%" border="0" cellspacing="2" cellpadding="2" >
  <tbody>
    <tr>
      <td width="10" class="font_20"></td>
      <td width="100">
        <label class="input-group-btn" > <span class="btn btn-primary" style="width:100px; z-index:0" id="icon_camera_checkin"> <i class="fa  fa-camera"></i>&nbsp;ถ่ายภาพ
          <!--<input type="text" class="form-control" name="icon_camera_<?=$i?>" id="icon_camera_<?=$i?>"   style="display: none;"/>-->
        </span></label></td>
      <td><span class="input-group" style="margin-top:5px;">
        <input type="text"  value="ไม่มีภาพถ่าย" class="photo-no-active" readonly  style="padding-left:5px; margin-top:-5px; padding-right:0px; width:100%; height:35px;" id="url_photo">
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
 
 
 
 

 <img
 
   <? if($_GET[ids]){ ?>

  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_car_1.jpg" 

<? }  ?>
  id="image_<?=$_GET[type]?>" name="image_<?=$_GET[type]?>"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>
 
 
  
    </div></td>
    </tr>
    <tr>
      <td align="center"><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
          <tr>
            <td width="50%"><button  id="btn_close_checkin_popup"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:8px; background-color:#FF0000;  border-radius: 20px; border:none "><span class="font-30"><center>ไม่ใช่</button></td>
            <td width="50%"><button  id="btn_checkin_popup_<?=$_GET[id]?>"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:8px; background-color:<?=$main_color?>;  border-radius: 20px; border:none "><span class="font-30"><center>ใช่</button></td>
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
  	
  	$.post( "go.php?name=booking/load/form/checkin/photo&file=upload_pic&action=del&code=<?=$_GET[id]?>&type=<?=$_GET[type]?>", function( data ) {
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


