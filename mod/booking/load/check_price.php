 
<?

///$_POST[plan_setting]=1;
//$_POST[adult]=5;

$_GET[type]='extra';

$number=$_POST[adult];

$_GET[control]='user';

 $_GET[plan_setting]=$_POST[plan_setting];
 
  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
  
 
  
 $res[open] = $db->select_query("SELECT * FROM plan_product_price_setting WHERE id='".$_GET[plan_setting]."'  ");
 $arr[open] = $db->fetch($res[open]);
  
  

  
  if($_GET[type]=='all'){
                         
  $res[shop] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$_GET[plan_setting]." and country=240   ORDER BY id  ");
                      
  }
  
    if($_GET[type]=='extra'){
		
 
$res[shop] = $db->select_query("SELECT * FROM  product_price_list_all where  plan_setting=".$_GET[plan_setting]." and country<>240 and status=1 and extra_country=1   ORDER BY  sort_country desc limit 1  ");
 
                  
  }
	$arr[shop] = $db->fetch($res[shop]);		
	
	
 ///
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[price] = $db->select_query("SELECT * FROM  product_price_list_all where  id=".$arr[shop][id]."");
 
 $arr[price] = $db->fetch($res[price]) ;
	  
  
 ///////////
 
 
 
 //echo $_GET[plan_setting];
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
$res[extra_park_company] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='park' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='company'");
 $arr[extra_park_company] = $db->fetch($res[extra_park_company]);
 
 $res[extra_park_driver] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='park' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='driver'");
 $arr[extra_park_driver] = $db->fetch($res[extra_park_driver]);
 
 
 $res[extra_park_counter] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='park' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='counter'");
 $arr[extra_park_counter] = $db->fetch($res[extra_park_counter]);
 
 
 $res[extra_park_all] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='park' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='all'");
 $arr[extra_park_all] = $db->fetch($res[extra_park_all]);
 
 ////
 
 
 $res[extra_person_company] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='person' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='company'");
 $arr[extra_person_company] = $db->fetch($res[extra_person_company]);
 
 $res[extra_person_driver] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='person' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='driver'");
 $arr[extra_person_driver] = $db->fetch($res[extra_person_driver]);
 
 
 $res[extra_person_counter] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='person' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='counter'");
 $arr[extra_person_counter] = $db->fetch($res[extra_person_counter]);
 
 
 $res[extra_person_all] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='person' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='all'");
 $arr[extra_person_all] = $db->fetch($res[extra_person_all]);
 
 
 /////
 
  
 $res[extra_commision_company] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='commision' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='company'");
 $arr[extra_commision_company] = $db->fetch($res[extra_commision_company]);
 
 $res[extra_commision_driver] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='commision' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='driver'");
 $arr[extra_commision_driver] = $db->fetch($res[extra_commision_driver]);
 
 
 $res[extra_commision_counter] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='commision' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='counter'");
 $arr[extra_commision_counter] = $db->fetch($res[extra_commision_counter]);
 
 
 $res[extra_commision_all] = $db->select_query("SELECT * FROM plan_product_price_extra WHERE  from_number <= $number AND to_number >= $number  and plan_setting=".$_GET[plan_setting]." and type='commision' and plan_type='".$_GET[type]."'  and control='".$_GET[control]."'  and pay_type='all'");
 $arr[extra_commision_all] = $db->fetch($res[extra_commision_all]);
 
 
 
 ///
  
 
$price_park_company=$arr[price][price_park_company];  
$price_park_driver=$arr[price][price_park_driver];
$price_park_counter=$arr[price][price_park_counter];
$price_park_all=$arr[price][price_park_all];

 
////
if($arr[extra_park_company][id]) {

$price_park_company=$arr[extra_park_company][price_main];  
 }
 
 
 if($arr[extra_park_driver][id]) { 
$price_park_driver=$arr[extra_park_driver][price_main];  
 }
 
 
 if($arr[extra_park_counter][id]) {
$price_park_counter=$arr[extra_park_counter][price_main];  
 }
 
 if($arr[extra_park_all][id]) {
$price_park_all=$arr[extra_park_all][price_main];  
 }  
/////

//echo   $price_park_driver;


 
$all_price_park_company=$price_park_company*$number;
$all_price_park_driver=$price_park_driver*$number;
$all_price_park_counter=$price_park_counter*$number;
$all_price_park_all=$price_park_all*$number;

$price_person_company=$arr[price][price_person_company];
$price_person_driver=$arr[price][price_person_driver];
$price_person_counter=$arr[price][price_person_counter];
$price_person_all=$arr[price][price_person_all];


////
if($arr[extra_person_company][id]) {
$price_person_company=$arr[extra_person_company][price_main];  
 }
 if($arr[extra_person_driver][id]) {
$price_person_driver=$arr[extra_person_driver][price_main];  
 }
 if($arr[extra_person_counter][id]) {
$price_person_counter=$arr[extra_person_counter][price_main];  
 }
 if($arr[extra_person_all][id]) {
$price_person_all=$arr[extra_person_all][price_main];  
 }  
/////


$all_price_person_company=$price_person_company*$number;
echo   $all_price_person_driver=$price_person_driver*$number;
$all_price_person_counter=$price_person_counter*$number;
$all_price_person_all=$price_person_all*$number;

  
 
$price_commision_company=$arr[price][price_commision_company];
$price_commision_driver=$arr[price][price_commision_driver];
$price_commision_counter=$arr[price][price_commision_counter];
$price_commision_all=$arr[price][price_commision_all];

////
if($arr[extra_commision_company][id]) {
$price_commision_company=$arr[extra_commision_company][price_main];  
 }
 if($arr[extra_commision_driver][id]) {
$price_commision_driver=$arr[extra_commision_driver][price_main];  
 }
 if($arr[extra_commision_counter][id]) {
$price_commision_counter=$arr[extra_commision_counter][price_main];  
 }
 if($arr[extra_commision_all][id]) {
$price_commision_all=$arr[extra_commision_all][price_main];  
 }  
/////


$all_price_commision_company=$price_commision_company;
$all_price_commision_driver=$price_commision_driver ;
$all_price_commision_counter=$price_commision_counter;
$all_price_commision_all=$price_commision_all;
					  
		?>
        