<script   src="java.js"></script>



<script type="text/javascript">
function sum(){
var alphaExp = /[\@\#\%\/\\\^\&\*\(\)\_\+\.]/;
if (document.getElementById("paysms").value.match(alphaExp))
{
alert("͹حҵͧ¾ɤ");
document.getElementById('paysms').value="";
return false ;
}
if(document.getElementById('paysms').value == "") {
document.getElementById('result').value = parseInt(document.getElementById('allsms').value)  ;
return false ;
}

else if(document.getElementById('paysms').value > 0) {
document.getElementById('result').value = parseInt(document.getElementById('allsms').value) + parseInt(document.getElementById('paysms').value)   ;
return false ;
}

}
function  number() {
		if(document.getElementById('result').value < 0) {
		alert("ӹǹ SMS ͧ͹§ سкبӹǹ") ;
document.getElementById('paysms').value="";
return false ;

}
		}
		 
</script>

 </script>
 
 <br>





 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:22px;"  >
 <tr>
 <td>
 
 <a href="?name=content&file=main" style="font-size:22px;" >  หมวดหมู่ทั้งหมด</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?name=content&file=main&op=transferproduct_add" style="font-size:22px;">  เพิ่มหมวดหมู่</a>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 
 
 
 
 
 
 
 <a href="?name=content&file=sub" style="font-size:22px;" >  ประเภททั้งหมด</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?name=content&file=sub&op=transferproduct_add" style="font-size:22px;">  เพิ่มประเภท</a></td>
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
                   
  <form action="" name="myform_main"  id="myform_main" method="post">
   <table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" cellspacing="2" cellpadding="1" >
    <tr bgcolor="#990000" height=25>
     <td width="50" align="center" bgcolor="#999999"><CENTER>
            <font color="#FFFFFF">แก้ไข</font>     
     </CENTER></td>
     <td width="50" align="center" bgcolor="#999999"><font color="#FFFFFF">ลบ</font></td>
     
   
     
     
    
     <td width="300" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">EN</font></td>
     
   
     <td width="400" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">TH</font></td>
     <td width="400" align="center" bgcolor="#999999"><font color="#FFFFFF">CN</font></td>
     <td align="center" bgcolor="#999999"><font color="#FFFFFF">Type</font></td>
    
    <td width="60" align="center" bgcolor="#999999"><font color="#FFFFFF">Sort</font></td>
    </tr>  
  <?
 
$res[project] = $db->select_query("SELECT * FROM shopping_product_sub  ORDER BY  id  ASC LIMIT $goto, $limit ");
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
 echo "<tr bgcolor='$bgcolor'>\n";
?> 

 
 
     <td height="30" align="center">
     <a href="?name=content&file=sub&op=transferproduct_edit&id=<? echo $arr[project][id];?>" id="btn_sssmenu_edit_<? echo $arr[project][id];?>" >
       <i class="fa  fa-edit" style="width:40px; font-size:30px; color:#333333"  ></i>
       
       </a> 
     
     
     
   </td>
     <td height="30" align="center"><a href="javascript:Confirm('?name=content&file=sub&op=transferproduct_del&id=<? echo $arr[project][id];?>','คุณมั่นใจในการลบ?');"><i class="fa  fa-trash" style="width:40px; font-size:30px; color:#333333"  ></i> 
 
       
       </a></td> 
         <td align="center">  
           <a  onclick="responsiveVoice.speak(' <? echo $arr[project][topic_en];?>', 'UK English Female', {rate: 0.8});" > <? echo $arr[project][topic_en];?></a></td>
         <td align="center">
           
           <a  onclick="responsiveVoice.speak(' <? echo $arr[project][topic_th];?>', 'Thai Female', {rate: 0.8});" > <? echo $arr[project][topic_th];?></a>  
           
         </td>
         <td align="center"><a  onclick="responsiveVoice.speak(' <? echo $arr[project][topic_th];?>', 'Thai Female', {rate: 0.8});" > <? echo $arr[project][topic_cn];?></a></td>
         <td align="center"><? echo $arr[type][topic_en];?></td>
   <td align="center">    
     
     
     <input type="hidden" name="id[]" value="<? echo $arr[project][id];?>"></td>
 </tr>
	  <TR>
		  <TD colspan="25" height="1" class="dotline"></TD>
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
	   
	   
	  var url_pagesub<? echo $_GET[type];?> = "empty_style.php?name=admin/chat/admin/message/load&file=listsub&maintype=<? echo $_GET[type];?>";
	 

	 
      $('#td_load_sub<? echo $_GET[type];?>').load(url_pagesub<? echo $_GET[type];?>);
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
else if($_GET[op] == "transferproduct_add" AND $_GET[action] == "add"){
	//////////////////////////////////////////// ó Database
	if(1==1){
		//include("includes/class.resizepic.php");
 
	
		//ӡŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   
////////////////
		$db->add_db('shopping_product_sub',array(
 
			
			"topic_th"=>"$_POST[topic_th]",
			
			"topic_cn"=>"$_POST[topic_cn]",
			
			"main"=>"$_POST[main]",
			
			//"type"=>"$_POST[type]",
			
		"topic_en"=>"$_POST[topic_en]",
			
 
 
 
 
		));
		
		
 
 
		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>เพิ่มข้อความสำเร็จ</B></FONT><BR><BR>";
		////$ProcessOutput .= "<A HREF=\"?name=content&file=sub\"><B>Back to Car Model </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
 echo "<meta http-equiv=refresh content=0;URL=?name=content&file=sub>";
//echo "<meta http-equiv=refresh content=0;URL=?name=content&file=sub&op=transferproduct_add>";
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
  <FORM NAME="myform"   id="myform"  METHOD=POST ACTION="?name=content&file=sub&op=transferproduct_add&action=add" enctype="multipart/form-data">
  
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
		          <tr>
		            <td width="150"><strong>Type : </strong></td>
		            <td><select name="main"   id="main"    style="font-size:14px; padding-bottom: 1px; padding: 5px;  background-color:#FFFDE9; height:30px; width:500px;" chosen width="'100%'">
		              <?  
                      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                   $res[category] = $db->select_query("SELECT * FROM  shopping_product_main ORDER BY  id ");
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
		            <td><input name="topic_en" type="text" class="inputform" id="topic_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_en];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>TH :</strong></td>
		            <td><input name="topic_th" type="text" class="inputform" id="topic_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_th];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>CN :</strong></td>
		            <td><input name="topic_cn" type="text" class="inputform" id="topic_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_cn];?>" /></td>
		            </tr>
          <tr>
            <td>&nbsp;</td>  
            <td>       
              <button type="submit" class="btn btn-primary"   id="submit_data" >
                <span id="txt_btn_save">
                  บันทึกข้อมูล
                  </span>
                </button>
              
              <script>
			     $("#submit_data").click(function(){
				 
				 
			  $.post('empty_style.php?name=admin/chat/admin/message/load&file=all&op=transferproduct_add&action=add',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
  	  var url_page<? echo $_GET[type];?> = "empty_style.php?name=admin/chat/admin/message/load&file=all";
	  url_page<? echo $_GET[type];?>=url_page<? echo $_GET[type];?>+"&type_sub="+document.getElementById('type').value;
	 
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
		
		$db->update_db('shopping_product_sub',array(
 
			"topic_cn"=>"$_POST[topic_cn]",
			"topic_th"=>"$_POST[topic_th]",
			"main"=>"$_POST[main]",
			
		"topic_en"=>"$_POST[topic_en]"
 
 
 
			
 
		)," id=$_GET[id] ");
	 
		
		
		
		
		 
 

		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Edit  complete</B></FONT><BR><BR>";
	///	$ProcessOutput .= "<A HREF=\"?name=admin/product&file=capacity\"><B>Back to Car Model</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	 echo "<meta http-equiv=refresh content=0;URL=?name=content&file=sub>";
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
		$res[project] = $db->select_query("SELECT * FROM shopping_product_sub  WHERE id='".$_GET[id]."' ");
		$arr[project] = $db->fetch($res[project]);
		
 
 
?>
   
<FORM NAME="myform" id="myform" METHOD=POST ACTION="?name=content&file=sub&op=transferproduct_edit&action=edit&id=<?=$_GET[id];?>" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td><strong>Type : </strong></td>
            <td><select name="main"   id="main"    style="font-size:14px; padding-bottom: 1px; padding: 5px;  background-color:#FFFDE9; height:30px; width:500px;" chosen width="'100%'">
              <?  
                      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                   $res[category] = $db->select_query("SELECT * FROM  shopping_product_main ORDER BY  id ");
while ($arr[category] = $db->fetch($res[category])){
  
  
	   echo "<option value=\"".$arr[category][id]."\"";
	   if($arr[category][id] == $arr[project][main]){echo " Selected";}
	   echo ">".$arr[category][topic_en]." </option>";
	   }
                      $db->closedb ();
                      ?>
            </select></td>
          </tr>
		          <tr>
		            <td><strong>EN : </strong></td>
		            <td><input name="topic_en" type="text" class="inputform" id="topic_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_en];?>" />
		              </td>
		            </tr>
		          <tr>
                    <td><strong>TH :</strong></td>
                    <td><input name="topic_th" type="text" class="inputform" id="topic_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_th];?>" /></td>
		            </tr>
		          <tr>
                    <td><strong>CN :</strong></td>
                    <td><input name="topic_cn" type="text" class="inputform" id="topic_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_cn];?>" />
                    </td>
		            </tr>
  
        <tr>
          <td width="150">&nbsp;</td>
          <td><button type="submit" class="btn btn-primary"   id="submit_data" > <span id="txt_btn_save"> บันทึกข้อมูล </span> </button>
            <script>
			     $("#submit_data").click(function(){
				 
				 
			  $.post('empty_style.php?name=admin/chat/admin/message/load&file=all&op=transferproduct_edit&action=edit&id=<?=$_GET[id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
  	  var url_page<?=$_GET[id];?> = "empty_style.php?name=admin/chat/admin/message/load&file=all";
	  url_page<?=$_GET[id];?>=url_page<?=$_GET[id];?>+"&type_sub="+document.getElementById('type').value;
	 
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
			$db->update_db("shopping_product_sub",array(
	 
			"sort_number"=>"$value"
 

		)," id=$id ");
			
		}
		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Update complete</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=content&file=sub\"><B>Back to Car Model </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
		
 
////echo "<meta http-equiv=refresh content=0;URL=?name=content&file=sub>";
			
		/*
			$res[projectsub] = $db->select_query("SELECT * FROM ".TB_project." WHERE id='".$value."' ");
			$arr[projectsub] = $db->fetch($res[projectsub]);
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
		$ProcessOutput .= "<A HREF=\"?name=content&file=sub\"><B>Back to Car Model </B></A>";
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
		$db->del('shopping_product_sub'," id='".$_GET[id]."' "); 
	 
		$db->closedb ();

		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Delete complete</B></FONT><BR><BR>";
 echo "<meta http-equiv=refresh content=0;URL=?name=content&file=sub>";
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


$res[projecttypesub] = $db->select_query("SELECT * FROM message_data_type_sub where   id=".$_GET[type]."  ");
$arr[projecttypesub] = $db->fetch($res[projecttypesub]);
	
 
	///echo $_GET[type_main];
	
?>
  <FORM NAME="myform"   id="myform"  METHOD=POST ACTION="?name=content&file=sub&op=transferproduct_add&action=add" enctype="multipart/form-data">
  
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
		          <tr>
                    <td width="150"><strong>Main Type : </strong></td>
		            <td style="font-size:18px; text-transform: capitalize ">
					
					<?=$arr[projecttype][from_part]?>&nbsp;to <?=$arr[projecttype][to_part]?>
					
					<input name="type_main" type="hidden" class="inputform" id="type_main" style="width:500px; background:#FFFFFF" value="<? echo $_GET[type_main];?>" /> </td>
		            </tr>
		          <tr>
                    <td><strong>Sub Type : </strong></td>
                    <td>
					 
					
					<select name="type"   id="type"    style="font-size:18px; padding-bottom: 1px; padding: 5px;  background-color:#FFFDE9; height:40px; width:500px;" chosen width="'100%'">
                        <?  
                      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                   $res[category] = $db->select_query("SELECT * FROM  message_data_type_sub where id=".$_GET[type]."  ORDER BY id asc");
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
                   $res[category] = $db->select_query("SELECT * FROM  shopping_product_sub ORDER BY type,topic_en ");
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
                    <td><input name="topic_en" type="text" class="inputform" id="topic_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_en];?>" />
                    </td>
		            </tr>
		          <tr>
                    <td><strong>TH :</strong></td>
		            <td><input name="topic_th" type="text" class="inputform" id="topic_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_th];?>" /></td>
		            </tr>
		          <tr>
                    <td><strong>CN :</strong></td>
		            <td><input name="topic_cn" type="text" class="inputform" id="topic_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_cn];?>" /> </td>
		          </tr>
          <tr>
            <td>&nbsp;</td>  
            <td>       
        <button type="button" class="btn btn-primary"   id="submit_data" >
          <span id="txt_btn_save">
           บันทึกข้อมูล
          </span>
        </button>
  
			  <script>
			     $("#submit_data").click(function(){
				 
				 
			  $.post('empty_style.php?name=admin/chat/admin/message/load&file=all&op=transferproduct_add&action=add',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
  	  var url_page<? echo $_GET[type];?> = "empty_style.php?name=admin/chat/admin/message/load&file=all";
	  url_page<? echo $_GET[type];?>=url_page<? echo $_GET[type];?>+"&type_sub="+document.getElementById('type').value;
	 
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
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_sub where   id='".$_GET[id]."'  ");
$arr[projecttype] = $db->fetch($res[projecttype]);

 
 
	///echo $_GET[type_main];
	
?>
  <FORM NAME="myform"   id="myform"  METHOD=POST ACTION="?name=content&file=sub&op=add_pic_form&action=add&id=<?=$_GET[id]?>" enctype="multipart/form-data">
  
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
                    <td><input name="name" type="text" class="inputform" id="name" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name];?>" />
                    </td>
		            </tr>
		          <tr>
                    <td><strong>เลือกไฟล์ :</strong></td>
		            <td><input type="file" name="file_upload" onpropertychange="view01.src=FILE.value;" style="width=250;"> </td>
		          </tr>
          <tr>
            <td>&nbsp;</td>  
            <td>       
        <button type="submit" class="btn btn-primary"   id="submit_data" >
          <span id="txt_btn_save">
           บันทึกข้อมูล
          </span>
        </button>
  
			  <script>
			     $("#submit_data").click(function(){
				 
				 
			  $.post('empty_style.php?name=admin/chat/admin/message/load&file=all&op=transferproduct_add&action=add',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
  	  var url_page<? echo $_GET[type];?> = "empty_style.php?name=admin/chat/admin/message/load&file=all";
	  url_page<? echo $_GET[type];?>=url_page<? echo $_GET[type];?>+"&type_sub="+document.getElementById('type').value;
	 
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
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_sub where   id='".$_GET[id]."'  ");
$arr[projecttype] = $db->fetch($res[projecttype]);

*/


$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_gallery where   id='".$_GET[id]."'  ");
$arr[projecttype] = $db->fetch($res[projecttype]);

 
 
	///echo $_GET[type_main];
	
?>
  <FORM NAME="myform"   id="myform"  METHOD=POST ACTION="?name=content&file=sub&op=add_pic_form&action=add&id=<?=$_GET[id]?>" enctype="multipart/form-data">
  
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
                    <td><input name="name" type="text" class="inputform" id="name" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name];?>" />
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
        <button type="submit" class="btn btn-primary"   id="submit_data" >
          <span id="txt_btn_save">
           บันทึกข้อมูล
          </span>
        </button>
  
			  <script>
			     $("#submit_data").click(function(){
				 
				 
			  $.post('empty_style.php?name=admin/chat/admin/message/load&file=all&op=transferproduct_add&action=add',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
  	  var url_page<? echo $_GET[type];?> = "empty_style.php?name=admin/chat/admin/message/load&file=all";
	  url_page<? echo $_GET[type];?>=url_page<? echo $_GET[type];?>+"&type_sub="+document.getElementById('type').value;
	 
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
 echo "<meta http-equiv=refresh content=0;URL=?name=content&file=sub>";
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
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_sub where   id='".$_GET[id]."'  ");
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
 echo "<meta http-equiv=refresh content=0;URL=?name=content&file=sub>";
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