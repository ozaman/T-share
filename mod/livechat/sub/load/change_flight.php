
  <?  include ("includes/lang/chat.php");?>
  <style type="text/css">
<!--
 
-->
  </style>
   
<div style="padding:20px;">

  <table width="100%" border="0" cellspacing="2" cellpadding="2" >
    <tr>
      <td width="100" align="left" style="padding-right:5px;FONT-SIZE:18px;"><?=chat_date?></td>
      <td style="padding-left:0px;FONT-SIZE:18px;"> <?=$_GET[ondate]?></td>
    </tr>
    <tr>
      <td align="left" style="padding-right:5px;FONT-SIZE:18px;height:30px;"><?=chat_flight_old?></td>
      <td style="padding-left:0px;FONT-SIZE:18px; padding-right:0px; text-transform: uppercase"><?=$_GET[old_flight]?> </td>
    </tr>
    <tr>
      <td  style="height:20px;" ><span style="padding-right:5px;FONT-SIZE:18px;">
        <?=chat_time?>
      </span></td>
      <td  ><table   border="0" cellspacing="0" cellpadding="0" width="100%" >
          <tr>
            <td style="padding-right:10px;"  ><span style="padding-left:0px;FONT-SIZE:18px; padding-right:0px; text-transform:capitalize">
              <?=$_GET[old_time_h]?>:<?=$_GET[old_time_m]?>
            </span>  
			
			<div style="display:none">
			<span class="input-group date" style="padding-left:0px;margin:0px;  ">
			
            <input type="text" class="form-control pull-right" value="<?=$_GET[ondate]?>"  name="old_date_flight" id="old_date_flight"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:18px; margin-left:0px;  " />
            <span class="input-group date" style="padding-left:0px;margin:0px;  ">
            <input type="text" class="form-control pull-right" value="<?=$_GET[old_flight]?>"  name="old_flight" id="old_flight"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:18px; margin-left:0px; text-transform:uppercase  " />
            <span class="input-group date" style="padding-left:0px;margin:0px;  ">
            <input type="text" class="form-control pull-right" value="<?=$_GET[old_time_h]?>"  name="old_flight_time_h" id="old_flight_time_h"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:18px; margin-left:0px; text-transform:uppercase  " />
            <span class="input-group date" style="padding-left:0px;margin:0px;  ">
            <input type="text" class="form-control pull-right" value="<?=$_GET[old_time_m]?>"  name="old_flight_time_m" id="old_flight_time_m"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:18px; margin-left:0px; text-transform:uppercase  " />
            </span></span></span></span><div>
			
			
			</td>
			
          </tr>
        </table>
          </span></td>
    </tr>
    <tr>
      
    </tr>
  </table>
  <br />
  <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="100" align="left" style="padding-right:5px;FONT-SIZE:18px;"><?=chat_date?></td>
    <td style="padding-left:0px;FONT-SIZE:18px;">
	
	
	  <link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css"> 
<script src="js/jquery-main.js"></script> 
<script   src="calendar/js/<?=$_GET[lang]?>.js"></script>
	 

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<style>
.ui-datepicker {
    width: 90%; max-width:300px;
    padding: 0; left:0px; z-index:999999999;  
  }
  .ui-widget {
    font-size: 14px;  
  }
  .ui-datepicker table {
    font-size:14px; 
  }
</style>

<script>

 
  $(function(){
 
	$("#date_flight").datepicker({ dateFormat: 'yy-mm-dd',
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
  
 
		

    }
	 
	 }
 
	);
 
});


  </script> 
 

 <!--  datepicker OK --> 
 
<div  style=" margin:0px;">
               
                <div class="input-group date" style="padding-left:0px;margin:0px;  ">
 
                  <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_flight" id="date_flight"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:18px; margin-left:0px;  " />
                  </span>
                  <div class="input-group-addon"  id="btn_calendar_flight" style="cursor:pointer;  ">
                     <i class="fa fa-calendar" style="font-size:24px; width:30px; "></i>                  </div>
          </div>
                <!-- /.input group -->
        </div>
<script type="text/javascript">
$(document).ready(function() {
    $("#datepicker").datepicker();
});
// $('#date_flight').datepick({altField: '#star_cal' 	, dateFormat: 'yyyy-mm-dd' 	, showTrigger: '#calImgInx' }); 

$("#btn_calendar_flight").click(function(){
 
 
 
 $('#date_flight').datepicker('show'); 

});

 
 

        
</script> 
 

 

<style>
.form-group { background:none;

}

</style>	</td>
  </tr>
  <tr>
    <td align="left" style="padding-right:5px;FONT-SIZE:18px;height:50px;"><?=chat_flight_new?></td>
    <td style="padding-left:0px;FONT-SIZE:18px; padding-right:0px;"><input type="text" name="new_flight" id="new_flight"  required="true" onkeypress="PasswordEnter(this,event)" class="form-control"></td>
  </tr>
  <tr>
    <td  style="height:30px;" ><span style="padding-right:5px;FONT-SIZE:18px;">
      <?=chat_time?>
    </span></td>
    <td  > 
	<table   border="0" cellspacing="0" cellpadding="0" width="100%" >
  <tr>
    <td width="50%" style="padding-right:10px;"  > 
      <select name="flight_time_h"  id="flight_time_h" style=" FONT-SIZE:15px;" class="form-control" >
      <? 
 
	for($adult_i=0;$adult_i< 24;$adult_i++){ 
	
 
	
	?>
      <option value="<? if($adult_i<10){ echo '0';} ?><?=$adult_i;?>" <? if($arr[newsvc][adult] == $adult_i){echo 'selected=selected';} ?>>
      <? if($adult_i<10){ echo '0';} ?><?=$adult_i;?>
      </option>
      <? 
 
} 
?>
    </select></td>
    <td width="50%" style="padding-right:3px"><select name="flight_time_m"  id="flight_time_m" style=" FONT-SIZE:15px; margin-left:5px;" class="form-control" >
      <? 
 
	for($adult_i=0;$adult_i< 60;$adult_i++){ ?>
      <option value="<? if($adult_i<10){ echo '0';} ?><?=$adult_i;?>" <? if($arr[newsvc][adult] == $adult_i){echo 'selected=selected';} ?>>
      <? if($adult_i<10){ echo '0';} ?><?=$adult_i;?>
      </option>
      <? 
 
} 
?>
    </select></td>
  </tr>
</table>

      </span></td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="font-size:16px; color:#FF0000; padding-top:10px;"><?=chat_alert_wait_confirm?>&nbsp;</td>
    </tr>
</table>
</div>



<script>
$("#div_btn_send_change_flight_store").hide();

 setInterval(function() {


if(document.getElementById('new_flight').value ==''){
$("#div_btn_send_change_flight_store").hide();
} 
else{

 $("#div_btn_send_change_flight_store").show();

}

  
  
}, 2000); // 60000 milliseconds = one minute
 
  
 
 

</script>