


<link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css"> 
<script src="js/jquery-main.js"></script> 










<script   src="calendar/js/th.js"></script>

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
.topicname { padding-top:10px; padding-left:10px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #333333 ; text-align:left;  
 
}
.form-control { margin-left:10px; padding-left:10px; }


}
-->
</style>


<script>

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


  </script> 


<script type="text/javascript">


 


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


 
 
 
 <?
 
 
 
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM  order_booking   WHERE id = '".$_GET[id]."'  order by outdate desc limit 3 ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
 $arr[project] = $db->fetch($res[project]);

 ?>
 
<div class="box box-default" style="padding:0px">

<form method="post"  id="edit_form" name="edit_form">
 
					
              <!-- /.box-header -->
        <div class="box-body" style="padding:auto">
        
        
  <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="50%">  
      
      
      <a href="?name=booking&file=all" >
      <button id="submit_load_booking" type="button" class="btn btn-block btn-primary" style="width:100%; text-align:left " ><i class="fa fa-car"></i> รายการทั้งหมด</button>
      
      </a>
      
      
      </td>
      <td width="50%">  
      
            <a href="?name=booking&file=new" >
      <button type="button" id="submit_new_booking" class="btn btn-block btn-default"  style="width:100%;text-align:left  "><i class="fa fa-plus-square"></i> เพิ่มรายการใหม่</button>
      
      </a>
      
      </td>
    </tr>
  </tbody>
</table>
        
        
  <div class="row" >
		  
  <div class="<?= $coldata?>">
  
  <div class="topicname_main  row" style="padding:5px; font-size:28px; color:<?=$main_color?>; margin-left:8px;"><i class="fa fa-edit" ></i><b>&nbsp;แก้ไขข้อมูล&nbsp;&nbsp;</div>
          
  
              <div>
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


<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="60%"> 
             <div class="topicname">วันที่</div>
        <div class="input-group date">
          <input type="text" class="form-control" value="<?=$arr[project][transfer_date]; ?>"  name="transfer_date" id="transfer_date"    style="background-color:#FFFFFF; height:40px; font-size:16px ">
          <div class="input-group-addon"  id="btn_transfer_date" style="cursor:pointer "> <i class="fa fa-calendar" style="font-size:24px; "></i> </div>
        </div>
 </td>
      <td width="40%">
      
      
         <div class="topicname">เวลาถึง</div>
      
      
      
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tbody>
          <tr>
            <td width="50%">
            
            
 
            
 
            <select name="airout_h" id="airout_h" style="width:100%; font-size:16px; padding:5px; height:40px" >
              <?
				   for($ii=0;$ii<24;$ii++){
				  
				  ?>
              <option value="<? if($ii<10){  echo 0; }   ?><?=$ii;?>" <?  if($arr[project][airout_h]== $ii){ echo "selected=selected";} ?> >
              <? if($ii<10){  echo 0; }   ?><?=$ii;?>
                </option>
              <?  } ?>
            </select></td>
            <td width="50%"><select name="airout_m" id="airout_m"style="width:100%; font-size:16px; padding:5px; height:40px" >
              <?
				   for($ii=0;$ii<60;$ii++){
				  
			
				  
				  ?>
              <option value="<? if($ii<10){  echo 0; }   ?><?=$ii;?>" <?  if($arr[project][airout_m]== $ii){ echo "selected=selected";} ?> >
                <? if($ii<10){  echo 0; }   ?><?=$ii;?>
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
                     
                     
                     
                     
                     
                     
                          <div class="<?= $coldata?>">
			            <div>
                    <div class="topicname">สถานที่ส่ง</div>
                    <input name="to_place" type="text"  required="true" class="form-control" id="to_place" style="padding:4px 2px;width:97%;" onkeypress="PasswordEnter(this,event)" value="King Power Phuket" readonly >
           		    </div> 
					 </div>  
                     
                     
                      
                          <div class="<?= $coldata?>">
			            <div style="padding:5px;">        
                     
                     
                     <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="25%" align="center">                   
                  <div class="topicname">ผู้ใหญ่</div>
                    <select name="adult" id="adult" style="width:100%; font-size:16px; padding:5px; height:40px" >
                      <?
				   for($ii=0;$ii<32;$ii++){
				  
				  ?>
                      <option value="<?=$ii;?>" <?  if($arr[project][adult]== $ii){ echo "selected=selected";} ?> >
                        <?=$ii;?>
                      </option>
                      <?  } ?>
                    </select>
		         </td>
      <td width="25%" align="center"> 
          <div class="topicname">เด็ก</div>
          <select name="chirld" id="chirld" style="width:100%; font-size:16px; padding:5px; height:40px" >
            <?
				   for($ii=0;$ii<32;$ii++){
				  
				  ?>
            <option value="<?=$ii;?>" <?  if($arr[project][child]== $ii){ echo "selected=selected";} ?> >
              <?=$ii;?>
              </option>
            <?  } ?>
            </select>
  </td>
      <td width="25%" align="center"> 
          <div class="topicname">ทารก</div>
          <select name="baby" id="baby" style="width:100%; font-size:16px; padding:5px; height:40px" >
            <?
				   for($ii=0;$ii<32;$ii++){
				  
				  ?>
            <option value="<?=$ii;?>" <?  if($arr[project][baby]== $ii){ echo "selected=selected";} ?> >
              <?=$ii;?>
              </option>
            <?  } ?>
          </select>
  </td>
  
  
        <td width="25%"> 
          <div class="topicname">สัญชาติ</div>
<div style="height:35px;"><img src="images/flag/China Flag.png" width="40" height="40" alt="" style="margin-top:-5px;"/> จีน</div>

  </td>
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
                    
                    
        
     
 <div class="<?= $coldata?>">
 <div>


 <script>
		 
	
 
	 
	 $( document ).ready(function() {

 /// 
 document.getElementById('price_total').value=(parseInt(document.getElementById('adult').value)*parseInt(document.getElementById('price_person').value))+(parseInt(document.getElementById('price_park').value));
 
 
		 
  $("#adult").change(function(){ 
 
 /// 
 document.getElementById('price_total').value=(parseInt(document.getElementById('adult').value)*parseInt(document.getElementById('price_person').value))+(parseInt(document.getElementById('price_park').value));
 
		 });
		 
 	 });


////////


	 
	 $( document ).ready(function() {

		 
  $("#price_person").keyup(function(){ 
 
 document.getElementById('price_total').value=(parseInt(document.getElementById('adult').value)*parseInt(document.getElementById('price_person').value))+(parseInt(document.getElementById('price_park').value));
 
		 });
		 
 	 });




		 
		 
		 </script>      
         

 


<table width="100%" border="0" cellspacing="1" cellpadding="1">
 
    <tr>
      <td width="33%"> 
             <div class="topicname">ค่าจอด</div>
 
          <input type="number" class="form-control" value="<?=$arr[project][price_park]; ?>"  name="price_park" id="price_park"    style="background-color:#FFFFFF; height:40px; font-size:16px "> 
 
 </td>
 
      <td width="33%"> 
            <div class="topicname">ค่าหัว</div>
 
          <input type="number" class="form-control" value="<?=$arr[project][price_person]; ?>"  name="price_person" id="price_person"    style="background-color:#FFFFFF; height:40px; font-size:16px "> 
 
 </td>
 
 
       <td width="33%"> 
            <div class="topicname">รวม</div>
 
          <input type="number" class="form-control" value="<?=$arr[project][price_total]; ?>"  name="price_total" id="price_total"    style="background-color:#FFFFFF; height:40px; font-size:16px "> 
 
 </td>
 
 
 
    </tr>
 
 
 
 
    
 
</table>
 
 
 
 

    </div> 
  </div>  
                        
    
                    
                    
                    
                    
                    
                    
                               <div class="<?= $coldata?>">
              <div>
                <div class="topicname">หมายเหตุ</div>
                <input name="remark" type="text"  required="true" class="form-control" id="remark" style="padding:4px 2px;width:97%; height:60px; " onkeypress="PasswordEnter(this,event)" value="<?=$arr[project][remark]?>" >
   		      </div> 
                
  </div>    
 
 
 
 
 
         <input class="form-control" type="hidden" name="country" id="country"  required="true" onkeypress="PasswordEnter(this,event)"   value="china" >           
                    
                    <br>

      

   <div  id="send_booking_data"></div>
   
         <div style="  margin-left:16px; margin-right:10px; padding:2px;">


 <table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="50%"><button id="submit_booking_data" type="button" class="btn btn-block btn-primary" style="width:100% ">แก้ไขข้อมูล</button></td>
    <td width="50%"><button type="reset" class="btn btn-block btn-default"  style="width:100%px ">รีเซ็ต</button></td>
  </tr>
</table><br>

</div>
</form>






<script>
/// check login

$("#submit_booking_data").click(function(){ 

 
if(document.getElementById('pickup_place').value=="") {
alert('กรุณากรอกสถานที่รับ'); 
document.getElementById('pickup_place').focus() ; 
return false ;
}


if(document.getElementById('adult').value=="0") {
alert('กรุณาเลือกจำนวนผู้ใหญ่'); 
document.getElementById('adult').focus() ; 
return false ;
}

  

 
 $.post('popup.php?name=booking&file=savedata&action=edit&type=driver&driver=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_booking_data').html(response);
  });
  
  
 });
 
</script>  
