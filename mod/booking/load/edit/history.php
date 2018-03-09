<br>

   <?  include ("css/maincss.php");?>
   
   

<script>
 $(".text-topic-action-mod-3" ).html("ประวัติการจัดการงาน");

</script>


 

<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="25%" align="center" bgcolor="#F6F6F6" class="font-24">เวลา</td>
      <td width="25%" align="center" bgcolor="#F6F6F6" class="font-24">จัดการ</td>
      <td width="25%" align="center" bgcolor="#F6F6F6" class="font-24">ประเภท</td>
      <td width="25%" align="center" bgcolor="#F6F6F6" class="font-24">สถานะ</td>
    </tr>
  </tbody>
</table>
 <?
 
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[project] = $db->select_query("SELECT * FROM history_edit  WHERE vc_id='".$_GET[id]."'  order by id desc");
while($arr[project] = $db->fetch($res[project])){ 



$res[name] = $db->select_query("SELECT * FROM   web_user  where id='".$arr[project][posted]."' order by id desc  ");
 
 $arr[name] = $db->fetch($res[name]);

 // $date_to= date("Y-m-d,$arr[project][post_date]");
	
 
	$today = date('Y-m-d',$arr[project][post_date]); 
	
	$today_time = date('H:i:s',$arr[project][post_date]); 
	
	
	if($arr[project][type]=='checkin'){
	 
	$type='ส่งแขก';	
	}
	
		if($arr[project][type]=='register'){
	 
	$type='ลงทะเบียน';	
	}
	
	
			if($arr[project][type]=='payment'){
	 
	$type='จ่ายเงิน';	
	}
	
	
  $bgcolor = ($i++ & 1) ? '#FFFFFF' : '#FFFDE9'; 
	
  
  ?> 
 
  
  <div style="background-color:<?=$bgcolor?>">
  
  
  
  <table width="100%" border="0" cellspacing="2" cellpadding="2"  >
  <tbody>
    <tr>
      <td width="25%" height="30" align="center" class="font-24"><? //=$today?> <b>
<?=$today_time?></td>
      <td width="25%" align="center" ><?=$arr[name][username]?></td>
      <td width="25%" align="center"><?=$type?></td>
      <td width="25%" align="center"><?=$arr[project][status]?></td>
    </tr>
  </tbody>
</table>

  

          </div>
          
          
       
<? } ?>
          
          