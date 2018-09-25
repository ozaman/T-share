<style>
	.list-item{
		padding-left: 14px;
	}
</style>
<?php 
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

<form name="form_addcar" id="form_addcar"  enctype="multipart/form-data">
<input type="hidden" value="<?=$rand;?>" id="rand" name="rand" />
<ons-card  class="card">
      <ons-list-header class="list-header"><b>ข้อมูลรถ</b></ons-list-header>
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left"  style="width: 110px;">
                <!--<ons-icon icon="fa-car" class="list-item__icon ons-icon"></ons-icon>-->
                <span>ป้ายทะเบียน</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="name-input" float="" maxlength="30" placeholder="" name="plate_num" style="width:100%;">
                    <input type="text" class="text-input" maxlength="30" placeholder="" name="plate_num" onkeyup="validPlate($(this).val());">
                    <span class="text-input__label">
                        ป้ายทะเบียน</span>
                </ons-input>
                <input type="hidden" value="0" id="valid_type_plate" />
                <i id="corrent-plate" class="fa fa-check-circle pass checking-plate" aria-hidden="true" style="display: none;"></i>
                <i id="incorrent-plate" class="fa fa-times-circle no-pass checking-plate" aria-hidden="true" style="display: none;"></i>
            </label>
        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left"  style="width: 110px;">
                <span>ประเภทรถ</span>
            </div>
            <div class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'ประเภทรถ', 'open':'car_type'}, 'lift-ios')">
                <span id="txt_car_type" >เลือก</span>
                <input type="hidden" name="car_type" id="car_type" />
            </div>
        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left" style="width: 110px;">
                <span>ยี่ห้อ</span>
            </div>
            <div class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'ยี่ห้อรถ', 'open':'car_brand'}, 'lift-ios')">
                
                <span class="brand-small list-item__thumbnail" id="img_car_brand_show" style="margin-right: 10px;display: none;"  ></span>
                <span id="txt_car_brand" >เลือก</span>
                <input type="hidden" name="car_brand" id="car_brand" value="" />
                <input type="hidden" name="car_brand_txt" id="car_brand_txt" value="" />
            </div>
        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left" style="width: 110px;">
                <span>สีรถ</span>
            </div>
            <div class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'สีรถ', 'open':'car_color'}, 'lift-ios')">
             	<img src="" style="width: 30px; margin-right: 15px;display: none;border: 1px solid #eee;" id="img_car_color_show"  />
                <span id="txt_car_color" >เลือก</span>
                <input type="hidden" name="car_color" id="car_color" value="" />
                <input type="hidden" name="car_color_txt" id="car_color_txt" value="" />
            </div>
        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left" style="width: 110px;">
                <span>สีป้ายทะเบียน</span>
            </div>
            <div class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'สีป้ายทะเบียน', 'open':'plate_color'}, 'lift-ios')">
            	<img src="" style="width: 50px; margin-right: 0px;display: none;" id="img_plate_color_show"  />
                <span id="txt_plate_color" >เลือก</span>
                <input type="hidden" name="plate_color" id="plate_color" />
                <input type="hidden" name="plate_color_txt" id="plate_color_txt" />
            </div>
        </ons-list-item>
        <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left" style="width: 110px;">
                <span>จังหวัด</span>
            </div>
            <div class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'จังหวัด', 'open':'car_province'}, 'lift-ios')">
            	<span id="txt_car_province" >เลือก</span>
                <input type="hidden" name="car_province" id="car_province" />
            </div>
        </ons-list-item>
 	</ons-card>

<ons-card  class="card">
      <ons-list-header class="list-header"><b>ภาพหน้ารถ</b></ons-list-header>
      <div align="center" style="margin-top: 10px;">
			<div >
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_car_1" onchange="readURL(this,'img_car_1',1,'add');"  style="opacity: 0;position: absolute;">
			</div>
			<span id="txt-img-has-img_car_1" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-img_car_1" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_car_1" onclick="performClick('img_car_1');" >
	      	<img src="" style="" class="img-preview-show" id="pv_img_car_1"  /> 
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -28px;
    margin-top: -28px;
    border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
	    </div>
</ons-card>   

<ons-card  class="card">
      <ons-list-header class="list-header"><b>ภาพข้างรถ</b></ons-list-header>
      <div align="center" style="margin-top: 10px;">
			<div >
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_car_2"  style="opacity: 0;position: absolute;" onchange="readURL(this,'img_car_2',2,'add');">
			</div>
			<span id="txt-img-has-img_car_2" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-img_car_2" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_car_2" onclick="performClick('img_car_2');" >
	      	<img src="" style="" class="img-preview-show" id="pv_img_car_2"  /> 
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -28px;
    margin-top: -28px;
    border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
	    </div>
</ons-card>  

<ons-card  class="card">
      <ons-list-header class="list-header"><b>ภาพในรถ</b></ons-list-header>
      <div align="center" style="margin-top: 10px;">
			<div >
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_car_3"  style="opacity: 0;position: absolute;" onchange="readURL(this,'img_car_3',3,'add');">
			</div>
			<span id="txt-img-has-img_car_3" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-img_car_3" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_car_3" onclick="performClick('img_car_3');" >
	      	<img src="" style="" class="img-preview-show" id="pv_img_car_3"  /> 
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -28px;
    margin-top: -28px;
    border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
	    </div>
</ons-card> 

<ons-card  class="card">
      <ons-list-header class="list-header"><b>พ.ร.บ.รถยนต์</b></ons-list-header>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left"  style="width: 70px;">
                <!--<ons-icon icon="fa-car" class="list-item__icon ons-icon"></ons-icon>-->
                <span>พ.ร.บ.</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="txt_car_act-input" float="" maxlength="30" placeholder="" name="txt_car_act" style="width:100%;">
                    <input type="text" class="text-input" maxlength="30" placeholder="" name="txt_car_act">
                    <span class="text-input__label">
                        ป้ายทะเบียน</span>
                </ons-input>
                <input type="hidden" value="0" id="valid_type_plate" />
                <i id="corrent-plate" class="fa fa-check-circle pass checking-plate" aria-hidden="true" style="display: none;"></i>
                <i id="incorrent-plate" class="fa fa-times-circle no-pass checking-plate" aria-hidden="true" style="display: none;"></i>
            </label>
        </ons-list-item>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="padding-right: 18px;width: 70px;">
            	<img src="assets/images/ex_card/crd.png" width="25px;" />
            </div>
            <div class="center list-item__center">
                <ons-input id="idcard-input" float=""  name="ex_car_act" style="width:100%;" value=""  >
                    <input type="date"  class="text-input"  name="ex_car_act" id="ex_car_act">
                    <span class="text-input__label"></span>
                </ons-input>
                <span style="color: #afafaf;  font-size: 13px;   position: absolute;  right: 0px;">วันหมดอายุ พ.ร.บ.</span>
            </div>
        </ons-list-item>
      <div align="center" style="margin-top: 10px;">
			
			<span id="txt-img-has-img_car_act" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-img_car_act" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_car_act" onclick="performClick('img_car_act');" >
	      	<img src="" style="" class="img-preview-show" id="pv_img_car_act"  /> 
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -28px;
    margin-top: -28px;
    border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
	    </div>
</ons-card> 

	    <!--------*****************************************************************************************************************************************--->
	    
<ons-card class="card"> 
	    <ons-list-header class="list-header"><b>ทะเบียนภาษี</b></ons-list-header>
	    <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left"  style="width: 70px;">
                <!--<ons-icon icon="fa-car" class="list-item__icon ons-icon"></ons-icon>-->
                <span>ทะเบียน</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="txt_car_tax-input" float="" maxlength="30" placeholder="" name="txt_car_tax" style="width:100%;">
                    <input type="text" class="text-input" maxlength="30" placeholder="" name="txt_car_tax" onkeyup="validPlate($(this).val());">
                    <span class="text-input__label">
                        ป้ายทะเบียน</span>
                </ons-input>
                <input type="hidden" value="0" id="valid_type_plate" />
                <i id="corrent-plate" class="fa fa-check-circle pass checking-plate" aria-hidden="true" style="display: none;"></i>
                <i id="incorrent-plate" class="fa fa-times-circle no-pass checking-plate" aria-hidden="true" style="display: none;"></i>
            </label>
        </ons-list-item>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="padding-right: 18px;width: 70px;">
            	<img src="assets/images/ex_card/crd.png" width="25px;" />
            </div>
            <div class="center list-item__center">
                <ons-input id="idcard-input" float=""  name="ex_car_tax" style="width:100%;" value=""  >
                    <input type="date"  class="text-input"  name="ex_car_tax" id="ex_car_tax">
                    <span class="text-input__label"></span>
                </ons-input>
                <span style="color: #afafaf;  font-size: 13px;   position: absolute;  right: 0px;">วันหมดอายุ ทะเบียนภาษี</span>
            </div>
        </ons-list-item>
      <div align="center" style="margin-top: 10px;">
			
			<span id="txt-img-has-img_car_tax" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-img_car_tax" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_car_tax" onclick="performClick('img_car_tax');" >
	      	<img src="" style="" class="img-preview-show" id="pv_img_car_tax"  /> 
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -28px;
    margin-top: -28px;
    border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
	    </div>
</ons-card> 


<ons-card class="card"> 
	    <ons-list-header class="list-header"><b>ประกันรถยนต์</b></ons-list-header>
	    <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left"  style="width: 70px;">
                <!--<ons-icon icon="fa-car" class="list-item__icon ons-icon"></ons-icon>-->
                <span>ประกัน</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="txt_car_insurance-input" float="" maxlength="30" placeholder="" name="txt_car_insurance" style="width:100%;">
                    <input type="text" class="text-input" maxlength="30" placeholder="" name="txt_car_insurance" >
                    <span class="text-input__label">
                        ประกัน</span>
                </ons-input>
                <input type="hidden" value="0" id="valid_type_plate" />
                <i id="corrent-plate" class="fa fa-check-circle pass checking-plate" aria-hidden="true" style="display: none;"></i>
                <i id="incorrent-plate" class="fa fa-times-circle no-pass checking-plate" aria-hidden="true" style="display: none;"></i>
            </label>
        </ons-list-item>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="padding-right: 18px;width: 70px;">
            	<img src="assets/images/ex_card/crd.png" width="25px;" />
            </div>
            <div class="center list-item__center">
                <ons-input id="idcard-input" float=""  name="ex_car_insurance" style="width:100%;" value=""  >
                    <input type="date"  class="text-input"  name="ex_car_insurance" id="ex_car_insurance">
                    <span class="text-input__label"></span>
                </ons-input>
                <span style="color: #afafaf;  font-size: 13px;   position: absolute;  right: 0px;">วันหมดอายุ ประกัน</span>
            </div>
        </ons-list-item>
      <div align="center" style="margin-top: 10px;">
			
			<span id="txt-img-has-img_car_insurance" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-img_car_insurance" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_car_insurance" onclick="performClick('img_car_insurance');" >
	      	<img src="" style="" class="img-preview-show" id="pv_img_car_insurance"  /> 
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -28px;
    margin-top: -25px;
    border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
	    </div>
</ons-card> 

<div style="padding: 10px; margin-bottom: 10px;">
	<ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="submitAddCar();" style="background-color: #fff;">เพิ่มข้อมูลรถ</ons-button>
</div>
</form>    

<form name="form_accescar" id="form_accescar"  enctype="multipart/form-data">
			<div >
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_car_act"  style="opacity: 0;position: absolute;" onchange="readURLother(this,'img_car_act','add','car_act');">
			</div>
			<div >
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_car_tax"  style="opacity: 0;position: absolute;" onchange="readURLother(this,'img_car_tax','add','car_tax');">
			</div>
			<div >
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_car_insurance"  style="opacity: 0;position: absolute;" onchange="readURLother(this,'img_car_insurance','add','car_insurance');">
			</div>
</form>