<?

 set_time_limit(30000000); 


$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT id,topic,phone,aum,pro,amphur,province,transferplace_type FROM ".TB_transferplace." order by id asc ");
while($arr[project] = $db->fetch($res[project])){
 
 
 

$product = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<place>\n";
 

 

  $i = 0;
  // cells
  foreach ($arr[project] as $cell) {
    // Escaping illegal characters - not tested actually ;)
 
    $col_name = mysql_field_name($res[project],$i);
    // creates the "<tag>contents</tag>" representing the column
  // $product .= "<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";

if($col_name == 'topic' || $col_name == 'province'  || $col_name == 'aumphur' || $col_name == 'phone' || $col_name == 'address'){
	$product .= "<" . $col_name . "><![CDATA[". $cell."]]></".$col_name.">\n";	
}else{
	$product .= "<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";
}
 
 	
    $i++;
  }

$product .= "</place>\n";


@unlink("../data_file/xml/transferplace/id/".$arr[project][id].".xml");
@$fd = @fopen("../data_file/xml/transferplace/id/".$arr[project][id].".xml", "a+");
@fputs($fd, $product . "\n\n");
@fclose($fd);




}
 

///$db->closedb ();
?>