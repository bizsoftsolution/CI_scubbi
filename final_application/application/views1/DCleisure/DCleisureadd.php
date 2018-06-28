<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js1"></script>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/stepywizerd/css/jquery.stepy.css'); ?>" />
<!-- Optionaly -->

<!--script type="text/javascript" src="<?php echo base_url('assets/stepywizerd/js/jquery.validate.min.js1'); ?>"></script>

			<script type="text/javascript" src="<?php echo base_url('assets/stepywizerd/js/jquery.stepy.min.js1'); ?>"></script-->

			<style>
.error{
	border-color: red;
    color: red;
    border-top-color: red;
}
</style>

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
                <li class="active">Leisure Dive
				<?php 
				$data7 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$this->session->userdata('user_id')))->row();
				$dccur =  $data7->dccurrency;
				?>
				</li>
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
                                <li>
                                    <a data-action="collapse"></a>
                                </li>
                                <li>
                                    <a data-action="reload"></a>
                                </li>
                                <!-- <li><a data-action="close"></a></li> -->
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="tabbable">
                            <ul class="nav nav-tabs nav-tabs-highlight">
                                <li><a href="<?php echo base_url(); ?>DCleisure/DCleisuredashboard">Dashboard</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>DCleisure/DCleisurelist">Add Standard Product</a>
                                </li>
                                <li class="active"><a href="<?php echo base_url(); ?>DCleisure/addNew">Add Customized Product</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="active">

                                    <div class="container-fluid">
                                        <!-- content Starts Here-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Multiple buttons -->

                                                <div class="panel-body1">

                                                    <form name="add" method="POST" action="<?php echo  base_url();?>DCleisure/addNew" class="form-horizontal form-validate-jquery" enctype="multipart/form-data" id="custom">
                                                        <fieldset title="1">
                                                            <legend>General Info</legend>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Product Name</b> <strong style="color:red;">*</strong>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <input name="name" class="form-control" type="text" data-popup="tooltip" title="Product name(It is required field)" data-placement="bottom" required="">
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Product Description</b> <strong style="color:red;">*</strong>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <textarea name="description" cols="2" rows="2" class="wysihtml5 wysihtml5-min form-control" data-popup="tooltip" title="Product Description(It is required field)" data-placement="bottom" required></textarea>
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
																	 <textarea name="productincludes1" cols="2" rows="2" class="wysihtml5 wysihtml5-min form-control" data-popup="tooltip" title="Product Includes(It is required field)" data-placement="bottom"></textarea>
																	<span class="help-block"></span>
																	
                                                                    <!--input name="productincludes1" class="form-control" type="text" data-placement="bottom"-->
                                                                    
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
																	<textarea name="productexcludes1" cols="2" rows="2" class="wysihtml5 wysihtml5-min form-control" data-popup="tooltip" title="Product Excludes(It is required field)" data-placement="bottom"></textarea>
																	
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
                                                                        <label class="control-label col-md-6"><b>Product Category : </b> <strong style="color:red;">*</strong>
                                                                        </label>
                                                                        <div class="col-md-6">
                                                                            <input name="productcategory" class="form-control" type="text" data-popup="tooltip" title="Product Category(It is required field)" data-placement="bottom" value="Leisure Dive" required>
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
                                                                        <label class="control-label col-md-4"><b>Product Keyword : </b>
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <select name="productkeyword[]" class="form-control multiselect-filtering" data-popup="tooltip" title="Product Keyword(It is required field)" data-placement="bottom" multiple="multiple">
                                                                                <?php $data=$this->db->get('tbl_product_keywords')->result(); foreach ($data as $pk) {?>
                                                                                <option value="<?php echo $pk->keywords;?>">
                                                                                    <?php echo $pk->keywords;?></option>
                                                                                <?php } ?>
                                                                            </select>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--script>
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

					</script-->
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Sequence Number</b> <strong style="color:red;">*</strong>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <input name="sequence_number" class="form-control sequence_number" type="number" data-popup="tooltip" title="Sequence Number(It is required field)" data-placement="bottom" required>
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Product Status</b>
                                                                </label>
                                                                <div class="col-md-9 text-left">
                                                                    <label class="checkbox-inline" style="padding-left: 0px;">
                                                                        <input type="radio" class="styled" name="productstatus" value="Available">AVAILABLE</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="productstatus" value="Hidden" checked>HIDDEN</label>
                                                                </div>
                                                            </div>

                                                        </fieldset>

                                                        <!--fieldset title="1">
		<legend class="text-semibold">General Info</legend>
		
	</fieldset-->
                                                        <fieldset title="2">
                                                            <legend>Pricing Options</legend>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Product Unit :</b> <strong style="color:red;">*</strong>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <label class="checkbox-inline" style="padding-left: 0px;">
                                                                        <input type="radio" class="styled" name="productunits" value="Dive" onClick="showTextBox1000()" checked/>Dive</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="productunits" value="Pax" onClick="showTextBox999()" />Pax</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="productunits" value="Trip" onClick="showTextBox999()" />Trip</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="productunits" value="Item" onClick="showTextBox999()" />Item</label>
                                                                </div>
<!--
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="productunits" onClick="showTextBox()" />OTHERS</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="text" name="productunits" class="textBox" hidden class="form-control" />
                                                                    </label>

                                                                <script type="text/javascript">
                                                                    function showTextBox() {
                                                                        $(".textBox").show('fast');
                                                                    }

                                                                    function showTextBox1() {
                                                                        $(".textBox").hide('fast');
                                                                    }
                                                                </script>
//-->
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Max Dive/ Day </b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <input name="maxdiveday" class="form-control max_dive_per_day" type="number" data-popup="tooltip" title="Max Dive(It is required field)" data-placement="bottom" >
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
		<script>
			function showTextBox1000() {
					$('.max_dive_per_day').removeAttr("readonly");
				}
				function showTextBox999() {
					$('.max_dive_per_day').attr("readonly","readonly");
					$(".max_dive_per_day").val("");
				}

		</script>
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
                                                                <label class="control-label col-md-3"><b>Product Price : <?php echo $dccur; ?></b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <input name="product_price" class="form-control" type="number" data-popup="tooltip" title="Product Price(It is required field)" data-placement="bottom" id="product_price" required="">
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Apply Discount for <br>Bulk Purchase? </b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <label class="checkbox-inline" style="padding-left: 0px!important;">
                                                                        <input type="radio" class="styled" name="dcdiscountpurchase" value="Yes" id="dcdiscountpurchaseYes" onClick="showTextBox2()">YES</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="dcdiscountpurchase" value="No" id="dcdiscountpurchaseNo" onClick="showTextBox3()" checked>NO</label>
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
                                                                            <input type="radio" class="styled " id="disUnitBulkdoll" name="dcdiscountunit" value="DOLLOR"> $ </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"><b>Range</b>
                                                                    </label>
                                                                    <div class="col-md-9">
                                                                        <div class="field_wrapper">
                                                                            <tr id="1">

                                                                                <input type="text" name="startrange[]" style="width:50px;" class="startrange" id="startrange" /> TO
                                                                                <input type="text" name="endrange[]" style="width:50px;" class="endrange" id="endrange" value="0"  /> DISCOUNT :
                                                                                <input type="text" name="field_name[]" value="" style="width:50px;" class="field_name" />
																				RATE :
                                                                                <input type="text" name="discount_bulk_purchase_amount[]" class="discountrate" style="width:50px;" readonly>
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
                                                                    var maxField = 3; //Input fields increment limitation
                                                                    var addButton = $('.add_button'); //Add button selector
                                                                    var wrapper = $('.field_wrapper'); //Input field wrapper
                                                                    var fieldHTML = '<div><input type="text" name="startrange[]" style="width:50px;" class="startrange" > TO <input type="text" name="endrange[]" style="width:50px;" class="endrange"  > DISCOUNT : <input type="text" class="field_name" name="field_name[]" value="" style="width:50px;"/>RATE :<input type="text" class="discountrate" style="width:50px;" name="discount_bulk_purchase_amount[]" readonly><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-remove" style="color:red;font-size:20px;"></i></a></div>'; //New input field html 
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
																	//new_val =0;
                                                                    //alert(sR);
                                                                    $(document).on("keyup", ".startrange", function() {
                                                                        /* var val = this.value;
                                                                        if (val > global_value) {
                                                                            var new_val = parseInt(val) + 1;
                                                                            global_value = new_val;
                                                                            $(this).closest('div').find('.endrange').val(new_val);	
                                                                        }  */

																		/* else if(global_value => val)
																		{
																			//alert("please select the value Greater than previous Range");
																		} */
																		/* else {
                                                                           alert("please select the value Greater than previous Range");
                                                                        } */
                                                                        //alert(p);
                                                                    });
																	$(document).on("keypress", ".endrange", function() {
																		var val1 = $(".startrange").val();
																		var val2 = this.value;
																		if(val1 > val2)
																		{
																			alert("haiiiiiii");
																		}
																		else
																		{
																			
																		}
																		//alert(val1);
																	});
																	/* $(document).on("keyup", "input:text.endrange", function() {
                                                                        var val1 = this.value;
																		//alert(global_value);
																		
																		if (val1 > global_value) {
																				// alert(global_value+"--yes-"+val1);
																			  //  global_value = val;
																				//$(this).removeClass("error");
																			} else {
																				//alert(new_val+"-no--"+val);
																				//$(this).addClass("error");
																			}

                                                                    }); */
																	
                                                                });
																
																
																
                                                            </script>

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
                                                                                    return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
                                                                                }
                                                                            }).on('changeDate', function(ev) {
                                                                                checkout.hide();
                                                                            }).data('datepicker');
                                                                        });
                                                                    </script>

                                                                </div>
                                                                <script>
                                                                    $(document).ready(function() {

                                                                        $(document).on("keyup", "input:text.apdiscountrate", function() {

                                                                            var type = $("input[name='apdiscountunit']:checked").val()
                                                                            if (type == 'PERCENT') {

                                                                                var dis = parseFloat($('#product_price').val());
                                                                                var amt = parseFloat(this.value);
                                                                                var final_amt = dis * amt / 100;

                                                                                var dis_rate = dis - final_amt;
                                                                                //alert(dis_rate);
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
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"><b>Discount Unit : </b>
                                                                    </label>
                                                                    <div class="col-md-9">
                                                                        <label class="checkbox-inline" style="padding-left:0px;">
                                                                            <input type="radio" class="styled enter" name="apdiscountunit" value="PERCENT" id="discount_unit_percent">% OR </label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="radio" class="styled exit" name="apdiscountunit" value="DOLLOR" id="discount_unit_dollor"> $ </label>
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
                                                                       <?php echo $dccur; ?>
                                                                        <input name="afterpromo_discount" class="form-control afterpromo_discount" id="afterpromo_discount" type="text" readonly>
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

                                                                
                                                            </script>
		<div class="form-group disable_promodiscount">
			<label class="control-label col-md-3"><b>Apply Promo for <br>Bulk Discount? </b>
			</label>
			<div class="col-md-9">
				<label class="checkbox-inline" style="padding-left:0px;">
					<input type="radio" name="apbulkdiscount" id="apbulkdiscountYes" class="styled apbd_removw" onClick="showTextBox96()" value="Yes">YES</label>
				<label class="checkbox-inline">
					<input type="radio" class="styled apbd_removw1" name="apbulkdiscount" id="apbulkdiscountNo" onClick="showTextBox95()" value="No" checked>NO</label>
			</div>
		</div>
		<table class="table testcase">
			
		</table>
		<!--div class="apbulkdiscount" style="display:none;background:#eeeeee;padding:1%;">
			<div class="form-group">
				<label class="control-label col-md-3">&nbsp;</label>
				<div class="col-md-9">
					<div class="table-responsive" style="border:1px solid #ccc;">
						<table class="table">
							<tr>
								<td>Range</td>
								<td>
									<input type="text" value="3" disabled>
								</td>
								<td>To</td>
								<td>
									<input type="text" value="4" disabled>
								</td>
								<td>
									<input type="text" value="" class="afterpromo_discount1" disabled>
								</td>
							</tr>
							<tr>
								<td>Range</td>
								<td>
									<input type="text" value="5" disabled>
								</td>
								<td>To</td>
								<td>
									<input type="text" value="6" disabled>
								</td>
								<td>
									<input type="text" value="" disabled>
								</td>
							</tr>
							<tr>
								<td>Range</td>
								<td>
									<input type="text" value="7" disabled>
								</td>
								<td>To</td>
								<td>
									<input type="text" value="8" disabled>
								</td>
								<td>
									<input type="text" value="" disabled>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div-->
		<script>
			$('.').click(function() {
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
			
			$("#discount_unit_percent").click(function() {
				$(".apdiscountrate").val("");
				$(".afterpromo_discount").val("");
			});
			$("#discount_unit_dollor").click(function() {
				$(".apdiscountrate").val("");
				$(".afterpromo_discount").val("");
			});
			
			function showTextBox96() {
				$(".testcase").show();
			}

			function showTextBox95() {
				$(".testcase").hide();
			}
			$(function() {
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
												  
								var type = $("input[name='apdiscountunit']:checked").val()
                                    if (type == 'PERCENT') 
									{
										var wrapper = $(".testcase");									
										for (var i = 0; i < values.length; i++) {
										var r2 = parseInt(values[i]) + 1;
					var dis1 = $("input[class='discountrate']").map(function(){return $(this).val();}).get();
								  
					var disrate = parseFloat($('.apdiscountrate').val());
					var fi1 = dis1[i] - dis1[i] * disrate / 100;
										$(wrapper).append('<label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td>Range</td><td><input type="text" value="'+values[i]+'" readonly></td><td>To</td><td><input type="text" value="'+r2+'" readonly></td><td><input type="text" value="'+fi1+'" name="apbdl[]" readonly></td></tr></table></div></div>');
										}
									}
									else
									{
										var wrapper = $(".testcase");									
										for (var i = 0; i < values.length; i++) {
										var r2 = parseInt(values[i]) + 1;
					var dis1 = $("input[class='discountrate']").map(function(){return $(this).val();}).get();
								  
					var disrate = parseFloat($('.apdiscountrate').val());
					var fi1 = dis1[i] - disrate;
										$(wrapper).append('<label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td>Range</td><td><input type="text" value="'+values[i]+'" readonly></td><td>To</td><td><input type="text" value="'+r2+'" readonly></td><td><input type="text" value="'+fi1+'" name="apbdl[]" readonly></td></tr></table></div></div>');
										}
									}			  
									
							}
						}
					}
						
				});
			});
			
			
			/* $(".apdiscountrate").keyup(function() {
				var values = $("input[class='startrange']").map(function(){return $(this).val();}).get();
				
				var wrapper = $(".testcase");
				var j=0;				
				for (var i = 0; i < values.length; i++) {
				var r2 = parseInt(values[i]) + 1;
				
				var dis1 = $("input[class='discountrate']").map(function(){return $(this).val();}).get();
							  
				var disrate = parseFloat($('.apdiscountrate').val());
				var fi1 = dis1[j] - dis1[j] * disrate / 100;
				//$('.afterpromo_discount1').val(fi1);
				
				$(wrapper).append('<label class="control-label col-md-3"></label><div class="col-md-9"><div class="col-md-12"><table class="table" style="background: lightblue;"><tr><td>Range</td><td><input type="text" value="'+values[i]+'" disabled></td><td>To</td><td><input type="text" value="'+r2+'" disabled></td><td><input type="text" value="'+fi1+'" class="afterpromo_discount1" disabled></td></tr></table></div></div>');

				j++;
				}
				
				//var dis2 = parseFloat($('.discountrate').val());
				//var amt2 = parseFloat($('.apdiscountrate').val());

				//var final_amt2 = dis2 * amt2 / 100;
				//var dis_rate2 = dis2 - final_amt2;

				//var final_amt = amt - dis_rate;
				
			}); */
		</script>





                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Optional Services : </b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <label class="checkbox-inline" style="padding-left:0px;">
                                                                        <input type="radio" name="optionalservices1" class="styled" value="YES" onClick="showTextBox94()">YES</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="optionalservices1" onClick="showTextBox93()" value="No" checked>NO</label>
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
                                                                        <input type="text" name="services[]" style="width:200px" /> 
																		Price :
                                                                        <input type="number" name="price_of_service[]" style="width:170px" />
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


                                                        </fieldset>
                                                        <!--fieldset title="2">
		<legend class="text-semibold">Pricing Options</legend>
			
	</fieldset-->
                                                        <fieldset title="3">
                                                            <legend>Other Details</legend>
															
                                                            <div class="form-group">
                                                                <label class="control-label col-md-12" style="color: #ff5722;"><b>OTHER INFORMATION TO DISPLAY: </b>
                                                                </label>
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
															
                                                        </fieldset>
                                                        <!--fieldset title="3">
		<legend class="text-semibold">Other Details</legend>
		
	</fieldset-->

                                                        <!--button type="submit" class="btn btn-primary stepy-finish">Submit <i class="icon-check position-right"></i></button-->
                                                        <input type="submit" name="submit_DCleisure_data" value="Add" class="btn btn-success">
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
						'startrange': {
                            required: 'field is requerid!'
                        },
                    }
                });

            });
        </script>