<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
      if($this->Mobile_model->version('iPad')){
          // Code to run for the Apple iOS platform.
          $fontmobile=0;
          $detectname='iPad';
          $menu_ion_class = "icon-menu-ios";
          $border_menu_color = "#ccc";
      }
      if($this->Mobile_model->version('iPhone')){
          // Code to run for the Apple iOS platform.
          $fontmobile=0;
          $detectname='iPhone';
          $menu_ion_class = "icon-menu-ios";
          $border_menu_color = "#ccc";
      }
      if($this->Mobile_model->version('Android')){
          // Code to run for the Apple iOS platform.
          $fontmobile=6;
          $detectname='Android';
          $menu_ion_class = "icon-menu-android";
          $border_menu_color = "#eee";
      }
      else {
          $fontmobile=6;  
          $detectname='Other';
          $menu_ion_class = "icon-menu-ios";
          $border_menu_color = "#ccc";
      }
      $border_menu_color = "border-bottom: 0px solid ".$border_menu_color;
      $v = "1";
      ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>TShare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/ultimate/flaticon.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/airport/flaticon.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/payment/css/fontello.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/icomoon/demo-files/demo.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app/css/app-icon.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app-new/css/app-icon.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/extra.main.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/custom.css?v=<?=$v;?>" />
    <link rel="stylesheet" href="<?=base_url();?>assets/imageViewer/imageviewer.css?v=<?=$v;?>" />
    <!-- <link href="<?=base_url();?>assets/imageViewer/easy-autocomplete.min.css" rel="stylesheet" type="text/css"> -->
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/onsenui.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/onsen-css-components.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/plugin/jquery-ui.css?v=<?=time()?>" />
</head>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?=base_url();?>assets/onsenui/js/onsenui.min.js?v=<?=time()?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="<?=base_url();?>assets/plugin/moment.js?v=<?=time()?>"></script>
<script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>
<script src="<?=base_url();?>assets/EasyAutocomplete/jquery.easy-autocomplete.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/plugin/jquery-ui.js?v=<?=time()?>"></script>
<script src="<?=base_url();?>assets/imageViewer/imageviewer.js?v=<?=time()?>"></script>
<script type="text/javascript">
    var base_url = '<?=base_url();?>';
</script>
<!-- <script src="<?=base_url();?>assets/script/wwwww.js?v=<?=time()?>"></script> -->
<script src="https://www.welovetaxi.com:3443/socket.io/socket.io.js?v=<?=time()?>"></script>
<script type="text/javascript">
    var roomOpen = false;
    setTimeout(function() {
        var dataorder = {
            order: '<?=$_COOKIE[detect_user];?>',
        };
        socket.emit('adduser', dataorder);
    }, 1000);
</script>
<ons-modal direction="up" id="modal_load">
    <div style="text-align: center;">
        <p sty>
            <ons-icon icon="md-spinner" size="25px" spin></ons-icon>
            <span size="18px">Loading...</span>
        </p>
    </div>
</ons-modal>
<script>
    var modal = document.querySelector('#modal_load');
      modal.show();
      var today = "<?=date('Y-m-d');?>";
      var detect_mb = "<?=$detectname;?>";
      var detect_user = $.cookie("detect_user");
      var class_user = $.cookie("detect_userclass");
      var username = $.cookie("detect_username");
      console.log(detect_mb+" : "+class_user+" : "+username);
      if(class_user=="acc" || class_user == 'monitor'){
          window.location = "../T-admin";
        }
      if(username=="" || typeof username == 'undefined'){
          window.location = "<?=base_url();?>login";
      }else{
          username = username.toUpperCase();
      }
      var get_order_id = '<?=$_GET[order_id];?>';
      var status = '<?=$_GET[status];?>';
      var open_ic = '<?=$_GET[open_ic];?>';
      var progress_circle = '<div align="center" style="margin: 20%;"><svg style="height: 72px;width: 72px;" class="progress-circular progress-circular--indeterminate">'
      +'<circle class="progress-circular__background"/>'
      +'<circle class="progress-circular__primary progress-circular--indeterminate__primary"/>'
      +'<circle class="progress-circular__secondary progress-circular--indeterminate__secondary"/>'
      +'</svg></div>';      
   </script>
<style>
    .icon-menu-ios{
      margin-left: 7px;
      padding-right: 10px;
      }
      .icon-menu-android{
      margin-left: 7px;
      padding-right: 20px;
      }
      ons-splitter-side[animation=overlay] {
      border-left: 1px solid #bbb;
      }
      .dialog{
      min-height: 460px !important;
      }
      .fa-bell{
      font-size: 20px !important;
      }
   </style>
<body>
  xxxx
</body>
</html>
<script>
    window.fn = {};
   var welcom_modal = document.querySelector('#welcome_modal');
   var hideCustomDialog = function(id) {
       document
       .getElementById(id)
       .hide();
   };
   window.fn = {};
   window.fn.toggleMenu = function() {
//     console.log('************************')
     document.getElementById('appSplitter').left.toggle();
   };
   window.fn.loadView = function(index) {
     document.getElementById('appTabbar').setActiveTab(index);
     document.getElementById('sidemenu').close();
   };
   window.fn.loadLink = function(url) {
     window.open(url, '_blank');
   };
   var chkpage = false;
   window.fn.popPage = function() {
   var content = document.getElementById('appNavigator');
//   console.log(content)
   // content.popPage();
   };
   window.fn.pushPage = function(page, anim) {
     console.log(page);
     if(page.id=="option.html"){
         console.log("option");
         if(page.open=="car_brand"){
             $.ajax({
                 url: "main/data_car_brand", // point to server-side PHP script 
                 dataType: 'json', // what to expect back from the PHP script, if anything
                 type: 'post',
                 success: function(res) {
                     var d1 = [],d2 = [];
                     $.each(res, function( index, value ) {
                         if(value.popular>0){
                             d1.push(value);
                         }else{
                             d2.push(value);
                         }
                     });
                     var param = { data2 : d2, data1 : d1};
//                     console.log(param);
                     $.post("component/cpn_car_brand",param,function(el){
                         $('#body_option').html(el);
                     });
                 }
             });
         }
         else if(page.open=="car_type"){
             $.ajax({
                 url: "main/data_car_type", // point to server-side PHP script 
                 dataType: 'json', // what to expect back from the PHP script, if anything
                 type: 'post',
                 success: function(res) {    
                     var param = { data : res };
//                     console.log(param);
                     $.post("component/cpn_car_type",param,function(el){
                         $('#body_option').html(el);
                     });
                 }
             });
         }
         else if(page.open=="car_color"){
             $.ajax({
                 url: "main/data_car_color", // point to server-side PHP script 
                 dataType: 'json', // what to expect back from the PHP script, if anything
                 type: 'post',
                 success: function(res) {    
                     var param = { data : res };
//                     console.log(param);
                     $.post("component/cpn_car_color?plate=0",param,function(el){
                         $('#body_option').html(el);
                     });
                 }
             });
         }
         else if(page.open=="plate_color"){
             $.ajax({
                 url: "main/data_car_plate", // point to server-side PHP script 
                 dataType: 'json', // what to expect back from the PHP script, if anything
                 type: 'post',
                 success: function(res) {    
                     var param = { data : res };
//                     console.log(param);
                     $.post("component/cpn_car_plate",param,function(el){
                         $('#body_option').html(el);
                     });
                 }
             });
         }
         else if(page.open=="car_province"){
             $.ajax({
                 url: "main/data_car_province", // point to server-side PHP script 
                 dataType: 'json', // what to expect back from the PHP script, if anything
                 type: 'post',
                 success: function(res) {    
//                     console.log(res);
                     var param = { data : res };
//                     console.log(param);
                     $.post("component/cpn_user_province?type=car",param,function(el){
                         $('#body_option').html(el);
                     });
                 }
             });
         }
         else if(page.open=="user_province"){
             $.ajax({
                 url: "main/data_user_province", // point to server-side PHP script 
                 dataType: 'json', // what to expect back from the PHP script, if anything
                 type: 'post',
                 success: function(res) {    
//                     console.log(res);
                     var param = { data : res };
//                     console.log(param);
                     $.post("component/cpn_user_province?type=user",param,function(el){
                         $('#body_option').html(el);
                     });
                 }
             });
         }
         else if(page.open=="bank_list"){
             $.ajax({
                 url: "main/data_bank_list", // point to server-side PHP script 
                 dataType: 'json', // what to expect back from the PHP script, if anything
                 type: 'post',
                 success: function(res) {    
//                     console.log(res);
                     var param = { data : res };
//                     console.log(param);
                     $.post("component/cpn_bank_list",param,function(el){
                         $('#body_option').html(el);
                     });
                 }
             });
         }
         else if(page.open=="car_ins"){
             $.ajax({
                 url: "main/data_car_ins_list", // point to server-side PHP script 
                 dataType: 'json', // what to expect back from the PHP script, if anything
                 type: 'post',
                 success: function(res) {    
//                     console.log(res);
                     var param = { data : res };
//                     console.log(param);
                     $.post("component/cpn_car_ins",param,function(el){
                         $('#body_option').html(el);
                     });
                 }
             });
         }
         else if(page.open=="car_gen"){
             $.ajax({
                 url: "main/data_car_gen?i_brand="+$('#car_brand').val(), // point to server-side PHP script 
                 dataType: 'json', // what to expect back from the PHP script, if anything
                 type: 'post',
                 success: function(res) {    
//                     console.log(res);
                     var param = { data : res };
//                     console.log(param);
                     $.post("component/cpn_car_gen",param,function(el){
                         $('#body_option').html(el);
                         $('#car_brand_in_gen').text($('#txt_car_brand').text());
                     });
                 }
             });
         }
     }
     if(page.id=="shopcategory.html"){
      if(page.open=="shopcategory"){
         if (id_province == undefined) {
             ons.notification.alert({
               message: 'จังหวัด',
               title: "กรุณาเลือก",
               buttonLabel: "ตกลง"
           })
             return false;
         }
//             console.log('-----------------------------------')
//             console.log($('#place_province').val())
         var param = { data : 'res' };
//         console.log(param);
         $.post("shop/shopcategory?pv="+$('#place_province').val(),param,function(el){
             $('#body_category').html(el);
                         // $('#car_brand_in_gen').text($('#text_shopcategory').text());
                     });
     }
     else if(page.open=="shoptype"){
         if (id_category == undefined) {
             ons.notification.alert({
               message: 'หมวดหมู่',
               title: "กรุณาเลือก",
               buttonLabel: "ตกลง"
           })
             return false;
         }
         var param = { data : 'res' };
//         console.log(param);
//         console.log(id_category)
         $.post("shop/shoptype?pv="+$('#place_province').val()+"&main="+id_category,function(el){
             $('#body_category').html(el);
                         // $('#car_brand_in_gen').text($('#txt_shoptype').text());
                     });
     }
     else if(page.open=="province"){
         var param = { data : 'res' };
//         console.log(param);
//         console.log(id_category)
         $.post("shop/shopprovince",function(el){
             $('#body_category').html(el);
                         // $('#car_brand_in_gen').text($('#txt_shoptype').text());
                     });
     }
   }
   else if (page.id == 'book_trans.html') {
//     console.log('aaaa')
   //   fn.pushPage({
   //   'id': 'book_trans.html',
   //   'title': 'จองรถ',
   //   'key': 'book_trans'
   // })
   }
   if (anim) {
     document.getElementById('appNavigator').pushPage(page.id, {
         data: {
             title: page.title
         },
         animation: anim
     });
   } 
   else {
     document.getElementById('appNavigator').pushPage(page.id, {
         data: {
             title: page.title
         }
     });
   }
   };
   function arrowChange(id){
     var check = $('#'+id+' i').hasClass('fa-chevron-down');
//     console.log(id+' : '+check);
     if(check==true){
         $('#'+id+' i').removeClass('fa-chevron-down');
         $('#'+id+' i').addClass('fa-chevron-up');
     }else{
         $('#'+id+' i').addClass('fa-chevron-down');
         $('#'+id+' i').removeClass('fa-chevron-up');
     }
     $('.arr').each (function() {
   //          console.log($(this).attr('id'));
   if($(this).attr('id')==id){
     //              console.log(1);
   }else{
   $(this).find('i').removeClass('fa-chevron-up');
   $(this).find('i').addClass('fa-chevron-down');
   }
   }); 
   //      $( ".arr i" ).not( document.getElementById( id ) ).removeClass('fa-chevron-up');
   //      $( ".arr i" ).not( document.getElementById( id ) ).addClass('fa-chevron-down');
   }
</script>
<div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <!-- <button class="pswp__button pswp__button--share" title="Share"></button> -->
                <!-- <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> -->
                <!-- <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button> -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="pswp__loading-indicator"><div class="pswp__loading-indicator__line"></div></div> -->
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip">
                    <!-- <a href="#" class="pswp__share--facebook"></a>
                  <a href="#" class="pswp__share--twitter"></a>
                  <a href="#" class="pswp__share--pinterest"></a>
                  <a href="#" download class="pswp__share--download"></a> -->
                </div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var array_rooms;
      var res_socket;
      var socket = io.connect('https://www.welovetaxi.com:3443');
      var check_run_shop = 0;
   //on message received we print all the data inside the #container div
   socket.on('notification', function(data) {
      //          console.log("Start Socket");
//          			alert(data);
      if (typeof data.transfer !== 'undefined' && data.transfer.length > 0) {
          res_socket = data.transfer[0];
          if (data.transfer[0].length > 0) {
              $('#number_tbooking').show();
          } else {
              $('#number_tbooking').hide();
          }
          $('#number_tbooking').text(data.transfer[0].length);
//          alert($('#check_open_worktbooking').val());
          if ($('#check_open_worktbooking').val() == 1) {
//            alert($('#check_open_worktbooking').val());
//              console.log(data.transfer);
              $('#tab-trans_job').attr('badge', data.transfer[0].length);
              //        console.log('now open popup');
//              setTimeout(function(){
                readDataBooking();
//              },500);
          }
      }
   });
   var frist_socket = true;
   socket.on('getbookinglab', function(data) {
      // console.log(data)
      array_data = [];
      var done = [];
      var none = [];
      $.each(data, function(index, value) {
          var current = formatDate(new Date());
          var db = formatDate(value.transfer_date);
          if (value.driver_complete == 0) {
              if (class_user == "lab") {
                  if (db == current) {
                      done.push(value);
                  }
              } else {
                  if (db == current && value.drivername == detect_user) {
                      done.push(value);
                  }
              }
          }
      });
      array_data = {
          manage: done,
          history: none
      };
             console.log(array_data);
      if (check_run_shop != done.length) {
        if ($('#open_shop_manage').val() >0) {
          shopManage();
//          console.log(check_run_shop+" |||| " +done.length);
          check_run_shop = done.length;
        }
          
      }
      if (done.length > 0) {
          $('#number_shop').show();
      } else {
          $('#number_shop').hide();
      }
      $('#number_shop').text(done.length);
      if ($('#number_shop').text() > 0) {
          $('#tab_shop_mn').attr('badge', done.length);
      } else {
          $('#tab_shop_mn').removeAttr("badge");
      }
      /* check open order id auto */
      if (frist_socket == true) {
          var url_string = window.location.href; //window.location.href
          var url = new URL(url_string);
   //        console.log(get_order_id);
   if (get_order_id != "") {
      if (status == "his") {
          openOrderFromAndroidHistory(get_order_id, status, open_ic);
      } else {
          $.each(array_data.manage, function(index, value) {
              if (value.id == get_order_id) {
                          //                    	 alert(123);
                          console.log(value.id + " : " + index);
                          $('#check_open_num_detail').val(index)
                          $('#check_open_shop_id').val(value.id);
                          if (detect_mb == "Android") {
                              var type_m = "android";
                          } else {
                              var type_m = "ios";
                          }
                          openDetailShop(index, type_m);
                      }
                  });
      }
   }
   frist_socket = false;
   }
   });
   var id = detect_user;
   var dataorder = {
      order: parseInt(id),
   };
   socket.on('connect', function(){
     // call the server-side function 'adduser' and send one parameter (value of prompt)
     // socket.emit('addroom', prompt("What's your name?"));
   //	  socket.emit('addroom', name);
   //	  socket.emit('sendchat', '');
   socket.emit('adduser', dataorder);
   });
   function addUser() {
      var id = detect_user;
      var dataorder = {
          order: parseInt(id),
      };
   }
   // if (class_user == 'monitor') {
    socket.on('monitor', function(rooms, data) {
      console.log('in case monitor')
   // console.log(data)
   // console.log(rooms)
   });  
   // }
   socket.on('updaterooms', function(rooms, current_room) {
      $('#rooms').empty();
      console.log(rooms)
      array_rooms = rooms;
      console.log(current_room)
   });
</script>
<div class="hiddendiv common"></div>
<div class="drag-target" data-sidenav="slide-out" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); width: 10px; left: 0px;"></div>
<?php   $lng_map = $google_map_api_lng;?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places&language=th"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places&language=<?=$lng_map;?>"  type="text/javascript" async defer> </script> -->
<!-- <script src="https://cdn.rawgit.com/googlemaps/js-rich-marker/gh-pages/src/richmarker.js?v=<?=time();?>"></script> -->
<input type="hidden" value="0" id="check_custome_js" />
<script src="<?=base_url();?>assets/custom.js?<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/notification.js?v=<?=time()?>"></script>
<script src="<?=base_url();?>assets/script/activity.js?v=<?=time()?>"></script>
<script src="<?=base_url();?>assets/script/profile.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/bank.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/car.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/shop.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/income.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/wallet.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/taxilist.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/information.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/transfer.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/station.js?v=<?=time();?>"></script>
<!-- <script src="<?=base_url();?>assets/script/booking.js?v=<?=time();?>"></script> -->
