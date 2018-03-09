 <style>
   .div-all-palce{
	 padding:5px;   border-radius: 0px; border: 1px solid #ddd;background-color:#F6F6F6;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ;
	 
 }
 
 
 </style>
<?
/// echo $_GET[price_plan];

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
      <tr>
        <td> 
<TABLE cellSpacing=0 cellPadding=0 width=100% border=0>
      <TBODY>
        <TR>
          <TD width="100%" vAlign=top><TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0 >
<?
 
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[news] = $db->select_query("SELECT * FROM product_option_percent where product_id=".$_GET[pro]."  and  plan_id=".$_GET[price_plan]."   ");
$count=0;
while($arr[news] = $db->fetch($res[news])){
	if ($count==0) { echo "<TR>"; }
 
 
?>
			    <td align="center"    valign="top"> 
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			      <tr>
			        <td style="padding-top:0px" class="font-24"> 
                    
    <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
 
      <td height="30" valign="top" class="font-20"> <?= $arr[news][name_th]; ?> </td>
      <td width="100" align="right" valign="top" class="font-22"><b><?= $arr[news][taxi_commission]; ?></b> % </td>
    </tr>
  </tbody>
</table>

     
  
					
					  
			         </td>
                  </tr>
			      </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     
    </tr>
  </table>
  
          </TD><?
$count++;
if (($count%1) == 0) { echo ""; $count=0; }
}
$db->closedb ();
//������ʴ��������
?>
			</TABLE>
			<!-- End News -->          </TD>
        </TR>
      </TBODY>
    </TABLE></td>
      </tr>
    </table>
