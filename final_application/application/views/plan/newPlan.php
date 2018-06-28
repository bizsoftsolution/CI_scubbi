<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
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
            <div class="col-md-1"></div>
            <div class="col-md-10">
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
                  <strong>Success !!! </strong> New Data Created successfully
               </div>
               <?php 
			   //redirect(base_url().'slider/sliderList');
			   } ?>
			   
               <form name="add" method="POST" action="<?php echo  base_url();?>Plan/addNew" class="form-horizontal form-validate-jquery" 
			   enctype="multipart/form-data">
                  <div class="form-body"> 
					 <div class="form-group">
                        <label class="control-label col-md-3">Country Name</label>
                        <div class="col-md-9">
							<select class="select-category form-control" name="scountry" id="scountry">
								<option> Select Country </option>
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
                           <select class="select-category form-control" name="plan_island" id="islands">
								<option value="0"> Select island </option>
							</select>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Per Day Amount</label>
                        <div class="col-md-9">
                           <input name="plan_perdayamount" class="form-control" type="text" required="">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Image</label>
                        <div class="col-md-9">
						   <input type="file" class="file-styled form-control" name="plan_image" required="">
							<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Popular Dive Destinations</label>
                        <div class="col-md-9">
							<select class="select-category form-control" name="plan_pdd">
								<option value="0"> Select Option </option>
								<option value="Yes"> Yes </option>
								<option value="No"> No </option>
								
							</select>
                           <!--input type='checkbox' name='plan_pdd' /-->
                           <span class="help-block">Note : Yes Meant display image popular Destination</span>
						   
                        </div>
                     </div>
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="submit_plan_data" value="Add" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
			   <!--script src="<?php echo base_url(); ?>assets/checkbox/bootstrap-switch.js"></script-->
				<!--script>
					$("[name='plan_pdd']").bootstrapSwitch({
					  on: 'Yes',
					  off: 'No',
					  onLabel: '&nbsp;&nbsp;&nbsp;',
					  offLabel: '&nbsp;&nbsp;&nbsp;',
					  same: false,//same labels for on/off states
					  size: 'md',
					  onClass: 'success',
					  offClass: 'danger'
					});
					//http://www.jqueryscript.net/form/Simple-Toggle-Switch-Plugin-With-jQuery-Bootstrap-Bootstrap-Switch.html
				</script-->
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
               <br><br>
            </div>
			 <div class="col-md-1"></div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
