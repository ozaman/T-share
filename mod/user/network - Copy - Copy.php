<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:10px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 

 
-->
</style>  

 <div class="box box-default">
   <div class="box box-default">
          <h2 class="box-title">ช่องทางการติดต่อสื่อสาร</h2>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
 
          </div>
   </div>
   
  
<form method="post" action="" id="edit_form" name="edit_form" ctype="multipart/form-data" >
  

  	
        
					
					
					
              <!-- /.box-header -->
        <div class="box-body" >
          <div class="row">
		  
            <div class="col-md-6">
			
					
                   <div>
                    <div class="topicname"><i class="fa  fa-envelope-square"></i>&nbsp;อีเมล์</div>
                    <input class="form-control" type="text" name="username" id="username"   required="true"  onkeypress="UserEnter(this,event)" value="<?=$arr[web_user][email];?>"    >
              </div>
                
				
				 
		      <div>
					
                     <div class="topicname"><i class="fa  fa-spotify"></i>&nbsp;LINE ID </div>
                  
					 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="70%" >    <input type="text" name="line_id" id="line_id"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][line_id];?>" class="form-control"  ></td>
    <td width="30%"  style="padding-left:5px; ">
	
	<div class="btn-group">
                  <button type="button" class="btn btn-warning" style="font-size:12px; padding:7px 2px 7px 2px; ">QR Code</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="height:33px; ">
                    <span class="caret"></span>
                    <span class="sr-only"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu" >
				 
          <li d="view_line_id" onclick="TINY.box.show({image:'pic/qrcode/wechat_111.png',boxid:'frameless',animate:true,openjs:function(){openJS()}})"  i><a href="#">ดู</a></li>
          <li id="up_line_id"><a href="#">อัพไฟล์</a></li>
					 
 
 
              </td>
  </tr>
</table>
			<div style="margin-top:5px; " id="upfile_line">
			<font color="#FF0000">คุณยังไม่ได้อัพโหลดไฟล์ QR CODE </font>
			
			</div>
					 
 
					
					
					<div class="col-md-6">
					
					                    <div>
                     <div class="topicname"><i class="fa fa-skype"></i>&nbsp;SKYPE</div>
                    <input class="form-control" type="text" name="zello_id" id="zello_id"  required="true" onkeypress="PasswordEnter(this,event)"   value="<?=$arr[web_user][zello_id];?>" >
                    </div>
					
					
					
                    <div>
                     <div class="topicname"><i class="fa fa-wechat"></i>&nbsp;WECHAT ID </div>
                  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="70%" >    <input type="text" name="line_id" id="line_id"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][line_id];?>" class="form-control"  ></td>
    <td width="30%"  style="padding-left:5px; ">
	
	
	<div class="btn-group">
        <button type="button" class="btn btn-warning" style="font-size:12px; padding:7px 2px 7px 2px; ">QR Code</button>
        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" style="height:33px; width:auto "> 
		<span class="caret"></span> <span class="sr-only"></span> </button>
        <ul class="dropdown-menu" role="menu" > 
          <li onclick="TINY.box.show({image:'pic/qrcode/wechat_111.png',boxid:'frameless',animate:true,openjs:function(){openJS()}})"  id="view_line_id"><a href="#">ดู</a></li>
          <li id="up_line_id"><a href="#">อัพไฟล์</a></li>
        </ul>
		

    </div>
	
	
	</td>
  </tr>
</table>
 
 
 			<div style="margin-top:5px; " id="upfile_wechat">
			<font color="#FF0000">คุณยังไม่ได้อัพโหลดไฟล์ QR CODE </font>
			
			</div>
			   
			        </div>
					

					
					
								<!-- /.col (right) -->
      </div>
	   </div>
					
					
					 <div class="col-md-6">
					  <div>
                      <div class="topicname"></div>
                    </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
 
 


                    <div style="margin-top:-10px; margin-left:10px; margin-right:10px;">
 <table width="100%"  border="0" cellspacing="2" cellpadding="2" >
  <tr>
    <td width="150" style="padding:5 px;"><button id="submit_user_network" type="button" class="btn btn-block btn-primary" style="width:140px ">บันทึกข้อมูล</button></td>
    <td style="padding:5px;"><button type="reset" class="btn btn-block btn-default"  style="width:140px ">รีเซ็ต</button></td>
  </tr>
</table>

 

                    </div>
           <br>


 
 <script>
 /// check login
 
$("#submit_user_network").click(function(){ 
alert(555);
if(document.getElementById('username').value=="") {
swal('กรุณากรอกชื่อผู้ใช้งาน'); 
document.getElementById('username').focus() ; 
return false ;
}
 
 $.post('popup.php?name=login&file=check',$('#login_form').serialize(),function(response){
   $('#sendlogin').html(response);
  });
 });
 </script><div id="queue"></div>
 </form> 
 
    </div>
	 </div>
	<br>
<br>
<br>
 
<script src="js/upload/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="js/upload/uploadify.css">
 
	 
	

	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
				 'name' : 'qrcode_<?=$arr[web_user][id];?>',
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				 'auto'            : true, 
				// 'uploadLimit'     : 1,
				//'onAllComplete' : alert(5555				 'uploadLimit'     : 1,
*.gif;*.png;*.pdf', //only upload these file types
				'buttonImage'     : null,    
				'swf'      : 'js/upload/uploadify.swf',
				'buttonText'      : 'เลือกไฟล์',     // The text to use for the browse button
				'uploader' : 'js/upload/uploadify.php?type=qrcode',
'onUploadSuccess' : function(file, data, response) {
    $('#sub'onAllComplete' : function(event,data) {
    $('#submit_user_network').submit();
	
	</script>
	
	<div  id="send_user_data"></div>