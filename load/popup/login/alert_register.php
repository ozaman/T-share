<style>
   .css-full-popup {
   position: fixed;
   left: 0px;
   top: 0px; 
   bottom:0;
   width: 100%;
   height: 100%;
   z-index: 9999; 
   overflow: auto ; padding:0px; background-color:#FFFFFF; padding:10px; 
   }
   .back-full-popup
   { 
   font-size:22px;   padding:10px;    width:100%; background-color:#1BB4B4;      
   border-top: 0px solid #000000; margin-bottom: 0px;  
   top:  0; position:fixed;
   z-index: 99999; 
   }
</style>
<div class="css-full-popup"  id="alert_show_register" style="display:none; position:fixed;    padding:0px; margin-top:0px; animation: showSweetAlert 0.3s; overflow-y: scroll; -webkit-overflow-scrolling: touch;">
   <div class="back-full-popup">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody><tr>
                     <td width="40">
                        <div class="button-close-popup-mod"><i class="fa fa-close" style="font-size:24px; color:#FFFFFF "></i></div>
                     </td>
                     <td>
                        <div style=" color:#FFFFFF " id="text_mod_topic_action" class="text-topic-action-mod font-28"><?=t_register_member;?></div>
                     </td>
                     <td width="50" align="right" style="display: none;">
                        <div style="font-size:22px; color:#FFFFFF " id="head_full_popup_icon"><i class="fa fa-sign-in" style=" font-size:26px;"></i></div>
                     </td>
                  </tr>
               </tbody></table>
    </div>
   <script>
      $(".button-close-popup-mod").click(function(){   
  		  $( "#alert_show_register" ).hide();
     });
   </script>
   <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
   <?  include "new_driver.php" ;?>
</div>