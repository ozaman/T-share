var rel = false;
var dataplacerel, pro_id, pro_id_to, datacaedervice;
var dataplaceSend, id_placefrom, id_placeto, pro_from, pro_to, aum_from, aum_to, dataproduct, parame, compae1private = [],
compae1join = [],
compae2private = [],
compae2join = [],
lat_from, lng_from,proFrom,proTo,dataUse,lngdetails,addtopic = "",isConfirm = false;
var start_st, end_st;
var booking = '';
var checkshowhome = false;
var base_url_tr = 'https://www.welovetaxi.com/app/booking2/';
var  reltimeclick;
var checkreal_or_res = '';
var lngbook ,parampro, pro_service_from, pro_service_to;
var username, password , username_signup ,password_signup,text_check,forget = '',datauser,s_code,code_ref;
var language;
// if ($.cookie("lng") == undefined) {
//    language = window.navigator.userLanguage || window.navigator.language;
//     //alert(language);
//     if (language == 'th-TH') {
//         var slng = $.cookie("lng").split('-')
//         var flng = slng[0];
//         $.cookie("lng", flng, { path: '/' });
//     }
//  //$.cookie("lng", language, { path: '/' });
//     // 

// }
// if ($.cookie("lng") == 'th-TH') {
//     var slng = $.cookie("lng").split('-')
//     var flng = slng[0];
//     $.cookie("lng", flng, { path: '/' });
// }
$(document).ready(function() {
    // var base_url_tr = "https://www.welovetaxi.com/app/booking2/";
    
   //  $.ajax({
   //      type: 'POST',
   //      url: base_url_tr+'getuserlog_control/process',
   //     // data: {'from': getParameterByName('from'),'to': getParameterByName('to')},
   //      //contentType: "application/json",
   //      dataType: 'json',
   //      success: function(data) { 
   //          // console.log('*****************************')
   //         // console.log(data)
   //     }
   // });
    // $('#username').on('change', function() {
    //     username = this.value ;
    //     console.log(username)
    // })
    // $('#password').on('change', function() {
    //     password = this.value ;
    //     console.log(password)
    // })
    // $('.btn-foget-pass').on('click', function() {
     
    //     $('#foget-password').show(500)
    //     $('#popup-login').hide(500)
    // });
    // $('.btn-close').on('click', function() {
    //     $('#popup-login').hide(500)
    // });
    
    // $('.btn-send').on('click', function() {
    //     // alert('aaaaaa')
    //     forget = $('#email-forget').val();
    //     console.log(forget)
        
    //     if(forget != ''){
    //         $('#loading').show();
    //         $.ajax({
    //             type: 'POST',
    //             url: base_url_tr+'fogetpassword.php',
    //             data: { 'mail': forget },
    //         //contentType: "application/json",
    //         //dataType: 'json',
    //         success: function(data) {
    //             console.log(data);
    //         //console.log(s_email);
    //         $('#forget').hide();
    //         $('#loading').hide();
    //         $('.btn-login-forget').show();
    //         $('#check-email').show();
    //     }
    // });
    //     }
    // });
   //  $('.btn-login-forget').on('click', function() {
   //     // $('#foget-password').fadeOut(500)
   //     window.location.reload();
   // });     
//     $('#login').on('click', function() {
//         var type_login = $('#by').val();
//         var param_data = $('#data').val();
//         var param_from = $('#from').val();
//         var param_to = $('#to').val();
//         var lat_f = $('#lat_f').val();
//         var lng_f = $('#lng_f').val();
//         var lat_t = $('#lat_t').val();
//         var lng_t = $('#lng_t').val();
//         var book = $('#book').val();
// //      alert(type_login);
// console.log(password+username);
// //    alert('<?php echo base_url_tr(); ?>login_control/process');
// $.ajax({
//     type: 'POST',
//     url: base_url_tr+'login_control/process',
//     data: {'username': username,'password':password},
//         //contentType: "application/json",
//         dataType: 'json',
//         success: function(res) { 
//           console.log(res)
//           if(res.status == 0)
//           {
//            console.log('login status 0');
//            $.cookie("login",res.username);
//            loginsucess()
//                  //console.log('<?php echo base_url_tr(); ?>');
// //                  if(type_login=='dasboard'){
// //                     window.location.href = base_url_tr+"dashboard/view_user";
// //                  }else if(type_login=='book'){
// // //                     
// //                     window.location.href = "<?php echo base_url_tr(); ?>book?data="+param_data+"&from="+param_from+"&to="+param_to+"&lat_f="+lat_f+"&lng_f="+lng_f+"&lat_t="+lat_t+"&lng_t="+lng_t+"&book="+book;

// //                  }else{
// //                     window.location.href = "<?php echo base_url_tr(); ?>";
// //                  }
// }
// else if(res.status==1)
// {
//     console.log('status==1')
//     $('#message').html('Username is Invalid').css('color', 'red');
// }
// else if(res.status==2)
// {
//   console.log('status==2')
//   $('#message').html('Password is Invalid').css('color', 'red');
// }
// }
// });

//     //alert( this.value );
// })
    $('.close_login').click(function() {
        $('#popup-login').hide();
    });
    
    $('#username-signup').on('change', function() {
        username_signup = this.value ;
        console.log(username_signup) 
    })
    $('#password-signup').on('change', function() {
        password_signup = this.value ;
        console.log(password_signup)
    })
    $('#checkmail').on('click', function() {
        console.log('in case')
        $.ajax({
            type: 'POST',
            url: base_url_tr+'login_control/checkmail',
            data: {'username': username_signup,'password':password_signup},
        //contentType: "application/json",
        dataType: 'json',
        success: function(res) { 
          console.log(res)
          if(res.status == 0)
              { //have mail
                text_check = 0; 
                $('#messagecheck').html('Have this mail in system').css('color', 'red');
            }
            else if(res.status==1)
            {
                text_check = 1; 
                $('#messagecheck').html('This mail is available.').css('color', '#2c9930');
                console.log('status==1')
            }
        }
    });
        
    });
    
    $('#registered').on('click', function() {
        console.log('in case signup')
        console.log(text_check)
        //if (text_check == 1) {
            $.ajax({
                type: 'POST',
                url: base_url_tr+'login_control/signup',
                data: {'username': username_signup,'password':password_signup},
            //contentType: "application/json",
            dataType: 'json',
            success: function(res) { 
                console.log(res)
                if(res.status == 0){
                    $.cookie("login",res.username);
                    $('.lng_email_available').show()
                    $('.lng_email_have').hide()
                    loginsucess()
                }
                else{
                    $('.lng_email_available').hide()                    
                    $('.lng_email_have').show()
                }                
            }
        });
            
        });
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
    console.log(getParameterByName('section'))
   /* if(getParameterByName('section') == 'realtime'){
        booking = 'Realtime';
        setTimeout(function() {
            $('#boxRealtime').show(500);
            $('#boxForAutoCom').show(2000);
            $('#boxRealtimeto').show(500);
            $('#box-car-service').hide();
            $('#map').show(500);
            //$('#marginBox').hide(1000)
            $('.box_option').show(1000)  
            $('.btn-realtime').css({ 'background': '#3b5998', 'color': '#ffffff' });
            $('.btn-reservation').css({ 'background': '#ffffff', 'color': '#333' });
            $('.btn-home').css({ 'background': '#ffffff', 'color': '#333' });
            $('.btn-management').css({ 'background': '#ffffff', 'color': '#333' });
            $('.btn-car-service').css({ 'background': '#ffffff', 'color': '#333' });
            $("#pro-search").hide();
            $("#search-raeltime").fadeIn(1000);
            $("#list_place").fadeIn(1000);
            $("#show-hide-pro2").hide();
            $('#loading').css('display', 'none');
            $('#search-show').css('display', 'none')
            $('#pac-input').css('display', '');
            $('#current').focus();
        }, 500);
        checkshowhome = true;
        checkreal_or_res = 'Real'
    }
    else if(getParameterByName('section') == 'reservation'){
        booking = 'Reservation'
        setTimeout(function() {
            $('#boxRealtime').show(500);
            $('#boxForAutoCom').show(2000);
            $('#boxRealtimeto').show(500);
            $('#box-car-service').hide();
            $('#map').show(500);
            $('.box_option').show(500)
            $('.btn-reservation').css({ 'background': '#3b5998', 'color': '#ffffff' }); 
            $('.btn-home').css({ 'background': '#ffffff', 'color': '#333' });
            $('.btn-management').css({ 'background': '#ffffff', 'color': '#333' });
            $('.btn-realtime').css({ 'background': '#ffffff', 'color': '#333' });
            $('.btn-car-service').css({ 'background': '#ffffff', 'color': '#333' });
            $("#pro-search").hide();
            $("#search-raeltime").fadeIn(1000);
            $("#list_place").fadeIn(1000);
            $("#show-hide-pro2").hide();
            $('#loading').css('display', 'none');
            $('#search-show').css('display', 'none')
            $('#pac-input').css('display', '');
            $('#current').focus();
        }, 500);
        checkshowhome = true;
        checkreal_or_res = 'Res'
    }
    else if(getParameterByName('section') == 'service'){
        booking = 'Service';
        $('#box-car-service').show(500)
        $('.btn-car-service').css({ 'background': '#3b5998', 'color': '#ffffff' });
        $('.btn-realtime').css({ 'background': '#ffffff', 'color': '#333' });
        $('.btn-reservation').css({ 'background': '#ffffff', 'color': '#333' });
        $('.btn-home').css({ 'background': '#ffffff', 'color': '#333' });
        $('.btn-management').css({ 'background': '#ffffff', 'color': '#333' });
        if ($.cookie("lng") == 'en') {  
            $('#selectpro').html('From Province')
            $('#selectproto').html('To Province')
        } else if ($.cookie("lng") == 'th') {
            $('#selectpro').html('จากจังหวัด')
            $('#selectproto').html('ไปยังจังหวัด')
        } else if ($.cookie("lng") == 'cn') {            
            $('#selectpro').html('從省')
            $('#selectproto').html('到省')
        } else if ($.cookie("lng") == undefined) {            
            $('#selectpro').html('From Province')
            $('#selectproto').html('To Province') 
        }
    }*/
    var getdatahis;
    // console.log($.cookie("login")+'-----------------------------------------------------------------')
    // if ($.cookie("login")) {
    //     $('#btn_ck_login').hide();
    //     $('#acceptancecheck').show();
    //     $.ajax({
    //         type: 'POST',
    //         url: base_url_tr + 'getuser_control/mainpage',
    //         data: { 'id': $.cookie("login") },
    //         //contentType: "application/json",
    //         dataType: 'json',
    //         success: function(data) {
    //             console.log(data)
    //             datauser = data;
    //             s_code =  data[0].s_code;
    //             code_ref = data[0].s_code_ref;
    //             console.log(s_code)
    //             $.ajax({
    //                 type: 'POST',
    //                 url: base_url_tr + 'dashboard/historylist',
    //                 data: { 's_code': data[0].s_code },
    //                 //contentType: "application/json",
    //                 dataType: 'json',
    //                 success: function(datahis) {
    //                     console.log(datahis)
    //                     getdatahis = datahis;
    //                 }
    //             });
    //             $('.box-login').show();
    //             $('.box-login-non').hide();
    //             $('.box-desboard').show();
    //             if (data[0].s_image == '') {
    //                 $('#photo_profile').html('<img class="" src="' + base_url_tr + 'pic/default-avatar.png">');
    //                 $('.box-login').html('<img class="imgmemu" src="' + base_url_tr + 'pic/default-avatar.png">');
    //             } else {
    //                 $('#photo_profile').html('<img   src="' + base_url_tr + 'pic/' + data[0].s_image + '">');
    //                 $('.box-login').html('<img class="imgmemu" src="' + base_url_tr + 'pic/' + data[0].s_image + '">');
    //             }
    //             $('#usernamess').html(data[0].s_username);
    //             $('#getname').html(data[0].s_name);
    //             $('#btnlogin').css('display', 'none')
    //             $('#btnlogin2').css('display', 'none')
    //             $('#btnuser').css('display', 'block')
    //             $('.caret').css('display', 'inline-block')
    //         }
    //     });

    // } else {
    //     $('#acceptancecheck').hide();
    //     $('#btn_ck_login').show();
    //     $('#photo_non-login').html('<img class="imgmemu" src="' + base_url_tr + 'pic/default-avatar.png">');
    //     $('.box-login').hide();
    //     $('.box-desboard').hide();
    //     $('.box-login-non').show();
    //     $('.placeeditften').remove()
    //     $('#btnlogin').css('display', 'block')
    //     $('#btnlogin2').css('display', 'block')
    //     $('#btnuser').css('display', 'none')
    //     $('.caret').css('display', 'none')
    // }    
    $('.box-polic').click( function() {        
       $('html').removeClass('nav-open');
       setTimeout(function() {
           $toggle.removeClass('toggled');
           $('#bodyClick').remove();
           $('.navbar-toggle').css('display', 'block');
       }, 250);
       $('#police_pop').show(500);        
   });
    $('.lng_canceled').click( function() {
       $('#police_pop').hide();
   });
    $('#service_type').click( function() {
       $('#foget-password').show();
       $('#type_service').show();
       $('#product_service').hide();


       $(this).hide();
   });
    $('.box-list').click( function() {
       $('html').removeClass('nav-open');
       setTimeout(function() {
           $toggle.removeClass('toggled');
           $('#bodyClick').remove();
           $('.navbar-toggle').css('display', 'block');
       }, 250); 
       $('#get_historylist_pop').show(500);
       $('.li_list_history').remove()
       
       console.log(getdatahis)
       if ($.cookie("lng") == 'en' || $.cookie("lng") == undefined) {            
        lang_to_map = 'en';             
    } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH') {
        lang_to_map = 'th';                
    } else if ($.cookie("lng") == 'cn') {            
        lang_to_map = 'zh-CN';                 
    }
    $.each(getdatahis, function(i, val) {
        url2 = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + getdatahis[i].lat_from + ',' + getdatahis[i].lng_from + '&sensor=true&language=' + lang_to_map;
        
        $.post(url2, function(data) {
            console.log(data);
            var pl_his_from = data.results[0].formatted_address                            
            url3 = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + getdatahis[i].lat_to + ',' + getdatahis[i].lng_to + '&sensor=true&language=' + lang_to_map;
            
            $.post(url3, function(data2) {
                console.log(data2);
                var pl_his_to = data2.results[0].formatted_address
                $('#list_historylist').append('<li class="li_list_history" style="font-size: 16px; padding: 5px; border-radius: 15px; border: 1px solid #3b5998;" onclick="getProduct('+getdatahis[i].lat_from+','+getdatahis[i].lng_from+','+dist+','+ getdatahis[i].lat_to+','+getdatahis[i].lng_to+');sendplace(\''+ pl_his_from+'\',\'' + pl_his_to + '\','+ getdatahis[i].lat_from+','+getdatahis[i].lng_from+','+ getdatahis[i].lat_to+','+getdatahis[i].lng_to+',\''+getdatahis[i].fashion+'\')">'+
                    '<table width="100%">'+                           
                    '<tr>'+
                    '<td width="10"></td>'+
                    '<td>'+
                    '<table width="100%">'+
                    '<tr>'+
                    '<td width="10">'+
                    '<div style="width: 10px;  height: 10px;  border-radius: 1px; background: #555;"></div>'+
                    '</td>'+
                    '<td align="left" style="padding-left: 15px;">'+
                    '<span  style="text-align: center;">' + pl_his_from + '</span>'+
                    '</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td colspan="2"><br></td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td width="10">'+
                    '<div style="width: 10px;  height: 10px; border-radius: 1px; background: #3b5998;"></div>'+
                    '</td>'+
                    '<td align="left" style="padding-left: 15px;">'+
                    '<span  style="text-align: center;">' + pl_his_to + '</span>'+
                    '</td>'+
                    '</tr>'+
                    '</table>'+
                    '</td>'+
                    '</tr>'+
                    '</table>'+             
                    '</li>'
                    );
                
            });
        }); 
    });
});
    $('.box-history').click( function() {       
        $('html').removeClass('nav-open');
        setTimeout(function() {
            $toggle.removeClass('toggled');
            $('#bodyClick').remove();
            $('.navbar-toggle').css('display', 'block');
        }, 250);
        $('#get_history_pop').show();
        $('.li_list_history').remove()
        $.ajax({
            type: 'POST',
            url: base_url_tr+'my_place_often/gethistory',
            data: { 'id': $.cookie("login") },
            //contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                console.log(data)
                $.each(data, function(i, val) {                  
                    $('#list_history').append('<li class="li_list_history" style="font-size: 16px; padding: 5px; border-radius: 15px; border: 1px solid #3b5998;" onclick="getProduct('+ data[i].lat_f+',' + data[i].lng_f + ',' + dist + ','+data[i].lat_t+','+data[i].lng_t+');sendplace(\''+ data[i].topic_from+'\',\'' + data[i].topic_to + '\','+ data[i].lat_f+','+data[i].lng_f+','+ data[i].lat_t+','+data[i].lng_t+',\''+data[i].fashion+'\')">'+
                        '<table width="100%">'+                           
                        '<tr>'+
                        '<td width="10"></td>'+
                        '<td>'+
                        '<table width="100%">'+
                        '<tr>'+
                        '<td width="10">'+
                        '<div style="width: 10px;  height: 10px;  border-radius: 1px; background: #555;"></div>'+
                        '</td>'+
                        '<td align="left" style="padding-left: 15px;">'+
                        '<span  style="text-align: center;">' + data[i].topic_from + '</span>'+
                        '</td>'+
                        '</tr>'+
                        '<tr>'+
                        '<td colspan="2"><br></td>'+
                        '</tr>'+
                        '<tr>'+
                        '<td width="10">'+
                        '<div style="width: 10px;  height: 10px; border-radius: 1px; background: #3b5998;"></div>'+
                        '</td>'+
                        '<td align="left" style="padding-left: 15px;">'+
                        '<span  style="text-align: center;">' + data[i].topic_to + '</span>'+
                        '</td>'+
                        '</tr>'+
                        '</table>'+
                        '</td>'+
                        '</tr>'+
                        '</table>'+             
                        '</li>'
                        );
                    
                });
                
                
            }
        });
    });
    $('#close_get_history').click( function() {
        $('#get_history_pop').hide();
    });
    $('#close_get_historylist').click( function() {
        $('#get_historylist_pop').hide();
    });
    $('#addtopic').on('change', function() {
        addtopic = this.value;
        console.log(addtopic)
    });

    $('#province').on('change', function() {
        pro_id = this.value;
        console.log(pro_id)        
    });
    $('#provinceto').on('change', function() {
        pro_id_to = this.value; 
    });

    var data2;
    compae1private = [];
    compae1join = [];
    setTimeout(function() {
        $('#open_map').trigger('click');
    }, 3500);
    $('.btn-close-img').click(function() {
        $('#img-car').hide(500)
    })
    $("#private-btn").click(function() {
        $('#private').show();
        $('#join').hide();
        $('#private').addClass('active');
        $('#join').removeClass('active');
        $(this).css({ "background-color": "#3b5998", "color": " #fff " }

            );
        $("#join-btn").css({ "background-color": "#fff ", "color": "#3b5998" });

    });
    $("#join-btn").click(function() {
        $('#private').hide();
        $('#join').show();
        $('#private').removeClass('active');
        $('#join').addClass('active');
        $(this).css({ "background-color": "#3b5998", "color": "#fff" }
            );
        $("#private-btn").css(
            { "background-color": " #fff", "color": "#3b5998 " 
        });

    });
    $("#show-hide-pro").click(function() {
        $('#box-pax-rel').show(500)
        $('#pac-input').val('');
        $('#current').val('');
        console.log(placeStart);
        $('.a-link-item').remove();
        $('.not-found').remove();
        $('#boxRealtimeto').show(500)
        $('#boxRealtime').show(500)
        curentFromTo ='';
        $(this).hide(50);
    });
    $("#show-hide-pro2").click(function() {
        $(this).fadeOut(50);
        $("#show-hide-pro").fadeIn(50); 
        $("#pro-search").animate({ 'margin-top': '0vh' });
    });
    $("myDate").on("change", function() {
        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format(this.getAttribute("data-date-format"))
            )
    }).trigger("change")
    $('#loading').css('display', 'block');
    $('#content').css('display', 'none');
    setTimeout(function() {
        $('#loading').css('display', 'none');
        $('#content').css('display', 'block');
    }, 3000);

    $('#search-from').click(function() {
        $(this).val('');
    });
    $('#search-to').click(function() {
        $(this).val('');
    });
    $('.btn-management').click(function() {
        $('#loading').css('display', 'block');
        setTimeout(function() {
            $('.box_option').hide(500)            
            $('.btn-management').css({ 'background': '#3b5998' }, { 'color': '#ffffff' });
            $('.btn-car-service').css({ 'background': '#ffffff' }, { 'color': '#333' });
            $('.btn-home').css({ 'background': '#ffffff' }, { 'color': '#333' });
            $('.btn-reservation').css({ 'background': '#ffffff' }, { 'color': '#333' });
            $('.btn-realtime').css({ 'background': '#ffffff' }, { 'color': '#333' });
            $('#loading').css('display', 'none');
            window.location.href = base_url_tr + "dashboard/view_user";
            $("#show-hide-pro2").hide();
        }, 500);
    });
    $('.btn-home').click(function() {
        $('#loading').css('display', 'block');
        setTimeout(function() {
            $('.box_option').hide(500)            
            $('.btn-home').css('color', '#3b5998');
            $('.btn-car-service').css('color', '#333');
            $('.btn-reservation').css('color', '#333');
            $('.btn-management').css('color', '#333');
            $('.btn-realtime').css('color', '#333');
            $('#loading').css('display', 'none');
        }, 500);
    });
    $('.btn-reservation').click(function() {
        $('#loading').css('display', 'block');
        checkshow = true;
        booking = 'Reservation'
        $('#box-pax-rel').hide(500);
        $('#service_type').hide();
        $('#show-hide-pro').hide(500);        
        $('#get_html_book').hide(500);        
        $('#clear-all').click();
        placeRecord(); 
        if(checkreal_or_res == 'Real' || checkreal_or_res == ''){
            setTimeout(function() { 
                $('#boxRealtime').show(500);
                $('#boxForAutoCom').show(500); 
                $('#boxRealtimeto').show(500);
                $('#box-car-service').hide();
                $('#map').show(500);
                $('.box_option').show(500)
                $('.btn-reservation').css({ 'background': '#3b5998', 'color': '#ffffff' });
                $('.btn-home').css({ 'background': '#ffffff', 'color': '#333' });
                $('.btn-management').css({ 'background': '#ffffff', 'color': '#333' });
                $('.btn-realtime').css({ 'background': '#ffffff', 'color': '#333' });
                $('.btn-car-service').css({ 'background': '#ffffff', 'color': '#333' });
                $("#pro-search").hide();
                $("#search-raeltime").fadeIn(1000);    
                $("#list_place").fadeIn(1000);
                $("#show-hide-pro2").hide();
                $('#loading').css('display', 'none');
                $('#search-show').css('display', 'none')
                $('#pac-input').css('display', '');
                $('#current').focus();
                $('#current').addClass('search_focus');
            }, 500);
            checkshowhome = true;
            checkreal_or_res = 'Res'
        }
        else{
            if(checkshowhome == false){
                setTimeout(function() {
                    $('#boxRealtime').show(500);
                    $('#boxForAutoCom').show(500);
                    $('#boxRealtimeto').show(500);
                    $('#box-car-service').hide();
                    $('#map').show(500);
                    $('.box_option').show(500)                    
                    $('.btn-reservation').css({ 'background': '#3b5998', 'color': '#ffffff' });
                    $('.btn-home').css({ 'background': '#ffffff', 'color': '#333' });
                    $('.btn-management').css({ 'background': '#ffffff', 'color': '#333' });
                    $('.btn-realtime').css({ 'background': '#ffffff', 'color': '#333' });
                    $('.btn-car-service').css({ 'background': '#ffffff', 'color': '#333' });
                    $("#pro-search").hide();
                    $("#search-raeltime").fadeIn(1000);        
                    $("#list_place").fadeIn(1000);
                    $("#show-hide-pro2").hide();
                    $('#loading').css('display', 'none');
                    $('#search-show').css('display', 'none')
                    $('#pac-input').css('display', '');
                    $('#current').focus();
                    $('#current').addClass('search_focus');
                }, 500);
                checkshowhome = true;
            }
            else{
                setTimeout(function() {
                    $('#boxRealtime').hide(500);
                    $('#boxForAutoCom').hide(500); 
                    $('#boxRealtimeto').hide(500);
                    $('#box-car-service').hide();
                    $('#map').show(500);
                    $('.box_option').hide(500)
                    $('.btn-reservation').css({ 'background': '#ffffff', 'color': '#333' });  
                    $('.btn-home').css({ 'background': '#ffffff', 'color': '#333' });
                    $('.btn-management').css({ 'background': '#ffffff', 'color': '#333' });
                    $('.btn-realtime').css({ 'background': '#ffffff', 'color': '#333' });
                    $('.btn-car-service').css({ 'background': '#ffffff', 'color': '#333' });
                    $("#pro-search").hide();
                    $("#search-raeltime").hide(1000);
                    $("#list_place").hide(1000);
                    $("#show-hide-pro2").hide();
                    $('#loading').css('display', 'none');
                    $('#search-show').css('display', 'none')
                    $('#pac-input').css('display', '');
                }, 500);      
                checkshowhome = false;
            }
        }
    });

$('.btn-realtime').click(function() {
    $('#clear-all').click();
    reltimeclick = 1;
    booking = 'Realtime';
    checkshow = true;
    placeRecord();
    $('#box-pax-rel').hide(500);
    $('#get_html_book').hide(500);
    $('#service_type').hide();
    $('#show-hide-pro').hide(500)
    $('#loading').css('display', 'block');
    if(checkreal_or_res == 'Res' || checkreal_or_res == ''){
        setTimeout(function() {
            $('#boxRealtime').show(500);
            $('#boxForAutoCom').show(500); 
            $('#boxRealtimeto').show(500);
            $('#box-car-service').hide();
            $('#map').show(500);
            $('.box_option').show(500)
            $('.btn-realtime').css({ 'background': '#3b5998', 'color': '#ffffff' });
            $('.btn-reservation').css({ 'background': '#ffffff', 'color': '#333' });
            $('.btn-home').css({ 'background': '#ffffff', 'color': '#333' });
            $('.btn-management').css({ 'background': '#ffffff', 'color': '#333' });
            $('.btn-car-service').css({ 'background': '#ffffff', 'color': '#333' });
            $("#pro-search").hide();
            $("#search-raeltime").fadeIn(1000);    
            $("#list_place").fadeIn(1000);
            $("#show-hide-pro2").hide();
            $('#loading').css('display', 'none');
            $('#search-show').css('display', 'none')
            $('#pac-input').css('display', '');
            $('#current').val(addr)
            $('#pac-input').focus();
            $('#pac-input').addClass('search_focus'); 

        }, 500);
        checkshowhome = true;
        checkreal_or_res = 'Real'
    }
    else{
        if(checkshowhome == false){
            setTimeout(function() {
                $('#boxRealtime').show(500);
                $('#boxForAutoCom').show(500);
                $('#boxRealtimeto').show(500);
                $('#box-car-service').hide();
                $('#map').show(500);
                $('.box_option').show(500)                    
                $('.btn-realtime').css({ 'background': '#3b5998', 'color': '#ffffff' });       
                $('.btn-reservation').css({ 'background': '#ffffff', 'color': '#333' });
                $('.btn-home').css({ 'background': '#ffffff', 'color': '#333' });
                $('.btn-management').css({ 'background': '#ffffff', 'color': '#333' });
                $('.btn-car-service').css({ 'background': '#ffffff', 'color': '#333' });
                $("#pro-search").hide();
                $("#search-raeltime").fadeIn(1000);        
                $("#list_place").fadeIn(1000);
                $("#show-hide-pro2").hide();
                $('#loading').css('display', 'none');
                $('#search-show').css('display', 'none')
                $('#pac-input').css('display', '');
                $('#pac-input').focus();
                $('#pac-input').addClass('search_focus'); 
            }, 500);
            checkshowhome = true;
        }
        else{
            setTimeout(function() {
                $('#boxRealtime').hide(500);
                $('#boxForAutoCom').hide(500); 
                $('#boxRealtimeto').hide(500);
                $('#box-car-service').hide();
                $('#map').show(500);
                $('.box_option').hide(500)
                $('.btn-realtime').css({ 'background': '#fff', 'color': '#333' });
                $('.btn-reservation').css({ 'background': '#ffffff', 'color': '#333' });
                $('.btn-home').css({ 'background': '#ffffff', 'color': '#333' });
                $('.btn-management').css({ 'background': '#ffffff', 'color': '#333' });
                $('.btn-car-service').css({ 'background': '#ffffff', 'color': '#333' });
                $("#pro-search").hide();
                $("#search-raeltime").hide(1000);        
                $("#list_place").hide(1000);
                $("#show-hide-pro2").hide();
                $('#loading').css('display', 'none');
                $('#search-show').css('display', 'none')
                $('#pac-input').css('display', '');
            }, 500);      
            checkshowhome = false;
        }
    }
});


/**********************************************************/
/************ GET PROVINCE FROM, FROM SERVICE *************/
/**********************************************************/
$('#selectproto').click(function(){
    $('#box-provinceto').show(500);
    var lng;
    if ($.cookie("lng") == undefined) {
        lng = 'en';
    } else {
        lng = $.cookie("lng");    
    }
    $('.stayto').remove()
    console.log(proFrom)
    $.ajax({
        type: 'POST',
        url: base_url_tr+'service/getstayto.php',
        data: { 'from': proFrom, 'lng': lng },
            //contentType: "application/json",
            dataType: 'json',
            success: function(data) {    
                console.log(data)
                var datastay = data[0].data1;
                console.log(datastay)
                if ($.cookie("lng") == 'en' ) {
                    $.each(datastay, function(i, val) {
                        $('#provinceto').append('<li class="stayto" id="proTo'+datastay[i].stay_to+'" proTo="'+datastay[i].name+'"   onclick="sendproto(\''+datastay[i].stay_to+'\',\''+datastay[i].name+'\');"><span>' + datastay[i].name + '</span></li>');
                    });
                } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH' || $.cookie("lng") == undefined) {
                    $.each(datastay, function(i, val) {
                        $('#provinceto').append('<li class="stayto" id="proTo'+datastay[i].stay_to+'" proTo="'+datastay[i].name_th+'"  onclick="sendproto(\''+datastay[i].stay_to+'\',\''+datastay[i].name_th+'\');"><span>' + datastay[i].name_th + '</span></li>');
                    });
                } else if ($.cookie("lng") == 'cn') {
                    $.each(datastay, function(i, val) {
                        $('#provinceto').append('<li class="stayto" id="proTo'+datastay[i].stay_to+'" proTo="'+datastay[i].name_cn+'"  onclick="sendproto(\''+datastay[i].stay_to+'\',\''+datastay[i].name_cn+'\');"><span>' + datastay[i].name_cn + '</span></li>');
                    });
                } 
            }
        })
})
$('.closepoptype').click(function() {
    $('#pac-input').val('');
    $('#current').val('');
    console.log(placeStart);
    $('.a-link-item').remove();
    $('.not-found').remove();
    $('.typerel').remove();
    $('#boxRealtimeto').show(500)
    $('#boxRealtime').show(500)
    curentFromTo ='';        
    resetMap();
    $('#pro-search').hide(500) 
});
$('.closepop').click(function() {
    $('#foget-password').hide(500)
    $('#box-province').hide(500)
    $('#box-provinceto').hide(500)
    $('#box-pax-use').hide(500)
    $('#box-pax-rel').hide(500)
    $('#img-car').hide(500)
});

/**********************************************************/
/************* GET PROVINCE TO, FROM SERVICE **************/
/**********************************************************/
$('#selectpro').click(function() {
    $('#box-province').show(500);
    var lng;
    $('.stayfrom').remove();
    if ($.cookie("lng") == undefined) {
        lng = 'en';
    } else {
        lng = $.cookie("lng");
    }
    console.log(lng)
    $.ajax({
        type: 'POST',
        url: base_url_tr+'service/getstay.php',
        data: { 'lng': lng },
            //contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                console.log(data)
                console.log('*********************************')
                var datastayfrom = data[0].data1;
                console.log(datastayfrom)
                if ($.cookie("lng") == 'en') {
                    $.each(datastayfrom, function(i, val) {
                        $('#province_service').append('<li class="stayfrom" id="proFrom'+datastayfrom[i].stay+'" proFrom="'+datastayfrom[i].name+'"  onclick="sendpro(\''+datastayfrom[i].stay+'\',\''+datastayfrom[i].name+'\');"><span>' + datastayfrom[i].name + '</span></li>');
                    });
                } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH' || $.cookie("lng") == undefined) {
                    $.each(datastayfrom, function(i, val) {
                        $('#province_service').append('<li class="stayfrom" id="proFrom'+datastayfrom[i].stay+'" proFrom="'+datastayfrom[i].name_th+'"  onclick="sendpro(\''+datastayfrom[i].stay+'\',\''+datastayfrom[i].name_th+'\');"><span>' + datastayfrom[i].name_th + '</span></li>');
                    });
                } else if ($.cookie("lng") == 'cn') {
                    $.each(datastayfrom, function(i, val) {
                        $('#province_service').append('<li class="stayfrom" id="proFrom'+datastayfrom[i].stay+'" proFrom="'+datastayfrom[i].name_cn+'"  onclick="sendpro(\''+datastayfrom[i].stay+'\',\''+datastayfrom[i].name_cn+'\');"><span>' + datastayfrom[i].name_cn + '</span></li>');
                    });
                } 
            }
        });
});
$('.btn-car-service').click(function() {        
    booking = 'Service';
    $('#clear-all').click();
    $('#btn_CurrentLocation').hide();
    $('#clear-all').hide();
    $('#box-pax-rel').hide(500);
    $('#get_html_book').hide(500);
    $('#show-hide-pro').hide(500);
    $('#loading').css('display', 'block');
    $('#opennut').click();
    setTimeout(function() {
        $('#boxForAutoCom').hide(500)
        $('.box_option').hide(500)
        $('#box-car-service').show(500);
        if ($.cookie("lng") == 'en') { 
            $('#selectpro').html('From Province')
            $('#selectproto').html('To Province')                
        } else if ($.cookie("lng") == 'th' || $.cookie("lng") == undefined) {               
            $('#selectpro').html('จากจังหวัด')
            $('#selectproto').html('ไปยังจังหวัด') 
        } else if ($.cookie("lng") == 'cn') {
            $('#selectpro').html('從省')
            $('#selectproto').html('到省')
        } 
        $('#map').hide();
        $('.btn-car-service').css({ 'background': '#3b5998', 'color': '#ffffff' });
        $('.btn-realtime').css({ 'background': '#ffffff', 'color': '#333' });
        $('.btn-reservation').css({ 'background': '#ffffff', 'color': '#333' });
        $('.btn-home').css({ 'background': '#ffffff', 'color': '#333' });
        $('.btn-management').css({ 'background': '#ffffff', 'color': '#333' });
        $("#show-hide-pro").hide();
        $("#show-hide-pro2").hide();
        $("#pro-search").hide();
        $("#search-raeltime").hide()
        $("#list_place").hide();
        $('#loading').css('display', 'none');
        $('#search-show').css('display', 'none')
        $('#pac-input').css('display', '');
    }, 500);
});
$('#cartype').on('change', changeType);
$('#cartype').on('change', function() {
    $('.a-link-item').remove();
    
});
var quotations = [];    
$('#btn-logout-user').on('click', function() {
    if ($.cookie("lng") == "en" ) {
        var title_logout = "Logout ?";
        var text_logout = "Do you want to logout?";
        var yes = "Yes";
        var cancel = "Cancel"
    } else if ($.cookie("lng") == "cn") {
        var title_logout = "登出 ?";
        var text_logout = "您需要注销 ?";
        var yes = "是";
        var cancel = "取消";
    } else if ($.cookie("lng") == "th" || $.cookie("lng") == 'th-TH' || $.cookie("lng") == undefined) {
        var title_logout = "ออกจากระบบ ?";
        var text_logout = "คุณต้องการออกจากระบบหรือไม่?";
        var yes = "ใช่";
        var cancel = "ยกเลิก";
    } 
    swal({
        title: '' + title_logout + '',
        text: '' + text_logout + '',
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: yes,
        cancelButtonText: cancel,
        closeOnConfirm: false
    },
    function() {
        console.log('logout');
        $.removeCookie("login");

        window.location.reload();

    });
})
$('#selectype').click(function(){
    $('#foget-password').show(500);
});
    // $('#select_pax_use').click(function(){
    //     $('#show-hide-pro').hide()
    //     if(reltimeclick == 1){
    //         $('#box-pax-rel').show(500);
    //     }
    //     else{
    //         $('#box-pax-use').show(500);
    //     }
    
    // });
    $('.btn-show-select').click(function() {
        console.log('hide-show');
        $('.box-menu-select').css('bottom', '-200px')
        $('.btn-show-select').css('display', 'none');
        $('.btn-hide-select').css('display', 'block');
    });
    $('.btn-hide-select').click(function() {
        console.log('hide-show');
        $('.box-menu-select').css('bottom', '0')
        $('.btn-hide-select').css('display', 'none');
        $('.btn-show-select').css('display', 'block');
    });
    $('.box-login-non').click(function() {
        $('#loading').css('display', 'block');
        // setTimeout(function() {

        //     window.location.href = base_url_tr + "register";
        // }, 500);
        
        $('#popup-login').show(500);
        setTimeout(function() {

            $('#loading').hide();
        }, 500);
    });
    

    var dataplace;
    $('#search-from').keyup(function() {
        dataplace = '';
        input = document.getElementById("search-from");
        console.log(input.value)
        if (input.value.length >= 3) {
            $.ajax({
                type: 'POST',
                url: base_url_tr+'service/servicepro.php',
                data: { 'input': input.value.toLowerCase() },
                //contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    console.log(data)
                    dataplace = data
                    var setvaluebox = '';
                    if (data.length > 0) {
                        console.log(data.length)
                        $('.box-plancefrom').css('display', 'block')
                        sendValuetojs(data);
                        $.each(dataplace, function(i, val) {
                            setvaluebox += '<li class="send-value" id="transferplace' + data[i].id + '" dataname ="' + data[i].topic + '" lat_f="' + data[i].latitude + '" lng_f="' + data[i].longitude + '" datapro="' + data[i].pro + '" dataaum="' + data[i].pro + '"onclick="sendValue(\'' + data[i].id + '\');"><i class="material-icons " style="float: left; margin-right: 15px;    font-size: 30px; color: #16b3b1;">add_location</i><div style="margin-left: 40px;"><span class="name">' + data[i].topic + '</span><br><span style="text-align: left;font-size:13px;">' + data[i].address + '</div></li>';

                        });
                        $('#box-plancefrom').html(setvaluebox)
                    } else if (data.length <= 0 || input.value == '') {
                        $('.box-plancefrom').css('display', 'none');
                    }
                }
            });
        } else {
            $('#box-plancefrom').html('');
            $('.box-plancefrom').css('display', 'none');
        }
    });
    
    $('#search-to').keyup(function() {        
        input = document.getElementById("search-to");
        console.log(input.value)
        console.log(input.value.toLowerCase())
        if (input.value.length >= 3) {
            $.ajax({
                type: 'POST',
                url: base_url_tr+'service/servicepro.php',
                data: { 'input': input.value.toLowerCase() },
                //contentType: "application/json",
                dataType: 'json',
                success: function(data) {
                    console.log(data)
                        //$('#box-plancefrom').text('');
                        dataplace = data
                        var setvalueboxto = '';
                        if (data.length > 0) {

                            $('.box-planceto').css('display', 'block')
                            $.each(dataplace, function(i, val) {
                                setvalueboxto += '<li class="send-value" id="transferplaceto' + data[i].id + '" dataname ="' + data[i].topic + '" datapro="' + data[i].pro + '" dataaum="' + data[i].pro + '" lat_t="' + data[i].latitude + '" lng_t="' + data[i].longitude + '"onclick="sendValueto(\'' + data[i].id + '\');"><i class="material-icons " style="float: left; margin-right: 15px; font-size: 30px; color: #16b3b1;">add_location</i><div style="margin-left: 40px;"><span class="name">' + data[i].topic + '</span><br><span style="text-align: left;font-size:13px;">' + data[i].address + '</div></li>';
                            });
                            $('#box-planceto').html(setvalueboxto)
                        } else if (data.length <= 0 || input.value == '') {
                            $('.box-planceto').css('display', 'none');
                        }
                    }
                });
        } else {
            $('#box-planceto').html('');
            $('.box-planceto').css('display', 'none');
        }
    });
});

function create_word(input) {
    var word;
    var ascii;
    for (var i = 0; i < input.length; i++) {
        ascii = input.charCodeAt(i);
        if (i == 0)
            word = String.fromCharCode(ascii);
        else
            word += String.fromCharCode(ascii);
    }
    return word;
}

/**************************************************************************************/
/**********************************select place from***********************************/
/**************************************************************************************/

//var datato = [];
function sendValuetojs(data) {
    // console.log(data)
    dataplaceSend = data;
}


/*************************************/
/********** GET DATA PROFROM************/
/*************************************/

function sendpro(x,pro){
    pro_service_from = pro;
    console.log(x)
    proFrom = x;
    console.log(proFrom)
    $('#selectpro').html($('#proFrom' + x).attr('profrom'))
    
    $('#box-province').hide();
}

/*************************************/
/********** GET DATA PROTO************/
/*************************************/

function sendproto(x,proto){
    console.log(x)
    proTo = x;
    pro_service_to = proto;
    console.log(proTo)
    $('#selectproto').html($('#proTo' + x).attr('proto'))
    
    $('#box-provinceto').hide();
    // $('#service_type').show();
    var lng;
    
    if ($.cookie("lng") == undefined) {
        lng = 'en';
    } else {
        lng = $.cookie("lng");
    }
    var parampro = {
        "from": proFrom,
        "to": proTo,
        "lng": lng,
    };
    $('.a-link-item').remove()
    console.log(parampro)
    $('#loading').show()
    $.ajax({
        type: 'POST',
        url: base_url_tr+'service/carservice.php',
        data: parampro,
        //contentType: "application/json",
        dataType: 'json',
        success: function(data) {
            console.log(data)
            $('.a-link-item').remove();
            $('.typeservice').remove();
            $('#loading').hide();
            datacaedervice = data[0];
            console.log(datacaedervice)
            if (data[0].data1.length == 0) {
                $('#foget-password').hide()
                $('.not-found').show()
            } else {
                $('.not-found').hide()
                $('#foget-password').show(500)
                cartype = data[0].car_topic;
                var datasort = new Array()
                $.each(cartype, function(i, val) {
                    datasort.push(cartype[i])
                });                
                datasort.sort(function(a, b){
                    return a.person-b.person
                });
                console.log(datasort)
                var datalength = data[0].car_topic;
                console.log(datalength.Length)
                console.log(cartype)                
                console.log(data1)
                $.each(datasort, function(i, val) {
                    $('#type_service').show()
                    var index2 = parseInt(i) + 1;
                    var type,typeshow,pax;
                    type = datasort[i].pax_id;
                    if ($.cookie("lng") == 'cn') {
                        $('#selectype').html( '所有類型')
                        typeshow = datasort[i].car_topic_cn;
                        pax = datasort[i].pax_cn;

                    } else if ($.cookie("lng") == 'en') {
                        $('#selectype').html( 'All Type')

                        
                        typeshow = datasort[i].car_topic_en;
                        pax = datasort[i].pax_en;
                    } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH' || $.cookie("lng") == undefined) {
                        $('#selectype').html( 'ทุกประเภท')
                        typeshow = datasort[i].car_topic_th;
                        pax = datasort[i].pax_th;
                    }
                    console.log(type)
                    console.log(datasort.length)
                    $('#type_service').append('<li class="typeservice" id="typeservice'+datasort[i].transfer_id+'"  onclick="sendpax(\'' + datasort[i].pax_id + '\') "><span>' + typeshow + '</span>&nbsp;<span class="pax-person" >' + pax + '</span><div style="float: right;display: inline-block;"><span style="padding-right: 5px;">'+lng_price+':'+'</span>'+datasort[i].cost_a+'</div></li>');
                    
                }); 
            }
        }
    });
}


function sendValue(x) {
    $('.box_to').show(500);
    $('.box_from').hide(500)
    $('#current-addr').hide();
    id_placefrom = x;
    pro_from = $('#transferplace' + x).attr('datapro');
    var name = $('#transferplace' + x).attr('dataname');
    aum_from = $('#transferplace' + x).attr('dataaum');
    lat_from = $('#transferplace' + x).attr('lat_f');
    lng_from = $('#transferplace' + x).attr('lng_f');
    $('#search-from').val(name)
    $('.box-plancefrom').css('display', 'none');
    start_st = {
        lat: parseFloat(lat_from),
        lng: parseFloat(lng_from)
    }
    console.log(start_st);
    startMarker.setVisible(true);
    map.panTo(start_st);
    startMarker.setPosition(start_st);
    $('#clear-all').show(500);
}

/**************************************************************************************/
/**********************************select place to***********************************/
/**************************************************************************************/


function sendpaxuse(x) {
    $('#box-pax-use').hide();
    $('#loading').css('display', 'block');
    $('.a-link-item').remove();
    $('#box-prosearch').css('display', 'none');
    $('#product_a').css('display', 'none');
    // $('#loading').css('display', 'block');

    setTimeout(function() {
        console.log("aaaaa")
        $('#loading').css('display', 'none');
        $('#product_a').css('display', 'block');
        $('#box-prosearch').css('display', 'block');
    }, 500);
    comparedata = [];
    compae1private = [];
    compae1join = [];
    data2 = [];
    ctype = x;   
    getdataservice = dataUse.car_topic
    console.log(ctype)
    console.log(getdataservice)
    console.log(dataUse)
    $.each(getdataservice, function(i, val) {  
     if ($.cookie("lng") == 'cn') {
         if (getdataservice[i].pax_id == ctype) {
             
             $('#select_pax_use').html( getdataservice[i].car_topic_cn+' '+'<span style="    color: #f44336;">'+getdataservice[i].pax_cn+'</span>')
         } else if (ctype == '0') {
             $('#select_pax_use').html( '所有類型')        
         }
     } else if ($.cookie("lng") == 'en') {
         if (getdataservice[i].pax_id == ctype) {
             $('#select_pax_use').html( getdataservice[i].car_topic_en+' '+'<span style="    color: #f44336;">'+getdataservice[i].pax_en+'</span>')
         } else if (ctype == '0') {
             $('#select_pax_use').html( 'All Type')
         }

     } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH' || $.cookie("lng") == undefined) {
         if (getdataservice[i].pax_id == ctype) {
             $('#select_pax_use').html(getdataservice[i].car_topic_th+' '+'<span style="color: #f44336;">'+getdataservice[i].pax_th+'</span>')
         } else if (ctype == '0') {
             $('#select_pax_use').html( 'ทุกประเภท')              
         }

     } 
 })
    $.each(dataUse.data1, function(i, val) {
        if ($.cookie("lng") == 'cn') {
            if (dataUse.data1[i].pax_id == ctype) {
                comparedata.push(dataUse.data1[i])
            } else if (ctype == 0) {
               comparedata.push(dataUse.data1[i])
           }
       } else if ($.cookie("lng") == 'en') {
        if (dataUse.data1[i].pax_id == x) {
            comparedata.push(dataUse.data1[i])
        } else if (ctype == 0) {
           comparedata.push(dataUse[0].data1[i])
       }
   } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH' || $.cookie("lng") == undefined) {
    if (dataUse.data1[i].pax_id == ctype) {
       comparedata.push(dataUse.data1[i])
   } else if (ctype == 0) {
       comparedata.push(dataUse.data1[i])
   }
} 
})
    console.log(comparedata)
    $.each(comparedata, function(i, val) {
        if (comparedata[i].type == 'Private') {
            compae1private.push(comparedata[i])
        }
        if (comparedata[i].type == 'Join') {
            compae1join.push(comparedata[i])
        }
    })
    console.log(compae1join);
    var car_topic, cartype, pax;
    var urlicon = base_url_tr + 'files/images/carmodelicon/';
    //if (data[0].data1.length != 0) {
        $.each(compae1private, function(i, val) {
            var indexs = parseInt(i) + 1;
            if ($.cookie("lng") == 'cn') {
                car_topic = compae1private[i].topic_cn;
                cartype = compae1private[i].car_topic_cn;
                pax = compae1private[i].pax_cn;
                lngbook = '預訂';
                lngcapacityinfo = '車容量';
                lngdetails = '细节';
                lngfacilities = '设施';
            } else if ($.cookie("lng") == 'en') {
                car_topic = compae1private[i].topic_en;
                cartype = compae1private[i].car_topic_en;
                pax = compae1private[i].pax_en;
                lngbook = 'Book';
                lngcapacityinfo = 'Capacity';
                lngdetails = 'details';            
                lngfacilities = 'Facilities';
            } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH' || $.cookie("lng") == undefined) {
                car_topic = compae1private[i].topic_th;
                cartype = compae1private[i].car_topic_th;
                pax = compae1private[i].pax_th;
                lngbook = 'จอง';
                lngcapacityinfo = 'ความจุรถ ';
                lngdetails = 'รายละเอียด';            
                lngfacilities = 'สิ่งอำนวยความสะดวก';  
            } 
            $('#product_a').append('<div class="a-link-item col-lg-12" >' +
            // '<div class="item-thumbnail2" onclick="getimage(\'' + compae1private[i].car_model + '\') ">' +
            // '<img src="' + urlicon + compae1private[i].transfer_icon + '.jpg">' +
            // '</div>' +
            // '<table width="100%">' +
            // '<tr>' +
            // '<td style="width: 30px;">' +
            // '<span class="hotel_num">' + indexs + '</span>' +
            // '</td>' +

            // '<td>' +
            // '<h2 class="searchresult_name"title="product name"><span>' + car_topic + '</span></h2>' +
            // '</td>' +
            // '</tr>' +
            // '</table>' +
            // '<div class="box-province">' +
            // '<p class="type-t">' +
            // '<span class="car-type" >' + cartype + pax + '</span>' +
            // '</p>' +
            // '</div>' +
            // '<div id="box-cost-view">' +
            // '<div class="product_r">' +
            // '<span class="base_price"></span>' +
            // '<span class="sala">' + compae1private[i].cost_a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '฿' + '</span>' +

            // '</div>' +
            // '<div class="views-item" >' +
            // '<a  href="book?data=' + compae1private[i].transfer_id + '&from=' + id_placefrom + '&to=' + id_placeto + '" > <span >' + lngbook + '</span></a>' +

            // '</div>' +
            // '</div>' +
            // '<div id="i-list"   onclick="getcondition(\'' + compae1private[i].car_model + '\')">' +
            // '<p id="capacity"><div ">' + lngcapacityinfo + '</div><div ">' + lngdetails + '</div></p>' +
            // '<i class="material-icons">search</i>' +
            // '</div>' +
            // '</div>'


            '<table width="100%">' +
            '<tr>' +
            '<td  colspan="2" style="width: 100%">' +
            '<h2 class="searchresult_name"title="product name"><span>' + car_topic + '</span></h2>' +
            '</td>' +
            '</tr>' +
            '<tr>'+
            '<td align="center">'+
            
            '<span class="hotel_num">' + indexs + '</span>' +
            
            '<div class="item-thumbnail2" onclick="getimage(\'' + compae1private[i].car_model + '\') ">' +
            '<img src="' + urlicon + compae1private[i].transfer_icon + '.jpg">' +
            '</div>' +
            '</td >'+ 
            
            '<td  align="center" valign="top">'+
            '<div id="i-list"   onclick="getcondition(\'' + compae1private[i].car_model + '\')">' +
            '<p id="capacity"><div>' + lngcapacityinfo + '</div><div>' + lngdetails + '</div></p>' +
            '<i class="material-icons">search</i>' +
            '</div>' +    
            '</td >'+
            
            '</tr>'+
            '<tr>'+
            '<td >'+
            
            
            '</td >'+ 
            
            '<td  align="center" valign="top">'+
            '<div id="">' +
            '<div class="product_r">' +
            '<span class="base_price"></span>' +
            '<span class="sala">' + compae1private[i].cost_a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '฿' + '</span>' +
            '</div>' +
            '<div class="views-item" onclick="bookingdetail('+ compae1private[i].transfer_id+',' + dataPlacefrom + ',' + dataPlaceto + ','+lat_f+','+lng_f+','+lat_t+','+lng_t+',\''+booking+'\')">' +
            '<a > <span >' + lngbook + '</span></a>' +
            '</div>' +
            '</div>' +  
            '</td >'+
            '</tr>'+
            '</table>' +
            '</div>'

            );
    }); //end private

$.each(compae1join, function(i, val) {
    var indexs = parseInt(i) + 1;
    if ($.cookie("lng") == 'cn') {
        car_topic = compae1join[i].topic_cn;
        cartype = compae1join[i].car_topic_cn;
        pax = compae1join[i].pax_cn;
        lngbook = '預訂';
        lngcapacityinfo = '車容量';
        lngdetails = '细节';
        lngfacilities = '设施';
    } else if ($.cookie("lng") == 'en' ) {
        car_topic = compae1join[i].topic_en;
        cartype = compae1join[i].car_topic_en;
        pax = compae1join[i].pax_en;
        lngbook = 'Book';
        lngcapacityinfo = 'Capacity';
        lngdetails = 'details';            
        lngfacilities = 'Facilities';
    } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH' || $.cookie("lng") == undefined) {
        car_topic = compae1join[i].topic_th;
        cartype = compae1join[i].car_topic_th;
        pax = compae1join[i].pax_th;
        lngbook = 'จอง';
        lngcapacityinfo = 'ความจุรถ ';
        lngdetails = 'รายละเอียด';            
        lngfacilities = 'สิ่งอำนวยความสะดวก';
    } 
    $('#product_c').append('<div class="a-link-item col-lg-12" >' +
            // '<div class="item-thumbnail2" onclick="getimage(\'' + compae1join[i].car_model + '\')">' +
            // '<img src="' + urlicon + compae1join[i].transfer_icon + '.jpg">' +
            // '</div>' +
            // '<table width="100%">' +
            // '<tr>' +
            // '<td style="width: 30px;">' +
            // '<span class="hotel_num">' + indexs + '</span>' +
            // '</td>' +

            // '<td>' +
            // '<h2 class="searchresult_name"title="product name"><span>' + car_topic + '</span></h2>' +
            // '</td>' +
            // '</tr>' +
            // '</table>' +
            // '<div class="box-province">' +
            // '<p class="type-t">' +
            // '<span class="car-type" >' + cartype + pax + '</span>' +
            // '</p>' +
            // '</div>' +
            // '<div id="box-cost-view">' +
            // '<div class="product_r">' +
            // '<span class="base_price"></span>' +
            // '<span class="sala">' + compae1join[i].cost_a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '฿' + '</span>' +

            // '</div>' +
            // '<div class="views-item" >' +
            // '<a  href="book?data=' + compae1join[i].transfer_id + '&from=' + id_placefrom + '&to=' + id_placeto + '" > <span >' + lngbook + '</span></a>' +

            // '</div>' +
            // '</div>' +
            // '<div id="i-list"   onclick="getcondition(\'' + compae1join[i].car_model + '\')">' +
            // '<p id="capacity"><div ">' + lngcapacityinfo + '</div><div ">' + lngdetails + '</div></p>' +
            // '<i class="material-icons">search</i>' +
            // '</div>' +
            // '</div>'


            '<table width="100%">' +
            '<tr>' +
            '<td  colspan="2" style="width: 100%">' +
            '<h2 class="searchresult_name"title="product name"><span>' + car_topic + '</span></h2>' +
            '</td>' +
            '</tr>' +
            '<tr>'+
            '<td align="center">'+
            
            '<span class="hotel_num">' + indexs + '</span>' +
            
            '<div class="item-thumbnail2" onclick="getimage(\'' + compae1join[i].car_model + '\') ">' +
            '<img src="' + urlicon + compae1join[i].transfer_icon + '.jpg">' +
            '</div>' +
            '</td >'+ 
            
            '<td  align="center" valign="top">'+
            '<div id="i-list"   onclick="getcondition(\'' + compae1join[i].car_model + '\')">' +
            '<p id="capacity"><div>' + lngcapacityinfo + '</div><div>' + lngdetails + '</div></p>' +
            '<i class="material-icons">search</i>' +
            '</div>' +    
            '</td >'+
            
            '</tr>'+
            '<tr>'+
            '<td >'+
            
            
            '</td >'+ 
            
            '<td  align="center" valign="top">'+
            '<div id="">' +
            '<div class="product_r">' +
            '<span class="base_price"></span>' +
            '<span class="sala">' + compae1join[i].cost_a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '฿' + '</span>' +
            '</div>' +
            '<div class="views-item" onclick="bookingdetail('+ compae1join[i].transfer_id+',' + dataPlacefrom + ',' + dataPlaceto + ','+lat_f+','+lng_f+','+lat_t+','+lng_t+',\''+booking+'\')">' +
            '<a > <span >' + lngbook + '</span></a>' +
            '</div>' +
            '</div>' +  
            '</td >'+
            '</tr>'+
            '</table>' +
            '</div>'

            );
});
if(x== 2 || x== 17){
    $('#join-btn').css({ "background-color": "#3b5998", "color": "#fff" }        
        );
    $("#private-btn").css({ "background-color": " #fff", "color": "#3b5998 " }        
        ); 
    $('#private-btn').removeClass('active');
    $('#join-btn').addClass('active');
    $('#join').show();
    $('#private').hide(); 
}
else{
    $('#join-btn').css({ "background-color": "#fff", "color": "#3b5998" }        
        );
    $("#private-btn").css({ "background-color": " #3b5998", "color": "#fff " }        
        ); 
    $('#private-btn').addClass('active');
    $('#join-btn').removeClass('active');
    $('#join').hide();
    $('#private').show();        
}
console.log(getdataservice)
console.log(dataRel)
}

function sendpax(x) {

    console.log(x)
    $('#foget-password').hide();
    $('#service_type').show();
    $('#product_service').show();
    $('#type_service').hide();

    $('#loading').css('display', 'block');
    $('.a-link-item').remove();
    $('#product_service').animate({ scrollTop: 0 }, '500');
    setTimeout(function() {
     $('#loading').css('display', 'none');
 }, 500);
    dataService = [];
    ctypeservice = x;
    console.log(ctypeservice)
    console.log(datacaedervice)
    $.each(datacaedervice.data1, function(i, val) {  
     if ($.cookie("lng") == 'cn') {
         if (datacaedervice.data1[i].pax_id == ctypeservice) {
             dataService.push(datacaedervice.data1[i])
             $('#selectype').html( datacaedervice.data1[i].car_topic_cn+' '+'<span style="    color: #f44336;">'+datacaedervice.data1[i].pax_cn+'</span>')
         } else if (ctypeservice == '0') {
             dataService.push(datacaedervice.data1[i])
             $('#selectype').html( '所有類型') 
         }
     } else if ($.cookie("lng") == 'en' ) {
         if (datacaedervice.data1[i].pax_id == ctypeservice) {
             dataService.push(datacaedervice.data1[i])
             $('#selectype').html( datacaedervice.data1[i].car_topic_en+' '+'<span style="    color: #f44336;">'+datacaedervice.data1[i].pax_en+'</span>')
         } else if (ctypeservice == '0') {
             dataService.push(datacaedervice.data1[i])
             $('#selectype').html( 'All Type')
             
         }
     } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH' || $.cookie("lng") == undefined) {
         if (datacaedervice.data1[i].pax_id == ctypeservice) {
             dataService.push(datacaedervice.data1[i])
             $('#selectype').html(datacaedervice.data1[i].car_topic_th+' '+'<span style="    color: #f44336;">'+datacaedervice.data1[i].pax_th+'</span>')
         } else if (ctypeservice == '0') {
             dataService.push(datacaedervice.data1[i])
             $('#selectype').html( 'ทุกประเภท')               
         }
     } 
 })

    console.log(dataService)
    var car_topic, cartype, pax;
    var urlicon = base_url_tr + 'files/images/carmodelicon/';
    $.each(dataService, function(i, val) {
     var indexs = parseInt(i) + 1;
     if ($.cookie("lng") == 'cn') {
         car_topic = dataService[i].topic_cn;
         cartype = dataService[i].car_topic_cn;
         pax = dataService[i].pax_cn;
         lngbook = '預訂';
         lngcapacityinfo = '車容量';
         lngdetails = '细节';
         lngfacilities = '设施';
     } else if ($.cookie("lng") == 'en' ) {
         car_topic = dataService[i].topic_en;
         cartype = dataService[i].car_topic_en;
         pax = dataService[i].pax_en;
         lngbook = 'Book';
         lngcapacityinfo = 'Capacity';
         lngdetails = 'details';           
         lngfacilities = 'Facilities';

     } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH' || $.cookie("lng") == undefined) {
         car_topic = dataService[i].topic_th;
         cartype = dataService[i].car_topic_th;
         pax = dataService[i].pax_th;
         lngbook = 'จอง';
         lngcapacityinfo = 'ความจุรถ ';
         lngdetails = 'รายละเอียด';           
         lngfacilities = 'สิ่งอำนวยความสะดวก';
     } 

     $('#product_service').append('<div class="a-link-item col-lg-12" >' +
           // '<div class="item-thumbnail2" onclick="getimage(\'' + dataService[i].car_model + '\') ">' +
           // '<img src="' + urlicon + dataService[i].transfer_icon + '.jpg">' +
           // '</div>' +
           // '<table width="100%">' +
           // '<tr>' +
           // '<td style="width: 30px;">' +
           // '<span class="hotel_num">' + indexs + '</span>' +
           // '</td>' +

           // '<td>' +
           // '<h2 class="searchresult_name"title="product name"><span>' + car_topic + '</span></h2>' +
           // '</td>' +
           // '</tr>' +
           // '</table>' +
           // '<div class="box-province">' +
           // '<p class="type-t">' +
           // '<span class="car-type" >' + cartype + pax + '</span>' +
           // '</p>' +
           // '</div>' +
           // '<div id="box-cost-view">' +
           // '<div class="product_r">' +
           // '<span class="base_price"></span>' +
           // '<span class="sala">' + dataService[i].cost_a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '฿' + '</span>' +

           // '</div>' +
           // '<div class="views-item" onclick="bookingdetailservice(' + dataService[i].transfer_id +','+proFrom+','+proTo+ ',\'' +pro_service_from + '\',\'' + pro_service_to + '\','+lat_f+','+lng_f+','+lat_t+','+lng_t+',\'Service\')">' +
           // '<a > <span >' + lngbook + '</span></a>' +

           // '</div>' +
           // '</div>' +
           // '<div id="i-list"   onclick="getcondition(\'' + dataService[i].car_model + '\')">' +
           // '<p id="capacity"><div ">' + lngcapacityinfo + '</div><div ">' + lngdetails + '</div></p>' +
           // '<i class="material-icons">search</i>' +
           // '</div>' +
           // '</div>'




           '<table width="100%">' +
           '<tr>' +
           '<td  colspan="2" style="width: 100%">' +
           '<h2 class="searchresult_name"title="product name"><span>' + car_topic + '</span></h2>' +
           '</td>' +
           '</tr>' +
           '<tr>'+
           '<td align="center">'+
           
           '<span class="hotel_num">' + indexs + '</span>' +
           
           '<div class="item-thumbnail2" onclick="getimage(\'' + dataService[i].car_model + '\') ">' +
           '<img src="' + urlicon + dataService[i].transfer_icon + '.jpg">' +
           '</div>' +
           '</td >'+ 
           
           '<td  align="center" valign="top">'+
           '<div id="i-list"  onclick="getcondition(\'' + dataService[i].car_model + '\')">' +
           '<p id="capacity"><div>' + lngcapacityinfo + '</div><div>' + lngdetails + '</div></p>' +
           '<i class="material-icons">search</i>' +
           '</div>' +    
           '</td >'+
           
           '</tr>'+
           '<tr>'+
           '<td >'+
           
           
           '</td >'+ 
           
           '<td  align="center" valign="top">'+
           '<div id="">' +
           '<div class="product_r">' +
           '<span class="base_price"></span>' +
           '<span class="sala">' + dataService[i].cost_a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '฿' + '</span>' +
           '</div>' +
           '<div class="views-item" onclick="bookingdetailservice(' + dataService[i].transfer_id +','+proFrom+','+proTo+ ',\'' +pro_service_from + '\',\'' + pro_service_to + '\','+lat_f+','+lng_f+','+lat_t+','+lng_t+',\'Service\')">' +
           '<a > <span >' + lngbook + '</span></a>' +
           '</div>' +
           '</div>' +  
           '</td >'+
           '</tr>'+
           '</table>' +
           '</div>'

           );

    //    foget-password
   }); //end private

}
/**********************************END***********************************/
var data1;
function getsort(a,b) {
    return a.person - b.person;
    
}
function getcondition(i) {
    $('.getcapa').remove();
    $('.getcapa2').remove();
    var lngplan, lngadult, lngchild, lngbagsmall, lngbagbig;
    if ($.cookie("lng") == 'cn') {

        lngplan = '计划';
        lngadult = '成人';
        lngchild = '儿童';
        lngbagsmall = '小行李';
        lngbagbig = '大行李';
    } else if ($.cookie("lng") == 'en' ) {
        lngplan = 'Plan';
        lngadult = 'Adult';
        lngchild = 'Child';
        lngbagsmall = 'Small luggage';
        lngbagbig = 'Big baggage';

    } else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH' || $.cookie("lng") == undefined) {
        lngplan = 'แผน';
        lngadult = 'ผู้ใหญ่';
        lngchild = 'เด็ก';
        lngbagsmall = 'กระเป๋าเล็ก';
        lngbagbig = 'กระเป๋าใหญ่';

    } 
    console.log(i)
    var parame2 = {
        'field': { "0": "bag_big", "1": "bag_small", "2": "adult", "3": "child", "4": "plan", "5": "car_model", "6": "bag_big2", "7": "bag_big_w", "8": "bag_big_h", "9": "bag_big_w2", "10": "bag_big_h2", "11": "bag_small_w", "12": "bag_small_h" },
        "request": { "car_model": i },
        "from": "web_car_capacity"
    };
    $.ajax({
        type: 'POST',
        url: base_url_tr+'service/getCapacity.php',
        data: { 'car_model': i },
        //contentType: "application/json",
        dataType: 'json',
        success: function(data) {
            console.log(data)
            $('#size_bag_big').html(data[0].bag_big_h + 'x' + data[0].bag_big_w)
            $('#size_bag_small').html(data[0].bag_small_h + 'x' + data[0].bag_small_w)
            $('#getcapa').append('<table class="table table-striped table-hover getcapa" width="100%" style="margin: 0;">' +
                '<tr class="head-table-dialog" align="center" >' +
                '<td align="center" width="20%">' +
                '<span class="">' + lngplan + '</span>' +
                '</td>' +
                '<td align="center" width="20%">' +
                '<span class="">' + lngadult + '</span>' +
                '</td>' +
                '<td align="center" width="20%">' +
                '<span class="">' + lngchild + '</span>' +
                '</td>' +
                '<td align="center" width="20%">' +
                '<span class="">' + lngbagbig + '</span>' +
                '</td>' +
                '<td align="center" width="20%">' +
                '<span class="">' + lngbagsmall + '</span>' +
                '</td>' +
                '</tr>' +
                // '<div id= "getcapa2">'+
                // '</div>'+

                '<table>');

            $.each(data, function(i, val) {
                //if (i == 1) {
                    $('#getcapa2').append(
                        '<table class="table getcapa2" id="table' + data[i].plan + '" width="100%" style="margin: 0;">' +
                        '<tr id="dd' + data[i].plan + '">' +
                        '<td align="center" width="20%">' +
                        '<span>' + data[i].plan + '</span>' +
                        '</td>' +
                        '<td width="20%">' +
                        '<div id="adult' + data[i].plan + '">' +

                        '</div>' +
                        '</td >' +
                        '<td width="20%">' +
                        '<div id="child' + data[i].plan + '">' +
                        '</div>' +
                        '</td>' +
                        '<td width="20%">' +
                        '<div id="bag_big' + data[i].plan + '">' +
                        '</div>' +
                        '</td>' +
                        '<td width="20%">' +
                        '<div id="bag_small' + data[i].plan + '">' +
                        '</div>' +
                        '</td>' +
                        '</tr>' +
                        '</table>'

                        );
                //}


                console.log(data[i].adult)

                if (data[i].adult == 0) {
                    $('#adult' + data[i].plan + '').append('<span>-</span>');
                } else {
                    for (var y = 0; y < data[i].adult; y++) {


                        $('#adult' + data[i].plan + '').append('<i class="fa fa-male fa-lg " aria-hidden="true" ></i>');

                    }
                }

                if (data[i].child == 0) {
                    $('#child' + data[i].plan + '').append('<span>-</span>');
                } else {
                    for (var y = 0; y < data[i].child; y++) {


                        $('#child' + data[i].plan + '').append('<i class="fa fa-child " aria-hidden="true" ></i>');

                    }
                }

                if (data[i].bag_big == 0) {
                    $('#bag_big' + data[i].plan + '').append('<span>-</span>');
                } else {
                    for (var z = 0; z < data[i].bag_big; z++) {


                        $('#bag_big' + data[i].plan + '').append('<i class="fa fa-suitcase fa-2x" aria-hidden="true" ></i>');

                    }
                }

                if (data[i].bag_small == 0) {
                    $('#bag_small' + data[i].plan + '').append('<span>-</span>');
                } else {
                    for (var a = 0; a < data[i].bag_small; a++) {


                        $('#bag_small' + data[i].plan + '').append('<i class="fa fa-suitcase " aria-hidden="true" ></i>');

                    }
                }

            });
            $('#capacityss').modal('show')
        }

    });
if ($.cookie("lng") == 'cn') {
    $('.terms-of-use').html('<span>' +
        '<B>一. </B> 请注意，黄色或者绿色车牌为合法运营车辆。如看到其他颜色牌照可拒绝上车，并请联系我们热线。<br /><br />' +
        '<B>二. </B> 上⻋车请系好安全带，不然如遇警察检查需自己付罚款，如有意外保险⽆无法赔偿。<br /><br />' +
        '<B>三. </B> 上下车请保管好自己的物品。如有遗失，概不负责。<br /><br />' +
        '<B>四. </B> 如发生司机由于不可抗力因素未接到，在约定时间后5-15分钟内，请客人及时联系我们的24小时中文热线，如等待超过30分钟，请客人需及时自行打车离开！<br /><br />' +
        '我们会退还订单费用，如客人有打车凭证提供，我们将补偿打车费用，但是其他费用一律不负责赔偿，请知晓！</span>');

} else if ($.cookie("lng") == 'en' ) {
    $('.terms-of-use').html('<span  ><B >1.</B>  Please note that only green or yellow license plates vehicle legally are used as public vehicles. If you see other colors license plates vehicle, could refuse to get on and please contact our hotline.<br /><br>' +

        '<B>2.</B> Please remember to fasten your seat belt in the vehicle. Otherwise, in case of police check required to pay fines by you own and in case of any traffic accident, you would be unable to get any insurance compensation.<br /><br>' +

        '<B>3.</B> Please check your belongings before leaving. We are not responsible for any loss.<br /><br>' +

        '<B>4.</B> If the driver did not arrive on time in 5-15 minutes, please contact our 24-hour hotline,Such as waiting for more than 30 minutes, please kindly get another taxi. We will refund the cost of the order, if the guest able to provide the taxi voucher that they took, we will refund the taxi costs. Please be noticed the other fees are not responsible for refund..</span>');

} else if ($.cookie("lng") == 'th' || $.cookie("lng") == 'th-TH' || $.cookie("lng") == undefined) {
    $('.terms-of-use').html('<span >' +
        '<B>1.</B> โปรดทราบว่ามีเพียงแผ่นป้ายทะเบียนรถสีเขียวหรือสีเหลืองเท่านั้นที่ใช้เป็นยานพาหนะขนส่งสาธารณะที่ถูกต้องตามกฎหมาย หากคุณเห็นป้ายทะเบียนรถเป็นสีอื่น คุณสามารถปฏิเสธการโดยสารได้ และโปรดติดต่อสายด่วนของเรา<br /><br />' +
        '<B >2.</B> กรุณาคาดเข็มขัดนิรภัย มิฉะนั้นในกรณีที่มีการเรียกตรวจสอบจากตำรวจ คุณต้องต้องจ่ายค่าปรับเอง และในกรณีที่เกิดอุบัติเหตุ คุณจะไม่สามารถได้รับค่าชดเชยจากบริษัทประกันภัย<br /><br />' +
        '<B>3.</B> โปรดตรวจสอบทรัพย์สินของคุณก่อนที่รถจะออกเดินทางหรือรถถึงที่หมาย เราจะไม่รับผิดชอบต่อความสูญเสียในกรณีใดๆ ทั้งสิ้น<br /><br />' +
        '<B>4.</B> ในกรณีที่มีเหตุสุดวิสัยคนขับไม่ได้รับรอเกิน 5-15 นาทีจากเวลาที่ตกลงกัน โปรดติดต่อศูนย์บริการตลอด 24 ชั่วโมงสายด่วนทันที ถ้ารอคอยมากกว่า 30 นาที กรุณาเรียกรถเอง! เราจะคืนเงินให้ท่าน100%ในการจอง และจะคืนเงินที่ท่านเรียกรถ (แต่ต้องมีหลักฐานใบเสร็จหรือรูปยืนยัน) แต่จะไม่รับผิดชอบค่าเสียหายอื่น  โปรดทราบ!</span> ');


} 
}

function updatelatlng(id) {
    console.log(id)
    $.ajax({
        type: 'POST',
        url: '../laglng_control/getlaglng',
        data: { 'id': id },
        //contentType: "application/json",
        dataType: 'json',
        success: function(data) {
            console.log(data)







        }
    });
}


// window.fbAsyncInit = function() {
//     FB.init({
//         appId: '1865903040340223',
//         cookie: true,
//         xfbml: true,
//         version: 'v2.8'
//     });
//     FB.AppEvents.logPageView();
// };


// (function(d, s, id) {
//     var js, fjs = d.getElementsByTagName(s)[0];
//     if (d.getElementById(id)) { return; }
//     js = d.createElement(s);
//     js.id = id;
//     js.src = "//connect.facebook.net/en_US/sdk.js";
//     fjs.parentNode.insertBefore(js, fjs);
// }(document, 'script', 'facebook-jssdk'));

// function login() {

//     FB.login(function(response) { statusChangeCallback(response); }, { scope: 'email,public_profile', return_scopes: true });
//     // FB.getLoginStatus(function(response) 
//     //     {statusChangeCallback(response)},{ scope: 'email,user_likes' 
//     // });
//     // function checkLoginState() {
//     //   FB.getLoginStatus(function(response) {
//     //     statusChangeCallback(response);
//     //   });
//     // }
//     // This is called with the results from from FB.getLoginStatus().
//     function statusChangeCallback(response) {
//         console.log('statusChangeCallback');
//         console.log(response);
//         // The response object is returned with a status field that lets the
//         // app know the current login status of the person.
//         // Full docs on the response object can be found in the documentation
//         // for FB.getLoginStatus().
//         if (response.status === 'connected') {
//             // Logged into your app and Facebook.
//             checkLoginState();
//         } else {
//             // The person is not logged into your app or we are unable to tell.
//             //   document.getElementById('status').innerHTML = 'Please log ' +
//             //     'into this app.';
//         }
//     }

//     function checkLoginState() {
//         console.log('Welcome!  Fetching your information.... ');
//         FB.api('/me?fields=name,email', function(response) {
//             console.log(response)
//                 // $.cookie("idface", response.id);
//             $.ajax({
//                 type: 'POST',
//                 url: '../login_control/processsocial',
//                 data: { 'username': response.email, 'name': response.name, 'password': response.id },
//                 //contentType: "application/json",
//                 dataType: 'json',
//                 success: function(res) {
//                     console.log(res)
//                     if (res.status == 0) {
//                         $.cookie("login", res.username);
//                         window.location.href = base_url_tr;


//                     } else {

//                         $('#message').html('Login not complete').css('color', 'red');
//                     }

//                 }
//             });

//             //console.log('Successful login for: ' + response.name);

//         });
//     }
// }



// function initMap() {
//     var uluru = { lat: 7.9038781, lng: 98.3033694 };
//     var map = new google.maps.Map(document.getElementById('map'), {
//         zoom: 11,
//         center: uluru
//     });
//     var marker = new google.maps.Marker({
//         position: uluru,
//         map: map
//     });
// }
var addr, latitude, longitude, addrcurent, placeIdcurent
$('#current-addr').on('click', getAddress)


function sendplaceid(id) {
    console.log(id)
    placeIdcurent = id
    console.log(placeIdcurent)

}

function changeType() {
    console.log(data1)


}

function closepopup(x){
    if(x == 'country'){
        $('#codecountry').hide(500);
    }
}
function getimage(i) {
    console.log(i);
    $('#img-car').show(500)
    $('#idimage').val(i)

    jssor_1_slider_init();

}
function regis(){
    console.log('inregis')
    $('#loading').css('display', 'block');
    setTimeout(function() {

        window.location.href = base_url_tr + "register";
    }, 500);
}

function jssor_1_slider_init() {

    var jssor_1_options = {
        $AutoPlay: 0,
        $Idle: 2000,
        $SlideEasing: $Jease$.$InOutSine,
        $DragOrientation: 3,
        $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
        },
        $BulletNavigatorOptions: {
            $Class: $JssorBulletNavigator$
        }
    };

    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

    //make sure to clear margin of the slider container element
    jssor_1_slider.$Elmt.style.margin = "";

    
    var MAX_WIDTH = 3000;
    var MAX_HEIGHT = 3000;
    var MAX_BLEEDING = 1;

    function ScaleSlider() {
        var containerElement = jssor_1_slider.$Elmt.parentNode;
        var containerWidth = containerElement.clientWidth;

        if (containerWidth) {
            var originalWidth = jssor_1_slider.$OriginalWidth();
            var originalHeight = jssor_1_slider.$OriginalHeight();

            var containerHeight = containerElement.clientHeight || originalHeight;

            var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
            var expectedHeight = Math.min(MAX_HEIGHT || containerHeight, containerHeight);

            //scale the slider to expected size
            jssor_1_slider.$ScaleSize(expectedWidth, expectedHeight, MAX_BLEEDING);

            //position slider at center in vertical orientation
            jssor_1_slider.$Elmt.style.top = ((containerHeight - expectedHeight) / 2) + "px";

            //position slider at center in horizontal orientation
            jssor_1_slider.$Elmt.style.left = ((containerWidth - expectedWidth) / 2) + "px";
        } else {
            window.setTimeout(ScaleSlider, 30);
        }
    }

    /*ios disable scrolling and bounce effect*/
    $Jssor$.$AddEvent(document, "touchmove", function(event) { event.touches.length < 2 && $Jssor$.$CancelEvent(event); });

    ScaleSlider();

    $Jssor$.$AddEvent(window, "load", ScaleSlider);
    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
    /*#endregion responsive code end*/
};

function getAddress(address) {


    console.log(placeIdcurent)
    console.log(dataplacerel)
    $.ajax({
        type: 'POST',
        url: base_url_tr+'service/curentPlace.php',
        data: { 'lat_c': latitude, 'lng_c': longitude },
            //contentType: "application/json",
            dataType: 'json',
            success: function(data) {
                //console.log(data[0])
                console.log(data)
                id_placefrom = data.id;
                aum_from = data.aum;
                console.log(id_placefrom)
                console.log(aum_from)
                lat_from = data.lat;
                lng_from = data.lng;

                start_st = {
                    lat: parseFloat(lat_from),
                    lng: parseFloat(lng_from)
                }

            }
        })
    rel = true;
    console.log(rel)
    $('#search-from').val(addr)
    console.log(latitude)
    console.log(longitude)
    $('#lat_from').val(latitude)
    $('#lng_from').val(longitude)
    console.log(addrcurent)
    $('.box_from').hide()
    $('#current-addr').hide()
    $('.box_to').show(500)

    
}

$('#show_pd').click(function() {

    $('#show_pd_dialog').show(1000);

});

function toggleFullScreen() {
    //alert("aaaa")
    var doc = window.document;
    var docEl = doc.documentElement;

    var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
    var cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;

    if (!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
        requestFullScreen.call(docEl);
    } else {
        cancelFullScreen.call(doc);
    }
}

/**
* Login with Google Account *
*/
// var googleUser = {};
// var startApp = function() {
//     gapi.load('auth2', function(){
//       // Retrieve the singleton for the GoogleAuth library and set up the client.
//       auth2 = gapi.auth2.init({
//         client_id: '1057940740113-3suf1lugga5kceuqg3jed67edke0l1dg.apps.googleusercontent.com',
//         cookiepolicy: 'single_host_origin',
//         // Request scopes in addition to 'profile' and 'email'
//         //scope: 'additional_scope'
//     });
//       attachSignin(document.getElementById('customBtn'));
//   });
// };

// function attachSignin(element) {
//     // console.log(element.id);
//     auth2.attachClickHandler(element, {},
//         function(googleUser) {
//         /*  document.getElementById('name').innerText = "Signed in: " +
//         googleUser.getBasicProfile().getName();*/
//         var profile = googleUser.getBasicProfile();
//                  /* console.log('ID: ' + profile.getId());
//                   console.log('Name: ' + profile.getName());
//                   console.log('Image URL: ' + profile.getImageUrl());
//                   console.log('Email: ' + profile.getEmail()); */
//                   console.log(profile); 
//                   var url = base_url_tr+'login_control/processsocial';
// //                alert(url);
// var type_login = $('#by').val();
// var param_data = $('#data').val();
// var param_from = $('#from').val();
// var param_to = $('#to').val();
// var lat_f = $('#lat_f').val();
// var lng_f = $('#lng_f').val();
// var lat_t = $('#lat_t').val();
// var lng_t = $('#lng_t').val();
// var book = $('#book').val();
// $.post( url, {'username': profile.getEmail(),'name':profile.getName(),'password':profile.getId(),'type':'google','img':profile.getImageUrl() } ,function( data ) {
// //                      console.log(data);
// var obj_c = JSON.parse(data);
// console.log(obj_c.status);
// console.log(obj_c);
// if(obj_c.status == 0)
// {
//    $.cookie("login",obj_c.username);
// //                               $.cookie("logby",'google');
// //                                 window.location.href = "<?php echo base_url_tr(); ?>home";    
// if(type_login=='dasboard'){
//     window.location.href = "<?php echo base_url_tr(); ?>dashboard/view_user";
// }else if(type_login=='book'){
// //                      alert(param_data+" "+param_from+" "+param_to);
// window.location.href = "<?php echo base_url_tr(); ?>book?data="+param_data+"&from="+param_from+"&to="+param_to + "&lat_f=" + getParameterByName('lat_f')+ "&lng_f=" + getParameterByName('lng_f')+ "&lat_t=" + getParameterByName('lat_t')+ "&lng_t=" + getParameterByName('lng_t') + "&book=" + getParameterByName('book');

// }else{
//     window.location.href = base_url_tr;
// }     
// }
// else 
// {    
//  $('#message').html('Login not complete').css('color', 'red');
 
// }
// });      
// }, function(error) {
//                    // console.log(JSON.stringify(error, undefined, 2));
//                });
// }

// startApp()