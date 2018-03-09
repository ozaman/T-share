<?
CheckAdmin($_SESSION['admin_user'], $_SESSION['admin_pwd']);
$limit = 10  ;
$adminsection;

?>

<SCRIPT LANGUAGE="JavaScript">
<!--
function showHide(elementid){
if (document.getElementById(elementid).style.display == 'none'){
document.getElementById(elementid).style.display = '';
} else {
document.getElementById(elementid).style.display = 'none';
}
}
//-->
</SCRIPT>


<script type="text/javascript">

}
function  number() {
		if(document.getElementById('result').value < 0) {
		alert("?? SMS ?? ?????") ;
document.getElementById('paysms').value="";
return false ;

}
		}
		var iCountDown=setInterval("sum()",1000); 
				var iCountDown=setInterval("number()",1000); 
</script>
<script type="text/javascript" src="datepic.js"></script>
<style type="text/css">
<!--
.style1book {	font-size: 14px;
	color: #CC3300;
}
.style3 {color: #000000}
.style4 {color: #333333}
-->
</style>
					  <?
				  
////////////////////////////////////////////  RSVN NO.   
if($_GET[rsvnno]){
//$refno=$_POST[rsvnno];
$data_bookagent=$data_bookagentrsvn;
$limit = 10 ;
$page_search = 'rsvnno='.$_GET[rsvnno];
}
	
?>

					  <?
////////////////////////////////////////////  Booking Date   
if($_GET[bookingdate]){
//$refno=$_POST[rsvnno];
$data_bookagent=$data_bookagentbookingdate;
$limit = 10 ;
$page_search = 'bookingdate='.$_GET[bookingdate].'&bookingdates='.$_GET[bookingdates];
}
	
?>

					  <?
////////////////////////////////////////////  Update Date   
if($_GET[updatedate]){
//$refno=$_POST[rsvnno];
$data_bookagent=$data_bookagentupdate;
$limit = 10 ;
$page_search = 'updatedate='.$_GET[updatedate].'&updatedates='.$_GET[updatedates];
}
	
?>
					  <?
//////////////////////////////////////////// ondate  
if($_POST[status]){
//echo $ondateno=$_POST[ondateno];
$data_bookagent=$data_bookagentstatus;
$limit = 10 ;
}
	
?>
					  <?
//////////////////////////////////////////// ondate  
if($_GET[company]){
//echo $ondateno=$_POST[ondateno];
$data_bookagent=$data_bookagentagent;
$page_search = 'company='.$_GET[company];

$limit = 10 ;
}
	
?>
  <?
////////////////////////////////////////////  ref   
if($_GET[refno]){
$refno=$_POST[refno];
$data_bookagent=$data_bookagentfind;
$limit = 10 ;
$page_search = 'refno='.$_GET[refno];
}
	
?>
					  <?
//////////////////////////////////////////// ondate  
if($_GET[arivaldate] != ''){
//echo $ondateno=$_POST[ondateno];

$data_bookagent=$data_bookagentdateaa;
$limit = 10 ;
$page_search = 'arivaldate='.$_GET[arivaldate];
//echo $data_bookagent;
//echo $_GET[arivaldate];
}
	
?>
					  <?
//////////////////////////////////////////// ondate  
if($_GET[arivaldate2] && $_GET[company2] ){
//echo $ondateno=$_POST[ondateno];
$data_bookagent=$data_bookagentdate;
$limit = 10 ;
$page_search = 'arivaldate2='.$_GET[arivaldate2].'&company2='.$_GET[company2];
}
	
?>

		
		  <?
//////////////////////////////////////////// ondate  
if($_GET[guestno]){
//echo $ondateno=$_POST[ondateno];
$data_bookagent=$data_bookagentguest;
$limit = 10 ;
$page_search = 'guestno='.$_GET[guestno];

}
	
?>

 <?
//////////////////////////////////////////// $data_bookagentguesttel  
if($_GET[phone]){
//echo $ondateno=$_POST[ondateno];
$data_bookagent=$data_bookagentguesttel;
$limit = 10 ;
$page_search = 'phone='.$_GET[phone];

}
	
	//echo $data_bookagent;
?>




	                          <script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<TABLE cellSpacing=0 cellPadding=0 width=100% border=0>
      <TBODY>
        <TR>
          <TD width="100%" vAlign=top><!-- Admin -->
            <TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
				<TR>
					<TD valign="top">

					<table width="100%" border="0" cellpadding="0" bgcolor="#FFFFFF">
                          <tr>
                            <td  class="topic_h"><img src="imagesmenu/KoolTabs.png" width="16" height="16" align="absmiddle" />&nbsp;
                            <?=menutopic_reseragent;?> &nbsp;<IMG SRC="images/icon/arrow_wap.gif" BORDER="0" ALIGN="absmiddle"><font color="#FFFF99" size="4"> 
							<? 							
							if(!$_GET[op]){							
							echo $head_agent;}						
							?>
							
							<? 							
							if($_GET[op]=="bookagent_add"){							
							echo book_reser_add;}						
							?>
							<? 							
							if($_GET[op]=="bookagent_edit" and $_GET[view] ){							
							echo book_reser_detail;}						
							?>				
							
							</td>
                          </tr>
                      </table>
				      <BR>
				      <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="topic_menu">
                        <tr>
                          <td height="20"><a href="?name=admin&file=booking&amp;status=new"><img src="iconstatus/cir/warning.png" border="0"  align="absbottom" /> <?=book_process;?> </a>(<? echo $showbooknew;?>) &nbsp;&nbsp;<a href="?name=admin&file=booking&amp;status=confirm"><img src="iconstatus/cir/yes.png"  border="0" align="absbottom" /> <?=book_s_con;?> </a>(<? echo $showbookconfirm;?>)  &nbsp;<a href="?name=admin&file=booking&amp;status=cancel"><img src="iconstatus/cir/minus.png" width="16" height="16"  border="0" align="absbottom" /> <?=book_s_can;?>  </a>(<? echo $showbookcancel;?>)&nbsp; <a href="?name=admin&file=booking&amp;status=delete"><img src="iconstatus/cir/delete.png" width="16" height="16"  border="0" align="absbottom" /> <?=book_s_de;?> </a>(<? echo $showbookdel;?>) <a href="?name=admin&file=booking&amp;status=all"><img src="iconstatus/cir/arrows_4_way.png" width="16" height="16"  border="0" align="absmiddle" /> <?=book_s_all;?> </a>(<? echo $showbookall;?>) &nbsp;<a href="?name=admin&file=booking&amp;op=bookagent_add"></a></td>
                        </tr>
                      </table>
				      <br />
				      <a href="?name=admin&amp;file=booking&amp;op=bookagent_add">&nbsp;&nbsp;<img src="iconstatus/cir/add.png" width="16" height="16"  border="0" align="absmiddle" /> <font size="3" color="#FF6600"><?=book_reser_add;?></font></a><br />
				      <BR>
<?

//////////////////////////////////////////// ?? Project   
if($_GET[op] == ""){
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

	$datapage_bookallagent;
$res[pagea] = $db->select_query("SELECT id,invoice,guest,agent_ref,airin,airout,status,post_date,update_date ,phone,agent,status_all,novc FROM ".TB_book_agent." $data_bookagent ");
	$SUMPAGE = $db->rows($res[pagea]);
	$page=$_GET[page];
	if (empty($page)){
		$page=1;
	}
	$rt = $SUMPAGE%$limit ;
	$totalpage = ($rt!=0) ? floor($SUMPAGE/$limit)+1 : floor($SUMPAGE/$limit); 
	$goto = ($page-1)*$limit ;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="1" class="topic_find" style="display:none <? if($adminlevel ==2 or $adminlevel ==1 ){

		echo "1" ;
		
		
		
		} ?><? if($adminlevel > 4 ){

		echo "1" ;
		
		
		
		} ?>">
  <tr>
    <td>
    <form action="?name=admin&amp;file=booking&amp;status=all" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table width="100%" border="0" cellspacing="0" cellpadding="2" style="display:none <? if($adminlevel ==2 or $adminlevel ==1 ){

		echo "1" ;
		
		
		
		} ?><? if($adminlevel > 4 ){

		echo "1" ;
		
		
		
		} ?>">
      <tr>
        <td width="20%">
          <table width="100%">
            <tr>
              <td width="80" ><?=ordersub_rsvn;?>
                : </td>
              <td><input name="rsvnno" id="rsvnno"   type="text" style="width:100px;" />
                      <input name="rsvn" type="submit"  id="rsvn" class="mygo"  value="<?=button_find;?>" />              </td>
            </tr>
          </table>

              <label></label></td>
        <td width="20%">
          <table width="100%">
            <tr>
              <td width="90" ><?=ordersub_ref;?>
                : </td>
              <td><input name="refno" id="refno"   type="text" style="width:100px;" />
                      <input name="ref" type="submit"  id="ref" class="mygo"  value="<?=button_find;?>" />              </td>
            </tr>
          </table>
        </td>
        <td width="20%">
          <table width="100%">
            <tr>
              <td width="80" ><?=book_guest;?>
                : </td>
              <td><input name="guestno" id="guestno"   type="text" style="width:120px;" />
                      <input name="guest" type="submit"  id="guest" class="mygo"  value="<?=button_find;?>" />              </td>
            </tr>
          </table>
        </td>
        <td colspan="2">
          <table width="100%">
            <tr>
              <td width="80" ><?=ordersub_company;?>
                : </td>
              <td>
			  
			 			<? if($adminlevel ==2){
		$ag="and id=$adminid" ;} ?>
					
		<? if($adminlevel ==1){
		$ag="and id=$agentcompany" ;} ?>
		
<? if($adminlevel >4){
		$ag="" ;} ?>	 
			  
			  <select name="company" id="company"    style="width: 150px; background-color:<?
/////////////
if($arr[user][level] <5 ){
echo "#FFFFFF" ;
}?>" <?
/////////////
if($arr[user][level] <5 ){
echo "disabled" ;
}?>>
                <option value="">--<?=book_allagent;?>--</option>
                <?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[category] = $db->select_query("SELECT * FROM ".TB_admin." where level=2 $ag ORDER BY id ");
while ($arr[category] = $db->fetch($res[category])){
	   echo "<option value=\"".$arr[category][id]."\"";
	 if($arr[category][id] == $_GET[company] or $arr[category][id] == $admincompany ){echo " Selected";}
	   echo ">".$arr[category][company]."</option>";
}

?>
              </select>
                      <input name="companys" type="submit"  class="mygo" id="companys" style="background-color:<?
/////////////
if($arr[user][level] <5 ){
echo "#666666" ;
}?>"  value="<?=button_find;?>" <?
/////////////
if($arr[user][level] <5 ){
echo "disabled" ;
}?>/>              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td width="20%">
          <table width="100%">
            <tr>
              <td width="80" ><?=ordersub_bookdate;?>
                : </td>
              <td><input name="bookingdate" id="bookingdate" style="width:70px; FONT-SIZE:13px; "  readonly="readonly" />
                      <img src="images/admin/dateselect.gif" border="0"  onclick="displayDatePicker('bookingdate', false, 'ymd', '-');" align="absmiddle" />
                      <input name="booking" type="submit"  id="booking" class="mygo"  value="<?=button_find;?>" />              </td>
            </tr>
          </table>
        
	</td>
        <td width="20%">
          <table width="100%">
            <tr>
              <td width="90" ><?=ordersub_update;?>
                : </td>
              <td><input name="updatedate" id="updatedate" style="width:70px; FONT-SIZE:13px; "  readonly="readonly" />
                      <img src="images/admin/dateselect.gif" border="0"  onclick="displayDatePicker('updatedate', false, 'ymd', '-');" align="absmiddle" />
                      <input name="updatea" type="submit"  id="updatea" class="mygo"  value="<?=button_find;?>" />              </td>
            </tr>
          </table>
        </td>
        <td width="20%">
          <table width="100%">
            <tr>
              <td width="80" ><?=book_phone;?>
                : </td>
              <td><input name="phone" id="phone"   type="text" style="width:120px;" />
                      <input name="phonea" type="submit"  id="phonea" class="mygo"  value="<?=button_find;?>" />              </td>
            </tr>
          </table>
        </td>
        <td width="20%"><table width="100%">
          <tr>
            <td width="80" ><?=book_airin;?>
              : </td>
            <td><input name="arivaldate" id="arivaldate" style="width:80px; FONT-SIZE:13px; "  readonly="readonly" />
                    <img src="images/admin/dateselect.gif" border="0"  onclick="displayDatePicker('arivaldate', false, 'ymd', '-');" align="absmiddle" />
                    <input name="ondate" type="submit"  id="ondate" class="mygo"  value="<?=button_find;?>" />            </td>
          </tr>
        </table>
		</td>
      </tr>
    </table>

</form>
</td>
  </tr>
</table>

<br />
<form action="?name=admin&file=booking&op=bookagent_del&action=multidel" name="myform" method="post">
 <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#F3F3F3" >
  <tr bgcolor="#990000" height=25>
    <td width="80" height="28" align="center" bgcolor="#999999"><center>
      <font color="#FFFFFF">
      <?=ordersub_rsvn;?>
      </font>
    </center></td>
    <td width="100" align="center" bgcolor="#999999"><font color="#FFFFFF">
      <?=ordersub_ref;?>
    </font></td>
    <td align="center" bgcolor="#999999"><font color="#FFFFFF">
      <?=ordersub_company;?>
      <br />
    </font></td>
    
    <td width="100" align="center" bgcolor="#999999"><font color="#FFFFFF">
      <?=book_phone;?>
    </font></td>
    <td width="80" align="center" bgcolor="#999999"><font color="#FFFFFF">
      <?=book_airin;?>
      <br />
    </font></td>
    
    <td width="80" align="center" bgcolor="#999999"><font color="#FFFFFF">
      <?=ordersub_status;?>
    </font></td>
    <td width="100" align="center" bgcolor="#999999"><font color="#FFFFFF">
      <?=ordersub_bookdate;?>
    </font></td>
    <td width="100" align="center" bgcolor="#999999"><font color="#FFFFFF">
      <?=ordersub_update;?>
    </font></td>
    
    <td width="150" align="center" bgcolor="#999999"><center>
      <font color="#FFFFFF">
      <?=ordersub_viewvc;?>
      </font>
    </center></td>
    <td width="50" align="center" bgcolor="#999999"><center>
        <font color="#FFFFFF">
        <?=booktour_edit;?>
        </font>
        </center></td>
    <td width="80" align="center" bgcolor="#999999"><font color="#FFFFFF">
      <?=ordersub_manage;?>
    </font></td>
   </tr>  
<?
//echo $data_bookagent;	

$res[project] = $db->select_query("SELECT id,invoice,guest,agent_ref,airin,airout,status,post_date,update_date ,phone,agent,status_all,novc FROM ".TB_book_agent." $data_bookagent  ORDER BY update_date DESC LIMIT $goto, $limit ");
//echo $goto.'--'. $limit;
//echo $page;
//echo $_GET[rsvnno];
while($arr[project] = $db->fetch($res[project])){

//echo $arr[project][agent];

	$res[agent] = $db->select_query("SELECT * FROM ".TB_admin." WHERE id='".$arr[project][agent]."' ");
	$arr[agent] = $db->fetch($res[agent]);

//echo $arr[agent][id];

			///////////////
//$row[summedia] = $db->num_rows(TB_galleryday,"id"," category=".$arr[project][id]." ");

	//Comment Icon
	if($arr[project][enable_comment]){
		$CommentIcon = " <IMG SRC=\"images/icon/suggest.gif\" WIDTH=\"13\" HEIGHT=\"9\" BORDER=\"0\" ALIGN=\"absmiddle\">";
	}else{
		$CommentIcon = "";
	}
			$bgcolor = ($i++ & 1) ? $bg1 : $bg2; 
?>
<tr bgcolor='<?=$bgcolor;?>'>
<?
			

?>
<? 

$nowday=$arr[project][post_date]+84600 - time() ;
/////////////
$allday=$arr[project][post_date]+84600 ;

if($arr[project][status] =="NEW" and $arr[project][status_all]==0 and $nowday <0 ){
$del="style=display:none1";

$sta = $arr[project][id];

	$db->update_db(TB_book_agent,array(
	"status"=>'DELETE',
		"novc"=>'1'
		)," id=$sta");
echo "<meta http-equiv=refresh content=3;URL=?name=admin&file=booking>";

}
else{
		$del="";
	}

?>

<td rowspan="3" align="center"  <?=$del;?>><a href="?name=admin&amp;file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=<? echo $arr[project][id];?>"><font size="3"><b><? echo $arr[project][invoice];?></a></td> 
       <td align="center" <?=$del;?>><? echo $arr[project][agent_ref];?></td>
       <td align="center" valign="middle" <?=$del;?>><? echo $arr[agent][company];?></td>
       <td align="center" valign="middle" <?=$del;?>><? echo $arr[project][phone];?></td>
       <td align="center" <?=$del;?>><font color="#006699"><? echo $arr[project][airin];?><br />
         <? echo $arr[project][status_allcancel];?></td>
     <td align="center" <?=$del;?>><font color="<?  

if($arr[project][status] =="NEW" and $arr[project][status_all]>0 ){
echo "#0099CC" ;
}
if($arr[project][status] =="NEW" and $arr[project][status_all]==0 ){
echo "#663300" ;
}

/////////////
if($arr[project][status] =="CONFIRM" ){
echo "#339900" ;
}
/////////////
if($arr[project][status] =="CANCEL" ){
echo "#FF0000" ;
}
if($arr[project][status] =="DELETE" ){
echo "#FF0000" ;
}
?>">

<? 
/////////////
if($arr[project][status] =="NEW" and $arr[project][status_all]==0 ){
echo "<blink>" ;
}
?>




<? 
$nowday=$arr[project][post_date]+84600 - time() ;
/////////////
$allday=$arr[project][post_date]+84600 ;


if($arr[project][status] =="NEW" and $arr[project][status_all]>0 ){
echo  status_new ;
}
if($arr[project][status] =="NEW" and $arr[project][status_all]==0 and $nowday >0 ){
echo  status_nodata ;

echo "<br><iframe frameborder='0' allowtransparency='true' scrolling='No' width='80' height='20' src='time.php?name=admin/time&amp;file=agent2&amp;day=$allday'> </iframe>";
}
if($arr[project][status] =="DELETE"){
echo  status_del ;

}


/////////////没有预定项目
if($arr[project][status] =="CONFIRM" ){
echo status_confirm ;
} 

/////////////
if($arr[project][status_canceled]>"0" and $allnew==0  and $allconfirm==0 ){
echo status_canceled ;
}

if($arr[project][status_reject]>"0" and $allnew==0  and $allconfirm==0 ){
echo status_reject ;
}



if($arr[project][status] =="CANCEL" and $arr[project][status_reject]<"1" and $arr[project][status_canceled]<"1" ){
echo status_cancel ;
}


?>
<? 
/////////////
if($arr[project][status] =="NEW" and $arr[project][status_all]==0 ){
echo "</blink>" ;
}
?></td>
     <td align="center" <?=$del;?>><? echo ThaiTimeConvert($arr[project][post_date],'1','1');?>	 </td>
     <td align="center" <?=$del;?>><? echo ThaiTimeConvert($arr[project][update_date],'1','1');?></td>
     <td rowspan="3" align="center" <?=$del;?>><table width="100%" border="0" cellspacing="5" cellpadding="0">
       <tr>
         <td align="right"><?
$res[status_project_new] = $db->select_query("SELECT status FROM ".TB_order." where orderid=".$arr[project][id]." and status ='NEW' ");
$res[status_project_con] = $db->select_query("SELECT status FROM ".TB_order." where orderid=".$arr[project][id]." and status ='CONFIRM' ");
$res[status_project_caned] = $db->select_query("SELECT status FROM ".TB_order." where orderid=".$arr[project][id]." and status ='CANCEL' and sub_confirm ='1'  ");
$res[status_project_reject] = $db->select_query("SELECT status FROM ".TB_order." where orderid=".$arr[project][id]." and status ='CANCEL' and sub_reject ='1'  ");
$res[status_project_rejected] = $db->select_query("SELECT status FROM ".TB_order." where orderid=".$arr[project][id]." and status ='CANCEL' and sub_reject ='2'  ");
$res[status_project_can] = $db->select_query("SELECT status FROM ".TB_order." where orderid=".$arr[project][id]." and status ='CANCEL' and sub_confirm <>'1' and sub_reject <>'1' and sub_reject <>'2'  ");
	 
 $count[status_project_new] = $db->rows($res[status_project_new]);
 $count[status_project_con] = $db->rows($res[status_project_con]);
 $count[status_project_caned] = $db->rows($res[status_project_caned]);
 $count[status_project_reject] = $db->rows($res[status_project_reject]);
 $count[status_project_rejected] = $db->rows($res[status_project_rejected]);
 $count[status_project_can] = $db->rows($res[status_project_can]);



?>
             <? 
if($count[status_project_new] > 0){ ?><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="49%"><strong><font color="#0099CC">
             <?=status_new;?> 
             </strong></td>
    <td width="27%"><span class="style4">(
               <?=$count[status_project_new];?>
               )</span></td>
    <td width="24%"><a href="javascript:showHide('ShowHideTable<? echo $arr[project][id];?>new');"> <img src="imagesmenu/replace2.png" alt="Edit" border="0" /></a></td>
  </tr>
</table>

             <a href="javascript:showHide('ShowHideTable<? echo $arr[project][id];?>new');"> <strong><font color="#0099CC">
             <?=status_new;?> 
             </strong></a>&nbsp;<br />
             <?
}
if($count[status_project_con] > 0){
?>
            
             <a href="javascript:showHide('ShowHideTable<? echo $arr[project][id];?>con');"> <strong><font color="#339900">
             <?=status_confirm;?> 
             </strong><span class="style4">(
               <?=$count[status_project_con];?>
               )</span></a>&nbsp;<br />
             <?
}
if($count[status_project_can] > 0){
?>
           
             <a href="javascript:showHide('ShowHideTable<? echo $arr[project][id];?>can');"> <strong><font color="##FF0000">
             <?=status_cancel;?>  
             </strong><span class="style4">(
               <?=$count[status_project_can];?>
               )</span></a>&nbsp;<br />
             <?
}
if($count[status_project_caned] > 0){
?>
             <a href="javascript:showHide('ShowHideTable<? echo $arr[project][id];?>caned');"> <strong><font color="#FF9900">
             <?=status_canceled;?>
             </strong><span class="style4">(
               <?=$count[status_project_caned];?>
               )</span></a>&nbsp;<br />
             <?
}
if($count[status_project_reject] > 0){
?>
             <a href="javascript:showHide('ShowHideTable<? echo $arr[project][id];?>reject');"><strong><font color="##FF0000">
             <?=status_reject;?>
             </strong> <span class="style4">(
               <?=$count[status_project_reject];?>
               )</span></a>&nbsp;<br />
             <?
}
if($count[status_project_rejected] > 0){
?>
             <a href="javascript:showHide('ShowHideTable<? echo $arr[project][id];?>rejected');"><strong><font color="#FF9900">
             <?=status_rejected;?>
             </strong><span class="style4">(
               <?=$count[status_project_rejected];?>
               )</span></a>&nbsp;<br />
             <?
}
?>         </td>
       </tr>
     </table></td>
     <td rowspan="3" align="center" <?=$del;?>><a href="?name=admin&amp;file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=<? echo $arr[project][id];?>">&nbsp;</a><a href="?name=admin&amp;file=booking&amp;op=bookagent_edit&amp;view=edit&amp;id=<? echo $arr[project][id];?>"><img src="images/admin/edit.png" border="0" alt="Edit" /></a> <a href="javascript:Confirm('?name=admin&amp;file=booking&amp;op=bookagent_del&amp;id=<? echo $arr[project][id];?>&amp;prefix=<? echo $arr[project][post_date];?>','You are sure to be deleted!');"></a> </td>
     <td rowspan="3" align="center" <?=$del;?>><a href="?name=admin&file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=<? echo $arr[project][id];?>"><img src="iconstatus/view.png" alt="View" border="0" align="baseline" /></a></td>
</tr>
<tr bgcolor='<?=$bgcolor;?>'>
  <td height="30" colspan="7" style="border-top: solid 1px #F1EFEF;" <?=$del;?>><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="150"><span class="style3">
         &nbsp;<b> <?=book_guestname;?>
&nbsp;: </span></td>
        <td><? echo $arr[project][guest];?></td>
      </tr>
    </table></td>
  </tr>
<tr bgcolor='<?=$bgcolor;?>'>
  
  </tr>
	<TR>
		<TD colspan="17" height="1" class="dotline" >
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='ShowHideTable<? echo $arr[project][id];?>'  style='display:none'>
  <tr>
    <td><? 	include"admin/admin/booking/sub.php";?>	</td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='ShowHideTable<? echo $arr[project][id];?>new'  style='display:none'>
  <tr>
    <td>	<? 	if($count[status_project_new] > 0){		include"admin/admin/booking/sub_new.php";	}	?>	</td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='ShowHideTable<? echo $arr[project][id];?>con'  style='display:none'>
  <tr>
    <td>	<? 	if($count[status_project_con] > 0){	include"admin/admin/booking/sub_con.php";	}	?>	</td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='ShowHideTable<? echo $arr[project][id];?>can'  style='display:none'>
  <tr>
    <td>	<? 	if($count[status_project_can] > 0){	include"admin/admin/booking/sub_can.php";	}	?>	</td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='ShowHideTable<? echo $arr[project][id];?>caned'  style='display:none'>
  <tr>
    <td>	<? 	if($count[status_project_caned] > 0){	include"admin/admin/booking/sub_caned.php";	}	?>	</td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='ShowHideTable<? echo $arr[project][id];?>reject'  style='display:none'>
  <tr>
    <td><? if($count[status_project_reject] > 0){	include"admin/admin/booking/sub_reject.php";}?>	</td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='ShowHideTable<? echo $arr[project][id];?>rejected'  style='display:none'>
  <tr>
    <td><? if($count[status_project_rejected] > 0){	include"admin/admin/booking/sub_rejected.php"; }?>	</td>
  </tr>
</table></TD>
	</TR>
<?

 } 
?>
 </table>
 </form>
 
 <select name="carno" id="carno" onchange="MM_jumpMenu('parent',this,0)">
  <?PHP for($i=1; $i<=$totalpage; $i++) {?>
  <option value="?name=admin&file=booking&status=<?=$_GET[status]?>&company=<?=$_GET[company]?>&<?=$page_search;?>&page=<?PHP echo $i?>" <? if($_GET[page]== $i){echo "selected=selected";}?> ><?PHP echo $i+0?></option>
  <?PHP } ?>
</select>
<span class="page">

<?=button_page;?>:
 
</span>
<?
	SplitPage($page,$totalpage,"?name=admin&file=booking&status=$_GET[status]&company=".$_GET[company]."&$page_search");	echo $ShowSumPages ;
	echo $ShowPages ;
}

else if($_GET[op] == "bookagent_add" AND $_GET[action] == "add"){
	//////////////////////////////////////////// ? Database
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){

			if (!$_POST[agent] or !$_POST[agent_ref] or !$_POST[guest]){
			echo "<script language='javascript'>" ;
			echo "alert('Please fill in the required information')" ;
			echo "</script>" ;
			echo "<script language='javascript'>javascript:history.back()</script>";
			exit();
		}	

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
////////////// last id
$tablename      = "web_book_agent";
$next_increment     = 0;
$qShowStatus        = "SHOW TABLE STATUS LIKE '$tablename'";
$qShowStatusResult  = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );
$row = mysql_fetch_assoc($qShowStatusResult);
$member_db = $row['Auto_increment'];
///////////////////////// 

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[admin] = $db->select_query("SELECT * FROM ".TB_admin." where id =".$_POST[agent]." ORDER BY id");
$arr[admin] = $db->fetch($res[admin]);

$star=$arr[admin][levelstar];

///////////////////////// 
if($member_db>=10000) {
$member_in = "0$member_db" ;
}
elseif($member_db >=1000) {
$member_in = "00$member_db" ;
}
elseif($member_db >=100) {
$member_in = "000$member_db" ;
}
elseif($member_db >=10) {
$member_in = "0000$member_db" ;
}
else {
$member_in = "00000$member_db" ;
}

echo $_POST[time_tour];
////////////////
		$db->add_db(TB_book_agent,array(
		"invoice"=>"$member_in",
			"adult"=>"$_POST[adult]",
			"child"=>"$_POST[child]",
			"baby"=>"$_POST[baby]",
			"airin"=>"$_POST[airin]",
			"airin_time "=>"$_POST[airin_time]",
			"airout_time"=>"$_POST[airout_time]",
			"airin_f "=>"$_POST[airin_f]",
			"airout "=>"$_POST[airout]",
			"airout_f"=>"$_POST[airout_f]",
			"airin_h"=>"$_POST[airin_h]",
			"airin_m"=>"$_POST[airin_m]",
			"airout_h"=>"$_POST[airout_h]",
			"airout_m"=>"$_POST[airout_m]",
			"agent_ref"=>"$_POST[agent_ref]",

			"agent_refauto"=>"$_POST[agent_refauto]", /// new data
			
			"agent"=>"$_POST[agent]",
			"guest"=>"$_POST[guest]",
			
			
			"remark"=>"$_POST[remark]",
			"type"=>"AGENT",
			
			
			///////
			"hoteldetail"=>"$_POST[hoteldetail]",
			"hoteldetail2"=>"$_POST[hoteldetail2]",
			"hoteldetail3"=>"$_POST[hoteldetail3]",
			
			"guestemail"=>"$_POST[guestemail]",
			"guestemail2"=>"$_POST[guestemail2]",
			"guestemail3"=>"$_POST[guestemail3]",
			
			"phone"=>"$_POST[phone]",
			"phone2"=>"$_POST[phone2]",
			"phone3"=>"$_POST[phone3]",
			
			"s_qq"=>"$_POST[s_qq]",
			"s_line"=>"$_POST[s_line]",
			"s_skype"=>"$_POST[s_skype]",
			"s_wechat"=>"$_POST[s_wechat]",
			
			"h1in"=>"$_POST[h1in]",
			"h2in"=>"$_POST[h2in]",
			"h3in"=>"$_POST[h3in]",
			
			"h1out"=>"$_POST[h1out]",
			"h2out"=>"$_POST[h2out]",
			"h3out"=>"$_POST[h3out]",
			"status_all"=>"0",
			
			
			
			
			///////
			
			"bookid"=>"$_POST[bookid]",
			"booklevel"=>"$_POST[booklevel]",
			"star"=>"$star",
			"bookowner"=>"$_POST[bookowner]",
			"post_date"=>"".TIMESTAMP."",
			"update_date"=>"".TIMESTAMP."",
			"total"=>"$_POST[total]"
		));
		$db->closedb ();
		
		///// auto ref
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		 $db->update_db(TB_admin,array(
 		"finish_ref"=>"$_POST[agent_ref_auto]"
		)," id=".$_POST[agent]." ");

		
		//event
		
		$db->connectdb(DB_NAME_HIS,DB_USERNAME_HIS,DB_PASSWORD_HIS);
		$db->add_db(TB_box,array(
			"sender"=>"".date('Y-m-d')."",
			"topic"=>"Add new Agent reservation No. $member_in",
			"type"=>"Add new Agent reservation",
			"posted"=>"".$_SESSION['admin_user']."",
			"post_date"=>"".TIMESTAMP."",
			"enable_comment"=>"0"
		));
		$db->closedb ();
		///////////////

	

		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Add Agent reservation complete</B></FONT><BR><BR>";
		//$ProcessOutput .= "<A HREF=\"?name=admin&file==book_agent&op=bookagent_edit&view=view&id=$member_db\"><B>Back to Agent reservation </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
		echo "<meta http-equiv=refresh content=1;URL=?name=admin&file=booking&op=bookagent_edit&view=view&id=$member_db>";
	}else{
		//??
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "bookagent_add"){
	//////////////////////////////////////////// ? Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
?>
<FORM NAME="myform" METHOD=POST ACTION="?name=admin&file=booking&op=bookagent_add&action=add" enctype="multipart/form-data" onsubmit="return check2()">

  <table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
      <td>
	  
	  <? 
	  // echo $adminsection;
	  if($adminlevel < 3 ){	    
	  include"admin/admin/booking/add/agent.php"; 
	  }

	  	  	  if($adminlevel > 4 and $adminsection <>"CTRIP" ){	    
	  include"admin/admin/booking/add/office.php"; 
	  }
	  	  	  	  if($adminlevel > 4 and $adminsection =="CTRIP" ){	    
	  include"admin/admin/booking/add/ctrip.php"; 
	  }
	  	  
	  ?></td>
    </tr>
  </table>
</FORM>

<?
	}else{
		//??
		echo  $PermissionFalse ;
	}
}
else if($_GET[op] == "bookagent_edit" AND $_GET[action] == "edit"){
	//////////////////////////////////////////// ? Database Edit
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		//?
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[project] = $db->select_query("SELECT * FROM ".TB_book_agent." WHERE id='".$_GET[id]."' ");
		$arr[project] = $db->fetch($res[project]);
		$db->closedb ();
		require("includes/class.resizepic.php");
		$FILE = $_FILES['FILE'];
		if (!$_POST[agent] or !$_POST[agent_ref]){
			echo "<script language='javascript'>" ;
			echo "alert('Please fill in the required information')" ;
			echo "</script>" ;
			echo "<script language='javascript'>javascript:history.back()</script>";
			exit();
		}
				//????
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->update_db(TB_book_agent,array(
		"adult"=>"$_POST[adult]",
			"child"=>"$_POST[child]",
			"baby"=>"$_POST[baby]",
			"airin"=>"$_POST[airin]",
			"airin_time "=>"$_POST[airin_time]",
			"airout_time"=>"$_POST[airout_time]",
			"airin_f "=>"$_POST[airin_f]",
			"airout "=>"$_POST[airout]",
			"airout_f"=>"$_POST[airout_f]",
			"airin_h"=>"$_POST[airin_h]",
			"airin_m"=>"$_POST[airin_m]",
			"airout_h"=>"$_POST[airout_h]",
			"airout_m"=>"$_POST[airout_m]",
			"agent_ref"=>"$_POST[agent_ref]",
			"agent"=>"$_POST[agent]",
			"guest"=>"$_POST[guest]",
			
			"remark"=>"$_POST[remark]",
			
				
			///////
			"hoteldetail"=>"$_POST[hoteldetail]",
			"hoteldetail2"=>"$_POST[hoteldetail2]",
			"hoteldetail3"=>"$_POST[hoteldetail3]",
			
			"guestemail"=>"$_POST[guestemail]",
			"guestemail2"=>"$_POST[guestemail2]",
			"guestemail3"=>"$_POST[guestemail3]",
			
			"phone"=>"$_POST[phone]",
			"phone2"=>"$_POST[phone2]",
			"phone3"=>"$_POST[phone3]",
			
			"s_qq"=>"$_POST[s_qq]",
			"s_line"=>"$_POST[s_line]",
			"s_skype"=>"$_POST[s_skype]",
			"s_wechat"=>"$_POST[s_wechat]",
			
			"h1in"=>"$_POST[h1in]",
			"h2in"=>"$_POST[h2in]",
			"h3in"=>"$_POST[h3in]",
			
			"h1out"=>"$_POST[h1out]",
			"h2out"=>"$_POST[h2out]",
			"h3out"=>"$_POST[h3out]",
				
			///////
			
		
			"update_date"=>"".TIMESTAMP."",
				"total"=>"$_POST[total]"
		)," id=$_GET[id] ");
		$db->closedb ();
		
		//event
		
		$db->connectdb(DB_NAME_HIS,DB_USERNAME_HIS,DB_PASSWORD_HIS);
		$db->add_db(TB_box,array(
			"sender"=>"".date('Y-m-d')."",
			"topic"=>"Edit Agent reservation No. $_POST[rsvn]",
			"type"=>"Edit Agent reservation",
			"posted"=>"".$_SESSION['admin_user']."",
			"post_date"=>"".TIMESTAMP."",
			"enable_comment"=>"0"
		));
		$db->closedb ();
		
		///////////////


		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Edit Agent reservation complete</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=booking\"><B>Back to Agent reservation</B></A>";
		echo "<meta http-equiv=refresh content=1;URL=?name=admin&file=booking&op=bookagent_edit&view=edit&id=$_GET[id]>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//??
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "bookagent_edit" and $_GET[view] == "edit"){
	//////////////////////////////////////////// ? Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){

		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[project] = $db->select_query("SELECT * FROM ".TB_book_agent." WHERE id='".$_GET[id]."' ");
		$arr[project] = $db->fetch($res[project]);
		$db->closedb ();

		//??? Text 
		$FileprojectTopic = "data/projectdata/".$arr[project][post_date].".txt";
		$file_open = @fopen($FileprojectTopic, "r");
		$TextContent = @fread ($file_open, @filesize($FileprojectTopic));
		@fclose ($file_open);
		$TextContent = stripslashes($TextContent);
?>
<FORM NAME="myform" METHOD=POST ACTION="?name=admin&file=booking&op=bookagent_edit&action=edit&id=<?=$_GET[id];?>" enctype="multipart/form-data" onsubmit="return check2()">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><? include"admin/admin/booking/agent_edit.php"; ?></td>
    </tr>
  </table>
  </FORM>

<?
	}else{
		//??
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "bookagent_del" AND $_GET[action] == "multidel"){
	//////////////////////////////////////////// ?? Multi
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		while(list($key, $value) = each ($_POST['list'])){
			$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
			$res[project] = $db->select_query("SELECT * FROM ".TB_project." WHERE id='".$value."' ");
			$arr[project] = $db->fetch($res[project]);
			$db->del(TB_book_agent," id='".$value."' "); 
			$db->del(TB_gallery," category='".$value."' "); 
			$db->closedb ();
		@unlink("pic/galleryicon/icon/".$_GET[prefix]."_icon.jpg");
		@unlink("pic/galleryicon/icon/".$_GET[prefix]."_icon2.jpg");
		@unlink("pic/galleryicon/pic/".$_GET[prefix]."full.jpg");
		}
		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Delete Agent reservation complete</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=booking\"><B>Back to Agent reservation </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//??
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
else if($_GET[op] == "bookagent_del"){
	//////////////////////////////////////////// ?? Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->del(TB_book_agent," id='".$_GET[id]."' "); 
		$db->del(TB_gallery," category='".$_GET[id]."' "); 
		$db->closedb ();

		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
		$ProcessOutput .= "<FONT COLOR=\"#336600\"><B>Delete Agent reservation complete</B></FONT><BR><BR>";
		$ProcessOutput .= "<A HREF=\"?name=admin&file=booking\"><B>Back to Agent reservation </B></A>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//??
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
?><?
if($_GET[op] == "bookagent_edit" and $_GET[view] == "view"){
	//////////////////////////////////////////// ? Form
	if(CheckLevel($_SESSION['admin_user'],$_GET[op])){

		//?
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[orderid] = $db->select_query("SELECT * FROM ".TB_order." WHERE orderid='".$_GET[id]."' and simcard_num >'0' ");
		$arr[orderid] = $db->fetch($res[orderid]);		
$id_vc = $arr[orderid][invoice];	

		$res[simstandard] = $db->select_query("SELECT * FROM ".TB_simcard." WHERE vc='".$id_vc."' and type ='Standard'  ");
		$res[simnano] = $db->select_query("SELECT * FROM ".TB_simcard." WHERE vc='".$id_vc."' and type ='Nano' ");

$standard_c = $db->rows($res[simstandard]);		
$nano_c = $db->rows($res[simnano]);
		$res[project] = $db->select_query("SELECT * FROM ".TB_book_agent." WHERE id='".$_GET[id]."' ");
		$arr[project] = $db->fetch($res[project]);
		
			$res[category] = $db->select_query("SELECT * FROM ".TB_admin." WHERE id='".$arr[project][agent]."' ");
	$arr[category] = $db->fetch($res[category]);
	$company= $arr[category][company];
	
	
	

?>

  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><? include"admin/admin/booking/agent_view.php"; ?></td>
    </tr>
  </table>

  <? } }
  
  ?>
  <?
  if($_GET[op] == "bookagent_remark"){
	//////////////////////////////////////////// ? Form
	if(1==1){

		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[project] = $db->select_query("SELECT * FROM ".TB_order." WHERE id='".$_GET[id]."' ");
		$arr[product] = $db->fetch($res[project]);
		$db->closedb ();

		//??? Text 
		$FileprojectTopic = "data/projectdata/".$arr[project][post_date].".txt";
		$file_open = @fopen($FileprojectTopic, "r");
		$TextContent = @fread ($file_open, @filesize($FileprojectTopic));
		@fclose ($file_open);
		$TextContent = stripslashes($TextContent);
?>
<FORM NAME="myform" METHOD=POST ACTION="?name=admin&file=booking&op=bookagent_remarkedit&id=<? echo $_GET[id];?>&no=<? echo $_GET[no];?>&amp;order=<? echo $_GET[order];?>" enctype="multipart/form-data" onsubmit="return check2()">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="2">
        <tr>
          <td width="150"><strong>Voucher No. :</strong></td>
          <td ><font size="+1">
              <?=$arr[product][invoice];?></td>
        </tr>
        <tr>
          <td height="1" colspan="2"  class="dotline"></td>
        </tr>
        <tr>
          <td><strong>
            <?=book_ondate;?> 
            :</strong></td>
          <td><font size="+1">
              <?=$arr[product][ondate];?></td>
        </tr>
        <tr>
          <td height="1" colspan="2"  class="dotline"></td>
        </tr>
        <tr>
          <td><strong>
            <?=book_remark;?> 
            :</strong></td>
          <td><font size="+1">
            <textarea name="remark" rows="5" class="inputform" id="remark" style="width:580px; FONT-SIZE:13px;"><?=$arr[product][remark];?></textarea></td>
        </tr>
        <tr>
          <td height="1" colspan="2"  class="dotline"></td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td><script language="JavaScript" type="text/javascript">
	function chkConfirm()
	{
		if(confirm('WARNING!! \n\r Are you sure Voucher No.<?=$arr[product][invoice];?> \n\r had been confirmed')==true)
		{
		
			if(confirm('Confirm Voucher No.<?=$arr[product][invoice];?>')==true)
		{
			
		
			window.location = '?name=admin/order&file=order_tour&op=order_edit&action=edit&id=<?=$_GET[id];?>&order=<?=$_GET[order];?>&no=<?=$arr[product][invoice];?>&status=CONFIRM';
		}
		}
		else
		{
			alert('You selected to cancel.');
		}
	}
      </script>
              <script language="JavaScript" type="text/javascript">
	function chkreject()
	{
		if(confirm('WARNING!! \n\r Are you sure Voucher No.<?=$arr[product][invoice];?> \n\r had been Confirm Reject')==true)
		{
		
			if(confirm('Confirm Reject reservation NO.<?=$arr[product][invoice];?>')==true)
		{
			
		
			window.location = '?name=admin/order&file=order_tour&op=order_confirmcancel&action=cancel&id=<?=$_GET[id];?>&order=<?=$_GET[order];?>&no=<?=$arr[product][invoice];?>&status=CANCEL&rsvn=<?=$arr[product][rsvn];?>';
		}
		}
		else
		{
			alert('You selected to cancel.');
		}
	}
        </script>
              <input name="Submit22" type="submit" class="myButton" id="Submit22"  value="Edit Remark" style="background-color:#FF9900; font-size:16px; color:#FFFFFF "  readonly="" /></td>
        </tr>
        <tr>        </tr>
      </table></td>
    </tr>
  </table>
  </FORM>
<? }  } 

if($_GET[op] == "bookagent_remarkedit"){
	//////////////////////////////////////////// ó Database Edit
	if(2==2){
	
	
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->update_db(TB_order,array(
				
"remark"=>"$_POST[remark]"

		)," invoice=$_GET[no] ");
		$db->closedb ();
		
	///////////////
		
//event		
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->add_db(TB_box,array(
			"sender"=>"".date('Y-m-d')."",
			"topic"=>"Edit Remark $_GET[type] Voucher No. $_GET[no]",
			"type"=>"Update Voucher",
			"posted"=>"".$_SESSION['admin_user']."",
			"post_date"=>"".TIMESTAMP."",
			"enable_comment"=>"0"
		));
		$db->closedb ();
		///////////////
				$rsvn=$_GET['rsvn'];
		
		require_once("admin/admin/booking/check.php");
		//ӡҧ text ͧ Project 
		$Filename = $arr[project][post_date].".txt";
		$txt_name = "data/projectdata/".$Filename."";
		$txt_open = @fopen("$txt_name", "w");
		@fwrite($txt_open, "".$_POST[DETAIL]."");
		@fclose($txt_open);

		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
echo "<meta http-equiv=refresh content=1;URL=?name=admin&file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=".$_GET[order].">";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//óҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}

?>
<?
  if($_GET[op] == "bookagent_deposite"){
	//////////////////////////////////////////// ? Form
	if(1==1){

		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[project] = $db->select_query("SELECT * FROM ".TB_order." WHERE id='".$_GET[id]."' ");
		$arr[product] = $db->fetch($res[project]);
		$db->closedb ();

		//??? Text 
		$FileprojectTopic = "data/projectdata/".$arr[project][post_date].".txt";
		$file_open = @fopen($FileprojectTopic, "r");
		$TextContent = @fread ($file_open, @filesize($FileprojectTopic));
		@fclose ($file_open);
		$TextContent = stripslashes($TextContent);
?>
<FORM NAME="myform" METHOD=POST ACTION="?name=admin&file=booking&op=bookagent_depositeadd&id=<? echo $_GET[id];?>&no=<? echo $_GET[no];?>&amp;order=<? echo $_GET[order];?>" enctype="multipart/form-data" onsubmit="return checkdepoadd()">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="2">
        <tr>
          <td width="150"><strong>Voucher No. :</strong></td>
          <td ><font size="+1">
              <?=$arr[product][invoice];?></td>
        </tr>
        <tr>
          <td height="1" colspan="2"  class="dotline"></td>
        </tr>
        <tr>
          <td><strong>
            <?=book_ondate;?> 
            :</strong></td>
          <td><font size="+1">
              <?=$arr[product][ondate];?></td>
        </tr>
        <tr>
          <td height="1" colspan="2"  class="dotline"></td>
        </tr>
        <tr>
          <td><strong>
            <?=book_amount;?> 
            :</strong></td>
          <td><input name="cost" id="cost"   type="text" style="width:70px;" onkeypress="check_num(event);" /></td>
        </tr><td height="1" colspan="2"  class="dotline"></td>
        <tr>
          <td><strong>
            <?=tab_depo;?>
            :</strong></td>
          <td><input name="person"   type="text" id="person" style="width:170px;" value="<?=$_SESSION['admin_user'];?>" /></td>
        </tr><td height="1" colspan="2"  class="dotline"></td>
        <tr>
          <td><strong>
            <?=book_date;?> 
            :</strong></td>
          <td><input name="ondate" id="ondate" style="width:80px; FONT-SIZE:13px; " value="<?=$arr[product][ondate];?>" readonly="readonly" />
            <img src="images/admin/dateselect.gif" border="0"  onclick="displayDatePicker('ondate', false, 'ymd', '-');" align="top" /></td>
        </tr><td height="1" colspan="2"  class="dotline"></td>
        <tr>
          <td><strong>
            <?=book_remark;?> 
            :</strong></td>
          <td><textarea name="remark" rows="3" class="inputform" id="remark" style="width:580px; FONT-SIZE:13px;"></textarea></td>
        </tr>
        <tr>
          <td height="1" colspan="2"  class="dotline"></td>
        </tr>
        <tr>
          <td><strong>
            <?=book_note;?> 
            :</strong></td>
          <td><textarea name="topic" rows="3" class="inputform" id="topic" style="width:580px; FONT-SIZE:13px; background-color:#D4EFFC"></textarea></td>
        </tr>
        <tr>
          <td height="1" colspan="2"  class="dotline"></td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td><script language="JavaScript" type="text/javascript">

function checkdepoadd() {

if(document.myform.cost.value=="") {
alert("please insert Amount") ;
document.myform.cost.focus() ;
return false ;
}

if(document.myform.person.value=="") {
alert("please insert Depositor") ;
document.myform.person.focus() ;
return false ;
}

}

                      </script>
              <input name="Submit22" type="submit" class="myButton" id="Submit22"  value="Add Deposite" style="background-color:#FF9900; font-size:16px; color:#FFFFFF "  readonly="" /></td>
        </tr>
        <tr>        </tr>
      </table></td>
    </tr>
  </table>
  </FORM>
<? }  } 

if($_GET[op] == "bookagent_depositeadd"){
	//////////////////////////////////////////// ó Database Edit
	if(2==2){
	
	
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->add_db(TB_deposit,array(
		"rsvn"=>"$_GET[order]",
		"vc"=>"$_GET[id]",
			"topic"=>"$_POST[topic]",	
				"remark"=>"$_POST[remark]",
				
				"cost"=>"$_POST[cost]",
				"person"=>"$_POST[person]",
				"ondate"=>"$_POST[ondate]",
				
			"posted"=>"$_SESSION[admin_user]",
			"post_date"=>"".TIMESTAMP."",
			"update_date"=>"".TIMESTAMP."",
			"enable_comment"=>"$_POST[ENABLE_COMMENT]"
		));
		$db->closedb ();
	///////////////
		
//event		
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->add_db(TB_box,array(
			"sender"=>"".date('Y-m-d')."",
			"topic"=>"Add Deposite to $_GET[type] Voucher No. $_GET[no]",
			"type"=>"Update Voucher",
			"posted"=>"".$_SESSION['admin_user']."",
			"post_date"=>"".TIMESTAMP."",
			"enable_comment"=>"0"
		));
		$db->closedb ();
		///////////////
				$rsvn=$_GET['rsvn'];
		

		//ӡҧ text ͧ Project 
		$Filename = $arr[project][post_date].".txt";
		$txt_name = "data/projectdata/".$Filename."";
		$txt_open = @fopen("$txt_name", "w");
		@fwrite($txt_open, "".$_POST[DETAIL]."");
		@fclose($txt_open);

		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
echo "<meta http-equiv=refresh content=1;URL=?name=admin&file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=$_GET[order]#$_GET[id]>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//óҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}

////////////////////// del deposite
if($_GET[op] == "bookagent_deposite_del"){
	//////////////////////////////////////////// ó Database Edit
	if(2==2){
	
	
			$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->del(TB_deposit," id='".$_GET[deposite]."' "); 
		
		$db->closedb ();
	
	
	
	///////////////
		
//event		
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->add_db(TB_box,array(
			"sender"=>"".date('Y-m-d')."",
			"topic"=>"Delete Deposite in Voucher No. $_GET[no]",
			"type"=>"Update Voucher",
			"posted"=>"".$_SESSION['admin_user']."",
			"post_date"=>"".TIMESTAMP."",
			"enable_comment"=>"0"
		));
		$db->closedb ();
		///////////////
				$rsvn=$_GET['rsvn'];
		

		//ӡҧ text ͧ Project 
		$Filename = $arr[project][post_date].".txt";
		$txt_name = "data/projectdata/".$Filename."";
		$txt_open = @fopen("$txt_name", "w");
		@fwrite($txt_open, "".$_POST[DETAIL]."");
		@fclose($txt_open);

		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
echo "<meta http-equiv=refresh content=1;URL=?name=admin&file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=$_GET[order]#$_GET[id]>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//óҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}

?>
<?
  if($_GET[op] == "bookagent_deposite_edit"){
	//////////////////////////////////////////// ? Form
	if(1==1){

		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[project] = $db->select_query("SELECT * FROM ".TB_order." WHERE id='".$_GET[id]."' ");
		$arr[product] = $db->fetch($res[project]);
		$db->closedb ();
		
		
				$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$res[depo] = $db->select_query("SELECT * FROM ".TB_deposit." WHERE id='".$_GET[deposite]."' ");
		$arr[depo] = $db->fetch($res[depo]);
		$db->closedb ();
		

		//??? Text 
		$FileprojectTopic = "data/projectdata/".$arr[project][post_date].".txt";
		$file_open = @fopen($FileprojectTopic, "r");
		$TextContent = @fread ($file_open, @filesize($FileprojectTopic));
		@fclose ($file_open);
		$TextContent = stripslashes($TextContent);
?>
<FORM NAME="myform" METHOD=POST ACTION="?name=admin&file=booking&op=bookagent_deposite_edit_add&id=<? echo $_GET[id];?>&no=<? echo $_GET[no];?>&order=<? echo $_GET[order];?>&deposite=<? echo $_GET[deposite];?>" enctype="multipart/form-data" onsubmit="return checkdepoedit()">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="100%" border="0" cellpadding="0" cellspacing="2">
        <tr>
          <td width="150"><strong>Voucher No. :</strong></td>
          <td ><font size="+1">
              <?=$arr[product][invoice];?></td>
        </tr>
        <tr>
          <td height="1" colspan="2"  class="dotline"></td>
        </tr>
        <tr>
          <td><strong>
            <?=book_ondate;?> 
            :</strong></td>
          <td><font size="+1">
              <?=$arr[product][ondate];?></td>
        </tr>
        <tr>
          <td height="1" colspan="2"  class="dotline"></td>
        </tr>
        <tr>
          <td><strong>
            <?=book_amount;?> 
            :</strong></td>
          <td><input name="cost"   type="text" id="cost" style="width:70px;" onkeypress="check_num(event);" value="<?=$arr[depo][cost];?>" /></td>
        </tr><td height="1" colspan="2"  class="dotline"></td>
        <tr>
          <td><strong>
            <?=tab_depo;?>
            :</strong></td>
          <td><input name="person"   type="text" id="person" style="width:170px;" value="<?=$arr[depo][person];?>" /></td>
        </tr><td height="1" colspan="2"  class="dotline"></td>
        <tr>
          <td><strong>
            <?=book_date;?> 
            :</strong></td>
          <td><input name="ondate" id="ondate" style="width:80px; FONT-SIZE:13px; " value="<?=$arr[depo][ondate];?>" readonly="readonly" />
            <img src="images/admin/dateselect.gif" border="0"  onclick="displayDatePicker('ondate', false, 'ymd', '-');" align="top" /></td>
        </tr><td height="1" colspan="2"  class="dotline"></td>
        <tr>
          <td><strong>
            <?=book_remark;?> 
            :</strong></td>
          <td><textarea name="remark" rows="3" class="inputform" id="remark" style="width:580px; FONT-SIZE:13px;"><?=$arr[depo][remark];?>
          </textarea></td>
        </tr>
        <tr>
          <td height="1" colspan="2"  class="dotline"></td>
        </tr>
        <tr>
          <td><strong>
            <?=book_note;?> 
            :</strong></td>
          <td><textarea name="textarea2" rows="3" class="inputform" id="textarea2" style="width:580px; FONT-SIZE:13px;background-color:#D4EFFC" ><?=$arr[depo][topic];?> </textarea></td>
        </tr>
        <tr>
          <td height="1" colspan="2"  class="dotline"></td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td>                <script language="JavaScript" type="text/javascript">

function checkdepoedit() {

if(document.myform.cost.value=="") {
alert("please insert Amount") ;
document.myform.cost.focus() ;
return false ;
}

if(document.myform.person.value=="") {
alert("please insert Depositor") ;
document.myform.person.focus() ;
return false ;
}

}

                      </script>
              <input name="Submit22" type="submit" class="myButton" id="Submit22"  value="Edit Deposite" style="background-color:#FF9900; font-size:16px; color:#FFFFFF "  readonly="" /></td>
        </tr>
        <tr>        </tr>
      </table></td>
    </tr>
  </table>
  </FORM>
  <? }}?>
 
  <?
  if($_GET[op] == "bookagent_deposite_edit_add"){
	//////////////////////////////////////////// ó Database Edit
	if(2==2){
	
	

		
		
		$db->update_db(TB_deposit,array(
	
		"remark"=>"$_POST[remark]",
				"topic"=>"$_POST[topic]",	
				"cost"=>"$_POST[cost]",
				"person"=>"$_POST[person]",
				"ondate"=>"$_POST[ondate]",
			"posted"=>"$_SESSION[admin_user]",
			"update_date"=>"".TIMESTAMP."",
			"enable_comment"=>"$_POST[ENABLE_COMMENT]"
		)," id=$_GET[deposite] ");
		$db->closedb ();
		
		
		
		
		
		
		
		
		
//event		
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		$db->add_db(TB_box,array(
			"sender"=>"".date('Y-m-d')."",
			"topic"=>"Edit Deposite in Voucher No. $_GET[no]",
			"type"=>"Update Voucher",
			"posted"=>"".$_SESSION['admin_user']."",
			"post_date"=>"".TIMESTAMP."",
			"enable_comment"=>"0"
		));
		$db->closedb ();
		///////////////

		$ProcessOutput .= "<BR><BR>";
		$ProcessOutput .= "<CENTER><A HREF=\"?name=admin&file=main\"><IMG SRC=\"images/icon/admin.png\" BORDER=\"0\"></A><BR><BR>";
echo "<meta http-equiv=refresh content=1;URL=?name=admin&file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=$_GET[order]#$_GET[id]>";
		$ProcessOutput .= "</CENTER>";
		$ProcessOutput .= "<BR><BR>";
	}else{
		//óҹ
		$ProcessOutput = $PermissionFalse ;
	}
	echo $ProcessOutput ;
}
?>
	
</TD>
				</TR>
			</TABLE>
			
		  <!-- Admin -->		  
		  </TD>
        </TR>
      </TBODY>
</TABLE>
