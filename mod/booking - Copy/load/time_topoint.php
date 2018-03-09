
<?
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[shop] = $db->select_query("SELECT * FROM  shopping_product where id=".$_GET[shop_id]."  ORDER BY id  ");
                      
 $arr[shop] = $db->fetch($res[shop]) ;

?>
 

  <?
  $_GET[all_time];
 
$time_h=$_GET[time_h]*3600;
$time_m=$_GET[time_m]*60;
$time_all=$time_h+$time_m;
  

  ///$_GET[pro]=1;   
  
  
 $time_all=$time_all+time();
 
 
///$time_to= date('H:i',$time_all);


$date_to= date("Y-m-d,$_GET[all_time]:00");



   $date_line = date("Y-m-d,19:00:00");

// output
 $time_finish =strtotime($date_line);
 
 $time_complete =strtotime($date_to);
 
 
   ?>
                
                
<? if($time_all>$time_finish){ ?>

 <script> 
 
 ///alert ('ถึงสถานที่ส่งเกินเวลาบริการ');
 
 
 $('#text_to_time').html('<span class="font-28" ><font color="#FF0000" ><b><?=$time_to?> น.&nbsp;(<?=$date_to?>)<br><font color="#000000" class="font-22">เกินเวลาให้บริการ รอการยืนยัน');
 
 
  $('#text_to_time').addClass("tab_alert");

</script>
<? }  else {?>
   
 
 
 <script>

 $('#text_to_time').html('<span class="font-28" ><b><?=$time_to?> น.&nbsp;(<?=$date_to?>)');    
 
   $('#text_to_time').removeClass("tab_alert");
 
   </script>
            
            
            <? } ?>    
              
 <script>

//$('#text_to_time').html('<span class="font-28" ><b><?=$time_to?> น.&nbsp;(<?=$date_to?>)');

$('#ondate_time').val('<?=$time_complete?>');


 
</script>

                            
<? if($_GET[time_h]<>"" and $_GET[time_m]<>""){  ?>               

<script>
 
$('#show_to_time').show();


 

</script>

<? } else  {  ?>




 <script>
 
 $('#show_to_time').hide();
 
 /*
 
 $('#show_price').hide();
 
  document.getElementById('price_park').value=0;
    document.getElementById('price_person').value=0;
  
 document.getElementById('price_total').value=(parseInt(document.getElementById('adult').value)*parseInt(document.getElementById('price_person').value))+(parseInt(document.getElementById('price_park').value));
 
 
 */

</script>


<? } ?>


