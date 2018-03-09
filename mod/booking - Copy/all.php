<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 .pad_top_5 { padding-top:5px;  
 
 }

 
-->
</style>  	   
 
  
<div class="box box-default" style="padding:0px">

   <div class="box-header with-border">
          <h2 class="box-title" style="padding-left:0px; "><font class="font-22"><b><b>ประวัติส่งแขก</b></h2>
          
          
           
          
   </div>
    <!--แสดงผล-->
	
    
    
    
 
 
 

 
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



	 
 
	// $('#load_booking_data').load(url); 


 


 
  $(function(){
 
	$("#date_report").datepicker({
		dateFormat:"yy-mm-dd",
		todayHighlight:true,
		maxDate:"+1Y",
		numberOfMonths:1,
		onSelect:function (dateText, inst) {
    var date_report = $("#date_report").val();
    $("#load_booking_data").html(load_main_icon_big);
    var url = "go.php?name=booking/load&file=work_all&find=day&day=" + $("#date_report").val() + "";
    $("#load_booking_data").load(url);
}
	});
 
});




  </script> 
 
 
 
 
    <script>
 $( document ).ready(function() {

$("#btn_load_clock_day_1").click(function(){ 

$("#btn_load_clock_day_1").addClass('active');

$("#btn_load_clock_day_2").removeClass('active');
$("#btn_load_clock_day_3").removeClass('active');


    $("#load_booking_data").html(load_main_icon_big);
	var url = "go.php?name=booking/load&file=work_all&find=day&day=<?= date('Y-m-d',strtotime("-0 day")); ?>";
	
	 $('#load_booking_data').load(url);
	 
	 $('#date_report').val('<?= date('Y-m-d',strtotime("-0 day")); ?>');




 
});


$("#btn_load_clock_day_2").click(function(){ 
 
 
$("#btn_load_clock_day_2").addClass('active');

$("#btn_load_clock_day_1").removeClass('active');
$("#btn_load_clock_day_3").removeClass('active');



    $("#load_booking_data").html(load_main_icon_big);
	var url = "go.php?name=booking/load&file=work_all&find=day&day=<?= date('Y-m-d',strtotime("-1 day")); ?>";
	
	 $('#load_booking_data').load(url);
	 
	 $('#date_report').val('<?= date('Y-m-d',strtotime("-1 day")); ?>');


 
});


$("#btn_load_clock_day_3").click(function(){ 
 
 
$("#btn_load_clock_day_3").addClass('active');

$("#btn_load_clock_day_1").removeClass('active');
$("#btn_load_clock_day_2").removeClass('active');



    $("#load_booking_data").html(load_main_icon_big);
	var url = "go.php?name=booking/load&file=work_all&find=day&day=<?= date('Y-m-d',strtotime("-2 day")); ?>";
	
	 $('#load_booking_data').load(url);
	 
	 $('#date_report').val('<?= date('Y-m-d',strtotime("-2 day")); ?>');


 
});




});
</script>
 
 
 
 
  <?
 
  
  
  
  if($data_user_class=='taxi'){
	 
	 
 $filter="and drivername=".$user_id." ";
 } else { 
	 
	 $filter=""; 
	 
 }
	
/// $_GET[day]='2017-07-20';

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	 $numday_1 = $db->num_rows('order_booking',"id","transfer_date='".date('Y-m-d',strtotime("0 day"))."' $filter");
	 $numday_2 = $db->num_rows('order_booking',"id","transfer_date='".date('Y-m-d',strtotime("-1 day"))."' $filter");
	 $numday_3 = $db->num_rows('order_booking',"id","transfer_date='".date('Y-m-d',strtotime("-2 day"))."' $filter");
  
  
  ?>
  
  
  
  <ul class="nav nav-tabs" style="width:100%; margin-top:10px;">
    <li class="active" style="width:50%; text-align:center" id="btn_load_clock_day_1"><a >วันนี้ <span data-toggle="tooltip" class="badge"   style="position:absolute; margin-left:5px; border-radius: 20px; height:25px; width:25px; background-color:<?=$main_color?>; padding-top:5px; " id="number_bottom_chat"  ><span  class="font-20" ><?=$numday_1?></span> </span> </a></li>
    <li style="width:50%; text-align:center" id="btn_load_clock_day_2"><a>เมื่อวาน<span data-toggle="tooltip" class="badge "   style="position:absolute; margin-left:5px; border-radius: 20px; height:25px; width:25px; background-color:#999999; text-align:center; padding-top:5px; " id="number_bottom_chat" ><span  class="font-20"><?=$numday_2?></span></span></a></li>
    
    
    <li style="width:33%; text-align:center; display:none" id="btn_load_clock_day_3"><a >วันก่อน<span data-toggle="tooltip" class="badge"   style="position:absolute; margin-left:5px; border-radius: 20px; height:25px; width:25px; background-color:#999999; padding-top:5px; " id="number_bottom_chat"><span  class="font-20"><?=$numday_3?></span></a></li>
 
  </ul>
 

 
<div class="form-group">
 <?
 
 ///echo $fontmobile
 ?>
                 <div class="input-group date" style="padding:5px;">
  <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_report" id="date_report"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:24px"  >               <div class="input-group-addon"  id="btn_calendar" style="cursor:pointer ">
                     <i class="fa fa-calendar" style="font-size:26px; "></i> 
                  </div>
                </div>
                <!-- /.input group -->
              </div>
<script type="text/javascript">
 $( document ).ready(function() {

$("#btn_calendar").click(function(){
 
 
 $('#date_report').datepicker('show'); 
 
 
});


});
 
 
        
</script> 
 

 

<style>
.form-group { background:none;

}

</style>
    
    
    
    
    
    
    
    
    
    
    
    
    <div class="box-body" >
         <div class="row" style="margin-top:-40px; ">
  <div class="box-body" >
  
  
  
 
  <table width="100%" border="0" cellspacing="1" cellpadding="1" style="display:none">
  <tbody>
    <tr>
      <td width="50%">  
      
      
      <a href="?name=booking&file=all" >
      <button id="submit_all_booking" type="button" class="btn btn-block btn-default " style="width:100%; text-align:left " ><i class="fa fa-car"></i> งานทั้งหมด</button>
      
      </a>
      
      
      
      
      
      
      
      </td>
      <td width="50%">  
      
            <a  id="submit_new_booking">
      <button type="button"  class="btn btn-block btn-default"  style="width:100%;text-align:left  "><i class="fa fa-plus-square"></i> เพิ่มงานใหม่</button>
      
      </a>
      
      
    
        	 <script>
 
$('#submit_new_booking').click(function(){  

 $( "#load_mod_popup" ).toggle();
	
 var url_load = "load_page_mod.php?name=booking&file=new&driver=<?=$user_id?>";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
 
 	});
 
					
 </script> 
 
 <? if($_GET[auto]=='new'){ ?>
 
  <script> 
  $( document ).ready(function() {

 $( "#load_mod_popup" ).toggle();
	
 var url_load = "load_page_mod.php?name=booking&file=new&driver=<?=$user_id?>&place=<?=$_GET[place]?>";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
  });
 
  </script> 
   
<? } ?>      


 <? if($_GET[auto]=='edit'){ ?>
 
  <script> 
  $( document ).ready(function() {

 ///  $('#submit_edit_booking').click();
 
  });
 
  </script> 
   
<? } ?>   

      
      </td>
    </tr>
  </tbody>
</table>

 
 
	 
</div>
  </div>

<!--แสดงผล-->
<div id="load_booking_data"  style="padding:0px;"> <?  include "mod/booking/load/work_driver.php" ;?></div>
 
	
	
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


 
 
 </form>
  
  
  <script>
    $('#load_booking_data').html(load_main_icon_big);
	
	//var url_place_th = "go.php?name=load/all&file=all&server=th&day="+$("#date_report").val()+"";
	var url = "go.php?name=booking/load&file=work_all&find=day&day=<?=date('Y-m-d')?>";
	
	 $('#load_booking_data').load(url);
  
  </script>