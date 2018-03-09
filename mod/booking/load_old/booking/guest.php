           
              
              
<div class="<?= $coldata?>" id="show_to_times" style="display:nones">
              <div>
                <div class="topicname">ชื่อแขก</div>
                
 
     
                <textarea name="guest_name"    id="guest_name" type="text"   class="form-control" ></textarea>
 
<div class="font-24" id="text_to_time" style="color:<?=$main_color?>"></div>
 
   		      </div> 
                
  </div>
              
         
         
         
     <div class="<?= $coldata?>">    
         
              
              <div class="take_photo" ><center>
 
 
 
 
 

 
 
 
<i class="fa  fa-camera take-photo-icon"  id="icon_camera_passport"></i><br>
ถ่ายภาพพาสปอร์ตแขก

<div style="padding:5px;">

<div class="progress" style="width:100%;;border-radius:8px; margin-top: 10px; border:none " id="area_image_album_load_main">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="40"
  aria-valuemin="0" aria-valuemax="100" id="area_image_album_load_passport" style="width:0%;border-radius:5px;border:none">
      </div>
  </div>
  
  
    </div>
    
 

 <img 
 
 
 
  <? if($arr[project][passport_pic]=='1' ){ ?>  
 
 
 src="../data/fileupload/passport/<?=$arr[project][invoice]?>_big.jpg?v=<?=$arr[project][update_date]?>" 
 
 
 <? } ?>
 
 
 
 name="image_passport" id="image_passport"  style="width:100%; padding:5px; margin-top:-20px;border-radius:15px; " />

</div>


</div>
              <script>
/////////  idcard
 $("#icon_camera_passport").click(function(){  
 
   
  document.getElementById('upload_pic_type').value='passport';
  
 
  $("#load_chat_camera").click(); 
  
  });
  
  
  //// 
 
 /*
      var url_load_price= "popup.php?name=booking&file=price";
  
    url_load_price=url_load_price+"&adult="+document.getElementById('adult').value;
	
    url_load_price=url_load_price+"&nation="+document.getElementById('nation').value;
	
	url_load_price=url_load_price+"&pro="+document.getElementById('program').value;
	
	 url_load_price=url_load_price+"&price_plan="+document.getElementById('price_plan').value;
	 
	 
	
  
  $('#send_booking_data').load(url_load_price); 
  
  */
 
  
</script>

 <input class="form-control" type="hidden" name="upload_pic_time" id="upload_pic_time"   value="<?=time()?>" >



 <input class="form-control" type="hidden" name="upload_pic_type" id="upload_pic_type"     value="" >
 
 
 
 
  <input class="form-control" type="hidden" name="check_photo_passport" id="check_photo_passport"    value="" >
  <input class="form-control" type="hidden" name="work_vc" id="work_vc"       value="<?=$arr[project][invoice]; ?>" >