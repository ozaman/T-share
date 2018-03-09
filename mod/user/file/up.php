<?php
$tempFile = $_FILES['Filedata']['tmp_name'];
 @copy ($tempFile , "../admin/file/driver/".$_POST[folder]."/".$_POST[name].".jpg" );

$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD); 
if($_POST[type]=="line"){
            $db->update_db(TB_driver, array(
 			"pic_qr_line" => 1				 
            ), " id=".$_POST[driver]." ");
			}
if($_POST[type]=="wechat"){
            $db->update_db(TB_driver, array(
 			"pic_qr_wechat" => 1				 
            ), " id=".$_POST[driver]." ");
			}
 



/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/uploads'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}

 
?>
