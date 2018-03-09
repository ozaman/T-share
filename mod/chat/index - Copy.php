 <form id="chat_form" name="chat_form" action="" method="post" enctype="multipart/form-data"    target="uploadframe">
 
 <!-- Direct Chat -->
      <div class="row">
        <div class="col-md-12">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary" style="height:300px; ">
            <div class="box box-default">
              <h3 class="box-title">ห้องสนทนา</h3>

              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="3 ข้อความใหม่" class="badge bg-light-blue">3</span>
				
				
				
				
                <button type="button" class="btn btn-box-tool" data-widget="collapse"> 
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fa fa-comments"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
			
			 
			
			
 
            <!-- /.box-header -->
            <div class="box-body">
              <!-- เริมการแชท -->
       <div class="direct-chat-messages" style="height:100%; "> 
			  
			     <!-- Conversations are loaded here -->
			  
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left"><?=$guest_name?>แขก</span>
                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                  这个模板真的是免费的吗？ 这令人难以置信！
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <!-- เราเอง -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
				  
                    <span class="direct-chat-name pull-right"><?=$data_driver_nickname?></span>
                    <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                  </div>

				  
  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="http://t-booking.com/admin/file/driver/pic/<?=$arr[web_user][post_date];?>.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  
<div class="direct-chat-text" >
				  
                สวัสดีครับ 
				<div style=" border-top:  solid 1px #FFFFFF; margin-top:5px; padding-top: 5px; display:none">
				Hello
				
				</div>
				
				
				
                  </div>
				  
              
                </div>
				
                <!-- /.direct-chat-msg -->
				
				
				
				
				    <!-- ข้อความแขก -->
                <div class="direct-chat-msg" >
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left"><?=$guest_name?>แขก</span>
                    <span class="direct-chat-timestamp pull-right">23 Jan 2:18 pm</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
             吗？ 这令人难以置信！
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
				
				
				
				
				 <!-- เราเอง -->
                <div class="direct-chat-msg right" id="new_messge" style="display:none ">
                  <div class="direct-chat-info clearfix">
				  
                    <span class="direct-chat-name pull-right"><?=$data_driver_nickname?></span>
                    <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                  </div>

				  
  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="http://t-booking.com/admin/file/driver/pic/<?=$arr[web_user][post_date];?>.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text" >
				  <span id="text_new">สวัสดีครับ</span>
                 
				<div style=" border-top:  solid 1px #FFFFFF; margin-top:5px; padding-top: 5px; display:none">
				Hello
				
				</div>
				
				
				
                  </div>
				  
              
                </div>
				
                <!-- /.direct-chat-msg -->
				
				
				
				
				
				
				 <!--/จบการทำงาน-->
              </div>
              <!--/.direct-chat-messages-->
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  

              <!-- Contacts are loaded here -->
              <div class="direct-chat-contacts">
                <ul class="contacts-list">
                  <li>
                    <a href="#">
                      <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Image">

                      <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              Count Dracula
                              <small class="contacts-list-date pull-right">2/28/2015</small>
                            </span>
                        <span class="contacts-list-msg">How have you been? I was...</span>
                      </div>
                      <!-- /.contacts-list-info -->
                    </a>
                  </li>
                  <!-- End Contact Item -->
                </ul>
                <!-- /.contatcts-list -->
              </div>
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body --> 

            <div class="box-footer">
 			
                <div class="input-group">
				
				<div id="send_chat_data"> </div>								
				<div id="load_input_message">				 
                  <input type="text" name="message"  id="message" placeholder="เขียนข้อความ ..." class="form-control">    
    
				  </div>
				  
				 
				 
				  
				  <script>

$( document ).ready(function() {

$('#chat_submit').click(function() {
  alert('Submitted!');
    return false;
});

$('#message').on('keyup', function(e) {
   alert('Submitted!');
var contenteditable = document.querySelector('[contenteditable]'),
    text = contenteditable.textContent;
	
///alert(text);

 
 
    if (e.keyCode === 13) {
        $('#chat_submit').click();
		/////
   $('#new_messge').show();
 alert(text);
  $("#text_new").text(text );
  
 $.post('popup.php?name=check/save&file=register&type=user',$('#chat_form').serialize(),function(response){
 $('#send_chat_data').html(response);  });
 
		
		
		////
		
		
		document.getElementById('message').value="";
		// $('#message').unbind('keyup keydown keypress');
		 
		///document.getElementById('btn_emo').focus() ;
		
		//document.getElementById('message_blank').focus() ;
		
		///  alert(0);
		// $('#load_input_message').html("<input type='text' name='message'  id='message' placeholder='เขียนข้อความ' class='form-control' >");
    }
});

 


});

  
				  
				  </script>

                      <span class="input-group-btn" style="width:auto ">
					  
					 
					  
<button type="button" class="btn btn-default" style="margin-right:5px;  margin-left:5px; padding:5px; width:40px; "> <i class="fa fa-microphone" style="font-size:22px; color: #333333 " onclick="startDictation()"></i>  </button>
						      <!-- /.box-body -->                    
<button type="button" class="btn btn-default" style="margin-left:0px; padding:5px; width:40px; " data-toggle="dropdown"> <i class="fa fa fa-smile-o" style="font-size:22px; color: #333333 " ></i>  </button>  

<!-- /.box-body -->  
<button type="button" class="btn btn-default" style="margin-right:0px;  margin-left:5px; padding:5px; width:40px; " id="btn_emo"> <i class="fa fa-plus-square-o" style="font-size:22px; color: #333333 "></i>  </button>


 
<ul class="dropdown-menu dropdown-menu-right" >
<div class="selectable-icons" style="width:90% ;  ">
    <img src="//i.stack.imgur.com/nO2hl.png" /><img src="//i.stack.imgur.com/IkjJW.png" /><img src="//i.stack.imgur.com/QrKSV.png" /><img src="//i.stack.imgur.com/sZpOK.png" /><img src="//i.stack.imgur.com/d7HIy.png" /><img src="//i.stack.imgur.com/iUDpH.png" /><img src="//i.stack.imgur.com/IjpTt.png" /><img src="//i.stack.imgur.com/rDCTA.png" /><img src="//i.stack.imgur.com/YtkL1.png" /><img src="//i.stack.imgur.com/wPXCd.png" />
  </div>
  </ul> 
 
	  
	  
 
 
						<!-- /.box-body --> 
						
						
						
						
												 
						<button type="button" class="btn btn-primary btn-flat" style="display:none"  id="chat_submit">ส่งข้อความ</button>
                      </span>
                </div>
       
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>
        <!-- /.col -->
		
 
		
 
<script>
  function startDictation() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();
	  document.getElementById('message').value="";

      recognition.continuous = false;
      recognition.interimResults = false;
 
	   ////  recognition.lang = "zh-CN";
 
      recognition.lang = "th-TH";
      recognition.start();
 
      recognition.onresult = function(e) {
        document.getElementById('message').value
                                 = e.results[0][0].transcript;
								
        recognition.stop();
		
		$( document ).ready(function() {
		 $('#chat_submit').click();
		
		 
		});
     //    document.getElementById('labnol').submit();
      };
 
      recognition.onerror = function(e) {
        recognition.stop();
      }
 
    }
  }
  
  
document.querySelector('.selectable-icons').addEventListener('click', function(e) {
  if (e.target.value.toLowerCase() === 'img') {
   var pic= document.querySelector('[contenteditable]').appendChild(e.target.cloneNode(true));
 
  }
});
				
</script>
 

<style>
 
 [contenteditable] {
  border: 1px solid #999999;
  width:200px;;
  line-height: 30px;
  -webkit-appearance: textfield; background-color:#FFFFFF;
  appearance: textfield; 
}
img {

}
.selectable-icons img {
  cursor: pointer;
    vertical-align: top;
  max-height: 34px; 
  max-width: 34px;  padding:5px;
}

#message img {
  cursor: pointer;
    vertical-align: top;
  max-height: 34px; 
  max-width: 34px;  padding:5px;
}
/*Filter styles*/
.saturate {-webkit-filter: saturate(3); filter: saturate(3);}
.grayscale {-webkit-filter: color(200%); filter: grayscale(200%); ;}
.contrast {-webkit-filter: contrast(160%); filter: contrast(160%);}
.brightness {-webkit-filter: brightness(3);  }
.blur {-webkit-filter: blur(3px); filter: blur(3px);}
.invert {-webkit-filter: invert(100%); filter: invert(100%);}
.sepia {-webkit-filter: sepia(200%); filter: sepia(200%);}
.huerotate {-webkit-filter: hue-rotate(180deg); filter: hue-rotate(180deg);}
.rss.opacity {-webkit-filter: opacity(50%); filter: opacity(50%);}

</style>
 				         </form>
						<br>
<br>
<br>
<br>
<br>
 
						 