<?
 
set_time_limit(30000000); 
 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM ".TB_book_agent." ");
while($arr[project] = $db->fetch($res[project])){
 
	
 
$product = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<booking>\n";
 

 

  $i = 0;
  // cells
  foreach ($arr[project] as $cell) {
    // Escaping illegal characters - not tested actually ;)
 
    $col_name = mysql_field_name($res[project],$i);
    // creates the "<tag>contents</tag>" representing the column
 
 
 	 
if($col_name == 'remark' || $col_name == 'guest'  || $col_name == 'hoteldetail' || $col_name == 'hoteldetail2'  || $col_name == 'hoteldetail3' ){
	$product .= "<" . $col_name . ">\n<![CDATA[" . $cell . "\n ]]></" . $col_name . ">\n";	
}else{
	$product .= "<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";
}
	
	
	
 	
    $i++;
  }

$product .= "</booking>\n";

@unlink("../data_file/xml/booking/id/".$arr[project][id].".xml");
@$fd = @fopen("../data_file/xml/booking/id/".$arr[project][id].".xml", "a+");
@fputs($fd, $product . "\n\n");
@fclose($fd);

//$db->closedb ();

 
}


?>
 