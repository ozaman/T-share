

function restore(){

  $("#record, #live").removeClass("disabled");
  
  $("#pause").replaceWith('<a class="button one" id="pause">Pause</a>');
  $(".one").addClass("disabled");
  Fr.voice.stop();
}

function makeWaveform(){
  var analyser = Fr.voice.recorder.analyser;
 

  var bufferLength = analyser.frequencyBinCount;
  var dataArray = new Uint8Array(bufferLength);

  /**
   * The Waveform canvas
   */
  var WIDTH = 200,
      HEIGHT = 100;

  var canvasCtx = $("#level")[0].getContext("2d");
  canvasCtx.clearRect(0, 0, WIDTH, HEIGHT);

  function draw() {
    var drawVisual = requestAnimationFrame(draw);

    analyser.getByteTimeDomainData(dataArray);

    canvasCtx.fillStyle = 'rgb(98, 98, 98)';
    canvasCtx.fillRect(0, 0,180,100);
    canvasCtx.lineWidth = 1;
    canvasCtx.strokeStyle = 'rgb(255, 255, 255)';

    canvasCtx.beginPath();

    var sliceWidth = WIDTH * 1.0 / bufferLength;
    var x = 0;
    for(var i = 0; i < bufferLength; i++) {
      var v = dataArray[i] / 128.0;
      var y = v * HEIGHT/2;

      if(i === 0) {
        canvasCtx.moveTo(x, y);
      } else {
        canvasCtx.lineTo(x, y);
      }

      x += sliceWidth;
    }
    canvasCtx.lineTo(WIDTH, HEIGHT/2);
    canvasCtx.stroke();
  };
  draw();
}

$(document).ready(function(){
  $(document).on("click", "#record:not(.disabled)", function(){
															 

															 
    Fr.voice.record($("#live").is(":checked"), function(){
														
														
      $(".recordButton").addClass("disabled");

      $("#live").addClass("disabled");
      $(".one").removeClass("disabled");

      makeWaveform();
    });
  });

  $(document).on("click", "#recordFor5:not(.disabled)", function(){
    Fr.voice.record($("#live").is(":checked"), function(){
      $(".recordButton").addClass("disabled");

      $("#live").addClass("disabled");
      $(".one").removeClass("disabled");

      makeWaveform();
    });

    Fr.voice.stopRecordingAfter(5000, function(){
      alert("Recording stopped after 5 seconds");
    });
  });

  $(document).on("click", "#pause:not(.disabled)", function(){
    if($(this).hasClass("resume")){
      Fr.voice.resume();
      $(this).replaceWith('<a class="button one" id="pause">Pause</a>');
    }else{
      Fr.voice.pause();
      $(this).replaceWith('<a class="button one resume" id="pause">Resume</a>');
    }
  });

  $(document).on("click", "#stop:not(.disabled)", function(){
    restore();
  });

  $(document).on("click", "#play:not(.disabled)", function(){
    if($(this).parent().data("type") === "mp3"){
      Fr.voice.exportMP3(function(url){
        $("#audio").attr("src", url);
        $("#audio")[0].play();
      }, "URL");
    }else{
      Fr.voice.export(function(url){
        $("#audio").attr("src", url);
        $("#audio")[0].play();
      }, "URL");
    }
    restore();
  });

  $(document).on("click", "#download:not(.disabled)", function(){
    if($(this).parent().data("type") === "mp3"){
      Fr.voice.exportMP3(function(url){
        $("<a href='" + url + "' download='MyRecording.mp3'></a>")[0].click();
      }, "URL");
    }else{
      Fr.voice.export(function(url){
        $("<a href='" + url + "' download='MyRecording.wav'></a>")[0].click();
      }, "URL");
    }
    restore();
  });

  $(document).on("click", "#base64:not(.disabled)", function(){
    if($(this).parent().data("type") === "mp3"){
      Fr.voice.exportMP3(function(url){
        console.log("Here is the base64 URL : " + url);
        alert("Check the web console for the URL");

        $("<a href='"+ url +"' target='_blank'></a>")[0].click();
      }, "base64");
    }else{
      Fr.voice.export(function(url){
        console.log("Here is the base64 URL : " + url);
        alert("Check the web console for the URL");

        $("<a href='"+ url +"' target='_blank'></a>")[0].click();
      }, "base64");
    }
    restore();
  });

  $(document).on("click", "#save:not(.disabled)", function(){
												 
    function upload(blob){
		
		
//alert(111);
		
		
		 document.getElementById('statetype').value='voice_message';
 
		 
		 
		
  var url_voice="go.php?name=livechat&file=savedata&type=new&state_type=voice_message";

//url_voice=url_voice+"&vc="+document.getElementById('vc_chat').value;

url_voice=url_voice+"&vc="+document.getElementById('vc_chat').value;
url_voice=url_voice+"&chat_from="+document.getElementById('chat_from').value;
url_voice=url_voice+"&chat_to="+document.getElementById('chat_to').value;		 
		 
	url_voice=url_voice+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
	url_voice=url_voice+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 	url_voice=url_voice+"&state="+document.getElementById('state').value;
	 
/// alert(url_voice);
		
		
		  
      var formData = new FormData();
      formData.append('file', blob);


	
	

      $.ajax({
        url: url_voice,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(url) {
  
			 $( "#popup_chat_preview_voice" ).slideToggle();
 
        }
      });
    }
  Fr.voice.exportMP3(upload, "blob");
    restore();
  });
});
