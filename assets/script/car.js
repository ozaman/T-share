function addCar(){
	fn.pushPage({'id': 'popup1.html', 'title': 'เพิ่มรถ'}, 'lift-ios')
	 var url = "page/call_page";
    $.post(url,{ path : "car/car_add" },function(ele){
    	$('#body_popup1').html(ele);
    });
}

function editCar(){
	
}
function readURL(input,id) {

	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    	reader.onload = function(e) {
	    	
				$('#pv_'+id).attr('src', e.target.result);
	      		/*var data = new FormData($('#form_singin')[0]);
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
   				 	});*/
	    }
	    	reader.readAsDataURL(input.files[0]);
	   		
	  }
	  
}
	
$("#img_car_1").change(function() {
	  readURL(this,'img_car_1');
});

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