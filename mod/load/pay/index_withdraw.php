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
 $res[driver] = $db->select_query("SELECT * FROM  web_driver where username  = '".$_COOKIE["app_remember_user"]."' ");
                      
 $arr[driver] = $db->fetch($res[price]) ;
 
 ?>
      


<div style="font-size: 18px;
    font-weight: 600;
    padding: 0px 10px;
    margin-top: 15px;"><? echo t_transferred_account_details?></div>
<div  style="margin-top: 15px;
    padding: 8px;
    border-radius: 15px;
}
">


 
            
<table width="100%"  border="0" cellspacing="2" cellpadding="2"  >
  <tr >
     
     <td>
      <div >
        <table>
        <tr>
          <td width="80" class="font_18 " style="height:30px;  padding-left:5px;"><? echo t_transfer_banks?></td>
          <td width=""   class="font_16 " style="color:#333;font-size: 16px;">
            <!-- <select class="form-control" name="bank" id="bank" style="border-radius: 25px;padding: 0 15px;">   -->           
                <div > <?= $arr[driver][pay_bank];?></div>
            <!-- </select> -->
                 
        </td>
          
        </tr>
        <tr>
          <td width="80" class="font_18 " style="height:30px;  padding-left:5px;"><? echo t_today?></td>
          <td>
    
       <div class="input-group date" style="padding:0px;width: 100%">
          <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_request" id="date_request"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:16px;z-index: 0;padding:10px;width: 100%;border-radius: 25px;margin-top: 8px;"  >               
          <!-- <div class="input-group-addon"  id="btn_calendar2" style="cursor:pointer "> -->
             <i class="fa fa-calendar icon_calendar" style="pointer-events: none;
    position: absolute;
    font-size: 22px;
    padding: 8px;
    right: 9px;
    border-left: 1px solid #ddd;margin-top: 8px;"></i> 
         <!--  </div> -->
       </div>
    
 </td>
        </tr>
        <tr>
          <td width="80" class="font_18" style="height:30px;  padding-left:5px;"><? echo t_minutes?></td>
          <td width=""   class="font_16" style="color:#FF0000;font-size: 16px;"> <input type="text" placeholder="xx:xx" class="form-control" name="time" id="time" style="border-radius: 25px;padding: 0 15px;margin-top: 8px;">
          </td>
          
        </tr>
        <tr>
            <td width="80" class="font_18" style="height:30px;  padding-left:5px;"><? echo t_amount?></td>
            <td width=""   class="font_16" style=" color:#FF0000;font-size: 16px;"> <input class="form-control" placeholder="3xxx" type="text" name="amount" id="amount"  style="border-radius: 25px;padding: 0 15px;margin-top: 8px;">
            </td>
        </tr>
        <tr>
          <td colspan="2"><div style="
    text-align: center;
    font-size: 19px;
    font-weight: 600;
    margin-top: 20px;"><? echo t_money_transfer_slip?></div></td>
        </tr>
        <tr>
          <td colspan="2">
            <div id="money_request">
              
            </div>
            <!-- <?  //include ("mod/booking/load/form/checkin_request.php");?> -->
          </td>
        </tr>
      </table>
  <!-- <input type="submit" onclick="change_request()" value="Submit" style="margin-top: 15px;
    float: right;
    margin-right: 20px;
    background: #3b5998;
    color: #fff;
    font-size: 16px;
    border: none;
    height: 35px;
    padding: 8px 36px;
    border-radius: 25px">
 --></div>
      
      
     </td>
  </tr>
</table>
            
  </div>