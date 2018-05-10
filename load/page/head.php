<?
   $gps_icon_color="#FFED22";
   ?>
<!------ class="modal fade"----> 
<!------ end---->
<style type="text/css">
   .mainpic_qr {
   padding:10px; color:#000000;    
   border:3px solid <?=$main_color?>; background-color:#FFFFFF; 
   box-shadow: 2px 1px 10px #333333; margin-right:5px; margin-bottom:5PX;max-width:400px;
   }
   #mainheadmenu {
   position:fixed ;   
   z-index:999; 
   width:100%; 
   box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
   background-color:<?=$main_color?>; 
   margin-top:-5px; 
   padding:0px;
/*   border-bottom:1px solid #FFFFFF; */
   }
   #mainheadmenu a:hover {
   background-color:#4BA7DC;padding:0px;
   }
   #mainheadmenu a:hover {
   padding:0px; color:#FFFFCC; background:none;
   }
   #mainheadmenu  a:active {
   color:#FFFFCC;padding:0px;
   }
   .drop-sub-menu-link {
   padding:15px; font-size:14px; padding-left:10px; padding-bottom:15px; padding-top:15px; margin-left:5px; position: relative; color:#999999;
   border-bottom:  solid 0.5px #DADADA;
   }
   .drop-sub-menu-link-chat {
   padding:15px; font-size:14px; padding-left:10px; padding-bottom:15px; padding-top:10px; margin-left:5px; position: relative; 
   border-bottom:  solid 0.5px #DADADA;
   }
   .drop-sub-chat-link {
   padding:5px; font-size:14px; padding-left:5px; margin-left:5px; position: relative;
   border-bottom:  solid 0.5px #DADADA;
   }
   .drop-chat-link {
   padding:15px; font-size:14px; padding-left:10px; padding-bottom:15px; padding-top:15px; margin-left:5px; position: relative; color:#FFFFFF;
   border-bottom:  solid 0.5px #DADADA;
   }
   .drop-sub-menu-link-none {
   padding:15px; font-size:14px; padding-left:10px; margin-left:5px; margin-right:5px;
   border-bottom:  solid 0px #737373;
   }
   .drop-sub-menu-span {
   margin-left:30px; color:#666666; margin-top:5PX;   
   }
   .drop-menu-icon { 
   font-size:26px;  color:<?=$main_color?>; padding-right:5px; padding-bottom:5PX; display:block; position:absolute;
   }
   .drop-menu-icon-chat { 
   font-size:26px;  color:<?=$main_color?>; padding-right:5px; padding-bottom:5PX; display:block; position:absolute;
   }
   @-webkit-keyframes gps-color {
   0%   { color: <?=$gps_icon_color?> }
   25%  { color: white; font-size:30px; }
   50%   { color: <?=$gps_icon_color?> }
   75%  { color: white; font-size:30px; }
   100% { color: <?=$gps_icon_color?> }
   }
   @-moz-keyframes gps-color {
   }
   .gps-status-icon {
   font-size:30px;
   -webkit-transition: all 2s;
   -moz-animation: gps-color 2s infinite;
   -webkit-transition: all 2s;
   -webkit-animation: gps-color 2s infinite;
   }
   -->
   .top-menu-shop{
   border-radius:  8px; background-color:<?=$main_color_sorf?>; display:block;
   padding: 5px; 
   width: 36px;
   height: 36px; 
   text-align: justify; color:#FFFFFF;    font-size:20px; font-weight:bold; margin-top: px;  
   border: solid 2px #FFFFFF;
   }
</style>
<!-- <script >
   //var offsetHeight = document.getElementById('mainheadmenu').offsetHeight;
   $( document ).ready(function() {
   var offsetHeight = document.getElementById('test').offsetHeight;
   /// alert(offsetHeight);
   });
   function MM_reloadPage(init) {  //reloads the window if Nav4 resized
    if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
      document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
    else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
   }
   </script>-->
<div  class="main-header" id="mainheadmenu" style="height:56px; padding-bottom:55px;    "  >
   <header>
      <!-- Logo --> 
      <table width="100%"  border="0" cellspacing="0" cellpadding="0" style="margin-top:10px; position:fixed  ; ">
         <tr>
            <td style="width:45px;display:nones ">
               <a href="#"   data-toggle="offcanvas" role="button" id="button_head_show_slide" style="font-size:30px; padding:5px; padding-top:0px; padding-bottom:0px; color:#FFFFFF !important; height:50px;    "> 
               <span  class="fa fa-navicon"  style="margin-top: 5px;" id="button_head_show"></span> 
               <span  class="fa fa-close"  style="margin-top: 5px; display:none" id="button_head_close"></span> 
               <b> </b>
               </a>
               <input name="check_button_head_show_slide" type="hidden" id="check_button_head_show_slide" style="height:25px; width:25px;" value="0" 
                  >
               <script>
                  $("#button_head_show_slide").click(function(){   
                  $("html, body").animate({scrollTop:0},  0 );
                  if(document.getElementById('check_button_head_show_slide').value==0){
                  document.getElementById('check_button_head_show_slide').value=1;
                  $("#button_head_show").hide();
                  $("#button_head_close").show();
                  setTimeout(function () {
                  //$("#button_head_show_slide").html('<i  class="fa fa-navicon"  style="margin-top: 5px;"></i>'); 
                  //$("#button_head_show_slide").addClass('fa fa-close'); 
                  }, 1000); //w
                  /// fa-close
                  return;   
                  }
                    if(document.getElementById('check_button_head_show_slide').value==1){
                  document.getElementById('check_button_head_show_slide').value=0;
                  $("#button_head_close").hide();
                  $("#button_head_show").show();
                   return;   
                  }
                  });
               </script>
            </td>
            <td align="center" style="display:nones; padding-left:0px;">
               <img src="images/logo_tex.png?v=4" height="30"    align="absmiddle" style="display:nones" id="logo_app"> 
               <script>
                  $('#logo_app').click(function(){  
                   $('#btn_home_head_menu').click();
                  });
               </script>
               <div style="font-size:26px; color:#FFFFFF"><B> </div>
            </td>
           <!--  <td width="40"  align="left"  style="padding-top:5px;" > <span > <i  class="icon-new-uniF12A-4"  style="font-size:22px; padding-left: 2px; color:#FFFFFF;margin-top:-20px;"   id="btn_gps_head_menu"></i></span>
            </td> -->
            <td width="40"  align="left"  >
               <span >    <i  class="fa  fa-home"  style="font-size:30px; padding-left: 2px; color:#FFFFFF"   id="btn_home_head_menu"></i></span>
               <? 
                  ///// head
                  ///include "load/top/menu/taxi.php" ;
                   ?>
            </td>
         </tr>
      </table>
      <!-- Header Navbar: style can be found in header.less -->
      <!-- Sidebar toggle button-->
      <!----- end logo-->
      <br>
   </header>
</div>