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
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
		 
         <section class="dashboard light-blue">
			<div class="container">
		<?php 
			$data = $this->db->get_where('tbl_booking', array('id'=>$itenary_id))->result();
			foreach($data as $data_bk_NO)
			{
				
		?>
				<div class="row" >
					<div class="panel panel-default">
						<div class="panel-heading" style="background:#66ffff;padding:0px;">
							<div class="row">
								<div class="col-md-6">
									<h5 style="font-weight:bold;margin:15px 0 0 10px;">MY Dive TRIPS > <a href="">My Upcoming Dive Trips</a> > Trip Details </h5>
								</div>
								<?php 
								if($data_bk_NO->status == "PENDING")
								{									
								?>
								<div class="col-md-6 text-right">
									<h5 style="padding:0px 10px">
										<!--a href="<?php echo base_url(); ?>Customer/viewReceipt/<?php echo $data_bk_NO->id; ?>" class="btn btn-success" target="_blank">View Receipt</a>
										<a class="btn btn-success" target="_blank" href="<?php echo base_url(); ?>Customer/upcomingPrint/<?php echo $data_bk_NO->id; ?>">Print Trip Details</a-->
										<a href="<?php echo base_url(); ?>Customer/cancelTrip/<?php echo $data_bk_NO->id; ?>" title="Delete" onclick="return confirm('Are you sure confirm to cancel trip? Kindly click on the CONFIRM to proceed with cancellation process');" class="btn btn-success remove">Cancel The Trip</a>
										<a href="<?php echo base_url(); ?>Customer/customerMydiveTrips" class="btn btn-success">Back</a>
									</h5>
								</div>
								<?php 
								}
								elseif($data_bk_NO->status == "COMPLETED")
								{
								?>
								<div class="col-md-6 text-right">
									<h5 style="padding:0px 10px">
										<a href="<?php echo base_url(); ?>Customer/viewReceipt/<?php echo $data_bk_NO->id; ?>" class="btn btn-success" target="_blank">View Receipt</a>
										<a class="btn btn-success" target="_blank" href="<?php echo base_url(); ?>Customer/upcomingPrint/<?php echo $data_bk_NO->id; ?>">Print Trip Details</a>
										<a href="<?php echo base_url(); ?>Customer/cancelTrip/<?php echo $data_bk_NO->id; ?>" title="Delete" onclick="return confirm('Are you sure confirm to cancel trip? Kindly click on the CONFIRM to proceed with cancellation process');" class="btn btn-success remove">Cancel The Trip</a>
										<a href="<?php echo base_url(); ?>Customer/customerMydiveTrips" class="btn btn-success">Back</a>
									</h5>
								</div>
								<?php								
								}
								elseif($data_bk_NO->status == "CANCELLED")
								{
								?>
								<div class="col-md-6 text-right">
									<h5 style="padding:0px 10px">
										<a class="btn btn-success" target="_blank" href="<?php echo base_url(); ?>Customer/upcomingPrint/<?php echo $data_bk_NO->id; ?>">Print Trip Details</a>
										<a href="<?php echo base_url(); ?>Customer/customerMydiveTrips" class="btn btn-success">Back</a>
									</h5>
								</div>
								<?php
								}
								?>
							</div>
						</div>
						<div class="panel-body content">
							<div class="row">
								<?php 
								$data1 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$data_bk_NO->dive_id))->result();
									foreach($data1 as $data1_bk_profile)
									{
								?>
								<div class="col-md-3">
									<img src="<?php echo base_url(); ?>upload/DCprofile/<?php echo $data1_bk_profile->dcimage; ?>" class="img-circle" style="border:1px solid gray;"/>
								</div>
								<div class="col-md-9">
									<?php
									if($data_bk_NO->status == "PENDING")
									{
									?>
									<div class="row">
										<div class="col-md-6"><p align="left" style="color:#000;"><b>Your Booking Number is <label style="color:red"><?php echo $data_bk_NO->booking_no; ?></label></b><p></div>
										<div class="col-md-6"><p align="left" style="color:#000;"><b>Status : <label style="color:red"><?php echo $data_bk_NO->status; ?></label></b><p></div>
									</div>
									<?php 
									}
									else
									{
									?>
									<div class="row">
										<div class="col-md-6"><p align="left" style="color:#000;"><b>Your Booking Number is <label style="color:red"><?php echo $data_bk_NO->booking_no; ?></label></b><p></div>
										<div class="col-md-6"><p align="left" style="color:#000;"><b>Status : <label style="color:red"><?php echo $data_bk_NO->status; ?></label></b><p></div>
									</div>
									<?php }
									?>
									<div class="row">
										<style>
											.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th
											{
												border-top: none!important;
											}
										</style>
										<div class="table-responsive">
											<table class="table" border="1" style="border: 1px solid #eee;">
												<tr><td><b>Dive Center Name</b></td><td><?php echo $data1_bk_profile->dcname; ?></td><td>&nbsp;</td><td>&nbsp;</td></tr>
												<tr><td><b>Arrival Date</b></td>
												<td>
												<?php //echo $upcoming_trip_row->checkin; 
													$arrival_date = $data_bk_NO->checkin;
													$format_arrival_date = date("d M Y", strtotime($arrival_date));
													echo $format_arrival_date;
												?>
												</td>
												<td><b>Departure Date</b></td>
												<td>
												<?php //echo $upcoming_trip_row->checkin; 
													$departure_date = $data_bk_NO->checkout;
													$format_departure_date = date("d M Y", strtotime($departure_date));
													echo $format_departure_date;
												?>
												</td></tr>
												<tr><td><b>Contact Person</b></td>
												<td>
												
												</td><td><b>Contact No</b></td>
												<td><?php echo $data1_bk_profile->dctelephone_no; ?><br> </td></tr>
												<tr><td><b>Address</b></td><td><?php echo $data1_bk_profile->dcaddress; ?><br>
												<?php 
												$data2 = $this->db->get_where('tbl_island', array('island_id'=>$data1_bk_profile->dcislands))->result();
												foreach($data2 as $data2_bk_island)
												echo $data2_bk_island->island_name.', ';
												
												$data3 = $this->db->get_where('tbl_country', array('country_id'=>$data1_bk_profile->dccountry))->result();
												foreach($data3 as $data3_bk_country)
												echo $data3_bk_country->country_name;
												
												?></td><td></td><td></td></tr>
											</table>
										</div>
									</div>
								</div>
								<?php 
									}
								?>
							</div>
							
							<div class="row">
						<?php 
						$data4 = $this->db->get_where('tbl_booking_product', array('booking_id'=>$data_bk_NO->id))->result();
						foreach($data4 as $data4_bk_product)
						{
							$data5 = $this->db->get_where($data4_bk_product->table_name, array('id'=>$data4_bk_product->product_id))->result();
							foreach($data5 as $data5_bk_product_details)
							{
						?>
								<div class="">
									<div class="table-responsive">
										<table class="table" border="1" style="border: 1px solid #eee;">
											<tr>
												<td><b>Product ID</b></td>
												<td><?php echo $data4_bk_product->product_id; ?></td>
												<td><b>Product</b></td>
												<td><?php echo $data5_bk_product_details->product_name; ?></td>
											</tr>
											<tr>
												<td><b>Description</b></td>
												<td colspan="3"><?php echo $data5_bk_product_details->product_description; ?></td>
											</tr>
											<tr>
												<td><b>Product Included</b></td>
												<td>
													<?php echo $data5_bk_product_details->product_includes; ?>
												</td>
												<td><b>Product Excluded</b></td>
												<td>
													<?php echo $data5_bk_product_details->product_excludes; ?>
												</td>
											</tr>
											<?php 
												if($data4_bk_product->table_name == 'tbl_dccourses')
												{
											?>
											<tr>
												<td><b>Optional Services</b></td>
												<td colspan="3"><?php echo $data5_bk_product_details->optional_services_service; ?></td>
											</tr>
											<?php 
												}
												else
												{
											?>
											<tr>
												<td><b>Optional Services</b></td>
												<td colspan="3">
												<?php echo $data5_bk_product_details->optional_services; ?>
												</td>
											</tr>
											<?php	
												}
												if($data4_bk_product->table_name == 'tbl_dccourses')
												{
											?>
											<tr>
												<td><b>Accommodation</b></td>
												<td colspan="2">
													<table class="table">
														<tr>
															<td><b>Check In</b></td>
															<td><?php echo $data5_bk_product_details->checkintime; ?></td>
															<td><b>Check Out</b></td>
															<td><?php echo $data5_bk_product_details->checkouttime; ?></td>
														</tr>
														<tr>
															<td><b>Accommodation Type</b></td>
															<td><?php echo $data5_bk_product_details->actype; ?></td>
															<td><b>Bath Room</b></td>
															<td>Attached</td>
														</tr>
														<tr>
															<td><b>Amenities</b></td>
															<td colspan="3">
															<?php echo $data5_bk_product_details->amenities; ?>
															</td>
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
											<?php 
												}
												else
												{
											?>
											<tr>
												<td><b>Accommodation</b></td>
												<td colspan="2">
													<table class="table">
														<tr>
															<td><b>Check In</b></td>
															<td>&nbsp;</td>
															<td><b>Check Out</b></td>
															<td>&nbsp;</td>
														</tr>
														<tr>
															<td><b>Accommodation Type</b></td>
															<td>&nbsp;</td>
															<td><b>Bath Room</b></td>
															<td>&nbsp;</td>
														</tr>
														<tr>
															<td><b>Amenities</b></td>
															<td colspan="3">&nbsp;</td>
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
											<?php
												}
											?>
											
										</table>
									</div>
								</div>
							<?php 
							}
						}
							?>
							</div>
							<div class="row">
								<div class="table-responsive">
									<table class="table" border="1" style="border: 1px solid #eee;">
										<tr>
											<td><b>Booking Policy</b></td>
											<td colspan="3">
												<?php 
												$data9 = $this->db->get_where('tbl_booking_policies', array('user_id'=>$data_bk_NO->dive_id))->result();
												foreach($data9 as $data9_bk_booking_policy)
												{
													echo $data9_bk_booking_policy->booking_name."<br>";
												}
												?>
											</td>
										</tr>
										<tr>
											<td><b>Cancellation Policy</b></td>
											<td colspan="3">
											<?php 
												$data10 = $this->db->get_where('tbl_cancellation_policies', array('user_id'=>$data_bk_NO->dive_id))->result();
												foreach($data10 as $data10_bk_cancel_policy)
												{
													echo $data10_bk_cancel_policy->cancellation_name."<br>";
												}
												?>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
					<?php 
						$data6 = $this->db->get_where('tbl_booking_product', array('booking_id'=>$data_bk_NO->id))->result();
						$total = 0.00;
						$data7 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$data_bk_NO->dive_id))->result();
						foreach($data7 as $data7_bk_productcurrency)
						{
							foreach($no_of_persons as $no_of_persons_val)
								{
					?>
					<form class="form-inline" action="<?php echo base_url(); ?>Customer/addPassenger/<?php echo $no_of_persons_val->id; ?>" method="POST">
					<div class="panel panel-default content">
						<div class="panel-heading" style="background:#66ffff;"><h5 style="font-weight:bold;margin:0px 1px;">Payment Details (Final Payment : <?php echo $data7_bk_productcurrency->dccurrency; ?> <?php echo $no_of_persons_val->grand_total; ?> )</h5></div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table table-striped table-condensed" border="1" style="border: 1px solid #eee;">
										<tr>
											<th>Product</th>
											<th>Currency</th>
											<th>Price Per Item</th>
											<th>Quantity</th>
											<th>Total Amount</th>
										</tr>
										<?php 
											foreach($data6 as $data6_bk_payment)
											{
										?>
										<tr>
											<td><?php echo $data6_bk_payment->product_name; ?></td>
											<td>
											<?php
												echo $data7_bk_productcurrency->dccurrency;
											?>
											</td>
											<td><?php echo $data6_bk_payment->price; ?></td>
											<td><?php echo $data6_bk_payment->qty; ?></td>
											<td>
											<?php 
												echo number_format($prdt_amt = $data6_bk_payment->qty * $data6_bk_payment->price, 2);
												$total = $total + $prdt_amt;
												
											?>
											<input type="hidden" value="<?php echo $total; ?>" name="grandtotal">
											</td>
										</tr>
										<?php 
											}
										?>
										
										<tr>
											<td colspan="3"></td>
											<td><b>Sub Total</b></td>
											<td><?php echo $data7_bk_productcurrency->dccurrency; ?> <?php echo $total; ?>.00</td>
										</tr>
										<tr>
											<td colspan="3"></td>
											<td><b>GST 6%</b></td>
											<td><?php echo $data7_bk_productcurrency->dccurrency; ?> 0.00</td>
										</tr>
										<tr>
											<td colspan="3"></td>
											<td><b>Net Total</b></td>
											<td><?php echo $data7_bk_productcurrency->dccurrency; ?> <?php echo $total; ?>.00</td>
										</tr>
										<tr>
											<td colspan="3"></td>
											<td><b>Final Payment</b></td>
											<td><?php echo $data7_bk_productcurrency->dccurrency; ?> <?php echo $total; ?>.00
											
											</td>
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
					<?php 
						//}
					if($data_bk_NO->status == "CANCELLED")
					{
					?>
					<div class="panel panel-default content">
						<div class="panel-heading" style="background:#66ffff;"><h5 style="font-weight:bold;margin:0px 1px;">Payment Return Details (Amount Return : <?php echo $data7_bk_productcurrency->dccurrency; ?> .00 )</h5></div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table table-striped table-condensed" border="1" style="border: 1px solid #eee;">
										<tr>
											<th>Trip Payment</th>
											<td>
												<?php echo $data7_bk_productcurrency->dccurrency; ?> 
												<?php echo $data_bk_NO->grand_total; ?>
											</td>
										</tr>
										<tr>
											<th>Cancellation Penalty</th>
											<td>No Cancellation Penalty</td>
										</tr>
										<tr>
											<th>Services Charge</th>
											<td>
											<?php 
												$grt = $data_bk_NO->grand_total;
												echo  $service_chrg = $grt * 1.5 / 100;
											?>
											</td>
										</tr>
										<tr>
											<th>Amount Return</th>
											<td>
												<?php echo $tot = $data_bk_NO->grand_total - $service_chrg; ?> 
												
											</td>
										</tr>
									
									</table>
								</div>
							</div>
						</div>
						<div class="panel-heading">
							<div class="row" style="margin:0px 1px;">
								<div class="col-md-3">
								<b>Payment Return Method</b>
							</div>
							<div class="col-md-9">
								VISA Credit Card
							</div>
							</div>
						</div>
						
						
					</div>
					<?php
					}
					
					if($data_bk_NO->status == "PENDING")
					{
					?>
					<div class="panel panel-default content">
						<div class="panel-heading" style="background:#66ffff;">
							<div class="row">
								<div class="col-md-6">
								<h5 style="font-weight:bold;margin:0px 1px;">Guest Details (Total Guest : 
								<?php
									echo $nop = $no_of_persons_val->no_of_persons;
								?>
								)</h5>
							</div>
							<div class="col-md-6 text-right">
								<input type="submit" value="Save" name="passenger_details" class="btn btn-success">
							</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table" border="1" style="border: 1px solid #eee;">
										<?php 
											for($i=0; $i<$nop; $i++)
											{
										?>
										
										
										<tr>
										<td><b>Title</b></td>
										<td>
										<div class="form-group">
										<select name="title[<?php echo $i; ?>]">
												<option>Select Title</option>
												<option value="Mr">Mr.</option>
												<option value="Mrs">Mrs.</option>
										</select>
										</div>
										</td>
											<td><b>First Name</b></td><td><input type="text" name="firstname[<?php echo $i; ?>]" id="pwd"></td>
										<td><b>Sur Name</b></td><td><input type="text" name="surname[<?php echo $i; ?>]" id="pwd"></td>
										</tr>
										<tr>
											<td><b>Email Address</b></td>
											<td><input type="email" name="email_address[<?php echo $i; ?>]" id="pwd"></td>
											<td><b>Mobile Number</b></td>
											<td>
											<select name="countrycode[<?php echo $i; ?>]">
												<option>Select Country Code</option>
												<option value="+60">Malaysia (+60)</option>
											</select>
											<input type="number" name="mobile_number[<?php echo $i; ?>]" id="pwd">
											<input type="hidden" value="<?php echo $nop ?>" name="nop">
											
										</td>
										</tr>
										<?php 
											}
											
										?>
									</table>
								</div>
								
								
							</div>
						</div>
					</div>
					<?php 
					}
					else
					{
					 
						
					?>
					<div class="panel panel-default content">
						<div class="panel-heading" style="background:#66ffff;">
							<div class="row">
								<div class="col-md-6">
								<h5 style="font-weight:bold;margin:0px 1px;">Guest Details (Total Guest : 
								<?php
									echo $nop = $no_of_persons_val->no_of_persons;
								?>
								)</h5>
							</div>
							<div class="col-md-6 text-right">
								
							</div>
							</div>
						</div>
					<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table" border="1" style="border: 1px solid #eee;">
									<?php 
									$data8 = $this->db->get_where('tbl_passenger', array('booking_id'=>$itenary_id))->result();
						foreach($data8 as $data8_bk_passenger)
						{?>
					<tr><td><b>Name</b></td><td>
					<?php 
						echo $data8_bk_passenger->title.' '.$data8_bk_passenger->name.' '.$data8_bk_passenger->surname;
					?></td><td><b>Mobile Phone</b></td><td><?php echo $data8_bk_passenger->country_code.''.$data8_bk_passenger->phone_no; ?></td>
					<td><b>Email Address</b></td><td><?php echo $data8_bk_passenger->email; ?></td></tr>
					<?php } ?>
					</table>
					</div>
					</div>
					</div>
					</div>
					<?php 
						
				
					}
					?>
					
					</form>
					<?php 
						}
						
					}
					?>
				</div>
				
				<?php 
				
			}
				?>
				<script src="<?php echo base_url(); ?>assets/frontend/print/jquery.PrintArea.js"></script>
				<script>
				$(document).ready(function(){
					$("#print_button1").click(function(){
						var mode = 'iframe'; // popup
						var close = mode == "popup";
						var options = { mode : mode, popClose : close};
						$("div.wrapper").printArea( options );
					});
					 $("#print_button2").click(function(){
						var mode = 'iframe'; // popup
						var close = mode == "popup";
						var options = { mode : mode, popClose : close};
						$("div.content").printArea( options );
					});
				});

			  </script>
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