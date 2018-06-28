<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/stepywizerd/css/jquery.stepy.css'); ?>" />

<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Guided Tours</li>
   </ul>
</div>
<br>

<div class="row">
   <div class="col-md-12">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Guided Tours</h2>
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
					<li ><a href="<?php echo base_url(); ?>DCguidedtours/DCguidedtourslist" >Dashboard</a></li>
					<li class="active"><a href="<?php echo base_url(); ?>DCguidedtours/addNew" >Add Customized Product</a></li>
				</ul>

				<div class="tab-content">
					<div class="active">

						 <div class="container-fluid">
            <!-- content Starts Here-->
			<div class="row">
				<div class="col-md-12">
					<!-- Multiple buttons -->
						
						<div class="panel-body1">
							<?php if($message == "FAILED") { ?>
               <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Action Failed !!! </strong>
               </div>
               <?php } else if($message == "SUCCESS") {  ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success !!! </strong> New Data Created successfully
               </div>
               <?php 
			   //redirect(base_url().'slider/sliderList');
			   } ?>
	<form name="add" method="POST" action="<?php echo  base_url();?>DCguidedtours/addNew" class="form-horizontal form-validate-jquery" enctype="multipart/form-data" id="custom">
	
	<fieldset title="1">
		<legend class="text-semibold">General Info</legend>
		<div class="form-group">
                        <label class="control-label col-md-3"><b>Product Name</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <input name="name" class="form-control" type="text" data-popup="tooltip" title="Product name(It is required field)" data-placement="bottom" required="">
                           <span class="help-block"></span>
                        </div>
                     </div>

					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Description</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
						    <textarea name="description" class="form-control" id="editor-full1" data-popup="tooltip" title="Product Description(It is required field)" data-placement="bottom" required=""></textarea>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
				<label class="control-label col-md-3"><b>Product Includes</b></label>
				<div class="col-md-9">
				   <input name="productincludes1" class="form-control" type="text" data-placement="bottom">
				   <span class="help-block"></span>
				</div>
			 </div>
			 <div class="form-group">
				<label class="control-label col-md-3"><b>Product Excludes</b></label>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-10">
							<input name="productexcludes1" class="form-control" data-placement="bottom">
							<span class="help-block"></span>
						</div>
						<div class="col-md-2">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="display" value="display" checked>Display</label>
						</div>
					</div>                     
				</div>
			 </div>
			<div class="form-group">
				<label class="control-label col-md-3"><b>Or Select From a List of Common options</b> <strong style="color:red;">*</strong></label>
				<div class="col-md-9">
					<div class="row">
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td></td>
									<td><b>Includes</b></td>
									<td><b>Excludes</b></td>
									<td></td>
									<td><b>Includes</b></td>
									<td><b>Excludes</b></td>
								</tr>
								
								<tr>
									<td>FULL EQUIPMENT RENTAL</td>
									<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="FULL EQUIPMENT RENTAL"></td>
									<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="FULL EQUIPMENT RENTAL"></td>
									<td>LUNCH</td>
									<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="LUNCH"></td>
									<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="LUNCH"></td>
								</tr>
								<tr>
									<td>DINNER</td>
									<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="DINNER"></td>
									<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="DINNER"></td>
									<td>TRANSFER FROM JETTY</td>
									<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="TRANSFER FROM JETTY"></td>
									<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="TRANSFER FROM JETTY"></td>
								</tr>
								<tr>
									<td>TRANSFER FROM HOTEL</td>
									<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="TRANSFER FROM HOTEL"></td>
									<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="TRANSFER FROM HOTEL"></td>
									<td>MARINE PARK FEE</td>
									<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="MARINE PARK FEE"></td>
									<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="MARINE PARK FEE"></td>
								</tr>
								<tr>
									<td>DC TO DIVE SITE</td>
									<td align="center"><input type="checkbox" class="styled" name="productincludes[]" value="DC TO DIVE SITE"></td>
									<td align="center"><input type="checkbox" class="styled" name="productexcludes[]" value="DC TO DIVE SITE"></td>

								</tr>
							</table>
						</div>
					</div>                     
				</div>
			 </div>
					 
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Other Information</b></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-10">
									<input name="otherinformation" class="form-control" type="text" data-popup="tooltip" title="Other Information(It is required field)" data-placement="bottom" required="">
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
								<label class="control-label col-md-6"><b>Product Category : </b> <strong style="color:red;">*</strong></label>
								<div class="col-md-6">
									<input name="productcategory" class="form-control" type="text" data-popup="tooltip" title="Product Category(It is required field)" data-placement="bottom" value="Guided Tours" required>
								</div>
							</div>
							<div class="col-md-6">
								<label class="control-label col-md-4"><b>Product Keyword : </b></label>
								<div class="col-md-8">
									<select name="productkeyword[]" class="form-control multiselect-filtering" data-popup="tooltip" title="Product Keyword(It is required field)" data-placement="bottom" multiple="multiple">
										<?php 
											$data=$this->db->get('tbl_product_keywords')->result_array();
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
											
											<input type="text" name="bpdatestart" value="" id="dpd1" class="form-control" data-popup="tooltip" title="Start Date(It is required field)" data-placement="bottom">
											
										</div>
									</div>
									<div class="col-md-6">
										<label class="control-label col-md-4"><b>End Date </b></label>
										<div class="col-md-8">
											
											<input type="text" name="bpdateend" value="" id="dpd2" class="form-control" data-popup="tooltip" title="End Date(It is required field)" data-placement="bottom">
											
										</div>
									</div>
								</div>
							</div>
						</div>
							<script>
							$(document).ready(function(){
								
								// Booking peroid
								
								
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
											
											<input type="text" name="tpdatestart" value="" id="dpd3" class="form-control" data-popup="tooltip" title="Start Date(It is required field)" data-placement="bottom">
											
										</div>
									</div>
									<div class="col-md-6">
										<label class="control-label col-md-4"><b>End Date </b></label>
										<div class="col-md-8">
											
											<input type="text" name="tpdateend" value="" id="dpd4" class="form-control" data-popup="tooltip" title="End Date(It is required field)" data-placement="bottom">
											
										</div>
									</div>
								</div>
							</div>
						</div>
						
					 </div>
					 <script>
					$(document).ready(function(){
					$(".sequence_number").on("input", function(evt) {
					   var self = $(this);
					   self.val(self.val().replace(/[^\d].+/, ""));
					   if ((evt.which < 48 || evt.which > 57)) 
					   {
						 evt.preventDefault();
					   }
					 });
					 
					});

					</script>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Sequence Number</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <input name="sequence_number" class="form-control sequence_number" type="text" data-placement="bottom" required="">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Status</b></label>
                        <div class="col-md-9">
                           <label class="checkbox-inline"><input type="radio" class="styled" name="productstatus" value="Available">AVAILABLE</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="productstatus" value="Hidden" checked>HIDDEN</label>
                        </div>
                     </div>
	</fieldset>

	<fieldset title="2">
		<legend class="text-semibold">Pricing Options</legend>
		<div class="form-group">
						<label class="control-label col-md-3"><b>Product Unit :</b> <strong style="color:red;">*</strong></label>
						<div class="col-md-9">
							<label class="checkbox-inline" style="padding-left:0px;">
							<input type="radio" class="styled" name="productunits" value="Dive" id="chkproductunitno">Dive</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="Pax" id="chkproductunitno">Pax</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="Trip" id="chkproductunitno">Trip</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" id="chkproductunitothers" name="productunits"/>OTHERS</label>
							<label class="checkbox-inline"><div id="dvproductunit" style="display: none">
							<input type="text" name="productunits" /></div></label>
						</div>
						<script type="text/javascript">
							$(function () {
								$("input[name='productunits']").click(function () {
									if ($("#chkproductunitothers").is(":checked")) {
										$("#dvproductunit").show();
									} else {
										$("#dvproductunit").hide();
									}
								});
							});
						</script>
				
					 </div>

					  <div class="form-group">
						<label class="control-label col-md-3"><b>Product Max / Day </b></label>
						<div class="col-md-7">
						   <input name="productmaxday" class="form-control productmaxday1" type="text" id="productmaxday1" data-popup="tooltip" title="Product Max(It is required field)" data-placement="bottom" value="No Limit" disabled>
						   <span class="help-block"></span>
						</div>
						<div class="col-md-2">
							<label class="checkbox-inline"><input type="checkbox" class="styled" id="nolimit" name="productmaxday" value="No Limit" checked>No Max</label>
						</div>
						<script>
							$(document).ready(function(){
								
								$("#nolimit").click(function() {
								$(".productmaxday1").val("No Limit");
								});
							});
						
							document.getElementById('nolimit').onchange = function() {
								document.getElementById('productmaxday1').disabled = this.checked;
							};
						</script>
					 </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Price</b></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<label class="control-label col-md-3">Single Room</label>
									 <div class="col-md-6">
										<input name="single_room" class="form-control" type="text" data-popup="tooltip" title="Single Room(It is required field)" data-placement="bottom">
									</div>
									<div class="col-md-3"><span class="help-block">MYR / PAX</span></div>
								</div>
								<div class="col-md-6">
									<label class="control-label col-md-3">Twin Room</label>
									 <div class="col-md-6">
										<input name="twin_room" class="form-control" type="text" data-popup="tooltip" title="Twin Room(It is required field)" data-placement="bottom">
									</div>
									<div class="col-md-3"><span class="help-block">MYR / PAX</span></div>
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-6">
									<label class="control-label col-md-3">3 Person Room</label>
									 <div class="col-md-6">
										<input name="three_person_room" class="form-control" type="text" data-popup="tooltip" title="3 Person Room(It is required field)" data-placement="bottom">
									</div>
									<div class="col-md-3"><span class="help-block">MYR / PAX</span></div>
								</div>
								<div class="col-md-6">
									<label class="control-label col-md-3">Quad Room</label>
									 <div class="col-md-6">
										<input name="quad_room" class="form-control" type="text" data-popup="tooltip" title="Quad Room(It is required field)" data-placement="bottom">
									</div>
									<div class="col-md-3"><span class="help-block">MYR / PAX</span></div>
								</div>
							</div>
                        </div>
                     </div>

					 <hr style="width:100%;">
		 <div class="form-group">
			<label class="control-label col-md-3"><b>Apply Discount for <br>Bulk Purchase? </b></label>
			 <div class="col-md-9">
			<label class="checkbox-inline" style="padding-left:0px;">
			<input type="radio" class="styled" name="dcdiscountpurchase" value="Yes" onClick="showTextBox2()">YES</label>
			<label class="checkbox-inline"><input type="radio" class="styled" name="dcdiscountpurchase" value="No" onClick="showTextBox3()" checked>NO</label>
			</div>
		 </div>
		 <div class="textBox1" style="display:none;background:#eeeeee;padding:1%;">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label col-md-4"><b>Discount Unit : </b></label>
						 <div class="col-md-8">
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="dcdiscountunit" value="%">% OR </label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="dcdiscountunit" value="$"> $ </label>
						</div>
					 </div>
					 <div class="form-group">
						
						<div class="col-md-12">
							<div class="field_wrapper">
								<div style="border:1px solid gray;padding:10px;">
									Range <input type="text" name="startrange[]" style="width:30px" value="3"/> TO <input type="text" name="endrange[]" style="width:30px" value="4"/>
									DISCOUNT RATE : <input type="text" name="field_name[]" style="width:50px" id="input2" /> 
									<a href="javascript:void(0);" class="add_button" title="Add field">
									<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/>
									</a>
									<label style="background:#62bd18;border:1px solid #62bd18;color:#fff;" class="Purchase_promo">Show new price</label>
								</div>
							</div><br>
						</div>
					 </div>
				</div>
				<script  type="text/javascript">
				$(document).ready(function() {
					$("#input2").keyup(function () {
						var amt = parseFloat($('#input1').val());
						var dis = parseFloat($('#input2').val());
						
						var dis_rate = amt * dis / 100;
						
						var final_amt = amt - dis_rate;
						$('#output').val(final_amt);
					});
				 
						 
				});
				</script>
				
				<div class="col-md-12">
					<div class="table-responsive show_Purchase_promo" style="background:skyblue;display:none;">
						<table class="table">
							<tr><td colspan="3">Range : 3 to 4</td></tr>
							<tr>
								<td style="font-size: 11px;">Single Room</td>
								<td style="font-size: 11px;">Twin Room</td>
								<td style="font-size: 11px;">3 Person Room</td>
								<td style="font-size: 11px;">Quad Room</td>
							</tr>
							<tr>
								<td><input type="text" style="width: 50px;"> MYR/PAX</td>
								<td><input type="text" style="width: 50px;"> MYR/PAX</td>
								<td><input type="text" style="width: 50px;"> MYR/PAX</td>
								<td><input type="text" style="width: 50px;"> MYR/PAX</td>
							</tr>
						</table>
					</div>
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
			var fieldHTML = '<div style="border:1px solid gray;padding:10px;">Range <input type="text" name="startrange[]" style="width:30px"> TO <input type="text" name="endrange[]" style="width:30px"> DISCOUNT RATE : <input type="text" name="field_name[]" value="8" style="width:50px"/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/></a><label style="background:#62bd18;border:1px solid #62bd18;color:#fff;" class="Purchase_promo">Show new price</label></div>'; //New input field html 
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
		
		$(document).ready(function(){
				$(".Purchase_promo").click(function(){
		//logic to show/hide collapsable content
				$(".show_Purchase_promo").toggle();
				});
				});
		</script>
					 <hr style="width:100%;">
					<div class="form-group">
			<label class="control-label col-md-3"><b>Apply Promo? </b></label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left:0px;">
				<input type="radio" class="styled" id="chkapplypromoyes" name="dcapplypromo" value="Yes">YES</label>
				<label class="checkbox-inline"><input type="radio" class="styled" name="dcapplypromo" id="chkapplypromono" value="No" checked>NO</label>
			</div>
		</div>
		<div id="dvapplypromo" style="display:none;background:#eeeeee;padding:1%;">
		 <link href="<?php echo base_url('assets/new/css/datepicker.css');?>" rel="stylesheet">
					<script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js');?>"></script>
		 
		 <div class="row">
			<div class="col-md-12">
				 <div class="form-group">
			<label class="control-label col-md-3"><b>Start Date : </b></label>
			<div class="col-md-3">
				<input type="text" name="applypromo_startdate" value="" id="dpd99" class="form-control">
			</div>
			<label class="control-label col-md-3"><b>End Date : </b></label>
			<div class="col-md-3">
				<input type="text" name="applypromo_enddate" value="" id="dpd100" class="form-control">
			</div>
			<script>
				$(document).ready(function(){
					  var nowTemp = new Date();
						var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

						var checkin = $('#dpd99').datepicker({
						
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
							$('#dpd100')[0].focus();
						}).data('datepicker');
						var checkout = $('#dpd100').datepicker({
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
				<label class="checkbox-inline" style="padding-left:0px;">
				<input type="radio" class="styled" name="apdiscountunit" value="%">% OR </label>
				<label class="checkbox-inline"><input type="radio" class="styled" name="apdiscountunit" value="$"> $ </label>
			</div>
		 </div>
		 <div class="form-group">
			<label class="control-label col-md-3"><b>Discount Rate : </b></label>
			<div class="col-md-9">
			   <input name="apdiscountrate" class="form-control" type="text" data-popup="tooltip" title="Product Name(It is required field)" data-placement="bottom">
			   <span class="help-block"></span>
			</div>
		 </div>
		 <div class="form-group">
			<label class="control-label col-md-9"><b>Product Price After Promo Discount : </b></label>
			<div class="col-md-3">
			  <label style="font-size: 12px;background:#62bd18;border:1px solid #62bd18;color:#fff;" class="Apply_promo">show new price</label>
			</div>
		 </div>
			</div>
			<div class="col-md-12">
				<div class="table-responsive show_Apply_promo" style="background:skyblue;display:none;">
					<table class="table">
						<tr>
								<td style="font-size: 11px;">Single Room</td>
								<td style="font-size: 11px;">Twin Room</td>
								<td style="font-size: 11px;">3 Person Room</td>
								<td style="font-size: 11px;">Quad Room</td>
							</tr>
							<tr>
								<td><input type="text" style="width: 50px;"> MYR/PAX</td>
								<td><input type="text" style="width: 50px;"> MYR/PAX</td>
								<td><input type="text" style="width: 50px;"> MYR/PAX</td>
								<td><input type="text" style="width: 50px;"> MYR/PAX</td>
							</tr>
					</table>
				</div>
			</div>
		 </div>
		 </div>
		 <script type="text/javascript">
			$(document).ready(function(){
			$(".Apply_promo").click(function(){
	//logic to show/hide collapsable content
			$(".show_Apply_promo").toggle();
			});
			});
			$(function () {
				$("input[name='dcapplypromo']").click(function () {
					if ($("#chkapplypromoyes").is(":checked")) {
						$("#dvapplypromo").show();
					} else {
						$("#dvapplypromo").hide();
					}
				});
			});
		</script>
		 <hr style="width:100%;">
		 <div class="form-group">
			<label class="control-label col-md-3"><b>Apply Promo for <br>Bulk Discount? </b></label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left:0px;">
				<input type="radio" name="apbulkdiscount" class="styled" onClick="showTextBox96()">YES</label>
				<label class="checkbox-inline"><input type="radio" class="styled" name="apbulkdiscount" onClick="showTextBox95()" value="No" checked>NO</label>
			</div>
		 </div>
		 <div class="apbulkdiscount" style="display:none;background:#eeeeee;padding:1%;">
			<div class="form-group">
				<div class="col-md-12">
					<div class="table-responsive" style="border:1px solid #ccc;">
						<table class="table">
							<tr>
							<td>Range</td>
							<td><input type="text" value="3" disabled style="width: 50px;"></td>
							<td>To</td>
							<td><input type="text" value="4" disabled style="width: 50px;"></td>
							<td><label style="background:#62bd18;border:1px solid #62bd18;color:#fff;" class="Bulk_promo">Show new price</label></td></td>
							</tr>
							<tr>
							<td>Range</td>
							<td><input type="text" value="5" disabled style="width: 50px;"></td>
							<td>To</td>
							<td><input type="text" value="6" disabled style="width: 50px;"></td>
							<td><label style="background:#62bd18;border:1px solid #62bd18;color:#fff;" class="Bulk_promo">Show new price</label></td></td>
							</tr>
							<tr>
							<td>Range</td>
							<td><input type="text" value="7" disabled style="width: 50px;"></td>
							<td>To</td>
							<td><input type="text" value="8" disabled style="width: 50px;"></td>
							<td><label style="background:#62bd18;border:1px solid #62bd18;color:#fff;" class="Bulk_promo">Show new price</label></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-12" >
					<div class="table-responsive show_bulk_promo" style="background:skyblue;display:none;">
						<table class="table">
							<tr><td colspan="3">Range : 3 to 4</td></tr>
							<tr>
								<td style="font-size: 11px;">Single Room</td>
								<td style="font-size: 11px;">Twin Room</td>
								<td style="font-size: 11px;">3 Person Room</td>
								<td style="font-size: 11px;">Quad Room</td>
							</tr>
							<tr>
								<td><input type="text" style="width: 50px;"> MYR/PAX</td>
								<td><input type="text" style="width: 50px;"> MYR/PAX</td>
								<td><input type="text" style="width: 50px;"> MYR/PAX</td>
								<td><input type="text" style="width: 50px;"> MYR/PAX</td>
							</tr>
						</table>
					</div>
				</div>
			 </div>
		 </div>
		 <script>
			$(document).ready(function(){
			$(".Bulk_promo").click(function(){
	//logic to show/hide collapsable content
			$(".show_bulk_promo").toggle();
			});
			});
			function showTextBox96() {
					$(".apbulkdiscount").show();
				}
				function showTextBox95() {
					$(".apbulkdiscount").hide();
				}
		 </script>
		  <hr style="width:100%;">
					<div class="form-group">
			<label class="control-label col-md-3"><b>Optional Services : </b></label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left:0px;">
				<input type="radio" name="optionalservices1" class="styled" onClick="showTextBox94()">YES</label>
				<label class="checkbox-inline"><input type="radio" class="styled" name="optionalservices1" onClick="showTextBox93()" value="No" checked>NO</label>
			</div>	
		 </div>			
		<div class="optionalservices1" style="display:none;background:#eeeeee;padding:1%;">
			<div class="row">
				<div class="col-md-3">Services</div>
				<div class="col-md-3">Price of Service</div>
				<div class="col-md-3">Quantity Require?</div>
				<div class="col-md-3">&nbsp;</div>
			</div>
			<div class="field_wrapper2">
				<div style="border:1px solid gray;padding:10px;">
					<input type="text" name="services[]" style="width:200px"/> Price : <input type="text" name="price_of_service[]" style="width:170px"/>
					<select name="quantity_require[]" style="width:200px"><option value="N">N</option><option value="Y">Y</option></select>
					<a href="javascript:void(0);" class="add_button2" title="Add field">
					<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/>
					</a>
				</div>
			</div>

		</div>
		<script type="text/javascript">
			function showTextBox94() {
					$(".optionalservices1").show();
				}
				function showTextBox93() {
					$(".optionalservices1").hide();
				}
					
		$(document).ready(function(){
			var maxField = 10; //Input fields increment limitation
			var addButton = $('.add_button2'); //Add button selector
			var wrapper = $('.field_wrapper2'); //Input field wrapper
			var fieldHTML = '<div style="border:1px solid gray;padding:10px;"><input type="text" name="services[]" style="width:200px"/> Price : <input type="text" name="price_of_service[]" style="width:170px"/><select name="quantity_require[]" style="width:200px"><option value="N">N</option><option value="Y">Y</option></select><a href="javascript:void(0);" class="remove_button2" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/></a></div>'; //New input field html 
			var x = 1; //Initial field counter is 1
			$(addButton).click(function(){ //Once add button is clicked
				if(x < maxField){ //Check maximum number of input fields
					x++; //Increment field counter
					$(wrapper).append(fieldHTML); // Add field html
				}
			});
			$(wrapper).on('click', '.remove_button2', function(e){ //Once remove button is clicked
				e.preventDefault();
				$(this).parent('div').remove(); //Remove field html
				x--; //Decrement field counter
			});
		});
		</script>	
	</fieldset>

	<fieldset title="3">
		<legend class="text-semibold">Accommodation</legend>
		<div class="form-group">
						<label class="control-label col-md-12" style="color: #ff5722;"><b>ACCOMMODATION DETAILS</b></label>
					 </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Accommodation Name : </b></label>
                        <div class="col-md-9">
                           <input name="accomodation_name" class="form-control" type="text" data-popup="tooltip" title="Accommodation Name(It is required field)" data-placement="bottom">
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
									<div class="col-md-3"><input name="1person_bed_type" class="form-control" type="text" data-popup="tooltip" title="Bed Type(It is required field)" data-placement="bottom"></div>
									<div class="col-md-3"><input name="2person_bed_type" class="form-control" type="text" data-popup="tooltip" title="Bed Type(It is required field)" data-placement="bottom"></div>
									<div class="col-md-3"><input name="3person_bed_type" class="form-control" type="text" data-popup="tooltip" title="Bed Type(It is required field)" data-placement="bottom"></div>
									<div class="col-md-3"><input name="4person_bed_type" class="form-control" type="text" data-popup="tooltip" title="Bed Type(It is required field)" data-placement="bottom"></div>
								</div>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label class="control-label col-md-6"><b>Check In </b></label>
								<div class="col-md-6">
									<input name="checkintime" class="form-control" id="timepicker1" type="text" data-popup="tooltip" title="Check In(It is required field)" data-placement="bottom">
								</div>
							</div>
							<div class="col-md-6">
								<label class="control-label col-md-5"><b>Check Out </b></label>
								<div class="col-md-7">
									<input name="checkouttime" class="form-control" id="timepicker2" type="text" data-popup="tooltip" title="Check Out(It is required field)" data-placement="bottom">
								</div>
							</div>
						</div>
						<script>
							$('#timepicker1').timepicki({start_time: ["03","00","PM"]});
							$('#timepicker2').timepicki({start_time: ["12","00","PM"]});
						</script>
					 </div>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Accommodation Type</b></label>
						<div class="col-md-5">
							<label class="checkbox-inline"><input type="radio" class="styled" name="actype" value="Capsule" id="chkacctypeno">Capsule</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="actype" value="Chalet" id="chkacctypeno">Chalet</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="actype" value="Hotel" id="chkacctypeno">Hotel</label>
						</div>
						<div class="col-md-2">
							<label class="checkbox-inline">
							<input type="radio" class="styled" id="chkacctypeothers" name="actype"/>OTHERS</label>
						</div>
						<div class="col-md-2">
							<label class="checkbox-inline"><div id="dvaccomodationtype" style="display: none">
							<input type="text" name="actype" /></div></label>
						</div>
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
				
					 </div>
					<div class="form-group">
                        <label class="control-label col-md-3"><b>Amenities</b></label>
                        <div class="col-md-9">
							<div class="row">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Wi-fi" onClick="getResults(this)">Wi-fi</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Television" onClick="getResults(this)">Television</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Refrigerator" onClick="getResults(this)">Refrigerator</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Toiletries" onClick="getResults(this)">Toiletries</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Fan" onClick="getResults(this)">Fan</label>
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Air-Cond" onClick="getResults(this)">Air-Cond</label>
							</div>
							<div class="row">
							<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Locker" onClick="getResults(this)">Locker</label>
							<label class="checkbox-inline">
							<input type="checkbox" class="styled" value="others" onClick="getResults(this)"/>OTHERS</label>
							<label class="checkbox-inline"><div id="dvProductunits2" style="display: none">
							<input type="text" name="amenities[]" /></div></label>
							</div>
                        </div>
						<script type="text/javascript">							
							$(document).ready(function() {
								$("#dvProductunits2").hide()									
							});
							function getResults(elem) {
								elem.checked && elem.value == "others" ? $("#dvProductunits2").show() : $("#dvProductunits2").hide();
							};
						</script>
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
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="divercertification[]" value="Non-Diver">NON-DIVER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="divercertification[]" value="Owd">OWD</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="divercertification[]" value="Aow">AOW</label>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Diver Experience</b></label>
                        <div class="col-md-9">
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverexperience[]" value="Novice">NOVICE</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverexperience[]" value="Advanced">ADVANCED</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverexperience[]" value="Experienced">EXPERIENCED</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverexperience[]" value="Non-Diver">NON-DIVER</label>
							</div>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Diver Specialties</b></label>
                        <div class="col-md-9">
							<div class="row">
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverspecialties[]" value="Altitude Diver">ALTITUDE DIVER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverspecialties[]" value="Cavern Diver">CAVERN DIVER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverspecialties[]" value="Deep Diver">DEEP DIVER</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled" name="diverspecialties[]" value="Wreck Diver">WRECK DIVER</label>
							</div>
                        </div>
                     </div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-7">
								<label class="control-label col-md-5"><b>Country</b></label>
								<div class="col-md-7">
								   <select class="form-control selectboxit selectbox-bootstrap btn-warning enabled btn legitRipple" name="dive_center_country" id="scountry"
								   data-popup="tooltip" title="Select Country(It is required field)" data-placement="bottom">
										<option label="Select Country"></option>
										<?php 
											$data=$this->db->get('tbl_country')->result_array();
											foreach ($data as $a) {?>
										   <option value="<?php echo $a['country_id'];?>"><?php echo $a['country_name'];?></option> 
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
									<select class="selectboxit selectbox-bootstrap btn-warning enabled btn legitRipple form-control" name="dive_center_island" id="islands"
									 data-popup="tooltip" title="Select Island(It is required field)" data-placement="bottom">
										<option label="Select Island"></option>
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
									<input name="gpsx" class="form-control" type="text" placeholder="GPS COORDINATES X" data-popup="tooltip" title="Enter Latitude(It is required field)" data-placement="bottom">
									<span class="help-block"></span>
								</div>
								<div class="col-md-6">
									 <input name="gpsy" class="form-control" type="text" placeholder="GPS COORDINATES Y" data-popup="tooltip" title="Enter longitide(It is required field)" data-placement="bottom">
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
									<select multiple="multiple" class="form-control listbox" name="divesites[]" data-popup="tooltip" title="Dive Sites(It is required field)" data-placement="bottom">
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
							<h5 class="control-label col-md-12" style="color: #ff5722;"><b>Gallery Section</b></h5>
						 </div>
						
						<div class="form-group">
							<label class="control-label col-md-3"><b>Gallery</b></label>
							<div class="col-md-9">
								<!--input name="gallery" class="form-control" value="" type="text"-->
								<span class="help-block"></span>
								<div class="row" style="width: 100%; height: 300px; overflow-y: scroll;">
								<?php 
									$data1=$this->db->get('tbl_gallery')->result_array();
									foreach ($data1 as $a1) 
									{?>
										<div class="col-md-3">
											<img src="<?php echo base_url(); ?>upload/DCprofile/gallery/<?php echo $a1['gallery']; ?>" 
											class="img-responsive" style="width:150px;height:100px;" data-popup="tooltip" title="Choose One Image(It is required field)" data-placement="bottom">
										   <p align="center"><input type="radio" value="<?php echo $a1['gallery']; ?>" name="gallery"></p>
										</div>								
								   <?php
									}
								  ?>
								</div>
							</div>
						</div>
	</fieldset>
	<!--button type="submit" class="btn btn-primary stepy-finish">Submit <i class="icon-check position-right"></i></button-->
	<input type="submit" name="submit_DCguidedtours_data" value="Add" class="btn btn-success stepy-finish">
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
	
						</div>
			
					<!-- /multiple button -->
				</div>
				
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

<script type="text/javascript">
			$(function() {

				

				$('#custom').stepy({
					backLabel:	'BACK',
					block:		true,
					errorImage:	true,
					nextLabel:	'NEXT',
					titleClick:	true,
					validate:	true
				});

				$('div#step').stepy({
					finishButton: false
				});

				// Optionaly
				$('#custom').validate({
					errorPlacement: function(error, element) {
						$('#custom div.stepy-error').append(error);
					}, rules: {
						'name':			{ maxlength: 1 },
						'email':		'email',
						'checked':		'required',
						'newsletter':	'required',
						'password':		'required',
						'bio':			'required',
						'day':			'required'
					}, messages: {
						'name':			{ maxlength: 'User field should be less than 1!' },
						'email':		{ email: 	 'Invalid e-mail!' },
						'checked':		{ required:  'Checked field is required!' },
						'newsletter':	{ required:  'Newsletter field is required!' },
						'password':		{ required:  'Password field is requerid!' },
						'bio':			{ required:  'Bio field is required!' },
						'day':			{ required:  'Day field is requerid!' },
					}
				});

			});
		</script>
