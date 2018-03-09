<?
$ok_button_color="#0CD314";
$no_button_color="#F50202";

?>
 
 
 <script>
  // Approve - Reject image
 
//$(document).ready(function(){
 

  $(".btnstatus").click(function(){




 var data_lat = document.getElementById('check_data_status_gps_lat_old').value;
 var data_lng = document.getElementById('check_data_status_gps_lng_old').value;
 
 
 
   var col_name = $(this).attr('col_name');
   var data_id = $(this).attr("data_id");
   var data_val = $(this).attr("data_val");
     var data_vc = $(this).attr("data_vc");
	var data_report_id = $(this).attr("data_report_id");
	
   var data_sv = '<?=$_GET[sv];?>';
   
  //// alert(data_report_id);
 
    document.getElementById('vc').value=$(this).attr("data_vc");
 
 if(data_lng==0 ||  data_lng==''){
  
// $( "#popup_work_preview_map" ).slideToggle("slow");
 }
 
 
 
 
 //// ถึงสถานที่รับ

if(col_name == 'driver_topoint'){ 


 
 $('#btn_confirm_topoint_<?=$arr[project][id];?>').click(function(){  
 
 
 
 
  
  /*
    
  var url_golf_company="find.php?name=list/golf&file=product&crid="+document.getElementById('company_golf').value;
	url_golf_company=url_golf_company+"&area="+document.getElementById('province_golf').value;
	url_golf_company=url_golf_company+"&agent="+document.getElementById('agent').value;
  
 
  
 
  $.post('popup.php?name=user&file=savedata&type=selectcar&id=<?=$arr[web_driver][id]?>',$('#edit_form').serialize(),function(response){
   $('#show_data_res_<?=$arr[project][id];?>').html(response);
  });
 
 
 
 */
 
 
 

 	$.post("popup.php?name=action&file=action", { col_name : col_name ,data_id: data_id ,data_val : data_val,data_sv: data_sv,data_lat: data_lat,data_lng: data_lng   }, function(theResponse){ 
				var msg = theResponse; $('#show_data_res_'+data_id).html(msg);
					});
					
					

		 
				
				
				  });
 
				}
		   
		   

  
  ////// 
  
  
  
  
  
 //// ถึงสถานที่รับ

if(col_name == 'driver_pickup'){ 




 

/// เจอแขก
 
 $('#btn_confirm_<?=$arr[project][id];?>').click(function(){  
   
$.post("popup.php?name=action&file=action", { col_name : col_name ,data_id: data_id ,data_val : data_val,data_sv: data_sv,data_lat: data_lat,data_lng: data_lng   }, function(theResponse){ 
var msg = theResponse; $('#show_data_res_'+data_id).html(msg);
});
	 	
				  });
				  
 
			
			
//// ไม่เจอแขก		
 
 $('#btn_guest_no_<? echo $arr[project][id];?>').click(function(){  
$.post("popup.php?name=action&file=action", { col_name : col_name ,data_id: data_id ,data_val : data_val,data_sv: data_sv,data_lat: data_lat,data_lng: data_lng   }, function(theResponse){ 
var msg = theResponse; $('#show_data_res_'+data_id).html(msg);
});
					
 });
				  	
			
				  
				  
				  
				  
				  
				  
				  
 
				}
		   
		   

  
  ////// 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
		   
		   
 });	
 
 


///});
</script>
 

<style>
 .iframe-popup {
       border: none;
    top: 0; right: 0;
    bottom: 0; left: 0;
    width: 100%;
    height: 50%;
}
 
 </style>


 
 <!------ end---->  

    <style>
  /* Tooltip */
  .test + .tooltip > .tooltip-inner {
      background-color: #006699; text-align:left;
      color: #FFFFFF; 
      border: 0px solid #FF3300; 
 
      font-size: 13px;
  }
  /* Tooltip on top */
  .test + .tooltip.top > .tooltip-arrow {
      border-top: 5px solid #FF3300;
  }
  /* Tooltip on bottom */
  .test + .tooltip.bottom > .tooltip-arrow {
      border-bottom: 5px solid blue;
  }
  /* Tooltip on left */
  .test + .tooltip.left > .tooltip-arrow {
      border-left: 5px solid red;
  }
  /* Tooltip on right */
  .test + .tooltip.right > .tooltip-arrow {
      border-right: 5px solid black;
  }
  .test { width:500px: }
  </style>