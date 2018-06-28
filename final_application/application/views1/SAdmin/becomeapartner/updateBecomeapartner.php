<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Become a Partner</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Become a Partner</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>SAslider/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>SAbecomeapartner" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
            <!--div class="col-md-2"></div-->
            <div class="col-md-12">
               <br>
          
               <?php foreach($getapprovelData as $row){?>
				<div class="responsive-table">
					<form name="add" method="POST" action="<?php echo  base_url();?>SAbecomeapartner/approvelData/<?php echo $row->id;?>" 
					class="form-horizontal form-validate-jquery" enctype="multipart/form-data">
					<table class="table table-bordered table-striped">
						<tr><th>Dive Center Name</th><td>
						<input type="hidden" value="<?php echo $row->dive_center_name; ?>" name="dive_center_name"><?php echo $row->dive_center_name; ?></td></tr>
						<tr><th>Contact Person</th><td>
						<input type="hidden" value="<?php echo $row->contact_person; ?>" name="contact_person">
						<?php echo $row->contact_person; ?></td></tr>
						<tr><th>Business Registration No</th><td>
						<input type="hidden" value="<?php echo $row->business_registration_no; ?>" name="business_registration_no">
						<?php echo $row->business_registration_no; ?></td></tr>
						<tr><th>Country</th>
						<td>
						
						<?php 
						$country = $this->db->get_where('tbl_country', array('country_id'=>$row->country))->result();
						foreach($country as $res_country)
						{
						echo '<input type="hidden" value="'.$res_country->country_name.'" name="country_name">';
						echo $res_country->country_name; 
						}
						?></td>
						</tr>
						<tr><th>Island</th><td>
						<?php 
						$island = $this->db->get_where('tbl_island', array('island_id'=>$row->island))->result();
						foreach($island as $res_island)
						{
						echo '<input type="hidden" value="'.$res_island->island_name.'" name="island_name">';
						echo $res_island->island_name; 
						}
						?></td></tr>
						<tr><th>Email ID</th><td>
						<input type="hidden" value="<?php echo $row->email_address; ?>" name="email_address">
						<?php echo $row->email_address; ?></td></tr>
						<tr><th>Phone No</th><td>
						<input type="hidden" value="<?php echo $row->phone_no; ?>" name="phone_no">
						<?php echo $row->phone_no; ?></td></tr>
						<tr><th>Status</th><td>
							<?php 
								if($row->status == "APPROVED")
								{
							?>
							<select name="status_update" class="form-control">
								<option >-- Select status --</option>
								<option value="APPROVED" selected>Approved</option>
								<option value="PENDING">Pending</option>
								<option value="DECLINED">Declined</option>
							</select>
							<?php 
								}
								elseif($row->status == "PENDING")
								{
							?>
								<select name="status_update" class="form-control">
								<option >-- Select status --</option>
								<option value="APPROVED" >Approved</option>
								<option value="PENDING" selected>Pending</option>
								<option value="DECLINED">Declined</option>
							</select>
							<?php
								}
								elseif($row->status == "DECLINED")
								{
							?>
								<select name="status_update" class="form-control">
								<option >-- Select status --</option>
								<option value="APPROVED">Approved</option>
								<option value="PENDING">Pending</option>
								<option value="DECLINED" selected>Declined</option>
							</select>
							<?php
								}
								else
								{
							?>
								<select name="status_update" class="form-control">
								<option >-- Select status --</option>
								<option value="APPROVED">Approved</option>
								<option value="PENDING">Pending</option>
								<option value="DECLINED">Declined</option>
							</select>
							<?php
								}
							?>
						</td></tr>
						<tr><td colspan="2">
						<div style="text-align:right">
							 <input type="submit" name="update_Approved_data" value="Update" class="btn btn-success">
						 </div>
						</td></tr>
					</table>
					</form>
				</div>
				<!--form name="add" method="POST" action="<?php echo  base_url();?>SAbecomeapartner/approvelData/<?php echo $row->id;?>" class="form-horizontal form-validate-jquery" 
			   enctype="multipart/form-data">
                  <div class="form-body">
					<div class="form-group">
                        <label class="control-label col-md-3">Dive Center Name</label>
                        <div class="col-md-9">
                           <textarea class="form-control" name="tellme_overview" rows="7"><?php echo $row->overview; ?></textarea>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Contact Person</label>
                        <div class="col-md-9">
                           <input name="current" class="form-control" type="text" value="<?php echo $row->current; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">Business Registration No</label>
                        <div class="col-md-9">
                           <input name="watertemperature" class="form-control" type="text" value="<?php echo $row->water_temperature; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">Country</label>
                        <div class="col-md-9">
                           <input name="underwater" class="form-control" type="text" value="<?php echo $row->underwater_visibility; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					  <div class="form-group">
                        <label class="control-label col-md-3">Island</label>
                        <div class="col-md-9">
                           <input name="divingseason" class="form-control" type="text" value="<?php echo $row->diving_season; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Email ID</label>
                        <div class="col-md-9">
                           <input name="divingsites" class="form-control" type="text" value="<?php echo $row->diving_sites; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3">Phone No</label>
                        <div class="col-md-9">
                           <input name="divingcenters" class="form-control" type="text" value="<?php echo $row->diving_centers; ?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
						
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="update_tellmemore_data" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form-->
               <?php } ?>
               <br><br>
            </div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
   