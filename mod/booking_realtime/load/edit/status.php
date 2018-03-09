






<div class="div-all-cancel">
  
  <div style="border-radius: 3px; border: 1px solid #ddd;   background:#FFFEF2; margin-right:10px; margin-left:10px; padding-bottom:10px; margin-top:10px; ">
  
 
 <div class="<?= $coldata?>">
     <div class="topicname">สถานะการลงทะเบียน</div>
            
 

<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
    
       <td width="33%">
       
      
       
       <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
    
      <td width="30">
 
 
 
 
       
 
    
      <input     name="check_confirm" type="radio" id="check_new" style="height:25px; width:25px;" value="NEW" 
      
          <? if($arr[project][status]=='NEW'){?>    checked="checked" <? } ?>
      
    
      
    >
      
      </td>
      <td><div   style="color:#3D8CBC;"  class="font-26" ><b>ใหม่</div></td>
    </tr>
  </tbody>
</table>

 
</td>



    
    
      <td width="33%">
      
      
 
      
      
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
    
      <td width="30">
      
  
 

 
      <input      name="check_confirm" type="radio" id="check_confirm" style="height:25px; width:25px;" value="CONFIRM" 
      
      <? if($arr[project][status]=='CONFIRM'){?>    checked="checked" <? } ?>
      
    >
      
      </td>
      <td><div   style="color:#1B7E5A;"  class="font-26" ><b>ยืนยัน</div></td>
    </tr>
  </tbody>
</table>

 


</td>




      <td width="33%">
      
        
      
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
    
      <td width="30">
      
 <a  class="btn-check-confirm"  value="CANCEL" data="check_cancel">  
      <input   name="check_confirm" type="radio" id="check_cancel" style="height:25px; width:25px;" value="CANCEL"
      
    <? if($arr[project][status]=='CANCEL'){?>    checked="checked" <? } ?>
    
    
     >    </a>
  
  

  
      </td>
      <td><div   style="color:#ff0000; "  class="font-26"><b>ยกเลิก</div></td>
    </tr>
  </tbody>
</table>



</td>


    </tr>
  </tbody>
</table>
 
 

 <input name="check_booking_status" type="hidden"  required="true" class="form-control" id="check_booking_status" style="padding:4px 2px;width:97%;"   value="<?=$arr[project][status]?>"  >
 
                
  </div>
 
 
 
 
 
 
 
 
 
 
 
 
 
  <div class="<?= $coldata?>" id="show_photo" style="display:nones">
  
  
 <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"     value="" >
 
 <input class="form-control" type="hidden" name="work_vc" id="work_vc"       value="<?=$arr[project][invoice]; ?>" >
 
     <input class="form-control" type="hidden" name="check_photo_edit_work" id="check_photo_edit_work"    value="<?=$arr[project][booking_pic]; ?>" >
 
 <div class="take_photo" ><center>
 
 
 
 
 

 



 
<i class="fa  fa-camera take-photo-icon"  id="icon_camera_edit_work"></i><br>
ถ่ายภาพใบลงทะเบียน

<div style="padding:5px;">

<div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_edit_work" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
    </div>
    
 

 <img 
 
 
 
  <? if($arr[project][booking_pic]=='1' ){ ?>  
 
 
 src="../data/fileupload/edit_work/<?=$arr[project][invoice]?>_big.jpg?v=<?=$arr[project][update_date]?>" 
 
 
 <? } ?>
 
 
 
 name="image_edit_work" id="image_edit_work"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>
 </div>
 
  
 
 
 
 
 
 
 
   <div class="<?= $coldata?>" id="show_register_cancel">
			            <div >        
                     
 <div class="topicname">สาเหตุลงทะเบียนไม่ได้</div>
 
 
 

 <table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tbody>
    <tr>
      <td class="font-24"><span style="height:35px;"></span> <select class="form-control"  name="cancel_type" id="cancel_type" >



        <option value="">- เลือกสาเหตุ -</option>
        
        <?
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
                                    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
                                  ///  $res[category] = $db->select_query("SELECT * FROM  guest_nation  ORDER BY id  ");
								  
					  $res[category] = $db->select_query("SELECT * FROM  register_cancel where status=1  ORDER BY  id  desc");
                       
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] == $arr[project][cancel_type]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][topic_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
        
      </select></td>
      </tr>
  </tbody>
</table>

 
          </div>
  </div>
					
 
 
   </div>
 
  </div>
  
           

 
  
  
  <script>
 
 /// check login
 
      $('#check_new').on('ifChecked', function () { 
	  

 
    document.getElementById('check_booking_status').value='NEW';
  	$("#show_photo").hide();
	$("#show_register_cancel").hide();
 document.getElementById('cancel_type').value="";
	
	
  });
  
  
 
  
 $('#check_confirm').on('ifChecked', function () { 
 
 
    document.getElementById('check_booking_status').value='CONFIRM';
					$("#show_photo").show();
		$("#show_register_cancel").hide();
	
	document.getElementById('cancel_type').value="";
  
  });
 
 
 
 
    $('#check_cancel').on('ifChecked', function () { 
 
    document.getElementById('check_booking_status').value='CANCEL';
	
			$("#show_photo").show();
		$("#show_register_cancel").show();
		
			document.getElementById('cancel_type').value="";
	

	
	
  
  });
  
  




  $(function () {
	  
    $('#check_new').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  
  
    $(function () {
	  
    $('#check_confirm').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });
  });
  
  
  
 
    $(function () {
    $('#check_cancel').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-red',
      increaseArea: '20%' // optional
    });
	
	
	
  });
  
  
  ///////
  
  
  $("#show_photo").hide();
  
 		$("#show_register_cancel").hide();
  
  
  ////
  
  
  
  
  
  
  
  
</script>
      
 
  
  
  
  
<script>
/////////  idcard
 $("#icon_camera_edit_work").click(function(){  
 
   
  document.getElementById('upload_pic_type').value='edit_work';
  
 
  $("#load_chat_camera").click(); 
  
  });
  
  
  //// 
 
      var url_load_price= "popup.php?name=booking&file=price";
  
    url_load_price=url_load_price+"&adult="+document.getElementById('adult').value;
	
    url_load_price=url_load_price+"&nation="+document.getElementById('nation').value;
	
	url_load_price=url_load_price+"&pro="+document.getElementById('program').value;
	
	 url_load_price=url_load_price+"&price_plan="+document.getElementById('price_plan').value;
	
  
  $('#send_booking_data').load(url_load_price); 
  
  
</script>

  
  
  


   



  <? if($arr[project][status]=='CANCEL'){?>
     
     

 
  <script>  
    $( document ).ready(function() {
  
 $("#show_register_cancel").show();  
   });
 
 ///$("#show_photo").show();
  </script>
  
  <? } ?>
  
  
       <? if($arr[project][status]=='CONFIRM'){?>
       
 
 
  <script>  
  
  $( document ).ready(function() {
	  
	    $("#show_photo").show();
 
 $("#show_register_cancel").hidden();  
 
  
  });
 
  </script>
  
  <? } ?>

  

<script>
/// check login

$("#edit_booking_data").click(function(){ 

 

/*

 
if(document.getElementById('pickup_place').value=="") {
alert('กรุณากรอกสถานที่รับ'); 
document.getElementById('pickup_place').focus() ; 
return false ;
}




*/

 
 if(document.getElementById('check_wait_status').value=="") {
	 
 
alert('กรุณาประเภทรอส่งแขกกลับ'); 

 //// 
 document.getElementById('check_wait_area').focus() ; 
 
return false ;
}




 ////// รอ

 if(document.getElementById('check_wait_status').value=="area") {

 /// เวลากลับ
 if(document.getElementById('transfer_time').value=="") {	  
alert('กรุณาเลือกเวลากลับ');  
 document.getElementById('transfer_time').focus() ; 
 return false ;
}

/// 
 if(document.getElementById('to_place_area').value=="") {	  
alert('กรุณาเลือกสถานที่กลับ');  
 document.getElementById('to_place_area').focus() ; 
 return false ;
}


}



//////  ส่งออก

 if(document.getElementById('check_wait_status').value=="out") {

 /// เวลากลับ
 if(document.getElementById('transfer_time_airport').value=="") {	  
alert('กรุณาเลือกเวลากลับ');  
 document.getElementById('transfer_time_airport').focus() ; 
 return false ;
}

/// 
/*
 if(document.getElementById('to_place').value=="") {	  
alert('กรุณาเลือกสถานที่กลับ');  
 document.getElementById('to_place').focus() ; 
 return false ;
}

*/

}








 
/*

if(document.getElementById('airout_time').value=="") {
alert('กรุณาเลือกเวลาถึงโดยประมาณ'); 
document.getElementById('airout_time').focus() ; 
return false ;
}

 */
 
 if(document.getElementById('namedriver').value=="") {
alert('กรุณากรอกชื่อคนขับรถ'); 
document.getElementById('namedriver').focus() ; 
return false ;
}
 

if(document.getElementById('car_plate').value=="") {
alert('กรุณากรอกหมายเลขทะเบียนรถ'); 
document.getElementById('car_plate').focus() ; 
return false ;
}

 

if(document.getElementById('adult').value=="0") {
alert('กรุณาเลือกจำนวนผู้ใหญ่'); 
document.getElementById('adult').focus() ; 
return false ;
}


if(document.getElementById('child').value=="") {
alert('กรุณาเลือกจำนวนเด็ก'); 
document.getElementById('child').focus() ; 
return false ;
}


  if(document.getElementById('nation').value=="") {
alert('กรุณาเลือกสัญชาติ'); 
document.getElementById('nation').focus() ; 
return false ;
}

  if(document.getElementById('payment_type').value=="") {
alert('กรุณาเลือกช่องทางการรับเงิน'); 
document.getElementById('payment_type').focus() ; 
return false ;
}
 
 
 ///// 
 
 
 if(document.getElementById('check_booking_status').value=="CONFIRM") {
 
 
 
 
	 
/// ถ้าไม่ถ่ายภาพ  check_photo_edit_work

 if(document.getElementById('check_photo_edit_work').value=="") {

 
alert('กรุณาถ่ายภาพใบลงทะเบียน'); 

$("#icon_camera_edit_work").click();
return false ;
 
 }
 
 
 }
 
 
 
 ////
 
  if(document.getElementById('check_booking_status').value=="CANCEL") {
	 
	 
/// ถ้าไม่ถ่ายภาพ  check_photo_edit_work

 if(document.getElementById('cancel_type').value=="") {
 
alert('กรุณาเลือกสาเหตุลงทะเบียนไม่ได้'); 

 document.getElementById('cancel_type').focus() ; 
return false ;
 
 }

 
 




}
 
 //
 
 
 
 
 
 
    swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่ากรอกข้อมูลถูกต้อง",
	type: "info",
		showCancelButton: true,
		confirmButtonColor: '#5BC0DE',
		confirmButtonText: 'แน่ใจ',
		cancelButtonText: "ไม่แน่ใจ",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
 
    
 
 
 /// send data
	
 $.post('popup.php?name=booking&file=savedata&action=edit&type=driver&id=<?=$_GET[id]?>&vc=<?=$arr[project][invoice]?>&driver=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_booking_data').html(response);
  });
  
  
 
  
  
 ////$("#load_mod_popup" ).toggle();
  
  
  
  //$('.loader').show();
	var date_report = $("#date_report").val();
	//alert(date_report);
	
  $('#load_booking_data').html(load_main_icon_big);
	
	//var url_place_th = "go.php?name=load/all&file=all&server=th&day="+$("#date_report").val()+"";
	var url = "go.php?name=booking/load&file=work_all&find=day&day="+$("#date_report").val()+"";
	 
 
	 $('#load_booking_data').load(url); 
	
  
	//  alert('dd');
    } else {
  //    swal("Cancelled", "", "error");
  
  
  
  
    }
	
	
	});

 
 
 
 

  
 //// $("#send_booking_data").load('load.php');
  
  
 });
 
 
 
 
 
 
 
 
 
 
 
 
 
</script>  

  