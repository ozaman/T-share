  <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?>
   
   
   
 

  <?  //include ("//includes/lang/chat.php");?> 
 
 
 <?  //include ("mod/livechat/config.php");?> 
 
 <?  //include ("mod/livechat/update/check.php");?> 
 
 
 
<?  //include ("mod/livechat/sub/popup/share_map.php");?> 
<?  //include ("mod/livechat/sub/popup/share_map_realtime.php");?>   
<?  //include ("mod/livechat/sub/popup/share_album.php");?> 
<?  //include ("mod/livechat/sub/popup/share_wait.php");?> 
<?  //include ("mod/livechat/sub/popup/share_text.php");?> 

<?  //include ("mod/livechat/sub/popup/share_time.php");?> 
<?  //include ("mod/livechat/sub/popup/share_change.php");?> 
  
 
<?  //include ("mod/livechat/sub/popup/preview_photo.php");?> 
<?  //include ("mod/livechat/sub/popup/preview_map.php");?> 
<?  //include ("mod/livechat/sub/popup/preview_voice.php");?> 
<?  //include ("mod/livechat/sub/popup/preview_map_realtime.php");?> 
  

	
	    <?  //include ("mod/livechat/sub/popup/alert_online.php");?> 
		<?  // //include ("mod/livechat/sub/popup/alert_wait.php");?> 


<script>
 
 
 /// $('#load-direct-chat').load('load/loading/chat.php'); 
 var url_chat = "<?=$chat_part?>go.php?name=livechat/all&file=all_user&chat_from=<?=$chat_from?>&lang=<?=$_GET[lang]?>";
   	url_chat=url_chat+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
	url_chat=url_chat+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
	
	
   $('#load-direct-chat').load(url_chat); 
   
   
 
</script>



 
 <div style="position: fixed; width:100%">
 
 
 
 
 
<?
 
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);  
$res[vc] = $db->select_query("SELECT drivername  FROM web_order  WHERE invoice='".$_GET[vc]."'  "); 
$arr[vc] = $db->fetch($res[vc]);
$arr[vc][drivername];
  
  ?>
  
 
 
<input name="chat_driver_id" type="hidden" id="chat_driver_id" value="<?=$arr[vc][drivername]?>" />  <br />
<input name="chat_vc_id" type="hidden" id="chat_vc_id" value="<?=$_GET[vc]?>" />  <br />
  
  
  <script>
   $("#head_full_popup" ).html("<font style='text-transform:capitalize'>T-Booking Chat (3)");
    $("#head_full_popup_icon" ).html("<i class='fa  fa-search' id='icon_chat_find'></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa  fa-ellipsis-v' id='icon_chat_setting'></i>");
  
  </script>
  
 
   <!-- Direct Chat --> 
 
          <!-- DIRECT CHAT PRIMARY style="position:fixed" --> 
          <div class="box box-primary direct-chat direct-chat-primary" style=" overflow:auto;padding-bottom:0px; margin-top: -30px; margin-bottom:-30px ;border-top:none"  id="main_message_chat"> 
		 
            <div class="box box-default" style="height:35px; background-color:<?=$bg_chat_head?>; border-top:none ">  
       

              <div class="box-tools pull-right" >
			  
 <span   style="font-size:16px " id="load_data_chat_online">  </span>

 
                <button type="button" class="btn btn-box-tool" data-widget="collapse"> 
                </button>
				
				<style>
				@-webkit-keyframes online-color {
    0%   { color: <?=$gps_icon_color?> }
 
	50%   { color: #FF0000 }
 
 
}

 @-moz-keyframes online-color {
 
 
	
}




.user-status-online {
     
 
 
	  
	  
	 	  -webkit-transition: all 2s;
	   -moz-animation: online-color 2s infinite;
	  
      -webkit-transition: all 1s;
    -webkit-animation: online-color 1s infinite;
}
 
				
				</style>
 
 
 
 
 <button type="button" class="btn btn-box-tool"   title="Contacts" data-widget="chat-pane-toggle"  style="color:#333333;font-size:16px; margin-top:-5px; text-transform:capitalize">
 <? 
 if($chat_to=='customer'){
 echo  chat_user_customer; 
 }
  if($chat_to=='driver'){
 echo  chat_user_driver; 
 }
   if($chat_to=='callcenter'){
 echo  chat_user_callcenter; 
 }
    if($chat_to=='agent'){
 echo  chat_user_agent; 
 }
 
 ?>
 
 
 <i class="fa fa-user" style="font-size:20px"  id="chat_icon_user_status"></i>
 <span  style="font-size:16px " id="chat_icon_user_status_text"><b>&nbsp;<?='Offline'?></b></span></button> 
 
 <button type="button" class="btn btn-box-tool"   title="Contacts" data-widget="chat-pane-toggle" id="chat_icon_refresh" style="margin-top:-5px; ">
  <i class="fa fa-refresh" style="font-size:20px "></i></button> </div>  
			         </div>   
 
            <!-- /.box-header -->
            <div class="box-body"  style="height:100vh;  overflow:hidden;padding:0px; top:-25px; background:none" id="main-load-direct-chat"> 
			
 
              <!-- เริมการแชท -->   
<div class="direct-chat-messages" style="height:100%; overflow:auto ; padding-bottom:0px; padding-left:5px; margin-bottom:10px; background-color:<?=$bg_chat?>;   " id="load-direct-chat"> 
 
 

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



 

 
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />

 
 


 
 

 
 
 <div class="chat-loader"> </div> 
 
 
  
				  
 <?  //include ("mod/livechat/sub/tool.php");?> 
<script type="text/javascript">
	$("#main-page-loader-sub").fadeOut(1000);
</script>



<?
$gps_icon_color="#FFED22";
?>
 
   <!------ class="modal fade"----> 
 
 <!------ end---->
 <style type="text/css">
.mainpic_qr {
 
   padding:10px; color:#000000;    
 
   border:3px solid <?=$main_color?>; background-color:#FFFFFF; 
   box-shadow: 2px 1px 10px #333333; margin-right:5px; margin-bottom:5PX;max-width:400px;
    
}
 #mainheadmenu {
 position:fixed ;   z-index:9999; width:100%;box-shadow: 0px  2px 2px #999999;background-color:3C8DBC; margin-top:-5px; padding:0px;
   border-bottom:3px solid #FFFFFF;
  }
 
  #mainheadmenu a:hover {
 background-color:#4BA7DC;padding:0px;
 
 }
 
   #mainheadmenu a:hover {
 padding:0px; color:#FFFFCC; background:none;
 
 }
    #mainheadmenu  a:active {
color:#FFFFCC;padding:0px;
 
 }
 
@-webkit-keyframes gps-color {
    0%   { color: <?=$gps_icon_color?> }
    25%  { color: white; font-size:30px; }
	50%   { color: <?=$gps_icon_color?> }
	75%  { color: white; font-size:30px; }
    100% { color: <?=$gps_icon_color?> }
 
}

 @-moz-keyframes gps-color {
 
 
	
}




.gps-status-icon {
     
 font-size:30px;
 
	  
	  
	 	  -webkit-transition: all 2s;
	   -moz-animation: gps-color 2s infinite;
	  
      -webkit-transition: all 2s;
    -webkit-animation: gps-color 2s infinite;
}
 
-->
 </style>
 
 
  