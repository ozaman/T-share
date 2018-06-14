<style>
.form_input {
    padding: 5px 22px;
    height: 34px;
    border: solid #3b5998 1px;
    border-radius: 25px;
    width: 100%;
    font-size: 18px;
    display: block;
    line-height: 1.42857143;
    color: #333333;
    background-color: #fff;
    background-image: none;
}
</style>
<div style="border-radius: 10px;
    border: 1px solid rgb(221, 221, 221);
    background-color: rgb(255, 255, 255);
    margin-bottom: 0px;
    box-shadow: rgb(218, 218, 218) 0px 0px 5px;
    padding: 15px;
    margin-top: 8px;" id="selected_taxi">
    <div class="form-group">
          <label>เวลาถึงโดยประมาณ(นาที)</label>
          <input type="number" class="form_input" required="true" id="time_num" name="time_num">
        </div>
        <span class="font-22">จะถึงใน <span id="show_to_time" style="color: #ff0000;"><?=date('H:i');?></span> น.</span>
    </div>
    <div style="padding: 10px;margin-top: 10px;" align="center">
    <button onclick="saveTime('<?=$_GET[id];?>');" style="
    border: 1px solid #3b5998;
    background-color: #fff;
    padding: 7px;
    box-shadow: 2px 2px 7px #ddd;
    width: 200px;" class="font-22">บันทึกข้อมูล</button>
    </div>
    <script>
    
    	$( "#time_num" ).keyup(function() {
    		
    		var m = $(this).val();
    		if(m==""){
				return;
			}
    		var d = new Date();
    		var cur_m = d.getMinutes();
    		 var dd = new Date();
    		 var last = parseInt(cur_m) + parseInt(m);
   		 	dd.setMinutes(last);
    		console.log(dd);
    		$('#show_to_time').text(formatTime(dd));
		});
	
	function saveTime(id){
		var time = $('#time_num').val();
		var total_time = $('#show_to_time').text();
		swal({
		  title: "ยืนยันการเปลี่ยนเวลา",
		  text: "จะถึงในอีก "+time+" นาที เป็นเวลา "+total_time+" น.",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-success",
		  confirmButtonText: "ยืนยัน",
		  cancelButtonText: "ยกเลิก",
		  closeOnConfirm: false
		},
		function(){
			var url = "mod/booking/shop_history/php_shop.php?update=update_time_toplace";
			$.post(url,{ order_id:id, time:time },function(res){
				console.log(res);
				if(res.result==true){
					$('#time_toplace_'+id).text("เวลาถึงโดยประมาณ "+total_time);
					$('#btn_edit_time_'+id).hide();
					swal("ยืนยันสำเร็จ!", "เปลี่ยนเวลาถึงสถานที่แล้ว", "success");
				}else{
					swal("ไม่สามารถเปลี่ยนเวลาได้!", "", "success");
				}
			});
//		  swal("Deleted!", "Your imaginary file has been deleted.", "success");
		});
	}
    </script>