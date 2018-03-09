 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>

 <?
 
if($_GET[day] != ''){
	$_GET[day] = $_GET[day];
}else{
$_GET[day] = date('Y-m-d');
}
 //echo $_SESSION['data_user_driver'];
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
 

var url_place_th = "go.php?name=load/today&file=index&server=th&day=<?=date('Y-m-d')?>";
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
 