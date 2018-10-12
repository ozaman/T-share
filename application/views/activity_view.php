<div style="padding: 0px;background-color:#fff;height: 100%;">
<ons-list>	 
<?php 
	$query = $this->db->query("SELECT t1.*,t2.s_topic as ac_topic, t2.s_icons, t2.s_material_icons, t2.s_color FROM activity_event as t1 left join menu_list as t2 on t1.i_type = t2.id where t1.i_driver = ".$_COOKIE[detect_user]." and t1.i_status = 1 order by t1.s_post_date desc ");
	/*$check_before = '';
	$check_now = '';*/
	$befordate = '';
	$num = $query->num_rows();
	if($num<=0){ ?>
		<div class="font-22" style="color: #ff0000;text-align: center;padding: 0px; margin-top: 20px;position: absolute; width: 100%;"><strong>ไม่มีบันทึกกิจกรรม</strong></div>
	<? }
	foreach ($query->result() as $row){ 
		
		
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
	if($befordate != $date_row){ 
				$befordate = $date_row;
				
				?>
		<ons-list-header style="font-size: 12px;font-weight: 500;"><?="วันที่ ".$date_row;?></ons-list-header>
<?php			}	?>
	    <div style="border-bottom: 1px solid #ccc; padding: 5px 5px;" onclick="openDetailHisWallet('<?=$row->id;?>');">
       		<table width="100%">
       			<tr>
       				<td><?=$row->s_topic;?></td>
       			</tr>
       			<tr>
       				<td>
       					<span><?=$row->s_message;?></span>
       				</td>
       			</tr>
       			<tr>
       				<td >
       				<span class="font-14"><span id="txt_date_diff_ac_<?=$row->id;?>" class="font-13">บันทึกเวลา <?=date('H:i:s');?> น.</span></span>
       				</td>
       			</tr>
       		</table>
       </div>
<script>
	/*console.log("<?=$row->id;?>");
	var d1 = "<?=date('Y/m/d H:i:s',$row->s_post_date);?>";
	var d2 = js_yyyy_mm_dd_hh_mm_ss();
	$('#txt_date_diff_ac_<?=$row->id;?>').text(CheckTime(d1,d2));
	*/
</script>	   
<?	}	?>
</ons-list>	
</div>
<input type="hidden" id="id_activity_select" value="0" />