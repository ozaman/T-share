
<div style="font-size: 18px;
    font-weight: 600;
    padding: 0px 10px;
    margin-top: 15px;">คุณต้องการเติมเงินไปยังบัญชี
      
    </div>
<div  style="margin-top: 15px;
    padding: 5px;
    /*border: 1px solid #3b5998;*/
    border-radius: 15px;
">


 <?php 
 include('../../../includes/class.mysql.php');

  
  $db = New DB();
  $db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
  
  mysql_query("SET NAMES utf8"); 
  mysql_query("SET character_set_results=utf-8");
//   // $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
//   $res[project] = $db->select_query("SELECT id FROM  web_driver  where  username ='".$_POST[driver]."'");
// $arr[project] = $db->fetch($res[project]);
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[price] = $db->select_query("SELECT * FROM  deposit where username  = '".$_COOKIE["app_remember_user"]."' ");
                      
 $arr[price] = $db->fetch($res[price]) ;
 
 ?>
            
<!-- <table width="100%"  border="0" cellspacing="2" cellpadding="2"  >
  <tr >
     
     <td>
      <table>
        <tr>
          <td width="80" class="font-22" style="height:30px;  padding-left:5px;"><? echo t_bank_name?></td>
          <td width=""   class="font-22" style="padding-right:10px; color:#FF0000;font-size: 16px;">
          
             ไทยภานิชย์(SCB)         
              </td>
          
        </tr>
        <tr>
          <td width="80" class="font-22" style="height:30px;  padding-left:5px;"><? echo t_account_number?></td>
          <td width=""   class="font-22" style="padding-right:10px; color:#FF0000;font-size: 16px;">8572088605
          </td>
          
        </tr>
        <tr>
            <td width="80" class="font-22" style="height:30px;  padding-left:5px;"><? echo t_account_name?></td>
            <td width=""   class="font-22" style="padding-right:10px; color:#FF0000;font-size: 16px;">goldenbeachgroup
            </td>
        </tr>
      </table>
      
     </td>
  </tr>
</table> -->
<table width="100%"  border="0" cellspacing="2" cellpadding="2">
           <tr>
          <td width="100%">
            <div style="padding: 0px 10px;">
         
<?php 
$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
$select = "SELECT * FROM web_bank where status = 1  ";
$res[bank] = $db->select_query($select);
while($arr[bank] = $db->fetch($res[bank])){ 
// $res[ct] = $db->select_query("SELECT * FROM ".TB_carall_type." WHERE id='".$arr[car][car_type]."' ");
// $arr[ct] = $db->fetch($res[ct]);

if($arr[bank][bank_company]=="ธนาคารไทยพาณิชย์"){
$plate_color="4b2885"; 
$bank = 'thbanks-scb';
} 
 if($arr[bank][bank_company]=="ธนาคารกสิกรไทย"){
 $plate_color="00a950"; 
$bank = 'thbanks-kbank';

} 
 if($arr[bank][bank_company]=="ธนาคารกรุงเทพ"){
 $plate_color="223d98"; 
$bank = 'thbanks-bbl';

 } 
?>
  <a id="car_<?=$arr[bank][id];?>" style="text-decoration:none; margin-top:30px;" onclick="selectCar('<?=$arr[bank][id];?>','<?=$arr[bank][bank_company];?>','<?=$arr[bank][bank_number];?>');">
      <table width="100%" border="0" cellspacing="2" cellpadding="2" id="div_car_<?=$arr[bank][id];?>">
               
                  <tr>
                     <td >
                        <table width="100%" cellpadding="1" cellspacing="2">
                         
                           <tr>
                           <td width="100" align="center" bgcolor="<?=$plate_color;?>" style="color: #DADADA;
    padding: 5px; border-radius: 10px;"><i class="thbanks <?=$bank?>" aria-hidden="true"></i><font color="#FFFFFF" class="font-20"><?=$arr[bank][bank_company];?><br>
                                 <font class="font-20"><?=$arr[bank][bank_number];?></font></font>
                              </td>
                           </tr>
                        
                        </table>
                        
                     </td>
                     <td width="50" align="center">
                      <label class="container">
            <input type="checkbox" name="car" id="bank_use_<?=$arr[bank][id];?>" value="1">
            <span class="checkmark"></span>
          </label>
                     </td>
                  </tr>
              
            </table>
    </a>
<? } ?>
<input id="bankid" value="" type="hidden" />
<input id="bank_company" value="" type="hidden" />
<? //echo $select; ?>

          </div>
          </td>
         </tr>
            </tbody>
         </table>
     
   </div>
</div>



<div style="    margin-top: 10px;
    background-color: #fff;
    text-align: center;
    /*border: 1px solid #3b5998;*/
    width: 87%;
    border-radius: 25px;
    padding: 8px;
    color: #3b5998;
    transform: translate(-50%,-50%);
    position: fixed;
    left: 50vw;
    bottom: 1vh;">
<div onclick="selectbank()" style="margin-top:10px;background-color: #fff;text-align: center;border: 1px solid #3b5998;width: 100%;border-radius: 25px;padding: 8px;color: #3b5998; "><span class="font-24"><strong>ยืนยันเติมเงิน</strong></span> </div>
</div>


  
</div>  

<script>
//  $('#back-full-popup').fadeOut(500);
$('#show_main_tool_bottom').fadeOut(500);

function selectCar(id,company,number){
    // swal('คุณเลือกธนาคาร'+company,'เลขที่บัญชี '+number,'','warning');
//  $('#car_use_'+id).click();
//  
  $('input[type="checkbox"]').prop('checked', false); // Unchecks it
  $('#bank_use_'+id).prop('checked', true); // Checks it
  $('#bankid').val(id);
  swal({
     title: 'คุณเลือกธนาคาร'+company,
     text: 'เลขที่บัญชี '+number,
     type: "warning",
     confirmButtonClass: "btn-primary",
     confirmButtonText: "ยืนยัน",   
     closeOnConfirm: true
   },
   function(){
   });
}

  </script>
  <style>
  .thbanks-scb {
    color: #4b2885 !important;
    background-color: #ffffff !important;
    font-size: 21px;
    padding: 6px;
    border-radius: 50px;
    position: absolute;
    left: 40px;
}
.thbanks-bbl {
    color: rgb(34, 61, 152);
    background-color: #ffffff !important;
    font-size: 21px;
    padding: 6px;
    border-radius: 50px;
    position: absolute;
    left: 40px;
}
.thbanks-kbank {
    color: rgb(0, 169, 80) !important;
    background-color: #ffffff !important;
    font-size: 21px;
    padding: 6px;
    border-radius: 50px;
    position: absolute;
    left: 40px;
}
/* The container */
h2{
      font-size: 20px;
}
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
  border-radius : 20px;
    position: absolute;
    top: -4px;
    left: 0;
    height: 30px;
    width: 30px;
    background-color: #e4e4e4;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 11px;
    top: 6px;
    width: 9px;
    height: 15px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}

</style>