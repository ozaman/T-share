 <style>
 .div-menu-palce{
	 padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#FFFFFF;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-top:-15px;
 	 
 }
 
 
 .div-menu-contact{
	 padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#FFFFFF;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-top:-15px;
 	 
 }
 
 
 a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
  


<?

/*
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_sub where   id=".$_GET[main]."  ");
$arr[projecttype] = $db->fetch($res[projecttype]);


*/

 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projectmain] = $db->select_query("SELECT * FROM shopping_product_main where   id=".$_GET[main]."  ");
$arr[projectmain] = $db->fetch($res[projectmain]);
 
 
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projectsub] = $db->select_query("SELECT * FROM shopping_product_sub where   id=".$_GET[sub]."  ");
$arr[projectsub] = $db->fetch($res[projectsub]);



  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[project] = $db->select_query("SELECT * FROM shopping_product where   id=".$_GET[contact]."  ");
$arr[project] = $db->fetch($res[project]);
 
?>


   <script>
	 
   $("#add_new_contact").click(function(){
			 
 
			 
 $('#topic_edit').html('เพิ่มผู้ติดต่อใหม่ > <? echo $arr[project][topic_en];?>');
 
  $('#show_data_page').html('');
 
			 
  var url_page_type_add= "empty_style.php?name=content/load&file=contact&op=sub_add&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>&contact=<?=$_GET[contact];?>";
 
 $('#show_data_page').load(url_page_type_add);
 
 
	   });
	   
 
	   
	   </script>
       
       
       
       
      <script>
	 
 
 
 $("#all_type").click(function(){
			 
  
			 
 $('#topic_edit').html('ประเภท > <? echo $arr[projectsub][topic_th];?>');
			 
			 
  var url_page_type_all= "empty_style.php?name=content/load&file=place&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>";
 
  $('#show_data_page').load(url_page_type_all);
 
	   
	      });
	   
	   </script>   
      <script>
	 
 
 
	     $("#all_sub").click(function(){
			 
 
			 
 $('#topic_edit').html('หมวดหมู่ > <? echo $arr[projectmain][topic_en];?>');
			 
			 
  var url_page_type_all= "empty_style.php?name=content/load&file=type&main=<?=$_GET[main];?>";
 
  $('#show_data_page').load(url_page_type_all);
 
 
 
	   
	      });
	   
	   </script>
       
       
       
                                      <script>
	 
 
 $("#all_contact").click(function(){
 
			 
 $('#topic_edit').html('ผู้ติดต่อ > <? echo $arr[project][topic_en];?>');
			 
  var url_page_type= "go.php?name=content/load&file=contact&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>&contact=<?=$_GET[contact];?>";
 
  $('#show_data_page').load(url_page_type);
 
 
	   });
	   
 ///
 
 
 $("#add_type_contact").click(function(){
			 
 
			 
 $('#topic_edit').html('เพิ่มตำแหน่งผู้ติดต่อ');
 
  $('#show_data_page').html('');
 
			 
  var url_page_type_add= "empty_style.php?name=content/load&file=contact&op=sub_add_type&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>&contact=<?=$_GET[contact];?>";
 
 $('#show_data_page').load(url_page_type_add);
 
 
	   });
	   
	   $("#add_type_contact_add").click(function(){
			 
 
			 
 $('#topic_edit').html('เพิ่มผู้ดูแล');
 
  $('#show_data_page').html('');
 
			 
  var url_page_type_add= "empty_style.php?name=content/load&file=contact&op=sub_add_type_admin&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>&contact=<?=$_GET[contact];?>";
 
 $('#show_data_page').load(url_page_type_add);
 
 
	   });
	   
	   </script>
       
       
       
       
 
     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:22px;"  class="div-menu-palce" >
      <tr>
        <td>
 
        
        
        
        
        
        
      <a style="font-size:22px; color:#000000" id="all_sub"  > <i class="fa <? echo $arr[projectmain][logo_code];?>" style="width:24px; font-size:22px; color:#666666"  ></i><? echo $arr[projectmain][topic_th];?>ทั้งหมด </a>    &nbsp; |&nbsp;  
        
        
        
        
        <a style="font-size:22px;" id="all_type" ><? echo $arr[projectsub][topic_th];?>ทั้งหมด</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        
        
        
        <a style="font-size:22px;" id="all_contact" ><i class="fa  fa-user" style="width:30px; font-size:24px;"  ></i>ผู้ติดต่อทั้งหมด</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <a   id="add_new_contact"style="font-size:22px;"> <i class="fa  fa-plus-circle" style="width:30px; font-size:24px;"  ></i>เพิ่มผู้ติดต่อใหม่</a>  
 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a   id="add_type_contact" style="font-size:22px; color:#000000  "> <i class="fa  fa-plus-circle" style="width:30px; font-size:24px;"  ></i>&nbsp;เพิ่มตำแหน่งผู้ติดต่อ</a>  
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a   id="add_type_contact_add" style="font-size:22px; color:#000000"> <i class="fa  fa-plus-circle" style="width:30px; font-size:24px;"  ></i>&nbsp;เพิ่มผู้ดูแล</a>  
        
        </td>
      </tr>
    </table>
 
