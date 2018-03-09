  
   <section class="sidebar" > 
  <ul class="sidebar-menu" > 
 
       
   
      <li  id="menu_all" >   
      
   
       
       
</li>
       
       
       
       
       
       
         
 
       
 
 
 
 <? if(1==0){ ?>
        
        
        	 <li  id="menu_register" class="treeview">
		         <a href="#" >
               <i class="fa  fa-user-plus l-menu-li-icon-main"></i> <span class="textmain-left-menu">&nbsp;เพื่อนร่วมงาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
 
 
 
 


          <ul class="treeview-menu"    >
		   <li ><a   id="menu_add_new_registers"   href="new_driver.php" target="_blank" ><i class="fa fa-plus-circle" ></i><span  class="textsub-left-menu-slide">เพิ่มเพื่อนร่วมงาน</span></a></li>
            <li ><a href="?name=register&file=all" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide">รายชื่อสมัครใหม่</span></a></li>
			<li ><a href="?name=register&file=all" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide">เพื่อนร่วมงานทั้งหมด</span></a></li>
 
 
 
          </ul>
        </li>
        
 
        
        <? } ?>
        
   
        
        	 <li   class="treeview">
		         <a  >
               <i class="icon-new-uniF142 l-menu-li-icon-main"></i> <span class="textmain-left-menu">&nbsp;จัดการงาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
 
 
 
 
 <ul class="treeview-menu"    >
		    
 
             <li ><a     id="slide_menu_add_new_shopping"><i class="fa fa-plus-circle" ></i><span  class="textsub-left-menu-slide" style="color: #000000;">ส่งแขก</span></a></li>
           
           <li ><a id="slide_menu_all_shopping" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide" style="color: #000000;">ประวัติส่งแขก</span></a></li>
           
            <li style="display:none" ><a href="?name=today" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide" style="color: #000000;">งานรับ-ส่ง</span></a></li>
 
          </ul>
        </li>
        
        
        
        
        
 <script>
 
$('#slide_menu_all_shopping').click(function(){  

 
 
$( "#load_mod_popup" ).toggle();
 
  var url_load = "load_page_mod.php?name=booking&file=all";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
 
 
 	});
	
	
	
	$('#slide_menu_add_new_shopping').click(function(){  


 // $( "#index_menu_shopping" ).click();
 
  $("#load_mod_popup" ).toggle();
 
  var url_load= "load_page_mod.php?name=shop&file=main&id=1&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop";
  
  $('#load_mod_popup').html(load_main_mod);
 
  $('#load_mod_popup').load(url_load); 
 
 /*
 
$( "#load_mod_popup" ).toggle();
 
  var url_load = "load_page_mod.php?name=booking&file=all";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
 */
 
 	});
	
	
 
	
 
					
 </script> 
        
        
        
        
        
        
		 <li  id="menu_user" class="treeview">
		         <a href="#" >
              <i class="icon-new-uniF10A-9 l-menu-li-icon-main"></i> <span class="textmain-left-menu">&nbsp;ข้อมูลรถ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
 
 
 
          
          <ul class="treeview-menu"  >
          
          
          
 <li ><a     id="slide_menu_add_new_car"><i class="fa fa-plus-circle" ></i><span  class="textsub-left-menu-slide" style="color: #000000;">เพิ่มรถใหม่</span></a></li>
            
   <li ><a   id="slide_menu_all_car"><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide" style="color: #000000;">รถทั้งหมด</span></a></li>
			
  
          </ul>
        </li>  
        
        
        
<script>
 
$('#slide_menu_add_new_car').click(function(){  
 
$( "#load_mod_popup" ).toggle();
 
  var url_load = "load_page_mod.php?name=car&file=new_car";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
 
 
 	});
	
	$('#slide_menu_all_car').click(function(){  
 
$( "#load_mod_popup" ).toggle();
 
  var url_load = "load_page_mod.php?name=car&file=all";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
 
 
 	});
 
	
 
					
 </script> 
        
        
        
        
<script>
			 
	////  
			 
 
$('#menu_add_new_booking').click(function(){  


 
 
 
/// $( ".outer-content-wait" ).toggle();
 $( "#alert_show_shopping_place" ).toggle();
	
 ///var url_chat_main = "new_driver.php";
 
 
    ///$('#load_mod_popup').html(load_main_mod);
///  $('#load_mod_popup').load(url_chat_main); 
 

 
 	});
 
					
 </script> 
 
  
 
        	 <script>
			 
	//// alert_show_shopping_place		 
			 
 
$('#menu_add_new_register').click(function(){  

 



 $( "#load_mod_popup" ).toggle();
	
 var url_chat_main = "new_driver.php";
	
 
 
    $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_chat_main); 
 

 
 	});
 
					
 </script> 
 
 
 
 

        
        
 

<? if(1==1){ ?>
		
 
 
		          
				<li  id="menu_pay" lass="treeview">
 
          <a  >
		  
		  <i class="icon-new-uniF121-10 l-menu-li-icon-main"></i> <span  class="textmain-left-menu">&nbsp;บัญชีรายรับ</span>
		     <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
		  
		   </a> 
           
      
		  
		   <ul class="treeview-menu">
            <li><a id="slide_menu_account_income"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;">รายรับ ค่าจอด ค่าหัว</span></a></li>
			<li style="display:none"><a href="?name=booking/account&file=pay"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;">ประวัติการถอนเงิน</span></a></li>
		<li><a id="slide_menu_account_bank"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;">บัญชีธนาคาร</span></a></li>
			 
		         </ul>
        </li>
		<? } ?>

 
 
 <script>
 
$('#slide_menu_account_income').click(function(){  
 
$( "#load_mod_popup" ).toggle();
 
  var url_load = "load_page_mod.php?name=booking/account&file=index";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
 	});
	
	
	
	$('#slide_menu_account_bank').click(function(){  
 
$( "#load_mod_popup" ).toggle();
 
  var url_load = "load_page_mod.php?name=pay&file=bank_book&driver=<?=$arr[web_user][id];?>&open=menu";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
  
 	});
	
 
 
	
 
					
 </script> 
        
 
 

 
 
		 <li  id="menu_user" class="treeview">
		         <a href="#" >
              <i class="icon-new-uniF133-2 l-menu-li-icon-main"></i> <span class="textmain-left-menu">&nbsp;ข้อมูลผู้ใช้งาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
 
 
          
          <ul class="treeview-menu"  >
            <li ><a id="slide_menu_user_profile" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide" style="color: #000000;">ข้อมูลส่วนตัว</span></a></li>
			
			<li ><a id="slide_menu_user_job" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide" style="color: #000000;">ข้อมูลและเอกสารสำคัญ</span></a></li>
			<!--mod/user/croppic_master/test.php href="mod/user/croppic_master/test.php"-->
			<li><a id="slide_menu_upload_users" href="mod/user/croppic_master/test.php?user=<?=$arr[web_user][username];?>"><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide" style="color: #000000;">เปลี่ยนภาพประจำตัว</span></a></li>
					<? if(1==0){ ?>	
			<li><a href="?name=user&file=network"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;">ข้อมูลการติดต่อสื่อสาร</span></a></li>
         
			<li><a href="?name=user&file=phone"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;">เบอร์โทรศัพท์ส่วนตัว</span></a></li>
		
		
			<li><a href="?name=user&file=password"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;">เปลี่ยนรหัสผ่าน</span></a></li>
			 

			 <li><a href="?name=user&file=document"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;">ไฟล์เอกสาร</span></a></li>
            
			<li><a href="?name=user&file=network"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide" style="color: #000000;">ข้อมูลการทำงาน</span></a></li>
			
			<? } ?>
          </ul>
        </li>

 <script>
 
$('#slide_menu_user_profile').click(function(){  
 
$( "#load_mod_popup" ).toggle();
 
  var url_load = "load_page_mod.php?name=user&file=index";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
 });
 
$('#slide_menu_upload_user').click(function(){  
 
$( "#load_mod_popup" ).toggle();
 
//  var url_load = "load_page_mod.php?name=user&file=upload_pic";
  var url_load = "load_page_mod.php?name=user/cropit_master/&file=background";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
 });
	
	
	
	$('#slide_menu_user_job').click(function(){  
 
$( "#load_mod_popup" ).toggle();
 
  var url_load = "load_page_mod.php?name=user&file=job";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
 	});
	
 
 
	
 
					
 </script> 
        
        
      
        
        
        
        
        
        
		
		
   
	 
 
		
		

		
		
		
 
		
		
		
		 <script>
 
$('#menu_chat').click(function(){  
  
 
  $( "#load_data_manage_work" ).toggle(); 
 
	
 var url_chat_main = "load_page_chat.php?name=livechat/all&file=all_contact&driverid=<?=$user_id?>&chat_from=driver&lang=th";
	
 
  

 
    $('#load_data_manage_work').html(load_main_mod);
	 $('#load_data_manage_work').load(url_chat_main); 
 
 
     	});
 
					
					</script> 
 
		
  	 <script>
 
$('#menu_chat_user').click(function(){  
 
 
  $( "#load_data_manage_work" ).toggle(); 
 
	
 var url_chat_main = "load_page_chat.php?name=livechat/all&file=all_user&driverid=<?=$user_id?>&chat_from=driver&lang=th";
	
 
  

 
    $('#load_data_manage_work').html(load_main_mod);
	 $('#load_data_manage_work').load(url_chat_main); 
 
 
 
 	});
 
					
 </script> 
		
 
		
		
	 
 	
		
		 
		
		<? if(0==1){ ?>
		
		 
 
 	 <li  id="menu_chat">
          <a >
            <i class="fa fa-comments l-menu-li-icon-main"></i> <span class="textmain-left-menu">&nbsp;แชท
			
			<? ///=$user_name_en?>
			
			</span>
      </a>
        </li>
        
        
        
  
  
 
 
 
		          
				<li  id="menu_pay" lass="treeview">
 
          <a  >
		  
		  <i class="fa fa-recycle l-menu-li-icon-main"></i> <span  class="textmain-left-menu">&nbsp;บัญชี การเงิน</span>
		     <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
		  
		   </a> 
		  
		   <ul class="treeview-menu">
            <li><a href="?name=pay&file=bank"><i class="fa fa-circle-o"></i><span  class="textsub_left_menu">บัญชีธนาคาร</span></a></li>
			<li><a href="?name=pay&file=pay"><i class="fa fa-circle-o"></i><span  class="textsub_left_menu">ค่าเที่ยว เบี้ยเลี้ยง</span></a></li>
			<li><a href="?name=pay&file=all"><i class="fa fa-circle-o"></i><span  class="textsub_left_menu">เงินเดือน ค่าโอที</span></a></li>
			 
		         </ul>
        </li>
	
		
		
		<li  id="menu_phone" lass="treeview">
 
          <a  >
		  
		  <i class="fa fa-phone l-menu-li-icon-main"></i> <span  class="textmain-left-menu">&nbsp;เบอร์โทรศัพท์</span>
		     <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
		  
		   </a> 
		  
		   <ul class="treeview-menu">
            <li><a href="?name=phone&file=phone"><i class="fa fa-circle-o"></i><span  class="textsub_left_menu">เบอร์โทรศัพท์ส่วนตัว</span></a></li>
			<li><a href="?name=phone&file=driver"><i class="fa fa-circle-o"></i><span  class="textsub_left_menu">เบอร์โทรศัพท์คนขับรถ</span></a></li>
 
			 
		         </ul>
        </li>
		
		
		
				<? } ?>
		
		<!------>
        
        <? if(1==0){ ?>
		<li  id="menu_pay" lass="treeview">
 
 	  
		  <i class="fa fa-desktop l-menu-li-icon-main"></i> <span  class="textmain-left-menu">&nbsp;โปรแกรมช่วยเหลือ</span>
		     <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
		  
 
     
		   <ul class="treeview-menu">
           
            <li><a href="https://www.flightradar24.com/data/flights" target="_blank"><i class="fa fa-bank " style="font-size:16px"></i><span  class="textsub_left_menu">ค้นหาโรงแรม</span></a></li>
			
           
            <li><a href="https://www.flightradar24.com/data/flights" target="_blank"><i class="fa fa-plane "></i><span  class="textsub_left_menu">เช็คเที่ยวบิน</span></a></li>
			 
			 
		         </ul>
        </li>
		
        <? } ?>
        
		<!------>
		
	
		
		
 
						<li  id="menu_logout">
          <a  id="l-logout" >
		  
            <i class="icon-new-uniF186 l-menu-li-icon-main" ></i> <span class="textmain-left-menu" >&nbsp;ออกจากระบบ</span>
      </a>
        </li>
        
		<script>
		$("#l-logout").click(function(){ 
 
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "ว่าต้องการออกจากระบบ",
		type: "error",
		showCancelButton: true,
		animation:  false ,
		
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'ใช่',
		cancelButtonText: "ไม่ใช่",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
	
swal("ออกจากระบบสำเร็จ", "success");

window.location = "signin.php";;
 
 
	//  alert('dd');
    } else {
      swal("Cancelled", "", "error");
    }
	});
	   
	    

});
		
		
		 
		</script>

		<script src="js/jquery-main.js"></script> 
        
        
        <style>
		/* menu*/


.textmain-left-menu  {
  font-size:<?=26-$fontmobile;?>px; 
  
font-family:Tahoma,Arial, Helvetica, sans-serif;  
  color:#666666;
  }

    .textsub-left-menu-slide    {
  font-size:<?=24-$fontmobile;?>px;   padding-left:5px;
  }
  
      .textsub-left-menu-slide a  {
  font-size: <?=24-$fontmobile;?>px; padding-top:10px;  padding-left:5px;
  }
  
      .textsub-left-menu-slide:hover  {
  font-size:20px;  font-family: color:<?=$main_color?>;
  }
  .l-menu-li {
  
  border-bottom:  solid 1px #999999;
  }
  
    .l-menu-li-icon-main { 
	font-size:<?=34-$fontmobile;?>px; padding-right:0px; color:<?=$main_color?>; margin-left:-10px;
   }
   
		
		</style>