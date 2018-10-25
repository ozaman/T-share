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
    $sql_country = "SELECT t2.s_country_code, t2.s_topic_th, t2.id as sci_id FROM shop_country_com_list_price_taxi as t1 left join shop_country_icon_taxi as t2 on t1.i_shop_country_icon = t2.id WHERE t1.id='".$book->plan_id."'    ";
    $query_country = $this->db->query($sql_country);
    $res_country = $query_country->row();
   $arr[project][id]=$_GET[id];

        $type= t_guest_registration;	
        $icon = 'icon-new-uniF116-6';	
        $action = 'check_guest_register';
        $txt_photo = t_please_take_guest_regis;

   ?>
<?php  
          $_where = array();
          $_where['i_shop'] = $book->program;

          $_select = array('*');

          $_order = array();
          $_order['id'] = 'asc';
          $data['region'] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_TAXI,$_where,$_select,$_order);
          ?>
<input type="hidden" value="<?=$res_country->sci_id;?>" id="sci_id" />  

<form name="form_checkin" id="form_checkin"   enctype="multipart/form-data">
<input type="hidden" value="<?=$book->plan_id;?>" id="plane_id_replan" name="plane_id_replan" />  
<ons-card >
	<table class="onlyThisTable" width="100%" border="0" align="center" cellpadding="3" cellspacing="5" style="margin-top: 0px;" >
      <tr>
         <td align="center" class="font-26" style="text-align: center;"><i class="<?=$icon;?>" style=" font-size:80px; color: #3b5998;"></i></td>
      </tr>
      <tr>
         <td align="center" class="font-26" style="text-align: center;"><b>คุณแน่ใจหรือไม่ </b></td>
      </tr>
      <tr>
         <td align="center" class="font-22" style="text-align: center;"> <?=$type;?></td>
      </tr>
   </table>
   
      <div class="form-group">
         <label class="form-label">กรุณาป้อนจำนวนแขกที่ลงทะเบียน</label>
         <div class="center list-item__center">
            <input name="num_cus" id="num_cus" placeholder="ยืนยันจำนวน" oninput="maxLengthCheck(this)" type="number" pattern="\d*" maxlength="4" min="1" class="text-input form-control" value="<?=$book->pax;?>" > 
         </div>
      </div>

   
</ons-card>

<div style="margin: 20px 10px">
   <ons-button type="button" class="button-margin button button--large" onclick="changePlan('<?=$_GET[id];?>');" data-check="0" >เปลี่ยนค่าตอบแทน</ons-button>
</div>

<div class="card replan" id="nation_box" style="display: none;">
           <ons-list-header class="list-header "> เลือกสัญชาติ</ons-list-header>
           <div class="form-group">
            <?php 
            foreach($data['region'] as $key=>$val){

              $_where = array();
              $_where['i_shop_country'] = $val->id; 
              $_select = array('*');
              $_order = array();
              $_order['id'] = 'asc';
              $arr[region_icon] = $this->Main_model->fetch_data('','',TBL_SHOP_COUNTRY_ICON_TAXI,$_where,$_select,$_order);
              if($res_country->sci_id==$val->id){
              		$checked_nation = "checked";
			  }else{
			  		$checked_nation = "";
			  }
              ?>
              <label class="" for="radio-nation-ck<?=$key+1;?>" onclick="getPlanBox('<?=$val->id;?>','<?=$book->plan_id;?>');">
                <ons-list-item tappable id="nation_<?=$key+1;?>">
                  <label class=" left">
                    <ons-radio class="radio-fruit " id="nation_<?=$val->id;?>" input-id="radio-nation-ck<?=$val->id;?>" value="<?=$val->id;?>" name="nation" onchange="" <?=$checked_nation;?>></ons-radio>
                  </label>
                  <?php

                  foreach($arr[region_icon] as $key2=>$val2){

                    ?>
                    <div class="col-md-3">
                      <img src="assets/images/flag/icon/<?=$val2->s_country_code;?>.png" width="25" height="25" alt="">&nbsp; <span class=" font-17"><?=$val2->s_topic_th;?></span>
                    </div>




                  <?php }?>

                </ons-list-item>
              </label>
            <?php }?>

          </div>
        </div>
<div class="card replan" id="box_com"  style="display: none;" >
          <!-- Agent Issu -->  
          <div class="" id="show_payment_detail" style="">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td>
                    <ons-list-header class="list-header"> เลือกค่าตอบแทน</ons-list-header>

                  </td>
                  <td width="50" style="display: none;" id="row_accept_payment">

                  </td>
                </tr>
              </tbody>
            </table>
            <input type="hidden" value="" name="price_plan" id="price_plan">

            <div id="box_price_replan">  </div>
      </div>
</div>

<ons-card class="replan" style="display: none;">
	 <ons-list-header class="list-header">สาเหตุ</ons-list-header>
	 <ons-list>
	    <ons-list-item tappable>
	      <label class="left">
	        <ons-radio name="cause_change" input-id="radio-1" value="0" checked></ons-radio>
	      </label>
	      <label for="radio-1" class="center">เที่ยวบินภายในประเทศ (ป้ายฟ้า)</label>
	    </ons-list-item>
	    <ons-list-item tappable>
	      <label class="left">
	        <ons-radio name="cause_change" input-id="radio-2"  value="1"></ons-radio>
	      </label>
	      <label for="radio-2" class="center">เวลาเที่ยวบินไม่พอ (ป้ายฟ้า)</label>
	    </ons-list-item>
	    <ons-list-item tappable>
	      <label class="left">
	        <ons-radio name="cause_change" input-id="radio-3"  value="2"></ons-radio>
	      </label>
	      <label for="radio-3" class="center">แขกไม่มีเที่ยวบิน (ป้ายฟ้า)</label>
	    </ons-list-item>
	    <ons-list-item tappable>
	      <label class="left">
	        <ons-radio name="cause_change" input-id="radio-4"  value="3"></ons-radio>
	      </label>
	      <label for="radio-4" class="center">แขกต่างชาติ</label>
	    </ons-list-item>
	    <ons-list-item tappable>
	      <label class="left">
	        <ons-radio name="cause_change" input-id="radio-4"  value="4"></ons-radio>
	      </label>
	      <label for="radio-4" class="center">แขกต่างชาติ</label>
	    </ons-list-item>
  </ons-list>
</ons-card>

<div style="margin: 20px 10px">
   <ons-button type="button" modifier="outline" class="button-margin button button--outline button--large" onclick="sendCheckIn('<?=$_GET[id];?>','<?=$_GET[type];?>');" style="background-color: #fff;">ยืนยันแขกลงทะเบียน</ons-button>
</div>
</form>
<script type="text/javascript">
   setTimeout(function(){ $('#num_cus').focus(); 
   }, 1000);
</script>