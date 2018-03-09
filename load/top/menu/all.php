<?
$btn_main_w='30';
$btn_main_h='30';
$btn_li_z='22';



?>   
<div class="navbar-custom-menu" style=" padding:0px; "  >  
        <ul class="nav navbar-nav" style="margin-top:-5px; padding:0px; ">
		
		  <li class="dropdown notifications-menu" style="margin-top:5px;  ">
 
 
	  </li>



         		  
          <!-- Notifications: style can be found in dropdown.less -->
		 
			  
			  <!------>
 
		  
 <i  class="dropdown-toggles" data-toggle="dropdown" style="padding:3px">
		  		      <li  class="dropdown notifications-menu" style="margin-top:20px; margin-right:5px; width:34px;   ">  
 <i  id="top_menu_icon_share" class="fa  fa-share-alt" style="font-size:30px; color:#FFFFFF "></i>   

        </i>  
		 
		 
		    <ul class="dropdown-menu" role="menu" style="right:3; width:100%;   background-color:#ffffff"   onClick="event.stopPropagation();"> 
			 <div style="padding:5px;width:100%; " id="load_topmenu_share"> 
 
 </div>
 
  
        </ul>
		  
 
		  
 <i class="dropdown-toggles" data-toggle="dropdown" style="padding:3px">

<li   class="dropdown notifications-menu" style="margin-top:20px; margin-right:5px; width:34px;   ">
 <i  id="main_gps_status" style=" font-size:30px; color: #CCCCCC " class="fa fa-map-marker " ></i>  
</i>
		   
		    <ul class="dropdown-menu" role="menu" style="right:3; width:100%;   background-color:#ffffff"   onClick="event.stopPropagation();"> 
			 <div style="padding:5px;width:100%; height:300px; " id="load_topmenu_gps"> 
 </div>
 
  
        </ul>
		
		   
 
 
		  
		     <i  class="dropdown-toggles" data-toggle="dropdown" style="padding:3px">
<li class="dropdown notifications-menu" style="margin-top:20px; margin-right:5px;width:34px;   ">
 <i id="top_menu_icon_talk" class="fa fa-microphone" style="font-size:30px; color: #FFFFFF "></i>  
         </i>
		  
		  
		     <ul class="dropdown-menu" role="menu" style="right:3; width:100%;   background-color:#ffffff"   onClick="event.stopPropagation();"> 
			 <div style="padding:5px;width:100%; " id="load_topmenu_talk" onclick="startDictation()"  >

 </div>
  
        </ul>
		
 
 
<i  class="dropdown-toggles" data-toggle="dropdown" style="padding:3px">
		  		      <li class="dropdown notifications-menu" style="margin-top:20px; margin-right:5px;  ">
 <i id="top_menu_icon_setting" class="fa fa-gear" style="font-size:30px; color:#FFFFFF "></i>  
         </i>
 
		     <ul class="dropdown-menu" role="menu" style="right:3; width:100%;  background-color:#ffffff"   onClick="event.stopPropagation();"> 
  <div style="padding:5px;width:100%; " id="load_topmenu_setting"> 

 
 </div>
             
         
		  
		  
		  
        </ul>
		
		
		
		
		
		 
		
		</div>
		
		</div>
 
	      <script>
 
    $("#top_menu_icon_share").click(function(){
  //alert('share');
 $('#load_topmenu_share').load('load/top/network.php');
  
  });
  
$("#top_menu_icon_talk").click(function(){
 ///alert('talk');
 $('#load_topmenu_talk').load('load/top/talk.php');
  
  });
  
  $("#top_menu_icon_setting").click(function(){
 
 $('#load_topmenu_setting').load('load/top/setting.php');
  
  });



  
  $("#main_gps_status").click(function(){
 // alert('gps');
 $('#load_topmenu_gps').load('google/check_system.php');
  
  });
  
  
  
</script> 




  