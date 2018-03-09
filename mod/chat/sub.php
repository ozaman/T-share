 
 
 
 
 
 <script>
 /*
function showHeight( element, height ) {
  $( "div" ).text( "The height for the " + element + " is " + height + "px." );
}
 
$( "#chat_content" ).click(function() {
var dd = $( window ).height()  ;
 alert(dd);
 
});
*/
</script>
 
 
 <div id="chat_content"   class="messages" style="height:100vh; overflow:auto;padding-bottom:120px; margin-top: 30px; margin-bottom:-0px;   " >
 
 <br>

  <?
 
 $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);  
 
 $res[vc] = $db->select_query("SELECT drivername   FROM web_order  WHERE invoice='".$_GET[vc]."'  "); 
$arr[vc] = $db->fetch($res[vc]);
 
$res[web_user] = $db->select_query("SELECT  name,post_date  FROM web_driver  WHERE id='".$arr[vc][drivername]."'  "); 
$arr[web_user] = $db->fetch($res[web_user]);

///echo $arr[web_user][name];
 
 
 
 
 
 
 $db->connectdb(DB_NAME_CHAT,DB_USERNAME,DB_PASSWORD);
$limit = 1 ;
 
 

$res[chat] = $db->select_query("SELECT * FROM zvc_".$_GET[vc]." ORDER BY id asc");
$count=0;
while($arr[chat] = $db->fetch($res[chat])){




 /// comment_from
?>
			  <? if($arr[chat][comment_from]=="customer"){?>
			  
			  
			
			  
			  
 
			             <!-- เราเอง -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
				     <span class="direct-chat-name pull-right"><?=$arr[chat][comment_from]?></span>
                    <span class="direct-chat-timestamp pull-left"> <?=$date = date('Y-m-d ',  $arr[chat][flight_delay_date]);?>&nbsp;<font color="#000000"><?=$date = date('h:i:s',  $arr[chat][flight_delay_date]);?></font></span>
                  </div>

 
  
  <!-- /.direct-chat-info -->
<img class="direct-chat-img" src="images/icon/user/<?=$arr[chat][comment_from]?>.png?v=<?=$cache;?>" alt="Message User Image"><!-- /.direct-chat-img -->
<div class="direct-chat-text">
			<?=$arr[chat][comment]?> <? if($arr[chat][state_name]=="flight_delay"){?>&nbsp;<img src="images/usercar_after.png?v=<?=$cache;?>" width="25"  align="absmiddle" style="padding: 5px 0; display:none">&nbsp;<?=$arr[chat][flight_delay]?>
		    <? } ?>
			</div>
				 
                </div>
				
                <!-- /.direct-chat-msg -->
			  <? } ?>
			  
			  
			  
			  
			<? if($arr[chat][comment_from]<>"customer"){?>  
			
			
			  <? if($arr[chat][id_comment]>0){
			  $res[storechat] = $db->select_query("SELECT topic_en,topic_th,topic_cn from message_data_store  where id='".$arr[chat][id_comment]."' ");
$arr[storechat] = $db->fetch($res[storechat]);
			  
			  $arr[chat][comment]=$arr[storechat][topic_th];
			  
			  
			  }
			   ?>
			  
			
			
                <!-- เริ่มคนอื่น -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left"><?=$arr[chat][comment_from]?></span>
                    <span class="direct-chat-timestamp pull-right"> <?=$date = date('Y-m-d ',  $arr[chat][flight_delay_date]);?>&nbsp;<font color="#000000"><?=$date = date('h:i:s',  $arr[chat][flight_delay_date]);?></font></span>
                  </div>
                  <!-- ข้อความคนอื่น -->
				  <? if($arr[chat][comment_from]=='driver'){?>
				  
            <img class="direct-chat-img" src="../../admin/file/driver/pic/small/<?=$arr[web_user][post_date];?>.jpg" alt="Message User Image">
				  
				  
				  <? } ?>
				  
				  				  <? if($arr[chat][comment_from]=='callcenter'){?>
				  
                  <img class="direct-chat-img" src="images/icon/user/<?=$arr[chat][comment_from]?>.png?v=<?=$cache;?>" alt="Message User Image">
				  
				  
				  <? } ?>
				  
				  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text"  >
				  
  		   <div id="translate_th_<?=$arr[chat][id]?> " style="margin-top:0px; padding-top:5px;">
<?=$arr[chat][comment]?>
		   </div> 
				  
  <? if($arr[chat][id_comment]>0){ ?>
  
  <div id="translate_en_<?=$arr[chat][id]?> " style="margin-top:5px; padding-top:5px;   border-top:1px solid #C1C1C1; color:#999999;  display:nones">
		<?=$arr[storechat][topic_en]?>
 </div>
 
 <div id="translate_cn_<?=$arr[chat][id]?> " style="margin-top:5px; padding-top:5px;   border-top:1px solid #C1C1C1; color:#999999;  display:nones">
		<?=$arr[storechat][topic_cn]?>
 </div>
 
  <? } ?>
				  
				  
         
		   
		    <!-- แปล -->

		   
		 <div id="translate_<?=$arr[chat][id]?> " style="margin-top:5px; padding-top:5px;   border-top:1px solid #F6F6F6; display:nones">
			 <a  data-target="#popup_chat_show_map" data-toggle="modal" data-backdrop="static" data-keyboard="false" id="btn_show_gps_<?=$arr[chat][id]?>" style=" color: #3B5998  ">  <i  id="main_gps_status" style=" font-size:16px; color: #3B5998 " class="fa fa-map-marker " ></i> Location  </a>
		   </div> 
		   
		   
		   
		   
		   <? if($arr[chat][state_name]=="flight_delay"){?>&nbsp;<img src="images/usercar_after.png?v=<?=$cache;?>" width="25"  align="absmiddle" style="padding: 0px 0;">&nbsp;<?=$arr[chat][flight_delay]?>
 		   
		    <? } ?>
			
			
			
					   <? if($arr[chat][state_name]=="driver_to_point"){?><br>

 <img src="../data/fileupload/map/<?=$arr[chat][voucher]?>_<?=$arr[chat][flight_delay_date]?>.png?v=<?=$cache;?>"    align="absmiddle" style="padding: 0px; width:180px;">
 		   
		    <? } ?>
			
			  <? if($arr[chat][state_name]=="customer_to_point"){?><br>
<table width="100%"  border="0" cellspacing="2" cellpadding="2" >
  <tr>
 
	<td align="right" style="background-color:#FFFFFF ">	
	
	<script>
	///popup_chat_show_map
	
	
	
  $("#btn_show_gps_<?=$arr[chat][id]?>").click(function(){
 $('#load_map_gps').load('google/index.php');
  
  });
	
	
 $('#btn_show_en_<?=$arr[chat][id]?>').click(function(){  
 $("#full_pic_chat_en").attr("src", "../data/fileupload/vc/<?=$arr[chat][img_post_date]?>.jpg?v=<?=$cache;?>");
 
 });
 
  $('#btn_show_guest_<?=$arr[chat][id]?>').click(function(){  
 $("#full_pic_chat_en").attr("src", "../data/fileupload/vc/<?=$arr[chat][yourself_post_date]?>.jpg?v=<?=$cache;?>");
 
 });
 </script>
	
	
	
	 <a  data-target="#popup_chat_show_pic" data-toggle="modal" data-backdrop="static" data-keyboard="false" id="btn_show_en_<?=$arr[chat][id]?>"><img src="../data/fileupload/vc/<?=$arr[chat][img_post_date]?>.jpg?v=<?=$cache;?>"    align="absmiddle" style="padding: 0px; width:100px;" class="img-chat-pic"></a><br>
	 
	 
	  <a  data-target="#popup_chat_show_pic" data-toggle="modal" data-backdrop="static" data-keyboard="false" id="btn_show_guest_<?=$arr[chat][id]?>">
<img src="../data/fileupload/vc/<?=$arr[chat][yourself_post_date]?>.jpg?v=<?=$cache;?>"    align="absmiddle" style="padding:0px; width:100px" class="img-chat-pic"></a></td>
  </tr>
</table>


 		   
		    <? } ?>
			
                  </div>
                  <!-- /จบข้อความคนอื่น -->
                </div>
                <!-- จบ -->
				<? } ?> 
				
				  
				
				
				
				
				
				
				
				
				
				
				
				
				 
				<? } ?>
 
<script>
$(".messages").animate({ scrollTop: 99999 }, 500);
 
 
  </script>
    <link rel="stylesheet" href="dist/css/AdminLTE.css?v=<?=time()?>">
	
 <style>
 .img-chat-pic {
 
    border:3px solid #FFFFFF; background-color:#FFFFFF ;
 
	 box-shadow: 0 1PX 1px 2px #D7D6D6;
	   -moz-border-radius:5px;

 -webkit-border-radius:5px;

 border-radius:5px; 
 padding:5px; margin:5px; position: relative ;
    
}

.messages{
    border: 0px solid #ccc;
    width: 100%;
 
    padding: 0px;
    overflow-y:scroll;

}
.message{
    color: slategrey;

}

.popup-box {
   background-color: #ffffff;
    border: 1px solid #b0b0b0;
    bottom: 0;
    display: none;
    height: 415px;
    position: fixed;
    right: 70px;
    width: 300px;
    font-family: 'Open Sans', sans-serif;
}
.round.hollow {
    margin: 40px 0 0;
}
.round.hollow a {
    border: 2px solid #ff6701;
    border-radius: 35px;
    color: red;
    color: #ff6701;
    font-size: 23px;
    padding: 10px 21px;
    text-decoration: none;
    font-family: 'Open Sans', sans-serif;
}
.round.hollow a:hover {
    border: 2px solid #000;
    border-radius: 35px;
    color: red;
    color: #000;
    font-size: 23px;
    padding: 10px 21px;
    text-decoration: none;
}
.popup-box-on {
    display: block !important;
}
.popup-box .popup-head {
    background-color: #fff;
    clear: both;
    color: #7b7b7b;
    display: inline-table;
    font-size: 21px;
    padding: 7px 10px;
    width: 100%;
     font-family: Oswald;
}
.bg_none i {
    border: 1px solid #ff6701;
    border-radius: 25px;
    color: #ff6701;
    font-size: 17px;
    height: 33px;
    line-height: 30px;
    width: 33px;
}
.bg_none:hover i {
    border: 1px solid #000;
    border-radius: 25px;
    color: #000;
    font-size: 17px;
    height: 33px;
    line-height: 30px;
    width: 33px;
}
.bg_none {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
}
.popup-box .popup-head .popup-head-right {
    margin: 11px 7px 0;
}
.popup-box .popup-messages {
}
.popup-head-left img {
    border: 1px solid #7b7b7b;
    border-radius: 50%;
    width: 44px;
}
.popup-messages-footer > textarea {
    border-bottom: 1px solid #b2b2b2 !important;
    height: 34px !important;
    margin: 7px;
    padding: 5px !important;
     border: medium none;
    width: 95% !important;
}
.popup-messages-footer {
    background: #fff none repeat scroll 0 0;
    bottom: 0;
    position: absolute;
    width: 100%;
}
.popup-messages-footer .btn-footer {
    overflow: hidden;
    padding: 2px 5px 10px 6px;
    width: 100%;
}
.simple_round {
    background: #d1d1d1 none repeat scroll 0 0;
    border-radius: 50%;
    color: #4b4b4b !important;
    height: 21px;
    padding: 0 0 0 1px;
    width: 21px;
}





.popup-box .popup-messages {
    background: #3f9684 none repeat scroll 0 0;
    height: 275px;
    overflow: auto;
}
.direct-chat-messages {
    overflow: auto;
    padding: 10px;
    transform: translate(0px, 0px);
    
}
.popup-messages .chat-box-single-line {
    border-bottom: 1px solid #a4c6b5;
    height: 12px;
    margin: 7px 0 20px;
    position: relative;
    text-align: center;
}
.popup-messages abbr.timestamp {
    background: #3f9684 none repeat scroll 0 0;
    color: #fff;
    padding: 0 11px;
}

.popup-head-right .btn-group {
    display: inline-flex;
	margin: 0 8px 0 0;
	vertical-align: top !important;
}
.chat-header-button {
    background: transparent none repeat scroll 0 0;
    border: 1px solid #636364;
    border-radius: 50%;
    font-size: 14px;
    height: 30px;
    width: 30px;
}
.popup-head-right .btn-group .dropdown-menu {
    border: medium none;
    min-width: 122px;
	padding: 0;
}
.popup-head-right .btn-group .dropdown-menu li a {
    font-size: 12px;
    padding: 3px 10px;
	color: #303030;
}

.popup-messages abbr.timestamp {
    background: #3f9684  none repeat scroll 0 0;
    color: #fff;
    padding: 0 11px;
}
.popup-messages .chat-box-single-line {
    border-bottom: 1px solid #a4c6b5;
    height: 12px;
    margin: 7px 0 20px;
    position: relative;
    text-align: center;
}
.popup-messages .direct-chat-messages {
    height: auto;
}
.popup-messages .direct-chat-text {
    background: #dfece7 none repeat scroll 0 0;
    border: 1px solid #dfece7;
    border-radius: 2px;
    color: #1f2121;
}

.popup-messages .direct-chat-timestamp {
    color: #fff;
    opacity: 0.6;
}

.popup-messages .direct-chat-name {
	font-size: 15px;
	font-weight: 600;
	margin: 0 0 0 49px !important;
	color: #fff;
	opacity: 0.9;
}
.popup-messages .direct-chat-info {
    display: block;
    font-size: 12px;
    margin-bottom: 0;
}
.popup-messages  .big-round {
    margin: -9px 0 0 !important;
}
.popup-messages  .direct-chat-img {
    border: 1px solid #fff;
	background: #3f9684  none repeat scroll 0 0;
    border-radius: 50%;
    float: left;
    height: 40px;
    margin: -21px 0 0;
    width: 40px;
}
.direct-chat-reply-name {
    color: #fff;
    font-size: 15px;
    margin: 0 0 0 10px;
    opacity: 0.9;
}

.direct-chat-img-reply-small
{
    border: 1px solid #fff;
    border-radius: 50%;
    float: left;
    height: 20px;
    margin: 0 8px;
    width: 20px;
	background:#3f9684;
}

.popup-messages .direct-chat-msg {
    margin-bottom: 10px;
    position: relative;
}

.popup-messages .doted-border::after {
	background: transparent none repeat scroll 0 0 !important;
    border-right: 2px dotted #fff !important;
	bottom: 0;
    content: "";
    left: 17px;
    margin: 0;
    position: absolute;
    top: 0;
    width: 2px;
	 display: inline;
	  z-index: -2;
}

.popup-messages .direct-chat-msg::after {
    background: #fff none repeat scroll 0 0;
    border-right: medium none;
    bottom: 0;
    content: "";
    left: 17px;
    margin: 0;
    position: absolute;
    top: 0;
    width: 2px;
	 display: inline;
	  z-index: -2;
}
.direct-chat-text::after, .direct-chat-text::before {
   
    border-color: transparent #dfece7 transparent transparent;
    
}
.direct-chat-text::after, .direct-chat-text::before {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: transparent #EBEBEC transparent transparent;
    border-image: none;
    border-style: solid;
    border-width: medium;
    content: " ";
    height: 0;
    pointer-events: none;
    position: absolute;
    right: 100%;
    top: 15px;
    width: 0;
}
.direct-chat-text::after {
    border-width: 5px;
    margin-top: -5px;
}
.popup-messages .direct-chat-text {
    background: #dfece7 none repeat scroll 0 0;
    border: 1px solid #dfece7;
    border-radius: 2px;
    color: #1f2121;
}
.direct-chat-text {
    background: #EBEBEC none repeat scroll 0 0;
    border: 1px solid #EBEBEC;
    border-radius: 5px;
    color: #444;
    margin: 5px 0 0 50px;
    padding: 5px 10px;
    position: relative;
}
 .direct-chat-primary .right > .direct-chat-text {
  background: #3B5998;
  border-color: #3B5998;
  color: #ffffff;
}

.direct-chat-primary .right > .direct-chat-text:after,
.direct-chat-primary .right > .direct-chat-text:before {
  border-left-color: #3B5998;
}
 </style>
 