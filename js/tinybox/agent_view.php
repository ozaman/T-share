<?

include "find/list/booking/java.php" ;



/////////ดึงข้อมูล agent

$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);

$res[usercallcenter] = $db->select_query("SELECT * FROM ".TB_admin." WHERE username='".$_SESSION['admin_user']."' ");

$arr[usercallcenter] = $db->fetch($res[usercallcenter]);



$admincall= $arr[usercallcenter][callcenter];

$adminbookopen= $arr[usercallcenter][bookopen];
$admincontrolbook= $arr[usercallcenter][control_booking];



?><STYLE type="text/css">

.okButton {

background-color: #D4D4D4;

font-color: #000000;

font-size: 9pt;

font-family: arial;

width: 70px;

height:	20px;  

}

.alertTitle {

background-color: #3C56FF;

font-family: arial;

font-size: 9pt;

color: #FFFFFF;

font-weight: bold;

}

.alertMessage {

font-family: arial;

font-size: 9pt;

color: #000000;

font-weight: normal;

}

.alertBoxStyle {

cursor: default;

filter: alpha(opacity=90);

background-color: #E4E4E4;

position: absolute;

top: 200px;

left: 200px;

width: 100px;

height: 50px;

visibility:hidden; z-index: 999;

border-style: groove;

border-width: 5px;

border-color: #FFFFFF;

text-align: center;

}

</STYLE>



<script type="text/javascript">

function hotel1(){

if(document.getElementById('hotel1').value > 0) {

document.getElementById('d1').value = "please select "  ;



return false ;

}

if(document.getElementById('hotel1').value == "") {

document.getElementById('day1').value = 0  ;



return false ;

}

}

function hotel2(){

if(document.getElementById('hotel2').value > 0) {

document.getElementById('d2').value = "please select "  ;



return false ;

}



if(document.getElementById('hotel2').value == "") {

document.getElementById('day2').value = 0  ;



return false ;

}

}

function hotel3(){

if(document.getElementById('hotel3').value > 0) {

document.getElementById('d3').value = "please select "  ;



return false ;

}



if(document.getElementById('hotel3').value == "") {

document.getElementById('day3').value = 0  ;



return false ;

}

}

function hotel4(){

if(document.getElementById('hotel4').value > 0) {

document.getElementById('d4').value = "please select "  ;



return false ;

}

if(document.getElementById('hotel4').value == "") {

document.getElementById('day4').value = 0  ;



return false ;

}

}

function hotel5(){

if(document.getElementById('hotel5').value > 0) {

document.getElementById('d5').value = "please select "  ;



return false ;

}



if(document.getElementById('hotel5').value == "") {

document.getElementById('day5').value = 0  ;



return false ;

}

}

function hotel6(){

if(document.getElementById('hotel6').value > 0) {

document.getElementById('d6').value = "please select "  ;



return false ;

}







if(document.getElementById('hotel6').value == "") {

document.getElementById('day6').value = 0  ;



return false ;

}

}



 



</script>



<script type="text/javascript">

<!--

function airin(){









if(document.getElementById('same_airin').value == "yes") {

document.getElementById('airin_f').value = document.getElementById('airin').value  ;



return false ;

}

if(document.getElementById('same_airin').value == "no") {

document.getElementById('airin_f').value = "" ;



return false ;

}





}



function airout(){





if(document.getElementById('same_airout').value == "yes") {

document.getElementById('airout_f').value = document.getElementById('airout').value  ;



return false ;

}

if(document.getElementById('same_airout').value == "no") {

document.getElementById('airout_f').value = "" ;



return false ;

}





}









function sum(){

var alphaExp = /[\@\#\%\/\\\^\&\*\(\)\_\+\.]/;

document.getElementById('total').value = parseInt(document.getElementById('adult').value)  + parseInt(document.getElementById('child').value) + parseInt(document.getElementById('baby').value) ;





document.getElementById('totalday').value = parseInt(document.getElementById('day1').value)  + parseInt(document.getElementById('day2').value) + parseInt(document.getElementById('day3').value) + parseInt(document.getElementById('day4').value)+ parseInt(document.getElementById('day5').value)+ parseInt(document.getElementById('day6').value);





/// h2



}





function MM_jumpMenu(targ,selObj,restore){ //v3.0

  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");

  if (restore) selObj.selectedIndex=0;

}

//-->

</script>

<style type="text/css">

<!--

.style1book {

	font-size: 14px;

	color: #CC3300;

}

.style2book {font-size: 14px;color: #006699}

.style3book {font-size: 14px; color: #000000}
.style1book1 {
	font-size: 18px;

	color: #CC3300;
}
.style2book1 {font-size: 18px;color: #006699}

-->

</style>

<?

$rsvn=$arr[project][invoice];
		

 require_once("admin/admin/booking/check.php");

?>

          <table width="100%" border="0" cellspacing="0" cellpadding="1" class="topic_find" style="display:none <? if($adminlevel ==2 or $adminlevel ==1 ){



		echo "1" ;

		

		

		

		} ?><? if($adminlevel > 4 ){



		echo "1" ;

		

		

		

		} ?>">

            <tr>

              <td><form action="?name=admin&amp;file=booking&amp;status=all" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <table width="100%" border="0" cellspacing="2" cellpadding="2" style="display:none <? if($adminlevel ==2 or $adminlevel ==1 ){







		echo "1" ;



		



		



		



		} ?><? if($adminlevel > 4 ){







		echo "1" ;



		



		



		



		} ?>">
                  <tr>
                    <td width="9%"><strong>
                      <label>
                      <?=ordersub_rsvn;?>
                      </label>
                    </strong></td>
                    <td width="1%"><strong>: </strong></td>
                    <td width="22%"><input name="rsvnno" id="rsvnno"   type="text" style="width:150px;" />
                        <input name="rsvn" type="submit"  id="rsvn" class="mygo"  value="<?=button_find;?>" /></td>
                    <td width="11%"><strong>
                      <?=ordersub_ref;?>
                    </strong></td>
                    <td width="1%"><strong>: </strong></td>
                    <td width="22%"><input name="refno" id="refno"   type="text" style="width:150px;" />
                        <input name="ref" type="submit"  id="ref" class="mygo"  value="<?=button_find;?>" /></td>
                    <td width="11%"><strong>
                      <?=book_guest;?>
                    </strong></td>
                    <td width="1%"><strong>: </strong></td>
                    <td width="22%"><input name="guestno" id="guestno"   type="text" style="width:150px;" />
                        <input name="guest" type="submit"  id="guest" class="mygo"  value="<?=button_find;?>" /></td>
                  </tr>
                  <tr>
                    <td width="9%"><strong>
                      <?=ordersub_bookdate;?>
                    </strong></td>
                    <td width="1%"><strong> : </strong></td>
                    <td width="22%"><input name="bookingdate" id="bookingdate" style="width:118px; FONT-SIZE:13px; "  readonly="readonly" />
                        <img src="images/admin/dateselect.gif" border="0"  onclick="displayDatePicker('bookingdate', false, 'ymd', '-');" align="absmiddle" />
                        <input name="booking" type="submit"  id="booking" class="mygo"  value="<?=button_find;?>" /></td>
                    <td width="11%"><strong>
                      <?=book_phone;?>
                    </strong></td>
                    <td width="1%"><strong>: </strong></td>
                    <td width="22%"><input name="phone" id="phone"   type="text" style="width:150px;" />
                        <input name="phonea" type="submit"  id="phonea" class="mygo"  value="<?=button_find;?>" /></td>
                    <td width="11%"><strong>
                      <?=book_airin;?>
                    </strong></td>
                    <td width="1%"><strong>:</strong></td>
                    <td width="22%"><input name="arivaldate" id="arivaldate" style="width:118px; FONT-SIZE:13px; "  readonly="readonly" />
                        <img src="images/admin/dateselect.gif" border="0"  onclick="displayDatePicker('arivaldate', false, 'ymd', '-');" align="absmiddle" />
                        <input name="ondate2" type="submit"  id="ondate2" class="mygo"  value="<?=button_find;?>" /></td>
                  </tr>
                  <tr>
                    <td><strong>
                      <?=ordersub_company;?>
                    </strong></td>
                    <td><strong>: </strong></td>
                    <td width="22%"><? if($adminlevel ==2){



		$ag="and id=$adminid" ;} ?>
                        <? if($adminlevel ==1){



		$ag="and id=$admincompany" ;} ?>
                        <? if($adminlevel >4){



		$ag="" ;} ?>
                        <select name="company" id="company"    style="width:150px; background-color:<?



/////////////



if($arr[user][level] <5 ){



echo "#FFFFFF" ;



}?>" <?



/////////////



if($arr[user][level] <5 ){



echo "disabled" ;



}?>>
                          <option value="">--
                            <?=book_allagent;?>
                            --</option>
                          <?



$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);



$res[category] = $db->select_query("SELECT * FROM ".TB_admin." where level=2 $ag ORDER BY  CONVERT(company USING TIS620) asc ");



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



}?>/></td>
                    <td width="11%"><strong>
          <?=booking_ref_no;?>
        </strong></td>
        <td width="1%"><strong>:</strong></td>
        <td width="22%"><input name="booking_refno" id="booking_refno"   type="text" style="width:150px;" />
          <input name="booking_ref" type="submit"  id="booking_ref" class="mygo"  value="<?=button_find;?>" /></td>
                    <td><strong>
                      <?=ordersub_vc;?>
                    </strong></td>
                    <td><strong>:</strong></td>
                    <td><input name="invoiceno" id="invoiceno"   type="text" style="width:150px;" />
                        <input name="invoice" type="submit"  id="invoice" class="mygo"  value="<?=button_find;?>" /></td>
                  </tr>
                </table>
              </form></td>

            </tr>

          </table>

          <table width="100%" border="0" cellspacing="0" cellpadding="0">

            <tr>

              

            </tr>

          </table>

          <br />

          <table width="100%" border="0" cellpadding="0" cellspacing="2" >

            <tr>

              <td width="100%"><font size="3"><span class="style1book">

             <strong>   <?=book_agentname;?> 

              : <strong>

                <?=$company;?>

                </strong> | <span class="style2book"><strong>

                <?=book_agentref;?>

                </strong> :<strong>

                <?=$arr[project][agent_ref];?>

                </strong></span>                |<span class="style3book">&nbsp;<strong><?=book_reser_no;?>:<strong>

                <?=$arr[project][invoice];?>

                </strong></span></span>              <strong>

                

                </strong></td>

            </tr>

            <tr>

              <td height="1"  class="dotline"></td>

            </tr>

          </table>

          <table width="100%" border="0" cellpadding="1" cellspacing="2" >

            <tr>

              <td background="images/bg2/glassblue2.jpg"><strong>

          <strong><font size="3">&nbsp;</strong><?=book_agentdetail;?></strong></td>
            </tr>

            <tr>

              <td><table width="100%" border="0" cellspacing="5" cellpadding="3" class="topic_sup" >
                <tr>
                  <td width="200" bgcolor="#FFFFFF"><strong>
                    <?=book_guest;?>
                    :&nbsp;</strong></td>
                  <td bgcolor="#FFFFFF"><?=$arr[project][guest];?></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><strong>
                    <?=book_nation;?>
                    :&nbsp;</strong></td>
                  <td bgcolor="#FFFFFF"><img src="iconstatus/flag/<?=$arr[country][country_code];?><? if(!$arr[country][country_code]){echo "OT";}?>.png" align="absmiddle" />
                      <?=$arr[country][name_en];?>
                    <? if(!$arr[country][country_code]){echo "Other";}?>                  </td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><strong>
                    <?=book_people;?>
                    :</strong></td>
                  <td bgcolor="#FFFFFF"><table align="left" border="0" cellpadding="0" cellspacing="0" width="400">
                      <tbody>
                        <tr>
                          <td width="20%" <? if($arr[project][adult]<1){echo "style=display:none";}?>><strong>
                            <?=book_adult;?>
                            :</strong>
                              <?=$arr[project][adult];?>                          </td>
                          <td width="20%" <? if($arr[project][child]<1){echo "style=display:none";}?>><strong>
                            <?=book_child;?>
                            : </strong>
                              <?=$arr[project][child];?>                          </td>
                          <td width="20%" <? if($arr[project][baby]<1){echo "style=display:none";}?>><strong>
                            <?=book_baby;?>
                            :</strong>
                              <?=$arr[project][baby];?>                          </td>
                          <td width="20%"><strong>
                            <?=book_total;?>
                            : </strong>
                              <?=$arr[project][adult]+$arr[project][child]+$arr[project][baby];?>                          </td>
                        </tr>
                      </tbody>
                  </table></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF" <? if($arr[project][phone]=="" and $arr[project][phone2]=="" and $arr[project][phone3]==""){echo "style=display:none";}?>><strong>
                    <?=book_phone;?>
                    : </strong></td>
                  <td bgcolor="#FFFFFF" <? if($arr[project][phone]=="" and $arr[project][phone2]=="" and $arr[project][phone3]==""){echo "style=display:none";}?>><table width="600" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="33%" <? if($arr[project][phone]==""){echo "style=display:none";}?>><strong>1 :</strong>
                            <?=$arr[project][phone];?>                        </td>
                        <td width="33%" <? if($arr[project][phone2]==""){echo "style=display:none";}?>><strong>2 :</strong>
                            <?=$arr[project][phone2];?>                        </td>
                        <td width="33%" <? if($arr[project][phone3]==""){echo "style=display:none";}?>><strong>3 :</strong>
                            <?=$arr[project][phone3];?>                        </td>
                      </tr>
                  </table></td>
                </tr>
                <tr style="display:<? if($standard_c == '0' && $nano_c == '0'){echo 'none';} ?>">
                  <td><strong>Simcard Number : </strong></td>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr style="display:<? if($standard_c == 0){echo 'none';} ?>">
                        <td width="123"><strong>Simcard Standard (
                              <?=$arr[orderid][simcard_standard];?>
                          ):</strong></td>
                        <td width="" align="left"><?

							while($arr[simstandard] = $db->fetch($res[simstandard])){

								echo 	$arr[simstandard][topic].' , ';

							}

						?>                        </td>
                      </tr>
                      <tr style="display:<? if($nano_c == 0){echo 'none';} ?>">
                        <td><strong>Simcard I-Phone5 (
                              <?=$arr[orderid][simcard_nano];?>
                          ):</strong></td>
                        <td align="left"><?

							while($arr[simnano] = $db->fetch($res[simnano])){

								echo 	$arr[simnano][topic].' , ';

							}

						?>                        </td>
                      </tr>
                  </table></td>
                </tr>
                <tr <? if($arr[project][guestemail]==""){echo "style=display:none";}?>>
                  <td bgcolor="#FFFFFF" ><strong>
                    <?=book_email;?>
                    : </strong></td>
                  <td bgcolor="#FFFFFF" <? if($arr[project][guestemail]==""){echo "style=display:none";}?>><table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="33%"><?=$arr[project][guestemail];?>                        </td>
                        <td width="33%">&nbsp;</td>
                        <td width="33%">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr <? if($arr[project][s_qq]=="" and $arr[project][s_wechat]=="" and $arr[project][s_line]=="" and $arr[project][s_skype]=="" and $arr[project][s_ww]==""){echo "style=display:none";}?>>
                  <td bgcolor="#FFFFFF" ><strong>
                    <?=book_social;?>
                    : </strong> </td>
                  <td bgcolor="#FFFFFF" <? if($arr[project][s_qq]=="" and $arr[project][s_wechat]=="" and $arr[project][s_line]=="" and $arr[project][s_skype]==""  and $arr[project][s_ww]=="" ){echo "style=display:none";}?>><table width="100%" border="0" cellpadding="0" cellspacing="5">
                      <tr>
                        <td <? if($arr[project][s_qq]==""){echo "style=display:none";}?>><strong><img src="sicon/q.jpeg" width="20" align="absmiddle" /> QQ ID : </strong>
                          <?=$arr[project][s_qq];?></td>
                        <td <? if($arr[project][s_wechat]==""){echo "style=display:none";}?>><strong><img src="sicon/w.jpeg" width="20" align="absmiddle" /> WECHAT ID : </strong>
                          <?=$arr[project][s_wechat];?></td>
                        <td <? if($arr[project][s_line]==""){echo "style=display:none";}?>><strong><img src="sicon/l.jpeg" width="20" align="absmiddle" /> LINE ID :</strong>
                          <?=$arr[project][s_line];?></td>
                        <td <? if($arr[project][s_skype]==""){echo "style=display:none";}?>><strong><img src="sicon/s.jpeg" width="20" align="absmiddle" /> SKYPE ID  : </strong>
                          <?=$arr[project][s_skype];?></td>
                        <td <? if($arr[project][s_ww]==""){echo "style=display:none";}?>>&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="25%" <? if($arr[project][s_ww]==""){echo "style=display:none";}?>><strong><img src="sicon/ww.png" width="20" align="absmiddle" /> WANGWANG ID  : </strong>
                          <?=$arr[project][s_ww];?></td>
                        <td width="25%" <? if($arr[project][s_fb]==""){echo "style=display:none";}?>><strong><img src="sicon/fb.png" width="20" align="absmiddle" /> FACEBOOK  : </strong>
                          <?=$arr[project][s_fb];?></td>
                        <td width="25%" <? if($arr[project][s_what]==""){echo "style=display:none";}?>><strong><img src="sicon/wa.png" width="20" align="absmiddle" /> WhatsApp ID  : </strong>
                          <?=$arr[project][s_what];?></td>
                        <td width="25%" <? if($arr[project][s_skype]==""){echo "style=display:none";}?>>&nbsp;</td>
                        <td width="25%" <? if($arr[project][s_ww]==""){echo "style=display:none";}?>>&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
                <tr <? if($arr[project][airin]==""){echo "style=display:none";}?>>
                  <td bgcolor="#FFFFFF" ><strong>
                    <?=book_airin;?>
                    :</strong></td>
                  <td bgcolor="#FFFFFF" <? if($arr[project][airin]==""){echo "style=display:none";}?>><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="150"><strong>
                          <?=book_date;?>
                        </strong> : <span class="style1book1"><?echo $arr[project][airin];?>&nbsp;</span></td>
                        <td width="150"><strong>
                          <?=book_flight;?>
                        </strong> : <span class="style1book1"><? echo $arr[project][airin_f];?></span></td>
                        <td><strong>
                          <?=book_time;?>
                        </strong>: <span class="style1book1"><?echo $arr[project][airin_h];?>.<? echo $arr[project][airin_m];?></span></td>
                      </tr>
                  </table></td>
                </tr>
                <tr <? if($arr[project][airout_f]==""){echo "style=display:none";}?>>
                  <td bgcolor="#FFFFFF" ><strong>
                    <?=book_airout;?>
                    :</strong></td>
                  <td bgcolor="#FFFFFF" <? if($arr[project][airout]==""){echo "style=display:none";}?>><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="150"><strong>
                          <?=book_date;?>
                        </strong> : <span class="style2book1"> <?echo $arr[project][airout];?></span> <strong> </strong></td>
                        <td width="150"><strong>
                          <?=book_flight;?>
                        </strong> : <span class="style2book1"><?echo $arr[project][airout_f];?></span></td>
                        <td><strong>
                          <?=book_time;?>
                        </strong>: <span class="style2book1"><?echo $arr[project][airout_h];?>.<?echo $arr[project][airout_m];?></span></td>
                      </tr>
                  </table></td>
                </tr>
                <tr <? if($arr[project][remark]==""){echo "style=display:none";}?>>
                  <td bgcolor="#FFFFFF" ><strong>
                    <?=book_remark;?>
                  </strong>:</td>
                  <td bgcolor="#FFFFFF" <? if($arr[project][remark]==""){echo "style=display:none";}?>><?=$arr[project][remark];?></td>
                </tr>
                <tr  >
                  <td bgcolor="#FFFFFF" > 
                    <?=booktour_edit;?>
                   </td>
                  <td bgcolor="#FFFFFF"  ><a href="?name=admin&amp;file=booking&amp;op=bookagent_edit&amp;view=edit&amp;id=<? echo $arr[project][id];?>&res_ck=1&country=<?=$_GET[country];?>&province=<?=$_GET[province];?>"><img src="iconstatus/all/edit.png" alt="Edit" width="32" height="32" border="0" /></a></td>
                </tr>
              </table></td>
            </tr>

            <tr>

              <td align="center"><? if($arr[project][status_all]=="0"){



echo "<blink><img src='panel/images/icons/messages/warn.png' /><font size='3' color='#FF0000'>&nbsp;<b>".new_res.".</blink>"; }





?>

                  <br />

                  <strong><a name="showtab" id="showtab"></a></strong><br />

                <table width="100%" border="0" cellspacing="1" cellpadding="0" style="display:<? if($allstatus=="0" or $allno=="0"){



echo "none"; }





?>">

                  <tr>                  </tr>
</table></td></tr>

            <tr>

              <td  class="topic_sup" style="padding:5px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="250"><strong><font size="4">&nbsp;&nbsp;<?=book_reser_new;?>
                  <a name="showtab" id="showtab"></a></strong></td>
                    <td><form id="myformarea" NAME="myformarea" method="post" action="" onsubmit="return checktabarea()">
                      <table width="100%" border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td width="150" valign="middle"><strong><font size="+1" color="#0099CC">
                                <?=profile_country;?>
                            :</strong></td>
                          <td width="74" valign="middle"><select name="tab_country" id="tab_country" style="width:220px; height:25px; size:20px; font-size:16px" onchange="find_tab_area();"   >
                              <option value="" selected="selected">--
                                <?=book_select;?>
                                --</option>
                              <?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[stay_to] = $db->select_query("SELECT * FROM ".TB_country." where total > 0   ");
while ($arr[stay_to] = $db->fetch($res[stay_to])){
 
	   echo "<option value=\"".$arr[stay_to][id]."\"";
	   if($arr[stay_to][id] == $_GET[country]){echo " Selected";}
	   echo ">".$arr[stay_to][name_en]."</option>";
}
 
?>
                          </select></td>
                          <td width="150" valign="middle"><strong><font size="+1" color="#0099CC">
                                <?=book_province;?>
                            :
                            <input name="tab_bookid" type="hidden" id="tab_bookid" style="width:120px; FONT-SIZE:13px; " value="<?=$_GET[id];?>" />
                          </strong></td>
                          <td width="230" id="td_tab_area"><select name="tab_area" id="tab_area" style="width:220px; height:25px; size:20px; font-size:16px"  onchange="MM_jumpMenu('parent',this,0);"    >
                              <?	if(!$_GET[country]) { ?>
                              <option value="" selected="selected">--
                                <?=book_select;?>
                                --</option>
                              <? } ?>
                              <?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[stay_to] = $db->select_query("SELECT * FROM ".TB_province." where country=".$_GET[country]."   and total>0  ");
while ($arr[stay_to] = $db->fetch($res[stay_to])){

 
 
	   echo "<option value=\"index.php?name=admin&file=booking&op=bookagent_edit&view=view&id=".$_GET[id]."&country=210&province=".$arr[stay_to][id]."#showtab\"";
	   if($arr[stay_to][id] == $_GET[province]){echo " Selected";}
	   	   if($_SESSION[lang] == 'cn'){
	   echo ">".$arr[stay_to][name_cn]."</option>";
	   }elseif($_SESSION[lang] == 'th'){
	   echo ">".$arr[stay_to][name_th]."</option>";
	   }else{
	   echo ">".$arr[stay_to][name]."</option>";
	   }
}
 
?>
                          </select></td>
                          <td><!--<input name="tab_changearea" type="submit"  class="mygo" id="tab_changearea" value="<?=button_find;?>" />--></td>
                        </tr>
                      </table>
                                        
										
<script language="JavaScript" type="text/javascript">

function checktabarea() {
 

if(document.myformarea.tab_country.value=="") {
alert("please select country") ;
document.myformarea.tab_country.focus() ;
return false ;
}

else if(document.myformarea.tab_area.value=="") {
alert("please select area") ;
document.myformarea.tab_area.focus() ;
return false ;
}



}

 
				
</script></form> </td>
                  </tr>
                </table></td>
            </tr>

            <tr>

              <td><table id="Table_01" width="100%" border="0" cellpadding="0" cellspacing="0" style="display:<? if($adminlevel == 2 and $admincontrolbook==0 ){ echo "none"; } ?><? if($adminlevel == 1 and $admincompany==83 ){ echo "none"; } ?>">

                  <tr><? if($adminlevel == 2 and $admincontrolbook==0 ){ echo "<blink><br><img src='panel/images/icons/messages/warn.png' /><font size='3' color='#FF0000'>&nbsp;<b>Reservations Area Not Show </blink>";  } ?><? if($adminlevel == 1 and $admincompany==83 ){ echo "<blink><br><img src='panel/images/icons/messages/warn.png' /><font size='3' color='#FF0000'>&nbsp;<b>You can not add new reservations</blink>";  } ?>

                    <td width="20"><img src="images/frame_01.png" width="21" height="29" alt="" /></td>

                    <td background="images/frame_02.png">&nbsp;</td>

                    <td width="23"><img src="images/frame_03.png" width="23" height="29" alt="" /></td>
                  </tr>

                  <tr>

                    <td rowspan="3" background="images/frame_04.png">&nbsp;</td>

                    <td bgcolor="#FFFFFF"  ></td><td rowspan="3" background="images/frame_06.png">&nbsp;</td>
                  </tr>
                  <tr>
                    <td bgcolor="#FFFFFF"  >                   </td>
                  </tr>
                  <tr>
                    <td bgcolor="#FFFFFF" id="td_tab_booking" ><?
					//echo $adminbookopen;

				if($adminlevel == 2   ){	

				include"admin/admin/booking/tab_check/agent.php";					 

					 } 
					 
				if($adminlevel == 1  ){	

				include"admin/admin/booking/tab_check/user.php";				 

					 } 
					 
					 
 
				if($adminlevel > 2 and $_GET[province]   ){

				include"admin/admin/tab/tab.php";					 

					 } 

					 

					 ?></td>
                  </tr>

                  <tr>

                    <td><img src="images/frame_07.png" width="21" height="28" alt="" /></td>

                    <td background="images/frame_08.png">&nbsp;</td>

                    <td><img src="images/frame_09.png" width="23" height="28" alt="" /></td>
                  </tr>

                </table></td>
            </tr>

            <tr>

              <td>&nbsp;</td>
            </tr>

            <tr>

              <td class="topic_content" style="padding:5px;"><table width="100%" border="0" cellspacing="0" cellpadding="0" >

                <tr>

                  <td><strong><font size="4">&nbsp;&nbsp;

                      <?=book_reser_detail;?>

                  </strong></td>

                  <td width="450" align="right"><font size="3"><b><?=booking_search_by;?>&nbsp;:

                    <select name="numcar" size="1" id="numcar" style="width:180px; FONT-SIZE:13px;" onchange="MM_jumpMenu('parent',this,0)"   >

                               <option value="?name=admin&amp;file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=<?=$_GET[id]?>&amp;sort=ondate" <? if($_GET[sort]=='ondate' or !$_GET[sort] ){

	echo "selected=selected";}?>><?=ordersub_ondate;?></option>

                      <option value="?name=admin&amp;file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=<?=$_GET[id]?>&amp;sort=bookdate"<? if($_GET[sort]=='bookdate'){

	echo "selected=selected";}?>><?=ordersub_bookdate;?></option>

                      <option value="?name=admin&amp;file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=<?=$_GET[id]?>&amp;sort=update" <? if($_GET[sort]=='update'){

	echo "selected=selected";}?>><?=ordersub_update;?></option>

                      <option value="?name=admin&amp;file=booking&amp;op=bookagent_edit&amp;view=view&amp;id=<?=$_GET[id]?>&amp;sort=vc" <? if($_GET[sort]=='vc'){

	echo "selected=selected";}?>><?=ordersub_vc;?></option>
                    </select>

                    <?

	if($_GET[sort]=='ondate' or !$_GET[sort] ){

	$booksort="trim(ondate) ASC,trim(airin_h) ASC,trim(airin_m)  ASC";
	

	$sorttopic="Ondate";

	}

	if($_GET[sort]=='bookdate'){

	$booksort="post_date";

	$sorttopic="Booking Date";

	}

	if($_GET[sort]=='update'){

	$booksort="update_date";

	$sorttopic="Update Date";

	}

	if($_GET[sort]=='vc'){

	$booksort="invoice";

	$sorttopic="Voucher Number";

	}

	

	?></td>
                </tr>

              </table></td>
            </tr>

            <tr>

              <td><table width="100%" border="0" cellpadding="0" cellspacing="0" >

                <tr>

                  <td  ><div id = "mydiv" ><span style="background-repeat:no-repeat; background-position:top">

                    <? include"admin/admin/booking/index.php"; ?>

                  </span></div></td>
                </tr>
 
				<tr>

                  <td  ><div id = "mydiv" ><span style="background-repeat:no-repeat; background-position:top">

                    <? include"admin/admin/booking/index_can.php"; ?>

                  </span></div></td>
                </tr>

                

              </table></td>
            </tr>
          </table>

          <table width="100%" border="0" cellspacing="0" cellpadding="0">

            <tr>

              

            </tr>

          </table>

          <table width="100%" border="0" cellspacing="3" cellpadding="0">

            <tr>

              

            </tr>

          </table>

     