<?php
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $province_name = $db->select_query("SELECT id,".$province." FROM web_province where id='".$_GET[province]."' ");
   $province_name = $db->fetch($province_name);
    ?> 
<style>
   .shop-main-icon {
   border-radius: 80px;
   background-color: <?=$main_color_sorf?>;
   padding: 5px;
   width: 80px;
   height: 80px;
   text-align: justify;
   color: #FFFFFF;
   border: solid 8px #FFFFFF;
   box-shadow: 0 0 0px 2px #DADADA; text-align:center;
   color: #fff;
   }
   .div-all-shop{
   padding:5px;   border-radius: 10px; border: 0px solid #ddd;background-color:#FFFFFF;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-bottom:10px;
   }
   /* 
   .div-all-shop:hover{
   padding:5px;   border-radius: 10px; border: 2px solid #ddd;background-color:#FFFDE9;     margin-bottom: 5px; box-shadow: 0px  0px 10px #DADADA  ; margin-bottom:10px;
   }
   */
</style>
<div style="margin-top:45px;">
   <div align="center" class="font-28 box-show-pv"><strong><span><?=$province_name[$province];?></span></strong></div>
   <?
      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
      $res[project] = $db->select_query("SELECT topic_th,logo_code,id FROM shopping_product_main where id='".$_GET[id]."'  ORDER BY  id  ASC  ");
      while($arr[project] = $db->fetch($res[project])){
      /*
       $type = $db->num_rows('shopping_product_sub',"id","main=".$arr[project][id]."");
       $shop = $db->num_rows('shopping_product',"id","main=".$_GET[id]."  and status=1 ");
      if($type ==''){ 
       $type ='ยังไม่มี';
      }
      	if($shop ==''){ 
       $shop ='ยังไม่มี';
      }*/
      ?>
   <script>
      $(".text-topic-action-mod-1" ).html("ส่งแขก > <? echo $arr[project][topic_th];?>");
      //  $("#head_full_popup_icon-1" ).html('<i class="fa <?=$arr[project][logo_code]?>" style="font-size:30px; color:<?=$arr[project][text_color]?>; "></i>');
   </script> 
   <div class="div-all-shop" style="padding-bottom:10px; padding-top:0px; border-bottom:0px solid #DADADA;margin-top:7px;      <? if( $arr[project][id]==11){?>
      opacity:0.4;   pointer-events: none;   
      <? } ?>
      ">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
         <tbody>
            <tr  style="display:none">
               <td width="80" valign="top">
                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                     <tbody>
                        <tr>
                           <td   >
                              <div class="shop-main-icon">  <i class="fa <?=$arr[project][logo_code]?>" style="font-size:50px; color:<?=$arr[project][text_color]?>; "></i></div>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
               <td>
                  <table width="100%" border="0" cellspacing="1" cellpadding="1">
                     <tbody>
                        <tr>
                           <td width="120"><span class="font-32" style="color:<?=$main_color?>"><b><? echo $arr[project][topic_th];?></span><br>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </td>
            </tr>
            <tr>
               <td colspan="2"><?  include ("mod/shop/list/sub.php");?></td>
            </tr>
         </tbody>
      </table>
   </div>
   <? } ?>
</div>
<script>
   $("#close_alert_show_shopping_place").click(function(){   
   $( "#alert_show_shopping_place" ).hide();
   });
</script>