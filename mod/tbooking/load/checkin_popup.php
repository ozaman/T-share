<?  include ("mod/tbooking/load/checkin/photo/upload_checkin_pic.php");

   $arr[project][id]=$_GET[id];
    if($_GET[type]=='driver_topoint'){		
      $type= t_place_of_delivery;		
      $icon = 'icon-new-uniF12D-1';
      $txt_photo = t_please_take_photo_drop_place;
      $next_step = "driver_pickup";
    }
    else if($_GET[type]=='driver_pickup'){		
      $type = t_check_customer_name;
      $icon = 'icon-new-uniF159-5';	
      $txt_photo = t_take_pic_guest;
       $next_step = "driver_complete";
    } 
    else if($_GET[type]=='driver_complete'){		
      $type= t_check_vehicle;	
      $icon = 'icon-new-uniF116-6';	
      $txt_photo = t_please_take_photo_drop_place;
      $next_step = "driver_checkcar";
    } 
    else if($_GET[type]=='driver_checkcar'){		
     $type= t_check_luggage;		
     $icon = 'icon-new-uniF121-10';
     $txt_photo = t_take_picture_inside_car;
     $last_step = 'driver_checkcar';
    }
    
   	?>

<table width="300" border="0" align="center" cellpadding="3" cellspacing="5" style="margin-top: -15px;" >
   <tbody>
      <tr>
         <td align="center" class="font-30"><i class="<?=$icon;?>" style=" font-size:80px; color: #3b5998;"  ></i></td>
      </tr>
      <tr>
         <td align="center" class="font-30"><b><?=t_are_you_sure;?></b></td>
      </tr>
      <tr>
         <td align="center" class="font-26"><?=$type?></td>
      </tr>
      <tr>
         <td align="center" class="font-26">
            <div class="<?= $coldata?>">
               <div style="background-color: #f3f3f3;padding: 10px 5px;border: 1px solid #ddd;" ><!--take_photo-->
                  <center>
                 
                  <div style="padding: 5px 10px;"><?=$txt_photo;?></div>
                  <table width="100%" border="0" cellspacing="2" cellpadding="2" >
                     <tbody>
                        <tr>
                           
                           <td width="100">
                              <label class="input-group-btn" >
                                 <button class="btn btn-primary" style="width:100px; z-index:0;padding: 6px;" id="icon_camera_checkin">
                                 	<span class="font-22">
                                    <i class="fa  fa-camera"></i>&nbsp;<?echo t_take_photos?>
                                    </span>
                                    <!--<input type="text" class="form-control" name="icon_camera_<?=$i?>" id="icon_camera_<?=$i?>"   style="display: none;"/>-->
                                 </button>
                              </label>
                           </td>
                           <td><span class="input-group" style="margin-top:5px;">
                              <input type="text"  value="<?echo t_no_photo_available?>" class="photo-no-active" readonly  style="padding-left:5px; margin-top:-5px; padding-right:0px; width:100%; height:35px;" id="url_photo">
                              </span>
                           </td>
                           <td width="30">        
                              <button type="button" class="btn btn-default " data-toggle="modal" style="padding-left:5px; padding-right:5px; width:30px" id="del_photo"><i class="fa  fa-trash" style="font-size:20px; "></i></button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                  <div style="padding:5px;">
                     <div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
                        <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
                           aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_<?=$_GET[type]?>" style="width:0%;border-radius:5px;border:none">
                        </div>
                     </div>
                  </div>
                  <img id="image_<?=$_GET[type]?>" name="image_<?=$_GET[type]?>"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />
                  </center>
               </div>
            </div>
         </td>
      </tr>
      <tr>
         <td align="center">
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
               <tbody>
                  <tr>
                     <td width="50%">
                        <button  id="btn_close_checkin_popup"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#9E9E9E;  border-radius: 20px; border:none;">
                           <span class="font-26">
                           <center>
                           <? echo t_no; ?>
                           </center>
                           </span>
                        </button>
                     </td>
                     <td width="50%">
                        <button  id="btn_checkin_popup"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none ">
                           <span class="font-26">
                           <center>
                           <? echo t_yes; ?>
                           </center>
                           </span>
                        </button>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr>
         <td align="center">&nbsp;</td>
      </tr>
   </tbody>
</table>
<input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"  required="true" onkeypress="PasswordEnter(this,event)"   value="" />
<script>
  
   $('#btn_close_checkin_popup').click(function(){   
   		$( "#dialog_custom" ).toggle();
   		$( "#body_dialog_custom_load" ).html('');
   	});

   ///
   $('#btn_checkin_popup').click(function(){   
    
    var lat = $('#lat').val();
    var lng = $('#lng').val();
    var idorder = '<?=$_GET[id];?>';
    var url = "mod/tbooking/curl_connect_api.php?type=checkin_approve&step=<?=$_GET[type];?>&oi="+idorder;
    console.log(url);
		$.post(url,{ idorder:idorder,lat:lat, lng:lng  },function(res){
			
			if(res.status=="ok"){
				if(res.data.status=="200"){
					$( "#close_dialog_custom" ).click();
					afterAction();
				}else{
					swal("Error");
				}
			}
			$('#btn_manage').click();
			callApiLog();
		});
    });
    	
    function afterAction(){
    	if('<?=$_GET[type];?>'=='driver_pickup'){
			$("#btn_pickup_not_tr").hide();
		}
		var url_status = "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $arr[project][id];?>&type=check_<?=$_GET[type]?>&time=<?=TIMESTAMP?>&status=1";
	$('#status_<?=$_GET[type]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
	$('#status_<?=$_GET[type]?>').load(url_status); 
	$('#iconchk_<?=$_GET[type]?>').attr("src", "images/yes.png");  
	$("#number_<?=$_GET[type]?>").removeClass('step-booking');
	$("#number_<?=$_GET[type]?>").addClass('step-booking-active');
	$("#box_<?=$_GET[type]?>").addClass('disabledbutton-checkin');
	$("#btn_<?=$_GET[type]?>").css('background-color','#666666');
	$("#btn_<?=$next_step;?>").css('background-color','#3b5998');
		$.ajax({
		url: '../data/fileupload/store/<?=$_GET[type]?>_<?=$arr[project][id]?>.jpg',
		type:'HEAD',
		error: function()
		{
		console.log('Error file');
		},
		success: function()
		{
			//file exists
			console.log('success file');
			$('#photo_<?=$_GET[type]?>').css('color','#3b5998');
			$('#photo_<?=$_GET[type]?>').css('border','2px solid #3b5998');
			$('#photo_<?=$_GET[type]?>').attr('onclick','ViewPhoto("<?=$arr[project][id]?>","<?=$_GET[type]?>","<?=TIMESTAMP;?>");');
		}
		});
	$('#<?=$_GET[type]?>_check_click').val(1);
	$("#box_<?=$_GET[type]?>").removeClass('border-alert');
	console.log('++++++++++++');
	if("<?=$last_step;?>"=="driver_checkcar"){
		var driver = $('#driver').val();
		callApiManage();
		callApiLog();
		
		return;
	}
	$("#step_<?=$next_step;?>").show();
	
	}	
</script>
<script>
   /////////  id driving
   $("#icon_camera_checkin").click(function(){  
   document.getElementById('upload_pic_type').value='<?=$_GET[type]?>';
   $("#load_chat_camera").click(); 
   });
   
   $('#del_photo').click(function(){
   	$.post( "go.php?name=booking/load/form/checkin/photo&file=upload_pic&action=del&code=<?=$_GET[id]?>&type=<?=$_GET[type]?>", function( data ) {
    		$('#image_<?=$_GET[type]?>').attr('src','');
    		$('#image_<?=$_GET[type]?>').hide();
    		$('#area_image_album_load_driver_topoint').css('width','0%');
    		$('#icon_camera_checkin').removeClass('btn-success');
    		$('#icon_camera_checkin').addClass('btn-primary');
    		$('#del_photo').removeClass('btn-danger');
    		$('#del_photo').addClass('btn-default');
    		$('#url_photo').val('<?echo t_no_photo_available?>');
    		$('#photo_<?=$_GET[type]?>').css('color','#3b59987a');
   	$('#photo_<?=$_GET[type]?>').css('border','1px solid #3b59987a');
   });
   });
</script>