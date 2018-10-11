<div style="padding: 0px;background-color:#fff;height: 100%;">
<?php 
	$query = $this->db->query("SELECT t1.*,t2.s_topic as ac_topic, t2.s_icons, t2.s_material_icons, t2.s_color FROM notification_event as t1 left join menu_list as t2 on t1.i_type = t2.id where t1.i_driver = ".$_COOKIE[detect_user]." and t1.i_status = 1 order by t1.s_post_date desc ");
	$check_before = '';
	$check_now = '';
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
				<ons-list-header class="list-header" style="font-weight: unset;font-size: 13px;">ตอนนี้</ons-list-header>
				<?php
			}
		}else{ 
			if($check_before != 1){
				$check_before = 1;
				?>
				<ons-list-header class="list-header" style="font-weight: unset;font-size: 13px;">ก่อนหน้านี้</ons-list-header>
				<?php
			}
		 }
		
		
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
	    				<div class="font-20" style="-webkit-font-smoothing: antialiased;font-weight: 400; margin: 0px 0 8px;  padding: 0;"><?=$row->s_topic;?>
	    					<span class="font-16" style="font-weight: blod;"><?=$row->s_sub_topic;?></span>
	    				</div>
				      	<div class="font-14" style="margin: 0;line-height: 1.4;color: #030303;"><?=$row->s_message;?></div>
					    <div style="margin: 5px 0px;">
					    	<?=$icons;?><span id="txt_date_diff_nt_<?=$row->id;?>" class="font-13"></span>
					    </div>
	    			</td>
	    			<td width="50" align="center" valign="middle" onclick="app.showFromTemplate();$('#id_notification_select').val(<?=$row->id;?>);">
	    			<div class="btn-func-other font-26" ><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div>
	    			</td>
	    		</tr>
	    	</table>
	      	
	    </div>
<script>
	console.log("<?=$row->id;?>");
	var d1 = "<?=date('Y/m/d H:i:s',$row->s_post_date);?>";
	var d2 = js_yyyy_mm_dd_hh_mm_ss();
	$('#txt_date_diff_nt_<?=$row->id;?>').text(CheckTime(d1,d2));
	
</script>	   
<?	}	?>
</div>
<input type="hidden" id="id_notification_select" value="0" />