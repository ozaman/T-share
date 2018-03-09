 <br>

<?
 $date_finish = date('Y-m-d',strtotime("+0 day")); 
 
 $nowtime = date('H:i',strtotime("+0 day")); 

  $date_start ='2016-09-01';
  
  $date_finish =$_GET[day];
 
///
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
 	$res[bookday] = $db->select_query("SELECT  id,transfer_date  FROM   transfer_report_all  WHERE id='".$_GET[bookid]."' ");
	$arr[bookday] = $db->fetch($res[bookday]);

$date_finish = $arr[bookday] [transfer_date];

$data_now="where drivername='".$driver_id."' and  id='".$_GET[bookid]."' ";

// echo $date_finish;


$data_all= "where drivername='".$driver_id."'   and transfer_date  BETWEEN  '".$date_start."' and '".$date_finish."' and status = 'CONFIRM' and driver_pickup > 0";

$data_today_yes= "where drivername='".$driver_id."'   and transfer_date  ='".$date_finish."' and status = 'CONFIRM' and driver_pickup > 0";

$data_today_no= "where drivername='".$driver_id."'   and transfer_date  ='".$date_finish."' and airout_time > '".$nowtime."' and status = 'CONFIRM' and driver_pickup < 1 and airout_time <>'' group by invoice order by  airout_time ASC ";

$allday= $db->num_rows('transfer_report_all',"id","drivername='".$driver_id."'   and transfer_date  ='".$date_finish."' and airout_time > '".$nowtime."' and status = 'CONFIRM' and driver_pickup < 1 and airout_time <>'' group by invoice order by  airout_time ASC "); 

///  $data_now="where drivername='".$driver_id."'  and status = 'CONFIRM'";
 
 //$row_complete = $db->num_rows(TB_order,"id","drivername='".$driver_id."' and transfer_date='".$_GET[day]."' and status = 'CONFIRM' group by carno  ");

//
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(car_price) FROM transfer_report_all $data_now "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
$pay_now= $row['SUM(car_price)'];
}


 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(car_price) FROM transfer_report_all $data_now "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
$pay_now= $row['SUM(car_price)'];
}


 
  $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(car_price) FROM transfer_report_all  $data_today_yes"; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
$pay_today_yes= $row['SUM(car_price)'];
}
 

  $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$query = "SELECT invoice, SUM(car_price) FROM transfer_report_all  where drivername='".$driver_id."'   and transfer_date  ='".$date_finish."' and airout_time > '".$nowtime."' and status = 'CONFIRM' and driver_pickup < 1 and airout_time <>'' group by invoice order by  airout_time ASC limit $allday"; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
$pay_today_no= $row['SUM(car_price)'];
}
 
 
  


?>
<div class="btn btn-app" style="width:100%; height:auto; margin-right:20px; margin-left:-1px; border:1px solid #C1C1C1;  "><a href="?name=pay&file=pay">
<table width="100%"    border="0" cellpadding="2" cellspacing="2" style="padding:10px; " >
  <tr  >
    <td class="font_20" >งานนี้</td>
    <td width="30%" align="right"  class="font_20"  style="color:00808B; height:35px;"><b> <?=number_format( $pay_now+0 , 2 );?></b></td>
  </tr>
  <tr  >
    <td class="font_20" >วันนี้ (ดำเนินการแล้ว)</td>
  <td width="30%" align="right" class="font_20"  style="color:#FF9A02; height:35px; "><b> <?=number_format( $pay_today_yes+0 , 2 );?></b></td>
  </tr>
  <tr   style="display:none">
    <td class="font_20"  >วันนี้ (รอดำเนินการ)</td>
  <td width="30%" align="right" class="font_20"  style="color:#666666; height:35px; "><b> <?=number_format( $pay_today_no+0 , 2 );?></b></td>
  </tr>
</table>
</a>
</div>

<div class="btn btn-app" style="width:100%; height:auto; margin-right:20px; margin-left:-1px; border:1px solid #C1C1C1; margin-top:10px; "><a href="?name=pay&file=pay" target="_blank" ><span class="font_30"><b>
ดูเบี้ยเที่ยวทั้งหมด</b></span>
</a>
</div>