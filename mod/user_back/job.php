<link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css"> 
<script src="js/jquery-main.js"></script> 
<script   src="calendar/js/th.js"></script>


 <script>
 $('.text-topic-action-mod').html('ข้อมูลและเอกสารสำคัญ');
 
 </script>


<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 

 
-->
</style>  
<style>
.ui-datepicker {
    width: 90%; max-width:400px; z-index:99;
    padding: 0; left:0px;
  }
  .ui-widget {
    font-size: 16px;  
  }
  .ui-datepicker table {
    font-size:18px; 
  }
</style>
<script>

  $(function(){

	$("#idcard_finish").datepicker({ dateFormat: 'yy-mm-dd',
	dateFormat: 'yy-mm-dd',

	            changeMonth: true,
            changeYear: true,
	todayHighlight: true,
	minDate: '-10Y', maxDate: '+10Y',
	//showOn: "both", 
	// buttonImage: 'calendar/dateselect.gif',
	//buttonText: "<i class='fa fa-calendar'></i>",
	// buttonImageOnly: true ,    
  numberOfMonths: 1,
  onSelect: function(dateText, inst) {
  
//$('.loader').show();
	var date_report = $("#date_report").val();
	//alert(date_report);
	
 
 
		

    }
	 
	 }
 
	);
 
});


  </script> 
 

<script type="text/javascript">

$(document).ready(function() {

    $("#datepicker").datepicker();

// $('#date_report').datepick({altField: '#star_cal' 	, dateFormat: 'yyyy-mm-dd' 	, showTrigger: '#calImgInx' }); 

$("#btn_idcard_finish").click(function(){
 
 $('#idcard_finish').datepicker('show'); 

});

 

$("#btn_idcard_finish").click(function(){

	//$('.loader').show();
	var date_report = $("#date_report").val();
	 
	
});
 
        });
</script> 


<script>

  $(function(){
 
	$("#iddriving_finish").datepicker({ dateFormat: 'yy-mm-dd',
	dateFormat: 'yy-mm-dd',
 
	            changeMonth: true,
            changeYear: true,
	todayHighlight: true,
	minDate: '-10Y', maxDate: '+10Y',
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
	$('#load_th').load('load/page/loading.php');
	$('#load_th').load(url_place_th); 
 
		

    }
	 
	 }
 
	);
 
});


  </script> 
 

<script type="text/javascript">
$(document).ready(function() {
    $("#datepicker").datepicker();

// $('#date_report').datepick({altField: '#star_cal' 	, dateFormat: 'yyyy-mm-dd' 	, showTrigger: '#calImgInx' }); 

$("#btn_iddriving_finish").click(function(){
 
 $('#iddriving_finish').datepicker('show'); 

});

 

$("#btn_iddriving_finish").click(function(){

	//$('.loader').show();
	var date_report = $("#date_report").val();
	 
	
});
 
        });
</script> 







 <div class="box box-default" style="margin-top:30px;">
 
 
  
<form method="post" action="" id="edit_form" name="edit_form"  enctype="multipart/form-data" >
  <div class="box-body" >
         <div class="row">
		            <div class="col-md-12">
			      
 
                
				
				 
		      <div> 
                     <div class="topicname"><i class="fa  fa-credit-card"></i>&nbsp;บัตรประจำตัวประชาชน </div>

				  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="70%" style="padding-right:5px; "><input name="idcard" type="text" class="form-control" id="idcard" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][idcard];?>"  required="true"  ></td>
    <td id="pic_idcard"></td>
  </tr>
    <tr>
    <td colspan="2" style="padding-right:5px; padding-top:10px; "><div class="input-group date">
   
                  <input type="text" class="form-control pull-right" value="<?=$arr[web_user][idcard_finish];?>"  name="idcard_finish" id="idcard_finish"  readonly="true" style="background-color:#FFFFFF; height:35px; font-size:24px; ">               
                  <div class="input-group-addon"  id="btn_idcard_finish" style="cursor:pointer ; width:40px; margin-right:5px;">
                     <i class="fa fa-calendar" style="font-size:24px; height:20px;"></i> 
                  </div>
                </div></td>
    </tr>
</table>

			  </div>
			  
			  
			           <div><br>

                     <div class="topicname"><i class="fa fa-credit-card"></i>&nbsp;ใบอนุญาตขับขี่</div>
					 
					   <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="70%" style="padding-right:5px; "><input class="form-control" type="text" name="iddriving" id="iddriving"  required="true" onkeypress="PasswordEnter(this,event)"   value="<?=$arr[web_user][iddriving];?>" ></td>
    <td id="pic_iddriving"></td>
  </tr>
  <tr>
    <td colspan="2" style="padding-right:5px; padding-top:10px; "><div class="input-group date">
   
                  <input type="text" class="form-control pull-right" value="<?=$arr[web_user][iddriving_finish];?>"  name="iddriving_finish" id="iddriving_finish"  readonly="true" style="background-color:#FFFFFF; height:35px; font-size:24px; ">               
                  <div class="input-group-addon"  id="btn_iddriving_finish" style="cursor:pointer ; width:40px; margin-right:5px;">
                     <i class="fa fa-calendar" style="font-size:24px; height:20px;"></i> 
                  </div>
                </div></td>
    </tr>
  
</table>
                    
            </div>
					
			 
		      <!----- ปิด col--> </div> <!---->
		  
		  
		 
					
					
					
                    
                  
	
	 
                 
	
	 
					
   
		  <!----- ปิด col--> </div> <!---->
		
		 
 
		 
 
 
 
 

  
  <div  id="send_user_data"></div>
  
  
    <div style="margin-top:10px;"  >
 <table width="100%"  border="0" cellspacing="2" cellpadding="2" >
  <tr>
    <td width="150" style="padding:5 px;"><button id="submit_user_network" type="button" class="btn btn-block btn-primary" style="width:140px ">บันทึกข้อมูล</button></td>
    <td style="padding:5px;"><button type="reset" class="btn btn-block btn-default"  style="width:140px ">รีเซ็ต</button></td>
  </tr>
</table>
 
      </div>
        
  </div>
  
    <!----- ปิด row-->
   
  </div>
  	
 	<div id="popup_idcard"></div> 
	<div id="popup_iddriving"></div> 
 
  <script>
      	var url_idcard= "popup.php?name=load/card&file=button&userid=<?=$arr[web_user][post_date];?>&type=idcard";
$('#pic_idcard').load(url_idcard);
    	var url_popup_idcard = "popup.php?name=load/card&file=pic&userid=<?=$arr[web_user][post_date];?>&type=idcard&title=บัตรประชาชน";
$('#popup_idcard').load(url_popup_idcard);
  
      	var url_iddriving= "popup.php?name=load/card&file=button&userid=<?=$arr[web_user][post_date];?>&type=iddriving";
$('#pic_iddriving').load(url_iddriving);
    	var url_popup_iddriving = "popup.php?name=load/card&file=pic&userid=<?=$arr[web_user][post_date];?>&type=iddriving&title=ใบอนุญาตขับขี่";
$('#popup_iddriving').load(url_popup_iddriving);
 


 
//alert(00);
 
  
  
  
  
  
  
  
  
  
 /// check login

$("#submit_user_network").click(function(){ 
//$('#file_upload_line').click();

 
/*
if(document.getElementById('username').value=="") {
swal('กรุณากรอกชื่อผู้ใช้งาน'); 
document.getElementById('username').focus() ; 
return false ;
}
 */
 $.post('popup.php?name=user&file=savedata&type=card&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
  
  
 });
 </script> 
 
 
 </form> 
 