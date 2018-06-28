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



<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
 

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
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900%7cOpen+Sans:400,600,700" rel="stylesheet" type="text/css">
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
<link href="<?php echo base_url('assets/new/css/datepicker.css');?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js');?>"></script>
	<!--Date picker search bar end-->
 
<script src="<?php echo base_url(); ?>assets/autochange/jquery.min.js1"></script>
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

</head>

<body>
      <header class="index4-header">
         <a class="navbar-brand visible-xs" id="navbar-logo-mobile" href=""><img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
         <a href="" class=" visible-xs " style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 15px;">Connecting Drivers Globally </a>
         <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid" style="padding-right: 37px!important;">
               <div class="navbar-header col-md-1">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" id="navbar-logo" href="<?php echo base_url(); ?>">
				  <img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
				  
				    </div>
				  <div class="col-md-3">
						<div  style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 5px;margin-top: 13px;">Connecting Drivers Globally</div>
					</div>
					<div class="col-md-3">
                        <div class="text-center1" style="padding-top:30px;font-weight:20px;">
						
							
                            <span style="float:right;">
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

                    </div>
				  
             <div class="col-md-5">
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
				<?php 
					if($this->session->userdata('user_id')!='')
					{
						if($this->session->userdata('user_type') == 'Customer')
						{
				?>
                  <ul class="nav navbar-nav navbar-right" id="menu-right">
 
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
						?>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 0px 0px;border-radius:50%">
						<img src="<?php echo base_url();?>upload/customerprofile/<?php echo $a1->photo; ?>" style="width:50px;height:50px;" class="profile-image img-circle"> <!--Username <b class="caret"></b--></a>
						<?php 
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
							<li><a href="<?php echo base_url('Customer/myCart'); ?>"> My Cart</a></li>
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
 
                     <li>
                        <a href="" >Become a Partner </a>
					</li>
					<li>
                        <a href="" >Help</a>
					</li>
					<li>						
                        <a href="<?php echo base_url('Customer/customerSignup'); ?>" >Sign Up</a>
					</li>
					<li>						
                        <a href="<?php echo base_url('Customer'); ?>" >Login</a>
                     </li>
                    
                  </ul>
					<?php
						}
						
					}
					else
						{
							
					?>
					<ul class="nav navbar-nav navbar-right" id="menu-right">
 
                     <li>
                        <a href="" >Become a Partner </a>
					</li>
					<li>
                        <a href="" >Help</a>
					</li>
					<li>						
                        <a href="<?php echo base_url('Customer/customerSignup'); ?>" >Sign Up</a>
					</li>
					<li>						
                        <a href="<?php echo base_url('Customer'); ?>" >Login</a>
                     </li>
                    
                  </ul>
					<?php
						}
					
				?>
               </div>
			   
			   </div>
            </div>  <div class="separator"></div>
         </nav>
      </header>
	

    <!-- End Slider -->
    <div class="container-fluid" style="margin:110px 0 10px 0;">
        <div class="row">
			<div class="col-md-6">
				<style>
					.thumbnail {
						position: relative;
					}

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
				</style>
				<script>
				$(document).ready(function(){
					$("#tooltip-ex a").tooltip({
						placement : 'right'
					});
				});
				</script>
				
				<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/confirmation/jquery.dialog.min.css">
				
				<script src="<?php echo base_url(); ?>assets/frontend/confirmation/jquery.dialog.min.js"></script>
				<div class="thumbnail">
					<img src="<?php echo base_url(); ?>upload/DCprofile/gallery/Image_B_3.jpg" alt="" class="img-responsive" width="100%" height="100%">
					<div class="caption">
						<h3 style="font-weight:bold;font-size:20px;color:#555;text-align:center;">Online Platform to boost up your sales</h3>
						<p style="position: absolute;top: 180%;left: 10%;font-size:20px;font-weight:bold;" id="tooltip-ex">
						<a href="" data-toggle="tooltip" data-placement="right" title="Save Money & Time when customer perform booking" style="color:#fff;">Cost effective</a></p>
						<p style="position: absolute;top: 260%;left: 10%;color:#fff;font-size:20px;font-weight:bold;">
						<a href="" data-toggle="tooltip" data-placement="right" title="" style="color:#fff;">
						Security</a></p>
						<p style="position: absolute;top: 330%;left: 10%;color:#fff;font-size:20px;font-weight:bold;">
						<a href="" data-toggle="tooltip" data-placement="right" title="" style="color:#fff;">
						All in one Platform</a></p>
					</div>
				</div>
				<!--img src="<?php echo base_url(); ?>upload/DCprofile/gallery/Image_B_3.jpg" class="img-responsive" width="100%" height="100%"-->
			</div>
			<div class="col-md-6">
				<h2> <b>Join us here </b></h2>
				<p>Enter the details below and submit for verification</p>
				<hr style="width:100%;">
				<form name="add" method="POST" action="" class="form-horizontal">
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-4" style="text-align:left;">Dive Center Name</label>
							<div class="col-md-8">
							   <input type="text" name="dive_center_name" id="dive_center_name" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" style="text-align:left;">Contact Person</label>
							<div class="col-md-8">
							   <input type="text" name="contact_person" id="contact_person" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" style="text-align:left;">Business Registration Number</label>
							<div class="col-md-8">
							   <input type="text" name="business_registration_no" class="form-control" id="business_registration_no">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" style="text-align:left;">Country</label>
							<div class="col-md-8">
							<select class="form-control" name="scountry" id="scountry" required="">
								<option label="Select Country">Select Country</option>
								<?php $data=$this->db->get('tbl_country')->result_array(); foreach ($data as $a) {
									$country_active = $a['is_deactivate'];
									if($country_active == "N")
									{
									?>
								<option value="<?php echo $a['country_id'];?>">
									<?php echo $a[ 'country_name'];?>
								</option>
								<?php 
								}
								} ?>
							</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" style="text-align:left;">Island</label>
							<div class="col-md-8">
						  <?php $cities[ '#']='Select Island' ; 
							$attr=array( 'id'=>'islands', 'class'=>'form-control', 'name'=>'islands'); ?>
							<?php echo form_dropdown($attr, $cities); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" style="text-align:left;">Email Address</label>
							<div class="col-md-8">
							   <input type="text" name="email_address" class="form-control" id="email_address">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4" style="text-align:left;">Phone Number</label>
							<div class="col-md-8">
							   <input type="text" name="phone_number" class="form-control" id="phone_number" required>
							</div>
						</div><br>
						<div class="form-group">
							<input type="submit" class="btn btn-danger btn-search-submit submit_button" value="Submit" name="submit_becomeaparter_result" style="width:100%;">											
						</div>
						<div class="form-group">        
						  <div class="col-sm-offset-4 col-sm-8">
							<div id="flash"></div>
							<div id="show"></div>
						  </div>
						</div>
					</div>
				</form>
				<script type="text/javascript">
				$(function() {
				$(".submit_button").click(function() {
				var textdcn = $("#dive_center_name").val();
				var textcp = $("#contact_person").val();
				var textbrn = $("#business_registration_no").val();
				var textsc = $("#scountry").val();
				var texti = $("#islands").val();
				var textea = $("#email_address").val();
				var textpn = $("#phone_number").val();
				var dataString = 'textdcn='+ textdcn + '&textcp='+ textcp + '&textbrn=' + textbrn + '&textsc=' + textsc + '&texti=' + texti + '&textea=' + textea + '&textpn=' + textpn;
				if(dataString=='')
				{
				alert("Enter some text..");
				$("#textdcn").focus();
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
				return false;
				});
				});
				</script>
			</div>
		</div>
    </div>
    <!-- footer starts-->

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
