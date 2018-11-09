<?php
$_where = array();
$_where[user_class] = $_COOKIE['detect_userclass'];
$_select = array('*');
$_order = array();
$_order[id] = 'asc';
$SHOP_STATION = $this->Main_model->fetch_data('','',TBL_SHOP_STATION,$_where,$_select,$_order);





$res = array();
$_where = array();
$_where['status'] = 1;
$_where['member'] = $_COOKIE['detect_user'];
$MEMBER = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION,$_where);
if (count($MEMBER) == 0) {
	$none = 'none';
}
else{
	$none = 'block';

}
$res = array();
$_where = array();
$_where['status'] = 1;
$_where[id] =$MEMBER->station;
$OTHRET = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_OTHRET,$_where);
// print_r($OTHRET->id);






$sql_type = "SELECT * FROM place_car_station_type  WHERE status = 1 order by i_index asc";
$query_type = $this->db->query($sql_type);

$_select = array('*');
$_order = array();
$_order['topic_en'] = 'asc';
$arr[region] = $this->Main_model->fetch_data('','',TBL_WEB_REGION,'',$_select,$_order);
$_where = array();
if (count($MEMBER)!= 0) {

	$_where[area] = $MEMBER->region;
	$_select = array('*');
$_order = array();
$_order['name_th'] = 'asc';
$arr[province] = $this->Main_model->fetch_data('','',TBL_WEB_PROVINCE,$_where,$_select,$_order);
}
else{

	// $_where[area] = $_GET[area];//array();
}

// print_r($arr[province]);
$_where = array();
if (count($MEMBER)!= 0) {
	$_where['PROVINCE_ID'] = $MEMBER->province;
	$_select = array('*');
$_order = array();
$_order['name_th'] = 'asc';
$arr[amphur] = $this->Main_model->fetch_data('','',TBL_WEB_AMPHUR,$_where,$_select,$_order);
}
else{
	// $_where['PROVINCE_ID'] = $_GET[pv];

	// $_where = array();
}

// print_r($arr[amphur]);
?>
<script type="text/javascript">
	
</script>
<form name="form_addstation" id="form_addstation"  enctype="multipart/form-data">
	<input type="hidden" name="check_get_have" value="2" id="check_get_have">
	<input type="hidden" name="" value="<?=$MEMBER->amphur;?>" id="have_arm">
	

<div id="search_station">
<div class=""  style="background: #8BC34A; padding: 5px;" >
	<ons-list-header class="list-header " style="background: #8bc34a; color: #fff;">ค้นหา </ons-list-header>
	<div class="autocomplete" style="    padding: 5px;">
		<input  class="text-input" id="in_search_station" type="text" name="in_search_station" placeholder="สมาคม / บริษัท / คิวรถ" style="    font-size: 17px;
    width: 100%;
    padding: 9px 15px;
    background: #fff;
    color: #333;
    /* border: 1px solid #fff; */
    border-radius: 20px;" >
	</div>
</div>
<!-- <div style="margin: 10px 10px">
	<ons-button type="button" modifier="outline" class="button-margin button button--outline button--large" onclick="add_station_other();" style="background-color: #fff;">เพิ่มข้อมูลใหม่</ons-button>
</div> -->
</div>
<div class="card" id="box_zoon" onclick="//checformadd('box_time')">

	<ons-list-header class="list-header ">ภูมิภาค </ons-list-header>
	<!-- <div class="form-group"> -->

		<!-- <span class="list-header" style="background-image: none;"></span> -->

		<select class="select-input font-17" name="region" id="region" onchange="_region(this.value)" style="border-radius: 0px;padding: 5px;width: 100%; width: 100%;">
			<option value="">เลือกภูมิภาค </option>
			<?php
			foreach($arr[region] as $key=>$region){
        /*if($station->region == $region->id ){
          $selected_sub = "selected";
        }else{
          $selected_sub = "";
      }*/
      if (count($MEMBER) == 0) {
      	if($_GET[area] == $region->id ){
      		$selected_sub = "selected";
      	}else{
      		$selected_sub = "";
      	}
      }
      else{
      	if($MEMBER->region == $region->id ){
      		$selected_sub = "selected";
      	}else{
      		$selected_sub = "";
      	}
      }


      ?>
      <option value="<?=$region->id;?>"  <?=$selected_sub;?> ><?=$region->topic_th;?></option>
  <?php } ?>
</select>

<!-- </div> -->

</div>
<div class="card" id="box_zoon" onclick="//checformadd('box_time')">
	<ons-list-header class="list-header ">จังหวัด</ons-list-header>
	<!-- <div class="form-group"> -->

		<!-- <span class="list-header" style="background-image: none;"></span> -->

		<select class="select-input font-17" name="province" id="province" onchange="_province(this.value);" style="border-radius: 0px;padding: 5px;width: 100%; width: 100%;">
			<option value="">เลือกจังหวัด</option>
			<?php
			foreach($arr[province] as $key=>$province){
        /*if($station->province == $province->id ){
          $selected_sub = "selected";
        }else{
          $selected_sub = "";
      }*/
      if (count($MEMBER) == 0) {
      	if($_GET[pv] == $province->id ){
      		$selected_sub = "selected";
      	}else{
      		$selected_sub = "";
      	}
      }
      else{
      	if($MEMBER->province == $province->id ){
      		$selected_sub = "selected";
      	}else{
      		$selected_sub = "";
      	}
      }

      ?>
      <option value="<?=$province->id;?>"  <?=$selected_sub;?> ><?=$province->name_th;?></option>
  <?php } ?>
</select>

<!-- </div> -->

</div>
<div class="card" id="box_zoon" onclick="">
	
	<ons-list-header class="list-header ">อำเภอ/เขต </ons-list-header>
	
	<select class="select-input font-17" name="amphur" id="amphur" value="" onchange="checkzoon(this.value)" style="border-radius: 0px;padding: 5px;width: 100%; width: 100%;">
		<option value="0">-- เลือกเขต --</option>
		<?php
		foreach($arr[amphur] as $key=>$amphur){

			if($MEMBER->amphur == $amphur->id ){
				$selected_sub = "selected";
			}else{
				$selected_sub = "";
			}
			?>
			<option value="<?=$amphur->id;?>"  <?=$selected_sub;?> ><?=$amphur->name_th;?></option>
		<?php } ?>


	</select>

	<!-- </div> -->

</div>
<div class="card" onclick="">
	<ons-list-header class="list-header ">เลือก</ons-list-header>
	<ons-list>
		<?php 
		foreach($SHOP_STATION as $row){
			$_where = array();
			$_where[id] = $row->i_station_type;
			$TYPE = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_TYPE,$_where);
			if ($MEMBER->type == $row->id) {
				$chekes =  'checked="checked"';
			}
			else{
				$chekes =  '';

			}
			?>

			<ons-list-item tappable onclick="selectTypeCarPlace_edit(<?=$TYPE->id;?>);">
				<label class="left">
					<ons-radio name="station_select" input-id="radio-<?=$TYPE->id;?>" value="<?=$TYPE->id;?>" <?=$chekes ;?> ></ons-radio>
				</label>
				<label for="radio-<?=$TYPE->id;?>" class="center">
					<?=$TYPE->topic_th;?>
				</label>
			</ons-list-item>
			<input type="hidden" value="<?=$TYPE->topic_th;?>" id="type_topic_<?=$TYPE->id;?>" />
			<?php 
		}
		?>
	</ons-list>
</div>

<div id="box_station_others" style="display: <?=$none;?>"></div>
<div class="card" id="shop_station_field" style="display: none">


</div>
</div>
<input type="hidden" name="region_s" id="region_s">
<input type="hidden" name="province_s" id="province_s">
<input type="hidden" name="amphur_s" id="amphur_s">
<input type="hidden" name="selectTypeCarPlace_edit" id="selectTypeCarPlace_edit">


</form>

<div style="margin: 10px 10px" id="btb_submit_form_station" style="display: <?=$cnone;?>">
	<ons-button type="button" modifier="outline" class="button-margin button button--outline button--large" onclick="submitadd_station();" style="background-color: #fff;">บันทึกข้อมูล</ons-button>
</div>
<div style="margin: 10px 10px;">
	<!-- <span class="font-14" >*หมายเหตุ : ข้อมูลนี้จะถูกบันทึกแค่ครั้งเดียว</span> -->
	<span class="font-14" >*หมายเหตุ : ข้อมูลนี้กรอกครั้งเดียวเท่านั่น</span>
</div>
<script type="text/javascript">
	// $('#radio-<?=$OTHRET->type;?>').prop("checked", true);
	setTimeout(function(){ 
	var chek_show = '<?=$OTHRET->type;?>';
	var chek_mem = '<?=count($MEMBER)?>';
	if (chek_show == 4) {
		$('#box_station_others').hide();
	}
	if (chek_mem == 0) {
		ckstation = 2;
		$('#box_station_others').hide();

	}
	else{
		$('#box_station_others').show();

		selectTypeCarPlace_edit(chek_show);
	func_shop_station_field(chek_show)
	}
	}, 1000);
	$('#header_topic_type').html('<?=$TYPE->topic_th;?>')
	
	   //
   //          selectTypeCarPlace_edit(chek_show);
           
   //      
	
	$("#in_search_station").autocomplete({
		minLength: 1,
		source: function(req, add){
			console.log(req)
			var companyList =   $.ajax({
            url: 'main/search', //Controller where search is performed
            dataType: 'json',
            type: 'POST',
            data: req,
            success: function(data){
            	if(data.response ==true){
            		
            		console.log(data)

            		add(data.message);
            	}
            	else{
   //          		$('#form_addstation_div').hide()
			// $('#btb_submit_form_station').hide()
			// $('#btb_submit_form_station_new').show()
            		// ons.notification.alert({
              //                       message: 'กรุณาเลือกเพิ่มข้อมูลใหม่',
              //                       title: "ไม่มีข้อมูล",
              //                       buttonLabel: "ตกลง"
              //                   })
            	}
            }
        });
		},
		select: function (event, ui) {

			 modal.show();
			console.log('*******************************************22222');
			console.log(event);
			console.log(ui);
			// $('#form_addstation_div').show()
			// $('#btb_submit_form_station').show()
			// $('#btb_submit_form_station_new').hide()
			$('#id_station').val(ui.item.station)


			var req = {
				id: ui.item.station,

			};
			$.ajax({
            url: 'main/search_select', //Controller where search is performed
            dataType: 'json',
            type: 'POST',
            data: req,
            success: function(res){
            	ckstation = 0;
            	console.log(res)
            	 _region_s(res.OTHRET.region)
            	//var count = '<?=count($MEMBER);?>'

            	$('#id_station').val(res.OTHRET.id)
            	// _province(res.OTHRET.province)
            	$('#region').val(res.OTHRET.region)
            	$('#province').val(res.OTHRET.province)
            	$('#amphur').val(res.OTHRET.amphur)
            	$('#region_s').val(res.OTHRET.region)
            	$('#province_s').val(res.OTHRET.province)
            	$('#amphur_s').val(res.OTHRET.amphur)
            	$('#selectTypeCarPlace_edit').val(res.OTHRET.type)
            	
            	// selectTypeCarPlace_edit(res.OTHRET.type);

            setTimeout(function() {

            	// 	$('#amphur').val(res.OTHRET.amphur)

            	 $('#radio-'+res.OTHRET.type).prop("checked", true);
            		// $('#station_other').val(res.OTHRET.id)
            	// 	if (count == 0) {
            	// 		$('#check_get_have').val(3)

            	// 	}
            	 }, 1000);
            		// console.log(res)

 

            	}
            });
          return false;
      },

  });
</script>