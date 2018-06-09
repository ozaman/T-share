<?
   //echo $_GET[type];
    $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
   /* $query_topic = "topic_th"; 
   	if($_COOKIE['lng']=="th"){
   		$query_topic = "topic_th"; 
   	}else if($_COOKIE['lng']=="en"){
   		$query_topic = "topic_en"; 
   	}else if($_COOKIE['lng']=="cn"){
   		$query_topic = "topic_cn"; 
   	}*/
   $res[projecttype] = $db->select_query("SELECT ".$place_shopping." as name,id FROM shopping_product_sub where   id=".$_GET[type]."  ");
   $arr[projecttype] = $db->fetch($res[projecttype]);
   $ArrDayName[Sun] = t_sunday;
   $ArrDayName[Mon] = t_monday;
   $ArrDayName[Tue] = t_tuesday;
   $ArrDayName[Wed] = t_wednesday;
   $ArrDayName[Thu] = t_thursday;
   $ArrDayName[Fri] = t_friday;
   $ArrDayName[Sat] = t_saturday;
    $day_now =  date('D');
    ?>
<style>
   .search-box-shop{
   width: 100%;
   padding: 15px;
   font-size: 19px;
   border: 1px solid #ddd;
   box-shadow: 1px 1px 2px #ddd;
   border-radius: 10px;
   }
   ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
   color:    #c9c9c9;
   }
</style>
<script>
   console.log('<? echo $place_shopping;?>');
   $(".text-topic-action-mod-2" ).html("<? echo $arr[projecttype][name];?>");
</script> 
<div style="margin-top:45px;">
   
   
   <?
      $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
      $res[project] = $db->select_query("SELECT id,status,pic_logo,pic_book,pic_book_2,pic_book_3,".$place_shopping." as name FROM shopping_product   WHERE sub=".$_GET[type]." and status=1 and province = '".$_GET[province]."'  ");
      while($arr[project] = $db->fetch($res[project])){
      ?>
   <div style="padding-bottom:10px; padding-top:10px;   <? if( $arr[project][status]==0){?>
      opacity:0.4;   pointer-events: none;   
      <? } ?>
      ">
      <? if( $province==1){ 
         $provincename='ภูเก็ต';
         }  
         if($_GET[detail]!=""){
         //	 	 $display_none = '';
         $display_none2 = '';
         $display_none_showdetail = 'style="display: none;"';
         $onclick = "";
         }
		 else{
         //	 	 $display_none = 'style="display: none;"';
         $display_none2 = 'style="display: none;"';
         $display_none_showdetail = '';
         $onclick = "showTr('".$arr[project][id]."');";
         }
         $class_tr = 'class="to_show_'.$arr[project][id].'" '; 
         ?>  
      <table width="100%" border="0" cellspacing="4" cellpadding="4" style="border-bottom : 2px solid #DADADA;" id="row_place_<?=$arr[project][id];?>" >
         
            <tr>
               <td colspan="2"  >
                  <table width="100%" onclick="<?=$onclick;?>">
                     <tr >
                        <td width="110">
                           <? if($arr[project][pic_logo]==1){ ?>
                           <img src="../data/pic/place/<? echo $arr[project][id];?>_logo.jpg" width="100px"   alt="" style=" border-radius:  15px; border: 1px solid #ddd; margin-bottom:5px;" />
                           <? } ?>
                        </td>
                        <td >
                           <div class="element_to_find">
                              <span class="font-22" style="color:<?=$main_color?>" ><? echo $arr[projecttype][name];?> </span><br>  
                              <span class="font-22" style="color:#333333">
                                 <b>
                                    <? echo $arr[project][name];?>
                              </span>
                              <br>	
                              <input type="hidden" value="<?=$arr[project][topic_th]." ".$arr[project][topic_en];?>" id="<?=$arr[project][id];?>"  />
                           </div>
                           <a class="font-20" <?=$display_none_showdetail;?> >
                           <strong id="txt_sh_<?=$arr[project][id];?>">แสดงรายละเอียด</strong>
                           <span id="icon_sh_<?=$arr[project][id];?>"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                           </a> 
                           <input type="hidden" id="check_click_<?=$arr[project][id];?>" value="0"/>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
            <tr >
               <td>
                     <div id="databook"></div>
               </td>
               
            </tr>
      </table>
   </div>
   
   
   <script>
      ///
      
    
      if (user_class == 'lab') {
      var url_load = "go.php?name=shop/shop_new&file=booking_lab&driver=<?=$user_id?>&place=<? echo $arr[project][id];?>";

      }
      else{
         var url_load = "go.php?name=shop/shop_new&file=booking&driver=<?=$user_id?>&place=<? echo $arr[project][id];?>";
      }
       
            
    $.post( url_load, function( data ) {
             // $('#main_load_mod_popup').toggle();
     $('#databook').html(data);
      });
   </script>
   <? } ?>
   
</div>
