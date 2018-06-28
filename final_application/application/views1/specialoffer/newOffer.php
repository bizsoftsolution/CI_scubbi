<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Special Offer</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Special Offer</h2>
            <div style="text-align:right;">
               <a class="btn bg-violet" href="<?php echo  base_url();?>Specialoffer/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>Specialoffer/offerList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
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
			   
               <form name="add" method="POST" action="<?php echo  base_url();?>Specialoffer/addNew" class="form-horizontal form-validate-jquery" 
			   enctype="multipart/form-data">
                  <div class="form-body1">
                     <div class="form-group">
                        <label class="control-label col-md-3">Offer Image</label>
                        <div class="col-md-9">
						   <input type="file" class="file-styled form-control" name="spl_offer_image" required="">
							<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>
                     </div>
					 
					 
					 <div class="form-group">
                        <label class="control-label col-md-3">Offer Period</label>
                        <div class="col-md-9">
                           <input name="spl_offer_period" class="form-control" type="text" required="">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Price</label>
                        <div class="col-md-9">
                           <input name="spl_offer_price" class="form-control" type="text" required="">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Starting Place</label>
                        <div class="col-md-9">
						   <select name="spl_offer_start_place" class="form-control">
								<option value="0"> Select Island Starting </option>
								<?php 
									$S_island=$this->db->get('tbl_island')->result_array();
									foreach ($S_island as $si) {?>
								   <option value="<?php echo $si['island_id'];?>"><?php echo $si['island_name'];?></option> 
								   <?php
									}
								  ?>
						   </select>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Destination Place</label>
                        <div class="col-md-9">
						   <select name="spl_offer_end_place" class="form-control">
								<option value="0"> Select Island Destination </option>
								<?php 
									$E_island=$this->db->get('tbl_island')->result_array();
									foreach ($E_island as $ei) {?>
								   <option value="<?php echo $ei['island_id'];?>"><?php echo $ei['island_name'];?></option> 
								   <?php
									}
								  ?>
						   </select>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Start KM</label>
                        <div class="col-md-9">
                           <input name="spl_offer_start_km" class="form-control" type="text" required="">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Dive Center Name</label>
                        <div class="col-md-9">
							<select name="spl_offer_dcn" class="form-control">
								<option value="0"> Select Dive Center Name </option>
								<?php 
									$E_dcn=$this->db->get('dive_center')->result_array();
									foreach ($E_dcn as $edcn) {?>
								   <option value="<?php echo $edcn['dive_center_id'];?>"><?php echo $edcn['center_name'];?></option> 
								   <?php
									}
								  ?>
						   </select>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Notes</label>
                        <div class="col-md-9">
							<textarea name="spl_offer_notes" class="form-control" id="editor-full" ></textarea>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="submit_special_offer" value="Add" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
			   	<!--CKeditor-->
				<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js');?>"></script>
				<script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
				<script type="text/javascript" src="<?php echo base_url('assets/js/pages/editor_ckeditor.js');?>"></script>
	
				
               <br><br>
            </div>
			 <div class="col-md-1"></div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
