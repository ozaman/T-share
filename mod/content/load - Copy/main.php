
<? if($_GET[op] == ""){?>

 

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" cellspacing="2" cellpadding="1" >
    <tr bgcolor="#990000" height=25>
     <td width="50" align="center" bgcolor="#999999"><CENTER>
       <font color="#FFFFFF">แก้ไข</font>     
     </CENTER></td>
     <td width="50" align="center" bgcolor="#999999"><font color="#FFFFFF">ลบ</font></td>
     <td width="60" align="center" bgcolor="#999999"><CENTER>
       <font color="#FFFFFF">ประเภท</font>
     </CENTER></td>
     
     <td height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">EN</font></td>
     
   
     <td width="400" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">TH</font></td>
     <td width="199" align="center" bgcolor="#999999"><font color="#FFFFFF">CN</font></td>
     <td width="120" align="center" bgcolor="#999999"><CENTER>
       <font color="#FFFFFF">ประเภททั้งหหมด</font>
     </CENTER></td>
     <td width="120" align="center" bgcolor="#999999"><font color="#FFFFFF">สถานที่ทั้งหหมด</font></td>
     
    
    <td width="60" align="center" bgcolor="#999999"><font color="#FFFFFF">ลำดับ</font></td>
    </tr>  
  <?
  
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[project] = $db->select_query("SELECT * FROM shopping_product_main  ORDER BY  id  ASC  ");
while($arr[project] = $db->fetch($res[project])){
 
 
 
	
	 
	 $res[com] = $db->select_query("SELECT * FROM shopping_product_main WHERE id='".$arr[project][main]."' ");
 $arr[type] = $db->fetch($res[com]);
 

 
 

			///////////////
 
 
 

	//Comment Icon
	if($arr[project][enable_comment]){
		$CommentIcon = " <IMG SRC=\"images/icon/suggest.gif\" WIDTH=\"13\" HEIGHT=\"9\" BORDER=\"0\" ALIGN=\"absmiddle\">";
	}else{
		$CommentIcon = "";
	}
			$bgcolor = ($i++ & 1) ? $bg1 : $bg2; 
 
?> 

 
 
     <tr  bgcolor='<?=$bgcolor?>'>
       <td height="30" align="center">
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       <a  id="btn_menu_edit_main_<? echo $arr[project][id];?>" data-toggle="modal" data-target="#myModal_text"  >
         <i class="fa  fa-edit" style="width:40px; font-size:30px; color:#666666"  ></i>
         
         </a> 
 
     </td>
     
 
     
     
 
     
     
     
     <td align="center">
     
     
     
     
		<script>
		

			$( document ).ready(function() {
		
		
		$("#btn_menu_del_main_<? echo $arr[project][id];?>").click(function(){ 
  
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการลบ <? echo $arr[project][topic_th];?>",
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

 
  $.post('go.php?name=content/load&file=main&op=sub_del&id=<? echo $arr[project][id];?>',$('#myform_main').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });  
  
 
  
  
 var url_page_type= "empty_style.php?name=content/load&file=main&main=<? echo $arr[project][main];?>";
	  
   $('#load_main_type').load(url_page_type);


///





 
 
	//  alert('dd');
    } else {
      swal("Cancelled", "", "error");
    }
	});
	   
	    

});

});

		
		
		 
		</script>
     
     
     
     
     
     
     
     
     
     
     
     
     
      <a  id="btn_menu_del_main_<? echo $arr[project][id];?>"><i class="fa  fa-trash" style="width:40px; font-size:30px; color:#FF0000"  ></i> </a>
       
 
 
 
 
       
     </td>
     <td align="center">
       
       
       <script>
 
	$( document ).ready(function() {
	     $("#btn_menu_main_<? echo $arr[project][id];?>").click(function(){
			 
 $('#topic_edit').html('หมวดหมู่ > <? echo $arr[project][topic_en];?>');
			 
 
	  var url_page_type= "go.php?name=content/load&file=type&main=<? echo $arr[project][id];?>";
 
      $('#show_data_page').load(url_page_type);
	  
	  
	  
	  
	  
 
	   });
	   
	   
	      });
	   
	   </script>  
       
       
       
       
          <script>
	 
 
 
 $("#btn_menu_edit_main_<? echo $arr[project][id];?>").click(function(){
	 
  $('#topic_edit').html('แก้ไข  <? echo $arr[project][topic_th];?>');
			 
 var url_page_type_<? echo $arr[project][id];?>= "go.php?name=content/load&file=main&op=sub_edit&id=<? echo $arr[project][id];?>";
 
 $('#show_data_page').load(url_page_type_<? echo $arr[project][id];?>);
 
 
	   });
	   
 
	   
 
	   </script>
       
       
       
       
       <a   id="btn_menu_main_<? echo $arr[project][id];?>" data-toggle="modal" data-target="#myModal_text"  > <i class="fa  fa-plus-circle" style="width:40px; font-size:30px; color:#1CBBB4"  ></i> </a></td>
     <td align="center">  
  <? echo $arr[project][topic_en];?> </td>
         <td align="center">
           
  <? echo $arr[project][topic_th];?> 
           
         </td>
         <td align="center"><? echo $arr[project][topic_cn];?></td>
         <td align="center" id="num_all_sub_<? echo $arr[project][id];?>">  
         
 
 
 
 
 <?
		 	echo $alltype = $db->num_rows('shopping_product_sub',"id","main=".$arr[project][id]."");
		 ?>
         </td>
         
  <td align="center" id="naum_all_place_<? echo $arr[project][id];?>">  
         
           <?
		 	echo $allplace = $db->num_rows('shopping_product',"id","main=".$arr[project][id]."");
		 ?>
       </td>
         <td align="center">    
         

         
         
           
           
           <input type="hidden" name="id[]" value="<? echo $arr[project][id];?>"></td>
 </tr>
	  <TR>
		  <TD colspan="29" height="1" class="dotline"></TD>
	  </TR>
  <?
 } 
?>
   </table></td>
    </tr>
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>



 




<? } ?>









<? 
if($_GET[op] == "sub_add"){
	//////////////////////////////////////////// ó Form
 

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_main where   id=".$_GET[main]."  ");
$arr[projecttype] = $db->fetch($res[projecttype]);
	
	echo $_GET[sub];
?>
  <FORM NAME="myform"   id="myform"   enctype="multipart/form-data">
 
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
	 
		          <tr>
		            <td width="120"><strong>ชื่อ EN : </strong></td>
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
            <td>&nbsp;</td>  
            <td>       
              <button type="button" class="btn btn-primary btn-lg"   id="submit_data" data-dismiss="modal" >
                <span id="txt_btn_save">
                  บันทึกข้อมูล
                  </span>
                </button>
                      <script>
  $("#submit_data").click(function(){
	  
	  
	  
	  
   if(document.getElementById('topic_th').value=="") {
alert('กรุณากรอกชื่อภาษาไทย'); 
document.getElementById('topic_th').focus() ; 
return false ;
}

	  
				 
 
 		 
  $.post('go.php?name=content/load&file=main&op=sub_add_action&id=<?=$_GET[id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
  
  
 var url_page_type= "empty_style.php?name=content/load&file=main&main=<? echo $arr[project][main];?>";	  
 
 
  $('#load_main_type').load(url_page_type);
	  
	  
  
  
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
		$res[project] = $db->select_query("SELECT * FROM shopping_product_main  WHERE id='".$_GET[id]."' ");
		$arr[project] = $db->fetch($res[project]);
		
		
		
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_main where   id=".$_GET[main]."  ");
$arr[projecttype] = $db->fetch($res[projecttype]);
 
?>
   
<FORM NAME="myform" id="myform"   enctype="multipart/form-data">
 
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
		          <tr>
		            <td width="120"><strong>ชื่อ EN : </strong></td>
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
          <td>&nbsp;</td> 
          <td><button type="button" class="btn btn-primary btn-lg"   id="submit_data"  data-dismiss="modal"> <span id="txt_btn_save"> บันทึกข้อมูล </span> </button>
            <script>
  $("#submit_data").click(function(){
	  
	  
	  
				 
 
 		 
  $.post('go.php?name=content/load&file=main&op=sub_edit_action&id=<?=$_GET[id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
 var url_page_type= "empty_style.php?name=content/load&file=main&main=<? echo $arr[project][main];?>";
	  
 
 
  $('#load_main_type').load(url_page_type);
	  
	  
  
  
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
		$db->add_db('shopping_product_main',array(
 
			
			"topic_th"=>"$_POST[topic_th]",
			
			"topic_cn"=>"$_POST[topic_cn]",
 
		"topic_en"=>"$_POST[topic_en]",
			
 
		));
 }


?>







 
 
 
 <?
 if($_GET[op] == "sub_edit_action"  ){
	//////////////////////////////////////////// ó Database Edit
 
 
				//ӡ䢢ŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		
		$db->update_db('shopping_product_main',array(
 
			"topic_cn"=>"$_POST[topic_cn]",
			"topic_th"=>"$_POST[topic_th]",
 
		"topic_en"=>"$_POST[topic_en]"
 
 
 
			
 
		)," id=$_GET[id] ");
	 
		
		
		
	}
 
 
 ?>
 
 
 
 
 
 <?
  if($_GET[op] == "sub_del"){
	//////////////////////////////////////////// óź Form
 
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->del('shopping_product_main'," id='".$_GET[id]."' "); 
	 
		$db->closedb ();
  }
?>
 
 
 
 
 
 
