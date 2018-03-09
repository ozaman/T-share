 <?php header ('Content-type: text/html; charset=utf-8'); ?>
 
 
<?
 
 
 $db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD); 
$allday= $db->num_rows('product_price_list',"id","transfer_date BETWEEN  '".$date_start."' and '".$date_finish."'"); 

$res[report] = $db->select_query("SELECT *  FROM  shopping_product   ");

while($arr[report] = $db->fetch($res[report])){
 
 echo $arr[report] [invoice];
 echo "<br>";
 
 ////// ไม่มีให้เพิ่ม
 if($sumallth<1){ 
 

    $db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
    $db->add_db('product_price_list_all',array( 
 
  
		
	 
		 		
		"post_date"=>"".$arr[report][post_date]."",
        "posted"=>"".$arr[report][posted]."",
        "update_date"=>"".TIMESTAMP.""
      ));
      echo "no data<br>";
}

 
}
 $db->closedb ();

 
?>