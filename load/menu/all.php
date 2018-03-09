
  
 
 	
  
 
 
    
    
  <style>
  .textmain-left-menu  {
  font-size:22px; 
  
font-family:Tahoma,Arial, Helvetica, sans-serif;  
  color:#666666;
  }

    .textsub-left-menu-slide    {
  font-size:20px;  font-family:Tahoma,Arial, Helvetica, sans-serif; padding-left:5px;
  }
  
      .textsub-left-menu-slide a  {
  font-size:20px;  font-family:Tahoma,Arial, Helvetica, sans-serif;padding-top:10px;; padding-left:5px;
  }
  
      .textsub-left-menu-slide:hover  {
  font-size:20px;  font-family:Tahoma,Arial, Helvetica, sans-serif; color:<?=$main_color?>;
  }
  .l-menu-li {
  
  border-bottom:  solid 1px #999999;
  }
  
    .l-menu-li-icon { 
	font-size:24px; padding-right:30px; color:<?=$main_color?>;
   }
   
  </style>
  
  
  
  
  
   <section class="sidebar"   > 
  <ul class="sidebar-menu"> 
 
         
         
		       <li  id="menu_home" >
          <a href="index.php" >
            <i class="fa fa-home l-menu-li-icon"></i> <span class="textmain-left-menu">&nbsp;หน้าแรก</span>
      </a>
        </li>
		 
		 
 
	 
        	 <li  id="menu_register" class="treeview">
		         <a href="#" >
               <i class="fa  fa-user-plus l-menu-li-icon"></i> <span class="textmain-left-menu">&nbsp;เพื่อนร่วมงาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          
          <ul class="treeview-menu"    >
		   <li ><a   id="menu_add_new_register" ><i class="fa fa-plus-circle" ></i><span  class="textsub-left-menu-slide">เพิ่มเพื่อนร่วมงาน</span></a></li>
			<li ><a href="?name=register&file=member" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide">เพื่อนร่วมงาน</span></a></li>
 
 
 
          </ul>
        </li>
        
        
        
         
        
        
        
   <li   class="treeview">
		         <a  >
               <i class="fa  fa-taxi l-menu-li-icon"></i> <span class="textmain-left-menu">&nbsp;งานวันนี้</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          
                 <ul class="treeview-menu"    >
		   <li ><a   id="menu_add_new_booking"><i class="fa fa-plus-circle" ></i><span  class="textsub-left-menu-slide">เพิ่มงานใหม่</span></a></li>
            <li ><a href="?name=booking&file=all" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide">งานทั้งหมด</span></a></li>
 
          </ul>
        </li>
        
        
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
 
$('#menu_add_new_register').click(function(){  

 

 $( "#load_mod_popup" ).toggle();
	
 var url_chat_main = "new_driver.php";
	
 
 
    $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_chat_main); 
 

 
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
		
 
		
		
		 <li  id="menu_user" class="treeview">
		         <a href="#" >
             <i class="fa fa-cogs l-menu-li-icon"></i> <span class="textmain-left-menu">&nbsp;จัดการรถ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          
          <ul class="treeview-menu"    >
		   <li ><a href="?name=checkcar&file=data" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide">ข้อมูลรถ</span></a></li>
            <li ><a href="?name=checkcar" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide">ตรวจเช็คสภาพรถ</span></a></li>
			<li><a href="?name=checkcar&file=repair"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide">แจ้งซ่อมรถ</span></a></li>
			<li><a href="?name=checkcar&file=service"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide">ศูนย์บริการและประกันภัย</span></a></li>
 
 
          </ul>
        </li>
		
		
		
		
 
		
		 <li  id="menu_user" class="treeview">
		         <a href="#" >
              <i class="fa fa-user l-menu-li-icon"></i> <span class="textmain-left-menu">&nbsp;ข้อมูลผู้ใช้งาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu"  >
            <li ><a href="?name=user" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide">ข้อมูลส่วนตัว</span></a></li>
			
			<li ><a href="?name=user&file=job" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide">ข้อมูลการทำงาน</span></a></li>
			
			<li><a href="?name=user&file=network"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide">ข้อมูลการติดต่อสื่อสาร</span></a></li>
			<li><a href="?name=user&file=phone"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide">เบอร์โทรศัพท์ส่วนตัว</span></a></li>
			<? if(1==0){ ?>
			<li><a href="?name=user&file=pic"><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide">เปลี่ยนภาพประจำตัว</span></a></li>
			<? } ?>
			<li><a href="?name=user&file=password"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide">เปลี่ยนรหัสผ่าน</span></a></li>
			
			<? if(1==0){ ?>
			 <li><a href="?name=user&file=document"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide">ไฟล์เอกสาร</span></a></li>
            
			<li><a href="?name=user&file=network"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide">ข้อมูลการทำงาน</span></a></li>
			
			<? } ?>
          </ul>
        </li>
		
		
		<? if(1==1){ ?>
		
		 
 
 
 
		          
				<li  id="menu_pay" lass="treeview">
 
          <a  >
		  
		  <i class="fa fa-recycle l-menu-li-icon"></i> <span  class="textmain-left-menu">&nbsp;บัญชี การเงิน</span>
		     <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
		  
		   </a> 
		  
		   <ul class="treeview-menu">
            <li><a href="?name=pay&file=bank"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide">บัญชีธนาคาร</span></a></li>
			<li><a href="?name=pay&file=pay"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide">ค่าเที่ยว เบี้ยเลี้ยง</span></a></li>
			<li><a href="?name=pay&file=all"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide">เงินเดือน ค่าโอที</span></a></li>
			 
		         </ul>
        </li>
		<? } ?>
        
        
        
        
		
        
        
		<? if(1==0){ ?>
        
 
		<li  id="menu_phone" lass="treeview">
 
          <a  >
		  
		  <i class="fa fa-phone l-menu-li-icon"></i> <span  class="textmain-left-menu">&nbsp;เบอร์โทรศัพท์</span>
		     <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
		  
		   </a> 
		  
		   <ul class="treeview-menu">
            <li><a href="?name=phone&file=phone"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide">เบอร์โทรศัพท์ส่วนตัว</span></a></li>
			<li><a href="?name=phone&file=driver"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide">เบอร์โทรศัพท์คนขับรถ</span></a></li>
 
			 
		         </ul>
        </li>
		
		
		<? } ?>
 
 <li  id="menu_logout">
          <a  id="l-logout" >
		  
            <i class="fa fa-share-square l-menu-li-icon" ></i> <span class="textmain-left-menu" >&nbsp;ออกจากระบบ</span>
      </a>
        </li>
		<br>
<br>
<br>
<br>
<br>
<br>
 
 

		<script>
		
		$("#l-logout").click(function(){ 
 
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "ว่าต้องการออกจากระบบ",
		type: "error",
		showCancelButton: true,
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
		
		
		
		
		
		
		
		
		
		
		