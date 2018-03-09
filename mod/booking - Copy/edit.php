  
<script src="js/sweet/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="js/sweet/dist/sweetalert.css?v=<?=time()?>">

 <style>
 
 .div-all-work{
	 padding:5px;   border-radius: 3px; border: 1px solid #ddd;   background:<? echo $bgcolor; ?>; margin-bottom:20px; box-shadow: 0px  0px 10px #DADADA  ;
	 
 }
 
 
  .div-all-cancel{
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;padding:5px;   
	 
 }
 
 
 
 </style>

 <?
 
 
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM  order_booking   WHERE id = '".$_GET[id]."'  order by outdate desc limit  1 ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
 $arr[project] = $db->fetch($res[project]);

 ?>
 

<?


		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[shop] = $db->select_query("SELECT * FROM shopping_product  WHERE id='".$arr[project][program]."' ");
		$arr[shop] = $db->fetch($res[shop]);


?>

 
 

<script>

  $(".text-topic-action-mod" ).html("แก้ไขช็อปปิ้ง <?=$arr[project][invoice]?>");
 
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
 

<div class="box box-default" style="margin-top:40px;"> 
 
<div class="box-header with-border">
<div class="box-title " style="color:<?=$main_color?>" >

  
  
  
  
  
  
  
  
  
  




</div>
          
          
 </div>
 
 
 
 
  <div  class="div-all-palce"  > 
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="100" rowspan="2"> <img src="images/shop_logo/<? echo $arr[shop][logo_code];?>.png" alt="Edit" width="95" border="0" class="img-logo" >  </td>
      <td class="font-22"><span class="font-24" style="color:<?=$arr[shop][text_color]?>"><? echo $arr[shop][topic_th];?></span></td>
    </tr>
    <tr>
 <td class="font-24"><i class="fa  fa-clock-o" style="width:20px; color:#999999"  ></i><b><? echo $arr[shop][start_time];?> -  <? echo $arr[shop][finish_time];?></td>
    </tr>
  </tbody>
</table> 

<script>
$('#shop_sub_menu_map_<?=$arr[project][id]?>').click(function(){  

 $( "#load_mod_popup" ).toggle();
	

 
  var url_load_<?=$arr[project][id]?>= "load_page_mod.php?name=booking/popup&file=map&shop_id=<?=$arr[project][program]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load_<?=$arr[project][id]?>); 
	  

 	});
	
	
	///
	$('#shop_sub_menu_pic_<?=$arr[project][id]?>').click(function(){  

 $( "#load_mod_popup" ).toggle();
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod.php?name=booking/popup&file=pic&shop_id=<?=$arr[project][program]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load_<?=$arr[project][id]?>); 
	  

 	});
	
	
	
		///
	$('#shop_sub_menu_price_<?=$arr[project][id]?>').click(function(){  
	
	  
		
	 
	

 $( "#load_mod_popup" ).toggle();
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod.php?name=booking/popup&file=price&shop_id=<?=$arr[project][program]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load_<?=$arr[project][id]?>); 
  

	  

 	});
 
</script>


 
 
 
 
<div style="background-color:#FFF; padding:3PX; margin-top:5px; border-top:1px  dotted #666666; ">
<table width="100%" border="0" cellspacing="1" cellpadding="1" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td width="33%" class="font-22"><span id="shop_sub_menu_map_<?=$arr[project][id]?>"><i class="fa  fa-map-marker" style="width:10px;color:<?=$main_color?>" ></i>  นำทาง</span></td>
      <td width="33%" class="font-22"><span id="shop_sub_menu_pic_<?=$arr[project][id]?>"><i class="fa   fa-photo" style="width:20px;color:<?=$main_color?>" ></i> รูปภาพ</span></td>
      <td width="33%" class="font-22"><span  id="shop_sub_menu_price_<?=$arr[project][id]?>"><i class="fa  fa-folder-open" style="width:18px;color:<?=$main_color?>" ></i>  รายได้</span></td>
    </tr>
  </tbody>
</table>

</div> 

  </div> 
 
 
 
 
 
 
 
           <div class="box-body" style="padding:auto">
   

<form method="post"  id="edit_form" name="edit_form">
 
					
              <!-- /.box-header -->

        

          
  <table width="100%" border="0" cellspacing="1" cellpadding="1" style="display:none">
  <tbody>
    <tr>
      <td width="50%">  
      
    
      <a href="?name=booking&file=all" >
      <button id="submit_load_booking" type="button" class="btn btn-block btn-default" style="width:100%; text-align:left " ><i class="fa fa-car"></i> งานทั้งหมด</button>
      
      </a>
      
      
      </td>
      <td width="50%">  
      
            <a href="?name=booking&file=new" >
      <button type="button" id="submit_new_booking" class="btn btn-block btn-default"  style="width:100%;text-align:left  "><i class="fa fa-plus-square"></i> เพิ่มงานใหม่</button>
      
      </a>
      
 
      
      </td>
    </tr>
  </tbody>
</table>
 
                   
                              
  <div class="row" >
 
  <input name="program" type="hidden"  required="true" class="form-control" id="program"    value="<?=$arr[shop][id]?>" >
            
  <div class="<?= $coldata?>" style="display:none" >

 
  
              <div id="block_pickup_place">
                <div class="topicname">สถานที่รับ&nbsp;&nbsp;</div>
                
                <div>
                
                <ul class="nav nav-tabs" style="padding-top:0px; height:40px; margin-left:10px; border:none">
 
 
       <li    id="btn_chk_booking_place"  class="active" ><a data-toggle="tab" href="#tab_chk_name"><i class="fa  fa-bank"  fa-spin 6x style="color:#666666;font-size:18px;"></i><strong>เลือกสถาน</strong></a ></li>
 
 
 
 
      <li    id="btn_chk_booking_place_gps" ><a data-toggle="tab" href="#tab_chk_name"><i class="fa  fa-map-marker"  fa-spin 6x style="color:#666666;font-size:20px;"></i><strong>&nbsp;ระบุตำแหน่ง</strong></a ></li>
      
 
  
    

 
   

	
 
  </ul>
  
            </div>      
            
 
            <div id="load_select_place">         
                
                
  <input name="pickup_place" type="text"  required="true" class="form-control" id="pickup_place" style="padding:4px 2px;width:97%;" onkeypress="PasswordEnter(this,event)" >
       
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
       <input type="text" class="form-control" value="<?=date('Y-m-d');?>"  name="transfer_date" id="transfer_date"    style="background-color:#FFFFFF; height:40px; font-size:16px;display:none "> 
      
         <div class="topicname">ใช้เวลาเดินทาง</div>
      
      
      
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tbody>
          <tr>
            <td width="50%"  >
            
            
 
 
            <select  class="form-control" name="airout_h" id="airout_h" >
            
            <option value="" selected="selected">- เลือกชั่วโมง -</option>
            
              <?
			  
			  ///    for($ii=0;$ii<24;$ii++){
			  
				   for($ii=0;$ii<24;$ii++){
				  
				  ?>
              <option value="<?=$ii;?>" <?  if($arr[project][airout_h]== $ii){ echo "selected=selected";} ?> >
                <?=$ii;?>
                </option>
              <?  } ?>
            </select></td>
            <td width="50%"><select class="form-control"  name="airout_m" id="airout_m" >
            
            
            <option value="" selected="selected">- เลือกนาที -</option>
            
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
                    <input name="to_place" type="text"  required="true" class="form-control" id="to_place" style="padding:4px 2px;width:97%;" onkeypress="PasswordEnter(this,event)" value="King Power Phuket" readonly >
           		    </div> 
					 </div>  
                     
                     
   
                     
                     
                      <div class="<?= $coldata?>" id="show_to_time" style="display:none">
              <div>
                <div class="topicname">เวลาถึงโดยประมาณ</div>
 
<div class="font-24" id="text_to_time" style="color:<?=$main_color?>"></div>
 
   		      </div> 
                
  </div>    
                     
                     
                     
                     
                     
                      
                          <div class="<?= $coldata?>">
			            <div >        
                     
                     
                     <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="50%" align="center">                   
                  <div class="topicname">ผู้ใหญ่</div>
                    <select class="form-control" name="adult" id="adult" style="width:100%; font-size:16px; padding:5px; height:40px" >
                    
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
        <select class="form-control" name="child" id="child" style="width:100%; font-size:16px; padding:5px; height:40px" >
          
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

 
 
 
 
 
 

   <div style="padding-top:10px; color:#FF0000" class="font-22">
         ผู้ลงทะเบียนต้องอายุ 18 ปี ขึ้นไป
           </div>       
           
           

                            </div> 
 
  </div> 
                   
              
 
 
   <div class="<?= $coldata?>">
			            <div >        
                     
                     <div class="topicname">สัญชาติ <span id="img_nation">   <?
                                
								
								
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[category] = $db->select_query("SELECT * FROM  web_country where id=".$arr[project][nation]."  ORDER BY id  ");
                      
 $arr[category] = $db->fetch($res[category]) ;
 
 
 
							 
							      ?>
<? if($arr[category][name_en]<>''){ ?>                     
                                  
 <img src="images/flag/<?=$arr[category][name_en]?>.png" width="40" height="40" alt="" style="margin-top:-5px;"/> 
 
 
 <? } ?>
 </span>  </div>


                   <table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tbody>
    <tr>
      <td class="font-24"><span style="height:35px;"></span> <select class="form-control"  name="nation" id="nation" >
        
        <option value="">- เลือกประเทศ -</option>
        
        <?
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
                                    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
                                  ///  $res[category] = $db->select_query("SELECT * FROM  guest_nation  ORDER BY id  ");
								  
					  $res[category] = $db->select_query("SELECT * FROM  web_country where status=1  ORDER BY sort_country desc");
                       
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] == $arr[project][nation]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][name_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
        
      </select></td>
      </tr>
  </tbody>
</table>

 

          </div>
  </div>
					
            
                    
 
 
  
  
  
  
                    
  
  
    
 
 
 
 
 
 <div class="<?= $coldata?>" id="show_price" style="display:nones">
 <div>





                    
                    
                    


<table width="100%" border="0" cellspacing="1" cellpadding="1"  style=" margin-top:10px;">
 
    <tr>
      <td width="35%" align="center" bgcolor="#F6F6F6"> 
      
       <input  name="price_park" type="hidden" class="form-control" id="price_park" value="<?=$arr[project][price_park]; ?>"  > 
            <div class="topicname" style="text-align:center">ค่าจอด</div>
            
            
            <div id="div_price_park" class="font-24"  style="text-align:center"> <?=$arr[project][price_park]; ?><div>
 
         
 
 
 
 
 </td>
 
      <td width="40%" align="center" bgcolor="#F6F6F6"> 
             <input  name="price_person" type="hidden" class="form-control" id="price_person"  value="<?=$arr[project][price_person]; ?>"  >   
            <div class="topicname" style="text-align:center">ค่าหัว/คน</div>
               <div id="div_price_person" class="font-24" style="text-align:center"><?=$arr[project][price_person]; ?><div>
 
   
 
 </td>
 
 
       <td width="25%" align="center" bgcolor="#F6F6F6" style="padding-right:0px;"> 
         <input  name="price_total" type="hidden" class="form-control" id="price_total" value="<?=$arr[project][price_total]; ?>"  >   
            <div class="topicname"  style="text-align:center">รวม</div>
            
                    <div id="div_price_total" class="font-24" style="text-align:center"><?=$arr[project][price_total]; ?> <div>
 
        
 
 </td>
 
 
 
    </tr>
 
 
 
</table>
 
 
    </div> 
  </div>
 
 
 
 
 
 
  <div class="<?= $coldata?>">
              <div>
                <div class="topicname">รับเงิน</div>
                 
               <select class="form-control"  name="payment_type" id="payment_type" >
               
 
          
 <option value="money" <?  if($arr[project][payment_type]== 'money'){ echo "selected=selected";} ?>>เงินสด</option> 
 <option value="bank" <?  if($arr[project][payment_type]== 'bank'){ echo "selected=selected";} ?>>โอนเงินเข้าบัญชี</option> 
                
                </select> 
                
   		      </div> 
                
  </div>    
 
 
 
 
 
 
 
                               <div class="<?= $coldata?>" style="display:none">
              <div>
                <div class="topicname">หมายเหตุ</div>
                <input class="form-control" type="text" name="remark" id="remark"   >
                
                
                
                
   		      </div> 
                
  </div>    
 
 
 
 
 
  <div class="div-all-cancel">
  
  <div style="border-radius: 3px; border: 1px solid #ddd;   background:#FFFEF2; margin-right:10px; margin-left:10px; padding-bottom:10px; ">
  
 
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
 
 

 <input name="check_booking_status" type="hidden"  required="true" class="form-control" id="check_booking_status" style="padding:4px 2px;width:97%;"   value="<?=$arr[project][status]?>" readonly >
 
                
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
 
 
 
 
 
 
 
 
 
 
      <input class="form-control" type="hidden" name="country" id="country"  required="true" onkeypress="PasswordEnter(this,event)"   value="china" >           
                    
                    <br>

      

   <div  id="send_booking_data"></div>
   
   
   
         <div  class="<?= $coldata?>">


 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" class="pad-r-5"><button id="submit_booking_data" type="button" class="btn  btn-primary" style="width:100% "><span class="font-20">บันทึกข้อมูล</button></td>
    <td width="50%" class="pad-l-5"><button type="reset" class="btn btn-block btn-default"  style="width:100%px "><span class="font-20">รีเซ็ต</button></td>
  </tr>
</table><br>

</div>
</form>



    </div> 
  </div>
 
 


<script>
/////////  idcard
 $("#icon_camera_edit_work").click(function(){  
 
   
  document.getElementById('upload_pic_type').value='edit_work';
  
 
  $("#load_chat_camera").click(); 
  
  });
  
  
  //// 
  

  
  
  
  
</script>


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

  if(document.getElementById('payment_type').value=="") {
alert('กรุณาเลือกช่องทางการรับเงิน'); 
document.getElementById('payment_type').focus() ; 
return false ;
}
 
 
 ///// 
 
 
 if(document.getElementById('check_booking_status').value=="CONFIRM") {
	 
	 
/// ถ้าไม่ถ่ายภาพ  check_photo_edit_work

 if(document.getElementById('check_photo_edit_work').value=="0") {

 
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

















 <script>
		 
 
	 
 

 
  $("#adult").change(function(){ 
  
 

  var url = "popup.php?name=booking&file=price&adult="+$("#adult").val()+"&nation="+$("#nation").val()+"&pro="+$("#program").val()+"";

 $('#send_booking_data').load(url); 
	 
 	 });
	 
	 
	   $("#nation").change(function(){ 

  var url = "popup.php?name=booking&file=price&adult="+$("#adult").val()+"&nation="+$("#nation").val()+"&pro="+$("#program").val()+"";

 $('#send_booking_data').load(url); 
 
 
 
   var url_img = "popup.php?name=booking/load&file=nation_flag&adult="+$("#adult").val()+"&nation="+$("#nation").val()+"";

 $('#img_nation').load(url_img); 
 
	 
 	 });
	 
	  



///// คำนวณเวลา

 
  $("#airout_h").change(function(){ 
 
  var url = "popup.php?name=booking/load&file=time_topoint&time_h="+$("#airout_h").val()+"&time_m="+$("#airout_m").val()+"&pro="+$("#program").val()+"";

 $('#send_booking_data').load(url); 
	 
 	 });
	 
	 
	   $("#airout_m").change(function(){ 
 
  var url = "popup.php?name=booking/load&file=time_topoint&time_h="+$("#airout_h").val()+"&time_m="+$("#airout_m").val()+"&pro="+$("#program").val()+"";

 $('#send_booking_data').load(url); 
	 
 	 });

		 
		 
		 </script>      
         
           <script>

  
</script>
         
         
 <div style="display:none">
 
 <?    include ("mod/booking/photo/upload_main.php");?>
 </div>
<script type="text/javascript" src="js/dialog/main.js"></script>
 
 	   
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="plugins/iCheck/square/red.css">
    <link rel="stylesheet" href="plugins/iCheck/square/green.css">
  
  <script src="plugins/iCheck/icheck.min.js"></script>
  
  
  
 
 <br>




<script>
 
 /// check login
 


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
  
  
  
  
  
  
  
  
  
</script>
      
 
    
     <? if($arr[project][status]=='CANCEL'){?>
 
  <script>  
 $("#show_register_cancel").show();  
 ///$("#show_photo").show();
  </script>
  
  <? } ?>
  
  
       <? if($arr[project][status]=='CONFIRM'){?>
 
  <script>  
 $("#show_register_cancel").hidden();  
  $("#show_photo").show();
  </script>
  
  <? } ?>
  
  
  