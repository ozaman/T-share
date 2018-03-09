<?

set_time_limit(30000000); 




$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

		
$res[nextid] = $db->select_query("SELECT * FROM web_type_product_old where id  > ".$_GET["id"]." limit 1");
$arr[nextid] = $db->fetch($res[nextid]);
$nextid= $arr[nextid][id];	





 // unlink("../data_file/xml/product/type/tour.xml");

if ($_GET["id"] < $nextid){
echo " == waitting"."<br />";
echo "<meta http-equiv=refresh content=5;URL=?name=admin/xml/type&file=product&id=".$nextid." >";

}

if (!$_GET["id"]){
echo " == waitting"."<br />";
echo "<meta http-equiv=refresh content=5;URL=?name=admin/xml/type&file=product&id=1 >";

}











$res[type] = $db->select_query("SELECT * FROM web_type_product_old where id=".$_GET["id"]."  ");
while($arr[type] = $db->fetch($res[type])){
///////////////////////////////
// $product1=$arr[type][id]+100;
 
// $product2=$arr[type][id]+1000;
  
  $product3=$arr[type][id]+10000;

   
@unlink("../data_file/xml/product/type/".$arr[type][type].".xml");

@$fd = @fopen("../data_file/xml/product/type/".$arr[type][type].".xml", "a+");


$product1 .= "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n";	
$product1 .= "<root>\n";

@$fd = @fopen("../data_file/xml/product/type/".$arr[type][type].".xml", "a+");
@fputs($fd,  $product1 . "\n\n");
@fclose($fd);


/////////////

$res[project] = $db->select_query("SELECT id,topic_en,topic_cn,topic_th,company,code,type,province,status FROM ".TB_product."  where type='".$arr[type][title]."'  ");
while($arr[project] = $db->fetch($res[project])){
 
	
	
 $product2 .= "<product>\n";
 
  // $product2 .= "<name>".$arr[project][id]."</name>\n";
   


 
  $i = 0;
  // cells
  foreach ($arr[project] as $cell) {
    // Escaping illegal characters - not tested actually ;)
 
    $col_name = mysql_field_name($res[project],$i);
    // creates the "<tag>contents</tag>" representing the column
  // $product .= "<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";
  
  if($col_name == 'id' || $col_name == 'company'  || $col_name == 'province' || $col_name == 'code'){
  
  $product2 .= "<" . $col_name . ">" . $cell . "</" . $col_name . ">\n";
	
}else{
$product2 .= "<" . $col_name . ">\n<![CDATA[" . $cell . "\n ]]></" . $col_name . ">\n";	
}
 
 	
    $i++;
	
  }
 
  
  
  
/////////////
    $product2 .= "</product>\n";

//$db->closedb ();

 
}


 
 
 
 
@$fd = @fopen("../data_file/xml/product/type/".$arr[type][type].".xml", "a+");
@fputs($fd, $product2 . "\n\n");
@fclose($fd);

 
 


$product3 .= "</root>\n";

@$fd = @fopen("../data_file/xml/product/type/".$arr[type][type].".xml", "a+");
@fputs($fd, $product3 . "\n\n");
@fclose($fd);	
	 	
 
}




 
		 


?>
 
 