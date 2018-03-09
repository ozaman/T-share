 <?
 
 
 
 /// data db
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
 
$res[projectcar] = $db->select_query("SELECT drivername FROM ".TB_transfer_report_all."  where  invoice=".$arr[project][invoice]." and drivername<>".$driver_id." ");



 
 
while($arr[projectcar] = $db->fetch($res[projectcar])){
	
	
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD); 

$res[name] = $db->select_query("SELECT id,nickname,post_date,company,phone FROM ".TB_driver." WHERE id='".$arr[projectcar][drivername]."' ");
$arr[name] = $db->fetch($res[name]);
$arr[name][nickname];

$res[company] = $db->select_query("SELECT company FROM ".TB_admin." WHERE id='".$arr[name][company]."' ");
$arr[company] = $db->fetch($res[company]);	
	
 
	?>

<table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-left:-15px;">
  <tbody>
    <tr>
      <td width="88"><img src="http://t-booking.com/admin/file/driver/pic/<?=$arr[name][post_date];?>.jpg"  width="85" height="100"  class="IMGSHOP"  style="border-radius: 15px;"   border="0"  /></td>
      <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
          <tr>
            <td class="font_30"><b><?=$arr[name][nickname]?></td>
          </tr>
          <tr>
            <td class="font-16"><?=$arr[company][company]?></td>
          </tr>
          <tr>
            <td valign="bottom" class="font_18"><a  href="tel:<?=$arr[name][phone]?>"  target="_blank" class="test" data-toggle="tooltip" title="โทรออก"><img src="images/icon/view/phone.png" width="20"   align="bottom"   />&nbsp;<b><?=$arr[name][phone]?></a></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>



<? }  ?>