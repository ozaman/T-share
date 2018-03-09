 
 <?
 
 //echo date('Y-m-d');
 
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
<div  style="margin-right: 0px; padding:10px;box-shadow: 0px -5px 10px #B4B4B4; background-color:#FFFFFF">
 <form id="edit_form"  name="edit_form" action="" method="post" enctype="multipart/form-data"   >
					
<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><select name="car_number" id="car_number"  class="form-control"  style="font-size:20px; font-weight:bold; height:50px;" onchange="return find_transfer_status_check();" >
		  <option value="" selected="selected">-- กรุณาเลือก --</option>
 
            <?
$checkdv=0;
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
$res[category] = $db->select_query("SELECT * FROM " . TB_carall . "  where company=276 or company=283 or company=284 order by company,car_num asc");
        ;
        while ($arr[category] = $db->fetch($res[category])) {
            $res[aum]   = $db->select_query("SELECT * FROM " . TB_carall_type . " WHERE id='" . $arr[category][car_type] . "' ");
            $arr[aum]   = $db->fetch($res[aum]);
            $res[aum]   = $db->select_query("SELECT * FROM " . TB_carall_type . " WHERE id='" . $arr[category][car_type] . "' ");
            $arr[aum]   = $db->fetch($res[aum]);
			
			if($arr[aum][topic_en]=='Car'){
			$arr[aum][topic_en]='รถเก๋ง';
			}
			if($arr[aum][topic_en]=='Van'){
			$arr[aum][topic_en]='รถตู้';
			}
			
			
            //$res[cartype] = $db->select_query("SELECT * FROM ".TB_carall." WHERE id='".$arr[category][car_type]."' ");
            //$arr[cartype] = $db->fetch($res[cartype);
            $res[admin] = $db->select_query("SELECT * FROM " . TB_admin . " WHERE id='" . $arr[category][company] . "' ");
            $arr[admin] = $db->fetch($res[admin]);
            echo "<option value=\"" . $arr[category][id] . "\"";
			
 if($arr[category][id] == $arr[car_history][car_number] and $arr[car_history][type]== 'start' ) { 
  $checkdv=1;
			 echo " Selected";
			
	}

          if ($arr[category][id] == $arr[web_user][car_num] and $checkdv==0) {
                echo " Selected";
            }
			
						
 
            echo ">" . $arr[category][car_num] . "  ( " . $arr[aum][topic_en] . " )  -  " . $arr[admin][company] . " </option>";
        }
        $db->closedb();
?>
          </select></td>
  </tr>
  <tr>
    <td  style="padding-top:10px; "><div  id="send_user_data"></div>
	<button id="submit_data" type="button" class="btn btn-block btn-primary" style="width:100%; font-size:20px; background-color: #FF9933 ; border:2px solid #FFFFFF;">บันทึกข้อมูลการใช้งานรถ</button></td>
  </tr>
</table>
<script>
 /// check login

$("#submit_data").click(function(){ 

if(document.getElementById('car_number').value=="") {
swal('กรุณาเลือกรถที่ต้องการขับ'); 
document.getElementById('car_number').focus() ; 
return false ;
}
 
 $.post('popup.php?name=user&file=savedata&type=selectcar&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
 
 
 });
 </script> 
</form></div>
 

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
  
     
?>


<div class="box-body" style="padding:0px; padding-top:10px; ">
     <table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="33%"> <a class="btn btn-app " style="background-color:#FFFFFF; width:auto"  >
                <span class="badge bg-yellow"><font class="font_14"><?=$allwork?></font></span>
                <i class="fa fa-clock-o "></i> <font class="font_14">งานวันนี้
              </a></td>
    <td width="33%">              <a class="btn btn-app" style="background-color:#FFFFFF ">
                <span class="badge bg-teal"><font class="font_14"><?= $profileall?>%</font></span>
                <i class="fa fa-user"></i> <font class="font_14">โปรไฟล์
              </a></td>
    <td width="33%">              <a class="btn btn-app" style="background-color:#FFFFFF ">
                <span class="badge bg-red"><font class="font_14">0</font></span>
                <i class="fa fa-bell"></i> <font class="font_14">แจ้งเตือน
              </a></td>
  </tr>
</table>

              
             
 
 


 
 </div> 
  
<table width="100%"  border="0" cellspacing="2" cellpadding="2" class="drivertable">
  <tr>
    <td width="40%" ><img src="http://t-booking.com/admin/file/driver/pic/<?=$arr[web_user][post_date];?>.jpg"  width="100%"   border="0"  class="IMGSHOP"   style="margin-top:15px;border-radius:5px;" /></td>
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
  <td width="80" align="center" bgcolor="#<?=$plate_color?>" style="border: solid 0px; color:#CCCCCC; padding:5px; padding-right:10px;border-radius:5px;"><font color="#<? if($arr[other][plate_color]=="Green"){
	 
	 echo "FFFFFF"; } ?>"  class="font_26"><b><? echo $arr[other][plate_num];?> <br>
              <font   class="font_20"><? echo $arr[other][province];?></font></b></font></td>
  </tr>
  <?

 

?>
     </table>
	  <table width="100%"  border="0" cellspacing="2" cellpadding="2"  class="tdtable" >
      <tr>
        <td width="80"  class="font_14"><strong>หมายเลข</strong></td>
        <td  class="font_14"><? echo "" . $arr[other][car_num] . ""; ?></td>
      </tr>
      <tr>
        <td  class="font_14"><strong>ประเภท</strong></td>
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
