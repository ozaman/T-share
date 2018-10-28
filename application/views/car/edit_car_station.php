<?php 
$res = array();
$res = array();
$_where = array();
    // $_where['product_id'] = $_GET[id];
$_where['member'] = $_COOKIE['detect_user'];
$MEMBER = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION,$_where); 
  // print_r($MEMBER);
  // 
  // 
if (count($MEMBER)!= 0) {
	$res = array();
	$res = array();
	$_where = array();
    // $_where['product_id'] = $_GET[id];
	$_where['id'] = $MEMBER->type;
	$TYPE = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_TYPE,$_where);
}

$sql_type = "SELECT * FROM place_car_station_type  WHERE status = 1 order by i_index asc";
$query_type = $this->db->query($sql_type);

$_select = array('*');
$_order = array();
$_order['topic_en'] = 'asc';
$arr[region] = $this->Main_model->fetch_data('','',TBL_WEB_REGION,'',$_select,$_order);
$_where = array();
if (count($MEMBER)!= 0) {
	$_where[area] = $MEMBER->region;
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
	$_where['PROVINCE_ID'] = $MEMBER->province;
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
<script>
	setTimeout(function(){ 

		$('#check_get_have').val(0);
		var chek_data = '<?=count($MEMBER);?>';
		if (chek_data == 0) {
			$('#check_get_have').val(2);
$('#btb_submit_form_station_new').show()

			$('#form_addstation_div').hide()
			$('#btb_submit_form_station').hide()
			var area = $('#place_area').val();
			var pv = $('#place_province').val();


			
			
			_province(pv);


		}
		else{
			$('#btb_submit_form_station_new').hide()
		//_province('<?=$MEMBER->amphur;?>')
	}
}, 1000);
</script>
<p class="intro font-16">
	ค้นหาหรือเพิ่มคิวรถ
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
<form name="form_addstation" id="form_addstation"  enctype="multipart/form-data">
<?php
if (count($MEMBER) == 0) {
	$cnone = 'none';
	?>

	<input type="hidden" name="id_station" id="id_station">
	<div class=""  style="    background: #8BC34A;
    padding: 5px;">
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
	<?php 
}
else{
	$cnone = 'block';
}
?>

<!-- <input type="submit"> -->

	<div id="form_addstation_div" style="display: <?=$cnone;?>">
	<input type="hidden" name="check_get_have" value="" id="check_get_have">
	<input type="hidden" name="" value="<?=$MEMBER->amphur;?>" id="have_arm">
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
<div class="card" id="box_zoon" onclick="//checformadd('box_time')">
	
	<ons-list-header class="list-header ">อำเภอ/เขต </ons-list-header>
	<!-- <div class="form-group"> -->

		<!-- <span class="list-header" style="background-image: none;"></span> -->

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
			foreach ($query_type->result() as $row){
				if ($TYPE->id == $row->id) {
					$chekes =  'checked="checked"';
				}
				else{
					$chekes =  '';

				}
				?>

				<ons-list-item tappable onclick="selectTypeCarPlace(<?=$row->id;?>);">
					<label class="left">
						<ons-radio name="station_select" input-id="radio-<?=$row->id;?>" value="<?=$row->id;?>" <?=$chekes ;?> ></ons-radio>
					</label>
					<label for="radio-<?=$row->id;?>" class="center">
						<?=$row->topic_th;?>
					</label>
				</ons-list-item>
				<input type="hidden" value="<?=$row->topic_th;?>" id="type_topic_<?=$row->id;?>" />
				<?php 
			}
			?>
		</ons-list>
	</div>
	<div id="box_station_others"></div>

	<div class="card" id="box_form_toshow" style="display: none">
		<ons-list-header class="list-header" style="padding: 5px 0; padding-left: 15px;" ><span id="header_topic_type"></span> <button type="button" class="btn btn-md btn-success btn-equal pull-right" onclick="get_station()" id="get_stations" style="margin: 5px;
		padding: 5px 12px;
		border: none;
		color: #ffffff;
		background-color: #339933;
		border-color: #2d862d;
		border-radius: 5px;
		margin-top: 0px;
		" style="display: none"> 
		<i class="fa fa-plus "></i>
		<span>เลือกที่มีอยู่</span>
	</button> </ons-list-header>
	<table class="tb_form" width="100%" id="box_form_com" style="display: none;">
		<tr>
			<td width="35%">ชื่อบริษัท</td>
			<td>
				<ons-input id="name_com" name="name_com" type="text"  class="font-17" value="<?=$MEMBER->topic_th;?>" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
		<tr>
			<td width="35%">ที่อยู่</td>
			<td>
				<ons-input id="address_com" name="address_com" type="text"  class="font-17" value="<?=$MEMBER->address;?>" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
		<tr>
			<td width="35%">เบอร์โทร</td>
			<td>
				<ons-input id="phone_com" name="phone_com" type="number" pattern="\d*"  class="font-17"  value="<?=$MEMBER->phone;?>" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
		<tr>
			<td width="35%">ชื่อเจ้าของบริษัท</td>
			<td>
				<ons-input id="leader_name_come" name="leader_name_come" type="text"  class="font-17"  value="<?=$MEMBER->leader;?>" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
		<tr>
			<td width="35%">เบอร์ออฟฟิศ</td>
			<td>
				<ons-input id="phone_office_com" name="phone_office_com" type="number" pattern="\d*" value="<?=$MEMBER->phone_company;?>" class="font-17" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
	</table>

	<table  class="tb_form" width="100%" id="box_form_queue" style="display: none;">
		<tr>
			<td width="35%">ชื่อคิว</td>
			<td>
				<ons-input id="name_q" name="name_q" type="text"  class="font-17" value="<?=$MEMBER->topic_th;?>" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
		<tr>
			<td width="30%">ที่อยู่</td>
			<td>
				<ons-input id="address_q" name="address_q" type="text"  class="font-17"  value="<?=$MEMBER->address;?>" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
		<tr>
			<td width="30%">ชื่อหัวหน้าคิว</td>
			<td>
				<ons-input id="leader_name_q" name="leader_name_q" type="text"  class="font-17" value="<?=$MEMBER->leader;?>" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
		<tr>
			<td width="30%">เบอร์หัวหน้าคิว</td>
			<td>
				<ons-input id="phone_leader_q" name="phone_leader_q" type="number" pattern="\d*" value="<?=$MEMBER->leader_phone;?>" class="font-17" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
	</table>

	<table class="tb_form" width="100%" id="box_form_ass" style="display: none;">
		<tr>
			<td width="35%">ชื่อสมาคม</td>
			<td>
				<ons-input id="name_ass" name="name_ass" type="text"  class="font-17" value="<?=$MEMBER->topic_th;?>" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
		<tr>
			<td width="35%">เบอร์โทรสมาคม</td>
			<td>
				<ons-input id="phone_office_ass" name="phone_office_ass" type="number" pattern="\d*" value="<?=$MEMBER->phone_company;?>" class="font-17" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
		<tr>
			<td width="35%">ที่อยู่สมาคม</td>
			<td>
				<ons-input id="address_ass" name="address_ass" type="text"  class="font-17" value="<?=$MEMBER->address;?>" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
		<tr>
			<td width="35%">ชื่อนายกสมาคม</td>
			<td>
				<ons-input id="leader_name_ass" name="leader_name_ass" type="text"  class="font-17" value="<?=$MEMBER->leader;?>" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
		<tr>
			<td width="30%">เบอร์โทรนายกสมาคม</td>
			<td>
				<ons-input id="phone_leader_ass" name="phone_leader_ass" type="number" pattern="\d*" value="<?=$MEMBER->leader_phone;?>" class="font-17" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
	</table>

</div>
</div>
</form>

<div style="margin: 10px 10px" id="btb_submit_form_station" style="display: <?=$cnone;?>">
	<ons-button type="button" modifier="outline" class="button-margin button button--outline button--large" onclick="submitadd_station();" style="background-color: #fff;">บันทึกข้อมูล</ons-button>
</div>
<div style="margin: 10px 10px" id="btb_submit_form_station_new">
	<ons-button type="button" modifier="outline" class="button-margin button button--outline button--large" onclick="add_station_other();" style="background-color: #fff;">เพิ่มข้อมูลใหม่</ons-button>
</div>
<div style="margin: 10px 10px;">
	<!-- <span class="font-14" >*หมายเหตุ : ข้อมูลนี้จะถูกบันทึกแค่ครั้งเดียว</span> -->
	<span class="font-14" >*หมายเหตุ : ข้อมูลนี้กรอกครั้งเดียวเท่านั่น</span>
</div>
<?php 
$res = array();
$res = array();
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
	setTimeout(function(){ 


		var chek_data = '<?=count($MEMBER);?>';
		var chek_show = '<?=$MEMBER->type;?>';
		if (chek_data == 0) {
			

			var area = $('#place_area').val();
			var pv = $('#place_province').val();


			
			
           //_province(pv);


       }
       else{
			

       	$('#header_topic_type').html('<?=$TYPE->topic_th;?>')
       	$('#get_stations').hide()
       	if(chek_show==1){
       		$('#box_form_toshow').show();
       		$('#box_form_ass').show();
       	}else if(chek_show==2){
       		$('#box_form_toshow').show();
       		$('#box_form_com').show();
       	}else if(chek_show==3){
       		$('#box_form_toshow').show();
       		$('#box_form_queue').show();
       	}else{
       		$('#box_form_toshow').hide();
       	}
       }
   }, 1000);
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
            		$('#form_addstation_div').hide()
			$('#btb_submit_form_station').hide()
			$('#btb_submit_form_station_new').show()
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
			console.log('*******************************************22222');
			console.log(event);
			console.log(ui);
			$('#form_addstation_div').show()
			$('#btb_submit_form_station').show()
			$('#btb_submit_form_station_new').hide()
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
            	
            	console.log(res)
            	var count = '<?=count($MEMBER);?>'

            	
            	_province(res.OTHRET.province)
            	$('#region').val(res.OTHRET.region)
            	$('#province').val(res.OTHRET.province)
            	$('#amphur').val(res.OTHRET.amphur)
            	selectTypeCarPlace(res.OTHRET.type);
            	
            	setTimeout(function() {
            		
            		$('#amphur').val(res.OTHRET.amphur)

            	 $('#radio-'+res.OTHRET.type).prop("checked", true);
            		$('#station_other').val(res.OTHRET.id)
            		if (count == 0) {
            			$('#check_get_have').val(3)
            			if (res.OTHRET.type == 1) {
            				$('#name_ass').val(res.OTHRET.topic_th)
            				$('#phone_office_ass').val(res.OTHRET.phone_company)
            				$('#address_ass').val(res.OTHRET.address)
            				$('#leader_name_ass').val(res.OTHRET.leader)
            				$('#phone_leader_ass').val(res.OTHRET.leader_phone)
            			}
            			if (res.OTHRET.type == 2) {
            				$('#name_com').val(res.OTHRET.topic_th)
            				$('#address_com').val(res.OTHRET.address)
            				$('#phone_com').val(res.OTHRET.phone)
            				$('#leader_name_come').val(res.OTHRET.leader)
            				$('#phone_office_com').val(res.OTHRET.phone_company)
            				
            			}
            			if (res.OTHRET.type == 3) {
            				$('#name_q').val(res.OTHRET.topic_th)
            				$('#address_q').val(res.OTHRET.address)
            				$('#leader_name_q').val(res.OTHRET.leader)
            				$('#phone_leader_q').val(res.OTHRET.leader_phone)
            			}
            		}
            	}, 1000);
            		// console.log(res)



            	}
            });
          //return false;
      },

  });
	 //companyList.autocomplete('option','change').call();
	</script>
