
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
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $numday_work = $db->num_rows('order_booking',"id","transfer_date='".$_GET[day]."' $filter");
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   $res[book] = $db->select_query("SELECT * FROM  order_booking  where transfer_date='".$_GET[day]."' $filter  order by  id desc  ");
   if($numday_work<=0){
   		$show_no_record = '<div class="font-26" style="color: #ff0000;" id="no_work_div"><strong>'.t_no_history.'</strong></div>';
   		echo $show_no_record;
   }
   else { ?>
<div class="list-container">
<ul class="w3-ul w3-card-4">
	<?php 
	while($arr[book] = $db->fetch($res[book])){
		$res[shop] = $db->select_query("SELECT $place_shopping FROM shopping_product  WHERE id='".$arr[book][program]."' ");
		$arr[shop] = $db->fetch($res[shop]);
		if($arr[book][status]=='CANCEL'){
			 if($arr[book][cancel_type]=='1'){
				$status_txt = '<font color="#ff0000">'.t_customer_no_register.'</font>';
			}
			else if($arr[book][cancel_type]=='2'){
				$status_txt = '<font color="#ff0000">'.t_customer_not_go.'</font>';
			}
			else if($arr[book][cancel_type]=='3'){
				$status_txt = '<font color="#ff0000">'.t_wrong_selected_place.'</font>';
			}
		}
		else if($arr[book][status]=='NEW'){
			$status_txt = '<font color="#3b5998">'.t_new.'</font>';
		}
		else if($arr[book][status]=='CONFIRM'){
			$status_txt = '<font color="#54c23d">'.t_success.'</font>';
		}
	?>
    <li class="w3-bar" onclick="openDetailBooking('<?=$arr[book][id];?>');">
     <!-- <span class="ico-pos font-24"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>-->
     
      <div class="w3-bar-item">
      	<table width="100%">
      		<tr>
      			<td width="80%" ><span class="font-24"><?=$arr[shop][$place_shopping];?></span></td>
      			<td width="20%" align="center" rowspan="2"><span class="font-22" id="status_book_<?=$arr[book][id];?>"><?=$status_txt;?></span></td>
      		</tr>
      		<tr>
      			<td><span class="font-20"><?=$arr[book][invoice];?>&nbsp;:&nbsp;<?=$arr[book][transfer_date]." ".$arr[book][airout_h].":".str_pad($arr[book][airout_m], 2, '0', STR_PAD_LEFT)." ".t_n;?></span></td>
      			<td></td>
      		</tr>
      	</table>
      </div>
    </li>
	<? } ?>
  </ul>
</div>
	<? } ?>
<script>
	
	
</script>