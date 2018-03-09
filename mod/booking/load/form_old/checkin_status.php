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
 
?>

 

 

 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td> <div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong style="color:#FF0000">แขกไม่ลงทะเบียน</strong>
 <div>สาเหตุ : แขกเอเย่นต์</div> </div></td>
      <td width="30" align="right">            <i  id="photo_driver_topoint_<?=$arr[project][id];?>" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  "></i></td>
    </tr>
  </tbody>
</table>

 

<? } ?>
 
 

