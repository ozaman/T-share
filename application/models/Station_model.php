<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Station_model extends CI_Model {

  public function index() {
    
  }

  public function get_amphur() {
    $pv = $_POST[province];
    $this->db->select('id,name_th');
    $query = $this->db->get_where(TBL_WEB_AMPHUR,array('PROVINCE_ID' => $pv));
    $res = $query->result();
    foreach ($res as $row) {
      $data[] = $row;
    }
    return $data;
  }

  public function get_place() {
//    $pv = $_POST[province];

    $this->db->select('id,topic as name_th');
//    $this->db->where('pro',$pv);
    $this->db->where('aum',$_POST[amphur]);

    $this->db->where('status',1);
    $query = $this->db->get(TBL_WEB_TRANSFERPLACE_NEW);
    $res = $query->result();
    foreach ($res as $row) {
      $data[] = $row;
    }
    return $data;
  }

  public function add_data_service_area() {
    $data[i_station] = $_POST[station];
    $data[i_type] = 1;
    $data[i_place_from] = $_POST[station];
    $data[i_place_to] = $_POST[amphur];
    $data[s_topic_th] = $_POST[from]." - ".$_POST[to];
    $data[i_price] = $_POST[price_area];
    $data[d_post_date] = time();
    $data[d_last_update] = time();
    $data[i_status] = 1;

    $this->db->select('id,country');
    $this->db->where('id',$_POST[province]);
    $query = $this->db->get(TBL_WEB_PROVINCE);
    $pv_from = $query->row();

    $this->db->select('id,amphur');
    $this->db->where('id',$_POST[station]);
    $query = $this->db->get(TBL_PLACE_CAR_STATION_OTHRET);
    $station_from = $query->row();

    $data[i_country_from] = $pv_from->country;
    $data[i_province_from] = $pv_from->id;
    $data[i_amphur_from] = $station_from->amphur;

    /*     * *********************************************************** */
    $this->db->select('id,PROVINCE_ID');
    $this->db->where('id',$_POST[amphur]);
    $query = $this->db->get(TBL_WEB_AMPHUR);
    $amp_to = $query->row();

    $this->db->select('id,country');
    $this->db->where('id',$amp_to->PROVINCE_ID);
    $query = $this->db->get(TBL_WEB_PROVINCE);
    $pv_to = $query->row();

    $data[i_country_to] = $pv_to->country;
    $data[i_province_to] = $pv_to->id;
    $data[i_amphur_to] = $amp_to->id;



    $data[result] = $this->db->insert(TBL_PLACE_CAR_STATION_SERVICE,$data);
    return $data;
  }

  public function add_data_service_place() {
    $data[i_station] = $_POST[station];
    $data[i_type] = 2; // สถานที่
    $data[i_place_from] = $_POST[station];
    $data[i_place_to] = $_POST[place_to];
    $data[s_topic_th] = $_POST[from]." - ".$_POST[place_to];
    $data[i_price] = $_POST[price_place];
    $data[d_post_date] = time();
    $data[d_last_update] = time();
    $data[i_status] = 1;

    $this->db->select('id,country');
    $this->db->where('id',$_POST[province]);
    $query = $this->db->get(TBL_WEB_PROVINCE);
    $pv_from = $query->row();

    $this->db->select('id,amphur');
    $this->db->where('id',$_POST[station]);
    $query = $this->db->get(TBL_PLACE_CAR_STATION_OTHRET);
    $station_from = $query->row();

    $data[i_country_from] = $pv_from->country;
    $data[i_province_from] = $pv_from->id;
    $data[i_amphur_from] = $station_from->amphur;

    /*     * *********************************************************** */
    $this->db->select('id,PROVINCE_ID');
    $this->db->where('id',$_POST[place_to]);
    $query = $this->db->get(TBL_WEB_AMPHUR);
    $amp_to = $query->row();

    $this->db->select('id,country');
    $this->db->where('id',$amp_to->PROVINCE_ID);
    $query = $this->db->get(TBL_WEB_PROVINCE);
    $pv_to = $query->row();

    $data[i_country_to] = $pv_to->country;
    $data[i_province_to] = $pv_to->id;
    $data[i_amphur_to] = $amp_to->id;
    $data[result] = $this->db->insert(TBL_PLACE_CAR_STATION_SERVICE,$data);
    return $data;
  }

  public function save_place_owner() {
    $data[i_amphur] = $_POST[amphur];
    $data[i_province] = $_POST[province];
    $data[i_station] = $_POST[station];
    $data[i_country] = $_POST[country];
    $data[i_type] = 2; // สถานที่
    $data[d_post_date] = date('Y-m-d H:i:s');
    $data[d_last_update] = date('Y-m-d H:i:s');
    $data[i_status] = 1;

    foreach ($_POST[place_selected] as $key => $val) {
      $data[s_name] = $val;
      $data[i_place] = $key;
      $result[$key] = $this->db->insert(TBL_PLACE_CAR_STATION_MANAGE,$data);
    }
    $return[res_all] = $result;
    return $return;
  }

  public function save_each_trans_pl_station() {
    $data[i_station_owner] = $_POST[station];
    $this->db->where('id',$_POST[place_id]);
    $data[result] = $this->db->update(TBL_WEB_TRANSFERPLACE_NEW, $data);
    return $data;
  }

  /**
   * 
   * 
   * *********** End
   * 
   */
}
