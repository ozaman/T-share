<?

set_time_limit(30000000); 


$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT *   FROM ".TB_product."   ");
while($arr[project] = $db->fetch($res[project])){
	$res[category] = $db->select_query("SELECT id,company FROM ".TB_admin." WHERE id='".$arr[project][company]."' ");
	$arr[category] = $db->fetch($res[category]);
	
 
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
	
	$product .= "<" . $col_name . ">\n<![CDATA[" . $cell . "\n ]]></" . $col_name . ">\n";
	
	
	
	
	
	
	
	
	
	  if($col_name == 'topic' || $col_name == 'topic_en'  || $col_name == 'topic_cn' || $col_name == 'topic_th' || $col_name == 'topic_jp' || $col_name == 'topic_kr' || $col_name == 'topic_ru' || $col_name == 'headline' || $col_name == 'headline_en'  || $col_name == 'headline_cn' || $col_name == 'headline_th' || $col_name == 'headline_jp' || $col_name == 'headline_kr' || $col_name == 'headline_ru' || $col_name == 'detail_en'  || $col_name == 'detail_cn' || $col_name == 'detail_th' || $col_name == 'detail_jp' || $col_name == 'detail_kr' || $col_name == 'detail_ru'){
	  $product2 .= "<" . $col_name . ">\n<![CDATA[" . $cell . "\n ]]></" . $col_name . ">\n";	
  

	
}else{
  $product2 .= "<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";
}
	
	
	
	
	
	
	
 	
    $i++;
  }

$product .= "</product>\n";

@unlink("../data_file/xml/product/id_full/".$arr[project][id].".xml");
@$fd = @fopen("../data_file/xml/product/id_full/".$arr[project][id].".xml", "a+");
@fputs($fd, $product . "\n\n");
@fclose($fd);

//$db->closedb ();

 
}


?>
 