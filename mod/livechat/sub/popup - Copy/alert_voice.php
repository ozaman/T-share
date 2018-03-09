<style>
 

.outer-containervoice {
    position: absolute; margin-left: 0px; margin-top: 0px; display:table; top:100; left:0;  
    width: 100%; /* This could be ANY width */
 
   z-index:1; background:none;   
	
}

.inner-containervoice {
    display: table-cell;
    vertical-align: middle;
    text-align: center;background:none;   
}

.centered-contentvoice {
    display: inline-block;
    text-align: left; width:100%;
   
 
    border : 3px solid #ffffff;  
	z-index:99999; background-color:#626262;   -moz-border-radius:10px;
  -webkit-border-radius:3px;

 border-radius:20px;; height:220px; padding:10px; width:200px;  
 
}

</style>

 
<div id="alert_show_voice" style="display:none;z-index:9;  ">
<div class="outer-containervoice" >
   <div class="inner-containervoice">
     <div class="centered-contentvoice">
	 <?=$chat_part?>
	 
 <div id="load_chat_voice">


</div>
 
 
 

</div>
     
<br>
 
     </div>
   </div>
</div>
 
 </div>
 
 
		

		
<script>
/*
    	$(".outer-containervoice").click(function(){   
 // $('#save').click();   
 // $( "#alert_show_voice" ).fadeOut( "slow" );
 
  });
  */

</script>

<div style="display:none ">
<audio controls id="audio555"></audio>
    <div>
      <a class="button recordButton" id="record">Record</a>
      <a class="button recordButton" id="recordFor5">Record For 5 Seconds</a>
      <a class="button disabled one" id="pause">Pause</a>
      <a class="button disabled one" id="stop">Reset</a>
    </div><br/>
    <div>
      <input type="checkbox" class="button" id="live" checked/>
      <label for="live">Live Output</label>
    </div>
 
    <div data-type="mp3">
      <p>MP3 Controls:</p>
      <a class="button disabled one" id="play">Play</a>
      <a class="button disabled one" id="download">Download</a>
      <a class="button disabled one" id="base64">Base64 URL</a>
      <a class="button disabled one" id="save">Upload to Server</a>
    </div>
    

</div>