<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Staff Details</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Staff Details</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>Package/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>DCprofile/DCstaffList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h5 class="panel-title">Adminstration Staff Details</h5>
							<!--div class="heading-elements">
								<div class="heading-btn">
									<a href="<?php echo  base_url();?>DCprofile/addDept" class="btn btn-info">Add Department</a>
								</div>
							</div-->
						</div>
						
						<div class="panel-body1">
							
            <div class="col-md-12">
               <br>
               <br>
               <?php if($message == "FAILED") { ?>
               <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Action Failed !!! </strong>
               </div>
               <?php } else if($message == "SUCCESS") {  ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success !!! </strong> New Social Links Created successfully
               </div>
               <?php } ?>
               <form name="add"   method="POST" action="<?php echo  base_url();?>DCprofile/addStaff" class="form-horizontal form-validate-jquery1">
                  <div class="form-body">
					<div class="form-group">
                        <label class="control-label col-md-3">Departments</label>
                        <div class="col-md-9">
							<select class="form-control" name="departments" data-popup="tooltip" title="Departments(It is required field)" data-placement="bottom">
								<option label=" - Select Departments - "></option>
								<?php 
									$default = $this->db->get_where('tbl_department', array('user_id' => '0'))->result();
									foreach($default as $drow)
									{
										?>
									<option value="<?php echo $drow->id; ?>"><?php echo $drow->dept_name; ?></option>
										<?php
									}
								?>
								<?php foreach($department as $val) { ?>
								<option value="<?php echo $val->id; ?>"><?php echo $val->dept_name; ?></option>
								<?php } ?>
							</select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-3">Name</label>
                        <div class="col-md-9">
                           <input type="text" name="name" class="form-control" data-popup="tooltip" title="Name(It is required field)" data-placement="bottom">
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">Contact No</label>
                        <div class="col-md-9">
                           <input type="text" name="contactno" class="form-control" data-popup="tooltip" title="Contact No(It is required field)" data-placement="bottom">
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">Email ID</label>
                        <div class="col-md-9">
                           <input type="email" name="email" class="form-control" data-popup="tooltip" title="Email ID(It is required field)" data-placement="bottom">
                        </div>
                     </div>
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="submit_contact_data" value="Add" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
				<!--CKeditor-->
				
               <br><br><br>
            </div>
						</div>
					</div>
				</div>
				
			</div>
            
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
