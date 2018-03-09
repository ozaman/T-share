			 
			 
			 <input type="text" name="q" id="transcript" placeholder="กรุณาพูด" /  style="width:100%; border:none; font-size:18px; text-align:center "><center>
<img src="images/talk/close.png" width="200"  align="absmiddle" id="icon_mic_status" style="margin-top:10px; "></center>
<script>
 function startDictation() {
 
    if (window.hasOwnProperty('webkitSpeechRecognition')) {
 
 
      var recognition = new webkitSpeechRecognition();
 
      recognition.continuous = true;
      recognition.interimResults = true;
 
      recognition.lang = "th-TH";
      recognition.start();
      $("#icon_mic_status").attr("src", "images/talk/open.gif");
      recognition.onresult = function(e) {
	 

	
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
								// responsiveVoice.speak('ค่าเที่ยววันนี้,150  บาท ,  ขอบคุณค่ะ', 'Thai Female', {rate: 0.9});
								 
								 if( document.getElementById('transcript').value=="ถึงสถานที่รับ" ||  document.getElementById('transcript').value=="สถานที่รับ"  ){								
 $("#dropdown").hide();
 
responsiveVoice.speak('กรุณาทำการยืนยันด้วยค่ะ , ', 'Thai Female', {rate: 0.9});
 
								/// window.location.href = "index.php?name=pay&file=all"; //will redirect to your blog page (an ex: blog.html) 
								} 
								
						 if( document.getElementById('transcript').value=="ยืนยัน" ){								
 $("#dropdown").hide();
 
responsiveVoice.speak('ยืนยันการมาถึงสถานที่รับสำเร็จค่ะ , ', 'Thai Female', {rate: 0.9});
 
								/// window.location.href = "index.php?name=pay&file=all"; //will redirect to your blog page (an ex: blog.html) 
								} 
								 
								        setTimeout(function () {
										
 if( document.getElementById('transcript').value=="เช็คยอดเงิน"){								
 $("#dropdown").hide();
 
responsiveVoice.speak('ค่าเที่ยววันนี้,200 บาท ,  ขอบคุณค่ะ', 'Thai Female', {rate: 0.9});
 
								/// window.location.href = "index.php?name=pay&file=all"; //will redirect to your blog page (an ex: blog.html) 
								}
								if( document.getElementById('transcript').value=="งานวันนี้"){								
								window.location.href = "index.php?name=today"; //will redirect to your blog page (an ex: blog.html)  
//$('#load_data_mod').load('load/page/loading_main.php');
 //$('#load_data_mod').load('load.php?name=today'); 
								}
									if( document.getElementById('transcript').value=="งานทั้งหมด"){								
									
window.location.href = "index.php?name=all"; //will redirect to your blog page (an ex: blog.html) 
									
	//$('#load_data_mod').load('load/page/loading_main.php');
// $('#load_data_mod').load('load.php?name=all'); 
									 
								/// window.location.href = "index.php?name=all"; //will redirect to your blog page (an ex: blog.html) 
								}
								 
 
}, 2000); //w 
								 
								 
								
     ///   recognition.stop();
		  $("#icon_mic_status").attr("src", "images/talk/close.png");
    //    document.getElementById('labnol').submit();
      };
 
      recognition.onerror = function(e) {
	    $("#icon_mic_status").attr("src", "images/talk/close.png");
	 // alert('สำเร็จ');
	  
    ///    recognition.stop();
		  
      }

    } 
 
  }
  


</script>