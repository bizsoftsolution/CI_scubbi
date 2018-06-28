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
					<h5 style="font-weight:bold;margin:10px 15px;">MY PAST TRIPS</h5>
				</div>
			 </div>
			 <div class="container">&nbsp;</div>
			 <div class="container" style="background:#fff;">
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
								
								$current_checkin = date("Y-m-d");
								$qry = "select * from tbl_booking where checkout < '$current_checkin' and customer_id = " . $this->session->userdata('user_id') . 
								" and status in ('COMPLETED','CONFIRMED')";
								$qres = $this->db->query($qry);
								$get_Allpasttrips = $qres->result();
								foreach($get_Allpasttrips as $past_trip_row)
								{
									$dive_id = $past_trip_row->dive_id;
									$data_past = $this->db->get_where('tbl_dcprofile', array('user_id'=>$dive_id))->result();
									foreach($data_past as $data_past_row)
									{
							?>
							<div class="list-item box">
								
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
									
												<!--p style="line-height: 22px;font-weight:bold;color: #000;text-decoration:underline;"><a href="<?php echo base_url(); ?>Customer/viewReceipt/<?php echo $past_trip_row->id; ?>"  target="_blank">View Receipt</a></p-->
												
												<p style="line-height: 22px;font-weight:bold;color: #000;text-decoration:underline;"><a href="<?php echo base_url().'Customer/customerWritemyreview/'.$past_trip_row->dive_id.'/'.$past_trip_row->id;?>">Write My Review</a></p>
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
				
				
				
				<!--div class="row">
					<?php 
					foreach($get_Allpasttrips as $past_trip_row)
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
									<p style="line-height: 22px;font-weight:bold;color: #000;text-decoration:underline;"><a href="<?php echo base_url(); ?>Customer/viewReceipt/<?php echo $past_trip_row->id; ?>"  target="_blank">View Receipt</a></p>
									
									<p style="line-height: 22px;font-weight:bold;color: #000;text-decoration:underline;"><a href="<?php echo base_url().'Customer/customerWritemyreview/'.$past_trip_row->dive_id.'/'.$past_trip_row->id;?>">Write My Review</a></p>
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
					
					</div-->
					
					
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