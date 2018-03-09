


 
 
<div style="padding:10px; display:none;box-shadow: 0px -5px 5px #DADADA; margin-top:10px" id="show_time_tool">
 
 <table width="100%"  border="0" cellspacing="1" cellpadding="1" >
  <tr align="center" valign="top" style="display:none <? if($_GET[subtype]=='in'){ echo '1';}?>">
    <td width="33%" class="tool-td-chat">  <center>
	
 <button type="button" class="btn btn-default tool-icon-chat"  id="chat_icon_flight_delay"> <div style="margin-top: -8px;  "><i class="flaticon-airliner" style=" font-size:50px; " ></i></div></button>
 
<br><div style="margin-top:5px; font-size:12px "><?=chat_flight_delay?></div></td>
    <td width="33%" class="tool-td-chat"><center>
        <button type="button" class="btn btn-default tool-icon-chat"  id="chat_icon_change_flight"> <div style="margin-top: -2px;  "><i class="flaticon-planes-circling" style=" font-size:40px; font-weight:bold " ></i></div></button>
      <br />
        <div style="margin-top:5px; font-size:12px ">
          <?=chat_change_flight?>
      </div></td>
    <td width="33%" class="tool-td-chat"><center>
	
        <button type="button" class="btn btn-default tool-icon-chat"  id="chat_icon_text_landing"> <div style="margin-top: -5px;  "><i class="flaticon-plane-landing" style=" font-size:40px; " ></i></div></button>
      <br />
        <div style="margin-top:5px; font-size:12px ">
          <?=chat_landing?>
      </div></td>
  </tr>
</table>
<table width="100%"  border="0" cellspacing="1" cellpadding="1" >
   <tr align="center" valign="top"   >
     <td width="33%" class="tool-td-chat"><center>
	 
	 
	 <button type="button" class="btn btn-default tool-icon-chat"  id="chat_icon_before"> <div style="margin-top: -2px;  "><i class="icon icon-history" style=" font-size:35px;  " ></i></div></button>
 
       <br />
         <div style="margin-top:5px; font-size:12px ">
           <?=chat_before?>
         </div>
     </center></td>
 
 
 
     <td width="33%" class="tool-td-chat"><center>
 	 <button type="button" class="btn btn-default tool-icon-chat"  id="chat_icon_delay"> <div style="margin-top: -2px;-webkit-transform:rotateY(180deg);
  -moz-transform:rotateY(180deg);
  -o-transform:rotateY(180deg);
  -ms-transform:rotateY(180deg); "><i class="icon icon-history" style=" font-size:35px; font-style: normal; " ></i></div></button>
       <br />
         <div style="margin-top:5px; font-size:12px ">
           <?=chat_delay?>
         </div>
     </center></td>
     <td width="33%" class="tool-td-chat"><center>
 <button type="button" class="btn btn-default tool-icon-chat"  id="chat_icon_guest_wait"> <div style="margin-top: -2px;  "><i class="flaticon-mother-and-son" style=" font-size:36px; " ></i></div></button>
       <br />
         <div style="margin-top:5px; font-size:12px ">
           <?=chat_wait?>
         </div>
     </center></td>
   </tr>
 </table>
</div>





<script>

////// landing
$( "#chat_icon_text_landing" ).click(function() { 
  $( "#popup_chat_share_text" ).toggle();
 var url_text = "<?=$chat_part?>go.php?name=livechat/sub/load&file=text_store&type=<?=$_GET[vc]?>&lang=<?=$_GET[lang]?>&type=28";
   $('#load_chat_share_text').load(url_text); 
});




////// landing
$( "#chat_icon_flight_delay" ).click(function() { 

document.getElementById('statetype').value='flight_delay';

$( "#head_full_popup_text_time" ).html('<?=chat_flight_delay?>');
 

  $( "#popup_chat_share_time" ).toggle();
 var url_text = "<?=$chat_part?>go.php?name=livechat/sub/load&file=time&type=<?=$_GET[vc]?>&lang=<?=$_GET[lang]?>&type=delay";
   $('#load_chat_share_time').load(url_text); 
});


////// before
$( "#chat_icon_before" ).click(function() { 

document.getElementById('statetype').value='before_time';

$( "#head_full_popup_text_time" ).html('<?=chat_before?>');
 

  $( "#popup_chat_share_time" ).toggle();
 var url_text = "<?=$chat_part?>go.php?name=livechat/sub/load&file=time&type=<?=$_GET[vc]?>&lang=<?=$_GET[lang]?>&type=delay";
   $('#load_chat_share_time').load(url_text); 
});




////// after
$( "#chat_icon_delay" ).click(function() { 

document.getElementById('statetype').value='after_time';

$( "#head_full_popup_text_time" ).html('<?=chat_delay?>');
 

  $( "#popup_chat_share_time" ).toggle();
 var url_text = "<?=$chat_part?>go.php?name=livechat/sub/load&file=time&type=<?=$_GET[vc]?>&lang=<?=$_GET[lang]?>&type=delay";
   $('#load_chat_share_time').load(url_text); 
});




////// change_flight
$( "#chat_icon_change_flight" ).click(function() { 

document.getElementById('statetype').value='after_time';
 
 

  $( "#popup_chat_share_change_flight" ).toggle();
 var url_text = "<?=$chat_part?>go.php?name=livechat/sub/load&file=change_flight&type=<?=$_GET[vc]?>&lang=<?=$_GET[lang]?>&type=delay&old_flight=<?=$arr[chatvc][air]?>&old_time_h=<?=$arr[chatvc][airin_h]?>&old_time_m=<?=$arr[chatvc][airin_m]?>&ondate=<?=$arr[chatvc][ondate]?>";
   $('#load_chat_share_change_flight').load(url_text); 
});







</script>







