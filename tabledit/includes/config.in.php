<?
$webroot=$_SERVER['DOCUMENT_ROOT'];
 
//define("ip_sv_cn","http://www.t-bookingcn.com/"); 

//Version ///// golden phuket

define("_SCRIPT","t-booking.com v. 2"); 



//Web Config

define("WEB_TITLE"," "._SCRIPT.""); 

define("WEB_URL","http://localhost/web") ; 

define("WEB_EMAIL","dee-day@hotmail.com") ; 

define("TIMESTAMP",time()) ;





define("USE_CAPCHA", true); // true or false

define("CAPCHA_TYPE","2"); //TYPE 1 or 2

define("CAPCHA_NUM","4"); //NUM

define("CAPCHA_WIDTH","80"); //WIDTH

define("CAPCHA_HEIGHT","20"); //HEIGHT



	//MySQL Connect mainweb

define("DB_HOST","localhost");

define("DB_NAME","admin_productsell");

define("DB_USERNAME","root");

define("DB_PASSWORD","123");

define("COST","cost_spare"); 

define("Employee","employee"); 

define("TB_Detail","web_detail"); 

define("TB_Imag","web_imagine"); 

define("TB_Type","web_item_type"); 

define("TB_Item","web_item_list"); 

define("TB_lang","web_language2"); ?>