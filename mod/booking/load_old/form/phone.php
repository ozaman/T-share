
<div style="display:none">

<br>
<br>

 <a  href="zello://Taxi Phuket (KING POWER)?add_channel"  id="booking_edit_<?=$arr[project][id]?>"   style="color:#FFFFFF;background-color:FF9B00; font-size:18px; margin-left:0px; padding:5px;   text-transform:uppercase"><i class="fa fa-rss-square"></i>78787878787878</a>    

 


<br>
<br>

</div>




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
 
 
 
 

    $("body").on('click', function (e) {
 
 	   setTimeout(function () {
   var tool_status_zello = $("#div_dropdown_zello_<?=$arr[project][invoice];?>" ).is(":hidden");
  var tool_status_phone = $("#div_dropdown_phone_<?=$arr[project][invoice];?>" ).is(":hidden");

 
 /*
 if(tool_status_zello==false){
	 
	 alert(tool_status_zello);
	 
 $('#div_dropdown_zello_<?=$arr[project][invoice];?>').fadeOut();
	 
 }
 
 */
  
}, 10000); //w
	

 
 
	
 
  
  
    });
	
 
 
 
 
 
 
 
 $('#btn_div_dropdown_zello_<?=$arr[project][invoice];?>').click(function(e){   
 
 
 
 
   $( "#load_mod_popup_4" ).toggle();
 
 
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod_4.php?name=booking/load/network&file=zello&shop_id=<?=$arr[project][program]?>";
  
  url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
  
  
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_<?=$arr[project][id]?>); 
 
 
 
 
 
 
 
 /*
 
 
 
 
 
  var tool_status_zello = $("#div_dropdown_zello_<?=$arr[project][invoice];?>" ).is(":hidden");
  var tool_status_phone = $("#div_dropdown_phone_<?=$arr[project][invoice];?>" ).is(":hidden");
  
 
 if(tool_status_zello==true){
	 
 $('#div_dropdown_zello_<?=$arr[project][invoice];?>').show();
	 
 }
  
 
  else  {
	 
 $('#div_dropdown_zello_<?=$arr[project][invoice];?>').hide();
	 
 }
 
 
 
  
 
  if(tool_status_phone==false){
	 
 $('#div_dropdown_phone_<?=$arr[project][invoice];?>').hide();
	 
 }
 
 
//  alert(tool_status_zello);
 

 */
 
});



 $('#btn_div_dropdown_phone_<?=$arr[project][invoice];?>').click(function(e){   
 
 
 
 
 
   $( "#load_mod_popup_4" ).toggle();
 
 
 
  var url_load_<?=$arr[project][id]?>= "load_page_mod_4.php?name=booking/load/network&file=phone&shop_id=<?=$arr[project][program]?>";
  
  url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_load_<?=$arr[project][id]?>=url_load_<?=$arr[project][id]?>+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
  
  
  
  $('#load_mod_popup_4').html(load_main_mod);
  $('#load_mod_popup_4').load(url_load_<?=$arr[project][id]?>); 
 
 
 
 
 
 
 /*
 
 
   var tool_status_zello = $("#div_dropdown_zello_<?=$arr[project][invoice];?>" ).is(":hidden");
  var tool_status_phone = $("#div_dropdown_phone_<?=$arr[project][invoice];?>" ).is(":hidden");
 
 
 if(tool_status_phone==true){
	 
 $('#div_dropdown_phone_<?=$arr[project][invoice];?>').show();
	 
 }
  
 
  else  {
	 
 $('#div_dropdown_phone_<?=$arr[project][invoice];?>').hide();
	 
 }
 
 
 
 
  if(tool_status_zello==false){
	 
 $('#div_dropdown_zello_<?=$arr[project][invoice];?>').hide();
	 
 }
 */
 
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
 
  
  <? //=$detectname?>
  
  
  
 
  
  
  
  
  <div style="padding:5px; ">
  
  
  
  <? if($detectname=='iPad' or  $detectname=='iPhone' or $detectname=='Other'){ ?>
  
  
                
 <a  href="<?=$arr[contact][phone]?>"  id="booking_edit_<?=$arr[project][id]?>"   target="_blank"   style="color:#FFFFFF;background-color:FF9B00; font-size:18px; margin-left:0px;  padding:5px;   text-transform:uppercase"><i class="fa fa-rss-square"></i>&nbsp;<?=$arr[contact][channel]?></a> 
  
   
  
  <? }   ?>
 
    <? if($detectname=='Android' ){ ?>
  
 <a  href="zello://<?=$arr[contact][channel]?>?add_channel"  id="booking_edit_<?=$arr[project][id]?>"   style="color:#FFFFFF;background-color:FF9B00; font-size:18px; margin-left:0px; padding:5px;   text-transform:uppercase"><i class="fa fa-rss-square"></i>&nbsp;<?=$arr[contact][channel]?></a>    


 <? } ?>

  
  
  
  </div>
  
  
  


<? } ?>


        
                  </ul>   
              
              </div>
          
              
 
 
