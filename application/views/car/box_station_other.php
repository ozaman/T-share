<?php 
// print_r($_POST);



$_where = array();
    $_where[region] = $_POST[region];
    $_where[province] = $_POST[province];
    $_where[amphur] = $_POST[amphur];
    $_where[type] = $_GET[type];

    $_select = array('*');
    $_order = array();
    $_order['topic_th'] = 'asc';
    $data[OTHRET] = $this->Main_model->fetch_data('','',TBL_PLACE_CAR_STATION_OTHRET,$_where,$_select,$_order);
    // print_r($data[OTHRET]);
    $_where = array();

$_where[status] = 1;
$_where[member] = $_COOKIE['detect_user'];
$STATION = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION,$_where);
$_where = array();
 $_where['id'] = $STATION->station;
$OTHRET = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_OTHRET,$_where);  

$_where = array();
$_where[id] = $_GET[type];
$TYPE = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_TYPE,$_where);
?>
<div class="card" onclick="">
  <ons-list-header class="list-header" style="padding: 5px 0px; padding-left: 15px;" ><span ><?=$TYPE->topic_th;?></span> 
    <button type="button" class="btn btn-md btn-success btn-equal pull-right" onclick="add_new_station('<?=$TYPE->id;?>','EDIT')" style="margin: 5px;
    padding: 5px 12px;
    border: none;
    color: #ffffff;
    background-color: #339933;
    border-color: #2d862d;
    border-radius: 5px;    margin-top: 0px;"> 
            <i class="fa fa-pencil-square-o "></i>
            <span>แก้ไข</span>
          </button>
          <button type="button" class="btn btn-md btn-success btn-equal pull-right" onclick="add_new_station('<?=$TYPE->id;?>','ADD')" style="margin: 5px;
    padding: 5px 12px;
    border: none;
    color: #ffffff;
    background-color: #339933;
    border-color: #2d862d;
    border-radius: 5px;    margin-top: 0px;"> 
            <i class="fa fa-plus "></i>
            <span>เพิ่ม</span>
          </button>
        </ons-list-header>
   
    <ons-list style="width: 100%;">
    
<select class="select-input font-17" name="station_other" id="station_other" value="" style="border-radius: 0px;padding: 5px;width: 100%; width: 100%;">
      <option value="0">-- กรุณาเลือก --</option>
      <?php
      foreach($data[OTHRET] as $key=>$row){

        if($OTHRET->id == $row->id ){
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