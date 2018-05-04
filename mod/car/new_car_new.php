<div style="margin-top:35px;">

   <style>
            .plate-color {
            border-radius: 50%; 
            padding: 10px; 
            width: 45px;
            height: 20px; 
            border: solid 5px #FFFFFF;
            }
            .plate-color-active-- {
            border-radius: 50%; 
            padding: 10px; 
            width: 40px;
            height: 30px; 
            border: solid 5px #FFFFFF;
            }
            @-webkit-keyframes DIV-BORDER-STEP {
            0%   {  }
            50%  {border-color: #FFF200 }
            100% { }
            }
            @-moz-keyframes DIV-BORDER-STEP {
            0%   {  }
            50%  {border-color: #FFF200 }
            100% { }
            }
            .plate-color-active {
            border-radius: 50%; 
            padding: 10px; 
            width: 45px;
            height: 20px; 
            border: solid 5px #FFFFFF;
            -moz-animation: DIV-BORDER-STEP 1s infinite;
            -webkit-animation: DIV-BORDER-STEP 1s infinite;
            }
         </style>
   <script>
      var openby = '<?=$_GET[openby];?>';
      if(openby=='all'){
      	$('.text-topic-action-mod-1').html('<?=t_add_new_car;?>');
      }else{
      	$('.text-topic-action-mod').html('<?=t_add_new_car;?>');
      }
   </script>
   <?php 
      // $arr_province =array("กระบี่","กรุงเทพมหานคร","กาญจนบุรี","กาฬสินธุ์","กำแพงเพชร","ขอนแก่น","จันทบุรี","ฉะเชิงเทรา" ,"ชลบุรี","ชัยนาท","ชัยภูมิ","ชุมพร","เชียงราย","เชียงใหม่","ตรัง","ตราด","ตาก","นครนายก","นครปฐม","นครพนม","นครราชสีมา" ,"นครศรีธรรมราช","นครสวรรค์","นนทบุรี","นราธิวาส","น่าน","บุรีรัมย์","ปทุมธานี","ประจวบคีรีขันธ์","ปราจีนบุรี","ปัตตานี" ,"พะเยา","พังงา","พัทลุง","พิจิตร","พิษณุโลก","เพชรบุรี","เพชรบูรณ์","แพร่","ภูเก็ต","มหาสารคาม","มุกดาหาร","แม่ฮ่องสอน" ,"ยโสธร","ยะลา","ร้อยเอ็ด","ระนอง","ระยอง","ราชบุรี","ลพบุรี","ลำปาง","ลำพูน","เลย","ศรีสะเกษ","สกลนคร","สงขลา" ,"สตูล","สมุทรปราการ","สมุทรสงคราม","สมุทรสาคร","สระแก้ว","สระบุรี","สิงห์บุรี","สุโขทัย","สุพรรณบุรี","สุราษฎร์ธานี" ,"สุรินทร์","หนองคาย","หนองบัวลำภู","อยุธยา","อ่างทอง","อำนาจเจริญ","อุดรธานี","อุตรดิตถ์","อุทัยธานี","อุบลราชธานี","อื่นๆ");
                           
                           ?>
   <FORM name="myform_data" id="myform_data"   enctype="multipart/form-data" >
      <? //$coldata="col-md-6 col-fix";?>
      <div class=""  style="padding: 4px 7px;" >
         <div class="<?= $coldata?>">
            <h2 class="box-title" style="display:none"><span class="font-28"><b><?=t_add_new_car;?></b></span></h2>
            <table width="100%" border="0" cellspacing="2" cellpadding="0">
               <tbody>
                  <tr>
                     <td width="50%">
                        <div class="topicname"><span class="font-24"><?=t_type_of_vehicle;?></span></div>
                        
                        <div class="form-control" id="car_type2" style="padding: 8px 8px;">
                        	<input type="hidden" value="" name="car_type" />
                        	<span><?=t_select;?></span>
                        </div>
                        <script>
                        	$('#car_type2').click(function(){
                        		$('#material_dialog').show();
                        		$('#dialoglLabel').text('<?=t_type_of_vehicle;?>');
                        		$('#load_modal_body').html("<br/><br/><br/><br/>");
                        		var url = "empty_style.php?name=car/load&file=selector&query=car_type";
                        		$.post(url,function(res){
                        			$('#load_modal_body').html(res);
                        		});
                        	});
                        	function selectCarType(id,name){
                        		
								$('input[name="car_type"]').val(id);
								$('#car_type2 span').text(name);
								$('#ok_dialog').click();
							}
                        </script>
                     </td>
                     <td width="50%">
                        <div class="topicname"><span class="font-24"><?=t_car_brand;?></span></div>
                       
						<div class="form-control" id="car_brand" style="padding: 8px 8px;">
                        	<input type="hidden" value="" name="car_brand" />
                        	<span><?=t_select;?></span>
                        </div>
                         <script>
                        	$('#car_brand').click(function(){
                        		$('#material_dialog').show();
                        		$('#dialoglLabel').text('<?=t_type_of_vehicle;?>');
                        		$('#load_modal_body').html("<br/><br/><br/><br/>");
                        		var url = "empty_style.php?name=car/load&file=selector&query=car_brand";
                        		$.post(url,function(res){
                        			$('#load_modal_body').html(res);
                        		});
                        	});
                        	function selectCarBrand(id,name){
                        		
								$('input[name="car_brand"]').val(id);
								$('#car_brand span').text(name);
								$('#ok_dialog').click();
							}
                        </script>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="<?= $coldata?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
               <tbody>
                  <tr>
                     <td width="50%">
                        <div class="topicname"><span class="font-24"><?=t_model_year_manufacture;?></span></div>
                        <input class="form-control" type="text" name="car_model" id="car_model"  required="true"   value="<?=$arr[web_car][car_sub_brand]?>"   >
                     </td>
                     <td width="50%">
                        <div class="topicname"><span class="font-24"><?=t_car_coloring;?></span></div>

                        <!--<select class="form-control mobileSelect" id="car_color2" name="car_color" data-animation="zoom" data-title="<?=t_choose_color;?>" data-theme="white" >
                           <option value="" >- <?=t_select;?> -</option>
                           <option value="White"  <? if($arr[web_car][car_color]=='White'){ echo 'selected=selected';} ?>  ><?=t_white;?></option>
                           <option value="Black" <? if($arr[web_car][car_color]=='Black'){ echo 'selected=selected';} ?>><?=t_black;?></option>
                           <option value="Yellow" <? if($arr[web_car][car_color]=='Yellow'){ echo 'selected=selected';} ?>><?=t_yellow;?></option>
                           <option value="Green" <? if($arr[web_car][car_color]=='Green'){ echo 'selected=selected';} ?>><?=t_green;?></option>
                           <option value="Red" <? if($arr[web_car][car_color]=='Red'){ echo 'selected=selected';} ?>><?=t_red;?></option>
                           <option value="Gray" <? if($arr[web_car][car_color]=='Gray'){ echo 'selected=selected';} ?>><?=t_gray;?></option>
                           <option value="Golden Bronze" <? if($arr[web_car][car_color]=='Golden Bronze'){ echo 'selected=selected';} ?>><?=t_bronce_gold;?></option>
                           <option value="Silver Bronze" <? if($arr[web_car][car_color]=='Silver Bronze'){ echo 'selected=selected';} ?>><?=t_silver;?></option>
                        </select>-->   
						<div class="form-control" id="car_color" style="padding: 8px 8px;">
                        	<input type="hidden" value="" name="car_color" />
                        	<span><?=t_select;?></span>
                        </div>
                         <script>
                        	$('#car_color').click(function(){
                        		$('#material_dialog').show();
                        		$('#dialoglLabel').text('<?=t_choose_color;?>');
                        		$('#load_modal_body').html("<br/><br/><br/><br/>");
                        		var url = "empty_style.php?name=car/load&file=selector&query=car_color";
                        		$.post(url,function(res){
                        			$('#load_modal_body').html(res);
                        		});
                        	});
                        	function selectCarColor(id,name){
                        		
								$('input[name="car_color"]').val(id);
								$('#car_color span').text(name);
								$('#ok_dialog').click();
							}
                        </script>
                        
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="<?= $coldata?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
               <tbody>
                  <tr>
                     <td width="50%">
                        <div class="topicname"><span class="font-24"><?=t_license_plate_color;?></span></div>
                        <input class="form-control" type="text" name="plate_num" id="plate_num"  required="true" value="<?=$arr[web_car][plate_num];?>" >
                     </td>
                     <td width="50%">
                        <div class="topicname"><span class="font-24"><?=t_license_plate_color;?></span></div>
                        <!--<select class="form-control mobileSelect" id="plate_color" name="plate_color" data-animation="zoom" data-title="<?=t_choose_license_plate_color;?>" data-theme="white" >
                           <option value="" >- <?=t_select;?> -</option>
                           <option value="Green"  <? if($arr[web_car][plate_color]=='Green'){ echo 'selected=selected';} ?> ><?=t_green;?> </option>
                           <option value="Yellow"  <? if($arr[web_car][plate_color]=='Yellow'){ echo 'selected=selected';} ?>><?=t_yellow;?></option>
                           <option value="Red"  <? if($arr[web_car][plate_color]=='Red'){ echo 'selected=selected';} ?>><?=t_red;?></option>
                           <option value="Black" <? if($arr[web_car][plate_color]=='Black'){ echo 'selected=selected';} ?> ><?=t_black;?></option>
                        </select>-->
                        <div class="form-control" id="plate_color" style="padding: 8px 8px;">
                        	<input type="hidden" value="" name="plate_color" />
                        	<span><?=t_select;?></span>
                        </div>
                         <script>
                        	$('#plate_color').click(function(){
                        		$('#material_dialog').show();
                        		$('#dialoglLabel').text('<?=t_choose_color;?>');
                        		$('#load_modal_body').html("<br/><br/><br/><br/>");
                        		var url = "empty_style.php?name=car/load&file=selector&query=plate_color";
                        		$.post(url,function(res){
                        			$('#load_modal_body').html(res);
                        		});
                        	});
                        	function selectPlateColor(id,name){
                        		
								$('input[name="plate_color"]').val(id);
								$('#plate_color span').text(name);
								$('#ok_dialog').click();
							}
                        </script>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="<?= $coldata?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
               <tbody>
                  <tr>
                     <td width="50%">
                        <div class="topicname"><span class="font-24"><?=t_region;?></span></div>
                        <!--<select class="form-control mobileSelect" id="region" name="region" data-animation="zoom" data-title="<?=t_select_region;?>" data-theme="white" >
                           <option value="">- <?=t_select;?> -</option>
                           <?php 
                              $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                                         $res[region] = $db->select_query("SELECT * FROM web_area  ORDER BY ".$place_shopping." asc ");
                                          while($arr[region] = $db->fetch($res[region])) { ?>
                           <option value="<?=$arr[region][id];?>"><?=$arr[region][$place_shopping];?></option>
                           <? } ?>
                        </select>-->
                         <div class="form-control" id="region" style="padding: 8px 8px;">
                        	<input type="hidden" value="" name="region" />
                        	<span><?=t_select;?></span>
                        </div>
                         <script>
                        	$('#region').click(function(){
                        		$('#material_dialog').show();
                        		$('#dialoglLabel').text('<?=t_select_region;?>');
                        		$('#load_modal_body').html("<br/><br/><br/><br/>");
                        		var url = "empty_style.php?name=car/load&file=selector&query=region";
                        		$.post(url,function(res){
                        			$('#load_modal_body').html(res);
                        		});
                        	});
                        	function selectRegion(id,name){
                        		console.log(name);
                        		/*if(id != $('input[name="region"]').val()){
									$('input[name="province"]').val('');
									$('#province span').text('<?=t_select;?>');
								}*/
								$('input[name="region"]').val(id);
								$('#region span').text(name);
								$('#ok_dialog').click();
							}
                        </script>
                     </td>
                     <td width="50%">
                        <div class="topicname"><span class="font-24"><?=t_province;?></span></div>
                        <!--<select class="form-control" name="province" id="province"  >-->
                        <div id="load_province">
                           <!--<select class="form-control mobileSelect" id="province" name="province" data-animation="zoom" 
                           data-title="<table><tr><td width='110'><span class='font-22 text-cap'><?=t_select_province;?></span></td><td><input type='text' class='form-control filter_province' style='height:35px;margin-top:-7px;' onkeyup='filterProvince()'/></td></tr></table>" data-theme="white" >
                              <option value="">- <?=t_select;?> -</option>
                              <? //foreach($arr_province as $value){ ?>
                              
                              <? //} ?>
                              <?php 
                                 $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                                            $res[pv] = $db->select_query("SELECT * FROM web_province  ORDER BY ".$province." asc ");
                                             while($arr[pv] = $db->fetch($res[pv])) { 
                                             $txt = explode("/",$arr[pv][$province]);
                                             ?>
                              <option value="<?=$txt[0];?>" class="<?=$arr[pv][area];?>"><?=$txt[0];?></option>
                              <? } ?>
                           </select>-->
                           <div class="form-control" id="province" style="padding: 8px 8px;">
                        	<input type="hidden" value="" name="province" />
                        	<span><?=t_select;?></span>
                        	</div>
                           <script>
                        	$('#province').click(function(){
                        		$('#material_dialog').show();
                        		$('#dialoglLabel').text('<?=t_select_province;?>');
                        		$('#load_modal_body').html("<br/><br/><br/><br/>");
                        		var url = "empty_style.php?name=car/load&file=selector&query=province_new&region="+$('input[name="region"]').val();
                        		$.post(url,function(res){
                        			$('#load_modal_body').html(res);
                        		});
                        	});
                        	function selectProvince(id,name){
								$('input[name="province"]').val(id);
								$('#province span').text(name);
								$('#ok_dialog').click();
							}
                        </script>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         
         <script>
            $(".plate-color").click(function(){ 
             var data_color = $(this).attr('data_color');
             $(".plate-color-active").addClass("plate-color");
              $(".plate-color").removeClass("plate-color-active");
            $(".plate-color-active").removeClass("plate-color-active");
              $("#car_"+data_color).addClass("plate-color-active");
            document.getElementById('plate_color_name').value=data_color;
            //// 
             });
         </script>      
         <div class="<?= $coldata?>">
            <div class="take_photo" >
               <center>
               <i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_car_1"></i><br>
               <span class="font-24"><?=t_please_take_pictures_front_car;?></span>
               <div style="padding:5px;">
                  <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
                     <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_car_1" style="width:0%;border-radius:5px;border:none">
                     </div>
                  </div>
               </div>
               <img
                  <? if($_GET[id]){ ?>
                  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_car_1.jpg" 
                  <? }  ?>
                  id="image_id_car_1" name="image_id_car_1"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />
            </div>
         </div>
         <div class="<?= $coldata?>">
            <div class="take_photo" >
               <center>
               <i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_car_2"></i><br>
               <span class="font-24"><?=t_please_take_pictures_car_side;?></span>
               <div style="padding:5px;">
                  <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
                     <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_car_2" style="width:0%;border-radius:5px;border:none">
                     </div>
                  </div>
               </div>
               <img 
                  <? if($_GET[id]){ ?>
                  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_car_2.jpg" 
                  <? }  ?>
                  id="image_id_car_2" name="image_id_car_2"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />
            </div>
         </div>
         <div class="<?= $coldata?>">
            <div class="take_photo" >
               <center>
               <i class="fa  fa-camera take-photo-icon"  id="icon_camera_id_car_3"></i><br>
               <span class="font-24"><?=t_take_picture_inside_car;?></span>
               <div style="padding:5px;">
                  <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
                     <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_id_car_3" style="width:0%;border-radius:5px;border:none">
                     </div>
                  </div>
               </div>
               <img
                  <? if($_GET[id]){ ?>
                  src="../data/fileupload/store/register/<?=$arr[web_driver_edit][code];?>_id_car_3.jpg" 
                  <? }  ?>
                  id="image_id_car_3" name="image_id_car_3"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />
            </div>
         </div>
         <div  id="send_form_data"></div>
         <input class="form-control" type="hidden" name="add_new_car_type" id="add_new_car_type"   onkeypress="PasswordEnter(this,event)"   value="<?=$_GET[type]?>" >
         <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true" onkeypress="PasswordEnter(this,event)"   value="" >
         <input class="form-control" type="hidden" name="drivername" id="drivername"   onkeypress="PasswordEnter(this,event)"   value="<?=$user_id?>" >
         <div class="<?= $coldata?>">
            <br>
            <table width="100%"  border="0" cellspacing="0" cellpadding="0" style="padding-top:0px;">
               <tr>
                  <td width="50%"  class="pad-l-5"><button type="reset" id="reset_form_addcar" class="btn btn-block btn-default"  style="width:width:100%;padding:10px;">
                     <?=t_reset;?></button>
                  </td>
                  <td width="50%" class="pad-r-5"><button id="submit_step_3" type="button" class="btn btn-block btn-primary" style="width:100%;padding:10px;background-color:#3b5998; ">
                     <?=t_save_data;?></button>
                  </td>
               </tr>
            </table>
            <br>
         </div>
      </div>
      <? if($_GET[id]){ 
         $action='edit';
         } else {
         			$action='add';
         }
         ?> 
      <script>
                              function filterProvince(){
	                              var input = $('.filter_province').last().val();
	                              var filter = input.toUpperCase();
	                               $('.list-container').find('li').each (function() {
	                              var text_a = $(this).text().toUpperCase();
	                              console.log(text_a+" "+filter);
	                              if (text_a.indexOf(filter) > -1) {
	                              $(this).show();
	                              } else {
	                              $(this).hide();
	                              }
	                              });  
                              }
                              
                              function filterBrand(){
	                           var input = $('.filter_brand').last().val();
	                           var filter = input.toUpperCase();
	                           $('.list-container').find('li').each (function() {
	                           var text_a = $(this).text().toUpperCase();
	                           console.log(text_a+" "+filter);
	                           if (text_a.indexOf(filter) > -1) {
	                           $(this).show();
	                           } else {
	                           $(this).hide();
	                           }
	                           });  
                           	}
                           </script>   
                     
      <script>
         /// check login 
         $('#reset_form_addcar').click(function(){
          $(this).closest('form').find("input[type=text], textarea").val("");
         });

         $("#submit_step_3").click(function(){ 
         console.log($('#myform_data').serialize());
         return;
         if(document.getElementById('car_brand').value=="") {
//         alert('กรุณาเลือกยี่ห้อรถ'); 
		 swal('<?=t_select_car_brand;?>');
         document.getElementById('car_brand').focus() ; 
         return false ;
         }
         if(document.getElementById('plate_num').value=="") {
//         alert('<?=t_please_enter_car_registration_number;?>'); 
		swal('<?=t_please_enter_car_registration_number;?>');
         document.getElementById('plate_num').focus() ; 
         return false ;
         }
         if(document.getElementById('check_photo_id_car_1').value=="") {
//         alert('กรุณาถ่ายภาพด้านหน้ารถ'); 
		swal('<?=t_please_take_pictures_front_car;?>');
         document.getElementById('check_photo_id_car_1').focus() ; 
         return false ;
         }
         if(document.getElementById('check_photo_id_car_2').value=="") {
//         alert('กรุณาถ่ายภาพด้านข้างรถ'); 
         swal('<?=t_please_take_pictures_car_side;?>');
         document.getElementById('check_photo_id_car_2').focus() ; 
         return false ;
         }
         if(document.getElementById('check_photo_id_car_3').value=="") {
//         alert('กรุณาถ่ายภาพข้างในรถ'); 
         swal('<?=t_please_take_picture_inside_car;?>');
         document.getElementById('check_photo_id_car_3').focus() ; 
         return false ;
         }
            swal({
         	title: "<font style='font-size:28px'><b> <?=t_are_you_sure;?>",
   			text: "<font style='font-size:22px'><?=t_correct_information;?>",
         	type: "warning",
         	showCancelButton: true,
         	confirmButtonColor: '<?=$main_color?>',
         	confirmButtonText: '<?=t_yes;?>',
   			cancelButtonText: "<?=t_no;?>",
         	closeOnConfirm: false,
         	closeOnCancel: true,
         	html: true
         },
         function(isConfirm){
            if (isConfirm){
		          var url="go.php?name=car&file=savedata&type=add&action=add&id=<?=$_GET[id]?>&type=<?=$_GET[type]?>";
		         //	url=url+"&iddriver_finish="+document.getElementById('iddriver_finish').value;
		         $.post(url,$('#myform_data').serialize(),function(response){
		         	console.log('save');
		         	swal("<?=t_save_succeed;?>", "<?=t_press_button_close;?>", "success");
		         	setTimeout(function(){ 
		         		$('.button-close-popup-mod-1').click();
		         		autoclickAllcar();
		         	 }, 700);
		          });
            } 
         });
         });
      </script>  
      <div style="display:none">
         <?  include ("mod/car/photo/upload_car_pic.php");?>
      </div>
      <br>
      <?
         $rand = substr(str_shuffle('123456789012345678901234567890'),0,30);
         ?>
      <input class="form-control" type="hidden" name="check_photo_id_car_1" id="check_photo_id_car_1"   onkeypress="PasswordEnter(this,event)"   value="<?=$check_photo?>" >
      <input class="form-control" type="hidden" name="check_photo_id_car_2" id="check_photo_id_car_2"   onkeypress="PasswordEnter(this,event)"   value="<?=$check_photo?>" >
      <input class="form-control" type="hidden" name="check_photo_id_car_3" id="check_photo_id_car_3"   onkeypress="PasswordEnter(this,event)"   value="<?=$check_photo?>" >
      <input class="form-control" type="hidden" name="check_code" id="check_code"   onkeypress="PasswordEnter(this,event)"   value="<?=$rand ?>" >
      <script>
         /////////  idcard
          $("#icon_camera_id_card").click(function(){  
           document.getElementById('upload_pic_type').value='id_card';
           $("#load_chat_camera").click(); 
           });
           /////////  id driving
          $("#icon_camera_id_driving").click(function(){  
           document.getElementById('upload_pic_type').value='id_driving';
           $("#load_chat_camera").click(); 
           });
             /////////  id driving
          $("#icon_camera_id_car").click(function(){  
           document.getElementById('upload_pic_type').value='id_car'; 
           $("#load_chat_camera").click(); 
           });
               /////////  id driving
          $("#icon_camera_id_insure").click(function(){  
           document.getElementById('upload_pic_type').value='id_insure';
           $("#load_chat_camera").click(); 
           });
           /////////  id driving
          $("#icon_camera_id_driver").click(function(){  
           document.getElementById('upload_pic_type').value='id_driver';
           $("#load_chat_camera").click(); 
           });
                 /////////  id driving
          $("#icon_camera_id_car_1").click(function(){  
           document.getElementById('upload_pic_type').value='id_car_1';
           $("#load_chat_camera").click(); 
           });
                   /////////  id driving
          $("#icon_camera_id_car_2").click(function(){  
           document.getElementById('upload_pic_type').value='id_car_2';
           $("#load_chat_camera").click(); 
           });
                     /////////  id driving
          $("#icon_camera_id_car_3").click(function(){  
           document.getElementById('upload_pic_type').value='id_car_3';
           $("#load_chat_camera").click(); 
           });
      </script>
   </form>
</div>
