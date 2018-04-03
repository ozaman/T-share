 
 <?
 include('../../includes/class.mysql.php');
  


 $db = New DB();
 $db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
 
 //$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD); 
 
 $res[deposit] = $db->select_query("SELECT  * FROM  deposit WHERE username = '".$_COOKIE[app_remember_user]."' ");
$arr[deposit] = $db->fetch($res[deposit]);
 echo $arr[deposit][driver];
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css"> 
<!-- <script src="js/jquery-main.js"></script>  -->
<!-- <script   src="calendar/js/th.js"></script> -->


 <!-- <script   src="calendar/js/th.js"></script> -->

<link rel="stylesheet" type="text/css" href="pickerdate/classic.css?v=<?=time();?>" /> 
<link rel="stylesheet" type="text/css" href="pickerdate/classic.date.css?v=<?=time();?>" /> 
<script src="pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
<script src="pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script>

  <div class="" style="">
 
    
         <!--  <h2 class="box-title" style="padding-left:10px; "><span class="font_28"><b>ค่าเที่ยว เบี้ยเลี้ยง</b></span></h2> -->

 
 
   <div class="box-body" >
   	<div style="padding:5px 5px; margin: auto;margin-top: 0px;padding-bottom: 5px;">
		
		   <div class="input-group date" style="padding:0px;width: 100%">
		      <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_transfer_work2" id="date_transfer_work2"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:24px;z-index: 0;padding:10px;width: 100%"  >               
		      <!-- <div class="input-group-addon"  id="btn_calendar2" style="cursor:pointer "> -->
		         <i class="fa fa-calendar icon_calendar" style="pointer-events: none;
    position: absolute;
    font-size: 26px;
    padding: 8px;
    right: 0;border-left: 1px solid #ddd"></i> 
		     <!--  </div> -->
		   </div>
		
	</div>
  <div style="padding:5px 5px; margin: auto;margin-top: 0px;padding-bottom: 5px;">
   <!-- <table width="100%"  border="0" cellspacing="2" cellpadding="2">
   <tr  >
     <td  class="font_18" style="height:30px;  padding-left:5px;">ยอดคงเหลือ</td>
     <td width="40%" align="right"  class="font_16" style="padding-right:10px; color:#FF0000;font-size: 16px;"><?= number_format( $arr[deposit][deposit], 0 );?>
     </td>
   </tr>
 </table> -->
</div>
   
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> 
	
	
 

	
	<div  id="load_th"  style="display:nones " > 
 	 <?  include ("load/page/loading.php");?> 
</div>
</td>
  </tr>
  <tr>
    <td> 
 <br>
<style>
	@media screen and (max-width: 320px) {
   .font-22{
   		font-size : 14px;
   		font-family: 'Arial', sans-serif;
   }
   .line-center{
/*   		height: 59px;*/
   		height: 50px;
   }
   #date_transfer_work{
   		height: 35px !important;
   		font-size: 20px !important;
   }
   .icon_calendar{
   		font-size: 20px !important;
   }
}
</style>


 <!--  datepicker OK --> 

<!-- <link href="js/datepick/jquery.datepick.css" rel="stylesheet">
<script src="js/datepick/jquery.plugin.js"></script>
<script src="js/datepick/jquery.datepick.js"></script> 
<script src="js/datepick/datepick.op.js"></script>  -->
</td>
  </tr>
</table>         
</div>
</div>
<script>
	
 	$('#btn_calendar2').click(function(){
		var input1 = $('#date_transfer_work2').pickadate(); 
	    var picker = input1.pickadate('picker');
	    setTimeout(function(){ picker.open(true); }, 500);
		
 	});

</script>

<script>
  $('.text-topic-action-mod').html('<?echo t_payment_account?>')
  console.log('<?=$arr[deposit][driver];?>')
  console.log('<?=$_COOKIE[app_remember_user];?>')
// setTimeout(function(){ 
var date=$('#date_transfer_work2').val();
//console.log(date)

    $('#date_transfer_work2').pickadate({
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy/mm/dd',
        closeOnSelect: true,
        closeOnClear: false,
        "showButtonPanel": false,
        onStart: function() {
        	console.log(date)
            this.set('select', date); // Set to current date on load
            var url_place_th = "go.php?name=load/pay&file=index_job_expenses&server=th&driver=<?=$_COOKIE["app_remember_user"];?>&date="+date;
	 $('#load_th').show();
	 //$('#load_th').load('load/page/loading.php');
 		$('#load_th').load(url_place_th); 
   
        },
		  onSet: function(context) {
		  	     var date=$('#date_transfer_work2').val();
		    	var url_place_th = "go.php?name=load/pay&file=index_job_expenses&server=th&driver=<?=$_COOKIE["app_remember_user"];?>&date="+date;
	 $('#load_th').show();
	 //$('#load_th').load('load/page/loading.php');
 		$('#load_th').load(url_place_th); 

  
	
	
	

		    	//QueryData();
		  }
        });
// }, 500);
</script>

 