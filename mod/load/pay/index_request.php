<div  style="padding-top:0px; padding:5px;margin-top: 50px; ">

<table width="100%"  border="0" cellspacing="0" cellpadding="0"  >
  <tr align="center">
    <td width="49%"><div id="transfer_money" onclick="transfer_money()" style="
        background: #fff;
        font-size: 18px;
        border-radius: 25px;
        color: #3b5998;
        padding: 5px 30px;
        border: 2px solid #3b5998;



    ">โอนเงิน</div></td>
        <td width="2%"></td>
    <td width="49%" ><div id="requet_money" onclick="request_money()" style="background: #3b5998;
        font-size: 18px;
        border-radius: 25px;
        color: #fff;
        padding: 5px 30px;
        border: 2px solid #3b5998; ">แจ้งโอน</div></td>
   
  </tr>
</table>
            
</div>
<div style="font-size: 18px;
    font-weight: 600;
    padding: 0px 10px;
    margin-top: 15px;">รายละเอียดบัญชีรับโอน</div>
<div  style="margin-top: 15px;
    padding: 8px;
    border-radius: 15px;
}
">


 
            
<table width="100%"  border="0" cellspacing="2" cellpadding="2"  >
  <tr >
     
     <td>
      <form action="/action_page.php" method="get">
        <table>
        <tr>
          <td width="80" class="font_18 " style="height:30px;  padding-left:5px;">ธนาคารที่โอน</td>
          <td width=""   class="font_16 " style="padding-right:10px; color:#333;font-size: 16px;">
            <select class="form-control" style="border-radius: 25px;padding: 0 15px;">             
                <option value="bank"> ไทยภานิชย์(SCB) </option>
            </select>
                 
        </td>
          
        </tr>
        <tr>
          <td width="80" class="font_18" style="height:30px;  padding-left:5px;">เวลา</td>
          <td width=""   class="font_16" style="padding-right:10px; color:#FF0000;font-size: 16px;"> <input type="text" class="form-control" name="time" style="border-radius: 25px;padding: 0 15px;">
          </td>
          
        </tr>
        <tr>
            <td width="80" class="font_18" style="height:30px;  padding-left:5px;">จำนานเงิน</td>
            <td width=""   class="font_16" style="padding-right:10px; color:#FF0000;font-size: 16px;"> <input class="form-control" type="text" name="fname" value="amount" style="border-radius: 25px;padding: 0 15px;">
            </td>
        </tr>
      </table>
  <input type="submit" value="Submit" style="margin-top: 15px;
    float: right;
    margin-right: 20px;
    background: #3b5998;
    color: #fff;
    font-size: 16px;
    border: none;
    height: 35px;
    padding: 8px 36px;
    border-radius: 25px">
</form>
      
      
     </td>
  </tr>
</table>
            
  </div>
  <script>
$('.text-topic-action-mod').html('แจ้งโอน');
  </script>