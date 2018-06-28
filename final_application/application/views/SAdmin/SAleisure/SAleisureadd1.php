
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/stepywizerd/css/jquery.stepy.css'); ?>" />
<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Leisure Dive</li>
   </ul>
</div>
<br>

<div class="row">
   <div class="col-md-12">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Leisure Dive</h2>
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
					<li ><a href="<?php echo base_url(); ?>SAleisure/SAleisuredashboard" >Dashboard</a></li>
					<li class="active"><a href="<?php echo base_url(); ?>SAleisure/addNew" >Add Standard Product</a></li>
					<!--li class="active"><a href="<?php echo base_url(); ?>DCleisure/addNew" >Add Customized Product</a></li-->
				</ul>

				<div class="tab-content">
					<div class="active">

						 <div class="container-fluid">
            <!-- content Starts Here-->
			<div class="row">
				<div class="col-md-12">
					<!-- Multiple buttons -->
						
						<div class="panel-body1">
						
	<form name="add" method="POST" action="<?php echo  base_url();?>SAleisure/addNew" class="form-horizontal form-validate-jquery" enctype="multipart/form-data" id="custom">
	
	<fieldset title="1">
		<legend class="text-semibold">General Info</legend>
		<div class="form-group">
			<label class="control-label col-md-3"><b>Product Name</b> <strong style="color:red;">*</strong></label>
			<div class="col-md-9">
			   <input name="name" class="form-control" type="text" data-popup="tooltip" title="Product name(It is required field)" data-placement="bottom" required="">
			   <span class="help-block" ></span>
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
				<label class="control-label col-md-3"><b>Product Includes</b> <strong style="color:red;">*</strong></label>
				<div class="col-md-9">
				   <input name="productincludes1" class="form-control" type="text" data-popup="tooltip" title="Product Includes(It is required field)" data-placement="bottom" >
				   <span class="help-block"></span>
				</div>
			 </div>
			 <div class="form-group">
				<label class="control-label col-md-3"><b>Product Excludes</b> <strong style="color:red;">*</strong></label>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-10">
							<input name="productexcludes1" class="form-control" type="text" data-popup="tooltip" title="Product Excludes(It is required field)" data-placement="bottom">
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
				<label class="control-label col-md-3"><b>Other Information</b> <strong style="color:red;">*</strong></label>
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
						<label class="control-label col-md-6"><b>Product Category : </b></label>
						<div class="col-md-6">
							<input name="productcategory" class="form-control" type="text" data-popup="tooltip" title="Product Category(It is required field)" data-placement="bottom" value="Leisure Dive">
						</div>
					</div>
					<div class="col-md-6">
						<label class="control-label col-md-4"><b>Product Keyword : </b></label>
						<div class="col-md-8">
							<select name="productkeyword[]" class="form-control multiselect-filtering" data-popup="tooltip" title="Product Keyword(It is required field)" data-placement="bottom" multiple="multiple">
								<?php 
									$data=$this->db->get_where('tbl_product_keywords', array('user_id'=> $this->session->userdata('user_id')))->result();
									foreach ($data as $pk) {?>
								   <option value="<?php echo $pk->keywords;?>" ><?php echo $pk->keywords;?></option> 
								   <?php
									}
								  ?>
							</select>
							
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
				<label class="control-label col-md-3"><b>Sequence Number</b></label>
				<div class="col-md-9">
				   <input name="sequence_number" class="form-control sequence_number" type="text" data-popup="tooltip" title="Sequence Number(It is required field)" data-placement="bottom" required="">
				   <span class="help-block"></span>
				</div>
			 </div>
			 <div class="form-group">
				<label class="control-label col-md-3"><b>Product Status</b></label>
				<div class="col-md-9 text-left" >
				   <label class="checkbox-inline" style="padding-left: 0px;"><input type="radio" class="styled" name="productstatus" value="Available">AVAILABLE</label>
					<label class="checkbox-inline"><input type="radio" class="styled" name="productstatus" value="Hidden">HIDDEN</label>
				</div>
			 </div>
	</fieldset>

	<fieldset title="2">
		<legend class="text-semibold">Pricing Options</legend>
		<div class="form-group">
			<label class="control-label col-md-3"><b>Product Unit :</b> <strong style="color:red;">*</strong></label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left: 0px;">
				<input type="radio" class="styled" name="productunits" value="Dive"  onClick="showTextBox1()"/>Dive</label>
				<label class="checkbox-inline">
				<input type="radio" class="styled" name="productunits" value="Pax"  onClick="showTextBox1()"/>Pax</label>
				<label class="checkbox-inline">
				<input type="radio" class="styled" name="productunits" value="Trip"  onClick="showTextBox1()"/>Trip</label>
				<label class="checkbox-inline">
				<input type="radio" class="styled" name="productunits" onClick="showTextBox()"/>OTHERS</label>
				<label class="checkbox-inline"><input type="text" name="productunits" class="textBox" hidden /></label>
			</div>

			<script type="text/javascript">
				function showTextBox() {
					$(".textBox").show('fast');
				}
				function showTextBox1() {
					$(".textBox").hide('fast');
				}
			</script>
			
		 </div>
		 
		  <div class="form-group">
			<label class="control-label col-md-3"><b>Max Dive/ Day </b></label>
			<div class="col-md-9">
			   <input name="maxdiveday" class="form-control" type="text" data-popup="tooltip" title="Max Dive(It is required field)" data-placement="bottom" required="">
			   <span class="help-block"></span>
			</div>
		 </div>
		  <div class="form-group">
			<label class="control-label col-md-3"><b>Product Max / Day </b></label>
			<div class="col-md-7">
			   <input name="productmaxday" class="form-control" type="text" id="productmaxday1" data-popup="tooltip" title="Product Max(It is required field)" data-placement="bottom" required="">
			   <span class="help-block"></span>
			</div>
			<div class="col-md-2">
				<label class="checkbox-inline"><input type="checkbox" class="styled" id="nolimit" name="productmaxday" value="NO LIMIT">NO LIMIT</label>
			</div>
			<script>
				document.getElementById('nolimit').onchange = function() {
					document.getElementById('productmaxday1').disabled = this.checked;
				};
			</script>
		 </div>
		 <div class="form-group">
			<label class="control-label col-md-3"><b>Product Price : MYR</b></label>
			<div class="col-md-9">
			   <input name="product_price" class="form-control" type="text" data-popup="tooltip" title="Product Price(It is required field)" data-placement="bottom" id="product_price">
			   <span class="help-block"></span>
			</div>
		 </div>
		 <div class="form-group">
			<label class="control-label col-md-3"><b>Apply Discount for <br>Bulk Purchase? </b></label>
			 <div class="col-md-9">
			<label class="checkbox-inline" style="padding-left: 0px!important;">
			<input type="radio" class="styled" name="dcdiscountpurchase" value="Yes" onClick="showTextBox2()">YES</label>
			<label class="checkbox-inline"><input type="radio" class="styled" name="dcdiscountpurchase" value="No" onClick="showTextBox3()" checked>NO</label>
			</div>
		 </div>
		 <div class="textBox1" style="display:none;background:#eeeeee;padding:1%;">
			<div class="form-group">
				<label class="control-label col-md-3"><b>Discount Unit : </b></label>
				 <div class="col-md-9">
					<label class="checkbox-inline" style="padding-left: 0px;">
					<input type="radio" class="styled" name="dcdiscountunit" value="%">% OR </label>
					<label class="checkbox-inline"><input type="radio" class="styled" name="dcdiscountunit" value="$"> $ </label>
				</div>
			 </div>
			 <div class="form-group">
				<label class="control-label col-md-3"><b>Range</b></label>
				<div class="col-md-9">
					<div class="field_wrapper">
						<div>
							<input type="text" name="startrange[]" style="width:50px;" /> TO <input type="text" name="endrange[]" style="width:50px;"/>
							DISCOUNT RATE : <input type="text" name="field_name[]" value="" style="width:50px;" id="field_name"/>
							<input type="text" id="discountrate" style="width:50px;" disabled>
							<a href="javascript:void(0);" class="add_button" title="Add field">
							<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/></a>
						</div>
					</div><br>
				</div>
			 </div>
		 </div>
		<script  type="text/javascript">

			$("#field_name").keyup(function () {
				var dis = parseFloat($('#product_price').val());
				var amt = parseFloat($('#field_name').val());
				var final_amt = dis * amt / 100;
						
				var dis_rate = dis - final_amt;
						
				$('#discountrate').val(dis_rate);
			});
			
			$("#apdiscountrate").keyup(function () {
				var dis1 = parseFloat($('#product_price').val());
				var amt1 = parseFloat($('#apdiscountrate').val());
				
				var final_amt1 = dis1 * amt1 / 100;		
				var dis_rate1 = dis1 - final_amt1;
				
				//var final_amt = amt - dis_rate;
				$('#afterpromo_discount').val(dis_rate1);
			});
			
		</script>
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
			var fieldHTML = '<div><input type="text" name="startrange[]" style="width:50px;"> TO <input type="text" name="endrange[]" style="width:50px;"> DISCOUNT RATE : <input type="text" name="field_name[]" value="" style="width:50px;"/><input type="text" id="discountrate" style="width:50px;" disabled><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/></a></div>'; //New input field html 
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
		
		<div class="form-group">
			<label class="control-label col-md-3"><b>Apply Promo? </b></label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left: 0px;">
				<input type="radio" class="styled" id="chkapplypromoyes" name="dcapplypromo" value="Yes">YES</label>
				<label class="checkbox-inline"><input type="radio" class="styled" name="dcapplypromo" id="chkapplypromono" value="No" checked>NO</label>
			</div>
		</div>
		<div id="dvapplypromo" style="display:none;background:#eeeeee;padding:1%;">
					<link href="<?php echo base_url('assets/new/css/datepicker.css');?>" rel="stylesheet">
					<script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js');?>"></script>
		  <div class="form-group">
			<label class="control-label col-md-3"><b>Start Date : </b></label>
			<div class="col-md-3">
				<input type="text" name="applypromo_startdate" value="" id="dpd1" class="form-control">
			</div>
			<label class="control-label col-md-3"><b>End Date : </b></label>
			<div class="col-md-3">
				<input type="text" name="applypromo_enddate" value="" id="dpd2" class="form-control">
			</div>
			<script>
				$(document).ready(function(){
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
			   <input name="apdiscountrate" id="apdiscountrate" class="form-control" type="text" data-popup="tooltip" title="Discount Rate(It is required field)" data-placement="bottom">
			   <span class="help-block"></span>
			</div>
		 </div>
		 <div class="form-group">
			<label class="control-label col-md-3"><b>Product Price <br>After Promo Discount? </b></label>
			<div class="col-md-9">
				 MYR <input name="afterpromo_discount" class="form-control" id="afterpromo_discount" type="text" Disabled>
			</div>
		 </div>
		 </div>
		 <script type="text/javascript">
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
		<div class="form-group">
			<label class="control-label col-md-3"><b>Apply Promo for <br>Bulk Discount? </b></label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left: 0px;">
				<input type="radio" class="styled" name="apbulkdiscount" value="Yes">YES</label>
				<label class="checkbox-inline"><input type="radio" class="styled" name="apbulkdiscount" value="No">NO</label>
			</div>
		 </div>
		 <div class="form-group">
			<label class="control-label col-md-3"><b>Optional Services : </b></label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left: 0px;">
				<input type="radio" class="styled" id="chkoptionalserviceyes" name="optionalservices1">YES</label>
				<label class="checkbox-inline">
				<input type="radio" class="styled" name="optionalservices1" value="No" id="chkoptionalserviceno" checked>NO</label>
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
	</fieldset>

	<fieldset title="3">
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
	</fieldset>

	<!--button type="submit" class="btn btn-primary stepy-finish">Submit <i class="icon-check position-right"></i></button-->
	<input type="submit" name="submit_SAleisure_data" value="Add" class="btn btn-success stepy-finish">
</form>
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