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
$start_m = $arr[shop][start_m];
 /*
  	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
  $res[timecar] = $db->select_query("SELECT * FROM use_time  where id=".$_GET[id]."  ORDER BY id  ");
 $arr[timecar] = $db->fetch($res[timecar]) ;
 */
$now = date("H:i:s", time());
$newTime = strtotime("$now");
?>
<?
//date_default_timezone_set("Asia/Bangkok"); 
$date_today = date('Y-m-d')." ".$finish_h.":".$finish_m.":00";

$time_finish = strtotime( $date_today);

$h_now = date('H');
$i_now = date('i');
date_default_timezone_set('UTC'); 
$time_start=time() + 300;
$time_complete =$time_finish-$time_start;
$today_h= date('H');
$time_open_h= date('H',$time_complete);
$time_open_m= date('i',$time_complete);

$test_timestamp = strtotime( '2018-02-20 '.$start_h.':'.$start_m.':00');
$test_timestamp = $test_timestamp - (30 * 60);
$date_start = date("Y-m-d H:i:s", $test_timestamp);
$show_i = date("H:i:s",'1519120800');

$start_h_reduce = date("H", $test_timestamp);
$start_m_reduce = date("i", $test_timestamp);
   ?> 
<script>
//	console.log('<?=$start_h_reduce." : ".$start_m_reduce;?>');
//	console.log('<?=$h_now;?>');
</script>
   <? if($time_complete > 0)
   { 
		if($time_open_h>0){ 
			 	echo $time_open_h." ".t_hour." ";
			 } 
		 	if($time_open_m>0){ 
				echo $time_open_m." ".t_minutes;
		 	 } 
 	?>
   <script>
   $('#btn_open_<?=$_GET[id]?>').show();
   $('#btn_close_<?=$_GET[id]?>').hide();
   $('#status_open_<?=$_GET[id]?>').html('<?=t_open_now;?>');
   $('#tr_time_open_<?=$_GET[id]?>').show();
   </script>
 <? 
 	if($h_now==$start_h_reduce and $i_now>=$start_m_reduce){ ?>
		<script>
     		 $('#status_open_<?=$_GET[id]?>').html('<?=t_open.t_advance_service." 30 ".t_minutes;?>');
		</script>	
		<? 
		}	
 } 
	  else{ ?>
   <script>
   
   $('#btn_open_<?=$_GET[id]?>').hide();
   $('#btn_close_<?=$_GET[id]?>').show();
  $('#tr_time_open_<?=$_GET[id]?>').hide();
   $('#status_open_<?=$_GET[id]?>').html('<font style="color:#ff6666">'+'<?=t_timeout_service;?>'+'</font>');
   </script>
 <? }

if($h_now<$start_h_reduce){
	 ?>
	 <script>
	 console.log('+');
   $('#btn_open_<?=$_GET[id]?>').hide();
   $('#btn_close_<?=$_GET[id]?>').show();
   $('#tr_time_open_<?=$_GET[id]?>').hide();
   $('#status_open_<?=$_GET[id]?>').html('<font style="color:#ff6666">'+'หมดเวลาให้บริการ'+'</font>');
   </script>
<? }else{
	if($h_now==$start_h_reduce and $i_now<$start_m_reduce){ ?>
		<script>
			
			$('#btn_open_<?=$_GET[id]?>').hide();
		    $('#btn_close_<?=$_GET[id]?>').show();
		    $('#tr_time_open_<?=$_GET[id]?>').hide();
		    $('#status_open_<?=$_GET[id]?>').html('<font style="color:#ff6666">'+'หมดเวลาให้บริการ'+'</font>');
		</script>	
	<? }
}
// echo "<br/>".$h." ".$finish_h; ?>
 
 