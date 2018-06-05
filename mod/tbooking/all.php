<script>
   $(".text-topic-action-mod").html('<?=t_job_received;?>');


</script>
<?php
$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน", 
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"                 
);
function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
    $thai_date_return.= "ที่ ".date("j",$time);
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " พ.ศ.".(date("Y",$time)+543);
//    $thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}
?>
<style>
   .time-post{
   margin-right: 12px;
   border: 1px solid #333;
   padding: 5px;
   position: absolute;
   z-index: 1;
   right:  0px;
   background-color: #fff;
   margin-top: -25px;
   border-radius: 25px; 
   }
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
   .btn_filter_active{
   padding: 8px; 
   border: 1px solid #3b5998;
   border-radius: 25px;
   /*	width: 100px;*/
   background-color: #3b5998;
   color: #fff;
   box-shadow: 1px 1px 1px #333;
   cursor: pointer;
   }
   .btn_filter{
   padding: 8px; 
   border: 1px solid #3b5998; 
   border-radius: 25px;
   /*	width: 100px;*/
   cursor: pointer;
   }
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
   .payment-menu{
   border-radius: 50%; background-color:#59AA47; display: block;  
   padding: 12px; 
   width: 50px;
   height: 50px; 
   color:#FFFFFF;  font-size:10px;  
   border: solid 2px #FFFFFF;
   text-align: center;
   vertical-align: middle;  box-shadow: 0px  0px 10px #DADADA  ; margin-left: -5px;  
   }
   .div-all-price{
   /* padding:3px;   
   border-radius: 8px; 
   border:  1px solid #ddd;*/
   background-color:#FFFFFF;  
   /*margin-bottom: 10px; */
   margin-top:0px; 
   /*	 box-shadow: 0px  0px 0px #DADADA  ;*/
   }
   .div-all-zello{
   padding:5px;
   border-radius: 0px;
   border: 1px solid #ddd;
   background-color:#FFF;
   margin-bottom: 5px;
   box-shadow: 0px 0px 0px #DADADA ;
   }
   .list-container{
   font-size: 16px;
   padding: 5px 0px;
   transform: 0.3s;
   /*   padding: 0px;*/
   }
   .w3-ul li{
   padding: 0px 5px;
   border-bottom: 1px solid #ddd;
   }
   .ico-pos{
   position: absolute;
   right: 0px;
   margin: 20px 10px;
   }
   .cancel-work-shop{
   box-shadow: 1px 2px 2px #35353575;
   width: 90px;
   border: 1px solid #a9a9a9;
   background: #FF5722;
   color: #fff;
   position: absolute;
   top: 50px;
   right: 15px;
   /*     margin: 50px 15px;*/
   text-align: center;
   border-radius: 10px;
   }
   .div-all-checkin{
   padding:5px;
   border-radius: 15px;
   border: 1px solid #ddd;
   background-color:#F6F6F6;
   margin-bottom: 5px;
   margin-top:5px;
   box-shadow: 0px 0px 10px #DADADA ;
   }
   .disabledbutton-checkin {
   pointer-events: none;
   background-color:#FFF;
   color:#FFF;
   border: 1px solid #88B34D;
   }
   .step-booking-small {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 5px;
   width: 40px;
   height: 40px;
   text-align: justify;
   color:#FFFFFF;
   font-size:20px;
   font-weight:bold;
   margin-top:-10px;
   text-align:center;
   border: solid 4px #FFFFFF;
   background: #f39c12 !important;
   color: #fff;
   }
   .step-booking-small-no {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 5px;
   width: 40px;
   height: 40px;
   text-align: justify;
   color:#FFFFFF;
   font-size:20px;
   font-weight:bold;
   margin-top:-10px;
   text-align:center;
   border: solid 4px #FFFFFF;
   background: #999999 !important;
   color: #fff;
   }
   .step-booking {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 10px;
   width: 60px;
   height: 60px;
   text-align: justify;
   color:#FFFFFF;
   font-size:30px;
   font-weight:bold;
   text-align:center;
   margin-left:-5px;
   border: solid 3px #F6F6F6;
   box-shadow: 0 0 10px 3px #E8E6E6;
   background: #FF0000 !important;
   color: #fff;
   }
   .step-booking-active {
   border-radius: 50%;
   padding: 10px;
   width: 60px;
   height: 60px;
   text-align: justify;
   color:#FFFFFF;
   font-size:30px;
   font-weight:bold;
   text-align:center;
   margin-left:-5px;
   border: solid 3px #F6F6F6;
   box-shadow: 0 0 10px 3px #E8E6E6;
   background: #59AA47 !important;
   color: #fff;
   }
</style>
<style>
	.btn-approve-job{
		border-radius: 15px;
    	padding: 7px 20px;
    	position:  absolute;
    	right: 15px;
    	bottom: 4px;
    	border: 0px solid;
    	box-shadow: 2px 2px 10px #c5bfbf;
    	background-color: #3b5998;
    	color: #fff;
    	font-size: 12px;
	}
	#main_component{
		margin-top: 50px;
    	border-top: 0px;
    	position: relative;
   		border-radius: 0px;
    	background: #ffffff;
    	width: 100%;
	}
   .box_his,.box_book{
   padding: 5px 8px;
   border: 1px solid #3b5998;
   /*    margin-bottom: 10px;*/
/*   margin: 30px 0px;*/
   margin: 30px 0px;
   border-radius: 25px;
   box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12), 0 3px 1px -2px rgba(0,0,0,.2);
   }
   .mof{
   width: 100%;	
   position: relative;
   border: none;
   outline:none;
   cursor: pointer;
   background: #FFFFFF;
   color: #333;
   padding: 13px;
   border-radius: 2px;
   font-size: 22px;
   }
   .fab{
   border-radius: 50%;
   margin:0;
   padding: 20px;
   }
   .material{
   position:relative;
   color:white;
   margin: 20px auto;
   height:400px;
   width:500px;
   background:#f45673;
   }
   .ripple{
   overflow:hidden;
   }
   .ripple-effect{
   position: absolute;
   border-radius: 50%;
   width: 50px;
   height: 50px;
   background: white;
   animation: ripple-animation 2s;
   }
   @keyframes ripple-animation {
   from {
   transform: scale(1);
   opacity: 0.4;
   }
   to {
   transform: scale(100);
   opacity: 0;
   }
   }
   .text-white{
   color: #ffffff;
   }
</style>

<div id="main_component" >
   <link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css">
   <script src="js/jquery-main.js"></script> 
   <script   src="calendar/js/th.js"></script>
   <link rel="stylesheet" type="text/css" href="pickerdate/classic.css?v=<?=time();?>" />
   <link rel="stylesheet" type="text/css" href="pickerdate/classic.date.css?v=<?=time();?>" />
   <script src="pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
   <script src="pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script>
   <?
      if($data_user_class=='taxi'){
      $filter="and drivername=".$user_id." ";
      } 
      else { 
      $filter=""; 
      }
      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
      $res[web_user] = $db->select_query("SELECT id FROM web_driver WHERE username='" . $_SESSION['data_user_name'] . "'    ");
      $arr[web_user] = $db->fetch($res[web_user]);
      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
      $res[deposit] = $db->select_query("SELECT id,deposit,balance FROM deposit WHERE username='" . $_SESSION['data_user_name'] . "'    ");
      $arr[deposit] = $db->fetch($res[deposit]);
      ?>
   <input id="driver" value="<?=$arr[web_user][id];?>" type="hidden" />
   <div style="
      padding: 10px 20px;
      /* border: 1px solid #ddd;*/margin: 15px 0px;box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
      " align="center"><span class="font-26 text-cap" ><?=t_u_balance." ".number_format($arr[deposit][balance])." ".t_THB;?></span></div>
   <input type="hidden" id="balance" value="<?=$arr[deposit][balance];?>" />
 
   <div class="form-group" style="margin-bottom:5px;">
   	  <div align="center" style="padding: 5px;"><span class="font-26"><?=thai_date(time());?></span></div>
      <div class="input-group date" style="padding:0px;display: none;">
         <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_report" id="date_report"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:24px;z-index: 0;"  >               
         <div class="input-group-addon"  id="btn_calendar" style="cursor:pointer ">
            <i class="fa fa-calendar" style="font-size:26px; " id="icon_calendar"></i> 
         </div>
      </div>
      <!-- /.input group -->
   </div>
   <script>
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
      //      			apiServiceBooking();
      		  }
              });
       }, 500);
   </script>
   <div id="load_booking_data"  style="padding:0px; margin-top:0px;display: nones;" align="center">
      <div style=" margin: 50px;"><img src="images/loader.gif" /></div>
   </div>

   <table>
   	<tr>
   		<td colspan="2"></td>
   	</tr>
   </table>
</div>
<input type="hidden" value="<?=date();?>" id="current_datetime" />
<script>
   var dataHistoryA;
   var txt_pay_cash = '';
   var txt_pay_trans = '';
    function openDetailBooking(index,s_pay,cost){
    	var dv_cost = $('#balance').val();
   console.log(dv_cost+" : "+cost);
   if(s_pay==0){
   	txt_pay_cash = 'งานนี้เป็นงานที่ลูกค้าจ่ายเงินสด จำเป็นต้องหักเงินจากบัญชีในระบบ จำนวน '+addCommas(cost)+' บาท';
   	txt_pay_trans = '';
   	if(dv_cost<cost){
   		$('#material_dialog').show();
   		$('#dialoglLabel').text('ข้อความ');
   		$('#load_modal_body').html('<h4>ไม่สามารถรับงานนี้ได้</h4><div class="font-22" style="padding:5px;">ยอดเงินคงเหลือในระบบของคุณไม่สามารถรับงานนี้ได้ กรุณาเติมเงินเข้าระบบหรือติดต่อเจ้าหน้าที่ ขอบคุณค่ะ</div>');
   //				swal('ไม่สามารถรับงานนี้ได้','ยอดเงินคงเหลือในระบบของคุณไม่สามารถรับงานนี้ได้ กรุณาเติมเงินหรือติดต่อเจ้าหน้าที่ ขอบคุณค่ะ','error');
   		return;
   	}
   }else{
   	txt_pay_cash = '';
   	txt_pay_trans = '';
   }
    			var url = "empty_style.php?name=tbooking&file=book_detail";
   	var post = res_socket[index];
     	$.post(url,post,function(data){
     		$('#load_mod_popup_clean').html(data);
     		$('#main_load_mod_popup_clean').show();
    			$('#main_component').removeClass('w3-animate-left');
     	});
    }
    function openSheetHandle(index,type){
   if(type==1){
   	var post = manageObj[index];
   }else if(type==2){
   	var post = historyObj[index];
   }
    		setTimeout(function(){ 
    			var url = "empty_style.php?name=tbooking&file=sheet_handle";
     	$.post(url,post,function(data){
     		$('#load_mod_popup_clean').html(data);
     		$('#main_load_mod_popup_clean').show();
    			$('#main_component').removeClass('w3-animate-left');
     	});
     	 }, 0);
    }
    function backMain(){
     	console.log('back');
     	$('#main_load_mod_popup .back-full-popup').fadeIn(500);
     	$('#show_main_tool_bottom').fadeIn(500);
      $('#sub_component').hide();
      $('#main_component').addClass('w3-animate-left');
      $('#main_component').show();
    }
    function readDataBooking(){
   	var num = 0;
   //	 	$('#load_booking_data .box_book').remove();
   	$('#load_booking_data div').remove();
   $('#number_book').text(res_socket.length);
   if(res_socket.length<=0){
   	$('#load_booking_data').append('<div class="font-26" style="color: #ff0000;" id="no_work_div"><strong><?=t_no_job;?></strong></div>');
   	return;
   }
   	$.each(res_socket,function(index,res){
   		var d_db = Unix_timestamp(res.post_date);
   		var d_cr = js_yyyy_mm_dd_hh_mm_ss();
   //	 		console.log(d_db+" || "+d_cr);
   	if(d_cr>d_db){
   //				console.log(1);
//   		console.log(CheckTime(d_db,d_cr));
   		var time_post = CheckTime(d_db,d_cr);
   	}else{
   //				console.log(2);
//   		console.log(CheckTime(d_cr,d_db));
   		var time_post = CheckTime(d_cr,d_db);
   	}
   		/*console.log(CheckTime(d_cr,d_db));
   		console.log('db : '+d_db);
   		console.log('cr : '+d_cr);
   		console.log("===================");*/
     var program = res.program.topic_en;
     var pickup_place = res.pickup_place.topic;
     var to_place = res.to_place.topic;
     var outdate = res.outdate;
           var type = res.program.area;
           var time = res.airout_time;
     var id = 'id_list_'+num;
     var s_pay = res.s_status_pay;
     var cost = res.s_cost;
     var car_type;
     if(getCookie("lng")=='en'){
	 	var car_type = res.car_type.topic_en;
	 }else if(getCookie("lng")=='cn'){
	 	var car_type = res.car_type.topic_cn;
	 }else if(getCookie("lng")=='th'){
	 	var car_type = res.car_type.topic_th;
	 }else{
	 	
	 	var car_type = res.car_type.topic_<?=$keep;?>;
	 }
     if(s_pay==0){
     	var type_pay = '<?=t_get_cash;?>';
     }else{
     	var type_pay = '<?=t_transfer_to_account;?>';
     }
        var component2 = 
         '<div class="box_book">'
         +'<span class="font-20 time-post">'+time_post+'</span>'
         +'<button class="mof ripple" id="id_list_'+num+'" onclick="openDetailBooking('+num+','+s_pay+','+cost+');rippleClick(\'' + id + '\');" style="padding: 0px;background:#fbfbfb;">'
    			  +'<div class="w3-bar-item">'
         +'<table width="100%">'
            +'<tbody>'
            	/*+'<tr>'
            		+'<td colspan="2" align="right"><span class="font-20" style="margin-right: 12px;">'+time_post+'</span></td>'
            	+'</tr>'*/
            	+'<tr>'
            		+'<td width="30">'
            			+'<div style="margin-top: -38px;margin-left: 5px;">'
   					  +' <div style="background-color:  #795548;width: 10px;height: 10px; margin-left: 7px;"></div>'
   					   +'<div style="width: 2px;background: #999;margin-left: 11px;height: 20px;" class="line-center"></div>'
   					  +'<div style="background-color:  #3b5998;width: 10px;height: 10px; margin-left: 7px;"></div>'
   					+'</div>'
            		+'</td>'
            		+'<td>'
            			+'<table width="100%"  >'
            				+'<tr style="line-height: 1.5;" >'
   			              +'<td width="100%"><span class="font-24" colspan="2">'+pickup_place+'</span></td>'
   			            +'</tr>'
   			            +'<tr style="line-height: 1.5;">'
   			               +'<td width="100%"><span class="font-24" colspan="2">'+to_place+'</span></td>'
   			            +'</tr>'
   			             +'<tr>'
   			               +'<td><strong><span class="font-22 ">'+type_pay+'</span>&nbsp;&nbsp;<span class="font-22" style="position: absolute;right: 15px;">'+addCommas(cost)+' <?=t_THB;?></span></strong></td>'
   			            +'</tr>'
   			            +'<tr>'
   			               +'<td><span class="font-20 ">'+outdate+'&nbsp;&nbsp;'+time+'</span></td>'					              
   			            +'</tr>'
   			             +'<tr>'
   			               +'<td><span class="font-20">'+car_type+'</span><button class="btn-approve-job" ><span class="font-20"><?=t_accept_order;?></span></button></td>'					              
   			            +'</tr>'
            			+'</table>'
            		+'</td>'
            	+'</tr>'
            +'</tbody>'
         +'</table>'
         +'</div>'
         +'</button>'
         +'</div>';
        $('#load_booking_data').append(component2);
        num++;
         });
   }

   function selectjob(orderid,idorder,invoice,code,program,p_place,to_place,agent,airout_time,airin_time,cost,outdate,ondate,s_status_pay){
   var carid = $('#carid').val();
   if(carid==''){
   	swal('กรุณาเลือกรถที่จะใช้งาน','','error');
   	return;
   }
   var driver = $('#driver').val();
   swal({
     title: "<?=t_job_confirmation;?>",
     text: txt_pay_cash,
     type: "warning",
     showCancelButton: true,
     confirmButtonClass: "btn-danger",
     confirmButtonText: "<?=t_confirm;?>",
     cancelButtonText: "<?=t_cancelled;?>",
     closeOnConfirm: false
   },
   function(){
   	var url_cja = "mod/tbooking/curl_connect_api.php?type=detect_driver_approve";
   	/* check job approve */
   	$.post(url_cja,{ idorder:idorder},function(res_check){
   		console.log(res_check.data.result.length);
   		if(res_check.data.result.length>0){ // check this job have driver approve ?
   	var data = { 	 "idorder" : idorder, 
   					 "orderid" : orderid,
   					 "invoice" : invoice,
   					 "code" : code,
   					 "program" : program,
   					 "driver" : driver,
   					 "carid" : carid,
   					 "pickup_place" : p_place,
   					 "to_place" : to_place,
   					 "agent" : agent,
   					 "airout_time" : airout_time,
   					 "airin_time" : airin_time,
   					 "s_cost" : cost,
   					 "outdate" : outdate,
   					 "ondate" : ondate
                			  };
   	var url = "mod/tbooking/curl_connect_api.php?type=getjob_booking";
   	var bank_account = "Goldenbeach Tour";
   	var deposit_bank = "กสิกรไทย";
   	var bank_number = "909-609-6699";
   	var deposit_date = "<?=date('Y-m-d');?>";
   	var deposit_time = "<?=date('H:m');?>";
   	var username = '<?=$_SESSION["data_user_name"];?>';
   	var deposit = cost;
   	var his_ap = {
   				driver : driver,
   				idorder : idorder,
   				username : username,
   				deposit : deposit,
   				deposit_date : deposit_time,
   				type : "APPROVEJOB",
   				deposit_bank : deposit_bank,
   				bank_account : bank_account,
   				bank_number : bank_number,
   				deposit_date : deposit_date,
   				deposit_time : deposit_time,
   				post_date : '<?=time();?>',
   				post_date_f : deposit_date
   				};
   	$.post(url,data,function(res){
   //				console.log(res);
   		if(res.status=="200"){
   			if(s_status_pay==0){ // Pay Cash
   				$.post("mod/tbooking/curl_connect_api.php?type=php_approve_job",his_ap,function(logdata){
   					swal("<?=t_success;?>!", "<?=t_press_button_close;?>", "success");
   					hideDetail();
   					historyTransfer();
   					console.log(logdata);
   				});
   			}else{ // Pay Transfer bank
   				hideDetail();
   				historyTransfer();
   				swal("<?=t_success;?>!", "<?=t_press_button_close;?>", "success");
   			}
   		}else{
   			swal("<?=t_error;?>!", "<?=t_press_button_close;?>", "error");
   		}
   			});
   		}
		else{
			swal('ไม่สามารถรับงานได้','งานนี้มีคนขับคนอื่นรับงานแล้ว','error');
			hideDetail();
		}
   	});
   });
   } 
   function mapsSelector(lat,lng) {
    if /* if we're on iOS, open in Apple Maps */
      ((navigator.platform.indexOf("iPhone") != -1) || 
       (navigator.platform.indexOf("iPad") != -1) || 
       (navigator.platform.indexOf("iPod") != -1))
      window.open("maps://maps.google.com/maps?daddr="+lat+","+lng+"&amp;ll=");
   else /* else use Google */
      window.open("https://maps.google.com/maps?daddr="+lat+","+lng+"&amp;ll=");
   }
   function hideDetail(){
   $('#load_mod_popup_clean').css('animation','unset'); 
   console.log('hideDetail');
   $('#main_load_mod_popup_clean').hide(); 
   $('#show_main_tool_bottom').fadeIn(500); 
   //		$('#main_component').addClass('w3-animate-left');
   }
   function rippleClick(id){
   console.log('ripple : '+id)
       var $div = $('<div/>'),
           btnOffset = $('#'+id).offset(),
       		xPos = event.pageX - btnOffset.left,
       		yPos = event.pageY - btnOffset.top;
       $div.addClass('ripple-effect');
       var $ripple = $(".ripple-effect");
       $ripple.css("height", $('#'+id).height());
       $ripple.css("width", $('#'+id).height());
       $div
         .css({
           top: yPos - ($ripple.height()/2),
           left: xPos - ($ripple.width()/2),
           background: $('#'+id).data("ripple-color")
         }) 
         .appendTo($('#'+id));
       window.setTimeout(function(){
         $div.remove();
       }, 2000);
   //       event.preventDefault();
   }
   function ViewPhoto(id,type,date){
   var url = 'load_page_photo.php?name=tbooking/load&file=iframe_photo&id='+id+'&type='+type+'&date='+date;
   console.log(url);
   $( "#load_mod_popup_photo" ).toggle();
   $('#load_mod_popup_photo').html(load_main_mod);
    $('#load_mod_popup_photo').load(url); 
   // 	 $('#text_mod_topic_action_photo-txt').text('crfdfdsdsf'); 
   }		
</script>
<script>
   function CheckTime(d1,d2){
   		console.log(d1+" = "+d2);
   //        2018/05/19 12:05:00
   //		  2018/05/19 12:25:24
          datetime1 = d1; 
          datetime2 = d2;
   //       console.log(datetime1)
   //       console.log(datetime2)
          //Set date time format
          var startDate = new Date(datetime1);
          var endDate   = new Date(datetime2);
          var seconds = (endDate.getTime() - startDate.getTime()) / 1000;
          //Calculate time
          var days = Math.floor(seconds / (3600*24));
          var hrs_d   = Math.floor((seconds - (days * (3600*24))) / 3600);
          var hrs   = Math.floor(seconds / 3600);
          var mnts = Math.floor((seconds - (hrs * 3600)) / 60);
          var secs = seconds - (hrs * 3600) - (mnts * 60);
         	//old
         	var hrs_d_bc = hrs_d;
         	var mnts_bc = mnts;
         	var secs_bc = secs;
          //Add 0 if one digit
          if(hrs_d<10) hrs_d = "0" + hrs_d;
          if(mnts<10) mnts = "0" + mnts;
          if(secs<10) secs = "0" + secs;
         	var final_txt, day_txt, h_txy, m_txt, old_txt;
         	if(days==0){
   		day_txt = '';
   	}else{
   		day_txt = days+' วัน';
   	}
   	if(hrs_d_bc==0){
   		h_txy = '';
   	}else{
   		h_txy = ' '+hrs_d_bc+' ชม.';
   	}
   	if(mnts_bc==0){
   		m_txt = '';
   	}else{
   		m_txt = ' '+mnts_bc+' นาที';
   	}
   	final_txt = day_txt + h_txy + m_txt
          old_txt = days + ' ' + hrs_d + ':' + mnts + ':' + secs;
          return  final_txt+"ที่ผ่านมา";
      }
   function js_yyyy_mm_dd_hh_mm_ss () {
     now = new Date();
     year = "" + now.getFullYear();
     month = "" + (now.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
     day = "" + now.getDate(); if (day.length == 1) { day = "0" + day; }
     hour = "" + now.getHours(); if (hour.length == 1) { hour = "0" + hour; }
     minute = "" + now.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
     second = "" + now.getSeconds(); if (second.length == 1) { second = "0" + second; }
     return year + "/" + month + "/" + day + " " + hour + ":" + minute + ":" + second;
   }
   function Unix_timestamp(t){
   	var dt = new Date(t*1000);
   	var date = dt.toLocaleDateString();
   	var hr = dt.getHours();
   	var m = "0" + dt.getMinutes();
   	var s = "0" + dt.getSeconds();
   	var res = date.split("/");
   	var mth = ("0" + res[0]).slice(-2);
   	var last_ds = res[2]+'/'+mth+'/'+res[1];
   	return last_ds+" "+hr+ ':' + m.substr(-2) + ':' + s.substr(-2)
   }
</script>