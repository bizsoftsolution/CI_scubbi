<script>
$(function(){
	$('.testDt').each(function(){
		var d = new Date(parseInt($(this).attr('value')));
		var datestring = ("0" + d.getDate()).slice(-2) + "-" + ("0"+(d.getMonth()+1)).slice(-2) + "-" +
    d.getFullYear() + " " + ("0" + d.getHours()).slice(-2) + ":" + ("0" + d.getMinutes()).slice(-2);

		$(this).text(datestring);
	
	});
});
</script>
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
				   <!--li>
                              <a href="<?php echo base_url('Customer/myCart'); ?>">
                                 <div class="menue-name">My Cart</div>
                              </a>
                           </li-->
                           <li>
                              <a href="<?php echo base_url('Customer/customerDashboard'); ?>">
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
		 <section class="dashboard light-blue" >
            <div class="container">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 ">
                     <div class="dashboard-main-disc ad-listing">
                        <div class="heading-inner">
                           <p class="title">Total Conversations (<?php echo count($message); ?>)</p>
                        </div>
						<?php 
						$i=1;
							foreach($message as $row) 
							{?>
								
							<div class="listing-post light-grey">
								   
								   <?php

				$from_id = $row->lfrom;
				$to_id = $row->lto;
				$lid = $row->lid;
				$dcid = $row->dc_id;
				$thread = $row->thread_id;
				
				$crows = $this->db->get_where('messages', array('id'=>$lid))->result();
				//$crow = $crows[0];
				//var_dump($crow);
				foreach($crows as $crow)
				{
										if($crow->from == $this->session->userdata('user_id'))
										{
											$data2=$this->db->get_where('tbl_dcprofile', array('user_id'=>$row->dc_id))->result();
											foreach($data2 as $row3)
											{
											?>
											<div class="col-md-2 col-sm-12 col-xs-12 nopadding">
											  <div class="listing-image">
												 <a href="<?php echo base_url();?>/Customer/individualMessage/<?php echo $row3->user_id; ?>/<?php echo $row->thread_id; ?>">
												 <img src="<?php echo base_url(); ?>/upload/DCprofile/<?php echo $row3->dcimage;?>" class="img-responsive" alt="image" />
												 </a>
											  </div>
										   </div>
											<div class="col-md-3">
												 <h3 class="listing-desc-title" style="margin: 20% 0px 0px 0px;">
													<a href="<?php echo base_url();?>/Customer/individualMessage/<?php echo $row3->user_id; ?>/<?php echo $row->thread_id; ?>"><?php echo $row3->dcname; ?></a>
												 </h3>
											  </div>
						<?php				}
										}
										elseif($crow->from == 33) 
										{
											?>
											<div class="col-md-2 col-sm-12 col-xs-12 nopadding">
											  <div class="listing-image">
												 <a  target="_blank" href="<?php echo base_url();?>/Customer/individualMessage/<?php echo $dcid; ?>/<?php echo $row->thread_id; ?>">
												 <img src="<?php echo base_url(); ?>/upload/customerprofile/user.png" class="img-responsive" alt="image" />
												 </a>
											  </div>
										   </div>
											<div class="col-md-3">
												 <h3 target="_blank" class="listing-desc-title" style="margin: 20% 0px 0px 0px;">
													<a href="<?php echo base_url();?>/Customer/individualMessage/<?php echo $dcid; ?>/<?php echo $row->thread_id; ?>">Admin</a>
												 </h3>
											  </div>
						<?php				

										}
										else
										{
											
											$data1=$this->db->get_where('tbl_dcprofile', array('user_id'=>$crow->from))->result();
											foreach($data1 as $row2)
											{
											?>
											<div class="col-md-2 col-sm-12 col-xs-12 nopadding">
											  <div class="listing-image">
												 <a target="_blank" href="<?php echo base_url();?>/Customer/individualMessage/<?php echo $row2->user_id; ?>/<?php echo $row->thread_id; ?>">
												 <img src="<?php echo base_url(); ?>/upload/DCprofile/<?php echo $row2->dcimage;?>" class="img-responsive" alt="image" />
												 </a>
											  </div>
										   </div>
											<div class="col-md-3">
												 <h3 class="listing-desc-title" style="margin: 20% 0px 0px 0px;">
													<a target="_blank" href="<?php echo base_url();?>/Customer/individualMessage/<?php echo $row2->user_id; ?>/<?php echo $row->thread_id; ?>"><?php echo $row2->dcname; ?></a>
												 </h3>
											  </div>
						<?php				}
										}
								   ?>
								  
								   <div class="col-md-7 col-sm-12 col-xs-12">
									  <div class="listing-desc">
										 <a href="<?php echo base_url();?>/Customer/individualMessage/<?php echo $crow->to; ?>/<?php echo $row->thread_id; ?>">
										 <p><?php echo $crow->message ?></p>
										 <!--span class="listing-price">Status: <span>New</span></span!--> 
										 <span class="listing-desc-date"><i class="fa fa-calendar"></i><span  class="testDt" value=<?php echo strtotime($crow->time) * 1000; ?>></span></span>
										 </a>
									  </div>
								   </div>
			<?php 
				}
			?>  
								</div>			
			<?php				}
						
						?>
                        
						
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