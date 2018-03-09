 
 <?
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM  store_driver_register  where id=".$_GET[id]."   order by id desc  ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
 $arr[web_driver_edit] = $db->fetch($res[project]);
 
 
 
 $res[web_car] = $db->select_query("SELECT * FROM  store_carall_register  where id=".$arr[web_driver_edit][car_num]."   order by id desc  ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
 $arr[web_car] = $db->fetch($res[web_car]);
 
 
 
 ?>
 
 <div style="margin-top:-80px;">
 
 <?   include ("new_driver.php");?> <div>