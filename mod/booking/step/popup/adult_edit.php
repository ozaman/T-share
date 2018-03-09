
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

 $(".text-topic-action-mod-5" ).html("เลือกจำนวนผู้ใหญ่");
 
 
 
 
   $(".mynumber").removeClass("mynumber-active");
 
 

 $("#number_<?=$_GET[id]?>").addClass("mynumber-active");
 
 
 
  </script> 
 


    <TABLE cellSpacing=0 cellPadding=5 width=100% border=0  >
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
			<td  cellpadding="3"   valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">
              <tr>
                <td > 
                
                         
<script>


$("#number_<?=$i?>").click(function(){ 
 
  $('#adult_number_edit').html('<?=$i?>');
  
  
  $('#adult_edit').val(<?=$i?>);
  
  
	$( "#main_load_mod_popup_5" ).toggle();
 
 

});     
                
                
       </script>         
                
                
                
                
                
                <div class="mynumber" id="number_<?=$i?>" >
                
                
                <?=$i?>
                
                      </div>
                
                </td>
              </tr>
            </table></TD>
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
