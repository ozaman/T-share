  <script src="plugins/jQuery/js/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>


    <link rel="stylesheet" href="plugins/iCheck/square/green.css">

<script src="plugins/iCheck/icheck.min.js"></script>
<?
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$all_car = $db->num_rows('web_carall',"id","drivername=".$user_id." and status=1");
$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
$res[car] = $db->select_query("SELECT * FROM   web_carall  where drivername='".$user_id."' and status=1 order by id desc  ");
$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
$arr[car] = $db->fetch($res[car]);
?>
<style>
	.div-car-active
	{
		background-color: #FFFCD5;
		border: 1px solid #ddd;
	}
	@-webkit-keyframes car-color
	{
		0%
		{
			color: #FF0000
		}
		50%
		{
			color: white
		}
		100%
		{
			color: #FF0000
		}
	}
	@-moz-keyframes car-color
	{
		0%   {
		color: #FF0000
	}
	50%
	{
		color: white
	}
	100%
	{
		color: #FF0000
	}
	}
	.car-status-icon
	{
		font-size: 20px;
		-webkit-transition: all 2s;
		-moz-animation: car-color 2s infinite;
		-webkit-transition: all 2s;
		-webkit-animation: car-color 2s infinite;
	}
</style>
<input  name="all_car"  type="hidden" class="form-control"  id="all_car" value="<?=$all_car?>"   />
<div  style="padding:5px;   border-radius: 5px; /*border: 1px solid #ddd;background-color:#F6F6F6;*/  margin-bottom: 0px; box-shadow: 0px  0px 0px #DADADA  ; margin-top: 15px;"  >
	<div id="load_car_data_booking" style="display:none">
		<table width="100%" border="0" cellspacing="1" cellpadding="1">
			<tbody>
				<tr>
					<td width="40%" align="center">
						<div class="topicname">ประเภท</div>
						<select class="form-control" name="car_type" id="car_type">
							<option value=""  >-เลือก-</option>
							<option value="เก๋ง"  <?
 if($arr[car][car_color]=='car'){ echo 'selected=selected';} ?>  >เก๋ง</option>
							<option value="ตู้" <?
 if($arr[car][car_color]=='van'){ echo 'selected=selected';} ?>>ตู้</option>
							<option value="suv" <?
 if($arr[car][car_color]=='suv'){ echo 'selected=selected';} ?>>suv</option>
							<option value="ตุ๊กๆ" <?
 if($arr[car][car_color]=='tuk'){ echo 'selected=selected';} ?>>ตุ๊กๆ</option>
							<option value="สองแถว" <?
 if($arr[car][car_color]=='songtaw'){ echo 'selected=selected';} ?>>สองแถว</option>
							<option value="อื่นๆ" <?
 if($arr[car][car_color]=='other'){ echo 'selected=selected';} ?>>อื่นๆ</option>
						</select></td>
					<td width="30%" align="center"><div class="topicname">สีรถ</div>
						<select class="form-control" name="car_color" id="car_color">
							<option value=""  >-เลือก-</option>
							<option value="ขาว"  <?
 if($arr[car][car_color]=='White'){ echo 'selected=selected';} ?>  >ขาว</option>
							<option value="ดำ" <?
 if($arr[car][car_color]=='Black'){ echo 'selected=selected';} ?>>ดำ</option>
							<option value="เหลือง" <?
 if($arr[car][car_color]=='Yellow'){ echo 'selected=selected';} ?>>เหลือง</option>
							<option value="เขียว" <?
 if($arr[car][car_color]=='Green'){ echo 'selected=selected';} ?>>เขียว</option>
							<option value="แดง" <?
 if($arr[car][car_color]=='Red'){ echo 'selected=selected';} ?>>แดง</option>
							<option value="เทา" <?
 if($arr[car][car_color]=='Gray'){ echo 'selected=selected';} ?>>เทา</option>
							<option value="บรอนด์ทอง" <?
 if($arr[car][car_color]=='Golden Bronze'){ echo 'selected=selected';} ?>>บรอนด์ทอง</option>
							<option value="บรอนด์เงิน" <?
 if($arr[car][car_color]=='Silver Bronze'){ echo 'selected=selected';} ?>>บรอนด์เงิน</option>
						</select></td>
					<td width="30%" align="center">
						<div class="topicname">ทะเบียน</div>
						<input name="car_plate" type="text"   required="true" class="form-control" id="car_plate"  onkeypress="UserEnter(this,event)" value="<?=$arr[car][plate_num] ?>"    >
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<script>
		$('#menu_add_new_car_booking').click(function(){
				$("#load_mod_popup_4" ).toggle();
				var url_load_new_car_booking = "load_page_mod_4.php?name=car&file=new_car&type=booking";
				$('#load_mod_popup_4').html(load_main_mod);
				$('#load_mod_popup_4').load(url_load_new_car_booking);
			});
	</script>
	<div class="font-26" style="margin-top:10px;" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td class="font-26">
					</td>
				</tr>
			</tbody>
		</table>
		<br>
		<?
		/// $user_id=0;
		$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
		//// last id
		$res[projectcar] = $db->select_query("SELECT * FROM   web_carall  where drivername='".$user_id."' and status=1   order by status_usecar desc  ");
		///$res[contact_phone] = $db->select_query("SELECT * FROM  contact_phone WHERE company = '".$arr[product][admin_company]."' ");
		while($arr[projectcar] = $db->fetch($res[projectcar])){
			$arr[type] = $db->fetch($res[type]);
			$bgcolor = ($i++ & 1) ? '#FFFFFF' : '#FFFFFF';
			$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
			$res[car_type] = $db->select_query("SELECT * FROM ".TB_carall_type." WHERE id='".$arr[projectcar][car_type]."' ");
			$arr[car_type] = $db->fetch($res[car_type]);
			?>
			<script>
				$("#use_car_<?=$arr[projectcar][id]?>").click(function(){
						///
						swal({
								title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
								text: "<font style='font-size:22px'>ว่าต้องการใช้ประจำ",
								type: "success",
								showCancelButton: true,
								confirmButtonColor: '<?=$main_color?>',
								confirmButtonText: 'ใช่',
								cancelButtonText: "ไม่ใช่",
								closeOnConfirm: true,
								closeOnCancel: true,
								html: true
							},
							function(isConfirm){
								if (isConfirm){
									//swal("ยืนยัน", "success");
									////
									var url_<?=$arr[projectcar][id]?> = "popup.php?name=car&file=savedata&id=<?=$arr[projectcar][id]?>&usecar=1";
									$('#show_car_detail').load(url_<?=$arr[projectcar][id]?>);
								} else {
									swal("Cancelled", "", "error");
								}
							});
						/////
					});
			</script>
			<script>
				$("#cancel_car_<?=$arr[projectcar][id]?>").click(function(){
						///
						swal({
								title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
								text: "<font style='font-size:22px'>ว่าต้องการเลิกใช้งาน",
								type: "warning",
								showCancelButton: true,
								confirmButtonColor: '#FF0000',
								///	confirmButtonClass: "btn-danger",
								confirmButtonText: 'ใช่',
								cancelButtonText: "ไม่ใช่",
								closeOnConfirm: true,
								closeOnCancel: true,
								html: true
							},
							function(isConfirm){
								if (isConfirm){
									//swal("ยืนยัน", "success");
									////
									var url_<?=$arr[projectcar][id]?> = "popup.php?name=car&file=savedata&action=confirm&type=driver&id=<?=$arr[projectcar][id]?>&close=1";
									$('#show_car_detail').load(url_<?=$arr[projectcar][id]?>);
								} else {
									swal("Cancelled", "", "error");
								}
							});
						/////
					});
			</script>
			<div style="border-radius: 6px;
 border: 0px solid #ddd;
 background:<? echo $bgcolor; ?>; margin-bottom:5px; box-shadow: 0px  0px 5px #DADADA; margin-top:10px; margin-bottom:20px;"    >
				<table width="100%" border="0" cellspacing="2" cellpadding="2" style="display: none;">
					<tbody>
						<tr>
							<td>
								<div class="dropdown" style="margin-left:-10px;">
									<a style="height:40; padding-left:10px; padding-right:5px; font-size:20px;text-decoration: inherit;  " data-toggle="dropdown"><i class="fa fa-gear"></i>&nbsp;ตั้งค่าการใช้งานรถ</a>
									<ul class="dropdown-menu" role="menu"  style="background-color:<?=$main_color?>; width:100%">
										<li><a class="font-22" style="color:#FFFFFF; font-size:22px"><i class="fa fa-edit"></i>แก้ไขข้อมูลรถ</a></li>
										<li><a  id="use_car_<?=$arr[projectcar][id]?>" class="font-22" style="color:#FFFFFF; font-size:22px"><i class="fa fa-check-square"></i>ใช้รถประจำ</a></li>
										<li><a id="cancel_car_<?=$arr[projectcar][id]?>" class="font-22" style="color:#FFFFFF; font-size:22px"><i class="fa fa-trash"></i>ยกเลิกใช้รถ</a></li>
									</ul>
								</div>
								<div class="dropdown" style="display:none">
									<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
										<span class="caret"></span></button>
									<ul class="dropdown-menu">
										<li><a href="#">HTML</a></li>
										<li><a href="#">CSS</a></li>
										<li><a href="#">JavaScript</a></li>
									</ul>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<a id="car_<?=$arr[projectcar][id]?>"    style="text-decoration:none; margin-top:30px;" >
					<table width="100%" border="0" cellspacing="2" cellpadding="2"   id="div_car_<?=$arr[projectcar][id]?>">
						<tbody>
						<tr>
							
					<td >
							<table width="100%" cellpadding="1" cellspacing="2"  >
							<tr>
							<?
							//Comment Icon
							?>
							<?
							if($arr[projectcar][plate_color]=="Green"){
								$plate_color="009999"; } ?>
							<?
							if($arr[projectcar][plate_color]=="Yellow"){
								$plate_color="FFCC00"; } ?>
							<?
							if($arr[projectcar][plate_color]=="Black"){
								$plate_color="FFFFFF"; } ?>
							<?
							if($arr[projectcar][plate_color]=="Red"){
								$plate_color="FF0000"; } ?>
							<td width="100"   align="center" bgcolor="#<?=$plate_color?>" style="border: solid 2px; height:20px; color:#DADADA; padding:5px; padding-right:0px;border-radius:5px;"><font color="#<?
 if($arr[projectcar][plate_color]=="Green"){
	 echo "FFFFFF"; } ?>"  class="font-28"><b><? echo $arr[projectcar][plate_num];?> <br>
										<font   class="font-20"><? echo $arr[projectcar][province];?></font></b></font></td>
						</tr>
					</table>
					<div class="font-24" style="display: none;" >
					<b><? echo "" . $arr[car_type][topic_th] . " "; ?> <?echo $arr[projectcar][car_brand];?></b>
					</div>
					</td>

					<td valign="top" style="display: none;">
					<img src="../data/pic/car/<?=$arr[projectcar][id];?>_1.jpg?v=<?=$arr[projectcar][update_date];?>"  width="100%"   border="0"      style="margin-top: 3px;border-radius:5px;" /></td>
					<td width="50" align="center">
					<input  name="check_use_car" type="radio" id="check_use_car_<?=$arr[projectcar][id]?>" style="height:30px; width:30px;box-shadow:none" value="CONFIRM"	/>
							
                            
                            
  <script>
								
								
 $('#check_use_car_<?=$arr[projectcar][id]?>').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' // optional
    });	
								
								
								
								
								
								
								
								
								
									$('#car_<?=$arr[projectcar][id]?>').on('click', function () {
											$('.div-car-active').removeClass('div-car-active');
											$('#div_car_<?=$arr[projectcar][id]?>').addClass('div-car-active');
											document.getElementById('check_use_car_id').value=<?=$arr[projectcar][id]?>;
											var url_load_car= "popup.php?name=booking/load/booking&file=car_detail&car=<?=$arr[projectcar][id]?>";
											$('#load_car_data_booking').load(url_load_car);
											$('#button_show_car_detail').show();
											///  $('#check_use_car_<?=$arr[projectcar][id]?>').click();
											  
											  
											  
											  $('#check_use_car_<?=$arr[projectcar][id]?>').iCheck('check'); 
											  
										//	document.getElementById('check_use_car_<?=$arr[projectcar][id]?>').checked=true;
										});
									/*
									/*
									$('#check_use_car_<?=$arr[projectcar][id]?>').iCheck({
									$('.div-car-active').removeClass('div-car-active');
									$('#div_car_<?=$arr[projectcar][id]?>').addClass('div-car-active');
									document.getElementById('check_use_car_id').value=<?=$arr[projectcar][id]?>;
									var url_load_car= "popup.php?name=booking/load/booking&file=car_detail&car=<?=$arr[projectcar][id]?>";
									$('#load_car_data_booking').load(url_load_car);
									$('#button_show_car_detail').show();
									$('#check_use_car_<?=$arr[projectcar][id]?>').iCheck('check');
									//    document.getElementById('check_use_car_<?=$arr[projectcar][id]?>').checked=true;
									});
									*/
									/*
									$(function () {
									$('#check_use_car_<?=$arr[projectcar][id]?>').iCheck({
									checkboxClass: 'icheckbox_square-blue',
									radioClass: 'iradio_square-green',
									increaseArea: '20%' // optional
									});
									});
									*/
									
								   $('#check_use_car_<?=$arr[projectcar][id]?>').on('ifChecked', function(event){	
								//	$('#check_use_car_<?=$arr[projectcar][id]?>').on('click', function () {
											
											if($('#check_show_submit').val()==1){
												$('#step_4').show();
											  		$('#show_submit').show();
											  		$('#row_accept_car').show();
//													$('#show_submit').addClass('border-alert');
													$('#show_transfer_detail').removeClass('border-alert');
													/*var x = document.getElementById("load_mod_popup_3");
 												x.scrollTo(0, x.scrollHeight);*/
											  }
										
											$('.div-car-active').removeClass('div-car-active');
											$('#div_car_<?=$arr[projectcar][id]?>').addClass('div-car-active');
											document.getElementById('check_use_car_id').value=<?=$arr[projectcar][id]?>;
											var url_load_car= "popup.php?name=booking/load/booking&file=car_detail&car=<?=$arr[projectcar][id]?>";
											$('#load_car_data_booking').load(url_load_car);
											$('#button_show_car_detail').show();
										});
								</script>
							</td>
					</tr>
					</tbody>
					</table>
				</a>
			</div>
			<? } ?>
		<input name="check_use_car_id" type="hidden"  required="true" class="form-control" id="check_use_car_id" style="padding:4px 2px;width:100%;"   value="<?=$arr[project][wait_status]?>"   >
		<input name="check_all_car" type="hidden"  required="true" class="form-control" id="check_all_car" style="padding:4px 2px;width:100%;"   value="<?=$all_car?>"   >
		<a id="menu_add_new_car_booking">
			<i class="fa fa-plus-circle"  style="color:<?=$main_color?>" ></i>  เพิ่มรถใหม่
		</a>
		<span style="color:#FF0000" class="font-22">
			<?
			if($all_car>0){ ?>
				(จำนวนรถที่ใช้งาน  <?=$all_car?> คัน)
				<? }
			else{ ?>
				(ยังไม่มีรถให้เลือก)
				<? } ?>
		</span>
	</div>
</div>
<?
if($all_car ==1){  ?>
	<script>
		$('#car_<?=$arr[car][id]?>').click() ;
		$('#check_show_submit').val(1);
	</script>
	<? } ?>   