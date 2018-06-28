
<link href="<?php echo base_url(); ?>assets/frontend/responsive.css" rel="stylesheet" type="text/css" />

<div class="modal fade login-model" id="login-model" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm res_login" role="document" >
        <div class="modal-content modal_res">
			<div class="modal-header" style="background-color:#34495e;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1;margin-top: 7px;"><span aria-hidden="true" style="color:#fff;font-size: 25px;">&times;</span></button>
				<h4 class="modal-title" style="color:#fff;font-size: 25px;">Customer Sign In</h4>
			</div>
            <!--div class="login-logo" style="background-color:#ecb116;">
                <h2>Sign In</h2>
            </div-->
            <div class="login-box-inner" style="padding: 6px 25px;">
               <!-- <h3 align="center">Customer Login</h3>
                <br>-->
				<div id="lFrom">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="email">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                    </div>
					<div>&nbsp;</div>
                    <!--input type="submit" class="btn btn-danger" style="width:100%;" value="Login"-->
					<div class="row">
                        <div class="col-xs-12">
                           <button id="login124" class="btn btn-default col-xs-12">Login</button>
                        </div>
                     </div>
					
					<label class="col-md-61">
							
						</label>

					
						<div class="row">
							<div class="col-xs-12">
							   <p class="social-text">Or login with</p>
							</div>
						 </div>
						 
						<div class="row">
							<div class="col-xs-12 col-sm-12">
							   <a href='<?php echo base_url('Customer/sociallogin/Facebook');?>' class="btn btn-primary col-xs-12 btn-facebook">
							   <i class="fa fa-facebook"></i> Facebook
							   </a>
							</div>
							
						 </div>
							
                     
				
						<!--<div class="row">
							<center>
							<ul class="social-network social-circle onwhite ">
								<li><a href="<?php echo base_url('Customer/sociallogin/Facebook');?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i> Facebook</a></li>-->
								<!--<li><a href="<?php echo base_url('Customer/sociallogin/Twitter');?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?php echo $this->google->get_login_url(); ?>" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="<?php echo base_url().$this->config->item('linkedin_redirect_url') ;?>" class="icoLinkedin" title="Google +"><i class="fa fa-linkedin"></i></a></li>-->
						<!--	</ul>
							</center>
						</div>-->
					

					<hr class="col-md-12">
					<div class="row">
					   <div class="col-xs-6">
						  <a  class="btn btn-danger col-xs-12 btn-facebook" href="#" data-toggle="modal" data-target=".register-model" style="float:right;margin-top: 5px;" class="signup_model"><i class="fa fa-edit"></i> Signup</a>
					   </div>
					   <div class="col-xs-6">
							<a href="<?php echo base_url(); ?>Login" class="btn btn-danger col-xs-12 btn-facebook"><i class="fa fa-user-plus"></i> Partner Login</a>
						</div>
					</div>	
                    <!--hr style="width:100%;"-->
</div>
                
            </div>
        </div>
    </div>
</div>
<!-- REGISTERATION MODEL  -->
<div class="modal fade register-model" id="register-model" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document" style="margin: 10px auto;">
        <div class="modal-content">
			<div class="modal-header" style="background-color: #0d337f;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1;margin-top: 7px;"><span aria-hidden="true" style="color:#fff;font-size: 25px;">&times;</span></button>
				<h4 class="modal-title" style="color:#fff;font-size: 25px;">Signup / Register</h4>
			</div>
            <!--div class="login-logo" style="background-color: #ff5a5f;">
                <h2>Signup/Register</h2>
            </div-->
            <div class="login-box-inner" style="height:600px; overflow-y:scroll;">
                
                
				<div id="signupFrom">
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 col-md-3 control-label">First Name</label>
                        <div class="cols-sm-10 col-md-9">
                            <div class="input-group1">
								
                                <input type="text" class="form-control test" name="fname" id="fname" placeholder="Enter your First Name" />
                            </div>
							 <span id="fnameError" class="error">
							</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 col-md-3 control-label">Last Name</label>
                        <div class="cols-sm-10 col-md-9">
                            <div class="input-group2">
								<!--<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>-->
                                <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter your Last Name" />
                            </div>
							 <span id="lnameError" class="error">
							</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label cols-sm-2 col-md-3" for="text">Gender</label>
                        <div class="cols-sm-10 col-md-9">
                            <div class="input-group2">
                                <!--<span class="input-group-addon"><i class="fa fa-genderless" aria-hidden="true"></i></span>-->
                                <label class="radio-inline" style="margin: 3px 0 0 10px;">
                                    <input type="radio" name="gender" id="gender" value="Male" checked>Male</label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" value="Female" id="gender">Female</label>
                            </div>
							<span id="genderError" class="error">
							
							</span>
                        </div>
                    </div>

					
						
					

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 col-md-3 control-label">Date of Birth</label>
                        <div class="cols-sm-10 col-md-9">
							
                            <div class="input-group">
								
                             <!--   <span class="input-group-addon"><i class="fa fa-birthday-cake" aria-hidden="true"></i></span>-->
								<input type="text" id="dob" data-format="DD-MM-YYYY" data-template="D MMM YYYY" name="dob" value="<?php echo date('d-m-Y');?>" class="form-control date">
								<!--input type="text" class="dob"  placeholder="Choose" name="dob" id="dob" style="width:100%;height:50px;"-->
								
								<!--div class="col-md-3">
								<select id="dobday" class="form-control" style="height: 45px!important;" name="day"></select>
								</div>
								<div class="col-md-3">
								<select id="dobmonth" class="form-control" style="height: 45px!important;" name="month"></select>
								</div>
								<div class="col-md-3">
								<select id="dobyear" class="form-control" style="height: 45px!important;" name="year"></select>
								</div-->
			
                                <!--input class="form-control" id="dpd1" type="date" name="dob" maxlength="10"/-->
                            </div>
							<span id="dobError" class="error">
							
							</span>
                        </div>
                    </div>
					
					
					<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
					<script src="<?php echo base_url(); ?>assets/combodate.js"></script>
					<script>
					$(function(){
						$('.date').combodate({customClass: 'form-control'});    
						$('#datetime').combodate(); 
						$('#time').combodate({
							firstItem: 'name', //show 'hour' and 'minute' string at first item of dropdown
							minuteStep: 1,
							customClass: 'form-control'
						});   
					});
					</script>
					<!--div>
					
        FromDate: <input type="text" id="fromdate" class="datepicker"/>
        ToDate: <input type="text" id="todate" class="datepicker"/>
        
					</div-->	
					<script>
					
						/* $(document).ready(function() {    
            var time_value = '01.12.2000';
            var values = time_value.split(".");
            var parsed_date = new Date(values[2], values[1], values[0]);
            $("#todate").datepicker({dateFormat: 'dd/mm/yy',changeMonth: true,changeYear: true,yearRange:"-150:c",minDate:parsed_date,maxDate: "+0d"});
             var todate="<?=str_replace('-', '/','19-11-2015');?>"
            if (todate != 'NULL') {
                $("#todate").datepicker("setDate",todate);
            }

            $( "#fromdate" ).datepicker({ dateFormat: 'dd/mm/yy',changeMonth: true,     changeYear: true,yearRange:"-150:c",minDate:parsed_date,maxDate: "+0d"});
            var fromdate="<?= str_replace('-', '/','21-11-2015');?>"
           if(fromdate!='NULL')
		   {
			   $("#fromdate").datepicker("setDate",fromdate);
		   }
						}); */
		   
						/* $(function() {
							$( ".dob" ).datepicker({
								//numberOfMonths:1,
								dateFormat : 'dd/mm/yy',
								//changeMonth: true,
								//changeYear: true,
								yearRange: '-100y:c+nn',
								maxDate: '-1d'
							});
						}); */
					</script>
                    <div class="form-group">
                        <label for="email" class="cols-sm-2 col-md-3 control-label">Your Email</label>
                        <div class="cols-sm-10 col-md-9">
                            <div class="input-group2">
                                <!--<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>-->
                                <input type="email" class="form-control" name="email1" id="email1" placeholder="Enter your Email" />
                              
							
							</span>
                            </div>
							  <span id="email_addressError" class="error">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="cols-sm-2 col-md-3 control-label">Password</label>
                        <div class="cols-sm-10 col-md-9">
                            <div class="input-group2">
                               <!-- <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>-->
                                <input type="password" class="form-control" name="password1" id="password1" placeholder="Enter your Password" required="" />
                            </div>
                            <span id="passwordError" class="error">
							
							</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="cols-sm-2 col-md-3 control-label">Phone Number</label>
                        <div class="cols-sm-10 col-md-9">
                           
                                
								<select name="countrycode" class="form-control" id="countrycode" style="width:40%;float:left;">
									
									<option value="0">Select Country Code</option>
									<?php 
									$data=$this->db->get('tbl_phonecode')->result_array(); foreach ($data as $a) {
										//$country_active = $a['is_deactivate'];
										//if($country_active == "N")
										//{
										?>
									<option value="<?php echo $a['country_code_plus'];?>">
										<?php echo $a['name'];?>(<?php echo $a['country_code_plus'];?>)
									</option>
									<?php 
									//}
									} ?>
									
								</select><span style="float:left;"><input type="text" class="form-control col-md-9" name="pnumber" id="pnumber" placeholder="Enter your Phone Number" /></span>
								
                           
							<span id="phoneError1" class="error">
							
							</span>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="name" class="cols-sm-12 control-label" style="font-size:12px;font-weight:normal;    text-transform: none;">By Clicking Sign up or Continue with, I agree to Scubbi's <span style="color:#1aaff9;"><span class="term" style="color:#1aaff9;" >Terms of Service</span>, <span class="term"  style="color:#1aaff9;">Payments Terms of Service</span>, <span id="privacy" style="color:#1aaff9;">Privacy Policy</span></span></label>
					</div>
					<div class="row">
                        <div class="col-xs-5">
                           <button  id="reg1" class="btn btn-default col-xs-12">Signup/Register</button>
                        </div>
						<div class="col-xs-2">
						 <p >Or</p>
						</div>
						<div class="col-xs-5">
							
						   <a href='<?php echo base_url('Customer/sociallogin/Facebook');?>' class="btn btn-primary col-xs-12 btn-facebook">
						   <i class="fa fa-facebook"></i> Facebook
						   </a>
							
						</div>
                     </div>
                  
				
						<!--<div class="row">
							<center>
							<ul class="social-network social-circle onwhite ">
								<li><a href="<?php echo base_url('Customer/sociallogin/Facebook');?>" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i> Facebook</a></li>-->
								<!--<li><a href="<?php echo base_url('Customer/sociallogin/Twitter');?>" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="<?php echo $this->google->get_login_url(); ?>" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="<?php echo base_url().$this->config->item('linkedin_redirect_url') ;?>" class="icoLinkedin" title="Google +"><i class="fa fa-linkedin"></i></a></li>-->
					<!--		</ul>
							</center>
						</div>-->
					
                    <div id="flash"></div>
               </div>
			</div>
		</div>
	</div>
</div>
	

	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Terms And Conditions</h2>
        </div>
        <div class="modal-body" style="text-align:justify;height:600px; overflow-y:scroll;">
          <p>Scubbi.com is a web base marketplace between diver and dive center, you is diver or user, dive center can be the host of provide dive service/training course/guidance tour/liveaboard package.</p>
		  <p>READ THESE TERM AND CONDITION BEFORE USING THIS WEBSITE TO BOOK AN ONLINE RESERVATION. YOUR ACTION TO USE OUR WEBSITE AND ONLINE RESERVATION SYSTEM HAVE CONFIRMS THAT YOU HAVE AGREED AND ACCEPTED THESE TERMS AND CONDITIONS. IF YOU DO NOT AGREE WITH ANY PART OF THESE TERMS AND CONDITIONS, YOU MAY NOT PROCEED TO USE ANY SERVICE OR ONLINE RESERVATION SYSTEM FROM THIS WEBSITE.</p>
		  <p>SCUBBI.COM RESERVES THE RIGHT TO AMEND OR CHANGE THESE TERMS AND CONDITIONS AT ANY TIME BY POSTING THE UPDATE TERMS ON OUR WEBSITE.THOSE AMENDMENTS WILL BECOME EFFECTIVE IMMEDIATELY UPON POSTING.</p>
		  <h4 style="color:red;font-weight:bold;">Background</h4>
		  
			<p> I) Scubbi Sdn Bhd (“Scubbi”) has developed a website (“www.scubbi.com”) and an online reservation system (“Online Reservation System”) which allow individuals (“Users”) to browse, compare, book and reserve (“Reservation”) directly with a dive center or liveaboard (“Dive Center”) including dives, diving packages, guided tours, accommodation, courses and equipments (“Diving Services”).</p>
			<p> II) By browsing, using the www.scubbi,com and its Online Reservation System, you acknowledge and agree that you have read, understood, agreed to these terms and conditions.</p>
		  <h4 style="color:red;font-weight:bold;">Scope of service</h4>
		  
		  <p>www.scubbi.com is an intermediary platform between Users and Dive Center, that allow Users to directly book any Diving Services with Dive Center through our Online Reservation System. With features list down as below:</p>
		  <p>&nbsp;&nbsp;1)&nbsp;&nbsp;Reservation that have been made through Online Reservation System will constitute a direct contract between Users and Dive Center in accordance with the terms and conditions list out in the Reservation, including but not limited to fees, cost, charge and taxes and any cancellation or other fees from Dive Center. Users are responsible for reading and understanding the Dive Center terms and conditions before Users decide to make a Reservation with the particular Dive Center</p>
		  
		  <p>&nbsp;&nbsp;2)&nbsp;&nbsp;Scubbi will not charge you for the use of our website or any of its services unless specified so.</p>
		  
		  <p>&nbsp;&nbsp;3)&nbsp;&nbsp;Information display on the website is based on the information provided by the Dive Center. The Dive Center will confirm these information provided is accurate, up-to-date and will not be misleading in any ways. Scubbi does not guarantee that all the information is accurate, complete or free from errors.</p>
		  
		  <p>&nbsp;&nbsp;4)&nbsp;&nbsp;Scubbi is not a representative of any Dive Center in our platform, Scubbi will not be responsible for all the quality, safety, suitability, affordability and service delivery from Dive Center.</p>
		 
		 <p>&nbsp;&nbsp;5)&nbsp;&nbsp;Scubbi will ask Users to comment on all aspects of the service provide by Dive Center and may post the reviews on the website</p>
		 
		 <h4 style="color:red;font-weight:bold;">Privacy</h4>
		  <p>Scubbi is committed to protect Users personal information. Scubbi will only collect, use and disclose Users personal information in accordance with the Privacy Policy. By using the www.scubbbi.com and its Online Reservation System Users confirm that they have go through the Scubbi terms and conditions and agree and confirm that term of the privacy policy is reasonable.</p>
		  <h4 style="color:red;font-weight:bold;">Prices*</h4>
		  <p>Dive Center ensure that Diving Services showed on www.scubbi.com are offered at the most affordable price available through any booking or reservation method with respect to the applicable dates, booking terms and inclusions in the Diving Services at the time of booking. Unless otherwise indicated in the Dive Center terms, all rates and prices listed through Online Reservation System include the entire cost for all services and charges related to the Diving Services, including but not limited to all surcharges, taxes and levies.</p>
		  <p>The price of Diving Services listed in www.scubbi.com is decided by Dive Center, Scubbi represents as an intermediate platform to connect both Dive Center and Users by providing an online marketplace, support, payment solution to them. In the event of any cancellation of bookings by the Users, Scubbi reserves the right to charge service fee on your total payment to cover Scubbi operations expenses.</p>
		  <p>The exchange rate on www.scubbi.com is determined on the date of payment made and will be vary due the daily fluctuation of different currency exchange rate.</p>
		  <h4 style="color:red;font-weight:bold;">Availability*</h4>
		  <p>Diving Services displayed in www.scubbi.com is available for Users to book immediately and confirm upon completing the booking process through the Online Reservation System, and</p>
		  <p>&nbsp;&nbsp;1)&nbsp;&nbsp;For Diving Services qualified in the date Users book, Dive Center agrees to provide such service only in strict accordance to the specific date Users book before.</p>
		  <p>&nbsp;&nbsp;2)&nbsp;&nbsp;Dive Center have the right to reserve to confirm the availability on specific dates with the range upon the booking request for Dive Services expressed in units other than days.</p>
		  <p>&nbsp;&nbsp;3)&nbsp;&nbsp;If Dive Center has limited availability during the date range specified in the booking, said availability will show up on a particular Dive Center page inside www.scubbi.com and Users will be notify immediately about the availability of Diving Services on the specific dates within the range so that Users can plan or choose an alternative arrangement accordingly.</p>
		  <h4 style="color:red;font-weight:bold;">Payment*</h4>
		  <p>All payment policies and its terms are set by the Dive Center. Scubbi will help facilitate the payments to the Dive Center and to its best of ability to protect and secure the payments made via our Online Reservation System.</p>
		  <h4 style="color:red;font-weight:bold;">Cancellation and booking policy*</h4>
		  <p>The Dive Center will clearly set out their own cancellation and booking policy in the Dive Center terms and condition.</p>
		  <p>During booking session, a certain percentage for deposit or full amount will be required to be paid to Dive Center to lock down the Dive Services for Users. Users upon confirmation of reservation on our Online Reservation System, Users are required to make payment to Scubbi, wherein the payment will be deposited by Scubbi to the by Dive Center.</p>
		  <p>Cancellation policy listed in www.cubbi.com also set by Dive Center. The cancellation period, amount and term & condition are all determined individually by each Dive Center. Scubbi will play as a middle role between Users and Dive Center to make sure that both party will not encounter any loss from that particular transaction.</p>
		  <p>For your information, Scubbi will charge a certain percentage of service fee on your cancellation in order to cover the Scubbi daily operation cost.</p>
		  <p>The amount that will be refunded Users by Dive Center will be limited to the payment that Users has paid to the Dive Center less any cancellation penalty and service fees due to Scubbi or Dive Center. Dive Center and Scubbi will not be responsible for other costs such as airfare, boat transportation fee, accommodation fee or any other costs that is not directly or included in the Dive Services.</p>
		  <h4 style="color:red;font-weight:bold;">Special cases</h4>
		  <p>Dive Center may reserve the right to cancel or offer an alternative date at their own discretion in the event that weather conditions on the date of the booking period is nor permissible for diving due to safety concerns.</p>
		  <p>In the event that the Dive Center is unavailable to provide the Diving Services as a result of natural disaster, tornado, volcano eruption, tsunami, flood, earthquake, or act of war, riot, and etc; the Dive Center will to the best of its abilities attempt to notify all Users of any cancellations. The Dive Center also reserves the right to any cancellation or refund terms it deems to exercise due to such act of god events and completely beyond their control.</p>
		  <h4 style="color:red;font-weight:bold;">Responsibility</h4>
		  <p>Since Users are booking the Diving Services through the Online Reservation System, Users hereby agreed that Users have reviewed all the standard and requirements of Dive Center, including minimum diving certificate requirement, diving insurance requirement, personal information that Dive Center need Users to provide and forms that Dive Center requests Users to sign such as medical statement, liability release or assumption of risk agreement forms. As a diver you are responsible for understanding and complying with all the requirements stated by Dive Center before you make a reservation.</p>
		  <p>Anyone who failed to comply with the requirements may lead to your inability to enjoy the dive service and may cause late cancellation fee to be charge to Users.</p>
		  <h4 style="color:red;font-weight:bold;">Communication</h4>
		  
		  <p>www.scubbi.com provides a direct communication tool to allow Users to communicate with Dive Center to request additional information/inquiry, or to confirm reservation details. Scubbi is not responsible for verifying the accuracy of information provided by the Dive Center. Scubbi has a customer support team, which Users may contact or send their enquiry via our customer support email (email address) or online chat.</p>
		  
		  <h4 style="color:red;font-weight:bold;">Promotion</h4>
		  <p>Scubbi may issue promotion codes applicable to eligible Diving Services from time to time. Promotion codes can be redeemed by entering the code in the appropriate field during the booking procedure. If the promotion code does not apply on the Diving Services selected during the reservation process, a message will be display and outline the limit of the use of the promotion code.</p>
		  <p>Scubbi reserve the right to modify, cancel or postpone the promotion code at any time. Discounts and rebate are applicable only to the service provided by Scubbi. The promotion may be provided directly by Dive Center or from Scubbi.</p>
		  
		  <h4 style="color:red;font-weight:bold;">Disclaimer</h4>
		  <p>Scubbi have no warranty, representation, guarantee, expressed, implied or statutory with respect to the website, Online Reservation System, Dive Center information, Dive Center terms or others.</p>
		  <p>Scubbi will not be responsible or any entities affiliated with such as companies, directors, employees or agents be liable for any cost, loss, damage or injury for anyone, including without limiting the foregoing, cost, loss, damage or injury related to:</p>
		  <p>&nbsp;&nbsp;1)&nbsp;&nbsp;viruses or harmful components in software on the website, interruption, delay, or fail to use the website or system, and damage to computer equipment.</p>
		  <p>&nbsp;&nbsp;2)&nbsp;&nbsp;Inaccurate, incomplete, unreliable and misleading Dive Center information .</p>
		  <p>&nbsp;&nbsp;3)&nbsp;&nbsp;Implied of warranties and conditions of merchantability, fitness for a particular purpose.</p>
		  <p>&nbsp;&nbsp;4)&nbsp;&nbsp;Any act or omission of the Dive Center or its directors, officers, agents and employees including but not limited to any and all claim related to reservation or Dive Center Diving Services.</p>
		  
		  
		  <h4 style="color:red;font-weight:bold;">Personal use only</h4>
		  <p>Users agree that Users will not use www.scubbi.com or Online Reservation System for any purpose other than personal, non-commercial use. Users will not use the information for a competitive use and will not copy, display, download, re-sell, or deep link any information, content, service, product, image or software on the website without permission from Scubbi.</p>
		  <h4 style="color:red;font-weight:bold;">Intellectual Property</h4>
		  <p>Scubbi is the exclusive owner of all the right, title, content and interest in and all intellectual property with respect to the www.scubbi.com and its Online Reservation System. Scubbi reserve the right to remove Users reviews or comments form www.scubbi.com in such event that may be misleading or deemed to be offensive.</p>
		  <h4 style="color:red;font-weight:bold;">Legal structure and law</h4>
		  <p>Scubbi is a company that comply with the laws of Malaysia. These terms and conditions shall be applied in accordance with the law and regulation in Malaysia.</p>
		  
		  
		  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

	<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Privacy Policy</h2>
        </div>
        <div class="modal-body" style="text-align:justify;height:600px; overflow-y:scroll;">
          <p>Scubbi.com is committed to protecting your personal information. Scubbi will collect, use and disclose your personal information in accordance with this privacy policy. Based on this privacy policy, “personal information” refers to the identification of an individual.</p>

		  <h4 style="color:red;font-weight:bold;">Collection of personal information</h4>
		  
			<p>When you confirm a booking with a dive center using Scubbi.com’s online reservation system, Scubbi.com will collect your personal information such as your name, telephone number, address, email address, payment details including credit card information, details of your booking reservation example like travel date, name of person travelling with you.</p>
			<p>Before you confirm any reservation, you are not require to provide any personal information to any party.</p>
			
		  <h4 style="color:red;font-weight:bold;">Use of your personal information</h4>
		  
		  <p>Scubbi.com will not use personal information collected from you for any purpose other than as follow:</p>
		  
		  <p>&nbsp;&nbsp;1)&nbsp;&nbsp;to enable you to complete the reservation and to confirm your booking with the dive center.</p>
		  
		  <p>&nbsp;&nbsp;2)&nbsp;&nbsp;to support both side communication between you and dive center, using our communication tool inside our portal.</p>
		  
		  <p>&nbsp;&nbsp;3)&nbsp;&nbsp; to allow you to write a review of service provided by the dive center.	</p>
		  
		  <p>&nbsp;&nbsp;4)&nbsp;&nbsp; Notice of promotion, service and product will send to you if you agree Scubbi to update you our latest status.</p>
		 
		 
		 
		 <h4 style="color:red;font-weight:bold;">Disclosure</h4>
		  <p>We will not share your information to another party other than dive center you made a reservation with.</p>
		  
		  <h4 style="color:red;font-weight:bold;">Retention</h4>
		  <p>We will retain your personal information only for necessary reason as long as it is needed.</p>
		  
		  
		  <h4 style="color:red;font-weight:bold;">System and security</h4>
		  <p>We will continue to implement our security system to protect your personal information from unauthorized use, collection, assess, disclosure, copying, modification and disposal from another party. Such system include</p>
		  <p>&nbsp;&nbsp;1)&nbsp;&nbsp; Only those employee who require the personal information in their scope of employment have the permission to assess your personal information.</p>
		  
		  <p>&nbsp;&nbsp;2)&nbsp;&nbsp;Assess to user IDs, password, encryption and firewall.</p>
		  
		  <p>&nbsp;&nbsp;3)&nbsp;&nbsp;Storing your personal information in a secure server</p>
		  
		  <h4 style="color:red;font-weight:bold;">Accuracy</h4>
		  <p>Scubbi.com will to the best of its ability and our best effort to make sure your personal information is complete and correct.</p>
		  
		  <h4 style="color:red;font-weight:bold;">Request and delivery</h4>
		  <p>You may request in writing access to your personal information and Scubbi.com will use reasonable effort to make the information available within 30 days of your request.</p>
		  
		  
		  
		  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



	<script type="text/javascript">
				$( ".term" ).click(function() {
					$('#myModal').modal('show');
				});
				
				
					$( "#privacy" ).click(function() {
					$('#myModal1').modal('show');
				});
				
				
				
				
				jQuery(document).ready(function ($) {
					$("#lFrom").keypress(function (e) {
						if (e.which == 13) {
					//$('#lFrom').ajaxForm(function() { 
				         //alert("hhh");
						  e.preventDefault();
                            var email = $("#email").val();
                            var password = $("#password").val();

                            var dataString = 'email=' + email + '&password=' + password;

                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('Customer/varifyUser'); ?>",
                                data: {
									  email: email,
									  password: password
								   },
                                //cache: true,
								 //dataType: 'json',
                                success: function(html) {
									//alert( html);
									//console.log(html);
									
                                    if (html == 1) {
										location.reload(true);
										//window.location.reload(true);
                                    } else {
                                        alert("Wrong User name and Password");
                                    }




                                }
                            });
                        }
                        });
						
						$('#login124').on('click', function () {
							var email = $("#email").val();
                            var password = $("#password").val();

                            var dataString = 'email=' + email + '&password=' + password;

                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('Customer/varifyUser'); ?>",
                                data: {
									  email: email,
									  password: password
								   },
                                //cache: true,
								 //dataType: 'json',
                                success: function(html) {
									//alert( html);
									//console.log(html);
									
                                    if (html == 1) {
										location.reload(true);
										//window.location.reload(true);
                                    } else {
                                        alert("Wrong User name and Password");
                                    }




                                }
                            });
                        });
                        });
                    $(function() {
						//alert("efjdjf");
                        var result = 0;
						
						$('#fname').blur(function () {
							if ($('#fname').val() == '') {
								$('#fnameError').html("Please Enter First Name");
							}
							else{
								$('#fnameError').html("");
							}

						});
                        
						$('#lname').blur(function () {
							if ($('#lname').val() == '') {
								$('#lnameError').html("Please Enter Last Name");
							}
							else{
								$('#lnameError').html("");
							}

						});
						
						
						$('#dob').blur(function () {
							if ($('#dob').val() == '') {
								$('#dobError').html("DOB Is required");
							}
							else{
								$('#dobError').html("");
							}

						});
						
						$('#email1').focus(function () {
							if ($('#email1').val() == '') {
								$('#email_addressError').html("Please Enter Email ID");
							}
							else{
								$('#email_addressError').html("");
							}

						});
						
						$('#password1').focus(function () {
							if ($('#password1').val() == '') {
								$('#passwordError').html("Password is Required");
							}
							else{
								$('#passwordError').html("");
							}

						});
						
                        $('#email1').blur(function() {
                            var email = $('#email1').val();
                            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

                            if (reg.test(email) == false) {
                                $('#email_addressError').html("Invalid Email Format");
								// result = 1;

                            } else {
                                var dataString = 'email=' + email;
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('Front/CheckEmailAvalabilitySignUp'); ?>",
                                    data: dataString,
                                    cache: true,
                                    success: function(html) {
//alert(html);
                                        if (html == 1) {

                                            $('#email_addressError').html("");
											  result = 0;
                                        } else {
											
                                            result = 1;
                                            $('#email_addressError').html(html);
                                        }

                                    }
                                });
                            }
                        });
					$('#reg1').on('click', function () {
                       
							
						//var valid = true;
                            var textdcn = $("#fname").val();
                            var textcp = $("#lname").val();
                            var textbrn = $("#gender").val();
                            var textsc = $("#dob").val();
                            var texti = $("#email1").val();
                            var textea = $("#password1").val();
                            var textcc = $("#countrycode").val();
                            var textpn = $("#pnumber").val();
                            var dataString = 'fname=' + textdcn + '&lname=' + textcp + '&gender=' + textbrn + '&dob=' + textsc + '&email=' + texti + '&password=' + textea + '&pnumber=' + textpn + '&countrycode=' + textcc;

							//var email = $('#email1').val();
                            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
							
                            if (textdcn == "") {
									//$('#fnameError').html("First Name Is required");
									$("#fname").focus();
									$('#fnameError').html("Please Enter First Name");
							}
							
							else if (textcp == "") {
								//$('#lnameError').html("Last  Name Is required");
								$("#lname").focus();
								$('#lnameError').html("Please Enter First Name");
							}
							
							 
							else if (textsc == "") {
								//$('#dobError').html("DOB Is required");
								$("#dob").focus();
								$('#dobError').html("DOB Is required");
							}
							
							else if (texti == "") {
								//$('#email_addressError').html("Please Enter Email ID");
								$("#email1").focus();
								$('#email_addressError').html("Please Enter Email ID");
							}
							
							else if (textea == "") {
								//$('#passwordError').html("Password is Required");
								$("#password1").focus();
								$('#passwordError').html("Password is Required");
							}
							
							/* else if (textpn == "") {
								$('#phoneError').html("Phone is Required");
							} */
							
							else if(reg.test(texti) == false)
							{
								$('#email_addressError').html("Invalid Email Format");
							} 
							
							
							 else {
								 if(result == 0)
								 {
								 
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('Customer/signup'); ?>",
                                    data: dataString,
                                    cache: true,
                                    success: function(html) {
									$('#fnameError').hide();
									$('#lnameError').hide();
									$('#dobError').hide();
									$('#email_addressError').hide();
									$('#passwordError').hide();
									$("#fname").val("");
									$("#lname").val("");
									$("#dob").val("");
									$("#email1").val("");
									$("#password1").val("");
									$("#pnumber").val("");

                                        alert("Thank You For Registration");
                                       
                                        $("#register-model").modal('toggle');
										 $("#login-model").modal('toggle');

                                    }
                                });
								 }
                            }
                            return false;
                        });
						
						$("#signupFrom").keypress(function (e) {
                       
					   
						if (e.which == 13) {
					//$('#lFrom').ajaxForm(function() { 
				         //alert("hhh");
						  e.preventDefault();
						//var valid = true;
                            var textdcn = $("#fname").val();
                            var textcp = $("#lname").val();
                            var textbrn = $("#gender").val();
                            var textsc = $("#dob").val();
                            var texti = $("#email1").val();
                            var textea = $("#password1").val();
                            var textcc = $("#countrycode").val();
                            var textpn = $("#pnumber").val();
                            var dataString = 'fname=' + textdcn + '&lname=' + textcp + '&gender=' + textbrn + '&dob=' + textsc + '&email=' + texti + '&password=' + textea + '&pnumber=' + textpn + '&countrycode=' + textcc;

							//var email = $('#email1').val();
                            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
							
                            if (textdcn == "") {
									//$('#fnameError').html("First Name Is required");
									$("#fname").focus();
									$('#fnameError').html("Please Enter First Name");
							}
							
							else if (textcp == "") {
								//$('#lnameError').html("Last  Name Is required");
								$("#lname").focus();
								$('#lnameError').html("Please Enter First Name");
							}
							
							 
							else if (textsc == "") {
								//$('#dobError').html("DOB Is required");
								$("#dob").focus();
								$('#dobError').html("DOB Is required");
							}
							
							else if (texti == "") {
								//$('#email_addressError').html("Please Enter Email ID");
								$("#email1").focus();
								$('#email_addressError').html("Please Enter Email ID");
							}
							
							else if (textea == "") {
								//$('#passwordError').html("Password is Required");
								$("#password1").focus();
								$('#passwordError').html("Password is Required");
							}
							
							/* else if (textpn == "") {
								$('#phoneError').html("Phone is Required");
							} */
							
							else if(reg.test(texti) == false)
							{
								$('#email_addressError').html("Invalid Email Format");
							} 
							
							
							 else {
								 if(result == 0)
								 {
								 
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('Customer/signup'); ?>",
                                    data: dataString,
                                    cache: true,
                                    success: function(html) {
									$('#fnameError').hide();
									$('#lnameError').hide();
									$('#dobError').hide();
									$('#email_addressError').hide();
									$('#passwordError').hide();
									$("#fname").val("");
									$("#lname").val("");
									$("#dob").val("");
									$("#email1").val("");
									$("#password1").val("");
									$("#pnumber").val("");

                                        alert("Thank You For Registration");
                                       
                                        $("#register-model").modal('toggle');
										 $("#login-model").modal('toggle');

                                    }
                                });
								 }
                            }
                            return false;
						}
                        });
						
						
                    });
                </script>
				<script>
					$(document).ready(function(){
						$('.signup_model').on('click', function () {
							//$("#register-model").toggle();
							//$("#login-model").toggle();
							$('#login-model').modal('hide');
						});
					});
				</script>