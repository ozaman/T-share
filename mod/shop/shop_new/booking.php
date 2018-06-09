
<div style="padding-bottom:30px;" >
<form method="post"  id="form_booking" name="form_booking">

   <?
      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
      $res[driver] = $db->select_query("SELECT * FROM  web_driver where id = '".$user_id."' ");
                       
      $arr[driver] = $db->fetch($res[driver]);
      $res[shop] = $db->select_query("SELECT * FROM shopping_product  WHERE id='".$_GET[place]."' ");
      $arr[shop] = $db->fetch($res[shop]);
      $res[shopmain] = $db->select_query("SELECT * FROM shopping_product_main  WHERE id='".$arr[shop][main]."' ");
      $arr[shopmain] = $db->fetch($res[shopmain]);
      $res[shopsub] = $db->select_query("SELECT * FROM shopping_product_main  WHERE id='".$arr[shop][main]."' ");
      $arr[shopsub] = $db->fetch($res[shopsub]);
      $arr[project][program] = $_GET[place];

      //$all_car = $db->num_rows('web_carall',"id","drivername=".$user_id." and status=1");
   
      $res[car] = $db->select_query("SELECT * FROM   web_carall  where drivername='".$user_id."' and status=1 order by id desc  ");
//   $res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
   $arr[car] = $db->fetch($res[car]);
      ?>
  
   <input name="program" type="hidden"  required="true" class="form-control" id="program" value="<?=$arr[shop][id]?>" >
    <div style="border-radius: 10px;
    border: 1px solid rgb(221, 221, 221);
    background-color: rgb(255, 255, 255);
    margin-bottom: 0px;
    box-shadow: rgb(218, 218, 218) 0px 0px 5px;
    padding: 15px;
    margin-top: 8px;" id="selected_taxi">
         
        
        <div class="form-group">
          <label>เวลาถึงโดยประมาณ(นาที)</label>
          <input type="numbers" class="form_input" required="true" id="time_num" name="time_num">
        </div>
         <div class="" id="show_guest_detaila">
           <div class="form-group">
          <label>จำณวนคน</label>
           <table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-5px;"  >
            <tr>
               <td>
                  <input  name="adult" required="true"  type="numbers" class="form_input" placeholder="ผู้ใหญ่" id="adult" >
               </td>
               <td width="5"></td>
               <td>
                   <input  name="child" required="true" type="numbers" class="form_input" placeholder="เด็ก" id="child" >
               </td>
            </tr>
         </table>
         
        </div>
            
         </div>
       
    </div>
  
      
      <!-- DIV PAX -->
      
      <!-- DIV CAR -->	
      <div class="<?= $coldata?>" id="show_transfer_detail" style="margin-top:10px;padding:5px;   border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ;  ">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
               <tr>
                  <td>
                     <div class="font-28" style="color:<?=$main_color?>"><b><?=t_your_car_infor;?> </b></div>
                  </td>
                  <td width="50" style="display: none;" id="row_accept_car">
                     <img src="images/checked.png" width="35px"/>
                  </td>
               </tr>
            </tbody>
         </table>
         <div>
            <!-- +"&car_color="+document.getElementById('car_color').value
            +"car_plate="+document.getElementById('car_plate').value
            +"&plan="+document.getElementById('plan_setting').value -->
            <input type="" name="car_plate" required="true" value="<?= $res[car][plate_num]?>" type="text" class="form_input" placeholder="ป้ายทะเบียน">
         </div>
         <!-- <div style="margin-top:-50px;" id="show_car_detail">
            <?   //include ("mod/booking/load/booking/car.php");   ?>
         </div> -->
         
      </div>
      <!-- BTN  -->	
      <div id="testScroll">
        
         <!-- Agent Issu -->  
         <div class="<?= $coldata?>" id="show_payment_detail" style="margin-top:10px;padding:5px;   border-radius: 10px; border: 1px solid #ddd;background-color:#Fff;  margin-bottom: 0px; box-shadow: 0px  0px 5px #DADADA  ; ">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
               <tbody>
                  <tr>
                     <td>
                        <div class="font-28" style="color:<?=$main_color?>"><b><?=t_work_remuneration;?></b></div>
                     </td>
                     <td width="50" style="display: none;" id="row_accept_payment">
                        <img src="images/checked.png" width="35px"/>
                     </td>
                  </tr>
               </tbody>
            </table>
            <div >
               <table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-5px;">
                  <tbody>
                     <tr>
                        <?php 
                        /*    
1 : ค่าจอด + ค่าหัว
2 : ค่าจอด + ค่าคอมมิชชั่น
3 : ค่าหัว + ค่าคอมมิชชั่น
4 : ค่าจอด + ค่าหัว + ค่าคอมมิชชั่น
5 : ค่าจอด
6 : ค่าหัว
7 : ค่าคอมมิชชั่น*/
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
$name_type = t_parking_fee." + ".t_person_fee."+".t_com_fee;
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
                        <td width="100%">
                           <input  name="plan_setting"  type="hidden" class="form-control"  id="plan_setting" value="0"   />
                           <?
                              if($arr[shop][price_plan]>0){
                                                      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                                      $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan]."");
                                                      while($arr[category] = $db->fetch($res[category])){
                              $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=1 ");
                              $arr[open] = $db->fetch($res[open]);        
                                                         ?>
                           <script>
                              ///
                              $('#show_price_plan_1').click(function(){  
                              $( "#main_load_mod_popup_4" ).toggle();
                              var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[shop][id]?>&plan=<?=$arr[open][id];?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
                              $('#load_mod_popup_4').html(load_main_mod);
                              $('#load_mod_popup_4').load(url_load_1); 
                              });
                           </script>                    
                           <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px;" onclick="ClickPay(1)">
                              <table width="100%" border="0" cellspacing="1" cellpadding="3" >
                                 <tbody>
                                    <tr>
                                       <td width="30" rowspan="2" align="center">
                                          <!-- <input type="radio" name="price_plan" class="price_plan_select genaral" value="<?=$arr[open][plan_id];?>" id="price_plan_1" /> -->
                                       </td>
                                       <td class="font-22"><b> <?=checkTypePay($arr[category][id]);?></b> </td>
                                       <td width="35" rowspan="2" valign="middle"><a id="show_price_plan_1"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <?
                                             $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                             $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[shop][price_plan]."   ");
                                              $arr[price] = $db->fetch($res[price]);
                                             $show_park=$arr[price][price_park];
                                             $show_person=$arr[price][price_person];
                                             $show_commision=$arr[price][price_commision];
                                              if($show_park==1){    
                                             $status_show_park='show';          
                                              }
                                              if($show_park==0){    
                                             $status_show_park='';        
                                              }
                                              if($show_person==1){     
                                             $status_show_person='show';           
                                              }
                                             if($show_person==0){   
                                             $status_show_person='';         
                                              }
                                               if($show_commision==1){    
                                             $status_show_commision='show';           
                                              }
                                                if($show_commision==0){   
                                               $status_show_commision='';    
                                              }
                                               ?>
                                               
                                               
                                               
                                          <? if($arr[open][price_extra]==1){ 
                                             $res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
                                              $arr[cost] = $db->fetch($res[cost]);     
                                                  ?>
                                          <table width="100%" border="0" cellspacing="1" cellpadding="1" >
                                             <tbody>
                                                <tr>
                                                   <td width="75"> <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;<?=t_china;?>  </td>
                                                   <td>
                                                      <span style="display:<?=$status_show_park?>"><?=t_parking_fee;?>  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span>
                                                      <span style="display:<?=$status_show_person?>"><?=t_person_fee;?>  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_commision;?>"><?=t_com_fee;?>  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <? } ?> 
                                          <? if($arr[open][price_all]==1){ 
                                             $res[cost] = $db->select_query("SELECT price_park_driver,price_commision_driver, price_person_driver FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country=240 and status=1    ORDER BY  sort_country desc limit 1  ");
                                              $arr[cost] = $db->fetch($res[cost]);     
                                                   ?>
                                         <table width="100%" border="0" cellspacing="1" cellpadding="1" >
                                             <tbody>
                                                <tr>
                                                   <td width="75"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;<?=t_all;?></td>
                                                   <td>
                                                      <span style="display:none<?=$status_show_park?>"><?=t_parking_fee;?>  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_person?>"><?=t_person_fee;?>  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_commision;?>"><?=t_com_fee;?>  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <? } ?> 
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <?php
                              }
                              $db->closedb ();
                              }
                              
                              if($arr[shop][price_plan_2]>0){
                                                         $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                                         $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_2]."");
                                                         while($arr[category] = $db->fetch($res[category])){
                                                             $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=2 ");
                                                               $arr[open] = $db->fetch($res[open]);        
                                                            //echo "<option value=\"".$arr[category][id]."\"";
                                                            if($arr[category][id] ==$arr[project][price_plan]){
                                                               //echo " Selected";
                                                            }
                                                            //echo ">".$arr[category][topic_th]." </option>";
                                                            ?>
                           <script>
                              ///
                              $('#show_price_plan_2').click(function(){  
                              $( "#main_load_mod_popup_4" ).toggle();
                              var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[shop][id]?>&plan=<?=$arr[open][id];?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
                              $('#load_mod_popup_4').html(load_main_mod);
                              $('#load_mod_popup_4').load(url_load_1); 
                              });
                           </script>                    
                           <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 1px;" onclick="ClickPay(2);">
                              <table width="100%" border="0" cellspacing="1" cellpadding="3" >
                                 <tbody>
                                    <tr>
                                       <td width="30" rowspan="2" align="center">
                                          <!-- <input type="radio" name="price_plan" class="price_plan_select genaral" value="<?=$arr[open][plan_id];?>" id="price_plan_2" /></td> -->
                                       <td class="font-22"><b> <?=checkTypePay($arr[category][id]);?></b> </td>
                                       <td width="35" rowspan="2"><a id="show_price_plan_2"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <?
                                             $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                             $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[shop][price_plan_2]."   ");
                                              $arr[price] = $db->fetch($res[price]);
                                             $show_park=$arr[price][price_park];
                                             $show_person=$arr[price][price_person];
                                             $show_commision=$arr[price][price_commision];
                                              if($show_park==1){    
                                             $status_show_park='show';          
                                              }
                                              if($show_park==0){    
                                             $status_show_park='';        
                                              }
                                              if($show_person==1){     
                                             $status_show_person='show';           
                                              }
                                             if($show_person==0){   
                                             $status_show_person='';         
                                              }
                                               if($show_commision==1){    
                                             $status_show_commision='show';           
                                              }
                                                if($show_commision==0){   
                                             echo  $status_show_commision='';   
                                              }
                                               ?>
                                          <? if($arr[open][price_extra]==1){ 
                                             $res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
                                              $arr[cost] = $db->fetch($res[cost]);     
                                                  ?>
                                          <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="75"> 
                                                   <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;<?=t_china;?>  
                                                   </td>
                                                   <td>
                                                      <span style="display:none<?=$status_show_park?>"><?=t_parking_fee;?>  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_person?>"><?=t_person_fee;?>  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span><span style="display:none<?=$status_show_commision;?>">ค่าคอม  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <? } ?> 
                                          <? if($arr[open][price_all]==1){ 
                                             $res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country=240 and status=1    ORDER BY  sort_country desc limit 1  ");
                                              $arr[cost] = $db->fetch($res[cost]);     
                                                   ?>
                                          <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="75"><img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/>
                                                   <span class="font-20">&nbsp;<?=t_all;?></span></td>
                                                   <td>
                                                      <span style="display:none<?=$status_show_park?>"><?=t_parking_fee;?>  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_person?>"><?=t_person_fee;?>   <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_commision;?>"><?=t_com_fee;?>   <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <? } ?> 
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <?php
                              }
                              $db->closedb ();
                              }
                              
                              if($arr[shop][price_plan_3]>0){
                                                         $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                                         $res[category] = $db->select_query("SELECT * FROM plan_product_price_name  where id=".$arr[shop][price_plan_3]."");
                                                         while($arr[category] = $db->fetch($res[category])){
                                                          $res[open] = $db->select_query("SELECT  * FROM plan_product_price_setting WHERE product_id='".$arr[shop][id]."' and plan_master=3 ");
                                                          $arr[open] = $db->fetch($res[open]);     
                                                            //echo "<option value=\"".$arr[category][id]."\"";
                                                            if($arr[category][id] ==$arr[project][price_plan]){
                                                               //echo " Selected";
                                                            }
                                                            //echo ">".$arr[category][topic_th]." </option>";
                                                            ?>
                           <script>
                              ///
                              $('#show_price_plan_3').click(function(){  
                              $( "#main_load_mod_popup_4" ).toggle();
                              var url_load_1= "load_page_mod_4.php?name=booking/popup&file=price&shop_id=<?=$arr[shop][id]?>&plan=<?=$arr[open][id];?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
                              $('#load_mod_popup_4').html(load_main_mod);
                              $('#load_mod_popup_4').load(url_load_1); 
                              });
                           </script>                    
                           <div class=" " style="margin-left:-5px; border-bottom: dotted #999999 0px;" onclick="ClickPay(3);">
                              <table width="100%" border="0" cellspacing="1" cellpadding="3"  >
                                 <tbody>
                                    <tr>
                                       <td width="30" rowspan="2"  align="center" >
                                          <!-- <input type="radio" name="price_plan" class="price_plan_select genaral" value="<?=$arr[open][plan_id];?>" id="price_plan_3" /></td> -->
                                       <td class="font-22"><b> <?=checkTypePay($arr[category][id]);?> </b></td>
                                       <td width="35" rowspan="2"><a id="show_price_plan_3"><i class="fa fa-search" style=" color:#666666;font-size:18px;"  > </i></a></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <?
                                             $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                                             $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[shop][price_plan_3]."   ");
                                              $arr[price] = $db->fetch($res[price]);
                                             $show_park=$arr[price][price_park];
                                             $show_person=$arr[price][price_person];
                                             $show_commision=$arr[price][price_commision];
                                              if($show_park==1){    
                                             $status_show_park='show';          
                                              }
                                              if($show_park==0){    
                                             $status_show_park='';        
                                              }
                                              if($show_person==1){     
                                             $status_show_person='show';           
                                              }
                                             if($show_person==0){   
                                             $status_show_person='';         
                                              }
                                               if($show_commision==1){    
                                             $status_show_commision='show';           
                                              }
                                                if($show_commision==0){   
                                             echo  $status_show_commision='';   
                                              }
                                               ?>
                                          <? if($arr[open][price_extra]==1){ 
                                             $res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
                                              $arr[cost] = $db->fetch($res[cost]);     
                                                  ?>
                                          <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="75"> <img src="images/flag/China.png" width="25" height="25" alt="" style="margin-top:-5px;"/>
                                                   <span class="font-20">&nbsp;<?=t_china;?> </span></td>
                                                   <td>
                                                      <span style="display:none<?=$status_show_park?>"><?=t_parking_fee;?>  <b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_person?>"><?=t_person_fee;?>  <b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_commision;?>"><?=t_com_fee;?>  <b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <? } ?> 
                                          <? if($arr[open][price_all]==1){ 
                                             $res[cost] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$arr[open][id]." and country=240 and status=1    ORDER BY  sort_country desc limit 1  ");
                                              $arr[cost] = $db->fetch($res[cost]);     
                                                   ?>
                                          <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                             <tbody>
                                                <tr>
                                                   <td width="75">
                                                   <img src="images/flag/Other.png" width="25" height="25" alt="" style="margin-top:-5px;"/><span class="font-20">&nbsp;<?=t_all;?>
                                                   </td>
                                                   <td>
                                                      <span style="display:none<?=$status_show_park?>"><?=t_parking_fee;?><b><?=$arr[cost][price_park_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_person?>"><?=t_person_fee;?><b><?=$arr[cost][price_person_driver]?></b>&nbsp;</span>
                                                      <span style="display:none<?=$status_show_commision;?>"><?=com_fee;?><b><?=$arr[cost][price_commision_driver]?> %</b>&nbsp;</span>
                                                      &nbsp;
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <? } ?> 
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <?php
                              }
                              $db->closedb ();
                              }
                              ?>
                          
                           <!--</select>-->
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <table width="100%" border="0" cellspacing="2" cellpadding="2" id="show_submit" style="margin-top: 15px;">
         <!--<tbody>
            <tr>
               <td width="50%"><button type="reset" class="btn btn-default btn-lg"   id="submit_data_set"   style=" width:100%; margin-top:10px;"> <span id="txt_btn_reset"> รีเซ็ต</span> </button>
               </td>
               <td width="50%"><button type="button" class="btn btn-success btn-lg border-alert"   id="submit_data_update"  style=" width:100%; margin-top:10px;background-color: #3b5998;"> <span id="txt_btn_save">ส่งข้อมูล</span> </button></td>
            </tr>
         </tbody>-->
         <tbody>
            <tr>
               <td><button type="button" class="btn-repair waves-effect btn-other" style="background-color: #3b5998; border-radius: 25px; color:#fff;text-transform: capitalize;width: 100%;"  id="submit_data_update" > <span id="txt_btn_save" class="font-28"><?=t_save_data;?></span> </button></td>
            </tr>
         </tbody>
      </table>
      
   </div>
</form>
<input type="hidden" value="0" id="check_t_h" />						
<input type="hidden" value="0" id="check_t_m" />						
<input type="hidden" value="0" id="check_adult" />							
<input type="hidden" value="0" id="check_child" />	
<input type="hidden" value="0" id="check_show_submit" />	
<input type="hidden" value="<?=$_GET[place];?>" id="product_id" />	
<button onclick="testUnckeck();" id="uncheckBtn" style="display: none;">test</button>
<script>
   function testUnckeck(){
   	$('.genaral').iCheck('uncheck'); 
   	console.log('uncheckBtn');
   }
   var product_id = $('#product_id').val();
   $('#submit_data_set').click(function(){
   	
   	var url_load = "load_page_mod_3.php?name=booking/step&file=booking&driver=<?=$_GET[driver]?>&place=<?=$_GET[place];?>";
     $('#load_mod_popup_3').html(load_main_mod);
     $('#load_mod_popup_3').load(url_load); 
   });
   	
   		
   	
   	
   
</script>
<div  id="send_booking_data"></div>

<script>
   function ClickPay(type){
   	if(type=='1'){
   		$('#price_plan_1').iCheck('check'); 
   	}
   	if(type=='2'){
   		$('#price_plan_2').iCheck('check'); 
   	}
   	if(type=='3'){
   		$('#price_plan_3').iCheck('check'); 
   	}
   }
   $("#submit_data_update").click(function(){
   //  if(document.getElementById('airout_h').value =="" ) {
   // alert('กรุณาเลือกชั่วโมง');
   // document.getElementById('airout_h').focus() ;
   //  return false ;	
   // }
   //  if(document.getElementById('airout_m').value =="" ) {
   //  alert('กรุณาเลือกนาที');
   // document.getElementById('airout_h').focus() ;
   //  return false ;	
   // }
   // 		if(document.getElementById('all_car').value < 1 ) {
   // alert('กรุณาเลือกรถที่ใช้งาน');
   //  return false ;	
   // }
   			// if(document.getElementById('adult').value=="0" && document.getElementById('child').value=="0" ) {
   			// 	alert('กรุณาเลือกจำนวนผู้ใหญ่หรือเด็กอย่างน้อย 1 คน');
   			// 	document.getElementById('adult').focus() ;
   			// 	document.getElementById('child').focus() ;
   			// 	return false ;
   			// }
   // if(document.getElementById('all_car').value < 1 ) {
   // alert('กรุณาเลือกรถที่ใช้งาน');
   //  return false ;	
   // }
   			// var price_plan = $('.price_plan').val();
   //			if(document.getElementById('plan_setting').value==0 ) {
   	// if(document.getElementById('plan_setting').value==0 ) {
   	// 			alert('กรุณาเลือกประเภทค่าตอบแทน');
   	// 		 document.getElementById('price_plan').focus() ;
   	// 			return false ;
   	// 		}
   		// $( "#main_load_mod_popup_4" ).toggle();

   			// var url_load_finish= "load_page_mod_4.php?name=booking/step/load&file=finish&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop&place=<?=$_GET[place]?>";
   			console.log("&adult="+document.getElementById('adult').value+
   			"&child="+document.getElementById('child').value
            +"&time="+document.getElementById('time_num').value
            +"&check_use_car_id="+document.getElementById('check_use_car_id').value          
            +"&car_color="+document.getElementById('car_color').value
            +"car_plate="+document.getElementById('car_plate').value
            +"&plan="+document.getElementById('plan_setting').value
           
            // +"&namedriver="+document.getElementById('namedriver').value
            // +"&guest_name="+document.getElementById('guest_name').value
            +"&program="+document.getElementById('program').value)         
            // +"&guest_name="+document.getElementById('guest_name').value)
   			
   			// $.post('go.php?name=booking&file=savedata&action=add&type=driver&driver=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   //					$('#send_booking_data').html(response);
   					// console.log(response);
                  var place_num = document.getElementById('car_plate').value;
                  console.log(place_num)
   						swal({
   						  title: "ยืนยันข้อมูลส่งแขก ?",
   						  text: "เวลาถึงประมาณ : "+$('#time_num').val()+" น.",
   						  html:false, 
   						  type: "warning",
   						  showCancelButton: true,
   						  confirmButtonClass: "btn-danger",
   						  confirmButtonText: "ยืนยัน",
   						  cancelButtonText: 'ยกเลิก',
   						  closeOnConfirm: false
   						},
   						function(){
                        console.log('<?=$user_id?>');
                        $.post('go.php?name=shop/shop_new&file=save_data&action=add&type=driver&driver=<?=$user_id?>',$('#form_booking').serialize(),function(response){
                            console.log(response)
               $.post('go.php?name=send_messages/send_onesignal.php?key=new_shop',{ driver : "<?=$user_id?>" ,nickname : "<?=$arr[driver][nickname]?>",car_plate : place_num },function(data){
                  console.log(data);
               });
          });
                        swal({
                       title: "ส่งข้อมูลสำเร็จ!",
                       text: "",
                       html:false, 
                       type: "success"
                       // closeOnConfirm: true;
                      
                     }
                     ,
                     function(){
                        $('.close-small-popup').click();
                        $('#index_menu_shopping_history').click();
                     });
   						  // swal("ส่งข้อมูลสำเร็จ !", "ขอบคุณที่ส่งแขก", "warning");
   						 //  $('.button-close-popup-mod-3').click();
   							// $('.button-close-popup-mod-2').click();
   							// $('.button-close-popup-mod-1').click();
   							// $('.button-close-popup-mod').click();
   							
   						});
   				});
   		// });
</script>	
<script>
   $(function () {
   // $('#price_plan_1').iCheck({
   //   checkboxClass: 'icheckbox_square-blue',
   //   radioClass: 'iradio_square-green 1',
   //   increaseArea: '20%' // optional
   // });
   //  $('#price_plan_2').iCheck({
   //   checkboxClass: 'icheckbox_square-blue',
   //   radioClass: 'iradio_square-green 2',
   //   increaseArea: '20%' // optional
   // });
   //   $('#price_plan_3').iCheck({
   //   checkboxClass: 'icheckbox_square-blue',
   //   radioClass: 'iradio_square-green 3',
   //   increaseArea: '20%' // optional
   // });
   });
</script>				
<script>
   $('.price_plan_select').on('ifChecked', function(event){
   	var data_id = $(this).attr("value");
   	if($('#check_t_h').val()==0){
   				alert('กรุณาเลือกชั่วโมง');
   				setTimeout(function(){ $('.'+data_id).removeClass('checked');
   				$('.'+data_id).attr('aria-checked','false');	
   				$( "#target" ).focus();
   				 }, 300);
   				return false;
   			}
   	if($('#check_t_m').val()==0){
   				alert('กรุณาเลือกนาที');
   				setTimeout(function(){ $('.'+data_id).removeClass('checked');
   				$('.'+data_id).attr('aria-checked','false');	 }, 300);
   			    return false;
   	}  
   	if($('#check_adult').val()==0){
   				alert('กรุณาเลือกจำนวนแขกผู้ใหญ่');
   				setTimeout(function(){ $('.'+data_id).removeClass('checked');
   				$('.'+data_id).attr('aria-checked','false');	 }, 300);
   				return false;
   		}
   	if($('#check_child').val()==0){
   					alert('กรุณาเลือกจำนวนแขกเด็ก');
   					setTimeout(function(){  $('.'+data_id).removeClass('checked');
   					$('.'+data_id).attr('aria-checked','false');	 }, 300);
   					return false;
   			}
    $('#plan_setting').val(data_id);
    $('#show_transfer_detail').show();
    $('#show_payment_detail').removeClass('border-alert');
    $('.iradio_square-green').removeClass('border-alert');
    $('#row_accept_payment').show();
   $('#step_1').css('width','60%');
    if($('#check_show_submit').val()==1){
   // 	$('#step_4').show();
   	$('#step_1').css('width','80%');
    $('#show_transfer_detail').removeClass('border-alert');
   	$('#show_submit').show();
   	$('#row_accept_car').show();
   	$('#load_mod_popup_3').animate({ 
    	 scrollTop: $(document).height()//$('#show_transfer_detail').offset().top 
    	 }, 'slow');
    }else{
    	$('#show_transfer_detail').addClass('border-alert');
    	$('#check_show_submit').val(1);
    	$('#load_mod_popup_3').animate({ scrollTop: $('#show_transfer_detail').offset().top }, 'slow');
    }
   });
    
</script>            
<script>
   // startTime();
   // var clock ;
   // function startTime() {
   //     var today = new Date();
   //     var h = today.getHours();
   //     var m = today.getMinutes();
   //     var s = today.getSeconds();
   //     m = checkTime(m);
   //     s = checkTime(s);
   //     document.getElementById('time_book_page').innerHTML = h + ":" + m + ":" + s;
   //     clock = setTimeout(startTime, 1000);
   // }
   // function checkTime(i) {
   //     if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
   //     return i;
   // }
</script>

 <script>
      $(".text-topic-action-mod-3" ).html("<?=$arr[shop][$place_shopping]?>");
   </script>
</div>
<style>
 .btn-repair{
         /* padding: .84rem 2.14rem;*/
         font-size: .81rem;
         -webkit-transition: all .2s ease-in-out;
         transition: all .2s ease-in-out;
/*         margin: .375rem;*/
         border: 0;
         border-radius: .125rem;
         cursor: pointer;
         text-transform: uppercase;
         white-space: normal;
         word-wrap: break-word;
         color: #fff !important;
         box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
         padding: 7px;
         }
         .waves-effect {
         position: relative;
         cursor: pointer;
         overflow: hidden;
         -webkit-user-select: none;
         -moz-user-select: none;
         -ms-user-select: none;
         user-select: none;
         -webkit-tap-highlight-color: transparent;
         z-index: 1;
         }
         .btn-other{
         /*width: 280px;*/
         border-radius : 25px;
         font-size: 24px;
         /*padding-left: 35px;*/
         text-align: center;
         }
   .step-booking
   {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 10px;
   width: 60px;
   height: 60px;
   text-align: justify;
   color: #FFFFFF;
   font-size: 30px;
   font-weight: bold;
   margin-top: -10px;
   text-align: center;
   border: solid 4px #FFFFFF;
   box-shadow: 0 0 0px 0px #E8E6E6;
   position: absolute;
   background: #f39c12 !important;
   color: #fff;
   }
   .step-booking-small
   {
   border-radius: 50%;
   background-color: <?=$main_color?> ;
   padding: 5px;
   width: 40px;
   height: 40px;
   text-align: justify;
   color: #FFFFFF;
   font-size: 20px;
   font-weight: bold;
   text-align: center;
   vertical-align: middle;
   border: solid 4px #FFFFFF;
   background: <?=$main_color?> !important;
   color: #fff;
   }
   .step-booking-small-no
   {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 5px;
   width: 40px;
   height: 40px;
   text-align: justify;
   color: #FFFFFF;
   font-size: 20px;
   font-weight: bold;
   text-align: center;
   border: solid 4px #FFFFFF;
   background: #999999 !important;
   color: #fff;
   }
   .step-booking-active
   {
   text-align: justify;
   color: #FFFFFF;
   border: solid 1px <?=$main_color?>;
   background-color: #F6F6F6;
   color: #fff;
   border-radius: 10px;
   margin-bottom: 10xp;
   }
   .step-booking-active-no
   {
   text-align: justify;
   color: #FFFFFF;
   border: solid 1px #dadada;
   color: #fff;
   border-radius: 10px;
   }
   .label_price_plan{
   vertical-align:top;padding:5px;margin: 4px;
   }
   .stepbar {
   position: fixed;
   width: 100%;
   z-index: 99990;
   /*    margin-top: 0px;*/
   margin-top: 48px;
   /*    top: 55px;*/
   top: 0px;
   left: 0px;
   background-color: #f6f6f6;
   /* border: 1px solid #ddd;*/
   height: 8px;
   }
   .stepbox {
   background-color: #4267b2;
   border: 1px solid #ddd;
   height: 100%;
   }
   .progress-bar{
   /*margin : 1px;*/
   margin-right: 1px;
   /* background-color: rgb(25, 202, 153);*/
   }
      .container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
  border-radius : 20px;
    position: absolute;
    top: -4px;
    left: 0;
    height: 30px;
    width: 30px;
    background-color: #e4e4e4;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 11px;
    top: 6px;
    width: 9px;
    height: 15px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.form_input{
   padding: 5px 22px;
    height: 34px;
    border: solid #3b5998 1px;
    border-radius: 25px;
    width: 100%;
    font-size: 18px;
    display: block;
    line-height: 1.42857143;
    color: #333333;
    background-color: #fff;
    background-image: none;
}
</style>
<script>
    
</script>