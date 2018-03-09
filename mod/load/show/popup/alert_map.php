<style>
body {
    margin : 0;
}

.outer-container-map{
    position: absolute; margin-left: 0px; margin-top: 0px; display:table; top:0; left:0;  
	
 
    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
   z-index:99999;  
	background: url('images/bg-popup.png');  
}

.inner-container-map {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
}

.centered-content-map {
    display: inline-block;
    text-align: left; width:80%;
   
 
    border : 1px solid #99999;  
	z-index:99999; background-color:#FFFFFF;   -moz-border-radius:10px;
  -webkit-border-radius:3px;

 border-radius:3px; 
}

</style>

 
<div id="alert_show_map" style="display:none;z-index:99999;  ">
<div class="outer-container-map" >
   <div class="inner-container-map">
     <div class="centered-content-map">
 
<a  id="button_alert_show_map_now"><div  class="drop-sub-menu-link" style="color:#000000; font-size:16px; ">&nbsp; <?=chat_send_location?></span></font></b></div></a>
<a id="button_alert_show_map_realtime"><div  class="drop-sub-menu-link" style="border:none; color:#000000; font-size:16px; ">&nbsp;  <?=chat_send_location_realtime?></font></b>  </div></a>

</div>
     
<br>
 
     </div>
   </div>
</div>
 
 </div>
 
<script>
    	$(".outer-container-map").click(function(){   
    ///$(".outer-container-map" ).fadeOut( "slow" );
   $( "#alert_show_map" ).fadeOut( "slow" );
 
  });

</script>