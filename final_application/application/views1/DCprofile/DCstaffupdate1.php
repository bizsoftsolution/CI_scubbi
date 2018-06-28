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
                  <strong>Success !!! </strong> Updated successfully
               </div>
               <?php } ?>
			    <?php foreach($contactdept as $row){?>
               <form name="add"   method="POST" action="<?php echo  base_url();?>DCprofile/editstaff/<?php echo $row->id; ?>" class="form-horizontal form-validate-jquery">
                  <div class="form-body">
					<div class="form-group">
                        <label class="control-label col-md-3">Departments</label>
                        <div class="col-md-9">
							<select class="form-control" name="departments">
								<?php 
								$ivall = $row->dept_name;
								$data2=$this->db->get_where('tbl_department', array('id'=>$ivall))->result();
								foreach($data2 as $ival) {
								?>
								<option value="<?php echo $ival->id; ?>"><?php echo $ival->dept_name; ?></option>
								<?php } ?>
								<option label=" - Select Departments - "></option>
								<?php foreach($department as $row1) { ?>
								<option value="<?php echo $row1->id; ?>"><?php echo $row1->dept_name; ?></option>
								<?php } ?>
							</select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-3">Name</label>
                        <div class="col-md-9">
                           <input type="text" name="name" class="form-control" value="<?php echo $row->name; ?>">
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">Contact No</label>
                        <div class="col-md-9">
                           <input type="text" name="contactno" class="form-control" value="<?php echo $row->contact_no; ?>">
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">Email ID</label>
                        <div class="col-md-9">
                           <input type="email" name="email" class="form-control" value="<?php echo $row->email; ?>">
                        </div>
                     </div>
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="submit_update_data" value="Update" class="btn btn-success">
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
