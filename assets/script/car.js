function addCar(){
	fn.pushPage({'id': 'popup1.html', 'title': 'เพิ่มข้อมูลรถ'}, 'lift-ios')
	 var url = "page/call_page";
    $.post(url,{ path : "car/car_add" },function(ele){
    	$('#body_popup1').html(ele);
    });
}

function editCar(id){
	fn.pushPage({'id': 'popup1.html', 'title': 'แก้ไขข้อมูลรถ'}, 'lift-ios')
	 var url = "page/call_page?id="+id;
    $.post(url,{ path : "car/car_edit" },function(ele){
    	$('#body_popup1').html(ele);
    	checkPicCar(id,'');
    });
}

function changeCarOften(id){

	modal.show();
	console.log(id);
	var data = {
		car_id : id,
		driver_id : $.cookie("detect_user")
	};
	var url = "car/change_car_often";
	$.ajax({
            url: url, // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            data: data,
            type: 'post',
            success: function(res) {
               console.log(res);
               
               	ons.notification.alert({message: 'ใช้รถคันนี้ เป็นรถประจำแล้ว',title:"สำเร็จ",buttonLabel:"ปิด"})
  				.then(function() { 
  					modal.hide();
  					var url_reload = "page/call_page";
	  				$.post(url_reload,{ path : "car/car_view" },function(ele){
					   $('#body_car_manage').html(ele);
					});
  				});
				  
            },
	        error: function(err){
	        	console.log(err);
	                //your code here
	        }
        });
}

function changeCarStatus(id,status){
	
	modal.show();
	console.log(id);
	if(status==0){
		var messages = "ยกเลิกใช้รถคันนี้แล้ว";
		if($('#detect_num_car').val()==1){
			alert($('#detect_num_car').val());
			ons.notification.alert({message: "ไม่สารมารถยกเลิกใช้งานได้ เนื่องจากคุณมีรถคันเดียว" ,title:"ขออภัย", buttonLabel:"ปิด"})
  				.then(function() { 
  					modal.hide();
  				});
  		    return;
		}
	}else{
		var messages = "เปิดใช้รถคันนี้แล้ว";
	}
	var data = {
		car_id : id,
		status : status,
		driver_id : $.cookie("detect_user")
	};
	var url = "car/change_status_car";
	$.ajax({
            url: url, // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            data: data,
            type: 'post',
            success: function(res) {
               console.log(res.res);
               if(res.res.check==false){
			   		ons.notification.alert({message: "ไม่สารมารถยกเลิกใช้งานได้ จำเป็นต้องมีรถที่ใช้งานอย่างน้อย 1 คัน" ,title:"ขออภัย", buttonLabel:"ปิด"})
	  				.then(function() { 
	  					modal.hide();
	  					return;
	  				});
			   }else{
				   	if(res.res.data.result==true){
					   	ons.notification.alert({message: messages ,title:"สำเร็จ", buttonLabel:"ปิด"})
		  				.then(function() { 
		  					modal.hide();
		  					var url = "page/call_page?checkcalledit=1";
									  $.post(url,{ path : "car/car_view" },function(ele){
									   $('#body_car_manage').html(ele);
									   //location.reload()
									   console.log("++++++++++++++++++++++++++++++++------------------------------------------------------------------------------");
							});
		  				});
				   }
			   }
            },
	        error: function(err){
	        	console.log(err);
	                //your code here
	        }
        });
}

function submitAddCar(){
		if($('input[name="plate_num"]').val()==""){
			ons
					  .notification.alert({message: 'กรุณากรอกเลขทะเบียนรถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					    	 $('input[name="plate_num"]').focus();
					  });
			return;		  
		}
		
		if($('input[name="car_type"]').val()==""){
			ons
					  .notification.alert({message: 'กรุณาเลือกประเภทรถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					    	 $('input[name="car_type"]').focus();
					  });
			return;		  
		}
		if($('input[name="car_brand"]').val()==""){
			ons
					  .notification.alert({message: 'กรุณาเลือกยี่ห้อรถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					    	 $('input[name="car_brand"]').focus();
					  });
			return;		  
		}
		if($('input[name="plate_color"]').val()==""){
			ons
					  .notification.alert({message: 'กรุณาเลือกป้ายทะเบียน',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					    	 $('input[name="plate_color"]').focus();
					  });
			return;		  
		}
		if($('input[name="car_color"]').val()==""){
			ons
					  .notification.alert({message: 'กรุณาเลือกสีรถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					    	 $('input[name="car_color"]').focus();
					  });
			return;		  
		}
		if($('input[name="car_province"]').val()==""){
			ons
					  .notification.alert({message: 'กรุณาเลือกจังหวัด',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					    	 $('input[name="car_province"]').focus();
					  });
			return;		  
		}
		if($('#img_car_1').val()==""){
			ons
					  .notification.alert({message: 'กรุณาอัพโหลดรูปภาพหน้ารถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					  });
			return;		  
		}
		if($('#img_car_2').val()==""){
			ons
					  .notification.alert({message: 'กรุณาอัพโหลดภาพข้างรถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					  });
			return;
		}
		if($('#img_car_3').val()==""){
			ons
					  .notification.alert({message: 'กรุณาอัพโหลดภาพในรถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					  });
			return;		  
		}
		modal.show();
		
		var data = new FormData($('#form_addcar')[0]);
		
		var url = "car/add_car?driver_id="+$.cookie("detect_user");
		
		$.ajax({
            url: url, // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: 'post',
            success: function(res) {
               console.log(res);
               if(res.data.result==true){

               		ons
					  .notification.alert({message: 'เพิ่มรถสำเร็จแล้ว',title:"สำเร็จ",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					    	 
					    	 var url = "page/call_page";
							  $.post(url,{ path : "car/car_view" },function(ele){
							   $('#body_car_manage').html(ele);
							   $('ons-back-button').click();
							});
					  });

			   }else{
			   		ons
					  .notification.alert({message: 'ไม่สามารถเพิ่มรถได้ กรุณาลองใหม่อีกครั้ง',title:"ผิดพลาด",buttonLabel:"ปิด"});
					  modal.hide();
			   }
			  
            },
	        error: function(err){
	        	console.log(err);
	                //your code here
	        }
        });
	
}

function submitEditCar(){
		if($('input[name="plate_num"]').val()==""){
			ons
					  .notification.alert({message: 'กรุณากรอกเลขทะเบียนรถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					    	 $('input[name="plate_num"]').focus();
					  });
			return;		  
		}
		
		if($('input[name="car_type"]').val()==""){
			ons
					  .notification.alert({message: 'กรุณาเลือกประเภทรถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					    	 $('input[name="car_type"]').focus();
					  });
			return;		  
		}
		if($('input[name="car_brand"]').val()==""){
			ons
					  .notification.alert({message: 'กรุณาเลือกยี่ห้อรถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					    	 $('input[name="car_brand"]').focus();
					  });
			return;		  
		}
		if($('input[name="plate_color"]').val()==""){
			ons
					  .notification.alert({message: 'กรุณาเลือกป้ายทะเบียน',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					    	 $('input[name="plate_color"]').focus();
					  });
			return;		  
		}
		if($('input[name="car_color"]').val()==""){
			ons
					  .notification.alert({message: 'กรุณาเลือกสีรถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					    	 $('input[name="car_color"]').focus();
					  });
			return;		  
		}
		if($('input[name="car_province"]').val()==""){
			ons
					  .notification.alert({message: 'กรุณาเลือกจังหวัด',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					    	 $('input[name="car_province"]').focus();
					  });
			return;		  
		}
		if($('#'+$('#id_carall').val()+'_check_upload_1').val()==0){
			ons
					  .notification.alert({message: 'กรุณาอัพโหลดภาพหน้ารถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					  });
			return;
		}
		if($('#'+$('#id_carall').val()+'_check_upload_2').val()==0){
			ons
					  .notification.alert({message: 'กรุณาอัพโหลดภาพข้างรถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					  });
			return;
		}
		if($('#'+$('#id_carall').val()+'_check_upload_3').val()==0){
			ons
					  .notification.alert({message: 'กรุณาอัพโหลดภาพในรถ',title:"ข้อมูลไม่สมบูรณ์",buttonLabel:"ปิด"})
					  .then(function() {
					    	 modal.hide();
					  });
			return;		  
		}
		modal.show();
		
		var data = new FormData($('#form_editcar')[0]);
		
		var url = "car/edit_car?driver_id="+$.cookie("detect_user")+"&car_id="+$('#id_carall').val();
		
		$.ajax({
            url: url, // point to server-side PHP script 
            dataType: 'json', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: 'post',
            success: function(res) {
               console.log(res);
              if(res.data.result==true){

               		ons
					  .notification.alert({message: 'แก้ไขข้อมูลรถสำเร็จ',title:"สำเร็จ",buttonLabel:"ปิด"})
					  .then(function() {
					    	modal.hide();
					    	var url = "page/call_page?checkcalledit=1";
							  $.post(url,{ path : "car/car_view" },function(ele){
							   $('#body_car_manage').html(ele);
							   console.log("++++++++++++++++++++++++++++++++------------------------------------------------------------------------------");
							});
					  });
//		    		modal.hide();
			   }else{
			   		ons
					  .notification.alert({message: 'ไม่สามารถเพิ่มรถได้ กรุณาลองใหม่อีกครั้ง',title:"ผิดพลาด",buttonLabel:"ปิด"});
					  modal.hide();
			   }
            },
	        error: function(err){
	        	console.log(err);
	                //your code here
	        }
        });
	
}

function validPlate(input){
	
}

function readURL(input, id, num, type) {
	  console.log("read file : " + id);
	  console.log("rand : " + $('#rand').val());
//	  return;
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    	reader.onload = function(e) {
	    	
				$('#pv_'+id).attr('src', e.target.result);

	      		var data = new FormData($('#form_addcar')[0]);
      			data.append('fileUpload', $('#'+id)[0].files[0]);
      			if(type=="add"){
					var param_id = $('#rand').val();
				}else{
					var param_id = $('#id_carall').val();
					$('#'+id+'_check_upload_'+num).val(1);
				}
      			var url_upload = "application/views/upload_img/upload.php?id="+param_id+"&type=car_img&num="+num;
      			console.log(url_upload);
   				   $.ajax({
   				                url: url_upload, // point to server-side PHP script 
   				                dataType: 'json',  // what to expect back from the PHP script, if anything
   				                cache: false,
   				                contentType: false,
   				                processData: false,
   				                data: data,                         
   				                type: 'post',
   				                success: function(php_script_response){
   				                   console.log(php_script_response);
   				                   $('#box_img_'+id).fadeIn(200);
   				                   $('#txt-img-has-'+id).show();
   				                   $('#txt-img-nohas-'+id).hide();
   				                },
						        error: function(e){
						                console.log(e)
						        }
   				 	});
	    }
	    	reader.readAsDataURL(input.files[0]);
	   		
	  }
	  
}
	
function performClick(elemId){
	console.log(elemId);
   var elem = document.getElementById(elemId);
   if(elem && document.createEvent) {
      var evt = document.createEvent("MouseEvents");
      evt.initEvent("click", true, false);
      elem.dispatchEvent(evt);
   }
}

function checkPicCar(id,checkcalledit){
      	console.log(id)
      	var p1 = '../data/pic/car/'+id+'_1.jpg?v='+$.now();
      	var p2 = '../data/pic/car/'+id+'_2.jpg?v='+$.now();
      	var p3 = '../data/pic/car/'+id+'_3.jpg?v='+$.now();
	  	var src = p1;
			$.ajax({
				url: src,
				type:'HEAD',
				error: function()
				{
				console.log('Error file');
//					$('#'+id+'_pic_car_1').hide();
				},
				success: function()
				{
					$('.'+id+'_pic_car_1').attr('src',p1);
					$('.'+id+'_pic_car_1').show();
					$('#'+id+'_check_upload_1').val(1);
					if(checkcalledit!=""){
						return;
					}
					$('#pv_img_car_1').attr('src',p1);
				}
			});
			var src = p2;
			$.ajax({
				url: src,
				type:'HEAD',
				error: function()
				{
				console.log('Error file');
//					$('#'+id+'_pic_car_2').hide();
				},
				success: function()
				{
//					$('#'+id+'_pic_car_2').show();
					$('.'+id+'_pic_car_2').attr('src',p2);
					$('.'+id+'_pic_car_2').show();
					$('#'+id+'_check_upload_2').val(1);
					if(checkcalledit!=""){
						return;
					}
					$('#pv_img_car_2').attr('src',p2);
				}
			});
			var src = '../data/pic/car/'+id+'_3.jpg';
			$.ajax({
				url: src,
				type:'HEAD',
				error: function()
				{
				console.log('Error file');
//					$('#'+id+'_pic_car_3').hide();
				},
				success: function()
				{
//					$('#'+id+'_pic_car_3').show();
					$('.'+id+'_pic_car_3').attr('src',p3);
					$('.'+id+'_pic_car_3').show();
					$('#'+id+'_check_upload_3').val(1);
					if(checkcalledit!=""){
						return;
					}
					$('#pv_img_car_3').attr('src',p3);
				}
			});
	  }

function selectCarType(id){
	var name = $('#item_car_type_'+id).data('name');
	console.log(name+" "+id);

	$('#car_type').val(id);
	$('#txt_car_type').text(name);
	$('ons-back-button').click();
}

function selectCarBrand(id,ps){
	var name = $('#item_car_brand_'+id).data('name');
	console.log(name+" "+id);

	$('#car_brand').val(id);
	$('#car_brand_txt').val(name);
	$('#txt_car_brand').text(name);
	$('ons-back-button').click();
	$('#img_car_brand_show').show();
	$('#img_car_brand_show').css('background-position',ps);

}

function selectCarProvince(id){
	var name = $('#item_car_province_'+id).data('name');
	console.log(name+" "+id);
	
	$('#car_province').val(id);
	$('#txt_car_province').text(name);
	$('ons-back-button').click();
}

function selectCarColor(id,val){
	console.log(id+" "+val);
	var img = $('#item_car_color_'+id).data('img');
	$('#img_car_color_show').attr('src',"assets/images/car/"+img);
	
	$('#car_color').val(id);
	$('#car_color_txt').val(val);
	$('#txt_car_color').text(val);
	$('#img_car_color_show').show();
	$('ons-back-button').click();
}

function selectPlateColor(id,val){
	console.log(id+" "+val);
	var img = $('#item_car_plate_'+id).data('img');
	$('#img_plate_color_show').attr('src',"assets/images/car/plate/"+img);
	
	$('#plate_color').val(id);

	$('#plate_color_txt').val(val);
	$('#txt_plate_color').text(val);
	$('#img_plate_color_show').show();
	$('ons-back-button').click();
}