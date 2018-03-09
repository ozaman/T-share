 <!-- Direct Chat -->
      <div class="row" >
        <div class="col-md-12">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary" >
            <div class="box box-default" >
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

<?
$db->connectdb(DB_NAME_CHAT,DB_USERNAME,DB_PASSWORD);
$res[timeline] = $db->select_query("SELECT * FROM welive_msg");
while($arr[chat] = $db->fetch($res[timeline])){
// echo $arr[chat][msg];
 
 
$i = ($all++ & 1) ? 0 : 1; 
 ?>
     <!-- Message. Default to the left -->
	 
	 
	 
	 <? 
	 if($i==1){
	 $b_name="pull-right";
	  $b_time="pull-left";
	  $b_main="right";
	 }
	 	else {
	 $b_name="pull-left";
	  $b_time="pull-right";
	 $b_main="";
	 }
 
	 ?>  
 <? //=$i?>
                <div class="direct-chat-msg  <?=$b_main?>">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name <?=$b_name?>"><?=$guest_name?>แขก</span>
                    <span class="direct-chat-timestamp <?=$b_time?>">23 Jan 2:00 pm</span>
                  </div>
 
				  
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                  这个模板真的是免费的吗？ 这令人难以置信！
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
 
 <? }  ?>
 
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
            <div class="box-footer" style="bottom:0 ; position:fixed">
              <form action="#"  >
                <div class="input-group">
                  <input type="text" name="message"  id="message" placeholder="เขียนข้อความ ..." class="form-control">   
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-default" style="margin-right:5px;  margin-left:5px; padding:5px; width:40px; "> <i class="fa fa-microphone" style="font-size:22px; color: #333333 " onclick="startDictation()"></i>  </button>
						                         <button type="button" class="btn btn-default" style="margin-right:0px;  margin-left:0px; padding:5px; width:40px; "> <i class="fa fa-smile-o" style="font-size:22px; color: #333333 "></i>  </button>
												 
                        <button type="button" class="btn btn-default" style="margin-left:5px; padding:5px; width:40px; "> <i class="fa fa-plus-square" style="font-size:22px; color: #333333 " onclick="startDictation()"></i>  </button> 
												 
						<button type="button" class="btn btn-primary btn-flat" style="display:none ">ส่งข้อความ</button>
                      </span>
                </div>
              </form>
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
		
     //    document.getElementById('labnol').submit();
      };
 
      recognition.onerror = function(e) {
        recognition.stop();
      }
 
    }
  }
</script>