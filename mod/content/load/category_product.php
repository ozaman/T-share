


<TABLE cellSpacing=0 cellPadding=0 width=100% border=0>
 <TBODY>
        <TR>
          <TD width="100%" vAlign=top><!-- Admin -->
            <TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					
				</TR>
				<TR>
					<TD valign="top"> 
<?
 require_once("css/maincss.php")	;
if($_GET[op] == ""){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
 
?>


<div id="save_data_open" style="display:none"> </div>


<input name="price_park_driver" type="hidden" class="sload_park_driver" id="main_check_open" style="width:60px; background:#FFFFFF" value="<? echo $arr[shop][price_park_driver];?>" />
                   
  <form action="" name="myform_main"  id="myform_main" method="post">
  
<?
 include("mod/content/menu/place.php");
?> 
    
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" cellspacing="2" cellpadding="1" >
    <tr bgcolor="#990000" height=25>
     <td width="50" align="center" bgcolor="#999999"><CENTER>
            <font color="#FFFFFF">แก้ไข</font>     
     </CENTER></td>
    <!-- <td width="50" align="center" bgcolor="#999999"><font color="#FFFFFF">ลบ</font></td>-->
      
     
     <td width="200" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">EN</font></td>
     
   
     <td width="200" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">TH</font></td>
     <td width="200" align="center" bgcolor="#999999"><font color="#FFFFFF">CN</font></td>
     <td width="200" align="center" bgcolor="#999999"><font color="#FFFFFF">ตั้งค่าสินค้า</font></td>
    
    </tr>  
  <?
 
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[place] = $db->select_query("SELECT * FROM shopping_product   WHERE  sub='".$_GET[sub]."' ORDER BY  id ASC  ");
while($arr[place] = $db->fetch($res[place])){
	 
 $res[com] = $db->select_query("SELECT * FROM shopping_product_main WHERE id='".$_GET[main]."' ");
 $arr[main] = $db->fetch($res[com]);
 
			$bgcolor = ($i++ & 1) ? $bg1 : $bg2; 
 
 $count_set = $db->num_rows("product_option_percent","id","product_id = '".$arr[place][id]."' "); 
 
?> 


     <tr  bgcolor='<?=$bgcolor?>'>
     <td height="30" align="center">
       
        <script>
	 
 $("#btn_menu_edit_place_<? echo $arr[place][id];?>").click(function(){
 
			 
 $('#topic_edit').html('แก้ไขสินค้า <? echo $arr[place][topic_en];?>:<? echo $arr[project][topic_th];?>');
			 
  var url_page_type_<? echo $arr[place][id];?>= "go.php?name=content/load&file=category_product&op=sub_edit&id=<? echo $arr[place][id];?>&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
 
  $('#show_data_page').load(url_page_type_<? echo $arr[place][id];?>);
 
 
	   });
	   
 
	   </script>
 
 
       <? echo $arr[sub][main];?>
       
     <a  id="btn_menu_edit_place_<? echo $arr[place][id];?>" >
       <i class="fa  fa-edit" style="width:40px; font-size:30px; color:#666666"  ></i>
       
       </a> 

     
   </td>
   
     <td align="center">  
       <? echo $arr[place][topic_en];?></td>
     <td align="center">
           
           <? echo $arr[place][topic_th];?>
           
         </td>
     <td align="center"> 
     <? echo $arr[place][topic_cn];?> 
     </td>
      <td width="" align="center">
      
  <style>
      	.div-menu-price-plan {
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #dadada;
    background-color: #FFFFFF;
    margin-bottom: 5px;
    box-shadow: 0px 0px 0px #DADADA;
    margin-top: 5px;
}
      </style>
 <? if($count_set<=0){
 	echo '<span style="color:#ff0000"><strong>ไม่ได้ตั้งค่า</strong></span>';
 }else{ ?>
 <div class="div-menu-price-plan" style="margin: 10px;">
 <table  width="100%" border="0" class="table" >
		<thead>
			<td></td>
			<td  align="center"><strong>คอมมิชชั่นบริษัท</strong></td>
			<td  align="center"><strong>คอมมิชชั่นแท็กซี่</strong></td>
			<td  align="center"><strong>Vat บริษัท</strong></td>
			<td  align="center"><strong>Vat แท็กซี่</strong></td>
		</thead>
<?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[type_list] = $db->select_query("SELECT * FROM product_option_percent  WHERE  product_id = '".$arr[place][id]."' group by type_id ORDER BY  id ASC  ");
while($arr[type_list] = $db->fetch($res[type_list])){ ?>
	
	
		<tr>
			<td width="30%"><?=$arr[type_list][name_th];?></td>
			<td width="" align="center"><?=$arr[type_list][company_commission];?>%</td>
			<td width=""  align="center"><?=$arr[type_list][taxi_commission];?>%</td>
			<td width=""  align="center"><?=$arr[type_list][company_vat];?>%</td>
			<td width=""  align="center"><?=$arr[type_list][taxi_vat];?>%</td>
		</tr>	
<? } ?>
      			</table>
      	</div>
    <? } ?>  	
      	
      </td>
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
</table>

  
   </form> 
  <?
 
}
?>

<? if($_GET[op]=='sub_edit'){  ?>
	<?
 include("mod/content/menu/place.php");
?> 
<form name="edit_cm_pd" id="edit_cm_pd">
	<table class="table" style=" margin-top: 20px;">
	<tr>
		<th>ประเภท</th>
		<th>คอมมิชชั่นบริษัท</th>
		<th>คอมมิชชั่นแท็กซี่</th>
		<th>Vat บริษัท</th>
		<th>Vat แท็กซี่</th>
	</tr>
	<? $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[type] = $db->select_query("SELECT * FROM product_option_type ORDER BY  id ASC ");

while($arr[type] = $db->fetch($res[type])){ 

$place_sub = $db->select_query("SELECT * FROM product_option_percent  where product_id = '".$_GET[id]."' and type_id = '".$arr[type][id]."' ");
$place_sub_query = $db->fetch($place_sub);
?>
		<tr id="row_id_<?=$arr[type][id];?>">
			<td width="30%" style="vertical-align: middle;"><strong><?=$arr[type][name_th];?></strong></td>
			<td ><input class="form-control" style="height: 35px;width: 70%;" type="text" name="company_commission_<?=$arr[type][id];?>" value="<?=$place_sub_query[company_commission]?>" /></td>
			<td><input class="form-control" style="height: 35px;width: 70%;" type="text" name="taxi_commission_<?=$arr[type][id];?>" value="<?=$place_sub_query[taxi_commission]?>" /></td>
			<td><input class="form-control" style="height: 35px;width: 70%;" type="text" name="company_vat_<?=$arr[type][id];?>" value="<?=$place_sub_query[company_vat]?>" /></td>
			<td><input class="form-control" style="height: 35px;width: 70%;" type="text" name="taxi_vat_<?=$arr[type][id];?>" value="<?=$place_sub_query[taxi_vat]?>" /></td>
		</tr>
		<? } ?>
		
		<tr>
			
			<td colspan="5" align="center"><button class="btn btn-info" style="width: 200px;height: 50px; font-size: 20px;" id="save_edit"><strong>บันทึก</strong></button></td>
		</tr>
	</table>
	</form>
	<div id="show_data"></div>
	<script>
		
		$( "#edit_cm_pd" ).submit(function( event ) {
			  $.post( "go.php?name=content/load&file=category_product&op=sub_edit_action&id=<? echo $_GET[id];?>",$( this ).serialize(),function( data ) {
//				  $( "#show_data" ).html( data );
//				  console.log(data);
				  $('.form-control').css('border','1px solid #1be00e');
				  setTimeout(function(){$('.form-control').css('border','1px solid #ccc'); }, 3000);
			  });
			  event.preventDefault();
		});
	</script>
<? } ?>

 <? 
 	if($_GET[op]=="add_type_product"){ 
 	include("mod/content/menu/place.php");
 	?>

	<form id="add_type_product_form">
	<table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="650" valign="top">
      <table width="100%" border="0" cellspacing="3" cellpadding="3">

		          <tr>
		            <td width="20%" align="center"><strong>ประเภทสินค้า ไทย :</strong></td>
		            <td><input name="name_th" type="text" class="form-control" id="name_th" style="width:500px; background:#FFFFFF" value="" /></td>
		            </tr>
		            <tr>
		            <td width="20%" align="center"><strong>ประเภทสินค้า อังกฤษ :</strong></td>
		            <td><input name="name_en" type="text" class="form-control" id="name_en" style="width:500px; background:#FFFFFF" value="" /></td>
		            </tr> 
		            <tr>
		            <td width="20%" align="center"><strong>ประเภทสินค้า จีน :</strong></td>
		            <td><input name="name_cn" type="text" class="form-control" id="name_cn" style="width:500px; background:#FFFFFF" value="" /></td>
		            </tr>
		            <tr>
		            	<td></td>
		            	<td> 	<button type="button" class="btn btn-primary btn-lg"   id="submit_data"   > <span id="txt_btn_save">  บันทึกข้อมูล</span></button></td>
		            </tr> 
        </table></td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
    </table>

  
	
	</form>
	<br />
	<?
	 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$res[type] = $db->select_query("SELECT * FROM product_option_type where status = 1  ");
	
	 ?>
	
  
  <table class="table table-striped" style="display: nones;">
    <thead>
      <tr>
        <th>ลำดับ</th>
        <th>ชื่อไทย</th>
        <th>ชื่ออังกฤษ</th>
        <th>ชื่อจีน</th>
        <th>สถานะ</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <? $num = 1;
    while($arr[type] = $db->fetch($res[type])){ 
    	if($arr[type][status]==1){
			$status = "เปิด";
		}else{
			$status = "ปิด";
		}
    ?>
    <form id="edit_form_<?=$arr[type][id];?>" name="edit_form_<?=$arr[type][id];?>" method="post">
      <tr id="row_edit_<?=$arr[type][id];?>">
        <td><?=$num;?></td>
        <td>
        <input type="text" name="name_th_<?=$arr[type][id];?>" id="name_th_<?=$arr[type][id];?>" value="<?=$arr[type][name_th];?>" style="display: none;"/><span id="text_th_<?=$arr[type][id];?>"><?=$arr[type][name_th];?></span>
        </td>
        <td><input type="text" id="name_en_<?=$arr[type][id];?>" value="<?=$arr[type][name_en];?>" style="display: none;"/><span id="text_en_<?=$arr[type][id];?>"><?=$arr[type][name_en];?></span></td>
        <td><input type="text" id="name_cn_<?=$arr[type][id];?>" value="<?=$arr[type][name_cn];?>" style="display: none;"/><span id="text_cn_<?=$arr[type][id];?>"><?=$arr[type][name_cn];?></span></td>
        <td><span id="text_status_<?=$arr[type][id];?>"><?=$status;?></span></td>
        <td width="20"><button class="btn btn-xs btn-info" onclick="editType('<?=$arr[type][id];?>')" id="edit_btn_<?=$arr[type][id];?>">แก้ไข</button><button class="btn btn-xs btn-success" onclick="saveEditType('<?=$arr[type][id];?>')" id="save_edit_btn_<?=$arr[type][id];?>" style="display: none;">บันทึก</button></td>
        <td width="20"><button class="btn btn-xs" id="del_btn_<?=$arr[type][id];?>" onclick="delType('<?=$arr[type][id];?>')">ลบ</button><button id="restore_btn_<?=$arr[type][id];?>" class="btn btn-xs btn-warning" onclick="restoreType('<?=$arr[type][id];?>')" style="display: none;">กู้คืน</button></td>
      </tr>
      </form>
      <? $num++; } ?>
    </tbody>
  </table>

<script>
	$('#submit_data').click(function(){
		var url = 'mod/content/load/save_type_product.php?action=add_type';
		$.post( url,$( '#add_type_product_form' ).serialize(), function( data ) {
//		  $( ".result" ).html( data );
			console.log(data);
			/*if(data==1){
				$('#add_type_contact').click();
			}*/
			
		});
		
		
	});
	function editType(id){
//		var url = 'mod/content/load/save_type_contact.php?action=edit';
		$('#name_th_'+id).show();
		$('#text_th_'+id).hide();
		
		$('#name_en_'+id).show();
		$('#text_en_'+id).hide();
		
		$('#name_cn_'+id).show();
		$('#text_cn_'+id).hide();
		
		$('#edit_btn_'+id).hide();
		$('#save_edit_btn_'+id).show();
		
		
	}
	function saveEditType(id){
	
		var url = 'mod/content/load/save_type_contact.php?action=edit&id='+id;
		var name_th = $('#name_th_'+id).val();
		var name_en = $('#name_en_'+id).val();
		var name_cn = $('#name_cn_'+id).val();
		$.post( url,{ name_th: name_th, name_en: name_en, name_cn: name_cn }, function( data ) {
			console.log(data);
			if(data==1){
				$('#name_th_'+id).hide();
				$('#text_th_'+id).text(name_th);
				$('#text_th_'+id).show();
				
				$('#name_en_'+id).hide();
				$('#text_en_'+id).text(name_en);
				$('#text_en_'+id).show();
				
				$('#name_cn_'+id).hide();
				$('#text_cn_'+id).text(name_cn);
				$('#text_cn_'+id).show();
				
				$('#row_edit_'+id).css('background-color','rgba(133, 255, 91, 0.23)');
				setTimeout(function(){ $('#row_edit_'+id).css('background-color','#fff'); }, 3000);
				
				$('#edit_btn_'+id).show();
				$('#save_edit_btn_'+id).hide();
			}
			
		});
	}
	function delType(id){
		
		var url = 'mod/content/load/save_type_product.php?action=del&id='+id;
		$.post( url, function( data ) {
			console.log(data);
			if(data==1){
				$('#del_btn_'+id).hide();
				$('#restore_btn_'+id).show();
				$('#row_edit_'+id).css('background-color','rgba(234, 39, 39,  0.2)');
				$('#text_status_'+id).text('ปิด');
			}
			
		});	
	}
	function restoreType(id){
		var url = 'mod/content/load/save_type_product.php?action=restore&id='+id;
		$.post( url, function( data ) {
			console.log(data);
			if(data==1){
				$('#restore_btn_'+id).hide();
				$('#del_btn_'+id).show();
				$('#row_edit_'+id).css('background-color','#fff');
				$('#text_status_'+id).text('เปิด');
			}
			
		});	
	}
</script>
	
		
 <?	}
 ?>	

 </TD>
				</TR>
				</TABLE>
				</TD>
				</TR>
				</TBODY>
				</TABLE>
				
<?php
if($_GET[op]=='sub_edit_action'){
	$res[place] = $db->select_query("SELECT * FROM product_option_type ORDER BY  id ASC ");
	while($arr[place] = $db->fetch($res[place])){ 
		$id = $arr[place][id];
		$com_com = 'company_commission_'.$id;
		$com_taxi = 'taxi_commission_'.$id;
		$com_vat = 'company_vat_'.$id;
		$taxi_vat = 'taxi_vat_'.$id;
		
		
		$data[type_id] = $id;
		$data[product_id] = $_GET[id];
		$data[name_en] = $arr[place][name_en];
		$data[name_th] = $arr[place][name_th];
		$data[name_cn] = $arr[place][name_cn];
		$data[company_commission] = $_POST[$com_com];
		$data[taxi_commission] = $_POST[$com_taxi];
		$data[company_vat] = $_POST[$com_vat];
		$data[taxi_vat] = $_POST[$taxi_vat];
		$data[status] = 1;
		
		$check_row = $db->num_rows("product_option_percent","id","product_id = '".$_GET[id]."' and type_id = '".$id."' ");
		if($check_row<=0){
			$result = $db->add_db("product_option_percent",$data); 
		}else{
			$result = $db->update_db("product_option_percent",$data,"product_id = '".$_GET[id]."' and type_id = '".$id."'"); 
		}
		
		echo json_encode($result);
	}
	
}
 ?>				