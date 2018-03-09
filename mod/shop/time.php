 
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
  
date_default_timezone_set("Asia/Bangkok"); 
 
 $time_finish =strtotime( date("Y-m-d,19:00:00"));
 
 

 date_default_timezone_set('UTC'); 

 $time_start=time();
 
  $time_complete =$time_finish-$time_start;
 
 echo "<br>";

 $time_open= date('H:i',$time_complete);
 
 
   ?>
   
   <? if($time_complete > 0){ 
   
  // echo   $time_open= date('H:i',$time_complete);
 
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
 
 
 