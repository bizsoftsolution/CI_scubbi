<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Gallery</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Gallery</h2>
            <div style="text-align:right;">
               <a class="btn bg-violet" href="<?php echo  base_url();?>DCprofile/addGallery"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>DCprofile/DCgalleryList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
			<div class="row">
				<div class="col-md-12">
					<!-- Multiple buttons -->
					<div class="panel panel-default">
						<!--div class="panel-heading">
							<h5 class="panel-title">Gallery</h5>
							<!--div class="heading-elements">
								<div class="heading-btn">
									<button type="button" class="btn btn-info">Save</button>
									<button type="button" class="btn btn-default">Cancel</button>
								</div>
							</div->
						</div-->
						
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
								
							<form name="add"   method="POST" action="<?php echo  base_url();?>DCprofile/addGallery" class="form-horizontal form-validate-jquery" enctype="multipart/form-data">
															<!--div class="form-group">
									<label class="col-lg-2 control-label text-semibold">AJAX upload:</label>
									<div class="col-lg-10">
										<input type="file" class="file-input-ajax" multiple="multiple">
										<span class="help-block">This scenario uses asynchronous/parallel uploads. Uploading itself is turned off in live preview.</span>
									</div>
								</div-->
								<div class="form-group">
									<label class="control-label col-md-3">Gallery</label>
									<div class="col-md-9">
									   <input type="file" name="gallery" class="form-control file-styled" data-popup="tooltip" title="Select File(It is required field)" data-placement="bottom">
									   <span class="help-block" style="color:red;">Upload Resolution : 1024 * 768 only.</span>
									</div>
								 </div>
								
								<div style="text-align:center">
									<input type="submit" name="submit_gallery_data" value="Add" class="btn btn-success">
									<input type="reset" value="Reset" class="btn btn-danger">
								</div>
								<br><br>
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
