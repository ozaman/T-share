function addCar(){
	fn.pushPage({'id': 'popup1.html', 'title': 'เพิ่มรถ'}, 'lift-ios')
	 var url = "page/call_page";
    $.post(url,{ path : "car/car_add" },function(ele){
    	$('#body_popup1').html(ele);
    });
}

function editCar(){
	
}

function submitAddCar(){

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
               console.log(res);modal.hide();
               /*if(res.data.result==true){

               		ons
					  .notification.alert({message: 'เพิ่มรถสำเร็จแล้ว',title:"สำเร็จ",buttonLabel:"ปิด"})
					  .then(function() {
					    	
					  });
		    		modal.hide();
			   }else{
			   		ons
					  .notification.alert({message: 'ไม่สามารถเพิ่มรถได้ กรุณาลองใหม่อีกครั้ง',title:"ผิดพลาด",buttonLabel:"ปิด"});
					  modal.hide();
			   }*/
            },
	        error: function(err){
	        	console.log(err);
	                //your code here
	        }
        });
	
}

function readURL(input, id, num) {
	  console.log("read file : " + id);
	  console.log("rand : " + $('#rand').val());
//	  return;
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    	reader.onload = function(e) {
	    	
				$('#pv_'+id).attr('src', e.target.result);

	      		var data = new FormData($('#form_addcar')[0]);
      			data.append('fileUpload', $('#'+id)[0].files[0]);
      			var url_upload = "application/views/upload_img/upload.php?id="+$('#rand').val()+"&type=car_img&num="+num;
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

function checkPicCar(id){
      	console.log(id)
      	var p1 = '../data/pic/car/'+id+'_1.jpg';
      	var p2 = '../data/pic/car/'+id+'_2.jpg';
      	var p3 = '../data/pic/car/'+id+'_3.jpg';
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