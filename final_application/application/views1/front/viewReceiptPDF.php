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
		 
         <section class="dashboard light-blue">
			
		 <!--script>
			function myFunction() {
				window.print();
			}
			</script-->
			<!--div class="container"><a onclick="myFunction()" style="float:right;text-decoration: underline;
    color: blue; cursor: pointer;">Print Trip Details</a></div-->
			<div class="container">
			
				
		<?php 
//			$data = $this->db->get_where('tbl_booking', array('id'=>$itenary_id))->result();
			$qry = "select b.id, b.booking_no,b.currency, b.checkin, b.checkout, b.no_of_persons, b.grand_total, b.myr_currency, p.product_id, p.product_name, p.accom, d.dcname, d.dccurrency
			 from (tbl_booking b join tbl_booking_product p on p.booking_id = b.id) join tbl_dcprofile d on d.user_id = b.dive_id where b.id = $itenary_id
			group by b.id, b.booking_no, b.checkin, b.checkout, b.no_of_persons, b.grand_total, p.product_id, p.product_name, p.accom, d.dcname, d.dccurrency limit 1";
			$data = $this->db->query($qry)->result();
			foreach($data as $hdata)
			{
		?>
				<div class="row">
				<br>
					<div class="">
						<div class="table-responsive">
							<table class="table" >
								<tr>
									<td style="width:170px;"><img src="<?php echo base_url(); ?>assets/images/logo-new-chrcle-small.jpg" alt="" class="img-responsive" style="width:150px;height:150px;"></td>
									<td>
									
						 <p style="line-height: 22px;"><b>SCUBBI SDN, BHD.</b></p>
						 <p style="line-height: 22px;">18, Jalan ABC 2/6, <br>
							Kota ABC,<br>
							68000 Kuala Lumpur,<br>
							Wilayah Persekutuan Kuala Lumpur, Malaysia.<br>
							Email : admin@scubbi.com <br>
							Contact No :+603 95401245 <br>
							<!--Invoice No : SC0001222-->
							Invoice No : <?php 
											$number = sprintf('%07d', $hdata->id);
											echo $number = 'SC'.$number;
								//echo "SC00".$hdata->invoice_no; 
								?>
						 </p>
									</td>
									<td>&nbsp;</td>
									<td style="vertical-align: middle;color:#777;font-weight:bold;"><?php 
									date_default_timezone_set('Asia/Kolkata');
									echo $date = date('h:i A, d M Y', time());
									//echo date("H:m A, d F Y"); ?></td>
								</tr>
							</table>
						</div>
					</div>
					
				</div>
				<div class="row" >
					<div class="panel panel-default">
						<div class="panel-heading" style="background:#66ffff;">
								<div class="table-responsive">
									<table class="table" style="margin-bottom:0px;">
										<tr>
											<td style="background:#66ffff;font-weight:bold">Trip Details</td>
											<td style="background:#66ffff;font-weight:bold">Booking Number</td>
											<td style="background:#66ffff;font-weight:bold"><?php echo $hdata->booking_no; ?></td>
										</tr>
									</table>
								</div>
								
								<!--div class="col-md-3">
									<h5 style="font-weight:bold;margin:10px 10px!important;"> Trip Details </h5>
								</div>
								<div class="col-md-3">
									<h5 style="font-weight:bold;margin:10px 10px!important;">Booking Number</h5>
								</div>
								<div class="col-md-3">
									<h5 style="font-weight:bold;margin:10px 10px!important;"><?php echo $hdata->booking_no; ?></h5>
								</div>
								<div class="col-md-3">
									&nbsp;
								</div-->
							
						</div>
						<div class="panel-body content">
							<?php 
/*
								$data4 = $this->db->get_where('tbl_booking_product', array('booking_id'=>$data_bk_NO->id))->result();
								foreach($data4 as $data4_bk_product)
								{
								$data5 = $this->db->get_where($data4_bk_product->table_name, array('id'=>$data4_bk_product->product_id))->result();
								foreach($data5 as $data5_bk_product_details)
								{
								$data1 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$data_bk_NO->dive_id))->result();
									foreach($data1 as $data1_bk_profile)
									{
*/
								?>
							<div class="row">
								<div class="table-responsive">
									<table class="table" border="1" style="border: 1px solid #eee;">
										<!--tr>
											<td><b>Product ID</b></td>
											<td colspan="3"><?php echo $hdata->product_id; ?></td>	
										</tr-->
										<tr>
											<td style="padding:7px;"><b>Product</b></td>
											<td style="padding:7px;"><?php echo $hdata->product_name; ?></td>
											<td style="padding:7px;"><b>Dive Center</b></td>
											<td style="padding:7px;"><?php echo $hdata->dcname; ?></td>
										</tr>
										<tr>
											<td style="padding:7px;"><b>Arrival Date</b></td>
											<td style="padding:7px;"><?php //echo $upcoming_trip_row->checkin; 
													$arrival_date = $hdata->checkin;
													$format_arrival_date = date("d M Y", strtotime($arrival_date));
													echo $format_arrival_date;
												?></td>
											<td style="padding:7px;"><b>Departure Date</b></td>
											<td style="padding:7px;"><?php //echo $upcoming_trip_row->checkin; 
													$departure_date = $hdata->checkout;
													$format_departure_date = date("d M Y", strtotime($departure_date));
													echo $format_departure_date;
												?></td>
										</tr>
									</table>
								</div>
							</div>
							<?php 
//									}
//									}
//									}
							?>
						
						</div>
					</div>
					<?php

						$qry = "SELECT diverid, product_name, qty, price, no_of_dive, sub_total, product_id, accom, accom_basis FROM `tbl_booking_product` WHERE booking_id = '" . $hdata->id . "'
union
SELECT diverid, concat(' &nbsp;&nbsp;Opt:', product_name) as product_name, qty, price, 0 as no_of_dive, total as sub_total, booking_product_id as product_id,'No', 1 FROM `tbl_booking_product_optional` WHERE booking_id = '" . $hdata->id . "'
order by diverid,product_id";
						
						$data6 = $this->db->query($qry)->result();
						
						//$data6 = $this->db->get_where('tbl_booking_product', array('booking_id'=>$hdata->id))->result();
						$total = 0.00;
//						$data7 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$data_bk_NO->dive_id))->result();
//						foreach($data7 as $data7_bk_productcurrency)
//						{
					?>
					<div class="panel panel-default content">
						<div class="panel-heading" style="background:#66ffff;"><h5 style="font-weight:bold;margin:0px 1px;">Payment Details (Final Payment : <?php if($hdata->currency == ""){ echo "MYR"; } else { echo $hdata->currency; } echo $hdata->grand_total; ?> 
						<?php
						// foreach($grand_total as $grand_total_row)
						//{
						//	echo $grand_total_row->grand_total;
						//}
						?>)</h5></div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table table-striped table-condensed" border="1" style="border: 1px solid #eee;">
										<tr>
											<th style="padding:7px;">DiverID</th>
											<th style="padding:7px;">Product</th>
											<th style="padding:7px;">Currency</th>
											<th style="padding:7px;">Price Per Item</th>
											<th style="padding:7px;">Quantity</th>
											<th style="padding:7px;">Total Amount</th>
										</tr>
										<?php 
											foreach($data6 as $data6_bk_payment)
											{
												if ($hdata->accom == "Yes") {
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
											<td style="padding:7px;"><?php echo $data6_bk_payment->diverid; ?></td>
											<td style="padding:7px;"><?php echo $data6_bk_payment->product_name . $accomdisp; ?></td>
											<td style="padding:7px;">
											<?php if($hdata->currency == ""){ echo "MYR"; } else { echo $hdata->currency; } ?>
											</td>
											<td style="padding:7px;"><?php echo $data6_bk_payment->price; ?></td>
											<td style="padding:7px;"><?php echo $data6_bk_payment->qty; ?></td>
											<td style="padding:7px;">
											<?php 
												echo number_format($prdt_amt = $data6_bk_payment->qty * $data6_bk_payment->price, 2);
												$total += $prdt_amt;
											?>
											</td>
										</tr>
										<?php 
											}
										?>
										<!--tr><td colspan="5"><hr style="width:100%;border:2px solid #eee;"></td></tr-->
										<tr>
											<td colspan="4"></td>
											<td style="padding:7px;"><b>Sub Total</b></td>
											<td style="padding:7px;"><?php if($hdata->currency == ""){ echo "MYR"; } else { echo $hdata->currency; } ?> <?php echo number_format($total,2); ?></td>
										</tr>
										<tr>
											<td colspan="4"></td>
											<td style="padding:7px;"><b>GST 6%</b></td>
											<td style="padding:7px;">
											<?php if($hdata->currency == ""){ echo "MYR"; } else { echo $hdata->currency; } ?>
											<?php echo $gstt = number_format($total * (6/100),2);
											//echo $gst =$total - $gstt;
											?>
											<?php //echo $hdata->dccurrency; ?></td>
										</tr>
										<tr>
											<td colspan="4"></td>
											<td style="padding:7px;"><b>Net Total</b></td>
											<td style="padding:7px;">
											<?php if($hdata->currency == ""){ echo "MYR"; } else { echo $hdata->currency; } ?> <?php echo number_format($total + $gstt, 2); ?></td>
										</tr>
										<tr>
											<td colspan="4"></td>
											<td style="padding:7px;"><b>Final Payment</b></td>
											<td style="padding:7px;"><?php echo $hdata->currency; ?> <?php echo number_format($total + $gstt, 2); ?></td>
										</tr>
										<?php 
											if(ucwords(strtoupper($hdata->currency)) != "MYR")
											{
										?>
										<tr>
											<td colspan="4"></td>
											<td style="padding:7px;"><b>MYR Currency</b></td>
											<td style="padding:7px;"><?php 
											$myr_currency = $hdata->myr_currency;
											echo 'MYR'.' '.number_format($myr_currency, 2); ?></td>
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
								Charged to VISA/Master Credit Card
							</div>
							</div>
						</div>
					</div>
					<?php 
					//	}    
					?>
					
				</div>
				
				<?php 
				
			} // foreach hdata
				?>
				
			 </div>
			 
			 
			 
			 
			 <div class="container">&nbsp;</div>
			 
         </section>
		
		 
		  <?php
			}
			else
			{
				redirect(base_url());
			}
		 ?>