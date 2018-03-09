 

 
  <div     id="popup_chat_share_map" role="dialog"   aria-labelledby="myModalLabel"    style="width:100%; height:100%; padding:0px; margin-left:0px;   z-index:999999; background-color:#FFFFFF; position:absolute;  display:none">
 <? //  include ("load/page/back_popup.php");?>
 <div class="modal-dialog"    style="width:100%; padding:0px; ">

            <!-- Modal  class="modal fade" content-->
            <div class="modal-content" style="width:100%; padding-top:20px; " > 
			
			      <div class="modal-header" style=" margin-top:-30px;">
        <button type="button" class="close"  id="btn_close_gps_popup"  ><span  style="margin-left:-80px; font-size:40px; margin-top:-10px;">&times;</span></button>
 
                    <h4 class="modal-title" style="font-size:20px; height:15px;     font-family:Arial, Helvetica, sans-serif; text-transform:uppercase">
					
					
					<center><b> <span class="lang_en">Location share</span>
					             <span class="lang_th">แชร์ตำแหน่ง</span>
      <span class="lang_cn">位置共享</span></b></center></h4>
 
<div class="modal-body"  id="load_chat_share_map" style="width:100%;  padding:0px; margin-left:-20px; margin-top:10px; ">  
		 
		  ss
</div> 

 
                <div class="modal-footer" style="margin-top:-10px; margin-left:-30px; border:none">
				       <center>
					 
					 <button type="button" class="btn btn-modal-ok"     data-backdrop="static" id="btn_send_gps_popup" >Real Time</button>
					 
					  <button type="button" class="btn btn-modal-ok"     data-backdrop="static" id="btn_send_gps_point" >Point</button>
 
    <script>
$( document ).ready(function() {
$("#btn_close_gps_popup").click(function(){   

$( "#popup_chat_share_map" ).hide() ;
 
 });
  });
	
	</script>
                </div>
            </div>
  </div>
 </div>	
</div>	
 

 
 
 
 
 
 
 
 
 
 
 
  
 <div style="position: relative">
 
 <script>

$( document ).ready(function() {

$('#close_popup_chat').click(function(){  
$( "#load_data_manage_work" ).toggle();
 });
  });
 
					</script> 


 



<? if($_GET[vc]<>""){ ?>


  <?
  
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);  
$res[vc] = $db->select_query("SELECT drivername  FROM web_order  WHERE invoice='".$_GET[vc]."'  "); 
$arr[vc] = $db->fetch($res[vc]);
$arr[vc][drivername];
    
  ?>


<input name="chat_driver_id" type="hidden" id="chat_driver_id" value="<?=$arr[vc][drivername]?>" />  
<input name="chat_vc_id" type="hidden" id="chat_vc_id" value="<?=$_GET[vc]?>" /> 
  
   <br /><br />
 
   <!-- Direct Chat --> 
 
          <!-- DIRECT CHAT PRIMARY style="position:fixed" -->
          <div class="box box-primary direct-chat direct-chat-primary" style=" overflow:auto;padding-bottom:0px; margin-top:-45px; margin-bottom:-30px; border-top: 2px solid #3B5998; "  id="main_message_chat">
            <div class="box box-default" style="height:60px; margin-top:-20px; position:fixed4; width:100%; background-color:#FFFFFF; z-index:99 ">  
       

              <div class="box-tools pull-right"  style="height:20px; margin-top: 0px; " ><b>
                
				Voucher <?=$_GET[vc]?></b>
 
                <button type="button" class="btn btn-box-tool" data-widget="collapse"> 
                </button>
                <button type="button" class="btn btn-box-tool"   title="Contacts" data-widget="chat-pane-toggle" id="chat_icon_refresh">
                  <i class="fa fa-refresh" style="font-size:20px "></i></button>
 
				   <button type="button" class="btn btn-box-tool"   data-dismiss="modal" style="font-size:40px ">&times;</button>
            
              </div>  
			         </div>   
			
			
 
            <!-- /.box-header -->
            <div class="box-body"  style="height:95vh; overflow:hidden"> 

              <!-- ?????????? --> 
       <div class="direct-chat-messages" style="height:95%; overflow:auto ; padding-left:5px; margin-bottom:100px; background-color:" id="load-direct-chat"> 
 
 
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
 border-bottom: 0px solid #e5e5e5; margin-bottom:  0px; padding-bottom:5px; margin-left: 0px;
 
position: fixed; z-index:999;
  bottom:  0;

 
}
 
 </style>
 


 
				
				
 
	 
  <script>
  
        $( document ).ready(function() {
		
		
		
		
  	$(document.body).animate({
    'scrollTop':   $('#main_message_chat').offset().top
}, 1000);
  
  

	  
	  
	  
    $('#show_chat_tool').hide();
  
     $('#chat_submit').addClass('disabled');
  $('#message').on('keyup', function() {
 
 if(document.getElementById('message').value!=''){
 
  $('#chat_submit').removeClass('disabled');
 
 
 }
 
  if(document.getElementById('message').value==''){
 
$('#chat_submit').addClass('disabled');
 
 
 }
 
 
  
  	});
	
	
	 	});
  
  /////
  $('#btn_type').click(function() {
 
 
 
 
  
  $('#type_message').show();
 
  
  	});
	
	  $('#type_message').change(function() {
 
 	document.getElementById('message').value=document.getElementById('type_message').value;
  
  	});
	

	
	
 
 //// load auto
$('#load-direct-chat').load('load/loading/chat.php'); 
 var url_chat = "go.php?name=chat&file=sub&vc=<?=$_GET[vc]?>";  
 $('#load-direct-chat').load(url_chat); 
///////////

$( document ).ready(function() {
/////////// เปิด tool
$( "#chat_button_tool" ).click(function() {
  $( "#show_chat_tool" ).slideToggle( "slow" );
});
 

  
  
//////////////  ส่งข้อความปกติ
 
$('#chat_submit').click(function() {
  
 document.getElementById('statetype').value='chat_text';
   var url="go.php?name=chat&file=savedata&type=new&vc=<?=$_GET[vc]?>&state=14";
	url=url+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
	 url=url+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 	url=url+"&state_type="+document.getElementById('statetype').value;

   $.post(url,$('#chat_form').serialize(),function(response){
 $('#send_chat_data').html(response);  });
 
  var url_chat = "go.php?name=chat&file=sub&vc=<?=$_GET[vc]?>";
  $('#load-direct-chat').load(url_chat); 
   document.getElementById('message').value="";
 
	});
	
 
 /////// // ส่งตำแหน่ง จุด
 $("#btn_send_gps_point").click(function(){  

document.getElementById('statetype').value='share_location';

   var url="go.php?name=chat&file=savedata&type=new&vc=<?=$_GET[vc]?>&state=14";
	url=url+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
	 url=url+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 	url=url+"&state_type="+document.getElementById('statetype').value;
 
   $.post(url,$('#chat_form').serialize(),function(response){
 $('#send_chat_data').html(response);  });
 
  var url_chat = "go.php?name=chat&file=sub&vc=<?=$_GET[vc]?>";
  $('#load-direct-chat').load(url_chat); 
   document.getElementById('message').value="";

$( "#popup_chat_share_map" ).hide() ;

$( "#chat_button_tool" ).click();


 });
 
	
	
	
	//////////////////////////////////////////////////////
});
//////



//////////////////////

$('#message').on('keyup', function(e) {
 
 
	
 

 
 
    if (e.keyCode === 13) {
  
   $.post('go.php?name=chat&file=savedata&type=new',$('#chat_form').serialize(),function(response){
 $('#send_chat_data').html(response);  });


  var url_chat = "go.php?name=chat&file=sub&vc=<?=$_GET[vc]?>";
  $('#load-direct-chat').load(url_chat); 
 
		
		
		document.getElementById('message').value="";
		// $('#message').unbind('keyup keydown keypress');
		 
		///document.getElementById('btn_emo').focus() ;
		
		//document.getElementById('message_blank').focus() ;
		
		///  alert(0);
		// $('#load_input_message').html("<input type='text' name='message'  id='message' placeholder='????????????' class='form-control' >");
    }
});

    
				  </script>
 





 
   
   
   
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
$ok_button_color="#3B5998";
$no_button_color="#737373";

?>

<style>
.btnstatus{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; height:40px; font-size:14px; width:100px; margin-right:15px; background-color:#367FA9;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF;

}
.btnstatus:hover{

background-color:#999999;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF; border:0px solid #FFFFFF; 
}


.btn-modal-ok{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; font-size:20px; width:100px;  background-color:<?=$ok_button_color?>;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF

}
.btn-modal-ok:hover{

background-color:#999999;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
}

.btn-modal-no{ box-shadow: 1px 1px 5px #999999; border:0px solid #FFFFFF; 
border-radius: 5px;padding:5px; font-size:20px;    background-color:<?=$no_button_color?>;font-family:Arial, Helvetica, sans-serif ; color:#FFFFFF
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

 
  

 

<script>
$( document ).ready(function() {


  $("#chat_icon_gps").click(function(){    
   $( "#popup_chat_share_map" ).slideToggle();
  $('#load_chat_share_map').load('google/check_system.php');
  });
 	

 
  
 $("#chat_icon_camera").click(function(){ 
$("#load_chat_camera").click();
});
  
 $("#chat_icon_video").click(function(){  
  $("#load_chat_video").click();
});
  
 $("#chat_icon_refresh").click(function(){  
    var url_chat = "go.php?name=chat&file=sub&vc="+document.getElementById('vc_chat').value;
  $('#load-direct-chat').load(url_chat); 
   document.getElementById('message').value="";
    });
	
 //////////////

 });
</script>



 
 
 <div class="chat-loader"> </div> 
 
 
 
 
 <div class="bottom_popup_chat">
				    <div id="send_chat_data"></div>								
				 
				  <form id="chat_form" name="chat_form"  action="?name=chat&file=savedata&type=guest"  target="uploadframe2" method="post">  
   <iframe id="uploadframe2" name="uploadframe2" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
				<div class="box-footer" style="position:fixeds; padding-bottom:5px; margin-top:-20px; margin-left:0px; margin-right:5px; ">
 
                <div class="input-group">
				
				
				<div id="load_input_message" style="padding:0px; ">				 
				<div style="display:none ">
				 <input type="file" class="form-control" value="???????????????" readonly  style="padding-left:5px; padding-right:5px; width:125px" id="load_chat_camera"  accept="image/*"  capture="camera">
			<input type="file" class="form-control" value="???????????????" readonly  style="padding-left:5px; padding-right:5px; width:125px" id="load_chat_video"  accept="video/*"  capture="camera">
			
				  <input type="hiddens" name="state" id="state" value="31"  style="width:50px " /> 
				  
				  <input type="hiddens" name="statetype" id="statetype" value="chat_text"  style="width:50px " /> 
				  
				  
				    <input type="hiddens" name="vc_chat" id="vc_chat" value="<?=$_GET[vc]?>"  style="width:20px " /> 
				 
				 </div>
				
				
                  <input type="text" name="message"  id="message" placeholder="Message ..." class="form-control" style="height:35px ">    
    
     </div>
   </form>
				 
				 
				  
				
                      <span class="input-group-btn" style="width:auto ">
					  
					 
					  
<button type="button" class="btn btn-default" style="margin-right:5px;  margin-left:5px; padding:5px; width:30px; "><center><i class="fa fa-microphone" style="font-size:22px; color: #333333;margin-left:-8px;  " onclick="startDictation()"></i>  </center></button>
						      <!-- /.box-body -->                    
<button type="button" class="btn btn-default" style="margin-left:0px; padding:5px; width:30px; "  > <i class="fa fa fa-smile-o" style="font-size:22px; color: #333333;margin-left:-9px " ></i>  </button>  

<!-- /.box-body -->  


 
  
  <button type="button" class="btn btn-default"  data-toggle="dropdown" style="margin-right:0px;  margin-left:5px; padding:5px; width:30px;margin-right:5px;  " id="chat_button_tool"> <i class="fa fa-plus-square-o" style="font-size:22px; color: #333333;margin-left:-7px "></i>  </button>
  
 

	
	
	
 

 
 
	  
	  
 
 
						<!-- /.box-body --> 
						
						
 
												 
<button type="button" class="btn btn-primary btn-flat" style="display:nones; width:60px; height:35px; background-color:#3B5998; border:none"  id="chat_submit"><div style="margin-left:-5px; ">Send</div></button>
                      </span>
					  
					  
					  
					  
					  
					  
                </div>
 
 
 <div style="padding:10px; display:none" id="show_chat_tool">

 
<style>


 

.lang_en { display:none; text-transform:capitalize;  }
.lang_th { display:none; text-transform:capitalize;  }
.lang_cn { display:none; text-transform:capitalize;  }

 </style>
 
  <? if($_GET[lang]=='1'){ ?>
 <script>
$( document ).ready(function() {
$(".lang_en").show();
 });
 </script> 
  <? } ?>
   <? if($_GET[lang]=='2'){ ?>
 <script>
 $( document ).ready(function() {
$( ".lang_th" ).show();
 });
 </script> 
  <? } ?>
   <? if($_GET[lang]=='3'){ ?>
 <script>
$( ".lang_cn" ).show();
 </script> 
  <? } ?>
 
 <table width="100%"  border="0" cellspacing="1" cellpadding="1" >
  <tr align="center" valign="top">
    <td width="25%">  <center>
      <button type="button" class="btn btn-default"  style="margin-right:0px;  margin-left:0px; padding:10px; width:60px;margin-right:0px;border-radius: 15px;  " id="btn_type"> <i class="fa fa-comments-o" style="font-size:40px; color: #999999 ; margin-left:-5px;"></i>  </button>
<br><div style="margin-top:5px; font-size:12px ">

										<span class="lang_en">Frequently used</span>
					   					<span class="lang_th">Often used</span>
					   					<span class="lang_cn">常用信息</span>
										
										</div>
</td>
    <td width="25%"> <center>
      <button type="button" class="btn btn-default"  style="margin-right:0px;  margin-left:0px; padding:10px; width:60px;margin-right:0px;border-radius: 15px;  " id="chat_icon_camera"> <i class="fa fa-camera" style="font-size:40px; color: #999999; margin-left:-5px; "></i>  </button>
<br><div style="margin-top:5px; font-size:12px ">
										<span class="lang_en">Photo</span>
					   					<span class="lang_th">ถ่ายภาพ</span>
					   					<span class="lang_cn">开枪</span>
										
	  </div></td>
    <td width="25%"><center>
      <button type="button" class="btn btn-default"  style="margin-right:0px;  margin-left:0px; padding:10px; width:60px;margin-right:0px;border-radius: 15px;  " id="chat_icon_video"> <i class="fa fa-video-camera" style="font-size:40px; color: #999999; margin-left:-5px; "></i>  </button>
<br><div style="margin-top:5px; font-size:12px  ">



										<span class="lang_en">Video</span>
					   					<span class="lang_th">วิดีโอ</span>
					   					<span class="lang_cn">视频</span>


</div></td>
    <td width="25%"> 
<center>


<button type="button" class="btn btn-default"  style="margin-right:0px;  margin-left:0px; padding:10px; width:60px;margin-right:0px;border-radius: 15px;  " id="chat_icon_gps"  > 




<i class="fa fa-map-marker" style="font-size:40px; color: #999999; margin-left: 0px; "></i>  </button>
<br><div style="margin-top:5px; font-size:12px "><span class="lang_en">Location share</span>
					             <span class="lang_th">แชร์ตำแหน่ง</span>
      <span class="lang_cn">位置共享</span></div></td>
  </tr>
 
 
</table>
	<div id="check_chat_update" style="display:none"> 55</div> 
		<div id="check_chat_gps" style="display:none">22</div> 
		<div id="check_chat_time" style="display:none">333</div>
	
</div>

 
 <div style="display:none">
 <?  include ("google/gps/check.php");?>
 <?  //include "sound/index.php";?></div>
  
 <script>
 setInterval(function() {
 var url_check_chat_update = "go.php?name=chat/online&file=driver&vc=<?=$_GET[vc]?>";
 $('#check_chat_update').load(url_check_chat_update);
 
 
 
 /*
  var url_check_chat_gps = "go.php?name=chat/online&file=update_time&vc=<?=$_GET[vc]?>&order=<?=$_GET[order]?>";
 $('#check_chat_gps').load(url_check_chat_gps);
 
 */
 
 
  var url_check_data_time = "go.php?name=chat/online&file=update_time&vc=<?=$_GET[vc]?>&order=<?=$_GET[order]?>";
url_check_data_time =url_check_data_time+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 url_check_data_time =url_check_data_time+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
 
 $('#check_chat_time').load(url_check_data_time);
 
}, 1000); // 60000 milliseconds = one minute
 
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

