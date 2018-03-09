


<? if($_GET[type]=='driver'){?>

<?

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD); 
 $res[drivername] = $db->select_query("SELECT id,nickname,post_date FROM ".TB_driver." WHERE id='".$_GET[dvnew]."' ");
 $arr[drivername] = $db->fetch($res[drivername]);

?>
<script>
document.getElementById('change_drivername<?=$_GET[id];?>').value = '<?=$_GET[dvnew];?>' ;

</script>

<div class="alert alert-danger alert-dismissible" style="color:#FF0000; font-size:18px; margin-bottom:-5px; padding:5px; margin-left:1px;"><li class="fa fa-warning"></li>&nbsp;&nbsp;สลับงานไปยัง&nbsp;<font color="#FFFF99"><?=$arr[drivername] [nickname]?></font></div>

<script>
 
 $('#edit_<?=$_GET[id];?>').addClass("btn-editwork-active");
 $('#edit_<?=$_GET[id];?>').attr('disabled', false);
</script>

<? if($_GET[dvold]==$_GET[dvnew]){ ?>
<script>
$('#load_driver<?=$_GET[id];?>').hide();
</script>
<? } ?>

<? } ?>


<? if($_GET[type]=='car'){?>
<?
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD); 
 $res[newcarno] = $db->select_query("SELECT * FROM  transfer_report_all  where id='".$_GET[carnew]."' ");
 $arr[newcarno] = $db->fetch($res[newcarno]);

?>
<script>
document.getElementById('change_carno<?=$_GET[id];?>').value = '<?=$arr[newcarno][carno];?>' ;
document.getElementById('change_drivername<?=$_GET[id];?>').value = '<?=$arr[newcarno][drivername];?>' ;

</script>
 
<div class="alert alert-danger alert-dismissible" style="color:#FF0000; font-size:18px; margin-bottom:-10px;  margin-left:0px; padding:5px; m"><li class="fa fa-warning"></li>&nbsp;&nbsp;สลับแขกไปยัง <font color="#FFFF99"><?=$_GET[part]?>&nbsp;<?=$arr[newcarno][carno];?></div>
<script>
 
 $('#edit_<?=$_GET[id];?>').addClass("btn-editwork-active");
 $('#edit_<?=$_GET[id];?>').attr('disabled', false);
</script>

<?


 

 if($_GET[carold]==$_GET[carnew]){ ?>
<script>
$('#load_carno<?=$_GET[id];?>').hide();
 $('#edit_<?=$_GET[id];?>').addClass("btn-editwork");
</script>
<? } ?>

<? } ?>




<? if($_GET[type]=='complete'){?>

<? if($_GET[work] =='driver'){ ?>
<?
//$_GET[dvold];
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD); 

$res[name] = $db->select_query("SELECT id,nickname,post_date,company FROM ".TB_driver." WHERE id='".$_GET[dvold]."' ");
$arr[name] = $db->fetch($res[name]);
$arr[name][nickname];

$res[company] = $db->select_query("SELECT company FROM ".TB_admin." WHERE id='".$arr[name][company]."' ");
$arr[company] = $db->fetch($res[company]);


$res[drivernamenew] = $db->select_query("SELECT id,nickname,post_date,company FROM ".TB_driver." WHERE id='".$_GET[dvnew]."' ");
$arr[drivernamenew] = $db->fetch($res[drivernamenew]);

$res[companynew] = $db->select_query("SELECT company FROM ".TB_admin." WHERE id='".$arr[drivernamenew][company]."' ");
$arr[companynew] = $db->fetch($res[companynew]);

?>
 <div style="font-size:100px; color:#999999; padding-top:20px;"><center><i class="fa   fa-automobile"></i></center></div>
<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="3" align="center" class="font_24"><b>สลับงาน  <?=$_GET[part]?>&nbsp;<?=$_GET[carnew];?></b></td>
  </tr>
  <tr>
    <td width="38" rowspan="3" valign="top" class="font_34"  style="padding-top:25px; color:#009999  "><i class="fa fa-arrow-circle-down"></i></td>
  <td width="80" class="font_22" style="padding-top:10px; "><?=$arr[name][nickname]?>   </td>
  <td class="font_22" style="padding-top:10px; "><font class="font_14"><?=$arr[company][company];?></td>
  </tr>
  <tr>
    <td class="font_22" style="padding-top:0px; "><?=$arr[drivernamenew][nickname]?></td>
  <td class="font_22" style="padding-top:0px; "><font class="font_14"><?=$arr[companynew][company];?></td>
  </tr>
  <tr>
    <td colspan="2" class="font_22" style="padding-top:0px; margin-left: "><div style="margin-left:-10px; "><?
 $filename = "../../admin/file/driver/pic/" . $arr[drivernamenew][post_date] . ".jpg";
if(file_exists($filename)) {

$file_exists = 1;  
}else{
	$url = "http://t-booking.com/admin/file/driver/pic/" . $arr[drivernamenew][post_date] . ".jpg";

$response = get_headers($url, 1);
$file_exists = (strpos($response[0], "404") === false);  
}	
                      
                       // if(file_exists($file_exists)) {
                        if($file_exists) {
                          // Ǩͺ
                          ?>              
                          
    <img src="http://t-booking.com/admin/file/driver/pic/<?=$arr[drivernamenew][post_date];?>.jpg"  width="180"   border="0"  class="IMGSHOP"   />
                          <?
                        }
                        else {
                          ?>              
                          <img src="http://t-booking.com/admin/file/driver/pic/no.jpg"  width="180" border="0"  class="IMGSHOP"   />
    <?
                        } ?>
						</div>
	</td>
  </tr>
</table>
<? } ?>

 

<? if($_GET[work] =='guest'){ ?>

<?
 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD); 
 $res[project] = $db->select_query("SELECT * FROM  transfer_report_all  where id='".$_GET[id]."' ");
 $arr[project] = $db->fetch($res[project]);
 
  $res[newcarno] = $db->select_query("SELECT * FROM  transfer_report_all  where id='".$_GET[carnew]."' ");
 $arr[newcarno] = $db->fetch($res[newcarno]);
 
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD); 
 			$res[drivername] = $db->select_query("SELECT id,nickname,post_date,company FROM ".TB_driver." WHERE id='".$arr[newcarno][drivername]."' ");
	$arr[drivername] = $db->fetch($res[drivername]);
	
		$res[company] = $db->select_query("SELECT id,company FROM web_admin where id='".$arr[drivername][company]."'   ");
    $arr[company] = $db->fetch($res[company]);

?>
 <div style="font-size:140px; color:#999999; padding-top:20px;"><center><i class="fa   fa-users"></i></center></div>
<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2" align="center" class="font_24"><b>สลับแขก  <?=$_GET[part]?>&nbsp;<?=$_GET[carold];?></b></td>
  </tr>
  <tr>
    <td width="38" rowspan="3" class="font_34"  style="padding-top:10px; color:#009999  "><i class="fa fa-arrow-circle-down"></i></td>
  <td class="font_16" style="padding-top:10px; "><table width="100%"  border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px; ">
  <tr>
    <td width="25"><i class="fa  fa-users" style="color:#999999; font-size:16px"></i></td>
    <td style="color:#666666;font-size:16px"> <?
	/*
	$arr[remark][adult]=2;
	$arr[remark][child]=1;
	$arr[remark][baby]=1;
	*/
	// $arr[project][adult]=3;
	 if($arr[project][adult]>0){ ?>
	ผู้ใหญ่ : 
	<?=$arr[project][adult];?> &nbsp;
	<? } ?>
	
		<? if($arr[project][child]>0){ ?>
	 เด็ก : 
	<?=$arr[project][child];?> &nbsp;
	<? } ?>
	
	<? if($arr[project][baby]>0){ ?>
	 ทารก : 
	<?=$arr[project][baby];?> 
	<? } ?>
 </td>
  </tr>
</table>
<?=$arr[project][guest_name]?>
</td>
  </tr>
  <tr>
    <td class="font_26" style="padding-top:0px; "><b><?=$_GET[part]?>&nbsp;<?=$arr[newcarno][carno];?></b></td>
  </tr>
  <tr>
    <td class="font_16" style="padding-top:0px; "><b><?=$arr[drivername][nickname];?>&nbsp; (<?=$arr[company][company];?>)</b></td>
  </tr>
</table>
<? } ?>



 

<? } ?>