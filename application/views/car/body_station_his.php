<?php


$_where = array();
$_select = array('*');
$_where['member'] = $_COOKIE[detect_user];
$_where['status'] = 0;
$_order[date_end] = 'asc';
$STATION = $this->Main_model->fetch_data('','',TBL_PLACE_CAR_STATION,$_where,$_select,$_order);
?>
<ons-list-header class="list-header font-17" style="    padding: 5px 0px;
    padding-left: 15px;">
     <span>ข้อมูลต้นสังกัด</span> 
		
	</ons-list-header>
<?php 

foreach($STATION as $KEY=> $row){
$_where = array();
			$_where['id'] = $row->station;
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

$_where = array();
$_where[area] = $OTHRET->region;
$PROVINCE = $this->Main_model->rowdata(TBL_WEB_PROVINCE,$_where);

$_where = array();
$_where[PROVINCE_ID] = $OTHRET->province;
$AMPHUR = $this->Main_model->rowdata(TBL_WEB_AMPHUR,$_where);


?>

<div class="card">
	
	<table class="tb_form" width="100%" id="" style="display: nones;" cellpadding="3" cellspacing="3">
		
		<?php
		if ($row->station == 0) {
			$_where = array();
$_where['id'] = 4;
$TYPE = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_TYPE,$_where);

			?>
			<tr>
				<td width="41%" valign="top">
					<span class="font-17">สังกัด :</span>
				</td>
				<td>

					<span class="font-17"><?=$TYPE->topic_th;?></span>
				</td>
			</tr>

	 <?php	}
		else{
		foreach($STATION_FIELD as $row2){
			$field = $row2->s_field_show;
		   
			?>
			<tr>
				<td width="41%" valign="top">
					<span class="font-17"><?=$row2->s_topic_th;?> :</span>
				</td>
				<td>

					<span class="font-17"><?=$OTHRET->$field;?></span>
				</td>
			</tr>


		<?php }
	}
		?>
		<tr>
				<td width="40%" valign="top">
					<span class="font-17">จังหวัด :</span>
				</td>
				<td>

					<span class="font-17"><?=$PROVINCE->name_th;?></span>
				</td>
			</tr>
			<tr>
				<td width="40%" valign="top">
					<span class="font-17">อำเภอ/เขต  :</span>
				</td>
				<td>

					<span class="font-17"><?=$AMPHUR->name_th;?></span>
				</td>
			</tr>
			<tr>
				<td width="40%" valign="top">
					<span class="font-17"> วันที่ออกสังกัด :</span>
				</td>
				<td>

					<span class="font-17"><?=date('Y-m-d', $row->date_end );?></span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div style="" id="btb__station_new">
	<ons-button type="button" modifier="outline" class="button-margin button button--outline button--large" onclick="move_station();" style="background-color: #fff;padding: 0;"> ย้ายสังกัด </ons-button>
</div>
				</td>
				<!-- <td>
					<button type="button" class="btn btn-md btn-success btn-equal pull-right" onclick="move_station('<?=$row->id;?>')" style="margin: 5px;
    padding: 5px 12px;
    border: none;
    color: #ffffff;
    background-color: #339933;
    border-color: #2d862d;
    border-radius: 5px;    margin-top: 0px;"> 
            <i class="fa fa-plus "></i>
            <span>ยายสังกัด</span>
          </button>
				</td> -->
			</tr>
	</table>
</div>


<?php } ?>
