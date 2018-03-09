 
  <style>
   .div-all-photo{
	 padding:5px;   border-radius: 10px; border: 1px solid #ddd;background-color:#FFFFFF;     margin-bottom: 5px; box-shadow: 0px  0px 0px #DADADA  ;
	 
 }
 
 
 </style><div id="upload_photo_action"></div>
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" >
  <tbody>
    <tr>
      <td> 
 
 <? //=$_GET[checkin]?>
 <? //=$_GET[checkin]?>       
<?
 
 for($i=1;$i<4;$i++){ ?>
 <div class="div-all-photo">
        
 <table width="100%" border="0" cellspacing="2" cellpadding="2" >
  <tbody>
    <tr>
      <td width="10" class="font_20"><?=$i?>.</td>
      <td width="100">
        <label class="input-group-btn" > <span class="btn btn-primary" style="width:100px; z-index:0" id="btn_camera_<?=$i?>"> <i class="fa  fa-camera"></i>&nbsp;ถ่ายภาพ
          <input type="text" class="form-control" name="icon_camera_<?=$i?>" id="icon_camera_<?=$i?>"   style="display: none;"/>
        </span></label></td>
      <td><span class="input-group" style="margin-top:5px;">
        <input type="text"  value="ไม่มีภาพถ่าย" class="photo-no-active" readonly  style="padding-left:5px; margin-top:-5px; padding-right:0px; width:100%; height:35px;" id="url_photo_<?=$i?>">
      </span></td>
      <td width="30">        
      
      <button type="button" class="btn btn-default " data-toggle="modal"   style="padding-left:5px; padding-right:5px; width:30px" id="del_photo_<?=$i?>"><i class="fa  fa-trash" style="font-size:20px; "></i></button>
 
      
      </td>
    </tr>
  </tbody>
</table>

<div class="progress" style="width:100%;;border-radius:8px; height:20px; margin: 0; padding:0px; margin-left:-0px;border:none " id="area_album_load_<?=$i?>">
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="percent_load_pic_<?=$i?>" style="width:0%;border-radius:5px;border:none; color:#FFF; font-size:14px;">
      </div>
  </div>

 


<img  id="image_<?=$i?>" name="image_<?=$i?>"  style="width:100%; padding:5px; margin-top:0px;border-radius:15px; display:none " />     

    </div>            
           
           
           
<script>
 
    /////////  id driving
 $("#del_photo_<?=$i?>").click(function(){  
 
 
 if(document.getElementById('check_photo_<?=$i?>').value=='1'){
	 
	 
	 
var url_pic = "go.php?name=load/show/photo_upload&file=upload_pic&id=<?=$arr[project][id];?>&number=<?=$i?>&type=<?=$_GET[checkin]?>&action=del";
 
 
  
  $('#upload_photo_action').load(url_pic); 
	 
	 
	 
	 
 
  
  $("#image_<?=$i?>").hide(); 
    document.getElementById('url_photo_<?=$i?>').value='ไม่มีภาพถ่าย';
 
$("#del_photo_<?=$i?>").removeClass('btn-danger');
$("#del_photo_<?=$i?>").addClass('btn-default');



$("#btn_camera_<?=$i?>").removeClass('btn-success');
$("#btn_camera_<?=$i?>").addClass('btn-primary');



 $("#percent_load_pic_<?=$i?>").css({'width': '0%'});
 
 $("#area_album_load_<?=$i?>").show();
 
 
 
	
 }
  
  });
  
  
  
  
 
  /////////  id driving
 $("#icon_camera_<?=$i?>").click(function(){  
  $("#percent_load_pic_<?=$i?>").css({'width': '0%'});
  
  ///alert(0);
  
  document.getElementById('upload_pic_number').value='<?=$i?>';
 
 
  $("#load_checkin_camera").click(); 
  
  });
  
  
 
  
  </script>
           
           
 <input class="form-control" type="hidden" name="check_photo_<?=$i?>" id="check_photo_<?=$i?>"    value="0" >
       
                
         <? } ?>  </td>
    </tr>
  </tbody>
</table>

   <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"    value="<?=$_GET[checkin]?>" >
   
      <input class="form-control" type="hidden" name="upload_pic_number" id="upload_pic_number"    value="0" >
<table width="100%" border="0" cellspacing="2" cellpadding="2" style="display:none">
  <tbody>
    <tr>
      <td><?  include ("mod/load/show/photo_upload/check.php");?></td>
    </tr>
  </tbody>
</table>

 