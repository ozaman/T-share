<style>
  ons-search-input input{
    height: 32px !important;
    font-size: 17px !important;
  }
</style>
<p style="text-align: center; margin: 7px;">
    <ons-search-input placeholder="ค้นหา" style="" onkeyup="searchTopicInfo(this.value);"></ons-search-input>
</p>
<div style="padding: 0px;background-color:#fff;height: auto;" >
<ons-list id="list_acti_data">	 
<?php 

	$query = $this->db->query("SELECT id, s_topic, s_sub_topic, s_post_date FROM information_list where i_status = 1 order by s_post_date desc ");
    
//    $query_read = $this->db->query("SELECT id FROM information_list where i_user = ".$_COOKIE[detect_user]." and i_status = 1");
//  	$num_read = $query_read->num_rows();
    
	$befordate = '';
	$num = $query->num_rows();
	
	if($num<=0){ ?>
		<div class="font-22" style="color: #ff0000;text-align: center;padding: 0px; margin-top: 20px;position: absolute; width: 100%;"><strong>ไม่มีข่าวสาร</strong></div>
	<?php }
	foreach ($query->result() as $row){ 
	
      $query_read = $this->db->query("SELECT id,d_read_time FROM information_reader_list where  i_information = ".$row->id." and i_user = ".$_COOKIE[detect_user]." and i_status = 1");
      $check_read = $query_read->num_rows();

      $query_read_all = $this->db->query("SELECT id FROM information_reader_list where  i_information = ".$row->id." and i_status = 1");
      $num_read_all = $query_read_all->num_rows();
      
      if($check_read>0){
			$bg = "background-color : #fff;";
            $icon_read = "display:none;";
      }else{
//			$bg = "background-color : #edf2fa;";
            $icon_read = '';
      }
	$date_row = date('Y-m-d',$row->s_post_date);
	if($row->s_post_date!=""){
		$save_time = date('H:i:s',$row->s_post_date)." น.";
	}else{
		$save_time = "-";
	}
	if($befordate != $date_row){ 
				$befordate = $date_row;
				
				?>
		<ons-list-header style="font-weight: 500;"  class="font-13"><?="วันที่ ".$date_row;?></ons-list-header>
<?php			}	?>
	    <ons-list-item  class="list_info_<?=$row->id;?>" style=" padding-left: 10px;<?=$bg;?>" >
            <div class="center">
       		<table width="100%" onclick="openDetailInfo('<?=$row->id;?>','<?=$row->s_topic;?>');">
       			<tr>
                  <td><span class="font-17"><strong class="txt_topic" role="<?=$row->id;?>"><?=$row->s_topic;?></strong></span></td>
       			</tr>
       			<tr>
       				<td>
       					<span class="font-17"><?=$row->s_sub_topic;?></span>
       				</td>
       			</tr>
       			<tr>
       				<td >
       				<span id="txt_date_diff_info_<?=$row->id;?>" class="font-15"><?=$save_time;?></span>
       				</td>
       			</tr>
       		</table>
            </div>  
          <div class="right" style=" margin-right: 0px; padding-right: 5px;">
            <table width="100%" >
              <tr class="ic-no-read" style="<?=$icon_read;?>" id="tr_icon_read_<?=$row->id;?>">
                <td align="center"><i id="" class="fa fa-exclamation font-24 " aria-hidden="true" style="color: #f00;"></i></td>
              </tr>
              <tr>
                <td align="center">
                  <ons-button onclick="viewReaderList('<?=$row->id;?>');" style="width: 80px;padding: 0px 10px; background-color: #fff; color: #0076ff; border: 1px solid;">
                  <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;<span class="font-17" id="num_read_all_<?=$row->id;?>"><?=$num_read_all;?></span>
                  </ons-button>
                  </td>
              </tr>
            </table>
            
          </div>
       </ons-list-item>
<?php	}	?>
</ons-list>	
</div>
