<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Bookings</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Booking Details</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>SAslider/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <!--a href="<?php echo  base_url();?>SAtellmemore" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a-->
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
            <!--div class="col-md-2"></div-->
            <div class="col-md-12">
               <br>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>DCleisure/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>SABooking/bookingList" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
          
               <?php foreach($ibooking as $row){?>
				<div class="responsive-table">
					<form name="add" method="POST" action="<?php echo  base_url();?>SABooking/editStatus/<?php echo $row->id;?>" 
					class="form-horizontal form-validate-jquery" enctype="multipart/form-data">
					<table class="table table-bordered table-striped">
						<tr><th>Booking No</th><td>
						<input type="hidden" value="<?php echo $row->booking_no; ?>" name="booking_no"><?php echo $row->booking_no; ?></td></tr>
						<tr><th>Timestamp</th><td>
						<?php echo $row->created; ?></td></tr>
						<tr><th>Check-in</th><td>
						<input type="hidden" value="<?php echo $row->checkin; ?>" name="checkin">
						<?php echo $row->checkin; ?></td></tr>
						<tr><th>Check-out</th><td>
						<input type="hidden" value="<?php echo $row->checkout; ?>" name="checkout">
						<?php echo $row->checkout; ?></td></tr>
						<tr><th>Country / Island</th>
						<td>
						<?php 
						echo '<input type="hidden" value="'.$row->country_name.'" name="country_name">';
						echo '<input type="hidden" value="'.$row->island_name.'" name="island_name">';
						echo $row->country_name . ' / ' . $row->island_name ; 
						?></td>
						</tr>
						<tr><th>Customer Name</th><td>
						<?php echo $row->firstname; ?>&nbsp;<?php echo $row->lastname; ?> <b> [ age: <?php echo $row->age; ?> ]</b> </td></tr>
						<tr><th>Nationality / Language</th><td>
						<?php echo $row->nationality; ?> / <?php echo $row->language; ?></td></tr>
						<tr><th>Diver Card</th><td>
						<img src="<?php echo base_url(); ?>/upload/customerprofile/<?php echo $row->diver_card;?>" width="300" height="150"></td></tr>
						<tr><th>Diver's Skill Level</th><td>
						<?php echo $row->diver_registration_level; ?>, Speciality: <?php echo $row->diver_speciality_skill; ?></td></tr>
						<tr><th>Email</th><td>
						<?php echo $row->email; ?></td></tr>
						<tr><th>Phone No</th><td>
						<?php echo $row->contactno; ?></td></tr>
						<tr><th>Passenger Details (<?php echo $row->no_of_persons; ?>)</th><td>
						<?php
		 					$this->db->select('*');
		 					$this->db->from('tbl_passenger');
    						$this->db->where('booking_id',$row->id);
		 					$psgq = $this->db->get();
		 					$pres = $psgq->result();
							$person = 0;
							foreach ($pres as $psg) {
								$person++;
								if ($person > 1) { echo "<br>"; }
						 		echo($person.". " . $psg->title . " " . $psg->name . " ". $psg->surname  );
							}
						//echo $row->pg_currency; 
						?> </td></tr>
						<tr><th>Dive Center Name</th><td>
						<?php echo $row->dcname; ?> </td></tr>
						<tr><th>Dive Center Email</th><td>
						<?php echo $row->dcemailid; ?></td></tr>
						<tr><th>Phone No</th><td>
						<?php echo $row->dctelephone_no; ?></td></tr>
						<tr><th>Product Details</th><td>
						<?php 
						$prdlist = "		<table class=\"table table-bordered table-striped\">
						<tr><th>Diver</th><th>Product Name</th><th>qty</th><th>Price</th><th>Subtotal</th><th>Dives</th></tr>";
               			foreach($iproduct as $prd) {
							$prdlist .= "<tr><td>" . $prd->diverid . "</td><td>" . $prd->product_name . ( $prd->accom == "Yes" ? " [ A: /" . $prd->accom_basis . " ]" : "" ). "</td><td>" . $prd->qty . "</td><td>" . $prd->price . 
								"</td><td>" . number_format($prd->qty * $prd->price, 2) . "</td><td>" . $prd->no_of_dive . "</td></tr>";
               			}
						$prdlist .= "</table>";
						echo $prdlist;
						?> </td></tr>
						<tr><th>Payment Currency</th><td>
						<?php echo $row->pg_currency; ?> </td></tr>
						<tr><th>Payment Amount</th><td>
						<?php echo $row->grand_total; ?></td></tr>
						<tr><th>Payment Ref./Auth</th><td>
						<?php echo $row->pg_transid; ?>&nbsp;<b>[<?php echo $row->pg_authcode; ?>]</b></td></tr>

						<tr><th>Booking Status</th><td><b>
						<?php
								switch($row->status) {
								case "DECLINED":
									echo("UNAVAILABLE");
								break;
								default:
									echo($row->status);
								break;
								}
						?></b>
						</td></tr>
<!--						<tr><td colspan="2">
						<div style="text-align:right">
							 <input type="submit" name="update_booking_status" value="Update" class="btn btn-success">
						 </div>
						</td></tr>-->
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
   