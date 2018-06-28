	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js1"></script>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/stepywizerd/css/jquery.stepy.css'); ?>" />
		<link href="<?php echo base_url('assets/new/css/datepicker.css');?>" rel="stylesheet">
		<script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js');?>"></script>
	<div class="content-wrapper">
	<!-- Content area -->
	<div class="content">
	<div class="breadcrumb-line breadcrumb-line-component">
	   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
	   <ul class="breadcrumb">
		  <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
		  <li><a href="">Dashboard</a></li>
		  <li class="active">Availability Calendar</li>
	   </ul>
	</div>
	<br>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h2 class="panel-title">Availability Calendar</h2>
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
							<li ><a href="<?php echo base_url(); ?>DCavailabiltycalendar" >Calendar Assignment</a></li>
							<li><a href="<?php echo base_url(); ?>DCavailabiltycalendar/AvailabilityList" >Availability Calendar</a></li>
							<li class="active" ><a href="<?php echo base_url(); ?>DCavailabiltycalendar/bulkDateUpdated" >Bulk Date Updated</a></li>
						</ul>

						<div class="tab-content">
							<div class="active">
								<div class="row">
									<div class="col-md-12">
										<form name="add"   method="POST" action="<?php echo  base_url();?>DCavailabiltycalendar/bulkDateUpdated" class="form-horizontal form-validate-jquery1">
										  <div class="form-body">
											
											  <div class="form-group">
												<div class="row">
													
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-6">
																<label class="control-label col-md-4"><b>Start Date </b></label>
																<div class="col-md-8">
																	<input type="text" name="bpdatestart" value="" id="dpd5" class="form-control" data-placement="bottom" required="">
																</div>
															</div>
															<div class="col-md-6">
																<label class="control-label col-md-4"><b>End Date </b></label>
																<div class="col-md-8">
																	<input type="text" name="bpdateend" value="" id="dpd6" class="form-control" data-placement="bottom" required="">
																</div>
															</div>
														</div>
													</div>
												</div>
											 </div>
											 <script>
												$(document).ready(function(){
													
													// Booking peroid
													
													  var nowTemp = new Date();
														var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

														var checkin = $('#dpd5').datepicker({
														
															onRender: function(date) {
																return date.valueOf() < now.valueOf() ? 'disabled' : '';
															}
														}).on('changeDate', function(ev) {
															if (ev.date.valueOf() > checkout.date.valueOf()) {
																var newDate = new Date(ev.date)
																newDate.setDate(newDate.getDate() + 1);
																checkout.setValue(newDate);
															}
															checkin.hide();
															$('#dpd6')[0].focus();
														}).data('datepicker');
														var checkout = $('#dpd6').datepicker({
															onRender: function(date) {
																return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
															}
														}).on('changeDate', function(ev) {
															checkout.hide();
														}).data('datepicker');
														
														// Travel peroid
														
														
														
												});
											</script>
											<div class="form-group">
												<div class="row">
													<div class="col-md-6">
														<label class="control-label col-md-4"><b>leisure</b></label>
														<div class="col-md-8">
														   <select class="form-control multiselect-filtering" name="leisure_product[]" id="leisure_product" multiple="multiple">
																
																
																<?php
																$leisureProduct = $this->db->get_where('tbl_dcleisure',array('user_id'=>$this->session->userdata('user_id')))->result();
																foreach($leisureProduct as $row)
																{
																	?>
																	<option value="<?php echo $row->id; ?>"><?php echo $row->product_name; ?></option>
																	<?php
																}
																?>
															</select>
														   <span class="help-block"></span>
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label col-md-4"><b>Courses</b></label>
														<div class="col-md-8">
															<select class="form-control multiselect-filtering" name="courses_product[]" id="courses_product" multiple="multiple" >
																
																
																<?php
																$coursesProduct = $this->db->get_where('tbl_dccourses',array('user_id'=>$this->session->userdata('user_id')))->result();
																foreach($coursesProduct as $row1)
																{
																	?>
																	<option value="<?php echo $row1->id; ?>"><?php echo $row1->product_name; ?></option>
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
												<div class="row">
													<div class="col-md-6">
														<label class="control-label col-md-4"><b>Packages</b></label>
														<div class="col-md-8">
														   <select class="form-control multiselect-filtering" name="package_product[]" id="package_product" multiple="multiple" >
																<?php
																$packageProduct = $this->db->get_where('	tbl_dcpackage',array('user_id'=>$this->session->userdata('user_id')))->result();
																foreach($packageProduct as $row2)
																{
																	?>
																	<option value="<?php echo $row2->id; ?>"><?php echo $row2->product_name; ?></option>
																	<?php
																}
																?>
																
															</select>
														   <span class="help-block"></span>
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label col-md-4"><b>Guided Tour</b></label>
														<div class="col-md-8">
															<select class="form-control multiselect-filtering" name="guided_product[]" id="guided_product" multiple="multiple">
																<?php
																$guidedProduct = $this->db->get_where('		tbl_dcguidedtours',array('user_id'=>$this->session->userdata('user_id')))->result();
																foreach($guidedProduct as $row3)
																{
																	?>
																	<option value="<?php echo $row3->id; ?>"><?php echo $row3->product_name; ?></option>
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
												<label class="control-label col-md-2"><b>Days</b></label>
												<div class="col-md-8">
													<select class="form-control selectboxit selectbox-bootstrap btn-success enabled btn legitRipple" name="day" required="">
														<option>------------------Select Day------------------</option>
														<option value="Sun">Sunday</option>
														<option value="Mon">Monday</option>
														<option value="Tue">Tuesday</option>
														<option value="Wed">Wednesday</option>
														<option value="Thu">Thursday</option>
														<option value="Fri">Friday</option>
														<option value="Sat">Saturday</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-2"><b>Day Type</b></label>
												<div class="col-md-8">
													<select class="form-control selectboxit selectbox-bootstrap btn-warning enabled btn legitRipple" name="dayType" required="">
														<option>--------------Select Day Type-------------</option>
														<option value="NM">Normal</option>
														<option value="WE">Weekend</option>
														<option value="PK">Peak</option>
														<option value="SP">Superpeak</option>
														<option value="NA">Not available</option>
														
													</select>
												</div>
											</div>
											
											 
											 
											 
											 
										</div>

										  <div style="text-align:center">
											 <input type="submit" name="submit_bulk_data" value="Add" class="btn btn-success">
											 <input type="reset" value="Reset" class="btn btn-danger">
										  </div>
									   </form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /dashboard content -->


	<!-- /dashboard content -->