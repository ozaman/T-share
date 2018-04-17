


<link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css"> 
<script src="js/jquery-main.js"></script> 










<script   src="calendar/js/th.js"></script>





<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:20px; font-weight:bold; color: <?=$text_topic_color?> ; text-align:left;  
 
}

.topicname_sub { padding-top:0px; padding-left:0px; padding-bottom:5px; font-size:16px; font-weight:bold; color: #333333 ; text-align:left;  
 
}


 .take_photo { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #333333 ; text-align:left;  
 
 
  border: 1px solid #E6E6E6; margin-top:10px; border-radius: 5px; background-color:#F6F6F6; 
 
 
}

 .take_photo:hover { border: 0px solid <?=$main_color?>; box-shadow: 0px 0px 10px #999999; 
 
 
}

 

.take-photo-icon { padding-top:0px; padding-left:0px; padding-bottom:5px; font-size:60px; font-weight:bold; color: <?=$main_color_sorf?>; text-align:left;  
 
}


 

 
-->
</style>  
<style>
.ui-datepicker {
    width: 90%; max-width:400px; z-index:99;
    padding: 0; left:0px;
  }
  .ui-widget {
    font-size: 16px;  
  }
  .ui-datepicker table {
    font-size:18px; 
  }
</style>









<script>

  $(function(){

	$("#idcard_finish").datepicker({ dateFormat: 'yy-mm-dd',
	dateFormat: 'yy-mm-dd',

	            changeMonth: true,
            changeYear: true,
	todayHighlight: true,
	minDate: '-10Y', maxDate: '+10Y',
	//showOn: "both", 
	// buttonImage: 'calendar/dateselect.gif',
	//buttonText: "<i class='fa fa-calendar'></i>",
	// buttonImageOnly: true ,    
  numberOfMonths: 1,
  onSelect: function(dateText, inst) {
  
//$('.loader').show();
	var date_report = $("#date_report").val();
	//alert(date_report);
	
 
 
		

    }
	 
	 }
 
	);
 
});


  </script> 
 

<script type="text/javascript">

$(document).ready(function() {

    $("#datepicker").datepicker();

// $('#date_report').datepick({altField: '#star_cal' 	, dateFormat: 'yyyy-mm-dd' 	, showTrigger: '#calImgInx' }); 

$("#btn_idcard_finish").click(function(){
 
 $('#idcard_finish').datepicker('show'); 

});

 

$("#btn_idcard_finish").click(function(){

	//$('.loader').show();
	var date_report = $("#date_report").val();
	 
	
});
 
        });
</script> 


<script>

  $(function(){
 
	$( "#exp_insur").datepicker({ dateFormat: 'yy-mm-dd',
	dateFormat: 'yy-mm-dd',
 
	            changeMonth: true,
            changeYear: true,
	todayHighlight: true,
	minDate: '-10Y', maxDate: '+10Y',
	//showOn: "both", 
	// buttonImage: 'calendar/dateselect.gif',
	//buttonText: "<i class='fa fa-calendar'></i>",
	// buttonImageOnly: true ,    
  numberOfMonths: 1,
  onSelect: function(dateText, inst) {
  
//$('.loader').show();
	var date_report = $("#date_report").val();
	//alert(date_report);
	
	$('#load_cn').hide();
	
	//var url_place_th = "go.php?name=load/all&file=all&server=th&day="+$("#date_report").val()+"";
	var url_place_th = "go.php?name=load/today&file=timeline&find=day&day="+$("#date_report").val()+"";
	$('#load_th').show();
	$('#load_th').load('load/page/loading.php');
	$('#load_th').load(url_place_th); 
 
		

    }
	 
	 }
 
	);
 
});


  </script> 
  
  
  
  
  
  
  
  <script>

  $(function(){
 
	$( "#iddriver_finish").datepicker({ dateFormat: 'yy-mm-dd',
	dateFormat: 'yy-mm-dd',
 
	            changeMonth: true,
            changeYear: true,
	todayHighlight: true,
	minDate: '-10Y', maxDate: '+10Y',
	//showOn: "both", 
	// buttonImage: 'calendar/dateselect.gif',
	//buttonText: "<i class='fa fa-calendar'></i>",
	// buttonImageOnly: true ,    
  numberOfMonths: 1,
  onSelect: function(dateText, inst) {
  
//$('.loader').show();
	var date_report = $("#date_report").val();
	//alert(date_report);
	
	$('#load_cn').hide();
	
	//var url_place_th = "go.php?name=load/all&file=all&server=th&day="+$("#date_report").val()+"";
	var url_place_th = "go.php?name=load/today&file=timeline&find=day&day="+$("#date_report").val()+"";
	$('#load_th').show();
	$('#load_th').load('load/page/loading.php');
	$('#load_th').load(url_place_th); 
 
		

    }
	 
	 }
 
	);
 
});


  </script> 
  
  
  
  
  
  
  
  
 

<script type="text/javascript">
$(document).ready(function() {
    $("#datepicker").datepicker();

// $('#date_report').datepick({altField: '#star_cal' 	, dateFormat: 'yyyy-mm-dd' 	, showTrigger: '#calImgInx' }); 

$("#btn_iddriver_finish").click(function(){
 
 $( "#iddriver_finish").datepicker('show'); 

});

 

$("#btn_iddriver_finish").click(function(){

	//$('.loader').show();
	var date_report = $("#date_report").val();
	 
	
});
 
        });
</script> 

 
<div class="topicname_main"><br>
<i class="fa fa-folder-open" style="font-size:24px; height:20px; color:<?=$left_icon_menu_color?>"></i> ข้อมูลและเอกสารสำคัญ</div>

 <div class="box box-default">
 
 
   
  
 
  <div class="box-body"  style="margin-top:0px;">
         <div class="row">
		            <div class="col-md-12">
 
				 
		      <div> 
                <div class="topicname"><i class="fa  fa-credit-card"></i>&nbsp;บัตรประจำตัวประชาชน </div>

				  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" style="padding-right:5px; ">
    
   <div class="topicname_sub">หมายเลขบัตรประชาชน</div>
    
    
    <input name="idcard" type="text" class="form-control" id="idcard" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_driver_edit][idcard];?>" maxlength="13"     ></td>
     
  </tr>
    <tr>
    <td colspan="2" style="padding-right:5px; padding-top:10px; ">
    
       <div class="topicname_sub">วันหมดอายุ</div>
    
    <div class="input-group date">
    
    
   
                  <input type="text" class="form-control pull-right" value="<?=$arr[web_driver_edit][idcard_finish];?>"  name="idcard_finish" id="idcard_finish"  readonly="true" style="background-color:#FFFFFF; height:35px; font-size:24px; ">               
                  <div class="input-group-addon"  id="btn_idcard_finish" style="cursor:pointer ; width:40px; margin-right:5px;">
                     <i class="fa fa-calendar" style="font-size:24px; height:20px;"></i> 
                  </div>
                </div></td>
    </tr>
</table>


<?

if($_GET[id]<>""){
	
	
	$rand=$arr[web_driver_edit][code];
	
	$check_photo=1;
	
}


if(!$_GET[id]){
	
	
$rand = substr(str_shuffle('123456789012345678901234567890'),0,30);
$check_photo=0;
	
}




?>
 
 
<input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true" onkeypress="PasswordEnter(this,event)"   value="" >

    <input class="form-control" type="hidden" name="check_photo_id_card" id="check_photo_id_card"   onkeypress="PasswordEnter(this,event)"   value="<?=$check_photo?>" >
    
        <input class="form-control" type="hidden" name="check_photo_id_driving" id="check_photo_id_driving"   onkeypress="PasswordEnter(this,event)"   value="<?=$check_photo?>" >
        
        
                <input class="form-control" type="hidden" name="check_photo_id_insure" id="check_photo_id_insure"   onkeypress="PasswordEnter(this,event)"   value="<?=$check_photo?>" >
    
 <input class="form-control" type="hidden" name="check_photo_id_driver" id="check_photo_id_driver"   onkeypress="PasswordEnter(this,event)"   value="<?=$check_photo?>" >
  <input class="form-control" type="hidden" name="check_photo_id_car_1" id="check_photo_id_car_1"   onkeypress="PasswordEnter(this,event)"   value="<?=$check_photo?>" >
    
    
     <input class="form-control" type="hidden" name="check_photo_id_car_2" id="check_photo_id_car_2"   onkeypress="PasswordEnter(this,event)"   value="<?=$check_photo?>" >
    
     <input class="form-control" type="hidden" name="check_photo_id_car_3" id="check_photo_id_car_3"   onkeypress="PasswordEnter(this,event)"   value="<?=$check_photo?>" >
    
  
  
  
  
       <input class="form-control" type="hidden" name="check_code" id="check_code"   onkeypress="PasswordEnter(this,event)"   value="<?=$rand ?>" >
  
  
  
<div class="take_photo" ><center>
 
 
 

<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_card"></i><br>

ถ่ายภาพบัตรประชาชน

<div style="padding:5px;">

<div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_card" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
    </div>
    
    

    

 <img 
 
  <? if($_GET[id]){ ?>

  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_card.jpg" 

<? }  ?>

 
 id="image_id_card" name="image_id_card"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>
 
 
 
			  </div>
			  
              
              
              
			  
			           <div><br>

                     <div class="topicname"><i class="fa fa-credit-card"></i>&nbsp;ใบอนุญาตขับขี่</div>
					 
					   <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" style="padding-right:5px; ">
    
    <div class="topicname_sub">หมายเลขใบขับขี่</div>
    
    
    <input class="form-control" type="text" name="iddriving_new" id="iddriving_new"  required="true" onkeypress="PasswordEnter(this,event)"   value="<?=$arr[web_driver_edit][iddriving];?>" ></td>
    
  </tr>
  <tr>
    <td colspan="2" style="padding-right:5px; padding-top:10px; ">
    
    
    <div class="topicname_sub">วันหมดอายุ</div>
    
    <div class="input-group date">
   
                  <input type="text" class="form-control pull-right" value="<?=$arr[web_driver_edit][iddriving_finish];?>"  name="iddriver_finish" id="iddriver_finish"    style="background-color:#FFFFFF; height:35px; font-size:24px; ">         
                  
                  
                  
                  
                        
                  <div class="input-group-addon"  id="btn_iddriver_finish" style="cursor:pointer ; width:40px; margin-right:5px;">
                     <i class="fa fa-calendar" style="font-size:24px; height:20px;"></i> 
                  </div>
                </div></td>
    </tr>
  
</table>
 
 
 
 
 

 
<div class="take_photo" ><center>









<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_driving"></i><br>
ถ่ายภาพใบขับขี่

<div style="padding:5px;">

<div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_driving" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
    </div>
    
 

 <img
 
  
  <? if($_GET[id]){ ?>

  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_driving.jpg" 

<? }  ?>

  
 
 
  id="image_id_driving" name="image_id_driving"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>
 
 
 
			  </div>
            
            
        <!-- end -->    
            
            
            
                <div id="form_document_id_car" style="display:none"><br>

                     <div class="topicname"><i class="fa fa-car"></i>&nbsp;เอกสารจดทะเบียนรถยนต์</div>
					 
					   <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" style="padding-right:5px; ">
    
    <div class="topicname_sub">หมายเลข</div>
    
    
    <input class="form-control" type="text" name="iddriving" id="iddriving"  required="true" onkeypress="PasswordEnter(this,event)"   value="<?=$arr[web_driver_edit][iddriving];?>" ></td>
    
  </tr>
  <tr>
    <td colspan="2" style="padding-right:5px; padding-top:10px; ">
    
    
    <div class="topicname_sub">วันหมดอายุ</div>
    <div class="input-group date">
   
                  <input type="text" class="form-control pull-right" value="<?=$arr[web_driver_edit][iddriver_finish];?>"  name="iddriver_finish" id="iddriver_finish"  readonly="true" style="background-color:#FFFFFF; height:35px; font-size:24px; ">               
                  <div class="input-group-addon"  id="btn_iddriver_finish" style="cursor:pointer ; width:40px; margin-right:5px;">
                     <i class="fa fa-calendar" style="font-size:24px; height:20px;"></i> 
                  </div>
                </div></td>
    </tr>
  
</table>
                    
            </div>
            
            
            
 
            
                        <div><br>
                        
                        
                        
             
<script type="text/javascript">
$(document).ready(function() {
    $("#datepicker").datepicker();

// $('#date_report').datepick({altField: '#star_cal' 	, dateFormat: 'yyyy-mm-dd' 	, showTrigger: '#calImgInx' }); 

$("#btn_insure_finish").click(function(){
 
 $( "#exp_insur").datepicker('show'); 

});

 

$("#btn_insure_finish").click(function(){

	//$('.loader').show();
	var date_report = $("#date_report").val();
	 
	
});
 
        });
</script>            
                        
                        
                        
                        
                        <? if(1==0){ ?>
                        

                     <div class="topicname"><i class="fa fa-wrench"></i>&nbsp;ประกันภัยนรถยนต์</div>
					 
					   <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                       
                       
  <tr>
    <td width="100%" style="padding-right:5px; ">
    
    <div class="topicname_sub">บริษัทประกันภัย</div>
    
    <input class="form-control" type="text" name="insure_company" id="insure_company"  required="true" onkeypress="PasswordEnter(this,event)"   value="<?=$arr[web_driver_edit][insure_company];?>" ></td>
    
  </tr>
                  
                       
  <tr>
    <td width="100%" style="padding-right:5px; ">
    
    <div class="topicname_sub">หมายเลขประกันภัย</div>
    
    <input class="form-control" type="text" name="insure_num" id="insure_num"  required="true" onkeypress="PasswordEnter(this,event)"   value="<?=$arr[web_driver_edit][insure_num];?>" ></td>
    
  </tr>
  <tr>
    <td colspan="2" style="padding-right:5px; padding-top:10px; ">
    
    <div class="topicname_sub">วันหมดอายุ</div>
    
    <div class="input-group date">
   
                  <input type="text" class="form-control pull-right" value="<?=$arr[web_driver_edit][iddriver_finish];?>"  name="exp_insur" id="exp_insur"  readonly="true" style="background-color:#FFFFFF; height:35px; font-size:24px; ">               
                  <div class="input-group-addon"  id="btn_insure_finish" style="cursor:pointer ; width:40px; margin-right:5px;">
                     <i class="fa fa-calendar" style="font-size:24px; height:20px;"></i> 
                  </div>
                </div></td>
    </tr>
  
</table>
                   
                   
               


<div class="take_photo" ><center>

<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_insure"></i><br>
ถ่ายภาพประกันภัย

<div style="padding:5px;">

<div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_insure" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
    </div>
    
    
    
    

 <img 
 
 
 
 
 
 id="image_id_insure" name="image_id_insure"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>
 
 
 
			  </div>
			      
                   
                   
                   
                   
                    
            </div>
            
            
 
            
            
            
					
			 
	 </div> 
		  
		   
        
        
        
        
        
        
        
        
        
        
        
         
					
					
					
                    
                  
	</div>
	 
                 
	
	 <? } ?>
					
   
 
		
		 
 
		 
 
 
 
 

  
  <div class="<?= $coldata?>">
 
   <div  class="bottom_popup_form">
 <table width="100%"  border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;">
  <tr>
    <td width="50%" style="padding:0 px;" class="pad-r-5"><button id="submit_step_2" type="button" class="btn btn-block btn-primary" style="width:100%">บันทึกข้อมูล</button></td>
    <td width="50%" style="padding:0px;" class="pad-l-5"><button type="reset" class="btn btn-block btn-default"  style="width:100% ">รีเซ็ต</button></td>
  </tr>
</table>
 
    </div>
 
 
  
 
 
 
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
  
  
  
  
  <script>
 /// check login 


$("#submit_step_2").click(function(){ 
 
 	 
 
 
 /*
if(document.getElementById('password').value=="") {
alert('กรุณากรอกรหัสผ่าน'); 
document.getElementById('password').focus() ; 
return false ;
}


if(document.getElementById('idcard').value=="") {
	
	///alert(document.getElementById('idcard').value); 
	
alert('กรุณากรอกหมายเลขบัตรประชาชน'); 

document.getElementById('idcard').focus() ; 
return false ;
}



if(document.getElementById('idcard_finish').value=="") {
	
	///alert(document.getElementById('idcard').value); 
	
alert('กรุณากรอกวันหมดอายุบัตรประชาชน'); 

document.getElementById('idcard_finish').focus() ; 
return false ;
}


 

if(document.getElementById('check_photo_id_card').value=="") {
	
 
alert('กรุณาถ่ายภาพบัตรประชาชน'); 

document.getElementById('check_photo_id_card').focus() ; 
return false ;
}

*/
////// ใบขับขี่
 
 if(document.getElementById('iddriving_new').value=="") {
	
	///alert(document.getElementById('idcard').value); 
	
alert('กรุณากรอกหมายเลขใบขับขี'); 

document.getElementById('iddriving_new').focus() ; 
return false ;
}



if(document.getElementById('iddriver_finish').value=="") {
	
	

alert('กรุณากรอกวันหมดอายุใบขับขี'); 

document.getElementById('iddriver_finish').focus() ; 
return false ;
}


 

if(document.getElementById('check_photo_id_driving').value=="") {
	
 
alert('กรุณาถ่ายภาพใบขับขี่'); 

document.getElementById('check_photo_id_driving').focus() ; 
return false ;
}
  
  ///// ประกัย
  
  
  /*
  
  
  
 if(document.getElementById('insure_company').value=="") {
	
	///alert(document.getElementById('idcard').value); 
	
alert('กรุณากรอกชื่อบริษัทประกันภัย'); 

document.getElementById('insure_company').focus() ; 
return false ;
}


 if(document.getElementById('insure_num').value=="") {
	
	///alert(document.getElementById('idcard').value); 
	
alert('กรุณากรอกหมายเลขประกันภัย'); 

document.getElementById('insure_num').focus() ; 
return false ;
}




if(document.getElementById('exp_insur').value=="") {
	
 
alert('กรุณากรอกวันหมดอายุประกันภัย'); 

document.getElementById('exp_insur').focus() ; 
return false ;
}

/*


 /*

if(document.getElementById('check_photo_id_insure').value=="") {
	
 
alert('กรุณาถ่ายภาพกรมธรรพ์ประกันภัย'); 

document.getElementById('check_photo_id_insure').focus() ; 
return false ;
}
  
  
 */
  
 /*
  
 $.post('go.php?name=register&file=savedata&type=user&id=<?=$arr[web_driver_edit][id]?>',$('#myform_regiter').serialize(),function(response){
   $('#send_profile_data').html(response);
  });
  
  
  
  
  
  
  
  
  */
  
  
  
  
  $("#register_step_3").removeClass('disabledbutton');

 

$("#check_icon_step_2").html('<i class="fa fa-check-circle" style="font-size:24px; height:20px; color:#FFF200"></i>');
  
  
 
  
document.getElementById('check_step_2').value=1;

$("#register_step_3").click();

  
  
 });
 </script>  
  