<script>
   $(".text-topic-action-mod").html('<?php echo t_all_transfer_job?>');
</script>
<style>
   @media screen and (max-width: 320px) {
   .font-22{
   font-size : 14px !important;
   font-family: 'Arial', sans-serif;
   }
   .font-24{
   font-size : 16px !important;
   font-family: 'Arial', sans-serif;
   }
   .font-26{
   font-size : 18px !important;
   font-family: 'Arial', sans-serif;
   }
   .font-28{
   font-size : 20px !important;
   font-family: 'Arial', sans-serif;
   }
   #date_report{
   font-size : 20px !important ; 
   height: 35px !important;
   }
   #icon_calendar{
   font-size : 20px !important ; 
   }
   /*.form-group{
   margin-bottom: 0px !important;
   }*/
   }
</style>
<div class="box box-default" style="margin-top:35px;" id="main_component">
   <link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css">
   <script src="js/jquery-main.js"></script> 
   <script   src="calendar/js/th.js"></script>
   <link rel="stylesheet" type="text/css" href="pickerdate/classic.css?v=<?=time();?>" />
   <link rel="stylesheet" type="text/css" href="pickerdate/classic.date.css?v=<?=time();?>" />
   <script src="pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
   <script src="pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script>
   <style>
      .ui-datepicker {
      width: 100%; max-width:400px;
      padding: 0; left:0px; z-index:99999; margin-left:-10px; 
      background-color: #fff; border:none; margin-top:0px; 
      }
      .ui-datepicker td span, .ui-datepicker td a {
      padding: 10px 10px !important;  font-size: 16px;  
      }
      .ui-widget {
      font-size: 18px;  
      }
      .ui-datepicker table {
      font-size:20px; width: 100%;
      }
      .ui-datepicker .ui-datepicker-prev span,
      .ui-datepicker .ui-datepicker-next span {
      display: block;
      position: absolute; width:
      left: 50%;
      margin-left: -8px;
      top: 50%;
      margin-top: -8px;
      }
      .ui-datepicker .ui-datepicker-current-day {
      background-color: #4289cc;
      }
   </style>
   <script>
      // $('#load_booking_data').load(url); 
      /*  $(function(){
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
      });*/
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
   <div style="padding: 8px 0">
      <table width="100%">
         <tr>
            <td width="50%" align="center">
               <div style=" background: #3b5998;
                  font-size: 18px;
                  border-radius: 25px;
                  color: #fff;
                  padding: 5px 30px;
                  border: 2px solid #3b5998;" onclick="shop_status()"><span><? echo t_guest_shopping?></span></div>
            </td>
            <td width="50%" align="center">
               <div style="
                  background: #fff;
                  font-size: 18px;
                  border-radius: 25px;
                  color: #3b5998;
                  padding: 5px 30px;
                  border: 2px solid #3b5998;" onclick="transfer_status()"><span><? echo t_customer?></span></div>
            </td>
         </tr>
      </table>
   </div>
   <ul class="nav nav-tabs" style="width:100%; margin-top:10px;">
      <li class="active" style="width:50%; text-align:center" id="btn_load_clock_day_1">
      <a ><span class="font-26"><?echo t_today_job?> </span><span data-toggle="tooltip" class="badge"   style="position:absolute; margin-left:5px; border-radius: 20px; height:25px; width:25px; background-color:<?=$main_color?>; padding-top:5px; " id="number_bottom_chat"  ><span  class="font-20" ><?=$numday_1?></span> </span> </a>
      </li>
      <li style="width:50%; text-align:center" id="btn_load_clock_day_2">
      <a><span class="font-26"><? echo t_yesterday?></span><span data-toggle="tooltip" class="badge "   style="position:absolute; margin-left:5px; border-radius: 20px; height:25px; width:25px; background-color:#999999; text-align:center; padding-top:5px; " id="number_bottom_chat" ><span  class="font-20"><?=$numday_2?></span></span></a>
      </li>
      <li style="width:33%; text-align:center; display:none" id="btn_load_clock_day_3">
      <a ><? echo t_previous_day?><span data-toggle="tooltip" class="badge"   style="position:absolute; margin-left:5px; border-radius: 20px; height:25px; width:25px; background-color:#999999; padding-top:5px; " id="number_bottom_chat"><span  class="font-20"><?=$numday_3?></span></a>
      </li>
   </ul>
   <div class="form-group">
      <div class="input-group date" style="padding:0px;">
         <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_report" id="date_report"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:24px;z-index: 0;"  >               
         <div class="input-group-addon"  id="btn_calendar" style="cursor:pointer ">
            <i class="fa fa-calendar" style="font-size:26px; " id="icon_calendar"></i> 
         </div>
      </div>
      <!-- /.input group -->
   </div>
   <script type="text/javascript">
      /*$('#date_report_bottom').datepicker('show'); 
      $("#btn_calendar").click(function(){
       $('#date_report').datepicker('show'); 
      });*/   
   </script> 
   <script>
      function shop_status(){  
      //$( "#main_load_mod_popup" ).toggle();
      var url_load = "load_page_mod.php?name=booking&file=all";
      $('#load_mod_popup').html(load_main_mod);
      $.post( url_load, function( data ) {
//      console.log(data);
      $('#load_mod_popup').html(data);
      });
      /* $('#load_mod_popup').html(load_main_mod);
      $('#load_mod_popup').load(url_load); */
      }
      function transfer_status(){  
      // $( "#main_load_mod_popup" ).toggle();
      var url_load= "load_page_mod.php?name=booking&file=all_job";	  
       console.log(url_load);
       $('#load_mod_popup').html(load_main_mod);
       $('#load_mod_popup').load(url_load);
       //$.post( url_load, function( data ) {
      $('#load_mod_popup').html(data);
      //}); 
      //   var url_load = "load_page_mod.php?name=booking&file=all_job";
      //  $('#load_mod_popup').html(load_main_mod);
      //  $.post( url_load, function( data ) {
      //   $('#load_mod_popup').html(data);
      // });
      /* $('#load_mod_popup').html(load_main_mod);
      $('#load_mod_popup').load(url_load); */
      }
      $('#btn_calendar').click(function(){
      // 		alert();
      var input1 = $('#date_report').pickadate(); 
         var picker = input1.pickadate('picker');
         setTimeout(function(){ picker.open(true); }, 500);
      });
   </script>
   <script>
      setTimeout(function(){ 
      var date=$('#date_report').val();
          $('#date_report').pickadate({
              format: 'yyyy-mm-dd',
              formatSubmit: 'yyyy/mm/dd',
              closeOnSelect: true,
              closeOnClear: false,
              "showButtonPanel": false,
              onStart: function() {
                  this.set('select', date); // Set to current date on load
         			console.log('open');
              },
      		  onSet: function(context) {
      		     $('#load_booking_data').html(load_main_icon_big);	
      		     var date=$('#date_report').val();
//      			 var url = "go.php?name=booking/load&file=work_all&find=day&day="+date;
      			 var url = "go.php?name=booking/shop_history&file=shop_all&find=day&day="+date;
      			 console.log('close');
      			 console.log(url);
      			 $('#load_booking_data').load(url);
      		  }
              });
       }, 500);
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
                        <button id="submit_all_booking" type="button" class="btn btn-block btn-default " style="width:100%; text-align:left " ><i class="fa fa-car"></i><? echo t_all_jobs?> </button>
                        </a>
                     </td>
                     <td width="50%">
                        <a  id="submit_new_booking">
                        <button type="button"  class="btn btn-block btn-default"  style="width:100%;text-align:left  "><i class="fa fa-plus-square"></i><? echo t_add_new_job?> </button>
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
   </div>
   <script>
      $('#load_booking_data').html(load_main_icon_big);
      //var url_place_th = "go.php?name=load/all&file=all&server=th&day="+$("#date_report").val()+"";
      var url = "go.php?name=booking/load&file=work_all&find=day&day=<?=date('Y-m-d')?>";
      //	 $('#load_booking_data').load(url);
   </script>    
   <script>
      $("#btn_load_clock_day_1").click(function(){ 
      $("#btn_load_clock_day_1").addClass('active');
      $("#btn_load_clock_day_2").removeClass('active');
      $("#btn_load_clock_day_3").removeClass('active');
          $("#load_booking_data").html(load_main_icon_big);
      	  var url = "go.php?name=booking/shop_history&file=shop_all&find=day&day=<?= date('Y-m-d',strtotime("-0 day")); ?>";
      	  console.log(url);
          $('#load_booking_data').load(url);
      	  $('#date_report').val('<?= date('Y-m-d',strtotime("-0 day")); ?>');
      });
      $("#btn_load_clock_day_2").click(function(){ 
      $("#btn_load_clock_day_2").addClass('active');
      $("#btn_load_clock_day_1").removeClass('active');
      $("#btn_load_clock_day_3").removeClass('active');
          $("#load_booking_data").html(load_main_icon_big);
      	var url = "go.php?name=booking/shop_history&file=shop_all&find=day&day=<?= date('Y-m-d',strtotime("-1 day")); ?>";
      	 $('#load_booking_data').load(url);
      	 $('#date_report').val('<?= date('Y-m-d',strtotime("-1 day")); ?>');
      });
      $("#btn_load_clock_day_3").click(function(){ 
      $("#btn_load_clock_day_3").addClass('active');
      $("#btn_load_clock_day_1").removeClass('active');
      $("#btn_load_clock_day_2").removeClass('active');
          $("#load_booking_data").html(load_main_icon_big);
      	var url = "go.php?name=booking/load/shop_history&file=shop_all&find=day&day=<?= date('Y-m-d',strtotime("-2 day")); ?>";
      	 $('#load_booking_data').load(url);
      	 $('#date_report').val('<?= date('Y-m-d',strtotime("-2 day")); ?>');
      });
   </script>
   <!--แสดงผล-->
   <div id="load_booking_data"  style="padding:0px; margin:0; margin-top:-25px;"> <?  //include "mod/booking/load/work_driver.php" ;?></div>
   <!----- ปิด row -->
</div>
<div class="w3-animate-right " id="sub_component" style="display: none;margin-top: 35px;overflow-x: hidden; margin-bottom:20px;width:100% ">
	<div class="font-22" style="padding: 5px 0px;margin-top: 5px;" onclick="backMain();" ><a id="back_main"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;<?=t_back_previous;?></a></div>
	 <div id="body_load_shop_work">
	 	
	 </div>
</div>
<script>
	function openDetailBooking(id){
		$('#main_component').hide();
		$('#sub_component').show();
		var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail";
		$.post(url,{ id : id },function(data){
			$('#body_load_shop_work').html(data);
		});
		
	}
	function backMain(){
		console.log('back');
   		$('#sub_component').hide();
   		$('#main_component').addClass('w3-animate-left');
   		$('#main_component').show();
	}
	/*$('#back_main').click(function(){
		console.log('back');
   		$('#sub_component').hide();
   		$('#main_component').addClass('w3-animate-left');
   		$('#main_component').show();
   });*/
</script>