<?
set_time_limit(30000000000);

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		 //$db->del(TB_transfer_report_all,"transfer_date<'2016-09-01' and transfer_date>'2016-10-31'  "); 
		$db->del('ssweb_driver',"id NOT LIKE '%303%'  "); 
 
		$db->closedb ();

?>