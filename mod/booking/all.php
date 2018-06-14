<script>
   $(".text-topic-action-mod").html('<?php echo t_send_to_customer;?>');
</script>


<div  style="margin-top:40px;" id="main_component">
   <link rel="stylesheet" type="text/css" href="pickerdate/classic.css?v=<?=time();?>" />
   <link rel="stylesheet" type="text/css" href="pickerdate/classic.date.css?v=<?=time();?>" />
   <script src="pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
   <script src="pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script>
   
   <div style="padding: 8px 0px;">
      <table width="100%">
         <tr>
            <td width="50%">
               <div id="btn_manage" class="btn_filter_active tocheck" align="center" onclick="filterMenu('manage');" role="manage" ><span class="font-22"><?=t_process;?></span></div>
            </td>
            <td width="50%">
               <div id="btn_his" class="btn_filter tocheck" align="center" onclick="filterMenu('his');" role="his" ><span class="font-22"><?=t_history;?></span></div>
            </td>
         </tr>
      </table>
   </div>
   <div class="form-group" id="date_filter" style="display: none;">
      <div class="input-group date" style="padding:0px;">
         <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_report" id="date_report"  readonly="true" style="    padding: 20px 20px;
    border-radius: 25px 0 0 25px;
    border: 1px solid <?=$main_color;?>;
    border-right: none;
    background-color: #FFFFFF;
    font-size: 20px;
    z-index: 0;"  >               
         <div class="input-group-addon"  id="btn_calendar" style="    padding: 0 14px;
    border-radius: 0 25px 25px 0;
    border: 1px solid <?=$main_color;?>;
    cursor: pointer;
    border-left: none;">
            <i class="fa fa-calendar" style="font-size:25px; " id="icon_calendar"></i> 
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
      // $('#load_mod_popup').load(url_load);
       $.post( url_load, function( data ) {
      $('#load_mod_popup').html(data);
      }); 
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
      		  	var date = $('#date_report').val();
      		  	var check_now_active = $('.btn_filter_active').attr('role');
      		  	console.log(date+' : '+check_now_active);
					filterMenu(check_now_active);
      		  }
              });
       }, 500);
   </script>
   <div id="load_booking_data"  style="padding:0px; margin:0; ">
   	
   </div>
</div>

<textarea style="display: none;" id="json_shop"><?=json_encode($_POST[book]);?></textarea>
<script>
	var array_ma = [];
	var array_his = [];
   function filterMenu(type){
   	console.log(type);
   $('.tocheck').removeClass('btn_filter_active');
   $('.tocheck').addClass('btn_filter');
   $('#btn_'+type).removeClass('btn_filter');
   $('#btn_'+type).addClass('btn_filter_active');
   
   var date = $('#date_report').val();
//   console.log($('#json_shop').val());
//   var obj = JSON.parse($('#json_shop').val());
/*  if(array_data.length==0){
  	
  	setTimeout(function(){ 
  		filterMenu(type)
  		return;
  	 }, 2000);

  }*/
    var obj = array_data;

   	if(type=='manage'){
//   	 	var url = "go.php?name=booking/shop_history&file=shop_all_js&find=day&day="+date+"&status=new&type=manage";
   	 	var url = "go.php?name=booking/shop_history&file=shop_all_js&find=day&day="+date+"&status=new&type=manage";
   	 	$('#date_filter').hide();
   	 	array_ma = obj.manage;
   	 	    
   	 	$('#load_booking_data').html(load_main_icon_big);
   	 	var pass = { data : array_ma};	
   	 	console.log(pass);
			/*	var pass = { data : array_ma};
			  $.post(url,pass,function(html){
			  	console.log(pass);
//			  		console.log(html)
//			  		$('#load_booking_data').html(html);
			  });*/
			$.ajax({
			  url: url,
			  data: pass,
			  type: 'post',
			  success: function(data) {
//			  	console.log(data);
			    $('#load_booking_data').html(data);
			  }
			});  
   	}
   	else if(type=='his'){
   		$('#date_filter').show();
   		var date_rp = date.replace("-", "/");
   		 date_rp = date_rp.replace("-", "/");
   		 
		if('<?=$data_user_class;?>'=="taxi"){
			var url_his = 'mod/booking/shop_history/php_shop.php?query=history_driver';
			var driver = "<?=$_SESSION['data_user_id'];?>";
			var data = {
				date : date_rp,
				driver : driver
			}
		}
		else{
			var url_his = 'mod/booking/shop_history/php_shop.php?query=history_lab';
			var data = {
				date : date_rp
			}
		}

   		$.post(url_his,data,function(res){
   			 console.log(res);
//   			 array_filter = res.data;
   			 array_his = res.data;
   			 var url = "go.php?name=booking/shop_history&file=shop_all_js&find=day&day="+date+"&status=completed&type=his";
   			 
   		 
   		 $('#load_booking_data').html(load_main_icon_big);	

			  $.post(url,{ data : array_his },function(html){
			  		$('#load_booking_data').html(html);
			  });
   		});
   		
   		 
//   		 console.log(obj.history)
   		/* $.each(obj.history, function( index, value ) {
		 	
		 	var td = formatDate(value.transfer_date);
		 	console.log(td);
		});*/
//   		 array_filter = obj.history;
			
   	}
   	 

   }

   function openDetailBooking(key,type){
	if(type=='manage'){
		var detailObj = array_data.manage[key];
	}else if(type=='his'){
		var detailObj = array_his[key];
	}
	$('#check_open_num_detail').val(key)
	console.log(type+" : "+key);
  /* 	console.log(array_filter[id]);
   	array_data.manage[id]*/

   	var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id=<?=$user_id;?>";
      	$.post(url,detailObj,function(data){
      		$('#load_mod_popup_clean').html(data);
      		$('#main_load_mod_popup_clean').show();
     			$('#main_component').removeClass('w3-animate-left');

      	});
      	
      	$('#check_open_shop_id').val(detailObj.id);
      	
   }

    function backMain(){
     	console.log('back');
     	$('#main_load_mod_popup_clean').hide(); 
   	$('#show_main_tool_bottom').fadeIn(500); 
   	$('#main_component').addClass('w3-animate-left');
   	$('#check_open_shop_id').val(0);
   	$('#load_mod_popup_clean').html('');
//   	filterMenu('manage')
     }

	function editTimeToPlace(id){
		event.stopPropagation();
		$('#main_load_mod_popup_clean').hide();
		console.log(id);
		$('#material_dialog').show();
		$('#dialoglLabel').html("แก้ไขเวลาถึงสถานที่");	
		var url = "empty_style.php?name=booking/shop_history/load&file=edit_time_toplace&id="+id;
		$.post(url,function(html){
			$('#load_modal_body').html(html);
		});
	}

</script>