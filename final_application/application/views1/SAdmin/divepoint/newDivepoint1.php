

<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Dive Points</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Dive Points</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>SAslider/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>SAdivepoint" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->

            <div class="col-md-12">
               <br>
               <br>
               <?php if($message == "FAILED") { ?>
               <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Action Failed !!! </strong>
               </div>
               <?php } else if($message == "SUCCESS") {  ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success !!! </strong> New Slider Created successfully
               </div>
               <?php 
			   //redirect(base_url().'slider/sliderList');
			   } ?>
               <form name="add" method="POST" action="<?php echo  base_url();?>SAdivepoint/addNew" class="form-horizontal form-validate-jquery" 
			   enctype="multipart/form-data">
                  <div class="form-body">
					<div class="form-group">
						 <label class="control-label col-md-3">Country</label>
						 <div class="col-md-9">
							<select class="form-control" name="scountry" id="scountry" required="">
								<option label="Select Country">Select Country</option>
								<?php $data=$this->db->get('tbl_country')->result_array(); foreach ($data as $a) {
									$country_active = $a['is_deactivate'];
									if($country_active == "N")
									{
									?>
								<option value="<?php echo $a['country_id'];?>">
									<?php echo $a[ 'country_name'];?>
								</option>
								<?php 
								}
								} ?>
							</select>
						 </div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3">Islands</label>
						<div class="col-md-9">
						<?php $cities[ '#']='Please Select' ; 
						$attr=array( 'id'=>'islands', 'class'=>'form-control', 'name'=>'islands'); ?>
						<?php echo form_dropdown($attr, 'Select islands'); ?>
						</div>
					</div>
					<div class="form-group">
                        <label class="control-label col-md-3">Overview</label>
                        <div class="col-md-9">
                           <textarea class="form-control" name="overview"></textarea>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Current</label>
                        <div class="col-md-9">
                           <input name="current" class="form-control" type="text">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Underwater</label>
                        <div class="col-md-9">
                           <input name="underwater" class="form-control" type="text">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Depth</label>
                        <div class="col-md-9">
                           <input name="depth" class="form-control" type="text">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">Water Temperature</label>
                        <div class="col-md-9">
                           <input name="watertemperature" class="form-control" type="text">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3">Diving Season</label>
                        <div class="col-md-9">
                           <input name="divingseason" class="form-control" type="text">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">What to Use</label>
                        <div class="col-md-9">
                           <input name="whattouse" class="form-control" type="text">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Coords X</label>
                        <div class="col-md-9">
                           <input name="coords_x" class="form-control" type="text">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Coords Y</label>
                        <div class="col-md-9">
                           <input name="coords_y" class="form-control" type="text">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3"><b>Image</b></label>
                        <div class="col-md-9">
							<div id="filediv"><input name="file[]" type="file" id="file"/></div>
							<input type="button" id="add_more" class="upload" value="Add More Files"/>
                           <!--input name="file" class="form-control file-styled" type="file" required=""-->
                           <span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>
                     </div>
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="submit_divepoint_data" value="Add" class="btn btn-success" id="upload">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
				<script src="<?php echo base_url(); ?>assets/autochange/jquery.min.js"></script>
				<script type="text/javascript">
					// <![CDATA[
					$(document).ready(function() {
							   $('#scountry').change(function() { //any select change on the dropdown with id country trigger this code
							//	alert("dhngfdhg");
							$("#islands > option").remove(); //first of all clear select items
							var country_id = $('#scountry').val(); // here we are taking country id of the selected one.
							$.ajax({
								type: "POST",
								url: "<?php echo base_url(); ?>front/get_island/" + country_id, //here we are calling our user controller and get_cities method with the country_id

								success: function(cities) //we're calling the response json array 'cities'
									{
										$.each(cities, function(id, city) //here we're doing a foeach loop round each city with id as the key and city as the value
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
					// ]]>
				</script>
               <br><br>
            </div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
