       <?php 
			if($this->session->userdata('user_id') != '')
			{
		?>
	   <section class="dashboard-menu dashboard-menu-2 light-blue" style="margin: 60px 0 0 0;background-color:#f4f7fa;">
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
                           <li >
                              <a href="<?php echo base_url('Customer/customerProfile'); ?>">
                                 <div class="menue-name">Profiles</div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url('Customer/customerMydiveTrips'); ?>">
                                 <div class="menue-name">My Dive Trips</div>
                              </a>
                           </li>
                           <li class="active">
                              <a href="<?php echo base_url('Customer/allMessages'); ?>">
                                 <div class="menue-name">My Messages</div>
                              </a>
                           </li>
						    <li>
                              <a href="<?php echo base_url('Customer/myCart'); ?>">
                                 <div class="menue-name">My Cart</div>
                              </a>
                           </li>

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
         <section class="dashboard light-blue" style="background-color:#f4f7fa;">
            <div class="container">
               <div class="row">
			   <?php

							$data = $this->db->get_where('tbl_dcprofile', array('user_id'=>$diveId))->result();
											foreach($data as $row1)
											{
										 ?>
							
               	  <div class="col-md-4 col-sm-12 col-xs-12 ">
                     <div class="main-box profile-box-contact">
                     	<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div class="profile-box-header blue-bg">
                                <div class="col-md-12 col-sm-7 col-xs-12">
                                   <img src="<?php echo base_url(); ?>/upload/DCprofile/<?php echo $row1->dcimage;?>" alt="" class="profile-img img-responsive" />
                                   <h2><?php echo $row1->dcname; ?></h2>
                                   <ul class="contact-details">
                                      <li>
									   <?php

									$island = $this->db->get_where('tbl_island', array('island_id'=>$row1->dcislands))->result();
											foreach($island as $island1)
											{
										 ?>
							
                                         <i class="fa fa-map-marker"></i><?php echo $island1->island_name;?>
										 <?php
										 
											}
											?>
                                      </li>
                                      <li>
                                         <i class="fa fa-envelope"></i> <?php echo $row1->dcemailid;?>
                                      </li>
                                      <li>
                                         <i class="fa fa-phone"></i> <?php echo $row1->dctelephone_no;?>
                                      </li>
                                   </ul>
                               </div>
                               <div class="col-md-12 col-sm-5 col-xs-12">
                                   <div class="profile-btn">
                                      <a class="btn" href="#"> <i class="fa fa-envelope-o"></i> Message </a>
                                      <a href="#" class="btn"> <i class="fa fa-star"></i> Review </a>
                                   </div>

                               </div>
                            </div>
                        </div>
                        
                     </div>
                  </div>
				  <?php
											}
										//	}
					
				  ?>
                  <div class="col-md-8 col-sm-8 col-xs-12 ">
                     <div class="dashboard-main-disc">
                        <div class="heading-inner">
                           <p class="title">Send message to Dive Center</p>
                        </div>
                     
                        <div class="">
                           <ul class="followers">
						  <form action="<?php echo base_url(); ?>Customer/new_chat" method="POST">
								<div class="form-group">
									<textarea cols="6" rows="8" placeholder="" name="new_msg" class="form-control"></textarea>
								 </div>
								 <div class="col-md-12 col-sm-12" style="background-color: #48f5e2;padding: 11px;">
									<input type="submit" class="btn  pull-right" value="Send Message" name="submit_new_chat"/>
								 </div>
							
                           </ul>
						   <div>
						   <?php
						 $user_id = $this->session->userdata('user_id');
						foreach ($oldConversation as $converList) {
							//echo $converList->from;
						 ?>
							
						
						<?php if($converList->from == $user_id){
							
							?>
								
								<div class="row">
									<div class="col-md-10" style="padding: 10px;background-color: #9ae487;border-radius: 11px;margin:15px 0px;">
										<p><?php echo $converList->message;?></p>
										 
										<span class="listing-desc-date" style="float: right;color: #fff;font-weight: bold;"><i class="fa fa-calendar"></i> <?php echo $converList->time;?></span>
									 </div>		
									<div class="col-md-2">
									<?php 
										$data2=$this->db->get_where('tbl_customerprofile', array('user_id'=>$converList->from))->result();
											foreach($data2 as $row3)
											{
									
									?>
										<img src="<?php echo base_url(); ?>/upload/customerprofile/<?php echo $row3->photo; ?>" alt="" class="profile-img img-responsive" />
										
										<?php 
											}
											?>
									 </div>
									 							 
								</div>
								<div class="separator"></div>
								<?php			
								} 
									
									else{
								?>
								<div class="row">
									<div class="col-md-2">
										<?php 
										$data3=$this->db->get_where('tbl_dcprofile', array('user_id'=>$converList->from))->result();
											foreach($data3 as $row4)
											{
									
									?>
										<img src="<?php echo base_url(); ?>/upload/DCprofile/<?php echo $row4->dcimage; ?>" alt="" class="profile-img img-responsive" />
										
										<?php 
											}
											?>
									 </div>
									 <div class="col-md-10" style="padding: 10px;background-color: #9ae487;border-radius: 11px;margin:15px 0px;">
										<p><?php echo $converList->message;?></p>
										  
										<span class="listing-desc-date" style="float: right;color: #fff;font-weight: bold;"><i class="fa fa-calendar"></i> <?php echo $converList->time;?></span>
									 </div>									 
								</div>
								<div class="separator"></div>
									
										  <?php
									}?>
						
									<?php if($converList->from == $this->session->userdata('user_id'))
										{
										?>
									<input type="hidden" value="<?php echo $this->session->userdata('first_name'); ?>" name="from_name"/>
									<input type="hidden" value="<?php echo $converList->to_name; ?>" name="to_name"/>
									<input type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>" name="from"/>
									<input type="hidden" value="<?php echo $converList->to; ?>" name="to"/>
									<?php
										}
										else
										{

									?>
									<input type="hidden" value="<?php echo $this->session->userdata('first_name'); ?>" name="from_name"/>
									<input type="hidden" value="<?php echo $converList->to_name; ?>" name="to_name"/>
									<input type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>" name="from"/>
									<input type="hidden" value="<?php echo $converList->from; ?>" name="to"/>
									
									<?php
										}
									?>
						
						
										<?php  }
										  ?>
										  </form>
							
						   </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
		<?php
			}
			else
			{
				redirect(base_url());
			}
		 ?>