<?php
$where = array();
$this->db->select('id, topic, i_station_owner');
$where[status] = 1;
$where[id] = $this->input->get('id');
$query = $this->db->get_where(TBL_WEB_TRANSFERPLACE_NEW,$where);
$res_pl = $query->row();
$_where = array();
$_where['id'] = $res_pl->i_station_owner;
$OTHRET = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_OTHRET,$_where);
$_where = array();
$_where['id'] = $OTHRET->type;
$TYPE = $this->Main_model->rowdata(TBL_PLACE_CAR_STATION_TYPE,$_where);
$_where = array();
$_where[user_class] = $_COOKIE['detect_userclass'];
// if ($STATION->station == 4) {
// 	# code...
// }
$_where[i_station_type] = $OTHRET->type;
$_select = array('*');
$_order = array();
$_order[i_index] = 'asc';
$STATION_FIELD = $this->Main_model->fetch_data('','',TBL_SHOP_STATION_FIELD,$_where,$_select,$_order);
$_where = array();
$_where[area] = $OTHRET->region;
$PROVINCE = $this->Main_model->rowdata(TBL_WEB_PROVINCE,$_where);
$_where = array();
$_where[PROVINCE_ID] = $OTHRET->province;
$AMPHUR = $this->Main_model->rowdata(TBL_WEB_AMPHUR,$_where);
?>
<div class="intro">
  <h2 class="font-fair"><?=$res_pl->topic;?></h2>
</div>
<div class="card" >
  <ons-list-header class="list-header font-17" style="    padding: 5px 0px;
                   padding-left: 15px;">
    <span>ข้อมูลต้นสังกัด</span> 
  </ons-list-header>
  <table class="tb_form" width="100%" id="" style="display: nones;" cellpadding="3" cellspacing="3">
    <?php
    foreach ($STATION_FIELD as $row) {
      $field = $row->s_field_show;
      ?>
      <tr>
        <td width="41%" valign="top">
          <span class="font-17"><?=$row->s_topic_th;?> :</span>
        </td>
        <td>
          <?php if ($row->s_type_name == "number") {?>
            <a href="tel:<?=$OTHRET->$field;?>" class="font-17"><?=$OTHRET->$field;?></a>
          <?php
          }
          else {
            ?>
            <span class="font-17"><?=$OTHRET->$field;?></span>
          <?php }
          ?>
        </td>
      </tr>
      <?php
    }
    ?>
    <tr>
      <td width="40%" valign="top">
        <span class="font-17">จังหวัด :</span>
      </td>
      <td>
        <span class="font-17"><?=$PROVINCE->name_th;?></span>
      </td>
    </tr>
    <tr>
      <td width="40%" valign="top">
        <span class="font-17">อำเภอ/เขต  :</span>
      </td>
      <td>
        <span class="font-17"><?=$AMPHUR->name_th;?></span>
      </td>
    </tr>
    <tr>
      <td width="40%" valign="top">
        <span class="font-17"> วันที่สร้าง :</span>
      </td>
      <td>
        <span class="font-17"><?=date('Y-m-d',$OTHRET->post_date);?></span>
      </td>
    </tr>
  </table>
</div>