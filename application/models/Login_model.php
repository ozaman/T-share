<?php

define('LINE_API',"https://notify-api.line.me/api/notify");
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

  public function index() {
    
  }

  public function login($checking) {

    $return = array();
    $user = $_POST[real_username];
    $pass = $_POST[real_password];

    $this->db->where('username',$user);
    $this->db->or_where('phone =',$user);
    $this->db->or_where('email =',$user);
    $arr_select = array('*');
    $arr_order = array();
    $arr_order['id'] = 'ASC';
    $DRIVER = $this->Main_model->fetch_data('','',TBL_WEB_DRIVER,$arr_where,$arr_select,$arr_order);

    if ($DRIVER != false) {
      $cheloop = false;
      foreach ($DRIVER as $row) {
        if ($row->password == $pass) {
          
          if ($row->user_class == 'lab') {
//            return 0;
            $this->db->select('id,i_user_contact');
            $_where = array();
            $_where[i_user_id] = $row->id;
            $query_lab = $this->db->get_where('tbl_ability_user',$_where);
            $check_status_lab = $query_lab->row();
            if($check_status_lab == false){
              $return[msg] = 'ผู้ใช้ถูกปิดการใช้งาน กรุณาติดต่อผู้ดูแลของท่าน';
              $return[status] = false;
              return $return;
            }
            $this->db->select('i_online');
            $_where = array();
            $_where[id] = $check_status_lab->i_user_contact;
            $query_con = $this->db->get_where('shopping_contact',$_where);
            $check_status_con = $query_con->row();
//            return $check_status_lab;
            if($check_status_con->i_online > 1){
              $return[msg] = 'ผู้ใช้ถูกปิดการใช้งาน กรุณาติดต่อผู้ดูแลของท่าน';
              $return[status] = false;
              return $return;
            }
          }
//          return $check_status_con->i_online;
          $return[status] = true;
          $return[POST] = $_POST;
          $return[count] = count($DRIVER);
          $return[data] = $row;

          return $return;
        }
        if ($cheloop == false) {
          $return[msg] = 'รหัสไม่ถูกต้อง';
          $return[status] = false;
          $return[data] = null;
          $return[count] = count($DRIVER);

          return $return;
        }
      }
    }
    else {
      $return[msg] = 'ไม่มียูเซอร์นี้ในระบบ ';
      $return[status] = 0;
      $return[data] = null;
      $return[count] = count($DRIVER);

      return $return;
    }
  }

  public function recovery() {
    $_where = array();
    $_where[username] = $_POST[key];
    $_select = array('*');
    $res = $this->Main_model->rowdata(TBL_WEB_DRIVER,$_where);

    if ($res) {
      $return[data] = $res;
      $return[type] = 1;
      return $return;
    }
    else {
      $_where = array();
      $_where['phone'] = $_POST[key];
      $_select = array('*');
      $res = $this->Main_model->rowdata(TBL_WEB_DRIVER,$_where);
      if ($res) {
        $return[data] = $res;
        $return[type] = 2;
        return $return;
      }
      else {
        $_where = array();
        $_where['email'] = $_POST[key];
        $_select = array('*');
        $res = $this->Main_model->rowdata(TBL_WEB_DRIVER,$_where);
        if ($res) {
          $return[data] = $res;
          $return[type] = 3;
          return $return;
        }
      }
    }
  }

  public function user_data() {
    $user = $_POST[key];
    $arr_where = array();
    $this->db->where('username',$user);
    $this->db->or_where('phone =',$user);
    $this->db->or_where('email =',$user);
    $arr_select = array('*');
    $DRIVER = $this->Main_model->rowdata(TBL_WEB_DRIVER,$arr_where);
    return $DRIVER;
  }

  public function push_sms() {
    $data = array();
    $data[i_use_sms] = intval($_GET[sms]) + 1;
    $this->db->where('id',$_GET[dv]);
    $data[result] = $this->db->update(TBL_WEB_DRIVER,$data);
    return $data;
  }

  public function get_id_province_only() {
    // return $_POST;
    $str = $_POST[txt_pv];
    if (strlen($str) > 7) {
      $txt = mb_substr($str,0,7,"utf-8");
    }
    else {
      $txt = $_POST[txt_pv];
    }
    $arr_where = array();
    $arr_select = array('id','name_th','name_cn','name','area','code');

    $this->db->like('name_th',$txt);
    $this->db->or_like('name',$txt);
    $this->db->or_like('name_cn',$txt);

    $province = $this->Main_model->rowdata(TBL_WEB_PROVINCE,$arr_where,$arr_select);
    return $province;
  }

  public function phone_overlap() {
    $txt = $_POST[txt];
    $_where = array();
    $_where[phone] = $txt;
    $this->db->where('phone !=','');
    $data = $this->Main_model->num_row(TBL_WEB_DRIVER,$_where);
    $return[input] = $txt;
    $return[check] = $data;
    return $return;
  }

  public function data_province() {

    $arr_select = array('name_th','id','name','code');
    $arr_order = array();
    $arr_order['name_th'] = 'ASC';
    $category = $this->Main_model->fetch_data('','',TBL_WEB_PROVINCE,$arr_where,$arr_select,$arr_order);
    return $category;
  }

  public function register() {

    $return = array();
    if ($_POST[name_th] == "" or $_POST[name_th] == NULL) {
      $exit[col] = "name_th";
      $exit[val] = $_POST[name_th];
      $exit[type] = 0;
      return $exit;
    }
    if ($_POST[phone] == "" or $_POST[phone] == NULL) {
      $exit[col] = "phone";
      $exit[val] = $_POST[phone];
      $exit[type] = 0;
      return $exit;
    }
    if ($_POST[code_privince] == "" or $_POST[code_privince] == NULL) {
      $exit[col] = "code";
      $exit[val] = $_POST[code_privince];
      $exit[type] = 0;
      return $exit;
    }
    $_where = array();
    $_where[phone] = $_POST[phone];


    $DRIVERcount = $this->Main_model->num_row(TBL_WEB_DRIVER,$_where);
    if ($DRIVERcount > 0) {

      $return[add][result] = false;
      $return[add][msg] = 'มีเบอร์นี้ในระบบแล้ว';
      return $return;
    }


    $password = substr(str_shuffle('1234567890'),0,4);
    $provincecode = $_POST[code_privince];

    $data["password"] = $password;
    $data["name"] = $_POST[name_th];
    $data["phone"] = $_POST[phone];
    $data["province"] = $_POST[province];
    $data["status"] = 1;
    $data["post_date"] = time();
    $data["update_date"] = time();
    $add_result = $this->db->insert(TBL_WEB_DRIVER,$data);

    $return[add][data] = $data;
    $return[add][result] = $add_result;

    $last_id = mysql_insert_id();
    $member_db = $last_id;
    $member_in = $this->genUsername($member_db);
    $return[last_id] = $last_id;
    $data[i_driver] = $last_id;
    $return[member_in] = $member_in;

    $data_update[username] = $provincecode.$member_in;
    $data_update[password] = $password;
    $this->db->where('id',$last_id);
    $data_update[result] = $this->db->update(TBL_WEB_DRIVER,$data_update);
    $return[update] = $data_update;
    // return $return;
    // $add_driver_log = $db->insert(TBL_WEB_DRIVER_LOGS,$data);
// return $return;
    $curl_post_data = '{"id":"'.$last_id.'","action":"add"}';
    $headers = array();

    $url = "http://www.welovetaxi.com:3000/adddriver";
//$api_key = '1f7bb35be49521bf6aca983a44df9a6250095bbb';
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_HTTPHEADER,array(
        'Content-Type: application/json'
            // 'API-KEY: '.$api_key.''
            )
    );
    curl_setopt($curl,CURLOPT_ENCODING,'gzip');
    curl_setopt($curl,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.6 (KHTML, like Gecko) Chrome/16.0.897.0 Safari/535.6");
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_REFERER,$url);
    curl_setopt($curl,CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_POST,true);
    curl_setopt($curl,CURLOPT_POSTFIELDS,$curl_post_data);
    $curl_response = curl_exec($curl);
    curl_close($curl);

    // include('../line_notify_demo.php');

    $msg = array();
    $txt_short = "\n".'มีคนขับรถสมัครสมาชิกเข้ามาใหม่';
    $txt_short2 = "\n".'ชื่อ '.$data["name"];
    $txt_short2 .= "\n".'User : '.$data_update[username].' ';
    $txt_short2 .= "\n".'Password : '.$data[password].' ';
    $txt_short2 .= "\n".'เบอร์โทร : '.$data[phone];
//    $txt_short2 .= "\n".'สมัครเวลา : '.date('Y-m-d h:i:s',$data[post_date]).' ';

    $msg[message] = $txt_short.' '.$txt_short2;
    $token = "cuJeygjbI4UFGHXJha1zVxiNCJWXPaenK4xo7kzuCQX"; //ใส่Token ที่copy เอาไว้ ส่วนตัว
    $response = $this->notify_message($msg,$token);
    $return[line] = $response;
    return $return;
  }

  function genUsername($member_db) {
    if ($member_db >= 1000) {
      $member_in = "$member_db";
    }
    elseif ($member_db >= 100) {
      $member_in = "0$member_db";
    }
    elseif ($member_db >= 10) {
      $member_in = "00$member_db";
    }
    elseif ($member_db >= 1) {
      $member_in = "000$member_db";
    }
    else {
      $member_in = "0000$member_db";
    }
    return $member_in;
  }

  function notify_message($msg,$token) {
    $queryData = $msg;
    $queryData = http_build_query($queryData,'','&');
    $headerOptions = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
            ."Authorization: Bearer ".$token."\r\n"
            ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
        ),
    );
    $context = stream_context_create($headerOptions);
    $result = file_get_contents(LINE_API,FALSE,$context);
    $res = json_decode($result);
    return $res;
  }

  /**
   * 
   * 
   * *********** End
   * 
   */
}
