 


<?
session_start();

////////
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		$db->update_db(TB_transfer_report_all,array(
			"".$_GET[col_lat].""=>"".$_GET[lat]."",
			"".$_GET[col_lng].""=>"".$_GET[lng]."",	
		)," id=$_GET[id] ");

//////
if($_GET[data_sv] == 'cn'){
	$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}else{
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
}
 $_GET[col_lat]." - ".$_GET[lat]." - ".$_GET[col_lng]." - ".$_GET[lng]." - ".$_GET[id]." - ".$_GET[data_sv];

		$db->update_db(TB_order,array(
			"".$_GET[col_lat].""=>"".$_GET[lat]."",
			"".$_GET[col_lng].""=>"".$_GET[lng]."",	
		)," invoice='".$_GET[data_vc]."' ");
 
		
			$db->update_db('web_transfer_report',array(
			"".$_GET[col_lat].""=>"".$_GET[lat]."",
			"".$_GET[col_lng].""=>"".$_GET[lng]."",	
		)," id='".$_GET[data_report_id]."' ");
		$db->closedb (); 
		
		
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);  
$res[driver] = $db->select_query("SELECT drivername  FROM web_order  WHERE invoice='".$_GET[data_vc]."'  "); 
$arr[driver] = $db->fetch($res[driver]);

		////// 
if($_GET[point]=='driver_topoint'){
		
$db->connectdb(DB_NAME_CHAT, DB_USERNAME, DB_PASSWORD);  
		$db->add_db('zvc_.'$_GET[data_vc]'',array( 		 
 
		  "flight_delay_date"=>"".TIMESTAMP."",		  
		  "drivername" => $arr[driver][drivername] ,
		   "voucher" => "$_GET[data_vc]",
		      "comment_from" =>"driver", 
			"comment" =>"The driver arrived at the location pickup place", 			  
		   "state" =>"driver_to_point", 
			"latitude"=>"".$_GET[lat]."",
			"longitude"=>"".$_GET[lng].""
 
		));

////
//$url='http://maps.googleapis.com/maps/api/staticmap?center='.$_GET[lat].','.$_GET[lng].'&size=200x200&zoom=16&maptype=roadmap&markers=color:red|'.$_GET[lat].','.$_GET[lng].'&sensor=false&libraries=places&language=en';

////
		
///file_put_contents('../data/fileupload/map/'.$_GET[data_vc].'_'.TIMESTAMP.'.png',file_get_contents($url));
		

}
		
		
		
		
 ///// สร้างภาพ
 
 
 
 
 /*
 $url='http://maps.googleapis.com/maps/api/staticmap?center=undefined,undefined&size=800x800&zoom=18&maptype=roadmap&markers=color:red|'.$_GET[lat].','.$_GET[lng].'&sensor=false&libraries=places&language=en';
 
 
 @mkdir("pic/map/".$_GET[data_vc]."", 0777);      
@chmod("pic/map/".$_GET[data_vc]."", 0777);
 
 file_put_contents('pic/map/'.$_GET[data_vc].'/'.$_GET[point].'_'.$_GET[data_report_id].'.png',file_get_contents($url));
file_put_contents('pic/map/'.$_GET[data_vc].'/'.$_GET[point].'.png',file_get_contents($url));

///file_put_contents('pic/'.$_GET[point].'_'.$_GET[id].'.png',file_get_contents($url));

*/

?>