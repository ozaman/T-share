<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />  
<input type="hidden" value="0" id="check_open_shop_id" /> <!-- เช็คเมนูช้อปปิ้ง ว่ากำลังเปิด detail ของ id ไหน -->
<style>
	.box-shadow-only{
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
	}
	.paddling-max{
		padding : 17px 12px !important;
		border-radius: 0px !important;
		border : 0px !important;
	}
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
<input id="check_open_worktbooking" value="0" type="hidden"/>
<div style="background-color:<?=$main_color;?>; height:120px; width:100%;margin-left:0px; margin-top:0px;" >
   <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-left:0px;position: absolute; margin-top: 10px;">
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

      </tbody>
   </table>
</div>

<script>
	var array_data = [];
	startTimeHome();
   var clock_h ;
   function startTimeHome() {
       var today = new Date();
       var h = today.getHours();
       var m = today.getMinutes();
       var s = today.getSeconds();
       m = checkTimeHome(m);
       s = checkTimeHome(s);
       document.getElementById('load_data_time').innerHTML = h + ":" + m + ":" + s;
       clock_h = setTimeout(startTimeHome, 1000);
   }
   function checkTimeHome(i) {
       if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
       return i;
   }
</script>

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
<div  style="margin-top:-40px; width:100%; padding-right:0px;padding: 0px 0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tbody>
      <tr>
         <td width="50%" align="center" class="">
            <center>
            <button type="button" class="btn btn-default paddling-max"  id="index_menu_shopping" style="width:100%;">
               <center>
                  <div  class="circle-menu" style="background-color:#34A0E7"><i class="icon-new-uniF14D"  ></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_send_to_customer?></span>
               </center>
            </button>
			</center>
         </td>
         <td align="center" class="">
          <input id="check_open_workshop" value="0" type="hidden"/>
            <span id="number_shop" class="badge font-20" style="position: absolute;font-size: 14px;background-color: #F44336;padding: 4px 7px;margin: 12px 4px;">0</span>
            <center>
            <button type="button" class="btn btn-default paddling-max"  id="index_menu_shopping_history" style="width:100%;">
               <center>
                  <div  class="circle-menu" style="background-color:#34A0E7"><i class="fa fa-history"  ></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><?=t_customer_history;?></span>
               </center>
            </button>
            </center>
            <script>    
               $('#index_menu_shopping_history').click(function(){  
	               $('#check_open_workshop').val(1);
	               $( "#main_load_mod_popup" ).toggle();
	               console.log(array_data);
//	               return;
	                var url_load = "load_page_mod.php?name=booking&file=all";
	               $('#load_mod_popup').html(load_main_mod);
	               $.post( url_load,{ book : array_data } ,function( data ) {
	                $('#load_mod_popup').html(data);
	               });
	               /* $('#load_mod_popup').html(load_main_mod);
	                $('#load_mod_popup').load(url_load); */
               });
            </script>
         </td>
      </tr>
      <tr>
         <td width="50%" align="center" class="">
            <span id="number_tbooking" class="badge font-20" style="position: absolute;font-size: 14px;background-color: #F44336;padding: 4px 7px;margin: 12px 4px">0</span>
            <center>
            <button type="button" class="btn btn-default paddling-max"  id="index_menu_transfer"   style="width:100%" onclick="workTbooking();">
               <center>
               <div  class="circle-menu"  style="background-color: #F7941D ">
                  <i class="icon-new-uniF10A-9" style="font-size:30px; margin-left:-7px;  "  ></i>
               </div>
               <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_job_received?> </span>
               </center>
               
            </button>
            
            </center>
            
         </td>
         <td width="50%" align="center" class="">
        
            <span data-toggle="tooltip" class="badge"   style="position:absolute; margin-left:10px; border-radius: 20px; height:25px; width:25px; background-color:#ff0000; padding-top:3px;border: solid 2px #FFFFFF; display:NONE " id="number_bottom_chat"  ><span  class="font-20" >0</span> </span>
            <center>
            <button type="button" class="btn btn-default paddling-max"  id="index_menu_transfer_his"   style="width:100%" onclick="historyTransfer();">
               <center>
               <div  class="circle-menu"  style="background-color: #F7941D ">
                  <center><i class="fa fa-history" style="/*font-size:30px; margin-left:-7px;*/  "  ></i>
               </div>
               <span style="padding-bottom:20px;" class="font-20 text-cap"><?=t_transfer_his;?> </span>
               </center>
            </button>
            </center>
         </td>
      </tr>
      <tr>
         <td align="center" class="">
            <center>
            <button type="button" class="btn btn-default paddling-max"   onclick="revenue()"  id="index_menu_income"   style="width:100%">
               <center>
                  <div  class="circle-menu"   > <i class="icon-new-uniF121-10" style="margin-left:-3px;"></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_receipts?></span>
               </center>
            </button>
            </center>
         </td>
        <td align="center" class="">
           <button type="button" class="btn btn-default paddling-max"  id="index_menu_money" onclick="money_transfer()" style="width:100%">
               <center>
                  <div  class="circle-menu" style="background: #e91e63"><i class="fa fa fa-usd" ></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap">กระเป๋าเงิน-ประวัติ</span>
               </center>
            </button>
         </td>
	 </tr>
	  <tr>
         <td  width="50%" align="center" class="">
            <span data-toggle="tooltip" class="badge"   style="position:absolute; margin-left:10px; border-radius: 20px; height:25px; width:25px; background-color:#ff0000; padding-top:3px;border: solid 2px #FFFFFF;  display:NONE " id="number_bottom_chat2"  ><span  class="font-20" > 0 </span></span>
            <center>
            <button type="button" class="btn btn-default paddling-max"   id="index_menu_tour"   style="width:100%">
               <center>
                  <div  class="circle-menu"  style="background-color:#8DC63F"><i class="fa fa-suitcase"  ></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_tour_booking?> </span>
               </center>
            </button>
            </button>
         </td>
         <td width="50%" align="center" class="">
         	
            <button type="button" class="btn btn-default paddling-max" style="width:100%" id="booking_open">
               <center>
                  <div  class="circle-menu" style="background: #1CC1A4;"><i class="fa fa-taxi" ></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap"><? echo t_booking; ?></span>
               </center>
            </button>
         
         </td>
         
      </tr>
      <tr style="display: none;">
         <td colspan="2" width="50%" align="center" class="">
            <a href="https://www.welovetaxi.com:8080/">
            <button type="button" class="btn btn-default paddling-max" style="width:100%">
               <center>
                  <div  class="circle-menu" style="background: #CDDC39;"><i class="fa fa-map" ></i></div>
                  <span style="padding-bottom:20px;" class="font-20 text-cap">test map</span>
               </center>
            </button>
            </a>
         </td>
      </tr>
	
   </tbody>
</table>
<script>
   var ckeckhis = false;
	$('#booking_open').click(function(){
		swal("กำลังจะเปิดให้บริการ");
		return;
		window.location = "https://www.welovetaxi.com/app/booking2/";
	});
   function revenue2(){
      ckeckhis = false;
      $('#main_load_mod_popup').show();
      var url_load= "load_page_mod.php?name=pay&file=pay_job";
       console.log(url_load);
       $('#load_mod_popup').html(load_main_mod);
       $('#load_mod_popup').load(url_load); 
   }
   function revenue(){
      $('#main_load_mod_popup').show();
      var url_load= "load_page_mod.php?name=income&file=ic_main";
       console.log(url_load);
       $('#load_mod_popup').html(load_main_mod);
       $('#load_mod_popup').load(url_load); 
   }
   function expenses(){
      ckeckhis = false;
     //alert('asasas')
     // $( "#main_load_mod_popup" ).toggle();
      $('#main_load_mod_popup').show();
      var url_load= "load_page_mod.php?name=pay&file=pay_job_expenses"
   //    var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
       console.log(url_load);
       $('#load_mod_popup').html(load_main_mod);
       $('#load_mod_popup').load(url_load); 
   }
   function money_transfer(){
   	/*swal("กำลังจะเปิดให้บริการ");
   	return;*/
      ckeckhis = false;
     //alert('asasas')
     // $( "#main_load_mod_popup" ).toggle();
      $('#main_load_mod_popup').show();
      var url_load= "load_page_mod.php?name=pay&file=money_transfer"
   //    var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
      
       $('#load_mod_popup').load(url_load); 
        $('#load_mod_popup').html(url_load);
   }
   function workTbooking(){
   		/*swal("กำลังจะเปิดให้บริการ");
   		return;*/
     	ckeckhis = false;
   		$('#main_load_mod_popup').show();
   		var url_load = "load_page_mod.php?name=tbooking&file=all";
   		$('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load); 
        $('#check_open_worktbooking').val(1);
   }
   function historyTransfer(){
   		/*swal("กำลังจะเปิดให้บริการ");
   		return;*/
   		$('#main_load_mod_popup').show();
   		var url_load= "load_page_mod.php?name=tbooking&file=his";
   		$('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load); 
//        $('#check_open_worktbooking').val(1);
   }
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
<div class="background-smal-popup " id="load_mod_popup_select_pv" style="position: fixed; overflow: auto;display: none;">
   <div class="css-full-popup2 ">
      <div class="back-full-popup box-shadow-only" style="z-index: 1;">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
               <tr>
                  <td width="40">
                     <div class="close-small-popup"><i class="fa fa-close" style=" "></i></div>
                  </td>
                  <td>
                     <div class="font-26" id="text_small_popup"  class="text-topic-action-mod-small-popup"><? echo t_province_you?> <span class="text-change-province"></span></div>
                  </td>
                  <td width="40" align="right">
                     <div  onclick="GohomePage();"><i class="fa fa-home" ></i></div>
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
   /*$('#index_menu_transfer').click(function(){  
   	  $("#main_load_mod_popup" ).toggle();
   	  var url_load= "load_page_mod.php?name=transfer_order&file=work_list_test&lat="+$('#lat').val()+"&lng="+$('#lng').val()+"&transfer_work=true";
   //	  var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
   	  console.log(url_load);
   	  $('#load_mod_popup').html(load_main_mod);
   	  $('#load_mod_popup').load(url_load); 
    	});*/
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

   $('#index_menu_shopping').click(function(){  
   var user_id = "<?=$_SESSION['data_user_id'];?>";
		$.post("mod/user/check_user.php?check=idcard_idrive&user_id="+user_id,function(res){
			console.log(res);
			if(res.idcard == ""){
				swal("คุณยังไม่ได้กรอกข้อมูลบัตรประชาชน");
				$( "#main_load_mod_popup" ).toggle();
	          	var url_load = "load_page_mod.php?name=user&file=job";
	         	$('#load_mod_popup').html(load_main_mod);
	          	$('#load_mod_popup').load(url_load); 
				return;
			}
			if(res.iddriving == ""){
				swal("คุณยังไม่ได้กรอกข้อมูลใบขับขี่");
				$( "#main_load_mod_popup" ).toggle();
	          	var url_load = "load_page_mod.php?name=user&file=job";
	         	$('#load_mod_popup').html(load_main_mod);
	          	$('#load_mod_popup').load(url_load); 
				return;
			}
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
    });

    ///// food
    $('#index_menu_food').click(function(){  
     $("#load_mod_popup" ).toggle();
     var url_load= "load_page_mod.php?name=shop&file=main&id=2&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
     $('#load_mod_popup').html(load_main_mod);
     $('#load_mod_popup').load(url_load); 
    	});

      $('#index_menu_tour').click(function(){  
     swal('กำลังจะเปิดให้บริการ');
     return;
    	});



</script>  
</div>

<script>
   var locat = getCookie("geolocation");
   geolocatCall();
   var userLang = navigator.language || navigator.userLanguage; 
   userLang = userLang.split('-');
   var js_lng = userLang[0];
   console.log('Js Browser lng : '+js_lng);
   function geolocatCall(){
   if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(showPosition);
       } else { 
          	console.log('ปิดตำแหน่ง');
       }
   }
   function geolocatCallFrist(){

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
        console.log('Php Browser lng : '+lng);
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
//   			  	console.log(data2);
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
<input  name="now_province"  type="hidden" class="form-control"  id="now_province" value=""   />
<script src="https://www.welovetaxi.com:3443/socket.io/socket.io.js?v=<?=time();?>"></script>
    <!-- <script src="socket.io/socket.io.js"></script> -->
<script src="https://code.jquery.com/jquery-latest.min.js?v=<?=time();?>"></script>
<script>
	var res_socket ;
	var socket = io.connect('https://www.welovetaxi.com:3443');
        //on message received we print all the data inside the #container div
        socket.on('notification', function (data) {
        res_socket = data.transfer[0];
        $('#number_tbooking').text(data.transfer[0].length);
	        if($('#check_open_worktbooking').val()==1){
	        console.log(data.transfer);
	        
	//        console.log('now open popup');
			readDataBooking();
			}
    
	});

	
	var user_class = "<?=$data_user_class;?>";
	var frist_socket = true;
		socket.on('getbookinglab', function (data) { 
		 array_data = [];
		 var done = [];       
		 var none = [];       
        $.each(data.booking,function(index,value){
        	var current = formatDate(new Date());
	        var db = formatDate(value.transfer_date);
        	if(value.driver_complete == 0 ){
        		if(user_class=="lab"){
	        		
					if(db == current){
						done.push(value);
					}
				}
				else {
					if(db == current && value.drivername == "<?=$user_id;?>"){
						done.push(value);
					}
				}
				
			}
			else{
				if(user_class=="lab"){
	        		
					if(db == current){
						none.push(value);
					}
				}
				else {
					if(db == current && value.drivername == "<?=$user_id;?>"){
						none.push(value);
					}
				}
			}
			
        });
        array_data = {
			manage : done,
			history : none
		};
//        console.log(array_data);
    	$('#number_shop').text(done.length);
      });
	
var id = '<?=$user_id?>';
   var dataorder={  
    order : parseInt(id),  
     
    };
    
//socket.on('connect', function(){  
    socket.emit('adduser', dataorder);
    console.log(dataorder);
 // });
socket.on('datalab', function (username, data) {
   console.log('***********************datalab***************************')
console.log(username)
console.log(data)
console.log(data[0].id);
    if(data[0].check_driver_topoint==1){
      console.log("driver_topoint");
      changeHtml("driver_topoint",data[0].id)
   }
    if(data[0].check_guest_receive==1){
      console.log("guest_receive");
      changeHtml("guest_receive",data[0].id)
   }
   if(data[0].check_guest_register==1){
      console.log("guest_register");
      changeHtml("guest_register",data[0].id)
   }
   if(data[0].check_driver_pay_report==1){
      console.log("driver_pay_report");
      changeHtml("driver_pay_report",data[0].id)
   }

   
   });
   
socket.on('updatedriver', function (username, data) {
   
console.log("++++++++++++++++++++++++++++++++++++++++++++++++++++++")
//console.log(username)
console.log(data)

if (data.length != 0) {
	console.log(data[0].id);
	if($('#check_open_workshop').val()==1){
		
		if(data[0].check_driver_topoint==1){
		      console.log("driver_topoint");
		      changeHtml("driver_topoint",data[0].id)
		   }
		    if(data[0].check_guest_receive==1){
		      console.log("guest_receive");
		      changeHtml("guest_receive",data[0].id)
		   }
		   if(data[0].check_guest_register==1){
		      console.log("guest_register");
		      changeHtml("guest_register",data[0].id)
		   }
		   if(data[0].check_driver_pay_report==1){
		      console.log("driver_pay_report");
		      changeHtml("driver_pay_report",data[0].id)
		   }
		
	}
   
}
   });
	
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
	}
</script>

