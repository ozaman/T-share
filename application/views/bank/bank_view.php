<style>
.btn-action-bank{
   	    border: 1px solid #ccc;
   	    color: #000;
   	    background-color: #fff;
   	    box-shadow: 1px 1px 3px #cacaca;
   }
</style>
<div style="padding: 10px 10px;">
    <ons-button style="background-color: #fff;" modifier="outline" class="button-margin button button--outline button--large" onclick="addBank();">เพิ่มข้อมูลบัญชี</ons-button>
</div>

<?php 
		$sql = "SELECT t1.*,t2.name_th as bank_list FROM web_bank_driver as t1 left join web_bank_list as t2 on t1.bank_id = t2.id ";
      	$query_bank = $this->db->query($sql);
      	$num = 0;
      	foreach($query_bank->result()  as $row){ 
      	$num+=1;
      	?>
			<ons-card class="card">
				<table width="100%">
					<tr>
						<td>
							<table>
								<tr>
							   	  	<td colspan="">
							   	  		<label class="left">
								         <?php 
								         	if($row->status_often==1){
												$this_status_usecar = "checked";
											}else{
												$this_status_usecar = "";
											}
								         ?>
								          <ons-radio <?=$this_status_usecar;?> class="radio-fruit" input-id="often-<?=$num;?>" value="<?=$num;?>" name="use_often" onclick="changeBankOften('<?=$row->id;?>');" ></ons-radio>
								        </label>
								        <label for="often-<?=$num;?>" class="center">ใช้ประจำ</label>
							   	  	</td>
							   	  </tr>
								<tr>
									<td>
										<button type="button" class="button btn-action-bank" onclick="editBank('38');" style="width:100%">
	                                       <center>
	                                          <div class="font-30"><i class="fa fa-edit" style="color:#3b5998"></i></div>
	                                          <span style="padding-bottom:20px;" class="font-16"> แก้ไขข้อมูล </span>
	                                       </center>
	                                    </button>
									</td>
								</tr>
								<tr>	
									<td>
										<button type="button" class="button btn-action-bank" onclick="changeCarStatus('38',0)" style="width:100%">
		                                       <center>
		                                          <div class="font-30"><i class="fa fa-check " style="color:#34cb4a;"></i></div>
		                                          <span style="padding-bottom:20px;" class="font-16">  ใช้งาน  </span>
		                                       </center>
		                                    </button>
									</td>
								</tr>
							</table>
						</td>
						<td>
							<table width="100%" border="0" cellspacing="2" cellpadding="2">
							   <tbody>
							   	  
							   	  <tr>
							         <td width="80" class="font-16 "><strong>ชื่อบัญชี</strong></td>
							         <td>
							            <div class="input-group date" style="padding:0px;width: 100%"><span><?=$row->bank_name;?></span></div>
							         </td>
							      </tr>
							      <tr>
							         <td width="80" class="font-16"><strong>เลขที่บัญชี</strong></td>
							         <td width="" class="font-16"> <span>5540011055</span></td>
							      </tr>
							      <tr>
							         <td width="80" class="font-16 "><strong>ธนาคาร</strong></td>
							         <td width="" class="font-16 " >
							            <span><?=$row->bank_list;?> </span>
							         </td>
							      </tr>
							      <tr>
							      	<td class="font-16 "><strong>สาขา</strong></td>
							      	<td width="" class="font-16 " >
							            <span><?=$row->bank_branch;?> </span>
							         </td>
							      </tr>
							      <!--<tr>
							      	<td class="font-16 "><strong>วันที่เพิ่ม</strong></td>
							      	<td width="" class="font-16 " >
							            <span><?=date('Y-m-d h:i',$row->post_date);?> </span>
							         </td>
							      </tr>-->
							      <tr>
							   	  	<td colspan="2">
							   	  		<img src="../data/pic/driver/book_bank/1.jpg" style="max-width: 100px; height: 70px; border: 1px solid #eee; box-shadow: 1px 1px 3px #ccc;" />
							   	  	</td>
							   	  </tr>
							   </tbody>
							</table>
						</td>
					</tr>
				</table>
			</ons-card>

<?php		}
?>


