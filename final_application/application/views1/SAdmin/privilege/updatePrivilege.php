<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
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
            <h2 class="panel-title">Privilege Details</h2>
            <div style="text-align:right;">
               <a class="btn bg-violet" href="<?php echo  base_url();?>Privilege/privilegeData"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>Privilege/privilegeList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
            <div class="col-md-2"></div>
            <div class="col-md-8">
               <br>
               <?php if($message == "FAILED") { ?>
               <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Action Failed !!! </strong>
               </div>
               <?php } else if($message == "SUCCESS") {  ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success !!! </strong> New Privilege Created successfully
               </div>
               <?php } ?>
               <?php foreach($privilege as $row){?>
               <form name="add"   method="POST" action="<?php echo  base_url();?>Privilege/editPrivilege/<?php echo $row->id;?>" class="form-horizontal">

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
                                 <option value="<?php echo $data7_row->id;?>" <?php if($data7_row->id==$row->emp_id){echo "selected";}?>><?php echo $data7_row->name ;?></option>
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
								<?php
									$mod_exp = explode(",", trim($row->module, ','));
									/* foreach ($mod_exp as $data5_row) 
									{ */
                                ?>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="Country/countryList" <?php if(in_array( "Country/countryList",$mod_exp)){echo "checked";}?>>Country Details
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SAtellmemore" <?php if(in_array( "SAtellmemore",$mod_exp)){echo "checked";}?>>Tell Me More
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="Island/islandList" <?php if(in_array( "Island/islandList",$mod_exp)){echo "checked";}?>>Island Details
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="DCleisure/Keywordlist" <?php if(in_array( "DCleisure/Keywordlist",$mod_exp)){echo "checked";}?>>Product Keywords
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SAppd" <?php if(in_array( "SAppd",$mod_exp)){echo "checked";}?>>Popular Diving Destinations
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SAdivepoint" <?php if(in_array( "SAdivepoint",$mod_exp)){echo "checked";}?>>Dive Points
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SAleisure/SAleisuredashboard" <?php if(in_array( "SAleisure/SAleisuredashboard",$mod_exp)){echo "checked";}?>>Leisure Dive
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SAcourses/SAcoursesdashboard" <?php if(in_array( "SAcourses/SAcoursesdashboard",$mod_exp)){echo "checked";}?>>Courses & Specialties
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SAReports/salesReportsList" <?php if(in_array( "SAReports/salesReportsList",$mod_exp)){echo "checked";}?>>Sales Report
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SAReports/cancelReportsList" <?php if(in_array( "SAReports/cancelReportsList",$mod_exp)){echo "checked";}?>>Cancel Report
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SAReports/visitList" <?php if(in_array( "SAReports/visitList",$mod_exp)){echo "checked";}?>>Visit Report
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SAReports/daterangeList" <?php if(in_array( "SAReports/daterangeList",$mod_exp)){echo "checked";}?>>Date Range Report
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="DCprofile/DCgalleryList" <?php if(in_array( "DCprofile/DCgalleryList",$mod_exp)){echo "checked";}?>>Gallery
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SAslider" <?php if(in_array( "SAslider",$mod_exp)){echo "checked";}?>>Slider Details
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SABooking/bookingList" <?php if(in_array( "SABooking/bookingList",$mod_exp)){echo "checked";}?>>Dive Center Booking Details
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SAbecomeapartner" <?php if(in_array( "SAbecomeapartner",$mod_exp)){echo "checked";}?>>Become a Partner
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SAbecomeapartner/userDetails/Customer" <?php if(in_array( "SAbecomeapartner/userDetails/Customer",$mod_exp)){echo "checked";}?>>User Details
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="SAbecomeapartner/diveCenterDetails" <?php if(in_array( "SAbecomeapartner/diveCenterDetails",$mod_exp)){echo "checked";}?>>Dive Center Details
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="Subscribe" <?php if(in_array( "Subscribe",$mod_exp)){echo "checked";}?>>Subscriber Details
									</label>
								</div>
								<div class="col-md-12">
									<label class="checkbox-inline">
                                        <input type="checkbox" class="styled" name="module[]" value="promo_code" <?php if(in_array( "promo_code",$mod_exp)){echo "checked";}?>>Promo Code
									</label>
								</div>
								<?php
									//}
								?>
								
								
							</div>
						</div>
					</div>
					 
					 
                    
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="submit" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
               <?php } ?>
               <br><br>
            </div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
   