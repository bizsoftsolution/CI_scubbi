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
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900%7cOpen+Sans:400,600,700" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/frontend/css/nouislider.min.css'); ?>" rel="stylesheet">
  <!-- Theme Color -->
  <link rel="stylesheet" id="color" href="<?php echo base_url('assets/frontend/css/colors/defualt.css'); ?>">
  <!-- For Style Switcher -->
  <link rel="stylesheet" id="theme-color" type="text/css" href="#" />
  <!-- JavaScripts -->
  <script src="<?php echo base_url('assets/frontend/js/modernizr.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery-3.1.1.js'); ?>"></script>
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
<link href="<?php echo base_url('assets/frontend/responsive.css');?>" rel="stylesheet">
<!-- jPList core js and css  -->
		<link href="<?php echo base_url(); ?>assets/jplist/css/jplist.core.min.css" rel="stylesheet" type="text/css" />		
		<script src="<?php echo base_url(); ?>assets/jplist/js/jplist.core.min.js"></script>		
	
		<!-- jplist pagination bundle -->
		<script src="<?php echo base_url(); ?>assets/jplist/js/jplist.pagination-bundle.min.js"></script>
		<link href="<?php echo base_url(); ?>assets/jplist/css/jplist.pagination-bundle.min.css" rel="stylesheet" type="text/css" />

		<!-- jPList start -->
		
		<!-- jPList toggle bundle -->
		<script src="<?php echo base_url(); ?>assets/jplist/js/jplist.filter-toggle-bundle.min.js"></script>
		<link href="<?php echo base_url(); ?>assets/jplist/css/jplist.filter-toggle-bundle.min.css" rel="stylesheet" type="text/css" />
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
		$('document').ready(function(){
		
			$('#demo').jplist({				
				itemsBox: '.list' 
				,itemPath: '.list-item' 
				,panelPath: '.jplist-panel'	
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
  </head>

<body onfocus='page_onfocus()'>
    <header class="index4-header">
     <!--a class="navbar-brand visible-xs" id="navbar-logo-mobile" href=""><img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
     <a href="" class=" visible-xs " style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 15px;">Connecting Drivers Globally </a-->
     <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid" style="padding-right: 37px!important;">
       <div class="navbar-header col-md-5">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" id="navbar-logo" href="<?php echo base_url(); ?>">
          <img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
          <div class="header-text" style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 15px;margin-top: 13px;">Connecting Drivers Globally</div>

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
			     <body>
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
            // echo $this->db->last_query();

					//	echo $notification;
					
                foreach ($data1 as $a1) 
                {
					if($a1->photo != NULL)
					{
					  ?>
						<a href="<?php echo base_url('Customer/customerDashboard');?>" class="dropdown-toggle1" data-toggle="dropdown1" style="padding: 0px 0px;border-radius:50%">
							<img src="<?php echo base_url();?>upload/customerprofile/<?php echo $a1->photo; ?>" style="width:50px;height:50px;" class="profile-image img-circle"> <!--Username <b class="caret"></b-->
						</a>
                      <?php 
                    }
					else if($a1->profile_pic != NULL)
					{
                      ?>
						<a href="<?php echo base_url('Customer/customerDashboard');?>" class="dropdown-toggle1" data-toggle="dropdown1" style="padding: 0px 0px;border-radius:50%">
							<img src="<?php echo $a1->profile_pic; ?>" style="width:50px;height:50px;" class="profile-image img-circle"> <!--Username <b class="caret"></b-->
						</a>


                         <?php 
					}
                    else
					{
                           ?>
                        <a href="<?php echo base_url('Customer/customerDashboard');?>" class="dropdown-toggle1" data-toggle="dropdown1" style="padding: 0px 0px;border-radius:50%">
                            <img src="<?php echo base_url();?>upload/customerprofile/user.png" style="width:50px;height:50px;" class="profile-image img-circle"> <!--Username <b class="caret"></b-->
						</a>
							
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
                           <li><a href="<?php echo base_url('Customer/customerDashboard'); ?>"> My Message</a></li>
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
                  <li><a href="#" data-toggle="modal" data-target=".register-model"> Signup/Register</a></li>
					<!--<li>						
                        <a href="<?php echo base_url('Customer/customerSignup'); ?>" ></a>
                      </li>-->
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
