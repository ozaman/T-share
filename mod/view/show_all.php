<?
session_start();
include "config_fir.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" class="ui-mobile landscape min-width-320px min-width-480px min-width-768px min-width-1024px">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>T-Booking</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon" href="https://topup2rich.com/images/iteRestaurant.png">

<link href="scripts/style(1).css" rel="stylesheet" type="text/css">
<link href="scripts/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="scripts/jQuery.js"></script>
        <script type="text/javascript" src="scripts/jMobile.js"></script>
        <script type="text/javascript" src="scripts/iteMain.js"></script><style type="text/css"></style>
        <script type="text/javascript" src="scripts/jQueryMask.js"></script>



        <style type="text/css">

          h1 {font-size:19px !important;font-weight:bold;margin:6px 0px !important;padding:6px 0px !imporant; line-height:30px;}
        </style>
        
           <style type="text/css">
                * {
                    /*font-size:18px;*/
                    font-size:15px;
                }
               
           </style>
        

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

</head>
<body class="ui-mobile-viewport" data-pinterest-extension-installed="cr1.39.1">

<link rel="stylesheet" type="text/css" href="scripts/jqueryui.css">
<script src="scripts/jqueryUI.js" type="text/javascript"></script>
 
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
      </style>

 
<div data-role="page"  >
    <div data-role="header" data-position="fixed" data-id="headerMain" data-theme="b" class="ui-bar-b ui-header ui-header-fixed fade ui-fixed-overlay" role="banner" style="top: 0px;" align="center">
      
<h1>รายละเอียด</h1>
<a href="#" data-rel="back" data-iconpos="notext" title="Back" data-icon="arrow-l" class="ui-btn-left ui-btn ui-btn-up-b ui-btn-icon-notext ui-btn-corner-all ui-shadow" data-theme="b">
<span class="ui-btn-inner ui-btn-corner-all">
<span class="ui-btn-text">Back</span>
<span class="ui-icon ui-icon-arrow-l ui-icon-shadow"></span>
</span>
</a>

<a href="index.php" data-icon="home" data-iconpos="notext" title="Menu" rel="external" onclick="return ocmenu(this);" class="ui-btn-right ui-btn ui-btn-up-b ui-btn-icon-notext ui-btn-corner-all ui-shadow" data-theme="b"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Menu</span><span class="ui-icon ui-icon-home ui-icon-shadow"></span></span></a>      
      
    </div> 
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


if($_GET[sv] == 'CN'){
	$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$link_vc = "http://www.t-bookingcn.com/";
}else{
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$link_vc = "http://www.t-booking.com/";
}

$res[web_user] = $db->select_query("SELECT * FROM web_driver WHERE username='".$_SESSION['data_user_name']."'    "); 
$arr[web_user] = $db->fetch($res[web_user]);

$user_id =  $_SESSION['data_user_id'];
$res[project] = $db->select_query("SELECT * FROM ".TB_order."  where drivername='".$user_id."' and transfer_date='".$_GET[day]."' and carno = '".$_GET[carno]."' order by airin_h ASC,airin_time ASC  ");


 
?>

    <div data-role="content" class="ui-content" role="main">
        <ul id="ulLevel" class="iteList ulLevel" onclick="ulLevelClick(this,event);">
 <?
$i=1;
while($arr[project] = $db->fetch($res[project])){
$datetime = $arr[project][outdate]." ".$arr[project][airout_time].":00";
$exp = explode(" ",$datetime);
$t = explode(":",$exp[1]);
$d = explode("-",$exp[0]);
$time_booking = @mktime($t[0], $t[1], $t[2], $d[1], $d[2], $d[0]);	


	$res[product] = $db->select_query("SELECT cartype,area FROM web_transferproduct WHERE id='".$arr[project][program]."' ");
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
<li class="dx" mlevel="<?=$i;?>" <? if($arr[project][driver_complete] == 1){ ?> style="background-color : #b3f2d9;"  <? } ?>>
 
                  <table>
                     <tbody>
                        <tr>
                           <td  >
						   <span class="circleC"> <?=$_GET[car_list];?> / <?=$i;?> </span>  
						   <span class="circleC" style="display:none"> <? if($arr[product][cartype] == 2){ echo "จอย";}else{echo "ไพรเวท";} ?> </span>
						   <span class="circleC"> 
						   <? if($arr[product][area] == 'In'){ ?> 
						   รับเข้า
						   <img src="../iconstatus/car/in.png" height="30" align="absmiddle"    style="display:none" />
						   <? }elseif($arr[product][area] == 'Out'){ ?>
						   ส่งออก
						   <img src="../iconstatus/car/out.png" height="30" align="absmiddle"   style="display:none" /> 
						   <? }elseif($arr[product][area] == 'Point'){ ?>  
						   <img src="../iconstatus/car/to.png" height="30" align="absmiddle"   style="display:none"  />
						   พ้อยทูพ้อย
						   <? }else{ ?> 
						   <img src="../iconstatus/car/truck.png" height="30" align="absmiddle" style="display:none"  />
						   เซอร์วิซ
						   <? } ?>
						   </span>
						   <? if($arr[project][driver_complete] > 0){   ?><span class="circleC"> งานเสร็จ </span> <? } ?>
						   
						   </td>
						</tr>
						<tr>
                           <td  >
 
                              <table class="tbx">
                                 <tbody>
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
									  <td class="gay5">เอเย่น</td>
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
                                 </tbody>
                              </table>
<!--  Start Guest -->								  
<div id="dialog_guest<?=$arr[project][id];?>" title="เช็คชื่อแขก" style="display:none;padding:30px 10px;">
 <table class="tbx">
                                 <tbody>
									<tr>
                                       <td colspan="2"><div  align="left">
									   <? if($chk_logo==1){ ?>
									   <img src="../admin/file/logo/crop/<?=$arr[project][agent];?>.jpg" name="view01" height="80" border="0"       />
									   <br />
									   <? } ?>
									   </div></td>
                                    </tr>
									<tr>
                                       <td class="gay5">เอเย่น</td>
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
                                       <td><div  align="left"><?echo $arr[project][invoice];?></div></td>
                                    </tr>
									<tr>
                                       <td class="red5">หมายเหตุ</td>
                                       <td ><div  align="left"><?echo $arr[project][remark];?></div></td>
                                    </tr> 
                                 </tbody>
                  </table>
</div>	
<!--  End Guest -->						  
<hr style="border: dotted 1px #cdcbcd" />
<table cellpadding="3">
	<tr>
		<td width="140" valign="top">
 
<? 
if($arr[project][driver_topoint] == 1){ $text_status = "check";$btn_status = "success  btn-block btn-md btnstatus approve";}
else{$text_status = "times";$btn_status = "warning  btn-block btn-md btnstatus reject";} 
?>
<button style="background-color: #f0aa42;width: 125px;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_topoint" id="btn_topoint<?=$arr[project][id];?>" <? if($arr[project][driver_topoint] > 0){ ?> disabled="disabled"  <? } ?> >
<i class="fa fa-<?=$text_status;?>"></i> ถึงสถานที่รับ
</button>
<? if($arr[project][driver_topoint] != 0 && $arr[project][driver_topoint] != ''){ ?>
<a  class="btn_map" data_id="<?=$arr[project][id];?>" col_name="driver_topoint" data_lat="<?=$arr[project][driver_topoint_lat];?>" data_lng="<?=$arr[project][driver_topoint_lng];?>" data_val="<?=$arr[project][driver_topoint];?>" data_title="ถึงสถานที่รับ" >

<table  >
	<tr>
		<td width="25"><img src="../iconstatus/pinmap.png" width="20" /></td>
		<td><div align="left" id="date_topiont<?=$arr[project][id];?>">
			
			<? 
			$arr[project][driver_topoint_date] = $arr[project][driver_topoint_date] - 25200 ;
			echo ThaiTimeConvert($arr[project][driver_topoint_date],'1','1');
			?>
		
		</div></td>
	</tr>
</table>
</a>
<?	
}
?>
			
		</td>
		<td  id="sub_see_guest<?=$arr[project][id];?>" style="display: none<? if($arr[project][driver_topoint] > 0){ echo "1"; } ?>">
		
<?
if($arr[project][driver_topoint] > 0){
	if($arr[project][driver_pickup] > 0){
?>
<table  cellpadding="0" cellspacing="0">
				<tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: none<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
					<td><button style="background-color: #4088e1;width: 125px;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1" <? if($arr[project][driver_pickup] == 1){ ?> disabled="disabled"  <? } ?> > เชคชื่อแขก</button></td>
				</tr>
				<tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
				<tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: none<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
					<td><button style="background-color: #ff2b2b;width: 125px;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2" <? if($arr[project][driver_pickup] == 2){ ?> disabled="disabled"  <? } ?> > ไม่เจอแขก</button></td>
				</tr>
			</table>
<?		
	}else{
?>
<table  cellpadding="0" cellspacing="0">
				<tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
					<td><button style="background-color: #4088e1;width: 125px;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1"  > เชคชื่อแขก</button></td>
				</tr>
				<tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
				<tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
					<td><button style="background-color: #ff2b2b;width: 125px;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2"  > ไม่เจอแขก</button></td>
				</tr>
			</table>
<?		
	}
?>

<? }
else{ ?>
<table  cellpadding="0" cellspacing="0">
				<tr id="tr_btn_pickup1<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 1){ ?> 1  <? } ?>">
					<td><button style="background-color: #4088e1;width: 125px;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>1" data_val="1" <? if($arr[project][driver_pickup] == 1){ ?> disabled="disabled"  <? } ?> > เชคชื่อแขก</button></td>
				</tr>
				<tr height="5" id="cc_tr_pickup<?=$arr[project][id];?>" <? if($arr[project][driver_pickup] > 0){ ?> style="display: none"  <? } ?> ></tr>
				<tr id="tr_btn_pickup2<?=$arr[project][id];?>"  style="display: nonea<? if($arr[project][driver_pickup] == 2){ ?> 1  <? } ?>">
					<td><button style="background-color: #ff2b2b;width: 125px;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_pickup" id="btn_pickup<?=$arr[project][id];?>2" data_val="2" <? if($arr[project][driver_pickup] == 2){ ?> disabled="disabled"  <? } ?> > ไม่เจอแขก</button></td>
				</tr>
			</table>
<? } ?>

<? if($arr[project][driver_pickup] != 0 && $arr[project][driver_pickup] != ''){ ?>
<? if($arr[project][driver_pickup] == 2){ $txt_pick_g = "ไม่เจอแขก"; }else{ $txt_pick_g = "เชคชื่อแขก";   }?>			
<a  class="btn_map" data_id="<?=$arr[project][id];?>" col_name="driver_pickup" data_lat="<?=$arr[project][driver_pickup_lat];?>" data_lng="<?=$arr[project][driver_pickup_lng];?>" data_val="<?=$arr[project][driver_pickup];?>" data_title="<?=$txt_pick_g;?>" >	
<table>
	<tr>
		<td width="25"><img src="../iconstatus/pinmap.png" width="20" /></td>
		<td>
		<div align="left" id="date_pickup<?=$arr[project][id];?>">
		
			<? 
			$arr[project][driver_pickup_date]  = $arr[project][driver_pickup_date] - 25200 ;
			echo ThaiTimeConvert($arr[project][driver_pickup_date],'1','1');?>
 
		</div>
		</td>
	</tr>
</table>
</a>
<?	
		}
		?>
		
		</td>
	</tr>
	<tr id="sub_complete<?=$arr[project][id];?>"  style="display: none<? if($arr[project][driver_pickup] > 0 ){ ?> 1  <? } ?>">
		<td colspan="2">
		<button style="background-color: #36c948;width: 270px;color: #fffbfb;" class="btnstatus" data_id="<?=$arr[project][id];?>" col_name="driver_complete" id="btn_complete<?=$arr[project][id];?>" <? if($arr[project][driver_complete] > 0){ ?> disabled="disabled"  <? } ?> > <span></span> ถึงสถานที่ส่ง / งานสำเร็จ</button>

<div align="center" style="width: 270px;">
<? if($arr[project][driver_complete] != 0 && $arr[project][driver_complete] != ''){ ?>
<a  class="btn_map" data_id="<?=$arr[project][id];?>" col_name="driver_complete" data_lat="<?=$arr[project][driver_complete_lat];?>" data_lng="<?=$arr[project][driver_complete_lng];?>" data_val="<?=$arr[project][driver_complete];?>" data_title="ถึงสถานที่ส่ง / งานสำเร็จ" >			
<table align="center" >
	<tr>
		
		<td   align="center" >
			<table align="center">
				<tr>
					<td align="center"><div   id="date_complete<?=$arr[project][id];?>">
					<img src="../iconstatus/pinmap.png" width="20" align="absmiddle" />
			
			<? 
			
			$arr[project][driver_complete_date] = $arr[project][driver_complete_date] - 25200 ;
			echo ThaiTimeConvert($arr[project][driver_complete_date],'1','1');?>
 
		</div></td>
				</tr>
			</table>
			
		</td>
		<td>
			
		</td>
	</tr>
</table>		
</a>
<?	
			}
			?>	
</div>	
		</td>
	</tr>
</table>
<div id="show_data_res<?=$arr[project][id];?>"></div>							  
                           </td>
                        </tr>
                     </tbody>
                </table>
                  
</li>
<?
$i++;	
}
?>
<div id="test_time"></div> 
            </ul>




   </div>

 </div>


<div id="dialog_remark_noguest" title="สาเหตุที่ไม่เจอแขก" style="display:none;padding:30px 10px;">
<table>
	<tr>
		<td width="100">สาเหตุ :</td>
		<td>
			<select name="driver_remark_noguest" id="driver_remark_noguest" style="width: 200px;">
	<option value="0">---- กรุณาเลือกสาเหตุที่ไม่เจอแขก ----</option>
<?
$res[remark_noguest] = $db->select_query("SELECT * FROM web_driver_remark WHERE status='1' and type = '2' ");
while($arr[remark_noguest] = $db->fetch($res[remark_noguest])){
?>	
	<option value="<?=$arr[remark_noguest][id];?>"><?=$arr[remark_noguest][topic_th];?></option>
<? } ?>	
</select>
		</td>
	</tr>
	<tr>
		<td>อื่น ๆ :</td>
		<td> <input type="text" style="width: 200px;" name="driver_remark_noguest_other" id="driver_remark_noguest_other"/></td>
	</tr>
	<tr>
		<td>รูปภาพ (ถ้ามี) :</td>
		<td> <input type="file" style="width: 200px;" name="driver_remark_noguest_file" id="driver_remark_noguest_file"/></td>
	</tr>
</table>

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
   var data_sv = '<?=$_GET[sv];?>';
 

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

var currenttime = event.timeStamp; 
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
				if(confirm("คุณแน่ใจหรือไม่ว่ามาถึงสถานที่รับแขกแล้ว ?") == true){
				$('#date_topiont'+data_id).html(datetime);
				$.post("action.php", { col_name : col_name ,data_id: data_id ,data_val : data_val,driver_remark : driver_remark ,data_sv: data_sv   }, function(theResponse){ 
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
	if(confirm("คุณแน่ใจหรือไม่ว่ามาถึงสถานที่รับแขกแล้ว ?") == true){
		$('#sub_see_guest'+data_id).show();
		$('#btn_topoint'+data_id).attr('disabled', true);
 

   	$('#date_topiont'+data_id).html(datetime);
 $.post("action.php", { col_name : col_name ,data_id: data_id ,data_sv: data_sv    }, function(theResponse){ var msg = theResponse;	$('#show_data_res'+data_id).html(msg);	});	
	}
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
	
	$("#dialog_guest"+data_id).dialog({ resizable: false, modal: true, width: '90%', 
	minHeight: 200,
 
	     buttons: {
			
			
			
			"ข้อมูลถูกต้อง": function () {
				
					if(confirm("คุณแน่ใจหรือไม่ว่า เช็คชื่อแขก   ?") == true){
	$('#tr_btn_pickup'+data_val).show();
	$('#tr_btn_pickup2').hide();
	$('#date_pickup'+data_id).html(datetime);
	$.post("action.php", { col_name : col_name ,data_id: data_id ,data_val : data_val,data_sv: data_sv   }, function(theResponse){
	
		var msg = theResponse;
  		$('#show_data_res'+data_id).html(msg);
	
	});	
	$('#sub_complete'+data_id).show();
	$('#btn_pickup'+data_id+data_val).attr('disabled', true);
	$('#cc_tr_pickup'+data_id).hide(); 
	$('#tr_btn_pickup2'+data_id).hide(); 
	
	$(this).dialog("close");
		}


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
	
	
	 $("#dialog_remark_noguest").dialog({ resizable: false, modal: true, width: '90%', 
	minHeight: 200,
	     buttons: {
			"บันทึก": function () {
				
				
				if($('#driver_remark').val() == 0){
					alert('กรุณาเลือกสาเหตุที่ไม่เจอแขก');
					$('#driver_remark').focus();
					return false;
				}
				driver_remark = $('#driver_remark').val();
				
				
				/*
				
				
				
				*/
				
				
				if(confirm("คุณแน่ใจหรือไม่ว่า  ไม่เจอแขก ?") == true){
				$('#date_pickup'+data_id).html(datetime);
				$.post("action.php", { col_name : col_name ,data_id: data_id ,data_val : data_val,driver_remark : driver_remark ,data_sv: data_sv   }, function(theResponse){ 
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
	
} 
 	
   	
  	

}
if(col_name == 'driver_complete'){
	if(confirm("คุณแน่ใจหรือไม่ว่างานสำเร็จแล้ว ?") == true){
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
 $.post("action.php", { col_name : col_name ,data_id: data_id ,data_sv: data_sv    }, function(theResponse){ 
 var msg = theResponse;	$('#show_data_res'+data_id).html(msg);
 	});		
	}
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
 
 
 $.post("map.php", { col_name : col_name ,data_id: data_id ,data_val: data_val,data_lat: data_lat,data_lng: data_lng    }, function(theResponse){ 
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
<? //include "share.php"; ?>


</body>
</html>