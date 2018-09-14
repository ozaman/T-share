<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="ui-mobile landscape min-width-320px min-width-480px min-width-768px min-width-1024px">
<?php 

if($this->Mobile_model->version('iPad')){
    // Code to run for the Apple iOS platform.
$fontmobile=0;
$detectname='iPad';
$menu_ion_class = "icon-menu-ios";
$border_menu_color = "#ccc";
}
if($this->Mobile_model->version('iPhone')){
    // Code to run for the Apple iOS platform.
$fontmobile=0;
$detectname='iPhone';
$menu_ion_class = "icon-menu-ios";
$border_menu_color = "#ccc";
}
if($this->Mobile_model->version('Android')){
    // Code to run for the Apple iOS platform.
$fontmobile=6;
$detectname='Android';
$menu_ion_class = "icon-menu-android";
$border_menu_color = "#eee";
}
else {
$fontmobile=6;	
$detectname='Other';
$menu_ion_class = "icon-menu-ios";
$border_menu_color = "#ccc";
}
$border_menu_color = "border-bottom: 1px solid ".$border_menu_color;
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>T-Share</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!--<link rel="stylesheet" href="front_bank/css/thbanklogos.min.css" id="stylesheet">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/ultimate/flaticon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/airport/flaticon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/payment/css/fontello.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/icomoon/demo-files/demo.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app/css/app-icon.css?v=<?=time()?>">
    <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/font_custom/app-new/css/app-icon.css?v=<?=time()?>">

    <link rel="stylesheet" href="<?=base_url();?>assets/extra.main.css">
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/onsenui.css">
<link rel="stylesheet" href="<?=base_url();?>assets/onsenui/css/onsen-css-components.css">
<script src="<?=base_url();?>assets/onsenui/js/onsenui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<!--<script src="js/jquery.touchSwipe.min.js"></script>-->
<script src="https://www.welovetaxi.com:3443/socket.io/socket.io.js?v=<?=time();?>"></script>
<ons-modal direction="up">
	  <div style="text-align: center">
	    <p>
	      <ons-icon icon="md-spinner" size="28px" spin></ons-icon> Loading...
	    </p>
	  </div>
</ons-modal>
<script>
	
//	alert('<?=$detectname;?>');
	var modal = document.querySelector('ons-modal');
		modal.show();
	var today = "<?=date('Y-m-d');?>";
    var detect_mb = "<?=$detectname;?>";
    var detect_user = $.cookie("detect_user");
   	  var class_user = $.cookie("detect_userclass");
      var username = $.cookie("detect_username");
      console.log(detect_mb+" : "+class_user+" : "+username);
	  if(username=="" || typeof username == 'undefined'){
//	  		window.location = "signin";
			$.cookie("detect_user",'153');
			$.cookie("detect_userclass",'taxi');
			$.cookie("detect_username",'HKT0153');
			location.reload();
	  }else{
	  		username = username.toUpperCase();
	  }
	</script>



<style>
	.icon-menu-ios{
		    margin-left: 7px;
    		padding-right: 10px;
	}
	.icon-menu-android{
		    margin-left: 7px;
    		padding-right: 20px;
	}
</style>
<body style="">

    <ons-navigator id="appNavigator" swipeable swipe-target-width="80px">
        <ons-page>
            <ons-splitter id="appSplitter">
                <ons-splitter-side id="sidemenu" page="sidemenu.html" swipeable side="left" collapse="" width="260px"></ons-splitter-side>
                <ons-splitter-content page="tabbar.html"></ons-splitter-content>
            </ons-splitter>
        </ons-page>
    </ons-navigator>

    <template id="tabbar.html">
        <ons-page id="tabbar-page">
            <ons-toolbar>
                <div class="left">
                    <ons-toolbar-button onclick="fn.toggleMenu()">
                        <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
                    </ons-toolbar-button>
                </div>
                <div class="center">หน้าหลัก</div>
                <div class="right">
                    <ons-toolbar-button onclick="fn.pushPage({'id': 'pf.html', 'title': 'ข้อมูลบัญชี', 'key':'profile'}, 'lift-ios')">
                        <img src="../data/pic/driver/small/<?=$_COOKIE[detect_username];?>.jpg" class="shotcut-profile" />
                    </ons-toolbar-button>
                </div>
            </ons-toolbar>
            <ons-tabbar swipeable id="appTabbar" position="auto">
                <ons-tab label="หน้าหลัก" icon="ion-home" page="home.html" active></ons-tab>
                <ons-tab label="Forms" icon="ion-edit" page="forms.html"></ons-tab>
                <ons-tab label="Animations" icon="ion-film-marker" page="animations.html"></ons-tab>
            </ons-tabbar>

            <script>
                ons.getScriptPage().addEventListener('prechange', function(event) {
        if (event.target.matches('#appTabbar')) {
          event.currentTarget.querySelector('ons-toolbar .center').innerHTML = event.tabItem.getAttribute('label');
        }
      });
    </script>
        </ons-page>
    </template>

    <template id="sidemenu.html">
        <ons-page>
            <div class="profile-pic">
                <img src="https://monaca.io/img/logos/download_image_onsenui_01.png">
            </div>
            <!--<ons-list-title>เมนู</ons-list-title>-->
            <ons-list>
                <ons-list-item expandable>
                    <div class="left">
                        <!--<ons-icon fixed-width class="list-item__icon" icon="ion-edit, material:md-edit"></ons-icon>-->
                        <i class="icon-new-uniF133-2 list-item__icon"></i>
                    </div>
                    <div class="center" onclick="arrowChange('list_profile');">
                        ข้อมูลผู้ใช้งาน
                    </div>
                    <div class="expandable-content" style="padding-left: 60px;" onclick="fn.pushPage({'id': 'pf.html', 'title': 'ข้อมูลบัญชี', 'key':'profile'}, 'lift-ios')">ข้อมูลส่วนตัว</div>
                    <div class="expandable-content" style="padding-left: 60px;">บัญชีธนาคาร</div>
                    <div class="right arr" id="list_profile">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </ons-list-item>
                
                <ons-list-item expandable>
                    <div class="left">
                       <i class="icon-new-uniF10A-9 list-item__icon"></i>
                    </div>
                    <div class="center" onclick="arrowChange('list_car_info');">
                        ข้อมูลรถ
                    </div>
                    <?php 
                    	$this->db->select('id');
						$this->db->where('status = 1 and drivername = '.$_COOKIE['detect_user']);
						$query = $this->db->get('web_carall');
						$num = $query->num_rows();
                    ?>
                    <div class="expandable-content" style="padding-left: 60px;" onclick="myCar();">รถใช้งาน (<?=$num;?> คัน)</div>
                    <div class="expandable-content" style="padding-left: 60px;">เพิ่มรถ</div>
                    <div class="right arr" id="list_car_info">
                         <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </ons-list-item>

                <ons-list-item expandable>
                    <div class="left">
                        <i class="icon-new-uniF121-10 list-item__icon "></i>
                    </div>
                    <div class="center" onclick="arrowChange('list_acc');">
                        บัญชี
                    </div>
                    <div class="expandable-content" style="padding-left: 60px;">รายรับ</div>
                    <div class="expandable-content" style="padding-left: 60px;">ธนาคาร</div>
                    <div class="right arr" id="list_acc">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </ons-list-item>
                <ons-list-item onclick="fn.pushPage({'id': 'qrcode_ref.html', 'title': 'แนะนำเพื่อน'}, 'lift-ios')">
                    <div class="left" style="<?=$border_menu_color;?>">
                        <span class="list-item__icon <?=$menu_ion_class;?>"> <i class="fa fa-qrcode" style="margin-top: 1px !important;"></i></span>
                    </div>
                    <div class="center">
                        แนะนำเพื่อน
                    </div>
                </ons-list-item>
                <ons-list-item onclick="openNotifyline();">
                    <div class="left" style="<?=$border_menu_color;?>">
                        <ons-icon fixed-width class="list-item__icon " icon="fa-link"></ons-icon>
                    </div>
                    <div class="center">
                        แจ้งเตือนผ่านไลน์
                    </div>
                   
                </ons-list-item>
                <ons-list-item onclick="fn.loadLink('https://twitter.com/Onsen_UI')">
                    <div class="left" style="<?=$border_menu_color;?>">
                        <i class="material-icons list-item__icon <?=$menu_ion_class;?>">contact_phone</i>
                    </div>
                    <div class="center">
                        ติดต่อเรา
                    </div>
                   
                </ons-list-item>
                <ons-list-item onclick="createSignOut();">
                    <div class="left" style="<?=$border_menu_color;?>">
                        <i class="icon-new-uniF186 icon_menu list-item__icon"></i>
                    </div>
                    <div class="center">
                        ออกจากระบบ
                    </div>
                    
                </ons-list-item>
            </ons-list>

            <script>
                $(document).ready(function(){
  $('.list-item--expandable').click(function(){
    // alert('sasasa')
    $('.list-item--expandable').removeClass("expanded",2000);
    $(this).addClass("expanded");
});
});
                ons.getScriptPage().onInit = function() {
        // Set ons-splitter-side animation
        this.parentElement.setAttribute('animation', ons.platform.isAndroid() ? 'overlay' : 'reveal');
      };
    </script>

            <style>
                .profile-pic {
        width: 200px;
        background-color: #fff;
        margin: 20px auto 10px;
        border: 1px solid #999;
        border-radius: 4px;
      }

      .profile-pic > img {
        display: block;
        max-width: 100%;
      }

      ons-list-item {
        color: #444;
      }
    </style>
        </ons-page>
    </template>

    <template id="home.html">
        <ons-page>
            <?php include("application/views/main_body_view.php"); ?>
        </ons-page>
    </template>

    <template id="forms.html">
        <ons-page id="forms-page">
            <ons-list>
                <ons-list-header>Text input</ons-list-header>
                <ons-list-item class="input-items">
                    <div class="left">
                        <ons-icon icon="md-face" class="list-item__icon"></ons-icon>
                    </div>
                    <label class="center">
                        <ons-input id="name-input" float maxlength="20" placeholder="Name"></ons-input>
                    </label>
                </ons-list-item>
                <ons-list-item class="input-items">
                    <div class="left">
                        <ons-icon icon="fa-question-circle-o" class="list-item__icon"></ons-icon>
                    </div>
                    <label class="center">
                        <ons-search-input id="search-input" maxlength="20" placeholder="Search"></ons-search-input>
                    </label>
                </ons-list-item>
                <ons-list-item>
                    <div class="right right-label">
                        <span id="name-display">Hello anonymous!</span>
                        <ons-icon icon="fa-hand-spock-o" size="lg" class="right-icon"></ons-icon>
                    </div>
                </ons-list-item>

                <ons-list-header>Switches</ons-list-header>
                <ons-list-item>
                    <label class="center" for="switch1">
                        Switch<span id="switch-status">&nbsp;(on)</span>
                    </label>
                    <div class="right">
                        <ons-switch id="model-switch" input-id="switch1" checked="true"></ons-switch>
                    </div>
                </ons-list-item>
                <ons-list-item>
                    <label id="enabled-label" class="center" for="switch2">
                        Enabled switch
                    </label>
                    <div class="right">
                        <ons-switch id="disabled-switch" input-id="switch2"></ons-switch>
                    </div>
                </ons-list-item>

                <ons-list-header>Select</ons-list-header>
                <ons-list-item>
                    <div class="center">
                        <ons-select id="select-input" style="width: 120px">
                            <option value="Vue">
                                Vue
                            </option>
                            <option value="React">
                                React
                            </option>
                            <option value="Angular">
                                Angular
                            </option>
                        </ons-select>

                    </div>
                    <div class="right right-label">
                        <span id="awesome-platform">Vue&nbsp;</span>is awesome!
                    </div>
                </ons-list-item>

                <ons-list-header>Radio buttons</ons-list-header>
                <ons-list-item tappable>
                    <label class="left">
                        <ons-radio class="radio-fruit" input-id="radio-0" value="Apples"></ons-radio>
                    </label>
                    <label for="radio-0" class="center">Apples</label>
                </ons-list-item>
                <ons-list-item tappable>
                    <label class="left">
                        <ons-radio class="radio-fruit" input-id="radio-1" value="Bananas" checked></ons-radio>
                    </label>
                    <label for="radio-1" class="center">Bananas</label>
                </ons-list-item>
                <ons-list-item tappable modifier="longdivider">
                    <label class="left">
                        <ons-radio class="radio-fruit" input-id="radio-2" value="Oranges"></ons-radio>
                    </label>
                    <label for="radio-2" class="center">Oranges</label>
                </ons-list-item>
                <ons-list-item>
                    <div id="fruit-love" class="center">
                        I love Bananas!
                    </div>
                </ons-list-item>

                <ons-list-header>Checkboxes - <span id="checkboxes-header">Green,Blue</span></ons-list-header>
                <ons-list-item tappable>
                    <label class="left">
                        <ons-checkbox class="checkbox-color" input-id="checkbox-0" value="Red"></ons-checkbox>
                    </label>
                    <label class="center" for="checkbox-0">
                        Red
                    </label>
                </ons-list-item>
                <ons-list-item tappable>
                    <label class="left">
                        <ons-checkbox class="checkbox-color" input-id="checkbox-1" value="Green" checked></ons-checkbox>
                    </label>
                    <label class="center" for="checkbox-1">
                        Green
                    </label>
                </ons-list-item>
                <ons-list-item tappable>
                    <label class="left">
                        <ons-checkbox class="checkbox-color" input-id="checkbox-2" value="Blue" checked></ons-checkbox>
                    </label>
                    <label class="center" for="checkbox-2">
                        Blue
                    </label>
                </ons-list-item>

                <ons-list-header>Range slider</ons-list-header>
                <ons-list-item>
                    Adjust the volume:
                    <ons-row>
                        <ons-col width="40px" style="text-align: center; line-height: 31px;">
                            <ons-icon icon="md-volume-down"></ons-icon>
                        </ons-col>
                        <ons-col>
                            <ons-range id="range-slider" value="25" style="width: 100%;"></ons-range>
                        </ons-col>
                        <ons-col width="40px" style="text-align: center; line-height: 31px;">
                            <ons-icon icon="md-volume-up"></ons-icon>
                        </ons-col>
                    </ons-row>
                    Volume:<span id="volume-value">&nbsp;25</span> <span id="careful-message" style="display: none">&nbsp;(careful, that's loud)</span>
                </ons-list-item>
            </ons-list>

            <script>
                ons.getScriptPage().onInit = function () {
        if (ons.platform.isAndroid()) {
          const inputItems = document.querySelectorAll('.input-items');
          for (i = 0; i < inputItems.length; i++) {
            inputItems[i].hasAttribute('modifier') ?
              inputItems[i].setAttribute('modifier', inputItems[i].getAttribute('modifier') + ' nodivider') :
              inputItems[i].setAttribute('modifier', 'nodivider');
          }
        }
        var nameInput = document.getElementById('name-input');
        var searchInput = document.getElementById('search-input');
        var updateInputs = function (event) {
          nameInput.value = event.target.value;
          searchInput.value = event.target.value;
          document.getElementById('name-display').innerHTML = event.target.value !== '' ? `Hello ${event.target.value}!` : 'Hello anonymous!';
        }
        nameInput.addEventListener('input', updateInputs);
        searchInput.addEventListener('input', updateInputs);
        document.getElementById('model-switch').addEventListener('change', function (event) {
          if (event.value) {
            document.getElementById('switch-status').innerHTML = `&nbsp;(on)`;
            document.getElementById('enabled-label').innerHTML = `Enabled switch`;
            document.getElementById('disabled-switch').disabled = false;
          } else {
            document.getElementById('switch-status').innerHTML = `&nbsp;(off)`;
            document.getElementById('enabled-label').innerHTML = `Disabled switch`;
            document.getElementById('disabled-switch').disabled = true;
          }
        });
        document.getElementById('select-input').addEventListener('change', function (event) {
          document.getElementById('awesome-platform').innerHTML = `${event.target.value}&nbsp;`;
        });
        var currentFruitId = 'radio-1';
        const radios = document.querySelectorAll('.radio-fruit')
        for (var i = 0; i < radios.length; i++) {
          var radio = radios[i];
          radio.addEventListener('change', function (event) {
            if (event.target.id !== currentFruitId) {
              document.getElementById('fruit-love').innerHTML = `I love ${event.target.value}!`;
              document.getElementById(currentFruitId).checked = false;
              currentFruitId = event.target.id;
            }
          })
        }
        var currentColors = ['Green', 'Blue'];
        const checkboxes = document.querySelectorAll('.checkbox-color')
        for (var i = 0; i < checkboxes.length; i++) {
          var checkbox = checkboxes[i];
          checkbox.addEventListener('change', function (event) {
            if (!currentColors.includes(event.target.value)) {
              currentColors.push(event.target.value);
            } else {
              var index = currentColors.indexOf(event.target.value);
              currentColors.splice(index, 1);
            }
            document.getElementById('checkboxes-header').innerHTML = currentColors;
          })
        }
        document.getElementById('range-slider').addEventListener('input', function (event) {
          document.getElementById('volume-value').innerHTML = `&nbsp;${event.target.value}`;
          if (event.target.value > 80) {
            document.getElementById('careful-message').style.display = 'inline-block';
          } else {
            document.getElementById('careful-message').style.display = 'none';
          }
        })
      }
    </script>

            <style>
                .right-icon {
        margin-left: 10px;
      }

      .right-label {
        color: #666;
      }
    </style>
        </ons-page>
    </template>

    <template id="animations.html">
        <ons-page>
            <ons-list>
                <ons-list-header>Transitions</ons-list-header>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'none'}, 'none')">
                    none
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'default'}, 'default')">
                    default
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'slide-ios'}, 'slide-ios')">
                    slide-ios
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'slide-md'}, 'slide-md')">
                    slide-md
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'lift-ios'}, 'lift-ios')">
                    lift-ios
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'lift-md'}, 'lift-md')">
                    lift-md
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'fade-ios'}, 'fade-ios')">
                    fade-ios
                </ons-list-item>
                <ons-list-item modifier="chevron" onclick="fn.pushPage({'id': 'transition.html', 'title': 'fade-md'}, 'fade-md')">
                    fade-md
                </ons-list-item>
            </ons-list>
        </ons-page>
    </template>

    <template id="pf.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center">ข้อมูลบัญชี</div>
            </ons-toolbar>
	            <div id="body_profile_view">
	            	<?php //include("application/views/page/profile_view.php"); ?>
	            </div>
	       
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
    
    <template id="car_manage.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center">ข้อมูลรถ</div>
            </ons-toolbar>
	            <div id="body_car_manage">
	            	
	            </div>
	       <script src="<?=base_url();?>assets/script/car.js"></script>     
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>

    <template id="shopping.html">
        <ons-page>
        
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_shop">
            	<ons-page>
				  <ons-tabbar swipeable position="top">
				    <ons-tab page="shop_manage.html" label="จัดการ" badge="0" >
				    </ons-tab>
				    <ons-tab page="shop_add.html" label="ส่งแขก" active>
				    </ons-tab>
				    <ons-tab page="shop_history.html" label="ประวัติส่งแขก" >
				    </ons-tab>
				  </ons-tabbar>
				</ons-page>
				
				<template id="shop_manage.html">
				  <ons-page id="shop_manage">
				    
				  </ons-page>
				</template>

				<template id="shop_add.html">
				  <ons-page id="shop_add">
				   <div>
				   		<?php include("application/views/shop/shop_add.php"); ?>
				   </div>
				  </ons-page>
				</template>
				
				<template id="shop_history.html">
				  <ons-page id="shop_history">
				    
				  </ons-page>
				</template>
			
            </div>
            <script>
                ons.getScriptPage().onInit = function() {
			    $('ons-tab[page="shop_manage.html"]').attr('badge', $('#number_shop').text());
			    window.fn.showDialog = function(id) {
			        var elem = document.getElementById(id);
			        if (id === 'popover-dialog') {
			            elem.show(infoButton);
			        } else {
			            elem.show();
			            if (id === 'modal-dialog') {
			                clearTimeout(timeoutID);
			                timeoutID = setTimeout(function() {
			                    fn.hideDialog(id)
			                }, 2000);
			            }
			        }
			    };
			    window.fn.hideDialog = function(id) {
			        document.getElementById(id).hide();
			    };
			    this.querySelector('ons-toolbar div.center').textContent = this.data.title;
			}
    </script>
    	<script src="<?=base_url();?>assets/script/shop.js"></script>
        </ons-page>
    </template>
    
    <template id="transfer.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button onclick="$('#check_open_worktbooking').val(0);">กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_transfer">
            	<ons-page>
				  <ons-tabbar swipeable position="top">
				    <ons-tab id="tab-trans_manage" page="transfer_manage.html" label="จัดการ"  >
				    </ons-tab>
				    <ons-tab id="tab-trans_job" page="transfer_job.html" label="ให้บริการรถ" active badge="0" >
				    </ons-tab>
				    <ons-tab id="tab-trans_income" page="transfer_income.html" label="ประวัติ" >
				    </ons-tab>
				  </ons-tabbar>
				</ons-page>

				<template id="transfer_manage.html">
				  <ons-page id="transfer_manage">
				    
				  </ons-page>
				</template>

				<template id="transfer_job.html">
				  <ons-page id="transfer_job">
				   	
				  </ons-page>
				</template>
				
				<template id="transfer_income.html">
				  <ons-page id="transfer_income">
				    <p style="text-align: center;">
				      This is the second page 3.
				    </p>
				  </ons-page>
				</template>
			
				<script>
					document.addEventListener('prechange', function(event) {
						var page_trans = event.tabItem.getAttribute('page');
						if(page_trans=="transfer_manage.html"){
							var url = "page/transfer_manage";
				            $.post(url,function(html){
				            	$('#transfer_manage').html(html);
				            });
						}else if(page_trans=="transfer_income.html"){
							
						}else if(page_trans=="transfer_job.html"){
							/*var url = "page/transfer";
				            $.post(url,function(html){
				            	$('#transfer_job').html(html);
				            });*/
						}
						
				  document.querySelector('ons-toolbar .center')
				    .innerHTML = event.tabItem.getAttribute('label');
				});
				</script>
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
    
    <template id="book_tour.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_transfer">
            	<ons-page>
				  <ons-tabbar swipeable position="top">
				    <ons-tab page="tab1.html" label="ประวัติ"  >
				    </ons-tab>
				    <ons-tab page="tab2.html" label="จองทัวร์" active>
				    </ons-tab>
				    <ons-tab page="tab3.html" label="รายจ่าย" >
				    </ons-tab>
				  </ons-tabbar>
				</ons-page>

				<template id="tab1.html">
				  <ons-page id="Tab1">
				    <p style="text-align: center;">
				      This is the first page 1.
				    </p>
				  </ons-page>
				</template>

				<template id="tab2.html">
				  <ons-page id="Tab2">
				    <p style="text-align: center;">
				      This is the second page 2.
				    </p>
				  </ons-page>
				</template>
				
				<template id="tab3.html">
				  <ons-page id="Tab3">
				    <p style="text-align: center;">
				      This is the second page 3.
				    </p>
				  </ons-page>
				</template>
			
				<script>
					document.addEventListener('prechange', function(event) {
				  document.querySelector('ons-toolbar .center')
				    .innerHTML = event.tabItem.getAttribute('label');
				});
				</script>
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
    
    <template id="book_trans.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_transfer">
            	<ons-page>
				  <ons-tabbar swipeable position="top">
				    <ons-tab page="tab1.html" label="ประวัติ"  >
				    </ons-tab>
				    <ons-tab page="tab2.html" label="จองรถ" active>
				    </ons-tab>
				    <ons-tab page="tab3.html" label="รายจ่าย" >
				    </ons-tab>
				  </ons-tabbar>
				</ons-page>

				<template id="tab1.html">
				  <ons-page id="Tab1">
				    <p style="text-align: center;">
				      This is the first page 1.
				    </p>
				  </ons-page>
				</template>

				<template id="tab2.html">
				  <ons-page id="Tab2">
				    <div></div>
				  </ons-page>
				</template>
				
				<template id="tab3.html">
				  <ons-page id="Tab3">
				    <p style="text-align: center;">
				      This is the second page 3.
				    </p>
				  </ons-page>
				</template>
			
				<script>
					document.addEventListener('prechange', function(event) {
						console.log(event.page)
				  document.querySelector('ons-toolbar .center')
				    .innerHTML = event.tabItem.getAttribute('label');
				});
				 
				</script>
            </div>
            
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
    
    <template id="popup1.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_popup1">
            	
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
    
    <template id="popup2.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_popup2">
            	
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>

	<template id="qrcode_ref.html">
        <ons-page>
            <ons-toolbar>
                <div class="left">
                    <ons-back-button>กลับ</ons-back-button>
                </div>
                <div class="center"></div>
            </ons-toolbar>
            <div id="body_qrcode">
            	<?php include("application/views/page/qrcode_ref.php"); ?>
            </div>
            <script>
                ons.getScriptPage().onInit = function () {
        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
      }
    </script>
        </ons-page>
    </template>
    
    <style>
        ons-splitter-side[animation=overlay] {
    border-left: 1px solid #bbb;
  }
</style>

    <input type="hidden" id="set_lng_cookies" value="th" />
    <input type="hidden" id="check_open_worktbooking" value="0" />
    <input type="hidden" id="check_open_shop_id" value="0" />
    
    <input type="hidden" id="lat" value="0" />
    <input type="hidden" id="lng" value="0" />
    
    <template id="shop_add-dialog.html">
	  <ons-alert-dialog id="shop_add-alert-dialog" modifier="rowfooter">
	    <div class="alert-dialog-title" id="submit-dialog-title">คุณแน่ใจหรือไม่</div>
	    <div class="alert-dialog-content">
	       ว่าต้องการบันทึกข้อมูลนี้
	    </div>
	    <div class="alert-dialog-footer">
	      <ons-alert-dialog-button onclick="cancelShop()">ยกเลิก</ons-alert-dialog-button>
	      <ons-alert-dialog-button onclick="saveShop()">บันทึก</ons-alert-dialog-button>
	    </div>
	  </ons-alert-dialog>
	</template>
	
	<template id="signout-dialog.html">
	  <ons-alert-dialog id="signout-alert-dialog" modifier="rowfooter">
	    <div class="alert-dialog-title" id="signout-submit-dialog-title">คุณแน่ใจหรือไม่</div>
	    <div class="alert-dialog-content">
	       ว่าต้องการออกจากระบบ
	    </div>
	    <div class="alert-dialog-footer">
	      <ons-alert-dialog-button onclick="$('#signout-alert-dialog').hide();">ยกเลิก</ons-alert-dialog-button>
	      <ons-alert-dialog-button onclick="logOut()">ยืนยัน</ons-alert-dialog-button>
	    </div>
	  </ons-alert-dialog>
	</template>
    
    <template id="option.html">
	  <ons-page>
	    <ons-toolbar>
	      <div class="left">
	        <ons-back-button class="option-back">กลับ</ons-back-button>
	      </div>
	      <div class="center"></div>
	    </ons-toolbar>
	    <div id="body_option">
	    	
	    </div>
	    <script>
	      ons.getScriptPage().onInit = function () {
	        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
	      }
	    </script>
	  </ons-page>
</template>
    
    <template id="popup_shop_checkin.html">
	  <ons-page>
	    <ons-toolbar>
	      <div class="left">
	        <ons-back-button class="option-back">กลับ</ons-back-button>
	      </div>
	      <div class="center"></div>
	    </ons-toolbar>
	    <input type="hidden" id="type_checkin" value="xx" />
	    <div id="body_shop_checkin">
	    	
	    </div>
	    <script>
	      ons.getScriptPage().onInit = function () {
	      	
	        this.querySelector('ons-toolbar div.center').textContent = this.data.title;
	      }
	    </script>
	  </ons-page>
    </template>
    
    <ons-dialog id="cancel-shop-dialog" cancelable>
      <!-- Optional page. This could contain a Navigator as well. -->
      <ons-page>
        <ons-toolbar>
          <div class="center">ยกเลิกรายการ</div>
        </ons-toolbar>
        <p style="text-align: center">กรุณาเลือกเหตุผลที่จะยกเลิก</p>
        <form action="#" style="margin-left: 25px;" id="form_type_cancel">
        <input type="hidden" value="0" id="order_id_cancel" name="order_id_cancel"/>
        	<div>
			  <!-- <p class="checkradio"><input class="with-gap" name="type" type="radio" id="test1" value="1"><label for="test1">แขกลงทะเบียนไม่ได้</label></p>
			   <input type="hidden" value="แขกลงทะเบียนไม่ได้" name="typname_1">
			   <p class="checkradio"><input class="with-gap" name="type" type="radio" id="test2" value="2"><label for="test2">แขกไม่ไป</label></p>
			   <input type="hidden" value="แขกไม่ไป" name="typname_2">
			   <p class="checkradio"><input class="with-gap" name="type" type="radio" id="test3" value="3"><label for="test3">เลือกสถานที่ผิด</label></p>-->
			   <input type="hidden" name="typname_1" value="แขกลงทะเบียนไม่ได้" />
			   <input type="hidden" name="typname_2"  value="แขกไม่ไป" />
			   <input type="hidden" name="typname_3" value="เลือกสถานที่ผิด" />
			   <ons-list-item tappable>
		        <label class="left">
		          <ons-radio class="radio-fruit" input-id="test1" value="1" name="type_cancel"></ons-radio>
		        </label>
		        <label for="test1" class="center">แขกลงทะเบียนไม่ได้</label>
		      </ons-list-item>
		      <ons-list-item tappable>
		        <label class="left">
		          <ons-radio class="radio-fruit" input-id="test2" value="2" name="type_cancel"></ons-radio>
		        </label>
		        <label for="test2" class="center">แขกไม่ไป</label>
		      </ons-list-item>
		      <ons-list-item tappable modifier="longdivider">
		        <label class="left">
		          <ons-radio class="radio-fruit" input-id="test3" value="3" name="type_cancel"></ons-radio>
		        </label>
		        <label for="test3" class="center">เลือกสถานที่ผิด</label>
		      </ons-list-item>
			   <!--<input type="hidden" value="เลือกสถานที่ผิด" name="typname_3">-->
		    </div>
		</form>
        <p style="text-align: center">
          <ons-button modifier="light" onclick="fn.hideDialog('cancel-shop-dialog')">ปิด</ons-button>
          <ons-button class="button--outline" onclick="submitCancel();">ยืนยัน</ons-button>
        </p>
      </ons-page>
    </ons-dialog>
    
    
</body>

</html>
<script>
    if ('<?=$_GET[status];?>' != "his") { //เช็คว่าสเตตัสที่ส่งมาเป็น ประวัติ หรือ กำลังจัดการ
        $(window).load(function() {
//            $("#load_material").fadeOut(500);
			modal.hide();
            setTimeout(function() {
//            	alert(class_user);
                sendTagIOS(class_user, username);
            }, 1500);
        });
    }
</script>
<script>
    if (detect_mb == "Android") {
        sendTagOs(class_user, username);
    }

    function sendTagOs(txt, username) {
        if (typeof Android !== 'undefined') {
            Android.sendTag(txt, username);
        }
    }

    function deleteTagOs(txt) {
        if (typeof Android !== 'undefined') {
            Android.deleteTag(txt);
        }
    }
</script>
<script>
    window.fn = {};

    window.fn.toggleMenu = function() {
        document.getElementById('appSplitter').left.toggle();
    };

    window.fn.loadView = function(index) {
        document.getElementById('appTabbar').setActiveTab(index);
        document.getElementById('sidemenu').close();
    };

    window.fn.loadLink = function(url) {
        window.open(url, '_blank');
    };

    window.fn.pushPage = function(page, anim) {
        console.log(page);
        if (page.key == "shop") {
          /*  var url = "page/shop";
            $.post(url,function(html){
            	$('#body_popup1').html(html);
            });*/
        }else if(page.key == "transfer"){
			var url = "page/transfer";
			$('#check_open_worktbooking').val(1);
            $.post(url,function(html){
            	$('#transfer_job').html(html);
            });
		}else if(page.key == "profile"){
			var url = "page/profile_edit";

            $.post(url,function(html){
            	$('#body_profile_view').html(html);
            });
		}
        
        if(page.id=="option.html"){
			console.log("option");
			if(page.open=="car_brand"){
				
				$.ajax({
	            url: "main/data_car_brand", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {
	            	var d1 = [],d2 = [];
	            	$.each(res, function( index, value ) {
					  	if(value.popular>0){
							d1.push(value);
						}else{
							d2.push(value);
						}
					});
					var param = { data2 : d2, data1 : d1};
					console.log(param);
	                $.post("component/cpn_car_brand",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
				
			}
			else if(page.open=="car_type"){
				
				$.ajax({
	            url: "main/data_car_type", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_type",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
				
			}
			else if(page.open=="car_color"){
				$.ajax({
	            url: "main/data_car_color", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_color?plate=0",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="plate_color"){
				$.ajax({
	            url: "main/data_car_plate", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_car_plate",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="car_province"){
				$.ajax({
	            url: "main/data_car_province", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
	            	console.log(res);
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_user_province?type=car",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
			else if(page.open=="user_province"){
				$.ajax({
	            url: "main/data_user_province", // point to server-side PHP script 
	            dataType: 'json', // what to expect back from the PHP script, if anything
	            type: 'post',
	            success: function(res) {	
	            	console.log(res);
					var param = { data : res };
					console.log(param);
	                $.post("component/cpn_user_province?type=user",param,function(el){
						$('#body_option').html(el);
					});
	             }
	        	});
			}
		}
        if (anim) {
            document.getElementById('appNavigator').pushPage(page.id, {
                data: {
                    title: page.title
                },
                animation: anim
            });
        } else {
            document.getElementById('appNavigator').pushPage(page.id, {
                data: {
                    title: page.title
                }
            });
        }
    };

    function language(lng) {
        console.log(lng);
        setCookie("lng", lng, 1);
        window.location.reload();
    }

    function GohomePage() {
        $("#load_material").fadeIn();
        console.log('GohomePage Run');
        $('#load_mod_data').html(load_main_mod);
        window.location = "index.php";
    }

    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    var check_new_user = '<?=$_GET[check_new_user];?>';
    var regis_linenoti = '<?=$_GET[regis];?>';

    console.log(regis_linenoti)
    console.log('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++')
    //                                                alert(check_new_user);
    if (check_new_user != "") {
        $("#main_load_mod_popup").toggle();
        var url_load = "load_page_mod.php?name=user&file=index&check_new_user=" + check_new_user;
        $('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load);
    }
    if (regis_linenoti != "") {
        $("#main_load_mod_popup").toggle();
        var url_load = "load_page_mod.php?name=user&file=notiline&regis=linenoti&state=one";
        $('#load_mod_popup').html(load_main_mod);
        $('#load_mod_popup').load(url_load);
    }
    
    function arrowChange(id){
    	
    	var check = $('#'+id+' i').hasClass('fa-chevron-down');
    	console.log(id+' : '+check);
		if(check==true){
			$('#'+id+' i').removeClass('fa-chevron-down');
			$('#'+id+' i').addClass('fa-chevron-up');
		}else{
			$('#'+id+' i').addClass('fa-chevron-down');
			$('#'+id+' i').removeClass('fa-chevron-up');
		}
		
		
		$('.arr').each (function() {
//			console.log($(this).attr('id'));
			if($(this).attr('id')==id){
//				console.log(1);
			}else{
				$(this).find('i').removeClass('fa-chevron-up');
				$(this).find('i').addClass('fa-chevron-down');
			}
		  	
		}); 
//		$( ".arr i" ).not( document.getElementById( id ) ).removeClass('fa-chevron-up');
//		$( ".arr i" ).not( document.getElementById( id ) ).addClass('fa-chevron-down');
	}
</script>

<!-- Pricing Tables -->
<div class="hiddendiv common"></div>
<div class="drag-target" data-sidenav="slide-out" style="touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); width: 10px; left: 0px;"></div>
<?php   $lng_map = $google_map_api_lng;?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90&libraries=places&language=<?= $lng_map; ?>&v=<?= time(); ?>"></script>
<script>
    function sendTagIOS(classname, username) {
        var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
        if (iOS == true) {
            var url_xcode = "send://ios?class=" + classname + "&username=" + username + "&test=0";
            console.log(url_xcode);
            window.location = url_xcode;
        }
    }

    function deleteTagIOS(classname, username) {
        var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
        if (iOS == true) {
            var url_xcode = "delete://ios?class=" + classname + "&username=" + username + "&test=0";
            console.log(url_xcode);
            window.location = url_xcode;
        }
    }

	function createSignOut(){
		var dialog = document.getElementById('signout-alert-dialog');

            if (dialog) {
                dialog.show();
            } else {
                ons.createElement('signout-dialog.html', {
                        append: true
                    })
                    .then(function(dialog) {
                        dialog.show();
                    });
            }
	}
    
    function logOut() {
        		  $('#signout-alert-dialog').hide();
//                $.post('signin/signout', function() {
                
                    $.cookie("detect_user", "", {
                        path: '/'
                    });
                    $.cookie("detect_userclass", "", {
                        path: '/'
                    });
                    $.cookie("detect_username", "", {
                        path: '/'
                    });
                    ons.notification.alert({message: 'ออกจากระบบสำเร็จ',title:"สำเร็จ",buttonLabel:"ปิด"})
											  .then(function() {
											   		
											   		deleteTagOs("Test Text");
                        							deleteTagIOS(class_user, username);
                        							location.reload();
                        							
											  });
                    /*setTimeout(function() {

                        deleteTagOs("Test Text");
                        deleteTagIOS(class_user, username);
                        window.location.href = "material/login/index.php";
                        //						    window.location.href = "signin.php";
                    }, 1000);*/
//                });
       
    }
    function openNotifyline(){
    location.href="https://www.welovetaxi.com/app/TShare_new/index.php?regis=linenoti&scope=notify&state=one"
  }
</script>
<script src="assets/custom.js"></script>