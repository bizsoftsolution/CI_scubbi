<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/stepywizerd/css/jquery.stepy.css'); ?>" />

<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <div class="breadcrumb-line breadcrumb-line-component">
            <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
            <ul class="breadcrumb">
                <li><a href=""><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li><a href="">Dashboard</a>
                </li>
                <li class="active">Dive Center Leisure</li>
            </ul>
        </div>
        <br>
        <!-- Main charts -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Traffic sources -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h2 class="panel-title">Dive Center Leisure</h2>
                        <div style="text-align:right;">
                            <!--a class="btn bg-violet" href="<?php echo  base_url();?>DCleisure/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
                            <a href="<?php echo  base_url();?>DCleisure/DCleisuredashboard" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
                        </div>
                        <hr/>
                    </div>
                    <div class="container-fluid">
                        <!-- content Starts Here-->
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <br>
                                <?php if($message=="FAILED" ) { ?>
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Action Failed !!! </strong>
                                </div>
                                <?php } else if($message=="SUCCESS" ) { ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Success !!! </strong> Updated successfully
                                </div>
                                <?php } ?>
                                <?php foreach($getEditdata as $row){?>
                                <h3 style="color: #2196f3;font-weight: bold;">Update Contents</h3>
                                <hr>
                                <form name="add" method="POST" action="<?php echo  base_url();?>DCleisure/edit/<?php echo $row->id; ?>" class="form-horizontal form-validate-jquery" enctype="multipart/form-data" id="custom">

                                    <fieldset title="1">
                                        <legend class="text-semibold">General Info</legend>
                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Product Name</b> <strong style="color:red;">*</strong>
                                            </label>
                                            <div class="col-md-9">
                                                <input name="name" class="form-control" type="text" value="<?php echo $row->product_name; ?>">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Product Description</b> <strong style="color:red;">*</strong>
                                            </label>
                                            <div class="col-md-9">
                                                <textarea name="description" class="form-control" id="editor-full1" required="required">
                                                    <?php echo $row->product_description; ?></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
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

                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Other Information</b>
                                            </label>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <input name="otherinformation" class="form-control" type="text" value="<?php echo $row->other_info; ?>">
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label col-md-6"><b>Product Category : </b> <strong style="color:red;">*</strong>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input name="productcategory" class="form-control" type="text" value="<?php echo $row->product_category; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label col-md-6"><b>Product Keyword: </b>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <style>
                                                            .btn-group {
                                                                width: 100%;
                                                            }
                                                        </style>
                                                        <select name="productkeyword[]" class="form-control multiselect-filtering" data-popup="tooltip" title="Product Keyword(It is required field)" data-placement="bottom" multiple="multiple">
                                                            <?php $aaa=$row->product_keyword; $vvv = explode(',', $aaa); /* foreach($vvv as $valll) { ?>
                                                            <option value="<?php echo $valll; ?>">
                                                                <?php echo $valll; ?>
                                                            </option>
                                                            <?php } $data=$this->db->get_where('tbl_product_keywords', array('user_id'=>$this->session->userdata('user_id')))->result_array(); */ $data=$this->db->get('tbl_product_keywords')->result_array(); foreach ($data as $pk) {?>
                                                            <option value="<?php echo $pk['keywords'];?>" <?php if(in_array($pk[ 'keywords'],$vvv)){echo "selected";}?> >
                                                                <?php echo $pk[ 'keywords'];?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Sequence Number</b> <strong style="color:red;">*</strong>
                                            </label>
                                            <div class="col-md-9">
                                                <input name="sequence_number" class="form-control" type="number" value="<?php echo $row->sequence_number; ?>" required>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Product Status</b>
                                            </label>
                                            <div class="col-md-9">
                                                <?php $chkbox1=$row->product_status; ?>
                                                <label class="checkbox-inline" style="padding-left: 0px;">
                                                    <input type="radio" class="styled" name="productstatus" value="Available" <?php echo ($chkbox1=='Available' )? 'checked': '' ?> >AVAILABLE</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" class="styled" name="productstatus" value="Hidden" <?php echo ($chkbox1=='Hidden' )? 'checked': '' ?> >HIDDEN</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset title="2">
                                        <legend class="text-semibold">Pricing Options</legend>

                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Product Unit :</b> <strong style="color:red;">*</strong>
                                            </label>
                                            <?php if($row->product_unit != "") { ?>
                                            <div class="col-md-9">
                                                <?php $chkbox2=$row->product_unit; if($chkbox2 =='Dive' || $chkbox2 =='Pax' || $chkbox2 =='Trip') { ?>
                                                <label class="checkbox-inline" style="padding-left: 0px;">
                                                    <input type="radio" class="styled" name="productunits" value="Dive" <?php echo ($chkbox2=='Dive' )? 'checked': '' ?>>Dive</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" class="styled" name="productunits" value="Pax" <?php echo ($chkbox2=='Pax' )? 'checked': '' ?>>Pax</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" class="styled" name="productunits" value="Trip" <?php echo ($chkbox2=='Trip' )? 'checked': '' ?>>Trip</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" class="styled" id="productunitsothers" name="productunits" />OTHERS</label>
                                                <label class="checkbox-inline">
                                                    <div id="dvproductunitsothers" style="display: none">
                                                        <input type="text" name="productunits" />
                                                    </div>
                                                </label>
                                                <script type="text/javascript">
                                                    $(function() {
                                                        $("input[name='productunits']").click(function() {
                                                            if ($("#productunitsothers").is(":checked")) {
                                                                $("#dvproductunitsothers").show();
                                                            } else {
                                                                $("#dvproductunitsothers").hide();
                                                            }
                                                        });
                                                    });
                                                </script>
                                                <?php } else { ?>
                                                <label class="checkbox-inline" style="padding-left: 0px;">
                                                    
                                             
                                                <label class="checkbox-inline" style="margin: 0 0 0 10px;">
                                                    <input type="radio" class="styled" name="productunits" value="Dive">Dive</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" class="styled" name="productunits" value="Pax">Pax</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" class="styled" name="productunits" value="Trip">Trip</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" class="styled" id="productunitsothers1" name="productunits" checked=""/>OTHERS</label>
													
                                                <label class="checkbox-inline">
                                                    <div id="dvproductunitsothers1" >
                                                        <input type="text" name="productunits" value="<?php echo $chkbox2; ?>" />
                                                    </div>
                                                </label>
                                                <script type="text/javascript">
                                                    $(function() {
                                                        $("input[name='productunits']").click(function() {
                                                            if ($("#productunitsothers1").is(":checked")) {
                                                                $("#dvproductunitsothers1").show();
                                                            } else {
                                                                $("#dvproductunitsothers1").hide();
                                                            }
                                                        });
                                                    });
                                                </script>
                                                <?php } ?>
                                            </div>
                                            <?php } else { ?>
                                            <div class="col-md-9">
                                                <label class="checkbox-inline" style="padding-left:0px;">
                                                    <input type="radio" class="styled" name="productunits" value="Dive">Dive</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" class="styled" name="productunits" value="Pax">Pax</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" class="styled" name="productunits" value="Trip">Trip</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" class="styled" id="productunitsothers2" name="productunits" />OTHERS</label>
                                                <label class="checkbox-inline">
                                                    <div id="dvproductunitsothers2" style="display: none">
                                                        <input type="text" name="productunits" />
                                                    </div>
                                                </label>
                                                <script type="text/javascript">
                                                    $(function() {
                                                        $("input[name='productunits']").click(function() {
                                                            if ($("#productunitsothers2").is(":checked")) {
                                                                $("#dvproductunitsothers2").show();
                                                            } else {
                                                                $("#dvproductunitsothers2").hide();
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Max Dive/ Day </b>
                                            </label>
                                            <div class="col-md-9">
                                                <input name="maxdiveday" class="form-control" type="text" value="<?php echo $row->max_dive_day; ?>">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
										<div class="form-group">
                        <label class="control-label col-md-3"><b>Product Max / Day </b></label>
                        <div class="col-md-9">
							<div class="row">
							<?php 
								if($row->product_max_day == 'No Limit')
								{
							?>
							<div class="col-md-9">
								<input name="productmaxday" class="form-control productmaxday1" type="text" 
								value="<?php echo $row->product_max_day; ?>" id="productmaxday1">
								<span class="help-block"></span>
							</div>
							<div class="col-md-3">
								<label class="checkbox-inline"><input type="checkbox" class="styled" name="nomax" value="No Limit" <?php echo ($row->product_max_day == 'No Limit' ? 'checked' : '' ); ?> id="nomax">No Max</label>
							</div>
							<?php
								}
								else
								{
								?>
							<div class="col-md-9">
								<input name="productmaxday" class="form-control productmaxday1" type="text" 
								value="<?php echo $row->product_max_day; ?>" id="productmaxday1">
								<span class="help-block"></span>
							</div>
							<div class="col-md-3">
								<label class="checkbox-inline"><input type="checkbox" class="styled" name="nomax" value="No Limit" <?php echo ($row->product_max_day == 'No Limit' ? 'checked' : '' ); ?> id="nomax">No Max</label>
							</div>
							<?php	
								}
							?>
								
                        </div>
                        </div>
                     </div>
					<script>
						$(document).ready(function(){
							$("#nomax").click(function() {
							$(".productmaxday1").val("No Limit");
							});
						});
					
						document.getElementById('nomax').onchange = function() {
							document.getElementById('productmaxday1').disabled = this.checked;
						};
					</script>
                                        <!--div class="form-group">
                                            <label class="control-label col-md-3"><b>Product Max / Day </b>
                                            </label>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input name="productmaxday" class="form-control" type="text" value="<?php echo ($row->product_max_day < 99 ? $row->product_max_day : '' ); ?>">
                                                        <span class="help-block"></span>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" class="styled" name="nomax" value="yes" <?php echo ($row->product_max_day >= 99 ? 'checked' : '' ); ?>>No Max</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                document.getElementById('nomax').onchange = function() {
                                                    document.getElementById('productmaxday1').disabled = this.checked;
                                                };
                                            </script>
                                        </div-->
                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Product Price : MYR</b>
                                            </label>
                                            <div class="col-md-9">
                                                <input name="product_price" id="product_price" class="form-control" type="text" value="<?php echo $row->product_price; ?>">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        <!--****************************************************************************************************************************************************************************************************************************************************************************************************													START APPLY DISCOUNT FOR BULK PURCHASE *****************************************************************************************************************************************************************************************************************************************************************************************************-->

                                        <?php $chkbox3=$row->discount_bulk_purchase; if(($chkbox3=='Yes')?'checked':'') { ?>
                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Apply Discount for Bulk Purchase? </b>
                                            </label>
                                            <div class="col-md-9">
                                                <label class="checkbox-inline" style="padding-left: 0px;">
                                                    <input type="radio" class="styled" name="dcdiscountpurchase" value="Yes" <?php echo ($chkbox3=='Yes' )? 'checked': '' ?>>YES</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" class="styled" name="dcdiscountpurchase" value="No" <?php echo ($chkbox3=='No' )? 'checked': '' ?>>NO</label>
                                            </div>
                                        </div>
										<div class="textBox1" style="background:#eeeeee;padding:1%;">
											<div class="form-group">
												<label class="control-label col-md-3"><b>Discount Unit : </b>
												</label>
												<div class="col-md-9">
													<?php $chkbox4=$row->discount_unit; ?>
													<label class="checkbox-inline" style="padding-left: 0px;">
														<input type="radio" class="styled" name="dcdiscountunit" value="%" <?php echo ($chkbox4=='PERCENT' )? 'checked': '' ?>>% OR </label>
													<label class="checkbox-inline">
														<input type="radio" class="styled" name="dcdiscountunit" value="$" <?php echo ($chkbox4=='DOLLOR' )? 'checked': '' ?>> $ </label>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3"><b>Range</b>
												</label>
												<div class="col-md-9">
													<div class="field_wrapper">
														<?php $strrange1=$row->range_start; 
														$endrange1=$row->range_end; 
														$disrate1=$row->discount_rate; $discount_bulk_purchase_amount1=$row->discount_bulk_purchase_amount; 
														$arr_strrange1=explode(",",$strrange1); 
														$arr_endrange1=explode(",",$endrange1); 
														$arr_disrate1=explode(",",$disrate1); 
														$row_bulk_amount=explode(",",$discount_bulk_purchase_amount1); 
														$i=0; 
														foreach($arr_strrange1 as $row1) {
															?>

														<div>
															<input type="text" name="startrange[]" style="width:50px;" class="startrange" value="<?php echo $arr_strrange1[$i];?>"> TO
															<input type="text" name="endrange[]" style="width:50px;" class="endrange" value="<?php echo $arr_endrange1[$i]; ?>" disabled> DISCOUNT RATE :
															<input type="text" class="field_name" name="field_name[]" value="<?php echo $arr_disrate1[$i]; ?>" style="width:50px;" />
															<input type="text" name="discount_bulk_purchase_amount" value="<?php echo $row_bulk_amount[$i];?>" class="discountrate" style="width:50px;" disabled><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-remove" style="color:red;font-size:20px;"></i></a>
														</div>
														<div class="row" style="margin:1px 0px;">&nbsp;</div>
														<?php $i++; } ?>
														<a href="javascript:void(0);" class="add_button" title="Add field">
															<i class="fa fa-plus" style="color:green;font-size:20px"></i>
														</a>
													</div>
												</div>
											</div>
										</div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                $(document).on("keyup", "input:text.field_name", function() {
                                                    var type = $("input[name='dcdiscountunit']:checked").val()
                                                    if (type == 'PERCENT') {

                                                        var dis = parseFloat($('#product_price').val());
                                                        var amt = parseFloat(this.value);
                                                        var final_amt = dis * amt / 100;

                                                        var dis_rate = dis - final_amt;
                                                        $(this).closest('div').find('.discountrate').val(dis_rate);
                                                    } else {

                                                        var dis = parseFloat($('#product_price').val());
                                                        var amt = parseFloat(this.value);


                                                        var dis_rate = dis - amt;
                                                        $(this).closest('div').find('.discountrate').val(dis_rate);
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
                                                var fieldHTML = '<div><input type="text" name="startrange[]" style="width:50px;" class="startrange"> TO <input type="text" name="endrange[]" style="width:50px;" class="endrange"  disabled> DISCOUNT RATE : <input type="text" class="field_name" name="field_name[]" value="" style="width:50px;"/><input type="text" class="discountrate" style="width:50px;" disabled><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-remove" style="color:red;font-size:20px;"></i></a></div>'; //New input field html 
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

                                        <?php 
										}
										else 
										{ 
										?>
                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Apply Discount for <br>Bulk Purchase? </b>
                                            </label>
                                            <div class="col-md-9">
                                                <label class="checkbox-inline" style="padding-left: 0px;">
                                                    <input type="radio" class="styled" name="dcdiscountpurchase" value="Yes" onClick="showTextBox2()" <?php echo ($chkbox3=='Yes' )? 'checked': '' ?>>YES</label>
                                                <label class="checkbox-inline">
                                                    <input type="radio" class="styled" name="dcdiscountpurchase" value="No" onClick="showTextBox3()" <?php echo ($chkbox3=='No' )? 'checked': '' ?>>NO</label>
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
                                                            <input type="text" name="endrange[]" style="width:50px;" class="endrange" value="0" disabled/> DISCOUNT RATE :
                                                            <input type="text" name="field_name[]" value="" style="width:50px;" class="field_name" />
                                                            <input type="text" class="discountrate" style="width:50px;" disabled>
                                                            <a href="javascript:void(0);" class="add_button" title="Add field">
                                                                <i class="fa fa-plus" style="color:green;font-size:20px"></i>
                                                            </a>
                                                        </tr>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {

                                                $(document).on("keyup", "input:text.field_name", function() {
                                                    var type = $("input[name='dcdiscountunit']:checked").val()
                                                    if (type == 'PERCENT') {

                                                        var dis = parseFloat($('#product_price').val());
                                                        var amt = parseFloat(this.value);
                                                        var final_amt = dis * amt / 100;

                                                        var dis_rate = dis - final_amt;
                                                        $(this).closest('div').find('.discountrate').val(dis_rate);
                                                    } else {

                                                        var dis = parseFloat($('#product_price').val());
                                                        var amt = parseFloat(this.value);


                                                        var dis_rate = dis - amt;
                                                        $(this).closest('div').find('.discountrate').val(dis_rate);
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
                                                var fieldHTML = '<div><input type="text" name="startrange[]" style="width:50px;" class="startrange"> TO <input type="text" name="endrange[]" style="width:50px;" class="endrange"  disabled> DISCOUNT RATE : <input type="text" class="field_name" name="field_name[]" value="" style="width:50px;"/><input type="text" class="discountrate" style="width:50px;" disabled><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-remove" style="color:red;font-size:20px;"></i></a></div>'; //New input field html 
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
                                        <!--****************************************************************************************************************************************************************************************************************************************************************************************************													END APPLY DISCOUNT FOR BULK PURCHASE *****************************************************************************************************************************************************************************************************************************************************************************************************-->
                                        <?php } 
										?>
										<link href="<?php echo base_url('assets/new/css/datepicker.css');?>" rel="stylesheet">
                                        <script type="text/javascript" src="<?php echo base_url('assets/new/js/bootstrap-datepicker.js');?>"></script>
                                <script>
										$(document).ready(function() {
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

									
									<script>
										$(document).ready(function() {

											$(document).on("keyup", "input:text.apdiscountrate", function() {

												var type = $("input[name='apdiscountunit']:checked").val()
												if (type == 'PERCENT') {

													var dis = parseFloat($('#product_price').val());
													var amt = parseFloat(this.value);
													var final_amt = dis * amt / 100;

													var dis_rate = dis - final_amt;
													alert(dis_rate);
													$(this).parent().parent().parent().parent().closest('div').find('#afterpromo_discount').val(dis_rate);
												} else {

													var dis = parseFloat($('#product_price').val());
													var amt = parseFloat(this.value);


													var dis_rate = dis - amt;
													$(this).parent().parent().parent().parent().closest('div').find('#afterpromo_discount').val(dis_rate);
												}


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
												if ($("#chkapplypromono").is(":checked")) {
													$("#dvapplypromo").hide();
													$(".disable_promodiscount").hide();
												} else {
													$("#dvapplypromo").show();
													$(".disable_promodiscount").show();
												}
											});
										});

										$("#apdiscountrate").keyup(function() {
											var dis1 = parseFloat($('.product_price').val());
											var amt1 = parseFloat($('#apdiscountrate').val());

											var final_amt1 = dis1 * amt1 / 100;
											var dis_rate1 = dis1 - final_amt1;

											//var final_amt = amt - dis_rate;
											$('#afterpromo_discount').val(dis_rate1);
										});
									</script>
			
										<?php
										$chkbox5=$row->discount_bulk_purchase;
										if(($chkbox5=='Yes')?'checked':'') 
										{
											?>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Apply Promo? </b>
                                            </label>
                                            <div class="col-md-9">

                                                <label class="checkbox-inline" style="padding-left: 0px;">
                                                    <input type="radio" class="styled" name="dcapplypromo" id="chkapplypromoyes1" value="Yes" <?php echo ($chkbox5=='Yes' )? 'checked': '' ?>>YES</label>
                                                <label class="checkbox-inline"><input type="radio" class="styled" name="dcapplypromo" id="chkapplypromono" value="No" <?php echo ($chkbox5=='No')?'checked':'' ?>>NO</label>
                                            </div>
                                        </div>

									 <div id="dvapplypromo" style="background:#eeeeee;padding:1%;">
										
										<div class="form-group">
											<label class="control-label col-md-3"><b>Start Date : </b>
											</label>
											<div class="col-md-3">
												<input type="text" name="applypromo_startdate" value="<?php echo $row->start_date; ?>" id="dpd7" class="form-control">
											</div>
											<label class="control-label col-md-3"><b>End Date : </b>
											</label>
											<div class="col-md-3">
												<input type="text" name="applypromo_enddate" value="<?php echo $row->end_date;?>" id="dpd8" class="form-control">
											</div>
										</div>
									 
										<div class="form-group">
											<label class="control-label col-md-3"><b>Discount Unit : </b>
											</label>
											<div class="col-md-9">
												<label class="checkbox-inline">
												<?php
												if($row->ap_discount_unit == "PERCENT")
												{
													?>
													<input type="radio" class="styled" name="apdiscountunit" value="PERCENT" checked>% OR </label>
												<label class="checkbox-inline">
													<input type="radio" class="styled" name="apdiscountunit" value="DOLLOR"> $ </label>
													<?php
													}
													
													else
													{
														?>
														<input type="radio" class="styled" name="apdiscountunit" value="PERCENT" >% OR </label>
												<label class="checkbox-inline">
													<input type="radio" class="styled" name="apdiscountunit" value="DOLLOR" checked> $ </label>
													<?php
													}
													?>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3"><b>Discount Rate : </b>
											</label>
											<div class="col-md-9">
												<input name="apdiscountrate" value="<?php echo $row->ap_discount_rate;?>" class="apdiscountrate form-control" type="text" data-popup="tooltip" title="Discount Rate(It is required field)" data-placement="bottom">
												<span class="help-block"></span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3"><b>Product Price <br>After Promo Discount? </b>
											</label>
											<div class="col-md-9">
												MYR
												<input value="<?php echo $row->ap_discount_amount;?>" name="afterpromo_discount" class="form-control" id="afterpromo_discount" type="text" >
											</div>
										</div>
									</div>

                                      
                                        <?php 
										} 
										else
										{?>
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
												 </div>
												<div class="form-group">
													<label class="control-label col-md-3"><b>Discount Unit : </b>
													</label>
													<div class="col-md-9">
														<label class="checkbox-inline">
															<input type="radio" class="styled" name="apdiscountunit" value="PERCENT" checked>% OR </label>
														<label class="checkbox-inline">
															<input type="radio" class="styled" name="apdiscountunit" value="DOLLOR"> $ </label>
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
												<div class="form-group">
													<label class="control-label col-md-3"><b>Product Price <br>After Promo Discount? </b>
													</label>
													<div class="col-md-9">
														MYR
														<input name="afterpromo_discount" class="form-control" id="afterpromo_discount" type="text" Disabled>
													</div>
												</div>
											</div>
										  

									
<?php
										}
										
                                        ?>
										<div class="form-group">
											<label class="control-label col-md-3"><b>Optional Services : </b>
											</label>
											<div class="col-md-9">
											<?php
											if($row->optional_services == 'YES')
											{
												?>
												<label class="checkbox-inline" style="padding-left:0px;">
													<input type="radio" name="optionalservices1" class="styled" value="YES" onClick="showTextBox94()" checked>YES</label>
												<label class="checkbox-inline">
													<input type="radio" class="styled" name="optionalservices1" onClick="showTextBox93()" value="No" >NO</label>
													<?php
											}
											else
											{?>
												<label class="checkbox-inline" style="padding-left:0px;">
													<input type="radio" name="optionalservices1" class="styled" value="YES" onClick="showTextBox94()">YES</label>
												<label class="checkbox-inline">
													<input type="radio" class="styled" name="optionalservices1" onClick="showTextBox93()" value="No" checked>NO</label>
											<?php
											}
													?>
											</div>
										</div>
										<div class="optionalservices1" style="<?php if($row->optional_services == 'No'){?>display:none;<?php } ?>background:#eeeeee;padding:1%;">
											<div class="row">
												<div class="col-md-3">Services</div>
												<div class="col-md-3">Price of Service</div>
												<div class="col-md-3">Quantity Require?</div>
												<div class="col-md-3">&nbsp;</div>
											</div>
											<div class="field_wrapper2">
											<?php
											if($row->optional_services == "YES")
											{
												$optional_services_price = explode(',',$row->optional_services_price);
												$optional_services_service = explode(',',$row->optional_services_service);
												$optional_service_qty_required = explode(',',$row->optional_service_qty_required);
												$i=0;
												foreach($optional_services_price as $dummyRow)
												{
													
												?>
													<div style="border:1px solid gray;padding:10px;">
														<input type="text" value="<?php echo $optional_services_service[$i]; ?>" name="services[]" style="width:200px" /> 
														Price :
														<input type="number" name="price_of_service[]" style="width:170px" value="<?php echo $optional_services_price[$i]; ?>" />
														<?php
														if($optional_service_qty_required[$i] == 'Y')
														{
														?>
															<select name="quantity_require[]" style="width:200px">
																<option value="Y">Y</option>
																<option value="N">N</option>
															</select>
														<?php
														}
														else
														{
														?>
															<select name="quantity_require[]" style="width:200px">
																<option value="N">N</option>
																<option value="Y">Y</option>
															</select>
														<?php
														}
														?>
														<a href="javascript:void(0);" class="remove_button2" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/></a>
	</a>
													</div>
												<?php
												$i++;
												}
											}
											else
											{?>
												 <div style="border:1px solid gray;padding:10px;">
													<input type="text" name="services[]" style="width:200px" /> 
													Price :
													<input type="number" name="price_of_service[]" style="width:170px" />
													<select name="quantity_require[]" style="width:200px">
														<option value="N">N</option>
														<option value="Y">Y</option>
													</select>
													<a href="javascript:void(0);" class="add_button2" title="Add field">
<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/></a>
</a>
												</div>
										<?php	}
												?>
												<a href="javascript:void(0);" class="add_button2" title="Add field">
	<img src="<?php echo base_url(); ?>/upload/images/plus.png" style="width:25px; height:25px;"/></a>
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
												var fieldHTML = '<div style="border:1px solid gray;padding:10px;"><input type="text" name="services[]" style="width:200px"/> Price : <input type="number" name="price_of_service[]" style="width:170px"/><select name="quantity_require[]" style="width:200px"><option value="N">N</option><option value="Y">Y</option></select><a href="javascript:void(0);" class="remove_button2" title="Remove field"><img src="<?php echo base_url(); ?>/upload/images/minus.png" style="width:25px; height:25px;"/></a></div>'; //New input field html 
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

                                        <!--****************************************************************************************************************************************************************************************************************************************************************************************************																END OPTIONAL SERVICES *****************************************************************************************************************************************************************************************************************************************************************************************************-->
                                    </fieldset>
                                    <fieldset title="3">
                                        <legend class="text-semibold">Other Details</legend>
                                        <div class="form-group">
                                            <label class="control-label col-md-12" style="color: #ff5722;"><b>OTHER INFORMATION TO DISPLAY: </b>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Diver Certification</b>
                                            </label>
                                            <div class="col-md-9">
                                                <?php $chkbox8=$row->diver_certification; $arr1=explode(",",$chkbox8); ?>
                                                <div class="row">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="styled" name="divercertification[]" value="Non-Diver" <?php if(in_array( "Non-Diver",$arr1)){echo "checked";}?>>NON-DIVER</label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="styled" name="divercertification[]" value="Owd" <?php if(in_array( "Owd",$arr1)){echo "checked";}?>>OWD</label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="styled" name="divercertification[]" value="Aow" <?php if(in_array( "Aow",$arr1)){echo "checked";}?>>AOW</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Diver Experience</b>
                                            </label>
                                            <div class="col-md-9">
                                                <?php $chkbox9=$row->diver_experience; $arr2=explode(",",$chkbox9); ?>
                                                <div class="row">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="styled" name="diverexperience[]" value="Novice" <?php if(in_array( "Novice",$arr2)){echo "checked";}?>>NOVICE</label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="styled" name="diverexperience[]" value="Advanced" <?php if(in_array( "Advanced",$arr2)){echo "checked";}?>>ADVANCED</label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="styled" name="diverexperience[]" value="Experienced" <?php if(in_array( "Experienced",$arr2)){echo "checked";}?>>EXPERIENCED</label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="styled" name="diverexperience[]" value="Non-Diver" <?php if(in_array( "Non-Diver",$arr2)){echo "checked";}?>>NON-DIVER</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3"><b>Diver Specialties</b>
                                            </label>
                                            <div class="col-md-9">
                                                <?php $chkbox10=$row->diver_specialties; $arr3=explode(",",$chkbox10); ?>
                                                <div class="row">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="styled" name="diverspecialties[]" value="Altitude Diver" <?php if(in_array( "Altitude Diver",$arr3)){echo "checked";}?>>ALTITUDE DIVER</label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="styled" name="diverspecialties[]" value="Cavern Diver" <?php if(in_array( "Cavern Diver",$arr3)){echo "checked";}?>>CAVERN DIVER</label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="styled" name="diverspecialties[]" value="Deep Diver" <?php if(in_array( "Deep Diver",$arr3)){echo "checked";}?>>DEEP DIVER</label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="styled" name="diverspecialties[]" value="Wreck Diver" <?php if(in_array( "Wreck Diver",$arr3)){echo "checked";}?>>WRECK DIVER</label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <input type="submit" name="update_DCleisure_data" value="Update" class="btn btn-success stepy-finish">
                                    <!--div style="text-align:center">
                     <input type="submit" name="update_DCleisure_data" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div-->
                                </form>

                                <?php } ?>
                                <br>
                                <br>
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