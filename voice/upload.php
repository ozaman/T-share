<?php
/**
 * Request has Base64 Data
 * -----------------------
 * $_POST['audio'] is the Base64 encoded value of audio (WAV/MP3)
 */
if(isset($_POST['audio'])){
  $audio = base64_decode($_POST['audio']);
  
  echo $audio;
}

/**
 * Request has BLOB Data
 * ---------------------
 */
if(isset($_FILES['file'])){
  $audio = file_get_contents($_FILES['file']['tmp_name']);
  
  $tempFile = $_FILES['file']['tmp_name'];
 @copy ($tempFile , "111.mp3" );
  
}
