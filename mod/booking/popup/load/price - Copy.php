 <?
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[shop] = $db->select_query("SELECT * FROM  shopping_product where id=".$_GET[shop_id]."  ORDER BY id  ");
                      
 $arr[shop] = $db->fetch($res[shop]) ;
?> 
 <style>
   .div-all-palce{
	 padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#F6F6F6;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ;
	 
 }
 
 
 </style>
 
 

  <div style="margin-top:10px;">
 
  
  <?
  $res[plan] = $db->select_query("SELECT plan_id  FROM plan_product_price_list WHERE  id=".$_GET[plan_id]." ");
 $arr[plan] = $db->fetch($res[plan]);
 

?>

 
  
  
  
  
  
  
<div class="topicname">ค่าจอด ค่าหัว</div>
  
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
 
    <tr>
      <td align="center" bgcolor="#F6F6F6"> 
            <div class="font-22"><b>สัญชาติ</div>
  
 
 </td>
      <td width="80" align="center" bgcolor="#F6F6F6"><div class="font-22"><b>ค่าจอด</div></td>
      <td width="80" align="center" bgcolor="#F6F6F6"><div class="font-22"><b>ค่าหัว/คน</div></td>
 
    </tr>
 
 
</table> 












 
<?

  ////// จีน
 
 
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[shop] = $db->select_query("SELECT * FROM  product_price_list where product_id=".$_GET[shop_id]."  and  plan_id=".$_GET[plan_id]." and master=1  ORDER BY id  ");
                      
 while($arr[shop] = $db->fetch($res[shop])){  
 
 
 
 
	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
 							  
$res[nation] = $db->select_query("SELECT * FROM  web_country where  id=".$arr[shop][country]."  ORDER BY sort_country desc"); 
$arr[nation] = $db->fetch($res[nation]) ;



 
 

?>



 
 
 
 <?  if ($arr[nation][status]==1){ ?>
 
 <table width="100%" border="0" cellspacing="1" cellpadding="1"  class="box-bottom-line" style="padding-top:5px;">
 
    <tr>
      <td> 
            <div class="font-20"><img src="images/flag/<?=$arr[nation][name_en]?>.png" width="40" height="40" alt="" style="margin-top:-5px;"/> &nbsp;<?=$arr[nation][name_th]?> </div>
 
 </td>
      <td width="80" align="center" class="font-22"><?=$arr[shop][price_park]?> </td>
      <td width="80" align="center" class="font-22"><?=$arr[shop][price_person]?></td>
 
    </tr>
 
</table>

<? } ?>
 
 

 
  <div>

<? } ?>



<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="box-bottom-line" style="padding-top:5px;">
 
    <tr>
      <td align="center" bgcolor="#F6F6F6" class="font-22"><strong>จำนวนคน 
              
 
      </strong></td>
      <td width="70" align="center" bgcolor="#F6F6F6" class="font-22"><strong>ค่าจอด  </strong></td>
      <td width="70" align="center" bgcolor="#F6F6F6" class="font-22"><strong>ค่าหัว  </strong></td>
      
            <td width="70" align="center" bgcolor="#F6F6F6" class="font-22"><strong>รวม </strong></td>
 
    </tr>
 
</table>

 

<div  style="padding:5px;">



 
               <?
			   
 
 
 
 
		 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[check] = $db->select_query("SELECT * FROM  plan_product_price_list  where   id=".$_GET[plan_id]." ORDER BY id  ");
 $arr[check] = $db->fetch($res[check]) ;	   
 
 
 $max=$arr[check][max_person]+1;
 
 $max=13;
			   
			  
  for($park=1;$park<$max;$park++){
 
 
 $number=$park;
 
  $_GET[shop_id];
 
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[price] = $db->select_query("SELECT * FROM  product_price_list where country='45'  and product_id=".$_GET[shop_id]." and plan_id=".$_GET[plan_id]." ORDER BY id  ");
 $arr[price] = $db->fetch($res[price]) ;
	  
	  
 $res[extra_park] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_id=".$_GET[plan_id]." and type='park' ");
 $arr[extra_park] = $db->fetch($res[extra_park]);
 
 
$res[extra_person] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_id=".$_GET[plan_id]." and type='person' ");
 $arr[extra_person] = $db->fetch($res[extra_person]);
	  
	  
	  
	  
$price_park_unit=$arr[price][price_park];
  $price_person_unit=$arr[price][price_person];


 if( $arr[extra_park][id]) {
$price_park_unit=$arr[extra_park][price_park];	
 
 }
                
 
  if( $arr[extra_person][id]) {	 
$price_person_unit=$arr[extra_person][price_person];	
 
	 	 
 }
 			
	  
	  
	  $price_person_total=$price_person_unit*$number;
					
 $price_all_total=$price_person_total+$price_park_unit;
	  
	  
				  
				  ?>
 <table width="100%" border="0" cellspacing="1" cellpadding="1"  class="box-bottom-line" style="padding-top:5px;">
 
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
 
 
 
</div>







 <?
   if($arr[plan][plan_id]==2){ ?>
   
   
   
<script>
   
       var url_load_price= "popup.php?name=booking/load&file=com&pro=<?=$_GET[shop_id]?>&price_plan=<?=$_GET[plan_id]?>";
 
 
 
 $('#load_data_commission_popup').load(url_load_price); 
   
   </script>
   
   
   
	 
<div class="<?= $coldata?>" id="show_commission_popup" style="display:nones">
              <div>
                <div class="topicname">ค่าคอมมิชชั่น</div>
                 
 <div id="load_data_commission_popup" class="div-all-palce">
 
 
 </div>
                
   		      </div> 
                
  </div>     
  
  
<?  } ?>

</div>