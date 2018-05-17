<?php
$get_lng           = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
$get_lng           = $get_lng[0];
$check_lng_browser = explode('-', $get_lng);
$check_lng_browser = $check_lng_browser[0];
if ($check_lng_browser == 'ch' or $check_lng_browser == 'zh' or $check_lng_browser == 'sh') {
    $keep = 'cn';
} else if ($check_lng_browser == 'th') {
    $keep = 'th';
} else {
    $keep = 'en';
}

switch ($_COOKIE['lng']) {
    case "th":
        //echo "PAGE th";
        include("../../../includes/lang/th/t_share_2.php"); //include check session DE
        $province           = "name_th";
        $place_shopping     = "topic_th";
        $google_map_api_lng = "th";
        break;
    case "cn":
        //echo "PAGE cn";
        include("../../../includes/lang/cn/t_share_2.php");
        $province           = "name_cn";
        $place_shopping     = "topic_cn";
        $google_map_api_lng = 'zh-CN';
        break;
    case "en":
        //echo "PAGE EN";
        include("../../../includes/lang/en/t_share_2.php");
        $google_map_api_lng = "en";
        $place_shopping     = "topic_en";
        $province           = "name";
        break;
    default:
        //echo "PAGE EN - Setting Default";
        include("../../../includes/lang/" . $keep . "/t_share_2.php"); //include EN in all other cases of different lang detection
        //        $google_map_api_lng = $keep;
        $province           = "name_" . $keep;
        $place_shopping     = "topic_" . $keep;
        $google_map_api_lng = $keep;
        break;
}
if ($_GET[request] == "check_status_shop") {
    
    if ($_GET[status] == 'CANCEL') {
        if ($_GET[type] == '1') {
            echo '<font class="font-30" style="color:#ff0000"><b>' . t_customer_no_register . '</b></font>';
        }
        if ($_GET[type] == '2') {
            echo '<font class="font-30" style="color:#ff0000"><b>' . t_customer_not_go . '</b></font>';
        }
        if ($_GET[type] == '3') {
            echo '<font class="font-30" style="color:#ff0000"><b>' . t_wrong_selected_place . '</b></font>';
        }
    } else if ($_GET[status] == 'NEW') {
        echo '<font class="font-30" style="color:#0099CC;" ><b>' . t_new . '</b></font>';
    } else if ($_GET[status] == 'CONFIRM') {
        echo '<font class="font-30" style="color:#0099CC;" > <b>' . t_success . '</b></font>';
    }else{
		echo 'Unknow';
	}
    
}
//echo $place_shopping;
if ($_GET[request] == "check_status_checkin"){

  if($_GET[status]==1){  
?>
 <div class="font-20"><i class="fa  fa-clock-o fa-spin 6x" style="color:#88B34D"></i>  <strong><?=t_time;?> 
<?=$date = date('H:i:s', $_GET[time]);?></strong></div>
<? }  
  if($_GET[status]==0){  
?>
 <div class="font-20"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong><font color="#FF0000"><?=t_pending;?></font></strong></div>
<? } 
  if($_GET[status]==2){  
?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td> <div class="font-20"><i class="fa  fa-circle-o-notch fa-spin 6x" style="color:#FF0000"></i> <strong style="color:#FF0000"><?=t_customer_no_register;?></strong>
 <div><?=t_cause;?> : <?=t_guest_agent;?></div> </div></td>
      <td width="30" align="right">            <i  id="photo_driver_topoint_<?=$arr[project][id];?>" class="fa  fa-camera" style="color:<?=$main_color?>; font-size:16px; border-radius: 50%; padding:5px; border: solid 2px <?=$main_color?>  "></i></td>
    </tr>
  </tbody>
</table>
<?	 }
}
//echo "../../../includes/lang/" . $keep . "/t_share_2.php";
?>