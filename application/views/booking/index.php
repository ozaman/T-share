 <script src="https://apis.google.com/js/api:client.js"></script>
 <div id="popup-login" style="display: none;">
 	<div style="background: #3b5998;
 	color: #fff;
 	padding: 18px;
 	text-align: center;
 	font-size: 19px;
 	position: fixed;
 	width: 100%;
 	z-index: 302;">

 	<span class="lng-login">  เข้าสู่ระบบ</span>

 	<i class="material-icons close_login ">close</i>

 </div>
 <div class="box-popup-login" >

            <!-- <div style="border-bottom: 1px solid #ddd; text-align: center; padding: 20px 10px; font-size: 18px; color: #fff; background: #3b5998;font-weight: 500" class="lng-omise-gateway">
            </div> -->  
            
            
            <div style="padding: 20px;padding-top:100px">
            	<input type="hidden" id="by" value="<?=$by;?>"/>
            	<input type="hidden" id="data" value="<?=$data;?>"/>
            	<input type="hidden" id="from" value="<?=$from;?>"/>
            	<input type="hidden" id="to" value="<?=$to;?>"/>
            	<input type="hidden" id="lat_f" value="<?=$lat_f;?>"/>
            	<input type="hidden" id="lng_f" value="<?=$lng_f;?>"/>
            	<input type="hidden" id="lat_t" value="<?=$lat_t;?>"/>
            	<input type="hidden" id="lng_t" value="<?=$lng_t;?>"/>
            	<input type="hidden" id="book" value="<?=$book;?>"/>


            	<section style="position: relative;">    
    <!-- <div class="header " data-parallax="true" >
        <nav class="navbar  navbar-color-on-scroll" id="sectionsNav">
            <div class="container" >
                <div class="navbar-header">

                   
                </div>            
            </div>
        </nav>
        
    </div> -->

    <!-- <div class="container"> -->
    	<div class="col-md-6" id="box-left" >
    		<div class="box-signup" style="display: none;">
    			<div id="section_title" class="section_title">
    				<h3 id="title-regis" class="lng-sign-create"></h3>                
    				<h4 style="font-size: 14px;" class="lng-what-is-your-email"></h4>
    			</div>
    			<div class="row">
    				<div class="col-sm-8 " style="padding:0;    margin-top: 20px;">
    					<div class="col-md-12">
    						<div class="input-group">
    							<span class="input-group-addon">
    								<i class="material-icons">face</i>
    							</span>
                                <!-- <button class="btn btn-warning btn-sm" id="checkmail" style="position: absolute; right: 0; z-index: 100;  margin-top: 2px; padding: 5px 10px;border-radius: 15px;">
                                    <span class="lng-check"></span>
                                </button> -->
                                <div class="form-group label-floating is-empty">
                                	<label class="control-label"> 
                                		<span class="lng-email"></span> 

                                	</label>
                                	<input name="firstname" required="True" type="email" class="form-control" id="username-signup">
                                	<span class="material-input"></span>
                                </div>
                            </div>
                            <div class="input-group">
                            	<span class="input-group-addon" style="padding-top: 0">
                            		<i class="material-icons">lock_outline</i>
                            	</span>
                            	<div class="form-group label-floating is-empty">
                            		<label class="control-label"><span class="lng-password"></span>
                            			<!-- <small>(required)</small> -->
                            		</label>
                            		<input name="lastname" type="password" class="form-control" id="password-signup">
                            		<span class="material-input"></span>
                            	</div>
                            </div>
                            <div class="lng_email_have" style="text-align: center;color:red;display: none;"></div>
                            <div class="lng_email_available"  style="text-align: center;color:#2c9930;display: none;"></div>
                            


                        </div>

                        <div class="col-md-12">
                        	<div class="btn-signup" style="" id="registered" ><span class="lng-sign-in"></span></div>
                        </div>
                        <div class="col2">
                        	<div class="col-sign">
                        		<div class="text-sign" >
                        			<span class="lng-have-member"></span>
                        			<a class="mtm sign-up" id="sign-in"  onclick="sign_in()" style="cursor: pointer;">
                        				<span class="lng-registered-customers"></span>
                        			</a>
                        		</div>
                        		<div id="status"></div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-signin">
                    <!-- <div class="card-header text-center" data-background-color="green">
                        <h4 class="card-title" style="margin-bottom: 20px;" >
                            <span class="lng-login"></span>
                        </h4>                                       
                    </div> -->
                    <form>
                    	<div class="row">
                    		<div class="col-sm-8 " style="padding: 0" >
                    			<div class="col-md-12">
                    				<div class="input-group">
                    					<span class="input-group-addon">
                    						<i class="material-icons">face</i>
                    					</span>
                    					<div class="form-group label-floating">
                    						<label class="control-label"><span class="lng-email"> </span>

                    						</label>
                    						<input  required="True" type="email"  class="form-control" id="username" size="80">
                    					</div>
                    				</div>                                       
                    				<div class="input-group">
                    					<span class="input-group-addon">
                    						<i class="material-icons">lock_outline</i>
                    					</span>
                    					<div class="form-group label-floating">
                    						<label class="control-label"><span class="lng-password"></span></label>
                    						<input type="password" class="form-control" id="password" >
                    					</div>
                    				</div>
                    				<div id="message" style="text-align: center;"></div>
                    			</div>
                    			<div class="col-md-12">
                    				<div  type="submit" class=" btn-login " id="login" style="">
                    					<span class="lng-login"> </span>
                    				</div>
                    			</div>

                    			<div class="col2">
                    				<div class="text-sign" >
                    					<span class="lng-not-member"></span>
                    					<a class="sign-up" id="sign-up" onclick="sign_up()" style="cursor: pointer;" >
                    						<span class="lng-sign-up-now"></span>
                    					</a>
                    				</div>
                    			</div>
                    		</div>
                    	</div> 
                    </form>
                </div>
            </div>

            <div class="col-md-6" ">
            	<div class="box-regispro" style="display: none;">
            		<h3 id="title-info" class="lng-why-become"></h3>
            		<div class="special">
            			<div class="box-icon">
            				<i class="fa fa-tags" style="font-size: 30px;"></i>
            			</div>
            			<h4 class="lng-special-product"></h4>
            			<p class="lng_get_lower_price">You'll get lower price for every Product booking, as a member.</p>
            		</div>
            		<div class="exclusive">
            			<div class="box-icon">
            				<i class="fa fa-user-md" aria-hidden="true" style="font-size: 30px;"></i>
            			</div>               
            			<h4 class="lng-exclusive-discount"></h4>
            			<p class="lng_get_latest_promo">You'll get the latest promo info and special member discount.</p>
            		</div>
            		<div class="fast">
            			<div class="box-icon">
            				<i class="fa fa-gavel" aria-hidden="true" id="special" style="font-size: 30px;"></i>
            			</div>              
            			<h4 class="lng-fast-booking"></h4>
            			<p class="lng_member_using">As a member using Go HolidayQuick, your booking is our priority.</p>
            		</div>
            	</div>

            	<div class="log-social box-signin">
            		<div class="unit social-column">
            			<div class="social-inner">
            				<div class="fb-wrapper">
            					<a id="facebook-login-button"  class="fb-auth inner facebook-login-auth" scope="public_profile,email" onclick="login();" return false>
            						<!-- <i class=" fa fa-facebook-official " style="font-size: 36px; position: absolute; left: 16px;"></i> -->
            						<div class=" pull-left" style=" position: absolute; left: 20px; width: 35px; height: 35px; color: #fff; border-radius: 50%; background: #3b5998;">
            							<i class="fa fa-facebook"> </i>
            						</div>
            						<span>Facebook</span>
            					</a>
            				</div>

            				<div class="google-wrapper">
            					<div id="gSignInWrapper">
            						<!--<span class="label">Sign in with:</span>-->
            						<div id="customBtn" class="google-auth inner google-login-auth">
            							<div class="" style="position: absolute; left: 20px; width: 35px; height: 35px; color: #fff; border-radius: 50%; background: #dd4b39;">
            								<i class="fa fa-google"> </i>
            							</div>
            							<!-- <i class="fa fa-google-plus-square" style="font-size: 36px; position: absolute; left: 16px;"></i> -->
            							<span >Google</span>
            						</div>
            					</div>
                               <!-- <div>
                                    <a id="google-login-button"  class="google-auth inner google-login-auth" >
                                        <i class="fa fa-google-plus-square" style="font-size: 36px; position: absolute; left: 16px;"></i>
                                        <span>Google</span>
                                    </a>
                                </div>-->
                            </div>
                            <div style="margin-top: 30px;">
                            	<div class=" btn-foget-pass " id="foget-pass" style="">
                            		<span class="lng-foget-pass">  ลืมรหัสผ่าน</span>
                            	</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->


        </section>


    </div>
</div>
</div>
<style>
#popup-login{
	z-index: 301; 
	position: fixed; 
    /* width: 100vw; 
    height: 100vh;  */
    left: 0px; top: 0px; 
    /* background: rgba(0, 0, 0, 0.59); */
    display:none;
    -webkit-overflow-scrolling: touch;
}
.box-popup-login{
	height: 92vh;
	/* border-radius: 4px; */
	background: #fff;
	min-width: 100%;
	/* height: auto; */
	left: 50vw;
	top: 45vh;
	/* padding-top: 50px; */
	transform: translate(-50%,-50%);
	position: fixed;
	z-index: 301;
	overflow-y: scroll;
	-webkit-overflow-scrolling: touch;
}
</style>
<div id="foget-password" style="display: none;">
	<div class="box-in-foget" >
		<div style="background: #3b5998; color: #fff; padding: 18px; text-align: center; font-size: 19px;   margin-bottom: 10px;">

			<span style="text-align: center;" class="lng-foget-pass">ลืมรหัสผ่าน </span>
			<i class="material-icons btn-close" onclick="btn_close('forgetpass')">close</i>


		</div>
		<div style="padding: 12px;">
			<div class="col-md-12" id="forget"> 

				<div style="margin-top: 50px; font-size: 15px; color: #333333;margin-bottom: 10px;">
					<span class="lng-please-input-email">Please input your email </span>
				</div>
				<div class="input-group">
					<span class="input-group-addon">
						<i class="material-icons">face</i>
					</span>   
					<div class="form-group label-floating is-empty">
						<label class="control-label"><span class="lng-email"></span></label>
						<input type="email" class="form-control" id="email-forget" size="80">
						<span class="material-input"></span>


					</div>  
					<div  class="btn-send lng-send" style="padding: 12px 20px;" ></div>   
				</div>
			</div>
			<div id="check-email" style="text-align:center;display:none;margin-top: 50px; font-size: 15px; color: #333333;  margin-bottom: 10px;">
				<span>Please check your email </span>
			</div>

		</div>
	</div>
</div>


<div id="get_html_book" style="display: none;">
	<div class="get_html_pop_in">               
		<div class="get_html_pop_ln">
			<div class="btn_back_book" style="display: block;text-align: center;
			left: 9vw;
			overflow: hidden;
			transform: translate(-50%, -50%);

			top: 30px;
			/* z-index: 200; */
			width: 38px;
			height: 38px;
			border-radius: 100%;
			box-shadow: #3b5998 0px 1px 4px;
			z-index: 262;
			cursor: pointer;
			position: absolute;
			padding: 8px;
			background: rgb(255, 255, 255);
			color: #3b5998;
			font-size: 30px;">
			<i class="material-icons" style="">reply_all</i>
			<!-- <i class="fa fa-angle-double-left" style=""></i> -->
			<!-- <i class="material-icons" style="color: rgb(22, 179, 177); font-size: 35px;">keyboard_arrow_down</i> -->
		</div>
		<?php include "book.php"; ?>
	</div>            
</div>
</div>
<style>
input::-webkit-input-placeholder,
textarea::-webkit-input-placeholder {
	color: #333 !important;
}
input:-moz-placeholder,
textarea:-moz-placeholder {
	color: #333 !important;
}
input::-moz-placeholder,
textarea::-moz-placeholder {
	color: #333 !important;
}
input:-ms-input-placeholder,
textarea:-ms-input-placeholder {
	color: #333 !important;
}
.terms-of-use {
	padding: 10px;
	border-radius: 15px;
	font-size: 16px;
	border: 1px solid #3b5998;
	margin-top: 5px;
	background-color: #fff;
}
.addbook{
	background: #16B3B1;
	width: 100%;
	color: rgb(255, 255, 255);
	text-align: center;
	padding: 10px;
	font-size: 17px;
	display: none;
}
/* .btn-close{
    width: 75px;
    background: #4BB1C1;
    text-transform: uppercase;
    text-align: center;
    color: #fff;
    position: absolute;
    right: 15px;
    padding: 8px 20px;
    bottom: 15px;
    border-radius: 25px;
    } */
    .checkbox label, .radio label, label{
    	font-size: 15px !important;
    	line-height: 1.42857;
    	color: #333 !important;
    	font-weight: 400;
    }
    .form-group .checkbox label, .form-group .radio label, .form-group label{
    	font-size: 15px !important; 
    	color: #333 !important;
    }
    .checkbox input[type=checkbox]:checked+.checkbox-material .check {
    	background: #3b5998 !important;
    }
    #acceptancecheck span{
    	font-size:15px;
    }
    .checkbox .checkbox-material .check {
    	position: relative;
    	display: inline-block;
    	width: 20px;
    	height: 20px;
    	border: 2px solid #3b5998!important;
    	overflow: hidden;
    	z-index: 1;
    	border-radius: 5px;
    }
    .textInput{
    	font-size: 15px;
    	color: #333;
    	border: 1px solid #dfdfdf;
    	padding: 8px;
    	margin: 8px 0;
    	width: 100%;
    	border-radius: 25px;
    }
    .card {

    	margin-bottom: 15px !important;
    }
    .row {
    	margin-right: -12px !important;
    	margin-left: -12px !important;
    	margin-bottom: 4px;
    }
    .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {

    	color: #FFF;
    	box-shadow: none;
    }
    .card {
    	border-radius: 15px !important;

    }
    .wizard-card{
    	margin-bottom: 0;

    }
    #numsumprice {
    	color: #16B3B1;
    	font-weight: 600;
    }
    .sumprice {
    	position: relative !important;
    	position: relative;
    	color: #333;
    	font-weight: 600;
    	text-align: center;
    	font-size: 18px;
    	/* border: 1px dashed #45c3da; */
    	display: inline-block;
    	padding: 12px 0;
    	border-radius: 3px;
    }
    .box-list-cars {
    	padding-top: 15px;
    	display: block;
    	padding-bottom: 23px;
    	/* background: #fff; */
    	/* top: 0; */
    	/* right: 0; */
    	/* bottom: 0; */
    	/* left: 0; */
    	text-align: center;
    	color: #000;
    	font-size: 16px;
    }
    #title-around {
    	display: inline-block;
    }
/*#num2 {
    border: 1px solid #9E9E9E;
    padding: 0 5px !important;
    }*/
    #title-car {
    	margin-left: 6%;
    	display: inline-block;
    }
    #cars {
    	float: right;
    	background: #fff;
    	border: 1px solid #9E9E9E !important;
    	border-radius: 3px;
    	padding: 7px 9px;
    	font-weight: 500;
    }
    .form-group {
    	padding-bottom: 0;
    	margin: 0;
    }
    #calen{
    	position: absolute;
    	color: #9E9E9E;
    	right: 0;
    	margin-top: -30px;
    	margin-right: 20px;

    }
    .wizard-card{
    	box-shadow: none;
    }
    .box-program{
    	border-top: dashed 2px #3b5998;
    	border-bottom: dashed 2px #3b5998;
    	text-align: center;
    	/* background: #ff9800; */
    	padding: 12px 2px;
    	font-weight: 400;
    	/* border-radius: 4px; */
    	margin-bottom: 20px;
    }
    table{
    	font-size: 15px;
    }
</style>


<style>
.moving-tab:after{
    /*border-bottom: 11px solid #FFFFFF;
    border-left: 11px solid transparent;
    border-right: 11px solid transparent;
    content: "";
    display: inline-block;
    position: absolute;
    left: 50px;
    top: -10px;*/
}
.nav>li>a{
	padding: 0px;
}
.toppic p {
	display: inline-block;
}
.toppic p {
	/*font-weight: 600;*/
	color: #9E9E9E;
	width: 120px;
	display: inline-block;
}
.toppic span {
	color: #000;
	font-size: 13px;
	/*font-weight: 600;*/
}
.firstname {
	display: inline-block;
	color: #9E9E9E;
	/*font-weight: 600;*/
}
.orderBoxdetail {
	/* border-top: 1px #ddd solid; */
	width: 100%;
	padding: 20px 0;
	border-radius: 4px;
	position: relative;
	/*margin-bottom: 30px;*/
}
.phone {
	display: inline-block;
	color: #9E9E9E;
	/*font-weight: 600;*/
}
.email {
	display: inline-block;
	color: #9E9E9E;
	/*font-weight: 600;*/
}
.lastname {
	display: inline-block;
	color: #9E9E9E;
	/*font-weight: 600;*/
}
.box-list-summery {
	/*border: solid 1px #ccc; */
	/* top: 74px; */
	padding: 2px 10px;
	width: 100%;
	position: relative;
	margin-bottom: 50px;
}
.topic_ens {
	color: #616161;
	font-size: 16px;
	letter-spacing: 1px;
	margin-bottom: 30px;
}
.adult {
	/*margin-left: 35%;*/
	color: #999;
	display: block;
}
#book-info {
	width: 75px;
	margin-right: 10px;
	display: inline-block;
}
.child {
	display: block;
	color: #999;
	/*margin-left: 35%;*/
}
.pricec {
	color: #999;
	margin-top: 20px;
	/*margin-left: 35%;*/
	margin-bottom: 20px;
}
.summtotal {
	/*margin-left: 35%;*/
	margin-top: 100px;
	margin-bottom: 20px;
	font-size: 18px;
	color: #999;
}
.box-book-pay {
	text-align: center;
	position: relative;
	width: 100%;
	color: #999;
	display: none;
}
.box-info-item{
	padding: 2px 10px;
	/*border: solid 1px #ccc; */
	margin-bottom: 20px;

}
.asd{
	border: 0;
    /* background-image: linear-gradient(#9c27b0,#9c27b0),linear-gradient(#D2D2D2,#D2D2D2);
    background-size: 0 2px,100% 1px;
    background-repeat: no-repeat;
    background-position: center bottom,center calc(100% - 1px);
    background-color: transparent; */
    transition: background 0s ease-out;
    float: none;
    box-shadow: none;
    border-radius: 0;
    font-weight: 400;
    width: 100%;
    padding: 0 30px;
}

@media screen and (max-width: 767px){
	#bodyClick {
		right: 229px !important;
	}
}
</style>



<style>

#get_html_book{
	z-index: 300;
	position: fixed;
	width: 100vw;
	height: 100vh;
	left: 0;
	top: 0;
	background: rgba(0, 0, 0, 0.59);
	/* display: none; */
}
.get_html_pop_in{
	/* height: 220px; */
	max-height: 100vh;
	/* border-radius: 4px; */
	background: #ddd;
	min-width: 100vw;
	/* height: auto; */
	/* left: 50vw; */
	top: 0;
	/* transform: translate(-50%,-50%); */
	position: fixed;
	z-index: 10;
	/* border-radius: 15px; */
}
.get_html_pop_ln{
	padding: 15px;
	height: 92vh;
	overflow: scroll;
	padding-bottom: 51px;
	webkit-overflow-scrolling: touch;
}
.box-program{
	border-top: dashed 2px #3b5998;
	border-bottom: dashed 2px #3b5998;
	text-align: center;
	/* background: #ff9800; */
	padding: 12px 2px;
	font-weight: 400;
	/* border-radius: 4px; */
	margin-bottom: 20px;
}
.asd{
    /* border: 0;
    background-image: linear-gradient(#9c27b0,#9c27b0),linear-gradient(#D2D2D2,#D2D2D2);
    background-size: 0 2px,100% 1px;
    background-repeat: no-repeat;
    background-position: center bottom,center calc(100% - 1px);
    background-color: transparent; */
    transition: background 0s ease-out;
    float: none;
    box-shadow: none;
    border-radius: 0;
    font-weight: 400;
    width: 100%;
    padding: 0 30px;
}
.checkbox input[type=checkbox]:checked+.checkbox-material .check {
	background: #3b5998 !important;
}
#acceptancecheck span{
	font-size:15px;
}
.checkbox .checkbox-material .check {
	position: relative;
	display: inline-block;
	width: 20px;
	height: 20px;
	border: 2px solid #3b5998!important;
	overflow: hidden;
	z-index: 1;
	border-radius: 5px;
}
.textInput{
	font-size: 15px;
	color: #333;
	border: 1px solid #dfdfdf;
	padding: 8px;
	margin: 8px 0;
	width: 100%;
	border-radius: 25px;
}
</style>

<!-- <div class="get_html_book" style="display:none">

</div> -->
<!-- START BOOK  -->

<!-- book -->
<?php 

if($_COOKIE['lng']){

       // echo  $_COOKIE['lng'].'unde';
	$lng_all_type = 'All Type';
	$lag_search_from = 'From: Type airport,hotel name, or location.';
	$lag_search_to = 'To: Type airport,hotel name, or location.';
	$lag_go_txt = 'Where are you going? ';
	$lag_from_txt = 'Departure Location...';
	$lng_from = 'From';
	$lng_to = 'To';
	$lng_from_pro = 'From Province';
	$lng_to_pro = 'To Province';
	$click_save_place_txt = "No record (Click to save)";

	$select_type = "Select Types";
	$hospital = "Hospital";
	$store = "Store";
	$airport = "Airport";
	$cafe = "Cafe";
	$spa = "Spa";
	$bank = "Bank";
	$depart_store = "Department Store";
	$h_r = "Hotel,Resort";
	$newname = 'New name';
	$phoneplace = 'Phone';
	$search_position = 'Find a location';

	/************book********* */
	$lng_your_country = 'Your country';
	$lng_fiast_name = 'First Name';
	$lng_last_name = 'Last Name';
	$lng_phone = 'Phone';
	$lng_email = 'Email';
	$lng_other = 'Other';
	$lng_flight = 'Flight';  

}
else if($_COOKIE['lng'] == 'en'){
        //echo 'en';
	$lng_all_type = 'All Type';
	$lag_search_from = 'From: Type airport,hotel name, or location.';
	$lag_search_to = 'To: Type airport,hotel name, or location.';
	$lag_go_txt = 'Where are you going? ';
	$lag_from_txt = 'Departure Location...';

	$lng_from = 'From';
	$lng_to = 'To';
	$lng_from_pro = 'From Province';
	$lng_to_pro = 'To Province';
	$click_save_place_txt = "No record (Click to save)";

	$select_type = "Select Types";
	$hospital = "Hospital";
	$store = "Store";
	$airport = "Airport";
	$cafe = "Cafe";
	$spa = "Spa";
	$bank = "Bank";
	$depart_store = "Department Store";
	$h_r = "Hotel,Resort";
	$newname = 'New name';
	$phoneplace = 'Phone';
	$search_position = 'Find a location';

	/************book********* */
	$lng_your_country = 'Your country';
	$lng_fiast_name = 'First Name';
	$lng_last_name = 'Last Name';
	$lng_phone = 'Phone';
	$lng_email = 'Email';
	$lng_other = 'Other';
	$lng_flight = 'Flight';  


}
else if(!$_COOKIE['lng'] == 'th'){
        //echo 'th';
	$lng_all_type = 'ทุกประเภท';
	$lag_search_from = 'จาก: สนามบินประเภทชื่อโรงแรมหรือสถานที่ตั้ง';
	$lag_search_to = 'ไปยัง: สนามบินประเภทชื่อโรงแรมหรือสถานที่ตั้ง';
	$lag_go_txt = 'คุณจะไปที่ไหน';
	$lag_from_txt = 'จุดเริ่มต้น...';

	$lng_from = 'จาก';
	$lng_to = 'ไปยัง';
	$lng_from_pro = 'จากจังหวัด';
	$lng_to_pro = 'ไปยังจังหวัด';
	$click_save_place_txt = "ไม่มีบันทึก (กดเพื่อบันทึก)";

	$select_type = "Select Types";
	$hospital = "Hospital";
	$store = "Store";
	$airport = "Airport";
	$cafe = "Cafe";
	$spa = "Spa";
	$bank = "Bank";
	$depart_store = "Department Store";
	$h_r = "Hotel,Resort";
	$newname = 'ชื่อใหม่';
	$phoneplace = 'โทรศัพท์';
	$search_position = 'ค้นหาตำแหน่ง';


	/************book********* */
	$lng_your_country = 'ชื่อประเทศของคุณ';
	$lng_fiast_name = 'ชื่อ';
	$lng_last_name = 'นามสกุล';
	$lng_phone = 'โทรศัพท์';
	$lng_email = 'อีเมล์';
	$lng_other = 'อื่น ๆ';
	$lng_flight = 'เที่ยวบิน'; 


}
else if($_COOKIE['lng'] == 'cn'){
       // echo 'cn';

	$lng_all_type = '所有類型';
	$lag_search_from = '从: 机场，酒店名称或位置。';
	$lag_search_to = '至: 机场，酒店名称或位置。';
	$lag_go_txt = '您去哪里？）';
	$lag_from_txt = '出发地点...';
	$lng_from = '从';
	$lng_to = '至';
	$lng_from_pro = '從省';
	$lng_to_pro = '到省';
	$click_save_place_txt = "没有记录 (按保存)";

	$select_type = "Select Types";
	$hospital = "Hospital";
	$store = "Store";
	$airport = "Airport";
	$cafe = "Cafe";
	$spa = "Spa";
	$bank = "Bank";
	$depart_store = "Department Store";
	$h_r = "Hotel,Resort";
	$newname = '新名称';
	$phoneplace = '电话';
	$search_position = '找到一个位置';

	/************book********* */
	$lng_your_country ="您的国家";
	$lng_fiast_name = '名';
	$lng_last_name = '姓';
	$lng_phone = '电话';
	$lng_email = '电子邮件';
	$lng_other = '其他';
	$lng_flight = '航班';




}
?>
<input type="hidden" id="paramUrl" value="<?=$_GET[action];?>" />
<button class="btn" id="open_map"  style="display: none;">Open Map</button>
    <div id="pro-search">
    	<div class="nav nav-pills nav-pills-warning" id="ul-header2" style="" >
    		<div class="" align="center" style="display: inline-block;    width: 100%;
    		padding: 0 10px;">
    		<div class="" id="private-btn"  href="#private" data-toggle="tab" aria-expanded="true"><span class="lng-private"></span> </div>


    		<div style=" " id="join-btn" class="" href="#join" data-toggle="tab" aria-expanded="false"><span class="lng-join"></span></div>
    	</div>

    	
<div id="box-pax-use" >
	<div class="box-pax-use-in" >
		<div  id="pax-box">
			<div style="background: #3b5998, color: #fff; padding: 18px; text-align: center; font-size: 19px; margin-bottom: 10px;">
				<span class="lng-please-select-type"></span>
				<i class="material-icons closepop">close</i>

			</div>
			<div class="col-md-12 boxpax" style="text-align: left;" > 
				<ul class="" name="typecarservice" id="paxuse" >
					<li value="All Type" onclick="sendpaxuse(0)" style="padding: 15px; border-bottom: 1px solid #ddd;"><?php echo  $lng_all_type;?>
				</li>
			</ul>

                    </div>
                </div>
            </div>
        </div>
        <div id="box-pax-rel">
        	<div class="box-pax-rel-in" >
        		 <div  id="pax-box">
        			<div style="background: #3b5998; color: #fff; padding: 18px; text-align: center; font-size: 19px; margin-bottom: 10px;">
        				<span class="lng-please-select-type"></span>
        				<i class="material-icons closepoptype" style="position: absolute;right: 15px;">close</i>
        			</div>
        			<div class="col-md-12">
        				<div style="font-size: 15px;
        				padding-bottom: 15px;
        				border-bottom: dashed 2px #3b5998;">
        				<table  width="100%">
        					<tr>
        						<td width="10">
        						</td>
        						<td>
        							<table width="100%">
        								<tr>
        									<td width="10"><div style="width: 10px;
        									height: 10px;
        									border-radius: 1px;
        									background: #555;"></div></td>
        									<td align="left" style="padding-left: 15px;"><span id="typeFrom" style="text-align: center;"></span></td>
        								</tr>
        								<tr>
        									<td colspan="2"><br/></td>

        								</tr>
        								<tr>
        									<td width="10"><div style="width: 10px;
        									height: 10px;
        									border-radius: 1px;
        									background: #3b5998;"></div></td>
        									<td align="left" style="padding-left: 15px;"><span id="typeTo" style="text-align: center;"></span></td>
        								</tr>
        							</table>
        						</td>
        					</tr>
        				</table>
        			</div>
        		</div>
        		<div class="col-md-12 boxpax" style="text-align: left;" > 
        			<ul class="" name="typecarservice" id="paxrel" >
        				<li value="All Type" onclick="sendpaxrel(0)" id="firstrel" style="padding: 15px; border-bottom: 1px solid #ddd;"><?php echo  $lng_all_type;?>
        			</li>
        		</ul>
        	</div>
        </div>
    </div>
</div>
</div>


<div id="box-prosearch">
	<div>
		<div class="container" style="display:none;" id="container-product">
			<div class="row">
				<div class="col-md-12" style="padding: 10px;">                            
					<div class="tab-content" id="move-product">
						<div class="tab-pane active" id="private" >
							<div id="product_a"></div>
						</div>
						<div class="tab-pane "  id="join">
							<div id="product_c"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<style>
.box_option{
	color: red;
	background-color: #fff;
	width: 40px;
	height: 40px;
	border-radius: 100%;
	box-shadow: rgba(241, 13, 13, 0.3) 0px 1px 4px;
	cursor: pointer;
	position: absolute;
	top: 140px;
	/* padding: 8px; */
	right: 17px;
	z-index: 19;
	text-align: center;
	font-size: 26px;
	line-height: 1.3;
	display: none;
}
</style>

<div id="back-home" style="display:none"><i class="fa fa-arrow-left" aria-hidden="true"></i></div>
<!-- BOX OPTION  -->
        <!-- <div class="box_option">
        <i class="material-icons" style="line-height: 1.7; font-size: 25px;">place</i>
    </div> -->
    <div id="search-often" style="    position: absolute;

    width: 100%;
    z-index: 5;
    padding: 0 15px;" class="box-shadow-customize">
    <input type="text" placeholder="<?php echo $search_position?>" id="often-input2" style="display:none">
    <div id="appendBoxoften" style="position: absolute;
    top: 48vh;"></div></div>
    <div id="search-raeltime" style="    position: absolute;
    display: block;">
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
            <div class="box-searchto" id='boxRealtimeto' style="display:noned">

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

<div style="" id="search-show">            
	<div class="col-md-12 " >
		<div class="card-content" style=" ">
			<div class="box-search">
				<div class="" id="current-addr">
					<i class="material-icons">gps_fixed</i>
				</div>
				<div class="box_from">
					<input type='text' class="" placeholder="<? echo  $lag_search_from;?>"  id='search-from' style="border: 1px solid #3b5998;
					padding: 10px;
					width: 100%;
					background: #fff;
					display: nones;
					margin: auto;
					color: #333;
					border-radius: 25px;"/>
					<!-- <div style="border-bottom: 1px solid #333;"></div> -->
					<div class="box-plancefrom" id="users">
						<ul  class="list" id="box-plancefrom" name="character"></ul>
					</div> 
				</div>
				<div class="box_to" style="display:none">
					<input  type='text' class="" placeholder="<? echo  $lag_search_to;?>" id='search-to' style="border: 1px solid #3b5998;
					padding: 10px;
					width: 100%;
					background: #fff;
					display: nones;
					margin: auto;
					color: #333;
					border-radius: 25px;" />                                                
					<div class="box-planceto"  >
						<ul  class="list" id="box-planceto" name="character"></ul>
					</div>
				</div>


				<input type="hidden" name="" value="" id="lat_from">
				<input type="hidden" name="" value="" id="lng_from">
				<input type="hidden" name="" value="" id="lat_to">
				<input type="hidden" name="" value="" id="lng_to">   
			</div>
		</div>                          
	</div>            
</div>
<div id="box-car-service" style="width: 100%;height: 100vh;display:none;background: #e6eaed;    position: absolute; overflow: hidden;z-index: 100; ">

	<div style="text-align:center; background: #3b5998; padding: 5px; color: #fff; font-weight: 600; text-align: center;">
		<h4 class="lng-a-place"></h4>
		<i class="material-icons btn-close" onclick="btn_close('boxcarservice')" style="    top: 15px;">close</i>
		<div style="width: 40px; height: 40px; border-radius: 100%; box-shadow: rgb(59, 89, 152) 0px 1px 4px; z-index: 262; margin-top: -45px; cursor: pointer; position: absolute; padding: 8px; background: rgb(255, 255, 255); color: rgb(59, 89, 152); font-size: 30px; margin-bottom: 15px;display: none" id="service_type">
			<i class="material-icons" style="">reply_all</i>
		</div>
	</div>
        <div style="    margin-top: 10px;">
        	<div class="col-md-12 col-sx-12">
                    	<div class="textInput" id="selectpro"></div>
                    	<div class="textInput"  id="selectproto"></div>
                    	<div  class="textInput" value="All Type" id="selectype" style="display:none"></div>
                    </div>
        <div id="foget-password" style="display: none">
        	<div class="box-in-foget" >
        		<div  id="pax-box">
        			<div style="background: #3b5998; color: #fff; padding: 18px; text-align: center; font-size: 19px; margin-bottom: 10px;">
        				<span class="lng-please-select-type"></span>
        				<i class="material-icons closepop">close</i>
        			</div>
        			<div class="col-md-12 boxpax" > 
        				<ul class="" name="typecarservice" id="typecarservice" >
        					<li value="All Type" onclick="sendpax(0)" style="padding: 15px; border-bottom: 1px solid #ddd;"><?php echo  $lng_all_type;?>
        				</li>
        			</ul>
        		</div>
        	</div>
        </div>
    </div>
    <div id="box-province">
    	<div class="box-province-in" >
    		<div  id="pax-box">
    			<div style="background: #3b5998; color: #fff; padding: 18px; text-align: center; font-size: 19px; margin-bottom: 10px;">
    				<span class="lng-from">From</span>
    				<i class="material-icons closepop">close</i>
    			</div>
    			<div class="col-md-12 boxpax" > 
    				<ul class="" name="typecarservice" id="province_service" >
                            <!-- <li ><? echo  $lng_from;?>
                        </li>                                                                 -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->

    <!-- PRO TO -->
    <div id="box-provinceto">
    	<div class="box-provinceto-in" >               
    		<div  id="pax-box">                      
    			<!-- <h4 style="    text-align: center;" class="lng-foget-pass">Please input your email</h4> -->
    			<div style="background: #3b5998; color: #fff; padding: 18px; text-align: center; font-size: 19px; margin-bottom: 10px;">
    				<span class="lng-to">To</span>
    				<i class="material-icons closepop">close</i>

    			</div>
    			<div class="col-md-12 boxpax" > 
    				<ul class="" name="typecarservice" id="provinceto" >
                            <!-- <li  style="box-shadow: 0px 13px 16px 0px rgba(0, 0, 0, 0.3);list-style: none;padding: 15px 15px;  background: #fff; margin-bottom: 5px;"><? echo  $lng_to;?>
                        </li>                                                                 -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->

    <div id="box-pro-service" style="  ">
    	<div id="type_service" style=""></div>
    	<div id="product_service" style="">

    		<div class="not-found lng-not-found" style="display:none"></div>
    	</div>
    </div>

</div>
</div>
</div>
<div id="map" style="width: 100%;height: 100vh;"></div>         


<div id="clear-all" style="    z-index: 0;
position: absolute;
right: 20px;
bottom: 130px;
color: rgb(255, 255, 255);display: none;">
<button title="Your Location" style="    background-color: #3b5998;
border: none;
outline: none;
width: 40px;
height: 40px;
border-radius: 25px;
box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px;
cursor: pointer;
right: 15px;
padding: 0px;">
<i class="material-icons" style="    margin: 5px;
font-weight: 800;">clear</i>
</button></div>
<style>
.pac-icon-marker {
	background-position: -5px -248px !important ;
}
.pac-icon {
	width: 17px !important;
	height: 24px !important;
	margin-right: 7px !important;
	margin-top: 3px !important;
	display: inline-block;
	vertical-align: top;
	background-image: url(https://maps.gstatic.com/mapfiles/api-3/images/autocomplete-icons.png);
	background-size: 52px !important;
}
#marginBox{
	overflow: scroll;
	min-height: 50vh;
	border-radius: 15px;
	/* margin-bottom: 15px; */
	/* margin-top: 90px; */
	background-color: #fff;
	position: relative;
}
.pac-item-query{
	font-size: 15px;
				    /* padding-right: 3px;
				    padding: 7px; */
				    /* color: #000; */
				}
				.pac-matched {
					font-weight: 700;
					display: inline-block;
					padding-left: 5px;
					color:#333;
				}  
				.lng-yes-regularly{

				}
				.pac-item {
					cursor: default;
					padding: 0 4px;
					/* text-overflow: ellipsis; */
					/* overflow: hidden; */
					white-space: normal !important;
					line-height: 30px;
					text-align: left;
					border-top: 1px solid #e6e6e6;
					font-size: 11px;
					color: #999;
				}
			</style>

			<div id="btn_CurrentLocation" style="z-index: 0; position: absolute; right: 20px; /*top: 275px;*/    bottom: 190px;display: none;color: rgb(35,35,35);">
				<button title="Your Location" style="background-color: rgb(255, 255, 255);
				border: none;
				outline: none;
				width: 40px;
				height: 40px;
				border-radius: 25px;
				box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px;
				cursor: pointer;
				right: 15px;
				padding: 0px;">
				<i class="material-icons" style="    margin: 5px;
				font-weight: 800;"><i class="material-icons">my_location</i></i>
			</button></div>



			<div id="boxForAutoCom">
				<div style="padding: 0 15px">
					<div style="background-color: #fff;
					width: 40px;
					height: 40px;
					border-radius: 100%;
					box-shadow: rgb(59, 89, 152) 0px 1px 4px;
					z-index: 262;
					margin-top: -60px;
					cursor: pointer;
					position: absolute;
					padding: 8px;
					background: #fff;
					color: #3b5998;
					font-size: 30px;
					margin-bottom: 15px;display:none" id="outselect_often" >
					<i class="material-icons" style="">reply_all</i>
				</div>
				<div style="background-color: #fff;
				width: 40px;
				height: 40px;
				border-radius: 100%;
				box-shadow: rgb(59, 89, 152) 0px 1px 4px;
				z-index: 262;
				margin-top: -60px;
				cursor: pointer;
				position: absolute;
				padding: 8px;
				background: #fff;
				color: #3b5998;
				font-size: 30px;
				margin-bottom: 15px;display:none" id="outNearby" >
				<i class="material-icons" style="">reply_all</i>
			</div>
			<div style="background-color: #fff;
			width: 40px;
			height: 40px;
			border-radius: 100%;
			box-shadow: rgb(59, 89, 152) 0px 1px 4px;
			z-index: 262;
			margin-top: -50px;
			cursor: pointer;
			position: absolute;
			padding: 8px;
			background: #fff;
			color: #3b5998;
			font-size: 30px;
			margin-bottom: 15px;display:none" id="outedit_often" >
			<i class="material-icons" style="">reply_all</i>
		</div>
		<div id="marginBox">

			<div style="border-bottom: 4px solid rgba(51, 51, 51, 0.21);display:none;"></div>

			<div id="otherBox" >
				<div class="pac-item">
					<table  width="100%">
						<tr  id="currentPosId">
							<td width="30">
								<span class="material-icons" aria-hidden="true" style="font-size: 2.1em;color: #4285F4;">my_location</span>
							</td>
							<td width="8px"></td>
							<td class="pac-item-query">
								<span class="lng-current-pos pac-matched ">Current position</span>
							</td>
						</tr>

					</table>
				</div>

				<div class="pac-item">
					<table width="100%">
						<tr  id="home-place-id">
							<td width="30">
								<span class="fa fa-home fa-lg" aria-hidden="true" style="font-size: 2.1em;"></span>
							</td>
							<td width="8px"></td>
							<td  onclick="selectEditPlaceOfften(1)" class="pac-item-query">
								<div class="lng-home-locat pac-matched ">Home</div>
							</td>
                        <!-- <td width="50%"  >
                            <div class="lng-save_home_place"></div>
                        </td> -->
                        <td onclick="selectEditPlaceOfften(1)" align="center" width="20%" style="color: #000; font-size: 15px;"><span class="numhome"></span></td>
                        <td  width="30">
                        	<i class="material-icons pull-right" id="edit-home_select" onclick="addPlaceOfften(1,'edit')" style="color: #3b5998; font-weight: 700; line-height: inherit;" >add</i>

                            <!-- <table width="100%">
                            <tr>
                                <td>
                                <i class="material-icons pull-right" id="edit-home_select" onclick="addPlaceOfften(1,'edit')" style="color: #3b5998; font-weight: 700; line-height: inherit;" >add</i>
                                </td>
                            </tr>
                            <tr id="often_edit_home" style="display:none">
                                <td>
                                <i class="material-icons pull-right" style="color: #ff9800; font-weight: 700; line-height: inherit;" onclick="selectEditPlaceOfften(1)">edit</i>
                                </td>
                            </tr>
                        </table> -->


                    </td>

                </tr>

            </table>
        </div>


        <div class="pac-item">
        	<table width="100%">
        		<tr  id="office-place-id" >
        			<td width="30">
        				<span class="fa fa-building fa-lg" aria-hidden="true" style="font-size: 2.1em;"></span>
        			</td>
        			<td width="8px"></td>
        			<td  onclick="selectEditPlaceOfften(2)" class="pac-item-query">
        				<div class="lng-office-locat pac-matched ">Office</div>
        			</td>

        			<td onclick="selectEditPlaceOfften(2)" align="center" width="20%" style="color: #000; font-size: 15px;"><span class="numoffice"></span></td>
        			<td  width="30">
        				<i class="material-icons pull-right" id="edit-office_select" onclick="addPlaceOfften(2,'edit')" style="color: #3b5998; font-weight: 700; line-height: inherit;" >add</i>

        			</td>

        		</tr>

        	</table>
        </div>

        <div class="pac-item">
        	<table width="100%">
        		<tr  id="regularly-place-id" >
        			<td width="30">
        				<i class="material-icons" style="font-size: 2.1em;width:30px">star_rate</i>

        			</td>
        			<td width="8px"></td>
        			<td colspan="3"  class="pac-item-query box-history">
        				<div class="lng_favorites pac-matched ">regularly</div>
        			</td>

        		</tr>

        	</table>
        </div>
        <div class="pac-item">
        	<table width="100%">
        		<tr  id="regularly-place-id" >
        			<td width="30">
        				<i class="material-icons" style="font-size: 2.1em;width:30px">av_timer</i>
        				<!-- <i class="material-icons" style="font-size: 2.1em;width:30px">star_rate</i> -->

        			</td>
        			<td width="8px"></td>
        			<td colspan="3"  class="pac-item-query box-list">
        				<div class="lng_list pac-matched ">regularly</div>
        			</td>


        		</tr>

        	</table>
        </div>

        <div class="pac-item">
        	<table  width="100%">
        		<tr  id="setpinId" onclick="setPinLocation();">
        			<td width="30">
        				<span class="fa fa-map-pin fa-lg" aria-hidden="true" style="font-size: 2.1em;  "></span>
        			</td>
        			<td width="8px"></td>
        			<td class="pac-item-query">
        				<span class="lng-setpin-locat pac-matched "></span>
        			</td>
        		</tr>

        	</table>
        </div>
        <div class="pac-item">
        	<table  width="100%">
        		<tr id="nearbyId" >
        			<td width="30">
        				<span class="fa fa-arrow-right fa-lg" aria-hidden="true" style="font-size: 2.1em;"></span>
        			</td>
        			<td width="8px"></td>
        			<td class="pac-item-query">
        				<span class="lng-nearby-locat pac-matched ">Nearby Places</span>
        			</td>
        		</tr>

        	</table>
        </div>

    </div>
    <style>
    #box-placeoften li{
    	list-style: none;
    	padding: 15px;
    	padding-left: 0;
    	margin-bottom: 15px;
    	font-size: 15px;
    	border-radius: 15px;
    	border: 1px solid #777;
    }
    #changesetname{
    	border: 1px solid #dfdfdf;
    	padding: 8px;
    	margin: 8px 0;
    	width: 100%;
    	border-radius: 25px;
    }
    #changesetname1{
    	border: 1px solid #dfdfdf;
    	padding: 8px;
    	margin: 8px 0;
    	width: 100%;
    	border-radius: 25px;
    }
    #box_editplaceoften li{
    	list-style: none;
    	padding: 8px 15px;
    	padding-left: 0;
    	margin-bottom: 15px;
    	font-size: 15px;
    	border-radius: 15px;
    	border: 1px solid #777;
    }
    .name{
    	padding-left: 15px;
    }
    input::-webkit-input-placeholder,
    textarea::-webkit-input-placeholder {
    	color: #000;
    }
    input:-moz-placeholder,
    textarea:-moz-placeholder {
    	color: #000;
    }
    input::-moz-placeholder,
    textarea::-moz-placeholder {
    	color: #000;
    }
    input:-ms-input-placeholder,
    textarea:-ms-input-placeholder {
    	color: #000;
    }
</style>
<div id="select_often" style="display:none">
	<div >
		<ul id="box-placeoften" style="margin-top: 15px;
		padding: 0 15px;"></ul>

	</div>
</div>
<div id="edit_often" style="display:none">
	<div >
		<ul id="box_editplaceoften" style="margin-top: 15px;
		padding: 0 15px;"></ul>

	</div>
</div>

<div id="edit_often_pop" style="display: none;">
	<div class="edit_often_pop_in">               
		<div class="edit_often_pop_ln">
			<!-- <div id="oldname"></div> -->
			<input type="text" class="textInput" placeholder="<? echo $newname;?>" id="newname" name="newname" onchange="newname(newname)" >
			<input type="text" class="textInput" placeholder="<? echo $phoneplace;?>" id="phoneplace" name="phoneplace" onchange="phoneplace(phoneplace)" >

			<div style="text-align: center;
			margin-top: 25px;">
			<div class="lng-cancel btn-close" style="background-color: #f44336;
			width: 100px;
			padding: 10px 20px;
			font-size: 15px;
			color: #FFF;
			text-align: center;
			display: inline-block;
			border-radius: 25px;
			margin-right: 15px;
			" onclick="btn_close()"></div>
			<div class="lng-save" style="    width: 100px;
			padding: 10px 20px;
			font-size: 15px;
			background-color: #4caf50;
			color: #FFF;
			text-align: center;
			display: inline-block;
			border-radius: 25px;

			bottom: 14px;
			right: 125px;" onclick="btn_save()"></div>
		</div>

	</div>        

</div></div>

<div id="showNearbyPlace" style="display: none;">
	<div style="margin: 8px;padding-top: 5px;padding-bottom: 2px;">

		<table width="100%">
			<tr>

				<td>
					<?php 

					$type_nearby_en = array("All Types", "Hospital", "Airport", "Spa", "Restaurant", "Department Store", "Hotel,Resort","Points of interest");
					$type_nearby_th = array("ทุกประเภท", "โรงพยาบาล", "สนามบิน", "สปา", "ร้านอาหาร","ห้างสรรพสินค้า", "โรงแรม,รีสอร์ท","จุดน่าสนใจ");
					$type_nearby_cn = array("所有类别", "医院", "机场", "温泉", "餐厅","百货商店" ,"酒店，度假村","兴趣点");
					?> 	
					<select class="select-type-place" id="types_ofPlace">

						<?php
						$type_vale = 0;
						foreach($type_nearby_en as $item){
							echo '<option value="'.$type_vale.'">'.$item.'</option>';
							$type_vale+=1;
						}
						?>

					</select>
				</td>                            
			</tr>
		</table>
	</div>	
	<div id="list_place_push"></div>						               
</div>
</div>
</div>
</div>








</div>


<input type="hidden" id="for_check_currentInput" value="0"/>
<input type="hidden" id="for_check_endInput" value="0"/>
<!-- popup comfirm pin -->

<div id="no_pin_pop" style="display: none;">
	<div class="no_pin_pop_in">               
		<div class="no_pin_pop_ln">
			<div class="lng_location_no" style="text-align: center; font-size: 16px;"></div>
			<!-- <input type="text" class="textInput" placeholder="<? echo $newname;?>" id="newname" name="newname" onchange="newname(newname)" > -->

			<div style="text-align: center;
			margin-top: 25px;">

			<div class="lng_find_again icon-close" style="    width: 100%;
			padding: 10px 0px;
			font-size: 15px;
			background-color: #3b5998;
			color: #FFF;
			text-align: center;
			display: inline-block;
			border-radius: 25px;

			bottom: 14px;
			right: 125px;" onclick="btn_no_position()"></div>
		</div>

	</div>        

</div></div>

<div id="history_pop" style="display: none;">
	<div class="history_pop_in">               
		<div class="history_pop_ln">
			<div class="lng_history" style="text-align: center; font-size: 16px;    margin-bottom: 15px;"></div>
			<!-- <input type="text" class="textInput" placeholder="<? echo $newname;?>" id="newname" name="newname" onchange="newname(newname)" > -->
			<div style="font-size: 15px;  padding-bottom: 15px; border-bottom: dashed 2px #3b5998;">
				<table width="100%">                           
					<tr>
						<td width="10"></td>
						<td>
							<table width="100%">
								<tr>
									<td width="10">
										<div style="width: 10px;  height: 10px;  border-radius: 1px; background: #555;"></div>
									</td>
									<td align="left" style="padding-left: 15px;">
										<span id="locationfrom" style="text-align: center;"></span>
									</td>
								</tr>
								<tr>
									<td colspan="2"><br></td>
								</tr>
								<tr>
									<td width="10">
										<div style="width: 10px;  height: 10px; border-radius: 1px; background: #3b5998;"></div>
									</td>
									<td align="left" style="padding-left: 15px;">
										<span id="locationto" style="text-align: center;">Home2</span>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div style=";
			margin-top: 25px;">
			<div class="lng-no" style="background-color: #f44336;
			width: 120px;
			padding: 10px 0px;
			font-size: 15px;
			color: #FFF;
			text-align: center;
			display: inline-block;
			border-radius: 25px;
			float: right;
			" onclick="cancelhistory()"></div>
			<div class="lng-save" style="    width: 120px;
			padding: 10px 0px;
			font-size: 15px;
			background-color: #4caf50;
			color: #FFF;
			text-align: center;
			display: inline-block;
			border-radius: 25px;
			bottom: 14px;
			right: 125px;" onclick="confirmhistory()"></div>
		</div>
	</div>
</div></div>

<div id="get_history_pop" style="display: none;">
	<div class="get_history_pop_in">
		<div class="get_history_pop_ln">
			<i class="material-icons" id="close_get_history" style="position: absolute;top: 10px; right: 15px;">close</i>
			<div class="lng_favorites" style="text-align: center; font-size: 18px;font-weight: 400;    margin-bottom: 20px;"></div>
			<!-- <input type="text" class="textInput" placeholder="<? echo $newname;?>" id="newname" name="newname" onchange="newname(newname)" > -->
			<ul id="list_history" >

			</ul>



		</div>        

	</div></div>
	<div id="police_pop" style="display: none;">
		<div class="police_pop_in">               
			<div class="police_pop_ln">
				<!-- <i class="material-icons" id="close_get_history" style="position: absolute;top: 10px; right: 15px;">close</i> -->
				<div class="lng_calling_police" style="text-align: center; font-size: 18px;font-weight: 400; margin-bottom: 20px;"></div>
				<!-- <input type="text" class="textInput" placeholder="<? echo $newname;?>" id="newname" name="newname" onchange="newname(newname)" > -->
				<div class="lng_really_need" style="text-align: center; font-size: 15px;font-weight: 400; margin-bottom: 20px;"></div>

				<div class="lng_police_now" style="background: #f44336;
				/* text-transform: uppercase; */
				text-align: center;
				color: #fff;
				/* position: absolute; */
				right: 15px;
				padding: 12px 20px;
				bottom: 15px;    border-radius: 15px;    border-radius: 15px;"></div>
				<div class="lng_canceled" style="
				/* text-transform: uppercase; */
				text-align: center;
				color: #333;
				/* position: absolute; */
				right: 15px;
				padding: 12px 20px;
				bottom: 15px;    border-radius: 15px;"></div>
                    <!-- <ul id="list_history" >

                    </ul> -->
                    
                    
                    
                </div>        

            </div></div>
            


            <style>
            #getcapa{
            	background-color: #ddd;
            	height: 50px;
            }
            /* .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
                border-top: none;
                } */
                #table1{
                	margin-top: 10px !important;
                }
                #input_data_pop{
                	z-index: 19;
                	position: fixed;
                	width: 100vw;
                	height: 100vh;
                	left: 0;
                	top: 0;
                	background: rgba(0, 0, 0, 0.59);
                	display: none;
                }
                #acceptance_pin_pop{
                	z-index: 300;
                	position: fixed;
                	width: 100vw;
                	height: 100vh;
                	left: 0;
                	top: 0;
                	background: rgba(0, 0, 0, 0.59);
                	display: none;
                	/* pointer-events: none; */
                }
                .acceptance_pin_pop_in{
                	/* height: 220px; */
                	/* border-radius: 4px; */
                	background: #fff;
                	min-width: 80vw;
                	/* height: auto; */
                	left: 50vw;
                	top: 50vh;
                	transform: translate(-50%,-50%);
                	position: fixed;
                	z-index: 10;
                	border-radius: 15px;
                }
                .acceptance_pin_pop_ln{
                	padding: 20px;
                	pointer-events: auto;
                }
                #selsect_car_pop{
                	z-index: 300;
                	position: fixed;
                	width: 100vw;
                	height: 100vh;
                	left: 0;
                	top: 0;
                	background: rgba(0, 0, 0, 0.59);
                	display: none;
                	/* pointer-events: none; */
                }
                .selsect_car_pop_in{
                	/* height: 220px; */
                	/* border-radius: 4px; */
                	background: #fff;
                	min-width: 80vw;
                	/* height: auto; */
                	left: 50vw;
                	top: 50vh;
                	transform: translate(-50%,-50%);
                	position: fixed;
                	z-index: 10;
                	border-radius: 15px;
                }
                .selsect_car_pop_ln{
                	padding: 20px;
                	pointer-events: auto;
                }
                @keyframes blink { 
                	50% { border-color: #ff0000; } 
                }
                #checkbox .checkbox-material .check {
                	animation-name: blink;
                	animation-duration: .5s;
                	animation-timing-function: step-end;
                	animation-iteration-count: infinite;
                	animation-direction: alternate;
                }

            </style>





            
            <style>
            /*  rgb(13, 107, 106) */
            #list_history{
            	list-style: none;
            	padding-left: 0;
            	overflow: scroll;
            	max-height: 85vh;

            }
            #list_historylist{
            	list-style: none;
            	padding-left: 0;
            	overflow: scroll;
            	max-height: 85vh;

            }
            #list_historylist li {
            	margin-bottom: 8px;
            }
            #list_history li {
            	margin-bottom: 8px;
            }
            .confirm{
            	text-align: center;
            	background-color: rgb(35, 53, 91) !important;
            	width: 100px !important;
            	border-radius: 25px !important;
            }
            .cancel{
            	padding: 10px 0 !important;
            	text-align: center;
            	background-color: #C1C1C1 !important;
            	width: 100px !important;
            	border-radius: 25px !important;
            }
            #edit_often_pop{
            	z-index: 9999;
            	position: fixed;
            	width: 100vw;
            	height: 100vh;
            	left: 0;
            	top: 0;
            	background: rgba(0, 0, 0, 0.59);
            	/* display: none; */
            }
            .edit_often_pop_in{
            	/* height: 220px; */
            	/* border-radius: 4px; */
            	background: #fff;
            	min-width: 90vw;
            	/* height: auto; */
            	left: 50vw;
            	top: 50vh;
            	transform: translate(-50%,-50%);
            	position: fixed;
            	z-index: 10;
            	border-radius: 15px;
            }
            .edit_often_pop_ln{
            	padding: 15px;
            }
            #edit_pin_pop{
            	z-index: 19;
            	position: fixed;
            	width: 100vw;
            	height: 100vh;
            	left: 0;
            	top: 0;
            	/* background: rgba(0, 0, 0, 0.59); */
            	/* display: none; */
            	pointer-events: none;
            }
            .edit_pin_pop_in{
            	/* height: 220px; */
            	/* border-radius: 4px; */
            	background: #fff;
            	min-width: 92vw;
            	/* height: auto; */
            	left: 50vw;
            	bottom: 1vh;
            	transform: translate(-50%,-50%);
            	position: fixed;
            	z-index: 10;
            	border-radius: 15px;
            }
            .edit_pin_pop_ln{
            	padding: 20px;
            	pointer-events: auto;
            }
            #no_pin_pop{
            	z-index: 19;
            	position: fixed;
            	width: 100vw;
            	height: 100vh;
            	left: 0;
            	top: 0;
            	/* background: rgba(0, 0, 0, 0.59); */
            	/* display: none; */
            	pointer-events: none;
            }
            .no_pin_pop_in{
            	/* height: 220px; */
            	/* border-radius: 4px; */
            	background: #fff;
            	min-width: 80vw;
            	/* height: auto; */
            	left: 50vw;
            	bottom: 1vh;
            	transform: translate(-50%,-50%);
            	position: fixed;
            	z-index: 10;
            	border-radius: 15px;
            }
            .no_pin_pop_ln{
            	padding: 20px;
            	pointer-events: auto;
            }
            #newname{
            	border: 1px solid rgb(22, 179, 177);
            	padding: 8px;
            	margin: 8px 0;
            	width: 100%;
            	border-radius: 25px;
            	text-align:center;
            }
            #phoneplace{
            	border: 1px solid rgb(22, 179, 177);
            	padding: 8px;
            	margin: 8px 0;
            	width: 100%;
            	border-radius: 25px;
            	text-align:center;
            }
            #oldname{
            	text-align: center;
            	/* margin-top: 30px; */
            	margin-bottom: 15px;
            	font-size: 16px;
            }
            #changesetphone{
            	border: 1px solid #dfdfdf;
            	padding: 8px;
            	margin: 8px 0;
            	width: 100%;
            	border-radius: 25px; 
            }
            #changesetphone2{
            	border: 1px solid #dfdfdf;
            	padding: 8px;
            	margin: 8px 0;
            	width: 100%;
            	border-radius: 25px; 
            }
            #often-input{
            	border: 1px solid #dfdfdf;
            	padding: 8px;
            	margin: 8px 0;
            	width: 100%;
            	border-radius: 25px; 
            }
            #often-input2{
            	transform: translate(-50%,-50%);
            	border: 1px solid #ddd;
            	padding: 8px;
            	margin: 8px 0;
            	width: 91%;
            	/* right: -15px; */
            	left: 50vw;
            	border-radius: 25px;
            	top: 54vh;
            	position: fixed;

            }
            #appendBoxoften{
            	left: 50vw;
            	/* margin-top: 70px; */
            	width: 92%;
            	/* z-index: 5; */
            	/* padding: 0 10px 6px 15px; */
            	position: absolute;
            	top: 74vh !important;
            	height: 32vh;
            	transform: translate(-50%,-50%);
            	/* right: 50px; */
            	pointer-events: none;
            }
            #history_pop{
            	z-index: 9999;
            	position: fixed;
            	width: 100vw;
            	height: 100vh;
            	left: 0;
            	top: 0;
            	background: rgba(0, 0, 0, 0.59);
            	/* display: none; */
            }
            .history_pop_in{
            	/* height: 220px; */
            	/* border-radius: 4px; */
            	background: #fff;
            	min-width: 90vw;
            	/* height: auto; */
            	left: 50vw;
            	top: 50vh;
            	transform: translate(-50%,-50%);
            	position: fixed;
            	z-index: 10;
            	border-radius: 15px;
            }
            .history_pop_ln{
            	padding: 15px;
            }
            #get_history_pop{
            	z-index: 9999;
            	position: fixed;
            	width: 100vw;
            	height: 100vh;
            	left: 0;
            	top: 0;
            	background: rgba(0, 0, 0, 0.59);
            	/* display: none; */
            }
            .get_historylist_pop_ln{
            	padding: 15px;
            }
            .get_history_pop_in{
            	/* height: 220px; */
            	max-height: 95vh;
            	/* border-radius: 4px; */
            	background: #fff;
            	min-width: 90vw;
            	/* height: auto; */
            	left: 50vw;
            	top: 50vh;
            	transform: translate(-50%,-50%);
            	position: fixed;
            	z-index: 10;
            	border-radius: 15px;
            }
            .get_history_pop_ln{
            	padding: 15px;
            }
            #get_historylist_pop{
            	z-index: 9999;
            	position: fixed;
            	width: 100vw;
            	height: 100vh;
            	left: 0;
            	top: 0;
            	background: rgba(0, 0, 0, 0.59);
            	/* display: none; */
            }
            .get_historylist_pop_in{
            	/* height: 220px; */
            	max-height: 95vh;
            	/* border-radius: 4px; */
            	background: #fff;
            	min-width: 90vw;
            	/* height: auto; */
            	left: 50vw;
            	top: 50vh;
            	transform: translate(-50%,-50%);
            	position: fixed;
            	z-index: 10;
            	border-radius: 15px;
            }
            .police_pop_ln{
            	padding: 15px;
            }
            #police_pop{
            	z-index: 9999;
            	position: fixed;
            	width: 100vw;
            	height: 100vh;
            	left: 0;
            	top: 0;
            	background: rgba(0, 0, 0, 0.59);
            	/* display: none; */
            }
            .police_pop_in{
            	/* height: 220px; */
            	max-height: 95vh;
            	/* border-radius: 4px; */
            	background: #fff;
            	min-width: 90vw;
            	/* height: auto; */
            	left: 50vw;
            	top: 50vh;
            	transform: translate(-50%,-50%);
            	position: fixed;
            	z-index: 10;
            	border-radius: 15px;
            }
            .police_pop_ln{
            	padding: 15px;
            }
            .close_login{
            	position: absolute;
            	right: 15px;
            }
            #search-show {
            	position: absolute;
            	margin-top: 70px;
            	width: 100%;
            	z-index: 5;
            	display: none;
            }

            #search-raeltime {
            	position: absolute;
            	margin-top: 20px;
            	width: 90%;
            	z-index: 5;
            	padding: 0 15px;
            	display: none;
            }








            /*************************************/
            #i-list i{
            	line-height: 0;
            }
            #select_pax_use{
            	border: 1px solid #dfdfdf;
            	padding: 12px;
            	/* margin: 8px 0; */
            	width: 100%;
            	border-radius: 25px;
            }
            #appendBox{
            	border-radius:25px 
            }
            .placeNeary-item {
            	overflow-x: scroll;
            }
/*
::-webkit-scrollbar {
    -webkit-appearance: none;
}

::-webkit-scrollbar:vertical {
        width: 0px;
    display: none;
}

::-webkit-scrollbar:horizontal {
    
    display: none;
}
*/

/*::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, .5);
    border-radius: 10px;
    border: 2px solid #ffffff;
}
::-webkit-scrollbar-track {
    border-radius: 10px;
    background-color: #ffffff;
    }*/

    #boxForAutoCom {
    	/* height: 64vh; */
    	width: 100%;
    	position: absolute;
    	top: 20vh;
    	border-radius: 15px;
    	display: none;
    }
    #boxForAutoCom:before {
    	display: inline-block;
    	position: absolute;
    	width: 0;
    	height: 0;
    	vertical-align: middle;
    	content: "";
    	top: -11px;
    	right: 26px;
    	left: auto;
    	color: #FFFFFF;
    	border-bottom: 1em solid #ff2828;
    	border-right: 0.8em solid transparent;
    	border-left: .8em solid transparent;
    }
/* #boxForAutoCom {
    width: 100%;
    height: 100vh;
    background: #eee;
    position: absolute;
    overflow: auto;
    top: 0px;
    
    display: none;
    
    } */

    .pac-container {
    	width: 100% !important;
    	position: unset !important;
    	left: 0px !important;
    	top: 0px !important;
    	/* display: none; */
    	height: 100% !important;
    	box-shadow: none;
    	border-radius:25px;
    	pointer-events: auto !important; 
    }
    .search-container{
    	width: 100% !important;
    	position: unset !important;
    	left: 0px !important;
    	top: 0px !important;
    	/* display: none; */
    	height: 100% !important;
    	box-shadow: none;
    	border-radius:25px 
    }

    .box-menu-select {
    	box-shadow: 0 0 4px 2px rgba(221, 221, 221, 0.68);
    }
    #map{
    	height: 90vh;  
    }

    #img-car {
    	z-index: 275;
    	position: fixed;
    	left: 0px;
    	top: 0px;
    	/* background: rgba(0, 0, 0, 0.59); */
    	display: none;
    }

    .box-in-foget {
    	height: 100vh;
    	/* border-radius: 4px; */
    	background: #fff;
    	min-width: 100%;
    	/* height: auto; */
    	left: 50vw;
    	top: 50vh;
    	transform: translate(-50%, -50%);
    	position: fixed;
    	z-index: 3;
    }

    .header-img {
    	text-align: center;
    	background: ;
    	padding: 5px;
    	color: #fff;
    	font-weight: 600;
    	text-align: center;
    }

    .btn-close-img {
    	width: 61%;
    	/* position: fixed; */
    	/* width: 200px; */
    	background: #3b5998;
    	/* text-transform: uppercase; */
    	text-align: center;
    	color: #ffffff;
    	border: 1px solid #3b5998;
    	/* position: absolute; */
    	right: 15px;
    	transform: translate(32%, 0%);
    	padding: 12px 0;
    }

/*#product_a {
    margin-bottom: 110px;
    }*/

    .box-menu-select2 {
    	position: fixed;
    	width: 100%;
    	bottom: 0;
    	z-index: 1;
    	background: #fff;
    	height: 10vh;
    }

    .btn-car-service {
    	line-height: 0.8;
    	padding: 8px 0;
    	font-size: 16px;
    	/* font-weight: 400; */
    	/* position: absolute; */
    	width: 100%;
    	/* border-radius: 4px; */
    	/* padding: 12px; */
    	color: #333;
    	text-align: center;
    	/* display: inline-block; */
    	/* background-color: #2196f3; */
    	z-index: 1;
    }

    .btn-close {
    	/* width: 200px; */
    	/*background: #3b5998;*/
    	/* text-transform: uppercase; */
    	/*text-align: center;*/
    	/*color: #fff;*/
    	/*position: absolute; */
    	/*right: 15px;*/
    	/*padding: 12px 20px;*/
    	/*bottom: 15px;*/
    }

    #cartype {
    	/* margin: auto; */
    	border: 1px solid #dfdfdf;
    	padding: 8px;
    	/* margin: 8px 0; */
    	width: 100%;
    }


    /* ******************* */

    .box-menu-select {
    	position: fixed;
    	width: 100%;
    	bottom: 0;
    	z-index: 1;
    	background: #fff;
    	text-transform: capitalize;
    	/* height: 9vh; */
    	z-index: 301;
    }

    .box-menu-select2 {
    	position: fixed;
    	width: 100%;
    	bottom: 0;
    	z-index: 1;
    	background: #fff;
    	/* height: 90px; */
    }

    .btn-show-select {
    	width: 50px;
    	height: 50px;
    	position: absolute;
    	margin-top: -30px;
    	background: #333;
    	text-align: center;
    	color: #fff;
    	right: 0;
    	padding-top: 5px;
    	border-radius: 5px 5px;
    }

    .btn-hide-select {
    	width: 50px;
    	height: 50px;
    	position: absolute;
    	margin-top: -30px;
    	background: #333;
    	text-align: center;
    	color: #fff;
    	right: 0;
    	padding-top: 5px;
    	border-radius: 5px 5px;
    	display: none;
    }

    .select-type-place {
    	border: 1px solid #E0E0E0 !important;
    	display: block;
    	width: 100%;
    	height: 34px;
    	padding: 6px 12px;
    	font-size: 14px;
    	line-height: 1.42857143;
    	color: #555;
    	background-color: #fff;
    	background-image: none;
    	border: 1px solid #ccc;
    	border-radius: 4px;
    	position: relative;
    }


    /* ******************* */

    .card-contentrealtime {
    	background-image: linear-gradient(-179deg, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 100%);
    	/* border-radius: 4px; */
    }

    #terms-of-use {
    	padding: 10px;
    	border-radius: 15px; 
    	font-size: 16px;
    	border: 1px solid rgb(59, 89, 152);
    	margin-top: 5px;
    }

    #getcapa2 {
    	border: 1px solid #999;
    	border-top: none;
    	margin-top: -10px;
    	border-radius: 0 0 15px 0;
    	/* border-radius: 4px; */
    }

    #private-btn {
    	background: #16B3B1;
    	border-radius: 25px;

    }
    #join-btn{
    	border-radius: 25px;
    }

    #current-addr {
    	color: #16B3B1;
    	z-index: 1;
    	/* font-size: 13px; */
    	right: 25px;
    	/* width: 31px; */
    	/* height: 30px; */
    	/* padding: 4px; */
    	position: absolute;
    	/* border-radius: 4px; */
    	/* background-color: #16B3B1; */
    	margin: 8px 0;
    }

    #pro-search {
    	z-index: 200;
    	position: fixed;
    	width: 100vw;
    	height: 100vh;
    	left: 0;
    	top: 0;
    	/* padding: 15px; */
    	background: rgba(255, 255, 255, 0.79);
    	display: none;
    }

    #show-hide-pro {
    /* text-align: center;
    height: 38px;
    width: 38px;
    border-radius: 100%;
    background: #fff;
    border: 2px solid rgb(22, 179, 177);
    
    left: 9vw;
    overflow: hidden;
    transform: translate(-50%, -50%);
    position: absolute;
    display: none;
    top: 94px;
    z-index: 201; */
    text-align: center;
    left: 9vw;
    overflow: hidden;
    transform: translate(-50%, -50%);
    display: none;
    top: 94px;
    /* z-index: 200; */
    width: 38px;
    height: 38px;
    border-radius: 100%;
    box-shadow: #3b5998 0px 1px 4px;
    z-index: 262;
    cursor: pointer;
    position: absolute;
    padding: 8px;
    background: rgb(255, 255, 255);
    color: #3b5998;
    font-size: 30px;
}

#show-hide-pro2 {
	height: 36px;
	border-radius: 100%;
	background: #fff;
	border: 2px solid #3b5998;
	min-width: 2rem;
	/* height: auto; */
	z-index: 201;
	left: 50vw;
	/* top: 86vh; */
	overflow: hidden;
	transform: translate(-50%, -50%);
	position: fixed;
	display: none;
	bottom: 0;
}

.modal-content .modal-body {
	padding: 24px 10px 16px !important;
}

.modal .modal-dialog {
	/* margin-top: 10px !important; */
}

.media-heading:hover,
a:link {
	color: #333 !important;
}

.lng-book {
	color: #fff !important;
}

#iconhome {
    /* font-size: 32px;
    color: #ffffff;
    position: absolute;
    border-radius: 4px;
    left: 15px;
    top: -38px;
    display: none; */
}

#iconleft {
	background: #3b5998;
	font-size: 45px;
	color: #fff;
	position: absolute;
	border-radius: 0 4px 4px 0;
	display: none;
	right: 15px;
	margin-bottom: 12px;
}

#iconleft2 {
	background: #ff9800;
	font-size: 45px;
	color: #fff;
	position: absolute;
	border-radius: 4px 0 0 4px;
	display: none;
	margin-bottom: 12px;
}

/*#search-show {
    position: absolute;
    margin-top: 70px;
    width: 100%;
    z-index: 5;
    display: none;
    }*/

/*#search-raeltime {
    position: absolute;
    margin-top: 55px;
    width: 100%;
    z-index: 5;
    padding: 0 15px;
    display: none;
    }*/

    .card-content:after {
    	border-bottom: 11px solid #FFFFFF;
    	border-left: 11px solid transparent;
    	border-right: 11px solid transparent;
    	content: "";
    	display: none;
    	position: absolute;
    	left: 80px;
    	top: -10px;
    }

    .card-contentrealtime:after {
    	border-bottom: 11px solid #FFFFFF;
    	border-left: 11px solid transparent;
    	border-right: 11px solid transparent;
    	content: "";
    	/*    display: inline-block;*/
    	position: absolute;
    	left: 260px;
    	top: -10px;
    	display: none;
    }

    .card-contentrealtime.hidden5:after {
    	border-bottom: 0px solid #FFFFFF;
    /*border-left: 11px solid transparent;
    border-right: 11px solid transparent;
    content: "";
    display: inline-block;
    position: absolute;
    left: 260px;
    top: -10px;*/
}

.box-search {
	padding: 0 !important;
}
.box-searchto {
	margin-top: -5px;
	padding: 0 !important;
}

.box-search .form-group {
	margin: 0;
}

.btn-reservation {
	line-height: 0.8;
	padding: 8px 0;
	font-size: 16px;
	/* font-weight: 400; */
	/* position: absolute; */
	width: 100%;
	/* border-radius: 4px; */
	/* padding: 12px; */
	color: #333;
	text-align: center;
	/* display: inline-block; */
	/* background-color: #2196f3; */
	z-index: 1;
}

.btn-realtime {
	line-height: 0.8;
	padding: 8px 0;
	font-size: 16px;
	/* font-weight: 400; */
	/* position: absolute; */
	width: 100%;
	/* border-radius: 4px; */
	/* padding: 12px; */
	color: #333;
	text-align: center;
	/* display: inline-block; */
	/* background-color: #2196f3; */
	z-index: 1;
}

.btn-home {
	line-height: 0.8;
	padding: 8px 0;
	font-size: 16px;
	/* font-weight: 400; */
	/* position: absolute; */
	width: 100%;
	/* border-radius: 4px; */
	/* padding: 12px; */
	color: #3b5998;
	text-align: center;
	/* display: inline-block; */
	/* background-color: #2196f3; */
	z-index: 1;
}

.btn-management {
	line-height: 0.8;
	padding: 8px 0;
	line-height: 0.8;
	font-size: 16px;
	/* font-weight: 400; */
	/* position: absolute; */
	width: 100%;
	/* border-radius: 4px; */
	/* padding: 12px; */
	color: #333;
	text-align: center;
	/* display: inline-block; */
	/* background-color: #2196f3; */
	z-index: 1;
}

.btn-management a {
	color: #999999;
}


/*.btn-reservation:hover{
        background-color: #FFC107;
        }*/

        .btn-real-res {
        	position: absolute;
        	margin-top: 50px;
        	width: 100%;
        	z-index: 5;
        	text-align: center;
        }

        .facebook-login-auth {
        	color: #3b5998;
        	border: 1px solid #3b5998;
        	font-weight: 700;
        	display: inline-block;
        	line-height: 36px;
        	padding: 0 10px 0 0;
        	text-decoration: none;
        	cursor: pointer;
        	min-width: 120px;
        	border-radius: 4px;
        	margin-left: 15px;
        }

        .fa-facebook-official {
        	display: inline-block;
        	vertical-align: text-top;
        	padding: 0;
        	/* background-image: url(/images/2014/sprites/icons-header-336d99fe71.png); */
        	width: 37px;
        	/* height: 38px;*/
        	padding-left: 2px;
        	float: left;
        }

        .btn-signup {
        	border: 1px solid #d93325;
        	background-color: #a81707;
        	color: #3b5998;
    /*border: 1px solid #3b5998;
    background-color: #3b5998;*/
    font-weight: 700;
    line-height: 36px;
    padding: 0 10px 0 0;
    text-decoration: none;
    cursor: pointer;
    min-width: 120px;
    border-radius: 4px;
    text-align: center;
    color: #ffffff;
    display: inline-block;
    margin-left: 15px;
    margin-right: 15px;
}

.column {
	overflow: hidden;
	background: #f9f9f9;
	border-radius: 5px;
	border: 1px solid #ccc;
	min-height: 390px;
}

.join-block {
	padding: 10px 15px;
	font: bold 12px/30px Arial, Helvetica, sans-serif;
	color: #000;
}

div.banner {
	background: #f8f1f1;
	position: relative;
	min-height: 339px;
}

.city__cta-bit {
	-webkit-transform: translateY(-50%);
	-ms-transform: translateY(-50%);
	transform: translateY(-50%);
	top: 50%;
	left: 121px;
	padding: 30px;
	position: absolute;
	width: 350px;
	height: 350px;
}

.gmnoprint a,
.gmnoprint span,
.gm-style-cc {
	display: none;
}

.gmnoprint div {
	background: none !important;
}

.gm-style-cc {
	display: none;
}

a[href^="http://maps.google.com/maps"],
a[href^="https://maps.google.com/maps"],
a[href^="https://www.google.com/maps"] {
	display: none !important;
}

.gmnoprint:not(.gm-bundled-control) {
	display: none;
}

.nav-tabs {
	background: #ffffff;
	border: 0;
	border-radius: 3px;
	padding: 0 15px;
}

input,
input:before,
input:after {
	-webkit-user-select: initial;
	-khtml-user-select: initial;
	-moz-user-select: initial;
	-ms-user-select: initial;
	user-select: initial;
}

.tm-home-box-1 {
    /*background-image: -webkit-linear-gradient(269deg, #ffd000 0%, #ffb300 100%);
    background-image: linear-gradient(-179deg, #ffd000 0%, #ffb300 100%);*/
    width: 100%;
    padding: 40px 20px;
    border-radius: 0 0 5px 5px;
    min-height: 255px;
}

#box-prosearch {
	height: 84vh;
	border-radius: 4px;
	background: #fff;
	/* min-width: 33rem; */
	overflow: hidden;
	z-index: 10;
	overflow-y: scroll;
	-webkit-overflow-scrolling: touch;
	/* margin-top: 15px; */
}

.a-link-item {
	width: 100%;
	/* padding-top: 20px; */
	min-height: 280px;
	margin-top: 0px;
	margin-bottom: 10px;
	/*border-radius: 15px;*/
	/*border: 1px solid #cccccc2e;*/
	padding: 10px;
	box-shadow: 2px 5px 7px 2px rgba(0, 0, 0, 0.15);
	background: #f5f5f5; 
}

.item-thumbnail2 {
	/* position: absolute; */
	/* display: inline-block; */
	/* float: left; */
	border-radius: 13px;
	/* margin-top: 60px; */
	width: 235px;
	height: 150px;
	/* margin-bottom: 3px; */
	/* overflow: hidden; */
	background-color: #ddd;
	/* cursor: pointer; */
	/* margin-left: 1%; */
}

.item-thumbnail2 img {
	width: 100%;
	height: 100%;
	border-radius: 4px;
}

.a-link-item h2 {
	position: relative;
	font-size: 15px;
	/* margin-left: 7%; */
	width: 64%;
	margin-top: 0;
}

.hotel_num {
	left: 10px;
	position: absolute;
	background: #ffffff;
	border-radius: 8px 0;
	font-weight: bold;
	border: 1px solid #3b5998;
	font-size: 13px;
	color: #3b5998;
	padding: 5px;
}

.box-province {
	display: inline-block;
	/* margin-left: 52%; */
	width: 30%;
	color: #100f0f;
	position: absolute;
	bottom: 10px;
	/* margin-top: -35px; */
}

.car-type {
	/* margin-top: -9px; */
    /* position: relative;
    z-index: 1;
    color: #000; */
    /* margin-left: 50%; */
    /* padding: 1px 3px;
    border-radius: 3px;
    display: inline-block; */
}

.pax {
	/* margin-top: -9px; */
	position: relative;
	z-index: 1;
	color: #000;
	padding: 1px 3px;
	border-radius: 3px;
	display: inline-block;
}

#facilities {
	margin-top: 42px;
	/* position: absolute; */
}

#box-cost-view {
	right: 0;
	position: absolute;
	margin-right: 20px;
	/*padding: 0 12px;*/
	/* margin-top: 62px; */
	bottom: 15px;
}

.product_r {
	text-align: center;
	margin-bottom: 15px;
}

.product_r .base_price {
	color: #f60;
	display: block;
	margin-bottom: 0;
	line-height: 1.2;
}

.sala {
	display: block;
	/* font-family: 'Open Sans',sans-serif; */
	font-weight: 400;
	/* color: #757575; */
	font-size: 18px;
	/* font-weight: 600; */
	/* margin-top: 30px; */
	/* padding: 0 19px; */
	/* margin-bottom: 20px; */
}

.views-item a span {
	color: #fff;
	font-size: 15px;
}

.views-item {
	color: #FFFFFF;
	background: #3b5998;
	text-align: center;
	padding: 10px 60px;
	position: relative;
	border-radius: 25px;
	font-weight: 600;
	cursor: pointer;
}

#i-list {
	float: right;
	right: 15px;
	position: absolute;
	border: 1px solid #3b5998;
	font-size: 20px;
	text-align: center;
	width: 82px;
	color: #000;
	height: 85px;
	border-radius: 15px;
	cursor: pointer;
}

#capacity {
	margin-top: 9px;
	font-size: 12px;
	padding: 0;
	margin-bottom: 0;
}
#i-list div{
	font-size: 15px;
	color: #333;
}

.type-t {
    /* position: absolute;
    margin-top: 15px; */
    font-size: 15px;

}

#box-plancefrom li {
	list-style: none;
	padding: 8px 15px;
	/* padding-left: 0; */
	font-size: 15px;

	border-radius: 25px;
}

#box-planceto li {
	list-style: none;
	padding: 8px 15px;
	/* padding-left: 0; */
	font-size: 15px;
	border-radius: 25px;
}

.box-info {
	border: 1px solid #ebefc2;
	height: 500px;
	padding: 17px 3px;
	background: #3b5998;
	border-radius: 5px;
}

#box-plancefrom li:hover {
	background-color: #3b5998;
	color: #fff;
}

#box-planceto li:hover {
	background-color: #ffcd00;
}

.box-plancefrom {
	padding-left: 0;
	display: none;
	max-height: 75vh;
	position: absolute;
	overflow-x: hidden;
	overflow-y: scroll;
	overflow: hidden;
	width: 92%;
	padding: 0px;
	/* margin-left: -13px; */
	z-index: 100;
    /* border-bottom: 1px solid rgb(221, 221, 221);
    border-right: 1px solid rgb(221, 221, 221);
    border-left: 1px solid rgb(221, 221, 221);*/
    border-radius: 0px 5px 5px;
    overflow-y: scroll;
    -webkit-overflow-scrolling: touch;
    overflow-x: none;
}

.list li {
	background: rgb(255, 255, 255);
	margin-bottom: 8px;
}

.box-planceto {
	padding-left: 0;
	display: none;
	max-height:75vh;
	position: absolute;
	overflow-x: hidden;
	overflow-y: scroll;
	overflow: hidden;
	width: 92vw;
	padding: 0px;
	/* margin-left: -13px; */
	z-index: 100;
	/* border-radius: 0px 5px 5px; */
	overflow-y: scroll;
	overflow-x: none;
	-webkit-overflow-scrolling: touch;
}

#box-plancefrom {
	padding-left: 0;
	margin-top: 15px;
}

#box-planceto {
	padding-left: 0;
	margin-top: 15px;
}

.form-control,
.form-group .form-control {
	border: 1px solid #E0E0E0 !important;
	display: block;
	width: 100%;
	height: 34px;
	border-radius: 5px !important;
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.42857143;
	color: #555;
	background-color: #fff;
	background-image: none;
	border: 1px solid #ccc;
	border-radius: 5px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
	-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
	-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}

.form-control {}

.search-transfer-product {
	margin-top: 20px;
	color: #fff;
	background: #3b5998;
	padding: 10px 20px;
	border-radius: 5px;
	cursor: pointer;
	float: right;
	font-weight: 400;
	margin-right: -12px;
}

#ul-header {
	padding: 3px 12px;
	text-align: center;
	padding-top: 35px;
	border-top: 1px solid #ddd;
	border-right: 1px solid #ddd;
	border-left: 1px solid #ddd;
	border-radius: 5px 5px 0 0;
	border-radius: 4px;
}

#ul-header2 {
	padding: 3px 0;
	text-align: center;
	padding-top: 12px;
	/* border-top: 1px solid #ddd; */
	/* border-right: 1px solid #ddd; */
	/* border-left: 1px solid #ddd; */
	/* border-radius: 5px 5px 0 0; */
	border-radius: 4px 4px;
	display: none;
	/* margin-bottom: 12px; */
	background: #fff;
}

.table-striped>tbody>tr:nth-of-type(odd) {
	background-color: #ddd !important;
}

.not-found {
	text-align: center;
	margin-top: 50px;
	font-size: 20px;
	color: red;
	font-weight: 400;
}
#box-pro-service{
	height: 55vh;
}
.pax-person{
	color: #f44336;
}

.boxpax{
	overflow-y: scroll;
	height: 80vh;
	-webkit-overflow-scrolling: touch;
}
.boxpax2{
	overflow-y: scroll;
	height: 80vh;
	-webkit-overflow-scrolling: touch;
}
.typeservice{
	padding: 8px 22px;
	list-style: none;
	font-size: 16px;
}

@media screen and (max-width: 767px) {
	#product_service{
		height: 65vh;
		overflow-y: scroll;
		-webkit-overflow-scrolling: touch;
		width: 100%;
		padding: 8px 25px;
		list-style: none;


	}
	.box-menu-select {

		/* height: 11vh  !important; */

	}
	#paxrel{
		height: 65vh;
		overflow: scroll;
	}
	#bodyClick {
		right: 229px !important;
	}
	#i-list {
		margin-right: 20px !important;
		margin-top: 5px !important;
		float: right;
	}
	.main-raised {
		margin: -60px 15px 0 !important;
		margin-bottom: 20px !important;
	}
	#banner-right {
		margin-top: 20px;
	}
	.btn-signup {
		display: block;
		margin: 0;
	}
	.facebook-login-auth {
		display: block;
		margin: 0;
	}
	.container {
		/*margin-bottom: 20px;*/
	}
	div.banner {
		min-height: 125px;
	}
	.column {
		min-height: 290px;
	}
	.box-info {
		margin-top: 20px;
	}
	#banner-right {
		display: none;
	}
	#btn-real-res {
		width: 100%;
	}
	.a-link-item h2 {
		/* position: relative; */
		/* font-size: 17px; */
		/* margin-left: 14%; */
		width: 100%;
		/* margin-top: 15px; */
		font-size: 15px !important;
		font-weight: 500;
	}
	.box-province {
		display: inline-block;
		width: 150px;
		margin-left: 3px;
		/* margin-top: 140px; */
		float: left;
		text-align: center;
	}
	#box-cost-view {
		margin-right: 20px !important;
		margin-top: 100px !important;
		padding: 0;
	}
	.a-link-item {
		/* padding: 8px; */
		min-height: 240px;
	}
	.item-thumbnail2 {
		width: 150px;
		height: 100px;
		/*margin-left: 10px;*/
		/*margin-top: -8px;*/
	}
	.views-item {
		padding: 10px 30px;
	}
	#join-btn {
		color: #3b5998;
		border: 1px solid ;
		width: 49%;
		display: inline-block;
		padding: 12px;
		font-size: 16px;
		font-weight: 200;
	}
	#private-btn {
		background: #3b5998;
		color: #fff;
		/* background-color: #333; */
		border: 1px solid ;
		padding: 12px;
		width: 49%;
		font-size: 16px;
		font-weight: 200;
		display: inline-block;
	}
	#box-pro-service {
		height: 65vh;
	}
}

@media screen and (max-width:320px) {
	/*@media only screen and (max-device-width: 568px) and (min-device-width: 320px) and (orientation: portrait){*/
		#box-pro-service {
			height: 45vh;
		}
		#product_service{
			height: 61vh;
			overflow-y: scroll;
			width: 100%;
			-webkit-overflow-scrolling: touch;
			padding: 8px 25px;
			list-style: none;

		}
		#paxrel{
			height: 55vh;
			overflow: scroll;
			-webkit-overflow-scrolling: touch;
		}
		.box-province {
			margin-left: 3px;
		}
		.a-link-item {
			/* padding-left: 0px; */
			min-height: 240px;
		}
		#i-list {
			margin-right: 20px !important;
			margin-top: 5px !important;
			float: right;
		}
		#private-btn {
			background: #3b5998;
			color: #fff;
			border: 1px solid #3b5998;
			padding: 12px;
			width: 49%;
			display: inline-block;
		}
		#join-btn {
			color:#3b5998 ;
			border: 1px solid #3b5998;
			width: 49%;
			display: inline-block;
			padding: 12px;
		}
		#pro-item {
			height: 315px !important;
		}
		.hotel_num {
			/* margin-top: -14px; */
		}
		.product_r {
			padding-bottom: 0px;
		}
		#facilities {
			margin-top: 15px;
			/* margin-left: 50px; */
			/* position: absolute; */
		}
		.car-type {
			/* padding: 0 */
		}
		.type-t {
        /* position: absolute;
    margin-top: -15px;
    margin-left: 50px;
    padding: 0; */
}
.box-info {
	max-height: 100px;
}
#box-cost-view {
	margin-right: 20px !important;
	margin-top: 100px !important;
	padding: 0;
}
#marginBox{
	/* height: 54vh !important;   */
}
.lng_find_again{
	/*width: 100% !important;*/
	margin-right: 0px !important;
	margin-bottom: 15px !important;
}
.lng-yes2{
	margin-left: 0 !important;
	/*width: 100% !important;*/
        /* margin-right: 0px !important;
        margin-bottom: 15px !important; */
    }
}

@media screen and (min-height: 600px) {
	.media-scroll {
		height: 300px;
	}
}

@media screen and (min-height: 660px) {
	.media-scroll {
		height: 350px;
	}
}

@media screen and (min-height: 730px) {
	.media-scroll {
		height: 400px;
	}
}


/*.tm-yellow-gradient-bg{
            background: linear-gradient(to bottom, #f5d11d 0%,#f3d10e 1%,#efcf1c 2%,#fccd0d 4%,#f7ca0d 5%,#f9cb1e 6%,#f7cb10 7%,#f8cc14 8%,#f0c40c 54%,#edc50c 55%,#e9c108 71%,#ecc008 78%,#e6be06 91%,#e9bd06 93%,#e8bc06 100%);
            }*/

            .form-control2 {
            	display: block;
            	width: 100%;
            	height: 34px;
            	padding: 6px 12px;
            	font-size: 14px;
            	line-height: 1.42857143;
            	color: #555;
            	background-color: #fff;
            	background-image: none;
            	border: 1px solid #ccc;
            	border-radius: 4px;
            	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            	box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            	-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            	-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            	transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            }

            .form-control2,
            .form-group .form-control2 {
            	border: 0;
            	background-image: linear-gradient(#9c27b0, #9c27b0), linear-gradient(#D2D2D2, #D2D2D2);
            	background-size: 0 2px, 100% 1px;
            	background-repeat: no-repeat;
            	background-position: center bottom, center calc(100% - 1px);
            	background-color: transparent;
            	transition: background 0s ease-out;
            	float: none;
            	box-shadow: none;
            	border-radius: 0;
            	font-weight: 400;
            }

            .pac-item {
            	/*    cursor: default !important;*/
            	padding: 10px !important;
    /*    text-overflow: ellipsis !important;
    overflow: hidden !important;
    white-space: nowrap !important;
    line-height: 30px !important;
    text-align: left !important;
    border-top: 1px solid #e6e6e6 !important;
    font-size: 11px !important;
    color: #999 !important;*/
}


/* ******************************** */

.material-button-anim {
	position: relative;
	padding: 0px 17px 27px;
	text-align: center;
	max-width: 320px;
	margin: 0 auto 20px;
	height: 90px;
}

.material-button {
	position: relative;
	top: 0;
	z-index: 1;
	width: 50px;
	height: 50px;
	font-size: 1.5em;
	color: #fff;
	background: #3b5998;
	opacity: 0.85;
	border: none;
	border-radius: 50%;
	box-shadow: 0 3px 6px rgba(0, 0, 0, .275);
	outline: none;
}

.blinks {
	width: 50px;
	height: 50px;
	-webkit-animation: NAME-YOUR-ANIMATION 1s infinite;
	/* Safari 4+ */
	-moz-animation: NAME-YOUR-ANIMATION 1s infinite;
	/* Fx 5+ */
	-o-animation: NAME-YOUR-ANIMATION 1s infinite;
	/* Opera 12+ */
	animation: NAME-YOUR-ANIMATION 1s infinite;
	/* IE 10+, Fx 29+ */
}

@-webkit-keyframes NAME-YOUR-ANIMATION {
	0%,
	49% {
		background-color: #d2d2d2;
		/*    border: 3px solid #e50000;*/
	}
	50%,
	100% {
		background-color: #3b5998;
		/*    border: 3px solid rgb(117,209,63);*/
	}
}

.pac-container:after {
	/* Disclaimer: not needed to show 'powered by Google' if also a Google Map is shown */
	background-image: none !important;
	height: 0px;
}

.pac-container {
	z-index: 10000000 !important;
}

.box-shadow-customize {
	/* box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3); */
}
@keyframes tag_input_search { 
	50% { border-color: #999; } 
}
.search_focus {
	animation-name: tag_input_search;
	animation-duration: .5s;
	animation-timing-function: step-end;
	animation-iteration-count: infinite;
	animation-direction: alternate;
}
#move-product{
	height: 71vh;
	overflow-y: scroll;
	-webkit-overflow-scrolling: touch;

}
</style>





<template id="action-sheet.html">
	<ons-action-sheet id="sheet" cancelable title="From template">
		<ons-action-sheet-button icon="md-square-o" onclick="app.hideFromTemplate()">Label</ons-action-sheet-button>
		<ons-action-sheet-button icon="md-square-o" onclick="app.hideFromTemplate()">Label</ons-action-sheet-button>
		<ons-action-sheet-button icon="md-square-o" onclick="app.hideFromTemplate()" modifier="destructive">Label</ons-action-sheet-button>
		<ons-action-sheet-button icon="md-close" onclick="app.hideFromTemplate()">Cancel</ons-action-sheet-button>
	</ons-action-sheet>
</template>
<script type="text/javascript">
	var app = {};
	
</script>

<script src="<?=base_url();?>assets/script/booking_main.js?v=<?=time();?>"></script>
<script src="<?=base_url();?>assets/script/map.js?v=<?=time();?>"></script>
