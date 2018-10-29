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
	
	$res = array();
	$_where = array();
    // $_where['product_id'] = $_GET[id];
	$_where['id'] = $MEMBER->type;
	$TYPE = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_TYPE,$_where);
}

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
<form name="form_addstation" id="form_addstation"  enctype="multipart/form-data">
	<input type="hidden" name="check_get_have" value="" id="check_get_have">
	<input type="hidden" name="" value="<?=$MEMBER->amphur;?>" id="have_arm">
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
	$cnone = 'none';
}
?>

<!-- <input type="submit"> -->
	<div id="body_car_station"></div>
	<div id="form_addstation_div" style="display: <?=$cnone;?>">
	
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
	function add_btb__station_new(){
		$('#body_car_station').hide()

		$('#form_addstation_div').show()
			$('#btb_submit_form_station').show()
			$('#box_form_toshow').hide()
$.post("car/form_addstation_div", {
        id_user: $.cookie("detect_user")
    }, function(res) {
        //console.log(res);
        $('#form_addstation_div').html(res);
        
   });


	}
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
       		$('#btb_submit_form_station').hide();

       	$.post("car/body_car_station", {
        id_user: $.cookie("detect_user")
    }, function(res) {
        //console.log(res);
        $('#body_car_station').html(res);
        
   });
			

       	// $('#header_topic_type').html('<?=$TYPE->topic_th;?>')
       	$('#get_stations').hide()
       	// if(chek_show==1){
       	// 	$('#box_form_toshow').show();
       	// 	$('#box_form_ass').show();
       	// }else if(chek_show==2){
       	// 	$('#box_form_toshow').show();
       	// 	$('#box_form_com').show();
       	// }else if(chek_show==3){
       	// 	$('#box_form_toshow').show();
       	// 	$('#box_form_queue').show();
       	// }else{
       	// 	$('#box_form_toshow').hide();
       	// }
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
