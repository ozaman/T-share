<?
 
set_time_limit(30000000); 


 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM ".TB_driver." limit 1 ");
while($arr[project] = $db->fetch($res[project])){
 
	
 
$product = ""
. "<?\n";
 
 

 

  $i = 0;
  // cells
  foreach ($arr[project] as $cell) {
    // Escaping illegal characters - not tested actually ;)
 
    $col_name = mysql_field_name($res[project],$i);
    // creates the "<tag>contents</tag>" representing the column
 
 
 
//$product .= "<". $col_name.">".$cell."</".$col_name.">\n";
	
$product .= "@arr[web_user][". $col_name."]=@load->getElementsByTagName('". $col_name."')->item(0)->nodeValue;\n";
 
	
	
	
 	
    $i++;
  }

$product .= "?>\n";

@unlink("$folder_xml/driver/".$arr[project][id]."_".$arr[project][username].".php");
@$fd = @fopen("$folder_xml/driver/".$arr[project][id]."_".$arr[project][username].".php", "a+");
@fputs($fd, $product . "\n\n");
@fclose($fd);


//$db->closedb ();

 
}


?>
 