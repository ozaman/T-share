<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
 
 <br />

   <?  include ("bootstrap/fonts/all.php");?> 
	<? 
		$day = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
		for($i=1;$i<=24;$i++){
			$invID = str_pad($i, 2, '0', STR_PAD_LEFT);
			$hour[] = $invID;
		}
		for($i=0;$i<=11;$i++){
			$cal = $i*5;
			$invID = str_pad($cal, 2, '0', STR_PAD_LEFT);
			$time[] = $invID;
		}
		
	?>
 
 <TABLE cellSpacing=0 cellPadding=0 width=100% border=0>
 <TBODY>
        <TR>
          <TD width="100%" vAlign=top><!-- Admin -->
            <TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					
				</TR>
				<TR>
					<TD valign="top">  <?
					
					
 require_once("css/maincss.php")	;
					
  // include("includes/class.resizepic.php");
					
//////////////////////////////////////////// ʴ¡ Project   
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
     <td width="50" align="center" bgcolor="#999999"><font color="#FFFFFF">ลบ</font></td>
      
     
     <td width="200" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">EN</font></td>
     
   
     <td width="200" height="30" align="center" bgcolor="#999999"><font color="#FFFFFF">TH</font></td>
     <td width="200" align="center" bgcolor="#999999"><font color="#FFFFFF">CN</font></td>
     <td width="250" align="center" bgcolor="#999999"><font color="#FFFFFF">ประเภทรายรับ</font></td>
     <td align="center" bgcolor="#999999"><font color="#FFFFFF">ติดต่อ</font></td>
     <td width="60" align="center" bgcolor="#999999"><font color="#FFFFFF">สถานะ</font></td>
    </tr>  
  <?
 
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[place] = $db->select_query("SELECT * FROM shopping_product   WHERE  sub='".$_GET[sub]."' ORDER BY  id ASC  ");
while($arr[place] = $db->fetch($res[place])){
	
	
	
	
 
 
 
	
	 
 $res[com] = $db->select_query("SELECT * FROM shopping_product_main WHERE id='".$_GET[main]."' ");
 $arr[main] = $db->fetch($res[com]);
 
 	 
 $res[type] = $db->select_query("SELECT * FROM plan_product_price_name WHERE id='".$arr[place][price_plan]."' ");
 $arr[type] = $db->fetch($res[type]);
 
 
 $res[type2] = $db->select_query("SELECT * FROM plan_product_price_name WHERE id='".$arr[place][price_plan_2]."' ");
 $arr[type2] = $db->fetch($res[type2]);
 
 $res[type3] = $db->select_query("SELECT * FROM plan_product_price_name WHERE id='".$arr[place][price_plan_3]."' ");
 $arr[type3] = $db->fetch($res[type3]);
 
 

 
 ///
 
 if($arr[place][price_list]==0){ 
 
 
 
 $res[country] = $db->select_query("SELECT * FROM web_country  ORDER BY  sort_country    ");
while($arr[country] = $db->fetch($res[country])){
 
 
  		$db->add_db('product_price_list_all',array(
		 
		"country"=>$arr[country][id], 
		"country_name"=>$arr[country][name_en], 
			"country_name_th"=>$arr[country][name_th], 
		 "sort_country"=>$arr[country][sort_country], 
	 	"status"=>$arr[country][status],   
		"product_id"=>$arr[place][id]
 
 
		));
		
		
		
	  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('shopping_product', array(
 
			  "price_list" =>1
 
		)," id='".$arr[place][id]."' ");

 
}
 
 
 }
 
 
 /////
 

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
       

             
         <?
  $string_to_replace     = array ("'");
$string_after_replace  = array ("");
  $arr[place][topic_en]     = str_replace($string_to_replace , $string_after_replace ,      $arr[place][topic_en], $count);   
 
  ?>
       

      
      
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
         <td>
   
         
 <style>
 .div-menu-price-plan{
  padding:5px;   border-radius: 5px; border: 1px solid #dadada;background-color:#FFFFFF;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ; margin-top: 5px;
 	 
 }
 
 
 
.checkbox-plan-1{ width:18px; height:18px; }
 .checkbox-plan-2{ width:18px; height:18px; }
.checkbox-plan-3{ width:18px; height:18px; }
 </style>    
         
         
         
         
         
         
         <script>
		 
		 
 
 $("#btn_menu_pay_plan_1_<? echo $arr[place][id];?>").click(function(){
 	 
 $('#topic_edit').html('ค่าตอบแทน> <? echo $arr[place][topic_th];?>');
			 
  var url_page_type= "go.php?name=content/load&file=price&op=sub_add&id=<? echo $arr[place][id];?>&sub=<? echo $arr[place][sub];?>&main=<? echo $arr[place][main];?>&plan_id=<? echo $arr[place][price_plan];?>&plan_number=1";
 
 $('#show_data_page').load(url_page_type);
  
	      });
	   
	   </script>
       
       
                <script>
	 
 
 
 $("#btn_menu_pay_plan_2_<? echo $arr[place][id];?>").click(function(){
 
			 
 $('#topic_edit').html('ค่าตอบแทน> <? echo $arr[place][topic_th];?>');
			 
  var url_page_type= "go.php?name=content/load&file=price&op=sub_add&id=<? echo $arr[place][id];?>&sub=<? echo $arr[place][sub];?>&main=<? echo $arr[place][main];?>&plan_id=<? echo $arr[place][price_plan_2];?>&plan_number=2";
 
 $('#show_data_page').load(url_page_type);
  
	      });
	   
	   </script>
         
         
 <script>
 
 $("#btn_menu_pay_plan_3_<? echo $arr[place][id];?>").click(function(){
 
			 
 $('#topic_edit').html('ค่าตอบแทน> <? echo $arr[place][topic_th];?>');
			 
  var url_page_type= "go.php?name=content/load&file=price&op=sub_add&id=<? echo $arr[place][id];?>&sub=<? echo $arr[place][sub];?>&main=<? echo $arr[place][main];?>&plan_id=<? echo $arr[place][price_plan_3];?>&plan_number=3";
 
 $('#show_data_page').load(url_page_type);
  
	      });
	   
	   </script>
         
         
		 
		<? if( $arr[place][price_plan]>0){ ?>
         
         
 
 
 
         
         
         <?
		 
 
 	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	
	
  $allplan_1 = $db->num_rows('plan_product_price_setting',"id","product_id=".$arr[place][id]." and plan_master=1");	
	
	
	if($allplan_1==0){ 
	
  		$db->add_db('plan_product_price_setting',array(
  	
		 "plan_id"=>$arr[place][price_plan],
		 "product_id"=>$arr[place][id],		 		 
		 "plan_master"=>1 
 
		
			));
			
 
			
			
			?>
            
           
         
      <script>
	 
 
 $("#all_place").click();
 
	   </script>        
           
           
           
           
            
            
            <?
			
			
			
	 		
	}
	
		 	if($allplan_1==1){ 
	
 
	
        $db->update_db('plan_product_price_setting', array(
 
		"plan_id"=>$arr[place][price_plan]
 
		)," product_id=".$arr[place][id]." and plan_master=1 ");
		
	}
	

 
   
		 ?>
         
          <?
		  
		if($allplan_1>0){ 
 
 
 
  $res[open_1] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[place][id]."' and plan_id='".$arr[place][price_plan]."' and plan_master=1");
 $arr[open_1] = $db->fetch($res[open_1]);
 
 
 //echo $arr[open_1][id];
	 		
	}
	
		  
		  
		  
		  
		  if($arr[open_1][open_driver] == 1){
		  	$chk_1_driver = 'checked="checked"';
		  }
		  
		 else {
		  	$chk_1_driver = '';
		  }
 
		  
		  
		  
		   if($arr[open_1][open_counter] == 1){
		  	$chk_1_counter = 'checked="checked"';
		  }
		  	    else {
		  	$chk_1_counter = '';
		  }
 
		  
		  
		  
		  if($arr[open_1][open_all] == 1){
		  	$chk_1_all = 'checked="checked"';
		  }
		  
		    else {
		  	$chk_1_all = '';
		  }
 
 
 
 
		  ?>
          
          
 
          
         
 
<div class="div-menu-price-plan">
         
         
         
         <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="25">
      
      <a   id="btn_menu_pay_plan_1_<? echo $arr[place][id];?>" data-toggle="modal" data-target="#myModal_texts"  >  
         <i class="fa fa-gg-circle" style="width:20px; font-size:20px; color:#1CBBB4"></i> 
         
         </a></td>
      <td> <b><?  echo $arr[type][topic_th];?></td>
    </tr>
  </tbody>
</table>

 <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td><input setid="<?=$arr[open_1][id]?>"  plan="1"  mainplan="<? echo $arr[place][price_plan];?>"    opentype="open_driver"  name="open_driver_1_<? echo $arr[place][id];?>"  id="open_driver_1_<? echo $arr[place][id];?>"   type="checkbox" class="checkbox-plan-1"  value="1"  <?=$chk_1_driver?> /></td>
      <td>คนขับ</td>
      <td><input  setid="<?=$arr[open_1][id]?>" plan="1"  mainplan="<? echo $arr[place][price_plan];?>" opentype="open_counter"  name="open_counter_1_<? echo $arr[place][id];?>"  id="open_counter_1_<? echo $arr[place][id];?>"  type="checkbox" class="checkbox-plan-1"    <?=$chk_1_counter?>/></td>
      <td>เคาน์เตอร์</td>
      <td><input   setid="<?=$arr[open_1][id]?>" plan="1"   mainplan="<? echo $arr[place][price_plan];?>" opentype="open_all" name="open_all_1_<? echo $arr[place][id];?>"  id="open_all_1_<? echo $arr[place][id];?>"   type="checkbox" class="checkbox-plan-1"  value="1" <?=$chk_1_all?> /> </td>
      <td>สมาชิก<?=$arr[open_1][id]?></td>
    </tr>
  </tbody>
</table>

 
        <script>
	 
 
 
 $(".checkbox-plan-1").click(function(){
 
	 //alert($(this).attr('id'));
 
 
	  var data_plan = $(this).attr("plan");
	 var data_mainplan = $(this).attr("mainplan"); 
	  
	  
	   var data_type = $(this).attr("opentype");
	   
	     var data_id = $(this).attr("setid");
	 
 
///	 alert(data_id);
	 
	 if ($('#'+$(this).attr('id')).prop('checked')) {
		 
		 
		 
 $('#main_check_open').val(1);
    //blah blah
}
	  else  {
		  
	 $('#main_check_open').val(0);	  
		  
	  }
	 
	 
	 
	 
	

 	 
  var url_page_type_<? echo $arr[place][id];?>= "go.php?name=content/load&file=place&op=open&id=<? echo $arr[place][id];?>&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
  
  url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&plan="+data_plan;
  
  url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&mainplan="+data_mainplan;
  
    url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&type="+data_type;
	
	 url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&status="+document.getElementById('main_check_open').value;
	 
	  url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&setid="+data_id ;
	  
	  
	  

	  
  
 
 setTimeout(function () {
$('#save_data_open').load(url_page_type_<? echo $arr[place][id];?>);
 
}, 500); //w
 
 
 ///	  alert(data_id);
  
 
 
	   });
	   
 
	   </script>







 
 
 </div>
 
 


      <? } ?>   
      
      
      		<? if( $arr[place][price_plan_2]>0){ ?>
            
            
            
            
             
         <?
		 
		 
 	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	
	
	$allplan_2= $db->num_rows('plan_product_price_setting',"id","product_id=".$arr[place][id]." and plan_master=2");	
	
	
	if($allplan_2==0){ 
	
  		$db->add_db('plan_product_price_setting',array(
  	
		 "plan_id"=>$arr[place][price_plan_2],
		 "product_id"=>$arr[place][id],		 		 
		 "plan_master"=>2 
 
		
			));
			
?>	

         
      <script>
	 
 
 $("#all_place").click();
 
	   </script>      		
			
<?	} 


	 	if($allplan_2==1){ 
	
 
	
        $db->update_db('plan_product_price_setting', array(
 
		"plan_id"=>$arr[place][price_plan_2]
 
		)," product_id=".$arr[place][id]." and plan_master=2 ");
		
	}
	




		 ?>
            
            
            
<?
		  
		if($allplan_2>0){ 
	

 
  $res[open_2] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[place][id]."' and plan_id='".$arr[place][price_plan_2]."' and plan_master=2");
 $arr[open_2] = $db->fetch($res[open_2]);
 
 
 
	 		
	}
	
		  
		  
		  
		  
		  if($arr[open_2][open_driver] == 1){
		  	$chk_2_driver = 'checked="checked"';
		  }
		  else {
		  	$chk_2_driver = '';
		  }
		  
		  
		  
		   if($arr[open_2][open_counter] == 1){
		  	$chk_2_counter = 'checked="checked"';
		  }
		  
	 else {
		  	$chk_2_counter = '';
		  }
		  
		  
		  if($arr[open_2][open_all] == 1){
		  	$chk_2_all = 'checked="checked"';
		  }
		  
	 else {
		  	$chk_2_all = '';
		  }
		  
 
 
		  ?>
            
            
            
            
            
       <div class="div-menu-price-plan">     
         
         
         <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="25"><a   id="btn_menu_pay_plan_2_<? echo $arr[place][id];?>" data-toggle="modal" data-target="#myModal_texts"  >  
     <i class="fa fa-gg-circle" style="width:20px; font-size:20px; color:#1CBBB4"></i> 
         
         </a></td>
      <td> <b><?  echo $arr[type2][topic_th];?></td>
    </tr>
  </tbody>
</table>


 <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td><input  setid="<?=$arr[open_2][id]?>" plan="2"  mainplan="<? echo $arr[place][price_plan_2];?>"    opentype="open_driver"  name="open_driver_2_<? echo $arr[place][id];?>"  id="open_driver_2_<? echo $arr[place][id];?>"   type="checkbox" class="checkbox-plan-2"  value="1" <?=$chk_2_driver?> /></td>
      <td>คนขับ</td>
      <td><input  setid="<?=$arr[open_2][id]?>" plan="2"  mainplan="<? echo $arr[place][price_plan_2];?>" opentype="open_counter"  name="open_counter_2_<? echo $arr[place][id];?>"  id="open_counter_2_<? echo $arr[place][id];?>"  type="checkbox" class="checkbox-plan-2"  <?=$chk_2_counter?> /></td>
      <td>เคาน์เตอร์</td>
      <td><input   setid="<?=$arr[open_2][id]?>" plan="2"   mainplan="<? echo $arr[place][price_plan_2];?>" opentype="open_all" name="open_all_2_<? echo $arr[place][id];?>"  id="open_all_2_<? echo $arr[place][id];?>"   type="checkbox" class="checkbox-plan-2"  value="1" <?=$chk_2_all?>/></td>
      <td>สมาชิก</td>
    </tr>
  </tbody>
</table>

 
        <script>
	 
 
 
 $(".checkbox-plan-2").click(function(){
 
	 //alert($(this).attr('id'));
 
 
	  var data_plan = $(this).attr("plan");
	 var data_mainplan = $(this).attr("mainplan"); 
	  
	  
	   var data_type = $(this).attr("opentype");
	 
	     var data_id = $(this).attr("setid");
	 
	 
	 if ($('#'+$(this).attr('id')).prop('checked')) {
		 
 $('#main_check_open').val(1);
    //blah blah
}
	  else  {
		  
	 $('#main_check_open').val(0);	  
		  
	  }
	 
	 
	 
	 
	

 	 
  var url_page_type_<? echo $arr[place][id];?>= "go.php?name=content/load&file=place&op=open&id=<? echo $arr[place][id];?>&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
  
  url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&plan="+data_plan;
  
  url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&mainplan="+data_mainplan;
  
    url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&type="+data_type;
	    url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&setid="+data_id;
	
	 url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&status="+document.getElementById('main_check_open').value;
  
 
 setTimeout(function () {
$('#save_data_open').load(url_page_type_<? echo $arr[place][id];?>);
 
}, 500); //w
 
 
	   });
	   
 
	   </script>
 



</div>

      <? } ?>   
      
      
            		<? if( $arr[place][price_plan_3]>0){ ?>
                    
                    
                      <?
		 
		 
 	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	
	
	$allplan_3= $db->num_rows('plan_product_price_setting',"id","product_id=".$arr[place][id]." and plan_master=3");	
	
	
	if($allplan_3==0){ 
	
  		$db->add_db('plan_product_price_setting',array(
  	
		 "plan_id"=>$arr[place][price_plan_3],
		 "product_id"=>$arr[place][id],		 		 
		 "plan_master"=>3 
 
		
			));
			
		?>
        
                 
      <script>
	 
 
 $("#all_place").click();
 
	   </script>      
        <?	
			
 	
	 		
	}
		
   	 	if($allplan_3==1){ 
	
 
	
        $db->update_db('plan_product_price_setting', array(
 
		"plan_id"=>$arr[place][price_plan_3]
 
		)," product_id=".$arr[place][id]." and plan_master=3 ");
		
	}
		 ?>
         
         <?
		  
		if($allplan_3>0){ 
	

 
  $res[open_3] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE product_id='".$arr[place][id]."' and plan_id='".$arr[place][price_plan_3]."' and plan_master=3");
 $arr[open_3] = $db->fetch($res[open_3]);
 
	 		
	}
	
		  
		  
		  
		  
		  if($arr[open_3][open_driver] == 1){
		  	$chk_3_driver = 'checked="checked"';
		  }
		  
		  else {
		  	$chk_3_driver = '';
		  }
		  
		  
		  
		   if($arr[open_3][open_counter] == 1){
		  	$chk_3_counter = 'checked="checked"';
		  }
		  
		  else {
		  	$chk_3_counter = '';
		  }
		  
		  
		  
		  if($arr[open_3][open_all] == 1){
		  	$chk_3_all = 'checked="checked"';
		  }
		  
		  else {
		  	$chk_3_all = '';
		  }
		  
 
 
		  ?>
            
         
 <div class="div-menu-price-plan">
         
 <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
      <td width="25"><a   id="btn_menu_pay_plan_3_<? echo $arr[place][id];?>" data-toggle="modal" data-target="#myModal_texts"  >  
     <i class="fa fa-gg-circle" style="width:20px; font-size:20px; color:#1CBBB4"></i> 
         
         </a></td>
      <td> <b><?  echo $arr[type3][topic_th];?></td>
    </tr>
  </tbody>
</table>



 <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tbody>
    <tr>
      <td><input setid="<?=$arr[open_3][id]?>" plan="3"  mainplan="<? echo $arr[place][price_plan_3];?>"    opentype="open_driver"  name="open_driver_3_<? echo $arr[place][id];?>"  id="open_driver_3_<? echo $arr[place][id];?>"   type="checkbox" class="checkbox-plan-3"  value="1" <?=$chk_3_driver?>/></td>
      <td>คนขับ</td>
      <td><input  setid="<?=$arr[open_3][id]?>" plan="3"  mainplan="<? echo $arr[place][price_plan_3];?>" opentype="open_counter"  name="open_counter_3_<? echo $arr[place][id];?>"  id="open_counter_3_<? echo $arr[place][id];?>"  type="checkbox" class="checkbox-plan-3"  <?=$chk_3_counter?> /></td>
      <td>เคาน์เตอร์</td>
      <td><input   setid="<?=$arr[open_3][id]?>" plan="3"   mainplan="<? echo $arr[place][price_plan_3];?>" opentype="open_all" name="open_all_3_<? echo $arr[place][id];?>"  id="open_all_3_<? echo $arr[place][id];?>"   type="checkbox" class="checkbox-plan-3"  value="1"  <?=$chk_3_all?> /></td>
      <td>สมาชิก</td>
    </tr>
  </tbody>
</table>

 
        <script>
	 
 
 
 $(".checkbox-plan-3").click(function(){
 
	 //alert($(this).attr('id'));
 
 
	  var data_plan = $(this).attr("plan");
	 var data_mainplan = $(this).attr("mainplan"); 
	  
	  
	   var data_type = $(this).attr("opentype");
	 
    var data_id = $(this).attr("setid");
	 
	 
	 if ($('#'+$(this).attr('id')).prop('checked')) {
		 
 $('#main_check_open').val(1);
    //blah blah
}
	  else  {
		  
	 $('#main_check_open').val(0);	  
		  
	  }
	 
	 
	 
	 
	

 	 
  var url_page_type_<? echo $arr[place][id];?>= "go.php?name=content/load&file=place&op=open&id=<? echo $arr[place][id];?>&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
  
  url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&plan="+data_plan;
  
  url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&mainplan="+data_mainplan;
  
    url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&type="+data_type;
	
 url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&setid="+data_id;
	
	
	 url_page_type_<? echo $arr[place][id];?> =url_page_type_<? echo $arr[place][id];?>+"&status="+document.getElementById('main_check_open').value;
  
 
 setTimeout(function () {
$('#save_data_open').load(url_page_type_<? echo $arr[place][id];?>);
 
}, 500); //w
 
 
	   });
	   
 
	   </script>







 
</div>



      <? } ?>   
         
         
         
         
         
         </td>
         <td align="center"><table width="100%" border="0" cellspacing="2" cellpadding="2">
           <tbody>
             <tr>
               <td width="30">      
               
               
               
               
               
               
               
               
                  <script>
	 
 
 $("#btn_menu_contact_<? echo $arr[place][id];?>").click(function(){
 
			 
 $('#topic_edit').html('แก้ไข <? echo $arr[place][topic_en];?>:<? echo $arr[project][topic_th];?>');
			 
  var url_page_type_<? echo $arr[place][id];?>= "go.php?name=content/load&file=contact&contact=<? echo $arr[place][id];?>&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
 
  $('#show_data_page').load(url_page_type_<? echo $arr[place][id];?>);
 
 
	   });
	   
 
	   </script>
               
               
               
               
                <a   id="btn_menu_contact_<? echo $arr[place][id];?>" data-toggle="modal" data-target="#myModal_textss"  ><i class="fa  fa-user" style="width:30px; font-size:30px; color:#448CCB"  ></i>  </a></td>
               <td><?
 include("mod/content/load/list/contact.php");
?> 
 </td>
             </tr>
           </tbody>
         </table></td>
         <td align="center" id="">
           
           
           <script>
		

			$( document ).ready(function() {
				
		
		
		$("#btn_menu_status_place_<? echo $arr[place][id];?>").click(function(){ 
  
  
  	  
 if(document.getElementById('status_<? echo $arr[place][id];?>').value=="1") {
 
 
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการปิด <? echo $arr[place][topic_th];?>",
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



 
  $.post('go.php?name=content/load&file=place&op=status_close&id=<? echo $arr[place][id];?>&staus=0',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });  
  
 
    setTimeout(function () {
  var url_page_type= "empty_style.php?name=content/load&file=place&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
 
  $('#show_data_page').load(url_page_type);
 
}, 1000); //w
 
  


///
 
 
	//  alert('dd');
    } else {
      swal("Cancelled", "", "error");
    }
	});
	   
	    
 }
		
		
	
//////////

  	  
 if(document.getElementById('status_<? echo $arr[place][id];?>').value=="0") {
 
 
  
	   swal({
		title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
		text: "<font style='font-size:22px'>ว่าต้องการเปิด  <? echo $arr[place][topic_th];?>",
		type: 'info',
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
 
 
  $.post('go.php?name=content/load&file=place&op=status_open&id=<? echo $arr[place][id];?>&staus=1',$('#myform').serialize(),function(response){
  $('#div_send_data_msg').html(response);  });  
  
 
    setTimeout(function () {
  var url_page_type= "empty_style.php?name=content/load&file=place&main=<? echo $arr[place][main];?>&sub=<? echo $arr[place][sub];?>";
 
  $('#show_data_page').load(url_page_type);
 
}, 1000); //w
 
 

///
 
 
	//  alert('dd');
    } else {
      swal("Cancelled", "", "error");
    }
	});
	   
	    
 }
		
	
	
	
	
	
	
	
	
		
		
		
		
		
		
		

});

});

		
		
		 
		</script>
           
           
           
           <input class="form-control" name="status_<? echo $arr[place][id];?>" type="hidden"  id="status_<? echo $arr[place][id];?>" style="width:500px; background:#FFFFFF" value="<? echo $arr[place][status];?>" />
           
           
           
           
           
           
           
           
           
           <a id="btn_menu_status_place_<? echo $arr[place][id];?>">
             
             
             <? if( $arr[place][status] ==1){ ?>
             
             <div id="place_status_<? echo $arr[place][id];?>">
               
               <font color="#FF0000" class="font-24">เปิด</font></div>
             
             <? } ?>
             
             
             <? if( $arr[place][status] <>1){ ?>
             
             <div id="place_status_<? echo $arr[place][id];?>">
               <font color="#000000" class="font-24"> ปิด</div>
             
             <? } ?>
             
             </font>
             
             </a>  
           
           &nbsp;    
           
           
           
           
           
           
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
        <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td width="700" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                <tr>
                  <td width="150"><strong>หมวดหมู่ : </strong></td>
                  <td style="font-size:18px;"><?=$arr[projectmain][topic_th]?></td>
                </tr>
                <tr>
                  <td><strong>ประเภท : </strong></td>
                  <td style="font-size:18px;"><? echo $arr[projectsub][topic_en];?>
                    <input class="form-control" name="sub" type="hidden"  id="sub" style="width:500px; background:#FFFFFF" value="<?=$_GET[sub]?>" />
                    <input class="form-control"  name="main" type="hidden"  id="main" style="width:500px; background:#FFFFFF" value="<?=$_GET[main]?>" /></td>
                </tr>
                <tr>
                  <td><strong>ชื่อ EN : </strong></td>
                  <td><input class="form-control" name="topic_en" type="text"  id="topic_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_en];?>" /></td>
                </tr>
                <tr>
                  <td><strong>ชื่อ TH :</strong></td>
                  <td><input class="form-control" name="topic_th" type="text"  id="topic_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_th];?>" /></td>
                </tr>
                <tr>
                  <td><strong>ชื่อ CN :</strong></td>
                  <td><input class="form-control"  name="topic_cn" type="text"  id="topic_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_cn];?>" /></td>
                </tr>
				<tr>
                  <td><strong>ภูมิภาค :</strong></td>
                  <td><select  class="form-control" name="region" id="region" style="width:500px;; font-size:16px; padding:5px; height:40px"  >
                  <option value="">- เลือกภูมิภาค -</option>
                     <?
                                  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                                  $res[region] = $db->select_query("SELECT * FROM web_area ORDER BY topic_th asc ");
                                   while($arr[region] = $db->fetch($res[region])) {
                                if($arr[project][region]==$arr[region][id]){
								  	$selected_region = "selected";
								  }else{
								  	$selected_region = "";
								  }
                                  ?>
                    <option value="<?=$arr[region][id];?>" <?=$selected_region;?>><?=$arr[region][topic_th];?></option>
                 	<? }  $db->closedb ();?>
                    </select></td>
                </tr>
                <script>
                	
                	$('#region').change(function() {
                		var region_main = $(this).val();
                		 $.post( "mod/content/load/save_type_contact.php?action=get_region&region="+region_main, function( data ) {
                		 
			  			var obj = JSON.parse(data);
					 	console.log(obj);
					 	$('#province option').remove();
					 	$.each(obj, function(key, data) {
					 		
					 		if(data.name_th==""){
								var name = data.name;
							}else{
								var name = data.name_th;
							}
					 		$( "#province" ).append( '<option value="'+data.id+'" class="sub_option">'+name+'</option>' );
						 
						});
						
						});
                	});
                </script>
                <tr>
                  <td><strong>จังหวัด :</strong></td>
                  <td><select  class="form-control" name="province" id="province" style="width:500px;; font-size:16px; padding:5px; height:40px" >
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
                 <script>
                	$('#province').change(function() {
					  var province = $(this).val();
//					  alert(province);
					  $.post( "mod/content/load/save_type_contact.php?action=get_amphur&province="+province, function( data ) {
			  			var obj = JSON.parse(data);
					 	console.log(obj);
					 	$('#select_amphur option').remove();
					 	$.each(obj, function(key, data) {
					 		
					 		if(data.name_th==""){
								var name = data.name;
							}else{
								var name = data.name_th;
							}
					 		$( "#select_amphur" ).append( '<option value="'+data.id+'" class="sub_option">'+name+'</option>' );
						 
						});
						
					});
					});
                </script>
                <tr>
                  <td><strong>อำเภอ/เขต :</strong></td>
                  <td><select name="select_amphur"  class="form-control" id="select_amphur" style="width:500px;; font-size:16px; padding:5px; height:40px"  >
                    <option value="">- เลือกเขต/อำเภอ -</option>
                    <?
                                  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                        
                                    $res[aum] = $db->select_query("SELECT * FROM web_amphur where PROVINCE_ID = 1 ORDER BY name_th asc ");
                      
                                  while($arr[aum] = $db->fetch($res[aum])) { 
                                  	if($arr[aum][name_th]==""){
										$name = $arr[aum][name];
									}else{
										$name = $arr[aum][name_th];
									}
                                  ?>
 							<option value="<?=$arr[aum][id];?>"><?=$name;?></option>
                             <?     }
                                  $db->closedb ();
                                  ?>
                    </select></td>
                </tr>
                <tr>
                  <td><strong>ที่อยู่ :</strong></td>
                  <td><textarea class="form-control" name="address" rows="3"  id="address" style="width:500px; background:#FFFFFF"></textarea></td>
                </tr>
                 <tr>
                  <td><strong>Link แผนที่ :</strong></td>
                  <td>
                  <table>
                  	<tr><td>
                  		 <input class="form-control" name="map" type="text"  id="map_url" style="width:400px; background:#FFFFFF" value="<? echo $arr[project][map];?>" />
                  	</td>
                  	<td><button type="button" class="btn btn-md" id="find_latlng_link"><strong>ค้นหา</strong></button>	</td>
                  	</tr>
                  </table>
                 
                  		
				  
    			  <div id="map_frame"></div>
    			 
					<script>
						$.post( "mod/save_location_place/test_map.php?sub=add", function( data ) {
						 	 $( "#map_frame" ).html( data );
						});
					</script>
					<input type="hidden" name="lat_db" value="<?=$arr[project][lat];?>" id="lat">
					<input type="hidden" name="lng_db" value="<?=$arr[project][lng];?>" id="lng">
					
					<script>
					$("#find_latlng_link").click(function(){
						var boxPlace = '<? echo $arr[project][topic_en];?>';
				        var regEx = /![34]d(-?[\d\.]+)/g;
//						var data  = "/data=!3m1!4b1!4m5!3m4!1s0x310957360e265763:0x4a3989b09e7ae9c7!8m2!3d11.520896!4d104.945442?hl=en";
						var data  = $("#map_url").val();
						var n = data.indexOf("data");
						 var res = data.substring(n, data.length);
						 
						var match = regEx.exec(res);
						var num = 1;
						var lat,lng;
						while(match !== null) {
							if(num==1){
								lat = match[1];
							}else{
								lng = match[1];
							}
						    console.log(match[1]);
//						    alert(match[1]);
						    match = regEx.exec(res);
						    num++;
						}
						console.log(lat);
						console.log(lng);
						if((lat != undefined && lng !=undefined)&&lat != '' && lng !='') {
							
							$('#lat').val(lat);
							$('#lng').val(lng);
							$.post( "mod/save_location_place/test_map.php?type=search&lat="+lat+'&lng='+lng+'&boxPlace='+boxPlace, function( data ) {
							 	 $( "#map_frame" ).html( data );
							 	
							});
						}else{
							swal("Link ผิดพลาด!");
						}
						
					
				    });
					</script>
					
                  </td>
                </tr>
                <tr>
                  <td><strong>เบอร์โทรศัพท์ :</strong></td>
                  <td><input class="form-control" name="phone" type="text"  id="phone" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][phone];?>" /></td>
                </tr>
                <tr>
                  <td><strong>อีเมล์ :</strong></td>
                  <td><input class="form-control" name="email" type="text"  id="email" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][email];?>" />
                    </td>
                </tr>
				
                <tr>
                  <td bgcolor="#FFFDE9"><strong>ค่าตอบแทน 1 : </strong></td>
                  <td bgcolor="#FFFDE9" style="font-size:16px;">
                  
                  
                  <select  class="form-control" name="price_plan" id="price_plan" style="width:500px;; font-size:16px; padding:5px; height:40px" >
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
                  <td bgcolor="#FFFDE9"><strong>ค่าตอบแทน 2 : </strong></td>
                  <td bgcolor="#FFFDE9" style="font-size:16px;"><select  class="form-control" name="price_plan_2" id="price_plan_2" style="width:500px;; font-size:16px; padding:5px; height:40px" >
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
                  <td bgcolor="#FFFDE9"><strong>ค่าตอบแทน 3 : </strong></td>
                  <td bgcolor="#FFFDE9" style="font-size:16px;"><select  class="form-control" name="price_plan_3" id="price_plan3" style="width:500px;; font-size:16px; padding:5px; height:40px" >
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

				<tr style="display: none;">
					<td><strong>ภาษีมูลค่าเพิ่ม :</strong></td>
					<td><input type="checkbox" name="vat_check" id="vat_check"  value="1"  style="width: 20px;" /><label for="vat_check" style="position: absolute;margin-top: 9px;margin-left: 4px;">มีภาษีมูลค่าเพิ่ม</label>
					<script>
						$('#vat_check').click(function(){
							if($(this).is(":checked")) {
								$('#set_vat_row').show(100);
							}else{
								$('#set_vat_row').hide(100);
							}
							
						});
					</script>
					</td>
				</tr>
				<tr id="set_vat_row" style="display: none;">
					<td></td>
					<td>
					<?
					if($arr[project][vat_percent]>0){
						$checked_vat = "checked";
					}
					 ?>
					<div class="input-group" style="width: 120px;">
						<input type="number" class="form-control" name="set_vat" id="set_vat" value="0" <?=$checked_vat;?>  >
						<span class="input-group-addon danger"><span class=""><strong>%</strong></span></span>
					</div>
					</td>
				</tr>

                <tr>
					<td><strong>จ่ายค่าคอมมิชชั่น :</strong></td>
					<td><input type="checkbox" name="return_guest" id="return_guest"  value="1" style="width: 20px;" /><label for="return_guest" style="position: absolute;margin-top: 9px;margin-left: 4px;">แขกเดินทางกลับ</label></td>
				</tr>
				<tr>
				
					<td><strong>คืนภาษามูลค่าเพิ่ม :</strong></td>
					<td><input type="checkbox" name="return_vat" id="return_vat"  value="1"  style="width: 20px;" /><label for="return_vat" style="position: absolute;margin-top: 9px;margin-left: 4px;">ลูกค้าสามารถคืนภาษามูลค่าเพิ่มได้</label></td>
				</tr>
				<? 
				$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                $num_time_other = $db->num_rows("shopping_open_time","id","product_id = '".$arr[project][id]."' and status = 1 and time_other_number = 2"); 
                if($num_time_other>=7){
					$checked_other_all = 'checked';
					$display_none_other_all = '';
				}else{
					$checked_other_all = '';
					$display_none_other_all = 'display: none;';
				}
				?>
				<tr class="time_default_xxx" >
                  <td><strong>เวลาทำการ A :</strong></td>
                  <? $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                  	$query_dayMon = $db->select_query("SELECT * FROM shopping_open_time where product_id = '".$arr[project][id]."' and product_day = 'Mon'   ");
					$query_day_dtMon = $db->fetch($query_dayMon); 
				  ?>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td width="60">เปิด</td>
                        <td width="140">
                         <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_default" id="hour_open_default">
                  			<? foreach($hour as $value){ 
                  				if($query_day_dtMon[start_h]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}
                  			?>	
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_open_default" id="time_open_default">
                  			<? foreach($time as $value){ 
                  			if($query_day_dtMon[start_m]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}?>
                  				
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.</td>
                        <td width="50">ปิด&nbsp;</td>
                        <td> <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_default" id="hour_close_default">
                  			<? foreach($hour as $value){ 
                  			if($query_day_dtMon[finish_h]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}?>
                  				
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_default" id="time_close_default">
                  			<? foreach($time as $value){ 
                  			if($query_day_dtMon[finish_m]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}?>
                  				
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.</td>
						 <td align="left"><button type="button" class="btn btn-md btn-info" id="default_time"><strong>ค่าเริ่มต้น</strong></button></td>
                      </tr>
                    </tbody>
                  </table></td>
                 
                </tr>   
				<tr>
					<td><label for="time_other_all" style=" margin-bottom: -3px;">แสดงเวลาทำการ B  :</label></td>
					<td>	<input  type="checkbox" <?=$checked_other_all;?>  value="1" id="time_other_all" name="time_other_all"   style="width: 20px;"/></td>
				</tr>				
				    
				<tr id="row_time_other" style="<?=$display_none_other_all;?>"   >
                  <td><strong>เวลาทำการ B :</strong></td>
                 
                  <td style="display: nones;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td width="60">เปิด</td>
                        <td width="140">
                         <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_default_other" id="hour_open_default_other">
                  			<? foreach($hour as $value){ 
                  				if($query_day_dtMon[start_h]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}
                  			?>	
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_open_default_other" id="time_open_default_other">
                  			<? foreach($time as $value){ 
                  			if($query_day_dtMon[start_m]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}?>
                  				
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.</td>
                        <td width="50">ปิด&nbsp;</td>
                        <td> <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_default_other" id="hour_close_default_other">
                  			<? foreach($hour as $value){ 
                  			if($query_day_dtMon[finish_h]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}?>
                  				
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_default_other" id="time_close_default_other">
                  			<? foreach($time as $value){ 
                  			if($query_day_dtMon[finish_m]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}?>
                  				
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.</td>
						 <td align="left"><button type="button" class="btn btn-md btn-warning" id="default_time_other"><strong>ค่าเริ่มต้น</strong></button></td>
                      </tr>
                    </tbody>
                  </table></td>
                 
                </tr>

				   <script>
						 	$('#time_other_all').click(function(){
							var day = '<?=json_encode($day);?>';
					//   		var obj_day = jQuery.parseJSON( day );
					   		var obj_day = JSON.parse( day );
						if($(this).is(":checked")) {
								$('#row_time_other').show();
/*								$('.time_default_xxx').show();*/
								$.each(obj_day, function( index, value ) {
//				   					$('#time_other_'+value).prop('checked', true);
									if(!$('#time_other_'+value).is(":checked")) {
				   					$('#time_other_'+value).click();
									}
				   				});
						 		}else{
/*						 			$('.time_default_xxx').hide();*/
						 			$('#row_time_other').hide();
						 			$.each(obj_day, function( index, value ) {
//										$('#time_other_'+value).prop('checked', false);
								if($('#time_other_'+value).is(":checked")) {
										$('#time_other_'+value).click();
									}
									});
								}
						 	});
						 	
						 	$('#default_time_other').click(function(){
						 			var day = '<?=json_encode($day);?>';
							  	var hour_open_default = $('#hour_open_default_other').val();
							  	var time_open_default = $('#time_open_default_other').val();
								
								var hour_close_default = $('#hour_close_default_other').val();
							  	var time_close_default = $('#time_close_default_other').val();
								
							//  	var obj_day = jQuery.parseJSON( day );
							  	var obj_day = JSON.parse( day );
							  	$.each(obj_day, function( index, value ) {
							  		if($('#open_alway_'+value).is(":checked")){
										
									}else{
										
									$('#hour_open_'+value+'_2').val(hour_open_default);
								 	$('#time_open_'+value+'_2').val(time_open_default);
								 	
								 	$('#hour_open_'+value+'_2').css('border-color','#fd0101');
								 	$('#time_open_'+value+'_2').css('border-color','#fd0101');
								 	
								 	$('#hour_close_'+value+'_2').val(hour_close_default);
								 	$('#time_close_'+value+'_2').val(time_close_default);
								 	
								 	$('#hour_close_'+value+'_2').css('border-color','#fd0101');
								 	$('#time_close_'+value+'_2').css('border-color','#fd0101');
								 	
								 	setTimeout(function(){ 
								 	$('#hour_open_'+value+'_2').css('border-color','#ccc');
								 	$('#time_open_'+value+'_2').css('border-color','#ccc');
								 	
								 	$('#hour_close_'+value+'_2').css('border-color','#ccc');
								 	$('#time_close_'+value+'_2').css('border-color','#ccc');
								 	 }, 2000);
									}
//								 	console.log(value+" : "+hour_open_default);
								});
						 	});
						 </script>
                <tr>
                  
                  <td colspan="2"> 
                  	<table width="100%" >
                  		<tr>
                  		<td width="14%"><label style="margin-bottom: -3px;" for="open_time_all">24 ชม. ทุกวัน</label> </td>
                  		<td width="5%" ><input type="checkbox" name="open_time_all" id="open_time_all" style="width: 20px;" /></td>
                  		
                  		<td width="14%"><label style="margin-bottom: -3px;" for="open_all">เปิดทุกวัน</label> </td>
                  		<?  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                  			$num_day = $db->num_rows("shopping_open_time","id","product_id = '".$arr[project][id]."' and status = 1 and time_other_number = 1"); 
                  			if($num_day>=7){
								$checked =	'checked="checked"';
								}
                  		 ?>
                  		<td><input type="checkbox" <?=$checked;?> name="open_all" id="open_all" style="width: 20px;" /></td>
                  		</tr>
                  	</table>         	
                  	<? foreach ($day as $value_d) { 
                  	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                  	$query_day = $db->select_query("SELECT * FROM shopping_open_time where product_id = '".$arr[project][id]."' and product_day = '".$value_d."'   ");
					$query_day_dt = $db->fetch($query_day);
					if($query_day_dt[status] == 1){
						$status_open = 'checked="checked"';
						$disabled_open = '';
						$disabled_color_open = '';
					}else{
						$status_open = '';
						$disabled_open = 'disabled="disabled"';
						$disabled_color_open = 'background-color : #ddd;';
					}
					if($query_day_dt[open_always] == 1){
						$status_open_24h = 'checked="checked"';
						$disabled = 'disabled="disabled"';
						$disabled_color = 'background-color : #ddd;';

					}else{
						$status_open_24h = '';
						$disabled = '';
						$disabled_color = '';

					}
                  	?>
                  
                  	<table width="100%"  style="margin-top: 25px;" >
                  		<tr>
                  		<td  width="14%"><label for="open_alway_<?=$value_d;?>" style="margin-bottom: -3px;">เปิด 24 ชม.</label></td>
                  		<td><input type="checkbox" <?=$status_open_24h;?> name="open_alway_<?=$value_d;?>" id="open_alway_<?=$value_d;?>"  value="1" onclick="eachOpenAlway('<?=$value_d;?>');"  style="width: 20px;"/></td>
                  		<td width="16%" align="center"><label for="<?=$value_d;?>" style=" margin-bottom: -3px;"><?=$value_d;?></label></td>
                  		<td width="5%">
                  		<input name="<?=$value_d;?>" onclick="closeDay('<?=$value_d;?>');" id="<?=$value_d;?>" type="checkbox" class="checkbox-plan" <?=$status_open;?> value="1"  style="width: 20px;" /></td>
                  		<td width="5%" align="center"><strong>A</strong></td>
                  		<td>เปิด</td>
                  		<td>
                  		 <select <?=$disabled_open;?>  <?=$disabled;?> style="<?=$disabled_color;?><?=$disabled_color_open;?>height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_<?=$value_d;?>" id="hour_open_<?=$value_d;?>">
                  			<? foreach($hour as $value){ 
                  				if($query_day_dt[start_h]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								}
                  			?>
                  				<option value="<?=$value?>" <?=$selected;?> ><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select  <?=$disabled;?><?=$disabled_open;?> style="<?=$disabled_color;?><?=$disabled_color_open;?>height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_<?=$value_d;?>" id="time_open_<?=$value_d;?>">
                  			<? foreach($time as $value){ 
                  			if($query_day_dt[start_m]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								}
                  			?>
                  				<option value="<?=$value?>" <?=$selected;?>><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.
                  		</td>
                  		<td>ปิด</td>
                  		<td>
                  		 <select <?=$disabled;?> <?=$disabled_open;?> style="<?=$disabled_color;?><?=$disabled_color_open;?>height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_<?=$value_d;?>" id="hour_close_<?=$value_d;?>">
                  			<? foreach($hour as $value){ 
                  				if($query_day_dt[finish_h]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								} ?>
                  				
                  				<option value="<?=$value?>" <?=$selected;?> ><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select  <?=$disabled;?><?=$disabled_open;?> style="<?=$disabled_color;?><?=$disabled_color_open;?>height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_<?=$value_d;?>" id="time_close_<?=$value_d;?>">
                  			<? foreach($time as $value){ 
                  			if($query_day_dt[finish_m]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								}?>
                  				
                  				<option value="<?=$value?>" <?=$selected;?>><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.
                  		</td>
						<td><label for="time_other_<?=$value_d;?>" style=" margin-bottom: -3px;">เวลาเพิ่มเติม</label></td>
						
<? $check_other_time = $db->num_rows("shopping_open_time","id","product_id ='".$arr[project][id]."' and product_day = '".$value_d."' and time_other_number = 2 and status =1 "); 
 	if($check_other_time<=0){
		$display = 'display: none;';
		$checked_time_other = '';
	}else{
		$display = '';
		$checked_time_other = 'checked';
	}
 			$query_timeother = $db->select_query("select * from shopping_open_time where product_id ='".$arr[project][id]."' and product_day = '".$value_d."' and time_other_number = 2 and status =1 ");
			$query_timeother_show = $db->fetch($query_timeother);
			
 ?>
						
						<td>
						
						<input <?=$checked_time_other;?> type="checkbox" value="1" id="time_other_<?=$value_d;?>" name="time_other_<?=$value_d;?>" onclick="timeOther('<?=$value_d;?>');"  style="width: 20px;"/>
						</td>
                  		</tr>
                  		<tr id="other_time_<?=$value_d;?>" style="<?=$display;?>">
                  			<td></td>
                  			<td></td>
                  			<td></td>
                  			<td></td>
                  			<td align="center" bgcolor="#FDFAD5"><strong>B</strong></td>
                  			<td bgcolor="#FDFAD5">เปิด</td>
                  			<td bgcolor="#FDFAD5">
                  			
                  		 <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_<?=$value_d;?>_2" id="hour_open_<?=$value_d;?>_2">
                  			<? foreach($hour as $value){ 
                  				if($query_timeother_show[start_h]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								}
                  			?>
                  				<option value="<?=$value?>" <?=$selected;?> ><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_<?=$value_d;?>_2" id="time_open_<?=$value_d;?>_2">
                  			<? foreach($time as $value){ 
                  			if($query_timeother_show[start_m]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								}
                  			?>
                  				<option value="<?=$value?>" <?=$selected;?>><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.
                  		</td>
                  			<td bgcolor="#FDFAD5">ปิด</td>
                  			<td bgcolor="#FDFAD5">
                  		 <select  style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_<?=$value_d;?>_2" id="hour_close_<?=$value_d;?>_2">
                  			<? foreach($hour as $value){ 
                  				if($query_timeother_show[finish_h]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								} ?>
                  				
                  				<option value="<?=$value?>" <?=$selected;?> ><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_<?=$value_d;?>_2" id="time_close_<?=$value_d;?>_2">
                  			<? foreach($time as $value){ 
                  			if($query_timeother_show[finish_m]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								}?>
                  				
                  				<option value="<?=$value?>" <?=$selected;?>><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.
                  		</td>
                  		</tr>
                  	</table> 
                 
                  	<? }?>
                  	<script>
                  		
                  		function timeOther(day){
							if($('#time_other_'+day).is(":checked")) {
								$('#other_time_'+day).show();
								var hour_main = $('#hour_open_'+day).val();
								var time_main = $('#time_open_'+day).val();
								/*var hour_main_close = $('#hour_close_'+day).val();
								var time_main_close = $('#time_close_'+day).val();
								$('#hour_open_'+day+'_2').find('option').each (function() {
									  if($(this).val()>=hour_main && $(this).val()<=hour_main_close){				
									  	$(this).attr("disabled", true);
									  	$(this).css('background-color', '#ccc');
									  }
								}); 
								$('#hour_close_'+day+'_2').find('option').each (function() {
									  if($(this).val()>=hour_main && $(this).val()<=hour_main_close){				
									  	$(this).attr("disabled", true);
									  	$(this).css('background-color', '#ccc');
									  }
								});*/
							}else{
								$('#other_time_'+day).hide();
							}
						}
                  	</script>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><button type="button" class="btn btn-primary btn-lg"   id="submit_data" > <span id="txt_btn_save2"> บันทึกข้อมูล </span> </button>
                    <script>
   	$('#open_all').click(function(){
   		var day = '<?=json_encode($day);?>';
   		var obj_day = jQuery.parseJSON( day );
   		if($(this).is(":checked")) {
   			  $.each(obj_day, function( index, value ) {
   			$('#'+value).prop('checked', true);
   			});
   		}else{
			 $.each(obj_day, function( index, value ) {
   			$('#'+value).prop('checked', false);
   			});
		}
   	});


    $('#open_time_all').click(function(){
    var day = '<?=json_encode($day);?>';
    var obj_day = jQuery.parseJSON( day );
    var hour_open_default = $('#hour_open_default').val();
  	var time_open_default = $('#time_open_default').val();
	
	var hour_close_default = $('#hour_close_default').val();
  	var time_close_default = $('#time_close_default').val();		
    	if($(this).is(":checked")) {
            $.each(obj_day, function( index, value ) {
			 	$('#open_alway_'+value).prop('checked', true);
			 	
			 	$('#hour_open_'+value).val('24');
			 	$('#time_open_'+value).val('00');
			 	
			 	$('#hour_close_'+value).val('24');
			 	$('#time_close_'+value).val('00');
			 	
			 	$('#hour_open_'+value).attr("disabled", true);
			 	$('#hour_open_'+value).css("background-color", '#ddd');
			 	$('#time_open_'+value).attr("disabled", true);
			 	$('#time_open_'+value).css("background-color", '#ddd');
			 	
			 	$('#hour_close_'+value).attr("disabled", true);
			 	$('#hour_close_'+value).css("background-color", '#ddd');
			 	$('#time_close_'+value).attr("disabled", true);
			 	$('#time_close_'+value).css("background-color", '#ddd');
			});
        }else{
			$.each(obj_day, function( index, value ) {
			 	$('#open_alway_'+value).prop('checked', false);
			 	
			 	$('#hour_open_'+value).val(hour_open_default);
			 	$('#time_open_'+value).val(time_open_default);
			 	
			 	$('#hour_close_'+value).val(hour_close_default);
			 	$('#time_close_'+value).val(time_close_default);
			 	
			 	$('#hour_open_'+value).attr("disabled", false);
			 	$('#hour_open_'+value).css("background-color", '#fff');
			 	$('#time_open_'+value).attr("disabled", false);
			 	$('#time_open_'+value).css("background-color", '#fff');
			 	
			 	$('#hour_close_'+value).attr("disabled", false);
			 	$('#hour_close_'+value).css("background-color", '#fff');
			 	$('#time_close_'+value).attr("disabled", false);
			 	$('#time_close_'+value).css("background-color", '#fff');
			});
		}
        $('#open_time_all').val($(this).is(':checked'));   
    });
 
  $('#default_time').click(function(){
  	   	var day = '<?=json_encode($day);?>';
  	var hour_open_default = $('#hour_open_default').val();
  	var time_open_default = $('#time_open_default').val();
	
	var hour_close_default = $('#hour_close_default').val();
  	var time_close_default = $('#time_close_default').val();
	
  	var obj_day = jQuery.parseJSON( day );
  	$.each(obj_day, function( index, value ) {
  		if($('#open_alway_'+value).is(":checked")){
			
		}else{
		$('#hour_open_'+value).val(hour_open_default);
	 	$('#time_open_'+value).val(time_open_default);
	 	
	 	$('#hour_close_'+value).val(hour_close_default);
	 	$('#time_close_'+value).val(time_close_default);
		}
	 	console.log(value+" : "+hour_open_default);
	 	
	 	
	});
  	
  });                                     
      
      function eachOpenAlway(day){
      
		  	if($('#open_alway_'+day).is(":checked")) {
	        				 	
				 	$('#hour_open_'+day).val('24');
				 	$('#time_open_'+day).val('00');
				 	
				 	$('#hour_close_'+day).val('24');
				 	$('#time_close_'+day).val('00');
				 	
				 	$('#hour_open_'+day).attr("disabled", true);
				 	$('#hour_open_'+day).css("background-color", '#ddd');
				 	$('#time_open_'+day).attr("disabled", true);
				 	$('#time_open_'+day).css("background-color", '#ddd');
				 	
				 	$('#hour_close_'+day).attr("disabled", true);
				 	$('#hour_close_'+day).css("background-color", '#ddd');
				 	$('#time_close_'+day).attr("disabled", true);
				 	$('#time_close_'+day).css("background-color", '#ddd');
		        }else{
	var hour_open_default = $('#hour_open_default').val();
  	var time_open_default = $('#time_open_default').val();
	
	var hour_close_default = $('#hour_close_default').val();
  	var time_close_default = $('#time_close_default').val();
					$('#hour_open_'+day).val(hour_open_default);
				 	$('#time_open_'+day).val(time_open_default);
				 	
				 	$('#hour_close_'+day).val(hour_close_default);
				 	$('#time_close_'+day).val(time_close_default);
				 	
				 	$('#hour_open_'+day).attr("disabled", false);
				 	$('#hour_open_'+day).css("background-color", '#fff');
				 	$('#time_open_'+day).attr("disabled", false);
				 	$('#time_open_'+day).css("background-color", '#fff');
				 	
				 	$('#hour_close_'+day).attr("disabled", false);
				 	$('#hour_close_'+day).css("background-color", '#fff');
				 	$('#time_close_'+day).attr("disabled", false);
				 	$('#time_close_'+day).css("background-color", '#fff');
				}
	  }
      
  
                    
              
                    
  $("#submit_data").click(function(){
	  
	  
  if(document.getElementById('topic_th').value=="") {
alert('กรุณากรอกชื่อภาษาไทย'); 
document.getElementById('topic_th').focus() ; 
return false ;
}




 if(document.getElementById('province').value=="") {
alert('กรุณาเลือกจังหวัด'); 
document.getElementById('province').focus() ; 
return false ;
}




 if(document.getElementById('address').value=="") {
alert('กรุณากรอกที่อยู่'); 
document.getElementById('address').focus() ; 
return false ;
}

 if(document.getElementById('phone').value=="") {
alert('กรุณากรอกเบอร์โทรศัพท์'); 
document.getElementById('phone').focus() ; 
return false ;
}


 		 
  $.post('go.php?name=content/load&file=place&op=sub_add_action&id=<?=$_GET[id];?>&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>',$('#myform').serialize(),function(response){
//  $('#div_send_data_msg').html(response);  
  console.log(response);
  $('#all_place').click();
  });
  
  
 
   var url_page_type= "go.php?name=content/load&file=place&main=<?=$_GET[main];?>&sub=<?=$_GET[sub];?>";
	  
 
  $('#show_data_page').load(url_page_type);
	  
	  
  
  
			   });
			    </script></td>
                </tr>
              </table></td>
              <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                <tbody>
                  <tr>
                    <td width="120" valign="middle"><strong>โลโก้ : </strong></td>
                    <td valign="top"> 
                    
                    
            <div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
 
 
 

<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_logo"></i><br>
เลือกภาพถ่าย
<div style="padding:5px;">
  
  <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_logo" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
  </div>
    
    

    

 <img
 
   <? if($_GET[id]){ ?>

  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_logo.jpg" 

<? }  ?>
 
 
  id="image_id_logo" name="image_id_logo"  style="width:300px; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>
 
 
  
    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    </td>
                  </tr>
                  <tr>
                    <td><strong>โบรชัวร์ : </strong></td>
                    <td><div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
 
 
 

<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_book"></i><br>

เลือกโบรชัวร์ 1

<div style="padding:5px;">
  
  <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_book" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
  </div>
    
    

    

 <img
 
   <? if($_GET[id]){ ?>

  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_book.jpg" 

<? }  ?>
 
 
 
 
  id="image_id_book" name="image_id_book"  style="width:300px; padding:5px; margin-top:-20px;border-radius:15px; " />
 <div style="margin-top: 5px;" style="display: "><textarea rows="3" cols="30" name="text_imge_id_book"></textarea></div>
  <br/>
</div>
 
 
  
    </div>
    
    
    
    
 
    <div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
    
    
<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_book_2"></i><br>

เลือกโบรชัวร์ 2

<div style="padding:5px;">
  
  <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_book_2" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
  </div>
    
    

    

 <img
 
   <? if($_GET[id]){ ?>

  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_book_2.jpg" 

<? }  ?>
 
 
 
 
  id="image_id_book_2" name="image_id_book_2"  style="width:300px; padding:5px; margin-top:-20px;border-radius:15px; " />
 <div style="margin-top: 5px;" style="display: "><textarea rows="3" cols="30" name="text_imge_id_book_2"></textarea></div>
  <br/>
</div>
 
 
  
    </div>
    
 
 
 
 <div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
    
<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_book_3"></i><br>

เลือกโบรชัวร์ 3

<div style="padding:5px;">
  
  <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_book_3" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
  </div>
    
    

    

 <img
 
   <? if($_GET[id]){ ?>

  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_book_3.jpg" 

<? }  ?>
 
 
 
 
  id="image_id_book_3" name="image_id_book_3"  style="width:300px; padding:5px; margin-top:-20px;border-radius:15px; " />
 <div style="margin-top: 5px;" style="display: "><textarea rows="3" cols="30" name="text_imge_id_book_3"></textarea> </div>
  <br/>
</div>
 
 
  
    </div>
    
    
    
    
                    
                    
                    
                    
                    
                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>    <input class="form-control" type="hidden" name="check_photo_id_logo" id="check_photo_id_logo"   onkeypress="PasswordEnter(this,event)"   value="0" >
    
    
     <input class="form-control" type="hidden" name="check_photo_id_book" id="check_photo_id_book"   onkeypress="PasswordEnter(this,event)"   value="0" ><div style="display:none">
     
     
          <input class="form-control" type="hidden" name="check_photo_id_book_2" id="check_photo_id_book_2"   onkeypress="PasswordEnter(this,event)"   value="0" ><div style="display:none">
          
          
          <input class="form-control" type="hidden" name="check_photo_id_book_3" id="check_photo_id_book_3"   onkeypress="PasswordEnter(this,event)"   value="0" ><div style="display:none">
     
     
 
 <?  include ("mod/content/photo/upload_car_pic.php");?>
 
 </div>
 
 <br>
 
  <?
 $rand = substr(str_shuffle('123456789012345678901234567890'),0,30);
 
 ?>
 




 
 

 
 
      <input class="form-control" type="hidden" name="check_code" id="check_code"   onkeypress="PasswordEnter(this,event)"   value="<?=$rand ?>" >
  
   <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true" onkeypress="PasswordEnter(this,event)"   value="" >  
  
  
  
 <script>

 
    
        /////////  id driving
 $("#icon_camera_id_logo").click(function(){  
 
 
  
  document.getElementById('upload_pic_type').value='id_logo';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
          /////////  id driving
 $("#icon_camera_id_book").click(function(){  
 
  
  document.getElementById('upload_pic_type').value='id_book';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
  
  
  
   $("#icon_camera_id_book_2").click(function(){  
 
  
  document.getElementById('upload_pic_type').value='id_book_2';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
  
  
   $("#icon_camera_id_book_3").click(function(){  
 
  
  document.getElementById('upload_pic_type').value='id_book_3';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
 
  
  
  
  
  </script></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
          </tbody>
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
 
 
 /*$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[projectsub] = $db->select_query("SELECT * FROM shopping_product_sub where   id=".$_GET[sub]."  ");
$arr[projectsub] = $db->fetch($res[projectsub]);
 */
 
?>
   
<FORM NAME="myform" id="myform"   enctype="multipart/form-data">
<?
 include("mod/content/menu/place.php");

?> 

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr>
        <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td width="700" valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                <tr>
                  <td><strong>หมวดหมู่ : </strong></td>
                  <td style="font-size:18px;">
                 
                  <select  id="select_category" class="form-control" style="width:500px;; font-size:16px; padding:5px; height:40px">
                  <?php 
                  	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
					$res[main] = $db->select_query("SELECT * FROM shopping_product_main ORDER BY topic_th ASC  ");
					while($arr[main] = $db->fetch($res[main])){ 
						if($_GET[main]==$arr[main][id] ){
							$selected_sub = "selected";
						}else{
							$selected_sub = "";
						}
                   ?>
                  		<option value="<?=$arr[main][id];?>"  <?=$selected_sub;?> ><?=$arr[main][topic_th];?></option>
                  	<? } ?>
                  </select>
                  <script>
		         $('#select_category').change(function() {
			  		var main_id = $(this).val();
			  		$('#main').val(main_id);
			  		
			  		$.post( "mod/content/load/save_type_contact.php?action=get_sub&main="+main_id, function( data ) {
			  			var obj = JSON.parse(data);
					 	console.log(obj);
					 	$('.sub_option').remove();
					 	$.each(obj, function(key, data) {
					 		$( "#select_type" ).append( '<option value="'+data.id+'" class="sub_option">'+data.topic_en+'</option>' );
						 
						});
						
					});
				 });
                  </script>
                  </td>
                </tr>
                <tr>
                  <td><strong>ประเภท : </strong></td>
                  <td style="font-size:18px;"><? //echo $arr[projectsub][topic_en]; ?>
                  <select  id="select_type" class="form-control" style="width:500px;; font-size:16px; padding:5px; height:40px">
                  <?php 
                  	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
					$res[sub] = $db->select_query("SELECT * FROM shopping_product_sub where main = '".$_GET[main]."' ORDER BY topic_en ASC  ");
					while($arr[sub] = $db->fetch($res[sub])){ 
						if($_GET[sub]==$arr[sub][id] ){
							$selected_sub = "selected";
						}else{
							$selected_sub = "";
						}
                   ?>
                  		<option value="<?=$arr[sub][id];?>" class="sub_option" <?=$selected_sub;?> ><?=$arr[sub][topic_en];?></option>
                  	<? } ?>
                  </select>
                    <input name="sub" type="hidden"  id="sub" style="width:500px; background:#FFFFFF" value="<?=$_GET[sub]?>" />
                    <input name="main" type="hidden"  id="main" style="width:500px; background:#FFFFFF" value="<?=$_GET[main]?>" /></td>
                    <script>
                    	$( "#select_type" ).change(function() {
						  	var sub = $( this ).val();
//						  	var main = $('#select_type').find(":selected").attr('class');
						  	$('#sub').val(sub);
//						  	$('#main').val(main);
						});
                    </script>
                </tr>
                <tr>
                  <td><strong>ชื่อ EN : </strong></td>
                  <td><input  class="form-control" name="topic_en" type="text"  id="topic_en" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_en];?>" /></td>
                </tr>
                <tr>
                  <td><strong>ชื่อ TH :</strong></td>
                  <td><input class="form-control" name="topic_th" type="text"  id="topic_th" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_th];?>" /></td>
                </tr>
                <tr>
                  <td><strong>ชื่อ CN :</strong></td>
                  <td><input class="form-control"name="topic_cn" type="text"  id="topic_cn" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][topic_cn];?>" /></td>
                </tr>
				<tr>
                  <td><strong>ภูมิภาค :</strong></td>
                  <td><select  class="form-control" name="region" id="region" style="width:500px;; font-size:16px; padding:5px; height:40px"  >
                  <option value="">- เลือกภูมิภาค -</option>
                     <?
                                  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                                  $res[region] = $db->select_query("SELECT * FROM web_area ORDER BY topic_th asc ");
                                   while($arr[region] = $db->fetch($res[region])) {
                                if($arr[project][region]==$arr[region][id]){
								  	$selected_region = "selected";
								  }else{
								  	$selected_region = "";
								  }
                                  ?>
                    <option value="<?=$arr[region][id];?>" <?=$selected_region;?>><?=$arr[region][topic_th];?></option>
                 	<? }  $db->closedb ();?>
                    </select></td>
                </tr>
                <script>
                	
                	$('#region').change(function() {
                		var db_provice = '<?=$arr[project][province]?>';
                		var region_main = $(this).val();
                		 $.post( "mod/content/load/save_type_contact.php?action=get_region&region="+region_main, function( data ) {
                		 
			  			var obj = JSON.parse(data);
					 	console.log(obj);
					 	$('#province option').remove();
					 	$.each(obj, function(key, data) {
					 		
					 		if(data.name_th==""){
								var name = data.name;
							}else{
								var name = data.name_th;
							}
							if(db_provice==data.id){
								var selected_province = "selected";
							}else{
								var selected_province = "";
							}
					 		$( "#province" ).append( '<option value="'+data.id+'" '+selected_province+' class="sub_option">'+name+'</option>' );
						 
						});
						
						});
                	});
                </script>
                <tr>
                  <td><strong>จังหวัด :</strong></td>
                  <td><select  class="form-control" name="province" id="province" style="width:500px;font-size:16px; padding:5px; height:40px"  >
                    <option value="">- เลือกจังหวัด -</option>
                    <?
                                  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                                    $res[category] = $db->select_query("SELECT * FROM web_province where area = '".$arr[project][region]."' ORDER BY name_th asc  ");
                      
                                  while($arr[category] = $db->fetch($res[category])) { 
                                  if($arr[project][province]==$arr[category][id]){
								  	$selected_province = "selected";
								  }else{
								  	$selected_province = "";
								  }
								  
                                  ?>
 									
								<option value="<?=$arr[category][id];?>" <?=$selected_province;?>  class="<?=$arr[category][area];?>"><?=$arr[category][name_th];?></option>
                              <?     }
                                  $db->closedb ();
                                  ?>
                    </select></td>
                </tr>
                <script>
                	$('#province').change(function() {
					  var province = $(this).val();
					  var db_amphur = '<?=$arr[project][amphur]?>';
//					  alert(province);
					  $.post( "mod/content/load/save_type_contact.php?action=get_amphur&province="+province, function( data ) {
			  			var obj = JSON.parse(data);
					 	console.log(obj);
					 	$('#select_amphur option').remove();
					 	$.each(obj, function(key, data) {
					 		
					 		if(data.name_th==""){
								var name = data.name;
							}else{
								var name = data.name_th;
							}
							if(db_amphur==data.id){
								var selected_aum = "selected";
							}else{
								var selected_aum = "";
							}
					 		$( "#select_amphur" ).append( '<option value="'+data.id+'" '+selected_aum+' class="sub_option">'+name+'</option>' );
						 
						});
						
					});
					});
                </script>
                <tr>
                  <td><strong>อำเภอ/เขต :</strong></td>
                  <td><select name="select_amphur"  class="form-control"  id="select_amphur" style="width:500px;; font-size:16px; padding:5px; height:40px"  >
                    <option value="">- เลือกเขต/อำเภอ -</option>
                    <?
                                  $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                        
                                    $res[aum] = $db->select_query("SELECT * FROM web_amphur where PROVINCE_ID = 1 ORDER BY name_th asc ");
                      
                                  while($arr[aum] = $db->fetch($res[aum])) { 
                                  if($arr[aum][id]==$arr[project][amphur]){
								  	$selected_aum = "selected";
								  }else{
								  	$selected_aum = "";
								  }
                                  	if($arr[aum][name_th]=="" or $arr[aum][name_th]==NULL){
										$name = $arr[aum][name];
									}else{
										$name = $arr[aum][name_th];
									}
                                  ?>
 							<option value="<?=$arr[aum][id];?>" <?=$selected_aum;?> ><?=$name;?></option>
                             <?     }
                                  $db->closedb ();
                                  ?>
                    </select></td>
                </tr>
                <tr>
                  <td><strong>ที่อยู่ :</strong></td>
                  <td><textarea name="address" rows="3" class="form-control" id="address" style="width:500px; background:#FFFFFF"><?=$arr[project][address];?>
              </textarea></td>
                </tr>
                <tr>
                  <td><strong>Link แผนที่ :</strong></td>
                  <td>
                  <table>
                  	<tr><td>
                  		 <input class="form-control" name="map" type="text"  id="map_url" style="width:400px; background:#FFFFFF" value="<? echo $arr[project][map];?>" />
                  	</td>
                  	<td><button type="button" class="btn btn-md" id="find_latlng_link"><strong>ค้นหา</strong></button>	</td>
                  	</tr>
                  </table>
                 
                  		
				  
    			  <div id="map_frame"></div>
    			 
					<script>
						var lat = '<? echo $arr[project][lat];?>';
						var lng = '<? echo $arr[project][lng];?>';
						var boxPlace = '<? echo $arr[project][topic_en];?>';
						$.post( "mod/save_location_place/test_map.php?lat="+lat+'&lng='+lng+'&boxPlace='+boxPlace, function( data ) {
						 	 $( "#map_frame" ).html( data );
						});
					</script>
					<input type="hidden" name="lat_db" value="<?=$arr[project][lat];?>" id="lat">
					<input type="hidden" name="lng_db" value="<?=$arr[project][lng];?>" id="lng">
					
					<script>
					$("#find_latlng_link").click(function(){
						var boxPlace = '<? echo $arr[project][topic_en];?>';
				        var regEx = /![34]d(-?[\d\.]+)/g;
//						var data  = "/data=!3m1!4b1!4m5!3m4!1s0x310957360e265763:0x4a3989b09e7ae9c7!8m2!3d11.520896!4d104.945442?hl=en";
						var data  = $("#map_url").val();
						var n = data.indexOf("data");
						 var res = data.substring(n, data.length);
						 
						var match = regEx.exec(res);
						var num = 1;
						var lat,lng;
						while(match !== null) {
							if(num==1){
								lat = match[1];
							}else{
								lng = match[1];
							}
						    console.log(match[1]);
//						    alert(match[1]);
						    match = regEx.exec(res);
						    num++;
						}
						console.log(lat);
						console.log(lng);
						if((lat != undefined && lng !=undefined)&&lat != '' && lng !='') {
							
							$('#lat').val(lat);
							$('#lng').val(lng);
							$.post( "mod/save_location_place/test_map.php?type=search&lat="+lat+'&lng='+lng+'&boxPlace='+boxPlace, function( data ) {
							 	 $( "#map_frame" ).html( data );
							 	
							});
						}else{
							swal("Link ผิดพลาด!");
						}
						
					
				    });
					</script>
					
                  </td>
                </tr>
                <tr style="display:none">
                  <td><strong>แผนที่ :</strong></td>
                  <td>ละติดจูด&nbsp;
                    <input  class="form-control" name="lat" type="text"  id="lat" style="width:120px; background:#FFFFFF" value="<? echo $arr[project][lat];?>" />
                    &nbsp; ลองติจูด&nbsp;
                    <input  class="form-control" name="lng" type="text"  id="lng" style="width:120px; background:#FFFFFF" value="<? echo $arr[project][lng];?>" /></td>
                </tr>
                <tr>
                  <td><strong>เบอร์โทรศัพท์ :</strong></td>
                  <td><input  class="form-control" name="phone" type="text"  id="phone" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][phone];?>" /></td>
                </tr>
                <tr>
                  <td><strong>อีเมล์ :</strong></td>
                  <td><input  class="form-control" name="email" type="text"  id="email" style="width:500px; background:#FFFFFF" value="<? echo $arr[project][email];?>" /></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFDE9"><strong>ค่าตอบแทน 1: </strong></td>
                  <td bgcolor="#FFFDE9" style="font-size:16px;"><select  class="form-control" name="price_plan" id="price_plan" style="width:500px;; font-size:16px; padding:5px; height:40px" >
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
                  <td bgcolor="#FFFDE9"><strong>ค่าตอบแทน 2: </strong></td>
                  <td bgcolor="#FFFDE9" style="font-size:16px;"><select  class="form-control" name="price_plan_2" id="price_plan4" style="width:500px;; font-size:16px; padding:5px; height:40px" >
                    <option value="">- เลือกประเภทค่าตอบแทน -</option>
                    <?
                                  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
                                    $res[category] = $db->select_query("SELECT * FROM plan_product_price_name ORDER BY id  limit 100 ");
                      
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] ==$arr[project][price_plan_2]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][topic_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
                  </select></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFDE9"><strong>ค่าตอบแทน 3: </strong></td>
                  <td bgcolor="#FFFDE9" style="font-size:16px;"><select  class="form-control" name="price_plan_3" id="price_plan5" style="width:500px;; font-size:16px; padding:5px; height:40px" >
                    <option value="">- เลือกประเภทค่าตอบแทน -</option>
                    <?
                                  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
                                    $res[category] = $db->select_query("SELECT * FROM plan_product_price_name ORDER BY id  limit 100 ");
                      
                                  while($arr[category] = $db->fetch($res[category])) {
 
                                    echo "<option value=\"".$arr[category][id]."\"";
                                    if($arr[category][id] ==$arr[project][price_plan_3]) {
                                      echo " Selected";
                                    }
                                    echo ">".$arr[category][topic_th]." </option>";
                                  }
                                  $db->closedb ();
                                  ?>
                  </select></td>
                </tr>

				<tr style="display: none;">
				<?
					if($arr[project][vat_percent]>0){
						$checked_vat = "checked";
						$none_vat = "";
					}else{
						$noe_vat = "display: none;";
					}
					$noe_vat = "display: none;";
					 ?>
					<td><strong>ภาษีมูลค่าเพิ่ม :</strong></td>
					<td><input type="checkbox" <?=$checked_vat;?> name="vat_check" id="vat_check"  value="1"  style="width: 20px;" /><label for="vat_check" style="position: absolute;margin-top: 9px;margin-left: 4px;">มีภาษีมูลค่าเพิ่ม</label>
					<script>
						$('#vat_check').click(function(){
							if($(this).is(":checked")) {
								$('#set_vat_row').show(100);
								var vat_db = $('#old_vat').val();
								$('#set_vat').val(vat_db);
							}else{
								$('#set_vat_row').hide(100);
								$('#set_vat').val(0);
							}
						});
					</script>
					</td>
				</tr>
				<tr id="set_vat_row" style="<?=$noe_vat;?>" >
					<td></td>
					<td>
					<div class="input-group" style="width: 120px;">
						<input id="old_vat" value="<?=$arr[project][vat_percent];?>" type="hidden" />
						<input type="number" class="form-control" name="set_vat" id="set_vat" value="<?=$arr[project][vat_percent];?>"   >
						<span class="input-group-addon danger"><span class=""><strong>%</strong></span></span>
					</div>
					</td>
				</tr>
				<tr>
					<td><strong>จ่ายค่าคอมมิชชั่น :</strong></td>
					<? 
						if($arr[project][return_guest]==1){
							$checked_return_guest = "checked";
						}
					?>
					<td><input type="checkbox" name="return_guest" id="return_guest"  value="1" <?=$checked_return_guest;?>   style="width: 20px;" /><label for="return_guest" style="position: absolute;margin-top: 9px;margin-left: 4px;">แขกเดินทางกลับ</label></td>
				</tr>

				<tr>
				<? if($arr[project][return_vat]>0){
					$checked_return_vat = "checked";
				} ?>
					<td><strong>คืนภาษามูลค่าเพิ่ม :</strong></td>
					<td><input type="checkbox" name="return_vat" id="return_vat" <?=$checked_return_vat;?>  value="1"  style="width: 20px;" /><label for="return_vat" style="position: absolute;margin-top: 9px;margin-left: 4px;">ลูกค้าสามารถคืนภาษามูลค่าเพิ่มได้</label></td>
				</tr>
                <tr>
                  <td><strong>เวลาทำการ A :</strong></td>
                  <? $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                  	$query_dayMon = $db->select_query("SELECT * FROM shopping_open_time where product_id = '".$arr[project][id]."' and product_day = 'Mon'   ");
					$query_day_dtMon = $db->fetch($query_dayMon); 
				  ?>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td width="60">เปิด</td>
                        <td width="140">
                         <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_default" id="hour_open_default">
                  			<? foreach($hour as $value){ 
                  				if($query_day_dtMon[start_h]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}
                  			?>	
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_open_default" id="time_open_default">
                  			<? foreach($time as $value){ 
                  			if($query_day_dtMon[start_m]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}?>
                  				
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.</td>
                        <td width="50">ปิด&nbsp;</td>
                        <td> <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_default" id="hour_close_default">
                  			<? foreach($hour as $value){ 
                  			if($query_day_dtMon[finish_h]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}?>
                  				
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_default" id="time_close_default">
                  			<? foreach($time as $value){ 
                  			if($query_day_dtMon[finish_m]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}?>
                  				
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.</td>
						 <td align="left"><button type="button" class="btn btn-md btn-info" id="default_time"><strong>ค่าเริ่มต้น</strong></button></td>
                      </tr>
                    </tbody>
                  </table></td>
                 
                </tr>
				<? 
				$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                $num_time_other = $db->num_rows("shopping_open_time","id","product_id = '".$arr[project][id]."' and status = 1 and time_other_number = 2"); 
                if($num_time_other>=7){
					$checked_other_all = 'checked';
					$display_none_other_all = '';
				}else{
					$checked_other_all = '';
					$display_none_other_all = 'display: none;';
				}
				?>
				<tr>
					<td><label for="time_other_all" style=" margin-bottom: -3px;">แสดงเวลาทำการ B  :</label></td>
					<td>	<input  type="checkbox" <?=$checked_other_all;?>  value="1" id="time_other_all" name="time_other_all"   style="width: 20px;"/></td>
				</tr>		       
				<tr id="row_time_other" style="<?=$display_none_other_all;?>">
                  <td><strong>เวลาทำการ B :</strong></td>
                 
                  <td style="display: nones;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr>
                        <td width="60">เปิด</td>
                        <td width="140">
                         <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_default_other" id="hour_open_default_other">
                  			<? foreach($hour as $value){ 
                  				if($query_day_dtMon[start_h]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}
                  			?>	
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_open_default_other" id="time_open_default_other">
                  			<? foreach($time as $value){ 
                  			if($query_day_dtMon[start_m]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}?>
                  				
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.</td>
                        <td width="50">ปิด&nbsp;</td>
                        <td> <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_default_other" id="hour_close_default_other">
                  			<? foreach($hour as $value){ 
                  			if($query_day_dtMon[finish_h]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}?>
                  				
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_default_other" id="time_close_default_other">
                  			<? foreach($time as $value){ 
                  			if($query_day_dtMon[finish_m]==$value){
									$selected = "selected";
								}else{
									$selected = "";
								}?>
                  				
                  				<option <?=$selected;?> value="<?=$value?>"><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.</td>
						 <td align="left"><button type="button" class="btn btn-md btn-warning" id="default_time_other"><strong>ค่าเริ่มต้น</strong></button></td>
                      </tr>
                    </tbody>
                  </table></td>
                 
                </tr>

				   <script>
						 	$('#time_other_all').click(function(){
							var day = '<?=json_encode($day);?>';
					//   		var obj_day = jQuery.parseJSON( day );
					   		var obj_day = JSON.parse( day );
						if($(this).is(":checked")) {
								$('#row_time_other').show();
								$.each(obj_day, function( index, value ) {
//				   					$('#time_other_'+value).prop('checked', true);
									if(!$('#time_other_'+value).is(":checked")) {
				   					$('#time_other_'+value).click();
									}
				   				});
						 		}else{
						 			$('#row_time_other').hide();
						 			$.each(obj_day, function( index, value ) {
//										$('#time_other_'+value).prop('checked', false);
								if($('#time_other_'+value).is(":checked")) {
										$('#time_other_'+value).click();
									}
									});
								}
						 	});
						 	
						 	$('#default_time_other').click(function(){
						 			var day = '<?=json_encode($day);?>';
							  	var hour_open_default = $('#hour_open_default_other').val();
							  	var time_open_default = $('#time_open_default_other').val();
								
								var hour_close_default = $('#hour_close_default_other').val();
							  	var time_close_default = $('#time_close_default_other').val();
								
							//  	var obj_day = jQuery.parseJSON( day );
							  	var obj_day = JSON.parse( day );
							  	$.each(obj_day, function( index, value ) {
							  		if($('#open_alway_'+value).is(":checked")){
										
									}else{
										
									$('#hour_open_'+value+'_2').val(hour_open_default);
								 	$('#time_open_'+value+'_2').val(time_open_default);
								 	
								 	$('#hour_open_'+value+'_2').css('border-color','#fd0101');
								 	$('#time_open_'+value+'_2').css('border-color','#fd0101');
								 	
								 	$('#hour_close_'+value+'_2').val(hour_close_default);
								 	$('#time_close_'+value+'_2').val(time_close_default);
								 	
								 	$('#hour_close_'+value+'_2').css('border-color','#fd0101');
								 	$('#time_close_'+value+'_2').css('border-color','#fd0101');
								 	
								 	setTimeout(function(){ 
								 	$('#hour_open_'+value+'_2').css('border-color','#ccc');
								 	$('#time_open_'+value+'_2').css('border-color','#ccc');
								 	
								 	$('#hour_close_'+value+'_2').css('border-color','#ccc');
								 	$('#time_close_'+value+'_2').css('border-color','#ccc');
								 	 }, 2000);
									}
//								 	console.log(value+" : "+hour_open_default);
								});
						 	});
						 </script>
                <tr>
                  
                  <td colspan="2"> 
                  	<table width="100%" >
                  	<?  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                  			$num_day = $db->num_rows("shopping_open_time","id","product_id = '".$arr[project][id]."' and status = 1 and time_other_number = 1"); 
                  			if($num_day>=7){
								$checked =	'checked="checked"';
								}
							$num_alway_all = $db->num_rows("shopping_open_time","id","product_id = '".$arr[project][id]."' and status = 1 and open_always = 1"); 	
							if($num_alway_all>=7){
								$checked_all_alway = 'checked="checked"';
								}
                  		 ?>
                  		<tr>
                  		<td width="14%"><label style="margin-bottom: -3px;" for="open_time_all">24 ชม. ทุกวัน</label> </td>
                  		<td width="5%" ><input type="checkbox" name="open_time_all" id="open_time_all" style="width: 20px;" <?=$checked_all_alway;?> /></td>
                  		
                  		<td width="14%"><label style="margin-bottom: -3px;" for="open_all">เปิดทุกวัน</label> </td>
                  		<td><input type="checkbox" <?=$checked;?> name="open_all" id="open_all" style="width: 20px;" /></td>
                  		</tr>
                  	</table>         	
                  	<? foreach ($day as $value_d) { 
                  	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                  	$query_day = $db->select_query("SELECT * FROM shopping_open_time where product_id = '".$arr[project][id]."' and product_day = '".$value_d."'   ");
					$query_day_dt = $db->fetch($query_day);
					if($query_day_dt[status] == 1){
						$status_open = 'checked="checked"';
						$disabled_open = '';
						$disabled_color_open = '';
					}else{
						$status_open = '';
						$disabled_open = 'disabled="disabled"';
						$disabled_color_open = 'background-color : #ddd;';
					}
					if($query_day_dt[open_always] == 1){
						$status_open_24h = 'checked="checked"';
						$disabled = 'disabled="disabled"';
						$disabled_color = 'background-color : #ddd;';
						$value_alway_hour_open = '24';
						$value_alway_hour_close = '24';

					}else{
						$status_open_24h = '';
						$disabled = '';
						$disabled_color = '';
						$value_alway_hour_open = $query_day_dt[start_h];
						$value_alway_hour_close = $query_day_dt[finish_h];
					}
                  	?>
                  
                  	<table width="100%"  style="margin-top: 25px;" >
                  		<tr>
                  		<td  width="14%"><label for="open_alway_<?=$value_d;?>" style="margin-bottom: -3px;">เปิด 24 ชม.</label></td>
                  		<td><input type="checkbox" <?=$status_open_24h;?> name="open_alway_<?=$value_d;?>" id="open_alway_<?=$value_d;?>"  value="1" onclick="eachOpenAlway('<?=$value_d;?>');"  style="width: 20px;"/></td>
                  		<td width="16%" align="center"><label for="<?=$value_d;?>" style=" margin-bottom: -3px;"><?=$value_d;?></label></td>
                  		<td width="5%">
                  		<input name="<?=$value_d;?>" onclick="closeDay('<?=$value_d;?>');" id="<?=$value_d;?>" type="checkbox" class="checkbox-plan" <?=$status_open;?> value="1"  style="width: 20px;" /></td>
                  		<td width="5%" align="center"><strong>A</strong></td>
                  		<td>เปิด</td>
                  		<td>
                  		 <select <?=$disabled_open;?>  <?=$disabled;?> style="<?=$disabled_color;?><?=$disabled_color_open;?>height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_<?=$value_d;?>" id="hour_open_<?=$value_d;?>">
                  			<? foreach($hour as $value){ 
                  				if($value_alway_hour_open==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								}
                  			?>
                  				<option value="<?=$value?>" <?=$selected;?> ><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select  <?=$disabled;?><?=$disabled_open;?> style="<?=$disabled_color;?><?=$disabled_color_open;?>height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_<?=$value_d;?>" id="time_open_<?=$value_d;?>">
                  			<? foreach($time as $value){ 
                  			if($query_day_dt[start_m]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								}
                  			?>
                  				<option value="<?=$value?>" <?=$selected;?>><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.
                  		</td>
                  		<td>ปิด</td>
                  		<td>
                  		 <select <?=$disabled;?> <?=$disabled_open;?> style="<?=$disabled_color;?><?=$disabled_color_open;?>height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_<?=$value_d;?>" id="hour_close_<?=$value_d;?>">
                  			<? foreach($hour as $value){ 
                  				if($value_alway_hour_close==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								} ?>
                  				
                  				<option value="<?=$value?>" <?=$selected;?> ><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select  <?=$disabled;?><?=$disabled_open;?> style="<?=$disabled_color;?><?=$disabled_color_open;?>height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_<?=$value_d;?>" id="time_close_<?=$value_d;?>">
                  			<? foreach($time as $value){ 
                  			if($query_day_dt[finish_m]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								}?>
                  				
                  				<option value="<?=$value?>" <?=$selected;?>><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.
                  		</td>
						<td><label for="time_other_<?=$value_d;?>" style=" margin-bottom: -3px;">เวลาเพิ่มเติม</label></td>
						
<? $check_other_time = $db->num_rows("shopping_open_time","id","product_id ='".$arr[project][id]."' and product_day = '".$value_d."' and time_other_number = 2 and status =1 "); 
 	if($check_other_time<=0){
		$display = 'display: none;';
		$checked_time_other = '';
	}else{
		$display = '';
		$checked_time_other = 'checked';
	}
 			$query_timeother = $db->select_query("select * from shopping_open_time where product_id ='".$arr[project][id]."' and product_day = '".$value_d."' and time_other_number = 2 and status =1 ");
			$query_timeother_show = $db->fetch($query_timeother);
			
 ?>
						
						<td>
						
						<input <?=$checked_time_other;?> type="checkbox" value="1" id="time_other_<?=$value_d;?>" name="time_other_<?=$value_d;?>" onclick="timeOther('<?=$value_d;?>');"  style="width: 20px;"/>
						</td>
                  		</tr>
                  		<tr id="other_time_<?=$value_d;?>" style="<?=$display;?>">
                  			<td></td>
                  			<td></td>
                  			<td></td>
                  			<td></td>
                  			<td align="center" bgcolor="#FDFAD5"><strong>B</strong></td>
                  			<td bgcolor="#FDFAD5">เปิด</td>
                  			<td bgcolor="#FDFAD5">
                  			
                  		 <select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_open_<?=$value_d;?>_2" id="hour_open_<?=$value_d;?>_2">
                  			<? foreach($hour as $value){ 
                  				if($query_timeother_show[start_h]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								}
                  			?>
                  				<option value="<?=$value?>" <?=$selected;?> ><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select style="height: 30px; border: 1px solid #ccc; border-radius: 2px;" name="time_open_<?=$value_d;?>_2" id="time_open_<?=$value_d;?>_2">
                  			<? foreach($time as $value){ 
                  			if($query_timeother_show[start_m]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								}
                  			?>
                  				<option value="<?=$value?>" <?=$selected;?>><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.
                  		</td>
                  			<td bgcolor="#FDFAD5">ปิด</td>
                  			<td bgcolor="#FDFAD5">
                  		 <select  style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="hour_close_<?=$value_d;?>_2" id="hour_close_<?=$value_d;?>_2">
                  			<? foreach($hour as $value){ 
                  				if($query_timeother_show[finish_h]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								} ?>
                  				
                  				<option value="<?=$value?>" <?=$selected;?> ><?=$value?></option>
                  		<?	 } ?>	
                  		</select> .
                  		<select style="height: 30px; border: 1px solid #ccc;  border-radius: 2px;" name="time_close_<?=$value_d;?>_2" id="time_close_<?=$value_d;?>_2">
                  			<? foreach($time as $value){ 
                  			if($query_timeother_show[finish_m]==$value){
									$selected = 'selected';
								}else{
									$selected = '';
								}?>
                  				
                  				<option value="<?=$value?>" <?=$selected;?>><?=$value?></option>
                  		<?	 } ?>	
                  		</select> น.
                  		</td>
                  		</tr>
                  	</table> 
                 
                  	<? }?>
                  	<script>
                  		
                  		function timeOther(day){
							if($('#time_other_'+day).is(":checked")) {
								$('#other_time_'+day).show();
								var hour_main = $('#hour_open_'+day).val();
								var time_main = $('#time_open_'+day).val();
								/*var hour_main_close = $('#hour_close_'+day).val();
								var time_main_close = $('#time_close_'+day).val();
								$('#hour_open_'+day+'_2').find('option').each (function() {
									  if($(this).val()>=hour_main && $(this).val()<=hour_main_close){				
									  	$(this).attr("disabled", true);
									  	$(this).css('background-color', '#ccc');
									  }
								}); 
								$('#hour_close_'+day+'_2').find('option').each (function() {
									  if($(this).val()>=hour_main && $(this).val()<=hour_main_close){				
									  	$(this).attr("disabled", true);
									  	$(this).css('background-color', '#ccc');
									  }
								});*/
							}else{
								$('#other_time_'+day).hide();
							}
						}
                  	</script>
                  </td>
                </tr>
                <tr>
                  <td width="150">&nbsp;</td>
                  <td><button type="button" class="btn btn-primary btn-lg"   id="submit_data" > <span id="txt_btn_save3"> บันทึกข้อมูล </span></button>
 <script>
                 
    function closeDay(day){
//    	alert(day)
		if($('#'+day).is(":checked")) {
			if($('#open_alway_'+day).is(":checked")){
				
			}else{
				$('#hour_open_'+day).attr("disabled", false);
			 	$('#hour_open_'+day).css("background-color", '#fff');
			 	$('#time_open_'+day).attr("disabled", false);
			 	$('#time_open_'+day).css("background-color", '#fff');
			 	
			 	$('#hour_close_'+day).attr("disabled", false);
			 	$('#hour_close_'+day).css("background-color", '#fff');
			 	$('#time_close_'+day).attr("disabled", false);
			 	$('#time_close_'+day).css("background-color", '#fff');
			}
   				
   		}else{
//   			if($('#open_alway_'+day).is(":checked")){
			$('#hour_open_'+day).attr("disabled", true);
			 	$('#hour_open_'+day).css("background-color", '#ddd');
			 	$('#time_open_'+day).attr("disabled", true);
			 	$('#time_open_'+day).css("background-color", '#ddd');
			 	
			 	$('#hour_close_'+day).attr("disabled", true);
			 	$('#hour_close_'+day).css("background-color", '#ddd');
			 	$('#time_close_'+day).attr("disabled", true);
			 	$('#time_close_'+day).css("background-color", '#ddd');	
//			}
   				
		}
	}                
                    
   	$('#open_all').click(function(){
   		var day = '<?=json_encode($day);?>';
//   		var obj_day = jQuery.parseJSON( day );
   		var obj_day = JSON.parse( day );
   		if($(this).is(":checked")) {
   			
				 $.each(obj_day, function( index, value ) {
   					$('#'+value).prop('checked', true);
   					if($('#open_alway_'+value).is(":checked")){
						
					}else{
						$('#hour_open_'+value).attr("disabled", false);
					 	$('#hour_open_'+value).css("background-color", '#fff');
					 	$('#time_open_'+value).attr("disabled", false);
					 	$('#time_open_'+value).css("background-color", '#fff');
					 	
					 	$('#hour_close_'+value).attr("disabled", false);
					 	$('#hour_close_'+value).css("background-color", '#fff');
					 	$('#time_close_'+value).attr("disabled", false);
					 	$('#time_close_'+value).css("background-color", '#fff');
					}
   					
   				});
			
   		}else{
			 $.each(obj_day, function( index, value ) {
   				$('#'+value).prop('checked', false);
   				$('#hour_open_'+value).attr("disabled", true);
			 	$('#hour_open_'+value).css("background-color", '#ddd');
			 	$('#time_open_'+value).attr("disabled", true);
			 	$('#time_open_'+value).css("background-color", '#ddd');
			 	
			 	$('#hour_close_'+value).attr("disabled", true);
			 	$('#hour_close_'+value).css("background-color", '#ddd');
			 	$('#time_close_'+value).attr("disabled", true);
			 	$('#time_close_'+value).css("background-color", '#ddd');
   			});
		}
   	});

    $('#open_time_all').click(function(){
    var day = '<?=json_encode($day);?>';
//    var obj_day = jQuery.parseJSON( day );
    var obj_day = JSON.parse( day );
    var hour_open_default = $('#hour_open_default').val();
  	var time_open_default = $('#time_open_default').val();
	
	var hour_close_default = $('#hour_close_default').val();
  	var time_close_default = $('#time_close_default').val();		
    	if($(this).is(":checked")) {
            $.each(obj_day, function( index, value ) {
			 	$('#open_alway_'+value).prop('checked', true);
			 	
			 	$('#hour_open_'+value).val('24');
			 	$('#time_open_'+value).val('00');
			 	
			 	$('#hour_close_'+value).val('24');
			 	$('#time_close_'+value).val('00');
			 	
			 	$('#hour_open_'+value).attr("disabled", true);
			 	$('#hour_open_'+value).css("background-color", '#ddd');
			 	$('#time_open_'+value).attr("disabled", true);
			 	$('#time_open_'+value).css("background-color", '#ddd');
			 	
			 	$('#hour_close_'+value).attr("disabled", true);
			 	$('#hour_close_'+value).css("background-color", '#ddd');
			 	$('#time_close_'+value).attr("disabled", true);
			 	$('#time_close_'+value).css("background-color", '#ddd');
			});
        }else{
			$.each(obj_day, function( index, value ) {
			 	$('#open_alway_'+value).prop('checked', false);
			 	
			 	$('#hour_open_'+value).val(hour_open_default);
			 	$('#time_open_'+value).val(time_open_default);
			 	
			 	$('#hour_close_'+value).val(hour_close_default);
			 	$('#time_close_'+value).val(time_close_default);
			 	
			 	$('#hour_open_'+value).attr("disabled", false);
			 	$('#hour_open_'+value).css("background-color", '#fff');
			 	$('#time_open_'+value).attr("disabled", false);
			 	$('#time_open_'+value).css("background-color", '#fff');
			 	
			 	$('#hour_close_'+value).attr("disabled", false);
			 	$('#hour_close_'+value).css("background-color", '#fff');
			 	$('#time_close_'+value).attr("disabled", false);
			 	$('#time_close_'+value).css("background-color", '#fff');
			});
		}
        $('#open_time_all').val($(this).is(':checked'));   
    });
 
  $('#default_time').click(function(){
  	   	var day = '<?=json_encode($day);?>';
  	var hour_open_default = $('#hour_open_default').val();
  	var time_open_default = $('#time_open_default').val();
	
	var hour_close_default = $('#hour_close_default').val();
  	var time_close_default = $('#time_close_default').val();
	
//  	var obj_day = jQuery.parseJSON( day );
  	var obj_day = JSON.parse( day );
  	$.each(obj_day, function( index, value ) {
  		if($('#open_alway_'+value).is(":checked")){
			
		}else{
		$('#hour_open_'+value).val(hour_open_default);
	 	$('#time_open_'+value).val(time_open_default);
	 	
	 	$('#hour_close_'+value).val(hour_close_default);
	 	$('#time_close_'+value).val(time_close_default);
		}
	 	console.log(value+" : "+hour_open_default);
	 	
	 	
	});
  	
  });                                     
      
    function eachOpenAlway(day){
      
		  	if($('#open_alway_'+day).is(":checked")) {
	        				 	
				 	$('#hour_open_'+day).val('24');
				 	$('#time_open_'+day).val('00');
				 	
				 	$('#hour_close_'+day).val('24');
				 	$('#time_close_'+day).val('00');
				 	
				 	$('#hour_open_'+day).attr("disabled", true);
				 	$('#hour_open_'+day).css("background-color", '#ddd');
				 	$('#time_open_'+day).attr("disabled", true);
				 	$('#time_open_'+day).css("background-color", '#ddd');
				 	
				 	$('#hour_close_'+day).attr("disabled", true);
				 	$('#hour_close_'+day).css("background-color", '#ddd');
				 	$('#time_close_'+day).attr("disabled", true);
				 	$('#time_close_'+day).css("background-color", '#ddd');
		        }else{
	var hour_open_default = $('#hour_open_default').val();
  	var time_open_default = $('#time_open_default').val();
	
	var hour_close_default = $('#hour_close_default').val();
  	var time_close_default = $('#time_close_default').val();
					$('#hour_open_'+day).val(hour_open_default);
				 	$('#time_open_'+day).val(time_open_default);
				 	
				 	$('#hour_close_'+day).val(hour_close_default);
				 	$('#time_close_'+day).val(time_close_default);
				 	
				 	$('#hour_open_'+day).attr("disabled", false);
				 	$('#hour_open_'+day).css("background-color", '#fff');
				 	$('#time_open_'+day).attr("disabled", false);
				 	$('#time_open_'+day).css("background-color", '#fff');
				 	
				 	$('#hour_close_'+day).attr("disabled", false);
				 	$('#hour_close_'+day).css("background-color", '#fff');
				 	$('#time_close_'+day).attr("disabled", false);
				 	$('#time_close_'+day).css("background-color", '#fff');
				}
	  }
      
                    
  $("#submit_data").click(function(){

	  
	  
  if(document.getElementById('topic_th').value=="") {
alert('กรุณากรอกชื่อภาษาไทย'); 
document.getElementById('topic_th').focus() ; 
return false ;
}

	  

 if(document.getElementById('province').value=="") {
alert('กรุณาเลือกจังหวัด'); 
document.getElementById('province').focus() ; 
return false ;
}

 

 if(document.getElementById('address').value=="") {
alert('กรุณากรอกที่อยู่'); 
document.getElementById('address').focus() ; 
return false ;
}

 if(document.getElementById('phone').value=="") {
alert('กรุณากรอกเบอร์โทรศัพท์'); 
document.getElementById('phone').focus() ; 
return false ;
}

 
 		 
  $.post('go.php?name=content/load&file=place&op=sub_edit_action&id=<?=$_GET[id];?>',$('#myform').serialize(),function(response){
// $('#div_send_data_msg').html(response);  
console.log(response);
$('#all_place').click();
  });
  

 var url_page_type= "empty_style.php?name=content/load&file=place&main=<? echo $arr[project][main];?>&sub=<? echo $arr[project][sub];?>";
	  
  
 $('#show_data_page').load(url_page_type);
  
  
  
			   });
			    </script>
				  </td>
                </tr>
              </table></td>
              <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
                <tbody>
                  <tr>
                    <td width="120" valign="middle"><strong>โลโก้ : </strong></td>
                    <td valign="top"> 
                    
                    
            <div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
 
 
 

<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_logo"></i><br>
เลือกภาพถ่าย
<div style="padding:5px;">
  
  <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_logo" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
  </div>
    
 

    

 <img
 
   <? if($arr[project][pic_logo]==1){ ?>

  src="../data/pic/place/<?=$_GET[id];?>_logo.jpg?v=<?=time()?>" 

<? }  ?>
 
 
 
 
 
  id="image_id_logo" name="image_id_logo"  style="width:300px; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>
 
 
  
    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    </td>
                  </tr>
                  <tr>
                    <td><strong>โบรชัวร์ : </strong></td>
                    <td><div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
 
 
 

<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_book"></i><br>

เลือกโบรชัวร์ 1

<div style="padding:5px;">
  
  <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_book" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  </div>
    
    

    

 <img
 
 <? if($arr[project][pic_book]==1){ ?>
 
 src="../data/pic/place/<?=$_GET[id];?>_book.jpg?v=<?=time()?>" 

<? }  ?>
 

  id="image_id_book" name="image_id_book"  style="width:300px; padding:5px; margin-top:-20px;border-radius:15px; " />
  <div style="margin-top: 5px;" style="display: "><textarea rows="3" cols="30" name="text_imge_id_book"><?=$arr[project][text_pic_book]?></textarea></div>
  <br/>
</div>

 
  
    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
 <div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
 
 
 

<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_book_2"></i><br>

เลือกโบรชัวร์ 2

<div style="padding:5px;">
  
  <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_book_2" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
  </div>
    
    

    

 <img
 
 <? if($arr[project][pic_book_2]==1){ ?>

 src="../data/pic/place/<?=$_GET[id];?>_book_2.jpg?v=<?=time()?>" 

<? }  ?>
 
 
 
 
  id="image_id_book_2" name="image_id_book_2"  style="width:300px; padding:5px; margin-top:-20px;border-radius:15px; " />
 <div style="margin-top: 5px;"><textarea rows="3" cols="30" name="text_imge_id_book_2"><?=$arr[project][text_pic_book_2]?></textarea>
  </div><br/>
</div>
 
 
  
    </div>
                    
                    
                    
                    
                    
                            
                    
                    
                    
 <div class="<?= $coldata?>">
 
 <div class="take_photo" ><center>
 
 
 

<i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_book_3"></i><br>

เลือกโบรชัวร์ 3

<div style="padding:5px;">
  
  <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_book_3" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
  </div>
    
    

    

 <img
 
 <? if($arr[project][pic_book_3]==1){ ?>

 src="../data/pic/place/<?=$_GET[id];?>_book_3.jpg?v=<?=time()?>" 

<? }  ?>
 
 
 
 
  id="image_id_book_3" name="image_id_book_3"  style="width:300px; padding:5px; margin-top:-20px;border-radius:15px; " />
 <div style="margin-top: 5px;"><textarea rows="3" cols="30" name="text_image_id_book_3"><?=$arr[project][text_pic_book_3]?></textarea>
  </div><br/>
</div>
 
 
  
    </div>
                    
                    
                    
                          
                    
                    
                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>    <input class="form-control" type="hidden" name="check_photo_id_logo" id="check_photo_id_logo"   onkeypress="PasswordEnter(this,event)"   value="0" >
    
    
     <input class="form-control" type="hidden" name="check_photo_id_book" id="check_photo_id_book"   onkeypress="PasswordEnter(this,event)"   value="0" >
     
         <input class="form-control" type="hidden" name="check_photo_id_book_2" id="check_photo_id_book_2"   onkeypress="PasswordEnter(this,event)"   value="0" > 
     
        <input class="form-control" type="hidden" name="check_photo_id_book_3" id="check_photo_id_book_3"   onkeypress="PasswordEnter(this,event)"   value="0" > 
    
     <div style="display:none">
 
 <?  include ("mod/content/photo/upload_car_pic.php");?>
 
 </div>
 
 <br>
 
  <?
 $rand = substr(str_shuffle('123456789012345678901234567890'),0,30);
 
 ?>
 




 
 

 
 
      <input class="form-control" type="hidden" name="check_code" id="check_code"   onkeypress="PasswordEnter(this,event)"   value="<?=$rand ?>" >
  
   <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true" onkeypress="PasswordEnter(this,event)"   value="" >  
  
  
<script>

 
    
        /////////  id driving
 $("#icon_camera_id_logo").click(function(){  
 
 
  
  document.getElementById('upload_pic_type').value='id_logo';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
          /////////  id driving
 $("#icon_camera_id_book").click(function(){  
 
  
  document.getElementById('upload_pic_type').value='id_book';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
  
  
  
   $("#icon_camera_id_book_2").click(function(){  
 
  
  document.getElementById('upload_pic_type').value='id_book_2';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
  
  
  
   $("#icon_camera_id_book_3").click(function(){  
 
  
  document.getElementById('upload_pic_type').value='id_book_3';
 
 
  $("#load_chat_camera").click(); 
  
  });
  
 
  
  
  
  
  </script></td>
                  </tr>
				  <tr>
				  	<td><strong>เอกสาร :</strong></td>
				  	<td>
				  		<div id="load_list_file"></div>
				  		<script>
				  			$( document ).ready(function() {
				  				var url = 'empty_style.php?name=content/load/popup&file=list_upload&id=<?=$_GET[id];?>';
							    $('#load_list_file').load(url);
							    $('#check_expired').click();
							    $('#row_expired').show();
							});
				  		</script>
				  	</td>
				  </tr>
				  <tr>
				  	<td><strong>เพิ่มเอกสาร :</strong></td>
				  	<td>
				  	<form id="form_upload_file" enctype="multipart/form-data"  >
				  		<table>
				  			<tr>
				  				<td>ประเภท</td>
				  				<td>
				  				<select name="type_doc" id="type_doc" class="form-control">
				  				<option value="0">- เลือกประเภทเอกสาร -</option>
				  				<? 
				  				$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
								$res[type_doc_all] = $db->select_query("SELECT * FROM place_detail_doc_group order by id  ");
								while ($arr[type_doc_all] = $db->fetch($res[type_doc_all])){ ?>
									<option value="<?=$arr[type_doc_all][id];?>"><?=$arr[type_doc_all][category_name];?></option>
								<? }
				  				?>
				  				</select></td>
				  			</tr>
				  			<tr>
				  				<td align="right"><input class="" style="width: 20px;" type="checkbox" name="check_expired" id="check_expired" value="1"/></td>
				  				<td><label for="check_expired" style="margin-top: 9px;">มีวันหมดอายุเอกสาร</label></td>
				  			</tr>
				  			<tr id="row_expired" style="display: none;">
				  				<td>วันเริ่ม-หมดอายุ</td>
				  				<td>
				  					<table>
				  						<tr>
				  							<td>
 <script src="datetimepicker-master/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="datetimepicker-master/jquery.datetimepicker.css"/>
 <script src="datetimepicker-master/build/jquery.datetimepicker.full.js"></script>
 <style>
 	.xdsoft_datetimepicker {

z-index: 30000!important;
	}
 </style>
<input id="datetimepicker2"   class="form-control"  name="date1"  value="<?=$date;?>" style="padding: 8px;border: 1px solid #eeeeee;width:100%;cursor: pointer;">
 </td>
					  		<td> ถึง </td>
					  		<td>
 <input id="datetimepicker22"   class="form-control"  name="date2" value="<?=$date;?>" style="padding: 8px;     border: 1px solid #eeeeee;width:100%;cursor: pointer;">					  			
					  		</td>
<script>
	$('#datetimepicker2').datetimepicker({
	timepicker:false,
	format:'Y-m-d',
	formatDate:'Y-m-d'
});
</script>
<script>
	$('#datetimepicker22').datetimepicker({
	timepicker:false,
	format:'Y-m-d',
	formatDate:'Y-m-d'
});
</script>
				  						</tr>
				  					</table>
				  				 </td>
				  			</tr>
				  			<tr>
				  				<td>ไฟล์</td>
				  				<td><input type="file" class="" name="file_doc[]" id="file_doc" accept="*" multiple="multiple" /></td>			
				  			</tr>
				  			<tr>
				  				<td></td>
				  				<td >
				  				<table id="append_tb_detail_file" class="table"></table>
				  				</td>
				  			</tr>
				  		</table>
				  	</form>	
				  	</td>
				  	
				  </tr>
				  <tr>
				  	<td></td>
				  	<td align="center"><button class="btn btn-success" type="button" id="save_upload_file" style="width: 80%"><i class="glyphicon glyphicon-upload"></i> อัพโหลด</button></td>
				  </tr>
				  <script>
		$('#check_expired').click(function(){
			if($(this).is(":checked")){
				$('#row_expired').show();
			}else{
				$('#row_expired').hide();
			}
		});
				  
 		$( "#file_doc" ).change(function() {
			   $('#append_tb_detail_file tr').remove();
				for (var i = 0; i < this.files.length; i++) { //for multiple files          
				    (function(file) {
				        var name = file.name;
				      
				      
				        var reader = new FileReader();  
				        reader.onload = function(e) {  
				            // get file content  
				            var type = getFileExtension(file.name);    
				             $('#append_tb_detail_file').append('<tr><td>'+i+'<td><td width="40%">'+name+'</td><td>'+file.size+' bytes</td></tr>');
				        }
				reader.readAsDataURL(file);
				    })(this.files[i]);
				}

					});

		$('#save_upload_file').click(function(){
				  	console.log($('#datetimepicker2').val());
				  	console.log($('#datetimepicker22').val());
//				  	return;
				  	if($('#type_doc').val()==0){
				  		alert('กรุณาเลือกประเภทเอกสาร');
						return;
					}	
					console.log(123);	
					var data_form = $('#form_upload_file').serialize();
					var data = new FormData($('#form_upload_file')[0]);
					data.append('date1', $('#datetimepicker2').val());
					data.append('date2', $('#datetimepicker22').val());
					data.append('type_doc', $('#type_doc').val());
					data.append('check_expired', $('#check_expired').val());
    				for(var i=0;i<$('#file_doc')[0].files.length;i++){
						data.append('file[]', $('#file_doc')[0].files[i]);
//						console.log(data);
					}
    					
					   $.ajax({
					           url: 'empty_style.php?name=content/load&file=place&op=sub_upload_file&id=<?=$_GET[id];?>', 
					                dataType: 'text',  // what to expect back from the PHP script, if anything
					                cache: false,
					                contentType: false,
					                processData: false,
					                data: data,                         
					                type: 'post',
					                success: function(php_script_response){
									
									   console.log(php_script_response);
									 	swal("สำเร็จ!", "อัพโหลดไฟล์สำเร็จ!", "success");
									 	$('#file_doc').val('');
									 	 $("#type_doc").val(0);
									 	$('#append_tb_detail_file tr').remove();
									 	var url = 'empty_style.php?name=content/load/popup&file=list_upload&id=<?=$_GET[id];?>';
							    		$('#load_list_file').load(url);
					                }
					     });
						
				  	});
	
				  	
		function getFileExtension(filename) {
					  return (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename) : undefined;
					}
				  </script>
                </tbody>
              </table></td>
            </tr>
          </tbody>
        </table></td>
        </tr>
    </table></td>
      </tr>
    </table>
    </FORM>
	
<? } ?>

<? 
if($_GET[op]=='sub_upload_file'){
//	echo json_encode(count($_FILES['file']['name']));

$product_id = $_GET[id];
$type_doc = $_POST[type_doc];
if($_POST[check_expired]==1){
	$start_expired = $_POST[date1];
	$end_expired = $_POST[date2];
}else{
	$start_expired = '';
	$end_expired = '';
}
for($i=0; $i<count($_FILES['file']['name']); $i++) {

		$tmpFilePath = $_FILES['file']['tmp_name'][$i];
		 if($tmpFilePath != ""){
		 	    $ext = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
		 	    
		 	    $num = time();
             
             
				$doc_name = $type_txt.$product_id."_".$num.$i.".".$ext;
				$target_file = "../data/pic/document/place/".$type_txt.$product_id."_".$num.$i.".".$ext;
				
             if(move_uploaded_file($tmpFilePath, $target_file)) {
						 $array = array(
						"product_id"=>$product_id, 
						"document_name"=>$doc_name, 
						"type"=>$type_doc,
						"start_expired"=>$start_expired,
						"end_expired"=>$end_expired,
						"status"=>1
					);	
	    	$reuslt = $db->add_db('place_document_file',$array);
                }
		}
		echo json_encode($reuslt);   
	}

}

if($_GET[op]=='sub_file_deleted'){
   	$file = "../data/pic/document/place/".$_POST[filename];
   	$reuslt = $db->del("place_document_file","product_id= '".$_GET[id]."' and document_name = '".$_POST[filename]."' and id = '".$_POST[id_row]."' "); 
   	if($reuslt==1){
		if (!unlink($file))
		  {
		  echo ("Error deleting $file");
		  }
		else
		  {
		  echo ("Deleted $file");
		  }
	}
	    echo $result;
}
?>

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
 
		"lat"=>"$_POST[lat_db]",
		"lng"=>"$_POST[lng_db]",
		
		"map"=>"$_POST[map]",
		"status"=>'0',
		
		"address"=>"$_POST[address]",
		"phone"=>"$_POST[phone]",
		"email"=>"$_POST[email]",
		"province"=>"$_POST[province]",
		"open"=>"$_POST[open]",
		
		"commission"=>"$_POST[commission]",
		"price_plan"=>"$_POST[price_plan]",
		
		"price_plan_2"=>"$_POST[price_plan_2]",
		"price_plan_3"=>"$_POST[price_plan_3]",
		
		
		"pic_logo"=>"$_POST[check_photo_id_logo]",
		"pic_book"=>"$_POST[check_photo_id_book]",
		"pic_book_2"=>"$_POST[check_photo_id_book_2]",
		"pic_book_3"=>"$_POST[check_photo_id_book_3]",
		
		
		
		"open_Sun"=>"$_POST[Sun]",
"open_Mon"=>"$_POST[Mon]",
"open_Tue"=>"$_POST[Tue]",
"open_Wed"=>"$_POST[Wed]",
"open_Thu"=>"$_POST[Thu]",
"open_Fri"=>"$_POST[Fri]",
"open_Sat"=>"$_POST[Sat]",
"amphur"=>"$_POST[select_amphur]",
				"text_pic_book"=>"$_POST[text_imge_id_book]",
				"text_pic_book_2"=>"$_POST[text_imge_id_book_2]",
				"text_pic_book_3"=>"$_POST[text_imge_id_book_3]",
		
 
		
			
			"sub"=>"$_POST[sub]",
			"return_guest"=>"$_POST[return_guest]",
			"vat_percent"=>"$_POST[set_vat]",
			"region"=>"$_POST[region]",
			"return_vat"=>"$_POST[return_vat]",
			 "main"=>"$_POST[main]"
			 
 
 
		));
		
 
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
 
$next_increment     = 0;
$qShowStatus        = "SHOW TABLE STATUS LIKE 'shopping_product'";
$qShowStatusResult  = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );
$row = mysql_fetch_assoc($qShowStatusResult);

$last_id = $row['Auto_increment']-1;

 		
 		foreach($day as $value){
 			$hour_open = 'hour_open_'.$value;
			$time_open = 'time_open_'.$value;
			
			$hour_close = 'hour_close_'.$value;
			$time_close = 'time_close_'.$value;
			
			$open_alway = "open_alway_".$value;
			
 			if($_POST[$value]==NULL or $_POST[$value]==""){
				$status = 0;
			}
			else{
				$status = 1;
			}
			
			if($_POST[$open_alway]==NULL or $_POST[$open_alway]==""){
				$status_alway = 0;
			}else{
				$status_alway = 1;
			}
			if($_POST[$hour_open]==NULL or $_POST[$hour_open]==""){
				$hour_open_val = 00;
			}else{
				$hour_open_val = $_POST[$hour_open];
			}
			if($_POST[$time_open]==NULL or $_POST[$time_open]==""){
				$time_open_val = 00;
			}else{
				$time_open_val = $_POST[$time_open];
			}
			if($_POST[$hour_close]==NULL or $_POST[$hour_close]==""){
				$hour_close_val = 00;
			}else{
				$hour_close_val = $_POST[$hour_close];
			}
			if($_POST[$time_close]==NULL or $_POST[$time_close]==""){
				$time_close_val = 00;
			}else{
				$time_close_val = $_POST[$time_close];
			}
			
			$day_row['product_id'] = $last_id;
			$day_row['product_day'] = $value;
			$day_row['status'] = $status;
			$day_row['open_always'] = $status_alway;
			$day_row['type'] = 1;
			$day_row['start_h'] = $hour_open_val;
			$day_row['start_m'] = $time_open_val;
			$day_row['finish_h'] = $hour_close_val;
			$day_row['finish_m'] = $time_close_val;
			echo json_encode($day_row);
//			echo "<br>";
			$db->add_db('shopping_open_time',$day_row);
			
			$time_other = 'time_other_'.$value;
			if($_POST[$time_other]!="" or $_POST[$time_other]!=null){
					$hour_open2 = 'hour_open_'.$value.'_2';
					$time_open2 = 'time_open_'.$value.'_2';
					
					$hour_close2 = 'hour_close_'.$value.'_2';
					$time_close2 = 'time_close_'.$value.'_2';
					if($_POST[$hour_open2]==NULL or $_POST[$hour_open2]==""){
						$hour_open_val2 = 00;
					}else{
						$hour_open_val2 = $_POST[$hour_open2];
					}
					if($_POST[$time_open2]==NULL or $_POST[$time_open2]==""){
						$time_open_val2 = 00;
					}else{
						$time_open_val2 = $_POST[$time_open2];
					}
					if($_POST[$hour_close2]==NULL or $_POST[$hour_close2]==""){
						$hour_close_val2 = 00;
					}else{
						$hour_close_val2 = $_POST[$hour_close2];
					}
					if($_POST[$time_close2]==NULL or $_POST[$time_close2]==""){
						$time_close_val2 = 00;
					}else{
						$time_close_val2 = $_POST[$time_close2];
					}
						$day_row_other['product_id'] = $last_id;
						$day_row_other['product_day'] = $value;
						$day_row_other['status'] = $_POST[$time_other];
						$day_row_other['open_always'] = $status_alway;
						$day_row_other['type'] = 1;
						
						$day_row_other['start_h'] = $hour_open_val2;
						$day_row_other['start_m'] = $time_open_val2;
						$day_row_other['finish_h'] = $hour_close_val2;
						$day_row_other['finish_m'] = $time_close_val2;
						$day_row_other['time_other_number'] = 2;
						
					    $result = $db->add_db('shopping_open_time',$day_row_other);
echo json_encode($result);
			}
			
		}
//		echo json_encode($array_d);


if($_POST[check_photo_id_logo]==1){ 

@copy ("../data/fileupload/store/place/".$_POST[check_code]."_id_logo.jpg", "../data/pic/place/".$last_id."_logo.jpg" );    
 @unlink ("../data/fileupload/store/place/".$_POST[check_code]."_id_logo.jpg" ); 	
}

if($_POST[check_photo_id_book]==1){ 
 @copy ("../data/fileupload/store/place/".$_POST[check_code]."_id_book.jpg", "../data/pic/place/".$last_id."_book.jpg" );   
@unlink ("../data/fileupload/store/place/".$_POST[check_code]."_id_book.jpg" ); 	
 	
}


if($_POST[check_photo_id_book_2]==1){ 
 @copy ("../data/fileupload/store/place/".$_POST[check_code]."_id_book_2.jpg", "../data/pic/place/".$last_id."_book_2.jpg" );   
@unlink ("../data/fileupload/store/place/".$_POST[check_code]."_id_book_2.jpg" ); 	
 	
}

if($_POST[check_photo_id_book_3]==1){ 
 @copy ("../data/fileupload/store/place/".$_POST[check_code]."_id_book_3.jpg", "../data/pic/place/".$last_id."_book_3.jpg" );   
@unlink ("../data/fileupload/store/place/".$_POST[check_code]."_id_book_3.jpg" ); 	
 	
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
 
			 "topic_en"=>"$_POST[topic_en]",
			 
 		"map"=>"$_POST[map]",
			 
		"lat"=>"$_POST[lat_db]",
		"lng"=>"$_POST[lng_db]",
		//	"status"=>"1", 
	 
		 "start_time"=>"$_POST[start_time]",
		 "finish_time"=>"$_POST[finish_time]",
		
		"address"=>"$_POST[address]",
		"phone"=>"$_POST[phone]",
		"email"=>"$_POST[email]",
		"province"=>"$_POST[province]",
		"open"=>"$_POST[open]",
		
		"commission"=>"$_POST[commission]",
		"price_plan"=>"$_POST[price_plan]",
		
		"price_plan_2"=>"$_POST[price_plan_2]",
		"price_plan_3"=>"$_POST[price_plan_3]",
		
		
	// "pic_logo"=>"$_POST[check_photo_id_logo]",
	//	"pic_book"=>"$_POST[check_photo_id_book]",
	
	
	"open_Sun"=>"$_POST[Sun]",
"open_Mon"=>"$_POST[Mon]",
"open_Tue"=>"$_POST[Tue]",
"open_Wed"=>"$_POST[Wed]",
"open_Thu"=>"$_POST[Thu]",
"open_Fri"=>"$_POST[Fri]",
"open_Sat"=>"$_POST[Sat]",
	
		"text_pic_book"=>"$_POST[text_imge_id_book]",
		"text_pic_book_2"=>"$_POST[text_imge_id_book_2]",
		"text_pic_book_3"=>"$_POST[text_imge_id_book_3]",
		
 		"sub"=>"$_POST[sub]",
 		"return_guest"=>"$_POST[return_guest]",
 		"amphur"=>"$_POST[select_amphur]",
 		"region"=>"$_POST[region]",
 		"vat_percent"=>"$_POST[set_vat]",
 		"return_vat"=>"$_POST[return_vat]",
	 	 "main"=>"$_POST[main]"
 
		)," id=$_GET[id] ");
	 
		
		
		
		
 $last_id = $_GET[id];

 foreach($day as $value){
 			$hour_open = 'hour_open_'.$value;
			$time_open = 'time_open_'.$value;
			
			$hour_close = 'hour_close_'.$value;
			$time_close = 'time_close_'.$value;
			
			$open_alway = "open_alway_".$value;
			
 			if($_POST[$value]==NULL or $_POST[$value]==""){
				$status = 0;
			}
			else{
				$status = 1;
			}
			
			if($_POST[$open_alway]==NULL or $_POST[$open_alway]==""){
				$status_alway = 0;
			}else{
				$status_alway = 1;
			}
			if($_POST[$hour_open]==NULL or $_POST[$hour_open]==""){
				$hour_open_val = 00;
			}else{
				$hour_open_val = $_POST[$hour_open];
			}
			if($_POST[$time_open]==NULL or $_POST[$time_open]==""){
				$time_open_val = 00;
			}else{
				$time_open_val = $_POST[$time_open];
			}
			if($_POST[$hour_close]==NULL or $_POST[$hour_close]==""){
				$hour_close_val = 00;
			}else{
				$hour_close_val = $_POST[$hour_close];
			}
			if($_POST[$time_close]==NULL or $_POST[$time_close]==""){
				$time_close_val = 00;
			}else{
				$time_close_val = $_POST[$time_close];
			}
			$day_row['product_id'] = $last_id;
			$day_row['product_day'] = $value;
			$day_row['status'] = $status;
			$day_row['open_always'] = $status_alway;
			$day_row['type'] = 1;
			
			$day_row['start_h'] = $hour_open_val;
			$day_row['start_m'] = $time_open_val;
			$day_row['finish_h'] = $hour_close_val;
			$day_row['finish_m'] = $time_close_val;
			

			$num_row = $db->num_rows("shopping_open_time","id","product_id ='".$last_id."' and product_day = '".$value."' "); 
			if($num_row<=0){
				$db->add_db('shopping_open_time',$day_row);
			}else{
				$db->update_db('shopping_open_time',$day_row,"product_id ='".$last_id."' and product_day = '".$value."' ");
			}
//			echo json_encode($day_row);
			$time_other = 'time_other_'.$value;
			if($_POST[$time_other]!="" or $_POST[$time_other]!=null){
					$hour_open2 = 'hour_open_'.$value.'_2';
					$time_open2 = 'time_open_'.$value.'_2';
					
					$hour_close2 = 'hour_close_'.$value.'_2';
					$time_close2 = 'time_close_'.$value.'_2';
					if($_POST[$hour_open2]==NULL or $_POST[$hour_open2]==""){
						$hour_open_val2 = 00;
					}else{
						$hour_open_val2 = $_POST[$hour_open2];
					}
					if($_POST[$time_open2]==NULL or $_POST[$time_open2]==""){
						$time_open_val2 = 00;
					}else{
						$time_open_val2 = $_POST[$time_open2];
					}
					if($_POST[$hour_close2]==NULL or $_POST[$hour_close2]==""){
						$hour_close_val2 = 00;
					}else{
						$hour_close_val2 = $_POST[$hour_close2];
					}
					if($_POST[$time_close2]==NULL or $_POST[$time_close2]==""){
						$time_close_val2 = 00;
					}else{
						$time_close_val2 = $_POST[$time_close2];
					}
						$day_row_other['product_id'] = $last_id;
						$day_row_other['product_day'] = $value;
						$day_row_other['status'] = $_POST[$time_other];
						$day_row_other['open_always'] = $status_alway;
						$day_row_other['type'] = 1;
						
						$day_row_other['start_h'] = $hour_open_val2;
						$day_row_other['start_m'] = $time_open_val2;
						$day_row_other['finish_h'] = $hour_close_val2;
						$day_row_other['finish_m'] = $time_close_val2;
						$day_row_other['time_other_number'] = 2;
						$num_row_other = $db->num_rows("shopping_open_time","id","product_id ='".$last_id."' and product_day = '".$value."' and time_other_number = 2 "); 
						if($num_row_other<=0){
							$result = $db->add_db('shopping_open_time',$day_row_other);
						}else{
							
							$result = $db->update_db('shopping_open_time',$day_row_other,"product_id ='".$last_id."' and product_day = '".$value."' and time_other_number = 2 ");
						}
//						echo json_encode($day_row_other);
//						echo json_encode($result);
			}else{
				$day_row_other['status'] = $_POST[$time_other];
				$result = $db->update_db('shopping_open_time',$day_row_other,"product_id ='".$last_id."' and product_day = '".$value."' and time_other_number = 2 ");
			}
			
		}
 

 

if($_POST[check_photo_id_logo]==1){ 


	  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('shopping_product', array(
 
			  "pic_logo" => "1"
 
		)," id='".$_GET[id]."' ");


@unlink ("../data/pic/place/".$last_id."_logo.jpg" ); 	

@copy ("../data/fileupload/store/place/".$_POST[check_code]."_id_logo.jpg", "../data/pic/place/".$last_id."_logo.jpg" );    
 @unlink ("../data/fileupload/store/place/".$_POST[check_code]."_id_logo.jpg" ); 	
}


if($_POST[check_photo_id_book]==1){ 


	  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('shopping_product', array(
 
			  "pic_book" => "1"
 
		)," id='".$_GET[id]."' ");


@unlink ("../data/pic/place/".$last_id."_book.jpg" ); 	

 @copy ("../data/fileupload/store/place/".$_POST[check_code]."_id_book.jpg", "../data/pic/place/".$last_id."_book.jpg" );   
@unlink ("../data/fileupload/store/place/".$_POST[check_code]."_id_book.jpg" ); 	
 	
}


if($_POST[check_photo_id_book_2]==1){ 


	  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('shopping_product', array(
 
			  "pic_book_2" => "1"
 
		)," id='".$_GET[id]."' ");


@unlink ("../data/pic/place/".$last_id."_book_2.jpg" ); 	

 @copy ("../data/fileupload/store/place/".$_POST[check_code]."_id_book_2.jpg", "../data/pic/place/".$last_id."_book_2.jpg" );   
@unlink ("../data/fileupload/store/place/".$_POST[check_code]."_id_book_2.jpg" ); 	
 	
}


if($_POST[check_photo_id_book_3]==1){ 


	  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('shopping_product', array(
 
			  "pic_book_3" => "1"
 
		)," id='".$_GET[id]."' ");


@unlink ("../data/pic/place/".$last_id."_book_3.jpg" ); 	

 @copy ("../data/fileupload/store/place/".$_POST[check_code]."_id_book_3.jpg", "../data/pic/place/".$last_id."_book_3.jpg" );   
@unlink ("../data/fileupload/store/place/".$_POST[check_code]."_id_book_3.jpg" ); 	
 	
}

	
	}
 
 
 ?>

 
 <?
  if($_GET[op] == "sub_del"){
	//////////////////////////////////////////// óź Form
 
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->del('shopping_product'," id='".$_GET[id]."' "); 
	 
		$db->closedb ();
  }
  
  
  if($_GET[op] == "status_open"){
	//////////////////////////////////////////// óź Form
	  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('shopping_product', array(
 
			  "status" =>1
 
		)," id='".$_GET[id]."' ");

  }
  
  
   if($_GET[op] == "status_close"){
	//////////////////////////////////////////// óź Form
	  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('shopping_product', array(
 
			  "status" =>0
 
		)," id='".$_GET[id]."' ");

  }
  
    
   if($_GET[op] == "open55"){
		  
		  
 
		  
	//////////////////////////////////////////// óź Form
	//  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('plan_product_price_setting', array(
 
 
		$_GET[type]=>"$_GET[status]"
		
 
	 
 
		)," product_id='".$_GET[id]."' and plan_id='".$_GET[mainplan]."' and plan_master='".$_GET[plan]."' ");

  }
  
  
   if($_GET[op] == "open"){
		  
 
		  
	//////////////////////////////////////////// óź Form
	//  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('plan_product_price_setting', array(
 
 
		$_GET[type]=>"$_GET[status]"
		
 
	 
 
		)," id='".$_GET[setid]."' ");

  }

	
?>