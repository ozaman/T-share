<link rel="shortcut icon" href="assets/img/favicon.png" />
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
<? 
	$path = ''; 
	$get_lng           = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
$get_lng           = $get_lng[0];
$check_lng_browser = explode('-', $get_lng);
$check_lng_browser = $check_lng_browser[0];
if ($check_lng_browser == 'ch' or $check_lng_browser == 'zh' or $check_lng_browser == 'sh') {
    $keep = 'cn';
} else if ($check_lng_browser == 'th') {
    $keep = 'th';
} else {
    $keep = 'en';
}
switch ($_COOKIE['lng']) {
    case "th":
        //echo "PAGE th";
        include("../../../includes/lang/th/t_share_2.php"); //include check session DE
        $province           = "name_th";
        $place_shopping     = "topic_th";
        $google_map_api_lng = "th";
        break;
    case "cn":
        //echo "PAGE cn";
        include("../../../includes/lang/cn/t_share_2.php");
        $province           = "name_cn";
        $place_shopping     = "topic_cn";
        $google_map_api_lng = 'zh-CN';
        break;
    case "en":
        //echo "PAGE EN";
        include("../../../includes/lang/en/t_share_2.php");
        $google_map_api_lng = "en";
        $place_shopping     = "topic_en";
        $province           = "name";
        break;
    default:
        //echo "PAGE EN - Setting Default";
        include("../../../includes/lang/" . $keep . "/t_share_2.php"); //include EN in all other cases of different lang detection
        //        $google_map_api_lng = $keep;
        if($keep=="en"){
			$province           = "name";
		}else{
			$province           = "name_" . $keep;
		}
        
        $place_shopping     = "topic_" . $keep;
        $google_map_api_lng = $keep;
        break;
}

?> 
<style>
	@media screen and (max-width: 380px) {
	   .margin-m{
	   		margin-top: 1px !important;
	   }
	}
	.margin-m{
	   		margin-top: 30px  !important;;
	   }
	.mt {
	margin-top: 10px !important;
	margin-bottom: 30px !important;
	}
  	
</style>
<style>
	 @media screen and (max-width: 320px) {
	   .font-18{
	   		font-size : 10px !important;
	   		font-family: 'Arial', sans-serif;
	   }
	   .font-20{
	   		font-size : 12px !important;
	   		font-family: 'Arial', sans-serif;
	   }
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
	   .font-30{
	   		font-size : 22px !important;
	   		font-family: 'Arial', sans-serif;
	   }
	   .font-32{
	   		font-size : 24px !important;
	   		font-family: 'Arial', sans-serif;
	   }
	   .font-34{
	   		font-size : 26px !important;
	   		font-family: 'Arial', sans-serif;
	   }
	  
	}
	.pic{
		max-width: 300px !important;
		max-height: 350 !important; 
	}
</style>
 <script src="../../../js/sweet/dist/sweetalert-dev.js?v=<?=time()?>"></script>
  <link rel="stylesheet" href="../../../js/sweet/dist/sweetalert.css?v=<?=time()?>" />
  
    <!-- Bootstrap core CSS -->
   <link href="<?=$path?>assets/css/bootstrap.css?v=<?=time()?>" rel="stylesheet"/>

    <!-- Custom styles for this template -->
    <link href="<?=$path?>assets/css/main.css?v=<?=time()?>" rel="stylesheet"/>
    <link href="<?=$path?>assets/css/croppic.css?v=<?=time()?>" rel="stylesheet"/>

		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-10627690-5', 'auto');
			ga('send', 'pageview');

	</script>
	
	



  <div class="back-full-popup"> 
    <table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40"   ><div class="button-close-popup-mod" ><?=$popup_icon_left_arow;?></div></td>
  <td   ><div style="font-size:22px; color:#FFFFFF " id="text_mod_topic_action" class="text-topic-action-mod"></div></td>
    <td width="50" align="right"   ><div style="font-size:22px; color:#FFFFFF " id="head_full_popup_icon"></div></td>
  </tr>
</table>
</div>
<?php  $pic_qr = file_exists("../../../../data/pic/driver/small/".$_GET[user].".jpg");  
 if($pic_qr==1){
 	$path_file = "../../../../data/pic/driver/small/".$_GET[user].".jpg?v=".time();
 }else{
 	$path_file = "../../../../data/pic/driver/small/default-avatar.jpg";
 }
 ?>  
 		<script src=" https://code.jquery.com/jquery-2.1.3.min.js?v=<?=time()?>"></script>
   
	<script src="<?=$path?>assets/js/bootstrap.min.js?v=<?=time()?>"></script>
	<script src="<?=$path?>assets/js/jquery.mousewheel.min.js?v=<?=time()?>"></script>
   	<script src="<?=$path?>croppic.min.js?v=<?=time()?>"></script>
    <script src="<?=$path?>assets/js/main.js?v=<?=time()?>"></script>
<script>
	var path_file = '<?=$path_file;?>';
</script>
	<div style="top:0px; padding:10px; overflow: hidden; width:100%; padding-bottom:0px;   ">  
	<div style="    padding-top: 0px;">
	<!--<div style="padding-left: 15px; padding-right: 15px;">
	<div class="centered" style="font-size: 24px;border: 1px solid #ddd;padding: 5px;box-shadow: 1px 1px 3px #ddd;"><strong>ภาพประจำตัว</strong> </div>
	</div>-->
		<div class="row mt " id="div_img">
			<div class="col-lg-4 ">
				
				
				<div id="cropContainerModal" style="height: 400px;" align="center"   >
					<img src="<?=$path_file;?>" id="my_pic" class="pic"  />
				</div>
				
			</div>
			
		
		</div>
		
		<div align="center">
		<img src="../../../images/loading.gif" id="img_img" style="display: none;" class="pic"/>
		</div>
		
		<div class="margin-m" >
	
		<button class="btn btn-bg" id="upload_img" style="width: 100%;margin-bottom: 15px;height: 40px;font-size: 22px;background-color: rgb(255, 255, 255);color: #3b5998;border: 1px solid #3b5998;border-radius: 25px;display: none;"><span class="font-26"><?=t_confirm;?></span></button>
		
		<button class="btn btn-bg" id="upload_close" style="    width: 100%;display: none;
    height: 40px;border-radius: 25px;
    font-size: 22px;background-color: #ffffff;margin-top:0px;color: #dd4b39;border: 1px solid #dd4b39;box-shadow: 1px 1px 2px #dd4b39;"><span class="font-26"><?=t_cancelled;?></span></button>
		</div>
		</div>
	</div>
	<div style="margin: 17px;margin-top:15px;">
	 <button class="btn btn-bg" id="upload_crop" style="  border-radius: 25px;  width: 90%;  height: 40px;  font-size: 22px;background-color: #dd4b39;color: #fff;display: none;position: fixed;z-index: 50000;margin-bottom:0px;bottom: 50px;"><span class="font-26">ตัดรูป</span></button>
	</div>

    	<script>

		$('#upload_img').click(function(){
			$('#div_img').hide();
			$('#img_img').show();
			
			var url = "../savedata_sub.php?type=upload_img&user=<?=$_GET[user];?>";
			
			 $.ajax({
					                url: url, // point to server-side PHP script 
					                dataType: 'text',  // what to expect back from the PHP script, if anything
					                cache: false,
					                contentType: false,
					                processData: false,
					                type: 'post',
					                success: function(result){
					                	console.log(result);
					                 	if(result==1){
											swal("อัพโหลดสำเร็จ!","","success");
										}else{
											swal("อัพโหลดล้มเหลว!","","error");
										}
										$('#upload_crop').hide();
										$('#div_img').show();
										$('#img_img').hide();
					                }
					     });
			
//			window.location.href = "test.php?user=<?=$_GET[user];?>";
		});
		$('#upload_close').click(function(){
			/*$('#div_img').hide();
			$('#img_img').show();*/
//			window.location.href = "../../../index.php";
			
//			$('.button-close-popup-photo').click();
			$('#load_mod_popup_photo').hide();
			$('#load_page_photo_touse').html('');
			console.log('click-close');
		});
	</script>
    <script>
    	var user = '<?=$_GET[user];?>';
		var croppicHeaderOptions = {
				//uploadUrl:'img_save_to_file.php',
				cropData:{
					"dummyData":1,
					"dummyData2":"asdas"
				},
				cropUrl:'<?=$path?>img_crop_to_file.php',
				customUploadButtonId:'cropContainerHeaderButton',
				modal:false,
				processInline:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}	
		var croppic = new Croppic('croppic', croppicHeaderOptions);
		
		
		var croppicContainerModalOptions = {
				uploadUrl:'<?=$path?>img_save_to_file.php?user='+user,
				cropUrl:'<?=$path?>img_crop_to_file.php?user='+user,
//				loadPicture:'<?=$path_file;?>',
				modal:true,
				imgEyecandyOpacity:0.4,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var cropContainerModal = new Croppic('cropContainerModal', croppicContainerModalOptions);
		
		
		var croppicContaineroutputOptions = {
				uploadUrl:'<?=$path?>img_save_to_file.php',
				cropUrl:'<?=$path?>img_crop_to_file.php', 
				outputUrlId:'cropOutput',
				modal:false,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		
		var cropContaineroutput = new Croppic('cropContaineroutput', croppicContaineroutputOptions);
		
		var croppicContainerEyecandyOptions = {
				uploadUrl:'<?=$path?>img_save_to_file.php',
				cropUrl:'<?=$path?>img_crop_to_file.php',
				imgEyecandy:false,				
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		
		var cropContainerEyecandy = new Croppic('cropContainerEyecandy', croppicContainerEyecandyOptions);
		
		var croppicContaineroutputMinimal = {
				uploadUrl:'<?=$path?>img_save_to_file.php',
				cropUrl:'<?=$path?>img_crop_to_file.php', 
				modal:false,
				doubleZoomControls:false,
			    rotateControls: false,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var cropContaineroutput = new Croppic('cropContainerMinimal', croppicContaineroutputMinimal);
		
		var croppicContainerPreloadOptions = {
				uploadUrl:'<?=$path?>img_save_to_file.php',
				cropUrl:'<?=$path?>img_crop_to_file.php',
				loadPicture:'<?=$path?>assets/img/night.jpg',
				enableMousescroll:true,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var cropContainerPreload = new Croppic('cropContainerPreload', croppicContainerPreloadOptions);
		
		
	</script>

<script>

	function showBtn(){


	}
	function cropBtn(){
			$('.btn').show();
			$('#upload_crop').hide();
	}
	function closeBtn(){
			$('#upload_close').show();
			$('#upload_img').hide();
			$('#upload_crop').hide();
			
//			$('#cropContainerModal').append( '<p>123</p>' );
	}
/*	$("input:file").change(function (){

			$('#my_pic').remove();
	      	$('.btn').hide();
		
      $('#upload_crop').show();

     });*/
  
     function hidePic(){
	 	/*$('#my_pic').remove();
      	$('.btn').hide();*/
	 }
	 
	 $('#upload_crop').click(function(){
	 	$('.cropControlCrop').click();
	 	$(this).hide();
	 });
</script>
