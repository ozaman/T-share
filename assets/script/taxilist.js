/*function openDetailDv(id,name){
		console.log(id);
		
		$('#material_dialog_lg').modal('open');
		$('#dialoglLabel_lg').text(name);
		$('#load_modal_body').html('<br/><br/><br/>');
		var url = "empty_style.php?name=taxi_list&file=driver_detail";
		$.post(url,{ id : id },function(res){
			$('#load_modal_body_lg').html(res);
		});
	}
function viewDocument(dv_id,type,caption){

		$('#material_dialog_lg').modal('close');
		$('#main_load_mod_popup .back-full-popup').hide();
		$('#broModal').show();
		var load_img = "mod/taxi_list/doc_dv_swiper.php?type="+type+"&driver_id="+dv_id+"&caption="+caption;
		console.log(load_img);
		$('#img01').load(load_img);
}*/

function searchDvName(txt_ip){
		console.log(txt_ip);
	  	$('.sp_name').each(function() {
			var txt_name = $(this).text();
			var row_id = $(this).attr('role');
			 if (txt_name.toUpperCase().indexOf(txt_ip.toUpperCase()) > -1) {
		       	$('#list_id_'+row_id).show();
		      } else {
		        $('#list_id_'+row_id).hide();
		      }
		});
}

function searchDvPhone(txt_ip){
//		console.log(txt_ip);
	  	$('.sp_phone').each(function() {
			var txt_phone = $(this).text();
			var row_id = $(this).attr('role');
			 if (txt_phone.toUpperCase().indexOf(txt_ip.toUpperCase()) > -1) {
		       	$('#list_id_'+row_id).show();
		      } else {
		        $('#list_id_'+row_id).hide();
		      }
		});
}

function eachTaxiList(){
		$.each(array_rooms, function( index, value ) {
		  console.log(value );
		  $('#icon_online_'+value).css('color','rgb(139, 195, 74)');
		});
}