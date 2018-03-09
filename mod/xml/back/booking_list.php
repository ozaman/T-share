<?

set_time_limit(30000000); 


$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM ".TB_book_agent."  limit 1");
while($arr[project] = $db->fetch($res[project])){
 
	
 
$product = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<vc>\n";
 
 
  $i = 0;
  // cells
  foreach ($arr[project] as $cell) {
    // Escaping illegal characters - not tested actually ;)
 
    $col_name = mysql_field_name($res[project],$i);
    // creates the "<tag>contents</tag>" representing the column
  // $product .= "<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";
 
	$product .= "arr[vc][".$col_name."]= $.load->getElementsByTagName( '".$col_name."' )->item(0)->nodeValue;<br>";
 	
    $i++;
  }

$product .= "</vc>\n";

echo $product;

/*
@unlink("../data_file/xml/booking_vc/".$arr[project][id].".xml");
@$fd = @fopen("../data_file/xml/booking_vc/".$arr[project][id].".xml", "a+");
@fputs($fd, $product . "\n\n");
@fclose($fd);
*/
//$db->closedb ();

 
}


?>
 