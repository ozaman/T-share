  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#showmap<?=$_GET[type] ?>" style="padding-left:5px; padding-right:5px;width:70% "  >อัพไฟล์</button>
 
  <? 
 $pic_qr= file_exists("../../admin/file/driver/card/".$_GET[type]."_".$_GET[userid].".png");  ?>
  
  <? if($pic_qr==1){ ?>
 
    <button type="button" class="btn btn-success" data-toggle="modal" id="bt_showqr<?=$_GET[type] ?>"  data-target="#imagemodal<?=$_GET[type] ?>"   style="padding-left:5px; padding-right:5px; width:25%" >ดู</button>
	<? } ?>
 
   <? if($pic_qr<>1){ ?> 
    <button type="button" class="btn btn-default" data-toggle="modal" id="bt_showqr<?=$_GET[type] ?>"  disabled style="padding-left:5px; padding-right:5px; width:25%">ดู</button>
	<? } ?>
 
	<script>
 
		$('#bt_showqr<?=$_GET[type] ?>').on('click', function() {
		 
			$('.imagepreview').attr('src', "../../admin/file/driver/card/<?=$_GET[type] ?>_<?=$_GET[userid] ?>.png");
 
			$('#imagemodal<?=$_GET[type] ?>').modal('show');   
			
  
			 
});
	</script> 
	
	
	
	
	
	
	
	
	
	
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
 