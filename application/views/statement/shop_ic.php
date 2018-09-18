<?php 
		$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
		$thai_month_arr=array(
		    "0"=>"",
		    "1"=>"มกราคม",
		    "2"=>"กุมภาพันธ์",
		    "3"=>"มีนาคม",
		    "4"=>"เมษายน",
		    "5"=>"พฤษภาคม",
		    "6"=>"มิถุนายน", 
		    "7"=>"กรกฎาคม",
		    "8"=>"สิงหาคม",
		    "9"=>"กันยายน",
		    "10"=>"ตุลาคม",
		    "11"=>"พฤศจิกายน",
		    "12"=>"ธันวาคม"                 
		);
		function thai_date($time,$type){
		    global $thai_day_arr,$thai_month_arr;
		    $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
		    $thai_date_return.= "ที่ ".date("j",$time);
		    $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
		    $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
		    $thai_date_return.= "  ".date("H:i",$time)." น.";
		    if($type=="y"){
				return "พ.ศ.".(date("Yํ",$time)+543);
			}else if($type=="m"){
				return "เดือน".$thai_month_arr[date("n",$time)];
			}else if($type=="d"){
				return "วันที่ ".date("j",$time);
			}else{
				return $thai_date_return;
			}
		}
		$select = "SELECT * FROM order_booking where drivername = '".$_COOKIE[detect_user]."' order by transfer_date desc ";
		$query = $this->db->query($select); ?>

<ons-card class="card" style="margin-bottom: 20px">
  <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
              <img src="assets/images/ex_card/crd.png?v=1537169817" width="25px;">
            </div>
            <div class="center list-item__center" style="background-image: none;">
                 <label class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'จังหวัด', 'open':'user_province'}, 'lift-ios')">
	                <span id="txt_user_province" style="color: #000;margin-left: 0px;" >เดือน <?=$thai_month_arr[date("n",time())]." "."พ.ศ.".(date("Yํ",time())+543);?></span>
	                	<br/>
	                 <input type="hidden" name="province" id="province" value="" />
	            </label>
                <span style="color: #afafaf;  font-size: 13px;   position: absolute;  right: 45px;">เลือกวันที่</span>  
            </div>
            
        </ons-list-item>
<!-- <input type="date" class="form-control" value="" name="date_report" id="date_report" > -->
</ons-card>	

<?php	foreach ($query->result() as $row){ ?>
       	
			 <ons-list>
			    <ons-list-header style="font-size: 12px;font-weight: 500;"><?=thai_date(strtotime($row->transfer_date),'d');?></ons-list-header>
			    <ons-list-item style="padding-left: 16px;">Item A</ons-list-item>
			    <ons-list-item style="padding-left: 16px;">Item B</ons-list-item>
			</ons-list>
		
<?php		}
?>

<script>
	function fileterDate(id){
		console.log($('#'+id).val());
	}
</script>