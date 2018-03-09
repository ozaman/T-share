<?
 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[to] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where id='".$_GET[bookid]."'");
 $arr[to] = $db->fetch($res[to]);
  
?>
 
<? if($arr[to][driver_topoint] != 0 && $arr[to][driver_topoint] != '' or 1==1){ ?>
 <?
//echo $_GET[type];
 
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
						  
 
 
   



<div id="date_topoint<?=$_GET[type] ?>"  style="cursor:pointer;margin-left:-15px; "  data-toggle="modal" data-target="#showmap<?=$_GET[type] ?>"  >
        <a><table  >
      <tr>
        <td width="25" valign="top"><img src="images/icon_map/map_pin.png" width="20" /></td>
        <td><div align="left" id="date_topiont<?=$arr[to][id];?>" style="font-size:12px; ">
            <? 
			$arr[to][driver_.$data_point._date] = $arr[to][driver_.$data_point._date] - 25200 ;
			echo ThaiTimeConvert($arr[to][driver_.$data_point._date],'1','1');
			?>
        </div></td>
      </tr>
    </table></a>
 </div>
    <?	
}
?>
 