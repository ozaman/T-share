<?php if($_POST[s_material_icons]==0){
			$icons = '<i class="'.$_POST[s_icons].' font-20" style="color: '.$_POST[s_color].';"></i>';
		}else{
			$icons = '<i class="material-icons font-20" style="margin-right: 7px;position: relative; top: 4px;color: '.$_POST[s_color].';">'.$_POST[s_icons].'</i>';
		}
		
		if($_POST[i_active]==1){
			$bg = "style='background-color : #fff'";
		}else{
			$bg = "style='background-color : #edf2fa'";
		}
	$date_row = date('Y-m-d',$_POST[s_post_date]);
	if($befordate != $date_row){ 
				$befordate = $date_row;
				
				?>
		<ons-list-header style="font-size: 12px;font-weight: 500;"><?="วันที่ ".$date_row;?></ons-list-header>
<?php			}	?>
<div style="border-bottom: 1px solid #ccc; padding: 5px 5px;">
       		<table width="100%">
       			<tr>
       				<td><?=$_POST[s_topic];?></td>
       			</tr>
       			<tr>
       				<td>
       					<span><?=$_POST[s_message];?></span>
       				</td>
       			</tr>
       			<tr>
       				<td >
       				<span class="font-14"><span id="txt_date_diff_ac_<?=$_POST[id];?>" class="font-13">บันทึกเวลา <?=date('H:i:s');?> น.</span></span>
       				</td>
       			</tr>
       		</table>
</div>