<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Dive Package</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Dive Package</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>DCpackage/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>DCpackage/DCpackagelist" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
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
				<h3 style="color: #2196f3;font-weight: bold;">Update Contents</h3>
				<hr>
				 <form name="add" method="POST" action="<?php echo  base_url();?>DCpackage/edit/<?php echo $row->id; ?>" class="form-horizontal form-validate-jquery stepy-clickable" 
			   enctype="multipart/form-data">
				<fieldset title="1">
				<legend class="text-semibold">General Info</legend>
					<div class="form-group">
                        <label class="control-label col-md-3"><b>Product Name</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <input name="product_name" class="form-control" type="text" value="<?php echo $row->product_name; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>

					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Description</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
						    <textarea name="description" class="form-control" id="editor-full1" ><?php echo $row->product_description; ?></textarea>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <!--div class="form-group">
                        <label class="control-label col-md-3"><b>Product Includes</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <input name="product_includes" class="form-control" type="text" value="<?php echo $row->product_includes; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Excludes</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-10">
									<input name="productexcludes" class="form-control" type="text" value="<?php echo $row->product_excludes; ?>">
									<span class="help-block"></span>
								</div>
								<div class="col-md-2">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="display" value="display" checked>Display</label>
								</div>
							</div>                     
                        </div>
                     </div>
					 <!--div class="form-group">
						<label class="control-label col-md-12" style="color: #ff5722;"><b>OR SELECT FROM A LIST OF COMMON OPTIONS : </b></label>
					 </div->
					  <div class="form-group">
                        <label class="control-label col-md-3"><b>OR SELECT FROM A LIST OF COMMON OPTIONS </b></label>
                        <div class="col-md-9">
						<?php 
						 $chkbox=$row->common_options;
						 $arr=explode(",",$chkbox);						 
						 ?>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="commonoptions[]" value="Full Equipment Rendal"
		<?php if(in_array("Full Equipment Rendal",$arr)){echo "checked";}?> >FULL EQUIPMENT RENDAL</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="commonoptions[]" value="Lunch" 
		<?php if(in_array("Lunch",$arr)){echo "checked";}?> >LUNCH</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="commonoptions[]" value="Dinner" 
		<?php if(in_array("Dinner",$arr)){echo "checked";}?> >DINNER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="commonoptions[]" value="Transfer From Jetty" 
		<?php if(in_array("Transfer From Jetty",$arr)){echo "checked";}?> >TRANSFER FROM JETTY</label>
							</div>
							<div class="row">	
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="commonoptions[]" value="Transfer From Hotel"
		<?php if(in_array("Transfer From Hotel",$arr)){echo "checked";}?> >TRANSFER FROM HOTEL</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="commonoptions[]" value="Marine Park Fee"
		<?php if(in_array("Marine Park Fee",$arr)){echo "checked";}?> >MARINE PARK FEE</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="commonoptions[]" value="DC to Dive Site" 
		<?php if(in_array("DC to Dive Site",$arr)){echo "checked";}?> >DC TO DIVE SITE</label>
							</div>
                        </div>
                     </div-->
					 
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Other Information</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-10">
									<input name="otherinformation" class="form-control" type="text" value="<?php echo $row->other_info; ?>">
									<span class="help-block"></span>
								</div>
								<div class="col-md-2">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="display" value="display" checked>Display</label>
								</div>
							</div>                     
                        </div>
                     </div>
					  <div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label class="control-label col-md-6"><b>Product Category : </b></label>
								<div class="col-md-6">
									<input name="productcategory" class="form-control" type="text" value="<?php echo $row->product_category; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<label class="control-label col-md-6"><b>Product Keyword: </b></label>
								<div class="col-md-6">
									<style>.btn-group { width : 100%; }</style>
									<select name="productkeyword[]" class="form-control multiselect-filtering" data-popup="tooltip" title="Product Keyword(It is required field)" data-placement="bottom" multiple="multiple">
										<?php 
											$aaa =$row->product_keyword;
											$vvv = explode(',', $aaa);
											foreach($vvv as $valll)
											{ ?>
												 <option value="<?php echo $valll; ?>" ><?php echo $valll; ?></option> 
											<?php
											
											}
											$data=$this->db->get_where('tbl_product_keywords', array('user_id'=>$this->session->userdata('user_id')))->result_array();
											foreach ($data as $pk) {?>
										   <option value="<?php echo $pk['keywords'];?>" ><?php echo $pk['keywords'];?></option> 
										   <?php
											}
										  ?>
									</select>
								</div>
							</div>
						</div>					
					 </div>
					  <link href="<?php echo base_url('assets/new/css/datepicker.css');?>" rel="stylesheet">
					<script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js');?>"></script>
					<script>
							$(document).ready(function(){
								
								// Booking peroid
								
								  var nowTemp = new Date();
									var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

									var checkin = $('#dpd1').datepicker({
									
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
										$('#dpd2')[0].focus();
									}).data('datepicker');
									var checkout = $('#dpd2').datepicker({
										onRender: function(date) {
											return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
										}
									}).on('changeDate', function(ev) {
										checkout.hide();
									}).data('datepicker');
									
						
									
							});
						</script>
					 <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label col-md-12"><b>Booking Period </b></label>
							</div>
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-6">
										<label class="control-label col-md-4"><b>Start Date </b></label>
										<div class="col-md-8">
											
											<input type="text" name="bpdatestart" value="<?php echo $row->booking_period_start_date; ?>" id="dpd1" class="form-control" >
											
										</div>
									</div>
									<div class="col-md-6">
										<label class="control-label col-md-4"><b>End Date </b></label>
										<div class="col-md-8">
											
											<input type="text" name="bpdateend" value="<?php echo $row->booking_period_end_date; ?>" id="dpd2" class="form-control" >
											
										</div>
									</div>
								</div>
							</div>
						</div>
							<script>
							$(document).ready(function(){
								
								
									// Travel peroid
									
									var nowTemp = new Date();
									var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

									var checkin = $('#dpd3').datepicker({
									
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
										$('#dpd4')[0].focus();
									}).data('datepicker');
									var checkout = $('#dpd4').datepicker({
										onRender: function(date) {
											return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
										}
									}).on('changeDate', function(ev) {
										checkout.hide();
									}).data('datepicker');
									
							});
						</script>
					 </div>
					 
					 <div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label col-md-12"><b>Travel Period </b></label>
							</div>
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-6">
										<label class="control-label col-md-4"><b>Start Date </b></label>
										<div class="col-md-8">
											
											<input type="text" name="tpdatestart" value="<?php echo $row->travel_period_start_date; ?>" id="dpd3" class="form-control" >
											
										</div>
									</div>
									<div class="col-md-6">
										<label class="control-label col-md-4"><b>End Date </b></label>
										<div class="col-md-8">
											
											<input type="text" name="tpdateend" value="<?php echo $row->travel_period_end_date; ?>" id="dpd4" class="form-control">
											
										</div>
									</div>
								</div>
							</div>
						</div>
						
					 </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Sequence Number</b></label>
                        <div class="col-md-9">
                           <input name="sequence_number" class="form-control" type="text" value="<?php echo $row->sequence_number; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Status</b></label>
                        <div class="col-md-9">
							<?php 
								$chkbox1 = $row->product_status;
							?>
                           <label class="checkbox-inline"><input type="radio" class="styled" name="productstatus" value="Available" 
						   <?php echo ($chkbox1=='Available')?'checked':'' ?> >AVAILABLE</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="productstatus" value="Hidden" 
							<?php echo ($chkbox1=='Hidden')?'checked':'' ?> >HIDDEN</label>
                        </div>
                     </div>
				</fieldset>
				<fieldset title="2">
				<legend class="text-semibold">Pricing Options</legend>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Product Unit :</b> <strong style="color:red;">*</strong></label>
						<?php 
						if($row->product_unit != "")
						{
						?>
						<div class="col-md-9">
							<?php 
								$chkbox2 = $row->product_unit;
								if($chkbox2 =='Day' || $chkbox2 =='Trip')
								{
							?>
							<label class="checkbox-inline" style="margin: 0 0 0 10px;">
							<input type="radio" class="styled" name="productunits" value="Day" 
							<?php echo ($chkbox2=='Day')?'checked':'' ?>>Day</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="Trip" 
							<?php echo ($chkbox2=='Trip')?'checked':'' ?>>Trip</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" id="productunitsothers" name="productunits"/>OTHERS</label>
							<label class="checkbox-inline"><div id="dvproductunitsothers" style="display: none">
							<input type="text" name="productunits" /></div></label>
							<script type="text/javascript">
								$(function () {
									$("input[name='productunits']").click(function () {
										if ($("#productunitsothers").is(":checked")) {
											$("#dvproductunitsothers").show();
										} else {
											$("#dvproductunitsothers").hide();
										}
									});
								});
							</script>
							<?php 
								}
								else
								{
							?>
							<label class="checkbox-inline" style="margin: 0 0 0 10px;">
							<input type="radio" class="styled" name="productunits" value="<?php echo $chkbox2; ?>" 
							<?php echo ($chkbox2==$chkbox2)?'checked':'' ?> ><?php echo $chkbox2; ?></label>
							<label class="checkbox-inline" style="margin: 0 0 0 10px;">
							<input type="radio" class="styled" name="productunits" value="Day">Day</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="Trip">Trip</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" id="productunitsothers1" name="productunits"/>OTHERS</label>
							<label class="checkbox-inline"><div id="dvproductunitsothers1" style="display: none">
							<input type="text" name="productunits" /></div></label>
							<script type="text/javascript">
								$(function () {
									$("input[name='productunits']").click(function () {
										if ($("#productunitsothers1").is(":checked")) {
											$("#dvproductunitsothers1").show();
										} else {
											$("#dvproductunitsothers1").hide();
										}
									});
								});
							</script>
							<?php 
								}
							?>
						</div>
						<?php 
						}
						else
						{
						?>
						<div class="col-md-9">
							<label class="checkbox-inline" style="padding-left:0px;">
							<input type="radio" class="styled" name="productunits" value="Day">Day</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="Trip">Trip</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" id="productunitsothers2" name="productunits"/>OTHERS</label>
							<label class="checkbox-inline"><div id="dvproductunitsothers2" style="display: none">
							<input type="text" name="productunits" /></div></label>
							<script type="text/javascript">
								$(function () {
									$("input[name='productunits']").click(function () {
										if ($("#productunitsothers2").is(":checked")) {
											$("#dvproductunitsothers2").show();
										} else {
											$("#dvproductunitsothers2").hide();
										}
									});
								});
							</script>
						</div>
						<?php
						}
						 ?>
					 </div>
					
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Max / Day </b></label>
                        <div class="col-md-9">
                           <input name="productmaxday" class="form-control" type="text" value="<?php echo $row->product_max_day; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Price</b></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Normal Rate</label>
									 <div class="col-md-6">
										<input name="normal_product_price" class="form-control" type="text" value="<?php echo $row->normal_product_price; ?>">
									</div>
									<div class="col-md-3"><span class="help-block">MYR / PAX</span></div>
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Weekend Rate</label>
									<div class="col-md-6">
										<input name="weekend_product_price" class="form-control" type="text" value="<?php echo $row->weekend_product_price; ?>">
									</div>
									<div class="col-md-3"><span class="help-block">MYR / PAX</span></div>
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-12">
									<label class="control-label col-md-3">Peak Season Rate</label>
									<div class="col-md-6">
										<input name="peak_product_price" class="form-control" type="text" value="<?php echo $row->peak_product_price; ?>">
									</div>
									<div class="col-md-3"><span class="help-block">MYR / PAX</span></div>
								</div>
							</div>
                        </div>
                     </div>
					 <?php 
						$chkbox3 = $row->disaccomodation;
					 //echo $abcd;
					 if(($chkbox3=='Yes')?'checked':'')
					 {
					 ?>
					 <div class="form-group">
						<label class="control-label col-md-4"><b>Is the Product Price Inclusive of Accomodation</b></label>
						<div class="col-md-8">
						
						<label class="checkbox-inline">
						<input type="radio" class="styled" name="dcaccomodation" id="chkaccomodationyes" value="Yes" 
						<?php echo ($chkbox3=='Yes')?'checked':'' ?>>YES</label>
						<label class="checkbox-inline">
						<input type="radio" class="styled" name="dcaccomodation" id="chkaccomodationno" value="No" 
						<?php echo ($chkbox3=='No')?'checked':'' ?>>NO</label>
						</div>
					 </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Single Room</b></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-12">
									<?php 
									 $chk001=$row->single_room;
									 $arr001=explode(",",$chk001);
									foreach($arr001 as $val001)
									{
									 ?>								 
									 <div class="col-md-2">
										<input name="single_room[]" class="form-control" type="text" value="<?php echo $val001; ?>">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
									<?php }?>
								</div>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Twin Room</b></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-12">
								<?php 
									 $chk002=$row->twin_room;
									 $arr002=explode(",",$chk002);
									foreach($arr002 as $val002)
									{
									 ?>
									 <div class="col-md-2">
										<input name="twin_room[]" class="form-control" type="text" value="<?php echo $val002; ?>">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
									<?php }?>
									
								</div>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>3 Person Room</b></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-12">
								<?php 
									 $chk003=$row->three_person_room;
									 $arr003=explode(",",$chk003);
									foreach($arr003 as $val003)
									{
									 ?>
									 <div class="col-md-2">
										<input name="three_person_room[]" class="form-control" type="text" value="<?php echo $val003; ?>">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
									<?php }?>								 
								</div>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Quad Room</b></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-12">
									<?php 
									 $chk004=$row->quad_room;
									 $arr004=explode(",",$chk004);
									foreach($arr004 as $val004)
									{
									 ?>
									 <div class="col-md-2">
										<input name="quad_room[]" class="form-control" type="text" value="<?php echo $val004; ?>">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
									<?php } ?>
								</div>
							</div>
                        </div>
                     </div>
					   <?php 
					   }
					   else
					   {
						?>
						<div class="form-group">
							<label class="control-label col-md-4"><b>Is the Product Price Inclusive of Accomodation</b></label>
							<div class="col-md-8">
							<?php 
							$chkbox3 = $row->disaccomodation;
							?>
							<label class="checkbox-inline" style="margin: 0 0 0 10px;">
							<input type="radio" class="styled" name="dcaccomodation" id="chkaccomodationyes" value="Yes" 
							<?php echo ($chkbox3=='Yes')?'checked':'' ?>>YES</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="dcaccomodation" id="chkaccomodationno" value="No" 
							<?php echo ($chkbox3=='No')?'checked':'' ?>>NO</label>
							</div>
						 </div>
						<div id="dvaccomodation" style="display:none;">
						<div class="form-group">
                        <label class="control-label col-md-3"><b>Single Room</b></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-12">
									 <div class="col-md-2">
										<input name="single_room[]" class="form-control" type="text">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
									 <div class="col-md-2">
										<input name="single_room[]" class="form-control" type="text">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
									 <div class="col-md-2">
										<input name="single_room[]" class="form-control" type="text">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
								</div>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Twin Room</b></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-12">
									 <div class="col-md-2">
										<input name="twin_room[]" class="form-control" type="text">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
									 <div class="col-md-2">
										<input name="twin_room[]" class="form-control" type="text">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
									 <div class="col-md-2">
										<input name="twin_room[]" class="form-control" type="text">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
								</div>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>3 Person Room</b></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-12">
									 <div class="col-md-2">
										<input name="three_person_room[]" class="form-control" type="text">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
									 <div class="col-md-2">
										<input name="three_person_room[]" class="form-control" type="text">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
									 <div class="col-md-2">
										<input name="three_person_room[]" class="form-control" type="text">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
								</div>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Quad Room</b></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-12">
									 <div class="col-md-2">
										<input name="quad_room[]" class="form-control" type="text">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
									 <div class="col-md-2">
										<input name="quad_room[]" class="form-control" type="text">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
									 <div class="col-md-2">
										<input name="quad_room[]" class="form-control" type="text">
									</div>
									<div class="col-md-2"><span class="help-block">MYR / PAX</span></div>
								</div>
							</div>
                        </div>
                     </div>
					 </div>
					 <script type="text/javascript">
						$(function () {
							$("input[name='dcaccomodation']").click(function () {
								if ($("#chkaccomodationyes").is(":checked")) {
									$("#dvaccomodation").show();
								} else {
									$("#dvaccomodation").hide();
								}
							});
						});
					</script>
						<?php
					   }
					   ?>
					   
					   
<!--****************************************************************************************************************************************************************************************************************************************************************************************************													START APPLY DISCOUNT FOR BULK PURCHASE *****************************************************************************************************************************************************************************************************************************************************************************************************-->					 
					 
					 <?php 
					$chkbox3 = $row->discount_bulk_purchase;
					if(($chkbox3=='Yes')?'checked':'')
					 {
					?>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Apply Discount for Bulk Purchase? </b></label>
						<div class="col-md-9">
						<label class="checkbox-inline">
						<input type="radio" class="styled" name="dcdiscountpurchase" value="Yes" 
						<?php echo ($chkbox3=='Yes')?'checked':'' ?>>YES</label>
						<label class="checkbox-inline">
						<input type="radio" class="styled" name="dcdiscountpurchase" value="No" 
						<?php echo ($chkbox3=='No')?'checked':'' ?>>NO</label>
						</div>
					 </div>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Discount Unit : </b></label>
						 <div class="col-md-9">
							<?php 
							$chkbox4 = $row->discount_unit;
							?>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="dcdiscountunit" value="%" <?php echo ($chkbox4=='%')?'checked':'' ?>>% OR </label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="dcdiscountunit" value="$" <?php echo ($chkbox4=='$')?'checked':'' ?>> $ </label>
						</div>
					 </div>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Range</b></label>
						<div class="col-md-9">
							<?php 
								$strrange1=$row->range_start;
								 $endrange1=$row->range_end;
								 $disrate1=$row->discount_rate;
								 $arr_strrange1=explode(",",$strrange1);	
								 $arr_endrange1=explode(",",$endrange1);	
								 $arr_disrate1=explode(",",$disrate1);
							echo '<div class="col-md-4">';	 
							foreach($arr_strrange1 as $vallllue1)
							{
							?>
							<input name="startrange[]" class="form-control" type="text" value="<?php echo $vallllue1; ?>" style="width:150px;">
							<?php 
							}
							echo '</div>
							<div class="col-md-4">';
							foreach($arr_endrange1 as $vallllue2)
							{
							?>
							<input name="endrange[]" type="text" class="form-control" value="<?php echo $vallllue2; ?>" style="width:150px;">
							<?php 
							}
							echo '</div>
							<div class="col-md-4">';
							foreach($arr_disrate1 as $vallllue3)
							{
							?>
							<input name="field_name[]"  type="text" class="form-control" value="<?php echo $vallllue3; ?>" style="width:150px;">						
							<?php
							}
							echo '</div>';
							?>
							<div class="row" style="margin:1px 0px;">&nbsp;</div>
						</div>
					 </div>
					<?php 
					 }
					 elseif(($chkbox3=='No')?'checked':'')
					 {
					?>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Apply Discount for <br>Bulk Purchase? </b></label>
						 <div class="col-md-9">
						<label class="checkbox-inline">
						<input type="radio" class="styled" name="dcdiscountpurchase" value="Yes" onClick="showTextBox2()" <?php echo ($chkbox3=='Yes')?'checked':'' ?>>YES</label>
						<label class="checkbox-inline"><input type="radio" class="styled" name="dcdiscountpurchase" value="No" onClick="showTextBox3()" <?php echo ($chkbox3=='No')?'checked':'' ?>>NO</label>
						</div>
					 </div>
					 <div class="textBox1" style="display:none;background:#eeeeee;padding:1%;">
						<div class="form-group">
							<label class="control-label col-md-3"><b>Discount Unit : </b></label>
							 <div class="col-md-9">
								<label class="checkbox-inline">
								<input type="radio" class="styled" name="dcdiscountunit" value="%">% OR </label>
								<label class="checkbox-inline"><input type="radio" class="styled" name="dcdiscountunit" value="$"> $ </label>
							</div>
						 </div>
						 <div class="form-group">
							<label class="control-label col-md-3"><b>Range</b></label>
							<div class="col-md-9">
								<div class="field_wrapper">
									<div>
										<input type="text" name="startrange[]"/> TO <input type="text" name="endrange[]"/>
										DISCOUNT RATE : <input type="text" name="field_name[]" value="" style="width:100px;"/>
										<a href="javascript:void(0);" class="add_button" title="Add field">
										<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/></a>
									</div>
								</div><br>
							</div>
						 </div>
					 </div>
					<script type="text/javascript">
					
							function showTextBox2() {
								$(".textBox1").show();
							}
							function showTextBox3() {
								$(".textBox1").hide();
							}
						
					$(document).ready(function(){
						var maxField = 10; //Input fields increment limitation
						var addButton = $('.add_button'); //Add button selector
						var wrapper = $('.field_wrapper'); //Input field wrapper
						var fieldHTML = '<div><input type="text" name="startrange[]"> TO <input type="text" name="endrange[]"> DISCOUNT RATE : <input type="text" name="field_name[]" value="" style="width:100px;"/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/></a></div>'; //New input field html 
						var x = 1; //Initial field counter is 1
						$(addButton).click(function(){ //Once add button is clicked
							if(x < maxField){ //Check maximum number of input fields
								x++; //Increment field counter
								$(wrapper).append(fieldHTML); // Add field html
							}
						});
						$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
							e.preventDefault();
							$(this).parent('div').remove(); //Remove field html
							x--; //Decrement field counter
						});
					});
					</script>
<!--****************************************************************************************************************************************************************************************************************************************************************************************************													END APPLY DISCOUNT FOR BULK PURCHASE *****************************************************************************************************************************************************************************************************************************************************************************************************-->
					<?php 
					 }
					$chkbox5 = $row->apply_promo;
					if(($chkbox5=='Yes')?'checked':'')
					 {
					?>
					<div class="form-group">
						<label class="control-label col-md-4"><b>Apply Promo? </b></label>
						<div class="col-md-8">
							<?php 
							
							?>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="dcapplypromo" id="chkapplypromoyes1" value="Yes" <?php echo ($chkbox5=='Yes')?'checked':'' ?>>YES</label>
							<!--label class="checkbox-inline"><input type="radio" class="styled" name="dcapplypromo" id="chkapplypromono" value="No" <?php echo ($chkbox5=='No')?'checked':'' ?>>NO</label-->
						</div>
					 </div>
					 
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Start Date : </b></label>
						<div class="col-md-3">

							<input type="text" name="applypromo_startdate" value="<?php echo $row->start_date; ?>" id="dpd5" class="form-control">
							
						</div>
						<label class="control-label col-md-3"><b>End Date : </b></label>
						<div class="col-md-3">
							
							<input type="text" name="applypromo_enddate" value="<?php echo $row->end_date; ?>" id="dpd6" class="form-control">
							
						</div>
						<script>
							$(document).ready(function(){
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
											return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
										}
									}).on('changeDate', function(ev) {
										checkout.hide();
									}).data('datepicker');
							});
						</script>
					 </div>
					 
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Discount Unit : </b></label>
						 <div class="col-md-9">
							<?php 
							$chkbox6 = $row->ap_discount_unit;
							?>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="apdiscountunit" value="%" <?php echo ($chkbox6=='%')?'checked':'' ?>>% OR </label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="apdiscountunit" value="$" <?php echo ($chkbox6=='$')?'checked':'' ?> > $ </label>
						</div>
					 </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Discount Rate : </b></label>
                        <div class="col-md-9">
                           <input name="apdiscountrate" class="form-control" type="text" value="<?php echo $row->ap_discount_rate; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
						<label class="control-label col-md-4"><b>Apply Promo to Bulk Discount? </b></label>
						<div class="col-md-8">
							<?php 
							$chkbox7 = $row->apply_promo_bilk_discount;
							?>
							<label class="checkbox-inline" style="margin: 0 0 0 10px;">
							<input type="radio" class="styled" name="apbulkdiscount" value="Yes" 
							<?php echo ($chkbox7=='Yes')?'checked':'' ?>>YES</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="apbulkdiscount" value="No" 
							<?php echo ($chkbox7=='No')?'checked':'' ?>>NO</label>
						</div>
					 </div>
					 <?php 
					 }
					 elseif(($chkbox5=='No')?'checked':'')
					 {
					 ?>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Apply Promo? </b></label>
						<div class="col-md-9">
							<?php 
							
							?>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="dcapplypromo" id="chkapplypromoyes1" value="Yes" <?php echo ($chkbox5=='Yes')?'checked':'' ?>>YES</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="dcapplypromo" id="chkapplypromono" value="No" <?php echo ($chkbox5=='No')?'checked':'' ?>>NO</label>
						</div>
					 </div>
					 <script type="text/javascript">
						$(function () {
							$("input[name='dcapplypromo']").click(function () {
								if ($("#chkapplypromoyes1").is(":checked")) {
									$("#dvapplypromo1").show();
								} else {
									$("#dvapplypromo1").hide();
								}
							});
						});
					</script>
					 <div id="dvapplypromo1" style="display:none;">
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Start Date : </b></label>
						<div class="col-md-3">
							
							
							<input type="text" name="applypromo_startdate" value="" id="dpd7" class="form-control" data-popup="tooltip" title="Apply Promo Start Date(It is required field)" data-placement="bottom">
							
						</div>
						<label class="control-label col-md-3"><b>End Date : </b></label>
						<div class="col-md-3">
				
							<input type="text" name="applypromo_enddate" value="" id="dpd8" class="form-control" data-popup="tooltip" title="Apply Promo End Date(It is required field)" data-placement="bottom">
							
						</div>
						<script>
							$(document).ready(function(){
								  var nowTemp = new Date();
									var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

									var checkin = $('#dpd7').datepicker({
									
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
										$('#dpd8')[0].focus();
									}).data('datepicker');
									var checkout = $('#dpd8').datepicker({
										onRender: function(date) {
											return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
										}
									}).on('changeDate', function(ev) {
										checkout.hide();
									}).data('datepicker');
							});
						</script>
					 </div>
					 
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Discount Unit : </b></label>
						 <div class="col-md-9">
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="apdiscountunit" value="%">% OR </label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="apdiscountunit" value="$"> $ </label>
						</div>
					 </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Discount Rate : </b></label>
                        <div class="col-md-9">
                           <input name="apdiscountrate" class="form-control" type="text">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Apply Promo to <br>Bulk Discount? </b></label>
						<div class="col-md-9">
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="apbulkdiscount" value="Yes">YES</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="apbulkdiscount" value="No">NO</label>
						</div>
					 </div>
					 </div>
<!--****************************************************************************************************************************************************************************************************************************************************************************************************																END APPLY PROMO *****************************************************************************************************************************************************************************************************************************************************************************************************-->					<?php 
					 }
					$chkbox12 = $row->optional_services;
					if(($chkbox12=='Yes')?'checked':'')
					 {
					?>	
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Optional Services : </b></label>
						<div class="col-md-9">
							<label class="checkbox-inline">
							<input type="radio" class="styled" id="chkoptionalserviceyes" value="Yes" name="optionalservices1" <?php echo ($chkbox12=='Yes')?'checked':'' ?>>YES</label>
							<!--label class="checkbox-inline"><input type="radio" class="styled" name="optionalservices" id="chkoptionalserviceno" value="No" <?php echo ($chkbox12=='No')?'checked':'' ?>>NO</label-->
						</div>					
					 </div>
					 <div class="form-group" >
						<label class="control-label col-md-3"></label>
						<div class="col-md-9" style="background:#eeeeee;padding:1%;">
							<label class="control-label col-md-2">Price</label>
							<?php 
								$chkbox33=$row->optional_services_price;
								$arr33=explode(",",$chkbox33);	
								foreach($arr33 as $val33)
								{
							?>
							
							<div class="col-md-3">
								<input type="text" name="optionalservices" value="<?php echo $val33; ?>">
							</div>
							<?php 
								}
							?>
						</div>					
					 </div>
					 <?php 
					 }
					 elseif(($chkbox12=='No')?'checked':'')
					 {
					?>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Optional Services : </b></label>
						<div class="col-md-9">
							<label class="checkbox-inline">
							<input type="radio" class="styled" id="chkoptionalserviceyes" name="optionalservices1" <?php echo ($chkbox12=='Yes')?'checked':'' ?>>YES</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="optionalservices1" value="No" id="chkoptionalserviceno" <?php echo ($chkbox12=='No')?'checked':'' ?>>NO</label>
							<label class="checkbox-inline">
							<div id="dvoptionalservice" style="display: none">
								<div class="field_wrapper1">
									<div>
								Price : <input type="text" name="optionalservices[]" />
								<a href="javascript:void(0);" class="add_button1" title="Add field">
								<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/></a>
									</div>
								</div>
							</div>
							</label>
						</div>
					<script type="text/javascript">
					$(function () {
							$("input[name='optionalservices1']").click(function () {
								if ($("#chkoptionalserviceyes").is(":checked")) {
									$("#dvoptionalservice").show();
								} else {
									$("#dvoptionalservice").hide();
								}
							});
						});
								
								
					$(document).ready(function(){
						var maxField = 10; //Input fields increment limitation
						var addButton = $('.add_button1'); //Add button selector
						var wrapper = $('.field_wrapper1'); //Input field wrapper
						var fieldHTML = '<div>Price : <input type="text" name="optionalservices[]" /><a href="javascript:void(0);" class="remove_button1" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/></a></div>'; //New input field html 
						var x = 1; //Initial field counter is 1
						$(addButton).click(function(){ //Once add button is clicked
							if(x < maxField){ //Check maximum number of input fields
								x++; //Increment field counter
								$(wrapper).append(fieldHTML); // Add field html
							}
						});
						$(wrapper).on('click', '.remove_button1', function(e){ //Once remove button is clicked
							e.preventDefault();
							$(this).parent('div').remove(); //Remove field html
							x--; //Decrement field counter
						});
					});
					</script>					
					 </div>
					<?php
					 }
					 ?>
<!--****************************************************************************************************************************************************************************************************************************************************************************************************																END OPTIONAL SERVICES *****************************************************************************************************************************************************************************************************************************************************************************************************-->
				</fieldset>
				<fieldset title="3">
				<legend class="text-semibold">Accommodation</legend>
					<div class="form-group">
						<label class="control-label col-md-12" style="color: #ff5722;"><b>ACCOMMODATION DETAILS</b></label>
					 </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Accommodation Name : </b></label>
                        <div class="col-md-9">
                           <input name="accomodation_name" class="form-control" type="text" value="<?php echo $row->accomodation_name; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Accomodates : </b></label>
                        <div class="col-md-9">
                           <div class="row">
								<div class="col-md-12">
									<div class="col-md-3"><span class="help-block">1 Peson/ Room</span></div>
									<div class="col-md-3"><span class="help-block">2 Person/ Room</span></div>
									<div class="col-md-3"><span class="help-block">3 Person/ Room</span></div>
									<div class="col-md-3"><span class="help-block">4 Person/ Room</span></div>
								</div>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Bed Type : </b></label>
                        <div class="col-md-9">
                           <div class="row">
								<div class="col-md-12">
									<div class="col-md-3"><input name="1person_bed_type" class="form-control" type="text" value="<?php echo $row->oneperson_bed_type; ?>"></div>
									<div class="col-md-3"><input name="2person_bed_type" class="form-control" type="text" value="<?php echo $row->twoperson_bed_type; ?>"></div>
									<div class="col-md-3"><input name="3person_bed_type" class="form-control" type="text" value="<?php echo $row->threeperson_bed_type; ?>"></div>
									<div class="col-md-3"><input name="4person_bed_type" class="form-control" type="text" value="<?php echo $row->fourperson_bed_type; ?>"></div>
								</div>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label class="control-label col-md-6"><b>Check In </b></label>
								<div class="col-md-6">
									<input name="checkintime" class="form-control" id="timepicker1" type="text" value="<?php echo $row->checkintime; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<label class="control-label col-md-5"><b>Check Out </b></label>
								<div class="col-md-7">
									<input name="checkouttime" class="form-control" id="timepicker2" type="text" value="<?php echo $row->checkouttime; ?>">
								</div>
							</div>
						</div>	
						<script>
							$('#timepicker1').timepicki();
							$('#timepicker2').timepicki();
						</script>
					 </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Accommodation Type</b></label>
                        <div class="col-md-9">
							
							<div class="row">
							<?php 
							if($row->actype != "")
							{
							 
								$chkbox2 = $row->actype;
								if($chkbox2 =='Capsule' || $chkbox2 =='Chalet' || $chkbox2 =='Hotel')
								{
							?>
							<label class="checkbox-inline"><input type="radio" class="styled" name="actype" value="Capsule" <?php echo ($chkbox2=='Capsule')?'checked':'' ?>>Capsule</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="actype" value="Chalet" <?php echo ($chkbox2=='Chalet')?'checked':'' ?>>Chalet</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="actype" value="Hotel" <?php echo ($chkbox2=='Hotel')?'checked':'' ?>>Hotel</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" id="chkacctypeothers" name="actype"/>OTHERS</label>
							<label class="checkbox-inline"><div id="dvaccomodationtype" style="display: none">
							<input type="text" name="actype" /></div></label>
							<script type="text/javascript">
								$(function () {
									$("input[name='actype']").click(function () {
										if ($("#chkacctypeothers").is(":checked")) {
											$("#dvaccomodationtype").show();
										} else {
											$("#dvaccomodationtype").hide();
										}
									});
								});
							</script>
							<?php 
								}
								else
								{
							?>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="actype" value="<?php echo $chkbox2; ?>" 
							<?php echo ($chkbox2==$chkbox2)?'checked':'' ?> ><?php echo $chkbox2; ?></label>
							
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="actype" value="Capsule">Capsule</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="actype" value="Chalet">Chalet</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="actype" value="Hotel">Hotel</label>					
							<label class="checkbox-inline">		
							<input type="radio" class="styled" id="chkacctypeothers1" name="actype"/>OTHERS</label>
							<label class="checkbox-inline"><div id="dvaccomodationtype1" style="display: none">
							<input type="text" name="actype" /></div></label>
							<script type="text/javascript">
								$(function () {
									$("input[name='actype']").click(function () {
										if ($("#chkacctypeothers1").is(":checked")) {
											$("#dvaccomodationtype1").show();
										} else {
											$("#dvaccomodationtype1").hide();
										}
									});
								});
							</script>
							<?php 
								}
							
							}
							else
							{
							?>
							<label class="checkbox-inline" style="padding-left:0px;">
							<input type="radio" class="styled" name="actype" value="Capsule">Capsule</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="actype" value="Chalet">Chalet</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="actype" value="Hotel">Hotel</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" id="chkacctypeothers2" name="actype"/>OTHERS</label>
							<label class="checkbox-inline"><div id="dvaccomodationtype2" style="display: none">
							<input type="text" name="actype" /></div></label>
							<script type="text/javascript">
								$(function () {
									$("input[name='actype']").click(function () {
										if ($("#chkacctypeothers2").is(":checked")) {
											$("#dvaccomodationtype2").show();
										} else {
											$("#dvaccomodationtype2").hide();
										}
									});
								});
							</script>
							<?php
							}
							?>
							</div>
							
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Amenities</b></label>
                        <div class="col-md-9">
							
							<?php 
								$chkbox0051 = $row->amenities;
								$chkbox005=explode(",",$chkbox0051);

							?>
							<div class="row">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Wi-fi" 
							<?php if(in_array("Wi-fi",$chkbox005)){echo "checked";}?>>Wi-fi</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Television" 
							<?php if(in_array("Television",$chkbox005)){echo "checked";}?>>Television</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Refrigerator" 
							<?php if(in_array("Refrigerator",$chkbox005)){echo "checked";}?>>Refrigerator</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Toiletries" 
							<?php if(in_array("Toiletries",$chkbox005)){echo "checked";}?>>Toiletries</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Fan" 
							<?php if(in_array("Fan",$chkbox005)){echo "checked";}?>>Fan</label>
							</div>
							<div class="row">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Air-Cond" 
							<?php if(in_array("Air-Cond",$chkbox005)){echo "checked";}?>>Air-Cond</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Locker" 
							<?php if(in_array("Locker",$chkbox005)){echo "checked";}?>>Locker</label>
							</div>

                        </div>
                     </div>
				</fieldset>
				<fieldset title="4">
				<legend class="text-semibold">Other Details</legend>
					<div class="form-group">
						<label class="control-label col-md-12" style="color: #ff5722;"><b>OTHER INFORMATION TO DISPLAY: </b></label>
					 </div>
					 
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Diver Certification</b></label>
                        <div class="col-md-9">
						<?php 
						 $chkbox8=$row->diver_certification;
						 $arr1=explode(",",$chkbox8);						 
						 ?>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="divercertification[]" value="Non-Diver" 
		<?php if(in_array("Non-Diver",$arr1)){echo "checked";}?>>NON-DIVER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="divercertification[]" value="Owd" 
		<?php if(in_array("Owd",$arr1)){echo "checked";}?>>OWD</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="divercertification[]" value="Aow" 
		<?php if(in_array("Aow",$arr1)){echo "checked";}?>>AOW</label>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Diver Experience</b></label>
                        <div class="col-md-9">
						<?php 
						 $chkbox9=$row->diver_experience;
						 $arr2=explode(",",$chkbox9);						 
						 ?>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverexperience[]" value="Novice" 
		<?php if(in_array("Novice",$arr2)){echo "checked";}?>>NOVICE</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverexperience[]" value="Advanced" 
		<?php if(in_array("Advanced",$arr2)){echo "checked";}?>>ADVANCED</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverexperience[]" value="Experienced" 
		<?php if(in_array("Experienced",$arr2)){echo "checked";}?>>EXPERIENCED</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverexperience[]" value="Non-Diver" 
		<?php if(in_array("Non-Diver",$arr2)){echo "checked";}?>>NON-DIVER</label>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Diver Specialties</b></label>
                        <div class="col-md-9">
						<?php 
						 $chkbox10=$row->diver_specialties;
						 $arr3=explode(",",$chkbox10);						 
						 ?>
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverspecialties[]" value="Altitude Diver" 
		<?php if(in_array("Altitude Diver",$arr3)){echo "checked";}?>>ALTITUDE DIVER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverspecialties[]" value="Cavern Diver" 
		<?php if(in_array("Cavern Diver",$arr3)){echo "checked";}?>>CAVERN DIVER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverspecialties[]" value="Deep Diver" 
		<?php if(in_array("Deep Diver",$arr3)){echo "checked";}?>>DEEP DIVER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverspecialties[]" value="Wreck Diver" 
		<?php if(in_array("Wreck Diver",$arr3)){echo "checked";}?>>WRECK DIVER</label>
							</div>
                        </div>
                     </div>
					
					 <div class="form-group">
						<div class="row">
							<div class="col-md-7">
								<label class="control-label col-md-5"><b>Country</b></label>
								<div class="col-md-7">
									<select class="selectboxit selectbox-bootstrap btn-warning enabled btn legitRipple form-control" name="edit_dive_center_country" id="scountry">
										<?php 
										$isp = $row->country;
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
										$iep = $row->island;
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
									<input name="gpsx" class="form-control" type="text" placeholder="GPS COORDINATES X" value="<?php echo $row->gpsx; ?>">
									<span class="help-block"></span>
								</div>
								<div class="col-md-6">
									 <input name="gpsy" class="form-control" type="text" placeholder="GPS COORDINATES Y" value="<?php echo $row->gpsy; ?>">
									<span class="help-block"></span>
								</div>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Dive Sites</b></label>
                        <div class="col-md-9">       					   
							<!-- Basic example -->
							<div class="panel panel-flat">
								<div class="panel-body">
									<select multiple="multiple" class="form-control listbox" name="divesites[]">
										<option value="<?php echo $row->dive_sites; ?>"><?php echo $row->dive_sites; ?></option>
										<option value="Goral Garden">Goral Garden </option>
										<option value="Batu Ikan">Batu Ikan</option>
										<option value="Renggis">Renggis</option>
									</select>
								</div>
							</div>
							<!-- /basic example -->
                        </div>						
                     </div>
				</fieldset>
				<fieldset title="5">
				<legend class="text-semibold">Gallery</legend>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Gallery</b></label>
						<div class="col-md-9">
							<div class="col-md-3">
								<img src="<?php echo base_url(); ?>upload/DCprofile/gallery/<?php echo $row->photo; ?>" width="100px" height="100px;" style="border:1px solid #999999;box-shadow: 1px 1px 7px #999999;">
							</div>
							<div class="col-md-9">
								<div class="row" style="width: 100%; height: 300px; overflow-y: scroll;">
								<?php 
									$data1=$this->db->get_where('tbl_gallery', array('user_id'=>$this->session->userdata('user_id')))->result_array();
									foreach ($data1 as $a1) 
									{?>
										<div class="col-md-3">
											<img src="<?php echo base_url(); ?>upload/DCprofile/gallery/<?php echo $a1['gallery']; ?>" 
											class="img-responsive" style="width:150px;height:100px;">
										   <p align="center"><input type="radio" value="<?php echo $a1['gallery']; ?>" name="gallery"></p>
										</div>								
								   <?php
									}
								  ?>
								</div>
							</div>
						</div>				
					</div>
				</fieldset>
				<input type="submit" name="Update_DCpackage_Data" value="Update" class="btn btn-success stepy-finish">
               </form>
			   
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