<input type="hidden" id="open_shop_manage" value="1" />
<input type="hidden" id="open_shop_wait_trans" value="0" />
<?php
//echo "<pre>";
//print_r($_POST[data]);
//echo "</pre>";
//return;

$data_user_class = $_COOKIE[detect_userclass];
if (count($_POST[data]) <= 0) {
  echo '<div class="font-22" style="color: #ff0000;text-align: center;padding: 0px; margin-top: 10px;" id="no_work_div"><strong>ไม่มีงาน</strong></div>';
  //exit();
}

foreach ($_POST[data] as $key => $val) {
  $sql_dv = "SELECT name,nickname,phone,name_en,zello_id,line_id,username FROM web_driver WHERE id='".$val[drivername]."'    ";
  $query_dv = $this->db->query($sql_dv);
  $res_dv = $query_dv->row();

  /* if($val[lab_approve_job] == 0){
    $status_txt = '<strong><font color="#ff0000">รอตอบรับ</font></strong>';
    }
    else if($val[lab_approve_job] ==1){
    $status_txt = '<strong><font color="#54c23d">ตอบรับแล้ว</font></strong>';
    } */
  $sql_ps = "SELECT topic_th,id, province, sub, main, amphur,pic_logo FROM shopping_product  WHERE id='".$val[program]."' ";
  $query_ps = $this->db->query($sql_ps);
  $res_ps = $query_ps->row();

  $minutes_to_add = $val[airout_m];
  //        echo $minutes_to_add." ++";
  $time_c = date('H:i',$val[update_date]); //ดึงเวลา อัพเดทเวลา ล่าสุด
  $time = new DateTime($time_c);
  if (in_array($_SERVER['REMOTE_ADDR'],array('127.0.0.1','::1'))) { // debug mode on localhost ('127.0.0.1' IP in IPv4 and IPv6 formats)
  }
  else {
    $time->add(new DateInterval('PT'.$minutes_to_add.'M'));
  }
  $stamp = $time->format('H:i');
  //        echo $stamp." +";
  $current_time = date('H:i');
  $datetime1 = new DateTime($current_time);
  $datetime2 = new DateTime($stamp);

  $contract = "lab";
  if ($res_dv->nickname != "") {
    $nickname = " (".$res_dv->nickname.")";
  }
  else {
    $nickname = "";
  }
  ?>
  <div style="padding: 5px 0px;margin: 12px 10px;" id="list_shop_manage_<?=$val[id];?>" >
    <input type="hidden" id="check_status_<?=$val[id];?>" value="<?=$val[status];?>" />
    <a href="tel://<?=$val[phone];?>" target="_blank" style="display: none;" id="phone_driver_<?=$val[id];?>"><?=$val[phone];?></a>
    <a href="zello://<?=$res_dv->zello_id;?>?add_user" target="_blank" style="display: none;" id="zello_driver_<?=$val[id];?>"><?=$res_dv->zello_id;?></a>
    <a href="line://ti/p/<?=$res_dv->line_id;?>" target="_blank" style="display: none;" id="line_driver_<?=$val[id];?>"><?=$res_dv->zello_id;?></a>
    <div class="box-shop">
      <?php if ($_GET[wait_trans] == "") {?>
        <span class="time-post-shop" id="txt_date_diff_<?=$val[id];?>" style="font-size:14px;">-</span>
        <?php
        $width = "50";
      }
      ?>
      <table width="100%">
        <tr>
          <td><span class="font-18"><?=date("d/m/Y",$val[post_date]);?></span></td>
        </tr>
      </table>
      <table width="100%"  >
        <tr>
          <td colspan="2">
            <?php
            $_where = array();
            $_where['id'] = $res_ps->province;
            $_select = array('name_th');
            $data_pv = $this->Main_model->rowdata(TBL_WEB_PROVINCE,$_where,$_select);

            $_where = array();
            $_where['id'] = $res_ps->sub;
            $_select = array('topic_th');
            $SUB = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB,$_where,$_select);

            $_where['id'] = $res_ps->main;
            $_select = array('topic_th');
            $MAIN = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN,$_where,$_select);

            $query = $this->db->query("SELECT name_th,id FROM web_area WHERE id = ".$res_ps->amphur);
            $aumper = $query->row();
            ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom : 0px solid #DADADA;" id="row_place_<?=$data->id;?>">
              <tr>
                <td width="130">
                  <?php
                  $url = "../data/pic/place/".$res_ps->pic_logo;
                  if (file_exists($url) != 1 || $res_ps->pic_logo == '') {
                    $images_url = base_url().'assets/images/noimage_2.gif';
                  }
                  else {
                    $images_url = $url;
                  }
                  ?>
                  <img class="chat_gallery_items" src="<?=$images_url;?>"  onclick="chat_gallery_items(this)" data-high-res-src="<?=$images_url;?>" alt="" style="box-shadow: 1px 1px 3px #333333;border-radius:  8px; border: 1px solid #ddd;height: 65px;width: 110px; ">
                </td>
                <td valign="top">
                  <strong class="font-20"  style="color:#3b5998" ><span class="txt_topic_company "> <?=$res_ps->topic_th;?> </span></strong><br>
                  <span class="font-17"><?=$MAIN->topic_th;?>(<span class="font-17" ><?=$SUB->topic_th;?> </span>)</span><br/>
                  <span class="font-17" style="color: #00000087;"><?=$data_pv->name_th;?> / <?=$aumper->name_th;?></span>


                  <input type="hidden" id="check_click_1" value="0">
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <div class="element_to_find" align="center" style="margin-top: 10px;">
                    <input type="hidden" name="" id="shop_topic_th" value="คิงส์ พาวเวอร์ (ภูเก็ต)">
                    <input type="hidden" value=" " id="1">
                  </div>
                </td>
              </tr>
            </table>
  <!--        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom : 0px solid #DADADA;" id="row_place_1">
                  <tr>
                      <td width="130">
                        <img src="../data/pic/place/logo<?=$res_ps->id;?>.jpg" alt="" style="box-shadow: 1px 1px 3px #333333;border-radius:  8px; border: 1px solid #ddd;height: 65px;width: 110px; ">
                      </td>
                      <td valign="top">
                        <strong class="font-17"><?=$data_pv->name_th;?> / <?=$row->name_th;?></strong><br>
                        <strong class="font-17"><?=$MAIN->topic_th;?></strong><br>
                        <strong class="font-17" style="color:#3b5998"><?=$SUB->topic_th;?></strong>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <div class="element_to_find" align="center" style="margin-top: 10px; margin-bottom: 5px;">
                          <span class="font-17" style="color:#333333"><span class="font-17 " data-role="1"><?=$res_ps->topic_th;?></span></span>
                          <input type="hidden" value=" " id="1">
                        </div>
                      </td>
                    </tr>
                  </table>-->
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <table width="100%" border="0" cellspacing="1" cellpadding="1" style=" margin-top: 0px; margin-bottom: 10px;">
              <tbody>
                <tr>
                  <td width="33%" align="left" style="padding: 0px; border: 1px solid #ccc; box-shadow: 1px 1px 3px #9e9e9e;">
                    <div class="btn" style=" width:100%; text-align:left;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_phone" onclick="contactDriver('<?=$contract;?>', 'phone', '<?=$res_ps->id;?>', '<?=$val[id];?>');">
                      <table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tbody>
                          <tr>
                            <td align="center" width="30"><i class="fa fa-phone-square" style="font-size:32px; color: #8DC63F; border:none;"></i></td>
                            <td align="center" class="font-17"><b>โทร</b></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </td>
                  <td width="33%" align="left" style="padding: 0px; border: 1px solid #ccc; box-shadow: 1px 1px 3px #9e9e9e;">
                    <div class="btn " style=" width:100%; text-align:left;border-radius: 0px;" data-toggle="dropdown" id="btn_div_dropdown_zello" onclick="contactDriver('<?=$contract;?>', 'zello', '<?=$res_ps->id;?>', '<?=$val[id];?>');">
                      <table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tbody>
                          <tr>
                            <td align="center" width="30"><img src="assets/images/social/zello.png" width="30" height="30" alt=""> </td>
                            <td align="center" class="font-17">
                              <b>Zello</b>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </td>
                  <td width="33%" align="left" style="padding: 0px; border: 1px solid #ccc; box-shadow: 1px 1px 3px #9e9e9e;">
                    <div class="btn" style=" width:100%; text-align:left; border-radius: 0px;" data-toggle="dropdown" id="shop_sub_menu_map" onclick="contactDriver('<?=$contract;?>', 'line', '<?=$res_ps->id;?>', '<?=$val[id];?>');">
                      <table width="100%" border="0" cellspacing="1" cellpadding="1">
                        <tbody>
                          <tr>
                            <td align="center" width="30"><img src="assets/images/social/line.png" width="30" height="30" alt=""></td>
                            <td align="center" class="font-17"><b>Line</b></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
  <!--        <tr>
      <td width="70%" ><span class="font-17"><?=$res_ps->topic_th;?></span></td>
    </tr>-->
        <tr>
          <td>
            <div class="font-17">
              จำนวน : 
              <?php if ($val[adult] > 0) {?>
                ผู้ใหญ่ : <span id="txt_mn_adult_<?=$val[id];?>"><?=$val[adult];?></span> 
              <?php }?>
              <?php if ($val[child] > 0) {?>
                เด็ก : <span id="txt_mn_child_<?=$val[id];?>"><?=$val[child];?></span>	
              <?php }
              ?>
            </div>
          </td>
        </tr>
        <?php
        $data = $this->Main_model->rowdata(TBL_ORDER_BOOKING,array('id' => $val[id]),array('*'));

        $query_price = $this->db->query("select * from shop_country_com_list_price_taxi where i_shop_country_com_list = '".$data->plan_id."' ");
        $num = 0;

        $display_person = "display:none";
        $display_com = "display:none";
        $display_park = "display:none";
        $park_total = 0;
        $person_total = 0;
        $com_total = 0;



        $_where = array();
        $_where['i_order_booking'] = $data->id;
        $_select = array('*');
        $_order = array();
        $_order['id'] = 'asc';
        $BOOKING_LOGS = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING_LOGS,$_where,$_select,$_order);

        $_where = array();
        $_where['id'] = $data->plan_setting;

        $_select = array('*');
        $PLAN_PACK = $this->Main_model->rowdata(NEW_TBL_PLAN_PACK,$_where);

        //           echo '<pre>';
        // print_r($PLAN_PACK);
        // echo '</pre>';
        $_where = array();
        $_where['id'] = $PLAN_PACK->i_country;
        $_select = array('country_code','id','name_th');
        $COUNTRY = $this->Main_model->rowdata(TBL_WEB_COUNTRY,$_where,$_select);



        $plan = $PLAN_PACK->s_topic;

        $titel = t_work_remuneration;
        $display_none_change_plan = "display:none;";
        $color_titel = "";

        if ($data->check_driver_pay == 0) {
          $txt_get_cash = "<span class='font-17' style='color: #f00;'>ยังไม่รับ</span>";
        }
        else {
          $txt_get_cash = "<span class='font-17' style='color: #6fab1e;'>รับแล้ว</span>";
        }
        ?>
        <tr>
          <td colspan="3">
            <table style="margin-left: -2px;">
              <tr>
                <td style="padding: 0;"><span class="font-17">สัญชาติ</span> : </td>
                <td style="padding: 0;">
                  <img src="<?=base_url();?>assets/images/flag/icon/<?=$COUNTRY->country_code;?>.png" width="20" height="20" alt="">
                </td>
                <td style="padding: 0;">&nbsp;</td>
                <td style="padding: 0;"><span class="font-17" id="txt_county_pp"><?=$COUNTRY->name_th;?></span></td>
              </tr>
            </table>
          </td>
        </tr>
        <!----------------------------------------------------------------------------------------------------------------------------->
        <tr>
          <td colspan="2">

            <div style="padding: 0px 0px;">

              <table width="100%" class="none-pd">
                <tr>
                  <td colspan="2"><span class="font-17">ประเภท : </span><span class="font-17" id="txt_type_plan"><?=$plan;?></span></td>        
                  <td width="30%" align="right" rowspan="1">
                    <?php
                    if ($val[lab_approve_job] == 1) {
                      $hide_btn_photo = "";
                      $sql_l = "SELECT username,name,nickname FROM web_driver WHERE id='".$val[lab_approve_job_post]."'    ";
                      $query_l = $this->db->query($sql_l);
                      $res_l = $query_l->row();
                    }
                    else {
                      $hide_btn_photo = "display:none;";
                    }
                    $path_img = "../data/pic/driver/small/".$res_l->username.".jpg?v=".time();
                    ?>
                    <i id="view_lab_approve_<?=$val[id];?>" class="material-icons font-28" style="color: rgb(59, 89, 152);  border-radius: 50%; padding: 2px; border: 2px solid rgb(59, 89, 152);<?=$hide_btn_photo;?>" onclick="modalShowImg('<?=$path_img;?>', '<?=$res_l->nickname;?>');" >account_circle</i>

                  </td>
                </tr>



                <!-- ******************* -->
                <?php
//       $_where = array();
//       $_where['i_plan_pack'] = $data->plan_setting;
//       $_select = array('*');
//       $_order = array();
//       $_order['id'] = 'asc';
//       $PACK_LIST = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK_LIST,$_where,$_select,$_order);
//       $all_total_iprice = 0;
//       foreach($PACK_LIST as $key=> $val){
//        $_where = array();
//        $_where[id] = $val->i_plan_main;
//        $this->db->select('id,s_topic');
//        $query_main = $this->db->get_where(NEW_TBL_PLAN_MAIN,$_where);
//        $main = $query_main->row();
//        $_where = array();
//        $_where[id] = $val->i_con_plan_main_list;
//        $this->db->select('id,s_topic');
//        $query_mainlist = $this->db->get_where(NEW_TBL_PLAN_MAIN_LIST,$_where);
//        $mainlist = $query_mainlist->row();
//        $partner_g = 2;
//        $_where = array();
//        $_where[id] = $val->i_con_plan_main_list;
//        $this->db->select('*');
//        $query = $this->db->get_where(NEW_TBL_PLAN_MAIN_LIST,$_where);
//        if($val->i_con_plan_main_list>0){
//         $txt_btn_add = $mainlist->s_topic;
//       }else{
//         $txt_btn_add = 'เพิ่ม';
//       }
//       $_where = array();
//       $_where[i_order_booking] = $data->id;
//       $_where[i_main_list] = $val->i_con_plan_main_list;
//       $_select = array('*');
//       $COM_ORDER_BOOKING = $this->Main_model->rowdata(TBL_COM_ORDER_BOOKING,$_where,$_select);
//       if ($COM_ORDER_BOOKING->i_main_list == 5) {
//         $curency = '%';
//         $title_head = 'รายการ';
//         $title_head2 = 'คอม';        
//         $_where = array();
//                     $_where[status] = 1;
//                     $_where[id] = $COM_ORDER_BOOKING->i_com;
//                     $_select = array('*');
//                     $MAIN_TYPELIST = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where,$_select);
// $pax = $MAIN_TYPELIST->topic_th;
//       }
//       else if ($COM_ORDER_BOOKING->i_main_list == 2) {
//         $curency = 'บ.';
//         $title_head = 'รายการ';
//         $title_head2 = 'ราคา';
//          $all_total_iprice += $COM_ORDER_BOOKING->i_price;
//         $_where = array();          
//          $_where[status] = 1;
//                     $_where[id] = $COM_ORDER_BOOKING->i_com;
//                     $_select = array('*');
//           $USE_TYPE = $this->Main_model->rowdata(TBL_WEB_CAR_USE_TYPE,$_where,$_select);
//           $pax = $USE_TYPE->name_th;
//       }
//       else if ($COM_ORDER_BOOKING->i_main_list == 3) {
//         $curency = 'บ.';
//         $title_head = 'รายการ';
//         $title_head2 = 'ราคา(คนละ)';
//          $all_total_iprice += $COM_ORDER_BOOKING->i_price*$COM_ORDER_BOOKING->i_pax;
//          $pax =$COM_ORDER_BOOKING->i_pax;
//       }
//       else{
//         $all_total_iprice += $COM_ORDER_BOOKING->i_price;
//         $curency = 'บ.';
//         $title_head = 'จำนวน';
//         $title_head2 = 'ราคา';
//          $pax = $COM_ORDER_BOOKING->i_pax;
//       }
                ?>
                       <!--   <tr >
                      <td  colspan="4">
                        <table width="100%">
                          <tr>
                            <td colspan="4">
                              <span style="font-weight: 700"><?=$main->s_topic;?>  (<?=$txt_btn_add;?>) </span>
                            </td>
                          
                          </tr>
                          <tr>
                              <td width="90"> <?=$title_head;?></td>
                              <td></td>
                              <td width="150" align="right"> <?=$title_head2;?></td>
                              <td></td> 
                          </tr>
                          <tr>
                              <td width="90" align="center"> <span style=""><?=$pax;?></span></td>
                              <td></td>
                              <td width="" align="right"><span><?=number_format($COM_ORDER_BOOKING->i_price,0);?></span></td>                
                              <td align="left"><span class="font-17"><?=$curency;?></span></td> 
                          </tr>
                        </table>          
                      </td>
                    </tr> -->
                <?php
                //}        
                ?>

              </table>   	
            </div>

          </td>
        </tr>
        <!----------------------------------------------------------------------------------------------------------------------------->
        <tr>
          <td colspan="2">
            <span class="font-17" >เลขจอง : <?=$val[invoice];?></span>
            <!-- <font color="#ff0000;" style="position: absolute;right: 25px;"><?=$val[airout_h].":".str_pad($val[airout_m],2,'0',STR_PAD_LEFT)." ".t_n;?></font>-->
            <font color="#ff0000;" style="position: absolute;right: 25px;" id="time_toplace_<?=$val[id];?>"><?="ถึงประมาณ ".$stamp." น.";?></font>
          </td>
        </tr>
        <?php
        if ($val[lab_approve_job] == 1) {
          $hidden_date_app = "";
        }
        else {
          $hidden_date_app = "display:none;";
        }
        ?>
        <tr id="date_approved_job_<?=$val[id];?>" style="<?=$hidden_date_app;?>">
          <td colspan="2">
            <span class="font-17" >รับทราบงาน :</span>
            <font color="#000;" style="position: absolute;right: 25px;" id="txt_date_approved_job_<?=$val[id];?>" ><?=date('H:i',$val[lab_approve_job_date])." น.";?></font>
          </td>
        </tr>
        <?php
        if ($val[status] != "CANCEL") {
          ?>
          <tr>
            <td colspan="2">
              <table width="100%">
                <tr>
                  <?php
                  $txt_cancel = t_cancel;
//                  if ($val[lab_approve_job] == 0) {
//                    $btn_cancel_taxi = "";
//                  }
//                  else {
//                    $btn_cancel_taxi = "display:none;";
//                  }
                  
                  if($_GET[wait_trans]==""){
                  ?>
             <td width="35%" valign="top" style="<?=$btn_cancel_taxi;?>" id="td_cancel_book_<?=$val[id];?>">
                <ons-button onclick="cancelShopSelect('<?=$val[id];?>', '<?=$val[invoice];?>', '<?=$val[drivername];?>', '<?=$val[program];?>');" id="cancel_book_<?=$val[id];?>"  id="btn_edit_time_<?=$val[id];?>" style="padding: 17.5px;
                            border-radius: 5px;
                            line-height: 0;
                            border: 1px solid #fe3824;
                            color: #fe3824;" modifier="outline" class="button-margin button button--outline button--large">&nbsp; 
                  <span class="font-17 text-cap"><?=$txt_cancel;?></span>
                </ons-button>
            </td>
                  <?php } ?>
            <td width="65%">
              <?php
              if ($val[check_guest_register] == 1) {
                $text_mn = 'เช็คยอดรายได้';
                # code...
              }

              if ($val[check_driver_topoint] == 0) {
                $text_mn = 'ถึงสถานที่ส่งแขก';
                $btn_manage_display = "display: none;";
                $btn_manage_topoint_display = "";
              }
              else {
                $text_mn = 'ตรวจสอบ';
                $btn_manage_display = "";
                $btn_manage_topoint_display = "display:none;";
              }
              if ($val[lab_approve_job] == 1) {
                $btn_manage = "";
                $txt_wait_approve = "display:none;";
              }
              else {
                $btn_manage = "display:none;";
                $txt_wait_approve = "";
              }
              ?>
          <ons-button onclick="checkinAndOpenDetail('<?=$val[id];?>', '<?=$key;?>');" style="padding: 15px;border: 1px solid #0076ff;
                      border-radius: 5px;
                      line-height: 0;<?=$btn_manage;?><?=$btn_manage_topoint_display;?>
                      " modifier="outline" class="button-margin button button--outline button--large" id="btn_manage_topoint_<?=$val[id];?>">
            <span class="font-17 text-cap">แจ้งถึงสถานที่</span> </ons-button>   
          <?php
          if ($_GET[wait_trans] != "") {
            $onclick = "openDetailShopWaitTrans('".$val[invoice]."');";
          }
          else {
            $onclick = "openDetailShop('".$key."','".$_GET[type]."','".$val[invoice]."');";
          }
          ?>  		
          <ons-button onclick="<?=$onclick;?>" style="padding: 15px;border: 1px solid #0076ff;
                      border-radius: 5px;
                      line-height: 0;<?=$btn_manage;?><?=$btn_manage_display;?>
                      " modifier="outline" class="button-margin button button--outline button--large" id="btn_manage_<?=$val[id];?>">
            <span class="font-17 text-cap">
              <?=$text_mn;?></span> 
          </ons-button>
          <div style="padding-left: 30px;<?=$txt_wait_approve;?>" align="center" id="txt_wait_<?=$val[id];?>"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#ff9800;"></i>&nbsp;<font color="#ff9800">รอการตอบรับ</font></div>

          </td>
          </tr>
        </table>
        </td>
        </tr>
        <?php
      }
        else {
        $sql_del = "SELECT * FROM history_del_order_booking WHERE order_id= ".$val[id]."  ";
        $query_del = $this->db->query($sql_del);
        $res_del = $query_del->row();

        if ($res_del->class_user_cancel == "taxi") {
          if ($res_del->i_status <= 0) {
            $txt_status_cancel = '<i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#ff9800;"></i>&nbsp;<font color="#ff9800">รอรับทราบ</font></span>';
          }
          else {
            $date = date('H:i',$res_del->update_date)." น.";
            $txt_status_cancel = '<font color="#4caf50">ยกเลิกเมื่อ '.$date.'</font>';
          }
          ?>
          <tr>
            <td colspan="2">
              <table width="100%" >
                <tr>
                  <td width="50%">
                    <div style=" margin-top: 5px;"><b class="font-18"><font color="#ff0000">ยกเลิก<br/><?=$res_cancel->s_topic;?></font></b></div>
                  </td>
                  <td align="right">
                    <span class="font-17"><?=$txt_status_cancel;?></span>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <?php }else{ ?>
          <tr>
            <td colspan="2">
              <table width="100%" >
                <tr>
                  <td>
                    <div style=" margin-top: 5px;"><b class="font-18"><font color="#ff0000">ปฏิเสธ<br/><?=$res_cancel->s_topic;?></font></b></div>
                  </td>
                  <td>
                <ons-button id="taxi_apporve_cancel_<?=$val[id];?>"  onclick="userApproveCancel('<?=$val[id];?>', '<?=$val[invoice];?>');" 
                            style="padding: 15px; border-radius: 5px; line-height: 0;border:1px solid #4CAF50;color: #4CAF50;<?=$btn_approve;?>" modifier="outline" class="button-margin button button--outline button--large" ><span class="font-17 text-cap">รับทราบ</span> </ons-button>

            </td>
          </tr>
          </table>
          </td>
          </tr>
          <?php
        }
      }
      ?>

      </table>
    </div>
  </div>
  <script>
    var check_wait = "<?=$_GET[wait_trans];?>";
    if (check_wait == "") {
      var d1 = "<?=date('Y/m/d H:i:s',$val[post_date]);?>";
      var d2 = js_yyyy_mm_dd_hh_mm_ss();
      var check_wait = "<?=$_GET[wait_trans];?>";

      $('#txt_date_diff_<?=$val[id];?>').text(CheckTimeV2(d1, d2));
      $('#date_book_<?=$val[id];?>').text(formatDate('<?=$val[transfer_date];?>'));
    }
  </script>
<?php }
?>
