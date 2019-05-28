<?php
$select = "SELECT t1.*, t2.txt_color,t2.plate_color, t3.name_th as car_type_txt,t3.id as id_use_type, tb_pro.id as tb_pro_id, tb_pro.name as tb_pro_name, tb_pro.name_th as tb_pro_name_th, tb_pro.name_cn as tb_pro_name_cn FROM web_carall as t1 left join web_province as tb_pro on t1.i_province = tb_pro.id    left join web_car_plate as t2 on t1.i_plate_color = t2.id left join web_car_use_type as t3 on t1.car_type = t3.id where t1.drivername  = '".$_COOKIE['detect_user']."' AND t1.status = 1 ORDER BY t1.status_usecar  DESC";
$query = $this->db->query($select);
$i = 1;
//               echo '<pre>';
// print_r($query->result());
// echo '</pre>';
if ($query->num_rows() >= 1) {
  foreach ($query->result() as $key => $val) {

    $bg_plate_color = "background-color: ".$val->plate_color;
    ?>
    <a id="car_<?=$val->id;?>" class="a-select-car" style="text-decoration:none; margin-top:30px;" >
      <input type="hidden" id="value_car_<?=$val->id;?>" data-plate_num="<?=$val->plate_num;?>" />
      <?php
      if ($val->status_usecar == 1) {
        $calss_box = 'cus_focus';
      }
      else {
        $calss_box = '';
      }
      ?>
      <table width="100%" border="0" id="div_car_<?=$val->id;?>" class="<?=$calss_box;?> box_car" style="border: 0px solid #ddd;" >
        <tbody>
          <tr>
            <td width="30" onclick="checformadd('box_car');selectCarShops('<?=$val->id;?>', '<?=$val->car_type;?>', '<?=$val->car_type_txt;?>');
                handleClick_s('car', '<?=$val->id;?>');">
                  <?php
                  if ($val->status_usecar == 1 && count($query->result()) == 1) {
                    ?>
                <script>

                  $('#box_car').removeClass('borderBlink')
                  $('#nation_box').addClass('borderBlink')

                  selectCarShops('<?=$val->id;?>', '<?=$val->car_type;?>', '<?=$val->car_type_txt;?>');
                </script>
          <ons-radio class="radio-fruit" input-id="radio-plate_num<?=$val->id;?>" id="car_use_<?=$val->id;?>" value="<?=$val->id;?>" name="plate_num_1"   checked></ons-radio>

          <?php
        }
        else {
          ?>
          <ons-radio class="radio-fruit" input-id="radio-plate_num<?=$val->id;?>" id="car_use_<?=$val->id;?>" value="<?=$val->id;?>" name="plate_num_1"  ></ons-radio>


        <?php }
        ?>
        </td>
        <td onclick="checformadd('box_car');selectCarShops('<?=$val->id;?>', '<?=$val->car_type;?>', '<?=$val->car_type_txt;?>');
            handleClick_s('car', '<?=$val->id;?>');">
          <table width="100%" cellpadding="1" cellspacing="2">
            <tbody>
              <tr>
                <td width="100" align="center" style="padding:1px; border-radius:5px;<?=$bg_plate_color;?>">
                  <div style="border-radius:5px;border: 1px solid <?=$val->txt_color;?>;"><font color="<?=$val->txt_color;?>" class="font-17"><b><?=$val->plate_num;?></font><br>
                      <font class="font-14" style="color: <?=$val->txt_color;?>"><?=$val->tb_pro_name_th;?></font></b></font></div>
                </td>
              </tr>
            </tbody>
          </table>

        </td>
        <td width="45">
          <button onclick="editCar('<?=$val->id;?>', 'shop_add');" type="button" class="button--cta" style="padding: 0px 7px;"><span class="font-16">แก้ไข</span></button>
        </td>
        </tr>
        </tbody>
      </table>
    </a>    
    <?php
    $i++;
  }
}
?>
<input type="hidden" name="" id="numcar" value="<?=count($query->result());?>">