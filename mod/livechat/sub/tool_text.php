
 <?
 $td_chat_w="33%"
 ?>
 
 
 


 <div style="padding:10px;display:none;box-shadow: 0px -5px 5px #DADADA; margin-top:10px" id="show_text_tool">
 
       <table width="100%"  border="0" cellspacing="0" cellpadding="0" style="margin-bottom:15px; ">
  <tr>
    <td width="40">&nbsp;&nbsp;<i class="fa fa-arrow-circle-left" style="font-size:24px; color:#999999 " id="btn_back_to_tool"></td>
    <td style="font-size:20px; ">&nbsp;<?=chat_txt_store?></td>
  </tr>
</table>
<div id="load_text_store_block" style="padding-bottom:10px; display:none "><table width="90%"  border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:-5px; ">
  <tr>
    <td align="center"  id="load_text_store"> </td>
  <td width="55" align="right" style="padding-left:5px; "><button type="button" class="btn btn-primary btn-flat" style="display:nones; width:50px; height:50px; background-color:<?=$maincolor?>"  id="chat_button_submit_store"><div style="margin-left:0px; ">ส่ง</div></button></td>
  </tr>
</table></div>


 <table width="100%"  border="0" cellspacing="1" cellpadding="1" >
  <tr valign="top">
    <td width="<?=$td_chat_w?>" class="tool-td-chat">  <center>
      <button type="button"  class="btn btn-default tool-icon-text"  id="chat_icon_text_car"> <i class="fa fa-car"  ></i>  </button>
<br><div style="margin-top:5px; font-size:12px "><?=chat_place_car?></div>
</td>
    <td width="<?=$td_chat_w?>" class="tool-td-chat"> <center>
      <button type="button" class="btn btn-default tool-icon-text"  id="chat_icon_text_travel"> <i class="fa fa-street-view" ></i>  </button>  </button>
<br>
<div style="margin-top:5px; font-size:12px "> <?=chat_place_travel?></div></td>


    <td width="<?=$td_chat_w?>" class="tool-td-chat"><center>
        <button type="button" class="btn btn-default tool-icon-text"   id="chat_icon_text_food"> <i class="fa fa-cutlery" ></i>  </button> </button>
        <br>
        <div style="margin-top:5px; font-size:12px "><?=chat_place_food?></div>
    </center></td>
    <td width="<?=$td_chat_w?>" class="tool-td-chat" style="display:none "> 
<center>
<button type="button"  class="btn btn-default tool-icon-text"    id="chat_icon_text_life"  > 
<i class="fa fa-comments" ></i>  </button>  </button>
<br><div style="margin-top:5px; font-size:12px "><?=chat_place_all?></div></td>
  </tr>
 
 
</table>
</div>


<script>
 
$( "#btn_back_to_tool" ).click(function() {

///// tool status
 var tool_status = $( "#show_chat_tool" ).is(":hidden");
//////alert(tool_status);
/////
 $( "#show_chat_tool" ).toggle();
  $( "#show_text_tool" ).toggle();
 
});


////// car
$( "#chat_icon_text_car" ).click(function() { 
  $( "#popup_chat_share_text" ).toggle();
   var url_text = "<?=$chat_part?>go.php?name=livechat/sub/load&file=text_store&type=<?=$_GET[vc]?>&lang=<?=$_GET[lang]?>&type=60";
   $('#load_chat_share_text').load(url_text); 
});


////// travel
$( "#chat_icon_text_travel" ).click(function() { 
  $( "#popup_chat_share_text" ).toggle();
   var url_text = "<?=$chat_part?>go.php?name=livechat/sub/load&file=text_store&type=<?=$_GET[vc]?>&lang=<?=$_GET[lang]?>&type=71";
   $('#load_chat_share_text').load(url_text); 
});

////// food
$( "#chat_icon_text_food" ).click(function() { 
  $( "#popup_chat_share_text" ).toggle();
   var url_text = "<?=$chat_part?>go.php?name=livechat/sub/load&file=text_store&type=<?=$_GET[vc]?>&lang=<?=$_GET[lang]?>&type=70";
   $('#load_chat_share_text').load(url_text); 
});





////// life
$( "#chat_icon_text_life" ).click(function() { 
  $( "#popup_chat_share_text" ).toggle();
   var url_text = "<?=$chat_part?>go.php?name=livechat/sub/load&file=text_store&type=<?=$_GET[vc]?>&lang=<?=$_GET[lang]?>";
   $('#load_chat_share_text').load(url_text); 
});




  
 

</script>



