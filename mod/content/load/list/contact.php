
 <? if($_GET[op] == ""){ ?>

 <?
 	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
  $res[admin_type] = $db->select_query("SELECT * FROM shopping_contact_admin_type where status = 1 ");
 while($arr[admin_type] = $db->fetch($res[admin_type])){
	 
	 
	 

	 $allcontact= $db->num_rows('shopping_contact',"id","product_id='".$arr[place][id]."' and admintype='".$arr[admin_type][id]."' and type<>'zello'");
	 
	 
	 if($arr[admin_type][id]==1){
		 
		$topic_color=$main_color; 
	 } else {
		 
		$topic_color='#0195DB'; 
	 }
	 
 
 ?>
 
 
 <script>
 
 
 
 
 
$('#btn_show_hide_data_<?=$arr[admin_type][id];?>_<?=$arr[place][id]?>').html('<i class="fa fa-angle-down" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;แสดง</span>');
 
 
 
  $('#btn_show_hide_data_<?=$arr[admin_type][id];?>_<?=$arr[place][id]?>').click(function() {
 
 
 ///// tool status
 var tool_status = $( "#table_show_hide_data_<?=$arr[admin_type][id];?>_<?=$arr[place][id]?>" ).is(":hidden");
 
// $("#table_show_hide_data_<?=$arr[admin_type][id];?>" ).show(); 
 
 if(tool_status==true){
	 
$("#table_show_hide_data_<?=$arr[admin_type][id];?>_<?=$arr[place][id]?>" ).show(); 

 $('#btn_show_hide_data_<?=$arr[admin_type][id];?>_<?=$arr[place][id]?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
 
	 
 } else {
	 
	$("#table_show_hide_data_<?=$arr[admin_type][id];?>_<?=$arr[place][id]?>" ).hide();  
	
 $('#btn_show_hide_data_<?=$arr[admin_type][id];?>_<?=$arr[place][id]?>').html('<i class="fa fa-angle-down" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;แสดง</span>');
	
	 
 }
 
 
  });
 </script>
 
 
 <? if($allcontact>0){ ?>
 
 
 <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      
      <td width="120"><div class="font-22" style="color:<?=$topic_color?>"><b>
        <?=$arr[admin_type][name_th]?>
      </div></td>
      <td width="50" class="font-22">( <?=$allcontact?> )</td>
      <td><div id="btn_show_hide_data_<?=$arr[admin_type][id];?>_<?=$arr[place][id]?>" class="font-24" style="cursor:pointer"></div></td>
    </tr>
  </tbody>
</table>

 <? } ?>
  <? if($allcontact==0){ ?>
 
 
 <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="120"> <div class="font-22" style="color:<?=$topic_color?>"><b><?=$arr[admin_type][name_th]?></div> </td>
      <td class="font-22"><font color="#FF0000">ยังไม่มีผู้ติดต่อ</td>
    </tr>
  </tbody>
</table>

 <? } ?>
 

<table width="100%" border="0" cellspacing="0" cellpadding="2" id="table_show_hide_data_<?=$arr[admin_type][id];?>_<?=$arr[place][id]?>" class="div-menu-price-plan"  style="display:none; background-color:#FFF" >
  <tbody>
    <tr>
      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" cellspacing="1" cellpadding="1" >  
  <?
  
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[contact] = $db->select_query("SELECT * FROM shopping_contact  WHERE product_id='".$arr[place][id]."' and admintype='".$arr[admin_type][id]."' and type<>'zello'  ORDER BY usertype  ASC  ");
while($arr[contact] = $db->fetch($res[contact])){
	
	
	
 $res[product] = $db->select_query("SELECT * FROM shopping_product WHERE id='".$arr[place][id]."' ");
 $arr[product] = $db->fetch($res[product]);
 
   $res[con_type] = $db->select_query("SELECT * FROM shopping_contact_type WHERE id='".$arr[contact][usertype]."' ");
  $arr[con_type] = $db->fetch($res[con_type]);
 
	
if($arr[contact][usertype]=='op'){
	
$type='พนักงานต้อนรับ';
	
}

if($arr[contact][usertype]=='sale'){
	

$type='ฝ่ายขาย';
	
}
	
	
	
	
	 
	 $res[com] = $db->select_query("SELECT * FROM shopping_contact WHERE id='".$arr[contact][main]."' ");
 $arr[type] = $db->fetch($res[com]);
 

 
 

			///////////////
 
 
 

	//Comment Icon
	if($arr[contact][enable_comment]){
		$CommentIcon = " <IMG SRC=\"images/icon/suggest.gif\" WIDTH=\"13\" HEIGHT=\"9\" BORDER=\"0\" ALIGN=\"absmiddle\">";
	}else{
		$CommentIcon = "";
	}
 
 
?> 

 
 
     <tr '>
       <td height="30">  
       <b>  <? echo $arr[contact][name];?> </td>
         <td width="120">
           
  <? echo $arr[contact][phone];?> 
      </td>
         <td width="100"><? echo $arr[con_type][name_th];?></td>
         </tr>
	  <TR>
		  <TD colspan="29" height="1" class="dotline"></TD>
	  </TR>
  <?
 } 
?>
   </table></td>
    </tr>
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>



 <? }  } ?>




 





 