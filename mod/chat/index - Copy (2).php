 <select name="type_message" size="80"    id="type_message"    style="font-size:14px; padding-bottom: 1px; padding: 3px;  background-color:#FFFDE9; height:30px; width:200px;overflow:auto;"  ">
                        <?  
                      $db->connectdb(DB_NAME_CHAT,DB_USERNAME,DB_PASSWORD);
                   $res[category] = $db->select_query("SELECT * FROM  message_data_store  where type_main=1  ORDER BY id asc");
while ($arr[category] = $db->fetch($res[category])){
 
 
  
	   echo "<option value=\"".$arr[category][topic_th]."\"";
	   if($arr[category][id] == $_GET[type]){echo " Selected";}
	   echo ">".$arr[category][topic_th]." </option>";
	   }
                      $db->closedb ();
                      ?>
                  </select 
   >
  <?
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);  
$res[vc] = $db->select_query("SELECT drivername  FROM web_order  WHERE invoice='".$_GET[vc]."'  "); 
$arr[vc] = $db->fetch($res[vc]);
$arr[vc][drivername];
    
  ?>

<input name="chat_driver_id" type="hidden" id="chat_driver_id" value="<?=$arr[vc][drivername]?>" />  <br />
<input name="chat_vc_id" type="hidden" id="chat_vc_id" value="<?=$_GET[vc]?>" />  <br />
  
   <!-- Direct Chat -->
 
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary" style="height:15x;  overflow:auto;padding-bottom:10px; margin-top:-30px; margin-bottom:-30px;  "  id="main_message_chat">
            <div class="box box-default" >
              <h3 class="box-title">ห้องสนทนาสด</h3>

              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="3 ข้อความใหม่" class="badge bg-light-blue">3</span>
 
                <button type="button" class="btn btn-box-tool" data-widget="collapse"> 
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fa fa-comments" style="font-size:20px "></i></button>
            
              </div>
            </div>
			
			 
			
			
 
            <!-- /.box-header -->
            <div class="box-body" > 

              <!-- เริมการแชท -->
       <div class="direct-chat-messages" style="height:auto; overflow:auto ; padding-left:5px; margin-bottom:100px;" id="load-direct-chat"> 
			  
			 
 
 </div> 
              <!--/.direct-chat-messages-->
			  
			  
			   
			  
			  
			  
			  
			  

           
              <!-- /.direct-chat-pane -->
 
            </div>
            <!-- /.box-body --> 

            
            <!-- /.box-footer-->
          </div>
		
          <!--/.direct-chat -->
        </div>
        <!-- /.col -->
		
 
		 <style>
.bottom_popup_chat
{ 
font-size:22px;   padding:5px;  color:#666666;  width:100%; background-color:#F6F6F6;      
 border-bottom: 0px solid #e5e5e5; margin-bottom: 0px; padding-bottom:5px;
 
position: fixed;
  bottom:  0;
 
 
 
}
 
 </style>
 


 
				<div class="bottom_popup_chat">
				
				 
				
				
				
				  <form id="chat_form" name="chat_form"  action="?name=chat&file=savedata&type=guest"  target="uploadframe2" method="post">  
   <iframe id="uploadframe2" name="uploadframe2" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
				<div class="box-footer" style="position:fixeds; padding-bottom:5px; margin-top:-20px; margin-left:5px; margin-right:5px;">
 			
                <div class="input-group">
				
				
				<div id="load_input_message">				 
                  <input type="text" name="message"  id="message" placeholder="เขียนข้อความ ..." class="form-control">    
    
     </div>
   </form>
				 
				 
				  
				
                      <span class="input-group-btn" style="width:auto ">
					  
					 
					  
<button type="button" class="btn btn-default" style="margin-right:5px;  margin-left:5px; padding:5px; width:40px; "> <i class="fa fa-microphone" style="font-size:22px; color: #333333 " onclick="startDictation()"></i>  </button>
						      <!-- /.box-body -->                    
<button type="button" class="btn btn-default" style="margin-left:0px; padding:5px; width:40px; "  > <i class="fa fa fa-smile-o" style="font-size:22px; color: #333333 " ></i>  </button>  

<!-- /.box-body -->  
<button type="button" class="btn btn-default" style="margin-right:0px;  margin-left:5px; padding:5px; width:40px; " id="btn_type"> <i class="fa fa-plus-square-o" style="font-size:22px; color: #333333 "></i>  </button>


 
 
	  
	  
 
 
						<!-- /.box-body --> 
						
						
						
						
												 
						<button type="button" class="btn btn-primary btn-flat" style="display:nones"  id="chat_submit">ส่ง</button>
                      </span>
                </div>
       
            </div>  
				  
				 </div> 
				 
 
						 
 
	 
  <script>
  /////
  $('#btn_type').click(function() {
 
 
  
  $('#type_message').show();
  alert(0);
  
  	});
	
	  $('#type_message').change(function() {
 
 	document.getElementById('message').value=document.getElementById('type_message').value;
  
  	});
	

	
	
	
 
   var url_chat = "go.php?name=livechat&file=sub&vc=<?=$_GET[vc]?>";
 
  $('#load-direct-chat').load(url_chat); 
 

 
 
 
 
 
$('#chat_submit').click(function() {
 

  
   $.post('go.php?name=livechat&file=savedata&type=new',$('#chat_form').serialize(),function(response){
 $('#send_chat_data').html(response);  });


  var url_chat = "go.php?name=livechat&file=sub&vc=<?=$_GET[vc]?>";
  $('#load-direct-chat').load(url_chat); 
   document.getElementById('message').value="";
   
 

 
    return false;
	});


$('#message').on('keyup', function(e) {
 
 
	
///alert(text);

 
 
    if (e.keyCode === 13) {
  
   $.post('go.php?name=livechat&file=savedata&type=new',$('#chat_form').serialize(),function(response){
 $('#send_chat_data').html(response);  });


  var url_chat = "go.php?name=livechat&file=sub&vc=<?=$_GET[vc]?>";
  $('#load-direct-chat').load(url_chat); 
 
		
		
		document.getElementById('message').value="";
		// $('#message').unbind('keyup keydown keypress');
		 
		///document.getElementById('btn_emo').focus() ;
		
		//document.getElementById('message_blank').focus() ;
		
		///  alert(0);
		// $('#load_input_message').html("<input type='text' name='message'  id='message' placeholder='เขียนข้อความ' class='form-control' >");
    }
});

    
				  </script>
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
		
 
		 $('#chat_submit').click();
		
		 
 
     //    document.getElementById('labnol').submit();
      };
 
      recognition.onerror = function(e) {
        recognition.stop();
      }
 
    }
  }
  
  
 
				
</script>
   <div id="send_chat_data"> </div>								
   
   
   <div    class="modal fade" id="popup_chat_show_pic" role="dialog"   aria-labelledby="myModalLabel"   style=" padding:0px; "  >
 <? //  include ("load/page/back_popup.php");?> 
 <div class="modal-dialog"   style=" padding:0px;" >

            <!-- Modal  class="modal fade" content-->
            <div class="modal-content"  style=" padding:0px;"  > 
 
 
                <div class="modal-body"  style=" padding:0px;    ">
				<button type="button" class="close" data-dismiss="modal" style="font-size:50px; ">&times;</button>
				<img src=""    align="absmiddle" style="padding: 0px; width:100%;  "  id="full_pic_chat_en"  class="img-chat-pics"  data-dismiss="modal" data-backdrop="static" >
				
				</div> 

 
              
            </div>
  </div>
 
</div>	



 
</div>







<?
$ok_button_color="#0ACB68";
$no_button_color="#F50202";

?>

<style>
.btnstatus{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; height:40px; font-size:14px; width:100px; margin-right:15px; background-color:#367FA9;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF;

}
.btnstatus:hover{

background-color:#999999;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF; border:0px solid #FFFFFF; 
}


.btn-modal-ok{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; font-size:20px; width:120px; background-color:<?=$ok_button_color?>;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF

}
.btn-modal-ok:hover{

background-color:#999999;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
}

.btn-modal-no{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; font-size:20px;  width:120px; background-color:<?=$no_button_color?>;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
}

.btn-modal-no:hover{
background-color:#999999;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
}
 
</style> 

<style>
  .modal-backdrop {
   background-color:#FFFFFF; opacity: 0.5;
  padding:0px;   
}

.modal.fade:not(.in) .modal-dialog {
box-shadow:none;  top:0;
    background-color:#000000
    -webkit-transform: translate3d(-50%, 0, 0);
    transform: translate3d(-50%, 0, 0);   padding:0px;   
 
}

.modal {
box-shadow:none;
    background-color:#FFFFFF; z-index:99999; opacity: 0.5;
 
 
}
.modal {
box-shadow:none;
  padding:0px;   
	
	
 
}

.modal-dialog {  
 
padding:0px;   
}
.modal-content {
 box-shadow:none;  border:none; padding:0px;   

}
body.modal-open { 
  padding-right: 0 !important; 
 
}
body.modal-open {
    overflow: visible;
    position: absolute;
    width: 100%;
    height:100%;    padding:0px;   
}  
body. { position:fixed;

}


 </style>







  <div    class="modal fade" id="popup_chat_show_map" role="dialog"   aria-labelledby="myModalLabel"   style=" padding:0px;"    >
 <? //  include ("load/page/back_popup.php");?> 
 <div class="modal-dialog"   style=" padding:0px;"  >

            <!-- Modal  class="modal fade" content-->
            <div class="modal-content"  style=" padding:0px;"   > 
 
 
                <div class="modal-body"   style=" padding:0px;" >
				<button type="button" class="close" data-dismiss="modal" style="font-size:50px; ">&times;</button>
				 <div id="load_map_gps"  style=" padding:0px;" >
 
				 </div>
				
				</div> 

 
              
            </div>
  </div>
 
</div>	



 
</div>

 