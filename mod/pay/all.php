 
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
          <h2 class="box-title" style="padding-left:10px; "><span class="font_24"><b>เงินเดือน ค่าโอที</b></span></h2>
   </div>
 
 
   <div class="box-body" >
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%"  border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="55" style="font-size:16px "><strong>เดือน </strong></td>
        <td width="74"><select name="data_m" id="data_m" style="height:30px;width:60px; font-size:20px ">
            <?
				   for($ii=1;$ii<13;$ii++){
				   if( $ii < 10){ $ii = '0'.$ii; }
				  ?>
            <option value="<?=$ii;?>" <?  if(date('m')== $ii){ echo "selected=selected";} ?> >
            <?=$ii;?>
            </option>
            <?  } ?>
          </select>
        </td>
        <td width="55"><strong>พ.ศ. </strong></td>
        <td width="120"><select name="data_y" id="data_y"  style="height:30px;width:80px; font-size:20px ">
            <?
				   for($ii=2016;$ii< date('Y')+1;$ii++){
 
				  ?>
            <option value="<?=$ii;?>" <?  if($y+543== $ii+543){ echo "selected=selected";} ?> >
            <?=$ii+543;?>
            </option>
            <?  } ?>
        </select></td>
        <td  ><button type="button" id="btn_form" class="btn btn-block btn-primary btn-fx"  style="margin-left:5px;width:80px; height:30px; ">ค้นหา</button></td>
      </tr>
    </table>
      <br>

	
	<div  id="load_th"  style="display:none " > 
  <?  include ("load/page/loading.php");?> 
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
  
	
	
	
var url_place_th = "go.php?name=load/pay&file=all&server=th&year="+$("#data_y").val()+"&month="+$("#data_m").val()+"";
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

 