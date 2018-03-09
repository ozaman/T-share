<?
$transferlurl="https://goldenbeachgroup.com/";
 //$transferlurl="http://localhost/golden/server/store/best/booking/";
?>
<script src="js/jquery-main.js"></script> 
<div id="load_update_th"></div>
<div id="load_update_cn"></div>
<script>

   
$('#load_update_th').load('load/page/loading.php');
$('#load_update_th').load('<?=$transferlurl?>/app/crontab/update/driver_report_th.php?driver=<?=$user_id?>');
//$('#load_update_th').load('load/page/loading.php');
$('#load_update_th').load('<?=$transferlurl?>/app/crontab/update/driver_report_cn.php?driver=<?=$user_id?>');

//alert(0);
</script>

