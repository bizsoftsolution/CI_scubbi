	<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/stepywizerd/css/jquery.stepy.css'); ?>" />
<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Courses & Specialties</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Courses & Specialties</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>DCcourses/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>SAcourses/SAcoursesdashboard" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
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
				<form name="add" method="POST" action="<?php echo  base_url();?>SAcourses/edit/<?php echo $row->id; ?>" class="form-horizontal form-validate-jquery" enctype="multipart/form-data" id="custom">
		

                                                        <fieldset title="1">
                                                            <legend class="text-semibold">General Info</legend>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Product Name</b> <strong style="color:red;">*</strong>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <input name="name" class="form-control" type="text" data-popup="tooltip" title="Product Name(It is required field)" data-placement="bottom" required="" value="<?php echo $row->product_name; ?>">
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Product Description</b> <strong style="color:red;">*</strong>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <textarea name="description" class="form-control" id="editor-full1" data-popup="tooltip" title="Product Description(It is required field)" data-placement="bottom" required="" value=""><?php echo $row->product_description;?></textarea>
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
                                                           <?php if($row->product_includes != "" || $row->product_excludes != "") { $chkbox100 = $row->product_includes; $chkbox99 = explode(',', $chkbox100); $chkbox98 = $row->product_excludes; $chkbox97 = explode(',', $chkbox98); $pi=0; foreach($chkbox99 as $s1) { if($s1 != "FULL EQUIPMENT RENTAL" && $s1 != "LUNCH" && $s1 != "DINNER" && $s1 != "TRANSFER FROM JETTY" && $s1 != "TRANSFER FROM HOTEL" && $s1 != "MARINE PARK FEE" && $s1 != "DC TO DIVE SITE") { $pi = 1; } } if($pi==1) { ?>
													<div class="form-group">
														<label class="control-label col-md-3"><b>Product Includes</b>
														</label>
														<div class="col-md-9">
															<input name="productincludes1" class="form-control" type="text" value="<?php echo $row->product_includes; ?>">
															<span class="help-block"></span>
														</div>
														
													</div>
												 <?php } else { ?>
													<div class="form-group">
														<label class="control-label col-md-3"><b>Product Includes</b> </label>
														<div class="col-md-9">
															<input name="productincludes1" class="form-control" type="text">
															<span class="help-block"></span>
														</div>
													</div>
													<?php } $pe=0; foreach($chkbox97 as $s1) { if($s1 !="FULL EQUIPMENT RENTAL" && $s1 !="LUNCH" && $s1 !="DINNER" && $s1 !="TRANSFER FROM JETTY" && $s1 !="TRANSFER FROM HOTEL" && $s1 !="MARINE PARK FEE" && $s1 !="DC TO DIVE SITE" ) { $pe=1 ; } } if($pe==1) { ?>
													<div class="form-group">
														<label class="control-label col-md-3"><b>Product Excludes</b>
														</label>
														<div class="col-md-9">
															<div class="row">
																<div class="col-md-10">
																	<input name="productexcludes1" class="form-control" type="text" value="<?php echo $row->product_excludes; ?>">
																	<span class="help-block"></span>
																</div>
																<div class="col-md-2">
																	<label class="checkbox-inline">
																		<input type="checkbox" class="styled" name="display" value="display" checked>Display</label>
																</div>
															</div>
														</div>
													</div>
													<?php } else { ?>
													<div class="form-group">
														<label class="control-label col-md-3"><b>Product Excludes</b>
														</label>
														<div class="col-md-9">
															<div class="row">
																<div class="col-md-10">
																	<input name="productexcludes1" class="form-control" type="text" data-placement="bottom">
																	<span class="help-block"></span>
																</div>
																<div class="col-md-2">
																	<label class="checkbox-inline">
																		<input type="checkbox" class="styled" name="display" value="display" checked>Display</label>
																</div>
															</div>
														</div>
													</div>
													<?php } ?>

	
													<div class="form-group">
														<label class="control-label col-md-3"><b>Or Select From a List of Common options</b> <strong style="color:red;">*</strong>
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

	
																		<tr>
																			<td>FULL EQUIPMENT RENTAL</td>
																			<td align="center">
																				<input type="checkbox" class="styled" id="full_equipment_include" name="productincludes[]" value="FULL EQUIPMENT RENTAL" <?php if(in_array( "FULL EQUIPMENT RENTAL",$chkbox99)){echo "checked";}?>></td>
																			<td align="center">
																				<input type="checkbox" class="styled" id="full_equipment_exclude" name="productexcludes[]" value="FULL EQUIPMENT RENTAL" <?php if(in_array( "FULL EQUIPMENT RENTAL",$chkbox97)){echo "checked";}?>></td>
																			<td>LUNCH</td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productincludes[]" id="lunchInclude" value="LUNCH" <?php if(in_array( "LUNCH",$chkbox99)){echo "checked";}?>></td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productexcludes[]" id="lunchExclude" value="LUNCH" <?php if(in_array( "LUNCH",$chkbox97)){echo "checked";}?>></td>
																		</tr>
																		<tr>
																			<td>DINNER</td>
																			<td align="center">
																				<input type="checkbox" id="dinnerInclude" class="styled" name="productincludes[]" value="DINNER" <?php if(in_array( "DINNER",$chkbox99)){echo "checked";}?>></td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productexcludes[]" id="dinnerExclude" value="DINNER" <?php if(in_array( "DINNER",$chkbox97)){echo "checked";}?>></td>
																			<td>TRANSFER FROM JETTY</td>
																			<td align="center">
																				<input type="checkbox" id="jettyInclude" class="styled" name="productincludes[]" value="TRANSFER FROM JETTY" <?php if(in_array( "TRANSFER FROM JETTY",$chkbox99)){echo "checked";}?>></td>
																			<td align="center">
																				<input type="checkbox" id="jettyExclude" class="styled" name="productexcludes[]" value="TRANSFER FROM JETTY" <?php if(in_array( "TRANSFER FROM JETTY",$chkbox97)){echo "checked";}?>></td>
																		</tr>
																		<tr>
																			<td>TRANSFER FROM HOTEL</td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productincludes[]" id="hotelInclude" value="TRANSFER FROM HOTEL" <?php if(in_array( "TRANSFER FROM HOTEL",$chkbox99)){echo "checked";}?>></td>
																			<td align="center">
																				<input type="checkbox" id="hotelExclude" class="styled" name="productexcludes[]" value="TRANSFER FROM HOTEL" <?php if(in_array( "TRANSFER FROM HOTEL",$chkbox97)){echo "checked";}?>></td>
																			<td>MARINE PARK FEE</td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productincludes[]" id="marineInclude" value="MARINE PARK FEE" <?php if(in_array( "MARINE PARK FEE",$chkbox99)){echo "checked";}?>></td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productexcludes[]" id="marineExclude" value="MARINE PARK FEE" <?php if(in_array( "MARINE PARK FEE",$chkbox97)){echo "checked";}?>></td>
																		</tr>
																		<tr>
																			<td>DC TO DIVE SITE</td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productincludes[]" id="divesiteInclude" value="DC TO DIVE SITE" <?php if(in_array( "DC TO DIVE SITE",$chkbox99)){echo "checked";}?>></td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productexcludes[]" id="diveSiteExclude" value="DC TO DIVE SITE" <?php if(in_array( "DC TO DIVE SITE",$chkbox97)){echo "checked";}?>></td>

	
																		</tr>
																	</table>
																</div>
															</div>
														</div>
													</div>
													<?php } else { ?>
													<div class="form-group">
														<label class="control-label col-md-3"><b>Product Includes</b>
														</label>
														<div class="col-md-9">
															<input name="productincludes1" class="form-control" type="text" data-popup="tooltip" title="Product Includes(It is required field)" data-placement="bottom">
															<span class="help-block"></span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3"><b>Product Excludes</b>
														</label>
														<div class="col-md-9">
															<div class="row">
																<div class="col-md-10">
																	<input name="productexcludes1" class="form-control" type="text" data-popup="tooltip" title="Product Excludes(It is required field)" data-placement="bottom">
																	<span class="help-block"></span>
																</div>
																<div class="col-md-2">
																	<label class="checkbox-inline">
																		<input type="checkbox" class="styled" name="display" value="display" checked>Display</label>
																</div>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3"><b>Or Select From a List of Common options</b> <strong style="color:red;">*</strong>
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

	
																		<tr>
																			<td>FULL EQUIPMENT RENTAL</td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productincludes[]" value="FULL EQUIPMENT RENTAL" id="full_equipment_include">
																			</td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productexcludes[]" value="FULL EQUIPMENT RENTAL" id="full_equipment_exclude">
																			</td>
																			<td>LUNCH</td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productincludes[]" value="LUNCH" id="lunchInclude">
																			</td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productexcludes[]" value="LUNCH" id="lunchExclude">
																			</td>
																		</tr>
																		<tr>
																			<td>DINNER</td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productincludes[]" value="DINNER" id="dinnerInclude">
																			</td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productexcludes[]" value="DINNER" id="dinnerExclude">
																			</td>
																			<td>TRANSFER FROM JETTY</td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productincludes[]" value="TRANSFER FROM JETTY" id="jettyInclude">
																			</td>
																			<td align="center">
																				<input type="checkbox" class="styled" name="productexcludes[]" value="TRANSFER FROM JETTY" id="jettyExclude">
																			</td>
																		</tr>
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
													<?php } ?>
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
                                                                   

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Other Information</b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <div class="row">
                                                                        <div class="col-md-10">
                                                                            <input name="otherinformation" class="form-control" type="text" data-placement="bottom" value="<?php echo $row->other_info; ?>">
                                                                            <span class="help-block"></span>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <label class="checkbox-inline">
																			<?php
																			if($row->other_info_display == 'TRUE')
																			{?>
																			<input type="checkbox" class="styled" name="other_info_display" value="TRUE" checked>Display</label>
																			<?php
																			}
																			else
																			{?>
																			<input type="checkbox" class="styled" name="other_info_display" value="TRUE" >Display</label>
																			<?php
																			}
																			?>
                                                                                
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                         
                                                         
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label col-md-6"><b>Product Category : </b>
                                                                        </label>
                                                                        <div class="col-md-6">
                                                                            <input name="productcategory" class="form-control" type="text" data-popup="tooltip" title="Product Category(It is required field)" data-placement="bottom" value="Courses & Specialties">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="control-label col-md-4"><b>Product Keyword : </b>
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <select name="productkeyword[]" class="form-control multiselect-filtering" data-popup="tooltip" title="Product Keyword(It is required field)" data-placement="bottom" multiple="multiple">
                                                                                	<?php 
																					$aaa =$row->product_keyword;
																					$vvv = explode(',', $aaa);

																					$data=$this->db->get('tbl_product_keywords')->result_array();
																					foreach ($data as $pk) {?>
																				   <option value="<?php echo $pk['keywords'];?>" <?php if(in_array($pk['keywords'],$vvv)){echo "selected";}?> ><?php echo $pk['keywords'];?></option> 
																				   <?php
																					}
																				  ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                $(document).ready(function() {
                                                                    $(".sequence_number").on("input", function(evt) {
                                                                        var self = $(this);
                                                                        self.val(self.val().replace(/[^\d].+/, ""));
                                                                        if ((evt.which < 48 || evt.which > 57)) {
                                                                            evt.preventDefault();
                                                                        }
                                                                    });

                                                                });
                                                            </script>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Sequence Number</b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <input name="sequence_number" class="form-control sequence_number" type="text" data-popup="tooltip" title="Sequence Number(It is required field)" data-placement="bottom" min="1" required="" value="<?php echo $row->	sequence_number; ?>">
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Product Status</b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <label class="checkbox-inline" style="padding-left:0px;">
																	<?php 
																		if($row->product_status == 'Available')
																		{?>
																		 <input type="radio" class="styled" name="productstatus" value="Available" checked >AVAILABLE</label>
																		<label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="productstatus" value="Hidden" >HIDDEN</label>
																	<?php
																		}else
																		{
																	?>
                                                                        <input type="radio" class="styled" name="productstatus" value="Available">AVAILABLE</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="productstatus" value="Hidden" checked>HIDDEN</label>
																		<?php
																		}
																		?>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset title="2">
                                                            <legend class="text-semibold">Pricing Options</legend>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Product Unit :</b> <strong style="color:red;">*</strong>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <label class="checkbox-inline" style="padding-left:0px;">
																	
                                                                        <input type="radio" class="styled" name="productunits" value="Dive" onClick="showTextBox1()" <?php if($row->product_unit == 'Dive' ){?> checked <?php } ?>/>Dive</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="productunits" <?php if($row->product_unit == 'Pax' ){?> checked <?php } ?> value="Pax" onClick="showTextBox1()" />Pax</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="productunits" <?php if($row->product_unit == 'Trip' ){?> checked <?php } ?> value="Trip" onClick="showTextBox1()" />Trip</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="productunits" <?php if($row->product_unit == 'Item' ){?> checked <?php } ?> value="Item" onClick="showTextBox1()" />Item</label>
                                                                    <!--
				<label class="checkbox-inline">
				<input type="radio" class="styled" name="productunits" onClick="showTextBox()"/>OTHERS</label>
				<label class="checkbox-inline"><input type="text" name="productunits" class="textBox" hidden /></label>
//-->
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
                                                                <label class="control-label col-md-3"><b>Max Dive/ Day </b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <input name="maxdiveday" class="form-control" type="number" data-popup="tooltip" title="Max Dive(It is required field)" data-placement="bottom" required="" value="<?php echo 	$row->max_dive_day; ?>">
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Product Max / Day </b>
                                                                </label>
                                                                <div class="col-md-7">
                                                                    <input name="productmaxday" class="form-control productmaxday1" type="text" id="productmaxday1" data-popup="tooltip" title="Product Max(It is required field)" data-placement="bottom" value="<?php echo $row->product_max_day;?>" disabled>
                                                                    <span class="help-block"></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" class="styled" id="nolimit" name="productmaxday" value="No Limit" <?php if($row->product_max_day == 'No Limit'){?>checked <?php } ?>>No Max</label>
                                                                </div>
                                                                <script>
                                                                    $(document).ready(function() {

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
                                                                <label class="control-label col-md-3"><b>Product Price :</b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <div class="row">
                                                                        <div class="col-md-3">Normal Rate</div>
                                                                        <div class="col-md-3">Weekend Rate</div>
                                                                        <div class="col-md-3">Peak Season Rate</div>
                                                                        <div class="col-md-3">Super Peak Season Rate</div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <input name="product_normal_price" class="form-control nr" type="text" data-popup="tooltip" title="Product Price(It is required field)" data-placement="bottom" id="pp1" value="<?php echo $row->	product_normal_rate; ?>">
                                                                        </div>
                                                                        <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <input name="product_weekend_price" class="form-control wr" type="text" data-popup="tooltip" title="Product Price(It is required field)" data-placement="bottom" id="pp2" value="<?php echo $row->product_weekend_rate; ?>">
                                                                        </div>
                                                                        <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <input name="product_peakseason_price" class="form-control psr" type="text" data-popup="tooltip" title="Product Price(It is required field)" data-placement="bottom" id="pp3" value="<?php echo $row->	product_peakseason_rate; ?>">
                                                                        </div>
                                                                        <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <input name="product_super_peakseason_price" class="form-control spsr" type="text" data-popup="tooltip" title="Product Price(It is required field)" data-placement="bottom" id="pp4" value="<?php  echo $row->product_superpeak_rate; ?>">
                                                                        </div>
                                                                        <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span>
                                                                        </div>
                                                                    </div>
                                                                    <!--input name="product_price" class="form-control" type="text"  data-popup="tooltip" title="Product Price(It is required field)" data-placement="bottom">
			   <span class="help-block"></span-->
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Is the product inclusive <br>of accomodation? </b>
                                                                </label>
                                                                <div class="col-md-9">
																<?php 
																if($row->product_inclusive_accomodation == 'Yes')
																{?>
                                                                    <label class="checkbox-inline" style="padding-left: 0px!important;">
                                                                        <input type="radio" class="styled" name="dcinclusiveaccomodation" value="Yes" onClick="showTextBox100()" id="productprice_show" checked>YES</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="dcinclusiveaccomodation" value="No" onClick="showTextBox99()" id="productprice_hide" >NO</label>
																	<?php
																	}
																	else
																	{
																	?>	 <label class="checkbox-inline" style="padding-left: 0px!important;">
                                                                        <input type="radio" class="styled" name="dcinclusiveaccomodation" value="Yes" onClick="showTextBox100()" id="productprice_show">YES</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="dcinclusiveaccomodation" value="No" onClick="showTextBox99()" id="productprice_hide" checked>NO</label>												<?php
																	}
																	?>																	
																		
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
                                                                        $('#pp1').attr("disabled", "disabled");
                                                                        $('#pp2').attr("disabled", "disabled");
                                                                        $('#pp3').attr("disabled", "disabled");
                                                                        $('#pp4').attr("disabled", "disabled");
                                                                    });
                                                                    $("#productprice_hide").click(function() {
                                                                        $(".sr").val("");
                                                                        $(".tr").val("");
                                                                        $(".tpr").val("");
                                                                        $(".qr").val("");
                                                                        var global_value = 0;
                                                                        $('#pp1').removeAttr("disabled");
                                                                        $('#pp2').removeAttr("disabled");
                                                                        $('#pp3').removeAttr("disabled");
                                                                        $('#pp4').removeAttr("disabled");
                                                                    });
                                                                });
                                                            </script>
																																																
																																										<?php
																																														$p_i_a_s=$row->product_inclusive_accomodation_single;	
																	 $arr_p_i_a_s=explode(",",$p_i_a_s);
																	 $p_i_a_t=$row->product_inclusive_accomodation_twin;	
																	 $arr_p_i_a_t=explode(",",$p_i_a_t);
																	 $p_i_a_tp=$row->product_inclusive_accomodation_3person;	
																	 $arr_p_i_a_tp=explode(",",$p_i_a_tp);
																	 $p_i_a_q=$row->product_inclusive_accomodation_quad;	
																	 $arr_p_i_a_q=explode(",",$p_i_a_q);
																	?>
																<?php
																if($row->product_inclusive_accomodation == 'Yes')
																{
																?>
																	<div class="dcinclusiveaccomodationBox1" style="background:#eeeeee;padding:0% 4%; " >
																	<div class="form-group">
																		<label class="control-label col-md-3"><b>Single Room:</b></label>
																		<div class="col-md-9">
																			<div class="row">
																				<?php 
																					
																					foreach($arr_p_i_a_s as $row_p_i_a_s)
																					{
																				?>
																				<div class="col-md-2"> 
																				<input name="product_inclusive_accomodation_single[]" class="form-control nr" type="text" value="<?php echo $row_p_i_a_s; ?>">
																				</div>
																				<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																				<?php 
																					
																					}
																				?>	
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-3"><b>Twin Room:</b></label>
																		<div class="col-md-9">
																			<div class="row">
																				<?php 
																					foreach($arr_p_i_a_t as $row_p_i_a_t)
																					{
																				?>
																				<div class="col-md-2"> 
																				<input name="product_inclusive_accomodation_twin[]" class="form-control wr" type="text" value="<?php echo $row_p_i_a_t; ?>">
																				</div>
																				<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																				<?php 
																					}
																				?>	
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-3"><b>3 Person Room:</b></label>
																		<div class="col-md-9">
																			<div class="row">
																				<?php 
																					foreach($arr_p_i_a_tp as $row_p_i_a_tp)
																					{
																				?>
																				<div class="col-md-2"> 
																				<input name="product_inclusive_accomodation_threeperson[]" class="form-control psr" type="text" value="<?php echo $row_p_i_a_tp; ?>">
																				</div>
																				<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																				<?php 
																					}
																				?>	
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-3"><b>Quad Room:</b></label>
																		<div class="col-md-9">
																			<div class="row">
																				<?php 
																					foreach($arr_p_i_a_q as $row_p_i_a_q)
																					{
																				?>
																				<div class="col-md-2"> 
																				<input name="product_inclusive_accomodation_quad[]" class="form-control spsr" type="text" value="<?php echo $row_p_i_a_q; ?>" >
																				</div>
																				<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																				<?php 
																					}
																				?>	
																			</div>
																		</div>
																	</div>
																	</div>
																	<?php 
																}
																else
																{?>
																		 <div class="dcinclusiveaccomodationBox1" style="display:none;background:#eeeeee;padding:0% 1%;">
															 <div class="form-group">
																<label class="control-label col-md-3"><b>Single Room:</b></label>
																<div class="col-md-9">
																	<div class="row">
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_single[]" class="form-control sr" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp01">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_single[]" class="form-control sr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp02">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_single[]" class="form-control sr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp03">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_single[]" class="form-control sr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp04">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-md-3"><b>Twin Room:</b></label>
																<div class="col-md-9">
																	<div class="row">
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_twin[]" class="form-control tr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp5">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_twin[]" class="form-control tr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp6">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_twin[]" class="form-control tr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp7">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_twin[]" class="form-control tr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp8">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-md-3"><b>3 Person Room:</b></label>
																<div class="col-md-9">
																	<div class="row">
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_threeperson[]" class="form-control tpr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp9">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_threeperson[]" class="form-control tpr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp10">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_threeperson[]" class="form-control tpr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp11">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_threeperson[]" class="form-control tpr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp12">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-md-3"><b>Quad Room:</b></label>
																<div class="col-md-9">
																	<div class="row">
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_quad[]" class="form-control qr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp13">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_quad[]" class="form-control qr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp14">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_quad[]" class="form-control qr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp15">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																		<div class="col-md-2"> 
																		<input name="product_inclusive_accomodation_quad[]" class="form-control qr" type="text"  data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom" id="pp16">
																		</div>
																		<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/PAX</span></div>
																	</div>
																</div>
															</div>
														 </div>
	
																	
														<?php		}
																
																	?>
                                                            <script>
                                                               function showTextBox100() {
																	$(".dcinclusiveaccomodationBox1").show();
																	$(".show_Purchase_promo2").hide();
																	$(".show_Purchase_promo").show();
																	$(".Purchase_promo").show();	
																	$(".Purchase_promo2").hide();
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
																}
                                                                function showTextBox99() {
                                                                    $(".dcinclusiveaccomodationBox1").hide();
                                                                    $(".show_Purchase_promo").hide();
                                                                    $(".show_Purchase_promo2").show();
                                                                    $(".Purchase_promo2").show();
                                                                    $(".Purchase_promo").hide();
                                                                    $(".startrange").val("");
                                                                    $(".endrange").val("");
                                                                    $(".field_name").val("");
                                                                    $(".discountrate").val("");
                                                                    $(".dcr1").val("");
                                                                    $(".dcr2").val("");
                                                                    $(".dcr3").val("");
                                                                    $(".dcr4").val("");
                                                                }
                                                            </script>
                                                            <hr style="width:100%;">
                                                            <span style="color:red;">Note : Accommodation Extension Rate is Not Impacted by Bulk Purchase Discount and Promo Discount</span>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Accommodation <br>Extension </b>
                                                                </label>
                                                                <div class="col-md-9">
																<?php if($row->accomodation_extension == 'Yes') {?>
                                                                    <label class="checkbox-inline" style="padding-left:0px;">
                                                                        <input type="radio" class="styled" name="dcaccommodationextension" value="Yes" onClick="showTextBox98()" checked>YES</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="dcaccommodationextension" value="No" onClick="showTextBox97()" >NO</label>
																		<?php
																}
																else
																{
																	?>
																	<label class="checkbox-inline" style="padding-left:0px;">
                                                                        <input type="radio" class="styled" name="dcaccommodationextension" value="Yes" onClick="showTextBox98()">YES</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="dcaccommodationextension" value="No" onClick="showTextBox97()" checked>NO</label>
																	<?php
																}
																?>
                                                                </div>
                                                            </div>
															<?php
					$chkbox98 = $row->accomodation_extension;
					if(($chkbox98 == 'Yes')?'checked':'')
					{
					$a_e_s=$row->accomodation_extension_single;	
					 $arr_a_e_s=explode(",",$a_e_s);
					 $a_e_t=$row->accomodation_extension_twin;	
					 $arr_a_e_t=explode(",",$a_e_t);
					 $a_e_tp=$row->accomodation_extension_3person;	
					 $arr_a_e_tp=explode(",",$a_e_tp);
					 $a_e_q=$row->accomodation_extension_quad;	
					 $arr_a_e_q=explode(",",$a_e_q);
					?>
		
					 <div class="dcaccommodationextension1" style="background:#eeeeee;padding:0% 5%;">
					<div class="form-group">
						<label class="control-label col-md-3">&nbsp;</label>
						<div class="col-md-9">
							<div class="row">
								<div class="col-md-3">Normal Rate</div>
								<div class="col-md-3">Weekend Rate</div>
								<div class="col-md-3">Peak Season Rate</div>
								<div class="col-md-3">Super Peak Season Rate</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Single Room:</b></label>
						<div class="col-md-9">
							<div class="row">
								<?php foreach($arr_a_e_s as $row_a_e_s) { ?>
								<div class="col-md-2"> 
								<input name="accommodation_extension_single[]" class="form-control asr" type="text" value="<?php echo $row_a_e_s; ?>" id="input">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span></div>
								<?php } ?>	
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Twin Room:</b></label>
						<div class="col-md-9">
							<div class="row">
								<?php foreach($arr_a_e_t as $row_a_e_t) { ?>
								<div class="col-md-2"> 
								<input name="accommodation_extension_twin[]" class="form-control atr" type="text" value="<?php echo $row_a_e_t; ?>" id="input1">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span></div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>3 Person Room:</b></label>
						<div class="col-md-9">
							<div class="row">
								<?php foreach($arr_a_e_tp as $row_a_e_tp) { ?>
								<div class="col-md-2"> 
								<input name="accommodation_extension_threeperson[]" class="form-control atpr" type="text" value="<?php echo $row_a_e_tp; ?>" id="input1">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span></div>
								<?php } ?>	
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"><b>Quad Room:</b></label>
						<div class="col-md-9">
							<div class="row">
								<?php foreach($arr_a_e_q as $row_a_e_q) { ?>
								<div class="col-md-2"> 
								<input name="accommodation_extension_quad[]" class="form-control aqr" type="text" value="<?php echo $row_a_e_q; ?>" id="input1">
								</div>
								<div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span></div>
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
                                                            <div class="dcaccommodationextension" style="display:none;background:#eeeeee;padding:4%;">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">&nbsp;</label>
                                                                    <div class="col-md-9">
                                                                        <div class="row">
                                                                            <div class="col-md-3">Normal Rate</div>
                                                                            <div class="col-md-3">Weekend Rate</div>
                                                                            <div class="col-md-3">Peak Season Rate</div>
                                                                            <div class="col-md-3">Super Peak Season Rate</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"><b>Single Room:</b>
                                                                    </label>
                                                                    <div class="col-md-9">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_single[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_single[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_single[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_single[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"><b>Twin Room:</b>
                                                                    </label>
                                                                    <div class="col-md-9">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_twin[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_twin[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_twin[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_twin[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"><b>3 Person Room:</b>
                                                                    </label>
                                                                    <div class="col-md-9">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_threeperson[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_threeperson[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_threeperson[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_threeperson[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"><b>Quad Room:</b>
                                                                    </label>
                                                                    <div class="col-md-9">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_quad[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_quad[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_quad[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input name="accommodation_extension_quad[]" class="form-control" type="text" data-popup="tooltip" title="Product Accomodation(It is required field)" data-placement="bottom">
                                                                            </div>
                                                                            <div class="col-md-1"> <span class="help-block" style="margin-top: 24px;">MYR/NIGHT</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
															<?php
					}
					
					?>
                                                            <script>
                                                                function showTextBox98() {
                                                                    $(".dcaccommodationextension").show();
                                                                }

                                                                function showTextBox97() {
                                                                    $(".dcaccommodationextension").hide();
                                                                }
                                                            </script>
                                                            <hr style="width:100%;">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Apply Discount for <br>Bulk Purchase? </b>
                                                                </label>
                                                                <div class="col-md-9">
															
																	
																	<label class="checkbox-inline" style="padding-left: 0px!important;">
                                                                        <input type="radio" class="styled" name="dcdiscountpurchase" value="Yes" onClick="showTextBox2()">YES</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="dcdiscountpurchase" value="No" onClick="showTextBox3()" checked>NO</label>
															
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

                                                                                <input type="text" name="startrange[]" style="width:50px;" class="startrange" /> TO
                                                                                <input type="text" name="endrange[]" style="width:50px;" class="endrange" value="0" /> DISCOUNT RATE :
                                                                                <input type="text" name="field_name[]" value="" style="width:50px;" class="field_name" />
                                                                                <!--input type="text" name="discount_bulk_purchase_amount[]" class="discountrate" style="width:50px;" -->
                                                                                <a href="javascript:void(0);" class="add_button" title="Add field">
                                                                                    <i class="fa fa-plus" style="color:green;font-size:20px"></i>
                                                                                </a>
                                                                                <label style="font-size: 14px;background:#62bd18;border:1px solid #62bd18;color:#fff;display:none;" class="Purchase_promo">show new price</label>
                                                                                <label style="font-size: 14px;background:#62bd18;border:1px solid #62bd18;color:#fff;display:none;" class="Purchase_promo2">show new price</label>
                                                                            </tr>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="table-responsive show_Purchase_promo2" style="background:lightblue;display:none;">
                                                                        <table class="table">
                                                                            <!--tr><td colspan="2">Range : 3 to 4</td><td colspan="2"></td></tr-->
                                                                            <tr>
                                                                                <td>Normal Rate</td>
                                                                                <td>Weekend Rate</td>
                                                                                <td>Peak Season Rate</td>
                                                                                <td>Super Peak Season Rate</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr1">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr2">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr3">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr4">myr/pax</td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="table-responsive show_Purchase_promo" style="background:lightblue;display:none;">
                                                                        <table class="table">
                                                                            <!--tr><td colspan="3">Range : 3 to 4</td><td colspan="2"></td></tr-->
                                                                            <tr>
                                                                                <td colspan="2" align="right">Normal Rate</td>
                                                                                <td>Weekend Rate</td>
                                                                                <td>Peak Season Rate</td>
                                                                                <td>Super Peak Season Rate</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>single room</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr1">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr2">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr3">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr4">myr/pax</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>twin room</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr5">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr6">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr7">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr8">myr/pax</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3 person room</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr9">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr10">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr11">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr12">myr/pax</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>quad room</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr13">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr14">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr15">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr16">myr/pax</td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <script type="text/javascript">
                                                                $(document).ready(function() {
                                                                    $(".Purchase_promo").click(function() {
                                                                        //logic to show/hide collapsable content
                                                                        $(".show_Purchase_promo").toggle();
                                                                    });
                                                                });

                                                                $(document).ready(function() {
                                                                    $(".Purchase_promo2").click(function() {
                                                                        //logic to show/hide collapsable content
                                                                        $(".show_Purchase_promo2").toggle();
                                                                    });
                                                                });


                                                                $(document).ready(function() {

                                                                    $(document).on("keyup", "input:text.field_name", function() {
                                                                        var ptype = $("input[name='dcinclusiveaccomodation']:checked").val()
                                                                        if (ptype == 'No') {
                                                                            $(".Purchase_promo2").show();
                                                                            $(".Purchase_promo").hide();
                                                                            var type = $("input[name='dcdiscountunit']:checked").val()
                                                                            if (type == 'PERCENT') {

                                                                                var dis1 = parseFloat($('#pp1').val());
                                                                                var dis2 = parseFloat($('#pp2').val());
                                                                                var dis3 = parseFloat($('#pp3').val());
                                                                                var dis4 = parseFloat($('#pp4').val());
                                                                                var amt = parseFloat(this.value);

                                                                                var final_amt1 = dis1 * amt / 100;
                                                                                var final_amt2 = dis2 * amt / 100;
                                                                                var final_amt3 = dis3 * amt / 100;
                                                                                var final_amt4 = dis4 * amt / 100;

                                                                                var dis_rate1 = dis1 - final_amt1;
                                                                                var dis_rate2 = dis2 - final_amt2;
                                                                                var dis_rate3 = dis3 - final_amt3;
                                                                                var dis_rate4 = dis4 - final_amt4;

                                                                                //alert(dis_rate1);

                                                                                $('.dcr1').val(dis_rate1);
                                                                                $('.dcr2').val(dis_rate2);
                                                                                $('.dcr3').val(dis_rate3);
                                                                                $('.dcr4').val(dis_rate4);

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
                                                                                $(".Purchase_promo2").show();
                                                                                $(".Purchase_promo").hide();
                                                                                var dis1 = parseFloat($('#pp1').val());
                                                                                var dis2 = parseFloat($('#pp2').val());
                                                                                var dis3 = parseFloat($('#pp3').val());
                                                                                var dis4 = parseFloat($('#pp4').val());
                                                                                var amt = parseFloat(this.value);

                                                                                var dis_rate1 = dis1 - amt;
                                                                                var dis_rate2 = dis2 - amt;
                                                                                var dis_rate3 = dis3 - amt;
                                                                                var dis_rate4 = dis4 - amt;

                                                                                $('.dcr1').val(dis_rate1);
                                                                                $('.dcr2').val(dis_rate2);
                                                                                $('.dcr3').val(dis_rate3);
                                                                                $('.dcr4').val(dis_rate4);

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
                                                                        } else {
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

                                                                                var amt = parseFloat(this.value);

                                                                                var final_amt1 = dis1 * amt / 100;
                                                                                var final_amt2 = dis2 * amt / 100;
                                                                                var final_amt3 = dis3 * amt / 100;
                                                                                var final_amt4 = dis4 * amt / 100;
                                                                                var final_amt5 = dis5 * amt / 100;
                                                                                var final_amt6 = dis6 * amt / 100;
                                                                                var final_amt7 = dis7 * amt / 100;
                                                                                var final_amt8 = dis8 * amt / 100;
                                                                                var final_amt9 = dis9 * amt / 100;
                                                                                var final_amt10 = dis10 * amt / 100;
                                                                                var final_amt11 = dis11 * amt / 100;
                                                                                var final_amt12 = dis12 * amt / 100;
                                                                                var final_amt13 = dis13 * amt / 100;
                                                                                var final_amt14 = dis14 * amt / 100;
                                                                                var final_amt15 = dis15 * amt / 100;
                                                                                var final_amt16 = dis16 * amt / 100;

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

                                                                                $('.dcr1').val(dis_rate1);
                                                                                $('.dcr2').val(dis_rate2);
                                                                                $('.dcr3').val(dis_rate3);
                                                                                $('.dcr4').val(dis_rate4);
                                                                                $('.dcr5').val(dis_rate5);
                                                                                $('.dcr6').val(dis_rate6);
                                                                                $('.dcr7').val(dis_rate7);
                                                                                $('.dcr8').val(dis_rate8);
                                                                                $('.dcr9').val(dis_rate9);
                                                                                $('.dcr10').val(dis_rate10);
                                                                                $('.dcr11').val(dis_rate11);
                                                                                $('.dcr12').val(dis_rate12);
                                                                                $('.dcr13').val(dis_rate13);
                                                                                $('.dcr14').val(dis_rate14);
                                                                                $('.dcr15').val(dis_rate15);
                                                                                $('.dcr16').val(dis_rate16);

                                                                                //$(this).closest('div').find('.dcr1').val(dis_rate1);
                                                                                //$(this).closest('div').find('.dcr2').val(dis_rate2);
                                                                                //$(this).closest('div').find('.dcr3').val(dis_rate3);
                                                                                //$(this).closest('div').find('.dcr4').val(dis_rate4);
                                                                                $("#disUnitBulkdoll").click(function() {
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

                                                                                });
                                                                                $("#disUnitBulkPer").click(function() {
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

                                                                                var amt = parseFloat(this.value);

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

                                                                                $('.dcr1').val(dis_rate1);
                                                                                $('.dcr2').val(dis_rate2);
                                                                                $('.dcr3').val(dis_rate3);
                                                                                $('.dcr4').val(dis_rate4);
                                                                                $('.dcr5').val(dis_rate5);
                                                                                $('.dcr6').val(dis_rate6);
                                                                                $('.dcr7').val(dis_rate7);
                                                                                $('.dcr8').val(dis_rate8);
                                                                                $('.dcr9').val(dis_rate9);
                                                                                $('.dcr10').val(dis_rate10);
                                                                                $('.dcr11').val(dis_rate11);
                                                                                $('.dcr12').val(dis_rate12);
                                                                                $('.dcr13').val(dis_rate13);
                                                                                $('.dcr14').val(dis_rate14);
                                                                                $('.dcr15').val(dis_rate15);
                                                                                $('.dcr16').val(dis_rate16);
                                                                                //$(this).closest('div').find('.discountrate').val(dis_rate);
                                                                                $("#disUnitBulkdoll").click(function() {
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

                                                                                });
                                                                                $("#disUnitBulkPer").click(function() {
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
                                                            <script type="text/javascript">
                                                                function showTextBox2() {
                                                                    $(".textBox1").show();
                                                                }

                                                                function showTextBox3() {
                                                                    $(".textBox1").hide();
                                                                }
                                                                $(document).ready(function() {
                                                                    var maxField = 10; //Input fields increment limitation
                                                                    var addButton = $('.add_button'); //Add button selector
                                                                    var wrapper = $('.field_wrapper'); //Input field wrapper
                                                                    var fieldHTML = '<div><input type="text" name="startrange[]" style="width:50px;" class="startrange"> TO <input type="text" name="endrange[]" style="width:50px;" class="endrange"  > DISCOUNT RATE : <input type="text" class="field_name" name="field_name[]" value="" style="width:50px;"/><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-remove" style="color:red;font-size:20px;"></i></a><label style="font-size: 14px;background:#62bd18;border:1px solid #62bd18;color:#fff;display:none;" class="Purchase_promo">show new price</label><label style="font-size: 14px;background:#62bd18;border:1px solid #62bd18;color:#fff;display:none;" class="Purchase_promo2">show new price</label></div>'; //New input field html 
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
                                                                $(function() {
                                                                    global_value = 0;
                                                                    //alert(sR);
                                                                    $(document).on("keyup", "input:text.startrange", function() {
                                                                        var val = this.value;
                                                                        if (val > global_value) {
                                                                            var new_val = parseInt(val) + 1;
                                                                            global_value = new_val;
                                                                            $(this).closest('div').find('.endrange').val(new_val);
                                                                        } else {
                                                                            alert("please select the value Greater than previous Range");
                                                                        }
                                                                        //alert(p);
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
                                                                        <input type="radio" class="styled" name="dcapplypromo" id="chkapplypromono" value="No" checked>NO</label>
                                                                </div>
                                                            </div>
                                                            <div id="dvapplypromo" style="display:none;background:#eeeeee;padding:1%;">
                                                                <link href="<?php echo base_url('assets/new/css/datepicker.css');?>" rel="stylesheet">
                                                                <script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js');?>"></script>
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
                                                                                    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                                                                                }
                                                                            }).on('changeDate', function(ev) {
                                                                                checkout.hide();
                                                                            }).data('datepicker');
                                                                        });
                                                                    </script>

                                                                </div>

                                                                <script type="text/javascript">
                                                                    $(document).ready(function() {
                                                                        $(".Apply_promo").click(function() {
                                                                            //logic to show/hide collapsable content
                                                                            $(".show_apply_promo").toggle();
                                                                        });
                                                                    });

                                                                    $(document).ready(function() {
                                                                        $(".Apply_promo2").click(function() {
                                                                            //logic to show/hide collapsable content
                                                                            $(".show_apply_promo2").toggle();
                                                                        });
                                                                    });


                                                                    $(document).ready(function() {

                                                                        $(document).on("keyup", "input:text.apdiscountrate", function() {
                                                                            var ptype = $("input[name='dcinclusiveaccomodation']:checked").val()
                                                                            if (ptype == 'No') {
                                                                                $(".Apply_promo2").show();
                                                                                $(".Apply_promo").hide();
                                                                                var type = $("input[name='apdiscountunit']:checked").val()
                                                                                if (type == 'PERCENT') {

                                                                                    var dis1 = parseFloat($('#pp1').val());
                                                                                    var dis2 = parseFloat($('#pp2').val());
                                                                                    var dis3 = parseFloat($('#pp3').val());
                                                                                    var dis4 = parseFloat($('#pp4').val());
                                                                                    var amt = parseFloat(this.value);

                                                                                    var final_amt1 = dis1 * amt / 100;
                                                                                    var final_amt2 = dis2 * amt / 100;
                                                                                    var final_amt3 = dis3 * amt / 100;
                                                                                    var final_amt4 = dis4 * amt / 100;

                                                                                    var dis_rate1 = dis1 - final_amt1;
                                                                                    var dis_rate2 = dis2 - final_amt2;
                                                                                    var dis_rate3 = dis3 - final_amt3;
                                                                                    var dis_rate4 = dis4 - final_amt4;

                                                                                    //alert(dis_rate1);

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
                                                                                    $(".Apply_promo2").show();
                                                                                    $(".Apply_promo").hide();
                                                                                    var dis1 = parseFloat($('#pp1').val());
                                                                                    var dis2 = parseFloat($('#pp2').val());
                                                                                    var dis3 = parseFloat($('#pp3').val());
                                                                                    var dis4 = parseFloat($('#pp4').val());
                                                                                    var amt = parseFloat(this.value);

                                                                                    var dis_rate1 = dis1 - amt;
                                                                                    var dis_rate2 = dis2 - amt;
                                                                                    var dis_rate3 = dis3 - amt;
                                                                                    var dis_rate4 = dis4 - amt;

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
                                                                            } else {
                                                                                var type = $("input[name='apdiscountunit']:checked").val()
                                                                                if (type == 'PERCENT') {
                                                                                    $(".Apply_promo").show();
                                                                                    $(".Apply_promo2").hide();
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

                                                                                    var amt = parseFloat(this.value);

                                                                                    var final_amt1 = dis1 * amt / 100;
                                                                                    var final_amt2 = dis2 * amt / 100;
                                                                                    var final_amt3 = dis3 * amt / 100;
                                                                                    var final_amt4 = dis4 * amt / 100;
                                                                                    var final_amt5 = dis5 * amt / 100;
                                                                                    var final_amt6 = dis6 * amt / 100;
                                                                                    var final_amt7 = dis7 * amt / 100;
                                                                                    var final_amt8 = dis8 * amt / 100;
                                                                                    var final_amt9 = dis9 * amt / 100;
                                                                                    var final_amt10 = dis10 * amt / 100;
                                                                                    var final_amt11 = dis11 * amt / 100;
                                                                                    var final_amt12 = dis12 * amt / 100;
                                                                                    var final_amt13 = dis13 * amt / 100;
                                                                                    var final_amt14 = dis14 * amt / 100;
                                                                                    var final_amt15 = dis15 * amt / 100;
                                                                                    var final_amt16 = dis16 * amt / 100;

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

                                                                                    $('.dcr11').val(dis_rate1);
                                                                                    $('.dcr22').val(dis_rate2);
                                                                                    $('.dcr33').val(dis_rate3);
                                                                                    $('.dcr44').val(dis_rate4);
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

                                                                                    //$(this).closest('div').find('.dcr1').val(dis_rate1);
                                                                                    //$(this).closest('div').find('.dcr2').val(dis_rate2);
                                                                                    //$(this).closest('div').find('.dcr3').val(dis_rate3);
                                                                                    //$(this).closest('div').find('.dcr4').val(dis_rate4);
                                                                                    $("#disUnitApplyPromodoll").click(function() {
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

                                                                                    });
                                                                                    $("#disUnitApplyPromoper").click(function() {
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

                                                                                    });

                                                                                } else {
                                                                                    $(".Apply_promo").show();
                                                                                    $(".Apply_promo2").hide();
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

                                                                                    var amt = parseFloat(this.value);

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

                                                                                    $('.dcr11').val(dis_rate1);
                                                                                    $('.dcr22').val(dis_rate2);
                                                                                    $('.dcr33').val(dis_rate3);
                                                                                    $('.dcr44').val(dis_rate4);
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
                                                                                    //$(this).closest('div').find('.discountrate').val(dis_rate);
                                                                                    $("#disUnitApplyPromodoll").click(function() {
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

                                                                                    });
                                                                                    $("#disUnitApplyPromoper").click(function() {
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

                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"><b>Discount Unit : </b>
                                                                    </label>
                                                                    <div class="col-md-9">
                                                                        <label class="checkbox-inline" style="padding-left:0px;">
                                                                            <input type="radio" class="styled" name="apdiscountunit" value="PERCENT" id="disUnitApplyPromoper">% OR </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="radio" class="styled" name="apdiscountunit" value="DOLLOR" id="disUnitApplyPromodoll"> $ </label>
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
                                                                    <label class="control-label col-md-3"><b>Product Price After Promo Discount : </b>
                                                                    </label>
                                                                    <div class="col-md-9">
                                                                        <label style="font-size: 14px;background:#62bd18;border:1px solid #62bd18;color:#fff;display:none;" class="Apply_promo">show new price</label>
                                                                        <label style="font-size: 14px;background:#62bd18;border:1px solid #62bd18;color:#fff;display:none;" class="Apply_promo2">show new price</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="table-responsive show_apply_promo2" style="background:lightblue;display:none;">
                                                                        <table class="table">

                                                                            <tr>
                                                                                <td>Normal Rate</td>
                                                                                <td>Weekend Rate</td>
                                                                                <td>Peak Season Rate</td>
                                                                                <td>Super Peak Season Rate</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr11">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr22">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr33">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr44">myr/pax</td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="table-responsive show_apply_promo" style="background:lightblue;display:none;">
                                                                        <table class="table">

                                                                            <tr>
                                                                                <td colspan="2" align="right">Normal Rate</td>
                                                                                <td>Weekend Rate</td>
                                                                                <td>Peak Season Rate</td>
                                                                                <td>Super Peak Season Rate</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>single room</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr11">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr22">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr33">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr44">myr/pax</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>twin room</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr55">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr66">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr77">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr88">myr/pax</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3 person room</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr99">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr100">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr111">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr122">myr/pax</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>quad room</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr133">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr144">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr155">myr/pax</td>
                                                                                <td>
                                                                                    <input type="text" style="width:50px;" class="dcr166">myr/pax</td>
                                                                            </tr>
                                                                        </table>
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
                                                                <label class="control-label col-md-3"><b>Apply Promo for <br>Bulk Discount? </b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <label class="checkbox-inline" style="padding-left:0px;">
                                                                        <input type="radio" name="apbulkdiscount" class="styled" onClick="showTextBox96()">YES</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="apbulkdiscount" onClick="showTextBox95()" value="No" checked>NO</label>
                                                                </div>
                                                            </div>
                                                            <div class="apbulkdiscount" style="display:none;background:#eeeeee;padding:3%;">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <div class="table-responsive" style="border:1px solid #ccc;">
                                                                            <table class="table">
                                                                                <tr>
                                                                                    <td>Range</td>
                                                                                    <td>
                                                                                        <input type="text" value="3" disabled style="width: 50px;">
                                                                                    </td>
                                                                                    <td>To</td>
                                                                                    <td>
                                                                                        <input type="text" value="4" disabled style="width: 50px;">
                                                                                    </td>
                                                                                    <td>
                                                                                        <label style="background:#62bd18;border:1px solid #62bd18;color:#fff;" class="Bulk_promo">Show new price</label>
                                                                                    </td>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Range</td>
                                                                                    <td>
                                                                                        <input type="text" value="5" disabled style="width: 50px;">
                                                                                    </td>
                                                                                    <td>To</td>
                                                                                    <td>
                                                                                        <input type="text" value="6" disabled style="width: 50px;">
                                                                                    </td>
                                                                                    <td>
                                                                                        <label style="background:#62bd18;border:1px solid #62bd18;color:#fff;" class="Bulk_promo">Show new price</label>
                                                                                    </td>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Range</td>
                                                                                    <td>
                                                                                        <input type="text" value="7" disabled style="width: 50px;">
                                                                                    </td>
                                                                                    <td>To</td>
                                                                                    <td>
                                                                                        <input type="text" value="8" disabled style="width: 50px;">
                                                                                    </td>
                                                                                    <td>
                                                                                        <label style="background:#62bd18;border:1px solid #62bd18;color:#fff;" class="Bulk_promo">Show new price</label>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="table-responsive show_bulk_promo" style="background:lightblue;display:none;">
                                                                            <table class="table">
                                                                                <!--tr><td colspan="3">Range : 3 to 4</td><td colspan="2"></td></tr-->
                                                                                <tr>
                                                                                    <td colspan="2" align="right">Normal Rate</td>
                                                                                    <td>Weekend Rate</td>
                                                                                    <td>Peak Season Rate</td>
                                                                                    <td>Super Peak Season Rate</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>single room</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;" id="output">myr/pax</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;" id="output">myr/pax</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>twin room</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>3 person room</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>quad room</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                    <td>
                                                                                        <input type="text" style="width:50px;">myr/pax</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                $(document).ready(function() {
                                                                    $(".Bulk_promo").click(function() {
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
                                                                <label class="control-label col-md-3"><b>Optional Services : </b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <label class="checkbox-inline" style="padding-left:0px;">
                                                                        <input type="radio" name="optionalservices1" class="styled" onClick="showTextBox94()">YES</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="optionalservices1" onClick="showTextBox93()" value="No" checked>NO</label>
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
                                                                        <input type="text" name="services[]" style="width:200px" /> Price :
                                                                        <input type="text" name="price_of_service[]" style="width:170px" />
                                                                        <select name="quantity_require[]" style="width:200px">
                                                                            <option value="N">N</option>
                                                                            <option value="Y">Y</option>
                                                                        </select>
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

                                                                $(document).ready(function() {
                                                                    var maxField = 10; //Input fields increment limitation
                                                                    var addButton = $('.add_button2'); //Add button selector
                                                                    var wrapper = $('.field_wrapper2'); //Input field wrapper
                                                                    var fieldHTML = '<div style="border:1px solid gray;padding:10px;"><input type="text" name="services[]" style="width:200px"/> Price : <input type="text" name="price_of_service[]" style="width:170px"/><select name="quantity_require[]" style="width:200px"><option value="N">N</option><option value="Y">Y</option></select><a href="javascript:void(0);" class="remove_button2" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/></a></div>'; //New input field html 
                                                                    var x = 1; //Initial field counter is 1
                                                                    $(addButton).click(function() { //Once add button is clicked
                                                                        if (x < maxField) { //Check maximum number of input fields
                                                                            x++; //Increment field counter
                                                                            $(wrapper).append(fieldHTML); // Add field html
                                                                        }
                                                                    });
                                                                    $(wrapper).on('click', '.remove_button2', function(e) { //Once remove button is clicked
                                                                        e.preventDefault();
                                                                        $(this).parent('div').remove(); //Remove field html
                                                                        x--; //Decrement field counter
                                                                    });
                                                                });
                                                            </script>

                                                        </fieldset>
				<fieldset title="3">
				<legend class="text-semibold">Other Details</legend>
					
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
						
							$('#timepicker1').timepicki({start_time: ["<?php echo substr($row->checkintime,0,2);?>","<?php echo substr($row->checkintime,5,2);?>","<?php echo substr($row->checkintime,10,2);?>"]});
							$('#timepicker2').timepicki({start_time: ["<?php echo substr($row->checkouttime,0,2);?>","<?php echo substr($row->checkouttime,5,2);?>","<?php echo substr($row->checkouttime,10,2);?>"]});
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
							<label class="checkbox-inline" style="padding-left:0px;"><input type="radio" class="styled" name="actype" value="Capsule" <?php echo ($chkbox2=='Capsule')?'checked':'' ?>>Capsule</label>
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
							<label class="checkbox-inline" style="padding-left:0px;">
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
					 
					 <hr style="width:100%;">
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
				</fieldset>
                  <input type="submit" name="update_SAcourses_data" value="Update" class="btn btn-success stepy-finish">

               </form>				
				
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
		<script type="text/javascript">
            $(function() {



                $('#custom').stepy({
                    backLabel: 'BACK',
                    block: true,
                    errorImage: true,
                    nextLabel: 'NEXT',
                    titleClick: true,
                    validate: true
                });

                $('div#step').stepy({
                    finishButton: false
                });

                // Optionaly
                $('#custom').validate({
                    errorPlacement: function(error, element) {
                        $('#custom div.stepy-error').append(error);
                    },
                    rules: {
                        'name': {
                            maxlength: 1
                        },
                        'email': 'email',
                        'checked': 'required',
                        'newsletter': 'required',
                        'password': 'required',
                        'bio': 'required',
                        'day': 'required'
                    },
                    messages: {
                        'name': {
                            maxlength: 'User field should be less than 1!'
                        },
                        'email': {
                            email: 'Invalid e-mail!'
                        },
                        'checked': {
                            required: 'Checked field is required!'
                        },
                        'newsletter': {
                            required: 'Newsletter field is required!'
                        },
                        'password': {
                            required: 'Password field is requerid!'
                        },
                        'bio': {
                            required: 'Bio field is required!'
                        },
                        'day': {
                            required: 'Day field is requerid!'
                        },
                    }
                });

            });
        </script>

      