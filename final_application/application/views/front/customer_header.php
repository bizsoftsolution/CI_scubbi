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
	
<!-- ############################# path: assets/jQuery_Date_Range_Picker #######################################################################-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jQuery_Date_Range_Picker/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jQuery_Date_Range_Picker/daterangepicker.min.css" />
	<script src="<?php echo base_url(); ?>assets/jQuery_Date_Range_Picker/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/jQuery_Date_Range_Picker/moment.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/jQuery_Date_Range_Picker/jquery.daterangepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/jQuery_Date_Range_Picker/demo.js"></script>
<!-- ############################# path: assets/jQuery_Date_Range_Picker #######################################################################-->
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
            <div class="container">
               <div class="navbar-header col-md-5">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" id="navbar-logo" href="<?php echo base_url(); ?>">
				  <img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
				  <div  style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 15px;margin-top: 13px;">Connecting Drivers Globally</div>
				  
               </div>
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations="fadeInDown fadeInRight fadeInUp fadeInLeft">
                  <ul class="nav navbar-nav navbar-right" id="menu-right">
 
                     <li>
                        <a href="" >Become a Partner </a>
					</li>
					<li>
                        <a href="" >Help</a>
					</li>
					<li>
                    <div class="dropdown">

					<img src="<?php echo base_url('upload/1483346768735.png');?>" data-toggle="dropdown" style="width: 50px;
    height: 50px;margin:20px 0 0 0;">
					<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
					  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Profile</a></li>
					  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url('Customer/logout'); ?>">Logout</a></li>  
					</ul>
					
				  </div>
				  </li>
                  </ul>
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
                        <a href="" >Become a Partner </a>
					</li>
					<li>
                        <a href="" >Help</a>
					</li>
					<li>						
                        <a href="" >Register</a>
					</li>
					<li>						
                        <a href="" >Login</a>
                     </li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div-->
      <!-- mobile-menu-area-end -->
    <!-- mobile-menu-area-end -->