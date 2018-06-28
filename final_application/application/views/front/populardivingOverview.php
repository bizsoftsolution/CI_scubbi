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
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/assert/gentleSelect/jquery-gentleSelect.js');?>"></script>      -->

    <link href="<?php echo base_url('assets/frontend/daterange/css/datepicker.css');?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/frontend/daterange/js/datepicker.js');?>"></script>
		<link rel="stylesheet"  href="<?php echo base_url('assets/frontend/assert/css/lightslider.css'); ?>"/>
	<script src="<?php echo base_url('assets/frontend/assert/js/lightslider.js'); ?>"></script> 
	
	<style>
.wrapper {
    min-width:100%;
    max-width: 100%;
}
#overlay {
    position: fixed;
    top: 103;
    width: 100%;
    height: 100%;
}
#overlay .wrapper {
    height: 100%;
}

@media screen and (max-width: 480px) and (min-width: 320px) {
   #dvMap
   {
	      width: 100%!important;
	   height:auto;
   }
   #overlay
   {
	   position:relative;
	   width: 100%;
    height: 100%;
	bottom:0;
   }
   .nopstyle
   {
	   width:100%;
   }
   
}
@media screen and (max-width: 1000px) and (min-width: 481px) {
   #dvMap
   {
	       width: 100%!important;
	   height:auto;
   }
   #overlay
   {
	   position:relative;
	   width: 100%;
    height: 100%;
	bottom:0;
   }
   
}

@media screen and (max-width: 1000px) and (min-width: 600px) {
	#dvMap
   {
	       width: 100%!important;
	   height:auto;
   }
	.flate-search
   {
	   margin:125px 0 0 0;
		min-width:100%;
		max-width: 100%;
   }
   #wrapper {
    /* width: 800px; */
    /* margin: 0 auto; */
    color: #333;
    font-family: Tahoma,Verdana,sans-serif;
    line-height: 1.5;
    font-size: 14px;
}
#dvMap
   {
	   width:100%;
	   height:auto;
   }
}
</style>
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
					&nbsp;
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
                <a href="<?php echo base_url('Customer/allMessages');?>" ><i class="fa fa-envelope-o" style="color:#000;"><span id="messageCountSpan"  class="badge badge-danger" style="background-color: red;position: absolute;top: 0px;left: 0px;"><?php if($notification != 0) { echo $notification; ?> <?php } else {	
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
                    <img src="<?php echo base_url();?>upload/customerprofile/<?php echo $a1->photo; ?>" style="width:50px;height:50px;" class="profile-image img-circle"> <!--Username <b class="caret"></b--></a>
				
					
                      <?php 
                    }else if($a1->profile_pic != NULL){
                      ?>
                      <a href="<?php echo base_url('Customer/customerDashboard');?>" class="dropdown-toggle1" data-toggle="dropdown1" style="padding: 0px 0px;border-radius:50%">
                        <img src="<?php echo $a1->profile_pic; ?>" style="width:50px;height:50px;" class="profile-image img-circle"> <!--Username <b class="caret"></b--></a>


                         <?php }
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
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-6">
					<div class="demo" style="padding: 0px 0px 0 5px!important;">
						<div class="item">            
							<div class="clearfix">
								<ul id="image-gallery" class="gallery list-unstyled cS-hidden">
									<?php 
									$res_dive_country = $this->db->get_where('tbl_populardivingdestination', array('country_id'=>$cid_dive))->result();
									foreach($res_dive_country as $res_row_country1)
									{
										
										$r1 = $res_row_country1->image;
										$row_image = explode(',', $r1);
										$i=0;
										foreach($row_image as $row_1)
										{
									?>
										<li data-thumb="<?php echo  base_url();?>upload/ppd/<?php echo $row_image[$i]; ?>"> 
										<img src="<?php echo base_url();?>upload/ppd/<?php echo $row_image[$i]; ?>" style="height:300px;"/>
										 </li>
									<?php 
										$i++;
										}
									}
									?>
								</ul>
							</div>
						</div>
					</div>	
				</div>
				<div class="col-md-6" style="overflow-y:scroll;height:330px;border:1px solid #eee;">
					
					<?php 
					$res_dive_country = $this->db->get_where('tbl_country', array('country_id'=>$cid_dive))->result();
					foreach($res_dive_country as $res_row_country)
					{
					?>
					<h4><b>Overview of Scuba Diving in <?php echo $res_row_country->country_name; ?></b></h4>
					<?php 
					//}
					//$res_dive = $this->db->get_where('tbl_populardivingdestination', array('country_id'=>$cid_dive))->result();
					//foreach($res_dive as $res_row)
					//{
					?>
					<p style="color: #222;line-height: 24px;font-size:13px;text-align:justify;"><?php echo $res_row_country->country_desc; ?></p>
					<?php
					//}
					?>
					<h4><b>Highlight</b></h4>
					<?php
					//foreach($populardivedestination as $res)
					//{
					?>
					
					<p>
					<?php 
						$res_island_name = $this->db->get_where('tbl_island', array('country_id'=>$cid_dive))->result();
						foreach($res_island_name as $res_island)
						{
							echo '<b style="font-size:16px;color: #777;font-family:Open Sans;">'.$res_island->island_name.'</b>';
						//}
					?>
					</p>
					<p style="color: #222;line-height: 24px;font-size:13px;text-align:justify;"><?php echo $res_island->description; ?></p>
					
					<?php
						}
					}
					?>
					
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php 
					$res_dive_country = $this->db->get_where('tbl_country', array('country_id'=>$cid_dive))->result();
					foreach($res_dive_country as $res_row_country)
					{
					?>
					<h3>Best Islands in <?php echo $res_row_country->country_name; ?> For Scuba Diving</h3>
					<?php 
					}
					?>
				</div>
				<div class="col-md-12">
					<script>
					$(document).ready(function(){
						$("#hidePopularDestinations").hide();
						$("#popularLoadLessDiv").hide();
						$("#popularViewAllDiv").hide();
						
						$("#popularLoadMore").click(function(){
							$("#hidePopularDestinations").show();
							$("#popularLoadLessDiv").show();
							$("#popularViewAllDiv").show();
							$("#popularLoadMoreDiv").hide();
						});
						$("#popularLoadLess").click(function(){
							$("#hidePopularDestinations").hide();
							$("#popularLoadLessDiv").hide();
							$("#popularViewAllDiv").hide();
							$("#popularLoadMoreDiv").show();
						});
					});
					</script>
					<div class="row">
						<?php 
						$a=1;
						$b=0;
						$data = $this->db->get_where('tbl_island', array('country_id'=>$cid_dive))->result();
						foreach($data as $res) 
						{ 
						//$pdd=$res->popular_diving_destination; 
						//if($pdd == 'Yes') { 
						?>
						<div class="col-md-3 col-sm-4 col-xs-12">
							<div class="featured-image-box" style="margin-top:5%;">
								<div class="img-box">
								<a href="<?php echo base_url(); ?>Front/tellmemore/<?php echo $res->island_id; ?>/<?php echo $res->country_id; ?>" target="_blank">
								<img src="<?php echo base_url(); ?>upload/islands/<?php echo $res->image; ?>" class="img-responsive center-block" alt="">
								<span style="position: absolute;top: 5%;left: 25px;color: #fff;font-weight: bold;text-transform: uppercase;font-size: 23px;"><?php 
								$cpdd = $res->island_name;
								echo $cpdd;
								/* $data_pdd=$this->db->get_where('tbl_island', array('island_id'=>$cpdd))->result();
								foreach($data_pdd as $cval_pdd){ echo $cval_pdd->island_name; } */
								?></span>
								</a>
								</div>                    
							</div>
						</div>
						
						<?php 
						if($a == 8)
						{
							$b=1;?>
							<div id="hidePopularDestinations">
				<?php		}
						//}
						$a++;
						}
						if($b == 1)
						{?>
							
							</div>
				<?php		}
						?>
					</div>
					<div class="row">
						<div class="col-md-12">
							
							<div class="load-more-btn1" id="popularLoadMoreDiv"  style="text-align:center;margin-top: 15px;">
								<p style="border:1px solid #777;">
									
									<label id="popularLoadMore" style="cursor:pointer;color: #635d5d;font-size: 14px;line-height: 14px;">Click to show more...</label>
									<!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
								</p>
							</div>
							<div class="load-more-btn1" id="popularLoadLessDiv"  style="text-align:center;margin-top: 15px;">
								<p style="border:1px solid #777;">
									<label id="popularLoadLess" style="cursor:pointer;color: #635d5d;font-size: 14px;line-height: 14px;">Click to show Less...</label>
									<!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
								</p>
							</div>
							<div class="load-more-btn1" id="popularViewAllDiv"  style="text-align:center;">
								<p style="border:1px solid #777;margin-top: 15px;">
									<a href="<?php echo base_url(); ?>Front/get_AllPDD" id="popularViewAll" style="cursor:pointer;color: #635d5d;font-size: 14px;line-height: 14px;">View All</a>
									<!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
								</p>
							</div>
									
						</div>    	
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div id="overlay">
					<div class="wrapper">
						<div style="width:410px;">
			<?php echo $map['js']; ?>
			<?php echo $map['html']; ?>
			</div>
			</div>
			</div>
		</div>
	</div>
