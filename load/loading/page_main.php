 
<script type="text/javascript">
$(window).load(function() {
 $(".outer-loading").fadeOut();
})
</script>
 <?
 
 include "../../css/color/taxi.php"
	
 ?>

<style>
 
.outer-loading {
    position: fixed; margin-left: 0px; margin-top: 0px; display:table; top:0; left:0;  
    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
   z-index:999999999999; background:#FFF;    
 
}

.inner-loading {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
	    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
	background:none;    
}


.navloadmain {
  display: block;
  background-color: #f7f7f7;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f7f7), to(#e7e7e7));
  background-image: -webkit-linear-gradient(top, #f7f7f7, #e7e7e7); 
  background-image: -moz-linear-gradient(top, #f7f7f7, #e7e7e7); 
  background-image: -ms-linear-gradient(top, #f7f7f7, #e7e7e7); 
  background-image: -o-linear-gradient(top, #f7f7f7, #e7e7e7); 
  color: <?=$main_color?>;
 
  width:  120px;
  height: 120px;
 
  text-align: center;
 
  border-radius: 50%;
  box-shadow: 0px 3px 8px #aaa, inset 0px 2px 3px #fff;
}

 

</style>


 
 
<div class="outer-loading"   id="main_index_load_page_mod">
   <div class="inner-loading">
 
 <center>
<span  class="navloadmain">
 <i class="fa fa-circle-o-notch fa-spin 4x" style="font-size:100px;  margin-top:10px; " ></i> 
 </center></span>
 <div style="font-size:14px; color:#333333; font-weight:normal; margin-top:10px "><center> โหลดข้อมูล</center></div>
 
     </div>
   </div>
 
 
 
 
