<style>
input[type="text"]:disabled {
    color: #000 !important;
}
</style>
<?php 


			$name_th = "ชื่อ - นามสกุล";
			$name_en = "ชื่อ - นามสกุล (อังกฤษ)";
			$nickname = "ชื่อเล่น";
			$idcard = "เลขบัตรประชาชน";
			$address = "ที่อยู่ปัจจุบัน";
			$phone = "เบอร์โทรศัพท์";
			$phone2 = "เบอร์โทรศัพท์ที่สอง (ไม่บังคับ)";
			$phone_em = "เบอร์โทรศัพท์ฉุกเฉิน";
			$province = "จังหวัดที่คุณอยู่ประจำ";
			$email = "อีเมล์";
			$plate = "เลขทะเบียนรถ";
			$card_dv = "เลขใบขับขี่";
			$txt_ex_idcard = "วันหมดอายุ";
			$txt_ex_iddriving = "วันหมดอายุ";
			$username = "ชื่อผู้ใช้งาน";
			$password = "รหัสผ่าน";
//			echo $_COOKIE['detect_username'];
//		$sql = "SELECT * FROM web_driver  WHERE id = ".$_COOKIE['detect_user']." ";
		$sql = "SELECT * FROM web_driver  WHERE id = '".$_GET[id]."' ";
	  	$query = $this->db->query($sql);
	  	$driver = $query->row();
	  	
	  	if($driver->i_gender==0){
					$ck_men = "ชาย";
				}else{
					$ck_men = "หญิง";
				}
				
				if($driver->i_gender==1){
					$ck_girl = "checked";
				}else{
					$ck_girl = "";
				}
				
		$sql = "SELECT id,name,name_th,name_cn FROM web_province WHERE id = ".$driver->province." ";
	  	$query = $this->db->query($sql);
	  	$pv = $query->row();
	  	if($pv->name_th!=""){
			$txt_pv = $pv->name_th;
		}else{
			$txt_pv = "เลือกจังหวัด";
		}		
?>

<div style="padding: 1px 0 0 0;">

    <ons-card class="card">
		<ons-list-header class="list-header"><b>ข้อมูลส่วนตัว</b></ons-list-header>
		 <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-user" class="list-item__icon ons-icon"></ons-icon><!--<span class="txt-important">*</span>-->
            </div>
            <label class="center list-item__center">
                <ons-input id="username-input" class="font-17" float="" maxlength="30" placeholder="<?=$username;?>" name="username" style="width:100%;" disabled value="<?=$driver->username;?>">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$username;?>" name="username" >
                    <span class="text-input__label">
                        <?=$username;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-key" class="list-item__icon ons-icon" style="padding-left: 0px;"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="password-input" float="" maxlength="30" placeholder="<?=$password;?>" name="password" style="width:100%;" disabled value="<?=$driver->password;?>">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$password;?>" name="password" >
                    <span class="text-input__label">
                        <?=$password;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-user" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="name-input" float="" maxlength="30" placeholder="<?=$name_th;?>" name="name_th" style="width:100%;" disabled value="<?=$driver->name;?>">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$name_th;?>" name="name_th">
                    <span class="text-input__label">
                        <?=$name;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="md-face" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="name_en-input" float="" maxlength="30" placeholder="<?=$name_en;?>"  name="name_en" style="width:100%;" disabled value="<?=$driver->name_en;?>">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$name_en;?>"  name="name_en">
                    <span class="text-input__label">
                        <?=$name_en;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="md-face" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="nickname-input" float="" maxlength="30" placeholder="<?=$nickname;?>"  name="nickname" style="width:100%;" disabled value="<?=$driver->nickname;?>">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$nickname;?>"  name="nickname">
                    <span class="text-input__label">
                        <?=$nickname;?></span>
                </ons-input>
            </label>
        </ons-list-item>
       	
        <ons-list-item class="input-items list-item p-l-0" >
        	<div class="left list-item__left" style="    padding-right: 7px;">
                 
                 <ons-icon icon="fa-venus-mars" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
           		<ons-input id="og-input" float=""    style="width:100%;" disabled value="<?=$ck_men;?>">
                    <input type="text" class="text-input" >
                    <span class="text-input__label">
                        <?=$ck_men;?></span>
                </ons-input>
           	</label>
        </ons-list-item>	
    </ons-card>
    
    <ons-card class="card">
		<ons-list-header class="list-header"><b>ข้อมูลที่อยู่</b></ons-list-header>
		<ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-home" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="address-input" float=""  placeholder="<?=$address;?>" name="address" style="width:100%;" disabled value="<?=$driver->address;?>">
                    <input type="text" class="text-input" placeholder="<?=$address;?>" name="address" id="address">
                    <span class="text-input__label">
                        <?=$address;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="padding-right: 20px;">
                <!--<ons-icon icon="fa-location-arrow" class="list-item__icon ons-icon"></ons-icon>-->
                <i class="material-icons">location_on</i>
                <span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <span id="txt_user_province" style="color: #000;margin-left: 0px;" ><?=$txt_pv;?></span>
            </label>
            
        </ons-list-item>
	</ons-card>

	<ons-card class="card">
		<ons-list-header class="list-header"><b>ข้อมูลติดต่อ</b></ons-list-header>
		<ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-phone" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="phone-input" float="" placeholder="<?=$phone;?>" name="phone" style="width:100%;" value="<?=$driver->phone;?>" disabled>
                    <input type="number" pattern="\d*" class="text-input"  placeholder="<?=$phone;?>" name="phone" id="phone" >
                    <span class="text-input__label">
                        <?=$phone;?></span>
                </ons-input>
                
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-phone" class="list-item__icon ons-icon"></ons-icon><span class="txt-important"></span>
            </div>
            <label class="center list-item__center">
                <ons-input id="phone-input" float="" placeholder="<?=$phone2;?>" name="phone2" style="width:100%;" value="<?=$driver->phone2;?>" disabled>
                    <input type="number" pattern="\d*" class="text-input"  placeholder="<?=$phone2;?>" name="phone2" id="phone2" >
                    <span class="text-input__label">
                        <?=$phone2;?></span>
                </ons-input>
             
            </label>
        </ons-list-item>

        <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left">
                <ons-icon icon="fa-phone" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <div class="center list-item__center" style="   /* margin-left: -7px;*/">
                <ons-input id="phone_em-input" float="" placeholder="<?=$phone_em;?>" name="phone_em" style="width:100%;"  maxlength="10" value="<?=$driver->phone_emergency;?>" disabled >
                    <input type="number" pattern="\d*" class="text-input" placeholder="<?=$phone_em;?>" name="phone_em" id="phone_em"  maxlength="10">
                    <span class="text-input__label">
                        <?=$phone_em;?></span>
                </ons-input>
            </div>
            
            <div class="right list-item__right">
                <ons-select name="em_person" id="em_person" style=" right: 0px;  margin-top: 0px;  width: 100%;" disabled>
						    <option>สถานะ</option>
			  <?php 
//            	 $query_em = $this->db->get('web_emergency_person');
				 $sql = "SELECT id,name_th FROM web_emergency_person  WHERE status = 1 order by i_index asc ";
	  			 $query = $this->db->query($sql);
            	 foreach($query->result() as $val){ 
            	 if($val->id==$driver->emergency_person){
				 	$select_em = "selected";
				 }else{
				 	$select_em = "";
				 }
            	 ?>
			      <option value="<?=$val->id;?>" <?=$select_em;?> ><?=$val->name_th;?></option>  	
			    <?php    }
            	?>
				</ons-select>
            </div>
        </ons-list-item>
		             
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-at" class="list-item__icon ons-icon"></ons-icon>
            </div>
            <label class="center list-item__center">
                <ons-input id="email-input" float="" placeholder="<?=$email;?>" name="email" style="width:100%;" value="<?=$driver->email;?>" disabled>
                    <input type="email" class="text-input"  placeholder="<?=$email;?>" name="email" id="email">
                    <span class="text-input__label">
                        <?=$email;?></span>
                </ons-input>
            
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <img src="assets/images/social_icon/line.png" style="width: 31px;" />
            </div>
            <label class="center list-item__center">
                <ons-input id="line-input" float="" placeholder="Line" name="line" style="width:100%;" value="<?=$driver->line_id;?>" disabled>
                    <input type="text" class="text-input"  placeholder="Line" name="line" id="line">
                    <span class="text-input__label">
                        Line</span>
                </ons-input>
              
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <img src="assets/images/social_icon/wechat.png" style="width: 31px;" />
            </div>
            <label class="center list-item__center">
                <ons-input id="wechat-input" float="" placeholder="Wechat" name="wechat" style="width:100%;" value="<?=$driver->wechat_id;?>" disabled>
                    <input type="text" class="text-input"  placeholder="Wechat" name="wechat" id="wechat">
                    <span class="text-input__label">
                        Wechat</span>
                </ons-input>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <img src="assets/images/social_icon/zello.png" style="width: 31px;" />
            </div>
            <label class="center list-item__center">
                <ons-input id="zello_id-input" float="" placeholder="Zello id" name="zello_id" style="width:100%;" value="<?=$driver->zello_id;?>" disabled>
                    <input type="text" class="text-input"  placeholder="Zello id" name="zello_id" id="zello_id">
                    <span class="text-input__label">
                        Zello id</span>
                </ons-input>
            </label>
        </ons-list-item>
	</ons-card>
    
    <ons-card class="card">
    	<ons-list-header class="list-header"><b>ภาพประจำตัว</b></ons-list-header>        
        <div align="center">
	      <div class="box-preview-img" id="box_img_profile"  style="width: 170px;height: 170px;">
	      	<img src="../data/pic/driver/small/<?=$driver->username;?>.jpg" style="max-width: 100%; height: 170px;" id="pv_profile"   />
	      </div> 
	    </div>
    </ons-card>
    
    <ons-card  class="card">
      <ons-list-header class="list-header"><b>เลขประชาชน/วันหมดอายุ</b></ons-list-header>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="   /* margin-left: -7px;*/">
                <ons-icon icon="fa-id-badge" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="idcard-input" float="" placeholder="<?=$idcard;?>" name="idcard" style="width:100%;" value="<?=$driver->idcard;?>" disabled>
                    <input type="number" pattern="\d*" class="text-input" placeholder="<?=$idcard;?>" onkeyup="checkIdCard(this.value);" name="idcard" id="idcard">
                    <span class="text-input__label">
                        <?=$idcard;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
            	<img src="assets/images/ex_card/crd.png?v=<?=time();?>" width="25px;" />
            </div>
            <div class="center list-item__center">
                 <ons-input id="idcard-input" float=""  name="ex_idcard" style="width:100%;" value="<?=$driver->idcard_finish;?>" placeholder="" disabled  >
                    <input type="date"  class="text-input"  name="ex_idcard" id="ex_idcard">
                    <span class="text-input__label">
                        </span>
                </ons-input>
            </div>
            
        </ons-list-item>
        <div align="center" style="margin: 10px;">			
	      <div class="box-preview-img" id="box_img_id_card" >
	      	<img src="assets/images/ex_card/id_card.jpg?v=<?=time();?>" class="img-preview-show" id="pv_id_card" />
	      </div> 
	    </div>
        
 	</ons-card>

   	<ons-card  class="card">
	<ons-list-header class="list-header"><b>ใบขับขี่/วันหมดอายุ</b></ons-list-header>  
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" >
                <ons-icon icon="fa-id-card-o" class="list-item__icon ons-icon"></ons-icon><span class="txt-important" style="margin-left: 35px;">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="iddriving-input" float="" placeholder="<?=$card_dv;?>" name="iddriving" style="width:100%;" value="<?=$driver->iddriving;?>" disabled>
                    <input type="text" class="text-input" placeholder="<?=$card_dv;?>"  name="iddriving" id="iddriving">
                    <span class="text-input__label">
                        </span>
                </ons-input>    
               
            </label>
        </ons-list-item>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="margin-left: 6px; padding-right: 18px;">
            	<img src="assets/images/ex_card/crd.png" width="25px;" />
            </div>
            <div class="center list-item__center">
                <ons-input id="iddriving-input" float=""  name="ex_iddriving" style="width:100%;" value="<?=$driver->iddriving_finish;?>"  disabled >
                    <input type="date"  class="text-input"  name="ex_iddriving" id="ex_iddriving">
                    <span class="text-input__label"></span>
                </ons-input>
            </div>
        </ons-list-item>
      <div align="center" style="margin: 10px;">
	      <div class="box-preview-img" id="box_img_id_driving" >
	      	<img src="assets/images/ex_card/id_driving.jpg" class="img-preview-show" id="pv_id_driving" />
	      </div>
	    </div>
	</ons-card>

</div>   
<script>
//	console.log(new Date());
//	console.log(formatDate('<?=$driver->iddriving_finish;?>'));
//	document.getElementById('ex_iddriving').value = ISO8601('<?=$driver->iddriving_finish;?>');
//	document.getElementById('ex_iddriving').value = ISO8601(new Date('<?=$driver->iddriving_finish;?>'));
	var finish = '<?=$driver->iddriving_finish;?>';
	var res = finish.split("-");
//	console.log(res);
//	console.log(ISO8601(new Date(res[0],res[1],res[2])));
	document.getElementById('ex_iddriving').value = ISO8601(new Date(res[0],res[1],res[2]));
	
	var idcard = '<?=$driver->iddriving_finish;?>';
	var res_idcard = idcard.split("-");
	document.getElementById('ex_idcard').value = ISO8601(new Date(res_idcard[0],res_idcard[1],res_idcard[2]));
	checkPicDocProfile('<?=$driver->id;?>');
</script>