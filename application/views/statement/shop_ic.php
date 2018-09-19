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
		
		/*$select = "SELECT t1.*,t2.topic_th as product_name FROM order_booking as t1 left join shopping_product as t2 on t1.program = t2.id where t1.status LIKE 'COMPLETED' and  t1.drivername = '".$_COOKIE[detect_user]."' and (MONTH(t1.transfer_date) = '".date('m')."' and YEAR(t1.transfer_date) = '".date('Y')."')  order by t1.transfer_date desc  ";
		$query = $this->db->query($select);*/
		
		 ?>
<ons-card class="card" style="margin-bottom: 20px">
  		<ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left" style="margin-left: 4px; padding-right: 12px;">
              <img src="assets/images/ex_card/crd.png?v=1537169817" width="25px;">
            </div>
            <div class="center list-item__center" style="background-image: none;">
                 <input class="ap-date" type="month" id="month" name="month" value="<?=date('Y-m',time());?>" style="font-size: 18px;width: 100%;padding: 4px 15px; border: 1px solid #ccc;border-radius: 20px;" onchange="filterMonth($(this).val());" />
            </div>
            
        </ons-list-item>

</ons-card>	
<!--<ons-progress-circular class="progressStyle" indeterminate="" modifier="indeterminate ios"><svg class="progress-circular progress-circular--indeterminate progress-circular--ios">
    <circle class="progress-circular__background progress-circular--indeterminate__background progress-circular--ios__background"></circle>
    <circle class="progress-circular__secondary progress-circular--indeterminate__secondary progress-circular--ios__secondary" cx="50%" cy="50%" r="40%" style="display: none;"></circle>
    <circle class="progress-circular__primary progress-circular--indeterminate__primary progress-circular--ios__primary" cx="50%" cy="50%" r="40%"></circle>
  </svg>
 </ons-progress-circular>-->
<ons-list id="body_list_ic_shop" >
	
</ons-list>
