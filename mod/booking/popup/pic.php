 <style>
 
 .div-all-work{
	 padding:5px;   border-radius: 8px; border: 1px solid #ddd;   background:<? echo $bgcolor; ?>; margin-bottom:20px; box-shadow: 0px  0px 10px #DADADA  ;
	 
 }
 
 
  .div-all-palce{
	 padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#F6F6F6;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ;
	 
 }
 
 
 
 </style> 
 
 
 
 <?
  	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[shop] = $db->select_query("SELECT * FROM  shopping_product where id=".$_GET[shop_id]."  ORDER BY id  ");
                      
 	 $arr[shop] = $db->fetch($res[shop]);
 
 ?>
 
 
 <script>

  $(".text-topic-action-mod-4" ).html("<?=$arr[shop][topic_th]?> (รูปภาพ)");

  </script> 
 
 <div style="margin-top:45px;">
 
 
<?
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[shop] = $db->select_query("SELECT * FROM  shopping_gallery where product_id=".$_GET[shop_id]."  ORDER BY id  ");
                      
 	while($arr[shop] = $db->fetch($res[shop])){  
 

?>
 
 <div class="div-all-work">
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td><IMG SRC="../data/fileupload/shopping_place/<?=$arr[shop][post_date];?>.jpg" name="view01" width="100%" BORDER="0"  style=" border-radius: 8px;" ></td>
    </tr>
    <tr>
      <td class="font-26"><center><b><?=$arr[shop][name];?></td>
    </tr>
  </tbody>
</table>

 </div>
 
  
 
 
 <? } ?>

  <div>