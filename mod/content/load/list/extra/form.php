 
<div style="background-color:#FFF; padding:10px;">
<div id="send_main_price_extra"  style="background-color:#FFFFFF"></div>


 <?
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
 
 $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE id='".$_GET[plan_setting]."' ");
 $arr[open] = $db->fetch($res[open]);
 
$res[mainplan] = $db->select_query("SELECT * FROM plan_product_price_name WHERE id='".$arr[open][plan_id]."' ");
$arr[mainplan] = $db->fetch($res[mainplan]);

//echo $arr[open][open_counter]; 
 
 ?>



 <?
 
 
 
 $taxt_w=100;
 if($_GET[op] == "edit"){
	//////////////////////////////////////////// ó Form
 
 
		//֧
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[price] = $db->select_query("SELECT * FROM plan_product_price_extra  WHERE id='".$_GET[id]."' ");
		$arr[price] = $db->fetch($res[price]);
		
		 $action='edit';
		 
		 
		 $_GET[type]=$arr[price][plan_type];
		 
		 
		 
		 
		
?>
 
 
   
       <script>
	   
 $("#btn_menu_new_extra").click(function(){
	   
 
	//    $('#btn_menu_edit_extra_<? echo $arr[project][id];?>').html('<center><img src="images/loader.gif" >');
 
 var url_load_price= "popup.php?name=content/load/list/extra&file=form&plan_name=<?=$arr[plan_name][id];?>&plan_setting=<?=$_GET[plan_setting]?>&shop_id=<?=$arr[shop][id]?>&type=all&id=<? echo $arr[project][id];?>&control=<?=$_GET[control]?>";

$('#from_main_price_extra').load(url_load_price); 


 });
 
  $("#main_from_extra").addClass('tab_alert');
 
 
 
 
 
 
 
	   
	   </script>
  
 
  <div  class="font-30"><font color="#FF0000"><i class="fa  fa-edit" style="width:30px; font-size:28px; color:#FF0000"  ></i>แก้ไข<? if($_GET[control]=='user'){?>รายจ่าย<? } ?><? if($_GET[control]=='company'){?>รายรับ<? } ?>พิเศษ&nbsp;&nbsp;<a id="btn_menu_new_extra"><font color="#333333"><i class="fa  fa-plus-circle" style="width:30px; font-size:28px; color:#666666"  ></i>เพิ่ม<? if($_GET[control]=='user'){?>รายจ่าย<? } ?><? if($_GET[control]=='company'){?>รายรับ<? } ?>ใหม่<a></div>
 <? 
	  }  else  {	
 
  $action='add';
	  
	  ?>
     
  <div  class="font-30"><font color="#333333"><i class="fa  fa-plus-circle" style="width:30px; font-size:28px; color:#666666"  ></i>เพิ่ม<? if($_GET[control]=='user'){?>รายจ่าย<? } ?><? if($_GET[control]=='company'){?>รายรับ<? } ?>ใหม่</div>
     
     <? } ?>
 
 
<table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-left:-10px;" id="main_from_extra"   >
  <tbody>
    <tr>
      <td width="200" class="font-22">   <b>  <?
 if($_GET[type]=='extra' ){
	 
	 
	 
 echo $plan_type='<img src="images/flag/China.png"   alt="" style="margin-top:-5px;"/>&nbsp;&nbsp;สัญชาติ';
 
 
 	   
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
 $res[shop] = $db->select_query("SELECT * FROM  product_price_list_all where plan_setting=".$_GET[plan_setting]."   and country=45 order by sort_country desc ");
                      
 $arr[shop] = $db->fetch($res[shop]);
	   
 
	 
 }
 
   if($_GET[type]=='all'){
	 
	 echo  $plan_type='<img src="images/flag/Other.png" width="30" height="30" alt="" style="margin-top:-5px;"/>&nbsp;&nbsp;ทั้งหมด';
	 	   
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
 $res[shop] = $db->select_query("SELECT * FROM  product_price_list_all where plan_setting=".$_GET[plan_setting]."   and country=240 order by sort_country desc ");
                      
 $arr[shop] = $db->fetch($res[shop]);
	   
	 
 }
 
	 ?></td>
      <td width="104" align="center">
        
        
  <?  ///echo $arr[mainplan][topic_th];?>
        
        <strong>ค่าตอบแทน</strong>        <select  class="form-control" name="price_plan_extra" id="price_plan_extra" style="width:150px;; font-size:20px; padding:5px; height:40px" >
        
        
        <? if($_GET[control]=='company'){ ?>
        
     <option value="park" <?  if($arr[price][type]== 'park'){ echo "selected=selected";} ?>>ค่าจอด</option>
      <option value="person" <?  if($arr[price][type]== 'person'){ echo "selected=selected";} ?>>ค่าหัว</option>
 
  <option value="commision" <?  if($arr[price][type]== 'commision'){ echo "selected=selected";} ?>>ค่าคอมมิชชั่น</option>
 
          
      <? } else { ?>  
      
      
      
        
          <? if($arr[mainplan][price_park]==1){ ?>
          <option value="park" <?  if($arr[price][type]== 'park'){ echo "selected=selected";} ?>>ค่าจอด</option>
          <? } ?>
          <? if($arr[mainplan][price_person]==1){ ?>
          <option value="person" <?  if($arr[price][type]== 'person'){ echo "selected=selected";} ?>>ค่าหัว</option>
          <? } ?>
          <? if($arr[mainplan][price_commision]==1){ ?>
          <option value="commision" <?  if($arr[price][type]== 'commision'){ echo "selected=selected";} ?>>ค่าคอมมิชชั่น</option>
          <? } ?>
          
          <? } ?>
          
        </select>
        
        
    <script>
	
	

      $("#price_plan_extra").change(function(){ 
	  
 
	   
  if(document.getElementById('price_plan_extra').value=="commision") {
	  
$("#td_extra_percent").show();
 
} else {
	
$("#td_extra_percent").hide();
	
}

	 
 	 });
  
        
       	</script>   
        
        
        
        
        
        
        
        
        
        <? ///echo $arr[open][open_counter]; ?>
        
      </td>
      <td width="104" align="center"><?  ///echo $arr[mainplan][topic_th];?>
        <strong>ผู้ใช้งาน</strong>
     
     
             
 <? if($_GET[control]=='user'){ 
		
 
   ?>
        
     
        <select  class="form-control" name="price_plan_pay" id="price_plan_pay" style="width:150px;; font-size:20px; padding:5px; height:40px" >
          
 <? if($arr[open][open_driver]==1){ ?>
          <option value="driver" <?  if($arr[price][pay_type]== 'driver'){ echo "selected=selected";} ?>>คนขับ</option>
          
          <? } ?>
 <? if($arr[open][open_counter]==1){ ?>
          <option value="counter" <?  if($arr[price][pay_type]== 'counter'){ echo "selected=selected";} ?>>เคาน์เตอร์</option>
          <? } ?>
          
 <? if($arr[open][open_all]==1){ ?>
          <option value="all" <?  if($arr[price][pay_type]== 'all'){ echo "selected=selected";} ?>>สมาชิก</option>
          <? } ?>
          </select>
          
        
        <? } ?>  
          
          
          
 <? if($_GET[control]=='company'){ 
 ?>
        
    
        <select  class="form-control" name="price_plan_pay" id="price_plan_pay" style="width:150px;; font-size:20px; padding:5px; height:40px" >
 
          <option value="company" >บริษัท</option>
          
  
                </select>
        <? } ?>  
          
          
          
          
          
</td>
      <td width="80"><strong>จำนวนคน</strong></td>
      <td width="100" align="center"><strong>จาก</strong>
      
      
                   
  <script>
  /*
  
 $("#from_extra").change(function(){ 
	  
  var url_page_type= "go.php?name=content/load/list/extra&file=number&action=to";
   
  url_page_type =url_page_type+"&from="+document.getElementById('from_extra').value;
   
 
  $('#load_select_to_extra').load(url_page_type);
  
 
	  });
	  
	  
 //// 
 
 
  $("#to_extra").change(function(){ 
	  
  var url_page_type= "go.php?name=content/load/list/extra&file=number&action=from";
   
  url_page_type =url_page_type+"&to="+document.getElementById('to_extra').value;
 
  $('#load_select_from_extra').load(url_page_type);
  
 
	  });
	  
	  */
	  
  
  </script>
      
      
      
      
      
      
      
      
      
      
      
      
       <div id="load_select_from_extra"><span class="check_load_park_drivers">
         <input name="from_extra" type="number" class="load_park_driver form-control" id="from_extra" style="width:<?=$taxt_w?>px; background:#FFFFFF" value="<? echo $arr[price][from_number];?>" />
       </span></div>  
          
          
          
          </td>
      <td width="20" align="center">&nbsp;</td>
      <td width="100" align="center"><strong>ถึง</strong>
      
      <div id="load_select_to_extras">
      
<input name="to_extra" type="number" class="load_park_driver form-control" id="to_extra" style="width:<?=$taxt_w?>px; background:#FFFFFF" value="<? echo $arr[price][to_number];?>" />
        
   </div> 
        
        
        </td>
      <td width="49">
        
        
        
        
        <? if($_GET[control]=='company' or  $_GET[control]=='user'){ 

   ?>
        
        
        
        
        
        <table width="50" border="0" cellpadding="3" cellspacing="3" >
          <tbody>
            <tr>
              
              <td width="65" align="center" valign="top" class="check_load_park_drivers"><strong>
              
              
 <? if($_GET[control]=='user'){?>รายจ่าย<? } ?><? if($_GET[control]=='company'){?>รายรับ<? } ?>
             
              
              
              
              
 </strong>
                <input name="extra_price" type="number" class="load_park_driver form-control" id="extra_price" style="width:<?=$taxt_w?>px; background:#FFFFFF" value="<? echo $arr[price][price_main];?>" />
     
     
 
                
 <div></div></td>
              
              </tr>
            </tbody>
        </table>
 
        
        </td>
      <td width="20" class="font-28" id="td_extra_percent" style="display:none"><b>%</b></td>
      <td width="120"><button type="button" class="btn btn-success btn-lg"   id="submit_data_update_extra"  style=" width:150px; margin-top:10px;"> <span id="txt_btn_save">อัพเดท <? if($_GET[control]=='user'){?>รายจ่าย
   
<? } ?>


  <? if($_GET[control]=='company'){?>รายรับ
   
<? } ?>
             </span> </button></td>
      <td> <button type="reset" class="btn btn-default btn-lg"   id="submit_data_set"   style=" width:150px; margin-top:10px;"> <span id="txt_btn_save2"> รีเซ็ต</span></button></td>
    </tr>
  </tbody>
</table>

 

 
 <? } ?>
 
 
 
 
    <? if($_GET[control]=='users'){ 
	
 
 
	
	
	
	?>
      
      
      
      
       
      <table width="50" border="0" cellpadding="3" cellspacing="3" >
        <tbody>
          <tr>
             
            <td width="65" align="center" valign="top" class="check_load_park_driver"><strong>  </strong>
               
              <div></div></td>
          </tr>
        </tbody>
  </table></td>
  <td><button type="button" class="btn btn-success btn-lg"   id="submit_data_update_extra"  style=" width:150px; margin-top:10px;"> <span id="txt_btn_save">อัพเดทราคา</span> </button></td>
    </tr>
  </tbody>
</table>



 
 <? } ?>
 
 
 
 
 
 
 
 
 
<input   type="hidden"   id="type_extra" name="type_extra" style="width:<?=$taxt_w?>px; background:#FFFFFF" value="<? echo $_GET[type];?>" />

  <script>
  $("#submit_data_update_extra").click(function(){
	  
 
   
  if(document.getElementById('from_extra').value=="") {
alert('กรุณาเลือกจำนวนคนเริ่มต้น'); 
document.getElementById('from_extra').focus() ; 
return false ;
}

 
	  
if(document.getElementById('to_extra').value=="") {
alert('กรุณาเลือกจำนวนคนสิ้นสุด'); 
document.getElementById('to_extra').focus() ; 
return false ;
}

	 
	 
	/* 
	  
 
 if(document.getElementById('from_extra').value > document.getElementById('to_extra').value) {
alert('กรุณาเลือกจำนวนคนเริ่มต้นต้องไม่มากกว่าจำนวนคนสิ้นสุด'); 
document.getElementById('from_extra').focus() ; 
return false ;
}
 */
 
 
 /*
if(document.getElementById('extra_price_company').value=="") {
alert('กรุณากรอกราคาบริษัท'); 
document.getElementById('extra_price_company').focus() ; 
return false ;
}
*/


 
 
 
if(document.getElementById('extra_price').value=="") {
alert('กรุณากรอกราคา'); 
document.getElementById('extra_price').focus() ; 
return false ;
}
 
 
 



 
	  /// 
	  
 
 		 
  $.post('go.php?name=content/load/list/extra&file=list_extra_price&op=extra_<?=$action?>_action&id=<?=$_GET[plan_setting];?>&plan=<?=$_GET[id];?>&control=<?=$_GET[control];?>',$('#myform').serialize(),function(response){
  $('#send_main_price_extra').html(response);  });
  
  

   
$("#tab_btn_load_price_all").click();

 

  
    if(document.getElementById('type_extra').value=="extra") {
 $('#btn_load_extra').click();
}
 else {
	 
	  $('#btn_load_all').click();
	 
 }



  
    setTimeout(function () {
 


 
 
 ///
 
 
 

 
}, 1000); //w
 
 
  
			   });
			    </script></div>
                
                
                
                
                
                
             
  <script>
  
      $("#price_plan_extra").change(function(){ 
	  
 
  
 // alert(0);
  
 
  
 //  var url_page_type= "go.php?name=content/load/list/extra&file=form_check_price&plan_setting=<?=$_GET[plan_setting];?>&plan=<?=$_GET[id];?>&control=<?=$_GET[control];?>";
   
//    url_page_type =url_page_type+"&control="+document.getElementById('check_user_price_control').value;
   
 
///  $('#load_form_check_price').load(url_page_type);
  
 
  
	  });
	  
	  
  
  </script>
    
                
                
                <div id="load_form_check_price" style="display:none"></div>
                
                
                