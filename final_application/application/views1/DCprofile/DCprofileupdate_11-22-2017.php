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
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<!-- <li><a data-action="close"></a></li> -->
				</ul>
			</div>
		</div>
		<div class="panel-body">
			<div class="tabbable">
				<ul class="nav nav-tabs nav-tabs-highlight">
					<li class="active"><a href="<?php echo base_url(); ?>DCprofile/addNew" >Details</a></li>
					<li><a href="<?php echo base_url(); ?>DCprofile/DCstaffList" >Contacts</a></li>
					<li><a href="<?php echo base_url(); ?>DCprofile/DCgalleryList" >Gallery</a></li>
				</ul>

				<div class="tab-content">
					<div class="active">
						
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
						<div class="row1">
                        <label class="control-label col-md-3">Dive Center Name</label>
                        <div class="col-md-9">
                           <input name="name" class="form-control" type="text" value="<?php echo $row->dcname; ?>">
                           <span class="help-block"></span>
                        </div>
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3"><b>Dive Center Description</b> <strong style="color:red;"></strong></label>
                        <div class="col-md-9">
						    <textarea name="description" class="form-control" id="editor-full">
								<?php echo $row->dcdescription; ?>
							</textarea>
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
/*
										$isp = $row->dccountry;
										$isp_result=$this->db->get_where('tbl_country', array('country_id'=>$isp))->result();
										foreach($isp_result as $isprow)
										{
										?>
										<option value="<?php echo $isprow->country_id; ?>"><?php echo $isprow->country_name; ?></option>
										<?php
										}
*/
										?>
										<option value="">--------------------------------------------------------------------</option>
										<option label="Select Country"> </option>
										<option value="">--------------------------------------------------------------------</option>
										<?php 
											$S_country=$this->db->get('tbl_country')->result_array();
											foreach ($S_country as $sc) 
											{
												?>
										   <option value="<?php echo $sc['country_id'];?>" <?php if($sc['country_id']==$row->dccountry){echo "selected";}?>><?php echo $sc['country_name'];?></option> 
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
/*
										$iep = $row->dcislands;
										$iep_result=$this->db->get_where('tbl_island', array('island_id'=>$iep))->result();
										foreach($iep_result as $ieprow)
										{
										?>
										<option value="<?php echo $ieprow->island_id; ?>"><?php echo $ieprow->island_name; ?></option>
										<?php
										}
*/
										?>
										<option value="">--------------------------------------------------------------------</option>
										<option label="Select Island"></option>
										<option value="">--------------------------------------------------------------------</option>
										<?php 
											$S_island=$this->db->get('tbl_island')->result_array();
											foreach ($S_island as $si) 
											{
												?>
										   <option value="<?php echo $si['island_id'];?>" <?php if($si['island_id']==$row->dcislands){echo "selected";}?>><?php echo $si['island_name'];?></option> 
										   <?php
											}
										?>
										
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
						<div class="row1">
                        <label class="control-label col-md-3"><b>Registered Company Name</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <input name="rcname" class="form-control" type="text" value="<?php echo $row->dcreg_co_name; ?>">
                           <span class="help-block"></span>
                        </div>
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
								<label class="control-label col-md-4"><b>Telephone NO</b></label>
								<div class="col-md-8">
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
								<label class="control-label col-md-4"><b>FAX NO</b></label>
								<div class="col-md-8">
								   <input name="faxnumber" class="form-control" type="text" value="<?php echo $row->dcbusi_fax_no; ?>">
								   <span class="help-block"></span>
								</div>
							</div>
						</div>                      
                     </div>
					 <div class="form-group">
						<div class="row1">
                        <label class="control-label col-md-3"><b>Dive Center Address</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
						   <textarea name="dcaddress" class="form-control"><?php echo $row->dcaddress; ?></textarea>
                           <span class="help-block"></span>
                        </div>
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
								<label class="control-label col-md-4"><b>FAX NO</b></label>
								<div class="col-md-8">
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
								<label class="control-label col-md-4"><b>Website URL</b></label>
								<div class="col-md-8">
								   <input name="websiteurl" class="form-control" type="text" value="<?php echo $row->dcsiteurl; ?>">
								   <span class="help-block"></span>
								</div>
							</div>
						</div>                      
                     </div>
					 <!--div class="form-group">
						<label class="control-label col-md-3"><b>Custom Accommodation</b>
						</label>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-10">
									<input name="custom_accom" class="form-control" type="text" value="<?php echo $row->custom_accom; ?>">
									<span class="help-block"></span>
								</div>
								<div class="col-md-2">
									<label class="checkbox-inline">
										<input type="checkbox" class="styled" name="custom_accom_info_display" value="TRUE" <?php echo ($row->custom_accom_display=='TRUE' )? 'checked': '' ?>>Display</label>
								</div>
							</div>
						</div>
					</div-->
					 <div class="form-group">
						<div class="row1">
                        <label class="control-label col-md-3"><b>Number of Instructor and Dive Master</b></label>
                        <div class="col-md-9">
                           <input name="divemaster" class="form-control divemaster" type="text" value="<?php echo $row->dcno_of_divemaster; ?>">
                           <span class="help-block"></span>
                        </div>
						</div>
                     </div>
					
						<div class="row">
							<div class="col-md-7">
								 <div class="form-group">
									<label class="control-label col-md-5"><b>Number of Boats</b> <strong style="color:red;">*</strong></label>
									<div class="col-md-7">
									   <input name="noofboats" class="form-control noofboats" id="noofboats" type="text" value="<?php echo $row->dcno_boats; ?>">
									   <span class="help-block"></span>
									</div>
								</div>
							<script>
							$(document).ready(function(){


							$(".noofboats").on("input", function(evt) {
							   var self = $(this);
							   self.val(self.val().replace(/[^\d].+/, ""));
							   if ((evt.which < 48 || evt.which > 57)) 
							   {
								 evt.preventDefault();
							   }
							 });
							 
							 $(".dailycapacity").on("input", function(evt) {
							   var self = $(this);
							   self.val(self.val().replace(/[^\d].+/, ""));
							   if ((evt.which < 48 || evt.which > 57)) 
							   {
								 evt.preventDefault();
							   }
							 });
							 
							 $(".divemaster").on("input", function(evt) {
							   var self = $(this);
							   self.val(self.val().replace(/[^\d].+/, ""));
							   if ((evt.which < 48 || evt.which > 57)) 
							   {
								 evt.preventDefault();
							   }
							 });

							/*  $(".noofboats").on("input", function(evt) {
							   var self = $(this);
							   self.val(self.val().replace(/[^0-9\.]/g, ''));
							   if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
							   {
								 evt.preventDefault();
							   }
							 });
							
							 $(".dailycapacity").on("input", function(evt) {
							   var self = $(this);
							   self.val(self.val().replace(/[^0-9\.]/g, ''));
							   if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
							   {
								 evt.preventDefault();
							   }
							 }); */
							 
							});

							</script>
							</div> 
							<div class="col-md-5">
								<div class="form-group">
								<label class="control-label col-md-4"><b>Daily Capacity</b></label>
								<div class="col-md-8">
								   <input name="dailycapacity" class="form-control dailycapacity"  type="text" value="<?php echo $row->dcdaily_capacity; ?>">
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
						 $arr1=explode(",",$chkbox);
						 //$pi=0;
						$data10 = $this->db->get("filter_infrastructure")->result();
						
						 /* if($arr != "CLASSROOM" || $arr != "BAR" || $arr != "WASH CABIN" || $arr != "LOCKER" || $arr != "SHOWER" || $arr != "EQUIPMENT SHOP" || $arr != "WIFI" || $arr != "LOUNGE" || $arr != "DECO CHAMBER")
						 //{
						{ 
						 $pi = 1;
						} 
						}
						if($pi==1)
						{ */
						 ?>
						<div class="row">
						<?php 
						foreach($data10 as $arr)
						{
						?>
						<div class="col-md-3">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="<?php echo $arr->name; ?>" <?php if(in_array($arr->name,$arr1)){echo "checked";}?>><?php echo $arr->name; ?></label>
						</div>
		<?php 
						}
		?>
		
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<label class="checkbox-inline"><input type="checkbox" class="styled" value="OTHERS" id="chkFacilities">OTHERS</label>
								<label class="checkbox-inline"><div id="dvFacilities" style="display: none"><input type="text" class="form-control" name="dcfaci" /></div></label>
							</div>
						</div>
						<script type="text/javascript">
							$(function () {
								$("#chkFacilities").click(function () {
									if ($(this).is(":checked")) {
										$("#dvFacilities").show();
									} else {
										$("#dvFacilities").hide();
									}
								});
							});
						</script>
						<hr>
							<!--div class="row">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="BAR" <?php if(in_array("BAR",$arr1)){echo "checked";}?>>BAR</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="WASH CABIN" <?php if(in_array("WASH CABIN",$arr1)){echo "checked";}?>>WASH CABIN</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="LOCKER" <?php if(in_array("LOCKER",$arr1)){echo "checked";}?>>LOCKER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="SHOWER" <?php if(in_array("SHOWER",$arr1)){echo "checked";}?>>SHOWER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="EQUIPMENT SHOP" <?php if(in_array("EQUIPMENT SHOP",$arr1)){echo "checked";}?>>EQUIPMENT SHOP</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="WIFI" <?php if(in_array("WIFI",$arr1)){echo "checked";}?>>WIFI</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="LOUNGE" <?php if(in_array("LOUNGE",$arr1)){echo "checked";}?>>LOUNGE</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="DECO CHAMBER" <?php if(in_array("DECO CHAMBER",$arr1)){echo "checked";}?>>DECO CHAMBER</label>
		
		<!--label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="<?php echo $arr1; ?>" <?php if(in_array($arr1,$arr1)){echo "checked";}?>><?php echo $arr1; ?></label-->
							</div-->

							<!--div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="OTHERS" <?php if(in_array("OTHERS",$arr)){echo "checked";}?>>OTHERS</label>					</div-->
						<?php 
						//}
						
						//if($pi==0)
						//{
							?>
						<!--div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="CLASSROOM" <?php if(in_array("CLASSROOM",$arr1)){echo "checked";}?>>CLASSROOM</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="BAR" <?php if(in_array("BAR",$arr1)){echo "checked";}?>>BAR</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="WASH CABIN" <?php if(in_array("WASH CABIN",$arr1)){echo "checked";}?>>WASH CABIN</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="LOCKER" <?php if(in_array("LOCKER",$arr1)){echo "checked";}?>>LOCKER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="SHOWER" <?php if(in_array("SHOWER",$arr1)){echo "checked";}?>>SHOWER</label>
							</div>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="EQUIPMENT SHOP" <?php if(in_array("EQUIPMENT SHOP",$arr1)){echo "checked";}?>>EQUIPMENT SHOP</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="WIFI" <?php if(in_array("WIFI",$arr1)){echo "checked";}?>>WIFI</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="LOUNGE" <?php if(in_array("LOUNGE",$arr1)){echo "checked";}?>>LOUNGE</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcfacilities[]" value="DECO CHAMBER" <?php if(in_array("DECO CHAMBER",$arr1)){echo "checked";}?>>DECO CHAMBER</label>
							</div-->
						<?php
						//}
						?>
						
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Dive Center Affiliation</b></label>
                        <div class="col-md-9">
						<?php 
						 $chkbox2=$row->dcaffiliation;
						 $arr3=explode(",",$chkbox2);						 
						 ?>
						 <?php 
						 $chkbox99=$row->dcaffiliation_padi;
						 //$arr2=explode(",",$chkbox99);						 
						 ?>
						 <?php 
						 //$chkbox98=$row->dcaffiliation_member_no;
						 //$arr4=explode(",",$chkbox98);						 
						 ?>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" data-toggle="modal" data-target="#modal_theme_primary"
		name="dcaffiliation_padi" value="PADI" <?php if($row->dcaffiliation_padi == 'PADI'){echo "checked";}?>>PADI</label>
		<div id="modal_theme_primary" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content" >
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">PADI</h5>
					</div>

					<div class="modal-body">
						<!--script type="text/javascript">
							/* $(function () {
								$("#padi_aware").click(function () {
									if ($(this).is(":checked")) {
										$("#padi_aware_input").show();
									} else {
										$("#padi_aware_input").hide();
									}
								});
							}); */
							$("#padi_aware").click(function () {
							if ($(this).prop('checked') === true) {
								$('#padi_aware_input').show();
								//$('#mynumberfield').show();
								$('input[name="dcaffiliation_member_no"]').prop('required',true);
								//$('input[name="mynumberfield"]').prop('required',true);
							} else {
								$('#padi_aware_input').hide();
								//$('#mynumberfield').hide();
								$('input[name="dcaffiliation_member_no"]').prop('required',false);
								//$('input[name="mynumberfield"]').prop('required',false);        
							}
							});
						</script-->
						<script type="text/javascript">
							$(function () {
								$("#padi_aware").click(function () {
									if ($(this).is(":checked")) {
										$("#padi_aware_input").show();
									} else {
										$("#padi_aware_input").hide();
									}
								});
							});
							$(function () {
								$("#padi_GREEN").click(function () {
									if ($(this).is(":checked")) {
										$("#padi_GREEN_input").show();
									} else {
										$("#padi_GREEN_input").hide();
									}
								});
							});
							$(function () {
								$("#padi_GEOGRAPHIC").click(function () {
									if ($(this).is(":checked")) {
										$("#padi_GEOGRAPHIC_input").show();
									} else {
										$("#padi_GEOGRAPHIC_input").hide();
									}
								});
							});
							$(function () {
								$("#padi_CDC").click(function () {
									if ($(this).is(":checked")) {
										$("#padi_CDC_input").show();
									} else {
										$("#padi_CDC_input").hide();
									}
								});
							});
							$(function () {
								$("#padi_5_DIVE").click(function () {
									if ($(this).is(":checked")) {
										$("#padi_5_DIVE_input").show();
									} else {
										$("#padi_5_DIVE_input").hide();
									}
								});
							});
							$(function () {
								$("#padi_5_DIVE_center").click(function () {
									if ($(this).is(":checked")) {
										$("#padi_5_DIVE_center_input").show();
									} else {
										$("#padi_5_DIVE_center_input").hide();
									}
								});
							});
							$(function () {
								$("#padi_5_INSTRUCTOR").click(function () {
									if ($(this).is(":checked")) {
										$("#padi_5_INSTRUCTOR_input").show();
									} else {
										$("#padi_5_INSTRUCTOR_input").hide();
									}
								});
							});
							$(function () {
								$("#padi_DIVE_center").click(function () {
									if ($(this).is(":checked")) {
										$("#padi_DIVE_center_input").show();
									} else {
										$("#padi_DIVE_center_input").hide();
									}
								});
							});
							$(function () {
								$("#padi_DEVELOPMENT").click(function () {
									if ($(this).is(":checked")) {
										$("#padi_DEVELOPMENT_input").show();
									} else {
										$("#padi_DEVELOPMENT_input").hide();
									}
								});
							});
							$(function () {
								$("#padi_DIVE_RESORT").click(function () {
									if ($(this).is(":checked")) {
										$("#padi_DIVE_RESORT_input").show();
									} else {
										$("#padi_DIVE_RESORT_input").hide();
									}
								});
							});
							$(function () {
								$("#padi_TECREC").click(function () {
									if ($(this).is(":checked")) {
										$("#padi_TECREC_input").show();
									} else {
										$("#padi_TECREC_input").hide();
									}
								});
							});
						</script>
						<?php 
							//if($row->dcaffiliation_padi != "" || $row->dcaffiliation_member_no != "")
							//{
						?>
						
						<div class="row">
						<?php 
						if($row->hundredpercentage_aware != "")
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="100%_aware" checked="checked">100% AWARE</label>
							<label class="checkbox-inline"><div><input type="text" class="form-control" name="100%_aware" value="<?php echo $row->hundredpercentage_aware; ?>"/></div></label>
						</div>
						<?php
						}
						else
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="100%_aware" value="100% AWARE" id="padi_aware">100% AWARE</label>
							<label class="checkbox-inline"><div id="padi_aware_input" style="display: none"><input type="text" class="form-control" name="100%_aware" /></div></label>
						</div>
						<?php
						}
						if($row->green_star_award != "")
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="green_star_award" checked="checked">GREEN STAR AWARD</label>
							<label class="checkbox-inline"><div><input type="text" class="form-control" name="green_star_award" value="<?php echo $row->green_star_award; ?>"/></div></label>
						</div>
						<?php
						}
						else
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="green_star_award" value="GREEN STAR AWARD" id="padi_GREEN">GREEN STAR AWARD</label>
							<label class="checkbox-inline"><div id="padi_GREEN_input" style="display: none"><input type="text" class="form-control" name="green_star_award" /></div></label>
						</div>
						<?php
						}
						if($row->national_geographic_center != "")
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="national_geographic_center" checked="checked">NATIONAL GEOGRAPHIC CENTER</label>
							<label class="checkbox-inline"><div><input type="text" class="form-control" name="national_geographic_center" value="<?php echo $row->national_geographic_center; ?>"/></div></label>
						</div>
						<?php
						}
						else
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="national_geographic_center" value="NATIONAL GEOGRAPHIC CENTER" id="padi_GEOGRAPHIC">NATIONAL GEOGRAPHIC CENTER</label>
							<label class="checkbox-inline"><div id="padi_GEOGRAPHIC_input" style="display: none"><input type="text" class="form-control" name="national_geographic_center" /></div></label>
						</div>
						<?php
						}
						if($row->padi_five_cdc_center != "")
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_5*_cdc_center" checked="checked">PADI 5* CDC CENTER</label>
							<label class="checkbox-inline"><div><input type="text" class="form-control" name="padi_5*_cdc_center" value="<?php echo $row->padi_five_cdc_center; ?>"/></div></label>
						</div>
						<?php
						}
						else
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_5*_cdc_center" value="PADI 5* CDC CENTER" id="padi_CDC">PADI 5* CDC CENTER</label>
							<label class="checkbox-inline"><div id="padi_CDC_input" style="display: none"><input type="text" class="form-control" name="padi_5*_cdc_center" /></div></label>
						</div>
						<?php
						}
						if($row->padi_five_dive_resort != "")
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_5*_dive_resort" checked="checked">PADI 5* DIVE RESORT</label>
							<label class="checkbox-inline"><div><input type="text" class="form-control" name="padi_5*_dive_resort" value="<?php echo $row->padi_five_dive_resort; ?>"/></div></label>
						</div>
						<?php
						}
						else
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_5*_dive_resort" value="PADI 5* DIVE RESORT" id="padi_5_DIVE">PADI 5* DIVE RESORT</label>
							<label class="checkbox-inline"><div id="padi_5_DIVE_input" style="display: none"><input type="text" class="form-control" name="padi_5*_dive_resort" /></div></label>
						</div>
						<?php
						}
						if($row->padi_five_dive_center != "")
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_5*_dive_center" checked="checked">PADI 5* DIVE CENTER</label>
							<label class="checkbox-inline"><div><input type="text" class="form-control" name="padi_5*_dive_center" value="<?php echo $row->padi_five_dive_center; ?>"/></div></label>
						</div>
						<?php
						}
						else
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_5*_dive_center" value="PADI 5* DIVE CENTER" id="padi_5_DIVE_center">PADI 5* DIVE CENTER</label>
							<label class="checkbox-inline"><div id="padi_5_DIVE_center_input" style="display: none"><input type="text" class="form-control" name="padi_5*_dive_center" /></div></label>
						</div>
						<?php
						}
						if($row->padi_five_instructor_development_center != "")
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_5*_instructor_development_center" checked="checked">PADI 5* INSTRUCTOR DEVELOPMENT CENTER</label>
							<label class="checkbox-inline"><div><input type="text" class="form-control" name="padi_5*_instructor_development_center" value="<?php echo $row->padi_five_instructor_development_center; ?>"/></div></label>
						</div>
						<?php
						}
						else
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" 
							name="padi_5*_instructor_development_center" value="PADI 5* INSTRUCTOR DEVELOPMENT CENTER" id="padi_5_INSTRUCTOR">PADI 5* INSTRUCTOR DEVELOPMENT CENTER</label>
							<label class="checkbox-inline"><div id="padi_5_INSTRUCTOR_input" style="display: none"><input type="text" class="form-control" name="padi_5*_instructor_development_center" /></div></label>
						</div>
						<?php
						}
						if($row->padi_dive_center != "")
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_dive_center" checked="checked">PADI DIVE CENTER</label>
							<label class="checkbox-inline"><div><input type="text" class="form-control" name="padi_dive_center" value="<?php echo $row->padi_dive_center; ?>"/></div></label>
						</div>
						<?php
						}
						else
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_dive_center" value="PADI DIVE CENTER" id="padi_DIVE_center">PADI DIVE CENTER</label>
							<label class="checkbox-inline"><div id="padi_DIVE_center_input" style="display: none"><input type="text" class="form-control" name="padi_dive_center" /></div></label>
						</div>
						<?php
						}
						if($row->padi_five_instructor_development_resort != "")
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_5*_instructor_development_resort" checked="checked">PADI 5* INSTRUCTOR DEVELOPMENT RESORT</label>
							<label class="checkbox-inline"><div><input type="text" class="form-control" name="padi_5*_instructor_development_resort" value="<?php echo $row->padi_five_instructor_development_resort; ?>"/></div></label>
						</div>
						<?php
						}
						else
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_5*_instructor_development_resort" value="PADI 5* INSTRUCTOR DEVELOPMENT RESORT" id="padi_DEVELOPMENT">PADI 5* INSTRUCTOR DEVELOPMENT RESORT</label>
							<label class="checkbox-inline"><div id="padi_DEVELOPMENT_input" style="display: none"><input type="text" class="form-control" name="padi_5*_instructor_development_resort" /></div></label>
						</div>
						<?php
						}
						if($row->padi_dive_resort != "")
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_dive_resort" checked="checked">PADI DIVE RESORT</label>
							<label class="checkbox-inline"><div><input type="text" class="form-control" name="padi_dive_resort" value="<?php echo $row->padi_dive_resort; ?>"/></div></label>
						</div>
						<?php
						}
						else
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_dive_resort" value="PADI DIVE RESORT" id="padi_DIVE_RESORT">PADI DIVE RESORT</label>
							<label class="checkbox-inline"><div id="padi_DIVE_RESORT_input" style="display: none"><input type="text" class="form-control" name="padi_dive_resort" /></div></label>
						</div>
						<?php
						}
						if($row->padi_tecrec_center != "")
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_tecrec_center" checked="checked">PADI DIVE RESORT</label>
							<label class="checkbox-inline"><div><input type="text" class="form-control" name="padi_tecrec_center" value="<?php echo $row->padi_tecrec_center; ?>"/></div></label>
						</div>
						<?php
						}
						else
						{
						?>
						<div class="col-md-12">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="padi_tecrec_center" value="PADI TECREC CENTER" id="padi_TECREC">PADI TECREC CENTER</label>
							<label class="checkbox-inline"><div id="padi_TECREC_input" style="display: none"><input type="text" class="form-control" name="padi_tecrec_center" /></div></label>
						</div>
						<?php
						}
						?>
						
						
							
						</div>
						<?php 
							//}
							//else
							//{
						?>
						
						<?php
							//}
						?>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
						<!--button type="button" class="btn btn-primary">Save changes</button-->
					</div>
				</div>
			</div>
		</div>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="SSI" <?php if(in_array("SSI",$arr3)){echo "checked";}?>>SSI</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="SDI" <?php if(in_array("SDI",$arr3)){echo "checked";}?>>SDI</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="HEPCA" <?php if(in_array("HEPCA",$arr3)){echo "checked";}?>>HEPCA</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="ANDI" <?php if(in_array("ANDI",$arr3)){echo "checked";}?>>ANDI</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="BIS" <?php if(in_array("BIS",$arr3)){echo "checked";}?>>BIS</label>
							</div>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="NAUI" <?php if(in_array("NAUI",$arr3)){echo "checked";}?>>NAUI</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="TDI" <?php if(in_array("TDI",$arr3)){echo "checked";}?>>TDI</label>
		<!--label class="checkbox-inline"><input type="checkbox" class="styled" name="dcaffiliation[]" value="OTHERS" <?php if(in_array("OTHERS",$arr3)){echo "checked";}?>>OTHERS</label-->
							</div>
                        </div>
                     </div>
					 <div class="form-group">
						<div class="row1">
                        <label class="control-label col-md-3"><b>Affiliation Registered NO</b></label>
                        <div class="col-md-9">
                           <input name="affiliationno" class="form-control" type="text" value="<?php echo $row->dcaffiliation_reg_no; ?>">
                           <span class="help-block"></span>
                        </div>
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
						
						<div class="row">
						<?php 
						 $chkbox4=$row->dclanguage;
						 $arr4=explode(",",$chkbox4);
						 $data7 = $this->db->get("filter_language")->result();
						 foreach($data7 as $rdata7)
						 {
						 ?>
		<div class="col-md-2">
			<label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="<?php echo $rdata7->name; ?>" <?php if(in_array($rdata7->name, $arr4)){echo "checked";}?>><?php echo $rdata7->name; ?></label>
		</div>
		
		
		
		<!--label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="FRENCH" <?php if(in_array("FRENCH",$arr4)){echo "checked";}?>>FRENCH</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="JAPANESE" <?php if(in_array("JAPANESE",$arr4)){echo "checked";}?>>JAPANESE</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="CHINESE" <?php if(in_array("CHINESE",$arr4)){echo "checked";}?>>CHINESE</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="KOREAN" <?php if(in_array("KOREAN",$arr4)){echo "checked";}?>>KOREAN</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="SWEDISH" <?php if(in_array("SWEDISH",$arr4)){echo "checked";}?>>SWEDISH</label-->
						<?php 
						 }
						?>
						</div>
						<hr>
						<div class="row">	
							<div class="col-md-12">
								<label class="checkbox-inline"><input type="checkbox" class="styled" value="OTHERS" id="chkdlanguages">OTHERS</label>
								<label class="checkbox-inline"><div id="dvdlanguages" style="display: none"><input type="text" name="dlang" class="form-control" /></div></label>
								<script type="text/javascript">
									$(function () {
										$("#chkdlanguages").click(function () {
											if ($(this).is(":checked")) {
												$("#dvdlanguages").show();
											} else {
												$("#dvdlanguages").hide();
											}
										});
									});
								</script>
							</div>
						</div>
						<hr>
							<!--div class="row">	
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="GERMAN" <?php if(in_array("GERMAN",$arr4)){echo "checked";}?>>GERMAN</label>
		<!--label class="checkbox-inline"><input type="checkbox" class="styled" name="dlanguages[]" value="OTHERS" <?php if(in_array("OTHERS",$arr4)){echo "checked";}?>>OTHERS</label->
							</div-->
						
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
						<div class="row1">
                        <label class="control-label col-md-3"><b>Currency of Dive Center</b></label>
                        <div class="col-md-9">
							<select class="form-control selectboxit selectbox-bootstrap btn-info enabled btn legitRipple" name="currency">
<?php 
/*								<option value="<?php echo $row->dccurrency; ?>"><?php echo $row->dccurrency; ?></option>*/
?>
								<option label="Select Currency"></option>
								<?php 
									$S_currency=$this->db->get('tbl_currency')->result_array();
									foreach ($S_currency as $scu) 
									{
										?>
								   <option value="<?php echo $scu['Currencycode'];?>" <?php if($scu['Currencycode']==$row->dccurrency){echo "selected";}?>><?php echo $scu['Currencycode'];?></option> 
								   <?php
									}
								?>
							</select>
                           <span class="help-block"></span>
                        </div>
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
				</div>
			</div>
		</div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
   