<?php
$_where = array();
$_where['id'] = $_GET[id]; 
$_select = array('*');
$book = $this->Main_model->rowdata(TBL_ORDER_BOOKING,$_where);
// print_r( $book);
if($book->price_park_unit != 0){
  $park_total = number_format($book->price_park_unit,2);
  $display_park = "";
}else{
  $display_park = "display:none";
}

if($book->price_person_unit != 0){
  $person_total = number_format(intval($book->price_person_unit) * intval($book->pax_regis),2);
  $cal_person = $book->price_person_unit."*".$book->pax_regis;
  $display_person = "";
}else{
  $display_person = "display:none";
}
$total_price_all = number_format($book->price_park_unit + (intval($book->price_person_unit) * intval($book->pax_regis)),2);

if($book->commission_persent != 0){
  $display_com = "";
  $com_persent = $book->commission_persent;
  $total_price_all = '<span style="padding-left: 0px;"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i>&nbsp;<font color="#FF0000">รอดำเนินการ</font></span>';
}else{
  $display_com = "display:none";
  
}

$query_price = $this->db->query("select * from shop_country_com_list_price_taxi where i_shop_country_com_list = '".$book->plan_id."' ");
$num = 0;
foreach ($query_price->result() as $row_price){
  if($num>=1){
    $push = " + ";
  }else{
    $push = "";
  }
  $plan .= $push.$row_price->s_topic_th;
  $num++;
  
  if($row_price->s_topic_en=="park"){
    $check_type_park = 1;
  }
  
  if($row_price->s_topic_en=="person"){
    $check_type_person= 1;
  }  
  
  if($row_price->s_topic_en=="comision"){
    $check_type_com = 1;
    if($book->total_commission>0){
      
    }
  }  
}

$sql_country = "SELECT t2.s_country_code, t2.s_topic_th FROM shop_country_com_list_price_taxi as t1 left join shop_country_icon_taxi as t2 on t1.i_shop_country_icon = t2.id WHERE t1.id='".$book->plan_id."'    ";
$query_country = $this->db->query($sql_country);
$res_country = $query_country->row();

$arr[project][id]=$_GET[id];
if($_GET[type]=='driver_topoint'){		
  $type= t_place_of_delivery;		
  $icon = 'icon-new-uniF12D-1';
  $action = 'check_driver_topoint';
  $txt_photo = t_please_take_photo_drop_place;
}
else if($_GET[type]=='guest_receive'){		
  $type= t_reception;
  $icon = 'icon-new-uniF159-5';	
  $action = 'check_guest_receive';
  $txt_photo = t_please_take_recep_photo;
} 
else if($_GET[type]=='guest_register'){		
  $type= t_guest_registration;	
  $icon = 'icon-new-uniF116-6';	
  $action = 'check_guest_register';
  $txt_photo = t_please_take_guest_regis;
} 
else if($_GET[type]=='driver_pay_report'){		
 $type= t_income_statement;		
 $icon = 'icon-new-uniF121-10';
 $action = 'check_driver_pay_report';
 $txt_photo = t_take_photo_income_slip;
}

?>
<table class="onlyThisTable" width="100%" border="0" cellpadding="1" cellspacing="5" id="table_show_income_driver">
  
  <tr>
    <td width="110"><span class="font-17">ประเภท</span></td>
    <td colspan="2"><span class="font-17" id="txt_type_plan"><?=$plan;?></span></td>
  </tr>
  <tr>
    <td width="110"><span class="font-17">สัญชาติ</span></td>
    <td colspan="2">
      <table>
        <tr>
          <td>
            <img src="<?=base_url();?>assets/images/flag/icon/<?=$res_country->s_country_code;?>.png" width="25" height="25" alt="">
          </td>
          <td>&nbsp;</td>
          <td><span class="font-17" id="txt_county_pp"><?=$res_country->s_topic_th;?></span></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr style="<?=$display_park;?>">
    <td width="110"><span class="font-17">ค่าจอด</span></td>
    <td align="right"><span class="font-17" id="txt_park_total"><?=$park_total;?></span></td>
    <td width="15%"><span class="font-17">บาท</span></td>
  </tr>
  <tr style="<?=$display_person;?>">
    <td width="110"><span class="font-17">ค่าหัว</span></td>
    <td align="right"><span class="font-17" id="txt_person_total"><?=$cal_person;?> = <?=$person_total;?></span></td>
    <td width="15%"><span class="font-17">บาท</span></td>
  </tr>
  <tr style="<?=$display_com;?>">
    <td width="110"><span class="font-17">ค่าคอม</span></td>
    <td align="right"><span class="font-17" id="txt_com_persent"><?=$com_persent;?> %</span>
    </td>
    <td width="15%">
    </td>
  </tr>
  <tr>
    <td  width="110">รวม</td>
    <td align="right">
      <span class="16" id="txt_all_total">
        <?=$total_price_all;?>
      </span>
    </td>
    <td width="90">
      <span class="font-17">บาท</span>
    </td>
  </tr>
</table>