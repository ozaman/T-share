 <?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $row[callcenter] = $db->num_rows('contact_network', "id", "company='".$arr[product][admin_company]."' and type='callcenter'");
 if($row[callcenter] >0){

?>

<style type="text/css">
.mainpic_qr {

   padding:10px; color:#000000;    
 

   border:5px solid <?=$main_color?>; background-color:#FFFFFF; 
   box-shadow: 2px 1px 10px #333333; margin-right:5px; margin-bottom:5PX;max-width:400px;
    
}
 
-->
</style>  


				    <div   data-toggle="dropdown"  style="cursor: pointer " ><b><img src="../admin/pic/qrcode/logo/zello.png"  align="absmiddle" style="width:50"/> คอลเซ็นเตอร์</b></div>
                  
                  <ul class="dropdown-menu" role="menu"  >

<?
function tis620_to_utf8($tis) {
for( $i=0 ; $i< strlen($tis) ; $i++ ){
$s = substr($tis, $i, 1);
$val = ord($s);
if( $val < 0x80 ){
$utf8 .= $s;
} elseif ((0xA1 <= $val and $val <= 0xDA) 
or (0xDF <= $val and $val <= 0xFB)) {
$unicode = 0x0E00 + $val - 0xA0;
$utf8 .= chr( 0xE0 | ($unicode >> 12) );
$utf8 .= chr( 0x80 | (($unicode >> 6) & 0x3F) );
$utf8 .= chr( 0x80 | ($unicode & 0x3F) );
}
}
return $utf8;
}

 
  
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[contact_network] = $db->select_query("SELECT * FROM  contact_network WHERE company='".$arr[product][admin_company]."' and type='callcenter' ");
	$arr[contact_network] = $db->fetch($res[contact_network]);
   

 echo $string = iconv( 'UTF-8' , 'UTF-8' , $arr[contact_network][id_zello] );
	?>
	 
               
					
  
	
	
	
	<?
	

 
?>   

  <li style="text-align:center " class="mainpic_qr">
  <a href="zello://<?=$arr[contact_network][id_zello]?>?add_channel" target="_blank" class="main_pic">
  <div class="font_18" style="border-bottom: solid 1px #999999; width:100%;   color:#000000; text-align:left; text-align:center " ><b><?=$string?></b></div><br>
  <img src="../admin/pic/qrcode/logo/zello.png"  align="absmiddle" style="width:100% "/><br>
    <img src="../admin/pic/qrcode/zello_<?=$arr[contact_network][id]?>.png"  align="absmiddle" style="width:100% "/>
					  
					  
					 </a></li>

</ul> 
 <? } ?>