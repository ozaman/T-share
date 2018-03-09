 
 <?
  ///$_GET[pro]=1;        
								
								
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
 
 /*
 echo $_GET[pro];
 
  echo $_GET[price_plan];

 */
 
 
 
 $res[price] = $db->select_query("SELECT * FROM  product_price_list where country=".$_GET[nation]."  and product_id	=".$_GET[pro]." and plan_id=".$_GET[price_plan]." ORDER BY id  ");
                      
 $arr[price] = $db->fetch($res[price]) ;
 
 
   $res[plan] = $db->select_query("SELECT plan_id  FROM plan_product_price_list WHERE  id=".$_GET[price_plan]." ");
 $arr[plan] = $db->fetch($res[plan]);
 
 
 
 
 
 
$number=$_GET[adult];
 
	  
 $res[extra_park] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_id=".$_GET[price_plan]." and type='park' ");
 $arr[extra_park] = $db->fetch($res[extra_park]);
 
$res[extra_person] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_id=".$_GET[price_plan]." and type='person' ");
 $arr[extra_person] = $db->fetch($res[extra_person]);
	    


 
 if( $arr[extra_park][id]) {
	 
	 
 /// echo $arr[extra_park][price_park]; 
	 
$arr[price][price_park]= $arr[extra_park][price_park];	
	 
	 
 }
                
 
  if( $arr[extra_person][id]) {
 
	 
 $arr[price][price_person]= $arr[extra_person][price_person];	
	 
	 
 }
 						 
							 
      ?>
         
          
<? if($_GET[nation]>0 and $_GET[adult] > 0 and $_GET[price_plan] > 0){  ?>       

 

<script>
 
$('#show_price').show();


  document.getElementById('price_park').value=<?=$arr[price][price_park]?>;
    document.getElementById('price_person').value=<?=$arr[price][price_person]?>;
  
 document.getElementById('price_total').value=(parseInt(document.getElementById('adult').value)*parseInt(document.getElementById('price_person').value))+(parseInt(document.getElementById('price_park').value));
 
  
 
 $("#div_price_park").html(document.getElementById('price_park').value);
  $("#div_price_person").html(document.getElementById('price_person').value);
  
    $("#div_price_total").html(document.getElementById('price_total').value);

</script>

<? } else  {  ?>


 <script>
 
 $('#show_price').hide();
 
  document.getElementById('price_park').value=0;
    document.getElementById('price_person').value=0;
  
 document.getElementById('price_total').value=(parseInt(document.getElementById('adult').value)*parseInt(document.getElementById('price_person').value))+(parseInt(document.getElementById('price_park').value));

</script>


<? } ?>


<? if($arr[plan][plan_id]==2 and $_GET[price_plan]<>''){ ?>

 <script>
 
 $('#show_commission').show();
  $('#load_data_commission').show();
 
</script>


<? } ?>

 
<? if($arr[plan][plan_id]==1 and $_GET[price_plan]<>''){ ?>

 <script>
 
$('#show_commission').hide();
$('#load_data_commission').hide();
 
</script>


<? } ?>

 