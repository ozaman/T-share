<link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css"> 
<!-- <script src="js/jquery-main.js"></script>  -->
<!-- <script   src="calendar/js/th.js"></script> -->


 <!-- <script   src="calendar/js/th.js"></script> -->

<link rel="stylesheet" type="text/css" href="pickerdate/classic.css?v=<?=time();?>" /> 
<link rel="stylesheet" type="text/css" href="pickerdate/classic.date.css?v=<?=time();?>" /> 
<script src="pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
<script src="pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script>
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



    "><?echo t_transfers?></div></td>
        <td width="2%"></td>
    <td width="49%" ><div id="requet_money" onclick="request_money()" style="background: #3b5998;
        font-size: 18px;
        border-radius: 25px;
        color: #fff;
        padding: 5px 30px;
        border: 2px solid #3b5998; "><? echo t_transfer_notice?></div></td>
   
  </tr>
</table>
            
</div>
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
            <select class="form-control" name="bank" id="bank" style="border-radius: 25px;padding: 0 15px;">             
                <option > ไทยพานิชย์(SCB) </option>
            </select>
                 
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
  <script>
     var url_load= "go.php?name=booking/load/form&file=checkin_request&id=<?=$_COOKIE["app_remember_user"];?>&type=money_request";
      
        $('#money_request').html(load_main_mod);
     
        $('#money_request').load(url_load); 
    var date=$('#date_request').val();
//console.log(date)

// $("#icon_camera_checkin").click(function(){  
 
//   document.getElementById('upload_pic_type').value='<?=$_GET[type]?>';
 
//   $("#load_chat_camera").click(); 
  
//   });
    $('#date_request').pickadate({
        format: 'yyyy-mm-dd',
        formatSubmit: 'yyyy/mm/dd',
        closeOnSelect: true,
        closeOnClear: false,
        "showButtonPanel": false,
        onStart: function() {
          console.log(date)
            this.set('select', date); // Set to current date on load
            var url_place_th = "go.php?name=load/pay&file=index_job&server=th&driver=<?=$_COOKIE["app_remember_user"];?>&date="+date;
   $('#load_th').show();
   //$('#load_th').load('load/page/loading.php');
    $('#load_th').load(url_place_th); 
   
        },
      onSet: function(context) {
             var date=$('#date_request').val();
          var url_place_th = "go.php?name=load/pay&file=index_job&server=th&driver=<?=$_COOKIE["app_remember_user"];?>&date="+date;
   $('#load_th').show();
   //$('#load_th').load('load/page/loading.php');
    $('#load_th').load(url_place_th); 

  
  
  
  

          //QueryData();
      }
        });
$('.text-topic-action-mod').html('<?echo t_transfer_notice?>');

  </script>