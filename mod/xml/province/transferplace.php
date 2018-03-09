<?



set_time_limit(30000000); 




$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

		
$res[nextid] = $db->select_query("SELECT * FROM web_province where id  > ".$_GET["id"]." limit 1");
$arr[nextid] = $db->fetch($res[nextid]);
$nextid= $arr[nextid][id];	





 // unlink("../data_file/xml/product/type/tour.xml");

if ($_GET["id"] < $nextid){
echo " == waitting"."<br />";
echo "<meta http-equiv=refresh content=3;URL=?name=admin/xml/province&file=transferplace&id=".$nextid." >";

}

if (!$_GET["id"]){
echo " == waitting"."<br />";
echo "<meta http-equiv=refresh content=3;URL=?name=admin/xml/province&file=transferplace&id=1 >";

}



@unlink("../data_file/xml/transferplace/province/".$_GET["id"].".xml");

  

$product1 .= "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";	
$product1 .= "<root>\n";

@$fd = @fopen("../data_file/xml/transferplace/province/".$_GET["id"].".xml", "a+");
@fputs($fd,  $product1 . "\n\n");
@fclose($fd);

 



$res[type] = $db->select_query("SELECT * FROM web_province where id=".$_GET["id"]."  ");
while($arr[type] = $db->fetch($res[type])){
 

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro=".$_GET["id"]." and status=1 ORDER BY CONVERT(topic USING TIS620) asc");
while($arr[project] = $db->fetch($res[project])){
 
 
 

$product2 .= "<place>\n";

 

  $i = 0;
  // cells
  foreach ($arr[project] as $cell) {
    // Escaping illegal characters - not tested actually ;)
 
    $col_name = mysql_field_name($res[project],$i);
    // creates the "<tag>contents</tag>" representing the column
  // $product .= "<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";

if($col_name == 'topic' || $col_name == 'province'  || $col_name == 'amphur' || $col_name == 'phone' || $col_name == 'address'){
	$product2 .= "<" . $col_name . ">\n<![CDATA[" . $cell . "\n ]]></" . $col_name . ">\n";	
}else{
	$product2 .= "<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";
}
	



 	
    $i++;
  }

$product2 .= "</place>\n";
 

}


@$fd = @fopen("../data_file/xml/transferplace/province/".$_GET["id"].".xml", "a+");
@fputs($fd, $product2 . "\n\n");
@fclose($fd);

  
$product3 .= "</root>\n";

@$fd = @fopen("../data_file/xml/transferplace/province/".$_GET["id"].".xml", "a+");
@fputs($fd, $product3 . "\n\n");
@fclose($fd);	
	 	



}


 

///$db->closedb ();
?>