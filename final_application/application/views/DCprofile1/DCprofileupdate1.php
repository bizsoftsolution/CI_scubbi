<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Dive Center Profile</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Dive Center Profile</h2>
           
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
			<div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
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
               <?php foreach($getEditdata as $row){?>
			   <h3 style="color: #e91e63;font-weight: bold;">Update Image</h3>
			   <hr>
               <form name="add"   method="POST" action="<?php echo  base_url();?>DCprofile/addNew" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-body">
					 <div class="form-group">
                        <label class="control-label col-md-4">Display Image</label>
						<div class="col-md-3">
						<img src="<?php echo base_url(); ?>upload/DCprofile/<?php echo $row->dcimage; ?>" class="img-responsive" style="width:180px; height:100px;">
						 <input name="file" class="form-control" type="file">
						 <input type="submit" name="update_dcprofile_image" value="Update" class="btn btn-success">
						</div>
                     </div>
				  </div>
				</form>	
				<hr>
				<h3 style="color: #2196f3;font-weight: bold;">Update Contents</h3>
				<hr>
				<form name="add"   method="POST" action="<?php echo  base_url();?>DCprofile/addNew" 
				class="form-horizontal">
                  <div class="form-body">
					 <div class="form-group">
                        <label class="control-label col-md-3">Dive Center Name</label>
                        <div class="col-md-9">
                           <input name="name" class="form-control" type="text" value="<?php echo $row->dcname; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
						<div class="row">
							<div class="col-md-7">
								<label class="control-label col-md-5"><b>Country</b></label>
								<div class="col-md-7">
									<select class="selectboxit selectbox-bootstrap btn-warning enabled btn legitRipple form-control" name="edit_dive_center_country" id="scountry">
										<?php 
										$isp = $row->dccountry;
										$isp_result=$this->db->get_where('tbl_country', array('country_id'=>$isp))->result();
										foreach($isp_result as $isprow)
										{
										?>
										<option value="<?php echo $isprow->country_id; ?>"><?php echo $isprow->country_name; ?></option>
										<?php
										}
										?>
										<option value="">--------------------------------------------------------------------</option>
										<option label="Select Country"> </option>
										<option value="">--------------------------------------------------------------------</option>
										<?php 
											$S_island=$this->db->get('tbl_country')->result_array();
											foreach ($S_island as $si) 
											{
												?>
										   <option value="<?php echo $si['country_id'];?>"><?php echo $si['country_name'];?></option> 
										   <?php
											}
										?>
									</select>
								   <span class="help-block"></span>
								</div>
							</div>
							<div class="col-md-5">
								<label class="control-label col-md-4"><b>Island</b></label>
								<div class="col-md-8">
									<select class="selectboxit selectbox-bootstrap btn-warning enabled btn legitRipple form-control" name="edit_dive_center_island" id="islands">
										<?php 
										$iep = $row->dcislands;
										$iep_result=$this->db->get_where('tbl_island', array('island_id'=>$iep))->result();
										foreach($iep_result as $ieprow)
										{
										?>
										<option value="<?php echo $ieprow->island_id; ?>"><?php echo $ieprow->island_name; ?></option>
										<?php
										}
										?>
										<option value="">--------------------------------------------------------------------</option>
										<option label="Select Island"></option>
										<option value="">--------------------------------------------------------------------</option>
										
									</select>
								   <span class="help-block"></span>
								</div>
							</div>
						</div>                      
                     </div>
					 
					  <div class="form-group">
                        <label class="control-label col-md-3"><b>GPS COORDINATES</b></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<input name="gpsx" class="form-control" type="text" value="<?php echo $row->dcgps_x; ?>">
									<span class="help-block"></span>
								</div>
								<div class="col-md-6">
									 <input name="gpsy" class="form-control" type="text" value="<?php echo $row->dcgps_y; ?>">
									<span class="help-block"></span>
								</div>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Registered Company Name</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <input name="rcname" class="form-control" type="text" value="<?php echo $row->dcreg_co_name; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  <div class="form-group">
						<div class="row">
							<div class="col-md-7">
								<label class="control-label col-md-5"><b>Business Registration NO</b> <strong style="color:red;">*</strong></label>
								<div class="col-md-7">
								   <input name="brnumber" class="form-control" type="text" value="<?php echo $row->dcbusiness_reg_no; ?>">
								   <span class="help-block"></span>
								</div>
							</div>
							<div class="col-md-5">
								<label class="control-label col-md-5"><b>Telephone NO</b></label>
								<div class="col-md-7">
								   <input name="tpnumber" class="form-control" type="text" value="<?php echo $row->dcbusi_telephone_no; ?>">
								   <span class="help-block"></span>
								</div>
							</div>
						</div>                      
                     </div>
					 <div class="form-group">
						<div class="row">
							<div class="col-md-7">
								<label class="control-label col-md-5"><b>Billing Address</b> <strong style="color:red;">*</strong></label>
								<div class="col-md-7">
								   <input name="baddress" class="form-control" type="text" value="<?php echo $row->dcbilling_address; ?>">
								   <span class="help-block"></span>
								</div>
							</div>
							<div class="col-md-5">
								<label class="control-label col-md-5"><b>FAX NO</b></label>
								<div class="col-md-7">
								   <input name="faxnumber" class="form-control" type="text" value="<?php echo $row->dcbusi_fax_no; ?>">
								   <span class="help-block"></span>
								</div>
							</div>
						</div>                      
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Dive Center Address</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
						   <textarea name="dcaddress" class="form-control"><?php echo $row->dcaddress; ?></textarea>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
						<div class="row">
							<div class="col-md-7">
								<label class="control-label col-md-5"><b>Telephone NO</b> <strong style="color:red;">*</strong></label>
								<div class="col-md-7">
								   <input name="dctpnumber" class="form-control" type="text" value="<?php echo $row->dctelephone_no; ?>">
								   <span class="help-block"></span>
								</div>
							</div>
							<div class="col-md-5">
								<label class="control-label col-md-5"><b>FAX NO</b></label>
								<div class="col-md-7">
								   <input name="dcfaxnumber" class="form-control" type="text" value="<?php echo $row->dcfax_no; ?>">
								   <span class="help-block"></span>
								</div>
							</div>
						</div>                      
                     </div>
					 <div class="form-group">
						<div class="row">
							<div class="col-md-7">
								<label class="control-label col-md-5"><b>Email ID</b> <strong style="color:red;">*</strong></label>
								<div class="col-md-7">
								   <input name="emailid" class="form-control" type="email" value="<?php echo $row->dcemailid; ?>">
								   <span class="help-block"></span>
								</div>
							</div>
							<div class="col-md-5">
								<label class="control-label col-md-5"><b>Website URL</b></label>
								<div class="col-md-7">
								   <input name="websiteurl" class="form-control" type="text" value="<?php echo $row->dcsiteurl; ?>">
								   <span class="help-block"></span>
								</div>
							</div>
						</div>                      
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Number of Instructor and Dive Master</b></label>
                        <div class="col-md-9">
                           <input name="divemaster" class="form-control" type="text" value="<?php echo $row->dcno_of_divemaster; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
						<div class="row">
							<div class="col-md-7">
								<label class="control-label col-md-5"><b>Number of Boats</b> <strong style="color:red;">*</strong></label>
								<div class="col-md-7">
								   <input name="noofboats" class="form-control" type="number" min="1" value="<?php echo $row->dcno_boats; ?>">
								   <span class="help-block"></span>
								</div>
							</div>
							<div class="col-md-5">
								<label class="control-label col-md-5"><b>Daily Capacity</b></label>
								<div class="col-md-7">
								   <input name="dailycapacity" class="form-control" type="text" value="<?php echo $row->dcdaily_capacity; ?>">
								   <span class="help-block"></span>
								</div>
							</div>
						</div>                      
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Dive Center Facilities</b></label>
                        <div class="col-md-9">
						<?php 
						 $chkbox=$row->dcfacilities;
						 $arr=explode(",",$chkbox);
						 ?>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="CLASSROOM" <?php if(in_array("CLASSROOM",$arr)){echo "checked";}?>>CLASSROOM</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="BAR" <?php if(in_array("BAR",$arr)){echo "checked";}?>>BAR</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="WASH CABIN" <?php if(in_array("WASH CABIN",$arr)){echo "checked";}?>>WASH CABIN</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="LOCKER" <?php if(in_array("LOCKER",$arr)){echo "checked";}?>>LOCKER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="SHOWER" <?php if(in_array("SHOWER",$arr)){echo "checked";}?>>SHOWER</label>
							</div>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="EQUIPMENT SHOP" <?php if(in_array("EQUIPMENT SHOP",$arr)){echo "checked";}?>>EQUIPMENT SHOP</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="WI-FI" <?php if(in_array("WI-FI",$arr)){echo "checked";}?>>WI-FI</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="LOUNGE" <?php if(in_array("LOUNGE",$arr)){echo "checked";}?>>LOUNGE</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="DECO CHAMBER" <?php if(in_array("DECO CHAMBER",$arr)){echo "checked";}?>>DECO CHAMBER</label>
							</div>

							<!--div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="OTHERS" <?php if(in_array("OTHERS",$arr)){echo "checked";}?>>OTHERS</label>					</div-->
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Dive Center Affiliation</b></label>
                        <div class="col-md-9">
						<?php 
						 $chkbox2=$row->dcaffiliation;
						 $arr2=explode(",",$chkbox2);						 
						 ?>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" data-toggle="modal" data-target="#modal_theme_primary"
		name="dcaffiliation[]" value="PADI" <?php if(in_array("PADI",$arr2)){echo "checked";}?>>PADI</label>
		<div id="modal_theme_primary" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">PADI</h5>
					</div>

					<div class="modal-body">
						<div class="row">
						<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="100% AWARE" <?php if(in_array("100% AWARE",$arr2)){echo "checked";}?>>100% AWARE</label>
						<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="GREEN STAR AWARD" <?php if(in_array("GREEN STAR AWARD",$arr2)){echo "checked";}?>>GREEN STAR AWARD</label>
						<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="NATIONAL GEOGRAPHIC CENTER" <?php if(in_array("NATIONAL GEOGRAPHIC CENTER",$arr2)){echo "checked";}?>>NATIONAL GEOGRAPHIC CENTER</label>
						<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="PADI 5* CDC CENTER" <?php if(in_array("PADI 5* CDC CENTER",$arr2)){echo "checked";}?>>PADI 5* CDC CENTER</label>
						<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="PADI 5* DIVE RESORT" <?php if(in_array("PADI 5* DIVE RESORT",$arr2)){echo "checked";}?>>PADI 5* DIVE RESORT</label>
						<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="PADI 5* DIVE CENTER"
						<?php if(in_array("PADI 5* DIVE CENTER",$arr2)){echo "checked";}?>>PADI 5* DIVE CENTER</label>
						</div>
						<div class="row">
						<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="PADI 5* INSTRUCTOR DEVELOPMENT CENTER" <?php if(in_array("PADI 5* INSTRUCTOR DEVELOPMENT CENTER",$arr2)){echo "checked";}?>>PADI 5* INSTRUCTOR DEVELOPMENT CENTER</label>
						<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="PADI 5* INSTRUCTOR DEVELOPMENT RESORT" <?php if(in_array("PADI 5* INSTRUCTOR DEVELOPMENT RESORT",$arr2)){echo "checked";}?>>PADI 5* INSTRUCTOR DEVELOPMENT RESORT</label>
						</div>
						<div class="row">
						<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="PADI DIVE CENTER" <?php if(in_array("PADI DIVE CENTER",$arr2)){echo "checked";}?>>PADI DIVE CENTER</label>
						<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="PADI DIVE RESORT" <?php if(in_array("PADI DIVE RESORT",$arr2)){echo "checked";}?>>PADI DIVE RESORT</label>
						<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="PADI TECREC CENTER" <?php if(in_array("PADI TECREC CENTER",$arr2)){echo "checked";}?>>PADI TECREC CENTER</label>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
						<!--button type="button" class="btn btn-primary">Save changes</button-->
					</div>
				</div>
			</div>
		</div>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="SSI" <?php if(in_array("SSI",$arr2)){echo "checked";}?>>SSI</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="SDI" <?php if(in_array("SDI",$arr2)){echo "checked";}?>>SDI</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="HEPCA" <?php if(in_array("HEPCA",$arr2)){echo "checked";}?>>HEPCA</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="ANDI" <?php if(in_array("ANDI",$arr2)){echo "checked";}?>>ANDI</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="BIS" <?php if(in_array("BIS",$arr2)){echo "checked";}?>>BIS</label>
							</div>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="NAUI" <?php if(in_array("NAUI",$arr2)){echo "checked";}?>>NAUI</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="TDI" <?php if(in_array("TDI",$arr2)){echo "checked";}?>>TDI</label>
		<!--label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="OTHERS" <?php if(in_array("OTHERS",$arr2)){echo "checked";}?>>OTHERS</label-->
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Affiliation Registered NO</b></label>
                        <div class="col-md-9">
                           <input name="affiliationno" class="form-control" type="text" value="<?php echo $row->dcaffiliation_reg_no; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Dive Season</b></label>
                        <div class="col-md-9">
						<?php 
						 $chkbox3=$row->dcseason;
						 $arr3=explode(",",$chkbox3);						 
						 ?>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diveseason[]" value="JAN" <?php if(in_array("JAN",$arr3)){echo "checked";}?>>JAN</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diveseason[]" value="FEB" <?php if(in_array("FEB",$arr3)){echo "checked";}?>>FEB</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diveseason[]" value="MARCH" <?php if(in_array("MARCH",$arr3)){echo "checked";}?>>MARCH</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diveseason[]" value="APRIL" <?php if(in_array("APRIL",$arr3)){echo "checked";}?>>APRIL</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diveseason[]" value="MAY" <?php if(in_array("MAY",$arr3)){echo "checked";}?>>MAY</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diveseason[]" value="JUNE" <?php if(in_array("JUNE",$arr3)){echo "checked";}?>>JUNE</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diveseason[]" value="JULY" <?php if(in_array("JULY",$arr3)){echo "checked";}?>>JULY</label>
							</div>
							<div class="row">	
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diveseason[]" value="AUGUST" <?php if(in_array("AUGUST",$arr3)){echo "checked";}?>>AUGUST</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diveseason[]" value="SEPTEMBER" <?php if(in_array("SEPTEMBER",$arr3)){echo "checked";}?>>SEPTEMBER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diveseason[]" value="OCTOBER" <?php if(in_array("OCTOBER",$arr3)){echo "checked";}?>>OCTOBER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diveseason[]" value="NOVEMBER" <?php if(in_array("NOVEMBER",$arr3)){echo "checked";}?>>NOVEMBER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diveseason[]" value="DECEMBER" <?php if(in_array("DECEMBER",$arr3)){echo "checked";}?>>DECEMBER</label>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Languages</b></label>
                        <div class="col-md-9">
						<?php 
						 $chkbox4=$row->dclanguage;
						 $arr4=explode(",",$chkbox4);						 
						 ?>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="ENGLISH" <?php if(in_array("ENGLISH",$arr4)){echo "checked";}?>>ENGLISH</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="FRENCH" <?php if(in_array("FRENCH",$arr4)){echo "checked";}?>>FRENCH</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="JAPANESE" <?php if(in_array("JAPANESE",$arr4)){echo "checked";}?>>JAPANESE</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="CHINESE" <?php if(in_array("CHINESE",$arr4)){echo "checked";}?>>CHINESE</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="KOREAN" <?php if(in_array("KOREAN",$arr4)){echo "checked";}?>>KOREAN</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="SWEDISH" <?php if(in_array("SWEDISH",$arr4)){echo "checked";}?>>SWEDISH</label>
							</div>
							<div class="row">	
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="GERMAN" <?php if(in_array("GERMAN",$arr4)){echo "checked";}?>>GERMAN</label>
		<!--label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="OTHERS" <?php if(in_array("OTHERS",$arr4)){echo "checked";}?>>OTHERS</label-->
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Information and Documents Required of Diver</b></label>
                        <div class="col-md-9">
						<?php 
						 $chkbox5=$row->dcdocument_required;
						 $arr5=explode(",",$chkbox5);						 
						 ?>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="docrequireddiver[]" value="CERTIFICATION CARD" <?php if(in_array("CERTIFICATION CARD",$arr5)){echo "checked";}?>>CERTIFICATION CARD</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="docrequireddiver[]" value="DATE OF BIRTH" <?php if(in_array("DATE OF BIRTH",$arr5)){echo "checked";}?>>DATE OF BIRTH</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="docrequireddiver[]" value="LOGBOOK" <?php if(in_array("LOGBOOK",$arr5)){echo "checked";}?>>LOGBOOK</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="docrequireddiver[]" value="DATE OF LAST DIVE" <?php if(in_array("DATE OF LAST DIVE",$arr5)){echo "checked";}?>>DATE OF LAST DIVE</label>
							</div>
							<div class="row">	
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="docrequireddiver[]" value="MEDICAL STATEMENT" <?php if(in_array("MEDICAL STATEMENT",$arr5)){echo "checked";}?>>MEDICAL STATEMENT</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="docrequireddiver[]" value="DIVING INSURANCE" <?php if(in_array("DIVING INSURANCE",$arr5)){echo "checked";}?>>DIVING INSURANCE</label>
		<!--label class="checkbox-inline"><input type="checkbox" class="styled" name="docrequireddiver[]" value="OTHERS" <?php if(in_array("OTHERS",$arr5)){echo "checked";}?>>OTHERS</label-->
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Currency of Dive Center</b></label>
                        <div class="col-md-9">
							<select class="form-control selectboxit selectbox-bootstrap btn-info enabled btn legitRipple" name="currency">
								<option value="<?php echo $row->dccurrency; ?>"><?php echo $row->dccurrency; ?></option>
								<option label="Select Currency"></option>
								<?php 
									$S_currency=$this->db->get('tbl_currency')->result_array();
									foreach ($S_currency as $sc) 
									{
										?>
								   <option value="<?php echo $sc['Currencycode'];?>"><?php echo $sc['Currencycode'];?></option> 
								   <?php
									}
								?>
							</select>
                           <span class="help-block"></span>
                        </div>
                     </div>
                  </div>
				   <div style="text-align:center">
                     <input type="submit" name="update_DCprofile_data" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
				<script src="<?php echo base_url(); ?>assets/autochange/jquery.min.js"></script>
				 <script type="text/javascript">// <![CDATA[
				 $(document).ready(function(){
				 $('#scountry').change(function(){ //any select change on the dropdown with id country trigger this code
				 $("#islands > option").remove(); //first of all clear select items
				 var country_id = $('#scountry').val(); // here we are taking country id of the selected one.
				 $.ajax({
				 type: "POST",
				 url: "<?php echo base_url(); ?>front/get_island/"+country_id, //here we are calling our user controller and get_cities method with the country_id
				 
				 success: function(cities) //we're calling the response json array 'cities'
				 {
				 $.each(cities,function(id,city) //here we're doing a foeach loop round each city with id as the key and city as the value
				 {
				 var opt = $('<option />'); // here we're creating a new select option with for each city
				 opt.val(id);
				 opt.text(city);
				 $('#islands').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
				 });
				 }
				 
				 });
				 
				 });
				 });
				 </script>
               <?php } ?>
               <br><br>
            </div>
			 <div class="col-md-1"></div>
			</div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
   