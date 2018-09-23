<?php	
$date = $_GET[date];
$date = explode("-",$date);
$year = $date[0];
$month = $date[1];
//echo $year." ".$month;
$select = "select * from deposit_history where driver = '".$_COOKIE[detect_user]."' and (MONTH(deposit_date) = '".$month."' and YEAR(deposit_date) = '".$year."') and (type = 'ADD' or type = 'WITHDRAW')  order by deposit_date desc  ";

		$query = $this->db->query($select);
		$befordate = '';
		$i = 0;
		 ?>
<ons-list id="body_list_ic_shop" >	 
	<?php	foreach ($query->result() as $row){ 
			$tras_d_time = date_create($row->deposit_date);
			if($row->type=="ADD"){
				$type_txt = "เติมเงิน (แจ้งโอน)";
			}else if($row->type=="WITHDRAW"){
				$type_txt = "ถอนเงิน (แจ้งถอน)";
			}
			if($befordate != $row->deposit_date){ 
				$befordate = $row->deposit_date;
				
				?>
		<ons-list-header style="font-size: 12px;font-weight: 500;"><?="วันที่ ".date_format($tras_d_time,"Y-m-d");?></ons-list-header>
<?php			}	?>
       <div style="border-bottom: 1px solid #ccc; padding: 15px 5px;" onclick="openDetailHisWallet('<?=$row->id;?>');">
       		<table width="100%">
       			<tr>
       				<!--<td width="70"><?=$row->invoice;?></td>-->
       				<td>
       					<span><?=$type_txt;?></span><br/>
       					<span class="font-14"><?=date('Y-m-d h:i',$row->post_date);?></span>
       				</td>
       				<td align="right"><b><?="+ ".number_format($row->deposit,2);?></b></td>
       			</tr>
       		</table>
       </div>
			
<?php		}
?>
</ons-list>