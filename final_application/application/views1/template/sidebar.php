<!-- Main sidebar -->
<div class="sidebar sidebar-main">
   <div class="sidebar-content">
   
	<?php 
		//if($this->session->userdata('user_id') != '')
		//{
		if($this->session->userdata('user_type') == 'DCADMIN')
		{
//		echo($this->uri->segment(1) . " > " . $this->uri->segment(2));
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
               <li <?php echo ($this->uri->segment(1) == 'Dashboard' ? 'class="active"' : ''); ?> ><a href="<?php echo base_url('Dashboard');?>"><i class="icon-home7"></i> <span>Dashboard</span></a></li>
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
                <li <?php echo ($this->uri->segment(1) == 'DCprofile' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('DCprofile/addNew');?>" class="legitRipple"><i class="icon-people"></i>Dive Center Profile</a></li>
				<li>
					<a href="#" class="has-ul legitRipple"> <i class="icon-stack2"></i> <span>Products</span></a>
				<?php 
				$prods = array('DCleisure','DCcourses','DCpackage','DCguidedtours');
				if (in_array($this->uri->segment(1),$prods)) {
				echo( "					<ul class=\"hidden-ul\" style=\"display: block;\">");
				} else {
				echo( "					<ul class=\"hidden-ul\">");
				}?>
                		<li <?php echo ($this->uri->segment(1) == 'DCleisure' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('DCleisure/DCleisuredashboard');?>" class="legitRipple"><i class="icon-stack2"></i>Leisure Dive</a></li>
                		<li <?php echo ($this->uri->segment(1) == 'DCcourses' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('DCcourses/DCcoursesdashboard');?>" class="legitRipple"><i class="icon-books"></i>Courses & Specialties</a></li>
                		<li <?php echo ($this->uri->segment(1) == 'DCpackage' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('DCpackage/DCpackagelist');?>" class="legitRipple"><i class="icon-people"></i>Dive Package</a></li>
                		<li <?php echo ($this->uri->segment(1) == 'DCguidedtours' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('DCguidedtours/DCguidedtourslist');?>" class="legitRipple"><i class="icon-airplane2"></i>Guided Tours</a></li>
					</ul>
				</li>
                <li <?php echo ($this->uri->segment(1) == 'DCpolicies' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('DCpolicies/DCpoliciesdashboardlist');?>" class="legitRipple"><i class="icon-stack-text"></i>Booking & Cancellation Policy</a></li>
                <!--li><a href="" class="legitRipple"><i class="icon-stack-cancel"></i>Cancellation Policy</a></li-->
                <!--li><a href="" class="legitRipple"><i class="icon-calendar22"></i>Available Reports</a></li>
                <li><a href="" class="legitRipple"><i class="icon-alarm-cancel"></i>Canceled Reports</a></li>
                <li><a href="" class="legitRipple"><i class="icon-alarm-check"></i>Booked Reports</a></li>
                <li><a href="" class="legitRipple"><i class="icon-people"></i>Customer Details</a></li-->
                <li <?php echo ($this->uri->segment(1) == 'DCBooking' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('DCBooking/bookingList/' . $this->session->userdata('user_id'));?>" class="legitRipple"><i class="icon-gift"></i>Bookings</a></li>
                <li <?php echo ($this->uri->segment(1) == 'DCreview' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('DCreview');?>" class="legitRipple"><i class="icon-medal-star"></i>Reviews</a></li>
                <li <?php echo ($this->uri->segment(1) == 'Chat' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('Chat/inbox');?>" class="legitRipple"><i class="icon-comment-discussion"></i>Messages</a></li>
				<li <?php echo ($this->uri->segment(1) == 'DCavailabiltycalendar' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('DCavailabiltycalendar');?>" class="legitRipple"><i class="icon-alarm-check"></i>My Calendar</a></li>
				<li>
				<a href="#" class="has-ul legitRipple"> <i class="icon-stack2"></i> <span>Reports</span></a>
				<?php 
				$prods = array('DCReports');
				if (in_array($this->uri->segment(1),$prods)) {
				echo( "					<ul class=\"hidden-ul\" style=\"display: block;\">");
				} else {
				echo( "					<ul class=\"hidden-ul\">");
				}?>
								  <li <?php echo ($this->uri->segment(1) == 'DCReports' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('DCReports/salesReportsList');?>" class="legitRipple">Sales Report</a></li>
									
								</ul>
				</li>
				<li ><a  href="<?php echo base_url(); ?>Login/logout"><i class="icon-switch2"></i><span>Logout</span></a></li>
                <li>
                  <a href="" class="has-ul legitRipple"><i class="icon-user-check"></i><span>Setting</span></a>
                  <ul class="hidden-ul" <?php echo ($this->uri->segment(1) == 'changePassword' ? 'style ="display: block;"' :''); ?> >
                     <!--li><a  href="" ><i class="icon-user-plus"></i><span>Profile</span></a></li-->
                     <li <?php echo ($this->uri->segment(1) == 'changePassword' ? 'class="active"' : ''); ?>><a  href="<?php echo base_url('changePassword');?>"><i class="icon-lock"></i><span>Change Password</span></a></li>
                     
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
				<?php 
				$prods = array('Country','Island','DCleisure','SAtellmemore','SAdivepoint');
				if (in_array($this->uri->segment(1),$prods)) {
				echo( "					<ul class=\"hidden-ul\" style=\"display: block;\">");
				} else {
				echo( "					<ul class=\"hidden-ul\">");
				}?>
						<li <?php echo ($this->uri->segment(1) == 'Country' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('Country/countryList');?>" class="legitRipple">Country Details</a></li>
						<li <?php echo (($this->uri->segment(1) == 'SAtellmemore' && $this->uri->segment(2) == '') || ($this->uri->segment(1) == 'SAtellmemore' && $this->uri->segment(2) == 'editData') ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAtellmemore');?>" class="legitRipple">Tell Me More</a></li>
						<li <?php echo ($this->uri->segment(1) == 'Island' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('Island/islandList');?>" class="legitRipple">Island Details</a></li>
						<li <?php echo ($this->uri->segment(1) == 'DCleisure' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('DCleisure/Keywordlist');?>" class="legitRipple">Product Keywords</a></li>
						<li <?php echo ($this->uri->segment(1) == 'SAppd' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAppd');?>" class="legitRipple">Popular Diving Destination</a></li>
						<li <?php echo ($this->uri->segment(1) == 'SAdivepoint' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAdivepoint');?>" class="legitRipple">Dive Points</a></li>
								
								
					  </ul>
				   </li>
				     <li>
							  <a href="#" class="has-ul legitRipple"> <i class="icon-stack2"></i> <span>Standard Product </span></a>
				<?php 
				$prods = array('SAleisure','SAcourses');
				if (in_array($this->uri->segment(1),$prods)) {
				echo( "					<ul class=\"hidden-ul\" style=\"display: block;\">");
				} else {
				echo( "					<ul class=\"hidden-ul\">");
				}?>
								  <li <?php echo ($this->uri->segment(1) == 'SAleisure' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAleisure/SAleisuredashboard');?>" class="legitRipple">Leisure Dive</a></li>
									<li <?php echo ($this->uri->segment(1) == 'SAcourses' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAcourses/SAcoursesdashboard');?>" class="legitRipple">Courses & Specialties</a></li>
								</ul>
							</li>
					
				<li>
				<a href="#" class="has-ul legitRipple"> <i class="icon-chart"></i> <span>Reports</span></a>
				<?php 
				$prods = array('SAReports');
				if (in_array($this->uri->segment(1),$prods)) {
				echo( "					<ul class=\"hidden-ul\" style=\"display: block;\">");
				} else {
				echo( "					<ul class=\"hidden-ul\">");
				}?>
								  <li <?php echo ($this->uri->segment(1) == 'SAReports' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAReports/salesReportsList');?>" class="legitRipple">Sales Report</a></li>
								  <li <?php echo ($this->uri->segment(1) == 'SAReports' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAReports/cancelReportsList');?>" class="legitRipple">Cancellation Report</a></li>
								
								<li <?php echo ($this->uri->segment(1) == 'SAReports' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAReports/visitList');?>" class="legitRipple">Log Report</a></li>
								
								<li <?php echo ($this->uri->segment(1) == 'SAReports' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAReports/dcvisitList');?>" class="legitRipple">Dc Visit Report</a></li>

								<li <?php echo ($this->uri->segment(1) == 'SAReports' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAReports/daterangeList');?>" class="legitRipple">Date Range Report</a></li>
								</ul>
				</li>
				<!--li ><a href="<?php echo base_url('Module/moduleList');?>" class="legitRipple"><i class="icon-people"></i>Modules</a></li-->
				<li ><a href="<?php echo base_url('currency');?>" class="legitRipple"><i class="fa fa-money custom"></i>Currency</a></li>
				<li ><a href="<?php echo base_url('Employee/employeeList');?>" class="legitRipple"><i class="icon-people"></i>Employee</a></li>
				<li ><a href="<?php echo base_url('Privilege/privilegeList');?>" class="legitRipple"><i class="icon-user-check"></i>Privilege</a></li>
				<li ><a href="<?php echo base_url('DCprofile/DCgalleryList');?>" class="legitRipple"><i class="icon-image-compare"></i>Gallery</a></li>
				
				   <li <?php echo ($this->uri->segment(1) == 'SAslider' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAslider');?>" class="legitRipple"><i class="icon-gallery"></i>Slider</a></li>
                    <li <?php echo ($this->uri->segment(1) == 'SABooking' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SABooking/bookingList');?>" class="legitRipple"><i class="icon-notebook"></i>Bookings</a></li>
					<!--<li><a href="<?php echo base_url('SAdivepoint');?>" class="legitRipple"><i class="icon-books"></i>Dive Points</a></li>-->
					<li <?php echo ($this->uri->segment(1) == 'SAbecomeapartner' && $this->uri->segment(2) == ''  ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAbecomeapartner');?>" class="legitRipple"><i class="icon-airplane2"></i>Become a Partner</a></li>
					<li <?php echo ($this->uri->segment(1) == 'SAbecomeapartner' && $this->uri->segment(2) == 'userDetails'  ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAbecomeapartner/userDetails/Customer');?>" class="legitRipple"><i class="icon-users4"></i>User Details</a></li>
					<li <?php echo ($this->uri->segment(1) == 'SAbecomeapartner' && $this->uri->segment(2) == 'diveCenterDetails'  ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAbecomeapartner/diveCenterDetails');?>" class="legitRipple"><i class="icon-city"></i> Messages</a></li>
					<li <?php echo ($this->uri->segment(1) == 'Subscribe' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('Subscribe');?>" class="legitRipple"><i class="icon-users2"></i>Subscribe</a></li>
					<!--li><a href="<?php echo base_url('Country/countryList');?>" class="legitRipple"><i class="icon-airplane2"></i>Country</a></li-->
					
				
						
				 <!--li><a href="<?php echo base_url('SApackage/SApackagelist');?>" class="legitRipple"><i class="icon-gift"></i>Dive Package</a></li>
                <li><a href="<?php echo base_url('SAguidedtours/SAguidedtourslist');?>" class="legitRipple"><i class="icon-airplane2"></i>Guided Tours</a></li-->
					<li><a  href="<?php echo base_url('promo_code'); ?>"><i class="icon-percent"></i><span>Promo Code</span></a></li>
				
				   <li><a  href="<?php echo base_url('Login/logout'); ?>"><i class="icon-switch2"></i><span>Logout</span></a></li>
				   
					<li>
					  <a href="" class="has-ul legitRipple"><i class="icon-gear position-left"></i><span>Setting</span></a>
					  <ul class="hidden-ul" <?php echo ($this->uri->segment(1) == 'changePassword' ? 'style ="display: block;"' :''); ?>>
						 <!--li><a  href="" ><i class="icon-user-plus"></i><span>Profile</span></a></li-->
						 <li <?php echo ($this->uri->segment(1) == 'changePassword' ? 'class="active"' : ''); ?>><a  href="<?php echo base_url('changePassword');?>"><i class="icon-lock"></i><span>Change Password</span></a></li>
					  </ul>
					</li>
				</ul>
			</div>
		</div>
      </div>	
	<?php	
		}
		elseif($this->session->userdata('user_type') == 'CUSTOM')
		{
			//echo "hiiiiiiiiiiiiiiiiiiiiiiiii";
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
		</div>
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">
				   <!-- Main -->
				   <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
				   
				   <?php 
						$data7 = $this->db->get_where("tbl_privilege", array("emp_id"=>$this->session->userdata('emp_no')))->result();
						foreach($data7 as $data7_row)
						{
							$exp_module = explode(",",$data7_row->module);
							
						?>
						<li>
							<a href="" class="has-ul legitRipple"><i class="icon-tree5"></i><span>Master</span></a>
							<ul class="hidden-ul">
								<?php
							foreach($exp_module as $exp_module_row)
							{
								if($exp_module_row == "Country/countryList")
								{
							?>
								<li <?php echo ($this->uri->segment(1) == 'Country' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('Country/countryList');?>" class="legitRipple">Country Details</a></li>
							<?php
								}
								elseif($exp_module_row == "SAtellmemore")
								{
							?>
								<li <?php echo (($this->uri->segment(1) == 'SAtellmemore' && $this->uri->segment(2) == '') || ($this->uri->segment(1) == 'SAtellmemore' && $this->uri->segment(2) == 'editData') ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAtellmemore');?>" class="legitRipple">Tell Me More</a></li>
							<?php
								}
								elseif($exp_module_row == "Island/islandList")
								{
							?>
								<li <?php echo ($this->uri->segment(1) == 'Island' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('Island/islandList');?>" class="legitRipple">Island Details</a></li>
							<?php
								}
								elseif($exp_module_row == "DCleisure/Keywordlist")
								{
							?>
								<li <?php echo ($this->uri->segment(1) == 'DCleisure' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('DCleisure/Keywordlist');?>" class="legitRipple">Product Keywords</a></li>
						
							<?php
								}
								elseif($exp_module_row == "SAppd")
								{
							?>
								<li <?php echo ($this->uri->segment(1) == 'SAtellmemore' && $this->uri->segment(2) == 'popularDivingDestination'  ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAppd');?>" class="legitRipple">Popular Diving Destination</a></li>
						
							<?php
								}
								elseif($exp_module_row == "SAdivepoint")
								{
							?>
								<li <?php echo ($this->uri->segment(1) == 'SAdivepoint' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAdivepoint');?>" class="legitRipple">Dive Points</a></li>
							<?php
								}
							}	
								?>
							</ul>
						</li>
				   <li>
					<a href="#" class="has-ul legitRipple"> <i class="icon-stack2"></i> <span>Standard Product </span></a>
					<?php 
					$prods = array('SAleisure','SAcourses');
					if (in_array($this->uri->segment(1),$prods)) {
					echo( "					<ul class=\"hidden-ul\" style=\"display: block;\">");
					} else {
					echo( "					<ul class=\"hidden-ul\">");
					}?>
					
					<?php
					foreach($exp_module as $exp_module_row)
					{
						if($exp_module_row == "SAleisure/SAleisuredashboard")
						{
					?>	
						<li <?php echo ($this->uri->segment(1) == 'SAleisure' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAleisure/SAleisuredashboard');?>" class="legitRipple">Leisure Dive</a></li>
					<?php 
						}
						elseif($exp_module_row == "SAcourses/SAcoursesdashboard")
						{
					?>
						<li <?php echo ($this->uri->segment(1) == 'SAcourses' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAcourses/SAcoursesdashboard');?>" class="legitRipple">Courses & Specialties</a></li>
					<?php 
						}
					}
					?>
					</ul>
					</li>
					
					<li>
						<a href="#" class="has-ul legitRipple"> <i class="icon-chart"></i> <span>Reports</span></a>
						<?php 
						$prods = array('SAReports');
						if (in_array($this->uri->segment(1),$prods)) {
						echo( "					<ul class=\"hidden-ul\" style=\"display: block;\">");
						} else {
						echo( "					<ul class=\"hidden-ul\">");
						}?>
						
						<?php
						foreach($exp_module as $exp_module_row)
						{
							if($exp_module_row == "SAReports/salesReportsList")
							{
						?>
						<li <?php echo ($this->uri->segment(1) == 'SAReports' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAReports/salesReportsList');?>" class="legitRipple">Sales Report</a></li>
						<?php 
							}
							elseif($exp_module_row == "SAReports/cancelReportsList")
							{
						?>
						<li <?php echo ($this->uri->segment(1) == 'SAReports' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAReports/cancelReportsList');?>" class="legitRipple">Cancellation Report</a></li>
						<?php 
							}
							elseif($exp_module_row == "SAReports/visitList")
							{
						?>
						<li <?php echo ($this->uri->segment(1) == 'SAReports' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAReports/visitList');?>" class="legitRipple">Visit Report</a></li>
						<?php 
							}
							elseif($exp_module_row == "SAReports/daterangeList")
							{
						?>
						<li <?php echo ($this->uri->segment(1) == 'SAReports' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAReports/daterangeList');?>" class="legitRipple">Date Range Report</a></li>
						<?php 
							}
						}
						?>
						</ul>
					</li>
					<?php
					foreach($exp_module as $exp_module_row)
					{
						if($exp_module_row == "Module/moduleList")
						{
					?>
						<li ><a href="<?php echo base_url('Module/moduleList');?>" class="legitRipple"><i class="icon-people"></i>Modules</a></li>
					<?php 
						}
						elseif($exp_module_row == "Employee/employeeList")
						{
					?>
						<li ><a href="<?php echo base_url('Employee/employeeList');?>" class="legitRipple"><i class="icon-people"></i>Employee</a></li>
					<?php
						}
						elseif($exp_module_row == "Privilege/privilegeList")
						{
					?>
						<li ><a href="<?php echo base_url('Privilege/privilegeList');?>" class="legitRipple"><i class="icon-user-check"></i>Privilege</a></li>
					<?php
						}
						elseif($exp_module_row == "DCprofile/DCgalleryList")
						{
					?>
						<li ><a href="<?php echo base_url('DCprofile/DCgalleryList');?>" class="legitRipple"><i class="icon-image-compare"></i>Gallery</a></li>
					<?php
						}
						elseif($exp_module_row == "SAslider")
						{
					?>
						<li <?php echo ($this->uri->segment(1) == 'SAslider' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAslider');?>" class="legitRipple"><i class="icon-gallery"></i>Slider</a></li>
					<?php	
						}
						elseif($exp_module_row == "SABooking/bookingList")
						{
					?>
						<li <?php echo ($this->uri->segment(1) == 'SABooking' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SABooking/bookingList');?>" class="legitRipple"><i class="icon-notebook"></i>Bookings</a></li>
					<?php
						}
						elseif($exp_module_row == "SAbecomeapartner")
						{
					?>
						<li <?php echo ($this->uri->segment(1) == 'SAbecomeapartner' && $this->uri->segment(2) == ''  ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAbecomeapartner');?>" class="legitRipple"><i class="icon-airplane2"></i>Become a Partner</a></li>
					<?php	
						}
						elseif($exp_module_row == "SAbecomeapartner/userDetails/Customer")
						{
					?>
						<li <?php echo ($this->uri->segment(1) == 'SAbecomeapartner' && $this->uri->segment(2) == 'userDetails'  ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAbecomeapartner/userDetails/Customer');?>" class="legitRipple"><i class="icon-users4"></i>User Details</a></li>
					<?php
						}
						elseif($exp_module_row == "SAbecomeapartner/diveCenterDetails")
						{
					?>
						<li <?php echo ($this->uri->segment(1) == 'SAbecomeapartner' && $this->uri->segment(2) == 'diveCenterDetails'  ? 'class="active"' : ''); ?>><a href="<?php echo base_url('SAbecomeapartner/diveCenterDetails');?>" class="legitRipple"><i class="icon-city"></i>Dive Center Details</a></li>
					<?php
						}
						elseif($exp_module_row == "Subscribe")
						{
					?>
						<li <?php echo ($this->uri->segment(1) == 'Subscribe' ? 'class="active"' : ''); ?>><a href="<?php echo base_url('Subscribe');?>" class="legitRipple"><i class="icon-users2"></i>Subscribe</a></li>
					<?php
						}
						elseif($exp_module_row == "promo_code")
						{
					?>
					<li><a  href="<?php echo base_url('promo_code'); ?>"><i class="icon-percent"></i><span>Promo Code</span></a></li>
					<?php 
						}
					}
					?>

				   <?php	
						}
				   ?>
				   <li><a  href="<?php echo base_url('Login/logout'); ?>"><i class="icon-switch2"></i><span>Logout</span></a></li>
				   
					<li>
					  <a href="" class="has-ul legitRipple"><i class="icon-gear position-left"></i><span>Setting</span></a>
					  <ul class="hidden-ul" <?php echo ($this->uri->segment(1) == 'changePassword' ? 'style ="display: block;"' :''); ?>>
						 <!--li><a  href="" ><i class="icon-user-plus"></i><span>Profile</span></a></li-->
						 <li <?php echo ($this->uri->segment(1) == 'changePassword' ? 'class="active"' : ''); ?>><a  href="<?php echo base_url('changePassword');?>"><i class="icon-lock"></i><span>Change Password</span></a></li>
					  </ul>
					</li>
				</ul>
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
                
                <li <?php echo ($this->uri->segment(1) == 'Bugs' && $this->uri->segment(2) == 'BugList'  ? 'class="active"' : ''); ?>><a href="<?php echo base_url('Bugs/Buglist');?>" class="legitRipple"><i class="icon-people"></i>Bugs</a></li>
              
                <li <?php echo ($this->uri->segment(1) == 'Bugs' && $this->uri->segment(2) == 'notcompletedList'  ? 'class="active"' : ''); ?>><a href="<?php echo base_url('Bugs/notcompletedList');?>" class="legitRipple"><i class="icon-stack2"></i>Not Completed Bugs</a></li>
               
                 <li <?php echo ($this->uri->segment(1) == 'Bugs' && $this->uri->segment(2) == 'completedList'  ? 'class="active"' : ''); ?>><a href="<?php echo base_url('Bugs/completedList');?>" class="legitRipple"><i class="icon-books"></i>Completed Bugs</a></li>
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