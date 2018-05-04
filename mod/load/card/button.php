<!--<button class="fileUpload btn btn-info" id="upfile_pidcard" data-target="#showmap<?=$_GET[type] ?>" style="padding-left:5px; padding-right:5px;width:70% " >
    <span>อัพไฟล์</span>
    <input type="file" class="upload" id="imageUpload" />
</button>-->

 <input type="file" id="imageUpload_<?=$_GET[type] ?>" class="fileInput" />
 <button type="button" class="btn " onclick="onpenUpfile('<?=$_GET[type] ?>');" style="padding-left:5px; padding-right:5px;width:100%;border:1px solid #ddd;box-shadow:1px 1px 1px #ddd;background-color:#3b5998;color:#ffffff; "  ><?=t_upload_file;?></button>
 
  <? 
if($_GET[type]=='idcard'){
	$path = 'id_card';
}else if($_GET[type]=='iddriving'){
	$path = 'id_driving';
}
 $pic_qr = file_exists("../data/pic/driver/".$path."/".$_GET[userid]."_".$_GET[type].".jpg"); 
//echo $pic_qr." ++";
  ?>
 

<script>
$( document ).ready(function() {
   var check_file = '<?=$pic_qr;?>';
   var time = '<?=time();?>';
   var type = '<?=$_GET[type]; ?>';
   var userid = '<?=$_GET[userid]; ?>';
   var path;
   if(type=='idcard'){
   	path = 'id_card';
   }else if(type=='iddriving'){
   	path = 'id_driving';
   }

	if(check_file==1){
		$('.'+type+'_showimg').attr('src', '../data/pic/driver/'+path+'/'+userid+'_'+type+'.jpg?v='+time);
		$('.'+type+'_showimg').show();
	}

});

/*function viewImg(type,userid,path){
	
//	alert(userid);
	$('.'+type+'_showimg').attr('src', '../data/pic/driver/'+path+'/'+userid+'_'+type);
	$('.'+type+'_showimg').show();
	
}*/

$('#bt_showqr<?=$_GET[type] ?>').on('click', function() {
		 
			$('.imagepreview').attr('src', "../../admin/file/driver/card/<?=$_GET[type] ?>_<?=$_GET[userid] ?>.png");
 
			$('#imagemodal<?=$_GET[type] ?>').modal('show');   
			
  
			 
});

$('#imageUpload_idcard').change(function(){			
			readImgUrlAndPreview(this);
			function readImgUrlAndPreview(input){
				 if (input.files && input.files[0]) {
			            var reader = new FileReader();
			            reader.onload = function (e) {			            	
			                $('#imagePreview').attr('src', e.target.result);
							}
			          };
			          reader.readAsDataURL(input.files[0]);
			     }	
			     $('#imagePreview').show();
			     
		});
	
$('#imageUpload_iddriving').change(function(){			
			readImgUrlAndPreview(this);
			function readImgUrlAndPreview(input){
				 if (input.files && input.files[0]) {
			            var reader = new FileReader();
			            reader.onload = function (e) {			            	
			                $('#imagePreview2').attr('src', e.target.result);
							}
			          };
			          reader.readAsDataURL(input.files[0]);
			     }	
			     $('#imagePreview2').show();
			     
		});
			
	function onpenUpfile(type){
//		 alert('<?=$pic_qr;?>');
			$('#imageUpload_'+type).click();
		
	}	
		
	
	</script> 
	
<style>
/*		.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}*/
.fileInput {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
	</style>

	         <!-- Modal content-->
 
<div class="modal fade" id="imagemodal<?=$_GET[type] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: auto;" >
  <div class="modal-dialog" data-dismiss="modal"   style=" max-width:450px;">
  
    <div class="modal-content"  >              
      <div class="modal-body">
	                      <h4 class="modal-title" style="font-size:26px; height:15px;   font-family:Arial, Helvetica, sans-serif; text-transform:uppercase"><center><b><?=$_GET[title] ?></b></center></h4>
	  
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <center> <img src="" class="imagepreview" style="width:100%;" ></center>
		   
      </div> 
 
       </div>
  </div>
</div>
