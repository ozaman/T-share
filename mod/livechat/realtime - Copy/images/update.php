<?
set_time_limit(30000000000);

$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
 
 
$res[project] = $db->select_query("SELECT  id,check_acc  FROM acc_2017_01  ");
 
while ($arr[project] = $db->fetch($res[project])){
 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$db->update_db("acc_2017_01_new",array(		
 
		 "check_acc"=>$arr[project][check_acc]

		)," id='".$arr[project][id]."'");
 

}
		
		$db->closedb ();

?>