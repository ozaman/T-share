
      


<!-- <div style="font-size: 18px;
    font-weight: 600;
    padding: 0px 10px;
    margin-top: 15px;">ประวัตถอน-โอน-แจ้งโอน</div> -->

<div style=" padding: 8px; border-radius: 15px;">

        <table  width="100%"  border="0" >
                   
        <tr>
          <td colspan="2">
            <div class="form-group" style="margin-bottom:5px;">
      <div class="input-group date" style="padding:0px;">
         <input type="text" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_report" id="date_report_logs"  readonly="true" style="background-color:#FFFFFF; height:40px; font-size:24px;z-index: 0;"  >               
         <div class="input-group-addon"  id="btn_calendar_logs" style="cursor:pointer ">
            <i class="fa fa-calendar" style="font-size:26px; " id="icon_calendar"></i> 
         </div>
      </div>
      <!-- /.input group -->
   </div>
          </td>
        </tr>
      </table>
      <div id="body_bank_logs" style="padding: 15px 0px;">
        
      </div>
      <input class="form-control"  type="hidden" name="amount" id="amount_w" >
      <input class="form-control"  type="hidden" name="amount" id="bank_name" value="<?= $arr[driver][pay_bank_name];?>">
      <input class="form-control"  type="hidden" name="amount" id="bank_number" value="<?= $arr[driver][pay_bank_number];?>">
      <input class="form-control"  type="hidden" name="amount" id="pay_bank" value="<?= $arr[driver][pay_bank];?>">
      
      <style>
        .recheck li{
              padding: 8px 5px;
        }
        .wait{
          color: #ff9800;
        }
        .success{
          color: #4caf50;
        }
       .box_index{
           position: absolute;
    right: 19px;
    color: #ffffff;
    background-color: #3b5998;
    padding: 5px 15px;
    font-size: 16px;
    border-radius: 0px 8px 0px 33px;
        }
      </style>
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
 -->
            
  </div>
  <link rel="stylesheet" type="text/css" href="pickerdate/classic.css?v=<?=time();?>" />
   <link rel="stylesheet" type="text/css" href="pickerdate/classic.date.css?v=<?=time();?>" />
   <script src="pickerdate/picker.js?v=<?=time();?>" type="text/javascript"></script>
   <script src="pickerdate/picker.date.js?v=<?=time();?>" type="text/javascript"></script>
  <script >
    $('#btn_calendar_logs').click(function(){
      //    alert();
      var input1 = $('#date_report_logs').pickadate(); 
         var picker = input1.pickadate('picker');
         setTimeout(function(){ picker.open(true); }, 500);
      });
    var date=$('#date_report_logs').val();
    //console.log(date)
          $('#date_report_logs').pickadate({
              format: 'yyyy-mm-dd',
              formatSubmit: 'yyyy/mm/dd',
              closeOnSelect: true,
              closeOnClear: false,
              "showButtonPanel": false,
              onStart: function() {
                  this.set('select', date); // Set to current date on load
              //calllogsdepositManage()
              },
            onSet: function(context) {
                calllogsdepositManage()
            }
              });

          function calllogsdepositManage(){
      var date = $('#date_report_logs').val();
      console.log(date)
      $('#body_bank_logs').html(' ')
      $.ajax({
            type: 'POST',
            url: 'mod/load/pay/action_logs.php?action=deposit_logs&driver=<?=$_COOKIE["app_remember_user"];?>',
            data: {'qr':'date','date':date },
            //contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                console.log(data)
                if (data == null) {
                    $('#body_bank_logs').html('<div class="font-26" style="color: #ff0000;display: nones;" id="no_work_div" ><strong>ไม่มีประวัติ</strong></div>');
                  return;
                }
                else{
                  $.each(data, function( index, value ) {
        console.log(value);
          var id = "btn_"+index;
          var amount = value.deposit;
          var timestamp = value.post_date,
date = new Date(timestamp * 1000),
datevalues = date.getHours()+':'+date.getMinutes();
var type = '';
var status;
if (value.status == 0) {
  status = 'รอยืนยัน';
  btnclass = 'wait'

}
else{
  status = 'สำเร็จ';
  btnclass = 'success'

}

if (value.type == 'ADD') {
  type = 'โอน'
}
if (value.type == 'WITHDRAW') {
  type = 'ถอน'
}
if (value.type == 'APPROVEJOB') {
  type = 'จ่ายค่ารับงาน'
}
var index_item = index+1;
          var component2 = '<div class="box_index">'+index_item+'</div>'
          +'<div style="padding: 5px 10px; border: 1px solid #3b5998; margin-bottom:10px;    border-radius: 8px;box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12), 0 3px 1px -2px ">'
        +'<table width="100%"  border="0" cellspacing="2" cellpadding="2">'        
        +'<tr>'
          +'<td width="120" class="font_18 " style="height:30px;  padding-left:5px;">ธนาคารที่รับโอน</td>'
          +'<td width=""   class="font_16 " style="color:#333;font-size: 16px;">'
                +'<div >'+value.deposit_bank+' </div>'
        +'</td>'          
        +'</tr>'
        +'<tr>'
          +'<td width="120" class="font_18 " style="height:30px;  padding-left:5px;">ชื่อบัญชี</td>'
          +'<td>'    
       +'<div class="input-group date" style="padding:0px;width: 100%">'
          +'<span>'+value.bank_account+' </span>'
       +'</div>'    
 +'</td>'
        +'</tr>'
        +'<tr>'
          +'<td width="120" class="font_18" style="height:30px;  padding-left:5px;">เลขที่บัญชี</td>'
          +'<td width=""   class="font_16" style="font-size: 16px;"> '
            +'<span>'+value.bank_number.toString()+'</span>'
          +'</td>'
        +'</tr>'
        +'<tr>'
          +'<td width="120" class="font_18" style="height:30px;  padding-left:5px;">วันที่ทำการ</td>'
          +'<td width=""   class="font_16" style="font-size: 16px;"> '
            +'<span>'+value.post_date_f+'</span>'
          +'</td>'
        +'</tr>'
         +'<tr>'
          +'<td width="120" class="font_18" style="height:30px;  padding-left:5px;">เวลาทำการ</td>'
          +'<td width=""   class="font_16" style="font-size: 16px;"> '
            +'<span>'+ datevalues+'</span>'
          +'</td>'
        +'</tr>'
        +'<tr>'
            +'<td width="120" class="font_18" style="height:30px;  padding-left:5px;"><? echo t_amount?></td>'
            +'<td width="" class="font_16" style=" color:#FF0000;font-size: 16px;">'
           +'<span>'+amount.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ' '+' บาท' + '</span>'
            +'</td>'
        +'</tr>'
         +'<tr>'
          +'<td width="120" class="font_18" style="height:30px;  padding-left:5px;">ประเภท</td>'
          +'<td width=""   class="font_16" style="font-size: 16px;"> '
            +'<span style=" color:#FF0000;font-size: 16px;">'+ type+'</span>'
          +'</td>'
        +'</tr>'
         +'<tr>'
          +'<td width="120" class="font_18" style="height:30px;  padding-left:5px;">สถานะ</td>'
          +'<td width=""   class="font_16" style="font-size: 16px;"> '
            +'<span class="'+btnclass+'"style="font-size: 16px;">'+ status+'</span>'
          +'</td>'
        +'</tr>'
      +'</table>'
  +'</div>'
        
          $('#body_bank_logs').append(component2);
          });

                }
                
            }
        });
      // var driver = $('#driver').val();
  //   $.post("mod/load/pay/action_logs.php?action=deposit_logs&driver=<?=$_COOKIE["app_remember_user"];?>",{qr:'date', date:date},function(res){
  //       console.log(res);
  //       // var m = [];
  //       // if(res_api_hit.status=="200"){
  //       //     manageObj = res_api_hit.data.result;
  //       //     console.log("manage : "+manageObj.length)
  //       //     if(manageObj.length>0){
  //       //     $('#number_manage').text(manageObj.length);
            
  //       //   }
  //       //   eachObjManage();
  //       //   }
  // });
  }
  </script>