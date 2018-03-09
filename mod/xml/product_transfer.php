<?
set_time_limit(30000000); 

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT id,topic_en,topic_cn,topic_th,company,code,type,cartype,status,stay,stay_to,area FROM ".TB_transferproduct."   ");
while($arr[project] = $db->fetch($res[project])){

	$res[user] = $db->select_query("SELECT * FROM ".TB_car." WHERE id='".$arr[project][cartype]."'   ");

	$arr[user] = $db->fetch($res[user]);
  
$product = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<product>\n";
 

 

  $i = 0;
  // cells
  foreach ($arr[project] as $cell) {
    // Escaping illegal characters - not tested actually ;)
 
    $col_name = mysql_field_name($res[project],$i);
    // creates the "<tag>contents</tag>" representing the column
  // $product .= "<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";
	
	$product .= "<" . $col_name . "><![CDATA[" . $cell . "]]></" . $col_name . ">\n";
 	
    $i++;
  }
$product .= "<paxname_en><![CDATA[" . $arr[user][topic_en]. "]]></paxname_en>\n";
  $product .= "<paxname_th><![CDATA[" . $arr[user][topic_th]. "]]></paxname_th>\n";
  $product .= "<paxname_cn><![CDATA[" . $arr[user][topic_cn]. "]]></paxname_cn>\n";
$product .= "</product>\n";
@unlink("../data_file/xml/product_transfer/id/".$arr[project][id].".xml");
@$fd = @fopen("../data_file/xml/product_transfer/id/".$arr[project][id].".xml", "a+");
@fputs($fd, $product . "\n\n");
@fclose($fd);

//$db->closedb ();

 
}


?>
 