
	  
	  
	    <script>
	  					 
	$("#preview_image_album").click(function(){   
   $( "#popup_chat_preview_photo" ).slideToggle("slow");
 
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });							
							
 
	$("#btn_close_preview_photo").click(function(){   
  /// $( "#popup_chat_preview_photo" ).slideToggle("slow");
     $( "#show_chat_tool" ).slideToggle("slow");
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
  	$("#btn_close_preview_photo_back").click(function(){   
   $( "#popup_chat_preview_photo" ).slideToggle("slow");
     $( "#show_chat_tool" ).slideToggle("slow");
	 $(".messages").animate({ scrollTop: 99999 }, 3000);
  });
  
     </script>
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 <style>
 
.outer-container-photo {
    position: absolute; margin-left: 0px; margin-top: 0px; display:table; top:0; left:0;  
	
    display: table;
    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
   z-index:99999;  
	background: #000000;  
}

.inner-container-photo {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
}

.centered-content-photo {
    display: inline-block;
    text-align: left; width:100%;
   
 
    border : 1px solid #99999;  
	z-index:99999; background-color:#FFFFFF;   -moz-border-radius:10px;
  -webkit-border-radius:3px;

 border-radius:3px; 
}

</style>

 
<div id="popup_chat_preview_photo" style="display:none;z-index:999;  ">

	 
<div class="outer-container-photo" ><div class="back-full-popup" style="background-color:#000000;">
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div   id="btn_close_preview_photo_backd"><i class="fa  fa-share-alt" style="font-size:22px; color:#FFFFFF "> </div></i></td>
  <td   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup"> </div></td>
    <td width="50" align="right"   ><div style="font-size:18px; color:#FFFFFF " id="head_full_popup_icon"><i class='fa  fa-photo'></i></div></td>
  </tr>
</table>
</div>
   <div class="inner-container-photo">
     <div class="centered-content-photo">
 <div style=" position: relative">
<center><img id="preview_image_album" style="width:100%;border-radius: 0px; " />
 </center>
 </div>

</div>
     
<br>
 
     </div>
   </div>
</div>
 
 </div>
	 
	 
	 
	 