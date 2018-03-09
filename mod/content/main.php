<script   src="java.js"></script>

 

 </script>
 <style type="text/css">
 a:link {
	text-decoration: none!important;
}
a:visited {
	text-decoration: none!important;
}
a:hover {
	text-decoration: none!important;
}
a:active {
	text-decoration: none!important;
}
 </style>
 <br>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:22px;"  >
  <tr>
    <td>
    
    
    
 
   <script>
	 
   $("#add_new_sub").click(function(){
			 
 
			 
 $('#topic_edit').html('เพิ่มประเภทใหม่');
 
  $('#show_data_page').html('');
 
			 
  var url_page_type_add= "empty_style.php?name=content/load&file=type&op=sub_add&main=<?=$_GET[main];?>";
 
 $('#show_data_page').load(url_page_type_add);
 
 
	   });
	   
 
	   
	   </script>
       
       
       
       
      <script>
 
 
 $("#all_main").click(function(){
			 
 
			 
 $('#topic_edit').html('หมวดหมู่ทั้งหมด');
			 
			 
  var url_page_type_all= "go.php?name=content/load&file=main";
 
  $('#load_main_type').load(url_page_type_all);
 
 
	      });
	   
	   </script>
       
       
       
    
   <script>
	 
	 
	 	$( document ).ready(function() {
   $("#add_new_main").click(function(){
			 
 
			 
 $('#topic_edit').html('เพิ่มหมวดหมู่ใหม่');
 
 
  var url_page_type_add= "empty_style.php?name=content/load&file=main&op=sub_add&main=<?=$_GET[main];?>";
 
 $('#show_data_page').load(url_page_type_add);
 
 
 });
	   
 
  });
	   
	   </script>
 
 
 
 <style>
 .div-menu-palce{
	 padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#FFFFFF;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-top:-15px;
 	 
 }
 
 
 </style>
 
  

<div class="div-menu-palce">
 
    
    <a id="?name=content&file=main" style="font-size:22px;" > หมวดหมู่ทั้งหมด</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a id="add_new_main" style="font-size:22px;" data-toggle="modal" data-target="#myModal_text"> <i class="fa  fa-plus-circle" style="width:30px; font-size:24px;"  ></i>&nbsp;เพิ่มหมวดหมู่</a> 
    
    
    </div>
    
    </td>
  </tr>
</table>
<TABLE cellSpacing=0 cellPadding=0 width=100% border=0>
     <TBODY>
        <TR>
          <TD width="100%" vAlign=top><!-- Admin -->
            <TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					
				</TR>
				<TR>
					<TD valign="top">  <?
					
  include("includes/class.resizepic.php");
					
//////////////////////////////////////////// ʴ¡ Project   
if($_GET[op] == ""){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
	$limit = 5000 ;
	$SUMPAGE = $db->num_rows(TB_car_model,"id","");
	$page=$_GET[page];
	if (empty($page)){
		$page=1;
	}
	$rt = $SUMPAGE%$limit ;
	$totalpage = ($rt!=0) ? floor($SUMPAGE/$limit)+1 : floor($SUMPAGE/$limit); 
	$goto = ($page-1)*$limit ;
?>
                   
   <div id="load_main_type">
   
   <?  include("mod/content/load/main.php"); ?> 





   </div>
   
   
   
   
   
   
   
   
   
    
  <?
 
}
else if($_GET[op] == "transferproduct_add" AND $_GET[action] == "add"){
	//////////////////////////////////////////// ó Database
	if(1==1){
		//include("includes/class.resizepic.php");
 
	
		//ӡŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   
////////////////
		$db->add_db('shopping_product_main',array(
 
			
			"topic_th"=>"$_POST[topic_th]",
			
			"topic_cn"=>"$_POST[topic_cn]",
			
		///	"main"=>"$_POST[main]",
			
			//"type"=>"$_POST[type]",
			
		"topic_en"=>"$_POST[topic_en]",
			
 
 
 
 
		));
		
		
 
 
		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>เพิ่มข้อความสำเร็จ</B></FONT><BR><BR>";
		////$ProcessOutput .= "<A HREF=\"?name=content&file=main\"><B>Back to Car Model </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
 echo "<meta http-equiv=refresh content=0;URL=?name=content&file=main>";
//echo "<meta http-equiv=refresh content=0;URL=?name=content&file=main&op=transferproduct_add>";
	}else{
		//óҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "transferproduct_add"){
	//////////////////////////////////////////// ó Form
 

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM message_data_type where   id=".$_GET[type_main]."  ");
$arr[projecttype] = $db->fetch($res[projecttype]);
	
	echo $_GET[type];
?>
  <FORM NAME="myform"   id="myform"  METHOD=POST ACTION="?name=content&file=main&op=transferproduct_add&action=add" enctype="multipart/form-data">
  
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
		          <tr>
		            <td width="150"><strong>ชื่อ EN : </strong></td>
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
              <button type="mainmit" class="btn btn-primary btn-lg"   id="mainmit_data" >
                <span id="txt_btn_save">
                  บันทึกข้อมูล
                  </span>
                </button>
              
              <script>
			     $("#mainmit_data").click(function(){
				 
				 
   if(document.getElementById('topic_th').value=="") {
alert('กรุณากรอกชื่อภาษาไทย'); 
document.getElementById('topic_th').focus() ; 
return false ;
}
 
				 
				 
				 
			  $.post('empty_style.php?name=admin/chat/admin/message/load&file=all&op=transferproduct_add&action=add',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
  	  var url_page<? echo $_GET[type];?> = "empty_style.php?name=admin/chat/admin/message/load&file=all";
	  url_page<? echo $_GET[type];?>=url_page<? echo $_GET[type];?>+"&type_main="+document.getElementById('type').value;
	 
      $('#show_data_page').load(url_page<? echo $_GET[type];?>);
  
  
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
else if($_GET[op] == "transferproduct_edit" AND $_GET[action] == "edit"){
	//////////////////////////////////////////// ó Database Edit
	if(1==1){
 
				//ӡ䢢ŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		
		$db->update_db('shopping_product_main',array(
 
			"topic_cn"=>"$_POST[topic_cn]",
			"topic_th"=>"$_POST[topic_th]",
	///		"main"=>"$_POST[main]",
			
		"topic_en"=>"$_POST[topic_en]"
 
 
 
			
 
		)," id=$_GET[id] ");
	 
		
		
		
		
		 
 

		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Edit  complete</B></FONT><BR><BR>";
	///	$ProcessOutput .= "<A HREF=\"?name=admin/product&file=capacity\"><B>Back to Car Model</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	 echo "<meta http-equiv=refresh content=0;URL=?name=content&file=main>";
	}else{
		//óҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "transferproduct_edit"){
	//////////////////////////////////////////// ó Form
	if(1==1){
		//֧
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[project] = $db->select_query("SELECT * FROM shopping_product_main  WHERE id='".$_GET[id]."' ");
		$arr[project] = $db->fetch($res[project]);
		
 
 
?>
   
<FORM NAME="myform" id="myform" METHOD=POST ACTION="?name=content&file=main&op=transferproduct_edit&action=edit&id=<?=$_GET[id];?>" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
		          <tr>
		            <td><strong>ชื่อ EN : หห</strong></td>
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
          <td><button type="mainmit" class="btn btn-primary btn-lg"   id="mainmit_data" > <span id="txt_btn_save"> บันทึกข้อมูล </span> </button>
            <script>
			     $("#mainmit_data").click(function(){
					 
					 
   if(document.getElementById('topic_th').value=="") {
alert('กรุณากรอกชื่อภาษาไทย'); 
document.getElementById('topic_th').focus() ; 
return false ;
}

				 
				 
			  $.post('empty_style.php?name=admin/chat/admin/message/load&file=all&op=transferproduct_edit&action=edit&id=<?=$_GET[id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
  	  var url_page<?=$_GET[id];?> = "empty_style.php?name=admin/chat/admin/message/load&file=all";
	  url_page<?=$_GET[id];?>=url_page<?=$_GET[id];?>+"&type_main="+document.getElementById('type').value;
	 
      $('#show_data_page').load(url_page<?=$_GET[id];?>);
  
  
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
	
	
  
<?
	}else{
		//óҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
 
	//////////////////////////////////////////// óź Multi
	
	else if($_GET[op] == "transferproduct_sort" ){
	//////////////////////////////////////////// ó 
	if(1==1){
	
	
		while(
		list($key, $value) = each ($_POST['sort_number'])
		and list($key, $id) = each ($_POST['id'])
		 
		){
			$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
			$db->update_db("shopping_product_main",array(
	 
			"sort_number"=>"$value"
 

		)," id=$id ");
			
		}
		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Update complete</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=content&file=main\"><B>Back to Car Model </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
		
 
////echo "<meta http-equiv=refresh content=0;URL=?name=content&file=main>";
			
		/*
			$res[projectmain] = $db->select_query("SELECT * FROM ".TB_project." WHERE id='".$value."' ");
			$arr[projectmain] = $db->fetch($res[projectmain]);
			$db->del(TB_car_model," id='".$value."' "); 
			$db->del(TB_gallery," category='".$value."' "); 
			$db->closedb ();
		@unlink("pic/galleryicon/icon/".$_GET[prefix]."_icon.jpg");
		@unlink("pic/galleryicon/icon/".$_GET[prefix]."_icon2.jpg");
		@unlink("pic/galleryicon/pic/".$_GET[prefix]."full.jpg");
		}
		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Delete Car Model complete</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=content&file=main\"><B>Back to Car Model </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";*/
		
		
	}else{
	 
	
	
	 
		//óҹ
		///$ProcessOutput = $PermissionFalse ;
	}
	///echo $ProcessOutput ;
}
else if($_GET[op] == "transferproduct_del"){
	//////////////////////////////////////////// óź Form
	if(1==1){
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->del('shopping_product_main'," id='".$_GET[id]."' "); 
	 
		$db->closedb ();

		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Delete complete</B></FONT><BR><BR>";
 echo "<meta http-equiv=refresh content=0;URL=?name=content&file=main>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//óҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
?>
</TD></TR>
			</TABLE>
			
		  <!-- Admin -->		  </TD>
        </TR>
      </TBODY>
</TABLE>



<?
  if($_GET[op] == "transferproduct_reply"){
	//////////////////////////////////////////// ó Form
 

 

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM message_data_type where   id='".$_GET[type_main]."'  ");
$arr[projecttype] = $db->fetch($res[projecttype]);


$res[projecttypemain] = $db->select_query("SELECT * FROM message_data_type_main where   id=".$_GET[type]."  ");
$arr[projecttypemain] = $db->fetch($res[projecttypemain]);
	
 
	///echo $_GET[type_main];
	
?>
  <FORM NAME="myform"   id="myform"  METHOD=POST ACTION="?name=content&file=main&op=transferproduct_add&action=add" enctype="multipart/form-data">
  
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
		          <tr>
                    <td width="150"><strong>Main Type : </strong></td>
		            <td style="font-size:18px; text-transform: capitalize ">
					
					<?=$arr[projecttype][from_part]?>&nbsp;to <?=$arr[projecttype][to_part]?>
					
					<input name="type_main" type="hidden" class="form-control" id="type_main" style="width:500px; background:#FFFFFF" value="<? echo $_GET[type_main];?>" /> </td>
		            </tr>
		          <tr>
                    <td><strong>main Type : </strong></td>
                    <td>
					 
					
					<select name="type"   id="type"    style="font-size:18px; padding-bottom: 1px; padding: 5px;  background-color:#FFFDE9; height:40px; width:500px;" chosen width="'100%'">
                        <?  
                      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                   $res[category] = $db->select_query("SELECT * FROM  message_data_type_main where id=".$_GET[type]."  ORDER BY id asc");
while ($arr[category] = $db->fetch($res[category])){
 
 
  
	   echo "<option value=\"".$arr[category][id]."\"";
	   if($arr[category][id] == $_GET[type]){echo " Selected";}
	   echo ">".$arr[category][topic_en]." </option>";
	   }
                      $db->closedb ();
                      ?>
                    </select></td>
		            </tr>
		          <tr>
                    <td><strong>Message : </strong></td>
                    <td><select name="message"   id="message"    style="font-size:14px; padding-bottom: 1px; padding: 5px;  background-color:#FFFDE9; height:30px; width:500px;" chosen width="'100%'">
                        <?  
                      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                   $res[category] = $db->select_query("SELECT * FROM  shopping_product_main ORDER BY type,topic_en ");
while ($arr[category] = $db->fetch($res[category])){
  
  
	   echo "<option value=\"".$arr[category][id]."\"";
	   if($arr[category][id] == $_GET[type55]){echo " Selected";}
	   echo ">".$arr[category][topic_en]." </option>";
	   }
                      $db->closedb ();
                      ?>
                    </select></td>
          </tr>
		          <tr>
                    <td><strong>EN : </strong></td>
                    <td><input name="topic_en" type="text" class="form-control" id="topic_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_en];?>" />
                    </td>
		            </tr>
		          <tr>
                    <td><strong>TH :</strong></td>
		            <td><input name="topic_th" type="text" class="form-control" id="topic_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_th];?>" /></td>
		            </tr>
		          <tr>
                    <td><strong>CN :</strong></td>
		            <td><input name="topic_cn" type="text" class="form-control" id="topic_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_cn];?>" /> </td>
		          </tr>
          <tr>
            <td>&nbsp;</td>  
            <td>       
        <button type="button" class="btn btn-primary"   id="mainmit_data" >
          <span id="txt_btn_save">
           บันทึกข้อมูล
          </span>
        </button>
  
			  <script>
			     $("#mainmit_data").click(function(){
				 
				 
			  $.post('empty_style.php?name=admin/chat/admin/message/load&file=all&op=transferproduct_add&action=add',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
  	  var url_page<? echo $_GET[type];?> = "empty_style.php?name=admin/chat/admin/message/load&file=all";
	  url_page<? echo $_GET[type];?>=url_page<? echo $_GET[type];?>+"&type_main="+document.getElementById('type').value;
	 
      $('#show_data_page').load(url_page<? echo $_GET[type];?>);
  
  
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
  if($_GET[op] == "add_pic"){
	//////////////////////////////////////////// ó Form
 

 

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_main where   id='".$_GET[id]."'  ");
$arr[projecttype] = $db->fetch($res[projecttype]);

 
 
	///echo $_GET[type_main];
	
?>
  <FORM NAME="myform"   id="myform"  METHOD=POST ACTION="?name=content&file=main&op=add_pic_form&action=add&id=<?=$_GET[id]?>" enctype="multipart/form-data">
  
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
		          <tr>
                    <td width="150"><strong>Product : </strong></td>
		            <td style="font-size:18px; "><?=$arr[projecttype][topic_th]?>
					
					</td>
		            </tr>
		          <tr>
                    <td><strong>ชื่อรูปภาพ : </strong></td>
                    <td><input name="name" type="text" class="form-control" id="name" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name];?>" />
                    </td>
		            </tr>
		          <tr>
                    <td><strong>เลือกไฟล์ :</strong></td>
		            <td><input type="file" name="file_upload" onpropertychange="view01.src=FILE.value;" style="width=250;"> </td>
		          </tr>
          <tr>
            <td>&nbsp;</td>  
            <td>       
        <button type="mainmit" class="btn btn-primary"   id="mainmit_data" >
          <span id="txt_btn_save">
           บันทึกข้อมูล
          </span>
        </button>
  
			  <script>
			     $("#mainmit_data").click(function(){
				 
				 
			  $.post('empty_style.php?name=admin/chat/admin/message/load&file=all&op=transferproduct_add&action=add',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
  	  var url_page<? echo $_GET[type];?> = "empty_style.php?name=admin/chat/admin/message/load&file=all";
	  url_page<? echo $_GET[type];?>=url_page<? echo $_GET[type];?>+"&type_main="+document.getElementById('type').value;
	 
      $('#show_data_page').load(url_page<? echo $_GET[type];?>);
  
  
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
  if($_GET[op] == "edit_pic"){
	//////////////////////////////////////////// ó Form
 
 
/*
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_main where   id='".$_GET[id]."'  ");
$arr[projecttype] = $db->fetch($res[projecttype]);

*/


$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_gallery where   id='".$_GET[id]."'  ");
$arr[projecttype] = $db->fetch($res[projecttype]);

 
 
	///echo $_GET[type_main];
	
?>
  <FORM NAME="myform"   id="myform"  METHOD=POST ACTION="?name=content&file=main&op=add_pic_form&action=add&id=<?=$_GET[id]?>" enctype="multipart/form-data">
  
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
		          <tr>
                    <td width="150"><strong>Product : </strong></td>
		            <td style="font-size:18px; "><?=$arr[projecttype][topic_th]?>
					
					</td>
		            </tr>
		          <tr>
                    <td><strong>ชื่อรูปภาพ : </strong></td>
                    <td><input name="name" type="text" class="form-control" id="name" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name];?>" />
                    </td>
		            </tr>
		          <tr>
		            <td>&nbsp;</td>
		            <td><IMG SRC="../data/fileupload/shopping_place/<?=$arr[news][projecttype];?>.jpg" name="view01" width="200" BORDER="0" class="IMGSHOP" ></td>
          </tr>
		          <tr>
                    <td><strong>เลือกไฟล์ :</strong></td>
		            <td><input type="file" name="file_upload" onpropertychange="view01.src=FILE.value;" style="width=250;"> </td>
		          </tr>
          <tr>
            <td>&nbsp;</td>  
            <td>       
        <button type="mainmit" class="btn btn-primary"   id="mainmit_data" >
          <span id="txt_btn_save">
           บันทึกข้อมูล
          </span>
        </button>
  
			  <script>
			     $("#mainmit_data").click(function(){
				 
				 
			  $.post('empty_style.php?name=admin/chat/admin/message/load&file=all&op=transferproduct_add&action=add',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
  	  var url_page<? echo $_GET[type];?> = "empty_style.php?name=admin/chat/admin/message/load&file=all";
	  url_page<? echo $_GET[type];?>=url_page<? echo $_GET[type];?>+"&type_main="+document.getElementById('type').value;
	 
      $('#show_data_page').load(url_page<? echo $_GET[type];?>);
  
  
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
 if($_GET[op] == "add_pic_form"){
	//////////////////////////////////////////// óź Form
	if(1==1){
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	 
	 
 		$db->add_db('shopping_gallery',array(
		
		
		"product_id"=>"$_GET[id]", 
 
			"name"=>"$_POST[name]", 
			"post_date"=>"".TIMESTAMP."",
			"update_date"=>"".TIMESTAMP.""
 
		));
 
 
 
if( $_FILES['file_upload']['tmp_name']<>''){

 
			$original_image = $_FILES['file_upload']['tmp_name'] ;
			$desired_width = 600;
			$desired_height = _INEWS_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			$image->output_resized("../data/fileupload/shopping_place/".TIMESTAMP.".jpg","JPG");
 
 
}
 
 
 

		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Add complete</B></FONT><BR><BR>";
 echo "<meta http-equiv=refresh content=0;URL=?name=content&file=main>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//óҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}


?>







<?
 if($_GET[op] == "edit_pic_form"){
	//////////////////////////////////////////// óź Form
	if(1==1){
		
		
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_main where   id='".$_GET[id]."'  ");
$arr[projecttype] = $db->fetch($res[projecttype]);

		
		
		
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	 
	 
 		///$db->add_db('shopping_gallery',array(
				$db->update_db('shopping_gallery',array(
		
		
		"product_id"=>"$_GET[id]", 
 
			"name"=>"$_POST[name]", 
			"post_date"=>"".TIMESTAMP."",
			"update_date"=>"".TIMESTAMP.""
 
		)," id=$_GET[id] ");
		$db->closedb ();
 
 
 
if( $_FILES['file_upload']['tmp_name']<>''){

 
			$original_image = $_FILES['file_upload']['tmp_name'] ;
			$desired_width = 600;
			$desired_height = _INEWS_H ;
			$image = new hft_image($original_image);
			$image->resize($desired_width, $desired_height, '0');
			$image->output_resized("../data/fileupload/shopping_place/".$arr[projecttype][post_date].".jpg","JPG");
 
}
 
 
 

		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Add complete</B></FONT><BR><BR>";
 echo "<meta http-equiv=refresh content=0;URL=?name=content&file=main>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//óҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}


?>
 


<div  id="div_send_data_msg"></div>
 
 
 
 
  <!-- Modal -->
  <div class="modal fade" id="myModal_text" role="dialog">
    <div class="modal-dialog" style="width:100% "  >
    
      <!-- Modal content-->
      <div class="modal-content"  style="background-color:#FFFFFF;width:90%">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title" id="topic_edit">Message Management</h2>
        </div>
        <div class="modal-body" id="show_data_page">
 
        </div>
        <div class="modal-footer" style="display:none">
 
          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่าง</button>
 
        </div>
		
      </div>
      
    </div>
  </div>
  
  
  
  
  
 
 
  
  
  
  
  
  
  
  
<style>
body.stop-scrolling {
  height: 100%;
  overflow: hidden; }

.sweet-overlay {
  background-color: black;
  /* IE8 */
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
  /* IE8 */
  background-color: rgba(0, 0, 0, 0.8);
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  display: none;
  z-index: 10000; }

.sweet-alert {
  background-color: white;
  font-family:  Arial, sans-serif;
  width: 400px;
  padding: 17px;
  border-radius: 5px;
  text-align: center;
  position: fixed;
  left: 50%;
  top: 50%;
  margin-left: -256px;
  margin-top: -200px;
  overflow: hidden;
  display: none;
  z-index: 99999; }
  @media all and (max-width: 540px) {
    .sweet-alert {
      width: auto;
      margin-left: 0;
      margin-right: 0;
      left: 15px;
      right: 15px; } }
  .sweet-alert h2 {
    color: #575757;
    font-size: 30px;
    text-align: center;
    font-weight: 600;
    text-transform: none;
    position: relative;
    margin: 25px 0;
    padding: 0;
    line-height: 40px;
    display: block; }
  .sweet-alert p {
    color: #797979;
    font-size: 16px;
    text-align: center;
    font-weight: 300;
    position: relative;
    text-align: inherit;
    float: none;
    margin: 0;
    padding: 0;
    line-height: normal; }
  .sweet-alert fieldset {
    border: none;
    position: relative; }
  .sweet-alert .sa-error-container {
    background-color: #f1f1f1;
    margin-left: -17px;
    margin-right: -17px;
    overflow: hidden;
    padding: 0 10px;
    max-height: 0;
    webkit-transition: padding 0.15s, max-height 0.15s;
    transition: padding 0.15s, max-height 0.15s; }
    .sweet-alert .sa-error-container.show {
      padding: 10px 0;
      max-height: 100px;
      webkit-transition: padding 0.2s, max-height 0.2s;
      transition: padding 0.25s, max-height 0.25s; }
    .sweet-alert .sa-error-container .icon {
      display: inline-block;
      width: 24px;
      height: 24px;
      border-radius: 50%;
      background-color: #ea7d7d;
      color: white;
      line-height: 24px;
      text-align: center;
      margin-right: 3px; }
    .sweet-alert .sa-error-container p {
      display: inline-block; }
  .sweet-alert .sa-input-error {
    position: absolute;
    top: 29px;
    right: 26px;
    width: 20px;
    height: 20px;
    opacity: 0;
    -webkit-transform: scale(0.5);
    transform: scale(0.5);
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    -webkit-transition: all 0.1s;
    transition: all 0.1s; }
    .sweet-alert .sa-input-error::before, .sweet-alert .sa-input-error::after {
      content: "";
      width: 20px;
      height: 6px;
      background-color: #f06e57;
      border-radius: 3px;
      position: absolute;
      top: 50%;
      margin-top: -4px;
      left: 50%;
      margin-left: -9px; }
    .sweet-alert .sa-input-error::before {
      -webkit-transform: rotate(-45deg);
      transform: rotate(-45deg); }
    .sweet-alert .sa-input-error::after {
      -webkit-transform: rotate(45deg);
      transform: rotate(45deg); }
    .sweet-alert .sa-input-error.show {
      opacity: 1;
      -webkit-transform: scale(1);
      transform: scale(1); }
  .sweet-alert input {
    width: 100%;
    box-sizing: border-box;
    border-radius: 3px;
    border: 1px solid #d7d7d7;
    height: 43px;
    margin-top: 10px;
    margin-bottom: 17px;
    font-size: 18px;
    box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.06);
    padding: 0 12px;
    display: none;
    -webkit-transition: all 0.3s;
    transition: all 0.3s; }
    .sweet-alert input:focus {
      outline: none;
      box-shadow: 0px 0px 3px #c4e6f5;
      border: 1px solid #b4dbed; }
      .sweet-alert input:focus::-moz-placeholder {
        transition: opacity 0.3s 0.03s ease;
        opacity: 0.5; }
      .sweet-alert input:focus:-ms-input-placeholder {
        transition: opacity 0.3s 0.03s ease;
        opacity: 0.5; }
      .sweet-alert input:focus::-webkit-input-placeholder {
        transition: opacity 0.3s 0.03s ease;
        opacity: 0.5; }
    .sweet-alert input::-moz-placeholder {
      color: #bdbdbd; }
    .sweet-alert input:-ms-input-placeholder {
      color: #bdbdbd; }
    .sweet-alert input::-webkit-input-placeholder {
      color: #bdbdbd; }
  .sweet-alert.show-input input {
    display: block; }
 
    .sweet-alert button:focus {
      outline: none;
      box-shadow: 0 0 2px rgba(128, 179, 235, 0.5), inset 0 0 0 1px rgba(0, 0, 0, 0.05); }
    .sweet-alert button:hover {
      background-color: #a1d9f2; }
    .sweet-alert button:active {
      background-color: #81ccee; }
    .sweet-alert button.cancel {
      background-color: #D0D0D0; }
      .sweet-alert button.cancel:hover {
        background-color: #c8c8c8; }
      .sweet-alert button.cancel:active {
        background-color: #b6b6b6; }
      .sweet-alert button.cancel:focus {
        box-shadow: rgba(197, 205, 211, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.0470588) 0px 0px 0px 1px inset !important; }
    .sweet-alert button::-moz-focus-inner {
      border: 0; }
  .sweet-alert[data-has-cancel-button=false] button {
    box-shadow: none !important; }
  .sweet-alert[data-has-confirm-button=false][data-has-cancel-button=false] {
    padding-bottom: 40px; }
  .sweet-alert .sa-icon {
    width: 80px;
    height: 80px;
    border: 4px solid gray;
    -webkit-border-radius: 40px;
    border-radius: 40px;
    border-radius: 50%;
    margin: 20px auto;
    padding: 0;
    position: relative;
    box-sizing: content-box; }
    .sweet-alert .sa-icon.sa-error {
      border-color: #F27474; }
      .sweet-alert .sa-icon.sa-error .sa-x-mark {
        position: relative;
        display: block; }
      .sweet-alert .sa-icon.sa-error .sa-line {
        position: absolute;
        height: 5px;
        width: 47px;
        background-color: #F27474;
        display: block;
        top: 37px;
        border-radius: 2px; }
        .sweet-alert .sa-icon.sa-error .sa-line.sa-left {
          -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
          left: 17px; }
        .sweet-alert .sa-icon.sa-error .sa-line.sa-right {
          -webkit-transform: rotate(-45deg);
          transform: rotate(-45deg);
          right: 16px; }
    .sweet-alert .sa-icon.sa-warning {
      border-color: #F8BB86; }
      .sweet-alert .sa-icon.sa-warning .sa-body {
        position: absolute;
        width: 5px;
        height: 47px;
        left: 50%;
        top: 10px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
        margin-left: -2px;
        background-color: #F8BB86; }
      .sweet-alert .sa-icon.sa-warning .sa-dot {
        position: absolute;
        width: 7px;
        height: 7px;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        margin-left: -3px;
        left: 50%;
        bottom: 10px;
        background-color: #F8BB86; }
    .sweet-alert .sa-icon.sa-info {
      border-color: #C9DAE1; }
      .sweet-alert .sa-icon.sa-info::before {
        content: "";
        position: absolute;
        width: 5px;
        height: 29px;
        left: 50%;
        bottom: 17px;
        border-radius: 2px;
        margin-left: -2px;
        background-color: #C9DAE1; }
      .sweet-alert .sa-icon.sa-info::after {
        content: "";
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        margin-left: -3px;
        top: 19px;
        background-color: #C9DAE1; }
    .sweet-alert .sa-icon.sa-success {
      border-color: #A5DC86; }
      .sweet-alert .sa-icon.sa-success::before, .sweet-alert .sa-icon.sa-success::after {
        content: '';
        -webkit-border-radius: 40px;
        border-radius: 40px;
        border-radius: 50%;
        position: absolute;
        width: 60px;
        height: 120px;
        background: white;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg); }
      .sweet-alert .sa-icon.sa-success::before {
        -webkit-border-radius: 120px 0 0 120px;
        border-radius: 120px 0 0 120px;
        top: -7px;
        left: -33px;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
        -webkit-transform-origin: 60px 60px;
        transform-origin: 60px 60px; }
      .sweet-alert .sa-icon.sa-success::after {
        -webkit-border-radius: 0 120px 120px 0;
        border-radius: 0 120px 120px 0;
        top: -11px;
        left: 30px;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
        -webkit-transform-origin: 0px 60px;
        transform-origin: 0px 60px; }
      .sweet-alert .sa-icon.sa-success .sa-placeholder {
        width: 80px;
        height: 80px;
        border: 4px solid rgba(165, 220, 134, 0.2);
        -webkit-border-radius: 40px;
        border-radius: 40px;
        border-radius: 50%;
        box-sizing: content-box;
        position: absolute;
        left: -4px;
        top: -4px;
        z-index: 2; }
      .sweet-alert .sa-icon.sa-success .sa-fix {
        width: 5px;
        height: 90px;
        background-color: white;
        position: absolute;
        left: 28px;
        top: 8px;
        z-index: 1;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg); }
      .sweet-alert .sa-icon.sa-success .sa-line {
        height: 5px;
        background-color: #A5DC86;
        display: block;
        border-radius: 2px;
        position: absolute;
        z-index: 2; }
        .sweet-alert .sa-icon.sa-success .sa-line.sa-tip {
          width: 25px;
          left: 14px;
          top: 46px;
          -webkit-transform: rotate(45deg);
          transform: rotate(45deg); }
        .sweet-alert .sa-icon.sa-success .sa-line.sa-long {
          width: 47px;
          right: 8px;
          top: 38px;
          -webkit-transform: rotate(-45deg);
          transform: rotate(-45deg); }
    .sweet-alert .sa-icon.sa-custom {
      background-size: contain;
      border-radius: 0;
      border: none;
      background-position: center center;
      background-repeat: no-repeat; }

/*
 * Animations
 */
@-webkit-keyframes showSweetAlert {
  0% {
    transform: scale(0.7);
    -webkit-transform: scale(0.7); }
  45% {
    transform: scale(1.05);
    -webkit-transform: scale(1.05); }
  80% {
    transform: scale(0.95);
    -webkit-transform: scale(0.95); }
  100% {
    transform: scale(1);
    -webkit-transform: scale(1); } }

@keyframes showSweetAlert {
  0% {
    transform: scale(0.7);
    -webkit-transform: scale(0.7); }
  45% {
    transform: scale(1.05);
    -webkit-transform: scale(1.05); }
  80% {
    transform: scale(0.95);
    -webkit-transform: scale(0.95); }
  100% {
    transform: scale(1);
    -webkit-transform: scale(1); } }

@-webkit-keyframes hideSweetAlert {
  0% {
    transform: scale(1);
    -webkit-transform: scale(1); }
  100% {
    transform: scale(0.5);
    -webkit-transform: scale(0.5); } }

@keyframes hideSweetAlert {
  0% {
    transform: scale(1);
    -webkit-transform: scale(1); }
  100% {
    transform: scale(0.5);
    -webkit-transform: scale(0.5); } }

@-webkit-keyframes slideFromTop {
  0% {
    top: 0%; }
  100% {
    top: 50%; } }

@keyframes slideFromTop {
  0% {
    top: 0%; }
  100% {
    top: 50%; } }

@-webkit-keyframes slideToTop {
  0% {
    top: 50%; }
  100% {
    top: 0%; } }

@keyframes slideToTop {
  0% {
    top: 50%; }
  100% {
    top: 0%; } }

@-webkit-keyframes slideFromBottom {
  0% {
    top: 70%; }
  100% {
    top: 50%; } }

@keyframes slideFromBottom {
  0% {
    top: 70%; }
  100% {
    top: 50%; } }

@-webkit-keyframes slideToBottom {
  0% {
    top: 50%; }
  100% {
    top: 70%; } }

@keyframes slideToBottom {
  0% {
    top: 50%; }
  100% {
    top: 70%; } }

.showSweetAlert[data-animation=pop] {
  -webkit-animation: showSweetAlert 0.3s;
  animation: showSweetAlert 0.3s; }

.showSweetAlert[data-animation=none] {
  -webkit-animation: none;
  animation: none; }

.showSweetAlert[data-animation=slide-from-top] {
  -webkit-animation: slideFromTop 0.3s;
  animation: slideFromTop 0.3s; }

.showSweetAlert[data-animation=slide-from-bottom] {
  -webkit-animation: slideFromBottom 0.3s;
  animation: slideFromBottom 0.3s; }

.hideSweetAlert[data-animation=pop] {
  -webkit-animation: hideSweetAlert 0.2s;
  animation: hideSweetAlert 0.2s; }

.hideSweetAlert[data-animation=none] {
  -webkit-animation: none;
  animation: none; }

.hideSweetAlert[data-animation=slide-from-top] {
  -webkit-animation: slideToTop 0.4s;
  animation: slideToTop 0.4s; }

.hideSweetAlert[data-animation=slide-from-bottom] {
  -webkit-animation: slideToBottom 0.3s;
  animation: slideToBottom 0.3s; }

@-webkit-keyframes animateSuccessTip {
  0% {
    width: 0;
    left: 1px;
    top: 19px; }
  54% {
    width: 0;
    left: 1px;
    top: 19px; }
  70% {
    width: 50px;
    left: -8px;
    top: 37px; }
  84% {
    width: 17px;
    left: 21px;
    top: 48px; }
  100% {
    width: 25px;
    left: 14px;
    top: 45px; } }

@keyframes animateSuccessTip {
  0% {
    width: 0;
    left: 1px;
    top: 19px; }
  54% {
    width: 0;
    left: 1px;
    top: 19px; }
  70% {
    width: 50px;
    left: -8px;
    top: 37px; }
  84% {
    width: 17px;
    left: 21px;
    top: 48px; }
  100% {
    width: 25px;
    left: 14px;
    top: 45px; } }

@-webkit-keyframes animateSuccessLong {
  0% {
    width: 0;
    right: 46px;
    top: 54px; }
  65% {
    width: 0;
    right: 46px;
    top: 54px; }
  84% {
    width: 55px;
    right: 0px;
    top: 35px; }
  100% {
    width: 47px;
    right: 8px;
    top: 38px; } }

@keyframes animateSuccessLong {
  0% {
    width: 0;
    right: 46px;
    top: 54px; }
  65% {
    width: 0;
    right: 46px;
    top: 54px; }
  84% {
    width: 55px;
    right: 0px;
    top: 35px; }
  100% {
    width: 47px;
    right: 8px;
    top: 38px; } }

@-webkit-keyframes rotatePlaceholder {
  0% {
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg); }
  5% {
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg); }
  12% {
    transform: rotate(-405deg);
    -webkit-transform: rotate(-405deg); }
  100% {
    transform: rotate(-405deg);
    -webkit-transform: rotate(-405deg); } }

@keyframes rotatePlaceholder {
  0% {
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg); }
  5% {
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg); }
  12% {
    transform: rotate(-405deg);
    -webkit-transform: rotate(-405deg); }
  100% {
    transform: rotate(-405deg);
    -webkit-transform: rotate(-405deg); } }

.animateSuccessTip {
  -webkit-animation: animateSuccessTip 0.75s;
  animation: animateSuccessTip 0.75s; }

.animateSuccessLong {
  -webkit-animation: animateSuccessLong 0.75s;
  animation: animateSuccessLong 0.75s; }

.sa-icon.sa-success.animate::after {
  -webkit-animation: rotatePlaceholder 4.25s ease-in;
  animation: rotatePlaceholder 4.25s ease-in; }

@-webkit-keyframes animateErrorIcon {
  0% {
    transform: rotateX(100deg);
    -webkit-transform: rotateX(100deg);
    opacity: 0; }
  100% {
    transform: rotateX(0deg);
    -webkit-transform: rotateX(0deg);
    opacity: 1; } }

@keyframes animateErrorIcon {
  0% {
    transform: rotateX(100deg);
    -webkit-transform: rotateX(100deg);
    opacity: 0; }
  100% {
    transform: rotateX(0deg);
    -webkit-transform: rotateX(0deg);
    opacity: 1; } }

.animateErrorIcon {
  -webkit-animation: animateErrorIcon 0.5s;
  animation: animateErrorIcon 0.5s; }

@-webkit-keyframes animateXMark {
  0% {
    transform: scale(0.4);
    -webkit-transform: scale(0.4);
    margin-top: 26px;
    opacity: 0; }
  50% {
    transform: scale(0.4);
    -webkit-transform: scale(0.4);
    margin-top: 26px;
    opacity: 0; }
  80% {
    transform: scale(1.15);
    -webkit-transform: scale(1.15);
    margin-top: -6px; }
  100% {
    transform: scale(1);
    -webkit-transform: scale(1);
    margin-top: 0;
    opacity: 1; } }

@keyframes animateXMark {
  0% {
    transform: scale(0.4);
    -webkit-transform: scale(0.4);
    margin-top: 26px;
    opacity: 0; }
  50% {
    transform: scale(0.4);
    -webkit-transform: scale(0.4);
    margin-top: 26px;
    opacity: 0; }
  80% {
    transform: scale(1.15);
    -webkit-transform: scale(1.15);
    margin-top: -6px; }
  100% {
    transform: scale(1);
    -webkit-transform: scale(1);
    margin-top: 0;
    opacity: 1; } }

.animateXMark {
  -webkit-animation: animateXMark 0.5s;
  animation: animateXMark 0.5s; }

@-webkit-keyframes pulseWarning {
  0% {
    border-color: #F8D486; }
  100% {
    border-color: #F8BB86; } }

@keyframes pulseWarning {
  0% {
    border-color: #F8D486; }
  100% {
    border-color: #F8BB86; } }

.pulseWarning {
  -webkit-animation: pulseWarning 0.75s infinite alternate;
  animation: pulseWarning 0.75s infinite alternate; }

@-webkit-keyframes pulseWarningIns {
  0% {
    background-color: #F8D486; }
  100% {
    background-color: #F8BB86; } }

@keyframes pulseWarningIns {
  0% {
    background-color: #F8D486; }
  100% {
    background-color: #F8BB86; } }

.pulseWarningIns {
  -webkit-animation: pulseWarningIns 0.75s infinite alternate;
  animation: pulseWarningIns 0.75s infinite alternate; }

/* Internet Explorer 9 has some special quirks that are fixed here */
/* The icons are not animated. */
/* This file is automatically merged into sweet-alert.min.js through Gulp */
/* Error icon */
.sweet-alert .sa-icon.sa-error .sa-line.sa-left {
  -ms-transform: rotate(45deg) \9; }

.sweet-alert .sa-icon.sa-error .sa-line.sa-right {
  -ms-transform: rotate(-45deg) \9; }

/* Success icon */
.sweet-alert .sa-icon.sa-success {
  border-color: transparent\9; }

.sweet-alert .sa-icon.sa-success .sa-line.sa-tip {
  -ms-transform: rotate(45deg) \9; }

.sweet-alert .sa-icon.sa-success .sa-line.sa-long {
  -ms-transform: rotate(-45deg) \9; }

</style>  
  
  
  
  <style>
body {
    margin : 0;  
}



.outer-login {
    position: fixed ; display:table; top:0; left:0;  
    width: 100%; /* This could be ANY width */
    height: 100%; /* This could be ANY height */
   z-index:99999;  
 background: url('images/bg-popup.png'); overflow:auto; 
 
     overflow-y:scroll;
    overflow-x:hidden;
 
}


.inner-login {
    display: table-cell;
    vertical-align: top;
    text-align: center;  
}

.centered-login {
    display: inline-block;
    text-align: left; width:90%;  
   
 
 
}

 

</style>
  
  

			  
  <!-- Modal -->
  
 
 
<div id="sub_popup_page" style="display:none;z-index:99999;    ">

<div class="outer-login" >
   <div class="inner-login">
     <div class="centered-login"><center>
       <div id="load_form_main" class="login-box-body" style="padding:15px; margin-bottom:10px ; background-color:#FFFFFF;border: solid 0px #999999;box-shadow: 0 0 0px 0px #666666;border-radius: 0px; width:90%; display:nones; margin-top:50px; ">       <div class="modal-header">
          <button type="button" class="close"id="icon_close_popup"  >&times;</button>
          <h2 class="modal-title" id="topic_edit_sub" style="text-align:left">Message Management</h2>
        </div>
         
 
  <div id="show_data_page_sub" style="text-align:left; "> </div>
     
 
</div>

      
 
 

</div>
     
 
    </div>
   </div>
</div>
 
 </div>
 
<script>
 
 

 $("#icon_close_popup").click(function(){   
 
 
 $( "#sub_popup_page" ).hide();
 
  });
  
  
  /*
   $(".outer-login").click(function(){   
 
 
 $( "#sub_popup_page" ).hide();
 
  });
  
  
  */

</script>