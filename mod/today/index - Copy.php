 
 <?
 
if($_GET[day] != ''){
	$_GET[day] = $_GET[day];
}else{
$_GET[day] = date('Y-m-d');
}
 //echo $_SESSION['data_user_driver'];
?>
  
<?
 
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[gg_map] = $db->select_query("SELECT id,map,transferplace_type,star FROM ".TB_transferplace_new."  ");
	while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_map[$arr[gg_map][id]] = $arr[gg_map][map];
		$arr_type[$arr[gg_map][id]] = $arr[gg_map][transferplace_type];
		$arr_star[$arr[gg_map][id]] = $arr[gg_map][star];
 
 
	}
	
$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
$res[gg_map] = $db->select_query("SELECT id,topic,province,amphur FROM ".TB_transferplace."  ");
	while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_t_topic[$arr[gg_map][id]] = $arr[gg_map][topic];
		$arr_t_province[$arr[gg_map][id]] = $arr[gg_map][province];
		$arr_t_amphur[$arr[gg_map][id]] = $arr[gg_map][amphur];
	}	
?>



 <div  id="load_th"  style="display:none ">
  <?  include ("load/page/loading.php");?> 
</div>

 <div  id="load_cn"  style="display:none ">
  <?  include ("load/page/loading.php");?> 
</div>
 

 <!--  datepicker OK --> 
<link href="js/datepick/jquery.datepick.css" rel="stylesheet">
<script src="js/datepick/jquery.plugin.js"></script>
<script src="js/datepick/jquery.datepick.js"></script> 
<script src="js/datepick/datepick.op.js"></script> 
<script type="text/javascript">
// $('#date_report').datepick({altField: '#star_cal' 	, dateFormat: 'yyyy-mm-dd' 	, showTrigger: '#calImgInx' }); 
 

var url_place_th = "go.php?name=load/today&file=all&server=th&day=<?=date('Y-m-d')?>";
	$('#load_th').show();
	$('#load_th').load('load/page/loading.php');
	$('#load_th').load(url_place_th); 
	/*
	//// cn
		var url_place_cn = "go.php?name=load/today&file=all&server=cn&day="+$("#date_report").val()+"";
	$('#load_cn').show();
	$('#load_cn').load('load/page/loading.php');
	$('#load_cn').load(url_place_cn); 
	//$('.loader').show();


*/

        
</script>