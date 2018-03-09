 
 
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
	
	echo $_GET[sub];
?>
  <FORM NAME="myform"   id="myform"   enctype="multipart/form-data">
  <?
 include("mod/content/menu/sub.php");
?> 
  
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td><strong>หมวดหมู่ : </strong></td>
            <td style="font-size:16px;"><?=$arr[projecttype][topic_th]?>   <input name="main" type="hidden" class="form-control" id="main" style="width:500px; background:#FFFFFF" value="<?=$_GET[main]?>" /> </td>
          </tr>
          <tr>
            <td><strong>ค่าตอบแทน : </strong></td>
            <td style="font-size:16px;">
            
            
 
            
            <select  class="form-control" name="price_plan" id="price_plan" style="width:500px;; font-size:16px; padding:5px; height:40px" >
                    <option value="">- เลือกประเภทค่าตอบแทน -</option>
                    <?
                                  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
                                    $res[category] = $db->select_query("SELECT * FROM plan_product_price_name ORDER BY id  limit 100 ");
                      
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] ==$arr[project][province]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][topic_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
                  </select> </td>
          </tr>
	 
		          <tr>
		            <td><strong>ชื่อ EN : </strong></td>
		            <td><input name="topic_en" type="text" class="form-control" id="topic_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_en];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>ชื่อ TH :</strong></td>
		            <td><input name="topic_th" type="text" class="form-control" id="topic_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_th];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>ชื่อ CN :</strong></td>
		            <td><input name="topic_cn" type="text" class="form-control" id="topic_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_cn];?>" /></td>
		            </tr>
          <tr>
            <td width="150">&nbsp;</td>  
            <td>       
              <button type="button" class="btn btn-primary btn-lg"   id="submit_data" >
                <span id="txt_btn_save">
                  บันทึกข้อมูล
                  </span>
                </button>
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



				 
				 
				 
				 
				 
				 
 
 		 
  $.post('go.php?name=content/load&file=type&op=sub_add_action&id=<?=$_GET[id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
   var url_page_type= "go.php?name=content/load&file=type&main=<?=$_GET[main];?>";
	  
 
  $('#show_data_page').load(url_page_type);
	  
	  
  
  
			   });
			  </script>
              
              
              </td>
          </tr>
        </table></td>
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

 if($_GET[op] == "sub_add_action"  ){
	//////////////////////////////////////////// ó Database
 
		//include("includes/class.resizepic.php");
 
	
		//ӡŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   
////////////////
		$db->add_db('shopping_product_sub',array(
 
			
			"topic_th"=>"$_POST[topic_th]",
			
			"topic_cn"=>"$_POST[topic_cn]",
			
			"main"=>"$_POST[main]",
			
			"price_plan"=>"$_POST[price_plan]",
 
		"topic_en"=>"$_POST[topic_en]",
			
 
		));
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
 
 
 
 
 
 
 
 