  <input name="main_check_country_val" type="hidden" class="sload_park_driver" id="main_check_country_val" style="width:60px; background:#FFFFFF" value="0" />
 
  <div id="save_data_open_country" style="display:none">ssssss</div> 
 
<?

 $db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
 
  $res[country] = $db->select_query("SELECT id FROM  plan_product_price_setting  where  id=".$_GET[plan_id].""  );
 
 $arr[country] = $db->fetch($res[country]);
 
 
 
  $res[price] = $db->select_query("SELECT id FROM plan_product_price_name where  id=".$arr[country] [plan_id]."   ");
             
  $arr[price] = $db->fetch($res[price]);
  
  
//  echo $arr[price][country_name];
  
?>
 
 
 
 
 
 
  
  
  
  
    <TABLE cellSpacing=0 cellPadding=0 width=100% border=0 class="topic_sup">
      <TBODY>
        <TR>
          <TD width="100%" vAlign=top>

		  <div>
		    <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                
              </tr>
            </table>
		  </div>
          
  <style>
		  .checkbox-plan-country{ width:18px; height:18px; }
		  
 </style>  
          
          
			<TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0>
<?
//�ʴ��������/��Ъ�����ѹ�� 
if($_GET[category]){
	$SQLwhere = " cat_main='".$_GET[category]."' ";
	$SQLwhere2 = " WHERE cat_main='".$_GET[category]."' ";
}
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$limit = 10 ;
$SUMPAGE = $db->num_rows(TB_shop,"id","$SQLwhere");
$page=$_GET[page];
if (empty($page)){
	$page=1;
}
$rt = $SUMPAGE%$limit ;
$totalpage = ($rt!=0) ? floor($SUMPAGE/$limit)+1 : floor($SUMPAGE/$limit); 
$goto = ($page-1)*$limit ;





 $res[shop] = $db->select_query("SELECT * FROM  product_price_list_all where plan_setting=".$_GET[id]."   and status=1 and country<>240 order by sort_country desc ");
$count=0;
while($arr[shop] = $db->fetch($res[shop])){
	if ($count==0) { echo "<TR>"; }
	
	
 
 
	
	//������Ǵ���� 

?>
			<td  cellpadding="3"   valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="3">
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border:solid 0px; color:#E6E6E6" >
                  <tr> </tr>
                  <tr></tr>
                  <tr>
                    <td valign="middle"> 
    
    
    
    


   
 
                      <label>
                      
                      <table width="100%" border="0" cellspacing="2" cellpadding="2">
                        <tbody>
                          <tr>
                            <td width="22">
                            
                            
                            <? if($arr[shop][extra_country]==1 ) { ?>
                            
                            <script>
							document.getElementById('check_country_<?=$arr[shop][id]?>').checked=true;
					 	</script>
                            
                      <? } ?>
                            
      
                            <?=$chk_price_all?>
                            
                            
                            
                            
                      
                            
                            
                            
                            <div style="margin-top:-10px;">
                             
  <input  setid="<?=$arr[shop][id]?>"   plan="<?=$_GET[id]?>"   id="check_country_<?=$arr[shop][id]?>"  name="check_country_<?=$arr[shop][id]?>"  type="checkbox" class="checkbox-plan-country"  value="1" <?=$chk_price_all?> />
                            </div></td>
                            <td width="30"><img src="images/flag/<?=$arr[shop][country_name]?>.png" width="30" height="30" alt="" style="margin-top:-5px;"/></td>
                            <td><span class="font-20">
                              <?=$arr[shop][country_name_th]?> 
      </span>
      
      
      
        <script>
						
 $("#check_country_<?=$arr[shop][id]?>").click(function(){
	 
 

 
 if (document.getElementById('check_country_<?=$arr[shop][id]?>').checked) {
 
		 
 $('#main_check_country_val').val(1);
    //blah blah
}
	  else  {
		  
 
		  
	 $('#main_check_country_val').val(0);	  
		  
	  }
 
	 
	 
 
 var url_page_type= "go.php?name=content/load/list/country&file=open_country&op=open";
  
 url_page_type =url_page_type+"&status="+document.getElementById('main_check_country_val').value;
 
 url_page_type =url_page_type+"&id=<?=$arr[shop][id]?>";
 
$('#save_data_open_country').load(url_page_type);

  $('#btn_load_extra').click();
////  status

 
  var url_page_type= "go.php?name=content/load/list/country&file=list_country";
 
 url_page_type =url_page_type+"&id=<?=$_GET[id]?>";
 $('#load_extra_country_status').load(url_page_type);
  
/*

  var url_page_type= "go.php?name=content/load/list/country&file=list_country";
 
 url_page_type =url_page_type+"&id="+data_plan;
 $('#load_extra_country_status').load(url_page_type);

 */
 
 
	   });
	   
						
						</script>    
      
      
      
      
      
      
      
      </td>
                          </tr>
                        </tbody>
                      </table>
                      
                         </label>
                      
                      
                      
                      
                      
                      </td>
                    
                  </tr>
                  <tr>
                    <td  colspan="2" ></td>
                  </tr>
                </table></td>
              </tr>
            </table></TD>
<?
$count++;
if (($count%10) == 0) { echo ""; $count=0; }
}
$db->closedb ();
//������ʴ��������
?>
			</TABLE>
				<!-- End shop -->
          </TD>
        </TR>
      </TBODY>
    </TABLE>
<?

        if($_GET[op] == "open"){
		  
		  
 
 
	//////////////////////////////////////////// óź Form
  $db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
        $db->update_db('product_price_list_all', array(
 
		"extra_country"=>"$_GET[status]"
 
 
		)," id='".$_GET[id]."' ");

  }
  

?>
















    <script>
 
 


/// update_list_country
	   
	    $("#btn_update_list_country").click(function(){
	   
   
  //setTimeout(function () {
  $('#btn_load_extra').click();
 
///}, 2000); //w
 
 
 
 
	   });
 
	   </script>
  
  
