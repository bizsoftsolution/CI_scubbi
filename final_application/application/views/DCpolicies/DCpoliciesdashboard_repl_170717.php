<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Policies List</li>
   </ul>
</div>
<br>

<div class="row">
   <div class="col-md-12">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Dashboard</h2>
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
					<li class="active"><a href="<?php echo base_url(); ?>DCpolicies/DCpoliciesdashboardlist" >Dashboard</a></li>
					<li ><a href="<?php echo base_url(); ?>DCpolicies/DCpolicieslist" >Booking Policies</a></li>
					<li ><a href="<?php echo base_url(); ?>DCpolicies/DCcancelpolicieslist" >Cancellation Policies</a></li>
				</ul>

				<div class="tab-content">
					<div class="active">
      <!-- Traffic sources -->
			<!--div class="row">
				<!--div class="col-md-6">
					<ul class="nav nav-tabs nav-tabs-bottom bottom-divided">
						<li class="active"><a href="<?php echo base_url(); ?>DCprofile/DCstaffList">Administration Staff</a></li>
						<li><a href="<?php echo base_url(); ?>DCprofile/DCmasterList">Dive Master & Instructor Details</a></li>
					</ul>
				</div->
				<div class="col-md-12">
					<div style="text-align:right;">
					  <a class="btn bg-purple" href="<?php echo  base_url();?>DCleisure/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
              <a href="<?php echo  base_url();?>DCleisure/DCleisurelist" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
				   </div>
				</div>
			</div-->
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
                                <form method="post" action="<?php echo base_url(); ?>DCpolicies/updateProductNew" class="form-horizontal">
                                   	<div class="row">
							<div class="col-md-7">
								<label class="control-label col-md-5"><b>Category</b></label>
								<div class="col-md-7">
								   <select class="form-control selectboxit selectbox-bootstrap btn-warning enabled btn legitRipple" name="tab" id="scountry" >
										<option label="Select Product"></option>
                                                                                <option value="tbl_dcleisure">Leisure Product</option>
                                                                                <option value="tbl_dcpackage">Package Product</option>
                                                                                <option value="tbl_dccourses">Courses Product</option>
                                                                                <option value="tbl_dcguidedtours">Guided Tour</option>
                                                                               
										
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
                                    <h2>Booking Policy</h2>
                                    <table class="table">
                                        <tr>
                                            <th>Select</th>
                                            <th>Sno</th>
                                            <th>Policy Name</th>
                                        </tr> 
                                        <?php
                                            $this->db->select("*");
                                            $this->db->where('user_id',$this->session->userdata('user_id'));
                                            $qu = $this->db->get("tbl_booking_policies")->result_array();
                                        $i=1;
                                            ?>
                                        
                                        <?php foreach($qu as $row){?>
                                        <tr>
                                            <td><input type="radio" name="booking_no" value="<?php echo $row['id']; ?>"/></td>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['booking_name']; ?></td>
                                        </tr>
                                        <?php 
                                        $i++;
                                        }
                                        ?>
                                    </table>
                                <h2>Cancellation Policy</h2>
                                    <table class="table">
                                        <tr>
                                            <th>Select</th>
                                            <th>Sno</th>
                                            <th>Policy Name</th>
                                        </tr> 
                                        <?php
                                            $this->db->select("*");
                                            $this->db->where('user_id',$this->session->userdata('user_id'));
                                            $qu = $this->db->get("tbl_cancellation_policies")->result_array();
                                        $j=1;
                                            ?>
                                        
                                        <?php foreach($qu as $row){?>
                                        <tr>
                                            <td><input type="radio" name="cancellation_no" value="<?php echo $row['id']; ?>"/></td>
                                            <td><?php echo $j;?></td>
                                            <td><?php echo $row['cancellation_name']; ?></td>
                                        </tr>
                                        <?php 
                                        $j++;
                                        }
                                        ?>
                                    </table>
                                <input type="submit" value="ADD POLICY" name="update_bookig_product12" class="btn btn-success"/>
                                </form>
          
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /dashboard content -->


<!-- /dashboard content -->
