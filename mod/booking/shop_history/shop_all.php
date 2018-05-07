<style>
 .payment-menu{
    border-radius: 50%; background-color:#59AA47; display: block;  
    padding: 12px; 
    width: 50px;
    height: 50px; 
	color:#FFFFFF;  font-size:10px;  
	border: solid 2px #FFFFFF;
    text-align: center;
	vertical-align: middle;  box-shadow: 0px  0px 10px #DADADA  ; margin-left: -5px;  
}
 .div-all-price{
	/* padding:3px;   
	 border-radius: 8px; 
	 border:  1px solid #ddd;*/
	 background-color:#FFFFFF;  
	 /*margin-bottom: 10px; */
	 margin-top:0px; 
/*	 box-shadow: 0px  0px 0px #DADADA  ;*/
 }
 .div-all-zello{
     padding:5px;
     border-radius: 0px;
     border: 1px solid #ddd;
     background-color:#FFF;
     margin-bottom: 5px;
     box-shadow: 0px 0px 0px #DADADA ;
}
 .list-container{
     font-size: 16px;
     padding: 0px;
}
 .w3-ul li{
     padding: 0px 5px;
     border-bottom: 1px solid #ddd;
}
 .ico-pos{
     position: absolute;
     right: 0px;
     margin: 20px 10px;
}
 .cancel-work-shop{
     box-shadow: 1px 2px 2px #35353575;
     width: 90px;
     border: 1px solid #a9a9a9;
     background: #FF5722;
     color: #fff;
     position: absolute;
     top: 50px;
     right: 15px;
/*     margin: 50px 15px;*/
	 text-align: center;
     border-radius: 10px;
}
 .div-all-checkin{
     padding:5px;
     border-radius: 15px;
     border: 1px solid #ddd;
    background-color:#F6F6F6;
     margin-bottom: 5px;
     margin-top:5px;
     box-shadow: 0px 0px 10px #DADADA ;
}
 .disabledbutton-checkin {
     pointer-events: none;
     background-color:#FFF;
     color:#FFF;
     border: 1px solid #88B34D;
}
 .step-booking-small {
     border-radius: 50%;
     background-color: #FF9933;
     padding: 5px;
     width: 40px;
     height: 40px;
     text-align: justify;
     color:#FFFFFF;
     font-size:20px;
     font-weight:bold;
     margin-top:-10px;
     text-align:center;
     border: solid 4px #FFFFFF;
     background: #f39c12 !important;
     color: #fff;
}
 .step-booking-small-no {
     border-radius: 50%;
     background-color: #FF9933;
     padding: 5px;
     width: 40px;
     height: 40px;
     text-align: justify;
     color:#FFFFFF;
     font-size:20px;
     font-weight:bold;
     margin-top:-10px;
     text-align:center;
     border: solid 4px #FFFFFF;
     background: #999999 !important;
     color: #fff;
}
 .step-booking {
     border-radius: 50%;
     background-color: #FF9933;
     padding: 10px;
     width: 60px;
     height: 60px;
     text-align: justify;
     color:#FFFFFF;
     font-size:30px;
     font-weight:bold;
     text-align:center;
     margin-left:-5px;
     border: solid 3px #F6F6F6;
     box-shadow: 0 0 10px 3px #E8E6E6;
     background: #FF0000 !important;
     color: #fff;
}
 .step-booking-active {
     border-radius: 50%;
     padding: 10px;
     width: 60px;
     height: 60px;
     text-align: justify;
     color:#FFFFFF;
     font-size:30px;
     font-weight:bold;
     text-align:center;
     margin-left:-5px;
     border: solid 3px #F6F6F6;
     box-shadow: 0 0 10px 3px #E8E6E6;
     background: #59AA47 !important;
     color: #fff;
}

</style>
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
   		$show_no_record = '<div class="font-26" style="color: #ff0000;" id="no_work_div"><strong>ไม่มีงาน</strong></div>';
   }
   echo $show_no_record;
?>

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
      <span class="ico-pos font-24"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
     
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

<script>
	
	
</script>