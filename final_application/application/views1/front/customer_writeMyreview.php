<script src='<?php echo base_url(); ?>assets/sweet/sweet-alert.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/sweet/sweet-alert.css">

<script type="text/javascript">




</script>
<?php 
	if($this->session->userdata('user_id') != '')
	{	
	?>
		<style>

		.demo-table {
			width: 100%;
			border-spacing: initial;
			margin: 20px 0px;
			word-break: break-word;
			table-layout: auto;
			line-height:1.8em;
			color:#333;
			}
		.demo-table th {
			background: #999;
			padding: 5px;
			text-align: left;
			color:#FFF;
			}
		.demo-table td 
		{
			border-bottom: #f0f0f0 1px solid;
			background-color: #ffffff;
			padding: 5px;
			}
		.demo-table td div.feed_title
		{
			text-decoration: none;
			color:#00d4ff;
			font-weight:bold;
			}
		.demo-table ul
		{
			margin:0;
			padding:0;
			}
		.demo-table li
		{
			cursor:pointer;
			list-style-type: none;
			display: inline-block;
			color: #F0F0F0;
			text-shadow: 0 0 1px #666666;
			font-size:42px;
			}
		.demo-table .highlight, .demo-table .selected 
		{
			color:#F4B30A;
			text-shadow: 0 0 1px #F48F0A;
			font-size:42px;
			}
		</style>
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
                           <li>
                              <a href="<?php echo base_url('Customer/customerProfile'); ?>">
                                 <div class="menue-name">Profiles</div>
                              </a>
                           </li>
                           <li class="active">
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
		 <?php
		$dive_id = $id;
		$u_id = $this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->from('tbl_review');
		$this->db->where('divecenter_id',$dive_id);
		$this->db->where('customer_id',$u_id);
		$this->db->where('booking_id',$booking_id);
		$viewReview = $this->db->get();
		
		if($viewReview->num_rows() > 0)
		{
			///-----------------------------Data Found --------------------------------------------------
//echo("Booking $booking_id<br>");			
			$usid = $this->session->userdata('user_id');
			$this->db->where('divecenter_id', $id);
			$this->db->where('customer_id', $usid);
			$this->db->where('booking_id', $booking_id);
			$this->db->order_by('id', 'DESC');
			$this->db->limit(1);
			$query1 = $this->db->get('tbl_review');
			$Cviewreview = $query1->result();
			
			?>
					 <section class="dashboard light-blue">
				<div class="container" style="background:#66ffff;">
					<div class="row">
						<div class="col-md-6">
							<h5 style="font-weight:bold;margin:10px 15px;"><a href="">My Dive Trips > </a> <a href="">My Past Trips > </a> View My Review</h5>
						</div>
						<div class="col-md-6 text-right">
							<a href="<?php echo base_url(); ?>Customer/customerMydiveTrips" class="btn btn-default" style="height:30px;line-height:0;margin:5px 0 0 0;">Back</a>
						</div>
						
					</div>
				 </div>
				<div class="container" style="border:1px solid gray;">
					<br>
					
					<?php 
						foreach($Cviewreview as $crow)
						{
					?>
				   <div class="row">
						
						<div class="col-md-3">
							<img src="<?php echo base_url(); ?>upload/customerprofile/1483346768735.png" class="img-responsive img-circle"style="height:150px;width:150px;display:block;margin:0 auto;border:1px solid gray;" />

						</div>
						<div class="col-md-6">
							 <?php
								$idd = $crow->divecenter_id;
								$data6 = $this->db->get_where('tbl_dcprofile', array('user_id'=>$idd))->result();
								foreach($data6 as $drow6)
								{
							 ?>
							<label class="control-label col-sm-6" for="email"><b>Dive Center</b></label>
							<label class="control-label col-sm-6" for="email"><?php echo $drow6->dcname; ?></label>
							<label class="control-label col-sm-6" for="email"><b>Destination</b></label>
							<label class="control-label col-sm-6" for="email">
							<?php 
								$idd1 = $drow6->dcislands;
								$data7 = $this->db->get_where('tbl_island', array('island_id'=>$idd1))->result();
								foreach($data7 as $drow7)
								$idd2 = $drow6->dccountry;
								$data8 = $this->db->get_where('tbl_country', array('country_id'=>$idd2))->result();
								foreach($data8 as $drow8)
								echo $drow7->island_name.', '.$drow8->country_name;
							?>
							</label>
							<?php
							$date_value = $this->db->get_where('tbl_booking', array('id'=>$booking_id))->result();
								foreach($date_value as $row_date_value)
								{
									?>
									<label class="control-label col-sm-6" for="email"><b>Arrival Date</b></label> 
									<label class="control-label col-sm-6" for="email"><?php echo date("d F Y", strtotime($row_date_value->checkin)); ?></label>
									<label class="control-label col-sm-6" for="email"><b>Departure Date</b></label>
									<label class="control-label col-sm-6" for="email"><?php echo date("d F Y", strtotime($row_date_value->checkout)); ?></label>
									<?php 
								}
								}
							 ?>
						</div>
						<div class="col-md-3"></div>
					</div>
					<div class="row">
					
						<div class="col-md-3"><br><br>
							<p align="center"><b>Your Rating</b></p>
						</div>
						<div class="col-md-6">
						<table class="demo-table">
								<tbody>
				
								<?php
								$result123 = $this->db->get_where('tbl_review', array('divecenter_id' => $dive_id,'customer_id' =>$u_id , 'booking_id' => $booking_id))->result();
				
					$i=0;
					
						foreach ($result123 as $tutorial) 
						{
						?>
						<tr>
							<td valign="top">
								<div id="tutorial-1">
								<div class="price">
									<input type="hidden" name="rating" id="rating" value="<?php echo $tutorial->price_rating; ?>" />
									<ul onMouseOut="resetRating(1);">
									 <label class="control-label col-sm-3" for="email">Price</label>
										<?php
										for($i=1;$i<=5;$i++)
										{
											$selected = "";
											if(!empty($tutorial->price_rating) && $i<=$tutorial->price_rating) 
											{
												$selected = "selected";
											}
											?>
											<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,1);" onmouseout="removeHighlight(1);" onClick="addRating(this,1);">&#9733;</li>  
										<?php }  ?>
									</ul>
									</div>
									
								
							</td>
						</tr>
						<tr>
							<td valign="top">
								<div id="tutorial-2">
								<div class="price">
									<input type="hidden" name="rating" id="rating" value="<?php echo $tutorial->services_rating; ?>" />
									<ul onMouseOut="resetRating(2);">
									 <label class="control-label col-sm-3" for="email">Services</label>
										<?php
										for($i=1;$i<=5;$i++)
										{
											$selected = "";
											if(!empty($tutorial->services_rating) && $i<=$tutorial->services_rating) 
											{
												$selected = "selected";
											}
											?>
											<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,2);" onmouseout="removeHighlight(2);" onClick="addRating(this,2);">&#9733;</li>  
										<?php }  ?>
									</ul>
									</div>
									
								
							</td>
						</tr>
						<tr>
							<td valign="top">
								<div id="tutorial-3">
								<div class="price">
									<input type="hidden" name="rating" id="rating" value="<?php echo $tutorial->facilities_rating; ?>" />
									<ul onMouseOut="resetRating(3);">
									 <label class="control-label col-sm-3" for="email">Facilities</label>
										<?php
										for($i=1;$i<=5;$i++)
										{
											$selected = "";
											if(!empty($tutorial->facilities_rating) && $i<=$tutorial->facilities_rating) 
											{
												$selected = "selected";
											}
											?>
											<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,3);" onmouseout="removeHighlight(3);" onClick="addRating(this,3);">&#9733;</li>  
										<?php }  ?>
									</ul>
									</div>
									
								
							</td>
						</tr>
						<tr>
							<td valign="top">
								<div id="tutorial-4">
								<div class="price">
									<input type="hidden" name="rating" id="rating" value="<?php echo $tutorial->equipment_rating; ?>" />
									<ul onMouseOut="resetRating(4);">
									 <label class="control-label col-sm-3" for="email">Equipment</label>
										<?php
										for($i=1;$i<=5;$i++)
										{
											$selected = "";
											if(!empty($tutorial->equipment_rating) && $i<=$tutorial->equipment_rating) 
											{
												$selected = "selected";
											}
											?>
											<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,4);" onmouseout="removeHighlight(4);" onClick="addRating(this,4);">&#9733;</li>  
										<?php }  ?>
									</ul>
									</div>
									
										
									</td>
								</tr>
								
								<?php	
								
							}
					
						?>
						</tbody>
				</table>
						</div>
						<div class="col-md-3">
						<?php
						$p = $crow->price_rating;
						$s = $crow->services_rating;
						$f = $crow->facilities_rating;
						$e = $crow->equipment_rating;
						
						$tota_rating = ($p + $s + $f + $e)/4;
						?>
						<span style="font-size:25px;font-weight:bold; text-align:center;" class="col-md-6">AVERAGE<BR> RATING<br><?php echo $tota_rating; ?></span>
						<span class='selected col-md-6' style="font-size:100px;color:#f4b30a;">&#9733;</span>
						
						
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							 <label class="control-label col-sm-12" for="email"><b>Review Title</b></label>
						</div>
						<div class="col-md-9">
							<p><?php echo $crow->title; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							 <label class="control-label col-sm-12" for="email"><b>Review to Dive Center</b></label>
						</div>
						<div class="col-md-9">
							<p><?php echo $crow->description; ?></p>
						</div>
					</div>
					<?php 
						}
					?>
				</div>
				<div class="container">&nbsp;</div>
				 
			 </section>
			 <hr style="width:100%;border:2px solid #66ffff;">
			
			<?php
		}
		else
		{?>
			
			<?php $dive_id = $id; ?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function highlightStar(obj,id) {
	removeHighlight(id);		
	$('.demo-table #tutorial-'+id+' li').each(function(index) {
		$(this).addClass('highlight');
		if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
			return false;	
		}
	});
}

function removeHighlight(id) {
	$('.demo-table #tutorial-'+id+' li').removeClass('selected');
	$('.demo-table #tutorial-'+id+' li').removeClass('highlight');
}

function addRating(obj,id) {
	$('.demo-table #tutorial-'+id+' li').each(function(index) {
		$(this).addClass('selected');
		$('#tutorial-'+id+' #rating').val((index+1));
		if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
			return false;	
		}
	});
	$.ajax({
	 url: "<?php echo base_url(); ?>Customer/update_star_rating/",
	data:'id='+<?php echo $dive_id;?>+'&star_id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
	type: "POST",
	
	success: function(data) //we're calling the response json array 'cities'
		{
			var rating = $('#tutorial-'+id+' #rating').val()
			if(id == 1)
			{
				$('#price_rating').val(rating);
				$('#displayPriceDiv').html(rating);
			}
			else if(id == 2)
			{
				$('#services_rating').val(rating);
				$('#displayServiceDiv').html(rating);
			}
			else if(id == 3)
			{
				$('#facilities_rating').val(rating);
				$('#displayFacilityDiv').html(rating);
			}
			else
			{
				$('#equipment_rating').val(rating);
				$('#displayEquipmentDiv').html(rating);
			}
			//alert(rating);
		}
	});
}

function resetRating(id) {
	if($('#tutorial-'+id+' #rating').val() != 0) {
		$('.demo-table #tutorial-'+id+' li').each(function(index) {
			$(this).addClass('selected');
			if((index+1) == $('#tutorial-'+id+' #rating').val()) {
				return false;	
			}
		});
	}
	
} </script>

         <section class="dashboard light-blue">
			<div class="container" style="background:#66ffff;">
				<div class="row">
					<h5 style="font-weight:bold;margin:10px 15px;"><a href="">My Dive Trips > </a> <a href="">My Past Trips > </a> Write My Review</h5>
				</div>
			 </div>
            <div class="container">

 
               <div class="row" style="background: #FFF;">
               	  <div class="col-md-3">
					<br>
					<div style="border:1px solid gray;padding:5px;">
					<p>
					<img src="<?php echo base_url(); ?>upload/customerprofile/1483346768735.png" class="img-responsive img-circle"style="height:150px;width:150px;display:block;margin:0 auto;border:1px solid gray;" />
					</p>
					<p align="center"><b>Ocean Dive Discovery</b></p>
					</div>
				  </div><br>
               	  <div class="col-md-9" style="border:1px solid gray;">
						<br><br>
						<form class="form-horizontal" action="" method="POST">
							<input type="hidden" value="<?php 
							$uuu_id = $this->session->userdata('user_id'); 
							echo $uuu_id; ?>" id="uuu_id" name="uuu_id">
							
							<input type="hidden" value="<?php echo $id; ?>" id="divecenter_id" name="divecenter_id">
							<input type="hidden" value="<?php echo $booking_id; ?>" id="booking_id" name="booking_id">
							
							<div class="form-group">
								<?php
								
						$date_value = $this->db->get_where('tbl_booking', array('id'=>$booking_id))->result();
							foreach($date_value as $row_date_value)
							{
								?>
								
							
								<div class="row">
									 <label class="control-label col-sm-3" for="email"><b>Destination</b></label>
									 <label class="control-label col-sm-3" for="email">Tioman Island, Malaysia</label>
									
								</div>
								<div class="row">
								<label class="control-label col-sm-3" for="email"><b>Arrival Date</b></label> 
								<label class="control-label col-sm-3" for="email"><?php echo date("d F Y", strtotime($row_date_value->checkin)); ?></label>
								<label class="control-label col-sm-3" for="email"><b>Departure Date</b></label>
								<label class="control-label col-sm-3" for="email"><?php echo date("d F Y", strtotime($row_date_value->checkout)); ?></label>
								</div>
									<?php 
							}
							?>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-sm-3" for="email"><b>Select Your Rating</b></label>
							  <input type="hidden" name="price_rating" id="price_rating"/>
							  <input type="hidden" name="services_rating" id="services_rating"/>
							  <input type="hidden" name="facilities_rating" id="facilities_rating"/>
							  <input type="hidden" name="equipment_rating" id="equipment_rating"/>
							</div>
							<table class="demo-table">
							<tbody>
			
							<?php
								
								
							$result123 = $this->db->get_where('tbl_review', array('divecenter_id' => $dive_id,'customer_id' =>$u_id , 'booking_id' =>$booking_id));
							$result1234 = $result123->result(); 
			
						$i=0;
						if($result123->num_rows() == 0)
						{
							?>
					<tr>
						<td valign="top">
							<div id="tutorial-1">
							<div class="price">
								<input type="hidden" name="rating" id="rating" value="" />
								<ul onMouseOut="resetRating(1);">
								 <label class="control-label col-sm-3" for="email">Price</label>
									 <div class="col-md-4">
										<?php
										for($i=1;$i<=5;$i++)
										{
											$selected = "";
											
											
											?>
											<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,1);" onmouseout="removeHighlight(1);" onClick="addRating(this,1);">&#9733;</li>  
										<?php }  ?>
									</div>
									<div id="displayPriceDiv" class="col-md-5" style="font-size:30px;">								
									</div>
								</ul>
								</div>
								
								
							
						</td>
					</tr>
					<tr>
						<td valign="top">
							<div id="tutorial-2">
							<div class="price">
								<input type="hidden" name="rating" id="rating" value="" />
								<ul onMouseOut="resetRating(2);">
								 <label class="control-label col-sm-3" for="email">Services</label>
								 <div class="col-md-4">
									<?php
									for($i=1;$i<=5;$i++)
									{
										$selected = "";
										
										?>
										<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,2);" onmouseout="removeHighlight(2);" onClick="addRating(this,2);">&#9733;</li>  
									<?php }  ?>
									</div>
									<div id="displayServiceDiv" class="col-md-5" style="font-size:30px;">								
									</div>
								</ul>
								</div>
								
							
						</td>
					</tr>
					<tr>
						<td valign="top">
							<div id="tutorial-3">
							<div class="price">
								<input type="hidden" name="rating" id="rating" value="" />
								<ul onMouseOut="resetRating(3);">
								 <label class="control-label col-sm-3" for="email">Facilities</label>
								 <div class="col-md-4">
									<?php
									for($i=1;$i<=5;$i++)
									{
										$selected = "";
										?>
										<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,3);" onmouseout="removeHighlight(3);" onClick="addRating(this,3);">&#9733;</li>  
									<?php }  ?>
									</div>
									<div id="displayFacilityDiv" class="col-md-5" style="font-size:30px;">								
									</div>
								</ul>
								</div>
								
							
						</td>
					</tr>
					<tr>
						<td valign="top">
							<div id="tutorial-4">
							<div class="price">
								<input type="hidden" name="rating" id="rating" value="" />
								<ul onMouseOut="resetRating(4);">
								 <label class="control-label col-sm-3" for="email">Equipment</label>
								 <div class="col-md-4">
									<?php
									for($i=1;$i<=5;$i++)
									{
										$selected = "";
										
										?>
										<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,4);" onmouseout="removeHighlight(4);" onClick="addRating(this,4);">&#9733;</li>  
									<?php }  ?>
									</div>
									
									<div id="displayEquipmentDiv" class="col-md-5" style="font-size:30px;">								
									</div>
								</ul>
								</div>
								
									
								</td>
							</tr>
							
							<?php	
						}
					foreach ($result1234 as $tutorial) 
					{
					?>
					<tr>
						<td valign="top">
							<div id="tutorial-1">
							<div class="price">
								<input type="hidden" name="rating" id="rating" value="<?php echo $tutorial->price_rating; ?>" />
								<ul onMouseOut="resetRating(1);">
								 <label class="control-label col-sm-3" for="email">Price</label>
									<?php
									for($i=1;$i<=5;$i++)
									{
										$selected = "";
										if(!empty($tutorial->price_rating) && $i<=$tutorial->price_rating) 
										{
											$selected = "selected";
										}
										
										?>
										<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,1);" onmouseout="removeHighlight(1);" onClick="addRating(this,1);">&#9733;</li>  
									<?php }  ?>
								</ul>
								</div>
								
							
						</td>
					</tr>
					<tr>
						<td valign="top">
							<div id="tutorial-2">
							<div class="price">
								<input type="hidden" name="rating" id="rating" value="<?php echo $tutorial->services_rating; ?>" />
								<ul onMouseOut="resetRating(2);">
								 <label class="control-label col-sm-3" for="email">Services</label>
									<?php
									for($i=1;$i<=5;$i++)
									{
										$selected = "";
										if(!empty($tutorial->services_rating) && $i<=$tutorial->services_rating) 
										{
											$selected = "selected";
										}
										?>
										<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,2);" onmouseout="removeHighlight(2);" onClick="addRating(this,2);">&#9733;</li>  
									<?php }  ?>
								</ul>
								</div>
								
							
						</td>
					</tr>
					<tr>
						<td valign="top">
							<div id="tutorial-3">
							<div class="price">
								<input type="hidden" name="rating" id="rating" value="<?php echo $tutorial->facilities_rating; ?>" />
								<ul onMouseOut="resetRating(3);">
								 <label class="control-label col-sm-3" for="email">Facilities</label>
									<?php
									for($i=1;$i<=5;$i++)
									{
										$selected = "";
										if(!empty($tutorial->facilities_rating) && $i<=$tutorial->facilities_rating) 
										{
											$selected = "selected";
										}
										?>
										<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,3);" onmouseout="removeHighlight(3);" onClick="addRating(this,3);">&#9733;</li>  
									<?php }  ?>
								</ul>
								</div>
								
							
						</td>
					</tr>
					<tr>
						<td valign="top">
							<div id="tutorial-4">
							<div class="price">
								<input type="hidden" name="rating" id="rating" value="<?php echo $tutorial->equipment_rating; ?>" />
								<ul onMouseOut="resetRating(4);">
								 <label class="control-label col-sm-3" for="email">Equipment</label>
									<?php
									for($i=1;$i<=5;$i++)
									{
										$selected = "";
										if(!empty($tutorial->equipment_rating) && $i<=$tutorial->equipment_rating) 
										{
											$selected = "selected";
										}
										?>
										<li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,4);" onmouseout="removeHighlight(4);" onClick="addRating(this,4);">&#9733;</li>  
									<?php }  ?>
								</ul>
								</div>
								
									
								</td>
							</tr>
							
							<?php	
							
						}
				
					?>
					</tbody>
			</table>
							
							<div class="form-group">
							  <label class="control-label col-sm-3" for="email"><b>Review Title</b></label>
							  <div class="col-sm-9">
								<input type="text" name="rtitle" id="rtitle" class="form-control" required="">
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="control-label col-sm-3" for="email"><b>Review to Dive Center</b></label>
							  <div class="col-sm-9">
								<textarea class="form-control" name="content" id="content" rows="5" ></textarea>
								
							  </div>
							</div>
							
							<div class="form-group">        
							  <div class="col-sm-offset-3 col-sm-9 text-right">
								<input type="submit" class="btn btn-default submit_button" value="Post Review">
								<input type="submit" class="btn btn-default submit_button" value="Back">
							  </div>
							</div>
							<div class="form-group">        
							  <div class="col-sm-offset-3 col-sm-9">
								<div id="flash"></div>
								<div id="show"></div>
							  </div>
							</div>
							
						</form>
						
						<script type="text/javascript">
						$(function() {
														
							
						$(".submit_button").click(function() {
						var texttitle = $("#rtitle").val();
						var textcontent = $("#content").val();
						var price_rating = $("#price_rating").val();
						var services_rating = $("#services_rating").val();
						var facilities_rating = $("#facilities_rating").val();
						var equipment_rating = $("#equipment_rating").val();
						var textuserid = $("#uuu_id").val();
						var textdiveid = $("#divecenter_id").val();
						var booking_id = $("#booking_id").val();
						var dataString = 'title='+ texttitle + '&content='+ textcontent + '&price_rating='+price_rating +'&services_rating='+services_rating+'&facilities_rating='+facilities_rating+'&equipment_rating='+equipment_rating+'&uuuid=' + textuserid + '&diveid=' + textdiveid + '&booking_id=' + booking_id;
						
						if(textcontent == '' )
						{
							swal(
							'Warning !',
							"Please Type the Review !",
							'error'
							);
							//$("#content").focus();
						}
						else
						{
						$("#flash").show();
						$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
						$.ajax({
						type: "POST",
						url: "<?php echo base_url('Customer/insertReview'); ?>",
						data: dataString,
						cache: true,
						success: function(html){
							$("#show").after(html);
							document.getElementById('content').value='';
							document.getElementById('rtitle').value='';
							$("#flash").hide();
						//	$("#content").focus();
							swal({
								title: "Review", 
								text: "Thank you for the review, Kindly click on the OK to proceed back to listing page", 
								type: "success"
							}).then(function() {
							   window.location.href = "<?php echo base_url().'Customer/customerWritemyreview/'.$id.'/'.$booking_id; ?>";
							});
			
			
							
							//return true;
							//alert("Thank you for the review, Kindly click on the OK to proceed back to listing page");
							//window.location.href = "<?php echo base_url().'Customer/customerWritemyreview/'.$id.'/'.$booking_id; ?>";
						}  
						});
						}
						return false;
						});
						});
						</script>
				  </div>
                  
               </div>
            </div>
			<div class="container">&nbsp;</div>
			 
         </section>
		 <hr style="width:100%;border:2px solid #66ffff;">
		 <?PHP
		}
?>
	<?php
	}
	else
	{
		
	}
	
?>
