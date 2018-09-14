<style>
	.list-item{
		padding-left: 14px;
	}
</style>
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
            	<img src="" style="width: 50px; margin-right: 15px;display: none;" id="img_plate_color_show"  />
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
        <div align="center" style="margin-top: 10px;">
			<div >
			  <input type="file" class="cropit-image-input" accept="image/*" id="img_car_img"  style="opacity: 0;position: absolute;">
			</div>
			<span id="txt-img-has-car_img" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
			<span id="txt-img-nohas-car_img" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
	      <div class="box-preview-img" id="box_img_car_img" onclick="performClick('img_car_img');" >
	      	<img src="" style="" class="img-preview-show" id="pv_car_img"  /> 
	      </div> 
	      <span style="background-color: #f4f4f4;
    padding: 0px 10px;
    position: absolute;
    margin-left: -28px;
        margin-top: -28px;
    border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
	    </div>
 	</ons-card>