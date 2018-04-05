<div  style="padding-top:0px; padding:5px; ">
						
<table width="100%"  border="0" cellspacing="2" cellpadding="2"  >
  <tr align="center">
    <td width="20%" bgcolor="#999999"  style="color:#FFFFFF; padding:8px; font-size: 16px; "><b>วันที่</b></td>
    <td width="10%" bgcolor="#999999" style="color:#FFFFFF; padding:8px; font-size: 16px; "><b>งาน </b></td>
    <td width="30%" bgcolor="#999999" style="color:#FFFFFF; padding:8px; font-size: 16px; "><b>ราบจ่าย </b> </td>
    <td width="30%" bgcolor="#999999" style="color:#FFFFFF; padding:8px; font-size: 16px; "><span class="font_16" style="color:#FFFFFF; padding:2px; "><b>รวม</b> </span></td>
  </tr>
</table>
						
</div>

 
 
 <style >
 	.font_18{
 		font-size: 16px !important;
 	}
 </style>
 <script >
 	function opencheckwork(start,dri) {
 		//alert(start+'_'+dri);

 		var url_load= "load_page_mod_2.php?name=booking&file=all_job_history&date="+start;	  
	  console.log(url_load);
	  
	  $('#load_mod_popup').html(load_main_mod);
	  
	  $('#load_mod_popup').load(url_load);
	 // $.post( url_load, function( data ) {
  $('#load_mod_popup').html(data);
//});
 
// 	  $("#main_load_mod_popup_1" ).toggle();
	  
// 	  var url_load= "load_page_mod_1.php?name=transfer_order&file=work_list_job_history&date="+start+"&transfer_work=true";
// //	  var url_load= "load_page_mod.php?name=transfer_order&file=work_list&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>";
	  
// 	  console.log(url_load);
// 	  $('#load_mod_popup_1').html(load_main_mod);
	 
// 	  $('#load_mod_popup_1').load(url_load); 
 
 	
 		// body...
 	}
 </script>

 