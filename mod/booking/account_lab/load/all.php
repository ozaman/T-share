
 <style>
 .font-16 { font-size:16px;
	 
	 
	 
 }
 </style>
 
 
 
 
<div  style="padding-top:0px; padding:5px; ">
 
   <? 
   require_once("css/maincss.php");
   
   
   //  include "mod/load/update/all_today.php" ;?> 
 
 <table width="100%"  border="0" cellspacing="1">
   <tr align="center">
    <td width="100" align="center" bgcolor="#999999"  class="font-16" style="height:30px; font-size:16px "><font color="#FFFFFF">วันที่</strong></td>
    <td width="60" align="center" bgcolor="#999999"  class="font-16" style="height:30px; font-size:16px ; display:none "><font color="#FFFFFF">ค่าจอด</strong></td>
    <td width="60" align="center" bgcolor="#999999"  class="font-16" style="height:30px; font-size:16px "><font color="#FFFFFF">งาน</strong></td>
    <td align="center" bgcolor="#999999"  class="font-16" style="padding-right:0px; font-size:16px  "><font color="#FFFFFF"> 
  รวม
	
	</strong></td>
  </tr>
</table>
						
						 
 
 <?
 
 
$_GET[day] = date('Y-m-d');
 
 $_GET[day] = '2016-08-16';
 
 $date_finish = date('Y-m-d',strtotime("+0 day")); 
 $date_finish_plus = date('Y-m-d',strtotime("+1 day")); 
 
 $date_start ='2016-09-01';

//$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
//$db->del(TB_order_booking," transfer_date < '".$_GET[day]."' "); 


///echo $user_id;
 
///// update report <--- order
 /*
$select_order="id,code,invoice,program,orderid,agent,transfer_date,pickup_place,to_place,carno,drivername,air,airin_time,airout_time,driver_remark,total";
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[update] = $db->select_query("SELECT $select_order  FROM ".TB_order."  where drivername='".$user_id."' and  transfer_date >= '".$_GET[day]."'  order by transfer_date  limit 30");
//$arr[update][orderid]=309054;


while($arr[update] = $db->fetch($res[update])){
 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[book2] = $db->select_query("SELECT  id,guest,phone FROM ".TB_book_agent." WHERE id='".$arr[update][orderid]."' ");
	$arr[book2] = $db->fetch($res[book2]);
 
echo $arr[book2] [guest];
//echo " &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;";
//echo $arr[update] [invoice];
echo "<br>";
//echo $arr[update] [orderid] ;
//echo "<br>";
 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$db->update_db(TB_order_booking,array(
 
 		"guest_name"=>$arr[book2] [guest] ,
		"guest_phone"=>$arr[book2] [phone] ,
		
		"agent"=>$arr[update] [agent] ,
		"vc_id"=>$arr[update] [id] ,
		"vc_code"=>$arr[update] [code] ,
		
		"total"=>$arr[update] [total] ,
 
 		"remark"=>$arr[update] [remark] ,
 		"pickup_place"=>$arr[update] [pickup_place] ,
		"to_place"=>$arr[update] [to_place] ,
		
		
		"airin_time"=>$arr[update] [airin_time] ,
		"airout_time"=>$arr[update] [airout_time] ,
		
		"orderid"=>$arr[update] [orderid] 
		
		)," invoice='".$arr[update] [invoice]."' ");

 
}
 */
/// map th
/*
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[gg_map] = $db->select_query("SELECT id,map,transferplace_type,star FROM ".TB_transferplace_new."  ");
	while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_map[$arr[gg_map][id]] = $arr[gg_map][map];
		$arr_type[$arr[gg_map][id]] = $arr[gg_map][transferplace_type];
		$arr_star[$arr[gg_map][id]] = $arr[gg_map][star];
	}
 
$res[gg_map] = $db->select_query("SELECT id,topic,province,amphur FROM ".TB_transferplace."  ");
	while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_t_topic[$arr[gg_map][id]] = $arr[gg_map][topic];
		$arr_t_province[$arr[gg_map][id]] = $arr[gg_map][province];
		$arr_t_amphur[$arr[gg_map][id]] = $arr[gg_map][amphur];
	}
	
/// map cn
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[gg_map_cn] = $db->select_query("SELECT id,map,transferplace_type,star FROM ".TB_transferplace_cn_new."  ");
	while($arr[gg_map_cn] = $db->fetch($res[gg_map_cn])){
		$arr_map[$arr[gg_map_cn][id]] = $arr[gg_map_cn][map];
		$arr_type[$arr[gg_map_cn][id]] = $arr[gg_map_cn][transferplace_type];
		$arr_star[$arr[gg_map_cn][id]] = $arr[gg_map_cn][star];
	}
 
$res[gg_map_cn] = $db->select_query("SELECT id,topic,province,amphur FROM ".TB_transferplace_cn."  ");
	while($arr[gg_map_cn] = $db->fetch($res[gg_map_cn])){
		$arr_t_topic[$arr[gg_map_cn][id]] = $arr[gg_map_cn][topic];
		$arr_t_province[$arr[gg_map_cn][id]] = $arr[gg_map_cn][province];
		$arr_t_amphur[$arr[gg_map_cn][id]] = $arr[gg_map_cn][amphur];
	}
	 
*/

       $no    = "$_GET[year]-$_GET[month]";
 $data_sale = "where dayall like '%" . $no . "%'   $saleuser";
       $allpage   = "dayall like '%" . $no . "%'   $saleuser";
	   
 
$data_sale_park = "where transfer_date like '%" . $no . "%'   $saleuser";
	   
///// ยอดทั้งหมด


$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(price_all_total) FROM order_booking  where transfer_date like '%" . $no . "%'  and status = 'CONFIRM'  and drivername='".$user_id."' "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
 $pay_all= $row['SUM(price_all_total)'];
}


$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(price_park_total) FROM order_booking  where transfer_date like '%" . $no . "%'  and status = 'CONFIRM'  and drivername='".$user_id."' "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
 $pay_park= $row['SUM(price_park_total)'];
}



$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(price_person_total) FROM order_booking  where transfer_date like '%" . $no . "%'  and status = 'CONFIRM'  and drivername='".$user_id."' "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
 $pay_person= $row['SUM(price_person_total)'];
}


 
 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[timeline] = $db->select_query("SELECT * FROM date_loop  where dayall like '%" . $no . "%'   order by  id  asc limit 31 ");
while($arr[timeline] = $db->fetch($res[timeline])){
///echo $arr[timeline][dayall];

$bgcolor = ($i++ & 1) ? '#FFFFFF' : '#FFFDE9'; 



 $daywork=$arr[timeline][dayall];
 
 /*

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[drivername] = $db->select_query("SELECT id,nickname,post_date FROM ".TB_driver." WHERE id='".$arr[project][drivername]."' ");
	$arr[drivername] = $db->fetch($res[drivername]);
 
 
	
 
 */
 
 
 
//$arr[timeline][dayall]='2017-07-13';

$data_sale="where drivername='".$user_id."' and status = 'CONFIRM'  and transfer_date='".$arr[timeline][dayall]."'";
 
 
///  $data_sale="where drivername='".$user_id."'  and status = 'CONFIRM'";
 
 //$row_complete = $db->num_rows(TB_order,"id","drivername='".$user_id."' and transfer_date='".$_GET[day]."' and status = 'CONFIRM' group by carno  ");

//
 

 

 
 
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(price_all_total) FROM order_booking $data_sale "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
  $pay= $row['SUM(price_all_total)'];
}

  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(price_park_total) FROM order_booking $data_sale "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
  $park= $row['SUM(price_park_total)'];
}

  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(price_person_total) FROM order_booking $data_sale "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
  $person= $row['SUM(price_person_total)'];
}
$pay=0;

if($pay>-1){

 ?>
 
 
 
 
 
 
 <div style="background-color:<?=$bgcolor ?> "> 
<table width="100%"  border="0" cellspacing="0" cellpadding="2">
  <tr align="center">
    <td width="100" style="height:35px; "  class="font-16"><?=$arr[timeline][dayall]?></td>
    <td width="60" align="right"  class="font-16" style="display:none"><?= number_format($park, 0 );?></td>
    <td width="60" align="right"  class="font-16"><?= number_format($pay-$park, 0 );?></td>
    <td align="right"  class="font-16" style="padding-right:10px; "> <B>
	<? if($pay>0){?>
	<?= number_format( $pay , 0 );?>
		<? } ?>
 
			<? if($pay==0){?>
	<font color="#FF0000">-</font>
		<? } ?>
		
		 
 
	
	</td>
  </tr>
</table>

<? } ?>


 </div>
 <? }  ?>
</div>
 
 <table width="100%"  border="0" cellspacing="2" cellpadding="2" style="border-top:  solid 1px #999999; margin-top:10px; display:none  ">
  <tr  >
    <td  class="font-16" style="height:30px; padding-left:5px; display:none  ">ค่าจอดรถ</td>
    <td width="40%" align="right"  class="font_24" style="padding-right:10px; color:#000000 "> 
	
	<?= number_format($pay_park, 0 );?>
		 
	
	
	
	</td>
  </tr>
</table>

 



 


<table width="100%"  border="0" cellspacing="2" cellpadding="2"  style="display:none" >
  <tr  >
    <td  class="font-16" style="height:30px; padding-left:5px; ">ค่าหัว</td>
    <td width="40%" align="right"  class="font_24" style="padding-right:10px; color:#000000 "> 
	
	<?= number_format( $pay_all-$pay_park , 0 );?>
		 
	
	
	
	</td>
  </tr>
</table>
<table width="100%"  border="0" cellpadding="2" cellspacing="2"  style="background-color:#F6F6F6;border:  solid 1px #999999;  ">
  <tr  >
     <td  class="font-16" style="height:30px; padding-left:5px; ">รายได้รวม</td>
     <td width="40%" align="right"  class="font_24" style="padding-right:10px; color: #006699 "><?= number_format( $pay_all, 0 );?>
     </td>
  </tr>
</table>
