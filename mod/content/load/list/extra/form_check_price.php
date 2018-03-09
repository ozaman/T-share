 <?

 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
 $res[shop] = $db->select_query("SELECT * FROM  product_price_list_all where plan_setting=".$_GET[plan_setting]."   and country=45 order by sort_country desc ");
                      
 $arr[shop] = $db->fetch($res[shop]);
	   
 
?>