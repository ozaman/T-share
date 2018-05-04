<!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" />
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>-->
<script>
   $(".text-topic-action-mod").html('T-Booking');
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
      ?>
   <div class="form-group">
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
   <!--แสดงผล-->
   <div id="load_booking_data"  style="padding:0px; margin:0;">
     
   </div>

</div>
<div class="w3-animate-right " id="sub_component" style="display: none;margin-top: 0px;overflow-x: hidden; margin-bottom:20px;width:100%; ">
   <div class="font-22" style="padding: 5px 0px;margin-top: 0px;" onclick="backMain();" ><a id="back_main"><i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;<?=t_back_previous;?></a></div>
   <div id="body_load_tb_work">
   </div>
</div>
<script>
   function openDetailBooking(index){
   
   /*	$('#main_component').hide();
   	$('#sub_component').show();
   	$('#main_load_mod_popup .back-full-popup').fadeOut(500);
   	$('#show_main_tool_bottom').fadeOut(500);

   	var url = "empty_style.php?name=tbooking&file=book_detail";
   	$.post(url,res_socket[index],function(data){
   		$('#body_load_tb_work').html(data);
   	});*/
   		
   		
   		$('#main_load_mod_popup_clean').show();
   		$('#main_component').removeClass('w3-animate-left');
   		var url = "empty_style.php?name=tbooking&file=book_detail";
	   	$.post(url,res_socket[index],function(data){
	   		$('#load_mod_popup_clean').html(data);
	   	});
   }
   function backMain(){
   	console.log('back');
   	$('#main_load_mod_popup .back-full-popup').fadeIn(500);
   	$('#show_main_tool_bottom').fadeIn(500);
     		$('#sub_component').hide();
     		$('#main_component').addClass('w3-animate-left');
     		$('#main_component').show();
   }

</script>
<script>
	readDataBooking();

	function readDataBooking(){
	 	var num = 0;
	 	$('.list-container').remove();
	 	if(res_socket.length<=0){
			$('#load_booking_data').append('<div class="list-container "><h3><strong style="color:#ff0000">ไม่มีงาน</strong></h3></div>');
			return;
		}
	 	$.each(res_socket,function(index,res){
		  var program = res.program.topic_en;
		  var pickup_place = res.pickup_place.topic;
		  var to_place = res.to_place.topic;
		  var ondate = res.ondate;
          var type = res.program.area;
          var time = res.airout_time;
          if(type=="In"){
		  	
		  }
		  else if(type=="Out"){
		  	
		  }
		  else if(type=="Point"){
		  	
		  }
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
	      $('#load_booking_data').append(component);
	      num++;
        });
	 	
	 }
	 
	function selectjob(orderid){
		var user_name = "<?=$_SESSION['data_user_name'];?>";
		var carnumber = "<?=$carnumber;?>";
		var user_id = "<?=$user_id;?>";
//		alert("<?=$_SESSION['data_user_name'];?>");
		/*$('#material_dialog').show();
		$('#dialoglLabel').text('<?=t_select_your_car;?>');
		var url = "empty_style.php?name=tbooking&file=select_car&user_id="+user_id;
		$.post(url,function(res){
			$('#load_modal_body').html(res);
		});*/
		
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
	
</script>