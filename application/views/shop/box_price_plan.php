 <?php
 $_where = array();
 $_where['i_shop_country_icon'] = $_GET[i_country];
 $_select = array('*');
 $_order = array();
 $_order['id'] = 'asc';
 $data['list_plan'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST,$_where,$_select,$_order);

 ?>
 <input name="plan_setting" type="hidden" class="form-control" id="plan_setting" value="<?=$_GET[i_country];?>">
 <?php

 foreach($data['list_plan'] as $key=>$val){

  $_where = array();
  $_where['i_shop_country_com_list'] = $val->id;
  $_select = array('*');
  $_order = array();
  $_order['id'] = 'asc';
  $data['list_price'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_COM_LIST_PRICE,$_where,$_select,$_order);
  ?>
  <div style=" border-bottom: dotted #999999 1px;padding: 10px 0px;"  class="nation_china">
    <label class="center" for="price_plan_<?=$val->id;?>">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td  valign="top" width="30" rowspan="2" align="center" style="display: nones;">
              <label class="left list-item__left" style="padding-top: 0">
                <ons-radio class="radio-fruit radio-nation" input-id="price_plan_<?=$val->id;?>" value="1" name="price_plan" ></ons-radio>
              </label>
            </td>
            <td class="font-17">
              <?php
              foreach($data['list_price'] as $key3=>$val2){
                if (count($data['list_price']) == 2) {
                  if ($key3 == 0) {
                     $count = '+';
                  }
                  else{
                    $count = '';
                  }
                 
                }
                else{
                  $count = '';

                }
                ?>
                <span style=""><?=$val2->s_topic_th;?> <?=$count;?> </span>
                <!-- <span style="display:show">หัว  200&nbsp;</span> -->
              <?php }?>
            </td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                  <tr>
                    <td  class="font-17" > 
                      <?php 
                      $_where = array();
                      $_where['i_shop_country'] = $_GET[i_country]; 
                      $_select = array('*');
                      $arr[region_icon] = $this->Main_model->rowdata(TBL_SHOP_COUNTRY_ICON,$_where);
                       $_where = array();
                      $_where['id'] = $arr[region_icon]->i_country; 
                      $_select = array('name_th');
                      $arr[country] = $this->Main_model->rowdata(TBL_WEB_COUNTRY,$_where);
                      ?>

                      <img src="assets/images/flag/icon/<?=$arr[region_icon]->s_country_code;?>.png" align="absmiddle" width="25" height="25" alt="" >
                      <span >&nbsp;<?=$arr[country]->name_th;?>  </span>
                      
                    </td>
                    <td></td>
                  </tr>
                  <tr>

                    
                    <td>
                      <table width="100%">
                        <?php 
                      foreach($data['list_price'] as $key=>$val2){
                        if ($val2->s_payment == 'โอน') {
                          $curen = '%';
                        }
                        else{
                          $curen = 'บ.';
                        }
                        ?>
                        <tr>
                          <td>
                            <table width="100%">
                              <tr>
                                <td width="64"><span><?=$val2->s_topic_th;?></span></td>
                                <td align="left"><span><?=$val2->i_price;?>&nbsp;&nbsp;<?=$curen;?></span></td>
                                <td width="64"><span><?=$val2->s_payment;?></span></td>
                              </tr>
                            </table>
                            
                          </td>
                        </tr>
                        
                        <!-- <span style="display:show">หัว  200&nbsp;</span> -->
                      <?php }?>
                      </table>
                    </td>
                    <td>
                      
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </label>
  </div>
<?php } ?>


<script >
   setTimeout(function() {
  var chk = '<?=count($data['list_price']);?>';
  if ( chk == 1 ) {
    $('#box_com').removeClass('borderBlink');
  }
   }, 1000);
</script>
