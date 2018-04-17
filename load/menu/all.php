
  
 
 	
  
 
 
    
    
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
            <i class="fa fa-home l-menu-li-icon"></i> <span class="textmain-left-menu">&nbsp;<? echo i_home?></span>
      </a>
        </li>
		 
		 
 
	 
        	 <li  id="menu_register" class="treeview">
		         <a href="#" >
               <i class="fa  fa-user-plus l-menu-li-icon"></i> <span class="textmain-left-menu">&nbsp;<? echo t_colleague?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          
          <ul class="treeview-menu"    >
		   <li ><a   id="menu_add_new_register" ><i class="fa fa-plus-circle" ></i><span  class="textsub-left-menu-slide"><? echo t_add_colleague?></span></a></li>
			<li ><a href="?name=register&file=member" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide"><? echo t_colleague?></span></a></li>
 
 
 
          </ul>
        </li>
        
        
        
         
        
        
        
   <li   class="treeview">
		         <a  >
               <i class="fa  fa-taxi l-menu-li-icon"></i> <span class="textmain-left-menu">&nbsp;<? echo t_today_job?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          
                 <ul class="treeview-menu"    >
		   <li ><a   id="menu_add_new_booking"><i class="fa fa-plus-circle" ></i><span  class="textsub-left-menu-slide"><? echo t_add_new_job?></span></a></li>
            <li ><a href="?name=booking&file=all" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide"><? echo t_all_jobs?></span></a></li>
 
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
             <i class="fa fa-cogs l-menu-li-icon"></i> <span class="textmain-left-menu">&nbsp;<? echo t_manage_car?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          
          <ul class="treeview-menu"    >
		   <li ><a href="?name=checkcar&file=data" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide"><? echo t_car_information?></span></a></li>
            <li ><a href="?name=checkcar" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide"><? echo t_check_condition_car?></span></a></li>
			<li><a href="?name=checkcar&file=repair"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide"><? echo t_inform_car_repair?></span></a></li>
			<li><a href="?name=checkcar&file=service"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide"><? echo t_service_and_insurance?></span></a></li>
 
 
          </ul>
        </li>
		
		
		
		
 
		
		 <li  id="menu_user" class="treeview">
		         <a href="#" >
              <i class="fa fa-user l-menu-li-icon"></i> <span class="textmain-left-menu">&nbsp;<? echo t_user_information?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu"  >
            <li ><a href="?name=user" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide"><? echo t_personal_information?></span></a></li>
			
			<li ><a href="?name=user&file=job" ><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide"><? echo t_work_information?></span></a></li>
			
			<li><a href="?name=user&file=network"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide"><? echo t_contact_information?></span></a></li>
			<li><a href="?name=user&file=phone"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide"><? echo t_phone_number_the?></span></a></li>
			<? if(1==0){ ?>
			<li><a href="?name=user&file=pic"><i class="fa fa-circle-o" ></i><span  class="textsub-left-menu-slide"><? echo t_change_profile_picture?></span></a></li>
			<? } ?>
			<li><a href="?name=user&file=password"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide"><? echo t_change_password?></span></a></li>
			
			<? if(1==0){ ?>
			 <li><a href="?name=user&file=document"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide"><? echo t_documents?></span></a></li>
            
			<li><a href="?name=user&file=network"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide"><? echo t_work_information?></span></a></li>
			
			<? } ?>
          </ul>
        </li>
		
		
		<? if(1==1){ ?>
		
		 
 
 
 
		          
				<li  id="menu_pay" lass="treeview">
 
          <a  >
		  
		  <i class="fa fa-recycle l-menu-li-icon"></i> <span  class="textmain-left-menu">&nbsp;<? echo t_financial_accounting?></span>
		     <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
		  
		   </a> 
		  
		   <ul class="treeview-menu">
            <li><a href="?name=pay&file=bank"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide"><? echo t_bank_account?></span></a></li>
			<li><a href="?name=pay&file=pay"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide"><? echo t_missed_meal_fee?></span></a></li>
			<li><a href="?name=pay&file=all"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide"><? echo t_overtime_pay?></span></a></li>
			 
		         </ul>
        </li>
		<? } ?>
        
        
        
        
		
        
        
		<? if(1==0){ ?>
        
 
		<li  id="menu_phone" lass="treeview">
 
          <a  >
		  
		  <i class="fa fa-phone l-menu-li-icon"></i> <span  class="textmain-left-menu">&nbsp;<? echo t_phone_number?></span>
		     <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
		  
		   </a> 
		  
		   <ul class="treeview-menu">
            <li><a href="?name=phone&file=phone"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide"><? echo t_phone_number_the?></span></a></li>
			<li><a href="?name=phone&file=driver"><i class="fa fa-circle-o"></i><span  class="textsub-left-menu-slide"><? echo t_driver_phone_no?></span></a></li>
 
			 
		         </ul>
        </li>
		
		
		<? } ?>
 
 <li  id="menu_logout">
          <a  id="l-logout" >
		  
            <i class="fa fa-share-square l-menu-li-icon" ></i> <span class="textmain-left-menu" >&nbsp;<? echo t_sign_out?></span>
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
		title: "<font style='font-size:28px'><b> <? echo t_are_you_sure?>",
		text: "<? echo t_confirm_signout?>",
		type: "error",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: '<? echo t_yes?>',
		cancelButtonText: "<? echo t_no?>",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
	
swal("<? echo t_sign_out_successfully?>", "<? echo t_success?>");

window.location = "signin.php";;
 
    
   
	//  alert('dd');
    } else {
      swal("<? echo t_cancelled?>", "", "<? echo t_error?>");
    }
	});
	   
	    

});
		
		
		
		</script>
		
		
		
		
		
		
		
		
		
		
		