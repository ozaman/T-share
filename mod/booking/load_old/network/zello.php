 
<br>
    <style>
   .div-all-zello{
	 padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#FFF;     margin-bottom: 5px; box-shadow: 0px  0px 5px #DADADA  ;
	 
 }
 
 
 </style>
<?
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[shop] = $db->select_query("SELECT * FROM  shopping_product where id=".$_GET[shop_id]."  ORDER BY id  ");
                      
 $arr[shop] = $db->fetch($res[shop]) ;

?>
  
<script>
 
  $(".text-topic-action-mod-4" ).html("Zello (<?=$arr[shop][topic_th]?>)");
 
 </script> 
 

 

 
 
 
 
  
  
  <?
	  		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[contact] = $db->select_query("SELECT * FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='zello'");
		 	while($arr[contact] = $db->fetch($res[contact])){  
 
	  ?>
 
  
  <? //=$detectname?>
  
  
  
 
  
  

 
 <? if($detectname=='iPad' or  $detectname=='iPhone' or $detectname=='Other'){ ?>
              <a  href="<?=$arr[contact][phone]?>"  id="booking_edit_<?=$arr[project][id]?>"   target="_blank"   style="font-size:16px; margin-left:0px;  padding:0px;   text-transform:uppercase; color:<?=$main_color?>; text-decoration:none">
              
              <? } ?>
              
              
                            <? if($detectname=='Android' ){ ?>
              <a  href="zello://<?=$arr[contact][channel]?>?add_channel"  id="booking_edit_<?=$arr[project][id]?>"   style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none">

                
                  <? } ?>
  
  <div style="padding:5px; margin-top:15px; " class="div-all-zello"  >
  
  
  <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="120"><img src="../data/qrcode/zello/<?=$arr[contact][channel]?>.png?v=<?=$arr[projectcar][update_date];?>"  width="100%"   border="0"       /></td>
      <td><table width="100%" border="0" cellpadding="2" cellspacing="2">
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
      </table></td>
    </tr>
    </tbody>
</table>

  
  
  
  
  
  
  
  
  
  
  
  
  
  </div>
  
  </a>
  
  
  


<? } ?>