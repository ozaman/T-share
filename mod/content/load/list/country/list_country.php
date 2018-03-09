<?
 	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
 $allplan_country = $db->num_rows('plan_product_price_setting',"id","id=".$_GET[id]." and plan_master=1");	
 
 
 $allplan_all = $db->num_rows('product_price_list_all',"id","plan_setting=".$_GET[id]." and extra_country=1");	
 
 
?>



<? if( $allplan_all>0){ ?>


<div class="font_24"><B><font color="#00A99D">เปิดใช้งานจำนวน &nbsp; <?=$allplan_all ?>&nbsp;สัญชาติ</div>


<? } ?>


<? if( $allplan_all==0){ ?>


<div class="font_24"><font color="#FF0000"><B>ยังไม่มีสัญชาติที่เปิดใช้งาน</div>


<? } ?>