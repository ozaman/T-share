 
				 

<style type="text/css">
.mainpic_phone {

   padding:2px; color:#000000;    
 
    border:5px solid <?=$main_color?>; background-color:#FFFFFF; 
   box-shadow: 2px 1px 10px #333333; margin-right:5px; margin-bottom:5PX;max-width:400px;
      border-radius:0px; max-width:350px; width:100%;
}
 
-->
</style>  
				    <div   data-toggle="dropdown"  style="cursor: pointer "><img src="../admin/pic/qrcode/logo/phone.png"  align="absmiddle" style="width:20"/><b>&nbsp;คอลเซ็นเตอร์</b></div>
                  
                  <ul class="dropdown-menu mainpic_phone" role="menu"  >

<?
//// callcenter
  
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

	$res[company] = $db->select_query("SELECT company FROM web_admin_company WHERE id='".$arr[product][admin_company]."'");
	$arr[company] = $db->fetch($res[company]);

	$res[contact_network] = $db->select_query("SELECT * FROM  contact_network WHERE company='".$arr[product][admin_company]."' ");
	$arr[contact_network] = $db->fetch($res[contact_network]); ?>
 
	
	<?


	$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
	while($arr[contact_phone] = $db->fetch($res[contact_phone])){ 
	

	
 
	?>

	 
	 
	 
                    <li      style="border-bottom: solid 1px #999999; " ><div  style="margin-bottom:-35px; padding:10px; padding-right:20px; "><i class="fa  fa-phone" style="color:#c1c1c1; font-size:18px"></i></div><a href="tel:<?=$arr[contact_phone][phone]?>" target="_blank">&nbsp;&nbsp;<?=$arr[contact_phone][phone]?></a></li>
					
  
	
	
	
	<?
	


}

?>   

   
</ul> 
 