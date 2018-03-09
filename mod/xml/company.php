<?

set_time_limit(30000000); 


$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT id,company,company_or,phone,name,contact_open,level,control_panel,email FROM ".TB_admin."   ");
while($arr[project] = $db->fetch($res[project])){
 
	
 
$product = ""
. "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n"
. "<companyname>\n";
 

  
  $i = 0;
  // cells
  foreach ($arr[project] as $cell) {
    // Escaping illegal characters - not tested actually ;)
 
    $col_name = mysql_field_name($res[project],$i);


if($col_name == 'company' || $col_name == 'name'  || $col_name == 'company_or' || $col_name == 'email' || $col_name == 'phone' ){
	$product .= "<" . $col_name . ">\n<![CDATA[" . $cell . "\n ]]></" . $col_name . ">\n";	
}else{
	$product .= "<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";
}
	



 	
    $i++;
  }

$product .= "</companyname>\n";

@unlink("../data_file/xml/company/id/".$arr[project][id].".xml");
@$fd = @fopen("../data_file/xml/company/id/".$arr[project][id].".xml", "a+");
@fputs($fd, $product . "\n\n");
@fclose($fd);

//$db->closedb ();

 
}


?>
 