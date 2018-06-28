<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Dive Master Details</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Dive Master Details</h2>
            <div style="text-align:right;">
               <a class="btn bg-violet" href="<?php echo  base_url();?>DCprofile/addDivemaster"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>DCprofile/DCmasterList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
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
                  <strong>Success !!! </strong> Updated successfully
               </div>
               <?php } ?>
			    <?php foreach($divemasterdata as $row){?>
				<form method="POST" action="<?php echo  base_url();?>DCprofile/editDivemaster/<?php echo $row->id; ?>" class="form-horizontal form-validate-jquery" enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label col-md-3">Update Photo</label>
						<div class="col-md-4"><img src="<?php echo base_url(); ?>/upload/DCprofile/<?php echo $row->images; ?>" width="100px" height="100px"/></div>
						<div class="col-md-5">
						   <input type="file" name="edit_photo" class="form-control file-styled">
						</div>
					 </div>
					 <div style="text-align:center">
						 <input type="submit" name="submit_Divemaster_update_Image_data" value="Update" class="btn btn-success">
						 <input type="reset" value="Reset" class="btn btn-danger">
					  </div>
				</form>
				<hr>
               <form name="add"   method="POST" action="<?php echo  base_url();?>DCprofile/editDivemaster/<?php echo $row->id; ?>" class="form-horizontal form-validate-jquery">
                  <div class="form-body">
                     <div class="form-group">
						<label class="control-label col-md-3">Name</label>
						<div class="col-md-9">
						   <input type="text" name="name" class="form-control" value="<?php echo $row->name; ?>">
						</div>
					 </div>
					  <div class="form-group">
						<label class="control-label col-md-3">Position</label>
						<div class="col-md-9">
						   <input type="text" name="position" class="form-control" value="<?php echo $row->position; ?>">
						</div>
					 </div>
					<div class="form-group">
						<label class="control-label col-md-3">CERT Body</label>
						<div class="col-md-9">
							<select class="form-control" name="certbody">
<?php 
/*								<option value="<?php echo $row->cert_body; ?>"><?php echo $row->cert_body; ?></option> */
?>
								<option label=" - Select CERT Body - "></option>
								<option value="PADI" <?php if($row->cert_body=="PADI"){echo "selected";}?>>PADI</option>
							</select>
						</div>
					 </div>
					<div class="form-group">
						<label class="control-label col-md-3">ID No</label>
						<div class="col-md-9">
						   <input type="text" name="idno" class="form-control" value="<?php echo $row->id_no; ?>">
						</div>
					</div>
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="submit_Divemaster_update_data" value="Update" class="btn btn-success">
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
