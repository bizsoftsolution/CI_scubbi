	
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
			
		 <!--script>
			function myFunction() {
				window.print();
			}
			</script-->
			<!--div class="container"><a onclick="myFunction()" style="float:right;text-decoration: underline;
    color: blue; cursor: pointer;">Print Trip Details</a></div-->
			<div class="container">
				
		<?php 
			$data = $this->db->get_where('tbl_booking', array('id'=>$itenary_id))->result();
			foreach($data as $data_bk_NO)
			{
		?>
			<form name="cancel" method="POST" action="<?php echo base_url(); ?>Customer/confirmCancellation/<?php echo $data_bk_NO->id; ?>">
				<div class="row" >
					<div class="panel panel-default">
						<div class="panel-heading" style="background:#66ffff;padding:0px;">
							<div class="row">
								<div class="col-md-6">
									<h5 style="font-weight:bold;margin:15px 0 0 10px;"> Cancel the Trip</h5>
								</div>
								<div class="col-md-6 text-right">
									
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
								<div class="col-md-3">
									<img src="<?php echo base_url(); ?>upload/DCprofile/<?php echo $data1_bk_profile->dcimage; ?>" class="img-circle" style="border:1px solid gray;"/>
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-6"><p align="left" style="color:#000;"><b>Your Booking Number is <label style="color:red"><?php echo $data_bk_NO->booking_no; ?></label></b><p></div>
										<!--div class="col-md-6"><p align="left" style="color:#000;"><b>Status : <label style="color:red"><?php echo $data_bk_NO->status; ?></label></b><p></div-->
									</div>
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
							<hr style="width:100%;">
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
												<!--td><b>Product ID</b></td>
												<td><?php echo $data4_bk_product->product_id; ?></td-->
												<td><b>Product</b></td>
												<td colspan="3"><?php echo $data5_bk_product_details->product_name; ?></td>
											</tr>
											<tr>
												<td><b>Description</b></td>
												<td colspan="3"><?php echo $data5_bk_product_details->product_description; ?></td>
											</tr>
										</table>
									</div>
								</div>
								
							<?php 
							}
						}
							?>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table" border="1" style="border: 1px solid #eee;">
										
										<tr>
											<td><b>Cancellation Policy</b></td>
											<td colspan="3">
												<?php
											//echo $data_bk_NO->id
										/* $this->db->select("*");
										$this->db->from("tbl_booking_product");
										$this->db->where('booking_id',$data_bk_NO->id);
										$query12 = $this->db->get();
										$res12 = $query12->result(); */
										
										$CI =& get_instance();

										$res12 = $this->db->query('select product_id, table_name, count(*) as cnt from tbl_booking_product where booking_id = \'' . $data_bk_NO->id . '\' group by product_id, table_name')->result();
										
										
										foreach($res12 as $row34)
										{	
										
											//echo $row34->product_id."<br>";
											//echo $row34->table_name."<br>";
											/* $this->db->select("*");
											$this->db->from($row34->table_name);
											$this->db->where('id',$row34->product_id);
											$query123 = $this->db->get();
											$res123 = $query123->result(); */
											$this->db->select("*");
											$this->db->from($row34->table_name);
											$this->db->where('id',$row34->product_id);
											$query123 = $this->db->get();
											$res123 = $query123->result();
											foreach($res123 as $row341)
											{
												?>
													<ul>
												<?php
												$output = $CI->rendercancellation($row341->cancellation_policy);
												echo $output;
												?>
													</ul>
												<?php
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
					</div>
					
					<?php foreach($no_of_persons as $no_of_persons_val)
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
							</div>
							
							
						</div>
						<div class="panel-body">
							<!--div class="row">
								<div class="table-responsive">
									<table class="table">
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
							</div-->
							<div class="row">
								<div class="table-responsive">
									<table class="table" border="1" style="border: 1px solid #eee;">
										<?php 
											$data8 = $this->db->get_where('tbl_passenger', array('booking_id'=>$no_of_persons_val->id))->result();
											foreach($data8 as $data8_bk_passenger)
											{
										?>
										<tr><td><b>Name</b></td><td><?php 
											echo $data8_bk_passenger->title.' '.$data8_bk_passenger->name.' '.$data8_bk_passenger->surname;
										?></td><td><b>Mobile Phone</b></td><td><?php echo $data8_bk_passenger->country_code.''.$data8_bk_passenger->phone_no; ?></td>
										<td><b>Email Address</b></td><td><?php echo $data8_bk_passenger->email; ?></td></tr>
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
					?>
					
					<?php 
						//$data6 = $this->db->get_where('tbl_booking_product', array('booking_id'=>$data_bk_NO->id))->result();
						$tot = 0;
						$data7 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$data_bk_NO->dive_id))->result();
						foreach($data7 as $data7_bk_productcurrency)
						{
					?>
					<div class="panel panel-default content">
						<div class="panel-heading" style="background:#66ffff;"><h5 style="font-weight:bold;margin:0px 1px;">Payment Return Details (Amount Return : <?php echo $data7_bk_productcurrency->dccurrency; ?> 
						<?php 
						$grt = $data_bk_NO->grand_total;
						$service_chrg = number_format(($grt * 1.5 / 100) ,2);
						echo $tot = number_format($data_bk_NO->grand_total - $service_chrg,2); 
						?> )</h5></div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table table-striped table-condensed" border="1" style="border: 1px solid #eee;">
										<tr>
											<th>Trip Payment</th>
											<td>
												<?php echo $data7_bk_productcurrency->dccurrency; ?> 
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
												echo $service_chrg = number_format(($grt * 1.5 / 100) ,2);
											?>
											</td>
										</tr>
										<tr>
											<th>Amount Return</th>
											<td>
												<?php echo $tot = number_format($data_bk_NO->grand_total - $service_chrg,2); ?> 
												
											</td>
										</tr>
										<tr>
											<th>MYR Amount Return</th>
											<td>
												<?php 
												$grtt = $data_bk_NO->myr_currency;
												$service_chrg1 = number_format(($grtt * 1.5 / 100) ,2);
												echo $tot = number_format($data_bk_NO->myr_currency - $service_chrg1,2); ?> 
												
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
						<br>
						<div class="row">
							<div class="col-md-12 text-right">
								<input type="submit" class="btn btn-success" value="Confirm The Cancellation">
								<a href="<?php echo base_url(); ?>Customer/customerMydiveTrips" class="btn btn-success">Back</a>
							</div>
						</div>
						<br>
					</div>
					<?php 
						}
						
					?>
				</div>
				</form>
				<?php 
				
			}
				?>
				
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