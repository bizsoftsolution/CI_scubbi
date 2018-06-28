		<?php 
			if($this->session->userdata('user_id') != '')
			{
		?>
<!-- mobile-menu-area-end -->
         <section class="dashboard-menu dashboard-menu-2 light-blue" style="margin: 60px 0 0 0;">
            <div class="container" style="width:100%;padding:5px 0 0 3px">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="dashboard-menu-container" style="background-color: #66ffff;">
                        <ul>
                           <li class="active">
                              <a href="<?php echo base_url('Customer/customerDashboard'); ?>">
                                 <div class="menue-name"> Home </div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/customerProfile'); ?>">
                                 <div class="menue-name">Profiles</div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/customerMydiveTrips'); ?>">
                                 <div class="menue-name">My Dive Trips</div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/allMessages'); ?>">
                                 <div class="menue-name">My Messages</div>
                              </a>
                           </li>
                              <!--li>
                              <a href="<?php echo base_url('Customer/myCart'); ?>">
                                 <div class="menue-name">My Cart</div>
                              </a>
                           </li-->						   
                           <li>
                              <a href="<?php echo base_url('Customer/customerDashboard'); ?>">
                                 <div class="menue-name">Dive Credits</div>
                              </a>
                           </li>
<li class="signup_display" style="display:none;">
                              <a href="<?php echo base_url('Customer/logout'); ?>">
                                 <div class="menue-name">Sign out</div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="dashboard light-blue">
            <div class="container">
               <div class="row" style="background: #FFF;">
               	  <div class="col-md-3 col-sm-12 col-xs-12">
                     <div class="main-box profile-box-contact">
                     	<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div class="profile-box-header blue-bg">
                                <div class="col-md-12 text-center">
									<?php 
									$user_id = $this->session->userdata('user_id');
									$data1=$this->db->get_where('tbl_customerprofile', array('user_id'=>$user_id))->result();
									foreach($data1 as $row)
									{
										if($row->photo != NULL)
										{
											?>
										   <img src="<?php echo base_url(); ?>upload/customerprofile/<?php echo $row->photo;?>" alt="" class="profile-img img-responsive" style="width:100%;height:auto;"/>
										   <?php 
										}
										else if($row->profile_pic != NULL)
										{
											?>
											 <img src="<?php echo $row->profile_pic;?>" alt="" class="profile-img img-responsive" style="width:100%;height:auto;"/>
											<?php
										}
										else
										{
											?>
											 <img src="<?php echo base_url(); ?>upload/customerprofile/user.png" alt="" class="profile-img img-responsive" style="width:100%;height:auto;"/>
											<?php
										}
									}
									
								   ?>
                                   <!--h2>Jessica Daisy</h2>
                                   <ul class="contact-details">
                                      <li>
                                         <i class="fa fa-map-marker"></i> UK London
                                      </li>
                                      <li>
                                         <i class="fa fa-envelope"></i> jessica@admin.com
                                      </li>
                                      <li>
                                         <i class="fa fa-phone"></i> (123) 000-9876
                                      </li>
                                   </ul-->
                               </div>
                               <div class="col-md-12 col-sm-5 col-xs-12">
									<h4 align="center"><?php echo $this->session->userdata('first_name');?></h4>
									<p align="center">Joined since <?php echo date('d M Y', strtotime($row->created)); ?></p>
                               </div>
                            </div>
                        </div>
                        <!--div class="col-md-12 col-sm-12 col-xs-12 nopadding">
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
                        </div-->
                     </div>
                  </div>
                  <div class="col-md-9 col-sm-12 col-xs-12">
                     <div class="dashboard-main-disc">
                        <div class="heading-inner">
                           <p class="title">Welcome back, <?php echo $this->session->userdata('first_name');?></p>
                        </div>
                        <div>
                           <p>You last login was on <?php echo $this->session->userdata('last_login');?> </p>
                           <p>You have 4 new messages. Click on <a href="" style="text-decoration:underline;">My MESSAGES</a> to check it out</p>
                           <p><a href="<?php echo base_url('Customer/customerProfile'); ?>" style="text-decoration:underline;">VIEW MY PROFILE </a></p>
                           <p><a href="<?php 
						   $user_id = $this->session->userdata('user_id');
						   $ui = $this->db->get_where('tbl_customerprofile', array('user_id'=>$user_id))->result();
						   foreach($ui as $uival)
						   {
						   echo base_url('Customer/customereditProfile'); ?>/<?php echo $uival->id; 
						   }
						   ?>" style="text-decoration:underline;">EDIT MY PROFILE</a></p>
                        </div>
                     </div>
                  </div>
                  
               </div>
            </div>
			<div class="container">&nbsp;</div>
			<div class="container" style="background:#66ffff;">
				<div class="row">
					<h5 style="font-weight:bold;margin:10px 15px;">MY WISHLIST</h5>
				</div>
			 </div>
			 <div class="container">&nbsp;</div>
			 <div class="container" style="background:#fff;padding:10px 0 0 0">
				<div class="row">
					<div class="col-md-3">
						<div class="thumbnail" style="border:1px solid #000;">
							<a href="#" target="_blank">
							  <img src="<?php echo base_url();?>upload/DCprofile/1s.jpg" alt="Nature" style="width:100%">
							  <div class="caption" style="padding:0px;">
								<div class="row">
								<div class="col-md-12" style="font-size:14px;padding-bottom: 10px;font-weight:bold;text-align:center;">
									Tioman island, Malaysia <br> ABC Dive Center
								</div>
								</div>
							  </div>
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="thumbnail" style="border:1px solid #000;">
							<a href="#" target="_blank">
							  <img src="<?php echo base_url();?>upload/DCprofile/1s.jpg" alt="Nature" style="width:100%">
							  <div class="caption" style="padding:0px;">
								<div class="row">
								<div class="col-md-12" style="font-size:14px;padding-bottom: 10px;font-weight:bold;text-align:center;">
									Tioman island, Malaysia <br> ABC Dive Center
								</div>
								</div>
							  </div>
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="thumbnail" style="border:1px solid #000;">
							<a href="#" target="_blank">
							  <img src="<?php echo base_url();?>upload/DCprofile/1s.jpg" alt="Nature" style="width:100%">
							  <div class="caption" style="padding:0px;">
								<div class="row">
								<div class="col-md-12" style="font-size:14px;padding-bottom: 10px;font-weight:bold;text-align:center;">
									Tioman island, Malaysia <br> ABC Dive Center
								</div>
								</div>
							  </div>
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="thumbnail" style="border:1px solid #000;">
							<a href="#" target="_blank">
							  <img src="<?php echo base_url();?>upload/DCprofile/1s.jpg" alt="Nature" style="width:100%">
							  <div class="caption" style="padding:0px;">
								<div class="row">
								<div class="col-md-12" style="font-size:14px;padding-bottom: 10px;font-weight:bold;text-align:center;">
									Tioman island, Malaysia <br> ABC Dive Center
								</div>
								</div>
							  </div>
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="thumbnail" style="border:1px solid #000;">
							<a href="#" target="_blank">
							  <img src="<?php echo base_url();?>upload/DCprofile/1s.jpg" alt="Nature" style="width:100%">
							  <div class="caption" style="padding:0px;">
								<div class="row">
								<div class="col-md-12" style="font-size:14px;padding-bottom: 10px;font-weight:bold;text-align:center;">
									Tioman island, Malaysia <br> ABC Dive Center
								</div>
								</div>
							  </div>
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="thumbnail" style="border:1px solid #000;">
							<a href="#" target="_blank">
							  <img src="<?php echo base_url();?>upload/DCprofile/1s.jpg" alt="Nature" style="width:100%">
							  <div class="caption" style="padding:0px;">
								<div class="row">
								<div class="col-md-12" style="font-size:14px;padding-bottom: 10px;font-weight:bold;text-align:center;">
									Tioman island, Malaysia <br> ABC Dive Center
								</div>
								</div>
							  </div>
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="thumbnail" style="border:1px solid #000;">
							<a href="#" target="_blank">
							  <img src="<?php echo base_url();?>upload/DCprofile/1s.jpg" alt="Nature" style="width:100%">
							  <div class="caption" style="padding:0px;">
								<div class="row">
								<div class="col-md-12" style="font-size:14px;padding-bottom: 10px;font-weight:bold;text-align:center;">
									Tioman island, Malaysia <br> ABC Dive Center
								</div>
								</div>
							  </div>
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="thumbnail" style="border:1px solid #000;">
							<a href="#" target="_blank">
							  <img src="<?php echo base_url();?>upload/DCprofile/1s.jpg" alt="Nature" style="width:100%">
							  <div class="caption" style="padding:0px;">
								<div class="row">
								<div class="col-md-12" style="font-size:14px;padding-bottom: 10px;font-weight:bold;text-align:center;">
									Tioman island, Malaysia <br> ABC Dive Center
								</div>
								</div>
							  </div>
							</a>
						</div>
					</div>
					<div class="col-md-12">
						<div class="load-more-btn" >
							<p style="border:1px solid #777;">
								<a href="<?php echo base_url(); ?>" class="">Click to show more...</a>
								<!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
							</p>
						</div>
					</div>
					
				</div>
			 </div>
			 
         </section>
		 <hr style="width:100%;border:2px solid #66ffff;">
		 
		  <?php
			}
			else
			{
				redirect(base_url());
			}
		 ?>