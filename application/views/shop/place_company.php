
<div class="card">

  <ons-search-input placeholder="ค้นหาจากชื่อ" style="width: 100%; margin-bottom: 10px;" onkeyup="searchTopiccompany(this.value);">
    <input type="search" class="search-input font-17" placeholder="ค้นหา" id="search_info_topic" style="height: 35px;">
  </ons-search-input>

  <!-- </div>
  <div class="card"> -->
  <ons-list-item class="input-items list-item  button button--outline" 
                 style="margin-bottom: 10px;" onclick="shop_filter_pv();">
    <div class="left list-item__left" style="width: 80px;" id="car_brand_txt">
      <span>จังหวัด </span>
      <?php // print_r($_GET[pv_text]); ?>
    </div>
    <div class=""  id="car_brand_box" style="    background-image: none;
         padding: 0px;
         width: 100%;">

      <span class="brand-small list-item__thumbnail" id="img_car_brand_show" style="margin-right: 10px;display: none;"></span>
      <span id="txt_province"><?=$_GET[pv_text];?></span>
      <!-- <input type="hidden" name="shop_category" id="shop_category" value=""> -->
      <!-- <input type="hidden" name="car_brand_txt" id="car_brand_txt_input" value=""> -->
    </div>
  </ons-list-item>
  
  <ons-list-item class="input-items list-item  button button--outline" 
                 style="    margin-bottom: 10px;" onclick="shop_filter_main();">
    <div class="left list-item__left" style="width: 80px;" id="car_brand_txt">
      <span>หมวดหมู่ </span>
    </div>
    <div class=""  id="car_brand_box" style="    background-image: none;
         padding: 0px;
         width: 100%;">

      <span class="brand-small list-item__thumbnail" id="img_car_brand_show" style="margin-right: 10px;display: none;"></span>
      <span id="txt_shopcategory">เลือก</span>
      <!-- <input type="hidden" name="shop_category" id="shop_category" value=""> -->
      <!-- <input type="hidden" name="car_brand_txt" id="car_brand_txt_input" value=""> -->
    </div>
  </ons-list-item>
  <!-- </div>
  <div class="card"> -->
  <ons-list-item class="input-items list-item  button button--outline" 
                 onclick="shop_filter_sub();">
    <div class="left list-item__left" style="width: 80px;" id="car_brand_txt">
      <span>ประเภท </span>
    </div>
    <div class=""  id="car_brand_box" style="    background-image: none;
         padding: 0px;
         width: 100%;">

      <span class="brand-small list-item__thumbnail" id="img_car_brand_show" style="margin-right: 10px;display: none;"></span>
      <span id="txt_shoptype">เลือก</span>
      <!-- <input type="hidden" name="car_brand" id="car_brand" value=""> -->
      <!-- <input type="hidden" name="car_brand_txt" id="car_brand_txt_input" value=""> -->
    </div>
  </ons-list-item>
</div>
<div id="shop_all_company">

</div>
<style>
  .btn_detail{
    margin-top: 20px;
    float: right;
    display: nones;
    background-color: #2f8efe;
    color: #fff;
    border-radius: 10px;
    padding: 4px 6px;
  }
</style>  
<script type="text/javascript">

  function selectCarShops(id, cartype, car_type_txt) {
    console.log('--------------------------')
    console.log(id + '-' + cartype + '-' + car_type_txt)
    $('input[type="checkbox"]').prop('checked', false); // Unchecks it
    $('#car_use_' + id).prop('checked', true); // Checks it
    var plate_num = $('#value_car_' + id).data('plate_num');
    $('#car_type').val(cartype);

    console.log(plate_num);
    $('#car_plate').val(plate_num);
    $('#car_id').val(id);
    $('#txt_car_type').val(car_type_txt);
  }



</script>
