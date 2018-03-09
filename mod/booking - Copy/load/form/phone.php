<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="50%"> </td>
      <td width="50%">
 
   
      </td>
      </tr>
    <tr>
    
    
      <td width="50%" align="left" id="time_complete_booking_data_<?=$arr[project][id]?>" class="font-22">
   

       
    <div class="btn  btn-default" style=" width:100%; text-align:left; padding:2px; padding-left:5px; height:40px;" data-toggle="dropdown" id="btn_div_dropdown_phone_<?=$arr[project][invoice];?>">
 
                
                
    <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="30"><i class="fa fa-phone-square" style="font-size:32px; color: #8DC63F; border:none"></i></td>
      <td  class="font-24"><b>โทรศัพท์</td>
    </tr>
  </tbody>
</table> 
           
        
 </div>
  
              
              </td>
    
 
    
      <td width="50%" align="left" id="time_complete_booking_dataxxx_<?=$arr[project][id]?>"  > 

      
      

           
                
 
                        
 
 <script>
 $('#btn_div_dropdown_zello_<?=$arr[project][invoice];?>').click(function(e){   
 
  var tool_status_zello = $("#div_dropdown_zello_<?=$arr[project][invoice];?>" ).is(":hidden");
  var tool_status_phone = $("#div_dropdown_phone_<?=$arr[project][invoice];?>" ).is(":hidden");
  
 
 if(tool_status_zello==true){
	 
 $('#div_dropdown_zello_<?=$arr[project][invoice];?>').fadeIn();
	 
 }
  
 
  else  {
	 
 $('#div_dropdown_zello_<?=$arr[project][invoice];?>').fadeOut();
	 
 }
 
 
 
  
 
  if(tool_status_phone==false){
	 
 $('#div_dropdown_phone_<?=$arr[project][invoice];?>').fadeOut();
	 
 }
 
 
//  alert(tool_status_zello);
 

 
 
});



 $('#btn_div_dropdown_phone_<?=$arr[project][invoice];?>').click(function(e){   
 
 
   var tool_status_zello = $("#div_dropdown_zello_<?=$arr[project][invoice];?>" ).is(":hidden");
  var tool_status_phone = $("#div_dropdown_phone_<?=$arr[project][invoice];?>" ).is(":hidden");
 
 
 if(tool_status_phone==true){
	 
 $('#div_dropdown_phone_<?=$arr[project][invoice];?>').fadeIn();
	 
 }
  
 
  else  {
	 
 $('#div_dropdown_phone_<?=$arr[project][invoice];?>').fadeOut();
	 
 }
 
 
 
 
  if(tool_status_zello==false){
	 
 $('#div_dropdown_zello_<?=$arr[project][invoice];?>').fadeOut();
	 
 }
 
 
});
 
 
 </script>
 
 
 
 
     <div class="btn  btn-default" style=" width:100%; text-align:left;  padding:2px;height:40px;" data-toggle="dropdown" id="btn_div_dropdown_zello_<?=$arr[project][invoice];?>">  
   
                 
                <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="30"><img src="images/icon/top/zello.png" width="30" height="30" alt=""/> </td>
      <td class="font-24">
      <b>Zello</td>
    </tr>
  </tbody>
</table>

              </div>
 
  
 
              
 
              </td>
    
      </tr>
  </tbody>
</table>


    <div class="dropdown"   >
   

 
<ul class="dropdown-menu" role="menu"  style="background-color:<?=$main_color?> ; right:0px; width:100%;  padding:5px; position:absolute    " id="div_dropdown_phone_<?=$arr[project][invoice];?>">
                  
                  
         
 <?
  
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[sale] = $db->select_query("SELECT * FROM  shopping_contact where product_id=".$arr[project][program]." and type='phone'  and group_type='sale'  ORDER BY id  ");
                      
 	while($arr[sale] = $db->fetch($res[sale])){  
	
 
 ?>
                  
 
      
<li style="margin-left:-20px;"><a href="tel:<?=$arr[sale][phone]?>"  id="booking_edit_<?=$arr[project][id]?>"     style="color:#FFFFFF; font-size:20px"><i class="fa fa-phone-square"></i>ฝ่ายการตลาด (<?=$arr[sale][name]?>)</a></li>


<? } ?>



         
 <?
  
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[sale] = $db->select_query("SELECT * FROM  shopping_contact where product_id=".$arr[project][program]." and type='phone'  and group_type='op'  ORDER BY id  ");
                      
 	while($arr[sale] = $db->fetch($res[sale])){  
	
 
 ?>
                  
                  
      
<li style="margin-left:-20px;"><a href="tel:<?=$arr[sale][phone]?>"  id="booking_edit_<?=$arr[project][id]?>"     style="color:#FFFFFF; font-size:20px"><i class="fa fa-phone-square"></i>ฝ่ายต้อนรับ (<?=$arr[sale][name]?>)</a></li>


<? } ?>


 


 
                  </ul>   
              
              </div>
          












 
   <div class="dropdown"   >
 
  <ul class="dropdown-menu" role="menu"  style="background-color:FF9B00 ; right:0px; width:100%;  padding:5px; position:absolute" id="div_dropdown_zello_<?=$arr[project][invoice];?>">
                
                      <?
	  		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[contact] = $db->select_query("SELECT * FROM shopping_contact  WHERE product_id='".$arr[project][program]."' and type='zello'");
		 	while($arr[contact] = $db->fetch($res[contact])){  
 
	  ?>
 
  
              
<li style="margin-left:-20px; width:100%"><a  href="zello://<?=$arr[contact][channel]?>?add_channel"  id="booking_edit_<?=$arr[project][id]?>"     style="color:#FFFFFF; font-size:18px; text-transform:uppercase"><i class="fa fa-rss-square"></i><?=$arr[contact][channel]?></a></li>      <? } ?>
        
                  </ul>   
              
              </div>
          
              
 
 
