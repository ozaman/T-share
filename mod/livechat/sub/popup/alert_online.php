<style>
body {
    margin : 0;
}

.outer-container {
    position: absolute; margin-left: 0px; margin-top: 0px; display:table; top:0; left:0;  
    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
   z-index:99999;  
	background: url('images/bg-popup.png');  
}

.inner-container {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
}

.centered-content {
    display: inline-block;
    text-align: left; width:80%;
   
 
    border : 3px solid <?=$maincolor?>;  
	z-index:99999; background-color:#F6F6F6;   -moz-border-radius:10px;
  -webkit-border-radius:3px;

 border-radius:150px; height:150px; padding:10px; width:150px;  
}

</style>

 
<div id="alert_show_user_online" style="display:none;z-index:99999;  ">
<div class="outer-container" >
   <div class="inner-container">
     <div class="centered-content">
 

<div   style="border:none; color:#000000; font-size:16px; "><center><img   src="images/icon/user/<?=$chat_to?>.png?v=<?=$cache;?>" alt="Message User Image"></center></font></b>  </div> 

 <div    style="color:#000000; font-size:20px; text-transform:capitalize;z-index:99999; margin-top: 5px; "><center> <? 
 if($chat_to=='customer'){
 echo  chat_user_customer; 
 }
  if($chat_to=='driver'){
 echo  chat_user_driver; 
 }
   if($chat_to=='callcenter'){
 echo  chat_user_driver; 
 }
    if($chat_to=='agent'){
 echo  chat_user_agent; 
 }
 
 ?><div style="margin-top:-5px; "><font  color=" #FF0000">
 <b><?=chat_online?></b></font></center></span></font></b></div></div>
 
 

</div>
     
<br>
 
     </div>
   </div>
</div>
 
 </div>
 
<script>
    	$(".outer-container").click(function(){   
 
   $( "#alert_show_user_online" ).fadeOut( "slow" );
 
  });

</script>

