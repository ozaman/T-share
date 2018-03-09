<?
 
 $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		mysql_query("SET NAMES UFT8"); 
		mysql_query("SET character_set_results=utf-8"); 
$res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."   ");

while($arr[project] = $db->fetch($res[project])){
 
 
 @mkdir("pic/map/".$arr[project][invoice]."", 0777);      
@chmod("pic/map/".$arr[project][invoice]."", 0777);

 
 
 $topoint='http://maps.googleapis.com/maps/api/staticmap?center=undefined,undefined&size=800x800&zoom=18&maptype=roadmap&markers=color:red|'.$arr[project][driver_topoint_lat].','.$arr[project][driver_topoint_lng].'&sensor=false&libraries=places&language=en';
 
  $pickup='http://maps.googleapis.com/maps/api/staticmap?center=undefined,undefined&size=800x800&zoom=18&maptype=roadmap&markers=color:red|'.$arr[project][driver_pickup_lat].','.$arr[project][driver_pickup_lng].'&sensor=false&libraries=places&language=en';
  
 $complete='http://maps.googleapis.com/maps/api/staticmap?center=undefined,undefined&size=800x800&zoom=18&maptype=roadmap&markers=color:red|'.$arr[project][driver_complete_lat].','.$arr[project][driver_complete_lng].'&sensor=false&libraries=places&language=en';
 
file_put_contents('pic/map/'.$arr[project][invoice].'/driver_topoint_'.$arr[project][report_id].'.png',file_get_contents($topoint));
file_put_contents('pic/map/'.$arr[project][invoice].'/driver_topoint.png',file_get_contents($topoint));

file_put_contents('pic/map/'.$arr[project][invoice].'/driver_pickup_'.$arr[project][report_id].'.png',file_get_contents($pickup));
file_put_contents('pic/map/'.$arr[project][invoice].'/driver_pickup.png',file_get_contents($pickup));

file_put_contents('pic/map/'.$arr[project][invoice].'/driver_complete_'.$arr[project][report_id].'.png',file_get_contents($complete));
file_put_contents('pic/map/'.$arr[project][invoice].'/driver_complete.png',file_get_contents($complete));





}
///file_put_contents('pic/'.$_GET[point].'_'.$_GET[id].'.png',file_get_contents($url));
?>