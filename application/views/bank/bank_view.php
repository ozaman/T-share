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
      	
      	foreach($query_bank->result()  as $row){ ?>
			<ons-card class="card">
				<table width="100%">
					<tr>
						<td>
							<table>
								<tr>
									<td>
										<button type="button" class="button btn-action-bank" onclick="editBank('38');" style="width:100%">
	                                       <center>
	                                          <div class="font-30"><i class="fa fa-edit" style="color:#3b5998"></i></div>
	                                          <span style="padding-bottom:20px;" class="font-16"> แก้ไขข้อมูลรถ </span>
	                                       </center>
	                                    </button>
									</td>
								</tr>
								<tr>	
									<td>
										<button type="button" class="button btn-action-bank" onclick="changeCarStatus('38',0)" style="width:100%">
		                                       <center>
		                                          <div class="font-30"><i class="fa fa-car " style="color:#34cb4a;"></i></div>
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
							         <td width="50" class="font_18 " style="height:30px;  padding-left:5px;">ชื่อบัญชี</td>
							         <td>
							            <div class="input-group date" style="padding:0px;width: 100%"><span><?=$row->bank_name;?></span></div>
							         </td>
							      </tr>
							      <tr>
							         <td width="50" class="font_18" style="height:30px;  padding-left:5px;">เลขที่บัญชี</td>
							         <td width="" class="font_16" style="font-size: 16px;"> <span>5540011055</span></td>
							      </tr>
							      <tr>
							         <td width="50" class="font_18 " style="height:30px;  padding-left:5px;">ธนาคาร</td>
							         <td width="" class="font_16 " style="color:#333;font-size: 16px;">
							            <span><?=$row->bank_list." สาขา ".$row->bank_branch;?> </span>
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


