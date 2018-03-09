<?php
if($_GET[query]=='province'){ ?>
	<select class="form-control mobileSelect" id="province" name="province" data-animation="zoom" data-theme="white" data-title="<table><tr><td width='110'><span style='font-size:20px;'>เลือกจังหวัด</span></td><td><input type='text' value='' class='form-control filter_province' style='height:35px;margin-top:-7px;' onkeyup='filterProvince()' /></td></tr></table>" >
                      	<option value="">- เลือก -</option>
                      	
                      	<?php 
                      
                      	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                                  $res[pv] = $db->select_query("SELECT * FROM web_province where area = '".$_GET[area]."' ORDER BY name_th asc  ");
                                   while($arr[pv] = $db->fetch($res[pv])) { 
                                   $txt = explode("/",$arr[pv][name_th]);
                                   if($_GET[province]==$txt[0]){
								   		$selected_pv = 'selected';
								   }else{
								   		$selected_pv = '';
								   }
                                   ?>
                             <option value="<?=$txt[0];?>" <?=$selected_pv;?> class="<?=$arr[pv][area];?>" ><?=$txt[0];?></option> 
                      	 <? } ?>
                     </select>
                     <script type="text/javascript">
                                $(function(){
                                    
                                    $('#province').mobileSelect({
									    onClose: function(){        
									        console.log('onClose: '+this.val());
									    },
									    onOpen: function(){
									        console.log('onOpen: '+this.val());
									         $('.mobileSelect-container:visible').find('.mobileSelect-control').each (function() {
									 			if($(this).text()=='- เลือก -'){
													$(this).hide();
												}else{
													$(this).show();
													
												}
											});
									    },
									     buttonSave: 'ตกลง',
									     buttonCancel: 'ยกเลิก'
									});
									
                                })
                     </script>
<? }

if($_GET[query]=='find_area_id'){
	
}
?>