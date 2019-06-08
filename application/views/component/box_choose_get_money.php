<style>
    @keyframes blink { 
        50% { 
            border-color: #ff0000; 
            color : #ff0000;   } 
    }
    .red-blink{ /*or other element you want*/
        animation-name: blink ;
        animation-duration: .5s ;
        animation-timing-function: step-end ;
        animation-iteration-count: infinite ;
        animation-direction: alternate ;

    }
</style>

<?php
$data = $this->Main_model->rowdata(TBL_ORDER_BOOKING, array('id' => $_GET[id]), array('*'));
if ($data->check_driver_pay == 0) {
    $class_step = "step-booking";
    $img_st = "no.png";
} else {
    $class_step = "step-booking-active";
    $img_st = "yes.png";
}
?>
<td class="font-16">
    <div class="div-all-checkin">
        <div style="padding: 5px 10px">
            <?php
            if ($_COOKIE[detect_userclass] == "taxi") {
//                    fetch_data($limit,$start,$table,$arr_where,$arr_select,$arr_order)
                $_where = array();
                $_where[i_status] = 1;
                $type_pay = $this->Main_model->fetch_data("", "", TBL_PAY_TYPE, $_where, array('*'), "");
//                print_r($type_pay);
                ?>
                <ons-list-header class="list-header"> เลือกช่องทางรับเงิน</ons-list-header>
                <span class="font-14">*กรณีงานมีรับเงินสด</span>
                <!--<ons-list>-->
                    <?php foreach ($type_pay as $key => $value) { ?>
                        <ons-list-item tappable>
                            <label class="left" style="    padding-left: 5px;">
                                <ons-radio input-id="radio-<?=$value->id;?>" name="choose_get_money_radio" value="<?=$value->id;?>"></ons-radio>
                            </label>
                            <label for="radio-<?=$value->id;?>" class="center">
                                <?=$value->s_topic;?>
                            </label>
                        </ons-list-item> 
                    <?php }
                    ?>
                <!--</ons-list>-->
                <?php
            } else if ($_COOKIE[detect_userclass] == "lab") {
                
            }
            ?>
                <ons-button modifier="outline" class="button-margin button button--outline button--large" type="button"
                            onclick="confirmChooseGetMoney(<?=$data->id;?>);" style="background-color: #fff;padding: 0px 4px;">
                    ยืนยัน
                </ons-button>
        </div>
    </div>
</td>