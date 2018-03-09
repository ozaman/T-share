<?
if($_GET[type]=='comfirm_checkin' or $_GET[type]=='comfirm_checkguest'  ){

   $db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
         $db->update_db(TB_driver, array(
		 		"check_alert_lab_call" =>0,
                "alert_lab_call" =>0
				
        ), " id=".$driver_id."");
        $db->closedb();
		
		
}


if($_GET[type]=='cancel_work'  ){

   $db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
         $db->update_db(TB_driver, array(
		 		"check_alert_new_work" =>0,
                "alert_cancel_work" =>0

        ), " id=".$driver_id."");
        $db->closedb();
		
		
}



if($_GET[type]=='new_work'  ){

   $db->connectdb(DB_NAME, DB_USERNAME, DB_PASSWORD);
         $db->update_db(TB_driver, array(
		 		"check_alert_new_work" =>0,
                "alert_new_work" =>0

        ), " id=".$driver_id."");
        $db->closedb();
		
		
}
 
include("xml/update/id.php");
?>

