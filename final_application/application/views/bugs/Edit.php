<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Bugs</a></li>
      <li class="active">Bugs</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Bugs Update</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>DCprofile/addDivemaster"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>Bugs/BugList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						
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
			    <?php foreach($getbugsData as $row){?>
				<form method="POST" action="<?php echo  base_url();?>Bugs/edit/<?php echo $row->bug_no; ?>" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label col-md-3">Update Image</label>
						<div class="col-md-4"><img src="<?php echo base_url(); ?>upload/bugs/<?php echo $row->bug_image; ?>" width="100px" height="100px"/></div>
						<div class="col-md-5">
						   <input type="file" name="edit_photo" class="form-control file-styled">
						   <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
						</div>
					 </div>
					 <div style="text-align:center">
						 <input type="submit" name="update_Image_data" value="Update" class="btn btn-success">
						 <input type="reset" value="Reset" class="btn btn-danger">
					  </div>
				</form>
				<hr>
				<form name="update" method="POST" action="<?php echo  base_url();?>Bugs/edit/<?php echo $row->bug_no; ?>" class="form-horizontal" enctype="multipart/form-data">
				  <div class="form-body">
					<div class="form-group">
						<label class="control-label col-md-3">Raised By</label>
						<div class="col-md-9">
						   <input type="text" name="raised_by" class="form-control" value="<?php echo $row->bug_raised_by; ?>">
						</div>
					 </div>
					  <div class="form-group">
						<label class="control-label col-md-3">Ref No</label>
						<div class="col-md-9">
						   <input type="text" name="refno" class="form-control" value="<?php echo $row->refno; ?>">
						</div>
					 </div>
					 <div class="form-group">
						<label class="control-label col-md-3">Name</label>
						<div class="col-md-9">
						   <input type="text" name="name" class="form-control" value="<?php echo $row->bug_name; ?>">
						</div>
					 </div>
					 <div class="form-group">
						<label class="col-lg-3 control-label">Description</label>
						<div class="col-lg-9">
							<textarea rows="5" cols="5" class="form-control" name="description" placeholder="Enter your message here">
								<?php echo $row->bug_description; ?>
							</textarea>
						</div>
					</div>
					 <div class="form-group">
						<label class="col-lg-3 control-label">Priority</label>
						<div class="col-lg-9">
							<select class="select" name="priority">
									<option value="<?php echo $row->bug_priority; ?>"> <?php echo $row->bug_priority; ?> </option>
									<option value=""> -- Select Priority -- </option>
									<option value="Low">Low</option>
									<option value="Medium">Medium</option>
									<option value="High">High</option>
							</select>
						</div>
					</div>
					
				  </div>
					 <div class="form-group">
						<label class="col-lg-3 control-label">Module</label>
						<div class="col-lg-9">
							<select class="select" name="module">
									<option value="<?php echo $row->bug_module; ?>"> <?php echo $row->bug_module; ?> </option>
									<option value=""> -- Select Module -- </option>
									<option value="Front End">Front End</option>
									<option value="Back End">Back End</option>
							</select>
						</div>
					</div>
	
				  <div style="text-align:center">
					 <input type="submit" name="Update_bug_data" value="Update" class="btn btn-success">
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
