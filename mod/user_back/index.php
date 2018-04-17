
 <script>
 $('.text-topic-action-mod').html('ข้อมูลส่วนตัวผู้ใช้งาน');
 
 </script>
<style type="text/css">
.mainpic_index {

   padding:10px;   
   
           -moz-border-radius:50%;
        -webkit-border-radius:50%;
        border-radius:50%;

   border:1px solid #FFFFFF; background-color:#FFFFFF; 
   box-shadow: 2px 1px 5px #333333; margin-right:5px; margin-bottom:5PX;max-width:400px;
    
}
.mainpic_dv {

   padding:10px;   
 

   border:1px solid #FFFFFF; background-color:#FFFFFF; 
   box-shadow: 2px 1px 5px #333333; margin-right:5px; margin-bottom:5PX;max-width:400px;
    
}

.mainpic {
   border:8px solid #FFFFFF; background-color:#FFFFFF; 
   box-shadow: 2px 1px 10px #333333; 
		
		 height:300px; width:300px;
       border-radius: 50%;
       background:url(../../admin/file/driver/pic/<?=$arr[web_user][post_date];?>.jpg);
	       background-size: 450px ;
    background-repeat: no-repeat; background-position:center;
        }

<!--
.topicname-user { padding-top:10px; padding-left: 0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #333333 ; text-align:left; margin:0px;  
 
}
.form-control { margin-left:0px; padding-left:0px; }


 
-->
</style>  

<? $coldata="col-md-6";?>

<form method="post"  id="edit_form" name="edit_form">


 
 <div class="box box-default" style="padding-top:30px;">
 
 
 
 
 
 
 
 


  
 
 
 			
                    
                    
                    
 				
   <!-- /.box-header -->
        <div class="box-body" >
          <div class="row">
          
		  
            <div class="<?= $coldata?>">
            
            
            
            <img src="../data/pic/driver/small/<?=$arr[web_user][username];?>.jpg"  width="98%"   border="0"  class="IMGSHOP"  style="display:none"  />
            
            
			 
                    <div class="topicname-user">ชื่อผู้ใช้งาน</div>
                    <input class="form-control" type="text" name="username" id="username" maxlength="50" required="true" style="width:100%" onkeypress="UserEnter(this,event)" value="<?=$arr[web_user][username];?>"  readonly="readonly">
           		 
					 </div> 
					 
					
					
					<div class="<?= $coldata?>">
			 
                     <div class="topicname-user">รหัสผ่าน</div>
                    <input class="form-control" type="text" name="password" id="password"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][password];?>" >
            
					 </div> 
                     
                     
                     
					 
					<div class="<?= $coldata?>">
			 
                     <div class="topicname-user">ชื่อ - นามสกุล (ไทย)</div>
                    <input class="form-control" type="text" name="name" id="name"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][name];?>" >
                     </div> 
				 
				 	 
					
                    <div class="<?= $coldata?>">
				 
                     <div class="topicname-user">ชื่อ - นามสกุล (อังกฤษ)</div>
                    <input class="form-control" type="text" name="name_en" id="name_en"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][name_en];?>" >
           
					 </div> 
                     
                     
					 
  <div class="<?= $coldata?>">
 
                     <div class="topicname-user">ชื่อเล่น</div>
                    <input class="form-control" type="text" name="nickname" id="nickname"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][nickname];?>" >
					 </div> 
					 
                     
                     
                    <div class="<?= $coldata?>">
 
                     <div class="topicname-user">เลขบัตรประจำตัวประชาชน</div>
                    <input class="form-control" type="text" name="idcard" id="idcard"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][idcard];?>" >
                     </div> 
		 
					  
             
             
             
             
					 <div class="<?= $coldata?>">
			 
                     <div class="topicname-user">หมายเลขใบขับขี่</div>
                    <input class="form-control" type="text" name="iddriving" id="iddriving"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][iddriving];?>" >
                    
          
					 </div>  
                     
 
					 
	 
	 
                    <div class="<?= $coldata?>">
		 
                     <div class="topicname-user">ที่อยู่</div>
                    <input class="form-control" type="text" name="address" id="address"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][address];?>" >
                     </div> 
			 
				 
                 
                 		
                    <div class="<?= $coldata?>">
			 
                     <div class="topicname-user">เบอร์โทรศัพท์</div>
                    <input class="form-control" type="number" name="phone" id="phone"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][phone];?>" >
                     </div> 
				 
	 
 		
                    <div class="<?= $coldata?>">
			 
                     <div class="topicname-user">เบอร์โทรฉุกเฉิน</div>
                    <input class="form-control" type="number" name="contact" id="contact"  required="true" onkeypress="PasswordEnter(this,event)"  value="<?=$arr[web_user][contact];?>"  >
					<?  if($arr[web_user][contact]==""){ ?> <script type="text/javascript"> $('#contact').addClass("tab_alert2");</script> <? } ;?> 
 
					</div> 
					
					 
                     
                                  <div class="<?= $coldata?>"> 
                                  
                             <div class="topicname-user"> 
                                  
                        <div  id="send_user_data"  style="width:100%"> </div>
                       </div> 
                     </div> 
                     
 
  

       
					
      
   <div class="<?= $coldata?>"> 
   
   
     <div class="topicname-user"> 
      <table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="50%"><button id="submit_user_data" type="button" class="btn btn-block btn-primary" style="width:100% ">บันทึกข้อมูล</button></td>
    <td width="50%"><button type="reset" class="btn btn-block btn-default"  style="width:100% ">รีเซ็ต</button></td>
  </tr>
</table> 
 
     
     </div>


 


     </div> 




</form>

 
 
 
 
               
					 
 
 
 




 <script>
 /// check login

$("#submit_user_data").click(function(){ 
 
if(document.getElementById('password').value=="") {
alert('กรุณากรอกรหัสผ่าน'); 
document.getElementById('password').focus() ; 
return false ;
}
if(document.getElementById('name').value=="") {
alert('กรุณากรอกชื่อ - นามสกุล(ภาษาไทย)'); 
document.getElementById('name').focus() ; 
return false ;
}

/*

if(document.getElementById('name_en').value=="") {
alert('กรุณากรอกชื่อ - นามสกุล(ภาษาอังกฤษ)'); 
document.getElementById('name_en').focus() ; 
return false ;
}

*/

if(document.getElementById('nickname').value=="") {
alert('กรุณากรอกชื่อเล่น'); 
document.getElementById('nickname').focus() ; 
return false ;
}

/*
if(document.getElementById('idcard').value=="") {
alert('กรุณากรอกเลขบัตรประจำตัวประชาชน'); 
document.getElementById('idcard').focus() ; 
return false ;
}
if(document.getElementById('iddriving').value=="") {
alert('กรุณากรอกหมายเลขใบขับขี่'); 
document.getElementById('iddriving').focus() ; 
return false ;
}

*/

if(document.getElementById('address').value=="") {
alert('กรุณากรอกที่อยู่'); 
document.getElementById('address').focus() ; 
return false ;
}
if(document.getElementById('phone').value=="") {
alert('กรุณากรอกเบอร์โทรศัพท์'); 
document.getElementById('phone').focus() ; 
return false ;
}

/*
if(document.getElementById('contact').value=="") {
alert('กรุณากรอกเบอร์โทรฉุกเฉิน'); 
document.getElementById('contact').focus() ; 
return false ;
}

*/
 
 $.post('go.php?name=user&file=savedata&type=user&id=<?=$arr[web_user][id]?>',$('#edit_form').serialize(),function(response){
   $('#send_user_data').html(response);
  });
  
  
 });
 </script> 