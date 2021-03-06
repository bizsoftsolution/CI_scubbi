<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="ScriptsBundle">
    <title>Scubbi Diving Portal</title>
    <!--link rel="icon" href="images/favicon.ico" type="image/x-icon" /-->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- BOOTSTRAPE STYLESHEET CSS FILES -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/daterangepicker.css');?>">



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

    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!--
	  <link type="text/css" href="<?php echo base_url('assets/frontend/assert/gentleSelect/jquery-gentleSelect.css');?>" rel="stylesheet" />
   
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/assert/gentleSelect/jquery-gentleSelect.js');?>"></script>      -->

    <link href="<?php echo base_url('assets/frontend/daterange/css/datepicker.css');?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/frontend/daterange/js/datepicker.js');?>"></script>
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
		<link rel="stylesheet"  href="<?php echo base_url('assets/frontend/assert/css/lightslider.css'); ?>"/>
	<script src="<?php echo base_url('assets/frontend/assert/js/lightslider.js'); ?>"></script> 
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
	 <script>
    	 $(document).ready(function() {
			$("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
		});
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
        <a class="navbar-brand visible-xs" id="navbar-logo-mobile" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
        <a href="" class=" visible-xs " style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 15px;">Connecting Drivers Globally </a>
        <nav class="navbar navbar-default navbar-fixed-top" id="navbar">
            <div class="container-fluid" style="padding-right: 37px!important;">
                <div class="navbar-header col-md-4">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" id="navbar-logo" href="<?php echo base_url(); ?>" style="margin-top: 7px;"><img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
                    <div style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 15px;">Connecting Drivers Globally</div>

                </div>
                <div class="col-md-3">
                    <!--div style="padding:30px 0px;">
						<?php 
							
								$query=$this->db->get_where('tbl_country', array('country_id' =>$cid));
								foreach($query->result_array() as $row2)
								{
								echo $row2['country_name']." > "; 
								}
								$query1=$this->db->get_where('tbl_island', array('island_id' =>$iid));
								foreach($query1->result_array() as $row3)
								{
								echo $row3['island_name']; 
								}
						?>
                           </b>
							<?php
							//}
							?>
							
                    </div-->
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
<?php 
					if($this->session->userdata('user_id')!='')
					{
						if($this->session->userdata('user_type') == 'Customer')
						{
				?>
                  <ul class="nav navbar-nav navbar-right" id="menu-right">
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
                        <a href="<?php echo base_url('Front/becomeapartner');?>" >Become a Partner </a>
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
 
                     <li>
                        <a href="<?php echo base_url('Front/becomeapartner');?>" >Become a Partner </a>
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
 
                     <li>
                        <a href="<?php echo base_url('Front/becomeapartner');?>" >Become a Partner </a>
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
            </div>  <div class="separator"></div>
         </nav>
      </header>
    <!-- mobile-menu-area-start -->
    <!--div class="mobile-menu-area visible-xs hidden-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul>
                                <li>
                                    <a href="<?php echo base_url('Front/becomeapartner');?>">Become a Partner </a>
                                </li>
                                <li>
                                    <a href="">Help</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Customer/customerSignup'); ?>">Sign Up</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('Customer'); ?>">Login</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div-->

	<div class="container-fluid" style="margin:9% 0 0 0;">
	<?php 
//	echo("Recs. " . count($divesitesOverview));
//	print_r($divesitesOverview);
	foreach($divesitesOverview as $divesitesOverview_row)
	{
	?>
				<div class="col-md-6">
				<p style="font-size:21px;font-weight:bold;font-family: initial;"><?php echo $divesitesOverview_row->name;?></p>
				<hr style="width:100%;">
				  <h3>Overview</h3>
				  <p style="text-align: justify;font-family: initial;font-size: 17px;LINE-HEIGHT: 1.8;word-spacing: 1px;text-indent: 60px;overflow-y:scroll;height:310px;">
				  <?php echo $divesitesOverview_row->overview;?> 
				</p>
				</div>
				  <div class="col-md-6" style="margin:9px 0 0 0;">
					<div class="demo">
						<div class="item">            
							<div class="clearfix">
								<ul id="image-gallery" class="gallery list-unstyled cS-hidden">
									<?php 
										$r1 = $divesitesOverview_row->image;
										$row_image = explode(',', $r1);
										$i=0;
										foreach($row_image as $row_1)
										{
									?>
									<li data-thumb="<?php echo  base_url();?>upload/divepoint/<?php echo $row_image[$i]; ?>"> 
										<img src="<?php echo  base_url();?>upload/divepoint/<?php echo $row_image[$i]; ?>" style="width:100%; height:auto;"/>
										 </li>
									<?php 
										$i++;
										}
									?>
									
								</ul>
							</div>
						</div>
						

					</div>	

					</div>
				
	
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table" style="font-family: initial;font-size: 17px;">
				<tr>
					<th>Current</th><td><?php echo $divesitesOverview_row->current;?></td>
					<th>Water Temperature</th><td><?php echo $divesitesOverview_row->water_temprature;?></td>
				</tr>
				<tr>
					<th>Underwater Visibility</th><td><?php echo $divesitesOverview_row->underwater;?></td><th>Diving Season</th><td><?php echo $divesitesOverview_row->diving_season;?></td>
				</tr>
				<tr>
					<th>Depth</th><td><?php echo $divesitesOverview_row->depth;?></td><th>What to see</th><td><?php echo $divesitesOverview_row->what_to_use;?></td>
				</tr>
			</table>
		</div>
	</div>
	
	<?php 
	}
	?>