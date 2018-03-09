  <?  include ("mod/livechat/config.php");?> 
<style>
	.css-full-popup {
	position: fixed;
	left: 0px;
	top: 0px; 
	bottom:0;
	width: 100%;
	height: 100%;
	z-index: 9999; 
	overflow-y:hidden ; padding:0px; background-color:#FFFFFF; 
 
}

 

.back-full-popup
{ 
font-size:22px;   padding:10px;  color:#FFFFF;  width:100%; background-color:<?=$maincolor?>;      
 border-top: 0px solid #000000; margin-bottom: 0px;  
  top:  0; position:fixed;
    z-index: 1; 
 
}
 
 
</style> 
 
 
<div class="css-full-popup" id="load_data_new_alert" style="display:none; position:fixed; overflow: auto "> 
<?  /// include "load/loading/page_main.php" ; ?>
 

</div>


        