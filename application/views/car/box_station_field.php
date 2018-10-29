<?php 
$_where = array();
$_where[user_class] = $_COOKIE['detect_userclass'];
$_where[i_station_type] = $_GET[i_station_type];
$_select = array('*');
$_order = array();
$_order[i_index] = 'asc';
$STATION_FIELD = $this->Main_model->fetch_data('','',TBL_SHOP_STATION_FIELD,$_where,$_select,$_order);
// print_r($STATION_FIELD);

// echo $_COOKIE['detect_userclass'].'***********'.$_GET[i_station_type];
$_where = array();
$_where[id] = $_GET[i_station_type];
$TYPE = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_TYPE,$_where);

$_where = array();
$_where['member'] = $_COOKIE[detect_user];
$_where['status'] = 1;
$STATION = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION,$_where);

$_where = array();
$_where['id'] = $STATION->station;
$OTHRET = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_OTHRET,$_where);
?>



<ons-list-header class="list-header" style="padding: 5px 0; padding-left: 15px;" >
	<span ><?=$TYPE->topic_th;?></span> 
	<button type="button" class="btn btn-md btn-success btn-equal pull-right" onclick="get_station()" id="get_stations" style="margin: 5px;
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
</button> 
</ons-list-header>

<table class="tb_form" width="100%">

	<?php
	foreach($STATION_FIELD as $row){
		$field = $row->s_field_show;
		?>

		<tr>
			<td width="35%"><?=$row->s_topic_th;?></td>
			<td>
				<ons-input id="<?=$row->s_field;?>" name="<?=$row->s_field;?>" type="text"  class="font-17" value="<?=$OTHRET->$field;?>" style="width: 100%;margin: 5px 0px;padding: 0px 0px;border-bottom: 1px solid #ccc;"></ons-input>
			</td>
		</tr>
	<?php } ?>

</table>



