
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
 $type='เช็คชื่อแขก';
 $icon = 'icon-new-uniF159-5';	
  $action = 'check_guest_receive';
   $txt_photo = 'ภาพถ่ายแขก';
    mysql_query("SET NAMES utf8"); 
  mysql_query("SET character_set_results=utf-8");
    $db->connectdb(DB_NAME_BOOK,DB_USERNAME,DB_PASSWORD);
  $res[order] = $db->select_query("SELECT * FROM ap_order where invoice = '".$_GET[id]."' ");
  $arr[order] = $db->fetch($res[order]);
  $db->closedb();
 } 
 else if($_GET[type]=='guest_register'){		
 $type=' งานสำเร็จ  | เช็ครถ';	
 $icon = 'icon-new-uniF116-6';	
  $action = 'check_guest_register';
    $txt_photo = 'ภาพถ่ายสถานที่ส่งแขก';
 } 
 else if($_GET[type]=='driver_pay_report'){		
 $type='  ตรวจเช็คสัมภาระในรถ ';		
 $icon = 'icon-new-uniF121-10';
  $action = 'check_driver_pay_report';
  $txt_photo = 'ภาพถ่ายในรถ';
 }
 else if($_GET[type]=='check_pickup_no_guest'){   
 $type='  ว่าไม่เจอแขก ';    
 $icon = 'icon-new-uniF121-10';
  $action = 'check_pickup_no_guest';
  $txt_photo = 'ภาพถ่ายในรถ';
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
   var remark;
  $(document).ready(function() {
  $('#driver_remark_noguest_<?=$_GET[id]?>').on('change', function() {
         remark = this.value;
       //alert(remark)
      
    });
});
	//var remark = $('#remark_<?=$_GET[id]?>').val()
 $('#btn_checkin_popup_<?=$_GET[id]?>').click(function(){   
  $( "#main_load_mod_popup_3" ).toggle();
  var lat = $('#lat').val();
  var lng = $('#lng').val();
  var remark_orther = $('#alert_driver_remark_noguest_<?=$_GET[id]?>').val();
  console.log(remark);
  console.log(remark_orther);
   <?php if ($_GET[type]=='check_pickup_no_guest' ) {
            ?> var url_<?=$_GET[id]?> = "popup.php?name=booking/load/form&file=savedata_job&action=<?=$action;?>&type=<?=$_GET[type]?>&id=<?=$_GET[id]?>&lat="+lat+"&lng="+lng+"&remark="+remark+"&other="+remark_orther;<?php  } 
            else if ($_GET[type]!='check_pickup_no_guest'){?>
         var url_<?=$_GET[id]?> = "popup.php?name=booking/load/form&file=savedata_job&action=<?=$action;?>&type=<?=$_GET[type]?>&id=<?=$_GET[id]?>&lat="+lat+"&lng="+lng;<?php
        }?>
  // var url_<?=$_GET[id]?> = "popup.php?name=booking/load/form&file=savedata_job&action=<?=$action;?>&type=<?=$_GET[type]?>&id=<?=$_GET[id]?>&lat="+lat+"&lng="+lng;
  
  console.log(url_<?=$_GET[id]?>);
//  return;

 $(this).load(url_<?=$_GET[id]?>);
 
 
  
//$("#step_guest_receive_<? echo $arr[project][id];?>").show();


//$("#box_driver_topoint_<?=$arr[project][id];?>").removeClass('border-alert');

  	});

  </script>
  

<br>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="5">
  <tbody>
    <tr>
      <td align="center" class="font-30"><i class="<?=$icon;?>" style=" font-size:80px; color:<?=$main_color?>"  ></i></td>
    </tr>
    <tr>
      <td align="center" class="font-30"><b>คุณแน่ใจหรือไม่ว่า</td>
    </tr>
    <tr>
      <td align="center" class="font-26"><div><?=$type?>แล้ว<div>
        <div  style="color: #E91E63;
    text-align: center;
    padding: 8px;
    text-transform: capitalize;" <?php if ($_GET[type]=='guest_receive' ) {
            ?> style= "display:block"<?php  } 
            else if ($_GET[type]!='guest_receive'){?>
          style= "display:none;"<?php
        }?>><?=$arr[order][guest_english]?></div>
    </tr>
    
    <tr id="check_pickup_no_guest" <?php if ($_GET[type]=='check_pickup_no_guest' ) {
            ?> style= "display:block"<?php  } 
            else if ($_GET[type]!='check_pickup_no_guest'){?>
          style= "display:none;"<?php
        }?>>
      <td >
        <table border="0"  style="width:100%; ">
  <tr>
    <td><div class="topictransfer">สาเหตุ</div>
      <select name="driver_remark_noguest" id="driver_remark_noguest_<?=$_GET[id]?>" class="form-control tab_alert">
        <option value="0">---- กรุณาเลือกสาเหตุที่ไม่เจอแขก ----</option>
                <option value="ไม่พบแขก">     ไม่พบแขก        </option>
                <option value="เปลี่ยนสถานที่รับส่งโดยไม่แจ้ง">   เปลี่ยนสถานที่รับส่งโดยไม่แจ้ง     </option>
                <option value="ลูกค้าเปลี่ยนไฟท์บิน">    ลูกค้าเปลี่ยนไฟท์บิน     </option>
                <option value="ลูกค้าไม่อยู่โรงแรม">     ลูกค้าไม่อยู่โรงแรม     </option>
                <option value="ข้อมูลโรงแรมไม่ถูกต้อง">   ข้อมูลโรงแรมไม่ถูกต้อง  </option>
                <option value="ติดต่อลูกค้าไม่ได้">   ติดต่อลูกค้าไม่ได้    </option>
                <option value="นักท่องเที่ยวนั่งรถไปเองแล้ว"> นักท่องเที่ยวนั่งรถไปเองแล้ว  </option>
              </select>
      <!-- <select name="driver_remark_noguest" id="driver_remark_noguest_<?=$arr[project][invoice];?>"  class="form-control" >
        <option value="0">---- กรุณาเลือกสาเหตุที่ไม่เจอแขก ----</option>
        <?
  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[remark_noguest] = $db->select_query("SELECT * FROM web_driver_remark WHERE status='1' and type = '2' ");
while($arr[remark_noguest] = $db->fetch($res[remark_noguest])){
?>
        <option value="<?=$arr[remark_noguest][id];?>">
          <?=$arr[remark_noguest][topic_th];?>
        </option>
        <? } ?>
      </select> -->
      <div class="topictransfer" style="color:#FF0000; font-size:18px; display:none " id="alert_driver_remark_noguest_<?=$_GET[id]?>">กรุณาเลือกสาเหตุที่ไม่เจอแขก</div>
      <script>
    
    
//     $('#driver_remark_noguest_<?=$arr[project][invoice];?>').addClass("tab_alert");
    
// $('#driver_remark_noguest_<?=$arr[project][invoice];?>').on('change',function(){ 


 
//  if($('#driver_remark_noguest_<?=$arr[project][invoice];?>').val() > 0){
//     //alert(00);
//     $('#alert_driver_remark_noguest_<?=$arr[project][invoice];?>').hide();
// $('#driver_remark_noguest_<?=$arr[project][invoice];?>').removeClass("tab_alert");

// }

//  if($('#driver_remark_noguest_<?=$arr[project][invoice];?>').val() == 0){
//     //alert(00);
//     $('#alert_driver_remark_noguest_<?=$arr[project][invoice];?>').show();
// $('#driver_remark_noguest_<?=$arr[project][invoice];?>').addClass("tab_alert");

// }
    // });
    </script></td>
  </tr>
  <tr>
    <td><div class="topictransfer">ระบุสาเหตุอื่น ๆ </div>
      <input class="form-control"  type="text"  name="driver_remark_detail" id="driver_remark_detail_<?=$arr[project][invoice];?>"/></td>
  </tr>
</table>
      </td>
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


