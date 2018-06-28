<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">DC Booking List</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
			<div class="panel-heading">
			   <h2 class="panel-title">Dive Center Booking List</h2>
			   <div style="text-align:right;">
				  <!--a class="btn bg-purple" href="<?php echo  base_url();?>SAbecomeapartner/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
				  <!--a href="<?php echo  base_url();?>SAslider" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a-->
			   </div>
			   <hr/>
			</div>
			<div class="panel-body">
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#basic-tab1" data-toggle="tab">Paying</a></li>
						<li><a href="#basic-tab2" data-toggle="tab">Confirmed</a></li>
						<li><a href="#basic-tab3" data-toggle="tab">Completed</a></li>
						<li><a href="#basic-tab4" data-toggle="tab">Pending</a></li>
						<li><a href="#basic-tab5" data-toggle="tab">Cancelled</a></li>
						<!--li><a href="#basic-tab6" data-toggle="tab">Failed</a></li-->
						<li><a href="#basic-tab7" data-toggle="tab">Declined</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="basic-tab1">
							 <table class="table datatable-button-print-columns" id="dadadad">
								<thead>
								   <tr>

									 <th>SNO</th>
									 <th>Booking No</th>
									 <th>Book By</th>
									 <th>Travel Date</th>
									 <th>Booked On</th>
									 <!--th>Product Id</th-->
									 <th>Amount</th>
									 <th>Status</th>
									<th>Action</th>
								   </tr>
								</thead>
								<tbody>
								<?php
								$i=1;
					//			$data = $this->db->get('tbl_booking')->result();
								
								  foreach($bookingList as $row) {
									  if($row->status == "PAYING")
									  { 
								?>
								  <tr>
								  <td><?php echo $row->id;
								  //$i; ?></td>
								  <td><b><?php echo $row->booking_no; ?></b>
								  <?php
										$aa = $this->db->get_where('tbl_booking_product',array('booking_id'=>$row->id))->result();
										foreach($aa as $rowBooking)
										{
											$aa = $rowBooking->product_id;
											//echo "<br> P - ".sprintf('%03d',$aa).",";
										}
										?>
								  </td>
								  <?php
									$data1 = $this->db->get_where('user', array('user_id =' => $row->customer_id))->result();
									$listno = 0;
								
									foreach($data1 as $row1){
										?>
								  <td><!--[<?php //echo $row1->user_id; ?>]:--> <?php echo $row1->first_name . " " . $row1->last_name ; ?><br><b>email:</b> <?php echo $row1->email; ?>
								<?php        $listno++;
									}
								if ($listno == 0) {
								?>      
								  <td>Customer record (<?php echo $row->customer_id; ?>) not found!

								<?php        }
								?>      
								  </td>
								  <td><b>Arrival Date:</b> <?php echo date("d/m/Y",strtotime($row->checkin)); ?><br>
									<b>Departure Date:</b> <?php echo date("d/m/Y",strtotime($row->checkout)); ?>
								  </td>
								  <td><?php echo date("d/m/Y H:i:s",strtotime($row->created)); ?></td>
								  <!--td>
										<?php
										$aa = $this->db->get_where('tbl_booking_product',array('booking_id'=>$row->id))->result();
										foreach($aa as $rowBooking)
										{
											$aa = $rowBooking->product_id;
											//echo "P - ".sprintf('%03d',$aa).",";
										}
										?>
								  </td-->
								  <td><?php echo $row->grand_total; ?></td>
									<td>
									 <span class="label bg-pink"><?php echo $row->status; ?></span>
									
								</td>
								<td>
									<a class="btn btn-success" href="<?php echo base_url().'DCBooking/editStatus/'.$row->id . '/' . $row->dive_id; ?> ">Show Detail
								<?php 
								/* switch($row->status) {
								default:
									echo $row->status; 
								break;
								} */
								?></a>
								</td>
								  </tr>
								<?php   
									  }								
								$i++;    }
								?>      

								</tbody>
							</table>
						</div>
						
						<div class="tab-pane" id="basic-tab2">
							 <table class="table datatable-button-print-columns" id="dadadad">
								<thead>
								   <tr>

									 <th>SNO</th>
									 <th>Booking No</th>
									 <th>Book By</th>
									 <th>Travel Date</th>
									 <th>Booked On</th>
									 <!--th>Product Id</th-->
									 <th>Amount</th>
									 <th>Status</th>
									<th>Action</th>
								   </tr>
								</thead>
								<tbody>
								<?php
								$i=1;
					//			$data = $this->db->get('tbl_booking')->result();
								
								  foreach($bookingList as $row) {
									  if($row->status == "CONFIRMED")
									  { 
								?>
								  <tr>
								  <td><?php echo $row->id;
								  //$i; ?></td>
								  <td><b><?php echo $row->booking_no; ?></b>
								  <?php
										$aa = $this->db->get_where('tbl_booking_product',array('booking_id'=>$row->id))->result();
										foreach($aa as $rowBooking)
										{
											$aa = $rowBooking->product_id;
											//echo "<br> P - ".sprintf('%03d',$aa).",";
										}
										?>
								  </td>
								  <?php
									$data1 = $this->db->get_where('user', array('user_id =' => $row->customer_id))->result();
									$listno = 0;
								
									foreach($data1 as $row1){
										?>
								  <td><!--[<?php //echo $row1->user_id; ?>]:--> <?php echo $row1->first_name . " " . $row1->last_name ; ?><br><b>email:</b> <?php echo $row1->email; ?>
								<?php        $listno++;
									}
								if ($listno == 0) {
								?>      
								  <td>Customer record (<?php echo $row->customer_id; ?>) not found!

								<?php        }
								?>      
								  </td>
								  <td><b>Arrival Date:</b> <?php echo date("d/m/Y",strtotime($row->checkin)); ?><br>
									<b>Departure Date:</b> <?php echo date("d/m/Y",strtotime($row->checkout)); ?>
								  </td>
								  <td><?php echo date("d/m/Y H:i:s",strtotime($row->created)); ?></td>
								  <!--td>
										<?php
										$aa = $this->db->get_where('tbl_booking_product',array('booking_id'=>$row->id))->result();
										foreach($aa as $rowBooking)
										{
											$aa = $rowBooking->product_id;
											//echo "P - ".sprintf('%03d',$aa).",";
										}
										?>
								  </td-->
								  <td><?php echo $row->grand_total; ?></td>
									<td>
									 <span class="label bg-pink"><?php echo $row->status; ?></span>
									
								</td>
								<td>
									<a class="btn btn-success" href="<?php echo base_url().'DCBooking/editStatus/'.$row->id . '/' . $row->dive_id; ?> ">Show Detail
								<?php 
								/* switch($row->status) {
								default:
									echo $row->status; 
								break;
								} */
								?></a>
								</td>
								  </tr>
								<?php   
									  }								
								$i++;    }
								?>      

								</tbody>
							</table>
						</div>
						
						<div class="tab-pane" id="basic-tab3">
							 <table class="table datatable-button-print-columns" id="dadadad">
								<thead>
								   <tr>

									 <th>SNO</th>
									 <th>Booking No</th>
									 <th>Book By</th>
									 <th>Travel Date</th>
									 <th>Booked On</th>
									 <!--th>Product Id</th-->
									 <th>Amount</th>
									 <th>Status</th>
									<th>Action</th>
								   </tr>
								</thead>
								<tbody>
								<?php
								$i=1;
					//			$data = $this->db->get('tbl_booking')->result();
								
								  foreach($bookingList as $row) {
									  if($row->status == "COMPLETED")
									  { 
								?>
								  <tr>
								  <td><?php echo $row->id;
								  //$i; ?></td>
								  <td><b><?php echo $row->booking_no; ?></b>
								  <?php
										$aa = $this->db->get_where('tbl_booking_product',array('booking_id'=>$row->id))->result();
										foreach($aa as $rowBooking)
										{
											$aa = $rowBooking->product_id;
											//echo "<br> P - ".sprintf('%03d',$aa).",";
										}
										?>
								  </td>
								  <?php
									$data1 = $this->db->get_where('user', array('user_id =' => $row->customer_id))->result();
									$listno = 0;
								
									foreach($data1 as $row1){
										?>
								  <td><!--[<?php //echo $row1->user_id; ?>]:--> <?php echo $row1->first_name . " " . $row1->last_name ; ?><br><b>email:</b> <?php echo $row1->email; ?>
								<?php        $listno++;
									}
								if ($listno == 0) {
								?>      
								  <td>Customer record (<?php echo $row->customer_id; ?>) not found!

								<?php        }
								?>      
								  </td>
								  <td><b>Arrival Date:</b> <?php echo date("d/m/Y",strtotime($row->checkin)); ?><br>
									<b>Departure Date:</b> <?php echo date("d/m/Y",strtotime($row->checkout)); ?>
								  </td>
								  <td><?php echo date("d/m/Y H:i:s",strtotime($row->created)); ?></td>
								  <!--td>
										<?php
										$aa = $this->db->get_where('tbl_booking_product',array('booking_id'=>$row->id))->result();
										foreach($aa as $rowBooking)
										{
											$aa = $rowBooking->product_id;
											//echo "P - ".sprintf('%03d',$aa).",";
										}
										?>
								  </td-->
								  <td><?php echo $row->grand_total; ?></td>
									<td>
									 <span class="label bg-pink"><?php echo $row->status; ?></span>
									
								</td>
								<td>
									<a class="btn btn-success" href="<?php echo base_url().'DCBooking/editStatus/'.$row->id . '/' . $row->dive_id; ?> ">Show Detail
								<?php 
								/* switch($row->status) {
								default:
									echo $row->status; 
								break;
								} */
								?></a>
								</td>
								  </tr>
								<?php   
									  }								
								$i++;    }
								?>      

								</tbody>
							</table>
						</div>
						
						<div class="tab-pane" id="basic-tab4">
							 <table class="table datatable-button-print-columns" id="dadadad">
								<thead>
								   <tr>

									 <th>SNO</th>
									 <th>Booking No</th>
									 <th>Book By</th>
									 <th>Travel Date</th>
									 <th>Booked On</th>
									 <!--th>Product Id</th-->
									 <th>Amount</th>
									 <th>Status</th>
									<th>Action</th>
								   </tr>
								</thead>
								<tbody>
								<?php
								$i=1;
					//			$data = $this->db->get('tbl_booking')->result();
								
								  foreach($bookingList as $row) {
									  if($row->status == "PENDING")
									  { 
								?>
								  <tr>
								  <td><?php echo $row->id;
								  //$i; ?></td>
								  <td><b><?php echo $row->booking_no; ?></b>
								  <?php
										$aa = $this->db->get_where('tbl_booking_product',array('booking_id'=>$row->id))->result();
										foreach($aa as $rowBooking)
										{
											$aa = $rowBooking->product_id;
											//echo "<br> P - ".sprintf('%03d',$aa).",";
										}
										?>
								  </td>
								  <?php
									$data1 = $this->db->get_where('user', array('user_id =' => $row->customer_id))->result();
									$listno = 0;
								
									foreach($data1 as $row1){
										?>
								  <td><!--[<?php //echo $row1->user_id; ?>]:--> <?php echo $row1->first_name . " " . $row1->last_name ; ?><br><b>email:</b> <?php echo $row1->email; ?>
								<?php        $listno++;
									}
								if ($listno == 0) {
								?>      
								  <td>Customer record (<?php echo $row->customer_id; ?>) not found!

								<?php        }
								?>      
								  </td>
								  <td><b>Arrival Date:</b> <?php echo date("d/m/Y",strtotime($row->checkin)); ?><br>
									<b>Departure Date:</b> <?php echo date("d/m/Y",strtotime($row->checkout)); ?>
								  </td>
								  <td><?php echo date("d/m/Y H:i:s",strtotime($row->created)); ?></td>
								  <!--td>
										<?php
										$aa = $this->db->get_where('tbl_booking_product',array('booking_id'=>$row->id))->result();
										foreach($aa as $rowBooking)
										{
											$aa = $rowBooking->product_id;
											//echo "P - ".sprintf('%03d',$aa).",";
										}
										?>
								  </td-->
								  <td><?php echo $row->grand_total; ?></td>
									<td>
									 <span class="label bg-pink"><?php echo $row->status; ?></span>
									
								</td>
								<td>
									<a class="btn btn-success" href="<?php echo base_url().'DCBooking/editStatus/'.$row->id . '/' . $row->dive_id; ?> ">Show Detail
								<?php 
								/* switch($row->status) {
								default:
									echo $row->status; 
								break;
								} */
								?></a>
								</td>
								  </tr>
								<?php   
									  }								
								$i++;    }
								?>      

								</tbody>
							</table>
						</div>
						
						<div class="tab-pane" id="basic-tab5">
							 <table class="table datatable-button-print-columns" id="dadadad">
								<thead>
								   <tr>

									 <th>SNO</th>
									 <th>Booking No</th>
									 <th>Book By</th>
									 <th>Travel Date</th>
									 <th>Booked On</th>
									 <!--th>Product Id</th-->
									 <th>Amount</th>
									 <th>Status</th>
									<th>Action</th>
								   </tr>
								</thead>
								<tbody>
								<?php
								$i=1;
					//			$data = $this->db->get('tbl_booking')->result();
								
								  foreach($bookingList as $row) {
									  if($row->status == "CANCELLED")
									  { 
								?>
								  <tr>
								  <td><?php echo $row->id;
								  //$i; ?></td>
								  <td><b><?php echo $row->booking_no; ?></b>
								  <?php
										$aa = $this->db->get_where('tbl_booking_product',array('booking_id'=>$row->id))->result();
										foreach($aa as $rowBooking)
										{
											$aa = $rowBooking->product_id;
											//echo "<br> P - ".sprintf('%03d',$aa).",";
										}
										?>
								  </td>
								  <?php
									$data1 = $this->db->get_where('user', array('user_id =' => $row->customer_id))->result();
									$listno = 0;
								
									foreach($data1 as $row1){
										?>
								  <td><!--[<?php //echo $row1->user_id; ?>]:--> <?php echo $row1->first_name . " " . $row1->last_name ; ?><br><b>email:</b> <?php echo $row1->email; ?>
								<?php        $listno++;
									}
								if ($listno == 0) {
								?>      
								  <td>Customer record (<?php echo $row->customer_id; ?>) not found!

								<?php        }
								?>      
								  </td>
								  <td><b>Arrival Date:</b> <?php echo date("d/m/Y",strtotime($row->checkin)); ?><br>
									<b>Departure Date:</b> <?php echo date("d/m/Y",strtotime($row->checkout)); ?>
								  </td>
								  <td><?php echo date("d/m/Y H:i:s",strtotime($row->created)); ?></td>
								  <!--td>
										<?php
										$aa = $this->db->get_where('tbl_booking_product',array('booking_id'=>$row->id))->result();
										foreach($aa as $rowBooking)
										{
											$aa = $rowBooking->product_id;
											//echo "P - ".sprintf('%03d',$aa).",";
										}
										?>
								  </td-->
								  <td><?php echo $row->grand_total; ?></td>
									<td>
									 <span class="label bg-pink"><?php echo $row->status; ?></span>
									
								</td>
								<td>
									<a class="btn btn-success" href="<?php echo base_url().'DCBooking/editStatus/'.$row->id . '/' . $row->dive_id; ?> ">Show Detail
								<?php 
								/* switch($row->status) {
								default:
									echo $row->status; 
								break;
								} */
								?></a>
								</td>
								  </tr>
								<?php   
									  }								
								$i++;    }
								?>      

								</tbody>
							</table>
						</div>
						
						
						<div class="tab-pane" id="basic-tab7">
							 <table class="table datatable-button-print-columns" id="dadadad">
								<thead>
								   <tr>

									 <th>SNO</th>
									 <th>Booking No</th>
									 <th>Book By</th>
									 <th>Travel Date</th>
									 <th>Booked On</th>
									 <!--th>Product Id</th-->
									 <th>Amount</th>
									 <th>Status</th>
									<th>Action</th>
								   </tr>
								</thead>
								<tbody>
								<?php
								$i=1;
					//			$data = $this->db->get('tbl_booking')->result();
								
								  foreach($bookingList as $row) {
									  if($row->status == "DECLINED")
									  { 
								?>
								  <tr>
								  <td><?php echo $row->id;
								  //$i; ?></td>
								  <td><b><?php echo $row->booking_no; ?></b>
								  <?php
										$aa = $this->db->get_where('tbl_booking_product',array('booking_id'=>$row->id))->result();
										foreach($aa as $rowBooking)
										{
											$aa = $rowBooking->product_id;
											//echo "<br> P - ".sprintf('%03d',$aa).",";
										}
										?>
								  </td>
								  <?php
									$data1 = $this->db->get_where('user', array('user_id =' => $row->customer_id))->result();
									$listno = 0;
								
									foreach($data1 as $row1){
										?>
								  <td><!--[<?php //echo $row1->user_id; ?>]:--> <?php echo $row1->first_name . " " . $row1->last_name ; ?><br><b>email:</b> <?php echo $row1->email; ?>
								<?php        $listno++;
									}
								if ($listno == 0) {
								?>      
								  <td>Customer record (<?php echo $row->customer_id; ?>) not found!

								<?php        }
								?>      
								  </td>
								  <td><b>Arrival Date:</b> <?php echo date("d/m/Y",strtotime($row->checkin)); ?><br>
									<b>Departure Date:</b> <?php echo date("d/m/Y",strtotime($row->checkout)); ?>
								  </td>
								  <td><?php echo date("d/m/Y H:i:s",strtotime($row->created)); ?></td>
								  <!--td>
										<?php
										$aa = $this->db->get_where('tbl_booking_product',array('booking_id'=>$row->id))->result();
										foreach($aa as $rowBooking)
										{
											$aa = $rowBooking->product_id;
											//echo "P - ".sprintf('%03d',$aa).",";
										}
										?>
								  </td-->
								  <td><?php echo $row->grand_total; ?></td>
									<td>
									 <span class="label bg-pink"><?php echo $row->status; ?></span>
									
								</td>
								<td>
									<a class="btn btn-success" href="<?php echo base_url().'DCBooking/editStatus/'.$row->id . '/' . $row->dive_id; ?> ">Show Detail
								<?php 
								/* switch($row->status) {
								default:
									echo $row->status; 
								break;
								} */
								?></a>
								</td>
								  </tr>
								<?php   
									  }								
								$i++;    }
								?>      

								</tbody>
							</table>
						</div>
						
					</div>
				</div>

			</div>	

      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
