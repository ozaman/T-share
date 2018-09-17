checkImgProfile($.cookie("detect_username"), 1); 
	 $.ajax({
			url: '../data/pic/driver/id_card/'+$.cookie("detect_user")+'_idcard.jpg',
			type:'HEAD',
			error: function()
			{
			   console.log('Error file');
//			   $('#idcard_img').hide();
//			   $('#pv_id_card').attr('src','images/ex_card/id_card.jpg');
			},
			success: function()
			{
				 console.log('success file');
//				 $('#idcard_img').show();
				 $('#box_img_id_card').fadeIn(200);
   				 $('#txt-img-has-id_card').show();
   				 $('#txt-img-nohas-id_card').hide();
				 $('#pv_id_card').attr('src','../data/pic/driver/id_card/'+$.cookie("detect_user")+'_idcard.jpg?v='+$.now());
			}
		});
		
	$.ajax({
			url: '../data/pic/driver/id_driving/'+$.cookie("detect_user")+'_iddriving.jpg',
			type:'HEAD',
			error: function()
			{
			   console.log('Error file');
//			   $('#iddriving_img').hide();
//			   $('#pv_id_driving').attr('src','images/ex_card/id_driving.jpg');
			},
			success: function()
			{
				console.log('success file');
//				$('#iddriving_img').show();
				 $('#box_img_id_driving').fadeIn(200);
   				 $('#txt-img-has-id_driving').show();
   				 $('#txt-img-nohas-id_driving').hide();
				$('#pv_id_driving').attr('src','../data/pic/driver/id_driving/'+$.cookie("detect_user")+'_iddriving.jpg?v='+$.now());
			}
		});

	
	
    function readURL(input,type) {
//		alert(type);
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    	reader.onload = function(e) {
	    	
				$('#pv_'+type).attr('src', e.target.result);
	      		var data = new FormData($('#edit_form')[0]);
	      		if(type=="id_card"){
					data.append('idcard_upload', $('#img_'+type)[0].files[0]);
					var id = $.cookie("detect_user");
				}
				else if(type=="id_driving"){
					data.append('iddriving_upload', $('#img_'+type)[0].files[0]);
					var id = $.cookie("detect_user");
//					alert()
				}
				else if(type=="profile"){
					data.append('imgInp', $('#img_'+type)[0].files[0]);
					var id = $.cookie("detect_username");
				}
      			
//      			var url_upload = "../../mod/user/upload_img/upload.php?id="+$('#rand').val()+"&type="+type;
      			var url_upload = "application/views/upload_img/upload.php?id="+id+"&type="+type;
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
   				                   $('#box_img_'+type).fadeIn(200);
   				                   $('#txt-img-has-'+type).show();
   				                   $('#txt-img-nohas-'+type).hide();
   				                   $('#pv_id_card').attr('src','../data/pic/driver/id_card/'+$.cookie("detect_user")+'_idcard.jpg?v='+$.now());
   				                   $('#pv_id_driving').attr('src','../data/pic/driver/id_driving/'+$.cookie("detect_user")+'_iddriving.jpg?v='+$.now());
   				                   console.log('../data/pic/driver/small/'+$.cookie("detect_username")+'.jpg?v='+$.now());
   				                   $('#pv_profile').attr('src','../data/pic/driver/small/'+$.cookie("detect_username")+'.jpg?v='+$.now());
   				                   $('.shotcut-profile').attr('src','../data/pic/driver/small/'+$.cookie("detect_username")+'.jpg?v='+$.now());
   				                   
   				                   ons.notification.alert({message: 'ทำการอัพโหลดรูปสำเร็จแล้ว',title:"สำเร็จ",buttonLabel:"ปิด"})
											  .then(function() {
//											   		location.reload();
											  });
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
	
	$("#img_id_driving").change(function() {
//		 console.log('img_id_driving');
	  	 readURL(this,'id_driving');
	});
	
	$("#img_car_img").change(function() {
	  	 readURL(this,'car_img');
	});
	
	$("#img_profile").change(function() {
	  	 readURL(this,'profile');
		
 
	});
	
       
	function selectGender(val){
		console.log(val);
//		$('.rcp').prop('checked', false);
//		$('#checkbox-'+val).attr('checked', true);
		$('#gender').val(val);
	}
	
function selectUserProvince(id,code){
	var name = $('#item_user_province_'+id).data('name');
	console.log(name+" "+id+" || "+code);
	
	$('#province').val(id);
	$('#txt_user_province').text(name);
	$('#code_privince').val(code);
	$('ons-back-button').click();
}

function performClick(elemId) {
	console.log(elemId);
   var elem = document.getElementById(elemId);
   if(elem && document.createEvent) {
      var evt = document.createEvent("MouseEvents");
      evt.initEvent("click", true, false);
      elem.dispatchEvent(evt);
   }
}

function createDialogPf(){
	 var dialog = document.getElementById('pf_edit-alert-dialog');

		  if (dialog) {
		    dialog.show();
		  } else {
		    ons.createElement('pf_edit-dialog.html', { append: true })
		      .then(function(dialog) {
		        dialog.show();
		      });
		  }
}

function saveDataPf(){
	$('#pf_edit-alert-dialog').hide();
	modal.show();
	var data_form = $('#edit_form').serialize();
    var id = $.cookie("detect_user");
//    var url = 'mod/material/user/php_user.php?action=edit&id='+id;
    var url = 'main/update_user?id='+id;
   				    $.ajax({
   				                url: url, // point to server-side PHP script 
   				                dataType: 'text',  // what to expect back from the PHP script, if anything
/*   				            cache: false,
   				                contentType: false,
   				                processData: false,*/
   				                data: data_form,                         
   				                type: 'post',
   				                success: function(php_script_response){
								
   								var obj = JSON.parse(php_script_response);
   								   console.log(obj);
   									   if(obj.result==true){
   									   		modal.hide();
   									  		ons.notification.alert({message: 'ทำการแก้ไขข้อมูลเรียบร้อยแล้ว',title:"สำเร็จ",buttonLabel:"ปิด"})
											  .then(function() {
//											   		location.reload();
											  });
   									   }
   									  else{
   									  		ons.notification.alert({message: 'ไม่สามารถแก้ไขข้อมูลได้ กรุณาตรวจสอบหรือติดต่อเจ้าหน้าที่',title:"ไม่สำเร็จ",buttonLabel:"ปิด"})
											  .then(function() {
											   		
											  });
   									   }
   				                }
   				     });
}

function validEmail(email){
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  console.log(regex.test(email));
	  if(regex.test(email)==true){
	  	$('#incorrent-email').hide();
	  	$('#corrent-email').show();
	  }else{
	  	$('#incorrent-email').show();
	  	$('#corrent-email').hide();
	  }
	}