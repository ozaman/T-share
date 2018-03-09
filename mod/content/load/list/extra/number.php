<?  if($_GET[action] == "from"){ 


 

 




?>

   <select class="form-control" name="from_extra" id="from_extra" style="width:100%; font-size:16px; padding:5px; height:40px" >
 
          <?
				   for($ii=1;$ii<1001;$ii++){
				  
				  ?>
          <option value="<?=$ii;?>" <?  if($arr[price][to_number]== $ii){ echo "selected=selected";} ?> ><?=$ii;?></option>
          <?  } ?>
        </select>
 

<? } ?>











<?  if($_GET[action] == "to"){ 

 
?> 

        <select class="form-control" name="to_extra" id="to_extra" style="width:100%; font-size:16px; padding:5px; height:40px" >
        
                        <? if($_GET[from]==''){ 
						$_GET[from]=1;
						
						?>
                         <option value="" selected>- เลือก -</option>
                  
                  <? } ?>
        
 
          <?
				   for($ii=$_GET[from];$ii<1001;$ii++){
				  
				  ?>
                  
  
                  
                  
          <option value="<?=$ii;?>" <?  if($arr[price][to_number]== $ii){ echo "selected=selected";} ?> ><?=$ii;?></option>
          <?  } ?>
        </select>
<? } ?>                
  <script>
  
 $("#from_extra").change(function(){ 
	  
  var url_page_type= "go.php?name=content/load/list/extra&file=number&action=to";
   
  url_page_type =url_page_type+"&from="+document.getElementById('from_extra').value;
   
 
  $('#load_select_to_extra').load(url_page_type);
  
 
	  });
	  
	  
 //// 
 
 
  $("#to_extra").change(function(){ 
  
  
  
  
  
	  
  var url_page_type= "go.php?name=content/load/list/extra&file=number&action=from";
   
  url_page_type =url_page_type+"&to="+document.getElementById('to_extra').value;
  
  
  
  
 
 /// $('#load_select_from_extra').load(url_page_type);
  
 
	  });
	  
	  
	  
  
  </script>
      