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
    $data[i_place_from] = $_POST[from];
    $data[i_place_to] = $_POST[amphur];
    $data[s_topic_th] = $_POST[ip_txt_from]." - ".$_POST[to];
    $data[i_price] = $_POST[price_area];
    $data[d_post_date] = time();
    $data[d_last_update] = time();
    $data[i_status] = 1;
    $data[i_type_from] = $_POST[type_from];
    $data[i_type_to] = 1;

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


    if($_GET[type]=='add'){
      $data[result] = $this->db->insert(TBL_PLACE_CAR_STATION_SERVICE,$data);
    }else if($_GET[type]=='update'){
      $where[id] = $_GET[id];
      $data[result] = $this->db->update(TBL_PLACE_CAR_STATION_SERVICE,$data,$where);
    }
    $data[type_action] = $_GET[type];
    return $data;
  }

  public function add_data_service_place() {
    $data[i_station] = $_POST[station];
    $data[i_type] = 2; // สถานที่
    $data[i_place_from] = $_POST[station];
    $data[i_place_to] = $_POST[place_to];
    
    $data[i_price] = $_POST[price_place];
    $data[d_post_date] = time();
    $data[d_last_update] = time();
    $data[i_status] = 1;

    $this->db->select('id,country');
    $this->db->where('id',$_POST[province]);
    $query = $this->db->get(TBL_WEB_PROVINCE);
    $pv_from = $query->row();

    if ($_POST[type_from] == 3) {
      $this->db->select('id,amphur');
      $this->db->where('id',$_POST[from]);
      $query = $this->db->get(TBL_PLACE_CAR_STATION_OTHRET);
      $station_from = $query->row();
      $data[s_topic_th] = $_POST[ip_txt_from]." - ".$_POST[place_to];
    }
    else if ($_POST[type_from] == 2) {
      $this->db->select('id,aum as amphur');
      $this->db->where('id',$_POST[from]);
      $query = $this->db->get(TBL_WEB_TRANSFERPLACE_NEW);
      $station_from = $query->row();
      $data[s_topic_th] = $_POST[ip_txt_from]." - ".$_POST[ip_txt_place_to];
    }
    $data[i_country_from] = $pv_from->country;
    $data[i_province_from] = $_POST[province];
    $data[i_amphur_from] = $station_from->amphur;
    $data[i_main] = $_POST[main];
    $data[i_type_from] = $_POST[type_from];
    $data[i_type_to] = $_POST[type_to];

    /*     * *********************************************************** */
    $this->db->select('id,pro');
    $this->db->where('id',$_POST[place_to]);
    $query = $this->db->get(TBL_WEB_TRANSFERPLACE_NEW);
    $amp_to = $query->row();

    $this->db->select('id,country');
    $this->db->where('id',$amp_to->pro);
    $query = $this->db->get(TBL_WEB_PROVINCE);
    $pv_to = $query->row();

    $data[i_country_to] = $pv_to->country;
    $data[i_province_to] = $pv_to->id;
    $data[i_amphur_to] = $amp_to->id;

    $data[result] = $this->db->insert(TBL_PLACE_CAR_STATION_SERVICE,$data);
    $data[post] = $_POST;
    return $data;
  }

  public function add_place_owner() {
    $data[i_amphur] = $_POST[amphur];
    $data[i_province] = $_POST[province];
    $data[i_station] = $_POST[station];
    $data[i_country] = $_POST[country];
    $data[i_type] = 2; // สถานที่
    $data[d_post_date] = date('Y-m-d H:i:s');
    $data[d_last_update] = date('Y-m-d H:i:s');
    $data[i_status] = 1;
    $data[s_name] = $_POST[place_selected][$_GET[place_id]];
    $data[i_place] = $_GET[place_id];
    $result = $this->db->insert(TBL_PLACE_CAR_STATION_OWNER,$data);
    $return[res] = $result;
    $return[data] = $data;
    $return[post] = $_POST;
    $return[get] = $_GET;
    return $return;
  }

  public function del_place_owner($id) {
    $result = $this->db->delete(TBL_PLACE_CAR_STATION_OWNER,array('id' => $id));
    return $result;
  }

  public function save_each_trans_pl_station() {
    if ($_POST[type] == 0) {
      $data[i_station_owner] = 0;
    }
    else {
      $data[i_station_owner] = $_POST[station];
    }
    $this->db->where('id',$_POST[place_id]);
    $data[result] = $this->db->update(TBL_WEB_TRANSFERPLACE_NEW,$data);
    return $data;
  }

  /**
   * 
   * 
   * *********** End
   * 
   */
}
