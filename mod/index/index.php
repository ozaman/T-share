<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />  
<div style="background-color:<?=$main_color;?>; height:120px; width:100%;margin-left:0px; margin-top:-10px;   ">
   <br>
   <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-left:-5px;">
      <tbody>
         <tr style="display: none;">
            <td align="center" class="font-24"><font color="#FFFFFF">ยินดีต้อนรับเข้าสู่  <font color="#FFFFF"><B>T Share </B></font></font> </td>
         </tr>
         <tr  style="display:nones">
            <td align="center" class="font-24"><font color="#FFFFFF"><? echo t_today ?>&nbsp;<?=date("Y-m-d");?>&nbsp;<? echo t_time?> <span id="load_data_time"></span>  </font> </td>
         </tr>
         <tr>
            <td align="center" class="font-24">
               <font color="#FFFFFF"><?=t_login_province;?> (<span id="province_text" style="text-transform: capitalize;"></span>)</font>
               <!--	<span style="color: #fff;"><i class="fa fa-refresh" aria-hidden="true"></i></span>-->
            </td>
         </tr>
         <tr>
            <td align="center" class="font-22"><font color="#FFFFFF"> </font> </td>
         </tr>
      </tbody>
   </table>
</div>
<script>
   setInterval(function() {
   var url_check_data_time = "load_blank.php?name=load/update&file=time&driver=<?=$driver_id?>";
   $('#load_data_time').load(url_check_data_time);
   }, 1000); // 60000 milliseconds = one minute
</script>
<style>
   .icon { padding-top: 20px; } 
   p {
   font-family: Arial, Helvetica, sans-serif; font-size:18px;
   }
   body,td,th {
   font-family: Arial, Helvetica, sans-serif;
   }
   .tool-icon-chat {
   width:100%;border-radius: 20px; 
   }
   .tool-icon-text {
   padding:5px; width:100%;border-radius: 15px; height:60px; background-color:#FFFFFF; font-size:32px; color: <?=$maincolor?>;
   }
   .tool-icon-text:hover{  
   padding:5px; width:100%;border-radius: 15px; height:60px; border:2px solid <?=$maincolor?>;background-color:#FFFFFF; box-shadow: 0px 0px 10px #999999; color:<?=$maincolor?>;
   }
   .tool-td-chat {
   padding:5px;border-radius: 15px; padding-bottom:10px;
   }
   .circle-menu{
   border-radius: 50%; background-color:<?=$main_color?>; display: block;  
   padding: 10px; 
   width: 50px;
   height: 50px; 
   color:#FFFFFF;  font-size:24px;  
   border: solid 2px #FFFFFF;
   text-align: center;
   vertical-align: middle; 
   }
   .btn-default{
   border-radius: 20px;
   box-shadow: 0px  0px 5px #DADADA;  border:none;
   }
      .text-cap{
   text-transform: capitalize !important;
   }
   .text-low{
   text-transform: lowercase !important;
   }
   .btn-repair{
   padding: .84rem 2.14rem;
   font-size: .81rem;
   -webkit-transition: all .2s ease-in-out;
   transition: all .2s ease-in-out;
   margin-top: .375rem;
   border: 0;
   border-radius: .125rem;
   cursor: pointer;
   text-transform: uppercase;
   white-space: normal;
   word-wrap: break-word;
   color: #000000;
   background-color: #ffffff;
   box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
   }
   .waves-effect {
   position: relative;
   cursor: pointer;
   overflow: hidden;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   -webkit-tap-highlight-color: transparent;
   z-index: 1;
   }
</style>
<?
   if($data_user_class=='taxi'){
   	 $filter="drivername=".$user_id." ";
    } else { 
   	 $filter=""; 
    }
   /// $_GET[day]='2017-07-20';
   $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   	 $all_work = $db->num_rows('order_booking',"id","$filter");
   ?>
<div  style="margin-top:-45px; width:100%; padding-right:0px;padding: 0px 5px;">
<? //=$_SESSION['data_user_type']?>
<? ///=$data_driver_name?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tbody>
      <tr>
         <td width="50%" align="center" class="tool-td-chat">
            <center>
            <button type="button" class="btn btn-default "  id="index_menu_shopping" style="width:100%;">
               <center>
                  <div  class="circle-menu" style="background-color:#34A0E7"><i class="icon-new-uniF14D"  ></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_send_to_customer?></span>
               </center>
            </button>
         </td>
         <td align="center" class="tool-td-chat">
            <span data-toggle="tooltip" class="badge"   style="position:absolute; margin-left:10px; border-radius: 20px; height:25px; width:25px; background-color:#FF0000; padding-top:3px;border: solid 2px #FFFFFF; display:none " id="number_bottom_chat3"  ><span  class="font-20 text-cap" >
            <?=$all_work?>
            </span></span>
            <center>
            <button type="button" class="btn btn-default "  id="index_menu_shopping_history" style="width:100%;">
               <center>
                  <div  class="circle-menu" style="background-color:#F7941D"><i class="fa fa-history"  ></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_customer_history ?></span>
               </center>
            </button>
            <script>    
               $('#index_menu_shopping_history').click(function(){  
               $( "#main_load_mod_popup" ).toggle();
                var url_load = "load_page_mod.php?name=booking&file=all";
               $('#load_mod_popup').html(load_main_mod);
               $.post( url_load, function( data ) {
                $('#load_mod_popup').html(data);
               });
               /* $('#load_mod_popup').html(load_main_mod);
                $('#load_mod_popup').load(url_load); */
               });
            </script>
         </td>
      </tr>
      <tr>
         <td width="50%" align="center" class="tool-td-chat">
            <span data-toggle="tooltip" class="badge"   style="position:absolute; margin-left:10px; border-radius: 20px; height:25px; width:25px; background-color:#ff0000; padding-top:3px;border: solid 2px #FFFFFF; display:NONE " id="number_bottom_chat"  ><span  class="font-20" >0</span> </span>
            <center>
            <button type="button" class="btn btn-default "  id="index_menu_transfer"   style="width:100%">
               <center>
               <div  class="circle-menu" >
                  <center><i class="icon-new-uniF10A-9" style="font-size:30px; margin-left:-7px;  "  ></i>
               </div>
               <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_job_received?> </span>
               </center>
            </button>
         </td>
         <td align="center" class="tool-td-chat">
            <span data-toggle="tooltip" class="badge"   style="position:absolute; margin-left:10px; border-radius: 20px; height:25px; width:25px; background-color:#ff0000; padding-top:3px;border: solid 2px #FFFFFF;  display:NONE " id="number_bottom_chat2"  ><span  class="font-20" > 0 </span></span>
            <center>
            <button type="button" class="btn btn-default "   id="index_menu_tour"   style="width:100%">
               <center>
                  <div  class="circle-menu"  style="background-color:#8DC63F"><i class="fa fa-suitcase"  ></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_tour_booking?> </span>
               </center>
            </button>
         </td>
      </tr>
      <tr>
         <td align="center" class="tool-td-chat">
            <center>
            <button type="button" class="btn btn-default "   onclick="revenue()"  id="index_menu_income"   style="width:100%">
               <center>
                  <div  class="circle-menu"  style="background-color:#34A0E7"  > <i class="icon-new-uniF121-10" style="margin-left:-3px;"></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_receipts?></span>
               </center>
            </button>
         </td>
         <td align="center" class="tool-td-chat">
            <button type="button" class="btn btn-default "  id="index_menu_payment" onclick="expenses()"  style="width:100%">
               <center>
                  <div  class="circle-menu" style=" background-color:#FF0000"><i class="demo-icon icon-money-payment" style="margin-left:-5px; font-size:28px;"></i> </div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_expenses ?></span>
               </center>
            </button>
         </td>
      </tr>
      <tr>
         <td width="50%" align="center" class="tool-td-chat">
            <button type="button" class="btn btn-default "  id="index_menu_account"   style="width:100%">
               <center>
                  <div  class="circle-menu" style=" background-color:#00AEEF"><i class="fa fa-user"   ></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_my_account ?></span>
               </center>
            </button>
         </td>
         <td width="50%" align="center" class="tool-td-chat">
            <button type="button" class="btn btn-default "  id="index_menu_setting"   style="width:100%">
               <center>
                  <div  class="circle-menu" ><i class="fa fa-cog"  ></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_help_tools ?></span>
               </center>
            </button>
         </td>
      </tr>
      <tr>
         <td  width="50%" align="center" class="tool-td-chat">
            <button type="button" class="btn btn-default " onclick="warkingall()"       style="width:100%">
               <center>
                  <div  class="circle-menu" style=" background-color:#4caf50"><i class="fa fa-calendar-o"   ></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_all_jobs ?></span>
               </center>
            </button>
         </td>
         <td width="50%" align="center" class="tool-td-chat">
            <button type="button" class="btn btn-default "  id="index_menu_money" onclick="money_transfer()" style="width:100%">
               <center>
                  <div  class="circle-menu" style="background: #e91e63"><i class="fa fa fa-usd"  style="margin-left:-3px;"></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_transfer_record ?></span>
               </center>
            </button>
         </td>
      </tr>
   </tbody>
</table>
<div></div>
<script>
   function warkingall(){
     //alert('asasas')
     // $( "#main_load_mod_popup" ).toggle();
      $('#main_load_mod_popup').show(500);
      var url_load= "load_page_mod.php?name=transfer_order&file=work_list_work&transfer_work=true&lat="+$('#lat').val()+"&lng="+$('#lng').val();
   //    var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
       console.log(url_load);
       $('#load_mod_popup').html(load_main_mod);
       $('#load_mod_popup').load(url_load); 
   }
   function revenue(){
     //alert('asasas')
     // $( "#main_load_mod_popup" ).toggle();
      $('#main_load_mod_popup').show(500);
      var url_load= "load_page_mod.php?name=pay&file=pay_job"
   //    var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
       console.log(url_load);
       $('#load_mod_popup').html(load_main_mod);
       $('#load_mod_popup').load(url_load); 
   }
   function expenses(){
     //alert('asasas')
     // $( "#main_load_mod_popup" ).toggle();
      $('#main_load_mod_popup').show(500);
      var url_load= "load_page_mod.php?name=pay&file=pay_job_expenses"
   //    var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
       console.log(url_load);
       $('#load_mod_popup').html(load_main_mod);
       $('#load_mod_popup').load(url_load); 
   }
   function money_transfer(){
     //alert('asasas')
     // $( "#main_load_mod_popup" ).toggle();
      $('#main_load_mod_popup').show(500);
      var url_load= "load_page_mod.php?name=pay&file=money_transfer"
   //    var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
       $('#load_mod_popup').html(load_main_mod);
       $('#load_mod_popup').load(url_load); 
   }
   // function closepop(x){
   //   if (x == '7') {
   //    $('#main_load_mod_popup_7').hide(500);
   //   }
   // }
</script>
<table width="100%" border="0" cellspacing="2" cellpadding="2" style="padding:5px; display:none" >
   <tbody>
      <tr>
         <td colspan="2"></td>
      </tr>
      <tr>
         <td width="120" class="font-22"><strong>ชื่อ-นามสกุล</strong></td>
         <td class="font-22"><?=$arr[web_user][name]?> (<?=$arr[web_user][nickname]?>)</td>
      </tr>
      <tr style="display:none">
         <td width="120" class="font-22"><strong>ชื่อเล่น</strong></td>
         <td class="font-22">s</td>
      </tr>
      <tr>
         <td width="120" class="font-22"><strong>โทรศัพท์</strong></td>
         <td class="font-22">
            <a href="tel:<?=$arr[web_user][phone]?>">
            <?=$arr[web_user][phone]?>
            </a>
         </td>
      </tr>
      <tr>
         <td width="120" class="font-22"><strong>ชื่อเข้าระบบ</strong></td>
         <td class="font-22"> 
            <b><?=$arr[web_user][username]?>
         </td>
      </tr>
      <tr>
         <td class="font-22"><strong>รหัสผ่าน</strong></td>
         <td class="font-22"> 
            <?=$arr[web_user][password]?><b>
         </td>
      </tr>
   </tbody>
</table>
<br/>
<? 
   ///// head
   ///include "load/popup/place.php" ;
    ?>
 
<style>
   .popup-open {
   overflow: hidden;
   } 
   .css-small-popup {
   /* left: 0px; */
   /* right: 0px; */
   /* bottom: 0px; */
   top: 50px;
   /* margin-top: 95px;
   margin-left: 30px;*/
   /*    margin: 40px;*/
   margin: 15% auto;
   position : relative;
   width: 85%;
   height: auto%;
   z-index: 9999;
   /* padding: 30px; */
   background-color: #fff;
   border: 2px solid #cccccc;
   border-radius: 10px;
   }
   .background-smal-popup{
   width: 100%;
   height: 100%;
   z-index: 9990;
   background-color: rgba(0, 0, 0, 0.45);
   top: 0px;
   left: 0px;
   right: 0px;
   bottom: 0px;
   }
   .close-small-popup{
   /*	position : relative;*/
   /*	right : 50px;
   top : 95px;*/
   z-index : 10000;
   color : #000000;
   width: 100%;
   /*margin-left: -10px;
   margin-top: 5px;*/
   }
   .css-full-popup2{
   position: fixed;
   width: 100%;
   z-index: 9999;
   background-color: #ffff;
   height: 100%;
   /*	margin-top: 48px;*/
   }
   .btn_select{
   width: 100%; 
   border: 1px solid #ddd; 
   padding: 13px; 
   margin-top: 0px; 
   border-radius: 20px;
   background-color: #fff;
   box-shadow: 1px 1px 5px #ddd;
   background-color: #3b5998;
   color: #ffff;
   }
</style>
<div class="background-smal-popup " id="load_mod_popup_select_pv" style="position: fixed; overflow: auto;display: none;">
   <div class="css-full-popup2">
      <div class="back-full-popup" style="z-index: 1;">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
               <tr>
                  <td width="40">
                     <div class="close-small-popup"><i class="fa fa-close" style="font-size:22px; color:#FFFFFF "></i></div>
                  </td>
                  <td>
                     <div class="font-26" id="text_small_popup" style="color: #fff;" class="text-topic-action-mod-small-popup"><? echo t_province_you?> <span class="text-change-province"></span></div>
                  </td>
                  <td width="40" align="right">
                     <div style="font-size:22px; color:#FFFFFF " onclick="GohomePage();"><i class="fa fa-home" style="font-size:30px; color:#ffff; "></i></div>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
      <div id="body_load_select_pv" style="overflow: auto;margin-top:45px; " >
      </div>
   </div>
   <input type="hidden" value="" id="txt_pv_fr"/>
   <input type="hidden" value="" id="area"/>
   <input type="hidden" value="" id="province_id"/>
   <input type="hidden" value="0" id="lat"/>
   <input type="hidden" value="0" id="lng"/>
</div>
<script>
   $('#close_small_select').click(function(){
   	$('#popup_small_select').hide();
   });
   $('#index_menu_transfer').click(function(){  
   	  $("#main_load_mod_popup" ).toggle();
       // setInterval(function(){
   	  var url_load= "load_page_mod.php?name=transfer_order&file=work_list_test&lat="+$('#lat').val()+"&lng="+$('#lng').val()+"&transfer_work=true";
   //	  var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
   	  console.log(url_load);
   	  $('#load_mod_popup').html(load_main_mod);
   	  $('#load_mod_popup').load(url_load);
         //}, 1000); 
    	});
    function openMainShop(province,province_name){
    	console.log(province+" : "+province_name);

	   	$("#main_load_mod_popup" ).toggle();

    	  var url_load= "load_page_mod.php?name=shop&file=maintype&id=1&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop&province="+province+"&province_name="+province_name;
   	  	$('#load_mod_popup').html(load_main_mod);
   	  	$('#load_mod_popup').load(url_load);
    }
     $('.close-small-popup').click(function(){
     		$('#load_mod_popup_select_pv').hide();
     		$('.background-smal-popup').removeClass('zindex-small-popup');
//     		$('body').css('overflow','auto');
     		$('#show_main_tool_bottom span').removeClass('bottom-popup-icon-new-active');
     		$('#btn_home_bottom_menu').addClass('bottom-popup-icon-new-active');
     });
    function GohomePage(){
    	$('#btn_home_bottom_menu').click();
    }
   $('#index_menu_shopping').click(function(){  

   $("#load_mod_popup_select_pv" ).show();
     var url_load= "empty_style.php?name=shop&file=select_province_new&id=1&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
      $('#body_load_select_pv').html(load_main_mod);
      $.post( url_load, function( data ) {
      	   $('#body_load_select_pv').html(data);
   	   var txt = $('#province_text').text();
   		$('#txt_pv_fr').val(txt);
   		$('.text-change-province').text(txt);
   	});
    	});
    $('#index_menu_history_shopping').click(function(){  
    $( "#load_mod_popup_2" ).toggle();
     var url_load= "load_page_mod_2.php?name=booking&file=all&shop_id=<?=$arr[project][id]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
     $('#load_mod_popup_2').html(load_main_mod);
     /// $('#load_mod_data').html(load_main_mod);
     $('#navload_topic').html('ไปที่หน้าแรก');
     $('#load_mod_popup_2').load(url_load); 
    });
    ///// food
    $('#index_menu_food').click(function(){  
     $("#load_mod_popup" ).toggle();
     var url_load= "load_page_mod.php?name=shop&file=main&id=2&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
     $('#load_mod_popup').html(load_main_mod);
     $('#load_mod_popup').load(url_load); 
    	});
    $('#index_menu_history_food').click(function(){  
     alert('กำลังจะเปิดให้บริการ');
    	});
     $('#index_menu_history_transfer').click(function(){  
     alert('กำลังจะเปิดให้บริการ');
    });
      $('#index_menu_tour').click(function(){  
     alert('กำลังจะเปิดให้บริการ');
    	});
     $('#index_menu_history_tour').click(function(){  
     alert('กำลังจะเปิดให้บริการ');
    });
    ////// income 
    $('#index_menu_income').click(function(){  
    $( "#load_mod_popup_2" ).toggle();
     var url_load= "load_page_mod_2.php?name=booking/account&file=index&shop_id=<?=$arr[project][id]?>&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
     $('#load_mod_popup_2').html(load_main_mod);
     /// $('#load_mod_data').html(load_main_mod);
     $('#navload_topic').html('ไปที่หน้าแรก');
     $('#load_mod_popup_2').load(url_load); 
    });
     //  $('#index_menu_payment').click(function(){  
     // alert('กำลังจะเปิดให้บริการ');
    // 
    // });
     $('#index_menu_account').click(function(){  
     alert('กำลังจะเปิดให้บริการ');
    });
      $('#index_menu_setting').click(function(){  
     alert('กำลังจะเปิดให้บริการ');
    });
    
</script>  
<div id="tab_chk_qr" class="tab-pane fade">
   <?
      //include("mod/load/show/step/qr_scan.php");
       /// include("mod/load/show/step/index.html");
      ?>
</div>
<style>
   .sweet-alert{
   margin-top: -210px !important;
   }
</style>
<script>
   var locat = getCookie("geolocation");
   geolocatCall();
      /*if (locat != "") {
   	geolocatCall();
      }else{
   	geolocatCallFrist();
   }*/
   /*$('#now_province').val('ภูเก็ต');
   		$('#province_text').text('ภูเก็ต');
   		updatePlaceNum('ภูเก็ต');*/
   function geolocatCall(){
   if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(showPosition);
       } else { 
          	console.log('ปิดตำแหน่ง');
       }
   }
   function geolocatCallFrist(){
   /*var r = confirm("ต้องการเข้าถึงตำแหน่งปัจจุบันของคุณ เพื่อการเข้าถึงข้อมูลของสถานที่ส่งแขกใกล้เคียงได้สะดวกยิ่งขึ้น และสะดวกในการเดินทางไปรับแขกของคุณ");
   if (r){
   	if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(showPosition);
       } else { 
          	console.log('ปิดตำแหน่ง');
       }
   }*/
   	swal({
   	  title: "แสดงตำแหน่งปัจจุบัน",
   	  text: "เพื่อการเข้าถึงข้อมูลของสถานที่ส่งแขกใกล้เคียงได้สะดวกยิ่งขึ้นและสะดวกในการเดินทางไปรับแขกของคุณ",
   	  type: "warning",
   	  showCancelButton: true,
   	  confirmButtonClass: "btn-danger",
   	  confirmButtonText: "ตกลง",
   	  cancelButtonText: "ยกเลิก",
   	  closeOnConfirm: true,
   	  closeOnCancel: true
   	},
   	function(isConfirm) {
   	  if (isConfirm) {
   	    if (navigator.geolocation) {
   		        navigator.geolocation.getCurrentPosition(showPosition);
   		         setCookie("geolocation", '1', 1);
   		    } else { 
   		       	console.log('ปิดตำแหน่ง');
   		    }
   	  } 
   	});
   }	   
   function showPosition(position) {
   var cook_lng = getCookie("lng");
   if (cook_lng == 'th') {
         lng = "th";
        }
        else if (cook_lng == 'cn') {
          lng = "zh-CN";
        }
         else if (cook_lng == 'en') {
          lng = "en";
        }else{
     	lng = "<?=$keep;?>";
     }
        console.log(lng);
    var url = 'https://maps.google.com/maps/api/geocode/json?latlng='+position.coords.latitude+','+position.coords.longitude+'&sensor=false&language='+lng+'&key=AIzaSyCx4SLk_yKsh0FUjd6BgmEo-9B0m6z_xxM';
   //	 var url = 'https://maps.google.com/maps/api/geocode/json?latlng=9.13824,99.32175&sensor=false';
      $('#lat').val(position.coords.latitude);
      $('#lng').val(position.coords.longitude);
      console.log(position.coords.latitude+" : "+position.coords.longitude);
      $.post( url, function( data ) {
   		console.log(data);
   	if(data.status=="OVER_QUERY_LIMIT"){
   		console.log('OVER_QUERY_LIMIT');
   	}else{
   		console.log(data.results);
      		console.log(data.results.length-2);
   		console.log(data.results[data.results.length-2].address_components[0].long_name);
   		var province = data.results[data.results.length-2].address_components[0].long_name;
   		 $('#province_text').text(province);
   		$('#now_province').val(province);
   		updatePlaceNum(province);
   	}
   });
   }   
   function updatePlaceNum(province){
   var url = "mod/shop/select_province_new.php?op=get_id_province_only";
   	 $.post( url,{txt_pv  :province} ,function( data ) {
   	  	var obj = JSON.parse(data);
   		  	console.log(obj);
   		  	var province = obj.id;
   			var area = obj.area;
   			var url2 = "mod/shop/update_num_place.php?op=update_all&province="+province+'&area='+area;
   			 $.post( url2, function( data2 ) {
   			  	console.log(data2);
   			}); 
   	});  
   }	
   function setCookie(cname,cvalue,exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      var expires = "expires=" + d.toGMTString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
   }
   function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
              c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
          }
      }
      return "";
   }
</script>
<div></div>
<input  name="now_province"  type="hidden" class="form-control"  id="now_province" value=""   />