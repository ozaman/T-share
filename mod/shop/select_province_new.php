<? if($_GET[op]==""){ ?>
		
		<script src="js/craftpip/demo/libs/jquery.min.js?v=<?=time();?>"></script>
        <script src="js/craftpip/demo/libs/bootstrap.min.js?v=<?=time();?>"></script>
        <script src="js/craftpip/demo/libs/pretty.js?v=<?=time();?>"></script>
        
        <!-- BOOTSTRAP-FULLSCREEN-SELECT files -->
        <link rel="stylesheet" type="text/css" href="js/craftpip/css/bootstrap-fullscreen-select.css?v=<?=time();?>" />
        <script type="text/javascript" src="js/craftpip/js/bootstrap-fullscreen-select.js?v=<?=time();?>"></script>
        <script type="text/javascript" src="js/craftpip/demo/demo.min.js?v=<?=time();?>"></script> 
        <!--END BOOTSTRAP-FULLSCREEN-SELECT files-->
<style>
	
	.my-padding{
    /* margin-top: 55px; */
    /* padding: 17px; */
    padding-left: 15px;
    padding-top: 15px;
    padding-right: 15px;
    padding-bottom: 20px;
    }
    .hide-box{
		display: none;
	}
	.con{
		margin-top: 10px;width: 100%;
		padding-left: 10px;
		padding-right: 10px;
	}
	.btn-select{
		width: 100%; border: 1px solid #ddd; padding: 7px; margin-top: 0px; border-radius: 25px;
	}
	.mobileSelect-control{
		font-size: 17px !important;
	}
	.btn-mobileSelect-gen{
		height: 45px !important;
		font-size: 18px !important;
		font-weight: 500 !important;
		width: 100% !important;
		display: none !important;
	}
	.mobileSelect-title{
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
	.div-padding10{
		padding: 10px 0px;
		display: none;
	}
	.main-box-col{
		border: 1px solid #f0f0f0;
		display: table;
		width: 100%;
		box-shadow: 2px 4px 7px #ddd;
		border-radius :10px;
	}
	.main-box-icon{
		height: 100%;
		float: left;
		width: 20%;
		padding: 17px;
/*		font-size: 20px;*/
		border-right: 1px solid #f0f0f0;
		text-align: center;
		box-shadow: 1px 1px 4px #ddd;
/*		box-shadow: 1px 1px 0px #ddd;*/
	}
	.sub-box-txt{
		float: left;
		width: 80%;
		padding: 15px 10px;
	}
	.card-1 {
	  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
	  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
	}

	.card-1:hover {
	  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
	}

	.card-2 {
	  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
	}

	.card-3 {
	  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
	}

	.card-4 {
	  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
	}

	.card-5 {
	  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
	}
	/*@media screen and (max-width: 358px) {
	 	#spec_marker{
			padding : 27px 0px;
		}
		#text_province_now{
			padding : 25px 15px;
		}
	}*/
</style> 

<script>
	setTimeout(function(){ $('#fade_in1').fadeIn( "slow" ); }, 0);
	setTimeout(function(){ $('#fade_in2').fadeIn( "slow" ); }, 400);
	setTimeout(function(){ $('#fade_in3').fadeIn( "slow" ); }, 800);
</script>
<div class="my-padding" style="margin-top:  0px;">  
	<div id="tag_your_area" style="margin-top: 15px;">
    
		<!--<table width="100%">
				<tr>
				<td><div id="open_map" style="width: 150px;width: 100%;
		border: 1px solid #ddd;
		padding: 5px;
		border-radius : 10px;
		box-shadow: 1px 1px 5px #ddd;margin-bottom: 10px;" align="center" ><strong><span class="font-26">แผนที่</span></strong>&nbsp;
		<i class="fa fa-map-marker" aria-hidden="true" style="font-size:20px;"></i></div></td>
			</tr>
			<tr>
				<td>      
				<div style="padding-left:0px;padding-right:0px;">
				<button id="submit_this_pv"   class="btn_select"  style=" border-radius: 30px; "><strong class="font-26"  >ล็อกอินจังหวัด <span class="text-change-province"></span></strong></button></div>
				</td>
			</tr>
			<tr>
				<td>
				<div style="padding-left:0px;padding-right:0px;margin-top: 10px;">
				<button id="show_section" class="btn_select" style=" border-radius: 30px; "><strong class="font-26"  >ล็อกอินจังหวัดอื่น</strong></button></div>
				</td>
			</tr>
			
		</table>-->
		<div class="div-padding10" id="fade_in1">
		<div class="main-box-col" style="border-left: 7px solid #019ad2;" id="open_map">
		   <div class="main-box-icon font-28" style="background-color: #059bd229;"><i class="fa icon-app-uniF134-1 " aria-hidden="true"></i></div>
		   <div class="font-26 sub-box-txt"><span class="font-24">แผนที่</span></div>
		</div>
		</div>
		<div class="div-padding10" id="fade_in2">
		<div class="main-box-col" style="border-left: 7px solid #3b5998;" id="submit_this_pv">
		   <div class="main-box-icon font-28" style="background-color: #3e5b9930;" id="spec_marker"><i class="fa fa-map-marker " aria-hidden="true"></i></div>
		   <div class="font-26 sub-box-txt" id="text_province_now"><span class="font-24">ล็อกอินจังหวัดที่คุณอยู่ (<span class="text-change-province"></span>)</span></div>
		</div>
		</div>
		<div class="div-padding10" id="fade_in3">
		<div class="main-box-col" style="border-left: 7px solid #3f9684;" id="show_section" class="btn_select">
		   <div class="main-box-icon font-26" style="background-color: #42978540;"><i class="fa fa-map-o" aria-hidden="true"></i></div>
		   <div class="font-26 sub-box-txt"><span class="font-24">ล็อกอินจังหวัดอื่น</span></div>
		</div>
		</div>
	</div>
	
	<div style="display: none;margin-top: 40px;" id="tag_section">
		<div style="padding: 10px; border: 2px solid #ddd;  border-radius: 10px; box-shadow: 1px 1px 2px #ddd;margin: 10px;">
		<table width="100%" >
			<tr>
				<td>
					<span style="color: <?=$main_color?>" class="font-26" ><strong>เลือกภูมิภาค</strong></span>
				</td>
			</tr>
			<tr>
				<td align="center">
						<div class="con">
							<div class="btn-select"  align="center" id="btn_area">
								<table width="100%">
									<tr>
										<td align="center"><span  id="txt_show_area" class="font-26">- เลือก -</span></td>
										<td width="20"><i class="fa fa-caret-down" aria-hidden="true"></i></td>
									</tr>
								</table>
							</div>
						<select class="mobileSelect" id="select_regoin" data-animation="zoom" data-title="เลือกภูมิภาค" data-theme="white" >
                             <option value="" >- เลือก -</option>              
                       <?
                          $db->connectdb(DB_NAME,DB_USERNAME,DB_PASSWORD);
                                  $res[region] = $db->select_query("SELECT * FROM web_area  ORDER BY topic_th asc ");
                                   while($arr[region] = $db->fetch($res[region])) {
                                if($arr[project][region]==$arr[region][id]){
								  	$selected_region = "selected";
								  }else{
								  	$selected_region = "";
								  }
				$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
				$num_place = $db->select_query("SELECT sum(num_place) as num_all FROM shopping_place_num where area = '".$arr[region][id]."' and status = 1 group by area ");
				$num_place = $db->fetch($num_place);		  
                if($num_place[num_all]<=0){
					$num_place_show = 0;
					$none_area = 'display : none;';
				} else{
					$num_place_show = $num_place[num_all] ;
					$none_area = '';
					?> 
					 <option value="<?=$arr[region][id];?>"><?=$arr[region][topic_th]." : ".$num_place_show." สถานที่";?></option> <?
				}                  ?>
                   
                   
                 	<? }  $db->closedb ();?>                      
                </select>
						</div>
				</td>
			</tr>
		</table>
	</div>	
		
	<div style="padding: 10px; border: 2px solid #ddd;  border-radius: 10px; box-shadow: 1px 1px 2px #ddd;margin-top: 20px;margin: 10px;" >
		<table width="100%">
			<tr>
				<td>
					<span style="color: <?=$main_color?>" class="font-26"><strong>เลือกจังหวัด</strong></span>
				</td>
			</tr>
			<tr>
				<td>
					<div class="con">
						<div class="btn-select" align="center" id="btn_province">
						<table width="100%">
									<tr>
										<td align="center"><span  id="txt_show_province" class="font-26">- เลือก -</span></td>
										<td width="20"><i class="fa fa-caret-down" aria-hidden="true"></i></td>
									</tr>
								</table>
						</div>
						<div id="change_province"></div>
					</div>
				</td>
			</tr>
		</table>
	</div>

	<div style="width: 100%;margin-top: 20px;padding-left: 10px;padding-right: 10px;" align="center">
		<button id="submit_select_pv" style="width:100%;margin-top: 10px; height:50px; background-color:<?=$main_color?>; color:#FFFFFF;border-radius: 25px;border:1px solid #ddd;"><strong  class="font-26">ตกลง</strong> </button>
	</div>	
	</div>
	<input type="hidden" value="" id="area_id"/>	

	<input type="hidden" value="" id="province_id"/>	 

</div>
    
        <script type="text/javascript">
            $(function () {
					$('#select_regoin').mobileSelect({
				    onClose: function(){        
				        var txt = $('#select_regoin option[value="'+$(this).val()+'"]').text();
				        var value = $(this).val();
				        console.log('onClose: '+value+' txt: '+txt);
				        $('#txt_show_area').text(txt);
				        $('#area_id').val(value);

							 var url = "mod/shop/select_province_new.php?op=get_select_province&area="+value;
							$.post( url, function( data ) {
								
									$('#change_province').html(data);
									OpenProvince();
//									$('#txt_show_province').text('- เลือก -');
							});

				       
				    },
				    onOpen: function(){
				        console.log('onOpen: '+this.val());
				    },
				     buttonSave: 'ตกลง',
				     buttonCancel: 'ยกเลิก'
				});
				
            });
        </script>
		<script>
			function OpenProvince(){
						$('#select_province').mobileSelect({
									 buttonSave: 'ตกลง',
					     			 buttonCancel: 'ยกเลิก',
					     			 onClose: function(){
					     			 	  var txt = $('#select_province option[value="'+$(this).val()+'"]').text();
								       	  var value = $(this).val();
								          console.log('onClose: '+value+' txt: '+txt);
								          $('#txt_show_province').text(txt);
								          $('#province_id').val(value);
					     			 }
								});	
			}
			$('#btn_area').click(function(){
				$('#select_regoin').mobileSelect('show');
			});
			$('#btn_province').click(function(){
				if($('#area_id').val()==""){
					alert('กรุณาเลือกภูมิภาค');
					return;
				}
				$('#select_province').mobileSelect('show');
			});
		</script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-53264350-2', 'auto');
          ga('send', 'pageview');
        </script>
        <script>
    $('#open_map').click(function(){	

//		var province = '<?=$_GET[province];?>';
		var province = $('#province_id').val();
//		var txt_province = '<?=$name?>';

	   $( "#main_load_mod_popup_map" ).toggle();
	   $( "#load_mod_popup_map" ).show();
		
	   $('#load_mod_popup_map').html(load_main_mod);
	   
  		/*$.post( "mod/map_api/query_data_map.php?request=location_province&txt_province="+txt_province, function( data ) {
      	var obj_pv = JSON.parse(data);
		console.log(obj_pv);
		var url_load = "load_page_map.php?name=map_api&file=map_main&province="+province+"&user_id=<?=$user_id?>&lat_cen="+obj_pv.lat+'&lng_cen='+obj_pv.lng;
		console.log(url_load);
			$('#load_mod_popup_map').load(url_load); 
		});*/
 	  var url_load = "load_page_map.php?name=map_api&file=map_main&province="+province+"&user_id=<?=$user_id?>";
 	  $('#load_mod_popup_map').load(url_load); 
	  $('#show_main_tool_bottom').hide();
	});
        </script>
<script>
	
	$('#submit_select_pv').click(function(){
			 console.log('select province');
			 var province = $('#province_id').val();
			 var province_name = $('#txt_pv_fr').val();;
			 if(province==0 || province==""){
			 	alert('กรุณาเลือกจังหวัด');
			 	return;
			 }
			 $('.bottom_popup').show();
			 openMainShop(province,province_name);
	});


	
</script>

<script>
	setTimeout(function(){ 
	var txt_pv = $('#txt_pv_fr').val();
	console.log(txt_pv);
	var url = "mod/shop/select_province_new.php?op=get_id_province";
	$.post( url,{txt_pv:txt_pv}, function( data ) {
			  	var obj = JSON.parse(data);
			  	console.log(obj);
			  	if(obj==false){
					/*$( "#select_region").val(0);
					 $('#select_region').change();*/
					 
				}else{
					var province = obj.id;
					var area = obj.area;
				    
				    $('#area_id').val(area);
				    
				    $('#select_regoin').val(area);
				    var txt_area = $('#select_regoin option[value="'+area+'"]').text();
				    if(txt_area!=""){
						$('#txt_show_area').text(txt_area);
					}else{
						$('#txt_show_area').text('- เลือก -');
					}
				     
				     	     
				     var url = "mod/shop/select_province_new.php?op=get_select_province&area="+area;
						$.post( url, function( data ) {
//							console.log(data);
								$('#change_province').html(data);
								OpenProvince();
								 $('#select_province').val(province);
								  var txt_pv = $('#select_province [value="'+province+'"]').text();
//								  console.log(txt_pv);
								  if(txt_pv!=""){
								  	  $('#txt_show_province').text(txt_pv);
				     			  	  $('#province_id').val(province);
								  }else{
								  		 $('#txt_show_province').text('- เลือก -');
								  }
				     	$('#tag_your_area').fadeIn( "slow" );		
						});
				     
				}
			 	
			});
			
	}, 100);
</script>

<script>
			
			$('#show_section').click(function(){
				$('#tag_section').fadeIn( "slow" );
				$('#tag_your_area').hide();
				
			});
			$('#submit_this_pv').click(function(){
				 var province = $('#province_id').val();
				 var province_name = $('#txt_pv_fr').val();			 
				 if(province==""){
				 	 alert('ไม่มีสินค้าในจังหวัดที่คุณอยู่');
//					 swal("ไม่มีสินค้าในจังหวัดที่คุณอยู่!")
//				 	 $('#show_section').click();
				 	 return;
				 }
				 openMainShop(province,province_name);
			});
		</script>
 <script src="https://cdn.rawgit.com/googlemaps/js-rich-marker/gh-pages/src/richmarker.js?v=<?=time();?>"></script>
<? }

if($_GET[op]=="get_id_province"){
include('../../includes/class.mysql.php');
$db = New DB();
$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
$str = $_POST[txt_pv]; //กรุงเทพมหานคร
if(strlen($str)>7){
	$txt = mb_substr($str,0,7, "utf-8");
}else{
	$txt = $_POST[txt_pv];
}
$th = "name_th LIKE '%".$txt."%'";
$en = "or name LIKE '%".$txt."%'";
$cn = "or name_cn LIKE '%".$txt."%'";
$pv[province] = $db->select_query("SELECT id,name_th,name_cn,name,area FROM web_province  where ".$th." ".$en." ".$cn."   ");
$pv[province] = $db->fetch($pv[province]);

$num_place[area] = $db->select_query("SELECT sum(num_place) as num_all FROM shopping_place_num where area = '".$pv[province][area]."' and status = 1 group by area ");
$num_place[area] = $db->fetch($num_place[area]);

$num_place[pv] = $db->select_query("SELECT sum(num_place) as num_all FROM shopping_place_num where province = '".$pv[province][id]."' and status = 1 group by province ");
$num_place[pv] = $db->fetch($num_place[pv]);  
$db->closedb ();

$db->connectdb('admin_web','admin_MANbooking','252631MANbooking');
$area[area] = $db->select_query("SELECT id,topic_th,topic_en,topic_cn FROM web_area  where id = '".$pv[province][area]."'  ");
$area[area] = $db->fetch($area[area]);
$db->closedb ();

$data[id] =  $pv[province][id];
$data[name_th] =  $pv[province][name_th];
$data[name_cn] =  $pv[province][name_cn];
$data[name] =  $pv[province][name];
$data[area] =  $pv[province][area];
$data[area_name] =  $area[area][topic_th];
$data[num_place_area] =  $num_place[area][num_all];
$data[num_place_province] =  $num_place[pv][num_all];

echo json_encode($data);
}

if($_GET[op]=="get_select_province"){
include('../../includes/class.mysql.php');
$db = New DB();
$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
	 ?>
				<select class="mobileSelect" id="select_province" data-animation="zoom" data-title="เลือกจังหวัด" data-theme="white">
                             <option value="" >- เลือก -</option>              
			 <?
//                    $productand = 'and shopping_product>0';
                    $res[pv] = $db->select_query("SELECT id,name_th FROM web_province where area = '".$_GET[area]."' ".$productand."   ORDER BY name_th asc  ");
                    while($arr[pv] = $db->fetch($res[pv])) { 
	 
                	
				$num_place = $db->select_query("SELECT sum(num_place) as num_all FROM shopping_place_num where province = '".$arr[pv][id]."' and status = 1 group by province ");
				$num_place = $db->fetch($num_place); 
				if($num_place[num_all]<=0){
					$num_place_show = 0;
					$none_province = 'display : none;';
				} else{
					$num_place_show = $num_place[num_all] ;
					$none_province = ''; ?>
					 <option value="<?=$arr[pv][id];?>"  ><?=$arr[pv][name_th]." : ".$num_place_show." สถานที่";?></option> <?
				}
                                  ?>
                    
                 	<? }  $db->closedb ();?>
               </select>	
             
<? }

if($_GET[op]=="get_id_province_only"){
include('../../includes/class.mysql.php');
$db = New DB();
$db->connectdb('admin_app','admin_MANbooking','252631MANbooking');
$str = $_POST[txt_pv]; //กรุงเทพมหานคร
if(strlen($str)>7){
	$txt = mb_substr($str,0,7, "utf-8");
}else{
	$txt = $_POST[txt_pv];
}
$th = "name_th LIKE '%".$txt."%'";
$en = "or name LIKE '%".$txt."%'";
$cn = "or name_cn LIKE '%".$txt."%'";
$pv[province] = $db->select_query("SELECT id,name_th,name_cn,name,area FROM web_province where ".$th." ".$en." ".$cn."   ");
$pv[province] = $db->fetch($pv[province]);

echo json_encode($pv[province]);
}
?>