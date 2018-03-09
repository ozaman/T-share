
<?

 
 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[chkcar] = $db->select_query("SELECT * FROM  driver_use_car  where drivername='".$user_id."'   order by id desc limit 1 ");
$arr[chkcar] = $db->fetch($res[chkcar]);




 

///// รถ

        $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $res[car] = $db->select_query("SELECT * FROM " . TB_carall . "  where id=".$arr[chkcar][car_number]." ");
        ;
       $arr[car] = $db->fetch($res[car]);
	   
	               $res[aum]   = $db->select_query("SELECT * FROM " . TB_carall_type . " WHERE id='" . $arr[car][car_type] . "' ");
            $arr[aum]   = $db->fetch($res[aum]);
            $res[aum]   = $db->select_query("SELECT * FROM " . TB_carall_type . " WHERE id='" . $arr[car][car_type] . "' ");
            $arr[aum]   = $db->fetch($res[aum]);
			
			if($arr[aum][topic_en]=='Car'){
			$arr[aum][topic_en]='รถเก๋ง';
			}
			if($arr[aum][topic_en]=='Van'){
			$arr[aum][topic_en]='รถตู้';
			}
			
			            $res[admin] = $db->select_query("SELECT * FROM " . TB_admin . " WHERE id='" . $arr[car][company] . "' ");
            $arr[admin] = $db->fetch($res[admin]);
 
 
 
 
if($user_car_use_status=='stop'){

$use='หยุดใช้รถ';
$use_status='หยุดใช้รถ';

$usecolor='#FF0000';
 
}

 
if($user_car_use_status=='start'){

$use='เริ่มใช้รถ';
$use_status='กำลังใช้รถ';

$usecolor='#00CC66';
 
}
 

?>


 

<div style="font-size:24px"><b>

สถานะ : <font color="<?=$usecolor?>"><?=$use_status?></font>


</div>


<table width="100%" border="0" cellspacing="2" cellpadding="2">

  <tr>
    <td style="font-size:16px"><b><?  echo "" . $arr[car][car_num] . "  ( " . $arr[aum][topic_en] . " )  -  " . $arr[admin][company] . ""; ?></td>
  </tr>
  
  
    <tr>
    <td style="font-size:16px; padding-top:5px;"><?=$use;?> : <?=date('Y-m-d',  $arr[chkcar][start_time]);?>  เวลา  
	
 
 <font color="<?=$usecolor?>"><b><?=date('H:i:s',  $arr[chkcar][start_time]);?></td>
  </tr>
  
  <? if($arr[chkcar][type]=='stop'){ ?>
  
  <tr>
    <td  style="font-size:16px; padding-top:5px;">ระยะทางที่ใช้งาน <strong><?=$arr[chkcar][mile_use]?></strong> กิโลเมตร </td>
  </tr>
  <? } ?>
  
</table>
