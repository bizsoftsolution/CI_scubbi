<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Leisure Dive</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h2 class="panel-title">Leisure Dive</h2>
				<div class="heading-elements">
					<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
						<li><a data-action="reload"></a></li>
						<!--li><a data-action="close"></a></li-->
					</ul>
				</div>
			</div>

			<div class="panel-body">
				<div class="tabbable">
					<ul class="nav nav-pills">
						<li class="active"><a href="#basic-pill1" data-toggle="tab">Dashboard</a></li>
						<li><a href="#basic-pill2" data-toggle="tab">Add Standard Product</a></li>
						<li><a href="#basic-pill3" data-toggle="tab">Add Customized Product</a></li>
						<!--li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="#basic-pill3" data-toggle="tab">Dropdown pill</a></li>
								<li><a href="#basic-pill4" data-toggle="tab">Another pill</a></li>
							</ul>
						</li-->
					</ul>

					<div class="tab-content">
						<div class="tab-pane active" id="basic-pill1">
							List 1
						</div>

						<div class="tab-pane" id="basic-pill2">
							List 2
						</div>

						<div class="tab-pane" id="basic-pill3">
							<div class="col-md-12">
								<div class="panel panel-flat">
									<div class="panel-body">
										<div class="tabbable">
											<ul class="nav nav-tabs nav-tabs-bottom">
												<li class="active"><a href="#bottom-tab1" data-toggle="tab">General Info</a></li>
												<li><a href="#bottom-tab2" data-toggle="tab">Pricing Options</a></li>
												<li><a href="#bottom-tab3" data-toggle="tab">Other Details</a></li>
											</ul>

											<div class="tab-content">
												<div class="tab-pane active" id="bottom-tab1">
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
			<form name="add" method="POST" action="<?php echo  base_url();?>DCleisure/addNew" class="form-horizontal form-validate-jquery" 
			   enctype="multipart/form-data">
			   <div class="form-group">
					<label class="control-label col-md-3"><b>Product Name</b> <strong style="color:red;">*</strong></label>
					<div class="col-md-9">
					   <input name="name" class="form-control" type="text" required="">
					   <span class="help-block"></span>
					</div>
				 </div>
				  <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Description</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
						    <textarea name="description" class="form-control" id="editor-full1" required="required"></textarea>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Includes</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <input name="product_includes" class="form-control" type="text" required="">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Excludes</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-10">
									<input name="productexcludes" class="form-control" type="text" required="">
									<span class="help-block"></span>
								</div>
								<div class="col-md-2">
									<label class="checkbox-inline"><input type="checkbox" class="styled" name="display" value="display" checked>Display</label>
								</div>
							</div>                     
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3"><b>OR SELECT FROM A LIST OF COMMON OPTIONS </b></label>
                        <div class="col-md-9">

							<div class="row">
							<div class="col-md-5">
								<div class="checkbox checkbox-switch">
	<label>FULL EQUIPMENT RENDAL <input type="checkbox" name="fullequipment" data-off-color="danger" data-on-text="Yes" data-off-text="No" class="switch" data-size="mini"></label>
								</div>
							</div>
							<div class="col-md-3">
							<div class="checkbox checkbox-switch">
	<label>LUNCH <input type="checkbox" name="lunch" data-off-color="danger" data-on-text="Yes" data-off-text="No" class="switch" data-size="mini"></label>
	</div></div>
	<div class="col-md-4">
	<div class="checkbox checkbox-switch">
	<label>DINNER <input type="checkbox" name="dinner" data-off-color="danger" data-on-text="Yes" data-off-text="No" class="switch" data-size="mini"></label>
							</div></div>
							</div>
							
							<div class="row">
							<div class="col-md-5">
								<div class="checkbox checkbox-switch">
	<label>TRANSFER FROM JETTY <input type="checkbox" name="transferjetty" data-off-color="danger" data-on-text="Yes" data-off-text="No" class="switch" data-size="mini"></label>
								</div>
							</div>
							<div class="col-md-5">
							<div class="checkbox checkbox-switch">
	<label>TRANSFER FROM HOTEL <input type="checkbox" name="transferhotel" data-off-color="danger" data-on-text="Yes" data-off-text="No" class="switch" data-size="mini"></label>
	</div></div>
							</div>
							<div class="row">
							<div class="col-md-4">
								<div class="checkbox checkbox-switch">
	<label>MARINE PARK FEE <input type="checkbox" name="marinefee" data-off-color="danger" data-on-text="Yes" data-off-text="No" class="switch" data-size="mini"></label>
								</div>
							</div>
							<div class="col-md-5">
							<div class="checkbox checkbox-switch">
	<label>DC TO DIVE SITE <input type="checkbox" name="dcdivesite" data-off-color="danger" data-on-text="Yes" data-off-text="No" class="switch" data-size="mini"></label>
	</div></div>
							</div>
							
							
		
                        </div>
                     </div>
					 <!--div class="form-group">
						<div class="row1">
							<div class="col-md-5">
								<label style="border:1px solid black; padding:2px;font-size: 10px;">FULL EQUIPMENT RENDAL</label>
								<label class="checkbox-inline"><input type="radio" class="styled" name="fullequipment" value="Yes">YES</label>
								<label class="checkbox-inline"><input type="radio" class="styled" name="fullequipment" value="No">NO</label>
							</div>
							<div class="col-md-3">
								<label style="border:1px solid black; padding:2px;font-size: 10px;">LUNCH</label>
								<label class="checkbox-inline" style="padding-left:0px;"><input type="radio" class="styled" name="lunch" value="Yes">YES</label>
								<label class="checkbox-inline"><input type="radio" class="styled" name="lunch" value="No">NO</label>
							</div>
							<div class="col-md-4">
								<label style="border:1px solid black; padding:2px;font-size: 10px;">DINNER</label>
								<label class="checkbox-inline" style="margin: 0 0 0 10px;"><input type="radio" class="styled" name="dinner" value="Yes">YES</label>
								<label class="checkbox-inline"><input type="radio" class="styled" name="dinner" value="No">NO</label>
							</div>
						</div><div class="col-md-12">&nbsp;</div>
						<div class="row1">
							<div class="col-md-5">
								<label style="border:1px solid black; padding:2px;font-size: 10px;">TRANSFER FROM JETTY</label>
								<label class="checkbox-inline" style="margin: 0 0 0 10px;"><input type="radio" class="styled" name="transferjetty" value="Yes">YES</label>
								<label class="checkbox-inline"><input type="radio" class="styled" name="transferjetty" value="No">NO</label>
							</div>
							<div class="col-md-5">
								<label style="border:1px solid black; padding:2px;font-size: 10px;">TRANSFER FROM HOTEL</label>
								<label class="checkbox-inline" style="margin: 0 0 0 10px;"><input type="radio" class="styled" name="transferhotel" value="Yes">YES</label>
								<label class="checkbox-inline"><input type="radio" class="styled" name="transferhotel" value="No">NO</label>
							</div>
						</div><div class="col-md-12">&nbsp;</div>
						<div class="row1">
							<div class="col-md-5">
								<label style="border:1px solid black; padding:2px;font-size: 10px;">MARINE PARK FEE</label>
								<label class="checkbox-inline" style="margin: 0 0 0 10px;"><input type="radio" class="styled" name="marinefee" value="Yes">YES</label>
								<label class="checkbox-inline"><input type="radio" class="styled" name="marinefee" value="No">NO</label>
							</div>
							<div class="col-md-5">
								<label style="border:1px solid black; padding:2px;font-size: 10px;">DC TO DIVE SITE</label>
								<label class="checkbox-inline" style="margin: 0 0 0 10px;">
								<input type="radio" class="styled" name="dcdivesite" value="Yes">YES</label>
								<label class="checkbox-inline"><input type="radio" class="styled" name="dcdivesite" value="No">NO</label>
							</div>
						</div>
						
                     </div-->
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Other Information</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-10">
									<input name="otherinformation" class="form-control" type="text" required="">
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
									<input name="productcategory" class="form-control" type="text">
								</div>
							</div>
							<div class="col-md-6">
								<label class="control-label col-md-4"><b>Product Keyword : </b></label>
								<div class="col-md-8">
									<select name="productkeyword" class="form-control">
										<option label=" -- Select Keyword -- "></option>
										<?php 
											$data=$this->db->get('tbl_product_keywords')->result_array();
											foreach ($data as $pk) {?>
										   <option value="<?php echo $pk['keywords'];?>"><?php echo $pk['keywords'];?></option> 
										   <?php
											}
										  ?>
									</select>
								</div>
							</div>
						</div>					
					 </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Sequence Number</b></label>
                        <div class="col-md-9">
                           <input name="sequence_number" class="form-control" type="text" required="">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Status</b></label>
                        <div class="col-md-9">
                           <label class="checkbox-inline"><input type="radio" class="styled" name="productstatus" value="Available">AVAILABLE</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="productstatus" value="Hidden">HIDDEN</label>
                        </div>
                     </div>
					 <div style="text-align:center">
                     <input type="submit" name="submit_DCleisure_data" value="Add" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
			   </form>
												</div>

												<div class="tab-pane" id="bottom-tab2">
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
				<form name="add" method="POST" action="<?php echo  base_url();?>DCleisure/addNew" class="form-horizontal form-validate-jquery" 
			   enctype="multipart/form-data">
													<div class="form-group">
						<label class="control-label col-md-3"><b>Product Unit :</b> <strong style="color:red;">*</strong></label>
						<div class="col-md-9">
							<label class="checkbox-inline">
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
                           <input name="maxdiveday" class="form-control" type="text" required="">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Max / Day </b></label>
                        <div class="col-md-9">
                           <input name="productmaxday" class="form-control" type="text" required="">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Price : MYR</b></label>
                        <div class="col-md-9">
                           <input name="product_price" class="form-control" type="text" required="">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Apply Discount for <br>Bulk Purchase? </b></label>
						 <div class="col-md-9">
						<label class="checkbox-inline">
						<input type="radio" class="styled" name="dcdiscountpurchase" value="Yes" onClick="showTextBox2()">YES</label>
						<label class="checkbox-inline"><input type="radio" class="styled" name="dcdiscountpurchase" value="No" onClick="showTextBox3()" checked>NO</label>
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
					
					<div class="form-group">
						<label class="control-label col-md-3"><b>Apply Promo? </b></label>
						<div class="col-md-9">
							<label class="checkbox-inline">
							<input type="radio" class="styled" id="chkapplypromoyes" name="dcapplypromo" value="Yes">YES</label>
							<label class="checkbox-inline"><input type="radio" class="styled" name="dcapplypromo" id="chkapplypromono" value="No" checked>NO</label>
						</div>
					</div>
					<div id="dvapplypromo" style="display:none;background:#eeeeee;padding:1%;">
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Start Date : </b></label>
						<div class="col-md-3">
							<input type="date" name="applypromo_startdate">
						</div>
						<label class="control-label col-md-3"><b>End Date : </b></label>
						<div class="col-md-3">
							<input type="date" name="applypromo_enddate">
						</div>
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
						<label class="control-label col-md-3"><b>Optional Services : </b></label>
						<div class="col-md-9">
							<label class="checkbox-inline">
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
					  <div style="text-align:center">
                     <input type="submit" name="submit_DCleisure_data" value="Add" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
					 </form>
												</div>

												<div class="tab-pane" id="bottom-tab3">
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
					 <form name="add" method="POST" action="<?php echo  base_url();?>DCleisure/addNew" class="form-horizontal form-validate-jquery" 
			   enctype="multipart/form-data">
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
					 
					  <div style="text-align:center">
                     <input type="submit" name="submit_DCleisure_data" value="Add" class="btn btn-success">
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
			</div>
		</div>
	</div>
						

            <!--div style="text-align:right;">
               <a class="btn bg-violet" href="<?php echo  base_url();?>DCleisure/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>DCleisure/DCleisurelist" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div-->

   
   
</div>
<!-- /dashboard content -->
