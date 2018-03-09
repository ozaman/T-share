

<style>
 
.outer-loading-mod {
    position: fixed; margin-left: 0px; margin-top: 0px; display:table; top:0; left:0;  
    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
   z-index:99; background:#FFF;    
 
}

.inner-loading {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
	    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
	background:none;    
}

 
 .navload {
  display: block;
  background-color: #f7f7f7;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f7f7), to(#e7e7e7));
  background-image: -webkit-linear-gradient(top, #f7f7f7, #e7e7e7); 
  background-image: -moz-linear-gradient(top, #f7f7f7, #e7e7e7); 
  background-image: -ms-linear-gradient(top, #f7f7f7, #e7e7e7); 
  background-image: -o-linear-gradient(top, #f7f7f7, #e7e7e7); 
  color: #a7a7a7;
 
  width:  60px;
  height: 60px;
 
  text-align: center;
 
  border-radius: 50%;
  box-shadow: 0px 3px 8px #aaa, inset 0px 2px 3px #fff;
}

 
 
 
 

</style>


 
 
<div class="outer-loading-mod"   id="main_index_load_page_mod">
   <div class="inner-loading">
 
 <center>
<span  class="navload">
 <i class="fa fa-refresh fa-spin 4x" style="font-size:40px; color:#999999; margin-top:10px; " ></i> 
 </center></span>
 <div style="font-size:14px; color:#333333; font-weight:normal; margin-top:10px "><center> โหลดข้อมูล</center></div>
 
     </div>
   </div>
 
 
  
