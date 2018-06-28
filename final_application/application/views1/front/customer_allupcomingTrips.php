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
					<h5 style="font-weight:bold;margin:10px 15px;"><a href="<?php echo base_url('Customer/customerMydiveTrips'); ?>" style="color:#000;"> MY Dive TRIPS </a> > UPCOMING DIVE TRIPS </h5>
				</div>
			 </div>
			 <div class="container">&nbsp;</div>
			 <div class="container">	
				<div id="demo" class="box jplist" style="margin: 20px 0 50px 0">
					
					
					<div class="row">
						<!-- ios button: show/hide panel -->
						<div class="jplist-ios-button">
							<i class="fa fa-sort"></i>
							Scubbi Actions
						</div>
						<div class="jplist-panel box panel-top">
							<!-- items per page dropdown -->
							<div 
							   class="jplist-drop-down" 
							   data-control-type="items-per-page-drop-down" 
							   data-control-name="paging" 
							   data-control-action="paging">

							   <ul>
								 <li><span data-number="3"> 3 per page </span></li>
								 <li><span data-number="5"> 5 per page </span></li>
								 <li><span data-number="12" data-default="true"> 12 per page </span></li>
								 <li><span data-number="all"> View All </span></li>
							   </ul>
							</div>
							
							<div 
							   class="jplist-label" 
							   data-type="Page {current} of {pages}" 
							   data-control-type="pagination-info" 
							   data-control-name="paging" 
							   data-control-action="paging">
							</div>	

							<div 
							   class="jplist-pagination" 
							   data-control-type="pagination" 
							   data-control-name="paging" 
							   data-control-action="paging">
							</div>			
							
						</div>
					</div>
					<div class="row">&nbsp;</div>
					<div class="row">
						<div class="list box text-shadow">
							<!-- item 1 -->
							<?php 
								/* $current_checkin = date("Y-m-d");
								$this->db->where('checkin >=', $current_checkin);
								//$this->db->where_in('status', array('CANCELLED','FAILED','PENDING','DECLINED'));
								$this->db->where_in('status', array('PENDING','CONFIRMED','PAYING','CANCELLED','DECLINED'));
								$this->db->where('customer_id', $this->session->userdata('user_id'));
								$this->db->limit(4);
								$this->db->order_by('checkin','ASC');
								$query = $this->db->get('tbl_booking'); */
								
								$current_checkin = date("Y-m-d");
								$qry = "select * from tbl_booking where checkin >= '$current_checkin' and customer_id = " . $this->session->userdata('user_id') . 
								" and status in ('CANCELLED','FAILED','PAYING','PENDING')";
								$qres = $this->db->query($qry);
								$get_Allupcomingtrips = $qres->result();
								foreach($get_Allupcomingtrips as $upcoming_trip_row)
								{
									$dive_id = $upcoming_trip_row->dive_id;
									$data_upcoming = $this->db->get_where('tbl_dcprofile', array('user_id'=>$dive_id))->result();
									foreach($data_upcoming as $data_upcoming_row)
									{
							?>
							<div class="list-item box">
								
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
								
							</div>
							
							<?php 
									}
								}
							?>
						</div>
						
						<!-- no results -->
						<div class="box jplist-no-results text-shadow align-center">
							<p style="text-align:center;">No results found</p>
						</div>
				
					
					</div>
					
					<div class="row">
						<!-- ios button: show/hide panel -->
						<div class="jplist-ios-button">
							<i class="fa fa-sort"></i>
							Scubbi Actions
						</div>
					
						<!-- panel -->
						<div class="jplist-panel box panel-bottom">
							
							<div 
							   class="jplist-label" 
							   data-type="Page {current} of {pages}" 
							   data-control-type="pagination-info" 
							   data-control-name="paging" 
							   data-control-action="paging">
							</div>	

							<div 
							   class="jplist-pagination" 
							   data-control-type="pagination" 
							   data-control-name="paging" 
							   data-control-action="paging">
							</div>
							
						</div>
					</div>
					
				</div>
				
				
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