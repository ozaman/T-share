<?
 $day_now =  date('D');
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
  $res[shop] = $db->select_query("SELECT * FROM  shopping_open_time where product_id=".$_GET[id]." and product_day = '$day_now'     ");
 $arr[shop] = $db->fetch($res[shop]) ;
if($arr[shop][open_always] == 1){
$finish_h =  "23";
$finish_m =  "59";
}else{
$finish_h =  $arr[shop][finish_h];
$finish_m =  $arr[shop][finish_m];
}
$start_h = $arr[shop][start_h];
 /*
  	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
  $res[timecar] = $db->select_query("SELECT * FROM use_time  where id=".$_GET[id]."  ORDER BY id  ");
 $arr[timecar] = $db->fetch($res[timecar]) ;
 */
?>
  <?
//date_default_timezone_set("Asia/Bangkok"); 
 $date_today = date('Y-m-d')." ".$finish_h.":".$finish_m.":00";
//echo "<br />";
     $time_finish =strtotime( $date_today);
//echo "<br />";
$h = date('H');
date_default_timezone_set('UTC'); 
     $time_start=time() + 300;
  $time_complete =$time_finish-$time_start;
    $today_h= date('H');
 $time_open_h= date('H',$time_complete);
	 $time_open_m= date('i',$time_complete);
   ?> 
   <? if($time_complete > 0    ){ 
   ?>
<? if($time_open_h>0){ ?>
<?= $time_open_h?> ชั่วโมง
<? } ?>
<? if($time_open_m>0){ ?>
<?= $time_open_m?> นาที
<? } ?>
   <script>
   $('#btn_open_<?=$_GET[id]?>').show();
   $('#btn_close_<?=$_GET[id]?>').hide();
     $('#status_open_<?=$_GET[id]?>').html('เปิดให้บริการ ');
	   $('#tr_time_open_<?=$_GET[id]?>').show();
   </script>
 <? } 
	else{ ?>
   <script>
   $('#btn_open_<?=$_GET[id]?>').hide();
   $('#btn_close_<?=$_GET[id]?>').show();
  $('#tr_time_open_<?=$_GET[id]?>').hide();
   $('#status_open_<?=$_GET[id]?>').html('<font style="color:#ff6666">'+'หมดเวลาให้บริการ'+'</font>');
   </script>
 <? }
if($h<$start_h){ ?>
	 <script>
   $('#btn_open_<?=$_GET[id]?>').hide();
   $('#btn_close_<?=$_GET[id]?>').show();
  $('#tr_time_open_<?=$_GET[id]?>').hide();
   $('#status_open_<?=$_GET[id]?>').html('<font style="color:#ff6666">'+'หมดเวลาให้บริการ'+'</font>');
   </script>
<? }
// echo "<br/>".$h." ".$finish_h; ?>
 
 