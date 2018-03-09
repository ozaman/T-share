<div  style="padding-top:30px;" > 
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
 
 
 <script>
 $('.text-topic-action-mod').html('รถทั้งหมด');
 
 </script>
  
  <style>
 
 .div-all-work{
	 padding:5px;   border-radius: 6px; border: 1px solid #ddd;   background:<? echo $bgcolor; ?>; margin-bottom:20px; box-shadow: 0px  0px 0px #DADADA  ;
	 
 }
 
 
 </style>

 <div align="center" style="margin: 15px;border: 1px solid #ddd;font-size: 25px;padding: 5px;margin-top: 20px;border-radius:20px;box-shadow: 1px 1px 2px #ddd;color: #3b5998;" id="add_car" >
 	<strong>เพิ่มรถ <i class="fa fa-plus-circle" aria-hidden="true"></i></strong>
 </div>
 <script>
 	$('#add_car').click(function(){
 		$( "#load_mod_popup_1" ).show();
 
		  var url_load = "load_page_mod_1.php?name=car&file=new_car&openby=all";
		 console.log('add_car');
		 $('#load_mod_popup_1').html(load_main_mod);
		  $('#load_mod_popup_1').load(url_load); 
 	});
 </script>
 <div style="margin-top: 20px;">
<?
 
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM   web_carall  where drivername='".$user_id."'  order by id asc  ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
	while($arr[project] = $db->fetch($res[project])){  
	
 
 
 $arr[type] = $db->fetch($res[type]);
 
 		$bgcolor = ($i++ & 1) ? '#FFFFFF' : '#FFFFFF'; 
 
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	
	$res[car_type] = $db->select_query("SELECT * FROM ".TB_carall_type." WHERE id='".$arr[project][car_type]."' ");
	$arr[car_type] = $db->fetch($res[car_type]);
 
  
	 ?>
     
 
     
         <div class="col-md-6" style="padding-left: 10px;padding-right: 10px;padding-bottom: 30px;"  > 
     
 
     
<div style="margin-left:-5px; margin-top:-20px;" class="cirnumbershow<? 	if($arr[project][driver_complete]=="1"){ ?>ok<? } ?>" id="cir_<?=$arr[project][id];?>"  >
<table width="100%"  border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td style="font-size:30px; color:#FFFFFF; font-weight:bold "><center><?=$i;?></center><? //=$arr[project][server];?></td>
  </tr>
</table>
</div> 
 


   <div style="padding:5px;   border-radius: 6px; border: 1px solid #ddd;box-shadow:1px 1px 3px #ddd  ; background:<? echo $bgcolor; ?>   " >
     <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
     
    <td valign="middle" class="font-16"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td width="50%" height="50%" align="center" class="tool-td-chat"><center>
   
              <button type="button" class="btn btn-default "   id="edit_car_<?=$arr[project][id];?>" onclick="editCar('<?=$arr[project][id];?>');"  style="width:100%">
                <center>
                  <div   class="font-30"><i class="fa fa-edit" style="color:<?=$main_color?>"  ></i></div>
                  <span style="padding-bottom:20px;" class="font-22"> แก้ไขข้อมูลรถ </span>
                </center>
                </button>
          </td>
        </tr>
        <tr>
          <td width="50%" height="50%" align="center" class="tool-td-chat"> 
             <? if($arr[project][status_usecar]==1){ 
						$type = "close";
						$text_type = "เลิกใช้ประจำ";
						$icon = "fa fa-times-circle";
						$color_often = "color: #FF0000";
				}else if($arr[project][status_usecar]==0){
					$type = "open";
					$text_type = "ใช้ประจำ";
					$icon = "fa fa-check-circle";
					$color_often = "color: #0072BC";
				}
             ?>
            <button type="button" class="btn btn-default "  id="use_car_<?=$arr[project][id];?>" onclick="use_often('<?=$arr[project][id];?>','<?=$type;?>','<?=$user_id;?>');"  style="width:100%">
              <center>
                <div  class="font-30"><i class="<?=$icon;?>" style="<?=$color_often;?>"></i></div>
                <span style="padding-bottom:20px;" class="font-22"><?=$text_type;?> </span>
              </center>
              </button>
     </td>
          
          
          
          
          
          
          
          
          
          
          
          
        </tr>
        
        
        
        
        
         <tr>
          <td width="50%" height="50%" align="center" class="tool-td-chat"> 
          
          <? if($arr[project][status]==1){ ?>
 
            <button type="button" class="btn btn-default "  id="cancel_car_<?=$arr[project][id];?>"   style="width:100%">
              <center>
                <div  class="font-30"><i class="fa fa-trash "   style="color:#FF0000" ></i></div>
              <span style="padding-bottom:20px;" class="font-22">  เลิกใช้งาน </span>
              </center>
              </button>
              
      <? } ?>
              
                <? if($arr[project][status]==0){ ?>
 
            <button type="button" class="btn btn-default "    id="active_car_<?=$arr[project][id];?>"   style="width:100%">
              <center>
                <div  class="font-30"><i class="fa fa-taxi "   style="color:<?=$main_color?>" ></i></div>
              <span style="padding-bottom:20px;" class="font-22">  เปิดใช้งาน </span>
              </center>
              </button>
              
      <? } ?>
              
              
              
 </td>
          
 
          
        </tr>
        
  
        
      </tbody>
    </table>
    
 
    
    </td>
    <td width="60%" valign="top" style="padding-left:5px">
  
    
    
    
    
	  <style>
		
	.drivertable{        
        border-radius:5px; margin-top:10px; margin-bottom:10px;

   border:0px solid #999999; background-color:#FFFFFF; 
   box-shadow: 0px 1px 5px #DADADA;  }
	.tdtable  td {height:26px;}
	
	  </style>
	  <br><? if($arr[project][plate_color]=="Green"){
	 
	 $plate_color="009999"; } ?>
       <? if($arr[project][plate_color]=="Yellow"){
	 
	 $plate_color="FFCC00"; } ?>
       <? if($arr[project][plate_color]=="Black"){
	 
	 $plate_color="FFFFFF"; } ?>
       <? if($arr[project][plate_color]=="Red"){
	 
	 $plate_color="FF0000"; } ?><table width="100%" cellpadding="1" cellspacing="2"  style="margin-top:-10px;  margin-right: 0px; margin-bottom:0px; margin-right:0px; " >
       <?

if($_GET[company_tran] == ''){
	$_GET[company_tran] = 283;
}

if($_GET[company_tran] != ''){
	
	$company_tran = " and company = '".$_GET[company_tran]."' ";

}

if($_GET[status] != ''){
	
	$status = " and status = '".$_GET[status]."' ";

}



 
	
 




	//Comment Icon
 

?>
       <? if($arr[project][plate_color]=="Green"){
	 
	 $plate_color="009999"; } ?>
       <? if($arr[project][plate_color]=="Yellow"){
	 
	 $plate_color="FFCC00"; } ?>
       <? if($arr[project][plate_color]=="Black"){
	 
	 $plate_color="FFFFFF"; } ?>
       <? if($arr[project][plate_color]=="Red"){
	 
	 $plate_color="FF0000"; } ?>
  <td width="80" height="70" align="center" bgcolor="#<?=$plate_color?>" style="border: solid 2px; height:70px; color:#DADADA; padding:10px; padding-right:10px;border-radius:10px;"><font color="#<? if($arr[project][plate_color]=="Green"){
	 
	 echo "FFFFFF"; } ?>"  class="font-32"><b><? echo $arr[project][plate_num];?> <br> 
              <font   class="font-22"><? echo $arr[project][province];?></font></b></font></td>
  </tr>
 
     </table>
	  <table width="100%"  border="0" cellspacing="2" cellpadding="2"    >
      <tr>
        <td width="50" class="font-22"><strong>ประเภท</strong></td>
        <td  class="font-22"><? echo "" . $arr[car_type][topic_th] . " "; ?></td>
      </tr>
      <tr>
        <td class="font-22"><strong>ยี่ห้อ</strong></td>
        <td class="font-22"><?echo $arr[project][car_brand];?></td>
      </tr>
      <tr>
        <td class="font-22"><strong>รุ่น</strong></td>
        <td class="font-22"><?echo $arr[project][car_sub_brand];?></td>
      </tr>
      
            <tr>
        <td class="font-22"><strong>สีรถ</strong></td>
        <td class="font-22"><? //echo $arr[project][car_color];?>
        
        ขาว
        
        </td>
      </tr>
      
      
                  <tr>
        <td class="font-24"><strong>สถานะ</strong></td>
        <td class="font-24">
		<? if($arr[project][status_usecar]==1){
			$use_often = "(ใช้ประจำ)";
		} ?>
		<? if($arr[project][status]==0){ ?>
        
       <font color="#FF0000"><strong> เลิกใช้งาน</strong></font>
        
        
        <? } ?>
        
        
        
        		<? if($arr[project][status]==1){ ?>
        
       <font color="<?=$main_color?>"><strong>ใช้งาน</strong></font>
        
        
        <? } ?>
        <span style="font-size: 12px;"><b><?=$use_often;?></b></span>
 
        
        </td>
      </tr>
      
      
      
      
    </table></td>
  </tr>
</table>
    <table width="100%" border="0" cellspacing="1" cellpadding="5" style="margin-top:-15px;">
  <tbody>
    <tr style="display:nones">
      <td width="33%"><img src="../data/pic/car/<?=$arr[project][id];?>_1.jpg?v=<?=$arr[project][update_date];?>"  width="100%"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
      <td width="33%"><img src="../data/pic/car/<?=$arr[project][id];?>_2.jpg?v=<?=$arr[project][update_date];?>"  width="100%"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
      <td width="33%"><img src="../data/pic/car/<?=$arr[project][id];?>_3.jpg?v=<?=$arr[project][update_date];?>"  width="100%"   border="0"      style="margin-top:15px;border-radius:5px;" /></td>
    </tr>
  </tbody>
</table>
       

	 </div>

     
  <script>
		 
 	 
  $("#cancel_car_<?=$arr[project][id];?>").click(function(){ 
  
 
  ///
 
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการเลิกใช้งาน",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#FF0000',
		
	///	confirmButtonClass: "btn-danger",
		confirmButtonText: 'ใช่',
		cancelButtonText: "ไม่ใช่",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
 
	
//swal("ยืนยัน", "success");

////
	  var url_<?=$arr[project][id]?> = "popup.php?name=car&file=savedata&action=confirm&type=driver&id=<?=$arr[project][id]?>&close=2";
	 
	 $('#show_car_detail').load(url_<?=$arr[project][id]?>); 
 
 
    } else {
      swal("Cancelled", "", "error");
    }
	});
	   
   
  /////
 
		 });
   
 
		 </script>      
  
  <script>
		 
 	 
  $("#active_car_<?=$arr[project][id];?>").click(function(){ 
  
 
  ///
 
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการเปิดใช้งาน",
		type: "success",
		showCancelButton: true,
		confirmButtonColor: '<?=$main_color?>',
		
	///	confirmButtonClass: "btn-danger",
		confirmButtonText: 'ใช่',
		cancelButtonText: "ไม่ใช่",
		closeOnConfirm: true,
		closeOnCancel: true,
		html: true
	},
	function(isConfirm){
    if (isConfirm){
	 
 
	
//swal("ยืนยัน", "success");

////
  var url_<?=$arr[project][id]?> = "popup.php?name=car&file=savedata&action=confirm&type=driver&id=<?=$arr[project][id]?>&open=2";
 
 $('#show_car_detail').load(url_<?=$arr[project][id]?>); 
 
 
    } else {
      swal("Cancelled", "", "error");
    }
	});
	   
   
  /////
 
		 });

		 </script>    
         
         
         
 </div>    
     
     
         
     
	  
 <? } ?>  
</div>
<script>
	function use_often(id,type,driver){
		if(type=="open"){
			var text_use = "<font style='font-size:22px'>ว่าต้องการใช้ประจำ";
			var type_alert = "success";
		}else if(type=="close"){
			var text_use = "<font style='font-size:22px'>ว่าต้องการเลิกใช้ประจำ";
			var type_alert = "warning";
		}
		 swal({
				title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
				text: text_use,
				type: type_alert,
				showCancelButton: true,
				confirmButtonColor: '<?=$main_color?>',
				
			///	confirmButtonClass: "btn-danger",
				confirmButtonText: 'ใช่',
				cancelButtonText: "ไม่ใช่",
				closeOnConfirm: true,
				closeOnCancel: true,
				html: true
			},
			function(isConfirm){
		    if (isConfirm){

		  var url = "popup.php?name=car&file=savedata&use_often="+type+"&id="+id+'&driver='+driver;
//		 alert(url);
//		 $('#show_car_detail').load(url_<?=$arr[project][id]?>); 
		$.post(url, function(data) {
//alert(data);
				$("#show_car_detail").html(data);
				 window.location.href = "index.php?name=car&file=all";
		});
		 
		    } else {
		      swal("Cancelled", "", "error");
		    }
			});
	}
</script>
<div id="show_from_edit">
	
</div>
 
 <script>
 	function editCar(id){
//		$('.back-full-popup').hide();
//		alert(id);
  		var url = "popup.php?name=car&file=edit_car&id="+id;
//  		$('.button-close-popup-mod').hide();
  	/*	$("#modal_imgBody").html('<div align="center"><img src="loader.gif"/></div>');
		$('#pd_id_md').val(id); */
		/*$.post(url, function(data) {

				$("#show_from_edit").html(data);
		});*/
		  $('#show_from_edit').load(url); 
	}
	function autoclickAllcar(){
		 
//$( "#load_mod_popup" ).toggle();
 
  var url_load = "load_page_mod.php?name=car&file=all";
 
 $('#load_mod_popup').html(load_main_mod);
  $('#load_mod_popup').load(url_load); 
 
	}
 </script>
 
 
  	</div>
    <div id="show_car_detail"></div>