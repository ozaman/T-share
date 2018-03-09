 
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
 include("mod/content/menu/sub.php");
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
     <td width="60" align="center" bgcolor="#999999"><CENTER>
       <font color="#FFFFFF">สถานที่</font>
     </CENTER></td>
     <td width="220" height="29" align="center" bgcolor="#999999"><font color="#FFFFFF">EN</font></td>
     
   
     <td width="220" height="29" align="center" bgcolor="#999999"><font color="#FFFFFF">TH</font></td>
     <td width="220" align="center" bgcolor="#999999"><font color="#FFFFFF">CN</font></td>
     <td width="150" align="center" bgcolor="#999999"><font color="#FFFFFF">หมวดหม่</font></td>
     <td align="center" bgcolor="#999999"><font color="#FFFFFF">ค่าตอบแทน</font></td>
    
    <td width="60" align="center" bgcolor="#999999"><font color="#FFFFFF">สถานที่</font></td>
    </tr>  
  <?
 
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[sub] = $db->select_query("SELECT * FROM shopping_product_sub    WHERE main='".$_GET[main]."' ORDER BY  id ASC  ");
while($arr[sub] = $db->fetch($res[sub])){
 
 
 
	
	 
 $res[com] = $db->select_query("SELECT * FROM shopping_product_main WHERE id='".$_GET[main]."' ");
 $arr[main] = $db->fetch($res[com]);
 
 	 
 $res[plan] = $db->select_query("SELECT * FROM plan_product_price_name  WHERE id='".$_GET[plan_id]."' ");
 $arr[plan] = $db->fetch($res[plan]);
 
 

 
 

			///////////////
 
 
 

	//Comment Icon
	if($arr[sub][enable_comment]){
		$CommentIcon = " <IMG SRC=\"images/icon/suggest.gif\" WIDTH=\"13\" HEIGHT=\"9\" BORDER=\"0\" ALIGN=\"absmiddle\">";
	}else{
		$CommentIcon = "";
	}
			$bgcolor = ($i++ & 1) ? $bg1 : $bg2; 
 
?> 

 
 
     <tr  bgcolor='<?=$bgcolor?>'>
       <td height="30" align="center">
       
       
       
       
      
       
 
       
       
     <a  id="btn_menu_edit_type_<? echo $arr[sub][id];?>" >
       <i class="fa  fa-edit" style="width:40px; font-size:30px; color:#666666"  ></i>
       
       </a> 
     
     
     
   </td>
     <td height="30" align="center">
     
     
     
      
     
		<script>
		

			$( document ).ready(function() {
		
		
		$("#btn_menu_del_sub_<? echo $arr[sub][id];?>").click(function(){ 
  
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการลบ <? echo $arr[sub][topic_th];?>",
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

 
  $.post('go.php?name=content/load&file=type&op=sub_del&id=<? echo $arr[sub][id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });  
  
 
	  var url_page_type= "empty_style.php?name=content/load&file=type&main=<? echo $arr[sub][main];?>";
 
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
     
     
     
     
     
     
     
     
     
     
     
     <a id="btn_menu_del_sub_<? echo $arr[sub][id];?>"><i class="fa  fa-trash" style="width:40px; font-size:30px; color:#ff0000"  ></i> 
  
     </a></td>
     <td align="center" bgcolor="<?=$bgcolor?>">
	 
	 
	 
	 
	 <script>
	 
 
 
 $("#btn_menu_type_<? echo $arr[sub][id];?>").click(function(){
			 
	///		 alert(0);
			 
 $('#topic_edit').html('ประเภท > <? echo $arr[sub][topic_en];?>');
			 
  var url_page_type= "go.php?name=content/load&file=place&sub=<? echo $arr[sub][id];?>&main=<? echo $arr[sub][main];?>";
 
      $('#show_data_page').load(url_page_type);
 
	   
	      });
	   
	   </script>
       
       
       
       
       
       
        <script>
	 
 
 
 $("#btn_menu_edit_type_<? echo $arr[sub][id];?>").click(function(){
 
			 
 $('#topic_edit').html('แก้ไข <? echo $arr[sub][topic_en];?>:<? echo $arr[project][topic_th];?>');
			 
  var url_page_type_<? echo $arr[sub][id];?>= "go.php?name=content/load&file=type&op=sub_edit&id=<? echo $arr[sub][id];?>&main=<? echo $arr[sub][main];?>";
 
  $('#show_data_page').load(url_page_type_<? echo $arr[sub][id];?>);
 
 
	   });
	   
 
	   </script>
       
       
 
       
       <a   id="btn_menu_type_<? echo $arr[sub][id];?>" data-toggle="modal" data-target="#myModal_texts"  > <i class="fa  fa-plus-circle" style="width:40px; font-size:30px; color:#1CBBB4"  ></i></a>
   
       
       </td>
     <td align="center">  
    <? echo $arr[sub][topic_en];?></a></td>
         <td align="center">
           
           <? echo $arr[sub][topic_th];?></a>  
           
         </td>
         <td align="center"> <? echo $arr[sub][topic_cn];?> </td>
         <td align="center">
		 
		 
		 <? echo $arr[main][topic_en];?></td>
         <td align="center">
		 
         <?  if($arr[plan][id] > 0) {?>
	 
		 <?=$arr[plan][topic_th]?>
         <? } ?>
         
         
         <?  if($arr[plan][id] <1) {?>
	 
		<font color="#FF0000">ยังไม่มี</font>
         <? } ?>
         
         
         
         
         </td>
         
         
         
   <td align="center">    
     
     
     
     <?
		 	echo $allplace = $db->num_rows('shopping_product',"id","sub=".$arr[sub][id]."");
		 ?>
     
     
   </td>
 </tr>
	  <TR>
		  <TD colspan="27" height="1" class="dotline"></TD>
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
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_main where   id=".$_GET[main]."  ");
$arr[projecttype] = $db->fetch($res[projecttype]);

 
$res[place] = $db->select_query("SELECT * FROM shopping_product  where  id=".$_GET[id]." ");
$arr[place] = $db->fetch($res[place]);


$res[plan] = $db->select_query("SELECT * FROM shopping_product  where  id=".$_GET[id]." ");
$arr[plan] = $db->fetch($res[plan]);
	
	
	
 $res[plan] = $db->select_query("SELECT * FROM shopping_product  where  id=".$_GET[id]." ");
$arr[plan] = $db->fetch($res[plan]);


 $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[place][id]."' and plan_id='".$_GET[plan_id]."' and plan_master='".$_GET[plan_number]."'");
 $arr[open] = $db->fetch($res[open]);
 
 
	
//  $plan_country = $arr[open][price_list];	
 
 $plan_country  = $db->num_rows('product_price_list_all',"id","plan_setting=".$arr[open] [id]."  ");	
 
 if($plan_country==0){ 
 
 
 $res[country] = $db->select_query("SELECT * FROM web_country  ORDER BY  sort_country    ");
while($arr[country] = $db->fetch($res[country])){
 
 
  		$db->add_db('product_price_list_all',array(
		 
		"country"=>$arr[country][id], 
		"country_name"=>$arr[country][name_en], 
		"country_code"=>$arr[country][country_code], 
		 "country_name_th"=>$arr[country][name_th], 
		 "sort_country"=>$arr[country][sort_country], 
		 
	 	"status"=>$arr[country][status],  
		
		"plan_setting"=> $arr[open][id],
		
		"plan_id"=>$_GET[plan_id],		
		 
		"product_id"=>$_GET[id]
		
	 
 
 
		));
		
		
		}
	  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('plan_product_price_setting', array(
 
			  "price_list" =>1
 
		)," id='".$arr[open][id]."' ");

 


///
 
 
 }
 
 
 
 
 
  if($arr[open][price_all] == 1){
		  	$chk_price_all = 'checked="checked"'; 
		  ?>
          
        		<script>  
 var url_page_type_all= "empty_style.php?name=content/load/list&file=price&id=<?=$arr[open][id];?>&type=all&plan_id=<?=$_GET[plan_id]?>";
		   
     url_page_type_all =url_page_type_all+"&control="+document.getElementById('check_user_price_control').value;
 
  $('#load_main_price_list').load(url_page_type_all);
  
		</script>	
          
          
          <? } 
		  
		 else {
		  	$chk_price_all = '';
			?>
			
			<script>
			
 	
			  $('#btn_load_all').hide();
			
			</script>
            
            
            <?
	 
		  }
 
		  if($arr[open][price_extra] == 1){
		  	$chk_price_extra = 'checked="checked"';
			
			?>
            
            <script>
			
			  var url_page_type= "go.php?name=content/load/list/country&file=list_country&op=open_extra&id=<? echo $arr[open][id];?>&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
  url_page_type =url_page_type+"&status="+document.getElementById('check_price_status').value;
$('#load_extra_country_status').load(url_page_type);
			</script>
            
            <?
			
		  }
		  
		 else {
		  	$chk_price_extra = '';
			?>
            
            			<script>
			  $('#btn_load_extra').hide();
			
			</script>
			
			<?
		  }
   
	 
 
 
?>


 


<? if($arr[open] [open_counter]==0){ ?>
 
<script>
 
 $('.check_load_park_counter').hide();
 $('.check_load_person_counter').hide();
 $('.check_load_commision_counter').hide();
 
</script>
<? } ?>


<? if($arr[open] [open_all]==0){ ?>
 
<script>
 
 $('.check_load_park_all').hide();
 $('.check_load_person_all').hide();
 $('.check_load_commision_all').hide();
 
</script>
<? } ?>


<? if($arr[open] [open_driver]==0){ ?>
 
<script>
 
 $('.check_load_park_driver').hide();
 $('.check_load_person_driver').hide();
 $('.check_load_commision_driver').hide();
 
</script>
<? } ?>






  <FORM NAME="myform"   id="myform"   enctype="multipart/form-data">
  <?
  include("mod/content/menu/price.php");
?> 
  
  
  
  
  
  
  <br>
      
 
 

   <style>
 .div-menu-palce{
	 padding:5px;   border-radius: 8px; border: 2px solid #ddd;background-color:#FFFFFF;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-top:-15px;
 	 
	 
	 
 }
 
 
 
 .input-disable { 
 
    color: #333; 
    border: 0px solid #666 ;
	 pointer-events: none; background:none; 
}
 

 
 
    </style>

    <table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tbody>
        <tr>
 
          <td width="500">  <div class="font-34"><b><?=$arr[place][topic_th]?></td>
          <td><strong><a id="btn_menu_set_price"><span  class="font-34"><i class="fa  fa-refresh" style="width:40px; font-size:30px;"   ></i>   รีเฟรช </span></a></strong>
          
          
          
          
                
         <script>
		 
		 
 
 $("#btn_menu_set_price").click(function(){
 	 
 $('#topic_edit').html('ค่าตอบแทน> <? echo $arr[place][topic_th];?>');
			 
  var url_page_type= "go.php?name=content/load&file=price&op=sub_add&id=<? echo $_GET[id];?>&sub=<? echo $_GET[sub];?>&main=<? echo $_GET[main];?>&plan_id=<? echo $_GET[plan_id];?>&plan_number=<? echo $_GET[plan_number];?>";
 
 $('#show_data_page').load(url_page_type);
  
	      });
	   
	   </script>   
          
          
          
          
          
          
          
          
          </td>
        </tr>
      </tbody>
    </table>
    <table width="100%" border="0" cellspacing="2" cellpadding="2" style="margin-top:10px;">
      <tbody>
        <tr>
          <td class="font-22"><div id="save_data_open" style="display:none"></div>
          
          <script>
		  
		  
 
		  
		  
 $("#check_price_extra").click(function(){
 
	 
	 if ($('#check_price_extra').prop('checked')) {
		 
 $('#check_price_status').val(1);
 
 $('#load_extra_country_list').show();
  
   $('#btn_load_extra').show();
  
 $('#btn_load_extra').click();
 
  var url_page_type= "go.php?name=content/load/list/country&file=list_country&op=open_extra&id=<? echo $arr[open][id];?>&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
  url_page_type =url_page_type+"&status="+document.getElementById('check_price_status').value;
$('#load_extra_country_status').load(url_page_type);





  
 
    // h 
}
	  else  {
		  
	 $('#check_price_status').val(0);	  
	 $('#btn_load_extra').hide();
	 
 $('#load_extra_country_list').hide(); 
$('#load_extra_country_status').html('');



 $('#btn_load_all').click();

 
		  
	  }
	  
	  
 var url_page_type= "go.php?name=content/load&file=price&op=open_extra&id=<? echo $arr[open][id];?>&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
  url_page_type =url_page_type+"&status="+document.getElementById('check_price_status').value;
$('#save_data_open').load(url_page_type);
 
	  
 });
		  </script>
          
          
          
          
          
  <script>
		  
 $("#check_price_all").click(function(){
 
	 
	 if ($('#check_price_all').prop('checked')) {
		 
 $('#check_price_status').val(1);
 
  $('#btn_load_all').show();
    $('#btn_load_all').click();
 
 
    //blah blah
}
	  else  {
		  
	 $('#check_price_status').val(0);	  
	 $('#btn_load_all').hide();
		  
	  }
	  
	  
 var url_page_type= "go.php?name=content/load&file=price&op=open_all&id=<? echo $arr[open][id];?>&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
  url_page_type =url_page_type+"&status="+document.getElementById('check_price_status').value;
$('#save_data_open').load(url_page_type);
 
	  
 });
		  </script>
          
   
   
   
   
          
          <input name="check_price_status" type="hidden" class="sload_park_driver" id="check_price_status" style="width:<?=$taxt_w?>px; background:#FFFFFF" value="0" />
   
          
          
          </td>
          </tr>
      </tbody>
    </table>
 
 

  
  <br>
  
  <?
  
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
  $res[price] = $db->select_query("SELECT * FROM plan_product_price_name where  id=".$_GET[plan_id]."   ");
             
  $arr[price] = $db->fetch($res[price]);
 
  
  
  
 $show_park=$arr[price][price_park];
 $show_person=$arr[price][price_person];
  $show_commision=$arr[price][price_commision];
  
  
  
  
  if($show_park==1){	  
$status_show_park='show';	   	  
  }
    
  if($show_park==0){	  
$status_show_park='hide';	  	  
  }
  
  
    
  if($show_person==1){	  
$status_show_person='show';	   	  
  }
  
 if($show_person==0){	  
$status_show_person='hide';	    	  
  }
  
   if($show_commision==1){	  
$status_show_commision='show';	   	  
  }
  
    if($show_commision==0){	  
$status_show_commision='hide';	  
  }
   
  //echo $arr[place][price_plan];
  $tb_w='300';
  ?>
 
 
  <script>
  
$('#main_td_park').<?=$status_show_park?>();
$('#main_td_person').<?=$status_show_person?>();
$('#main_td_commision').<?=$status_show_commision?>();


$('.main_td_park').<?=$status_show_park?>();
$('.main_td_person').<?=$status_show_person?>();
$('.main_td_commision').<?=$status_show_commision?>();

  </script>
  
  
  

  <table width="100%" border="0" cellspacing="2" cellpadding="2" class="div-menu-palce">
            <tbody>            
              <tr>
                <td width="30"><span style="margin-top:-5px;">
                
 
 <input  setid="<?=$arr[open_2][id]?>" plan="2"    id="check_price_all"  name="check_price_all"  type="checkbox" class="checkbox-plan-flag"  value="1" <?=$chk_price_all?> />
                  
 
                </span></td>
                <td width="140" class="font-24"><strong>ราคาทั้งหมด</strong></td>
                <td width="30"><span style="margin-top:-5px;">
                  <input  setid="<?=$arr[open_2][id]?>" plan="2"  mainplan="<? echo $arr[place][price_plan_2];?>"    id="check_price_extra"  name="check_price_extra"    type="checkbox" class="checkbox-plan-flag"  value="1" <?=$chk_price_extra?> />
                </span></td>
                <td width="200" class="font-24"><strong>ราคาตามสัญชาติ</strong></td>
                <td ><div id="load_extra_country_status"></div></td>
              </tr>
            </tbody>
          </table>
  
  <br>
  
  <script>
  
    var url_page_type= "go.php?name=content/load/list/country&file=open_country&op=open_extra&id=<? echo $arr[open][id];?>&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>&plan_id=<?=$_GET[plan_id]?>";
  url_page_type =url_page_type+"&status="+document.getElementById('check_price_status').value;
$('#load_extra_country_list').load(url_page_type);
  </script>
  
   <style>  
  .checkbox-plan-flag{ width:25px; height:25px; }
 
 </style>    
 
  <div id="load_extra_country_list" style="display:none<?=$chk_price_extra?>"></div> 
  

 
 
 
 
 
 
 
 
 
 
 
   <script>
 
			 


 $("#a_btn_load_all").addClass('active-a');
  
  
  
  
$("#btn_load_all").click(function(){ 

 $("#check_user_price_country").val('all');

$("#btn_load_all").addClass('active');

$("#btn_load_extra").removeClass('active');

 



 $('#load_main_price_list').html('<center><img src="images/loader.gif" >');


  var url_page_type_all= "empty_style.php?name=content/load/list&file=price&id=<?=$arr[open][id];?>&type=all&plan_id=<?=$_GET[plan_id]?>";
  
  
     url_page_type_all =url_page_type_all+"&control="+document.getElementById('check_user_price_control').value;
	 
	 
  $('#load_main_price_list').load(url_page_type_all);
  
   $("#tab_btn_load_price_all").click();
  
});



 
 
 
 
 
$("#btn_load_extra").click(function(){ 


 $("#check_user_price_country").val('extra');


$("#btn_load_all").removeClass('active');

$("#btn_load_extra").addClass('active');

 
 


 $('#load_main_price_list').html('<center><img src="images/loader.gif" >');

  var url_page_type_all= "empty_style.php?name=content/load/list&file=price&id=<?=$arr[open][id];?>&type=extra&plan_id=<?=$_GET[plan_id]?>";
  
 url_page_type_all =url_page_type_all+"&control="+document.getElementById('check_user_price_control').value;
  
  
 $('#load_main_price_list').load(url_page_type_all);
 
 
 $("#tab_btn_load_price_extra").click();
 

 
 
  
});

 
 
 
	   
	   </script>
       
       
   <style>
 
.tab-content{
    background-color:#303136; 
    color:#000;
    padding:5px;border: 3px solid #ddd;
}
.nav-tabs > li > a{
  border: medium none;font-size:24px;color:#000;border: 3px solid #ddd;  background-color:#f6f6f6 ;
  padding:5px
}
.nav-tabs > li > a:hover{
 
    border: medium none;
    border-radius: 0; font-size:24px;padding:5px
   color:#000;
   
   
} 


.nav-tabs > li > a:focus{
  background-color:<?=$main_color;?> !important ;
    border: medium none;
    border-radius: 0; font-size:24px;padding:5px
   color:#000;
   
   
} 
 
 
 
   </style>   
   
   <? if($_GET[user]=='user'){ 
   
     $tab_color='#FF0000'; 
   
  
   
   }  else {
	   
	   $tab_color='#5BACD3'; 
	   
   }
   
   
   
   ?>
   
   
 
<style>
 


 .active a {
    border-radius: 5px  !important; color:#FFFFFF  !important; background-color: <?=$tab_color?> !important;padding:5px;border: 0px solid #0 !important;
}
 
 

.main-price-tab{
  background-color:<?=$main_color;?> !important ;
    border: medium none;
    border-radius: 0; font-size:24px;padding:20px
   color:#000;
   
   
} 


</style>   





<br><br>









 
<div class="main-price-tabs"  style="margin-top:-10px;">

<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="610">       
<div>
  <ul class="nav nav-tabs" style="width:600px; margin-top:10px;">
    <li class="active" style="width:300px; text-align:center; " id="btn_load_all" ><a   id="a_btn_load_all"  ><strong> ราคาทั้งหมด</span></strong></a></li>
  
    <li   style="width:300px; text-align:center" id="btn_load_extra" ><a   id="a_btn_load_extra" ><strong>ราคาตามสัญชาติ</strong></a></li>
    

 
  </ul>
 


</div></td>
      <td width="240" valign="bottom"><span style="font-size:16px;">
        <select  class="form-control" name="check_user_price_control" id="check_user_price_control" style="width:220px;; font-size:26px; padding:5px; height:60px; font-weight:bold;  background:#FFFDE0"" >
        
        
                 <option value="company">บริษัท</option>
        
           <option value="user">ผู้ใช้งาน</option>
 
        
 
        </select>
      </span>
      
      <input   type="hidden"   id="check_user_price_country" name="check_user_price_country" style="width:<?=$taxt_w?>px; background:#FFFFFF" value="all" />
      
      
      
      
      
      
      
      
      
      
      
      </td>
      <td valign="middle"><a id="btn_menu_set_price_tab"><span  class="font-34"><i class="fa  fa-refresh" style="width:30px; font-size:26px;"   ></i>รีเฟรช </span></a></strong>
          
          
          
          
                
         <script>
		 
		 
 
 $("#btn_menu_set_price_tab").click(function(){
 	 
 $('#topic_edit').html('ค่าตอบแทน> <? echo $arr[place][topic_th];?>');
			 
  var url_page_type= "go.php?name=content/load&file=price&op=sub_add&id=<? echo $_GET[id];?>&sub=<? echo $_GET[sub];?>&main=<? echo $_GET[main];?>&plan_id=<? echo $_GET[plan_id];?>&plan_number=<? echo $_GET[plan_number];?>";
 
 $('#show_data_page').load(url_page_type);
  
	      });
	   
	   </script>   
          
          
          
          
          
          
          
          
          </td>
    </tr>
  </tbody>
</table>

 
 

<div id="load_main_price_list"   > 
 
  
  
    </div>
  
  
 
      </div>
  
  
  
  
  
  
  
  
  <script>
  
      $("#check_user_price_control").change(function(){ 
	  
 
	   
  if(document.getElementById('check_user_price_country').value=="all") {
	  
$("#btn_load_all").click();
 
} else {
	
	$("#btn_load_extra").click();
	
}

	 
 	 });
	 
  
  
 
  
   var url_page_type= "go.php?name=content/load/popup&file=price&plan_setting=<?=$arr[open] [id]?>";
   
    url_page_type =url_page_type+"&control="+document.getElementById('check_user_price_control').value;
	
	
 if(document.getElementById('check_user_price_control').value=='company'){
		
// $("#load_main_price_all").hide();	
 } else{
	 
			
// $("#load_main_price_all").show();	 
	 
 }
   
 
  $('#load_main_price_all').load(url_page_type);
  </script>
 
  
  <style>
    .div-show-price{
	 padding:5px;   border-radius: 8px; border: 1px solid #ddd;  margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-top:10px;
 	 
	 
	 
 }
 
  
  </style>
  
  
 
 
 
  
  <div id="load_main_price_all" style="margin-top:10px;"></div>
  
  
  
  
  
  
 
  <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%">&nbsp; </td>
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
		$res[project] = $db->select_query("SELECT * FROM shopping_product_sub  WHERE id='".$_GET[id]."' ");
		$arr[project] = $db->fetch($res[project]);
		
		
		
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projecttype] = $db->select_query("SELECT * FROM shopping_product_main where   id=".$_GET[main]."  ");
$arr[projecttype] = $db->fetch($res[projecttype]);
 
?>
   
<FORM NAME="myform" id="myform"   enctype="multipart/form-data">
<?
 include("mod/content/menu/sub.php");
?> 

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="3" cellpadding="3">
          <tr>
            <td><strong>หมวดหมู่ : </strong></td>
            <td style="font-size:16px;"><?=$arr[projecttype][topic_th]?><input name="main" type="hidden" class="form-control" id="main" style="width:500px; background:#FFFFFF" value="<?=$_GET[main]?>" /></td>
          </tr>
          <tr>
            <td><strong>ค่าตอบแทน : </strong></td>
            <td style="font-size:16px;"><select  class="form-control" name="price_plan" id="price_plan" style="width:500px;; font-size:16px; padding:5px; height:40px" >
              <option value="">- เลือกประเภทค่าตอบแทน -</option>
              <?
                                  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
                                    $res[category] = $db->select_query("SELECT * FROM plan_product_price_name ORDER BY id  limit 100 ");
                      
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] ==$arr[project][price_plan]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][topic_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
            </select></td>
          </tr>
		          <tr>
		            <td><strong>ชื่อ EN : </strong></td>
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
          <td><button type="button" class="btn btn-primary btn-lg"   id="submit_data" > <span id="txt_btn_save"> บันทึกข้อมูล </span> </button>
            <script>
  $("#submit_data").click(function(){
				 
  
   if(document.getElementById('price_plan').value=="") {
alert('กรุณาเลือกประเภทค่าตอบแทน'); 
document.getElementById('price_plan').focus() ; 
return false ;
}

 

   if(document.getElementById('topic_th').value=="") {
alert('กรุณากรอกชื่อภาษาไทย'); 
document.getElementById('topic_th').focus() ; 
return false ;
}


 
 
 
 		 
  $.post('go.php?name=content/load&file=type&op=sub_edit_action&id=<?=$_GET[id];?>',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });
  
  
	  var url_page_type= "empty_style.php?name=content/load&file=type&main=<? echo $arr[project][main];?>";
	  
 
 
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

 if($_GET[op] == "sub_add_action"  ){ ?>
 
 <script>
 /// alert(0);
 
 </script>
 
 
 <?  
	 
	 
 
	//////////////////////////////////////////// ó Database
 		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

	while(
		list($key, $id) = each ($_POST['id'])
		
 
		
		and list($key, $price_park_company) = each ($_POST['price_park_company'])
		and list($key, $price_park_driver) = each ($_POST['price_park_driver'])
		and list($key, $price_park_counter) = each ($_POST['price_park_counter'])
		and list($key, $price_park_all) = each ($_POST['price_park_all'])
		
		
		and list($key, $price_person_company) = each ($_POST['price_person_company'])	
		and list($key, $price_person_driver) = each ($_POST['price_person_driver'])
		and list($key, $price_person_counter) = each ($_POST['price_person_counter'])
		and list($key, $price_person_all) = each ($_POST['price_person_all'])
		
		
		and list($key, $price_commision_company) = each ($_POST['price_commision_company'])		
		and list($key, $price_commision_driver) = each ($_POST['price_commision_driver'])
		and list($key, $price_commision_counter) = each ($_POST['price_commision_counter'])
		and list($key, $price_commision_all) = each ($_POST['price_commision_all'])
 
 
	){

///

		$db->update_db('product_price_list_all',array(
		
 
		 "price_park_company"=>$price_park_company,
		 "price_park_driver"=>$price_park_driver,
		  "price_park_counter"=>$price_park_counter,
		 "price_park_all"=>$price_park_all,
 
		 
 		 "price_person_company"=>$price_person_company,
 		 "price_person_driver"=>$price_person_driver,
		  "price_person_counter"=>$price_person_counter,
		 "price_person_all"=>$price_person_all,
		 
  
		   "price_commision_company"=>$price_commision_company,		 
		   "price_commision_driver"=>$price_commision_driver,
		  "price_commision_counter"=>$price_commision_counter,
		 "price_commision_all"=>$price_commision_all 
 
 
			
 
		)," id='".$id."' ");
	 
 


	}
	
 
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
			"main"=>"$_POST[main]",
			
		 
			
			
			
		"topic_en"=>"$_POST[topic_en]",
		
		"price_plan"=>"$_POST[price_plan]",
 
 
  
		)," id=$_GET[id] ");
	 
		
		
		
	}
 
 
 ?>
 
 
 
 
 
 <?
  if($_GET[op] == "sub_del"){
	//////////////////////////////////////////// óź Form
 
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->del('shopping_product_sub'," id='".$_GET[id]."' "); 
	 
		$db->closedb ();
		
	?>	
    
    
 
    
    
    
    
		
	<?	
  }
  
  
  
          if($_GET[op] == "open_extra"){
		  
 
		  
	//////////////////////////////////////////// óź Form
	//  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('plan_product_price_setting', array(
 
 
		"price_extra"=>"$_GET[status]"
	 
 
		)," id='".$_GET[id]."' ");

  }
  
  
  
  
  
  if($_GET[op] == "open_all"){
 
	//////////////////////////////////////////// óź Form
	//  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('plan_product_price_setting', array(
 
 
		"price_all"=>"$_GET[status]"
	 
 
		)," id='".$_GET[id]."' ");

  }
  
  
  
  
?>
 
 
 
 
 
 
 
 <script>
 $("#submit_data_set").click(function(){
	 
	 
 $(".load_park_company").val($('#main_price_park_company').val()); 
 
 $(".load_park_driver").val($('#main_price_park_driver').val()); 
  $(".load_park_counter").val($('#main_price_park_counter').val());
   $(".load_park_all").val($('#main_price_park_all').val());
   
   
       $(".load_person_company").val($('#main_price_person_company').val());
	   
    $(".load_person_driver").val($('#main_price_person_driver').val());
	 $(".load_person_counter").val($('#main_price_person_counter').val());
	  $(".load_person_all").val($('#main_price_person_all').val());
	  
 
	  
    $(".load_commision_company").val($('#main_price_commision_company').val());  
	
	   $(".load_commision_driver").val($('#main_price_commision_driver').val());
	    $(".load_commision_counter").val($('#main_price_commision_counter').val());
		 $(".load_commision_all").val($('#main_price_commision_all').val());
		 
 
 
 
			   });
			   
			   
			   
 
			   
			   
			  </script>
			  
   