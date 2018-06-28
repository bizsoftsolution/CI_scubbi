<!-- mobile-menu-area-end -->
        
		<?php 
			if($this->session->userdata('user_id') != '')
			{
		?>
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
<li class="signup_display" style="display:none;">
                              <a href="<?php echo base_url('Customer/logout'); ?>">
                                 <div class="menue-name">Sign out</div>
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
									<?php 
									if($row->photo != NULL)
										{
									?>
                                   <img src="<?php echo base_url(); ?>upload/customerprofile/<?php echo $row->photo;?>" alt="" class="profile-img img-responsive" style="width:100%;height:auto;"/>
								   <?php 
										}elseif($row->profile_pic!=null){ ?>

										 <img src="<?php echo $row->profile_pic; ?>" alt="" class="profile-img img-responsive" style="width:100%;height:auto;"/>

										<?php }	
										else
										{
									?>
									  <img src="<?php echo base_url(); ?>upload/customerprofile/user.png" alt="" class="profile-img img-responsive" style="width:100%;height:auto;"/>
									 <?php 
										}
									 ?>
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
									<p align="center">Joined since <?php echo date('d M Y' , strtotime($row->created));?></p>
					
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
					 <div class="col-md-12 col-sm-5 col-xs-12">
							<h4 align="center" style="font-weight:bold;text-decoration:underline"><a href="<?php echo base_url('Customer/customereditProfile'); ?>/<?php echo $row->id;?>">EDIT MY PROFILE</a></h4>
							<p align="center" style="font-weight:bold;text-decoration:underline"><a href="<?php echo base_url('Customer/customerChangepassword'); ?>/<?php echo $row->user_id;?>">CHANGE MY PASSWORD</a></p>
					   </div>
                  </div>
                  <div class="col-md-9 col-sm-12 col-xs-12">
                     <div style="margin:20px 0 0 0;">
						<div class="panel-group">
							<div class="panel panel-default">
							  <div class="panel-heading" style="font-size:19px;font-weight:bold;">Profile Details</div>
							 
							  <div class="panel-body">
						
								<form class="form-horizontal">
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">First Name:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="firstname" value="<?php echo $row->firstname; ?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Last Name:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->lastname;?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">I AM:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->gender;?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Date of Birth:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo date("d/m/Y", strtotime($row->dob));?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Email Address:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->email;?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Contact Number:</label>
										<div class="col-md-9">
											<div class="field_wrapper2">
												<?php 
												$fetch_mno = $row->contactno;
												$fetch_number = explode(',', $fetch_mno);
												$i=0; 
												foreach($fetch_number as $row1) {
													?>
												<div style="border:1px solid gray;padding:10px;"><input type="text" name="contact_number[]" value="<?php echo $fetch_number[$i]; ?>" style="width:200px;height:30px;" disabled /></div>
											
												
												<div class="row" style="margin:1px 0px;">&nbsp;</div>
												<?php $i++; } ?>
												
											</div>
											<br>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Nationality:</label>
										<div class="col-sm-9">
										<?php 
											$nat_1 = $row->nationality;
											$nat = $this->db->get_where('tbl_country', array('country_id'=>$nat_1))->result();
											foreach($nat as $nat_row)
											{
										?>
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $nat_row->country_name; ?>" disabled>
										  <?php 
											}
										  ?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Diver Registration Body:</label>
										<div class="col-sm-9">
										<?php if($row->diver_registration_body != "")
										{
										?>
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->diver_registration_body;?>" disabled>
										  <?php 
										}
										else
										{
										?>
										<input type="text" class="form-control" id="text" name="lastname" value="Others" disabled>
										<?php
										}
										  ?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Identification Passport:</label>
										<div class="col-sm-9">
										<?php 
										if($row->identifiction_passport == "")
										{
											?>
											<span style=""><h2>No Image</h2></span>
											<?php

										}
										else
										{
										?>
										  <img src="<?php echo base_url(); ?>upload/customerprofile/<?php echo $row->identifiction_passport;?>" width="250px" height="120px"/>
										  <?php
										}
										?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Diver Registration Level:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->diver_registration_level;?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Diver Specialties Skill:</label>
										<div class="col-sm-9">
										  <?php 
											$chkbox4 = explode(',', $row->diver_speciality_skill); 
											?>
											<!--label class="radio-inline" style="font-size:14px;"><input type="radio" name="Specialtiesskill" value="PEAK PERFORMANCE BOUYANCY" <?php echo ($chkbox4=='PEAK PERFORMANCE BOUYANCY')?'checked':'' ?>>PEAK PERFORMANCE BOUYANCY</label>
											<label class="radio-inline" style="font-size:14px;"><input type="radio" name="Specialtiesskill" value="DEEP DIVING" <?php echo ($chkbox4=='DEEP DIVING')?'checked':'' ?>>DEEP DIVING</label>
											<label class="radio-inline" style="font-size:14px;"><input type="radio" name="Specialtiesskill" value="WRECK DIVING" <?php echo ($chkbox4=='WRECK DIVING')?'checked':'' ?>>WRECK DIVING</label>
											<label class="radio-inline" style="font-size:14px;"><input type="radio" name="Specialtiesskill" value="DRIFT DIVING" <?php echo ($chkbox4=='DRIFT DIVING')?'checked':'' ?>>DRIFT DIVING</label-->
											<div class="row">
												<div class="col-md-12">
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Emergency Oxygen Provider"  <?php if(in_array( "PADI Emergency Oxygen Provider",$chkbox4)){echo "checked";}?>
													disabled >PADI Emergency Oxygen Provider</label>
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Drift Diver" <?php if(in_array( "PADI Drift Diver",$chkbox4)){echo "checked";}?> disabled>PADI Drift Diver</label>
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Night Diver" <?php if(in_array( "PADI Night Diver",$chkbox4)){echo "checked";}?> disabled>PADI Night Diver</label>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Peak Performance Buoyancy" <?php if(in_array( "PADI Peak Performance Buoyancy",$chkbox4)){echo "checked";}?> disabled>PADI Peak Performance Buoyancy</label>
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Multilevel Diver" <?php if(in_array( "PADI Multilevel Diver",$chkbox4)){echo "checked";}?> disabled>PADI Multilevel Diver</label>
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Underwater Videography" <?php if(in_array( "PADI Underwater Videography",$chkbox4)){echo "checked";}?> disabled>PADI Underwater Videography</label>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Enriched Air Nitrox Diver" <?php if(in_array( "PADI Enriched Air Nitrox Diver",$chkbox4)){echo "checked";}?> disabled>PADI Enriched Air Nitrox Diver</label>
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Underwater Navigator" <?php if(in_array( "PADI Underwater Navigator",$chkbox4)){echo "checked";}?> disabled>PADI Underwater Navigator</label>
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Dry Suit Diver" <?php if(in_array( "PADI Dry Suit Diver",$chkbox4)){echo "checked";}?> disabled>PADI Dry Suit Diver</label>
											
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Digital Underwater Photography" <?php if(in_array( "PADI Digital Underwater Photography",$chkbox4)){echo "checked";}?> disabled>PADI Digital Underwater Photography</label>
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Sidemount Diver" <?php if(in_array( "PADI Sidemount Diver",$chkbox4)){echo "checked";}?> disabled>PADI Sidemount Diver</label>
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Wreck Diver" <?php if(in_array( "PADI Wreck Diver",$chkbox4)){echo "checked";}?> disabled>PADI Wreck Diver</label>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Deep Diver" <?php if(in_array( "PADI Deep Diver",$chkbox4)){echo "checked";}?> disabled>PADI Deep Diver</label>
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Search & Recovery Diver" <?php if(in_array( "PADI Search & Recovery Diver",$chkbox4)){echo "checked";}?> disabled>PADI Search & Recovery Diver</label>
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Cavern Diver" <?php if(in_array( "PADI Cavern Diver",$chkbox4)){echo "checked";}?> disabled>PADI Cavern Diver</label>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<label class="checkbox-inline" style="font-size:14px;"><input type="checkbox" name="Specialtiesskill[]" value="PADI Advanced Rebreather Diver" <?php if(in_array( "PADI Advanced Rebreather Diver",$chkbox4)){echo "checked";}?> disabled>PADI Advanced Rebreather Diver</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Diver Card:</label>
										<div class="col-sm-9">
										<?php
										if($row->diver_card =="")
										{
											?>
											<h2>No Image</h2>		
											<?php
										}
										else
										{
										?>
										  <img src="<?php echo base_url(); ?>upload/customerprofile/<?php echo $row->diver_card;?>" width="250px" height="120px"/>
										  <?php
										}
										?>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Preferred Language:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->language;?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Preferred Currency:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->currency;?>" disabled>
										</div>
									</div>
									<br>
									<hr style="width:100%;">
									<label style="font-size:19px;font-weight:bold;color:#000;" class="col-md-12">Others</label>
									
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Residential Address:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->address1;?>" disabled>
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->address2;?>" disabled>
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->address3;?>" disabled>
										</div>
									</div>	
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">State:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="state" value="<?php echo $row->state;?>" disabled>
										  
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Other Languages:</label>
										<div class="col-sm-9">
											<div class="row">
												<?php 
												$fetch_other_language = $row->other_language;
												$fetch_other_lang = explode(',', $fetch_other_language);
												foreach($fetch_other_lang as $fetch_row)
												{
												
												?>
												<div class="col-md-3">
													<input type="text" class="form-control" id="text" name="lastname" value="<?php echo $fetch_row;?>" disabled>
												</div>
												<?php 
												}
												?>
												
											</div>
										  
										</div>
									</div>
									
									<label style="font-size:19px;font-weight:bold;color:#000;margin:5px 0 10px 0;" class="col-md-12">Emergency Contact</label>
									
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Name:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->name;?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Contact Number:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->contact_no;?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Email Address:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->e_mail;?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="text">Relationship:</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="text" name="lastname" value="<?php echo $row->relationship;?>" disabled>
										</div>
									</div>
								</form>
						
							  </div>
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
		 