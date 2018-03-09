<script>
 $("#phone_pickup").click(function(){ 
   
   
      swal({
	  imageUrl: "images/icon/view/phone.png",
		title: "<b class='font_24'><? echo $arr[phone][phone] ;?>",
		text: "คุณต้องการโทรออกหรือไม่",
		//type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#339933',
		confirmButtonText: 'โทร',
		cancelButtonText: "ยกเลิก",
		// timer: 2000,
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
		type: "success",
     swal("Complete!", "<? echo $arr[phone][phone] ;?>", "success");
	/// window.location.href='tel:<? echo $arr[phone][phone] ;?>','_blank'; 
	 
	  window.open('tel:<? echo $arr[phone][phone] ;?>','_blank');
	 
	 
	 
    } else {
	
	 //   $('body').css({overflow:'auto'});
  //    swal("Amend", "Your imaginary file is safe :)", "error");
	
	 
     }
	});
 	    

});
 

</script>


<script>
 $("#phone_toplace").click(function(){ 
   
   
      swal({
	  imageUrl: "images/icon/view/phone.png",
		title: "<b class='font_24'><? echo $arr[phoneto][phone] ;?>",
		text: "คุณต้องการโทรออกหรือไม่",
		//type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#339933',
		confirmButtonText: 'โทร',
		cancelButtonText: "ยกเลิก",
		// timer: 2000,
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
		type: "success",
     swal("Complete!", "<? echo $arr[phone][phone] ;?>", "success");
	/// window.location.href='tel:<? echo $arr[phone][phone] ;?>','_blank'; 
	 
	  window.open('tel:<? echo $arr[phoneto][phone] ;?>','_blank');
	 
	 
	 
    } else {
	
	 //   $('body').css({overflow:'auto'});
  //    swal("Amend", "Your imaginary file is safe :)", "error");
	
	 
     }
	});
 	    

});
 

</script>





<script>
 $("#map_pickup").click(function(){ 
    
      swal({
	  imageUrl: "images/icon/view/map.png",
		title: "",
		text: "คุณต้องการเปิดแผนที่นำทางหรือไม่",
		//type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#339933',
		confirmButtonText: 'เปิด',
		cancelButtonText: "ยกเลิก",
		// timer: 2000,
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
		type: "success",
     swal("Complete!", "<? echo $arr[phone][phone] ;?>", "success");
	/// window.location.href='tel:<? echo $arr[phone][phone] ;?>','_blank'; 
	 
	  window.open('<?=$arr_map[$arr[project][pickup_place]];?>','_blank');
	 
	 
	 
    } else {
	
	 //   $('body').css({overflow:'auto'});
  //    swal("Amend", "Your imaginary file is safe :)", "error");
	
	 
     }
	});
 	    

});
 

</script>


<script>
 $("#map_toplace").click(function(){ 
    
      swal({
	  imageUrl: "images/icon/view/map.png",
		title: "",
		text: "คุณต้องการเปิดแผนที่นำทางหรือไม่",
		//type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#339933',
		confirmButtonText: 'เปิด',
		cancelButtonText: "ยกเลิก",
		// timer: 2000,
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
		type: "success",
     swal("Complete!", "<? echo $arr[phone][phone] ;?>", "success");
	/// window.location.href='tel:<? echo $arr[phone][phone] ;?>','_blank'; 
	 
	  window.open('<?=$arr_map[$arr[project][to_place]];?>','_blank');
	 
	 
	 
    } else {
	
	 //   $('body').css({overflow:'auto'});
  //    swal("Amend", "Your imaginary file is safe :)", "error");
	
	 
     }
	});
 	    

});
 

</script>
