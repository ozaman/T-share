     
<?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[car] = $db->select_query("SELECT * FROM   web_carall  where id='".$_GET[car]."' order by id desc  ");
	///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
 $arr[car] = $db->fetch($res[car]);
 
?>
 <script>

var car_color=$('#car_color').val();
var car_type=$('#car_type').val();

var car_plate=$('#car_plate').val();



  $('#detail_step_2').html("รถ"+car_type+"&nbsp;สี"+car_color+"&nbsp;ทะเบียน&nbsp;"+car_plate);

</script>
     
  <table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tbody>
    <tr>
      <td width="40%" align="center">                   
                  <div class="topicname">ประเภท</div>
                  <select class="form-control" name="car_type" id="car_type">
                    <option value="เก๋ง"  <? if($arr[car][car_type]=='1'){ echo 'selected=selected';} ?>  >เก๋ง</option>
                    <option value="ตู้" <? if($arr[car][car_type]=='2'){ echo 'selected=selected';} ?>>ตู้</option>
                    
                     <option value="บัส" <? if($arr[car][car_color]=='3'){ echo 'selected=selected';} ?>>บัส</option>
                     
                 <option value="suv" <? if($arr[car][car_color]=='suv'){ echo 'selected=selected';} ?>>suv</option>
                      <option value="ตุ๊กๆ" <? if($arr[car][car_color]=='tuk'){ echo 'selected=selected';} ?>>ตุ๊กๆ</option>
                      <option value="สองแถว" <? if($arr[car][car_color]=='songtaw'){ echo 'selected=selected';} ?>>สองแถว</option>
                       <option value="อื่นๆ" <? if($arr[car][car_color]=='other'){ echo 'selected=selected';} ?>>อื่นๆ</option>

                  </select></td>
      <td width="30%" align="center"><div class="topicname">สีรถ</div>
        <select class="form-control" name="car_color" id="car_color">
          <option value="ขาว"  <? if($arr[car][car_color]=='White'){ echo 'selected=selected';} ?>  >ขาว</option>
          <option value="ดำ" <? if($arr[car][car_color]=='Black'){ echo 'selected=selected';} ?>>ดำ</option>
          <option value="เหลือง" <? if($arr[car][car_color]=='Yellow'){ echo 'selected=selected';} ?>>เหลือง</option>
          <option value="เขียว" <? if($arr[car][car_color]=='Green'){ echo 'selected=selected';} ?>>เขียว</option>
          <option value="แดง" <? if($arr[car][car_color]=='Red'){ echo 'selected=selected';} ?>>แดง</option>
          <option value="เทา" <? if($arr[car][car_color]=='Gray'){ echo 'selected=selected';} ?>>เทา</option>
          <option value="บรอนด์ทอง" <? if($arr[car][car_color]=='Golden Bronze'){ echo 'selected=selected';} ?>>บรอนด์ทอง</option>
          <option value="บรอนด์เงิน" <? if($arr[car][car_color]=='Silver Bronze'){ echo 'selected=selected';} ?>>บรอนด์เงิน</option>
        </select></td>
      <td width="30%" align="center"> 
        <div class="topicname">ทะเบียน</div>
<input name="car_plate" type="text"   required="true" class="form-control" id="car_plate"  onkeypress="UserEnter(this,event)" value="<?=$arr[car][plate_num]?>"    >
        
        
        
        
      </td>
      </tr>
  </tbody>
</table>
