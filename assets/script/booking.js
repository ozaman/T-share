

function booking() {

  if(detect_user == 153 || detect_user == 164 || detect_user == 129){

  //    fn.pushPage({
  //   'id': 'transfer.html',
  //   'title': 'ให้บริการรถ',
  //   'key': 'transfer'
  // })
    modal.show();
   
   fn.pushPage({
    'id': 'book_trans.html',
    'title': 'จองรถ',
    'key': 'book_trans'
  })
  // fn.pushPage({
  //       'id': 'booking.html',
  //       'title': 'ส่งแขก',
  //       'key': 'shop'
  //     })
  var url = "booking/index";
  // $('#check_open_worktbooking').val(1);
  $.post(url, function (html) {
    $('#body_booking').html(html);
  });
    // modal.hide();
  }
  else{
    ons.notification.alert({
    message: 'ยังไม่เปิดให้บริการ',
    title: "ขออภัย",
    buttonLabel: "ตกลง"
  })
  .then(function () {});
  
    return false;
  }


  
  
}
if ($.cookie("lng") == 'cn') {
        console.log($.cookie("lng")+'cn');
        $('.lng-private').html('专车');
        $('.lng-join').html('拼车');
        //menu
        $('.lng-register').html('登記');
        $('.lng-login').html('登录');
        $('.lng-product').html('产品');
        $('.lng-transports').html('交通用车');
        $('.lng-tours').html('景点玩乐');
        $('.lng-language').html('语言');
        $('.lng-settings-account').html('设置帐户');
        $('.lng-logout').html('登出');
        //$('.lng-advance-use').html('提前使用');
        $('.lng-advance-use').html('提前预订');
        // $('.lng-now-use').html('现在使用');
        $('.lng-now-use').html('立即预订');
        $('.lng-search').html('搜索');
        $('.lng-dashboard').html('报告与管理');
        $('.lng-car-type').html('车型');
        $('.lng-book').html('預訂');
        $('.lng-capacity-info').html('容量信息');
        $('.lng-facilities').html('设施');
        $('.lng-summary').html('总结');
        $('.lng-contact-infomation').html('联系信息');
        $('.lng-from').html('从');
        $('.lng-to').html('至');
        $('.lng-type').html('类型');
        $('.lng-price').html('价格');
        $('.lng-total-prices').html('总价');
        $('.lng-person').html('人');
        $('.lng-car').html('车');
        $('.lng-carnum').html('发痒');        
        $('.lng-you-choose').html('你选择');
        $('.lng-adult').html('成人');
        $('.lng-child').html('儿童');
        $('.lng-visa').html('落地签证');
        $('.lng-departure-terminal').html('出发航站楼');
        $('.lng-get-detail').html('来自注册的详细信息。');
        $('.lng-product-name').html('产品');
        $('.lng-pick-up-from').html('接客地点');
        $('.lng-pick-up-to').html('送客地点');
        $('.lng-first-name').html('名');
        $('.lng-phone').html('电话');
        $('.lng-email').html('电子邮件');
        $('.lng-other').html('其他');
        $('.lng-remark').html('備註');        
        $('.lng-flight').html('航班');
        $('.lng-sum-total').html('总计');
        $('.lng-acceptance-of-terms').html('接受条款');
        $('.lng-booking-infomation').html('预订信息');
        $('.lng-none').html('没有');
        $('.lng-yes').html('是的');
        $('.lng-yes2').html('正确');
        $('.lng-no').html('不是');
        $('.lng-or').html('或者');
        $('.lng-password').html('密碼');
        $('.lng-not-member').html('非会员？');
        $('.lng-sign-up-now').html('立即注册');
        $('.lng-why-become').html('为什么成为App Booking会员？');
        $('.lng-special-product').html('特价商品');
        $('.lng-exclusive-discount').html('优惠通过电子邮件');
        $('.lng-fast-booking').html('快速预约只需一键即可');
        $('.lng-have-member').html('有会员？');
        $('.lng-registered-customers').html('注册客户');
        $('.lng-sign-create').html('登录或创建帐户');
        $('.lng-what-is-your-email').html('你的电子邮件是什么（手机帐号的手机）？');
        $('.lng-sign-in').html('登入');
        $('.lng-check').html('检查');
        $('.lng-facilitiy').html('设施');
        $('.lng-conditioner').html('空調');
        $('.lng-audio-player').html('音頻播放器');
        $('.lng-cancel').html('取消');
        $('.lng-seating').html('座位数');
        $('.lng-terms-of-use').html('服务条款');
        $('.picker__button--close').html('密切');
        $('.lng-close').html('关');
        $('.lng-home').html('主頁');
        $('.lng-management').html('我的预订');
        $('.lng-new-password').html('新密码');
        $('.lng-confirm-password').html('确认密码');
        $('.lng-foget-pass').html('忘记密码');
        $('.lng-please-input-email').html(' 请输入您的电子邮件');
        $('.lng-send').html('发送');
        $('.lng-change-password').html('更改密碼');
        $('.lng-change').html('更改');
        $('.lng-not-same').html('密码不一样');
        // $('.lng-car-service').html('用车服务');
        $('.lng-car-service').html('租小时');
        $('.lng-loading').html('加載..');
        $('.lng-not-found').html('产品没有找到');
        $('.lng-no-record').html('没有记录');
        $('.lng-payment').html('付款');
        $('.lng-plese-login').html('请登录');
        $('.lng-please-select-type').html('請選擇類型');
        $('.lng-a-place').html('请选择上车地点');
        $('.lng-save').html('保存');
        $('.lng-yes-regularly').html('常用');
        $('.lng_position').html('您选择的路线正确吗？');
        $('.lng_find_again').html('重新编辑路线');        
        $('.lng-home-locat').html('住家');
        $('.lng-office-locat').html('办公室');
        $('.lng-setpin-locat').html('在地图上设置位置');
        $('.lng-nearby-locat').html('附近的地方');
        $('.lng-current-pos').html('当前位置');
        $('.lng_departure').html('使用日期')
        $('.lng_addbook').html('预订车')
        $('.lng_please_accept').html('请接受协议。')
        $('.lng_chosen_car').html('你选择了一辆车。')
        $('.lng_confirm').html('确认')
        $('.lng_new_selection').html('新')
        $('.lng_email_have').html('在系统中有这个电子邮件')
        $('.lng_email_available').html('此电子邮件是可用的')
        $('.lng_please_input_data').html('请输入数据')
        $('.lng_get_lower_price').html("作为会员，每一个产品预订都会得到较低的价格")
        $('.lng_get_latest_promo').html("你会得到最新的促销信息和特殊会员折扣。")
        $('.lng_member_using').html("作为使用Go Holiday Quick的会员，您的预订是我们的首要任务。")
        $('.lng_location_no').html("您選擇的路線無效。")
        $('.lng_history').html("你要保存此路线到我的最爱吗?")
        $('.lng_history_get').html("历史")
        $('.lng_favorites').html("我的最爱")
        $('.lng_list').html("使用历史")
        $('.lng_notifications').html("通知")
        $('.lng_drive').html("成为(T Share)司机")
        $('.lng_help_center').html("帮助中心")
        $('.lng_polic').html("通知警方")
        $('.lng_calling_police').html("你在报警。")
        $('.lng_really_need').html("继续，当你真的需要帮助。")
        $('.lng_police_now').html("现在就报警")
        $('.lng_canceled').html("取消")
        $('.lng-omise-gateway').html("付款頻道")
        $('.lng_can_see').html(" 您可以在底部看到每个付款渠道的详细信息。")
        $('.lng_fee').html("- 手续费：3.9％+ 11泰铢")
        $('.lng_fee2').html("- 手续费")
        $('.lng_vat').html("- 增值稅 ")
        $('.lng_do_not_need').html("- 通过PayPal付款，您不必支付。 该系统将立即为您处理。 付款完毕")
        $('.lng_credit_card').html("信用卡(omise)")
        $('.lng-paypal').html("貝寶")
        $('.lng_tours').html("遊")
        $('.lng_transport').html("班車服務")
        $('.lng_select_province').html("請選擇省份")        
        $('.lng_day_tour').html("遊覽")
        $('.lng_spa').html("溫泉")
        $('.lng_boat').html("船")
        $('.lng_wedding').html("婚禮")
        $('.lng_diving').html("潛水")
        $('.lng_golf').html("高爾夫球")
        $('.lng_package').html("包")
        $('.lng_show').html("表明")
        $('.lng_details').html("细节")
        $('.lng_roud_time').html("回合時間")
        $('.lng_active_service').html("激活服務") 
        $('.lng_gallery').html("畫廊") 
        $('.lng_product_details').html("產品詳情") 
        $('.lng_product_category').html("產品類型")  
        $('.lng_select_type').html("請選擇一個產品類型。") 
        $('.lng_region').html("请选择一个地区。")  
        $('.lng_country').html("请选择国家")          
        $('.ing_thai').html('泰国')  
        $('.lng_home').html('主页')
        $('.lng_pay_driver').html('与司机支付')  
        



        /////////////// Dash ///////////////////////////////////////
        $('#terms-of-use').html('<span>' +
            '<B>一. </B> 请注意，黄色或者绿色车牌为合法运营车辆。如看到其他颜色牌照可拒绝上车，并请联系我们热线。<br /><br />' +
            '<B>二. </B> 上⻋车请系好安全带，不然如遇警察检查需自己付罚款，如有意外保险⽆无法赔偿。<br /><br />' +
            '<B>三. </B> 上下车请保管好自己的物品。如有遗失，概不负责。<br /><br />' +
            '<B>四. </B> 如发生司机由于不可抗力因素未接到，在约定时间后5-15分钟内，请客人及时联系我们的24小时中文热线，如等待超过30分钟，请客人需及时自行打车离开！<br /><br />' +
            '我们会退还订单费用，如客人有打车凭证提供，我们将补偿打车费用，但是其他费用一律不负责赔偿，请知晓！</span>');
        $('.lng-name_d').html('名字');
        $('.lng-username_d').html('用户名');
        $('.lng-email_d').html('电子邮件');
        $('.lng-cr_d').html('客户参考');
        $('.lng-code_d').html('代码');
        $('.lng-amount_d').html('代码');
        $('.lng-search_d').html('<input type="text" value="" class="form-control" placeholder="搜索 名字..." onkeyup="myFunction()" id="myInput"  style="margin-left: -6px;" />');

        $('.lng-sa_d').html('设置帐户');
        $('.lng-customer_d').html('顾客');
        $('.lng-payment_d').html('付款');
        $('.lng-bag-big').html('袋大');
        $('.lng-plan').html('计划');
        $('.lng-bag-small').html('袋小');
        $('.lng-arrival-date').html('到达日期');
        $('.lng-arrival-time').html('到达时间');
        $('.lng-detail-order').html('订单详细');
        $('.lng-amount').html('人民 ');
        $('.lng-book-by').html('预订人');
        $('.lng-voucher-no').html('凭证编号');
        $('.lng-date').html('日期');
        $('.lng-order').html('訂購');

        $('.lng-last-name').html('姓');
        $('.lng-address').html('地址');
        $('.lng-country').html('国家');
        $('.lng-old-password').html('舊密碼');
        $('.lng-other').html('其他');
        $('.lng-paynow').html('现在付款');


    } else if ($.cookie("lng") == 'en') {
        console.log($.cookie("lng")+'en');

        $('.lng-private').html('Private');
        $('.lng-join').html('Join');
        //menu
        $('.lng-register').html('Register');
        $('.lng-login').html('Login');
        $('.lng-product').html('Product');
        $('.lng-transports').html('Transports');
        $('.lng-tours').html('Tours');
        $('.lng-language').html('Language');
        $('.lng-settings-account').html('Settings Account');
        $('.lng-logout').html('Logout');
        //home
        $('.lng-advance-use').html('Adv Booking');
        $('.lng-now-use').html('Book Now');
        $('.lng-search').html('Search');
        $('.lng-dashboard').html('Report&management');
        $('.lng-car-type').html('Car type');
        $('.lng-book').html('Book');
        $('.lng-capacity-info').html('Capacity info');
        $('.lng-facilities').html('Capacity info');
        $('.lng-summary').html('Summary');
        $('.lng-contact-infomation').html('Contact infomation');
        $('.lng-from').html('From');
        $('.lng-to').html('To');
        $('.lng-type').html('Type');
        $('.lng-price').html('Price');
        $('.lng-total-prices').html('Total price');
        $('.lng-person').html('Person');
        $('.lng-car').html('Car');
        $('.lng-carnum').html('Car');        
        $('.lng-you-choose').html('You choose');
        $('.lng-adult').html('Adult');
        $('.lng-child').html('Child');
        $('.lng-visa').html('Visa on Arrival');
        $('.lng-departure-terminal').html('Departure terminal');
        $('.lng-get-detail').html('Details from the register.');
        $('.lng-product-name').html('Product name');
        $('.lng-pick-up-from').html('Pick up from');
        $('.lng-pick-up-to').html('Pick up to');
        $('.lng-first-name').html('First Name');
        $('.lng-phone').html('Phone');
        $('.lng-email').html('Email');
        $('.lng-other').html('Other');
        $('.lng-flight').html('Flight');
        $('.lng-sum-total').html('Sum total');
        $('.lng-acceptance-of-terms').html('Acceptance of terms');
        $('.lng-booking-infomation').html('Booking infomation');
        $('.lng-none').html('None');
        $('.lng-yes').html('Yes');
        $('.lng-yes2').html('Correct');
        $('.lng-no').html('No');
        $('.lng-or').html('or');
        $('.lng-password').html('Password');
        $('.lng-not-member').html('Not a member?');
        $('.lng-sign-up-now').html('Sign Up Now');
        $('.lng-why-become').html('Why become a App Booking member?');
        $('.lng-special-product').html('Special Product Price');
        $('.lng-exclusive discount').html('Exclusive Discount via Email');
        $('.lng-fast-booking').html('Fast Booking with Only One-Click');
        $('.lng-have-member').html('Have a member?');
        $('.lng-registered-customers').html('Registered customers');
        $('.lng-sign-create').html('Sign In or Create an Account');
        $('.lng-what-is-your-email').html(' What is your email (phone for mobile accounts)?');
        $('.lng-sign-in').html('Sign in');
        $('.lng-check').html('Check');
        $('.lng-facilitiy').html('Facilitiy');
        $('.lng-conditioner').html('Air Conditioner');
        $('.lng-audio-player').html('Audio Player');
        $('.lng-cancel').html('Cancel');
        $('.lng-seating').html('Seating');
        $('.lng-terms-of-use').html('Terms of Use');
        $('.picker__button--close').html('Close');
        $('.lng-close').html('Close');
        $('.lng-home').html('Home');
        $('.lng-management').html('My Booking');
        $('.lng-new-password').html('New Password');
        $('.lng-confirm-password').html('Confirm Password');
        $('.lng-foget-pass').html('Forgot your password');
        $('.lng-please-input-email').html('Please input your email');
        $('.lng-send').html('Send');
        $('.lng-change-password').html('Change password');
        $('.lng-change').html('Change');
        $('.lng-not-same').html('Password not same');
        $('.lng-car-service').html('Rent hour');
        // $('.lng-car-service').html('Car service');
        $('.lng-loading').html('Loading..');
        $('.lng-not-found').html('Product not Found');
        $('.lng-no-record').html('No Record');
        $('.lng-payment').html('Payment');
        $('.lng-plese-login').html('Please sign in');
        $('.lng-remark').html('Remark');
        $('.lng-please-select-type').html(' Please select type');
        $('.lng-a-place').html('Please select a place to ride');
        $('.lng-save').html('Save');
        $('.lng-yes-regularly').html('Commonly used');
        $('.lng_position').html('Did you choose the correct route?');
        $('.lng_find_again').html('Re-edit route');
        $('.lng-setpin-locat').html('Set the location on the map');
        $('.lng-current-pos').html('Current Position');
        $('.lng-nearby-locat').html('Near the place');
        $('.lng-office-locat').html('Office');
        $('.lng-home-locat').html('House');
        $('.lng_departure').html('Use date')
        $('.lng_addbook').html('Booking car')
        $('.lng_please_accept').html('Please accept the agreement.')
        $('.lng_chosen_car').html('You have chosen a car.')
        $('.lng_confirm').html('Confirm')
        $('.lng_new_selection').html('New selection')
        $('.lng_email_have').html('Have this email in system')
        $('.lng_email_available').html('This email is available')
        $('.lng_please_input_data').html('Please input data')
        $('.lng_get_lower_price').html("You'll get lower price for every Product booking, as a member.")
        $('.lng_get_latest_promo').html("You'll get the latest promo info and special member discount.")
        $('.lng_member_using').html("As a member using Go Holiday Quick, your booking is our priority.")
        $('.lng-exclusive-discount').html('Offer via email');
        $('.lng_location_no').html("The route you selected is not valid.")
        $('.lng_history_get').html("History")
        $('.lng_history').html("Do you want to save this route to my favorite?")
        $('.lng_favorites').html("Favorites")
        $('.lng_list').html("Use history")
        $('.lng_notifications').html("Notifications")
        $('.lng_drive').html("Drive with (T share)")
        $('.lng_help_center').html("Help Center")
        $('.lng_polic').html("Call the police")
        $('.lng_calling_police').html("You are calling the police")
        $('.lng_really_need').html("Continue when you really need help.")
        $('.lng_police_now').html("Call the police now")
        $('.lng_canceled').html("Canceled")
        $('.lng-omise-gateway').html("Payment Channels")
        $('.lng_can_see').html(" You can see the details of each payment channel at the bottom.")
        $('.lng_fee').html("- Fee: 3.9% + 11 THB")
        $('.lng_fee2').html("- Fee: ")
        $('.lng_vat').html("- VAT ")        
        $('.lng_do_not_need').html("- PayPal payments You do not need to make a payment. Because the system will handle you immediately. Your payment is complete.")
        $('.lng_credit_card').html("Credit Card (omise)")
        $('.lng-paypal').html("Paypal")
        $('.lng_tours').html("Tours")
        $('.lng_transport').html("Shuttle service")
        $('.lng_select_province').html("Please Select Province")
        $('.lng_day_tour').html("Day tour")
        $('.lng_spa').html("Spa")
        $('.lng_boat').html("Boat")
        $('.lng_wedding').html("Wedding")
        $('.lng_diving').html("Diving")
        $('.lng_golf').html("Golf")
        $('.lng_package').html("Package")
        $('.lng_show').html("Show")
        $('.lng_details').html("details") 
        $('.lng_roud_time').html("Round time") 
        $('.lng_active_service').html("Activate service")
        $('.lng_gallery').html("Gallery")
        $('.lng_product_details').html("Product Details")
        $('.lng_product_category').html("Product Category") 
        $('.lng_select_type').html("Please select a product type.")   
        $('.lng_region').html("Please select a region.")  
        $('.lng_country').html("Please select country")
        $('.ing_thai').html('Thailand') 
        $('.lng_home').html('Home')
        $('.lng_pay_driver').html('Pay with driver')  

        


        /////////////// Dash ///////////////////////////////////////
        $('#terms-of-use').html('<span  ><B >1.</B>  Please note that only green or yellow license plates vehicle legally are used as public vehicles. If you see other colors license plates vehicle, could refuse to get on and please contact our hotline.<br /><br>' +

            '<B>2.</B> Please remember to fasten your seat belt in the vehicle. Otherwise, in case of police check required to pay fines by you own and in case of any traffic accident, you would be unable to get any insurance compensation.<br /><br>' +

            '<B>3.</B> Please check your belongings before leaving. We are not responsible for any loss.<br /><br>' +

            '<B>4.</B> If the driver did not arrive on time in 5-15 minutes, please contact our 24-hour hotline,Such as waiting for more than 30 minutes, please kindly get another taxi. We will refund the cost of the order, if the guest able to provide the taxi voucher that they took, we will refund the taxi costs. Please be noticed the other fees are not responsible for refund..</span>');
        $('.lng-name_d').html('Name');
        $('.lng-username_d').html('Username');
        $('.lng-email_d').html('Email');
        $('.lng-cr_d').html('Cutomer Reference');
        $('.lng-code_d').html('Code');
        $('.lng-amount_d').html('Amount');
        $('.lng-search_d').html('<input type="text" value="" class="form-control" placeholder="Search name..." onkeyup="myFunction()" id="myInput"  style="margin-left: -6px;" />');
        $('.lng-sa_d').html('Settings Account');
        $('.lng-customer_d').html('Customer');
        $('.lng-payment_d').html('Payment');
        $('.lng-bag-big').html('Bag big');
        $('.lng-plan').html('Plan');
        $('.lng-bag-small').html('Bag small');
        $('.lng-arrival-date').html('Arrival date');
        $('.lng-arrival-time').html('Arrival time');
        $('.lng-detail-order').html('Detail Order');
        $('.lng-amount').html('Amount ');
        $('.lng-book-by').html('Book by');
        $('.lng-voucher-no').html('Voucher No.');
        $('.lng-date').html('Date');
        $('.lng-order').html('Order');

        $('.lng-last-name').html('Last Name');
        $('.lng-address').html('Address');
        $('.lng-country').html('Country');
        $('.lng-old-password').html('Old Password');
        $('.lng-other').html('Other');
        $('.lng-paynow').html('Pay Now');

    } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH' || $.cookie("lng") == undefined) {
      console.log($.cookie("lng"));

      $('.lng-private').html('รถส่วนตัว');
      $('.lng-join').html('รถร่วมบริการ');
        //menu
        $('.lng-register').html('ลงทะเบียน');
        $('.lng-login').html('  เข้าสู่ระบบ');
        $('.lng-product').html('สินค้า');
        $('.lng-transports').html(' รถให้บริการ');
        $('.lng-tours').html('ทัวร์');
        $('.lng-language').html('ภาษา');
        $('.lng-settings-account').html('ตั้งค่าบัญชี');
        $('.lng-logout').html(' ออกจากระบบ');
        //        $('.lng-advance-use').html('ค้นหาสถานที่รับส่ง');
        $('.lng-advance-use').html('จองล่วงหน้า');
        $('.lng-now-use').html('จองตอนนี้');
        $('.lng-search').html(' ค้นหา');
        $('.lng-dashboard').html('รายงานและการจัดการ');
        $('.lng-car-type').html('ประเภทรถ');
        $('.lng-book').html('จอง');
        $('.lng-capacity-info').html('ข้อมูลความจุ');
        $('.lng-facilities').html('สิ่งอำนวยความสะดวก ');
        $('.lng-summary').html('สรุป');
        $('.lng-contact-infomation').html('ข้อมูลติดต่อ');
        $('.lng-from').html('จาก');
        $('.lng-to').html('ไปยัง');
        $('.lng-type').html('ประเภท');
        $('.lng-price').html('ราคา');
        $('.lng-total-prices').html('ราคารวม');
        $('.lng-person').html('คน');
        $('.lng-car').html('รถ');
        $('.lng-carnum').html('คัน');
        $('.lng-you-choose').html('คุณเลือก');
        $('.lng-adult').html('ผู้ใหญ่');
        $('.lng-child').html('เด็ก');
        $('.lng-visa').html('วีซ่าเมื่อมาถึง');
        $('.lng-departure-terminal').html('อาคารขาออก');
        $('.lng-get-detail').html('รายละเอียดจากที่ลงทะเบียน');
        $('.lng-product-name').html('สินค้า');
        $('.lng-pick-up-from').html('รับจาก');
        $('.lng-pick-up-to').html('สถานที่ส่ง');
        $('.lng-first-name').html('ชื่อ');
        $('.lng-phone').html('โทรศัพท์');
        $('.lng-email').html('อีเมล์');
        $('.lng-other').html('อื่น ๆ');
        $('.lng-flight').html('เที่ยวบิน');
        $('.lng-sum-total').html('ยอดรวม');
        $('.lng-acceptance-of-terms').html('การยอมรับข้อตกลง');
        $('.lng-booking-infomation').html('ข้อมูลการจอง');
        $('.lng-none').html('ไม่มี');
        $('.lng-yes').html('ใช่');
        $('.lng-yes2').html('ถูกต้อง');        
        $('.lng-no').html('ไม่');
        $('.lng-or').html('หรือ');
        $('.lng-password').html('รหัสผ่าน');
        $('.lng-not-member').html('ไม่ใช่สมาชิก?');
        $('.lng-sign-up-now').html('สมัครตอนนี้เลย');
        $('.lng-why-become').html('ทำไมต้องเป็นสมาชิกการจองแอ็พ');
        $('.lng-special-product').html('ราคาสินค้าพิเศษ');
        $('.lng-exclusive discount').html('ส่วนลดพิเศษทางอีเมล');
        $('.lng-fast-booking').html('จองได้อย่างรวดเร็วด้วยการคลิกเพียงครั้งเดียว');
        $('.lng-have-member').html('มีสมาชิกหรือไม่? ');
        $('.lng-registered-customers').html('ลูกค้าที่ลงทะเบียน');
        $('.lng-sign-create').html('เข้าสู่ระบบหรือสร้างบัญชี');
        $('.lng-what-is-your-email').html('อีเมลของคุณคืออะไร (โทรศัพท์สำหรับบัญชีมือถือ)?');
        $('.lng-sign-in').html('ลงชื่อเข้าใช้');
        $('.lng-check').html('ตรวจสอบ');
        $('.lng-facilitiy').html('ความสะดวก');
        $('.lng-conditioner').html('เครื่องปรับอากาศ');
        $('.lng-audio-player').html('เครื่องเสียง');
        $('.lng-cancel').html('ยกเลิก')
        $('.lng-seating').html('ที่นั่ง');
        $('.lng-terms-of-use').html('ข้อกำหนดการใช้งาน');
        $('.picker__button--close').html('ปิด');
        $('.lng-close').html('ปิด');
        $('.lng-home').html('หน้าหลัก');
        $('.lng-management').html('การจองของฉัน');
        $('.lng-new-password').html('รหัสผ่านใหม่');
        $('.lng-confirm-password').html('ยืนยันรหัสผ่าน');
        $('.lng-bag-big').html('กระเป๋าใหญ่');
        $('.lng-plan').html('แผน');
        $('.lng-bag-small').html('กระเป๋าเล็ก');
        $('.lng-foget-pass').html('ลืมรหัสผ่าน');
        $('.lng-please-input-email').html('โปรดใส่อีเมลของคุณ');
        $('.lng-send').html('ส่ง');
        $('.lng-change-password').html('เปลี่ยนรหัสผ่าน');
        $('.lng-change').html('เปลี่ยน');
        $('.lng-not-same').html('รหัสผ่านไม่เหมือนกัน');
        $('.lng-detail-order').html('รายละเอียดสั่งซื้อ');
        $('.lng-voucher-no').html('เลขที่วอเชอร์');
        $('.lng-car-service').html('เช่าชั่วโมง');
        // $('.lng-car-service').html('บริการรถ');
        $('.lng-loading').html('โหลด..');
        $('.lng-not-found').html('ไม่พบผลิตภัณฑ์');
        $('.lng-no-record').html('ไม่มีการบันทึก');
        $('.lng-payment').html('การชำระเงิน');
        $('.lng-plese-login').html('กรุณาเข้าสู่ระบบ');
        $('.lng-remark').html('หมายเหตุ');
        $('.lng-save').html('บันทึก');
        $('.lng-yes-regularly').html('ใช่เป็นประจำ');
        $('.lng_position').html('เส้นทางที่คุณเลือกถูกต้องหรือไม่?');
        $('.lng_find_again').html('แก้ไขเส้นทางใหม่');
        $('.lng-home-locat').html('บ้าน');
        $('.lng-office-locat').html('สำนักงาน');
        $('.lng-setpin-locat').html('ตั้งตำแหน่งบนแผนที่');
        $('.lng-nearby-locat').html('สถานที่ใกล้เคียง');
        $('.lng-current-pos').html('ตำแหน่งปัจจุบัน');
        $('.lng_departure').html('วันที่ใช้บริการ')
        $('.lng_please_accept').html('กรุณายอมรับข้อตกลง')
        $('.lng_chosen_car').html('คุณได้เลือกรถ.')
        $('.lng_confirm').html('ยืนยัน')
        $('.lng_new_selection').html('เลือกใหม่')
        $('.lng_email_have').html('มีอีเมลนี้ในระบบ')
        $('.lng_email_available').html('อีเมลนี้พร้อมใช้งาน')
        $('.lng_please_input_data').html('กรุณาใส่ข้อมูล')
        $('.lng_get_lower_price').html("คุณจะได้รับราคาต่ำกว่าสำหรับการจองสินค้าทุกครั้งในฐานะสมาชิก")
        $('.lng_get_latest_promo').html("คุณจะได้รับข้อมูลโปรโมชั่นล่าสุดและส่วนลดสมาชิกพิเศษ")
        $('.lng_member_using').html("ในฐานะสมาชิกที่ใช้ Go Holiday Quick การจองของคุณเป็นสิ่งสำคัญที่สุด")
        $('.lng-exclusive-discount').html('ข้อเสนอทางอีเมล');
        $('.lng_location_no').html("เส้นทางที่คุณเลือกไม่ถูกต้อง")
        $('.lng_history_get').html("ประวัติ ใช้ประจำ")
        $('.lng_history').html("คุณต้องการบันทึกเส้นทางนี้ไปยังรายการโปรด?")
        $('.lng_favorites').html("รายการโปรด")
        $('.lng_list').html("ประวัติรายการ")
        $('.lng_notifications').html("การแจ้งเตือน")
        $('.lng_drive').html("ขับรถกับ(ทีแชร์)")
        $('.lng_help_center').html("ศูนย์ให้การช่วยเหลือ")
        $('.lng_polic').html("แจ้งตำรวจ")
        $('.lng_calling_police').html("คุณกำลังโทรหาตำรวจ")
        $('.lng_really_need').html("ดำเนินการต่อเมื่อคุณต้องการความช่วยเหลือจริงๆ")
        $('.lng_police_now').html("เรียกตำรวจเดี๋ยวนี้")
        $('.lng_canceled').html("ยกเลิก")
        $('.lng-omise-gateway').html("ช่องทางการชำระเงิน")
        $('.lng_can_see').html("ท่านสามารถดูรายละเอียดค่าธรรมเนียมของการชำระเงินแต่ละช่องทางได้ที่ด้านล่าง")
        $('.lng_fee').html("- ค่าธรรมเนียม 3.9% + 11 THB")
        $('.lng_fee2').html("- ค่าธรรมเนียม")
        $('.lng_vat').html("- ภาษีมูลค่าเพิ่ม")
        $('.lng_do_not_need').html("- การชำระผ่าน PayPal คุณไม่จำเป็นต้องแจ้งชำระเงิน เนื่องจากระบบจะจัดการให้คุณทันที ที่คุณชำระเงินเสร็จสมบูรณ")
        $('.lng_credit_card').html("บัตรเครดิต (omise)")
        $('.lng-paypal').html("เพย์พาล")
        $('.lng_tours').html("ทัวร์")
        $('.lng_transport').html("บริการรถรับ-ส่ง")
        $('.lng_select_province').html("โปรดเลือกจังหวัด")
        $('.lng_day_tour').html("การท่องเที่ยว")
        $('.lng_spa').html("สปา")
        $('.lng_boat').html("เรือ")
        $('.lng_wedding').html("งานแต่งงาน")
        $('.lng_diving').html("ดำน้ำ")
        $('.lng_golf').html("กอล์ฟ")
        $('.lng_show').html("การแสดง")
        $('.lng_package').html("แพ็คเกจ")
        $('.lng_details').html("รายละเอียด")
        $('.lng_roud_time').html("รอบเวลา") 
        $('.lng_active_service').html("เปิดใช้บริการ") 
        $('.lng_gallery').html("รูปภาพ")       
        $('.lng_product_details').html("รายละเอียด โปรดักส์") 
        $('.lng_product_category').html("ประเภท โปรดักส์")  
        $('.lng_select_type').html("โปรดเลือกประเภทโปรดักส์")
        $('.lng_region').html("กรุณาเลือกภาค")  
        $('.lng_country').html("โปรดเลือกประเทศ")  
        $('.ing_thai').html('ประเทศไทย')
        $('.lng_home').html('หน้าหลัก')  
        $('.lng_pay_driver').html('จ่ายกับคนขับ')  









        
        
        
        

        /////////////// Dash ///////////////////////////////////////
        $('#terms-of-use').html('<span >' +
            '<B>1.</B> โปรดทราบว่ามีเพียงแผ่นป้ายทะเบียนรถสีเขียวหรือสีเหลืองเท่านั้นที่ใช้เป็นยานพาหนะขนส่งสาธารณะที่ถูกต้องตามกฎหมาย หากคุณเห็นป้ายทะเบียนรถเป็นสีอื่น คุณสามารถปฏิเสธการโดยสารได้ และโปรดติดต่อสายด่วนของเรา<br /><br />' +
            '<B >2.</B> กรุณาคาดเข็มขัดนิรภัย มิฉะนั้นในกรณีที่มีการเรียกตรวจสอบจากตำรวจ คุณต้องต้องจ่ายค่าปรับเอง และในกรณีที่เกิดอุบัติเหตุ คุณจะไม่สามารถได้รับค่าชดเชยจากบริษัทประกันภัย<br /><br />' +
            '<B>3.</B> โปรดตรวจสอบทรัพย์สินของคุณก่อนที่รถจะออกเดินทางหรือรถถึงที่หมาย เราจะไม่รับผิดชอบต่อความสูญเสียในกรณีใดๆ ทั้งสิ้น<br /><br />' +
            '<B>4.</B> ในกรณีที่มีเหตุสุดวิสัยคนขับไม่ได้รับรอเกิน 5-15 นาทีจากเวลาที่ตกลงกัน โปรดติดต่อศูนย์บริการตลอด 24 ชั่วโมงสายด่วนทันที ถ้ารอคอยมากกว่า 30 นาที กรุณาเรียกรถเอง! เราจะคืนเงินให้ท่าน100%ในการจอง และจะคืนเงินที่ท่านเรียกรถ (แต่ต้องมีหลักฐานใบเสร็จหรือรูปยืนยัน) แต่จะไม่รับผิดชอบค่าเสียหายอื่น  โปรดทราบ!</span> ');
        $('.lng-name_d').html('ชื่อ');
        $('.lng-username_d').html('ชื่อผู้ใช้');
        $('.lng-email_d').html('อีเมล์');
        $('.lng-cr_d').html('การอ้างอิงของลูกค้า');
        $('.lng-code_d').html('รหัส');
        $('.lng-amount_d').html('จำนวน');
        $('.lng-search_d').html('<input type="text" value="" class="form-control" placeholder="ค้นหา ชื่อ..." onkeyup="myFunction()" id="myInput"  style="margin-left: -6px;" />');
        $('.lng-sa_d').html('ตั้งค่าบัญชี');
        $('.lng-customer_d').html('ลูกค้า');
        $('.lng-payment_d').html('ชำระเงิน');
        $('.lng-arrival-date').html('วันที่มาถึง');
        $('.lng-arrival-time').html('เวลาถึง');
        $('.lng-amount').html('จำนวน');
        $('.lng-book-by').html('ผู้จอง');
        $('.lng-date').html('วันที่');
        $('.lng-order').html('ใบสั่ง');
        $('.lng-last-name').html('นามสกุล');
        $('.lng-address').html('ที่อยู่');
        $('.lng-country').html('ประเทศ');
        $('.lng-old-password').html('รหัสผ่านเดิม');
        $('.lng-other').html('อื่นๆ');
        $('.lng-paynow').html('ชำระตอนนี้');
        $('.lng-please-select-type').html('โปรดเลือกประเภท');
        $('.lng-a-place').html('กรุณาเลือกสถานที่ขึ้นรถ');
        $('.lng_addbook').html('จองรถ')


    }