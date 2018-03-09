
 

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css"> 
<script src="js/jquery-main.js"></script> 
<script   src="calendar/js/th.js"></script>

<style>
.ui-datepicker {
    width: 90%; max-width:400px;
    padding: 0; left:0px; z-index:999;
  }
  .ui-widget {
    font-size: 16px;  
  }
  .ui-datepicker table {
    font-size:18px; 
  }
</style>

<script>


$(document).ready(function() {
	var url_place_th = "go.php?name=load/today&file=timeline&find=day&day="+$("#date_report").val()+"";
	$('#load_th').show();
	$('#load_th').html(load_main_icon_big);
	$('#load_th').load(url_place_th); 


});


 
  $(function(){
 
	$("#date_report").datepicker({ dateFormat: 'yy-mm-dd',
	dateFormat: 'yy-mm-dd',
	todayHighlight: true,
	minDate: new Date('2016-08-01'), //
	maxDate: '+1Y',
	//showOn: "both", 
	// buttonImage: 'calendar/dateselect.gif',
	//buttonText: "<i class='fa fa-calendar'></i>",
	// buttonImageOnly: true ,    
  numberOfMonths: 1,
  onSelect: function(dateText, inst) {
  
//$('.loader').show();
	var date_report = $("#date_report").val();
	//alert(date_report);
	
	$('#load_cn').hide();
	
	//var url_place_th = "go.php?name=load/all&file=all&server=th&day="+$("#date_report").val()+"";
	var url_place_th = "go.php?name=load/today&file=timeline&find=day&day="+$("#date_report").val()+"";
	$('#load_th').show();
	$('#load_th').html(load_main_icon_big);
	$('#load_th').load(url_place_th); 
 
		

    }
	 
	 }
 
	);
 
});


  </script> 
 
 
 

 <!--  datepicker OK --> 
<link href="js/datepick/jquery.datepick.css" rel="stylesheet">
<script src="js/datepick/jquery.plugin.js"></script>
<script src="js/datepick/jquery.datepick.js"></script> 
<script src="js/datepick/datepick.op.js"></script> 
<div class="form-group">
                <label class="font_22">เลือกดูงานจากวันที่</label>

                <div class="input-group date">
   
                  <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_report" id="date_report"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:24px ">               <div class="input-group-addon"  id="btn_calendar" style="cursor:pointer ">
                     <i class="fa fa-calendar" style="font-size:24px; "></i> 
                  </div>
                </div>
                <!-- /.input group -->
              </div>
<script type="text/javascript">
$(document).ready(function() {
    $("#datepicker").datepicker();
});
// $('#date_report').datepick({altField: '#star_cal' 	, dateFormat: 'yyyy-mm-dd' 	, showTrigger: '#calImgInx' }); 

$("#btn_calendar").click(function(){
 
 $('#date_report').datepicker('show'); 

});

 


 

/*
var url_place_th = "go.php?name=load/all&file=all&server=th&day="+$("#date_report").val()+"";
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


        
</script> 
 

 <div  id="load_th"  style="display:none ">
  <?  // include ("load/page/loading.php");?> 
</div>

 <div  id="load_cn"  style="display:none ">
  <?  /// include ("load/page/loading.php");?> 
</div>

<style>
.form-group { background:none;

}

</style>