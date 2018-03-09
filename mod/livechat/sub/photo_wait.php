   
 	<div id="area"  ><div>
		<img id="image_photo_view" name="image_photo_view"  style="width:300px " />
		
		<img id="image_photo_you" name="image_photo_you"  style="width:300px " />
            <!-- development area -->

            <!-- SAMPLE -->
          
 
                <!-- description -->
                <!-- /description -->
<style>
                    #area div p { display: block; width: 400px; }
                    #area div p span { display: block; padding: 2px 0; width: 0; background: #193; text-align: center;width: 400px;  }
                    #area b, #area img { display: block; width: 400px; }
                    #area img { margin: 10px 0; width: 400px; }
                    #area input {  }
                    #area u { display: block; padding: 15px; text-align: center; background: #ddd; border-radius: 6px;width: 400px;  }
                </style>
				
				
<div id="file_photo_loads">

  <input type="file" class="form-control" value="ยังไม่มีภาพถ่าย" readonly  style="padding-left:5px; padding-right:5px; width:125px;display:none"  name="load_chat_photo_you"   id="load_chat_photo_you"  accept="image/*"  capture="camera" >
			
 <input type="file" class="form-control" value="ยังไม่มีภาพถ่าย" readonly  style="padding-left:5px; padding-right:5px; width:125px;display:none"  name="load_chat_photo_view"   id="load_chat_photo_view"   accept="image/*"  capture="camera" >
 

			
<div>
   
         
                    <script>

  

                            $('input[name=load_chat_photo_view]').change(function(e) {
							 
 ///
							// $( "#popup_chat_share_wait" ).toggle();
                               /// var file = e.target.files[0];
							   
 
								
								  var file=document.getElementById('load_chat_photo_view').files[0];

  
                                // CANVAS RESIZING
                                canvasResize(file, {
                                    width: 800,
                                    height: 1600,
                                    crop: false,
                                    quality: 100,
                                    rotate: 0,
                                    callback: function(data, width, height) {

                                        // SHOW AS AN IMAGE
                                        // =================================================
                                        var img = new Image();
 
									   
							 $("#image_photo_view").attr('src', data);
							 document.getElementById('chk_pic_view').value = "1";
							 
							 
							 
							 
if(document.getElementById('chk_pic_view').value == 1 && document.getElementById('chk_pic_you').value == 1){
							 
 			 
							 
	document.getElementById('div_btn_send_wait_popup').style.display = "";					 

}  else{

document.getElementById('div_btn_send_wait_popup').style.display = "none";	

}
							 
							 
							 
							 
							 
							 
  				   
									    // /SHOW AS AN IMAGE
                                        // =================================================


                                        // IMAGE UPLOADING
                                        // =================================================

                                        // Create a new formdata
                                        var fd = new FormData();
                                        // Add file data
                                        var f = canvasResize('dataURLtoBlob', data);
                                        f.name = file.name;
                                        fd.append($('#area input').attr('name'), f);

                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '<?=$chat_part?>go.php?name=livechat&file=upload_pic_wait&time=<?=time()?>&type=view', true);
                                        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                                        xhr.setRequestHeader("pragma", "no-cache");
                                        //Upload progress
                                        xhr.upload.addEventListener("progress", function(e) {
                                            if (e.lengthComputable) {
                                                var loaded = Math.ceil((e.loaded / e.total) * 100);
                                              
											  
											    $('#area_image_photo_view_load').css({
                                                    'width': loaded + "%"
                                                }).html(loaded + "% Complete (success)");
												
												
												
												
												
												
												
												
												$('#area_image_photo_view_load').html();
												//////////////////
							 
				 		 
												 
												 if(loaded==100){
												 
							 
												setTimeout(function () {
												
												$("#show_image_photo_view").show(); 
												  				
												$("#image_photo_view").fadeIn(3000); 
												}, 1000); //w
												  
												 
												  
												//  $("#area_image_album_load_main").fadeOut(1000); 
												//  $("#area_image_album_load").fadeOut(1000); 
												 $("#div_btn_send_album").fadeIn(1000); 
												  
												 }
												
												
												
                                            }
                                        }, false);
                                        // Send data
                                        xhr.send(fd);

                                        // /IMAGE UPLOADING
                                        // =================================================               
                                    }
                                });

 

                            });
           
		   
		   
                    </script>
					
					
					
                    <script>

  

                            $('input[name=load_chat_photo_you]').change(function(e) {
						 
 
							// $( "#popup_chat_share_wait" ).toggle();
                               /// var file = e.target.files[0];
							   
			 
								
								  var file=document.getElementById('load_chat_photo_you').files[0];

  
                                // CANVAS RESIZING
                                canvasResize(file, {
                                    width: 800,
                                    height: 1600,
                                    crop: false,
                                    quality: 100,
                                    rotate: 0,
                                    callback: function(data, width, height) {

                                        // SHOW AS AN IMAGE
                                        // =================================================
                                        var img = new Image();
 
									   
							 $("#image_photo_you").attr('src', data);
							 
							 
							 
							 document.getElementById('chk_pic_you').value = "1";
							 
							 							 
if(document.getElementById('chk_pic_view').value == 1 && document.getElementById('chk_pic_you').value == 1){
							 
 			 
							 
	document.getElementById('div_btn_send_wait_popup').style.display = "";					 

}  else{

document.getElementById('div_btn_send_wait_popup').style.display = "none";	

}
		
							 
							 
							 
  				   
									    // /SHOW AS AN IMAGE
                                        // =================================================


                                        // IMAGE UPLOADING
                                        // =================================================

                                        // Create a new formdata
                                        var fd = new FormData();
                                        // Add file data
                                        var f = canvasResize('dataURLtoBlob', data);
                                        f.name = file.name;
                                        fd.append($('#area input').attr('name'), f);

                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '<?=$chat_part?>go.php?name=livechat&file=upload_pic_wait&time=<?=time()?>&type=you', true);
                                        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                                        xhr.setRequestHeader("pragma", "no-cache");
                                        //Upload progress
                                        xhr.upload.addEventListener("progress", function(e) {
                                           
										   
										     if (e.lengthComputable) {
                                                var loaded = Math.ceil((e.loaded / e.total) * 100);
                                              
											  
											    $('#area_image_photo_you_load').css({
                                                    'width': loaded + "%"
                                                }).html(loaded + "% Complete (success)");
												
												
												
												
												
												
												
												
												$('#area_image_photo_you_load').html();
												//////////////////
							 
				 		 
												 
												 if(loaded==100){
												 
							 
												setTimeout(function () {
												
												$("#show_image_photo_you").show(); 
												  				
												$("#image_photo_you").fadeIn(3000); 
												}, 1000); //w
												  
												 
												  
												//  $("#area_image_album_load_main").fadeOut(1000); 
												//  $("#area_image_album_load").fadeOut(1000); 
												 $("#div_btn_send_album").fadeIn(1000); 
												  
												 }
										   
										   
										   
										   
										   
                                            }
                                        }, false);
                                        // Send data
                                        xhr.send(fd);

                                        // /IMAGE UPLOADING
                                        // =================================================               
                                    }
                                });
 

                            });
           
		   
		   
                    </script>


 
 
   
                    <script src="js/camera/canvasResize.js"></script>   
					