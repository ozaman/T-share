<div  style="padding-top:0px; padding:5px;margin-top: 50px; ">

<table width="100%"  border="0" cellspacing="0" cellpadding="0"  >
  <tr align="center">
    <td width="49%"><div id="transfer_money" onclick="transfer_money()" style="background: #3b5998;
        font-size: 18px;
        border-radius: 25px;
        color: #fff;
        padding: 5px 30px;
        border: 2px solid #3b5998; "><? echo t_transfers?></div></td>
        <td width="2%"></td>
    <td width="49%" ><div id="requet_money" onclick="request_money()" style="
        background: #fff;
        font-size: 18px;
        border-radius: 25px;
        color: #3b5998;
        padding: 5px 30px;
        border: 2px solid #3b5998;"><? echo t_transfer_notice?></div></td>
   
  </tr>
</table>
            
</div>
<div style="font-size: 18px;
    font-weight: 600;
    padding: 0px 10px;
    margin-top: 15px;"><? echo t_transferred_account_details?></div>
<div  style="margin-top: 15px;
    padding: 5px;
    border: 1px solid #3b5998;
    border-radius: 15px;
">


 <?php 
 include('../../../includes/class.mysql.php');

  
  $db = New DB();
  $db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
  
  mysql_query("SET NAMES utf8"); 
  mysql_query("SET character_set_results=utf-8");
//   // $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
//   $res[project] = $db->select_query("SELECT id FROM  web_driver  where  username ='".$_POST[driver]."'");
// $arr[project] = $db->fetch($res[project]);
 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 $res[price] = $db->select_query("SELECT * FROM  deposit where username  = '".$_COOKIE["app_remember_user"]."' ");
                      
 $arr[price] = $db->fetch($res[price]) ;
 
 ?>
						
<table width="100%"  border="0" cellspacing="2" cellpadding="2"  >
  <tr >
     
     <td>
      <table>
        <tr>
          <td width="80" class="font_18" style="height:30px;  padding-left:5px;"><? echo t_bank_name?></td>
          <td width=""   class="font_16" style="padding-right:10px; color:#FF0000;font-size: 16px;">
           <!--  <img src="https://scontent.fbkk10-1.fna.fbcdn.net/v/t1.0-1/p50x50/10897014_10152997534378545_3525821504956963563_n.jpg?oh=70839c63656c22249e06f3e5e4b812c3&oe=5B40AF5A"> -->
             ไทยภานิชย์(SCB)         
              </td>
          
        </tr>
        <tr>
          <td width="80" class="font_18" style="height:30px;  padding-left:5px;"><? echo t_account_number?></td>
          <td width=""   class="font_16" style="padding-right:10px; color:#FF0000;font-size: 16px;">8572088605
          </td>
          
        </tr>
        <tr>
            <td width="80" class="font_18" style="height:30px;  padding-left:5px;"><? echo t_account_name?></td>
            <td width=""   class="font_16" style="padding-right:10px; color:#FF0000;font-size: 16px;">goldenbeachgroup
            </td>
        </tr>
      </table>
      
     </td>
  </tr>
</table>
						
 	</div>
  <div>
     <table>
        <tr>
          <td width="" class="font_18" style="height:30px;  padding-left:5px;"><? echo t_your_balance?></td>
          <td width=""   class="font_16" style="padding-left: 20px; color:#FF0000;font-size: 16px;"><div style="font-size: 16px;">
           <!--  <img src="https://scontent.fbkk10-1.fna.fbcdn.net/v/t1.0-1/p50x50/10897014_10152997534378545_3525821504956963563_n.jpg?oh=70839c63656c22249e06f3e5e4b812c3&oe=5B40AF5A"> -->
          <span> <?= number_format( $arr[price][deposit] , 0 );?> </span></div>
            </td>
          
        </tr>
        
  </div>
  <script>
$('.text-topic-action-mod').html('<?echo t_transfers ?>');
  </script>