
<script>
$(function(){
	$('.testDt').each(function(){
		var d = new Date(parseInt($(this).attr('value')));
		var datestring = ("0" + d.getDate()).slice(-2) + "-" + ("0"+(d.getMonth()+1)).slice(-2) + " -" +
    d.getFullYear();

		$(this).text(datestring);
	
	});
});
</script>	
<?php 
			if($this->session->userdata('user_id') != '')
			{
		?>			
<!-- mobile-menu-area-end -->
         <section class="dashboard-menu dashboard-menu-2 light-blue" style="margin: 60px 0 0 0;">
            <div class="container" style="width:100%;padding:5px 0 0 3px">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="dashboard-menu-container" style="background-color: #66ffff;">
                        <ul>
                           <li>
                              <a href="<?php echo base_url('Customer/customerDashboard'); ?>">
                                 <div class="menue-name"> Home </div>
                              </a>
                           </li>
                           <li class="active">
                              <a href="<?php echo base_url('Customer/customerProfile'); ?>">
                                 <div class="menue-name">Profiles</div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/customerMydiveTrips'); ?>">
                                 <div class="menue-name">My Dive Trips</div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/allMessages'); ?>">
                                 <div class="menue-name">My Messages</div>
                              </a>
                           </li>
                             <!--li>
                              <a href="<?php echo base_url('Customer/myCart'); ?>">
                                 <div class="menue-name">My Cart</div>
                              </a>
                           </li-->
                           <li>
                              <a href="<?php echo base_url('Customer/customerDivecredits'); ?>">
                                 <div class="menue-name">Dive Credits</div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="dashboard light-blue">
            <div class="container">
               <div class="row" style="background: #FFF;">
					<?php 
					$user_id = $this->session->userdata('user_id');
					$data1=$this->db->get_where('tbl_customerprofile', array('user_id'=>$user_id))->result();
						foreach($data1 as $row)
						{
						?>
               	  <div class="col-md-3 col-sm-12 col-xs-12">
                     <div class="main-box profile-box-contact">
                     	<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div class="profile-box-header blue-bg">
                                <div class="col-md-12 text-center">
                                   <img src="<?php echo base_url(); ?>upload/customerprofile/<?php echo $row->photo;?>" alt="" class="profile-img img-responsive" style="width:100%;height:auto;"/>
                                   <!--h2>Jessica Daisy</h2>
                                   <ul class="contact-details">
                                      <li>
                                         <i class="fa fa-map-marker"></i> UK London
                                      </li>
                                      <li>
                                         <i class="fa fa-envelope"></i> jessica@admin.com
                                      </li>
                                      <li>
                                         <i class="fa fa-phone"></i> (123) 000-9876
                                      </li>
                                   </ul-->
                               </div>
                               <div class="col-md-12 col-sm-5 col-xs-12">
									<h4 align="center"><?php echo $this->session->userdata('first_name');?></h4>
									<p align="center">Joined since <span  class="testDt" value=<?php echo strtotime($row->created) * 1000; ?>></span></p>
                               </div>
							   
                            </div>
                        </div>
						
                        <!--div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div class="profile-box-footer">
                               <a href="#">
                               <span class="value">783</span>
                               <span class="label">Ads Posted</span>
                               </a>
                               <a href="#">
                               <span class="value">912</span>
                               <span class="label">Followers</span>
                               </a>
                               <a href="#">
                               <span class="value">83</span>
                               <span class="label">Messages</span>
                               </a>
                            </div>
                        </div-->
                     </div>
                  </div>
                  <div class="col-md-9 col-sm-12 col-xs-12">
                     <div style="margin:20px 0 0 0;">
						<div class="panel-group">
							<div class="panel panel-default">
							  <div class="panel-heading" style="font-size:19px;font-weight:bold;">Change My Password</div>
<?php 		if($this->input->post('update_change_password'))
{
?>
							  <div class="panel-body">
<p>Your password changed successfully. Click on the followings to login.</p>
				<a href="<?php echo base_url(); ?>/Customer" class="btn btn-success" >Login</a>
 
							
<?php } else { ?>

							  <div class="panel-body">
								<form class="form-horizontal" method="POST" action="<?php echo base_url();?>Customer/customerChangepassword/<?php echo $row->user_id; ?>">
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Old Password:</label>
										<div class="col-sm-9">
										  <input type="password" class="form-control" id="text" value="<?php
										  $data2=$this->db->get_where('user', array('user_id'=>$row->user_id))->result();
										  foreach($data2 as $row1)
											{
												echo $row1->password;
											}
										  ?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">New Password:</label>
										<div class="col-sm-9">
										  <input type="password" class="form-control" id="password" value="" name="newpassword" required> 
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Confirm New Password:</label>
										<div class="col-sm-9">
										  <input type="password" class="form-control" name="confirmpassword" id="confirm_password" required>
										   <span id='message'></span>
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-sm-offset-3 col-sm-9">
										  <input type="submit" class="btn btn-success" name="update_change_password" value="Update">
										  <button type="reset" class="btn btn-danger">Cancel</button>
										</div>
									</div>
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
								</form>
							 
							  </div>
<?php }  ?>

							</div>
						</div>
                     </div>
                  </div>
                  <?php 
						}
				  ?>
               </div>
            </div>
			<div class="container">&nbsp;</div>
			
			
			 
         </section>
		 <hr style="width:100%;border:2px solid #66ffff;">
		 
		 <?php
			}
			else
			{
				redirect(base_url());
			}
		 ?>