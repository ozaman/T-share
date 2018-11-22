<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

  public function index() {
    
  }

  public function login($checking) {
    
      $return = array();
      $user = $_POST[real_username];
      $pass = $_POST[real_password];

      $this->db->where('username', $user);
      $this->db->or_where('phone =', $user);
      $this->db->or_where('email =', $user);
      $arr_select = array('*');
      $arr_order = array();
      $arr_order['id'] = 'ASC';
      $DRIVER = $this->Main_model->fetch_data('','',TBL_WEB_DRIVER,$arr_where,$arr_select,$arr_order);
      // return $DRIVER;
      if ($DRIVER != false) {
        $cheloop = false;
        foreach ($DRIVER as $row) {
          if ($row->password == $pass) {
            $return[status] = true;
            $return[POST] = $_POST;
            $return[count] = count($DRIVER);
            $return[data] = $row;

             return $return;
          }
          if ($cheloop == false) {
           $return[msg] = 'รหัสไม่ถูกต้อง';
            $return[status] = 1;
            $return[data] = null;
            $return[count] = count($DRIVER);

             return $return;
          }
          
        }

      }
      else{
        $return[msg] = 'ไม่มียูเซอร์นี้ในระบบ ';
        $return[status] = 0;
        $return[data] = null;
            $return[count] = count($DRIVER);

         return $return;
      }

    
  }
  public function recovery(){
    $res[us] = $db->select_query("SELECT phone,email,username,name FROM web_driver WHERE username = '".$_POST[key]."'  ");
  $arr[us] = $db->fetch($res[us]);
  $return = FALSE;
  if ($arr[us]) {
    $return[data] = $arr[us];
    $return[type] = 1;
  }
  else {
    $res[us] = $db->select_query("SELECT phone,email,username,name FROM web_driver WHERE phone = '".$_POST[key]."'  ");
    $arr[us] = $db->fetch($res[us]);
    if ($arr[us]) {
      $return[data] = $arr[us];
      $return[type] = 2;
    }
    else {
      $res[us] = $db->select_query("SELECT phone,email,username,name FROM web_driver WHERE email = '".$_POST[key]."'  ");
      $arr[us] = $db->fetch($res[us]);
      if ($arr[us]) {
        $return[data] = $arr[us];
        $return[type] = 3;
      }
    }
  }
  }


  /**
   * 
   * 
   * *********** End
   * 
   */
}
