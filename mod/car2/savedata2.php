 <?

///// upload pic


if($_GET[action]=="add"){

$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
 
$next_increment     = 0;
$qShowStatus        = "SHOW TABLE STATUS LIKE 'web_carall'";
$qShowStatusResult  = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );
$row = mysql_fetch_assoc($qShowStatusResult);

$last_id = $row['Auto_increment'];
 

 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
   
  $db->add_db('web_carall', array(
 
 "drivername" => "$_POST[drivername]",
  "province" => "$_POST[province]",
 
 
 "car_type" => "$_POST[car_type]",
"car_brand" => "$_POST[car_brand]",
 "car_sub_brand" => "$_POST[car_model]",
 "car_color" => "$_POST[car_color]",
			 
  "car_num" => "$_POST[car_num]",
 "plate_num" => "$_POST[plate_num]",
  "plate_color" => "$_POST[plate_color]",
  "post_date" => "" . TIMESTAMP . "",
  "update_date" => "" . TIMESTAMP . ""
        ));
        $db->closedb();
		
 
/// $params['id'] = $last_id;		



///// up photo
 

@copy ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_1.jpg", "../data/pic/car/".$last_id."_1.jpg" );   
@copy ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_2.jpg", "../data/pic/car/".$last_id."_2.jpg" );    
@copy ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_3.jpg", "../data/pic/car/".$last_id."_3.jpg" );  
	
 
@unlink ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_1.jpg" ); 
@unlink ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_2.jpg" ); 
@ unlink ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_3.jpg" ); 
 
 
 ?>
 
 
 
 <? if($_GET[type]=='booking'){ ?>
 
 <script>
 
 $("#load_mod_popup_4" ).toggle();
 
 
  var url_load_car= "go.php?name=booking/load/booking&file=car";
  
    $("#show_car_detail").html(load_main_icon_big);
 
  $('#show_car_detail').load(url_load_car); 
 
 </script>
 
 
 <? } else {  ?>
 
 
 
 <script>
  setTimeout(function () {
 
 window.location.href = "index.php?name=car&file=all"; //will redirect to your blog page (an ex: blog.html)
}, 3000); //w
 
	</script>
    
    <? } ?>
    
<? } 

if($_GET[action]=="edit"){

$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
 
$next_increment     = 0;
$qShowStatus        = "SHOW TABLE STATUS LIKE 'web_carall'";
$qShowStatusResult  = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );
$row = mysql_fetch_assoc($qShowStatusResult);

$last_id = $row['Auto_increment'];
 
 $id = $_GET[id];

 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
   
  $result = $db->update_db('web_carall', array(
 
 "drivername" => "$_POST[drivername]",
  "province" => "$_POST[province]",
 
 "car_type" => "$_POST[car_type]",
"car_brand" => "$_POST[car_brand]",
 "car_sub_brand" => "$_POST[car_model]",
 "car_color" => "$_POST[car_color]",
			 
  "car_num" => "$_POST[car_num]",
 "plate_num" => "$_POST[plate_num]",
  "plate_color" => "$_POST[plate_color]",
  "post_date" => "" . TIMESTAMP . "",
  "update_date" => "" . TIMESTAMP . ""
        ), " id='".$id."' ");
        $db->closedb();
		
 
/// $params['id'] = $last_id;		



///// up photo
 

@copy ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_1.jpg", "../data/pic/car/".$id."_1.jpg" );   
@copy ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_2.jpg", "../data/pic/car/".$id."_2.jpg" );    
@copy ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_3.jpg", "../data/pic/car/".$id."_3.jpg" );  
	
 
@unlink ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_1.jpg" ); 
@unlink ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_2.jpg" ); 
@ unlink ("../data/fileupload/store/car/".$_POST[check_code]."_id_car_3.jpg" ); 
 
echo $result;
    
} 

if($_GET[use_often]=="open"){
	 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('web_carall', array(	 	 
			  "status_usecar" => "1", 	 
            "update_date" => "" . TIMESTAMP . "",
		)," id='".$_GET[id]."' ");
		$db->closedb ();
		
}
if($_GET[use_often]=="close"){
	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('web_carall', array(	 	 
			  "status_usecar" => "0", 	 
            "update_date" => "" . TIMESTAMP . "",
		)," id='".$_GET[id]."' ");
		$db->closedb ();
}
?>
    
  <?
  
  	if($_GET[close]){
		
	 
 	
 
	  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('web_carall', array(
 
	 	 
			  "status" => "0", 
	 
 
            "update_date" => "" . TIMESTAMP . "",
		)," id='".$_GET[id]."' ");
		$db->closedb ();
		
		?>
		
        
        
<?  	if($_GET[close]==1){  ?>
        
		
 <script>
 
 
  var url_load_car= "go.php?name=booking/load/booking&file=car";
  
    $("#show_car_detail").html(load_main_icon_big);
 
 $('#show_car_detail').load(url_load_car); 
 
 </script>
 <? } ?>
 
 
 
 <?  	if($_GET[close]==2){  ?>
        
 <script>
 
 
 window.location.href = "index.php?name=car&file=all"; //will redirect to your blog page (an ex: blog.html)
 
 
	</script>
 <? } ?>
 
 
 
 


<?	}

  ?>

  <?
  
  	if($_GET[open]){
		
	 
 	
 
	  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('web_carall', array(
 
	 	 
			  "status" => "1", 
	 
 
            "update_date" => "" . TIMESTAMP . "",
		)," id='".$_GET[id]."' ");
		$db->closedb ();
		
		?>
		
        
        
<?  	if($_GET[open]==1){  ?>
        
		
 <script>
 
 
  var url_load_car= "go.php?name=booking/load/booking&file=car";
  
    $("#show_car_detail").html(load_main_icon_big);
 
 $('#show_car_detail').load(url_load_car); 
 
 </script>
 <? } ?>
 
 
 
 <?  	if($_GET[open]==2){  ?>
        
 <script>
 
 
 window.location.href = "index.php?name=car&file=all"; //will redirect to your blog page (an ex: blog.html)
 
 
	</script>
 <? } ?>
 
 
 
 


<?	}

	////
  
  ?>