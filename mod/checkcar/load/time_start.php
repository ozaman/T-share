 
<?

 
 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$res[chkcar] = $db->select_query("SELECT * FROM  driver_use_car  where car_number='".$_GET[car]."'   order by id desc limit 1 ");
$arr[chkcar] = $db->fetch($res[chkcar]);


 

?>



<input name="check_mile" type="number"  class="form-control" id="check_mile"  style="font-size:30px; height:50px;" onKeyPress="if(this.value.length==6) return false;" value="<?=$arr[chkcar][mile]?>"/>
