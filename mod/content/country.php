 
 
 </script>  



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

 

<TABLE cellSpacing=0 cellPadding=0 width=100% border=0>
      <TBODY>
        <TR>
          <TD width="100%" vAlign=top><!-- Admin -->
            <TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					
				</TR>
				<TR>
					<TD valign="top">  <?
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
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="topic_menu">
                        <tr>
                          <td><a   id="btn_menu_new_<? echo $_GET[type];?>"><img src="images/admin/book.png"  border="0" align="absmiddle" /> Add New Message</a>
						  
						  
						 
	   
	                        <script>
	   	
 $("#btn_menu_new_<? echo $_GET[type];?>").click(function(){

	  var url_page_type<? echo $_GET[type];?> = "empty_style.php?name=admin/chat/admin/message/load&file=all&op=transferproduct_add&type_main=<? echo $_GET[type_main];?>&type_sub=<? echo $_GET[type_sub];?>";
	 
      $('#show_data_page').load(url_page_type<? echo $_GET[type];?>);
 
	   });
	   
	   </script>  
						  
						  </td>
                        </tr>
                      </table>   
                      <br>
                      <form action="" name="myform_main"  id="myform_main" method="post">
   <table width="100%" cellspacing="2" cellpadding="1" >
    <tr bgcolor="#990000" height=25>
     <td width="60" align="center" bgcolor="#999999"><CENTER>
            <font color="#FFFFFF">Edit</font>     
     </CENTER></td>
     
   
     <td width="60" align="center" bgcolor="#999999">&nbsp;</td>
     
   <td width="60" align="center" bgcolor="#999999">&nbsp;</td>
     <td width="400" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">EN</font></td>
     
   
     <td width="400" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">TH</font></td>
     <td width="400" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">CN</font></td>
     
  <td align="center" bgcolor="#999999"><font color="#FFFFFF">Type</font></td>
    <td align="center" bgcolor="#999999"><font color="#FFFFFF">Type</font></td>
    <td width="60" align="center" bgcolor="#999999"><font color="#FFFFFF">Sort</font></td>
    </tr>  
  <?
 
 
$res[project] = $db->select_query("SELECT * FROM web_country  where status=1 ORDER BY  sort_country  DESC LIMIT $goto, $limit ");
while($arr[project] = $db->fetch($res[project])){
 
	 
	//$res[com] = $db->select_query("SELECT * FROM message_data_type WHERE id='".$arr[project][type]."' ");
	///$arr[type] = $db->fetch($res[com]);
 
echo $arr[type][type_main];
echo "<br>";

////
 
 
 		$db->add_db('product_price_list',array(
		
		"countrys"=>$arr[project][id], 
		"country_name"=>$arr[project][name_en], 
		 "sort_country"=>$arr[project][sort_country], 
		"product_id"=>2, 
		"price_list_id"=>4, 
 		"price_park"=>"200", 
		"price_person"=>"0"
 
		));
 

/////



 
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
			$db->update_db("web_country",array(
	 
		"type_main"=>$arr[type][type_main]
 
		)," id=".$arr[project][id]." ");
	
	 
 
 


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
        <a href="?name=content&file=country&op=transferproduct_edit&id=<? echo $arr[project][id];?>" id="btn_sssmenu_edit_<? echo $arr[project][id];?>" ><img src="images/admin/edit.png" border="0" alt="Edit" ></a> 
 
		
       </td> 
         <td align="center">&nbsp;</td>
         <td align="center">
 
         <img src="images/shop_logo/<? echo $arr[project][logo_code];?>.png" border="0" alt="Edit" >  
 
         </td>
         <td align="center">  
	     <a  onclick="responsiveVoice.speak(' <? echo $arr[project][name_en];?>', 'UK English Female', {rate: 0.8});" > <? echo $arr[project][name_en];?></a></td>
         <td align="center">
	     
	 <a  onclick="responsiveVoice.speak(' <? echo $arr[project][name_th];?>', 'Thai Female', {rate: 0.8});" > <? echo $arr[project][name_th];?></a>  
	     
	   </td>
         <td align="center">
	     
	    <a  onclick="responsiveVoice.speak('<? echo $arr[project][name_cn];?>', 'Chinese Female', {rate: 0.8});" ><? echo $arr[project][name_cn];?></a>  
	     
	   </td>
         <td align="center"><? echo $arr[type][name_en];?></td>
   <td align="center"><? echo $arr[type][name_en];?></td>
 <td align="center">    
   
   
   <input type="hidden" name="id[]" value="<? echo $arr[project][id];?>"></td>
 </tr>
	  <TR>
		  <TD colspan="24" height="1" class="dotline"></TD>
	  </TR>
  <?
 } 
?>
   </table>
   <div align="right">
   
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
		$db->add_db('web_country',array(
			"topic_en"=>"$_POST[name_en]",
			"topic_th"=>"$_POST[name_th]",
			"topic_cn"=>"$_POST[name_cn]",
			
 
 
 
		));
		
		
 
 
		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>เพิ่มข้อความสำเร็จ</B></FONT><BR><BR>";
		////$ProcessOutput .= "<A HREF=\"?name=content&file=country\"><B>Back to Car Model </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
//////echo "<meta http-equiv=refresh content=1;URL=?name=content&file=country>";
//echo "<meta http-equiv=refresh content=0;URL=?name=content&file=country&op=transferproduct_add>";
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
  <FORM NAME="myform"   id="myform"  METHOD=POST ACTION="?name=content&file=country&op=transferproduct_add&action=add" enctype="multipart/form-data">
  
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
		            <td><strong>EN : </strong></td>
		            <td><input name="topic_en2" type="text" class="inputform" id="topic_en2" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name_en];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>TH :</strong></td>
		            <td><input name="topic_th2" type="text" class="inputform" id="topic_th2" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name_th];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>CN :</strong></td>
		            <td><input name="topic_cn2" type="text" class="inputform" id="topic_cn2" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name_cn];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>CODE:</strong></td>
		            <td><input name="logo_code2" type="text" class="inputform" id="logo_code2" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][logo_code];?>" /></td>
		            </tr>
		          <tr>
                    <td><strong>CN :</strong></td>
		            <td><input name="topic_cn" type="text" class="inputform" id="topic_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name_cn];?>" /> </td>
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
else if($_GET[op] == "transferproduct_edit" AND $_GET[action] == "edit"){
	//////////////////////////////////////////// ó Database Edit
	if(1==1){
 
				//ӡ䢢ŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		
		$db->update_db('web_country',array(
			"name_en"=>"$_POST[name_en]",
			"name_th"=>"$_POST[name_th]",
			"name_cn"=>"$_POST[name_cn]",
			
			"sort_country"=>"$_POST[sort_country]",
			
 
 
			
 
		)," id=$_GET[id] ");
	 
		
		
		
		
		 
 

		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Edit  complete</B></FONT><BR><BR>";
	///	$ProcessOutput .= "<A HREF=\"?name=admin/product&file=capacity\"><B>Back to Car Model</B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	 echo "<meta http-equiv=refresh content=0;URL=?name=content&file=country>";
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
		$res[project] = $db->select_query("SELECT * FROM web_country  WHERE id='".$_GET[id]."' ");
		$arr[project] = $db->fetch($res[project]);
		
 
 
?>
   
<FORM NAME="myform" id="myform" METHOD=POST ACTION="?name=content&file=country&op=transferproduct_edit&action=edit&id=<?=$_GET[id];?>" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
		          <tr>
		            <td><strong>EN : </strong></td>
		            <td><input name="name_en" type="text" class="inputform" id="name_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name_en];?>" />
		              </td>
		            </tr>
		          <tr>
                    <td><strong>TH :</strong></td>
                    <td><input name="name_th" type="text" class="inputform" id="name_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name_th];?>" /></td>
		            </tr>
		          <tr>
                    <td><strong>CN :</strong></td>
                    <td><input name="name_cn" type="text" class="inputform" id="name_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name_cn];?>" />
                    </td>
		            </tr>
		          <tr>
		            <td><strong>SORT:</strong></td>
		            <td><input name="sort_country" type="text" class="inputform" id="sort_country" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][sort_country];?>" /></td>
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
			$db->update_db("web_country",array(
	 
			"sort_number"=>"$value"
 

		)," id=$id ");
			
		}
		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Update complete</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=content&file=country\"><B>Back to Car Model </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
		
 
////echo "<meta http-equiv=refresh content=0;URL=?name=content&file=country>";
			
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
		$ProcessOutput .= "<A HREF=\"?name=content&file=country\"><B>Back to Car Model </B></A>";
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
		$db->del('web_country'," id='".$_GET[id]."' "); 
	 
		$db->closedb ();

		$ProcessOutput .= "<BR><BR>";
		//$ProcessOutput .= "<CENTER><A HREF=\"?name=admin/product&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Delete complete</B></FONT><BR><BR>";
//echo "<meta http-equiv=refresh content=0;URL=?name=content&file=country>";
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
  <FORM NAME="myform"   id="myform"  METHOD=POST ACTION="?name=content&file=country&op=transferproduct_add&action=add" enctype="multipart/form-data">
  
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
	   echo ">".$arr[category][name_en]." </option>";
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
                   $res[category] = $db->select_query("SELECT * FROM  web_country ORDER BY type,topic_en ");
while ($arr[category] = $db->fetch($res[category])){
  
  
	   echo "<option value=\"".$arr[category][id]."\"";
	   if($arr[category][id] == $_GET[type55]){echo " Selected";}
	   echo ">".$arr[category][name_en]." </option>";
	   }
                      $db->closedb ();
                      ?>
                    </select></td>
          </tr>
		          <tr>
                    <td><strong>EN : </strong></td>
                    <td><input name="topic_en" type="text" class="inputform" id="topic_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name_en];?>" />
                    </td>
		            </tr>
		          <tr>
                    <td><strong>TH :</strong></td>
		            <td><input name="topic_th" type="text" class="inputform" id="topic_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name_th];?>" /></td>
		            </tr>
		          <tr>
                    <td><strong>CN :</strong></td>
		            <td><input name="topic_cn" type="text" class="inputform" id="topic_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name_cn];?>" /> </td>
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








<div  id="div_send_data_msg"></div>