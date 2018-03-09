 <?
$db->connectdb(DB_NAME_DATA, DB_USERNAME, DB_PASSWORD);
$res[car_history] = $db->select_query("SELECT * FROM history_use_car WHERE drivername='".$user_id ."'  order by id desc limit 1   "); 
$arr[car_history] = $db->fetch($res[car_history]);

?>
 

<? if($_GET[type]=="text"){ 
 
?> 
<b>
 
	 <? if($arr[car_history][type]=='start') {   ?>
 
	เริ่มใช้งาน   <? echo $date = date('Y-m-d  เวลา  G:i น.', $arr[car_history][start_time]);?><br>
<font class="font_26">ขณะนี้กำลังใช้งานรถ</font>
	<? } ?>
  <? if($arr[car_history][type]=='stop') {   ?>

	เลิกใช้งาน   <? echo $date = date('Y-m-d  เวลา  G:i น.', $arr[car_history][finish_time]);?>
	
	<font class="font_26" color="#999999">ขณะนี้รถพร้อมใช้งาน</font>
	<? } ?>
	</b>
	<? } ?>
	<? if($_GET[type]=="select"){ ?> 
	
 
	<select name="type" id="typer"  class="form-control"  style="font-size:30px; font-weight:bold; height:50px; color:#006699" onchange="return find_transfer_status_check();" >
 
 <? if($arr[car_history][type]=='stop') { ?>
<option value="start"  > เริ่มใช้งานรถ  </option>
 <? } ?>
 
 <? if($arr[car_history][type]=='start') {  ?>
<option value="stop"  > เลิกใช้งานรถ </option>
<? } ?>

 <? if(!$arr[car_history][id]) {  ?>
 <option value="start"  > เริ่มใช้งานรถ  </option>
 <option value="stop"  > เลิกใช้งานรถ </option>
 <? } ?>

</select>
 
	<? } ?>
	
	