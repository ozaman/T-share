
<form method="post"  id="edit_form" name="edit_form">


<style>


.step-booking {
    border-radius: 50%; background-color: #FF9933;
 
    padding: 10px; 
    width: 60px;
    height: 60px; 
	text-align: justify; color:#FFFFFF;   font-size:30px; font-weight:bold; margin-top:-10px; text-align:center;
	border: solid 4px #FFFFFF;
	 box-shadow: 0 0 0px 0px #E8E6E6; position:absolute;   
	   background: #f39c12 !important;
 
 
  color: #fff;
}


.step-booking-small {
    border-radius: 50%; background-color: #FF9933;
 
    padding: 5px; 
    width: 40px;
    height: 40px; 
	text-align: justify; color:#FFFFFF;   font-size:20px; font-weight:bold; margin-top:-10px; text-align:center;
	border: solid 4px #FFFFFF;
 
	   background: #f39c12 !important;
 
 
  color: #fff;
}



.step-booking-small-no {
    border-radius: 50%; background-color: #FF9933;
 
    padding: 5px; 
    width: 40px;
    height: 40px; 
	text-align: justify; color:#FFFFFF;   font-size:20px; font-weight:bold; margin-top:-10px; text-align:center;
	border: solid 4px #FFFFFF;
 
	   background: #999999 !important;
 
 
  color: #fff;
}



</style>



<script>

 $(".text-topic-action-mod-3" ).html("ช็อปปิ้ง > ดิวตี้ฟรี <? ///=$arr[shop][topic_th]?>");
 

 
  </script> 
 




<div class="<?= $coldata?>" id="show_step_detail" style="margin-top:50px;padding:5px;   border-radius: 5px; border: 0px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; ">

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td>
      
      
      
      <div id="small_step_1" class="tab_alert" style=" padding-top:10px;" >
      
      <table width="100%" border="0" cellspacing="2" cellpadding="2" >
        <tbody>
          <tr>
            <td width="45"><div class="step-booking-small"  id="number_step_1">1</div></td>
            <td valign="top" class="font-24">เวลาถึงคิงส์ พาวเวอร์ </td>
            <td width="40" valign="top" class="font-24">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      
        </div>
      
      </td>
    </tr>
    <tr>
      <td>
      
      <div id="small_step_2" class="tab_alert_none" style=" padding-top:10px;" >
      
      
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
          <tr>
            <td width="45"><div class="step-booking-small-no" id="number_step_2">2</div></td>
            <td valign="top" class="font-24">ข้อมูลรถรับส่ง </td>
            <td width="40" valign="top" class="font-24">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      
      
      </div>
      
      
      </td>
    </tr>
    <tr>
      <td>
      
        <div id="small_step_3" class="tab_alert_no" style=" padding-top:10px;" >
      
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
          <tr>
            <td width="45"><div class="step-booking-small-no" id="number_step_3">3</div></td>
            <td valign="top" class="font-24">ข้อมูลแขก </td>
            <td width="40" valign="top" class="font-24">&nbsp;</td>
          </tr>
        </tbody>
      </table>
       </div>
      
      
      
      
      
      </td>
    </tr>
  </tbody>
</table>






</div>

<div class="<?= $coldata?>" id="show_time_detail" style="margin-top:20px;padding:5px;   border-radius: 5px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; ">
 


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="65"><div class="step-booking">1</div></td>
      <td><div class="font-28" style="color:<?=$main_color?>"><b>เวลาถึงคิงส์ พาวเวอร์ </div></td>
    </tr>
  </tbody>
</table>






 <div>

 

<table width="100%" border="0" cellspacing="1" cellpadding="1" style="margin-top:-10px;">
  <tbody>
    <tr>
      <td width="60%"> 
             <div class="topicname" style="margin-left:60px;">วันที่    &nbsp; <span class="font-32">     <?=date('Y-m-d');?></span></div>
        <div class="input-group date" style="z-index:0">
        
 
     

        
          <input type="text" class="form-control" value="<?=date('Y-m-d');?>"  name="transfer_date_new" id="transfer_date_new"    style="background-color:#FFFFFF; height:40px; font-size:16px; display:none " readonly>
        
        </div>
 </td>
      
    </tr>
    <tr>
      <td>
      
      
      
      <table width="100%" border="0" cellspacing="0" cellpadding="0"  style="margin-top:0px;">
        <tbody>
          <tr style="display:none">
            <td><div class="topicname" >เวลาถึงโดยประมาณ</div></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
              <tbody>
                <tr>
                  <td width="50%"><select name="airout_h" id="airout_h" style="width:100%; font-size:40px; padding:0px; height:60px; font-weight:bold" >
                    <?
				   for($ii=date('H');$ii<20;$ii++){
				  
				  ?>
                    <option value="<? if($ii<10){ echo 0; }?><?=$ii;?>" <?  if($arr[project][airout_h]== $ii){ echo "selected=selected";} ?> >
                      <? if($ii<10){  echo 0; } ?>
                      <?=$ii;?>
                      </option>
                    <?  } ?>
                  </select></td>
                  <td width="50%"><select name="airout_m" id="airout_m" style="width:100%; font-size:40px; padding:0px; height:60px; font-weight:bold" >
                    <?
				   for($ii=0;$ii<60;$ii++){ ?>
                    <option value="<? if($ii<10){  echo 0; }  ?><?=$ii;?>" <?  if($arr[project][airout_m]== $ii){ echo "selected=selected";} ?> >
                      <? if($ii<10){  echo 0; }   ?><?=$ii;?>
                      </option>
                    <?  } ?>
                  </select></td>
                </tr>
              </tbody>
            </table></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
 

  </div> 
   <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"  >      <button id="submit_booking_step_1" type="button" class="btn  btn-primary" style="width:100% "><span class="font-28"><i class="    fa fa-chevron-circle-right"></i>&nbsp;ขั้นตอนต่อไป</button></td>
    </tr>
</table>
</div>
  
  
  
  
 
  
<div class="<?= $coldata?>" id="show_car_detail" style="margin-top:20px;padding:5px;   border-radius: 5px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; display:none  ">
  
  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="65"><div class="step-booking">2</div></td>
      <td><div class="font-28" style="color:<?=$main_color?>"><b>ข้อมูลรถรับส่ง</div></td>
    </tr>
  </tbody>
</table>
 
 <div style="margin-top:5px;">
 
                      <?   include ("mod/booking/load/booking/car.php");   ?>
          </div>            
                      
                 
         <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%"  ><button type="reset"  id="back_booking_step_2" class="btn btn-block btn-default"  style="width:100%px "><span class="font-28"><i class="    fa fa-chevron-circle-left"></i>&nbsp;ย้อนกลับ</button></td>
    <td width="50%"  > <button id="submit_booking_step_2" type="button" class="btn  btn-primary" style="width:100% "><span class="font-28"><i class="    fa fa-chevron-circle-right"></i>&nbsp;ขั้นตอนต่อไป</button></td>
    
    </tr>
</table>
                      
                      
                      
                      </div>
  
  
 
  
<div class="<?= $coldata?>" id="show_guest_detail" style="margin-top:20px;padding:5px;   border-radius: 5px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; display:none ">
                          
  
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="65"><div class="step-booking">3</div></td>
      <td><div class="font-28" style="color:<?=$main_color?>"><b>ข้อมูลแขก</div></td>
    </tr>
  </tbody>
</table>
                          
 <div >        
                     
                     
                     <table width="100%" border="0" cellspacing="1" cellpadding="1" style="margin-top:-5px;">
  <tbody>
    <tr>
      <td width="50%" align="center">                   
                  <div class="topicname"><center>ผู้ใหญ่</div>
                    <select class="form-control" name="adult" id="adult" style="width:100%; font-size:40px; padding:0px; height:60px; font-weight:bold" >
                    
                                         <option value="0">0</option>
                    
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
        <div class="topicname"><center>เด็ก</div>
        
        <?=$d?>
        <select class="form-control" name="child" id="child" style="width:100%; font-size:40px; padding:0px; height:60px; font-weight:bold" >
          
          <option value="" selected="selected" >- เลือก -</option>
          
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

 
 

   <div style="padding-top:10px; color:#FF0000; text-align:left" class="font-22">
       ผู้ลงทะเบียนต้องอายุ 18 ปี ขึ้นไป 
           </div>       
           
           

                            </div> 
                            
                            
                            
                            
                      
         <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%"  ><button type="reset"  id="back_booking_step_3" class="btn btn-block btn-default"  style="width:100%px "><span class="font-28"><i class="    fa fa-chevron-circle-left"></i>&nbsp;ย้อนกลับ</button></td>
    <td width="50%"  > <button id="submit_booking_data" type="button" class="btn  btn-primary" style="width:100% "><span class="font-28"><i class="    fa fa-chevron-circle-right"></i>&nbsp;ส่งข้อมูล</button></td>
    
    </tr>
</table>
                    
                    
                    
                    
                      
  </div> 
                   
            
            
   <div  id="send_booking_data"></div>
              
              
<p>&nbsp;</p>
<p>
  <script>
   $("#submit_booking_step_1").click(function(){ 
   
 $("#show_car_detail").fadeIn(1000);
 
  $("#show_time_detail").hide();
	 
 $("#show_guest_detail").hide();
 
 ///
  $("#small_step_1").removeClass("tab_alert");
  
  $("#small_step_2").addClass("tab_alert");
  
  
  
  $("#number_step_2").removeClass("step-booking-small-no");
  
   $("#number_step_2").addClass("step-booking-small");
  
 
 
 
 
 
 
 
  
   });
   
   
   
   

   
   
   
   
   
   
   
 $("#submit_booking_step_2").click(function(){ 
   
   
     
   
if(document.getElementById('car_type').value=="") {
alert('กรุณาเลือกประเภทรถ'); 
 
document.getElementById('car_type').focus() ; 

 
 
return false ;
}


if(document.getElementById('car_color').value=="") {
alert('กรุณาเลือกสีรถ'); 
 
document.getElementById('car_color').focus() ; 

return false ;
}

 

if(document.getElementById('car_plate').value=="") {
alert('กรุณาหมายเลขทะเบียนรถ'); 
 
document.getElementById('car_plate').focus() ; 


return false ;
}

   
   
   ///
   
   
   
   
  $("#show_car_detail").hide();
 
  $("#show_time_detail").hide();
	 
 $("#show_guest_detail").fadeIn(1000);
 
 
 
 
  $("#small_step_1").removeClass("tab_alert");
   $("#small_step_2").removeClass("tab_alert");
   
  
  $("#small_step_3").addClass("tab_alert");
  
  
  
  $("#number_step_3").removeClass("step-booking-small-no");
  
   $("#number_step_3").addClass("step-booking-small");
 
 
 
 

  ///
  


 
 
 
 
 
 
  
   });
   
   
   
   
   
   
   
  
 
 
 
       $("#back_booking_step_2").click(function(){ 
   
  $("#show_car_detail").hide();
 
  $("#show_time_detail").fadeIn(1000);
	 
 $("#show_guest_detail").hide();
  
  
  
  
  
  
  
   $("#small_step_2").removeClass("tab_alert");
   
      $("#small_step_3").removeClass("tab_alert");
   
  
  $("#small_step_1").addClass("tab_alert");
  
  
  
  $("#number_step_2").removeClass("step-booking-small-no");
  
   $("#number_step_1").addClass("step-booking-small");
  
 
  
  
  
  
   });
   
   
   
         $("#back_booking_step_3").click(function(){ 
   
  $("#show_car_detail").fadeIn(1000);
 
  $("#show_time_detail").hide();
	 
 $("#show_guest_detail").hide();
 
 
 
   $("#small_step_1").removeClass("tab_alert");
   
 $("#small_step_3").removeClass("tab_alert");
   
  
  $("#small_step_2").addClass("tab_alert");
  
  
 
 
  
   });
   
   
   
   </script>
</p>           
              
              
  </form>
  
  
  
  
  
  
  <script>
/// check login

$("#submit_booking_step_2s").click(function(){ 

 

 
});

</script>
  
  
    
  <script>
/// check login

$("#submit_booking_step_3").click(function(){ 

 
if(document.getElementById('adult').value=="0") {
alert('กรุณาเลือกจำนวนผู้ใหญ่'); 
document.getElementById('adult').focus() ; 
return false ;
}
 
 
});

</script>
  
  
  
  
  
  
              
              
<script>
/// check login

$("#submit_booking_data").click(function(){ 

  
 
  

if(document.getElementById('adult').value=="0") {
alert('กรุณาเลือกจำนวนผู้ใหญ่'); 
document.getElementById('adult').focus() ; 
return false ;
}


 

/*


if(document.getElementById('guest_name').value==""  &&  document.getElementById('check_photo_passport').value=="") {
alert('กรุณากรอกชื่อแขกหรือถ่ายภาพพาสปอร์ต'); 
document.getElementById('guest_name').focus() ; 
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
 
 
 */
 
 
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
 
    
 $.post('go.php?name=booking&file=savedata&action=add&type=driver&driver=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
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











 