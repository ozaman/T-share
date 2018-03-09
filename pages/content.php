
 
 
 
  		<script>
$('#menu_<?=$_GET[name]?>').addClass("");
  		</script>
		
		
<?  if(!$_GET[name]){
$topic="หน้าแรก";
$topicicon="fa  fa-home";
 ?> <script>$('#menu_home').addClass("active"); </script><? }?>
 
 
<?  if($_GET[name] == 'today'){
$topic="งานวันนี้";
$topicicon="fa  fa-automobile";
?> <script>$('#menu_<?=$_GET[name]?>').addClass("treeview active"); </script><? }?>




<?  if($_GET[name] == 'all'){
$topic="งานทั้งหมด";
$topicicon="fa fa-calendar-o";
 ?> <script>$('#menu_<?=$_GET[name]?>').addClass("active"); </script><? }?>
 
 
<?  if($_GET[name] == 'view'){
$topic="การจัดการ";
$topicicon="fa  fa-automobile";
}
?>
<?  if($_GET[name] == 'timeline'){
$topic="ลำดับเวลาการเดินรถ";
$topicicon="fa fa-dashboard";
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



<?  if($_GET[name] == 'pay'){
$topic="บัญชี การเงิน";
$topicicon="fa fa-recycle";
 ?> <script>$('#menu_<?=$_GET[name]?>').addClass("active"); </script><? }?>
 

<h1 style="font-family:Arial, Helvetica, sans-serif;background-color:#FFFFFF; padding:5px; padding-right:10px; border-bottom: solid 1px #999999; box-shadow: 0 0 5px 3px #E8E6E6; font-size:22px     " >
       <i class="<?=$topicicon?>"></i><b> <?=$topic?></b>
       
      </h1> 

      <ol class="breadcrumb"   >
	   
        <li style="padding-top:5px;"> <a href="index.php"><i class="fa fa-home"></i>หน้าแรก</a></li>
        <li><a href="?name=<?=$_GET[name]?>"><?=$topic?>&nbsp;</a></li>
		
		<?  if($_GET[name] == '5user'){ ?>
		
        <li class="active"><?=$arr[web_user][name];?><? //=date('Y-m-d');?></li>
		
		<? } ?>
		
      </ol>
	   <h1 style="font-family:Arial, Helvetica, sans-serif;background-color: <?=$main_color?>; padding:5px; padding-top:10px; margin-top:10px; margin-left: 0px;  padding-right:10px; border-bottom: solid 2px #FFFFFF; box-shadow: 0 0 5px 3px #E8E6E6;   " >
	 
<a href="javascript:history.back();"> <i class="fa fa-chevron-circle-left"  style="font-size:22px; color:#FFFFFF "></i><b  style="font-size:22px; color:#FFFFFF"> ย้อนกลับหน้าที่แล้ว</b></a>
  
      </h1>  

    </section>
	
	</div>
	