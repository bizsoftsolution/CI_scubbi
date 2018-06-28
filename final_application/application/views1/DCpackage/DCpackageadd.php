<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js1"></script>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/stepywizerd/css/jquery.stepy.css'); ?>" />
	<link href="<?php echo base_url('assets/new/css/datepicker.css');?>" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js');?>"></script>
<style>
.error{
	border-color: red;
    color: red;
    border-top-color: red;
}
</style>
<?php 
	$data7 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$this->session->userdata('user_id')))->row();
	$dccur =  $data7->dccurrency;
?>
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

<div class="row">
   <div class="col-md-12">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Dive Package</h2>
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
					<li ><a href="<?php echo base_url(); ?>DCpackage/DCpackagelist" >Dashboard</a></li>
					<li class="active"><a href="<?php echo base_url(); ?>DCpackage/addNew" >Add Customized Product</a></li>
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
	<form name="add" method="POST" action="<?php echo  base_url();?>DCpackage/addNew" class="form-horizontal form-validate-jquery" enctype="multipart/form-data" id="custom">
	
	<fieldset title="1">
		<legend class="text-semibold">General Info</legend>
		<div class="form-group">
                        <label class="control-label col-md-3"><b>Product Name</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
                           <input name="name" class="form-control" type="text"  data-popup="tooltip" title="Product name(It is required field)" data-placement="bottom" required="">
                           <span class="help-block"></span>
                        </div>
                     </div>

					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Description</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
						    <textarea name="description" cols="2" rows="2" class="wysihtml5 wysihtml5-min form-control"  data-popup="tooltip" title="Product Description(It is required field)" data-placement="bottom" required=""></textarea>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                                                                <label class="control-label col-md-3">
																<b style="color:red">To Display Product Includes</b>
                                                                </label>
                                                                <div class="col-md-9">
																	<label class="checkbox-inline">
                                                                    <input type="checkbox" class="styled" name="display_product_includes" value="TRUE" checked></label>
																</div>
															</div>
					<div class="form-group">
                                                                <label class="control-label col-md-3"><b>Product Includes</b>
                                                                </label>
                                                                <div class="col-md-9">
																	 <textarea name="productincludes1" cols="2" rows="2" class="wysihtml5 wysihtml5-min form-control" data-popup="tooltip" title="Product Includes(It is required field)" data-placement="bottom" ></textarea>
                                                                    <!--input name="productincludes1" class="form-control" type="text" data-placement="bottom"-->
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
															<div class="form-group">
                                                                <label class="control-label col-md-3">
																<b style="color:red">To Display Product Excludes</b>
                                                                </label>
                                                                <div class="col-md-9">
																	<label class="checkbox-inline">
                                                                    <input type="checkbox" class="styled" name="display_product_excludes" value="TRUE" checked></label>
																</div>
															</div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Product Excludes</b>
                                                                </label>
                                                                <div class="col-md-9">
																	<textarea name="productexcludes1" cols="2" rows="2" class="wysihtml5 wysihtml5-min form-control" data-popup="tooltip" title="Product Excludes(It is required field)" data-placement="bottom" ></textarea>
                                                                    <!--div class="row">
                                                                        <div class="col-md-10">
                                                                            <input name="productexcludes1" class="form-control" type="text" data-placement="bottom">
                                                                            <span class="help-block"></span>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <label class="checkbox-inline">
                                                                                <input type="checkbox" class="styled" name="display" value="TRUE" checked>Display</label>
                                                                        </div>
                                                                    </div-->
                                                                </div>
                                                            </div>
															<!--div class="form-group">
                                                                <label class="control-label col-md-3">
																<b>To Display Product Includes and Excludes</b>
                                                                </label>
                                                                <div class="col-md-9">
																	<label class="checkbox-inline">
                                                                    <input type="checkbox" class="styled" name="display" value="TRUE" checked></label>
																</div>
															</div-->
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Or Select From a List of Common options</b> 
                                                                    <br>
                                                                    <span style="color:red;" id="includeErrorDiv">
				
					</span>
                                                                </label>

                                                                <div class="col-md-9">
                                                                    <div class="row">
                                                                        <div class="table-responsive">
                                                                            <table class="table">
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td><b>Includes</b>
                                                                                    </td>
                                                                                    <td><b>Excludes</b>
                                                                                    </td>
                                                                                    <td></td>
                                                                                    <td><b>Includes</b>
                                                                                    </td>
                                                                                    <td><b>Excludes</b>
                                                                                    </td>
                                                                                </tr>
                                                                                <script>
                                                                                    $(document).ready(function() {
                                                                                        //set initial state.
                                                                                        $('#full_equipment_include').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#full_equipment_exclude").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#full_equipment_exclude").removeAttr("disabled");

                                                                                            }

                                                                                        });

                                                                                        $('#full_equipment_exclude').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#full_equipment_include").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#full_equipment_include").removeAttr("disabled");

                                                                                            }

                                                                                        });

                                                                                        ///Lunch
                                                                                        $('#lunchInclude').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#lunchExclude").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#lunchExclude").removeAttr("disabled");

                                                                                            }

                                                                                        });

                                                                                        $('#lunchExclude').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#lunchInclude").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#lunchInclude").removeAttr("disabled");

                                                                                            }

                                                                                        });


                                                                                        //Dinner-------------
                                                                                        $('#dinnerInclude').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#dinnerExclude").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#dinnerExclude").removeAttr("disabled");

                                                                                            }

                                                                                        });

                                                                                        $('#dinnerExclude').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#dinnerInclude").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#dinnerInclude").removeAttr("disabled");

                                                                                            }

                                                                                        });

                                                                                        //---------Jetty-----------------
                                                                                        $('#jettyInclude').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#jettyExclude").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#jettyExclude").removeAttr("disabled");

                                                                                            }

                                                                                        });

                                                                                        $('#jettyExclude').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#jettyInclude").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#jettyInclude").removeAttr("disabled");

                                                                                            }

                                                                                        });

                                                                                        //---------hotel -------------
                                                                                        $('#hotelInclude').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#hotelExclude").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#hotelExclude").removeAttr("disabled");

                                                                                            }

                                                                                        });

                                                                                        $('#hotelExclude').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#hotelInclude").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#hotelInclude").removeAttr("disabled");

                                                                                            }

                                                                                        });

                                                                                        //----marine Park -----------
                                                                                        $('#marineInclude').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#marineExclude").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#marineExclude").removeAttr("disabled");

                                                                                            }

                                                                                        });

                                                                                        $('#marineExclude').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#marineInclude").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#marineInclude").removeAttr("disabled");

                                                                                            }

                                                                                        });


                                                                                        //-----------Dive Site-----------
                                                                                        $('#divesiteInclude').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#diveSiteExclude").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#diveSiteExclude").removeAttr("disabled");

                                                                                            }

                                                                                        });

                                                                                        $('#diveSiteExclude').change(function() {
                                                                                            if (this.checked) {

                                                                                                $("#divesiteInclude").attr("disabled", true);
                                                                                                $("#includeErrorDiv").html("You Can Select Either Include or Exclude");
                                                                                            } else {
                                                                                                $("#divesiteInclude").removeAttr("disabled");

                                                                                            }

                                                                                        });




                                                                                    });
                                                                                </script>
                                                                                <tr>
                                                                                    <td>FULL EQUIPMENT RENTAL</td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productincludes[]" value="FULL EQUIPMENT RENTAL" id="full_equipment_include">
                                                                                    </td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productexcludes[]" value="FULL EQUIPMENT RENTAL" id="full_equipment_exclude">
                                                                                    </td>
                                                                                    <!--td>LUNCH</td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productincludes[]" value="LUNCH" id="lunchInclude">
                                                                                    </td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productexcludes[]" value="LUNCH" id="lunchExclude">
                                                                                    </td-->
																					<td>TRANSFER FROM JETTY</td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productincludes[]" value="TRANSFER FROM JETTY" id="jettyInclude">
                                                                                    </td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productexcludes[]" value="TRANSFER FROM JETTY" id="jettyExclude">
                                                                                    </td>
                                                                                </tr>
                                                                                <!--tr>
                                                                                    <td>DINNER</td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productincludes[]" value="DINNER" id="dinnerInclude">
                                                                                    </td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productexcludes[]" value="DINNER" id="dinnerExclude">
                                                                                    </td>
                                                                                    
                                                                                </tr-->
                                                                                <tr>
                                                                                    <td>TRANSFER FROM HOTEL</td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productincludes[]" value="TRANSFER FROM HOTEL" id="hotelInclude">
                                                                                    </td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productexcludes[]" value="TRANSFER FROM HOTEL" id="hotelExclude">
                                                                                    </td>
                                                                                    <td>MARINE PARK FEE</td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productincludes[]" value="MARINE PARK FEE" id="marineInclude">
                                                                                    </td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productexcludes[]" value="MARINE PARK FEE" id="marineExclude">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>DC TO DIVE SITE</td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productincludes[]" value="DC TO DIVE SITE" id="divesiteInclude">
                                                                                    </td>
                                                                                    <td align="center">
                                                                                        <input type="checkbox" class="styled" name="productexcludes[]" value="DC TO DIVE SITE" id="diveSiteExclude">
                                                                                    </td>

                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Other Information</b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <input name="otherinformation" class="form-control" type="text" data-placement="bottom">
                                                                            <span class="help-block"></span>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <label class="checkbox-inline">
                                                                                <input type="checkbox" class="styled" name="other_info_display" value="TRUE" checked>Display</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
					  <div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label class="control-label col-md-6"><b>Product Category : </b></label>
								<div class="col-md-6">
									<input name="productcategory" class="form-control" type="text" data-popup="tooltip" title="Product Category(It is required field)" data-placement="bottom" value="Dive Package" required>
								</div>
							</div>
							<style>
								.btn-group
								{
									width: 100%;
								}
								.multiselect-container
								{
									width: 100%;
								}
								.form-horizontal .checkbox .checker
								{
									top: 19px;
								}
							</style>
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
											<input type="text" name="bpdatestart" value="" id="dpd5" class="form-control" data-placement="bottom">
										</div>
									</div>
									<div class="col-md-6">
										<label class="control-label col-md-4"><b>End Date </b></label>
										<div class="col-md-8">
											<input type="text" name="bpdateend" value="" id="dpd6" class="form-control" data-placement="bottom">
										</div>
									</div>
								</div>
							</div>
						</div>
							
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
											<input type="text" name="tpdatestart" value="" id="dpd3" class="form-control" data-placement="bottom">
										</div>
									</div>
									<div class="col-md-6">
										<label class="control-label col-md-4"><b>End Date </b></label>
										<div class="col-md-8">
											<input type="text" name="tpdateend" value="" id="dpd4" class="form-control" data-placement="bottom">
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
						<script>
							$(document).ready(function(){
								
								// Booking peroid
								
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
											return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
										}
									}).on('changeDate', function(ev) {
										checkout.hide();
									}).data('datepicker');
									
									// Travel peroid
									
									
									
							});
							</script>
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
                           <input name="sequence_number" class="form-control sequence_number" type="number"  data-popup="tooltip" title="Sequence Number(It is required field)" data-placement="bottom" required="">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Product Status</b></label>
                        <div class="col-md-9">
                           <label class="checkbox-inline" style="padding-left:0px;"><input type="radio" class="styled" name="productstatus" value="Available">AVAILABLE</label>
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
							<input type="radio" class="styled" name="productunits" value="Pax" id="chkproductunitno">Pax</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="Trip" id="chkproductunitno">Trip</label>
							<label class="checkbox-inline">
                            <input type="radio" class="styled" name="productunits" value="Item"/>Item</label>
						</div>
						
				
					 </div>
					  <div class="form-group">
			<label class="control-label col-md-3"><b>Product Max / Day </b></label>
			<div class="col-md-7">
			   <input name="productmaxday" class="form-control productmaxday1" type="text" id="productmaxday1" data-popup="tooltip" title="Product Max(It is required field)" data-placement="bottom">
			   <span class="help-block"></span>
			</div>
			<div class="col-md-2">
				<label class="checkbox-inline"><input type="checkbox" class="styled" id="nolimit" name="productmaxday" value="No Limit" onClick="changeText();">No Max</label>
			</div>
			<script>
						function changeText(){
						   var text_box = document.getElementById('productmaxday1');
							if(text_box.hasAttribute('readonly')){    
								text_box.value = "";
								text_box.removeAttribute('readonly');
							}else{        
								text_box.value = "No Limit";
								text_box.setAttribute('readonly', 'readonly');    
							}
						}
					</script>
			
		 </div>
		  <div class="form-group">
			<label class="control-label col-md-3"><b>Product Price :</b></label>
			<div class="col-md-9">
				
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="email">Normal Rate</label>
							<div class="col-md-9" style="padding:0px;">
							<input name="product_normal_price" class="form-control nr" type="text"  data-popup="tooltip" title="Product Price(It is required field)" data-placement="bottom" id="pp1">
							</div>
							<div class="col-md-3"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="email">Weekend Rate</label>
							<div class="col-md-9" style="padding:0px;">
							<input name="product_weekend_price" class="form-control wr" type="text"  data-popup="tooltip" title="Product Price(It is required field)" data-placement="bottom" id="pp2">
							</div>
							<div class="col-md-3"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						</div>
					</div> 
					<div class="col-md-3">
						<div class="form-group">
							<label for="email">Peak Season Rate</label>
							<div class="col-md-9" style="padding:0px;">
							<input name="product_peakseason_price" class="form-control psr" type="text"  data-popup="tooltip" title="Product Price(It is required field)" data-placement="bottom" id="pp3">
							</div>
							<div class="col-md-3"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="email">Super Peak Season Rate</label>
							<div class="col-md-9" style="padding:0px;">
							<input name="product_super_peakseason_price" class="form-control spsr" type="text"  data-popup="tooltip" title="Product Price(It is required field)" data-placement="bottom" id="pp4">
							</div>
							<div class="col-md-3"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						</div>
					</div>
				</div>
			   <!--input name="product_price" class="form-control" type="text"  data-popup="tooltip" title="Product Price(It is required field)" data-placement="bottom">
			   <span class="help-block"></span-->
			</div>
		 </div>
		 
		 <div class="form-group">
			<label class="control-label col-md-3"><b>Is the product inclusive <br>of accomodation? </b></label>
			 <div class="col-md-9">
			<label class="checkbox-inline" style="padding-left: 0px!important;">
			<input type="radio" class="styled" name="dcinclusiveaccomodation" value="Yes" onClick="showTextBox100()" id="productprice_show">YES</label>
			<label class="checkbox-inline"><input type="radio" class="styled" name="dcinclusiveaccomodation" value="No" onClick="showTextBox99()" id="productprice_hide">NO</label>
			</div>
		 </div>
		 <script>
			 $(document).ready(function() {
				$("#productprice_show").click(function() {
					$(".nr").val("");
					$(".wr").val("");
					$(".psr").val("");
					$(".spsr").val("");
					var global_value = 0;
					$('#pp1').attr("disabled","disabled");
					$('#pp2').attr("disabled","disabled");
					$('#pp3').attr("disabled","disabled");
					$('#pp4').attr("disabled","disabled");
					
					$(".Apply_dis_bulk_purchase_2").show();				
					$(".Apply_dis_bulk_purchase").hide();
					$(".Apply_promo_1").hide();
					$(".Apply_promo_2").show();
				});
				$("#productprice_hide").click(function() {
					$(".sr").val("");
					$(".tr").val("");
					$(".tpr").val("");
					$(".qr").val("");
					$(".cr").val("");
					
					var global_value = 0;
					$('#pp1').removeAttr("disabled");
					$('#pp2').removeAttr("disabled");
					$('#pp3').removeAttr("disabled");
					$('#pp4').removeAttr("disabled");
					
					$(".Apply_dis_bulk_purchase").show();
					$(".Apply_dis_bulk_purchase_2").hide();
					$(".Apply_promo_1").show();
					$(".Apply_promo_2").hide();
				});
			});
		</script>
		 <div class="dcinclusiveaccomodationBox1" style="display:none;background:#eeeeee;padding:0% 1%;">
			 <div class="form-group">
				<label class="control-label col-md-3"><b>Single Room:</b></label>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-2"> 
						<input name="single_room[]" class="form-control sr" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp01" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="single_room[]" class="form-control sr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp02" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="single_room[]" class="form-control sr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp03" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="single_room[]" class="form-control sr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp04" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"><b>Twin Room:</b></label>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-2"> 
						<input name="twin_room[]" class="form-control tr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp5" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="twin_room[]" class="form-control tr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp6" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="twin_room[]" class="form-control tr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp7" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="twin_room[]" class="form-control tr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp8" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"><b>3 Person Room:</b></label>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-2"> 
						<input name="three_person_room[]" class="form-control tpr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp9" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="three_person_room[]" class="form-control tpr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp10" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="three_person_room[]" class="form-control tpr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp11" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="three_person_room[]" class="form-control tpr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp12" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"><b>Quad Room:</b></label>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-2"> 
						<input name="quad_room[]" class="form-control qr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp13" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="quad_room[]" class="form-control qr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp14" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="quad_room[]" class="form-control qr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp15" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="quad_room[]" class="form-control qr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp16" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
					</div>
				</div>
			</div>
			<?php
				$data24 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$this->session->userdata('user_id')))->result();
				foreach($data24 as $row_data24)
				{
					if($row_data24->custom_accom_display == "TRUE")
					{
			?>
			<div class="form-group">
				<label class="control-label col-md-3"><b><?php echo $row_data24->custom_accom; ?>:</b></label>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-2"> 
						<input name="custom_room[]" class="form-control cr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp17" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="custom_room[]" class="form-control cr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp18" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="custom_room[]" class="form-control cr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp19" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
						<div class="col-md-2"> 
						<input name="custom_room[]" class="form-control cr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp20" value="0">
						</div>
						<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;"><?php echo $dccur; ?>/PAX</span></div>
					</div>
				</div>
			</div>
			<?php 
					}
				}
			?>
		 </div>
		 <script>
			function showTextBox100() {
					$(".dcinclusiveaccomodationBox1").show();
					$(".Acc_details").show();
					$(".startrange").val("");
					$(".endrange").val("");
					$(".field_name").val("");
					$(".discountrate").val("");
					
					$(".dcr1").val("");
					$(".dcr2").val("");
					$(".dcr3").val("");
					$(".dcr4").val("");
					$(".dcr5").val("");
					$(".dcr6").val("");
					$(".dcr7").val("");
					$(".dcr8").val("");
					$(".dcr9").val("");
					$(".dcr10").val("");
					$(".dcr11").val("");
					$(".dcr12").val("");
					$(".dcr13").val("");
					$(".dcr14").val("");
					$(".dcr15").val("");
					$(".dcr16").val("");
					$(".dcr17").val("");
					$(".dcr18").val("");
					$(".dcr19").val("");
					$(".dcr20").val("");
					
					$(".apdiscountrate").val("");
					$(".dcr11").val("");
					$(".dcr22").val("");
					$(".dcr33").val("");
					$(".dcr44").val("");
					$(".dcr55").val("");
					$(".dcr66").val("");
					$(".dcr77").val("");
					$(".dcr88").val("");
					$(".dcr99").val("");
					$(".dcr100").val("");
					$(".dcr111").val("");
					$(".dcr122").val("");
					$(".dcr133").val("");
					$(".dcr144").val("");
					$(".dcr155").val("");
					$(".dcr166").val("");
					$(".dcr177").val("");
					$(".dcr188").val("");
					$(".dcr199").val("");
					$(".dcr200").val("");
					
				}
				function showTextBox99() {
					$(".dcinclusiveaccomodationBox1").hide();
					$(".Acc_details").hide();
					
					$(".startrange").val("");
					$(".endrange").val("");
					$(".field_name").val("");
					$(".discountrate").val("");
					
					$(".dcr1").val("");
					$(".dcr2").val("");
					$(".dcr3").val("");
					$(".dcr4").val("");
					$(".apdiscountrate").val("");
					$(".dcr11").val("");
					$(".dcr22").val("");
					$(".dcr33").val("");
					$(".dcr44").val("");
				}
		 </script>
		  <hr style="width:100%;">
		  
		  
			<div class="form-group">
				<label class="control-label col-md-3"><b>Apply Discount for <br>Bulk Purchase? </b>
				</label>
				<div class="col-md-9">
					<label class="checkbox-inline" style="padding-left: 0px!important;">
						<input type="radio" class="styled" name="dcdiscountpurchase" id="dcdiscountpurchaseYes" value="Yes" onClick="showTextBox2()">YES</label>
					<label class="checkbox-inline">
						<input type="radio" id="dcdiscountpurchaseNo" class="styled" name="dcdiscountpurchase" value="No" onClick="showTextBox3()">NO</label>
				</div>
			</div>
			<div class="textBox1" style="display:none;background:#eeeeee;padding:1%;">
				<div class="form-group">
					<label class="control-label col-md-3"><b>Discount Unit : </b>
					</label>
					<div class="col-md-9">
						<label class="checkbox-inline" style="padding-left: 0px;">
							<input type="radio" class="styled" name="dcdiscountunit" value="PERCENT" id="disUnitBulkPer" checked>% OR </label>
						<label class="checkbox-inline">
							<input type="radio" class="styled" id="disUnitBulkdoll" name="dcdiscountunit" value="DOLLOR"> $ </label>
					</div>
				</div>
				<div class="form-group Apply_dis_bulk_purchase" style="display:none;">
					<label class="control-label col-md-3"><b>Range</b>
					</label>
					<div class="col-md-9">
						<div class="field_wrapper">
							<tr id="1">

								<input type="text" name="startrange[]" style="width:50px;" class="startrange"/> TO
								<input type="text" name="endrange[]" style="width:50px;" class="endrange" /> DISCOUNT RATE :
								<input type="text" name="field_name[]" value="" style="width:50px;" class="field_name" />
								<!--input type="text" name="discount_bulk_purchase_amount[]" class="discountrate" style="width:50px;" -->
								<a href="javascript:void(0);" class="add_button" title="Add field">
									<i class="fa fa-plus" style="color:green;font-size:20px"></i>
								</a>
								<div class="table-responsive" style="background:lightblue;margin:2px 0 0 0;">
									<table class="table">
										<tr><td>Normal Rate</td><td>Weekend Rate</td><td>Peak Season Rate</td><td>Super Peak Season Rate</td></tr>
										<tr>
										<td><input type="text" style="width:50px;" class="dcr1" name="text1[]" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr2" name="text2[]" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr3" name="text3[]" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr4" name="text4[]" readonly><?php echo $dccur; ?>/PAX</td>
										</tr>
									</table>
								</div>
							</tr>
						</div>
						<br>
					</div>
				</div>
				
				<div class="form-group Apply_dis_bulk_purchase_2" style="display:none;">
					<label class="control-label col-md-3"><b>Range</b>
					</label>
					<div class="col-md-9">
						<div class="field_wrapper3">
							<tr id="1">
								<input type="text" name="startrange[]" style="width:50px;" class="startrange" /> TO
								<input type="text" name="endrange[]" style="width:50px;" class="endrange" /> DISCOUNT RATE :
								<input type="text" name="field_name[]" value="" style="width:50px;" class="field_name" />
								<!--input type="text" name="discount_bulk_purchase_amount[]" class="discountrate" style="width:50px;" -->
								<a href="javascript:void(0);" class="add_button3" title="Add field">
									<i class="fa fa-plus" style="color:green;font-size:20px"></i>
								</a>
								<div class="table-responsive" style="background:lightblue;margin:2px 0 0 0;">
									<table class="table">
										<tr><td></td><td>Normal Rate</td><td>Weekend Rate</td><td>Peak Season Rate</td><td>Super Peak Season Rate</td></tr>
										<tr>
										<td>single room</td>
										<td><input type="text" style="width:50px;" class="piay1" name="text5[]" id="dcr1" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="piay2" name="text5[]" id="dcr2" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="piay3" name="text5[]" id="dcr3" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="piay4" name="text5[]" id="dcr4" readonly><?php echo $dccur; ?>/PAX</td>
										</tr><tr>
										<td>twin room</td>
										<td><input type="text" style="width:50px;" class="dcr5" name="text6[]" id="dcr5" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr6" name="text6[]" id="dcr6" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr7" name="text6[]" id="dcr7" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr8" name="text6[]" id="dcr8" readonly><?php echo $dccur; ?>/PAX</td>
										</tr><tr>
										<td>3 person room</td>
										<td><input type="text" style="width:50px;" class="dcr9" name="text7[]" id="dcr9" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr10" name="text7[]" id="dcr10" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr11" name="text7[]" id="dcr11" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr12" name="text7[]" id="dcr12" readonly><?php echo $dccur; ?>/PAX</td>
										</tr><tr>
										<td>quad room</td>
										<td><input type="text" style="width:50px;" class="dcr13" name="text8[]" id="dcr13" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr14" name="text8[]" id="dcr14" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr15" name="text8[]" id="dcr15" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr16" name="text8[]" id="dcr16" readonly><?php echo $dccur; ?>/PAX</td></tr>
										<?php
											$data24 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$this->session->userdata('user_id')))->result();
											foreach($data24 as $row_data24)
											{
												if($row_data24->custom_accom_display == "TRUE")
												{
										?>
										<tr>
										<td><?php echo $row_data24->custom_accom; ?></td>
										<td><input type="text" style="width:50px;" class="dcr17" name="text18[]" id="dcr17" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr18" name="text18[]" id="dcr18" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr19" name="text18[]" id="dcr19" readonly><?php echo $dccur; ?>/PAX</td>
										<td><input type="text" style="width:50px;" class="dcr20" name="text18[]" id="dcr20" readonly><?php echo $dccur; ?>/PAX</td></tr>
										<?php 
												}
											}
										?>
									</table>
								</div>
							</tr>
						</div>
						<br>
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
				$(document).ready(function() {
					var maxField = 3; //Input fields increment limitation
					var addButton = $('.add_button'); //Add button selector
					var wrapper = $('.field_wrapper'); //Input field wrapper
					var fieldHTML = '<div><input type="text" name="startrange[]" style="width:50px;" class="startrange"> TO <input type="text" name="endrange[]" style="width:50px;" class="endrange"> DISCOUNT RATE : <input type="text" class="field_name" name="field_name[]" value="" style="width:50px;"/><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-remove" style="color:red;font-size:20px;"></i></a><div class="table-responsive" style="background:lightblue;margin:2px 0 0 0;"><table class="table"><tr><td>Normal Rate</td><td>Weekend Rate</td><td>Peak Season Rate</td><td>Super Peak Season Rate</td></tr><tr><td><input type="text" style="width:50px;" class="dcr1" name="text1[]" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr2" name="text2[]" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr3" name="text3[]" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr4" name="text4[]" readonly><?php echo $dccur; ?>/PAX</td></tr></table></div></div>'; //New input field html 
					var x = 1; //Initial field counter is 1
					$(addButton).click(function() { //Once add button is clicked
						if (x < maxField) { //Check maximum number of input fields
							x++; //Increment field counter
							$(wrapper).append(fieldHTML); // Add field html
						}
					});
					$(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
						e.preventDefault();
						$(this).parent('div').remove(); //Remove field html
						x--; //Decrement field counter
					});
				});
				
				/* $(function() {
					//var arr = [];
					
					$(document).on("keyup", "input:text.startrange", function() {
						var val = this.value;
						//alert(val);
						$('.dcr25').val(val);
						
						
					});
				}); */
			</script> 
			<script type="text/javascript">
				$(document).ready(function() {
					var maxField = 3; //Input fields increment limitation
					var addButton = $('.add_button3'); //Add button selector
					var wrapper = $('.field_wrapper3'); //Input field wrapper
					var fieldHTML = '<div><input type="text" name="startrange[]" style="width:50px;" class="startrange"> TO <input type="text" name="endrange[]" style="width:50px;" class="endrange"> DISCOUNT RATE : <input type="text" class="field_name" name="field_name[]" value="" style="width:50px;"/><a href="javascript:void(0);" class="remove_button3" title="Remove field"><i class="fa fa-remove" style="color:red;font-size:20px;"></i></a><div class="table-responsive" style="background:lightblue;margin:2px 0 0 0;"><table class="table"><tr><td></td><td>Normal Rate</td><td>Weekend Rate</td><td>Peak Season Rate</td><td>Super Peak Season Rate</td></tr><tr><td>single room</td><td><input type="text" style="width:50px;" class="piay1" name="text5[]" id="dcr1" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="piay2" name="text5[]" id="dcr2" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="piay3" name="text5[]" id="dcr3" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="piay4" name="text5[]" id="dcr4" readonly><?php echo $dccur; ?>/PAX</td></tr><tr><td>twin room</td><td><input type="text" style="width:50px;" class="dcr5" name="text6[]" id="dcr5" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr6" name="text6[]" id="dcr6" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr7" name="text6[]" id="dcr7" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr8" name="text6[]" id="dcr8" readonly><?php echo $dccur; ?>/PAX</td></tr><tr><td>3 person room</td><td><input type="text" style="width:50px;" class="dcr9" name="text7[]" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr10" name="text7[]" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr11" name="text7[]" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr12" name="text7[]" readonly><?php echo $dccur; ?>/PAX</td></tr><tr><td>quad room</td><td><input type="text" style="width:50px;" class="dcr13" name="text8[]" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr14" name="text8[]" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr15" name="text8[]" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr16" name="text8[]" readonly><?php echo $dccur; ?>/PAX</td></tr><?php  $data24 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$this->session->userdata('user_id')))->result(); foreach($data24 as $row_data24) { if($row_data24->custom_accom_display == "TRUE") { ?> <tr> <td><?php echo $row_data24->custom_accom; ?></td> <td><input type="text" style="width:50px;" class="dcr17" name="text18[]" readonly><?php echo $dccur; ?>/PAX</td> <td><input type="text" style="width:50px;" class="dcr18" name="text18[]" readonly><?php echo $dccur; ?>/PAX</td> <td><input type="text" style="width:50px;" class="dcr19" name="text18[]" readonly><?php echo $dccur; ?>/PAX</td> <td><input type="text" style="width:50px;" class="dcr20" name="text18[]" readonly><?php echo $dccur; ?>/PAX</td></tr> <?php  } } ?></table></div></div>'; //New input field html 
					var x = 1; //Initial field counter is 1
					$(addButton).click(function() { //Once add button is clicked
						if (x < maxField) { //Check maximum number of input fields
							x++; //Increment field counter
							$(wrapper).append(fieldHTML); // Add field html
						}
					});
					$(wrapper).on('click', '.remove_button3', function(e) { //Once remove button is clicked
						e.preventDefault();
						$(this).parent('div').remove(); //Remove field html
						x--; //Decrement field counter
					});
				});
				$(function() {
                                                                    global_value = 0;
																	//new_val =0;
                                                                    //alert(sR);
                                                                    $(document).on("keyup", "input:text.startrange", function() {
                                                                        var val = this.value;
                                                                        if (val > global_value) {
                                                                            var new_val = parseInt(val) + 1;
                                                                            global_value = new_val;
                                                                            $(this).closest('div').find('.endrange').val(new_val);	
                                                                        } 

																		/* else if(global_value => val)
																		{
																			//alert("please select the value Greater than previous Range");
																		} */
																		/* else {
                                                                           alert("please select the value Greater than previous Range");
                                                                        } */
                                                                        //alert(p);
                                                                    });
																	
																	/* $(document).on("keyup", "input:text.endrange", function() {
                                                                        var val1 = this.value;
																		alert(global_value);
																		
																		if (val1 > global_value) {
																				 alert(global_value+"--yes-"+val1);
																			  //  global_value = val;
																				$(this).removeClass("error");
																			} else {
																				//alert(new_val+"-no--"+val);
																				$(this).addClass("error");
																			}

                                                                    }); */
																	
                                                                });
			</script> 
			
		<script type="text/javascript">
			$(document).ready(function() {
				
				$(document).on("keyup", "input:text.field_name", function() {
					var ptype = $("input[name='dcinclusiveaccomodation']:checked").val()
					if(ptype == 'No')
					{
						$(".Purchase_promo2").show();
						$(".Purchase_promo").hide();
						var type = $("input[name='dcdiscountunit']:checked").val()
						if (type == 'PERCENT') {
							
							var dis1 = parseFloat($('#pp1').val());
							var dis2 = parseFloat($('#pp2').val());
							var dis3 = parseFloat($('#pp3').val());
							var dis4 = parseFloat($('#pp4').val());
							
							var str_rng = parseFloat($('.startrange').val());
							var end_rng = parseFloat($('.endrange').val());
							var amt="";
							var amt1 = parseFloat(this.value);
							if(isNaN(amt1))
							{
								amt = 0;
							}
							else
							{
								amt = amt1;
							}
							//alert(amt1);
							
							var final_amt1 = dis1 * amt / 100;
							var final_amt2= dis2 * amt / 100;
							var final_amt3 = dis3 * amt / 100;
							var final_amt4 = dis4 * amt / 100;

							var dis_rate1 = dis1 - final_amt1;
							var dis_rate2 = dis2 - final_amt2;
							var dis_rate3 = dis3 - final_amt3;
							var dis_rate4 = dis4 - final_amt4;
							
							//alert(dis_rate1);
							$(this).closest('div').find('.dcr1').val(dis_rate1);
							$(this).closest('div').find('.dcr2').val(dis_rate2);
							$(this).closest('div').find('.dcr3').val(dis_rate3);
							$(this).closest('div').find('.dcr4').val(dis_rate4);
							
							$(this).closest('div').find('.str').val(str_rng);
							$(this).closest('div').find('.end').val(end_rng);
							
							$("#disUnitBulkdoll").click(function() {
								$(".dcr1").val("");
								$(".dcr2").val("");
								$(".dcr3").val("");
								$(".dcr4").val("");
							});
							$("#disUnitBulkPer").click(function() {
								$(".dcr1").val("");
								$(".dcr2").val("");
								$(".dcr3").val("");
								$(".dcr4").val("");
							});
							//$(this).closest('div').find('.dcr1').val(dis_rate1);
							//$(this).closest('div').find('.dcr2').val(dis_rate2);
							//$(this).closest('div').find('.dcr3').val(dis_rate3);
							//$(this).closest('div').find('.dcr4').val(dis_rate4);
							
						} else {
							
							var dis1 = parseFloat($('#pp1').val());
							var dis2 = parseFloat($('#pp2').val());
							var dis3 = parseFloat($('#pp3').val());
							var dis4 = parseFloat($('#pp4').val());
							var str_rng = parseFloat($('.startrange').val());
							var end_rng = parseFloat($('.endrange').val());
							
							var amt="";
							var amt1 = parseFloat(this.value);
							if(isNaN(amt1))
							{
								amt = 0;
							}
							else
							{
								amt = amt1;
							}
							//alert(amt1);
							var dis_rate1 = dis1 - amt;
							var dis_rate2 = dis2 - amt;
							var dis_rate3 = dis3 - amt;
							var dis_rate4 = dis4 - amt;
							
							$(this).closest('div').find('.dcr1').val(dis_rate1);
							$(this).closest('div').find('.dcr2').val(dis_rate2);
							$(this).closest('div').find('.dcr3').val(dis_rate3);
							$(this).closest('div').find('.dcr4').val(dis_rate4);
							
							$(this).closest('div').find('.str').val(str_rng);
							$(this).closest('div').find('.end').val(end_rng);
							
							$("#disUnitBulkdoll").click(function() {
								$(".dcr1").val("");
								$(".dcr2").val("");
								$(".dcr3").val("");
								$(".dcr4").val("");
							});
							$("#disUnitBulkPer").click(function() {
								$(".dcr1").val("");
								$(".dcr2").val("");
								$(".dcr3").val("");
								$(".dcr4").val("");
							});
							//$(this).closest('div').find('.discountrate').val(dis_rate);
						}
					}
					else
					{
						var type = $("input[name='dcdiscountunit']:checked").val()
						if (type == 'PERCENT') {
							/* $(".Purchase_promo").show();
							$(".Purchase_promo2").hide(); */
							var dis1 = parseFloat($('#pp01').val());
							var dis2 = parseFloat($('#pp02').val());
							var dis3 = parseFloat($('#pp03').val());
							var dis4 = parseFloat($('#pp04').val());
							var dis5 = parseFloat($('#pp5').val());
							var dis6 = parseFloat($('#pp6').val());
							var dis7 = parseFloat($('#pp7').val());
							var dis8 = parseFloat($('#pp8').val());	
							var dis9 = parseFloat($('#pp9').val());
							var dis10 = parseFloat($('#pp10').val());
							var dis11 = parseFloat($('#pp11').val());
							var dis12 = parseFloat($('#pp12').val());
							var dis13 = parseFloat($('#pp13').val());
							var dis14 = parseFloat($('#pp14').val());
							var dis15 = parseFloat($('#pp15').val());
							var dis16 = parseFloat($('#pp16').val());
							var dis17 = parseFloat($('#pp17').val());
							var dis18 = parseFloat($('#pp18').val());
							var dis19 = parseFloat($('#pp19').val());
							var dis20 = parseFloat($('#pp20').val());
							
							
							var amt="";
							var amt1 = parseFloat(this.value);
							if(isNaN(amt1))
							{
								amt = 0;
							}
							else
							{
								amt = amt1;
							}
							
							var final_amt1 = dis1 * amt / 100;
							var final_amt2= dis2 * amt / 100;
							var final_amt3 = dis3 * amt / 100;
							var final_amt4 = dis4 * amt / 100;
							var final_amt5 = dis5 * amt / 100;
							var final_amt6 = dis6 * amt / 100;
							var final_amt7 = dis7 * amt / 100;
							var final_amt8 = dis8 * amt / 100;
							var final_amt9 = dis9 * amt / 100;
							var final_amt10= dis10 * amt / 100;
							var final_amt11 = dis11 * amt / 100;
							var final_amt12 = dis12 * amt / 100;
							var final_amt13 = dis13 * amt / 100;
							var final_amt14 = dis14 * amt / 100;
							var final_amt15 = dis15 * amt / 100;
							var final_amt16 = dis16 * amt / 100;
							var final_amt17 = dis17 * amt / 100;
							var final_amt18 = dis18 * amt / 100;
							var final_amt19 = dis19 * amt / 100;
							var final_amt20 = dis20 * amt / 100;

							var dis_rate1 = dis1 - final_amt1;
							var dis_rate2 = dis2 - final_amt2;
							var dis_rate3 = dis3 - final_amt3;
							var dis_rate4 = dis4 - final_amt4;
							var dis_rate5 = dis5 - final_amt5;
							var dis_rate6 = dis6 - final_amt6;
							var dis_rate7 = dis7 - final_amt7;
							var dis_rate8 = dis8 - final_amt8;
							var dis_rate9 = dis9 - final_amt9;
							var dis_rate10 = dis10 - final_amt10;
							var dis_rate11 = dis11 - final_amt11;
							var dis_rate12 = dis12 - final_amt12;
							var dis_rate13 = dis13 - final_amt13;
							var dis_rate14 = dis14 - final_amt14;
							var dis_rate15 = dis15 - final_amt15;
							var dis_rate16 = dis16 - final_amt16;
							var dis_rate17 = dis17 - final_amt17;
							var dis_rate18 = dis18 - final_amt18;
							var dis_rate19 = dis19 - final_amt19;
							var dis_rate20 = dis20 - final_amt20;
							
							$(this).closest('div').find('.piay1').val(dis_rate1);
							$(this).closest('div').find('.piay2').val(dis_rate2);
							$(this).closest('div').find('.piay3').val(dis_rate3);
							$(this).closest('div').find('.piay4').val(dis_rate4);
							$(this).closest('div').find('.dcr5').val(dis_rate5);
							$(this).closest('div').find('.dcr6').val(dis_rate6);
							$(this).closest('div').find('.dcr7').val(dis_rate7);
							$(this).closest('div').find('.dcr8').val(dis_rate8);
							$(this).closest('div').find('.dcr9').val(dis_rate9);
							$(this).closest('div').find('.dcr10').val(dis_rate10);
							$(this).closest('div').find('.dcr11').val(dis_rate11);
							$(this).closest('div').find('.dcr12').val(dis_rate12);
							$(this).closest('div').find('.dcr13').val(dis_rate13);
							$(this).closest('div').find('.dcr14').val(dis_rate14);
							$(this).closest('div').find('.dcr15').val(dis_rate15);
							$(this).closest('div').find('.dcr16').val(dis_rate16);
							$(this).closest('div').find('.dcr17').val(dis_rate17);
							$(this).closest('div').find('.dcr18').val(dis_rate18);
							$(this).closest('div').find('.dcr19').val(dis_rate19);
							$(this).closest('div').find('.dcr20').val(dis_rate20);
							
							$(this).closest('div').find('.str').val(str_rng);
							$(this).closest('div').find('.end').val(end_rng);
							
							$("#disUnitBulkdoll").click(function() {
								$(".piay1").val("");
								$(".piay2").val("");
								$(".piay3").val("");
								$(".piay4").val("");
								$(".dcr5").val("");
								$(".dcr6").val("");
								$(".dcr7").val("");
								$(".dcr8").val("");
								$(".dcr9").val("");
								$(".dcr10").val("");
								$(".dcr11").val("");
								$(".dcr12").val("");
								$(".dcr13").val("");
								$(".dcr14").val("");
								$(".dcr15").val("");
								$(".dcr16").val("");
								$(".dcr17").val("");
								$(".dcr18").val("");
								$(".dcr19").val("");
								$(".dcr20").val("");
							});
							$("#disUnitBulkPer").click(function() {
								$(".piay1").val("");
								$(".piay2").val("");
								$(".piay3").val("");
								$(".piay4").val("");
								$(".dcr5").val("");
								$(".dcr6").val("");
								$(".dcr7").val("");
								$(".dcr8").val("");
								$(".dcr9").val("");
								$(".dcr10").val("");
								$(".dcr11").val("");
								$(".dcr12").val("");
								$(".dcr13").val("");
								$(".dcr14").val("");
								$(".dcr15").val("");
								$(".dcr16").val("");
								$(".dcr17").val("");
								$(".dcr18").val("");
								$(".dcr19").val("");
								$(".dcr20").val("");

							});
							
						} else {
							/* $(".Purchase_promo").show();
							$(".Purchase_promo2").hide(); */
							var dis1 = parseFloat($('#pp01').val());
							var dis2 = parseFloat($('#pp02').val());
							var dis3 = parseFloat($('#pp03').val());
							var dis4 = parseFloat($('#pp04').val());
							var dis5 = parseFloat($('#pp5').val());
							var dis6 = parseFloat($('#pp6').val());
							var dis7 = parseFloat($('#pp7').val());
							var dis8 = parseFloat($('#pp8').val());	
							var dis9 = parseFloat($('#pp9').val());
							var dis10 = parseFloat($('#pp10').val());
							var dis11 = parseFloat($('#pp11').val());
							var dis12 = parseFloat($('#pp12').val());
							var dis13 = parseFloat($('#pp13').val());
							var dis14 = parseFloat($('#pp14').val());
							var dis15 = parseFloat($('#pp15').val());
							var dis16 = parseFloat($('#pp16').val());
							var dis17 = parseFloat($('#pp17').val());
							var dis18 = parseFloat($('#pp18').val());
							var dis19 = parseFloat($('#pp19').val());
							var dis20 = parseFloat($('#pp20').val());
							
							var amt="";
							var amt1 = parseFloat(this.value);
							if(isNaN(amt1))
							{
								amt = 0;
							}
							else
							{
								amt = amt1;
							}
							
							var dis_rate1 = dis1 - amt;
							var dis_rate2 = dis2 - amt;
							var dis_rate3 = dis3 - amt;
							var dis_rate4 = dis4 - amt;
							var dis_rate5 = dis5 - amt;
							var dis_rate6 = dis6 - amt;
							var dis_rate7 = dis7 - amt;
							var dis_rate8 = dis8 - amt;
							var dis_rate9 = dis9 - amt;
							var dis_rate10 = dis10 - amt;
							var dis_rate11 = dis11 - amt;
							var dis_rate12 = dis12 - amt;
							var dis_rate13 = dis13 - amt;
							var dis_rate14 = dis14 - amt;
							var dis_rate15 = dis15 - amt;
							var dis_rate16 = dis16 - amt;
							var dis_rate17 = dis17 - amt;
							var dis_rate18 = dis18 - amt;
							var dis_rate19 = dis19 - amt;
							var dis_rate20 = dis20 - amt;
							
							$(this).closest('div').find('.piay1').val(dis_rate1);
							$(this).closest('div').find('.piay2').val(dis_rate2);
							$(this).closest('div').find('.piay3').val(dis_rate3);
							$(this).closest('div').find('.piay4').val(dis_rate4);
							$(this).closest('div').find('.dcr5').val(dis_rate5);
							$(this).closest('div').find('.dcr6').val(dis_rate6);
							$(this).closest('div').find('.dcr7').val(dis_rate7);
							$(this).closest('div').find('.dcr8').val(dis_rate8);
							$(this).closest('div').find('.dcr9').val(dis_rate9);
							$(this).closest('div').find('.dcr10').val(dis_rate10);
							$(this).closest('div').find('.dcr11').val(dis_rate11);
							$(this).closest('div').find('.dcr12').val(dis_rate12);
							$(this).closest('div').find('.dcr13').val(dis_rate13);
							$(this).closest('div').find('.dcr14').val(dis_rate14);
							$(this).closest('div').find('.dcr15').val(dis_rate15);
							$(this).closest('div').find('.dcr16').val(dis_rate16);
							$(this).closest('div').find('.dcr17').val(dis_rate17);
							$(this).closest('div').find('.dcr18').val(dis_rate18);
							$(this).closest('div').find('.dcr19').val(dis_rate19);
							$(this).closest('div').find('.dcr20').val(dis_rate20);
							
							$(this).closest('div').find('.str').val(str_rng);
							$(this).closest('div').find('.end').val(end_rng);
							
							$("#disUnitBulkdoll").click(function() {
								$(".piay1").val("");
								$(".piay2").val("");
								$(".piay3").val("");
								$(".piay4").val("");
								$(".dcr5").val("");
								$(".dcr6").val("");
								$(".dcr7").val("");
								$(".dcr8").val("");
								$(".dcr9").val("");
								$(".dcr10").val("");
								$(".dcr11").val("");
								$(".dcr12").val("");
								$(".dcr13").val("");
								$(".dcr14").val("");
								$(".dcr15").val("");
								$(".dcr16").val("");
								$(".dcr17").val("");
								$(".dcr18").val("");
								$(".dcr19").val("");
								$(".dcr20").val("");

							});
							$("#disUnitBulkPer").click(function() {
								$(".piay1").val("");
								$(".piay2").val("");
								$(".piay3").val("");
								$(".piay4").val("");
								$(".dcr5").val("");
								$(".dcr6").val("");
								$(".dcr7").val("");
								$(".dcr8").val("");
								$(".dcr9").val("");
								$(".dcr10").val("");
								$(".dcr11").val("");
								$(".dcr12").val("");
								$(".dcr13").val("");
								$(".dcr14").val("");
								$(".dcr15").val("");
								$(".dcr16").val("");
								$(".dcr17").val("");
								$(".dcr18").val("");
								$(".dcr19").val("");
								$(".dcr20").val("");

							});
						}
					}

				});
				
				

			});
			$(document).ready(function() {

				$("#disUnitBulkdoll").click(function() {
					$(".startrange").val("");
					$(".endrange").val("");
					$(".field_name").val("");
					$(".discountrate").val("");
					var global_value = 0;

				});
				$("#disUnitBulkPer").click(function() {
					$(".startrange").val("");
					$(".endrange").val("");
					$(".field_name").val("");
					$(".discountrate").val("");
					var global_value = 0;

				});
			});
		</script>
		
		 <hr style="width:100%;">
		<div class="form-group">
			<label class="control-label col-md-3"><b>Apply Promo? </b>
			</label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left: 0px;">
					<input type="radio" class="styled" id="chkapplypromoyes" name="dcapplypromo" value="Yes">YES</label>
				<label class="checkbox-inline">
					<input type="radio" class="styled" name="dcapplypromo" id="chkapplypromono" value="No">NO</label>
			</div>
		</div>
		<div id="dvapplypromo" style="display:none;background:#eeeeee;padding:1%;">
			<div class="form-group">
				<label class="control-label col-md-3"><b>Start Date : </b>
				</label>
				<div class="col-md-3">
					<input type="text" name="applypromo_startdate" value="" id="dpd1" class="form-control">
				</div>
				<label class="control-label col-md-3"><b>End Date : </b>
				</label>
				<div class="col-md-3">
					<input type="text" name="applypromo_enddate" value="" id="dpd2" class="form-control">
				</div>
				

			</div>
			
			
		
			<div class="form-group">
				<label class="control-label col-md-3"><b>Discount Unit : </b>
				</label>
				<div class="col-md-9">
					<label class="checkbox-inline" style="padding-left:0px;">
						<input type="radio" class="styled enter" name="apdiscountunit" value="PERCENT" id="disUnitApplyPromoper">% OR </label>
					<label class="checkbox-inline">
						<input type="radio" class="styled exit" name="apdiscountunit" value="DOLLOR" id="disUnitApplyPromodoll"> $ </label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"><b>Discount Rate : </b>
				</label>
				<div class="col-md-9">
					<input name="apdiscountrate" class="apdiscountrate form-control" type="text" data-popup="tooltip" title="Discount Rate(It is required field)" data-placement="bottom">
					<span class="help-block"></span>
				</div>
			</div>
			<!--div class="form-group">
				<label class="control-label col-md-3"><b>Product Price <br>After Promo Discount? </b>
				</label>
				<div class="col-md-9">
					MYR
					<input name="afterpromo_discount" class="form-control" id="afterpromo_discount" type="text" >
				</div>
			</div-->
			<div class="form-group">
				<label class="control-label col-md-3"><b>Product Price After Promo Discount : </b></label>
				<div class="col-md-9">
					<div class="Apply_promo_1" style="display:none;">
						<div class="table-responsive" style="background:lightblue;">
						<table class="table">
							<tr><td>Normal Rate</td><td>Weekend Rate</td><td>Peak Season Rate</td><td>Super Peak Season Rate</td></tr>
							<tr>
							<td><input type="text" style="width:50px;" class="dcr112" name="text9" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr223" name="text10" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr334" name="text11" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr445" name="text12" readonly><?php echo $dccur; ?>/PAX</td>
							</tr>
						</table>
						</div>
					</div>
					<div class="Apply_promo_2" style="display:none;">
						<div class="table-responsive" style="background:lightblue;">
						<table class="table">
							<tr><td colspan="2" align="right">Normal Rate</td><td>Weekend Rate</td><td>Peak Season Rate</td><td>Super Peak Season Rate</td></tr>
							<tr>
							<td>single room</td>
							<td><input type="text" style="width:50px;" class="ddcr11" name="text13[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="ddcr22" name="text13[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="ddcr33" name="text13[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="ddcr44" name="text13[]" readonly><?php echo $dccur; ?>/PAX</td>
							</tr><tr>
							<td>twin room</td>
							<td><input type="text" style="width:50px;" class="dcr55" name="text14[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr66" name="text14[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr77" name="text14[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr88" name="text14[]" readonly><?php echo $dccur; ?>/PAX</td>
							</tr><tr>
							<td>3 person room</td>
							<td><input type="text" style="width:50px;" class="dcr99" name="text15[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr100" name="text15[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr111" name="text15[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr122" name="text15[]" readonly><?php echo $dccur; ?>/PAX</td>
							</tr><tr>
							<td>quad room</td>
							<td><input type="text" style="width:50px;" class="dcr133" name="text16[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr144" name="text16[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr155" name="text16[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr166" name="text16[]" readonly><?php echo $dccur; ?>/PAX</td></tr>
							<?php
								$data24 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$this->session->userdata('user_id')))->result();
								foreach($data24 as $row_data24)
								{
									if($row_data24->custom_accom_display == "TRUE")
									{
							?>
							<tr>
							<td><?php echo $row_data24->custom_accom; ?></td>
							<td><input type="text" style="width:50px;" class="dcr177" name="text17[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr188" name="text17[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr199" name="text17[]" readonly><?php echo $dccur; ?>/PAX</td>
							<td><input type="text" style="width:50px;" class="dcr200" name="text17[]" readonly><?php echo $dccur; ?>/PAX</td></tr>
							<?php 
									}
								}
							?>
						</table>
						</div>
					</div>
				</div>
			 </div>
		</div>
		<script>
					$(document).ready(function() {
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
								return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
							}
						}).on('changeDate', function(ev) {
							checkout.hide();
						}).data('datepicker');
					});
				</script>
		<script type="text/javascript">

				
				
			$(document).ready(function() {
				
				$(document).on("keyup", "input:text.apdiscountrate", function() {
					var ptype = $("input[name='dcinclusiveaccomodation']:checked").val()
					if(ptype == 'No')
					{
						
						var type = $("input[name='apdiscountunit']:checked").val()
						if (type == 'PERCENT') {
							
							var dis1 = parseFloat($('#pp1').val());
							var dis2 = parseFloat($('#pp2').val());
							var dis3 = parseFloat($('#pp3').val());
							var dis4 = parseFloat($('#pp4').val());
							var amt="";
							var amt1 = parseFloat(this.value);
							if(isNaN(amt1))
							{
								amt = 0;
							}
							else
							{
								amt = amt1;
							}
							
							
							var final_amt1 = dis1 * amt / 100;
							var final_amt2= dis2 * amt / 100;
							var final_amt3 = dis3 * amt / 100;
							var final_amt4 = dis4 * amt / 100;

							var dis_rate1 = dis1 - final_amt1;
							var dis_rate2 = dis2 - final_amt2;
							var dis_rate3 = dis3 - final_amt3;
							var dis_rate4 = dis4 - final_amt4;
							
							//alert(dis_rate1);
							
							$('.dcr112').val(dis_rate1);
							$('.dcr223').val(dis_rate2);
							$('.dcr334').val(dis_rate3);
							$('.dcr445').val(dis_rate4);
							
							$("#disUnitApplyPromodoll").click(function() {
								$(".dcr112").val("");
								$(".dcr223").val("");
								$(".dcr334").val("");
								$(".dcr445").val("");
							});
							$("#disUnitApplyPromoper").click(function() {
								$(".dcr112").val("");
								$(".dcr223").val("");
								$(".dcr334").val("");
								$(".dcr445").val("");
							});
							//$(this).closest('div').find('.dcr1').val(dis_rate1);
							//$(this).closest('div').find('.dcr2').val(dis_rate2);
							//$(this).closest('div').find('.dcr3').val(dis_rate3);
							//$(this).closest('div').find('.dcr4').val(dis_rate4);
							
						} else {
							
							var dis1 = parseFloat($('#pp1').val());
							var dis2 = parseFloat($('#pp2').val());
							var dis3 = parseFloat($('#pp3').val());
							var dis4 = parseFloat($('#pp4').val());
							var amt = parseFloat(this.value);
							
							var dis_rate1 = dis1 - amt;
							var dis_rate2 = dis2 - amt;
							var dis_rate3 = dis3 - amt;
							var dis_rate4 = dis4 - amt;
							
							$('.dcr112').val(dis_rate1);
							$('.dcr223').val(dis_rate2);
							$('.dcr334').val(dis_rate3);
							$('.dcr445').val(dis_rate4);
							
							$("#disUnitApplyPromodoll").click(function() {
								$(".dcr112").val("");
								$(".dcr223").val("");
								$(".dcr334").val("");
								$(".dcr445").val("");
							});
							$("#disUnitApplyPromoper").click(function() {
								$(".dcr112").val("");
								$(".dcr223").val("");
								$(".dcr334").val("");
								$(".dcr445").val("");
							});
							//$(this).closest('div').find('.discountrate').val(dis_rate);
						}
					}
					else
					{
						var type = $("input[name='apdiscountunit']:checked").val()
						if (type == 'PERCENT') {
							
							var dis1 = parseFloat($('#pp01').val());
							var dis2 = parseFloat($('#pp02').val());
							var dis3 = parseFloat($('#pp03').val());
							var dis4 = parseFloat($('#pp04').val());
							var dis5 = parseFloat($('#pp5').val());
							var dis6 = parseFloat($('#pp6').val());
							var dis7 = parseFloat($('#pp7').val());
							var dis8 = parseFloat($('#pp8').val());	
							var dis9 = parseFloat($('#pp9').val());
							var dis10 = parseFloat($('#pp10').val());
							var dis11 = parseFloat($('#pp11').val());
							var dis12 = parseFloat($('#pp12').val());
							var dis13 = parseFloat($('#pp13').val());
							var dis14 = parseFloat($('#pp14').val());
							var dis15 = parseFloat($('#pp15').val());
							var dis16 = parseFloat($('#pp16').val());
							var dis17 = parseFloat($('#pp17').val());
							var dis18 = parseFloat($('#pp18').val());
							var dis19 = parseFloat($('#pp19').val());
							var dis20 = parseFloat($('#pp20').val());
							
											var amt="";
							var amt1 = parseFloat(this.value);
							if(isNaN(amt1))
							{
								amt = 0;
							}
							else
							{
								amt = amt1;
							}
							
							
							var final_amt1 = dis1 * amt / 100;
							var final_amt2= dis2 * amt / 100;
							var final_amt3 = dis3 * amt / 100;
							var final_amt4 = dis4 * amt / 100;
							var final_amt5 = dis5 * amt / 100;
							var final_amt6 = dis6 * amt / 100;
							var final_amt7 = dis7 * amt / 100;
							var final_amt8 = dis8 * amt / 100;
							var final_amt9 = dis9 * amt / 100;
							var final_amt10= dis10 * amt / 100;
							var final_amt11 = dis11 * amt / 100;
							var final_amt12 = dis12 * amt / 100;
							var final_amt13 = dis13 * amt / 100;
							var final_amt14 = dis14 * amt / 100;
							var final_amt15 = dis15 * amt / 100;
							var final_amt16 = dis16 * amt / 100;
							var final_amt17 = dis17 * amt / 100;
							var final_amt18 = dis18 * amt / 100;
							var final_amt19 = dis19 * amt / 100;
							var final_amt20 = dis20 * amt / 100;

							var dis_rate1 = dis1 - final_amt1;
							var dis_rate2 = dis2 - final_amt2;
							var dis_rate3 = dis3 - final_amt3;
							var dis_rate4 = dis4 - final_amt4;
							var dis_rate5 = dis5 - final_amt5;
							var dis_rate6 = dis6 - final_amt6;
							var dis_rate7 = dis7 - final_amt7;
							var dis_rate8 = dis8 - final_amt8;
							var dis_rate9 = dis9 - final_amt9;
							var dis_rate10 = dis10 - final_amt10;
							var dis_rate11 = dis11 - final_amt11;
							var dis_rate12 = dis12 - final_amt12;
							var dis_rate13 = dis13 - final_amt13;
							var dis_rate14 = dis14 - final_amt14;
							var dis_rate15 = dis15 - final_amt15;
							var dis_rate16 = dis16 - final_amt16;
							var dis_rate17 = dis17 - final_amt17;
							var dis_rate18 = dis18 - final_amt18;
							var dis_rate19 = dis19 - final_amt19;
							var dis_rate20 = dis20 - final_amt20;

							$('.ddcr11').val(dis_rate1);
							$('.ddcr22').val(dis_rate2);
							$('.ddcr33').val(dis_rate3);
							$('.ddcr44').val(dis_rate4);
							$('.dcr55').val(dis_rate5);
							$('.dcr66').val(dis_rate6);
							$('.dcr77').val(dis_rate7);
							$('.dcr88').val(dis_rate8);
							$('.dcr99').val(dis_rate9);
							$('.dcr100').val(dis_rate10);
							$('.dcr111').val(dis_rate11);
							$('.dcr122').val(dis_rate12);
							$('.dcr133').val(dis_rate13);
							$('.dcr144').val(dis_rate14);
							$('.dcr155').val(dis_rate15);
							$('.dcr166').val(dis_rate16);
							$('.dcr177').val(dis_rate17);
							$('.dcr188').val(dis_rate18);
							$('.dcr199').val(dis_rate19);
							$('.dcr200').val(dis_rate20);
							
							//$(this).closest('div').find('.dcr1').val(dis_rate1);
							//$(this).closest('div').find('.dcr2').val(dis_rate2);
							//$(this).closest('div').find('.dcr3').val(dis_rate3);
							//$(this).closest('div').find('.dcr4').val(dis_rate4);
							$("#disUnitApplyPromodoll").click(function() {
								$(".ddcr11").val("");
								$(".ddcr22").val("");
								$(".ddcr33").val("");
								$(".ddcr44").val("");
								$(".dcr55").val("");
								$(".dcr66").val("");
								$(".dcr77").val("");
								$(".dcr88").val("");
								$(".dcr99").val("");
								$(".dcr100").val("");
								$(".dcr111").val("");
								$(".dcr122").val("");
								$(".dcr133").val("");
								$(".dcr144").val("");
								$(".dcr155").val("");
								$(".dcr166").val("");
								$('.dcr177').val("");
								$('.dcr188').val("");
								$('.dcr199').val("");
								$('.dcr200').val("");

							});
							$("#disUnitApplyPromoper").click(function() {
								$(".ddcr11").val("");
								$(".ddcr22").val("");
								$(".ddcr33").val("");
								$(".ddcr44").val("");
								$(".dcr55").val("");
								$(".dcr66").val("");
								$(".dcr77").val("");
								$(".dcr88").val("");
								$(".dcr99").val("");
								$(".dcr100").val("");
								$(".dcr111").val("");
								$(".dcr122").val("");
								$(".dcr133").val("");
								$(".dcr144").val("");
								$(".dcr155").val("");
								$(".dcr166").val("");
								$('.dcr177').val("");
								$('.dcr188').val("");
								$('.dcr199').val("");
								$('.dcr200').val("");

							});
							
						} else {
							
							var dis1 = parseFloat($('#pp01').val());
							var dis2 = parseFloat($('#pp02').val());
							var dis3 = parseFloat($('#pp03').val());
							var dis4 = parseFloat($('#pp04').val());
							var dis5 = parseFloat($('#pp5').val());
							var dis6 = parseFloat($('#pp6').val());
							var dis7 = parseFloat($('#pp7').val());
							var dis8 = parseFloat($('#pp8').val());	
							var dis9 = parseFloat($('#pp9').val());
							var dis10 = parseFloat($('#pp10').val());
							var dis11 = parseFloat($('#pp11').val());
							var dis12 = parseFloat($('#pp12').val());
							var dis13 = parseFloat($('#pp13').val());
							var dis14 = parseFloat($('#pp14').val());
							var dis15 = parseFloat($('#pp15').val());
							var dis16 = parseFloat($('#pp16').val());
							var dis17 = parseFloat($('#pp17').val());
							var dis18 = parseFloat($('#pp18').val());
							var dis19 = parseFloat($('#pp19').val());
							var dis20 = parseFloat($('#pp20').val());
							
							var amt="";
							var amt1 = parseFloat(this.value);
							if(isNaN(amt1))
							{
								amt = 0;
							}
							else
							{
								amt = amt1;
							}
							
							
							var dis_rate1 = dis1 - amt;
							var dis_rate2 = dis2 - amt;
							var dis_rate3 = dis3 - amt;
							var dis_rate4 = dis4 - amt;
							var dis_rate5 = dis5 - amt;
							var dis_rate6 = dis6 - amt;
							var dis_rate7 = dis7 - amt;
							var dis_rate8 = dis8 - amt;
							var dis_rate9 = dis9 - amt;
							var dis_rate10 = dis10 - amt;
							var dis_rate11 = dis11 - amt;
							var dis_rate12 = dis12 - amt;
							var dis_rate13 = dis13 - amt;
							var dis_rate14 = dis14 - amt;
							var dis_rate15 = dis15 - amt;
							var dis_rate16 = dis16 - amt;
							var dis_rate17 = dis17 - amt;
							var dis_rate18 = dis18 - amt;
							var dis_rate19 = dis19 - amt;
							var dis_rate20 = dis20 - amt;
							
							$('.ddcr11').val(dis_rate1);
							$('.ddcr22').val(dis_rate2);
							$('.ddcr33').val(dis_rate3);
							$('.ddcr44').val(dis_rate4);
							$('.dcr55').val(dis_rate5);
							$('.dcr66').val(dis_rate6);
							$('.dcr77').val(dis_rate7);
							$('.dcr88').val(dis_rate8);
							$('.dcr99').val(dis_rate9);
							$('.dcr100').val(dis_rate10);
							$('.dcr111').val(dis_rate11);
							$('.dcr122').val(dis_rate12);
							$('.dcr133').val(dis_rate13);
							$('.dcr144').val(dis_rate14);
							$('.dcr155').val(dis_rate15);
							$('.dcr166').val(dis_rate16);
							$('.dcr177').val(dis_rate17);
							$('.dcr188').val(dis_rate18);
							$('.dcr199').val(dis_rate19);
							$('.dcr200').val(dis_rate20);
							//$(this).closest('div').find('.discountrate').val(dis_rate);
							$("#disUnitApplyPromodoll").click(function() {
								$(".ddcr11").val("");
								$(".ddcr22").val("");
								$(".ddcr33").val("");
								$(".ddcr44").val("");
								$(".dcr55").val("");
								$(".dcr66").val("");
								$(".dcr77").val("");
								$(".dcr88").val("");
								$(".dcr99").val("");
								$(".dcr100").val("");
								$(".dcr111").val("");
								$(".dcr122").val("");
								$(".dcr133").val("");
								$(".dcr144").val("");
								$(".dcr155").val("");
								$(".dcr166").val("");
								$('.dcr177').val("");
								$('.dcr188').val("");
								$('.dcr199').val("");
								$('.dcr200').val("");

							});
							$("#disUnitApplyPromoper").click(function() {
								$(".ddcr11").val("");
								$(".ddcr22").val("");
								$(".ddcr33").val("");
								$(".ddcr44").val("");
								$(".dcr55").val("");
								$(".dcr66").val("");
								$(".dcr77").val("");
								$(".dcr88").val("");
								$(".dcr99").val("");
								$(".dcr100").val("");
								$(".dcr111").val("");
								$(".dcr122").val("");
								$(".dcr133").val("");
								$(".dcr144").val("");
								$(".dcr155").val("");
								$(".dcr166").val("");
								$('.dcr177').val("");
								$('.dcr188').val("");
								$('.dcr199').val("");
								$('.dcr200').val("");

							});
						}
					}

				});
				
				

			});
			$(document).ready(function() {

				$("#disUnitApplyPromodoll").click(function() {
					$(".apdiscountrate").val("");
					

				});
				$("#disUnitApplyPromoper").click(function() {
					$(".apdiscountrate").val("");
					

				});
			});
		</script>
		<script type="text/javascript">
			$(function() {
				$("input[name='dcapplypromo']").click(function() {
					if ($("#chkapplypromoyes").is(":checked")) {
						$("#dvapplypromo").show();
						$(".disable_promodiscount").show();
					} else {
						$("#dvapplypromo").hide();
						$(".disable_promodiscount").hide();
					}
				});
			});

			/* $("#apdiscountrate").keyup(function() {
				var dis1 = parseFloat($('.product_price').val());
				var amt1 = parseFloat($('#apdiscountrate').val());

				var final_amt1 = dis1 * amt1 / 100;
				var dis_rate1 = dis1 - final_amt1;

				//var final_amt = amt - dis_rate;
				$('#afterpromo_discount').val(dis_rate1);
			}); */
			

		</script>
		 <hr style="width:100%;">
		<div class="form-group">
			<label class="control-label col-md-3"><b>Apply Promo for <br>Bulk Discount? </b></label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left:0px;">
				<input type="radio" id="apbulkdiscountYes" name="apbulkdiscount" class="styled apbd_removw" value="Yes" onClick="showTextBox77()">YES</label>
				<label class="checkbox-inline"><input type="radio" class="styled apbd_removw1" name="apbulkdiscount"  value="No" id="apbulkdiscountNo" onClick="showTextBox78()">NO</label>
			</div>
		 </div>

		
		<table class="table testcase" id="" style="background:#eeeeee;padding:1%;">
			
		</table>
		 <!--div id="applyBulkDiscountDiv" style="background:#eeeeee;padding:3%;">
			<table class="table">
				<tr class="testcase">
					<td><b>Range</b></td>
					<td><input type="text"  class="form-control dcr25" name="" value=""></td>
					<td><b>TO</b></td>
					<td><input type="text" class="form-control" name=""></td>
					<td><b>Price</b></td>
					<td><input type="text"  class="form-control" name=""></td>
				</tr>
			</table>
		 </div-->
		 <script>
			$('.exit').click(function() {
				$('.apbd_removw').prop('checked', false);
				$('.apbd_removw1').prop('checked', true);
				$(".testcase").hide();
				//console.log(choice);
			});
			$('.enter').click(function() {
				$('.apbd_removw').prop('checked', false);
				$('.apbd_removw1').prop('checked', true);
				$(".testcase").hide();
				//console.log(choice);
			});
		</script>
		 <script>
		 function showTextBox77() {
					$(".testcase").show();
					
				}

				function showTextBox78() {
					$(".testcase").hide();
				}
			$(function() {
				/* var count = 0; */
				$("input[name='apbulkdiscount']").click(function() {
					
					
					if ($("#apbulkdiscountYes").is(":checked")) 
					{
						$(".testcase").empty();
						if ($("#chkapplypromoyes").is(":checked")) 
						{
							if ($("#dcdiscountpurchaseYes").is(":checked"))
							{
								/* if(count < 1)
								{ */
								
								var values = $("input[class='startrange']")
												  .map(function(){return $(this).val();}).get();
								//alert(values);				  
								var ptype1 = $("input[name='dcinclusiveaccomodation']:checked").val()
								//alert(ptype1);
								if(ptype1 == 'No')
								{
									var type = $("input[name='apdiscountunit']:checked").val()
                                    if (type == 'PERCENT') 
									{
										var wrapper = $(".testcase");									
									for (var k = 0; k < (values.length -1); k++) {
									if( parseInt(values[k]) > 0)
									{
									var r2 = parseInt(values[k]) + 1;
									$(wrapper).append('<div class="form-group" style="margin-bottom: 3px;margin-top: 5px;"><label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td>Range</td><td><input type="text"  class="form-control dcr25" name="apbdr1[]" value="'+values[k]+'" readonly></td><td>TO</td><td><input type="text" class="form-control" name="apbdr2[]" value="'+r2+'" readonly></td></tr></table></div></div></div>');
			  
									var dis1 = $("input[class='dcr1']")
												  .map(function(){return $(this).val();}).get();
									var dis2 = $("input[class='dcr2']")
												  .map(function(){return $(this).val();}).get();
									var dis3 = $("input[class='dcr3']")
												  .map(function(){return $(this).val();}).get();
									var dis4 = $("input[class='dcr4']")
												  .map(function(){return $(this).val();}).get();
												  
									var disrate = parseFloat($('.apdiscountrate').val());
									var fi1 = dis1[k] - dis1[k] * disrate / 100;
									var fi2 = dis2[k] - dis2[k] * disrate / 100;
									var fi3 = dis3[k] - dis3[k] * disrate / 100;
									var fi4 = dis4[k] - dis4[k] * disrate / 100;
									
										$(wrapper).append('<div class="form-group" style="margin-bottom: 3px;margin-top: 5px;"><label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td>Normal Rate</td><td>Weekend Rate</td><td>Peak Season Rate</td><td>Super Peak Season Rate</td></tr><tr><td><input type="text" style="width:50px;" class="dc1" name="apbd1[]" value="'+fi1+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc2" name="apbd2[]" value="'+fi2+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc3" name="apbd3[]" value="'+fi3+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc4" name="apbd4[]" value="'+fi4+'" readonly><?php echo $dccur; ?>/PAX</td></tr></table></div></div></div>');
									}
									}
									}
									else
									{
										var wrapper = $(".testcase");									
									for (var k = 0; k < (values.length -1); k++) {
									if( parseInt(values[k]) > 0)
									{
									var r2 = parseInt(values[k]) + 1;
									$(wrapper).append('<div class="form-group" style="margin-bottom: 3px;margin-top: 5px;"><label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td>Range</td><td><input type="text"  class="form-control dcr25" name="apbdr1[]" value="'+values[k]+'" readonly></td><td>TO</td><td><input type="text" class="form-control" name="apbdr2[]" value="'+r2+'" readonly></td></tr></table></div></div></div>');
			  
									var dis1 = $("input[class='dcr1']")
												  .map(function(){return $(this).val();}).get();
									var dis2 = $("input[class='dcr2']")
												  .map(function(){return $(this).val();}).get();
									var dis3 = $("input[class='dcr3']")
												  .map(function(){return $(this).val();}).get();
									var dis4 = $("input[class='dcr4']")
												  .map(function(){return $(this).val();}).get();
												  
									var disrate = parseFloat($('.apdiscountrate').val());
									var fi1 = dis1[k] - disrate;
									var fi2 = dis2[k] - disrate;
									var fi3 = dis3[k] - disrate;
									var fi4 = dis4[k] - disrate;
									
										$(wrapper).append('<div class="form-group" style="margin-bottom: 3px;margin-top: 5px;"><label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td>Normal Rate</td><td>Weekend Rate</td><td>Peak Season Rate</td><td>Super Peak Season Rate</td></tr><tr><td><input type="text" style="width:50px;" class="dc1" name="apbd1[]" value="'+fi1+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc2" name="apbd2[]" value="'+fi2+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc3" name="apbd3[]" value="'+fi3+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc4" name="apbd4[]" value="'+fi4+'" readonly><?php echo $dccur; ?>/PAX</td></tr></table></div></div></div>');
									}
									}
									}
									
									
								}
								else if(ptype1 == 'Yes')
								{
									var type = $("input[name='apdiscountunit']:checked").val()
                                    if (type == 'PERCENT') 
									{
										var wrapper = $(".testcase");
									var j=0;						
									for (var i = 1; i < values.length; i++) {
									if( parseInt(values[i]) != 0)
									{
									var r2 = parseInt(values[i]) + 1;
									$(wrapper).append('<div class="form-group" style="margin-bottom: 3px;margin-top: 5px;"><label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td>Range</td><td><input type="text"  class="form-control dcr25" name="apbdr1[]" value="'+values[i]+'" readonly></td><td>TO</td><td><input type="text" class="form-control" name="apbdr2[]" value="'+r2+'" readonly></td></tr></table></div></div></div>');
								
									var dis1 = $("input[class='piay1']")
												  .map(function(){return $(this).val();}).get();
									var dis2 = $("input[class='piay2']")
												  .map(function(){return $(this).val();}).get();
									var dis3 = $("input[class='piay3']")
												  .map(function(){return $(this).val();}).get();
									var dis4 = $("input[class='piay4']")
												  .map(function(){return $(this).val();}).get();
									var dis5 = $("input[class='dcr5']")
												  .map(function(){return $(this).val();}).get();
									var dis6 = $("input[class='dcr6']")
												  .map(function(){return $(this).val();}).get();
									var dis7 = $("input[class='dcr7']")
												  .map(function(){return $(this).val();}).get();
									var dis8 = $("input[class='dcr8']")
												  .map(function(){return $(this).val();}).get();
									var dis9 = $("input[class='dcr9']")
												  .map(function(){return $(this).val();}).get();
									var dis10 = $("input[class='dcr10']")
												  .map(function(){return $(this).val();}).get();
									var dis11 = $("input[class='dcr11']")
												  .map(function(){return $(this).val();}).get();
									var dis12 = $("input[class='dcr12']")
												  .map(function(){return $(this).val();}).get();
									var dis13 = $("input[class='dcr13']")
												  .map(function(){return $(this).val();}).get();
									var dis14 = $("input[class='dcr14']")
												  .map(function(){return $(this).val();}).get();
									var dis15 = $("input[class='dcr15']")
												  .map(function(){return $(this).val();}).get();
									var dis16 = $("input[class='dcr16']")
												  .map(function(){return $(this).val();}).get();
									var dis17 = $("input[class='dcr17']")
												  .map(function(){return $(this).val();}).get();
									var dis18 = $("input[class='dcr18']")
												  .map(function(){return $(this).val();}).get();
									var dis19 = $("input[class='dcr19']")
												  .map(function(){return $(this).val();}).get();
									var dis20 = $("input[class='dcr20']")
												  .map(function(){return $(this).val();}).get();
												  
									var disrate = parseFloat($('.apdiscountrate').val());
									var fi1 = dis1[j] - dis1[j] * disrate / 100;
									var fi2 = dis2[j] - dis2[j] * disrate / 100;
									var fi3 = dis3[j] - dis3[j] * disrate / 100;
									var fi4 = dis4[j] - dis4[j] * disrate / 100;
									var fi5 = dis5[j] - dis5[j] * disrate / 100;
									var fi6 = dis6[j] - dis6[j] * disrate / 100;
									var fi7 = dis7[j] - dis7[j] * disrate / 100;
									var fi8 = dis8[j] - dis8[j] * disrate / 100;
									var fi9 = dis9[j] - dis9[j] * disrate / 100;
									var fi10 = dis10[j] - dis10[j] * disrate / 100;
									var fi11 = dis11[j] - dis11[j] * disrate / 100;
									var fi12 = dis12[j] - dis12[j] * disrate / 100;
									var fi13 = dis13[j] - dis13[j] * disrate / 100;
									var fi14 = dis14[j] - dis14[j] * disrate / 100;
									var fi15 = dis15[j] - dis15[j] * disrate / 100;
									var fi16 = dis16[j] - dis16[j] * disrate / 100;
									var fi17 = dis17[j] - dis17[j] * disrate / 100;
									var fi18 = dis18[j] - dis18[j] * disrate / 100;
									var fi19 = dis19[j] - dis19[j] * disrate / 100;
									var fi20 = dis20[j] - dis20[j] * disrate / 100;
									
										$(wrapper).append('<div class="form-group" style="margin-bottom: 3px;margin-top: 5px;"><label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td></td><td>Normal Rate</td><td>Weekend Rate</td><td>Peak Season Rate</td><td>Super Peak Season Rate</td></tr><tr><td>single room</td><td><input type="text" style="width:50px;" class="dc1" name="apbd5[]" value="'+fi1+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc2" name="apbd5[]" value="'+fi2+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc3" name="apbd5[]" value="'+fi3+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc4" name="apbd5[]" value="'+fi4+'" readonly><?php echo $dccur; ?>/PAX</td></tr><tr><td>twin room</td><td><input type="text" style="width:50px;" name="apbd6[]" value="'+fi5+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd6[]" value="'+fi6+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd6[]" value="'+fi7+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd6[]" value="'+fi8+'" readonly><?php echo $dccur; ?>/PAX</td></tr><tr><td>3 person room</td><td><input type="text" style="width:50px;" name="apbd7[]" value="'+fi9+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd7[]" value="'+fi10+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd7[]" value="'+fi11+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd7[]" value="'+fi12+'" readonly><?php echo $dccur; ?>/PAX</td></tr><tr><td>quad room</td><td><input type="text" style="width:50px;" name="apbd8[]" value="'+fi13+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd8[]" value="'+fi14+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd8[]" value="'+fi15+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd8[]" value="'+fi16+'" readonly><?php echo $dccur; ?>/PAX</td></tr><?php $data24 = $this->db->get_where('tbl_dcprofile',array('user_id'=>$this->session->userdata('user_id')))->result(); foreach($data24 as $row_data24) { if($row_data24->custom_accom_display == "TRUE") { ?> <tr><td><?php echo $row_data24->custom_accom; ?></td><td><input type="text" style="width:50px;" name="apbd9[]" value="'+fi17+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd9[]" value="'+fi18+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd9[]" value="'+fi19+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd9[]" value="'+fi20+'" readonly><?php echo $dccur; ?>/PAX</td></tr> <?php } } ?></table></div></div></div>');
										
										j++;
									}
									}
									}
									else
									{
										var wrapper = $(".testcase");
									var j=0;						
									for (var i = 1; i < values.length; i++) {
									if( parseInt(values[i]) != 0)
									{
									var r2 = parseInt(values[i]) + 1;
									$(wrapper).append('<div class="form-group" style="margin-bottom: 3px;margin-top: 5px;"><label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td>Range</td><td><input type="text"  class="form-control dcr25" name="apbdr1[]" value="'+values[i]+'" readonly></td><td>TO</td><td><input type="text" class="form-control" name="apbdr2[]" value="'+r2+'" readonly></td></tr></table></div></div></div>');
								
									var dis1 = $("input[class='piay1']")
												  .map(function(){return $(this).val();}).get();
									var dis2 = $("input[class='piay2']")
												  .map(function(){return $(this).val();}).get();
									var dis3 = $("input[class='piay3']")
												  .map(function(){return $(this).val();}).get();
									var dis4 = $("input[class='piay4']")
												  .map(function(){return $(this).val();}).get();
									var dis5 = $("input[class='dcr5']")
												  .map(function(){return $(this).val();}).get();
									var dis6 = $("input[class='dcr6']")
												  .map(function(){return $(this).val();}).get();
									var dis7 = $("input[class='dcr7']")
												  .map(function(){return $(this).val();}).get();
									var dis8 = $("input[class='dcr8']")
												  .map(function(){return $(this).val();}).get();
									var dis9 = $("input[class='dcr9']")
												  .map(function(){return $(this).val();}).get();
									var dis10 = $("input[class='dcr10']")
												  .map(function(){return $(this).val();}).get();
									var dis11 = $("input[class='dcr11']")
												  .map(function(){return $(this).val();}).get();
									var dis12 = $("input[class='dcr12']")
												  .map(function(){return $(this).val();}).get();
									var dis13 = $("input[class='dcr13']")
												  .map(function(){return $(this).val();}).get();
									var dis14 = $("input[class='dcr14']")
												  .map(function(){return $(this).val();}).get();
									var dis15 = $("input[class='dcr15']")
												  .map(function(){return $(this).val();}).get();
									var dis16 = $("input[class='dcr16']")
												  .map(function(){return $(this).val();}).get();
									var dis17 = $("input[class='dcr17']")
												  .map(function(){return $(this).val();}).get();
									var dis18 = $("input[class='dcr18']")
												  .map(function(){return $(this).val();}).get();
									var dis19 = $("input[class='dcr19']")
												  .map(function(){return $(this).val();}).get();
									var dis20 = $("input[class='dcr20']")
												  .map(function(){return $(this).val();}).get();
												  
									var disrate = parseFloat($('.apdiscountrate').val());
									var fi1 = dis1[j] - disrate;
									var fi2 = dis2[j] - disrate;
									var fi3 = dis3[j] - disrate;
									var fi4 = dis4[j] - disrate;
									var fi5 = dis5[j] - disrate;
									var fi6 = dis6[j] - disrate;
									var fi7 = dis7[j] - disrate;
									var fi8 = dis8[j] - disrate;
									var fi9 = dis9[j] - disrate;
									var fi10 = dis10[j] - disrate;
									var fi11 = dis11[j] - disrate;
									var fi12 = dis12[j] - disrate;
									var fi13 = dis13[j] - disrate;
									var fi14 = dis14[j] - disrate;
									var fi15 = dis15[j] - disrate;
									var fi16 = dis16[j] - disrate;
									var fi17 = dis17[j] - disrate;
									var fi18 = dis18[j] - disrate;
									var fi19 = dis19[j] - disrate;
									var fi20 = dis20[j] - disrate;
									
										$(wrapper).append('<div class="form-group" style="margin-bottom: 3px;margin-top: 5px;"><label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td></td><td>Normal Rate</td><td>Weekend Rate</td><td>Peak Season Rate</td><td>Super Peak Season Rate</td></tr><tr><td>single room</td><td><input type="text" style="width:50px;" class="dc1" name="apbd5[]" value="'+fi1+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc2" name="apbd5[]" value="'+fi2+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc3" name="apbd5[]" value="'+fi3+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc4" name="apbd5[]" value="'+fi4+'" readonly><?php echo $dccur; ?>/PAX</td></tr><tr><td>twin room</td><td><input type="text" style="width:50px;" name="apbd6[]" value="'+fi5+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd6[]" value="'+fi6+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd6[]" value="'+fi7+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd6[]" value="'+fi8+'" readonly><?php echo $dccur; ?>/PAX</td></tr><tr><td>3 person room</td><td><input type="text" style="width:50px;" name="apbd7[]" value="'+fi9+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd7[]" value="'+fi10+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd7[]" value="'+fi11+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd7[]" value="'+fi12+'" readonly><?php echo $dccur; ?>/PAX</td></tr><tr><td>quad room</td><td><input type="text" style="width:50px;" name="apbd8[]" value="'+fi13+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd8[]" value="'+fi14+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd8[]" value="'+fi15+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd8[]" value="'+fi16+'" readonly><?php echo $dccur; ?>/PAX</td></tr><?php $data24 = $this->db->get_where('tbl_dcprofile',array('user_id'=>$this->session->userdata('user_id')))->result(); foreach($data24 as $row_data24) { if($row_data24->custom_accom_display == "TRUE") { ?> <tr><td><?php echo $row_data24->custom_accom; ?></td><td><input type="text" style="width:50px;" name="apbd9[]" value="'+fi17+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd9[]" value="'+fi18+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd9[]" value="'+fi19+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" name="apbd9[]" value="'+fi20+'" readonly><?php echo $dccur; ?>/PAX</td></tr> <?php } } ?></table></div></div></div>');
										
										j++;
									}
									}
									}
									
								}
								
								/* $('#applyBulkDiscountDiv').show();
								for(i =0; i<arr.length;i++)
								{
									 $('#applyBulkDiscountDiv').text(arr[$i]));
								} */
								
								/* count++;
								}
								else
								{
									//$("#apbulkdiscountYes").off("click");   //remove click listener. 
								} */
							}
						}
					
					}
						
				});
			});
			
		 </script>
		  <hr style="width:100%;">

		 <div class="form-group">
			<label class="control-label col-md-3"><b>Optional Services : </b></label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left:0px;">
				<input type="radio" name="optionalservices1" class="styled" onClick="showTextBox94()" value="Yes">YES</label>
				<label class="checkbox-inline"><input type="radio" class="styled" name="optionalservices1" onClick="showTextBox93()" value="No">NO</label>
			</div>	
		 </div>			
		<div class="optionalservices1" style="display:none;background:#eeeeee;padding:3%;">
			<div class="row">
				<div class="col-md-3">Services</div>
				<div class="col-md-3">Price of Service</div>
				<div class="col-md-3">Quantity Require?</div>
				<div class="col-md-3">&nbsp;</div>
			</div>
			<div class="field_wrapper2">
				<div style="border:1px solid gray;padding:10px;">
					<input type="text" name="services[]" style="width:200px"/> Price : <input type="text" name="price_of_service[]" style="width:170px"/>
					<select name="quantity_require[]" style="width:200px"><option label="select require"></option><option value="N">N</option><option value="Y">Y</option></select>
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
			var fieldHTML = '<div style="border:1px solid gray;padding:10px;"><input type="text" name="services[]" style="width:200px"/> Price : <input type="text" name="price_of_service[]" style="width:170px"/><select name="quantity_require[]" style="width:200px"><option label="select require"></option><option value="N">N</option><option value="Y">Y</option></select><a href="javascript:void(0);" class="remove_button2" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/></a></div>'; //New input field html 
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
		
		<div class="Acc_details" style="display:none;">
		<div class="form-group">
			<label class="control-label col-md-12" style="color: #ff5722;"><b>ACCOMMODATION DETAILS</b></label>
		 </div>
		 <div class="form-group">
			<label class="control-label col-md-3"><b> DISPLAY ACCOMMODATION : </b></label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left:0px;">
				<input type="radio" name="accommodation_display" class="styled" onClick="showTextBox33()" value="Yes">YES</label>
				<label class="checkbox-inline"><input type="radio" class="styled" name="accommodation_display" onClick="showTextBox34()" value="No">NO</label>
			</div>	
		 </div>
		<div class="accommodation_details" style="background:#f4f4f4;padding:1%;display:none;" >
		
		<div class="form-group">
			<label class="control-label col-md-3"><b>Accommodation Name : </b></label>
			<div class="col-md-9">
			   <input name="accomodation_name" class="form-control" type="text"  data-popup="tooltip" title="Accommodation Name(It is required field)" data-placement="bottom">
			   <span class="help-block"></span>
			</div>
		 </div>
		 <div class="form-group">
			<label class="control-label col-md-3"><b>Accommodates : </b></label>
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
			<label class="control-label col-md-3"><b>Check In </b></label>
			<div class="col-md-9">
				<div class="col-md-3">
					<input name="checkintime" class="form-control" id="timepicker1" type="text" data-popup="tooltip" title="Check In(It is required field)" data-placement="bottom" value="03 : 00 : PM">
				</div>
				<div class="col-md-6">
					<label class="control-label col-md-5"><b>Check Out </b></label>
					<div class="col-md-7">
						<input name="checkouttime" class="form-control" id="timepicker2" type="text" data-popup="tooltip" title="Check Out(It is required field)" data-placement="bottom" value="03 : 00 : PM">
					</div>
				</div>
				
			</div>
			
			<script>
				$('#timepicker1').timepicki({start_time: ["03","00","PM"]});
				$('#timepicker2').timepicki({start_time: ["03","00","PM"]});
			</script>
		 </div>
		 <div class="form-group">
			<label class="control-label col-md-3"><b>Accommodation Type</b></label>
			<div class="col-md-5">
				<label class="checkbox-inline" style="padding-left:0px;"><input type="radio" class="styled" name="actype" value="Capsule" id="chkacctypeno">Capsule</label>
				<label class="checkbox-inline"><input type="radio" class="styled" name="actype" value="Chalet" id="chkacctypeno">Chalet</label>
				<label class="checkbox-inline"><input type="radio" class="styled" name="actype" value="Hotel" id="chkacctypeno">Hotel</label>
			</div>
			<div class="col-md-2">
				<label class="checkbox-inline">
				<input type="radio" class="styled" id="chkacctypeothers" name="actype"/>OTHERS</label>
			</div>
			<div class="col-md-2">
				<label class="checkbox-inline"><div id="dvaccomodationtype" style="display: none">
				<input type="text" name="actype1"/></div></label>
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
			<label class="control-label col-md-3"><b>Room Amenities</b></label>
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
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Hot Shower" onClick="getResults(this)">Hot Shower</label>
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Cold Shower" onClick="getResults(this)">Cold Shower</label>
				</div>
				<div class="row">
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Attached Bathroom" onClick="getResults(this)">Attached Bathroom</label>
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="amenities[]" value="Common Bathroom" onClick="getResults(this)">Common Bathroom</label>
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
		 <div class="form-group">
			<label class="control-label col-md-3"><b>Accommodation Facilities / Services</b></label>
			<div class="col-md-9">
				<div class="row">
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Swimming Pool" >Swimming Pool</label>
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Restaurant" >Restaurant</label>
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Spa" >Spa</label>
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Fitness Center" >Fitness Center</label>
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Water Sports (Motorized)">Water Sports (Motorized)</label>
				</div>
				<div class="row">
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Water Sports (Non-motorized)">Water Sports (Non-motorized)</label>
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Bar" >Bar</label>
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Poolside Bar" >Poolside Bar</label>
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Cafe" >Cafe</label>
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Laundry Service" >Laundry Service</label>
				</div>
				<div class="row">
				
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Games Room" >Games Room</label>
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Bicycle Rental" >Bicycle Rental</label>
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Motorcycle Rental" >Motorcycle Rental</label>
				<label class="checkbox-inline"><input type="checkbox" class="styled" name="afacilities[]" value="Car Rental" >Car Rental</label>
				</div>
			</div>
		 </div>
		</div>
		</div>
		<script>
			function showTextBox33() {
					$(".accommodation_details").show();
				}
				function showTextBox34() {
					$(".accommodation_details").hide();
				}
		</script>
	</fieldset>
	<fieldset title="4">
		<legend class="text-semibold">Other Details</legend>
		
					<div class="form-group">
						<label class="control-label col-md-12" style="color: #ff5722;"><b>OTHER INFORMATION TO DISPLAY: </b></label>
					 </div>
					 <hr style="width:100%">
					 <div class="form-group">
						<label class="control-label col-md-5"><b style="color:red">Do You want Display the Diver Certification</b>
						</label>
						<div class="col-md-3">
							<div class="row">
								<label class="checkbox-inline">
									<input type="checkbox" class="styled" name="displaydivercertification" value="TRUE" id="displaydivercertification">Display</label>
								
							</div>
						</div>
					</div>
					 <div class="form-group">
                         <label class="control-label col-md-3"><b>Diver Certification Required </b><span style="color:red">*</span></label>
                        <div class="col-md-9">
							<div class="row divecertf2">
		<label class="checkbox-inline "><input type="checkbox" class=" divecertf1" name="divercertification[]" value="Non-Diver" id="1d">NON-DIVER</label>
		<label class="checkbox-inline "><input type="checkbox" class=" divecertf1" name="divercertification[]" value="Owd"  id="2d">OWD</label>
		<label class="checkbox-inline "><input type="checkbox" class=" divecertf1" name="divercertification[]" value="Aow"  id="3d">AOW</label>
							</div>
                        </div>
                     </div>
					 <script>
						$(function() {
						  enable_cb();
						  $("#displaydivercertification").click(enable_cb);
						});

						function enable_cb() {
						  if (this.checked) {
							$("input.divecertf1").removeAttr("disabled");
							$('.divecertf2').css('background-color' , '#FFFFFF');
						  } 
						  else {
							$('#1d').prop('checked', false);
							$('#2d').prop('checked', false);
							$('#3d').prop('checked', false);
							$("input.divecertf1").attr("disabled", true);
							$('.divecertf2').css('background-color' , '#DEDEDE');
							
							//$(".divecertf1").prop('checked', false);
						  }
						}
					 </script>
					<hr style="width:100%">
					<div class="form-group">
						<label class="control-label col-md-5"><b style="color:red">Do You want Display the Diver Experience</b>
						</label>
						<div class="col-md-3">
							<div class="row">
								<label class="checkbox-inline">
									<input type="checkbox" class="styled" name="displaydiverexperience" value="TRUE" id="displaydiverexperience">Display</label>
								
							</div>
						</div>
					</div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Diver Experience Required </b><span style="color:red">*</span></label>
                        <div class="col-md-9">
							<div class="row diveexpe2">
		<label class="checkbox-inline"><input type="checkbox" class=" diveexpe1" name="diverexperience[]" value="Novice" id="4d">NOVICE</label>
		<label class="checkbox-inline"><input type="checkbox" class=" diveexpe1" name="diverexperience[]" value="Advanced" id="5d">ADVANCED</label>
		<label class="checkbox-inline"><input type="checkbox" class=" diveexpe1" name="diverexperience[]" value="Experienced" id="6d">EXPERIENCED</label>
		<label class="checkbox-inline"><input type="checkbox" class=" diveexpe1" name="diverexperience[]" value="Non-Diver" id="7d">NON-DIVER</label>
							</div>
                        </div>
                     </div>
					 <script>
						$(function() {
						  enable_cb1();
						  $("#displaydiverexperience").click(enable_cb1);
						});

						function enable_cb1() {
						  if (this.checked) {
							$("input.diveexpe1").removeAttr("disabled");
							$('.diveexpe2').css('background-color' , '#FFFFFF');
						  } 
						  else {
							$("input.diveexpe1").attr("disabled", true);
							$('.diveexpe2').css('background-color' , '#DEDEDE');
							//$('.divecertf1').removeAttr('checked');
							$("#4d").prop('checked', false);
							$("#5d").prop('checked', false);
							$("#6d").prop('checked', false);
							$("#7d").prop('checked', false);
						  }
						}
					 </script>
					 
					 <hr style="width:100%">
					 <div class="form-group">
						<label class="control-label col-md-5"><b style="color:red">Do You want Display the Diver Specialties</b>
						</label>
						<div class="col-md-3">
							<div class="row">
								<label class="checkbox-inline">
									<input type="checkbox" class="styled" name="displaydiverspecialties" value="TRUE" id="displaydiverspecialties">Display</label>
								
							</div>
						</div>
					</div>
					 <div class="form-group">
						<label class="control-label col-md-3"><b>Diver Specialties Required </b><span style="color:red">*</span>
						</label>
						<div class="col-md-9">
							<div class="row divespec2">
							 <table class="table">   
							   <tr>
							   <td>
								<label class="checkbox-inline">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Emergency Oxygen Provider" id="8d">PADI Emergency Oxygen Provider</label>
								</td>	
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Drift Diver" id="9d">PADI Drift Diver</label>
								</td>
								</tr>
								<tr>
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Night Diver" id="10d">PADI Night Diver</label>
								</td>	
								<td>	
									<label class="checkbox-inline ">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Peak Performance Buoyancy" id="11d">PADI Peak Performance Buoyancy</label>
								</td>
								</tr>
								<tr>
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Multilevel Diver"  id="12d">PADI Multilevel Diver</label>
								</td>	
								<td>	
								<label class="checkbox-inline ">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Underwater Videography" id="13d">PADI Underwater Videography</label>
								</td>
								</tr>
								<tr>
								<td>
									<label class="checkbox-inline ">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Enriched Air Nitrox Diver" id="14d">PADI Enriched Air Nitrox Diver</label>
								</td>	
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Underwater Navigator" id="15d">PADI Underwater Navigator</label>
								</td>
								</tr>
								<tr>
								<td>
								<label class="checkbox-inline">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Dry Suit Diver" id="16d">PADI Dry Suit Diver</label>
								</td>	
								<td>	
									<label class="checkbox-inline ">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Digital Underwater Photography" id="17d">PADI Digital Underwater Photography</label>
									</td>
								</tr>
								<tr>
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Sidemount Diver" id="18d">PADI Sidemount Diver</label>
								</td>	
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Wreck Diver" id="19d">PADI Wreck Diver</label>
								</td>
								</tr>
								<tr>
								<td>	
								<label class="checkbox-inline">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Deep Diver" id="20d">PADI Deep Diver</label>
								</td>	
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Search & Recovery Diver" id="21d">PADI Search & Recovery Diver</label>
								</td>
								</tr>
								<tr>
								<td>
								<label class="checkbox-inline">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Cavern Diver" id="22d">PADI Cavern Diver</label>
								</td>	
								<td>
							   <label class="checkbox-inline ">
									<input type="checkbox" class=" divespec1" name="diverspecialties[]" value="PADI Advanced Rebreather Diver" id="23d">PADI Advanced Rebreather Diver</label>
							   </td>
								</tr>
								</table>
							</div>
						</div>
					</div>
					<script>
						$(function() {
						  enable_cb2();
						  $("#displaydiverspecialties").click(enable_cb2);
						});

						function enable_cb2() {
						  if (this.checked) {
							$("input.divespec1").removeAttr("disabled");
							$('.divespec2').css('background-color' , '#FFFFFF');
						  } 
						  else {
							$("input.divespec1").attr("disabled", true);
							$('.divespec2').css('background-color' , '#DEDEDE');
							//$('.divecertf1').removeAttr('checked');
							$("#8d").prop('checked', false);
							$("#9d").prop('checked', false);
							$("#10d").prop('checked', false);
							$("#11d").prop('checked', false);
							$("#12d").prop('checked', false);
							$("#13d").prop('checked', false);
							$("#14d").prop('checked', false);
							$("#15d").prop('checked', false);
							$("#16d").prop('checked', false);
							$("#17d").prop('checked', false);
							$("#18d").prop('checked', false);
							$("#19d").prop('checked', false);
							$("#20d").prop('checked', false);
							$("#21d").prop('checked', false);
							$("#22d").prop('checked', false);
							$("#23d").prop('checked', false);
						  }
						}
					 </script>
					<hr style="width:100%">
					
	</fieldset>
	<fieldset title="5">
		<legend class="text-semibold">Gallery</legend>
		 <div class="form-group">
							<h5 class="control-label col-md-12" style="color: #ff5722;"><b>Gallery Section</b></h5>
						 </div>
						
						<!--div class="form-group">
							<label class="control-label col-md-3"><b>Gallery</b></label>
							<div class="col-md-9">
								<!--input name="gallery" class="form-control" value="" type="text"->
								<span class="help-block"></span>
								<div class="row" style="width: 100%; height: 300px; overflow-y: scroll;">
								<?php 
									$data1=$this->db->get_where('tbl_gallery', array('user_id'=>$this->session->userdata('user_id')))->result_array();
									foreach ($data1 as $a1) 
									{?>
										<div class="col-md-3">
											<img src="<?php echo base_url(); ?>upload/DCprofile/gallery/<?php echo $a1['gallery']; ?>" 
											class="img-responsive" style="width:150px;height:100px;" >
										   <p align="center"><input type="checkbox" value="<?php echo $a1['gallery']; ?>" name="gallery[]"></p>
										</div>								
								   <?php
									}
								  ?>
								</div>
							</div>
						</div-->
					<div class="form-group">
                        <label class="control-label col-md-3"><b>Images</b></label>
                        <div class="col-md-9">
							<div id="filediv"><input name="file[]" type="file" id="file"/></div>
							<input type="button" id="add_more" class="upload" value="Add More Files"/>
                           <!--input name="file" class="form-control file-styled" type="file" required=""-->
                           <span class="help-block">Accepted formats: jpg. Max file size 2Mb</span>
                        </div>
                     </div>
	</fieldset>
	<!--button type="submit" class="btn btn-primary stepy-finish">Submit <i class="icon-check position-right"></i></button-->
	<input type="submit" name="submit_DCpackage_data" value="Add" class="btn btn-success stepy-finish">
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
