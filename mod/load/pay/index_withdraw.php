<?php 
 include('../../../includes/class.mysql.php');

  
  $db = New DB();
  $db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
  
  mysql_query("SET NAMES uft8"); 
  mysql_query("SET character_set_results=uft-8");
//   // $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
//   $res[project] = $db->select_query("SELECT id FROM  web_driver  where  username ='".$_POST[driver]."'");
// $arr[project] = $db->fetch($res[project]);
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[driver] = $db->select_query("SELECT * FROM  web_driver where username  = '".$_COOKIE["app_remember_user"]."' ");
                      
 $arr[driver] = $db->fetch($res[driver]) ;
 
 ?>
      


<div style="font-size: 18px;
    font-weight: 600;
    padding: 0px 10px;
    margin-top: 15px;">ถอนเงินออกจากกระเป๋าเงิน</div>


     
        <table>
          <tr>
            <td width="120" class="font_16" style="height:30px;font-size: 18px;  padding-left:5px;"><? echo t_amount?></td>
            <td width=""   class="font_16" style=" color:#FF0000;font-size: 14px;"> <input class="form-control" placeholder="3xxx" type="text" name="amount" id="amount_w"  style="border-radius: 25px;padding: 0 15px;margin-top: 8px;">
            </td>
           
            
        </tr>
       <!--  <tr>
            <td colspan="2" width="120" class="font_16" style="height:30px;font-size: 14px;  padding-left:5px;">เข้าบัญชี</td>
            
           
            
        </tr> -->
        <!-- <tr>
          <td width="80" class="font_16 " style="height:30px; font-size: 14px; padding-left:5px;"><? echo t_transfer_banks?></td>
          <td width=""   class="font_16 " style="color:#333;font-size: 14px;">
               
                <div > <?= $arr[driver][pay_bank];?></div>
              </td>

          
        </tr>
        <tr>
          <td width="120" class="font_18 " style="height:30px; font-size: 14px; padding-left:5px;">ชื่อบัญชี</td>
          <td ><span style="font-size: 14px;"><?= $arr[driver][pay_bank_name];?></span> </td>
        </tr>
        <tr>
          <td width="120" class="font_18" style="height:30px; font-size: 14px; padding-left:5px;">เลขที่บัญชี</td>
          <td width=""   class="font_16" style="color:#FF0000;font-size: 14px;"> <span>
            <?= $arr[driver][pay_bank_number];?>
          </span>
         
        </td>
          
        </tr> -->
        
        
        <tr>
          <td colspan="2">
            <div style="
    font-size: 16px;>
    text-align: center;
    font-size: 19px;
    font-weight: 600;
    color: red;
    margin-top: 20px;">***หมายเหตุ</div>
          <ul style="    padding-left: 25px;" class="recheck">
            <li>  ทุกการเบิกเงินจะดำเนินการภายใน 24 ชม</li>
            <li> ยอดเงินเข้าบัญชีไม่เกิน 6 โมงเย็น</li>
            <li> การทำรายการถอนเงินในวันหยุด เงินจะเข้าบัญชี ในวันที่ธนานนาคารเปิดทำการ</li>
          </ul>
  </td>
        </tr>
        <tr>
          <td colspan="2" width="100%" onclick="sendwithdraw()" style="    text-align: center;
    background: #3b5998;
    font-size: 18px;
    border-radius: 25px;
    color: #fff;
    padding: 5px 30px;
    border: 2px solid #3b5998;
    margin-bottom: 8px;"><div><? echo t_send ?></div></td>
   </div>
 </td>
        </tr>
        <tr>
          <td colspan="2">
            <div id="money_request">
              
            </div>
            <!-- เงินจะเข้าบัญชีไม่เกิน 6 โมงเย็น -->
            <!-- <?  //include ("mod/booking/load/form/checkin_request.php");?> -->
          </td>
        </tr>
      </table>
    
      <input class="form-control"  type="hidden" name="amount" id="amount_w" >
      <input class="form-control"  type="hidden" name="amount" id="bank_name" value="<?= $arr[driver][pay_bank_name];?>">
      <input class="form-control"  type="hidden" name="amount" id="bank_number" value="<?= $arr[driver][pay_bank_number];?>">
      <input class="form-control"  type="hidden" name="amount" id="pay_bank" value="<?= $arr[driver][pay_bank];?>">
      
      <style>
        .recheck li{
              padding: 8px 5px;
        }
      </style>