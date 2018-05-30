<link rel="stylesheet" href="bootstrap/css/font-awesome.min.css" />
<link rel="stylesheet" href="bootstrap/css/ionicons.min.css" />
<? 
   $main_color="#000000";
   ?>
<? 
   require_once("js/control.php");
   $coldata = "col-md-6 col-fix";
   ?>
<style>
   .topicname { font-size:20px; font-weight:bold;
   }
   .btn-lg{
   	padding: 8px 12px !important;
   	font-size: 18px !important;
   }
   .confirm {
   	font-size: 18px !important;
   }
</style>
<div style="left:0; margin-left:-0px;margin-top:15px; " >
   <div class="box-body "  >
  
      <div class="<?= $coldata?>" style="padding:0px;">
         <div>
            <div class="topicname "><span class="font-24"><?=t_first_name." - ".t_last_name;?></span></div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-user"></i></span>
               <input class="form-control" type="text" name="name" id="name"   required="true"   value="<?=$arr[web_driver_edit][name];?>" >
            </div>
         </div>
      </div>
    
      <div class="<?= $coldata?>" style="padding:0px;">
         <div>
            <!-- start box --> 
            <div class="topicname" ><span class="font-24"><?=t_nick_name;?></span></div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-user"></i></span>
               <input class="form-control" type="text" name="nickname" id="nickname"  required="true"   value="<?=$arr[web_driver_edit][nickname];?>"   >
            </div>
         </div>
         <!-- end box -->
      </div>
      <!-- end col -->
   
      <div class="<?= $coldata?>"  style="padding:0px;" >
         <div>
            <!-- start box --> 
            <div class="topicname" ><span class="font-24"><?=t_current_address;?> </span></div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-home"></i></span>
               <input class="form-control" type="text" name="address" id="address"  required="true"   value="<?=$arr[web_driver_edit][address];?>" >
            </div>
         </div>
         <!-- end box -->
      </div>
      <!-- end col -->
  
      <div class="<?= $coldata?>" style="padding:0px;">
         <div>
            <!-- start box -->
            <div class="topicname" ><span class="font-24"><?=t_phone_number;?></span></div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-phone"></i></span>
               <input class="form-control" type="number" name="phone" id="phone"  required="true"   value="<?=$arr[web_driver_edit][phone];?>" >
            </div>
         </div>
         <!-- end box -->
      </div>
      <!-- end col -->
    
      <div class="<?= $coldata?>" style="padding:0px;">
         <div>
            <!-- start box -->
            <div class="topicname" ><span class="font-24"><?=t_province;?></span></div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
               <select name="driver_province" id="driver_province" style="width:100%; padding:5px; height:40px" class="font-24" >
                  <option value="" >- <?=t_select_province;?> -</option>
                  <?
                     $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                       $res[category] = $db->select_query("SELECT ".$province.",id FROM web_province   ORDER BY id ");
                     while($arr[category] = $db->fetch($res[category])) {
                       ?>
                       <option value="<?=$arr[category][id];?>"><?=$arr[category][$province];?></option>
                       <?
                     }
                     $db->closedb ();
                     ?>
               </select>
            
            </div>

            <!--<script>
               $("#driver_province").change(function(){ 
               var url_load_price= "go.php?name=register/load&file=area";
               url_load_price=url_load_price+"&province="+document.getElementById('driver_province').value;
               if(document.getElementById('driver_province').value>0){
               $('#load_area').show();
               }
               if(document.getElementById('driver_province').value<1){
               $('#load_area').hide();
               }
               $('#load_area').load(url_load_price); 
               });
            </script>
            <div class="input-group" style="margin-top:10px; display:none" id="load_area"></div>-->
         </div>
         <!-- end box -->
      </div>
      <!-- end box -->
      
      <div class="col-md-6" style="padding:0px;">
         <div>
            <div class="topicname"><span class="font-24"><?=t_email;?>  <font color="#FF0000">( <?=t_not_mandatory;?> )</span></div>
            <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-envelope-square"></i></span>
               <input class="form-control" type="text" name="email" id="email"   required="true"  onkeypress="UserEnter(this,event)" value="<?=$arr[web_driver_edit][email];?>"    >
            </div>
         </div>
         <div>
            <div class="topicname" ></div>
         </div>

      </div>
      <!---->

   </div>
   <!---->
   <?
      $rand = substr(str_shuffle('123456789012345678901234567890'),0,30);
      ?>
   <input class="form-control" type="hidden" name="check_code" id="check_code"      value="<?=$rand ?>" >
   <div class="<?= $coldata?>" >
      <div class="take_photo" >
         <center>
         <i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_driver" style="font-size:60px;color: #666666;"></i><br>
         <span class="font-24"><?=t_take_photo;?></span>
         <div style="padding:0px;  ">
            <div class="progress" style="width:100%;border-radius:8px; margin-top: 10px; border:none; height:20px; " id="area_image_album_load_main">
               <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
                  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_driver" style="width:0%;border-radius:5px;border:none; height:">
               </div>
            </div>
         </div>
         <img 
            <? if($_GET[id]){ ?>
            src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_driver.jpg?v=<?=$arr[web_driver_edit][update_date];?>" 
            <? }  ?>
            name="image_id_driver" id="image_id_driver"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />
      </div>
   </div>
</div>
<!-- end box -->       
<div class="<?= $coldata?>">
   <div>
      <table width="100%"  border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
         <tr>
            <td  ><button id="submit_step_1" type="button" class="btn btn-repair waves-effect" style="width:100%; background-color:#3b5998; border-radius:25px;text-transform: capitalize; " ><span class="font-24"><?=t_save_data;?></span></button> </td>
         </tr>
          
      </table>
      <br>

   </div>
   <input class="form-control" type="hidden" name="check_photo_id_driver" id="check_photo_id_driver"      value="" >
   <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true"    value="" >
   <script>

      $("#icon_camera_id_driver").click(function(){  
        document.getElementById('upload_pic_type').value='id_driver';
       $("#load_chat_camera").click(); 
       });

      $("#submit_step_1").click(function(){ 


      if(document.getElementById('name').value=="") {
//      alert('กรุณากรอกชื่อ - นามสกุล (ภาษาไทย)'); 
      swal('กรุณากรอกชื่อ - นามสกุล (ภาษาไทย)');
      document.getElementById('name').focus() ; 
      return false ;
      }

      if(document.getElementById('nickname').value=="") {
      swal('กรุณากรอกชื่อเล่น'); 
      document.getElementById('nickname').focus() ; 
      return false ;
      }

      if(document.getElementById('address').value=="") {
      swal('กรุณากรอกที่อยู่'); 
      document.getElementById('address').focus() ; 
      return false ;
      }
      if(document.getElementById('phone').value=="") {
      swal('กรุณากรอกเบอร์โทรศัพท์'); 
      document.getElementById('phone').focus() ; 
      return false ;
      }
      if($('#driver_province').val()==""){
	  	swal('กรุณาเลือกที่อยู่');
	  	 document.getElementById('driver_province').focus() ; 
	  }

      if(document.getElementById('check_photo_id_driver').value=="") {
      swal('กรุณาถ่ายภาพคุณ'); 
      document.getElementById('check_photo_id_driver').focus() ; 
      return false ;
      }

    swal({
      	title: "คุณแน่ใจหรือไม่?",
      	text: "ว่าข้อมูลถูกต้อง",
      	type: "warning",
      	showCancelButton: true,
      	confirmButtonText: 'ยืนยัน',
      	cancelButtonText: "ยกเลิก",
      	closeOnConfirm: true,
      	closeOnCancel: true
      },
      function(isConfirm){
         if (isConfirm){
	       var url="go.php?name=register&file=savedata&type=user&action=add&id=<?=$_GET[id]?>";
			console.log(url);
	      $.post(url,$('#myform_regiter').serialize(),function(response){
	        $('#send_profile_data').html(response);
	        	swal('สำเร็จ','สมัครสมาชิกเสร็จสมบูรณ์ เลือกเมนูข้อมูลส่วนตัวเพื่อตรวจสอบข้อมูลของคุณ','success');
	        	
	       });
	       
	        $.post('send_messages/send_onesignal.php?key=new_driver',function(data){
   					console.log(data);
   				});

         }
      });
      });
   </script>  
</div>
<div  id="send_profile_data" style="display: none;"></div>
<div style="display:none">
   <?  include ("mod/register/photo/upload_main.php");?><br>
</div>