var GGDate;
var GBlurDate;
function ctlA(x) {
    return document.getElementById(x);
}

function browserWidth() {
    var w = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
    return w;
}
function browserHeight() {
    var h = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
    return h;
}

function xmlCreateA() {
    var xmlHttp;
    xmlHttp = new XMLHttpRequest();
    return xmlHttp;
}

function newUrl(x) {
    if (x.indexOf("?") >= 0) {
        x = x + "&";
    } else {
        x = x + "?";
    }
    var date1 = new Date();
    var randomDateXYZ = '' +  date1.getFullYear() + padZero(date1.getMonth()) + padZero(date1.getDate()) + padZero(date1.getHours()) + padZero(date1.getMinutes()) + padZero(date1.getSeconds()) + padZero3(date1.getMilliseconds());
    x = x + "radomXYZ=" + encodeURIComponent(Math.random()) + "&randomDateXYZ=" + encodeURIComponent(randomDateXYZ) ;
    return x;
}

function xmlAsyncA(url, postData, oncomplete, onconnecterror, onfinish) {
    var xtimeout;
    var req = xmlCreateA();
    if (req == null) { return; }
    var method = (postData) ? "POST" : "GET";
    url = newUrl(url);
    req.open(method, url, true);
    //req.setRequestHeader('User-Agent', 'XMLHTTP/1.0');
    if (postData) { req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); }
    xtimeout = window.setTimeout(function () {
        req.abort();
        if (onconnecterror) { onconnecterror(); }
        if (onfinish) { onfinish(); }
        alert(Lang("Cannot connect to server, please try again later;ไม่สามารถติดต่อเครือข่ายได้;无法连接到服务器;无法连接到服务器;서버에 연결할 수 없습니다"));
    }, 30000);
    req.onreadystatechange = function () {
        if (req.readyState != 4) { return; }
        if (req.status != 200 & req.status != 304) { return; }
        window.clearTimeout(xtimeout);
        oncomplete(req);
        if (onfinish) { onfinish(); }
    }
    req.send(postData);
}

function xmlAsyncA2(url, postData, oncomplete, onconnecterror, onfinish) {
    var xtimeout;
    var req = xmlCreateA();
    if (req == null) { return; }
    var method = (postData) ? "POST" : "GET";
    url = newUrl(url);
    req.open(method, url, true);
    //req.setRequestHeader('User-Agent', 'XMLHTTP/1.0');
    if (postData) { req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); }
    xtimeout = window.setTimeout(function () {
        req.abort();
        if (onconnecterror) { onconnecterror(); }
        if (onfinish) { onfinish(); }
    }, 20000);
    req.onreadystatechange = function () {
        if (req.readyState != 4) { return; }
        if (req.status != 200 & req.status != 304) { return; }
        window.clearTimeout(xtimeout);
        oncomplete(req);
        if (onfinish) { onfinish(); }
    }
    req.send(postData);
}

function xmlAsyncA3(url, postData, oncomplete, onconnecterror, onfinish) {
    var req = xmlCreateA();
    if (req == null) { return; }
    var method = (postData) ? "POST" : "GET";
    url = newUrl(url);
    req.open(method, url, true);
    //req.setRequestHeader('User-Agent', 'XMLHTTP/1.0');
    if (postData) { req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); }
    req.onreadystatechange = function () {
        if (req.readyState != 4) { return; }
        if (req.status != 200 & req.status != 304) { return; }
        oncomplete(req);
        if (onfinish) { onfinish(); }
    }
    req.send(postData);
}

function xmlSyncA(url, postData) {
    var req = xmlCreateA();
    if (req == null) { return; }
    var method = (postData) ? "POST" : "GET";
    url = newUrl(url);
    req.open(method, url, false);
    //req.setRequestHeader('User-Agent', 'XMLHTTP/1.0');
    if (postData) { req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); }
    req.send(postData);
    return req;
}

function numberFormatA(Expression, NumDigitsAfterDecimal) {
    var iNumDecimals = NumDigitsAfterDecimal;
    var dbInVal = Expression;
    var bNegative = false;
    var iInVal = 0;
    var strInVal;
    var strWhole = "";
    var strDec = "";
    var strTemp = "";
    var strOut = "";
    var iLen = 0;

    if (dbInVal < 0) {
        bNegative = true;
        dbInVal *= -1;
    }

    dbInVal = dbInVal * Math.pow(10, iNumDecimals)
    iInVal = parseInt(dbInVal);
    if ((dbInVal - iInVal) >= .5) {
        iInVal++;
    }
    strInVal = iInVal + "";
    strWhole = strInVal.substring(0, (strInVal.length - iNumDecimals));
    strDec = strInVal.substring((strInVal.length - iNumDecimals), strInVal.length);
    while (strDec.length < iNumDecimals) {
        strDec = "0" + strDec;
    }
    iLen = strWhole.length;
    if (iLen >= 3) {
        while (iLen > 0) {
            strTemp = strWhole.substring(iLen - 3, iLen);
            if (strTemp.length == 3) {
                strOut = "," + strTemp + strOut;
                iLen -= 3;
            }
            else {
                strOut = strTemp + strOut;
                iLen = 0;
            }
        }
        if (strOut.substring(0, 1) == ",") {
            strWhole = strOut.substring(1, strOut.length);
        }
        else {
            strWhole = strOut;
        }
    }
    if (strWhole == "") { strWhole = "0"; }
    if (NumDigitsAfterDecimal == 0) {
        if (bNegative) {
            return "-" + strWhole;
        } else {
            return strWhole;
        }
    } else {
        if (bNegative) {
            return "-" + strWhole + "." + strDec;
        }
        else {
            return strWhole + "." + strDec;
        }
    }
}

function trimA(xstring) {
    return xstring.replace(/^\s+|\s+$/g, '');
}

function replaceA(srcString, findString, replString) {
    var _reg = new RegExp(findString, "gim");
    return srcString.replace(_reg, replString);
}


function ocmenu(xobj) {
    window.location = xobj.href;
    return false;
}

function validateBox(xbox) {
    clearError(xbox);
    var hasError = false;
    var A1 = xbox.getElementsByTagName("*");
    var errMess = "";
    for (var i = 0; i < A1.length; i++) {
        errMess = "";
        var tname = A1[i].tagName.toUpperCase();
        if (tname == "INPUT" || tname == "TEXTAREA") {
            var xreq = A1[i].getAttribute("required");
            if (xreq != null) {
                if (xreq == "true") {
                    if (trimA(A1[i].value) == "") {
                        errMess = Lang("Please input data in this field;กรุณาป้อนข้อมูลในฟิลด์นี้;请在此字段输入数据;このフィールドに入力データをしてください;이 분야에서 입력 데이터를하시기 바랍니다");
                    }
                }
            } // xreq


            var xvalidate = A1[i].getAttribute("validate");
            var xval2 = "";
            var reg;

            if (xvalidate != null) {
                if (trimA(A1[i].value) != "") {
                    switch (xvalidate) {
                        case "date":
                            if (A1[i].value != "__/__/____") {
                                GBlurDate = A1[i];
                                if (validateDate(A1[i].value) == false) {
                                    if (errMess != "") {
                                        errMess += " | ";
                                    }
                                    A1[i].value = "";
                                    errMess += Lang("Invalid Date Format : DD/MM/YYYY;รูปแบบวันที่ไม่ถูกต้อง : วว/ดด/ค.ศ.;无效的日期格式：DD/ MM / YYYY;無効な日付形式：DD/ MM/ YYYY;잘못된 날짜 형식 : DD / MM / YYYY");
                                }
                            }
                            break;
                        case "address":
                            if (validateAddress(A1[i].value) == false) {
                                if (errMess != "") {
                                    errMess += " | ";
                                }
                                errMess += Lang("Invalid Address from special character;ที่อยู่ไม่ถูกต้อง เนื่องจากมีสัญลักษณ์พิเศษ");
                            }
                            break;
                        case "citizen":
                            if (validateCitizen(A1[i].value) == false) {
                                if (errMess != "") {
                                    errMess += " | ";
                                }
                                errMess += Lang("Invalid Citizen ID;หมายเลขบัตรประชาชนไม่ถูกต้อง");
                                
                            }
                            break;
                        case "passport":
                            if (validatePassport(A1[i].value) == false) {
                                if (errMess != "") {
                                    errMess += " | ";
                                }
                                errMess += Lang("Invalid Passport Number;หมายเลขพาสปอร์ตไม่ถูกต้อง");

                            }
                            break;
                        case "time":
                            if (validateTime(A1[i].value) == false) {
                                if (errMess != "") {
                                    errMess += " | ";
                                }
                                A1[i].value = "00:00";
                                errMess += Lang("Invalid time Format (HH:mm);รูปแบบเวลาไม่ถูกต้อง (HH:mm);无效的时间格式 (HH:mm);無効な時刻形式 (HH:mm);잘못된 시간 형식 (HH:mm)");
                            }
                            break;
                        case "email":
                            xval2 = "^\\w+([.-]\\w+)*@\\w+([-]\\w+)*(\\.\\w+)+$";
                            reg = new RegExp(xval2, "gim");
                            if (A1[i].value.search(reg) == -1) {
                                if (errMess != "") {
                                    errMess += " | ";
                                }
                                errMess += Lang("Invalid Email Address;รูปแบบอีเมล์ไม่ถุกต้อง;无效的电子邮件地址;無効なメールアドレス;이메일 주소가 잘못되었습니다");
                            }
                            break;
                        default:
                            break;
                    } //switch
                }  //trimA
            }   // xvalidate              


            if (errMess != "") {
                var lblErr = document.createElement("span");
                lblErr.className = "iteErr";
                lblErr.innerHTML = errMess;
                A1[i].parentNode.appendChild(lblErr);
                hasError = true;
            } //errMess

        }  //input textarea
    }  //for i=0
    return (!hasError);
}

function clearError(xbox) {

    var A1 = xbox.getElementsByTagName("SPAN");
    for (var i = A1.length - 1; i >= 0; i--) {
        var xobj2 = A1[i];
        if ($(xobj2).hasClass("iteErr")) {
            A1[i].parentNode.removeChild(A1[i]);
        }
    }
}

function validateDate(xdata) {
    var x = "^\\d{1,2}/\\d{1,2}/\\d{4}$";
    var reg = new RegExp(x, "gim");
    var dateErr = true;
    GGDate = null;
    if (xdata.search(reg) == 0) {
        var Adate = xdata.split("/");
        var day1 = valA(Adate[0]);
        var month1 = valA(Adate[1]);
        var year1 = valA(Adate[2]);
        if (year1 > 2100 || year1 < 1800) {
            if (year1 > 2400) {
                year1 = year1 - 543;
                GBlurDate.value = Adate[0] + '/' + Adate[1] + '/' + year1;
            } else {
                return false;
            }
        }
        if (month1 >= 1 && month1 <= 12) {
            var xmonth = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            if ((year1 % 4) == 0) {
                xmonth[2] = 29;
            }
            if (day1 > xmonth[month1]) {
                dateErr = false;
            }
        } else {
            dateErr = false;
        } // if month1
        if (dateErr) {
            if (xdata != "") {
                GGDate = new Date(year1, month1 - 1, day1);
            }
        }
    } else {
        dateErr = false;
    }

    return dateErr;
}

function validateTime(xdata) {
    if (xdata == "__:__") { return true; }
    var x = "^\\d{2}:\\d{2}$";
    var reg = new RegExp(x, "gim");
    var timeErr = true;
    if (xdata.search(reg) == 0) {
        var A1 = xdata.split(":");
        if (valA(A1[0]) >= 24) {
            timeErr = false;
        }
        if (valA(A1[1]) >= 60) {
            timeErr = false;
        }
    } else {
       timeErr = false;
    }
    return timeErr;
}


function lockInt(xobj, e) {
    var xkey;
    if (document.all) {
        xkey = window.event.keyCode;
    } else {
        xkey = e.which;
    }
    if ((xkey >= 48 && xkey <= 57) || xkey == 8) {
        
        return true;
    } else {
        return false;
    }
}

function lockDbl(xobj, e) {
    var xkey;
    if (document.all) {
        xkey = window.event.keyCode;
    } else {
        xkey = e.which;
    }
    if ((xkey >= 48 && xkey <= 57) || xkey == 8) {

        return true;
    } else {
        if (xkey == 46) {
            if (xobj.value.indexOf(".") >= 0) {
                return false;
            } else {
                return true;
            }
        }
        return false;
    }
}


function lockDate(xobj, e) {
    var xkey;
    if (document.all) {
        xkey = window.event.keyCode;
    } else {
        xkey = e.which;
    }
    if ((xkey >= 48 && xkey <= 57) || xkey == 8 || xkey == 47) {

        return true;
    } else {
        return false;
    }
}



function lockall(xobj, e) {
    return false;
}


function saveData(xbox) {
    var postData = "";
    var A1 = $(xbox).find("input,textarea,select");
   for (var i = 0; i < A1.length; i++) {
        if (A1[i].getAttribute("name") != null) {
            if (postData != "") {
                postData += "&";
            }
            postData += A1[i].getAttribute("name") + "=" + encodeURIComponent(A1[i].value);
        }
    }
    return postData;
}

function saveData2(url, xbox) {
    var postData = "";

    var A1 = xbox.getElementsByTagName("*");
    for (var i = 0; i < A1.length; i++) {
        var tname = A1[i].tagName.toUpperCase();
        if (tname == "INPUT" || tname == "TEXTAREA" || tname == "SELECT") {
            if (A1[i].name != "") {
                if (postData != "") { postData += "&"; }
                var xtype = A1[i].getAttribute("type") + "";
                xtype = xtype.toUpperCase();
                if (xtype == "CHECKBOX" || xtype == "CHECK") {
                    postData += A1[i].name + "=" + encodeURIComponent(A1[i].checked);
                } else {
                    postData += A1[i].name + "=" + encodeURIComponent(A1[i].value);
                }
            }
        }
    }
    //alert(postData);
    var x1 = xmlSyncA(url, postData).responseText;
    return x1;
}

function Lang(x) {
    var A1 = x.split(";");
    if (LangInt > A1.length-1) {
        return A1[0];
    } else {
       return A1[LangInt];
    }

}

function valA(xNum) {
    if (xNum == "") { xNum = "0"; }
    var xNum2 = replaceA(xNum, ",", "");
    var xNum2 = replaceA(xNum2, "px", "");
    return parseFloat(xNum2);
}

function dateChange(xobj) {
    var xparent = xobj.parentNode;
    while (xparent.className != 'iteDate') {
        xparent = xparent.parentNode;
    }
    var A1 = $(xparent).find("select");
    if (activeDate != null) {
        var A2 = $(activeDate).find("span");
        A2[1].innerHTML = length2(A1[0].value) + "/" + length2(A1[1].value) + "/" + A1[2].value;
    }
    $.fixedToolbars.hide();
    $.fixedToolbars.show();
}

function length2(x) {
    if (x.length == 1) {
        x = '0' + x;
    }
    return x;
}

function selectDate(xobj) {
    activeDate = xobj;
    var A2 = $(activeDate).find("span");
    var A3 = A2[1].innerHTML.split("/");
    var A4 = $("#ulDate select");
    A4[0].selectedIndex = valA(A3[0]) - 1;
    A4[1].selectedIndex = valA(A3[1]) - 1;
    A4[2].selectedIndex = valA(A3[2]) - 2011;
    //$('#ulDate').listview("refresh");
    $('#ulDate select').selectmenu('refresh');
    return true;
}

function dateChangeT(xobj) {
    var xparent = xobj.parentNode;
    while (xparent.className != 'iteDateT') {
        xparent = xparent.parentNode;
    }
    var A1 = $(xparent).find("select");
    if (activeDate != null) {
        var A2 = $(activeDate).find("span");
        A2[1].innerHTML = length2(A1[0].value) + "/" + length2(A1[1].value) + "/" + A1[2].value + ' ' + A1[3].value + ":" + A1[4].value;

    }
    $.fixedToolbars.hide();
    $.fixedToolbars.show();
}

function selectDateT(xobj) {
    activeDate = xobj;
    var A2 = $(activeDate).find("span");
    var A2x = A2[1].innerHTML.split(" ");
    var A3 = A2x[0].split("/");
    var A3x = A2x[1].split(":");
    var A4 = $("#ulDate select");
    A4[0].selectedIndex = valA(A3[0]) - 1;
    A4[1].selectedIndex = valA(A3[1]) - 1;
    A4[2].selectedIndex = valA(A3[2]) - 2011;
    if (A3x[0] == "00") {
        A4[3].selectedIndex = 0;
    } else {
         A4[3].selectedIndex = valA(A3x[0]) + 1;
    }
    if (A3x[1] == "00") {
        A4[4].selectedIndex = 0;
    } else {
         A4[4].selectedIndex = valA(A3x[1]) + 1;
    }
     //$('#ulDate').listview("refresh");
    try {
        $('#ulDate select').selectmenu('refresh');
    } catch (ex) {
    }
    return true;
}

function selectDateT2(xobj) {
    activeDate = xobj;
    dateChangeT(document.getElementById("itedateid"));
    selectDateT(xobj);
}

function length2(x) {
    if (x.length == 1) {
        x = '0' + x;
    }
    return x;
}


function refreshToolbar() {
    $.fixedToolbars.hide();
    $.fixedToolbars.show();
}

function targetA(e) {
    var xobj;
    if (document.all) {
        xobj = window.event.srcElement;
    } else {
       xobj = e.target;
   }
   return xobj;
}

function keyA(e) {
    var k1;
    if (document.all) {
        k1 = window.event.keyCode;
    } else {
        k1 = e.which;
    }
    return k1;
}

function heightA() {
    var _h1 = document.body.scrollHeight;
    var _h2 = document.body.offsetHeight;
    if (_h1 > _h2) {
        return _h1;
    }
    else {
        return _h2;
    }
}

function setScrollPos(xobj, ipos) {
    if (ipos == null) { ipos = 0; }
    xobj.style.webkitTransform = 'translate3d(0, ' + ipos + 'px, 0)';
}

function preventDefaultA(e) {
    if (document.all) {
        window.event.cancelBubble = true;
    } else {
       e.preventDefault();
   }
   return false;
}


function alertA(x) {
    alert(Lang(x));
}

function kuSearch(strObj,xobj) {
    if (strObj.substring(0, 1) != "#") {
        strObj = "#" + strObj;
   }
   var A2 = strObj.split(" ");
   if (A2.length == 1) {
       strObj = strObj + " li";
   }
    var A1 = $(strObj);
    for (var i = 0; i < A1.length; i++) {
        if (A1[i].innerHTML.toLowerCase().indexOf(xobj.value.toLowerCase()) >= 0) {
            A1[i].style.display = "";
        } else {
            A1[i].style.display = "none";
        }
    }
}

function kuSearch2(xid, xclass, xsearch) {
    xsearch = xsearch.toLowerCase();
    var A2 = xclass.split(";");
    var A1 = $("#" + xid).find("li");
    var data1 = '';
    var ifound;
    for (var i = 0; i < A1.length; i++) {
        ifound = false;
        if (xclass == "") {
            data1 = A1[i].innerHTML;
            if (data1.indexOf(xsearch) >= 0) {
                ifound = true;
            }
        } else {
            for (var j = 0; j < A2.length; j++) {
                var kx1 = $(A1[i]).find("." + A2[j]).html();
                if (kx1 == null) {
                    kx1 = "";
                }
                data1 = kx1.toLowerCase();
                if (data1.indexOf(xsearch) >= 0) {
                    ifound = true;
                    break;
                }
            }
        }
        if (ifound) {
            A1[i].style.display = "";
        } else {
            A1[i].style.display = "none";
        }
    }
}


function strToDate(x) {
    var A1 = x.split(" ");
    var A2 = A1[0].split("/");
    var A3 = A1[1].split(":");
    var jdate = new Date(valA(A2[2]), valA(A2[1])-1, valA(A2[0]), valA(A3[0]), valA(A3[1]));
    return jdate;
}

function strToDate2(x) {
    var A2 = x.split("/");
    var jdate = new Date(valA(A2[2]), valA(A2[1]) - 1, valA(A2[0]));
    return jdate;
}

function currentDateB(x) {
    if (x == null) {
        x = new Date();
    }
    return padZero(x.getDate()) + '/' + padZero(x.getMonth() + 1) + '/' + (x.getYear() + 1900);
}

function padZero(x) {
    var x2 = x + '';
    if (x2.length == 1) {
        x2 = "0" + x2;
    }
    return x2;
}

function padZero3(x) {
    var x2 = x + '';
    if (x2.length <= 1) {
        x2 = "0" + x2;
    }
    if (x2.length <= 2) {
        x2 = "0" + x2;
    }
    return x2;
}


function dblFormat(xobj, e) {
    xobj.value = numberFormatA(valA(xobj.value),2);
}

function intFormat(xobj, e) {
    xobj.value = numberFormatA(valA(xobj.value), 0);
}

function topA() {
    return typeof window.pageYOffset != 'undefined' ? window.pageYOffset : document.documentElement && document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop ? document.body.scrollTop : 0;
}

function validateAddress(x) {
    x = trimA(x);
    if (x == "-") {
        return true;
    }
    var xval2;
    var icorrect = true;

    xval2 = "[–,;—?$#&.+=!@%_.๐~'{}><:*_๐]";
    var reg = new RegExp(xval2, "gim");
    if (x.search(reg) >= 0) {
        icorrect = false;
    }
    if (icorrect) {
        if (x.indexOf("[") > 0 || x.indexOf("]") >= 0 || x.indexOf('"') >= 0 || x.indexOf("\\") >= 0) {
            icorrect = false;
        }
        if (icorrect) {
            if (x.indexOf("-") >= 0 || x.indexOf("/") >= 0) {
                reg = new RegExp("\\w+\\s*[/-]\\s*\\w+","gim");
                if (x.search(reg) >= 0) {
                    icorrect = true;
                } else {
                    icorrect = false;
                }
            }
        }
    }
    return icorrect;
}

function validateCitizen(x) {
 
    if (x.length == 13) {
        var reg2 = new RegExp("^\\d{13}$", "gim");
        if (x.search(reg2) == -1) {
            return false;
        } else {
           var sum1 = 0;
           for (var i = 0; i <= 11; i++) {
                sum1 += (14 - i - 1) * parseFloat(x.substr(i, 1));
            }
            var mod1 = sum1 % 11;

            if (mod1 <= 1) {
                mod1 = 1 - mod1;
            } else {
               mod1 = 11 - mod1;
           }
           var mod2 = mod1 + '';
           
           if (mod2 != x.substr(12, 1)) {
               
               return false;
            }
            return true;
        }
    }
    return false;

}

function validatePassport(x) {
    x = trimA(x);
    var reg = new RegExp("^[A-Z]{0,4}\\d{3,10}$", "gim");
    if (x.search(reg) == -1) {
        return false;
    } else {
        return true;
    }

}

function tinyMCE1(xid) {
    var ifontsize = "10px,11px,12px,13px,14px,15px,16px";
    for (var j = 18; j <= 72; j = j + 2) {
        ifontsize += "," + j + "px";
    }
    $('#' + xid).tinymce({
        // Location of TinyMCE script
        script_url: '/TinyMCE/tiny_mce.js',

        // General options
        theme: "advanced",
        plugins: "autolink,style,inlinepopups,print,contextmenu,paste",

        // Theme options
        theme_advanced_buttons1: "forecolor,styleselect,fontselect,fontsizeselect,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,|,forecolor,backcolor,removeformat",
        theme_advanced_buttons2: "",
        theme_advanced_buttons3: "",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "none",
        theme_advanced_resizing: false,
        content_css: "/TinyMCE/Product.css",
        width: '96%',
        height: '200px',
        theme_advanced_resize_horizontal: false,
        theme_advanced_path: false,
        theme_advanced_font_sizes: ifontsize,
        font_size_style_values: ifontsize,
        force_p_newlines: true,
        force_br_newlines: false,
        forced_root_block: 'div'

    });
}


function tinyMCE2(xid) {

    var ifontsize = "10px,11px,12px,13px,14px,15px,16px";
    for (var j = 18; j <= 72; j = j + 2) {
        ifontsize += "," + j + "px";
    }
    $('#' + xid).tinymce({
        // Location of TinyMCE script
        script_url: '/TinyMCE/tiny_mce.js',

        // General options
        theme: "advanced",
        theme: "advanced",
        plugins: "autolink,lists,pagebreak,style,layer,table,advimage,advlink,inlinepopups,preview,media,searchreplace,print,contextmenu,paste,fullscreen,noneditable,xhtmlxtras",
        theme_advanced_buttons1: "styleselect,fontselect,fontsizeselect,bold,italic,underline,strikethrough,sub,sup,|,justifyleft,justifycenter,justifyright,|,outdent,indent",
        theme_advanced_buttons2: "undo,redo,|,cut,copy,paste,pastetext,pasteword,|,search,|,forecolor,backcolor,styleprops,removeformat,|,bullist,numlist,|,link,unlink,|,image,media",
        theme_advanced_buttons3: "tablecontrols,|,insertlayer,moveforward,movebackward,absolute,|,hr,pagebreak,|,preview,print,fullscreen,code",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "none",
        theme_advanced_resizing: false,
        content_css: "/TinyMCE/Product.css",
        width: '90%',
        height: '200px',
        theme_advanced_resize_horizontal: false,
        theme_advanced_path: false,
        theme_advanced_font_sizes: ifontsize,
        font_size_style_values: ifontsize,
        force_p_newlines: true,
        force_br_newlines: false,
        forced_root_block: 'div'

    });
}

function refreshOwnPage() {
    var xx1 = window.location + '';
    var ipos = xx1.indexOf("#");
    if (ipos > 0) {
        window.location = xx1.substring(0, ipos);
        return false;
    }
    return false;
}