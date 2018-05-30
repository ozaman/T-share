<?php 
if($_GET[type]=="phone"){?>
<div style="margin-top: 0px;">
<?
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[shop] = $db->select_query("SELECT ".$place_shopping.",id FROM  shopping_product where id=".$_GET[shop_id]."  ORDER BY id  ");
   $arr[shop] = $db->fetch($res[shop]) ;
   ?>
<script>
   $(".text-topic-action-mod-4" ).html("<?=t_phone_number;?>");
</script> 
<?
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[contact] = $db->select_query("SELECT id,phone,name FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='phone' and status=1");
   while($arr[contact] = $db->fetch($res[contact])){  
   ?>
<? //=$detectname?>
<a  href="tel://<?=$arr[contact][phone]?>"  id="tel"   style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none">
   <div style="padding:5px; margin-top:10px; " class="div-all-zello"  >
   <table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tbody>
         <tr>
            <td width="55"><i class="fa fa-phone-square" style="font-size:54px; color: #8DC63F; border:none"></i></td>
            <td>
               <table width="100%" border="0" cellpadding="2" cellspacing="0">
                  <tbody>
                     <tr>
                        <td>
<a  href="tel://<?=$arr[contact][phone]?>" style=" font-size:18px; margin-left:0px; padding:0px;   text-transform:uppercase; color:<?=$main_color?>; text-decoration:none">
<b>   <?=$arr[contact][name]?> </b>
</a>
						</td>
					 </tr>
					 <tr>
					 	<td><div style="color:#3333333"><?=$arr[contact][phone]?> </div></td>
					 </tr>
					 <tr>
					 	<td style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none">
						<?  if($arr[contact][usertype]=='sale'){
							echo t_marketing;
							 } else {
							echo t_receptionist;
						 } ?>
						</td>
					 </tr>
					</tbody>
				</table>
			</td>
		</tr>
		</tbody>
	</table>
</div>
</a>
<? } ?>
</div>
<? }
else if($_GET[type]=="zello"){ 
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   ?>
   <div style="margin-top: 0px;">
<script>
   $(".text-topic-action-mod-4" ).html("Zello");
</script> 
<?
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[contact] = $db->select_query("SELECT id,channel,phone,name FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='zello'");
   while($arr[contact] = $db->fetch($res[contact])){  
   ?>
<? //=$detectname?>
<? if($detectname=='iPad' or  $detectname=='iPhone' or $detectname=='Other'){ ?>
<a  href="<?=$arr[contact][phone]?>"    target="_blank"   style="font-size:16px; margin-left:0px;  padding:0px;   text-transform:uppercase; color:<?=$main_color?>; text-decoration:none;">
<? } ?>
<? if($detectname=='Android' ){ ?>
<a  href="zello://<?=$arr[contact][channel]?>?add_channel"   style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none">
   <? } ?>
   <div style="padding:5px; margin-top:15px; " class="div-all-zello"  >
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
         <tbody>
            <tr>
               <td width="120"><img src="../data/qrcode/zello/<?=$arr[contact][channel]?>.png?v=<?=$arr[projectcar][update_date];?>"  width="100%"   border="0"       /></td>
               <td>
                  <table width="100%" border="0" cellpadding="2" cellspacing="2">
                     <tbody>
                        <tr>
                           <td><? if($detectname=='iPad' or  $detectname=='iPhone' or $detectname=='Other'){ ?>
<a  href="<?=$arr[contact][phone]?>"  id="booking_edit_<?=$arr[project][id]?>"   target="_blank"   style="font-size:16px; margin-left:0px;  padding:0px;   text-transform:uppercase; color:<?=$main_color?>; text-decoration:none">
<b>    <?=$arr[contact][channel]?>
</a>
<? }   ?>
<? if($detectname=='Android' ){ ?>
<a  href="zello://<?=$arr[contact][channel]?>?add_channel"  id="booking_edit_<?=$arr[project][id]?>"   style=" font-size:18px; margin-left:0px; padding:0px;   text-transform:uppercase; color:<?=$main_color?>; text-decoration:none">
<b>   <?=$arr[contact][channel]?>
</a>
<? } ?></td>
</tr>
						<tr>
							<td style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none"><?=$arr[contact][name]?></td>
						</tr>
					</tbody>
				</table>
				</td>
			</tr>
		</tbody>
		</table>
	</div>
</a>
<? } ?>
</div>
<? }
?>