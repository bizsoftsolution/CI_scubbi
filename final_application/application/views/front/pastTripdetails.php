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
				<div class="row">
					<div class="panel panel-default">
						<div class="panel-heading" style="background:#66ffff;"><h5 style="font-weight:bold;margin:0px 1px;">MY Dive TRIPS > <a href="">My Upcoming Dive Trips</a> > Trip Details </h5></div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<img src="<?php echo base_url(); ?>upload/DCprofile/17_Ray Dive Adventure.jpg" class="img-circle" style="border:1px solid gray;"/>
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-6"><p align="left">Your Booking Number is SMY1703K8YRE2<p></div>
										<div class="col-md-6"><p align="left">Status : Active<p></div>
									</div>
									<div class="row">
										<style>
											.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th
											{
												border-top: none!important;
											}
										</style>
										<div class="table-responsive">
											<table class="table">
												<tr><td><b>Dive Center Name</b></td><td>Ocean</td><td>&nbsp;</td><td>&nbsp;</td></tr>
												<tr><td><b>Arrival Date</b></td><td>27 APR 2017</td><td><b>Departure Date</b></td><td>02 MAY 2017</td></tr>
												<tr><td><b>Contact Person</b></td><td>James Kai</td><td><b>Contact No</b></td><td>+60342765678 <br> +60124568982</td></tr>
												<tr><td><b>Address</b></td><td>Jalan 222 <br>Kampung Air <br>Tioman Malaysia</td><td></td><td></td></tr>
											</table>
										</div>
									</div>
								</div>
							</div>
							<hr style="width:100%;">
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table">
											<tr>
												<td><b>Product ID</b></td>
												<td>1232</td>
												<td><b>Product</b></td>
												<td></td>
											</tr>
											<tr>
												<td><b>Description</b></td>
												<td colspan="3">dfkdsfkdshfkdshfk</td>
											</tr>
											<tr>
												<td><b>Product Included</b></td>
												<td>dsknfhkdsf</td>
												<td><b>Product Excluded</b></td>
												<td>dshbfkdsfk</td>
											</tr>
											<tr>
												<td><b>Optional Services</b></td>
												<td colspan="3">dfkdsfkdshfkdshfk</td>
											</tr>
											<tr>
												<td><b>Accommodation</b></td>
												<td colspan="2">
													<table class="table">
														<tr>
															<td><b>Check In</b></td>
															<td>2 PM</td>
															<td><b>Check Out</b></td>
															<td>12 AM</td>
														</tr>
														<tr>
															<td><b>Accommodation Type</b></td>
															<td>Hotel</td>
															<td><b>Bath Room</b></td>
															<td>Attached</td>
														</tr>
														<tr>
															<td><b>Amenities</b></td>
															<td colspan="3">hgkjasgkjds | kdshfkdsf | lsdfldsafl</td>
														</tr>
														<tr>
															<td><b>Room Type</b></td>
															<td>Twin Sharing <br> Quad Sharing</td>
															<td>2 Single Beds <br> 1 King & 1 Queen</td>
															<td>&nbsp;</td>
														</tr>
													</table>
												</td>
												<td>&nbsp;</td>
											</tr>
											
											<tr>
												<td><b>Booking Policy</b></td>
												<td colspan="3">dfnglkdfng  dfgldnflgndfl</td>
											</tr>
											<tr>
												<td><b>Cancellation Policy</b></td>
												<td colspan="3">dfgdfggdfg dfkgdfkghk</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" style="background:#66ffff;"><h5 style="font-weight:bold;margin:0px 1px;">Payment Details (Final Payment : MYR 4438.00 )</h5></div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table table-striped table-condensed">
										<tr>
											<th>Product</th>
											<th>Currency</th>
											<th>Price Per Item</th>
											<th>Quantity</th>
											<th>Total Amount</th>
										</tr>
										<tr>
											<td>4d/3n Dive Package</td>
											<td>MYR</td>
											<td>759.00</td>
											<td>2</td>
											<td>1518.00</td>
										</tr>
										<tr><td colspan="5"><hr style="width:100%;border:0.5px solid gray;"></td></tr>
										<tr>
											<td colspan="3"></td>
											<td><b>Sub Total</b></td>
											<td>MYR 1518.00</td>
										</tr>
										<tr>
											<td colspan="3"></td>
											<td><b>GST 6%</b></td>
											<td>0.00</td>
										</tr>
										<tr>
											<td colspan="3"></td>
											<td><b>Net Total</b></td>
											<td>MYR 1518.00</td>
										</tr>
										<tr>
											<td colspan="3"></td>
											<td><b>Final Payment</b></td>
											<td>MYR 1518.00</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel-heading">
							<div class="row" style="margin:0px 1px;">
								<div class="col-md-3">
								<b>Payment Method</b>
							</div>
							<div class="col-md-9">
								Charged to VISA Credit Card
							</div>
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