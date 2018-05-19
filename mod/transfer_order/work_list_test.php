
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- <script >
    alert('workk')
</script> -->

<style>

.btn_filter_active{
	padding: 8px; 
	/*border: 1px solid #3b5998;*/
	border-radius: 25px;
/*	width: 100px;*/
	background-color: #3b5998;
	color: #fff;
	box-shadow: 1px 1px 1px #333;
	cursor: pointer;
}
.btn_filter{
	padding: 5px; 
	border: 1px solid #3b5998; 
	border-radius: 25px;
/*	width: 100px;*/
	cursor: pointer;
}
.tocheck{
	
}
.line-center{
/*   		height: 82px;*/
   		height: 62px;
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

</style>
<link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css" /> 
<script src="voice/js/jquery.js"></script>
<script src="js/jquery-main.js"></script> 
<script   src="calendar/js/th.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<!--  <script>
    $(document).ready(function(){
     // alert($.cookie("lng"))
    });
language_load();
</script> -->

<link rel="stylesheet" type="text/css" href="pickerdate/classic.css?v=<?=time();?>" /> 
<link rel="stylesheet" type="text/css" href="pickerdate/classic.date.css?v=<?=time();?>" /> 
<script src="pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
<script src="pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script>

<div style="margin-top: 50px;margin-bottom:0px;">
	<div style="padding:0px 0px; margin: auto;margin-bottom: 5px">
		<table width="100%">
			<tr>

				<td width="50%"><div id="btn_all" class="btn_filter_active tocheck" align="center" onclick="FilterTypeTransfer('all');"><span class="font-22"><? echo t_all_jobs?></span></div></td>
				<td width="50%"><div id="btn_Realtime" class="btn_filter tocheck" align="center" onclick="FilterTypeTransfer('Realtime');"><span class="font-22"><? echo t_now?></span></div></td>
				
			</tr>
            <tr>

                
                <td width="50%"><div id="btn_Reservation" class="btn_filter tocheck" align="center" onclick="FilterTypeTransfer('Reservation');"><span class="font-22"><? echo t_in_advance?></span></div></td>
                <td width="50%"><div id="btn_warkingall" class="btn_filter tocheck" align="center" onclick="warkingall('');"><span class="font-22"><? echo t_process?></span></div></td>
            </tr>
			<!-- <tr>
				
				<td colspan="3">
					<div class="" id="get_for_location" onclick="getfor_location()"  style="
  margin-top: 8px;
    font-size: 14px;
    border: 1px solid #3b5998;
    /* position: absolute; */
    padding: 8px;
    color: #333;
    border-radius: 25px;
    text-align: center;
    margin-bottom: 8px;">ต่ำแหน่งใกล้สุด</div>
				</td>
			
			</tr> -->
		</table>
	</div> 
	<div style="padding:5px 5px; margin: auto;margin-top: 0px;padding-bottom: 5px;">
		<div class="">
		   <div class="input-group date" style="padding:0px;">
		      <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_transfer_work" id="date_transfer_work"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:24px;z-index: 0;padding:10px;"  >               
		      <div class="input-group-addon"  id="btn_calendar" style="cursor:pointer ">
		         <i class="fa fa-calendar icon_calendar" style="font-size:26px; "></i> 
		      </div>
		   </div>
		</div>
	</div>
<style>
#pop_money{
                z-index: 19;
                position: fixed;
                width: 100vw;
                height: 100vh;
                left: 0;
                top: 0;
                background: rgba(0, 0, 0, 0.59);
                display: none;
                /* pointer-events: none; */
            }
	#pop_con{
                z-index: 19;
                position: fixed;
                width: 100vw;
                height: 100vh;
                left: 0;
                top: 0;
                background: rgba(0, 0, 0, 0.59);
                display: none;
                /* pointer-events: none; */
            }
            .pop_con_in{
               /* height: 220px; */
                /* border-radius: 4px; */
                background: #fff;
                min-width: 85vw;
                /* height: auto; */
                left: 50vw;
                top: 50vh;
                transform: translate(-50%,-50%);
                position: fixed;
                z-index: 10;
                border-radius: 15px;
            }
            .pop_con_ln{
                padding: 20px;
                pointer-events: auto;
            }
            #pop_location{
                z-index: 19;
                position: fixed;
                width: 100vw;
                height: 100vh;
                left: 0;
                top: 0;
                background: rgba(0, 0, 0, 0.59);
                display: none;
                /* pointer-events: none; */
            }
            .pop_location_in{
               /* height: 220px; */
                /* border-radius: 4px; */
                background: #fff;
                min-width: 85vw;
                /* height: auto; */
                left: 50vw;
                top: 50vh;
                transform: translate(-50%,-50%);
                position: fixed;
                z-index: 10;
                border-radius: 15px;
            }
            .pop_location_ln{
                padding: 20px;
                pointer-events: auto;
            }
</style>
	<div id="pop_con" style="">
            <div class="pop_con_in">               
                <div class="pop_con_ln">
                    <div class="lng_position" style="text-align: center; font-size: 16px;"><? echo t_please_confirm_selection?></div>
                    <!-- <input type="text" class="textInput" placeholder="New name" id="newname" name="newname" onchange="newname(newname)" > -->
                    
                    <div style="text-align: center;
                    margin-top: 25px;">
                    <div class="lng_find_again btn-close" style="background-color: #f44336;
                    width: 120px;
                    padding: 10px 0px;
                    font-size: 15px;
                    color: #FFF;
                    text-align: center;
                    display: inline-block;
                    border-radius: 25px;
                    margin-right: 15px;
                   " onclick="no_job()"><? echo t_not?></div>
                    <div class="lng-yes2" style="    width: 120px;
                    padding: 10px 0px;
                    font-size: 15px;
                    background-color: #4caf50;
                    color: #FFF;
                    text-align: center;
                    display: inline-block;
                    border-radius: 25px;
                   
                    bottom: 14px;
                    right: 125px;" onclick="getJob('<?=$_POST[id];?>','<?=$_COOKIE["app_remember_user"];?>')"><? echo t_select?></div>
                    </div>
                    
                </div>
            
            </div>
        </div>
        <div id="pop_money" style="">
            <div class="pop_con_in">               
                <div class="pop_con_ln">
                    <div class="lng_position" style="text-align: center; font-size: 16px;"><? echo t_pay_deposit?></div>
                    <!-- <div>ยอดงเินคงเหลือในระบบ<span style="margin-left: 15px"><?=$arr[deposit][deposit]?></span></div> -->
                    <!-- <input type="text" class="textInput" placeholder="New name" id="newname" name="newname" onchange="newname(newname)" > -->
                    
                    <div style="text-align: center;
                    margin-top: 25px;">
                    <div class="lng_find_again btn-close" style="background-color: #f44336;
                    width: 120px;
                    padding: 10px 0px;
                    font-size: 15px;
                    color: #FFF;
                    text-align: center;
                    display: inline-block;
                    border-radius: 25px;
                    margin-right: 15px;
                   " onclick="close_pop()"><? echo t_ok?></div>
                    <!-- <div class="lng-yes2" style="    width: 120px;
                    padding: 10px 0px;
                    font-size: 15px;
                    background-color: #4caf50;
                    color: #FFF;
                    text-align: center;
                    display: inline-block;
                    border-radius: 25px;
                   
                    bottom: 14px;
                    right: 125px;" onclick="getJob('<?=$_POST[id];?>','<?=$_COOKIE["app_remember_user"];?>')">เลือก</div> -->
                    </div>
                    
                </div>
            
            </div>
        </div>
        <div id="pop_location" style="">
            <div class="pop_location_in">               
                <div class="pop_location_ln">
                    <div class="lng_position" style="text-align: center; font-size: 16px;"><? echo t_location?></div>
                    <!-- <input type="text" class="textInput" placeholder="New name" id="newname" name="newname" onchange="newname(newname)" > -->
                    
                    <div style="text-align: center;
                    margin-top: 25px;">
                   
                    </div>
                    
                </div>
            
            </div>
        </div>
	<!-- <div class="" id="get_for_location" onclick="getfor_location()"  style="margin-top: 14px;font-size: 14px;border:1px solid #3b5998;position: absolute;padding: 7px;color: #333;border-radius: 25px;">ต่ำแหน่งใกล้สุด</div> -->
	<div id="box_popup_location" style="display: none;
    position: fixed;
    width: 100vw;
    height: 100vh;
    left: 0;
    top: 0;
    background: #e5e5e5;
    overflow: hidden;
    z-index: 101;">
           <div style="text-align:center;   padding: 5px; font-weight: 600;  text-align: center;">
            <div class="btn_back_tour" onclick="closepopup('poptourregion')">
    <i class="material-icons" style="">reply_all</i>
    <!-- <i class="fa fa-angle-double-left" style=""></i> -->
        <!-- <i class="material-icons" style="color: rgb(22, 179, 177); font-size: 35px;">keyboard_arrow_down</i> -->
    </div>
                <!-- <i class="material-icons " onclick="closepopup('poptouritem')" style="position: absolute; right: 15px;top: 15px">close</i> -->
               <h4 class="headertour lng_region"><? //echo t_location?>ต่ำแหน่งใกล้สุด</h4>               
           </div>
          
            <div style="height: 90vh;
    overflow-y: scroll;
    -webkit-overflow-scrolling: touch;">
               
                    
                        <div id="box_app_location">
                                    
                        </div>
                                
                   
                
            </div>
</div>
	<div  style="padding:5px 5px; margin: auto;margin-top: 0px;" id="body_to_append" class="body_to_append">
		
	</div>	
</div>
<input type="hidden" value="all" id="type_transfer"/>

<script>
var cost_sell,cost_net;
var time_complete = new Array();
var countdownTimer = new Array();
var sec_array = new Array();

function warkingall(){
    console.log('================================incase all==============================')
      // $('#body_to_append').html(load_main_icon_big);
  $('#body_to_append').html(load_main_icon_big);
ckeckhis = true;
$('#btn_all').removeClass('btn_filter_active');
   $('#btn_all').addClass('btn_filter');
   // $('#btn_warkingall').addClass('btn_filter');
   $('#btn_Reservation').addClass('btn_filter');
   // $('#btn_all').removeClass('btn_filter');
   $('#btn_warkingall').addClass('btn_filter_active');
   $('#btn_Reservation').removeClass('btn_filter_active');
   $('#btn_Realtime').removeClass('btn_filter_active');
   $('#btn_Realtime').addClass('btn_filter');


     // $( "#main_load_mod_popup" ).toggle();
     
      var url_load= "load_page_mod.php?name=transfer_order&file=work_list_work&transfer_work=true&lat="+$('#lat').val()+"&lng="+$('#lng').val();
   //    var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
       console.log(url_load);
     //    $.post( url_load, function( data ) {
     //         // $('#main_load_mod_popup').toggle();
     // $('#body_to_append').html(data);
     //  });
      $('#body_to_append').load(load_main_mod_table);
     $('#body_to_append').load(url_load); 
     // $('#body_to_append').html(url_load); 
       
       //$('#body_to_append').load(url_load); 
       

       
   }

function timer(id,seconds) {
	
	if (typeof sec_array[id] == 'undefined') {
		sec_array[id] = seconds;
	}
	if(sec_array[id]<=0){
		
	}
    var days        = Math.floor(sec_array[id]/24/60/60);
    var hoursLeft   = Math.floor((sec_array[id]) - (days*86400));
    var hours       = Math.floor(hoursLeft/3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
    var minutes     = Math.floor(minutesLeft/60);
    var remainingSeconds = sec_array[id] % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    days_txt = days+" วัน ";
    hours_txt = hours+" ชม. ";
    minutes_txt = minutes+" น. ";
    remainingSeconds_txt = remainingSeconds+" วิ ";
    if(days==0){
		days_txt = '';
	}
	if(hours==0){
		hours_txt = '';
	}
	if(minutes==0){
		minutes_txt = '';
	}
	if(remainingSeconds==0){
		remainingSeconds_txt = '';
	}
    document.getElementById('countdown_'+id).innerHTML = days_txt + hours_txt  + minutes_txt + remainingSeconds_txt;
//    document.getElementById('countdown_'+id).innerHTML = days + " วัน " + hours + " ชั่วโมง " + minutes + " นาที " + remainingSeconds+" วินาที";
    if (sec_array[id] <= 0) {
        clearInterval(countdownTimer[id]);
        document.getElementById('countdown_'+id).innerHTML = "Completed";
        
        //$('#box_work_'+id).hide();
    } else {
        sec_array[id]--;
    }
//    console.log('array : '+sec_array[id]);
}

/*$('.button-close-popup-mod').click(function(){
		console.log('close_coutdown');
		$.each( countdownTimer, function( key, value ) { 
				clearInterval(countdownTimer[key]);
//				console.log(key);
		});
		$( "#load_mod_popup" ).html('');
		$( "#load_mod_popup" ).toggle();
});*/
$('.button-close-popup-mod').click(function(){
	// $( "#box_popup_location" ).hide();	
});
	 $('.button-close-popup-mod-1').click(function(){   
    console.log('in case')
 $( "#main_load_mod_popup_1" ).hide();
 
  $( "#load_mod_popup_1" ).html('');
  console.log(openby);
	if(openby!=""){
		 $('.mobileSelect-container').remove();
	}
 
	//  var url_load = "load_page_mod.php?name=booking/load&file=work_all&driver=<?=$user_id?>&day=<? echo date('Y-m-d');?>";
//	      $("#load_booking_data").load(url_load);

     	});	

function location_place(lat_f,lng_f,lat_t,lng_t){
	console.log(lat_f)
	console.log(lng_f)
	console.log(lat_t)
	console.log(lng_t)
	 // var x = document.getElementById("myFrame").src;
  //   document.getElementById("demo").innerHTML = x;
	// https://www.google.com/maps/embed/v1/directions?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&destination="+i.TB_transferplace_topic+"&origin="+$scope.latituderel+","+$scope.longituderel+"&center="+$scope.latituderel+","+$scope.longituderel+"&avoid=tolls|highways&zoom=12?hl="+$scope.checklang
// $("#main_load_mod_popup_1" ).toggle();
  $("#main_load_mod_popup_map" ).toggle();
  // $(".text-topic-action-mod-1" ).html("รับส่ง <?=$arr[order][invoice];?>");
	

	  
	 var url_load= "load_page_map.php?name=transfer_order&file=iframe_location&lat_f="+lat_f+"&lng_f="+lng_f+"&lat_t="+lat_t+"&lng_t="+lng_t;	
	  	  // &lat="+lat_f+"&lng="+lng_f+"&lng_t="+lat_t+"&lng_t="+lng_t;
	  console.log(url_load);
	  
	  $('#load_mod_popup_map').html(load_main_mod);
	  
	  $('#load_mod_popup_map').load(url_load);
	  $('.bottom_popup').hide();



	  
// document.getElementById("map_location").src = dis;
	// $('#main_load_mod_popup_1').show()
	// $('#button-close-popup-mod-1').click()
}
function ViewDetail(id){
	
	 $("#main_load_mod_popup_1" ).toggle();
	  
	  var url_load= "load_page_mod_1.php?name=transfer_order&file=work_detail&order_id="+id;	  
	  console.log(url_load);
	  
	  $('#load_mod_popup_1').html(load_main_mod);
	  
	  $('#load_mod_popup_1').load(url_load); 
	  
	 
//		alert($('.button-close-popup-mod-1').attr('class'));
	   console.log(id);
}
var lat_t, lat_f,lng_t,lng_f,distance ,duration,value;
 function getfor_location(){
 	console.log("--------------------------------------------")
 	// $('#box_popup_location').show(500)

 // 	var type = $('#type_transfer').val();
	// var date = $('#date_transfer_work').val();
	// console.log(type)
	// console.log(date)
	
	//$('#body_to_append').html(load_main_icon_big);
	// $.each( countdownTimer, function( key, value ) { 
	// 			clearInterval(countdownTimer[key]);
	// 	});
	// if(type=="all"){
	// 		type = "";
	// 	}
		
// 	$.post( "mod/transfer_order/action_work.php?action=query_work",{ type:type, date:date },function( data ) {
// 			var obj = JSON.parse(data);
// 			console.log(obj);
// 			if(obj==null){
// 				$('#box_app_location').html('<div class="font-26" style="color: #ff0000;display: nones;" id="no_work_div" ><strong><?echo t_no_job?></strong></div>');
// 				return;
// 			}
// 	  		$('#box_app_location').html('');
// 	  		$.each( obj, function( key, value ) {
// 			  console.log( value.id );

// 			  $.post( "mod/transfer_order/component_work_list.php",value, function( component ) {

// //					console.log(value.id+" : "+key);
// 			  		$('#box_app_location').append(component);
// 					time_complete[value.id] = $('#time_'+value.id).val();
// 					countdownTimer[value.id] = setInterval('timer('+value.id+','+time_complete[value.id]+')', 1000);
					
// 			  });
			
// 		    });
		
			
// 	  		$.each( obj, function( key, value ) {
// 			  console.log( value.id );
			 
// 			  $.post( "mod/transfer_order/component_work_list.php",value, function( component ) {

// 					console.log(value.id+" : "+key);
// 			  		$('#body_to_append').append(component);
// 					time_complete[value.id] = $('#time_'+value.id).val();
// 					countdownTimer[value.id] = setInterval('timer('+value.id+','+time_complete[value.id]+')', 1000);
					
// 			  });
			
// 		    });
// 		    console.log('-----------------------end------------------------------')
// 	});
	
 }

function FilterTypeTransfer(type){
    console.log("******************incase**********************")
	console.log(type);
    $('.body_to_append').html(''); 
	$('.tocheck').removeClass('btn_filter_active');
	$('.tocheck').addClass('btn_filter');
	$('#btn_'+type).removeClass('btn_filter');
	$('#btn_'+type).addClass('btn_filter_active');
	
	$('#type_transfer').val(type);
	QueryData();	
	/*$('#body_to_append').html(load_main_icon_big);
	$.each( countdownTimer, function( key, value ) { 
				clearInterval(countdownTimer[key]);
//				countdownTimer = new Array();
		});
		if(type=="all"){
			type = "";
		}
	$.post( "mod/transfer_order/action_work.php?action=query_work",{ type : type },function( data ) {
			var obj = JSON.parse(data);
			if(obj==null){
				$('#no_work_div').show();
				return;
			}
	  		$('#body_to_append').html('');
	  		$.each( obj, function( key, value ) {
			  console.log( value.id );
			  $.post( "mod/transfer_order/component_work_list.php",value, function( component ) {

//					console.log(value.id+" : "+key);
			  		$('#body_to_append').append(component);
					time_complete[value.id] = $('#time_'+value.id).val();
					countdownTimer[value.id] = setInterval('timer('+value.id+','+time_complete[value.id]+')', 1000);
					
			  });
			
		    });
	});*/
	
}
var id_product;
function no_job(){
	$('#pop_con').hide(500)
}
function selectjob(id){
    id_product = id;
    console.log($('#cost_sell_'+id).val()-$('#cost_net_'+id).val())
    // $('#cost_sell_'+id).val()
    // $('#cost_net_'+id).val()
    //console.log()
   //alert($('#credit_money').val())
    if ($('#credit_money').val() > $('#cost_sell_'+id).val()-$('#cost_net_'+id).val()) {
        console.log(id_product)
        $('#pop_con').show(500)
    }
    else{
        $('#pop_money').show(500)

    }
	
	
}
function close_pop(){
   
    
        $('#pop_money').hide(500)

    
    
}
function getJob(x,y){
	console.log(x)
	console.log(y)
	
	// console.log(<?=$_COOKIE["app_remember_user"];?>)
	// console.log(document.cookie("app_remember_user"))
	 $.ajax({
            type: 'POST',
            url: 'mod/transfer_order/action_getjob.php',
            data: {'driver':y,'pro':id_product },
            //contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                console.log(data)
                 
                 $('#pop_con').hide(500)
                 
                $.each( countdownTimer, function( key, value ) { 
					clearInterval(countdownTimer[key]);
				});
                 var url_load= "load_page_mod.php?name=transfer_order&file=work_list_work&transfer_work=true&lat="+$('#lat').val()+"&lng="+$('#lng').val();

    			 console.log(url_load);
   				 $('#load_mod_popup').html(load_main_mod);
   
    			 $('#load_mod_popup').load(url_load); 
            }
        });
// 	$.post( "mod/transfer_order/action_getjob.php",{ 'driver':y,'pro':x },function( data ) {

// 			  	console.log('========================')
// 			  	console.log(data)
// 			  	// console.log(distance)
// 			  	console.log('========================')
// 			  	// console.log('---------------------')
// 			  	// 	console.log(component)
// 			  	// console.log('---------------------')

// //					console.log(value.id+" : "+key);
			  		
					
// 			  });
}
function QueryData(){
	ckeckhis = false;
	var type = $('#type_transfer').val();
	var date = $('#date_transfer_work').val();
	
	$('#body_to_append').html(load_main_icon_big);
	$.each( countdownTimer, function( key, value ) { 
				clearInterval(countdownTimer[key]);
		});
	if(type=="all"){
			type = "";
		}
		console.log('-------------*************-----------------------')
		// console.log(date)
		// $.ajax({
  //           type: 'POST',
  //           url: 'mod/transfer_order/action_service.php',
  //           data: {'type':type,'date':date },
  //           //contentType: "application/json",
  //           dataType: 'json',
  //           success: function(res) {
  //               console.log(res)
  //               // $('#pop_con').hide(500)
  //           }
  //       });
		// $.post( "http://www.services.t-booking.com/Product/product_job",{ type:type, date:date },function( data ) {
	$.post( "mod/transfer_order/action_work.php?action=query_work&lat="+$('#lat').val()+"&lng="+$('#lng').val(),{ type:type, date:date },function( data ) {
			var obj = JSON.parse(data);
			console.log(obj);
			if(obj==null){
            //     var check_lang = '<?=$_COOKIE["lng"];?>';
            // if (check_lang == 'th') {
            //     $('#text_mod_topic_action').text('งานรับ-ส่ง');
            //   }
            //   else if (check_lang == 'cn') {
            //     $('#text_mod_topic_action').text('  接送工作');
            //   }
            //    else if (check_lang == 'en' || check_lang == undefined) {
            //     $('#text_mod_topic_action').text('Transfer job');
            //   }

				$('#body_to_append').html('<div class="font-26" style="color: #ff0000;display: nones;" id="no_work_div" ><strong><?echo t_no_job?></strong></div>');
				return;
			}
	  		$('.body_to_append').html('');
	  		$.each( obj, function( key, value ) {
	  			console.log('****************')

			  console.log( value.id );
			  console.log($('#lat').val())
			  console.log($('#lng').val())
			  console.log('****************')
	   var froms = {
            lat: parseFloat($('#lat').val()),
            lng: parseFloat($('#lng').val())
        };
        bookplace = froms;
        var current = {
            lat: parseFloat(value.lat_from),
            lng: parseFloat(value.lng_from)
        };
        taxistart = current;

        var request = {
            origin: bookplace,
            destination: taxistart,
            travelMode: google.maps.TravelMode.DRIVING
        };
        console.log(request);
        directionsService = new google.maps.DirectionsService;
        directionsDisplay = new google.maps.DirectionsRenderer();
        // directionsDisplay.setMap(map);
        directionsService.route(request, function(response, status) {
            console.log(response);
            console.log(status);
            if (status == 'ZERO_RESULTS') {
                // alert('no Directions Display');
                $('#no_pin_pop').show(500)
            } else{
            	distance = response.routes[0].legs[0].distance.text;
                duration = response.routes[0].legs[0].duration.text;
                console.log(response.routes[0].legs[0].end_location.lat())
                console.log(response.routes[0].legs[0].end_location.lng())
                lat_t = response.routes[0].legs[0].end_location.lat();
                lng_t = response.routes[0].legs[0].end_location.lng();

                var radlat1 = Math.PI * lat_f / 180
                var radlat2 = Math.PI * lat_t / 180
                var theta = lng_f - lng_t;
                var radtheta = Math.PI * theta / 180
                dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
                dist = Math.acos(dist)
                dist = dist * 180 / Math.PI
                dist = dist * 60 * 1.609344;
                console.log('***********')
                console.log(distance)
                console.log(duration)
                console.log("44444444444444444444444444444444444")
        console.log("mod/transfer_order/component_work_list.php?dis="+distance+"&du="+duration);
                 $.post( "mod/transfer_order/component_work_list.php?dis="+distance+"&du="+duration, value, function( component ) {
			  	console.log('========================')
			  	// console.log(distance)
			  	console.log('========================')
			  	// console.log('---------------------')
			  	// 	console.log(component)
			  	// console.log('---------------------')

//					console.log(value.id+" : "+key);
			  		$('#body_to_append').append(component);
			  		$('#person_'+value.id).html(value.person)
			  		$('#name_'+value.id).html(value.guest_english)
			  		$('#phone_'+value.id).html(value.phone)
			  		$('#cost_'+value.id).html(value.total_price)
			  		$('#car_'+value.id).html(value.car_topic_th)
			  		$('#pax_'+value.id).html(value.pax_th)
                    $('#vocher_'+value.id).html(value.invoice)
                    $('#cost_sell_'+value.id).val(value.cost_a_agent_all)
                    $('#cost_net_'+value.id).val(value.cost_a_nett)
                    
                    console.log(value.cost_a_agent_all)
                    console.log(value.cost_a_nett)


					time_complete[value.id] = $('#time_'+value.id).val();
					countdownTimer[value.id] = setInterval('timer('+value.id+','+time_complete[value.id]+')', 1000);
					// $('#box_work2_'+value.id).append('<div>'+distance+'</div>');
					
			  });
                // $('#edit_pin_pop').show(500);                
                // infowindowDetailTravel = new google.maps.InfoWindow({ maxWidth: 200 });
                // infowindowDetailTravel.setContent('<div><p> ' + lng_distance + ' ' + distance + '</p><p>' + lng_usetime + ' ' + duration + '</p></div>');
                // infowindowDetailTravel.open(map, endMarker);
                // directionsDisplay.setDirections(response);
                // directionsDisplay.setOptions({
                //     suppressMarkers: true,
                //     preserveViewport: true
                // });
            }
        });
        
			 

			
		    });
	});
	
}

</script>

<script>

    var check_lang = '<?=$check_default_browser_lng;?>';
    console.log(check_lang);
	if (check_lang == 'th') {
        $('#text_mod_topic_action').text('งานรับ-ส่ง');
      }
      else if (check_lang == 'cn') {
        $('#text_mod_topic_action').text('接送工作');
      }
       else if (check_lang == 'en' || check_lang == undefined) {
        $('#text_mod_topic_action').text('Transfer job');
      }
	
//	QueryData();
	/*$.post( "mod/transfer_order/action_work.php?action=query_work", function( data ) {
			var obj = JSON.parse(data);
			if(obj==null){
				$('#no_work_div').show();
				return;
			}
	  		
	  		$.each( obj, function( key, value ) {
			  console.log( value );
			  $.post( "mod/transfer_order/component_work_list.php",value, function( component ) {

					console.log(value.id+" : "+key);
			  		$('#body_to_append').append(component);
					time_complete[value.id] = $('#time_'+value.id).val();
					
					countdownTimer[value.id] = setInterval('timer('+value.id+','+time_complete[value.id]+')', 1000);
					
			  });
			
		    });
	});*/
	
</script>

<script>
 	$('#btn_calendar').click(function(){
		var input1 = $('#date_transfer_work').pickadate(); 
	    var picker = input1.pickadate('picker');
	    setTimeout(function(){ picker.open(true); }, 500);
		
 	});
</script>

<script>
setTimeout(function(){ 
var date=$('#date_transfer_work').val();

    $('#date_transfer_work').pickadate({
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy/mm/dd',
        closeOnSelect: true,
        closeOnClear: false,
        "showButtonPanel": false,
        onStart: function() {
            this.set('select', date); // Set to current date on load
   
        },
		  onSet: function(context) {
		  	     var date=$('#date_transfer_work').val();
		    	console.log(date);
		    	if (ckeckhis == true) {

                }
                else{
                    QueryData();
                }
                
                
		  }
        });
}, 500);
</script>


