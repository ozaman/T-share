<?php 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[web_user] = $db->select_query("SELECT id FROM web_driver WHERE username='" . $_SESSION['data_user_name'] . "'    ");
$arr[web_user] = $db->fetch($res[web_user]);

$date = "2018-05-11";

$month = str_pad($_GET[month], 2, '0', STR_PAD_LEFT);
$year = (int)substr($date, 0, 4);
$no    = "$year-$month";

$date_finish_plus = date('Y-m-d',strtotime("+1 day")); 
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[timeline] = $db->select_query("SELECT * FROM date_loop  where dayall like '%" . $no . "%'   and  dayall   < '".$date_finish_plus."' order by  id  asc  limit 31");
//echo $no;
?>


<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">

<?php 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[sum_all] = $db->select_query("SELECT sum(price_all_total) as total FROM order_booking where transfer_date like '%".$no."%'");
$arr[sum_all] = $db->fetch($res[sum_all]);
?>
<div style="display: none;"><?="SELECT sum(price_all_total) as total FROM order_booking where transfer_date like '%".$no."%'";?></div>
<h3>ยอดรวม <?=number_format($arr[sum_all][total]);?></h3>
<div style="padding: 0px;">

<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp" width="100%">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric" width="30">วันที่</th>
      <!--<th>-</th>-->
      <th>รอบงาน</th>
      <th>รายได้</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
$i=1;
while($arr[timeline] = $db->fetch($res[timeline])){
	
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[sum_each_day] = $db->select_query("SELECT sum(price_all_total) as each_day FROM order_booking where transfer_date = '".$arr[timeline][dayall]."' ");
	$arr[sum_each_day] = $db->fetch($res[sum_each_day]);
	$num_work = $db->num_rows('order_booking','id','transfer_date = "'.$arr[timeline][dayall].'"');
	
	if($arr[sum_each_day][each_day]!=""){
		$data_param = $arr[timeline][dayall];
	}else{
		$data_param = "";
	}
	$total_all = intval($total_all) + intval($arr[sum_each_day][each_day]);
	if($num_work>0){
		$tr_bg = "background-color:#8bc34a38;";
	}else{
		$tr_bg = "";
	}
  	?>
	    <tr onclick="viewIncomeDetail('<?=$data_param;?>');" style="<?=$tr_bg;?>">
	      <td class="mdl-data-table__cell--non-numeric" align="right"><?=str_pad($i, 2, '0', STR_PAD_LEFT);?></td>
	     <!-- <td><?=$arr[order_book][id];?></td>-->
	      
	      <td><?=$num_work;?></td>
	      <td><?=number_format($arr[sum_each_day][each_day]);?></td>
	    </tr>
    <?	$i++;
     } ?>
   	<tr>
   		<td></td>
   		<td></td>
   		<td><?=number_format($total_all);?></td>
   	</tr>
  </tbody>
</table>
</div>
