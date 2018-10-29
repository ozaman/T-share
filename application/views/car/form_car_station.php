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
$res = array();
$_where = array();
$_where['status'] = 1;
$_where[id] =$MEMBER->station;
$OTHRET = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_OTHRET,$_where);







$sql_type = "SELECT * FROM place_car_station_type  WHERE status = 1 order by i_index asc";
$query_type = $this->db->query($sql_type);

$_select = array('*');
$_order = array();
$_order['topic_en'] = 'asc';
$arr[region] = $this->Main_model->fetch_data('','',TBL_WEB_REGION,'',$_select,$_order);
$_where = array();
if (count($MEMBER)!= 0) {
	$_where[area] = $OTHRET->region;
}
else{
	$_where = array();
}
$_select = array('*');
$_order = array();
$_order['name_th'] = 'asc';
$arr[province] = $this->Main_model->fetch_data('','',TBL_WEB_PROVINCE,$_where,$_select,$_order);
// print_r($arr[province]);
$_where = array();
if (count($MEMBER)!= 0) {
	$_where['PROVINCE_ID'] = $OTHRET->province;
}
else{
	$_where = array();
}
$_select = array('*');
$_order = array();
$_order['name_th'] = 'asc';
$arr[amphur] = $this->Main_model->fetch_data('','',TBL_WEB_AMPHUR,$_where,$_select,$_order);
// print_r($arr[amphur]);
?>
<div id="search_station">
<div class=""  style="background: #8BC34A; padding: 5px;display: none;" >
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
<div style="margin: 10px 10px">
	<ons-button type="button" modifier="outline" class="button-margin button button--outline button--large" onclick="add_station_other();" style="background-color: #fff;">เพิ่มข้อมูลใหม่</ons-button>
</div>
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
      	if($OTHRET->region == $region->id ){
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
      	if($OTHRET->province == $province->id ){
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

			if($OTHRET->amphur == $amphur->id ){
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
			if ($OTHRET->type == $row->id) {
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

<div id="box_station_others"></div>
<div class="card" id="shop_station_field" style="display: none">


</div>
<script type="text/javascript">
	$('#radio-<?=$OTHRET->type;?>').prop("checked", true);
	var chek_show = '<?=$OTHRET->type;?>';
	$('#header_topic_type').html('<?=$TYPE->topic_th;?>')
	selectTypeCarPlace_edit(chek_show);
	// func_shop_station_field(chek_show)
	function func_shop_station_field(station_type) {
		$.post("car/shop_station_field?i_station_type="+station_type, function(res) {
        //console.log(res);
        $('#shop_station_field').html(res);

    });
	}
</script>