<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Policies List</li>
   </ul>
</div>
<br>

<div class="row">
   <div class="col-md-12">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Dashboard</h2>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<!-- <li><a data-action="close"></a></li> -->
				</ul>
			</div>
		</div>

		<div class="panel-body">
			<div class="tabbable">
				<ul class="nav nav-tabs nav-tabs-highlight">
					<li class="active"><a href="<?php echo base_url(); ?>DCpolicies/DCpoliciesdashboardlist" >Dashboard</a></li>
					<li ><a href="<?php echo base_url(); ?>DCpolicies/DCpolicieslist" >Booking Policies</a></li>
					<li ><a href="<?php echo base_url(); ?>DCpolicies/DCcancelpolicieslist" >Cancellation Policies</a></li>
				</ul>

				<div class="tab-content">
					<div class="active">
      <!-- Traffic sources -->
			<!--div class="row">
				<!--div class="col-md-6">
					<ul class="nav nav-tabs nav-tabs-bottom bottom-divided">
						<li class="active"><a href="<?php echo base_url(); ?>DCprofile/DCstaffList">Administration Staff</a></li>
						<li><a href="<?php echo base_url(); ?>DCprofile/DCmasterList">Dive Master & Instructor Details</a></li>
					</ul>
				</div->
				<div class="col-md-12">
					<div style="text-align:right;">
					  <a class="btn bg-purple" href="<?php echo  base_url();?>DCleisure/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
              <a href="<?php echo  base_url();?>DCleisure/DCleisurelist" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
				   </div>
				</div>
			</div-->
			
          
        <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                <th>ID</th>
                <th>Product Name</th>
                <!--th>Product Descriptions</th-->
                <th>Product Type</th>
				<th>Booking Policy</th>
				<th>Cancellation Policy</th>
                <th>Action </th>

               </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
              //foreach($DCleisuredashboard as $row) {
              $usrid = $this->session->userdata('user_id');
				$sql = "SELECT 'Cancellation' tab,`id`,`cancellation_name` pname,`cancellation_period` period FROM `tbl_cancellation_policies` 
					union
					SELECT 'Booking' tab,`id`,`booking_name` pname,`booking_period` period FROM `tbl_booking_policies` ";
				$sql = "
				SELECT id, 'leisure' tab, product_name, product_description, product_category, (select booking_name from tbl_booking_policies ab where ab.id = a.booking_policy) booking, (select cancellation_name from tbl_cancellation_policies ac where ac.id = a.cancellation_policy) cancellation, user_id FROM `tbl_dcleisure` a WHERE status = 'ENABLE' and user_id = '$usrid'
				union
				SELECT id, 'courses' tab, product_name, product_description, product_category, (select booking_name from tbl_booking_policies bb where bb.id = b.booking_policy) booking,  (select cancellation_name from tbl_cancellation_policies bc where bc.id = b.cancellation_policy) cancellation, user_id FROM `tbl_dccourses` b WHERE status = 'ENABLE' and user_id = '$usrid'
				union
				SELECT id, 'package' tab, product_name, product_description, product_category, (select booking_name from tbl_booking_policies cb where cb.id = c.booking_policy) booking,  (select cancellation_name from tbl_cancellation_policies cc where cc.id = c.cancellation_policy) cancellation, user_id FROM `tbl_dcpackage` c WHERE user_id = '$usrid'
				union
				SELECT id, 'guided' tab, product_name, product_description, product_category, (select booking_name from tbl_booking_policies db where db.id = d.booking_policy) booking,  (select cancellation_name from tbl_cancellation_policies dc where dc.id = d.cancellation_policy) cancellation, user_id FROM `tbl_dcguidedtours` d WHERE user_id = '$usrid'";
				$q = $this->db->query($sql);
				$res = $q->result_array();
              	foreach($res as $row) {

            ?>
              <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $row['product_name'] ?></td>
              <!--td><?php //echo $row['product_description'] ?></td-->
              <td><?php echo $row['product_category'] ?></td>
              <td><?php echo (is_null($row['booking']) ? "N/A" : $row['booking']) ?></td>
              <td><?php echo (is_null($row['cancellation']) ? "N/A" : $row['cancellation']) ?></td>
              <td style="text-align:right;width:250px;">
              <?php switch ($row['tab']) { 
              case "leisure":?>
              <a href="<?php echo base_url(); ?>DCpolicies/assignpolicy/A<?php echo $row['id'] ?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>
			  <a href="<?php echo base_url(); ?>DCpolicies/deletepolicy/A<?php echo $row['id'] ?>" title="Delete" class="btn bg-danger"><i class="glyphicon glyphicon-remove " onclick="return confirm('Are You Sure want to Delete');"></i>
              </a>
              <?php break;
              case "courses": ?>
              <a href="<?php echo base_url(); ?>DCpolicies/assignpolicy/B<?php echo $row['id'] ?>" title="Edit" class="btn bg-success" ><i class="glyphicon glyphicon-pencil "></i>
              </a>
			  <a href="<?php echo base_url(); ?>DCpolicies/deletepolicy/B<?php echo $row['id'] ?>" title="Delete" class="btn bg-danger" onclick="return confirm('Are You Sure want to Delete');"><i class="glyphicon glyphicon-remove "></i>
              </a>
              <?php break;
              case "package": ?>
              <a href="<?php echo base_url(); ?>DCpolicies/assignpolicy/C<?php echo $row['id'] ?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>
			   <a href="<?php echo base_url(); ?>DCpolicies/deletepolicy/C<?php echo $row['id'] ?>" title="Delete" class="btn bg-danger" onclick="return confirm('Are You Sure want to Delete');"><i class="glyphicon glyphicon-remove "></i>
              </a>
              <?php break;
              case "guided": ?>
              <a href="<?php echo base_url(); ?>DCpolicies/assignpolicy/D<?php echo $row['id'] ?>" title="Edit" class="btn bg-success"><i class="glyphicon glyphicon-pencil "></i>
              </a>
			  <a href="<?php echo base_url(); ?>DCpolicies/deletepolicy/D<?php echo $row['id'] ?>" title="Delete" class="btn bg-danger" onclick="return confirm('Are You Sure want to Delete');"><i class="glyphicon glyphicon-remove "></i>
              </a>
              <?php } ?>

              </td>
              </tr>
              <?php $i++;}?>
            </tbody>
         </table>
      <!-- /traffic sources -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /dashboard content -->


<!-- /dashboard content -->
