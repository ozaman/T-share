 
  
<style>
	.css-full-popup {
	position: fixed;
	left: 0px;
	top: 0px; 
 
	
	bottom:0;
	width: 100%;
	height: 100%;
	z-index: 9999; 
	overflow-y:hidden ; padding:0px; background-color:#FFFFFF; padding:10px; 
  
}
.back-full-popup
{ 
font-size:22px;   padding:10px;  color:#FFFFF;  width:100%; background-color:<?=$maincolor?>;      
 border-top: 0px solid #000000; margin-bottom: 0px;  
  top:  0; position:fixed;
    z-index: 1; 
 
}
 
</style>

 
 
<div class="css-full-popup"  id="alert_show_pic_place" style="display:none; position:fixed; overflow-y: auto ;overflow-x: none ; padding:0px; margin-top:45px; "> 
 
        <div class="back-full-popup"> 
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div class="button-close-popup-pic-place" ><?=$popup_icon_left_arow;?></div></td>
  <td   ><div style="font-size:22px; color:#FFFFFF " id="text_mod_topic_action_pic" class="text-topic-action-mod-place-pic">เลือกสถานที่ช็อปปิ้ง</div></td>
    <td width="50" align="right"   ><div style="font-size:22px; color:#FFFFFF " id="head_full_popup_icon"></div></td>
  </tr>
</table>
</div>
 
 
 
 
 
 
 <style>
 
 .div-all-work{
	 padding:5px;   border-radius: 3px; border: 1px solid #ddd;   background:<? echo $bgcolor; ?>; margin-bottom:20px; box-shadow: 0px  0px 10px #DADADA  ;
	 
 }
 
 
  .div-all-palce{
	 padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#F6F6F6;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ;
	 
 }
 
 
#pic_book_place {
     position: absolute;
     top: 0;
     left: 0;
     width: 100%; max-width: 1200px;
}
 
 
 </style> 
 
 
 
 <div style="margin-top:20px;">
 
 
 
 
 <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td><IMG SRC="../data/fileupload/shopping_place/<?=$arr[shop][post_date];?>.jpg" id="pic_book_place" name="view01" width="100%" BORDER="0"  style=" border-radius: 10px;" ></td>
    </tr>
    <tr>
      <td class="font-26"><center><b><?=$arr[shop][name];?></td>
    </tr>
  </tbody>
</table>

 
 
  
 
 
  <div>
  
    <div> 
 <script>
 
function create_responsive_viewport() {
    var ele = document.createElement("meta");
    ele.name = "viewport";
    if(window.outerWidth < 768) {
        ele.content = "width=device-width, initial-scale=1.0; user-scalable=yes, maximum-scale=1.5";
    }
    else {
        ele.content = "width=device-width, initial-scale=1.0; user-scalable=no, maximum-scale=1.0";
    }
    document.head.appendChild(ele);
    }
	
 
 
 //create_responsive_viewport();
 
 
 $(".button-close-popup-pic-place").click(function(){   
 
 
 
 $( "#alert_show_pic_place" ).hide();
 
  });

</script>