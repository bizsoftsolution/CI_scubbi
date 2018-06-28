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
					<h5 style="font-weight:bold;margin:10px 15px;">UPCOMING DIVE TRIPS</h5>
				</div>
			 </div>
			 <div class="container">&nbsp;</div>
			 <div class="container" style="background:#fff;padding:10px 0 0 0">	
				<div class="row">
					<?php 
				
					foreach($upcoming_trips as $upcoming_trip_row)
					{
						//var_dump($upcoming_trip_row)."dfdfdf";
						$dive_id = $upcoming_trip_row->dive_id;
						$data_upcoming = $this->db->get_where('tbl_dcprofile', array('user_id'=>$dive_id))->result();
						foreach($data_upcoming as $data_upcoming_row)
						{
					?>
					<div class="col-md-3">
						<div class="thumbnail" style="border:1px solid #000;">
							<a href="#" target="_blank">
							  <img src="<?php echo base_url();?>upload/DCprofile/<?php echo $data_upcoming_row->dcimage; ?>" alt="Nature" style="width:100%">
							  <div class="caption" style="padding:0px;">
								<div class="row">
								<div class="col-md-12" style="font-size:14px;padding-bottom: 10px;font-weight:bold;text-align:center;">
									<div class="form-group">
										<div class="row">
										<label class="control-label col-sm-6" for="email">Booking No:</label>
										<label class="control-label col-sm-6" for="email"><?php echo $upcoming_trip_row->booking_no; ?></label>
										</div>
										<div class="row">
										<label class="control-label col-sm-6" for="email">Arrival Date:</label>
										<label class="control-label col-sm-6" for="email">
										<?php //echo $upcoming_trip_row->checkin; 
											$arrival_date = $upcoming_trip_row->checkin;
											$format_arrival_date = date("d M Y", strtotime($arrival_date));
											echo $format_arrival_date;
										?>
										</label>
										</div>
									<div class="row">
										<label class="control-label col-sm-6" for="email">Island:</label>
										<label class="control-label col-sm-6" for="email">
										<?php 
											$island_id = $data_upcoming_row->dcislands;
											$data_island = $this->db->get_where('tbl_island', array('island_id'=>$island_id))->result();
											foreach($data_island as $data_island_row)
											{
												echo $data_island_row->island_name;
											}
										?>
										</label>
									</div>
									<div class="row">
										<label class="control-label col-sm-6" for="email">Country:</label>
										<label class="control-label col-sm-6" for="email">
										<?php 
											$country_id = $data_upcoming_row->dccountry;
											$data_country = $this->db->get_where('tbl_country', array('country_id'=>$country_id))->result();
											foreach($data_country as $data_country_row)
											{
												echo $data_country_row->country_name;
											}
										?>
										</label>
									</div>
								</div>
								<div class="form-group"> 
									<div class="col-sm-12">
									<a class="btn btn-danger" href="<?php echo base_url('Customer/upcomingTripdetails');?>/<?php echo $upcoming_trip_row->id;?>" target="_blank">View Itenary</a>
									 
									</div>
								  </div>
								</div>
							  </div>
							  </div>
							</a>
						</div>
					</div>
					<?php
						}
					}
					?>
					<div class="col-md-12">
						<div class="load-more-btn1" id="popularViewAllDiv"  style="text-align:center;">
							<p style="border:1px solid #777;margin-top: 15px;">
								<a href="<?php echo base_url(); ?>Customer/get_Allupcomingtrips" style="cursor:pointer;color: #635d5d;font-size: 14px;line-height: 14px;">View All</a>
								<!--button class="btn-default"> View All Offers<i class="fa fa-angle-right"></i> </button-->
							</p>
						</div>
					</div>	
					</div>
				</div>
				<div class="container">&nbsp;</div>
				<div class="container" style="background:#66ffff;">
					<div class="row">
						<h5 style="font-weight:bold;margin:10px 15px;">MY PAST TRIPS</h5>
					</div>
				 </div>
				<div class="container">&nbsp;</div>
				
				
				<div class="container" style="background:#fff;padding:10px 0 0 0">
				<div class="row">
					<?php 
					foreach($past_trips as $past_trip_row)
					{
						$dive_id = $past_trip_row->dive_id;
						
						$data_past = $this->db->get_where('tbl_dcprofile', array('user_id'=>$dive_id))->result();
						foreach($data_past as $data_past_row)
						{
					?>
					<div class="col-md-3">
						<div class="thumbnail" style="border:1px solid #000;">
							<a href="#" target="_blank">
							  <img src="<?php echo base_url();?>upload/DCprofile/<?php echo $data_past_row->dcimage; ?>" alt="Nature" style="width:100%">
							  <div class="caption" style="padding:0px;border-top: 1px solid #000;">
								<div class="row">
								<div class="col-md-12" style="font-size:14px;padding-bottom: 10px;text-align:center;">
									<p style="line-height: 22px;color: #000;padding-top:10px;"><b>Booking No:</b><?php echo $past_trip_row->booking_no; ?></p>
									
									
									<p style="line-height: 22px;font-weight:bold;color: #000;text-decoration:underline;"><a  target="_blank" href="<?php echo base_url(); ?>Customer/upcomingPrint/<?php echo $past_trip_row->id; ?>">View Dive Details</a></p>
									
									<form method="POST" action="<?php echo base_url(); ?>Customer/viewReceiptPDF/<?php echo $past_trip_row->id; ?>">  
										  <label style="margin-bottom:0px;margin-top: -7px;">
										  <input type="submit" name="create_pdf" class="btn btn-success" value="View Receipt"  style="background: white;
    border: none;
    color: #000;
    font-size: 17px;
    font-weight: bold;
    text-decoration: underline;" /></label>
									</form>
										
									<!--p style="line-height: 22px;font-weight:bold;color: #000;text-decoration:underline;"><a href="<?php echo base_url(); ?>Customer/viewReceiptPDF/<?php echo $past_trip_row->id; ?>"  target="_blank">View Receipt</a></p-->
									<?php 
									$u_id = $this->session->userdata('user_id');
									$didd =$past_trip_row->dive_id;
										$this->db->where('divecenter_id', $didd);
										$this->db->where('customer_id', $u_id);
										$this->db->where('booking_id', $past_trip_row->id);
										$this->db->order_by('id', 'DESC');
										$this->db->limit(1);
										$query123 = $this->db->get('tbl_review');
										if($query123->num_rows() > 0)
										{
										?>
											<p style="line-height: 22px;font-weight:bold;color: #000;text-decoration:underline;"><a href="<?php echo base_url().'Customer/customerWritemyreview/'.$past_trip_row->dive_id.'/'.$past_trip_row->id;?>">View My Review</a></p>
										<?php
										}
										else
										{
										?>
										
											<p style="line-height: 22px;font-weight:bold;color: #000;text-decoration:underline;"><a href="<?php echo base_url().'Customer/customerWritemyreview/'.$past_trip_row->dive_id.'/'.$past_trip_row->id;?>">Write My Review</a></p>
										
										<?php
										}
										?>
									
								</div>
							  </div>
							  </div>
							</a>
						</div>
					</div>
					<?php 
						}
					}
					?>
					<div class="col-md-12">
						<div class="load-more-btn1" id="popularViewAllDiv"  style="text-align:center;">
							<p style="border:1px solid #777;margin-top: 15px;">
								<a href="<?php echo base_url(); ?>Customer/get_Allpasttrips" style="cursor:pointer;color: #635d5d;font-size: 14px;line-height: 14px;">View All</a>
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