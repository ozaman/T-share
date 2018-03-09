<?php header ('Content-type: text/html; charset=utf-8'); 
/// http://api.openweathermap.org/data/2.5/forecast?q=London,usl&appid=bd6dff37361a698baa6f942492911865&units=metric&cnt=7&lang=en
 ?>
  <?php

//units=For temperature in Celsius use units=metric
//5128638 is new york ID

$url = "http://api.openweathermap.org/data/2.5/weather?id=5128638&lang=en&units=metric&APPID=bd6dff37361a698baa6f942492911865&q=phuket5";


$contents = file_get_contents($url);
$clima=json_decode($contents);

$temp_max=$clima->main->temp_max;
$temp_min=$clima->main->temp_min;
$icon=$clima->weather[0]->icon.".png";
//how get today date time PHP :P
$today = date("F j, Y, g:i a");
$cityname = $clima->name; 

echo $cityname . " - " .$today . "<br>";
echo "อุณหภูมิสูงสุด: " . $temp_max ."&deg;C<br>";
echo "Temp Min: " . $temp_min ."&deg;C<br>";
echo "<img src='http://openweathermap.org/img/w/" . $icon ."'/ >";

?>
<?php
     $apiKey = 'AIzaSyAcTSB6t3VJpbMLKjJGIT4M0aTer2VEHb8';
     $text = 'Hello world!';
     $url = 'https://www.googleapis.com/language/translate/v2?key=';
     $url .= $apiKey . '&q=' . rawurlencode($text)  . '&source=en&target=th';       
  
    
     $handle = curl_init($url);
     curl_setopt($handle, CURLOPT_RETURNTRANSFER, true); 
     $response = curl_exec($handle);                 
     $responseDecoded = json_decode($response, true);  
  
     curl_close($handle);      echo 'Source: ' . $text . '<br>';
     echo 'Translation: ' . $responseDecoded['data']['translations'][0]['translatedText']; 
  
?>