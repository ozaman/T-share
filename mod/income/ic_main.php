<!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" />
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>-->
<script>
	
</script>
<script>
   $(".text-topic-action-mod").html('<?=t_income;?>');
  
</script>

<style>
@media screen and (max-width: 320px) {
   .font-22{
   		font-size : 14px;
   		font-family: 'Arial', sans-serif;
   }
   .line-center{
/*   		height: 59px;*/
   		height: 50px;
   }
   #date_transfer_work{
   		height: 35px !important;
   		font-size: 20px !important;
   }
   .icon_calendar{
   		font-size: 20px !important;
   }
}
.btn_filter_active{
	padding: 8px; 
	border: 1px solid #3b5998;
	border-radius: 25px;
/*	width: 100px;*/
	background-color: #3b5998;
	color: #fff;
	box-shadow: 1px 1px 1px #333;
	cursor: pointer;
}
.btn_filter{
	padding: 8px; 
	border: 1px solid #3b5998; 
	border-radius: 25px;
/*	width: 100px;*/
	cursor: pointer;
}
   @media screen and (max-width: 320px) {
   .font-22{
   font-size : 14px !important;
   font-family: 'Arial', sans-serif;
   }
   .font-24{
   font-size : 16px !important;
   font-family: 'Arial', sans-serif;
   }
   .font-26{
   font-size : 18px !important;
   font-family: 'Arial', sans-serif;
   }
   .font-28{
   font-size : 20px !important;
   font-family: 'Arial', sans-serif;
   }
   #date_report{
   font-size : 20px !important ; 
   height: 35px !important;
   }
   #icon_calendar{
   font-size : 20px !important ; 
   }
   /*.form-group{
   margin-bottom: 0px !important;
   }*/
   }

   .payment-menu{
   border-radius: 50%; background-color:#59AA47; display: block;  
   padding: 12px; 
   width: 50px;
   height: 50px; 
   color:#FFFFFF;  font-size:10px;  
   border: solid 2px #FFFFFF;
   text-align: center;
   vertical-align: middle;  box-shadow: 0px  0px 10px #DADADA  ; margin-left: -5px;  
   }
   .div-all-price{
   /* padding:3px;   
   border-radius: 8px; 
   border:  1px solid #ddd;*/
   background-color:#FFFFFF;  
   /*margin-bottom: 10px; */
   margin-top:0px; 
   /*	 box-shadow: 0px  0px 0px #DADADA  ;*/
   }
   .div-all-zello{
   padding:5px;
   border-radius: 0px;
   border: 1px solid #ddd;
   background-color:#FFF;
   margin-bottom: 5px;
   box-shadow: 0px 0px 0px #DADADA ;
   }
   .list-container{
   font-size: 16px;
   padding: 5px 0px;
   transform: 0.3s;
/*   padding: 0px;*/
   }
   .w3-ul li{
   padding: 0px 5px;
   border-bottom: 1px solid #ddd;
   }
   .ico-pos{
   position: absolute;
   right: 0px;
   margin: 20px 10px;
   }
   .cancel-work-shop{
   box-shadow: 1px 2px 2px #35353575;
   width: 90px;
   border: 1px solid #a9a9a9;
   background: #FF5722;
   color: #fff;
   position: absolute;
   top: 50px;
   right: 15px;
   /*     margin: 50px 15px;*/
   text-align: center;
   border-radius: 10px;
   }
   .div-all-checkin{
   padding:5px;
   border-radius: 15px;
   border: 1px solid #ddd;
   background-color:#F6F6F6;
   margin-bottom: 5px;
   margin-top:5px;
   box-shadow: 0px 0px 10px #DADADA ;
   }
   .disabledbutton-checkin {
   pointer-events: none;
   background-color:#FFF;
   color:#FFF;
   border: 1px solid #88B34D;
   }
   .step-booking-small {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 5px;
   width: 40px;
   height: 40px;
   text-align: justify;
   color:#FFFFFF;
   font-size:20px;
   font-weight:bold;
   margin-top:-10px;
   text-align:center;
   border: solid 4px #FFFFFF;
   background: #f39c12 !important;
   color: #fff;
   }
   .step-booking-small-no {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 5px;
   width: 40px;
   height: 40px;
   text-align: justify;
   color:#FFFFFF;
   font-size:20px;
   font-weight:bold;
   margin-top:-10px;
   text-align:center;
   border: solid 4px #FFFFFF;
   background: #999999 !important;
   color: #fff;
   }
   .step-booking {
   border-radius: 50%;
   background-color: #FF9933;
   padding: 10px;
   width: 60px;
   height: 60px;
   text-align: justify;
   color:#FFFFFF;
   font-size:30px;
   font-weight:bold;
   text-align:center;
   margin-left:-5px;
   border: solid 3px #F6F6F6;
   box-shadow: 0 0 10px 3px #E8E6E6;
   background: #FF0000 !important;
   color: #fff;
   }
   .step-booking-active {
   border-radius: 50%;
   padding: 10px;
   width: 60px;
   height: 60px;
   text-align: justify;
   color:#FFFFFF;
   font-size:30px;
   font-weight:bold;
   text-align:center;
   margin-left:-5px;
   border: solid 3px #F6F6F6;
   box-shadow: 0 0 10px 3px #E8E6E6;
   background: #59AA47 !important;
   color: #fff;
   }

.box_his,.box_book{
	padding: 5px 0px;
    border: 1px solid #3b5998;
    margin-bottom: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12), 0 3px 1px -2px rgba(0,0,0,.2);
}
.mof{
  width: 100%;	
  position: relative;
  border: none;
  outline:none;
  cursor: pointer;
  background: #FFFFFF;
  color: #333;
  padding: 13px;
  border-radius: 2px;
  font-size: 22px;
  
}


.fab{
  border-radius: 50%;
  margin:0;
  padding: 20px;
}

.material{
  position:relative;
  color:white;
  margin: 20px auto;
  height:400px;
  width:500px;
  background:#f45673;
  
}

.ripple{
  overflow:hidden;
}

.ripple-effect{
  position: absolute;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  background: white;

    
  animation: ripple-animation 2s;
}


@keyframes ripple-animation {
    from {
      transform: scale(1);
      opacity: 0.4;
    }
    to {
      transform: scale(100);
      opacity: 0;
    }
}
.text-white{
	color: #ffffff;
}
   </style>

<div class="box " style="margin-top:50px;border-top: 0px;" id="main_component" >
	<input type="hidden" id="driver_id" value="<?=$_SESSION['data_user_id'];?>" />
   <div style="padding:0px 0px; margin: auto;margin-bottom: 5px">
		<table width="100%">
			<tbody>
			<tr>
				<td width="50%">
				<div id="btn_ic_shop" class="btn_filter_active tocheck" align="center" onclick="FilterType('ic_shop');" ><span class="font-22"><?=t_send_to_customer;?></span></div>
				</td>
				<td width="50%">
				<div id="btn_ic_transfer" class="btn_filter tocheck" align="center" onclick="FilterType('ic_transfer');" ><span class="font-22"><?=t_job_received;?></span></div>
				</td>
			
			</tr>
		</tbody>
		</table>
	</div>   
	<table width="100%">
		<tr>
				<td width="70" align="center">
					<span class="font-22"><?=t_month;?></span>
				</td>
				<td>	
					<select class="form-control font-22" style="height: 35px;border-radius: 25px;" id="month_select">
		       	<?php 
		       	$month = str_pad(date('m'), 2, '0', STR_PAD_LEFT);
		       	for($i=1;$i<=12;$i++){ 
		       		if($i==$month){
						$selected = "selected";
					}else{
						$selected = "";
					}
		       	?>
		       		<option value="<?=str_pad($i, 2, '0', STR_PAD_LEFT);?>" <?=$selected;?> ><?=str_pad($i, 2, '0', STR_PAD_LEFT);?></option>
		       	<? } ?>
		       	</select>
		       	
       			</td>
       			<td width="70" align="center">
					<span class="font-22"><?=t_year;?></span>
				</td>
				<td>	
					<select class="form-control font-22" style="height: 35px;border-radius: 25px;" id="year_select">
		       	<?php 
		       	$date = date('Y');
		       	for($i=$date-1;$i<=$date+1;$i++){ 
		       		if($i==$date){
						$selected = "selected";
					}else{
						$selected = "";
					}
		       	?>
		       		<option value="<?=$i;?>" <?=$selected;?> ><?=str_pad($i, 2, '0', STR_PAD_LEFT);?></option>
		       	<? } ?>
		       	</select>
       			</td>
			</tr>
	</table>
   <div id="load_income_data"  style="padding:0px; margin:0;" align="center">
     
   </div>
</div>


<script>
FilterType('ic_shop');

   $('#month_select').change(function(){
   		$('.btn_filter_active').click();
//   		FilterType(type)
   });
   	
   function FilterType(type){
//	console.log(type);
	$('.tocheck').removeClass('btn_filter_active');
	$('.tocheck').addClass('btn_filter');
	$('#btn_'+type).removeClass('btn_filter');
	$('#btn_'+type).addClass('btn_filter_active');
	var month = $('#month_select').val();
	if(type=="ic_shop"){
		
		var url = "empty_style.php?name=income&file=ic_shop&month="+month;
		console.log(url);
		$.post(url,function(data){
	   		$('#load_income_data').html(data);
	   		
	   	});
		
	}
	else if(type=="ic_transfer"){
			$('#load_income_data').html('');
			var month = $('#month_select').val();
			var url = "mod/income/curl_connect_api.php?type=deposit_driver";
			var driver = $('#driver_id').val();
			console.log(month+" "+driver);
			$.post(url,{ driver : driver, month : month },function(data){
				console.log(data);
			});
	}
	
}

   function viewIncomeDetail(date){
   		if(date==''){
			swal('ไม่มีรายละเอียด','','error');
		}else{
			$('#material_dialog').show();
			$('#dialoglLabel').text('รายละเอียดรายได้');
			var url = "empty_style.php?name=income&file=ic_detail";
			$.post(url,{ date : date },function(data){
				$('#load_modal_body').html(data);
			});
		}
		
   }
   
   function ViewPhoto(id,type,date){
		var url = 'load_page_photo.php?name=booking/load/form&file=iframe_photo&id='+id+'&type='+type+'&date='+date;
		console.log(url);
		$( "#load_mod_popup_photo" ).toggle();
		$('#load_mod_popup_photo').html(load_main_mod);
 	 	$('#load_mod_popup_photo').load(url); 
	}	
</script>