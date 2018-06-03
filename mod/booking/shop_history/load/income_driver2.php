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
 $res[book] = $db->select_query("SELECT * FROM  order_booking  where id = '".$_GET[id]."'  ");
 $arr[book] = $db->fetch($res[book]); 
  $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[book][plan_id]."   ");
      $arr[price] = $db->fetch($res[price]);
      $show_park = $arr[price][price_park];
      $show_person = $arr[price][price_person];
      $show_commision = $arr[price][price_commision];
       if($show_park==1){	  
      $status_show_park='show';	   	  
       }
       if($show_park==0){	  
      $status_show_park='hide';	  	  
       }
       if($show_person==1){	  
      $status_show_person='show';	   	  
       }
       if($show_person==0){	  
      $status_show_person='hide';	    	  
       }
       if($show_commision==1){	  
      $status_show_commision='show';	   	  
       }
       if($show_commision==0){	  
      $status_show_commision='hide';	  
       } 
// echo  $arr[book][id]." ++ ".$data_user_class;
$arr[project] = $arr[book];
?>
<div style="/*padding: 5px 5px;*/ margin-top: 50px;">
   
   <table width="100%" border="0" cellpadding="1" cellspacing="3" id="table_show_hide_price_<?=$arr[book][invoice];?>" style="padding: 2px 10px;margin-top: 20px;"> 
      <tbody>
         <tr style="display:nones">
            <td colspan="3" class="font-26">
               <table width="100%" border="0" cellspacing="2" cellpadding="2" class="div-all-price" >
                  <tbody>
                     <tr>
                        <td colspan="2" class="font-26 text-cap"><b><a id="show_plan_setting_<?=$arr[book][id];?>"><?=checkTypePay($arr[price][id]);?></a></b></td>
                     </tr>
                     <tr>
                        <td width="70"  class="font-22 text-cap"><b><?=t_nationality;?></b></td>
                        <td class="font-22"><b> <img src="images/flag/China.png" width="30" height="30" alt="" style="margin-top:-5px;"/> <?=t_china;?></td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
         <tr id="main_td_price_park_<?=$arr[book][id];?>" >
            <td colspan="3" class="font-22">
               <? //include ("mod/booking/shop_history/load/price/park.php");?>
            </td>
           
         </tr>
         <tr id="main_td_price_person_<?=$arr[book][id];?>">
            <td colspan="3" class="font-22">
               <? // include ("mod/booking/shop_history/load/price/person.php");?>
            </td>
         </tr>
         <tr id="main_td_price_com_<?=$arr[book][id];?>">
            <td colspan="3" class="font-22">
               <?  //include ("mod/booking/shop_history/load/price/com.php");?>
            </td>
         </tr>
         <tr id="main_td_price_all_<?=$arr[book][id];?>">
            <td colspan="3" class="font-22">
               <?  /// include ("mod/booking/load/form/price/com.php");?>
            </td>
         </tr>
      </tbody>
   </table>
   <?php 
   		if($data_user_class=='taxi'){ ?>
   		
   		
   			
   		<? }else{ ?>
		
		<table width="100%" border="0" cellspacing="1" cellpadding="1"  class="div-all-price">
  <tbody>
  	<tr>
  		<td width="50%"></td>
  		<td width="50%"></td>
  	</tr>
    <tr>
    	<td width="50%">สถานะ</td>
    	<td width="50%"><div class="font-22"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=t_pending;?></font></strong></div></td>
    </tr>
  </tbody>
</table>
			
	<?	}
   ?>
</div>
<div id="html_work_action" style="display: none;"></div>
<script>
	  /*console.log('person : <?=$show_person;?>, park : <?=$show_park;?>, com : <?=$show_commision;?>');
  $('#main_td_price_park_<?=$arr[book][id];?>').<?=$status_show_park?>();
  $('#main_td_price_person_<?=$arr[book][id];?>').<?=$status_show_person?>();
  $('#main_td_price_com_<?=$arr[book][id];?>').<?=$status_show_commision?>();
  $('#btn_show_hide_price_<?=$arr[book][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');*/
  $('#btn_show_hide_price_<?=$arr[book][invoice];?>').click(function() {
      ///// tool status
      var tool_status = $("#table_show_hide_price_<?=$arr[book][invoice];?>").is(":hidden");
      // $("#table_show_hide_price_<?=$arr[book][invoice];?>" ).show(); 
      if (tool_status == true) {
          $("#table_show_hide_price_<?=$arr[book][invoice];?>").show();
          $('#btn_show_hide_price_<?=$arr[book][invoice];?>').html('<i class="fa fa-angle-up" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;ซ่อน</span>');
      } else {
          $("#table_show_hide_price_<?=$arr[book][invoice];?>").hide();
          $('#btn_show_hide_price_<?=$arr[book][invoice];?>').html('<i class="fa fa-angle-down" style="font-size:20px;  "></i><span style="margin-top:-20px;">&nbsp;แสดง</span>');
      }
  });
  
   function check(id,num){
    console.log(id);	
    $('.cause_'+id).attr('checked', false);
    $('#remark'+num).attr('checked', true);
    $('#check_cause_'+id).val(num);
   }
   function ApporvePayAdmin(id,invoice,price,type){
   console.log(id);
   if($('#check_img_'+type+'_'+id).val()==0){
   	swal ( "<?=t_error;?>" ,  "<?=t_upload_the_document_picture;?>" ,  "error" );
   	return;
   }
   	swal({
   		title: "<?=t_are_you_sure;?>",
   		text: "<?=t_want_confirm_payment;?>",
   		type: "warning",
   		showCancelButton: true,
   		confirmButtonText: '<?=t_yes;?>',
   		cancelButtonText: "<?=t_no;?>",
   		closeOnConfirm: false,
   		closeOnCancel: true
   	},
   	function(){
   	   
   	 $.post( "empty_style.php?name=booking/shop_history&file=php_shop&action=approve_pay_driver_admin",{ order_id : id , invoice:invoice, price:price , type:type } ,function( data ) {
   //						console.log(data);
   				$('.button-close-popup-mod-3').click();
   				$('#html_work_action').html(data);
   			  	swal ( "<?=t_save_succeed;?>" ,  "" ,  "success" );
   			  	filterMenu("manage");
   			});
   	  
   	});
   }
   function ApporvePayDriver(id,invoice,price,type){
   console.log(id);
   	swal({
   		title: "<?=t_are_you_sure;?>",
   		text: "<?=t_already_received;?>",
   		type: "warning",
   		showCancelButton: true,
   		confirmButtonText: '<?=t_yes;?>',
   		cancelButtonText: "<?=t_no;?>",
   		closeOnConfirm: false,
   		closeOnCancel: true
   	},
   	function(){
   	  
   	 $.post( "empty_style.php?name=booking/shop_history&file=php_shop&action=approve_pay_driver_taxi",{ order_id : id , invoice:invoice, price:price , type:type } ,function( data ) 		{
   //						console.log(data);
   				$('#html_work_action').html(data);
   			  	swal ( "<?=t_save_succeed;?>" ,  "" ,  "success" );
   			  	filterMenu("manage");
   			});
   
   	});
   }
  
</script>