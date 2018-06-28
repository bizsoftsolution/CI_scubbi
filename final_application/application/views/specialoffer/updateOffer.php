<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
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
            <h2 class="panel-title">Special Offer Details</h2>
            <div style="text-align:right;">
               <a class="btn bg-violet" href="<?php echo  base_url();?>Specialoffer/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>Specialoffer/offerList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
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
               <form name="add"   method="POST" action="<?php echo  base_url();?>Specialoffer/editData/<?php echo $row->special_offer_id;?>" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-body">
					 <div class="form-group">
                        <label class="control-label col-md-4">Offer Image</label>
						<div class="col-md-3">
						<img src="<?php echo base_url(); ?>upload/specialoffer/<?php echo $row->offer_image; ?>" class="img-responsive" style="width:180px; height:100px;">
						 <input name="edit_offer_image" class="form-control" type="file">
						 <input type="submit" name="update_spl_offer_image" value="Update" class="btn btn-success">
						</div>
                     </div>
				  </div>
				</form>	
				<hr>
				<h3 style="color: #2196f3;font-weight: bold;">Update Contents</h3>
				<hr>
				<form name="add"   method="POST" action="<?php echo  base_url();?>Specialoffer/editData/<?php echo $row->special_offer_id;?>" 
				class="form-horizontal">
                  <div class="form-body">
					  
					 <div class="form-group">
                        <label class="control-label col-md-3">Offer Period</label>
                        <div class="col-md-9">
                           <input name="edit_spl_offer_period" class="form-control" type="text" value="<?php echo $row->offer_period; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Price</label>
                        <div class="col-md-9">
                           <input name="edit_spl_offer_price" class="form-control" type="text" value="<?php echo $row->price; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Starting Place</label>
                        <div class="col-md-9">
							<select class="select-category form-control" name="edit_spl_offer_start_place">
								<?php 
								$isp = $row->starting_place_id;
								$isp_result=$this->db->get_where('tbl_island', array('island_id'=>$isp))->result();
								foreach($isp_result as $isprow)
								{
								?>
								<option value="<?php echo $isprow->island_id; ?>"><?php echo $isprow->island_name; ?></option>
								<?php
								}
								?>
								<option value="">--------------------------------------------------------------------</option>
								<option value="0"> Select Island Starting </option>
								<option value="">--------------------------------------------------------------------</option>
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
							<select class="select-category form-control" name="edit_spl_offer_end_place">
								<?php 
								$iep = $row->destination_place_id;
								$iep_result=$this->db->get_where('tbl_island', array('island_id'=>$iep))->result();
								foreach($iep_result as $ieprow)
								{
								?>
								<option value="<?php echo $ieprow->island_id; ?>"><?php echo $ieprow->island_name; ?></option>
								<?php
								}
								?>
								<option value="">--------------------------------------------------------------------</option>
								<option value="0"> Select Island Destination </option>
								<option value="">--------------------------------------------------------------------</option>
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
                           <input name="edit_spl_offer_start_km" class="form-control" type="text" value="<?php echo $row->start_km; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Dive Center Name</label>
                        <div class="col-md-9">
							<select class="select-category form-control" name="edit_spl_offer_dcn">
								<?php 
								$idcn = $row->dive_center_id;
								$idcn_result=$this->db->get_where('dive_center', array('dive_center_id'=>$idcn))->result();
								foreach($idcn_result as $idcnrow)
								{
								?>
								<option value="<?php echo $idcnrow->dive_center_id; ?>"><?php echo $idcnrow->center_name; ?></option>
								<?php
								}
								?>
								<option value="">--------------------------------------------------------------------</option>
								<option value="0"> Select Dive Center Name </option>
								<option value="">--------------------------------------------------------------------</option>
								<?php 
								$E_dcn=$this->db->get('dive_center')->result_array();
								foreach ($E_dcn as $edcn) {?>
								<option value="<?php echo $edcn['dive_center_id'];?>"><?php echo $edcn['center_name'];?></option> 
								<?php
								}
								?>
							</select>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Notes</label>
                        <div class="col-md-9">
							<textarea name="edit_spl_offer_notes" class="form-control" id="editor-full" ><?php echo $row->note; ?></textarea>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 
					 
                  </div>
				   <div style="text-align:center">
                     <input type="submit" name="update_special_offer" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
			   <!--CKeditor-->
				<script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js');?>"></script>
				<script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
				<script type="text/javascript" src="<?php echo base_url('assets/js/pages/editor_ckeditor.js');?>"></script>
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
   