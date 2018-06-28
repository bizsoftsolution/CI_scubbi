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
									<input name="productcategory" class="form-control" type="text" data-popup="tooltip" title="Product Category(It is required field)" data-placement="bottom" value="Guided Tours" required>
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
                           <input name="sequence_number" class="form-control sequence_number" type="number"  data-popup="tooltip" title="Sequence Number(It is required field)" data-placement="bottom" min="1" required="">
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
							<input type="radio" class="styled" name="productunits" value="Day" id="chkproductunitno">Day</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="Trip" id="chkproductunitno">Trip</label>
							<label class="checkbox-inline">
							<input type="radio" class="styled" name="productunits" value="Item" id="chkproductunitno">Item</label>
<!--
							<label class="checkbox-inline">
							<input type="radio" class="styled" id="chkproductunitothers" name="productunits"/>OTHERS</label>
							<label class="checkbox-inline"><div id="dvproductunit" style="display: none">
							<input type="text" name="productunits" /></div></label>
//-->
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
                        <label class="control-label col-md-3"><b>Product Price</b></label>
                        <div class="col-md-9">
							<div class="row">
								<div class="col-md-6">
									<label class="control-label col-md-3">Single Room</label>
									 <div class="col-md-6">
										<input name="single_room" class="form-control" type="number" data-popup="tooltip" title="Single Room(It is required field)" data-placement="bottom" id="pp1" value="1" >
									</div>
									<div class="col-md-3"><span class="help-block"><?php echo $dccur; ?>/PAX</span></div>
								</div>
								<div class="col-md-6">
									<label class="control-label col-md-3">Twin Room</label>
									 <div class="col-md-6">
										<input name="twin_room" class="form-control" type="number" data-popup="tooltip" title="Twin Room(It is required field)" data-placement="bottom" id="pp2" value="1" >
									</div>
									<div class="col-md-3"><span class="help-block"><?php echo $dccur; ?>/PAX</span></div>
								</div>
							</div>
							<div class="row">&nbsp;</div>
							<div class="row">
								<div class="col-md-6">
									<label class="control-label col-md-3">3 Person Room</label>
									 <div class="col-md-6">
										<input name="three_person_room" class="form-control" type="number" data-popup="tooltip" title="3 Person Room(It is required field)" data-placement="bottom" id="pp3" value="1" >
									</div>
									<div class="col-md-3"><span class="help-block"><?php echo $dccur; ?>/PAX</span></div>
								</div>
								<div class="col-md-6">
									<label class="control-label col-md-3">Quad Room</label>
									 <div class="col-md-6">
										<input name="quad_room" class="form-control" type="number" data-popup="tooltip" title="Quad Room(It is required field)" data-placement="bottom" id="pp4" value="1" >
									</div>
									<div class="col-md-3"><span class="help-block"><?php echo $dccur; ?>/PAX</span></div>
								</div>
							</div>
                        </div>
                     </div>

					 <hr style="width:100%;">
		 <div class="form-group">
			<label class="control-label col-md-3"><b>Apply Discount for <br>Bulk Purchase? </b>
			</label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left: 0px!important;">
					<input type="radio" class="styled" name="dcdiscountpurchase" id="dcdiscountpurchaseYes" value="Yes" onClick="showTextBox2()">YES</label>
				<label class="checkbox-inline">
					<input type="radio" class="styled" name="dcdiscountpurchase" id="dcdiscountpurchaseNo" value="No" onClick="showTextBox3()" checked>NO</label>
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
			<div class="form-group">
				<label class="control-label col-md-3"><b>Range</b>
				</label>
				<div class="col-md-9">
					<div class="field_wrapper">
						<tr id="1">
<input type="text" class="rangecheck" name="rangecheck">
							<input type="text" name="startrange[]" style="width:50px;" class="startrange" /> TO
							<input type="text" name="endrange[]" style="width:50px;" class="endrange" /> DISCOUNT RATE :
							<input type="text" name="field_name[]" value="0" style="width:50px;" class="field_name" />
							<!--input type="text" name="discount_bulk_purchase_amount[]" class="discountrate" style="width:50px;" -->
							<a href="javascript:void(0);" class="add_button" title="Add field">
								<i class="fa fa-plus" style="color:green;font-size:20px"></i>
							</a>
							<div class="table-responsive" style="background:lightblue;margin:2px 0 0 0;">
								<table class="table">
									<tr><td>Single Room</td><td>Twin Room</td><td>3 Person Room</td><td>Quad Room</td></tr>
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
				
				
				
				
				
		</div>
		<script type="text/javascript">				
				$(document).ready(function(){
				$(".Purchase_promo2").click(function(){
		//logic to show/hide collapsable content
				$(".show_Purchase_promo2").toggle();
				});
				});
				
			$(document).ready(function() {
				
				$(document).on("keyup", "input:text.field_name", function() {

						var type = $("input[name='dcdiscountunit']:checked").val()
						if (type == 'PERCENT') {
							
							var dis1 = parseFloat($('#pp1').val());
							var dis2 = parseFloat($('#pp2').val());
							var dis3 = parseFloat($('#pp3').val());
							var dis4 = parseFloat($('#pp4').val());
							//var amt = parseFloat(this.value);
							
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
							
							var dis_rate1 = "";
							var dis_rate2 = "";
							var dis_rate3 = "";
							var dis_rate4 = ""; 
							
							var dis_rate1 = dis1 - final_amt1;
							var dis_rate2 = dis2 - final_amt2;
							var dis_rate3 = dis3 - final_amt3;
							var dis_rate4 = dis4 - final_amt4;
							
							if(dis_rate1 < 0)
							{
								dis_rate1 = 0;
							}
							if(dis_rate2 < 0)
							{
								dis_rate2 = 0;
							}
							if(dis_rate3 < 0)
							{
								dis_rate3 = 0;
							}
							if(dis_rate4 < 0)
							{
								dis_rate4 = 0;
							}
							//alert(dis_rate1);
							
							$(this).closest('div').find('.dcr1').val(dis_rate1);
							$(this).closest('div').find('.dcr2').val(dis_rate2);
							$(this).closest('div').find('.dcr3').val(dis_rate3);
							$(this).closest('div').find('.dcr4').val(dis_rate4);
							
							/* $('.dcr1').val(dis_rate1);
							$('.dcr2').val(dis_rate2);
							$('.dcr3').val(dis_rate3);
							$('.dcr4').val(dis_rate4); */
							
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
							//var amt = parseFloat(this.value);
							
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
							var dis_rate1 = "";
							var dis_rate2 = "";
							var dis_rate3 = "";
							var dis_rate4 = ""; 
							
							var dis_rate1 = dis1 - amt;
							var dis_rate2 = dis2 - amt;
							var dis_rate3 = dis3 - amt;
							var dis_rate4 = dis4 - amt;
							
							if(dis_rate1 < 0)
							{
								dis_rate1 = 0;
							}
							if(dis_rate2 < 0)
							{
								dis_rate2 = 0;
							}
							if(dis_rate3 < 0)
							{
								dis_rate3 = 0;
							}
							if(dis_rate4 < 0)
							{
								dis_rate4 = 0;
							}
							
							$(this).closest('div').find('.dcr1').val(dis_rate1);
							$(this).closest('div').find('.dcr2').val(dis_rate2);
							$(this).closest('div').find('.dcr3').val(dis_rate3);
							$(this).closest('div').find('.dcr4').val(dis_rate4);
							
							/* $('.dcr1').val(dis_rate1);
							$('.dcr2').val(dis_rate2);
							$('.dcr3').val(dis_rate3);
							$('.dcr4').val(dis_rate4); */
							
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
				});
				
				

			});
			$(document).ready(function() {

				$("#disUnitBulkdoll").click(function() {
					$(".startrange").val("");
					$(".endrange").val("");
					$(".field_name").val(0);
					$(".discountrate").val("");
					var global_value = 0;

				});
				$("#disUnitBulkPer").click(function() {
					$(".startrange").val("");
					$(".endrange").val("");
					$(".field_name").val(0);
					$(".discountrate").val("");
					var global_value = 0;

				});
			});
		</script>
		<script type="text/javascript">
			function showTextBox2() {
				$(".textBox1").show();
			}

			function showTextBox3() {
				$(".textBox1").hide();
			}
			$(document).ready(function() {
				$(".rangecheck").hide();
				var maxField = 3; //Input fields increment limitation
				var addButton = $('.add_button'); //Add button selector
				var wrapper = $('.field_wrapper'); //Input field wrapper
				var fieldHTML = '<div><input type="text" name="startrange[]" style="width:50px;" class="startrange"> TO <input type="text" name="endrange[]" style="width:50px;" class="endrange" > DISCOUNT RATE : <input type="text" class="field_name" name="field_name[]" value="0" style="width:50px;"/><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-remove" style="color:red;font-size:20px;"></i></a><div class="table-responsive" style="background:lightblue;margin:2px 0 0 0;"><table class="table"><tr><td>Single Room</td><td>Twin Room</td><td>3 Person Room</td><td>Quad Room</td></tr><tr><td><input type="text" style="width:50px;" class="dcr1" name="text1[]" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr2" name="text2[]" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr3" name="text3[]" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dcr4" name="text4[]" readonly><?php echo $dccur; ?>/PAX</td></tr></table></div></div>'; //New input field html 
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
			
			function rangeCheck(){
					var errClass='error';
					var sRanges=$('.startrange');
					var eRanges=$('.endrange');
					sRanges.removeClass(errClass);
					eRanges.removeClass(errClass);
					$('.rangecheck').removeAttr('required');
					var preEndRange=0;
					var ranges=[];
					for(var i=0;i<sRanges.length;i++){
						sRange = $(sRanges[i]);
						eRange = $(eRanges[i]);
						ranges.push({start:sRange,end:eRange});
					}
					ranges.sort(function(l,r){
						return parseInt(l.start.val())<parseInt(r.start.val())?-1:1;
					});
					$(".rangecheck").val("1");
					$(".rangecheck").hide();
					
					for(var i in ranges){
							var sRange = ranges[i].start;
							var eRange = ranges[i].end;
							console.log(sRange.val(),eRange.val(),preEndRange);
							var sr = parseInt(sRange.val());
							var er = parseInt(eRange.val());
							if(sr>=er){
								sRange.addClass(errClass);
								eRange.addClass(errClass);
								$(".rangecheck").val("");
								$('.rangecheck').attr('required', 'required');
								$(".validation-error-label").show();
								
							}else if(sr<=preEndRange){
								sRange.addClass(errClass);
								$(".rangecheck").val("");
								$('.rangecheck').attr('required', 'required');
								$(".validation-error-label").show();
							}
							else
							{
								$(".validation-error-label").hide();
								$(".validation-valid-label").show();
							}
							preEndRange = er;
						}
					}
					$('body').on('change','.startrange',function(){rangeCheck();});
					$('body').on('change','.endrange',function(){rangeCheck();});
			
			
		</script> 
		<hr style="width:100%;">
		<div class="form-group">
			<label class="control-label col-md-3"><b>Apply Promo? </b>
			</label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left: 0px;">
					<input type="radio" class="styled" id="chkapplypromoyes" name="dcapplypromo" value="Yes">YES</label>
				<label class="checkbox-inline">
					<input type="radio" class="styled" name="dcapplypromo" id="chkapplypromono" value="No" checked>NO</label>
			</div>
		</div>
		<div id="dvapplypromo" style="display:none;background:#eeeeee;padding:1%;">

			<div class="form-group">
				<label class="control-label col-md-3"><b>Start Date : </b>
				</label>
				<div class="col-md-3">
					<input type="text" name="applypromo_startdate" value="" id="dpd97" class="form-control">
				</div>
				<label class="control-label col-md-3"><b>End Date : </b>
				</label>
				<div class="col-md-3">
					<input type="text" name="applypromo_enddate" value="" id="dpd98" class="form-control">
				</div>
				

			</div>
			
			<script>
					$(document).ready(function() {
						var nowTemp = new Date();
						var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

						var checkin = $('#dpd97').datepicker({

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
							$('#dpd98')[0].focus();
						}).data('datepicker');
						var checkout = $('#dpd98').datepicker({
							onRender: function(date) {
								return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
							}
						}).on('changeDate', function(ev) {
							checkout.hide();
						}).data('datepicker');
					});
				</script>
			<script type="text/javascript">				
				$(document).ready(function(){
				$(".Apply_promo2").click(function(){
		//logic to show/hide collapsable content
				$(".show_apply_promo2").toggle();
				});
				});
				
			$(document).ready(function() {
				
				$(document).on("keyup", "input:text.apdiscountrate", function() {
					
						var type = $("input[name='apdiscountunit']:checked").val()
						if (type == 'PERCENT') {
							
							var dis1 = parseFloat($('#pp1').val());
							var dis2 = parseFloat($('#pp2').val());
							var dis3 = parseFloat($('#pp3').val());
							var dis4 = parseFloat($('#pp4').val());
							//var amt = parseFloat(this.value);
							
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
							
							var dis_rate1 = "";
							var dis_rate2 = "";
							var dis_rate3 = "";
							var dis_rate4 = "";
							
							var dis_rate1 = dis1 - final_amt1;
							var dis_rate2 = dis2 - final_amt2;
							var dis_rate3 = dis3 - final_amt3;
							var dis_rate4 = dis4 - final_amt4;
							
							//alert(dis_rate1);
							if(dis_rate1 < 0)
							{
								dis_rate1 = 0;
							}
							if(dis_rate2 < 0)
							{
								dis_rate2 = 0;
							}
							if(dis_rate3 < 0)
							{
								dis_rate3 = 0;
							}
							if(dis_rate4 < 0)
							{
								dis_rate4 = 0;
							}
							
							$('.dcr11').val(dis_rate1);
							$('.dcr22').val(dis_rate2);
							$('.dcr33').val(dis_rate3);
							$('.dcr44').val(dis_rate4);
							
							$("#disUnitApplyPromodoll").click(function() {
								$(".dcr11").val("");
								$(".dcr22").val("");
								$(".dcr33").val("");
								$(".dcr44").val("");
							});
							$("#disUnitApplyPromoper").click(function() {
								$(".dcr11").val("");
								$(".dcr22").val("");
								$(".dcr33").val("");
								$(".dcr44").val("");
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
							//var amt = parseFloat(this.value);
							
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
							
							var dis_rate1 = "";
							var dis_rate2 = "";
							var dis_rate3 = "";
							var dis_rate4 = "";
							
							var dis_rate1 = dis1 - amt;
							var dis_rate2 = dis2 - amt;
							var dis_rate3 = dis3 - amt;
							var dis_rate4 = dis4 - amt;
							
							if(dis_rate1 < 0)
							{
								dis_rate1 = 0;
							}
							if(dis_rate2 < 0)
							{
								dis_rate2 = 0;
							}
							if(dis_rate3 < 0)
							{
								dis_rate3 = 0;
							}
							if(dis_rate4 < 0)
							{
								dis_rate4 = 0;
							}
							
							$('.dcr11').val(dis_rate1);
							$('.dcr22').val(dis_rate2);
							$('.dcr33').val(dis_rate3);
							$('.dcr44').val(dis_rate4);
							
							$("#disUnitApplyPromodoll").click(function() {
								$(".dcr11").val("");
								$(".dcr22").val("");
								$(".dcr33").val("");
								$(".dcr44").val("");
							});
							$("#disUnitApplyPromoper").click(function() {
								$(".dcr11").val("");
								$(".dcr22").val("");
								$(".dcr33").val("");
								$(".dcr44").val("");
							});
							//$(this).closest('div').find('.discountrate').val(dis_rate);
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
				  <div class="table-responsive show_apply_promo2" style="background:lightblue;">
					<table class="table">				
						<tr>
							<td style="font-size: 11px;">Single Room</td>
							<td style="font-size: 11px;">Twin Room</td>
							<td style="font-size: 11px;">3 Person Room</td>
							<td style="font-size: 11px;">Quad Room</td>
						</tr>
						<tr>
						<td><input type="text" style="width:50px;" class="dcr11" name="text9" readonly><?php echo $dccur; ?>/PAX</td>
						<td><input type="text" style="width:50px;" class="dcr22" name="text10" readonly><?php echo $dccur; ?>/PAX</td>
						<td><input type="text" style="width:50px;" class="dcr33" name="text11" readonly><?php echo $dccur; ?>/PAX</td>
						<td><input type="text" style="width:50px;" class="dcr44" name="text12" readonly><?php echo $dccur; ?>/PAX</td>
						</tr>
					</table>
					</div>
				</div>
			 </div>

		</div>

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

		
		<table class="table testcase" id="">
			
		</table>
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
								
								
								var values = $("input[class='startrange']")
												  .map(function(){return $(this).val();}).get();
												  
								var values1 = $("input[class='endrange']")
												  .map(function(){return $(this).val();}).get();
									
									var type = $("input[name='apdiscountunit']:checked").val()
                                    if (type == 'PERCENT') 
									{
										var wrapper = $(".testcase");									
									for (var i = 0; i < values.length; i++) {
									var r2 = parseInt(values1[i]);
									$(wrapper).append('<label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td>Range</td><td><input type="text"  class="form-control dcr25" name="apbdr1[]" value="'+values[i]+'" readonly></td><td>TO</td><td><input type="text" class="form-control" name="apbdr2[]" value="'+r2+'" readonly></td></tr></table></div></div>');
			  
									var dis1 = $("input[class='dcr1']")
												  .map(function(){return $(this).val();}).get();
									var dis2 = $("input[class='dcr2']")
												  .map(function(){return $(this).val();}).get();
									var dis3 = $("input[class='dcr3']")
												  .map(function(){return $(this).val();}).get();
									var dis4 = $("input[class='dcr4']")
												  .map(function(){return $(this).val();}).get();
												  
									var disrate = parseFloat($('.apdiscountrate').val());
									
									var fi1 = "";
									var fi2 = "";
									var fi3 = "";
									var fi4 = "";
									
									var fi1 = dis1[i] - dis1[i] * disrate / 100;
									var fi2 = dis2[i] - dis2[i] * disrate / 100;
									var fi3 = dis3[i] - dis3[i] * disrate / 100;
									var fi4 = dis4[i] - dis4[i] * disrate / 100;
									
									if(fi1 < 0)
									{
										fi1 = 0;
									}
									if(fi2 < 0)
									{
										fi2 = 0;
									}
									if(fi3 < 0)
									{
										fi3 = 0;
									}
									if(fi4 < 0)
									{
										fi4 = 0;
									}
									
										$(wrapper).append('<label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td>Single Room</td><td>Twin Room</td><td>3 Person Room</td><td>Quad Room</td></tr><tr><td><input type="text" style="width:50px;" class="dc1" name="apbd1[]" value="'+fi1+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc2" name="apbd2[]" value="'+fi2+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc3" name="apbd3[]" value="'+fi3+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc4" name="apbd4[]" value="'+fi4+'" readonly><?php echo $dccur; ?>/PAX</td></tr></table></div></div>');
									}
									}
									else
									{
										var wrapper = $(".testcase");									
									for (var i = 0; i < values.length; i++) {
									var r2 = parseInt(values1[i]);
									$(wrapper).append('<label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td>Range</td><td><input type="text"  class="form-control dcr25" name="apbdr1[]" value="'+values[i]+'" readonly></td><td>TO</td><td><input type="text" class="form-control" name="apbdr2[]" value="'+r2+'" readonly></td></tr></table></div></div>');
			  
									var dis1 = $("input[class='dcr1']")
												  .map(function(){return $(this).val();}).get();
									var dis2 = $("input[class='dcr2']")
												  .map(function(){return $(this).val();}).get();
									var dis3 = $("input[class='dcr3']")
												  .map(function(){return $(this).val();}).get();
									var dis4 = $("input[class='dcr4']")
												  .map(function(){return $(this).val();}).get();
												  
									var disrate = parseFloat($('.apdiscountrate').val());
									var fi1 = "";
									var fi2 = "";
									var fi3 = "";
									var fi4 = "";
									
									var fi1 = dis1[i] - disrate;
									var fi2 = dis2[i] - disrate;
									var fi3 = dis3[i] - disrate;
									var fi4 = dis4[i] - disrate;
									
									if(fi1 < 0)
									{
										fi1 = 0;
									}
									if(fi2 < 0)
									{
										fi2 = 0;
									}
									if(fi3 < 0)
									{
										fi3 = 0;
									}
									if(fi4 < 0)
									{
										fi4 = 0;
									}
									
										$(wrapper).append('<label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td>Single Room</td><td>Twin Room</td><td>3 Person Room</td><td>Quad Room</td></tr><tr><td><input type="text" style="width:50px;" class="dc1" name="apbd1[]" value="'+fi1+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc2" name="apbd2[]" value="'+fi2+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc3" name="apbd3[]" value="'+fi3+'" readonly><?php echo $dccur; ?>/PAX</td><td><input type="text" style="width:50px;" class="dc4" name="apbd4[]" value="'+fi4+'" readonly><?php echo $dccur; ?>/PAX</td></tr></table></div></div>');
									}
									}
									

								
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
		<label class="checkbox-inline "><input type="checkbox" class="styled divecertf1" name="divercertification[]" value="Non-Diver" >NON-DIVER</label>
		<label class="checkbox-inline "><input type="checkbox" class="styled divecertf1" name="divercertification[]" value="Owd"  >OWD</label>
		<label class="checkbox-inline "><input type="checkbox" class="styled divecertf1" name="divercertification[]" value="Aow"  >AOW</label>
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
							$("input.divecertf1").attr("disabled", true);
							$('.divecertf2').css('background-color' , '#DEDEDE');
							//$('.divecertf1').removeAttr('checked');
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
		<label class="checkbox-inline"><input type="checkbox" class="styled diveexpe1" name="diverexperience[]" value="Novice">NOVICE</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled diveexpe1" name="diverexperience[]" value="Advanced">ADVANCED</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled diveexpe1" name="diverexperience[]" value="Experienced">EXPERIENCED</label>
		<label class="checkbox-inline"><input type="checkbox" class="styled diveexpe1" name="diverexperience[]" value="Non-Diver">NON-DIVER</label>
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
							//$(".divecertf1").prop('checked', false);
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
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Emergency Oxygen Provider">PADI Emergency Oxygen Provider</label>
								</td>	
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Drift Diver">PADI Drift Diver</label>
								</td>
								</tr>
								<tr>
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Night Diver">PADI Night Diver</label>
								</td>	
								<td>	
									<label class="checkbox-inline ">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Peak Performance Buoyancy">PADI Peak Performance Buoyancy</label>
								</td>
								</tr>
								<tr>
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Multilevel Diver">PADI Multilevel Diver</label>
								</td>	
								<td>	
								<label class="checkbox-inline ">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Underwater Videography">PADI Underwater Videography</label>
								</td>
								</tr>
								<tr>
								<td>
									<label class="checkbox-inline ">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Enriched Air Nitrox Diver">PADI Enriched Air Nitrox Diver</label>
								</td>	
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Underwater Navigator">PADI Underwater Navigator</label>
								</td>
								</tr>
								<tr>
								<td>
								<label class="checkbox-inline">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Dry Suit Diver">PADI Dry Suit Diver</label>
								</td>	
								<td>	
									<label class="checkbox-inline ">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Digital Underwater Photography">PADI Digital Underwater Photography</label>
									</td>
								</tr>
								<tr>
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Sidemount Diver">PADI Sidemount Diver</label>
								</td>	
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Wreck Diver">PADI Wreck Diver</label>
								</td>
								</tr>
								<tr>
								<td>	
								<label class="checkbox-inline">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Deep Diver">PADI Deep Diver</label>
								</td>	
								<td>
								<label class="checkbox-inline ">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Search & Recovery Diver">PADI Search & Recovery Diver</label>
								</td>
								</tr>
								<tr>
								<td>
								<label class="checkbox-inline">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Cavern Diver">PADI Cavern Diver</label>
								</td>	
								<td>
							   <label class="checkbox-inline ">
									<input type="checkbox" class="styled divespec1" name="diverspecialties[]" value="PADI Advanced Rebreather Diver">PADI Advanced Rebreather Diver</label>
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
							//$(".divecertf1").prop('checked', false);
						  }
						}
					 </script>
					<hr style="width:100%">
					<!--div class="form-group">
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
							<!-- Basic example ->
							<div class="panel panel-flat">
								<div class="panel-body">
									<select multiple="multiple" class="form-control listbox" name="divesites[]" data-popup="tooltip" title="Dive Sites(It is required field)" data-placement="bottom">
										<?php 
											$data7 = $this->db->get('tbl_divepoints')->result();
											foreach($data7 as $row_data7)
											{
												if($row_data7->name != "")
												{
										?>
										<option value="<?php echo $row_data7->name; ?>"><?php echo $row_data7->name; ?></option>
										<?php 
												}
											}
										?>
									</select>
								</div>
							</div>
							<!-- /basic example ->
                        </div>						
                     </div-->
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
<!-- Error Modal -->
		  <div class="modal fade" id="errorMsgDisplay" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" style="font-size: 25px;color: red;font-weight: bold;">&times;</button>
				  <h4 class="modal-title" style="color:#5cb85c;font-weight:bold;font-size: 16px">Scubbi Diving Portal</h4>
				</div>
				<div class="modal-body">
				  <p id="errorCount" style="color:red;font-size: 21px;font-weight:600;"></p>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
				</div>
			  </div>
			  
			</div>
		  </div>
		  <!--script type="text/javascript">
				$("#custom").submit(function(){
					//event.preventDefault();
					var errormsg = $('.error').length;
					if(errormsg > 0)
					{
						$("#errorCount").html("Please enter the valid ranges !!!");
						$('#errorMsgDisplay').modal("show");
						//alert("Please fill the required fields!!!");
						return false;
					}
					else
					{
						return true;
					}
				});
				
			</script-->
		<!-- Error Modal END-->
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
