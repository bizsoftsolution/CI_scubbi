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
            <h2 class="panel-title">Default Policies</h2>
            <div style="text-align:right;">
              
               <a href="<?php echo  base_url();?>DCpolicies/DCpolicieslist" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
            <div class="col-md-1"></div>
            <div class="col-md-10">
				
					<form name="add" method="POST" class="form-horizontal" enctype="multipart/form-data">
					
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3"><b>Booking Policy Name</b> <strong style="color:red;">*</strong></label>
								<div class="col-md-9">
								   <input name="name" class="form-control" type="text"  value="Default Policy" readonly>
								   <span class="help-block"></span>
								</div>
							 </div>
							 
							 <div class="form-group">
								<label class="control-label col-md-3"><b>Deposit Required</b> <strong style="color:red;">*</strong></label>
								<div class="col-md-9">
								   <input name="name" class="form-control" type="text" value="Yes" readonly>
								   <span class="help-block"></span>
								</div>
							 </div>
							 
							 <div class="form-group">
								<label class="control-label col-md-3"><b>Amount of Deposit Required Upon Booking</b> <strong style="color:red;">*</strong></label>
								<div class="col-md-9">
								   <input name="name" class="form-control" type="text"  value="Full Prepayment " readonly>
								   <span class="help-block"></span>
								</div>
							 </div>
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
