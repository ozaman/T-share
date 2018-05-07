<?php 
   mysql_query("SET NAMES utf8"); 
   mysql_query("SET character_set_results=utf-8");
   $db->connectdb(DB_NAME_BOOK,DB_USERNAME,DB_PASSWORD);
   $res[order] = $db->select_query("SELECT * FROM ap_order where id = '".$_GET[order_id]."' ");
   $arr[order] = $db->fetch($res[order]);
   $db->closedb();
   //  $address_form = findAddress($arr[order][lat_from],$arr[order][lng_from]);
   //  $address_to = findAddress($arr[order][lat_to],$arr[order][lng_to]);
    if($arr[order][adult]>0){
     $adult_txt = 'ผู้ใหญ่ : '.$arr[order][adult];
    }
    if($arr[order][child]>0){
     $child_txt = 'เด็ก : '.$arr[order][child];
    }
    $url_map_form = 'https://www.google.co.th/maps?q='.$arr[order][lat_from].",".$arr[order][lng_from];
    $url_map_to = 'https://www.google.co.th/maps?q='.$arr[order][lat_to].",".$arr[order][lng_to];
    if($arr[order][fashion]=="Realtime"){
     $tr_flight_none = 'display:none;';
    }
    if($arr[order][phone]=='0'){
     $phone_none = 'display:none;';
    }
    if($arr[order][arrival_flight]=='0'){
     $flight_none = 'display:none;';
    }
   /*  $res[place] = $db->select_query("SELECT topic FROM web_transferplace_new where id = '".$arr[order][place]."' ");
   $arr[place] = $db->fetch($res[place]);
   $res[to_place] = $db->select_query("SELECT topic FROM web_transferplace_new where id = '".$arr[order][to_place]."' ");
   $arr[to_place] = $db->fetch($res[to_place]);*/
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[driver] = $db->select_query("SELECT * FROM web_driver where username = '".$_COOKIE[app_remember_user]."' ");
   $arr[driver] = $db->fetch($res[driver]);
   $db->closedb();
   $curl_post_data = '{"product_id" : "'.$arr[order][product].'"}';
       $curl_response = '';
       $headers = array();
   //      $url = "http://services.t-booking.com/Product_dashboard/normal";                               
       $url = "http://services.t-booking.com/Product_dashboard/normal";                               
       $curl = curl_init();
       curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
       curl_setopt($curl, CURLOPT_HTTPHEADER , array(
            'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
       ));
       curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_REFERER, $url);
       curl_setopt($curl, CURLOPT_URL, $url);  
       curl_setopt($curl, CURLOPT_POST, 1);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
       $curl_response = curl_exec($curl);
       curl_close($curl);
       $json_product = json_decode($curl_response);
   if($json_product[0]->area=='In'){
     $area = 'รับเข้า';
     $font_icon_area = '<i class="fa fa-plane " style="-webkit-transform:rotateX(180deg);
                            -moz-transform:rotateX(180deg);
                            -o-transform:rotateX(180deg);
                            -ms-transform:rotateX(180deg);"></i>';
   }else if ($json_product[0]->area=='Out'){
     $area = 'ส่งออก';
     $font_icon_area = '<i class="fa fa-plane "></i>';
   }else if ($json_product[0]->area=='Point'){
     $area = 'Point to Point';
     $font_icon_area = '<i class="fa fa-map-marker"></i>';
   }else if ($json_product[0]->area=='Service'){
     $area = 'บริการ';
     $font_icon_area = '<i class="fa fa-car "></i>';
   }
   ?>
<script>
   var objpd = JSON.parse('<?=json_encode($json_product);?>');
   console.log(objpd);
   $(".text-topic-action-mod-1" ).html("รับส่ง <?=$arr[order][invoice];?>");
</script>
<style>
   .topictransfer1 {
   padding-top: 8px;
   font-family: Arial, Helvetica, sans-serif;
   padding-left: 0x;
   padding-bottom: 5px;
   margin-left: 5px;
   font-size: 16px;
   font-weight: bold;
   color: #444444;
   text-align: left;
   }
   .font_16 {
   font-size: 16px !important;
   font-family: Arial, Helvetica, sans-serif;
   }
   .checkinstep_pass{
   border-radius: 50%;
   background-color: #CCCCCC;
   padding: 5px;
   width: 45px;
   height: 45px;
   text-align: justify;
   color: #FFFFFF;
   font-size: 30px;
   font-weight: bold;
   margin-left: -5px;
   border:solid 2px #03b34f
   }
</style>
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
<div class="box box-default" style="margin-top:35px;">
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
               <div style="background: #fff;
                  /*font-size: 18px;*/
                  border-radius: 25px;
                  color: #3b5998;
                  padding: 5px 30px;
                  border: 2px solid #3b5998;" onclick="shop_status()"><span class="font-22"><? echo t_guest_shopping?></span></div>
            </td>
            <td width="50%" align="center">
               <div style="
                  background: #3b5998;
/*                  font-size: 18px;*/
                  border-radius: 25px;
                  color: #fff;
                  padding: 5px 30px;
                  border: 2px solid #3b5998;
                  " onclick="transfer_status()"><span class="font-22"><? echo t_customer?></span></div>
            </td>
         </tr>
      </table>
   </div>
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
      $('#load_mod_popup').html(data);
      });
      /* $('#load_mod_popup').html(load_main_mod);
      $('#load_mod_popup').load(url_load); */
      }
      function transfer_status(){  
      // $( "#main_load_mod_popup" ).toggle();
      // $("#main_load_mod_popup_1" ).toggle();
      //   var url_load= "load_page_mod.php?name=booking&file=all&order_id=368";	  
      //   console.log(url_load);
      //   $('#load_mod_popup').html(load_main_mod);
      //   $('#load_mod_popup').load(url_load); 
      //		alert($('.button-close-popup-mod-1').attr('class'));
        // console.log(id);
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
      			$('#load_booking_data').html(' ');
      			var type = $('#type_transfer').val();
      	 		var date=$('#date_report').val();
      			var driver = '<?=$_COOKIE["app_remember_user"];?>';
      			  	$.ajax({
      		            type: 'POST',
      		            url: 'mod/booking/load/get_history_job.php',
      		            data: {'driver':driver,'date':date },
      		            //contentType: "application/json",
      		           	dataType: 'json',
      		            success: function(data) {
      		                console.log(data)
      		                if (data != null) {
      		                	$('#number_bottom_chat span').text(data.length);
      		               		$.each( data, function( key, value ) {		        
      				                $.post( "go.php?name=booking/load&file=work_all_job&find=day&day="+date+"&order_id="+value.id, value, function( component ) {
      								  	console.log('========================')
      								  	// console.log(value)
      								  	$('#load_booking_data').append(component);
      								  	console.log('asadsas')
      								  	console.log('========================')
      							  	});
      				    		});
                     			}
      		               	else{
      		               		$('#number_bottom_chat span').text('0')               		
      							$('#load_booking_data').html('<div class="font-26" style="color: #ff0000;" id="no_work_div" ><strong><?echo t_no_job?></strong></div>');
      							return;
      		               	}
                 			 }
              		});	
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
      //$('#load_booking_data').html(load_main_icon_big);
      //var url_place_th = "go.php?name=load/all&file=all&server=th&day="+$("#date_report").val()+"";
      //var url = "go.php?name=booking/load&file=work_all_job&find=day&day=<?=date('Y-m-d')?>&order_id=368";
      //	 $('#load_booking_data').load(url);
      // var date=$('#date_report').val();
      // 		 var url = "load_page_mod.php?name=booking&file=work_all_job&find=day&day="+date+">&order_id=<?=$_GET[order_id]?>";
      // 		 console.log('close');
      // 		 console.log(url);
      // 		  // $('#load_booking_data').html(load_main_mod);
      // 		  $('#load_booking_data').load(url);
      // $('#load_mod_popup').load(url_load); 
   </script>    
   <!--แสดงผล-->
   <div id="load_booking_data"  style="padding:0px; margin:0; margin-top:-25px;">
      <?  //include "mod/booking/load/work_driver.php" ;?>
   </div>
   <!----- ปิด row-->
</div>