<style type="text/css">
<!--
.topicname { padding-top:10px; padding-left:0px; padding-bottom:5px; font-size:18px; font-weight:bold; color: #666666 ; text-align:left;  
 
}
 

 
-->
</style>  

 <div class="box box-default">
 
   <div class="box box-default">
          <h2 class="box-title"><span class="font_24"><b>ภาพประจำตัว</b></span></h2>

 
   </div>
<?
$filename = "../admin/file/driver/pic/" . $arr[web_user][post_date] . ".jpg";
if (file_exists($filename)) { //  
?>
 
 <style>
 .mainpic {
   border:8px solid #FFFFFF; background-color:#FFFFFF; 
   box-shadow: 2px 1px 10px #333333; 
		
		 height:300px; width:300px;
       border-radius: 50%;
       background:url(http://t-booking.com/admin/file/driver/pic/<?=$arr[web_user][post_date];?>.jpg);
	       background-size: 450px ;
    background-repeat: no-repeat; background-position:center;
        }
 </style>
<div class="mainpic"> </div>
<a href="http://t-booking.com/admin/file/driver/pic/<?=$arr[web_user][post_date];?>.jpg"  target="_blank">
 </a>

<? }else{ ?>
<img src="../admin/file/driver/pic/no.jpg" class="circleC"  width="90" height="200" border="0" id="view01"  />
<? } ?>
  

  <div class="box-body" style="margin-top:-10px; " > 
  
  
  
  
  
  
  
  
         <div class="row">
		            <div class="col-md-12">
			      <form method="post" action="" id="edit_form" name="edit_form"  enctype="multipart/form-data" >
<div>
                    <div class="topicname"><i class="fa  fa-envelope-square"></i>&nbsp;อีเมล์</div>
                    <input class="form-control" type="text" name="email" id="email"   required="true"  onkeypress="UserEnter(this,event)" value="<?=$arr[web_user][email];?>"    >
              </div>
                
				
				 
		      <div> 
            

				  </div>
			  
			  
			            <!---->
		
		 
 
		 
 
 
 
 

  
                        <div  id="send_user_data"></div>
  
  
    <div style="margin-top:10px;"  >
 <table width="100%"  border="0" cellspacing="2" cellpadding="2" >
  <tr>
    <td width="150" style="padding:5 px;"><input  id="submit_user_network" type="Submit" class="btn btn-block btn-primary" style="width:140px " value="บันทึกข้อมูล">
	</td>
    <td style="padding:5px;"><button type="reset" class="btn btn-block btn-default"  style="width:140px ">รีเซ็ต</button></td>
  </tr>
</table>
 
      </div>
        
    <div id="popup_line"></div> 
	 </form> 
    <?php echo  $celsius = ceil($fahrenheit - 273.15);
	
	$sunrise = date_sunrise(time(), SUNFUNCS_RET_DOUBLE, $latitude, $longitude, 96, 0); 
$sunset = date_sunset(time(), SUNFUNCS_RET_DOUBLE, $latitude, $longitude, 96, 0); 
echo $now = date("H") + date("i") / 60 + date("s") / 3600; 

        if ($sunrise < $sunset) {
                if (($now > $sunrise) && ($now < $sunset)){
                $icond="Day";
                }else{
               $icond="Night";
                } 
       	}else{ 
                if (($now > $sunrise) || ($now < $sunset)) {
                $icond="Day"; 
                }else{
                $icond="Night"; 
                }
        }
	echo $icond;
	?>
	