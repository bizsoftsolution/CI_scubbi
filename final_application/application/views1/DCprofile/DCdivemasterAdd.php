<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Contact</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Contacts</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>Package/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>DCprofile/DCmasterList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
			<div class="row">
				<div class="col-md-12">
					<!-- Multiple buttons -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h5 class="panel-title">Dive Master & Instructor Details</h5>
							<!--div class="heading-elements">
								<div class="heading-btn">
									<button type="button" class="btn btn-info">Save</button>
									<button type="button" class="btn btn-default">Cancel</button>
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
								  <strong>Success !!! </strong> New Data Created successfully
							   </div>
								<?php } ?>
								
							<form name="add"   method="POST" action="<?php echo  base_url();?>DCprofile/addDivemaster" class="form-horizontal form-validate-jquery1">
								<div class="form-group">
									<label class="control-label col-md-3">Photo</label>
									<div class="col-md-9">
									   <input type="file" name="profile_photo" class="form-control file-styled" data-popup="tooltip" title="Select File(It is required field)" data-placement="bottom">
									</div>
								 </div>
								<div class="form-group">
									<label class="control-label col-md-3">Name</label>
									<div class="col-md-9">
									   <input type="text" name="name" class="form-control" data-popup="tooltip" title="Name(It is required field)" data-placement="bottom">
									</div>
								 </div>
								  <div class="form-group">
									<label class="control-label col-md-3">Position</label>
									<div class="col-md-9">
									   <input type="text" name="position" class="form-control" data-popup="tooltip" title="Position(It is required field)" data-placement="bottom">
									</div>
								 </div>
								<div class="form-group">
									<label class="control-label col-md-3">CERT Body</label>
									<div class="col-md-9">
										<select class="form-control" name="certbody" data-popup="tooltip" title="CERT Body(It is required field)" data-placement="bottom">
											<option label=" - Select CERT Body - "></option>
											<option value="PADI">PADI</option>
											<option value="SSI">SSI</option>
											<option value="SDI">SDI</option>
											<option value="HEPCA">HEPCA</option>
											<option value="ANDI">ANDI</option>
											<option value="BIS">BIS</option>
											<option value="NAUI">NAUI</option>
											<option value="TDI">TDI</option>
										</select>
									</div>
								 </div>
								<div class="form-group">
									<label class="control-label col-md-3">ID No</label>
									<div class="col-md-9">
									   <input type="text" name="idno" class="form-control" data-popup="tooltip" title="ID No(It is required field)" data-placement="bottom">
									</div>
								</div>
								<div style="text-align:center">
									<input type="submit" name="submit_dive_master_data" value="Add" class="btn btn-success">
									<input type="reset" value="Reset" class="btn btn-danger">
								</div><br><br>
							</form>
							</div>
						</div>
					</div>
					<!-- /multiple button -->
				</div>
				
			</div>
            
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
