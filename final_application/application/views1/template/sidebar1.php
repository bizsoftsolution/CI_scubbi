<!-- Main sidebar -->
<div class="sidebar sidebar-main">
   <div class="sidebar-content">
   
	<?php 
		//if($this->session->userdata('user_id') != '')
		//{
		if($this->session->userdata('user_type') == 'DCADMIN')
		{
	?>
      <!-- User menu -->
      <div class="sidebar-user-material">
         <div class="category-content">
            <div class="sidebar-user-material-content">
               <?php if($this->session->userdata('photo')!=null)
                  {?>
               <a href="#"><img src="<?php echo base_url('upload/'.$this->session->userdata('photo'));?>" class="img-circle img-responsive" alt=""></a>
               <?php    }
                  else {?>
               <a href="#"><img src="<?php echo base_url('assets/images/female_user.png');?>" class="img-circle img-responsive" alt=""></a>
               <?php        }
                  ?>
               <h6><?php echo $this->session->userdata('first_name');?></h6>
            </div>
            <!--div class="sidebar-user-material-menu">
               <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
            </div-->
         </div>
         <!--div class="navigation-wrapper collapse" id="user-nav">
            <ul class="navigation">
               <li><a href="<?php echo  base_url();?>DCprofile/addNew"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
               <li><a href="<?php echo base_url('changePassword');?>"><i class="icon-lock"></i> <span>Change Password</span></a></li>
               <li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
               <li class="divider"></li>
               <li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
               <li><a href="<?php echo base_url(); ?>/Login/logout"><i class="icon-switch2"></i> <span>Logout</span></a></li>
            </ul>
         </div-->
      </div>
      <!-- /user menu -->
      <!-- Main navigation -->
      <div class="sidebar-category sidebar-category-visible">
         <div class="category-content no-padding">
            <ul class="navigation navigation-main navigation-accordion">
               <!-- Main -->
               <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
               <li class="active"><a href="<?php echo base_url('Dashboard');?>"><i class="icon-home7"></i> <span>Dashboard</span></a></li>
               <!-- /page kits -->
               <?php //if($this->session->userdata('user_type')=='SUPERADMIN')
                  //  {
                  ?>
              
            
           <!--     <li ><a href="<?php //echo base_url('Slider/sliderList');?>"><i class="icon-home3"></i> <span>Slider</span></a></li>-->
               <?php
                  //  }
                  ?>
				 <!--li>
                  <a href="#" class="has-ul legitRipple"><i class="icon-tree5"></i> <span>Master </span></a>
                  <ul class="hidden-ul">
                     <!--li><a href="<?php echo base_url('Country/countryList');?>" class="legitRipple">Country Details</a></li-->
                     <!--li><a href="<?php echo base_url('Island/islandList');?>" class="legitRipple">Island Details</a></li->
                     <li><a href="<?php echo base_url('DCleisure/Keywordlist');?>" class="legitRipple">Product Keywords</a></li>
                  </ul>
               </li-->
                <li><a href="<?php echo base_url('DCprofile/addNew');?>" class="legitRipple"><i class="icon-people"></i>Dive Center Profile</a></li>
                <li><a href="<?php echo base_url('DCleisure/DCleisuredashboard');?>" class="legitRipple"><i class="icon-stack2"></i>Leisure Dive</a></li>
                <li><a href="<?php echo base_url('DCcourses/DCcoursesdashboard');?>" class="legitRipple"><i class="icon-books"></i>Courses & Specialties</a></li>
                <li><a href="<?php echo base_url('DCpackage/DCpackagelist');?>" class="legitRipple"><i class="icon-gift"></i>Dive Package</a></li>
                <li><a href="<?php echo base_url('DCguidedtours/DCguidedtourslist');?>" class="legitRipple"><i class="icon-airplane2"></i>Guided Tours</a></li>
                <li><a href="<?php echo base_url('DCpolicies/DCpoliciesdashboardlist');?>" class="legitRipple"><i class="icon-stack-text"></i>Booking & Cancellation Policy</a></li>
                <!--li><a href="" class="legitRipple"><i class="icon-stack-cancel"></i>Cancellation Policy</a></li-->
                <!--li><a href="" class="legitRipple"><i class="icon-calendar22"></i>Available Reports</a></li>
                <li><a href="" class="legitRipple"><i class="icon-alarm-cancel"></i>Canceled Reports</a></li>
                <li><a href="" class="legitRipple"><i class="icon-alarm-check"></i>Booked Reports</a></li>
                <li><a href="" class="legitRipple"><i class="icon-people"></i>Customer Details</a></li-->
                <li><a href="<?php echo base_url('DCreview');?>" class="legitRipple"><i class="icon-medal-star"></i>Reviews</a></li>
                <li><a href="<?php echo base_url('Chat/inbox');?>" class="legitRipple"><i class="icon-comment-discussion"></i>Messages</a></li>
				<li><a href="<?php echo base_url('DCavailabiltycalendar');?>" class="legitRipple"><i class="icon-alarm-check"></i>Mybookings & Calendar</a></li>
				<li><a  href="<?php echo base_url(); ?>Login/logout"><i class="icon-switch2"></i><span>Logout</span></a></li>
                <li>
                  <a href="" class="has-ul legitRipple"><i class="icon-user-check"></i><span>Setting</span></a>
                  <ul class="hidden-ul">
                     <!--li><a  href="" ><i class="icon-user-plus"></i><span>Profile</span></a></li-->
                     <li><a  href="<?php echo base_url('changePassword');?>"><i class="icon-lock"></i><span>Change Password</span></a></li>
                     
                  </ul>
                </li>
            </ul>
         </div>
      </div>
	  <?php 
		}
		//}
		//else
		//{
		//	echo 'No Menu';
		//}
		elseif($this->session->userdata('user_type') == 'SUPERADMIN')
		{
		?>
		<div class="sidebar-user-material">
         <div class="category-content">
            <div class="sidebar-user-material-content">
               <?php if($this->session->userdata('photo')!=null)
                  {?>
               <a href="#"><img src="<?php echo base_url('upload/'.$this->session->userdata('photo'));?>" class="img-circle img-responsive" alt=""></a>
               <?php    }
                  else {?>
               <a href="#"><img src="<?php echo base_url('assets/images/female_user.png');?>" class="img-circle img-responsive" alt=""></a>
               <?php        }
                  ?>
               <h6><?php echo $this->session->userdata('first_name');?></h6>
            </div>
            <!--div class="sidebar-user-material-menu">
               <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
            </div-->
         </div>
         <!--div class="navigation-wrapper collapse" id="user-nav">
            <ul class="navigation">
               <li><a href="<?php echo  base_url();?>DCprofile/addNew"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
               <li><a href="<?php echo base_url('changePassword');?>"><i class="icon-lock"></i> <span>Change Password</span></a></li>
               <li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
               <li class="divider"></li>
               <li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
               <li><a href="<?php echo base_url(); ?>/Login/logout"><i class="icon-switch2"></i> <span>Logout</span></a></li>
            </ul>
         </div-->
		  <div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">
				   <!-- Main -->
				   <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
				    <li>
					  <a href="#" class="has-ul legitRipple"><i class="icon-tree5"></i> <span>Master </span></a>
					  <ul class="hidden-ul">
						 <li><a href="<?php echo base_url('Country/countryList');?>" class="legitRipple">Country Details</a></li>
						 <li><a href="<?php echo base_url('Island/islandList');?>" class="legitRipple">Island Details</a></li>
						  <li><a href="<?php echo base_url('DCleisure/Keywordlist');?>" class="legitRipple">Product Keywords</a></li>
						
								
								
					  </ul>
				   </li>
				     <li>
							  <a href="#" class="has-ul legitRipple"> <i class="icon-stack2"></i> <span>Standard Product </span></a>
							  <ul class="hidden-ul">
								  <li><a href="<?php echo base_url('SAleisure/SAleisuredashboard');?>" class="legitRipple">Leisure Dive</a></li>
									<li><a href="<?php echo base_url('SAcourses/SAcoursesdashboard');?>" class="legitRipple">Courses & Specialties</a></li>
								</ul>
							</li>
				   <li><a href="<?php echo base_url('SAslider');?>" class="legitRipple"><i class="icon-people"></i>Slider</a></li>
					<li><a href="<?php echo base_url('SAtellmemore');?>" class="legitRipple"><i class="icon-stack2"></i>Tell Me More</a></li>
					<li><a href="<?php echo base_url('SAdivepoint');?>" class="legitRipple"><i class="icon-books"></i>Dive Points</a></li>
					<li><a href="<?php echo base_url('SAbecomeapartner');?>" class="legitRipple"><i class="icon-gift"></i>Become a Partner</a></li>
					<li><a href="<?php echo base_url('SAbecomeapartner/userDetails');?>" class="legitRipple"><i class="icon-comment-discussion"></i>User Details</a></li>
					<li><a href="<?php echo base_url('SAbecomeapartner/diveCenterDetails');?>" class="legitRipple"><i class="icon-user-check"></i>Dive Center Details</a></li>
					<!--li><a href="<?php echo base_url('Country/countryList');?>" class="legitRipple"><i class="icon-airplane2"></i>Country</a></li-->
					<li><a href="<?php echo base_url('SAtellmemore/popularDivingDestination');?>" class="legitRipple"><i class="icon-stack-text"></i>Popular Diving Destination</a></li>
					
				
						
				 <!--li><a href="<?php echo base_url('SApackage/SApackagelist');?>" class="legitRipple"><i class="icon-gift"></i>Dive Package</a></li>
                <li><a href="<?php echo base_url('SAguidedtours/SAguidedtourslist');?>" class="legitRipple"><i class="icon-airplane2"></i>Guided Tours</a></li-->
				   <li><a  href="<?php echo base_url('Login/logout'); ?>"><i class="icon-switch2"></i><span>Logout</span></a></li>
					<li>
					  <a href="" class="has-ul legitRipple"><i class="icon-user-check"></i><span>Setting</span></a>
					  <ul class="hidden-ul">
						 <!--li><a  href="" ><i class="icon-user-plus"></i><span>Profile</span></a></li-->
						 <li><a  href="<?php echo base_url('changePassword');?>"><i class="icon-lock"></i><span>Change Password</span></a></li>
					  </ul>
					</li>
				</ul>
			</div>
		</div>
      </div>	
	<?php	
		}
	  elseif($this->session->userdata('user_type') == 'BUGSDEVELOPER')
		{
		?>
		<div class="sidebar-user-material">
         <div class="category-content">
            <div class="sidebar-user-material-content">
               <?php if($this->session->userdata('photo')!=null)
                  {?>
               <a href="#"><img src="<?php echo base_url('upload/'.$this->session->userdata('photo'));?>" class="img-circle img-responsive" alt=""></a>
               <?php    }
                  else {?>
               <a href="#"><img src="<?php echo base_url('assets/images/female_user.png');?>" class="img-circle img-responsive" alt=""></a>
               <?php        }
                  ?>
               <h6><?php echo $this->session->userdata('first_name');?></h6>
            </div>
            <!--div class="sidebar-user-material-menu">
               <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
            </div-->
         </div>
         <!--div class="navigation-wrapper collapse" id="user-nav">
            <ul class="navigation">
               <li><a href="<?php echo base_url(); ?>Login/logout"><i class="icon-switch2"></i> <span>Logout</span></a></li>
            </ul>
         </div-->
		</div>
		<div class="sidebar-category sidebar-category-visible">
         <div class="category-content no-padding">
            <ul class="navigation navigation-main navigation-accordion">
               <!-- Main -->
               <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                
                <li><a href="<?php echo base_url('Bugs/Buglist');?>" class="legitRipple"><i class="icon-people"></i>Bugs</a></li>
              
                <li><a href="<?php echo base_url('Bugs/notcompletedList');?>" class="legitRipple"><i class="icon-stack2"></i>Not Completed Bugs</a></li>
               
                 <li><a href="<?php echo base_url('Bugs/completedList');?>" class="legitRipple"><i class="icon-books"></i>Completed Bugs</a></li>
				 <li><a  href="<?php echo base_url(); ?>/Login/logout"><i class="icon-switch2"></i><span>Logout</span></a></li>
				 <li>
				  <a href="" class="has-ul legitRipple"><i class="icon-user-check"></i><span>Setting</span></a>
				  <ul class="hidden-ul">
					 <!--li><a  href="" ><i class="icon-user-plus"></i><span>Profile</span></a></li-->
					 <li><a  href="<?php echo base_url('changePassword');?>"><i class="icon-lock"></i><span>Change Password</span></a></li>
					 
				  </ul>
				</li>
            </ul>
         </div>
      </div>
	<?php	
		}
		elseif($this->session->userdata('user_type') == 'BUGVIEWER')
		{
		?>
		<div class="sidebar-user-material">
         <div class="category-content">
            <div class="sidebar-user-material-content">
               <?php if($this->session->userdata('photo')!=null)
                  {?>
               <a href="#"><img src="<?php echo base_url('upload/'.$this->session->userdata('photo'));?>" class="img-circle img-responsive" alt=""></a>
               <?php    }
                  else {?>
               <a href="#"><img src="<?php echo base_url('assets/images/female_user.png');?>" class="img-circle img-responsive" alt=""></a>
               <?php        }
                  ?>
               <h6><?php echo $this->session->userdata('first_name');?></h6>
            </div>
            <!--div class="sidebar-user-material-menu">
               <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
            </div-->
         </div>
         <!--div class="navigation-wrapper collapse" id="user-nav">
            <ul class="navigation">
               <li><a href="<?php echo base_url(); ?>Login/logout"><i class="icon-switch2"></i> <span>Logout</span></a></li>
            </ul>
         </div-->
		</div>
		<div class="sidebar-category sidebar-category-visible">
         <div class="category-content no-padding">
            <ul class="navigation navigation-main navigation-accordion">
               <!-- Main -->
               <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                
                <li><a href="<?php echo base_url('Bugs/allBugs');?>" class="legitRipple"><i class="icon-people"></i>Bugs</a></li>
              
                <li><a href="<?php echo base_url('Bugs/completedList');?>" class="legitRipple"><i class="icon-books"></i>Completed Bugs</a></li>
				<li><a  href="<?php echo base_url(); ?>Login/logout"><i class="icon-switch2"></i><span>Logout</span></a></li>
					<li>
					  <a href="" class="has-ul legitRipple"><i class="icon-user-check"></i><span>Setting</span></a>
					  <ul class="hidden-ul">
						 <!--li><a  href="" ><i class="icon-user-plus"></i><span>Profile</span></a></li-->
						 <li><a  href="<?php echo base_url('changePassword');?>"><i class="icon-lock"></i><span>Change Password</span></a></li>
						 
					  </ul>
					</li>  
                
            </ul>
         </div>
      </div>
	<?php	
		}
	  ?>
      <!-- /main navigation -->
   </div>
</div>
<!-- /main sidebar -->