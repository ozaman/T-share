<?

set_time_limit(30000000); 

unlink("../data_file/xml/company/all/supplier.xml");


$product1 .= "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";	
$product1 .= "<root>\n";

@$fd = @fopen("../data_file/xml/company/all/supplier.xml", "a+");
@fputs($fd,  $product1 . "\n\n");
@fclose($fd);

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
//$res[project] = $db->select_query("SELECT id,company,company_or,phone,name,contact_open,level,control_panel,email FROM ".TB_admin." where level=4");
$res[project] = $db->select_query("SELECT id,company,company_cn FROM ".TB_admin." where level=4 order by company  ");

while($arr[project] = $db->fetch($res[project])){
 
	
 
$product2 .= "<companyname>\n";
 

  
  $i = 0;
  // cells
  foreach ($arr[project] as $cell) {
    // Escaping illegal characters - not tested actually ;)
 
    $col_name = mysql_field_name($res[project],$i);


if($col_name == 'company'  or $col_name == 'company_cn' ){
	$product2 .= "<" . $col_name . ">\n<![CDATA[" . $cell . "\n ]]></" . $col_name . ">\n";	
}else{
	$product2 .= "<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";
}
	



 	
    $i++;
  }

$product2 .= "</companyname>\n";



//$db->closedb ();

 
}


//@unlink("../data_file/xml/company/id/".$arr[project][id].".xml");
@$fd = @fopen("../data_file/xml/company/all/supplier.xml", "a+");
@fputs($fd, $product2 . "\n\n");
@fclose($fd);


$product3 .= "</root>\n";
@$fd = @fopen("../data_file/xml/company/all/supplier.xml", "a+");
@fputs($fd, $product3 . "\n\n");
@fclose($fd);	
	 	
 
 



?>
 