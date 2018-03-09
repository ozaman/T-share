<?
session_start();
include "config_fir.php";
if($_GET[day] != ''){
	$_GET[day] = $_GET[day];
}else{
	$_GET[day] = date('Y-m-d');
}

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$user_id =  $_SESSION['data_user_id'];
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



$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM ".TB_order."  where drivername='".$user_id."' and transfer_date='".$_GET[day]."' and status = 'CONFIRM' group by carno  order by airout_time ASC   ");
$rows[project] = $db->rows($res[project]);
if($rows[project]){
}else{
	$rows[project] = 0;
}
$row_processing = $db->num_rows(TB_order,"id","drivername='".$user_id."' and transfer_date='".$_GET[day]."' and status = 'CONFIRM' and driver_complete  ='0' group by carno   ");
$row_complete = $db->num_rows(TB_order,"id","drivername='".$user_id."' and transfer_date='".$_GET[day]."' and status = 'CONFIRM' and driver_complete  ='1' group by carno   ");
?>                   
               <li style="background-color:#C4E3E8;background-image:none;">
                  <table align="center">
                     <tbody>
                        <tr>
                           <td colspan="2" >
                           <div><img src="../icon/flag/32/Thailand.png" align="absmiddle"/><span class="mnl">รวมทั้งสิ้น </span><span class="mnt"><?=$rows[project];?> งาน</span> </div>
                              <table class="tbx">
                                 <tbody>
                                    <tr>
                                       <th>สำเร็จ</th>
                                       <th>ไม่สำเร็จ</th>
                                    </tr>
                                    <tr>
                                       <td class="green5"><?=$row_processing;?></td>
                                       <td class="red5"><?=$row_complete;?></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               xax</li>
<?
$i=1;
while($arr[project] = $db->fetch($res[project])){
	 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[product] = $db->select_query("SELECT cartype,area FROM web_transferproduct WHERE id='".$arr[project][program]."' ");
	$arr[product] = $db->fetch($res[product]);
	$res[book] = $db->select_query("SELECT * FROM ".TB_book_agent." WHERE id='".$arr[project][orderid]."' ");
	$arr[book] = $db->fetch($res[book]);

?>
<li class="dx" mlevel="<?=$i;?>" <? if($arr[project][driver_complete] == 1){ ?> style="background-color : #b3f2d9;"  <? } ?>>
	<a rel="external" href="show_all.php?day=<?=$_GET[day];?>&carno=<?=$arr[project][carno];?>&car_list=<?=$i;?>&sv=TH">
                  <table>
                     <tbody>
                       <tr>
                           <td  >
						   <span class="circleC"> <?=$i;?> </span>  
						   <span class="circleC" style="display:nonea"> <? if($arr[product][cartype] == 2){ echo "J";}else{echo "P";} ?> </span>
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
                                          <? echo $arr_t_topic[$arr[project][pickup_place]];?> (
                                            <?=$arr_t_province[$arr[project][pickup_place]];?>
                                            /
                                            <?=$arr_t_amphur[$arr[project][pickup_place]];?>
                                            )
                                          <? } ?>
                                      </div></td>
							 	   </tr>
									<tr>
                                       <td class="gay5">รับแขก</td>
                                       <td><div  align="left"><?echo $arr[project][airout_time];?></div></td>
                                    </tr>
									<tr style="display: none<? if($arr[product][area] == 'In'){ echo "1"; } ?>">
                                       <td class="gay5">เที่ยวบิน</td>
                                       <td><div  align="left"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></div></td>
                                    </tr>
                                    <tr>
                                      <td class="red5">สถานที่ส่ง</td>
                                      <td ><div  align="left">
                                          <? if($arr_t_topic[$arr[project][to_place]] != ''){ ?>
                                          <? echo $arr_t_topic[$arr[project][to_place]];?> (
                                            <?=$arr_t_province[$arr[project][to_place]];?>
                                            /
                                            <?=$arr_t_amphur[$arr[project][to_place]];?>
                                            )
                                          <? } ?>
                                        </div>
                                          </td>
                                    </tr>
									<tr style="display: none<? if($arr[product][area] == 'Out'){ echo "1"; } ?>">
                                       <td class="gay5">เที่ยวบิน</td>
                                       <td><div  align="left"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></div></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
	</a>                  
</li>
<?
$i++;	
}
$db->closedb ();
?>





<?



 

$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM ".TB_order."  where drivername='".$user_id."' and transfer_date='".$_GET[day]."' and status = 'CONFIRM' group by carno   order by airout_time ASC   ");

$rows[project] = $db->rows($res[project]);
if($rows[project]){
	
}else{
	$rows[project] = 0;
}



$row_processing = $db->num_rows(TB_order,"id","drivername='".$user_id."' and transfer_date='".$_GET[day]."' and status = 'CONFIRM' and driver_complete  ='0' group by carno  ");
$row_complete = $db->num_rows(TB_order,"id","drivername='".$user_id."' and transfer_date='".$_GET[day]."' and status = 'CONFIRM' and driver_complete  ='1' group by carno  ");



?>                   
 
               <li style="background-color:#C4E3E8;background-image:none;">
                  <table align="center">
                     <tbody>
                        <tr>
 
                           <td colspan="2" >
                           <div><img src="../icon/flag/32/China.png" align="absmiddle"/><span class="mnl">รวมทั้งสิ้น </span><span class="mnt"><?=$rows[project];?> งาน</span> </div>
                              <table class="tbx">
                                 <tbody>
                                    <tr>
                                       <th>สำเร็จ</th>
                                       <th>ไม่สำเร็จ</th>
                                    </tr>
                                    <tr>
                                       <td class="green5"><?=$row_processing;?></td>
                                       <td class="red5"><?=$row_complete;?></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </li>
<?
$i=1;
while($arr[project] = $db->fetch($res[project])){
	
	 $db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[product] = $db->select_query("SELECT cartype,area FROM web_transferproduct WHERE id='".$arr[project][program]."' ");
	$arr[product] = $db->fetch($res[product]);
	$res[book] = $db->select_query("SELECT * FROM ".TB_book_agent." WHERE id='".$arr[project][orderid]."' ");
	$arr[book] = $db->fetch($res[book]);

?>
<li class="dx" mlevel="<?=$i;?>" <? if($arr[project][driver_complete] == 1){ ?> style="background-color : #b3f2d9;"  <? } ?>>
	<a rel="external" href="show_all.php?day=<?=$_GET[day];?>&carno=<?=$arr[project][carno];?>&car_list=<?=$i;?>&sv=CN">
                  <table>
                     <tbody>
                        <tr>
                           <td  >
						   <span class="circleC"> <?=$i;?> </span>  
						   <span class="circleC" style="display:nonea"> <? if($arr[product][cartype] == 2){ echo "J";}else{echo "P";} ?> </span>
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
                           <td  ><table class="tbx">
                             <tbody>
                               <tr>
                                 <td class="green5">สถานที่รับ</td>
                                 <td><div  align="left">
                                     <? if($arr_t_topic[$arr[project][pickup_place]] != ''){ ?>
                                     <? echo $arr_t_topic[$arr[project][pickup_place]];?> (
                                   <?=$arr_t_province[$arr[project][pickup_place]];?>
                                   /
                                   <?=$arr_t_amphur[$arr[project][pickup_place]];?>
                                   )
                                   <? } ?>
                                 </div></td>
                               </tr>
                               <tr>
                                 <td class="gay5">รับแขก</td>
                                 <td><div  align="left"><?echo $arr[project][airout_time];?></div></td>
                               </tr>
                               <tr style="display: none<? if($arr[product][area] == 'In'){ echo "1"; } ?>">
                                 <td class="gay5">เที่ยวบิน</td>
                                 <td><div  align="left"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></div></td>
                               </tr>
                               <tr>
                                 <td class="red5">สถานที่ส่ง</td>
                                 <td ><div  align="left">
                                     <? if($arr_t_topic[$arr[project][to_place]] != ''){ ?>
                                     <? echo $arr_t_topic[$arr[project][to_place]];?> (
                                   <?=$arr_t_province[$arr[project][to_place]];?>
                                   /
                                   <?=$arr_t_amphur[$arr[project][to_place]];?>
                                   )
                                   <? } ?>
                                 </div></td>
                               </tr>
                               <tr style="display: none<? if($arr[product][area] == 'Out'){ echo "1"; } ?>">
                                 <td class="gay5">เที่ยวบิน</td>
                                 <td><div  align="left"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></div></td>
                               </tr>
                             </tbody>
                           </table></td>
                        </tr>
                     </tbody>
                  </table>
	</a>                  
</li>
<?
$i++;	
}
$db->closedb ();
?>
<script>
	$('.loader').hide();
</script>