<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">User List</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">User List</h2>

					<ul class="nav nav-tabs nav-tabs-bottom bottom-divided">
						<li <?php echo ($utype=='Customer' ? 'class="active"' : '') ?>><a href="<?php echo base_url(); ?>SAbecomeapartner/userDetails/Customer">Customers</a></li>
						<li <?php echo ($utype=='DCAdmin' ? 'class="active"' : '') ?>><a href="<?php echo base_url(); ?>SAbecomeapartner/userDetails/DCAdmin">Dive Centers</a></li>
						<li <?php echo ($utype=='Admin' ? 'class="active"' : '') ?>><a href="<?php echo base_url(); ?>SAbecomeapartner/userDetails/Admin">Admins</a></li>
					</ul>
           <div style="text-align:right;">
              <!--a class="btn bg-purple" href="<?php echo  base_url();?>SAbecomeapartner/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
              <!--a href="<?php echo  base_url();?>SAslider" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a-->
           </div>
           <hr/>
        </div>
		<div class="panel-body">
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#basic-tab1" data-toggle="tab">Reinstate</a></li>
						<li><a href="#basic-tab2" data-toggle="tab">Suspend</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="basic-tab1">
							 <table class="table datatable-button-print-columns">
							<thead>
							   <tr>

								 <th>Sno</th>
								 <th>User Type</th>
								 <th>User Name</th>
								 <th>Last login</th>
								<th>Suspend</th>
								<th>View</th>
							   </tr>
							</thead>
							<tbody>
							<?php
							$i=1;
							switch ($utype){
							case 'Admin':
							$this->db->where_in('user_type',array('CUSTOM'));
							break;
							case 'DCAdmin':
							$this->db->where('user_type','DCADMIN');
							break;
							default:
							$this->db->where('user_type','Customer');
							

							break;
							}
							$data = $this->db->get_where('user', array('status'=>"OPEN"))->result();
							
							  foreach($data as $row) {
							?>
							  <tr>
							  <td><?php echo $i; ?></td>
							  <td><?php echo $row->user_type; ?></td>
							  <?php 
							  
								$fetchRow = $this->db->get_where('tbl_customerprofile',array('user_id'=>$row->user_id))->row();							  
							  ?>
								<td>
									<?php echo $row->email; ?><?php echo ($row->user_type == 'DCADMIN' ? "<br>Pwd: " . $row->password : "") ?><?php echo " ( ".$row->first_name ;if($row->user_type == 'Customer'){ echo " - ".$fetchRow->state." )" ; }else { echo ")"; } ?>
								</td>								
								<td>
									<?php echo $row->last_login; ?>
								</td>								
								<td>
									<a href="<?php echo base_url(); ?>SAbecomeapartner/suspend/<?php echo $row->user_id;?>"  title="Suspend" class="btn bg-danger remove" onclick="return confirm('Are You Sure want to Suspend');"><i class="fa fa-unlink "></i>&nbsp;&nbsp;&nbsp;Suspend</a>
								</td>
								<td>
									<?php 
									if($utype == 'DCAdmin')
									{
									?>
										<a class="btn btn-primary" href="<?php echo base_url().'SAbecomeapartner/DCview/'.$row->user_id; ?>"><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;Profile</a>
									<?php
									}
									else if($utype == 'Admin')
									{
									?>
										<a class="btn btn-primary" href="<?php echo base_url().'SAbecomeapartner/Adminview/'.$row->emp_no; ?>"><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;Profile</a>
									<?php
									}
									else
									{
									?>
										<a class="btn btn-primary" href="<?php echo base_url().'SAbecomeapartner/Customerview/'.$row->user_id; ?>"><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;Profile</a>
									<?php
									}
									?>
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
								 <th>User Type</th>
								 <th>User Name</th>
								 <th>Last login</th>
								<th>Reinstate</th>
								<th>View</th>
							   </tr>
							</thead>
							<tbody>
							<?php
							$i=1;
							switch ($utype){
							case 'Admin':
							$this->db->where_in('user_type',array('CUSTOM'));
							break;
							case 'DCAdmin':
							$this->db->where('user_type','DCADMIN');
							break;
							default:
							$this->db->where('user_type','Customer');
							
							break;
							}
							$data = $this->db->get_where('user', array('status'=>"SUSPEND"))->result();
							
							  foreach($data as $row) {
							?>
							  <tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $row->user_type; ?></td>

								<?php 
								$fetchRow = $this->db->get_where('tbl_customerprofile',array('user_id'=>$row->user_id))->row();

								?>
								<td>
									<?php echo $row->email; ?><?php echo ($row->user_type == 'DCADMIN' ? "<br>Pwd: " . $row->password : "") ?><?php echo " ( ".$row->first_name ;if($row->user_type == 'Customer'){ echo " - ".$fetchRow->state." )" ; }else { echo ")"; } ?>
								</td>
								<td>
									<?php echo $row->last_login; ?>
								</td>
								<td>
									<a href="<?php echo base_url(); ?>SAbecomeapartner/Reinstate/<?php echo $row->user_id;?>"  title="Reinstate" class="btn bg-success remove" onclick="return confirm('Are You Sure want to Reinstate');"><i class="fa fa-link"></i>&nbsp;&nbsp;&nbsp;Reinstate</a>
								</td>
								<td>
									<?php 
									if($utype == 'DCAdmin')
									{
									?>
										<a class="btn btn-primary" href="<?php echo base_url().'SAbecomeapartner/DCview/'.$row->user_id; ?>"><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;Profile</a>
									<?php
									}
									else if($utype == 'Admin')
									{
									?>
										<a class="btn btn-primary" href="<?php echo base_url().'SAbecomeapartner/Adminview/'.$row->emp_no; ?>"><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;Profile</a>
									<?php
									}
									else
									{
									?>
										<a class="btn btn-primary" href="<?php echo base_url().'SAbecomeapartner/Customerview/'.$row->user_id; ?>"><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;Profile</a>
									<?php
									}
									?>
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
