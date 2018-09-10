<div  style="margin-top:0px;" id="main_component">
   <div style="padding: 0px 0px;">
     <!--<button onclick="test()">123</button>-->
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
   <div id="date_filter" style="display: none;margin-bottom: 75px;" align="center">
      <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_report" id="date_report"  readonly="true" 
      style=" z-index: 0;font-size: 20px;    text-align: center;"  >

   </div>

   <script>
      function shop_status(){  
      
      var url_load = "load_page_mod.php?name=booking&file=all";
      $('#load_mod_popup').html(load_main_mod);
      $.post( url_load, function( data ) {
     	 $('#load_mod_popup').html(data);
      });
      
      }
      function transfer_status(){  
      
      var url_load= "load_page_mod.php?name=booking&file=all_job";	  
       console.log(url_load);
       $('#load_mod_popup').html(load_main_mod);
      
       $.post( url_load, function( data ) {
      	$('#load_mod_popup').html(data);
      	}); 
     
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
	$('#load_booking_data').html(load_sub_mod);

   	console.log(type);
   $('.tocheck').removeClass('btn_filter_active');
   $('.tocheck').addClass('btn_filter');
   $('#btn_'+type).removeClass('btn_filter');
   $('#btn_'+type).addClass('btn_filter_active');
   
   var date = $('#date_report').val();

    var obj = array_data;

   	if(type=='manage'){
   	 	var url = "go.php?name=booking/shop_history&file=shop_all_js&find=day&day="+date+"&status=new&type=manage";
   	 	$('#date_filter').hide();
   	 	array_ma = obj.manage;
   	 	    
   	 	
   	 	var pass = { data : array_ma};	
   	 	console.log(pass);

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
		console.log(url_his);
		console.log(data);
   		$.post(url_his,data,function(res){
   			 console.log(res);
//   			 array_filter = res.data;
			if(res!=null){
				
			 	array_his = res.data;
   			 	var url = "go.php?name=booking/shop_history&file=shop_all_js&find=day&day="+date+"&status=completed&type=his";
				  $.post(url,{ data : array_his },function(html){
				  		$('#load_booking_data').html(html);
				  });
			 }else{
			 		$('#load_booking_data').html('<div class="font-26" style="color: #ff0000;text-align: center;" id="no_work_div"><strong>ไม่มีงาน</strong></div>');
			 }
   			 
   		});
   		
   		 

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
   	console.log(detailObj);
   	/*array_data.manage[id]*/
//return;
   	var url = "empty_style.php?name=booking/shop_history&file=work_shop_detail_js&user_id=<?=$user_id;?>";
      	$.post(url,detailObj,function(data){
      		$('#load_mod_popup_clean').html(data);
      		$('#main_load_mod_popup_clean').show();
//     			$('#main_component').removeClass('w3-animate-left');

      	});
      	
      	$('#check_open_shop_id').val(detailObj.id);
      	
   }

   function editTimeToPlace(id){
		event.stopPropagation();
		$('#main_load_mod_popup_clean').hide();
		console.log(id);
		$('#material_dialog').modal('open');
		$('#dialoglLabel').html("แก้ไขเวลาถึงสถานที่");	
		var url = "empty_style.php?name=booking/shop_history/load&file=edit_time_toplace&id="+id;
		$.post(url,function(html){
			$('#load_modal_body').html(html);
		});
	}

function cancelBookAll(id,vc){
	var remark1 = '<?=t_customer_no_register;?>';
    var remark2 = '<?=t_customer_not_go;?>';
    var remark3 = '<?=t_wrong_selected_place;?>';
     swal({
   title: "<font style='font-size:28px'><b><? echo t_are_you_sure?> </b></font>",
   text: "<font style='font-size:22px'><? echo t_need_cancel_transfer?></font>"+
//   "<table class="onlyThisTable" width='100%' style='margin:15px;'><tr><td width='40'><input id='remark1' onclick='check("+id+",1);' class='cause_"+id+"'  type='checkbox' value='1' style='display:block;height:25px;' /></td><td><label style='margin-top:8px;' for='remark1'>"+remark1+"</label></td></tr><tr><td width='40'><input id='remark2' onclick='check("+id+",2);' class='cause_"+id+"'  type='checkbox' value='2' style='display:block;height:25px;' /></td><td><label for='remark2' style='margin-top:8px;'>"+remark2+"</label></td></tr><tr><td width='40'><input id='remark3' onclick='check("+id+",3);' class='cause_"+id+"'  type='checkbox' value='3' style='display:block;height:25px;' /></td><td><label for='remark3' style='margin-top:8px;'>"+remark3+"</label></td></tr></table>",
	'<form action="#" style="margin-left: 25px;" id="form_type_cancel">'
    +'<p class="checkradio">'
      +'<input  class="with-gap" name="type" type="radio" id="test1" value="1" />'
      +'<label for="test1">'+remark1+'</label>'
    +'</p>' +'<input type="hidden" value="'+remark1+'" name="typname_1" />'
    +'<p class="checkradio">'
      +'<input  class="with-gap" name="type" type="radio" id="test2" value="2" />'
      +'<label for="test2">'+remark2+'</label>'
    +'</p>' +'<input type="hidden" value="'+remark2+'" name="typname_2" />'
    +'<p class="checkradio">'
      +'<input class="with-gap" name="type" type="radio" id="test3" value="3"  />'
       
      +'<label for="test3">'+remark3+'</label>'
    +'</p>'+'<input type="hidden" value="'+remark3+'" name="typname_3" />'
  +'</form>',
   type: "warning",
   showCancelButton: true,
   confirmButtonClass: "btn-danger waves-effect waves-light",
	cancelButtonClass: "btn-cus waves-effect waves-light",
   confirmButtonText: '<?echo t_yes?>',
   cancelButtonText: "<?echo t_no?>",
   closeOnConfirm: false,
   closeOnCancel: true,
   html: true
   },
   function(isConfirm){
     if (isConfirm){
     	 
       if(! $('input[name="type"]').is(':checked')){
	   		swal('กรุณาเลือกสาเหตุที่ยกเลิก','','error');
	   }	 

       console.log($('#form_type_cancel' ).serialize());

	   var url = "mod/booking/shop_history/php_shop.php?type=cancel&id="+id+"&username=<?=$arr[web_user][username];?>";
	   
	   console.log(url+" ");

	   $.post( url,$('#form_type_cancel' ).serialize(), function( data ) {
	   		console.log(data);

				$('#btn_cancel_book_'+id).hide();
				var url_check_st = "mod/booking/shop_history/load/component_shop.php?request=check_status_shop&status="+data.status;
				console.log(url_check_st);
				
				$.post( url_check_st,$('#form_type_cancel' ).serialize(), function( com ) {
					$('#status_booking_detail').html(com);
					swal("<?=t_success;?>", "", "success");
				});
				
				var url_messages = "send_messages/send_checkin.php?action=cancel&order_id="+id;
				$.post( url_messages, function( res ) {
					console.log(res)
				});

	   });

     }
   });
    }

function approveBook(id,vc,driver){
	swal({
	   title: "รับทราบงานนี้",
	   text: "ยันยันเพื่อส่งการแจ้งเตือนไปยังคนขับว่ารับทราบงานของเขาแล้ว",
	   type: "warning",
	   showCancelButton: true,
	   confirmButtonClass: "btn-danger waves-effect waves-light",
		cancelButtonClass: "btn-cus waves-effect waves-light",
	   confirmButtonText: '<?echo t_yes?>',
	   cancelButtonText: "<?echo t_no?>",
	   closeOnConfirm: false,
	   closeOnCancel: true,
	   html: true
	   },
	   function(isConfirm){
	     if (isConfirm){
	     	 var url = "mod/booking/shop_history/php_shop.php?action=lab_acknowledge";
	     	 $.post( url,{ id:id , vc:vc , posted:"<?=$arr[web_user][username];?>"}, function( data ) {
	     	 	console.log(data);
	     	 	if(data.result==true){
					swal("<?=t_success;?>", "แจ้งเตือนการรับทราบงานของคุณไปยังคนขับแล้ว", "success");
					$('#apporve_book_'+id).hide();
					var url_messages = "send_messages/send_checkin.php?action=acknowledge&order_id="+id+"&driver="+driver+"&vc="+vc;
					$.post( url_messages, function( res ) {
						console.log(res)
					});
				}
	     	 	
	      	 });
	     }
   });
}

function openPointMaps(type,order_id){
//	console.log('view dv point lat='+lat+',lng='+lng);
//   $("#main_load_mod_popup_map" ).show();
	$('#map_side_popup').fadeIn();
//   $('#load_mod_popup_map').html(load_main_mod);
   $('#map_side_popup_body').html(load_main_mod);
   var url_load = "load_page_map.php?name=map_api&file=map_point&user_id=<?=$user_id?>&type="+type+"&order_id="+order_id;
   console.log(url_load);
//   $('#load_mod_popup_map').load(url_load); 
   $('#map_side_popup_body').load(url_load); 
}
</script>