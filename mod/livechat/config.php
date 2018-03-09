<?
$chat_from=$_GET[chat_from];
if($chat_from=='customer'){
$chat_part='../driver/';
$maincolor="#3B5998";
$chat_padding="padding:10px;";

} else {

$chat_part='';

$maincolor=$main_color;

}


$bg_chat_head="#FFFFFF";
$bg_chat_bottom="#FFFFFF";
$bg_chat_soft="#FFFFFF";
$bg_chat_soft_border="#E7E8E8";


$bg_chat="#F5F5F5";



?>

<style> 


  .drop-sub-menu-link {
   padding:15px; font-size:14px; padding-left:10px; padding-bottom:15px; padding-top:15px; margin-left:5px; position: relative; color:#999999;
  
  border-bottom:  solid 0.5px #DADADA;
  }
  
     .drop-sub-chat-link {
   padding:5px; font-size:14px; padding-left:5px; margin-left:5px; position: relative;
  
  border-bottom:  solid 0.5px #DADADA;
  }
  

  
  
     .drop-sub-menu-link-none {
   padding:15px; font-size:14px; padding-left:10px; margin-left:5px; margin-right:5px;
  
  border-bottom:  solid 0px #737373;
  }
     .drop-sub-menu-span {
 margin-left:30px; color:#666666; margin-top:5PX;   
  }
  
 
 
    .drop-menu-icon { 
	font-size:26px;  color:<?=$main_color?>; padding-right:5px; padding-bottom:5PX; display:block; position:absolute;
   }
   
 


 .chat-day {
 background-color:#DCDDDE; color:#FFFFFF;width:100px; 
  -moz-border-radius:8px;
  -webkit-border-radius:8px;

 border-radius:8px; margin-bottom:-20px; 
 }


 .chat-img-border-left {
  padding:2px; margin:0px; position: relative ; box-shadow: 0px 0px 5px #999999; margin-right:10xp; height:42px; width:42px;
   border:2px solid #FFFFFF;
 }
  .chat-img-border-right{
  padding:2px; margin:0px; position: relative ; box-shadow: 0px 0px 5px #999999; margin-left:10px; height:42px; width:42px;
     border:2px solid #FFFFFF;
 }




.loading_chat_popup {background: transparent url(images/loader.gif) no-repeat center center;} 


#load_chat_share_albumss{background: transparent url(images/loader.gif) no-repeat center center;} 
#load_chat_preview_map {background: transparent url(images/loader.gif) no-repeat center center;} 
#load_chat_share_map {background: transparent url(images/loader.gif) no-repeat center center;} 



 

 .img-chat-pic-left {
 
 border:0px solid #FFFFFF; background-color:#FFFFFF ;
 -moz-border-radius:2px;
  -webkit-border-radius:2px;

 border-radius:2px;
 padding:0px; margin:0px; position: relative ; width:80px;box-shadow: 0px 0px 2px #999999;  margin-left:10px; 
    
}


 .img-chat-pic-right { 
 border:0px solid #FFFFFF; background-color:#FFFFFF ;  
 -moz-border-radius:2px;
  -webkit-border-radius:2px;
 border-radius:2px;
 padding:0px; margin:0px; position: relative ; width:80px;box-shadow: 0px 0px 2px #999999;  margin-right:-2px; 
    
}




 .img-chat-map-left {
 
 border:0px solid #FFFFFF; background-color:#FFFFFF ;
 -moz-border-radius:2px;
  -webkit-border-radius:2px;

 border-radius:2px;
 padding:0px; margin:0px; position: relative ; width:100px;box-shadow: 0px 0px 2px #999999;  margin-left:10px; 
    
}


 .img-chat-map-right { 
 border:0px solid #FFFFFF; background-color:#FFFFFF ;  
 -moz-border-radius:2px;
  -webkit-border-radius:2px;
 border-radius:2px;
 padding:0px; margin:0px; position: relative ; width:100px;box-shadow: 0px 0px 2px #999999;  margin-right:00px; 
    
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
 
 </style>
 
<style>
.tool-icon-chat {
 padding:5px; width:100%;border-radius: 15px; height:60px; background-color:#FFFFFF; font-size:32px; color: #999999;
 }
 
 .tool-icon-text {
 padding:5px; width:100%;border-radius: 15px; height:60px; background-color:#FFFFFF; font-size:32px; color: <?=$maincolor?>;
 }
 
 
 .tool-icon-chat:hover{  
 padding:5px; width:100%;border-radius: 15px; height:60px; border:2px solid <?=$maincolor?>;background-color:#FFFFFF; box-shadow: 0px 0px 10px #999999; color:<?=$maincolor?>;
 }
  .tool-icon-text:hover{  
 padding:5px; width:100%;border-radius: 15px; height:60px; border:2px solid <?=$maincolor?>;background-color:#FFFFFF; box-shadow: 0px 0px 10px #999999; color:<?=$maincolor?>;
 }
 
 .tool-td-chat {
 padding:5px;border-radius: 15px;
 }
 

</style>


 <style>
  
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
    border-color: transparent <?=$bg_chat_soft;?> transparent transparent;
	 
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

    background: <?=$bg_chat_soft?> none repeat scroll 0 0;
    border: 1px solid <?=$bg_chat_soft_border?>;
    border-radius: 6px;
    color: #444;
    margin: 5px 0 0 50px;
    padding: 5px 10px;
    position: relative;
}




.direct-chat-text-none {

    background: <?=$bg_chat_soft?> none repeat scroll 0 0;
    border: 1px solid <?=$bg_chat_soft_border?>;
    border-radius: 6px;
    color: #444;
    margin: 5px 0 0 50px;
    padding: 5px 10px;
    position: relative;
}






 .direct-chat-primary .right > .direct-chat-text {
  background: <?=$maincolor?>;
  border-color: <?=$maincolor?>;
  color: #ffffff;
}

.direct-chat-primary .right > .direct-chat-text:after,
.direct-chat-primary .right > .direct-chat-text:before {
  border-left-color: <?=$maincolor?>;
}
 </style>
 