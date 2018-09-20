<!--<div class="font-26" style="color: #ff0000;text-align: center;padding: 0px; margin-top: -10px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>-->
<?php 
//	echo json_encode($_POST[data]);
?>
<ons-list id="body_list_ic_shop" >	 
	<?php	
		$befordate = '';
		foreach ($_POST[data] as $row){ 
			$tras_d_time = date_create($row->transfer_date);

			if($befordate != $row->transfer_date){ 
				$befordate = $row->transfer_date;
				
				?>
		<ons-list-header style="font-size: 12px;font-weight: 500;"><?="วันที่ ".date_format($tras_d_time,"Y-m-d");?></ons-list-header>
<?php			}	?>
       <div style="border-bottom: 0px solid #ccc; padding: 15px 5px;" onclick="openDetailOrder('<?=$row->id;?>', '<?=$row->invoice;?>');">
       		<table width="100%">
       			<tr>
       				<td width="70"><?=$row->invoice;?></td>
       				<td>
       					<span><?=$row->product_name;?></span><br/>
       					<span class="font-14"><?=date('Y-m-d h:i',$row->post_date);?></span>
       				</td>
       				<td align="right"><b><?="+ ".number_format($row->price_all_total,2);?></b></td>
       			</tr>
       		</table>
       </div>
			
<?php		}
?>
</ons-list>