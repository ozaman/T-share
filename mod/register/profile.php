 
<? $coldata="col-md-6 col-fix";?>


 
 
<div class="topicname_main"><br>
<i class="fa fa-user" style="font-size:24px; height:20px; color:<?=$left_icon_menu_color?>"></i> ข้อมูลส่วนตัวคนขับรถ</div>


 <div class="box box-default "  style="left:0; margin-left:-0px; " > 

 
					
					
 
        <div class="box-body "  > 
 
		  
            <div class="<?= $coldata?> profile-none "  >
			            <div>
                    <div class="topicname">ชื่อผู้ใช้งาน</div>
                    <input class="form-control" type="text" name="username" id="username" maxlength="50" required="true" style="width:100%" onkeypress="UserEnter(this,event)" value="<?=$arr[web_driver_edit][username];?>"  readonly="readonly">
 </div>  
		  </div>  
					 <?  if($arr[web_driver_edit][username]==""){ ?> <script type="text/javascript"> $('#username').addClass_no("tab_alert");</script> <? } ;?> 
					
					
					
					<div class="<?= $coldata?> profile-none">
					 <div>  
                     <div class="topicname">รหัสผ่าน</div>
                    <input class="form-control" type="text" name="password" id="password"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][password];?>" >
                      </div>  
		  </div> 
					 <?  if($arr[web_driver_edit][password]==""){ ?> <script type="text/javascript"> $('#password').addClass_no("tab_alert");</script> <? } ;?> 
					
					<div class="<?= $coldata?>">
					 <div>  
                     <div class="topicname">ชื่อ - นามสกุล (ไทย)</div> 
                    <input class="form-control" type="text" name="name" id="name"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][name];?>" >
                     </div>  
		  </div>  
					  <?  if($arr[web_driver_edit][name]==""){ ?> <script type="text/javascript"> $('#name').addClass_no("tab_alert");</script> <? } ;?> 
					 
					
                    <div class="<?= $coldata?>">
					<div> 
                    <!-- start box --> 
                     <div class="topicname">ชื่อ - นามสกุล (อังกฤษ)</div>
                    <input class="form-control" type="text" name="name_en" id="name_en"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][name_en];?>" >
                     </div> <!-- end box -->
		  </div> <!-- end col -->
					   <?  if($arr[web_driver_edit][name_en]==""){ ?> <script type="text/javascript"> $('#name_en').addClass_no("tab_alert");</script> <? } ;?> 
					 
					                     <div class="<?= $coldata?>">
					<div> <!-- start box --> 
                     <div class="topicname">ชื่อเล่น</div>
                    <input class="form-control" type="text" name="nickname" id="nickname"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][nickname];?>"   >
                     </div> <!-- end box -->
					 </div> <!-- end col -->
					    <?  if($arr[web_driver_edit][nickname]==""){ ?> <script type="text/javascript"> $('#nickname').addClass_no("tab_alert");</script> <? } ;?> 
					 
					 
                    <div class="<?= $coldata?> profile-none" >
					<div> <!-- start box --> 
                     <div class="topicname">เลขบัตรประจำตัวประชาชน</div>
                    <input class="form-control" type="text" name="idcards" id="idcards"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][idcard];?>" >
                     </div> <!-- end box -->
		  </div> <!-- end col -->
					     <?  if($arr[web_driver_edit][idcard]==""){ ?> <script type="text/javascript"> $('#idcard').addClass_no("tab_alert");</script> <? } ;?> 
						 
						 
						 
					 <div class="<?= $coldata?> profile-none" >
					<div> <!-- start box --> 
                     <div class="topicname">หมายเลขใบขับขี่</div>
                    <input class="form-control" type="text" name="iddrivings" id="iddrivings"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][iddriving];?>" >
                     </div> <!-- end box -->
					 </div> <!-- end col -->
  <?  if($arr[web_driver_edit][iddriving]==""){ ?> <script type="text/javascript"> $('#iddriving').addClass_no("tab_alert");</script> <? } ;?> 
					 
	 
	 
                    <div class="<?= $coldata?>">
					<div> <!-- start box --> 
                     <div class="topicname">ที่อยู่</div>
                    <input class="form-control" type="text" name="address" id="address"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][address];?>" >
                     </div> <!-- end box -->
		  </div> <!-- end col -->
					 
					  <?  if($arr[web_driver_edit][address]==""){ ?> <script type="text/javascript"> $('#address').addClass_no("tab_alert");</script> <? } ;?> 
					
                    <div class="<?= $coldata?>">
					<div> <!-- start box -->
                     <div class="topicname">เบอร์โทรศัพท์</div>
                    <input class="form-control" type="number" name="phone" id="phone"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][phone];?>" >
  </div> <!-- end box -->
		  </div> <!-- end col -->
					  <?  if($arr[web_driver_edit][phone]==""){ ?> <script type="text/javascript"> $('#phone').addClass_no("tab_alert");</script> <? } ;?> 
					
                    <div class="<?= $coldata?>">
					<div> <!-- start box -->
                     <div class="topicname">เบอร์โทรฉุกเฉิน</div>
                    <input class="form-control" type="number" name="contact" id="contact"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][contact];?>"  >
					<?  if($arr[web_driver_edit][contact]==""){ ?> <script type="text/javascript"> $('#contact').addClass_no("tab_alert");</script> <? } ;?> 


                     </div> <!-- end box -->
					</div> <!-- end box -->
                    
                    
     
 
 <div class="<?= $coldata?>">
 <div> <!-- start box -->
 <div class="topicname">พื้นที่ที่อยู่ประจำ</div>
 
 
 
<select name="driver_zone" id="driver_zone" style="width:100%; font-size:16px; padding:5px; height:40px" >
          
          <option value="">- เลือกพื้นที่ -</option>
          
  <?
                                  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                         
                                    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
                                    $res[category] = $db->select_query("SELECT * FROM web_amphur where PROVINCE_ID=1   ORDER BY id  limit 100 ");
                      
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] == $arr[web_driver_edit][driver_zone]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][name_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
 
          </select>
          
 
 
 
 
 
 
<select name="driver_zone" id="driver_zone" style="width:100%; font-size:16px; padding:5px; height:40px" >
          
          <option value="">- เลือกพื้นที่ -</option>
          
  <?
                                  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                         
                                    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
                                    $res[category] = $db->select_query("SELECT * FROM web_amphur where PROVINCE_ID=1   ORDER BY id  limit 100 ");
                      
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] == $arr[web_driver_edit][driver_zone]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][name_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
 
          </select>
          
          
          
          

                     </div> <!-- end box -->
					</div> <!-- end box -->
					
                    
                    
                    
                    
                    
                    
                    
                    
					
					 
 
 
                     <div class="<?= $coldata?>" style=" margin:0">
                     
  
					<div>  
                                       <div   style="padding-top:25px; color:#FF0000" class="font_18">
       สำหรับกรณีให้โอนเงิน
           </div>
           
           
 
           
 
                     <div class="topicname">ธนาคาร</div>
                     
                     <span style=" font-size:18px ">
                     <select  class="form-control"  name="pay_bank_name" size="0"    id="pay_bank_name"   style="width:100%; font-size:16px; padding:5px; height:40px" >
                       <? if($arr[driver][pay_bank_name]<>""){ ?>
                       <option selected="selected" value="<?=$arr[driver][pay_bank_name]?>" >
                         <?=$arr[driver][pay_bank_name]?>
                       </option>
                       <? } ?>
                       <option value="" >-- กรุณาเลือกธนาคาร --</option>
                       <option value="กรุงไทย" >กรุงไทย</option>
                       <option value="กสิกรไทย" >กสิกรไทย</option>
                       <option value="ไทยพาณิชย์" >ไทยพาณิชย์</option>
                       <option value="กรุงเทพ" >กรุงเทพ</option>
                       <option value="ทหารไทย" >ทหารไทย</option>
                       <option value="กรุงศรีอยุธยา" >กรุงศรีอยุธยา</option>
                       <option value="เกียรตินาคิน" >เกียรตินาคิน</option>
                       <option value="ซิติแบงก์" >ซิติแบงก์</option>
                       <option value="ทิสโก้" >ทิสโก้</option>
                       <option value="ซีไอเอ็มบี ไทย" >ซีไอเอ็มบี ไทย</option>
                       <option value="ธนชาต" >ธนชาต</option>
                       <option value="นครหลวงไทย" >นครหลวงไทย</option>
                       <option value="ยูโอบี" >ยูโอบี</option>
                       <option value="สแตนดาร์ดชาร์เตอร์ดไทย" >สแตนดาร์ดชาร์เตอร์ดไทย</option>
                       <option value="เมกะสากลพาณิชย์" >เมกะสากลพาณิชย์</option>
                       <option value="ไอซีบีซี" >ไอซีบีซี</option>
                       <option value="แลนด์ แอนด์ เฮ้าส์ เพื่อรายย่อย" >แลนด์ แอนด์ เฮ้าส์ เพื่อรายย่อย</option>
                       <option value="ไทยเครดิต เพื่อรายย่อย" >ไทยเครดิต เพื่อรายย่อย</option>
                       <option value="พัฒนาวิสาหกิจขนาดกลางและขนาดย่อม" >พัฒนาวิสาหกิจขนาดกลางและขนาดย่อม</option>
                       <option value="เพื่อการเกษตรและสหกรณ์การเกษตร" >เพื่อการเกษตรและสหกรณ์การเกษตร</option>
                       <option value="เพื่อการส่งออกและนำเข้าแห่งประเทศไทย" >เพื่อการส่งออกและนำเข้าแห่งประเทศไทย</option>
                       <option value="อิสลามแห่งประเทศไทย" >อิสลามแห่งประเทศไทย</option>
                     </select>
              
                  


                     </div> <!-- end box -->
					</div> <!-- end box -->
 
 
                   
 
 
 
  <div class="<?= $coldata?>">
					<div> <!-- start box -->
                     <div class="topicname">เลขที่บัญชี</div>
                    <input class="form-control" type="number" name="pay_bank_number" id="pay_bank_number"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][contact];?>"  >
 
                     </div> <!-- end box -->
					</div> <!-- end box -->
                    
                    
                    
                    
                    



                    
                    
                    
                    
                    
                    
 
                    
                      <div class="<?= $coldata?>">
					<div> <!-- start box -->
                     <div class="topicname">ชื่อบัญชีธนาคาร</div>
                    <input class="form-control" type="text" name="pay_bank_user" id="pay_bank_user"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][contact];?>"  >
 
                     </div> <!-- end box -->
					</div> <!-- end box -->
 
 
 
 
 
 
      <div class="col-md-6">
			      
<div>
                    <div class="topicname"><i class="fa  fa-envelope-square"></i>&nbsp;อีเมล์</div>
                    <input class="form-control" type="text" name="email" id="email"   required="true"  onkeypress="UserEnter(this,event)" value="<?=$arr[web_driver_edit][email];?>"    >
              </div>
                
				
				 
		      <div> 
                <div class="topicname"><i class="fa  fa-spotify"></i>&nbsp;LINE ID </div>

				  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><input type="text" name="line_id" id="line_id"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][line_id];?>" class="form-control"  ></td>
    </tr>
</table>
    <?  if($arr[web_driver_edit][line_id]==""){ ?> <script type="text/javascript"> $('#line_id').addClass("stab_alert");</script> <? } ;?> 
			  </div>
			  
			  
<div>
  <div class="topicname"><i class="fa fa-skype"></i>&nbsp;SKYPE</div>
					 
  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td ><input class="form-control" type="text" name="skype_id" id="skype_id"  required="true" onkeypress="PasswordEnter(this,event)"   value="<?=$arr[web_driver_edit][skype_id];?>" ></td>
    </tr>
</table>
                    
  </div>
					
			  
			  
		       </div> <!---->
		  
		  
		  <div class="col-md-6">
			      

					      <div> 
                     <div class="topicname"><i class="fa  fa-feed"></i>&nbsp;ZELLO ID </div>
                 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td ><input type="text" name="zello_id" id="zello_id"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][zello_id];?>" class="form-control"  ></td>
    
  </tr>
</table>
				 
				 
				  
			  </div>
					
					
					
                    <div>
                     <div class="topicname"><i class="fa fa-wechat"></i>&nbsp;WECHAT ID </div>
					<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><input type="text" name="wechat_id" id="wechat_id"  required="true"   value="<?=$arr[web_driver_edit][wechat_id];?>" class="form-control"  ></td>
    
  </tr>
</table> 
    <?  if($arr[web_driver_edit][wechat_id]==""){ ?> <script type="text/javascript"> $('#wechat_id').addClass("stab_alert");</script> <? } ;?> 
               
    </div>
	
	<div>
                     <div class="topicname"><i class="fa fa-whatsapp"></i>&nbsp;WHATSAPP ID </div>
					<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" style="padding-right:5px; "><input type="text" name="whatsapp_id" id="whatsapp_id"  required="true"   value="<?=$arr[web_driver_edit][whatsapp_id];?>" class="form-control"  ></td>
    
  </tr>
</table> 
					  
               
    </div>
	
	
	    
			        </div>
					
   
		   </div> <!---->
		
 
 
 
 
 
 
 
 
 
   <div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
 
 
 

<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_driver"></i><br>

ถ่ายภาพคุณ

<div style="padding:5px;">

<div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_driver" style="width:0%;border-radius:5px;border:none">
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
    
    
    
             </div> <!-- end box -->       

                    
        
                    
                    
                    

 <div class="<?= $coldata?>">

 <div>
 
 <table width="100%"  border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;">
  <tr>
    <td width="50%"  class="pad-r-5"><button id="submit_step_1" type="button" class="btn btn-block btn-primary" style="width:100% " ><span class="font-20">บันทึกข้อมูล</span></button> </td>
    <td width="50%" class="pad-l-5"><button type="reset" class="btn btn-block btn-default"  style="width:width:100%"><span class="font-20">รีเซ็ต</button></td>
  </tr>
</table>

</div>
 
   </div>                 
					 
					
      


   

 

<script>
 /// check login 


$("#submit_step_1").click(function(){ 
 
 
 
 
 
 
 
 
 /*
if(document.getElementById('password').value=="") {
alert('กรุณากรอกรหัสผ่าน'); 
document.getElementById('password').focus() ; 
return false ;
}

*/
if(document.getElementById('name').value=="") {
alert('กรุณากรอกชื่อ - นามสกุล(ภาษาไทย)'); 
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
alert('กรุณากรอกชื่อเล่น'); 
document.getElementById('nickname').focus() ; 
return false ;
}

/*

if(document.getElementById('idcard').value=="") {
alert('กรุณากรอกหมายเลขบัตรประจำตัวประชาชน'); 
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
alert('กรุณากรอกที่อยู่'); 
document.getElementById('address').focus() ; 
return false ;
}
if(document.getElementById('phone').value=="") {
alert('กรุณากรอกเบอร์โทรศัพท์'); 
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
 

if(document.getElementById('driver_zone').value=="") {
alert('กรุณาเลือกพื้นที่ที่อยู่ประจำ'); 
document.getElementById('driver_zone').focus() ; 
return false ;
}

 

 
if(document.getElementById('check_photo_id_driver').value=="") {
	
 
alert('กรุณาถ่ายภาพคุณ'); 

document.getElementById('check_photo_id_driver').focus() ; 
return false ;
}
 
 

///// bank

/*

if(document.getElementById('pay_bank_name').value=="") {
alert('กรุณาเลือกธนาคาร'); 
document.getElementById('pay_bank_name').focus() ; 
return false ;
}

 
 
  if(document.getElementById('pay_bank_number').value=="") {
alert('กรุณากรอกเลขที่บัญชีธนาคาร'); 
document.getElementById('pay_bank_number').focus() ; 
return false ;
}
  
 
  
 if(document.getElementById('pay_bank_user').value=="") {
alert('กรุณากรอกชื่อบัญชีธนาคาร'); 
document.getElementById('pay_bank_user').focus() ; 
return false ;
}
  
  
 
  
 */
  
  //// pay_bank_name
  
 /*
  
 $.post('go.php?name=register&file=savedata&type=user&id=<?=$arr[web_driver_edit][id]?>',$('#myform_regiter').serialize(),function(response){
   $('#send_profile_data').html(response);
  });
  
  */
  
document.getElementById('check_step_1').value=1;
$("#register_step_2").removeClass('disabledbutton');

$("#register_step_2").click();

$("#check_icon_step_1").html('<i class="fa fa-check-circle" style="font-size:24px; height:20px; color:#FFF200"></i>');




//// $("#register_step_2").click();
  
  
 });
 </script>  
 
 
 </div> 
 

