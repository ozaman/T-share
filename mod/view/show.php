
   <? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?>
 
 
 <div style="overflow: scroll; margin-top:30px; ">
<script>
 $("#head_full_popup" ).html("จัดการงาน <?=$_GET[day]?>");
  $("#head_full_popup_icon" ).html("<i class='fa  fa-clock-o'></i>");
 
 
$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
		
		 
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
 
    input.trigger('fileselect', [numFiles, label]);
  });

 

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {
 
         var input = $(this).parents('.input-group').find(':text'),
		//  var button = $(this).parents('.input-group').find(':button'),
		   // var input = $(this).parents('.input-group').find(':image'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;
 
 



          if( input.length ) {
		   
        input.val("ถ่ายภาพสำเร็จ");
		 input.css({"background": "#fa1431","color": "#337AB7", });
		 input.addClass("form-control");
		 button.addClass("btn-modal-no");
		
		
          } else {
           if( log ) alert(log);
          }

      });
  });
  
});

</script>
  

        <style type="text/css">
		
		.span-detail {
		font-size:16px;font-weight:normal;   padding-top:5px;   
		}
				.span-topic { width:150px;
		 
		}
		.topictransfer {padding-top:5px; font-family:Helvetica, sans-serif; padding-left:0x; padding-bottom:5px; margin-left:5px; font-size:18px; font-weight:bold; color: #444444 ; text-align:left;  
}
        
         input[type='text'], input[type='number'], input[type='tel'],textarea, input[type='password']
                {
                        background-color:White !important;
                        -moz-box-shadow: none !important;
                        -webkit-box-shadow: none !important;
                        box-shadow: none !important;
                        -moz-border-radius: 0em !important;
                        -webkit-border-radius: 0em !important;
                        border-radius:0em !important;
                        border:solid 1px #CCCCCC !important;
                }
        </style>

 
 

 
 
  <link rel="stylesheet" href="js/dialog/css.css">
 
       
<style type="text/css"> 
         #ulMember .mcode {display:inline-block;width:85px;}  
         #ulMember .inv {font-size:0.9em;color:#777777;}
         .ulLevel table {width:98%;}
         .ulLevel .col1 {width:40px;text-align:center;}
         .ulLevel .col2 {padding-left:10px;}
         .ulLevel .col3 {text-align:right;width:200px;}
         .ulLevel .mnl {color:#777777;font-size:0.85em;margin-right:5px;}
         .ulLevel .mnt {display:inline-block;width:80px;margin-right:50px;}
         .ulLevel .mnb {display:inline-block;width:80px;}
         .ulLevel .txl {display:inline-block;width:120px;padding:2px;text-align:left;}
         .ulLevel .txa {display:inline-block;width:50px;text-align:right;padding:2px;background-color:#CCCCCC;border-radius:5px;}
         .ulLevel .txg {display:inline-block;width:50px;text-align:right;padding:2px;background-color:#26CA50;border-radius:5px;text-shadow:none !important;font-weight:bold;}
         .ulLevel .txr {display:inline-block;width:50px;text-align:right;padding:2px;background-color:red;border-radius:5px;color:White; text-shadow:none !important;font-weight:bold;}
         .ulLevel .line {margin:2px;}
         .ulLevel .tbx {width:auto !important;margin-top:5px;}
         .ulLevel .tbx th {background-color:#888888;font-size:0.8em;font-weight:bold;width:100px; text-align:center;color:white;padding:5px 3px;border-radius:5px;}
         .ulLevel .tbx td {text-align:center;padding:5px 3px;}
         .ulLevel .red5 {background-color:Red;color:White;cursor:pointer;border-radius:5px;}
         .ulLevel .green5 {background-color:#26CA50;color:White;cursor:pointer;border-radius:5px;}
         .ulLevel .gay5 {background-color:#888888;color:White;cursor:pointer;border-radius:5px;}
         .ulLevel .normal {background-color:#EEEEEE;cursor:pointer;border-radius:5px;}
         .Detail div {margin-bottom:2px;}
         .Detail .mcode {display:inline-block;width:90px;margin-right:10px;}
         .Detail .tel {color:#666666;font-size:0.9em;}
         .Detail table {}
         .Detail th {background-color:#888888;font-size:0.8em;font-weight:bold;width:90px; text-align:center;color:white;padding:5px 3px;border-radius:5px;}
         .Detail td {text-align:center;padding:5px 3px;}
         .Detail .red5 {background-color:Red;color:White;border-radius:5px;}
         .Detail .green5 {background-color:#26CA50;color:White;border-radius:5px;}
         .Detail .gay5 {background-color:#888888;color:White;border-radius:5px;}
         .circleC {font-size:1.6em;}
		 .ui-dialog button.custom { background: #2dd25a;color:White; }
		 .ui-dialog button.closed { background: #fa1431;color:White; }
		 
		 /* Mask for background, by default is not display */
#mask {
    display: none;
    background: #000;
    position: fixed;
    left: 0;
    top: 0;
    z-index: 10;
    width: 100%;
    height: 100%;
    opacity: 0.8;
    z-index: 999;
}

/* You can customize to your needs  */
.login-popup {
    display: none;
    background: #333;
    padding: 10px;
    border: 2px solid #ddd;
    float: left;
    font-size: 1.2em;
    position: fixed;
    top: 50%;
    left: 50%;
    z-index: 99999;
    box-shadow: 0px 0px 20px #999;
    /* CSS3 */
        -moz-box-shadow: 0px 0px 20px #999;
    /* Firefox */
        -webkit-box-shadow: 0px 0px 20px #999;
    /* Safari, Chrome */
	border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px;
    /* Firefox */
        -webkit-border-radius: 3px;
    /* Safari, Chrome */;
}

img.btn_close {
    Position the close button
	float: right;
    margin: -28px -28px 0 0;
}

fieldset {
    border: none;
}

form.signin .textbox label {
    display: block;
    padding-bottom: 7px;
}

form.signin .textbox span {
    display: block;
}

form.signin p, form.signin span {
    color: #999;
    font-size: 11px;
    line-height: 18px;
}

form.signin .textbox input {
    background: #666666;
    border-bottom: 1px solid #333;
    border-left: 1px solid #000;
    border-right: 1px solid #333;
    border-top: 1px solid #000;
    color: #fff;
    border-radius: 3px 3px 3px 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    font: 13px Arial, Helvetica, sans-serif;
    padding: 6px 6px 4px;
    width: 200px;
}

form.signin input:-moz-placeholder {
    color: #bbb;
    text-shadow: 0 0 2px #000;
}

form.signin input::-webkit-input-placeholder {
    color: #bbb;
    text-shadow: 0 0 2px #000;
}

.button {
    background: -moz-linear-gradient(center top, #f3f3f3, #dddddd);
    background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#dddddd));
    background: -o-linear-gradient(top, #f3f3f3, #dddddd);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f3f3f3', EndColorStr='#dddddd');
    border-color: #000;
    border-width: 1px;
    border-radius: 4px 4px 4px 4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    color: #333;
    cursor: pointer;
    display: inline-block;
    padding: 6px 6px 4px;
    margin-top: 10px;
    font: 12px;
    width: 214px;
}

.button:hover {
    background: #ddd;
}
.ui-widget-overlay 
{
    background-color: black;
    background-image: none;
    opacity: 0.6;
    z-index: 1040;    
}


      .span-detail1 {		font-size:14px;font-weight:normal;   padding-top:0px;   
}
.topictransfer1 {padding-top:8px; font-family:Arial, Helvetica, sans-serif; padding-left:0x; padding-bottom:5px; margin-left:5px; font-size:16px; font-weight:bold; color: #444444 ; text-align:left;  
}



	.active{  font-weight:bold; color:3C8DB; font-size:18px;   
 		
	}
	
	
 
	
 
 
	
</style>





  <ul class="nav nav-tabs" style="padding:2px; padding-bottom:10px;">
    
    <li class="active" id="btn_chk_short" ><a >ข้อมูลแบบย่อ</a></li>
	 <li id="btn_chk_full" style="padding:2px;"><a >ข้อมูลทั้งหมด</a></li>
	 
   

	
 
  </ul>


<script>





</script>



 <script>
 
$('#btn_chk_short').click(function(){ 

$('.show_guest_detail_all').hide(''); 
$('.show_product_detail_all').hide(''); 

$('#btn_chk_short').addClass("active");
$('#btn_chk_full').removeClass("active");

 
 });




$('#btn_chk_full').click(function(){ 

$('.show_guest_detail_all').show(''); 	
	$('.show_product_detail_all').show(''); 
	
	$('#btn_chk_full').addClass("active");
	$('#btn_chk_short').removeClass("active");
	
	
 
 
 });

 
 	
					</script> 




 
<div >









    
<?
if($_GET[sv] == 'cn'){
	$link_vc = "http://www.t-bookingcn.com/";
}else{
	$link_vc = "http://www.t-booking.com/";
}

 

/// data db
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);

 
if($_GET[cartype]==2 ){ 
$res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where drivername='".$user_id."' and transfer_date='".$_GET[day]."' and carno = '".$_GET[carno]."'  and cartype= 2 and status='CONFIRM'  group  by invoice  order by airin_h ASC,airin_time ASC  limit 10 ");


///// ดึง 1 ข้อมูล
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);


	$res[projectshow] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where drivername='".$user_id."' and transfer_date='".$_GET[day]."' and carno = '".$_GET[carno]."' and cartype= 2 group by invoice");
	$arr[project่show] = $db->fetch($res[projectshow]);



 //echo $arr[project่show][name_pickup_place];
 
//echo $_GET[day];

///



///

 $allcar = $db->num_rows(TB_transfer_report_all,"id","drivername='".$user_id."' and transfer_date='".$_GET[day]."' and carno = '".$_GET[carno]."' and cartype= 2 group by invoice"); 
 
 
  $allcar_place = $db->num_rows(TB_transfer_report_all,"id","drivername='".$user_id."' and transfer_date='".$_GET[day]."' and carno = '".$_GET[carno]."' and cartype= 2  and place_number > 0 group by invoice"); 
  
  if($allcar_place==$allcar){
  
  $join_sort='place_number ASC';
  
  } else {
  
  $join_sort='airin_h ASC,airin_time ASC';
  
  }
  
 

}
 
 
 
?>

 
 
 
 


 <?
 
 ///แสดงสถานที่รับ และปุ่มกด ถ้าเป็น join รับเข้า
 
 
if($_GET[cartype]==2 and $arr[project่show][product_area]== 'In'  and $allcar > 1 ){

?>





<div id="tab_to_<?=$arr[project][id];?>"   style="background-color:#F6F6F6; padding-top:10PX; padding:3px;  border : 2px solid #DADADA;  
  -moz-border-radius:5px;
  -webkit-border-radius:5px;

 border-radius:5px; margin-bottom:20px;   ">
        <table width="100%"  border="0" cellspacing="2" cellpadding="2" style="border-bottom: solid 0px #999999;  " >
          <tr>
            <td width="45" ><div class="checkinstep" id="checkstep_1_<?=$arr[project][id];?>">
                <center>
                  <b>1</b>
                </center>
              </div>
                <div  style="position:absolute; margin-top:-30px; margin-left: -10px;"><img src="images/no.png"  align="absmiddle"  id="iconchk_s1_<?=$arr[project][id];?>"   /></div></td>
            <td width="120" valign="middle">
 <?
 include("mod/load/show/step/to.php");
 ?>
	  
	  </td>
            <td><div id="mapto_<?=$arr[project][id];?>" > </div></td>
          </tr>
        </table>
        

        
        
    </div>
 


        							   
 <div  align="left" style="font-size:20px; margin-top:-10px; padding-bottom:15px; "><b> <? echo $arr[project่show][name_pickup_place] ?> </b>
<font color="#666666" class="font_14"> (<? echo $arr[project่show][name_pickup_place_area] ?> | <? echo $arr[project่show][name_pickup_place_province] ?>) </div>

<? } ?>
 

 <?
if($_GET[cartype]==2 and $arr[project][product_area]<> 'In' and $arr[project][product_area] == 'Out' and $allcar > 1 ){

?>
 <div data-role="content"   role="main" style="background-color:#F6F6F6; padding-top:10PX; padding:3px;  border : 2px solid #DADADA;  
  -moz-border-radius:5px;
  -webkit-border-radius:5px;

 border-radius:5px; margin-bottom:20px; "   >
 
 
 
 
 <div  style="font-size:24px"><center><b>จัดอันดับสถานที่รับ</div>
	
 
 <?
$i=1;
while($arr[project] = $db->fetch($res[project])){


$bgcolor = ($b++ & 1) ? '#FFFFFF' : '#FFFDE9'; 




	////// งานรวม
	
 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
 /*
$db->update_db(TB_transfer_report_all,array(
			"driver_topoint"=>"0",
			"driver_pickup"=>"0",
			"driver_checkcar"=>"0",
			"driver_complete"=>"0"
 
		)," id='".$arr[project][id]."' ");
 
 */

 
 
$datetime = $arr[project][outdate]." ".$arr[project][airout_time].":00";
$exp = explode(" ",$datetime);
$t = explode(":",$exp[1]);
$d = explode("-",$exp[0]);

$time_booking = @mktime($t[0], $t[1], $t[2], $d[1], $d[2], $d[0]);	

/*
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[product] = $db->select_query("SELECT cartype,area,admin_company,topic_en,topic_th  FROM web_transferproduct WHERE id='".$arr[project][program]."' ");
	$arr[project] = $db->fetch($res[product]);
 */
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[showlogo] = $db->select_query("SELECT id,company,company_or FROM ".TB_admin." WHERE id='".$arr[project][agent]."' ");
	$arr[showlogo] = $db->fetch($res[showlogo]);
	
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[pickup] = $db->select_query("SELECT topic,amphur,province,phone FROM ".TB_transferplace." WHERE id='".$arr[project][pickup_place]."' ");
$arr[pickup] = $db->fetch($res[pickup]);
	
	$res[to] = $db->select_query("SELECT topic,amphur,province,phone FROM ".TB_transferplace." WHERE id='".$arr[project][to_place]."' ");
	$arr[to] = $db->fetch($res[to]);
	///
	 $res[pickupmap] = $db->select_query("SELECT map FROM ".TB_transferplace_new." WHERE id='".$arr[project][pickup_place]."' ");
$arr[pickupmap] = $db->fetch($res[pickupmap]);
	
	$res[tomap] = $db->select_query("SELECT map FROM ".TB_transferplace_new." WHERE id='".$arr[project][to_place]."' ");
	$arr[tomap] = $db->fetch($res[tomap]);
	
	//

  $chk_logo = file_exists("../admin/file/logo/".$arr[project][agent].".jpg");
	

/*
	$res[place] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][pickup_place]."' ");
	$arr[place] = $db->fetch($res[place]);
	
	$res[to] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][to_place]."' ");
	$arr[to] = $db->fetch($res[to]);
*/	
	//////////
//for($i=1;$i<=6;$i++){


?>


<?
if($_GET[cartype]==2 and $arr[project][product_area]<> 'In' and $arr[project][product_area] == 'Out'  and $allcar > 1 ){

?>
 
 
 
 
 
 
 
  <form id="sort_place_form"  name="sort_place_form" action="" method="post" enctype="multipart/form-data"   >
 
 
 
<div style="background-color:#F6F6F6; margin-top:5px; margin-bottom:5px; padding: 2px 0px 2px 0px;border-radius: 10px;"   >
   <table width="100%"  border="0" cellspacing="0" cellpadding="0">
     <tr>
       <td valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
           <tr>
             <td width="14" valign="top"><img src="images/icon/view/map.png"   align="bottom"  width="35"  style="margin-top:-2px;"   /></td>
             <td width="14" valign="top">
			 
			 
			 
		
			 
			 
	
	
	
	<script>
	
	
  $("#place_number_list<? echo $arr[project][id];?>").on('change',function(){ 
  
  
  
  
 //// alert(document.getElementById('place_number_list<? echo $arr[project][id];?>').value);
  
  
  
  $('#place_number_<?=$arr[project][id]?>').html(document.getElementById('place_number_list<? echo $arr[project][id];?>').value);
  
///document.getElementById('place_number_<?=$arr[project][id]?>').value=document.getElementById('place_number_list<? echo $arr[project][id];?>').value;
 
 
 	 
 
  /*
  var url_car_number="go.php?name=checkcar/load&file=time_start&car="+document.getElementById('check_car_number').value;
 
 $("#load_time_start_car").load(url_car_number);
 
 
 */
 
  });
  
  
  
	
	
	
	</script>		 
			 
			
 
			
			 
			 
			 <select name="car_price_list[]" id="place_number_list<? echo $arr[project][id];?>"  style="width: 40px; height:32px; background-color: #FFFFFF; font-size:18px;" onchange="document.getElementById('car_price<? echo $arr[projectlist][id];?>').value = document.getElementById('car_price_list<? echo $arr[projectlist][id];?>').value;">
                 
			
  
  <?PHP
 for($n =1; $n <= $allcar; $n++) {
                        ?>
                 <option value="<?PHP echo $n?>" <?
 if($b== $n) {echo "selected=selected";}?> > <?PHP echo $n?> </option>
                 <?PHP
                      } ?>
             </select></td>
             <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
              <tr>
                 <td><span style="font-size:18px; "><? echo $arr[project][name_pickup_place] ?></span></td>
               </tr>
               <tr>
                 <td><font color="#666666" class="font_14">(<? echo $arr[project][name_pickup_place_area] ?> | <? echo $arr[project][name_pickup_place_province] ?>) </font></td>
               </tr>
             </table></td>
           </tr>
       </table></td>
     </tr>
   </table>
   
   
   
   
   
   
   </div>
   
   
<? } ?>


<? } ?>




<? } ?>

<?
if($_GET[cartype]==2 and $arr[project][product_area]<> 'In' and $arr[project][product_area] == 'Out'  and $allcar > 1 ){

?>
 

<table width="100%"  border="0" cellspacing="2" cellpadding="2"  >
  <tr>
    <td width="50%" style="padding:5 px;"><button id="submit_use_car" type="button" class="btn btn-block btn-primary" style="width:100% ">บันทึกข้อมูล</button></td>
    <td width="50%" style="padding:5px;"><button type="reset" class="btn btn-block btn-default"  style="width:100%; background-color:#FFFFFF " id="reset_use_car">รีเซ็ต</button>
	<input name="file_upload_submit"  id="file_upload_submit" type="submit" style="display:none">
 
	
	</td>
  </tr>
</table>
<!----- join---->

<? } ?>


   </form>
   
   </div>
   











    
    
<?

//// loop ข้อมูลหลัก
if($_GET[sv] == 'cn'){
	$link_vc = "http://www.t-bookingcn.com/";
}else{
	$link_vc = "http://www.t-booking.com/";
}

 

/// data db
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);

 
if($_GET[cartype]==2 ){ 
$res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where drivername='".$user_id."' and transfer_date='".$_GET[day]."' and carno = '".$_GET[carno]."'  and cartype= 2 and status='CONFIRM'  group  by invoice  order by airin_h ASC,airin_time ASC  limit 10 ");

 $allcar = $db->num_rows(TB_transfer_report_all,"id","drivername='".$user_id."' and transfer_date='".$_GET[day]."' and carno = '".$_GET[carno]."' and cartype= 2 group by invoice"); 

}
 
if($_GET[cartype]<>2 ){ 
 
$res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where drivername='".$user_id."' and transfer_date='".$_GET[day]."' and id = '".$_GET[id]."' and status='CONFIRM' group by invoice  order by airin_h ASC,airin_time ASC  limit 10 ");
$allcar="1";
//

}

///$res[project] = $db->select_query("SELECT * FROM ".TB_transfer_report_all."  where drivername='".$user_id."' order by airin_h ASC,airin_time ASC limit 1  ");
 
 
?>

    <div data-role="content"   role="main">
	
 
 <?
$i=1;
while($arr[project] = $db->fetch($res[project])){



	////// งานรวม
	
 
$db->connectdb(DB_NAME_DATA,DB_USERNAME,DB_PASSWORD);
 
$db->update_db(TB_transfer_report_all,array(
			"driver_topoint"=>"0",
			"driver_pickup"=>"0",
			"driver_checkcar"=>"0",
			"driver_complete"=>"0"
 
		)," id='".$arr[project][id]."' ");
 
 

 
 
$datetime = $arr[project][outdate]." ".$arr[project][airout_time].":00";
$exp = explode(" ",$datetime);
$t = explode(":",$exp[1]);
$d = explode("-",$exp[0]);

$time_booking = @mktime($t[0], $t[1], $t[2], $d[1], $d[2], $d[0]);	

/*
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[product] = $db->select_query("SELECT cartype,area,admin_company,topic_en,topic_th  FROM web_transferproduct WHERE id='".$arr[project][program]."' ");
	$arr[project] = $db->fetch($res[product]);
 */
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[showlogo] = $db->select_query("SELECT id,company,company_or FROM ".TB_admin." WHERE id='".$arr[project][agent]."' ");
	$arr[showlogo] = $db->fetch($res[showlogo]);
	
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[pickup] = $db->select_query("SELECT topic,amphur,province,phone FROM ".TB_transferplace." WHERE id='".$arr[project][pickup_place]."' ");
$arr[pickup] = $db->fetch($res[pickup]);
	
	$res[to] = $db->select_query("SELECT topic,amphur,province,phone FROM ".TB_transferplace." WHERE id='".$arr[project][to_place]."' ");
	$arr[to] = $db->fetch($res[to]);
	///
	 $res[pickupmap] = $db->select_query("SELECT map FROM ".TB_transferplace_new." WHERE id='".$arr[project][pickup_place]."' ");
$arr[pickupmap] = $db->fetch($res[pickupmap]);
	
	$res[tomap] = $db->select_query("SELECT map FROM ".TB_transferplace_new." WHERE id='".$arr[project][to_place]."' ");
	$arr[tomap] = $db->fetch($res[tomap]);
	
	//

  $chk_logo = file_exists("../admin/file/logo/".$arr[project][agent].".jpg");
	

/*
	$res[place] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][pickup_place]."' ");
	$arr[place] = $db->fetch($res[place]);
	
	$res[to] = $db->select_query("SELECT topic FROM ".TB_transferplace." WHERE id='".$arr[project][to_place]."' ");
	$arr[to] = $db->fetch($res[to]);
*/	
	//////////
//for($i=1;$i<=6;$i++){


?>
<?
 if($_GET[sv] == 'th'){
 /*
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

$res[remark] = $db->select_query("SELECT  id,remark,adult,child,baby,admin_company FROM  ".TB_order."  where invoice='".$arr[project][invoice]."'  ");
$arr[project] = $db->fetch($res[remark]);

//echo $arr[project][invoice];
  */
	}
	
	if($_GET[sv] == 'cn'){
	/*
$db->connectdb_cn(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

$res[remark] = $db->select_query("SELECT  id,remark,adult,child,baby,admin_company FROM  ".TB_order."  where invoice='".$arr[project][invoice]."'  ");
 $arr[project] = $db->fetch($res[remark]);
 */
  
	}
 ?>
 
 	
			<? 
			 
			if($arr[project][agent]=='13' and  $arr[project][cartype] <>'2'){
			$carpart="Ctrip";			
			}
				if($arr[project][agent]=='13' and  $arr[project][cartype] =='2'){
			$carpart="Join";			
			}
			
			if($arr[project][agent]<>'13' and  $arr[project][cartype] <>'2'){
			$carpart="Golden";			
			}
				if($arr[project][agent]<>'13' and  $arr[project][cartype] =='2'){
			$carpart="Join";			
			}
			
			if($arr[project][admin_company]<>'1' and  $arr[project][cartype] <>'2'){
			$carpart="Private";			
			}
  
			
			?>





 <div  class="box box-default" style="padding:5px; border-top:none"    >
 
                  <table width="100%" >
              
                        <tr>
                           <td  >
						   
						
						   
						   
						              <div  style="margin-left:0px;  margin-right: 0px; margin-top:0px;box-shadow: 0px -5px 5px #f6f6f6; padding:5px;"    > 

 
 
						   <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="60"  style="background-color:#F6F6F6 "><div   id="cir_<?=$i;?>">
      <table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td height="35"   class="boxnumber" style="font-size:18px; color:#FFFFFF; background-color: #006699 ; font-weight:bold ;border-radius: 0px;" id=>
	
	
	  <center>
	
 
	
	<span id="place_number_<?=$arr[project][id]?>"><?=$i;?></span> | <?=$allcar;?>
    </center></td>
  </tr>
</table>
</div> </td>
    
    <td width="100" height="30" valign="top" style="background-color:#F3F3F3; padding-top:5px; padding-left:10px;  "><? if($arr[project][cartype] == 2){  
	
	$work_type="จอย";
	
	?>
        <table width="100%"  border="0" cellspacing="0" cellpadding="0" >
          <tr>
            <td style="font-size:24px ; color:#009999; color:#444444"><i class="fa fa-users"></i></td>
            <td  style="font-size:16px ; font-weight:bold; margin-left:-10px;">จอย </td>
          </tr>
        </table>
        <? }else{ 
	  $work_type="ไพรเวท";
	  
	  ?>
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td style="font-size:24px ; color:#009999; color:#444444;"><i class="fa fa-user"></i></td>
            <td  style="font-size:14px ; font-weight:bold">ไพรเวท</td>
          </tr>
        </table>
        <? } ?></td>
    <td valign="middle" style="font-size:16px ; font-weight:bold; padding-top:5px;"><? if($arr[project][product_area] == 'In'){ 
						$work_area="รับเข้า";
						
						?>
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td style="font-size:24px ; color: #3399CC; color:#444444  " width="35">&nbsp;<i class="fa   fa-plane " style=" -webkit-transform:rotateX(180deg);
  -moz-transform:rotateX(180deg);
  -o-transform:rotateX(180deg);
  -ms-transform:rotateX(180deg); "></i></td>
            <td style="font-size:14px ; font-weight:bold">&nbsp;รับเข้า</td>
          </tr>
        </table>
        <?  } elseif($arr[project][product_area] == 'Out'){
						   $work_area="ส่งออก";
						    ?>
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td style="font-size:24px ;color: #3399CC; color:#444444  " width="35">&nbsp;<i class="fa   fa-plane "></i></td>
            <td style="font-size:14px ; font-weight:bold">&nbsp;ส่งออก</td>
          </tr>
        </table>
        <? }elseif($arr[project][product_area] == 'Point'){ 
	 
	  $work_area="พ้อยท์ทูพ้อยท์";
	 ?>
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td style="font-size:24px ; color: #3399CC; color:#444444  " width="35">&nbsp;<i class="fa   fa-share-alt"></i></td>
            <td style="font-size:14px ; font-weight:bold">&nbsp;พ้อยท์</td>
          </tr>
        </table>
        <? }else{ 
						   $work_area="เซอร์วิส";
						   
						   ?>
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td style="font-size:22px ; color: #3399CC; color:#444444 " width="35">&nbsp;<i class="fa  fa-taxi"></i></td>
            <td style="font-size:16px ; font-weight:bold">&nbsp;เซอร์วิส</td>
          </tr>
        </table>
        <? } ?>
    </td>
   
  </tr>
</table>



<div  style="margin-top:10px; font-size:22px; font-weight:bold; background-color:#F6F6F6; padding:5PX;border-radius: 10px; "><?=$carpart?>&nbsp;&nbsp;<?=$arr[project][carno];?>&nbsp;<span style="font-size:16px; margin-top: 30px; "> ( <?=$arr[project][transfer_date];?> )</span></div>
 <div style="margin-top:10px;padding:5px;    ">
 
  <?
$string_to     = array ("/" );
$string_after  = array (" - " );
$pro_name_th_cut = str_replace($string_to , $string_after ,$arr[project][product_name_th], $count);   
$pro_name_en_cut= str_replace($string_to , $string_after ,$arr[project][product_name], $count);   
  ?>
  
  
  <div class="show_product_detail_all" style="display:none ">
  
  <font class="font_16"><b>
  <?=$pro_name_en_cut?>&nbsp; &nbsp;<font color="#666666"> <?=$pro_name_th_cut?></font></b></div>
 
 
						   
						   <table width="100%"  border="0" cellspacing="0" cellpadding="0" >
                             <tr>
                               <td ><div style="background-color:#F6F6F6; margin-top:5px; margin-bottom:5px; padding: 2px 0px 2px 0px;border-radius: 10px;"   >
                                   <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                                     <tr>
                                       <td valign="top"><div class="topictransfer1" style=" margin-top: -2px; margin-left:" ><i class="fa  fa-map-marker" style="color:#c1c1c1"></i> <span class="font_16">สถานที่รับ</span></div></td>
                                       <td width="40"><? if( $arr[pickupmap][map] != '' ){   ?>
                                           <a class="test" data-toggle="tooltip" title="แสดงแผนที่นำทาง" href="<?=$arr[pickupmap][map];?>" target="_blank"><img src="images/icon/view/map.png"   align="bottom"  width="35"    /> </a>
                                           <? } ?>
                                           <? if( $arr[pickupmap][map] == '' ){   ?>
                                           <a data-toggle="tooltip" title="ไม่มีแผนที่นำทาง"><img src="images/icon/view/no/map.png"   align="bottom"  width="35"    /></a>
                                           <? } ?>
                                       </td>
                                       <td width="40" style="padding-right:10px; "><? if($arr[pickup][phone]<>""){ 

$string_to_replace     = array ("-" ,"," , " ");
$string_after_replace  = array ("" ,"&nbsp;&nbsp;&nbsp;" , "" ,);
$arr[pickup][phone]       = str_replace($string_to_replace , $string_after_replace , $arr[pickup][phone] , $count);   
}
?>
                                           <? if($arr[pickup][phone]<>""){  ?>
                                           <a  href="tel:<?=$arr[pickup][phone]?>"  target="_blank" class="test" data-toggle="tooltip" title="โทรออก"><img src="images/icon/view/phone.png" width="35"   align="bottom"  /></a>
                                           <? } ?>
                                           <? if($arr[pickup][phone]==""){  ?>
                                           <a data-toggle="tooltip" title="ไม่มีเบอร์ติดต่อ"><img src="images/icon/view/no/phone.png" width="35"   align="bottom"  /> </a>
                                           <? } ?>
                                       </td>
                                     </tr>
                                   </table>
                               </div></td>
                             </tr>
                             <tr>
                               <td>
 				   
							   
 <div  align="left" style="font-size:18px; "> <? echo $arr[project][name_pickup_place] ?><br>
<font color="#666666" class="font_14"> (<? echo $arr[project][name_pickup_place_area] ?> | <? echo $arr[project][name_pickup_place_province] ?>) </div></td>
                             </tr>
                             <tr>
                               <td id="show_guest_detail_<? echo $arr[project][id] ?>" class="show_guest_detail_all" style="display:none">
                               
                       
                       
                       
                       
                       
                       
                               
                               
                            <table width="100%"  border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td ><div class="topictransfer1" style="margin-top:5px; "><i class="fa  fa-clock-o" style="color:#c1c1c1"></i> รับแขก<span class="span-detail1" style="margin-left: 25px" ><b><span style="font-size:22px"><?echo $arr[project][airout_time];?></b></span></div></td>
  </tr>
  <tr style="display: none<? if($arr[project][product_area] == 'In' ){ echo "1"; } ?>">
    <td  ><div class="topictransfer1"><i class="fa  fa-plane" style="color:#c1c1c1"></i> เที่ยวบิน<span class="span-detail1" style="margin-left: 18px"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></span></div></td>
  </tr>
  <tr>
    <td ><div class="topictransfer1"><i class="fa  fa-recycle" style="color:#c1c1c1"></i> เอเย่นต์<span class="span-detail1" style="margin-left: 20px"><?echo $arr[showlogo][company];?>
      <? if($arr[showlogo][company_or]<>""){ ?>
      &nbsp;<? echo $arr[showlogo][company_or];?>
      <? } ?>
    </span></div></td>
  </tr>
  <tr>
    <td  ><div class="topictransfer1"><i class="fa  fa-users" style="color:#c1c1c1; font-size:14px;"></i> จำนวน<span class="span-detail1" style="margin-left: 22px">
      <?
 
	
	 if($arr[project][adult]>0){ ?>
      ผู้ใหญ่ :
      <?=$arr[project][adult];?>
      <? } ?>
      <? if($arr[project][child]>0){ ?>
      เด็ก :
      <?=$arr[project][child];?>
      <? } ?>
      <? if($arr[project][baby]>0){ ?>
      ทารก :
      <?=$arr[project][baby];?>
      <? } ?>
    </span></div></td>
  </tr>
  <tr>
    <td  ><div class="topictransfer1"><i class="fa  fa-user" style="color:#c1c1c1"></i> ชื่อแขก<span class="span-detail1" style="margin-left: 24px"><? echo $arr[project][guest_name];?></span></div></td>
  </tr>
  <tr style="display:none<? echo $arr[project][guest_phone];?>">
    <td  ><div class="topictransfer1"><i class="fa  fa-phone" style="color:#c1c1c1"></i> โทรศัพท์<span class="span-detail1" style="margin-left: 12px"><? echo $arr[project][guest_phone];?></span></div></td>
  </tr>
  <tr>
    <td  ><div class="topictransfer1"><i class="fa  fa-building" style="color:#c1c1c1"></i> วอเชอร์<a href="<?=$link_vc;?>/print.php?name=admin/voucher&amp;file=transfer&amp;no=<? echo $arr[project][vc_id];?>&amp;order=<? echo $arr[project][orderid];?>&amp;code=<? echo $arr[project][vc_code];?>" target="_blank"><span class="span-detail1" style="margin-left: 18px"> <font color="#00808B" style="font-size:18px; font-weight:bold ">
      <?=$arr[project][invoice];?>
    </font></span></a></div></td>
  </tr>
</table>   
                               
                               
                               
                               </td>
                             </tr>
                             <tr>
                               <td></td>
                             </tr>
                             <tr>
                               <td ><div style="background-color:#F6F6F6; margin-top:5px; margin-bottom:5px; padding: 2px 0px 2px 0px;border-radius: 10px;"   >
                                   <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                                     <tr>
                                       <td valign="top"><div class="topictransfer1" style=" margin-top:-2px;" ><i class="fa  fa-map-marker" style="color:#c1c1c1"></i> <span class="font_16">สถานที่ส่ง</span></div></td>
                                       <td width="40" ><div >
                                           <? if( $arr[tomap][map] != '' ){   ?>
                                           <a class="test" data-toggle="tooltip" title="แสดงแผนที่นำทาง"  href="<?=$arr[tomap][map];?>" target="_blank" ><img src="images/icon/view/map.png"   align="bottom"  width="35"    /> </a>
                                           <? } ?>
                                           <? if( $arr[tomap][map] == '' ){   ?>
                                           <a data-toggle="tooltip" title="ไม่มีแผนที่นำทาง"><img src="images/icon/view/no/map.png"   align="bottom"  width="35"    /></a>
                                           <? } ?>
                                       </div></td>
                                       <td width="40" style="padding-right:10px; "><div  >
                                           <?
 $res[to] = $db->select_query("SELECT id,phone FROM ".TB_transferplace." where id=".$arr[project][to_place]."  ");
 $arr[to] = $db->fetch($res[to]);
		   
	  ?>
                                           <? if($arr[to][phone]<>""){ 

$string_to_replace     = array ("-" ,"," , " ");
$string_after_replace  = array ("" ,"" , "" ,);
$arr[to][phone]      = str_replace($string_to_replace , $string_after_replace , $arr[to][phone] , $count);   

}
?>
                                           <? if($arr[to][phone]<>""){  ?>
                                           <a href="tel:<?=$arr[to][phone]?>"  target="_blank" class="test"  data-toggle="tooltip" title="โทรออก"  ><img src="images/icon/view/phone.png" width="35"   align="bottom" id="no_phone_toplace" /></a>
                                           <? } ?>
                                           <? if($arr[to][phone]==""){  ?>
                                           <a data-toggle="tooltip" title="ไม่มีเบอร์ติดต่อ" ><img src="images/icon/view/no/phone.png" width="35"   align="bottom"  /> </a>
                                           <? } ?>
                                       </div></td>
                                     </tr>
                                   </table>
                               </div></td>
                             </tr>
                             <tr>
                               <td ><div  align="left"  style="font-size:18px; "> <? echo $arr[project][name_to_place] ?>
							   
							   
						<? if($arr[project][name_to_place]=='Phuket Airport'){   ?>
 
<font color="#FF0000" style="font-size:14px">&nbsp;อาคารผู้โดยสารใหม่

<?
	   
 
 }
 
	  ?>	   
	</font>						   
							   
							   <br>
<font color="#666666" class="font_14"> (<? echo $arr[project][name_to_place_area] ?> | <? echo $arr[project][name_to_place_province] ?>) 









</div></td>
                             </tr>
                             <tr style="display: none<? if($arr[project][product_area] == 'Out'){ echo "1"; } ?>">
           <td  ><div class="topictransfer1"><i class="fa  fa-plane" style="color:#c1c1c1"></i> เที่ยวบิน <span class="span-detail1" style="margin-left: 18px; text-transform:uppercase"><?echo $arr[project][air];?> / <?echo $arr[project][airin_time];?></span></div></td>
                             </tr>
                             <tr style="display:none<? echo $arr[project][remark];?>">
                               <td ><div class="topictransfer1"><i class="fa  fa-pencil" style="color:#c1c1c1"></i> หมายเหตุ</div></td>
                             </tr>
                             <tr style="display:none<?echo $arr[project][remark];?>">
                               <td ><div  align="left"  ><? echo $arr[project][remark];?>
                                       <?   include ("mod/view/deposite.php");?>
                               </div></td>
                             </tr>
                             <tr style="display:none<? if($deposit>0){ echo "1"; }?>">
                               <td ><div class="topictransfer1"><i class="fa  fa-plus-circle" style="color:#c1c1c1"></i> ฝากเก็บเงิน <span class="span-detail1" style="font-size:20px; color:#FF0000 "><b>
                                   <? echo number_format( $deposit , 2 );?>
&nbsp;บาท</b></span></div></td>
                             </tr>
                           </table>
						   </div>   
						   </td>
						</tr>
						<tr>
                           <td  >
 
 

 <?  include ("mod/load/show/phone.php");?>
<?  include ("mod/load/show/check_step.php");?>

  <?  include ("mod/load/show/popup_guest.php");?>
 
  
  
 
 
  <?   /// include ("mod/load/show/popup.php");?>
 

 
<?php
 // @mkdir("pic/guest_no/".$arr[project][invoice]."", 0777);
?>
<?
$i++;	
}
?>

 <div id="send_data_checkin"></div>
 <div id="load_googlemap"  style="display:none "></div>     
 
            </ul>
 
 

 <?     include ("load/popup_check_in.php");?>
 
 
 
  <?   ///  include ("mod/load/show/action.php");?>


<iframe id="uploadtarget" name="uploadtarget" src="" style="width:1px;height:1px;border:0"></iframe>
<iframe id="uploadframe" name="uploadframe" src="" style="width:1px;height:1px;border:0"></iframe>
 
 

 
					
 
					<br>
<br>
<br>
<br>
<br>
 

 
 
