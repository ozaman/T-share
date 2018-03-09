

 <?
 
 
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM  order_booking   WHERE id = '".$_GET[id]."'  order by outdate desc limit  1 ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
 $arr[project] = $db->fetch($res[project]);

 ?>
 





 


<script>

  $("#text_mod_topic_action" ).html("แกไขงาน  <?= $arr[project][invoice]?>");

/*

  $(function(){

	$("#transfer_date").datepicker({ dateFormat: 'yy-mm-dd',
	dateFormat: 'yy-mm-dd',

	            changeMonth: true,
            //changeYear: true,
	todayHighlight: true,
	minDate: 0,  
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
*/

  </script> 


<script type="text/javascript">


 /*


$(document).ready(function() {
    $("#datepicker").datepicker();

// $('#date_report').datepick({altField: '#star_cal' 	, dateFormat: 'yyyy-mm-dd' 	, showTrigger: '#calImgInx' }); 

$("#btn_transfer_date").click(function(){
 
 
 $( "#transfer_date").datepicker('show'); 

});

 

$("#btn_transfer_date").click(function(){

	//$('.loader').show();
	var date_report = $("#transfer_date").val();
	 
	
});
 
        });
		
		*/
</script> 



 
      <script>
			 
			 
			 $( document ).ready(function() {
			 
	
			 $('#btn_chk_booking_place').click(function(){  
			 
			 
			 //		alert(0); 
			 
 
 //     var driver= $('#drivername<?=$i;?>').val();
	  
	  
	  /*
 	  
      var url_map = "empty_style.php<?=$load_transfer_action?>/form/load/data&file=map&driver="+driver; 
	  
	  $('#load_data_driver_<?=$arr[product][id].$i;?>').html('<?=$part_img_load_small?>'); 
	  
	     $('#load_data_driver_<?=$arr[product][id].$i;?>').load(url_map); 
		 
		 
		 */
		 
		 
	    });	 
		 


	
	
		 $('#btn_chk_booking_place_gps').click(function(){  
		 
 	 
		 
 
 //     var driver= $('#drivername<?=$i;?>').val();
	  
   
	  /*
   
      var url_map = "empty_style.php<?=$load_transfer_action?>/form/load/data&file=map&driver="+driver; 
	  
	  $('#load_data_driver_<?=$arr[product][id].$i;?>').html('<?=$part_img_load_small?>'); 
	  
	     $('#load_data_driver_<?=$arr[product][id].$i;?>').load(url_map); 
 	 
		 */
		 
 

    });


			 
			     });
			 
			 </script>       
                    
 
 
 

<? $coldata="col-md-6";?>
<? $coldata3="col-md-6";?>

 <form method="post"  id="edit_form" name="edit_form">

<div class="box box-default" style="padding:0px">

   <div class="box-header with-border">
          <div class="box-title">แก้ไขงาน</b></div>
   </div>
   
        
        
        
         <div class="box-body" >


 
  <div class="row" >
          


            
  <div class="<?= $coldata?>">

        
  
  
              <div style="display:none" id="block_pickup_place">
                <div class="topicname">สถานที่รับ&nbsp;&nbsp;</div>
                
                <div>
                
                <ul class="nav nav-tabs" style="padding-top:0px; height:40px; margin-left:10px; border:none">
 
 
       <li    id="btn_chk_booking_place"  class="active" ><a data-toggle="tab" href="#tab_chk_name"><i class="fa  fa-bank"  fa-spin 6x style="color:#666666;font-size:18px;"></i><strong>เลือกสถาน</strong></a ></li>
 
 
 
 
      <li    id="btn_chk_booking_place_gps" ><a data-toggle="tab" href="#tab_chk_name"><i class="fa  fa-map-marker"  fa-spin 6x style="color:#666666;font-size:20px;"></i><strong>&nbsp;ระบุตำแหน่ง</strong></a ></li>
      
 
  
    

 
   

	
 
  </ul>
  
            </div>      
            
 
            <div id="load_select_place">         
                
                
  <input name="pickup_place" type="text"  required="true" class="form-control" id="pickup_place" style="padding:4px 2px;width:97%;" onkeypress="PasswordEnter(this,event)" value="<?=$arr[project][name_pickup_place]; ?>" >
       
                </div>
                
                
   		      </div> 
                
  </div>  
                     
                     
					
              <!-- /.box-header -->

 <div class="<?= $coldata?>">
 <div>
 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      
      <td width="100%">
      
      
         <div class="topicname">ใช้เวลาเดินทาง</div>
      
      
      
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tbody>
          <tr>
            <td width="50%" style="padding-left:5px;" >
            
            
 
            
 
            <select name="airout_h" id="airout_h" class="form-control" >
            
  <option value=""  >- เลือกชั่วโมง -</option>
            
  <?
			  
			  ///    for($ii=0;$ii<24;$ii++){
			  
				   for($ii=0;$ii<20;$ii++){
 	  
				  ?>
              <option value="<?=$ii;?>" <?  if($arr[project][airout_h]== $ii){ echo "selected=selected";} ?> >
          <?=$ii;?>
                </option>
              <?  } ?>
            </select></td>
            <td width="50%"><select name="airout_m" id="airout_m"class="form-control" >
            
            
            <option value="">- เลือกนาที -</option>
            
              <?
				   for($ii=0;$ii<60;$ii++){
 
				  ?>
              <option value="<?=$ii;?>" <?  if($arr[project][airout_m]== $ii){ echo "selected=selected";} ?> >
              <?=$ii;?>
                </option>
              <?  } ?>
            </select></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
 
 
 
 

    </div> 
  </div>  
                     
                     
                     
                             
                     
                     
                          <div class="<?= $coldata?>" style="display:none" id="block_to_place">
			            <div>
                    <div class="topicname">สถานที่ส่ง</div>
                    <input name="to_place" type="text"  required="true" class="form-control" id="to_place" style="padding:4px 2px;width:97%;" onkeypress="PasswordEnter(this,event)" value="King Power Phuket" readonly >          <input type="text" class="form-control" value="<?=$arr[project][transfer_date]; ?>"  name="transfer_date" id="transfer_date"    style="background-color:#FFFFFF; height:40px; font-size:16px ">
           		    </div> 
					 </div>  
                     
                     
                      
                          <div class="<?= $coldata?>">
			            <div style="padding:5px;">        
                     
                     
                     <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="50%" align="center">                   
                  <div class="topicname">ผู้ใหญ่</div>
                    <select class="form-control" name="adult" id="adult"   >
                    
                                         <option value="0">- เลือก -</option>
                    
                      <?
				   for($ii=1;$ii<101;$ii++){
				  
				  ?>
                      <option value="<?=$ii;?>" <?  if($arr[project][adult]== $ii){ echo "selected=selected";} ?> >
                        <?=$ii;?>
                      </option>
                      <?  } ?>
                    </select>
		         </td>
      <td width="50%" align="center"> 
        <div class="topicname">เด็ก</div>
        
        <?=$d?>
        <select class="form-control" name="child" id="child"   >
          
          <option class="form-control" value="" selected="selected" >- เลือก -</option>
          
          <?
 
		  
				   for($ii=0;$ii<32;$ii++){
				  
				  ?>
   <option value="<?=$ii;?>" <?  if($arr[project][child]== $ii){ echo "selected=selected";} ?> >
            <?=$ii;?>
            </option>
          <?  } ?>
          </select>
      </td>
        </tr>
  </tbody>
</table>

 
 
 
 
 
 

   <div style="padding-top:10px; color:#FF0000" class="font-18">
         ผู้ลงทะเบียนต้องอายุ 18 ปี ขึ้นไป
           </div>       
           
           

                            </div> 
                
  </div> 
                   
              
                   
 
 
   <div class="<?= $coldata?>">
			            <div style="padding:5px;">        
                     
                     <div class="topicname">สัญชาติ</div>


                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="90" class="font-24"><span style="height:35px;"><img src="images/flag/China.png" width="40" height="40" alt="" style="margin-top:-5px;"/> จีน</span></td>
      <td> <select name="nation" id="nation" class="form-control" >
          
          <option value="">- เลือกประเทศ -</option>
          
  <?
                                  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
                                    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
                                    $res[category] = $db->select_query("SELECT * FROM  guest_nation  ORDER BY id  ");
                      
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] == $arr[project][nation]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][name]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
 
          </select></td>
    </tr>
  </tbody>
</table>

 

          </div>
  </div>
					
                    
                   <div class="<?= $coldata?>" style="display:none">
              <div>
                <div class="topicname">เส้นทางและเวลาเดินทาง</div>


 
   		      <img src="king.jpg"   alt="" style="width:98%"/>
              
              
              </div> 
                
  </div> 
                    
                    
        
        
        <?       ?>      
                    
                    
                    
                    
                    
  
  
  
  
  
                    
                               <div class="<?= $coldata?>">
              <div>
                <div class="topicname">หมายเหตุ</div>
                <input name="remark" type="text"  required="true" class="form-control" id="remark"  value="<?=$arr[project][remark]?>" >
   		      </div> 
                
  </div>    
 
 
 
 
 
 
 
 
 
 
 
 
 
 <div class="<?= $coldata?>" id="show_price" style="display:nones">
 <div>





                    
                    
                    


<table width="100%" border="0" cellspacing="0" cellpadding="0">
 
    <tr>
      <td width="30%"> 
            <div class="topicname">ค่าจอด</div>
 
          <input  name="price_park" type="number"  class="form-control input-hide" id="price_park"     value="<?=$arr[project][price_park]; ?>" readonly   > 
 
 </td>
 
      <td width="40%"> 
            <div class="topicname">ค่าหัว/คน</div>
 
          <input  name="price_person" type="number" class="form-control input-hide" id="price_person"      value="<?=$arr[project][price_person]; ?>" readonly   > 
 
 </td>
  
  
  
 
 
       <td width="30%" > 
            <div class="topicname">รวม</div>
 
          <input  name="price_total" type="number" class="form-control input-hide" id="price_total" style="border:nones"    value="<?=$arr[project][price_total]; ?>" readonly  > 
 
 </td>
 
 
 
    </tr>
 
 
 
</table>
 
 
    </div> 
  </div>
 




 
  <div class="<?= $coldata?>" id="show_photo" style="display:nones">
  
  
 <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"     value="" >
 
 <input class="form-control" type="hidden" name="work_vc" id="work_vc"       value="<?=$arr[project][invoice]; ?>" >
 
     <input class="form-control" type="hidden" name="check_photo_edit_work" id="check_photo_edit_work"    value="0" >
 
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
 
 
 
  <? if($arr[project][booking_pic]=='1'){ ?>  
 
 
 src="../data/fileupload/edit_work/<?=$arr[project][invoice]?>_big.jpg?v=<?=$arr[project][update_date]?>" 
 
 
 <? } ?>
 
 
 
 name="image_edit_work" id="image_edit_work"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>
 </div>
 



 

 <div class="<?= $coldata?>">
 <div style="margin-left:10px; padding-top:20px;">
            
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="30">
      
    
      <input name="check_confirm" type="radio" id="check_confirm" style="height:25px; width:25px;" value="1"
      
      <? if($arr[project][status]=='CONFIRM'){?>   checked   <? } ?>  >
      
      </td>
      <td><div   style="color:<?=$main_color?>;"  ><b>ยืนยันการลงทะเบียน</div></td>
    </tr>
  </tbody>
</table>

   		      </div> 
                
  </div>
  
  
  
  
 <div class="<?= $coldata?>">
 <div style="margin-left:10px; padding-top:20px;">
            
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="30">
      
    
      <input name="check_confirm" type="radio" id="check_confirm" style="height:25px; width:25px;" value="1"
      
      <? if($arr[project][status]=='CONFIRM'){?>   checked   <? } ?>  >
      
      </td>
      <td><div   style="color:#ff0000; " ><b>ยกเลิก</div></td>
    </tr>
  </tbody>
</table>

   		      </div> 
                
  </div>
 
 
 
 
 
 
         <input class="form-control" type="hidden" name="country" id="country"  required="true" onkeypress="PasswordEnter(this,event)"   value="china" >           
                    
                    <br>

      

   <div  id="send_booking_data"></div>
   
 <div class="<?= $coldata?>">

 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" class="pad-r-5"><button id="submit_booking_data" type="button" class="btn btn-block btn-primary" style="width:100% "><span class="font-20">บันทึกข้อมูล</button></td>
    <td width="50%" class="pad-l-5"><button type="reset" class="btn btn-block btn-default"  style="width:100%px "><span class="font-20">รีเซ็ต</button></td>
  </tr>
</table><br>

</div>


 
 <!--end-->
 
</div
></div>
</div>



</form>


<script>
/// check login

$("#submit_booking_data").click(function(){ 

 


/*
 
if(document.getElementById('pickup_place').value=="") {
alert('กรุณากรอกสถานที่รับ'); 
document.getElementById('pickup_place').focus() ; 
return false ;
}




*/

if(document.getElementById('check_confirm').checked) {
   document.getElementById('check_confirm').value=1;
} else {

document.getElementById('check_confirm').value=0;
}

 
/// alert(document.getElementById('check_confirm').value); 
 
 
 


if(document.getElementById('airout_h').value=="") {
alert('กรุณาเลือกชั่วโมง'); 
document.getElementById('airout_h').focus() ; 
return false ;
}


if(document.getElementById('airout_m').value=="") {
alert('กรุณาเลือกนาที'); 
document.getElementById('airout_m').focus() ; 
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
alert('กรุณาเลือกประเทศ'); 
document.getElementById('nation').focus() ; 
return false ;
}

 
 $.post('popup.php?name=booking&file=savedata&action=edit&type=driver&id=<?=$_GET[id]?>&vc=<?=$arr[project][invoice]?>&driver=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_booking_data').html(response);
  });
  
 /// $("#send_booking_data").load('load.php');
  
  
  
  
 
  
  
  //$('.loader').show();
	var date_report = $("#date_report").val();
	//alert(date_report);
	
  $('#load_booking_data').html(load_main_icon_big);
	
	//var url_place_th = "go.php?name=load/all&file=all&server=th&day="+$("#date_report").val()+"";
	var url = "go.php?name=booking/load&file=work_all&find=day&day="+$("#date_report").val()+"";
	 
 
	 $('#load_booking_data').load(url); 
	 
	 
	 
	  $("#load_mod_popup" ).toggle();
  
  
  
  
  
  
  
 });
 
</script>  

















 <script>
		 
 
	  $('#show_price').show();
 

 
  $("#adult").change(function(){ 

  var url = "popup.php?name=booking&file=price&adult="+$("#adult").val()+"&nation="+$("#nation").val()+"";

 $('#send_booking_data').load(url); 
	 
 	 });
	 
	 
	   $("#nation").change(function(){ 

  var url = "popup.php?name=booking&file=price&adult="+$("#adult").val()+"&nation="+$("#nation").val()+"";

 $('#send_booking_data').load(url); 
	 
 	 });
	 
	  


		 
		 
		 </script>      
         
<script>
/////////  idcard
 $("#icon_camera_edit_work").click(function(){  
 
   
  document.getElementById('upload_pic_type').value='edit_work';
  
 
  $("#load_chat_camera").click(); 
  
  });
  
</script>

 <div style="display:none">
 
 <?    include ("mod/booking_realtime/photo/upload_main.php");?>
 </div>
<script type="text/javascript" src="js/dialog/main.js"></script>
 
	  
			  
		   
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <script src="plugins/iCheck/icheck.min.js"></script>

<script>
 
 /// check login
 


  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
      
 
      