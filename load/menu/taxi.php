<style>
   .sidebar-menu .treeview-menu > li > a{
   padding-left: 50px;
   }
</style>
<section class="sidebar" >
   <ul class="sidebar-menu" >
      <li  id="menu_all" >   </li>
      <li class="treeview" style="display: none;">
         <a  >
         <i class="icon-new-uniF142 l-menu-li-icon-main"></i> <span class="textmain-left-menu">&nbsp;<?=t_job_management;?></span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>
         <ul class="treeview-menu"    >
            <li ><a     id="slide_menu_add_new_shopping"><i class="fa fa-plus-circle" ></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_send_to_customer?></span></a></li>
            <li ><a id="slide_menu_all_shopping" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_customer_history?></span></a></li>
            <li style="display:none" ><a href="?name=today" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_job_received?></span></a></li>
         </ul>
      </li>
      <script>
         $('#slide_menu_all_shopping').click(function(){  
         $( "#main_load_mod_popup" ).toggle();
           var url_load = "load_page_mod.php?name=booking&file=all";
          $('#load_mod_popup').html(load_main_mod);
           $('#load_mod_popup').load(url_load); 
          	});
         	$('#slide_menu_add_new_shopping').click(function(){  
          /* $("#main_load_mod_popup" ).toggle();
           var url_load= "load_page_mod.php?name=shop&file=main&id=1&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
           $('#load_mod_popup').html(load_main_mod);
           $('#load_mod_popup').load(url_load); 
         */
          $("#load_mod_popup_select_pv" ).toggle();
         var url_load= "empty_style.php?name=shop&file=select_province_new&id=1&lat="+$('#lat').val()+"&lng="+$('#lng').val()+"&type=stop";
         console.log(url_load);
         $('#body_load_select_pv').html(load_main_mod);
         $.post( url_load, function( data ) {
         	   $('#body_load_select_pv').html(data);
          var txt = $('#province_text').text();
         $('#txt_pv_fr').val(txt);
         $('.text-change-province').text(txt);
         });
          	});
      </script> 
      <li  id="menu_user" class="treeview">
         <a href="#" >
         <i class="icon-new-uniF10A-9 l-menu-li-icon-main"></i> <span class="textmain-left-menu">&nbsp;<? echo t_car_information?></span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>
         <ul class="treeview-menu"  >
            <li ><a  id="slide_menu_add_new_car"><i class="fa fa-plus-circle" ></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_add_new_car?></span></a></li>
            <li ><a  id="slide_menu_all_car"><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_all_car?></span></a></li>
         </ul>
      </li>
      <script>
         $('#slide_menu_add_new_car').click(function(){  
         $( "#main_load_mod_popup" ).toggle();
           var url_load = "load_page_mod.php?name=car&file=new_car_new";
          $('#load_mod_popup').html(load_main_mod);
           $('#load_mod_popup').load(url_load); 
          	});
         	$('#slide_menu_all_car').click(function(){  
         $( "#main_load_mod_popup" ).toggle();
           var url_load = "load_page_mod.php?name=car&file=all";
          $('#load_mod_popup').html(load_main_mod);
           $('#load_mod_popup').load(url_load); 
          	});
         $('#menu_add_new_booking').click(function(){  
         /// $( ".outer-content-wait" ).toggle();
         $( "#alert_show_shopping_place" ).toggle();
         ///var url_chat_main = "new_driver.php";
            ///$('#load_mod_popup').html(load_main_mod);
         ///  $('#load_mod_popup').load(url_chat_main); 
         	});
         //// alert_show_shopping_place		 
         $('#menu_add_new_register').click(function(){  
         $( "#load_mod_popup" ).toggle();
         var url_chat_main = "new_driver.php";
            $('#load_mod_popup').html(load_main_mod);
          $('#load_mod_popup').load(url_chat_main); 
         	});
      </script> 
      <? if(1==1){ ?>
      <li  id="menu_pay" lass="treeview">
         <a  >
         <i class="icon-new-uniF121-10 l-menu-li-icon-main"></i> <span  class="textmain-left-menu">&nbsp;<? echo t_income_details?></span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a> 
         <ul class="treeview-menu">
            <li><a id="slide_menu_account_income" onclick="revenue();"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_receipt_of_parking_fee?></span></a></li>
            <li style="display:none"><a href="?name=booking/account&file=pay"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_withdrawal_record?></span></a></li>
            <li><a id="slide_menu_account_bank"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_bank_account;?></span></a></li>
         </ul>
      </li>
      <? } ?>
      <script>
        /* $('#slide_menu_account_income').click(function(){  
         $( "#main_load_mod_popup" ).toggle();
           var url_load = "load_page_mod.php?name=booking/account&file=index";
          $('#load_mod_popup').html(load_main_mod);
           $('#load_mod_popup').load(url_load); 
          	});*/
         	$('#slide_menu_account_bank').click(function(){  
         $( "#main_load_mod_popup" ).toggle();
           var url_load = "load_page_mod.php?name=pay&file=bank_book&driver=<?=$arr[web_user][id];?>&open=menu";
          $('#load_mod_popup').html(load_main_mod);
           $('#load_mod_popup').load(url_load); 
          	});
      </script> 
      <li  id="menu_user" class="treeview">
         <a href="#" >
         <i class="icon-new-uniF133-2 l-menu-li-icon-main"></i> <span class="textmain-left-menu">&nbsp;<?=t_user_information;?></span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>
         <ul class="treeview-menu"  >
            <li ><a id="slide_menu_user_profile" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_personal_information?></span></a></li>
            <li ><a id="slide_menu_user_job" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_important_data_file?></span></a></li>
            <!--mod/user/croppic_master/test.php href="mod/user/croppic_master/test.php"-->
            <!-- <li><a id="slide_menu_upload_users" href="mod/user/croppic_master/test.php?user=<?=$arr[web_user][username];?>"><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide" style="color: #000000;">เปลี่ยนภาพประจำตัว</span></a></li>--> 
            <li><a id="slide_menu_upload_user_profile"><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_change_profile_picture ?></span></a></li>
            <? if(1==0){ ?>	
            <li><a href="?name=user&file=network"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_contact_information ?></span></a></li>
            <li><a href="?name=user&file=phone"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_phone_number ?></span></a></li>
            <li><a href="?name=user&file=password"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_change_password ?></span></a></li>
            <li><a href="?name=user&file=document"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_documents ?></span></a></li>
            <li><a href="?name=user&file=network"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;"><? echo t_work_information ?></span></a></li>
            <? } ?>
         </ul>
      </li>
      <script>
         $('#slide_menu_user_profile').click(function(){  
         $( "#main_load_mod_popup" ).toggle();
          var url_load = "load_page_mod.php?name=user&file=index";
         $('#load_mod_popup').html(load_main_mod);
          $('#load_mod_popup').load(url_load); 
         });
         $('#slide_menu_upload_user_profile').click(function(){  
         $( "#load_mod_popup_photo" ).toggle();
         //  var url_load = "load_page_mod.php?name=user&file=upload_pic";
         var url_load = "load_page_photo.php?name=user&file=profile_iframe&user=<?=$arr[web_user][username];?>";
         $('#load_mod_popup_photo').html(load_main_mod);
          $('#load_mod_popup_photo').load(url_load); 
         });
         $('#slide_menu_user_job').click(function(){  
         	$( "#main_load_mod_popup" ).toggle();
          	var url_load = "load_page_mod.php?name=user&file=job";
         	$('#load_mod_popup').html(load_main_mod);
          	$('#load_mod_popup').load(url_load); 
         });
      </script> 



      <!---- Language ---->
      <style>
         .fa:before,.fa:after{
         width: 1em;
         /*margin-right: .2em;*/
         text-align: center;
         line-height: 1em;
         /*margin-left: .2em;*/
         }
      </style>
      <li id="btn_qrcode_bottom_menu" class="treeview" style="display: nones;" >
         <a href="#">
         <i class="fa fa-qrcode l-menu-li-icon-main" style="margin-left: 0;"></i> <span class="textmain-left-menu">&nbsp;&nbsp;<? echo t_friends?></span>
         <span class="pull-right-container">
        
         </span>
         </a>
      </li>
      <li id="menu_lnguage" class="treeview" style="display: none;" >
         <a href="#">
         <i class="icon-new-uniF161-3 l-menu-li-icon-main"></i> <span class="textmain-left-menu">&nbsp;<? echo t_language?></span>
         <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
         </span>
         </a>
         <ul class="treeview-menu" style="display: none;">
            <li>
               <a  onclick="language('th')">
                  <table>
                     <tr>
                        <td><i class="fa fa-circle-o" style="width: 20px;color:#999999;font-size:20px;"></i></td>
                        <td width="150"><span class="textsub-left-menu-slide" style="color: #000000;">ไทย</span></td>
                        <td><img src="images/icon_county/thai.ico" style="width: 25px;margin-right: 15px;"></td>
                     </tr>
                  </table>
               </a>
            </li>
            <li>
               <a  onclick="language('en')">
                  <table>
                     <tr>
                        <td><i class="fa fa-circle-o" style="width: 20px;color:#999999;font-size:20px;"></i></td>
                        <td width="150"><span class="textsub-left-menu-slide" style="color: #000000;">English</span></td>
                        <td><img src="images/icon_county/usa.ico" style="width: 25px;margin-right: 15px;"></td>
                     </tr>
                  </table>
               </a>
            </li>
            <li >
               <a onclick="language('cn')">
                  <table>
                     <tr>
                        <td><i class="fa fa-circle-o" style="width: 20px;color:#999999;font-size:20px;"></i></td>
                        <td width="150"><span class="textsub-left-menu-slide" style="color: #000000;">简体中文</span></td>
                        <td><img src="images/icon_county/china.ico" style="width: 25px;margin-right: 15px;"></td>
                     </tr>
                  </table>
               </a>
            </li>
         </ul>
      </li>
      <!------>
      <li  id="menu_logout">
         <a  id="l-logout" >
         <i class="icon-new-uniF186 l-menu-li-icon-main" ></i> <span class="textmain-left-menu" >&nbsp;<?=t_sign_out;?></span>
         </a>
      </li>
   </ul>
</section>
<script>
	
   $('#btn_qrcode_bottom_menu').click(function(){  
    hidepopup();
     $("#btn_qrcode_bottom_menu").addClass("bottom-popup-icon-new-active");
     $( "#main_load_mod_popup_3" ).toggle();
      $('#load_mod_popup_3').html(load_main_mod);
      var url_load= "load_page_mod_3.php?name=user&file=qrcode";
       $('#load_mod_popup_3').load(url_load);
       });
       
    $("#l-logout").click(function(){ 
      /*swal({
    title: "<?=t_sign_out;?>",
    text: "<?=t_confirm_signout;?>",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: '<?=t_yes;?>',
    cancelButtonText: "<?=t_no;?>",
    closeOnConfirm: false,
    closeOnCancel: true,
    },
    function(){

      $.post('signout.php?type=logout',function(){
      		 swal("<?=t_sign_out_successfully;?>","", "success");
      		 setTimeout(function(){ 
      		 	window.location.href = "index.php";		}, 1000);
      });

    	});*/
    	
    	swal({
		  title: "<?=t_sign_out;?>",
		  text: "<?=t_confirm_signout;?>",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "<?=t_yes;?>",
		   cancelButtonText: "<?=t_no;?>",
		  closeOnConfirm: false
		},
		function(){
		   $.post('signout.php?type=logout',function(){
      		 swal("<?=t_sign_out_successfully;?>","", "success");
      		 setTimeout(function(){ 
      		 	window.location.href = "index.php";		}, 1000);
      		});
		});
    	
    });
</script>
<script src="js/jquery-main.js"></script> 
<style>
   /* menu*/
   .textmain-left-menu  {
   font-size:<?=26-$fontmobile;?>px; 
   font-family:Tahoma,Arial, Helvetica, sans-serif;  
   color:#666666;
   }
   .textsub-left-menu-slide    {
   font-size:<?=24-$fontmobile;?>px;   padding-left:5px;
   }
   .textsub-left-menu-slide a  {
   font-size: <?=24-$fontmobile;?>px; padding-top:10px;  padding-left:5px;
   }
   .textsub-left-menu-slide:hover  {
   font-size:20px;  font-family: color:<?=$main_color?>;
   }
   .l-menu-li {
   border-bottom:  solid 1px #999999;
   }
   .l-menu-li-icon-main { 
   font-size:<?=34-$fontmobile;?>px; padding-right:0px; color:<?=$main_color?>; margin-left:-10px;
   }
</style>