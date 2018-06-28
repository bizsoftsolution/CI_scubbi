<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Plan</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Plan</h2>
            <div style="text-align:right;">
               <a class="btn bg-violet" href="<?php echo  base_url();?>Plan/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>Plan/planList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
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
               <form name="add"   method="POST" action="<?php echo  base_url();?>Plan/editData/<?php echo $row->daily_plan;?>" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-body">
					 <div class="form-group">
                        <label class="control-label col-md-4">Image</label>
						<div class="col-md-3">
						<img src="<?php echo base_url(); ?>upload/plan/<?php echo $row->image; ?>" class="img-responsive" style="width:180px; height:100px;">
						 <input name="edit_plan_image" class="form-control" type="file">
						 <input type="submit" name="update_plan_image" value="Update" class="btn btn-success">
						</div>
                     </div>
				  </div>
				</form>	
				<hr>
				<h3 style="color: #2196f3;font-weight: bold;">Update Contents</h3>
				<hr>
				<form name="add"   method="POST" action="<?php echo  base_url();?>Plan/editData/<?php echo $row->daily_plan;?>" 
				class="form-horizontal">
                  <div class="form-body">
					  <div class="form-group">
                        <label class="control-label col-md-3">Country</label>
                        <div class="col-md-9">
							<select class="select-category form-control" name="update_scountry" id="scountry">
								<?php 
								$cvall = $row->country_id;
								$data1=$this->db->get_where('tbl_country', array('country_id'=>$cvall))->result();
								foreach($data1 as $cval)
								{
								?>
								<option value="<?php echo $cval->country_id; ?>"><?php echo $cval->country_name; ?></option>
								<?php
								}
								?>
								<option value="">--------------------------------------------------------------------</option>
								<option> Select Country </option>
								<option value="">--------------------------------------------------------------------</option>
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
					 
					 <div class="form-group">
                        <label class="control-label col-md-3">Island Name</label>
                        <div class="col-md-9">
                           <select class="select-category form-control" name="update_islands" id="islands">
								<?php 
								$ivall = $row->island_id;
								$data2=$this->db->get_where('tbl_island', array('island_id'=>$ivall))->result();
								foreach($data2 as $ival)
								{
								?>
								<option value="<?php echo $ival->island_id; ?>"><?php echo $ival->island_name; ?></option>
								<?php
								}
								?>
								<option value="">--------------------------------------------------------------------</option>
								<option value="0"> Select island </option>
								<option value="">--------------------------------------------------------------------</option>
							</select>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Per Day Amount</label>
                        <div class="col-md-9">
                           <input name="edit_plan_PDA" class="form-control" type="text" value="<?php echo $row->per_day_amount; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Popular Dive Destination</label>
                        <div class="col-md-9">
							<select class="select-category form-control" name="edit_plan_PDD">
								<option value="<?php echo $row->popular_dive_destination; ?>"><?php echo $row->popular_dive_destination; ?></option>
								<option>--------------------------------------------------------------------</option>
								<option value="0"> Select Option </option>
								<option>--------------------------------------------------------------------</option>
								<option value="Yes"> Yes </option>
								<option value="No"> No </option>
							</select>
                           <!--input name="edit_plan_PDD" class="form-control" type="text" value="<?php echo $row->popular_dive_destination; ?>">
                           <span class="help-block"></span-->
                        </div>
                     </div>
					 
                  </div>
				   <div style="text-align:center">
                     <input type="submit" name="update_plan" value="Update" class="btn btn-success">
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
   