<?
  if($_GET[status]==1){  
  
?>

 <div class="font-22"><i class="fa  fa-clock-o fa-spin 6x" style="color:#88B34D"></i>  <strong>เวลา 


<?=$date = date('H:i:s', $_GET[time]);?></div>

<? }  ?>



<?
 
  if($_GET[status]==0){  
 
?>
 

 <div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000">รอดำเนินการ</font></strong></div>

<? } ?>


<?
  if($_GET[status]==2){  
  	mysql_query("SET NAMES utf8"); 
  mysql_query("SET character_set_results=utf-8");
  	$db->connectdb(DB_NAME_BOOK,DB_USERNAME,DB_PASSWORD);
  $res[order] = $db->select_query("SELECT * FROM ap_order where invoice = '".$_GET[id]."' ");
  $arr[order] = $db->fetch($res[order]);
  $db->closedb();
 
?>

 

 

 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td><div class="font-22"><i class="fa  fa-clock-o fa-spin 6x" style="color:#88B34D"></i>  <strong>เวลา 


<?=$date = date('H:i:s', $_GET[time]);?></div> 
 <div>สาเหตุ :<?=$arr[order][driver_remark_noguest];?></div> </div></td>
      <td width="30" align="right">            </td>
    </tr>
  </tbody>
</table>

 

<? } ?>
 
 

