<?php
if($_GET[query]=='province'){ ?>
	<select class="form-control mobileSelect" id="province" name="province" data-animation="zoom" data-title="เลือกจังหวัด" data-theme="white" >
                      	<option value="">- เลือก -</option>
                      	<? //foreach($arr_province as $value){ ?>
                      		<!--	<option value="<?=$value;?>"><?=$value;?></option>-->
                      	<? //} ?>
                      	<?php 
                      	$db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                                  $res[pv] = $db->select_query("SELECT * FROM web_province where area = '".$_GET[area]."' ORDER BY name_th asc  ");
                                   while($arr[pv] = $db->fetch($res[pv])) { 
                                   $txt = explode("/",$arr[pv][name_th]);
                                   ?>
                             <option value="<?=$txt[0];?>" class="<?=$arr[pv][area];?>"><?=$txt[0];?></option> 
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