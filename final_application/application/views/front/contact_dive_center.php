         <section class="dashboard light-blue" style="background-color:#f4f7fa;margin: 115px 10px 0 0;">
            <div class="container">
               <div class="row">
			   <?php
					if($this->session->userdata('user_id') != null)
					{ 
													$data = $this->db->get_where('tbl_dcprofile', array('user_id'=>$dcid))->result();
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
						  <form action="<?php echo base_url(); ?>Front/divecenterPopup" method="POST">
								<div class="form-group">
									<input type="hidden" value="<?php echo $dcid; ?>" name="dcid_popup"/>
									<input type="hidden" value="<?php echo $row1->dcname; ?>" name="dcfrom_popup"/>
									<textarea cols="6" rows="8" placeholder="" name="messages_popup" class="form-control"></textarea>
								 </div>
								 <div class="col-md-12 col-sm-12" style="background-color: #48f5e2;padding: 11px;">
									<input type="submit" class="btn  pull-right" value="Send Message" name="submit_new_chat"/>
								 </div>
							  </form>
                           </ul>
						   
                        </div>
                     </div>
                  </div>
<?php				
				}
					else
					{?>
				<br>
				<br>
				<br>
				<br>
						<h1 style="text-align:center;">Please Login to Send Message</h1>
						<br>
				<br>
				<br>
				<br>
				  <?php
				  }
				  ?>
               </div>
            </div>
         </section>
