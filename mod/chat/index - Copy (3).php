 
<!-- Modal -->
<div id="popup_chat_share_map"  class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
                <div class="modal-body"  id="load_chat_share_map">  
		  
		 
		  
		  
</div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div    class="modal fade" id="popup_chat_share_maps" role="dialog"   aria-labelledby="myModalLabel"    >
 <?  include ("load/page/back_popup.php");?>
 <div class="modal-dialog"  >

            <!-- Modal  class="modal fade" content-->
            <div class="modal-content"  > 
 
                    <h4 class="modal-title" style="font-size:25px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase">
					
					
					<center><b> แชร์ตำแหน่งเรียลไทม์</b></center></h4>
 
                <div class="modal-body"  id="load_chat_share_map">  
		  
		 
		  
		  
</div> 

 
                <div class="modal-footer" style="margin-top:-10px;">
				       <center>
					 <button type="button" class="btn btn-modal-no" data-dismiss="modal" data-backdrop="static" id="btn_no_no_guest_<? echo $arr[project][id];?>" >ไม่แน่ใจ</button>
					 <button type="button" class="btn btn-modal-ok"   data-dismiss="modal" data-backdrop="static" id="btn_confirm_no_guest_<? echo $arr[project][id];?>" >แน่ใจ</button>
 
    
                </div>
            </div>
  </div>
 
</div>	

 
 









<? if($_GET[vc]<>""){ ?>


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
font-size:22px;   padding:0px;  color:#666666;  width:100%; background-color:#F6F6F6;      
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
				
				
				<div id="load_input_message" style="padding:0px; ">				 
                  <input type="text" name="message"  id="message" placeholder="เขียนข้อความ ..." class="form-control">    
    
     </div>
   </form>
				 
				 
				  
				
                      <span class="input-group-btn" style="width:auto ">
					  
					 
					  
<button type="button" class="btn btn-default" style="margin-right:5px;  margin-left:5px; padding:5px; width:30px; "> <i class="fa fa-microphone" style="font-size:22px; color: #333333 " onclick="startDictation()"></i>  </button>
						      <!-- /.box-body -->                    
<button type="button" class="btn btn-default" style="margin-left:0px; padding:5px; width:30px; "  > <i class="fa fa fa-smile-o" style="font-size:22px; color: #333333 " ></i>  </button>  

<!-- /.box-body -->  

<div class="dropdown">
    <button type="button" class="btn btn-lg btn-warning dropdown-toggle" data-toggle="dropdown">By industries <span class="caret"></span>

    </button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="#consumergoods" data-toggle="modal">Consumer goods</a>

        </li>
    </ul>
</div>
<div class="modal fade" id="consumergoods" data-target="#consumergoods">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header orange">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>
                 <h4 class="modal-title"><strong></strong>Consumer goods</h4>

            </div>
        </div>
    </div>
</div>

<span class="dropup" style=" width:100% ">
 
 
  
  <button type="button" class="btn btn-default"  data-toggle="dropdown" style="margin-right:0px;  margin-left:5px; padding:5px; width:30px;margin-right:5px;  " id="btn_type"> <i class="fa fa-plus-square-o" style="font-size:22px; color: #333333 "></i>  </button>
  
  <ul class="dropdown-menu" style="left:-232px; position: absolute;  margin-bottom:30px; width:300px " onClick="event.stopPropagation();"> 
  
    <li style="padding:10px; "> 

	<table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td width="25%">  <center><button type="button" class="btn btn-default"  style="margin-right:0px;  margin-left:0px; padding:10px; width:60px;margin-right:0px;border-radius: 15px;  " id="btn_type"> <i class="fa fa-comments-o" style="font-size:40px; color: #999999 "></i>  </button>
<br><div style="margin-top:5px; font-size:12px "> คำที่ใช้บ่อย</div>
</td>
    <td width="25%"> <center><button type="button" class="btn btn-default"  style="margin-right:0px;  margin-left:0px; padding:10px; width:60px;margin-right:0px;border-radius: 15px;  " id="btn_type"> <i class="fa fa-camera" style="font-size:40px; color: #999999 "></i>  </button>
<br><div style="margin-top:5px; font-size:12px "> ถ่ายภาพ</div></td>
    <td width="25%"><center><button type="button" class="btn btn-default"  style="margin-right:0px;  margin-left:0px; padding:10px; width:60px;margin-right:0px;border-radius: 15px;  " id="btn_type"> <i class="fa fa-video-camera" style="font-size:40px; color: #999999 "></i>  </button>
<br><div style="margin-top:5px; font-size:12px  ">  วิดีโอ</div></td>
    <td width="25%"> 
<center><button type="button" class="btn btn-default"  style="margin-right:0px;  margin-left:0px; padding:10px; width:60px;margin-right:0px;border-radius: 15px;  " id="chat_icon_gps" data-toggle="modal" data-target="#popup_chat_share_map"> 




<i class="fa fa-map-marker" style="font-size:40px; color: #999999 "></i>  </button>
<br><div style="margin-top:5px; font-size:12px "> แชร์ตำแหน่ง</div></td>
  </tr>
 
 
</table>

	
	
	
	</li>
 
  </ul>
</span> 

 
 
	  
	  
 
 
						<!-- /.box-body --> 
						
						
 
												 
<button type="button" class="btn btn-primary btn-flat" style="display:nones; width:30px"  id="chat_submit"><div style="margin-left:-5px; ">ส่ง</div></button>
                      </span>
                </div>
       
 
 
						 
 
	 
  <script>
  
  	$(document.body).animate({
    'scrollTop':   $('#main_message_chat').offset().top
}, 1000);
  
  
     $('#chat_submit').addClass('disabled');
  $('#message').on('keyup', function() {
 
 if(document.getElementById('message').value!=''){
 
  $('#chat_submit').removeClass('disabled');
 
 
 }
 
  if(document.getElementById('message').value==''){
 
$('#chat_submit').addClass('disabled');
 
 
 }
 
 
  
  	});
  
  /////
  $('#btn_type').click(function() {
 
 
 
 
  
  $('#type_message').show();
 
  
  	});
	
	  $('#type_message').change(function() {
 
 	document.getElementById('message').value=document.getElementById('type_message').value;
  
  	});
	

	
	
	
 
   var url_chat = "go.php?name=livechat&file=sub&vc=<?=$_GET[vc]?>";
 
  $('#load-direct-chat').load(url_chat); 
 

 
 
 
 
 
$('#chat_submit').click(function() {
 

  
   $.post('go.php?name=livechat&file=savedata&type=new&vc=<?=$_GET[vc]?>',$('#chat_form').serialize(),function(response){
 $('#send_chat_data').html(response);  });


  var url_chat = "go.php?name=livechat&file=sub&vc=<?=$_GET[vc]?>";
  $('#load-direct-chat').load(url_chat); 
   document.getElementById('message').value="";
   
 
 


 
 
 
 

 
    return false;
	});


$('#message').on('keyup', function(e) {
 
 
	
 

 
 
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
				 <div id="load_map_gpss"  style=" padding:0px;" > 
 
				 </div>
				
				</div> 

 
              
            </div>
  </div>
 
</div>	



 
</div>


<? } ?>

 
 
 
 