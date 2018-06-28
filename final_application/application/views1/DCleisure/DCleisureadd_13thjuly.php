<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/stepywizerd/css/jquery.stepy.css'); ?>" />
<!-- Optionaly -->

<!--script type="text/javascript" src="<?php echo base_url('assets/stepywizerd/js/jquery.validate.min.js1'); ?>"></script>

			<script type="text/javascript" src="<?php echo base_url('assets/stepywizerd/js/jquery.stepy.min.js1'); ?>"></script-->

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
                                                                    <textarea name="description" class="form-control" id="editor-full1" data-popup="tooltip" title="Product Description(It is required field)" data-placement="bottom" required></textarea>
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Product Includes</b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <input name="productincludes1" class="form-control" type="text" data-placement="bottom">
                                                                    <span class="help-block"></span>
                                                                </div>
                                                            </div>
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
                                                                                <input type="checkbox" class="styled" name="display" value="TRUE" checked>Display</label>
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
                                                                        <input type="radio" class="styled" name="productunits" value="Dive" onClick="showTextBox1()" />Dive</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="productunits" value="Pax" onClick="showTextBox1()" />Pax</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="productunits" value="Trip" onClick="showTextBox1()" />Trip</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="productunits" onClick="showTextBox()" />OTHERS</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="text" name="productunits" class="textBox" hidden class="form-control" />
                                                                    </label>
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
                                                                    <input name="maxdiveday" class="form-control" type="number" data-popup="tooltip" title="Max Dive(It is required field)" data-placement="bottom" required="">
                                                                    <span class="help-block"></span>
                                                                </div>
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
                                                                <label class="control-label col-md-3"><b>Product Price : MYR</b>
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
                                                                                <input type="text" name="endrange[]" style="width:50px;" class="endrange" value="0"  /> DISCOUNT RATE :
                                                                                <input type="text" name="field_name[]" value="" style="width:50px;" class="field_name" />
                                                                                <input type="text" name="discount_bulk_purchase_amount[]" class="discountrate" style="width:50px;" >
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
                                                                    var fieldHTML = '<div><input type="text" name="startrange[]" style="width:50px;" class="startrange"> TO <input type="text" name="endrange[]" style="width:50px;" class="endrange"  > DISCOUNT RATE : <input type="text" class="field_name" name="field_name[]" value="" style="width:50px;"/><input type="text" class="discountrate" style="width:50px;" name="discount_bulk_purchase_amount[]" ><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-remove" style="color:red;font-size:20px;"></i></a></div>'; //New input field html 
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
                                                                        <input name="afterpromo_discount" class="form-control" id="afterpromo_discount" type="text" >
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

                                                                $("#apdiscountrate").keyup(function() {
                                                                    var dis1 = parseFloat($('.product_price').val());
                                                                    var amt1 = parseFloat($('#apdiscountrate').val());

                                                                    var final_amt1 = dis1 * amt1 / 100;
                                                                    var dis_rate1 = dis1 - final_amt1;

                                                                    //var final_amt = amt - dis_rate;
                                                                    $('#afterpromo_discount').val(dis_rate1);
                                                                });
                                                            </script>
                                                            <div class="form-group disable_promodiscount">
                                                                <label class="control-label col-md-3"><b>Apply Promo for <br>Bulk Discount? </b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <label class="checkbox-inline" style="padding-left:0px;">
                                                                        <input type="radio" name="apbulkdiscount" class="styled" onClick="showTextBox96()">YES</label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="radio" class="styled" name="apbulkdiscount" onClick="showTextBox95()" value="No">NO</label>
                                                                </div>
                                                            </div>
                                                            <div class="apbulkdiscount" style="display:none;background:#eeeeee;padding:1%;">
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
                                                            </div>
                                                            <script>
                                                                function showTextBox96() {
                                                                    $(".apbulkdiscount").show();
                                                                }

                                                                function showTextBox95() {
                                                                    $(".apbulkdiscount").hide();
                                                                }

                                                                $(".apdiscountrate").keyup(function() {
                                                                    var dis2 = parseFloat($('.field_name').val());
                                                                    var amt2 = parseFloat($('.apdiscountrate').val());

                                                                    var final_amt2 = dis2 * amt2 / 100;
                                                                    var dis_rate2 = dis2 - final_amt2;

                                                                    //var final_amt = amt - dis_rate;
                                                                    $('.afterpromo_discount1').val(dis_rate2);
                                                                });
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

                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Diver Certification</b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <div class="row">
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="styled" name="divercertification[]" value="Non-Diver">NON-DIVER</label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="styled" name="divercertification[]" value="Owd">OWD</label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="styled" name="divercertification[]" value="Aow">AOW</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Diver Experience</b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <div class="row">
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="styled" name="diverexperience[]" value="Novice">NOVICE</label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="styled" name="diverexperience[]" value="Advanced">ADVANCED</label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="styled" name="diverexperience[]" value="Experienced">EXPERIENCED</label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="styled" name="diverexperience[]" value="Non-Diver">NON-DIVER</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3"><b>Diver Specialties</b>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <div class="row">
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="styled" name="diverspecialties[]" value="Altitude Diver">ALTITUDE DIVER</label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="styled" name="diverspecialties[]" value="Cavern Diver">CAVERN DIVER</label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="styled" name="diverspecialties[]" value="Deep Diver">DEEP DIVER</label>
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" class="styled" name="diverspecialties[]" value="Wreck Diver">WRECK DIVER</label>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                    }
                });

            });
        </script>