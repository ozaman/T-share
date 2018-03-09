
<? if($_GET[op] == ""){?>

 <br />
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:22px;"  >
  <tr>
    <td>
 <style>
 .div-menu-palce{
	 padding:5px;   border-radius: 5px; border: 1px solid #ddd;background-color:#FFFFFF;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-top:-15px;
 	 
 }
 
  .div-menu-palce  a{ color:<?=$main_color?>;
 
 	 
 }
 
 
 
 </style>
<div class="div-menu-palce">
 
    
    <a id="?name=content&file=main" style="font-size:22px;" > หมวดหมู่ทั้งหมด</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a id="add_new_main" style="font-size:22px;" data-toggle="modal" data-target="#myModal_text"> <i class="fa  fa-plus-circle" style="width:30px; font-size:24px;"  ></i>&nbsp;เพิ่มประเภท</a> 
    
    </div>
    
    </td>
  </tr>
</table>

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
    
     <td width="120" align="center" bgcolor="#999999"><font color="#FFFFFF">คอมมิชชั่นบริษัท</font></td>
     
    
    <td width="60" align="center" bgcolor="#999999"><font color="#FFFFFF">คอมมิชชั่นแท็กซี่</font></td>
    </tr>  
  <?
  
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[project] = $db->select_query("SELECT * FROM product_option_percent  ORDER BY  id  ASC  ");
while($arr[project] = $db->fetch($res[project])){
 

			$bgcolor = ($i++ & 1) ? $bg1 : $bg2; 
 
?> 

 
 
     <tr  bgcolor='<?=$bgcolor?>'>
     <td height="30" align="center">
       

       <a  id="btn_menu_edit_type_shop_<? echo $arr[project][id];?>" data-toggle="modal" data-target="#myModal_text" onclick="openModalEdit('<? echo $arr[project][id];?>');"  >
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
	$("#btn_menu_type_shop_<? echo $arr[project][id];?>").click(function(){
			 
 $('#topic_edit').html('หมวดหมู่ > <? echo $arr[project][topic_en];?>');
			 
 
	  var url_page_type= "go.php?name=content/load&file=type_shopping_product&main=<? echo $arr[project][id];?>";
 
      $('#show_data_page').load(url_page_type);
	  
	  
	  
	  
	  
 
	   });
	   
	   
	      });
	   
	   </script>  
       
       
       
       
       
       <a   id="btn_menu_type_shop_<? echo $arr[project][id];?>" data-toggle="modal" data-target="#myModal_text"  > <i class="fa  fa-plus-circle" style="width:40px; font-size:30px; color:#1CBBB4"  ></i> </a></td>
     <td align="center">  
  <? echo $arr[project][name_en];?> 
     </td>
     <td align="center">
           
  <? echo $arr[project][name_th];?> 
           
     </td>
      <td align="center"><? echo $arr[project][name_cn];?></td>
     <td align="center"><? echo $arr[project][company_commission];?>%</td>
     <td align="center"><? echo $arr[project][taxi_commission];?>%</td>

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
<script>
	function openModalEdit(id){
		$('#topic_edit').text('แก้ไข ประเภทช้อปปิ้ง');
		var url = 'go.php?name=content/load&file=type_shopping&op=sub_edit&id='+id;
		$('#show_data_page').load(url);
	}
</script>
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
		$res[project] = $db->select_query("SELECT * FROM product_option_percent  WHERE id='".$_GET[id]."' ");
		$arr[project] = $db->fetch($res[project]);
 
?>
   
<FORM NAME="myform" id="myform"   enctype="multipart/form-data">
 
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
		          <tr>
		            <td width="120"><strong>ชื่อ EN : </strong></td>
		            <td><input name="name_en" type="text" class="form-control" id="name_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name_en];?>" />
		              </td>
		            </tr>
		          <tr>
		            <td><strong>ชื่อ TH :</strong></td>
                    <td><input name="name_th" type="text" class="form-control" id="name_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name_th];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>ชื่อ CN :</strong></td>
                 <td><input name="name_cn" type="text" class="form-control" id="name_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][name_cn];?>" /></td>
		            </tr>
  				   <tr>
		            <td><strong>คอมมิชชั่นบริษัท :</strong></td>
                 <td><input name="company_commission" type="text" class="form-control" id="company_commission" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][company_commission];?>" /></td>
		            </tr>
		            <tr>
		            <td><strong>คอมมิชชั่นแท็กซี่ :</strong></td>
                 <td><input name="taxi_commission" type="text" class="form-control" id="taxi_commission" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][taxi_commission];?>" /></td>
		            </tr> 
		            <tr>
		            <td><strong>Vat บริษัท :</strong></td>
                 <td><input name="company_vat" type="text" class="form-control" id="company_vat" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][company_vat];?>" /></td>
		            </tr>
		            <tr>
		            <td><strong>Vat แท็กซี่ :</strong></td>
                 <td><input name="company_vat" type="text" class="form-control" id="company_vat" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][company_vat];?>" /></td>
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
 
 
 
 
 
 
