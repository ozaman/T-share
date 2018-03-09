 
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
  
 
  <div class="box box-default">
 
 
   <div class="box-header with-border">
          <h2 class="box-title" style="padding-left: 0px; "><font class="font-30"><b>QR CODE แนะนำเพื่อน</b></h2>
   </div>
 
 
   <div class="box-body" >
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="74" align="center"><img src="images/qr.png" width="315" height="315" alt=""/></td>
        </tr>
    </table>
      <br>

	
	<div  id="load_th"  style="display:none " > 
  <? //  include ("load/page/loading.php");?> 
</div></td>
  </tr>
  <tr>
    <td> 
 <br>



 <!--  datepicker OK --> 
<link href="js/datepick/jquery.datepick.css" rel="stylesheet">
<script src="js/datepick/jquery.plugin.js"></script>
<script src="js/datepick/jquery.datepick.js"></script> 
<script src="js/datepick/datepick.op.js"></script> 
<script type="text/javascript">
// $('#date_report').datepick({altField: '#star_cal' 	, dateFormat: 'yyyy-mm-dd' 	, showTrigger: '#calImgInx' }); 
$("#btn_form").click(function(){




	//$('.loader').show();
 var year = $("#data_y").val();
 var month = $("#data_m").val();
 
	
var url_place_th = "go.php?name=booking/account/load&file=all&server=th&year="+$("#data_y").val()+"&month="+$("#data_m").val()+"";
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
$( document ).ready(function() {
///var url_place_th = "go.php?name=load/pay&file=index";
	 
	///$('#load_th').load('load/page/loading.php');
	///$('#load_th').load(url_place_th); 
	});
	
 
	/*
	//// cn
		var url_place_cn = "go.php?name=load/all&file=all&server=cn&day="+$("#date_report").val()+"";
	$('#load_cn').show();
	$('#load_cn').load('load/page/loading.php');
	$('#load_cn').load(url_place_cn); 
	//$('.loader').show();


*/

    $("#btn_form").click();   
</script></td>
  </tr>
</table>         
</div>
</div>

 