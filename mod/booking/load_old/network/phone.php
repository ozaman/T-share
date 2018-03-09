 
<br>
    <style>
   .div-all-zello{
	 padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#FFF;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ;
	 
 }
 
 
 </style>
<?
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[shop] = $db->select_query("SELECT * FROM  shopping_product where id=".$_GET[shop_id]."  ORDER BY id  ");
                      
 $arr[shop] = $db->fetch($res[shop]) ;

?>
  
<script>
 
  $(".text-topic-action-mod-4" ).html("โทรศัพท์ (<?=$arr[shop][topic_th]?>)");
 
 </script> 
 

 

 
 
 
 
  
  
  <?
	  		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[contact] = $db->select_query("SELECT * FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='phone' and status=1");
		 	while($arr[contact] = $db->fetch($res[contact])){  
 
	  ?>
 
  
  <? //=$detectname?>
  
  
  
 
  
  

 
  <a  href="tel://<?=$arr[contact][phone]?>"  id="booking_edit_<?=$arr[project][id]?>"   style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none">

 
  
  <div style="padding:5px; margin-top:10px; " class="div-all-zello"  >
  
  
  <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="55"><i class="fa fa-phone-square" style="font-size:54px; color: #8DC63F; border:none"></i></td>
      <td><table width="100%" border="0" cellpadding="2" cellspacing="0">
        <tbody>
          <tr>
            <td> 
              <a  href="tel://<?=$arr[contact][phone]?>"  id="booking_edit_<?=$arr[project][id]?>"   style=" font-size:18px; margin-left:0px; padding:0px;   text-transform:uppercase; color:<?=$main_color?>; text-decoration:none">
               <b>   <?=$arr[contact][name]?>  <div style="margin-left:50px; position:absolute; margin-top:-20px; color:#3333333"><?=$arr[contact][phone]?> <div>
                </a>
              </td>
          </tr>
          <tr>
            <td style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none">
			
			
				<?  if($arr[contact][usertype]=='sale'){ ?>
			
	 
            
            
      ฝ่ายการตลาด
            
            <? } else { ?>
            
            พนักงานต้อนรับ
            <? } ?>
            
            
            </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    </tbody>
</table>

  
  
  
  
  
  
  
  
  
  
  
  
  
  </div>
  
  </a>
  
  
  


<? } ?>