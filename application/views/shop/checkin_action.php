<?php 
   $_where = array();
                        $_where['id'] = $_GET[id]; 
                        $_select = array('*');
                        $book = $this->Main_model->rowdata(TBL_ORDER_BOOKING,$_where);
    
    $display_park = "display:none";
    $display_person = "display:none";
    $display_com = "display:none";
     $park_total = 0;
     $person_total = 0;
     $com_persent = 0;
     $com_total = 0;
    $query_price = $this->db->query("select * from shop_country_com_list_price_taxi where i_shop_country_com_list = '".$book->plan_id."' ");
    $num = 0;
    foreach ($query_price->result() as $row_price){
        if($num>=1){
          $push = " + ";
        }else{
          $push = "";
        }
           $plan .= $push.$row_price->s_topic_th;
           $num++;
         if($row_price->s_topic_en=="park"){
          $check_type_park = 1;
          $display_park = "";
           $park_total = intval($book->price_park_unit);
         }
         if($row_price->s_topic_en=="person"){
          $check_type_person= 1;
          $person_total = intval($book->price_person_unit)* intval($book->pax_regis);
          $cal_person = $book->price_person_unit."*".$book->pax_regis;
          $display_person = "display:none";
         }  
         if($row_price->s_topic_en=="comision"){
            $check_type_com = 1;
            $com_persent = $book->commission_persent;
	        $display_com = "";
	        $com_progress = '<span style="padding-left: 0px;"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i>&nbsp;<font color="#FF0000">รอดำเนินการ</font></span>';
         }  
    }
    $all_total = $park_total + $person_total + $com_total;
    
    $sql_country = "SELECT t2.s_country_code, t2.s_topic_th FROM shop_country_com_list_price_taxi as t1 left join shop_country_icon_taxi as t2 on t1.i_shop_country_icon = t2.id WHERE t1.id='".$book->plan_id."'    ";
    $query_country = $this->db->query($sql_country);
    $res_country = $query_country->row();
    $arr[project][id]=$_GET[id];
   
   
      if($_GET[type]=='driver_topoint'){		
        $type= t_place_of_delivery;		
        $icon = 'icon-new-uniF12D-1';
        $action = 'check_driver_topoint';
        $txt_photo = t_please_take_photo_drop_place;
      }
      else if($_GET[type]=='guest_receive'){		
        $type= t_reception;
        $icon = 'icon-new-uniF159-5';	
        $action = 'check_guest_receive';
        $txt_photo = t_please_take_recep_photo;
      } 
      else if($_GET[type]=='guest_register'){		
        $type= t_guest_registration;	
        $icon = 'icon-new-uniF116-6';	
        $action = 'check_guest_register';
        $txt_photo = t_please_take_guest_regis;
      } 
      else if($_GET[type]=='driver_pay_report'){		
       $type= t_income_statement;		
       $icon = 'icon-new-uniF121-10';
       $action = 'check_driver_pay_report';
       $txt_photo = t_take_photo_income_slip;
      }
   ?>
<ons-card>
   <table class="onlyThisTable" width="100%" border="0" align="center" cellpadding="3" cellspacing="5" style="margin-top: 0px;">
      <tr>
         <td align="center" class="font-26" style="text-align: center;"><i class="<?=$icon;?>" style=" font-size:80px; color: #3b5998;"></i></td>
      </tr>
      <tr>
         <td align="center" class="font-26" style="text-align: center;"><b>คุณแน่ใจหรือไม่ </b></td>
      </tr>
      <tr>
         <td align="center" class="font-22" style="text-align: center;"> <?=$type;?></td>
      </tr>
      <?php 
         if ( $_GET[type] == 'driver_pay_report') {
          ?>
      <tr>
         <td>
            <div style="padding: 5px 0px;">
               <ons-list-header class="list-header"> <?=t_work_remuneration;?></ons-list-header>
               <table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_income_driver">
                  <tr>
                     <td width="80"><span class="font-17">ประเภท</span></td>
                     <td colspan="2"><span class="font-17" id="txt_type_plan"><?=$plan;?></span></td>
                  </tr>
                  <tr>
                     <td width="80"><span class="font-17">สัญชาติ</span></td>
                     <td colspan="2">
                        <table>
                           <tr>
                              <td>
                                 <img src="<?=base_url();?>assets/images/flag/icon/<?=$res_country->s_country_code;?>.png" width="25" height="25" alt="">
                              </td>
                              <td>&nbsp;</td>
                              <td><span class="font-17" id="txt_county_pp"><?=$res_country->s_topic_th;?></span></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr style="<?=$display_park;?>">
                     <td width="80"><span class="font-17">ค่าจอด</span></td>
                     <td align="right"><span class="font-17" id="txt_park_total"><?=$park_total;?></span>&nbsp;<span class="font-17">บ.</span></td>
                     <!--<td width="15%"><span class="font-17">บาท</span></td>-->
                  </tr>
                  <tr style="<?=$display_person;?>">
                     <td width="80"><span class="font-17">ค่าหัว</span></td>
                     <td align="right"><span class="font-17" id="txt_person_total"><?=$cal_person;?> = <?=$person_total;?></span>&nbsp;<span class="font-17">บ.</span></td>
                     <!--<td width="15%"><span class="font-17">บาท</span></td>-->
                  </tr>
                  <tr style="<?=$display_com;?>">
                     <td width="80"><span class="font-17">ค่าคอม</span></td>
                     <td align="right" colspan="2"><span class="font-17" id="txt_com_persent"><?=$com_persent;?> % <?=$com_progress;?></span>
                     </td>
                     <!--<td width="15%">
                     </td>-->
                  </tr>
                  <tr>
                     <td  width="80">รวม</td>
                     <td align="right">
                        <span class="16" id="txt_all_total" style="color: #19b616">
                        <?=$all_total;?>
                        </span><span class="font-17">บ.</span>
                     </td>
                     <!--<td width="90">
                        
                     </td>-->
                  </tr>
               </table>
            </div>
         </td>
      </tr>
      <?php
         }
         else{
         ?>
      <tr style="display: none;">
         <td align="center"><span>กรุณาถ่ายภาพ <?=$type;?></span></td>
      </tr>
      <tr style="display: none;">
         <td>
            <div align="center" style="margin: 10px;">
               <div>
                  <!--<button class="btn-ip" type="button">เลือกภาพบัตรประจำตัวประชาชน</button>-->
                  <input type="file" class="cropit-image-input" accept="image/*" id="img_checkin" name="img_checkin" style="opacity: 0;position: absolute;" 
                     onchange="readURLcheckIn(this,'checkin','<?=$_GET[type];?>', '<?=$_GET[id];?>');">
               </div>
               <span id="txt-img-has-checkin" style="display: none;"><i class="fa fa-check-circle" aria-hidden="true" style="color: #25da25;"></i>&nbsp; มีภาพถ่ายแล้ว</span>
               <span id="txt-img-nohas-checkin" style="display: nones;"><i class="fa fa-times-circle" aria-hidden="true" style="color: #ff0000;"></i>&nbsp; ไม่มีภาพ</span>
               <div class="box-preview-img" id="box_img_checkin" onclick="performClick('img_checkin');">
                  <img src="" class="img-preview-show" id="pv_checkin"  style="display: nones;">
               </div>
               <span style="background-color: #f4f4f4;
                  padding: 0px 10px;
                  position: absolute;
                  margin-left: -27px;
                  /*    bottom: 278px;*/
                  margin-top: -25px;
                  border-top-left-radius: 5px; pointer-events: none;"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp; อัพโหลดรูปถ่าย</span>
            </div>
         </td>
      </tr>
      <?php 
         }
         ?>
   </table>

</ons-card>
<div style="margin: 20px 10px">
   <ons-button modifier="outline" class="button-margin button button--outline button--large" onclick="sendCheckIn('<?=$_GET[id];?>','<?=$_GET[type];?>','<?=$book->program;?>');" style="background-color: #fff;">ยืนยัน<?=$type;?></ons-button>
</div>
<script type="text/javascript">
   setTimeout(function(){ $('#num_cus').focus(); 
   }, 1000);
</script>