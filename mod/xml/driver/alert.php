<?
 
set_time_limit(30000000); 

 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT id,alert_new_work,alert_change_work,alert_cancel_work FROM ".TB_driver." "); 
while($arr[project] = $db->fetch($res[project])){
 
	
 
$product = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<driver>\n";
 

 

  $i = 0;
  // cells
  foreach ($arr[project] as $cell) {
    // Escaping illegal characters - not tested actually ;)
 
    $col_name = mysql_field_name($res[project],$i);
    // creates the "<tag>contents</tag>" representing the column
 
 
 	 
if($col_name == 'username' || $col_name == 'password'  || $col_name == 'name' || $col_name == 'nickname'  || $col_name == 'iddriving' ){
	$product .= "<".$col_name.">\n<![CDATA[".$cell."]]></".$col_name.">\n";	
}else{
	$product .= "<". $col_name.">".$cell."</".$col_name.">\n";
}
	
	
	
 	
    $i++;
  }

$product .= "</driver>\n";

@unlink("$folder_xml/driver/alert/".$arr[project][id].".xml");
@$fd = @fopen("$folder_xml/driver/alert/".$arr[project][id].".xml", "a+");
@fputs($fd, $product . "\n\n");
@fclose($fd);


//$db->closedb ();

 
}


?>
 