 
<?
/*
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[shop] = $db->select_query("SELECT * FROM  shopping_product where id=".$_GET[shop_id]."  ORDER BY id  ");
                      
 $arr[shop] = $db->fetch($res[shop]) ;
 
 
 
  	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[timecar] = $db->select_query("SELECT * FROM use_time  where id=".$_GET[id]."  ORDER BY id  ");
                      
 $arr[timecar] = $db->fetch($res[timecar]) ;
 
 */
 

?>
 

  <?
  /*
  
  
 $_GET[time_h]=$arr[timecar] [time_h];
    $_GET[time_m]=$arr[timecar] [time_m];
  
 
 
 
$time_h=$_GET[time_h]*3600;
$time_m=$_GET[time_m]*60;
$time_all=$time_h+$time_m;
  

  ///$_GET[pro]=1;   
  
  // -25200
 $time_all=$time_all+time();
 
 
 $time_to= date('H:i',$time_all);
 
  $time_to_h= date('H',$time_all);

  $time_to_m= date('i',$time_all);

$date_to= date("Y-m-d,$_GET[all_time]:00");


*/
//$date_line = date("Y-m-d,19:00");

// output
 $time_finish =strtotime( date("Y-m-d,19:00"));

 $time_start=time();

 
 $time_complete =$time_finish-$time_start;


 
 
 
   ?>
   
   <? if($time_complete > 0){ 
   
   echo   $time_open= date('H:i:s',$time_complete);
   
   
   ?>
   
   <script>
   
   $('#btn_open_<?=$_GET[id]?>').show();
   $('#btn_close_<?=$_GET[id]?>').hide();
   
     $('#status_open_<?=$_GET[id]?>').html('เปิดให้บริการ');
	 
	   $('#tr_time_open_<?=$_GET[id]?>').show();
   
   
   </script>
                
 <? } ?>
 
 
    <? if($time_complete < 1){ ?>
   
   <script>
   
   $('#btn_open_<?=$_GET[id]?>').hide();
   $('#btn_close_<?=$_GET[id]?>').show();
   
  $('#tr_time_open_<?=$_GET[id]?>').hide();
  
   
   $('#status_open_<?=$_GET[id]?>').html('หมดเวลาให้บริการ');
   
  
   
   
   
   
   </script>
                
 <? } ?>
 
 
 