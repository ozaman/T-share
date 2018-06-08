<?  include ("mod/booking/shop_history/load/checkin/photo/upload_checkin_pic.php");

   $arr[project][id]=$_GET[id];
    if($_GET[type]=='driver_topoint'){		
      $type= t_place_of_delivery;		
      $icon = 'icon-new-uniF12D-1';
      $action = 'check_driver_topoint';
      $txt_photo = t_please_take_photo_drop_place;
    }
    else if($_GET[type]=='guest_receive'){		
      $type= t_reception;
      $icon = 'icon-new-uniF159-5';	
      $action = 'check_guest_receive';
      $txt_photo = t_please_take_recep_photo;
    } 
    else if($_GET[type]=='guest_register'){		
      $type= t_guest_registration;	
      $icon = 'icon-new-uniF116-6';	
      $action = 'check_guest_register';
      $txt_photo = t_please_take_guest_regis;
    } 
    else if($_GET[type]=='driver_pay_report'){		
     $type= t_income_statement;		
     $icon = 'icon-new-uniF121-10';
     $action = 'check_driver_pay_report';
     $txt_photo = t_take_photo_income_slip;
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
                        <button  id="btn_checkin_popup_<?=$_GET[id]?>"  type="button" class="btn  btn-info "  style="width:100%;text-align:left;padding:5px; background-color:#3b5998;  border-radius: 20px; border:none ">
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
   $(".text-topic-action-mod-3").html('<?=$type?>');

   $('#btn_close_checkin_popup').click(function(){   
   		$( "#dialog_custom" ).toggle();
   		$( "#body_dialog_custom_load" ).html('');
   	});

   ///
   $('#btn_checkin_popup_<?=$_GET[id]?>').click(function(){   
   /*var message = "";
 socket.emit('sendchat', message);
   console.log('Test Click');*/
   /* $.post('send_messages/send_checkin.php?type=<?=$_GET[type]?>&id=<?=$arr[project][id]?>',function(data){
   					console.log(data);
   				});
  return;*/


    var lat = $('#lat').val();
    var lng = $('#lng').val();
    var url = "mod/booking/shop_history/php_shop.php?action=<?=$action;?>&type=<?=$_GET[type]?>&id=<?=$arr[project][id]?>&lat="+lat+"&lng="+lng;
    console.log(url);
		$.post(url,function(res){
			console.log(res);
			if(res.result==true){
				 changeHtml("<?=$_GET[type]?>","<?=$arr[project][id]?>","<?=time();?>")
				 console.log(array_data);
   				 $('#json_shop').val(JSON.stringify(array_data));
				var message = "";
				socket.emit('sendchat', message);
				$( "#close_dialog_custom" ).click();
				
		      	 $.post('send_messages/send_checkin.php?type=<?=$_GET[type]?>&id=<?=$arr[project][id]?>',function(data){
   					console.log(data);
   				});
		      	
		      	
		      	
			}else{
				swal("Error");
			}
		});
    });
    	
    function afterAction(res){
		var url_status = "popup.php?name=booking/load/form&file=checkin_status&id=<? echo $arr[project][id];?>&type=check_<?=$_GET[type]?>&time=<?=TIMESTAMP?>&status=1";
	$('#status_<?=$_GET[type]?>').html('<b><i class="fa  fa-refresh fa-spin 2x" style="color:#000000"></i> โหลดข้อมูล');
	$('#status_<?=$_GET[type]?>').load(url_status); 
	$('#iconchk_<?=$_GET[type]?>').attr("src", "images/yes.png");  
	$("#number_<?=$_GET[type]?>").removeClass('step-booking');
	$("#number_<?=$_GET[type]?>").addClass('step-booking-active');
	$("#box_<?=$_GET[type]?>").addClass('disabledbutton-checkin');
	$("#btn_<?=$_GET[type]?>").css('background-color','#666666');
	$("#btn_"+res.next_step).css('background-color','#3b5998');
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
	if(res.next_step=="finish"){
		$('.btn_filter_active').click();
		return;
	}
	$("#step_"+res.next_step+"").show();
//	$("#step_"+res.next_step+"").load('empty_style.php?name=booking/shop_history/load/checkin&file='+res.next_step);
	
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