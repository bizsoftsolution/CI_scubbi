<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Department</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Department</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>Package/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>DCprofile/deptList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<!--div class="panel-heading">
							<h5 class="panel-title">Adminstration Staff Details</h5>
							<div class="heading-elements">
								<div class="heading-btn">
									<a href="<?php echo  base_url();?>DCprofile/addDept" class="btn btn-info">Add Department</a>
								</div>
							</div>
						</div-->
						
						<div class="panel-body1">
							<div class="col-md-6">
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
								  <strong>Success !!! </strong> New data Created successfully
							   </div>
							   <?php } ?>
							   <form name="add"   method="POST" action="<?php echo  base_url();?>DCprofile/addDept" class="form-horizontal form-validate-jquery1">
								  <div class="form-body">
									 <div class="form-group">
										<label class="control-label col-md-4">Department Name</label>
										<div class="col-md-8">
										   <input type="text" name="name" class="form-control" data-popup="tooltip" title="Department Name(It is required field)" data-placement="bottom">
										</div>
									 </div>

								  </div>

								  <div style="text-align:center">
									 <input type="submit" name="submit_department" value="Add" class="btn btn-success">
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
