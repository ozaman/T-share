<div style="padding: 0px 0px;">
  <ons-list-header class="list-header">เลือกบัญชีรับเงิน</ons-list-header>
  <ons-button style="padding: 0px 10px;margin: 10px 0px 0px 10px;" onclick="manageBankFormShop();">จัดการบัญชี</ons-button>
  <?php
  $sql = "SELECT t1.*,t2.name_th as bank_list, t2.img as bank_img FROM web_bank_driver as t1 left join web_bank_list as t2 on t1.bank_id = t2.id where t1.driver_id = ".$_COOKIE[detect_user]." and t1.status = 1 order by status_often desc, status desc ";
  $query_bank = $this->db->query($sql);
  $num_bank = $query_bank->num_rows();
  if ($num_bank <= 0) {
    ?>
    <div style="padding: 10px;">
      <span class="font-18">คุณไม่มีบัญชี</span> 
      <button type="button" onclick="addBank('shop_add');" class="button" style="padding: 0px 7px;background-color: #42a774;">
        <span class="font-17">เพิ่มบัญชี</span>
      </button>
    </div>

    <?php
  }
  if ($num_bank == 1) {
    $row = $query_bank->row();
    ?>
    <ons-list-item tappable onclick="selectBankForCom('<?=$row->id;?>');">
      <label class="left">
        <ons-radio class="radio-fruit" checked input-id="radio-<?=$row->id;?>" value="<?=$row->id;?>" name="bank_user_select" <?=$checked;?> ></ons-radio>
      </label>
      <label for="radio-<?=$row->id;?>" class="center">
        <table width="100%">
          <tr>
            <td width="30"><img src="assets/images/bank/<?=$row->bank_img;?>" class="logo-bank" style="width: 20px;"></td>
            <td width="100"><span class="font-17"><?=$row->bank_list;?></span></td>
            <td><span class="font-17"><?=$row->bank_number;?></span></td>
          </tr>
        </table>
      </label>
    </ons-list-item>
    <?php
  }
  else {
    foreach ($query_bank->result() as $row) {
      if ($row->status_often == 1) {
        $checked = "checked";
      }
      else {
        $checked = "";
      }
      ?>
      <ons-list-item tappable onclick="selectBankForCom('<?=$row->id;?>');">
        <label class="left">
          <ons-radio class="radio-fruit" input-id="radio-<?=$row->id;?>" value="<?=$row->id;?>" name="bank_user_select" <?=$checked;?> ></ons-radio>
        </label>
        <label for="radio-<?=$row->id;?>" class="center">
          <table width="100%">
            <tr>
              <td width="30"><img src="assets/images/bank/<?=$row->bank_img;?>" class="logo-bank" style="width: 20px;"></td>
              <td width="100"><span class="font-17"><?=$row->bank_list;?></span></td>
              <td><span class="font-17"><?=$row->bank_number;?></span></td>
            </tr>
          </table>
        </label>
      </ons-list-item>
      <?php
    }
  }
  ?>
</div>

<script>
  function selectBankForCom(bank_id) {
    $('#radio-fruit').prop('checked', false);
    $('#radio-' + bank_id).prop('checked', true);
  }
  
  function manageBankFormShop(){
    myAccountBank('shop_add');
  }
</script>