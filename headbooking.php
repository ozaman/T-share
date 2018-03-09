<script type="text/javascript" src="java.js"></script>

<style type="text/css">

<!--

.style2 {color: #FFFFFF}

-->

</style>

 <script>
 
 //alert(document.getElementById('check_data_status_gps_lat_old').value)
 setInterval(function() {
 ////// อัพเดทตำแหน่งตัวเอง 
 var url_check_data_time_chat = "load_blank_admin.php?name=admin/chat/update&file=main";
 
 
  
 
 //url_check_data_time_chat =url_check_data_time_chat+"&vc="+document.getElementById('vc_chat').value;
//url_check_data_time_chat =url_check_data_time_chat+"&lat="+document.getElementById('check_data_status_gps_lat_old').value;
 //url_check_data_time_chat =url_check_data_time_chat+"&lng="+document.getElementById('check_data_status_gps_lng_old').value;
  
 
 $('#load_update').load(url_check_data_time_chat);
}, 1000); // 60000 milliseconds = one minute

 



	</script>
<table width="1200" border="0" cellspacing="0" cellpadding="0"  >
  <tr>
    <td align="center"   ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="90" align="center"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left"> <a href="?name=admin&amp;file=main"></a>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="380"  bgcolor="#FFF" ><span class="down"><img src="admin/logo.png?v=<?=time()?>"  align="absmiddle" /></span></td>
                  <td bgcolor="#F6F6F6" style="padding:5px; font-family:Arial, Helvetica, sans-serif; text-transform: uppercase  "><font style="font-size:30px"><b>Tour And Transfer <font color="<?=$main_color?>">Booking System </td>
                  </tr>
              </table></td>
            </tr>
        </table></td>
      </tr>
      <tr >
         
      </tr>
    </table></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border-top: solid 2px #E6E7E8 ;  border-bottom: solid  2px #E6E7E8; background-image:url(bg_naf.jpg); background-repeat:no-repeat; background-repeat:repeat-x">
              <tr>
                <th valign="top" bgcolor="#FFF" scope="row"><table border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="center" style="padding-bottom:5px;" bgcolor="#FFF">  
        <?     include ("admin/menu/all.php");  ?>  
                    </td>
                  </tr>
                </table></th>
  </tr>
</table>
