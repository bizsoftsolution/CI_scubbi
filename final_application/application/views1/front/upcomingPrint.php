<link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/daterangepicker.css');?>">
<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap.min.css'); ?>">
    <!-- JQUERY SELECT -->
    <link href="<?php echo base_url('assets/frontend/css/select2.min.css'); ?>" rel="stylesheet" />
    <!-- JQUERY MENU -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/bootstrap-dropdownhover.css'); ?>">
    <!-- ANIMATION -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/animate.min.css'); ?>">
    <!-- OWl  CAROUSEL-->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/owl.carousel.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/owl.style.css'); ?>">
    <!-- TEMPLATE CORE CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css'); ?>">
    <!-- MOBILE MENU CSS -->
    <link href="<?php echo base_url('assets/frontend/css/meanmenu.min.css'); ?>" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/et-line-fonts.css'); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/fonts/classified/flaticon.css'); ?>">
    <!--  MASTER SLIDER -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/masterslider/css/masterslider.css'); ?>" />
    <link href="<?php echo base_url('assets/frontend/masterslider/css/style.css'); ?>" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/masterslider/css/layer-style.css'); ?>">
    <link href="<?php echo base_url('assets/frontend/masterslider/css/ms-staff-style.css'); ?>" rel='stylesheet' type='text/css'>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900%7cOpen+Sans:400,600,700" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/frontend/css/nouislider.min.css'); ?>" rel="stylesheet">
    <!-- Theme Color -->
    <link rel="stylesheet" id="color" href="<?php echo base_url('assets/frontend/css/colors/defualt.css'); ?>">
    <!-- For Style Switcher -->
    <link rel="stylesheet" id="theme-color" type="text/css" href="#" />
    <!-- JavaScripts -->
    <script src="<?php echo base_url('assets/frontend/js/modernizr.js'); ?>"></script>
     <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/jquery-3.1.1.min.js'); ?>"></script>
  <!-- BOOTSTRAP CORE JS -->
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
	
	<style>
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th
		{
			border-top: none!important;
		}
	</style>
	<?php 
			if($this->session->userdata('user_id') != '')
			{
		?>	
<!-- mobile-menu-area-end -->
		 
         <section class="dashboard light-blue" id="ele1">
			
		 <!--script>
			function myFunction() {
				window.print();
			}
			</script-->
			<!--div class="container"><a onclick="myFunction()" style="float:right;text-decoration: underline;
    color: blue; cursor: pointer;">Print Trip Details</a></div-->
			<div class="container">
			<div class="row">
					<div class="col-md-8">
						 <a class="navbar-brand" id="navbar-logo">
				  <img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive"></a>
				  <div  style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 15px;margin-top: 13px;">Connecting Drivers Globally</div>
				  </div>
					<div class="col-md-4">
						 <!--div  style=" font: 400 30px/0.8 'Cookie', Helvetica, sans-serif; padding:30px 15px;margin-top: 13px;">Connecting Drivers Globally</div-->
					</div>
				</div>
				
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
									<h5 style="font-weight:bold;margin:15px 0 0 10px;"> Trip Details </h5>
								</div>
								<div class="col-md-4" text-center>
									<h5 style="font-weight:bold;margin:15px 0 0 10px;"> STATUS: &nbsp;<?php echo $data_bk_NO->status?></h5>
								</div>
								<div class="col-md-4 text-right">
									<h5 style="padding:0px 10px;    margin: 0px 0 0 70px;float:right">
										<form method="POST" action="<?php echo base_url(); ?>Customer/upcomingPDF/<?php echo $data_bk_NO->id; ?>" style="float:left;">  
											  <label style="text-align:right;padding:10px 10px;margin-bottom:0px;"><input type="submit" name="create_pdf1" class="btn btn-success" value="Print Trip Details"  /></label>
										</form>
										<label style="text-align:right;padding:10px 10px;margin-bottom:0px;">
											<a href="<?php echo base_url(); ?>Customer/customerMydiveTrips" class="btn btn-success">Back</a>
											</label>
										<!--button class="print-link no-print btn btn-success" onclick="jQuery('#ele1').print()">Print Trip Details</button-->
									</h5>
								</div>
							</div>
						</div>
						<div class="panel-body content">
							<div class="row">
								<?php 
								$data1 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$data_bk_NO->dive_id))->result();
									foreach($data1 as $data1_bk_profile)
									{
								?>
								<div class="table-responsive">
									<table class="table" border="1" style="border: 1px solid #eee;">
										<tr>
										<td>&nbsp;</td>
										<td colspan="2"><b>Your Booking Number is <label style="color:red"> <?php echo $data_bk_NO->booking_no; ?></label></b></td>
										<td colspan="2"><b>Order Confirmed on &nbsp;<label style="color:red"><?php echo date("d/m/Y", strtotime($data_bk_NO->created)); ?></label></b--></td>
										</tr>
										<tr>
											<td align="center"><img src="<?php echo base_url(); ?>upload/DCprofile/<?php echo $data1_bk_profile->dcimage; ?>" class="img-circle" style="border:1px solid gray;"/></td>
											<td colspan="4">
												<table class="table">
												<tr><td><b>Dive Center Name</b></td><td><?php echo $data1_bk_profile->dcname; ?></td><td>&nbsp;</td><td>&nbsp;</td></tr>
												<tr><td><b>Arrival Date</b></td>
												<td><?php //echo $upcoming_trip_row->checkin; 
													$arrival_date = $data_bk_NO->checkin;
													$format_arrival_date = date("d M Y", strtotime($arrival_date));
													echo $format_arrival_date;
												?></td>
												<td><b>Departure Date</b></td>
												<td><?php //echo $upcoming_trip_row->checkin; 
													$departure_date = $data_bk_NO->checkout;
													$format_departure_date = date("d M Y", strtotime($departure_date));
													echo $format_departure_date;
												?></td></tr>
												<tr><td><b>Contact Person</b></td><td>&nbsp;</td><td><b>Contact No</b></td><td><?php echo $data1_bk_profile->dctelephone_no; ?><br> </td></tr>
												<tr><td><b>Address</b></td>
												<td><?php echo $data1_bk_profile->dcaddress; ?><br>
												<?php 
												$data2 = $this->db->get_where('tbl_island', array('island_id'=>$data1_bk_profile->dcislands))->result();
												foreach($data2 as $data2_bk_island)
												echo $data2_bk_island->island_name.', ';
												
												$data3 = $this->db->get_where('tbl_country', array('country_id'=>$data1_bk_profile->dccountry))->result();
												foreach($data3 as $data3_bk_country)
												echo $data3_bk_country->country_name;
												
												?>	</td>
												<td></td><td></td></tr>
											</table>
											</td>
										</tr>
									</table>
								</div>
								
								
								<?php 
									}
								?>
							</div>
							
							<div class="row">
						<?php 
//						$data4 = $this->db->get_where('tbl_booking_product', array('booking_id'=>$data_bk_NO->id))->result();
						$data4 = $this->db->query('select product_id, table_name, accom, count(*) as cnt from tbl_booking_product where booking_id = ' . $data_bk_NO->id . ' group by product_id, table_name,accom')->result();
						foreach($data4 as $data4_bk_product)
						{
							$data5 = $this->db->get_where($data4_bk_product->table_name, array('id'=>$data4_bk_product->product_id))->result();
							foreach($data5 as $data5_bk_product_details)
							{
						?>
								<div class="">
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
												<?php //echo $data5_bk_product_details->optional_services; ?>
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
												if($data4_bk_product->accom == 'Yes') // 'tbl_dccourses')
												{
											?>
											<tr>
												<td><b>Accommodation</b></td>
												<td colspan="3">
													<table class="table">
														<tr>
															<td><b>Check In</b></td>
															<td><?php echo $data5_bk_product_details->checkintime; ?></td>
															<td><b>Check Out</b></td>
															<td><?php echo $data5_bk_product_details->checkouttime; ?></td>
														</tr>
														<tr>
															<td><b>Accommodation Type</b></td>
															<td colspan="3"><?php echo $data5_bk_product_details->actype; ?></td>
														</tr>
														<tr>
															<td><b>Amenities</b></td>
															<td colspan="3">
															<?php 
															$amts = explode(",",$data5_bk_product_details->amenities);
															echo $amt = implode(" | ", $amts);

															?>
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
												
											</tr>
											<?php 
												}
/*
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
															<td colspan="3">&nbsp;</td>
														</tr>
														<tr>
															<td><b>Amenities</b></td>
															<td colspan="3">&nbsp;</td>
														</tr>
														<tr>
															<td><b>Room Type</b></td>
															<td>Single <br> Twin Sharing <br> Triple Sharing <br> Quad Sharing</td>
															<td>&nbsp;<br>&nbsp; <br> &nbsp; <br>&nbsp;</td>
															<td>&nbsp;</td>
														</tr>
													</table>
												</td>
												<td>&nbsp;</td>
											</tr>
											<?php
												} */
											?>
											
										</table>
									</div>
								</div>
								
							<?php 
							}
						}
							?>
							</div>
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
							<div class="row">
								<div class="table-responsive">
									<table class="table" border="1" style="border: 1px solid #eee;">
										<tr>
											<td><b>Booking Policy</b></td>
											
											<td colspan="3">
											<?php
											//echo $data_bk_NO->id
										$output = $CI->renderBooking($row341->booking_policy);
										echo $output;
								
									?>
											
											</td>
										</tr>
										<tr>
											<td><b>Cancellation Policy</b></td>
											<td colspan="3">
												<?php
											//echo $data_bk_NO->id
												$output = $CI->renderCancellation($row341->cancellation_policy);
												echo $output;

							}
						} 
								
									?>
											
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
					<?php foreach($no_of_persons as $no_of_persons_val)
								{
								?>
								
					<div class="container">
						<div class="row">
							<form class="form-inline" action="<?php echo base_url(); ?>Customer/addPassenger/<?php echo $no_of_persons_val->id; ?>" method="POST">
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
							</div>
							
							
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table" border="1" style="border: 1px solid #eee;">
										<?php 
											$data8 = $this->db->get_where('tbl_passenger', array('booking_id'=>$no_of_persons_val->id))->result();
											foreach($data8 as $data8_bk_passenger)
											{
										?>
										<tr><td><b>Name</b></td><td>
										<?php 
											echo $data8_bk_passenger->title.' '.$data8_bk_passenger->name.' '.$data8_bk_passenger->surname;
										?></td><td><b>Mobile Phone</b></td><td><?php echo $data8_bk_passenger->country_code.''.$data8_bk_passenger->phone_no; ?></td>
										<td><b>Email Address</b></td><td><?php echo $data8_bk_passenger->email; ?></td></tr>
										<?php 
											}
										?>
										
									</table>
								</div>
							</div>
							<!--div class="row">
								<div class="table-responsive">
									<table class="table">
										<tr><td><b>Name</b></td><td>Mr johnny Tay</td><td><b>Mobile Phone</b></td><td>+60162135678</td>
										<td><b>Email Address</b></td><td>johnny@gmail.com</td></tr>
									</table>
								</div>
							</div-->
						</div>
					</div>
					</form>
						</div>
					</div>
					
					
					
					<?php 
								}
					?>
				</div>
				
				<?php 
				
			}
				?>
					
					<?php 
						
						//$data6 = $this->db->get_where('tbl_booking_product', array('booking_id'=>$data_bk_NO->id))->result();
						//$total = $data_bk_NO->grand_total;
						
						$qry = "SELECT diverid, product_name, qty, price, no_of_dive, sub_total, product_id, accom, accom_basis FROM `tbl_booking_product` WHERE booking_id = '" . $data_bk_NO->id . "'
union
SELECT diverid, concat(' &nbsp;&nbsp;Opt:', product_name) as product_name, qty, price, 0 as no_of_dive, total as sub_total, booking_product_id as product_id,'No', 1 FROM `tbl_booking_product_optional` WHERE booking_id = '" . $data_bk_NO->id . "'
order by diverid,product_id";
//echo $qry;
						$data6 = $this->db->query($qry)->result();
						
						$data7 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$data_bk_NO->dive_id))->result();
						
						$total =0;
						foreach($data7 as $data7_bk_productcurrency)
						{
							
							
					?>
					<div class="">
						<div class="row">
					<div class="panel panel-default content">
						<div class="panel-heading" style="background:#66ffff;"><h5 style="font-weight:bold;margin:0px 1px;">Payment Details (Final Payment : <?php echo $data7_bk_productcurrency->dccurrency; ?> <?php echo $data_bk_NO->grand_total; ?> )</h5></div>
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
											//$total = 0;
											//echo $total;
											foreach($data6 as $data6_bk_payment)
											{
											if ($data6_bk_payment->accom == "Yes") {
												switch($data6_bk_payment->accom_basis) {
												case 2:
													$accomdisp = " [Twin Sharing]";
												break;
												case 3:
													$accomdisp = " [Triple Sharing]";
												break;
												case 4:
													$accomdisp = " [Quad Sharing]";
												break;
												default:
													$accomdisp = " [Single]";
												break;
												}
											} else {
											$accomdisp = "";
											}
										?>
										<tr>
											<td align="center" style="padding:3px;"><?php echo $data6_bk_payment->diverid; ?></td>
											<td align="center"><?php echo $data6_bk_payment->product_name . $accomdisp; ?></td>
											<td align="center">
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
											<td align="center"><?php echo $data6_bk_payment->price; ?></td>
											<td align="center"><?php echo $data6_bk_payment->qty; ?></td>
											<td align="right">
											<?php 
												echo number_format($prdt_amt = $data6_bk_payment->qty * $data6_bk_payment->price, 2);
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
											<td align="right">
											<b>
											<?php 
											if($data_bk_NO->currency == "")
												 {
													 echo "MYR";
												 }
												 else
												 {
													 echo $data_bk_NO->currency;
												 } ?></b> <?php echo number_format($total,2); ?></td>
										</tr>
										<tr>
											<td colspan="4"></td>
											<td><b>GST 6%</b></td>
											<td align="right">
											<b>
											<?php  if($data_bk_NO->currency == "")
												 {
													 echo "MYR";
												 }
												 else
												 {
													 echo $data_bk_NO->currency;
												 } ?></b>
											<?php echo $gstt = number_format($total * (6/100),2);
											//echo $gst =$total - $gstt;
											?>
											</td>
										</tr>
										<tr>
											<td colspan="4"></td>
											<td><b>Net Total</b></td>
											<td align="right">
											<b>
											<?php  if($data_bk_NO->currency == "")
												 {
													 echo "MYR";
												 }
												 else
												 {
													 echo $data_bk_NO->currency;
												 } ?></b> <?php echo number_format($total + $gstt, 2); ?></td>
										</tr>
										<tr>
											<td colspan="4"></td>
											<td><b>Final Payment</b></td>
											<td align="right">
											<b>
											<?php   if($data_bk_NO->currency == "")
												 {
													 echo "MYR";
												 }
												 else
												 {
													 echo $data_bk_NO->currency;
												 } ?> 
												 </b>
											<?php echo number_format($total + $gstt, 2); ?></td>
										</tr>
										<?php 
											if(ucwords(strtoupper($data_bk_NO->currency)) != "MYR")
											{
										?>
										<tr>
											<td colspan="4"></td>
											<td><b>MYR Currency</b></td>
											<td align="right"><b><?php 
											$myr_currency = $data_bk_NO->myr_currency;
											echo 'MYR'.' '.number_format($myr_currency, 2); ?>
											 </b>
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
					
					</div>
					</div>
					<?php 
						}
						//echo $total;
					?>
					<div class="container">
					
				<div class="row">
					<div class="">
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td><img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive" style="width:150px;height:150px;"></td>
									<td>
									<p>You may contact us if you have any question <b>admin@scubbi.com OR +603 95401245</b></p>
						 <p><b>SCUBBI SDN, BHD.</b></p>
						 <p>18, Jalan ABC 2/6, <br>
							Kota ABC,<br>
							68000 Kuala Lumpur,<br>
							Wilayah Persekutuan Kuala Lumpur, Malaysia.
						 </p>
									</td>
								</tr>
							</table>
						</div>
					</div>
					
				</div>
				</div>
				
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
		
		 
		  <?php
			}
			else
			{
				redirect(base_url());
			}
		 ?>