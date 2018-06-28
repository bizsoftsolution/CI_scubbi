<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Privilege</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Privilege</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>island/newIsland"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <!--a href="<?php echo  base_url();?>Privilege/employeeList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a-->
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
            <div class="col-md-2"></div>
            <div class="col-md-8">
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
                  <strong>Success !!! </strong> New Module Created successfully
               </div>
               <?php } ?>
               <form name="add"   method="POST" action="<?php echo  base_url();?>Privilege/privilegeData" class="form-horizontal form-validate-jquery">
                  <div class="form-body">
                     <div class="form-group">
                        <label class="control-label col-md-3"><b>Employee</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <select class="form-control" name="employee_id" required>
                              <option value="">--Select Employee--</option>
                              <?php
							  $data7 = $this->db->get("tbl_semployee")->result();
                              foreach ($data7 as $data7_row) {
                                 ?>
                                 <option value="<?php echo $data7_row->id;?>"><?php echo $data7_row->name ;?></option>
                              <?php
                              }
                              ?>
                           </select>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Module</b></label>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="Country/countryList" >Country Details</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SAtellmemore" >Tell Me More</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="Island/islandList" >Island Details</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="DCleisure/Keywordlist" >Product Keywords</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SAppd" >Popular Diving Destinations</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SAdivepoint" >Dive Points</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SAleisure/SAleisuredashboard" >Leisure Dive</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SAcourses/SAcoursesdashboard" >Courses & Specialties</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SAReports/salesReportsList" >Sales Report</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SAReports/cancelReportsList" >Cancel Report</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SAReports/visitList" >Visit Report</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SAReports/daterangeList" >Date Range Report</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="DCprofile/DCgalleryList" >Gallery</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SAslider" >Slider Details</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SABooking/bookingList" >Dive Center Booking Details</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SAbecomeapartner" >Become a Partner</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SAbecomeapartner/userDetails/Customer" >User Details</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="SAbecomeapartner/diveCenterDetails" >Dive Center Details</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="Subscribe" >Subscriber Details</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="module[]" value="promo_code" >Promo Code</label>
								</div>
								
								
							</div>
						</div>
					</div>
                    
					 
                     
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="submit" value="Add" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>

               <br><br>
            </div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
