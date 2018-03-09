 
 
 <ul class="nav nav-tabs" style="padding:2px;">
 
 
 	 <li id="btn_chk_qr" style="padding:0px; width:50%"  class="active"><a data-toggle="tab" href="#tab_chk_qr"   style="font-size:16px"  ><img src="images/driver.png" width="30" />&nbsp;คนขับรถ</a></li>
    
    <li id="btn_chk_name" style="padding:0px; width:50%" ><a data-toggle="tab" href="#tab_chk_name"  style="font-size:16px" ><img src="images/customer.png" width="30" />&nbsp;ผู้ใช้บริการ</a></li>
 
 
</ul>
 

 









<?
 //echo 
/// echo $_GET[lat];
 
 /// echo $_GET[lng];
  
 ///date('Y-m-d');


$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
mysql_query("SET NAMES UFT8"); 
mysql_query("SET character_set_results=utf-8"); 
$res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all." WHERE invoice='".$_GET[vc]."' ");
$arr[project] = $db->fetch($res[project]);
///echo date('N');
  
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[drivername] = $db->select_query("SELECT id,nickname,post_date FROM ".TB_driver." WHERE id='".$arr[project][drivername]."' ");
	$arr[drivername] = $db->fetch($res[drivername]);
 
	///echo $arr[project][id];
	
	if($arr[drivername][company]==1133) {
	$find_date="and out_date='". date('Y-m-d')."'";
	} 
 
		else {
  $find_date="and transfer_date='". date('Y-m-d')."'";
	} 
 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
 $allwork = $db->num_rows(TB_transfer_report_all,"id","drivername='".$user_id."'  $find_date  and status = 'CONFIRM' group by invoice    "); 
 

 
 
 
 
 if($_SESSION['data_user_name']){
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
/*
// echo $arr[web_user][car_num];

$pic_main= file_exists("../admin/file/driver/pic/" .$arr[web_user][post_date].".jpg");
$pic_card= file_exists("../admin/file/driver/id_card/".$arr[web_user][post_date].".jpg");
$pic_driver= file_exists("../admin/file/driver/id_driver/".$arr[web_user][post_date].".jpg");
$pic_home= file_exists("../admin/file/driver/id_home/".$arr[web_user][post_date].".jpg");
$pic_job= file_exists("../admin/file/driver/id_job/".$arr[web_user][post_date].".jpg");

/// qr

$pic_qr_line= file_exists("../admin/file/driver/line_qr/".$arr[web_user][post_date].".jpg");
$pic_qr_wechat= file_exists("../admin/file/driver/wechat_qr/".$arr[web_user][post_date].".jpg");
 
  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD); 
            $db->update_db(TB_driver, array(
			"pic_main" => $pic_main,
			"pic_card" => $pic_card,
			"pic_driver" => $pic_driver,
			"pic_home" => $pic_home,
			"pic_job" => $pic_job,
			"pic_qr_line" => $pic_qr_line,
			"pic_qr_wechat" => $pic_qr_wechat
				 
            ), " id=".$arr[web_user][id]." ");
 
 */

$profiledoc=$arr[web_user][pic_main]+$arr[web_user][pic_card]+$arr[web_user][pic_driver]+$arr[web_user][pic_home]+$arr[web_user][pic_job];
$profiledoc=$profiledoc*20;
}
 
////////// file
if($arr[web_user][username]<>""){ $profile_username=1; } else {  $profile_username=0; };
 
if($arr[web_user][password]<>""){ $profile_password=1; } else {  $profile_password=0; };
if($arr[web_user][name]<>""){ $profile_name=1; } else {  $profile_name=0; };
if($arr[web_user][name_en]<>""){ $profile_name_en=1; } else {  $profile_name_en=0; };
if($arr[web_user][nickname]<>""){ $profile_nickname=1; } else {  $profile_nickname=0; };
if($arr[web_user][idcard]<>""){ $profile_idcard=1; } else {  $profile_idcard=0; };
if($arr[web_user][iddriving]<>""){ $profile_iddriving=1; } else {  $profile_iddriving=0; };
if($arr[web_user][address]<>""){ $profile_address=1; } else {  $profile_address=0; };
if($arr[web_user][phone]<>""){ $profile_phone=1; } else {  $profile_phone=0; };
if($arr[web_user][contact]<>""){ $profile_contact=1; } else {  $profile_contact=0; };

 
 $profileall=$profile_username+$profile_password+$profile_name+$profile_name_en+$profile_nickname+$profile_idcard+$profile_iddriving+$profile_address+$profile_phone+ $profile_contact;
 $profileall=$profileall*10;
  $profileno=100-$profileall;
  
$db->connectdb(DB_NAME_DATA, DB_USERNAME, DB_PASSWORD);
$res[car_history] = $db->select_query("SELECT * FROM history_use_car WHERE drivername='".$arr[web_user][id] ."'  order by id desc limit 1   "); 
$arr[car_history] = $db->fetch($res[car_history]);

$res[car_history_last] = $db->select_query("SELECT * FROM history_use_car WHERE drivername='".$arr[web_user][id] ."' and type='start'  order by id desc limit 1   "); 
$arr[car_history_last] = $db->fetch($res[car_history_last]);
 ?>
 
 <? if($arr[web_user] [company]==276 or  $arr[web_user] [company]==283 or  $arr[web_user] [company]==284){ ?>
 
 

 <?
 
 
        $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $res[other] = $db->select_query("SELECT * FROM " . TB_carall . "  where  id=".$carnumber."");
  
    $arr[other] = $db->fetch($res[other]);
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
  
     
?><style type="text/css">
<!--
body,td,th {
	font-size: 13px;
}
-->
</style>


 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
 
  <!-- Theme style -->

 
  
<table width="100%"  border="0" cellspacing="0" cellpadding="0"  style="background-color:#f6f6f6; margin-bottom:10px; "  >
  <tr>
    <td width="80" style="padding:5px;" >
	
	<img src="../../../../../admin/file/driver/pic/<?=$arr[web_user][post_date];?>.jpg"  width="100%"   border="0"  class="IMGSHOP"   style="margin-top:5px;border-radius:5px;" />	</td>
    <td width="100" valign="top" style="padding-left:5px">
	  <style>
 .tdtable  td {height:20px;}
	
	</style>
	  <br><? if($arr[other][plate_color]=="Green"){
	 
	 $plate_color="009999"; } ?>
       <? if($arr[other][plate_color]=="Yellow"){
	 
	 $plate_color="FFCC00"; } ?>
       <? if($arr[other][plate_color]=="Black"){
	 
	 $plate_color="FFFFFF"; } ?>
       <? if($arr[other][plate_color]=="Red"){
	 
	 $plate_color="FF0000"; } ?><table width="100%" cellpadding="0" cellspacing="0"  style="margin-left:0px;  margin-right: 0px; margin-bottom:0px; margin-right:0px; margin-top:-5px; " >
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
  <td width="80" align="center" bgcolor="#<?=$plate_color?>" style="border: solid 0px; color:#CCCCCC; padding:5px; padding-right:10px;border-radius:5px; font-size:22px"><font color="#<? if($arr[other][plate_color]=="Green"){
	 
	 echo "FFFFFF"; } ?>"  class="font_26"><b><? echo $arr[other][plate_num];?> <br>
              <font   class="font_20"><? echo $arr[other][province];?></font></b></font></td>
  </tr>
  <?

 

?>
     </table>
	   <table width="100%"  border="0" cellspacing="2" cellpadding="2"  class="tdtable" >
      <tr>
        <td width="80" class="font_14"><strong>ยี่ห้อ</strong></td>
        <td class="font_14"><?echo $arr[other][car_brand];?></td>
      </tr>
      <tr>
        <td class="font_14"><strong>รุ่น</strong></td>
        <td class="font_14"><?echo $arr[other][car_sub_brand];?></td>
      </tr>
    </table></td>
    <td valign="top" style="padding-left:5px; padding-top:10px; padding-right:5px;" ><table width="100%" border="0" cellspacing="2" cellpadding="2" style="border : 1px solid #999999;  
	z-index:99999; background-color:#FFFFFF;   -moz-border-radius:10px;
	
 
	
	
  -webkit-border-radius:3px;

 border-radius:3px; margin-right: " id="load_data_direction">
      <tr>
        <td style="font-size:16px"> <i class="fa fa-dashboard" style="font-size:16px; color:#999999  "></i>&nbsp;ระยะทาง </td>
      </tr>
      <tr>
      <td style="font-size:18px; font-weight:400" id="load_km"></td>
      </tr>
      <tr>
     <td style="font-size:16px"> <i class="fa  fa-history" style="font-size:16px; color:#999999"></i>&nbsp;เวลาเดินทาง </td>
      </tr>
      <tr>
        <td style="font-size:16px" id="load_time"></td>
      </tr>
    </table></td>
  </tr>
</table>
<? } ?>
  
 
 
 
 
 
 <style>
 .icon { padding-top: 20px; } 
p {
	font-family: Arial, Helvetica, sans-serif; font-size:18px;
}
 
 body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
