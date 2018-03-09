<div  style="padding-top:0px; padding:5px; ">
 <? //  include "mod/load/update/all_today.php" ;?>

 <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
						
<table width="100%"  border="0" cellspacing="2" cellpadding="2" style="padding:5px; ">
  <tr align="center">
    <td width="40%" bgcolor="#999999" class="font_20" style="color:#FFFFFF; padding:2px; "><b>วันที่</b></td>
    <td width="20%" bgcolor="#999999" class="font_20" style="color:#FFFFFF; padding:2px; "><b>งาน</td>
    <td width="40%" bgcolor="#999999" class="font_20" style="color:#FFFFFF; padding:2px; "><b>รายรับ </td>
  </tr>
</table>
						
 						
						 
 
 <?
$_GET[day] = date('Y-m-d');
 
 $_GET[day] = '2016-08-16';
 
  $date_finish = date('Y-m-d',strtotime("+0 day")); 
    $date_finish_plus = date('Y-m-d',strtotime("+1 day")); 
  
 
 $date_start ='2016-09-01';

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




 $no    = "$_GET[year]-$_GET[month]";
 $maindb   = "acc_$_GET[year]_$_GET[month]"; 
		 
////// check db
  $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD); 
	   
//$checkdb = mysql_query('select id from  acc_$_GET[year]_$_GET[month]  LIMIT 1');



 $checkdb= $db->num_rows($maindb,"id","id > 0 limit 1");

 

if($checkdb > 0)
{

 $maindb   = "acc_$_GET[year]_$_GET[month]"; 
}
else
{
 
$maindb   = "transfer_report_all";
    //I can't find it...
} 
	   
	   
	   //// 
		 
		 
		 
		 
		 
		
		
 $data_sale = "where dayall like '%" . $no . "%'   $saleuser";
       $allpage   = "dayall like '%" . $no . "%'   $saleuser";
	   
	   
 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(car_price) FROM  $maindb  where transfer_date like '%" . $no . "%'  and status = 'CONFIRM' and driver_pickup > '0' and number_of_report >0 and car_price > 0 and drivername='".$user_id."' "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
$pay_all= $row['SUM(car_price)'];
}

////


  
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(cost) FROM history_transfer_ot where transfer_date  like '%" . $no . "%'  and drivername='".$user_id."' "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
$payot_all= $row['SUM(cost)'];
}





 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[timeline] = $db->select_query("SELECT * FROM date_loop  $data_sale and  dayall   < '".$date_finish_plus."' order by  id  asc  limit 31");
while($arr[timeline] = $db->fetch($res[timeline])){
 
 
 

$bgcolor = ($i++ & 1) ? '#FFFFFF' : '#FFFDE9'; 


////// กำหนดฐานข้อมูล ย้อนหลัง


//////


 

  $daywork=$arr[timeline][dayall];

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[drivername] = $db->select_query("SELECT id,nickname,post_date FROM ".TB_driver." WHERE id='".$arr[project][drivername]."' ");
	$arr[drivername] = $db->fetch($res[drivername]);
 
	///echo $arr[project][id];
	
	if($arr[drivername][company]==1133) {
	$find_date="and outdate='". $daywork."'";
	} 
	
		else {
  $find_date="and transfer_date='". $daywork."'";
	} 

$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);

/*
$row_no = $db->num_rows(TB_transfer_report_all,"id","drivername='".$user_id."' and transfer_date='".$daywork."' and status = 'CONFIRM' and driver_pickup  < '1' group by driver_complete,invoice, order by driver_complete desc   ");
$row_yes = $db->num_rows(TB_transfer_report_all,"id","drivername='".$user_id."' and transfer_date='".$daywork."' and status = 'CONFIRM' and driver_pickup > '0' group by driver_complete,invoice order by driver_complete desc ");
*/

///echo $maindb;

///echo $find_date;


//$row_no = $db->num_rows(TB_transfer_report_all,"id","drivername='".$user_id."' and transfer_date='".$daywork."' and status = 'CONFIRM' and driver_pickup  < '1' group by driver_complete,invoice, order by driver_complete desc   ");
$row_yes = $db->num_rows($maindb,"id","drivername='".$user_id."' $find_date and status = 'CONFIRM' and driver_pickup > '0' and number_of_report >0 and car_price > 0 group by driver_complete,invoice   ");
 

$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
 $row_all = $db->num_rows($maindb,"id","drivername='".$user_id."' $find_date and status = 'CONFIRM' ");
 

$data_sale="where drivername='".$user_id."'  $find_date and status = 'CONFIRM' and driver_pickup > '0'";

$data_ot="where drivername='".$user_id."' $find_date ";
 
///  $data_sale="where drivername='".$user_id."'  and status = 'CONFIRM'";
 
 //$row_complete = $db->num_rows(TB_order,"id","drivername='".$user_id."' and transfer_date='".$_GET[day]."' and status = 'CONFIRM' group by carno  ");

//
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(car_price) FROM  $maindb $data_sale "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
 $pay= $row['SUM(car_price)'];
}

 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(cost) FROM history_transfer_ot $data_ot "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
$payot= $row['SUM(cost)'];
}
 
 
 ////
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$query = "SELECT SUM(use_car_overtime_cost_driver_total)  FROM transfer_report_all $data_sale "; 
$result = mysql_query($query) or die(mysql_error());
// Print out result
while($row = mysql_fetch_array($result)){
$pay_advance= $row['SUM(use_car_overtime_cost_driver_total)'];
}

 ?>
 
 
 <div style="background-color:<?=$bgcolor ?> ">
<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr align="center">
    <td width="40%" style="height:35px; "  class="font_18"><?=$arr[timeline][dayall]?></td>
    <td width="20%"  class="font_18"><?=$row_yes?></td>
    <td width="40%" align="right"  class="font_18" style="padding-right:10px; ">
	
	<? if($pay_advance>0){
	
	$db->connectdb(DB_NAME_data,DB_USERNAME,DB_PASSWORD);
$res[projectnew] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  $data_sale and use_car_overtime > 0  ");

$arr[projectnew] = $db->fetch($res[projectnew]);
	
	
	?>
	
	<a  data-toggle="modal" data-target="#myModal<?=$arr[projectnew][id];?>" ><font  color="#FF0000">(<?=$pay_advance?>)</font></a>
 
	<div id="myModal<?=$arr[projectnew][id];?>" class="modal fade" role="dialog">
  <div class="modal-dialog"   style="max-width:350px; ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
 
        <h4 class="modal-title"><?=$arr[projectnew][product_name_th];?></h4>
      </div>
      <div class="modal-body">
        <p>งานใช้รถเพิ่ม <?=$arr[projectnew][use_car_overtime];?> ชั่วโมง</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>

  </div>
</div>
	
	<? } ?> 
	
	
	<? if($payot>0){?>
	
	<font color="#006699">(โอที)</font> 
	<? } ?> 
	<? if($row_all>0){?>
	<?= number_format( $pay , 0 );?>
		<? } ?>
 
			<? if($row_all==0){?>
	<font color="#FF0000"> - </font>
		<? } ?>
		
 
	
	</td>
  </tr>
</table>

 </div>
 <? }  ?>
 </div><table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr  >
    <td  class="font_18" style="height:30px; padding-left:5px; ">รวมค่าเที่ยว เบี้ยเลี้ยง</td>
    <td width="40%" align="right"  class="font_24" style="padding-right:10px; color:#000000 "> 
	
	<?= number_format( $pay_all , 0 );?>
		 
	
	
	
	</td>
  </tr>
</table>
 <? if($user_id=='11001'){ 
 $payphone=816;
 }
 
 ?>
 <table width="100%"  border="0" cellspacing="2" cellpadding="2">
   <tr  >
     <td  class="font_18" style="height:30px;  padding-left:5px;">ค่าโทรศัพท์</td>
     <td width="40%" align="right"  class="font_24" style="padding-right:10px; color:#FF0000 "><?= number_format( $payphone , 0 );?>
     </td>
   </tr>
 </table>

 
 <table width="100%"  border="0" cellpadding="2" cellspacing="2"  style="background-color:#F6F6F6;border:  dotted 1px #999999;  ">
   <tr  >
     <td  class="font_18" style="height:30px; padding-left:5px; ">รายได้สุทธิ</td>
     <td width="40%" align="right"  class="font_24" style="padding-right:10px; color: #006699 "><?= number_format( $pay_all-$payphone , 0 );?>
     </td>
   </tr>
 </table>
 