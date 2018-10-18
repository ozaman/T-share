<div style="padding: 0px;background-color:#fff;height: auto;" >
<ons-list id="list_acti_data">	 
<?php 
	$limit = 10;
	$start = 0;
	$query = $this->db->query("SELECT t1.*,t2.s_topic as ac_topic, t2.s_icons, t2.s_material_icons, t2.s_color FROM activity_event as t1 left join menu_list as t2 on t1.i_type = t2.id where t1.i_user = ".$_COOKIE[detect_user]." and t1.i_status = 1 order by t1.s_post_date desc limit ".$start.",".$limit);
	/*$check_before = '';
	$check_now = '';*/
	$befordate = '';
	$num = $query->num_rows();
	
	$query_all = $this->db->query("SELECT id FROM activity_event where i_user = ".$_COOKIE[detect_user]." and i_status = 1");
  	$num_all = $query_all->num_rows();
	$rest = intval($num_all) - (intval($start) + intval($limit));
	if($rest<=0){
		$display_box_load_more_acti = "display:none";
	}
	
	if($num<=0){ ?>
		<div class="font-22" style="color: #ff0000;text-align: center;padding: 0px; margin-top: 20px;position: absolute; width: 100%;"><strong>ไม่มีบันทึกกิจกรรม</strong></div>
	<? }
	foreach ($query->result() as $row){ 
		$message = explode(" : ",$row->s_message);
		
		if($row->s_material_icons==0){
			$icons = '<i class="'.$row->s_icons.' font-20" style="color: '.$row->s_color.';"></i>';
		}else{
			$icons = '<i class="material-icons font-20" style="margin-right: 7px;position: relative; top: 4px;color: '.$row->s_color.';">'.$row->s_icons.'</i>';
		}
		
		if($row->i_active==1){
			$bg = "style='background-color : #fff'";
		}else{
			$bg = "style='background-color : #edf2fa'";
		}
	$date_row = date('Y-m-d',$row->s_post_date);
	if($row->s_post_date!=""){
		$save_time = date('H:i:s',$row->s_post_date)." น.";
	}else{
		$save_time = "-";
	}
	if($befordate != $date_row){ 
				$befordate = $date_row;
				
				?>
		<ons-list-header style="font-weight: 500;"  class="font-13"><?="วันที่ ".$date_row;?></ons-list-header>
<?php			}	?>
	    <ons-list-item  id="list_activity_<?=$row->id;?>" style=" margin-left: 10px;">
       		<table width="100%">
       			<tr>
       				<td><span class="font-17"><strong><?=$row->s_topic;?></strong>&nbsp;<?=$message[0];?></span></td>
       			</tr>
       			<tr>
       				<td>
       					<span class="font-17"><?=$message[1];?></span>
       				</td>
       			</tr>
       			<tr>
       				<td >
       				<span id="txt_date_diff_ac_<?=$row->id;?>" class="font-15">บันทึกเวลา <?=$save_time;?> น.</span>
       				</td>
       			</tr>
       		</table>
       </ons-list-item>
<?	}	?>
</ons-list>	
</div>
<div style="<?=$display_box_load_more_acti?>;padding: 10px; background-color: #efeff4; margin-top: 0px;" id="box_load_more_acti">
	<!--<ons-progress-bar indeterminate id="progress_load_more_noti" style="display: none;"></ons-progress-bar>-->
	<ons-button style="background-color: #fff; width: 100%;color: #0076ff;" align="center" onclick="loadMoreActivity('<?=$befordate;?>');" id="btn_load_more_acti">
		<ons-icon icon="ion-load-c" spin size="26px" id="icons_load_more_acti" style="display: none;"></ons-icon>
		<span id="txt_load_more_acti">Load More</span>
	</ons-button>
</div>

<input type="hidden" id="check_data_load_start_acti" value="<?=$limit;?>" />
<input type="hidden" id="check_data_load_limit_acti" value="<?=$limit;?>" />
<input type="hidden" id="h" value="0" />

<input type="hidden" id="id_activity_select" value="0" />

<template id="del_ac_dialog.html">
  <ons-alert-dialog id="del_ac_dialog_id" modifier="rowfooter">
    <div class="alert-dialog-title"></div>
    <div class="alert-dialog-content">
      ต้องการลบกิจกรรมนี้หรือไม่
    </div>
    <div class="alert-dialog-footer">
      <ons-alert-dialog-button onclick=" document.getElementById('del_ac_dialog_id').hide();"><b>ยกเลิก</b></ons-alert-dialog-button>
      <ons-alert-dialog-button id="btn_ok_del"><span style="color: #ff0000;">ลบ</span></ons-alert-dialog-button>
    </div>
  </ons-alert-dialog>
</template>