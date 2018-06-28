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
		 
         <section class="dashboard light-blue" id="ele1">
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
								<div class="col-md-4">
									<!--MY Dive TRIPS > <a href="">My Upcoming Dive Trips</a> > -->
									<h5 style="font-weight:bold;margin:15px 0 0 10px;">Trip Details </h5>
								</div>
								<div class="col-md-2">
									<h5 style="font-weight:bold;margin:15px 0 0 10px;"> STATUS: &nbsp;<?php echo $data_bk_NO->status; ?></h5>
								</div>
								<?php 
								if(($data_bk_NO->status == "PENDING") || ($data_bk_NO->status == "CONFIRMED") || ($data_bk_NO->status == "PAYING"))
								{									
								?>
								<script>
								$(function(){
									var dd = new Date();
									
									$('#client_time_zone').val(dd.getTimezoneOffset());
								});
								</script>
								<div class="col-md-6 text-right">
									<h5 style="padding:0px 10px;    margin: 0px 0 0 70px;">
										<!--a href="<?php echo base_url(); ?>Customer/viewReceipt/<?php echo $data_bk_NO->id; ?>" class="btn btn-success" target="_blank">View Receipt</a-->
										<form method="POST" action="<?php echo base_url(); ?>Customer/viewReceiptPDF/<?php echo $data_bk_NO->id; ?>" style="float:left;">  
										<input type="hidden" name="client_time_zone" id="client_time_zone"/>
											  <label style="text-align:right;padding:10px 10px;margin-bottom:0px;"><input type="submit" name="create_pdf" class="btn btn-success" value="View Receipt"  /></label>
										</form>
										<form method="POST" action="<?php echo base_url(); ?>Customer/upcomingPDF/<?php echo $data_bk_NO->id; ?>" style="float:left;">  
											  <label style="text-align:right;padding:10px 10px;margin-bottom:0px;"><input type="submit" name="create_pdf1" class="btn btn-success" value="Print Trip Details"  /></label>
										</form>
										
											<!--a class="btn btn-success" target="_blank" href="<?php echo base_url(); ?>Customer/upcomingPrint/<?php echo $data_bk_NO->id; ?>">Print Trip Details</a-->
											<label style="text-align:right;padding:10px 10px;margin-bottom:0px;"><button href="" title="Delete" class="btn btn-success remove delete_btn">Cancel The Trip</button></label>
											<label style="text-align:right;padding:10px 10px;margin-bottom:0px;">
											<a href="<?php echo base_url(); ?>Customer/customerMydiveTrips" class="btn btn-success">Back</a>
											</label>
				 
										
									</h5>
									
									 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
							<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div id="dialog_box" style="display: none;">
    Are you sure confirm to cancel trip? Kindly click on the CONFIRM to proceed with cancellation process
</div>
<!--button class="delete_btn">Delete</button-->

<script>
$('.delete_btn').click(function(){
$('#dialog_box').dialog({
  title: 'Are you sure confirm to cancel trip?',
  width: 500,
  height: 200,
  modal: true,
  resizable: false,
  draggable: false,
  buttons: [{
  text: 'Confirm',
  click: function(){
     window.location = "<?php echo base_url(); ?>Customer/cancelTrip/<?php echo $data_bk_NO->id; ?>";
    }
  },
  {
  text: 'Cancel',
  click: function() {
      $(this).dialog('close');
    }
  }]
});
});

</script>
								</div>
								<?php 
								}
								elseif($data_bk_NO->status == "COMPLETED")
								{
								?>
								<div class="col-md-6 text-right">
									<h5 style="padding:0px 10px;    margin: 0px 0 0 70px;float:right;">
										<!--a href="<?php echo base_url(); ?>Customer/viewReceipt/<?php echo $data_bk_NO->id; ?>" class="btn btn-success" target="_blank">View Receipt</a-->
										<form method="POST" action="<?php echo base_url(); ?>Customer/upcomingPDF/<?php echo $data_bk_NO->id; ?>" style="float:left;">  
											  <label style="text-align:right;padding:10px 10px;margin-bottom:0px;"><input type="submit" name="create_pdf1" class="btn btn-success" value="Print Trip Details"  /></label>
										</form>
										<label style="text-align:right;padding:10px 10px;margin-bottom:0px;">
											<a href="<?php echo base_url(); ?>Customer/customerMydiveTrips" class="btn btn-success">Back</a>
										</label>
										<!--a class="btn btn-success" target="_blank" href="<?php echo base_url(); ?>Customer/upcomingPrint/<?php echo $data_bk_NO->id; ?>">Print Trip Details</a-->
										<!--a href="<?php echo base_url(); ?>Customer/cancelTrip/<?php echo $data_bk_NO->id; ?>" title="Delete" onclick="return confirm('Are you sure confirm to cancel trip? Kindly click on the CONFIRM to proceed with cancellation process');" class="btn btn-success remove">Cancel The Trip</a-->
										<!--a href="<?php echo base_url(); ?>Customer/customerMydiveTrips" class="btn btn-success">Back</a-->
									</h5>
								</div>
								<?php								
								}
								elseif($data_bk_NO->status == "CANCELLED")
								{
								?>
								<div class="col-md-6 text-right">
									<h5 style="padding:0px 10px;margin: 0px 0 0 70px;float:right;">
										<form method="POST" action="<?php echo base_url(); ?>Customer/upcomingPDF/<?php echo $data_bk_NO->id; ?>" style="float:left;">  
											  <label style="text-align:right;padding:10px 10px;margin-bottom:0px;"><input type="submit" name="create_pdf1" class="btn btn-success" value="Print Trip Details"  /></label>
										</form>
										<label style="text-align:right;padding:10px 10px;margin-bottom:0px;">
											<a href="<?php echo base_url(); ?>Customer/customerMydiveTrips" class="btn btn-success">Back</a>
										</label>
										<!--button class="print-link no-print btn btn-success" onclick="jQuery('#ele1').print()">Print Trip Details</button-->
										<!--a class="btn btn-success" target="_blank" href="<?php echo base_url(); ?>Customer/upcomingPrint/<?php echo $data_bk_NO->id; ?>">Print Trip Details</a-->
										<!--a href="<?php echo base_url(); ?>Customer/customerMydiveTrips" class="btn btn-success">Back</a-->
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
									if(($data_bk_NO->status == "PENDING") || ($data_bk_NO->status == "PAYING"))
									{
									?>
									<div class="row">
										<div class="col-md-8"><p align="left" style="color:#000;"><b>Your Booking Number is <label style="color:red"><?php echo $data_bk_NO->booking_no; ?></label></b> <!--confirmed--> <?php //echo $data_bk_NO->created; ?>.</p></div>
										<div class="col-md-4"><p align="left" style="color:#000;"><b>Confirmed : <!--label style="color:red"><?php echo ($data_bk_NO->status == "PAYING" ? "CONFIRMED" : $data_bk_NO->status); ?></label--><label style="color:red"><?php echo date("d/m/Y", strtotime($data_bk_NO->created)); ?></label></b><p></div>
									
									</div>
									<?php 
									}
									else
									{
									?>
									<div class="row">
										<div class="col-md-8"><p align="left" style="color:#000;"><b>Your Booking Number is <label style="color:red"><?php echo $data_bk_NO->booking_no; ?></label></b> <!--confirmed --><?php //echo $data_bk_NO->created; ?>.</p></div>
										<div class="col-md-4"><p align="left" style="color:#000;"><b>Confirmed : <label style="color:red"><?php echo date("d/m/Y", strtotime($data_bk_NO->created)); ?></label></b><p></div>
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
							</div>
							<div class="row">
						<?php 
//						$data4 = $this->db->get_where('tbl_booking_product', array('booking_id'=>$data_bk_NO->id))->result();
						$data4 = $this->db->query('select product_id, table_name,accom, count(*) as cnt from tbl_booking_product where booking_id = ' . $data_bk_NO->id . ' group by product_id, table_name,accom')->result();
						foreach($data4 as $data4_bk_product)
						{
							$data5 = $this->db->get_where($data4_bk_product->table_name, array('id'=>$data4_bk_product->product_id))->result();
							foreach($data5 as $data5_bk_product_details)
							{
						?>
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table table-striped" border="1" style="border: 1px solid #eee;">
											<tr>
												<td><b>Product Name</b></td>
												<td colspan="3"><?php echo $data5_bk_product_details->product_name; ?></td>
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
												<td colspan="3">
												<?php //echo $data5_bk_product_details->optional_services_service; ?>
												<?php 
												//echo 
													$opt_ser = explode(",",$data5_bk_product_details->optional_services_service);
													foreach($opt_ser as $opt_res)
													{
														echo $opt_res.'<br>';
														//$data5_bk_product_details->optional_services_service; 
													}
													?>
												</td>
											</tr>
											<?php 
												}
												else
												{
											?>
											<tr>
												<td><b>Optional Services</b></td>
												<td colspan="3">
												<?php 
												//echo 
													$opt_ser = explode(",",$data5_bk_product_details->optional_services_service);
													foreach($opt_ser as $opt_res)
													{
														echo $opt_res.'<br>';
														//$data5_bk_product_details->optional_services_service; 
													}
													?>
												</td>
											</tr>
											<?php	
												}
												if($data4_bk_product->accom == 'Yes') //'tbl_dccourses')
												{
											?>
											<tr>
												<td><b>Accommodation</b></td>
												<td colspan="2">
													<table class="table table-striped" >
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
												<?php
													$roomhead = "
														<td>";
													$roomoutput = "
														<td>";
													$resroom = $this->db->query('select product_id, accom, accom_basis, count(*) as cnt from tbl_booking_product where booking_id = \'' . $data_bk_NO->id . '\' group by product_id, accom, accom_basis')->result();
													foreach($resroom as $room)
													{	
														switch ($room->accom_basis) {
														case 1:
															$roomhead .= " Single<br>";
															$roomoutput .= $data5_bk_product_details->oneperson_bed_type . "<br>";
														break;
														case 2:
															$roomhead .= " Twin Sharing<br>";
															$roomoutput .= $data5_bk_product_details->twoperson_bed_type . "<br>";
														break;
														case 3:
															$roomhead .= " Triple Sharing<br>";
															$roomoutput .= $data5_bk_product_details->threeperson_bed_type . "<br>";
														break;
														case 4:
															$roomhead .= " Quad Sharing<br>";
															$roomoutput .= $data5_bk_product_details->fourperson_bed_type . "<br>";
														break;
														}
													}
													echo $roomhead . "</td>
													" . $roomoutput . "</td>
													";
														
												?>
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
						<?php
					$CI =& get_instance();

					$res12 = $this->db->query('select product_id, table_name, count(*) as cnt from tbl_booking_product where booking_id = \'' . $data_bk_NO->id . '\' group by product_id, table_name')->result();
					foreach($res12 as $row34)
					{	
										
						$this->db->select("*");
						$this->db->from($row34->table_name);
						$this->db->where('id',$row34->product_id);
						$query123 = $this->db->get();
						$res123 = $query123->result();
						foreach($res123 as $row341)
						{

						?>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table" border="1" style="border: 1px solid #eee;">
										<tr>
											<td><b>Booking Policy</b></td>
											
											<td colspan="3">
											<?php
										$output = $CI->renderBooking($row341->booking_policy);
										echo $output;
								
									?>
											
											</td>
										</tr>
										<tr>
											<td><b>Cancellation Policy</b></td>
											<td colspan="3">
												<?php
												$output = $CI->rendercancellation($row341->cancellation_policy);
												echo $output;
												
										
								
									?>
											
											</td>
										</tr>
									</table>
								</div>
							</div>
							<?php 
								}
										}
							?>
						</div>	
							
							
							
						</div>
					</div>
					<?php 
    $qry = "SELECT diverid, product_name, qty, price, no_of_dive, sub_total, product_id, accom, accom_basis FROM `tbl_booking_product` WHERE booking_id = '" . $data_bk_NO->id . "'
union
SELECT diverid, concat(' &nbsp;&nbsp;Opt:', product_name) as product_name, qty, price, 0 as no_of_dive, total as sub_total, booking_product_id as product_id,'No', 1 FROM `tbl_booking_product_optional` WHERE booking_id = '" . $data_bk_NO->id . "'
order by diverid,product_id";
//echo $qry;
						$data6 = $this->db->query($qry)->result();

//						$data6 = $this->db->get_where('tbl_booking_product', array('booking_id'=>$data_bk_NO->id))->result();
						$total = 0.00;
						$data7 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$data_bk_NO->dive_id))->result();
						foreach($data7 as $data7_bk_productcurrency)
						{
							foreach($no_of_persons as $no_of_persons_val)
								{
					?>
					<div class="">
						<div class="row">
							<form class="form-inline" action="<?php echo base_url(); ?>Customer/addPassenger/<?php echo $no_of_persons_val->id; ?>" method="POST">
					<div class="panel panel-default content">
						<div class="panel-heading" style="background:#66ffff;"><h5 style="font-weight:bold;margin:0px 1px;">Payment Details (Final Payment : <?php
											if($data_bk_NO->currency == "")
											{
												echo "MYR";
											}
											else
											{
												echo $data_bk_NO->currency;
											}
											?> <?php echo $no_of_persons_val->grand_total; ?> )</h5></div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table table-striped table-condensed" border="1" style="border: 1px solid #eee;">
										<tr>
											<th>DiverID</th>
											<th>Product</th>
											<th>Currency</th>
											<th>Price Per Item</th>
											<th>Quantity</th>
											<th>Total Amount</th>
										</tr>
										<?php 
											foreach($data6 as $data6_bk_payment)
											{
												if ($data6_bk_payment->accom == "Yes") {

												switch ($data6_bk_payment->accom_basis) {
												case 1:
													$accomdisp = " [Single]";
												break;
												case 2:
													$accomdisp = " [Double sharing]";
												break;
												case 3:
													$accomdisp = " [Triple sharing]";
												break;
												case 4:
													$accomdisp = " [Quad sharing]";
												break;
												default:
													$accomdisp = " [Undefined room]";
												break;
												}
												} else {
													$accomdisp = "";
												}
										?>
										<tr>
											<td><?php echo $data6_bk_payment->diverid; ?></td>
											<td><?php echo $data6_bk_payment->product_name . $accomdisp; ?></td>
											<td>
											<?php
											if($data_bk_NO->currency == "")
											{
												echo "MYR";
											}
											else
											{
												echo $data_bk_NO->currency;
											}
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
											$data75 = $this->db->get_where('tbl_booking_product_extend', array('booking_id'=> $data_bk_NO->id))->result();
											foreach($data75 as $rowdata75)
											{
										?>
										<tr>
											<td></td>
											<td >Extend Night</td>
											<td >
											<?php
												//echo $data7_bk_productcurrency->dccurrency;
												 if($data_bk_NO->currency == "")
												 {
													 echo "MYR";
												 }
												 else
												 {
													 echo $data_bk_NO->currency;
												 }
											?>
											</td>
											<td ><?php echo $rowdata75->price; ?></td>
											<td ><?php echo $rowdata75->qty; ?></td>
											<td >
											<?php 
												echo number_format($prdt_amt = $rowdata75->qty * $rowdata75->price, 2);
												$total = $total + $prdt_amt;
											?>
											</td>
										</tr>
										<?php 
								
											}
										?>
										
										<tr>
											<td colspan="4"></td>
											<td><b>Sub Total</b></td>
											<td><?php
											if($data_bk_NO->currency == "")
											{
												echo "MYR";
											}
											else
											{
												echo $data_bk_NO->currency;
											}
											?> 
											<?php echo number_format($total,2); ?></td>
										</tr>
										<tr>
											<td colspan="4"></td>
											<td><b>GST 6%</b></td>
											<td><?php
											if($data_bk_NO->currency == "")
											{
												echo "MYR";
											}
											else
											{
												echo $data_bk_NO->currency;
											}
											?>
											<?php echo $gstt = number_format($total * (6/100),2);
											//echo $gst =$total - $gstt;
											?></td>
										</tr>
										<tr>
											<td colspan="4"></td>
											<td><b>Net Total</b></td>
											<td><?php
											if($data_bk_NO->currency == "")
											{
												echo "MYR";
											}
											else
											{
												echo $data_bk_NO->currency;
											}
											?> <?php echo number_format($total + $gstt, 2); ?></td>
										</tr>
										<tr>
											<td colspan="4"></td>
											<td><b>Final Payment</b></td>
											<td><?php
											if($data_bk_NO->currency == "")
											{
												echo "MYR";
											}
											else
											{
												echo $data_bk_NO->currency;
											}
											?> <?php echo number_format($total + $gstt, 2); ?>
											
											</td>
										</tr>
										<?php 
											if(ucwords(strtoupper($data_bk_NO->currency)) != "MYR")
											{
										?>
										<tr>
											<td colspan="4"></td>
											<td><b>MYR Currency</b></td>
											<td><?php 
											$myr_currency = $data_bk_NO->myr_currency;
											echo 'MYR'.' '.number_format($myr_currency, 2); ?>
											
											</td>
										</tr>
										<?php 
											}
											else
											{
												
											}
										?>
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
								Charged to Credit Card
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
						<div class="panel-heading" style="background:#66ffff;"><h5 style="font-weight:bold;margin:0px 1px;">Payment Return Details (Amount Return : <?php
											if($data_bk_NO->currency == "")
											{
												echo "MYR";
											}
											else
											{
												echo $data_bk_NO->currency;
											}
											?>
						<?php 
							$grt = $data_bk_NO->grand_total;
							$service_chrg = number_format(($grt * 1.5 / 100),2);
							echo $tot = number_format($data_bk_NO->grand_total - $service_chrg ,2);
						?>
						)</h5></div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table table-striped table-condensed" border="1" style="border: 1px solid #eee;">
										<tr>
											<th>Trip Payment</th>
											<td>
												<?php
											if($data_bk_NO->currency == "")
											{
												echo "MYR";
											}
											else
											{
												echo $data_bk_NO->currency;
											}
											?> 
												<?php echo number_format($data_bk_NO->grand_total,2); ?>
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
												echo  $service_chrg = number_format(($grt * 1.5 / 100),2);
											?>
											</td>
										</tr>
										<tr>
											<th>Amount Return</th>
											<td>
												<?php echo $tot = number_format($data_bk_NO->grand_total - $service_chrg ,2); ?> 
												
											</td>
										</tr>
										<?php 
											if(ucwords(strtoupper($data_bk_NO->currency)) != "MYR")
											{
										?>
										<tr>
											<th>MYR Amount Return</th>
											<td>
												<?php
												
												$grtt = $data_bk_NO->myr_currency;
												$service_chrg1 = number_format(($grtt * 1.5 / 100) ,2);
												echo $tot = number_format($data_bk_NO->myr_currency - $service_chrg1,2); 
												?> 
											</td>
										</tr>
										<?php 
											}
											else
											{
												
											}
										?>
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
					
					if(($data_bk_NO->status == "PENDING") || ($data_bk_NO->status == "CONFIRMED") || ($data_bk_NO->status == "PAYING"))
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

		 								$this->db->select('*');
		 								$this->db->from('tbl_passenger');
    									$this->db->where('booking_id',$data_bk_NO->id);
		 								$psgq = $this->db->get();
		 								$pres = $psgq->result();
		 								$psgs = array();
										foreach ($pres as $psg) {
											$psgs[] = get_object_vars($psg);
										}
												$f_title = "";
												$f_name = "";
												$f_surname = "";
												$f_email = "";
												$f_countrycode = "";
												$f_mobile = "";
												$f_rid = "";

											for($i=0; $i<$nop; $i++)
											{
											If (count($psgs) > $i) {
												$f_title = $psgs[$i]["title"];
												$f_name = $psgs[$i]["name"];
												$f_surname = $psgs[$i]["surname"];
												$f_email = $psgs[$i]["email"];
												$f_countrycode = $psgs[$i]["country_code"];
												$f_mobile = $psgs[$i]["phone_no"];
												$f_rid = $psgs[$i]["id"];
												
											}
										?>
										
										
										<tr>
										<td><b>Title</b></td>
										<td>
										<div class="form-group">
										<select name="title[<?php echo $i; ?>]">
												<option>Select Title</option>
												<option value="Mr" <?php if($f_title == 'Mr') echo"selected"; ?>>Mr.</option>
												<option value="Mrs" <?php if($f_title == 'Mrs') echo"selected"; ?>>Mrs.</option>
												<option value="Miss" <?php if($f_title == 'Miss') echo"selected"; ?>>Miss</option>
										</select>
										</div>
										</td>
											<td><b>First Name</b></td><td><input type="text" name="firstname[<?php echo $i; ?>]" id="pwd" value="<?php echo $f_name; ?>"></td>
										<td><b>Sur Name</b></td><td><input type="text" name="surname[<?php echo $i; ?>]" id="pwd"  value="<?php echo $f_surname; ?>"></td>
										</tr>
										<tr>
											<td><b>Email Address</b></td>
											<td><input type="email" name="email_address[<?php echo $i; ?>]" id="pwd" value="<?php echo $f_email; ?>"></td>
											<td><b>Mobile Number</b></td>
											<td>
											<select name="countrycode[<?php echo $i; ?>]">
												<option>Select Country Code</option>
												<option value="(+60)" <?php if($f_countrycode == '(+60)') echo 'selected'; ?> >Malaysia (+60)</option>
											</select>
											<input type="number" name="mobile_number[<?php echo $i; ?>]" id="pwd" value="<?php echo $f_mobile; ?>">
											<input type="hidden" value="<?php echo $f_rid ?>" name="rid[<?php echo $i; ?>]">
											
										</td>
										</tr>
										<?php 
											}
											
										?>
											<input type="hidden" value="<?php echo $nop ?>" name="nop">
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
						{
							
							?>
					<tr><td><b>Name</b></td><td>
					<?php 
						echo $data8_bk_passenger->title.' '.$data8_bk_passenger->name.' '.$data8_bk_passenger->surname;
					?></td><td><b>Mobile Phone</b></td><td><?php echo $data8_bk_passenger->country_code.''.$data8_bk_passenger->phone_no; ?></td>
					<td><b>Email Address</b></td><td><?php echo $data8_bk_passenger->email; ?></td></tr>
					<?php
							
					} ?>
					</table>
					</div>
					</div>
					</div>
					</div>
					<?php 
						
				
					}
					?>
					
					</form>
						</div>
					</div>
					
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
			 
			 <script src="<?php echo base_url(); ?>assets/frontend/print/jquery.print.js"></script>
				<script type='text/javascript'>
        //<![CDATA[
        jQuery(function($) { 'use strict';
            $("#ele2").find('.print-link').on('click', function() {
                //Print ele2 with default options
                $.print("#ele2");
            });
            $("#ele4").find('button').on('click', function() {
                //Print ele4 with custom options
                $("#ele4").print({
                    //Use Global styles
                    globalStyles : false,
                    //Add link with attrbute media=print
                    mediaPrint : false,
                    //Custom stylesheet
                    stylesheet : "https://fonts.googleapis.com/css?family=Inconsolata",
                    //Print in a hidden iframe
                    iframe : false,
                    //Don't print this
                    noPrintSelector : ".avoid-this",
                    //Add this at top
                    prepend : "Hello World!!!<br/>",
                    //Add this on bottom
                    append : "<br/>Buh Bye!",
                    //Log to console when printing is done via a deffered callback
                    deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
                });
            });
            // Fork https://github.com/sathvikp/jQuery.print for the full list of options
        });
        //]]>
        </script>
		
         </section>
		 <hr style="width:100%;border:2px solid #66ffff;">
		 
		  <?php
			}
			else
			{
				redirect(base_url());
			}
		 ?>