<div style="padding:5px; background-color:#FFFFFF ">


  <table width="100%"  border="0" cellspacing="0" cellpadding="0" style="display:none ">
    <tr>
      <td align="center"> 
	<link rel="stylesheet" href="js/tinybox/style.css" />
<script type="text/javascript" src="js/tinybox/tinybox.js"></script>
<?

 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[TB_driver] = $db->select_query("SELECT * FROM ".TB_driver." where id='".$user_id."'  ");
 $arr[TB_driver] = $db->fetch($res[TB_driver]);
 
$res[car_num] = $db->select_query("SELECT * FROM web_carall where id='".$arr[TB_driver][car_num]."'  ");
 $arr[car_num] = $db->fetch($res[car_num]);	    
 
 
 
 
$name_driver = explode(" ",$arr[TB_driver][name_en]);
 
?>	

        <? if($arr[car_num][plate_color]=="Green"){
	 
	 $plate_color="009999"; } ?>
	 
	 	 <? if($arr[car_num][plate_color]=="Yellow"){
	 
	 $plate_color="FFCC00"; } ?>
	 
	 	 	 <? if($arr[car_num][plate_color]=="Black"){
	 
	 $plate_color="FFFFFF"; } ?>
	 
	 	 	 	 <? if($arr[car_num][plate_color]=="Red"){
	 
	 $plate_color="FF0000"; } ?>
&nbsp;</td>
    </tr>
  </table>			
  <table width="100%" border="0" cellpadding="0" cellspacing="2">
				 	 
                    <tr>
                      <td width="120" align="center" valign="top"><?
$url = "http://t-booking.com/admin/file/driver/pic/" . $arr[TB_driver][post_date] . ".jpg";

$response = get_headers($url, 1);
$file_exists = (strpos($response[0], "404") === false);
       // if (file_exists($filename)) { // Ǩͺ
        if ($file_exists) { // Ǩͺ
?>
                        <a href="http://t-booking.com/admin/file/driver/pic/<?=$arr[TB_driver][post_date];?>.jpg"  class="lightbox"  rel="group1"><img src="http://t-booking.com/admin/file/driver/pic/<?=$arr[TB_driver][post_date];?>.jpg" name="view01" width="100" height="130" border="0" id="view01" class="IMGSHOP" /></a>
                        <? }else{ ?>
                        <img src="admin/file/driver/pic/no.jpg" name="view01" width="90" height="105" border="0" id="view01" class="IMGSHOP" />
                        <? } ?>
						
						
		<?
 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
/*
$res[TB_driver] = $db->select_query("SELECT * FROM ".TB_driver." where id='".$arr[TB_driver][id]."'  ");
 $arr[TB_driver] = $db->fetch($res[TB_driver]);
//*/ 
$res[car_num] = $db->select_query("SELECT * FROM web_carall where id='".$arr[TB_driver][car_num]."'  ");
 $arr[car_num] = $db->fetch($res[car_num]);	    
 
 
 
 
$name_driver = explode(" ",$arr[TB_driver][name_en]);
 
?>	
<? if($arr[car_num][plate_color]=="Green"){
$plate_color="009999"; } ?>
<? if($arr[car_num][plate_color]=="Yellow"){
$plate_color="FFCC00"; } ?>
<? if($arr[car_num][plate_color]=="Black"){
$plate_color="FFFFFF"; } ?>
<? if($arr[car_num][plate_color]=="Red"){
$plate_color="FF0000"; } ?>

<table align="center" class="IMGSHOP" style="margin-top:-5px; ">
  <tr>
    <td width="100" align="center" bgcolor="#<?=$plate_color?>" style="border: solid 1px; color:#CCCCCC; padding:2px;" ><font color="#<? if($arr[car_num][plate_color]=="Green"){
	 
	 echo "FFFFFF"; } ?>" style=" font-size:18px;"><b><? echo $arr[car_num][plate_num];?> <br />
        <font style=" font-size:14px;"><? echo $arr[car_num][province];?>
		</font>
		</td>
  </tr>
</table>
					  </td>
                      <td   valign="middle">
					  <table width="100%" border="0" cellspacing="1" cellpadding="2">

                          <tr style="display:nones ">
                            <td height="30" colspan="3"  style=" border-right:  dotted 0px #999999 ;border-bottom: solid  1px #3399CC;"><strong style="font-size:26px; color:#3399CC "><b> Driver Detail 驾驶员信息</u></b></strong></td>
                          </tr>
                          <tr>
                            <td width="110" height="25"><span class="cccc1"><strong>Name 名</strong></span></td>
                            <td width="20"><span class="cccc1"><strong>:</strong></span></td>
                            <td height="25"><span class="cccc1"><?=$name_driver[0];?></span></td>
                          </tr>
                          <tr>
                            <td height="25"><span class="cccc1"><strong>Last Name 姓</strong></span></td>
                            <td height="25"><span class="cccc1"><strong>:</strong></span></td>
                            <td height="25"><span class="cccc1"><?=$name_driver[1];?> </span></td>
                          </tr>
                          <tr>
                            <td height="25"><span class="cccc1"><strong>Phone 电话</strong></span></td>
                            <td height="25"><span class="cccc1"><strong>:</strong></span></td>
                            <td height="25"><span class="cccc1"><?=$arr[TB_driver][phone];?></span></td>
                          </tr>
                          
						  <tr >
						    <td height="25"><span class="cccc1"><strong>Wechat ID. </strong></span></td>
						    <td height="25"><span class="cccc1"><strong>:</strong></span></td>
						    <td height="25"><span class="cccc1">
						      <? if($arr[TB_driver][wechat_id] == ''){ echo '-';}else{ ?>
						      <?=$arr[TB_driver][wechat_id];?>
						      <? } ?>
						    </span></td>
					    </tr>
						  <tr >
						    <td height="25"><span class="cccc1"><strong>Line ID.  </strong></span></td>
						    <td height="25"><span class="cccc1"><strong>:</strong></span></td>
						    <td height="25"><span class="cccc1">
						      <? if($arr[TB_driver][line_id] == ''){ echo '-';}else{ ?>
                              <?=$arr[TB_driver][line_id];?>
                              <? } ?>
                            </span></td>
					    </tr>
						  <tr >
						    <td height="25"><span class="cccc1"><strong>WhatApp ID  </strong></span></td>
						    <td height="25"><span class="cccc1"><strong>:</strong></span></td>
						    <td height="25"><span class="cccc1">
						      <? if($arr[TB_driver][whatapp] == ''){ echo '-';}else{ ?>
                              <?=$arr[TB_driver][whatapp];?>
                              <? } ?>
                            </span></td>
					    </tr>
                      </table>
					  
 
					  </td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" valign="top">                       
                        <table width="100%" border="0" cellspacing="1" cellpadding="2">
                        <tr>
                          
                          </tr>
                                              </table></td>
                    </tr>
</table>
 </div>