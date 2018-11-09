<?php
//echo $_GET[id];
//exit();
$query = $this->db->query("SELECT id, s_topic, s_sub_topic, s_post_date FROM information_list where id = ".$_GET[id]." ");
$row = $query->row();
?>
<ons-list-header>ผู้อ่าน : <?=$row->s_topic;?></ons-list-header>
<ons-list>
  <?php
  $sql = 'SELECT t1.d_read_time,count(t1.i_user) as num_read ,t2.name, t2.nickname, t2.phone, t2.username,t2.update_date FROM information_reader_list as t1 left join web_driver as t2 on t1.i_user = t2.id where t1.i_information = '.$_GET[id].' GROUP BY t1.i_user';
  $query = $this->db->query($sql);
  foreach ($query->result() as $row) {
    if ($row->nickname != "") {
      $nickname = "(".$row->nickname.")";
    }else{
      $nickname = "";
    }
    if (file_exists("../data/pic/driver/small/".$row->username.".jpg")) {
      $path_pf = "../data/pic/driver/small/".$row->username.".jpg?v=".$row->update_date;
    }
    else {
      $path_pf = "../data/pic/driver/small/default-avatar.jpg";
    }
    ?>
    <ons-list-item style="padding-left: 10px;">
      <div class="left">
        <img class="list-item__thumbnail" src="<?=$path_pf;?>">
      </div>
      <div class="center">
        <span class="list-item__title font-17"><?=$row->name;?> <?=$nickname;?></span>
        <span class="list-item__subtitle"><?=date('Y-m-d H:i',$row->d_read_time)." น.";?></span>
      </div>
      <div class="right">
        <b class="font-20"> <?=$row->num_read;?> </b>
      </div>
    </ons-list-item> 
  <?php }  ?>
</ons-list>
