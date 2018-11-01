<?php 
$_where = array();
 $_where[product_id] = $_GET[shop_id];
 $_select = array('*');
 $_order = array();
 $_order[i_index] = 'asc';
 $FILE_IMG = $this->Main_model->fetch_data('','',TBL_SHOP_DOCCUMENT_FILE_IMG,$_where,$_select,$_order);
foreach($FILE_IMG as $key=>$row){
?>
    <ons-carousel-item style="background-color: #085078;">
      <div style="text-align: center; font-size: 30px; margin-top: 20px; color: #fff;">
        <img src="https://www.welovetaxi.com/app/data/pic/place/<?=$row->s_name;?>" width="100%">
      </div>
    </ons-carousel-item>
    
 <?php } ?>