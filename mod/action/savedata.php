 <?
if($_GET[type] == 'read_msg'){
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
$db->update_db(TB_transfer_report_all,array(
			"read_msg"=>"1",
			"read_msg_time"=>"".time()."",	
		)," id='".$_GET[id]."' ");
		$db->closedb ();
}
?>