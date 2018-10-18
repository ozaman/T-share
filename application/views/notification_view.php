<div style="padding: 0px;background-color:#fff;height: auto;" id="list_noti_data">
<?php 
	$limit = 10;
	$start = 0;
	if($_COOKIE[detect_userclass]=="taxi"){
		$table = "notification_event_taxi";
	}else{
		$table = "notification_event_lab";
	}
	$query = $this->db->query("SELECT t1.*,t2.s_topic as ac_topic, t2.s_icons, t2.s_material_icons, t2.s_color FROM ".$table." as t1 left join menu_list as t2 on t1.i_type = t2.id where t1.i_user = ".$_COOKIE[detect_user]." and t1.i_status = 1 order by t1.s_post_date desc limit ".$start.",".$limit);
	$check_before = '';
	$check_now = '';
	$befordate = '';
	$num = $query->num_rows();
	
	$query_all = $this->db->query("SELECT id FROM ".$table." where i_user = ".$_COOKIE[detect_user]." and i_status = 1");
  	$num_all = $query_all->num_rows();
	$rest = intval($num_all) - (intval($start) + intval($limit));
	if($rest<=0){
		$display_box_load_more_noti = "display:none";
	}
	if($num<=0){ ?>
		<div class="font-22" style="color: #ff0000;text-align: center;padding: 0px; margin-top: 20px;position: absolute; width: 100%;"><strong>ไม่มีการแจ้งเตือน</strong></div>
	<? }
	foreach ($query->result() as $row){ 
//		$hours = date('H',$row->s_post_date);
		
		$date1Timestamp = $row->s_post_date;
		$date2Timestamp = time();
		$difference = $date2Timestamp - $date1Timestamp;
		$min = $difference/60;
		$hours = $min/60;
//		echo $hours;
		if($hours<3){
			 if($check_now != 1){
				$check_now = 1;
				?>
				<ons-list-header class="list-header font-13" style="font-weight: unset;">ตอนนี้</ons-list-header>
				<?php
			}
		}else{ 
			if($hours>24){
				$date_row = date('Y-m-d',$row->s_post_date);
				if($befordate != $date_row){ 
					$befordate = $date_row;
					?>
					<ons-list-header class="list-header font-13" style="font-weight: unset;"><?="วันที่ ".$date_row;?></ons-list-header>
	<?php			}
			}else{
				if($check_before != 1){
					$check_before = 1;
					?>
					<ons-list-header class="list-header font-13" style="font-weight: unset;">ก่อนหน้านี้</ons-list-header>
					<?php
				}
			}
			
		 }
		 
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
//		echo date('Y/m/d H:i:s',$row->s_post_date);
	?>
	    <div class="card-activity" id="card-ac_<?=$row->id;?>" <?=$bg;?> >
	    	
	    	<table width="100%">
	    		<tr>
	    			<td onclick="openNotification('<?=$row->id;?>', '<?=$row->i_type;?>', '<?=$row->ac_topic;?>', '<?=$row->i_event;?>');">
	    				<div style="-webkit-font-smoothing: antialiased; margin: 0px 0 8px;  padding: 0;"><span class="font-17"><strong><?=$row->s_topic;?></strong></span>
	    					<span class="font-17" style="font-weight: blod;"><?=$row->s_sub_topic." ".$message[0];?></span>
	    				</div>
				      	<div class="font-17" style="margin: 0;line-height: 1.4;color: #030303;"><?=$message[1];?></div>
					    <div style="margin: 5px 0px;">
					    	<?=$icons;?><span id="txt_date_diff_nt_<?=$row->id;?>" class="font-15"></span>
					    </div>
	    			</td>
	    			<td width="50" align="center" valign="middle" onclick="app.showFromTemplate();$('#id_notification_select').val(<?=$row->id;?>);">
	    			<div class="btn-func-other font-26" ><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div>
	    			</td>
	    		</tr>
	    	</table>
	    	
	    </div>
<script>
//	console.log("<?=$row->id;?>");
	var d1 = "<?=date('Y/m/d H:i:s',$row->s_post_date);?>";
	var d2 = js_yyyy_mm_dd_hh_mm_ss();
	$('#txt_date_diff_nt_<?=$row->id;?>').text(CheckTimeNotification(d1,d2));
	
</script>	   
<?	}	?>

</div>
<div style="<?=$display_box_load_more_noti?>;padding: 10px; background-color: #efeff4; margin-top: 0px;" id="box_load_more_noti">
	<!--<ons-progress-bar indeterminate id="progress_load_more_noti" style="display: none;"></ons-progress-bar>-->
	<ons-button style="background-color: #fff; width: 100%;color: #0076ff;" align="center" onclick="loadMoreNoti();" id="btn_load_more_noti">
		<ons-icon icon="ion-load-c" spin size="26px" id="icons_load_more_noti" style="display: none;"></ons-icon>
		<span id="txt_load_more_noti">Load More</span>
	</ons-button>
</div>

<input type="hidden" id="id_notification_select" value="0" />
<input type="hidden" id="check_open_noti_menu" value="1" />
<input type="hidden" id="check_data_load_start" value="<?=$limit;?>" />
<input type="hidden" id="check_data_load_limit" value="<?=$limit;?>" />

