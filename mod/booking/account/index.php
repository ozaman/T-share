<link rel="stylesheet" type="text/css" href="calendar/css/smoothness/main.css" />
<script src="js/jquery-main.js"></script> 
<script   src="calendar/js/th.js"></script>
<script>
   $(function(){
   $("#date_report").datepicker({ dateFormat: 'yy-mm-dd',
   dateFormat: 'yy-mm-dd',
   todayHighlight: true,
   minDate: '-1Y', maxDate: '+0Y',
   showOn: 'button', 
   buttonImage: 'calendar/dateselect.gif',
   buttonImageOnly: true ,    
   numberOfMonths: 1,
   }
   );
   });
</script> 
<script>
   $('.text-topic-action-mod').html('<? echo t_receipts?>');
</script>
<div class="box box-default" style="margin-top:30px;">
   <div class="box-body" >
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td>
               <table width="100%"  border="0" cellspacing="2" cellpadding="2">
                  <tr>
                     <td width="74" class="font-22" >
                        <strong><?=t_month;?> </strong>
                        <select name="data_m" id="data_m" style="height:40px;width:100%; font-size:20px ">
                           <?
                              for($ii=1;$ii<13;$ii++){
                              if( $ii < 10){ $ii = '0'.$ii; }
                              ?>
                           <option value="<?=$ii;?>" <?  if(date('m')== $ii){ echo "selected=selected";} ?> >
                              <?=$ii;?>
                           </option>
                           <?  } ?>
                        </select>
                     </td>
                     <td width="120"  class="font-22">
                        <strong><?=t_buddhist_calendar;?> </strong><br>
                        <select name="data_y" id="data_y"  style="height:40px;width:100%; font-size:20px ">
                           <?
                              for($ii=date('Y');$ii< date('Y')+2;$ii++){
                              ?>
                           <option value="<?=$ii;?>" <?  if($y+544== $ii+543){ echo "selected=selected";} ?> >
                              <?=$ii+543;?>
                           </option>
                           <?  } ?>
                        </select>
                     </td>
                     <td valign="bottom"  ><button type="button" id="btn_form" class="btn btn-block btn-primary btn-fx"  style="margin-left:5px;width:80px; height:40px; width:100% "><?=t_search;?></button></td>
                  </tr>
               </table>
               <br>
               <ul class="nav nav-tabs" style="width:100%; margin-top:0px;">
                  <li class="active" style="width:50%; text-align:center" id="btn_load_shop"><a  ><span class="font-24"><?=t_shopping;?></span></a></li>
                  <li   style="width:50%; text-align:center" id="btn_load_all"><a ><span class="font-24"><?=t_job_received;?></span></a></li>
               </ul>
               <script>
                  $("#btn_load_shop").click(function(){ 
                  $("#btn_load_shop").addClass('active');
                  $("#btn_load_all").removeClass('active');
                  $("#load_shop").show();
                  $("#load_all").hide();
                  	//$('.loader').show();
                   var year = $("#data_y").val();
                   var month = $("#data_m").val();
                  var url_shop = "go.php?name=booking/account/load&file=shop&server=th&year="+$("#data_y").val()+"&month="+$("#data_m").val()+"";
                  var url_all = "go.php?name=booking/account/load&file=all&server=th&year="+$("#data_y").val()+"&month="+$("#data_m").val()+"";
                   /// $('#load_shop').show();
                    $('#load_shop').html(load_main_mod_table);
                   $('#load_shop').load(url_shop); 
                     $('#load_all').html(load_main_mod_table);
                   $('#load_all').load(url_all); 
                  });
                  $("#btn_load_all").click(function(){ 
                  $("#btn_load_all").addClass('active');
                  $("#btn_load_shop").removeClass('active');
                  $("#load_shop").hide();
                  $("#load_all").show();
                  	//$('.loader').show();
                   var year = $("#data_y").val();
                   var month = $("#data_m").val();
                  var url_shop = "go.php?name=booking/account/load&file=shop&server=th&year="+$("#data_y").val()+"&month="+$("#data_m").val()+"";
                  var url_all = "go.php?name=booking/account/load&file=all&server=th&year="+$("#data_y").val()+"&month="+$("#data_m").val()+"";
                   /// $('#load_shop').show();
                    $('#load_shop').html(load_main_mod_table);
                   $('#load_shop').load(url_shop); 
                     $('#load_all').html(load_main_mod_table);
                   $('#load_all').load(url_all); 
                  });
               </script>
               <div  id="load_shop"  style="display:nones " > 
                  <? //  include ("load/page/loading.php");?> 
               </div>
               <div  id="load_all"  style="display:none " > 
                  <? //  include ("load/page/loading.php");?> 
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <br>
               <!--  datepicker OK --> 
               <link href="js/datepick/jquery.datepick.css" rel="stylesheet">
               <script src="js/datepick/jquery.plugin.js"></script>
               <script src="js/datepick/jquery.datepick.js"></script> 
               <script src="js/datepick/datepick.op.js"></script> 
               <script type="text/javascript">
                  // $('#date_report').datepick({altField: '#star_cal' 	, dateFormat: 'yyyy-mm-dd' 	, showTrigger: '#calImgInx' }); 
                  $("#btn_form").click(function(){
                  	//$('.loader').show();
                   var year = $("#data_y").val();
                   var month = $("#data_m").val();
                  var url_shop = "go.php?name=booking/account/load&file=shop&server=th&year="+$("#data_y").val()+"&month="+$("#data_m").val()+"";
                  var url_all = "go.php?name=booking/account/load&file=all&server=th&year="+$("#data_y").val()+"&month="+$("#data_m").val()+"";
                   /// $('#load_shop').show();
                    $('#load_shop').html(load_main_mod_table);
                   $('#load_shop').load(url_shop); 
                     $('#load_all').html(load_main_mod_table);
                   $('#load_all').load(url_all); 
                  	/*
                  	//// cn
                  		var url_place_cn = "go.php?name=load/all&file=shop&server=cn&day="+$("#date_report").val()+"";
                  	$('#load_cn').show();
                  	$('#load_cn').html(load_main_mod_table);
                  	$('#load_cn').load(url_place_cn); 
                  	*/
                  });
                  	/*
                  	//// cn
                  		var url_place_cn = "go.php?name=load/all&file=shop&server=cn&day="+$("#date_report").val()+"";
                  	$('#load_cn').show();
                  	$('#load_cn').html(load_main_mod_table);
                  	$('#load_cn').load(url_place_cn); 
                  	//$('.loader').show();
                  */
                      $("#btn_form").click();   
               </script>
            </td>
         </tr>
      </table>
   </div>
</div>