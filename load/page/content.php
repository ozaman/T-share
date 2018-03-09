 
 


<div id="check_data_update" style="display:none"></div>

<div id="check_sound_alert" > <?  include "mod/load/update/sound.php" ;?></div>

 
	 
<script>
 var url_check_data_update = "go.php?name=load/update&file=data";
 $('#check_data_update').load(url_check_data_update);

 setInterval(function() {
 var url_check_data_update = "go.php?name=load/update&file=data";
 $('#check_data_update').load(url_check_data_update);


}, 60000); // 60000 milliseconds = one minute

	</script>
	<script>
 setInterval(function() {
 var url_check_data_time = "load_blank.php?name=load/update&file=time&driver=<?=$user_id?>";
 url_check_data_time =url_check_data_time+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_check_data_time =url_check_data_time+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
  
 $('#load_data_time').load(url_check_data_time);
 
  
}, 1000); // 60000 milliseconds = one minute
 
	</script>
	
	
	 
 

 <div > 
 
     
 
 
 <script>
$('#menu_<?=$_GET[name]?>').addClass("");
</script>
		
		
<?  if(!$_GET[name]){
$topic="หน้าแรก";
$topicicon="fa  fa-home";
 ?> <script>$('#menu_home').addClass("active"); </script><? }?>
 
 
<?  if($_GET[name] == 'today' or $_GET[name] == 'lab'){
$topic="งานวันนี้";
$topicicon="fa  fa-clock-o";
?> <script>$('#menu_<?=$_GET[name]?>').addClass("treeview active"); </script><? }?>




<?  if($_GET[name] == 'all'){
$topic="งานทั้งหมด";
$topicicon="fa fa-calendar-o";
 ?> <script>$('#menu_<?=$_GET[name]?>').addClass("active"); </script><? }?>
 
 <?  if($_GET[name] == 'checkcar'){
$topic="จัดการรถ";
$topicicon="fa fa-cogs";
 ?> <script>$('#menu_<?=$_GET[name]?>').addClass("active"); </script><? }?>
 
 
<?  if($_GET[name] == 'view'){
$topic="การจัดการงาน";
$topicicon="fa  fa-automobile";
}
?>
<?  if($_GET[name] == 'timeline'){
$topic="ลำดับเวลาการเดินรถ";
$topicicon="fa fa-dashboard";
}
?>

<?  if($_GET[name] == 'booking'){
$topic="ประวัติส่งแขก";
$topicicon="fa fa-user";
}
?>



<?  if($_GET[name] == 'booking/account'){
$topic="ค่าจอด ค่าหัว";
$topicicon="fa fa-user";
}
?>


<?  if($_GET[name] == 'register'){
$topic="เพื่อนรว่มงาน";
$topicicon="fa fa-car";
}
?>

 

<?  if($_GET[name] == 'user'){
$topic="ข้อมูลผู้ใช้งาน";
$topicicon="fa fa-user";
 

?>

 





		<script>
$('#menu_<?=$_GET[name]?>').addClass("treeview active");
  		</script>
 <? } ?>
 
 <?  if($_GET[name] == 'phone'){
$topic="เบอร์โทรศัพท์";
$topicicon="fa fa-phone";
?>
		<script>
$('#menu_<?=$_GET[name]?>').addClass("treeview active");
  		</script>
 <? } ?>



<?  if($_GET[name] == 'chat'){
$topic="ห้องสนทนา";
$topicicon="fa fa-comments";
}
?>




<?  if($_GET[name] == 'pay'){
$topic="บัญชี การเงิน";
$topicicon="fa fa-recycle";
 ?> <script>$('#menu_<?=$_GET[name]?>').addClass("active"); </script><? }?><style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style>
 
 
 <ol class="breadcrumb" >	   
        <li style="padding-top:0px;border-radius: 5px; margin-left: -5px;  margin-top:-10px;  "> <a href="index.php" style="color:#666666" ><i class="fa fa-home"></i><font  class="font-22">&nbsp;หน้าแรก</a></li>
        <span><font  class="font-22">&nbsp;|&nbsp;<a href="?name=<?=$_GET[name]?>"  style="color:#666666"><?=$topic?>&nbsp;</a></span>
		
		<?  if($_GET[name] == '5user'){ ?>
		
        <li class="active"><?=$arr[web_user][name];?><? //=date('Y-m-d');?></li>
		
		<? } ?>
		
   </ol>
 

 
<script src="js/talk.js"></script>  
 <?  if($_GET[newlogin]==1){  ?>
 <div style="display:none" >
<a id="auto_play_welcome"  onclick="responsiveVoice.speak('ยินดีต้อนรับคุณ <? echo $data_driver_name;?> เข้าสู่ระบบทีบุ๊กกิ้งค่ะ', 'Thai Female', {rate: 1.0});" >Test Sound</a> 

<script>
$( document ).ready(function() {


setTimeout(function () {

 $("#play_welcome").click();
 

}, 1000);  
});

   </script>
</div>
 
 <? } ?>
 <?  if(1==1){ echo "";} else {?>
	 
	   <h1 class="backpage" style="margin-top:10px; margin-bottom:-10px; border-radius: 5px; background-color:<?=$main_color?> " >
	 
	  
<a href="javascript:window.history.back();;"> <i class="fa fa-chevron-circle-left"  style="font-size:22px; color:#FFFFFF "></i><b  style="font-size:22px; color:#FFFFFF"> ย้อนกลับหน้าที่แล้ว</b></a>
  
      </h1>  
<? } ?>
    </section>
	
</div>
 
