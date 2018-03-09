<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css"> 
<script src="js/jquery-main.js"></script> 
<script   src="calendar/js/th.js"></script>
<style>
.ui-datepicker {
    width: 90%; max-width:400px;
    padding: 0; left:0px; z-index:10;
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
 
	$("#date_report").datepicker({ dateFormat: 'yy-mm-dd',
	dateFormat: 'yy-mm-dd',
	todayHighlight: true,
	minDate: '-1Y', maxDate: '+1Y',
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

 
$("#btn_calendar").click(function(){
 
 
 $('#date_report').datepicker('show'); 

});



$("#btn_form").click(function(){
 
	//$('.loader').show();
	var date_report = $("#date_report").val();
 
	/*
	//// cn
		var url_place_cn = "go.php?name=load/all&file=all&server=cn&day="+$("#date_report").val()+"";
	$('#load_cn').show();
	$('#load_cn').load('load/page/loading.php');
	$('#load_cn').load(url_place_cn); 
	*/
});
});
 
        
</script> 
 


<style type="text/css">
<!--
.form-control {margin-left:10px; padding-left:10px; margin-right:10px; }

.btn-editwork {
border-radius: 5px; height:40px; 
    font-family:Arial, Helvetica, sans-serif;background-color: #666666; padding:5px; padding-top: 3px; padding-left:25px; margin-top:5px; margin-left: 5px;  padding-right:15px; margin-right:5px; margin-bottom:-15px; border: solid 2px #F6F6F6; font-size:22px; font-weight:bold; color:#FFFFFF; cursor:none;   
 }
 
 .btn-editwork-active {
border-radius: 5px; height:40px; 
    font-family:Arial, Helvetica, sans-serif;background-color: <?=$main_color?>; padding:5px; padding-top: 3px; padding-left:25px; margin-top:5px; margin-left: 5px;  padding-right:15px; margin-right:5px; margin-bottom:-15px; border: solid 2px #F6F6F6; font-size:22px; font-weight:bold; color:#FFFFFF;   
 }
 
  .btn-reset {
border-radius: 5px; height:40px; 
    font-family:Arial, Helvetica, sans-serif;background-color: #999999; padding:5px; padding-top: 3px; padding-left:25px; margin-top:5px; margin-left: 5px;  padding-right:15px; margin-right:5px; margin-bottom:-15px; border: solid 2px #F6F6F6; font-size:22px; font-weight:bold; color:#FFFFFF;   
 }
 
 
.btn-editwork-active:hover {
background-color: #999999; box-shadow: 0 0 3px 3px #f6f6f6; cursor:pointer;  
}

-->
</style>
<form method="post"  id="work_form" name="work_form">
 <div class="box box-default" style="padding-right:10px; padding-top:10px; ">
 
 
   <div class="input-group" style="margin-left:20px;width:100%;padding-right:20px; margin-bottom:15px;  ">
 <div class="input-group date"  style="margin-right: 0px; " >
   
                  <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_report" id="date_report"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:24px;  "><div class="input-group-addon"  id="btn_calendar" style="cursor:pointer;border:1px solid #ECEBEB; ">
                     <i class="fa fa-calendar" style="font-size:24px; margin-left: 0px; padding-left:0px; padding-right:5px; width:35px; "></i> 
                  </div>
                </div>
 
       </div>
 
 
  <div class="input-group" style="margin-left:10px;width:100%;padding-right:10px; ">
              <div class="input-group-addon"  style=" margin-right:100px;">
                    <i class="fa fa-dot-circle-o" style="font-size:18px; width:20px; "></i>
                  </div>
 

 <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding-right: 0px; "><select name="part" size="0"    id="part"  class="form-control"  style="font-size:20px; font-weight:bold;  margin-left:0px; " >
 
                       <option value="all" >งานทั้งหมด</option>					
                       <option value="golden" >Golden</option>
                       <option value="ctrip" >Ctrip</option>
                       <option value="join" >Join</option>
                       
</select></td>
    <td style="padding-left:5px; width:60px; "> <button id="submit_part" type="button" class="btn btn-block btn-primary"  >ค้นหา</button>   </td>
  </tr>
</table>

</div>

<br>
				
				                <div class="input-group" style="margin-left:10px; ">
                  <div class="input-group-addon"  style=" margin-right:100px;">
                    <i class="fa fa fa-automobile" style="font-size:18px; width:20px; "></i>
                  </div>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> <input class="form-control" type="text" name="carno" id="carno"   required="plane"   value="<?=$arr[web_user][pay_bank_name];?>"  style="font-size:22px; margin-left: 0px; margin-right:1px; width:100% " placeholder="หมายเลขตู้" > </td>
       <td style="padding-left:5px; width:60px; "> <button id="submit_carno" type="button" class="btn btn-block btn-primary"  >ค้นหา</button>   </td>
  </tr>
</table>

               </div>  
			   <br>
				
				                <div class="input-group" style="margin-left:10px; ">
                  <div class="input-group-addon"  style=" margin-right:100px;">
                    <i class="fa fa-user-plus" style="font-size:18px; width:20px; "></i>
                  </div>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> <input class="form-control" type="text" name="driver" id="driver"   required="plane"   value="<?=$arr[web_user][pay_bank_name];?>"  style="font-size:22px; margin-left: 0px; margin-right:1px; width:100% " placeholder="ชื่อคนขับรถ" > </td>
       <td style="padding-left:5px; width:60px; "> <button id="submit_driver" type="button" class="btn btn-block btn-primary"  >ค้นหา</button>   </td>
  </tr>
</table>

               </div>  <br>
   <link rel="stylesheet" href="plugins/iCheck/all.css">
 

<script>
 
 
</script>
<div class="input-group" style="margin-left:10px; ">
         
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding-left:5px; width:40px; "><input name="water"  type="checkbox" id="TheCheckBox2" value="1"  class="icheckbox_square-blue"   onclick="if(this.checked) { document.getElementById('find_guest').style.display = ''; } else { document.getElementById('find_guest').style.display = 'none'; }" ></td>
       <td   class="font_22"> ค้นหาจากข้อมูลแขก</b></td>
  </tr>
</table>

               </div>
 <br>
<div id="find_guest" style="display:none ">

 




 
<div class="form-group">
   

                <div class="input-group" style="margin-left:10px; ">
                  <div class="input-group-addon"  style=" margin-right:100px;">
                    <i class="fa fa-users" style="font-size:18px; width:20px; "></i>
                  </div>
 
				    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><input class="form-control" type="text" name="guest" id="guest"   required="true"  onkeypress="UserEnter(this,event)" value="<?=$arr[web_user][pay_bank_name];?>"  style="font-size:22px; margin-left: 0px; margin-right:1px; width:100% " placeholder="ชื่อแขก" ></td>
       <td style="padding-left:5px; width:60px; "> <button id="submit_guest" type="button" class="btn btn-block btn-primary"  >ค้นหา</button>   </td>
  </tr>
</table>
         
                </div>
				
				<br>
				
				                <div class="input-group" style="margin-left:10px; ">
                  <div class="input-group-addon"  style=" margin-right:100px;">
                    <i class="fa fa-phone" style="font-size:18px; width:20px; "></i>
                  </div>
				  
				  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> <input class="form-control" type="text" name="phone" id="phone"   required="phone"   value="<?=$arr[web_user][pay_bank_name];?>"  style="font-size:22px; margin-left: 0px; margin-right:1px; width:100% " placeholder="เบอร์โทรศัพท์แขก" ></td>
       <td style="padding-left:5px; width:60px; "> <button id="submit_phone" type="button" class="btn btn-block btn-primary"  >ค้นหา</button>   </td>
  </tr>
</table>
 
                </div>
				
				
				<br>
				
				                <div class="input-group" style="margin-left:10px; ">
                  <div class="input-group-addon"  style=" margin-right:100px;">
                    <i class="fa fa-plane" style="font-size:18px; width:20px; "></i>
                  </div>
              
				
				<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>   <input class="form-control" type="text" name="plane" id="plane"     value="<?=$arr[web_user][pay_bank_name];?>"  style="font-size:22px; margin-left: 0px; margin-right:1px; width:100% " placeholder="เที่ยวบิน" ></td>
       <td style="padding-left:5px; width:60px; "> <button id="submit_plane" type="button" class="btn btn-block btn-primary"  >ค้นหา</button>   </td>
  </tr>
</table>
				
				
                </div>
				
				
				<br>
				
				                <div class="input-group" style="margin-left:10px; ">
                  <div class="input-group-addon"  style=" margin-right:100px;">
                    <i class="fa fa-building" style="font-size:18px; width:20px; "></i>
                  </div>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> <input class="form-control" type="text" name="vc" id="vc"   required="plane"   value="<?=$arr[web_user][pay_bank_name];?>"  style="font-size:22px; margin-left: 0px; margin-right:1px; width:100% " placeholder="วอเชอร์แขก" > </td>
       <td style="padding-left:5px; width:60px; "> <button id="submit_vc" type="button" class="btn btn-block btn-primary"  >ค้นหา</button>   </td>
  </tr>
</table>

               </div>  
				 
 
 
 
     
			 


<br>
</div>

 

         </div>
</div>
  </form>
 
 <div  id="load_th"  style="display:nones ">
  <?  include ("load/page/loading.php");?> 
</div>
 
 
 
<script type="text/javascript">
// $('#date_report').datepick({altField: '#star_cal' 	, dateFormat: 'yyyy-mm-dd' 	, showTrigger: '#calImgInx' }); 
 
 $( document ).ready(function() {

/*
var url_place_th = "go.php?name=lab&file=main&day=<?=date('Y-m-d')?>";
 
	$('#load_th').load('load/page/loading.php');
	$('#load_th').load(url_place_th); 
	*/
	
	
	
	
$("#submit_guest").click(function(){
 $('#load_th').load('load/page/loading.php');
      $.post('go.php?name=lab&file=main&day=<?=date('Y-m-d')?>&find=guest&start=1&finish=5',$('#work_form').serialize(),function(response){
   $('#load_th').html(response);  });
  });
  
  $("#submit_phone").click(function(){
 $('#load_th').load('load/page/loading.php');
      $.post('go.php?name=lab&file=main&day=<?=date('Y-m-d')?>&find=phone&start=1&finish=5',$('#work_form').serialize(),function(response){
   $('#load_th').html(response);  });
  });
  
    $("#submit_plane").click(function(){
 $('#load_th').load('load/page/loading.php');
      $.post('go.php?name=lab&file=main&day=<?=date('Y-m-d')?>&find=plane&start=1&finish=5',$('#work_form').serialize(),function(response){
   $('#load_th').html(response);  });
  });
  

$("#submit_vc").click(function(){
 $('#load_th').load('load/page/loading.php');
      $.post('go.php?name=lab&file=main&day=<?=date('Y-m-d')?>&find=vc&start=1&finish=5',$('#work_form').serialize(),function(response){
   $('#load_th').html(response);  });
  });
  
  
  $("#submit_driver").click(function(){
 $('#load_th').load('load/page/loading.php');
      $.post('go.php?name=lab&file=main&day=<?=date('Y-m-d')?>&find=driver&start=1&finish=5',$('#work_form').serialize(),function(response){
   $('#load_th').html(response);  });
  });
 
 
 
    $("#submit_carno").click(function(){
 $('#load_th').load('load/page/loading.php');
      $.post('go.php?name=lab&file=main&day=<?=date('Y-m-d')?>&find=carno&start=1&finish=5',$('#work_form').serialize(),function(response){
   $('#load_th').html(response);  });
  });
  
  
  $("#submit_part").click(function(){
 $('#load_th').load('load/page/loading.php');
      $.post('go.php?name=lab&file=main&day=<?=date('Y-m-d')?>&start=1&finish=5',$('#work_form').serialize(),function(response){
   $('#load_th').html(response);  });
  });

 
 $('#load_th').load('load/page/loading.php');
      $.post('go.php?name=lab&file=main&day=<?=date('Y-m-d')?>&start=1&finish=5',$('#work_form').serialize(),function(response){
  $('#load_th').html(response);  });


 //$('.loader').show();
});
        
</script>