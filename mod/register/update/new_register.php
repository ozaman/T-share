
    <div class="back-full-popup">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div   id="btn_close_new_register"><i class="fa fa-arrow-circle-left" style="font-size:22px; color:#FFFFFF "> </div></i></td>
  <td   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup">สมัครเพื่อนร่วมงานใหม่</div></td>
    <td width="50" align="right"   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup_icon"><button type="button" class="btn"     data-backdrop="static" id="btn_send_gps_point" style="padding:1px; width:60px;   background-color: #FFCC00;font-size:15px; margin-top: -2px; display:none " >  <i class='fa  fa-send'></i> <?=chat_send?></button>
 </center></div></td>
  </tr>
</table>
</div>
 
 <br>
<br>
 
 
 

 
 <?
 
 //echo date('Y-m-d');
 
///echo date('N');
 //echo $_GET[id];
 
  
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
$res[dv] = $db->select_query("SELECT * FROM store_driver_register WHERE id='".$_GET[id] ."'  order by id desc limit 1   "); 
$arr[dv] = $db->fetch($res[dv]);
 
 
 
 
        $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $res[other] = $db->select_query("SELECT * FROM  store_carall_register   where  id=".$arr[dv][car_num]."");
		
     $arr[other] = $db->fetch($res[other]);
	 
	 $arr[other][car_type];
		
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
  

            $res[aum]   = $db->select_query("SELECT * FROM " .TB_carall_type." WHERE id='" . $arr[other][car_type] . "' ");
            $arr[aum]   = $db->fetch($res[aum]);
 
 
 
			
			if($arr[aum][topic_en]=='Car'){
			$arr[aum][topic_en]='รถเก๋ง';
			}
			if($arr[aum][topic_en]=='Van'){
			$arr[aum][topic_en]='รถตู้';
			}
			
			
            //$res[cartype] = $db->select_query("SELECT * FROM ".TB_carall." WHERE id='".$arr[category][car_type]."' ");
            //$arr[cartype] = $db->fetch($res[cartype);
            $res[admin] = $db->select_query("SELECT * FROM " . TB_admin . " WHERE id='" . $arr[other][company] . "' ");
            $arr[admin] = $db->fetch($res[admin]);
 
         //  
  
     
?>

 
<div  style="padding-top:20px; display:none" class="font-26"><b><center>สมัครเพื่อนร่วมงานใหม่</div>
<table width="100%"  border="0" cellspacing="2" cellpadding="2" class="drivertable">
  <tr>
    <td width="40%" ><img src="../data/fileupload/store/register/<?=$arr[dv][code];?>_id_driver.jpg?v=<?=$arr[dv][update_date];?>"  width="100%"   border="0"  class="IMGSHOP"   style="margin-top:15px;border-radius:5px;" /></td>
    <td width="60%" valign="top" style="padding-left:20px">
	  <style>
		
	.drivertable{        
        border-radius:5px; margin-top:10px; margin-bottom:10px;

   border:0px solid #999999; background-color:#FFFFFF; 
   box-shadow: 0px 1px 5px #DADADA;  }
	.tdtable  td {height:26px;}
	
	</style>
	  <br><? if($arr[other][plate_color]=="Green"){
	 
	 $plate_color="009999"; } ?>
       <? if($arr[other][plate_color]=="Yellow"){
	 
	 $plate_color="FFCC00"; } ?>
       <? if($arr[other][plate_color]=="Black"){
	 
	 $plate_color="FFFFFF"; } ?>
       <? if($arr[other][plate_color]=="Red"){
	 
	 $plate_color="FF0000"; } ?><table width="95%" cellpadding="1" cellspacing="2"  style="margin-left:0px;  margin-right: 0px; margin-bottom:5px; margin-right:10px; " >
       <?

if($_GET[company_tran] == ''){
	$_GET[company_tran] = 283;
}

if($_GET[company_tran] != ''){
	
	$company_tran = " and company = '".$_GET[company_tran]."' ";

}

if($_GET[status] != ''){
	
	$status = " and status = '".$_GET[status]."' ";

}



 

	$res[category] = $db->select_query("SELECT * FROM ".TB_admin." WHERE id='".$arr[other][company]."' ");
	$arr[category] = $db->fetch($res[category]);

	$res[car_type] = $db->select_query("SELECT * FROM ".TB_carall_type." WHERE id='".$arr[other][car_type]."' ");
	$arr[car_type] = $db->fetch($res[car_type]);
	
	
	
	       $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
  $res[category] = $db->select_query("SELECT * FROM web_amphur where id='".$arr[dv][driver_zone]."'     ");
                       $arr[zone] = $db->fetch($res[category]);
	 

 





	//Comment Icon
 

?>
       <? if($arr[other][plate_color]=="Green"){
	 
	 $plate_color="009999"; } ?>
       <? if($arr[other][plate_color]=="Yellow"){
	 
	 $plate_color="FFCC00"; } ?>
       <? if($arr[other][plate_color]=="Black"){
	 
	 $plate_color="FFFFFF"; } ?>
       <? if($arr[other][plate_color]=="Red"){
	 
	 $plate_color="FF0000"; } ?>
  <td width="80" align="center" bgcolor="#<?=$plate_color?>" style="border: solid 2px; color:#DADADA; padding:5px; padding-right:10px;border-radius:5px;"><font color="#<? if($arr[other][plate_color]=="Green"){
	 
	 echo "FFFFFF"; } ?>"  class="font_26"><b><? echo $arr[other][plate_num];?> <br> 
              <font   class="font_20"><? echo $arr[other][province];?></font></b></font></td>
  </tr>
  <?

 

?>
     </table>
	  <table width="100%"  border="0" cellspacing="2" cellpadding="2"  class="tdtable" >
      <tr>
        <td width="80"  class="font_14"><strong>ประเภท</strong></td>
        <td  class="font_14"><? echo "" . $arr[aum][topic_en] . " "; ?></td>
      </tr>
      <tr>
        <td class="font_14"><strong>ยี่ห้อ</strong></td>
        <td class="font_14"><?echo $arr[other][car_brand];?></td>
      </tr>
      <tr>
        <td class="font_14"><strong>รุ่น</strong></td>
        <td class="font_14"><?echo $arr[other][car_sub_brand];?></td>
      </tr>
    </table></td>
  </tr>
</table>
 
  
 
 
 
 
 
<style>
 .icon { padding-top: 20px; } 
p {
	font-family: Arial, Helvetica, sans-serif; font-size:18px;
}
 
 body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
</style> 


<table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-15px;">
  <tbody>
    <tr>
      <td width="33%"><img src="../data/fileupload/store/register/<?=$arr[dv][code];?>_id_car_1.jpg?v=<?=$arr[dv][update_date];?>"  width="100%"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
      <td width="33%"><img src="../data/fileupload/store/register/<?=$arr[dv][code];?>_id_car_2.jpg?v=<?=$arr[dv][update_date];?>"  width="100%"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
      <td width="33%"><img src="../data/fileupload/store/register/<?=$arr[dv][code];?>_id_car_3.jpg?v=<?=$arr[dv][update_date];?>"  width="100%"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
    </tr>
  </tbody>
</table>











 <table width="100%" border="0" cellspacing="2" cellpadding="2" style="padding:5px;">
   <tbody>
     <tr>
       <td colspan="2"></td>
     </tr>
     
     <tr>
       <td width="100" class="font-16">ชื่อ-นามสกุล</td>
       <td class="font-20"><?=$arr[dv][name]?></td>
     </tr>
     
     
     <tr>
       <td width="100" class="font-16">ชื่อเล่น</td>
       <td class="font-20"><?=$arr[dv][nickname]?></td>
     </tr>
     
          <tr>
       <td width="100" class="font-16">โทรศัพท์</td>
       <td class="font-20">
	   
	   <a href="tel:<?=$arr[dv][phone]?>">
	   
	   <?=$arr[dv][phone]?>
       </a>
       </td>
     </tr>
          <tr>
            <td class="font-16">พื้นที่ประจำ</td>
            <td class="font-20"><?=$arr[zone][name_th];?></td>
          </tr>
          <tr>
            <td class="font-16">วันที่สมัคร</td>
            <td class="font-18"> <? echo   $date = date('Y-m-d ',  $arr[dv][post_date]); ?>
      
  &nbsp;&nbsp;    <span class="font-16" > <font color="#333333" ><? echo   $date = date('H:i:s ',  $arr[dv][post_date]); ?></font></span> 
            
            
            </td>
          </tr>
     
     
               <tr>
       <td colspan="2" class="font-16"> <br>

         
 <div class="<?= $coldata?>">


 <table width="100%"  border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;">
  <tr>
    <td width="50%" class="pad-r-5">
    
    <a  href="?name=register&file=edit&action=edit&id=<?=$arr[dv][id];?>"   style="color:#FFFFFF; font-size:22px">
    
    <button id="submit_new_register" type="button" class="btn btn-block btn-primary" style="width:100% ">ตรวจสอบข้อมูล</button>
    
  </a>  
    
    </td>
    <td width="50%"  class="pad-l-5"><button type="reset" class="btn btn-block btn-default"  style="width:width:100%">ปฏิเสธ</button></td>
  </tr>
</table><br>

</div>    </td>
     </tr>
     
     
     
   </tbody>
 </table>  
 
 
 
 
 
 <script>
   
   $("#submit_new_register").click(function(){ 

$('#load_data_new_alert').fadeOut();
   
   });
   
  
 
 $("#btn_close_new_register").click(function(){ 
  
$('#load_data_new_alert').fadeOut();
   
   });
   
 
 
   
   </script> <br>
 
 