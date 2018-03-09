<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 

 
-->
</style>  


 
   <div class="box box-default">
          <h2 class="box-title">ช่องทางการติดต่อสื่อสาร</h2>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
 
          </div>
   </div>
   
  <div class="box box-default">
<form method="post" action="" id="edit_form" name="edit_form"  enctype="multipart/form-data" >

		 
		            <div class="col-md-6">
			      
 
                    <div class="topicname"><i class="fa  fa-envelope-square"></i>&nbsp;อีเมล์</div>
                    <input class="form-control" type="text" name="email" id="email"   required="true"  onkeypress="UserEnter(this,event)" value="<?=$arr[web_user][email];?>"    >
    
                <!----- ปิด col--> </div> <!---->
				
				  <div class="col-md-6"> 
		 
                     <div class="topicname"><i class="fa  fa-spotify"></i>&nbsp;LINE ID </div>
                  <input type="text" name="line_id" id="line_id"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][line_id];?>" class="form-control"  >
 
		      <!----- ปิด col--> </div> <!---->
		  
		  
		  <div class="col-md-6">
			      
   
                     <div class="topicname"><i class="fa fa-skype"></i>&nbsp;SKYPE</div>
                    <input class="form-control" type="text" name="skype_id" id="skype_id"  required="true" onkeypress="PasswordEnter(this,event)"   value="<?=$arr[web_user][skype_id];?>" >
 
					<!----- ปิด col--> </div> <!---->
					
					
					
					
					 <div class="col-md-6">
    
                     <div class="topicname"><i class="fa fa-wechat"></i>&nbsp;WECHAT ID </div>
               <input type="text" name="wechat_id" id="wechat_id"  required="true"   value="<?=$arr[web_user][wechat_id];?>" class="form-control"  >
  	    
			   		  <!----- ปิด col--> </div> <!---->
					
					     
					
					
   

		
		 
                
 
 
		    
			      
  
					
 
		
 

 
 

  
  <div  id="send_user_data"></div>
  
  
    <div style="margin-top:10px;"  >
 <table width="100%"  border="0" cellspacing="2" cellpadding="2" >
  <tr>
    <td width="150" style="padding:5 px;"><button id="submit_user_network" type="button" class="btn btn-block btn-primary" style="width:140px ">บันทึกข้อมูล</button></td>
    <td style="padding:5px;"><button type="reset" class="btn btn-block btn-default"  style="width:140px ">รีเซ็ต</button></td>
  </tr>
</table>
 
      </div>
        
 
 <script>
 /// check login

$("#submit_user_network").click(function(){ 
//$('#file_upload_line').click();

 
/*
if(document.getElementById('username').value=="") {
swal('กรุณากรอกชื่อผู้ใช้งาน'); 
document.getElementById('username').focus() ; 
return false ;
}
 */
 $.post('popup.php?name=user&file=savedata&type=network&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
  
  
 });
 </script> 
 </form> 
    </div>
    
 
	 
	 
	 
	<br>
<br>
<br>
 
<script src="js/upload/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="js/upload/uploadify.css">
 
	 
	 

	<script type="text/javascript">
 			$('#file_upload_line').uploadify({
				'formData'     : {
					
					'type' : 'line',
					'driver' : '<?=$arr[web_user][id];?>',
					'name' : '<?=$arr[web_user][post_date];?>',
					'folder' : 'line_qr' 
				},
				'buttonClass'     : 'btn btn-app', 
				'removeCompleted' : true, 
				'buttonText'      : 'เพิ่มไฟล์',
				'swf'      : 'js/upload/uploadify.swf',
				'uploader' : 'popup.php?name=user/file&file=up',
				'fileTypeExts'  : '*.jpg;*.png;*.gif',
				'onUploadSuccess' : function(file, data, response) {
//  $('#view_line_id').click();
  $('#text_upfile_line').html("<font color='#598527'>อัพโหลดไฟล์ QR CODE สำเร็จ</font>");			
}  }); 		 
	</script>
	
	<script type="text/javascript">
 			$('#file_upload_wechat').uploadify({
				'formData'     : {
					
					'type' : 'wechat',
					'driver' : '<?=$arr[web_user][id];?>',
					'name' : '<?=$arr[web_user][post_date];?>',
					'folder' : 'wechat_qr' 
				},
				'buttonClass'     : 'btn btn-app', 
				'removeCompleted' : true, 
				'buttonText'      : 'เพิ่มไฟล์',
				'swf'      : 'js/upload/uploadify.swf',
				'uploader' : 'popup.php?name=user/file&file=up',
				'fileTypeExts'  : '*.jpg;*.png;*.gif',
				'onUploadSuccess' : function(file, data, response) {
//  $('#view_line_id').click();
  $('#text_upfile_wechat').html("<font color='#598527'>อัพโหลดไฟล์ QR CODE สำเร็จ</font>");			
}  }); 		 
	</script>
	
	
	
	<script>
	$(function() {
		$('#view_wechat_img').on('click', function() {
			$('.imagepreview').attr('src', "../admin/file/driver/wechat_qr/<?=$arr[web_user][post_date];?>.jpg");
			$('#imagemodal').modal('show');   
			
					});		
			
					$('#view_line_img').on('click', function() {
			$('.imagepreview_line').attr('src', "../admin/file/driver/line_qr/<?=$arr[web_user][post_date];?>.jpg");
			$('#imagemodal_line').modal('show');   
			
			
		});		
		
		
});
	</script>
 
<style>
 
 
 
.modal-backdrop.in {
 background-color:#000000;
 
 opacity:0.8;overflow: scroll;
	 

 }
 
 .modal {
 position:fixed; overflow: scroll;
 top:0;
 left:0;
 }
 
 </style>
  

            <!-- Modal content-->
 

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: auto;" >
  <div class="modal-dialog" data-dismiss="modal"   style=" max-width:450px;">
    <div class="modal-content"  >              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <center> <img src="" class="imagepreview" style="width:100%;" ></center>
		   
      </div> 
      <div class="modal-footer">
        </div>
       </div>
  </div>
</div>


<!-- Modal content-->
<div class="modal fade" id="imagemodal_line" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: auto;" >
  <div class="modal-dialog" data-dismiss="modal" style=" max-width:450px;">
    <div class="modal-content"  >              
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
       <center> <img src="" class="imagepreview_line" style="width:100%;" ></center>
		   
      </div> 
      <div class="modal-footer">
        </div>
       </div>
  </div>
</div>