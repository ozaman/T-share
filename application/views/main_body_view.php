
<div style="margin-top: 10px;padding: 5px;" >
<ons-row style="margin: 10px 0px;">
  <ons-col style="margin: 10px;">
	  <center>
	  	<div onclick="beforeSendShop();" class="circle-menu-home" style="background-color: #34A0E7;" >
	      <span id="number_shop" class="badge badge-custom font-18 pulse" style="display: none;">0</span>
	      <div class="content">
	     	<i class="icon-new-uniF14D" style="font-size: 24px;position: relative; top: 7px; left: 2px;"></i>
	      </div>
	    </div>
	    <span class="txt-dark">ส่งแขก</span>
	    </center>
  </ons-col>
	<?php 
	if ($_COOKIE['detect_userclass'] != 'lab') {
		# code...
	

	?>
  <ons-col style="margin: 10px;">
   <center>
	  	<div onclick="sendTransfer();" class="circle-menu-home" style="    background-color: #F7941D;">
	  	  <span id="number_tbooking" class="badge badge-custom font-18 pulse" style="">0</span>
	      <div class="content">
	     	<i class="icon-new-uniF10A-9" style="font-size: 28px;position: relative; top: 7px; left: 0px;"></i>
	      </div>
	    </div>
	    <span class="txt-dark">ให้บริการรถ</span>
   </center>
</ons-col>
<?php } ?>
</ons-row>

<ons-row style="margin: 10px 0px;">
  <ons-col style="margin: 10px;">
	  <center>
	  	<a href="https://www.welovetaxi.com/app/booking2/">
	  	<div onclick="//booking();" class="circle-menu-home" style="    background-color: #1CC1A4;" >
	      
	      <div class="content">
	     	<i class="fa fa-taxi" style="font-size: 24px;position: relative; top: 7px; left: 0px;"></i>
	      </div>
	    </div>
	    <span class="txt-dark">เรียกรถ</span>
	    </a>
	    </center>
  </ons-col>

  <ons-col style="margin: 10px;">
   <center>
	  	<div onclick="tour();" class="circle-menu-home" style="    background-color: #8DC63F;">
	      <div class="content">
	     	<i class="fa fa-suitcase" style="font-size: 28px;position: relative; top: 7px; left: 0px;"></i>
	      </div>
	    </div>
	    <span class="txt-dark">ท่องเที่ยว</span>
   </center>
</ons-col>
</ons-row>

<ons-row style="margin: 10px 0px;">
  <ons-col style="margin: 10px;">
	  <center>
	  	<div onclick="income();" class="circle-menu-home" style="    background-color: #3b5998;" >
	      
	      <div class="content">
	     	<i class="fa fa-usd" style="font-size: 28px;position: relative; top: 7px; left: 0px;"></i>
	      </div>
	    </div>
	    <span class="txt-dark">รายรับ</span>
	    </center>
  </ons-col>

  <ons-col style="margin: 10px;">
   <center>
	  	<div onclick="expenditure()" class="circle-menu-home" style="    background-color: #e91e63;">
	      <div class="content">
	     	<i class="fa fa-usd" style="font-size: 28px;position: relative; top: 7px; left: 0px;"></i>
	      </div>
	    </div>
	    <span class="txt-dark">รายจ่าย</span>
   </center>
</ons-col>
</ons-row>
<?php 
	if ($_COOKIE['detect_userclass'] != 'lab') {
		
	

	?>
<ons-row style="margin: 10px 0px;">
	<ons-col style="margin: 10px;">
   <center>
	  	<div onclick="wallet('slide-ios')" class="circle-menu-home" style="    background-color: #F44336;">
	      <div class="content">
	     	<i class="material-icons" style="font-size: 28px;position: relative; top: 7px; left: 0px;">account_balance_wallet</i>
	      </div>
	    </div>
	    <span class="txt-dark">กระเป๋าเงิน</span>
   </center>
</ons-col>
	</ons-row>
<?php } ?>
 <!-- <ons-list-item onclick="wallet('slide-ios');" style="<?=$menu_wallet;?>border-bottom: 1px solid rgb(204, 204, 204);">
                  <div class="left" style="<?=$border_menu_color;?>">
                     <span class="list-item__icon <?=$menu_ion_class;?>"> <i class="material-icons" style="    margin-left: -5px;">account_balance_wallet</i></span>
                  </div>
                 <div class="center" style="background-image: none;">
                     กระเป๋าเงิน
                  </div>
               </ons-list-item> -->


</div>
