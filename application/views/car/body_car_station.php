<?php


$_where = array();
$_where['member'] = $_COOKIE[detect_user];
$_where['status'] = 1;
$STATION = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION,$_where);

$_where = array();
			$_where['id'] = $STATION->station;
			$OTHRET = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_OTHRET,$_where);


$_where = array();
$_where['id'] = $OTHRET->type;
$TYPE = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_TYPE,$_where);


$_where = array();
$_where[user_class] = $_COOKIE['detect_userclass'];
$_where[i_station_type] = $OTHRET->type;
$_select = array('*');
$_order = array();
$_order[i_index] = 'asc';
$STATION_FIELD = $this->Main_model->fetch_data('','',TBL_SHOP_STATION_FIELD,$_where,$_select,$_order);


?>

<div class="card">
	<ons-list-header class="list-header font-17">ข้อมูลต้นสังกัด</ons-list-header>
	<table class="tb_form" width="100%" id="" style="display: nones;" cellpadding="3" cellspacing="3">
		
		<?php
		foreach($STATION_FIELD as $row){
			$field = $row->s_field_show;
		   
			?>
			<tr>
				<td width="40%">
					<span class="font-17"><?=$row->s_topic_th;?> :</span>
				</td>
				<td>

					<span class="font-17"><?=$OTHRET->$field;?></span>
				</td>
			</tr>


		<?php }
		?>
	</table>
</div>

<div style="margin: 10px 10px" id="btb__station_new">
	<ons-button type="button" modifier="outline" class="button-margin button button--outline button--large" onclick="add_btb__station_new();" style="background-color: #fff;">ย้ายสังกัด / เพิ่ม</ons-button>
</div>
