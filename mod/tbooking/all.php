<!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" />
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>-->

<script>
   $(".text-topic-action-mod").html('T-Booking');
  
</script>

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
	padding: 5px; 
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
.box_his,.box_book{
	padding: 7px 0px;
}
.mof{
  width: 100%;	
  position: relative;
  border: none;
  outline:none;
  cursor: pointer;
  background: #009688;
  color: white;
  padding: 13px;
  border-radius: 2px;
  font-size: 22px;
  box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12), 0 3px 1px -2px rgba(0,0,0,.2);
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

<div class="box " style="margin-top:50px;border-top: 0px;" id="main_component" >
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
     
     
      ?>
<input id="driver" value="<?=$arr[web_user][id];?>" type="hidden" />
   <div style="padding:0px 0px; margin: auto;margin-bottom: 5px">
		<table width="100%">
			<tbody>
			<tr>
				<td width="50%"><div id="btn_job_now" class="btn_filter_active tocheck" align="center" onclick="FilterType('job_now');" ><span class="font-22"><?=t_now;?></span></div>
				<span id="number_book" class="badge font-20" style="position: absolute;top: -3px;left: 107px;font-size: 14px;background-color: #F44336;">0</span>
				</td>
				<td width="50%">
				<div id="btn_history" class="btn_filter tocheck" align="center" onclick="FilterType('history');" ><span class="font-22"><?=t_history;?></span></div>
				<span id="number_history" class="badge font-20" style="position: absolute;top: -3px;right: 20px;font-size: 14px;background-color: #F44336;">0</span>
				</td>
			</tr>
		</tbody>
		</table>
	</div>   
   <div class="form-group" style="margin-bottom:5px;">
      <div class="input-group date" style="padding:0px;">
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
   
   <div id="load_booking_data"  style="padding:0px; margin:0;" align="center">
     
   </div>
   <div id="load_history_data"  style="padding:0px; margin:0;display: none;" class="w3-animate-bottom"  align="center">
     	
   </div>

</div>


<script>
	var driver = $('#driver').val();
    $.post("mod/tbooking/curl_connect_api.php?type=history_booking",{driver:driver},function(res_api_hit){
	   		console.log(res_api_hit);
	   		
	   		if(res_api_hit.status=="200"){
	   			dataHistoryA = res_api_hit.data.result;
	   			$('#number_history').text(dataHistoryA.length);
	   			}
	});
	
   var dataHistoryA;
   function eachObjHistory(){
   	$('#load_history_data .box_his').remove();
   	$.each(dataHistoryA, function( index, value ) {
		      var component2 = 
		      '<div class="box_his">'
		      +'<button class="mof ripple" id="btn_'+index+'" onclick="openSheetHandle('+index+');" style="padding: 0px;">'
   			  +'<div class="w3-bar-item">'
		      +'<table width="100%">'
		         +'<tbody>'
		         	+'<tr>'
		         		+'<td width="30">'
		         			+'<div style="margin-top: -17px;margin-left: 5px;">'
							  +' <div style="background-color:  #795548;width: 10px;height: 10px; margin-left: 7px;"></div>'
							   +'<div style="width: 2px;background: #999;margin-left: 11px;height: 20px;/* margin-top: -10px; */" class="line-center"></div>'
							  +'<div style="background-color:  #3b5998;width: 10px;height: 10px; margin-left: 7px;"></div>'
							+'</div>'
		         		+'</td>'
		         		+'<td>'
		         			+'<table width="100%"  >'
		         				+'<tr style="line-height: 1.5;" >'
					              +'<td width="100%"><span class="font-24 text-white">Ao Por Pier - Phuket Patri</span></td>'
					            +'</tr>'
					            +'<tr style="line-height: 1.5;">'
					               +'<td width="100%"><span class="font-24 text-white">Ao Por Pier - Phuket Patri</span></td>'
					            +'</tr>'
					            +'<tr>'
					               +'<td><span class="font-20 text-white">2018-05-04&nbsp;&nbsp;19.30 </span></td>'
					               +'<td></td>'
					            +'</tr>'
		         			+'</table>'
		         		+'</td>'
		         	+'</tr>'
		         +'</tbody>'
		      +'</table>'
		      +'</div>'
		      +'</button>'
		      +'</div>';
		      $('#load_history_data').append(component2);
					});
   }
   function FilterType(type){
//	console.log(type);
	$('.tocheck').removeClass('btn_filter_active');
	$('.tocheck').addClass('btn_filter');
	$('#btn_'+type).removeClass('btn_filter');
	$('#btn_'+type).addClass('btn_filter_active');
	
	if(type=="job_now"){
		readDataBooking();
		$('#load_booking_data').show();
		$('#load_history_data').hide();
	}
	else if(type=="history"){
		
		
		var driver = $('#driver').val();
		if(dataHistoryA.length<=0){
				$.post("mod/tbooking/curl_connect_api.php?type=history_booking",{driver:driver},function(res_api_hit){
		   		console.log(res_api_hit);
		   		
		   		if(res_api_hit.status=="200"){
		   			dataHistoryA = res_api_hit.data.result;
					eachObjHistory();
				}
		   		
		   	});
		}else{
			eachObjHistory();
		}
	   
		$('#load_booking_data').hide();
		$('#load_history_data').show();
		console.log(driver+" : ");
	}

}

   function openDetailBooking(index){
/*   			var url = "empty_style.php?name=tbooking&file=book_detail";
			var post = res_socket[index];

	   	$.post(url,post,function(data){
	   		$('#load_mod_popup_clean').html(data);
	   		$('#main_load_mod_popup_clean').show();
   			$('#main_component').removeClass('w3-animate-left');
	   	});
	   	*/
	   	rippleClick(index);
	   	setTimeout(function(){ 
   			var url = "empty_style.php?name=tbooking&file=book_detail";
			var post = res_socket[index];

	   	$.post(url,post,function(data){
	   		$('#load_mod_popup_clean').html(data);
	   		$('#main_load_mod_popup_clean').show();
   			$('#main_component').removeClass('w3-animate-left');
	   	});
	   	 }, 300);
   }
   
   function openSheetHandle(index){
   	
   		rippleClick(index)
//   		return;
   		setTimeout(function(){ 
   		
   		
   			var url = "empty_style.php?name=tbooking&file=sheet_handle";
			var post = dataHistoryA[index];

	   	$.post(url,post,function(data){
	   		$('#load_mod_popup_clean').html(data);
	   		$('#main_load_mod_popup_clean').show();
   			$('#main_component').removeClass('w3-animate-left');
	   	});
	   	 }, 300);
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
	 	$('#load_booking_data .box_book').remove();
	 	/*if(res_socket.length<=0){
			$('#load_booking_data').append('<div class="list-container "><h3><strong style="color:#ff0000">ไม่มีงาน</strong></h3></div>');
			return;
		}*/
		$('#number_book').text(res_socket.length);
	 	$.each(res_socket,function(index,res){
		  var program = res.program.topic_en;
		  var pickup_place = res.pickup_place.topic;
		  var to_place = res.to_place.topic;
		  var ondate = res.ondate;
          var type = res.program.area;
          var time = res.airout_time;
		  if(0==1){
          var component = 
          '<div class="list-container " id="id_list_'+num+'" onclick="openDetailBooking('+num+')">'
	         +'<div class="w3-ul w3-card-4" style="box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12), 0 3px 1px -2px rgba(0,0,0,.2);">'
	            +'<div class="w3-bar" >'
	               /*+'<span class="ico-pos font-24"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>'*/
	               		+'<div class="w3-bar-item">'
	                  		+'<table width="100%">'
			                     +'<tbody>'
			                        +'<tr>'
			                           +'<td width="100%"><span class="font-24">'+pickup_place+' - '+to_place+'</span></td>'
			                           /*+'<td width="20%" align="center" rowspan="2"></td>'*/
			                        +'</tr>'
			                        +'<tr>'
			                           +'<td><span class="font-20">'+ondate+'&nbsp;&nbsp;'+time+' </span></td>'
			                           +'<td></td>'
			                        +'</tr>'
			                     +'</tbody>'
			                  +'</table>'
	               		+'</div>'
	            +'</div>'
	         +'</div>'
	      +'</div>';
		  }
	      var component2 = 
		      '<div class="box_book">'
		      +'<button class="mof ripple" id="id_list_'+num+'" onclick="openDetailBooking('+num+')" style="padding: 0px;background:#fbfbfb;">'
   			  +'<div class="w3-bar-item">'
		      +'<table width="100%">'
		         +'<tbody>'
		         	+'<tr>'
		         		+'<td width="30">'
		         			+'<div style="margin-top: -17px;margin-left: 5px;">'
							  +' <div style="background-color:  #795548;width: 10px;height: 10px; margin-left: 7px;"></div>'
							   +'<div style="width: 2px;background: #999;margin-left: 11px;height: 20px;" class="line-center"></div>'
							  +'<div style="background-color:  #3b5998;width: 10px;height: 10px; margin-left: 7px;"></div>'
							+'</div>'
		         		+'</td>'
		         		+'<td>'
		         			+'<table width="100%"  >'
		         				+'<tr style="line-height: 1.5;" >'
					              +'<td width="100%"><span class="font-24 ">'+pickup_place+'</span></td>'
					            +'</tr>'
					            +'<tr style="line-height: 1.5;">'
					               +'<td width="100%"><span class="font-24 ">'+to_place+'</span></td>'
					            +'</tr>'
					            +'<tr>'
					               +'<td><span class="font-20 ">'+ondate+'&nbsp;&nbsp;'+time+'</span></td>'
					               +'<td></td>'
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
	 
	function selectjob(orderid,idorder,invoice,code,program,p_place,to_place,agent,airout_time,airin_time){
		
		var carid = $('#carid').val();
//		alert("<?=$_SESSION['data_user_name'];?>");
		/*$('#material_dialog').show();
		$('#dialoglLabel').text('<?=t_select_your_car;?>');
		var url = "empty_style.php?name=tbooking&file=select_car&user_id="+user_id;
		$.post(url,function(res){
			$('#load_modal_body').html(res);
		});*/
		var driver = $('#driver').val();
		swal({
		  title: "<?=t_are_you_sure;?>",
		  text: "<?=t_want_get_job;?>",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "<?=t_confirm;?>",
		  cancelButtonText: "<?=t_cancelled;?>",
		  closeOnConfirm: false
		},
		function(){
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
							 "airin_time" : airin_time
               			  };
			var url = "mod/tbooking/curl_connect_api.php?type=getjob_booking";
			console.log(data);

			$.post(url,data,function(res){
				console.log(res);
				if(res.status=="200"){
					swal("<?=t_success;?>!", "<?=t_press_button_close;?>", "success");
					hideDetail();
					eachObjHistory();
				}else{
					swal("<?=t_error;?>!", "<?=t_press_button_close;?>", "error");
				}
			});
//		  
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
		$('#main_load_mod_popup_clean').hide(); 
		$('#show_main_tool_bottom').fadeIn(500); 
//		$('#main_component').addClass('w3-animate-left');
	}

	function rippleClick(id){
		console.log('ripple')
      var $div = $('<div/>'),
          btnOffset = $('#btn_'+id).offset(),
      		xPos = event.pageX - btnOffset.left,
      		yPos = event.pageY - btnOffset.top;

      $div.addClass('ripple-effect');
      var $ripple = $(".ripple-effect");
      
      $ripple.css("height", $('#btn_'+id).height());
      $ripple.css("width", $('#btn_'+id).height());
      $div
        .css({
          top: yPos - ($ripple.height()/2),
          left: xPos - ($ripple.width()/2),
          background: $('#btn_'+id).data("ripple-color")
        }) 
        .appendTo($('#btn_'+id));

      window.setTimeout(function(){
        $div.remove();
      }, 2000);
//       event.preventDefault();
	}

</script>

<script>

  $(function() {
    
    
    $('.ripple').on('click', function (event) {
     
      console.log('ripple')
      var $div = $('<div/>'),
          btnOffset = $(this).offset(),
      		xPos = event.pageX - btnOffset.left,
      		yPos = event.pageY - btnOffset.top;

      $div.addClass('ripple-effect');
      var $ripple = $(".ripple-effect");
      
      $ripple.css("height", $(this).height());
      $ripple.css("width", $(this).height());
      $div
        .css({
          top: yPos - ($ripple.height()/2),
          left: xPos - ($ripple.width()/2),
          background: $(this).data("ripple-color")
        }) 
        .appendTo($(this));

      window.setTimeout(function(){
        $div.remove();
      }, 2000);
       event.preventDefault();
    });
    
  });
  
</script>