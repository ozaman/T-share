<style>
   .mynumber{
   display:block;
   width:100%;
   height:40px;
   text-align:center;
   border:1px solid #CCCCCC;
   text-decoration:none;
   margin-right:3px;
   background-color:#FFFFFF;
   color:#000000;
   float:left;
   font-size:30px; text-align:center;
   line-height: 40px;	
   -moz-border-radius: 10px;
   -webkit-border-radius: 10px;
   border-radius: 10px;
   }
   .mynumber-active{
   display:block;
   width:100%;
   height:40px;
   text-align:center;
   border:1px solid <?=$main_color?>;
   text-decoration:none;
   margin-right:3px;
   background-color:#FFFDE0;
   color:#000000;
   float:left;
   font-size:30px; text-align:center;
   line-height: 40px;	
   -moz-border-radius: 10px;
   -webkit-border-radius: 10px;
   border-radius: 10px;
   }
</style>
<script>
   $(".text-topic-action-mod-4" ).html("<?=t_select_num_child;?>");
     $(".mynumber").removeClass("mynumber-active");
   $("#number_<?=$_GET[id]?>").addClass("mynumber-active");
    
</script> 
<TABLE cellSpacing="0" cellPadding="5" width="100%" border="0" style="padding-bottom:10px" >
   <TBODY>
      <TR>
         <TD width="100%" vAlign=top>
            <div>
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  </tr>
               </table>
            </div>
            <TABLE width="100%" align=center cellSpacing=0 cellPadding=0 border=0 style="margin-top:40px">
               <?
                  for($i=0;$i<50;$i++){
                  $bgcolor = ($c++ & 1) ? '#FFFFFF' : '#FFF'; 
                  if ($count==0) { echo "<TR bgcolor=".$bgcolor.">"; }
                  //������Ǵ���� 
                  ?>
               <td  cellpadding="3"   valign="top">
                  <table width="100%" border="0" cellspacing="3" cellpadding="3">
                     <tr>
                        <td >
                           <script>
                              $("#number_<?=$i?>").click(function(){ 
                                $('#child_number').html('<?=$i?>');
                                $('#child').val(<?=$i?>);
                                 $(".mynumber").removeClass("mynumber-active");
                                 $("#number_<?=$i?>").addClass("mynumber-active");
                               $( "#main_load_mod_popup_4" ).toggle();
                               var num_a=$('#adult').val();
                              var num_b=$('#child').val();
                               $('#detail_step_3').html("<br>ผู้ใหญ่ :"+num_a+"&nbsp;เด็ก : "+num_b);
                               $('#check_child').val(1);
                              	$('#child_number').removeClass('border-alert');
                              	$('#child_number').addClass('border-alert-no');
                              	$('#show_payment_detail').show();
                              	$('#show_payment_detail').addClass('border-alert');
                              	$('.iradio_square-green').addClass('border-alert');
                              	$('#row_accept_guest').show();
                              	if($('#check_t_h').val()!=0 && $('#check_t_m').val()!=0 && $('#check_adult').val()!=0 && $('#check_child').val()!=0){
                              //		
                              		 setTimeout(function(){ 
                              //		 $('#step_2').show();
                              		 $('#step_1').css('width','40%');
                              		/* var x = document.getElementById("load_mod_popup_3");
                               x.scrollTo(0, x.scrollHeight);  */
                               		console.log('bottom '+$('#show_guest_detail').offset().top);
                               		$('#load_mod_popup_3').animate({ scrollTop: $('#show_guest_detail').offset().top-80 }, 'slow');
                               }, 500);
                              	}
                              });     
                                     
                           </script>         
                           <div class="mynumber" id="number_<?=$i?>" >
                              <?=$i?>
                           </div>
                        </td>
                     </tr>
                  </table>
               </TD>
               <?
                  $count++;
                  if (($count%5) == 0) { echo ""; $count=0; }
                  }
                  $db->closedb ();
                  //������ʴ��������
                  ?>
            </TABLE>
            <!-- End News -->
         </TD>
      </TR>
   </TBODY>
</TABLE>