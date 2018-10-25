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
    <?php 
      foreach ( $data[OTHRET] as $row){
  ?>
    <ons-list-item tappable onclick="selectstation(<?=$row->id;?>);">
      <label class="left">
        <ons-radio name="station_other" class="station_other" input-id="radio_other_<?=$row->id;?>" value="<?=$row->id;?>" ></ons-radio>
      </label>
      <label for="radio-<?=$row->id;?>" class="center">
        <?=$row->topic_th;?>
      </label>
    </ons-list-item>
    <!-- <input type="hidden" value="<?=$row->topic_th;?>" id="__<?=$row->id;?>" /> -->
  <?php 
    }
  ?>
  </ons-list>
  </div>