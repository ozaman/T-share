 
 <br>
 
 
 
 <TABLE cellSpacing=0 cellPadding=0 width=100% border=0>
 <TBODY>
        <TR>
          <TD width="100%" vAlign=top><!-- Admin -->
            <TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					
				</TR>
				<TR>
					<TD valign="top">  <?
					
  // include("includes/class.resizepic.php");
					
//////////////////////////////////////////// ʴ¡ Project   
if($_GET[op] == ""){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
 
?>
                   
  <form action="" name="myform_main"  id="myform_main" method="post">
  
<?
 include("mod/content/menu/sub.php");
?> 
 
     
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" cellspacing="2" cellpadding="1" >
    <tr bgcolor="#990000" height=25>
     <td width="50" align="center" bgcolor="#999999"><CENTER>
            <font color="#FFFFFF">แก้ไข</font>     
     </CENTER></td>
     <td width="50" align="center" bgcolor="#999999"><font color="#FFFFFF">ลบ</font></td>
     <td width="60" align="center" bgcolor="#999999"><CENTER>
       <font color="#FFFFFF">สถานที่</font>
     </CENTER></td>
     <td width="220" height="29" align="center" bgcolor="#999999"><font color="#FFFFFF">EN</font></td>
     
   
     <td width="220" height="29" align="center" bgcolor="#999999"><font color="#FFFFFF">TH</font></td>
     <td width="220" align="center" bgcolor="#999999"><font color="#FFFFFF">CN</font></td>
     <td width="150" align="center" bgcolor="#999999"><font color="#FFFFFF">หมวดหม่</font></td>
     <td align="center" bgcolor="#999999"><font color="#FFFFFF">ค่าตอบแทน</font></td>
    
    <td width="60" align="center" bgcolor="#999999"><font color="#FFFFFF">สถานที่</font></td>
    </tr>  
  <?
 
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[sub] = $db->select_query("SELECT * FROM shopping_product_sub    WHERE main='".$_GET[main]."' ORDER BY  id ASC  ");
while($arr[sub] = $db->fetch($res[sub])){
 
 
 
	
	 
 $res[com] = $db->select_query("SELECT * FROM shopping_product_main WHERE id='".$_GET[main]."' ");
 $arr[main] = $db->fetch($res[com]);
 
 	 
 $res[plan] = $db->select_query("SELECT * FROM plan_product_price_name  WHERE id='".$arr[sub][price_plan]."' ");
 $arr[plan] = $db->fetch($res[plan]);
 
 

 
 

			///////////////
 
 
 

	//Comment Icon
	if($arr[sub][enable_comment]){
		$CommentIcon = " <IMG SRC=\"images/icon/suggest.gif\" WIDTH=\"13\" HEIGHT=\"9\" BORDER=\"0\" ALIGN=\"absmiddle\">";
	}else{
		$CommentIcon = "";
	}
			$bgcolor = ($i++ & 1) ? $bg1 : $bg2; 
 
?> 

 
 
     <tr  bgcolor='<?=$bgcolor?>'>
       <td height="30" align="center">
       
       
       
       
      
       
 
       
       
     <a  id="btn_menu_edit_type_<? echo $arr[sub][id];?>" >
       <i class="fa  fa-edit" style="width:40px; font-size:30px; color:#666666"  ></i>
       
       </a> 
     
     
     
   </td>
     <td height="30" align="center">
     
     
     
      
     
		<script>
		

			$( document ).ready(function() {
		
		
		$("#btn_menu_del_sub_<? echo $arr[sub][id];?>").click(function(){ 
  
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการลบ <? echo $arr[sub][topic_th];?>",
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
	 
 
///

 
  $.post('go.php?name=content/load&file=type&op=sub_del&id=<? echo $arr[sub][id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });  
  
 
	  var url_page_type= "empty_style.php?name=content/load&file=type&main=<? echo $arr[sub][main];?>";
 
  $('#show_data_page').load(url_page_type);

///

 
 
	//  alert('dd');
    } else {
      swal("Cancelled", "", "error");
    }
	});
	   
	    

});

});

		
		
		 
		</script>
     
     
     
     
     
     
     
     
     
     
     
     <a id="btn_menu_del_sub_<? echo $arr[sub][id];?>"><i class="fa  fa-trash" style="width:40px; font-size:30px; color:#ff0000"  ></i> 
  
     </a></td>
     <td align="center" bgcolor="<?=$bgcolor?>"><script>
	 
 
 
 $("#btn_menu_type_<? echo $arr[sub][id];?>").click(function(){
			 
	///		 alert(0);
			 
 $('#topic_edit').html('ประเภท > <? echo $arr[sub][topic_en];?>');
			 
  var url_page_type= "go.php?name=content/load&file=place&sub=<? echo $arr[sub][id];?>&main=<? echo $arr[sub][main];?>";
 
      $('#show_data_page').load(url_page_type);
 
	   
	      });
	   
	   </script>
       
       
       
       
       
       
        <script>
	 
 
 
 $("#btn_menu_edit_type_<? echo $arr[sub][id];?>").click(function(){
 
			 
 $('#topic_edit').html('แก้ไข <? echo $arr[sub][topic_en];?>:<? echo $arr[project][topic_th];?>');
			 
  var url_page_type_<? echo $arr[sub][id];?>= "go.php?name=content/load&file=type&op=sub_edit&id=<? echo $arr[sub][id];?>&main=<? echo $arr[sub][main];?>";
 
  $('#show_data_page').load(url_page_type_<? echo $arr[sub][id];?>);
 
 
	   });
	   
 
	   </script>
       
       
 
       
       <a   id="btn_menu_type_<? echo $arr[sub][id];?>" data-toggle="modal" data-target="#myModal_texts"  > <i class="fa  fa-plus-circle" style="width:40px; font-size:30px; color:#1CBBB4"  ></i></a>
   
       
       </td>
     <td align="center">  
    <? echo $arr[sub][topic_en];?></a></td>
         <td align="center">
           
           <? echo $arr[sub][topic_th];?></a>  
           
         </td>
         <td align="center"> <? echo $arr[sub][topic_cn];?> </td>
         <td align="center">
		 
		 
		 <? echo $arr[main][topic_en];?></td>
         <td align="center">
		 
         <?  if($arr[plan][id] > 0) {?>
	 
		 <?=$arr[plan][topic_th]?>
         <? } ?>
         
         
         <?  if($arr[plan][id] <1) {?>
	 
		<font color="#FF0000">ยังไม่มี</font>
         <? } ?>
         
         
         
         
         </td>
         
         
         
   <td align="center">    
     
     
     
     <?
		 	echo $allplace = $db->num_rows('shopping_product',"id","sub=".$arr[sub][id]."");
		 ?>
     
     
   </td>
 </tr>
	  <TR>
		  <TD colspan="27" height="1" class="dotline"></TD>
	  </TR>
  <?
 } 
?>
   </table></td>
    </tr>
  </tbody>
</table>

   <div align="right" style="display:none">
   
   <br>
  <button type="button" class="btn btn-primary"   id="submit_data_sort" >
          <span id="txt_btn_save">
           บันทึกข้อมูล
          </span>
        </button>
  
<script>
 $("#submit_data_sort").click(function(){
 
  $.post('empty_style.php?name=admin/chat/admin/message/load&file=all&op=transferproduct_sort',$('#myform_main').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
 
  	  var url_page<? echo $_GET[type_sub];?> = "empty_style.php?name=admin/chat/admin/message/load&file=all";
	  url_page<? echo $_GET[type_sub];?>=url_page<? echo $_GET[type_sub];?>+"&type_sub=<? echo $_GET[type_sub];?>";
	 
      $('#show_data_page').load(url_page<? echo $_GET[type_sub];?>);
  
  
  
  /*
     $( document ).ready(function() {
	   
	   
	  var url_pagesub<? echo $_GET[sub];?> = "empty_style.php?name=admin/chat/admin/message/load&file=listsub&maintype=<? echo $_GET[sub];?>";
	 

	 
      $('#td_load_sub<? echo $_GET[sub];?>').load(url_pagesub<? echo $_GET[sub];?>);
	  });
  */
  
   
  
			   });
			  </script>
			  
    
  
   <input type="hidden" name="ACTION" value="transferproduct_del">
   <!--
 <input type="submit" class="myButton" value="delete" onclick="return delConfirm(document.myform)">  -->
   
   
   </div>
   </form> 
  <?
 
}
 ?>
 
 
 
 


<? 
if($_GET[op] == "sub_add"){
	//////////////////////////////////////////// ó Form
 

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_main where   id=".$_GET[main]."  ");
$arr[projecttype] = $db->fetch($res[projecttype]);

 
$res[place] = $db->select_query("SELECT * FROM shopping_product  where  id=".$_GET[id]." ");
$arr[place] = $db->fetch($res[place]);


$res[plan] = $db->select_query("SELECT * FROM shopping_product  where  id=".$_GET[id]." ");
$arr[plan] = $db->fetch($res[plan]);
	
 
?>
  <FORM NAME="myform"   id="myform"   enctype="multipart/form-data">
  <?
  include("mod/content/menu/price.php");
?> 
  
  
  
  
  
  
  <br>
       <script>
  $("#submit_data_update").click(function(){
	  
	  
	  
	 
  $.post('go.php?name=content/load&file=price&op=sub_add_action&id=<?=$_GET[id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
  
      setTimeout(function () {
 
 var url_page_type= "empty_style.php?name=content/load&file=place&main=<? echo $_GET[main];?>&sub=<? echo $_GET[sub];?>";
	  
  
 $('#show_data_page').load(url_page_type);
 
 }, 2000); //w
 
 
	  
	  
  
  
			   });
			    </script>
  
 
<br>

   <style>
 .div-menu-palce{
	 padding:5px;   border-radius: 8px; border: 2px solid #ddd;background-color:#FFFFFF;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-top:-15px;
 	 
 }
    </style>

    <table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tbody>
        <tr>
          <td width="180"> <button type="button" class="btn btn-primary btn-lg"   id="submit_data_update"  style=" width:150px"> <span id="txt_btn_save">อัพเดททั้งหมด</span> </button>
  </td>
          <td>  <div class="font-34"><b><?=$arr[place][topic_th]?></td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
  <br>
  
  
  
  <?
  
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
  $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$arr[place][price_plan]."   ");
                      
  $arr[price] = $db->fetch($res[price]);
  
  
  echo $arr[place][price_plan];
  
  ?>
  
  
  
  
  
  
  
  <table width="100%" border="0" cellspacing="1" cellpadding="1"    style="padding-top:5px;" class="div-menu-palce">
    <tr>
      <td width="180"> <span class="font-20"> &nbsp;
          <strong>ตั้งค่าทั้งหมด</strong> </span></td>
      <td width="920" class="font-22"><table width="900" border="0" cellspacing="2" cellpadding="2">
        <tbody>
          <tr>
            <td width="300" bgcolor="#C7EAFB">
            
            <div class="font-30"><center><b>ค่าจอด</div>
            
            
 
            
            <table width="255" border="0" align="center" cellpadding="3" cellspacing="3">
              <tbody>
                <tr>
                  <td width="85" align="center"><strong> บริษัท</strong>
                    <input name="price_park_driver" type="number" class="sload_park_driver" id="main_price_park_driver" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_park_driver];?>" /></td>
                  <td width="85" align="center"><strong> คนขับ </strong>
                    <input name="price_park_driver" type="number" class="sload_park_driver" id="main_price_park_driver" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_park_driver];?>" /></td>
                  <td width="85" align="center"><strong> เคาน์เตอร์ </strong>
                    <input name="price_park_counter" type="number" class="sload_park_counter" id="main_price_park_counter" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_park_counter];?>" /></td>
                  <td width="85" align="center"><strong>ทั่วไป</strong>
                    <input name="price_park_all" type="number" class="sload_park_all" id="main_price_park_all" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_park_all];?>" /></td>
                  </tr>
                </tbody>
              </table></td>
            <td width="300" bgcolor="#FFFDE9">
            
                <div class="font-30"><center><b>ค่าหัว</div>
            
            <table width="255" border="0" align="center" cellpadding="3" cellspacing="3">
              <tbody>
                <tr>
                  <td width="85" align="center"><strong> คนขับ </strong>
                    <input name="price_person_driver" type="number" class="sload_person_driver" id="main_price_person_driver" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_person_driver];?>" /></td>
                  <td width="85" align="center"><strong> เคาน์เตอร์ </strong>
                    <input name="price_person_counter" type="number" class="sload_person_counter" id="main_price_person_counter" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_person_counter];?>" /></td>
                  <td width="85" align="center"><strong>ทั่วไป</strong>
                    <input name="price_person_all" type="number" class="sload_person_all" id="main_price_person_all" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_person_all];?>" /></td>
                  </tr>
                </tbody>
              </table></td>
            <td bgcolor="#E9FBCF">
            
                        <div class="font-30"><center><b>ค่าคอมมิชชั่น %</div>
            
            
            <table width="255" border="0" align="center" cellpadding="3" cellspacing="3">
              <tbody>
                <tr>
                  <td width="85" align="center"><strong> คนขับ </strong>
                    <input name="price_commision_driver" type="number" class="sload_commision_driver" id="main_price_commision_driver" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_driver];?>" /></td>
                  <td width="85" align="center"><strong> เคาน์เตอร์ </strong>
                    <input name="price_commision_counter" type="number" class="sload_commision_counter" id="main_price_commision_counter" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_counter];?>" /></td>
                  <td width="85" align="center"><strong>ทั่วไป</strong>
                    <input name="price_commision_all" type="number" class="sload_commision_all" id="main_price_commision_all" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_all];?>" /></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
          </tbody>
      </table></td>
      <td class="font-22"><button type="button" class="btn btn-primary btn-lg"   id="submit_data_set"  style=" width:150px"> <span id="txt_btn_save"> ตั้งค่าทั้งหมด</span> </button>
      <br>

      
      <button type="reset" class="btn btn-default btn-lg"   id="submit_data_set"   style=" width:150px; margin-top:10px;"> <span id="txt_btn_save"> รีเซ็ต</span> </button>
      
      </td>
    </tr>
  </table>
  <br>
  

   
<?

  ////// จีน
 
 
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[shop] = $db->select_query("SELECT * FROM  product_price_list_all where product_id=".$_GET[id]."   and status=1 order by sort_country desc ");
                      
 while($arr[shop] = $db->fetch($res[shop])){  
 
 
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[nation] = $db->select_query("SELECT * FROM  web_country where  id=".$arr[shop][country]."  ORDER BY sort_country desc"); 
$arr[nation] = $db->fetch($res[nation]) ;



 
 

?>



 

 
 
 <table width="100%" border="0" cellspacing="1" cellpadding="1"  class="box-bottom-line" style="padding-top:5px;">
 
    <tr>
      <td width="30"> 
        <div class="font-20"><img src="images/flag/<?=$arr[nation][name_en]?>.png" width="30" height="30" alt="" style="margin-top:-5px;"/></div>
        
      </td>
      <td width="150"><span class="font-20"> &nbsp; 
          <?=$arr[nation][name_th]?>
      </span></td>
      <td class="font-22"><table width="900" border="0" cellspacing="2" cellpadding="2">
        <tbody>
          <tr>
            <td width="300" bgcolor="#C7EAFB"><table width="255" border="0" align="center" cellpadding="3" cellspacing="3">
              <tbody>
                <tr>
                  <td width="85" align="center"><strong> คนขับ </strong>
                    <input name="price_park_driver[]" type="number" class="load_park_driver" id="price_park_driver" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_park_driver];?>" /></td>
                  <td width="85" align="center"><strong> เคาน์เตอร์ </strong>
                    <input name="price_park_counter[]" type="number" class="load_park_counter" id="price_park_counter" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_park_counter];?>" /></td>
                  <td width="85" align="center"><strong>ทั่วไป</strong>
                    <input name="price_park_all[]" type="number" class="load_park_all" id="price_park_all" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_park_all];?>" /></td>
                </tr>
              </tbody>
            </table></td>
            <td width="300" bgcolor="#FFFDE9">
            
            
            <table width="255" border="0" align="center" cellpadding="3" cellspacing="3">
              <tbody>
                <tr>
                  <td width="85" align="center"><strong> คนขับ </strong>
                    <input name="price_person_driver[]" type="number" class="load_person_driver" id="price_person_driver" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_person_driver];?>" /></td>
                  <td width="85" align="center"><strong> เคาน์เตอร์ </strong>
                    <input name="price_person_counter[]" type="number" class="load_person_counter" id="price_person_counter" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_person_counter];?>" /></td>
                  <td width="85" align="center"><strong>ทั่วไป</strong>
                    <input name="price_person_all[]" type="number" class="load_person_all" id="price_person_all" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_person_all];?>" /></td>
                </tr>
              </tbody>
            </table>
            
            
            
            
            
            
            
            
            </td>
            <td bgcolor="#E9FBCF">
            
                     <table width="255" border="0" align="center" cellpadding="3" cellspacing="3">
              <tbody>
                <tr>
                  <td width="85" align="center"><strong> คนขับ </strong>
                    <input name="price_commision_driver[]" type="number" class="load_commision_driver" id="price_commision_driver" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_driver];?>" /></td>
                  <td width="85" align="center"><strong> เคาน์เตอร์ </strong>
                    <input name="price_commision_counter[]" type="number" class="load_commision_counter" id="price_commision_counter" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_counter];?>" /></td>
                  <td width="85" align="center"><strong>ทั่วไป</strong>
                    <input name="price_commision_all[]" type="number" class="load_commision_all" id="price_commision_all" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][price_commision_all];?>" /></td>
                </tr>
              </tbody>
            </table>
            
 
            
            </td>
          </tr>
        </tbody>
      </table><input name="id[]" type="hidden"   id="id" style="width:80px; background:#FFFFFF" value="<? echo $arr[shop][id];?>" /></td>
 
    </tr>
 
</table>

 
 

 
  <div>

<? } ?>
  
  
  
  
  
  
  
  
  
  
  
  
  
 
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%">&nbsp; </td>
        </tr>
    </table>
  
</FORM>
  
<?
 
}


?>


 
 
 
 
 
 <?
 
 
 if($_GET[op] == "sub_edit"){
	//////////////////////////////////////////// ó Form
 
		//֧
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[project] = $db->select_query("SELECT * FROM shopping_product_sub  WHERE id='".$_GET[id]."' ");
		$arr[project] = $db->fetch($res[project]);
		
		
		
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_main where   id=".$_GET[main]."  ");
$arr[projecttype] = $db->fetch($res[projecttype]);
 
?>
   
<FORM NAME="myform" id="myform"   enctype="multipart/form-data">
<?
 include("mod/content/menu/sub.php");
?> 

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td><strong>หมวดหมู่ : </strong></td>
            <td style="font-size:16px;"><?=$arr[projecttype][topic_th]?><input name="main" type="hidden" class="form-control" id="main" style="width:500px; background:#FFFFFF" value="<?=$_GET[main]?>" /></td>
          </tr>
          <tr>
            <td><strong>ค่าตอบแทน : </strong></td>
            <td style="font-size:16px;"><select  class="form-control" name="price_plan" id="price_plan" style="width:500px;; font-size:16px; padding:5px; height:40px" >
              <option value="">- เลือกประเภทค่าตอบแทน -</option>
              <?
                                  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
                                    $res[category] = $db->select_query("SELECT * FROM plan_product_price_name ORDER BY id  limit 100 ");
                      
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] ==$arr[project][price_plan]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][topic_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
            </select></td>
          </tr>
		          <tr>
		            <td><strong>ชื่อ EN : </strong></td>
		            <td><input name="topic_en" type="text" class="form-control" id="topic_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_en];?>" />
		              </td>
		            </tr>
		          <tr>
                    <td><strong>ชื่อ TH :</strong></td>
                    <td><input name="topic_th" type="text" class="form-control" id="topic_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_th];?>" /></td>
		            </tr>
		          <tr>
                    <td><strong>ชื่อ CN :</strong></td>
                    <td><input name="topic_cn" type="text" class="form-control" id="topic_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_cn];?>" />
                    </td>
		            </tr>
  
        <tr>
          <td width="150">&nbsp;</td>
          <td><button type="button" class="btn btn-primary btn-lg"   id="submit_data" > <span id="txt_btn_save"> บันทึกข้อมูล </span> </button>
            <script>
  $("#submit_data").click(function(){
				 
  
   if(document.getElementById('price_plan').value=="") {
alert('กรุณาเลือกประเภทค่าตอบแทน'); 
document.getElementById('price_plan').focus() ; 
return false ;
}

 

   if(document.getElementById('topic_th').value=="") {
alert('กรุณากรอกชื่อภาษาไทย'); 
document.getElementById('topic_th').focus() ; 
return false ;
}


 
 
 
 		 
  $.post('go.php?name=content/load&file=type&op=sub_edit_action&id=<?=$_GET[id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
	  var url_page_type= "empty_style.php?name=content/load&file=type&main=<? echo $arr[project][main];?>";
	  
 
 
  $('#show_data_page').load(url_page_type);
	  
	  
  
  
			   });
			  </script>
            </td>
        </tr>
        </table></td>
        </tr>
    </table></td>
      </tr>
    </table>
    </FORM>
	
<? } ?>









 

<?

 if($_GET[op] == "sub_add_action"  ){ ?>
 
 <script>
 /// alert(0);
 
 </script>
 
 
 <?  
	 
	 
 
	//////////////////////////////////////////// ó Database
 		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

	while(
		list($key, $id) = each ($_POST['id'])
		
 
		
		and list($key, $price_park_company) = each ($_POST['price_park_company'])
		and list($key, $price_park_driver) = each ($_POST['price_park_driver'])
		and list($key, $price_park_counter) = each ($_POST['price_park_counter'])
		and list($key, $price_park_all) = each ($_POST['price_park_all'])
		
		
		and list($key, $price_person_company) = each ($_POST['price_person_company'])	
		and list($key, $price_person_driver) = each ($_POST['price_person_driver'])
		and list($key, $price_person_counter) = each ($_POST['price_person_counter'])
		and list($key, $price_person_all) = each ($_POST['price_person_all'])
		
		
		and list($key, $price_commision_company) = each ($_POST['price_commision_company'])		
		and list($key, $price_commision_driver) = each ($_POST['price_commision_driver'])
		and list($key, $price_commision_counter) = each ($_POST['price_commision_counter'])
		and list($key, $price_commision_all) = each ($_POST['price_commision_all'])
 
 
	){

///

		$db->update_db('product_price_list_all',array(
		
 
		 "price_park_company"=>$price_park_company,
		 "price_park_driver"=>$price_park_driver,
		  "price_park_counter"=>$price_park_counter,
		 "price_park_all"=>$price_park_all,
 
		 
 		 "price_person_company"=>$price_person_company,
 		 "price_person_driver"=>$price_person_driver,
		  "price_person_counter"=>$price_person_counter,
		 "price_person_all"=>$price_person_all,
		 
  
		   "price_commision_company"=>$price_commision_company,		 
		   "price_commision_driver"=>$price_commision_driver,
		  "price_commision_counter"=>$price_commision_counter,
		 "price_commision_all"=>$price_commision_all 
 
 
			
 
		)," id='".$id."' ");
	 
 


	}
	
 
 }


?>







 
 
 
 <?
 if($_GET[op] == "sub_edit_action"  ){
	//////////////////////////////////////////// ó Database Edit
 
 
				//ӡ䢢ŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		
		$db->update_db('shopping_product_sub',array(
 
			"topic_cn"=>"$_POST[topic_cn]",
			"topic_th"=>"$_POST[topic_th]",
			"main"=>"$_POST[main]",
			
		"topic_en"=>"$_POST[topic_en]",
		
		"price_plan"=>"$_POST[price_plan]",
 
 
 
			
 
		)," id=$_GET[id] ");
	 
		
		
		
	}
 
 
 ?>
 
 
 
 
 
 <?
  if($_GET[op] == "sub_del"){
	//////////////////////////////////////////// óź Form
 
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->del('shopping_product_sub'," id='".$_GET[id]."' "); 
	 
		$db->closedb ();
		
	?>	
    
    
 
    
    
    
    
		
	<?	
  }
?>
 
 
 
 
 
 
 
 <script>
 $("#submit_data_set").click(function(){
	 
	 
 $(".load_park_company").val($('#main_price_park_company').val()); 
 
 $(".load_park_driver").val($('#main_price_park_driver').val()); 
  $(".load_park_counter").val($('#main_price_park_counter').val());
   $(".load_park_all").val($('#main_price_park_all').val());
   
   
       $(".load_person_company").val($('#main_price_person_company').val());
	   
    $(".load_person_driver").val($('#main_price_person_driver').val());
	 $(".load_person_counter").val($('#main_price_person_counter').val());
	  $(".load_person_all").val($('#main_price_person_all').val());
	  
 
	  
    $(".load_commision_company").val($('#main_price_commision_company').val());  
	
	   $(".load_commision_driver").val($('#main_price_commision_driver').val());
	    $(".load_commision_counter").val($('#main_price_commision_counter').val());
		 $(".load_commision_all").val($('#main_price_commision_all').val());
		 
 
 
 
			   });
			  </script>
			  