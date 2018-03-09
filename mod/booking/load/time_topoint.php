 
<?
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[shop] = $db->select_query("SELECT * FROM  shopping_product where id=".$_GET[shop_id]."  ORDER BY id  ");
                      
 $arr[shop] = $db->fetch($res[shop]) ;
 
 
 
  	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[timecar] = $db->select_query("SELECT * FROM use_time  where id=".$_GET[id]."  ORDER BY id  ");
                      
 $arr[timecar] = $db->fetch($res[timecar]) ;
 
 
 

?>
 

  <?
 $_GET[time_h]=$arr[timecar] [time_h];
    $_GET[time_m]=$arr[timecar] [time_m];
  
 
 
 
$time_h=$_GET[time_h]*3600;
$time_m=$_GET[time_m]*60;
$time_all=$time_h+$time_m;
  

  ///$_GET[pro]=1;   
  
  
 $time_all=$time_all+time();
 
 
 $time_to= date('H:i',$time_all);
 
  $time_to_h= date('H',$time_all);

  $time_to_m= date('i',$time_all);

$date_to= date("Y-m-d,$_GET[all_time]:00");



   $date_line = date("Y-m-d,19:00:00");

// output
$time_finish =strtotime($date_line);
 
 $time_complete =strtotime($date_to);
 
 
   ?>
                
                
<? if($time_all>$time_finish){ ?>

 <script> 
 
 ///alert ('ถึงสถานที่ส่งเกินเวลาบริการ');
 
 
// $('#text_to_time').html('<span class="font-28" ><font color="#FF0000" ><b><?=$time_to?> น.&nbsp;(<?=$date_to?>)<br><font color="#000000" class="font-22">เกินเวลาให้บริการ รอการยืนยัน');
 
   $('#text_to_time').html('<span class="font-28" ><b><?=$time_to?> น.');    
 
 
 
 ///  $('#text_to_time').html('<span class="font-28" ><font color="#FF0000" ><b><?=$time_to?> น.&nbsp;(<?=$date_to?>)<br><font color="#000000" class="font-22">เกินเวลาให้บริการ รอการยืนยัน');
 
 
 /// $('#text_to_time').addClass("tab_alert");
 
 
   $('#show_to_times_alert').show();
 
  $('#show_to_times_alert').addClass("tab_alert");
  
  $('#show_to_times_alert').html('<span class="font-28" ><font color="#FF0000"   class="font-30">เกินเวลาให้บริการ');
  
  
  $('#submit_booking_step_1').hide();
   $( "#div_submit_booking_step_1" ).hide();
  
  

</script>
<? }  else {
	
	
	if($time_to_m<10){
		
		$time_to_m_zero=0;
	}
	
	
	
	
	
	?>
   
 
 
 <script>
 

 $('#text_to_time').html('<span class="font-28" ><b><?=$time_to?> น.');    
 
     $('#to_detail_step_1').html('&nbsp;<br>เวลาถึงโดยประมาณ&nbsp;<?=$time_to?> น.');
 
 
 
   $('#text_to_time').removeClass("tab_alert");
   
  //  $('#airout_h').val(<?=$time_to_h?>);
	// $('#airout_m').html(<?=$time_to_m_zero?><?=$time_to_m?>);
   
   
  $('#submit_booking_step_1').show();
   $( "#div_submit_booking_step_1" ).show();
  
  
  /// $('#time_to').val(<?=$time_to?> น.);
  
     document.getElementById('airout_h').value='<?=$time_to_h?>'
  
   document.getElementById('airout_m').value='<?=$time_to_m?>'
  
   
   document.getElementById('time_to').value='<?=$time_to?> น.'
   
   
   
      $('#show_to_times_alert').hide();
 
   </script>
            
            
            <? } ?>    
              
 <script>

//$('#text_to_time').html('<span class="font-28" ><b><?=$time_to?> น.&nbsp;(<?=$date_to?>)');

$('#ondate_time').val('<?=$time_complete?>');


 
</script>

                            
<? if($_GET[time_h]<>"" and $_GET[time_m]<>""){  ?>               

<script>
 
$('#show_to_times').show();


 

</script>

<? } else  {  ?>




 <script>
 
 $('#show_to_times').hide();
 
 /*
 
 $('#show_price').hide();
 
  document.getElementById('price_park').value=0;
    document.getElementById('price_person').value=0;
  
 document.getElementById('price_total').value=(parseInt(document.getElementById('adult').value)*parseInt(document.getElementById('price_person').value))+(parseInt(document.getElementById('price_park').value));
 
 
 */

</script>


<? } ?>



 
