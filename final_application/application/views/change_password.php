<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Change Password</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Change Password</h2>
            <!--div style="text-align:right;">
               <a class="btn bg-violet" href="<?php echo  base_url();?>DCleisure/addKeywords"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>DCleisure/Keywordlist" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div-->
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
               <?php } ?>
               <form name="add" method="POST" action="<?php echo  base_url();?>ChangePassword/pwd_update/<?php echo $this->session->userdata('user_id'); ?>" class="form-horizontal">

                    <div class="form-body">
						
						<div class="form-group">
							<label class="control-label col-md-3">New Password</label>
							<div class="col-md-5">
								<input name="new_password" placeholder="New Password" id="password" class="form-control" type="password">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Confirm Password</label>
							<div class="col-md-5">
								<input name="confirm_password" placeholder="Confirm Password" id="confirm_password" class="form-control" type="password">
								<span id='message'></span>
							</div>
						</div>
                    </div>


                  <div style="text-align:center">
                     <input type="submit" name="submit_change_password" value="Save" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
				<script>
				var password = document.getElementById("password")
				  , confirm_password = document.getElementById("confirm_password");

				function validatePassword(){
				  if(password.value != confirm_password.value) {
					 confirm_password.setCustomValidity("Passwords Don't Match");
					 $('#message').html('Not Matching').css('color', 'red');
				  } else {
					  confirm_password.setCustomValidity('');
					   $('#message').html('Matching').css('color', 'green');
					
				  }
				}

				password.onchange = validatePassword;
				confirm_password.onkeyup = validatePassword;
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

