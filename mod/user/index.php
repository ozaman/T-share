<script>
   $('.text-topic-action-mod').html('<?=t_user_info;?>');
</script>
<style type="text/css">
   .mainpic_index {
   padding:10px;   
   -moz-border-radius:50%;
   -webkit-border-radius:50%;
   border-radius:50%;
   border:1px solid #FFFFFF; background-color:#FFFFFF; 
   box-shadow: 2px 1px 5px #333333; margin-right:5px; margin-bottom:5PX;max-width:400px;
   }
   .mainpic_dv {
   padding:10px;   
   border:1px solid #FFFFFF; background-color:#FFFFFF; 
   box-shadow: 2px 1px 5px #333333; margin-right:5px; margin-bottom:5PX;max-width:400px;
   }
   .mainpic {
   border:8px solid #FFFFFF; background-color:#FFFFFF; 
   box-shadow: 2px 1px 10px #333333; 
   height:300px; width:300px;
   border-radius: 50%;
   background:url(../../admin/file/driver/pic/<?=$arr[web_user][post_date];?>.jpg);
   background-size: 450px ;
   background-repeat: no-repeat; background-position:center;
   }
   <!--
      .topicname-user { padding-top:10px; padding-left: 0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #333333 ; text-align:left; margin:0px;  
      }
      .form-control { margin-left:0px; padding-left:0px; }
      -->
</style>
<? $coldata="col-md-6";?>
<form method="post"  id="edit_form" name="edit_form">
   <div class="box box-default" style="padding-top:30px;">
      <!-- /.box-header -->
      <div class="box-body" >
         <div class="row">
            <div class="<?= $coldata?>">
               <?php  $pic_qr = file_exists("../data/pic/driver/small/".$arr[web_user][username].".jpg");  
                  if($pic_qr==1){
                  	$path_file = "../data/pic/driver/small/".$arr[web_user][username].".jpg?v=".time();
                  }else{
                  	$path_file = "../data/pic/driver/small/default-avatar.jpg";
                  }
                  ?>            
               <style>
                  .fileInput {
                  position: absolute;
                  top: 0;
                  right: 0;
                  margin: 0;
                  padding: 0;
                  font-size: 20px;
                  cursor: pointer;
                  opacity: 0;
                  filter: alpha(opacity=0);
                  }
               </style>
               <a href="mod/user/croppic_master/test.php?user=<?=$arr[web_user][username];?>">
                  <div align="center" style="margin-top:10px;" >
                     <img src="<?=$path_file;?>" id="img_tag"  alt="Preview Image" width="200px" style="border: 2px solid #ddd;    border-radius: 4px;    padding: 0px;    margin: 10px;   display: nones;"/>
                     <!--<button class="btn btn-md" id="but_img_tag" type="button">อัพโหลดภาพ..</button>-->
                     <input type="file" id="imageUpload_profile" class="fileInput" name="imageUpload_profile" />
                  </div>
               </a>
               <div class="topicname-user"><?=t_username;?></div>
               <input class="form-control" type="text" name="username" id="username" maxlength="50" required="true" style="width:100%" onkeypress="UserEnter(this,event)" value="<?=$arr[web_user][username];?>"  readonly="readonly">
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user"><?=t_password;?></div>
               <input class="form-control" type="text" name="password" id="password"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][password];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user text-cap"><?=t_name_last_name_thai;?></div>
               <input class="form-control" type="text" name="name" id="name"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][name];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user text-cap"><?=t_name_last_name_english;?></div>
               <input class="form-control" type="text" name="name_en" id="name_en"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][name_en];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user"><?=t_nick_name;?></div>
               <input class="form-control" type="text" name="nickname" id="nickname"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][nickname];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user"><?=t_identity_card_number;?></div>
               <input class="form-control" type="text" name="idcard" id="idcard"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][idcard];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user"><?=t_driver_license_number;?></div>
               <input class="form-control" type="text" name="iddriving" id="iddriving"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][iddriving];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user"><?=t_address;?></div>
               <input class="form-control" type="text" name="address" id="address"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][address];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user"><?=t_phone_number;?></div>
               <input class="form-control" type="number" name="phone" id="phone"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][phone];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user"><?=t_emergency_telephone_numbers;?></div>
               <input class="form-control" type="number" name="contact" id="contact"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][contact];?>"  >
               <?  if($arr[web_user][contact]==""){ ?> <script type="text/javascript"> $('#contact').addClass("tab_alert2");</script> <? } ;?> 
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user">
                  <div  id="send_user_data"  style="width:100%"> </div>
               </div>
            </div>
            <div class="<?= $coldata?>">
               <div class="alert alert-success alert-dismissible"  id="save" style="display: none;">
                  <i class="fa fa-check"></i>  <?=t_save_succeed;?> 
               </div>
               <div class="alert alert-error alert-dismissible" id="error" style="display: none;padding:14px;">
                  <i class="fa fa-check"></i>  <?=t_error;?>
               </div>
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user">
                  <table width="100%"  border="0" cellspacing="2" cellpadding="2">
                     <tr>
                        <td width="50%"><button type="reset" class="btn btn-block btn-default"  style="width:100%;padding:10px; "><?=t_reset;?></button></td>
                        <td width="50%"><button id="submit_user_data" type="button" class="btn btn-block btn-primary" style="width:100%;padding:10px;background-color:#3b5998; "><?=t_save_data;?></button></td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>
<script>
	var check_new_user = '<?=$_GET[check_new_user];?>';
    if(check_new_user!=""){
    	 document.getElementById('password').focus() ;
    }
	
   /*$('#img_tag').click(function(){
   	$('#imageUpload_profile').trigger('click');
   });
   $('#but_img_tag').click(function(){
   	$('#imageUpload_profile').trigger('click');
   });*/
   $('#imageUpload_profile').change(function(){			
   		readImgUrlAndPreview(this);
   		function readImgUrlAndPreview(input){
   			 if (input.files && input.files[0]) {
   		            var reader = new FileReader();
   		            reader.onload = function (e) {			            	
   		                $('#img_tag').attr('src', e.target.result);
   						}
   		          };
   		          reader.readAsDataURL(input.files[0]);
   		     }	
   //			     $('#imagePreview2').show();
   	});
   /// check login
   $("#submit_user_data").click(function(){ 
   if(document.getElementById('password').value=="") {
   alert('<?=t_please_fill_in_password;?>'); 
   document.getElementById('password').focus() ; 
   return false ;
   }
   if(document.getElementById('name').value=="") {
   alert('<?=t_please_fill_with_thai;?>'); 
   document.getElementById('name').focus() ; 
   return false ;
   }
   /*
   if(document.getElementById('name_en').value=="") {
   alert('กรุณากรอกชื่อ - นามสกุล(ภาษาอังกฤษ)'); 
   document.getElementById('name_en').focus() ; 
   return false ;
   }
   */
   if(document.getElementById('nickname').value=="") {
   alert('<?=t_please_fill_in_nickname;?>'); 
   document.getElementById('nickname').focus() ; 
   return false ;
   }
   /*
   if(document.getElementById('idcard').value=="") {
   alert('กรุณากรอกเลขบัตรประจำตัวประชาชน'); 
   document.getElementById('idcard').focus() ; 
   return false ;
   }
   if(document.getElementById('iddriving').value=="") {
   alert('กรุณากรอกหมายเลขใบขับขี่'); 
   document.getElementById('iddriving').focus() ; 
   return false ;
   }
   */
   if(document.getElementById('address').value=="") {
   alert('<?=t_please_fill_in_address;?>'); 
   document.getElementById('address').focus() ; 
   return false ;
   }
   if(document.getElementById('phone').value=="") {
   alert('<?=t_please_fill_in_phont_no;?>'); 
   document.getElementById('phone').focus() ; 
   return false ;
   }
   /*
   if(document.getElementById('contact').value=="") {
   alert('กรุณากรอกเบอร์โทรฉุกเฉิน'); 
   document.getElementById('contact').focus() ; 
   return false ;
   }
   */
   /* $.post('go.php?name=user&file=savedata&type=user&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
     $('#send_user_data').html(response);
    });*/
    					data_form = $('#edit_form').serialize();
   				data = new FormData($('#edit_form')[0]);
   //					alert(url); mod/user/savedata.php?type=555
      				data.append('file', $('#imageUpload_profile')[0].files[0]);
      				var id = '<?=$arr[web_user][id]?>';
   				   $.ajax({
   				                url: 'mod/user/savedata_sub.php?type=save_user&id='+id, // point to server-side PHP script 
   				                dataType: 'text',  // what to expect back from the PHP script, if anything
   				                cache: false,
   				                contentType: false,
   				                processData: false,
   				                data: data,                         
   				                type: 'post',
   				                success: function(php_script_response){
   //					                   alert(php_script_response);
   								var obj = JSON.parse(php_script_response);
   								   console.log(obj);
   									   if(obj==true){
   //										   	$('#save').show();
   									   	swal("<?=t_save_succeed;?>", "<?=t_press_button_close;?>", "success");
   									   	 /*setTimeout(function(){ 
   										 $('#save').fadeOut(3000);
   										 }, 1000);*/
   									   }
   									  else{
   									  	swal("<?=t_error;?>", "<?=t_press_button_close;?>", "error");
   //											 $('#error').show();
   									   	/* setTimeout(function(){ 
   										 $('#error').fadeOut(3000);
   										 }, 1000);*/
   									   }
   				                }
   				     });
   });
</script>