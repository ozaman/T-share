 <script src="js/craftpip/demo/libs/jquery.min.js"></script>
        <script src="js/craftpip/demo/libs/bootstrap.min.js"></script>
        <script src="js/craftpip/demo/libs/pretty.js"></script>
        
        <!-- BOOTSTRAP-FULLSCREEN-SELECT files -->
        <link rel="stylesheet" type="text/css" href="js/craftpip/css/bootstrap-fullscreen-select.css" />
        <script type="text/javascript" src="js/craftpip/js/bootstrap-fullscreen-select.js"></script>
        <script type="text/javascript" src="js/craftpip/demo/demo.min.js"></script> 
        <style>
    .btn-mobileSelect-gen{
		height: 40px !important;
		border-radius: 0px !important;
		display: block !important;
		width: 100% !important;
		font-size: 18px !important;
	}
		.mobileSelect-control{
		font-size: 17px !important;
	}.mobileSelect-title{
		font-size: 20px !important;
	}
	.mobileSelect-cancelbtn{
		font-size: 20px !important;
	}
	.mobileSelect-savebtn{
		font-size: 20px !important;
	}
	
	.mobileSelect-container.white .list-container .mobileSelect-control.selected{
		background-color: #3b5998!important;
	}
        </style>
 <script>
 var openby = '<?=$_GET[openby];?>';
 if(openby=='all'){
 	
 	$('.text-topic-action-mod-1').html('เพิ่มรถใหม่');
 }else{
 	$('.text-topic-action-mod').html('เพิ่มรถใหม่');
 }
 
 
 </script>

<br/>
 <?php 
 $arr_province =array("กระบี่","กรุงเทพมหานคร","กาญจนบุรี","กาฬสินธุ์","กำแพงเพชร","ขอนแก่น","จันทบุรี","ฉะเชิงเทรา" ,"ชลบุรี","ชัยนาท","ชัยภูมิ","ชุมพร","เชียงราย","เชียงใหม่","ตรัง","ตราด","ตาก","นครนายก","นครปฐม","นครพนม","นครราชสีมา" ,"นครศรีธรรมราช","นครสวรรค์","นนทบุรี","นราธิวาส","น่าน","บุรีรัมย์","ปทุมธานี","ประจวบคีรีขันธ์","ปราจีนบุรี","ปัตตานี" ,"พะเยา","พังงา","พัทลุง","พิจิตร","พิษณุโลก","เพชรบุรี","เพชรบูรณ์","แพร่","ภูเก็ต","มหาสารคาม","มุกดาหาร","แม่ฮ่องสอน" ,"ยโสธร","ยะลา","ร้อยเอ็ด","ระนอง","ระยอง","ราชบุรี","ลพบุรี","ลำปาง","ลำพูน","เลย","ศรีสะเกษ","สกลนคร","สงขลา" ,"สตูล","สมุทรปราการ","สมุทรสงคราม","สมุทรสาคร","สระแก้ว","สระบุรี","สิงห์บุรี","สุโขทัย","สุพรรณบุรี","สุราษฎร์ธานี" ,"สุรินทร์","หนองคาย","หนองบัวลำภู","อยุธยา","อ่างทอง","อำนาจเจริญ","อุดรธานี","อุตรดิตถ์","อุทัยธานี","อุบลราชธานี","อื่นๆ");
                     $cars = array("TOYOTA", "TOYOTA", "ISUZU"
                     ,"MITSUBISHI"
                     ,"MAZDA"
                     ,"NISSAN"
                     ,"SUZUKI"
                     ,"HINO"
                     ,"LEXUS"
                     ,"DAIHATSU"
                     ,"SUBARU"
                     ,"MITSUOKA"
                     ,"MERCEDES-BENZ"
                     ,"BMW"
                     ,"AUDI"
                     ,"VOLKSWAGEN"
                     ,"PEUGEOT"
                     ,"PORSCHE"
                     ,"OPEL"
                     ,"SMART"
                     ,"MCLAREN"
                     ,"WIESMANN"
                     ,"CHEVROLET"
                     ,"JEEP"
                     ,"FORD"
                     ,"CHRYSLER"
                     ,"DODGE"
                     ,"HUMMER"
                     ,"PONTIAC"
                     ,"BUICK"
                     ,"OLDSMOBILE"
                     ,"INFINITI"
                     ,"AMC"
                     ,"LINCOLN"
                     ,"TESLA"
                     ,"CADILLAC"
                     ,"MINI"
                     ,"ROVER"
                     ,"LAND ROVER"
                     ,"ASTON MARTIN"
                     ,"JAGUAR"
                     ,"ROLLS-ROYCE"
                     ,"BENTLEY"
                     ,"AUSTIN"
                     ,"MG"
                     ,"LONDON TAXI"
                     ,"TRIUMPH"
                     ,"ALFA ROMEO"
                     ,"FIAT"
                     ,"MASERATI"
                     ,"LOTUS"
                     ,"FERRARI"
                     ,"LAMBORGHINI"
                     ,"KIA"
                     ,"MUSSO"
                     ,"DAEWOO"
                     ,"HYUNDAI"
                     ,"SSANGYONG"
                     ,"CITROEN"
                     ,"RENAULT"
                     ,"VOLVO"
                     ,"SAAB"
                     ,"THAI RUNG"
                     ,"PROTON"
                     ,"NAZA"
                     ,"SEAT"
                     ,"TATA"
                     ,"HOLDEN"
                     ,"CHERY"
                     ,"DFSK"
                     ,"FOTON"
                     ,"SKODA"
                     );
                     ?>
 
<FORM name="myform_data" id="myform_data"   enctype="multipart/form-data" >

<? $coldata="col-md-6 col-fix";?>

 
 <div class="box box-default "  > 
 
 
  
 <div class="<?= $coldata?>">
  <h2 class="box-title" style="display:none"><span class="font-28"><b>เพิ่มรถใหม่</b></span></h2>
                  
                     
                     
                     
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tbody>
    <tr>
      <td width="50%">   <div class="topicname">ประเภทรถ</div>
      <select class="form-control mobileSelect" id="car_type2" name="car_type" data-animation="zoom" data-title="เลือกประเภทรถ" data-theme="white" >
                   <!--  <select   class="form-control" name="car_type" id="car_type"   onChange="return find_tour_product();find_tour_time();" >-->
                       <?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[programtour] = $db->select_query("SELECT * from  ".TB_carall_type."  ");
while ($arr[programtour] = $db->fetch($res[programtour])){
	   echo "<option value=\"".$arr[programtour][id]."\"";
	   if($arr[programtour][id] == $arr[web_car][car_type]){echo " Selected";}
	  // echo ">".$arr[programtour][company]."</option>";
echo ">".$arr[programtour][topic_th]." </option>";
}
$db->closedb ();
?>
                     </select>
                     <script type="text/javascript">
                                $(function(){
                                    
                                    $('#car_type2').mobileSelect({
									    onClose: function(){        
									        console.log('onClose: '+this.val());
									    },
									    onOpen: function(){
									        console.log('onOpen: '+this.val());
									    },
									     buttonSave: 'ตกลง',
									     buttonCancel: 'ยกเลิก'
									});
									
                                })
                                </script>
                     </td>
      <td width="50%">  <div class="topicname">ยี่ห้อรถ</div>
 
                    <!-- <select  class="form-control" id="car_brand" name="car_brand">-->
                     <select class="form-control mobileSelect" id="car_brand" name="car_brand" data-animation="zoom" data-title="เลือกยี่ห้อรถ" data-theme="white" >
                    <? if($arr[web_car][car_brand]<>''){ ?> 
                     
                      <option value="<?=$arr[web_car][car_brand]?>"><?=$arr[web_car][car_brand]?></option>
                      
                      <? } ?>
                     
                     <option value="">- เลือกยี่ห้อ -</option>
                      	<? 
                     		foreach($cars as $value){ 
                     		?>
								  <option value="<?=$value;?>" <?=$selected_car;?> ><?=$value;?></option>
							<? }
                     	?>
                     </select>
                	 <script type="text/javascript">
                                $(function(){
                                    
                                    $('#car_brand').mobileSelect({
									    onClose: function(){        
									        console.log('onClose: '+this.val());
									    },
									    onOpen: function(){
									        console.log('onOpen: '+this.val());
									    },
									     buttonSave: 'ตกลง',
									     buttonCancel: 'ยกเลิก'
									});
									
                                })
                                </script>
</table>

        
                     
		    </div>  
            
            
            
            
            
   
 
  <div class="<?= $coldata?>">
                                         
                                         
                            <table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td width="50%"><div class="topicname">รุ่น / ปีที่ผลิต</div>
                    <input class="form-control" type="text" name="car_model" id="car_model"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_car][car_sub_brand]?>"   ></td>
                    
                    
                    
      <td width="50%"><div class="topicname">สีรถ</div>
                     <!--<select class="form-control" name="car_color" id="car_color">-->
                      <select class="form-control mobileSelect" id="car_color2" name="car_color" data-animation="zoom" data-title="เลือกสีรถ" data-theme="white" >
                
 
                     
         			   <option value="White"  <? if($arr[web_car][car_color]=='White'){ echo 'selected=selected';} ?>  >ขาว</option>
                       <option value="Black" <? if($arr[web_car][car_color]=='Black'){ echo 'selected=selected';} ?>>ดำ</option>
                       <option value="Yellow" <? if($arr[web_car][car_color]=='Yellow'){ echo 'selected=selected';} ?>>เหลือง</option>
                       <option value="Green" <? if($arr[web_car][car_color]=='Green'){ echo 'selected=selected';} ?>>เขียว</option>
                        <option value="Red" <? if($arr[web_car][car_color]=='Red'){ echo 'selected=selected';} ?>>แดง</option>
                        <option value="Gray" <? if($arr[web_car][car_color]=='Gray'){ echo 'selected=selected';} ?>>เทา</option>
                       <option value="Golden Bronze" <? if($arr[web_car][car_color]=='Golden Bronze'){ echo 'selected=selected';} ?>>บรอนด์ทอง</option>
                       <option value="Silver Bronze" <? if($arr[web_car][car_color]=='Silver Bronze'){ echo 'selected=selected';} ?>>บรอนด์เงิน</option>
                     </select>
                     
                     <script type="text/javascript">
                                $(function(){
                                    
                                    $('#car_color2').mobileSelect({
									    onClose: function(){        
									        console.log('onClose: '+this.val());
									    },
									    onOpen: function(){
									        console.log('onOpen: '+this.val());
									    },
									     buttonSave: 'ตกลง',
									     buttonCancel: 'ยกเลิก'
									});
									
                                })
                       </script>
					  </td>
    </tr>
  </tbody>
</table>
                        
					</div> 

 
                     
                     
                     
                     
	 
					 
					 
                    <div class="<?= $coldata?>">
                    
    
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td width="50%">            
                     <div class="topicname">ทะเบียนรถ</div>
                    <input class="form-control" type="text" name="plate_num" id="plate_num"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_car][plate_num];?>" ></td>
      <td width="50%">   <div class="topicname">จังหวัด</div>
                     <!--<select class="form-control" name="province" id="province"  >-->
                      <select class="form-control mobileSelect" id="province" name="province" data-animation="zoom" data-title="เลือกจังหวัด" data-theme="white" >
                      	<option value="">- เลือก -</option>
                      	<? foreach($arr_province as $value){ ?>
                      			<option value="<?=$value;?>"><?=$value;?></option>
                      	<? } ?>
                     </select>
                     <script type="text/javascript">
                                $(function(){
                                    
                                    $('#province').mobileSelect({
									    onClose: function(){        
									        console.log('onClose: '+this.val());
									    },
									    onOpen: function(){
									        console.log('onOpen: '+this.val());
									    },
									     buttonSave: 'ตกลง',
									     buttonCancel: 'ยกเลิก'
									});
									
                                })
                     </script>
 </td>
    </tr>
  </tbody>
</table>

                    
         </div>           
                    
                    
                    
                    
                    
                    
			
 
                  
	 
	 
                  
                    <div class="<?= $coldata?>">
				 
                     <div class="topicname">สีป้ายทะเบียน</div>
                     
                    <!-- <select  class="form-control"  name="plate_color"     id="plate_color">-->
    				<select class="form-control mobileSelect" id="plate_color" name="plate_color" data-animation="zoom" data-title="เลือกสีป้ายทะเบียน" data-theme="white" >
                       <option value="" >-- เลือกสีป้ายทะเบียน --</option>
                       <option value="Green"  <? if($arr[web_car][plate_color]=='Green'){ echo 'selected=selected';} ?> >ป้ายเขียว</option>
                       <option value="Yellow"  <? if($arr[web_car][plate_color]=='Yellow'){ echo 'selected=selected';} ?>>ป้ายเหลือง</option>
                       <option value="Red"  <? if($arr[web_car][plate_color]=='Red'){ echo 'selected=selected';} ?>>ป้ายแดง</option>
                       <option value="Black" <? if($arr[web_car][plate_color]=='Black'){ echo 'selected=selected';} ?> >ป้ายดำ</option>
                       
                     </select>
                     <script type="text/javascript">
                                $(function(){
                                    
                                    $('#plate_color').mobileSelect({
									    onClose: function(){        
									        console.log('onClose: '+this.val());
									    },
									    onOpen: function(){
									        console.log('onOpen: '+this.val());
									    },
									     buttonSave: 'ตกลง',
									     buttonCancel: 'ยกเลิก'
									});
									
                                })
                     </script>
 
                     
                     
                     
            
		  </div> <!-- end col -->
					 
                   
          
	
    
    
      <style>
				
				.plate-color {
    border-radius: 50%; 
 
    padding: 10px; 
    width: 45px;
    height: 20px; 
 
	border: solid 5px #FFFFFF;
 
}



				.plate-color-active-- {
    border-radius: 50%; 
 
    padding: 10px; 
    width: 40px;
    height: 30px; 
 
	border: solid 5px #FFFFFF;
 
}



@-webkit-keyframes DIV-BORDER-STEP {
	 
    0%   {  }
    50%  {border-color: #FFF200 }
    100% { }
}

 @-moz-keyframes DIV-BORDER-STEP {
 
    0%   {  }
    50%  {border-color: #FFF200 }
    100% { }
}




.plate-color-active {
 
 
     border-radius: 50%; 
 
       padding: 10px; 
    width: 45px;
    height: 20px; 
 
	border: solid 5px #FFFFFF;
 
 
 
	   -moz-animation: DIV-BORDER-STEP 1s infinite;
	  
 
    -webkit-animation: DIV-BORDER-STEP 1s infinite;
	
 
}


				
				
				</style>
                     
    
 <script>
 
 
 
 
  
		 
  $(".plate-color").click(function(){ 
  
   var data_color = $(this).attr('data_color');
   
   $(".plate-color-active").addClass("plate-color");
  
    $(".plate-color").removeClass("plate-color-active");
	 $(".plate-color-active").removeClass("plate-color-active");
	
	
  
    $("#car_"+data_color).addClass("plate-color-active");
  
  
  
 
  
 
document.getElementById('plate_color_name').value=data_color;
 //// 
 
 
		 
 	 });

		 
		 
		 </script>      
         	 
 
 
  

 
                    

          <div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
 
 
 

<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_car_1"></i><br>

ถ่ายภาพด้านหน้ารถ

<div style="padding:5px;">

<div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_car_1" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
    </div>
    
    

    

 <img
 
   <? if($_GET[id]){ ?>

  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_car_1.jpg" 

<? }  ?>
 
 
 
 
 
  id="image_id_car_1" name="image_id_car_1"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>
 
 
  
    </div>
    
   
   
    
          <div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
    
<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_car_2"></i><br>

ถ่ายภาพด้านข้างรถ

<div style="padding:5px;">

<div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_car_2" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
    </div>
    
    

    

 <img 
    <? if($_GET[id]){ ?>

  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_car_2.jpg" 

<? }  ?>
 
 
 
 
 
 
 
 id="image_id_car_2" name="image_id_car_2"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>
 
 
  
    </div>
    
    
    
    
    
    
          <div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
    
<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_car_3"></i><br>

ถ่ายภาพด้านในรถ

<div style="padding:5px;">

<div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_car_3" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
    </div>
    
 
    

 <img
 
 
    <? if($_GET[id]){ ?>

  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_car_3.jpg" 

<? }  ?>
 
 
 
 
 
  id="image_id_car_3" name="image_id_car_3"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>
 
 
  
    </div>
    
 
    
    
                
                   <div  id="send_form_data"></div>            
                   
 
 <input class="form-control" type="hidden" name="add_new_car_type" id="add_new_car_type"   onkeypress="PasswordEnter(this,event)"   value="<?=$_GET[type]?>" >
   <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true" onkeypress="PasswordEnter(this,event)"   value="" >
                       <input class="form-control" type="hidden" name="drivername" id="drivername"   onkeypress="PasswordEnter(this,event)"   value="<?=$user_id?>" >
                    
<div class="<?= $coldata?>"><br>


 <table width="100%"  border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;">
  <tr>
  	<td width="50%"  class="pad-l-5"><button type="reset" id="reset_form_addcar" class="btn btn-block btn-default"  style="width:width:100%;padding:10px;">
  	รีเซ็ต</button></td>
    <td width="50%" class="pad-r-5"><button id="submit_step_3" type="button" class="btn btn-block btn-primary" style="width:100%;padding:10px;background-color:#3b5998; ">
    บันทึกข้อมูล</button></td>
    
  </tr>
</table><br>

</div>
</div>                 
					 
					
        <? if($_GET[id]){ 
		
	 $action='edit';
		
		
		} else {
			
					$action='add';
			
		}
		
		?>             
                    
                    
                    
      
  
<script>
 /// check login 
$('#reset_form_addcar').click(function(){
	
	 $(this).closest('form').find("input[type=text], textarea").val("");
	
});

$("#submit_step_3").click(function(){ 

if(document.getElementById('car_brand').value=="") {
alert('กรุณาเลือกยี่ห้อรถ'); 
document.getElementById('car_brand').focus() ; 
return false ;
}

 
 
 /*
if(document.getElementById('password').value=="") {
alert('กรุณากรอกรหัสผ่าน'); 
document.getElementById('password').focus() ; 
return false ;
}

*/

/*
if(document.getElementById('car_model').value=="") {
alert('กรุณากรอกชื่อรุ่น / ปีที่ผลิต'); 
document.getElementById('car_model').focus() ; 
return false ;
}

*/

if(document.getElementById('plate_num').value=="") {
alert('กรุณากรอกหมายเลขทะเบียนรถ'); 
document.getElementById('plate_num').focus() ; 
return false ;
}



if(document.getElementById('check_photo_id_car_1').value=="") {
	
alert('กรุณาถ่ายภาพด้านหน้ารถ'); 

document.getElementById('check_photo_id_car_1').focus() ; 
return false ;
}
 
 
 if(document.getElementById('check_photo_id_car_2').value=="") {
	
alert('กรุณาถ่ายภาพด้านข้างรถ'); 

document.getElementById('check_photo_id_car_2').focus() ; 
return false ;
}

if(document.getElementById('check_photo_id_car_3').value=="") {
	
alert('กรุณาถ่ายภาพข้างในรถ'); 

document.getElementById('check_photo_id_car_3').focus() ; 
return false ;
}
 
 



/*if(document.getElementById('idcard').value=="") {
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



 
 
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าข้อมูลถูกต้อง",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '<?=$main_color?>',
		confirmButtonText: 'ใช่',
		cancelButtonText: "ไม่ใช่",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
	 
  var url="go.php?name=car&file=savedatas&type=add&action=add&id=<?=$_GET[id]?>&type=<?=$_GET[type]?>"
//	url=url+"&iddriver_finish="+document.getElementById('iddriver_finish').value;
 
	 
 $.post(url,$('#myform_data').serialize(),function(response){
//   $('#send_form_data').html(response);
		console.log('save');
		swal("บันทึกสำเร็จ", "กดปุ่มเพื่อปิด!", "success");
  });
  
  
  

 

 
//swal("ยืนยัน", "success");

////
  
 
	//  alert('dd');
    } else {
      swal("Cancelled", "", "error");
    }
	});
 
 
 
 
  
  
 });
 </script>  
 <div style="display:none">
 
 <?  include ("mod/car/photo/upload_car_pic.php");?>
 
 </div>
 
 <br>
 
  <?
 $rand = substr(str_shuffle('123456789012345678901234567890'),0,30);
 
 ?>
 


  							

 
 
   <input class="form-control" type="hidden" name="check_photo_id_car_1" id="check_photo_id_car_1"   onkeypress="PasswordEnter(this,event)"   value="<?=$check_photo?>" >
    
    
     <input class="form-control" type="hidden" name="check_photo_id_car_2" id="check_photo_id_car_2"   onkeypress="PasswordEnter(this,event)"   value="<?=$check_photo?>" >
    
     <input class="form-control" type="hidden" name="check_photo_id_car_3" id="check_photo_id_car_3"   onkeypress="PasswordEnter(this,event)"   value="<?=$check_photo?>" >
 
      <input class="form-control" type="hidden" name="check_code" id="check_code"   onkeypress="PasswordEnter(this,event)"   value="<?=$rand ?>" >
  
 <script>

 
/////////  idcard
 $("#icon_camera_id_card").click(function(){  
 
 
  
  document.getElementById('upload_pic_type').value='id_card';
  
 
  $("#load_chat_camera").click(); 
  
  });
  
  
  /////////  id driving
 $("#icon_camera_id_driving").click(function(){  
 
  
  document.getElementById('upload_pic_type').value='id_driving';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
  
  
  
  
  
    /////////  id driving
 $("#icon_camera_id_car").click(function(){  
   
  document.getElementById('upload_pic_type').value='id_car'; 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
      /////////  id driving
 $("#icon_camera_id_insure").click(function(){  
 
  
  document.getElementById('upload_pic_type').value='id_insure';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
  
  
  
  
  /////////  id driving
 $("#icon_camera_id_driver").click(function(){  
 
  
  document.getElementById('upload_pic_type').value='id_driver';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
    
        /////////  id driving
 $("#icon_camera_id_car_1").click(function(){  
 
  
  document.getElementById('upload_pic_type').value='id_car_1';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
          /////////  id driving
 $("#icon_camera_id_car_2").click(function(){  
 
  
  document.getElementById('upload_pic_type').value='id_car_2';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
            /////////  id driving
 $("#icon_camera_id_car_3").click(function(){  
 
  
  document.getElementById('upload_pic_type').value='id_car_3';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
  
  
  
  </script>
  
</form>
  