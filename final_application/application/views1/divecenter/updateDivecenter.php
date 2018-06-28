<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Dive Center</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Dive Center Details</h2>
            <div style="text-align:right;">
               <a class="btn bg-violet" href="<?php echo  base_url();?>Divecenter/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>Divecenter/divecenterList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
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
			   <h3 style="color: #e91e63;font-weight: bold;">Update Image</h3>
			   <hr>
               <form name="add"   method="POST" action="<?php echo  base_url();?>Divecenter/editData/<?php echo $row->dive_center_id;?>" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-body">
					 <div class="form-group">
                        <label class="control-label col-md-4">Offer Image</label>
						<div class="col-md-3">
						<img src="<?php echo base_url(); ?>upload/dive_center/<?php echo $row->center_image; ?>" class="img-responsive" style="width:180px; height:100px;">
						 <input name="edit_divecenter_image" class="form-control" type="file">
						 <input type="submit" name="update_dive_center_image" value="Update" class="btn btn-success">
						</div>
                     </div>
				  </div>
				</form>	
				<hr>
				<h3 style="color: #2196f3;font-weight: bold;">Update Contents</h3>
				<hr>
				<form name="add"   method="POST" action="<?php echo  base_url();?>Divecenter/editData/<?php echo $row->dive_center_id;?>" 
				class="form-horizontal">
                  <div class="form-body">
					 <div class="form-group">
                        <label class="control-label col-md-3">Center Name</label>
                        <div class="col-md-9">
                           <input name="edit_dive_center_name" class="form-control" type="text" value="<?php echo $row->center_name; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Address1</label>
                        <div class="col-md-9">
                           <input name="edit_dive_center_address1" class="form-control" type="text" value="<?php echo $row->address1; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Address2</label>
                        <div class="col-md-9">
                           <input name="edit_dive_center_address2" class="form-control" type="text" value="<?php echo $row->address2; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">City</label>
                        <div class="col-md-9">
                           <input name="edit_dive_center_city" class="form-control" type="text" value="<?php echo $row->city; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">State</label>
                        <div class="col-md-9">
                           <input name="edit_dive_center_state" class="form-control" type="text" value="<?php echo $row->state; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Country</label>
                        <div class="col-md-9">
                           <select class="select-category form-control" name="edit_dive_center_country" id="scountry">
								<?php 
								$isp = $row->country_id;
								$isp_result=$this->db->get_where('tbl_country', array('country_id'=>$isp))->result();
								foreach($isp_result as $isprow)
								{
								?>
								<option value="<?php echo $isprow->country_id; ?>"><?php echo $isprow->country_name; ?></option>
								<?php
								}
								?>
								<option value="">--------------------------------------------------------------------</option>
								<option value="0"> Select Country </option>
								<option value="">--------------------------------------------------------------------</option>
								<?php 
									$S_island=$this->db->get('tbl_country')->result_array();
									foreach ($S_island as $si) 
									{
										?>
								   <option value="<?php echo $si['country_id'];?>"><?php echo $si['country_name'];?></option> 
								   <?php
									}
								?>
							</select>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Island</label>
                        <div class="col-md-9">
							<select class="select-category form-control" name="edit_dive_center_island" id="islands">
								<?php 
								$iep = $row->island_id;
								$iep_result=$this->db->get_where('tbl_island', array('island_id'=>$iep))->result();
								foreach($iep_result as $ieprow)
								{
								?>
								<option value="<?php echo $ieprow->island_id; ?>"><?php echo $ieprow->island_name; ?></option>
								<?php
								}
								?>
								<option value="">--------------------------------------------------------------------</option>
								<option value="0"> Select Island </option>
								<option value="">--------------------------------------------------------------------</option>
								
							</select>
                           
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">Contact Person Name</label>
                        <div class="col-md-9">
                           <input name="edit_dive_center_cpn" class="form-control" type="text" value="<?php echo $row->contact_person_name; ?>">
                          
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Contact Number</label>
                        <div class="col-md-9">
                           <input name="edit_dive_center_cn" class="form-control" type="text" value="<?php echo $row->contact_no; ?>">
                           
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">Email ID</label>
                        <div class="col-md-9">
                           <input name="edit_dive_center_emailid" class="form-control" type="email" value="<?php echo $row->email_id; ?>">
                           
                        </div>
                     </div>
                  </div>
				   <div style="text-align:center">
                     <input type="submit" name="update_dive_center" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
				<script src="<?php echo base_url(); ?>assets/autochange/jquery.min.js"></script>
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
   