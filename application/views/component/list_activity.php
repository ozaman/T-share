<?php 
$befordate = $_GET[last_date];
//echo "<pre>";
//print_r($_POST[data]);
//echo "</pre>";
foreach($_POST[data] as $val){
	$message = explode(" : ",$val[s_message]);
if($val[s_material_icons]==0){
			$icons = '<i class="'.$val[s_icons].' font-20" style="color: '.$val[s_color].';"></i>';
		}
	else{
			$icons = '<i class="material-icons font-20" style="margin-right: 7px;position: relative; top: 4px;color: '.$val[s_color].';">'.$val[s_icons].'</i>';
		}
		
		if($val[i_active]==1){
			$bg = "style='background-color : #fff'";
		}else{
			$bg = "style='background-color : #edf2fa'";
		}
	$date_row = date('Y-m-d',$val[s_post_date]);
	if($row[s_post_date]!=""){
		$save_time = date('H:i:s',$row[s_post_date])." น.";
	}else{
		$save_time = "-";
	}
	if($befordate != $date_row){ 
				$befordate = $date_row;
				?>
		<ons-list-header style="font-weight: 500;" class="font-13"><?="วันที่ ".$date_row;?></ons-list-header>
<?php			}	?>
<div style="border-bottom: 1px solid #ccc; padding: 5px 5px;">
       		<table width="100%">
       			<tr>
       				<td><span class="font-17"><strong><?=$val[s_topic];?></strong>&nbsp;<?=$message[0];?></span></td>
       			</tr>
       			<tr>
       				<td>
       					<span class="font-17"><?=$message[1];?></span>
       				</td>
       			</tr>
       			<tr>
       				<td >
       				<span id="txt_date_diff_ac_<?=$val[id];?>" class="font-15">บันทึกเวลา <?=$save_time;?></span>
       				</td>
       			</tr>
       		</table>
</div>

<?php } ?>