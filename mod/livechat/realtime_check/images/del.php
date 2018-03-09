<?
set_time_limit(30000000000);

$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
		 //$db->del(TB_transfer_report_all,"transfer_date<'2016-09-01' and transfer_date>'2016-10-31'  "); 
		$db->del('acc_2017_01_new',"transfer_date NOT LIKE '%2017-01%'  "); 
 
$res[project] = $db->select_query("SELECT  *  FROM acc_2017_01_new  where  status = 'CONFIRM'  and airout_time <>''  and driver_pickup > '-1' group by report_id order by  airout_time,transfer_date  ASC ");
//  $res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where drivername='".$user_id."' and transfer_date='". $daywork."'   order by  airout_time ASC  ");
$rows[project] = $db->rows($res[project]);
while ($arr[project] = $db->fetch($res[project])){

//echo $arr[project][invoice];
echo "<br>";

    $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   
       $res[driver] = $db->select_query("SELECT nickname,name,car_num FROM ".TB_driver." WHERE id='".$arr[project][drivername]."' ");
    $arr[driver] = $db->fetch($res[driver]);
   
   
 
	
	 ///// place
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[pickup] = $db->select_query("SELECT topic,amphur,province FROM ".TB_transferplace." WHERE id='".$arr[project][pickup_place]."' ");
$arr[pickup] = $db->fetch($res[pickup]);
	
	$res[to] = $db->select_query("SELECT topic,amphur,province FROM ".TB_transferplace." WHERE id='".$arr[project][to_place]."' ");
	$arr[to] = $db->fetch($res[to]);
	
	
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[product] = $db->select_query("SELECT cartype,area,admin_company,topic_en,topic_th,extra_way,cost_a_nett FROM web_transferproduct WHERE id='".$arr[project][program]."' ");
$arr[product] = $db->fetch($res[product]);

$res[extra_way] = $db->select_query("SELECT  id,topic_en,topic_th FROM web_extra_way  where id = '".$arr[product][extra_way]."'  ");
$arr[extra_way] = $db->fetch($res[extra_way]);
 ///// 
 
 
	
		 if($arr[project][cartype] == 2){  
		 echo $arr[project][pax];
		$cost=$arr[product][cost_a_nett]*$arr[project][pax];
	 }
	 		 if($arr[project][cartype] <> 2){  
		$cost=$arr[product][cost_a_nett]*1;
	 }
	

$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$db->update_db("acc_2017_01_new",array(		



	     "name_pickup_place"=>"". mysql_real_escape_string($arr[pickup][topic])."",
		"name_to_place"=>"". mysql_real_escape_string($arr[to][topic])."",
		"name_pickup_place_area"=>"".mysql_real_escape_string($arr[pickup][amphur])."",
		"name_to_place_area"=>"".mysql_real_escape_string($arr[to][amphur])."",
		"name_pickup_place_province"=>"".mysql_real_escape_string($arr[pickup][province])."",
		"name_to_place_province"=>"".mysql_real_escape_string($arr[to][province])."",

		"extra_service"=>"".mysql_real_escape_string($arr[extra_way][id])."",
		"extra_service_name_th"=>"".mysql_real_escape_string($arr[extra_way][topic_th])."",
 
 
 
 
		"product_name_th"=>"".mysql_real_escape_string($arr[product][topic_th])."",
		"product_name"=>"".mysql_real_escape_string($arr[product][topic_en])."",
		"product_area"=>"".mysql_real_escape_string($arr[product][area])."",

 "car_number"=>$arr[driver][car_num],
		 "transfer_nett_total"=>$cost,
		 "transfer_nett"=>$arr[product][cost_a_nett],
			"master"=>1			
			
		)," id='".$arr[project][id]."'");






}
		
		$db->closedb ();

?>