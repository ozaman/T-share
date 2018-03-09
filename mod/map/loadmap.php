 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<?
 

$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[to] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where id='".$_GET[bookid]."'");
 $arr[to] = $db->fetch($res[to]);
  
?>
   
  
 
  
 
 

<?
 //echo $_GET[type] ;
 
if($_GET[type] == 'driver_topoint'){

 
	$type_point = "ถึงสถานที่รับแขก";
	$data_point = "topoint";
 

	
}
if($_GET[type] == 'driver_pickup'){
	$data_point = "pickup";
 
	if($_GET[data_val] == 1){
		$type_point = "รับแขกขึ้นรถ";
	}else{
		$type_point = "ไม่เจอแขก";
	}
}
if($_GET[type] == 'driver_complete'){
	$data_point = "complete";
	$type_point = "งานสำเร็จ";
}
?> 
<?
$data_lat=$arr[to][driver_.$data_point._lat];
$data_lng=$arr[to][driver_.$data_point._lng];

?>
 <script>
///alert(555);

 </script>

 
 <style type="text/css">
 
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#googleMap { 
	width:100%;
	height:100%;
 position:fixed;
 
/*	margin-top:100px;*/
}
</style>
   <img src="pic/map/<?=$arr[to][invoice]?>/<?=$_GET[type]?>_<?=$arr[to][report_id]?>.png" name="view01"    border="0"  />