   
      
    <? if($_GET[control]=='company'){ 	 
	  $tab_color='#5BACD3'; 
   
 
   
  
   
   }  else {
	   
    $tab_color='#FF0000'; 
	   
   }
   
   
   
   ?>
   
      
      
 <? if($_GET[op]==''){ ?>
 
 <div  style="border-top:none">
 
 
 <style>
.div-load-price{
	 padding:5px;   border-radius: 8px; border: 2px solid #ddd;background-color:#FFFFFF; margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-top:0px;
 	 
	 
	 
 }
 
 
 
  .div-content-price{
	 padding:5px;   border-radius: 0px; border: 0px solid #ddd;background-color:#F6F6F6;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-top:10px;
 	 
 	 
 }
 
   .div-content-price-extra{
	 padding:10px;   border-radius: 10px; border: 3px solid <?=$tab_color?>;background-color:#FFFFFF;     margin-bottom: 5px; box-shadow: 0px  0px 10px #DADADA  ; margin-top:10px;
 	 
 	 
 }
 
 
 .input-disable { 
 
    color: #333; 
    border: 0px solid #666 ;
	 pointer-events: none; background:none; 
}
 

.cal_price { font-size:18px; color:#FF0000;text-align:center; padding-right:10px;

 border-radius: 3px; border: 1px solid #DADADA; margin-top:5px; background-color:#FCFBE8;     }
 
 
.cal_price_topic { font-size:20px; color:#333333;text-align:center; padding-right:10px;

 border-radius: 3px; border: 0px solid #FFFFFF; padding-top:10px; height:40px;    }
 
 
 .form-control{ text-align:center; }
  
  .active a {
    border-radius: 5px  !important; color:#FFFFFF  !important; background-color: <?=$tab_color?> !important;padding:5px;border: 0px solid #0 !important;
}
 
 
    </style>
    

      
<?

 
$text_w='100';

if($_GET[control]=='company'){
	
	$company='บริษัท';
	
} else {
	
		$company='ผู้ใช้งาน';
	
}
?>





<?


if($_GET[type]=='all'){ ?>


<div class="box-bottom-line" style="color:#FFF; font-size:24px; padding:2px; background-color:#fff;border-radius: 5px  !important">


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="600" class="font-30"><b>แสดงราคาทั้งหมด&nbsp;&nbsp; >&nbsp;&nbsp;<font color="#FF0000"><?=$company;?></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>




</div>



<? }  ?>

<?

if($_GET[type]=='extra'){ ?>
 
<div class="box-bottom-line" style="color:#FFF; font-size:24px; padding:2px; background-color:#fff;border-radius: 5px  !important">


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="600" class="font-30"><b>แสดงราคาตามสัญชาติ&nbsp;&nbsp; >&nbsp;&nbsp;<font color="#FF0000"><?=$company;?></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>



<? }  ?>
 
 
 
 
   <?
  
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
  $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$_GET[plan_id]."   ");
             
  $arr[price] = $db->fetch($res[price]);
 
  
 $show_park=$arr[price][price_park];
 $show_person=$arr[price][price_person];
 $show_commision=$arr[price][price_commision];
  
  
  
  
  if($show_park==1){	  
$status_show_park='show';	   	  
  }
    
  if($show_park==0){	  
$status_show_park='hide';	  	  
  }
  
  
    
  if($show_person==1){	  
$status_show_person='show';	   	  
  }
  
 if($show_person==0){	  
$status_show_person='hide';	    	  
  }
  
   if($show_commision==1){	  
$status_show_commision='show';	   	  
  }
  
    if($show_commision==0){	  
 $status_show_commision='hide';	  
  }
   
  //echo $arr[place][price_plan];
  $tb_w='300';
  
  
 
  ?>
 
 
 <script>
  
$('#main_td_price_park').<?=$status_show_park?>();
$('#main_td_price_person').<?=$status_show_person?>();
 


$('.main_td_price_park').<?=$status_show_park?>();
$('.main_td_price_person').<?=$status_show_person?>();
$('.main_td_price_commision').<?=$status_show_commision?>();

  </script>
 <?
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
 
 $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE id='".$_GET[id]."' ");
 $arr[open] = $db->fetch($res[open]);
 
 
 ?>
 
 
 <? //=$_GET[control]?>
 
 
 <? if($_GET[control]=='user'){ ?>
 <script>
 
  $('.check_load_show_company').hide();
    $('.check_load_show_company').show();
	
 $('.load_park_company').attr('readonly', true);
  $('.load_person_company').attr('readonly', true);
   $('.load_commision_company').attr('readonly', true);
	
	 $('.load_park_company').css('background-color', '#F1F2F2');
  $('.load_person_company').css('background-color', '#F1F2F2');
   $('.load_commision_company').css('background-color', '#F1F2F2');
	
 </script>
 
  
<? if($arr[open] [open_counter]==0){ ?>
 
<script>
 
 $('.check_load_park_counter').hide();
 $('.check_load_person_counter').hide();
 $('.check_load_commision_counter').hide();
 
</script>
<? } ?>


<? if($arr[open] [open_all]==0){ ?>
 
<script>
 
 $('.check_load_park_all').hide();
 $('.check_load_person_all').hide();
 $('.check_load_commision_all').hide();
 
</script>
<? } ?>


<? if($arr[open] [open_driver]==0){ ?>
 
<script>
 
 $('.check_load_park_driver').hide();
 $('.check_load_person_driver').hide();
 $('.check_load_commision_driver').hide();
 


</script>
<? } ?>


 
 
<script>






 
 
 $(".pay-plan-country").click(function(){
 
 var data_id = $(this).attr("setid");
  
 var data_type = $(this).attr("type");
  
 

  var url_page_type= "go.php?name=content/load/list&file=price&op=pay";
  
 url_page_type =url_page_type+"&id="+data_id;
  url_page_type =url_page_type+"&type="+data_type;
 
$('#save_data_open_pay').load(url_page_type);
 
 
 /// $('#save_data_open_pay').hide();
 
	   });
 
	   </script>
  
<? } ?> 



 <? if($_GET[control]=='company'){ ?>

<script>
 
 $('.check_load_park_counter').hide();
 $('.check_load_person_counter').hide();
 $('.check_load_commision_counter').hide();
 
</script>

<script>
 
 $('.check_load_park_driver').hide();
 $('.check_load_person_driver').hide();
 $('.check_load_commision_driver').hide();
 
 
  $('.check_load_show_company').show();
 
 
</script>
<script>
 
 $('.check_load_park_all').hide();
 $('.check_load_person_all').hide();
 $('.check_load_commision_all').hide();
 
</script>
 

 <? }?>
 
 
<?

if($_GET[type]=='all'){
	
	
	?>
    
    


<br>






 
 
    
    <script>
	

	
	
	
	
$('#show_price_all_<?=$_GET[id]?>').click(function(){  


 /////$( "#sub_popup_page" ).toggle();
 
 

  
 // $('#show_data_page_sub').load(url_page_type);
  
  
  /// 
  
    
});




$('#set_extra_price_all_<?=$_GET[id]?>').click(function(){  

 var url_load_price_extra_all= "popup.php?name=content/load/list/extra&file=list_extra_price&plan_setting=<?=$_GET[id]?>";

$('#load_main_price_extra').load(url_load_price_extra_all); 
  
  
  
   var url_load_price= "popup.php?name=content/load/list/extra&file=form&plan_name=<?=$arr[plan_name][id];?>&plan_setting=<?=$_GET[id]?>&shop_id=<?=$arr[shop][id]?>&type=all";

$('#from_main_price_extra').load(url_load_price); 
    
});






 
 $("#btn_menu_edit_place_<? echo $arr[place][id];?>").click(function(){
 
			 

			 
  var url_page_type_<? echo $arr[place][id];?>= "go.php?name=content/load&file=place&op=sub_edit&id=<? echo $arr[place][id];?>&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
 
  $('#show_data_page').load(url_page_type_<? echo $arr[place][id];?>);
 
 
	   });







 </script>
    
<div class="div-content-price-extra">
    
<table width="100%" border="0" cellspacing="1" cellpadding="1" style="color:<?=$main_color_dark?>; border-bottom: 2px solid #dadada; width:100%">
  <tbody>
    <tr >
      <td width="600"><b><div  class="font-36" style="color:<?=$main_color_dark?>; ">ตั้งราคามาตรฐาน</div ></b> </td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="160">
 
            
            <button type="button" class="btn btn-success btn-lg"   id="submit_data_update"  style=" width:150px; margin-top:10px;"> <span id="txt_btn_save2">อัพเดทราคา</span></button></td>
            <td><button type="reset" class="btn btn-default btn-lg"   id="submit_data_set"   style=" width:150px; margin-top:10px;"> <span id="txt_btn_save2"> รีเซ็ต</span></button></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
    
    
  <?
 
 //////   240 other
 
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
 $res[shop] = $db->select_query("SELECT * FROM  product_price_list_all where plan_setting=".$_GET[id]."   and country=240 order by sort_country desc limit 1 ");
                      
 while($arr[shop] = $db->fetch($res[shop])){  
 
 

?>
 
 

                    
 
 
 
 
 
 
<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="box-bottom-lines" style="padding-top:5px;">
 
    <tr>
 
      <td width="40"><span class="font-20"><img src="images/flag/<?=$arr[shop][country_code]?>.png" width="30" height="30" alt="" style="margin-top:-5px;"/></span></td>
      <td width="100"><span class="font-20"> &nbsp; 
      <strong>ทั้งหมด</strong> </span>
      
      
      <div id="save_payment_status">
      </td>
      <td class="font-22"><table width="<?=$tb_w?>" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="50" valign="top" class="main_td_price_park"><div class="font-28" style="background-color:#5BACD3; color:#FFFFFF">
              <center>
              <b>ค่าจอด</div>
              <table width="50" border="0" align="center" cellpadding="3" cellspacing="2" >
              <tbody>
                <tr>
                  <td width="65" align="center" valign="top" bgcolor="#C7EAFB" class="check_load_show_company"><strong>บริษัท</strong>           <input name="price_park_company[]" type="number" class="load_park_company form-control" id="price_park_company_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_park_company];?>" />
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price_topic"><span id="profit_park_company_<?=$arr[shop][id]?>"><strong> </strong></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_park_company_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                    
                    
       
      
                    </td>
                  <td width="65" align="center" valign="top" bgcolor="#C7EAFB" class="check_load_park_driver"><strong> คนขับ </strong>
                    <input name="price_park_driver[]" type="number" class="load_park_driver form-control" id="price_park_driver_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_park_driver];?>" />
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_park_driver_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_park_driver_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                    
                    


                    
                    
                    
                    
                    </td>
                   
                  <td width="65" align="center" valign="top" bgcolor="#C7EAFB" class="check_load_park_counter"><strong> เคาน์เตอร์ </strong>
                    <input name="price_park_counter[]" type="number" class="load_park_counter form-control" id="price_park_counter_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_park_counter];?>" />
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_park_counter_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_park_counter_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                    
 
                    
                    
                    
                    
                    
                    
                    </td>
                  <td width="65" align="center" valign="top" bgcolor="#C7EAFB" class="check_load_park_all"><strong>สมาชิก</strong>                    <input name="price_park_all[]" type="number" class="load_park_all form-control" id="price_park_all_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_park_all];?>" />
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_park_all_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_park_all_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                  
                  
                  
                  
                  
                  
                  </td>
                </tr>
              </tbody>
            </table></td>
            <td width="50" valign="top" class="main_td_price_person">


 

   
            <div class="font-28"  style="background-color:#DACA3F; color:#FFFFFF">
              <center>
              <b>ค่าหัว</div>
            <table width="50" border="0" align="center" cellpadding="3" cellspacing="2">
              <tbody>
                <tr>
                  <td width="65" align="center" valign="top" bgcolor="#FFFDE9" class="check_load_show_company"><strong>บริษัท</strong>
                    <input name="price_person_company[]" type="number" class="load_person_company form-control" id="price_person_company_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_person_company];?>" />
                     
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price_topic"><span id="profit_park_company_<?=$arr[shop][id]?>"><strong> </strong></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_person_company_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>    
                    
                    
                    </td>
                  <td width="31" align="center" valign="top" bgcolor="#FFFDE9" class="check_load_person_driver"><strong> คนขับ </strong>
                    <input name="price_person_driver[]" type="number" class="load_person_driver form-control" id="price_person_driver_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_person_driver];?>" />
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_person_driver_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_person_driver_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                    
 
                           
                    
                    
                    
                    
                    
                    </td>
                  <td width="65" align="center" valign="top" bgcolor="#FFFDE9" class="check_load_person_counter"><strong> เคาน์เตอร์ </strong>
                    <input name="price_person_counter[]" type="number" class="load_person_counter form-control" id="price_person_counter_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_person_counter];?>" />
                    
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_person_counter_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_person_counter_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                            
                    
       
                    
                    </td>
                  <td width="65" align="center" valign="top" bgcolor="#FFFDE9" class="check_load_person_all"><strong>สมาชิก</strong>                    <input name="price_person_all[]" type="number" class="load_person_all form-control" id="price_person_all_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_person_all];?>" />
                  
                               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_person_all_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_person_all_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                            
                  
                  
                  
                  
                  
                  
                  
                  </td>
                </tr>
              </tbody>
            </table>
            
  
            
            </td>
            <td width="50" valign="top" class="main_td_price_commision">
            
                     <div class="font-28"   style="background-color:#54C054; color:#FFFFFF">
                       <center>
                       <b>ค่าคอม%</div>
                     <table width="50" border="0" align="center" cellpadding="2" cellspacing="3">
              <tbody>
                <tr>
                  <td width="65" align="center" valign="top" bgcolor="#E9FBCF" class="check_load_show_company"><strong>บริษัท</strong>
 
 <input name="price_commision_company[]" type="number" class="load_commision_company form-control" id="price_commision_company_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_company];?>" />
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tbody>
     <tr>
       <td height="40" class="cal_price_topic"><span id="profit_park_company_<?=$arr[shop][id]?>"><strong> </strong></span></td>
     </tr>
     <tr>
       <td height="40"><span id="payment_commision_company_<?=$arr[shop][id]?>"></span></td>
     </tr>
   </tbody>
 </table></td>
                  <td width="31" align="center" valign="top" bgcolor="#E9FBCF" class="check_load_commision_driver"><strong> คนขับ </strong>
                    <input name="price_commision_driver[]" type="number" class="load_commision_driver form-control" id="price_commision_driver_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_driver];?>" />
                              
                              
                                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_commision_driver_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_commision_driver_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                    
                    
                    
                    
                    
                    
                    
                    
                    </td>
                  <td width="65" align="center" valign="top" bgcolor="#E9FBCF" class="check_load_commision_counter"><strong> เคาน์เตอร์ </strong>
                    <input name="price_commision_counter[]" type="number" class="load_commision_counter form-control" id="price_commision_counter_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_counter];?>" />
                    
                    
                                   
                                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_commision_counter_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_commision_counter_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                    
      
                    
                    
                    </td>
                  <td width="65" align="center" valign="top" bgcolor="#E9FBCF" class="check_load_commision_all"><strong>สมาชิก</strong>                    <input name="price_commision_all[]" type="number" class="load_commision_all form-control" id="price_commision_all_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_all];?>" />
                  
                  
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_commision_all_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_commision_all_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                     
                  
                  
                  
                  
                  
                  
                  
                  </td>
                </tr>
              </tbody>
            </table>
            
 
            
            </td>
          </tr>
        </tbody>
      </table><input name="id[]" type="hidden"   id="id" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][id];?>" /></td>
 
  </tr>
 
</table>

 
 </div>
 
 
 
 
 
 
 
 
 
 <?
 
 	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[pay_type] = $db->select_query("SELECT * FROM loop_pay_type   where status=1   ORDER BY id  ASC  ");
while($arr[pay_type] = $db->fetch($res[pay_type])){ ?>

 



 <?

$res[user_type] = $db->select_query("SELECT * FROM loop_user_type   where status=1  and name<>'company' ORDER BY id  ASC  ");
while($arr[user_type] = $db->fetch($res[user_type])){   ?>
 

<? //=$arr[user_type][name]?>


<script>
/// auto 




 
 /// key
 
$("#price_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>" ).keyup(function() { 

 
var price = document.getElementById('price_<?=$arr[pay_type][name]?>_company_<?=$arr[shop][id]?>').value-document.getElementById('price_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').value;   


if(document.getElementById('price_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').value>0){

 $('#profit_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').html(price);	  
 
} else {
	
	 $('#profit_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').html('-');	
}
 
});



 
var price = document.getElementById('price_<?=$arr[pay_type][name]?>_company_<?=$arr[shop][id]?>').value-document.getElementById('price_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').value;   

if(document.getElementById('price_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').value>0){

 $('#profit_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').html(price);	  
 
} else {
	
	 $('#profit_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').html('-');	
}
 
 

</script>

 




 <?
  } 
 }?>
 
 
 
 
 
 
 
 
 
 
 
  <?
 
 	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[pay_type] = $db->select_query("SELECT * FROM loop_pay_type   where status=1   ORDER BY id  ASC  ");
while($arr[pay_type] = $db->fetch($res[pay_type])){ ?>

 



 <?

$res[user_type] = $db->select_query("SELECT * FROM loop_user_type   where status=1  and name<>'companys' ORDER BY id  ASC  ");
while($arr[user_type] = $db->fetch($res[user_type])){   ?>
 

<? //=$arr[user_type][name]?>


<script>
 
var url_price= "empty_style.php?name=content/load/list/payment&file=pay_select&action=view&type=<?=$_GET[type]?>&id=<?=$arr[shop][id]?>&plan_setting=<?=$_GET[id]?>&main=<? echo $arr[sub][main];?>&pay=company_pay_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>&income=payment_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>&pay_type=<?=$arr[pay_type][name]?>&pay_name=<?=$arr[user_type][name]?>";
 
 

 $('#payment_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').load(url_price);	  



 

</script>

 




 <?
  } 
 }?>
 
 
 
 
 
 
 
 
 
 
 
 
 





<? }  } ?>
 
 
 
 
 
 
 
 
 
 
 
 
 
<?

if($_GET[type]=='extra'){
 
 //////   240 other
 
 
 
 
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
 $res[shop] = $db->select_query("SELECT * FROM  product_price_list_all where plan_setting=".$_GET[id]."   and status=1 and  country=45 order by sort_country desc limit 1 ");
                      
 while($arr[shop] = $db->fetch($res[shop])){  
 
 
 
?>



 

 
<div class="div-content-price-extra"> <table width="100%" border="0" cellspacing="1" cellpadding="1" style="color:<?=$main_color_dark?>; border-bottom: 2px solid #dadada; width:100%">
  <tbody>
    <tr >
      <td width="600"><b><div  class="font-36" style="color:<?=$main_color_dark?>; ">ตั้งราคามาตรฐาน</div ></b> </td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="160">
 
            
            <button type="button" class="btn btn-success btn-lg"   id="submit_data_update"  style=" width:150px; margin-top:10px;"> <span id="txt_btn_save2">อัพเดทราคา</span></button></td>
            <td><button type="reset" class="btn btn-default btn-lg"   id="submit_data_set"   style=" width:150px; margin-top:10px;"> <span id="txt_btn_save2"> รีเซ็ต</span></button></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
 
<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="box-bottom-lines" style="padding-top:5px;">
 
    <tr>
 
      <td width="40"><span class="font-20"><img src="images/flag/China.png" width="30" height="30" alt="" style="margin-top:-5px;"/></span></td>
      <td width="100"><span class="font-20"> &nbsp; 
      <strong>สัญชาติ</strong> </span> 
      
      
      
      
      
      <div id="save_payment_status">
      </td>
      <td class="font-22"><table width="<?=$tb_w?>" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td width="50" valign="top" class="main_td_price_park"><div class="font-28" style="background-color:#5BACD3; color:#FFFFFF">
              <center>
              <b>ค่าจอด</div>
              <table width="50" border="0" align="center" cellpadding="3" cellspacing="2" >
              <tbody>
                <tr>
                  <td width="65" align="center" valign="top" bgcolor="#C7EAFB" class="check_load_show_company"><strong>บริษัท</strong>           <input name="price_park_company[]" type="number" class="load_park_company form-control" id="price_park_company_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_park_company];?>" />
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price_topic"><span id="profit_park_company_<?=$arr[shop][id]?>"><strong> </strong></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_park_company_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
      
                    </td>
                  <td width="65" align="center" valign="top" bgcolor="#C7EAFB" class="check_load_park_driver"><strong> คนขับ </strong>
                    <input name="price_park_driver[]" type="number" class="load_park_driver form-control" id="price_park_driver_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_park_driver];?>" />
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_park_driver_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_park_driver_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
 
                    
                    
                    
                    
                    </td>
                   
                  <td width="65" align="center" valign="top" bgcolor="#C7EAFB" class="check_load_park_counter"><strong> เคาน์เตอร์ </strong>
                    <input name="price_park_counter[]" type="number" class="load_park_counter form-control" id="price_park_counter_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_park_counter];?>" />
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_park_counter_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_park_counter_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                    
 
                    
                    
                    
                    
                    
                    
                    </td>
                  <td width="65" align="center" valign="top" bgcolor="#C7EAFB" class="check_load_park_all"><strong>สมาชิก</strong>                    <input name="price_park_all[]" type="number" class="load_park_all form-control" id="price_park_all_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_park_all];?>" />
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_park_all_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_park_all_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                  
                  
                  
                  
                  
                  
                  </td>
                </tr>
              </tbody>
            </table></td>
            <td width="50" valign="top" class="main_td_price_person">


 

   
            <div class="font-28"  style="background-color:#DACA3F; color:#FFFFFF">
              <center>
              <b>ค่าหัว</div>
            <table width="50" border="0" align="center" cellpadding="3" cellspacing="2">
              <tbody>
                <tr>
                  <td width="65" align="center" valign="top" bgcolor="#FFFDE9" class="check_load_show_company"><strong>บริษัท</strong>
                    <input name="price_person_company[]" type="number" class="load_person_company form-control" id="price_person_company_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_person_company];?>" />
                     
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price_topic"><span id="profit_park_company_<?=$arr[shop][id]?>"><strong> </strong></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_person_company_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>    
                    
                    
                    </td>
                  <td width="31" align="center" valign="top" bgcolor="#FFFDE9" class="check_load_person_driver"><strong> คนขับ </strong>
                    <input name="price_person_driver[]" type="number" class="load_person_driver form-control" id="price_person_driver_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_person_driver];?>" />
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_person_driver_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_person_driver_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                    
 
                           
                    
                    
                    
                    
                    
                    </td>
                  <td width="65" align="center" valign="top" bgcolor="#FFFDE9" class="check_load_person_counter"><strong> เคาน์เตอร์ </strong>
                    <input name="price_person_counter[]" type="number" class="load_person_counter form-control" id="price_person_counter_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_person_counter];?>" />
                    
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_person_counter_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_person_counter_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                            
                    
       
                    
                    </td>
                  <td width="65" align="center" valign="top" bgcolor="#FFFDE9" class="check_load_person_all"><strong>สมาชิก</strong>                    <input name="price_person_all[]" type="number" class="load_person_all form-control" id="price_person_all_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_person_all];?>" />
                  
                               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_person_all_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_person_all_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                            
                  
                  
                  
                  
                  
                  
                  
                  </td>
                </tr>
              </tbody>
            </table>
            
  
            
            </td>
            <td width="50" valign="top" class="main_td_price_commision">
            
                     <div class="font-28"   style="background-color:#54C054; color:#FFFFFF">
                       <center>
                       <b>ค่าคอม%</div>
                     <table width="50" border="0" align="center" cellpadding="2" cellspacing="3">
              <tbody>
                <tr>
                  <td width="65" align="center" valign="top" bgcolor="#E9FBCF" class="check_load_show_company"><strong>บริษัท</strong>
 
 <input name="price_commision_company[]" type="number" class="load_commision_company form-control" id="price_commision_company_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_company];?>" />
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tbody>
     <tr>
       <td height="40" class="cal_price_topic"><span id="profit_park_company_<?=$arr[shop][id]?>"><strong> </strong></span></td>
     </tr>
     <tr>
       <td height="40"><span id="payment_commision_company_<?=$arr[shop][id]?>"></span></td>
     </tr>
   </tbody>
 </table></td>
                  <td width="31" align="center" valign="top" bgcolor="#E9FBCF" class="check_load_commision_driver"><strong> คนขับ </strong>
                    <input name="price_commision_driver[]" type="number" class="load_commision_driver form-control" id="price_commision_driver_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_driver];?>" />
                              
                              
                                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_commision_driver_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_commision_driver_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                    
                    
                    
                    
                    
                    
                    
                    
                    </td>
                  <td width="65" align="center" valign="top" bgcolor="#E9FBCF" class="check_load_commision_counter"><strong> เคาน์เตอร์ </strong>
                    <input name="price_commision_counter[]" type="number" class="load_commision_counter form-control" id="price_commision_counter_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_counter];?>" />
                    
                    
                                   
                                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_commision_counter_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_commision_counter_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                    
      
                    
                    
                    </td>
                  <td width="65" align="center" valign="top" bgcolor="#E9FBCF" class="check_load_commision_all"><strong>สมาชิก</strong>                    <input name="price_commision_all[]" type="number" class="load_commision_all form-control" id="price_commision_all_<?=$arr[shop][id]?>" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_all];?>" />
                  
                  
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tbody>
                        <tr>
                          <td height="40" class="cal_price"><span id="profit_commision_all_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                        <tr>
                          <td height="40"><span id="payment_commision_all_<?=$arr[shop][id]?>"></span></td>
                        </tr>
                      </tbody>
                    </table>
                     
                  
                  
                  
                  
                  
                  
                  
                  </td>
                </tr>
              </tbody>
            </table>
            
 
            
            </td>
          </tr>
        </tbody>
      </table><input name="id[]" type="hidden"   id="id" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $arr[shop][id];?>" /></td>
 
  </tr>
 
</table>




 
 
 
 <?
 
 	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[pay_type] = $db->select_query("SELECT * FROM loop_pay_type   where status=1   ORDER BY id  ASC  ");
while($arr[pay_type] = $db->fetch($res[pay_type])){ ?>

 



 <?

$res[user_type] = $db->select_query("SELECT * FROM loop_user_type   where status=1  and name<>'company' ORDER BY id  ASC  ");
while($arr[user_type] = $db->fetch($res[user_type])){   ?>
 

<? //=$arr[user_type][name]?>


<script>
/// auto 




 
 /// key
 
$("#price_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>" ).keyup(function() { 

 
var price = document.getElementById('price_<?=$arr[pay_type][name]?>_company_<?=$arr[shop][id]?>').value-document.getElementById('price_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').value;   


if(document.getElementById('price_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').value>0){

 $('#profit_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').html(price);	  
 
} else {
	
	 $('#profit_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').html('-');	
}
 
});



 
var price = document.getElementById('price_<?=$arr[pay_type][name]?>_company_<?=$arr[shop][id]?>').value-document.getElementById('price_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').value;   

if(document.getElementById('price_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').value>0){

 $('#profit_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').html(price);	  
 
} else {
	
	 $('#profit_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').html('-');	
}
 
 

</script>

 




 <?
  } 
 }?>
 
 
 
 
 
 
 
 
 
 
 
  <?
 
 	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[pay_type] = $db->select_query("SELECT * FROM loop_pay_type   where status=1   ORDER BY id  ASC  ");
while($arr[pay_type] = $db->fetch($res[pay_type])){ ?>

 



 <?

$res[user_type] = $db->select_query("SELECT * FROM loop_user_type   where status=1  and name<>'companys' ORDER BY id  ASC  ");
while($arr[user_type] = $db->fetch($res[user_type])){   ?>
 

<? //=$arr[user_type][name]?>


<script>
 
var url_price= "empty_style.php?name=content/load/list/payment&file=pay_select&action=view&type=<?=$_GET[type]?>&id=<?=$arr[shop][id]?>&plan_setting=<?=$_GET[id]?>&main=<? echo $arr[sub][main];?>&pay=company_pay_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>&income=payment_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>&pay_type=<?=$arr[pay_type][name]?>&pay_name=<?=$arr[user_type][name]?>";
 
 

 $('#payment_<?=$arr[pay_type][name]?>_<?=$arr[user_type][name]?>_<?=$arr[shop][id]?>').load(url_price);	  



 

</script>

 




 <?
  } 
 }?>
 
 
 










 </div>


<? }  } ?> 

<? } ?> 

<input   type="hidden"   id="check_tab_price_type" style="width:<?=$text_w?>px; background:#FFFFFF" value="<? echo $_GET[type];?>" />







 <script>
  $("#submit_data_update").click(function(){
	  
 
	  
	 $('#load_main_price_all').html('<center><img src="images/loader.gif" >');  
	 
  $.post('go.php?name=content/load&file=price&op=sub_add_action&id=<?=$_GET[id];?>&type=<?=$_GET[type];?>&control=<?=$_GET[control];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
  
 
  var url_page_type= "go.php?name=content/load/popup&file=price&plan_setting=<?=$_GET[id]?>&type=<?=$_GET[type];?>&control=<?=$_GET[control];?>";
 
  $('#load_main_price_all').load(url_page_type);
  
 

 
 
 
 /// document.getElementById('check_tab_price_type').value=="'all"
 
 /*
     setTimeout(function () {
  
  if($('#check_tab_price_type').val('all')) {  
  
  $("#tab_btn_load_price_all").click();  
  }
   else {
	   
	    $("#tab_btn_load_price_extra").click();   
   }
   
    }, 0); //w
   
   
   
   $("#tab_btn_load_price_extra").click();   
   */
   
   
  
			   });
			    </script>
 <style>
    .div-show-price-bg{
	 padding:5px; background-color:#E6E6E6 ;border-radius: 8px; border: 0px solid #ddd;  margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-top:10px;
 	 
	 
	 
 }
 
  
  </style>
 
 
 

 









<script>

 

   var url_load_price= "popup.php?name=content/load/list/extra&file=form&plan_name=<?=$arr[plan_name][id];?>&plan_setting=<?=$_GET[id]?>&shop_id=<?=$arr[shop][id]?>&type=<? echo $_GET[type];?>";
   
   url_load_price =url_load_price+"&control="+document.getElementById('check_user_price_control').value; 

$('#from_main_price_extra').load(url_load_price); 


 
 
  var url_load_price_extra= "popup.php?name=content/load/list/extra&file=list_extra_price&plan_name=<?=$arr[plan_name][id];?>&plan_setting=<?=$_GET[id]?>&shop_id=<?=$arr[shop][id]?>&type=<? echo $_GET[type];?>";
  
   url_load_price_extra =url_load_price_extra+"&control="+document.getElementById('check_user_price_control').value;

$('#load_main_price_extra').load(url_load_price_extra); 

 

</script>





<?

        if($_GET[op] == "pay"){
		  
		  
 
 
	//////////////////////////////////////////// óź Form
 
 //echo $_GET[type];
 
   $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
 
 
 $res[pay] = $db->select_query("SELECT * FROM  product_price_list_all  where  id=".$_GET[id].""  );
 
 $arr[pay] = $db->fetch($res[pay]);
 
 
 
 $_GET[status]=  $arr[pay][$_GET[type]];
 
 if($_GET[status]==1){
	 
	$_GET[update] =2;
	
	$text='โอนเงิน';	?>
    
 <script>
 
 $('#text_<?=$_GET[type]?>_<?=$_GET[id]?>').html('<B><font color="#000000"><?=$text?>');
 
////alert(0);
</script>

    <?
	
 }
 
 
  if($_GET[status]==2){
	 
	$_GET[update] =1;
	$text='เงินสด';
	?>
    
 <script>
 
 $('#text_<?=$_GET[type]?>_<?=$_GET[id]?>').html('<B><font color="#FF0000"><?=$text?>');
 
////alert(0);
</script>

    <?
 }
 
 
 $db->update_db('product_price_list_all', array(
 
$_GET[type]=>"$_GET[update]"
 
 
		)," id='".$_GET[id]."' ");
		
?>



 
<?
 	

  }
  

?>


  <div id="save_data_open_pay"></div><div id="load_tab_action"></div>
 

<div  class="div-content-price-extra" style="margin-top:20px;  width:100%""> 
  <b><div  class="font-36" style="color:<?=$main_color_dark?>#000000; padding-bottom:5px; border-bottom: 2px solid #dadada; width:100%">ตั้งเงื่อนไขพิเศษ</div ></b> 

<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr style="display:none">
      <td> </td>
    </tr>
    <tr>
      <td><div id="load_main_price_extra"  style="background-color:#FFFFFF"></div></td>
    </tr>
    <tr>
      <td>  <div id="from_main_price_extra" class="div-show-price"></div></td>
    </tr>
  </tbody>
</table>

</div>