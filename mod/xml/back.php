
<?php
$xml=simplexml_load_file("../data_file/xml/product/type/tour.xml") or die("Error: Cannot create object");
echo $xml->province . "<br>";
echo $xml->product[3]->id . "<br>";
echo $xml->product[3]->topic_en . "<br>";
?>

 




		<select name="back_place" id="back_place" style="background-color:#FFFFFF;width:380px;"   class="chosen-select_place" >
<option value="0">--<?=place_enter_select;?>--</option>
    
<?php 
	$xml = new DOMDocument('1.0','utf-8'); 
	$xml->load( '../data_file/xml/product/type/tour.xml' );

	$root = $xml->getElementsByTagName( "root" ); 
	  
	foreach( $root as $child ) 
	{ 
	
	 
		// loop all hotel
			$std = $child->getElementsByTagName( "product" ); 

			foreach($std as $sid)
			{
			  
			foreach($sid->getElementsByTagName( "id" ) as $id)
			{
				foreach($sid->getElementsByTagName( "province" ) as $province)
			{
 
			foreach($sid->getElementsByTagName( "topic_en" ) as $topic_en)
			{
			foreach($sid->getElementsByTagName( "topic_cn" ) as $topic_cn)			
			{
			 foreach($sid->getElementsByTagName( "topic_th" ) as $topic_th)			
			{
			
			
			
			
			if($province->nodeValue==2){
 
			echo  "<option value=".$hotel_id->nodeValue."> ";
				echo  "".$topic_en->nodeValue."  (".$province_name->nodeValue." / ".$area_name->nodeValue.")</option> ";
 
 }
				
			
			
			
			
			}

		 
		 }
		 
		 }
		
		
		}
		
		}
	
	
	}
	
	} 
	 
?>
 