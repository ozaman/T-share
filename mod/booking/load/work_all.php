<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<?
   if($_GET[type]=='auto'){
   $divtop = 50;
   } else {
   $divtop = 0;
   }
   ?>
<script>
   $(".text-topic-action-mod").html('<?echo t_all_transfer_job?>');
   $(".text-topic-action-mod-2").html('<?echo t_all_transfer_job?>  <?=$_GET[day]?>');
</script>
<div style="margin-top:<?=$divtop?>px;">
<? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?>
<?    include ("mod/booking/photo/preview_photo.php");?>
<div id="booking_action" style="display:nones"></div>
<style>
   .div-all-work{
   padding:5px;   border-radius: 15px; border: 3px solid #ddd;   background:<? echo $bgcolor; ?>; margin-bottom:20px; box-shadow: 0px  0px 10px #DADADA  ; margin-top:15px;
   }
   .div-all-palce{
   padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#F6F6F6;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ;
   }
   .sweet-overlay{
   z-index: 99999 !important;
   }
</style>
<?
   $select_order="
   id
   ,invoice
   ,program
   ,orderid
   ,vc_id
   ,pickup_place
   ,to_place
   ,carno
   ,cartype
   ,drivername
   ,outdate
   ,air
   ,airin_time
   ,airout_h
   ,airout_m
   ,airout_time
   ,driver_remark
   ,total,
   guest_name
   ,guest_phone
   ,server
   ,car_price
   ,agent
   ,product_name
   ,product_name_th
   ,extra_service_name_th
   ,name_pickup_place
   ,name_pickup_place_area
   ,name_pickup_place_province
   ,name_to_place
   ,name_to_place_area
   ,name_to_place_province
   ,read_msg
   ,status
   ,driver_topoint
   ,driver_pickup
   ,driver_complete
   ,driver_topoint_date
   ,driver_pickup_date
   ,driver_complete_date
   ,product_area
   ";
    $daywork= $_GET[day];
   if($_GET[day]==''){
   	$_GET[day] = date('Y-m-d');
   }
    if($data_user_class=='taxi'){
   	 $filter="and drivername=".$user_id." ";
    } else { 
   	 $filter=""; 
    }
   /// $_GET[day]='2017-07-20';
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   	 $numday_work = $db->num_rows('order_booking',"id","transfer_date='".$_GET[day]."' $filter");
    ?>
<!--<div style="border: 1px solid #ddd;
   border-radius: 15px;
   font-size: 26px;
   padding: 5px;
   margin-bottom: 10px;
   color: #3b5998;
   box-shadow: 0px 0px 10px #cccccc;display: nones;" id="show_work_this_day">
   <strong><?=$numday_work." งาน";?></strong>
</div>-->
<? if($numday_work==0){ ?>
<div class="font-22"  style='background-color:#FFFFFF; padding:15px; border-radius:  15px;border: solid 1px #DADADA; margin-top:10px; '>
   <center>
      <i class="fa fa-minus-circle" style="font-size:30px; color:#FF0000"></i><br>
      <?echo t_no_guest_list?>
   </center>
</div>
<? } 
   if($numday_work>1){ ?>
<script>
   //// setTimeout(function(){ $('.hidden-click').click(); }, 500);
</script>
<? }
   ?>
<?
   $i=0;
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   if($_GET[type]=='auto'){
   $limit = 1;
   } else {
   $limit = 200;
   }
	//echo "SELECT * FROM  order_booking  where transfer_date='".$_GET[day]."' $filter  order by  ondate_time asc limit $limit  ";
   $res[project] = $db->select_query("SELECT * FROM  order_booking  where transfer_date='".$_GET[day]."' $filter  order by  ondate_time asc limit $limit  ");
   ///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
   while($arr[project] = $db->fetch($res[project])){  
   $array_list_work[] = $arr[project];
   // echo $arr[project][id]." : ".$_GET[day]."<br/>";
   if($arr[project][payment_type]=='money'){
       $payment= t_pay_cash;
   }
   if($arr[project][payment_type]=='bank'){
   $payment=t_transfer_to_account;
   }
   /// plan 
   $res[plan] = $db->select_query("SELECT * FROM plan_product_price_setting  WHERE id='".$arr[project][plan_setting]."' ");
   $arr[plan] = $db->fetch($res[plan]);
   $res[plan_name] = $db->select_query("SELECT * FROM plan_product_price_name  WHERE id='".$arr[project][plan_id]."' ");
   $arr[plan_name] = $db->fetch($res[plan_name]);
   $arr[type] = $db->fetch($res[type]);
   $bgcolor = ($i++ & 1) ?  '#F58220'  : $main_color; 
   if($arr[project][status] == "CANCEL" and $arr[project][cancel_type] == "no_show" ) { 
   ?>
<script>
   $("#main_sub_booking_div_<?=$arr[project][id]?>").hide();
</script>
<? } ?>
<div class="col-md-6" style="padding:0px;" id="group_box_work_<?=$arr[project][id];?>">
   <div  class="div-all-work" style=" border: 2px solid <?= $bgcolor?>;" >
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td class="font-22">
               <div style="padding-bottom:10px; ">
                  <table width="100%" border="0" cellspacing="1" cellpadding="1" style="padding:5px; margin-top:3px;  border-radius: 15px; border: 1px solid #ddd;   background:#FFFDE9;    ">
                     <tbody>
                        <tr>
                           <td height="40" id="status_<?=$arr[project][id]?>">
                              <font color=""></font>
                              <div  id="update_status_<?=$arr[project][id]?>"> </div>
                              <script>
                                 var url_check_status_<?=$arr[project][id]?> = "go.php?name=booking/update&file=status_check&id=<?=$arr[project][id]?>&type=stop&type=<?=$arr[project][cancel_type]?>&status=<?=$arr[project][status]?>";
                                  $('#update_status_<?=$arr[project][id]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
                                 $('#update_status_<?=$arr[project][id]?>').load(url_check_status_<?=$arr[project][id]?>);
                              </script>
                           </td>
                           <td width="20" >
                              <?php 
                                 if($arr[project][status]=='CANCEL'){
                                 $cancel_btn = 'display:none;';
                                 }else{
                                 $cancel_btn = '';
                                 }
                                 ?>
                              <div  id="action_status_<?=$arr[project][id]?>"  class="font-24" style="<?=$cancel_btn;?>">
                                 <input type="hidden" id="check_cause_<?=$arr[project][id]?>" value="0"/>
                                 <button  id="btn_driver_no_show_<?=$arr[project][id]?>"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:ff0000;  border-radius:  20px; border:none "><span class="font-26"><i class="icon-new-uniF11D-7" style="width:10px;"  ></i><? echo t_unsubscribe?><span></button>
                              </div >
                              <? if($arr[project][booking_pic]=='1'){ ?>  
                              <i class="fa  fa-photo take-photo-icon-small"  id="button_photo_vc_<?=$arr[project][id]?>"></i>   
                              <? } ?>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
              
               <?  include ("mod/booking/load/form/place.php");?>
               <style>
                  .box-border{
                  border: 2px solid #ddd;
                  padding: 10px;
                  border-radius: 10px;
                  box-shadow: 1px 1px 10px #cccccc;
                  margin-top: 7px;
                  }
               </style>
               <div style="font-size:14px; color:#009999; padding-bottom:10px; margin-top:10px; ">
                  <div id="main_data_booking_div_<?=$arr[project][id]?>" class="box-border"> 
                 
                     <?  include ("mod/booking/load/form/data.php");?>
                  </div>
                  <div id="main_sub_booking_div_<?=$arr[project][id]?>" style="display:nones">
                     <? //= $arr[plan_name][topic_th]?>
                     <? if($arr[project][passport_pic]==1){ ?>
                     <div id="main_data_booking_div_<?=$arr[project][id]?>" class="box-border"> 
                     <?  include ("mod/booking/load/form/passport.php");?>                     	
                     </div>
                     <? } ?>
                     <div id="main_back_booking_div_<?=$arr[project][id]?>" class="box-border"  style=" display:none;"> 
                     <?  include ("mod/booking/load/form/back.php");?>
                     </div>
                     <div id="main_driver_booking_div_<?=$arr[project][id]?>" class="box-border" style="display: nones;"> 
                     <?  include ("mod/booking/load/form/driver.php");?>
                     </div>
                     <div id="main_checkin_booking_div_<?=$arr[project][id]?>" class="box-border">
                        <?  
                           if($data_user_class=='taxi'){
                           	include ("mod/booking/load/form/checkin.php");
                           }else{
                           	include ("mod/booking/load/form/checkin_admin.php");
                           }
                           ?>
                     </div>
                     <div id="main_price_booking_div_<?=$arr[project][id]?>" style="display:nones" class="box-border"> 
                     <? include ("mod/booking/load/form/price.php");?>
                     </div>
                     <? if($arr[project][status]=='CONFIRM'){?>
                     <script>  
                        // $("#show_register_cancel").hidden();  
                          $("#main_price_booking_div_<?=$arr[project][id]?>").show();
                          
                     </script>
                     <? } ?>
                  </div>
				</div>
            </td>
         </tr>
      </table>
      </div>
   </div>
</div>
<script>
   $('#button_photo_vc_<?=$arr[project][id]?>').click(function(){  
   $("#preview_image_album").attr("src", "../data/fileupload/edit_work/<?=$arr[project][invoice]?>_big.jpg?v=<?=$arr[project][update_date]?>");
   $( "#popup_chat_preview_photo" ).toggle(); 
   });
</script>
<script>
   var remark1 = 'แขกลงทะเบียนไม่ได้';
   var remark2 = 'แขกไม่ไป';
   var remark3 = 'เลือกสถานที่ผิด';
   $("#btn_driver_no_show_<?=$arr[project][id]?>").click(function(){ 
   console.log(123);
     swal({
   title: "<font style='font-size:28px'><b><? echo t_are_you_sure?> </b></font>",
   text: "<font style='font-size:22px'><? echo t_need_cancel_transfer?></font>"+"<table width='100%'><tr><td width='40'><input id='remark1' onclick='check(<?=$arr[project][id]?>,1);' class='cause_<?=$arr[project][id]?>'  type='checkbox' value='1' style='display:block;height:25px;' /></td><td><label style='margin-top:8px;' for='remark1'>"+remark1+"</label></td></tr><tr><td width='40'><input id='remark2' onclick='check(<?=$arr[project][id]?>,2);' class='cause_<?=$arr[project][id]?>'  type='checkbox' value='2' style='display:block;height:25px;' /></td><td><label for='remark2' style='margin-top:8px;'>"+remark2+"</label></td></tr><tr><td width='40'><input id='remark3' onclick='check(<?=$arr[project][id]?>,3);' class='cause_<?=$arr[project][id]?>'  type='checkbox' value='3' style='display:block;height:25px;' /></td><td><label for='remark3' style='margin-top:8px;'>"+remark3+"</label></td></tr></table>",
   type: "error",
   showCancelButton: true,
   confirmButtonColor: '#FF0000',
   confirmButtonText: '<?echo t_yes?>',
   cancelButtonText: "<?echo t_no?>",
   closeOnConfirm: true,
   closeOnCancel: true,
   html: true
   },
   function(isConfirm){
     if (isConfirm){
   var cause = $('#check_cause_<?=$arr[project][id]?>').val();
   var url_<?=$arr[project][id]?> = "popup.php?name=booking/load/form&file=savedata&op=cancel&id=<?=$arr[project][id]?>&cancel_type="+cause;
   $('#action_status_<?=$arr[project][id]?>').load(url_<?=$arr[project][id]?>);
   //  alert('dd');
     } else {
   //    swal("Cancelled", "", "error");
     }
   });
    });
    
</script> 
<?php 
   if($data_user_class=='lab'){ ?>
<script>
   console.log('<?=$data_user_class;?>');
   $('#btn_show_hide_data_<?=$arr[project][invoice];?>').click();
   $('#btn_show_hide_driver_<?=$arr[project][invoice];?>').click();
   $('#btn_show_hide_checkin_<?=$arr[project][invoice];?>').click();
   // 		$('#btn_show_hide_price_<?=$arr[project][invoice];?>').click();
</script>	
<? }
} ?>  
<script>
   function check(id,num){
    console.log(id);	
    $('.cause_'+id).attr('checked', false);
    $('#remark'+num).attr('checked', true);
    $('#check_cause_'+id).val(num);
   }
   function ApporvePayAdmin(id,invoice,price,type){
   console.log(id);
   if($('#check_img_'+type+'_'+id).val()==0){
   	swal ( "ผิดพลาด" ,  "กรุณาอัพโหลดเอกสารหรือภาพถ่าย" ,  "error" );
   	return;
   }
   	swal({
   		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่</b></font>",
   		text: "<font style='font-size:22px'>ว่าต้องการยืนยันการจ่ายเงิน</font>",
   		type: "warning",
   		showCancelButton: true,
   		confirmButtonColor: '#5CB85C',
   		confirmButtonText: '<?echo t_yes?>',
   		cancelButtonText: "<?echo t_no?>",
   		closeOnConfirm: false,
   		closeOnCancel: true,
   		html: true
   	},
   	function(isConfirm){
   	    if (isConfirm){
   	 $.post( "empty_style.php?name=booking/load/form&file=savedata&action=approve_pay_driver_admin",{ order_id : id , invoice:invoice, price:price , type:type } ,function( data ) {
   //						console.log(data);
   				$('#html_work_action').html(data);
   			  	swal ( "สำเร็จ" ,  "" ,  "success" );
   			});
   	    } 
   	});
   }
   function ApporvePayDriver(id,invoice,price,type){
   console.log(id);
   	swal({
   		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่</b></font>",
   		text: "<font style='font-size:22px'>ว่าคุณได้รับเงินแล้ว</font>",
   		type: "warning",
   		showCancelButton: true,
   		confirmButtonColor: '#5CB85C',
   		confirmButtonText: 'ใช่',
   		cancelButtonText: "ไม่ใช่",
   		closeOnConfirm: false,
   		closeOnCancel: true,
   		html: true
   	},
   	function(isConfirm){
   	    if (isConfirm){
   	 $.post( "empty_style.php?name=booking/load/form&file=savedata&action=approve_pay_driver_taxi",{ order_id : id , invoice:invoice, price:price , type:type } ,function( data ) {
   //						console.log(data);
   				$('#html_work_action').html(data);
   			  	swal ( "สำเร็จ" ,  "" ,  "success" );
   			});
   	    } 
   	});
   }
</script>

<div id="tab_chk_qr" class="tab-pane fade">
   <?
      /// include("mod/load/show/step/qr_scan.php");
       /// include("mod/load/show/step/index.html");
      ?>
</div>
<!---- -->
<div style="position: fixed;
   top: 80px;
   right: 0;
   width: 55px;
   background: rgba(0, 0, 0, .3);
   z-index: 1031;
   border-radius: 8px 0 0 8px;
   text-align: center;padding: 5px;" id="open_small_work_list">
   <div class="dropdown show-dropdown" style="">
      <a>
      <i class="fa fa-list fa-2x" style="color: #fff;"> </i>
      </a>
      <ul id="list_work_small" class="dropdown-menu" style="transform: translateY(-13%);transform-origin: 0 0;top: 10px;right: 55px;width: 250px;border-radius: 10px; padding: 0 10px; left: auto;display: none;">
         <? 
            if (!empty($array_list_work)) {
             $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
            foreach($array_list_work as $data){ 
            $res[shop_small] = $db->select_query("SELECT topic_th FROM shopping_product  WHERE id='".$data[program]."' ");
            $arr[shop_small] = $db->fetch($res[shop_small]);
            ?>
         <li style="border-bottom: 1px solid #ddd;padding: 5px 0px;" onclick="MoveToClickWork('<?=$data[id];?>');" >
            <p><?=$arr[shop_small][topic_th];?></p>
            <span><?=$data[transfer_date];?>&nbsp;<?=$data[airout_h];?>:<?=str_pad($data[airout_m], 2, '0', STR_PAD_LEFT)." น.";?></span>
            <?php if($data_user_class=='lab'){ ?>
            <span><strong><?=$data[car_plate];?></strong></span>
            <? } ?>
         </li>
         <? 	}
            }else{ ?>
         <li style="border-bottom: 1px solid #ddd;padding: 15px 0px;">
            <p style="color: #ff0000;"><?echo t_no_job?></p>
         </li>
         <? }
            ?>
      </ul>
   </div>
   <input type="hidden" value="0" id="check_click_work_list_small"/>
</div>
<script>
   $('#open_small_work_list').click(function(){
   	var check = $('#check_click_work_list_small').val();
   	if(check==0){
   	$('#check_click_work_list_small').val(1);
   	$('#list_work_small').show();
   	$(this).css('background','#3b5998');
   }else{
   	$('#check_click_work_list_small').val(0);
   	$('#list_work_small').hide();
   	$(this).css('background','rgba(0, 0, 0, 0.3)');
   }
   });
   function MoveToClickWork(id){
   $('#load_mod_popup').animate({ scrollTop: $('#group_box_work_'+id).offset().top-80 }, 'slow');
   }
</script>  		      
<div id="html_work_action" style="display: none;"></div>