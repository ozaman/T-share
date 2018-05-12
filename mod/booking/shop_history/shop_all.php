
<?php
    $daywork= $_GET[day];
   if($_GET[day]==''){
   	$_GET[day] = date('Y-m-d');
   }
    if($data_user_class=='taxi'){
   	 $filter="and drivername=".$user_id." ";
    } else { 
   	 $filter=""; 
    }
    if($_GET[status]=="new"){
		$type = "and driver_complete = 0 ";
		$txt_status_shop = t_new;
	}
	else {
		$type = "and driver_complete = 1 ";
		$txt_status_shop = t_complete_job;
	}
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $numday_work = $db->num_rows('order_booking',"id","transfer_date='".$_GET[day]."' ".$filter." ".$type." ");
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[book] = $db->select_query("SELECT * FROM  order_booking  where transfer_date='".$_GET[day]."' ".$filter." ".$type." order by  id desc  ");
//   echo $filter." ".$type;
   if($numday_work<=0){
   
   		$show_no_record = '<div class="font-26" style="color: #ff0000;" id="no_work_div"><strong>'.t_no_history.'</strong></div>';
   		echo $show_no_record;
   }
   else { ?>

	<?php 
	while($arr[book] = $db->fetch($res[book])){
		$res[shop] = $db->select_query("SELECT $place_shopping FROM shopping_product  WHERE id='".$arr[book][program]."' ");
		$arr[shop] = $db->fetch($res[shop]);
		if($arr[book][status]=='CANCEL'){
			 if($arr[book][cancel_type]=='1'){
				$status_txt = '<strong><font color="#ff0000">'.t_customer_no_register.'</font></strong>';
			}
			else if($arr[book][cancel_type]=='2'){
				$status_txt = '<strong><font color="#ff0000">'.t_customer_not_go.'</font></strong>';
			}
			else if($arr[book][cancel_type]=='3'){
				$status_txt = '<strong><font color="#ff0000">'.t_wrong_selected_place.'</font></strong>';
			}
		}
		else if($arr[book][status]=='NEW'){
			$status_txt = '<strong><font color="#3b5998">'.t_new.'</font></strong>';
		}
		else if($arr[book][status]=='COMPLETED'){
			$status_txt = '<strong><font color="#54c23d">'.t_success.'</font></strong>';
		}
	?>
	<div style="padding: 5px 0px;">
	<div class="w3-ul w3-card-4" style="padding: 10px;border-radius: 10px;" onclick="openDetailBooking('<?=$arr[book][id];?>');">
		<table width="100%">
      		<tr>
      			<td width="80%" ><span class="font-24"><?=$arr[shop][$place_shopping];?></span></td>
      			<td width="20%" align="center" rowspan="2"><span class="font-22" id="status_book_<?=$arr[book][id];?>"><?=$status_txt;?></span></td>
      		</tr>
      		<tr>
      			<td colspan="2"><span class="font-20"><?=$arr[book][invoice];?>&nbsp;:&nbsp;<?=$arr[book][transfer_date]." ".$arr[book][airout_h].":".str_pad($arr[book][airout_m], 2, '0', STR_PAD_LEFT)." ".t_n;?></span></td>
      			
      		</tr>
      	</table>
	</div>
	</div>
	<? } ?>
  
	<? } ?>
<script>
	
	
</script>