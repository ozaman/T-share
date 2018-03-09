
<? if($_GET[op] == ""){?>


 
 
 
  <? if($_GET[control]=='company'){ ?>

<script>



 
 $('.show_extra_price_driver').hide();
 $('.show_extra_price_counter').hide();
 $('.show_extra_price_all').hide();
 
</script>

<? } ?>


  <? if($_GET[control]=='user'){ ?>
  
  

<script>
 
 $('.show_extra_price_company').hide();
 
</script>

<? } ?>
 
 
 <?
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $allextra = $db->num_rows('plan_product_price_extra',"id","plan_setting='".$_GET[plan_setting]."' and plan_type='".$_GET[type]."' and control='".$_GET[control]."'");
 ?>
 
 <? if($allextra >0){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tbody>
    <tr>
      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr >
      <td valign="top"><table width="100%" cellspacing="2" cellpadding="1" >
    <tr bgcolor="#990000" height=25>
     <td width="50" align="center" bgcolor="#999999"><CENTER>
       <font color="#FFFFFF">แก้ไข</font>     
     </CENTER></td>
     <td width="50" align="center" bgcolor="#999999"><font color="#FFFFFF">ลบ</font></td>
     <td width="50" align="center" bgcolor="#999999">&nbsp;</td>
     <td align="center" bgcolor="#999999"><font color="#FFFFFF">ค่าตอบแทน</font></td>
     <td width="150" align="center" bgcolor="#999999"><font color="#FFFFFF">ผู้ใช้งาน</font></td>
     <td width="200" align="center" bgcolor="#999999">&nbsp;</td>
     <td width="100" align="center" bgcolor="#999999"><CENTER>
       <font color="#FFFFFF">จาก</font>
     </CENTER></td>
     <td width="100" align="center" bgcolor="#999999"><font color="#FFFFFF">ถึง</font></td>
     
     <td width="100" align="center" bgcolor="#999999"  ><font color="#FFFFFF"><? if($_GET[control]=='user'){?>รายจ่าย<? } ?><? if($_GET[control]=='company'){?>รายรับ<? } ?></font></td>
     
     </tr>  
  <?
  


 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[project] = $db->select_query("SELECT * FROM plan_product_price_extra   where  plan_setting='".$_GET[plan_setting]."' and plan_type='".$_GET[type]."' and control='".$_GET[control]."'  ORDER BY  type,from_number  ASC  ");
while($arr[project] = $db->fetch($res[project])){
	
	
$res[icon] = $db->select_query("SELECT * FROM loop_pay_type WHERE name='".$arr[project][type]."' ");
 $arr[icon] = $db->fetch($res[icon]);
	
 
 
 /*
	
	 
	 $res[com] = $db->select_query("SELECT * FROM shopping_product_main WHERE id='".$arr[project][main]."' ");
 $arr[type] = $db->fetch($res[com]);
 

 */
 
 if($arr[project][type]=='park'){
	 
	 $type='ค่าจอด';
	 
 }
  if($arr[project][type]=='person'){
	 
	 $type='ค่าหัว';
	 
 }
 
   if($arr[project][type]=='commision'){
	 
	 $type='ค่าคอมมิชชั่น';
	 
 }
 
 


   if($arr[project][pay_type]=='company'){
	 
	 $user='บริษัท';
	 
 }
 
   if($arr[project][pay_type]=='driver'){
  
	 $user='คนขับ';
  
 }
 
   if($arr[project][pay_type]=='counter'){
	 
	 $user='เคาน์เตอร์';
	 
 }
 

   if($arr[project][pay_type]=='all'){
	 
	 $user='สมาชิก';
	 
 }
 



 

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
       
       
       
       
       <script>
	   
 $("#btn_menu_edit_extra_<? echo $arr[project][id];?>").click(function(){
	   
 
	//    $('#btn_menu_edit_extra_<? echo $arr[project][id];?>').html('<center><img src="images/loader.gif" >');
 
   var url_load_price= "popup.php?name=content/load/list/extra&file=form&plan_name=<?=$arr[plan_name][id];?>&op=edit&plan_setting=<?=$_GET[plan_setting]?>&shop_id=<?=$arr[shop][id]?>&type=all&id=<? echo $arr[project][id];?>&control=<?=$_GET[control]?>";

$('#from_main_price_extra').load(url_load_price); 


 });
	   
	   </script>
       
       
 
       <a  id="btn_menu_edit_extra_<? echo $arr[project][id];?>" data-toggle="modal" data-target="#myModal_texts"  >
         <i class="fa  fa-edit" style="width:40px; font-size:30px; color:#666666; margin-top:5px;"  ></i>
      </a> 
 
     </td>
     
 
     
     
 
     
     
     
     <td align="center">
     
     
     
     
		<script>
		

			$( document ).ready(function() {
		
		
		$("#btn_menu_del_extra_<? echo $arr[project][id];?>").click(function(){ 
  
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการลบ ",
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

 
 $.post('go.php?name=content/load/list/extra&file=list_extra_price&op=extra_del_action&id=<?=$_GET[plan_setting];?>&plan=<? echo $arr[project][id];?>',$('#myform').serialize(),function(response){
  $('#send_main_price_extra').html(response);  });
  
  
  $("#btn_load_<?=$_GET[type]?>").click();
  
   /*
  
 $('#set_extra_price_all_<?=$_GET[plan_setting]?>').click();
 
 
$("#tab_btn_load_price_all").click();


*/

 
 
	//  alert('dd');
    } else {
      swal("Cancelled", "", "error");
    }
	});
	   
	    

});

});

		
		
		 
		</script>
     
     
 
     
      <a  id="btn_menu_del_extra_<? echo $arr[project][id];?>"><i class="fa  fa-trash" style="width:40px; font-size:30px; color:#FF0000"  ></i> </a>
      
 
       
 
       
     </td>
     <td align="center"><i class="fa  <?=$arr[icon][icon_code]?>" style="width:30px; font-size:26px; color:#999999"  ></i></td>
     <td align="center" class="font-22"><?=$type?></td>
     <td align="center" class="font-22"><?=$user?></td>
     <td width="200" align="center" class="font-22">
       
       <?
 if($arr[project][plan_type]=='extra'){
	 
 echo $plan_type='<img src="images/flag/China.png" width="30" height="30" alt="" style="margin-top:-5px;"/>&nbsp;&nbsp;ราคาตามสัญชาติ';
	 
 }
 
   if($arr[project][plan_type]=='all'){
	 
	 echo  $plan_type='<img src="images/flag/Other.png" width="30" height="30" alt="" style="margin-top:-5px;"/>&nbsp;&nbsp;ราคาทั้งหมด';
	 
 }
 
 ?>
 
 
 &nbsp;&nbsp;</td>
     <td width="50" align="right" class="font-22"  ><? echo  number_format(  $arr[project][from_number] , 0 );?>&nbsp;</td>
     <td width="50" align="right" class="font-22" id="naum_all_place_<? echo $arr[project][id];?>" ><? echo  number_format(  $arr[project][to_number] , 0 );?>&nbsp;</td>
     <td width="100" align="right"   class="font-24"><strong><? echo $arr[project][price_main];?> <?   if($arr[project][type]=='commision'){ ?>&nbsp;%
	 
<? }
 ?></strong>&nbsp;</td>
     </tr>
	  <TR>
		  <TD colspan="33" height="1" class="dotline"></TD>
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

<? }  else { ?>


<div class="font-26" style=" color:#FF0000; padding-top:5px;"><B>ไม่มีเงื่อนไข<? if($_GET[control]=='user'){?>รายจ่าย<? } ?><? if($_GET[control]=='company'){?>รายรับ<? } ?></div>
 
<? } ?>

<? } ?>


<?

 if($_GET[op] == "extra_add_action"  ){
	//////////////////////////////////////////// ó Database
 
		//include("includes/class.resizepic.php");
 
	
		//ӡŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   
////////////////
		$db->add_db('plan_product_price_extra',array(
	 
		 "price_main"=>"$_POST[extra_price]",
		 
 
 
		  "from_number"=>"$_POST[from_extra]",
		   "to_number"=>"$_POST[to_extra]",
  
		  "plan_setting"=>"$_GET[id]",
		 
		 "type"=>"$_POST[price_plan_extra]",
		 
		 "control"=>"$_GET[control]",
  
		"pay_type"=>"$_POST[price_plan_pay]",
		"plan_type"=>"$_POST[type_extra]"
		
 
 
		));
		
  
 
		
		
 }








 if($_GET[op] == "extra_edit_action"  ){
	 
	// echo $_GET[id];
	/// 
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

 $db->update_db('plan_product_price_extra', array(
 
		 "price_main"=>"$_POST[extra_price]",
		 
  
		 
		  "from_number"=>"$_POST[from_extra]",
		   "to_number"=>"$_POST[to_extra]",
 
		 
		 "type"=>"$_POST[price_plan_extra]",
		 "pay_type"=>"$_POST[price_plan_pay]",
		 
 
		"plan_type"=>"$_POST[type_extra]"
		
		
		)," id='".$_GET[plan]."' ");
		
 //echo $_POST[extra_price_company];
		
 }
?>




 <?
  if($_GET[op] == "extra_del_action"){
	//////////////////////////////////////////// óź Form
 
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->del('plan_product_price_extra'," id='".$_GET[plan]."' "); 
	 
		$db->closedb ();
  }
  
  
 ?>

 