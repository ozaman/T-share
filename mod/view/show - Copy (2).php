

 
        <script type="text/javascript" src="scripts/jMobile.js"></script>
        <script type="text/javascript" src="scripts/iteMain.js"></script><style type="text/css"></style>
        <script type="text/javascript" src="scripts/jQueryMask.js"></script>
 
  

        <style type="text/css">
        
         input[type='text'], input[type='number'], input[type='tel'],textarea, input[type='password']
                {
                        background-color:White !important;
                        -moz-box-shadow: none !important;
                        -webkit-box-shadow: none !important;
                        box-shadow: none !important;
                        -moz-border-radius: 0em !important;
                        -webkit-border-radius: 0em !important;
                        border-radius:0em !important;
                        border:solid 1px #CCCCCC !important;
                }
        </style>

 
 

 
 
  <link rel="stylesheet" href="js/dialog/css.css">
   <script src="js/dialog/main.js"></script>
  <script src="js/dialog/ui.js"></script>
 
       
<style type="text/css"> 
         #ulMember .mcode {display:inline-block;width:85px;}  
         #ulMember .inv {font-size:0.9em;color:#777777;}
         .ulLevel table {width:98%;}
         .ulLevel .col1 {width:40px;text-align:center;}
         .ulLevel .col2 {padding-left:10px;}
         .ulLevel .col3 {text-align:right;width:200px;}
         .ulLevel .mnl {color:#777777;font-size:0.85em;margin-right:5px;}
         .ulLevel .mnt {display:inline-block;width:80px;margin-right:50px;}
         .ulLevel .mnb {display:inline-block;width:80px;}
         .ulLevel .txl {display:inline-block;width:120px;padding:2px;text-align:left;}
         .ulLevel .txa {display:inline-block;width:50px;text-align:right;padding:2px;background-color:#CCCCCC;border-radius:5px;}
         .ulLevel .txg {display:inline-block;width:50px;text-align:right;padding:2px;background-color:#26CA50;border-radius:5px;text-shadow:none !important;font-weight:bold;}
         .ulLevel .txr {display:inline-block;width:50px;text-align:right;padding:2px;background-color:red;border-radius:5px;color:White; text-shadow:none !important;font-weight:bold;}
         .ulLevel .line {margin:2px;}
         .ulLevel .tbx {width:auto !important;margin-top:5px;}
         .ulLevel .tbx th {background-color:#888888;font-size:0.8em;font-weight:bold;width:100px; text-align:center;color:white;padding:5px 3px;border-radius:5px;}
         .ulLevel .tbx td {text-align:center;padding:5px 3px;}
         .ulLevel .red5 {background-color:Red;color:White;cursor:pointer;border-radius:5px;}
         .ulLevel .green5 {background-color:#26CA50;color:White;cursor:pointer;border-radius:5px;}
         .ulLevel .gay5 {background-color:#888888;color:White;cursor:pointer;border-radius:5px;}
         .ulLevel .normal {background-color:#EEEEEE;cursor:pointer;border-radius:5px;}
         .Detail div {margin-bottom:2px;}
         .Detail .mcode {display:inline-block;width:90px;margin-right:10px;}
         .Detail .tel {color:#666666;font-size:0.9em;}
         .Detail table {}
         .Detail th {background-color:#888888;font-size:0.8em;font-weight:bold;width:90px; text-align:center;color:white;padding:5px 3px;border-radius:5px;}
         .Detail td {text-align:center;padding:5px 3px;}
         .Detail .red5 {background-color:Red;color:White;border-radius:5px;}
         .Detail .green5 {background-color:#26CA50;color:White;border-radius:5px;}
         .Detail .gay5 {background-color:#888888;color:White;border-radius:5px;}
         .circleC {font-size:1.6em;}
		 .ui-dialog button.custom { background: #2dd25a;color:White; }
		 .ui-dialog button.closed { background: #fa1431;color:White; }
		 
		 /* Mask for background, by default is not display */
#mask {
    display: none;
    background: #000;
    position: fixed;
    left: 0;
    top: 0;
    z-index: 10;
    width: 100%;
    height: 100%;
    opacity: 0.8;
    z-index: 999;
}

/* You can customize to your needs  */
.login-popup {
    display: none;
    background: #333;
    padding: 10px;
    border: 2px solid #ddd;
    float: left;
    font-size: 1.2em;
    position: fixed;
    top: 50%;
    left: 50%;
    z-index: 99999;
    box-shadow: 0px 0px 20px #999;
    /* CSS3 */
        -moz-box-shadow: 0px 0px 20px #999;
    /* Firefox */
        -webkit-box-shadow: 0px 0px 20px #999;
    /* Safari, Chrome */
	border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px;
    /* Firefox */
        -webkit-border-radius: 3px;
    /* Safari, Chrome */;
}

img.btn_close {
    Position the close button
	float: right;
    margin: -28px -28px 0 0;
}

fieldset {
    border: none;
}

form.signin .textbox label {
    display: block;
    padding-bottom: 7px;
}

form.signin .textbox span {
    display: block;
}

form.signin p, form.signin span {
    color: #999;
    font-size: 11px;
    line-height: 18px;
}

form.signin .textbox input {
    background: #666666;
    border-bottom: 1px solid #333;
    border-left: 1px solid #000;
    border-right: 1px solid #333;
    border-top: 1px solid #000;
    color: #fff;
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    font: 13px Arial, Helvetica, sans-serif;
    padding: 6px 6px 4px;
    width: 200px;
}

form.signin input:-moz-placeholder {
    color: #bbb;
    text-shadow: 0 0 2px #000;
}

form.signin input::-webkit-input-placeholder {
    color: #bbb;
    text-shadow: 0 0 2px #000;
}

.button {
    background: -moz-linear-gradient(center top, #f3f3f3, #dddddd);
    background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#dddddd));
    background: -o-linear-gradient(top, #f3f3f3, #dddddd);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f3f3f3', EndColorStr='#dddddd');
    border-color: #000;
    border-width: 1px;
    border-radius: 4px 4px 4px 4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    color: #333;
    cursor: pointer;
    display: inline-block;
    padding: 6px 6px 4px;
    margin-top: 10px;
    font: 12px;
    width: 214px;
}

.button:hover {
    background: #ddd;
}
.ui-widget-overlay 
{
    background-color: black;
    background-image: none;
    opacity: 0.6;
    z-index: 1040;    
}


      </style>

 
<div  >
    
<?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[gg_map] = $db->select_query("SELECT id,map,transferplace_type,star FROM ".TB_transferplace_new."  ");
	while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_map[$arr[gg_map][id]] = $arr[gg_map][map];
		$arr_type[$arr[gg_map][id]] = $arr[gg_map][transferplace_type];
		$arr_star[$arr[gg_map][id]] = $arr[gg_map][star];
 
 
	}
	
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[gg_map] = $db->select_query("SELECT id,topic,province,amphur FROM ".TB_transferplace."  ");
	while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_t_topic[$arr[gg_map][id]] = $arr[gg_map][topic];
		$arr_t_province[$arr[gg_map][id]] = $arr[gg_map][province];
		$arr_t_amphur[$arr[gg_map][id]] = $arr[gg_map][amphur];
	}	


if($_GET[sv] == 'cn'){
	$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$link_vc = "http://www.t-bookingcn.com/";
}else{
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$link_vc = "http://www.t-booking.com/";
}

$res[web_user] = $db->select_query("SELECT * FROM web_driver WHERE username='".$_SESSION['data_user_name']."'    "); 
$arr[web_user] = $db->fetch($res[web_user]);

$user_id =  $_SESSION['data_user_id'];
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM ".TB_order."  where drivername='".$user_id."' and transfer_date='".$_GET[day]."' and carno = '".$_GET[carno]."' order by airin_h ASC,airin_time ASC  limit 1 ");

///$res[project] = $db->select_query("SELECT * FROM ".TB_order."  where drivername='".$user_id."' order by airin_h ASC,airin_time ASC limit 1  ");
 
 
?>

    <div data-role="content"   role="main">
 
 <?
$i=1;
while($arr[project] = $db->fetch($res[project])){
$datetime = $arr[project][outdate]." ".$arr[project][airout_time].":00";
$exp = explode(" ",$datetime);
$t = explode(":",$exp[1]);
$d = explode("-",$exp[0]);
$time_booking = @mktime($t[0], $t[1], $t[2], $d[1], $d[2], $d[0]);	


	$res[product] = $db->select_query("SELECT cartype,area,admin_company FROM web_transferproduct WHERE id='".$arr[project][program]."' ");
	$arr[product] = $db->fetch($res[product]);
	
	$res[book] = $db->select_query("SELECT guest,phone FROM ".TB_book_agent." WHERE id='".$arr[project][orderid]."' ");
	$arr[book] = $db->fetch($res[book]);
	
	$res[showlogo] = $db->select_query("SELECT * FROM ".TB_admin." WHERE id='".$arr[project][agent]."' ");
	$arr[showlogo] = $db->fetch($res[showlogo]);
	
 

  $chk_logo = file_exists("../admin/file/logo/".$arr[project][agent].".jpg");
	

/*
	$res[place] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][pickup_place]."' ");
	$arr[place] = $db->fetch($res[place]);
	
	$res[to] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][to_place]."' ");
	$arr[to] = $db->fetch($res[to]);
*/	
	//////////
//for($i=1;$i<=6;$i++){


?>
 <div  class="box box-default" style="padding:10px;"    >
 
                  <table width="100%" >
              
                        <tr>
                           <td  >
						   
						
						   
						   
						   <div style="font-size:24px; background-color:#FFFFFF; margin-top:-5px; border-bottom: solid 1px #999999" >
 
 
						   <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="60"  style="background-color:#F6F6F6 "><div   id="cir_<?=$i;?>">
      <table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td   class="boxnumber" style="font-size:20px; color:#FFFFFF; font-weight:bold "><center><?=$_GET[car_list];?> / <?=$i;?></center></td>
  </tr>
</table>
</div> </td>
    <td width="80" style="background-color:#F6F6F6 "><div style="font-size:16px ; font-weight:bold; margin-top:-5px">  
	<? if($arr[product][cartype] == 2){  ?>
	<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><img src="images/users.png"  align="absmiddle"    /></td>
    <td  style="font-size:16px ; font-weight:bold">จอย </td>
  </tr>
</table>

	  
	
	<? }else{ ?>
	<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><img src="images/user.png" align="absmiddle"    /></td>
    <td  style="font-size:16px ; font-weight:bold">ไพรเวท</td>
  </tr>
</table>
	 
	 
	 <? } ?> </div></td>
    <td width="140" style="font-size:16px ; font-weight:bold"> &nbsp;  <? if($arr[product][area] == 'In'){ ?> 
						   รับเข้า
						   <img src="images/car/in.png" height="20" align="absmiddle"    style="display:nones" />
						   <? }elseif($arr[product][area] == 'Out'){ ?>
						   ส่งออก
						   <img src="images/car/out.png" height="20" align="absmiddle"   style="display:nones" /> 
						   <? }elseif($arr[product][area] == 'Point'){ ?>  
						   <img src="images/car/to.png" height="20" align="absmiddle"   style="display:nones"  />
						   พ้อยท์ทูพ้อยท์
						   <? }else{ ?> 
						   <img src="images/car/truck.png" height="20" align="absmiddle" style="display:nones"  />
						   เซอร์วิส
						   <? } ?></td>
    <td align="right" ><? if($arr[project][driver_complete] > 0){   ?>
        <img src="images/icon/accept.png"  align="bottom"   />
        <? } ?>
      &nbsp;&nbsp;</td>
  </tr>
</table>
 
						   
						   <table width="100%" border="0" cellspacing="2" cellpadding="2">
                             <tr>
                               <td  s > <div style="font-size:16px ; font-weight:bold; margin-top:-5px">
                                   </div> 
                               </td>
                             </tr>
                           </table>
						   </div>   
						   </td>
						</tr>
						<tr>
                           <td  >
 
 
 <table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
 
  </tr>
  <tr>
    <td ><div style="background-color:#F6F6F6; margin-top:5px; margin-bottom:5px; padding: 2px 0px 2px 0px;"   >
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="140" valign="top"><div class="topictransfer" style=" margin-top:-5px; margin-left:" ><i class="fa  fa-map-marker" style="color:#c1c1c1"></i> <span class="font_18">สถานที่รับ</span></div></td>
          <td width="80"> <? if($arr_t_topic[$arr[project][pickup_place]] != ''){ ?>
        <? if( $arr_map[$arr[project][pickup_place]] != '' ){   ?>
        <a class="test" data-toggle="tooltip" title="แสดงแผนที่นำทาง" href="<?=$arr_map[$arr[project][pickup_place]];?>" target="_blank"><img src="images/icon/view/map.png"   align="bottom"  width="50"    />
        <? } ?>
        
      <? if( $arr_map[$arr[project][pickup_place]] != '' ){   ?>
        </a>
        <? } ?>
        <? } ?>
		
		
		<? if($arr_map[$arr[project][pickup_place]]==""){ ?>
		<a data-toggle="tooltip" title="ไม่มีแผนที่นำทาง"><img src="images/icon/view/no/map.png"   align="bottom"  width="50"    /></a>
		
		<? } ?>
		
		</td>
          <td width="40">
		  <?
	  $res[phone] = $db->select_query("SELECT id,phone FROM ".TB_transferplace." where id=".$arr[project][pickup_place]."  ");
	 $arr[phone] = $db->fetch($res[phone]);
		   
	  ?>
	   
<? if($arr[phone][phone]<>""){ 

$string_to_replace     = array ("-" ,"," , " ");
$string_after_replace  = array ("" ,"&nbsp;&nbsp;&nbsp;" , "" ,);
$arr[phone][phone]       = str_replace($string_to_replace , $string_after_replace , $arr[phone][phone] , $count);   
}
?>
		
		  
<? if($arr[phone][phone]<>""){  ?>
 
<a  href="tel:<?=$arr[phone][phone]?>"  target="_blank" class="test" data-toggle="tooltip" title="โทรออก"><img src="images/icon/view/phone.png" width="50"   align="bottom"  /></a>
 <? } ?>
		<? if($arr[phone][phone]==""){  ?>
 <a data-toggle="tooltip" title="ไม่มีเบอร์ติดต่อ"><img src="images/icon/view/no/phone.png" width="50"   align="bottom"  /> </a>
 <? } ?>
		  
		  
		   
		   </td>
        <td>&nbsp;</td>
        </tr>
      </table>
    </div>
    </td>
  </tr>
  <tr>
    <td>
	 
	
	
	
		<div  align="left">
        <? if($arr_t_topic[$arr[project][pickup_place]] != ''){ ?>
        <? if( $arr_map[$arr[project][pickup_place]] != '' ){   ?>
 
        <? } ?>
		
        <? echo $arr_t_topic[$arr[project][pickup_place]];?> (
        <?=$arr_t_province[$arr[project][pickup_place]];?>
      /
      <?=$arr_t_amphur[$arr[project][pickup_place]];?>
      )
      <? if( $arr_map[$arr[project][pickup_place]] != '' ){   ?>
   
        <? } ?>
        <? } ?>
		
		<? if($arr[phone][phone]<>""){ ?>  
<br>

<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="bottom" style="width:20px;color:<?=$main_color?>; font-size:18px;"><b><i class="fa  fa-phone" ></li></b></td>
    <td><div style=" padding-top:5px;  color:<?=$main_color?>;font-size:18px;" ><b>
	  <? echo $arr[phone][phone] ;?> </b>
	</div></td>
  </tr>
</table>
 
 
	<? } ?>
	  
		
		
		
    </div>
	</td>
  </tr>
  <tr>
    <td ><div class="topictransfer"><i class="fa  fa-clock-o" style="color:#c1c1c1"></i> รับแขก</div></td>
  </tr>
  <tr>
    <td><?echo $arr[project][airout_time];?></td>
  </tr>
  <tr style="display: none<? if($arr[product][area] == 'In' ){ echo "1"; } ?>">
    <td  ><div class="topictransfer">เที่ยวบิน</div></td>
  </tr>
  <tr style="display: none<? if($arr[product][area] == 'In' ){ echo "1"; } ?>">
    <td><div  align="left"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></div></td>
  </tr>
  <tr>
    <td ><div class="topictransfer"><i class="fa  fa-recycle" style="color:#c1c1c1"></i> เอเย่นต์</div></td>
  </tr>
  <tr>
    <td><div  align="left"><?echo $arr[showlogo][company];?></div></td>
  </tr>
  <tr>
    <td  ><div class="topictransfer"><i class="fa  fa-users" style="color:#c1c1c1"></i> ชื่อแขก</div></td>
  </tr>
  <tr>
    <td><?echo $arr[book][guest];?></td>
  </tr>
    <tr>
    <td  ><div class="topictransfer"><i class="fa  fa-phone" style="color:#c1c1c1"></i> ติดต่อ</div></td>
  </tr>
  <tr>
    <td><?echo $arr[book][phone];?></td>
  </tr>
  <tr>
    <td  ><div class="topictransfer"><i class="fa  fa-building" style="color:#c1c1c1"></i> วอเชอร์</div></td>
  </tr>
  <tr>
    <td> <a href="<?=$link_vc;?>/print.php?name=admin/voucher&amp;file=<? echo $arr[project][type];?>&amp;no=<? echo $arr[project][id];?>&amp;order=<? echo $arr[project][orderid];?>&amp;code=<? echo $arr[project][code];?>" target="_blank"> <font color="#00808B" style="font-size:20px; font-weight:bold ">
      <?=$arr[project][invoice];?></font>
 </a> </td>
  </tr>
  <tr>
    <td ><div style="background-color:#F6F6F6; margin-top:5px; margin-bottom:5px; padding: 2px 0px 2px 0px;"   ><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="140" valign="top"><div class="topictransfer" style=" margin-top:-5px;" ><i class="fa  fa-map-marker" style="color:#c1c1c1"></i> <span class="font_18">สถานที่ส่ง</span></div></td>
        <td width="80" ><div >
				<? if($arr_t_topic[$arr[project][to_place]] != ''){ ?>
            <? if( $arr_map[$arr[project][to_place]] != '' ){   ?>
            <a class="test" data-toggle="tooltip" title="แสดงแผนที่นำทาง"  href="<?=$arr_map[$arr[project][to_place]];?>" target="_blank" ><img src="images/icon/view/map.png"   align="bottom"  width="50"    />
            <? } ?>
            <? if( $arr_map[$arr[project][to_place]] != '' ){   ?>
            </a>
            <? } ?>
            <? } ?>
			
			
		<? if($arr_map[$arr[project][to_place]]==""){ ?>
		<a data-toggle="tooltip" title="ไม่มีแผนที่นำทาง"><img src="images/icon/view/no/map.png"   align="bottom"  width="50"    /></a>
		
		<? } ?>
			
			</div>
			</td>
        <td><div  >
		   <?
	  $res[phoneto] = $db->select_query("SELECT id,phone FROM ".TB_transferplace." where id=".$arr[project][to_place]."  ");
	 $arr[phoneto] = $db->fetch($res[phoneto]);
		   
	  ?>
	   
<? if($arr[phoneto][phone]<>""){ 

$string_to_replace     = array ("-" ,"," , " ");
$string_after_replace  = array ("" ,"" , "" ,);
$arr[phoneto][phone]      = str_replace($string_to_replace , $string_after_replace , $arr[phoneto][phone] , $count);   

}
?>
		
		
		
		<? if($arr[phoneto][phone]<>""){  ?>
<a href="tel:<?=$arr[phoneto][phone]?>"  target="_blank" class="test"  data-toggle="tooltip" title="โทรออก"  ><img src="images/icon/view/phone.png" width="50"   align="bottom" id="no_phone_toplace" /></a>
 <? } ?>
		<? if($arr[phoneto][phone]==""){  ?>
<a data-toggle="tooltip" title="ไม่มีเบอร์ติดต่อ" ><img src="images/icon/view/no/phone.png" width="50"   align="bottom"  /> </a>
 <? } ?>
		  
		 
		

		</div>
		
		</td>
      </tr>
    </table>
	
	</div>
	
	
	</td>
  </tr>
  <tr>
    <td ><div  align="left">
        <? if($arr_t_topic[$arr[project][to_place]] != ''){ ?>
        <? if( $arr_map[$arr[project][to_place]] != '' ){   ?>
          <? } ?><b></b>
        <? echo $arr_t_topic[$arr[project][to_place]];?> (
        <?=$arr_t_province[$arr[project][to_place]];?>
      /
      <?=$arr_t_amphur[$arr[project][to_place]];?>
      )
      <? if( $arr_map[$arr[project][to_place]] != '' ){   ?>
 
        <? } ?>
        <? } ?>




		
		<? if($arr[phoneto][phone]<>""){  ?>
		 
<br><table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="bottom" style="width:20px;color:<?=$main_color?>; font-size:18px;"><b><i class="fa  fa-phone" ></li></b></td>
    <td><div style=" padding-top:5px;  color:<?=$main_color?>;font-size:18px;" ><b>
  <? echo $arr[phoneto][phone] ;?> </b>
	</div></td>
  </tr>
</table>
  
	<? } ?>  
		
      </div>
        <div  align="left"><?echo $arr[to][topic];?></div></td>
  </tr>
  <tr style="display: none<? if($arr[product][area] == 'Out'){ echo "1"; } ?>">
    <td  ><div class="topictransfer"><i class="fa  fa-plane" style="color:#c1c1c1"></i> เที่ยวบิน</div></td>
  </tr>
  <tr style="display: none<? if($arr[product][area] == 'Out'){ echo "1"; } ?>">
    <td><div  align="left"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></div></td>
  </tr>
  <tr>
    <td ><div class="topictransfer"><i class="fa  fa-pencil" style="color:#c1c1c1"></i> หมายเหตุ</div></td>
  </tr>
  <tr>
    <td ><div  align="left"><?echo $arr[project][remark];?></div></td>
  </tr>
</table>

 <?  include ("mod/load/show/phone.php");?>
 
 
 
 
 
 
                              <table border="0" cellpadding="2" cellspacing="2"  style="display:none ">
                    
                                    <tr>
                                      <td class="green5">สถานที่รับ</td>
                                      <td><div  align="left">
                                          <? if($arr_t_topic[$arr[project][pickup_place]] != ''){ ?>
                                          <? if( $arr_map[$arr[project][pickup_place]] != '' ){   ?>
                                          <a href="<?=$arr_map[$arr[project][pickup_place]];?>" target="_blank"> <img src="../iconstatus/pinmap.png" width="20" />
                                          <? } ?>
                                          <? echo $arr_t_topic[$arr[project][pickup_place]];?> (
                                            <?=$arr_t_province[$arr[project][pickup_place]];?>
                                            /
                                            <?=$arr_t_amphur[$arr[project][pickup_place]];?>
                                            )
                                            <? if( $arr_map[$arr[project][pickup_place]] != '' ){   ?>
                                          </a>
                                          <? } ?>
                                          <? } ?>
                                      </div></td>
                                    </tr>
									<tr>
                                       <td class="gay5">รับแขก</td>
                                       <td><div  align="left"><?echo $arr[project][airout_time];?></div></td>
                                    </tr>
									<tr style="display: none<? if($arr[product][area] == 'In' ){ echo "1"; } ?>">
                                       <td class="gay5">เที่ยวบิน</td>
                                       <td><div  align="left"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></div></td>
                                    </tr> 
									<tr>
									  <td class="gay5">เอเย่นต์</td>
									  <td><div  align="left"><?echo $arr[showlogo][company];?></div></td>
								   </tr>
									<tr>
                                       <td class="gay5">ชื่อแขก</td>
                                       <td><div  align="left"><?echo $arr[book][guest];?></div></td>
                                    </tr>
									<tr>
                                       <td class="gay5">ติดต่อ</td>
                                       <td><div  align="left"><?echo $arr[book][phone];?></div></td>
                                    </tr>
									<tr>
                                       <td class="gay5">วอซอร์</td>
                                       <td>
<div  align="left">
<strong>
<a href="<?=$link_vc;?>/print.php?name=admin/voucher&amp;file=<? echo $arr[project][type];?>&amp;no=<? echo $arr[project][id];?>&amp;order=<? echo $arr[project][orderid];?>&amp;code=<? echo $arr[project][code];?>" target="_blank">
<font style="16px;">
<font color="#52A7E1">
            <?=$arr[project][invoice];?>
			</font></font>            </a></strong> </div>									   </td>
                                    </tr>
                                    <tr>
                                      <td class="red5">สถานที่ส่ง</td>
                                      <td ><div  align="left">
                                          <? if($arr_t_topic[$arr[project][to_place]] != ''){ ?>
                                          <? if( $arr_map[$arr[project][to_place]] != '' ){   ?>
                                          <a href="<?=$arr_map[$arr[project][to_place]];?>" target="_blank"> <img src="../iconstatus/pinmap.png" width="20" />
                                          <? } ?>
                                          <? echo $arr_t_topic[$arr[project][to_place]];?> (
                                            <?=$arr_t_province[$arr[project][to_place]];?>
                                            /
                                            <?=$arr_t_amphur[$arr[project][to_place]];?>
                                            )
                                            <? if( $arr_map[$arr[project][to_place]] != '' ){   ?>
                                          </a>
                                          <? } ?>
                                          <? } ?>
                                        </div>
                                          <div  align="left"><?echo $arr[to][topic];?></div></td>
                                    </tr>
									<tr style="display: none<? if($arr[product][area] == 'Out'){ echo "1"; } ?>">
                                       <td class="gay5">เที่ยวบิน</td>
                                       <td><div  align="left"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></div></td>
                                    </tr>
									<tr>
                                       <td class="red5">หมายเหตุ</td>
                                       <td ><div  align="left"><?echo $arr[project][remark];?></div></td>
                                    </tr> 
                         
                             </table>
<!--  แสดงแขก -->								  
<div id="dialog_guest<?=$arr[project][id];?>" title="เช็คชื่อแขก" style="display:none;padding:0px 10px; max-width:500px;">
 <table  >
                            
									<tr style=" display:none<? if($chk_logo==1){echo "show";} ?>">
                                       <td colspan="2"><div  align="left">
									   <? if($chk_logo==1){ ?>
									   <img src="../admin/file/logo/crop/<?=$arr[project][agent];?>.jpg" name="view01" height="80" border="0"       />
									   <br />
									   <? } ?>
									   </div></td>
                                    </tr>
									<tr>
                                       <td  ><div class="topictransfer">เอเย่นต์</div></td>
                                       
                                    </tr>
									<tr>
									  <td class="gay5"><?echo $arr[showlogo][company];?></td>
			    </tr>
									<tr>
                                       <td class="gay5"><div class="topictransfer">ชื่อแขก</div></td>
                                    </tr>
									<tr>
									  <td class="gay5"><?echo $arr[book][guest];?></td>
			    </tr>
									<tr>
                                       <td class="gay5"><div class="topictransfer">ติดต่อ</div></td>
                                    </tr>
									<tr>
									  <td class="gay5"><?echo $arr[book][phone];?></td>
			    </tr>
									<tr>
                                       <td class="gay5"><div class="topictransfer">วอเชอร์</div></td>
                                    </tr>
									<tr>
									  <td class="gay5"><?echo $arr[project][invoice];?></td>
			    </tr>
									<tr>
                                       <td class="red5"><div class="topictransfer">หมายเหตุ</div></td>
                                    </tr>
									<tr>
									  <td class="red5"><?echo $arr[project][remark];?></td>
			    </tr> 
                          
            </table>
</div>	
<!--  End Guest -->						  
<hr style="border: dotted 1px #cdcbcd" />
<table width="100%" cellpadding="3">
	<tr>
		<td width="100%" valign="top">
		<div id="tab_to_<?=$arr[project][id];?>" style="margin-bottom:5px; padding:5px; border-bottom:  solid 2px #CDCDCD ; ">
 
<table width="100%"  border="0" cellspacing="2" cellpadding="2" style="border-bottom: solid 0px #999999;  " >
  <tr>
    <td width="45" ><div class="checkinstep" id="checkstep_1"><center><b>1</b>
    </center></div>
	<div  style="position:absolute; margin-top:-30px; margin-left: -10px;"><img src="images/no.png"  align="absmiddle"  id="iconchk_s1"   /></div>
	
	</td>
    <td width="150" valign="middle">
<? 
if($arr[project][driver_topoint] == 1){ $text_status = "check";$btn_status = "success  btn-block btn-md btnstatus approve"; ?>
		<script>
$('#iconchk_s1').attr("src", "images/yes.png");
$('#checkstep_1').addClass("checkinstep_active");
		 		</script>
				<script type="text/javascript">
  $(document).ready(function(){
	var url_map<?=$arr[project][id];?> = "popup.php?name=map&file=view&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_topoint&data_val=<?=$arr[project][driver_topoint];?>";
$('#mapto_<?=$arr[project][id];?>').load(url_map<?=$arr[project][id];?>);
  });
  
</script> 
<?
}
else{$text_status = "times";$btn_status = "warning  btn-block btn-md btnstatus reject"; ?>
<script>
$('#tab_to_<?=$arr[project][id];?>').addClass("tab_alert");
</script>
<?
} 
?>
      <button style="background-color: #367FA9;width: 125px; height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_topoint" id="btn_topoint<?=$arr[project][id];?>" <? if($arr[project][driver_topoint] > 0){ ?> disabled="disabled"  <? } ?> > ถึงสถานที่รับ </button>      </td>
  <td>
 
  <div id="mapto_<?=$arr[project][id];?>" > </div>
  
  
  
  </td>
  </tr>
</table>
</div>




</td>
		
	</tr>
	<tr>
	  <td colspan="2" valign="top" id="sub_see_guest<?=$arr[project][id];?>" style="display: none<? if($arr[project][driver_topoint] > 0){ echo "1"; } ?>">
	   
	  <div id="tab_pickup_<?=$arr[project][id];?>" style="margin-bottom:5px; padding:5px; border-bottom:  solid 2px #CDCDCD ; ">
	  
	  <? if($arr[project][driver_pickup] == 0 and $arr[project][driver_topoint] ==1){ ?> 
	  <script>
	  $('#tab_pickup_<?=$arr[project][id];?>').addClass("tab_alert");
	  </script>
	     <? } ?>
	  
	  
<table width="100%"  border="0" cellspacing="2" cellpadding="2" style="border-bottom: solid  0px #999999; margin-bottom:0px; ">
  <tr>
    <td width="45" ><div class="checkinstep" id="checkstep_2">
        <center>
          <b>2</b>
        </center>
    </div>
	<div  style="position:absolute; margin-top:-30px; margin-left: -10px;"><img src="images/no.png"  align="absmiddle" id="iconchk_s2"    /></div>
	
	
	</td>
    <td width="150" valign="middle"> 
        <?
if($arr[project][driver_topoint] > 0){
	if($arr[project][driver_pickup] > 0){
?>		<script>
$('#iconchk_s2').attr("src", "images/yes.png");
$('#checkstep_2').addClass("checkinstep_active");
 $('#tab_pickup_<?=$arr[project][id];?>').removeClass("tab_alert");
 
		 		</script>
        <table  cellpadding="0" cellspacing="0">
				<tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: none<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
					<td><button style="background-color: #367FA9;width: 125px;height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1" <? if($arr[project][driver_pickup] == 1){ ?> disabled="disabled"  <? } ?> > เช็คชื่อแขก</button></td>
				</tr>
				
				
				<tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
				<tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: none<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
					<td><button style="background-color: #ff2b2b;width: 125px;height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2" <? if($arr[project][driver_pickup] == 2){ ?> disabled="disabled"  <? } ?> > ไม่เจอแขก</button></td>
				</tr>
			</table>
<?		
	}else{
?>
<table  cellpadding="0" cellspacing="0">
				<tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
					<td><button style="background-color: #367FA9;width: 125px;height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1"  > เช็คชื่อแขก</button></td>
				</tr>
				<tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
				<tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
					<td><button style="background-color: #ff2b2b;width: 125px;height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" data_vc="<?=$arr[project][invoice];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2"  > ไม่เจอแขก</button></td>
				</tr>
			</table>
<?		
	}
?>

<? }
else{ ?>
<table  cellpadding="0" cellspacing="0">
				<tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
					<td><button style="background-color: #367FA9;height:30px; border:none;width: 125px;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1" <? if($arr[project][driver_pickup] == 1){ ?> disabled="disabled"  <? } ?> > เช็คชื่อแขก</button></td>
				</tr>
				<tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
				<tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
					<td><button style="background-color: #ff2b2b;width: 125px;height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>"  data_vc="<?=$arr[project][invoice];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2" <? if($arr[project][driver_pickup] == 2){ ?> disabled="disabled"  <? } ?> > ไม่เจอแขก</button></td>
				</tr>
			</table>
<? } ?>
<div  id="no_guest<?=$arr[project][id];?>"  style="width: 125px; display:none<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>"> <button type="button" class="btn btn-default" data-dismiss="modal">สาเหตุไม่พบแขก</button></div>


</td>
    <td> <div id="mappickup_<?=$arr[project][id];?>"></div>
    <? if($arr[project][driver_pickup] != 0 && $arr[project][driver_pickup] != ''){ ?>
      <? if($arr[project][driver_pickup] == 2){ $txt_pick_g = "ไม่เจอแขก"; }else{ $txt_pick_g = "เช็คชื่อแขก";   }?>
	 	   
	  
	  
	   
	  
	  <script type="text/javascript">
 $('#iconchk_s2').attr("src", "images/yes.png");
$('#checkstep_2').addClass("checkinstep_active");
 $('#tab_pickup_<?=$arr[project][id];?>').removeClass("tab_alert");
 
 $(document).ready(function(){
	var url_map<?=$arr[project][id];?> = "popup.php?name=map&file=view&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_pickup&data_val=<?=$arr[project][driver_topoint];?>";
$('#mappickup_<?=$arr[project][id];?>').load(url_map<?=$arr[project][id];?>);
  });
</script> 
  
        
      <?	
		}
		?></td>
  </tr>
</table>
</div>
</td>
	  </tr>
	<tr id="sub_complete<?=$arr[project][id];?>"  style="display: none<? if($arr[project][driver_pickup] > 0 ){ ?> 1  <? } ?>">
	
	
	  
		<td colspan="2">
		
		  <div id="tab_complete_<?=$arr[project][id];?>" style="margin-bottom:5px; padding:5px; border-bottom:  solid 2px #CDCDCD ; ">
		
		<table width="100%"  border="0" cellspacing="2" cellpadding="2" style="border-bottom: solid 0px #999999; margin-bottom:0px; ">
		
            <tr>
              <td width="45" ><div class="checkinstep" id="checkstep_3">
                  <center>
                    <b>3</b>
                  </center>
              </div>
			  
			  <div  style="position:absolute; margin-top:-30px; margin-left: -10px;"><img src="images/no.png"  align="absmiddle" id="iconchk_s3"></div>
			  
			  </td>
              <td width="150" valign="middle"> 
                 <button style="background-color: #367FA9;width: 125px;height:30px; border:none;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_complete" id="btn_complete<?=$arr[project][id];?>" <? if($arr[project][driver_complete] > 0){ ?> disabled="disabled"  <? } ?> > <span></span> ถึงสถานที่ส่ง</button></td>
              <td> 
 
  <div id="mapcomplete_<?=$arr[project][id];?>"></div>
  
  <? if($arr[project][driver_complete] != 0 && $arr[project][driver_complete] != ''){ ?>
 
				 <script>
$('#iconchk_s3').attr("src", "images/yes.png");
$('#checkstep_3').addClass("checkinstep_active");
 $('#tab_complete_<?=$arr[project][id];?>').removeClass("tab_alert");
		 		</script>
  <script type="text/javascript">
 $(document).ready(function(){
	var url_map<?=$arr[project][id];?> = "popup.php?name=map&file=view&sv=<?=$_GET[sv];?>&bookid=<?=$arr[project][id];?>&type=driver_complete&data_val=<?=$arr[project][driver_complete];?>";
$('#mapcomplete_<?=$arr[project][id];?>').load(url_map<?=$arr[project][id];?>);
  });
</script> 
		<? } ?>
</td>
	</tr>
</table>




</div>


  
                           </td>
                        </tr>
                     </tbody>
    </table>
         </div>         
 <div id="show_data_res<?=$arr[project][id];?>"> </div>
 <?php
@mkdir("pic/guest_no/".$arr[project][invoice]."", 0777);
?>
<?
$i++;	
}
?>
<div id="test_time"></div> 
            </ul>




   </div>

 </div>

 
  
<div id="dialog_remark_noguest" title="สาเหตุที่ไม่เจอแขก" style="display:none;   width:400px">

		   <form id="frmUpload" action="popup.php?name=action&file=upload_pic" method="post" enctype="multipart/form-data"   target="uploadtarget">
<table border="0" >
	<tr>
		<td><div class="topictransfer">สาเหตุ</div> 
		  <select name="driver_remark_noguest" id="driver_remark_noguest"  class="form-control" >
	  <option value="0">---- กรุณาเลือกสาเหตุที่ไม่เจอแขก ----</option>
  <?
$res[remark_noguest] = $db->select_query("SELECT * FROM web_driver_remark WHERE status='1' and type = '2' ");
while($arr[remark_noguest] = $db->fetch($res[remark_noguest])){
?>	
	  <option value="<?=$arr[remark_noguest][id];?>"><?=$arr[remark_noguest][topic_th];?></option>
  <? } ?>	
            </select>		</td>
	</tr>
	<tr>
		<td><div class="topictransfer">ระบุสาเหตุอื่น ๆ </div>
		
		

		
		
		
		<input class="form-control"  type="text"  name="driver_remark_noguest_other" id="driver_remark_noguest_other"/></td>
	</tr>
	<tr>
		<td><div class="topictransfer">รูปภาพประกอบ (ถ้ามี)</div> 
	    <div style="padding-bottom:5px; "><input type="file" class="form-control" name="driver_remark_noguest_file_1" id="driver_remark_noguest_file_1" /></div>
		<div style="padding-bottom:5px; "><input type="file" class="form-control" name="driver_remark_noguest_file_2" id="driver_remark_noguest_file_2" /></div>
		<div style="padding-bottom:5px; "><input type="file" class="form-control" name="driver_remark_noguest_file_3" id="driver_remark_noguest_file_3" /></div>
		<div style="padding-bottom:5px; "><input type="file" class="form-control" name="driver_remark_noguest_file_4" id="driver_remark_noguest_file_4" /></div>
		<div style="padding-bottom:5px; "><input type="file" class="form-control" name="driver_remark_noguest_file_5" id="driver_remark_noguest_file_5" /></div>
		<div style=" display:none "><input id="btn_upload" type="submit"  class="btn btn-primary"   data-backdrop="false" value="อัพโหลด">
		<input  name="vc"  type="text" class="form-control" id="vc" value="0"/></div></td>
	</tr>
</table>
</form>
</div> 

<div id="dialog_remark_topoint" title="สาเหตุที่ถึงสถานที่รับแขกสาย" style="display:none;padding:30px 10px;">
<table>
	<tr>
		<td width="100">สาเหตุ :</td>
		<td>
			<select name="driver_remark_topoint" id="driver_remark_topoint" style="width: 200px;">
	<option value="0">---- สาเหตุที่ถึงสถานที่รับสาย ----</option>
<?
$res[remark_noguest] = $db->select_query("SELECT *  FROM web_driver_remark WHERE status='1' and type = '1' ");
while($arr[remark_noguest] = $db->fetch($res[remark_noguest])){
?>	
	<option value="<?=$arr[remark_noguest][id];?>"><?=$arr[remark_noguest][topic_th];?></option>
<? } ?>	
</select>
		</td>
	</tr>
	<tr>
		<td>อื่น ๆ :</td>
		<td> <input type="text" style="width: 200px;" name="driver_remark_topoint_other" id="driver_remark_topoint_other"/></td>
	</tr>
	<tr>
		<td>รูปภาพ (ถ้ามี) :</td>
		<td> <input type="file" style="width: 200px;" name="driver_remark_topoint_file" id="driver_remark_topoint_file"/></td>
	</tr>
</table>

</div> 



<div id="dialog_map" title="สาเหตุที่ถึงสถานที่รับสาย" style="display:none;padding:30px 10px;">
<table align="center">
	<tr>
 
		<td>
<div id="show_data_map"></div>			 
		</td>
	</tr>
 
</table>

</div>




 <script>
  // Approve - Reject image
 
$(document).ready(function(){



  $(".btnstatus").click(function(){


   var col_name = $(this).attr('col_name');
   var data_id = $(this).attr("data_id");
   var data_val = $(this).attr("data_val");
     var data_vc = $(this).attr("data_vc");
   var data_sv = '<?=$_GET[sv];?>';
   
    document.getElementById('vc').value=$(this).attr("data_vc");
   
   


//alert(data_id);
if(col_name == 'driver_topoint'){
 	var currentdate = new Date(); 
    var datetime = "" 
    	+ currentdate.getFullYear() + "-" 
        + (currentdate.getMonth()+1)  + "-" 
        + currentdate.getDate() + "<br /> " 
        + currentdate.getHours() + ":"  
        + currentdate.getMinutes() + ":" 
        + currentdate.getSeconds();

var currenttime = <?=time();?>; 
var bookimgtime = parseInt(<?=$time_booking;?>); 
 	currenttime = currenttime / 1000;
//alert(bookimgtime +' - '+currenttime);

//$('#test_time').html(bookimgtime +' - '+currenttime);			
	if(bookimgtime < currenttime){
		$("#dialog_remark_topoint").dialog({ resizable: false, modal: true, width: '90%', 
	minHeight: 200,
	     buttons: {
			"บันทึก": function () {
				
				
				if($('#driver_remark_topoint').val() == 0){
					alert('กรุณาเลือกสาเหตุที่ไม่เจอแขก');
					$('#driver_remark_topoint').focus();
					return false;
				}
				driver_remark = $('#driver_remark_topoint').val();
				if(confirm("คุณแน่ใจหรือไม่ว่ามาถึงสถานที่รับแขกแล้ว") == true){
				$('#date_topiont'+data_id).html(datetime);
				$.post("popup.php?name=action&file=action", { col_name : col_name ,data_id: data_id ,data_val : data_val,driver_remark : driver_remark ,data_sv: data_sv   }, function(theResponse){ 
				var msg = theResponse;	$('#show_data_res'+data_id).html(msg);
					});
				$('#sub_complete'+data_id).show();
				$('#btn_pickup'+data_id+data_val).attr('disabled', true);
				$('#cc_tr_pickup'+data_id).hide(); 
				$('#tr_btn_pickup'+data_val).show();
				$('#tr_btn_pickup1').hide();
				
				$(this).dialog("close");
				}
			}
		}
	});
	}else{
 
	 swal({
	 
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: 'ว่ามาถึงสถานที่รับแขกแล้ว',
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#F0AA42',
		confirmButtonText: 'แน่ใจ',
		cancelButtonText: "ไม่แน่ใจ",
		// timer: 2000,
		//closeOnConfirm: true,
		closeOnCancel: true,
		
		  showCancelButton: true,   
		  closeOnConfirm: false,   
		  showLoaderOnConfirm: true,
		
		html: true
	},
	function(isConfirms){
	//////// ยืนยัน 
    if (isConfirms){
	
	
		type: "success",
		////// ตรวจสอบข้อมูลสถานที่
		swal( { 
		 		showCancelButton: true,
		confirmButtonColor: '#FF0000',
		confirmButtonText: 'ถูกต้อง',
		cancelButtonText: "ไม่ถูกต้อง",
	title: "ตรวจสอบเวลาและสถานที่", 
  text: "เวลา <?php echo date('H:i:s'); ?><iframe src='popup.php?name=action&file=check_location&col_name=<?=$_POST[col_name];?>&data_id=<?=$_POST[data_id];?>&data_sv=<?=$_POST[data_sv];?>'  ></iframe>",  
   html: true, }, 
   function(){   setTimeout(function(){ 
   
     ///  swal("Ajax request finished!");  
	 
	   ////// สั่ง action ทำงาน
 ///swal("ระบบบันทึกตำแหน่งของคุณสำเร็จ", "success"); 
  $('#sub_see_guest'+data_id).fadeIn( "slow" );  
		$('#btn_topoint'+data_id).attr('disabled', true);
		$('#btn_topoint'+data_id).css("height", "30px"); 

   	$('#date_topiont'+data_id).html(datetime);
 $.post("popup.php?name=action&file=action", { col_name : col_name ,data_id: data_id ,data_sv: data_sv    }, function(theResponse){ var msg = theResponse;	
  $('#show_data_res'+data_id).html(msg);	});	
  
  ////// ปิด action
	   
	   
	   
	    }, 1000); });
////// ปิด swal map


 
/////////////////// ปิดคำสั่ง 1 
    } 
	///// ยกเลิก 1
	
	else {
	
	 //   $('body').css({overflow:'auto'});
      swal("Amend", "Your imaginary file is safe :)", "error");
	
	 
     }
	});
 	    
	
	
	<!------ ถ้าว่า
	
	 /*
	if(confirm("คุณแน่ใจหรือไม่ว่ามาถึงสถานที่รับแขกแล้วหห ?") == true){
	
	
	
	
	
		
	}
	*/
	}
	
	
}
 

if(col_name == 'driver_pickup'){
 
 
 
var currentdate = new Date(); 
    var datetime = "" 
    	+ currentdate.getFullYear() + "-" 
        + (currentdate.getMonth()+1)  + "-" 
        + currentdate.getDate() + " <br />" 
        + currentdate.getHours() + ":"  
        + currentdate.getMinutes() + ":" 
        + currentdate.getSeconds();
if(data_val == 1){
	
	$("#dialog_guest"+data_id).dialog({ resizable: false, modal: true, 
    width: 'auto', // overcomes width:'auto' and maxWidth bug
    maxWidth: 600,
    height: 'auto',
    modal: true,
    fluid: true, //new option
    resizable: true,
	
	
 
	     buttons: {
			
			
			
			"ข้อมูลถูกต้อง": function () {
			 
			 $('#dialog_guest'+data_id).dialog("close");
			 
			//$('#dialog_guest'+data_id).fadeOut( "slow" );
			//swal.close();
			$(document).ready(function(){
$('body').css({overflow:'auto'});
});

			 swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "ว่าเช็คชื่อแขกถูกต้องแล้ว",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#F0AA42',
		confirmButtonText: 'แน่ใจ',
		cancelButtonText: "ไม่แน่ใจ",
		// timer: 2000,
		closeOnConfirm: false,
		closeOnCancel: true,
		html: true
	},
	
	function(isConfirms){
	//////// ยืนยัน 
    if (isConfirms){
		type: "success",
		////// ตรวจสอบข้อมูลสถานที่
		swal( { 
		 		showCancelButton: true,
		confirmButtonColor: '#FF0000',
		confirmButtonText: 'ถูกต้อง',
		cancelButtonText: "ไม่ถูกต้อง",
	title: "ตรวจสอบเวลาและสถานที่", 
  text: "เวลา <?php echo date('H:i:s'); ?><iframe src='popup.php?name=action&file=check_location&col_name=<?=$_POST[col_name];?>&data_id=<?=$_POST[data_id];?>&data_sv=<?=$_POST[data_sv];?>'  ></iframe>",  
   html: true, }, 
   function(){   setTimeout(function(){ 
   
     ///  swal("Ajax request finished!");  
	 
	   ////// สั่ง action ทำงาน
$('#tr_btn_pickup'+data_val).show();
	$('#tr_btn_pickup2').hide();
	$('#date_pickup'+data_id).html(datetime);
	$.post("popup.php?name=action&file=action", { col_name : col_name ,data_id: data_id ,data_val : data_val,data_sv: data_sv   }, function(theResponse){
	
		var msg = theResponse;
  		$('#show_data_res'+data_id).html(msg);
	
	});	
	
	$('#sub_complete'+data_id).show();
	$('#btn_pickup'+data_id+data_val).attr('disabled', true);
	$('#cc_tr_pickup'+data_id).hide(); 
	$('#tr_btn_pickup2'+data_id).hide(); 
	
	$('#btn_pickup'+data_id+data_val).css("height", "30px");
  
  ////// ปิด action
	   
	   
	   
	    }, 1000); });
////// ปิด swal map


 
/////////////////// ปิดคำสั่ง 1 
    } 
	///// ยกเลิก 1
	
	else {
	
	 //   $('body').css({overflow:'auto'});
      swal("Amend", "Your imaginary file is safe :)", "error");
	
	 
     }
 
	 
	});
	
	///
				
					//if(confirm("คุณแน่ใจหรือไม่ว่า เช็คชื่อแขก   ?") == true){
	//

			},
			
			"ข้อมูลไม่ถูกต้อง": function () {
			
				$(this).dialog("close");
				
			}
		},
			create:function () {
        	$(this).closest(".ui-dialog").find('button:contains("ข้อมูลถูกต้อง")').addClass("custom");
        	$(this).closest(".ui-dialog").find('button:contains("ข้อมูลไม่ถูกต้อง")').addClass("closed");
    		}
	});
	

}
else{
	
	
	 $("#dialog_remark_noguest").dialog({ resizable: true, modal: true,  width: '350px', 
	minHeight: 200,
	        effect: 'fade',
        duration: 200, //at your convenience
	
	
	     buttons: {
			"บันทึก": function () {
				
 

				driver_remark = $('#driver_remark_noguest').val();
 ///// หาแขกไม่เจอ
 
 
				 swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "ว่าหาแขกไม่พบ",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#FF2B2B',
		confirmButtonText: 'แน่ใจ',
		cancelButtonText: "ไม่แน่ใจ",
		// timer: 2000,
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	

	
					if($('#driver_remark_noguest').val() == 0){
					alert('กรุณาเลือกสาเหตุที่ไม่เจอแขก');
					$('#driver_remark_noguest').focus();
					return false;
				}
	$( "#btn_upload" ).click();

		type: "success",
      swal("ระบบบันทึกข้อมูลของคุณสำเร็จ", "success");




 var data_vc =  document.getElementById('vc').value;
var driver_remark = $('#driver_remark_noguest').val();
var driver_remark_detail = $('#driver_remark_noguest_other').val();
	 
	//alert(driver_remark_detail);  
	  /////
	  /*
	   $.post('popup.php?name=action&file=action&id=<?=$arr[web_user][id]?>',
	   
	   $('#no_guest_form').serialize(),function(response){
   $('#send_data').html(response);
  });
  */
	 //// 
	  

	  $('#date_pickup'+data_id).html(datetime);
				$.post("popup.php?name=action&file=action", { col_name : col_name ,data_id: data_id ,data_vc: data_vc ,data_val : data_val ,data_vc : data_vc ,driver_remark : driver_remark ,data_sv: data_sv ,driver_remark : driver_remark ,driver_remark_detail : driver_remark_detail   }, function(theResponse){ 
				var msg = theResponse;	$('#show_data_res'+data_id).html(msg);
					});
				$('#sub_complete'+data_id).fadeIn( "slow" );
				$('#btn_pickup'+data_id+data_val).attr('disabled', true);
				$('#cc_tr_pickup'+data_id).hide(); 
				$('#tr_btn_pickup'+data_val).show();
				$('#tr_btn_pickup1').hide();
				$('#no_guest'+data_id).show();
 
				
				
				
				$("#dialog_remark_noguest").dialog("close");
				
 
    } else {
	
 
      swal("Amend", "Your imaginary file is safe :)", "error");
	
	 
     }
	});
 
///
 
				
				}////
		}
	});
	
} 
 	
   	
  	

}
if(col_name == 'driver_complete'){
/////
 


///
swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "ว่างานของคุณสำเร็จแล้ว",
		type: "warning",
		 height: '100%',
		showCancelButton: true,
		confirmButtonColor: '#367FA9',
		confirmButtonText: 'แน่ใจ',
		cancelButtonText: "ไม่แน่ใจ",
		// timer: 2000,
		closeOnConfirm: false,
		closeOnCancel: true,
		html: true
	},
	/////////////
	function(isConfirm3){
	//////// ยืนยัน 
    if (isConfirm3){
		type: "success",
		////// ตรวจสอบข้อมูลสถานที่
		swal( { 
		 		showCancelButton: true,
		confirmButtonColor: '#FF0000',
		confirmButtonText: 'ถูกต้อง',
		cancelButtonText: "ไม่ถูกต้อง",
	title: "ตรวจสอบเวลาและสถานที่", 
  text: "เวลา <?php echo date('H:i:s'); ?><iframe src='popup.php?name=action&file=check_location&col_name=<?=$_POST[col_name];?>&data_id=<?=$_POST[data_id];?>&data_sv=<?=$_POST[data_sv];?>'  ></iframe>",  
   html: true, }, 
   function(){   setTimeout(function(){ 
   
     ///  swal("Ajax request finished!");  
	 
	   ////// สั่ง action ทำงาน
   $('#iconchk_s3').attr("src", "images/yes.png");
  $('#checkstep_3').addClass("checkinstep_active");
 /////
 $('#btn_complete'+data_id).attr('disabled', true);
 
 	var currentdate = new Date(); 
    var datetime = "" 
    	+ currentdate.getFullYear() + "-" 
        + (currentdate.getMonth()+1)  + "-" 
        + currentdate.getDate() + "" 
        + currentdate.getHours() + ":"  
        + currentdate.getMinutes() + ":" 
        + currentdate.getSeconds();
   	$('#date_complete'+data_id).html(datetime);
 $.post("popup.php?name=action&file=action", { col_name : col_name ,data_id: data_id ,data_sv: data_sv    }, function(theResponse){ 
 var msg = theResponse;	$('#show_data_res'+data_id).html(msg);  });		
  ////// ปิด action
	   
	   
	   
	    }, 1000); });
////// ปิด swal map


 
/////////////////// ปิดคำสั่ง 1 
    } 
	///// ยกเลิก 1
	
	else {
	
	 //   $('body').css({overflow:'auto'});
      swal("Amend", "Your imaginary file is safe :)", "error");
	 
     }
	 
	 
	 ////////////////////
	 
	 
	 
	 
	});
 

	 
	
}
/* 
   var app_rej = '0';
   if($(this).hasClass('approve')){
      $(this).addClass('reject btn-warning');
      $(this).removeClass('approve btn-success');
      $(this).html('<i class="fa fa-times"></i>');
      app_rej = '0';
  }else if($(this).hasClass('reject')){
      $(this).removeClass('reject btn-warning');
      $(this).addClass('approve btn-success');
      $(this).html('<i class="fa fa-check"></i>');
      app_rej = '1';
  }
  if( col_name == 'in_transfer' ){
  	if(app_rej == '1'){
		$('.sub_in_transfer_'+pro_id).show();
	}else{
		$('.sub_in_transfer_'+pro_id).hide();
	}
  } 
//*
 $.post("index.php?name=admin/product/option", { col_name: col_name ,pro_id : pro_id , app_rej : app_rej  }, function(theResponse){ 	});
//   */ 
  });


  $(".btn_map").click(function(){


   var col_name = $(this).attr('col_name');
   var data_id = $(this).attr("data_id");
   var data_val = $(this).attr("data_val");
   var data_lat = $(this).attr("data_lat");
   var data_lng = $(this).attr("data_lng");
   var data_title = $(this).attr("data_title");
 
 
 $.post("popup.php?name=view&file=map", { col_name : col_name ,data_id: data_id ,data_val: data_val,data_lat: data_lat,data_lng: data_lng    }, function(theResponse){ 
 var msg = theResponse;	
 $('#show_data_map').html(msg);	
  
$("#dialog_map").dialog({ 
title: data_title, 
resizable: false, 
modal: true, width: '90%', 
	minHeight: 200,
	     buttons: {
			"ปิด": function () {
				
				$(this).dialog("close");
				}
		}
	});	
	
	
	});
 });	
 
 


 });
</script>
<?  ///include "share.php"; ?>
<div id="load_googlemap"></div>     
<style>
 iframe {
  
    border: none;
    top: 0; right: 0;
    bottom: 0; left: 0;
    width: 90%;
    height: 50%;
}
 
 </style>



 <!------ class="modal fade"----> 
	 <div  id="car_phone"  role="dialog" class="modal fade">
    <div class="modal-dialog modal-sm">
      <div class="modal-content"   >
        <div class="modal-header" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title font_20"><b><center><img src="images/icon/b_phone.png"  align="absmiddle" /> </center></b></h4>
        </div>
        <div class="modal-body"  >
		      		  
          <!-- Notifications: style can be found in dropdown.less -->
 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
 
   <!-- Notifications: style can be found in dropdown.less -->
		  <? if($arr[driver_network][company]==1){ ?>
 
           <ul class="dropdown-menu" role="menu" style="right:0;display: block; margin-top:-30px;    ;"  >
		   
		   
		   		    <div style="padding:5px; font-size:18px; padding-left:20px; "><b>ผู้จัดการ</b></div>
		    <li><a href="tel:0892081958">  <i class="fa fa-phone text-yellow"></i><font color="#000000"> 0892081958 (ลภ)</font></a></li>
        
					 		    <div style="padding:5px; font-size:18px; padding-left:20px; "><b>พนักงานจัดรถ</b></div>
		    <li><a href="tel:0862788899"><i class="fa fa-phone text-yellow"></i><font color="#000000"> 0862788899 (อาร์ม)</font></a></li>
			    <li><a href="tel:0920688420"><i class="fa fa-phone text-yellow"></i><font color="#000000"> 0920688420 (มัต)</font></a></li>
				
							 <div style="padding:5px; font-size:18px; padding-left:20px; "><b>พนักงานต้อนรับสนามบิน</b></div>
  			<li><a href="tel:0986711687"><i class="fa fa-phone text-yellow"></i><font color="#000000"> 0986711687 (กลางวัน)</font></a></li>
			<li><a href="tel:0630781689"><i class="fa fa-phone text-yellow"></i><font color="#000000"> 0630781689 (กลางคืน)</font></a></li>
			
			
			 <div style="padding:5px; font-size:18px; padding-left:20px; "><b>ฝ่ายซ่อมบำรุง</b></div>
		    <li> <a href="tel:0818911573"><i class="fa fa-phone text-yellow"></i><font color="#000000"> 0818911573 (ป๋าเทพ)</font></a></li>
			 <li> <a href="tel:0862818998"><i class="fa fa-phone text-yellow"></i><font color="#000000"> 0862818998 (โกอี่)</font></a></li>
			  <!---->
			  
			  
			         </ul>
  
 
		  
		  
		  <? } ?></td>
  </tr>
</table>

		
		 
		  
		   <!------ data---->  
        </div>
 
      </div>
    </div>
  </div>
</div>

 <!------ end---->  

    <style>
  /* Tooltip */
  .test + .tooltip > .tooltip-inner {
      background-color: #006699; text-align:left;
      color: #FFFFFF; 
      border: 0px solid #FF3300; 
 
      font-size: 13px;
  }
  /* Tooltip on top */
  .test + .tooltip.top > .tooltip-arrow {
      border-top: 5px solid #FF3300;
  }
  /* Tooltip on bottom */
  .test + .tooltip.bottom > .tooltip-arrow {
      border-bottom: 5px solid blue;
  }
  /* Tooltip on left */
  .test + .tooltip.left > .tooltip-arrow {
      border-left: 5px solid red;
  }
  /* Tooltip on right */
  .test + .tooltip.right > .tooltip-arrow {
      border-right: 5px solid black;
  }
  .test { width:500px: }
  </style>
<iframe id="uploadtarget" name="uploadtarget" src="" style="width:1px;height:1px;border:0"></iframe>

 
	<div class="row">
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>Step 1</h3>
                        <p>This is step 1</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Step 2</h3>
                        <p>This is step 2</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Step 3</h3>
                        <p>This is step 3</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>You have successfully completed all steps.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
 
<style>
.wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}

@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}

</style>
 <script>
 function geoloc(success, fail){
    var is_echo = false;
    if(navigator && navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
	    alert(99);
        function(pos) {
          if (is_echo){ 
          is_echo = true;
		
          success(pos.coords.latitude,pos.coords.longitude);
		   }
        }, 
        function() {
		alert(0);
          if (is_echo){ return; }
          is_echo = true;
          fail();
        }
      );
    } else {
      fail();
    }
  }

  function success(lat, lng){
    alert(lat + " , " + lng);
  }
  function fail(){
    alert("failed");
  }

  geoloc(success, fail);
 </script>