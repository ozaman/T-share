
 <style>
 .div-menu-palce{
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
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_main where   id=".$_GET[main]."  ");
$arr[projecttype] = $db->fetch($res[projecttype]);
 
?>


   <script>
	 
   $("#add_new_sub").click(function(){
			 
 
			 
 $('#topic_edit').html('เพิ่มประเภทใหม่');
 
  $('#show_data_page').html('');
 
			 
  var url_page_type_add= "empty_style.php?name=content/load&file=type&op=sub_add&main=<?=$_GET[main];?>";
 
 $('#show_data_page').load(url_page_type_add);
 
 
	   });
	   
 
	   
	   </script>
       
       
       
       
      <script>
	 
  $('#topic_edit').html('หมวดหมู่ > <? echo $arr[projecttype][topic_th];?>');
 
	     $("#all_sub").click(function(){
			 
 
			 
 $('#topic_edit').html('หมวดหมู่ > <? echo $arr[projecttype][topic_th];?>');
			 
			 
  var url_page_type_all= "empty_style.php?name=content/load&file=type&main=<?=$_GET[main];?>";
 
  $('#show_data_page').load(url_page_type_all);
 
 
 
	   
	      });
	   
	   </script>
  
 
 
 
 
     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:22px;"  class="div-menu-palce" >
      <tr>
        <td>      <a style="font-size:22px; color:#000000" id="all_sub"  > <i class="fa <? echo $arr[projecttype][logo_code];?>" style="width:24px; font-size:22px; color:#666666"  ></i><? echo $arr[projecttype][topic_th];?>ทั้งหมด </a>    &nbsp; |&nbsp;  
        
        
        
        
        
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a   id="add_new_sub"style="font-size:22px;"> <i class="fa  fa-plus-circle" style="width:30px; font-size:24px;"  ></i>&nbsp;เพิ่มประเภทใหม่</a>  
 
        
        
        </td>
      </tr>
    </table>
 
