<!-- Main sidebar -->
<div class="sidebar sidebar-main">
   <div class="sidebar-content">
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
            <div class="sidebar-user-material-menu">
               <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
            </div>
         </div>
         <div class="navigation-wrapper collapse" id="user-nav">
            <ul class="navigation">
               <li><a href="<?php echo  base_url();?>DCprofile/addNew""><i class="icon-user-plus"></i> <span>My profile</span></a></li>
               <li><a href="<?php echo base_url('changePassword');?>"><i class="icon-lock"></i> <span>Change Password</span></a></li>
               <li><a href="#"><i class="icon-comment-discussion"></i> <span><span class="badge bg-teal-400 pull-right">58</span> Messages</span></a></li>
               <li class="divider"></li>
               <li><a href="#"><i class="icon-cog5"></i> <span>Account settings</span></a></li>
               <li><a href="<?php echo base_url(); ?>/User/logout"><i class="icon-switch2"></i> <span>Logout</span></a></li>
            </ul>
         </div>
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
                <li>
                  <a href="" class="has-ul legitRipple"><i class="icon-people"></i><span>Employee Details</span></a>
                  <ul class="hidden-ul">
                     <li><a  href="<?php echo base_url('DCprofile/DCstaffList');?>" ><i class="icon-users"></i><span>Administration</span></a></li>
                     <li><a  href="<?php echo base_url('DCprofile/DCmasterList');?>" ><i class="icon-accessibility"></i><span>Dive Instructor and Master</span></a></li>
                  </ul>
                </li>
                <li><a href="<?php echo base_url('DCprofile/DCgalleryList');?>" class="legitRipple"><i class="icon-images2"></i>Gallery</a></li>
               <li>
                  <a href="#" class="has-ul legitRipple"><i class="icon-tree5"></i> <span>Master </span></a>
                  <ul class="hidden-ul">
                     <li><a href="<?php echo base_url('Country/countryList');?>" class="legitRipple">Country Details</a></li>
                     <li><a href="<?php echo base_url('Island/islandList');?>" class="legitRipple">Island Details</a></li>
                     <li><a href="<?php echo base_url('DCleisure/Keywordlist');?>" class="legitRipple">Product Keywords</a></li>
                  </ul>
               </li>
                <li><a href="<?php echo base_url('DCleisure/DCleisurelist');?>" class="legitRipple"><i class="icon-stack2"></i>Product Details</a></li>
                <li><a href="<?php echo base_url('DCcourses/DCcourseslist');?>" class="legitRipple"><i class="icon-books"></i>Course Details</a></li>
                <li><a href="" class="legitRipple"><i class="icon-gift"></i>Package Details</a></li>
                <li><a href="" class="legitRipple"><i class="icon-airplane2"></i>Guided Tour</a></li>
                <li><a href="" class="legitRipple"><i class="icon-stack-text"></i>Booking Policy</a></li>
                <li><a href="" class="legitRipple"><i class="icon-stack-cancel"></i>Cancellation Policy</a></li>
                <li><a href="" class="legitRipple"><i class="icon-calendar22"></i>Available Reports</a></li>
                <li><a href="" class="legitRipple"><i class="icon-alarm-cancel"></i>Canceled Reports</a></li>
                <li><a href="" class="legitRipple"><i class="icon-alarm-check"></i>Booked Reports</a></li>
                <li><a href="" class="legitRipple"><i class="icon-people"></i>Customer Details</a></li>
                <li><a href="" class="legitRipple"><i class="icon-medal-star"></i>Customer Review</a></li>
                <li><a href="" class="legitRipple"><i class="icon-comment-discussion"></i>Chat</a></li>
                <li>
                  <a href="" class="has-ul legitRipple"><i class="icon-user-check"></i><span>Setting</span></a>
                  <ul class="hidden-ul">
                     <li><a  href="" ><i class="icon-user-plus"></i><span>Profile</span></a></li>
                     <li><a  href="" ><i class="icon-lock"></i><span>Change Password</span></a></li>
                     <li><a  href="" ><i class="icon-switch2"></i><span>Logout</span></a></li>
                  </ul>
                </li>
            </ul>
         </div>
      </div>
      <!-- /main navigation -->
   </div>
</div>
<!-- /main sidebar -->