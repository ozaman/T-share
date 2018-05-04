<? if($_GET[op]==""){
   if($_GET[open]=="menu"){ ?>
<script>
   $('.text-topic-action-mod').html('<?=t_bank_account_information;?>');
</script>
<? } 
   if($_COOKIE[lng]=="th"){
   	 $bank_list = array("กรุงไทย"
    					,"กสิกรไทย", "ไทยพาณิชย์","กรุงเทพ","ทหารไทย"
   					 ,"กรุงศรีอยุธยา"
   					 ,"เกียรตินาคิน"
   					 ,"ซิติแบงก์"
   					 ,"ทิสโก้"
   					 ,"ซีไอเอ็มบี ไทย"
   					 ,"ธนชาต"
   					 ,"นครหลวงไทย"
   					 ,"ยูโอบี"
   					 ,"สแตนดาร์ดชาร์เตอร์ดไทย"
   					 ,"เมกะสากลพาณิชย์"
   					 ,"ไอซีบีซี"
   					 ,"แลนด์ แอนด์ เฮ้าส์ เพื่อรายย่อย"
   					 ,"ไทยเครดิต เพื่อรายย่อย"
   					 ,"พัฒนาวิสาหกิจขนาดกลางและขนาดย่อม"
   					 ,"เพื่อการเกษตรและสหกรณ์การเกษตร"
   					 ,"เพื่อการส่งออกและนำเข้าแห่งประเทศไทย"
   					 ,"อิสลามแห่งประเทศไทย"
   					 );
   }	
   else{
   	$bank_list = array("Krung Thai"
    , "Kasikorn", "Siam Commercial Bank", "Bangkok", "TMB"
   , "Ayutthaya"
   , "Kiatnakin"
   , "Citibank"
   , "TISCO"
   , "CIMB Thai"
   , "Thanachart"
   , "Siam City"
   , "UOB"
   , "Standard Chartered Thai"
   , "Mega International Commercial"
   , "ICBC"
   , "Land and Houses for Retail"
   , "Thai Retail Credit"
   , "Small and Medium Enterprise Development"
   , "For Agriculture and Agricultural Cooperatives"
   , "For export and import of Thailand"
   , "Islam of Thailand"
   					 );
   }
    $res[web_user] = $db->select_query("SELECT * FROM web_driver  where id =".$_GET[driver]." ");
   	$arr[web_user] = $db->fetch($res[web_user]);
    ?>
<script src="js/craftpip/demo/libs/jquery.min.js?v=<?=time();?>"></script>
<script src="js/craftpip/demo/libs/bootstrap.min.js?v=<?=time();?>"></script>
<script src="js/craftpip/demo/libs/pretty.js?v=<?=time();?>"></script>
<!-- BOOTSTRAP-FULLSCREEN-SELECT files -->
<link rel="stylesheet" type="text/css" href="js/craftpip/css/bootstrap-fullscreen-select.css?v=<?=time();?>" />
<script type="text/javascript" src="js/craftpip/js/bootstrap-fullscreen-select.js?v=<?=time();?>"></script>
<script type="text/javascript" src="js/craftpip/demo/demo.min.js?v=<?=time();?>"></script> 
<style>
   .btn-mobileSelect-gen{
   height: 40px !important;
   border-radius: 0px !important;
   display: block !important;
   width: 100% !important;
   font-size: 18px !important;
   }
   .mobileSelect-control{
   font-size: 17px !important;
   }.mobileSelect-title{
   font-size: 20px !important;
   }
   .mobileSelect-cancelbtn{
   font-size: 20px !important;
   }
   .mobileSelect-savebtn{
   font-size: 20px !important;
   }
   .mobileSelect-container.white .list-container .mobileSelect-control.selected{
   background-color: #3b5998!important;
   color: #ffffff !important;
   }
   a{
   color: #3b5998!important;
   }
</style>
<div class="box box-default" style="margin-top:30px;">
   <form method="post" action="" id="bank_form" name="bank_form"  enctype="multipart/form-data" >
      <div class="box-body" style="margin-left:0px;"  >
         <div class="row" style="padding-right:0px; ">
            <div class="col-md-6">
               <div class="topicname"><i class="fa  fa-user"></i>&nbsp;<?=t_account_name;?></div>
               <input class="form-control" type="text" name="pay_bank_name" id="pay_bank_name"  required="true"  value="<?=$arr[web_user][pay_bank_name];?>"  style="padding: 10px;"   >
            </div>
            <div class="col-md-6">
               <div class="topicname"><i class="fa  fa-bank "></i>&nbsp;<?=t_bank;?> </div>
               <select name="pay_bank" id="pay_bank"  class="form-control mobileSelect" data-animation="zoom" 
               data-title="<table><tr><td width='70'><span class='font-22 text-cap'><?=t_bank;?></span></td><td><input type='text' class='form-control filter_bank' style='height:35px;margin-top:-7px;' onkeyup='filterBank()' /></td></tr></table>" data-theme="white"  >
                  <?php 
                     foreach($bank_list as $name){ 
                     	if($arr[web_user][pay_bank]==$name){
                     $selected = "selected";
                     }else{
                     $selected = "";
                     }
                     ?>
                  <option  value="<?=$name;?>" <?=$selected;?> ><?=$name;?></option>
                  <?  }
                     ?>
               </select>
            </div>
            <div class="col-md-6">
               <div class="topicname"><i class="fa fa-bank "></i>&nbsp;<?=t_bank_branch;?></div>
               <input class="form-control" type="text" name="pay_bank_sub" id="pay_bank_sub"  required="true" onkeypress="PasswordEnter(this,event)"   value="<?=$arr[web_user][pay_bank_sub];?>"  style="padding: 10px;"  >
            </div>
            <div class="col-md-6">
               <div class="topicname"><i class="fa fa-building-o"></i>&nbsp;<?=t_account_number;?></div>
               <input type="number" name="pay_bank_number" id="pay_bank_number"  required="true"   value="<?=$arr[web_user][pay_bank_number];?>" class="form-control"  style="padding: 10px;"   >
            </div>
            <div class="col-md-6">
               <div  id="send_user_data"  class="topicname" ></div>
            </div>
            <div class="col-md-6" >
               <button id="submit_user_bank" type="button" class="btn btn-block btn-primary" style="background-color:#3b5998 ;" >
               <span class="font-24"><?=t_save_data;?></span></button>
            </div>
         </div>
      </div>
   </form>
   <script type="text/javascript">
      $(function () {
      $('#pay_bank').mobileSelect({
      onClose: function(){        
      console.log('onClose: '+this.val());
      },
      onOpen: function(){
      console.log('onOpen: '+this.val());
      },
      buttonSave: '<?=t_confirm;?>',
      buttonCancel: '<?=t_cancelled;?>'
      });
      });
   </script>
   <script>
      function filterBank(){
      var input = $('.filter_bank').last().val();
      var filter = input.toUpperCase();
      $('.mobileSelect-container:visible').find('.mobileSelect-control').each (function() {
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
      $('#submit_user_bank').click(function(){
      	var url_load = "empty_style.php?name=pay&file=bank_book&id=<?=$arr[web_user][id]?>&op=update_bank";
      	var open = '<?=$_GET[open];?>';
      	$.post( url_load, $( "#bank_form" ).serialize() , function( data ) {
      	  	console.log(data);
      	  	if(open==""){
      			var url_load_finish= "load_page_mod_4.php?name=booking/step/load&file=finish&lat=<?=$arr[shop][lat]?>&lng=<?=$arr[shop][lng]?>&type=stop&place=<?=$_GET[place]?>";
      		url_load_finish =url_load_finish+"&adult="+document.getElementById('adult').value;
      		url_load_finish =url_load_finish+"&child="+document.getElementById('child').value;
      		url_load_finish =url_load_finish+"&time="+document.getElementById('time').value;
      		url_load_finish =url_load_finish+"&car="+document.getElementById('check_use_car_id').value;
      		url_load_finish =url_load_finish+"&airout_h="+document.getElementById('airout_h').value;
      		url_load_finish =url_load_finish+"&airout_m="+document.getElementById('airout_m').value;
      		url_load_finish =url_load_finish+"&car_color="+document.getElementById('car_color').value;
      		url_load_finish =url_load_finish+"&plan="+document.getElementById('plan_setting').value;
      		console.log(url_load_finish);
      		$('#load_mod_popup_4').html(load_main_mod);
      		$('#load_mod_popup_4').load(url_load_finish);	
      		}else{
      			swal("<?=t_save_succeed;?>", "<?=t_press_button_close;?>", "success");
      		}
      	});
      });
   </script>
</div>
<? } 
   if($_GET[op]=="update_bank"){
   	$db->connectdb(DB_NAME_APP, DB_USERNAME, DB_PASSWORD);
   		$data = array(
               "pay_bank_name" => "$_POST[pay_bank_name]",
   			"pay_bank" => "$_POST[pay_bank]",
   			"pay_bank_sub" => "$_POST[pay_bank_sub]",
   			"pay_bank_number" => "$_POST[pay_bank_number]",
               "update_date" => "" . TIMESTAMP . ""
           );
            $result = $db->update_db(TB_driver, $data , " id=$_GET[id] ");
           $db->closedb();
           echo json_decode($data);
           echo json_decode($result);
   }
   ?>