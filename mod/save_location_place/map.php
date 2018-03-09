<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <?php
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT id,address,map,topic_en,topic_th,topic_cn FROM shopping_product");

 while($arr[project] = $db->fetch($res[project])) {
	 	$address = $arr[project][address];
	 	$place = $arr[project][topic_en];
	 	
	 	if($place==""){
			$place = $address;
		}
	 	
	 	$prepAddr = str_replace(' ','',$address);
//        echo $address;
		$url = "http://maps.google.com/maps/api/geocode/json?address=".$prepAddr."&sensor=false";
//		$url = "https://maps.google.com/maps/api/geocode/json?latlng=".$arr[project][latitude].",".$arr[project][longitude]."&sensor=false";
		/*$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		$response_a = json_decode($response);*/
		
			
		echo $arr[project][id]." : ".$prepAddr;
 		echo "<br/>";
	
		$mystring = 'abc';
$findme   = 'a';
$pos = strpos($mystring, $findme);
echo 
		 } ?>
	
    


    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90">
    </script>
