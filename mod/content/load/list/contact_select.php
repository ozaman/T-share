  
  <script>
  function checkAll(field)
{
  for(i = 0; i < field.elements.length; i++)
     field[i].checked = true ;
}

function uncheckAll(field)
{
 for(i = 0; i < field.elements.length; i++)
    field[i].checked = false ;
}

function Confirm(link,text) 
{
  if (confirm(text))
     window.location=link
}

  function delConfirm(obj){
	  
 
	var status=false;
	for(var i=0 ; i < obj.elements.length ; i++ ){
		if(obj[i].type=='checkbox'){
			if(obj[i].checked==true){
				status=true;
			}
		}
	}
	if(status==false){
		alert('กรุณาเลือกรายชื่อผู้ติดต่อ');
		return false;
	}else{
		
 $.post('go.php?name=content/load&file=contact&op=sub_add_all_action&id=<?=$_GET[contact];?>',$('#myformselect').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
 
  
 setTimeout(function () {
 $("#all_contact").click();
 
}, 1000); //w
 
  
  
  
  

 
		
		/*
		
		if(confirm('You sure to delete data?')){
			return true;
		}else{
			return false;
		}
		
		*/
		
	}
}




//////////////////

function userAll(field)
{
  for(i = 0; i < field.elements.length; i++)
     field[i].checked = true ;
}

function unuserAll(field)
{
 for(i = 0; i < field.elements.length; i++)
    field[i].checked = false ;
}

function Confirm(link,text) 
{
  if (confirm(text))
     window.location=link
}

  function userConfirm(obj){
	var status=false;
	for(var i=0 ; i < obj.elements.length ; i++ ){
		if(obj[i].type=='checkbox'){
			if(obj[i].checked==true){
				status=true;
			}
		}
	}
	if(status==false){
		alert('Plese select user to send message.');
		return false;

	}
}


//////////// mail


  function mailConfirm(obj){
	var status=false;
	for(var i=0 ; i < obj.elements.length ; i++ ){
		if(obj[i].type=='checkbox'){
			if(obj[i].checked==true){
				status=true;
			}
		}
	}
	if(status==false){
		alert('Plese select data to send email.');
		return false;
	}else{
		if(confirm('You sure to send email?')){
			return true;
		}else{
			return false;
		}
	}
}



//////////// print


  function printConfirm(obj){
	var status=false;
	for(var i=0 ; i < obj.elements.length ; i++ ){
		if(obj[i].type=='checkbox'){
			if(obj[i].checked==true){
				status=true;
			}
		}
	}
	if(status==false){
		alert('Plese select data to print.');
		return false;
	}else{
		if(confirm('You sure to print?')){
			return true;
		}else{
			return false;
		}
	}
}





function Confirm(link,text) 
{
  if (confirm(text))
     window.location=link
}

  function itemConfirm(obj){
	var status=false;
	for(var i=0 ; i < obj.elements.length ; i++ ){
		if(obj[i].type=='checkbox'){
			if(obj[i].checked==true){
				status=true;
			}
		}
	}
	if(status==false){
		alert('Plese select item.');
		return false;
	}else{
		if(confirm('You sure to apply data?')){
			return true;
		}else{
			return false;
		}
	}
}


  
  </script>
  
  
  <style>   
  .checkbox-select-contact{ width:20px; height:20px; }
 
 </style>     
 <form   name="myformselect" id="myformselect" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" cellspacing="2" cellpadding="1" >
    <tr bgcolor="#990000" height=25>
     <td width="50" align="center" bgcolor="#999999"><CENTER>
       <font color="#FFFFFF">เลือก</font>     
     </CENTER></td>
     
      
     
     <td height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">ชื่อ</font></td>
     <td width="200" align="center" bgcolor="#999999"><font color="#FFFFFF">สถานที่</font></td>
     
   
     <td width="200" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">เบอร์โทรศัพท์</font></td>
     <!--<td width="200" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">อีเมล</font></td>-->
      
     <td width="199" align="center" bgcolor="#999999"><font color="#FFFFFF">ผู้ดูแล</font></td>
     <td width="199" align="center" bgcolor="#999999"><font color="#FFFFFF">ตำแหน่ง</font></td>
     
     </tr>  
  <?
  
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
	
if($_GET[op]=='find'){
	
 
	
 $find = "WHERE admintype > 0  and (name like  '%".$_POST[find_contact_name]."%' or phone like '%".$_POST[find_contact_name]."%' or  email like '%".$_POST[find_contact_name]."%')  ";
	
	
	
	
	
$res[contact] = $db->select_query("SELECT * FROM shopping_contact    $find   ORDER BY  usertype  ASC  ");	
	
}
	
 else{
$res[contact] = $db->select_query("SELECT * FROM shopping_contact  WHERE admintype=1 and type<>'zello' group by name  ORDER BY  usertype  ASC  ");

 }




while($arr[contact] = $db->fetch($res[contact])){
	
	
	
 $res[product] = $db->select_query("SELECT * FROM shopping_product WHERE id='".$arr[contact][product_id]."' ");
 $arr[product] = $db->fetch($res[product]);
 
  $res[con_type] = $db->select_query("SELECT * FROM shopping_contact_type WHERE id='".$arr[contact][usertype]."' ");
  $arr[con_type] = $db->fetch($res[con_type]);
 
 $res[con_type_ad] = $db->select_query("SELECT * FROM shopping_contact_admin_type WHERE id='".$arr[contact][admintype]."' ");
  $arr[con_type_ad] = $db->fetch($res[con_type_ad]);
	
/*if($arr[contact][usertype]=='op'){
	
$type='พนักงานต้อนรับ';
	
}

if($arr[contact][usertype]=='sale'){
	

$type='ฝ่ายขาย';
	
}
	*/
	
 
 $res[com] = $db->select_query("SELECT * FROM shopping_contact WHERE id='".$arr[contact][main]."' ");
 $arr[type] = $db->fetch($res[com]);
 

 
 

			///////////////
 
 
 

	//Comment Icon
	if($arr[contact][enable_comment]){
		$CommentIcon = " <IMG SRC=\"images/icon/suggest.gif\" WIDTH=\"13\" HEIGHT=\"9\" BORDER=\"0\" ALIGN=\"absmiddle\">";
	}else{
		$CommentIcon = "";
	}
			$bgcolor = ($i++ & 1) ? $bg1 : $bg2; 
 
?> 

 
 
     <tr  bgcolor='<?=$bgcolor?>'>
       <td height="30" align="center">
         
         
         
         
         
         
         <script>
	 
 
 
 $("#btn_menu_edit_contact_<? echo $arr[contact][id];?>").click(function(){
 
			 
 $('#topic_edit').html('แก้ไข <? echo $arr[contact][name];?>');
			 
  var url_page_type_<? echo $arr[contact][id];?>= "go.php?name=content/load&file=contact&op=sub_edit&contact=<? echo $_GET[contact];?>&id=<? echo $arr[contact][id];?>&main=<? echo $arr[product][main];?>&sub=<? echo $arr[product][sub];?>";
 
  $('#show_data_page').load(url_page_type_<? echo $arr[contact][id];?>);
 
 
	   });
	   
 
 
 
 
 </script>
         <input setid="<?=$arr[open_1][id]?>"  plan="1"  mainplan="<? echo $arr[place][price_plan];?>"    opentype="open_driver"  name="list[]"  id="<? echo $arr[contact][id];?>"   type="checkbox" class="checkbox-select-contact"  value="<? echo $arr[contact][id];?>"  <?=$chk_1_driver?> /></td>
     
     <td align="center">  
       <? echo $arr[contact][name];?> </td>
     <td align="center"><?= $arr[product][topic_th]?></td>
         <td align="center">
           
           <? echo $arr[contact][phone];?> 
         </td>
      <!-- <td align="center">  <?=$arr[contact][email];?>  </td>-->
       <td align="center">  <?=$arr[con_type_ad][name_th];?>  </td>
         <td align="center"><? echo $arr[con_type][name_th];?>  </td>
         </tr>
	  <TR>
		  <TD colspan="30" height="1" class="dotline"></TD>
	  </TR>
  <?
 } 
?>
   </table>
   
 <table width="300" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td><button type="button" class="btn btn-default btn-lg"   id="select_all"   >
                <span id="txt_btn_save">
                  เลือกทั้งหมด
                  </span>
                </button></td>
      <td><button type="button" class="btn btn-default btn-lg"   id="select_no"   >
                <span id="txt_btn_save">
                  ไม่เลือก
                  </span>
                </button> </td>
 <td>   <button type="button" class="btn btn-primary btn-lg"   id="submit_data_contact"   onclick="return delConfirm(document.myformselect)" >
                <span id="txt_btn_save">
                  บันทึกข้อมูล
                  </span>
                </button></td> 
    </tr>
  </tbody>
</table>
  
   
   
            <script>
			
 
 
 $("#select_all").click(function(){
 		 
 $('.checkbox-select-contact').attr('checked', true);
 
 });
	   
 $("#select_no").click(function(){
 		 
 $('.checkbox-select-contact').attr('checked', false);
 
 });
	   
 
 
 
 
 </script>
   
   
   
   
   
   
   
   </td>
    </tr>
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>

 </form>