  <?  include ("bootstrap/css/css.php");?>
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  			 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>					 
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <script>
  
  
$( document ).ready(function() {

  $("#in").load('f_in.php');
 
 


  $("#f_in").click(function(){ 
  
  
 $("#out").html('');
  
  $("#out").hide();
  $("#in").show();
  
 
 
$("#in").load('f_in.php');


 

  });
  
  
    $("#f_out").click(function(){ 
	
	  $("#in").html('');
	

  $("#in").hide();
  $("#out").show();
  $("#out").load('f_out.php');


  
   




	//$("#out").load('f_out.php');
 //  ("#out").html('');
 
 


 
  });
  
  
    });
  
  
  
  </script>
  
  
 


<style>

 

</style>


<div class="box-body"   >
         <div class="row" style="padding:0px;">
		 
		 
		 
		 
		 
		 <div class="col-md-12">
			      






 <div style="background-color:#FFCB05; height:auto">
 
  <ul class="nav nav-tabs" style="padding: px;border-bottom:1px solid #FFFFFF;">
    <li class="active" id="f_in"  style="width:50%; " ><a data-toggle="tab" href="#in"   style="font-size:20px; color:#000000"><i class="fa  fa-plane"></i>&nbsp;ในประเทศ</a></li>
    <li id="f_out" style="width:50%"><a data-toggle="tab" href="#out" style="font-size:20px;color:#000000"><i class="fa  fa-plane"></i>&nbsp;ต่างประเทศ</a></li>
 
  </ul>

  <div class="tab-content">
    <div   style="margin-top:-40px;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td  id="in">&nbsp;</td>
  </tr>
</table>

 
 
    </div>
	
    <div    style="margin-top:-40px;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td  id="out">&nbsp;</td>
  </tr>
</table>
 
</div>
</div> 


 <div>
 
 
  <div>
   <div>
    <div>
 
 
 
 
 