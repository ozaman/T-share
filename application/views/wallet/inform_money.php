<?php 
	$bank_user = "ธนาคารที่โอน";
	$bank_acc_number = "เลขบัญชี";
	$txt_amount = "จำนวนเงิน";
	$bank_name = "ชื่อบัญชี";
	$rand = time().generateRandomString();    	
    	function generateRandomString($length = 10) {
		    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}
?>
<ons-card class="card">
	<form name="inform_money_form" id="inform_money_form"  enctype="multipart/form-data">
	<input type="hidden" value="<?=$rand;?>" id="rand_wallet" name="rand_wallet" />
	<input type="hidden" value="<?=$_COOKIE['detect_user'];?>" name="driver" id="driver" />
	<input type="hidden" value="<?=$_COOKIE['detect_username'];?>" name="username" id="username" />
		<ons-list-header class="list-header"><b>รายละเอียดบัญชีรับโอน</b></ons-list-header>
		 <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style=" width: 90px;">
               <span>ธนาคาร</span>
            </div>
            <label class="center list-item__center">
                <ons-select name="selectbank_tr" id="selectbank_tr" style="width: 100%;" onchange="selectBankCom();" >
					<option value="">เลือกธนาคารที่จะโอน</option>
			  <?php 
				 $sql = "SELECT * FROM web_bank  WHERE status = 1";
	  			 $query = $this->db->query($sql);
            	 foreach($query->result() as $val){ 
            	 ?>
			      <option value="<?=$val->id;?>" data-acc="<?=$val->bank_number;?>"  data-name="<?=$val->bank_acount;?>" ><?=$val->bank_company;?></option>  	
			    <?php    }
            	?>
				</ons-select>
				<input type="hidden" id="deposit_bank" name="deposit_bank" value="" />
            </label>
        </ons-list-item>
        
         <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style=" width: 90px;">
                <span><?=$bank_name;?></span>
            </div>
            <label class="center list-item__center">
                <ons-input id="b_acount-input" float="" maxlength="30" placeholder="<?=$bank_name;?>" disabled name="b_acount" disabled value="">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$bank_name;?>" name="b_acount"  >
                    <span class="text-input__label">
                        <?=$bank_name;?></span>
                </ons-input>
            </label>
            <input type="hidden" id="bank_account" name="bank_account" value="" />
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style=" width: 90px;">
                <span> <?=$bank_acc_number;?></span>
            </div>
            <label class="center list-item__center">
                <ons-input id="b_number-input" float="" maxlength="30" placeholder="<?=$bank_acc_number;?>" name="b_number" disabled value="">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$bank_acc_number;?>" name="b_number"  >
                    <span class="text-input__label">
                        <?=$bank_acc_number;?></span>
                </ons-input>
            </label>
            <input type="hidden" id="bank_number" name="bank_number" value="" />
        </ons-list-item>

        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style=" width: 90px;">
                <span>วันที่โอน</span>
            </div>
            <label class="center list-item__center">
                <input class="ap-date" type="date" id="date_money" name="date_money" value="" style="width: 100%;border: none; padding: 5px; background-color: #fff; font-size: 16px;" />
                <!--<span style="color: #afafaf;font-size: 13px;position: absolute;right: 45px;"  class="font-14" >วันที่โอน</span>-->
            </label>
        </ons-list-item>
        
        <!--<ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style=" width: 90px;">
                 <span>เวลาโอน</span>
            </div>
            <label class="center list-item__center">
                <input class="ap-date" type="time" id="time_money" name="time_money" value="" style="color: #F44336;width: 100%;border: none; padding: 5px; background-color: #fff; font-size: 16px;" />
            </label>
        </ons-list-item>-->
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style=" width: 90px;" >
                 <span>จำนวนเงิน</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="amount-input" float="" maxlength="30" placeholder="<?=$txt_amount;?>" name="amount" value="" min="1">
                    <input type="number" pattern="\d*" class="text-input" maxlength="30" placeholder="<?=$txt_amount;?>" name="amount"   >
                    <span class="text-input__label">
                        <?=$txt_amount;?></span>
                </ons-input>
            </label>
        </ons-list-item>
	</form>
</ons-card>
<ons-card  class="card">
      <ons-list-header class="list-header"><b>เอกสารการโอน</b></ons-list-header>
      <div align="center" style="margin-top: 10px;">
<!--			<div >
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_slip"  style="opacity: 0;position: absolute;" onchange="readURLwallet(this,'img_slip');">
			</div>-->
			<span id="txt-img-has-img_slip" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-img_slip" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_car_2" onclick="performClick('img_slip');" style="    height: 190px;" >
	      	<img src="" class="img-preview-show" id="pv_img_slip" style="    max-height: 190px;"  /> 
	      </div> 
<!--	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -28px;
    margin-top: -25px;
    border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>-->
	  <div class="upload-btn-wrapper" >
        <button class="btn-f" type="button"><i class="fa fa-camera" aria-hidden="true"></i> อัพโหลดรูปถ่าย</button>
        <input type="file" id="img_slip" accept="image/*" onchange="readURLwallet(this,'img_slip');"/>
      </div>  
      </div>
</ons-card>  
<div style="padding: 10px; margin-bottom: 10px;">
	<ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="alertInform();" style="background-color: #fff;">แจ้งโอน</ons-button>
</div>
