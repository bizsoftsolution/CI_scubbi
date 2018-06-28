<?php
				foreach ($oldConversation as $cList) {
				$topic = $cList->topic;
				}
?>			
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

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="<?php echo  base_url();?>SAbecomeapartner/DCinbox/<?php echo $cList->dc_id; ?>" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
								<button onclick="printContent()" class="btn bg-orange"><i class="fa fa-print"></i>  Print</button>
								
							</div>
						</div>


						
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Simple lists -->
					<div class="row">
					<!-- /simple lists -->


					<!-- Chat modal -->
						<div class="col-md-12" id="DivIdToPrint">
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h2 class="panel-title">Message Conversation -&nbsp;[<?php echo $topic; ?>]</h2>
									<div class="heading-elements">
										<ul class="icons-list">
                    						
											<li><a data-action="collapse"></a></li>
											<li><a data-action="reload"></a></li>
											<!-- <li><a data-action="close"></a></li> -->
										</ul>
									</div>
								</div>

								<div class="panel-body">
								<form action="<?php echo base_url(); ?>SAbecomeapartner/SAnew_chat" method="POST">
									<ul class="media-list chat-list content-group">
										<?php
										 $user_id = $this->session->userdata('user_id');
										foreach ($oldConversation as $converList) {
											//echo $converList->from;
										 ?>
											
										
										<?php if($converList->from != $converList->customer_id){?>
											<li class="media reversed">
											<div class="media-body">
												<div class="media-content"><?php
													echo $converList->message;
												  ?></div>
												<span class="media-annotation display-block mt-10">
												<span  class="testDt" value=<?php echo strtotime($converList->time) * 1000; ?>></span><a href="#"><i class="icon-pin-alt position-right text-muted"></i></a></span>
											</div>

											<div class="media-right">
												<a href="assets/images/placeholder.jpg"><?php echo ($converList->from == 33 ? "Admin" : "" ) ?>
												<i class="fa fa-user" style="font-size: 50px;"></i>
												</a>
											</div>
										</li>
										
					<?php			} 
									else{
					?>					<li class="media">
											<div class="media-left">
												<a href="assets/images/placeholder.jpg">
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

			                    	<!--<textarea  class="form-control content-group" rows="3" cols="1" placeholder="Enter your message..." name="new_msg"></textarea>
									

										<div class="row">
											<div class="col-xs-6">
											
											</div>

											<div class="col-xs-6 text-right">
												<input type="submit" name="submit_new_chat" class="btn bg-teal-400 btn-labeled btn-labeled-right icon-circle-right2" value="Send">
												
											</div>
										</div>-->
									</form>
							
						</div>
					</div>
					</div>
					<!-- /chat modal -->
					</div>


			</div>
			
			<div id="DivIdToPrint1" style="display:none;">
				<table border="1" class="table">
				<?php 
				 $user_id = $this->session->userdata('user_id');
				foreach ($oldConversation as $converList) 
				{
					if($converList->from != $converList->customer_id)
					{?>
						<tr>
							<td>
								<?php
								$prof = $this->db->get_where('user',array('user_id'=>$converList->from))->row();
								?>
								<?php echo '<b>'.$prof->first_name.'</b>'; ?>
							</td>
							<td>
								<?php echo $converList->message; ?>
							</td>
							<td>
								<span  class="testDt" value=<?php echo strtotime($converList->time) * 1000; ?>></span>
							
						</tr>
											
			<?php   }
					else
					{
					?>		
						<tr>
							<td>
								<?php
								$prof = $this->db->get_where('user',array('user_id'=>$converList->from))->row();
								?>
								<?php echo '<b>'.$prof->first_name.'</b>';?>
							</td>
							<td>
								<?php echo $converList->message; ?>
							</td>
							<td>
								<span  class="testDt" value=<?php echo strtotime($converList->time) * 1000; ?>></span> 
							</td>
						</tr>
			<?php
					}
				}
				?>
				</table>
			</div>
<script>
function printContent()
 {
	var divToPrint=document.getElementById('DivIdToPrint1');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);
}
</script>