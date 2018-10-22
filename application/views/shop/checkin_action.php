<?php 

	$arr[project][id]=$_GET[id];
    if($_GET[type]=='driver_topoint'){		
      $type= t_place_of_delivery;		
      $icon = 'icon-new-uniF12D-1';
      $action = 'check_driver_topoint';
      $txt_photo = t_please_take_photo_drop_place;
    }
    else if($_GET[type]=='guest_receive'){		
      $type= t_reception;
      $icon = 'icon-new-uniF159-5';	
      $action = 'check_guest_receive';
      $txt_photo = t_please_take_recep_photo;
    } 
    else if($_GET[type]=='guest_register'){		
      $type= t_guest_registration;	
      $icon = 'icon-new-uniF116-6';	
      $action = 'check_guest_register';
      $txt_photo = t_please_take_guest_regis;
    } 
    else if($_GET[type]=='driver_pay_report'){		
     $type= t_income_statement;		
     $icon = 'icon-new-uniF121-10';
     $action = 'check_driver_pay_report';
     $txt_photo = t_take_photo_income_slip;
    }
    
?>
<ons-card>
	
   <table class="onlyThisTable" width="100%" border="0" align="center" cellpadding="3" cellspacing="5" style="margin-top: 0px;">
      <tr>
         <td align="center" class="font-26" style="text-align: center;"><i class="<?=$icon;?>" style=" font-size:80px; color: #3b5998;"></i></td>
      </tr>
      <tr>
         <td align="center" class="font-26" style="text-align: center;"><b>คุณแน่ใจหรือไม่ </b></td>
      </tr>
      <tr>
         <td align="center" class="font-22" style="text-align: center;"> <?=$type;?></td>
      </tr>
      <tr>
      	<td align="center"><span>กรุณาถ่ายภาพ <?=$type;?></span></td>
      </tr>
      <tr>
      	<td>
      		<div align="center" style="margin: 10px;">
			<div>
			  <!--<button class="btn-ip" type="button">เลือกภาพบัตรประจำตัวประชาชน</button>-->
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_checkin" name="img_checkin" style="opacity: 0;position: absolute;" 
			  onchange="readURLcheckIn(this,'checkin','<?=$_GET[type];?>', '<?=$_GET[id];?>');">
			</div>
			<span id="txt-img-has-checkin" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-checkin" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_checkin" onclick="performClick('img_checkin');">
	      	<img src="" class="img-preview-show" id="pv_checkin"  style="display: nones;">
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -27px;
/*    bottom: 278px;*/
	margin-top: -25px;
    border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
	    </div>
      	</td>
      </tr>
</table>
<form name="form_checkin" id="form_checkin" style="text-align: center;">
   <?php 
   if ($_GET[type]=='guest_register') {
     ?>
     <div class="form-group">
      <label class="form-label">กรุณาป้อนจำนวนแขกที่ลงทะเบียน</label>
      <div class="center list-item__center">
                  
                                    
     <input name="num_customer" id="num_cus" placeholder="ยืนยันจำนวน" oninput="maxLengthCheck(this)" type="number" pattern="\d*" maxlength="4" min="1" class="text-input form-control"  >  <?php  }   ?>
                      
                 




                  
                </div>
       
     </div>


    
  </form>
</ons-card>
<div style="margin: 20px 10px">
    <ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="sendCheckIn('<?=$_GET[id];?>','<?=$_GET[type];?>');" style="background-color: #fff;">ยืนยัน</ons-button>
</div>
<script type="text/javascript">
  setTimeout(function(){ $('#num_cus').focus(); 
}, 1000);
  
</script>
