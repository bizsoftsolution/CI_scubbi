<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Cancellation Policies</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Assign To Product</h2>
            <div style="text-align:right;">
              
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
            <div class="col-md-1"></div>
            <div class="col-md-10">
               <br>
               
			   
               <form name="add" method="POST" action="<?php echo  base_url();?>DCpolicies/updateProduct" class="form-horizontal form-validate-jquery" 
			   enctype="multipart/form-data">
                  <div class="form-body">
			 <div class="form-group">
                             <input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="id"/>
						<div class="row">
							<div class="col-md-7">
								<label class="control-label col-md-5"><b>Category</b></label>
								<div class="col-md-7">
								   <select class="form-control selectboxit selectbox-bootstrap btn-warning enabled btn legitRipple" name="tab" id="scountry" >
										<option label="Select Product"></option>
                                                                                <option value="tbl_dcleisure">Leisure Product</option>
                                                                                <option value="tbl_dcpackage">Package Product</option>
                                                                                <option value="tbl_dccourses">Courses Product</option>
                                                                               
										
									</select>
								   <span class="help-block"></span>
								</div>
							</div>
								<div class="col-md-5">
								<label class="control-label col-md-4"><b>Product List</b></label>
								<div class="col-md-8">
									<select class="select-size-lg" name="product_name[]" id="islands" multiple="multiple">
										<option label="Select Product"></option>
									</select> 
								   <span class="help-block"></span>
								</div>
							</div>
						   
						</div>                      
                     </div>
					 <script src="<?php echo base_url(); ?>assets/autochange/jquery.min.js"></script>
<script type="text/javascript">// <![CDATA[
				 $(document).ready(function(){
				 $('#scountry').change(function(){ //any select change on the dropdown with id country trigger this code
				 $("#islands > option").remove(); //first of all clear select items
				 var country_id = $('#scountry').val(); // here we are taking country id of the selected one.
				 $.ajax({
				 type: "POST",
                                 dataType: "json",
				 url: "<?php echo base_url(); ?>DCpolicies/fetchProduct/"+country_id, //here we are calling our user controller and get_cities method with the country_id
				 
				 success: function(cities) //we're calling the response json array 'cities'
				 {
                                     
                                  
                                 $.each(cities, function(i, p) {
				
				 var opt = $('<option />'); // here we're creating a new select option with for each city
				 opt.val(i);
				 opt.text(p);
				 $('#islands').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
                                  
				 });
				 }
				 
				 });
				 
				 });
				 });
				 </script>

					 
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="update_bookig_product" value="Add" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
			  
               <br><br>
            </div>
			 <div class="col-md-1"></div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
