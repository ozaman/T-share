<?php
if ($this->Mobile_model->version('iPad')) {
  // Code to run for the Apple iOS platform.
  $detectname = 'iPad';
}
if ($this->Mobile_model->version('iPhone')) {
  // Code to run for the Apple iOS platform.
  $detectname = 'iPhone';
}
if ($this->Mobile_model->version('Android')) {
  // Code to run for the Apple iOS platform.
  $detectname = 'Android';
}
else {

  $detectname = 'Other';
}

if ($_GET[type] == "phone") {
  ?>
  <div style="margin-top: 0px;">
    <?php
    /*$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
    $res[contact] = $db->select_query("SELECT id,phone,name FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='phone' and status=1");
    while($arr[contact] = $db->fetch($res[contact])){ */ 
    $query = $this->db->query("SELECT id,phone,name,usertype FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='phone' and status=1");
    foreach ($query->result() as $row){
//      echo $row->id;
    ?>
    <a  href="tel://<?=$row->phone;?>"  id="tel"   style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none;">
      <div style="padding:5px; margin-top:10px; " class="div-all-zello"  >
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tbody>
            <tr>
              <td width="55"><i class="fa fa-phone-square" style="font-size:54px; color: #8DC63F; border:none"></i></td>
              <td>
                <table width="100%" border="0" cellpadding="2" cellspacing="0">
                  <tbody>
                    <tr>
                      <td>
                        <a  href="tel://<?=$row->phone;?>" style=" font-size:18px; margin-left:0px; padding:0px;   text-transform:uppercase; color:<?=$main_color?>; text-decoration:none;">
                          <b>   <?=$row->name;?> </b>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td><div style="color:#3333333"><?=$row->phone;?> </div></td>
                    </tr>
                    <tr>
                      <td style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none;">

                        <?php 
                        $_where = array();
                        $_where['id'] = $row->usertype; 
                        $_select = array('*');
                        $CONTACT_TYPE = $this->Main_model->rowdata(TBL_SHOPPING_CONTACT_TYPE,$_where);
                        ?>
                        <span><?=$CONTACT_TYPE->name_th;?></span>

                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </a>
    <?php } ?>
  </div>
  <?php }

  else if($_GET[type]=="zello"){ 
  ?>
  <div style="margin-top: 0px;">
    <?php
    /* $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
      $res[contact] = $db->select_query("SELECT id,channel,phone,name FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='zello'");
      while($arr[contact] = $db->fetch($res[contact])){ */
    $query = $this->db->query("SELECT id,channel,phone,name FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='zello' and status = 1");
    foreach ($query->result() as $row) {

      if ($detectname == 'iPad' or $detectname == 'iPhone' or $detectname == 'Other') {
        $href = $row->phone;
      }
      if ($detectname == 'Android') {
        $href = "zello://".$row->channel."?add_channel";
      }
      ?>

      <a href="<?=$href;?>"   style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none">
        <div style="padding:5px; margin-top:15px; " class="div-all-zello"  >
          <table width="100%" border="0" cellspacing="2" cellpadding="2">
            <tbody>
              <tr>
                <td width="120"><img src="../data/qrcode/zello/<?=$row->channel;?>.png?v=<?=time();?>"  width="100%"   border="0"       /></td>
                <td>
                  <table width="100%" border="0" cellpadding="2" cellspacing="2">
                    <tbody>
                      <tr>
                        <td><? if($detectname=='iPad' or  $detectname=='iPhone' or $detectname=='Other'){ ?>
                          <a  href="<?=$row->phone;?>"  id="booking_edit_<?=$row->id;?>"   target="_blank"   style="font-size:16px; margin-left:0px;  padding:0px;   text-transform:uppercase; color:<?=$main_color?>; text-decoration:none">
                            <b>    <?=$row->channel;?>
                          </a>
                          <? }   ?>
                          <? if($detectname=='Android' ){ ?>
                          <a  href="zello://<?=$row->channel;?>?add_channel"  id="booking_edit_<?=$row->id?>"   style=" font-size:18px; margin-left:0px; padding:0px;   text-transform:uppercase; color:<?=$main_color?>; text-decoration:none">
                            <b>   <?=$row->channel;?>
                          </a>
                          <? } ?></td>
                      </tr>
                      <tr>
                        <td style=" font-size:16px; margin-left:0px; padding:0px;   text-transform:uppercase; color:#000000; text-decoration:none"><?=$row->name;?></td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </a>
      <?php } ?>
    </div>
    <?php }

    else if($_GET[type]=="line"){ 
    ?>
    <div style="margin-top: 0px;">
      <?php
      /* $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
        $res[contact] = $db->select_query("SELECT id,channel,phone,name FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='zello'");
        while($arr[contact] = $db->fetch($res[contact])){ */
      $query = $this->db->query("SELECT id,line_id,phone,name,channel,usertype FROM shopping_contact  WHERE product_id='".$_GET[shop_id]."' and type='line' and status=1");
      foreach ($query->result() as $row) {
        $href = "line://ti/p/".$row->line_id;
        /* if($detectname=='iPad' or  $detectname=='iPhone' or $detectname=='Other'){ 
          $href = $row->phone;
          }
          if($detectname=='Android' ){
          $href = "zello://".$row->channel."?add_channel";
          } */
        ?>

        <a href="<?=$href;?>"   style=" font-size:16px; margin-left:0px; padding:0px;    color:#000000; text-decoration:none">
          <div style="padding:5px; margin-top:15px; " class="div-all-zello"  >
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tbody>
                <tr>
                  <td width="120" align="center"><img src="../data/qrcode/line/<?=$row->channel;?>.png?v=<?=time();?>"  width="150px"   border="0"       /></td>
                  <td>
                    <table width="100%" border="0" cellpadding="2" cellspacing="2">
                      <tbody>
                        <tr>
                          <td>
                            <a  href="<?=$href;?>"  style=" font-size:18px; margin-left:0px; padding:0px;  text-decoration:none;">
                              <b>   <?=$row->name;?> </b> <?=$row->line_id;?>
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td style=" font-size:16px; margin-left:0px; padding:0px; color:#000000; text-decoration:none"><?=$row->usertype;?></td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </a>
  <?php } ?>
</div>
<?php }
?>