
<style>
   .shop-main-icon {
   border-radius: 60px;
   background-color: <?=$main_color?>;
   padding: 0px;
   width: 60px;
   height: 60px;
   text-align: justify;
   color: #FFFFFF;
   border: solid 3px #FFFFFF;
   box-shadow: 0 0 0px 2px #DADADA; text-align:center;
   color: #fff;
   }
   /* 
   .div-all-shop:hover{
   padding:5px;   border-radius: 10px; border: 2px solid #ddd;background-color:#FFFDE9;     margin-bottom: 5px; box-shadow: 0px  0px 10px #DADADA  ; margin-bottom:10px;
   }
   */
   .box-show-pv{
   width: 100%;
   padding: 7px;
   border-radius : 10px;
   }
   .zindex-small-popup{
      z-index:10000;
      }
</style>
<?php 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$province_name = $db->select_query("SELECT id,".$province." FROM web_province where id='".$_GET[province]."' ");
$province_name = $db->fetch($province_name);
/*
if($_COOKIE[lng]=="en"){
	$privince_name_fin = $province_name[name];
}else if($_COOKIE[lng]=="th"){
	$privince_name_fin = $province_name[name_th];
}else if($_COOKIE[lng]=="cn"){
	$privince_name_fin = $province_name[name_cn];
}
*/
?>
<script>
   //  $(".text-topic-action-mod" ).html("ส่งแขก > หมวดหมู่ทั้งหมด");
     $(".text-topic-action-mod" ).html("<?=t_send_to_customer;?> (<?=$province_name[$province];?>)");
   //  $("#head_full_popup_icon" ).html('<i class="fa <?=$arr[project][logo_code]?>" style="font-size:30px; color:<?=$arr[project][text_color]?>; "></i>');
//   	alert($('#province_text').text());
//     $('.pv_name_btn').text( $('#province_text').text());
     
</script> 
<div style="margin-top:45px;">
   <!--<div style="border: 1px solid rgba(153, 153, 153, 0.39);border-radius: 15px;padding: 5px; box-shadow: 0px 0px 0px #999999; margin-bottom:20px;" align="center" >-->
   <table width="100%">
      <tr>
         <td width="100%" align="center">
            <button style="max-width:250px;" class="btn-repair waves-effect box-show-pv"  onclick="ChangeProvince('other');"><strong><span class="font-24 text-cap"><? echo t_provinces;?></span></strong></button>
         </td>
      </tr>
   </table>

   <script>
      function ChangeProvince(type){

      	if(type=="other"){

      		$('#main_load_mod_popup').hide();
      		$('#load_mod_popup').html('');
      		$('#show_section').click();

      	}else if(type=="stay"){
      		var name = '<?=$name;?>';
      		var province = '<?=$_GET[province];?>';
      		var url_load= "load_page_mod.php?name=shop&file=maintype&id=1&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop&province="+province+"&province_name="+name;
        	$('#load_mod_popup').html(load_main_mod);
        	$('#load_mod_popup').load(url_load);
      	}
      }
   </script>
   <!--</div>-->
   	<div class="" style="overflow-x: hidden;">
   <?
      // echo $GET[province]." +++";
      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
      $res[project] = $db->select_query("SELECT id,logo_code,topic_th,topic_en,topic_cn FROM shopping_product_main    ORDER BY  id  ASC  ");
      while($arr[project] = $db->fetch($res[project])){
        $type = $db->num_rows('shopping_product_sub',"id","main=".$arr[project][id]."");
        $shop = $db->num_rows('shopping_product',"id","main=".$_GET[id]."  and status=1");
       $allproduct = $db->num_rows('shopping_product',"id","main=".$arr[project][id]." and status = 1 and province = '".$_GET[province]."' ");
      	if($allproduct==1){
      		$res[sub] = $db->select_query("SELECT sub FROM shopping_product where main=".$arr[project][id]." and status = 1 and province = '".$_GET[province]."' ");
      		$arr[sub] = $db->fetch($res[sub]);
      	}
      	if($type ==''){ 
      	 $type ='ยังไม่มี';
      	}
      		if($shop ==''){ 
      	 $shop ='ยังไม่มี';
      	}
      /*	$type_name_qr = $arr[project][topic_cn];
      	if($_COOKIE['lng']=="th"){
      		$type_name_qr = $arr[project][topic_th];
      		$query_topic = "topic_th"; 
      	}else if($_COOKIE['lng']=="en"){
      		$query_topic = "topic_en"; 
      		$type_name_qr = $arr[project][topic_en];
      	}else if($_COOKIE['lng']=="cn"){
      		$query_topic = "topic_cn"; 
      		$type_name_qr = $arr[project][topic_cn];
      	}*/
       ?>
   <? if( $allproduct>0){ ?>
   <? if( $arr[project][id]==100001){  
   		$opc =	"opacity:0.4;";   
   		$pointer = "pointer-events: none;";   
   } ?>
   <button class="div-all-shop" 
   style="margin-bottom:10px; padding-top:0px; border-bottom:0px solid #DADADA;border: solid 2px #dadada;margin-top:7px;border-radius:15px;width:100%;background-color:#dadada; <?=$opc.$pointer;?>">
      <div id="main_menu_shopping_<? echo $arr[project][id];?>">
         <table width="100%" border="0" cellspacing="2" cellpadding="2">
            <tbody>
               <tr  style="display:nones">
                  <td width="70" valign="top">
                     <table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tbody>
                           <tr>
                              <td   >
                                 <div class="shop-main-icon">  <i class="fa <?=$arr[project][logo_code]?>" style="font-size:30px; color:<?=$arr[project][text_color]?>; margin-top:15px; "></i></div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
                  <td>
                     <table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tbody>
                           <tr>
                              <td>
                                 <!-- <span class="font-24" style="color:<?=$main_color?>"><b></b></span><br> -->
                                 <span class="font-24" style="color:#333333"><b><?=$arr[project][$place_shopping];?></b></span>
                              </td>
                              <td width="60" align="center" class="font-26" style="padding-top:0px; padding-right:5px;">
                                 (<? echo $allplace = $db->num_rows('shopping_product',"id","main=".$arr[project][id]." and status = 1 and province = '".$_GET[province]."' ");?>)
                                 <input value="<?=$allplace;?>" id="num_place_<? echo $arr[project][id];?>" type="hidden" />
                                 <input value="<?=$arr[sub][sub];?>" id="id_sub_<? echo $arr[project][id];?>" type="hidden" />
                              </td>
                              <td width="40" align="right" class="font-26" style="padding-top:0px; padding-right:5px;"><i class="fa fa-search" style=" color:<?=$linkcolor?>; s"> </i></td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
				  
               </tr>
               <tr>
               </tr>
            </tbody>
         </table>
      </div>
      <script>
         $('#main_menu_shopping_<? echo $arr[project][id];?>').click(function(){
         		var url = "mod/shop/update_num_place.php?id=<? echo $arr[project][id];?>&province=<?=$_GET[province];?>&op=update";
         		 $.post( url, function( data ) {
         		  	console.log(data);
         		});  
          var num = $('#num_place_<? echo $arr[project][id];?>').val();
          if(num<=0){
          	alert('ไม่มีสินค้า');
          }
          else{
          	if(num==1){
          		 var id_place_one = $('#id_sub_<? echo $arr[project][id];?>').val();
          		 $("#main_load_mod_popup_2" ).toggle();
         		var url_load = "load_page_mod_2.php?name=shop&file=shop&driver=<?=$user_id?>&type="+id_place_one+"&province=<?=$_GET[province];?>&detail=1";
         		console.log(url_load);
         		$('#load_mod_popup_2').html(load_main_mod);
         		$('#load_mod_popup_2').load(url_load); 
         	}else{
         		 console.log('<?=$_GET[province];?>');
         		 $("#main_load_mod_popup_1" ).show();
         		 var url_load= "load_page_mod_1.php?name=shop&file=main&id=<? echo $arr[project][id];?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop&province=<?=$_GET[province];?>";
         		  $('#load_mod_popup_1').html(load_main_mod);
         		  $('#load_mod_popup_1').load(url_load); 
         	}
          }
         });
      </script>
   </button>
   <? } ?>      
   <? } 
	?>
	</div>
</div>
<script>
   $("#close_alert_show_shopping_place").click(function(){   
   $( "#alert_show_shopping_place" ).hide();
   });
</script>