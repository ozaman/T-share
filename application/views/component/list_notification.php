<?php 
$befordate = '';
if($_POST[s_material_icons]==0){
			$icons = '<i class="'.$_POST[s_icons].' font-20" style="color: '.$_POST[s_color].';"></i>';
		}else{
			$icons = '<i class="material-icons font-20" style="margin-right: 7px;position: relative; top: 4px;color: '.$_POST[s_color].';">'.$_POST[s_icons].'</i>';
		}
		
		if($_POST[i_active]==1){
			$bg = "style='background-color : #fff'";
		}else{
			$bg = "style='background-color : #edf2fa'";
		}
		$date1Timestamp = $_POST[s_post_date];
		$date2Timestamp = time();
		$difference = $date2Timestamp - $date1Timestamp;
		$min = $difference/60;
		$hours = $min/60;
		if($hours>24){
				$date_row = date('Y-m-d',$_POST[s_post_date]);
				if($befordate != $date_row){ 
					$befordate = $date_row;	?>
					<ons-list-header style="font-size: 12px;font-weight: 500;"><?="วันที่ ".$date_row;?></ons-list-header>
	<?php			}
		}
?>
<div class="card-activity" id="card-ac_<?=$_POST[id];?>" <?=$bg;?> >
	    	<table width="100%">
	    		<tr>
	    			<td onclick="openNotification('<?=$_POST[id];?>', '<?=$_POST[i_type];?>', '<?=$_POST[ac_topic];?>', '<?=$_POST[i_event];?>');">
	    				<div class="font-20" style="-webkit-font-smoothing: antialiased;font-weight: 400; margin: 0px 0 8px;  padding: 0;"><?=$_POST[s_topic];?>
	    					<span class="font-16" style="font-weight: blod;"><?=$_POST[s_sub_topic];?></span>
	    				</div>
				      	<div class="font-14" style="margin: 0;line-height: 1.4;color: #030303;"><?=$_POST[s_message];?></div>
					    <div style="margin: 5px 0px;">
					    	<?=$icons;?><span id="txt_date_diff_nt_<?=$_POST[id];?>" class="font-13"></span>
					    </div>
	    			</td>
	    			<td width="50" align="center" valign="middle" onclick="app.showFromTemplate();$('#id_notification_select').val(<?=$_POST[id];?>);">
	    			<div class="btn-func-other font-26" ><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div>
	    			</td>
	    		</tr>
	    	</table>
</div>
<script>
//	console.log("<?=$_POST[id];?>");
	var d1 = "<?=date('Y/m/d H:i:s',$_POST[s_post_date]);?>";
	var d2 = js_yyyy_mm_dd_hh_mm_ss();
	$('#txt_date_diff_nt_<?=$_POST[id];?>').text(CheckTimeNotification(d1,d2));
	
</script>