<div id="search-raeltime" >
            <div class="" id="to-remove-class" >
                <div style="position: absolute;margin-top: 10px;">
                <div style="width: 10px;
    height: 10px;
    border-radius: 1px;
    background: #555;"></div>
    <div style="width: 2px;
    height: 42px;
    background: #fff;margin-left: 4px;"></div>
    <div style="width: 10px;
    height: 10px;
    border-radius: 1px;
    background: #3b5998;"></div>
                </div>
                <div class="" style="    margin-left: 25px;">
               <!-- <div id="out-search" onclick="outSearchRealtime();" style="position: absolute;font-weight: 600;height: 100%;display: none;">
                <i class="material-icons" style="margin-top: 30px;" >chevron_left</i>
                </div> -->
                
                    <div class="box-search" id='boxRealtime' >
                      <!-- <button class="btn btn-success btn-xs" id="delete_text" style=" color: #fff; z-index: 1;display:none;   right: 25px; padding: 6px; position: absolute;  background-color: #3b5998;    margin: 5px 0; width: 25px;"><span>X</span></button>-->
                        <input type='text' class=""    placeholder="<? echo $lag_from_txt;?>"  id='current' style="    margin-bottom: 10px;border: 1px solid #3b5998;padding: 8px; width: 100%;background: #fff;display:nones;color:#333;border-radius: 25px"/>
                        
                            <!-- <div style="border-bottom: 1px solid #333;display:nones;"></div> -->
                          
                                  
                    </div>
                    <div class="box-searchto" id='boxRealtimeto' style="display:nones">
                                   
                            <input type='text' class=""  placeholder="<? echo $lag_go_txt;?>" id="pac-input"  
                            style="border: 1px solid #3b5998; padding: 8px; width: 100%;  background: #fff; margin: auto;  color: #333;  border-radius: 25px" /> 
                    </div>
                    <div id="appendBox"></div>
                    <!-- <div id="appendBox2" style="border-radius: 25px;"></div> -->
                    
                    
                </div>
            </div>
            <input type="hidden" id="chk_val_search" value="0" />
            <input type="hidden" id="chk_val_boxsearch" value="0" />
            <input type="hidden" id="mapZ" value="0"/>
        </div>
<div id="map" style="width: 100%;height: 100vh;"></div>
<script src="<?=base_url();?>assets/script/booking_main.js?v=<?=time();?>"></script>

<script src="<?=base_url();?>assets/script/map.js?v=<?=time();?>"></script>