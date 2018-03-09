 <?
$_GET[day] = date('Y-m-d');
 
 $_GET[day] = '2016-09-05';
 
  

//echo  $_GET[day];
//$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
//$db->del(TB_transfer_report_all," transfer_date < '".$_GET[day]."' "); 


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
 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$db->update_db(TB_transfer_report_all,array(
 
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
 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[timeline] = $db->select_query("SELECT * FROM date_loop  where  dayall >= '".$_GET[day]."' order by  id  asc  limit 1");
while($arr[timeline] = $db->fetch($res[timeline])){
///echo $arr[timeline][dayall];

  $daywork=$arr[timeline][dayall];

 ?>
<?    include("mod/lab/timeline.php") ; ?>
 
 <? }  ?>
 