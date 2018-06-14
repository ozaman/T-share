<? //  include ("load/loading/page_mod.php");?> 
<style>
   .outer-loading-mod {
   position: fixed; margin-left: 0px; margin-top: 0px; display:table; top:0; left:0;  
   width: 100%; /* This could be ANY width */
   height: 100%; /* This could be ANY height */
   z-index:9999; background:#FFF; 
   }
   .inner-loading {
   display: table-cell;
   vertical-align: middle;
   text-align: center;
   width: 100%; /* This could be ANY width */
   height: 100%; /* This could be ANY height */
   background:none;    
   }
   .navload {
   display: block;
   background-color: #f7f7f7;
   background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f7f7), to(#e7e7e7));
   background-image: -webkit-linear-gradient(top, #f7f7f7, #e7e7e7); 
   background-image: -moz-linear-gradient(top, #f7f7f7, #e7e7e7); 
   background-image: -ms-linear-gradient(top, #f7f7f7, #e7e7e7); 
   background-image: -o-linear-gradient(top, #f7f7f7, #e7e7e7); 
   color: <?=$main_color?>;
   width:  60px;
   height: 60px;
   text-align: center;
   border-radius: 50%;
   box-shadow: 0px 3px 8px #aaa, inset 0px 2px 3px #fff;
   }
</style>
<script>
   var load_main_mod='<div class="outer-loading-mod"   id="main_index_load_page_mod"><div class="inner-loading"><center><span  class="navload"><i class="fa fa-circle-o-notch fa-spin 4x" style="font-size:40px;   margin-top:10px " ></i></center></span><div style="font-size:14px; color:#333333; font-weight:normal;  margin-top:10px " ><center><span id="navload_topic"> <?echo t_load_data?></span></center></div></div></div>';
   var load_main_mod_table='<br><center><span  class="navload"><i class="fa fa-circle-o-notch fa-spin 4x" style="font-size:40px;   margin-top:10px " ></i></center></span><div style="font-size:14px; color:#333333; font-weight:normal;  margin-top:10px " ><center><span id="navload_topic"> <?echo t_load_data?></span></center></div';
   
   /*var load_main_mod = '<div class="outer-loading-mod"  id="main_index_load_page_mod">'
	+'<div class="row">'
		+'<div id="loader">'
    		+'<div class="dot"></div>'
			+'<div class="dot"></div>'
			+'<div class="dot"></div>'
			+'<div class="dot"></div>'
			+'<div class="dot"></div>'
			+'<div class="dot"></div>'
			+'<div class="dot"></div>'
			+'<div class="dot"></div>'
			+'<div class="lading"></div>'
		+'</div>'
	+'</div>'
+'</div>';*/
</script>
<?php 
   if($data_user_class=='taxi'){
   	 $filter="drivername=".$user_id." ";
    } 
   else { 
   	 $filter=""; 
    }
   /// $_GET[day]='2017-07-20';
   /*  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   	 $all_work = $db->num_rows('order_booking',"id","$filter");*/
      $PNG_TEMP_DIR = '../data/qrcode/user/';
      $PNG_WEB_DIR = '../data/qrcode/user/';
      include "php_qrcode/qrlib.php";    
      //ofcourse we need rights to create temp dir
      if (!file_exists($PNG_TEMP_DIR))
          mkdir($PNG_TEMP_DIR);
      $link='https://www.welovetaxi.com/app/taxi/signin.php?refer='.$user_id.'&type='.$user_class.'&class=driver';
      $linkall='https://www.welovetaxi.com/app/taxi/signin.php?refer='.$user_id.'&type='.$user_class.'&class=all';
      $_REQUEST['size']=10;
      $_REQUEST['level']='Q';
      //processing form input
      //remember to sanitize user input in real-life solution !!!
      /*
      $errorCorrectionLevel = 'L';
      if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
         $errorCorrectionLevel = "L";    
      $matrixPointSize = 8;
      if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 10), 10);
      */
          // user data
       $filename = $PNG_TEMP_DIR.$user_class.'_'.$user_id.'_driver.png';
           QRcode::png($link, $filename,  $_REQUEST['level'], 10, 1);    
      /// user
        $filenameall = $PNG_TEMP_DIR.$user_class.'_'.$user_id.'_all.png';
           QRcode::png($linkall, $filenameall,  $_REQUEST['level'], 10, 1);     
      //display generated file
      //   echo '<img src="'.$filename.'" /><hr/>';  
      ?>
<style>
   .column {
   float: left;
   width: 25%;
   padding: 5px;
   height: auto;
   }
   .font-19{
   		font-size: 13px !important;
   		font-family : 'Arial', sans-serif;
   }
   .max-min-height{
   			max-height: 55px; 
/*		   	min-height: 55px;*/
   }
    @media screen and (max-width: 320px) {
         .max-min-height{
		   	max-height: 50px; 
/*   			min-height: 50px;*/
		   }
		   .font-19{
		   		font-size: 11px !important;
		   		font-family : 'Arial', sans-serif;
		   }
	}
   .txt-col{
   background-color: #fff;
   text-align: center;
   text-transform: capitalize;
   }
   .txt-color{
   color: #333333;
   }
</style>
<!-- <div  class="bottom_popup max-min-height"   id="show_main_tool_bottom" >
   <div class="column txt-col">
      <span  id="btn_home_bottom_menu"  class="bottom-popup-icon-new-active">
         <div style="height:25px;" class="font-32"><i class="fa fa-home" ></i></div>
         <div class="txt-color font-19 text-cap"><?=t_home_page;?></div>
      </span>
   </div>
   <div class="column txt-col">
      <span  id="btn_todaywork_bottom_menu"  class="">
         <div style="height:25px;" class="font-32"><i class="fa fa-history" ></i></div>
         <div class="txt-color font-19 text-cap"><?=t_all_jobs;?></div>
      </span>
   </div>
   <div class="column txt-col">
      <span  id="btn_newwork_bottom_menu"  class="">
         <div style="height:25px;" class="font-30"><i class="fa icon-new-uniF142" ></i></div>
         <div class="txt-color font-19 text-cap"><?=t_send_to_customer;?></div>
      </span>
   </div>
   <div class="column txt-col">
      <span  id="btn_qrcode_bottom_menu"  class="">
         <div style="height:25px;" class="font-32"><i class="fa fa-qrcode" ></i></div>
         <div class="txt-color font-19 text-cap"><?=t_friends;?></div>
      </span>
   </div>
</div> -->
<!--<div  class="bottom_popup"   id="show_main_tool_bottom" style="display:none;     ">
   <table width="100%"  border="0" cellspacing="2" cellpadding="2" style="display: nones;">
      <tr align="center">
         <td width="25%">
            <span  id="btn_home_bottom_menu"  class="bottom-popup-icon-new-active">
               <div style="height:25px;" ><i class="fa fa-home  " ></i></div>
               <font color="#333333" style="font-size:13px"><? echo t_home_page; ?> </font>
            </span>
         </td>
         <td width="25%">
            <div style="display:none"> <span data-toggle="tooltip" title="3 ข้อความใหม่" class="badge"   style="position:absolute; margin-left:20px; border-radius: 20px; height:20px; width:20px; background-color:#FF0000; " id="number_bottom_chat"><?=$all_work?></span>
            </div>
            <span id="btn_todaywork_bottom_menu" class="bottom-popup-icon-new">
               <div style="height:25px;" ><i class="fa fa-history" ></i></div>
               <font color="#333333" style="font-size:13px"><? echo t_all_jobs ?></font>
            </span>
         </td>
         <td width="25%">
            <span id="btn_newwork_bottom_menu" class="bottom-popup-icon-new">
               <div style="height:25px;"  ><i class="icon-new-uniF142"  ></i></div>
               <font color="#333333" style="font-size:13px"><? echo t_send_to_customer ?>
               </font>
            </span>
         </td>
         <td width="25%">
            <span id="btn_user_bottom_menu" style="display:none" class="bottom-popup-icon-new">
               <div style="height:25px;" ><i class="fa fa-user bottom-popup-icon-new"  ></i></div>
               <font color="#333333" style="font-size:13px">ข้อมูลฉัน</font>
            </span>
            <span id="btn_qrcode_bottom_menu" style="display:noneS"  class="bottom-popup-icon-new" >
               <div style="height:25px;" ><i class="fa fa-qrcode"  ></i></div>
               <font color="#333333" style="font-size:13px"><? echo t_friends ?></font>
            </span>
         </td>
      </tr>
   </table>
</div>-->
<style>
   .bottom_popup
   { 
   font-size:18px;   padding:0px;  color:#666666;  width:100%; background-color:#FFFFFF;      
   border-bottom: 0px solid #e5e5e5; margin-bottom: 0px; padding-bottom:2px;
   position: fixed;
   bottom:  0;
   box-shadow: 1px 1px 10px #999999;
   left: 0; z-index:99999; margin-top:0px;
   }
   .bottom-popup-icon-new {
   font-size:26px; color:#999999; margin-bottom:1px;
   }
   .bottom-popup-icon-new-active {
   /*   font-size:26px; */
   color:<?=$main_color?>;    
   /*   margin-bottom:1px;*/
   }
</style>
<style>
   .back_popup_alert
   { 
   font-size:22px;   padding:2px;  color:#FFFFF;  width:100%;  background-color: #464646;
   border-bottom: 0px solid #ffffff; margin-bottom: 0px; margin-top:55px;
   position: fixed;
   top:  0;  
   box-shadow: 1px 1px 10px #999999;
   left: 0; z-index:999;
   }
</style>
<script>
   function hidepopup() {
   $( "#alert_show_shopping_place" ).hide();
   $('#main_load_mod_popup').hide();
   $('#main_load_mod_popup_1').hide();
   $('#main_load_mod_popup_2').hide();
   $('#main_load_mod_popup_3').hide();
   $('#main_load_mod_popup_4').hide();
   $('#main_load_mod_popup_5').hide();
   $('#main_load_mod_popup_6').hide();
   $('#main_load_mod_popup_map').hide();
   $('#main_load_mod_popup_photo').hide();
   $('#load_mod_popup').html('');
   $('#load_mod_popup_1').html('');
   $('#load_mod_popup_2').html('');
   $('#load_mod_popup_3').html('');
   $('#load_mod_popup_4').html('');
   $('#load_mod_popup_5').html('');
   $('#load_mod_popup_6').html('');
   $('#load_mod_popup_map').html('');
   $('#load_mod_popup_photo').html('');
   $('#load_mod_popup_select_pv').hide();
   /// home
   $("#btn_home_bottom_menu").removeClass("bottom-popup-icon-new-active");
   $("#btn_home_bottom_menu").addClass("bottom-popup-icon-new");
   /// home
   $("#btn_todaywork_bottom_menu").removeClass("bottom-popup-icon-new-active");
   $("#btn_todaywork_bottom_menu").addClass("bottom-popup-icon-new");
    /// newwork
   $("#btn_newwork_bottom_menu").removeClass("bottom-popup-icon-new-active");
   $("#btn_newwork_bottom_menu").addClass("bottom-popup-icon-new");
     /// qrcode
   $("#btn_qrcode_bottom_menu").removeClass("bottom-popup-icon-new-active");
   $("#btn_qrcode_bottom_menu").addClass("bottom-popup-icon-new");
   // $("#small_step_2").addClass("step-booking-active");
   if(document.getElementById('check_button_head_show_slide').value==1){
   $("#button_head_show_slide").click(); 
   document.getElementById('check_button_head_show_slide').value=0;
   $("#button_head_close").hide();
   $("#button_head_show").show();
   }
   }
  /* $('#btn_home_bottom_menu').click(function(){   
   hidepopup();
   $("#btn_home_bottom_menu").addClass("bottom-popup-icon-new-active");
   console.log('main menu');
   $('#load_mod_data').html(load_main_mod);
   $('#load_mod_data').html(load_main_mod);
   $('#navload_topic').html('ไปที่หน้าแรก');
    $('#load_mod_data').load('go.php');
   //$('#load_mod_data').load('load/loading/page_mod.php');
   // $('#load_mod_data').load('load_mod.php');
   //	location.reload();
   window.location = "https://www.welovetaxi.com/app/demo/index.php";
       	});*/
       	
</script>      
<script>
   $('#btn_allwork_bottom_menu').click(function(){  
   hidepopup();
    $('#load_mod_data').html(load_main_mod);
     $('#navload_topic').html('ไปที่งานทั้งหมด');
     $('#load_mod_data').load('popup.php?name=booking&file=all');
         	});
</script>      
<script>
   $('#btn_todaywork_bottom_menu').click(function(){  
   hidepopup();
   $("#btn_todaywork_bottom_menu").addClass("bottom-popup-icon-new-active");
   $('#index_menu_shopping_history').click();
   /* 
    $( "#load_mod_popup_3" ).toggle();
     $('#load_mod_popup_3').html(load_main_mod);
     var url_load= "load_page_mod_3.php?name=booking&file=today";
      $('#load_mod_popup_3').load(url_load);
     */
         	});
</script>      
<script>
   $('#btn_user_bottom_menu').click(function(){  
   hidepopup();
    $('#load_mod_data').html(load_main_mod);
    $('#load_mod_data').load('go.php?name=user&file=index');
         	});
</script>      
<script>
   $('#btn_newwork_bottom_menu').click(function(){  
   hidepopup();
   $('#index_menu_shopping').click();
   $("#btn_newwork_bottom_menu").addClass("bottom-popup-icon-new-active");
    $( "#alert_show_shopping_place" ).toggle();
    });
</script>   
<script>
   $('#btn_home_head_menu').click(function(){  
   /*hidepopup();
     $("#btn_home_bottom_menu").addClass("bottom-popup-icon-new-active");
    $('#load_mod_data').html(load_main_mod);
     $('#navload_topic').html('ไปที่หน้าแรก');
    $('#load_mod_data').load('go.php');*/
    	window.location = "https://www.welovetaxi.com/app/demo_new/index.php";
         	});
    /// qr code
   $('#btn_qrcode_bottom_menu').click(function(){  
   hidepopup();
    $("#btn_qrcode_bottom_menu").addClass("bottom-popup-icon-new-active");
    $( "#main_load_mod_popup_3" ).toggle();
     $('#load_mod_popup_3').html(load_main_mod);
     var url_load= "load_page_mod_3.php?name=user&file=qrcode";
      $('#load_mod_popup_3').load(url_load);
    	});
</script>      
<script>
   $('#logo_app').click(function(){  
    $('#btn_home_head_menu').click();
   });
</script>