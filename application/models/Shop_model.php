<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_model extends CI_Model {

  public function add_shop($username) {

    $number = $_POST[adult];
    $mm = $_POST[time_num];
    if ($_POST[time_num] < 10) {
      $mm = "0".$_POST[time_num];
    }
    if ($_POST[persion_china] <= 0) {
      $_POST[persion_china] = 0;
    }
    if ($_POST[persion_other] <= 0) {
      $_POST[persion_other] = 0;
    }
    /* $data["code"] = "";
      $data["plan_id"] = $_POST[price_plan];
      $data["plan_commission"] = $arr[plan][plan_id];
      $data["price_park_unit"] = $price_park_driver;
      $data["price_park_total"] = $price_park_driver;
      $data["price_person_unit"] = $price_person_driver;
      $data["price_person_total"] = $all_price_person_driver;
      //		$data["price_all_total"] = $price_park_driver + $all_price_person_driver;
      $data["price_extra_park"] = $price_extra_park;
      $data["price_extra_person"] = $price_extra_park;
      $data["income_price_park"] = $income_price_park; */

    /*     * ******************************************************************************************* */
    /*     * ***********************              ******************************************************* */
    /*     * ******************************************************************************************* */
    // $_where = array();
    // $_where['i_shop_country_com_list'] = $_POST[price_plan];
    // $_select = array('*');
    // $_order = array();
    // $_order['id'] = 'asc';
    // $list_price = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE_TAXI,$_where,$_select,$_order);
    // foreach ($list_price as $key => $value) {
    // 	$_where = array();
    // 	$_where['id'] = $value->i_plan_product_price_name;
    // 	$_select = array('s_col');
    // 	$_order = array();
    // 	$_order['id'] = 'asc';
    // 	$price_name = $this->Main_model->rowdata(TBL_PLAN_PRODUCT_PRICE_NAME,$_where,$_select);
    // 	// return $price_name;
    // 	$datassss[col] =+$price_name->s_col; 
    // 	$s_col = $price_name->s_col;
    // 	if ($value->i_plan_product_price_name == 6) {
    // 		$price_person_total = (1*$value->i_price) * (1*$_POST[adult]);
    // 		// $data["aaaaaa".$s_col] = $value->s_topic_en;
    // 		$data[$s_col] = 1*$value->i_price;;
    // 		$data["price_person_total"] = 1*$price_person_total;
    // 	}
    // 	else if ($value->i_plan_product_price_name == 5) {
    // 		$_where = array();
    // 	$_where['i_list_price'] = $value->id;
    // 	$_where['i_car_type'] = $_POST[car_type];
    // 	$_where['i_shop'] = $_POST[program];
    // 	$_select = array('*');
    // 	$_order = array();
    // 	$_order['id'] = 'asc';
    // 	$CAR_PRICE = $this->Main_model->rowdata(TBL_SHOP_CAR_PRICE_TAXI,$_where,$_select);
    // 		$data[$s_col] =  $CAR_PRICE->i_price_park;
    // 	}
    // 	else{
    // 		$data[$s_col] =  $value->i_price;
    // 	}
    // 	if($value->s_payment=="โอน"){
    // 		$data[check_tran_job] = 1;
    // 	}
    // 	// $ick++;
    // }
    // return  $data;
    // $data["price_all_total"] = $price_park_driver + $all_price_person_driver;
    // $data["commission_persent"] = 1*$_POST[commission_persent];




    $data["plan_setting"] = $_POST[plan_setting];

    $data["plan_id"] = $_POST[price_plan];
    $data["pax"] = $_POST[adult];
    $data["program"] = $_POST[program];
    $data["transfer_date"] = date('Y-m-d');
//		$data["ondate"] = $_POST[transfer_date_new];
//		$data["outdate"] = $_POST[transfer_date_new];
    $data["airout_h"] = "00";
    $data["airout_m"] = $mm;
    $data["airout_time"] = "00".":"."$mm";
//		$data["car_color"] = $_POST[car_color];
    $data["car_type"] = trim($_POST[txt_car_type]);
    $data["i_cartype"] = $_POST[car_type];
    $data["car_plate"] = $_POST[car_plate];
    $data["check_use_car_id"] = $_POST[check_use_car_id];
    $data["adult"] = $_POST[adult];
    $data["child"] = $_POST[child];
    $data["phone"] = $_POST[dri_phone];
//		$data["nation"] = $_POST[nation];
    $data["booking_by"] = $_GET[driver];
//		$data["payment_type"] = $_POST[payment_type];
    $data["drivername"] = $_GET[driver];
    $data["driver_remark"] = $_POST[remark];
//		$data["ondate_time"] = $_POST[ondate_time];
//		"posted" = "$_SESSION[data_user_driver]";
    $data["post_date"] = time();
    $data["update_date"] = time();
    if ($_POST[bank_user_select]) {
      $data[bank_taxi_id] = $_POST[bank_user_select];
    }
//		if($_POST[nation]==1){
//			$data["num_ch"] = $_POST[persion_china];
//		}else if($_POST[nation]==2){
//			$data["num_other"] = $_POST[persion_other];
//		}else{
//			$data["num_ch"] = $_POST[persion_china];
//			$data["num_other"] = $_POST[persion_other];
//		}

    $result = $this->db->insert('order_booking',$data);
    $last_id = mysql_insert_id();

    /* check com order_booking */
    $_where = array();
    $_where['id'] = $_POST[plan_setting];
    $_select = array('*');
    $PLAN_PACK = $this->Main_model->rowdata(NEW_TBL_PLAN_PACK,$_where);
    $_where = array();
    $_where['i_plan_pack'] = $_POST[plan_setting];
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $PACK_LIST = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK_LIST,$_where,$_select,$_order);

    foreach ($PACK_LIST as $val1) {
      $_where = array();
      $_where[id] = $val1->i_plan_main;
      $this->db->select('id,s_topic');
      $query_main = $this->db->get_where(NEW_TBL_PLAN_MAIN,$_where);
      $main = $query_main->row();
      $_where = array();
      $_where[id] = $val1->i_con_plan_main_list;
      $this->db->select('id,s_topic');
      $query_mainlist = $this->db->get_where(NEW_TBL_PLAN_MAIN_LIST,$_where);
      $mainlist = $query_mainlist->row();
      $partner_g = 2;

      $_where = array();
      $_where[id] = $val1->i_con_plan_main_list;
      $_select = array('*');
      $_order = array();
      $query = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_MAIN_LIST,$_where,$_select,$_order);



      $_where = array();
      $_where['t2.i_plan_main'] = $main->id;
      $_where['t1.i_shop'] = $PLAN_PACK->i_shop;
      $_where['t1.i_country'] = $PLAN_PACK->i_country;
      $_where['t1.i_partner'] = 2;
      $this->db->select('*');
      $this->db->from(TBL_PLAN_PACK." as t1");
      $this->db->join(TBL_PLAN_PACK_LIST." as t2",'t1.id = t2.i_plan_pack');
      $this->db->where($_where);
      $con_ref = $this->db->get();
      $con_ref = $con_ref->row();
      foreach ($query as $key => $val2) {
        $data_com_ordder = array();
        $tbl = $val2->s_tbl;
        $_where = array();
        $_where[i_plan_pack] = $_POST[plan_setting];
        // $_where[i_status] = 1;
        if ($val1->id != 5) {
          $_where[i_status] = 1;
        }
        $this->db->select('*');
        $query_con_tb = $this->db->get_where($tbl,$_where);
        $con = $query_con_tb->row();


        if ($val2->id == 1) { //ตามจำนวนคน
          $park_total = 0;
          $_where = array();
          $_where[i_plan_pack] = $con_ref->i_plan_pack;
          $this->db->select('*');
          $query_data_ep = $this->db->get_where(TBL_CON_EACH_PERSON,$_where);
          foreach ($query_data_ep->result() as $key => $value) {
            if ($_POST[adult] >= $value->i_person_up) {
              $park_total = $value->f_price;
              $data_com_ordder['i_price'] = $park_total;
            }
          }
          $data_com_ordder['i_com'] = 0;

          $data_com_ordder['i_main_list'] = $val2->id;
        }
        if ($val2->id == 2) { //ตามประเภทรถ
          $_where = array();
          $_where[status] = 1;
          $this->db->select('*');
          $query2 = $this->db->get_where(TBL_WEB_CAR_USE_TYPE,$_where);
          foreach ($query2->result() as $key => $val) {
            if ($val->id == $_POST[car_type]) {
              $_where = array();
              $_where[i_car_type] = $val->id;
              $_where[i_plan_pack] = $_POST[plan_setting];
              $_select = array('*');
              $query_c = $this->Main_model->rowdata(TBL_CON_EACH_CAR,$_where);

              $_where = array();
              $_where[i_plan_pack] = $con_ref->id;
              $_where[i_car_type] = $val->id;
              $this->db->select('*');
              $q_car_ref = $this->db->get_where(TBL_CON_EACH_CAR,$_where);
              $data_car_ref = $q_car_ref->row();
              if (count($query_c) > 0) {

                $i_price = $query_c->f_price;
                $data_com_ordder['i_price'] = $i_price;
                $data_com_ordder['i_com'] = $val->id;
              }
            }
            $data_com_ordder['i_main_list'] = $val2->id;
          }
        }
        if ($val2->id == 3) { //จ่ายทุกกรณี
          $_where = array();
          $_where[i_plan_pack] = $con_ref->i_plan_pack;

          $_select = array('*');
          $query_payall = $this->Main_model->rowdata(TBL_CON_EACH_PS_ALL_PAY,$_where);




          $data_com_ordder['i_price'] = $con->f_price;
          $data_com_ordder['i_main_list'] = $val2->id;
          $data_com_ordder['i_com'] = 0;
        }
        if ($val2->id == 4) { //จ่ายเฉพาะที่ลงทะเบียน
          $tbl = $val2->s_tbl;

          $_where = array();
          $_where[i_plan_pack] = $_POST[plan_setting];
          $_select = array('*');
          $_order = array();
          $query_con_tb = $this->Main_model->fetch_data('','',$tbl,$_where,$_select,$_order);
          $chk_com_tb = $query_con_tb;
          $person_total = 0;
          foreach ($query_con_tb as $value4) {
            if ($_POST[adult] >= $value4->i_num_regis) {
              $teest = 'in'.$value4->i_num_regis;
              $data_com_ordder['i_price'] = $value4->f_price;
              $data_com_ordder['i_com'] = $value4->id;
            }
          }
          $data_com_ordder['i_main_list'] = $val2->id;
        }
        if ($val2->id == 5) { // ตามประเภทสินค้า
          if ($query_con_tb->num_rows() > 0) {
            $each_pd_loop = $query_con_tb;
            $cat = "own";
          }
          else {
            $_where = array();
            $_where[i_plan_pack] = $con_ref->i_plan_pack;
            $this->db->select('*');
            $each_pd_loop = $this->db->get_where(TBL_CON_COM_PRODUCT_TYPE,$_where);
            $cat = "prototype";
          }
          foreach ($each_pd_loop->result() as $key => $value) {
            $data_com_c = array();
            $data_com_c['i_order_booking'] = $last_id;
            $data_com_c['i_plan_pack'] = $_POST[plan_setting];
            $data_com_c['i_plan_main'] = $val2->i_plan_main;
            $data_com_c['i_con_com_product_type'] = $value->id;
            $data_com_c['i_price'] = $value->f_price;

            $data_com_c['result'] = $this->db->insert(TBL_COM_ORDER_BOOKING_COM,$data_com_c);

            $return_com_c[$key] = $data_com_c;

            $_where = array();
            $_where[id] = $value->i_product_sub_typelist;
            $this->db->select('*');
            $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
            $data_pd_sub_typelist = $query->row();


            $_where = array();
            $_where[status] = 1;
            $_where[id] = $data_pd_sub_typelist->i_main_typelist;
            $this->db->select('*');
            $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
            $data_pd = $query->row();

            $data_com_ordder['i_main_list'] = $val2->id;
            $data_com_ordder['i_com'] = $data_pd->id;
            $data_com_ordder['i_price'] = $value->f_price;
          }
          $return[list_c] = $return_com_c;
        }

        $data_com_ordder['plan_pack_list'] = $val1->id;
        $data_com_ordder['i_order_booking'] = $last_id;
        $data_com_ordder['i_plan_pack'] = $_POST[plan_setting];
        $data_com_ordder['i_plan_main'] = $val1->i_plan_main;
        $data_com_ordder['i_pax'] = $_POST[adult];
        $data_com_ordder['d_post_date'] = time();
        $data_com_ordder['d_last_date'] = time();
        $data_com_ordder['i_type_pay'] = $val1->i_pay_type;



        $data_com_ordder[result] = $this->db->insert(TBL_COM_ORDER_BOOKING,$data_com_ordder);
        $sss = $data_com_ordder;
        // $data_com_ordder['result'] = $result_com;
        // $return[main_c][$val1->id] = $data_com_ordder;
      }
      $ffff[$key] = $sss;
      if ($val1->i_pay_type == 2) {
        $data[check_tran_job] = 1;


        $this->db->where('id',$last_id);
        $data[result] = $this->db->update('order_booking',$data);
      }
    }



    /*     * ********************** */
    /*     * **** com company ***** */
    /*     * ********************** */

    $_where = array();
    $_where['i_country'] = $PLAN_PACK->i_country;
    $_where['i_shop'] = $PLAN_PACK->i_shop;
    $_where['i_partner_group'] = 1;
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $PACK_COMPANY = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK,$_where,$_select,$_order);
    $again = array();
    foreach ($PACK_COMPANY as $datacompany) {
      $com_list = array();
      $_where = array();
      $_where['i_plan_pack'] = $datacompany->id;
      $_select = array('*');
      $PACK_LIST_COMPANY = $this->Main_model->rowdata(NEW_TBL_PLAN_PACK_LIST,$_where);
      $com_list[data] = $PACK_LIST_COMPANY;
      $again[] = $com_list;
      $_where = array();
      $_where[id] = $PACK_LIST_COMPANY->i_plan_main;
      $this->db->select('id,s_topic');
      $query_main = $this->db->get_where(NEW_TBL_PLAN_MAIN,$_where);
      $main_company = $query_main->row();

      $_where = array();
      $_where[id] = $PACK_LIST_COMPANY->i_con_plan_main_list;
      $this->db->select('id,s_topic');
      $query_mainlist = $this->db->get_where(NEW_TBL_PLAN_MAIN_LIST,$_where);
      $mainlist_company = $query_mainlist->row();

      $_where = array();
      $_where[id] = $PACK_LIST_COMPANY->i_con_plan_main_list;
      $_select = array('*');
      $_order = array();
      $query_company = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_MAIN_LIST,$_where,$_select,$_order);
      $_where = array();
      $_where['t2.i_plan_main'] = $main_company->id;
      $_where['t1.i_shop'] = $datacompany->i_shop;
      $_where['t1.i_country'] = $datacompany->i_country;
      $_where['t1.i_partner'] = 1;
      $this->db->select('*');
      $this->db->from(TBL_PLAN_PACK." as t1");
      $this->db->join(TBL_PLAN_PACK_LIST." as t2",'t1.id = t2.i_plan_pack');
      $this->db->where($_where);
      $con_ref = $this->db->get();
      $con_ref_company = $con_ref->row();
      foreach ($query_company as $key => $val_company) {
        $tbl = $val_company->s_tbl;
        $_where = array();
        $_where[i_plan_pack] = $datacompany->id;

        if ($val_company->id != 5) {
          $_where[i_status] = 1;
        }
        $this->db->select('*');
        $query_con_tb = $this->db->get_where($tbl,$_where);
        $con = $query_con_tb->row();

        if ($val_company->id == 1) { //ตามจำนวนคน
          $park_total = 0;
          $_where = array();
          $_where[i_plan_pack] = $con_ref_company->i_plan_pack;
          $this->db->select('*');
          $query_data_ep = $this->db->get_where(TBL_CON_EACH_PERSON,$_where);
          foreach ($query_data_ep->result() as $key => $value) {
            if ($_POST[adult] >= $value->i_person_up) {
              $park_total = $value->f_price;
              $data_com_ordder_company['i_price'] = $park_total;
            }
          }
          $data_com_ordder_company['i_com'] = 0;

          $data_com_ordder_company['i_main_list'] = $val_company->id;
        }
        if ($val_company->id == 2) { //ตามประเภทรถ
          $_where = array();
          $_where[status] = 1;
          $this->db->select('*');
          $query2 = $this->db->get_where(TBL_WEB_CAR_USE_TYPE,$_where);
          foreach ($query2->result() as $key => $val) {
            if ($val->id == $_POST[car_type]) {
              $_where = array();
              $_where[i_car_type] = $val->id;
              $_where[i_plan_pack] = $datacompany->i_plan_pack;
              $_select = array('*');
              $query_c = $this->Main_model->rowdata(TBL_CON_EACH_CAR,$_where);

              $_where = array();
              $_where[i_plan_pack] = $con_ref_company->id;
              $_where[i_car_type] = $val->id;
              $this->db->select('*');
              $q_car_ref = $this->db->get_where(TBL_CON_EACH_CAR,$_where);
              $data_car_ref = $q_car_ref->row();
              if (count($query_c) > 0) {

                $i_price = $query_c->f_price;
                $data_com_ordder_company['i_price'] = $i_price;
                $data_com_ordder_company['i_com'] = $val->id;
              }
            }
            $data_com_ordder_company['i_main_list'] = $val_company->id;
          }
        }
        if ($val_company->id == 3) { //จ่ายทุกกรณี
          $_where = array();
          $_where[i_plan_pack] = $con_ref_company->i_plan_pack;

          $_select = array('*');
          $query_payall = $this->Main_model->rowdata(TBL_CON_EACH_PS_ALL_PAY,$_where);

          $data_com_ordder_company['i_price'] = $con->f_price;
          $data_com_ordder_company['i_main_list'] = $val_company->id;
          $data_com_ordder_company['i_com'] = 0;
        }
        if ($val_company->id == 4) { //จ่ายเฉพาะที่ลงทะเบียน
          $tbl = $val_company->s_tbl;
          $_where = array();
          $_where[i_plan_pack] = $datacompany->i_plan_pack;
          $this->db->select('*');
          $query_con_tb = $this->db->get_where($tbl,$_where);
          $con = $query_con_tb->row();
          $person_total = 0;
          foreach ($query_con_tb->result() as $key => $value4) {
            if ($_POST[adult] >= $value4->i_num_regis) {

              $person_total = $value4->f_price;
              // $data["price_person_total"] = $person_total;
              $data_com_ordder_company['i_price'] = $person_total;
            }
          }
          $data_com_ordder_company['i_main_list'] = $val_company->id;
        }
        if ($val_company->id == 5) { // ตามประเภทสินค้า 
          // if ($query_con_tb->num_rows() > 0) {
          // 	$each_pd_loop_company = $query_con_tb;
          // 	$cat = "own";
          // }
          // else {
          $working = 'working';
          $_where = array();
          $_where[i_plan_pack] = $PACK_LIST_COMPANY->i_plan_pack;
          $_select = array('*');
          $_order = array();
          $each_pd_loop_company = $this->Main_model->fetch_data('','',TBL_CON_COM_PRODUCT_TYPE,$_where,$_select,$_order);


          $ssss = $each_pd_loop_company;
          // }
          foreach ($each_pd_loop_company as $key => $value) {

            $data_com_company['i_order_booking'] = $last_id;
            $data_com_company['i_plan_pack'] = $datacompany->id;
            $data_com_company['i_plan_main'] = $val_company->i_plan_main;
            $data_com_company['i_con_com_product_type'] = $value->id;
            $data_com_company['i_price'] = $value->f_price;

            $re = $this->db->insert(TBL_COM_ORDER_BOOKING_COM_COMPANY,$data_com_company);

            $_where = array();
            $_where[id] = $value->i_product_sub_typelist;
            $this->db->select('*');
            $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
            $data_pd_sub_typelist = $query->row();


            $_where = array();
            $_where[status] = 1;
            $_where[id] = $data_pd_sub_typelist->i_main_typelist;
            $this->db->select('*');
            $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
            $data_pd = $query->row();

            $data_com_ordder_company['i_main_list'] = $val_company->id;
            $data_com_ordder_company['i_com'] = $data_pd->id;
            $data_com_ordder_company['i_price'] = $value->f_price;
          }
        }
        $data_com_ordder_company['plan_pack_list'] = $PACK_LIST_COMPANY->id;
        $data_com_ordder_company['i_order_booking'] = $last_id;
        $data_com_ordder_company['i_plan_pack'] = $datacompany->id;
        $data_com_ordder_company['i_plan_main'] = $val_company->i_plan_main;
        $data_com_ordder_company['i_pax'] = $_POST[adult];
        $data_com_ordder_company['d_post_date'] = time();
        $data_com_ordder_company['d_last_date'] = time();
        $result_com = $this->db->insert(TBL_COM_ORDER_BOOKING_COMPANY,$data_com_ordder_company);
      }
    }
    /*     * ********************** */
    /*     * *** end company **** */
    /*     * ********************** */












    /*     * ************************* */





    $data[last_id] = $last_id;
    $data[result] = $result;

    $member_db = $last_id;
    if ($member_db >= 10000) {
      $member_in = "$member_db";
    }
    elseif ($member_db >= 1000) {
      $member_in = "0$member_db";
    }
    elseif ($member_db >= 100) {
      $member_in = "00$member_db";
    }
    elseif ($member_db >= 10) {
      $member_in = "000$member_db";
    }
    else {
      $member_in = "0000$member_db";
    }
    $data_update[invoice] = "S$member_in";
    // $data_update[result] = $db->update_db('order_booking',$data_update,'id = "'.$last_id.'" ');
    $this->db->where('id',$last_id);
    $data_update[result] = $this->db->update('order_booking',$data_update);

    $data[update] = $data_update;
    $data[col] = $datassss;
    if ($data_update[result] == true) {
      $this->linenoti();
      # code...
    }
    $data[post] = $_POST;
//   $data[sss] = $query;
    $data[com] = $data_com_ordder;
    $data[result_com] = $result_com;
    $data[data_com_c] = $data_com_c;
    $data[data_com_ordder_company] = $data_com_ordder_company;
    $data[data_com_company] = $data_com_company;
    $data[PACK_COMPANY] = $PACK_COMPANY;
    $data[query_company] = $query_company;
    $data[con_ref_company] = $con_ref_company;
    $data[ssss] = $ssss;
    $data[con_ref_i_plan_pack] = $con_ref_company->i_plan_pack;
    $data[working] = $working;



    $data[PACK_LIST] = $PACK_LIST;
    $data[PACK_LIST_COMPANY] = $again;
    $data['com'] = $return;
    $data[chk_com_tb] = $chk_com_tb;
    $data[teest] = $ffff;
    return $data;
  }

  function linenoti() {
    $txt_short = 'ทะเบียน '.$_POST[car_plate];
    $txt_short .= ' ทำรายการส่งแขกเข้ามาใหม่ กรุณาตรวจสอบ';
    $title = "ทำรายการใหม่";
    $time_post = date('Y-m-d h:i:s');
    $mm = $_POST[time_num];
    if ($_POST[time_num] < 10) {
      $mm = "0".$_POST[time_num];
    }
    if ($_POST[adult] < 1) {
      $_POST[adult] = 0;
    }
    $txt_short2 = 'สถานที่ '.$_POST[pro_name].' ';
    $txt_short2 .= 'ทำรายการเวลา '.$time_post.'  น. ';
    $txt_short2 .= 'จะถึงสถานที่ในอีก '.$mm.' นาที ';
    $txt_short2 .= 'จำนวนแขก '.$_POST[adult].' คน';

    if ($_POST[remark] != '') {
      $txt_short2 .= "\n\n".'หมายเหตุ '.$_POST[remark];
      # code...
    }

    $str = $title.$txt_short."\n".$txt_short2."\n\nรายละเอียดคนขับ\n"."ชื่อ-สกุล : ".$_POST[dri_name]."\nเบอร์โทร".' '.$_POST[dri_phone]."\n".'';
    define('LINE_API',"https://notify-api.line.me/api/notify");
    $token = "NKtM17mRVqSAoIraJJyKbNkloWrF7QCM2kZCTsXvLXb"; //ใส่Token ที่copy เอาไว้
    $res = $this->notify_message($str,$token);
  }

  function notify_message($message,$token) {
    $queryData = array('message' => $message);
    $queryData = http_build_query($queryData,'','&');
    $headerOptions = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"."Authorization: Bearer ".$token."\r\n"."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
        ),
    );
    $context = stream_context_create($headerOptions);
    $result = file_get_contents(LINE_API,FALSE,$context);
  }

  public function driver_topoint() {

    $data[$_GET[type].'_date'] = time();
    $data[$_GET[type]] = 1;
    $data["check_".$_GET[type]] = 1;
    $data[$_GET[type]."_lat"] = $_GET[lat];
    $data[$_GET[type]."_lng"] = $_GET[lng];

    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);
//		$data[result] = true; 
    $data[next_step] = "guest_receive";
    $data[time] = time();

    return $data;
  }

  public function guest_receive() {

    $data[check_guest_receive] = 1;
    $data[guest_receive_date] = time();
    $data[driver_pickup_lat] = $_GET[lat];
    $data[driver_pickup_lng] = $_GET[lng];
    $data[guest_receive_ps] = $_COOKIE[detect_user];

    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);
//		$data[result] = true;
    $data[next_step] = "guest_register";
    $data[time] = time();

    return $data;
  }

  public function guest_register() {
    $data[check_guest_register] = 1;
    $data[guest_register_date] = time();
    $data[driver_register_lat] = $_GET[lat];
    $data[driver_register_lng] = $_GET[lng];
    $data[guest_register_ps] = $_COOKIE[detect_user];
    $data[pax_regis] = $_GET[num_cus];

    $this->db->where('id',$_GET[order_id]);
    $data[result] = $this->db->update('order_booking',$data);
//		$data[result] = true;
    $data[next_step] = "driver_pay_report";
    $data[id] = $_GET[order_id];
    $data[time] = time();

    return $data;
  }

  public function change_plan() {
    $_where = array();
    $_where['id'] = $_POST[plan_setting];
    $_select = array('*');
    $PLAN_PACK = $this->Main_model->rowdata(NEW_TBL_PLAN_PACK,$_where);
    $_where = array();
    $_where['i_plan_pack'] = $_POST[plan_setting];
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $PACK_LIST = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK_LIST,$_where,$_select,$_order);

    $_where = array();
    $_where['i_order_booking'] = $_GET[order_id];
    ;
    $_select = array('*');
    $_order = array();
    $_order['id'] = 'asc';
    $BOOKING_LOGS = $this->Main_model->fetch_data('','',TBL_COM_ORDER_BOOKING,$_where,$_select,$_order);


    if ($_POST[plan_setting] != '') {
      $get_query = array();
      $chk_i_pay = false;
      foreach ($PACK_LIST as $val) {
        $_where = array();
        $_where[id] = $val->i_con_plan_main_list;
        $_select = array('*');
        $_order = array();
        $queryass = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_MAIN_LIST,$_where,$_select,$_order);
        $ass[data] = $queryass;
        $get_query = $ass;
        if ($val->i_plan_main == 1) {

          $ck_result = $queryass;
        }
        $againck = array();
        foreach ($queryass as $key => $val2) {
          $tbl = $val2->s_tbl;
          $_where = array();
          $_where[i_plan_pack] = $_POST[plan_setting];
          if ($val->id != 5) {
            $_where[i_status] = 1;
          }
          $this->db->select('*');
          $query_con_tb = $this->db->get_where($tbl,$_where);
          $con = $query_con_tb->row();

          if ($val2->id == 1) { //ตามจำนวนคน
            $park_total = 0;
            $_where = array();
            $_where[i_plan_pack] = $val->i_plan_pack;
            $this->db->select('*');
            $query_data_ep = $this->db->get_where(TBL_CON_EACH_PERSON,$_where);
            foreach ($query_data_ep->result() as $key => $value) {
              if ($_POST[num_cus] >= $value->i_person_up) {
                $park_total = $value->f_price;
                $data_com_ordder['i_price'] = $park_total;
              }
            }
            $data_com_ordder['i_com'] = 0;

            $data_com_ordder['i_main_list'] = $val2->id;
          }
          if ($val2->id == 2) { //ตามประเภทรถ
            $_where = array();
            $_where[status] = 1;
            $this->db->select('*');
            $query2 = $this->db->get_where(TBL_WEB_CAR_USE_TYPE,$_where);
            $_where = array();
            $_where['id'] = $_GET[order_id];
            $_select = array('*');
            $book = $this->Main_model->rowdata(TBL_ORDER_BOOKING,$_where,$_select);
            foreach ($query2->result() as $key => $val3) {
              if ($val3->id == $book->i_cartype) {

                $cartype = $book->i_cartype;
                $_where = array();
                $_where[i_car_type] = $book->i_cartype;
                $_where[i_plan_pack] = $_POST[plan_setting];
                $_select = array('*');
                $query_c = $this->Main_model->rowdata(TBL_CON_EACH_CAR,$_where,$_select);
                $wwww = $query_c;
                if (count($query_c) > 0) {
                  $chk = $query_c;
                  $i_price = $query_c->f_price;
                  $data_com_ordder['i_price'] = $i_price;
                  $data_com_ordder['i_com'] = $val3->id;
                }
              }
            }
            $data_com_ordder['i_main_list'] = $val2->id;
          }
          if ($val2->id == 3) { //จ่ายทุกกรณี
            $_where = array();
            $_where[i_plan_pack] = $val->i_plan_pack;

            $_select = array('*');
            $query_payall = $this->Main_model->rowdata(TBL_CON_EACH_PS_ALL_PAY,$_where);
            $data_com_ordder['i_price'] = $con->f_price;
            $data_com_ordder['i_main_list'] = $val2->id;
            $data_com_ordder['i_com'] = 0;
          }
          if ($val2->id == 4) { //จ่ายเฉพาะที่ลงทะเบียน
            $tbl = $val2->s_tbl;

            $_where = array();
            $_where[i_plan_pack] = $_POST[plan_setting];
            $_select = array('*');
            $_order = array();
            $query_con_tb = $this->Main_model->fetch_data('','',$tbl,$_where,$_select,$_order);


            foreach ($query_con_tb as $value4) {
              if ($_POST[num_cus] >= $value4->i_num_regis) {
                $teest = 'in'.$value4->i_num_regis;
                $data_com_ordder['i_price'] = $value4->f_price;
                $data_com_ordder['i_com'] = $value4->id;
              }
            }
            $data_com_ordder['i_main_list'] = $val2->id;
          }
          if ($val2->id == 5) { // ตามประเภทสินค้า
            if ($query_con_tb->num_rows() > 0) {
              $each_pd_loop = $query_con_tb;
              $cat = "own";
            }
            else {
              $_where = array();
              $_where[i_plan_pack] = $val->i_plan_pack;
              $this->db->select('*');
              $each_pd_loop = $this->db->get_where(TBL_CON_COM_PRODUCT_TYPE,$_where);
              $cat = "prototype";
            }
            foreach ($each_pd_loop->result() as $key => $value) {
              $data_com_c['i_order_booking'] = $_GET[order_id];
              $data_com_c['i_plan_pack'] = $_POST[plan_setting];
              $data_com_c['i_plan_main'] = $val->i_plan_main;
              $data_com_c['i_con_com_product_type'] = $value->id;
              $data_com_c['i_price'] = $value->f_price;

              $re = $this->db->insert(TBL_COM_ORDER_BOOKING_CHANGE_PLAN,$data_com_c);



              $_where = array();
              $_where[id] = $value->i_product_sub_typelist;
              $this->db->select('*');
              $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
              $data_pd_sub_typelist = $query->row();


              $_where = array();
              $_where[status] = 1;
              $_where[id] = $data_pd_sub_typelist->i_main_typelist;
              $this->db->select('*');
              $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
              $data_pd = $query->row();
            }
            $data_com_ordder['i_main_list'] = $val2->id;
            $data_com_ordder['i_com'] = $data_pd->id;
            $data_com_ordder['i_price'] = 0;
          }
          $data_com_ordder['plan_pack_list'] = $val->id;
          $data_com_ordder['i_order_booking'] = $_GET[order_id];
          $data_com_ordder['i_plan_pack'] = $_POST[plan_setting];
          $data_com_ordder['i_plan_main'] = $val->i_plan_main;
          $data_com_ordder['i_pax'] = $_POST[num_cus];
          $data_com_ordder['d_post_date'] = time();
          $data_com_ordder['d_last_date'] = time();
          $data_com_ordder['d_last_date'] = time();
          $data_com_ordder['i_type_pay'] = $val->i_pay_type;
          $com_list[data] = $data_com_ordder;
          $againck[] = $com_list;
          $result_com = $this->db->insert(TBL_COM_ORDER_BOOKING_LOGS,$data_com_ordder);
        }
        $data = array();
        if ($val->i_pay_type == 2) {

//          $chk_i_pay = true;
//        }
//
//        if ($chk_i_pay == true) {
          $data[check_tran_job] = 1;


          $this->db->where('id',$_GET[order_id]);
          $data[result] = $this->db->update('order_booking',$data);
        }
        else {
          $data[check_tran_job] = 0;


          $this->db->where('id',$_GET[order_id]);
          $data[result] = $this->db->update('order_booking',$data);
        }
      }
      /*       * ********************** */
      /*       * **** com company ***** */
      /*       * ********************** */

      $_where = array();
      $_where['i_country'] = $PLAN_PACK->i_country;
      $_where['i_shop'] = $PLAN_PACK->i_shop;
      $_where['i_partner_group'] = 1;
      $_select = array('*');
      $_order = array();
      $_order['id'] = 'asc';
      $PACK_COMPANY = $this->Main_model->fetch_data('','',NEW_TBL_PLAN_PACK,$_where,$_select,$_order);



      foreach ($PACK_COMPANY as $datacompany) {
        $com_list = array();
        $_where = array();
        $_where['i_plan_pack'] = $datacompany->id;
        $_select = array('*');
        $PACK_LIST_COMPANY = $this->Main_model->rowdata(NEW_TBL_PLAN_PACK_LIST,$_where);



        $_where = array();
        $_where[id] = $PACK_LIST_COMPANY->i_con_plan_main_list;
        $_select = array('*');

        $query_company = $this->Main_model->rowdata(NEW_TBL_PLAN_MAIN_LIST,$_where,$_select);


        $tbl = $query_company->s_tbl;
        $_where = array();
        $_where[i_plan_pack] = $datacompany->id;
        if ($query_company->id != 5) {
          $_where[i_status] = 1;
        }
        $this->db->select('*');
        $query_con_tb = $this->db->get_where($tbl,$_where);
        $con = $query_con_tb->row();
        if ($query_company->id == 1) { //ตามจำนวนคน
          $park_total = 0;
          $_where = array();
          $_where[i_plan_pack] = $PACK_LIST_COMPANY->i_plan_pack;
          $this->db->select('*');
          $query_data_ep = $this->db->get_where(TBL_CON_EACH_PERSON,$_where);
          foreach ($query_data_ep->result() as $key => $value) {
            if ($_POST[num_cus] >= $value->i_person_up) {
              $park_total = $value->f_price;
              $data_com_ordder_company['i_price'] = $park_total;
            }
          }
          $data_com_ordder_company['i_com'] = 0;
          $data_com_ordder_company['i_main_list'] = $query_company->id;
        }
        if ($query_company->id == 2) { //ตามประเภทรถ
          $_where = array();
          $_where[status] = 1;
          $this->db->select('*');
          $query2 = $this->db->get_where(TBL_WEB_CAR_USE_TYPE,$_where);
          foreach ($query2->result() as $key => $val) {
            if ($val->id == $BOOKING_LOGS[0]->i_cartype) {
              $_where = array();
              $_where[i_car_type] = $val->id;
              $_where[i_plan_pack] = $datacompany->i_plan_pack;
              $_select = array('*');
              $CON_EACH_CAR = $this->Main_model->rowdata(TBL_CON_EACH_CAR,$_where);
              $_where = array();
              $_where[i_plan_pack] = $PACK_LIST_COMPANY->id;
              $_where[i_car_type] = $val->id;
              $this->db->select('*');
              $q_car_ref = $this->db->get_where(TBL_CON_EACH_CAR,$_where);
              $data_car_ref = $q_car_ref->row();
              if (count($CON_EACH_CAR) > 0) {
                $i_price = $CON_EACH_CAR->f_price;
                $data_com_ordder_company['i_price'] = $i_price;
                $data_com_ordder_company['i_com'] = $val->id;
              }
            }
            $data_com_ordder_company['i_main_list'] = $query_company->id;
          }
        }
        if ($query_company->id == 3) { //จ่ายทุกกรณี
          $_where = array();
          $_where[i_plan_pack] = $PACK_LIST_COMPANY->i_plan_pack;
          $_select = array('*');
          $query_payall = $this->Main_model->rowdata(TBL_CON_EACH_PS_ALL_PAY,$_where);
          $data_com_ordder_company['i_price'] = $con->f_price;
          $data_com_ordder_company['i_main_list'] = $query_company->id;
          $data_com_ordder_company['i_com'] = 0;
        }
        if ($query_company->id == 4) { //จ่ายเฉพาะที่ลงทะเบียน
          $tbl = $query_company->s_tbl;
          $_where = array();
          $_where[i_plan_pack] = $datacompany->i_plan_pack;
          $this->db->select('*');
          $query_con_tb = $this->db->get_where($tbl,$_where);
          $con = $query_con_tb->row();
          $person_total = 0;
          foreach ($query_con_tb->result() as $key => $value4) {
            if ($_POST[num_cus] >= $value4->i_num_regis) {
              $person_total = $value4->f_price;
              // $data["price_person_total"] = $person_total;
              $data_com_ordder_company['i_price'] = $person_total;
            }
          }
          $data_com_ordder_company['i_main_list'] = $query_company->id;
        }
        if ($query_company->id == 5) { // ตามประเภทสินค้า 
          $_where = array();
          $_where[i_plan_pack] = $datacompany->id;
          $_select = array('*');
          $_order = array();
          $each_pd_loop_company = $this->Main_model->fetch_data('','',TBL_CON_COM_PRODUCT_TYPE,$_where,$_select,$_order);

          foreach ($each_pd_loop_company as $value) {
            $data_com_company_ch = array();

            $data_com_company_ch['i_order_booking'] = $_GET[order_id];
            $data_com_company_ch['i_plan_pack'] = $datacompany->id;
            $data_com_company_ch['i_plan_main'] = $query_company->i_plan_main;
            $data_com_company_ch['i_con_com_product_type'] = $value->id;
            $data_com_company_ch['i_price'] = $value->f_price;

            $re = $this->db->insert(TBL_COM_ORDER_BOOKING_COMPANY_CHANGE_PLAN,$data_com_company_ch);
            // $re_company_com2[data] = $re;
            // $re_company_com = $re_company_com2;

            $_where = array();
            $_where[id] = $value->i_product_sub_typelist;
            $this->db->select('*');
            $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
            $data_pd_sub_typelist = $query->row();


            $_where = array();
            $_where[status] = 1;
            $_where[id] = $data_pd_sub_typelist->i_main_typelist;
            $this->db->select('*');
            $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
            $data_pd = $query->row();

            $data_com_ordder_company['i_main_list'] = $query_company->id;
            $data_com_ordder_company['i_com'] = $data_pd->id;
            $data_com_ordder_company['i_price'] = $value->f_price;



            $_where = array();
            $_where[id] = $value->i_product_sub_typelist;
            $this->db->select('*');
            $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_SUB_TYPELIST,$_where);
            $data_pd_sub_typelist = $query->row();
            $_where = array();
            $_where[status] = 1;
            $_where[id] = $data_pd_sub_typelist->i_main_typelist;
            $this->db->select('*');
            $query = $this->db->get_where(TBL_SHOPPING_PRODUCT_MAIN_TYPELIST,$_where);
            $data_pd = $query->row();
            $data_com_ordder_company['i_main_list'] = $query_company->id;
            $data_com_ordder_company['i_com'] = $data_pd->id;
            $data_com_ordder_company['i_price'] = $value->f_price;
          }
        }
        $data_com_ordder_company['plan_pack_list'] = $PACK_LIST_COMPANY->id;
        $data_com_ordder_company['i_order_booking'] = $_GET[order_id];
        $data_com_ordder_company['i_plan_pack'] = $datacompany->id;
        ;
        $data_com_ordder_company['i_plan_main'] = $query_company->i_plan_main;
        $data_com_ordder_company['i_pax'] = $_POST[num_cus];
        $data_com_ordder_company['d_post_date'] = time();
        $data_com_ordder_company['d_last_date'] = time();
        $result_com = $this->db->insert(TBL_COM_ORDER_BOOKING_COMPANY_LOGS,$data_com_ordder_company);
        // }
      }
    }
    else {
      $result_com = true;
    }


























    /*     * **************************** */

    $return[i_plan_pack] = $BOOKING_LOGS[0]->i_plan_pack;
    $return[num_cus] = $_POST[num_cus];
    $return[plan_setting] = $_POST[plan_setting];
    $return[backup] = $_POST;
    $return[update] = $data_com_ordder;
    $return[result] = $result_com;
    $return[PACK_COMPANY] = $PACK_COMPANY;
    $return[data_com_ordder_company] = $data_com_ordder_company;
    $return[data_com_company] = $data_com_company;
    $return[query_c] = $query_c;
    $return[cartype] = $cartype;
    $return[query] = $get_query;
    $return[againck] = $againck;
    $return[PACK_LIST] = $PACK_LIST;
    $return[get_query] = $get_query;
    $return[post] = $_POST;
    $return[chk] = $chk;
    $return[ck_result] = $ck_result;
    $return[query_company] = $query_company;
    $return[each_pd_loop_company] = $each_pd_loop_company;
    $return[ch_company_com] = $ch_company_com;
// $return[re_company_com] = $re_company_com;
    $return[again22] = $again22;
    $return[again] = $again;

    return $return;
  }

  public function driver_pay_report() {
    $data[check_driver_pay_report] = 1;
    $data[driver_pay_report_date] = time();

    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);
//		$data[result] = true;
    $data[next_step] = "finish";
    $data[time] = time();

    return $data;
  }

  public function driver_complete() {
    $data[driver_complete] = 1;
    $data[driver_complete_date] = time();
    $data[driver_complete_lat] = $_GET[lat];
    $data[driver_complete_lng] = $_GET[lng];
    $data[remark_pay] = $_GET[remark_pay];
    $data[status] = "COMPLETED";

    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);
//		$data[result] = true;
    $data[time] = time();

    return $data;
  }

  public function editpax() {
    $data['adult'] = $_GET[adult];
    $data['child'] = $_GET[child];
    $data['pax'] = $_GET[adult];

    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);

    $data2['i_pax'] = $_GET[adult];
    $this->db->where('i_order_booking',$_GET[id]);
    $data2[result2] = $this->db->update(TBL_COM_ORDER_BOOKING,$data2);
    $data[data2] = $data2;
    return $data;
  }

  public function editadult() {
    $data['adult'] = $_GET[num];

    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);

    return $data;
  }

  public function editchild() {
    $data['child'] = $_GET[num];

    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);

    return $data;
  }

  public function place_companycount() {
    $this->db->select('count(*)');
    $this->db->from(TBL_SHOPPING_PRODUCT);
    $this->db->where('status','1');
    $query = $this->db->get();

    return $query->num_rows();
    // $this->load->view('shop/place_company',$data);
  }

  public function car_count() {
    /* $login_id = $this->input->cookie('detect_user');
      $this->db->from(TBL_WEB_CARALL);
      $this->db->where('drivername',$login_id);
      $query = $this->db->get(); */

    $query = $this->db->query('SELECT * FROM web_carall where drivername = '.$_COOKIE[detect_user]);
//	echo $query->num_rows();

    return $query->num_rows();
    // $this->load->view('shop/place_company',$data);
  }

  public function car_counthis() {
    $login_id = $this->input->cookie('detect_user');
    //echo $login_id;
    // $this->db->select('count(*)');
    $this->db->from(TBL_WEB_CARALL);
    $this->db->where('drivername',$login_id);
    $query = $this->db->get();
    // echo $query->num_rows();
    return $query->num_rows();
    // $this->load->view('shop/place_company',$data);
  }

  public function lab_acknowledge() {

    $data[lab_approve_job] = 1;
    $data[lab_approve_job_date] = time();
    $data[lab_approve_job_post] = $_POST[posted];
    $this->db->where('id',$_POST[id]);
    $data[result] = $this->db->update('order_booking',$data);
    return $data;
  }

  public function update_time_toplace() {
    $id = $_POST[order_id];
    $data[airout_m] = $_POST[time];
    $data[update_date] = time();

    $this->db->where('id',$id);
    $data[result] = $this->db->update('order_booking',$data);
    return $data;
  }

  public function lab_approved_pay() {
    $id = $_POST[order_id];
    $data_ob[driver_payment_date] = time();
    $data_ob[check_lab_pay] = 1;
    $this->db->where('id',$id);
    $data_ob[result] = $this->db->update('order_booking',$data_ob);
    return $data_ob;
  }

  public function driver_approved_pay() {

    $id = $_GET[order_id];
    $data_ob[check_driver_pay] = 1;
    $data_ob[driver_pay_report_date] = time();
    $this->db->where('id',$id);
    $data_ob[result] = $this->db->update('order_booking',$data_ob);
    return $data_ob;
  }

  public function editpax_regis() {
    $data['pax_regis'] = $_GET[pax_regis];
    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);

    return $data;
  }

  public function cancel_shop() {

    $data[status] = "CANCEL";
    $data[cancel_type] = $_POST[type_cancel];
    $data[driver_complete] = 0;
    $data[cancel_by] = $_COOKIE[detect_user];
    $data[update_date] = time();

    $this->db->where('id',$_POST[order_id]);
    $data[result] = $this->db->update('order_booking',$data);
    $data[order_id] = $_POST[order_id];

    $typname = "typname_".$_POST[type_cancel];
    $data_his[order_id] = $_POST[order_id];
    $data_his[type] = $_POST[type_cancel];
    $data_his[status] = "CANCEL";
    $data_his[i_status] = 0;
    $data_his[type_name] = $_POST[$typname];
    $data_his[user_cancel] = $_COOKIE[detect_user];
    $data_his[class_user_cancel] = $_COOKIE[detect_userclass];
    $data_his[posted] = $_COOKIE[detect_username];
    $data_his[post_date] = time();
    $data_his[update_date] = time();

    $data_his[result] = $this->db->insert('history_del_order_booking',$data_his);
    ;
//	$data_his[result] = true;
    $data[history] = $data_his;

    return $data;
  }

  public function taxi_approved_cancel() {

    $data[driver_complete] = 1;
    $data[update_date] = time();
    $data[check_driver_pay] = 1;
    $this->db->where('id',$_GET[order_id]);
    $data[result] = $this->db->update('order_booking',$data);

    $data2[i_status] = 1;
    $data2[user_approved] = $_COOKIE[detect_user];
    $data2[class_user_approved] = $_COOKIE[detect_userclass];
    $this->db->where('order_id',$_GET[order_id]);
    $data2[result] = $this->db->update('history_del_order_booking',$data2);

    $data[ord] = $data;
    $data[his] = $data2;

    return $data;
  }

  public function get_trans_com() {
    $order['driver_approve'] = 1;
    $order['driver_approve_pay_date'] = time();
    $this->db->where('id',$_GET[id]);
    $order[result] = $this->db->update('order_booking',$order);

    $data['driver_approve'] = 1;
    $data['driver_approve_pay_date'] = time();
    $this->db->where('order_id',$_GET[id]);

    $data[result] = $this->db->update('pay_history_driver_shopping',$data);

    $return[order] = $order;
    $return[his] = $data;
    $return['id'] = $_GET[id];
    return $return;
  }

  public function select_bank_after_change_plan() {
    $data['bank_taxi_id'] = $_POST[bank_user_select];
    $this->db->where('id',$_GET[id]);
    $data[result] = $this->db->update('order_booking',$data);
    $data[id] = $_GET[id];
    return $data;
  }

  public function confirm_choose_get_money() {
    $type_pay = $_POST[type_pay];

    $this->db->select('id');
    $_where = array();
    $_where[i_order_booking] = $_POST[order_id];
    $chk_log = $this->db->get_where(TBL_COM_ORDER_BOOKING_LOGS,$_where);
    $num_log = $chk_log->num_rows();
    if ($num_log > 0) {
      $tbl_com_booking = TBL_COM_ORDER_BOOKING_LOGS;
    }
    else {
      $tbl_com_booking = TBL_COM_ORDER_BOOKING;
    }
    $data2[i_type_pay] = $type_pay;
    $this->db->where('i_order_booking',$_POST[order_id]);
    $data2[result] = $this->db->update($tbl_com_booking,$data2);
    $data2[table] = $tbl_com_booking;


    if ($type_pay == 2) {
      $data[check_tran_job] = 1;
    }
    $data[i_select_type_pay] = 1;
    $this->db->where('id',$_POST[order_id]);
    $data[result] = $this->db->update('order_booking',$data);
    $data[post] = $_POST;

    $return[com_order] = $data2;
    $return[order_book] = $data;

    return $return;
  }

  public function detectOnlyTypePay() { // ตรวจสอบว่า งานมีโอน หรือ เงินสด อย่างเดียวหรือไม่ ถ้ามีโอนอย่างเดียวให้ เสร็จงาน ใช้ param type
    $type = $_GET[type];
    $this->db->select('id');
    $_where = array();
    $_where[i_order_booking] = $_GET[order_id];
    $chk_log = $this->db->get_where(TBL_COM_ORDER_BOOKING_LOGS,$_where);
    $num_log = $chk_log->num_rows();
    if ($num_log > 0) {
      $tbl_com_booking = TBL_COM_ORDER_BOOKING_LOGS;
    }
    else {
      $tbl_com_booking = TBL_COM_ORDER_BOOKING;
    }

    $this->db->select('id');
    $_where = array();
    $_where[i_order_booking] = $_GET[order_id];
    $query = $this->db->get_where($tbl_com_booking,$_where);
    $num_row_all = $query->num_rows();

    $this->db->select('id');
    $_where = array();
    $_where[i_order_booking] = $_GET[order_id];
    $_where[i_type_pay] = $type;
    $query = $this->db->get_where($tbl_com_booking,$_where);
    $num_row_type = $query->num_rows();

    $res = false; // ไม่ใช่ประเภทเดียว
    if ($num_row_type == $num_row_all) {
      $res = true; // ประเทภเดียว
    }

    $return[result] = $res;
    $return[get] = $_GET;
    $return[all_num] = $num_row_all;
    $return[type_num] = $num_row_type;

    return $return;
  }

  /**
   * 
   * driver_topoint
    guest_receive
    guest_register
    driver_pay_report
   * 
   * *********** End
   * 
   */
}
