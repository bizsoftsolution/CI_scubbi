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
                           <li>
                              <a href="<?php echo base_url('Customer/customerDashboard'); ?>">
                                 <div class="menue-name"> Home </div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/customerProfile'); ?>">
                                 <div class="menue-name">Profiles</div>
                              </a>
                           </li>
                           <li class="active">
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
			<div class="container" style="background:#66ffff;">
				<div class="row">
					<div class="col-md-6">
						<h5 style="font-weight:bold;margin:10px 15px;"><a href="">My Dive Trips > </a> <a href="">My Past Trips > </a> View My Review</h5>
					</div>
					<div class="col-md-6 text-right">
						<a href="<?php echo base_url(); ?>Customer/customerMydiveTrips" class="btn btn-default" style="height:30px;line-height:0;margin:5px 0 0 0;">Back</a>
					</div>
					
				</div>
			 </div>
            <div class="container" style="border:1px solid gray;">
				<br>
				<?php 
					foreach($Cviewreview as $crow)
					{
				?>
               <div class="row">
					
					<div class="col-md-3">
						<img src="<?php echo base_url(); ?>upload/customerprofile/1483346768735.png" class="img-responsive img-circle"style="height:150px;width:150px;display:block;margin:0 auto;border:1px solid gray;" />
					</div>
					<div class="col-md-6">
						 <?php
							$idd = $crow->divecenter_id;
							$data6 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$idd))->result();
							foreach($data6 as $drow6)
							{
						 ?>
						<label class="control-label col-sm-6" for="email"><b>Dive Center</b></label>
						<label class="control-label col-sm-6" for="email"><?php echo $drow6->dcname; ?></label>
						<label class="control-label col-sm-6" for="email"><b>Destination</b></label>
						<label class="control-label col-sm-6" for="email">
						<?php 
							$idd1 = $drow6->dcislands;
							$data7 = $this->db->get_where('tbl_island', array('island_id'=>$idd1))->result();
							foreach($data7 as $drow7)
							$idd2 = $drow6->dccountry;
							$data8 = $this->db->get_where('tbl_country', array('country_id'=>$idd2))->result();
							foreach($data8 as $drow8)
							echo $drow7->island_name.', '.$drow8->country_name;
						?>
						</label>
						<label class="control-label col-sm-6" for="email"><b>Arrival Date</b></label> 
						<label class="control-label col-sm-6" for="email">03 March 2016</label>
						<label class="control-label col-sm-6" for="email"><b>Departure Date</b></label>
						<label class="control-label col-sm-6" for="email">07 March 2016</label>
						<?php 
							}
						 ?>
					</div>
					<div class="col-md-3"></div>
				</div>
				<div class="row">
					<div class="col-md-3"><br><br>
						<p align="center"><b>Your Rating</b></p>
					</div>
					<div class="col-md-6">
						<div class="row">
							<label class="control-label col-sm-3" for="email">Price</label>
						  <div class="col-sm-9">
							<div class="ratting" style="color:#fec107;">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							</div>
						  </div>
						</div>
						<div class="row">
							<label class="control-label col-sm-3" for="email">Services</label>
						  <div class="col-sm-9">
							<div class="ratting" style="color:#fec107;">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-half-o"></i>
							<i class="fa fa-star-o"></i>
							</div>
						  </div> 
						</div>
						<div class="row">
							<label class="control-label col-sm-3" for="email">Facilities</label>
						  <div class="col-sm-9">
							<div class="ratting" style="color:#fec107;">
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							</div>
						  </div>
						</div>
						<div class="row">
							<label class="control-label col-sm-3" for="email">Equipment</label>
						  <div class="col-sm-9">
							<div class="ratting" style="color:#fec107;">
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							</div>
						  </div>
						</div>
					</div>
					<div class="col-md-3"></div>
				</div>
				<div class="row">
					<div class="col-md-3">
						 <label class="control-label col-sm-12" for="email"><b>Review Title</b></label>
					</div>
					<div class="col-md-9">
						<p><?php echo $crow->title; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						 <label class="control-label col-sm-12" for="email"><b>Review to Dive Center</b></label>
					</div>
					<div class="col-md-9">
						<p><?php echo $crow->description; ?></p>
					</div>
				</div>
				<?php 
					}
				?>
            </div>
			<div class="container">&nbsp;</div>
			 
         </section>
		 <hr style="width:100%;border:2px solid #66ffff;">
		 
		 <?php
			}
			else
			{
				redirect(base_url());
			}
		 ?>