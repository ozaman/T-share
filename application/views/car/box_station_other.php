<?php 




$_where = array();
    $_where[region] = $_POST[region];
    $_where[province] = $_POST[province];
    $_where[amphur] = $_POST[amphur];
    $_where[type] = $_POST[type];

    $_select = array('*');
    $_order = array();
    $_order['topic_th'] = 'asc';
    $data[OTHRET] = $this->Main_model->fetch_data('','',TBL_PLACE_CAR_STATION_OTHRET,$_where,$_select,$_order);
    $_where = array();
    // $_where['product_id'] = $_GET[id];
$_where['member'] = $_COOKIE['detect_user'];
$MEMBER2 = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION,$_where); 
?>
<div class="card" onclick="">
  <ons-list-header class="list-header" ><span id="header_topic_other"></span> <button type="button" class="btn btn-md btn-success btn-equal " onclick="add_new_station()" style="margin: 5px;
    padding: 5px 12px;
    border: none;
    color: #ffffff;
    background-color: #339933;
    border-color: #2d862d;
    border-radius: 5px;"> 
            <i class="fa fa-plus "></i>
            <span>เพิ่ม</span>
          </button></ons-list-header>
   
    <ons-list>
    
<select class="select-input font-17" name="station_other" id="station_other" value="" style="border-radius: 0px;padding: 5px;width: 100%; width: 100%;">
      <option value="0">-- กรุณาเลือก --</option>
      <?php
      foreach($data[OTHRET] as $key=>$row){

        if($MEMBER2->station == $row->id ){
          $selected_sub = "selected";
        }else{
          $selected_sub = "";
        }
        ?>
        <option value="<?=$row->id;?>"  <?=$selected_sub;?> ><?=$row->topic_th;?></option>
      <?php } ?>


    </select>

  </ons-list>
  </div>