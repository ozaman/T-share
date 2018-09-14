<style>
	.onlyThisTable td{
		 	padding: 10px 5px;
	}
</style>
<div style="margin: 0px 0px;">
	
	<div>
	<table  class="centered onlyThisTable striped" style="display: nones;" >
			<?php
            $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
            $res[sale] = $db->select_query("SELECT t1.phone, t1.name, t1.product_id, t2.topic_th FROM  shopping_contact as t1
left join shopping_product as t2 on t1.product_id = t2.id where  t1.type='phone'  and t1.usertype=9 and t1.admintype=1  and t2.status = 1 ORDER BY t1.id ");
            while($arr[sale] = $db->fetch($res[sale])){  
            ?>
             <tr>
             	<td><span><?=$arr[sale][topic_th];?></span></td>
             <td>
	         	<a href="tel:<?=$arr[sale][phone]?>"  id="booking_edit_<?=$arr[project][id]?>"  style="color:#333333"  >                
	         <table id="shop_alert_menu_call_<?=$arr[project][id]?>" >
		         <tr >
			         <td width="150"><span class="font-22"> <?=t_marketing;?> (<?=$arr[sale][name]?>)</span></td>
			         <td width="20" align="right"> <span > <i class="fa fa-phone" style="font-size:18px; color:<?=$main_color?>; width:20px;"></i></span></td>
		         </tr>
	         </table>  
	         </a>
			 </td>
	         </tr>
	         <? } ?>  
	</table>
	</div>
</div>
<div style="position: absolute;top: 10px;right: 25px;">
	<a onclick="$('#load_material').fadeIn(); setTimeout(function(){ $('#load_material').fadeOut(); }, 5000);" target="_blank" href="https://www.facebook.com/CSDMedia/" style="color: #3b5998;font-size:36px;"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
</div>
<script>
//	var instance = M.Tabs.init(el, options);

  // Or with jQuery

  $(document).ready(function(){
//    $('.tabs').tabs();
  });
</script>