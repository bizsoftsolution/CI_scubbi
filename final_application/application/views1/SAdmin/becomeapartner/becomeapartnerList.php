<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Become a Partner</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">Become a Partner</h2>
           <div style="text-align:right;">
              <!--a class="btn bg-purple" href="<?php echo  base_url();?>SAbecomeapartner/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
              <!--a href="<?php echo  base_url();?>SAslider" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a-->
           </div>
           <hr/>
        </div>
		<div class="panel-body">
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#basic-tab1" data-toggle="tab">Unapproved</a></li>
						<li><a href="#basic-tab2" data-toggle="tab">Approved</a></li>
						<li><a href="#basic-tab3" data-toggle="tab">Pending</a></li>
						<li><a href="#basic-tab4" data-toggle="tab">Declined</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="basic-tab1">
							 <table class="table datatable-button-print-columns">
								<thead>
								   <tr>

									 <th>Sno</th>
									 <th>Dive Center Name</th>
									 <th>Country/Island</th>
									 <th>Contact Person</th>
									 <th>Email Address</th>
									 <th>Phone No</th>
									 <th style="width:150px;">Action </th>

								   </tr>
								</thead>
								<tbody>
								<?php
								$i=1;
								  foreach($becomeapartnerList as $row) {
								?>
								  <tr>
								  <td><?php echo $i; ?></td>
								  <td><?php echo $row->dive_center_name; ?></td>
								  <td><?php echo $row->country_name; ?>/<?php echo $row->island_name; ?></td>
								  <td><?php echo $row->contact_person; ?></td>
								  <td><?php echo $row->email_address; ?></td>
								  <td><?php echo $row->phone_no; ?></td>
								 
								  <td style="text-align:right">
									<a href="<?php echo base_url(); ?>SAbecomeapartner/approvelData/<?php echo $row->id;?>" title="Approval" class="btn bg-success">Approval
									</a>
								  <!--a href="<?php echo base_url(); ?>SAbecomeapartner/editData/<?php echo $row->id;?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
								  </a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>SAbecomeapartner/deleteData/<?php echo $row->id;?>"  title="Delete" class="btn bg-danger remove" onclick="return confirm('Are You Sure to delete');"><i class="glyphicon glyphicon-remove "></i></a-->
								  </td>
								  </tr>
								  <?php $i++;}?>


								</tbody>
							 </table>
						</div>
						
						<div class="tab-pane" id="basic-tab2">
							  <table class="table datatable-button-print-columns">
								<thead>
								   <tr>

									 <th>Sno</th>
									 <th>Dive Center Name</th>
									 <th>Country/Island</th>
									 <th>Contact Person</th>
									 <th>Email Address</th>
									 <th>Phone No</th>
									<th style="width:150px;">Action </th>
								   </tr>
								</thead>
								<tbody>
								<?php
								$i=1;
									$this->db->select('b.*,c.country_name,i.island_name');
									$this->db->from('tbl_becomeapartner b');
									$this->db->join('tbl_country c','b.country = c.country_id','left');
									$this->db->join('tbl_island i','b.island = i.island_id','left');
									$this->db->where('status', 'APPROVED');
									$query = $this->db->get();
									$becomeapartnerList = $query->result();
								  foreach($becomeapartnerList as $row) {
								?>
								  <tr>
								  <td><?php echo $i; ?></td>
								  <td><?php echo $row->dive_center_name; ?></td>
								  <td><?php echo $row->country_name; ?>/<?php echo $row->island_name; ?></td>
								  <td><?php echo $row->contact_person; ?></td>
								  <td><?php echo $row->email_address; ?></td>
								  <td><?php echo $row->phone_no; ?></td>
								  <td style="text-align:right">
									<a href="<?php echo base_url(); ?>SAbecomeapartner/approvelData/<?php echo $row->id;?>" title="Approval" class="btn bg-success">Approval
									</a>
								  </td>
								  </tr>
								  <?php 
								  $i++;
								  }
								  ?>


								</tbody>
							 </table>
						</div>
						
						<div class="tab-pane" id="basic-tab3">
							  <table class="table datatable-button-print-columns">
								<thead>
								   <tr>

									 <th>Sno</th>
									 <th>Dive Center Name</th>
									 <th>Country/Island</th>
									 <th>Contact Person</th>
									 <th>Email Address</th>
									 <th>Phone No</th>
									<th style="width:150px;">Action </th>
								   </tr>
								</thead>
								<tbody>
								<?php
								$i=1;
									$this->db->select('b.*,c.country_name,i.island_name');
									$this->db->from('tbl_becomeapartner b');
									$this->db->join('tbl_country c','b.country = c.country_id','left');
									$this->db->join('tbl_island i','b.island = i.island_id','left');
									$this->db->where('status', 'PENDING');
									$query = $this->db->get();
									$becomeapartnerList = $query->result();
								  foreach($becomeapartnerList as $row) {
								?>
								  <tr>
								  <td><?php echo $i; ?></td>
								  <td><?php echo $row->dive_center_name; ?></td>
								  <td><?php echo $row->country_name; ?>/<?php echo $row->island_name; ?></td>
								  <td><?php echo $row->contact_person; ?></td>
								  <td><?php echo $row->email_address; ?></td>
								  <td><?php echo $row->phone_no; ?></td>
								  <td style="text-align:right">
									<a href="<?php echo base_url(); ?>SAbecomeapartner/approvelData/<?php echo $row->id;?>" title="Approval" class="btn bg-success">Approval
									</a>
								  </td>
								  </tr>
								  <?php $i++;}?>


								</tbody>
							 </table>
						</div>
						
						<div class="tab-pane" id="basic-tab4">
							  <table class="table datatable-button-print-columns">
								<thead>
								   <tr>

									 <th>Sno</th>
									 <th>Dive Center Name</th>
									 <th>Country/Island</th>
									 <th>Contact Person</th>
									 <th>Email Address</th>
									 <th>Phone No</th>
									<th style="width:150px;">Action </th>
								   </tr>
								</thead>
								<tbody>
								<?php
								$i=1;
									$this->db->select('b.*,c.country_name,i.island_name');
									$this->db->from('tbl_becomeapartner b');
									$this->db->join('tbl_country c','b.country = c.country_id','left');
									$this->db->join('tbl_island i','b.island = i.island_id','left');
									$this->db->where('status', 'DECLINED');
									$query = $this->db->get();
									$becomeapartnerList = $query->result();
								  foreach($becomeapartnerList as $row) {
								?>
								  <tr>
								  <td><?php echo $i; ?></td>
								  <td><?php echo $row->dive_center_name; ?></td>
								  <td><?php echo $row->country_name; ?>/<?php echo $row->island_name; ?></td>
								  <td><?php echo $row->contact_person; ?></td>
								  <td><?php echo $row->email_address; ?></td>
								  <td><?php echo $row->phone_no; ?></td>
								  <td style="text-align:right">
									<a href="<?php echo base_url(); ?>SAbecomeapartner/approvelData/<?php echo $row->id;?>" title="Approval" class="btn bg-success">Approval
									</a>
								  </td>
								  </tr>
								  <?php $i++;}?>


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