<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 .pad_top_5 { padding-top:5px;  
 
 }

 
-->
</style>  	   
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  
 <div class="box box-default">

 <!--ss-->
 
 
 
   <div class="box box-default">
          <h2 class="box-title"><span class="font_24"><b>รายการส่งลูกค้า</b></span></h2>
 
   </div>
    <!--แสดงผล-->
	
    
    
    
    
 

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
 

                <div class="input-group date" style="padding:5px;">
   
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
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="box-body" >
         <div class="row" style="margin-top:-20px; ">
  <div class="box-body" >
  
  
  
 
  
  
  <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="50%">  <button id="submit_load_phone" type="button" class="btn btn-block btn-primary" style="width:100%; "><i class="fa fa-car"></i> รายการทั้งหมด</button></td>
      <td width="50%">  <button type="reset" class="btn btn-block btn-default"  style="width:100%; "><i class="fa fa-plus-square"></i> เพิ่มรายการใหม่</button></td>
    </tr>
  </tbody>
</table>

 
 
	 
</div>
  </div>

<!--แสดงผล-->
<div id="load_phone_data"  style="padding:0px;"> <?  include "mod/booking/load/work_driver.php" ;?></div>
 
	
	
  <!----- ปิด row-->
   
  </div>
    </div>
	  </div>
	   
	  <form id="add_form"  name="add_form"  method="post" enctype="multipart/form-data"   >
  
 
  <div class="modal fade"  id="form_add_phone" role="dialog"   aria-labelledby="myModalLabel"    >
        <div class="modal-dialog modal-sm"  >

            <!-- Modal content-->
            <div class="modal-content" style="padding:5px; " > 
 
                    <h4 class="modal-title" style="font-size:26px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase"><center><b>เพิ่มเบอร์โทรศัพท์ใหม่</b></center></h4>
 
                <div class="modal-body" >  
   <div class="topicname"><i class="fa  fa-phone"></i>&nbsp;เบอร์โทรศัพท์</div>
   <div>
                    <input name="phone" type="text" class="form-control" id="phone"   OnKeyPress="return chkNumber(this)" maxlength="12"   required="true"   >
					<div style="padding-top:3px; " ><font color="#FF9900"><i class="fa  fa-warning"></i> กรอกได้เฉพาะตัวเลขเท่านั้น</font></div>
              </div>
			  
			     <div class="topicname"><i class="fa  fa-user"></i>&nbsp;ชื่อผู้ติดต่อ</div>
   <div>
                    <input class="form-control" type="text" name="name" id="name"   required="true"  onkeypress="UserEnter(this,event)"    >
					
              </div>
			  
			  			     <div class="topicname"><i class="fa  fa-users"></i>&nbsp;ชื่อกลุ่ม</div>
   <div>
                 <select name="type" id="type" class="form-control select2" >
				      <option value="" selected>-- กรุณาเลือกกลุ่ม --</option>
              <?
        $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        //$res[category] = $db->select_query("SELECT * FROM ".TB_transfercompany." ORDER BY id ");
		mysql_query("SET NAMES utf8"); 
        $res[category] = $db->select_query("SELECT * FROM contact_phone_group where status=1  ");
						
 
        while ($arr[category] = $db->fetch($res[category])) {
            echo "<option value=\"" . $arr[category][id] . "\"";
            if ($arr[category][id] == $arr[member][company]) {
                echo " Selected";
            }
            echo ">" . $arr[category][name] . "</option>";
        }
?>
            </select>
		   
		      </div>
           </div>
		   
		   <div id="send_user_data"> </div>
                <div class="modal-footer pad_top_5">
				 
					 <button type="button" class="btn btn-primary" data-dismiss="modal"  data-id="55"   id="submit_phone">บันทึกข้อมูล</button>
					 <button type="button" class="btn btn-default" data-dismiss="modal" data-backdrop="false" id="btnbtclose">ปิด</button>
 
                </div>
            </div>
        </div>
    </div>


 
  
 
<style>
 .iframemap {
 
  
    border: none;
    top: 0; right: 0;
    bottom: 0; left: 0;
    width: 100%;
    height: 100%;
}
 
 </style> 
 </form>
 

 
	   <script>
 	function chkNumber(ele)
	{
 	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) 
	
	
	
	return false;
 
	
 
 
	
	

	}
	//else { alert(55); }   
	   /*
	   var url_phone = "go.php?name=load/phone&file=all";
	$('#load_phone_data').show();
	$('#load_phone_data').load('load/page/loading.php');
 $('#load_phone_data').load(url_phone); 
	   */
	   
	    $("#submit_load_phone").click(function(){ 
	  
	      var url_phone = "go.php?name=load/phone&file=all";
	$('#load_phone_data').show();
	$('#load_phone_data').load('load/page/loading.php');
 $('#load_phone_data').load(url_phone); 
	   
	   });
	   
	   
	   
	   $("#submit_phone").click(function(){ 
//$('#file_upload_line').click();
 
 
if(document.getElementById('phone').value=="") {
document.getElementById('phone').focus() ; 
swal('กรุณากรอกเบอร์โทรศัพท์'); 

return false ;
}

if(document.getElementById('name').value=="") {
document.getElementById('name').focus() ; 
swal('กรุณากรอกชื่อผู้ติดต่อ'); 
return false ;
}

if(document.getElementById('type').value=="") {
document.getElementById('type').focus() ; 
swal('กรุณาเลือกกลุ่ม'); 
return false ;
}



 
 $.post('popup.php?name=user&file=savedata&type=phone_add&id=<?=$arr[web_user][id]?>',$('#add_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
 
  
 });
	   
	   </script>
	   
	   
	   