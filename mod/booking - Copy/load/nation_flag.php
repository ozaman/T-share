
  <?
                                
								
								
 	  $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
                         
  $res[category] = $db->select_query("SELECT * FROM  web_country where id=".$_GET[nation]."  ORDER BY id  ");
                      
 $arr[category] = $db->fetch($res[category]) ;
 
 
 
							 
							      ?>
<? if($arr[category][name_en]<>''){ ?>                     
                                  
 <img src="images/flag/<?=$arr[category][name_en]?>.png" width="40" height="40" alt="" style="margin-top:-5px;"/> 
 
 
 <? } ?>
 