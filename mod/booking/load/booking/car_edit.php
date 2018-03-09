       
    
<?

 



$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
  $all_car = $db->num_rows('web_carall',"id","drivername=".$user_id."");
  
 
 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[car] = $db->select_query("SELECT * FROM   web_carall  where id='".$user_id."' order by id desc  ");
 $res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
 $arr[car] = $db->fetch($res[car]);
 
 
?> 

<style>
.div-car-active{ background-color:#FFFCD5; border: 1px solid #ddd;
	
	
}

</style>
          
          
          
 <div  style="padding:5px;   border-radius: 5px; border: 1px solid #ddd;background-color:#F6F6F6;  margin-bottom: 0px; box-shadow: 0px  0px 0px #DADADA  ; margin-top: 10px;" >        
             
 <div id="load_car_data_booking" style="display:nones">
                     
                     
                     <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="40%" align="center">                   
                  <div class="topicname">ประเภท</div>
                  
           <?
		   $arr[car][car_color]='car';
		   
		   ?>       
                  
                  
                  
                  
                  
                  <select class="form-control" name="car_type" id="car_type">
                  
                  
                  
                  
                  <option value=""  >-เลือก-</option>
                  
                    <option value="เก๋ง"  <? if($arr[car][car_color]=='car'){ echo 'selected=selected';} ?>  >เก๋ง</option>
                    <option value="ตู้" <? if($arr[car][car_color]=='van'){ echo 'selected=selected';} ?>>ตู้</option>
                    <option value="suv" <? if($arr[car][car_color]=='suv'){ echo 'selected=selected';} ?>>suv</option>
                      <option value="ตุ๊กๆ" <? if($arr[car][car_color]=='tuk'){ echo 'selected=selected';} ?>>ตุ๊กๆ</option>
                      <option value="สองแถว" <? if($arr[car][car_color]=='songtaw'){ echo 'selected=selected';} ?>>สองแถว</option>
                       <option value="อื่นๆ" <? if($arr[car][car_color]=='other'){ echo 'selected=selected';} ?>>อื่นๆ</option>
                       
                       
                       

                  </select></td>
      <td width="30%" align="center"><div class="topicname">สีรถ</div>
        <select class="form-control" name="car_color" id="car_color">
          <option value=""  >-เลือก-</option>
          <option value="ขาว"  <? if($arr[car][car_color]=='White'){ echo 'selected=selected';} ?>  >ขาว</option>
          <option value="ดำ" <? if($arr[car][car_color]=='Black'){ echo 'selected=selected';} ?>>ดำ</option>
          <option value="เหลือง" <? if($arr[car][car_color]=='Yellow'){ echo 'selected=selected';} ?>>เหลือง</option>
          <option value="เขียว" <? if($arr[car][car_color]=='Green'){ echo 'selected=selected';} ?>>เขียว</option>
          <option value="แดง" <? if($arr[car][car_color]=='Red'){ echo 'selected=selected';} ?>>แดง</option>
          <option value="เทา" <? if($arr[car][car_color]=='Gray'){ echo 'selected=selected';} ?>>เทา</option>
          <option value="บรอนด์ทอง" <? if($arr[car][car_color]=='Golden Bronze'){ echo 'selected=selected';} ?>>บรอนด์ทอง</option>
          <option value="บรอนด์เงิน" <? if($arr[car][car_color]=='Silver Bronze'){ echo 'selected=selected';} ?>>บรอนด์เงิน</option>
        </select></td>
      <td width="30%" align="center"> 
        <div class="topicname">ทะเบียน</div>
<input name="car_plate" type="text"   required="true" class="form-control" id="car_plate"  onkeypress="UserEnter(this,event)" value="<?=$arr[car][plate_num] ?>"    >
        
        
        
        
      </td>
      </tr>
  </tbody>
</table>

 
 </div>
 
 
 
 
 <script>
 
 
 
 $('#menu_add_new_car_booking').click(function(){  
 
 
 
$("#load_mod_popup_4" ).toggle();
 
  var url_load_new_car_booking = "load_page_mod_4.php?name=car&file=new_car&type=booking";
 
 $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_new_car_booking); 
 
 
 
 
 
 
 	});
 
 
 </script>
 
 
   <div class="font-26" style="margin-top:10px;display:none" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td class="font-26">
  </td>
  
    </tr>
  </tbody>
</table>

   
   
   <br>  

 
  
  
  
   
   <?
  
/// $user_id=0;
  
  
 
 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projectcar] = $db->select_query("SELECT * FROM   web_carall  where drivername='".$user_id."'   order by id desc  ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
	while($arr[projectcar] = $db->fetch($res[projectcar])){  
	
 
 
 $arr[type] = $db->fetch($res[type]);
 
 		$bgcolor = ($i++ & 1) ? '#FFFFFF' : '#FFFFFF'; 
 
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	
	$res[car_type] = $db->select_query("SELECT * FROM ".TB_carall_type." WHERE id='".$arr[projectcar][car_type]."' ");
	$arr[car_type] = $db->fetch($res[car_type]);
 
  
	 ?>
     
 
     
     
<a id="car_<?=$arr[projectcar][id]?>"    style="text-decoration:none" >
     
 
 <div style="border-radius: 6px; border: 0px solid #ddd;   background:<? echo $bgcolor; ?>; margin-bottom:5px; box-shadow: 0px  0px 5px #DADADA"    >

<table width="100%" border="0" cellspacing="2" cellpadding="2"   id="div_car_<?=$arr[projectcar][id]?>">
  <tbody>
    <tr>
      <td width="40"><input name="check_use_car" type="radio" id="check_use_car_<?=$arr[projectcar][id]?>" style="height:25px; width:25px;" value="CONFIRM" 
      
 >
      

      
      
      
<script>


 $('#car_<?=$arr[projectcar][id]?>').on('click', function () { 
 
  $('.div-car-active').removeClass('div-car-active');
 
 $('#div_car_<?=$arr[projectcar][id]?>').addClass('div-car-active');
 
 
 document.getElementById('check_use_car_id').value=<?=$arr[projectcar][id]?>;
 
 
 
     var url_load_car= "popup.php?name=booking/load/booking&file=car_detail&car=<?=$arr[projectcar][id]?>";
 
 
 
 $('#load_car_data_booking').load(url_load_car); 
 
 
 
 
 
 
 
 
$('#check_use_car_<?=$arr[projectcar][id]?>').iCheck('check');
 
//    document.getElementById('check_use_car_<?=$arr[projectcar][id]?>').checked=true;
 
 
  });
  






    $(function () {
	  
    $('#check_use_car_<?=$arr[projectcar][id]?>').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });
  });
  

</script>      
      
      
      
      
      
      
      
      </td>
      <td width="150"><table width="100%" cellpadding="1" cellspacing="2"  >
       <?
 


 
	
 




	//Comment Icon
 

?>
       <? if($arr[projectcar][plate_color]=="Green"){
	 
	 $plate_color="009999"; } ?>
       <? if($arr[projectcar][plate_color]=="Yellow"){
	 
	 $plate_color="FFCC00"; } ?>
       <? if($arr[projectcar][plate_color]=="Black"){
	 
	 $plate_color="FFFFFF"; } ?>
       <? if($arr[projectcar][plate_color]=="Red"){
	 
	 $plate_color="FF0000"; } ?>
  <td width="100"   align="center" bgcolor="#<?=$plate_color?>" style="border: solid 2px; height:20px; color:#DADADA; padding:5px; padding-right:0px;border-radius:5px;"><font color="#<? if($arr[projectcar][plate_color]=="Green"){
	 
	 echo "FFFFFF"; } ?>"  class="font-28"><b><? echo $arr[projectcar][plate_num];?> <br> 
              <font   class="font-20"><? echo $arr[projectcar][province];?></font></b></font></td>
  </tr>
 
     </table>
     
<div class="font-24" ><b>
     
     <? echo "" . $arr[car_type][topic_th] . " "; ?> <?echo $arr[projectcar][car_brand];?>
     
     </div>
     </td>
      <td valign="top"><img src="../data/pic/car/<?=$arr[projectcar][id];?>_1.jpg?v=<?=$arr[projectcar][update_date];?>"  width="100%"   border="0"      style="margin-top: 3px;border-radius:5px;" /></td>
    </tr>
  </tbody>
</table>


   </div>  
   
   </a>
 
 <? } ?>
   
 
   
  <input name="check_use_car_id" type="hidden"  required="true" class="form-control" id="check_use_car_id" style="padding:4px 2px;width:100%;"   value="<?=$arr[project][wait_status]?>"   >
   
 
     <input name="check_all_car" type="hidden"  required="true" class="form-control" id="check_all_car" style="padding:4px 2px;width:100%;"   value="<?=$all_car?>"   >
     
     
     
   
    <a id="menu_add_new_car_booking">
 
   <i class="fa fa-plus-circle"  style="color:<?=$main_color?>" ></i>  เพิ่มรถใหม่ 
   
   </a>
   
   <span style="color:#FF0000" class="font-22">
   
   <?   if($all_car>0){ ?>
   (จำนวนรถที่มี  <?=$all_car?> คัน)
   
   <? }else { ?>
 
   
   (ยังไม่มีรถให้เลือก)
   
   <? } ?>
   
   
   </span>
   
   
   </div>  
        
 
           

                            </div> 