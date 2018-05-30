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
	<div style="position: absolute;right: 15px;;margin-top: 10px;">
	    <div class="button-close-popup-mod" onclick="$( '#alert_show_register' ).hide();">
	    	<i class="fa fa-close" style="font-size:34px; color:#000000;"></i>
	    </div>
    </div>

   <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
   <?  include "new_driver.php" ;?>
</div>