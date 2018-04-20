<?
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[shop] = $db->select_query("SELECT id,topic_th,price_plan,price_plan_2,price_plan_3 FROM  shopping_product where id=".$_GET[shop_id]."  ORDER BY id  ");
   $arr[shop] = $db->fetch($res[shop]) ;
   $res[plan] = $db->select_query("SELECT plan_id  FROM plan_product_price_list WHERE  id=".$_GET[plan_id]." ");
   $arr[plan] = $db->fetch($res[plan]);
   ?> 
<link href="plugins/iCheck/square/green.css" rel="stylesheet" type="text/css"/>
<script>
   //  $(".text-topic-action-mod-4" ).html("<?=$arr[shop][topic_th]?>");
     $(".text-topic-action-mod-4" ).html("<?=t_work_remuneration;?>");
</script> 
<?
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
    $all_plan = $db->num_rows('plan_product_price_list',"id","status=1 and product_id=".$arr[shop][id]."");
    $type_name_qr = "topic_cn";
      	if($_COOKIE['lng']=="th"){
      		$type_name_qr = "topic_th";
      		$query_topic = "topic_th"; 
      	}else if($_COOKIE['lng']=="en"){
      		$type_name_qr = "topic_en";
      	}else if($_COOKIE['lng']=="cn"){
      		$type_name_qr = "topic_cn";
      	}
      	$type_name_qr = "topic_th";
   /*   	
   1 : ค่าจอด + ค่าหัว
   2 : ค่าจอด + ค่าคอมมิชชั่น
   3 : ค่าหัว + ค่าคอมมิชชั่น
   4 : ค่าจอด + ค่าหัว + ค่าคอมมิชชั่น
   5 : ค่าจอด
   6 : ค่าหัว
   7 : ค่าคอมมิชชั่น*/
   function checkTypePay($id){
      if($id==1){
      		$name_type = t_parking_fee." + ".t_person_fee;
      }
      else if($id==2){
      		$name_type = t_parking_fee." + ".t_com_fee;
      }
      else if($id==3){
      		$name_type = t_person_fee." + ".t_com_fee;
      } 
      else if($id==4){
      		$name_type = t_parking_fee." + ".t_person_fee." + ".t_com_fee;
      }
      else if($id==5){
      		$name_type = t_parking_fee;
      }
      else if($id==6){
      		$name_type = t_person_fee;
      }
      else if($id==7){
      		$name_type = t_com_fee;
      }
      return $name_type;
   }
   ?>
<div style="margin-top:45px;">
   <div id="div_price_plan_popup">
      <div class="topicname"><?=t_remuneration_type;?></div>
      <select  class="form-control" name="price_plan_popup" id="price_plan_popup" style="width:100%; font-size:20px; padding:5px; height:40px;display: none;" >
      <? if($arr[shop][price_plan]>0){
         $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                      $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan]."");
         while($arr[category] = $db->fetch($res[category])) {
         $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=1 ");
         $arr[open] = $db->fetch($res[open]);		  
                                  echo "<option value=".$arr[open][id]."";
                                  if($arr[open][id] ==$_GET[plan]) {
                                    echo " Selected";
                                  }
                                  echo ">".$arr[category][$type_name_qr]." </option>";
                                }
                                $db->closedb ();
         }
         ?>
      <? if($arr[shop][price_plan_2]>0){
         $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                      $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_2]."");
                                while($arr[category] = $db->fetch($res[category])) {
         $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=2 ");
         $arr[open] = $db->fetch($res[open]);		  
                                  echo "<option value=".$arr[open][id]."";
                              if($arr[open][id] ==$_GET[plan]) {
                                    echo " Selected";
                                  }
                                  echo ">".$arr[category][$type_name_qr]."</option>";
                                }
                                $db->closedb ();
         }
         ?>
      <? if($arr[shop][price_plan_3]>0){
         $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                      $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_3]."");
                                while($arr[category] = $db->fetch($res[category])) {
         $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=3 ");
         $arr[open] = $db->fetch($res[open]);		  
                                  echo "<option value=".$arr[open][id]."";
           if($arr[open][id] ==$_GET[plan]) {
                                    echo " Selected";
                                  }
                                  echo ">".$arr[category][$type_name_qr]."</option>";
                                }
                                $db->closedb ();
         }
         ?>
      <?
         ?>
      </select>
      <div style="margin-top:-5px;border: 1px solid #ddd;border-radius: 10px;box-shadow: 1px 1px 1px #ddd;padding: 5px;">
         <table width="100%" border="0" cellspacing="1" cellpadding="5" >
            <? if($arr[shop][price_plan]>0)	{
               $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                            $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan]."");
               while($arr[category] = $db->fetch($res[category])) {
               $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=1 ");
               $arr[open] = $db->fetch($res[open]);		  
               //  hover checked
               ?>
            <tr onclick="clickPlan('<?=$arr[open][id];?>');">
               <td width="15%">
                  <div class="iradio_square-green" aria-checked="false" aria-disabled="false" style="position: relative;" id="price_plan_<?=$arr[open][id];?>">
                     <input type="radio" name="price_plan" class="price_plan_select" value="1"  style="position: absolute; visibility: hidden;" >
                     <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                  </div>
               </td>
               <td>
                  <span class="font-24 txt-cap"><strong><?=checkTypePay($arr[category][id]);?></strong></span>
               </td>
            </tr>
            <?		}
               $db->closedb ();
               }	?>
            <? if($arr[shop][price_plan_2]>0)	{
               $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                            $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_2]."");
                                      while($arr[category] = $db->fetch($res[category])) {
               $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=2 ");
               $arr[open] = $db->fetch($res[open]);  ?>
            <tr onclick="clickPlan('<?=$arr[open][id];?>');">
               <td width="15%">
                  <div class="iradio_square-green" aria-checked="false" aria-disabled="false" style="position: relative;" id="price_plan_<?=$arr[open][id];?>">
                     <input type="radio" name="price_plan" class="price_plan_select" value="1"  style="position: absolute; visibility: hidden;" >
                     <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                  </div>
               </td>
               <td>
                  <span class="font-24 txt-cap"><strong><?=checkTypePay($arr[category][id]);?></strong></span>
               </td>
            </tr>
            <? }
               $db->closedb ();	} ?>
            <? if($arr[shop][price_plan_3]>0)	{
               $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                            $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_3]."");
                                      while($arr[category] = $db->fetch($res[category])) {
               $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=3 ");
               $arr[open] = $db->fetch($res[open]);  ?>
            <tr onclick="clickPlan('<?=$arr[open][id];?>');">
               <td width="15%">
                  <div class="iradio_square-green" aria-checked="false" aria-disabled="false" style="position: relative;" id="price_plan_<?=$arr[open][id];?>">
                     <input type="radio" name="price_plan" class="price_plan_select" value="1"  style="position: absolute; visibility: hidden;" >
                     <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                  </div>
               </td>
               <td>
                  <span class="font-24 txt-cap"><strong><?=checkTypePay($arr[category][id]);?></strong></span>
               </td>
            </tr>
            <? }
               $db->closedb ();	} ?>
         </table>
      </div>
   </div>
   <input type="text" class="form-control" value="extra"  name="plan_type_popup" id="plan_type_popup"    style=" height:40px; font-size:16px;display:none" /> 
   <div id="price_tab"></div>
</div>
<script>
   function clickPlan(id){
   	$('.iradio_square-green').removeClass('hover checked');
   	console.log(id);
   	$('#price_plan_'+id).addClass('hover checked');
   	$('#price_plan_popup').val(id);
   	$('#price_plan_popup').change();
   }	   
   //setTimeout(function(){ $('#price_plan_1').click(); }, 500);
   	   var url_load_price= "popup.php?name=booking/popup&file=tab&shop_id=<?=$_GET[shop_id]?>";
   url_load_price=url_load_price+"&plan_id="+document.getElementById('price_plan_popup').value;
   url_load_price=url_load_price+"&plan_type="+document.getElementById('plan_type_popup').value;
   $('#price_tab').load(url_load_price);
    $("#price_plan_popup").change(function(){ 
   	     var url_load_price= "popup.php?name=booking/popup&file=tab&shop_id=<?=$_GET[shop_id]?>";
   url_load_price=url_load_price+"&plan_id="+document.getElementById('price_plan_popup').value;
   url_load_price=url_load_price+"&plan_type="+document.getElementById('plan_type_popup').value;
   $('#price_tab').load(url_load_price); 
    	 });
</script>