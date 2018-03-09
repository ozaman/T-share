<a data-dismiss="modal" data-backdrop="static">
 

 <div  class="back_popup_page" ><font color="#FFFFFF"><i class="fa    fa-arrow-circle-left"></i>&nbsp;ย้อนกลับหน้าที่แล้ว <? echo $arr[project][id];?></div>
 
 
<script>
 
$('.back_popup_page').click(function(){  
 
 
 
 
 $(".css-full-popup-<? echo $arr[project][id];?>" ).toggle();
 
 });

</script>
 
 
 
</font></a>
 <style>
.back_popup_page
{ 
font-size:24px;   padding:5px; color:#FFFF99;width:100%; background-color:<?=$main_color?>;      
 border-bottom: 0px solid #ffffff; margin-bottom: 0px;
 
    position: fixed;
  top:  0;
 
 box-shadow: 1px 1px 10px #999999;
  left: 0; z-index:999;
 
}
 </style><style>
	.css-full-popup-mini {
	position: fixed;
	left: 0px;
	top: 0px; 
	bottom:0;
	width: 100%;
	height: 100%;
	z-index: 9999; 
	overflow-y:hidden ; padding:0px; background-color:#FFFFFF;
 
}
 
</style>