<ons-card class="card">
	<ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <i class="material-icons">account_circle</i><!--<span class="txt-important">*</span>-->
            </div>
            <label class="center list-item__center">
                <ons-input id="username-input" float="" maxlength="30" placeholder="ชื่อบัญชี" name="username" style="width:100%;" value="">
                    <input type="text" class="text-input" maxlength="30" placeholder="ชื่อบัญชี" name="username" >
                    <span class="text-input__label">
                        ชื่อบัญชี</span>
                </ons-input>
            </label>
        </ons-list-item>
      <ons-list-item class="input-items list-item p-l-0">
        	<div class="left list-item__left" >
                <i class="material-icons">account_balance</i>
            </div>
            <div class="center list-item__center" onclick="fn.pushPage({'id': 'option.html', 'title': 'ธนาคาร', 'open':'bank_list'}, 'lift-ios')">
                <span id="txt_bank" >เลือกธนาคาร</span>
                <input type="hidden" name="bank" id="bank" value="" />
            </div>
      </ons-list-item>
      <ons-list-item class="input-items list-item p-l-0">
            <div class="left list-item__left">
                <i class="material-icons">account_circle</i><!--<span class="txt-important">*</span>-->
            </div>
            <label class="center list-item__center">
                <ons-input id="username-input" float="" maxlength="30" placeholder="สาขาธนาคาร" name="branch" style="width:100%;" value="">
                    <input type="text" class="text-input" maxlength="30" placeholder="สาขาธนาคาร" name="branch" >
                    <span class="text-input__label">
                        สาขาธนาคาร</span>
                </ons-input>
            </label>
        </ons-list-item>
</ons-card>