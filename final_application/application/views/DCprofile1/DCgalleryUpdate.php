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
					<div class="panel panel-default">
						<div class="panel-heading">
							<h5 class="panel-title">Gallery</h5>
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
                  <strong>Success !!! </strong> Updated successfully
               </div>
               <?php } ?>
			    <?php foreach($getgalleryData as $row){?>
				<form method="POST" action="<?php echo  base_url();?>DCprofile/editGallery/<?php echo $row->id; ?>" class="form-horizontal form-validate-jquery" enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label col-md-3">Update Gallery</label>
						<div class="col-md-4"><img src="<?php echo base_url(); ?>/upload/DCprofile/gallery/<?php echo $row->gallery; ?>" width="100px" height="100px"/></div>
						<div class="col-md-5">
						   <input type="file" name="edit_gallery" class="form-control file-styled">
						   <span class="help-block" style="color:red;">Upload Resolution : 1024 * 768 only.</span>
						</div>
					 </div>
					 <div style="text-align:center">
						 <input type="submit" name="update_gallery_Image_data" value="Update" class="btn btn-success">
						 <input type="reset" value="Reset" class="btn btn-danger">
					  </div>
				</form>

				<!--CKeditor-->
				<?php 
				}
				?>
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
