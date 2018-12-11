<?php
$i_d_next = date('w');
$weekdays = Array();
$weekdays[0] = "Sun";
$weekdays[1] = "Mon";
$weekdays[2] = "Tue";
$weekdays[3] = "Wed";
$weekdays[4] = "Thu";
$weekdays[5] = "Fri";
$weekdays[6] = "Sat";
$weekdays2 = Array();
$weekdays2[0] = "วันอาทิตย์";
$weekdays2[1] = "วันจันทร์";
$weekdays2[2] = "วันอังคาร";
$weekdays2[3] = "วันพุธ";
$weekdays2[4] = "วันพฤหัส";
$weekdays2[5] = "วันศุกร์";
$weekdays2[6] = "วันเสาร์";

foreach ($place_company as $data) {
  $_where = array();
  $_where['id'] = $data->province;
  $_select = array('*');
  $data_pv = $this->Main_model->rowdata(TBL_WEB_PROVINCE,$_where);
  $arr_where = array();
  $arr_where['status'] = 1;
  $arr_where['product_id'] = $data->id;
  $arr_where['product_day'] = $weekdays[date('w')];
  $arr_select = array('finish_h','finish_m','start_h','start_m',);
  $datatime = $this->Main_model->fetch_data('','',TBL_SHOPPING_OPEN_TIME,$arr_where,$arr_select,'');
  $_where = array();
  $_where['id'] = $data->sub;
  $_select = array('topic_th');
  $SUB = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_SUB,$_where);
  $_where['id'] = $data->main;
  $_select = array('topic_th');
  $MAIN = $this->Main_model->rowdata(TBL_SHOPPING_PRODUCT_MAIN,$_where);
  $_where['id'] = $data->amphur;
  $_select = array('topic_th');
  $aumper = $this->Main_model->rowdata(TBL_WEB_AREA,$_where);
  ?>
  <div class="card shop_company_box_<?=$data->id;?>" id="shop_company_box_<?=$data->id;?>" >
    <input value="107" id="comshop_id" name="check_use_car_id" value="<?=$data->id;?>" type="hidden">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom : 0px solid #DADADA;" id="row_place_<?=$data->id;?>">
      <tr>
        <td width="130">
          <?php
          $url = "../data/pic/place/".$data->pic_logo;
          if ( file_exists($url) != 1 || $data->pic_logo == ''){
           $images_url =  base_url().'assets/images/noimage_2.gif';
         }
         else{
           $images_url =  $url;
         }
         ?>
         <img class="chat_gallery_items" src="<?=$images_url;?>"  onclick="chat_gallery_items(this)" data-high-res-src="<?=$images_url;?>" alt="" style="box-shadow: 1px 1px 3px #333333;border-radius:  8px; border: 1px solid #ddd;height: 65px;width: 110px; ">
       </td>
       <td valign="top">
        <strong class="font-19"  style="color:#3b5998" ><span class="txt_topic_company " data-search="<?=$data->topic_th. " ".$data->topic_cn." ".$data->topic_en;?>  " data-role="<?=$data->id;?>"> <?=$data->topic_th;?> </span></strong><br>
        <span class="font-17"><?=$MAIN->topic_th;?>(<span class="font-17" ><?=$SUB->topic_th;?> </span>)</span><br/>
        <span class="font-17" style="color: #00000087;"><?=$data_pv->name_th;?> / <?=$aumper->name_th;?></span>

        
        <input type="hidden" id="check_click_1" value="0">
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <div class="element_to_find" align="center" style="margin-top: 10px;">
          <input type="hidden" name="" id="shop_topic_th" value="คิงส์ พาวเวอร์ (ภูเก็ต)">
          <input type="hidden" value=" " id="1">
        </div>
      </td>
    </tr>
  </table>
  <table width="100%">
    <tr>
      <td width="50%" valign="top" >
        <ons-button onclick="fun_imageslider('<?=$data->id;?>');" style="padding: 15px;border: 1px solid #0076ff; border-radius: 5px;
        line-height: 0; " modifier="outline" class="button-margin button button--outline button--large">
        <span class="font-17 text-cap"> ข้อมูล</span> 
      </ons-button>
    </td>
    <td width="50%">
      <ons-button modifier="outline" onclick="checkPricePlan('<?=$data->id;?>');" class="button-margin button button--outline button--large" style="padding: 15px;border: 1px solid #0076ff;
      border-radius: 5px;
      line-height: 0; ">
      <span class="font-17 text-cap">ส่งแขก</span> </ons-button>
    </td>
  </tr>
</table>
</div>
<?php
}
?>