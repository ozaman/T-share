<?php

foreach ($place_company as $data){
    ?>
    <div class="card" onclick="sendShops('<?=$data->id;?>')">
        <table width="100%" border="0" cellspacing="" cellpadding="" style="border-bottom : 0px solid #DADADA;" id="row_place_1">
            <tr>
                <td width="110" valign="top">
                    <img src="../data/pic/place/<?=$data->id;?>_logo.jpg" width="100px" alt="" style=" border-radius:  15px; border: 1px solid #ddd; margin-bottom:5px;">
                </td>
                <td>
                    <div class="element_to_find">
                        <span class="font-18" style="color:#3b5998">ดิวตี้ฟรี </span><br>
                        <span class="font-18" style="color:#333333">
                            <b> <?=$data->topic_th;?> </b>
                        </span>
                        <b> <br>
                            <input type="hidden" value=" " id="1">
                        </b>
                    </div>
                    <div class="font-18 btn_detail" style="display: nones; " onclick="getplandetail('<?=$data->id;?>')">
                        <span>รายละเอียด</span>

                    </div>
                    <input type="hidden" id="check_click_1" value="0">

                </td>
            </tr>
        </table>
    </div>
<?php } ?>
<style>
.btn_detail{
        margin-top: 20px;
    float: right;
    display: nones;
    background-color: #2f8efe;
    color: #fff;
    border-radius: 10px;
    padding: 4px 6px;
}
</style>  