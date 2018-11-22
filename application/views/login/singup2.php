<?php 
			$name_th = "ชื่อ - นามสกุล";
			$name_en = "ชื่อ - นามสกุล (อังกฤษ)";
			$nickname = "ชื่อเล่น";
			$idcard = "เลขบัตรประชาชน";
			$address = "ที่อยู่ปัจจุบัน";
			$phone = "เบอร์โทรศัพท์";
			$phone2 = "เบอร์โทรศัพท์ที่สอง (ไม่บังคับ)";
			$phone_em = "เบอร์โทรฉุกเฉิน";
			$province = "จังหวัดที่คุณอยู่ประจำ";
			$email = "อีเมล์";
			$plate = "เลขทะเบียนรถ";
			$card_dv = "เลขใบขับขี่";
			$txt_ex_idcard = "วันหมดอายุ";
			$txt_ex_iddriving = "วันหมดอายุ";
		?>

<div style="padding: 1px 0 0 0;">
	<p class="intro" >
      กรุณากรอกข้อมูลที่เป็นความจริง เพื่อง่ายต่อการทำงานและการติดต่อของท่าน
    </p>
	<form name="form_singin" id="form_singin"  enctype="multipart/form-data">
	<input type="hidden" value="<?=$rand;?>" id="rand" name="rand" />
	<input type="hidden" value="" id="code_privince" name="code_privince" />
	<input type="hidden" value="<?=$_GET[ref];?>" id="register_reference" name="register_reference" />
    <ons-card class="card">
		<ons-list-header class="list-header"><b>ข้อมูลส่วนตัว</b></ons-list-header>
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-user" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="name-input" float="" maxlength="30" placeholder="<?=$name_th;?>" name="name_th" style="width:100%;">
                    <input type="text" class="text-input" maxlength="30" placeholder="<?=$name_th;?>" name="name_th">
                    <span class="text-input__label">
                        <?=$name;?></span>
                </ons-input>
            </label>
        </ons-list-item>
        
		<ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <ons-icon icon="fa-phone" class="list-item__icon ons-icon"></ons-icon><span class="txt-important">*</span>
            </div>
            <label class="center list-item__center">
                <ons-input id="phone-input" float="" placeholder="<?=$phone;?>" name="phone" style="width:100%;">
                    <input type="number" pattern="\d*" class="text-input"  placeholder="<?=$phone;?>" name="phone" id="phone" onkeyup="validPhoneNum($(this).val());">
                    <span class="text-input__label">
                        <?=$phone;?></span>
                </ons-input>
                <input type="hidden" value="0" id="valid_type_phone" />
                 <i id="corrent-phone" class="fa fa-check-circle pass checking-phone" aria-hidden="true" style="display: none;"></i>
                <i id="incorrent-phone" class="fa fa-times-circle no-pass checking-phone" aria-hidden="true" style="display: none;"><span style="margin-left: 5px;"></span></i>
            </label>
        </ons-list-item>
		
		<!--<ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
            	<img src="../../images/ex_card/crd.png" width="25px;">
            </div>
            <div class="center list-item__center">
                 <ons-input id="idcard-input" float="" name="birthday" style="width:100%;" value="" placeholder="" max="2003-01-01">
                    <input type="date" class="text-input" name="birthday" id="birthday" placeholder="" value="">
                    <span class="text-input__label"></span>
                </ons-input>
                <span style="color: #afafaf;  font-size: 13px;   position: absolute;  right: 0px;">วัน เดือน ปี เกิด</span>  
            </div>
            
        </ons-list-item>-->
        
        <ons-list-item class="input-items list-item p-l-0" style="display:none;">
        	<div class="left list-item__left">
                 <i class="fa fa-venus-mars list-item__icon" aria-hidden="true" style="padding-left: 0px;"></i><span class="txt-important">*</span>
            </div>
            	<ons-list-item tappable>
		        <label class="left">
		          <ons-checkbox class="checkbox-color rcp" input-id="checkbox-0" onclick="selectGender(0);"></ons-checkbox>
		        </label>
		        <label class="center" for="checkbox-0" style="background-image: unset;">
		          ชาย
		        </label>
		      </ons-list-item>
		        <ons-list-item tappable>
		        <label class="left">
		          <ons-checkbox class="checkbox-color rcp" input-id="checkbox-1"  onclick="selectGender(1);" ></ons-checkbox>
		        </label>
		        <label class="center" for="checkbox-1" style="background-image: unset;">
		          หญิง
		        </label>
		      </ons-list-item>
           
        </ons-list-item>
         <input type="hidden" value="" id="gender" value="" name="gender"/>
        <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="padding-right: 20px;">
                <!--<ons-icon icon="fa-location-arrow" class="list-item__icon ons-icon"></ons-icon>-->
                <i class="material-icons">location_on</i>
                <span class="txt-important">*</span>
            </div>
            <label class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'จังหวัด', 'open':'user_province'}, 'lift-ios')" style="    padding: 18px 6px 18px 0;">
                <span id="txt_user_province" style="color: #999;margin-left: 0px;" >เลือกจังหวัด</span>
                 <input type="hidden" name="province" id="province" />
            </label>
            <div>
	            <div id="div_position" class="" style="margin-top: -15px; position: absolute; right: 0px;font-size: 13px;">
	                คุณอยู่&nbsp;<span id="txt-province" style="color: #ff6464;font-weight: 800;">ไม่พบตำแหน่ง</span>
	            </div>
	        </div>
        </ons-list-item>
        
    </ons-card>
    
</form>
     <div style="margin: 0px 10px;padding-bottom: 35px;">
    <ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="createAlertDialog();" style="background-color: #fff;" >สมัครสมาชิก</ons-button>
    </div>
	
</div>   

<script>
	$(function() {
		
		 var url = "../../mod/material/user/php_user.php?action=upload";
        // $('.image-editor').cropit({
        //   imageState: {
        //     src: url,
        //   },
        //   freeMove: false,
        //   width : 250,
        //   height : 350
        // });

        // $('.rotate-cw').click(function() {
        //   $('.image-editor').cropit('rotateCW');
        // });
        // $('.rotate-ccw').click(function() {
        //   $('.image-editor').cropit('rotateCCW');
        // });

      });
    
    function readURL(input,type) {

	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    	reader.onload = function(e) {
	    	
				$('#pv_'+type).attr('src', e.target.result);
	      		var data = new FormData($('#form_singin')[0]);
      			data.append('fileUpload', $('#img_'+type)[0].files[0]);
      			var url_upload = "../../mod/user/upload_img/upload.php?id="+$('#rand').val()+"&type="+type;
      			console.log(url_upload);
   				   $.ajax({
   				                url: url_upload, // point to server-side PHP script 
   				                dataType: 'text',  // what to expect back from the PHP script, if anything
   				                cache: false,
   				                contentType: false,
   				                processData: false,
   				                data: data,                         
   				                type: 'post',
   				                success: function(php_script_response){
   				                   console.log(php_script_response);
   				                   $('#box_img_'+type).fadeIn(200);
   				                   $('#txt-img-has-'+type).show();
   				                   $('#txt-img-nohas-'+type).hide();
   				                },
						        error: function(e){
						                console.log(e)
						        }
   				 	});
	    }
	    	reader.readAsDataURL(input.files[0]);
	   		
	  }
	  
	}
    
	$("#img_id_card").change(function() {
	  	 readURL(this,'id_card');
	});
	
	$("#img_id_drving").change(function() {
	  	 readURL(this,'id_drving');
	});
	
	$("#img_car_img").change(function() {
	  	 readURL(this,'car_img');
	});
	
	$("#img_profile").change(function() {
//	  	 readURLprofile(this);
		var input = this;
		if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    	reader.onload = function(e) {
	    		$('#pv_profile').attr('src', e.target.result);
	    }
	    	reader.readAsDataURL(input.files[0]);
	  }
 
	});
	
         /* $('#ex_iddriving').pickadate({
              format: 'yyyy-mm-dd',
              formatSubmit: 'yyyy/mm/dd',
              closeOnSelect: true,
              closeOnClear: false,
              "showButtonPanel": false,
              onStart: function() {
              	  var date=$('#ex_iddriving').val();
                  this.set('select', date); // Set to current date on load
         			console.log('open');
//         			$('.toolbar').hide();
              },
      		  onSet: function(context) {
      		  	var date = $('#ex_iddriving').val();
					console.log(date);
					$('.toolbar').show();
					console.log('onSet');
      		  },
      		  onClose: function() {
      		  		console.log('onClose');
					$('.toolbar').show();
      		  },
      		  onOpen: function() {
      		  		console.log('onOpen');
					$('.toolbar').hide();
      		  }
              });
              
          $('#ex_idcard').pickadate({
              format: 'yyyy-mm-dd',
              formatSubmit: 'yyyy/mm/dd',
              closeOnSelect: true,
              closeOnClear: false,
              "showButtonPanel": false,
              onStart: function() {
              	  var date=$('#ex_idcard').val();
                  this.set('select', date); // Set to current date on load
//         			console.log('open');
//         			$('.toolbar').hide();
              },
      		  onSet: function(context) {
      		  	var date = $('#ex_idcard').val();
					console.log(date);
					$('.toolbar').show();
      		  },
      		  onClose: function() {
      		  	
					$('.toolbar').show();
      		  },
      		  onOpen: function() {
					$('.toolbar').hide();
      		  }
              });*/
       
	function selectGender(val){
		$('.rcp').prop('checked', false);
		$('#checkbox-'+val).prop('checked', true);
		$('#gender').val(val);
	}
	
	
</script>
