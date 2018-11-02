<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chat_model extends CI_Model {
  public function search_user($id){
    // $data = array();
    $_where             = array();
    $_where[id]         = $id;
    $_select            = array(
        '*'
    );
    $data      = $this->Main_model->rowdata(TBL_WEB_DRIVER, $_where);
    
        //return $data;
    return $data;
}
 
}