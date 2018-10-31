function openDetailDv(id,name){
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
}