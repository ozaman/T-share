
<?php 
function checkTypePay($id){
      if($id==1){
      		$name_type = t_parking_fee." + ".t_person_fee;
      }
      else if($id==2){
      		$name_type = t_parking_fee." + ".t_com_fee;
      }
      else if($id==3){
      		$name_type = t_person_fee." + ".t_com_fee;
      } 
      else if($id==4){
      		$name_type = t_parking_fee." + ".t_person_fee." + ".t_com_fee;
      }
      else if($id==5){
      		$name_type = t_parking_fee;
      }
      else if($id==6){
      		$name_type = t_person_fee;
      }
      else if($id==7){
      		$name_type = t_com_fee;
      }
      return $name_type;
 }
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[order_book_detail] = $db->select_query("SELECT * FROM order_booking where transfer_date = '".$_POST[date]."' ");
while($arr[order_book_detail] = $db->fetch($res[order_book_detail])){ 
$res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[order_book_detail][plan_id]."   ");
$arr[price] = $db->fetch($res[price]);
$show_park = $arr[price][price_park];
$show_person = $arr[price][price_person];
$show_commision = $arr[price][price_commision];
	  if($show_park==1){	  
      $status_show_park='';	  
       	  ?>
       	  <script>
       	  var url_park = 'empty_style.php?name=income/pay_type&file=ic_park&id=<?=$arr[order_book_detail][id];?>&amount=<?=$arr[order_book_detail][price_park_total];?>';
       	  console.log(url_park);
       	  	$('#load_park_<?=$arr[order_book_detail][id];?>').load(url_park);
       	  </script>
       	  <?
       }
       if($show_park==0){	  
      $status_show_park = 'style="display:none;"';	  	  
       }
       if($show_person==1){	  
      $status_show_person='';
      	  	   ?>
       	  <script>
       	  var url_person = 'empty_style.php?name=income/pay_type&file=ic_person&id=<?=$arr[order_book_detail][id];?>&amount=<?=$arr[order_book_detail][price_person_total];?>';
       	  console.log(url_person);
       	  	$('#load_person_<?=$arr[order_book_detail][id];?>').load(url_person);
       	  </script>
       	  <?
       }
       if($show_person==0){	  
      $status_show_person='style="display:none;"';		    	  
       }
       if($show_commision==1){	  
      $status_show_commision='';	   	  
       ?>
       	  <script>
       	  	var url_com = 'empty_style.php?name=income/pay_type&file=ic_com&id=<?=$arr[order_book_detail][id];?>&amount=<?=$arr[project][plan_commission];?>';
       	  	console.log(url_com);
       	  	$('#load_com_<?=$arr[order_book_detail][id];?>').load(url_com);
       	  </script>
       	  <?
       }
       if($show_commision==0){	  
      $status_show_commision='style="display:none;"';
      	  
       } 
$arr[project] = $arr[order_book_detail] ;
?>
	<div style="padding: 10px 0px;">
		<div style="box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);padding: 5px;">
			<table width="100%" cellpadding="3" cellspacing="1">
				<tr>
					<td width="100">เลขการจอง</td>
					<td><?=$arr[order_book_detail][invoice];?></td>
				</tr>
				<tr>
					<td>วันที่</td>
					<td><?=$arr[order_book_detail][transfer_date];?></td>
				</tr>
				<tr>
					<td>จำนวน</td>
					<td>
						 <? if($arr[order_book_detail][adult]>0){ ?>
            <?=t_adult;?> :
            <?=$arr[order_book_detail][adult];?>
            &nbsp;
            <? } ?>
            <? if($arr[order_book_detail][child]>0){ ?>
            <?=t_child;?> :
            <?=$arr[order_book_detail][child];?>
            <? } ?>
					</td>
				</tr>
				<tr>
					<td>ประเภท</td>
					<td><?=checkTypePay($arr[price][id]);?></td>
				</tr>
				<tr>
					<td colspan="2">
						<table width="100%" style="border: 1px solid #DADADA;">
							<tr <?=$status_show_park;?> id="load_park_<?=$arr[order_book_detail][id];?>">
								<td><? //include("mod/income/pay_type/ic_person.php");?></td>
							</tr>
							<tr <?=$status_show_person;?> id="load_person_<?=$arr[order_book_detail][id];?>">
								<td><? //include ("mod/income/pay_type/ic_park.php");?></td>
							</tr>
							<tr <?=$status_show_commision;?> id="load_com_<?=$arr[order_book_detail][id];?>">
								<td> <? // include ("mod/income/pay_type/ic_com.php");?></td>
							</tr>
						</table>
						
					</td>
				</tr>
			</table>
		</div>
	</div>
	
<? }
?>
