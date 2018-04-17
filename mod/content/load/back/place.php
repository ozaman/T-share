 
 
 <br>
 
 
 
   
 
 

 
 
 
 
 
 
 
 <TABLE cellSpacing=0 cellPadding=0 width=100% border=0>
 <TBODY>
        <TR>
          <TD width="100%" vAlign=top><!-- Admin -->
            <TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					
				</TR>
				<TR>
					<TD valign="top">  <?
					
  // include("includes/class.resizepic.php");
					
//////////////////////////////////////////// ʴ¡ Project   
if($_GET[op] == ""){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
 
?>
                   
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
     <td width="50" align="center" bgcolor="#999999"><font color="#FFFFFF">ลบ</font></td>
      
     <td width="300" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">EN</font></td>
     
   
     <td width="300" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">TH</font></td>
     <td width="300" align="center" bgcolor="#999999"><font color="#FFFFFF">CN</font></td>
     <td align="center" bgcolor="#999999"><font color="#FFFFFF">Type</font></td>
    
    <td width="60" align="center" bgcolor="#999999"><font color="#FFFFFF">สถานะ</font></td>
    </tr>  
  <?
 
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[place] = $db->select_query("SELECT * FROM shopping_product   WHERE  sub='".$_GET[sub]."' ORDER BY  id ASC  ");
while($arr[place] = $db->fetch($res[place])){
	
	
	
 
	
	 
 $res[com] = $db->select_query("SELECT * FROM shopping_product_main WHERE id='".$_GET[main]."' ");
 $arr[main] = $db->fetch($res[com]);
 

 
 

			///////////////
 
 
 

	//Comment Icon
	if($arr[place][enable_comment]){
		$CommentIcon = " <IMG SRC=\"images/icon/suggest.gif\" WIDTH=\"13\" HEIGHT=\"9\" BORDER=\"0\" ALIGN=\"absmiddle\">";
	}else{
		$CommentIcon = "";
	}
			$bgcolor = ($i++ & 1) ? $bg1 : $bg2; 
 
?> 

 
 
     <tr  bgcolor='<?=$bgcolor?>'>
       <td height="30" align="center">
       
       
       
       
      
        <script>
	 
 
 $("#btn_menu_edit_place_<? echo $arr[place][id];?>").click(function(){
 
			 
 $('#topic_edit').html('แก้ไข <? echo $arr[place][topic_en];?>:<? echo $arr[project][topic_th];?>');
			 
  var url_page_type_<? echo $arr[place][id];?>= "go.php?name=content/load&file=place&op=sub_edit&id=<? echo $arr[place][id];?>&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
 
  $('#show_data_page').load(url_page_type_<? echo $arr[place][id];?>);
 
 
	   });
	   
 
	   </script>
 
       <? echo $arr[sub][main];?>
       
     <a  id="btn_menu_edit_place_<? echo $arr[place][id];?>" >
       <i class="fa  fa-edit" style="width:40px; font-size:30px; color:#666666"  ></i>
       
       </a> 
     
     
     
   </td>
     <td height="30" align="center">
     
     
     
     
		<script>
		

			$( document ).ready(function() {
		
		
		$("#btn_menu_del_place_<? echo $arr[place][id];?>").click(function(){ 
  
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการลบ <? echo $arr[place][topic_th];?>",
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

 
  $.post('go.php?name=content/load&file=place&op=sub_del&id=<? echo $arr[place][id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });  
  
 
  var url_page_type= "empty_style.php?name=content/load&file=place&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
 
  $('#show_data_page').load(url_page_type);

///
 
 
	//  alert('dd');
    } else {
      swal("Cancelled", "", "error");
    }
	});
	   
	    

});

});

		
		
		 
		</script>
     
     
     
 
     
     
     
     <a  id="btn_menu_del_place_<? echo $arr[place][id];?>"><i class="fa  fa-trash" style="width:40px; font-size:30px; color:#FF0000"  ></i> 
       
       
     </a>
     
     
     
     
     </td>
     <td align="center">  
       <? echo $arr[place][topic_en];?></a></td>
         <td align="center">
           
           <? echo $arr[place][topic_th];?></a>  
           
         </td>
         <td align="center"> <? echo $arr[place][topic_cn];?> </td>
         <td align="center"><? echo $arr[main][topic_en];?></td>
         <td align="center" id="place_status_<? echo $arr[place][topic_en];?>" style="font-size:16px">
		 
		 
		 <? if( $arr[place][status] ==1){ ?>
           <font color="#FF0000">เปิด</font>
           <? } ?>
           <? if( $arr[place][status] <>1){ ?>
           ปิด
  <? } ?>
  &nbsp; </td>
     </tr>
	  <TR>
		  <TD colspan="26" height="1" class="dotline"></TD>
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
	   
	   
	  var url_pagesub<? echo $_GET[sub];?> = "empty_style.php?name=admin/chat/admin/message/load&file=listsub&maintype=<? echo $_GET[sub];?>";
	 

	 
      $('#td_load_sub<? echo $_GET[sub];?>').load(url_pagesub<? echo $_GET[sub];?>);
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
 ?>
 
 
 
 


<? 
if($_GET[op] == "sub_add"){
	//////////////////////////////////////////// ó Form
 
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[project] = $db->select_query("SELECT * FROM shopping_product  WHERE id='".$_GET[id]."' ");
 $arr[project] = $db->fetch($res[project]);
		
		
		
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projectmain] = $db->select_query("SELECT * FROM shopping_product_main where   id=".$_GET[main]."  ");
$arr[projectmain] = $db->fetch($res[projectmain]);
 
 
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projectsub] = $db->select_query("SELECT * FROM shopping_product_sub where   id=".$_GET[sub]."  ");
$arr[projectsub] = $db->fetch($res[projectsub]);
 
 
 
 
?>
  <FORM NAME="myform"   id="myform"   enctype="multipart/form-data">
  <?
 include("mod/content/menu/place.php");
?> 
  
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td width="150"><strong>หมวดหมู่ : </strong></td>
            <td style="font-size:18px;"><?=$arr[projectmain][topic_th]?>  </td>
          </tr>
		          <tr>
		            <td><strong>ประเภท : </strong></td>
		            <td style="font-size:18px;"><? echo $arr[projectsub][topic_en];?>
		              <input name="sub" type="hidden" class="inputform" id="sub" style="width:500px; background:#FFFFFF" value="<?=$_GET[sub]?>" />
		              <input name="main" type="hidden" class="inputform" id="main" style="width:500px; background:#FFFFFF" value="<?=$_GET[main]?>" />
                      
                      
                      </td>
		            </tr>
		          <tr>
		            <td><strong>ชื่อ EN : </strong></td>
		            <td><input name="topic_en" type="text" class="inputform" id="topic_en4" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_en];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>ชื่อ TH :</strong></td>
		            <td><input name="topic_th" type="text" class="inputform" id="topic_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_th];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>ชื่อ CN :</strong></td>
		            <td><input name="topic_cn" type="text" class="inputform" id="topic_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_cn];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>เวลาทำการ :</strong></td>
		            <td>เปิด&nbsp;
		              <input name="start_time" type="text" class="inputform" id="start_time" style="width:70px; background:#FFFFFF" value="<? echo $arr[project][start_time];?>" />
		              &nbsp; ปิด&nbsp;
		              <input name="finish_time" type="text" class="inputform" id="finish_time" style="width:70px; background:#FFFFFF" value="<? echo $arr[project][finish_time];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>จังหวัด :</strong></td>
		            <td><select name="province" id="province" style="width:500px;; font-size:16px; padding:5px; height:40px" >
		              <option value="">- เลือกจังหวัด -</option>
		              <?
                                  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                         
                                    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
                                    $res[category] = $db->select_query("SELECT * FROM web_province ORDER BY id  limit 100 ");
                      
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] ==$arr[project][province]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][name_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
		              </select></td>
		            </tr>
		          <tr>
		            <td><strong>ที่อยู่ :</strong></td>
		            <td><textarea name="address" rows="3" class="inputform" id="address" style="width:500px; background:#FFFFFF"><?=$arr[project][address];?>
                  </textarea></td>
		            </tr>
		          <tr>
		            <td><strong>Link แผนที่ :</strong></td>
		            <td><input name="map" type="text" class="inputform" id="map" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][map];?>" /></td>
		            </tr>
		          <tr style="display:none">
		            <td><strong>แผนที่ :</strong></td>
		            <td>ละติดจูด&nbsp;
		              <input name="lat" type="text" class="inputform" id="lat" style="width:120px; background:#FFFFFF" value="<? echo $arr[project][start_time];?>" />
		              &nbsp; ลองติจูด&nbsp;
		              <input name="lng" type="text" class="inputform" id="lng" style="width:120px; background:#FFFFFF" value="<? echo $arr[project][finish_time];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>เบอร์โทรศัพท์ :</strong></td>
		            <td><input name="phone" type="text" class="inputform" id="phone3" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][phone];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>อีเมล์ :</strong></td>
		            <td><input name="topic_en" type="text" class="inputform" id="topic_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][email];?>" /> 
		              %</td>
		            </tr>
		          <tr>
		            <td><strong>ค่าคอมมิชชั่น :</strong></td>
		            <td><input name="commission" type="text" class="inputform" id="commission" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][commission];?>" /></td>
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
				 
 
 		 
  $.post('go.php?name=content/load&file=place&op=sub_add_action&id=<?=$_GET[id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
   var url_page_type= "go.php?name=content/load&file=place&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>";
	  
 
  $('#show_data_page').load(url_page_type);
	  
	  
  
  
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
 $res[project] = $db->select_query("SELECT * FROM shopping_product  WHERE id='".$_GET[id]."' ");
 $arr[project] = $db->fetch($res[project]);
		
		
		
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projectmain] = $db->select_query("SELECT * FROM shopping_product_main where   id=".$_GET[main]."  ");
$arr[projectmain] = $db->fetch($res[projectmain]);
 
 
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projectsub] = $db->select_query("SELECT * FROM shopping_product_sub where   id=".$_GET[sub]."  ");
$arr[projectsub] = $db->fetch($res[projectsub]);
 
 
?>
   
<FORM NAME="myform" id="myform"   enctype="multipart/form-data">
<?
 include("mod/content/menu/place.php");
?> 

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td><strong>หมวดหมู่ : </strong></td>
            <td style="font-size:18px;"><?=$arr[projectmain][topic_th]?></td>
          </tr>
          <tr>
            <td><strong>ประเภท : </strong></td>
    
            <td style="font-size:18px;"><? echo $arr[projectsub][topic_en];?>
            
            
		              <input name="sub" type="hidden" class="inputform" id="sub" style="width:500px; background:#FFFFFF" value="<?=$_GET[sub]?>" />
		              <input name="main" type="hidden" class="inputform" id="main" style="width:500px; background:#FFFFFF" value="<?=$_GET[main]?>" />
              
              
              
              </td>
          </tr>
		          <tr>
		            <td><strong>ชื่อ EN : </strong></td>
		            <td><input name="topic_en" type="text" class="inputform" id="topic_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_en];?>" />
		              </td>
		            </tr>
		          <tr>
                    <td><strong>ชื่อ TH :</strong></td>
                    <td><input name="topic_th" type="text" class="inputform" id="topic_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_th];?>" /></td>
		            </tr>
		          <tr>
                    <td><strong>ชื่อ CN :</strong></td>
                    <td><input name="topic_cn" type="text" class="inputform" id="topic_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_cn];?>" />
                    </td>
		            </tr>
		          <tr>
		            <td><strong>เวลาทำการ :</strong></td>
		            <td>เปิด&nbsp;
		              <input name="start_time" type="text"   id="start_time" style="width:70px; background:#FFFFFF" value="<? echo $arr[project][start_time];?>" /> 
		              &nbsp; ปิด&nbsp;
 <input name="finish_time" type="text" class="inputform" id="finish_time" style="width:70px; background:#FFFFFF" value="<? echo $arr[project][finish_time];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>จังหวัด :</strong></td>
		            <td><select name="province" id="province" style="width:500px;; font-size:16px; padding:5px; height:40px"  >
 				  <option value="">- เลือกจังหวัด -</option>
          
  <?
                                  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                         
                                    //$res[category] = $db->select_query("SELECT * FROM ".TB_transferplace." where pro < 4 and status = 1 ORDER BY topic ");
                                    $res[category] = $db->select_query("SELECT * FROM web_province ORDER BY id  limit 100 ");
                      
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] ==$arr[project][province]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][name_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
 
          </select></td>
		            </tr>
		          <tr>
		            <td><strong>ที่อยู่ :</strong></td>
		            <td><textarea name="address" rows="3" class="form-control" id="address" style="width:500px; background:#FFFFFF"><?=$arr[project][address];?></textarea>
                    
                    
                    
                    </td>
		            </tr>
		          <tr>
		            <td><strong>Link แผนที่ :</strong></td>
		            <td><input name="map" type="text" class="inputform" id="map" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][map];?>" /></td>
		            </tr>
		          <tr style="display:none">
		            <td><strong>แผนที่ :</strong></td>
		            <td>ละติดจูด&nbsp;
                      <input name="lat" type="text" class="inputform" id="lat" style="width:120px; background:#FFFFFF" value="<? echo $arr[project][lat];?>" />
&nbsp; ลองติจูด&nbsp;
<input name="lng" type="text" class="inputform" id="lng" style="width:120px; background:#FFFFFF" value="<? echo $arr[project][lng];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>เบอร์โทรศัพท์ :</strong></td>
		            <td><input name="phone" type="text" class="inputform" id="phone" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][phone];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>อีเมล์ :</strong></td>
		            <td><input name="email" type="text" class="inputform" id="topic_en3" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][email];?>" /></td>
		            </tr>
		          <tr>
		            <td><strong>ค่าคอมมิชชั่น :</strong></td>
		            <td><input name="commission" type="text" class="inputform" id="commission" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][commission];?>" />
%</td>
		            </tr>
  
        <tr>
          <td width="150">&nbsp;</td>
          <td><button type="button" class="btn btn-primary"   id="submit_data" > <span id="txt_btn_save"> บันทึกข้อมูล </span> </button>
            <script>
  $("#submit_data").click(function(){
				 
 
 		 
  $.post('go.php?name=content/load&file=place&op=sub_edit_action&id=<?=$_GET[id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
	  var url_page_type= "empty_style.php?name=content/load&file=place&main=<? echo $arr[project][main];?>&sub=<? echo $arr[project][sub];?>";
	  
  
 $('#show_data_page').load(url_page_type);
	  
	  
  
  
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
		$db->add_db('shopping_product',array(
		
 
		
 
			"topic_cn"=>"$_POST[topic_cn]",
			"topic_th"=>"$_POST[topic_th]",
 
			 "topic_en"=>"$_POST[topic_en]",
			 
 "status"=>'0',
  
		// "lat"=>"$_POST[lat]",
		// "lng"=>"$_POST[lng]",
		
		"map"=>"$_POST[map]",
			 
	 
		 "start_time"=>"$_POST[start_time]",
		 "finish_time"=>"$_POST[finish_time]",
		
		"address"=>"$_POST[address]",
		"phone"=>"$_POST[phone]",
		"email"=>"$_POST[email]",
		"province"=>"$_POST[province]",
		"open"=>"$_POST[open]",
		
		"commission"=>"$_POST[commission]",
		"price_plan"=>"$_POST[price_plan]",
		
			
			"sub"=>"$_POST[sub]",
			 "main"=>"$_POST[main]"
			 
			 
			 
 
 
			
 
		));
 }


?>







 
 
 
 <?
 if($_GET[op] == "sub_edit_action"  ){
	//////////////////////////////////////////// ó Database Edit
 
 
				//ӡ䢢ŧҵ
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		
		$db->update_db('shopping_product',array(
 
			"topic_cn"=>"$_POST[topic_cn]",
			"topic_th"=>"$_POST[topic_th]",
 
			 "topic_en"=>"$_POST[topic_en]",
			 
 		"map"=>"$_POST[map]",
			 
		// "lat"=>"$_POST[lat]",
		// "lng"=>"$_POST[lng]",
			 
	 
		 "start_time"=>"$_POST[start_time]",
		 "finish_time"=>"$_POST[finish_time]",
		
		"address"=>"$_POST[address]",
		"phone"=>"$_POST[phone]",
		"email"=>"$_POST[email]",
		"province"=>"$_POST[province]",
		"open"=>"$_POST[open]",
		
		"commission"=>"$_POST[commission]",
		"price_plan"=>"$_POST[price_plan]",
		
		
 		"sub"=>"$_POST[sub]",
	 	 "main"=>"$_POST[main]"
		
		
		

 
 
			
 
		)," id=$_GET[id] ");
	 
		
		
		
	}
 
 
 ?>
 
 
 
 
 
 <?
  if($_GET[op] == "sub_del"){
	//////////////////////////////////////////// óź Form
 
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->del('shopping_product'," id='".$_GET[id]."' "); 
	 
		$db->closedb ();
  }
?>
 
 
 
 
 
 
 
 