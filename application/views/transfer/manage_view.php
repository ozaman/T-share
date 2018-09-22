<script>
   $(".text-topic-action-mod").html('<?=t_job_received;?>');
  
</script>
<div class="box " style="margin-top:50px;border-top: 0px;" id="main_component" >

   <?
      if($data_user_class=='taxi'){
      $filter="and drivername=".$user_id." ";
      } 
      else { 
      $filter=""; 
      }
     
      ?>
<input id="driver" value="<?=$_COOKIE['data_user_id'];?>" type="hidden" />

   <div class="form-group" style="margin-bottom:75px;display: nones;">

      <input type="date" class="form-control pull-right" value="<?=date('Y-m-d');?>"  name="date_report" id="date_report"  readonly="true" 
      style=" z-index: 0;font-size: 20px;    text-align: center;"  >
      <!-- /.input group -->
   </div>

   <div id="load_manage_data"  style="padding:0px; margin: 12px 0;display: nones;" class=""  align="center">
     	
   </div>
	<button onclick="callApiLog();" style="display: none;">TEST</button>
</div>
