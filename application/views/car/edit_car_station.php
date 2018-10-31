<?php 
$res = array();

$_where = array();
$_where['status'] = 1;
$_where['member'] = $_COOKIE['detect_user'];
$MEMBER = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION,$_where); 
 // print_r($MEMBER);
  // 
  // 
if (count($MEMBER)!= 0) {
	// $cnone = 'block';
	$res = array();
	$_where = array();
    // $_where['product_id'] = $_GET[id];
	$_where['id'] = $MEMBER->type;
	$TYPE = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_TYPE,$_where);
	$res = array();

	$_where = array();
	$_where[id] = $MEMBER->station;
	$OTHERT = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_OTHRET,$_where);
}
else{
	// $cnone = 'none';
}


?>
<script>
	setTimeout(function(){ 

		$('#check_get_have').val(0);
		var chek_data = '<?=count($MEMBER);?>';
		if (chek_data == 0) {
			// $('#check_get_have').val(2);
			// $('#btb_submit_form_station_new').show()

			// $('#form_addstation_div').hide()
			// $('#btb_submit_form_station').hide()
			// var area = $('#place_area').val();
			// var pv = $('#place_province').val();


			
			
			// _province(pv);


		}
		else{
			$('#btb_submit_form_station_new').hide()
		//_province('<?=$MEMBER->amphur;?>')
	}
}, 1000);
</script>
<p class="intro font-16">
	ค้นหาหรือเพิ่มต้นสังกัด
</p>
<style type="text/css">
.tt-hint,
.city {
	border: 2px solid #CCCCCC;
	border-radius: 8px 8px 8px 8px;
	font-size: 24px;
	height: 45px;
	line-height: 30px;
	outline: medium none;
	padding: 8px 12px;
	width: 400px;
}

.tt-dropdown-menu {
	width: 100%;
	margin-top: 5px;
	padding: 8px 12px;
	background-color: #fff;
	border: 1px solid #ccc;
	border: 1px solid rgba(0, 0, 0, 0.2);
	border-radius: 8px 8px 8px 8px;
	font-size: 18px;
	color: #111;
	background-color: #F1F1F1;
}
.ui-widget.ui-widget-content{
	top: 145px;
	left: 8px !important;
	width: 94%;
	border-radius: 5px;
}
</style>

<input type="hidden" name="id_station" id="id_station" value="<?=$MEMBER->station;?>">
<!-- <input type="submit"> -->
<div id="body_car_station" style="display: <?=$cnone;?>"></div>
<div id="form_addstation_div" style="display: <?=$cnone;?>">
	



	<div style="margin: 10px 10px;">
		<!-- <span class="font-14" >*หมายเหตุ : ข้อมูลนี้จะถูกบันทึกแค่ครั้งเดียว</span> -->
		<span class="font-14" >*หมายเหตุ : ข้อมูลนี้กรอกครั้งเดียวเท่านั่น</span>
	</div>
	<?php
	$_where = array();
    // $_where['product_id'] = $_GET[id];
	$_where[id] = $MEMBER->type;
	$TYPE = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_TYPE,$_where); 
	?>
	<script type="text/javascript">
		function add_station_other() {
			$('#form_addstation_div').show()
			$('#btb_submit_form_station').show()
			$('#btb_submit_form_station_new').hide()

		}
	// setTimeout(function(){ 


		var chek_data = '<?=count($MEMBER);?>';
		var chek_show = '<?=$MEMBER->type;?>';
		if (chek_data == 0) {
			var area = $('#place_area').val();
			var pv = $('#place_province').val();
			$.post("car/body_car_station", {
				id_user: $.cookie("detect_user")
			}, function(res) {
				$('#body_car_station').html(res);
			});
		}
		else{
			$('#btb_submit_form_station').hide();
			$.post("car/body_car_station", {
				id_user: $.cookie("detect_user")
			}, function(res) {
				$('#body_car_station').html(res);
			});


			$('#get_stations').hide()
		}
	</script>
