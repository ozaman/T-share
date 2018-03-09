<?

set_time_limit(30000000); 


$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT type FROM ".TB_order." limit 1 ");
while($arr[project] = $db->fetch($res[project])){
 
 $db->connectdb(DB_NAME_HIS,DB_USERNAME_HIS,DB_PASSWORD_HIS);
	$db->add_db(TB_box,array(
 
  // cells
  foreach ($arr[project] as $cell) {
    // Escaping illegal characters - not tested actually ;)
 
    $col_name = mysql_field_name($res[project],$i);
    // creates the "<tag>contents</tag>" representing the column
  // $product .= "<".$col_name.">".$cell."</".$col_name.">\n";
 
	
	//"$col_name"=>"".date('Y-m-d')."",
 	
    $i++;
  }

 





/*

@unlink("../data_file/xml/vc/id/".$arr[project][id].".xml");
@$fd = @fopen("../data_file/xml/vc/id/".$arr[project][id].".xml", "a+");
@fputs($fd, $product . "\n\n");
@fclose($fd);
*/

//$db->closedb ();

 			"enable_comment"=>"0"
		));
}

//echo $product;
?>
 