
 <?  include ("mod/livechat/all/update/check.php");?> 
 
 


<div id="load_data_chat_online_all"></div>

 
 <div style="padding-right:0px; margin-top:-10px; ">
 
  <div id="load_data_chat_top"></div>
 
 
 	<script>
 //// $("#message_alert_1").html('8');
	
	 $("#top_msg").append('<div id="top_msg_1"> </div>'); 
	</script>	
 
 
<?
 


$db->connectdb(DB_NAME_CHAT_CONTACT, DB_USERNAME, DB_PASSWORD);  
$limit = 100 ;
 $SUMPAGE = $db->num_rows('chat_group',"id","$SQLwhere");
$page=$_GET[page];
if (empty($page)){
	$page=1;
}





$rt = $SUMPAGE%$limit ;
$totalpage = ($rt!=0) ? floor($SUMPAGE/$limit)+1 : floor($SUMPAGE/$limit); 
$goto = ($page-1)*$limit ;


if($_GET[text]){



 $findname= "where name  like '%".$_GET[text]."%'";


$res[chat] = $db->select_query("SELECT * FROM chat_group $findname  ORDER BY id ASC ");


} else {
$res[chat] = $db->select_query("SELECT * FROM chat_group ORDER BY id ASC ");

}

 
$count=0;

while($arr[chat] = $db->fetch($res[chat])){

$bgcolor = ($i++ & 1) ? '#f6f6f6' : ''; 
 


if($arr[chat][class_name]=='customer'){

$web_data="web_book_agent";
 
}

if($arr[chat][class_name]=='callcenter'){

$web_data="web_admin";

}






if($arr[chat][class_name]=='driver'){

$web_data="web_driver";
}

if($arr[chat][class_name]=='agent'){

$web_data="web_admin";

}

if($arr[chat][class_name]=='supplier'){

$web_data="web_admin";


}






	//if ($count==0) { echo "<TR>"; }
	
 

?>
 <div style="background-color:<?=$bgcolor?> ; margin-top:10px; border-bottom:solid 1px; color:#E6E6E6; padding-bottom:10px;"  id="message_main_<?=$arr[chat][id]?>" >
 
 
 
 
 <table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td width="70"><table width="70" border="0" cellpadding="0"   cellspacing="0" style="border:solid 0px; border-color:#DADADA">
      <tr>
        <td width="70"><img src="../data/images/logo/<?=$arr[chat][owner_id];?>.jpg?v=<?=time()?>" width="60" height="60" border="0" class="mainpic_index"  style="border:solid 1px; border-color:#DADADA;border-radius:5px;" />            </td>
      </tr>
    </table></td>
    <td valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td >   <div id="message_user_<?=$arr[chat][id]?>" style="font-size:14px; color:#000000; font-weight:bold; text-transform:uppercase ">
                              <?= $arr[chat][name] ?></div>                        </td>
                      </tr>
                      <tr>
                        <td style="display:none" ><div style="display:nones; font-size:14px; padding-top:5px; " id="message_last_<?=$arr[chat][id]?>">
						<?=$arr[chat][class_name]?>
					</div>					 </td>
                      </tr>
                      <tr>
                        <td ><div style="display:nones; font-size:14px; padding-top:5px; " id="message_last_<?=$arr[chat][id]?>">
						<?=$arr[chat][country]?>
					</div>	</td>
                      </tr>
                    </table>
    </td>
    <td width="20" style="display:nones"> <div style="padding-left:5px; font-size:14px" id="message_time_<?=$arr[chat][id]?>">		 	
					
					 	
					
					<?=$arr[chat][user]?>		
					</div>					 </td>
  </tr>
</table>

 
 
 
 
 </div>			
				 
 <p>
   <?
}
 
$db->closedb ();
//������ʴ��������
?>
   <br />
   <br />
 </p>
 <p>&nbsp;</p>
 <p><br />
   <br />
   
   
   
   <input type="hidden" name="chat_list_new" id="chat_list_new" value="0"  style="width:100px " />
 </p>
 