<style>
.topicname-user{ 
	padding-top:10px; 
	padding-left: 0px; 
	padding-bottom:5px; 
	color: #333333 ; 
	text-align:left; 
	margin:0px;  
}
</style>
<?php 
 function findDiffDate($date1,$date2){
	$diff = abs(strtotime($date2) - strtotime($date1));
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	$txt_diff = "";
	if($years>0){
		$txt_diff .= $years." ปี ";
	}
	if($months>0){
		$txt_diff .= $months." เดือน ";
	}
	if($days>0){
		$txt_diff .= $days." วัน ";
	}
	return $txt_diff;
 }
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[dv_data] = $db->select_query("SELECT * FROM web_driver where id = '".$_POST[id]."' ");
$arr[dv_data] = $db->fetch($res[dv_data]);
$coldata="col-md-6";
$d1 = "2018-03-24";
$d2 = date('Y-m-d',$arr[dv_data][post_date]);
?>
<div style="">
	<span><strong>อายุการใช้งาน</strong> : <?=findDiffDate($d1,$d2);?></span>
	<div  align="center">
   <img src="../data/pic/driver/small/default-avatar.jpg" id="img_tag" alt="Preview Image" width="150px" style="border: 2px solid #ddd;border-radius: 4px;padding: 0px;margin: 10px;">
   </div>
   <div class="<?= $coldata?>">
               <div class="topicname-user font-22"><?=t_password;?></div>
               <input disabled  class="form-control font-22" type="text" name="password" id="password"  style="background-color:#eee;"   value="<?=$arr[dv_data][password];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user font-22 text-cap"><?=t_name_last_name_thai;?></div>
               <input disabled class="form-control font-22" type="text" name="name" id="name"  style="background-color:#eee;"   value="<?=$arr[dv_data][name];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user font-22 text-cap"><?=t_name_last_name_english;?></div>
               <input disabled class="form-control font-22" type="text" name="name_en" id="name_en"  style="background-color:#eee;"   value="<?=$arr[dv_data][name_en];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user font-22"><?=t_nick_name;?></div>
               <input disabled class="form-control font-22" type="text" name="nickname" id="nickname"  style="background-color:#eee;"   value="<?=$arr[dv_data][nickname];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user font-22"><?=t_identity_card_number;?></div>
               <input disabled class="form-control font-22" type="text" name="idcard" id="idcard"  style="background-color:#eee;"   value="<?=$arr[dv_data][idcard];?>" >
               
               <button style="position: absolute;right: 15px;top: 38px;border-radius: 0px;" class="btn btn-info" onclick="viewDocument(<?=$arr[dv_data][id];?>,'idcard','<?=$arr[dv_data][idcard];?>');">
               <?=t_files;?></button>
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user font-22"><?=t_driver_license_number;?></div>
               <input disabled class="form-control font-22" type="text" name="iddriving" id="iddriving"  style="background-color:#eee;"   value="<?=$arr[dv_data][iddriving];?>" >
               
               <button style="position: absolute;right: 15px;top: 38px;border-radius: 0px;" class="btn btn-info" onclick="viewDocument(<?=$arr[dv_data][id];?>,'iddriving','<?=$arr[dv_data][iddriving];?>');">
               <?=t_files;?></button>
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user font-22"><?=t_address;?></div>
               <input disabled class="form-control font-22" type="text" name="address" id="address"  style="background-color:#eee;"   value="<?=$arr[dv_data][address];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user font-22"><?=t_phone_number;?></div>
               <input disabled class="form-control font-22" type="number" name="phone" id="phone"  style="background-color:#eee;"   value="<?=$arr[dv_data][phone];?>" >
            </div>
            <div class="<?= $coldata?>">
               <div class="topicname-user font-22"><?=t_emergency_telephone_numbers;?></div>
               <input disabled class="form-control font-22" type="number" name="contact" id="contact"  style="background-color:#eee;"  value="<?=$arr[dv_data][contact];?>"  >
            </div>

</div>



<script>
	var url_img =  "../data/pic/driver/small/<?=$arr[dv_data][username];?>.jpg";
   $.ajax({
                             url: url_img,
                             type: 'HEAD',
                             error: function() {
                                 console.log('Error file');
                             },
                             success: function() {
                              	console.log('Success file');
                              	$('#img_tag').attr('src',url_img);
                             }
                         });
</script>