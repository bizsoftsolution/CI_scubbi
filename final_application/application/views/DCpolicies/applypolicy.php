<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Apply Booking and Cancellation Policy</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-9">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Apply Booking and Cancellation Policy</h2>
            <div style="text-align:right;">
               <a href="<?php echo  base_url();?>DCpolicies/DCpoliciesdashboardlist" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
            <div class="col-md-2"></div>
            <div class="col-md-8">
               <br>
               <?php if($message == "FAILED") { ?>
               <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Action Failed !!! </strong>
               </div>
               <?php } else if($message == "SUCCESS") {  ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success !!! </strong> Policies applied successfully
               </div>
               <?php } ?>
               <?php foreach($productpolicy as $row){?>
               <form name="add"   method="POST" action="<?php echo  base_url();?>DCpolicies/assignPolicy/<?php echo $this->uri->segment('3');?>" class="form-horizontal">
					<input type="hidden" name="postpolicy" value ="1">
                 <div class="form-body">
                     <div class="form-group">
                        <label class="control-label col-md-3">Product Details</label>
                        <div class="col-md-9">
                           <input name="name" placeholder="Product Name" class="form-control" type="text" disabled value="<?php echo $row->product_name;?>">
                           <span class="help-block"></span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-3">Booking Policy</label>
                        <div class="col-md-9">
                           <select class="form-control" name="booking_policy" required>
                              <option value="">--Select Booking Policy--</option>
                              <?php
                              foreach ($bpolicyList as $booking) {
                                 ?>
                                 <option value="<?php echo $booking->id;?>" <?php if($booking->id == $row->booking_policy){echo "selected";}?>><?php echo $booking->booking_name ;?></option>
                              <?php
                              }
                              ?>
                           </select>
                           <span class="help-block"></span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-3">Cancellation Policy</label>
                        <div class="col-md-9">
                           <select class="form-control" name="cancellation_policy">
                              <option value="0">--Select Cancellation Policy--</option>
                              <?php
                              foreach ($cpolicyList as $clist) {
                                 ?>
                                 <option value="<?php echo $clist->id;?>" <?php if($clist->id == $row->cancellation_policy){echo "selected";}?>><?php echo $clist->cancellation_name ;?></option>
                              <?php
                              }
                              ?>
                           </select>
                           <span class="help-block"></span>
                        </div>
                     </div>
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="submit" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
               <?php } ?>
               <br><br>
            </div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
   