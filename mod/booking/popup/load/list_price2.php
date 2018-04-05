<style>
   .number_price 
   { 
	   padding-top:5px; 
	   width:80px; 
	   text-align:right; 
	   padding-right:15px;
   }
</style>
<?
   $_GET[type]=$_GET[plan_type];
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE id='".$_GET[plan_setting]."' ");
   $arr[open] = $db->fetch($res[open]);
   // echo $_GET[plan_setting];
   ?>
<? if(0==0){ ?>
<script>
   $('.check_load_park_counter').hide();
   $('.check_load_person_counter').hide();
   $('.check_load_commision_counter').hide();
</script>
<? } ?>
<? if(0==0){ ?>
<script>
   $('.check_load_park_all').hide();
   $('.check_load_person_all').hide();
   $('.check_load_commision_all').hide();
</script>
<? } ?>
<? if($arr[open] [open_driver]==0){ ?>
<script>
   $('.check_load_park_driver').hide();
   $('.check_load_person_driver').hide();
   $('.check_load_commision_driver').hide();
</script>
<? } ?>
<?
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
    $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[open][plan_id]."   ");
    $arr[price] = $db->fetch($res[price]);
   $show_park=$arr[price][price_park];
   $show_person=$arr[price][price_person];
   $show_commision=$arr[price][price_commision];
    if($show_park==1){	  
   $status_show_park='show';	   	  
    }
    if($show_park==0){	  
   $status_show_park='hide';	  	  
    }
    if($show_person==1){	  
   $status_show_person='show';	   	  
    }
   if($show_person==0){	  
   $status_show_person='hide';	    	  
    }
     if($show_commision==1){	  
   $status_show_commision='show';	   	  
    }
      if($show_commision==0){	  
   $status_show_commision='hide';	  
    }
    //echo $arr[place][price_plan];
    $tb_w='300';
    ?>
<script>
   $('#main_td_park').<?=$status_show_park?>();
   $('#main_td_person').<?=$status_show_person?>();
   $('#main_td_commision').<?=$status_show_commision?>();
   $('.main_td_park').<?=$status_show_park?>();
   $('.main_td_person').<?=$status_show_person?>();
   $('.main_td_commision').<?=$status_show_commision?>();
     
</script>
<? if($show_commision==1){?>
<script>
   $('.main_td_all').hide();
</script>
<? } ?>
<?
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   if($_GET[type]=='all'){
   $res[shop] = $db->select_query("SELECT country,id FROM  product_price_list_all where  plan_setting=".$_GET[plan_setting]." and country=240   ORDER BY id  ");
   }
     if($_GET[type]=='extra'){
   $res[shop] = $db->select_query("SELECT country,id FROM  product_price_list_all where  plan_setting=".$_GET[plan_setting]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
   }
   ?>
<?			  
   while($arr[shop] = $db->fetch($res[shop])){  
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[nation] = $db->select_query("SELECT * FROM  web_country where  id=".$arr[shop][country]."  ORDER BY sort_country desc"); 
   $arr[nation] = $db->fetch($res[nation]) ;
   ?>
<?
   $_GET[control]='user';
   $max=16;
   for($park=1;$park<$max;$park++){
   $number=$park;
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[price] = $db->select_query("SELECT * FROM  product_price_list_all where  id=".$arr[shop][id]."");
   $arr[price] = $db->fetch($res[price]) ;
   $res[extra_park] = $db->select_query("SELECT id,price_park_company,price_park_driver,price_park_counter,price_park_all FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='park' and plan_type='".$_GET[type]."' and control='user' and pay_type='driver'");
   $arr[extra_park] = $db->fetch($res[extra_park]);
   $res[extra_park_driver] = $db->select_query("SELECT id,price_park_company,price_park_driver,price_park_counter,price_park_all FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='park' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='driver'");
   $arr[extra_park] = $db->fetch($res[extra_park_driver]);
   $res[extra_person] = $db->select_query("SELECT id,price_person_company,price_person_driver,price_person_counter,price_person_all FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_id=".$_GET[plan_setting]." and type='person' and plan_type='".$_GET[type]."' and control='user' ");
   $arr[extra_person] = $db->fetch($res[extra_person]);
   $res[extra_com] = $db->select_query("SELECT id,price_commision_company,price_commision_driver,price_commision_counter,price_commision_all FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_id=".$_GET[plan_setting]." and type='commision' and plan_type='".$_GET[type]."' and control='user' ");
   $arr[extra_commision] = $db->fetch($res[extra_com]);
   $price_park_company=$arr[price][price_park_company];  
   $price_park_driver=$arr[price][price_park_driver];
   $price_park_counter=$arr[price][price_park_counter];
   $price_park_all=$arr[price][price_park_all];
   if( $arr[extra_park][id] ) {
   $price_park_company=$arr[extra_park][price_park_company];  
   $price_park_driver=$arr[extra_park][price_park_driver];
   $price_park_counter=$arr[extra_park][price_park_counter];
   $price_park_all=$arr[extra_park][price_park_all];
   }
   $all_price_park_company=$price_park_company*$number;
   $all_price_park_driver=$price_park_driver*$number;
   $all_price_park_counter=$price_park_counter*$number;
   $all_price_park_all=$price_park_all*$number;
   $price_person_company=$arr[price][price_person_company];
   $price_person_driver=$arr[price][price_person_driver];
   $price_person_counter=$arr[price][price_person_counter];
   $price_person_all=$arr[price][price_person_all];
   if( $arr[extra_person][id] ) {
   $price_person_company=$arr[extra_person][price_person_company];  
   $price_person_driver=$arr[extra_person][price_person_driver];
   $price_person_counter=$arr[extra_person][price_person_counter];
   $price_person_all=$arr[extra_person][price_person_all];
   }
   $all_price_person_company=$price_person_company*$number;
   $all_price_person_driver=$price_person_driver*$number;
   $all_price_person_counter=$price_person_counter*$number;
   $all_price_person_all=$price_person_all*$number;
   $price_commision_company=$arr[price][price_commision_company];
   $price_commision_driver=$arr[price][price_commision_driver];
   $price_commision_counter=$arr[price][price_commision_counter];
   $price_commision_all=$arr[price][price_commision_all];
   if( $arr[extra_commision][id] ) {
   $price_commision_company=$arr[extra_commision][price_commision_company];  
   $price_commision_driver=$arr[extra_commision][price_commision_driver];
   $price_commision_counter=$arr[extra_commision][price_commision_counter];
   $price_commision_all=$arr[extra_commision][price_commision_all];
   }
   $all_price_commision_company=$price_commision_company;
   $all_price_commision_driver=$price_commision_driver ;
   $all_price_commision_counter=$price_commision_counter;
   $all_price_commision_all=$price_commision_all;
   ///////////
   //echo $_GET[plan_setting];
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[extra_park_company] = $db->select_query("SELECT id,price_main FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='park' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='company'");
   $arr[extra_park_company] = $db->fetch($res[extra_park_company]);
   $res[extra_park_driver] = $db->select_query("SELECT id,price_main FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='park' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='driver'");
   $arr[extra_park_driver] = $db->fetch($res[extra_park_driver]);
   $res[extra_park_counter] = $db->select_query("SELECT id,price_main FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='park' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='counter'");
   $arr[extra_park_counter] = $db->fetch($res[extra_park_counter]);
   $res[extra_park_all] = $db->select_query("SELECT id,price_main FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='park' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='all'");
   $arr[extra_park_all] = $db->fetch($res[extra_park_all]);
   ////
   $res[extra_person_company] = $db->select_query("SELECT id,price_main FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='person' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='company'");
   $arr[extra_person_company] = $db->fetch($res[extra_person_company]);
   $res[extra_person_driver] = $db->select_query("SELECT id,price_main FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='person' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='driver'");
   $arr[extra_person_driver] = $db->fetch($res[extra_person_driver]);
   $res[extra_person_counter] = $db->select_query("SELECT id,price_main FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='person' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='counter'");
   $arr[extra_person_counter] = $db->fetch($res[extra_person_counter]);
   $res[extra_person_all] = $db->select_query("SELECT id,price_main FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='person' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='all'");
   $arr[extra_person_all] = $db->fetch($res[extra_person_all]);
   /////
   $res[extra_commision_company] = $db->select_query("SELECT id,price_main FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='commision' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='company'");
   $arr[extra_commision_company] = $db->fetch($res[extra_commision_company]);
   $res[extra_commision_driver] = $db->select_query("SELECT id,price_main FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='commision' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='driver'");
   $arr[extra_commision_driver] = $db->fetch($res[extra_commision_driver]);
   $res[extra_commision_counter] = $db->select_query("SELECT id,price_main FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='commision' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='counter'");
   $arr[extra_commision_counter] = $db->fetch($res[extra_commision_counter]);
   $res[extra_commision_all] = $db->select_query("SELECT id,price_main FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='commision' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='all'");
   $arr[extra_commision_all] = $db->fetch($res[extra_commision_all]);
   ///
   $price_park_company=$arr[price][price_park_company];  
   $price_park_driver=$arr[price][price_park_driver];
   $price_park_counter=$arr[price][price_park_counter];
   $price_park_all=$arr[price][price_park_all];
   ////
   if($arr[extra_park_company][id]) {
   $price_park_company=$arr[extra_park_company][price_main];  
   }
   if($arr[extra_park_driver][id]) {
   $price_park_driver=$arr[extra_park_driver][price_main];  
   }
   if($arr[extra_park_counter][id]) {
   $price_park_counter=$arr[extra_park_counter][price_main];  
   }
   if($arr[extra_park_all][id]) {
   $price_park_all=$arr[extra_park_all][price_main];  
   }  
   /////
   $all_price_park_company=$price_park_company*$number;
   $all_price_park_driver=$price_park_driver*$number;
   $all_price_park_counter=$price_park_counter*$number;
   $all_price_park_all=$price_park_all*$number;
   $price_person_company=$arr[price][price_person_company];
   $price_person_driver=$arr[price][price_person_driver];
   $price_person_counter=$arr[price][price_person_counter];
   $price_person_all=$arr[price][price_person_all];
   ////
   if($arr[extra_person_company][id]) {
   $price_person_company=$arr[extra_person_company][price_main];  
   }
   if($arr[extra_person_driver][id]) {
   $price_person_driver=$arr[extra_person_driver][price_main];  
   }
   if($arr[extra_person_counter][id]) {
   $price_person_counter=$arr[extra_person_counter][price_main];  
   }
   if($arr[extra_person_all][id]) {
   $price_person_all=$arr[extra_person_all][price_main];  
   }  
   /////
   $all_price_person_company=$price_person_company*$number;
   $all_price_person_driver=$price_person_driver*$number;
   $all_price_person_counter=$price_person_counter*$number;
   $all_price_person_all=$price_person_all*$number;
   $price_commision_company=$arr[price][price_commision_company];
   $price_commision_driver=$arr[price][price_commision_driver];
   $price_commision_counter=$arr[price][price_commision_counter];
   $price_commision_all=$arr[price][price_commision_all];
   ////
   if($arr[extra_commision_company][id]) {
   $price_commision_company=$arr[extra_commision_company][price_main];  
   }
   if($arr[extra_commision_driver][id]) {
   $price_commision_driver=$arr[extra_commision_driver][price_main];  
   }
   if($arr[extra_commision_counter][id]) {
   $price_commision_counter=$arr[extra_commision_counter][price_main];  
   }
   if($arr[extra_commision_all][id]) {
   $price_commision_all=$arr[extra_commision_all][price_main];  
   }  
   /////
   $all_price_commision_company=$price_commision_company;
   $all_price_commision_driver=$price_commision_driver ;
   $all_price_commision_counter=$price_commision_counter;
   $all_price_commision_all=$price_commision_all;
   		  ?>
<table width="350" border="0" cellspacing="0" cellpadding="0"  class="box-bottom-lines" style="padding-top:0px;">
   <tr>
      <td width="30">
         <? if($park==1){?>
         <div class="font-26">
            <center>
            	<b><?=t_person;?></b>
            </center>
         </div>
         <?
            ///   echo $_GET[plan_setting];
              } ?>
         <? //=$_GET[plan_setting]?>
         <table width="50" border="0" align="center" cellpadding="2" cellspacing="2" >
            <tbody>
               <tr>
                  <td width="70" align="center" valign="top" bgcolor="#C7EAFB" style="display:none">
                     <? if($park==1){?>
                     <strong>บริษัท</strong>
                     <? } ?>
                     <div class="number_price font-22" >
                        <?= number_format($price_park_company, 0 );?>
                     </div>
                  </td>
                  <td width="70" align="center" valign="top" bgcolor="#F6F6F6" class="check_load_park_driver">
                     <div class="number_price font-22" style="width:40px;"><B><?= number_format($park, 0 );?></div>
                  </td>
                  <td width="70" align="center" valign="top" bgcolor="#C7EAFB" class="check_load_park_counter">
                     <? if($park==1){?>
                     <strong> เคาน์เตอร์ </strong>
                     <? } ?>
                     <div class="number_price font-22">
                        <?= number_format($price_park_counter, 0 );?>
                     </div>
                  </td>
                  <td width="70" align="center" valign="top" bgcolor="#C7EAFB" class="check_load_park_all">
                     <? if($park==1){?>
                     <strong>สมาชิก</strong>
                     <? } ?>
                     <div class="number_price font-22">
                        <?= number_format($price_park_all, 0 );?>
                     </div>
                  </td>
               </tr>
            </tbody>
         </table>
      </td>
      <td class="font-22">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
               <tr>
                  <td bgcolor="#FFF" class="main_td_park">
                     <? if($park==1){?>
                     <div class="font-26">
                        <center>
                        <b><?=t_person;?></b>
                        </center>
                     </div>
                     <? } ?> 
                     <table width="50" border="0" align="center" cellpadding="2" cellspacing="2" >
                        <tbody>
                           <tr>
                              <td width="70" align="center" valign="top" bgcolor="#C7EAFB" style="display:none">
                                 <? if($park==1){?><strong>บริษัท</strong>   <? } ?>        
                                 <div class="number_price font-22"><?= number_format($price_park_company, 0 );?></div>
                              </td>
                              <td width="70" align="center" valign="top" bgcolor="#C7EAFB" class="check_load_park_driver">
                                 <? if(0==1){?><strong> คนขับ </strong>  <? } ?>
                                 <div class="number_price font-22"><?= number_format($price_park_driver, 0 );?></div>
                              </td>
                              <td width="70" align="center" valign="top" bgcolor="#C7EAFB" class="check_load_park_counter">
                                 <? if($park==1){?><strong> เคาน์เตอร์ </strong><? } ?>
                                 <div class="number_price font-22"><?= number_format($price_park_counter, 0 );?></div>
                              </td>
                              <td width="70" align="center" valign="top" bgcolor="#C7EAFB" class="check_load_park_all">
                                 <? if($park==1){?><strong>สมาชิก</strong><? } ?>                       
                                 <div class="number_price font-22"><?= number_format($price_park_all, 0 );?></div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
                  <td bgcolor="#FFF" class="main_td_person">
                     <? if($park==1){?>
                     <div class="font-26">
                        <center>
                        <b>ค่าหัว
                     </div>
                     <? } ?>
                     <table width="50" border="0" align="center" cellpadding="2" cellspacing="2" >
                        <tbody>
                           <tr>
                              <td width="70" align="center" valign="top" bgcolor="#FFFDE9"  style="display:none">
                                 <? if($park==1){?>
                                 <strong>บริษัท</strong>
                                 <? } ?>                    
                                 <div class="number_price font-22"><?= number_format($all_price_person_company, 0 );?></div>
                              </td>
                              <td width="70" align="center" valign="top" bgcolor="#FFFDE9" class="check_load_person_driver">
                                 <span class="check_load_park_driver">
                                 <? if(0==1){?>
                                 <strong> คนขับ </strong>
                                 <? } ?>
                                 </span>                    
                                 <div class="number_price font-22"><?= number_format($all_price_person_driver, 0 );?></div>
                              </td>
                              <td width="70" align="center" valign="top" bgcolor="#FFFDE9" class="check_load_person_counter">
                                 <strong>  <span class="check_load_park_counter">
                                 <? if($park==1){?>
                                 <strong> เคาน์เตอร์ </strong>
                                 <? } ?>
                                 </span></strong>
                                 <div class="number_price font-22"><?= number_format($all_price_person_counter, 0 );?></div>
                              </td>
                              <td width="70" align="center" valign="top" bgcolor="#FFFDE9" class="check_load_person_all">
                                 <span class="check_load_park_all">
                                 <? if($park==1){?>
                                 <strong>สมาชิก</strong>
                                 <? } ?>
                                 </span>                    
                                 <div class="number_price font-22"><?= number_format($all_price_person_all, 0 );?></div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
                  <td width="25" bgcolor="#FFF" class="main_td_commision">
                     <? if($park==1){?>
                     <div class="font-26">
                        <center>
                        <b>ค่าคอม
                     </div>
                     <? } ?>
                     <table width="50" border="0" align="center" cellpadding="2" cellspacing="2" >
                        <tbody>
                           <tr>
                              <td width="70" align="center" valign="top" bgcolor="#E9FBCF"  style="display:none">
                                 <? if($park==1){?>
                                 <strong>บริษัท</strong>
                                 <? } ?>                    
                                 <div class="number_price font-22"><?= number_format($all_price_commision_company, 0 );?></div>
                              </td>
                              <td width="70" align="center" valign="top" bgcolor="#E9FBCF" class="check_load_commision_driver">
                                 <span class="check_load_park_driver">
                                 <? if(0==1){?>
                                 <strong> คนขับ </strong>
                                 <? } ?>
                                 </span>   
                                 <div class="number_price font-22"><?= number_format($all_price_commision_driver, 0 );?>%</div>
                              </td>
                              <td width="70" align="center" valign="top" bgcolor="#E9FBCF" class="check_load_commision_counter">
                                 <strong><span class="check_load_park_counter">
                                 <? if($park==1){?>
                                 <strong> เคาน์เตอร์ </strong>
                                 <? } ?>
                                 </span></strong>                    
                                 <div class="number_price font-22"><?= number_format($all_price_commision_counter, 0 );?></div>
                              </td>
                              <td width="70" align="center" valign="top" bgcolor="#E9FBCF" class="check_load_commision_all">
                                 <span class="check_load_park_all">
                                 <? if($park==1){?>
                                 <strong>สมาชิก</strong>
                                 <? } ?>
                                 </span>                    
                                 <div class="number_price font-22"><?= number_format($all_price_commision_all, 0 );?></div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
                  <td bgcolor="#FFF" >
                     <div class="main_td_all">
                        <? if($park==1){?>
                        <div class="font-26">
                           <center>
                           <b>รวม
                        </div>
                        <? } ?>
                     </div>
                     <table width="50" border="0" align="center" cellpadding="2" cellspacing="2" >
                        <tbody>
                           <tr>
                              <td width="70" align="center" valign="top" bgcolor="#F6F6F6"  style="display:none">
                                 <? if($park==1){?>
                                 <strong>บริษัท</strong>
                                 <? } ?>
                                 <div class="number_price font-22">
                                    <?= number_format($all_price_commision_company, 0 );?>
                                 </div>
                              </td>
                              <td width="70" align="center" valign="top" bgcolor="#Fff" class="check_load_commision_driver">
                                 <span class="check_load_park_driver">
                                 <? if(0==1){?>
                                 <strong> คนขับ </strong>
                                 <? } ?>
                                 </span>
                                 <div class="number_price font-22"> 
                                    <? if($price_commision_driver<1){?>
                                    <?= number_format($all_price_person_driver+$price_park_driver, 0 );?>
                                    <? } else { ?>  <? } ?>
                                 </div>
                              </td>
                              <td width="70" align="center" valign="top" bgcolor="#F6F6F6" class="check_load_commision_counter">
                                 <strong><span class="check_load_park_counter">
                                 <? if($park==1){?>
                                 <strong> เคาน์เตอร์ </strong>
                                 <? } ?>
                                 </span></strong>
                                 <div class="number_price font-22">
                                    <?= number_format($all_price_commision_counter, 0 );?>
                                 </div>
                              </td>
                              <td width="70" align="center" valign="top" bgcolor="#F6F6F6" class="check_load_commision_all">
                                 <span class="check_load_park_all">
                                 <? if($park==1){?>
                                 <strong>สมาชิก</strong>
                                 <? } ?>
                                 </span>
                                 <div class="number_price font-22">
                                    <?= number_format($all_price_commision_all, 0 );?>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
      </td>
   </tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="box-bottom-line" style="padding-top:5px; display:none">
   <tr>
      <td align="center" class="font-22"> 
         <?=$park?> 
      </td>
      <td width="70" align="right" class="font-22"><?=$price_park_unit?> &nbsp;</td>
      <td width="70" align="right" class="font-22"><?= number_format($price_person_total, 0 );?>&nbsp; </td>
      <td width="70" align="right" class="font-22"><?= number_format($price_all_total, 0 );?>&nbsp; </td>
   </tr>
</table>
<?  } ?>
<? } ?>
<br>
<br>