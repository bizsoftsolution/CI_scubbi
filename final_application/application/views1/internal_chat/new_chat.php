			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Messages</span> </h4>

							<ul class="breadcrumb position-right">
								<li><a href="">Home</a></li>
								<li class="active"><a href="">Messages</a></li>
								
							</ul>
						</div>

						<!-- <div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float text-size-small has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div> -->
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Simple lists -->
					<div class="row">
					<!-- /simple lists -->


					<!-- Chat modal -->
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h2 class="panel-title">Message Conversation</h2>
									<div class="heading-elements">
										<ul class="icons-list">
                            				<li><a href="<?php echo  base_url();?>Chat/inbox" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
											<li><a data-action="collapse"></a></li>
											<li><a data-action="reload"></a></li>
											<!-- <li><a data-action="close"></a></li> -->
										</ul>
									</div>
								</div>

								<div class="panel-body">
								<?php 
									
									$title = $this->db->get_where('tbl_conversation', array('thread_id'=>$conv))->result();
									foreach($title as $t1)
									{?>
									 <h1 style="text-align:center;">Topic of this Conversation : <?php echo $t1->topic;?></h1>	
								<?php	}
									
								
									?>
								<form action="<?php echo base_url(); ?>Chat/new_chat" method="POST">
								
									<ul class="media-list chat-list content-group">
										<?php
										 $user_id = $this->session->userdata('user_id');
										foreach ($oldConversation as $converList) {
											//echo $converList->from;
										 ?>
											
										<?php //echo $converList->topic; ?>
										<?php if($converList->from == $user_id){?>
											<li class="media reversed">
											<div class="media-body">
												<div class="media-content"><?php
													echo $converList->message;
												  ?></div>
												<span class="media-annotation display-block mt-10">
												<?php echo date("d-m-Y h:m:s", strtotime($converList->time));  ?> <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
											</div>

											<div class="media-right">
												<a href="assets/images/placeholder.jpg">
												<i class="fa fa-user" style="font-size: 50px;"></i>
												</a>
											</div>
										</li>
										
					<?php			} 
									else{
					?>					<li class="media">
											<div class="media-left">
												<a href="assets/images/placeholder.jpg"><?php echo ($converList->from == 33 ? "Admin" : "" ) ?>
													<i class="fa fa-user" style="font-size: 50px;"></i>
												</a>
											</div>

											<div class="media-body">
												<div class="media-content">
												<?php
													echo $converList->message;
												  ?>
												</div>
												<span class="media-annotation display-block mt-10"><?php echo date("d-m-Y h:m:s", strtotime($converList->time));  ?> <a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
											</div>
										</li>
					
									
												
												  <?php
											}?>
										<?php if($converList->from == $this->session->userdata('user_id'))
										{
										?>
									<input type="hidden" value="<?php echo $this->session->userdata('first_name'); ?>" name="from_name"/>
									<input type="hidden" value="<?php echo $converList->to_name; ?>" name="to_name"/>
									<input type="hidden" value="<?php echo $converList->thread_id; ?>" name="thread_id"/>
									<input type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>" name="from"/>
									<input type="hidden" value="<?php echo $converList->to; ?>" name="to"/>
									<?php
										}
										else
										{

									?>
									<input type="hidden" value="<?php echo $this->session->userdata('first_name'); ?>" name="from_name"/>
									<input type="hidden" value="<?php echo $converList->to_name; ?>" name="to_name"/>
									<input type="hidden" value="<?php echo $converList->thread_id; ?>" name="thread_id"/>
									<input type="hidden" value="<?php echo $this->session->userdata('user_id'); ?>" name="from"/>
									<input type="hidden" value="<?php echo $converList->from; ?>" name="to"/>
									
									<?php
										}
									?>
						
												<?php  }
												  ?>
								
									</ul>

			                    	<textarea  class="form-control content-group" rows="3" cols="1" placeholder="Enter your message..." name="new_msg"></textarea>
									

			                    	<div class="row">
			                    		<div class="col-xs-6">
				                        
			                    		</div>

			                    		<div class="col-xs-6 text-right">
											<input type="submit" name="submit_new_chat" class="btn bg-teal-400 btn-labeled btn-labeled-right icon-circle-right2" value="Send">
				                            <!--button type="button" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-circle-right2"></i></b> Send</button-->
			                    		</div>
			                    	</div>
									</form>
							
						</div>
					</div>
					</div>
					<!-- /chat modal -->
					</div>


			</div>
			<!-- /main content -->
