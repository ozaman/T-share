 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css"> 
<script src="js/jquery-main.js"></script> 
<script   src="calendar/js/th.js"></script>

<script>
  $(function(){
 
	$("#date_report").datepicker({ dateFormat: 'yy-mm-dd',
	dateFormat: 'yy-mm-dd',
	todayHighlight: true,
	minDate: '-1Y', maxDate: '+0Y',
	showOn: 'button', 
	buttonImage: 'calendar/dateselect.gif',
	 buttonImageOnly: true ,    
  numberOfMonths: 1,
	 
	 }
 
	);
 
});
  </script> 
  
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td width="60" style="font-size:16px "><strong>วันที่ : </strong></td>
          <td width="150"><input type="text"     maxlength="10" value="<?=date('Y-m-d');?>"  name="date_report" id="date_report" style="width: 100px"></td>
          <td>  <button type="button" id="btn_form" class="btn btn-block btn-primary btn-fx"  style="width:80px; height:30px; ">ค้นหา</button></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[web_user] = $db->select_query("SELECT * FROM web_driver WHERE username='".$_SESSION['data_user_name']."'    "); 
$arr[web_user] = $db->fetch($res[web_user]);
$user_id =  $_SESSION['data_user_id'];
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[gg_map] = $db->select_query("SELECT id,map,transferplace_type,star FROM ".TB_transferplace_new."  ");
	while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_map[$arr[gg_map][id]] = $arr[gg_map][map];
		$arr_type[$arr[gg_map][id]] = $arr[gg_map][transferplace_type];
		$arr_star[$arr[gg_map][id]] = $arr[gg_map][star];
	}
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[gg_map] = $db->select_query("SELECT id,topic,province,amphur FROM ".TB_transferplace."  ");
	while($arr[gg_map] = $db->fetch($res[gg_map])){
		$arr_t_topic[$arr[gg_map][id]] = $arr[gg_map][topic];
		$arr_t_province[$arr[gg_map][id]] = $arr[gg_map][province];
		$arr_t_amphur[$arr[gg_map][id]] = $arr[gg_map][amphur];
	}	
?> 
 <br>

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
$("#btn_form").click(function(){

	//$('.loader').show();
	var date_report = $("#date_report").val();
	
	$('#load_cn').hide();
	
var url_place_th = "go.php?name=load/pay&file=pay&server=th&day="+$("#date_report").val()+"";
	$('#load_th').show();
	$('#load_th').load('load/page/loading.php');
	$('#load_th').load(url_place_th); 
	/*
	//// cn
		var url_place_cn = "go.php?name=load/all&file=all&server=cn&day="+$("#date_report").val()+"";
	$('#load_cn').show();
	$('#load_cn').load('load/page/loading.php');
	$('#load_cn').load(url_place_cn); 
	*/
});

var url_place_th = "go.php?name=load/pay&file=pay&server=th&day="+$("#date_report").val()+"";
	$('#load_th').show();
	$('#load_th').load('load/page/loading.php');
	$('#load_th').load(url_place_th); 
	/*
	//// cn
		var url_place_cn = "go.php?name=load/all&file=all&server=cn&day="+$("#date_report").val()+"";
	$('#load_cn').show();
	$('#load_cn').load('load/page/loading.php');
	$('#load_cn').load(url_place_cn); 
	//$('.loader').show();


*/

        
</script></td>
  </tr>
</table>         
