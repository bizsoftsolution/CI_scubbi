<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="ScriptsBundle">
    <title>Scubbi Diving Portal</title>
    <!--link rel="icon" href="images/favicon.ico" type="image/x-icon" /-->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- BOOTSTRAPE STYLESHEET CSS FILES -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/daterangepicker.css'); ?>">



<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
 

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.min.css'); ?>">
    <!-- JQUERY SELECT -->
    <link href="<?php echo base_url('assets/frontend/css/select2.min.css'); ?>" rel="stylesheet" />
    <!-- JQUERY MENU -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap-dropdownhover.css'); ?>">
    <!-- ANIMATION -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/animate.min.css'); ?>">
    <!-- OWl  CAROUSEL-->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/owl.carousel.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/owl.style.css'); ?>">
    <!-- TEMPLATE CORE CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css'); ?>">
	
	
	
    <!-- MOBILE MENU CSS -->
    <link href="<?php echo base_url('assets/frontend/css/meanmenu.min.css'); ?>" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/et-line-fonts.css'); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/fonts/classified/flaticon.css'); ?>">
    <!--  MASTER SLIDER -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/masterslider/css/masterslider.css'); ?>" />
    <link href="<?php echo base_url('assets/frontend/masterslider/css/style.css'); ?>" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/masterslider/css/layer-style.css'); ?>">
    <link href="<?php echo base_url('assets/frontend/masterslider/css/ms-staff-style.css'); ?>" rel='stylesheet' type='text/css'>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900%7cOpen+Sans:400,600,700" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/frontend/css/nouislider.min.css'); ?>" rel="stylesheet">
    <!-- Theme Color -->
    <link rel="stylesheet" id="color" href="<?php echo base_url('assets/frontend/css/colors/defualt.css'); ?>">
    <!-- For Style Switcher -->
    <link rel="stylesheet" id="theme-color" type="text/css" href="#" />
	
    <!-- JavaScripts -->
    <script src="<?php echo base_url('assets/frontend/js/modernizr.js'); ?>"></script>
     <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery-3.1.1.min.js'); ?>"></script>
  
  <!-- BOOTSTRAP CORE JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/bootstrap.min.js'); ?>"></script>
  
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script> 

	<!--
	  <link type="text/css" href="<?php echo base_url('assets/frontend/assert/gentleSelect/jquery-gentleSelect.css'); ?>" rel="stylesheet" />
   
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/assert/gentleSelect/jquery-gentleSelect.js'); ?>"></script>      -->           
	
	
	<!--Date picker search bar start-->
<link href="<?php echo base_url('assets/new/css/datepicker.css1');?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js1');?>"></script>
	<!--Date picker search bar end-->
 <script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '529670250723692'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=529670250723692&ev=PageView
&noscript=1"/>
</noscript>
<script src="<?php echo base_url(); ?>assets/autochange/jquery.min.js1"></script>
		<script>
			function executeQuery() {
			  $.ajax({
				url: '<?php echo base_url(); ?>Front/findMessageCount',
				success: function(data) {
				  // do something with the return value here if you like
				  if(data > 0)
				  {
					  $('#messageCountSpan').html(data);
				  }
				  else
				  {
					  $('#messageCountSpan').html('');
				  }
				  
				}
			  });
			  setTimeout(executeQuery, 5000); // you could choose not to continue on failure...
			}

			$(document).ready(function() {
			  // run the first time; all subsequent calls will take care of themselves
			  setTimeout(executeQuery, 5000);
			});		
		</script>


<script type="text/javascript">
    // <![CDATA[
    $(document).ready(function() {
     		   $('#scountry').change(function() { //any select change on the dropdown with id country trigger this code
            //	alert("dhngfdhg");
            $("#islands > option").remove(); //first of all clear select items
            var country_id = $('#scountry').val(); // here we are taking country id of the selected one.
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>front/get_island/" + country_id, //here we are calling our user controller and get_cities method with the country_id

                success: function(cities) //we're calling the response json array 'cities'
                    {
                        $.each(cities, function(id, city) //here we're doing a foeach loop round each city with id as the key and city as the value
                            {
                                var opt = $('<option />'); // here we're creating a new select option with for each city
                                opt.val(id);
                                opt.text(city);
                                $('#islands').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
                            });
                    }

            });

        });
    });
    // ]]>
</script>
<script>
		localStorage.LoginID='<?php echo $this->session->userdata('user_id'); ?>';
		sessionStorage.LoginID='<?php echo $this->session->userdata('user_id'); ?>';
		function page_onfocus()
		{		
			if(localStorage.LoginID!=sessionStorage.LoginID)
			{
				location.reload();
			}
		}
	</script>
</head>

<body onfocus='page_onfocus()'>
      <header class="index4-header">
         <a class="navbar-brand visible-xs" id="navbar-logo-mobile" href=""><img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
         <a href="" class=" visible-xs " style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 15px;">Connecting Drivers Globally </a>
         <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid" style="padding-right: 37px!important;">
               <div class="navbar-header col-md-4">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" id="navbar-logo" href="<?php echo base_url(); ?>">
				  <img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
				  <div  style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 5px;margin-top: 13px;">Connecting Drivers Globally</div>
				    </div>
				 
					<!--div class="col-md-3">
                        <div class="text-center1" style="padding-top:30px;font-weight:20px;">
						
							
                            <span>
							<form class="form-inline">
								<div class="form-group">
									<select id='' class="form-control">
										<option value="1">MYR</option>
										<option value="2">AFN</option>
										<option value="3">ARS</option>
										<option value="4">BRL</option>
										<option value="5">EUR</option>
										<option value="6">JPY</option>
										<option value="7">KES</option>
										<option value="8">KPW</option>
										<option value="9">KRW</option>	
									</select> 
								</div>	
								<div class="form-group">
									<select id='' class="form-control">
										<option value="1">English</option>
										<option value="2">Chinese</option>
										<option value="3">Spanish</option>
										<option value="4">Hindi</option>
										<option value="5">Arabic</option>
										<option value="6">Portuguese</option>
										<option value="7">Bengali</option>
										<option value="8">Russian</option>
										<option value="9">Japanese</option>	
									</select> 
								</div>	
							</form>
						 
						 </span>
                        </div>

                    </div-->
				  
             <div class="col-md-8">
				
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
				<?php 
					if($this->session->userdata('user_id')!='')
					{
						if($this->session->userdata('user_type') == 'Customer')
						{
				?>
                  <ul class="nav navbar-nav navbar-right" id="menu-right">
				<!--	<li>
										<select id='' style="margin: 38px 15px 0 0;width:100%;">
											<option value="1">MYR</option>
											<option value="2">AFN</option>
											<option value="3">ARS</option>
											<option value="4">BRL</option>
											<option value="5">EUR</option>
											<option value="6">JPY</option>
											<option value="7">KES</option>
											<option value="8">KPW</option>
											<option value="9">KRW</option>	
										</select> 
									</li>
									<li>
										<label style="text-transform: uppercase;
    padding: 8px 15px 0 0;
    margin-left: 4px;
    margin-top: 30px;font-size: 14px;"> English</label>-->
<!--									<select id='' class="form-control">
											<option value="1">English</option>
											<option value="2">Chinese</option>
											<option value="3">Spanish</option>
											<option value="4">Hindi</option>
											<option value="5">Arabic</option>
											<option value="6">Portuguese</option>
											<option value="7">Bengali</option>
											<option value="8">Russian</option>
											<option value="9">Japanese</option>	
										</select> //-->
									</li>
									
									<li>
			    
<?php 

						$this->db->where('to', $this->session->userdata('user_id'));
						$this->db->where('is_read', 0);
						$query = $this->db->get('messages');
						$notification= $query->num_rows();
?>
                <a href="<?php echo base_url('Customer/allMessages');?>" ><i class="fa fa-envelope-o" style="color:#000;"><span id="messageCountSpan" class="badge badge-danger" style="background-color: red;position: absolute;top: 0px;left: 0px;"><?php if($notification != 0) { echo $notification; ?> <?php } else {	
					}?></span></i></a>
              </li>
                     <li>
                        <a href="" >Become a Partner </a>
					</li>
					<li>
                        <a href="" >Help</a>
					</li>
					<li class="dropdown">
						<?php
						$u_id = $this->session->userdata('user_id');
						$data1=$this->db->get_where('tbl_customerprofile', array('user_id'=>$u_id))->result();
						foreach ($data1 as $a1) 
						{
						if($a1->photo != NULL)
										{
						?>
						<a href="<?php echo base_url('Customer/customerDashboard');?>" class="dropdown-toggle1" data-toggle="dropdown1" style="padding: 0px 0px;border-radius:50%">
						<img src="<?php echo base_url();?>upload/customerprofile/<?php echo $a1->photo; ?>" style="width:50px;height:50px;" class="profile-image img-circle"> <!--Username <b class="caret"></b--></a>
						<?php 
						}
						else
						{
							?>
							<a href="<?php echo base_url('Customer/customerDashboard');?>" class="dropdown-toggle1" data-toggle="dropdown1" style="padding: 0px 0px;border-radius:50%">
						<img src="<?php echo base_url();?>upload/customerprofile/user.png" style="width:50px;height:50px;" class="profile-image img-circle"> <!--Username <b class="caret"></b--></a>
							<?php
						}
						}
						
						?>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('Customer/customerDashboard'); ?>"><i class="fa fa-home"></i> My Dashboard</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url('Customer/customerProfile'); ?>"> Profile</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url('Customer/customerMydiveTrips'); ?>"> My Dive Trips</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url('Customer/allMessages'); ?>"> My Message</a></li>
							<li class="divider"></li>
							
							<li><a href="<?php echo base_url('Customer/customerDashboard'); ?>"> Dive Credits</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url('Customer/logout'); ?>"> Sign out</a></li>
							<li class="divider"></li>
						</ul>
					</li>
                    
                  </ul>
					<?php 
						}else
						{
							
					?>
					<ul class="nav navbar-nav navbar-right" id="menu-right">
				<!--		<li>
										<select id='' style="margin: 38px 15px 0 0;width:100%;">
											<option value="1">MYR</option>
											<option value="2">AFN</option>
											<option value="3">ARS</option>
											<option value="4">BRL</option>
											<option value="5">EUR</option>
											<option value="6">JPY</option>
											<option value="7">KES</option>
											<option value="8">KPW</option>
											<option value="9">KRW</option>	
										</select> 
									</li>
									<li>
										<label style="text-transform: uppercase;
    padding: 8px 15px 0 0;
    margin-left: 4px;
    margin-top: 30px;font-size: 14px;"> English</label>-->
<!--									<select id='' class="form-control">
											<option value="1">English</option>
											<option value="2">Chinese</option>
											<option value="3">Spanish</option>
											<option value="4">Hindi</option>
											<option value="5">Arabic</option>
											<option value="6">Portuguese</option>
											<option value="7">Bengali</option>
											<option value="8">Russian</option>
											<option value="9">Japanese</option>	
										</select> //-->
									</li>
                     <li>
                        <a href="" >Become a Partner </a>
					</li>
					<li>
                        <a href="" >Help</a>
					</li>
					<li><a href="#" data-toggle="modal" data-target=".register-model"> Signup/Register</a></li>
					<li><a href="#" data-toggle="modal" data-target=".login-model"> Login</a></li>
                    
                  </ul>
					<?php
						}
						
					}
					else
						{
							
					?>
					<ul class="nav navbar-nav navbar-right" id="menu-right">
				<!--	<li>
										<select id='' style="margin: 38px 15px 0 0;width:100%;">
											<option value="1">MYR</option>
											<option value="2">AFN</option>
											<option value="3">ARS</option>
											<option value="4">BRL</option>
											<option value="5">EUR</option>
											<option value="6">JPY</option>
											<option value="7">KES</option>
											<option value="8">KPW</option>
											<option value="9">KRW</option>	
										</select> 
									</li>
									<li>
										<label style="text-transform: uppercase;
    padding: 8px 15px 0 0;
    margin-left: 4px;
    margin-top: 30px;font-size: 14px;"> English</label>-->
<!--									<select id='' class="form-control">
											<option value="1">English</option>
											<option value="2">Chinese</option>
											<option value="3">Spanish</option>
											<option value="4">Hindi</option>
											<option value="5">Arabic</option>
											<option value="6">Portuguese</option>
											<option value="7">Bengali</option>
											<option value="8">Russian</option>
											<option value="9">Japanese</option>	
										</select> //-->
									</li>
                     <li>
                        <a href="" >Become a Partner </a>
					</li>
					<li>
                        <a href="" >Help</a>
					</li>
					<li><a href="#" data-toggle="modal" data-target=".register-model">Signup/Register</a></li>
					<li><a href="#" data-toggle="modal" data-target=".login-model"> Login</a></li>
                    
                  </ul>
					<?php
						}
					
				?>
               </div>
			   
			   </div>
            </div>  <div class="separator"></div>
         </nav>
      </header>
		<section class=" light-blue" style="margin:100px 0 0px 0;background-color: #f4f7fa !important;">
         
         </section>
         <section class="dashboard light-blue" style="background-color: #f4f7fa !important;">
            <div class="container">
               <div class="row">
			   <style>
					

					.caption {
						position: absolute;
						top: 3%;
						left: 0;
						width: 100%;
					}
					.caption p
					{
						width: 100%;
					}
					.error
					{
						color:red;
						font-size:16px;
					}
				</style>
				   <script>
					$(document).ready(function(){
						$("#tooltip-ex a").tooltip({
							placement : 'right'
						});
					});
					</script>
					
					<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/confirmation/jquery.dialog.min.css">
					<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/confirmation/jquery.dialog.min.css">
					
					<script src="<?php echo base_url(); ?>assets/frontend/confirmation/jquery.dialog.min.js"></script>
               	  <div class="col-md-5 col-sm-12 col-xs-12 ">
                     <div class="main-box profile-box-contact">
                     	<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div class="profile-box-header blue-bg">
                                <div class="col-md-12 col-sm-7 col-xs-12">
								<h3>Online Platform to boost up your sales</h3>
                                  <img src="<?php echo base_url(); ?>upload/DCprofile/gallery/Image_B_1.png" alt="" class="img-responsive" width="100%" height="100%">
                                  <div class="caption" style="padding-top:45px;">
									
									<p style="position: absolute;top: 180%;left: 10%;font-size:16px;font-weight:bold;" id="tooltip-ex">
										<a href="" data-toggle="tooltip" data-placement="right" title="Save Money & Time when customer perform booking" style="color:#fff;">Cost effective</a>
									</p>
									<p style="position: absolute;top: 260%;left: 10%;color:#fff;font-size:16px;font-weight:bold;">
										<a href="" data-toggle="tooltip" data-placement="right" title="" style="color:#fff;">Security</a>
									</p>
									<p style="position: absolute;top: 330%;left: 10%;color:#fff;font-size:16px;font-weight:bold;">
										<a href="" data-toggle="tooltip" data-placement="right" title="" style="color:#fff;">All in one Platform</a>
									</p>
								</div>
                                  
                               </div>
                               <div class="col-md-12 col-sm-5 col-xs-12">
                                   <!--<div class="profile-btn">
                                      <a class="btn" href="#"> <i class="fa fa-envelope-o"></i> Message </a>
                                      <a href="#" class="btn"> <i class="fa fa-user-plus"></i> Follow </a>
                                   </div>
                                   <ul class="social-network social-circle onwhite">
                                      <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                      <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                      <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                      <li><a href="#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                   </ul>-->
                               </div>
                            </div>
                        </div>
              <!--         <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div class="profile-box-footer">
                               <a href="#">
                                   <span class="value">783</span>
                                   <span class="label">Ads Posted</span>
                               </a>
                               <a href="#">
                                   <span class="value">912</span>
                                   <span class="label">Followers</span>
                               </a>
                               <a href="#">
                                   <span class="value">83</span>
                                   <span class="label">Messages</span>
                               </a>
                            </div>
                        </div>-->
                     </div>
                  </div>
                  <div class="col-md-7 col-sm-8 col-xs-12 ">
                     <div class="dashboard-main-disc">
                        <div class="heading-inner">
							<h1 class="title"> Join us here </h1>
							<p >Enter the details below and submit for verification</p>
                           
                        </div>
                        <div class="row">
                           <form name="add" method="POST" action="" class="form-horizontal">
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-4" >Dive Center Name</label>
							<div class="col-md-8">
							   <input type="text" name="dive_center_name" id="dive_center_name" class="form-control" required="">
							   <span class="error" id="diveNameError">
							
								</span>
							</div>
							
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" >Contact Person</label>
							<div class="col-md-8">
							   <input type="text" name="contact_person" id="contact_person" class="form-control" required="">
							   <span class="error" id="contact_personError">
							
								</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" >Business Registration Number</label>
							<div class="col-md-8">
							   <input type="text" name="business_registration_no" class="form-control" id="business_registration_no">
							   <span class="error" id="business_registration_noError">
							
								</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" >Country</label>
							<div class="col-md-8">
							<select class="form-control" name="scountry" id="scountry" required="">
								<option label="Select Country">Select Country</option>
								<?php $data=$this->db->get('tbl_country')->result_array(); foreach ($data as $a) {
									
									?>
								<option value="<?php echo $a['country_id'];?>">
									<?php echo $a[ 'country_name'];?>
								</option>
								<?php 
								
								} ?>
							</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" >Island</label>
							<div class="col-md-8">
						  <?php $cities[ '#']='Select Island' ; 
							$attr=array( 'id'=>'islands', 'class'=>'form-control', 'name'=>'islands'); ?>
							<?php echo form_dropdown($attr, $cities); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" >Email Address</label>
							<div class="col-md-8">
							   <input type="email" name="email_address" class="form-control" id="email_address">
							   <span class="error" id="email_addressError">
							
								</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" >Phone Number</label>
							<div class="col-md-8">
							   <input type="text" name="phone_number" class="form-control" id="phone_number" required>
							   <span class="error" id="phone_numberError">
							
								</span>
							</div>
						</div>
						<br>
						<div class="form-group">
					
							<input type="submit" class="btn btn-default pull-right submit_button" value="Submit" name="submit_becomeaparter_result" style="width:100%;">											
						</div>
						<div class="form-group">        
						  <div class="col-sm-offset-4 col-sm-8">
							<div id="flash"></div>
							<div id="show"></div>
						  </div>
						</div>
					</div>
				</form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>

    <!-- End Slider -->

    <!-- footer starts-->
<script type="text/javascript">
				$(function() {
					 var result = 0;
					 $('#contact_person').focus(function () {
						if ($('#dive_center_name').val() == '') {
							$('#diveNameError').html("Please Enter Dive Center Name");
						}
						else{
							$('#diveNameError').html("");
						}

					});
					 $('#business_registration_no').focus(function () {
						 if ($('#dive_center_name').val() == '') {
							$('#diveNameError').html("Please Enter Dive Center Name");
						}
						else{
							$('#diveNameError').html("");
						}
						if ($('#contact_person').val() == '') {
							$('#contact_personError').html("Contact person name is Required");
						}
						else{
							$('#contact_personError').html("");
						}

					});
					$('#email_address').focus(function () {
						 if ($('#dive_center_name').val() == '') {
							$('#diveNameError').html("Please Enter Dive Center Name");
						}
						else{
							$('#diveNameError').html("");
						}
						if ($('#contact_person').val() == '') {
							$('#contact_personError').html("Contact person name is Required");
						}
						else{
							$('#contact_personError').html("");
						}
						

					});
										 
						$('#email_address').blur(function () {
						var email = $('#email_address').val();
						var reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

						if (reg.test(email) == false) 
							{
								$('#email_addressError').html("Invalid Email Address");
								//alert('Invalid Email Address');
								
							}
							else
							{
								var dataString = 'email='+ email ;
								$.ajax({
								type: "POST",
								url: "<?php echo base_url('Front/CheckEmailAvalability'); ?>",
								data: dataString,
								cache: true,
								success: function(html){
									
										if(html == 1)
										{
											 result=1;
											 $('#email_addressError').html("");
										}
										else
										{
											$('#email_addressError').html(html);
										}
	
								}  
								});
							}
						});
					$('#phone_number').focus(function () {
						
						 if ($('#dive_center_name').val() == '') {
							$('#diveNameError').html("Please Enter Dive Center Name");
						}
						else{
							$('#diveNameError').html("");
						}
						if ($('#contact_person').val() == '') {
							$('#contact_personError').html("Contact person name is Required");
						}
						else{
							$('#contact_personError').html("");
						}
						
						if ($('#email_address').val() == '') {
							$('#email_addressError').html("Email Id is Required");
						}
						

					});
					
					
				$(".submit_button").click(function() {
				var textdcn = $("#dive_center_name").val();
				var textcp = $("#contact_person").val();
				var textbrn = $("#business_registration_no").val();
				var textsc = $("#scountry").val();
				var texti = $("#islands").val();
				var textea = $("#email_address").val();
				var textpn = $("#phone_number").val();
				var dataString = 'textdcn='+ textdcn + '&textcp='+ textcp + '&textbrn=' + textbrn + '&textsc=' + textsc + '&texti=' + texti + '&textea=' + textea + '&textpn=' + textpn;
				
				if(textdcn == '' && textcp == ''  && textea == '' && textpn == '')
				{
					$("#dive_center_name").focus();
					$('#diveNameError').html("Please Enter Dive Center Name");
					$('#contact_personError').html("Contact person name is Required");
					
					$('#email_addressError').html("Email Id is Required");
					$('#phone_numberError').html("Phone Number is Required");
					
				}
				else if(textdcn == '')
				{
					//alert("Enter some text..");
					$("#dive_center_name").focus();
					$('#diveNameError').html("Please Enter Dive Center Name");
					

				}
				else if(textcp == "")
				{
					$("#contact_person").focus();
					$('#contact_personError').html("Contact person name is Required");
				}
				
				else if(textea == "")
				{
					$("#email_address").focus();
					$('#email_addressError').html("Email Id is Required");
				}
				else if(textpn == "")
				{
					$("#phone_number").focus();
					$('#phone_numberError').html("Phone Number is Required");
				}
				else
				{
					if(result != 1)
					{
						
					}
					else
					{
						$("#flash").show();
						$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
						$.ajax({
						type: "POST",
						url: "<?php echo base_url('Front/addBecomeapartner'); ?>",
						data: dataString,
						cache: true,
						success: function(html){
							
						//	$("#show").after(html);
							/* dialog.alert({
								//title: "Alert example",
								message: "Thank you for registration, Our services team will contact you shortly",
								button: "Ok",
								animation: "fade",
								callback: function(value){
									console.log(value);
								}
							}); */
							
							alert("Thank you for registration, Our services team will contact you shortly");
							window.location.href = "<?php echo base_url('Front'); ?>";
							
						}  
						});
					}
				}
				return false;
				});
				});
				</script>
	<div class="separator"></div>
	<br><br>
    <!--  end  Special offer -->
<!-- Owl CAROUSEL -->
  <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery-migrate-1.2.1.min.js'); ?>"></script>
    
    <!-- JQUERY SELECT -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/select2.min.js'); ?>"></script>
    <!-- MEGA MENU -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/bootstrap-dropdownhover.js'); ?>"></script>
    <!-- JQUERY EASING -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/easing.js'); ?>"></script>
    <!-- JQUERY COUNTERUP -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/counterup.js'); ?>"></script>
    <!-- JQUERY WAYPOINT -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/waypoints.min.js'); ?>"></script>
    <!-- JQUERY REVEAL -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/footer-reveal.min.js'); ?>"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/owl-carousel.js'); ?>"></script>
    <!-- MOBILE MENU JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery.meanmenu.js'); ?>"></script>
    <!--Style Switcher -->
    <script src="<?php echo base_url('assets/frontend/js/color-switcher.js'); ?>"></script>
    <!-- CORE JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/custom.js'); ?>"></script>
    <!-- RANGE SLIDER JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/nouislider.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/wNumb.js'); ?>"></script>
   

	
	

</body>

</html>
