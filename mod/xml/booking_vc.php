<?

set_time_limit(30000000); 


$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM ".TB_order." where id > 100000 ");
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
  // $product .= "<".$col_name.">".$cell."</".$col_name.">\n";
  
  if($col_name=='remark' or $col_name=='acc_remark' or $col_name=='sub_remark'){
	
	$product .= "<".$col_name."><![CDATA[".$cell."]]></".$col_name.">\n";
	}
	else {	
	$product .= "<".$col_name.">".$cell."</".$col_name.">\n";
 	}
	
	
 	
    $i++;
  }

$product .= "</vc>\n";

@unlink("../data_file/xml/booking_vc/".$arr[project][id].".xml");
@$fd = @fopen("../data_file/xml/booking_vc/".$arr[project][id].".xml", "a+");
@fputs($fd, $product . "\n\n");
@fclose($fd);

//$db->closedb ();

 
}


?>
 